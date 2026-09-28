<?php
/**
 * Contact Form 7管理画面の「フォーム」欄へ貼り付けるテンプレートです。
 *
 * お問い合わせ：ID 5
 * 学習相談　　：ID 57
 *
 * Contact Form 7はPHPファイルを直接インポートできないため、下記の文字列を
 * それぞれのフォーム編集画面へコピーして使用してください。
 */

$aichi_koushikai_contact_form7_templates = array(
	'contact' => <<<'FORM'
<dl>
	<dt>お問い合わせ種別</dt>
	<dd>
		<div class="checkList">
			[checkbox your-subject use_label_element "入学について" "塾について"]
		</div>
	</dd>
</dl>
<dl>
	<dt><span>お名前</span><em>必須</em></dt>
	<dd><div class="inputBox">[text* your-name placeholder "例：山田 太郎"]</div></dd>
</dl>
<dl>
	<dt><span>電話番号</span><em>必須</em></dt>
	<dd><div class="inputBox">[tel* your-tel placeholder "例：000-0000-0000"]</div></dd>
</dl>
<dl>
	<dt><span>メールアドレス</span><em>必須</em></dt>
	<dd><div class="inputBox">[email* your-email placeholder "例：info@example.com"]</div></dd>
</dl>
<dl>
	<dt><span>学校名・学年</span><em>必須</em></dt>
	<dd>
		<div class="schoolBox">
			<div class="inputBox">[text* your-school]</div>
			<div class="inputBox gradeBox">[text* your-grade]</div><span>年</span>
		</div>
	</dd>
</dl>
<dl class="multi">
	<dt>お問い合わせ内容</dt>
	<dd><div class="inputBox">[textarea your-message placeholder "お問い合わせ内容をご記入ください。"]</div></dd>
</dl>
<div class="privacyLink">
	<p>個人情報の取り扱いについては<a href="https://aichi-koushikai.com/privacy-policy/" target="_blank" rel="noopener">こちら</a></p>
</div>
<div class="privacyCheck">
	<label class="checkItem"><input type="checkbox" name="agree"><span>個人情報の取り扱いについて同意する</span></label>
</div>
<div class="btnSubmit">[submit "送信する"]</div>
FORM
,
	'consultation' => <<<'FORM'
<dl>
	<dt><span>お名前</span><em>必須</em></dt>
	<dd><div class="inputBox">[text* your-name placeholder "例：山田 太郎"]</div></dd>
</dl>
<dl>
	<dt><span>メールアドレス</span><em>必須</em></dt>
	<dd><div class="inputBox">[email* your-email placeholder "例：info@example.com"]</div></dd>
</dl>
<dl>
	<dt>学校名・学年</dt>
	<dd>
		<div class="schoolBox">
			<div class="inputBox">[text your-school]</div>
			<div class="inputBox gradeBox">[text your-grade]</div><span>年</span>
		</div>
	</dd>
</dl>
<dl class="multi">
	<dt><span>ご相談内容</span><em>必須</em></dt>
	<dd><div class="inputBox">[textarea* your-message placeholder "ご相談内容をご記入ください。"]</div></dd>
</dl>
<div class="privacyLink">
	<p>個人情報の取り扱いについては<a href="https://aichi-koushikai.com/privacy-policy/" target="_blank" rel="noopener">こちら</a></p>
</div>
<div class="privacyCheck">
	<label class="checkItem"><input type="checkbox" name="agree"><span>個人情報の取り扱いについて同意する</span></label>
</div>
<div class="btnSubmit">[submit "送信する"]</div>
FORM
);

/**
 * Contact Form 7の「メール」タブに貼り付けるメッセージ本文です。
 */
$aichi_koushikai_contact_form7_mail_templates = array(
	'contact' => <<<'MAIL'
お問い合わせを受け付けました。

以下の内容でお問い合わせがありました。

お問い合わせ種別：[your-subject]
お名前：[your-name]
電話番号：[your-tel]
メールアドレス：[your-email]
学校名：[your-school]
学年：[your-grade]年

お問い合わせ内容：
[your-message]

――――――――――――――――――
愛知講師会
https://aichi-koushikai.com/
MAIL
,
	'consultation' => <<<'MAIL'
学習相談を受け付けました。

以下の内容で学習相談がありました。

お名前：[your-name]
メールアドレス：[your-email]
学校名：[your-school]
学年：[your-grade]年

ご相談内容：
[your-message]

――――――――――――――――――
愛知講師会
https://aichi-koushikai.com/
MAIL
);
