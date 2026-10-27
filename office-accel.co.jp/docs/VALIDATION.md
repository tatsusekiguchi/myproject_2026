# テンプレート作成時の確認

作成日: 2026-10-05。テンプレートの既定値を対象に確認した記録。

## 実施した静的確認

- scripts/check_template.pyによるPugのタブ・構造タグ・役割ブロック・include先・命名・SPメディア範囲・アセット参照・メール確認・CMS共通mixinの確認：OK。
- Nodeの構文確認（node --check）：gulpfile.js、common.js、formContact.jsはOK。
- package.jsonとpackage-lock.jsonのパッケージ名・依存関係の対応：OK。元tempの依存バージョンを維持。
- jQuery・Slick・validate/日本語定義・autokana・jpostal・infiniteslideとreset/animate/Slick/validationのCSS、計12資産は元tempとSHA-256で一致。
- 編集したPug/Sass/文書の末尾改行・不要な末尾空白：OK。
- 編集元のPug/Sass/共通JSに他案件の実ドメインや固定CMS IDを含めないことを確認。
- 共通Pugの動的ルートタグ記法は、既存依存のpug-parserの補間タグ・class対応実装を読んで確認。

## 未実施

npm ci、Pug/Sassビルド、CMS断片生成、開発サーバー、ブラウザー表示、実際のフォーム送信、CMS実機登録・置換は未実施。共通AGENTS.mdの実行分担に従い、ユーザーが手動で行う。未生成のpublic HTML/CSSを最新の表示確認として扱わない。

## 案件開始後

README.mdの初回生成を行い、docs/MANUFACTURING.mdの画面・操作・CMS確認を実施する。--releaseチェックは雛形の未設定情報とサンプル原稿を意図的に検出するため、案件確定後に使う。確認したCMSルート/itemタグ・送信応答・実ID等はPROJECT.mdへ記録する。

## 本案件の機能削除後（2026-10-21）

上記はテンプレート作成時の記録。現在はブログ・お問い合わせフォームと関連資産を削除済み。静的チェックの対象もInstagram用CMS断片と現行ページに変更した。削除後の静的チェックとgulpfile.js・現行JSの構文確認は通過。ビルド・CMS断片生成・画面・CMS実機・公開環境の反映は未確認。
