<?php get_header(); ?>
	<main class="pageMain" id="news">
		<div class="pageMainContainer">
			<div class="pageTitleContainer">
				<div class="pageTtlBox">
					<div class="sub">
						<p>WHAT’S NEW</p>
					</div>
					<div class="secTtl">
						<h1>新着情報</h1>
					</div>
				</div>
			</div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="newsDetailContainer">
				<div class="titlePanel">
					<div class="time">
						<p><?php the_time('Y.m.d'); ?></p>
					</div>
					<div class="title">
						<h2><?php the_title(); ?></h2>
					</div>
				</div>
				<div class="detailPanel">
					<?php if (has_post_thumbnail()) : ?>
					<div class="photo">
						<?php the_post_thumbnail('full'); ?>
					</div>
					<?php endif; ?>
					<div class="postBox">
						<?php the_content(); ?>
					</div>
					<div class="btnBack"><a href="<?php echo home_url(); ?>#section__news">掲載一覧へ戻る</a></div>
				</div>
			</div>
			<?php endwhile; endif; ?>
		</div>
	</main>
<?php get_footer(); ?>