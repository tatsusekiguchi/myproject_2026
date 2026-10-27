# 株式会社オフィスアクセル

独自CMS向けのPug・Sass・Gulp・jQuery構成。案件情報と制作規定はPROJECT.md・AGENTS.md、製品ページの編集方法はdocs/PRODUCTS-IMPLEMENTATION.mdを参照する。

## ページ構成

| URL | 内容 |
| --- | --- |
| / | TOP・NEWS・商品カテゴリ・FAQ・Instagram |
| /coating/ | ウレタン・その他塗料 |
| /holo/ | ストレッチホロシール |
| /glow/ | グロー・紫外線発光シリーズ |
| /gear/ | フィッシングギア＆ODIAM |

ブログ・お問い合わせフォーム・完了ページは採用せず、関連するページ・専用JS/CSS・設定を削除済み。NEWSはTOPのPugで直接編集する。InstagramのCMS連携部品は維持する。/temp/は下層ページの制作ひな型として残している。

## 生成・配信

以下はユーザーが案件ルートで手動実行する。AIはインストール・ビルド・開発サーバー・動的テストを実行しない。

```sh
# 依存関係が未導入の場合のみ
npm ci

# 静的確認
python3 scripts/check_template.py

# HTML・CSSの生成
npx gulp pug
npx gulp css

# 初回生成・ローカル配信・変更監視
npx gulp
```

本文はsrc/pug/layouts、ページ設定はsrc/pug/pages、共通部品はsrc/pug/commonを編集する。生成HTMLとpublic/css内のSass生成CSSは直接編集しない。public/jsは直接管理するソース。

02〜05のSCSSはlayout.scss・layout_sp.scssの.productsMain、JSはpublic/js/products.jsを共用。Slickは03の商品ギャラリー、infiniteslide.jsは04の連続スクロールで使用する。

imgのsrcは指定CMS画像URLへファイル名を直接連結する。public/image内の対象画像をCMSへアップロードする必要がある。詳細は各ページの実装資料を参照する。

## CMSへの移行

CMS断片の生成対象はInstagramのみ。唯一の構造編集元はsrc/pug/common/cmsBlocks.pug。TOPとCMS断片で同じcmsInstagram mixinを使用する。

```sh
npx gulp cms
```

CMS設定と登録方法はcms/README.mdを参照。ブログ一覧ID・記事パス・お問い合わせ先の設定は不要。

ブログ・お問い合わせの生成済みHTML4ページも削除済み。既にCMSや公開サーバーへ登録している場合、その環境からの削除は別途必要。

## 確認

静的チェックはPug/Sassのコンパイル・画面・CMS動作を代替しない。再生成後にPC・1025px・1024px・600px・480px・320pxで、画像・リンク・メニュー・FAQ・製品スライダー・JAN表・Instagramを確認する。今回の削除後のビルド・画面・CMS実機確認は未実施。
