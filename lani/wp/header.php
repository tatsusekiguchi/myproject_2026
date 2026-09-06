<!doctype html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" >
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
		<meta name="format-detection" content="telephone=no" />
		<meta name="description" content="SALON'S HOT SPA Lani は、名古屋市昭和区桜山駅近くのプライベートネイルサロンです。完全予約制の貸切空間になっておりますので、気軽に来店できリラックスしてネイルを楽しめます。コルギ整体、酵素風呂、セルフホワイトニングも併せて行えるプライベートサロンです。">
		<meta name="keywords" content="ネイルサロン, 桜山, 昭和区, 名古屋市, Lani, ラニ, フットネイル,コルギ,酵素風呂">

		<!--css-->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick-theme.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.fancybox.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css">
		<link rel="stylesheet" media="screen and (max-width: 768px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_smt.css">
		<link rel="stylesheet" media="screen and (max-width: 768px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_smt.css">

		<!--js-->
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.scrollfollow.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
        <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/html5.min.js"></script>
        <![endif]-->

		<!--title-->
        <title>
        <?php if(is_home()): ?>
        <?php bloginfo('name'); ?>
        <?php else: ?>
        <?php wp_title(''); ?> ｜ <?php bloginfo('name'); ?>
        <?php endif; ?>
        </title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-47125520-36"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-47125520-36');
</script>
        <?php wp_head(); ?>

	</head>

<body>

	<p id="sideBtn"><a href="https://lani.mje-whitening.com/" target=”_blank”><img src="<?php echo get_template_directory_uri(); ?>/image/common/bnr_teeth.png" alt="歯のホワイトニング"></a></p>
	<!--▽header▽-->
	<header>
		<div class="headWrap clearfix">
			<h1 class="logo"><a href="<?php echo home_url() ?>/"><img src="<?php echo get_template_directory_uri(); ?>/image/common/header_logo.png" alt="SALONS HOT  SPA Lani"></a></h1>
			<p id="spMenuBtn"><img src="<?php echo get_template_directory_uri(); ?>/image/common/header_menu_sp.png" alt="MENU"></p>
			<div class="headBox">
				<p>SALON'S HOT  SPA Lani (サロンズ ホットスパ  ラニ) は、名古屋市昭和区桜山駅近くのプライベートサロンです。<br />駐車場もございます。</p>
				<nav>
					<ul id="btnList">
						<li><a href="https://lin.ee/0A6lOKw" target=”_blank”><img src="<?php echo get_template_directory_uri(); ?>/image/common/header_line.png" alt=""></a></li>
						<li><a href="https://www.facebook.com/Private-Nailsalon-Lani-812742888824257/" target=”_blank”><img src="<?php echo get_template_directory_uri(); ?>/image/common/header_fb.png" alt=""></a></li>
						<li><a href="https://www.instagram.com/salonshotspalani/?hl=ja" target=”_blank”><img src="<?php echo get_template_directory_uri(); ?>/image/common/header_insta.png" alt=""></a></li>
						<li class="reserve"><a href="https://beauty.hotpepper.jp/kr/slnH000447583/coupon/" target="”_blank”"><img src="http://www.nail-lani.com/wp-content/themes/lani/image/common/header_reserve.png" alt="WEB予約"></a></li>
					</ul>
					<div id="gNav">
						<p id="navClose"><img src="<?php echo get_template_directory_uri(); ?>/image/common/header_close_sp.png" alt=""></p>
						<ul>
							<li><a href="<?php echo home_url() ?>/">TOP</a></li>
							<li><a href="<?php echo home_url() ?>/salon/">SALON</a></li>
							<li><a href="<?php echo home_url() ?>/menu-nail/">MENU＆PLICE</a></li>
							<li><a href="<?php echo home_url() ?>/nail/">NAIL</a></li>
							<li><a href="<?php echo home_url() ?>/eyelash/">EYELASH</a></li>
							<li><a href="<?php echo home_url() ?>/korugi/">KORUGI</a></li>
							<li><a href="<?php echo home_url() ?>/enzyme/">ENZYME BATH</a></li>
							<li><a href="https://lani.mje-whitening.com/" target=”_blank”>SELF WHITENING</a></li>
							<li><a href="<?php echo home_url() ?>/gallery/">GALLERY</a></li>
							<li><a href="<?php echo home_url() ?>/contact/">CONTACT</a></li>
						</ul>
						<p><a href="https://lani.mje-whitening.com/" target=”_blank”><img src="<?php echo get_template_directory_uri(); ?>/image/common/bnr_teeth.png" alt="歯のホワイトニング"></a></p>
					</div>
				</nav>
			</div>
		</div>
	</header>
	<!--△header△-->
