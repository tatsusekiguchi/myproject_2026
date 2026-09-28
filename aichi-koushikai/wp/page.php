<?php
/*
Template Name: 共通固定ページ
Template Post Type: page
*/
get_header();
?>

<main class="pageMain">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="pageMainInner">
			<h1><?php the_title(); ?></h1>
			<div class="pageContent">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
