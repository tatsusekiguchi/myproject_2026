<?php get_header(); ?>
	<main class="main" id="news">
		<div class="pageKvContainer">
			<div class="pageKvPanel">
				<div class="kvTtl">
					<h1>お知らせ</h1>
				</div>
			</div>
		</div>
		<div class="newsSection">
			<div class="secWrap01">
				<div class="catePanel">
					<ul>
						<?php
						$post_categories = get_the_category();
						$current_cat_id = !empty($post_categories) ? $post_categories[0]->term_id : 0;
						$categories = get_categories(array(
							'hide_empty' => true,
							'orderby' => 'name',
							'order' => 'ASC'
						));
						foreach ($categories as $category) :
						?>
						<li<?php if ($current_cat_id == $category->term_id) echo ' class="active"'; ?>><a href="<?php echo get_category_link($category->term_id); ?>"><span><?php echo esc_html($category->name); ?></span></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="detailPanel">
					<div class="title">
						<h2><?php the_title(); ?></h2>
					</div>
					<?php if (has_post_thumbnail()) : ?>
					<div class="thumbnail"><?php the_post_thumbnail('large'); ?></div>
					<?php endif; ?>
					<div class="postContents">
						<?php the_content(); ?>
					</div>
					<div class="btnMore btnPageLink"><a href="#footer">お問い合わせはこちら</a></div>
					<div class="btnBack"><a href="<?php echo home_url(); ?>/newslist">一覧に戻る</a></div>
				</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</main>
<?php get_footer(); ?>