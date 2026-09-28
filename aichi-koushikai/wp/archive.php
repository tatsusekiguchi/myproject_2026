<?php get_header(); ?>

<main class="archiveMain">
	<div class="archiveMainInner">
		<h1><?php the_archive_title(); ?></h1>
		<?php if ( have_posts() ) : ?>
			<div class="archiveList">
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'archiveItem' ); ?>>
						<a href="<?php the_permalink(); ?>">
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
							<h2><?php the_title(); ?></h2>
						</a>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p>記事が見つかりませんでした。</p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
