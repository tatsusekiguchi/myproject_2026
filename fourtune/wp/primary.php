<?php
/*
Template Name: 小学生英会話コース
*/
?>

<?php get_header(); ?>

	<!--▽.cntnt▽-->
	<div id="primary" class="course">

		<!--▽.kv▽-->
		<div class="kv">
			<div>
				<h2><img src="<?php echo get_template_directory_uri(); ?>/image/primary/kv_ttl_pc.png" alt="小学生英会話コース"></h2>
			</div>
		</div>
		<!--△.kv△-->

		<div class="tabMenu">
			<ul>
				<li><a href="#sec01"><img src="<?php echo get_template_directory_uri(); ?>/image/primary/tab_01.png" alt=""></a></li>
				<li><a href="#sec02"><img src="<?php echo get_template_directory_uri(); ?>/image/primary/tab_02.png" alt=""></a></li>
			</ul>
		</div>

		<section id="sec01">
			<div class="contWrap">
				<h3 class="courseTtl"><span><img src="<?php echo get_template_directory_uri(); ?>/image/primary/sec_ttl_01.png" alt="幼稚園児英会話コース"></span></h3>
				<div class="introBox">
					<p><img src="<?php echo get_template_directory_uri(); ?>/image/primary/sec_01_img.png" alt=""></p>
					<dl>
						<dt>コミュニケーション学習と英語の読み方学習を中心に総合的な英語力を養います。</dt>
						<dd>小学生の１年生から６年生までの子ども達を対象として、週１回６０分のコースで、英語力と学習年数に応じて６レベルがございます。<br />
						レッスンはフォニックス（英語の読み方）とコミュニケーションを重視したテキストを使い、フォニックス学習とコミュニケーション学習の２本立ての構成で総合的な英語力を養います。</dd>
					</dl>
				</div>
				<p class="addTxt">フォニックス学習では、テキスト、ワークブック、当校オリジナルのフォニックスプリントを使用し、正しい英語の発音力、読み書き力の育成をします。コミュニケーション学習では、テキスト、ワークブック、当校オリジナルのフォニックスプリントを使用し、正しい英語の発音力、読み書き力の育成をします。<br />
				コミュニケーション学習では、テキストを使い、チャンツ、ゲームを多く用いて、子ども達が積極的に聞き話すのを促します。語彙力、会話パターンを学び、聞き話す練習をたくさんすることで英語での会話力、表現力を養い、読む、書く、聞く、話すの英語の４技能を効率よく学び、総合的な英語力の育成を行います。レッスンで学んだことを復習するために、このコースではどのクラスでも毎回宿題が出ます。<br />
				小学生より、ご自宅、学童、トワイライトスクールなどへの無料送迎サービスがございます。<br />
				※送迎は教室より車で１０分程度、約２kmの範囲内になります。</p>
				<ul class="pointList">
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/primary/sec_01_point_01.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/primary/sec_01_point_02.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/primary/sec_01_point_03.png" alt=""></li>
				</ul>
				<div class="detailBox">
					<h4>コース詳細</h4>
					<!--<dl class="lv1">
						<dt>レベル1</dt>
						<dd>
							<table class="timeTbl">
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-primary-lv1' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['primary-day-lv1'] );?></td>
										<td><?php echo esc_html( $fields['primary-time-lv1'] );?></td>
										<?php if($fields['primary-entry-lv1'] == '受付中'):?>
										<td class="accepting">受付中</td>
										<?php else: ?>
										<td>満員</td>
										<?php endif;?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</dd>
					</dl>
					<dl class="lv2">
						<dt>レベル2</dt>
						<dd>
							<table class="timeTbl">
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-primary-lv2' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['primary-day-lv2'] );?></td>
										<td><?php echo esc_html( $fields['primary-time-lv2'] );?></td>
										<?php if($fields['primary-entry-lv2'] == '受付中'):?>
										<td class="accepting">受付中</td>
										<?php else: ?>
										<td>満員</td>
										<?php endif;?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</dd>
					</dl>
					<dl class="lv3">
						<dt>レベル3</dt>
						<dd>
							<table class="timeTbl">
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-primary-lv3' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['primary-day-lv3'] );?></td>
										<td><?php echo esc_html( $fields['primary-time-lv3'] );?></td>
										<?php if($fields['primary-entry-lv3'] == '受付中'):?>
										<td class="accepting">受付中</td>
										<?php else: ?>
										<td>満員</td>
										<?php endif;?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</dd>
					</dl>
					<dl class="lv4">
						<dt>レベル4</dt>
						<dd>
							<table class="timeTbl">
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-primary-lv4' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['primary-day-lv4'] );?></td>
										<td><?php echo esc_html( $fields['primary-time-lv4'] );?></td>
										<?php if($fields['primary-entry-lv4'] == '受付中'):?>
										<td class="accepting">受付中</td>
										<?php else: ?>
										<td>満員</td>
										<?php endif;?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</dd>
					</dl>
					<dl class="lv5">
						<dt>レベル5</dt>
						<dd>
							<table class="timeTbl">
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-primary-lv5' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['primary-day-lv5'] );?></td>
										<td><?php echo esc_html( $fields['primary-time-lv5'] );?></td>
										<?php if($fields['primary-entry-lv5'] == '受付中'):?>
										<td class="accepting">受付中</td>
										<?php else: ?>
										<td>満員</td>
										<?php endif;?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</dd>
					</dl>
					<dl class="lv6">
						<dt>レベル6</dt>
						<dd>
							<table class="timeTbl">
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-primary-lv6' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['primary-day-lv6'] );?></td>
										<td><?php echo esc_html( $fields['primary-time-lv6'] );?></td>
										<?php if($fields['primary-entry-lv6'] == '受付中'):?>
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
								<td>定員：５組（振替参加者を含めて６組まで）</td>
							</tr>
						</tbody>
					</table>
					<h4>コース料金</h4>
					<table class="detailTbl">
						<tbody>
							<tr>
								<th>受講料</th>
								<td>13,200円（税込）／月</td>
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
				<h3 class="courseTtl"><span><img src="<?php echo get_template_directory_uri(); ?>/image/primary/sec_ttl_02.png" alt="エリートキッズコース"></span></h3>
				<div class="introBox">
					<p><img src="<?php echo get_template_directory_uri(); ?>/image/primary/sec_02_img.png" alt=""></p>
					<dl>
						<dt>先生を独占できる１対１の特別コースです。</dt>
						<dd>英語を本気で学びたいお子様の為の先生を独占できる１対１の特別コースです。<br />
						レッスンは全てプライベートの為、一人ひとりの英語力、性格、成長により、学習内容、学習進度をカスタマイズしながら、お子様の英語力を最大限に向上させていくコースです。</dd>
					</dl>
				</div>
				<p class="addTxt">現在、プリスクール後の英語力向上を目指すお子様や、将来留学を目指すお子様、現在インターナショナルスクールに通っていて補講的に通っているお子様などたくさんの方々がご受講されています。<br />
				フォニックス（英語の読み方）とコミュニケーションを重視しながら、英語の４技能（聞く、話す、読む、書く）を総合的に養っていきます。<br />
				リーディング力強化の為に、当校オリジナルの多読プログラムを採用し、英語のインプットを増やしていきます。（※当校オリジナルの多読プログラムにつきましては、下記の「英語多読プログラムについて」をご参照ください。）<br />
				なお、レッスンで学んだことを復習する為、またご自宅での英語に触れる時間を確保する為、幼稚園年中以降のクラスでは毎週宿題がでます。</p>
				<ul class="pointList">
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/primary/sec_02_point_01.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/primary/sec_02_point_02.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/primary/sec_02_point_03.png" alt=""></li>
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
									$field_group = SCF::get( 'cf-elite-native',24 );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['elite-day-native'] );?></td>
										<td><?php echo esc_html( $fields['elite-time-native'] );?></td>
										<?php if($fields['elite-entry-native'] == '受付中'):?>
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
									$field_group = SCF::get( 'cf-elite-jp',24 );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['elite-day-jp'] );?></td>
										<td><?php echo esc_html( $fields['elite-time-jp'] );?></td>
										<?php if($fields['elite-entry-jp'] == '受付中'):?>
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
								<td>対象年齢：３歳～12歳<br />
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
	
		<section class="reading">
			<div class="contWrap">
				<h4 class="ttlBorder"><span><img src="<?php echo get_template_directory_uri(); ?>/image/course/reading_ttl.png" alt="多読プログラムについて"></span></h4>
				<p>英語多読プログラムは当校オリジナルの英語のリーディング力と英語での理解力を強する為に開発されたプログラムです。</p>
				<div>
					<p>レベル別に分かれた絵本をお子様のレベルに合わせて毎週１～2冊お渡しし、教室にて先生と意味と発音を確認しながら練習し、
					ご自宅では宿題としてその絵本を読み込んでいただきます。<br />
					そして、次のレッスン時に再度発音と内容の確認を行う事により、リーディング力だけでなく、英語での理解力、コミュニ
					ケーション能力を向上させていきます。</p>
					<p>将来的にハリーポッターなどの英語の小説が読めるようになるのを目標としています。</p>
				</div>
				<ul>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/course/reading_img_01.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/course/reading_img_02.png" alt=""></li>
				</ul>
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