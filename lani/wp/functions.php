<?php

/**
 * @param string $page_title ページのtitle属性値
 * @param string $menu_title 管理画面のメニューに表示するタイトル
 * @param string $capability メニューを操作できる権限（maange_options とか）
 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
 * @param string|null $icon_url メニューに表示するアイコンの URL
 * @param int $position メニューの位置
 */

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
// contact form 7のjsとcssを停止
// -------------------------------------------------------------------
function my_remove_cf7_css() {

    add_filter( 'wpcf7_load_css', '__return_false' );

}
add_action( 'after_setup_theme', 'my_remove_cf7_css' );

// -------------------------------------------------------------------
// Contact Form 7でメールアドレスの再入力チェック
// -------------------------------------------------------------------
function wpcf7_main_validation_filter( $result, $tag ) {
  $type = $tag['type'];
  $name = $tag['name'];
  $_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );
  if ( 'email' == $type || 'email*' == $type ) {
    if (preg_match('/(.*)_confirm$/', $name, $matches)){
      $target_name = $matches[1];
      if ($_POST[$name] != $_POST[$target_name]) {
        if (method_exists($result, 'invalidate')) {
          $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
      } else {
          $result['valid'] = false;
          $result['reason'][$name] = '確認用のメールアドレスが一致していません';
        }
      }
    }
  }
  return $result;
}

add_filter( 'wpcf7_validate_email', 'wpcf7_main_validation_filter', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_main_validation_filter', 11, 2 );

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
add_filter( 'post_thumbnail_html', 'custom_attribute' );
function custom_attribute( $html ){
    // width height を削除する
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    return $html;
}
/*ショートコード サイトURL：[url]*/
function shortcode_url() {
    return get_bloginfo('url');
}
add_shortcode('url', 'shortcode_url');

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
//　特定の固定ページでエディタを非表示にする
// -------------------------------------------------------------------
function disable_visual_editor_in_page(){
    global $typenow;
     $post_id = $_GET['post'];
    if( $typenow == 'page' ){
        if ( in_array( $post_id, array('22','24','26','28','30','32','34','36','38','40','42','44'), true )  ){   
            $hide_postdiv_css = '<style type="text/css">#postdiv, #postdivrich { display: none; }</style>';
          echo $hide_postdiv_css;
        }
    }
}
add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');

// -------------------------------------------------------------------
//  ページネーション
// -------------------------------------------------------------------
//レスポンシブなページネーションを作成する
function responsive_pagination($pages = '', $range = 4){
  $showitems = ($range * 2)+1;
 
  global $paged;
  if(empty($paged)) $paged = 1;
 
  //ページ情報の取得
  if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages){
      $pages = 1;
    }
  }
 
  if(1 != $pages) {
    echo '<ul class="pagination" role="menubar" aria-label="Pagination">';
    //先頭へ
    echo '<li class="first"><a href="'.get_pagenum_link(1).'"><span>First</span></a></li>';
    //1つ戻る
    echo '<li class="previous"><a href="'.get_pagenum_link($paged - 1).'"><span>Previous</span></a></li>';
    //番号つきページ送りボタン
    for ($i=1; $i <= $pages; $i++)     {
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))       {
        echo ($paged == $i)? '<li class="current"><a>'.$i.'</a></li>':'<li><a href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a></li>';
      }
    }
    //1つ進む
    echo '<li class="next"><a href="'.get_pagenum_link($paged + 1).'"><span>Next</span></a></li>';
    //最後尾へ
    echo '<li class="last"><a href="'.get_pagenum_link($pages).'"><span>Last</span></a></li>';
    echo '</ul>';
  }
}

// -------------------------------------------------------------------
//  ページネーション
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
//  ページネーション(2)
// -------------------------------------------------------------------
function pagenationtest($limit = NULL, $post_typed = 'posts') {
          global $wp_rewrite;
          global $paged;
          global $wp_query;

          // 検索条件
          $query = array();
          if ($limit != NULL) {
              $query['posts_per_page'] = $limit;
          }
          if (count($query) != 0) {
              $wp_query->query($query);
          }

          $wp_query->query(array(
              'post_type' => $post_typed,
          ));
          $paginate_base = get_pagenum_link();

          if( strpos( $paginate_base, '?' ) || !$wp_rewrite->using_permalinks() ) {
              $paginate_format = '';
              $paginate_base = add_query_arg( 'paged', '%#%' );
          } else {
              $paginate_format = (substr( $paginate_base, -1, 1 ) == '/' ? '' : '/') . user_trailingslashit('page/%#%/','paged');
              $paginate_base .= '%_%';
          }


          if( $paged < 2 ) {
              $paged = 1;
          }
          $args = array(
              'base' => $paginate_base,
              'format' => $paginate_format,
              'total' => $wp_query->max_num_pages,
              'current' => $paged,
              'show_all' => false,
              'prev_next' => true,
              'prev_text' => '&laquo;',
              'next_text' => '&raquo;',
              'type' => 'array',
          );
          $pagenate_array = paginate_links($args);

          // 配列がある場合のみ
          if (is_array($pagenate_array) == TRUE) {
              $pagenate .= '<div class="wp-pagenavi">';
              foreach ($pagenate_array as $key => $value) {

                  if (preg_match('/current/', $value) == TRUE) {
                      $class = '';
                  }
                  else {
                      $class = '';
                  }

                  // $value = "<span class=\"{$class}\">".$value.'</span>';
                  // リンク追加
                  $pagenate .= $value;
              }

              $pagenate .= '</div>';
              echo $pagenate;
          }
      }


add_filter('redirect_canonical','pif_disable_redirect_canonical');
function pif_disable_redirect_canonical($redirect_url) { if (is_singular()) $redirect_url = false; return $redirect_url; }


// -------------------------------------------------------------------
//  固定ページのみ自動整形機能を無効化
// -------------------------------------------------------------------
function disable_page_wpautop() {
  if ( is_page() ) remove_filter( 'the_content', 'wpautop' );
}
add_action( 'wp', 'disable_page_wpautop' );

// -------------------------------------------------------------------
//  アーカイブ一覧
// -------------------------------------------------------------------
// 指定年の投稿数を取得
function get_year_archives_num( $year ) {
  global $wpdb;
  $cnt = $wpdb->get_var(
    "SELECT count(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND DATE_FORMAT(post_date, '%Y') = '".$year."';"
  );
  return $cnt;
}
// 指定年月の投稿数を取得
function get_month_archives_num( $year, $month ) {
  global $wpdb;
  $cnt = $wpdb->get_var(
    "SELECT count(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND DATE_FORMAT(post_date, '%Y%m') = '".$year.str_pad($month, 2, 0, STR_PAD_LEFT)."';"
  );
  return $cnt;
}
// 一番古い記事の年を取得
function get_oldest_year() {
  global $wpdb;
  $oldest_date = $wpdb->get_var(
    "SELECT post_date FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date ASC LIMIT 1;"
  );
  return idate('Y', strtotime($oldest_date) ); //投稿日の年だけ数値で取得
}



?>