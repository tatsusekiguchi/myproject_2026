<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>
<main class="main" id="contact">
	<div class="pageTitleContainer">
		<div class="pageTitleBox">
			<h1>お問い合わせ</h1>
			<p>CONTACT</p>
		</div>
	</div>
	<div class="sec01">
		<div class="secWrap01">
			<div class="topTxt txt">
				<p>NPO法人日本ＴＡ協会事務局へのお問い合わせは<br>下記フォームまたはお電話にてお問い合わせください。</p>
			</div>
			<div class="pageSecTtlBox">
				<div class="pageSecTtl">
					<h2>メールでのお問い合わせ</h2>
				</div>
			</div>
			<div class="contactContainer">
				<div class="formBox">
					<dl>
						<dt><span>お名前</span><em><span>必須</span></em></dt>
						<dd>
							<div class="inputBox">[text* your-name autocomplete:name placeholder "例）山田　太郎"]</div>
						</dd>
					</dl>
					<dl class="multi">
						<dt><span>ご住所</span><em><span>必須</span></em></dt>
						<dd>
							<div class="addressBox">
								<div class="postalBox">
									<div class="inputBox">[text* postal1 autocomplete:postal-code]</div><span>-</span>
									<div class="inputBox">[text* postal2 autocomplete:postal-code]</div>
								</div>
								<div class="innerBox">
									<div class="inputBox">[text* address1 autocomplete:address-level1 placeholder "例）東京都"]</div>
								</div>
								<div class="innerBox">
									<div class="inputBox">[text* address2 autocomplete:address-level2 placeholder "例）品川区　※区・市までで結構です"]</div>
								</div>
							</div>
						</dd>
					</dl>
					<dl>
						<dt><span>電話番号</span><em><span>必須</span></em></dt>
						<dd>
							<div class="inputBox">[tel* your-tel autocomplete:tel]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>メールアドレス</span><em><span>必須</span></em></dt>
						<dd>
							<div class="inputBox">[email* your-email autocomplete:email]</div>
						</dd>
					</dl>
					<dl class="multi">
						<dt><span>お問い合わせ内容</span><em><span>必須</span></em></dt>
						<dd>
							<div class="inputBox">[textarea* content]</div>
						</dd>
					</dl>
					<div class="submitBtn">[submit "送信する"]</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sec02">
		<div class="secWrap01">
			<div class="pageSecTtlBox">
				<div class="pageSecTtl">
					<h2>電話でのお問い合わせ</h2>
				</div>
			</div>
			<div class="telPanel">
				<div class="tel"><a href="tel:0368222743"><span>TEL.</span><em>03-6822-2743</em></a></div>
				<aside>
					<p>［受付時間］ 月・木 　９:３０～１６:３０<br>※上記以外の時間は留守番電話となりますのでご了承下さい。</p>
				</aside>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>