<?php
/*
Template Name: 施工事例一覧
*/
?>
<?php get_header(); ?>
<!-- ▽メイン▽-->
<main class="main" id="case">
	<div class="pageKvPanel">
		<div class="kvTitle">
			<h1>施工事例</h1>
		</div>
	</div>
	<div class="blogSection">
		<div class="secWrap01">
			<div class="blogContainer">
				<div class="leftPanel">
					<dl>
						<dt>CATEGORY</dt>
						<dd>
							<ul>
								<!-- <li>
									<div class="btnMore"><a href="<?php echo esc_url(get_permalink()); ?>">すべて</a></div>
								</li> -->
								<?php
								$categories = get_categories(array(
									'orderby' => 'name',
									'order'   => 'ASC',
									'hide_empty' => true,
								));
								foreach($categories as $category) :
								?>
								<li>
									<div class="btnMore">
										<a href="<?php echo esc_url(add_query_arg('cat', $category->term_id, get_permalink())); ?>">
											<?php echo esc_html($category->name); ?>
										</a>
									</div>
								</li>
								<?php endforeach; ?>
							</ul>
						</dd>
					</dl>
				</div>
				<div class="rightPanel">
					<div class="caseList">
						<ul>
							<?php
							// カテゴリフィルタの設定
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
								'post_type' => 'post',
								'posts_per_page' => 12,
								'paged' => $paged,
								'post_status' => 'publish'
							);

							// カテゴリフィルタが指定されている場合
							if(isset($_GET['cat']) && !empty($_GET['cat'])) {
								$args['cat'] = intval($_GET['cat']);
							}

							$case_query = new WP_Query($args);

							if ($case_query->have_posts()) :
								while ($case_query->have_posts()) : $case_query->the_post();
									$categories = get_the_category();
									$category_name = !empty($categories) ? $categories[0]->name : 'カテゴリなし';
							?>
							<li>
								<a href="<?php echo esc_url(get_permalink()); ?>">
									<div class="photoBox">
										<?php if (has_post_thumbnail()) : ?>
											<div class="photo">
												<?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
											</div>
										<?php endif; ?>
										<div class="cate">
											<p><?php echo esc_html($category_name); ?></p>
										</div>
									</div>
									<div class="title">
										<p><?php echo esc_html(get_the_title()); ?></p>
									</div>
								</a>
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
							wp_reset_postdata();
							?>
						</ul>
					</div>
					<div class="list__pagination">
						<?php
						if ($case_query->max_num_pages > 1) :
							$current = max(1, get_query_var('paged'));
							$total = $case_query->max_num_pages;
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
	</div>
</main>
<!-- △メイン△-->
<?php get_footer(); ?>