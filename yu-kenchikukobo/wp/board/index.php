<?php
/*
Template Name: 掲示板設置
*/
?>
<?php get_header(); ?>
<!-- ▽メイン▽-->
<main class="main" id="board">
	<div class="pageKvPanel">
		<div class="kvTitle">
			<h1>掲示板設置</h1>
		</div>
		<div class="pageKv"><img src="<?php bloginfo('template_url'); ?>/image/board/top_kv.png" alt=""></div>
	</div>
	<div class="pageContainer">
		<div class="topSection">
			<div class="secWrap01">
				<div class="secTtl">
					<h2><span>“どこに頼めば？”に応えます。</span><em>掲示板設置工事</em></h2>
				</div>
				<div class="secBox">
					<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/board/top_sec_img.png" alt=""></div>
					<div class="txtBox">
						<div class="ttl">
							<p>設置工事全般お任せ下さい</p>
						</div>
						<div class="txt">
							<p>自治体や町内会、地域団体にとって大切な情報発信の場となる掲示板。<br>遊 建築工房では、掲示板の新設から移設、撤去まで幅広く対応しています。<br>現地の状況に応じた柔軟なご提案と、行政手続きまで含めたトータル対応で、安心してお任せいただけます。</p>
						</div>
					</div>
				</div>
				<div class="requestPanel">
					<div class="ttl">
						<p>こんなご要望にお応えします</p>
					</div>
					<div class="list">
						<ul>
							<li>町内会や自治会で、新たに掲示板を設置したい</li>
							<li>老朽化で使えなくなった掲示板を撤去・再設置したい</li>
							<li>設置にあたっての行政手続きをまとめて任せたい</li>
							<li>掲示板以外にも、公民館の修繕ややぐら・盆踊りステージ設置をお願いしたい</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap01">
				<div class="sectionTitle">
					<h3>対応業務</h3>
				</div>
				<div class="listBox">
					<ul>
						<li>
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/board/sec01_img_01.png" alt=""></div>
							<dl>
								<dt>掲示板設置工事</dt>
								<dd>屋内外を問わす、用途・設置場所に応じた最適な仕様の掲示板を設置。<br>1基から複数設置まで承ります。</dd>
							</dl>
						</li>
						<li>
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/board/sec01_img_02.png" alt=""></div>
							<dl>
								<dt>公民館修繕</dt>
								<dd>公民館などの照明器具のLED 化や分電盤交換、外壁塗装など、住宅施工の技術をもって様々な困りごとに対応できます。</dd>
							</dl>
						</li>
						<li>
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/board/sec01_img_03.png" alt=""></div>
							<dl>
								<dt>イベント時のスポット利用</dt>
								<dd>例えば祭りのステージや櫓組みなども対応可能です。早朝からの設置や雨天時延期などのスケジュール調整などお時間に余裕をもってご相談ください。</dd>
							</dl>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="sec02">
			<div class="secWrap01">
				<div class="sectionTitle">
					<h3>遊 建築工房に依頼するメリット</h3>
				</div>
				<div class="listBox">
					<ul>
						<li>
							<dl>
								<dt>トータル対応可能</dt>
								<dd>既存掲示板の撤去・設置、新設の設置場所の相談、必要であれば行政手続きまでまとめて対応。</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>柔軟な工期対応</dt>
								<dd>日曜対応など、地域行事に合わせたスケジュール調整も可能。</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>地域密着の実績</dt>
								<dd>名古屋市緑区を中心に、自治会や地域団体からのご依頼多数。</dd>
							</dl>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="sec03">
			<div class="secWrap01">
				<div class="sectionTitle">
					<h3>施工事例</h3>
				</div>
				<div class="secBoxList">
					<?php if (have_rows('board_cases')): ?>
						<?php while (have_rows('board_cases')): the_row(); ?>
							<?php
							$image = get_sub_field('board_case_image');
							$title = get_sub_field('board_case_title');
							$cost = get_sub_field('board_case_cost');
							$size = get_sub_field('board_case_size');
							$description = get_sub_field('board_case_description');
							?>
							<div class="secBox">
								<div class="photo">
									<?php if ($image): ?>
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $title); ?>">
									<?php else: ?>
										<img src="<?php bloginfo('template_url'); ?>/image/board/sec03_img_01.png" alt="">
									<?php endif; ?>
								</div>
								<div class="txtBox">
									<div class="ttl">
										<p><?php echo esc_html($title ?: '施工事例タイトル'); ?></p>
									</div>
									<div class="info">
										<?php if ($cost): ?>
											<dl>
												<dt>参考費用：</dt>
												<dd><?php echo esc_html($cost); ?></dd>
											</dl>
										<?php endif; ?>
										<?php if ($size): ?>
											<dl>
												<dt>サイズ：</dt>
												<dd><?php echo esc_html($size); ?></dd>
											</dl>
										<?php endif; ?>
									</div>
									<?php if ($description): ?>
										<div class="txt">
											<?php echo nl2br(esc_html($description)); ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="sec04">
			<div class="secWrap01">
				<div class="sectionTitle">
					<h3>その他の施工事例</h3>
				</div>
				<div class="secPanel">
					<div class="listBox">
						<ul>
							<?php
							// 最新の投稿3件を取得（掲示板カテゴリのみ）
							$other_cases_query = new WP_Query(array(
								'post_type' => 'post',
								'posts_per_page' => 3,
								'post_status' => 'publish',
								'orderby' => 'date',
								'order' => 'DESC',
								'cat' => 8  // 掲示板カテゴリID
							));

							if ($other_cases_query->have_posts()) :
								while ($other_cases_query->have_posts()) : $other_cases_query->the_post();
							?>
							<li>
								<a href="<?php echo esc_url(get_permalink()); ?>">
									<div class="photo">
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
										<?php else : ?>
											<img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/top/sec03_img.png" alt="<?php echo esc_attr(get_the_title()); ?>">
										<?php endif; ?>
									</div>
									<div class="title">
										<p><?php echo esc_html(get_the_title()); ?></p>
									</div>
								</a>
							</li>
							<?php
								endwhile;
								wp_reset_postdata();
							else :
								// 投稿がない場合のデフォルト表示
								for ($i = 0; $i < 3; $i++) :
							?>
							<li>
								<a href="#">
									<div class="photo">
										<img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/top/sec03_img.png" alt="">
									</div>
									<div class="title">
										<p>投稿がありません</p>
									</div>
								</a>
							</li>
							<?php
								endfor;
							endif;
							?>
						</ul>
					</div>
					<div class="titleBox">
						<div class="more"><a href="<?php echo esc_url(home_url('/caselist')); ?>">一覧はこちら</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<!-- △メイン△-->
<?php get_footer(); ?>