<?php
/*
Template Name: 新着情報一覧
*/
?>

<?php get_header(); ?>

<!-- ▽メイン▽-->
<main id="news">
	<div class="kv">
		<h2>新着情報</h2>
	</div>
	<div class="newsBox" id="newslist">
		<div class="mainBox">
			<div class="wrap">
				<ul>
					<?php
		                $the_query = new WP_Query( array(
		                  'paged'       => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
		                  'post_type'   => 'post',
		                  'posts_per_page' => 10,
		                ) ); ?>

		            <?php if ( $the_query->have_posts() ) while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li>
						<div class="photo"><?php the_post_thumbnail('medium'); ?></div>
						<div class="txt">
							<span>
								<?php $cat = get_the_category(); ?>
						        <?php $cat = $cat[0]; ?>
						        <?php echo get_cat_name($cat->term_id); ?>
							</span>
							<time datetime="<?php the_time("Y-m-d") ?>"><?php the_time("Y.m.d") ?></time>
							<p class="ttl"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
						</div>
					</li>
					<?php endwhile; ?>
					
				</ul>
				<?php
	            //Pagenation 
	            if (function_exists("responsive_pagination")) {
	                $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
	                responsive_pagination($wp_query->max_num_pages);
	                wp_reset_postdata();
	            }
	            ?>
			</div>
		</div>
		<div class="sideBox">
			<dl>
				<dt>カテゴリ</dt>
				<dd>
					<ul>
						<?php
						// パラメータを指定
						$args = array(
							// カテゴリー内の記事数順で指定
						    'orderby' => 'count',
						    // 降順で指定
						    'order' => 'DSC'
						);
						$categories = get_categories( $args );

						foreach( $categories as $category ){
							echo '<li><a href="' . get_category_link( $category->term_id ) . '"><span>＞</span>' . $category->name . '</a> </li> ';
						}
						?>
					</ul>
				</dd>
			</dl>
		</div>
	</div>
	<p>吉祥総合調査では名古屋を中心に、採用調査、人事調査、総務調査などの企業調査を行っております。<br>採用時の身辺調査や、社内・社外でのトラブルでお困りの際は当社にご相談ください。<br>目に見えない変化（サイン）を見える（クリア）な報告書に致します。</p>
</main>
<!-- △メイン△-->

<?php get_footer(); ?>