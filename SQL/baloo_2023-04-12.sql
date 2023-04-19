# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.9.4-MariaDB)
# Database: baloo
# Generation Time: 2023-04-12 14:53:37 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Admins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Admins`;

CREATE TABLE `Admins` (
  `Admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_Email` varchar(50) DEFAULT NULL,
  `Admin_password` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;



# Dump of table Bookings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Bookings`;

CREATE TABLE `Bookings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_ID` (`user_ID`),
  CONSTRAINT `Bookings_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`Users_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;



# Dump of table Cats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cats`;

CREATE TABLE `Cats` (
  `Cat_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cat_name` varchar(25) DEFAULT NULL,
  `Cat_sex` varchar(25) DEFAULT NULL,
  `Cat_size` varchar(25) DEFAULT NULL,
  `Cat_color` varchar(25) DEFAULT NULL,
  `Cat_birth` date DEFAULT NULL,
  `Cat_castrated` tinyint(1) DEFAULT NULL,
  `Cat_Entry_date` date DEFAULT NULL,
  PRIMARY KEY (`Cat_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

LOCK TABLES `Cats` WRITE;
/*!40000 ALTER TABLE `Cats` DISABLE KEYS */;

INSERT INTO `Cats` (`Cat_ID`, `Cat_name`, `Cat_sex`, `Cat_size`, `Cat_color`, `Cat_birth`, `Cat_castrated`, `Cat_Entry_date`)
VALUES
	(1,'Cérna','Kandúr','Nagy','Tigris','2020-03-12',1,'2022-08-12'),
	(2,'Gyuri','Kandúr','Nagy','Tigris','2021-12-21',0,'2023-04-05'),
	(3,'Hómacs','Nőstény','Nagy','Fehér','2021-07-12',0,'2023-04-30'),
	(4,'Lola','Nőstény','Közepes','Cirmos','2022-01-15',0,'2022-07-16'),
	(5,'Puding','Kandúr','Nagy','Szürke','2019-04-13',1,'2020-09-15'),
	(6,'Zakó','Kandúr','Kicsi','Fekete','2022-10-10',0,'2022-12-16'),
	(7,'Cicó','Nőstény','Nagy','Szürke','2021-08-15',0,'2023-01-17'),
	(8,'Golyó','Kandúr','Nagy','Fekete','2022-01-12',0,'2022-01-17'),
	(9,'Kefir','Nőstény','Nagy','Cirmos','2022-01-19',1,'2022-12-05'),
	(10,'Topi','Kandúr','Közepes','Szürke','2021-10-16',1,'2022-03-15'),
	(11,'Üstökös','Kandúr','Nagy','Foltos','2020-11-19',0,'2021-03-25'),
	(12,'Bözsi','Nőstény','Nagy','Tigris','2020-12-25',1,'2020-08-15'),
	(13,'Pötyi','Kandúr','Közepes','Szürke','2022-01-11',0,'2022-07-16'),
	(14,'Moszat','Nőstény','Nagy','Cirmos','2021-09-18',0,'2022-02-28'),
	(15,'Kormi','Kandúr','Közepes','Fekete','2022-06-12',0,'2023-04-29'),
	(16,'Zorró','Kandúr','Nagy','Fekete-Fehér','2022-01-19',0,'2023-02-22'),
	(17,'Nyafi','Nőstény','Nagy','Arany','2019-08-23',1,'2021-11-06'),
	(18,'Fickó','Kandúr','Közepes','Fekete','2020-02-15',0,'2023-04-01'),
	(19,'Ropi','Kandúr','Kicsi','Arany','2022-10-21',0,'2022-03-02'),
	(20,'Csicska','Nőstény','Nagy','Foltos','2022-01-25',0,'2023-03-15'),
	(21,'Bolyhos','Nőstény','Nagy','Szürke','2015-05-13',1,'2020-05-28'),
	(22,'Bojszi','Kandúr','Nagy','Tigris','2021-07-21',0,'2023-03-03'),
	(23,'Mini','Nőstény','Nagy','Fehér','2022-01-30',0,'2022-12-31'),
	(24,'Rexi','Nőstény','Közepes','Foltos','2022-01-11',1,'2022-07-25'),
	(25,'Sziszi','Nőstény','Nagy','Foltos','2016-09-22',1,'2020-11-26'),
	(26,'Zseni','Kandúr','Kicsi','Foltos','2022-10-19',0,'2023-03-05'),
	(27,'Vakarcs','Kandúr','Nagy','Foltos','2014-12-06',1,'2020-08-14'),
	(28,'Tobi','Kandúr','Nagy','Szürke','2021-02-22',0,'2022-09-17'),
	(29,'Szafi','Nőstény','Nagy','Fehér','2022-11-21',0,'2023-03-25'),
	(30,'Pamacs','Kandúr','Nagy','Foltos','2018-06-20',1,'2021-07-26'),
	(31,'Leila','Nőstény','Nagy','Tigris','2022-01-15',1,'2022-10-09'),
	(32,'Néró','Kandúr','Nagy','Cirmos','2021-09-10',0,'2022-07-09'),
	(33,'Jack','Kandúr','Kicsi','Fekete','2022-06-27',0,'2022-11-27'),
	(34,'Alex','Kandúr','Nagy','Fekete','2021-07-18',0,'2022-12-06'),
	(35,'Félix','Kandúr','Közepes','Fekete','2021-04-15',0,'2022-08-19'),
	(36,'Gyümi','Nőstény','Nagy','Arany','2017-11-13',1,'2020-10-12'),
	(37,'Rumci','Kandúr','Nagy','Szürke','2016-10-19',1,'2023-05-01'),
	(38,'Csizmás','Kandúr','Nagy','Szürke','2021-05-15',0,'2023-02-15'),
	(39,'Cirmi','Nőstény','Kicsi','Szürke','2022-05-12',0,'2022-11-06'),
	(40,'Picur','Nőstény','Nagy','Foltos','2021-11-02',1,'2022-08-16');

/*!40000 ALTER TABLE `Cats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Dogs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Dogs`;

CREATE TABLE `Dogs` (
  `Dog_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Dog_name` varchar(25) DEFAULT NULL,
  `Dog_sex` varchar(25) DEFAULT NULL,
  `Dog_size` varchar(25) DEFAULT NULL,
  `Dog_color` varchar(25) DEFAULT NULL,
  `Dog_type` varchar(25) DEFAULT NULL,
  `Dog_birth` date DEFAULT NULL,
  `Dog_castrated` tinyint(1) DEFAULT NULL,
  `Dog_Entry_date` date DEFAULT NULL,
  PRIMARY KEY (`Dog_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

LOCK TABLES `Dogs` WRITE;
/*!40000 ALTER TABLE `Dogs` DISABLE KEYS */;

INSERT INTO `Dogs` (`Dog_ID`, `Dog_name`, `Dog_sex`, `Dog_size`, `Dog_color`, `Dog_type`, `Dog_birth`, `Dog_castrated`, `Dog_Entry_date`)
VALUES
	(2,'Husi','Kan','Kicsi','Arany','Tacskó','2016-03-19',1,'2022-01-23'),
	(3,'Zseni','Szuka','Nagy','Foltos','Németjuhász','2018-05-15',1,'2021-11-12'),
	(4,'Nyomi','Kan','Kicsi','Zsemle','Golden Retriever','2022-07-20',0,'2022-12-04'),
	(5,'Gizi','Szuka','Nagy','Szürke','Husky','2020-02-12',0,'2021-05-25'),
	(6,'Buksi','Kan','Nagy','Fekete','Rottweiler','2013-08-09',0,'2023-04-27'),
	(7,'Joda','Kan','Közepes','Foltos','Staffordshire Bullrerrier','2018-11-20',1,'2022-10-25'),
	(8,'Gréta','Szuka','Nagy','Zsemle','Pitbull','2015-01-11',1,'2021-03-31'),
	(9,'Hektor','Kan','Közepes','Zsemle','Pembroke-i Welsh Corgi','2022-04-17',0,'2022-01-09'),
	(10,'Hetty','Szuka','Nagy','Fekete','Rottweiler','2019-06-11',0,'2022-10-16'),
	(11,'Hotch','Kan','Kicsi','Foltos','Keverék','2021-12-30',0,'2022-07-16'),
	(12,'Huba','Kan','Nagy','Arany','Golden Retriver','2019-10-26',1,'2022-11-10'),
	(13,'Hugó','Kan','Kicsi','Zsemle','Golden Retriever','2022-08-18',0,'2023-01-17'),
	(14,'Iván','Kan','Közepes','Arany','Keverék','2017-02-20',1,'2020-01-15'),
	(15,'Jenna','Kan','Nagy','Barna','Afrikai Oroszlánkutya','2021-01-28',0,'2022-07-02'),
	(16,'Jimmy','Kan','Kicsi','Zsemle','Labrador','2022-08-12',0,'2022-10-23'),
	(17,'Jo','Kan','Közepes','Zsemle','Keverék','2020-05-12',1,'2020-07-08'),
	(18,'Jockey','Kan','Nagy','Zsemle','Golden Retriever','2019-03-27',1,'2023-03-13'),
	(19,'Johnnie','Kan','Közepes','Foltos','Beagle','2021-02-23',1,'2022-07-09'),
	(20,'Mancs','Kan','Közepes','Foltos','Angol Bulldog','2022-01-08',0,'2023-01-27'),
	(21,'Korki','Kan','Kicsi','Barna','Tacskó','2014-08-03',1,'2021-12-25'),
	(22,'Lajos','Kan','Nagy','Foltos','Berni Pásztorkutya','2016-10-16',1,'2021-12-25'),
	(23,'Larry','Kan','Kicsi','Zsemle','Pitbull','2022-08-11',0,'2023-04-16'),
	(24,'Lator','Kan','Nagy','Szürke','Német Vizsla','2018-12-22',0,'2021-06-13'),
	(25,'Lazy','Szuka','Nagy','Foltos','Ausztrál Juhászkutya','2018-03-21',1,'2021-08-24'),
	(26,'Lecsó','Kan','Kicsi','Zsemle','Törpespicc','2022-09-20',0,'2023-05-01'),
	(27,'Léda','Szuka','Közepes','Zsemle','Uszkár','2017-01-12',1,'2020-07-06'),
	(28,'Lekvár','Szuka','Nagy','Szürke','Corso','2022-01-17',0,'2022-01-23'),
	(29,'Léna','Szuka','Kicsi','Zsemle','Csivava','2022-01-10',0,'2022-02-14'),
	(30,'Bella','Szuka','Közepes','Foltos','Francia Bulldog','2021-03-15',0,'2021-12-21'),
	(31,'Bobby','Kan','Közepes','Barna','Spániel','2020-05-17',0,'2022-12-27'),
	(32,'Dennis','Kan','Nagy','Foltos','Spániel','2022-10-07',0,'2022-11-13'),
	(33,'Dior','Kan','Közepes','Foltos','Francia Bulldog','2019-07-08',1,'2021-02-17'),
	(34,'Dorka','Szuka','Nagy','Zsemle','Labrador','2016-11-27',1,'2020-12-25'),
	(35,'Fahéj','Kan','Kicsi','Foltos','Tacskó','2022-03-11',0,'2023-01-21'),
	(36,'Hope','Kan','Közepes','Foltos','Francia Bulddog','2018-09-28',1,'2020-08-12'),
	(37,'Jamie','Kan','Kicsi','Foltos','Yorkshire Terrier','2019-04-27',0,'2020-03-23'),
	(38,'Kevin','Kan','Nagy','Barna','Labrador','2020-02-09',0,'2022-12-15'),
	(39,'Lady','Szuka','Nagy','Foltos','Keverék','2019-09-14',1,'2020-07-16'),
	(40,'Málna','Szuka','Közepes','Foltos','Keverék','2018-12-26',1,'2023-04-15'),
	(41,'Dollár','Kan','Nagy','Fekete','Dobermann','2020-07-19',1,'2022-04-06');

/*!40000 ALTER TABLE `Dogs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Donation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Donation`;

CREATE TABLE `Donation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `veznev` varchar(50) DEFAULT NULL,
  `kernev` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `freq` int(1) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `amount` int(8) DEFAULT NULL,
  `donation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;



# Dump of table EventCandidates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `EventCandidates`;

CREATE TABLE `EventCandidates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eventID` int(11) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `people` int(1) DEFAULT NULL,
  `regdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;



# Dump of table Events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Events`;

CREATE TABLE `Events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `datefrom` date DEFAULT NULL,
  `dateto` date DEFAULT NULL,
  `datenote` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pricetext` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timefrom` time DEFAULT NULL,
  `timeto` time DEFAULT NULL,
  `note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `host` varchar(30) DEFAULT NULL,
  `availmin` int(11) DEFAULT NULL,
  `availmax` int(5) DEFAULT NULL,
  `picture` varchar(30) DEFAULT NULL,
  `online` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

LOCK TABLES `Events` WRITE;
/*!40000 ALTER TABLE `Events` DISABLE KEYS */;

INSERT INTO `Events` (`id`, `title`, `datefrom`, `dateto`, `datenote`, `pricetext`, `timefrom`, `timeto`, `note`, `host`, `availmin`, `availmax`, `picture`, `online`)
VALUES
	(1,'Nyílt nap','2023-06-30','2023-06-30',NULL,'','08:00:00','16:00:00','Ingyenes esemény','Kozma Patrícia',0,59,'ese1.jpg',0),
	(2,'Közös séta','2023-07-02','2023-07-02',NULL,'1000 HUF - támogatói ár','13:00:00','15:00:00','Jegyet a helyszínen lehet váltani','Pataki Máté',0,59,'ese2.jpg',0),
	(3,'Szépségverseny','2023-08-22','2023-08-23',NULL,'2500 HUF / nap - 3000 HUF / nevezés','10:00:00','14:00:00','Jegyet a helyszínen lehet váltani','Bodnár Liza',0,59,'ese3.webp',0),
	(4,'Kutyaovi','2021-07-14',NULL,NULL,'1200 HUF / óra','08:00:00','18:00:00','Szolgáltatás az irodánkban igényelhető','Pataki Máté',2,59,'ese4.jpeg',0),
	(5,'Önkéntességi vizsga','2021-07-25',NULL,'2 hetente szombaton','6400 HUF',NULL,NULL,'Irodánkban / telefonon érdeklődjön','Fehér Zoltán',0,59,'ese5.jpg',0),
	(6,'Akadályverseny','2023-09-18','2023-09-19',NULL,'1900 HUF / nap - 2100 HUF / nevezés','10:00:00','16:00:00','Jegyet a helyszínen vagy irodánkban lehet váltani','Kiss Viktor',0,60,'ese6.jpg',1);

/*!40000 ALTER TABLE `Events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table opening_hours
# ------------------------------------------------------------

DROP TABLE IF EXISTS `opening_hours`;

CREATE TABLE `opening_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day_of_week` varchar(9) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

LOCK TABLES `opening_hours` WRITE;
/*!40000 ALTER TABLE `opening_hours` DISABLE KEYS */;

INSERT INTO `opening_hours` (`id`, `day_of_week`, `open_time`, `close_time`)
VALUES
	(1,'Sunday','08:00:00','20:00:00');

/*!40000 ALTER TABLE `opening_hours` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `Users_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Users_email` varchar(50) DEFAULT NULL,
  `Users_password` varchar(32) DEFAULT NULL,
  `Users_username` varchar(30) NOT NULL,
  `Users_name` varchar(255) NOT NULL,
  `Users_phone` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`Users_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
