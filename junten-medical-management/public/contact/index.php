<?php
declare(strict_types=1);

session_start();

const CONTACT_TO = 'info@junten-medical-management.co.jp';

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function text_length(string $value): int
{
    return function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);
}

$values = ['name' => '', 'email' => '', 'email_confirm' => '', 'message' => ''];
$errors = [];
$sent = !empty($_SESSION['contact_sent']);
unset($_SESSION['contact_sent']);

if (empty($_SESSION['contact_token'])) {
    $_SESSION['contact_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $unused) {
        $values[$key] = trim((string) ($_POST[$key] ?? ''));
    }

    $token = (string) ($_POST['contact_token'] ?? '');
    if (!hash_equals((string) $_SESSION['contact_token'], $token)) {
        $errors['form'] = 'セッションの有効期限が切れました。ページを再読み込みして、もう一度お試しください。';
    }
    if ($values['name'] === '') {
        $errors['name'] = 'お名前を入力してください。';
    } elseif (text_length($values['name']) > 100) {
        $errors['name'] = 'お名前は100文字以内で入力してください。';
    }
    if ($values['email'] === '') {
        $errors['email'] = 'メールアドレスを入力してください。';
    } elseif (
        !filter_var($values['email'], FILTER_VALIDATE_EMAIL)
        || preg_match('/[\r\n]/', $values['email'])
    ) {
        $errors['email'] = '正しいメールアドレスを入力してください。';
    }
    if ($values['email_confirm'] === '') {
        $errors['email_confirm'] = '確認用メールアドレスを入力してください。';
    } elseif ($values['email'] !== $values['email_confirm']) {
        $errors['email_confirm'] = 'メールアドレスが一致しません。';
    }
    if (text_length($values['message']) > 2000) {
        $errors['message'] = 'お問い合わせ内容は2000文字以内で入力してください。';
    }

    if (!$errors) {
        $subject = '=?UTF-8?B?' . base64_encode('Webサイトからのお問い合わせ') . '?=';
        $body = "Webサイトからお問い合わせがありました。\r\n\r\n"
            . "お名前：{$values['name']}\r\n"
            . "メールアドレス：{$values['email']}\r\n\r\n"
            . "お問い合わせ内容：\r\n{$values['message']}\r\n";
        $serverName = (string) ($_SERVER['SERVER_NAME'] ?? 'localhost');
        $host = preg_replace('/[^a-z0-9.-]/i', '', $serverName) ?: 'localhost';
        $headers = [
            'From: website@' . $host,
            'Reply-To: ' . $values['email'],
            'MIME-Version: 1.0',
            'Content-Type: text/plain; charset=UTF-8',
            'Content-Transfer-Encoding: 8bit',
        ];

        if (@mail(CONTACT_TO, $subject, $body, implode("\r\n", $headers))) {
            $_SESSION['contact_sent'] = true;
            $_SESSION['contact_token'] = bin2hex(random_bytes(32));
            header('Location: index.php?sent=1', true, 303);
            exit;
        }
        $errors['form'] = '送信に失敗しました。時間をおいて、もう一度お試しください。';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="robots" content="noindex">
    <meta name="description" content="株式会社順天メディカルマネジメントへのお問い合わせページです。">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" media="screen and (max-width: 1024px)" href="../css/common_sp.css">
    <link rel="stylesheet" media="screen and (max-width: 1024px)" href="../css/layout_sp.css">
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/common.js"></script>
    <script src="../js/scrollAnimation.js"></script>
    <script src="../js/contact.js"></script>
    <title>お問い合わせ｜順天メディカルマネジメント</title>
</head>
<body class="page">
    <header class="header">
        <div class="headWrap">
            <div class="logo">
                <a href="../index.html">
                    <img src="../image/common/header_logo.png" alt="">
                </a>
            </div>
        </div>
    </header>

    <main class="main" id="contact">
        <div class="pageTitlePanel">
            <div class="pageTitle">
                <div class="pageSecTtlBox">
                    <div class="sub">
                        <p>- CONTACT -</p>
                    </div>
                    <div class="pageSecTtl">
                        <h2>お問い合わせ</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="contactSection">
            <div class="secWrap02">
                <div class="topTxt txt">
                    <p>
                        お問い合わせをいただいて2 ～ 3 営業日以内に内容の確認をさせていただき、<br>
                        メールもしくは電話にて対応いたします。
                    </p>
                </div>

                <div class="contactForm formBox">
                    <?php if (isset($errors['form'])): ?>
                        <p class="formErrorSummary" role="alert">
                            <?= h($errors['form']) ?>
                        </p>
                    <?php endif; ?>

                    <form class="simpleContactForm" action="index.php" method="post" novalidate>
                        <input
                            type="hidden"
                            name="contact_token"
                            value="<?= h($_SESSION['contact_token']) ?>"
                        >

                        <div class="formRow">
                            <div class="formLabel">
                                <label for="contactName">お名前</label>
                                <span class="required">必須</span>
                            </div>
                            <div class="formInput">
                                <input
                                    id="contactName"
                                    class="<?= isset($errors['name']) ? 'is-error' : '' ?>"
                                    type="text"
                                    name="name"
                                    value="<?= h($values['name']) ?>"
                                    placeholder="例）山田　太郎"
                                    autocomplete="name"
                                    maxlength="100"
                                    required
                                >
                                <?php if (isset($errors['name'])): ?>
                                    <p class="errorText" role="alert"><?= h($errors['name']) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="formRow">
                            <div class="formLabel">
                                <label for="contactEmail">メールアドレス</label>
                                <span class="required">必須</span>
                            </div>
                            <div class="formInput">
                                <input
                                    id="contactEmail"
                                    class="<?= isset($errors['email']) ? 'is-error' : '' ?>"
                                    type="email"
                                    name="email"
                                    value="<?= h($values['email']) ?>"
                                    placeholder="例）info@sample.com"
                                    autocomplete="email"
                                    maxlength="254"
                                    required
                                >
                                <?php if (isset($errors['email'])): ?>
                                    <p class="errorText" role="alert"><?= h($errors['email']) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="formRow">
                            <div class="formLabel">
                                <label for="contactEmailConfirm">メールアドレス(確認)</label>
                                <span class="required">必須</span>
                            </div>
                            <div class="formInput">
                                <input
                                    id="contactEmailConfirm"
                                    class="<?= isset($errors['email_confirm']) ? 'is-error' : '' ?>"
                                    type="email"
                                    name="email_confirm"
                                    value="<?= h($values['email_confirm']) ?>"
                                    placeholder="確認のため再度お願いいたします。"
                                    autocomplete="off"
                                    maxlength="254"
                                    required
                                >
                                <?php if (isset($errors['email_confirm'])): ?>
                                    <p class="errorText" role="alert">
                                        <?= h($errors['email_confirm']) ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="formRow formRowTextarea">
                            <div class="formLabel">
                                <label for="contactMessage">お問い合わせ内容</label>
                            </div>
                            <div class="formInput">
                                <textarea
                                    id="contactMessage"
                                    class="<?= isset($errors['message']) ? 'is-error' : '' ?>"
                                    name="message"
                                    maxlength="2000"
                                ><?= h($values['message']) ?></textarea>
                                <?php if (isset($errors['message'])): ?>
                                    <p class="errorText" role="alert"><?= h($errors['message']) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="formSubmit">
                            <button type="submit">送信する</button>
                        </div>
                    </form>
                </div>

                <div
                    class="contactComplete<?= $sent ? ' is-show' : '' ?>"
                    role="dialog"
                    aria-modal="true"
                    aria-labelledby="contactCompleteTitle"
                    aria-hidden="<?= $sent ? 'false' : 'true' ?>"
                >
                    <div class="completePanel">
                        <p id="contactCompleteTitle">送信が完了しました</p>
                        <button class="completeClose" type="button">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="footContact">
            <div class="secWrap01">
                <div class="pageSecTtlBox fadeUp">
                    <div class="sub">
                        <p>- CONTACT -</p>
                    </div>
                    <div class="pageSecTtl">
                        <h2>お問い合わせ</h2>
                    </div>
                </div>
                <div class="btnContact">
                    <a href="./"><span>MAILFORM</span></a>
                </div>
            </div>
        </div>

        <div class="footPanel">
            <div class="secWrap01">
                <div class="logo">
                    <img src="../image/common/footer_logo.png" alt="">
                </div>
                <div class="footNav">
                    <ul>
                        <li><a href="../index.html#sec02">私たちのサービス</a></li>
                        <li><a href="../index.html#sec03">連携医療機関</a></li>
                        <li><a href="../index.html#sec04">会社概要</a></li>
                        <li><a href="../contact/">お問い合わせ</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footBottom">
            <div class="secWrap01">
                <div class="policy">
                    <a href="#">プライバシーポリシー</a>
                </div>
                <div class="copy">
                    <p>&copy;2026 株式会社順天メディカルマネジメント.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
