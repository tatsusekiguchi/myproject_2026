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
									$current_cat_id = get_queried_object_id();
									foreach($categories as $category) {
										$active_class = ($category->term_id == $current_cat_id) ? ' class="active"' : '';
										echo '<li' . $active_class . '><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
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
					<div class="newsList">
						<ul>
							<?php
							if (have_posts()) :
								while (have_posts()) : the_post();
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
							<li>
								<div class="infoBox">
									<div class="time">
										<p><?php echo get_the_date('Y.m.d'); ?></p>
									</div>
									<div class="cate <?php echo $cat_class; ?>">
										<p><?php echo $cat_name; ?></p>
									</div>
								</div>
								<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
							</li>
							<?php
								endwhile;
							else :
							?>
							<li>
								<p>投稿が見つかりませんでした。</p>
							</li>
							<?php
							endif;
							?>
						</ul>
					</div>
				</div>
			</div>
			<?php if (function_exists('wp_pagenavi')) : ?>
				<?php wp_pagenavi(); ?>
			<?php else : ?>
				<?php
				global $wp_query;
				if ($wp_query->max_num_pages > 1) :
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				?>
				<div class="list__pagination">
					<ul class="pagination">
						<?php if ($paged > 1) : ?>
						<li class="previous"><a href="<?php echo get_pagenum_link($paged - 1); ?>"></a></li>
						<?php endif; ?>

						<?php
						for ($i = 1; $i <= $wp_query->max_num_pages; $i++) {
							if ($i == $paged) {
								echo '<li class="current"><span>' . $i . '</span></li>';
							} else {
								echo '<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
							}
						}
						?>

						<?php if ($paged < $wp_query->max_num_pages) : ?>
						<li class="next"><a href="<?php echo get_pagenum_link($paged + 1); ?>"></a></li>
						<?php endif; ?>
					</ul>
				</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
