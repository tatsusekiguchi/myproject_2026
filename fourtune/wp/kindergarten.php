<?php
/*
Template Name: 幼稚園英会話コース
*/
?>

<?php get_header(); ?>

	<!--▽.cntnt▽-->
	<div id="kindergarten" class="course">

		<!--▽.kv▽-->
		<div class="kv">
			<div>
				<h2><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/kv_ttl_pc.png" alt="幼稚園英会話コース"></h2>
			</div>
		</div>
		<!--△.kv△-->

		<div class="tabMenu">
			<ul>
				<li><a href="#sec01"><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/tab_01.png" alt=""></a></li>
				<li><a href="#sec02"><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/tab_02.png" alt=""></a></li>
				<li><a href="#sec03"><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/tab_03.png" alt=""></a></li>
			</ul>
		</div>

		<section id="sec01">
			<div class="contWrap">
				<h3 class="courseTtl"><span><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_ttl_01.png" alt="幼稚園児英会話コース"></span></h3>
				<div class="introBox">
					<p><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_01_img.png" alt=""></p>
					<dl>
						<dt>コミュニケーション学習と英語の読み方学習を中心にレッスンを行います。</dt>
						<dd>このコースは年齢と、習熟度に合わせた３つのレベルに分かれています。<br />
						このコースではコミュニケーション学習とフォニックス（英語の読み方）学習を中心にレッスンを行います。<br />
						コミュニケーション学習ではストーリーと歌が中心になったコミュニケーションを重視したテキスト・ワークブックを使用しながら、毎月のストーリーと歌、ゲームなどを通して、コミュニケーション能力を養います。</dd>
					</dl>
				</div>
				<p class="addTxt">フォニックス学習では、当校オリジナルのフォニックスのワークブックを使いながら、小学生英会話コースからの英語を書く学習の準備段階として、各アルファベットの音や形、書き方を学習していきます。<br />
				通常のレッスン以外にも年に数回、絵本の読み方のレッスンも行い、想像力も養います。<br />
				レベル1のクラスではまずは簡単な絵本を自分で読む練習を始めます。<br />
				その後のレベル2・3クラスでは、よりレベルの高い絵本を読めるように練習をし、自分で英語の絵本が読める！という自信を養っていきます。</p>
				<ul class="pointList">
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_01_point_01.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_01_point_02.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_01_point_03.png" alt=""></li>
				</ul>
				<div class="detailBox">
					<h4>コース詳細</h4>
					<!--<dl class="lv1">
						<dt>レベル1</dt>
						<dd>
							<table class="timeTbl">
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-kindergarten-lv1' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['kindergarten-day-lv1'] );?></td>
										<td><?php echo esc_html( $fields['kindergarten-time-lv1'] );?></td>
										<?php if($fields['kindergarten-entry-lv1'] == '受付中'):?>
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
									$field_group = SCF::get( 'cf-kindergarten-lv2' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['kindergarten-day-lv2'] );?></td>
										<td><?php echo esc_html( $fields['kindergarten-time-lv2'] );?></td>
										<?php if($fields['kindergarten-entry-lv2'] == '受付中'):?>
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
									$field_group = SCF::get( 'cf-kindergarten-lv3' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['kindergarten-day-lv3'] );?></td>
										<td><?php echo esc_html( $fields['kindergarten-time-lv3'] );?></td>
										<?php if($fields['kindergarten-entry-lv3'] == '受付中'):?>
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
								<td>定員：５名</td>
							</tr>
						</tbody>
					</table>
					<h4>コース料金</h4>
					<table class="detailTbl">
						<tbody>
							<tr>
								<th>受講料</th>
								<td>11,000円（税込）／月</td>
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
				<h3 class="courseTtl"><span><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_ttl_02.png" alt="ナイトキッズコース"></span></h3>
				<div class="introBox">
					<p><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_02_img.png" alt=""></p>
					<dl>
						<dt>夜7時スタート！フルタイムで働くお母様たちにご好評いただいております。</dt>
						<dd>レッスンは平日19時スタートなので、仕事後にお子様を迎えに行ってからでも通って頂ける3歳～小学校入学前のお子様を対象にしたコースです。<br />
						フルタイムで働くお母様たちにご好評いただいております。</dd>
					</dl>
				</div>
				<p class="addTxt">内容は、毎月のテーマに沿ってたくさん英語を使って遊んでいく実践的なコースです。ネイティブの子ども達が英語を覚えていくように英語の環境に浸ることにより自然な形で英語に触れていく事ができます。</p>
				<p class="addTxt">上記以外にもレッスンでは色、数、天気、アルファベットやフォニックス（英語の読み方）を学ぶサークルタイム、絵本の読み聞かせを行うストーリータイム、DVDタイムも行います。</p>
				<ul class="pointList">
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_02_point_01.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_02_point_02.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_02_point_03.png" alt=""></li>
				</ul>
				<div class="detailBox">
					<h4>コース詳細</h4>
					<!--<dl class="infoTime">
						<dt>開校時間帯</dt>
						<dd>
							<table class="timeTbl">
								<tbody>
									<?php
									$field_group = SCF::get( 'cf-nightkids' );
									foreach ( $field_group as $field_name => $fields ) {
									?>
									<tr>
										<td><?php echo esc_html( $fields['nightkids-day'] );?></td>
										<td><?php echo esc_html( $fields['nightkids-time'] );?></td>
										<?php if($fields['nightkids-entry'] == '受付中'):?>
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
								<td>定員：6名</td>
							</tr>
						</tbody>
					</table>
					<h4>コース料金</h4>
					<table class="detailTbl">
						<tbody>
							<tr>
								<th>受講料</th>
								<td>11,000円（税込）／月</td>
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
				<h3 class="courseTtl"><span><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_ttl_03.png" alt="エリートキッズコース"></span></h3>
				<div class="introBox">
					<p><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_03_img.png" alt=""></p>
					<dl>
						<dt>先生を独占できる１対１、または１対２～３の特別コースです。</dt>
						<dd>英語を本気で学びたいお子様の為の先生をで独占できる１対１の特別コースです。<br />
						レッスンは全てプライベートの為、一人ひとりの英語力、性格、成長により、学習内容、学習進度をカスタマイズしながら、お子様の英語力を最大限に向上させていくコースです。</dd>
					</dl>
				</div>
				<p class="addTxt">現在、プリスクール後の英語力向上を目指すお子様や、将来留学を目指すお子様、現在インターナショナルスクールに通っていて補講的に通っているお子様などたくさんの方々がご受講されています。<br />
				フォニックス（英語の読み方）とコミュニケーションを重視しながら、英語の４技能（聞く、話す、読む、書く）を総合的に養っていきます。<br />
				リーディング力強化の為に、当校オリジナルの多読プログラムを採用し、英語のインプットを増やしていきます。（※当校オリジナルの多読プログラムにつきましては、下記の「英語多読プログラムについて」をご参照ください。）<br />
				なお、レッスンで学んだことを復習する為、またご自宅での英語に触れる時間を確保する為、幼稚園年中以降のクラスでは毎週宿題がでます。</p>
				<ul class="pointList">
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_03_point_01.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_03_point_02.png" alt=""></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/image/kindergarten/sec_03_point_03.png" alt=""></li>
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
								プライベート：1名<br />セミプライベート：2名								
								</td>
							</tr>
						</tbody>
					</table>
					<h4>コース料金</h4>
					<table class="detailTbl">
						<tbody>
							<tr>
								<th>受講料</th>
								<td>プライベート：26,400円（税込）／月<br />セミプライベート：20,900円（税込）／月</td>

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