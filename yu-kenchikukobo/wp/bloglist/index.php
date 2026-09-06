<?php
/*
Template Name: ブログ一覧
*/
?>
<?php get_header(); ?>
<!-- ▽メイン▽-->
<main class="main" id="case">
	<div class="pageKvPanel">
		<div class="kvTitle">
			<h1>ブログ</h1>
		</div>
	</div>
	<div class="blogSection">
		<div class="secWrap01">
			<div class="blogContainer blogContainer--bloglist">
				<div class="blogList">
					<ul>
						<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$blog_query = new WP_Query(array(
							'post_type' => 'blog',
							'posts_per_page' => 12,
							'post_status' => 'publish',
							'orderby' => 'date',
							'order' => 'DESC',
							'paged' => $paged
						));

						if ($blog_query->have_posts()) :
							while ($blog_query->have_posts()) : $blog_query->the_post();
						?>
						<li>
							<p class="time"><?php echo esc_html(get_the_date('Y.m.d')); ?></p>
							<div class="title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></div>
						</li>
						<?php
							endwhile;
							wp_reset_postdata();
						else :
						?>
						<li>
							<p class="time">-</p>
							<div class="title"><a href="#">ブログ記事がありません</a></div>
						</li>
						<?php
						endif;
						?>
					</ul>
				</div>
				<div class="list__pagination">
					<?php
					if ($blog_query->max_num_pages > 1) :
						$current = max(1, get_query_var('paged'));
						$total = $blog_query->max_num_pages;
						$big = 999999999;

						$links = paginate_links(array(
							'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
							'format' => '?paged=%#%',
							'current' => $current,
							'total' => $total,
							'prev_text' => '',
							'next_text' => '',
							'type' => 'array',
							'before_page_number' => '',
							'after_page_number' => ''
						));

						if ($links) :
					?>
					<ul class="pagination">
						<?php foreach ($links as $link) : ?>
							<?php if (strpos($link, 'prev') !== false) : ?>
								<li class="previous"><?php echo str_replace('page-numbers', '', $link); ?></li>
							<?php elseif (strpos($link, 'next') !== false) : ?>
								<li class="next"><?php echo str_replace('page-numbers', '', $link); ?></li>
							<?php elseif (strpos($link, 'current') !== false) : ?>
								<li class="current"><?php echo str_replace('page-numbers', '', $link); ?></li>
							<?php else : ?>
								<li><?php echo str_replace('page-numbers', '', $link); ?></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
					<?php
						endif;
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</main>
<!-- △メイン△-->
<?php get_footer(); ?>