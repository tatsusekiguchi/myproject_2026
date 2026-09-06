<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="main" id="top">
		<div class="kvContainer">
			<div class="kvPanel">
				<div class="kvCnt">
					<div class="topKv"></div>
					<div class="titleBox titleBox01">
						<h1>NPO法人日本ＴＡ協会<br><em>本物のＴＡを学ぶ/<br></em>国際資格を取得する</h1>
					</div>
					<div class="titleBox titleBox02">
						<p>こころを<br><em>見る、知る、<br>動かす、育てる</em></p>
					</div>
					<div class="titleBox titleBox03">
						<p>プロレベルの<br><em>TA（交流分析）</em>を学ぶ</p>
					</div>
					<div class="titleBox titleBox04">
						<p>人間の成長を<br><em>ともに</em>デザインする</p>
					</div>
					<div class="titleBox titleBox05">
						<p>各種オンライン研修も開催<br><em>自宅で学ぶTA（交流分析）</em></p>
					</div>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap01">
				<div class="newsContainer fadeUp">
					<div class="wrap">
						<div class="secBox">
							<div class="leftBox">
								<div class="secTtl">
									<h2>最新情報</h2>
									<p>NEWS</p>
								</div>
								<div class="btnMore"><a href="<?php echo home_url(); ?>/newslist">もっと見る</a></div>
							</div>
							<div class="rightBox">
								<div class="newsList">
									<ul>
										<?php
										$args = array(
											'post_type' => 'post',
											'posts_per_page' => 10,
											'orderby' => 'date',
											'order' => 'DESC'
										);
										$news_query = new WP_Query($args);

										if ($news_query->have_posts()) :
											while ($news_query->have_posts()) : $news_query->the_post();
												$categories = get_the_category();
												$cat_class = '';
												$cat_name = '';

												if (!empty($categories)) {
													$cat_slug = $categories[0]->slug;
													$cat_name = $categories[0]->name;

													// カテゴリースラッグに応じてクラスを設定
													if ($cat_slug == 'info') {
														$cat_class = 'info';
													} elseif ($cat_slug == 'event-taaj') {
														$cat_class = 'event-taaj';
													} elseif ($cat_slug == 'event-relation') {
														$cat_class = 'event-relation';
													} elseif ($cat_slug == 'staff') {
														$cat_class = 'staff';
													}
												}
										?>
										<li>
											<div class="infoBox">
												<div class="time">
													<p><?php echo get_the_date('Y.m.d'); ?></p>
												</div>
												<div class="cate <?php echo $cat_class; ?>">
													<p><?php echo $cat_name; ?></p>
												</div>
											</div>
											<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
										</li>
										<?php
											endwhile;
											wp_reset_postdata();
										endif;
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="secPanel fadeUp">
					<div class="logoBox">
						<div class="logo"><img src="<?php bloginfo('template_url'); ?>/image/top/sec01_logo.png" alt=""></div>
					</div>
					<div class="txtBox">
						<div class="txt">
							<p>日本ＴＡ協会は、交流分析（ＴＡ）の健全な普及と専門的な実践支援を行う団体です。<br>人間関係の改善や自己理解の深化に役立つＴＡ理論を、教育・医療・福祉・ビジネスなど多様な分野で活かせるよう、研修・研究活動・資格制度を通じて広く提供しています。<br>専門家から一般の方まで、だれもが学び成長できる環境づくりを使命としています。</p>
						</div>
						<div class="btnMore"><a href="<?php echo home_url(); ?>/about">もっと見る</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="instaSection fadeUp">
			<div class="secWrap01">
				<div class="secTtl">
					<h2>INSTAGRAM</h2>
					<p>最新情報をお届けします</p>
				</div>
				<div class="instaPanel">
					<?php echo do_shortcode( '[instagram-feed feed=1]' ); ?>
				</div>
				<div class="btnMore"><a href="https://www.instagram.com/npotaaj/" target="_blank" rel="noopener">Instagramを見る</a></div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>