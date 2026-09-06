<?php
/*
Template Name: TAを学ぶ
*/
?>
<?php get_header(); ?>
<main class="main" id="learn">
	<div class="pageTitleContainer">
		<div class="pageTitleBox">
			<p>TAを学ぶ</p>
			<h1>LEARN TA</h1>
		</div>
	</div>
	<div class="mainContainer">
		<div class="secWrap01">
			<div class="topHeadLine">
				<div class="secBox">
					<div class="leftBox">
						<div class="pageSecTtlBox">
							<div class="pageSecTtl">
								<h2>ＴＡを学ぶ</h2>
							</div>
						</div>
					</div>
					<div class="rightBox">
						<ol>
							<li class="linkBtn" data-target="sec01">
								<p>１.概要</p>
							</li>
							<li class="linkBtn" data-target="sec02">
								<p>２.ＴＡ１０１</p>
							</li>
							<li class="linkBtn" data-target="sec03">
								<p>３. ベイシックコース</p>
							</li>
							<li class="linkBtn" data-target="sec04">
								<p>４.アドバンスコース</p>
							</li>
							<li class="linkBtn" data-target="sec05">
								<p>５.ＴＡワークショップ</p>
							</li>
							<li class="linkBtn" data-target="sec06">
								<p>６.オンデマンドコンテンツ</p>
							</li>
							<li class="linkBtn" data-target="sec07">
								<p>７.特別講座</p>
							</li>
							<li class="linkBtn" data-target="sec08">
								<p>８.スーパービジョン</p>
							</li>
							<li class="linkBtn" data-target="sec09">
								<p>９.参加者の声</p>
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="subSection sec01">
				<div class="subSecTtl">
					<h3>１.概要</h3>
				</div>
				<?php if(get_field('learn_overview_intro')): ?>
				<div class="topTxt txt">
					<?php echo get_field('learn_overview_intro'); ?>
				</div>
				<?php endif; ?>
				<?php if(have_rows('learn_overview_schedule')): ?>
				<div class="learnTable">
					<table>
						<thead>
							<tr>
								<th>&nbsp;</th>
								<th>TA101</th>
								<th>ベイシックコース</th>
								<th>TAシュミュレートWS</th>
								<th>アドバンスコース</th>
								<th>オンデマンド</th>
								<th>SV</th>
								<th>試験準備コース</th>
							</tr>
						</thead>
						<tbody>
							<?php while(have_rows('learn_overview_schedule')): the_row(); ?>
							<tr>
								<th><?php echo wp_kses(get_sub_field('schedule_date'), array('br' => array())); ?></th>
								<td><?php echo get_sub_field('schedule_ta101') ? '〇' : ''; ?></td>
								<td><?php echo get_sub_field('schedule_basic') ? '〇' : ''; ?></td>
								<td><?php echo get_sub_field('schedule_gestalt') ? '〇' : ''; ?></td>
								<td><?php echo get_sub_field('schedule_advance') ? '〇' : ''; ?></td>
								<td><?php echo get_sub_field('schedule_ondemand') ? '〇' : ''; ?></td>
								<td><?php echo get_sub_field('schedule_sv') ? '〇' : ''; ?></td>
								<td><?php echo get_sub_field('schedule_exam') ? '〇' : ''; ?></td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<?php endif; ?>
			</div>
			<div class="subSection sec02">
				<div class="subSecTtl">
					<h3>２.ＴＡ１０１</h3>
				</div>
				<div class="topTxt txt">
					<p>TA101とは、国際TA協会（国際交流分析協会;International Transactional Analysis Association）によって認められたTA/交流分析の基礎講座です（「101」は、入門コースを意味します）。<br>つまり、TAAJのTA101は、世界標準のTAの入門講座です。TAを初めて学ぶ人はもちろん、継続学習者も複数回受けることが多い研修です。</p>
					<p>TA/交流分析を仕事（心理療法，教育，職場内の円滑なコミュニケーション等）や日常生活に活かしたい方，まずはこの講座で、TA/交流分析の魅力をぜひ体験してください。</p>
				</div>
				<?php if(have_rows('ta101_schedule')): ?>
				<div class="learnTable">
					<table>
						<thead>
							<tr>
								<th>&nbsp;</th>
								<th>講師</th>
								<th>会場</th>
								<th>定員</th>
								<th>申し込み</th>
							</tr>
						</thead>
						<tbody>
							<?php while(have_rows('ta101_schedule')): the_row(); ?>
							<tr>
								<th><?php echo wp_kses(get_sub_field('ta101_date'), array('br' => array())); ?></th>
								<td class="left"><?php echo get_sub_field('ta101_instructor'); ?></td>
								<td class="left"><?php echo get_sub_field('ta101_venue'); ?></td>
								<td><?php echo esc_html(get_sub_field('ta101_capacity')); ?></td>
								<td>
									<?php
									$apply_url = get_sub_field('ta101_apply_url');
									if($apply_url):
									?>
									<div class="btnMore"><a href="<?php echo esc_url($apply_url); ?>" target="_blank" rel="noopener noreferrer">お申込みはこちら</a></div>
									<?php endif; ?>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<?php endif; ?>
				<aside>※ 「お申込み」はPeatix決済ページへ移動します。</aside>
				<div class="feeContainer">
					<?php if(get_field('ta101_fee_general') || get_field('ta101_fee_member') || get_field('ta101_fee_student')): ?>
					<div class="learnTable">
						<table>
							<thead>
								<tr>
									<th>&nbsp;</th>
									<th>一般</th>
									<th>会員</th>
									<th>学生</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th class="dGreen">参加費</th>
									<td><?php echo esc_html(get_field('ta101_fee_general')); ?></td>
									<td><?php echo esc_html(get_field('ta101_fee_member')); ?></td>
									<td><?php echo esc_html(get_field('ta101_fee_student')); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<?php endif; ?>
					<aside>
						<p>※　別途、テキスト（「TAベイシックス」（日本TA協会））代1000円がかかります。お持ちの方は不要です。</p>
						<p>※　キャンセルポリシーはこちら</p>
					</aside>
					<?php if(get_field('ta101_notes')): ?>
					<dl>
						<dt>留意事項</dt>
						<dd>
							<?php echo get_field('ta101_notes'); ?>
						</dd>
					</dl>
					<?php endif; ?>
				</div>
			</div>
			<div class="subSection sec03">
				<div class="subSecTtl">
					<h3>３.ＴＡベイシックコース</h3>
				</div>
				<div class="txt">
					<p>TA101を学んだ次に位置するコースです。TAの特定の概念や理論に焦点を当てて集中的に学び、確かな知識を得られます。<br>TAを自分が働く領域でもっと効果的に，自由に，豊かに，そして正しく実践したい方はぜひ継続的にご参加ください。テーマは、年ごとに替わります。</p>
					<p>参加資格に条件はありません。CTAなどの資格取得に挑戦したいという人のニーズにも応える内容です。</p>
				</div>
				<?php if(have_rows('basic_courses')): ?>
				<div class="innerSectionContainer">
					<?php while(have_rows('basic_courses')): the_row(); ?>
					<div class="innerSection">
						<?php if(get_sub_field('course_title')): ?>
						<div class="innerSecTtl">
							<h4><?php echo esc_html(get_sub_field('course_title')); ?></h4>
						</div>
						<?php endif; ?>
						<?php if(get_sub_field('course_intro')): ?>
						<div class="innerSecTxt txt">
							<p><?php echo wp_kses(get_sub_field('course_intro'), array('br' => array())); ?></p>
						</div>
						<?php endif; ?>
						<div class="learnTable">
							<table>
								<thead>
									<tr>
										<th>&nbsp;</th>
										<th>講師</th>
										<th>会場</th>
										<th>定員</th>
										<th>申し込み</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th><?php echo wp_kses(get_sub_field('course_date'), array('br' => array())); ?></th>
										<td class="left"><?php echo get_sub_field('course_instructor'); ?></td>
										<td class="left"><?php echo get_sub_field('course_venue'); ?></td>
										<td><?php echo esc_html(get_sub_field('course_capacity')); ?></td>
										<td>
											<?php
											$apply_url = get_sub_field('course_apply_url');
											if($apply_url):
											?>
											<div class="btnMore"><a href="<?php echo esc_url($apply_url); ?>" target="_blank" rel="noopener noreferrer">お申込みはこちら</a></div>
											<?php endif; ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<?php if(get_sub_field('course_fee_general') || get_sub_field('course_fee_member') || get_sub_field('course_fee_student')): ?>
						<div class="feeContainer">
								<div class="learnTable">
									<table>
										<thead>
											<tr>
												<th>&nbsp;</th>
												<th>一般</th>
												<th>会員</th>
												<th>学生</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th class="dGreen">参加費</th>
												<td><?php echo esc_html(get_sub_field('course_fee_general')); ?></td>
												<td><?php echo esc_html(get_sub_field('course_fee_member')); ?></td>
												<td><?php echo esc_html(get_sub_field('course_fee_student')); ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<aside>
									<p>※　キャンセルポリシーはこちら</p>
								</aside>
							</div>
						<?php endif; ?>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
				<?php if(get_field('basic_notes')): ?>
				<div class="feeContainer">
					<dl>
						<dt>留意事項</dt>
						<dd>
							<?php echo get_field('basic_notes'); ?>
						</dd>
					</dl>
				</div>
				<?php endif; ?>
			</div>
			<div class="subSection sec04">
				<div class="subSecTtl">
					<h3>４.アドバンスコース</h3>
				</div>
				<div class="topTxt txt">
					<p>TAを暮らしや仕事に使うために、ベイシックコースを越えてさらに応用レベルの知識や技術を学ぶコースです。<br>心理療法分野、カウンセリング分野、組織分野と教育分野のそれぞれに必要な専門的な理論と実践をワークショップ形式で学びます。本格的トレーニングに関心がある人、IBOCの認める国際資格（CTA）取得のためにトレーニング中の方、あるいはその受験を真剣に考えている人に最適な機会です。</p>
				</div>
				<?php if(have_rows('advance_courses')): ?>
				<div class="innerSectionContainer">
					<?php while(have_rows('advance_courses')): the_row(); ?>
					<div class="innerSection">
						<?php if(get_sub_field('course_title')): ?>
						<div class="innerSecTtl">
							<h4><?php echo esc_html(get_sub_field('course_title')); ?></h4>
						</div>
						<?php endif; ?>
						<div class="themeContainer">
							<div class="themePanel">
								<div class="panelInner">
									<?php if(get_sub_field('course_theme')): ?>
									<dl>
										<dt><span>テーマ</span></dt>
										<dd><?php echo get_sub_field('course_theme'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_description')): ?>
									<dl>
										<dt><span>説明</span></dt>
										<dd><?php echo get_sub_field('course_description'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_datetime')): ?>
									<dl>
										<dt><span>日時</span></dt>
										<dd><?php echo get_sub_field('course_datetime'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_venue')): ?>
									<dl>
										<dt><span>会場</span></dt>
										<dd><?php echo get_sub_field('course_venue'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_instructor')): ?>
									<dl>
										<dt><span>講師</span></dt>
										<dd>
										<div class="name"><?php echo wp_kses(get_sub_field('course_instructor'), array('br' => array())); ?></div>
											<?php if(get_sub_field('course_instructor_intro')): ?>
											<div class="introBox">
												<div class="introTtl">
													<p>講師紹介</p>
												</div>
												<div class="txt">
													<?php echo get_sub_field('course_instructor_intro'); ?>
												</div>
											</div>
											<?php endif; ?>
										</dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_notes')): ?>
									<dl>
										<dt><span>留意事項</span></dt>
										<dd><?php echo get_sub_field('course_notes'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_fee')): ?>
									<dl>
										<dt><span>参加費</span></dt>
										<dd><?php echo get_sub_field('course_fee'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php
									$apply_url = get_sub_field('course_apply_url');
									if($apply_url):
									?>
									<div class="bottomBox">
										<div class="btnMore"><a href="<?php echo esc_url($apply_url); ?>" target="_blank" rel="noopener noreferrer">お申込みはこちら</a></div>
										<aside>
											<p>※ Peatix決済ページへ移動します。</p>
										</aside>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="subSection sec05">
				<div class="subSecTtl">
					<h3>５.ＴＡワークショップ</h3>
				</div>
				<div class="topTxt txt">
					<p>実際にTA・ゲシュタルトによるセラピーグループの機会です。<br>自身について考える、インテンシブな学びの機会になります。</p>
				</div>
				<?php if(have_rows('workshop_courses')): ?>
				<div class="innerSectionContainer">
					<?php while(have_rows('workshop_courses')): the_row(); ?>
					<div class="innerSection">
						<?php if(get_sub_field('course_title')): ?>
						<div class="innerSecTtl">
							<h4><?php echo esc_html(get_sub_field('course_title')); ?></h4>
						</div>
						<?php endif; ?>
						<div class="themeContainer">
							<div class="themePanel">
								<div class="panelInner">
									<?php if(get_sub_field('course_theme')): ?>
									<dl>
										<dt><span>テーマ</span></dt>
										<dd><?php echo get_sub_field('course_theme'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_description')): ?>
									<dl>
										<dt><span>説明</span></dt>
										<dd><?php echo get_sub_field('course_description'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_datetime')): ?>
									<dl>
										<dt><span>日時</span></dt>
										<dd><?php echo get_sub_field('course_datetime'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_venue')): ?>
									<dl>
										<dt><span>会場</span></dt>
										<dd><?php echo get_sub_field('course_venue'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_instructor')): ?>
									<dl>
										<dt><span>講師</span></dt>
										<dd>
											<div class="name"><?php echo wp_kses(get_sub_field('course_instructor'), array('br' => array())); ?></div>
											<?php if(get_sub_field('course_instructor_intro')): ?>
											<div class="introBox">
												<div class="introTtl">
													<p>講師紹介</p>
												</div>
												<div class="txt">
													<?php echo get_sub_field('course_instructor_intro'); ?>
												</div>
											</div>
											<?php endif; ?>
										</dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_notes')): ?>
									<dl>
										<dt><span>留意事項</span></dt>
										<dd><?php echo get_sub_field('course_notes'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_fee')): ?>
									<dl>
										<dt><span>参加費</span></dt>
										<dd><?php echo get_sub_field('course_fee'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php
									$apply_url = get_sub_field('course_apply_url');
									if($apply_url):
									?>
									<div class="bottomBox">
										<div class="btnMore"><a href="<?php echo esc_url($apply_url); ?>" target="_blank" rel="noopener noreferrer">お申込みはこちら</a></div>
										<aside>
											<p>※ Peatix決済ページへ移動します。</p>
										</aside>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="subSection sec06">
				<div class="subSecTtl">
					<h3>６.オンデマンドコンテンツ</h3>
				</div>
				<div class="topTxt txt">
					<p>ＴＡの主要理論、最新の理論について、学術誌「ＴＡジャーナル」から１篇を講師のガイドによって読んでいきます。<br>１回完結形式のオンデマンド動画を視聴する研修です。<br>ご購入後、視聴方法、視聴期間はメールにてお知らせします。</p>
				</div>
				<?php if(have_rows('ondemand_courses')): ?>
				<div class="innerSectionContainer">
					<?php while(have_rows('ondemand_courses')): the_row(); ?>
					<div class="innerSection">
						<?php if(get_sub_field('course_title')): ?>
						<div class="innerSecTtl">
							<h4><?php echo esc_html(get_sub_field('course_title')); ?></h4>
						</div>
						<?php endif; ?>
						<div class="themeContainer">
							<div class="themePanel">
								<div class="panelInner">
									<?php if(get_sub_field('course_theme')): ?>
									<dl>
										<dt><span>テーマ</span></dt>
										<dd><?php echo get_sub_field('course_theme'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_description')): ?>
									<dl>
										<dt><span>説明</span></dt>
										<dd><?php echo get_sub_field('course_description'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_datetime')): ?>
									<dl>
										<dt><span>日時</span></dt>
										<dd><?php echo get_sub_field('course_datetime'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_venue')): ?>
									<dl>
										<dt><span>会場</span></dt>
										<dd><?php echo get_sub_field('course_venue'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_instructor')): ?>
									<dl>
										<dt><span>講師</span></dt>
										<dd>
											<div class="name"><?php echo wp_kses(get_sub_field('course_instructor'), array('br' => array())); ?></div>
											<?php if(get_sub_field('course_instructor_intro')): ?>
											<div class="introBox">
												<div class="introTtl">
													<p>講師紹介</p>
												</div>
												<div class="txt">
													<?php echo get_sub_field('course_instructor_intro'); ?>
												</div>
											</div>
											<?php endif; ?>
										</dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_notes')): ?>
									<dl>
										<dt><span>留意事項</span></dt>
										<dd><?php echo get_sub_field('course_notes'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_fee')): ?>
									<dl>
										<dt><span>参加費</span></dt>
										<dd><?php echo get_sub_field('course_fee'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php
									$apply_url = get_sub_field('course_apply_url');
									if($apply_url):
									?>
									<div class="bottomBox">
										<div class="btnMore"><a href="<?php echo esc_url($apply_url); ?>" target="_blank" rel="noopener noreferrer">お申込みはこちら</a></div>
										<aside>
											<p>※ Peatix決済ページへ移動します。</p>
										</aside>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="subSection sec07">
				<div class="subSecTtl">
					<h3>７.特別講座</h3>
				</div>
				<div class="topTxt txt">
					<p>不定期に実施されます。開催の場合、ウェブサイト、メルマガ等でご案内します。</p>
				</div>
				<?php if(have_rows('special_courses')): ?>
				<div class="innerSectionContainer">
					<?php while(have_rows('special_courses')): the_row(); ?>
					<div class="innerSection">
						<?php if(get_sub_field('course_title')): ?>
						<div class="innerSecTtl">
							<h4><?php echo esc_html(get_sub_field('course_title')); ?></h4>
						</div>
						<?php endif; ?>
						<div class="themeContainer">
							<div class="themePanel">
								<div class="panelInner">
									<?php if(get_sub_field('course_theme')): ?>
									<dl>
										<dt><span>テーマ</span></dt>
										<dd><?php echo get_sub_field('course_theme'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_description')): ?>
									<dl>
										<dt><span>説明</span></dt>
										<dd><?php echo get_sub_field('course_description'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_datetime')): ?>
									<dl>
										<dt><span>日時</span></dt>
										<dd><?php echo get_sub_field('course_datetime'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_venue')): ?>
									<dl>
										<dt><span>会場</span></dt>
										<dd><?php echo get_sub_field('course_venue'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_instructor')): ?>
									<dl>
										<dt><span>講師</span></dt>
										<dd>
											<div class="name"><?php echo wp_kses(get_sub_field('course_instructor'), array('br' => array())); ?></div>
											<?php if(get_sub_field('course_instructor_intro')): ?>
											<div class="introBox">
												<div class="introTtl">
													<p>講師紹介</p>
												</div>
												<div class="txt">
													<?php echo get_sub_field('course_instructor_intro'); ?>
												</div>
											</div>
											<?php endif; ?>
										</dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_notes')): ?>
									<dl>
										<dt><span>留意事項</span></dt>
										<dd><?php echo get_sub_field('course_notes'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_fee')): ?>
									<dl>
										<dt><span>参加費</span></dt>
										<dd><?php echo get_sub_field('course_fee'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php
									$apply_url = get_sub_field('course_apply_url');
									if($apply_url):
									?>
									<div class="bottomBox">
										<div class="btnMore"><a href="<?php echo esc_url($apply_url); ?>" target="_blank" rel="noopener noreferrer">お申込みはこちら</a></div>
										<aside>
											<p>※ Peatix決済ページへ移動します。</p>
										</aside>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="subSection sec08">
				<div class="subSecTtl">
					<h3>８.スーパービジョン</h3>
				</div>
				<div class="topTxt txt">
					<p>国際資格を持つトレイナーとのスーパービジョンをアシストします。</p>
				</div>
				<?php if(have_rows('supervision_courses')): ?>
				<div class="innerSectionContainer">
					<?php while(have_rows('supervision_courses')): the_row(); ?>
					<div class="innerSection">
						<?php if(get_sub_field('course_title')): ?>
						<div class="innerSecTtl">
							<h4><?php echo esc_html(get_sub_field('course_title')); ?></h4>
						</div>
						<?php endif; ?>
						<div class="themeContainer">
							<div class="themePanel">
								<div class="panelInner">
									<?php if(get_sub_field('course_theme')): ?>
									<dl>
										<dt><span>テーマ</span></dt>
										<dd><?php echo get_sub_field('course_theme'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_description')): ?>
									<dl>
										<dt><span>説明</span></dt>
										<dd><?php echo get_sub_field('course_description'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_datetime')): ?>
									<dl>
										<dt><span>日時</span></dt>
										<dd><?php echo get_sub_field('course_datetime'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_venue')): ?>
									<dl>
										<dt><span>会場</span></dt>
										<dd><?php echo get_sub_field('course_venue'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_instructor')): ?>
									<dl>
										<dt><span>講師</span></dt>
										<dd>
											<div class="name"><?php echo wp_kses(get_sub_field('course_instructor'), array('br' => array())); ?></div>
											<?php if(get_sub_field('course_instructor_intro')): ?>
											<div class="introBox">
												<div class="introTtl">
													<p>講師紹介</p>
												</div>
												<div class="txt">
													<?php echo get_sub_field('course_instructor_intro'); ?>
												</div>
											</div>
											<?php endif; ?>
										</dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_notes')): ?>
									<dl>
										<dt><span>留意事項</span></dt>
										<dd><?php echo get_sub_field('course_notes'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if(get_sub_field('course_fee')): ?>
									<dl>
										<dt><span>参加費</span></dt>
										<dd><?php echo get_sub_field('course_fee'); ?></dd>
									</dl>
									<?php endif; ?>
									<?php
									$apply_url = get_sub_field('course_apply_url');
									if($apply_url):
									?>
									<div class="bottomBox">
										<div class="btnMore"><a href="<?php echo esc_url($apply_url); ?>" target="_blank" rel="noopener noreferrer">詳しくはこちら</a></div>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<?php else: ?>
				<div class="btnMore"><a href="">詳しくはこちら</a></div>
				<?php endif; ?>
			</div>
			<div class="subSection sec09">
				<div class="subSecTtl">
					<h3>９.参加者の声</h3>
				</div>
				<?php if(have_rows('voice_list')): ?>
				<div class="voicePanelList">
					<?php while(have_rows('voice_list')): the_row(); ?>
					<div class="voicePanel">
						<dl>
							<?php if(get_sub_field('voice_course')): ?>
							<dt>講座名：<?php echo esc_html(get_sub_field('voice_course')); ?></dt>
							<?php endif; ?>
							<dd>
								<?php if(get_sub_field('voice_comment')): ?>
								<div class="comment"><?php echo get_sub_field('voice_comment'); ?></div>
								<?php endif; ?>
								<?php if(get_sub_field('voice_participant')): ?>
								<div class="name">
									<p><?php echo esc_html(get_sub_field('voice_participant')); ?></p>
								</div>
								<?php endif; ?>
							</dd>
						</dl>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>