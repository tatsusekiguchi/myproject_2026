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
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/infiniteslide.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scrollAnimation.js"></script>
	<?php if(is_page('company') || is_page_template('company/index.php')): ?>
	<script src="<?php bloginfo('template_url'); ?>/js/pagescroll.js"></script>
	<?php endif; ?>
	<!-- title-->
	<title>
		<?php if(is_home()): ?>
			名古屋発、国内旅行・海外旅行・格安航空券のアクト・ユートラベル
		<?php else: ?>
		<?php wp_title(''); ?>|名古屋発、国内旅行・海外旅行・格安航空券のアクト・ユートラベル
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<header class="header">
		<div class="headWrap">
			<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png" alt=""></a><span>ACTYOU TRAVEL</span></div>
			<nav class="navBox">
				<div class="navList">
					<ul>
						<li><a href="<?php echo home_url(); ?>/reason">選ばれる理由</a></li>
						<li><a href="<?php echo home_url(); ?>/flow">ご利用の流れ</a></li>
						<li><a href="<?php echo home_url(); ?>/faq">よくあるご質問</a></li>
						<li><a href="<?php echo home_url(); ?>/bloglist">ブログ</a></li>
						<li><a href="<?php echo home_url(); ?>/company">会社概要</a></li>
					</ul>
				</div>
				<div class="navItemBox">
					<div class="navItem01">
						<ul>
							<li><a href="<?php echo home_url(); ?>/corp">法人のお客様</a></li>
							<li><a href="<?php echo home_url(); ?>/school">学校・教育関連のお客様</a></li>
							<li><a href="<?php echo home_url(); ?>/personal">個人のお客様</a></li>
							<li><a href="<?php echo home_url(); ?>/agency">旅行会社の方</a></li>
						</ul>
					</div>
					<div class="navItem02">
						<div class="telBox">
							<div class="tel01"><a href="tel:0529514451"><span>TEL：</span><em>052-951-4451</em></a></div>
							<div class="tel02"><a href="tel:0529613360"><span>旅行代理店の方は 052-961-3360</span></a></div>
						</div>
						<div class="mailBox"><a href="<?php echo home_url(); ?>/contact"><span>お問い合わせ</span></a></div>
					</div>
				</div>
				<div class="langBox">
					<dl class="language accord">
						<dt class="lang">
							<p>Japanese</p>
						</dt>
						<dd class="langList">
							<ul>
								<li><a href="https://translate.google.com/translate?sl=ja&amp;tl=en&amp;u=<?php echo urlencode(home_url()); ?>" target="_blank" rel="noopener noreferrer">
										<div>
											<p>English</p>
										</div>
									</a></li>
								<li><a href="https://translate.google.com/translate?sl=ja&amp;tl=zh-CN&amp;u=<?php echo urlencode(home_url()); ?>" target="_blank" rel="noopener noreferrer">
										<div>
											<p>Chinese</p>
										</div>
									</a></li>
								<li><a href="https://translate.google.com/translate?sl=ja&amp;tl=ko&amp;u=<?php echo urlencode(home_url()); ?>" target="_blank" rel="noopener noreferrer">
										<div>
											<p>Korean</p>
										</div>
									</a></li>
							</ul>
						</dd>
					</dl>
				</div>
			</nav>
		</div>
		<div class="hamburger"><span></span><span></span><span></span></div>
	</header>
	<!-- △header△-->
