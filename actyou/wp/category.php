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
							<?php if(have_posts()): ?>
							<?php while(have_posts()): the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<?php if(has_post_thumbnail()): ?>
									<div class="photoBox"><?php the_post_thumbnail('full'); ?></div>
									<?php endif; ?>
									<div class="txtBox">
										<p><?php the_title(); ?></p>
									</div>
								</a>
							</li>
							<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
					<?php
					global $wp_query;
					$paged = max(1, get_query_var('paged'));
					$max_num_pages = $wp_query->max_num_pages;
					?>
					<?php if($max_num_pages > 1): ?>
						<div class="list__pagination">
								<ul class="pagination">
									<?php if($paged > 1): ?>
									<li class="previous"><a href="<?php echo esc_url(get_pagenum_link($paged - 1)); ?>"></a></li>
									<?php endif; ?>

								<?php
								for($i = 1; $i <= $max_num_pages; $i++) {
									if($i === $paged) {
										echo '<li class="current"><span>' . esc_html($i) . '</span></li>';
									} else {
										echo '<li><a href="' . esc_url(get_pagenum_link($i)) . '">' . esc_html($i) . '</a></li>';
									}
								}
								?>

									<?php if($paged < $max_num_pages): ?>
									<li class="next"><a href="<?php echo esc_url(get_pagenum_link($paged + 1)); ?>"></a></li>
									<?php endif; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
