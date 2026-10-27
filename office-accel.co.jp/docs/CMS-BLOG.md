> 本案件はブログ・お問い合わせを使用しません。この資料はテンプレートの参考記録です。現行のInstagram登録・生成手順は[cms/README.md](../cms/README.md)を参照してください。

# CMSブログ・Instagram移行

提供の独自タグ編・コーディング例・data-blockと既存案件を参照。詳しい本文はcms-blog-manual.htmlに収録。

## 共通構造

webgene-blogが全体、webgene-headerが非反復の見出し、webgene-itemが1件の繰り返し元、webgene-paginationがCMSのページ送り。詳細のwebgene-item-content.postBoxは本案件群の本文枠。

通常のページとCMS断片の構造はsrc/pug/common/cmsBlocks.pugを共用する。ローカル表示はダミー、CMS出力は%…%タグ。個別のPugエントリーをsrc/pug/cmsに置き、gulp cmsがcms/generatedだけへ出力する。CMSでは表示件数に応じてitemを繰り返すため、移行用itemは1件。

## 主要タグ

| タグ | 用途 |
| --- | --- |
| %itemTitle% | 記事タイトル |
| %itemContent% | 本文 |
| %itemCategory% | カテゴリ名 |
| %itemDate.format(Y-m-d)% | 記事の日付 |
| %itemRecordDate.format(Y-m-d H:i:s)% | 登録日時 |
| %itemUpdateDate.format(Y-m-d H:i:s)% | 更新日時 |
| %itemImageL(0)% | 先頭画像の大サイズ・HTML挿入 |
| %itemImageSrc% | 画像URL |
| %itemLink.to(blog)% | 詳細ページへのリンク |
| %item.pdf% | PDFリンク（採用案件のみ） |
| %groupName1% / %groupName2% | グルーピング順のカテゴリ番号／名前 |
| %item.canonical% | 提供data-blockのInstagramリンク。データソース確認必須 |

S=600px、M=800px、L=1000px、指定なし=元サイズという資料の凡例。番号0が1枚目。トピックス0〜9、事例集0〜14。ブログのL(0)は提供data-block例に従う。itemImageはタグを返すためimgのsrcへ入れない。sourceの2枚目「大」例がM(1)なのは凡例と差がある。

## 登録設定

| 用途 | 参考設定 |
| --- | --- |
| カテゴリ | blog・100行・category_sort昇順・ページング無・blog_category_cd, category_name, category_sortでグルーピング |
| 一覧 | blog・10行（資料例）・date降順・ページング有・ページ番号5 |
| TOP | blog・3行（テンプレート例）・date降順・ページング無 |
| 詳細 | 詳細コンポーネントとページをリンク先へ対応させる |
| Instagram | データソース・アカウント連携・表示数をCMSで確認 |

設定参考値はcms/settings.json。CMS管理画面へ手動登録する。生成JSONはCMSインポート形式ではない。

カテゴリリンクの形式は「一覧パス?wg[一覧の実ID_cate]=%groupName1%」。カテゴリ自身のIDではない。CMS発行IDを使い、過去案件のIDを流用しない。

カテゴリ抽出のblog_category_cd等は完全一致。title/content等は部分一致も可能。複数ソートのdate desc, sortでは別の順番設定が無視される。資料のcd descと「古い順」の説明には差があるので実環境で確認する。

アーカイブはdateのグルーピングとYM/YM-JA。リンクは「一覧パス?wg[一覧の実ID_ym]=date|%groupName1%」。本雛形の標準5断片には含めない。

## タグ差異を扱う

資料はsection.webgene-blogとarticle.webgene-itemを説明する。提供data-blockはsectionとdivのitem、案件のレイアウト方針はdiv。通常のPugはdivを保ち、CMS実機で認識を確認。sectionが必要ならmigration.containerTagをsectionへ設定する。articleが必須と判明した場合は確認結果と変更方針をPROJECT.mdへ記録してmixinを対応させる。

## 確認

カテゴリID・詳細パス・画像/本文・ページ送り・並び・件数・0件・Instagram/動画・PC/SPを実機確認する。CMS連携・記事データ移送・アカウント連携はHTML生成だけでは完了しない。
