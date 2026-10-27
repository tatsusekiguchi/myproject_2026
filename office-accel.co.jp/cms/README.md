# Instagram用CMS断片

本案件はブログ・お問い合わせフォームを使用しない。CMS生成対象はInstagramの1ブロックのみ。

## 編集と生成

構造の編集元はsrc/pug/common/cmsBlocks.pugのcmsInstagram mixin。TOPでは仮投稿8件、CMS断片では独自タグ付きの繰り返し元1件を出力する。

ユーザーが案件ルートで実行する。

```sh
npx gulp cms
```

cms/generated/instagram.html、コピー用のdata-block.html、設定参考用cms-settings.jsonを生成する。生成物は手編集しない。

migration.jsonは省略可能で、containerTagはdivを使用する。CMS実機でsectionが必須と確認した場合のみmigration.example.jsonをmigration.jsonへ複製し、containerTagをsectionに変更する。通常ページのPugはdivを維持する。ブログ一覧ID・記事一覧／詳細パス・お問い合わせパスは不要。

## 登録・確認

CMSのInstagram用デザインコンポーネントへinstagram.htmlを登録し、settings.jsonを参考にデータソースと表示8件・ページングなしを設定する。

webgene-blog・webgene-itemはInstagramにも必要なCMS所定クラスのため維持する。item.canonical・itemImageL(0)の置換と、ルート／繰り返し認識はCMS実機で確認する。CMS登録・独自タグの置換・画面表示は未確認。
