# ウレタン・その他塗料ページ

## 編集元と生成

- URL: `/coating/`
- ページ設定: `src/pug/pages/coating/index.pug`
- 本文: `src/pug/layouts/coating.pug`
- PC/SPスタイル: `src/sass/layout.scss`・`layout_sp.scss`の`.productsMain`
- ID・一覧・JANリンクの自動設定: `public/js/products.js`（02〜05で共用）
- ページ内移動: `public/js/common.js`の`pageScroll`・`scrollToTarget`

支給PSDから商品5件、UVバリアフィルム、FAQ3件、JAN表のテキストを転記。固定原稿はPugへ直接記述。見出しはh1→h2→h3、a直下はクラス付きdiv。span・time・構造タグ・aria属性・画像寸法属性は使用していない。

## ノーコード画面での商品追加

1. `.productBlock`を1件複製し、商品名・説明・画像を変更する。
2. JAN表も追加する場合は製品単位の`.tbody`を丸ごと複製し、内部の`.janGroup`の商品名と明細のJANコードを変更する。
3. JANグループ名は商品見出しと同じ商品名にする。先頭の「■」と空白の違いは照合時に無視する。

IDやhrefの入力・変更、商品一覧の手動追加は不要。製品ページ共通の`public/js/products.js`が商品ブロックへ`product-item-1`、`product-item-2`…、製品単位の`.tbody`へ`product-jan-1`、`product-jan-2`…を自動設定する。一覧も商品見出しから作成し、商品のJANボタンは同じ商品名のJANグループへ自動設定する。

並べ替え後も再採番し、JANとの対応は表示名で照合する。対応するJANグループがない場合はJANコード表の先頭へ移動する。同名のJANグループが複数ある場合は先頭のグループへ移動するため、別商品には区別できる商品名を付ける。

商品ブロック・JAN表の複製、削除、商品名変更をDOM上で検知して再設定する。ノーコード画面固有の編集方式や公開後のスクリプト実行はCMS実機で未確認。IDリンクのスクロール処理は既存の共通JSを使用する。

## PDF仮リンク

全商品とも`.btnPdf`内は`a(href="#", target="_blank", rel="noopener")`。PDF支給後にhrefのみ実ファイルURLへ差し替える。現在はダウンロード可能なPDFを配置していない。

## 廃番表示

備考の`.janNote`へ「廃番」と入力すると、JSが該当する`.tr`へ`.is-discontinued`を自動付与する。「廃番」を削除するとクラスも外れる。手動のクラス設定は不要。初回表示と、ノーコード画面上の複製・文字変更時に判定する。

```pug
.tr
	.td
		.janText
			p 500ml
	.td
		.janText
			p 4531333040754
	.td
		.janNote
			p 廃番
```

文字は入力された本文をそのまま表示する。CSSでの文字の自動挿入は行わない。廃番行と備考の色は`layout.scss`内の`.productsMain`→`.janSection`→`.janTable`→`.table`→`.tbody`→`.tr`→`&.is-discontinued`で管理する。CMS画面での実動作は未確認。

## 画像

`public/image/coating/`の以下7点を、既定の`https://sit-9586431.sibloo.com/system_panel/uploads/images/`へファイル名を変えずに配置する。

- coating_lr.jpg
- coating_lr_matte.jpg
- coating_mj.jpg
- coating_thinner.jpg
- coating_sh.jpg
- coating_uv_film.jpg
- coating_pdf_icon.png

商品画像の寸法・バーコード等は支給PSDの画像に含まれる。ページ下部のJAN表は編集できるテキストで構成。PDFアイコンはCSSからCMS画像URLを参照する。アップロード・URL疎通は未実施。

## 手動確認

```sh
python3 scripts/check_template.py
npx gulp pug
npx gulp css
npx gulp
```

AIは静的確認のみ実施。ビルド・画面・CMSの動作は未確認。

PC、1025px、1024px、480px、320pxで、画像の表示、商品一覧5件の移動先、各JANリンク、PDFの別ウィンドウ、FAQの初期閉鎖と開閉、JAN表の横スクロール、廃番行を確認する。商品追加時は、複製・並べ替え・削除・商品名変更の後に自動採番と一覧の再作成が行われること、対応するJANグループへ移動できること、ID重複がないことを確認する。共通JS変更に伴いTOPのメニュー・FAQ・ページトップも確認する。

JAN表は.table > .thead + .tbodyのdiv構造。製品ごとに.tbodyを分け、商品名と全明細を1ブロックで複製できる。table・thead・tbody・tr・th・tdタグとcolspan属性は使用しない。

02〜05の構造クラス・SCSS・JSは共通化済み。編集方法と新しい共通クラスは[製品ページ共通仕様](PRODUCTS-IMPLEMENTATION.md)を参照。
