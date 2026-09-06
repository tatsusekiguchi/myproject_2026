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
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lp-asset/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lp-asset/css/slick.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lp-asset/css/slick-theme.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lp-asset/css/validationEngine.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lp-asset/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lp-asset/css/common.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lp-asset/css/layout.css">
	<link rel="stylesheet" media="screen and (max-width: 1139px)" type="text/css" href="<?php bloginfo('template_url'); ?>/lp-asset/css/common_sp.css">
	<link rel="stylesheet" media="screen and (max-width: 1139px)" type="text/css" href="<?php bloginfo('template_url'); ?>/lp-asset/css/layout_sp.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lp-asset/css/attach.css">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/lp-asset/js/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/lp-asset/js/slick.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/lp-asset/js/infiniteslide.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/lp-asset/js/common.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/lp-asset/js/scrollAnimation.js"></script>
	<script>
		(function(d) {
			var config = {
					kitId: 'fmx6ynq',
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
	<!-- title-->
	<title>肌質改善サロンmieux(ミュー) ｜栄に本店がある名古屋の肌質改善専門サロン</title>
	<?php wp_head(); ?>
</head>

<body>
	<?php
	// トップページ以外ではhome_url()を追加
	$current_url = $_SERVER['REQUEST_URI'];
	$is_lp_top = (strpos($current_url, '/lp') !== false && strpos($current_url, '/entry_lp') === false && strpos($current_url, '/contact_lp') === false);
	$lp_base = $is_lp_top ? '' : home_url() . '/lp';
	?>
	<!-- ▽header▽-->
	<header class="header">
		<div class="logoBox">
			<div class="logo logoWhite"><a href="<?php echo home_url(); ?>/lp"><img src="<?php bloginfo('template_url'); ?>/lp-asset/image/common/header_logo.png" alt=""></a></div>
			<div class="logo logoBlack"><a href="<?php echo home_url(); ?>/lp"><img src="<?php bloginfo('template_url'); ?>/lp-asset/image/common/header_logo_black.png" alt=""></a></div>
			<div class="headTtl">
				<p>東海エリアを中心に14店舗展開中の肌質改善サロン</p>
			</div>
		</div>
		<div class="navBox">
			<div class="navContainer">
				<div class="navList">
					<ul>
						<li><a href="<?php echo $lp_base; ?>#section__vision">mieuxのビジョン</a></li>
						<li><a href="<?php echo $lp_base; ?>#section__store">展開エリア</a></li>
						<li><a href="<?php echo $lp_base; ?>#section__message">オーナーメッセージ</a></li>
						<li><a href="<?php echo $lp_base; ?>#section__faq">よくある質問</a></li>
						<li><a href="<?php echo $lp_base; ?>#section__step">採用までの流れ</a></li>
					</ul>
					<ul>
						<li><a href="<?php echo $lp_base; ?>#section__attraction">４つの魅力</a></li>
						<li><a href="<?php echo $lp_base; ?>#section__recommend">こんな方におすすめ</a></li>
						<li><a href="<?php echo $lp_base; ?>#section__flow">開業までの流れ</a></li>
						<li><a href="<?php echo $lp_base; ?>#section__interview">FCオーナーの声</a></li>
					</ul>
				</div>
				<div class="navItem">
					<ul>
						<li>
							<div class="btnMore"><a href="<?php echo home_url(); ?>/entry_lp"><span>応募する</span></a></div>
						</li>
						<li>
							<div class="btnMore"><a href="<?php echo home_url(); ?>/contact_lp"><span>お問い合わせ</span></a></div>
						</li>
						<li>
							<div class="btnMore btnOfficial"><a href="http://mieux-cosme.com" target="_blank" rel="noopener"><span>オフィシャルサイト</span></a></div>
						</li>
					</ul>
				</div>
				<div class="navSns">
					<div class="insta"><a href="https://www.instagram.com/mieux___official/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/lp-asset/image/common/nav_insta.png" alt=""></a></div>
				</div>
			</div>
		</div>
		<div class="hamburger"><span></span><span></span><span></span></div>
		<div class="fixedNavBox">
			<ul>
				<li><a href="<?php echo home_url(); ?>/entry_lp"><span><span>応募する</span></span></a></li>
				<li><a href="<?php echo home_url(); ?>/contact_lp"><span><span>お問い合わせ</span></span></a></li>
			</ul>
		</div>
	</header>
	<!-- △header△-->