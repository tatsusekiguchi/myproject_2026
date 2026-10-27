# 参照元と採用判断

2026-10-05にソースを読み、構造と実装の共通点を確認した記録。旧案件の実装が最新の規定と異なる場合は、最新のユーザー指定を採用する。色・ブランド・画像・会社情報・SNS・ドメイン・IDは継承しない。

| 参照元 | 確認した内容 | temp-cmsの判断 |
| --- | --- | --- |
| myproject/temp | package/lock、Gulp、Pug/Sass、配信JS/CSS | 技術・依存バージョン・第三者資産を複製。空部品は実装し、古い汎用処理は自動読込しない |
| 2026/bekkochan-farm | head、footer、common/common_sp、ブログ、フォーム | .btnMore・.is-open、mediaなし＋SP内1024px、attachのnavBox制御、footerMain内pageTop、メール確認を採用 |
| 2026/kawanochikusan | TOPのブログ・Instagram、blog/bloglist、head、SP Sass | webgene-blog/itemの繰り返し、img/video対応、CMS連携方式を参照。headのmediaやsectionタグを既定には継承しない |
| 2026/kenmoku | TOP Instagram、フォーム一致チェック、head | Instagram構造とvalidateConfirmEmail→equals[email]を確認。スペースPugやhead mediaは最新規定へ統一 |
| 2026/sign-kougei | ブログ一覧/詳細、works、head | 所定webgeneクラス・詳細本文を参照。案件専用プラグイン、検索項目、CMSURLは継承しない |
| 提供data-block.html | カテゴリ、詳細、一覧、TOP、Instagramの5断片 | クラスと独自タグを参照。固定一覧IDを設定値化、不要なPDF追加例は標準に含めない |
| 提供独自タグ編HTML | タイトル・日付・本文・画像・詳細リンク、種類の差 | docs/cms-blog-manual.htmlへ本文を収録。画像L/Mの説明の差を注記 |
| 提供コーディング例HTML | 設定表・カテゴリID・アーカイブ・section/articleの指定 | docs/CMS-BLOG.mdへ整理。構造タグの差は未確認事項として残し、実機確認なしに決めつけない |
| myproject/AGENTS.md | 制作規定・AIとユーザーの実行分担 | テンプレート内へ複製し、CMS専用既定と具体例を追加 |

## 複数案件の差を固定ルールにしない

旧headのmedia、section/article、.activeや数字weight、空site.pugの未参照変数、全ページへのフォーム読込などには差がある。本テンプレートではユーザーが確定した最新規定を実装し、例外をPROJECT.mdで明示する。独自CMSとWordPressの規定を混ぜない。

CMSルート／itemタグの認識、Instagramタグのデータソース、実送信応答、サブディレクトリのCMSパス等は案件環境で確認する。実機未確認事項をローカルテンプレートの検証成功で置き換えない。

## 元tempから変更した理由

- 元tempはsite.pugに存在しないjQueryファイル名を記録し、変数が読込に使われていなかった。実在する資産を参照する構成へ統一。
- 全リンクを遅延遷移させる旧処理やnavタグへの操作は独自CMS・通常リンクと一致しないため既定では使わない。
- SPのmedia属性へ依存する読込をやめ、SCSSとattach側で範囲を保証。
- pageとCMS断片に同じmixinを使い、別々のテンプレート編集で起きる差を抑止。
- 元tempの依存関係を別フレームワークへ移行せず、build/cms/checkの明確な作業単位を追加。

## 本案件での書式統一（2026-10-20）

ユーザー指定によりbekkochan-farmのheader・footer・TOP・common.js・PC/SP Sassを読み、固定原稿のPug直接記述、役割ブロックの階層、機能別のjQuery関数、Sassの複数行記法を参照した。色・原稿・画像・アカウントは本案件のものを維持。section・span・画像寸法属性・リンク直下の裸の文言は本案件の最新ルールに合わせて使用しない。CMS断片の共通mixin方式は本案件の規約を維持する。

## 04の連続スクロール（2026-10-21）

ユーザー指定で.showcaseSliderをinfiniteslide.jsへ変更。aichi-koushikai・actyou・fwork-stのcommon.jsから、document.ready内の機能別初期化とspeed・pauseonhover・responsive・cloneの指定方法を参照。レイアウトは本案件のdivと割合幅を維持し、第三者ライブラリは既存ファイルをそのまま読み込む。参照案件のready/load両方での重複初期化は採用せず、共通JSのDOM監視で再設定されても一度だけ初期化する。
