<?php
/*
Template Name: 教室案内
Template Post Type: page
*/
get_header();
?>

	<main class="accessMain" id="access">
		<div class="pageKvContainer">
			<div class="pageKvPanel">
				<div class="pageKvTitle">
					<p>ACCESS</p>
					<h1>教室案内</h1>
				</div>
				<div class="topicPath">
					<ol>
						<li><a href="<?php echo esc_url( aichi_koushikai_page_url() ); ?>">HOME</a></li>
						<li>教室案内</li>
					</ol>
				</div>
			</div>
		</div>
		<section class="sectionAccess">
			<div class="secWrap">
				<div class="accessPanel">
					<div class="accessOverview">
						<h2>施設概要</h2>
						<dl class="specTable">
							<div class="specRow">
								<dt>所在地</dt>
								<dd>〒464-0000　愛知県名古屋市千種区〇〇1-2-3</dd>
							</div>
							<div class="specRow">
								<dt>電話番号</dt>
								<dd><a href="tel:052-000-0000">052-000-0000</a></dd>
							</div>
							<div class="specRow">
								<dt>受付時間</dt>
								<dd>平日16:00〜22:00</dd>
							</div>
							<div class="specRow">
								<dt>休校日</dt>
								<dd>日曜・祝日、夏季休業・年末年始</dd>
							</div>
						</dl>
					</div>
					<div class="accessGallery">
						<ul>
							<li>
								<figure><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/access/access_photo_02.png' ) ); ?>" alt="" width="447" height="294" loading="lazy">
									<figcaption>教室1</figcaption>
								</figure>
							</li>
							<li>
								<figure><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/access/access_photo_03.png' ) ); ?>" alt="" width="441" height="290" loading="lazy">
									<figcaption>教室2</figcaption>
								</figure>
							</li>
							<li>
								<figure><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/access/access_photo_04.png' ) ); ?>" alt="" width="447" height="294" loading="lazy">
									<figcaption>面談スペース</figcaption>
								</figure>
							</li>
							<li>
								<figure><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/access/access_photo_05.png' ) ); ?>" alt="" width="445" height="293" loading="lazy">
									<figcaption>教室3</figcaption>
								</figure>
							</li>
							<li>
								<figure><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/access/access_photo_06.png' ) ); ?>" alt="" width="445" height="292" loading="lazy">
									<figcaption>トイレ</figcaption>
								</figure>
							</li>
							<li>
								<figure><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/access/access_photo_07.png' ) ); ?>" alt="" width="449" height="296" loading="lazy">
									<figcaption>入口</figcaption>
								</figure>
							</li>
							<li>
								<figure><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/access/access_photo_08.png' ) ); ?>" alt="" width="445" height="293" loading="lazy">
									<figcaption>玄関</figcaption>
								</figure>
							</li>
						</ul>
					</div>
					<div class="accessMapArea">
						<h2>アクセス</h2>
						<div class="accessMapContainer">
							<div class="mapBox"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3261.739185865585!2d136.9649613!3d35.163124800000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60037aa0a3a12cd1%3A0x9c67bfcf3337b3e3!2z44CSNDY0LTA4MDcg5oSb55-l55yM5ZCN5Y-k5bGL5biC5Y2D56iu5Yy65p2x5bGx6YCa77yR5LiB55uu77yT77yQ4oiS77yY!5e0!3m2!1sja!2sjp!4v1790219021447!5m2!1sja!2sjp" allow="fullscreen" loading="lazy"></iframe></div>
							<div class="accessSteps">
								<h3>駅からの来かた</h3>
								<ol>
									<li><span class="stepNum">1</span>
										<p>地下鉄東山線「〇〇駅」〇番出口を出て、直進します。</p>
									</li>
									<li><span class="stepNum">2</span>
										<p>2つ目の信号を右折し、〇〇通りを道なりに進みます。</p>
									</li>
									<li><span class="stepNum">3</span>
										<p>徒歩約〇分、右手に見える建物の2階が教室です。<br>バスをご利用の場合は「〇〇」バス停から徒歩約〇分です。</p>
									</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>


<?php get_footer(); ?>

