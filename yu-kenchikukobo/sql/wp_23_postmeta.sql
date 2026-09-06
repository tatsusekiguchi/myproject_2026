-- phpMyAdmin SQL Dump
-- version 3.3.0
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成時間: 2025 年 11 月 28 日 11:00
-- サーバのバージョン: 5.1.73
-- PHP のバージョン: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `wp_maxpress`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `wp_23_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_23_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`),
  KEY `meta_value` (`meta_value`(333))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=549340 ;

--
-- テーブルのデータをダンプしています `wp_23_postmeta`
--

INSERT INTO `wp_23_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(536226, 10468, 'mp_excerpt', ''),
(536227, 10468, '_edit_lock', '1761808014:24'),
(536228, 10468, '_edit_last', '24'),
(536412, 10468, 'mp_1_type', 'texts'),
(536413, 10468, 'mp_1_rail', '1'),
(536414, 10468, 'mp_2_1_image', 'http://www.yu-3.jp/wp-content/uploads/sites/23/IMG_16681-e1701216840705.jpg'),
(536415, 10468, 'mp_2_1_href', ''),
(536416, 10468, 'mp_2_1_target', ''),
(536417, 10468, 'mp_2_1_style', ''),
(536418, 10468, 'mp_2_1_suffix', ''),
(536419, 10468, 'mp_2_1_text', '<br>'),
(536420, 10468, 'mp_2_2_image', 'http://www.yu-3.jp/wp-content/uploads/sites/23/IMG_1690-e1701216878585.jpg'),
(536421, 10468, 'mp_2_2_href', ''),
(536422, 10468, 'mp_2_2_target', ''),
(536423, 10468, 'mp_2_2_style', ''),
(536424, 10468, 'mp_2_2_suffix', ''),
(536425, 10468, 'mp_2_2_text', '<br>'),
(536426, 10468, 'mp_2_align', 'horizontal'),
(536427, 10468, 'mp_2_type', 'beforeafter'),
(536428, 10468, 'mp_2_rail', '2'),
(536429, 10468, 'mp_3_1_text', '<hr>\r\n<b><font size="4"><span style="font-family: Arial, Verdana; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal;"><font color="#660000">暮らしを遊ぶ。これからの趣味は「家時間」<br>\r\n店舗リフォーム、内装リフォームは、遊建築工房へ</font></span></font></b><br>\r\n<br><font face="Arial, Verdana"><span style="font-size: 10pt;">\r\n遊建築工房</span></font><div><font color="#cc6600">>>お問い合わせ 各種相談会はこちら<< </font>よりお問い合わせください。<br><font face="Arial, Verdana"><span style="font-size: 10pt;">\r\nフリーダイヤル： </span></font><span class="tel-link" style="font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal;">0120-799-878</span><font face="Arial, Verdana"><span style="font-size: 10pt;">（※機種によってフリーダイヤルをご利用いただけない場合があります）</span></font><br><font face="Arial, Verdana"><span style="font-size: 10pt;">\r\nTEL： </span></font><span class="tel-link" style="font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal;">052-883-8854</span><font face="Arial, Verdana"><span style="font-size: 10pt;"> ／FAX：052-883-8864(24時間受付)</span></font><br><font face="Arial, Verdana"><span style="font-size: 10pt;">\r\n営業時間：8：00～19：00</span></font><br><font face="Arial, Verdana"><span style="font-size: 10pt;">主な施工エリア：豊明市・東郷町・</span><span style="font-size: 13.3333px;">名古屋市緑区・名古屋市天白区・名古屋市昭和区・名古屋市瑞穂区・名古屋市熱田区・</span></font><span style="font-size: 13.3333px; font-family: Arial, Verdana;">名古屋市港区・名古屋市南区・名古屋市千種区・名古屋市名東区・長久手市・日進市・</span><span style="font-size: 13.3333px; font-family: Arial, Verdana;">大府市・刈谷市・東海市・みよし市・知立市・高浜市・阿久比町・半田市</span></div><div><font face="Arial, Verdana"><span style="font-size: 13.3333px;">※記載以外の地域はお問合せください。</span></font><div style="font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal;"><br><br></div></div>'),
(536411, 10468, 'mp_1_1_text', '<div><font size="4"><b>自宅の一室で開業</b></font></div><div><br></div><div>正確には親御さんのご自宅ですが、1室でサロンを開業することになったお施主様です。</div><div>自社でリフォームをしたことのあるOBの方よりご紹介をいただきました。</div><div><br></div><div>開業の時期をお聞かせいただき、ご要望に添えるように工期を組みました。<br>工事内容は、床・壁の張替え、塗装、照明器具の交換等です。</div><div>床や壁のサンプルを取り寄せ、一気に仕様を決めていきました。</div><div><br></div><div>この度は開店誠におめでとうございます。<br></div><div><br></div>'),
(536430, 10468, 'mp_3_type', 'texts'),
(536431, 10468, 'mp_3_rail', '3'),
(536432, 10468, 'mp_contents', '1'),
(536433, 10468, 'mp_link', '');
