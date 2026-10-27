# ストレッチホロシールページ

## 編集元

- URL: `/holo/`
- ページ設定・Slick読込フラグ: `src/pug/pages/holo/index.pug`
- 本文: `src/pug/layouts/holo.pug`
- 配色・スタイル: `layout.scss`・`layout_sp.scss`の`.productsMain`。02の色・ラベル・ボタン・JAN表を踏襲。
- 製品ページ共通処理: `public/js/products.js`
- ページ内移動・FAQ: 既存`public/js/common.js`

固定原稿はPugに直接記述。構造はdiv、リンク直下はクラス付きdiv、JAN表は.table・.thead・製品単位の.tbody。不要属性とspan・time・button・table系タグは使用しない。PC16px・SP14px。

## 掲載内容

定番柄、カスタム、ラメ・カラ、ケイムラ、グローの5シリーズ、FAQ3件、JAN60件。PSDのテキストレイヤーを転記。廃番はレンダリング画像も照合し、SH-03・SH-04・SHL-03・SHL-04・KB-01・KB-03・KBW-01・KBW-03の備考へ「廃番」を入力している。

非表示の塗料用注意書きレイヤーは掲載していない。貼り方PDFと商品POPのPDFは未支給のため、全6件とも`a(href="#", target="_blank", rel="noopener")`。実URL支給後にhrefを変更する。

## 商品・JAN追加

.productBlockを複製して商品名・本文・画像を変更する。JAN表は対応する.tbodyを丸ごと複製する。JANグループ名は商品見出しと同じにする。先頭の■と空白は照合時に除外する。

商品一覧、product-item-1…の商品ID、product-jan-1…のJAN ID、各ボタンのhrefはJSで自動設定する。対応するJANグループがない場合は表先頭へ移動する。同名グループが複数ある場合は先頭に対応する。

廃番表示は.janNoteへ「廃番」と入力するだけで.is-discontinuedを動的に付与し、削除時に解除する。SPのtheadは横スクロールを保ちながら固定ヘッダー直下に追従する方式。

## Slickによる画像切り替え

既存のSlick本体・CSSは03だけで読み込む。第三者ファイルは変更していない。各.productGalleryごとにメイン画像だけSlickで切り替え、自動再生・標準のbutton矢印・ドット・accessibility属性の追加を無効化する。Slickが付けるaria・role・tabindexも表示後に除去する。

メイン画像の左右はa直下の役割divによる操作。サムネイルはPC・SPとも固定のFlex一覧で全件を常時表示し、7枚を超える場合は折り返す。サムネイルをクリックするとメインのSlickを指定番号へ切り替え、選択枠も同期する。メインの矢印・スワイプは循環し、最初の前は最後へ、最後の次は最初へ移動する。サムネイルのスクロールや複製スライドは作成しない。初期HTMLにIDや連携用data属性は不要。

画像を追加する場合は.galleryMain内の.gallerySlideと.galleryThumbs内の.thumbItemを同じ順序で追加し、同じ画像URLを設定する。商品ブロックを複製した場合も、それぞれのブロック内で初期化する。Slickが初期化済みのDOMを複製した場合は表示用ラッパーを戻して初期化する処理を用意しているが、CMSの複製方法を含め実機動作は未確認。

## 画像配置

`public/image/holo/`に以下の5シリーズ×7枚、JPEG35点を書き出した。

- holo_standard_01.jpg〜holo_standard_07.jpg
- holo_custom_01.jpg〜holo_custom_07.jpg
- holo_lame_01.jpg〜holo_lame_07.jpg
- holo_keimura_01.jpg〜holo_keimura_07.jpg
- holo_glow_01.jpg〜holo_glow_07.jpg

01はPSDの各商品一覧画像、02〜07は同画像内の商品の詳細切り出し。実写の追加写真は作成していない。全ファイルを`https://sit-9586431.sibloo.com/system_panel/uploads/images/`へファイル名を変えずに配置する。PDFアイコンは02のcoating_pdf_icon.pngを共用。

## 確認と生成

AIは静的確認のみ実施。ビルド・開発サーバー・動的テスト・画面・CMS実機は未確認。

```sh
python3 scripts/check_template.py
npx gulp pug
npx gulp css
npx gulp
```

public/js/products.jsと画像35点を配信する。Slick・jQuery・CSSの配信も必要。

PC・1025px・1024px・600px・480px・320pxで、画像欠落、横はみ出し、5商品のギャラリーが独立して動くこと、サムネイル連動、左右矢印、スワイプ、商品一覧・JANリンク、PDF別ウィンドウ、FAQ初期閉鎖、JAN表の横スクロールとSP見出し追従を確認する。CMSで商品複製・削除・並べ替え・商品名編集、備考の「廃番」追加・削除を確認する。画像を追加した場合は公開後の再読込でメインとサムネイルの枚数・順序も確認する。

02〜05の構造クラス・SCSS・JSは共通化済み。編集方法と新しい共通クラスは[製品ページ共通仕様](PRODUCTS-IMPLEMENTATION.md)を参照。
