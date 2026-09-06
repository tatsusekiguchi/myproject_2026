<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="岐阜・各務原にある美容院ROIの求人ページ。保証月給27万円、18時完全退勤、残業なし、 社保完備。ブランクのある方やママ美容師も安心して「自分の人生」を大切に働けるマン ツーマンサロンです。">
	<meta name="keywords" content="">
	<!-- favicon-->
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/image/favicon.ico">
	<link rel="apple-touch-icon" sizes="100x100" href="<?php bloginfo('template_url'); ?>/image/apple-touch-icon.png">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/image/apple-touch-icon.png">
	<!-- css-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick-theme.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css">
	<link rel="stylesheet" media="screen and (max-width: 1179px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_sp.css">
	<link rel="stylesheet" media="screen and (max-width: 1179px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_sp.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/attach.css">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/infiniteslide.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scrollAnimation.js"></script>
	<script>
		(function(d) {
			var config = {
					kitId: 'juu1rsh',
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
	<title>
		<?php if(is_home()): ?>
			岐阜・各務原の美容師求人・採用|髪質改善ヘアエステサロンROI
		<?php else: ?>
		<?php wp_title(''); ?> | 岐阜・各務原の美容師求人・採用|髪質改善ヘアエステサロンROI
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<header class="header">
		<div class="headWrap">
			<div class="leftBox">
				<div class="logoBox">
					<div class="logo"><a href="#"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo_black.png" alt=""></a></div>
				</div>
				<div class="headTtl">
					<p>岐阜・各務原の美容師求人・採用<br>髪質改善ヘアエステROI</p>
				</div>
			</div>
			<div class="rightBox">
				<div class="btnEntry"><a href="#section__entry">
						<p>サロンの雰囲気を見に行く<br>（見学・カジュアル面談）</p>
						<div class="icon"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_arrow_circle_white.png" alt=""></div>
					</a></div>
			</div>
		</div>
		<div class="hamburger"><span></span><span></span><span></span></div>
		<nav class="navBox">
			<div class="navContainer">
				<div class="infoPanel">
					<div class="inner">
						<div class="navList">
							<ul>
								<li><a href="#section__works"><span>ROI</span>の働き方</a></li>
								<li><a href="#section__environment">働く環境</a></li>
								<li><a href="#section__voices">スタッフボイス</a></li>
								<li><a href="#section__message">私たちが大切にしている事</a></li>
								<li><a href="#section__faq">よくある質問</a></li>
								<li><a href="#section__guideline">募集要項</a></li>
								<li><a href="#section__flow">採用フロー</a></li>
								<li><a href="#section__profile">サロン情報</a></li>
							</ul>
						</div>
						<div class="snsBox">
							<p>ご応募前の見学やカジュアルなご相談も歓迎しています。<br>公式LINEまたはInstagramのDMよりお待ちしております。</p>
							<div class="snsList">
								<div class="lineBtn"><a href="https://lin.ee/q4BNJkT" target="_blank" rel="noopener">
										<p>LINE</p>
										<div class="icon"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_arrow_circle_white.png" alt=""></div>
									</a></div>
								<div class="instaBtn"><a href="https://www.instagram.com/gifu.roi/" target="_blank" rel="noopener">
										<p>INSTAGRAM</p>
										<div class="icon"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_arrow_circle_white.png" alt=""></div>
									</a></div>
							</div>
						</div>
					</div>
				</div>
				<?php
				$roi_nav_photo = function_exists('get_field') ? get_field('nav_photo', 7) : '';
				$roi_nav_photo_url = get_bloginfo('template_url') . '/image/common/nav_photo.png';
				if (is_array($roi_nav_photo)) {
					if (!empty($roi_nav_photo['url'])) {
						$roi_nav_photo_url = $roi_nav_photo['url'];
					} elseif (!empty($roi_nav_photo['ID'])) {
						$roi_nav_photo_url = wp_get_attachment_image_url($roi_nav_photo['ID'], 'full');
					}
				} elseif (is_numeric($roi_nav_photo)) {
					$roi_nav_photo_url = wp_get_attachment_image_url($roi_nav_photo, 'full');
				} elseif (is_string($roi_nav_photo) && $roi_nav_photo !== '') {
					$roi_nav_photo_url = $roi_nav_photo;
				}
				?>
				<div class="photoPanel">
					<img src="<?php echo esc_url($roi_nav_photo_url); ?>" alt="">
				</div>
			</div>
		</nav>
	</header>
	<!-- △header△-->
