<?php
/*
Template Name: その他
*/
?>
<?php get_header(); ?>
	<main class="main lunchboxMain" id="other">
		<div class="pageKvContainer">
			<div class="pageKvPanel">
				<div class="kvTtl">
					<h1>その他</h1>
				</div>
			</div>
		</div>
		<div class="topSection">
			<div class="secWrap01">
				<div class="secContainer">
					<div class="txtBox">
						<h2>季節とともに味わう、<br>近繁の一品</h2>
						<div class="txt">
							<p>近繁では、定番のお弁当のほかにも、季節に合わせた特別なお料理や、長年親しまれてきた名物惣菜をご用意しております。<br>お正月のおせち、夏のうなぎ弁当、行事に合わせた仕立てやオードブルなど、<br>用途に応じて幅広く取り揃えております。<br>また、玉子焼きをはじめとする一品料理もご好評をいただいております。<br>通年で掲載・ご相談を承っておりますので、行事やお集まりの際はお気軽にお問い合わせください。</p>
						</div>
					</div>
					<?php
					$list01_images = array();
					if (have_rows('other_photo_list01')):
						while (have_rows('other_photo_list01')): the_row();
							$image = get_sub_field('image');
							if ($image) {
								$list01_images[] = $image;
							}
						endwhile;
					endif;

					$list01_count = count($list01_images);
					if ($list01_count > 0):
					?>
					<div class="photoList01">
						<?php if ($list01_count >= 2): ?>
						<ul class="multi">
							<?php for ($i = 0; $i < min(2, $list01_count); $i++): ?>
							<li><img src="<?php echo esc_url($list01_images[$i]['url']); ?>" alt="<?php echo esc_attr($list01_images[$i]['alt']); ?>"></li>
							<?php endfor; ?>
						</ul>
						<?php endif; ?>
						<?php if ($list01_count >= 3): ?>
						<div class="single"><img src="<?php echo esc_url($list01_images[2]['url']); ?>" alt="<?php echo esc_attr($list01_images[2]['alt']); ?>"></div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
				<?php
				$list02_images = array();
				if (have_rows('other_photo_list02')):
					while (have_rows('other_photo_list02')): the_row();
						$image = get_sub_field('image');
						if ($image) {
							$list02_images[] = $image;
						}
					endwhile;
				endif;

				$list02_count = count($list02_images);
				if ($list02_count > 0):
				?>
				<div class="photoList02">
					<ul>
						<?php foreach ($list02_images as $image): ?>
						<li><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="telSection">
			<div class="secWrap01">
				<div class="topTxt">
					<p>近繁では、仕出し・配達・お持ち帰りにて折詰弁当のご注文を承っております。<br>内容や数量、配達の可否につきましては、お電話にてご相談ください。</p>
				</div>
				<div class="itemBox">
					<dl>
						<dt>電話でお問い合わせ</dt>
						<dd>
							<div class="tel"><a href="tel:052-551-0570">０５２-５５１-０５７０</a></div>
						</dd>
					</dl>
					<aside>
						<p>午前１０時から１２時までは電話は仕込みにつき、<br>お電話に出られない場合がございます。<br>予めご了承ください。</p>
					</aside>
				</div>
				<div class="limitBox">
					<dl>
						<dt><span>□</span><em> ご注文期限</em></dt>
						<dd>・原則として前日までにお願いいたします<br>・お電話でのご注文は、前日16時までにお願いいたします</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap01">
				<div class="pageSecTtlBox">
					<div class="pageSecTtl">
						<h2>近繁の<br>うなぎ弁当</h2>
					</div>
				</div>
				<div class="secBoxList">
					<div class="secBox">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/other/sec01_img_01.png" alt=""></div>
						<div class="txtBox">
							<h3>香ばしさ広がる、<br>近繁のうなぎ弁当</h3>
							<div class="txt">
								<p>ふっくらと焼き上げたうなぎを、近繁の味付けで丁寧に仕立てた一折です。<br>通年でご用意しており、会議や行事、ご家庭でのお集まりなど幅広い場面でご利用いただいています。<br>香ばしさと程よい甘みが広がる、世代を問わず親しまれる味わいです。</p>
								<p>※表示価格は消費税込です。</p>
							</div>
						</div>
					</div>
					<div class="secBox">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/other/sec01_img_02.png" alt=""></div>
						<div class="txtBox">
							<div class="ttlBox">
								<div class="reserveTtl"><img src="<?php bloginfo('template_url'); ?>/image/other/reserve_ttl.png" alt=""></div>
								<div class="ttl">
									<p><em>うな重弁当</em><span>（一尾）</span></p>
								</div>
								<div class="price">
									<p><em>価格：８５０</em><span>円</span></p>
								</div>
							</div>
							<div class="txt">
								<p>※タレ・山椒・わさび・肝付き</p>
								<p>朝、市場で活〆した新鮮なウナギをご注文いただいた分だけ１本ずつ丁寧に焼き上げます。<br>実がふっくらと熱く美味しいうなぎを予約販売だからこその特別価格でお届けします。</p>
							</div>
							<div class="btnMore"><a href="<?php bloginfo('template_url'); ?>/image/other/lunchbox.pdf" target="_blank" rel="noopener">注文書はこちら</a></div>
						</div>
					</div>
				</div>
				<?php if (have_rows('other_unagi_list')): ?>
				<div class="listBox">
					<ul>
						<?php while (have_rows('other_unagi_list')): the_row();
							$image = get_sub_field('image');
							$product_name = get_sub_field('product_name');
							$product_small_text = get_sub_field('product_small_text');
							$price = get_sub_field('price');
							$description = get_sub_field('description');
						?>
						<li>
							<?php if ($image): ?>
							<div class="photo"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></div>
							<?php endif; ?>
							<dl>
								<dt>
									<em><?php echo esc_html($product_name); ?><?php if ($product_small_text): ?><small><?php echo esc_html($product_small_text); ?></small><?php endif; ?></em>
									<span><?php echo esc_html($price); ?></span><small>円</small>
								</dt>
								<dd><?php echo nl2br(wp_kses_post($description)); ?></dd>
							</dl>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>
				<?php endif; ?>
				<?php if (have_rows('other_drinks_list')): ?>
				<div class="sideMenuSection">
					<div class="secTtl">
						<h3>お飲み物</h3>
					</div>
					<div class="menuList">
						<ul>
							<?php while (have_rows('other_drinks_list')): the_row();
								$product_name = get_sub_field('product_name');
								$price = get_sub_field('price');
							?>
							<li>
								<dl>
									<dt><?php echo esc_html($product_name); ?></dt>
									<dd><?php echo esc_html($price); ?>円</dd>
								</dl>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
				<?php endif; ?>
				<?php if (have_rows('other_side_menu_list')): ?>
				<div class="sideMenuSection">
					<div class="secTtl">
						<h3>サイドメニュー</h3>
					</div>
					<div class="menuList">
						<ul>
							<?php while (have_rows('other_side_menu_list')): the_row();
								$product_name = get_sub_field('product_name');
								$price = get_sub_field('price');
							?>
							<li>
								<dl>
									<dt><?php echo esc_html($product_name); ?></dt>
									<dd><?php echo esc_html($price); ?>円</dd>
								</dl>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="sec02">
			<div class="secWrap01">
				<div class="pageSecTtlBox">
					<div class="pageSecTtl">
						<h2>近繁の<br>おもたせ</h2>
					</div>
				</div>
				<div class="topBox">
					<h3>手土産に選ばれる、<br>やさしい味わい</h3>
					<div class="txt">
						<p>ご挨拶やちょっとしたお礼にお使いいただける、おもたせの品もご用意しております。<br>中でも人気の「たまごまき」は、やさしい甘みとふんわりとした口当たりが特長の一品で、長年変わらぬ味わいで、多くのお客さまに親しまれています。<br>その他、世代を問わず喜ばれる品も取り揃えております。<br>気取らず、それでいてきちんとした印象を添えられるおもたせとしてご利用ください。</p>
						<p>※表示価格は消費税込です。</p>
					</div>
				</div>
				<?php if (have_rows('other_omotase_list')): ?>
				<div class="listBox">
					<ul>
						<?php while (have_rows('other_omotase_list')): the_row();
							$image = get_sub_field('image');
							$product_name = get_sub_field('product_name');
							$price = get_sub_field('price');
							$description = get_sub_field('description');
						?>
						<li>
							<?php if ($image): ?>
							<div class="photo"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></div>
							<?php endif; ?>
							<dl>
								<dt><em><?php echo esc_html($product_name); ?></em><span><?php echo esc_html($price); ?></span><small>円</small></dt>
								<dd><?php echo nl2br(wp_kses_post($description)); ?></dd>
							</dl>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if (get_field('other_osechi_visible')): ?>
		<div class="sec03">
			<div class="secWrap01">
				<div class="pageSecTtlBox">
					<div class="pageSecTtl">
						<h2>近繁のおせち</h2>
					</div>
				</div>
				<div class="secBoxList">
					<div class="secBox">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/other/sec03_img_01.png" alt=""></div>
						<div class="txtBox">
							<h3>新春を祝う、<br>受け継がれる味</h3>
							<div class="txt">
								<p>一年のはじまりを彩る近繁のおせち。<br>創業以来守り続けてきた味付けを大切に、ひと品ひと品丁寧に仕立てています。<br>華やかさの中にも落ち着きを備え、ご家族の団らんの席や年始のご挨拶にもふさわしい内容です。<br>新しい年が穏やかに始まるよう願いを込めてお届けいたします。</p>
								<p>※表示価格は消費税込です。</p>
							</div>
						</div>
					</div>
					<div class="secBox">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/other/sec03_img_02.png" alt=""></div>
						<div class="txtBox">
							<div class="ttlBox">
								<div class="reserveTtl"><img src="<?php bloginfo('template_url'); ?>/image/other/reserve_ttl.png" alt=""></div>
								<div class="ttl">
									<p><em>おせち料理二段重</em><span>（２～３名様用）</span></p>
								</div>
								<div class="price">
									<p><em>価格：２４,８４０</em><span>円</span></p>
								</div>
							</div>
							<div class="txt">
								<p>サイズ：横２２３mm × 縦２２３mm × 縦１３４mm</p>
								<p>内容：卵焼き/鰆の幽庵焼/昆布巻/田作り/黒豆/栗きんとん/黄身酢和え（酢の物）/甘煮/くわいの含め煮/エビの姿煮/とこぶしの煮物/酢蓮根/いかの黄金和え/合鴨スモーク/くるみ/ゆり根/スモークサーモン　等</p>
								<p>※仕入れの都合上、変更する可能性がございます。</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</main>
<?php get_footer(); ?>