# ヘッダー・フッター・TOPの引き渡し

## 編集元

- 共通設定・4カテゴリの仮URL: `src/pug/site.pug`
- NEWS・商品・FAQの固定原稿: `src/pug/layouts/index.pug`
- ナビの固定文言: `src/pug/common/navList.pug`
- 共通部品: `src/pug/common/header.pug`・`navList.pug`・`footer.pug`
- TOP: `src/pug/pages/index.pug`・`src/pug/layouts/index.pug`
- スタイル: `src/sass/common.scss`・`common_sp.scss`・`layout.scss`・`layout_sp.scss`・`_mixin.scss`
- 動作: `public/js/common.js`（メニュー・ページトップ・FAQ開閉）

構造はdiv、TOPのh1は1つ。SPは1024px以下、商品は600px以下で1列。PCデザインからSPを再構成しているため、画面確認後に調整する。

## 画像配置

TOPのPSDから書き出した画像を`public/image/common/`・`public/image/top/`へ格納。商品写真と背景はJPEG、ロゴとInstagramアイコンはPNG。

imgのsrcはユーザー指定の`https://sit-9586431.sibloo.com/system_panel/uploads/images/`をそのままベースURLとし、ファイル名を直接連結する（common/・top/等は付けない）。ユーザー指定の配信パスに合わせて設定済み。以下のURLで画像を配信できるようCMS側へ配置する。外部URLの疎通・アップロードは未実施。

| ローカルの書き出し画像 | imgの参照URL |
| --- | --- |
| public/image/common/logo_accel.png | https://sit-9586431.sibloo.com/system_panel/uploads/images/logo_accel.png |
| public/image/common/icon_instagram.png | https://sit-9586431.sibloo.com/system_panel/uploads/images/icon_instagram.png |
| public/image/top/top_kv_logo.png | https://sit-9586431.sibloo.com/system_panel/uploads/images/top_kv_logo.png |
| public/image/top/top_products_coating.jpg | https://sit-9586431.sibloo.com/system_panel/uploads/images/top_products_coating.jpg |
| public/image/top/top_products_holo.jpg | https://sit-9586431.sibloo.com/system_panel/uploads/images/top_products_holo.jpg |
| public/image/top/top_products_glow.jpg | https://sit-9586431.sibloo.com/system_panel/uploads/images/top_products_glow.jpg |
| public/image/top/top_products_gear.jpg | https://sit-9586431.sibloo.com/system_panel/uploads/images/top_products_gear.jpg |

Instagram仮画像は`public/image/top/top_insta_post_01.jpg`〜`top_insta_post_08.jpg`。各ファイルを`https://sit-9586431.sibloo.com/system_panel/uploads/images/`へ配置する。画像・文言・アカウントは参照案件から転用していない。

KV背景の`top_kv_bg.jpg`はCSSから`../image/top/top_kv_bg.jpg`を参照。CMS移行時はCSS背景の配信先も確認する。

## 仮表示と未確定事項

- NEWSはPSDの3件の仮原稿。`src/pug/layouts/index.pug`の.newsItem内の日付・本文を直接変更できる。長い本文は1行で省略。日付はpで表示し、timeタグは使用しない。
- FAQの先頭はPSD原稿、残り4件の回答はユーザー了承のうえ「回答準備中です。」と仮表示。
- Instagramはbekkochan-farmのinstaList・webgene-blog/item・photoの構造を参考に変更。構造タグは本案件のdivを維持し、共通cmsInstagram mixinからTOPの仮8件とCMS断片の繰り返し元1件を出力。PC4列・SP2列。CMS設定参考値は8件。PSDから書き出した仮画像を使い、仮リンク先は本案件のInstagramアカウント。CMSのデータソース接続・canonicalタグ・画像出力は実機未確認。
- 下層URLは`/coating/`・`/holo/`・`/glow/`・`/gear/`の仮設定。下層ページ本体は今回未作成。
- SEOは本案件のPSD本文から作成した仮設定。同梱テキストの別会社のSEO原稿は使用していない。
- フッターはPSDの会社情報とメールリンクを反映。最新のユーザー指定に従いフッターへ4カテゴリのナビを追加し、ヘッダー・フッターのナビ文字を中央寄せ。Facebookは非掲載。

## ユーザーによる生成・確認

案件ルートで実行する。依存関係が未導入の場合のみ、先に`npm ci`を実行する。

```sh
python3 scripts/check_template.py
npx gulp pug
npx gulp css
npx gulp
```

`npx gulp`は初回生成・ローカル配信・監視を含む。AIはビルド・サーバー・動的テストを実行していない。

320px・480px・600px・1024px・1025px・PC幅で、画像欠落、横はみ出し、固定ナビ、SPメニューの開閉・Escape、FAQの開閉、ページトップ、スクロール表示を確認する。下層雛形も共通ヘッダー・フッターの変更影響を確認する。外部画像配置後に画像URLの表示、メール・Instagramリンクを確認する。

生成HTMLのW3C検証、ブラウザーコンソール、CMS表示は未確認。静的チェックはPug/Sassコンパイル・画面・CMSの検証を代替しない。

CMSインポート向けにaria属性、role、tabindex、画像のwidth/height、loading、fetchpriorityは使用しない。FAQの初期非表示はSass、開閉判定は.is-openで管理する。

固定のページ内容はbekkochan-farmと同様にPugへ直接記述し、編集時に配列やループを追う構成を避けている。CMSの繰り返し元はcommon/cmsBlocks.pugを唯一の編集元として維持する。ハンバーガーとFAQは役割divをクリック対象とし、JavaScriptは機能別関数で構成する。参照案件にあるタグ・属性も、最新のユーザー指定に反するものは使用しない。

## TOPの.fadeUp（2026-10-22）

ユーザー指定によりcommon.scssの.fadeUp・独自キーフレームとcommon.jsの独自表示監視を削除。TOPのsite_use_scroll_animationをtrueにし、共通headの既存分岐でanimate.cssとscrollAnimation.jsを読み込む。他ページでは既定のfalseを維持する。既存scrollAnimation.jsがload・scroll時にanimated fadeInUpを付与する。ライブラリ本体は変更しない。Pug・CSSの再生成後に画面・CMS実機で確認する。
