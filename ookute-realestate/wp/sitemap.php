<?php
/*
Template Name: サイトマップ
*/
?>
<?php get_header(); ?>
<main class="next sitemap">
	<article class="title_box top_level">
			<div class="inner">
				<h2 data-title="SITE MAP">サイトマップ</h2>
			</div>
		</article>
		<div class="pankuzu">
			<ul>
				<li><a href="<?php echo home_url(); ?>">ホーム</a></li>
				<li>サイトマップ</li>
			</ul>
		</div>
		<div class="contents_box">
			<div class="sitemap_box">
				<div class="text-wrap">
					<p><a href="<?php echo home_url(); ?>">トップページ</a></p>
				</div>
				<div class="text-wrap">
					<p><a href="<?php echo home_url(); ?>/company">会社情報</a></p>
				</div>
				<div class="text-wrap">
					<p><a href="<?php echo home_url(); ?>/service">事業内容</a></p>
				</div>
				<div class="text-wrap">
					<p><a href="<?php echo home_url(); ?>/privacy">プライバシーポリシー</a></p>
				</div>
				<div class="text-wrap">
					<p><a href="<?php echo home_url(); ?>/sitemap">サイトマップ</a></p>
				</div>
				<div class="text-wrap">
					<p><a href="contact">お問い合わせ</a></p>
				</div>
			</div>
		</div>
</main>
<?php get_footer(); ?>