<?php
/*
Template Name: ブログ一覧
Template Post Type: page
*/
get_header();
?>

	<main class="bloglistMain" id="bloglist">
		<div class="pageKvContainer">
			<div class="pageKvPanel">
				<div class="pageKvTitle">
					<p>BLOG</p>
					<h1>ブログ</h1>
				</div>
				<div class="topicPath">
					<ol>
						<li><a href="<?php echo esc_url( aichi_koushikai_page_url() ); ?>">HOME</a></li>
						<li>ブログ</li>
					</ol>
				</div>
			</div>
		</div>
		<section class="sectionBlog">
			<div class="secWrap01">
				<div class="blogCategoryList">
					<ul>
						<?php foreach ( get_categories( array( 'hide_empty' => true ) ) as $blog_category ) : ?>
							<li><a href="<?php echo esc_url( get_category_link( $blog_category->term_id ) ); ?>"><?php echo esc_html( $blog_category->name ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php
				$blog_paged = max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) );
				$blog_query = new WP_Query(
					array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'posts_per_page' => 20,
						'paged'          => $blog_paged,
					)
				);
				?>
				<div class="blogList">
					<?php if ( $blog_query->have_posts() ) : ?>
						<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
							<a class="newsItem" href="<?php the_permalink(); ?>">
								<div class="newsItemDate">
									<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'n月j日' ) ); ?></time>
								</div>
								<div class="newsItemBody">
									<h2><?php the_title(); ?></h2>
								</div>
							</a>
						<?php endwhile; ?>
					<?php else : ?>
						<p>ブログ記事はありません。</p>
					<?php endif; ?>
				</div>
				<div class="blogPagination">
					<?php aichi_koushikai_pagination( $blog_query ); ?>
				</div>
				<?php wp_reset_postdata(); ?>
			</div>
		</section>
	</main>


<?php get_footer(); ?>

