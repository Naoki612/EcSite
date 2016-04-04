-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 3 月 04 日 11:12
-- サーバのバージョン： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ec-site`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `brandNo`
--

CREATE TABLE `brandNo` (
  `brandNo` int(2) NOT NULL,
  `brandName` varchar(20) NOT NULL,
  `brandImg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `brandNo`
--

INSERT INTO `brandNo` (`brandNo`, `brandName`, `brandImg`) VALUES
(14, 'adidas', 'adidas.jpg'),
(15, 'Reebok', 'Reebok.jpg'),
(16, 'Nike', 'Nike.jpg'),
(17, 'asics', 'asics.jpg'),
(18, 'Mizuno', 'Mizuno.jpg'),
(19, 'UNDER ARMOUR', 'UNDER ARMOUR.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `categoryTable`
--

CREATE TABLE `categoryTable` (
  `categoryNo` int(4) UNSIGNED ZEROFILL NOT NULL,
  `categoryName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `categoryTable`
--

INSERT INTO `categoryTable` (`categoryNo`, `categoryName`) VALUES
(0001, 'ライフスタイル'),
(0002, 'ランニング'),
(0003, 'バスケットボール'),
(0004, 'サッカー／フットボール'),
(0005, 'トレーニング'),
(0006, 'ランニング');

-- --------------------------------------------------------

--
-- テーブルの構造 `colorTable`
--

CREATE TABLE `colorTable` (
  `colorNo` int(3) UNSIGNED ZEROFILL NOT NULL,
  `colorName` char(3) NOT NULL,
  `colorCode` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `colorTable`
--

INSERT INTO `colorTable` (`colorNo`, `colorName`, `colorCode`) VALUES
(001, 'BLK', '000000'),
(002, 'BRN', '8B4513'),
(003, 'RED', 'DF3447'),
(004, 'PNK', 'FF69B4'),
(005, 'ORN', 'FF8300'),
(006, 'YEL', 'F4D500'),
(007, 'GRN', '009A57'),
(008, 'BLU', '006FAB'),
(009, 'GRY', 'A9A9A9'),
(011, 'VIO', '592088'),
(012, 'WHT', 'FFFFFF');

-- --------------------------------------------------------

--
-- テーブルの構造 `Discount`
--

CREATE TABLE `Discount` (
  `DiscountValue` int(6) NOT NULL,
  `itemNo` int(4) NOT NULL,
  `StartDate` date NOT NULL,
  `FinishDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `Discount`
--

INSERT INTO `Discount` (`DiscountValue`, `itemNo`, `StartDate`, `FinishDate`) VALUES
(7500, 129, '2016-01-01', '2016-01-19'),
(5000, 133, '2016-02-01', '2016-03-01');

-- --------------------------------------------------------

--
-- テーブルの構造 `imageTable`
--

CREATE TABLE `imageTable` (
  `imgNo` int(11) UNSIGNED ZEROFILL NOT NULL,
  `itemNo` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `colorNo` int(3) DEFAULT NULL,
  `ItemIMGName` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `imageTable`
--

INSERT INTO `imageTable` (`imgNo`, `itemNo`, `colorNo`, `ItemIMGName`, `date`) VALUES
(00000000013, 0129, 12, '14012129_0.jpg', '2016-01-17'),
(00000000014, 0129, 12, '14012129_1.jpg', '2016-01-17'),
(00000000015, 0129, 12, '14012129_2.jpg', '2016-01-17'),
(00000000016, 0129, 12, '14012129_3.jpg', '2016-01-17'),
(00000000017, 0129, 12, '14012129_4.jpg', '2016-01-17'),
(00000000046, 0129, 1, '140010129_0.jpg', '2016-01-17'),
(00000000047, 0129, 1, '140010129_1.jpg', '2016-01-17'),
(00000000048, 0129, 1, '140010129_2.jpg', '2016-01-17'),
(00000000049, 0129, 1, '140010129_3.jpg', '2016-01-17'),
(00000000050, 0129, 1, '140010129_4.jpg', '2016-01-17'),
(00000000051, 0129, 1, '140010129_5.jpg', '2016-01-17'),
(00000000052, 0129, 1, '140010129_6.jpg', '2016-01-17'),
(00000000060, 0133, 8, '15008133_0.jpg', '2016-01-18'),
(00000000061, 0133, 8, '15008133_1.jpg', '2016-01-18'),
(00000000062, 0133, 8, '15008133_2.jpg', '2016-01-18'),
(00000000063, 0133, 8, '15008133_3.jpg', '2016-01-18'),
(00000000064, 0133, 8, '15008133_4.jpg', '2016-01-18'),
(00000000065, 0133, 8, '15008133_5.jpg', '2016-01-18'),
(00000000066, 0133, 9, '150090133_0.jpg', '2016-01-18'),
(00000000067, 0133, 9, '150090133_1.jpg', '2016-01-18'),
(00000000068, 0133, 9, '150090133_2.jpg', '2016-01-18'),
(00000000069, 0133, 9, '150090133_3.jpg', '2016-01-18'),
(00000000070, 0133, 9, '150090133_4.jpg', '2016-01-18'),
(00000000071, 0133, 1, '150010133_0.jpg', '2016-01-18'),
(00000000072, 0133, 1, '150010133_1.jpg', '2016-01-18'),
(00000000073, 0133, 1, '150010133_2.jpg', '2016-01-18'),
(00000000074, 0133, 1, '150010133_3.jpg', '2016-01-18'),
(00000000075, 0133, 1, '150010133_4.jpg', '2016-01-18'),
(00000000076, 0133, 3, '150030133_0.jpg', '2016-01-18'),
(00000000077, 0133, 3, '150030133_1.jpg', '2016-01-18'),
(00000000078, 0133, 3, '150030133_2.jpg', '2016-01-18'),
(00000000079, 0133, 3, '150030133_3.jpg', '2016-01-18'),
(00000000080, 0133, 3, '150030133_4.jpg', '2016-01-18'),
(00000000081, 0133, 3, '150030133_5.jpg', '2016-01-18'),
(00000000082, 0133, 3, '150030133_6.jpg', '2016-01-18'),
(00000000083, 0133, 3, '150030133_7.jpg', '2016-01-18'),
(00000000084, 0133, 3, '150030133_8.jpg', '2016-01-18'),
(00000000085, 0133, 3, '150030133_9.jpg', '2016-01-18'),
(00000000091, 0134, 8, '15008134_0.jpg', '2016-01-18'),
(00000000092, 0134, 8, '15008134_1.jpg', '2016-01-18'),
(00000000093, 0134, 8, '15008134_2.jpg', '2016-01-18'),
(00000000094, 0134, 8, '15008134_3.jpg', '2016-01-18'),
(00000000095, 0134, 8, '15008134_4.jpg', '2016-01-18'),
(00000000096, 0135, 3, '16003135_0.jpg', '2016-01-18'),
(00000000097, 0135, 3, '16003135_1.jpg', '2016-01-18'),
(00000000098, 0135, 3, '16003135_2.jpg', '2016-01-18'),
(00000000099, 0135, 3, '16003135_3.jpg', '2016-01-18'),
(00000000100, 0135, 3, '16003135_4.jpg', '2016-01-18'),
(00000000101, 0135, 3, '16003135_5.jpg', '2016-01-18'),
(00000000102, 0135, 12, '160120135_0.jpg', '2016-01-18'),
(00000000103, 0135, 12, '160120135_1.jpg', '2016-01-18'),
(00000000104, 0135, 12, '160120135_2.jpg', '2016-01-18'),
(00000000105, 0135, 12, '160120135_3.jpg', '2016-01-18'),
(00000000106, 0135, 12, '160120135_4.jpg', '2016-01-18'),
(00000000107, 0135, 7, '160070135_0.jpg', '2016-01-18'),
(00000000108, 0135, 7, '160070135_1.jpg', '2016-01-18'),
(00000000109, 0135, 7, '160070135_2.jpg', '2016-01-18'),
(00000000110, 0135, 7, '160070135_3.jpg', '2016-01-18'),
(00000000111, 0135, 7, '160070135_4.jpg', '2016-01-18'),
(00000000112, 0135, 7, '160070135_5.jpg', '2016-01-18'),
(00000000113, 0136, 8, '16008136_0.jpg', '2016-01-18'),
(00000000114, 0136, 8, '16008136_1.jpg', '2016-01-18'),
(00000000115, 0136, 8, '16008136_2.jpg', '2016-01-18'),
(00000000116, 0136, 8, '16008136_3.jpg', '2016-01-18'),
(00000000117, 0136, 8, '16008136_4.jpg', '2016-01-18'),
(00000000118, 0136, 8, '16008136_5.jpg', '2016-01-18'),
(00000000119, 0136, 8, '16008136_6.jpg', '2016-01-18');

-- --------------------------------------------------------

--
-- テーブルの構造 `itemColorTable`
--

CREATE TABLE `itemColorTable` (
  `itemNo` int(4) DEFAULT NULL,
  `colorCode` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `itemNoTable`
--

CREATE TABLE `itemNoTable` (
  `itemNo` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT '型番',
  `itemName` varchar(255) DEFAULT NULL COMMENT '商品名',
  `itemValue` int(6) DEFAULT NULL COMMENT '価格',
  `itemBrandNo` int(2) DEFAULT NULL,
  `itemCate` int(3) DEFAULT NULL COMMENT 'カテゴリ番号',
  `itemWidth` int(3) NOT NULL,
  `itemHeight` int(3) NOT NULL,
  `itemWeight` int(3) NOT NULL,
  `ItemSex` int(1) NOT NULL,
  `itemInfo` text COMMENT '商品情報',
  `itemFrom` int(2) DEFAULT NULL COMMENT '製造国',
  `date` date NOT NULL,
  `regiDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `itemNoTable`
--

INSERT INTO `itemNoTable` (`itemNo`, `itemName`, `itemValue`, `itemBrandNo`, `itemCate`, `itemWidth`, `itemHeight`, `itemWeight`, `ItemSex`, `itemInfo`, `itemFrom`, `date`, `regiDate`) VALUES
(0129, 'オリジナルス スーパースター 80s ヴィンテージ デラックス [Superstar 80s Vintage Deluxe]', 17280, 14, 2, 80, 80, 90, 0, 'adidas Originals（アディダス　オリジナルス）スニーカー。なんといっても“スーパースター80s”は、アディダスの元祖となるシューズである。今シーズンの「SS 80s ビンテージデラックス」は、オリジナルのオールホワイトのアッパーにあしらった色付けしたスリーストライプスとヒールタブのスタイルを復活させた。上質なレザーに滑らかなヌバックのスリーストライプスをあしらい、さらなる履き心地を求め、高機能ウレタンフォームを採用したソックライナーを備えている。アイコニックなゴールドのタンラベルがポイント。', 3, '2016-01-17', '2016-01-17 02:08:43'),
(0133, 'インスタポンプ フューリー AFFILIATES （Instapump Fury for ZOZOTOWN） Reebok CLASSIC（リーボック　クラシック）', 20304, 15, 1, 70, 80, 70, 0, 'Reebok CLASSICとZOZOTOWNの初のコラボレーションとなるインスタポンプ フューリー（Instapump Fury for ZOZOTOWN）が登場!! 「ZOZOTOWN」の10周年記念モデルともなる今作は、Reebok CLASSICを代表する人気モデル「Instapump Fury」をアパレル素材であるデニム生地をアッパーに使用したスペシャルなデザイン。アクセントとしてオレンジ色のステッチを施し、メンズ、レディースと性別問わず受け入れられるデザインに仕上がっている。シンプルながら主張のある1足。', 3, '2016-01-18', '2016-01-18 00:29:35'),
(0134, 'ジーポンプ フュージョン Reebok (リーボック） ZPump Fusion', 13932, 15, 2, 80, 80, 80, 1, 'シューズの内部に空気を送り込み、個々の足にシューズをぴったりとフィットさせるという革新的な技術がハイテクシューズの先駆け的存在として話題を呼んだ"ザ ポンプ テクノロジー"がリーボック最新のランニングシューズに搭載され、更なる進化を遂げた！縦・横・斜めの4方向に伸縮するアッパーは様々な人の足にフィットし、ポンプして空気をシューズ内のエアチェンバーに注入する事で更なるフィット感と安定感が得られる。前足部のフィッティングはゆったりとした履き心地なので、幅広の人でもストレス感じる事無くフィットする。ソールはレーシングカーに使用されるZ規格タイヤからインスパイアされた、グリップ性、屈曲性、クッション性に優れた仕様なので日々のランニングやトレーニングには最適！今までのランニングシューズには無かったカジュアルでも履きこなせるデザインと個々の足に合わせてフィッティングを調整できる機能を兼ね備えたジーポンプ フュージョンはランニングシューズの概念を変える。\r\n', 3, '2016-01-18', '2016-01-18 01:08:55'),
(0135, 'ナイキ エア ズーム スピード レーサー 6', 13500, 16, 2, 2, 0, 3, 1, 'ナイキ エア ズーム スピード レーサー 6 ユニセックスシューズは、通気性に優れたメッシュとダイナミックなFlywireテクノロジーを採用。風通しのよさとグローブのようなフィット感を実現しました。Nike Zoom Airユニットで、スタートからゴールまで抜群の反発力が続きます。\r\n特長\r\nメッシュと合成皮革のアッパーが、通気性と耐久性に優れた快適な履き心地を実現\r\nFlywire構造により、超軽量ながら優れたサポート力と快適な履き心地を実現\r\nPhylon素材のミッドソールと前足部のNike Zoom Airユニットによる軽量な薄型クッショニング\r\nラバーアウトソールがトラクションと耐久性を強化', 3, '2016-01-18', '2016-01-18 01:25:29'),
(0136, 'ナイキ フリー 5.0', 11800, 16, 2, 2, 0, 3, 1, 'NIKE史上最もクッション性に優れた自然な履き心地\r\nナイキ フリー 5.0 メンズ ランニングシューズは、ナイキ フリーを初めて履くランナーにおすすめのシューズ。極めて軽量なクッショニングとサポート力で、より自然なランニングを実現します。\r\n動きやすさが向上\r\n六角形のフレックスグルーブ (アウトソールやミッドソールにある溝) による6か所の湾曲部分が、あらゆる方向への足の自然な動きをサポートします。\r\n自然なストライド\r\nかかと部分と前足部のオフセットが8mmで、薄型のミッドソールとラウンドヒールがより自然な着地を促します\r\nサポート\r\nエンジニアードメッシュのアッパーが足の形にフィットし、動きに合わせてサポート。従来モデルの特長である快適性とフィット感を提供します。シューレースと一体化したFlywireがサポート力をさらに高め、順応性のあるフィット感を実現します。\r\nその他の特長\r\n継ぎ目がなく快適な履き心地のフルブーティー構造\r\n継ぎ目のないオーバーレイで、軽量性を損なうことなくサポート力と耐久性を実現\r\n足の形状になじむ成型ソックライナーでサポート力を強化\r\nサンドイッチ構造のメッシュ素材を使用したシュータンで快適性と通気性を追求\r\nつま先部分の底の固いラバーでトラクションと耐久性を向上\r\nアウトソールのワッフルピストンが衝撃を吸収し、反発性をアップ\r\n商品の詳細\r\n重量：約224g (メンズサイズ29cm)\r\nミッドソールのオフセット：8mm\r\nNIKE FREEの原点\r\nNikeの最も革新的かつクリエイティブな3人の従業員は、スタンフォード大学の選手たちが大学のゴルフコースにおいて裸足でトレーニングをしていることを知り、裸足のように自然で軽やかな履き心地を備えたシューズの開発に取りかかりました。2002年、彼らは圧力を測定できるインソールを男女のグループの足に貼り付け、高速カメラを使用して足の動きを撮影した。チームは8年をかけて、裸足で走った時の生体力学について研究を進め、 足の自然な着地角度、圧力、つま先の位置について徹底的に究明。これにより、Nikeのデザイナーは、今までにないまったく新しいランニングシューズの開発に成功しました。', 3, '2016-01-18', '2016-01-18 01:36:46');

-- --------------------------------------------------------

--
-- テーブルの構造 `itemSizeTable`
--

CREATE TABLE `itemSizeTable` (
  `sizeNo` int(2) UNSIGNED ZEROFILL NOT NULL,
  `itemSize` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `itemSizeTable`
--

INSERT INTO `itemSizeTable` (`sizeNo`, `itemSize`) VALUES
(01, 220),
(02, 225),
(03, 230),
(04, 235),
(05, 240),
(06, 245),
(07, 250),
(08, 255),
(09, 260),
(10, 265),
(11, 270),
(12, 275),
(13, 280),
(14, 285),
(15, 290),
(16, 295),
(17, 300);

-- --------------------------------------------------------

--
-- テーブルの構造 `madeinTable`
--

CREATE TABLE `madeinTable` (
  `madeinNo` int(2) UNSIGNED ZEROFILL NOT NULL,
  `countryCode` char(3) DEFAULT NULL,
  `countryName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `madeinTable`
--

INSERT INTO `madeinTable` (`madeinNo`, `countryCode`, `countryName`) VALUES
(01, 'USA', 'アメリカ合衆国'),
(02, 'THA', 'タイ'),
(03, 'CHN', '中国'),
(04, 'DEU', 'ドイツ	');

-- --------------------------------------------------------

--
-- テーブルの構造 `sales`
--

CREATE TABLE `sales` (
  `salesNo` int(5) UNSIGNED ZEROFILL NOT NULL,
  `userNo` int(8) UNSIGNED ZEROFILL NOT NULL,
  `salesDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `sales`
--

INSERT INTO `sales` (`salesNo`, `userNo`, `salesDay`) VALUES
(00001, 00000000, '2016-01-28'),
(00003, 00000000, '2016-01-28'),
(00004, 00000000, '2016-01-28'),
(00005, 00000000, '2016-01-28'),
(00006, 00000002, '2016-01-28'),
(00007, 00000002, '2016-01-29'),
(00008, 00000002, '2016-01-29'),
(00009, 00000002, '2016-01-29'),
(00010, 00000002, '2016-01-29'),
(00011, 00000002, '2016-01-29'),
(00012, 00000002, '2016-01-29'),
(00013, 00000002, '2016-01-29'),
(00014, 00000002, '2016-01-29'),
(00015, 00000002, '2016-01-29'),
(00016, 00000002, '2016-01-29'),
(00017, 00000002, '2016-01-29'),
(00018, 00000002, '2016-01-29'),
(00019, 00000002, '2016-02-05'),
(00020, 00000002, '2016-02-05'),
(00021, 00000002, '2016-02-05'),
(00022, 00000002, '2016-02-05'),
(00023, 00000002, '2016-02-05'),
(00024, 00000002, '2016-02-05'),
(00025, 00000011, '2016-02-18'),
(00026, 00000011, '2016-02-18'),
(00027, 00000011, '2016-02-18'),
(00028, 00000011, '2016-02-18'),
(00029, 00000011, '2016-02-19'),
(00030, 00000011, '2016-02-19'),
(00031, 00000011, '2016-02-19');

-- --------------------------------------------------------

--
-- テーブルの構造 `salesDetail`
--

CREATE TABLE `salesDetail` (
  `salesNo` int(5) NOT NULL,
  `itemNo` int(4) NOT NULL,
  `colorNo` int(3) NOT NULL,
  `itemStock` int(2) NOT NULL,
  `itemSize` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `salesDetail`
--

INSERT INTO `salesDetail` (`salesNo`, `itemNo`, `colorNo`, `itemStock`, `itemSize`) VALUES
(1, 129, 1, 1, 0),
(3, 129, 1, 1, 0),
(3, 129, 1, 1, 0),
(3, 129, 1, 1, 0),
(3, 129, 1, 1, 0),
(4, 129, 1, 1, 0),
(4, 129, 1, 1, 0),
(4, 129, 1, 1, 0),
(4, 129, 1, 1, 0),
(5, 129, 1, 1, 0),
(6, 133, 1, 1, 0),
(7, 129, 12, 1, 0),
(7, 129, 1, 1, 0),
(8, 133, 9, 2, 250),
(9, 133, 9, 2, 250),
(9, 135, 3, 1, 0),
(9, 135, 3, 1, 0),
(10, 135, 3, 1, 0),
(10, 129, 1, 1, 0),
(11, 135, 3, 1, 0),
(11, 129, 1, 1, 0),
(11, 129, 12, 1, 0),
(11, 129, 1, 1, 0),
(14, 129, 1, 1, 0),
(17, 134, 8, 1, 0),
(18, 134, 8, 1, 0),
(18, 133, 1, 1, 250),
(19, 134, 8, 1, 0),
(19, 129, 12, 1, 250),
(20, 134, 8, 1, 250),
(21, 135, 3, 1, 250),
(22, 134, 8, 1, 250),
(23, 135, 3, 3, 255),
(24, 135, 3, 1, 250),
(24, 135, 3, 1, 255),
(25, 133, 8, 1, 0),
(26, 133, 9, 1, 255),
(27, 135, 12, 1, 265),
(28, 135, 12, 1, 0),
(29, 134, 8, 1, 250),
(29, 134, 8, 2, 250),
(29, 133, 3, 1, 250),
(30, 134, 8, 1, 245),
(30, 133, 9, 1, 245),
(30, 133, 1, 1, 250),
(31, 133, 1, 1, 250),
(31, 134, 8, 1, 245),
(31, 134, 8, 1, 250);

-- --------------------------------------------------------

--
-- テーブルの構造 `stockTable`
--

CREATE TABLE `stockTable` (
  `itemNo` int(4) NOT NULL,
  `colorNo` int(3) NOT NULL,
  `sizeNo` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `userAddr`
--

CREATE TABLE `userAddr` (
  `user` int(8) UNSIGNED ZEROFILL DEFAULT NULL,
  `zip` int(7) NOT NULL,
  `pref01` varchar(10) DEFAULT NULL,
  `addr01` varchar(255) DEFAULT NULL,
  `addr02` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `userAddr`
--

INSERT INTO `userAddr` (`user`, `zip`, `pref01`, `addr01`, `addr02`) VALUES
(00000000, 6300252, '奈良県', '生駒市山崎町', '26-28-309'),
(00000002, 6300252, '奈良県', '生駒市山崎町', '26-28-309'),
(00000003, 6300252, '奈良県', '生駒市', '28'),
(00000004, 6300252, '奈良県', '生駒市', '28'),
(00000005, 6300252, '奈良県', '生駒市', '28'),
(00000006, 6300252, '奈良県', '生駒市', '28'),
(00000007, 6300252, '奈良県', '生駒市', '28'),
(00000008, 6300252, '奈良県', '生駒市', '28'),
(00000009, 0, 'ds', 'fd', 'fd'),
(00000010, 0, 'ds', 'fd', 'fd'),
(00000011, 6300252, '東京都', '千代田区永田町', '１丁目７−１');

-- --------------------------------------------------------

--
-- テーブルの構造 `userInfo`
--

CREATE TABLE `userInfo` (
  `user` int(8) UNSIGNED ZEROFILL NOT NULL,
  `userFirstName` varchar(50) NOT NULL,
  `userFirstNameK` varchar(50) NOT NULL,
  `userLastName` varchar(50) NOT NULL,
  `userLastNameK` varchar(50) NOT NULL,
  `userBirth` date NOT NULL,
  `userSex` tinyint(1) NOT NULL,
  `userTel` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `userInfo`
--

INSERT INTO `userInfo` (`user`, `userFirstName`, `userFirstNameK`, `userLastName`, `userLastNameK`, `userBirth`, `userSex`, `userTel`) VALUES
(00000002, '上田', 'ウエダ', '直樹', 'ナオキ', '1980-01-01', 2, '0743741780'),
(00000003, '上田', 'ウエダ', '直樹', 'ナオキ', '1980-01-01', 2, '0808080808'),
(00000004, '上田', 'ウエダ', '直樹', 'ナオキ', '1980-01-01', 2, '0808080808'),
(00000005, '上田', 'ウエダ', '直樹', 'ナオキ', '1980-01-01', 2, '0808080808'),
(00000006, '上田', 'ウエダ', '直樹', 'ナオキ', '1980-01-01', 2, '0808080808'),
(00000007, '上田', 'ウエダ', '直樹', 'ナオキ', '1980-01-01', 2, '0808080808'),
(00000008, '上田', 'ウエダ', '直樹', 'ナオキ', '1980-01-01', 2, '0808080808'),
(00000009, 'jflas', 'jlkfdas', 'jlkfda', 'jlk;fad', '1980-01-01', 2, 'df'),
(00000010, 'jflas', 'jlkfdas', 'jlkfda', 'jlk;fad', '1980-01-01', 2, 'df'),
(00000011, '安倍', 'アベ', '晋三', 'シンゾウ', '1936-11-07', 2, '0355217445');

-- --------------------------------------------------------

--
-- テーブルの構造 `userLogin`
--

CREATE TABLE `userLogin` (
  `user` int(8) UNSIGNED ZEROFILL NOT NULL,
  `id` int(12) UNSIGNED ZEROFILL NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userPass` varchar(255) DEFAULT NULL,
  `userID` varchar(255) NOT NULL,
  `enable` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `userLogin`
--

INSERT INTO `userLogin` (`user`, `id`, `userEmail`, `userPass`, `userID`, `enable`) VALUES
(00000000, 000000000001, NULL, 'dddd', 'dddd', 1),
(00000000, 000000000002, NULL, 'dddd', 'dddd', 1),
(00000002, 000000000003, NULL, '$2y$10$yUYP3fMGr5WFJ/MlN9cWBOjrPsc83ThEh7FE1y6o69do5nN8tl3w2', 'naoki0612', 1),
(00000005, 000000000004, 'naoki@gmail.com', '$2y$10$6BQdWThL1Ve0o8T76F8hROhKwkb0KDYUAvAO29f6tabBnV2nNaxGa', 'naokinaoki', 1),
(00000007, 000000000005, 'naoki@gmail.com', '$2y$10$6BQdWThL1Ve0o8T76F8hROhKwkb0KDYUAvAO29f6tabBnV2nNaxGa', 'naokinaoki', 1),
(00000008, 000000000006, 'naoki@gmail.com', '$2y$10$6BQdWThL1Ve0o8T76F8hROhKwkb0KDYUAvAO29f6tabBnV2nNaxGa', 'naokinaoki', 1),
(00000009, 000000000007, 'naokigii@gmail.com', '$2y$10$3bfeKEi8XFM9tOP3Lk4hb.xCpLT1UUQMNRuUKgvRvNRac2c3aFSzi', 'naoki300129', 1),
(00000010, 000000000008, 'naokigii@gmail.com', '$2y$10$YzJMQTJ4xqc6H6COrMfXfuzqVIWLvDQqYYl9gY.L1wWWAQ4.TMIcG', 'naoki300129', 1),
(00000011, 000000000009, 'naoki@gmail.com', '$2y$10$V8kIpZhkGeWMzbOknrErhu2afpIH0wLpIMtpUwWrdGNepfxIcVFEu', 'abe3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brandNo`
--
ALTER TABLE `brandNo`
  ADD PRIMARY KEY (`brandNo`,`brandName`);

--
-- Indexes for table `categoryTable`
--
ALTER TABLE `categoryTable`
  ADD UNIQUE KEY `categoryNo` (`categoryNo`);

--
-- Indexes for table `colorTable`
--
ALTER TABLE `colorTable`
  ADD PRIMARY KEY (`colorNo`);

--
-- Indexes for table `imageTable`
--
ALTER TABLE `imageTable`
  ADD PRIMARY KEY (`imgNo`);

--
-- Indexes for table `itemNoTable`
--
ALTER TABLE `itemNoTable`
  ADD PRIMARY KEY (`itemNo`),
  ADD UNIQUE KEY `itemNo` (`itemNo`),
  ADD KEY `itemNo_2` (`itemNo`),
  ADD KEY `itemNo_3` (`itemNo`);

--
-- Indexes for table `itemSizeTable`
--
ALTER TABLE `itemSizeTable`
  ADD PRIMARY KEY (`sizeNo`);

--
-- Indexes for table `madeinTable`
--
ALTER TABLE `madeinTable`
  ADD PRIMARY KEY (`madeinNo`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesNo`);

--
-- Indexes for table `userInfo`
--
ALTER TABLE `userInfo`
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `userLogin`
--
ALTER TABLE `userLogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brandNo`
--
ALTER TABLE `brandNo`
  MODIFY `brandNo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `categoryTable`
--
ALTER TABLE `categoryTable`
  MODIFY `categoryNo` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `colorTable`
--
ALTER TABLE `colorTable`
  MODIFY `colorNo` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `imageTable`
--
ALTER TABLE `imageTable`
  MODIFY `imgNo` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `itemNoTable`
--
ALTER TABLE `itemNoTable`
  MODIFY `itemNo` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '型番', AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `itemSizeTable`
--
ALTER TABLE `itemSizeTable`
  MODIFY `sizeNo` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `madeinTable`
--
ALTER TABLE `madeinTable`
  MODIFY `madeinNo` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesNo` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `userInfo`
--
ALTER TABLE `userInfo`
  MODIFY `user` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `userLogin`
--
ALTER TABLE `userLogin`
  MODIFY `id` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
