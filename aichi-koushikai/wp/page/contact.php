<?php
/*
Template Name: お問い合わせ
Template Post Type: page
*/
get_header();
?>

	<main class="contactMain" id="contact">
		<div class="pageKvContainer">
			<div class="pageKvPanel">
				<div class="pageKvTitle">
					<p>CONTACT</p>
					<h1>お問い合わせ</h1>
				</div>
				<div class="topicPath">
					<ol>
						<li><a href="<?php echo esc_url( aichi_koushikai_page_url() ); ?>">HOME</a></li>
						<li>お問い合わせ</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="contactPageBody">
			<section class="sectionContact" id="contact-form">
				<div class="secWrap">
					<div class="secContainer">
						<div class="containerWrap">
							<div class="pageSecTtl">
								<p>CONTACT</p>
								<h2>お問い合わせ</h2>
							</div>
							<div class="topTxt txt">
								<p>担当者より連絡いたします。3日以内に連絡いたします。</p>
							</div>
							<div class="formBox">
								<?php echo do_shortcode( '[contact-form-7 id="5" title="お問い合わせ"]' ); ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="sectionContact" id="consultation-form">
				<div class="secWrap">
					<div class="secContainer">
						<div class="containerWrap">
							<div class="pageSecTtl">
								<p>CONSULTATION</p>
								<h2>学習相談</h2>
							</div>
							<div class="topTxt txt">
								<p>担当者より連絡いたします。3日以内に連絡いたします。</p>
							</div>
							<div class="formBox">
								<?php echo do_shortcode( '[contact-form-7 id="57" title="学習相談"]' ); ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</main>


<?php get_footer(); ?>

