<?php
/*
Template Name: 年次大会
*/
?>
<?php get_header(); ?>
<main class="main" id="conference">
	<div class="pageTitleContainer">
		<div class="pageTitleBox">
			<h1>年次大会</h1>
			<p>ANNUAL CONFERENCE</p>
		</div>
	</div>
	<div class="topContainer">
		<div class="secWrap01">
			<div class="pageLinkList linkList">
				<ul>
					<li data-target="nextConferenceHeadLine">次回の大会</li>
					<li data-target="pastConferenceSection">過去の大会</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="slidePanel">
		<div class="slideBox">
			<ul>
				<li><img src="<?php bloginfo('template_url'); ?>/image/conference/top_slide_01.png" alt=""></li>
				<li><img src="<?php bloginfo('template_url'); ?>/image/conference/top_slide_02.png" alt=""></li>
				<li><img src="<?php bloginfo('template_url'); ?>/image/conference/top_slide_03.png" alt=""></li>
				<li><img src="<?php bloginfo('template_url'); ?>/image/conference/top_slide_04.png" alt=""></li>
				<li><img src="<?php bloginfo('template_url'); ?>/image/conference/top_slide_05.png" alt=""></li>
			</ul>
		</div>
	</div>
	<div class="mainContainer">
		<div class="secWrap01">
			<div class="nextConferenceHeadLine">
				<div class="secBox">
					<div class="leftBox">
						<div class="pageSecTtlBox">
							<div class="pageSecTtl">
								<h2>次回の大会</h2>
							</div>
						</div>
					</div>
					<div class="rightBox">
						<ol>
							<li class="linkBtn" data-target="sec01">
								<p>１.次回大会概要　日時、テーマ、会場</p>
							</li>
							<li class="linkBtn" data-target="sec02">
								<p>２.大会委員長挨拶</p>
							</li>
							<li class="linkBtn" data-target="sec03">
								<p>３.プログラム</p>
							</li>
							<li class="linkBtn" data-target="sec04">
								<p>４.場所アクセス</p>
							</li>
							<li class="linkBtn" data-target="sec05">
								<p>５.申込み方法</p>
							</li>
							<li class="linkBtn" data-target="sec06">
								<p>６.その他</p>
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="subSection sec01">
				<div class="subSecTtl">
					<h3>１.次回大会概要　日時、テーマ、会場</h3>
				</div>
				<div class="infoBox">
					<div class="inner">
						<?php if(get_field('conference_theme')): ?>
						<dl>
							<dt>テーマ</dt>
							<dd><?php echo esc_html(get_field('conference_theme')); ?></dd>
						</dl>
						<?php endif; ?>
						<?php if(get_field('conference_date')): ?>
						<dl>
							<dt>日時</dt>
							<dd><?php echo esc_html(get_field('conference_date')); ?></dd>
						</dl>
						<?php endif; ?>
						<?php if(get_field('conference_venue')): ?>
						<dl>
							<dt>会場</dt>
							<dd><?php echo esc_html(get_field('conference_venue')); ?></dd>
						</dl>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="subSection sec02">
				<div class="subSecTtl">
					<h3>２.大会委員長挨拶</h3>
				</div>
				<div class="greetingPanel">
					<?php
					$greeting_pdf = get_field('greeting_pdf');
					if($greeting_pdf):
					?>
					<div class="pdfBox">
						<div class="imgBox"><a href="<?php echo esc_url($greeting_pdf['url']); ?>" target="_blank"><img src="<?php echo esc_url($greeting_pdf['url']); ?>" alt=""></a></div>
						<p>※クリックで　PDFが開きます。</p>
					</div>
					<?php endif; ?>
					<div class="txtBox">
						<?php if(get_field('greeting_text')): ?>
						<div class="txt">
					<p><?php echo wp_kses(get_field('greeting_text'), array('br' => array())); ?></p>
						</div>
						<?php endif; ?>
						<?php if(get_field('greeting_name')): ?>
						<div class="name">
							<p><?php echo esc_html(get_field('greeting_name')); ?></p>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="subSection sec03">
				<div class="subSecTtl">
					<h3>３. プログラム</h3>
				</div>
				<div class="programContainer">
					<?php if(have_rows('program_days')): ?>
						<?php while(have_rows('program_days')): the_row(); ?>
						<div class="programPanel">
							<p class="pTtl"><?php echo esc_html(get_sub_field('program_date')); ?></p>
							<div class="programTable">
								<table>
									<thead>
										<tr>
											<th class="time">時間</th>
											<th class="program">プログラム</th>
											<th class="instructor">講師</th>
										</tr>
									</thead>
									<tbody>
										<?php if(have_rows('program_schedule')): ?>
											<?php while(have_rows('program_schedule')): the_row(); ?>
											<tr>
												<td class="time">
													<dl>
														<dt>時間</dt>
														<dd><?php echo esc_html(get_sub_field('time')); ?></dd>
													</dl>
												</td>
												<td class="program">
													<dl>
														<dt>プログラム</dt>
														<dd><?php echo get_sub_field('program'); ?></dd>
													</dl>
												</td>
												<td class="instructor">
													<dl>
														<dt>講師</dt>
												<dd><?php echo wp_kses(get_sub_field('instructor'), array('br' => array())); ?></dd>
													</dl>
												</td>
											</tr>
											<?php endwhile; ?>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="subSection sec04">
				<div class="subSecTtl">
					<h3>４.場所アクセス</h3>
				</div>
				<div class="accessBox">
					<div class="inner">
						<?php if(get_field('conference_access')): ?>
						<div class="txt"><?php echo get_field('conference_access'); ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="subSection sec05">
				<div class="subSecTtl">
					<h3>５.参加費と申込み方法</h3>
				</div>
				<div class="innerSection">
					<div class="innerSecTtl">
						<h4>参加費</h4>
					</div>
					<div class="feeTable">
						<table>
							<thead>
								<tr>
									<th class="date">申込日</th>
									<th class="member">会員</th>
									<th class="affiliate">連携団体会員</th>
									<th class="nonmember">非会員</th>
									<th class="student">学生</th>
								</tr>
							</thead>
							<tbody>
								<?php if(have_rows('conference_fee')): ?>
									<?php while(have_rows('conference_fee')): the_row(); ?>
									<tr>
										<td class="date">
											<dl>
												<dt>申込日</dt>
												<dd><?php echo nl2br(esc_html(get_sub_field('fee_date'))); ?></dd>
											</dl>
										</td>
										<td class="member">
											<dl>
												<dt>会員</dt>
												<dd><?php echo esc_html(get_sub_field('fee_member')); ?></dd>
											</dl>
										</td>
										<td class="affiliate">
											<dl>
												<dt>連携団体会員</dt>
												<dd><?php echo esc_html(get_sub_field('fee_affiliate')); ?></dd>
											</dl>
										</td>
										<td class="nonmember">
											<dl>
												<dt>非会員</dt>
												<dd><?php echo esc_html(get_sub_field('fee_nonmember')); ?></dd>
											</dl>
										</td>
										<td class="student">
											<dl>
												<dt>学生</dt>
												<dd><?php echo esc_html(get_sub_field('fee_student')); ?></dd>
											</dl>
										</td>
									</tr>
									<?php endwhile; ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
					<aside>
						<p>※当日参加はできません。かならず事前にお申込みください。</p>
						<p>※以下の方は、日本交流分析学会第51回大会（https://jsta51.second.net）からのお申込みをお願いします（参加費が異なります）。<br>①一般演題発表の発表者（共同発表者含む）となる、または一般演題発表を聞く方、②各種専門資格に係るポイント付与を希望する方、③製本したプログラム冊子が欲しい方</p>
					</aside>
				</div>
				<div class="innerSection">
					<div class="innerSecTtl">
						<h4>申込方法</h4>
					</div>
					<?php if(get_field('conference_application')): ?>
					<div class="cntTxt">
						<?php echo get_field('conference_application'); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="subSection sec06">
				<div class="subSecTtl">
					<h3>６.その他</h3>
				</div>
				<div class="innerSection">
					<div class="innerSecTtl">
						<h4>キャンセルポリシー</h4>
					</div>
					<div class="cancelTable">
						<table>
							<thead>
								<tr>
									<th class="policy">返金の基本方針</th>
									<th class="amount">返金額</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="policy">
										<dl>
											<dt>返金の基本方針</dt>
											<dd>①受講者都合による欠席・遅刻・中断</dd>
										</dl>
									</td>
									<td class="amount">
										<dl>
											<dt>返金額</dt>
											<dd>返金なし</dd>
										</dl>
									</td>
								</tr>
								<tr>
									<td class="policy">
										<dl>
											<dt>返金の基本方針</dt>
											<dd>②TAAJ都合による、中止</dd>
										</dl>
									</td>
									<td class="amount">
										<dl>
											<dt>返金額</dt>
											<dd>全額返金</dd>
										</dl>
									</td>
								</tr>
								<tr>
									<td class="policy">
										<dl>
											<dt>返金の基本方針</dt>
											<dd>③TAAJ都合による、中止（中断が１時間以上の場合）</dd>
										</dl>
									</td>
									<td class="amount">
										<dl>
											<dt>返金額</dt>
											<dd>％にて返金　　※分母:全セミナー時間数、分子：遅刻時間で換算した分を返金</dd>
										</dl>
									</td>
								</tr>
								<tr>
									<td class="policy">
										<dl>
											<dt>返金の基本方針</dt>
											<dd>④天災による中止</dd>
										</dl>
									</td>
									<td class="amount">
										<dl>
											<dt>返金額</dt>
											<dd>返金なし　　但し、TAAJ判断による開催中止→返金</dd>
										</dl>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="cautionBox">
						<div class="txt">
							<p>①の例・・・受講者都合による中止(例:参加者が当日体調不良で参加出来なくなったなど)の場合、申し込まれたセミナー(ワークショップ)料金は返金なしの基本方針となります。</p>
							<p>②の例・・・TAAJ都合による中止(例:講師が当日交通事故に遭い、来ることが不可能など)の場合、申し込まれたセミナー(ワークショップ)料金は返金の基本方針となります。</p>
							<p>③の例・・・TAAJ都合による中断(例:TAAJ設定のオンラインが故障によりどなたにも送信出来ていない）となり、１時間以上中断した場合、</p>
							<p>（４万円１日開催の午後１０時から午後４時の５時間セミナー実施の際中1時間中断となった場合)5分の1の代金である８０００円を返金となります。</p>
							<p>④の例・・・天災による中止(例:大地震など)の場合、返金なしとなります。</p>
						</div>
					</div>
				</div>
			</div>
			<div class="subSection pastConferenceSection">
				<div class="subSecTtl">
					<h3>過去の大会</h3>
				</div>
				<div class="pastTable">
					<table>
						<thead>
							<tr>
								<th class="no">No</th>
								<th class="date">日時</th>
								<th class="theme">大会テーマ</th>
								<th class="venue">会場</th>
								<th class="keynote">基調講演</th>
								<th class="speaker">講師(敬称略)</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if(have_rows('past_conferences')):
								$conferences = get_field('past_conferences');
								$total = count($conferences);
								$conference_no = $total;
								while(have_rows('past_conferences')): the_row();
							?>
								<tr>
									<td class="no">
										<dl>
											<dt>No</dt>
											<dd>第<?php echo $conference_no; ?>回</dd>
										</dl>
									</td>
									<td class="date">
										<dl>
											<dt>日時</dt>
											<dd><?php echo esc_html(get_sub_field('past_date')); ?></dd>
										</dl>
									</td>
									<td class="theme">
										<dl>
											<dt>大会テーマ</dt>
											<dd><?php echo wp_kses(get_sub_field('past_theme'), array('br' => array())); ?></dd>
										</dl>
									</td>
									<td class="venue">
										<dl>
											<dt>会場</dt>
											<dd><?php echo wp_kses(get_sub_field('past_venue'), array('br' => array())); ?></dd>
										</dl>
									</td>
									<td class="keynote">
										<dl>
											<dt>基調講演</dt>
										<dd><?php echo wp_kses(get_sub_field('past_keynote'), array('br' => array())); ?></dd>
										</dl>
									</td>
									<td class="speaker">
										<dl>
											<dt>講師(敬称略)</dt>
										<dd><?php echo wp_kses(get_sub_field('past_speaker'), array('br' => array())); ?></dd>
										</dl>
									</td>
								</tr>
							<?php
								$conference_no--;
								endwhile;
							endif;
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>