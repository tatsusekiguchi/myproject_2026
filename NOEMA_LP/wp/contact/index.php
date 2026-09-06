<?php
/*
Template Name: お問い合わせページ
*/
?>

<?php get_header(); ?>
	<main class="pageMain formPage" id="contact">
		<div class="pageMainContainer">
			<div class="pageTitleContainer">
				<div class="pageTtlBox">
					<div class="sub">
						<p>CONTACT</p>
					</div>
					<div class="secTtl">
						<h1>お問い合わせ</h1>
					</div>
				</div>
			</div>
			<div id="section__contact">
				<div class="topTxt txt">
					<p>お問い合わせは下記フォーマットにご記入いただき「個人情報の取り扱いについて同意」に<br class="pcBreak">チェックボタンを押して内容をご確認のうえ、送信してください。自動で受付メールを送信いたします。<br>メールが送信されない場合、お手数ですが、下記電話番号までご連絡ください。</p>
				</div>
				<div class="formBox">
					<?php echo do_shortcode('[mwform_formkey key="20"]'); ?>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>