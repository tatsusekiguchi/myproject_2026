<?php
/*
Template Name: ブログ
*/
?>
<?php get_header(); ?>
	<main class="main" id="blog">
		<div class="pageKvContainer">
			<div class="pageKv">
				<div class="kvTitle">
					<h1>ブログ</h1>
				</div>
			</div>
		</div>
		<div class="blogContainer">
			<div class="secWrap01">
				<div class="catePanel">
					<ul>
						<?php
						$cate_panel_categories = get_categories(array(
							'hide_empty' => false,
						));
						$current_category_id = get_queried_object_id();
						?>
						<?php foreach($cate_panel_categories as $cate_panel_category): ?>
						<li<?php if($cate_panel_category->term_id === $current_category_id): ?> class="active"<?php endif; ?>><a href="<?php echo esc_url(get_category_link($cate_panel_category->term_id)); ?>"><?php echo esc_html($cate_panel_category->name); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="listPanel">
					<div class="listBox">
						<ul>
							<?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 10,
                                'paged' => $paged
                            );
                            $news_query = new WP_Query($args);

                            if ($news_query->have_posts()) :
                                while ($news_query->have_posts()) : $news_query->the_post();
                            ?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<div class="photoBox"><?php the_post_thumbnail('full'); ?></div>
									<div class="txtBox">
										<p><?php the_title(); ?></p>
									</div>
								</a>
							</li>
							<?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
						</ul>
					</div>
					<?php if ($news_query->max_num_pages > 1) : ?>
						<div class="list__pagination">
							<ul class="pagination">
								<?php if ($paged > 1) : ?>
								<li class="previous"><a href="<?php echo get_pagenum_link($paged - 1); ?>"></a></li>
								<?php endif; ?>

								<?php
								for ($i = 1; $i <= $news_query->max_num_pages; $i++) {
									if ($i == $paged) {
										echo '<li class="current"><span>' . $i . '</span></li>';
									} else {
										echo '<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
									}
								}
								?>

								<?php if ($paged < $news_query->max_num_pages) : ?>
								<li class="next"><a href="<?php echo get_pagenum_link($paged + 1); ?>"></a></li>
								<?php endif; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
