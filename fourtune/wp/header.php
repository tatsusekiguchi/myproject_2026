<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <meta name="format-detection" content="telephone=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
		<!--title-->
		<title>
		<?php if(is_home()): ?>
		<?php bloginfo('name'); ?>
		<?php else: ?>
		<?php wp_title(''); ?> ｜  <?php bloginfo('name'); ?>
		<?php endif; ?>
		</title>

		<!--css-->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common.css" />
		<?php if(is_home()): ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/slick.css">
		<?php else: ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout.css" />
		<?php endif; ?>
		<!--css(smt)-->
		<?php if(is_home()): ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_smt.css"  media="only screen and (min-width: 0px) and (max-width: 1024px)"/>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_smt.css"  media="only screen and (min-width: 0px) and (max-width: 1024px)"/>
		<?php else: ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_smt.css"  media="only screen and (min-width: 0px) and (max-width: 1024px)"/>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_smt.css"  media="only screen and (min-width: 0px) and (max-width: 1024px)"/>
		<?php endif; ?>
		<!--JavaScript-->
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
		<?php if(is_home()): ?>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/top.js"></script>
		<?php endif; ?>
		<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/html5.min.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body>
		<!--▽header▽-->
	<header>
		<div class="headTop">
			<div class="headLeft">
				<h1><?php echo esc_html( SCF::get( 'header-title' ) ?: '名古屋の英会話 子供・大人向け英語教室フォーチューン' ); ?></h1>
				<div class="logo"><a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/image/common/logo.png" alt="THE English Lesson Four Tune"></a></div>
			</div>
			<div class="headRight">
				<p class="pcTtl"><img src="<?php echo get_template_directory_uri(); ?>/image/common/header_ttl.png" alt="無料体験レッスン随時受付中です。"></p>
				<p class="pcTel"><img src="<?php echo get_template_directory_uri(); ?>/image/common/header_tel.png" alt="Tel.052-908-9177"></p>
			</div>
			<ul class="smtMenu">
				<li class="spTel"><a href="<?php echo home_url() ?>/contact/"><img src="<?php echo get_template_directory_uri(); ?>/image/common/btn_tel.png" alt="Tel.052-908-9177"></a></li>
				<li id="slideBtn"><a href="#">ナビ開閉ボタン</a></li>
			</ul>
		</div>

		<nav>
			<ul>
				<li <?php if ( is_page('top') ) { echo 'class="current"'; } ?>><a href="<?php echo home_url() ?>">ホーム</a></li>
				<li <?php if ( is_page('courselist') ) { echo 'class="current"'; } ?>><a href="<?php echo home_url() ?>/courselist/">コース紹介</a></li>
				<li <?php if ( is_page('teacher') ) { echo 'class="current"'; } ?>><a href="<?php echo home_url() ?>/teacher/">先生紹介</a></li>
				<li <?php if ( is_page('freelesson') ) { echo 'class="current"'; } ?>><a href="<?php echo home_url() ?>/freelesson/">無料体験レッスン</a></li>
				<li <?php if ( is_page('school') ) { echo 'class="current"'; } ?>><a href="<?php echo home_url() ?>/school/">スクール紹介</a></li>
				<li <?php if ( is_page('access') ) { echo 'class="current"'; } ?>><a href="<?php echo home_url() ?>/access/">アクセス</a></li>
				<li <?php if ( is_page('contact') ) { echo 'class="current"'; } ?>><a href="<?php echo home_url() ?>/contact/">お問い合わせ</a></li>
			</ul>
		</nav>
	</header>
	<!--△header△-->
