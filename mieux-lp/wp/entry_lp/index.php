<?php
/*
Template Name: エントリー(LP)
*/
?>
<?php get_header("lp"); ?>
	<main class="formPage" id="contact">
		<div id="section__contact">
			<div class="secWrap01">
				<div class="contactContainer">
					<div class="secTtlBox">
						<div class="secTtl secTtlEntry"><img src="<?php bloginfo('template_url'); ?>/lp-asset/image/form/title_entry.png" alt=""></div>
						<div class="sub">
							<h1>ご応募</h1>
						</div>
					</div>
					<div class="topTxt txt">
						<p>ご応募は下記フォーマットにご記入いただき「個人情報の取り扱いについて同意」に<br class="pcBreak">チェックボタンを押して内容をご確認のうえ、送信してください。自動で受付メールを送信いたします。<br>メールが送信されない場合、お手数ですが、下記電話番号までご連絡ください。</p>
					</div>
					<div class="formBox">
						<?php echo do_shortcode('[mwform_formkey key="425"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php get_footer("lp"); ?>