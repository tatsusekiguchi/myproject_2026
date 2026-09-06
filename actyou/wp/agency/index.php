<?php
/*
Template Name: 旅行会社様専用
*/
?>
<?php get_header(); ?>
	<main class="main" id="agency">
		<div class="pageKvContainer">
			<div class="pageKv">
				<div class="kvTitle">
					<h1>旅行会社様専用</h1>
				</div>
			</div>
		</div>
		<div class="topSection">
			<div class="secWrap01">
				<div class="secBox">
					<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/agency/top_sec_img.png" alt=""></div>
					<div class="txtBox">
						<div class="txt">
							<p>アクト・ユートラベルは、旅行会社様の業務を支えるパートナーとして、各種手配や企画のサポートを行っております。<br>韓国・中国・東南アジアを中心に現地ランドオペレーターとの直接連携による柔軟でスピーディーな手配が可能です。<br>独自に培ってきたノウハウにより、小回りの利いた対応と競争力のある条件をご提案いたします。<br>多様なニーズにお応えできる体制で、貴社のサービス価値向上に貢献いたします。</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap01">
				<div class="pageSecTtlBox">
					<h2>旅行会社様専用プラン一覧</h2>
					<p>PLAN</p>
				</div>
				<div class="topTxt txt">
					<p>旅行会社様専用のプランです。<br>以下一覧よりPDFをダウンロードいただけます。</p>
				</div>
				<?php
				$agency_plan_groups = array();
				$agency_plan_country_rows = function_exists('get_field') ? get_field('agency_plan_countries') : array();

				if($agency_plan_country_rows):
					foreach($agency_plan_country_rows as $agency_plan_country_row):
						$country_name = isset($agency_plan_country_row['country_name']) ? trim($agency_plan_country_row['country_name']) : '';
						$agency_plan_rows = isset($agency_plan_country_row['plans']) ? $agency_plan_country_row['plans'] : array();

						if(!$country_name || !$agency_plan_rows):
							continue;
						endif;

						foreach($agency_plan_rows as $agency_plan_row):
							$plan_name = isset($agency_plan_row['plan_name']) ? trim($agency_plan_row['plan_name']) : '';
							$pdf_download = isset($agency_plan_row['pdf_download']) ? $agency_plan_row['pdf_download'] : '';
							$pdf_url = '';

							if(is_array($pdf_download) && !empty($pdf_download['url'])):
								$pdf_url = $pdf_download['url'];
							elseif(is_numeric($pdf_download)):
								$pdf_url = wp_get_attachment_url($pdf_download);
							elseif(is_string($pdf_download)):
								$pdf_url = $pdf_download;
							endif;

							if($plan_name && $pdf_url):
								if(!isset($agency_plan_groups[$country_name])):
									$agency_plan_groups[$country_name] = array();
								endif;
								$agency_plan_groups[$country_name][] = array(
									'plan_name' => $plan_name,
									'pdf_url' => $pdf_url,
								);
							endif;
						endforeach;
					endforeach;
				endif;
				?>
				<?php if($agency_plan_groups): ?>
				<div class="secContainer">
					<div class="tabList">
						<ul>
							<?php $agency_tab_count = 1; ?>
							<?php foreach($agency_plan_groups as $country_name => $agency_plans): ?>
							<li<?php if($agency_tab_count === 1): ?> class="active"<?php endif; ?>><a href="#tab<?php echo sprintf('%02d', $agency_tab_count); ?>"><?php echo esc_html($country_name); ?></a></li>
							<?php $agency_tab_count++; ?>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="tabContent">
						<?php $agency_panel_count = 1; ?>
							<?php foreach($agency_plan_groups as $country_name => $agency_plans): ?>
							<div class="tabPanel<?php if($agency_panel_count === 1): ?> active<?php endif; ?>" id="tab<?php echo sprintf('%02d', $agency_panel_count); ?>">
								<div class="secBoxPanel">
									<div class="secBox">
										<?php foreach($agency_plans as $agency_plan): ?>
										<dl>
											<dt><?php echo esc_html($agency_plan['plan_name']); ?></dt>
											<dd>
												<div class="btnPdf"><a href="<?php echo esc_url($agency_plan['pdf_url']); ?>" target="_blank" rel="noopener"><span>PDFダウンロード</span></a></div>
											</dd>
										</dl>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						<?php $agency_panel_count++; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
