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
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_sp.css">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_sp.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/attach.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/infiniteslide.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scrollAnimation.js"></script>
	<!-- title-->
	<title>
		<?php if(is_home()): ?>
			NPO法人日本TA協会
		<?php else: ?>
		<?php wp_title(''); ?>|NPO法人日本TA協会
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<header class="header">
		<div class="headTop">
			<div class="title">
				<p>TAAJは日本唯一の国際TA協会（ITAA）アフィリエイト団体です。</p>
			</div>
		</div>
		<div class="headMain">
			<div class="headWrap">
				<div class="headContainer">
					<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png" alt=""></a></div>
					<div class="headItem">
						<ul>
							<li><a href="<?php echo home_url(); ?>/about">About us</a></li>
							<li><a href="<?php echo home_url(); ?>/conference">年次大会</a></li>
							<li><a href="<?php echo home_url(); ?>/learn">ＴＡを学ぶ</a></li>
							<li><a href="<?php echo home_url(); ?>/certification">SV.資格取得</a></li>
							<li><a href="<?php echo home_url(); ?>/join">Join us</a></li>
							<li><a href="<?php echo home_url(); ?>/document">資料・連携</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<nav class="navBox">
			<div class="navWrap">
				<div class="navContainer">
					<div class="leftBox">
						<div class="navLogo"><img src="<?php bloginfo('template_url'); ?>/image/common/nav_logo.png" alt=""></div>
						<div class="info">
							<p>NPO法人日本ＴＡ協会</p>
							<p>〒162-0851 東京都新宿区弁天町９１番地</p>
							<p>公益財団法人神経研究所内</p>
							<p>日本ＴＡ協会事務局</p>
						</div>
						<div class="sns">
							<ul>
								<li><a href="https://www.instagram.com/npotaaj/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/nav_insta.png" alt=""></a></li>
								<li><a href="https://x.com/NPO_TAAJ" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/nav_x.png" alt=""></a></li>
							</ul>
						</div>
					</div>
					<div class="rightBox">
						<div class="navList">
							<ul>
								<li><a href="<?php echo home_url(); ?>">HOME</a></li>
								<li><a href="<?php echo home_url(); ?>/about">About us</a></li>
								<li><a href="<?php echo home_url(); ?>/conference">年次大会</a></li>
								<li><a href="<?php echo home_url(); ?>/learn">ＴＡを学ぶ</a></li>
								<li><a href="<?php echo home_url(); ?>/certification">SV.資格取得</a></li>
								<li><a href="<?php echo home_url(); ?>/document">資料・連携</a></li>
								<li><a href="<?php echo home_url(); ?>/instructor">講師紹介リスト</a></li>
							</ul>
							<ul>
								<li><a href="<?php echo home_url(); ?>/join">Join us</a></li>
								<li><a href="<?php echo home_url(); ?>/apply">-入会申込</a></li>
								<li><a href="<?php echo home_url(); ?>/annual">-年会費支払</a></li>
								<li><a href="<?php echo home_url(); ?>/newsletter">-メルマガ登録</a></li>
							</ul>
							<ul>
								<li><a href="<?php echo home_url(); ?>/faq">FAQ</a></li>
								<li><a href="<?php echo home_url(); ?>/newslist">最新情報</a></li>
								<li><a href="<?php echo home_url(); ?>/legal">特定商取引法に基づく表記</a></li>
								<li><a href="<?php echo home_url(); ?>/contact">お問い合わせ</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="navClose"><img src="<?php bloginfo('template_url'); ?>/image/common/nav_close.png" alt=""></div>
		</nav>
		<div class="hamburger"><img src="<?php bloginfo('template_url'); ?>/image/common/header_open.png" alt=""></div>
	</header>
	<!-- △header△-->