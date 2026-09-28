<?php get_header(); ?>

	<main class="topMain" id="top">
		<section class="topKvContainer">
			<div class="topKvImage"><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/top/top_kv_01.png' ) ); ?>" alt="教室で学ぶ生徒たち" width="1244" height="729" fetchpriority="high"></div>
			<div class="topKvContent">
				<h1>一人ひとりの<br>「合格への道」を、<br>ともに描く。</h1>
				<div class="topKvText">
					<p>志望校というゴールから逆算し、今やるべきことを見極める。<br class="pcBreak">一人ひとりの個性や学習状況に合わせた、<br class="pcBreak">講師歴22年のオーダーメイドの受験指導。</p>
				</div>
				<div class="topKvButtons">
					<div class="kvButton kvButtonPrimary"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'contact' ) ); ?>">学習相談をする</a></div>
					<div class="kvButton kvButtonSecondary"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'contact' ) ); ?>">お問い合わせ</a></div>
				</div>
			</div>
			<div class="topKvSide" aria-hidden="true">TAILOR-MADE GUIDANCE</div>
		</section>
		<section class="sectionNews">
			<div class="secContainer fadeUp">
				<div class="pageSecTtl">
					<p>NEWS</p>
					<h2>お知らせ</h2>
				</div>
				<div class="newsList">
					<?php if ( function_exists( 'have_rows' ) && have_rows( 'top_news' ) ) : ?>
						<?php while ( have_rows( 'top_news' ) ) : the_row(); ?>
							<?php
							$news_date      = get_sub_field( 'top_news_date' );
							$news_timestamp = $news_date ? strtotime( $news_date ) : false;
							$news_title     = get_sub_field( 'top_news_title' );
							$news_body      = get_sub_field( 'top_news_body' );
							?>
							<div class="newsItem">
								<div class="newsItemDate">
									<?php if ( $news_timestamp ) : ?>
										<time datetime="<?php echo esc_attr( wp_date( 'Y-m-d', $news_timestamp ) ); ?>"><?php echo esc_html( wp_date( 'n月j日', $news_timestamp ) ); ?></time>
									<?php endif; ?>
								</div>
								<div class="newsItemBody">
									<h3><?php echo esc_html( $news_title ); ?></h3>
									<?php if ( $news_body ) : ?>
										<p><?php echo wp_kses_post( $news_body ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<section class="sectionConcept">
			<div class="secWrap fadeUp">
				<div class="pageSecTtl">
					<p>CONCEPT</p>
					<h2>合格だけを目指すのではなく、<br>「どうすれば合格できるか」を、ともに考える。</h2>
				</div>
				<div class="conceptText">
					<p>講師として22年間、多くの生徒たちの受験に向き合ってきました。難関大学や医学部を目指す生徒たちと接する中で感じてきたのは、<br>同じ志望校を目指していても、必要な学習は一人ひとり違うということ。</p>
					<p>一人ひとりの今を見つめながら、志望校というゴールまでの道筋を考える。保護者の方とも同じチームとして、お子さまの成長と合格を支えていく。<br>それが、愛知講師会の考える受験指導です。</p>
				</div>
				<div class="btnMore"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'philosophy' ) ); ?>"><span>愛知講師会の想いを見る</span></a></div>
			</div>
		</section>
		<section class="sectionReason">
			<div class="secWrap">
				<div class="secContainer fadeUp">
					<div class="pageSecTtl">
						<p>REASON</p>
						<h2>経験豊富な講師が、直接向き合う</h2>
					</div>
					<div class="reasonList">
						<div class="reasonItem">
							<div class="reasonNum">01</div>
							<div class="reasonText">
								<h3>経験豊富な講師が、<br>直接向き合う</h3>
								<p>学生アルバイト講師に任せきりにはしません。講師歴22年の篠崎が、カリキュラムの設計から生徒一人ひとりの学習状況まで責任を持って見ていきます。</p>
							</div>
						</div>
						<div class="reasonItem">
							<div class="reasonNum">02</div>
							<div class="reasonText">
								<h3>志望校から逆算する、<br>オーダーメイドカリキュラム</h3>
								<p>まず志望校というゴールを定め、そこから逆算して、今何をすべきかを考える。一人ひとりの現在地と目標に合わせて、学習の優先順位まで含めた作戦を組み立てます。</p>
							</div>
						</div>
						<div class="reasonItem">
							<div class="reasonNum">03</div>
							<div class="reasonText">
								<h3>生徒の「今」を見ながら、<br>学習を調整する</h3>
								<p>日々の学習状況や理解度、モチベーションまで見ながら、その時々で「今、この子に必要なこと」を考える。生徒の変化に合わせて学習を調整していきます。</p>
							</div>
						</div>
					</div>
					<div class="btnMore"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'service' ) ); ?>"><span>愛知講師会の指導・サービスを見る</span></a></div>
				</div>
			</div>
		</section>
		<section class="sectionService">
			<div class="secContainer">
				<div class="serviceContent fadeUp">
					<div class="pageSecTtl">
						<p>SERVICE</p>
						<h2>一人ひとりに向き合うための、少人数制。</h2>
					</div>
					<div class="serviceText">
						<p>愛知講師会では、少人数での指導を基本としています。生徒一人ひとりの理解度や学習状況を把握しながら、必要な指導を行うためです。個別指導に加え、演習量を増やす特訓講座や、小論文など目的に応じた1対1の指導にも対応。志望校や現在の学習状況に合わせて、必要な学び方を組み合わせていきます。</p>
						<p>※コース名称は現在検討中のため仮称です。</p>
					</div>
					<div class="btnMore"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'class' ) ); ?>"><span>クラスについて詳しく見る</span></a></div>
				</div>
				<div class="serviceImage"><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/top/service_img.png' ) ); ?>" alt="講師が生徒を指導している様子" width="760" height="520" loading="lazy"></div>
			</div>
		</section>
		<section class="sectionVoice">
			<div class="secWrap">
				<div class="secContainer fadeUp">
					<div class="pageSecTtl">
						<p>VOICE</p>
						<h2>「ここに任せてよかった」と思っていただけるように。</h2>
					</div>
					<div class="sectionLead">
						<p>愛知講師会に通う生徒・保護者の皆さまからいただいた、実際の声をご紹介します。</p>
					</div>
					<?php
					$top_voice_items = function_exists( 'get_field' ) ? get_field( 'voice_items', 10 ) : array();
					$top_voice_items = is_array( $top_voice_items ) ? $top_voice_items : array();
					$top_parent_items = array();
					foreach ( $top_voice_items as $top_voice_item ) {
						if ( isset( $top_voice_item['voice_category'] ) && 'parent' === $top_voice_item['voice_category'] ) {
							$top_parent_items[] = $top_voice_item;
						}
					}
					$top_parent_items = array_slice( $top_parent_items, 0, 3 );
					?>
					<div class="voiceList">
						<?php foreach ( $top_parent_items as $top_parent_item ) : ?>
							<div class="voiceItem">
								<dl>
									<dt><?php echo esc_html( isset( $top_parent_item['voice_name'] ) ? $top_parent_item['voice_name'] : '' ); ?></dt>
									<dd><?php echo wp_kses_post( isset( $top_parent_item['voice_comment'] ) ? $top_parent_item['voice_comment'] : '' ); ?></dd>
								</dl>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="btnMore"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'voice' ) ); ?>"><span>実績・保護者の声を見る</span></a></div>
				</div>
			</div>
		</section>
		<section class="sectionAbout">
			<div class="secWrap01">
				<div class="secContainer fadeUp">
					<div class="pageSecTtl">
						<p>ABOUT US</p>
						<h2>私たちについて</h2>
					</div>
					<div class="aboutList">
						<div class="aboutItem">
							<div class="aboutText">
								<h3>講師紹介</h3>
								<p>経験と専門性を持つ講師が、直接、生徒と向き合います。</p>
							</div>
							<div class="btnMore btnMore--01"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'lecturer' ) ); ?>"><span>講師紹介を見る</span></a></div>
						</div>
						<div class="aboutItem">
							<div class="aboutText">
								<h3>教室案内</h3>
								<p>本山で、落ち着いて学べる環境を。</p>
							</div>
							<div class="btnMore btnMore--01"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'access' ) ); ?>"><span>教室案内を見る</span></a></div>
						</div>
						<div class="aboutItem">
							<div class="aboutText">
								<h3>よくあるご質問</h3>
								<p>入塾前に気になることに、お答えします。</p>
							</div>
							<div class="btnMore btnMore--02"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'faq' ) ); ?>"><span>よくあるご質問を見る</span></a></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="sectionBlog">
			<div class="secContainer fadeUp">
				<div class="pageSecTtl">
					<p>BLOG</p>
					<h2>受験や学習に役立つ情報をお届けします</h2>
				</div>
				<?php
				$top_blog_query = new WP_Query(
					array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'posts_per_page' => 3,
					)
				);
				?>
				<div class="blogList">
					<?php if ( $top_blog_query->have_posts() ) : ?>
						<?php while ( $top_blog_query->have_posts() ) : $top_blog_query->the_post(); ?>
							<a class="blogItem" href="<?php the_permalink(); ?>">
								<div class="blogItemDate">
									<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'n月j日' ) ); ?></time>
								</div>
								<div class="blogItemText">
									<h3><?php the_title(); ?></h3>
								</div>
							</a>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<?php wp_reset_postdata(); ?>
				<div class="btnMore"><a href="<?php echo esc_url( aichi_koushikai_page_url( 'bloglist' ) ); ?>"><span>ブログを見る</span></a></div>
			</div>
		</section>
	</main>


<?php get_footer(); ?>


