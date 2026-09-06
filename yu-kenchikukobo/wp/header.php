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
	 <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_sp.css">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_sp.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/attach.css">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/infiniteslide.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scrollAnimation.js"></script>
	<!-- title-->
	<title>
		<?php if(is_home()): ?>
			名古屋市緑区を中心としたエリアの新築・リフォーム・オーダーキッチンのことなら遊建築工房
		<?php else: ?>
		<?php wp_title(''); ?>|名古屋市緑区を中心としたエリアの新築・リフォーム・オーダーキッチンのことなら遊建築工房
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<header class="header">
		<div class="headBox">
			<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png" alt=""></a></div>
			<div class="hamburger" id="menuBtn"><span></span><span></span><span></span></div>
			<nav class="navBox">
				<ul>
					<li><a href="<?php echo home_url(); ?>/about"><em>遊 建築工房について</em></a></li>
					<li><a href="<?php echo home_url(); ?>/house"><em>リフォーム</em></a></li>
					<li><a href="<?php echo home_url(); ?>/seismic"><em>耐震制振リフォーム</em></a></li>
					<li><a href="<?php echo home_url(); ?>/board"><em>掲示板設置</em></a></li>
					<li><a href="<?php echo home_url(); ?>/voice"><em>お客様の声</em></a></li>
					<li><a href="<?php echo home_url(); ?>/faq"><em>よくあるご質問</em></a></li>
					<li><a href="<?php echo home_url(); ?>/caselist"><em>施工事例</em></a></li>
					<li class="contact"><a href="<?php echo home_url(); ?>/contact"><em>お問い合わせ</em></a></li>
				</ul>
			</nav>
		</div><a class="headContact" href="<?php echo home_url(); ?>/contact">
			<div><span>お問い合わせ</span></div>
		</a>
	</header>
	<!-- △header△-->