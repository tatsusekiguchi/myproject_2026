<?php
/*
Template Name: メルマガ登録
*/
?>
<?php get_header(); ?>
<main class="main" id="newsletter">
	<div class="pageTitleContainer">
		<div class="pageTitleBox">
			<h1>メルマガ登録</h1>
			<p>NEWSLETTER</p>
		</div>
	</div>
	<div class="sec01">
		<div class="secWrap01">
			<div class="topTxt txt">
				<p>メールマガジンでは定期的に研修情報等をお届けしています。<br>TAAJからのメールマガジンを希望の方は、以下のフォームに記入願います。<br>会員には、毎回送信されますので、こちらからの改めての登録は不要です。</p>
			</div>
			<div class="pageSecTtlBox">
				<div class="pageSecTtl">
					<h2>メルマガ登録</h2>
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
					<dl>
						<dt><span>フリガナ</span><em><span>必須</span></em></dt>
						<dd>
							<div class="inputBox">[text* your-kana placeholder "例）ヤマダ　タロウ"]</div>
						</dd>
					</dl>
					<dl>
						<dt><span>メールアドレス</span><em><span>必須</span></em></dt>
						<dd>
							<div class="inputBox">[email* your-email autocomplete:email]</div>
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