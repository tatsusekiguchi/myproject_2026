<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="top">
		<div id="fView">
			<dl class="ttl">
				<dt>企業を守る、<br>リスクマネジメントのエキスパート</dt>
				<dd>元警視庁組織犯罪対策部理事官・元愛知県警察署長・元検察庁刑事捜査、<br>刑事公判担当・エシカルハッカーが常駐する【日本で唯一の調査会社】</dd>
			</dl>
			<?php
                $the_query = new WP_Query( array(
                  'paged'       => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
                  'post_type'   => 'post',
                  'posts_per_page' => 1,
                ) ); ?>

            <?php if ( $the_query->have_posts() ) while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<dl class="news">
				<dt>NEWS</dt>
				<dd>
					<time datetime="<?php the_time("Y-m-d") ?>"><?php the_time("Y.m.d") ?></time><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</dd>
			</dl>
			<?php endwhile; ?>
		</div>
		<section id="about">
			<div class="intro">
				<div class="ttlBox">
					<h2><span>about</span><em>信頼を支える、確かな調査力<br>これまで培ってきた<br>豊富な経験と確かな実績</em></h2>
				</div>
				<div class="txt">
					<p>吉祥総合調査では、警察OBをはじめとする専門人材が在籍し、企業調査・採用調査・反社チェック・各種リスク対策まで幅広く対応しています。<br>日本で唯一の調査体制だからこそ可能な、精度の高い情報収集と的確な判断支援が強みです。<br>守秘義務を徹底し、お客様の大切な情報を適切に管理しながら、進捗や状況も丁寧に共有いたします。<br>前身の調査事務所より30年間調査業務に携わり、約10,000件以上の案件を担当いたしました。<br>おかげ様でトラブルは一件もありません。<br>今後とも、皆様から信頼のおける調査業務を行うよう努めてまいります。</p>
				</div>
				<div class="more"><a href="<?php echo home_url() ?>/about/">会社概要を見る</a></div>
			</div>
		</section>
		<section id="service">
			<div class="topContainer">
				<div class="txtPanel">
					<div class="txtBox">
						<h2>グローバル視点で見えないリスクを解決</h2>
						<div class="txt">
							<p>当社は独自のデータベースと調査ネットワークにより、国内はもちろん、中国、韓国、マレーシア、ベトナム、フィリピンに連携拠点を置くことで、国際的な企業調査、海外マフィア操作など、安心した取引をご提案します。</p>
						</div>
					</div>
				</div>
				<div class="mapPanel">
					<div class="map"><img src="<?php echo get_template_directory_uri(); ?>/image/top/service_map.png" alt=""></div>
				</div>
			</div>
			<div class="serviceContainer">
				<div class="ttlBox">
					<h2><span>service</span><em>企業調査</em></h2>
					<div class="txt">
						<p>社内にとどまらず、社外、企業間、市場の中での<br>人、もの、資産などに関するあらゆる調査を行います。</p>
					</div>
				</div>
				<div class="listBox">
					<ol>
						<li><a href="survey#sec01">
								<div class="num">01</div>
								<dl>
									<dt>反社会的勢力調査</dt>
									<dd>取引先や関係者が反社会的勢力と関係していないかを徹底調査。独自の情報網と専門的な知見により、企業のコンプライアンス強化と重大リスクの未然防止を支援します。</dd>
								</dl>
							</a></li>
						<li><a href="survey#sec02">
								<div class="num">02</div>
								<dl>
									<dt>法務・知的財産</dt>
									<dd>契約リスクや知的財産に関わるトラブルの有無を調査・分析。法的観点からのリスクを可視化し、企業活動における安全性と権利保護をサポートします。</dd>
								</dl>
							</a></li>
						<li><a href="survey#sec03">
								<div class="num">03</div>
								<dl>
									<dt>人事</dt>
									<dd>採用候補者や社員の経歴・評判・勤務実態などを多角的に確認し、採用ミスマッチや内部トラブルのリスクを低減し、健全な組織づくりに貢献します。</dd>
								</dl>
							</a></li>
						<li><a href="survey#sec04">
								<div class="num">04</div>
								<dl>
									<dt>労務システム開発</dt>
									<dd>企業ごとの業務内容や運用に合わせ、最適な労務システムを設計・開発します。<br>情報の一元管理とセキュリティ強化を図り、安定した業務運用を支えます。</dd>
								</dl>
							</a></li>
						<li><a href="survey#sec05">
								<div class="num">05</div>
								<dl>
									<dt>ネットによる誹謗中傷・風評被害対策</dt>
									<dd>インターネット上の誹謗中傷や風評の拡散状況を調査・分析。<br>被害の実態把握から対策提案まで行い、企業ブランドと信用の保護を支援します。</dd>
								</dl>
							</a></li>
						<li><a href="survey#sec06">
								<div class="num">06</div>
								<dl>
									<dt>エシカルハッカーによる専門的な技術調査</dt>
									<dd>高度化・巧妙化するサイバー攻撃に対し、専門的な技術調査を通じて、システムやネットワークの脆弱性を洗い出します。</dd>
								</dl>
							</a></li>
						<li><a href="survey#sec07">
								<div class="num">07</div>
								<dl>
									<dt>不動産調査</dt>
									<dd>土地・建物の履歴や権利関係、近隣環境などを調査。<br>購入・取引時のリスクを事前に把握し、安心できる意思決定をサポートします。</dd>
								</dl>
							</a></li>
						<li><a href="survey#sec08">
								<div class="num">08</div>
								<dl>
									<dt>M&A 支援・企業承継サポート</dt>
									<dd>後継者不足などの課題を背景に、事業承継やM&Aの重要性が高まっています。<br>円滑な事業承継と企業価値の向上に向けた支援を行います。</dd>
								</dl>
							</a></li>
						<li><a href="survey#sec09">
								<div class="num">09</div>
								<dl>
									<dt>ガバナンスパートナー</dt>
									<dd>企業の健全な経営体制の構築を支援するガバナンスパートナーとして、調査・情報収集のノウハウを活かしながら、問題の早期発見やリスク管理を継続的にサポートします。</dd>
								</dl>
							</a></li>
						<li><a class="" href="https://kaede-tantei.jp/" target="_blank">
								<div class="num">10</div>
								<dl>
									<dt>個人向け調査</dt>
									<dd>個人のお客様からのご相談にも対応しております。<br>浮気・所在・人間関係など、幅広い調査を専門スタッフが丁寧にサポート。</dd>
								</dl>
							</a></li>
					</ol>
				</div>
			</div>
		</section>
		<section id="information">
			<h2>information</h2>
			<div class="infoBox infoBox01">
				<div class="box">
					<dl>
						<dt>株式会社 吉祥総合調査名古屋本社</dt>
						<dd>
							<p>〒466-0854　名古屋市昭和区広路通4-7 川奈ビル205<br>TEL 052-838-9671<br>FAX 052-838-9672<br>営業時間　9:00-18:00<br>駐車場　有</p>
							<a href="<?php echo home_url() ?>/about/">もっと見る </a>
						</dd>
					</dl>
				</div>
			</div>
			<div class="infoBox infoBox02">
				<div class="box">
					<dl>
						<dt>豊橋営業所</dt>
						<dd>
							<p>〒440-0888　愛知県豊橋市駅前大通2-53-9<br>カネナチビル4F</p>
						</dd>
					</dl>
				</div>
			</div>
			<div class="infoBox infoBox03">
				<div class="box">
					<dl>
						<dt>東京OFFICE</dt>
						<dd>
							<p>〒100-6511　東京都千代田区丸の内1-5-1<br>新丸の内ビルディング11階</p>
						</dd>
					</dl>
				</div>
			</div>
			<p>吉祥総合調査では名古屋を中心に、採用調査、人事調査、総務調査などの企業調査を行っております。<br>採用時の身辺調査や、社内・社外でのトラブルでお困りの際は当社にご相談ください。<br>目に見えない変化（サイン）を見える（クリア）な報告書に致します。</p>
		</section>
	</main>
	<!-- △メイン△-->

<?php get_footer(); ?>