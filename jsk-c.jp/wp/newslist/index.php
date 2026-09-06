<?php
/*
Template Name: お知らせ
*/
?>
<?php get_header(); ?>
<main class="main pageMain" id="news">
	<div class="pageTitlePanel">
		<h1>お知らせ</h1>
		<p>News</p>
	</div>
	<div class="newsSection">
		<div class="secWrap01">
			<div class="listPanel">
				<ul>
					<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 3,
						'orderby' => 'date',
						'order' => 'DESC'
					);
					$news_query = new WP_Query($args);

					if ($news_query->have_posts()) :
						while ($news_query->have_posts()) : $news_query->the_post();
							$categories = get_the_category();
							$category_name = !empty($categories) ? $categories[0]->name : 'お知らせ';
					?>
					<li>
						<div class="info">
							<div class="time">
								<p><?php echo get_the_date('Y/m/d'); ?></p>
							</div>
							<div class="cate">
								<p><?php echo esc_html($category_name); ?></p>
							</div>
						</div>
						<div class="ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					</li>
					<?php
						endwhile;
						wp_reset_postdata();
					else :
					?>
					<li>
						<div class="info">
							<div class="time">
								<p>-</p>
							</div>
							<div class="cate">
								<p>お知らせ</p>
							</div>
						</div>
						<div class="ttl"><p>投稿がありません</p></div>
					</li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="backPanel">
				<div class="btnBack"><a href="<?php echo home_url(); ?>">戻る</a></div>
			</div>
		</div>
	</div>
	<div class="topicPath">
		<div class="secWrap01">
			<ol>
				<li><a href="<?php echo home_url(); ?>">トップ</a></li>
				<li>お知らせ</li>
			</ol>
		</div>
	</div>
</main>
<?php get_footer(); ?>