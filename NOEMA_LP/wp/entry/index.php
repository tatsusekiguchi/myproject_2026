<?php
/*
Template Name: 応募ページ
*/
?>

<?php get_header(); ?>
	<main class="pageMain formPage" id="contact">
		<div class="pageMainContainer">
			<div class="pageTitleContainer">
				<div class="pageTtlBox">
					<div class="sub">
						<p>ENTRY</p>
					</div>
					<div class="secTtl">
						<h1>応募する</h1>
					</div>
				</div>
			</div>
			<div id="section__contact">
				<div class="topBox">
					<dl>
						<dt>ご応募は以下の方法より<br class="spBreak">受け付けております。</dt>
						<dd>
							<p>InstagramのDMまたは下記エントリーフォームからご応募いただけます。<br>まずはお気軽にご連絡ください。</p>
						</dd>
					</dl>
					<div class="btnInsta"><a href="https://www.instagram.com/noema.hair/" target="_blank" rel="noopener">
							<div class="inner"><img src="<?php bloginfo('template_url'); ?>/image/form/entry_insta.png" alt=""><span>Instagramからご応募</span></div>
						</a></div>
				</div>
				<div class="formBox">
					<?php echo do_shortcode('[mwform_formkey key="22"]'); ?>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>