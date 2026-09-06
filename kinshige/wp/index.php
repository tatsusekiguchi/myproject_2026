<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="main" id="top">
		<div class="topKvContainer">
			<div class="topKvLogoPanel">
				<h1 class="topKvLogo"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png" alt="近繁"></h1>
			</div>
		<?php if (have_rows('top_banners', 30)): ?>
			<div class="topBnrPanel">
				<?php while (have_rows('top_banners', 30)): the_row();
						$banner_image = get_sub_field('banner_image');
						$banner_url = get_sub_field('banner_url');
						$banner_visible = get_sub_field('banner_visible');

						// 表示フラグがオンのバナーのみ表示
						if ($banner_visible && $banner_image): ?>
							<div class="topBnr">
								<?php if ($banner_url): ?>
									<a href="<?php echo esc_url($banner_url); ?>" target="_blank" rel="noopener">
										<img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_image['alt']); ?>">
									</a>
								<?php else: ?>
									<img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_image['alt']); ?>">
								<?php endif; ?>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="topSection">
			<div class="secContainer">
				<div class="txtPanel">
					<div class="txtBox">
						<div class="ttl fadeUp">
							<h2>創業百三十年、<br>変わらぬ手法で<br>守り続ける味。</h2>
						</div>
						<div class="txt fadeUp">
							<p>創業百三十年。<br>名古屋の地で、時代が変わっても私たちは変わらぬ手法で弁当を作り続けてきました。<br>既製品に頼らず、昔ながらの仕込みと手仕事を大切に、一つひとつ丁寧に。<br>会議や行事の折詰、法事やお寺のご用意、町内会の集まりまで、人数や内容は柔軟にご相談いただけます。<br>長年選ばれ続けてきた味と心配りで、集いのひとときを支えます。</p>
						</div>
						<div class="btnMore fadeUp"><a href="<?php echo home_url(); ?>/commitment">詳しく見る</a></div>
					</div>
				</div>
				<div class="photoPanel">
					<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_sec_img.png" alt=""></div>
				</div>
			</div>
		</div>
		<div class="lunchboxSec">
			<div class="secWrap01">
				<div class="pageSecTtlBox">
					<div class="pageSecTtl fadeUp">
						<h2>近繁のお弁当</h2>
					</div>
				</div>
				<div class="secPanelList">
					<div class="secPanel">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/lunchbox_photo_01.png" alt=""></div>
						<div class="txtBox fadeUp"><a href="<?php echo home_url(); ?>/sale">
								<div class="inner">
									<div class="ttlHead">
										<div class="ttl">
											<h3><em>店内販売</em></h3>
										</div>
										<div class="more"><img src="<?php bloginfo('template_url'); ?>/image/top/lunchbox_link_arrow.png" alt=""></div>
									</div>
									<div class="cntBody">
										<div class="txt">
											<p>火曜日から土曜日まで、店頭にてご用意している日常のお弁当です。<br>昔ながらの仕込みを大切にしながら、毎日でも食べ飽きない味わいを心がけています。<br>近隣にお住まいの方やお勤めの方、現場で働く方まで、幅広いお客さまに親しまれています。</p>
										</div>
									</div>
								</div>
							</a></div>
					</div>
					<div class="secPanel">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/lunchbox_photo_02.png" alt=""></div>
						<div class="txtBox fadeUp"><a href="<?php echo home_url(); ?>/packed">
								<div class="inner">
									<div class="ttlHead">
										<div class="ttl">
											<h3><em>折詰弁当<br></em><span>(お手土産用)</span></h3>
										</div>
										<div class="more"><img src="<?php bloginfo('template_url'); ?>/image/top/lunchbox_link_arrow.png" alt=""></div>
									</div>
									<div class="cntBody">
										<div class="txt">
											<p>ご挨拶やお持たせに適した、<br>品よくまとまった折詰弁当です。<br>見た目だけを飾ることなく、ひと品ひと品に手間と時間をかけた内容でお作りしています。<br>数量や内容のご相談にも柔軟に対応いたしますので、<br>お気軽にお声がけください。</p>
										</div>
									</div>
								</div>
							</a></div>
					</div>
					<div class="secPanel">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/lunchbox_photo_03.png" alt=""></div>
						<div class="txtBox fadeUp"><a href="<?php echo home_url(); ?>/wariko">
								<div class="inner">
									<div class="ttlHead">
										<div class="ttl">
											<h3><em>割子弁当<br></em><span>(会議・集会用)</span></h3>
										</div>
										<div class="more"><img src="<?php bloginfo('template_url'); ?>/image/top/lunchbox_link_arrow.png" alt=""></div>
									</div>
									<div class="cntBody">
										<div class="txt">
											<p>会議や集会の場で食べやすく、話の妨げにならないよう工夫した割子弁当です。<br>細かな料理を少しずつ詰め込み、味の変化を楽しんでいただけます。<br>法人さまのご利用が多く、配達や回収についても状況に応じて対応いたします。</p>
										</div>
									</div>
								</div>
							</a></div>
					</div>
					<div class="secPanel">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/lunchbox_photo_04.png" alt=""></div>
						<div class="txtBox fadeUp"><a href="<?php echo home_url(); ?>/houji">
								<div class="inner">
									<div class="ttlHead">
										<div class="ttl">
											<h3><em>慶事・法事・<br class="pcBreak">お食い初め</em></h3>
										</div>
										<div class="more"><img src="<?php bloginfo('template_url'); ?>/image/top/lunchbox_link_arrow.png" alt=""></div>
									</div>
									<div class="cntBody">
										<div class="txt">
											<p>お祝いの席から法要の場まで、用途や人数に応じたお弁当をご用意いたします。<br>お寺さまとのやり取りや、配膳・お茶のことなど、細かな点も事前にご相談可能です。<br>控えめでありながら心のこもった味で、大切な節目のひとときを支えます。</p>
										</div>
									</div>
								</div>
							</a></div>
					</div>
					<div class="secPanel">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/lunchbox_photo_05.png" alt=""></div>
						<div class="txtBox fadeUp"><a href="<?php echo home_url(); ?>/other">
								<div class="inner">
									<div class="ttlHead">
										<div class="ttl">
											<h3><em>その他</em></h3>
										</div>
										<div class="more"><img src="<?php bloginfo('template_url'); ?>/image/top/lunchbox_link_arrow.png" alt=""></div>
									</div>
									<div class="cntBody">
										<div class="txt">
											<p>季節に応じて、うなぎ弁当やおせち、オードブルなどの特別なお料理もご用意しております。<br>長年培ってきた仕込みと手仕事を生かし、行事や節目にふさわしい味わいに仕立てます。<br>企業さまの催しやご家庭でのお集まりなど、内容や数量についてもお気軽にご相談ください。</p>
										</div>
									</div>
								</div>
							</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="linkSec">
			<div class="secWrap01">
				<div class="itemPanel">
					<div class="itemBox fadeUp"><a href="<?php echo home_url(); ?>/faq">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/faq_photo.png" alt=""></div>
							<div class="ttl ttl01"><img src="<?php bloginfo('template_url'); ?>/image/top/faq_ttl.png" alt=""></div>
						</a></div>
					<div class="itemBox fadeUp"><a href="<?php echo home_url(); ?>/about">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/about_photo.png" alt=""></div>
							<div class="ttl ttl02"><img src="<?php bloginfo('template_url'); ?>/image/top/about_ttl.png" alt=""></div>
						</a></div>
				</div>
			</div>
		</div>
		<div class="newsSec">
			<div class="secWrap01">
				<div class="secContainer fadeUp">
					<div class="titleBox">
						<div class="ttl">
							<h2>お知らせ</h2>
						</div>
						<div class="more"><a href="<?php echo home_url(); ?>/newslist">一覧はこちら</a></div>
					</div>
					<div class="txtBox">
						<ul>
							<?php
							$args = array(
								'post_type' => 'post',
								'posts_per_page' => 3,
								'orderby' => 'date',
								'order' => 'DESC'
							);
							$news_query = new WP_Query($args);

							if ($news_query->have_posts()):
								while ($news_query->have_posts()): $news_query->the_post(); ?>
									<li><a href="<?php the_permalink(); ?>">
											<div class="photo">
												<?php if (has_post_thumbnail()): ?>
													<?php the_post_thumbnail('medium'); ?>
												<?php else: ?>
													<img src="<?php bloginfo('template_url'); ?>/image/top/news_photo_01.png" alt="">
												<?php endif; ?>
											</div>
											<div class="ttl">
												<p><?php the_title(); ?></p>
											</div>
										</a></li>
								<?php endwhile;
								wp_reset_postdata();
							endif;
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>