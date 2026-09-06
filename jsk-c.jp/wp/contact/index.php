<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>
<main class="main pageMain" id="contact">
	<div class="pageTitlePanel">
		<h1>お問い合わせ</h1>
		<p>Contact</p>
	</div>
	<div class="contactSection">
		<div class="secWrap01">
			<div class="topTxt txt">
				<p>まだ何も決まっていなくても大丈夫です。<br>「何から考えればいいか分からない」段階からご相談いただけます。</p>
			</div>
			<div class="formBox">
				<?php echo do_shortcode( '[contact-form-7 id="f2e2ced" title="お問い合わせフォーム"]' ); ?>
			</div>
		</div>
	</div>
	<div class="topicPath">
		<div class="secWrap01">
			<ol>
				<li><a href="<?php echo home_url(); ?>">トップ</a></li>
				<li>お問い合わせ</li>
			</ol>
		</div>
	</div>
	</main>
<?php get_footer(); ?>