<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>
<main class="main pageMain" id="contact">
	<div class="pageTitlePanel">
		<h1>お問い合わせ</h1>
		<p>Contact</p>
	</div>
	<div class="contactSection">
		<div class="secWrap01">
			<div class="topTxt txt">
				<p>まだ何も決まっていなくても大丈夫です。<br>「何から考えればいいか分からない」段階からご相談いただけます。</p>
			</div>
			<div class="formBox">
				<dl class="field-name">
					<dt><span>お名前</span><em>必須</em></dt>
					<dd>
						<div class="inputBox">[text* your-name autocomplete:name placeholder "例)山田　太郎"]</div>
					</dd>
				</dl>

				<dl class="field-email">
					<dt><span>メールアドレス</span><em>必須</em></dt>
					<dd>
						<div class="inputBox">[email* your-email autocomplete:email]</div>
					</dd>
				</dl>

				<dl class="multi field-tel">
					<dt><span>電話番号</span><small>任意</small></dt>
					<dd>
						<div class="inputBox">[tel your-tel autocomplete:tel]</div>
						<aside><p>※メールでのご連絡をご希望の場合は未入力でも構いません</p></aside>
					</dd>
				</dl>

				<dl class="multi field-consultation">
					<dt><span>ご相談内容</span><em>必須</em></dt>
					<dd>
						<p>ご相談の対象を教えてください(複数選択可)</p>
						<div class="checkList">[checkbox* consultation-target use_label_element "ご自宅(戸建て)" "ご自宅(マンション)" "ご実家" "相続した(予定の)不動産" "賃貸に出している/出したい" "その他"]</div>
						<div class="inputBox">[textarea consultation-detail placeholder "その他、詳しくお聞かせください"]</div>
					</dd>
				</dl>

				<dl class="multi field-theme">
					<dt><span>ご相談のテーマ</span><em>必須</em></dt>
					<dd>
						<p>いま考えていることに近いものを選んでください(複数選択可)</p>
						<div class="checkList">[checkbox* consultation-theme use_label_element "売却するか迷っている" "建て替えるか迷っている" "リフォームするか迷っている" "今は決めない方がよいか迷っている" "相続・名義・家族の話が絡んでいる" "空き家/空室の活用を考えている" "賃貸併用・収益化を検討している" "将来の住み替え(近居・同居含む)を考えている" "まずは現状把握(整理)をしたい" "その他"]</div>
						<div class="inputBox">[textarea theme-detail placeholder "その他、詳しくお聞かせください"]</div>
					</dd>
				</dl>

				<dl class="multi field-status">
					<dt><span>現在の状況</span><em>必須</em></dt>
					<dd>
						<p>現在の状況に近いものを選んでください(複数選択可)</p>
						<div class="checkList">[checkbox* current-status use_label_element "まだ何も決まっていない(整理したい)" "方向性はあるが、比較して決めたい" "ある程度決まっているが、最終判断が不安" "実施の段取りまで見据えて相談したい" "その他"]</div>				<div class="inputBox">[textarea status-detail placeholder "その他、詳しくお聞かせください"]</div>					</dd>
				</dl>

				<dl class="multi field-method">
					<dt><span>ご希望の進め方を<br>教えてください</span><em>必須</em></dt>
					<dd>
						<div class="checkList">[checkbox* preferred-method use_label_element "まずは話して整理したい(結論は急がない)" "可能性を広げたい(選択肢を比較したい)" "ある程度決まっているが、最終判断が不安" "現実的な一歩に落とし込みたい(段取りを整えたい)" "その他"]</div>
				<div class="inputBox">[textarea method-detail placeholder "その他、詳しくお聞かせください"]</div>
					</dd>
				</dl>

				<dl class="multi field-property">
					<dt><span>住まいの基本情報</span><em>必須</em></dt>
					<dd>
						<div class="propertyList">
							<div class="propertyBox">
								<div class="ttl"><p>住所</p></div>
								<div class="item"><div class="inputBox">[text* property-address placeholder "東京都文京区..."]</div></div>
							</div>
							<div class="propertyBox">
								<div class="ttl"><p>種別</p></div>
							<div class="item"><div class="radioList">[radio property-type use_label_element default:1 "戸建て" "マンション"]</div></div>
							</div>
							<div class="propertyBox">
								<div class="ttl"><p>築年数</p></div>
								<div class="item unitBox"><div class="inputBox">[text property-age]</div><span class="unit">年くらい</span></div>
							</div>
							<div class="propertyBox">
								<div class="ttl"><p>延床面積</p></div>
								<div class="item unitBox"><div class="inputBox">[text property-area]</div><span class="unit">㎡</span></div>
							</div>
						</div>
					</dd>
				</dl>

				<dl class="multi field-concern">
					<dt><span>気になっている点</span><small>任意</small></dt>
					<dd>
						<p>特に気になっていることはありますか？(複数選択可)</p>
						<div class="checkList">[checkbox concern use_label_element "予算感が分からない" "家族の意見がまとまらない" "相続・名義の整理が必要" "住みながら進められるか不安" "工事の規模が決められない" "空き家/空室の活用を考えている" "売却とリフォームで迷っている" "どこに相談すればいいか分からない" "その他"]</div>
						<div class="inputBox">[textarea concern-detail placeholder "その他、詳しくお聞かせください"]</div>
					</dd>
				</dl>

				<dl class="field-contact-method">
					<dt><span>ご希望の連絡方法</span><em>必須</em></dt>
					<dd>
						<div class="radioList">[radio contact-method use_label_element default:1 "メール" "電話" "どちらでも"]</div>
					</dd>
				</dl>

				<dl class="multi field-datetime">
					<dt><span>ご希望の連絡日時</span><small>任意</small></dt>
					<dd>
						<div class="inputBox">[text preferred-time placeholder "例:平日午前/平日夕方/土曜午前 など"]</div>
						<aside><p>※例:平日午前/平日夕方/土曜午前 など</p></aside>
					</dd>
				</dl>

				<div class="submitBtn"><span>[submit "この内容で相談する"]</span></div>

				<div class="bottomNote">
					<aside>
						<p>※ご相談内容に応じて、事前に進め方をご説明します。</p>
						<p>※無理に次のステップをおすすめすることはありません。</p>
					</aside>
				</div>
			</div>
		</div>
	</div>
	<div class="topicPath">
		<div class="secWrap01">
			<ol>
				<li><a href="<?php echo home_url(); ?>">トップ</a></li>
				<li>お問い合わせ</li>
			</ol>
		</div>
	</div>
	</main>
<?php get_footer(); ?>