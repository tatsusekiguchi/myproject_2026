<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<?php $seo = aichi_koushikai_seo_data(); ?>
	<meta name="description" content="<?php echo esc_attr( $seo['description'] ); ?>">
	<meta name="keywords" content="<?php echo esc_attr( $seo['keywords'] ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ▽header▽-->
<header class="header">
	<div class="headerInner">
		<a class="headerLogo" href="<?php echo esc_url( aichi_koushikai_page_url() ); ?>" aria-label="愛知講師会 トップページ">
			<img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/common/header_logo.png' ) ); ?>" alt="愛知講師会" width="218" height="55">
		</a>
		<button class="hamburger" type="button" aria-controls="globalNav" aria-expanded="false" aria-label="メニューを開く"><span></span><span></span><span></span></button>
		<nav class="navBox" id="globalNav" aria-label="メインナビゲーション">
			<div class="navList">
				<ul>
					<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'philosophy' ) ); ?>">愛知講師会の想い</a></li>
					<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'service' ) ); ?>">サービス紹介</a></li>
					<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'class' ) ); ?>">クラス紹介</a></li>
					<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'lecturer' ) ); ?>">講師紹介</a></li>
					<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'access' ) ); ?>">教室案内</a></li>
					<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'bloglist' ) ); ?>">ブログ</a></li>
					<li><a href="<?php echo esc_url( aichi_koushikai_page_url( 'faq' ) ); ?>">よくある質問</a></li>
					<li>
						<div class="headerContact"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'contact' ) ); ?>">お問い合わせ</a></div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
<!-- △header△-->
