<?php

/**
 * @param string $page_title ページのtitle属性値
 * @param string $menu_title 管理画面のメニューに表示するタイトル
 * @param string $capability メニューを操作できる権限（maange_options とか）
 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
 * @param string|null $icon_url メニューに表示するアイコンの URL
 * @param int $position メニューの位置
 */
SCF::add_options_page( 'ページタイトル', 'メニュータイトル', 'manage_options', 'theme-options' );

//特定の固定ページではビジュアルエディタを利用できないようにする
function disable_visual_editor_in_page(){
    global $typenow;
     $post_id = $_GET['post'];
    if( $typenow == 'page' ){
        if ( in_array( $post_id, array( '8','20','22','24','26','28' ), true )){
        $hide_postdiv_css = '<style type="text/css">#postdiv, #postdivrich { display: none; }</style>'; 
        echo $hide_postdiv_css; 
            //add_filter('user_can_richedit', 'disable_visual_editor_filter');
        }
    }
}
function disable_visual_editor_filter(){
  return false;
}
add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');


// -------------------------------------------------------------------
// wp_head()で出力される内容を削除
// -------------------------------------------------------------------
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action('wp_head', 'feed_links_extra',3);

// -------------------------------------------------------------------
// WP-pagenaviのCSSを無効にする
// -------------------------------------------------------------------
add_action( 'wp_print_styles', 'my_deregister_styles');
function my_deregister_styles() {
   wp_deregister_style( 'wp-pagenavi' );   
}


// -------------------------------------------------------------------
// ページ内の画像のパスを自動的にテーマディレクトリまでのパスに置き換える
// -------------------------------------------------------------------
function replaceImagePath($arg) {
	$content = str_replace('"image/', '"' . get_bloginfo('template_directory') . '/image/', $arg);
	return $content;
}  
add_action('the_content', 'replaceImagePath');

//アイキャッチを有効にする
add_theme_support('post-thumbnails'); 

// -------------------------------------------------------------------
// WordPressのパーマリンクを自動で変更する
// -------------------------------------------------------------------
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

// -------------------------------------------------------------------
// サイドバーのウェジェットを使えるようにする
// -------------------------------------------------------------------
function set_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'underscores' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'underscores' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'set_widgets_init' );

// -------------------------------------------------------------------
//管理画面の「投稿」を「ブログ」に変更
// -------------------------------------------------------------------
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'ブログ';
	$submenu['edit.php'][5][0] = 'ブログ一覧';
	$submenu['edit.php'][10][0] = '新しいブログ';
	$submenu['edit.php'][16][0] = 'タグ';
	//echo ";
	}
	function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'ブログ';
	$labels->singular_name = 'ブログ';
	$labels->add_new = _x('追加', 'ブログ');
	$labels->add_new_item = 'ブログの新規追加';
	$labels->edit_item = 'ブログの編集';
	$labels->new_item = '新規ブログ';
	$labels->view_item = 'ブログを表示';
	$labels->search_items = 'ブログを検索';
	$labels->not_found = '記事が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

// -------------------------------------------------------------------
//カスタム投稿タイプの追加
// -------------------------------------------------------------------
function create_post_type_news() {
  $exampleSupports = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
    'title',  // 記事タイトル
    'editor',  // 記事本文
    'thumbnail',  // アイキャッチ画像
    'revisions'  // リビジョン
  ];
  register_post_type( 'news',  // カスタム投稿名
    array(
      'label' => 'お知らせ',  // 管理画面の左メニューに表示されるテキスト
      'public' => true,  // 投稿タイプをパブリックにするか否か
      'has_archive' => true,  // アーカイブを有効にするか否か
      'menu_position' => 5,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
      'supports' => $exampleSupports  // 投稿画面でどのmoduleを使うか的な設定
    )
  );
}
add_action( 'init', 'create_post_type_news' ); // アクションに上記関数をフックします

function create_post_type_media() {
  $exampleSupports = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
    'title',  // 記事タイトル
    'editor',  // 記事本文
    'thumbnail',  // アイキャッチ画像
    'revisions'  // リビジョン
  ];
  register_post_type( 'media',  // カスタム投稿名
    array(
      'label' => 'メディア情報',  // 管理画面の左メニューに表示されるテキスト
      'public' => true,  // 投稿タイプをパブリックにするか否か
      'has_archive' => true,  // アーカイブを有効にするか否か
      'menu_position' => 6,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
      'supports' => $exampleSupports  // 投稿画面でどのmoduleを使うか的な設定
    )
  );
}
add_action( 'init', 'create_post_type_media' ); // アクションに上記関数をフックします


// -------------------------------------------------------------------
//	ページネーション
// -------------------------------------------------------------------
function pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

     global $paged;//現在のページ値
     if(empty($paged)) $paged = 1;//デフォルトのページ

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;//全ページ数を取得
         if(!$pages)//全ページ数が空の場合は、１とする
         {
             $pages = 1;
         }
     }

     if(1 != $pages)//全ページが１でない場合はページネーションを表示する
     {
		 echo "<div class=\"pagenation\">\n";
		 echo "<ul>\n";
		 //Prev：現在のページ値が１より大きい場合は表示
         //if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                //三項演算子での条件分岐
                echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
             }
         }
		// //Next：総ページ数より現在のページ値が小さい場合は表示
		// if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
		echo "</ul>\n";
		echo "</div>\n";
     }
}

// -------------------------------------------------------------------
//  固定ページのみ自動整形機能を無効化
// -------------------------------------------------------------------
function disable_page_wpautop() {
  if ( is_page() ) remove_filter( 'the_content', 'wpautop' );
}
add_action( 'wp', 'disable_page_wpautop' );

?>