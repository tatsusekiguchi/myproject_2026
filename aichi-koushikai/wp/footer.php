<!-- ▽footer▽-->
<footer class="footer">
	<?php if ( is_front_page() ) : ?>
	<div class="footerContact">
		<div class="footerContactText">
			<p>「今の塾で、このままでいいのか不安」「志望校に向けて、何から始めればいいかわからない」</p>
			<p>「子どもの勉強について相談したい」そんな段階でも構いません。</p>
			<p>愛知講師会では、入会を前提としない学習相談も受け付けています。</p>
		</div>
		<div class="footerContactList">
			<div class="footerContactItem">
				<div class="footerContactItemText">
					<h2>学習相談</h2>
					<p>通塾を前提としない、学習に関するご相談はこちら。</p>
				</div>
				<div class="btnMore"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'contact' ) . '#consultation-form' ); ?>"><span>学習相談をする</span></a></div>
			</div>
			<div class="footerContactItem">
				<div class="footerContactItemText">
					<h2>入会・体験授業について</h2>
					<p>入会や体験授業に関するお問い合わせはこちら。</p>
				</div>
				<div class="btnMore"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'contact' ) . '#contact-form' ); ?>"><span>お問い合わせをする</span></a></div>
			</div>
		</div>
		<div class="footerNotice">
			<p>平日16:00～22:00　※授業中など、お電話に出られない場合がございます。　※お問い合わせには3日以内を目安にご連絡いたします。</p>
		</div>
	</div>
	<?php endif; ?>
	<div class="footerMain">
		<div class="footerLogo"><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/common/header_logo.png' ) ); ?>" alt="愛知講師会" width="218" height="55"></div>
		<div class="footerSns">
			<ul>
				<li><a href="#" aria-label="YouTube">YouTube</a></li>
				<li><a href="#" aria-label="Instagram">Instagram</a></li>
			</ul>
		</div>
		<div class="footerDescription">
			<p>愛知講師会は、本山を拠点に小規模で一人ひとりに寄り添う形で運営しております。</p>
			<p>営業・勧誘等の防止のため、教室所在地はWebサイト上では公開しておりません。</p>
			<p>ご訪問や所在地の確認をご希望の方は、お問い合わせください。</p>
		</div>
		<div class="footerButtons">
			<div class="footerBtn footerBtnConsult"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'contact' ) . '#consultation-form' ); ?>">学習相談をする</a></div>
			<div class="footerBtn footerBtnContact"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'contact' ) . '#contact-form' ); ?>">お問い合わせ</a></div>
		</div>
		<div class="footerCopyright"><small>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> 愛知講師会.</small></div>
	</div>
</footer>
<!-- △footer△-->

<?php wp_footer(); ?>
</body>
</html>
