<?php get_header(); ?>

<main class="errorMain">
	<div class="errorMainInner">
		<h1>ページが見つかりません</h1>
		<p>お探しのページは移動または削除された可能性があります。</p>
		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページへ戻る</a></p>
	</div>
</main>

<?php get_footer(); ?>
