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
			名古屋の会議弁当・法事慶事仕出し【近繁】（きんしげ）名駅/栄/伏見/丸の内等へ配達
		<?php else: ?>
		<?php wp_title(''); ?> | 名古屋の会議弁当・法事慶事仕出し【近繁】（きんしげ）名駅/栄/伏見/丸の内等へ配達
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	 <header class="header">
		<div class="headWrap">
			<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png" alt="近繁"></a></div>
			<div class="navBox">
				<div class="navList">
					<ul>
						<li><a href="<?php echo home_url(); ?>/commitment">近繁のこだわり</a></li>
						<li>
							<p>取扱い弁当</p>
							<ul>
								<li><a href="<?php echo home_url(); ?>/sale">店内販売</a></li>
								<li><a href="<?php echo home_url(); ?>/packed">折詰弁当</a></li>
								<li><a href="<?php echo home_url(); ?>/wariko">割子弁当</a></li>
								<li><a href="<?php echo home_url(); ?>/houji">慶事・法事・お食い初め</a></li>
								<li><a href="<?php echo home_url(); ?>/other">その他</a></li>
							</ul>
						</li>
						<li><a href="<?php echo home_url(); ?>/faq">よくあるご質問</a></li>
						<li><a href="<?php echo home_url(); ?>/about">近繁について</a></li>
						<li><a href="<?php echo home_url(); ?>/newslist">お知らせ</a></li>
					</ul>
				</div>
				<div class="navItem">
					<div class="telBox">
						<p>お弁当のご予約はこちら（前日16時まで）</p>
						<div class="tel"><a href="tel:0525510570">052-551-0570</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="hamburger"><span></span><span></span><span></span></div>
	</header>
	<!-- △header△-->