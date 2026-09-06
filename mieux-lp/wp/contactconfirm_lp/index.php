<?php
/*
Template Name: お問い合わせ確認(LP)
*/
?>
<?php get_header("lp"); ?>
	<main id="contactConfirm">
		<div id="section__contact">
			<div class="secWrap01">
				<div class="contactContainer">
					<div class="secTtlBox">
						<div class="secTtl secTtlContact"><img src="<?php bloginfo('template_url'); ?>/lp-asset/image/form/title_contact.png" alt=""></div>
						<div class="sub">
							<h1>お問い合わせ</h1>
						</div>
					</div>
					<div class="formConfirm">
						<?php echo do_shortcode('[mwform_formkey key="423"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			// 必須を*に置き換え
			const requiredLabels = document.querySelectorAll('em');
			requiredLabels.forEach(function(em) {
				if (em.textContent === '必須') {
					em.textContent = '*';
				}
			});
		});
	</script>
<?php get_footer("lp"); ?>