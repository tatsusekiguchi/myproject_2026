# 製造フェーズの規約と確認

## 編集元と責務

| 編集元 | 内容 |
| --- | --- |
| PROJECT.md | 種別・原稿・デザイン・公開先・採用機能・未決定事項 |
| src/pug/site.pug | 実際に参照されるサイト名・説明・ルート・画像・機能フラグ |
| src/pug/pages | ページごとの変数と組み立て。root_path→site.pug→変数→共通mixin→HTML |
| src/pug/layouts | ページ本文。ページルートから内容ブロックへ階層化 |
| src/pug/common | header/footer・パンくず・ページh1・CMS表示の共通構造 |
| src/sass/_mixin.scss | 案件の色・フォント・基本サイズ・画像パス |
| src/sass/_mod.scss | cover-image等のSass mixin |
| src/sass/common.scss | 共通部品とベース。共通ラッパーは幅・左右余白のみ |
| src/sass/common_sp.scss | 1024px以下の共通上書き |
| src/sass/layout.scss | ページルート内のスタイル |
| src/sass/layout_sp.scss | 同じページルート・同じ階層のSP上書き |
| public/js/common.js | 共通のメニュー・画像切替・ページトップ・任意アコーディオン |
| public/css/attach.css | CMS編集表示の明示例外。メニュー非表示・開閉指定 |
| cms/settings.json | ブロックの管理画面設定参考値 |
| src/pug/cms | 共通mixinを呼ぶCMS断片の出力単位 |

## Pugと階層

構造はdiv、ページh1は1つ。h1を見た目だけの都合でh2へ落とさず、h2の下にh3を置く。CMSの非表示見出しは仕様上の見出しと区別する。

```pug
.sec01
	.secWrap01
		.secContainer
			.secContent
				.secTtl
					h2 見出し
				.txtBox
					p 本文
				.btnMore
					a(href='/coating/')
						.linkText
							p 商品を見る
			.imgBox
				img(src='image/common/placeholder.svg', alt='')
```

divとh/pを同一親の直下で混在させない。h・p・ul等へ不要なclass/idを付けず親から指定。ボタンクラスはaの親、色・枠・角丸はa。aはinline-blockまたはblock。Pugはタブ1つ＝1階層。

## Sass

Pugの親子階層を維持してネストする。ページ固有スタイルは.topMain等のルート内。secWrap系にページ固有の余白・背景・Flexを付けない。横並びは専用ContainerにFlexを指定する。Gridは使わない。

プロパティは位置→表示/Flex→サイズ→余白→文字→装飾→動作。mixinの中央配置はtop/left:50%とtranslateにせず、絶対配置の四辺＋margin:auto、またはFlex。矢印は回転した線の見た目も確認する。

PCは1025px以上、SPは1024px以下。headではSP用linkのmediaを付けない。SP用SCSS内で@mediaを必ず記述し、追加の480px条件もSPの範囲に限定する。common_spのnavBoxは表示を維持し、visibility/opacityと開閉状態はattachへ置く。

フォントは初期状態でシステムフォント。太字はbold。Webフォントを採用するときは読込・font-family・weight・PROJECT.mdを同時更新。外部フォントを読み込むだけの状態にしない。

## パスとアセット

root_pathは静的アセットの相対パス。TOPは空、1階層下は../。ナビのhrefはsite_routesを使い、site_base_pathが空ならルート配置。サブディレクトリは先頭/あり・末尾/なし（例：/sample）で設定。CMS移行パスも同じ配置先へ揃える。

画像はpublic/image/に配置。site_image_pathはPugの実参照先、$imgPathは生成CSSからの相対先。CMS画像URLへ変更する際は両方を必要に応じ更新し、ローカル確認ができる状態を保つ。.switchでは_pc/_spの両実ファイルを用意する。

Slick・infiniteslide・スクロールアニメーションは初期状態で無効。必要な案件だけフラグを有効にし、JSの初期化対象も実際のマークアップへ合わせる。任意の旧資産は保持しているが自動で読み込まない。第三者ファイルは原則改変しない。

## 製造の順序

1. PROJECT.mdを確定原稿・デザイン・機能に合わせる。
2. 共通head/header/footer・site.pug・変数・幅を揃える。
3. TOP・製品ページを作る。ブログ・お問い合わせフォームは本案件では使用しない。
4. Pug→PC Sass→同じ階層のSP Sass→必要なJSの順に照合する。
5. python3 scripts/check_template.pyで静的に確認する。
6. ユーザーがPug/Sassを生成し、PC/SPと境界を確認する。
7. cms/README.mdに従いInstagram断片を生成・登録する。
8. --release静的チェックとブラウザー／CMS実機確認を行う。

## 確認対象

- h1の個数・見出しの階層、混在しない役割ブロック、実タブ。
- Bootstrap競合名、Sass階層、secWrapの責務、SP範囲。
- 320/480/1024/1025pxとPC幅、横はみ出し、画像・動画・パス。
- メニュー初期非表示・開閉・Escape・PCへの切替、pageTopの位置とクリック。
- CMSのInstagramデータソース、表示8件、画像とcanonicalリンクの置換。
- サンプル原稿・未設定値・他案件ドメイン・計測ID・トークンの残存。

静的確認では画面やCMS動作を確認済みとしない。ビルド・ブラウザー・CMS実機を実施した範囲を区別して報告する。
