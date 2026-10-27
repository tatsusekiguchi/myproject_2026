# 製品ページ02〜05 共通仕様

## 編集元

| ページ | URL | 本文 |
| --- | --- | --- |
| 02 ウレタン・その他塗料 | /coating/ | src/pug/layouts/coating.pug |
| 03 ストレッチホロシール | /holo/ | src/pug/layouts/holo.pug |
| 04 グロー・紫外線発光シリーズ | /glow/ | src/pug/layouts/glow.pug |
| 05 フィッシングギア＆ODIAM | /gear/ | src/pug/layouts/gear.pug |

ページ設定はそれぞれsrc/pug/pages内。SCSSはsrc/sass/layout.scssとlayout_sp.scssの「製品ページ共通（02〜05）」、JSはpublic/js/products.jsを共用する。旧coating.js・holo.jsは使用しない。Pug本文はCMSで編集するため固定原稿を直接記述している。

共通ルートは.productsMain、主要構造は.productKv・.productNav・.productsSection > .secWrap01 > .productsContainer > .productBlock・.productFaq・.janSection。ページ識別用の.coatingMain・.holoMain・.glowMain・.gearMainは残している。

## 商品とJANの追加

1. .productBlockを複製して、.productTitle内の見出し（通常h2、ODIAM商品はh3）と画像・本文・規格を変更する。
2. 対応するJAN表の.tbodyを製品単位で複製する。
3. .janGroup内の商品名を商品見出しと一致させ、明細を編集する。先頭の■と空白の違いは照合時に除外する。

JSが商品ID（product-item-1…）、JANグループID（product-jan-1…）、一覧、JANボタンのhrefを再設定する。一覧は既存liの複製に依存せず、商品見出しからli > a > .linkText > pを生成する。.linkList ulが空、またはひな形liがコメントアウトされていても使用できる。対応グループがない商品は#jan-codeへ移動する。同名が複数ある場合は先頭グループに対応する。DOM上の複製・削除・並べ替え・原稿変更を監視するが、CMS固有の編集動作は未確認。

.janNoteに「廃番」を入力すると該当.trへ.is-discontinuedを付与し、文字の削除時に解除する。JAN表はすべてdivの.table・.thead・.tbody・.tr・.th・.td。PC・SPとも横スクロールを維持し、JSで表の範囲内だけ見出しをヘッダー直下に追従させる。追従位置は.headerの画面内の下端から取得し、PCのロゴが上へ隠れた後は残るナビの下へ配置する。

05の.odiamSectionはブランド名h2→紹介・商品名h3→商品PR見出しh4。通常の商品名h2とODIAMの商品名h3を共通JSで取得し、商品ID・JANリンクは共通処理で設定する。上部一覧はギア商品＋ODIAMへの固定リンク（li.brandNav）。ODIAM商品を増やす場合は.odiamSection内で.productBlockを複製する。

PDFリンクはa(href="#", target="_blank", rel="noopener")。PDF支給後にhrefだけ変更する。FAQは初期状態ですべて閉じ、common.jsの既存アコーディオンを使用する。

## スライダー

Slickの読込は03のみ。04では既存のinfiniteslide.jsを読み込む。03はメイン画像だけSlickを使用し、サムネイルは全件を常時表示するFlex一覧。先頭と末尾の間も循環する。画像追加時は.gallerySlideと.thumbItemを同じ順序・枚数で増やす。

04の.productShowcaseはinfiniteslide.jsで左方向へ連続スクロールする。他案件と同様にspeed: 35、pauseonhover: false、responsive: true、clone: 2で初期化する。幅はPC29%・601〜1024px46%・600px以下84%。重複初期化を防ぎ、ライブラリ本体は変更しない。ユーザー指定で既存のglow商品画像5点をスライダー専用ファイルglow_slider_01.jpg〜glow_slider_05.jpgへ複製し、ダミー画像として配置している。商品画像とは別ファイルで差し替えできる。写真支給後は.showcasePanel内の.imgBox > imgのsrcを差し替える。追加の連携属性は不要。

05のFURAFURA・BOOTHはPSDのグレー枠と仮原稿を維持している。写真支給後は.productPlaceholderを.imgBox > imgに差し替える。

## 新規画像

以下16点を、既定のCMS画像URL（https://sit-9586431.sibloo.com/system_panel/uploads/images/）へ同じファイル名で配置する。画像はPSDの表示画像から書き出した。CMS上の配置・疎通は未確認。

| 保存先 | ファイル |
| --- | --- |
| public/image/glow/ | glow_point.jpg、glow_seal.jpg、glow_pop_eye.jpg、glow_bite_marker.jpg、glow_belly_seal.jpg、glow_slider_01.jpg〜glow_slider_05.jpg |
| public/image/gear/ | gear_deka_bukuro.jpg、gear_amaterasu.jpg、gear_mixing_set.jpg、gear_urethane_pad.jpg、gear_fish_bag.jpg、gear_odiam_logo.jpg |

PDFアイコンcoating_pdf_icon.pngと既存の矢印画像は02と共用。04のJANは25件、05は25件。04ポップアイL 02 レッドのみ廃番、05の「JAN要確認」は依頼資料に従って非掲載。

## 生成と確認

AIは静的確認だけを実施する。ユーザーが案件ルートで実行する。

```sh
npx gulp pug
npx gulp css
```

products.jsと画像16点も配信する。共通構造とJSを変更したため、02〜05のHTMLと共通CSSを一緒に更新する。すでにCMSへ登録済みの場合はHTML側のクラス変更も反映する。

ビルド・画面・CMS実機は未確認。PC・1025px・1024px・600px・480px・320pxで以下を確認する。

- 4ページの商品一覧・JANリンク・初期閉鎖FAQ、PDF別ウィンドウ。
- 02のUV説明、03の全サムネイル常時表示・選択同期・先頭末尾の循環。
- 04の自動再生とレスポンシブ、05のODIAMリンク・背景切り替え。
- PC・SPのJAN見出し追従・表末尾での停止・SPの横スクロール、画像の欠落・横はみ出し。
- CMSの商品・JANブロックの複製／削除／並べ替え、商品名の照合、廃番の追加・削除。
