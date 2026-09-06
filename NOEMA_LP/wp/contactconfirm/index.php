<?php
/*
Template Name: お問い合わせ確認
*/
?>

<?php get_header(); ?>
	<main class="pageMain formPage" id="contactConfirm">
		<div class="pageMainContainer">
			<div class="pageTitleContainer">
				<div class="pageTtlBox">
					<div class="sub">
						<p>CONFIRM</p>
					</div>
					<div class="secTtl">
						<h1>内容確認</h1>
					</div>
				</div>
			</div>
			<div id="section__contact">
				<div class="formConfirm">
					<?php echo do_shortcode('[mwform_formkey key="20"]'); ?>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>