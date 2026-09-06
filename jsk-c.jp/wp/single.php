<?php get_header(); ?>
	<main class="main pageMain" id="news">
		<div class="pageTitlePanel">
			<h1>お知らせ</h1>
			<p>News</p>
		</div>
		<div class="newsSection">
			<div class="secWrap01">
				<?php if (have_posts()) : while (have_posts()) : the_post();
					$categories = get_the_category();
					$category_name = !empty($categories) ? $categories[0]->name : 'お知らせ';
				?>
				<div class="detailPanel">
					<div class="ttlBox">
						<h2><?php the_title(); ?></h2>
						<div class="info">
							<div class="time">
								<p><?php echo get_the_date('Y/m/d'); ?></p>
							</div>
							<div class="cate">
								<p><?php echo esc_html($category_name); ?></p>
							</div>
						</div>
					</div>
					<div class="cntBox">
						<?php the_content(); ?>
					</div>
				</div>
				<?php endwhile; endif; ?>
				<div class="backPanel">
					<div class="btnBack"><a href="<?php echo home_url(); ?>/newslist">戻る</a></div>
				</div>
			</div>
		</div>
		<div class="topicPath">
			<div class="secWrap01">
				<ol>
					<li><a href="<?php echo home_url(); ?>">トップ</a></li>
					<li><a href="<?php echo home_url(); ?>/newslist">お知らせ</a></li>
					<li><?php the_title(); ?></li>
				</ol>
			</div>
		</div>
	</main>
<?php get_footer(); ?>