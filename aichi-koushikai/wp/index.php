<?php get_header(); ?>

<main class="indexMain">
	<div class="indexMainInner">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'indexItem' ); ?>>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</article>
		<?php endwhile; else : ?>
			<p>記事が見つかりませんでした。</p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
