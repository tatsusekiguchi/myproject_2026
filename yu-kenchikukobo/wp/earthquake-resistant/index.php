<?php
/*
Template Name: 耐震リフォーム
*/
?>
<?php get_header(); ?>
<!-- ▽メイン▽-->
<main class="main" id="earthquake-resistant">
	<div class="pageKvPanel">
		<div class="kvTitle">
			<h1>耐震リフォーム</h1>
		</div>
		<div class="pageKv"><img src="<?php bloginfo('template_url'); ?>/image/earthquake-resistant/top_kv.png" alt=""></div>
	</div>
	<div class="pageContainer">
		<div class="topSection">
			<div class="secWrap01">
				<div class="pageSecTtlBox02">
					<div class="sub">
						<p>EARTHQUAKE-RESISTANT RENOVATION</p>
					</div>
					<div class="pageSecTtl">
						<h2>耐震リフォームとは</h2>
					</div>
				</div>
				<div class="txt">
					<p>耐震リフォームとは、建物の柱や壁、基礎を補強し、地震の揺れに強い家にする工事です。<br>2000年以前に建築された家は、現行の耐震基準を満たしていない場合もあり、大きな地震で倒壊や損傷のリスクが高まります。<br>遊 建築工房では、お住まいの状態を丁寧に調査し、住みながらでもできる最適な補強方法をご提案いたします。<br>大切なご家族を守る「安心の住まい」へと生まれ変わらせます。</p>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap01">
				<div class="secTtl">
					<h3>こんな方が対象です</h3>
				</div>
				<div class="list">
					<ul>
						<li>
							<p>親御さんの家を譲り受けたが<br>耐震に不安がある方</p>
						</li>
						<li>
							<p>空き家を購入して<br>リフォームすることを考えている方</p>
						</li>
						<li>
							<p>リフォームの機会に<br>耐震補強を考えている方</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="sec02">
			<div class="secWrap01">
				<div class="secTtl">
					<h3>耐震補強の工事内容</h3>
				</div>
				<div class="listBox">
					<ul>
						<li>
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/earthquake-resistant/sec02_list_01.png" alt=""></div>
							<p>屋根の軽量化</p>
						</li>
						<li>
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/earthquake-resistant/sec02_list_02.png" alt=""></div>
							<p>腐朽した土台・柱の交換</p>
						</li>
						<li>
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/earthquake-resistant/sec02_list_03.png" alt=""></div>
							<p>不足する壁筋かいの追加・補強</p>
						</li>
						<li>
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/earthquake-resistant/sec02_list_04.png" alt=""></div>
							<p>コストを抑えた耐震補強方法</p>
						</li>
						<li>
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/earthquake-resistant/sec02_list_05.png" alt=""></div>
							<p>接合部の補強</p>
						</li>
						<li>
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/earthquake-resistant/sec02_list_06.png" alt=""></div>
							<p>基礎の新設・補強</p>
						</li>
					</ul>
				</div>
				<div class="infoBox">
					<div class="inner">
						<div class="ttl">
							<p>耐震診断を受けましょう。</p>
						</div>
						<div class="message">
							<p>まずは、無料耐震診断のはがきが届いた方は、市または、県の無料診断を受けましょう。<br>または、はがきが届いていない方は、建築設計士による耐震診断を受けることから始まります。</p>
						</div>
						<div class="txt">
							<p>工事内容は、建築設計士の耐震診断の結果で補強計画を作ります。<br>それによって工事個所、数量、施工方法などが決まります。</p>
							<p>ただし、耐震補強工事の補助金が得られる場合、補助金交付申請書を行政に提出をし、<br>交付決定通知書が届いてからの工事請負契約手続きとなります。</p>
							<p>補助金対象外の方は、補強計画を元に工事をすすめる形になります。</p>
							<p>耐震補強工事には、様々な方法があります。<br>それらを複合的に使って、今の住まいを強い家にアップグレードし、安心して生活できることを一緒にかなえましょう。</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sec03">
			<div class="secWrap01">
				<div class="secTtl">
					<h3>事例紹介</h3>
				</div>
				<div class="secPanelList">
					<?php
					$reform_cases = get_field('reform_cases');
					if ($reform_cases):
						foreach ($reform_cases as $case):
							$main_image = $case['main_image'];
							$case_title = $case['case_title'];
							$cost = $case['cost'];
							$construction_period = $case['construction_period'];
							$description = $case['description'];
							$supplement_images = $case['supplement_images'];
					?>
					<div class="secPanel">
						<div class="secBox">
							<?php if ($main_image): ?>
							<div class="photo"><img src="<?php echo esc_url($main_image['url']); ?>" alt="<?php echo esc_attr($main_image['alt']); ?>"></div>
							<?php endif; ?>
							<div class="txtBox">
								<?php if ($case_title): ?>
								<div class="ttl">
									<p><?php echo esc_html($case_title); ?></p>
								</div>
								<?php endif; ?>
								<div class="info">
									<?php if ($cost): ?>
									<dl>
										<dt>費用</dt>
										<dd>/<?php echo esc_html($cost); ?></dd>
									</dl>
									<?php endif; ?>
									<?php if ($construction_period): ?>
									<dl>
										<dt>工期</dt>
										<dd>/<?php echo esc_html($construction_period); ?></dd>
									</dl>
									<?php endif; ?>
								</div>
								<?php if ($description): ?>
								<div class="txt">
									<p><?php echo nl2br(esc_html($description)); ?></p>
								</div>
								<?php endif; ?>
							</div>
						</div>
						<?php if ($supplement_images && count($supplement_images) > 0): ?>
						<div class="listBox">
							<ul>
								<?php foreach ($supplement_images as $supplement):
									$image = $supplement['image'];
									$caption = $supplement['caption'];
								?>
								<li>
									<?php if ($image): ?>
									<div class="photo"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></div>
									<?php endif; ?>
									<?php if ($caption): ?>
									<div class="txt"><?php echo nl2br(esc_html($caption)); ?></div>
									<?php endif; ?>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
					</div>
					<?php
						endforeach;
					else:
					?>
					<!-- ACFでデータが登録されていない場合のフォールバック -->
					<div class="secPanel">
						<div class="secBox">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/earthquake-resistant/case_main_01.png" alt=""></div>
							<div class="txtBox">
								<div class="ttl">
									<p>事例を登録してください</p>
								</div>
								<div class="info">
									<dl>
										<dt>費用</dt>
										<dd>/管理画面でACFフィールドに入力</dd>
									</dl>
									<dl>
										<dt>工期</dt>
										<dd>/管理画面でACFフィールドに入力</dd>
									</dl>
								</div>
								<div class="txt">
									<p>WordPress管理画面の「リフォーム事例紹介」フィールドで事例を登録してください。</p>
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</main>
<!-- △メイン△-->
<?php get_footer(); ?>