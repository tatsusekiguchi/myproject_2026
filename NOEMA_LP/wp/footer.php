	<!-- ▽footer▽-->
	<footer class="footer">
		<div class="logo"><img src="<?php bloginfo('template_url'); ?>/image/common/footer_logo.png" alt=""></div>
		<div class="footBox01">
			<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/common/footer_photo.png" alt=""></div>
			<div class="footNav">
				<ul>
					<li><a href="<?php echo is_front_page() || is_home() ? '#' : home_url(); ?>">TOP</a></li>
					<li><a href="<?php echo is_front_page() || is_home() ? '#section__concept' : home_url() . '#section__concept'; ?>">CONCEPT</a></li>
					<li><a href="<?php echo is_front_page() || is_home() ? '#section__news' : home_url() . '#section__news'; ?>">WHAT'S NEW</a></li>
					<li><a href="<?php echo is_front_page() || is_home() ? '#section__features' : home_url() . '#section__features'; ?>">FEATURES</a></li>
					<li class="line"><a href="<?php echo is_front_page() || is_home() ? '#section__require' : home_url() . '#section__require'; ?>">WHO WE'RE LOOKING FOR</a></li>
					<li><a href="<?php echo is_front_page() || is_home() ? '#section__requirements' : home_url() . '#section__requirements'; ?>">REQUIREMENTS</a></li>
					<li><a href="<?php echo is_front_page() || is_home() ? '#section__info' : home_url() . '#section__info'; ?>">SALON LIST</a></li>
				</ul>
			</div>
		</div>
		<div class="footBox02">
			<dl>
				<dt>Sensitivity and Essence</dt>
				<dd>We shine a light on each individual’s unique sensibility and<br>become a driving force that leads them toward their next self.</dd>
			</dl>
			<div class="snsBox">
				<ul>
					<li><a href="https://www.instagram.com/noema.hair/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_instagram.png" alt=""></a></li>
					<li><a href="#" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_line.png" alt=""></a></li>
					<li><a href="#" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_twitter.png" alt=""></a></li>
				</ul>
			</div>
			<div class="bottomBox">
				<div class="copy">
					<p>Copyright &copy; NOEMA Ltd all rights reserved.</p>
				</div>
				<div class="policy"><a href="">プライバシーポリシー</a></div>
			</div>
		</div>
	</footer>
	<!-- △footer△-->
	 <?php wp_footer(); ?>
</body>

</html>