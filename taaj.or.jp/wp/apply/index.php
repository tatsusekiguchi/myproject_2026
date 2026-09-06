<?php
/*
Template Name: 入会申し込み
*/
?>
<?php get_header(); ?>
<main class="main" id="apply">
	<div class="pageTitleContainer">
		<div class="pageTitleBox">
			<h1>入会申し込み</h1>
			<p>MEMBERSHIP APPLICATION</p>
		</div>
	</div>
	<div class="sec01">
		<div class="secWrap01">
			<div class="pageSecTtlBox">
				<div class="pageSecTtl">
					<h2>入会金および年会費について</h2>
				</div>
			</div>
			<div class="priceTable">
				<table>
					<thead>
						<tr>
							<th>会員種別</th>
							<th>入会金</th>
							<th>年会費</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>正会員（個人・団体）</td>
							<td>5,000円</td>
							<td>7,000円</td>
						</tr>
						<tr>
							<td>学生会員（個人）</td>
							<td>5,000円</td>
							<td>4,000円</td>
						</tr>
					</tbody>
				</table>
			</div>
			<p>※10/1～3/31に入会をされる方は初年度のみ年会費が半額となります。</p>
		</div>
	</div>
	<div class="sec02">
		<div class="secWrap01">
			<div class="pageSecTtlBox">
				<div class="pageSecTtl">
					<h2>入会の流れ</h2>
				</div>
			</div>
			<div class="listPanel">
				<div class="listBox">
					<ul>
						<li>
							<dl>
								<dt>１.申し込み</dt>
								<dd>
									<div class="txt center">
										<p>下記入会フォームより<br>申込ください。</p>
									</div>
								<div class="arrow"><img src="<?php bloginfo('template_url'); ?>/image/apply/icon_arrow_green.png" alt=""></div>
								</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>２.お支払い</dt>
								<dd>
									<div class="txt">
										<p>事務局から入会手続きの案内に関するメールが届きましたら、入会金と年会費を下記の方法にてお支払いください。<br>１.オンライン決済<br>（クレジットカード・コンビニ決済）<br>２.銀行振込<br>３.郵便振替</p>
									</div>
								</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>３.手続き完了</dt>
								<dd>
									<div class="txt center">
										<p>ご入金確認後にTAAJの会員サービスがご利用可能となります。</p>
									</div>
								</dd>
							</dl>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="sec03">
		<div class="secWrap01">
			<div class="pageSecTtlBox">
				<div class="pageSecTtl">
					<h2>入会フォーム</h2>
				</div>
			</div>
			<div class="contactContainer">
				<div class="formBox">
					<?php echo do_shortcode( '[contact-form-7 id="62894fb" title="入会フォーム"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>