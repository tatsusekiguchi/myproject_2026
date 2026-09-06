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
										<div class="btnMore">
											<a href="<?php echo esc_url(home_url('/caselist')); ?>">すべて</a>
										</div>
									</li> -->
									<?php
									$categories = get_categories(array(
										'taxonomy' => 'category',
										'hide_empty' => true, // 投稿があるカテゴリのみ表示
										'orderby' => 'name',
										'order' => 'ASC'
									));
									foreach ($categories as $category) :
									?>
									<li>
										<div class="btnMore">
											<a href="<?php echo esc_url(add_query_arg('cat', $category->term_id, home_url('/caselist/'))); ?>">
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
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="caseDetail">
							<div class="titleBox">
								<div class="cate">
									<?php
									$categories = get_the_category();
									if (!empty($categories)) :
									?>
									<p><?php echo esc_html($categories[0]->name); ?></p>
									<?php endif; ?>
								</div>
								<div class="title">
									<h2><?php the_title(); ?></h2>
								</div>
							</div>
							<?php if (has_post_thumbnail()) : ?>
								<div class="thumbnailBox">
									<?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
								</div>
							<?php endif; ?>
							<div class="postContents">
								<?php the_content(); ?>
							</div>
						</div>
						<?php endwhile; endif; ?>
						<div class="btnBack"><a href="<?php echo esc_url(home_url('/caselist')); ?>">一覧に戻る</a></div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>