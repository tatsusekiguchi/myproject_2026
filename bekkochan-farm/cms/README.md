# CMS移行用data-block

`docs/cms-blog-manual.html` をブラウザーで開くと、仕様の確認とdata-blockの生成・保存ができます。外部通信や追加の依存関係は不要です。

## コマンドで生成する場合

1. `migration.example.json` をコピーして `migration.json` を作成する。
2. `listBlockId` にCMSのブログ一覧データブロックID（`wgc-…`）を入力する。カテゴリブロック自身のIDではない。資料のサンプルIDは流用しない。
3. `listPath`・`detailPath`・`contactPath` を移行先のページパスに合わせる。
4. プロジェクトルートから以下を手動実行する。

```sh
python3 scripts/create_data_block.py --config cms/migration.json
```

出力先は `cms/generated/`。`category.html`・`detail.html`・`list.html`・`top.html`・`instagram.html`、まとめた `data-block.html`、管理画面の設定参考用 `cms-settings.json` を生成する。設定JSONはCMSのインポート形式ではない。別の出力先は `--output`、生成対象の既存ファイルを上書きする場合は `--overwrite` を指定する。

## テンプレートと運用

- `blog-blocks.json` が生成用テンプレートの編集元。ブラウザー版マニュアルには同じテンプレートのスナップショットを埋め込んでいるため、テンプレート変更時は `python3 scripts/sync_cms_manual.py` を手動実行して同期する。説明本文は必要に応じて別途更新する。
- 移行用HTML断片を生成する仕組みであり、記事データの移送、CMS管理画面への自動登録、ブロックIDの自動取得は行わない。
- 各ブロックは繰り返し元の `.webgene-item` を1件だけ持つ。表示件数やページングは管理画面で設定する。
- Pug/Sassや生成済みサイトHTML/CSSは書き換えない。サイトのクラスや構造を変更した場合は、`blog-blocks.json` と対応Pugを照合してから生成する。
- 生成物はCMSの該当コンポーネントへ個別に登録する。まとめた `data-block.html` をサイト本文へ一括挿入しない。
- デフォルトのルートは案件のタグ方針に合わせた `div.webgene-blog`。提供資料のコーディング例は `section.webgene-blog` を必須と説明し、提供data-blockは `section` と `div.webgene-item` を使用している。この差異はCMS側で確認が必要。CMSがsectionを要求する場合のみ `containerTag` を `section` に変更する。itemは提供data-blockに合わせdivを維持するが、資料にはarticleの例もあるためCMS実機で繰り返し動作を確認する。
- PDFリンクは提供data-blockの追加例としてマニュアルに掲載し、現行Pugにないため標準生成には含めない。
- Instagramの `%item.canonical%` は提供data-block由来。独自タグ一覧には記載がないため、対応するデータソースでリンクの置換を確認する。
- 移行後はカテゴリ抽出、記事一覧のページ送り、詳細リンク、画像・本文、0件表示、Instagram、PC/SP表示を確認する。実CMSの動作はローカル生成だけでは検証できない。
