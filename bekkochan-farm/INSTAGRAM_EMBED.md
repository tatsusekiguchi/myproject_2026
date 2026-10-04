# Instagram埋め込み 実装方法（独自CMS案件向け）

## 参考にした実績

2026年 kawanochikusan案件（独自CMS）TOPページの `.instaPanel` が実績。同じ構造は kenmoku・taihei-co-ltd・com-home・zero-one・sign-kougei 等、複数の独自CMS案件でも使われている共通パターン。

- 出典: `2026/kawanochikusan/src/pug/layouts/index.pug`（instaSectionセクション）
- 出典: `2026/kawanochikusan/src/sass/layout.scss`（`.instaSection` 〜 `.instaPanel` まわり）
- 出典: `2026/kawanochikusan/src/sass/layout_sp.scss`（同SP調整）

この案件（bekkochan-farm）も独自CMS・Pug/Sass/Gulp/jQuery構成のため、同じ方式をそのまま流用できる。

## 全体方式

- 独自CMS（WebGene系CMS、管理画面パス `system_panel`）が標準で持つ「ブログ／コンテンツ一覧」テンプレート規約 **`webgene-blog` / `webgene-item` / `webgene-header` / `webgene-pagination`** を、Instagram投稿の一覧表示にもそのまま流用する。
- これはブログ記事一覧（`.webgene-blog`）と全く同じクラス構造。フロント側は**マークアップ（プレースホルダーHTML）を用意するだけ**で、実際のInstagram投稿データの取得・差し込みはCMS管理画面（`system_panel`）側の設定でCMSベンダーが行う。
- そのため **at-casa案件で見られるような、Graph APIへのjQuery Ajax呼び出し・アクセストークンの直書きは不要**。フロントのJSファイル追加やAPI連携コードは書かない。
- 制作側の作業はPug/Sassでのマークアップのみ。画像・リンク先はダミー（プレースホルダー）のままでよく、公開後にCMS管理者がInstagramアカウントを連携すると実データに差し替わる想定。

## 実装手順

### 1. マークアップ（Pug）

独自CMSのタグ制約（`div`・`h1`〜`h6`中心、構造タグ不使用）に沿い、`webgene-blog`／`webgene-item`のクラスはCMS側の規約なのでそのまま使用する（クラス名を変更しない）。

```pug
.instaSection.fadeUp
    .secWrap01
        .secTtlBox
            .secTtl
                h2 インスタグラム
            .sub
                p INSTAGRAM
        .instaPanel
            .instaList
                section.webgene-blog
                    .webgene-item
                        a(href="#", target="_blank", rel="noopener")
                            .photo
                                img(src="（プレースホルダー画像パス）", alt="")
                    .webgene-item
                        a(href="#", target="_blank", rel="noopener")
                            .photo
                                img(src="（プレースホルダー画像パス）", alt="")
                    .webgene-item
                        a(href="#", target="_blank", rel="noopener")
                            .photo
                                img(src="（プレースホルダー画像パス）", alt="")
            .moreBox
                a(href="https://www.instagram.com/<アカウント名>/", target="_blank", rel="noopener")
                    div
                        p VIEW MORE
```

- `.webgene-item` の数は表示したい件数分だけ並べる（kawanochikusan・kenmoku例では3〜4件）。
- `a` の `href="#"` と `img` のプレースホルダー画像は仮値。実データはCMS管理画面連携後に差し替わるため、本文原稿にInstagram投稿の実画像が支給されていない限りダミーのままでよい。
- `.moreBox > a` はInstagramプロフィールページへの外部リンク。本案件のInstagramアカウントURLに置き換える。
- `.webgene-item` 配下は `img` だけでなく `video` タグが入るケースもある（動画投稿・Reels用、CMS側が出し分ける）。CSS側で両対応にしておく。

### 2. スタイル（Sass）

`webgene-item` を横並びグリッドで表示する実装例（kawanochikusanの`layout.scss`を参考に、本案件のブレークポイント SP 1024px以下 / PC 1025px以上 に合わせている）。`cover-image` は既存の `_mod.scss` のmixinを使用する。

```scss
.instaSection {
  .instaPanel {
    max-width: 1200px;
    margin: 0 auto;
    .instaList {
      .webgene-blog {
        display: flex;
        flex-wrap: wrap;
        .webgene-item {
          width: calc(100% / 4);
          a {
            display: block;
          }
          .photo {
            position: relative;
            height: 0;
            padding: 0 0 100%;
          }
          img,
          video {
            @include cover-image;
          }
        }
      }
    }
    .moreBox {
      a {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
      }
    }
  }
}
```

SP側（`layout_sp.scss`、`@media screen and (max-width: 1024px)` 内）で列数を調整する例：

```scss
.instaSection {
  .instaPanel {
    .instaList {
      .webgene-blog {
        gap: 5px;
        .webgene-item {
          width: calc((100% - 5px) / 2);
        }
      }
    }
  }
}
```

### 3. JS

**追加不要。** データ取得・差し込みはCMS側（`system_panel`管理画面）が担うため、独自のJSファイルは書かない。`webgene-pagination` 等が別途あるページ（ブログ一覧等）向けの共通JS（`public/js/common.js`）は本件と無関係なので触らない。

## 注意点

- **本案件固有の画像・リンク先はkawanochikusan案件のものを流用しない。** プレースホルダー画像パス・Instagramアカウント名は本案件用に差し替える。
- **CMS管理画面側の設定はコード側の作業範囲外。** Instagramアカウントとの連携（システムパネル上でのAPI接続・トークン設定等）はCMS管理者／運用担当が行う想定。連携未設定の間はダミー画像・`href="#"`のまま表示される。
- 過去案件（at-casa）に見られる「Graph APIをフロントJSで直接叩く」実装は、本CMSの標準機能とは別の一時的な代替実装だったと考えられる。本案件では標準の`webgene-blog`規約を優先する。

## 未着手（実装時に必要な作業）

- `src/pug/layouts/index.pug`（または対象ページ）への `.instaSection` セクション追加。
- `layout.scss`・`layout_sp.scss` への対応スタイル追加。
- プレースホルダー画像の配置場所・Instagramアカウント名の確定（ユーザーへ確認）。
- CMS管理画面（`system_panel`）側でのInstagram連携設定（運用担当・CMSベンダー側の作業、本リポジトリでの対応範囲外）。
- 追加後、`npx gulp pug` / `npx gulp css` でユーザーが再生成し、表示確認する。
