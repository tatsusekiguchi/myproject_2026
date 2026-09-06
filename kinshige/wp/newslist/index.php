<?php
/*
Template Name: お知らせ
*/
?>
<?php get_header(); ?>
	<main class="main" id="news">
		<div class="pageKvContainer">
			<div class="pageKvPanel">
				<div class="kvTtl">
					<h1>お知らせ</h1>
				</div>
			</div>
		</div>
		<div class="newsSection">
			<div class="secWrap01">
				<div class="catePanel">
					<ul>
						<?php
						$categories = get_categories(array(
							'hide_empty' => true,
							'orderby' => 'name',
							'order' => 'ASC'
						));
						foreach ($categories as $category) :
						?>
						<li<?php if (isset($_GET['cat']) && $_GET['cat'] == $category->term_id) echo ' class="active"'; ?>><a href="<?php echo add_query_arg('cat', $category->term_id, get_permalink()); ?>"><span><?php echo esc_html($category->name); ?></span></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="listPanel">
					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$cat_id = isset($_GET['cat']) ? intval($_GET['cat']) : '';

					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 9,
						'paged' => $paged,
						'post_status' => 'publish'
					);

					if ($cat_id) {
						$args['cat'] = $cat_id;
					}

					$news_query = new WP_Query($args);

					if ($news_query->have_posts()) :
					?>
					<ul>
						<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>">
								<div class="photo">
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('medium'); ?>
									<?php else : ?>
										<img src="<?php bloginfo('template_url'); ?>/image/news/news_sample.png" alt="<?php the_title_attribute(); ?>">
									<?php endif; ?>
								</div>
								<div class="title">
									<p><?php the_title(); ?></p>
								</div>
								<div class="more">
									<p>続きを見る</p>
								</div>
							</a></li>
						<?php endwhile; ?>
					</ul>
					<?php else : ?>
					<p>記事がありません。</p>
					<?php endif; ?>
				</div>
				<?php if ($news_query->max_num_pages > 1) : ?>
				<div class="list__pagination">
					<ul class="pagination">
						<?php if ($paged > 1) : ?>
						<li class="previous"><a href="<?php echo add_query_arg('paged', $paged - 1); ?>"></a></li>
						<?php endif; ?>

						<?php
						for ($i = 1; $i <= $news_query->max_num_pages; $i++) {
							if ($i == $paged) {
								echo '<li class="current"><span>' . $i . '</span></li>';
							} else {
								echo '<li><a href="' . add_query_arg('paged', $i) . '">' . $i . '</a></li>';
							}
						}
						?>

						<?php if ($paged < $news_query->max_num_pages) : ?>
						<li class="next"><a href="<?php echo add_query_arg('paged', $paged + 1); ?>"></a></li>
						<?php endif; ?>
					</ul>
				</div>
            	<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</main>
<?php get_footer(); ?>