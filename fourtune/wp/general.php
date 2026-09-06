<?php
/*
Template Name: 中・高校生以上英会話コース
*/
?>

<?php get_header(); ?>

	<!--▽.cntnt▽-->
	<div id="general" class="course">

		<!--▽.kv▽-->
		<div class="kv">
			<div>
				<h2><img src="<?php echo get_template_directory_uri(); ?>/image/general/kv_ttl_pc.png" alt="中・高校生以上英会話コース"></h2>
			</div>
		</div>
		<!--△.kv△-->

		<div class="tabMenu">
			<ul>
				<li><a href="#sec01"><img src="<?php echo get_template_directory_uri(); ?>/image/general/tab_01.png" alt=""></a></li>
				<li><a href="#sec02"><img src="<?php echo get_template_directory_uri(); ?>/image/general/tab_02.png" alt=""></a></li>
				<li><a href="#sec03"><img src="<?php echo get_template_directory_uri(); ?>/image/general/tab_03.png" alt=""></a></li>
			</ul>
		</div>

		<section id="sec01">
			<div class="contWrap">
				<h3 class="courseTtl"><span><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_ttl_01.png" alt="中学生・高校生英会話コース"></span></h3>
				<div class="introBox">
					<p><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_01_img.png" alt=""></p>
					<dl>
						<dt>全てのレッスンがプライベートレッスンでしっかり英語を習得することができます。</dt>
						<dd>中学・高校ではこなす量が圧倒的に足りないといわれている、リーディング力（英語を読む力）とスピーキング力（英語を話す力）に力をいれています。<br />
						もちろん、スピーキングに力を入れるということは相手の言うことを理解できなければ、コミュニケーションも取れませんので、自ずとリスニング力（英語を聞く力）の向上にもつながります。</dd>
					</dl>
				</div>
				<p class="addTxt">このコースは全てのクラスがプライベートレッスンになりますので、お子様の目的・目標に合わせた個別カリキュラムでレッスンを行う事ができます。<br />
				投稿アドバイザーと担当教師がお子様に最適なカリキュラムをご提案させていただきます。<br />
				また、英検の2次試験の面接対策、センター試験や大学入試のリスニング対策レッスンなども行うことができます。<br />
				ご自宅、塾、最寄りの駅などへの無料送迎サービスがございます。<br />
				※送迎は教室より車で10分程度・約2kmの範囲内になります。</p>
				<ul class="pointList">
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_01_point_01.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_01_point_02.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_01_point_03.png" alt=""></li>
				</ul>
				<div class="detailBox">
					<h4>コース詳細</h4>
					<!--<dl class="infoTime">
						<dt>開校時間帯</dt>
						<dd>
							<table class="timeTbl teacherHead">
								<thead>
									<tr>
										<th colspan="3">ネイティブ講師</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-student-native' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['student-day-native'] );?></td>
										<td><?php echo esc_html( $fields['student-time-native'] );?></td>
										<?php if($fields['student-entry-native'] == '受付中'):?>
										<td class="accepting">受付中</td>
										<?php else: ?>
										<td>満員</td>
										<?php endif;?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<table class="timeTbl teacherHead">
								<thead>
									<tr>
										<th colspan="3">日本人バイリンガル講師</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-student-jp' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['student-day-jp'] );?></td>
										<td><?php echo esc_html( $fields['student-time-jp'] );?></td>
										<?php if($fields['student-entry-jp'] == '受付中'):?>
										<td class="accepting">受付中</td>
										<?php else: ?>
										<td>満員</td>
										<?php endif;?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</dd>
					</dl>-->
					<table class="detailTbl">
						<tbody>
							<tr>
								<th>開校曜日</th>
								<td>火・水・木・金・土</td>
							</tr>
							
							<tr>
								<th>受講時間</th>
								<td>1回60分　週１回※年間４４回</td>
							</tr>
							<tr>
								<th>その他補足</th>
								<td>
								プライベート：1名<br />セミプライベート：2名</td>
							</tr>
						</tbody>
					</table>
					<h4>コース料金</h4>
					<table class="detailTbl">
						<tbody>
							<tr>
								<th>受講料</th>
								<td>プライベート：26,400円（税込）／月<br>セミプライベート：20,900円（税込）／月</td>
							</tr>
							<tr>
								<th>教材費</th>
								<td>11,000円（税込）／年</td>
							</tr>
						</tbody>
					</table>
					<p style="text-align:right;">※事務手数料が別途かかります。</p>
				</div>
			</div>
		</section>

		<section id="sec02">
			<div class="contWrap">
				<h3 class="courseTtl"><span><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_ttl_02.png" alt="大人英会話コース"></span></h3>
				<div class="introBox">
					<p><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_02_img.png" alt=""></p>
					<dl>
						<dt>海外旅行前はトラベル英会話のレッスン等自分好みにレッスンをカスタマイズ。</dt>
						<dd>一人一人の目的・目標に合わせて当校アドバイザーと担当教師があなたに最適なプログラムをご提案させていただきます。<br />
						いつも通常レッスンを行い、海外旅行前はトラベル英会話のレッスンという様に自分好みにレッスンをカスタマイズできます。</dd>
					</dl>
				</div>
				<p class="addTxt">すべてのクラスがプライベートレッスンで、他人を気にすることなく、気兼ねなく英語を話せて学べるので、上達の速さも格段に違います。<br />
				ご自宅、会社、最寄りの駅などへの無料送迎サービスがございます。<br />
				※送迎は教室より車で10分程度、約2ｋｍの範囲内になります。<br />
				※駐車場もございますので、お車でお越しいただく事も可能です。</p>
				<ul class="pointList">
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_02_point_01.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_02_point_02.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_02_point_03.png" alt=""></li>
				</ul>
				<div class="detailBox">
					<h4>コース詳細</h4>
					<!--<dl class="infoTime">
						<dt>開校時間帯</dt>
						<dd>
							<table class="timeTbl teacherHead">
								<thead>
									<tr>
										<th colspan="3">ネイティブ講師</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-grown-native' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['grown-day-native'] );?></td>
										<td><?php echo esc_html( $fields['grown-time-native'] );?></td>
										<?php if($fields['grown-entry-native'] == '受付中'):?>
										<td class="accepting">受付中</td>
										<?php else: ?>
										<td>満員</td>
										<?php endif;?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<table class="timeTbl teacherHead">
								<thead>
									<tr>
										<th colspan="3">日本人バイリンガル講師</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-grown-jp' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['grown-day-jp'] );?></td>
										<td><?php echo esc_html( $fields['grown-time-jp'] );?></td>
										<?php if($fields['grown-entry-jp'] == '受付中'):?>
										<td class="accepting">受付中</td>
										<?php else: ?>
										<td>満員</td>
										<?php endif;?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</dd>
					</dl>-->
					<table class="detailTbl">
						<tbody>
							<tr>
								<th>開校曜日</th>
								<td>火・水・木・金・土</td>
							</tr>
							<tr>
								<th>受講時間</th>
								<td>1回60分　週１回※年間４４回</td>
							</tr>
							<tr>
								<th>その他補足</th>
								<td>
								プライベート：1名<br />セミプライベート：2名</td>
							</tr>
						</tbody>
					</table>
					<h4>コース料金</h4>
					<table class="detailTbl">
						<tbody>
							<tr>
								<th>受講料</th>
								<td>プライベート：26,400円（税込）／月<br>セミプライベート：20,900円（税込）／月</td>
							</tr>
							<tr>
								<th>教材費</th>
								<td>11,000円（税込）／年</td>
							</tr>
						</tbody>
					</table>
					<p style="text-align:right;">※事務手数料が別途かかります。</p>
				</div>
			</div>
		</section>

		<section id="sec03">
			<div class="contWrap">
				<h3 class="courseTtl"><span><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_ttl_03.png" alt="親子プライベートレッスン"></span></h3>
				<div class="introBox">
					<p><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_03_img.png" alt=""></p>
					<dl>
						<dt>ママの声から生まれました！<br />
						小さなお子様連れでも安心のレッスンです。</dt>
						<dd>英会話には興味があるけど、小さなお子様連れではなかなか通いづらい、という声にお応えして、この親子プライベートレッスンコースを開講いたしました。<br />
						お母様がレッスンを受けている間は同じ教室内の目の届くところでお子様は自由に遊んでいただけますので安心して、レッスンに取り組んでいただけます。<br />
						もちろんお母様だけでなく、お子様と一緒の親子レッスンもご受講いただけます。</dd>
					</dl>
				</div>
				<p class="examTxt">例えば、<br>
				<em>お母様のレッスンのみ60分</em>
				<em>お母様のレッスン40分+お子様との親子レッスン20分（合計60分）</em>
				<em>お母様のレッスン30分+お子様との親子レッスン30分（合計60分）</em>
				<em>お子様との親子レッスン（合計60分）</em>
				などレッスン時間をお好みにカスタマイズしてご受講いただけます。<br>
				将来的にお子様をプリスクールやインターナショナルスクールに入学させたいとお考えの方や周りのお子様より一歩先を進みたいとお考えの方にお勧めのコースです。</p>
				<ul class="pointList">
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_03_point_01.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_03_point_02.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/general/sec_03_point_03.png" alt=""></li>
				</ul>
				<div class="detailBox">
					<h4>コース詳細</h4>
					<table class="detailTbl">
						<tbody>
							<tr>
								<th>開校時間帯</th>
								<td>火曜日～金曜日　13：00～14：00<br>土曜日　11：00～12：00</td>
							</tr>
							<tr>
								<th>開校曜日</th>
								<td>火・水・木・金・土</td>
							</tr>
							<tr>
								<th>受講時間</th>
								<td>1回60分　週１回※年間４４回</td>
							</tr>
							<tr>
								<th>その他補足</th>
								<td>対象年齢：６カ月～３歳までのお子様とお母様</td>
							</tr>
						</tbody>
					</table>
					<h4>コース料金</h4>
					<table class="detailTbl">
						<tbody>
							<tr>
								<th>受講料</th>
								<td>26,400円（税込）／月</td>
							</tr>
							<tr>
								<th>教材費</th>
								<td>11,000円（税込）／年</td>
							</tr>
						</tbody>
					</table>
					<p style="text-align:right;">※事務手数料が別途かかります。</p>
				</div>
			</div>
		</section>
	
		<div class="lessonList">
			<div class="contWrap">
				<div class="ttlBox">
					<h2><img src="<?php echo get_template_directory_uri(); ?>/image/top/ttl_lesson.png" alt="LESSON コース案内"></h2>
					<p>フォーチューンではお子さまの年齢や英語学習の経験に合わせ、レッスンをご案内いたします。</p>
				</div>
				<ul id="lessonListPc">
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/top/pc/lesson_01.png" alt="親子英会話"><a href="<?php echo home_url() ?>/parentchild/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_01.png" alt="More"></a></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/top/pc/lesson_02.png" alt="幼稚園児・保育園児英会話"><a href="<?php echo home_url() ?>/kindergarten/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_02.png" alt="More"></a></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/top/pc/lesson_03.png" alt="小学生英会話"><a href="<?php echo home_url() ?>/primary/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_03.png" alt="More"></a></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/top/pc/lesson_04.png" alt="エリートキッズ英会話"><a href="<?php echo home_url() ?>/elite/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_04.png" alt="More"></a></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/top/pc/lesson_05.png" alt="小５～６中学コースプライベートレッスン"><a href="<?php echo home_url() ?>/private/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_05.png" alt="More"></a></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/top/pc/lesson_06.png" alt="中高生以上英会話"><a href="<?php echo home_url() ?>/general/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_06.png" alt="More"></a></li>
				</ul>
				<ul id="lessonListSp">
					<li>
						<dl>
							<dt><span><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_ttl_01.png" alt="親子英会話"></span></dt>
							<dd><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_img_01.png" alt=""></dd>
							<dd><a href="<?php echo home_url() ?>/parentchild/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_01.png" alt="More"></a></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt><span><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_ttl_02.png" alt="幼稚園児・保育園児英会話"></span></dt>
							<dd><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_img_02.png" alt=""></dd>
							<dd><a href="<?php echo home_url() ?>/kindergarten/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_02.png" alt="More"></a></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt><span><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_ttl_03.png" alt="小学生英会話"></span></dt>
							<dd><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_img_03.png" alt=""></dd>
							<dd><a href="<?php echo home_url() ?>/primary/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_03.png" alt="More"></a></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt><span><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_ttl_04.png" alt="エリートキッズ英会話"></span></dt>
							<dd><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_img_04.png" alt=""></dd>
							<dd><a href="<?php echo home_url() ?>/elite/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_04.png" alt="More"></a></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt><span><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_ttl_05.png" alt="小５～６中学コースプライベートレッスン"></span></dt>
							<dd><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_img_05.png" alt=""></dd>
							<dd><a href="<?php echo home_url() ?>/private/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_05.png" alt="More"></a></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt><span><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_ttl_06.png" alt="中高生以上英会話"></span></dt>
							<dd><img src="<?php echo get_template_directory_uri(); ?>/image/top/sp/lesson_img_06.png" alt=""></dd>
							<dd><a href="<?php echo home_url() ?>/general/"><img src="<?php echo get_template_directory_uri(); ?>/image/top/btn_more_06.png" alt="More"></a></dd>
						</dl>
					</li>
				</ul>
			</div>
		</div>

	</div>
	<!--△.cntnt△-->

<?php get_footer(); ?>