<?php get_header(); ?>
	<?php
	if(!function_exists('actyou_get_acf_image_url')):
		function actyou_get_acf_image_url($image) {
			if(is_array($image) && !empty($image['url'])):
				return $image['url'];
			elseif(is_numeric($image)):
				return wp_get_attachment_image_url($image, 'full');
			elseif(is_string($image)):
				return $image;
			endif;

			return '';
		}
	endif;

	if(!function_exists('actyou_get_acf_file_url')):
		function actyou_get_acf_file_url($file) {
			if(is_array($file) && !empty($file['url'])):
				return $file['url'];
			elseif(is_numeric($file)):
				return wp_get_attachment_url($file);
			elseif(is_string($file)):
				return $file;
			endif;

			return '';
		}
	endif;

	if(!function_exists('actyou_is_blog_detail_category')):
		function actyou_is_blog_detail_category() {
			$blog_category_names = array('お知らせ', 'スタッフブログ');
			$blog_category_slugs = array('info', 'staff-blog');
			$taxonomies = array('category', 'blog_cat');

			foreach($taxonomies as $taxonomy):
				$terms = get_the_terms(get_the_ID(), $taxonomy);

				if(!$terms || is_wp_error($terms)):
					continue;
				endif;

				foreach($terms as $term):
					if(in_array($term->name, $blog_category_names, true) || in_array($term->slug, $blog_category_slugs, true)):
						return true;
					endif;
				endforeach;
			endforeach;

			return false;
		}
	endif;
	?>
	<?php if(have_posts()): ?>
	<?php while(have_posts()): the_post(); ?>
	<?php
	$is_blog_detail = actyou_is_blog_detail_category();
	$categories = get_the_category();
	$category_name = !empty($categories) ? $categories[0]->name : '';

	$tour_title = function_exists('get_field') && get_field('tour_title') ? get_field('tour_title') : get_the_title();
	$tour_main_image = function_exists('get_field') ? actyou_get_acf_image_url(get_field('tour_main_image')) : '';
	$tour_subtitle = function_exists('get_field') ? get_field('tour_subtitle') : '';
	$tour_sub_images = function_exists('get_field') ? get_field('tour_sub_images') : array();
	$tour_free_content = function_exists('get_field') ? get_field('tour_free_content') : '';
	$tour_schedule_title = function_exists('get_field') ? get_field('tour_schedule_title') : '';
	$tour_schedules = function_exists('get_field') ? get_field('tour_schedules') : array();
	$tour_price_min = function_exists('get_field') ? get_field('tour_price_min') : '';
	$tour_price_max = function_exists('get_field') ? get_field('tour_price_max') : '';
	$tour_pdf_url = function_exists('get_field') ? actyou_get_acf_file_url(get_field('tour_pdf')) : '';
	$has_tour_price_min = $tour_price_min !== '' && $tour_price_min !== null;
	$has_tour_price_max = $tour_price_max !== '' && $tour_price_max !== null;
	?>
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
							$current_category_ids = wp_get_post_categories(get_the_ID(), array('fields' => 'ids'));
							?>
							<?php foreach($cate_panel_categories as $cate_panel_category): ?>
							<li<?php if(in_array($cate_panel_category->term_id, $current_category_ids, true)): ?> class="active"<?php endif; ?>><a href="<?php echo esc_url(get_category_link($cate_panel_category->term_id)); ?>"><?php echo esc_html($cate_panel_category->name); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php if($is_blog_detail): ?>
				<div class="blogDetailContainer">
					<?php if(has_post_thumbnail()): ?>
					<div class="thumbnailBox">
						<div class="thumbnail"><?php the_post_thumbnail('full'); ?></div>
					</div>
					<?php endif; ?>
					<div class="postContents">
						<?php the_content(); ?>
					</div>
				</div>
				<?php else: ?>
				<div class="tourDetailContainer">
					<div class="titlePanel">
						<?php if($category_name): ?>
						<div class="cate">
							<p><?php echo esc_html($category_name); ?></p>
						</div>
						<?php endif; ?>
						<div class="title">
							<h2><?php echo esc_html($tour_title); ?></h2>
						</div>
					</div>
					<?php if($tour_main_image): ?>
					<div class="mv"><img src="<?php echo esc_url($tour_main_image); ?>" alt=""></div>
					<?php endif; ?>
					<div class="subSection">
						<?php if($tour_subtitle): ?>
						<div class="secTtl">
							<h3><?php echo esc_html($tour_subtitle); ?></h3>
						</div>
						<?php endif; ?>
						<?php if($tour_sub_images): ?>
						<div class="listBox">
							<ul>
								<?php foreach($tour_sub_images as $tour_sub_image): ?>
								<?php
								$image_url = isset($tour_sub_image['image']) ? actyou_get_acf_image_url($tour_sub_image['image']) : '';
								$caption = isset($tour_sub_image['caption']) ? $tour_sub_image['caption'] : '';
								?>
								<?php if($image_url || $caption): ?>
								<li>
									<?php if($image_url): ?>
									<div class="photo"><img src="<?php echo esc_url($image_url); ?>" alt=""></div>
									<?php endif; ?>
									<?php if($caption): ?>
									<p><?php echo esc_html($caption); ?></p>
									<?php endif; ?>
								</li>
								<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
						<?php if($tour_free_content): ?>
						<div class="postContents">
							<?php echo wp_kses_post($tour_free_content); ?>
						</div>
						<?php endif; ?>
					</div>
					<?php if($tour_schedule_title || $tour_schedules): ?>
					<div class="scheduleSection">
						<?php if($tour_schedule_title): ?>
						<div class="secTtl">
							<h3><?php echo esc_html($tour_schedule_title); ?></h3>
						</div>
						<?php endif; ?>
						<?php if($tour_schedules): ?>
						<div class="scheduleTable">
							<div class="headBox">
								<div class="box date">
									<p>日程</p>
								</div>
								<div class="box schedule">
									<p>スケジュール</p>
								</div>
								<div class="box meal">
									<p>食事</p>
								</div>
							</div>
							<div class="cntBody">
								<?php foreach($tour_schedules as $tour_schedule): ?>
								<?php
								$day = isset($tour_schedule['day']) ? $tour_schedule['day'] : '';
								$schedule_text = isset($tour_schedule['schedule_text']) ? $tour_schedule['schedule_text'] : '';
								$meal_breakfast = isset($tour_schedule['meal_breakfast']) ? $tour_schedule['meal_breakfast'] : '';
								$meal_lunch = isset($tour_schedule['meal_lunch']) ? $tour_schedule['meal_lunch'] : '';
								$meal_dinner = isset($tour_schedule['meal_dinner']) ? $tour_schedule['meal_dinner'] : '';
								?>
								<div class="scheduleBox">
									<div class="box date">
										<dl>
											<dt>日程</dt>
											<dd><?php echo esc_html($day); ?></dd>
										</dl>
									</div>
									<div class="box schedule">
										<dl>
											<dt>スケジュール</dt>
											<dd><?php echo wp_kses_post($schedule_text); ?></dd>
										</dl>
									</div>
									<div class="box meal">
										<dl>
											<dt>食事</dt>
											<dd>
												<ul>
													<li>
														<p>朝：<?php echo esc_html($meal_breakfast); ?></p>
													</li>
													<li>
														<p>昼：<?php echo esc_html($meal_lunch); ?></p>
													</li>
													<li>
														<p>夜：<?php echo esc_html($meal_dinner); ?></p>
													</li>
												</ul>
											</dd>
										</dl>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<?php if($has_tour_price_min || $has_tour_price_max || $tour_pdf_url): ?>
					<div class="itemSection">
						<?php if($has_tour_price_min || $has_tour_price_max): ?>
						<div class="section">
							<div class="secTtl">
								<h3>旅行代金<span>(お1人様/2名1室の場合)</span></h3>
							</div>
							<div class="priceBox">
								<div class="price">
									<p>
										<?php if($has_tour_price_min): ?><em><?php echo esc_html($tour_price_min); ?></em><span>円</span><span>～</span><?php endif; ?>
										<?php if($has_tour_price_max): ?><em><?php echo esc_html($tour_price_max); ?></em><span>円</span><?php endif; ?>
									</p>
								</div>
							</div>
							<p>◎別途空港諸税、燃油サーチャージのお支払いが必要です。</p>
						</div>
						<?php endif; ?>
						<?php if($tour_pdf_url): ?>
						<div class="section">
							<div class="secTtl">
								<h3>詳細情報ダウンロード</h3>
							</div>
							<div class="pdfBox"><a href="<?php echo esc_url($tour_pdf_url); ?>" target="_blank" rel="noopener"><span>PDFをダウンロード</span></a></div>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<div class="btnBackBox">
					<div class="btnMore"><a href="<?php echo esc_url(home_url('/bloglist')); ?>">一覧に戻る</a></div>
				</div>
			</div>
		</div>
	</main>
	<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
