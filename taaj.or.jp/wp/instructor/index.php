<?php
/*
Template Name: 講師紹介
*/
?>
<?php get_header(); ?>
<main class="main" id="instructor">
	<div class="pageTitleContainer">
		<div class="pageTitleBox">
			<h1>講師紹介</h1>
			<p>INSTRUCTOR PROFILE</p>
		</div>
	</div>
	<div class="topSection">
		<div class="secWrap01">
			<div class="topTxt txt">
				<p>掲載に同意した国際資格を持つトレイナーのリストです。</p>
			</div>
			<div class="secPanelList">
				<div class="secPanel">
					<div class="inner">
						<div class="pTtl">
							<h2>ＴＡの国際資格</h2>
						</div>
						<div class="licenseTable">
							<dl>
								<dt>CTA</dt>
								<dd>Certified Transactional Analyst，認定ＴＡアナリスト</dd>
							</dl>
							<dl>
								<dt>PTSTA</dt>
								<dd>Provisional Teaching and Supervising Transactional Analyst，准教授・スーパーバイザー級ＴＡアナリスト</dd>
							</dl>
							<dl>
								<dt>TSTA</dt>
								<dd>Teaching and Supervising Transactional Analyst，教授・スーパーバイザー級ＴＡアナリスト</dd>
							</dl>
						</div>
						<p>なお，TTAは教授のみ，STAはスーパービジョンのみのトレイナー資格です。</p>
					</div>
				</div>
				<div class="secPanel">
					<div class="inner">
						<div class="pTtl">
							<h2>ＴＡの応用領域</h2>
						</div>
						<div class="txtBox">
							<div class="txt">
								<p>ＴＡの応用領域：Pサイコセラピー，E教育，O組織，Cカウンセリング</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sec01">
		<div class="secWrap01">
			<div class="pageSecTtlBox">
				<div class="pageSecTtl">
					<h2>講師一覧</h2>
				</div>
			</div>
			<div class="topTxt txt">
				<p>以下は、国内にいる国際資格の有資格者で、掲載許可を頂いた方のリストです。<br>順次、更新していく予定です。<br>掲載希望の方は、TAAJ事務局までご連絡ください。<br>資格を示すアルファベットは、上欄をご覧ください。<br>SVプロジェクトの参加については、<a href="" target="_blank">こちら</a>をご覧ください。</p>
			</div>
			<div class="instructorTable">
				<table>
					<thead>
						<tr>
							<th class="registrationNo">登録No</th>
							<th class="name">氏名</th>
							<th class="qualification">資格</th>
							<th class="introduction">紹介</th>
							<th class="svProject">SVプロジェクト<br>参加</th>
							<th class="url">参考URL</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$instructor_index = 1;
						if (have_rows('instructor_list')):
							while (have_rows('instructor_list')): the_row();
						?>
                        <tr>
                            <td class="registrationNo">
                                <dl>
                                    <dt>登録No</dt>
                                    <dd><?php echo str_pad($instructor_index++, 2, '0', STR_PAD_LEFT); ?></dd>
                                </dl>
                            </td>
                            <td class="name">
                                <dl>
                                    <dt>氏名</dt>
                                    <dd><?php echo esc_html(get_sub_field('name')); ?></dd>
                                </dl>
                            </td>
                            <td class="qualification">
                                <dl>
                                    <dt>資格</dt>
                                    <dd><?php echo esc_html(get_sub_field('qualification')); ?></dd>
                                </dl>
                            </td>
                            <td class="introduction">
                                <dl>
                                    <dt>紹介</dt>
                                    <dd><?php echo wpautop(get_sub_field('introduction')); ?></dd>
                                </dl>
                            </td>
                            <td class="svProject">
                                <dl>
                                    <dt>SVプロジェクト参加</dt>
                                    <dd><?php echo esc_html(get_sub_field('sv_project')); ?></dd>
                                </dl>
                            </td>
                            <td class="url">
                                <dl>
                                    <dt>参考URL</dt>
                                    <dd>
                                        <?php if (get_sub_field('url')): ?>
                                        <a href="<?php echo esc_url(get_sub_field('url')); ?>" target="_blank" rel="noopener"><?php echo esc_url(get_sub_field('url')); ?></a>
                                        <?php endif; ?>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
						<?php
							endwhile;
						endif;
						?>
                    </tbody>
				</table>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>