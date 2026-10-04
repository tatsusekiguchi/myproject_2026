<?php get_header(); ?>

<main class="blogMain" id="blog">
	<div class="pageKvContainer">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<p>BLOG</p>
				<h1>ブログ</h1>
			</div>
			<div class="topicPath">
				<ol>
					<li><a href="<?php echo esc_url( aichi_koushikai_page_url() ); ?>">HOME</a></li>
					<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'bloglist' ) ); ?>">ブログ</a></li>
					<li><?php the_title(); ?></li>
				</ol>
			</div>
		</div>
	</div>

	<section class="sectionBlog">
		<div class="secWrap01">
			<div class="blogCategoryList">
				<ul>
					<?php
					$blog_categories = get_terms(
						array(
							'taxonomy'   => 'category',
							'hide_empty' => true,
						)
					);
					if ( ! is_wp_error( $blog_categories ) && $blog_categories ) :
						foreach ( $blog_categories as $blog_category ) :
					?>
						<li><a href="<?php echo esc_url( get_category_link( $blog_category->term_id ) ); ?>"><?php echo esc_html( $blog_category->name ); ?></a></li>
					<?php
						endforeach;
					else :
					?>
						<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'bloglist' ) ); ?>">お知らせ</a></li>
						<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'bloglist' ) ); ?>">スタッフブログ</a></li>
						<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'bloglist' ) ); ?>">その他</a></li>
					<?php endif; ?>
				</ul>
			</div>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="blogDetail">
					<div class="blogDetailHead">
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
						<h2><?php the_title(); ?></h2>
					</div>
					<div class="blogDetailThumb">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'full', array( 'loading' => 'lazy' ) ); ?>
						<?php endif; ?>
					</div>
					<div class="blogDetailBody">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endwhile; endif; ?>

			<div class="btnMore"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'contact' ) ); ?>">お問い合わせはこちら</a></div>
			<div class="btnBack"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'bloglist' ) ); ?>">一覧に戻る</a></div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
