<?php get_header(); ?>

	<!-- ▽メイン▽-->
	<main id="top">
		<div id="fView">
			<dl class="ttl">
				<dt>情報の価値は無限。</dt>
				<dd>情報は企業にとって創造的価値を生み出します。<br>吉祥総合調査は「これからの情報の使い方」をお伝えいたします。</dd>
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
					<h2><span>about</span><em>トラブルなしの実績<br>30年以上の経験 +10,000件以上の実績</em></h2>
				</div>
				<div class="txt">
					<p>当社は、業務に携わる全員のスタッフに守秘義務の重要性を理解・認識させ、お客様のプライバシー保護に最大限の注意を払う体制を構築しています。<br>すべてのスタッフが当社のスクール・研修を習得し、当社の理念と業務への誇りを以て日々努力しております。<br>また、技術・調査に関わる法律などの試験を定期的に実施しています。<br>お客様への現状報告、料金状況などを常時ご連絡させていただくことを義務付け、当社の判断で調査を遂行したり契約料金を上回ることはありません。<br>前身の調査事務所より30年間調査業務に携わり、約10,000件以上の案件を担当いたしました。おかげ様でトラブルは一件もありません。今後とも、皆様から信頼のおける調査業務を行うよう努めてまいります。</p>
				</div>
				<div class="more"><a href="<?php echo home_url() ?>/about/">会社概要を見る</a></div>
			</div>
			<div class="bnrBox">
				<ul>
					<li>
						<dl>
							<dt><span>30年以上トラブルなし</span><em>調査内容</em></dt>
							<dd>
								<p>社内にとどまらず、社外、企業間、市場の中での人、物、資産などに関するあらゆる企業調査を行います。</p><a href="<?php echo home_url() ?>/survey/">詳しく見る</a>
							</dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt><span>解決後のアフターフォローも充実</span><em>ご契約の流れ</em></dt>
							<dd>
								<p>吉祥総合調査では、ご依頼内容に基づいた調査を行ない、調査結果・分析結果などを報告書にまとめて提出しております。</p><a href="<?php echo home_url() ?>/survey/#flow">詳しく見る</a>
							</dd>
						</dl>
					</li>
				</ul>
			</div>
		</section>
		<section id="information">
			<h2>information</h2>
			<div class="infoBox">
				<div class="box">
					<dl>
						<dt>株式会社 吉祥総合調査</dt>
						<dd>
							<p>〒466-0854 名古屋市昭和区広路通4-7 川奈ビル205<br>TEL 052-838-9671　FAX 052-838-9672<br>営業時間　9:00-18:00<br>駐車場　有</p><a href="<?php echo home_url() ?>/about/">もっと見る </a>
						</dd>
					</dl>
				</div>
			</div>
			<p>吉祥総合調査では名古屋を中心に、採用調査、人事調査、総務調査などの企業調査を行っております。<br>採用時の身辺調査や、社内・社外でのトラブルでお困りの際は当社にご相談ください。<br>目に見えない変化（サイン）を見える（クリア）な報告書に致します。</p>
		</section>
	</main>
	<!-- △メイン△-->

<?php get_footer(); ?>