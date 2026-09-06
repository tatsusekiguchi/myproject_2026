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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_sp.css">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_sp.css">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>

	<!-- title-->
	<title>
    <?php if(is_home()): ?>
    <?php bloginfo('name'); ?>
    <?php else: ?>
    <?php wp_title(''); ?> ｜ <?php bloginfo('name'); ?>
    <?php endif; ?>
    </title>
    <?php wp_head(); ?>	
</head>

<body>
	<!-- ▽header▽-->
	<header>
		<div class="headWrap">
			<div class="logo"><a href="<?php echo home_url() ?>/"><img src="<?php echo get_template_directory_uri(); ?>/image/common/logo.png" alt="株式会社吉祥総合調査"></a></div>
			<div class="headBox">
				<div class="intro">
					<h1>採用調査、総務調査など企業調査なら名古屋の株式会社吉祥総合調査</h1>
					<div class="tel"><span>TEL：</span><a href="tel:0528389671">052-838-9671</a></div>
				</div>
				<div id="menuBtn"><span></span><span></span><span></span></div>
				<nav>
					<ul>
						<li><a href="<?php echo home_url() ?>/">トップページ</a></li>
						<li><a href="<?php echo home_url() ?>/survey/">調査内容</a></li>
						<li><a href="<?php echo home_url() ?>/about/">会社概要</a></li>
						<li><a href="<?php echo home_url() ?>/newslist/">新着情報</a></li>
						<li><a href="<?php echo home_url() ?>/contact">お問い合わせ</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- △header△-->