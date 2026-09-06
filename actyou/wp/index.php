<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="main" id="top">
		<div class="topKvContainer">
			<div class="topKv"></div>
			<div class="kvTitleBox">
				<div class="kvTitle01">
					<h1>サプライズと感動を、すべての旅に</h1>
				</div>
				<div class="kvTitle02">
					<p>Inspiring moments, travel beyond expectations in every journey.</p>
				</div>
			</div>
		</div>
		<div class="postSection">
			<div class="secWrap">
				<div class="secContainer">
					<?php
					$news_category_id = get_cat_ID('お知らせ');
					$staff_blog_category_id = get_cat_ID('スタッフブログ');
					$news_category_link = $news_category_id ? get_category_link($news_category_id) : home_url('/bloglist');
					$staff_blog_category_link = $staff_blog_category_id ? get_category_link($staff_blog_category_id) : home_url('/bloglist');
					?>
					<div class="section fadeUp">
						<div class="leftBox">
							<div class="pageSecTtlBox left">
								<h2>お知らせ</h2>
								<p>NEWS</p>
							</div>
							<div class="btnMore"><a href="<?php echo esc_url($news_category_link); ?>">一覧を見る</a></div>
						</div>
						<div class="rightBox">
							<div class="postPanel">
								<ul>
									<?php
									$news_query = new WP_Query(array(
										'post_type' => 'post',
										'posts_per_page' => 8,
										'category__in' => $news_category_id ? array($news_category_id) : array(0),
									));
									?>
									<?php if($news_query->have_posts()): ?>
									<?php while($news_query->have_posts()): $news_query->the_post(); ?>
									<li><a href="<?php the_permalink(); ?>"><span><?php echo get_the_date('Y.m.d'); ?></span>
											<p><?php the_title(); ?></p>
										</a></li>
									<?php endwhile; ?>
									<?php endif; ?>
									<?php wp_reset_postdata(); ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="section fadeUp">
						<div class="leftBox">
							<div class="pageSecTtlBox left">
								<h2>ブログ</h2>
								<p>BLOG</p>
							</div>
							<div class="btnMore"><a href="<?php echo esc_url($staff_blog_category_link); ?>">一覧を見る</a></div>
						</div>
						<div class="rightBox">
							<div class="postPanel">
								<ul>
									<?php
									$staff_blog_query = new WP_Query(array(
										'post_type' => 'post',
										'posts_per_page' => 3,
										'category__in' => $staff_blog_category_id ? array($staff_blog_category_id) : array(0),
									));
									?>
									<?php if($staff_blog_query->have_posts()): ?>
									<?php while($staff_blog_query->have_posts()): $staff_blog_query->the_post(); ?>
									<li><a href="<?php the_permalink(); ?>"><span><?php echo get_the_date('Y.m.d'); ?></span>
											<p><?php the_title(); ?></p>
										</a></li>
									<?php endwhile; ?>
									<?php endif; ?>
									<?php wp_reset_postdata(); ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="sectionWrap">
				<div class="secContainer01 fadeUp">
					<div class="secBox">
						<div class="photoBox">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/sec01_top_photo.png" alt=""></div>
						</div>
						<div class="txtBox">
							<div class="secTtl spbr">
								<h2>感動を形にする、<br>旅のプロフェッショナル</h2>
								<p>SERVICE</p>
							</div>
							<div class="txt">
								<p>昭和60年の創業以来、私たちは「サプライズと感動をモットーに」、法人の出張手配から団体旅行、教育旅行まで、あらゆる旅に真摯に向き合ってきました。<br>単なる手配にとどまらず、目的に応じた最適なご提案と、万が一の際にも迅速に対応できる体制で、安心して任せていただける存在であり続けています。<br>特に韓国・中国・東南アジアを中心としたエリアに強みを持ち、現地のランドオペレーターと直接連携することで、柔軟でスピーディーな手配を実現いたします。</p>
								<p>少数精鋭だからこそ実現できるフットワークの軽さと対応力で、お客様の目的に深く寄り添い、その先にある「期待を超えた感動」を形にすることが、私たちの役割です。</p>
							</div>
						</div>
					</div>
				</div>
				<div class="secContainer02 fadeUp">
					<h3 class="spbr">アクト・ユートラベルが<br>選ばれ続ける理由</h3>
					<div class="topTxt txt">
						<p>数ある旅行会社の中で、どこに依頼するか。<br>その選択は、旅の充実感や安心感に大きく影響します。<br>アクトユートラベルは、お客様の目的や状況に応じて“柔軟かつ最適な対応”を積み重ねてきました。<br>その一つひとつの積み重ねが信頼信頼へとつながり、多くのお客様に選ばれ続けている理由となっています。</p>
					</div>
					<div class="listPanel">
						<div class="listBox">
							<ul>
								<li>
									<dl>
										<dt>目的から逆算する提案力</dt>
										<dd>
											<div class="txt">
												<p>ご要望をそのまま形にするのではなく、<br>「この旅で何を叶えたいのか」をお客様<br>と一緒に考えることからはじめます。<br>それに対してベストな企画を提案し、<br>価値の高い旅へと導きます。</p>
											</div>
											<div class="dot dot01"></div>
											<div class="dot dot02"></div>
											<div class="dot dot03"></div>
											<div class="dot dot04"></div>
										</dd>
									</dl>
								</li>
								<li>
									<dl>
										<dt>アジアに強い、<br>ダイレクトな手配力</dt>
										<dd>
											<div class="txt">
												<p>韓国・中国・東南アジアを中心に、現地のランドオペレーターと直接連携しています。<br>スピーディーかつ柔軟な手配を実現し、<br>細かなご要望にも<br>小回りの利いた対応が可能です。</p>
											</div>
											<div class="dot dot01"></div>
											<div class="dot dot02"></div>
											<div class="dot dot03"></div>
											<div class="dot dot04"></div>
										</dd>
									</dl>
								</li>
								<li>
									<dl>
										<dt>状況に応じて<br>変化できる対応力</dt>
										<dd>
											<div class="txt">
												<p>状況に合わせた最適な判断と対応で、<br>スムーズな準備・実施・運営を<br>サポートいたします。<br>打合せから出発当日まで、<br>安心してお任せください。</p>
											</div>
											<div class="dot dot01"></div>
											<div class="dot dot02"></div>
											<div class="dot dot03"></div>
											<div class="dot dot04"></div>
										</dd>
									</dl>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="btnMore white"><a href="<?php echo home_url(); ?>/reason">選ばれる理由</a></div>
			</div>
		</div>
		<div class="sec02">
			<div class="section section01">
				<div class="secWrap01">
					<div class="secPanel fadeUp">
						<div class="secBox">
							<h2>法人のお客様</h2>
							<div class="txt">
								<p>海外・国内出張手配／社員旅行・周年旅行／報奨旅行（インセンティブツアー）／視察・研修旅行／MICE／招待旅行（VIPアテンド）／スポーツ・文化団体遠征／合宿／技能実習生の航空券手配 など</p>
							</div>
							<div class="btnMore white"><a href="<?php echo home_url(); ?>/corp">詳しくはこちら</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="section section02">
				<div class="secWrap01">
					<div class="secPanel fadeUp">
						<div class="secBox">
							<h2>学校・教育関連のお客様</h2>
							<div class="txt">
								<p>修学旅行／部活動遠征・合宿／大会参加／校外学習／遠足・社会見学／海外研修／教育視察／交流事業（姉妹校交流・国際交流）／引率教員の出張手配 など</p>
							</div>
							<div class="btnMore white"><a href="<?php echo home_url(); ?>/school">詳しくはこちら</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="section section03">
				<div class="secWrap01">
					<div class="secPanel fadeUp">
						<div class="secBox">
							<h2>個人のお客様</h2>
							<div class="txt">
								<p>海外旅行／家族旅行／記念旅行・ハネムーン／グループ旅行／オーダーメイド旅行／国内旅行／テーマ旅行（グルメ・世界遺産・スポーツ観戦など）／航空券・ホテル手配／団体旅行の個別アレンジ など</p>
							</div>
							<div class="btnMore white"><a href="<?php echo home_url(); ?>/personal">詳しくはこちら</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="section section04">
				<div class="secWrap01">
					<div class="secPanel fadeUp">
						<div class="secBox">
							<h2>旅行会社の方</h2>
							<div class="btnMore white"><a href="<?php echo home_url(); ?>/agency">詳しくはこちら</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sec03">
			<div class="secWrap01 fadeUp">
				<div class="secTtl">
					<h2>ツアー情報</h2>
					</div>
					<div class="listBox">
						<ul>
							<?php
							$exclude_category_ids = array_filter(array(
								get_cat_ID('お知らせ'),
								get_cat_ID('スタッフブログ'),
							));
							$tour_query = new WP_Query(array(
								'post_type' => 'post',
								'posts_per_page' => 4,
								'category__not_in' => $exclude_category_ids,
							));
							?>
							<?php if($tour_query->have_posts()): ?>
							<?php while($tour_query->have_posts()): $tour_query->the_post(); ?>
							<li><a href="<?php the_permalink(); ?>">
									<?php if(has_post_thumbnail()): ?>
									<div class="photoBox">
										<?php the_post_thumbnail('full'); ?>
									</div>
									<?php endif; ?>
									<div class="txtBox">
										<p><?php the_title(); ?></p>
									</div>
								</a></li>
							<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_postdata(); ?>
						</ul>
					</div>
				<div class="btnMore white"><a href="<?php echo home_url(); ?>/category/tour/">一覧を見る</a></div>
			</div>
		</div>
		<div class="instagramSection">
			<div class="section fadeUp">
				<div class="secWrap02">
					<div class="pageSecTtlBox">
						<h2>インスタグラム</h2>
						<p>海外情報</p>
					</div>
					<div class="instaPanel"><?php echo do_shortcode( '[instagram-feed feed=2]' ); ?></div>
					<div class="more"><a href="https://www.instagram.com/actyou_travel/" target="_blank" rel="noopener">VIAW MORE</a></div>
				</div>
			</div>
			<div class="section fadeUp">
				<div class="secWrap02">
					<div class="pageSecTtlBox">
						<h2>インスタグラム</h2>
						<p>国内情報</p>
					</div>
					<div class="instaPanel"><?php echo do_shortcode( '[instagram-feed feed=1]' ); ?></div>
					<div class="more"><a href="https://www.instagram.com/actyoutravel/" target="_blank" rel="noopener">VIAW MORE</a></div>
				</div>
			</div>
		</div>
		<div class="secAbout fadeUp">
			<div class="secWrap01">
				<div class="pageSecTtlBox">
					<h2>アクトユートラベルについて</h2>
					<p>ABOUT US</p>
				</div>
				<div class="listBox">
					<ul>
						<li><a href="<?php echo home_url(); ?>/company?sec01">
								<div class="photoBox">
									<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/about_list_01.png" alt=""></div>
									<div class="ttl">
										<p>代表メッセージ</p>
									</div>
								</div>
							</a></li>
						<li><a href="<?php echo home_url(); ?>/company?sec03">
								<div class="photoBox">
									<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/about_list_02.png" alt=""></div>
									<div class="ttl">
										<p>会社概要</p>
									</div>
								</div>
							</a></li>
						<li><a href="<?php echo home_url(); ?>/company?sec04">
								<div class="photoBox">
									<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/about_list_03.png" alt=""></div>
									<div class="ttl">
										<p>会社沿革</p>
									</div>
								</div>
							</a></li>
					</ul>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>
