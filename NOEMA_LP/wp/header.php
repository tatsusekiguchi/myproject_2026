<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<!-- css-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick-theme.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/validationEngine.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css">
	<link rel="stylesheet" media="screen and (max-width: 1139px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_sp.css">
	<link rel="stylesheet" media="screen and (max-width: 1139px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_sp.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/attach.css">
	<!-- js-->
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/infiniteslide.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scrollAnimation.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/gsapAnimation.js"></script>
	<script>
		(function(d) {
			var config = {
					kitId: 'zmp5pxk',
					scriptTimeout: 3000,
					async: true
				},
				h = d.documentElement,
				t = setTimeout(function() {
					h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
				}, config.scriptTimeout),
				tk = d.createElement("script"),
				f = false,
				s = d.getElementsByTagName("script")[0],
				a;
			h.className += " wf-loading";
			tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
			tk.async = true;
			tk.onload = tk.onreadystatechange = function() {
				a = this.readyState;
				if (f || a && a != "complete" && a != "loaded") return;
				f = true;
				clearTimeout(t);
				try {
					Typekit.load(config)
				} catch (e) {}
			};
			s.parentNode.insertBefore(tk, s)
		})(document);
	</script>
	<script src="<?php bloginfo('template_url'); ?>/js/kvSlideshow.js"></script>
	<!-- title-->
	<title>
		<?php if(is_home()): ?>
			NOEMA
		<?php else: ?>
		<?php wp_title(''); ?>｜NOEMA
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<header class="header">
		<div class="logo"><a href="<?php echo home_url(); ?>"><img class="logoWhite" src="<?php bloginfo('template_url'); ?>/image/common/header_logo_white.png" alt=""><img class="logoBlack" src="<?php bloginfo('template_url'); ?>/image/common/header_logo_black.png" alt=""></a></div>
		<div class="headItemBox">
			<div class="headItem">
				<ul>
					<li><a href="<?php echo home_url(); ?>/contact">お問い合わせ</a></li>
					<li><a href="<?php echo home_url(); ?>/entry">応募する</a></li>
				</ul>
			</div>
		</div>
		<div class="hamburgerBox">
			<div class="hamburger"><span class="top"></span>
				<p>MENU</p><span class="bottom"></span>
			</div>
		</div>
		<div class="navBox">
			<div class="navPanel">
				<div class="navList">
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
				<div class="navMessage">
					<p>We shine a light on each individual’s unique<br>sensibility and become a driving force that leads<br>them toward their next self.</p>
				</div>
				<div class="snsBox">
					<ul>
						<li><a href="https://www.instagram.com/noema.hair/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_instagram.png" alt=""></a></li>
						<li><a href="#" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_line.png" alt=""></a></li>
						<li><a href="#" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_twitter.png" alt=""></a></li>
					</ul>
					<div class="navLogo"><img src="<?php bloginfo('template_url'); ?>/image/common/nav_logo.png" alt=""></div>
				</div>
				<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/common/nav_photo.png" alt=""></div>
			</div>
		</div>
		<div class="fixedSpBottomNav">
			<ul>
				<li><a href="<?php echo home_url(); ?>/contact">お問い合わせ</a></li>
				<li><a href="<?php echo home_url(); ?>/entry">応募する</a></li>
			</ul>
		</div>
	</header>
	<!-- △header△-->