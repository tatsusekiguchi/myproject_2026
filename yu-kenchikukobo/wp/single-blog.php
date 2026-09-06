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
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="blogDetail">
					<div class="titleBox">
						<div class="title">
							<h2><?php the_title(); ?></h2>
						</div>
					</div>
					<div class="thumbnailBox">
						<?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
						<?php endif; ?>
					</div>
					<div class="postContents">
						<?php the_excerpt(); ?>
					</div>
				</div>
				<?php endwhile; endif; ?>
				<div class="btnBack"><a href="<?php echo esc_url(home_url('/bloglist')); ?>">一覧に戻る</a></div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>