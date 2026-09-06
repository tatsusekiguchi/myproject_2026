<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>
<main class="main" id="contact">
	<div class="pageTitleContainer">
		<div class="pageTitleBox">
			<h1>お問い合わせ</h1>
			<p>CONTACT</p>
		</div>
	</div>
	<div class="sec01">
		<div class="secWrap01">
			<div class="topTxt txt">
				<p>NPO法人日本ＴＡ協会事務局へのお問い合わせは<br>下記フォームまたはお電話にてお問い合わせください。</p>
			</div>
			<div class="pageSecTtlBox">
				<div class="pageSecTtl">
					<h2>メールでのお問い合わせ</h2>
				</div>
			</div>
			<div class="contactContainer">
				<div class="formBox">
					<?php echo do_shortcode( '[contact-form-7 id="2c20be1" title="お問い合わせフォーム"]' ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="sec02">
		<div class="secWrap01">
			<div class="pageSecTtlBox">
				<div class="pageSecTtl">
					<h2>電話でのお問い合わせ</h2>
				</div>
			</div>
			<div class="telPanel">
				<div class="tel"><a href="tel:0368222743"><span>TEL.</span><em>03-6822-2743</em></a></div>
				<aside>
					<p>［受付時間］ 月・木 　９:３０～１６:３０<br>※上記以外の時間は留守番電話となりますのでご了承下さい。</p>
				</aside>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>