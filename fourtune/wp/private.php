<?php
/*
Template Name: 小5・小6プライベートレッスン
*/
?>

<?php get_header(); ?>

	<!--▽.cntnt▽-->
	<div id="private" class="course">

		<!--▽.kv▽-->
		<div class="kv">
			<div>
				<h2><img src="<?php echo get_template_directory_uri(); ?>/image/private/kv_ttl_pc.png" alt="小5・小6プライベートレッスン"></h2>
			</div>
		</div>
		<!--△.kv△-->

		<section id="sec01">
			<div class="contWrap">
				<h3 class="courseTtl"><span><img src="<?php echo get_template_directory_uri(); ?>/image/private/sec_ttl_01.png" alt="小5・小6プライベートレッスン"></span></h3>
				<div class="introBox">
					<p><img src="<?php echo get_template_directory_uri(); ?>/image/private/sec_01_img.png" alt=""></p>
					<dl>
						<dt>中学前に中１程度の英語力を先取りできてしまうコースです</dt>
						<dd>中学での英語の授業スタートに向けて、必要な英語のコミュニケーション能力をつけるための特別プログラムです。小学５年生・６年生でこれまでに英語にしっかりと触れてこなかったお子さんが中学前に中１程度の英語力を先取りできちゃうコースです。<br />
						このコースを受講することで自信を持って中学の英語の授業に臨むことができます。<br />
						お子さんが中学生になってから英語で困って欲しくない方へオススメのコースです。</dd>
					</dl>
				</div>
				<ul class="pointList">
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/private/sec_01_point_01.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/private/sec_01_point_02.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/private/sec_01_point_03.png" alt=""></li>
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
									$field_group = SCF::get( 'cf-private-native' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['private-day-native'] );?></td>
										<td><?php echo esc_html( $fields['private-time-native'] );?></td>
										<?php if($fields['private-entry-native'] == '受付中'):?>
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
									$field_group = SCF::get( 'cf-private-jp' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['private-day-jp'] );?></td>
										<td><?php echo esc_html( $fields['private-time-jp'] );?></td>
										<?php if($fields['private-entry-jp'] == '受付中'):?>
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