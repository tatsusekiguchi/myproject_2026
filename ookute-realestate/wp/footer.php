<!-- #BeginLibraryItem "/Library/ft.lbi" -->
 	<footer>
		<div class="contact_box">
			<div class="title" data-title="CONTACT">お問い合わせ</div>
			<p class="btn"><a href="<?php echo home_url(); ?>/contact">CONTACT</a></p>
		</div>
		<div class="footer_box">
			<dl>
				<dt><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/common/image/logo.svg" alt="三代目大久手不動産"></a></dt>
				<dd>〒453-0015 名古屋市名中村区<br class="sp">椿町13-16<br>サン・オフィス名駅新幹線口906
				<br>tel:052-325-3140<br>愛知県知事（2）第23668号</dd>
				<!--<dd><a href="https://goo.gl/maps/HrQRJhJoTetd4xCw7" target="_blank">Google map</a></dd>-->
			</dl>
			<nav>
				<ul>
					<li><a href="<?php echo home_url(); ?>">ホーム</a></li>
					<li><a href="<?php echo home_url(); ?>/company">会社概要</a></li>
					<li><a href="<?php echo home_url(); ?>/service">事業内容</a></li>
					<li><a href="<?php echo home_url(); ?>/property">物件情報</a></li>
					<li><a href="<?php echo home_url(); ?>/contact">お問い合わせ</a></li>
				</ul>
				<ul>
					<li><a href="<?php echo home_url(); ?>/privacy">プライバシーポリシー</a></li>
                    <li><a href="<?php echo home_url(); ?>/sitemap">サイトマップ</a></li>
				</ul>
			</nav>
		</div>
		<small>&copy; Sandaime Okute Fudosan Inc.</small>
	</footer><!-- #EndLibraryItem --><script src="<?php bloginfo('template_url'); ?>/common/js/wd.js"></script>
	<script>$(document).ready(tgBrowserWidth());</script>
	<?php wp_footer(); ?>
</body>

</html>