<?php

/**
 * 愛知講師会テーマ設定
 */
function aichi_koushikai_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'global' => 'グローバルナビゲーション',
			'footer' => 'フッターナビゲーション',
		)
	);
}
add_action( 'after_setup_theme', 'aichi_koushikai_setup' );

/**
 * 必要な固定ページを、存在しない場合だけ自動作成します。
 */
function aichi_koushikai_create_default_pages() {
	if ( get_option( 'aichi_koushikai_default_pages_created' ) ) {
		return;
	}

	$pages = array(
		'index'          => array( 'title' => 'TOP', 'template' => 'default' ),
		'philosophy'     => array( 'title' => '愛知講師会の想い', 'template' => 'page/philosophy.php' ),
		'service'        => array( 'title' => 'サービス紹介', 'template' => 'page/service.php' ),
		'class'          => array( 'title' => 'クラス紹介', 'template' => 'page/class.php' ),
		'voice'          => array( 'title' => '実績・保護者の声', 'template' => 'page/voice.php' ),
		'faq'            => array( 'title' => 'よくあるご質問', 'template' => 'page/faq.php' ),
		'lecturer'       => array( 'title' => '講師紹介', 'template' => 'page/lecturer.php' ),
		'access'         => array( 'title' => '教室案内', 'template' => 'page/access.php' ),
		'bloglist'       => array( 'title' => 'ブログ一覧', 'template' => 'page/bloglist.php' ),
		'contact'        => array( 'title' => 'お問い合わせ', 'template' => 'page/contact.php' ),
		'privacy-policy' => array( 'title' => 'プライバシーポリシー', 'template' => 'page/privacy-policy.php' ),
	);

	$top_page_id     = 0;
	$all_pages_ready = true;
	foreach ( $pages as $slug => $page ) {
		$existing_page = get_page_by_path( $slug, OBJECT, 'page' );

		if ( $existing_page ) {
			if ( 'index' === $slug ) {
				$top_page_id = (int) $existing_page->ID;
			}
			continue;
		}

		$page_id = wp_insert_post(
			array(
				'post_title'    => $page['title'],
				'post_name'     => $slug,
				'post_status'   => 'publish',
				'post_type'     => 'page',
				'post_content'  => '',
			'page_template' => $page['template'],
			),
			true
		);

		if ( is_wp_error( $page_id ) ) {
			$all_pages_ready = false;
			continue;
		}

		if ( 'default' !== $page['template'] ) {
			update_post_meta( $page_id, '_wp_page_template', $page['template'] );
		}
		if ( 'index' === $slug ) {
			$top_page_id = (int) $page_id;
		}
	}

	if ( $top_page_id && ! get_option( 'page_on_front' ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $top_page_id );
	}

	if ( $all_pages_ready ) {
		update_option( 'aichi_koushikai_default_pages_created', 1 );
	}
}
add_action( 'after_setup_theme', 'aichi_koushikai_create_default_pages', 20 );
add_action( 'after_switch_theme', 'aichi_koushikai_create_default_pages' );

/**
 * wp_head()へ自動出力される不要な要素を削除します。
 */
function aichi_koushikai_cleanup_head() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );
	remove_action( 'wp_head', 'rest_output_link_wp_head' );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
}
add_action( 'init', 'aichi_koushikai_cleanup_head' );

/**
 * Contact Form 7の自動pタグを無効にします。
 */
function aichi_koushikai_wpcf7_autop_return_false() {
	return false;
}
add_filter( 'wpcf7_autop_or_not', 'aichi_koushikai_wpcf7_autop_return_false' );

/**
 * テーマCSS・JavaScriptの読込場所。
 * public/の資産移行時は、この関数へ必要なファイルを追加します。
 */
function aichi_koushikai_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$styles = array(
		'reset'            => 'css/reset.css',
		'slick'            => 'css/slick.css',
		'slick-theme'      => 'css/slick-theme.css',
		'validation-engine' => 'css/validationEngine.css',
		'animate'           => 'css/animate.css',
		'common'            => 'css/common.css',
		'layout'            => 'css/layout.css',
		'attach'            => 'css/attach.css',
	);

	foreach ( $styles as $handle => $path ) {
		wp_enqueue_style( 'aichi-koushikai-' . $handle, aichi_koushikai_asset_url( $path ), array(), $theme_version );
	}
	wp_enqueue_style( 'aichi-koushikai-common-sp', aichi_koushikai_asset_url( 'css/common_sp.css' ), array(), $theme_version, 'screen and (max-width: 1024px)' );
	wp_enqueue_style( 'aichi-koushikai-layout-sp', aichi_koushikai_asset_url( 'css/layout_sp.css' ), array(), $theme_version, 'screen and (max-width: 1024px)' );

	wp_enqueue_style(
		'aichi-koushikai-style',
		get_stylesheet_uri(),
		array(),
		$theme_version
	);

	$scripts = array(
		'slick'           => 'js/slick.min.js',
		'infiniteslide'   => 'js/infiniteslide.js',
		'common'          => 'js/common.js',
		'scroll-animation' => 'js/scrollAnimation.js',
		'validate'        => 'js/validate.js',
		'validate-ja'     => 'js/validateJa.js',
		'jpostal'         => 'js/jpostal.js',
		'autokana'        => 'js/autokana.js',
		'form-contact'    => 'js/formContact.js',
	);

	wp_enqueue_script( 'aichi-koushikai-jquery', aichi_koushikai_asset_url( 'js/jquery-1.11.3.min.js' ), array(), null, false );
	foreach ( $scripts as $handle => $path ) {
		wp_enqueue_script( 'aichi-koushikai-' . $handle, aichi_koushikai_asset_url( $path ), array( 'aichi-koushikai-jquery' ), $theme_version, false );
	}
}
add_action( 'wp_enqueue_scripts', 'aichi_koushikai_enqueue_assets' );

/**
 * テーマ内アセットのURLを返します。
 */
function aichi_koushikai_asset_url( $path ) {
	return trailingslashit( get_template_directory_uri() ) . ltrim( $path, '/' );
}

/**
 * サイト内ページのURLを返します。
 */
function aichi_koushikai_page_url( $path = '' ) {
	$path = trim( $path, '/' );
	return home_url( '/' . $path . ( '' === $path ? '' : '/' ) );
}

/**
 * ACFフィールドグループJSONの保存・読込先をテーマ内のjsonへ統一します。
 */
function aichi_koushikai_acf_json_path() {
	return trailingslashit( get_template_directory() ) . 'json';
}

function aichi_koushikai_acf_save_json( $path ) {
	return aichi_koushikai_acf_json_path();
}
add_filter( 'acf/settings/save_json', 'aichi_koushikai_acf_save_json' );

function aichi_koushikai_acf_load_json( $paths ) {
	$paths[] = aichi_koushikai_acf_json_path();
	return array_unique( $paths );
}
add_filter( 'acf/settings/load_json', 'aichi_koushikai_acf_load_json' );

/**
 * ブロックエディター由来のCSSを使用しない場合に備えた無効化処理。
 * 本文移行後に必要な場合は、以下のアクションを有効化します。
 */
function aichi_koushikai_remove_block_library_style() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
}
// add_action( 'wp_enqueue_scripts', 'aichi_koushikai_remove_block_library_style', 100 );

/**
 * 管理画面の標準投稿を「ブログ」として表示します。
 */
function aichi_koushikai_change_post_menu_label() {
	global $menu, $submenu;

	if ( isset( $menu[5] ) ) {
		$menu[5][0] = 'ブログ';
	}
	if ( isset( $submenu['edit.php'] ) ) {
		$submenu['edit.php'][5][0]  = 'ブログ一覧';
		$submenu['edit.php'][10][0] = 'ブログを追加';
		$submenu['edit.php'][16][0] = 'タグ';
	}
}
add_action( 'admin_menu', 'aichi_koushikai_change_post_menu_label' );

function aichi_koushikai_change_post_object_label() {
	global $wp_post_types;

	if ( ! isset( $wp_post_types['post'] ) ) {
		return;
	}

	$labels = &$wp_post_types['post']->labels;
	$labels->name               = 'ブログ';
	$labels->singular_name      = 'ブログ';
	$labels->add_new            = _x( '追加', 'ブログ' );
	$labels->add_new_item       = 'ブログを追加';
	$labels->edit_item          = 'ブログを編集';
	$labels->new_item           = '新規ブログ';
	$labels->view_item          = 'ブログを表示';
	$labels->search_items       = 'ブログを検索';
	$labels->not_found          = 'ブログが見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱にブログはありません';
}
add_action( 'init', 'aichi_koushikai_change_post_object_label' );

/**
 * ページネーションを表示します。
 */
function aichi_koushikai_pagination( $query = null ) {
	if ( null === $query ) {
		$query = $GLOBALS['wp_query'];
	}

	if ( empty( $query->max_num_pages ) || $query->max_num_pages < 2 ) {
		return;
	}

	echo '<nav class="pagination" aria-label="ページネーション">';
	echo wp_kses_post(
		paginate_links(
			array(
				'total'     => (int) $query->max_num_pages,
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'mid_size'  => 2,
				'prev_text' => '前へ',
				'next_text' => '次へ',
			)
		)
	);
	echo '</nav>';
}

/**
 * 投稿アーカイブの年・月情報を取得します。
 */
function aichi_koushikai_get_year_archives_num( $year ) {
	global $wpdb;
	$year = absint( $year );

	return (int) $wpdb->get_var(
		$wpdb->prepare(
			"SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_status = 'publish' AND post_type = 'post' AND YEAR(post_date) = %d",
			$year
		)
	);
}

function aichi_koushikai_get_month_archives_num( $year, $month ) {
	global $wpdb;
	$year  = absint( $year );
	$month = absint( $month );

	return (int) $wpdb->get_var(
		$wpdb->prepare(
			"SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_status = 'publish' AND post_type = 'post' AND YEAR(post_date) = %d AND MONTH(post_date) = %d",
			$year,
			$month
		)
	);
}

function aichi_koushikai_get_oldest_year() {
	global $wpdb;
	$oldest_date = $wpdb->get_var(
		"SELECT post_date FROM {$wpdb->posts} WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date ASC LIMIT 1"
	);

	return $oldest_date ? (int) gmdate( 'Y', strtotime( $oldest_date ) ) : (int) gmdate( 'Y' );
}

/**
 * ページごとのSEOメタ情報。
 */
function aichi_koushikai_seo_data() {
	$default = array(
		'title'       => '愛知講師会｜名古屋市千種区・本山の個別指導塾（大学受験・医学部専門）',
		'keywords'    => '愛知講師会, 個別指導, 大学受験, 医学部受験, 千種区 塾, 本山 塾, 少人数制',
		'description' => '名古屋市千種区・本山の個別指導塾「愛知講師会」。講師歴22年の代表が、医学部・難関大学を目指す生徒一人ひとりに合わせたオーダーメイドカリキュラムで指導します。まずは学習相談から。',
	);

	$pages = array(
		'philosophy' => array(
			'title'       => '愛知講師会の想い｜愛知講師会｜名古屋市千種区・本山の個別指導塾（大学受験・医学部専門）',
			'keywords'    => '愛知講師会, 塾の理念, オーダーメイド指導, 篠崎紗穂, 個別指導',
			'description' => '愛知講師会が大切にしている指導への想いをご紹介します。「その子に合った学び方をつくる」という考え方のもと、22年間の指導経験を活かしたオーダーメイドカリキュラムを提供しています。',
		),
		'service' => array(
			'title'       => 'サービス紹介｜個別指導・特訓講座・推薦入試対策｜愛知講師会',
			'keywords'    => $default['keywords'],
			'description' => $default['description'],
		),
		'class' => array(
			'title'       => 'クラス紹介｜月1回・月2回・医学部難関大コース｜愛知講師会｜名古屋市千種区・本山の個別指導塾（大学受験・医学部専門）',
			'keywords'    => 'クラス紹介, 個別指導 頻度, 医学部コース, 少人数制, 振替授業',
			'description' => '愛知講師会のクラス編成をご紹介。月1回・月2回・医学部/難関大コースの3つの頻度から選べる個別指導と、特訓講座・小論文指導を組み合わせた通塾スタイルをご案内します。',
		),
		'voice' => array(
			'title'       => '生徒・保護者の声と合格実績｜愛知講師会｜名古屋市千種区・本山の個別指導塾（大学受験・医学部専門）',
			'keywords'    => '塾の口コミ, 保護者の声, 合格実績, 大学受験 体験談',
			'description' => '愛知講師会に通う生徒・保護者の皆さまからいただいた声をご紹介します。合格実績についても、今後の更新にあわせて随時公開してまいります。',
		),
		'faq' => array(
			'title'       => 'よくあるご質問｜愛知講師会｜名古屋市千種区・本山の個別指導塾（大学受験・医学部専門）',
			'keywords'    => '塾 よくある質問, 授業料, 入会金, 振替, 個別指導 FAQ',
			'description' => '愛知講師会へのお問い合わせで多いご質問をまとめました。個別指導について、授業料・入会金について、時間割・授業回数についてなど、カテゴリ別にご確認いただけます。',
		),
		'lecturer' => array(
			'title'       => '教室案内・アクセス｜ 愛知講師会｜名古屋市千種区・本山の個別指導塾（大学受験・医学部専門）',
			'keywords'    => '篠崎紗穂, 講師紹介, 塾長, 個別指導 講師, 名古屋 塾講師',
			'description' => '愛知講師会で指導にあたる講師をご紹介します。講師歴22年の代表・篠崎紗穂をはじめ、生徒一人ひとりと直接向き合う講師陣のプロフィールとメッセージを掲載しています。',
		),
		'access' => array(
			'title'       => '教室案内・アクセス | 愛知講師会｜名古屋市千種区・本山の個別指導塾（大学受験・医学部専門）',
			'keywords'    => '教室案内, アクセス, 千種区 塾, 本山 塾, 自習室',
			'description' => '愛知講師会の教室についてご案内します。受付時間や休校日などの施設概要、教室内の様子、最寄駅からのアクセス方法を掲載しています。所在地の詳細はお問い合わせください。',
		),
		'blog' => array(
			'title'       => 'ブログ | 愛知講師会｜名古屋市千種区・本山の個別指導塾（大学受験・医学部専門）',
			'keywords'    => '受験ブログ, 大学受験 コラム, 勉強法, 愛知講師会 お知らせ',
			'description' => '愛知講師会が発信する、受験や学習に役立つ情報をまとめたブログです。お知らせ・スタッフブログ・その他のカテゴリから、知りたい情報をご覧いただけます。',
		),
		'bloglist' => array(
			'title'       => 'ブログ | 愛知講師会｜名古屋市千種区・本山の個別指導塾（大学受験・医学部専門）',
			'keywords'    => '受験ブログ, 大学受験 コラム, 勉強法, 愛知講師会 お知らせ',
			'description' => '愛知講師会が発信する、受験や学習に役立つ情報をまとめたブログです。お知らせ・スタッフブログ・その他のカテゴリから、知りたい情報をご覧いただけます。',
		),
		'contact' => array(
			'title'       => 'お問い合わせ・学習相談 | 愛知講師会｜名古屋市千種区・本山の個別指導塾（大学受験・医学部専門）',
			'keywords'    => '塾,お問い合わせ,学習相談,体験授業,資料請求',
			'description' => '愛知講師会へのお問い合わせはこちらから。入会を前提としない学習相談も承っております。3日以内に担当者よりご連絡いたします。お気軽にご相談ください。',
		),
	);

	if ( is_front_page() ) {
		return $default;
	}
	if ( is_home() ) {
		return $pages['bloglist'];
	}
	$slug = get_post_field( 'post_name', get_queried_object_id() );
	if ( is_singular( 'post' ) ) {
		$slug = 'blog';
	}

	return isset( $pages[ $slug ] ) ? $pages[ $slug ] : $default;
}

/**
 * 指定されたSEOタイトルをWordPressのtitleタグへ反映。
 */
function aichi_koushikai_document_title_parts( $parts ) {
	$seo = aichi_koushikai_seo_data();
	return array( 'title' => $seo['title'] );
}
add_filter( 'document_title_parts', 'aichi_koushikai_document_title_parts' );

/**
 * 管理画面・本文で使用する抜粋の長さを設定。
 */
function aichi_koushikai_excerpt_length() {
	return 80;
}
add_filter( 'excerpt_length', 'aichi_koushikai_excerpt_length' );

/**
 * 標準投稿のカテゴリー一覧は1ページ20件で表示します。
 */
function aichi_koushikai_category_posts_per_page( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_category() ) {
		$query->set( 'posts_per_page', 20 );
	}
}
add_action( 'pre_get_posts', 'aichi_koushikai_category_posts_per_page' );
