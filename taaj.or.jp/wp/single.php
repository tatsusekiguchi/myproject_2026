<?php get_header(); ?>
<main class="main" id="news">
	<div class="pageTitleContainer">
		<div class="pageTitleBox">
			<h1>最新情報</h1>
			<p>NEWS</p>
		</div>
	</div>
	<div class="newsSection">
		<div class="secWrap01">
			<div class="newsContainer">
				<div class="catePanel">
					<div class="inner">
						<dl>
							<dt>カテゴリーで検索</dt>
							<dd>
								<ul>
									<?php
									$categories = get_categories(array(
										'orderby' => 'name',
										'order' => 'ASC'
									));
									foreach($categories as $category) {
										echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
									}
									?>
								</ul>
							</dd>
						</dl>
						<dl>
							<dt>アーカイブ</dt>
							<dd>
								<ul>
									<?php
									$years = $wpdb->get_results("
										SELECT DISTINCT YEAR(post_date) as year
										FROM $wpdb->posts
										WHERE post_status = 'publish'
										AND post_type = 'post'
										ORDER BY year DESC
									");

									foreach($years as $year) {
										echo '<li>';
										echo '<p class="year">' . $year->year . ' ▼</p>';
										echo '<ul>';

										for($month = 1; $month <= 12; $month++) {
											$count = $wpdb->get_var($wpdb->prepare("
												SELECT COUNT(*)
												FROM $wpdb->posts
												WHERE post_status = 'publish'
												AND post_type = 'post'
												AND YEAR(post_date) = %d
												AND MONTH(post_date) = %d
											", $year->year, $month));

											if($count > 0) {
												$archive_url = get_month_link($year->year, $month);
												echo '<li><a href="' . $archive_url . '">' . $month . '月（' . $count . '）</a></li>';
											}
										}

										echo '</ul>';
										echo '</li>';
									}
									?>
								</ul>
							</dd>
						</dl>
					</div>
				</div>
				<div class="newsPanel">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="newsDetail">
						<div class="title">
							<h2><?php the_title(); ?></h2>
						</div>
						<div class="infoBox">
							<?php
							$categories = get_the_category();
							$cat_class = '';
							$cat_name = '';

							if (!empty($categories)) {
								$cat_slug = $categories[0]->slug;
								$cat_name = $categories[0]->name;

								// カテゴリースラッグに応じてクラスを設定
								if ($cat_slug == 'info') {
									$cat_class = 'info';
								} elseif ($cat_slug == 'event-taaj') {
									$cat_class = 'event-taaj';
								} elseif ($cat_slug == 'event-relation') {
									$cat_class = 'event-relation';
								} elseif ($cat_slug == 'staff') {
									$cat_class = 'staff';
								}
							}
							?>
							<div class="cate <?php echo $cat_class; ?>">
								<p><?php echo $cat_name; ?></p>
							</div>
							<div class="time">
								<p><?php echo get_the_date('Y.m.d'); ?></p>
							</div>
						</div>
						<div class="postContents">
							<?php the_content(); ?>
						</div>
					</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<div class="prevNextPanel">
				<?php
				$prev_post = get_previous_post();
				$next_post = get_next_post();
				?>
				<div class="prevBox">
					<?php if (!empty($prev_post)) : ?>
						<a href="<?php echo get_permalink($prev_post->ID); ?>"><span><?php echo get_the_title($prev_post->ID); ?></span></a>
					<?php endif; ?>
				</div>
				<div class="nextBox">
					<?php if (!empty($next_post)) : ?>
						<a href="<?php echo get_permalink($next_post->ID); ?>"><span><?php echo get_the_title($next_post->ID); ?></span></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>