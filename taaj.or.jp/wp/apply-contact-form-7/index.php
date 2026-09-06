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
					<dl>
						<dt><span>記入日</span><em><span>必須</span></em></dt>
						<dd>
							<div class="birthBox">
								<div class="inputBox">[text* entry-month class:length-l]</div><span>月</span>
								<div class="inputBox">[text* entry-day class:length-l]</div><span>日</span>
								<div class="iconCalendar"></div>
							</div>
						</dd>
					</dl>
					<dl>
						<dt><span>会員種別</span><em><span>必須</span></em></dt>
						<dd>
							<div class="radioList">[radio membership-type use_label_element default:1 "正会員（個人）" "正会員（団体）" "学生会員"]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>氏名（漢字等）</span><em><span>必須</span></em></dt>
						<dd>
							<div class="inputBox">[text* your-name class:length-l placeholder "例）山田　太郎"]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>氏名（フリガナ）</span><em><span>必須</span></em></dt>
						<dd>
							<div class="inputBox">[text* your-name-kana class:length-l placeholder "例）ヤマダ タロウ"]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>性別</span><em><span>必須</span></em></dt>
						<dd>
							<div class="radioList">[radio gender use_label_element default:1 "男性" "女性" "その他"]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>生年月日</span><em><span>必須</span></em></dt>
						<dd>
							<div class="birthBox">
								<div class="inputBox">[text* birth-year class:length-l]</div><span>年</span>
								<div class="inputBox">[text* birth-month class:length-l]</div><span>月</span>
								<div class="inputBox">[text* birth-day class:length-l]</div><span>日</span>
							</div>
						</dd>
					</dl>
					<dl class="multi">
						<dt><span>自宅住所</span><em><span>必須</span></em></dt>
						<dd>
							<div class="addressBox">
								<div class="postalBox">
									<div class="inputBox">[text* home-postal1 class:length-l]</div><span>-</span>
									<div class="inputBox">[text* home-postal2 class:length-l]</div>
								</div>
								<div class="innerBox">
									<div class="inputBox">[text* home-prefecture class:length-l placeholder "例）東京都"]</div>
								</div>
								<div class="innerBox">
									<div class="inputBox">[text* home-city class:length-l placeholder "例）品川区　※区・市までで結構です"]</div>
								</div>
							</div>
						</dd>
					</dl>
					<dl>
						<dt><span>電話番号</span><em><span>必須</span></em><small>※自宅または携帯TEL</small></dt>
						<dd>
							<div class="inputBox">[tel* phone class:length-l]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>自宅FAX</span><em><span>必須</span></em></dt>
						<dd>
							<div class="inputBox">[tel* home-fax class:length-l]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>自宅メールアドレス</span><em><span>必須</span></em></dt>
						<dd>
							<div class="inputBox">[email* home-email class:length-l]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>勤務先名称</span></dt>
						<dd>
							<div class="inputBox">[text company-name class:length-l]</div>
						</dd>
					</dl>
					<dl class="multi">
						<dt><span>勤務先住所</span></dt>
						<dd>
							<div class="addressBox">
								<div class="postalBox">
									<div class="inputBox">[text company-postal1 class:length-l]</div><span>-</span>
									<div class="inputBox">[text company-postal2 class:length-l]</div>
								</div>
								<div class="innerBox">
									<div class="inputBox">[text company-prefecture class:length-l placeholder "例）東京都"]</div>
								</div>
								<div class="innerBox">
									<div class="inputBox">[text company-city class:length-l placeholder "例）品川区　※区・市までで結構です"]</div>
								</div>
							</div>
						</dd>
					</dl>
					<dl>
						<dt><span>勤務先FAX</span></dt>
						<dd>
							<div class="inputBox">[tel company-fax class:length-l]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>勤務先メールアドレス</span></dt>
						<dd>
							<div class="inputBox">[email company-email class:length-l]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>専門領域</span></dt>
						<dd>
							<div class="inputBox">[text specialty class:length-l]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>最終学位</span></dt>
						<dd>
							<div class="inputBox">[text degree class:length-l]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>TA学習歴</span></dt>
						<dd>
							<div class="inputBox">[text ta-history class:length-l]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>所属学会</span></dt>
						<dd>
							<div class="inputBox">[text academic-society class:length-l]</div>
						</dd>
					</dl>
					<dl class="long">
						<dt><span>当協会からの郵便物送付先はどちらを希望しますか？</span><em><span>必須</span></em></dt>
						<dd>
							<div class="radioList">[radio mail-destination use_label_element default:1 "自宅" "勤務先"]</div>
						</dd>
					</dl>
					<dl class="long">
						<dt><span>当協会から研修会などのお知らせメールを希望しますか？</span><em><span>必須</span></em></dt>
						<dd>
							<div class="radioList">[radio newsletter use_label_element default:1 "はい" "いいえ"]</div>
						</dd>
					</dl>
					<div class="submitBtn">
						[submit "送信する"]
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>