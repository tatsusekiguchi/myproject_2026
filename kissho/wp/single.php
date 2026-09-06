<?php get_header(); ?>

<!-- ▽メイン▽-->
<main id="news">
	<div class="kv">
		<h2>新着情報</h2>
	</div>
	<div class="newsBox" id="newsdetail">
		<div class="mainBox">
			<div class="wrap">
				<?php if (have_posts()) : ?>
				<div class="ttlBox">
					<span>
						<?php $cat = get_the_category(); ?>
				        <?php $cat = $cat[0]; ?>
				        <?php echo get_cat_name($cat->term_id); ?>
					</span>
					<time datetime="<?php the_time("Y-m-d") ?>"><?php the_time("Y.m.d") ?></time>
					<h3 class="ttl"><?php the_title(); ?></h3>
				</div>
				<div class="postBox">
					<?php while (have_posts()) : the_post();
						/* ループ開始 */ ?>
					<?php the_content(); ?>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
				<div class="pagingBox">
					<ul class="paging">
						<li class="back"><?php previous_post_link('%link', '<span>&lt</span>'); ?></li>
						<li class="backList"><a href="<?php echo home_url(); ?>/newslist">記事一覧に戻る</a></li>
						<li class="next"><?php next_post_link('%link', '<span>&gt</span>'); ?></li>
					</ul>
				</div>
				<section class="authorBox">
					<h4>この記事を書いた人</h4>
					<div>
						<div class="box">
							<div class="photo"><img src="<?php echo get_template_directory_uri(); ?>/image/news/author_img.png" alt=""></div>
							<dl>
								<dt>近藤かえで</dt>
								<dd>楓女性調査事務所　代表</dd>
							</dl>
						</div>
						<p>私が業界に携わり26年以上経過いたしました。<br>私は、業界の役割として、トラブルや問題を解決するための１つのツールと考えます。<br>調査を実施することで、現実を知り正確な情報収集をすることで、<br>適切な解決方法へと繋がるのではないでしょうか。<br>皆様とお会いできるのも何かのご縁です。<br>相談や調査後についても、法的機関、住居、就職、セキュリティ等のご紹介にも強化しております。<br>今後も、皆様の「信頼」を糧に、スタッフ一同努力してまいります。<br>そして、身近な存在でありたいと願っています。</p>
					</div>
				</section>
			</div>
		</div>
		<div class="sideBox">
			<dl>
				<dt>カテゴリ</dt>
				<dd>
					<ul>
						<?php
						// パラメータを指定
						$args = array(
							// カテゴリー内の記事数順で指定
						    'orderby' => 'count',
						    // 降順で指定
						    'order' => 'DSC'
						);
						$categories = get_categories( $args );

						foreach( $categories as $category ){
							echo '<li><a href="' . get_category_link( $category->term_id ) . '"><span>＞</span>' . $category->name . '</a> </li> ';
						}
						?>
					</ul>
				</dd>
			</dl>
		</div>
	</div>
	<p>吉祥総合調査では名古屋を中心に、採用調査、人事調査、総務調査などの企業調査を行っております。<br>採用時の身辺調査や、社内・社外でのトラブルでお困りの際は当社にご相談ください。<br>目に見えない変化（サイン）を見える（クリア）な報告書に致します。</p>
</main>
<!-- △メイン△-->

<?php get_footer(); ?>