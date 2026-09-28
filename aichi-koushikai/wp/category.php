<?php get_header(); ?>

<main class="bloglistMain categoryMain" id="category">
	<div class="pageKvContainer">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<p>BLOG</p>
				<h1><?php single_cat_title(); ?></h1>
			</div>
			<div class="topicPath">
				<ol>
					<li><a href="<?php echo esc_url( aichi_koushikai_page_url() ); ?>">HOME</a></li>
					<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'bloglist' ) ); ?>">ブログ</a></li>
					<li><?php single_cat_title(); ?></li>
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
			<div class="blogList">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
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
				<?php aichi_koushikai_pagination(); ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
