-- MySQL dump 10.13  Distrib 5.5.21, for Win32 (x86)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.5.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


--
-- テーブルの構造 `admins`
--

CREATE TABLE `admins` (
  `adm_id` bigint(20) UNSIGNED NOT NULL,
  `adm_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `exp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `admins`
--

INSERT INTO `admins` (`adm_id`, `adm_name`, `password`, `exp`) VALUES
(1, 'test', 'test', 'テスト用');


--
-- Table structure for table `adr_book`
--

DROP TABLE IF EXISTS `adr_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adr_book` (
  `adb_id` int(11) NOT NULL AUTO_INCREMENT,
  `adb_name` varchar(30) NOT NULL,
  `adb_reading` varchar(30) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `adb_zip` varchar(15) DEFAULT NULL,
  `adb_address` varchar(100) DEFAULT NULL,
  `adb_phone` varchar(20) DEFAULT NULL,
  `adb_mail` varchar(50) DEFAULT NULL,
  `adb_add_day` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dst_id` int(11) DEFAULT NULL,
  `gnr_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`adb_id`),
  KEY `gender_id` (`gender_id`),
  KEY `dst_id` (`dst_id`),
  KEY `gnr_id` (`gnr_id`),
  CONSTRAINT `adr_book_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`),
  CONSTRAINT `adr_book_ibfk_2` FOREIGN KEY (`dst_id`) REFERENCES `district` (`dst_id`),
  CONSTRAINT `adr_book_ibfk_3` FOREIGN KEY (`gnr_id`) REFERENCES `genre` (`gnr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adr_book`
--

LOCK TABLES `adr_book` WRITE;
/*!40000 ALTER TABLE `adr_book` DISABLE KEYS */;
INSERT INTO `adr_book` VALUES (1,'田中誠',NULL,1,'600001','札幌市中央区北１条西２丁目','8003230001','tanaka@ideal.jp','2012-09-01 08:26:12',1,1),(2,'佐藤由香','さとうゆか',2,'8100022','福岡県福岡市中央区',NULL,'yuka@ideal.jp','2012-09-01 08:29:15',3,2);
/*!40000 ALTER TABLE `adr_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(30) NOT NULL,
  `detail` text,
  `orderFlg` tinyint(4) DEFAULT '1',
  `price` int(11) NOT NULL,
  `t_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'Aコース（牛肉料理）','最上級の神戸牛がメインのコースです',1,12000,100),(2,'Bコース（鳥肉料理）','真鴨をコクのあるソースで炒めました',1,10000,100),(3,'Cコース（魚介料理）','伊勢海老がメインのコースです',1,12000,100);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coursectl`
--

DROP TABLE IF EXISTS `coursectl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coursectl` (
  `c_id` int(11) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  KEY `m_id` (`m_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `coursectl_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `menu` (`m_id`),
  CONSTRAINT `coursectl_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coursectl`
--

LOCK TABLES `coursectl` WRITE;
/*!40000 ALTER TABLE `coursectl` DISABLE KEYS */;
INSERT INTO `coursectl` VALUES (1,1),(1,6),(1,14),(1,22),(2,2),(2,7),(2,13),(2,23),(3,2),(3,7),(3,10),(3,20),(3,21);
/*!40000 ALTER TABLE `coursectl` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `emp_lic`
--

DROP TABLE IF EXISTS `emp_lic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_lic` (
  `emp_id` int(11) NOT NULL DEFAULT '0',
  `lic_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`emp_id`,`lic_id`),
  KEY `lic_id` (`lic_id`),
  CONSTRAINT `emp_lic_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  CONSTRAINT `emp_lic_ibfk_2` FOREIGN KEY (`lic_id`) REFERENCES `license` (`lic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_lic`
--

LOCK TABLES `emp_lic` WRITE;
/*!40000 ALTER TABLE `emp_lic` DISABLE KEYS */;
INSERT INTO `emp_lic` VALUES (1,1),(3,1),(7,1),(9,1),(1,2),(2,2),(1,4),(3,4),(8,5),(9,7);
/*!40000 ALTER TABLE `emp_lic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL DEFAULT '0',
  `emp_name` varchar(255) NOT NULL,
  `emp_age` int(11) NOT NULL,
  `emp_sal` int(11) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `gender_id` (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'田中健太郎',27,198000,1),(2,'島田麻紀',23,172000,2),(3,'福井肇',32,220000,1),(4,'山本加奈子',33,210000,2),(5,'遠藤隆',45,370000,1),(6,'佐藤龍',52,440000,1),(7,'岩隈優',28,270000,2),(8,'本間佳子',29,250000,2),(9,'中田和良',55,470000,1),(10,'吉本一郎',48,270000,1),(11,'小沢雪夫',34,300000,1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL DEFAULT '0',
  `gender_name` varchar(10) NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'男性'),(2,'女性');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `license`
--

DROP TABLE IF EXISTS `license`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `license` (
  `lic_id` int(11) NOT NULL DEFAULT '0',
  `lic_name` varchar(255) NOT NULL,
  PRIMARY KEY (`lic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `license`
--

LOCK TABLES `license` WRITE;
/*!40000 ALTER TABLE `license` DISABLE KEYS */;
INSERT INTO `license` VALUES (1,'普通自動車第1種免許'),(2,'英語検定1級'),(3,'中国語検定1級'),(4,'簿記'),(5,'調理師'),(6,'国内旅行取り扱い主任者'),(7,'中小企業診断士');
/*!40000 ALTER TABLE `license` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `major_city`
--

DROP TABLE IF EXISTS `major_city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `major_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(30) NOT NULL,
  `pref_name` varchar(30) NOT NULL,
  `area` double DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `dst_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`city_id`),
  KEY `fk_district` (`dst_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `major_city`
--

LOCK TABLES `major_city` WRITE;
/*!40000 ALTER TABLE `major_city` DISABLE KEYS */;
INSERT INTO `major_city` VALUES (1,'札幌市','北海道',1121.12,1890857,1),(2,'仙台市','宮城県',783.55,1033515,2),(3,'さいたま市','埼玉県',217.49,1212281,3),(4,'千葉市','千葉県',272.08,955279,3),(5,'横浜市','神奈川県',437.38,3671776,3),(6,'川崎市','神奈川県',142.7,1409558,3),(7,'新潟市','新潟県',726.1,812226,4),(8,'静岡市','静岡県',1411.82,717178,4),(9,'浜松市','静岡県',1511.17,811085,4),(10,'名古屋市','愛知県',326.43,2257888,4),(11,'京都市','京都府',827.9,1465816,5),(12,'大阪市','大阪府',222.3,2661700,5),(13,'堺市','大阪府',149.99,837853,5),(14,'神戸市','兵庫県',552.23,1536685,5),(15,'岡山市','岡山県',789.91,704189,6),(16,'広島市','広島県',905.25,1170642,6),(17,'北九州市','福岡県',487.88,982805,8),(18,'福岡市','福岡県',341.11,1450838,8);
/*!40000 ALTER TABLE `major_city` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_Name` varchar(100) NOT NULL,
  `detail` text,
  `orderFlg` tinyint(4) DEFAULT '1',
  `price` int(11) NOT NULL,
  `t_id` smallint(6) NOT NULL,
  PRIMARY KEY (`m_id`),
  KEY `t_id` (`t_id`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `menutype` (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'フォアグラのロースト','三大珍味のひとつフォアグラをローストしました',1,3000,200),(2,'オマールエビのサラダ','地中海のオマールエビをあっさりドレッシングで',1,1800,200),(3,'生ハムとサラミの盛り合わせ','イタリアンなハムとソーセージ',1,2100,200),(4,'モッツァレッラチーズのトマトソース','イタリアンチーズはいかが',1,1800,200),(5,'コーンクリームスープ',NULL,1,800,210),(6,'オニオングラタンスープ','とろけるオニオン',1,1200,210),(7,'カリブ海風クラムチャウダー',NULL,1,1000,210),(8,'コンソメスープ',NULL,1,800,210),(9,'明太子のパスタ','九州の明太子を贅沢に使いました',1,2100,220),(10,'ペスカトーレ地中海風',NULL,1,1800,220),(11,'トマトとバジリコのパスタジェノバ風','イタリアンスパイシーなパスタ',1,1600,220),(12,'ミートボールナポリ風トマトソース',NULL,1,1600,220),(13,'鴨肉のソテー',NULL,1,3800,300),(14,'和牛のサーロインステーキ','厳選した神戸牛のとろける味わい',1,4800,300),(15,'子羊の炭焼きスペアリブ','あっさりした子羊を骨つきで',1,3200,300),(16,'ローストビーフパルミジャーノ添え',NULL,1,3800,300),(17,'鯛のソワレ','瀬戸内海の鯛をあっさり仕上げました',1,2800,310),(18,'舌平目のムニエル','白身魚の王様ヒラメを自家製バターで焼き上げました',1,3200,310),(19,'サーモンステーキ','北海道産のサーモンだけを厳選しました',1,2500,310),(20,'伊勢海老のロースト',NULL,1,3400,310),(21,'抹茶アイスクリーム',NULL,1,800,400),(22,'ガトーショコラ','甘さを抑えたイタリアンなデザート',1,700,400),(23,'洋ナシのゼリー',NULL,1,800,400);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menutype`
--

DROP TABLE IF EXISTS `menutype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menutype` (
  `t_id` smallint(6) NOT NULL DEFAULT '0',
  `t_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menutype`
--

LOCK TABLES `menutype` WRITE;
/*!40000 ALTER TABLE `menutype` DISABLE KEYS */;
INSERT INTO `menutype` VALUES (100,'コース'),(200,'前菜'),(210,'スープ'),(220,'パスタ'),(300,'肉料理'),(310,'魚料理'),(400,'デザート'),(700,'ワイン'),(710,'アルコール類'),(720,'ソフトドリンク類'),(900,'その他');
/*!40000 ALTER TABLE `menutype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserve`
--

DROP TABLE IF EXISTS `reserve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserve` (
  `rsv_id` int(11) NOT NULL AUTO_INCREMENT,
  'usr_id' int(11) NOT NULL,
  `rsv_date` datetime NOT NULL,
  `app_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `person` tinyint(4) NOT NULL,
  `table_id` tinyint(4) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `del_flg` tinyint(4) DEFAULT NULL,
  `del_date` datetime DEFAULT NULL,
  PRIMARY KEY (`rsv_id`),
  KEY `cst_id` (`cst_id`),
  KEY `c_id` (`c_id`),
  KEY `table_id` (`table_id`),
  CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`),
  CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`),
  CONSTRAINT `reserve_ibfk_3` FOREIGN KEY (`table_id`) REFERENCES `table_loc` (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserve`
--

LOCK TABLES `reserve` WRITE;
/*!40000 ALTER TABLE `reserve` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserve` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `table_loc`
--

DROP TABLE IF EXISTS `table_loc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_loc` (
  `table_id` tinyint(4) NOT NULL,
  `table_name` varchar(30) DEFAULT NULL,
  `max_capacity` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_loc`
--

LOCK TABLES `table_loc` WRITE;
/*!40000 ALTER TABLE `table_loc` DISABLE KEYS */;
INSERT INTO `table_loc` VALUES (1,'ローマ',4),(2,'フィレンツェ',4),(3,'ミラノ',4),(4,'ヴェニス',4),(5,'ナポリ',4),(6,'ロードス',6),(7,'シチリア',6);
/*!40000 ALTER TABLE `table_loc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `usr_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`usr_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test', NULL, 'test', NULL, NULL, NULL),
(2, 'KUDO　SHO', 'kudo.bizz@gmail.com', NULL, 'a', NULL, NULL, NULL);



/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-29 14:04:42
