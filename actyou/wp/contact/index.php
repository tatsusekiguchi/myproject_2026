<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>
	<main class="main" id="contact">
		<div class="pageKvContainer">
			<div class="pageKv">
				<div class="kvTitle">
					<h1>お問い合わせ</h1>
				</div>
			</div>
		</div>
		<div class="topSection">
			<div class="secWrap01">
				<div class="secTtl">
					<h2>お問い合わせの前に、よくあるご質問をご覧ください。</h2>
				</div>
				<div class="txt">
					<p>お申込みやサービスについてなどよくあるご質問をご用意しています。<br>より簡単に早く問題解決となる場合もありますので、ぜひご活用ください。</p>
				</div>
				<div class="faqBox">
					<div class="faqBtn"><a href="<?php echo home_url(); ?>/faq"><span>よくあるご質問</span></a></div>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap01">
				<div class="pageSecTtlBox">
					<h2>メールでお問い合わせ</h2>
					<p>MAIL</p>
				</div>
				<div class="topTxt txt">
					<p>お問い合わせいただきました内容につきましては、２～３営業日を目安にメールまたはお電話にてご連絡いたします。<br>※本フォームは、旅行に関するお問い合わせ専用です。<br>お客様への対応品質維持のため、営業・ご提案に関するご連絡はお控えいただけますと幸いです。</p>
				</div>
				<div class="contactContainer">
					<div class="formBox">
						<?php echo do_shortcode( '[contact-form-7 id="fc5a1a6" title="お問い合わせフォーム"]' ); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="sec02">
			<div class="secWrap01">
				<div class="pageSecTtlBox">
					<h2>電話でお問い合わせ</h2>
					<p>TEL</p>
				</div>
				<div class="topTxt txt">
					<p><em>受付時間 ９:３０～１８:００</em></p>
					<p>※本問い合わせ先は、旅行に関するお問い合わせ専用です。<br>お客様への対応品質維持のため、営業・ご提案に関するご連絡はお控えいただけますと幸いです。</p>
				</div>
				<div class="secBox">
					<div class="itemBox">
						<dl>
							<dt>個人・法人のお客様</dt>
							<dd>
								<div class="telBox">
									<div class="tel01"><a href="tel:0529613369">052-961-3369</a></div>
									<div class="tel02">
										<p>受付時間 ９:３０～１８:００</p>
									</div>
								</div>
							</dd>
						</dl>
					</div>
					<div class="itemBox">
						<dl>
							<dt>学校・教育関連のお客様</dt>
							<dd>
								<div class="telBox">
									<div class="tel01"><a href="tel:0529515510">052-951-5510</a></div>
									<div class="tel02">
										<p>受付時間 ９:３０～１８:００</p>
									</div>
								</div>
							</dd>
						</dl>
					</div>
					<div class="itemBox">
						<dl>
							<dt>旅行会社のお客様</dt>
							<dd>
								<div class="telBox">
									<div class="tel01"><a href="tel:0529613360">052-961-3360</a></div>
									<div class="tel02">
										<p>受付時間 ９:３０～１８:００</p>
									</div>
								</div>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
