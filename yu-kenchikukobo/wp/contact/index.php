<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>
<!-- ▽メイン▽-->
<main class="main" id="contact">
	<div class="pageKvPanel">
		<div class="kvTitle">
			<h1>お問い合わせ</h1>
		</div>
		<div class="pageKv"><img src="<?php bloginfo('template_url'); ?>/image/contact/top_kv.png" alt=""></div>
	</div>
	<div class="sec01">
		<div class="secWrap01">
			<div class="pageSecTtlBox center">
				<div class="sub">
					<p>MAIL FORM</p>
				</div>
				<div class="pageSecTtl">
					<h2>メールでお問い合わせ</h2>
				</div>
			</div>
			<div class="topTxt txt">
				<p>リフォームや掲示板設置などのご相談、お見積りのご依頼は、こちらのフォームよりお送りください。<br>担当より折り返しご連絡させていただきます。</p>
			</div>
			<div class="contactContainer">
				<div class="formBox">
					<?php echo do_shortcode('[contact-form-7 id="5" title="お問い合わせフォーム"]'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="sec02">
		<div class="secWrap01">
			<div class="pageSecTtlBox center">
				<div class="sub">
					<p>PHONE</p>
				</div>
				<div class="pageSecTtl">
					<h2>電話でお問い合わせ</h2>
				</div>
			</div>
			<div class="telBox">
				<div class="tel"><a href="tel:0528838854">052-883-8854</a></div>
				<p>【受付時間】9:00～18:00</p>
			</div>
		</div>
	</div>
</main>
<!-- △メイン△-->
<?php get_footer(); ?>