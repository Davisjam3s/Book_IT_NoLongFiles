-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: dragon.kent.ac.uk    Database: m04_bookit
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `Agreement`
--

DROP TABLE IF EXISTS `Agreement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Agreement` (
  `AgreementUID` int(11) NOT NULL AUTO_INCREMENT,
  `AgreementDescription` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AgreementName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`AgreementUID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Agreement`
--

LOCK TABLES `Agreement` WRITE;
/*!40000 ALTER TABLE `Agreement` DISABLE KEYS */;
INSERT INTO `Agreement` VALUES (3,'ajax/Pages/Inventory/Agreements/EEG_Agreement.txt','EEG Agreement'),(4,'ajax/Pages/Inventory/Agreements/Ians_Agreement.txt','Ians Agreement'),(5,'ajax/Pages/Inventory/Agreements/Matteo_Agreement.txt','Matteo Agreement'),(6,'ajax/Pages/Inventory/Agreements/none.txt','None'),(26,'ajax/Pages/Inventory/Agreements/Matts_test_agreement.txt','Matts Test Agreement'),(30,'ajax/Pages/Inventory/Agreements/Matts_special_agreement.txt','matts very special agreement'),(31,'ajax/Pages/Inventory/Agreements/Matts_special_agreement3.txt','Matts even more special'),(32,'ajax/Pages/Inventory/Agreements/General Agreement.txt','General Agreement');
/*!40000 ALTER TABLE `Agreement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Asset`
--

DROP TABLE IF EXISTS `Asset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Asset` (
  `AssetUID` int(11) NOT NULL AUTO_INCREMENT,
  `AgreementUID` int(11) DEFAULT NULL,
  `OwnerUID` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AssetTypeUID` int(11) DEFAULT NULL,
  `AssetDescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AssetCondition` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AssetImage` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AssetRestriction` int(11) DEFAULT NULL,
  `AssetInBasket` tinyint(1) DEFAULT NULL,
  `AssetSupervised` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`AssetUID`),
  KEY `AgreementUID` (`AgreementUID`),
  KEY `OwnerUID` (`OwnerUID`),
  KEY `AssetTypeUID` (`AssetTypeUID`),
  CONSTRAINT `Asset_ibfk_1` FOREIGN KEY (`AgreementUID`) REFERENCES `Agreement` (`AgreementUID`),
  CONSTRAINT `Asset_ibfk_2` FOREIGN KEY (`OwnerUID`) REFERENCES `Owner` (`OwnerUID`),
  CONSTRAINT `Asset_ibfk_3` FOREIGN KEY (`AssetTypeUID`) REFERENCES `AssetType` (`AssetTypeUID`)
) ENGINE=InnoDB AUTO_INCREMENT=531 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Asset`
--

LOCK TABLES `Asset` WRITE;
/*!40000 ALTER TABLE `Asset` DISABLE KEYS */;
INSERT INTO `Asset` VALUES (485,6,'jd601',1,'HTML & CSS: Design and Build Web Sites','1','41Z2swEmwaL._SX396_BO1,204,203,200_.jpg',1,0,0),(486,6,'jd601',1,'Get Coding! Learn HTML, CSS, and JavaScript','1','51NKW5F7stL._SX441_BO1,204,203,200_.jpg',1,0,0),(487,6,'jd601',1,'PROGRAMMING For BEGINNERS','1','41zK+7W-zYL._SX331_BO1,204,203,200_.jpg',1,0,0),(488,6,'jd601',1,'Adobe Dreamweaver CCClassroom in a Book','1','51dwah9RGcL._SX398_BO1,204,203,200_.jpg',1,0,0),(489,6,'jd601',1,'Html: HTML & CSS: For Beginners:','1','51aNrxrIdtL.jpg',1,0,0),(490,6,'jd601',1,'Programming: Computer Programming For Beginners','1','517iFCgYSFL._SX331_BO1,204,203,200_.jpg',1,0,0),(491,6,'jd601',1,'C++: The Ultimate Crash Course to Learning the Basics ','1','41O0bhml1vL.jpg',1,0,0),(492,6,'jd601',1,'Python: Learn Python Programming','1','51b-ObEb3ML.jpg',1,0,0),(493,6,'jd601',1,'HTML5 in easy steps','1','51cXh98-VFL._SX401_BO1,204,203,200_.jpg',1,0,0),(495,6,'jd601',1,'Programming: HTML: Programming','1','412aGWpk7wL.jpg',1,0,0),(496,6,'jd601',1,'C Programming Language: A Step by Step Beginner\'s Guide','1','51brRiwC0ML._SX331_BO1,204,203,200_.jpg',1,0,0),(497,6,'jd601',1,'HTML and CSS: Visual QuickStart Guide ','1','514TTsUZ8uL._SX387_BO1,204,203,200_.jpg',1,0,0),(498,6,'jd601',1,'Advanced JAVA: For Beginners','1','41uN3C6izCL.jpg',1,0,0),(499,3,'jd601',4,'InteraXon Muse: the brain sensing headband ','1','71sOGEEFn1L._SL1500_.jpg',2,0,1),(500,3,'jd601',4,'BrainLink Lite EEG Headband','1','5157onxqppL._SL1064_.jpg',2,0,1),(501,3,'jd601',1,'InteraXon Muse The Brain Sensing Headband ','1','51JdQC7JYfL._SL1200_.jpg',2,0,1),(502,5,'mh708',3,'Raspberry Pi 3','1','pi3.jpg',1,0,0),(504,4,'mh708',3,'Lego Raspberry Pi','1','legopi.jpg',1,0,0),(505,6,'jd601',1,'Rick Astley Special','1','5124N7N+O0L._SX373_BO1,204,203,200_.jpg',4,0,0),(507,32,'mh708',3,'Raspberry Pi Kit','2','pikit.jpg',1,0,0),(509,6,'jd601',1,'Handbook of EEG Interpretation ','1','51UQsYSGKZL._SX355_BO1,204,203,200_.jpg',2,0,0),(512,6,'jd601',1,'The LEGO MINDSTORMS EV3 Discovery Book','1','51Bi0pYub8L._SX398_BO1,204,203,200_.jpg',1,0,0),(513,6,'mh708',3,'Raspberry Pi 3','1','pi3a.jpg',2,0,0),(515,6,'jd601',1,'The LEGO Power Functions Idea Book','1','51ML+7wxKSL._SX398_BO1,204,203,200_.jpg',1,0,0),(517,6,'jd601',2,' Click to open expanded view LEGO 31313 Mindstorms EV3','1','61JpQAMbLDL.jpg',2,0,0),(520,6,'jd601',1,'LEGO Technic 8293 Power Functions Motor Set','1','81kacHeRcbL._SL1500_.jpg',1,0,0),(521,4,'mh708',3,'Ultimate Pi3 Kit','1','megapikit.jpg',4,0,0),(524,6,'jd601',1,'Little Book of Excuses','1','41e7wgim+6L._SX344_BO1,204,203,200_.jpg',1,0,0),(525,5,'mh709',2,'Build Your Own Robot Arm','1','61IEdmLIaGL._SL1417_.png',1,0,0),(526,6,'jd601',1,'The Book of Big Excuses ','1','51o2JZvOE9L._SX315_BO1,204,203,200_.jpg',1,0,0),(527,6,'jd601',1,'The Complete Excuses Handbook','1','51DKJLCSblL._SX346_BO1,204,203,200_.jpg',1,0,0),(528,6,'jd601',1,'Git Pocket Guide ','1','41VaitbtWGL._SX302_BO1,204,203,200_.jpg',1,0,0),(529,6,'jd601',1,'Ry\'s Git Tutorial','1','41BMP+44bJL.jpg',1,0,0),(530,30,'mh708',4,'Easter Egg','4','easter egg.jpg',4,0,1);
/*!40000 ALTER TABLE `Asset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AssetType`
--

DROP TABLE IF EXISTS `AssetType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AssetType` (
  `AssetTypeUID` int(11) NOT NULL AUTO_INCREMENT,
  `AssetTypeDescription` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`AssetTypeUID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AssetType`
--

LOCK TABLES `AssetType` WRITE;
/*!40000 ALTER TABLE `AssetType` DISABLE KEYS */;
INSERT INTO `AssetType` VALUES (1,'Book'),(2,'Lego'),(3,'Pi'),(4,'EEG Headset');
/*!40000 ALTER TABLE `AssetType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GroupA`
--

DROP TABLE IF EXISTS `GroupA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GroupA` (
  `GroupUID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupDescription` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`GroupUID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GroupA`
--

LOCK TABLES `GroupA` WRITE;
/*!40000 ALTER TABLE `GroupA` DISABLE KEYS */;
INSERT INTO `GroupA` VALUES (1,'School of Computin'),(2,'Digital Humanities');
/*!40000 ALTER TABLE `GroupA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Loan`
--

DROP TABLE IF EXISTS `Loan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Loan` (
  `LoanUID` int(11) NOT NULL AUTO_INCREMENT,
  `UserUID` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LoanDate` date DEFAULT NULL,
  `LoanConfirm` int(11) DEFAULT NULL,
  PRIMARY KEY (`LoanUID`),
  KEY `UserUID` (`UserUID`),
  CONSTRAINT `Loan_ibfk_1` FOREIGN KEY (`UserUID`) REFERENCES `User` (`UserUID`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Loan`
--

LOCK TABLES `Loan` WRITE;
/*!40000 ALTER TABLE `Loan` DISABLE KEYS */;
INSERT INTO `Loan` VALUES (152,'mh708','2017-03-09',3),(155,'mh708','2017-03-09',2),(156,'mh708','2017-03-09',2),(184,'mh708','2017-03-16',0),(218,'mh708','2017-03-18',0),(219,'mh708','2017-03-18',3),(221,'cw561','2017-03-18',3),(222,'ke87','2017-03-24',2),(223,'mh708','2017-03-23',3),(224,'mh708','2017-03-19',3),(225,'mh708','2017-05-08',1),(226,'mh708','2017-03-22',0),(227,'jd601','2017-03-18',3),(228,'ao400','2017-03-20',3),(229,'mh709','2017-03-22',3),(230,'saf','2017-03-27',3),(231,'ac795','2017-03-22',3),(232,'ac795','2017-03-18',3),(234,'mh709','2017-03-19',3),(236,'mh709','2017-03-21',1);
/*!40000 ALTER TABLE `Loan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LoanContent`
--

DROP TABLE IF EXISTS `LoanContent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LoanContent` (
  `LoanContentUID` int(11) NOT NULL AUTO_INCREMENT,
  `LoanUID` int(11) DEFAULT NULL,
  `AssetUID` int(11) DEFAULT NULL,
  `setReturn` tinyint(1) DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL,
  PRIMARY KEY (`LoanContentUID`),
  KEY `LoanUID` (`LoanUID`),
  KEY `AssetUID` (`AssetUID`),
  CONSTRAINT `LoanContent_ibfk_1` FOREIGN KEY (`LoanUID`) REFERENCES `Loan` (`LoanUID`),
  CONSTRAINT `LoanContent_ibfk_2` FOREIGN KEY (`AssetUID`) REFERENCES `Asset` (`AssetUID`)
) ENGINE=InnoDB AUTO_INCREMENT=224 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LoanContent`
--

LOCK TABLES `LoanContent` WRITE;
/*!40000 ALTER TABLE `LoanContent` DISABLE KEYS */;
INSERT INTO `LoanContent` VALUES (206,219,485,0,'2017-03-25'),(209,222,509,0,'2017-03-28'),(210,223,502,0,'2017-03-25'),(211,224,507,0,'2017-03-23'),(212,225,526,1,'2017-05-15'),(213,226,524,1,'2017-03-29'),(218,231,489,0,'2017-03-26');
/*!40000 ALTER TABLE `LoanContent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Owner`
--

DROP TABLE IF EXISTS `Owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Owner` (
  `OwnerUID` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `GroupUID` int(11) DEFAULT NULL,
  `OwnerLocation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerEmail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`OwnerUID`),
  KEY `GroupUID` (`GroupUID`),
  CONSTRAINT `Owner_ibfk_1` FOREIGN KEY (`GroupUID`) REFERENCES `GroupA` (`GroupUID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Owner`
--

LOCK TABLES `Owner` WRITE;
/*!40000 ALTER TABLE `Owner` DISABLE KEYS */;
INSERT INTO `Owner` VALUES ('akj22',1,'M3-04','A.K.Jordanous@kent.ac.uk'),('jd601',1,'Lib','jd601@kent.ac.uk'),('mh708',1,'Edge of room','mh708@kent.ac.uk'),('mh709',1,'Edge of room','mh709@kent.ac.uk');
/*!40000 ALTER TABLE `Owner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `StubAsset`
--

DROP TABLE IF EXISTS `StubAsset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `StubAsset` (
  `AssetUID` int(11) NOT NULL AUTO_INCREMENT,
  `OwnerUID` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AssetDescription` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ItemType` int(11) DEFAULT NULL,
  PRIMARY KEY (`AssetUID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `StubAsset`
--

LOCK TABLES `StubAsset` WRITE;
/*!40000 ALTER TABLE `StubAsset` DISABLE KEYS */;
INSERT INTO `StubAsset` VALUES (8,'jd601','Raspberry Pi','images/items/pi.jpg',1),(9,'jd601','Raspberry Pi','images/items/pi.jpg',1),(10,'jd601','Raspberry Pi','images/items/pi.jpg',1),(11,'jd601','Book','images/items/books.jpg',2),(12,'jd601','Book','images/items/books.jpg',2),(13,'jd601','Book','images/items/books.jpg',2),(14,'jd601','Book','images/items/books.jpg',2),(15,'jd601','Book','images/items/books.jpg',2),(16,'jd601','Book','images/items/books.jpg',2),(17,'jd601','Book','images/items/books.jpg',2),(18,'jd601','Book','images/items/books.jpg',2),(19,'jd601','Book','images/items/books.jpg',2),(20,'jd601','Book','images/items/books.jpg',2),(21,'jd601','Raspberry Pi','images/items/pi.jpg',1),(22,'jd601','Raspberry Pi','images/items/pi.jpg',1),(23,'jd601','Raspberry Pi','images/items/pi.jpg',1),(24,'jd601','Raspberry Pi','images/items/pi.jpg',1),(25,'jd601','Raspberry Pi','images/items/pi.jpg',1),(26,'jd601','Lego','images/items/lego.jpg',3),(27,'jd601','Lego','images/items/lego.jpg',3),(28,'jd601','Lego','images/items/lego.jpg',3),(29,'jd601','Lego','images/items/lego.jpg',3),(30,'jd601','Lego','images/items/lego.jpg',3),(31,'jd601','Lego','images/items/lego.jpg',3),(32,'jd601','Lego','images/items/lego.jpg',3),(33,NULL,'dd','',NULL),(34,NULL,'dd','',NULL),(35,NULL,'grgf','',NULL),(36,NULL,'gggg','',NULL),(37,NULL,'ds','',NULL),(38,NULL,'gg','',NULL),(39,NULL,'fdfd','',NULL),(40,NULL,'fdfd','',NULL),(41,NULL,'g','',NULL),(42,NULL,'fgvff','',NULL),(43,NULL,'ffd','lego.jpg',NULL);
/*!40000 ALTER TABLE `StubAsset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `UserUID` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `UserTypeUID` int(11) DEFAULT NULL,
  `UserBanned` tinyint(1) DEFAULT NULL,
  `UserYear` int(11) DEFAULT NULL,
  `UserEmail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserFname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserCampus` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserAgreed` tinyint(1) DEFAULT NULL,
  `CurrentLoans` int(11) DEFAULT NULL,
  `IsOwner` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`UserUID`),
  KEY `UserTypeUID` (`UserTypeUID`),
  CONSTRAINT `User_ibfk_1` FOREIGN KEY (`UserTypeUID`) REFERENCES `UserType` (`UserTypeUID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('ac795',1,0,2,'ac795@kent.ac.uk','Anthony Carroll','2',1,2,0),('akj22',3,0,4,'A.K.Jordanous@kent.ac.uk','Anna Jordanous','2',0,NULL,0),('ao400',1,0,2,'ao400@kent.ac.uk','Anthony Onwuzurike','2',1,1,0),('cw561',1,0,3,'cw561@kent.ac.uk','Connor Waghorne','2',1,1,0),('dm458',1,0,3,'dm458@kent.ac.uk','Dave','1',0,NULL,0),('jd601',1,0,3,'jd601@kent.ac.uk','James Davis','2',1,1,1),('ke87',1,0,3,'ke87@kent.ac.uk','Derpa Derp','2',1,1,0),('mh708',1,0,3,'mh708@kent.ac.uk','Matt Hood','2',1,16,1),('mh709',1,0,3,'mh709@kent.ac.uk','Marie Hurkett','2',1,6,1),('saf',3,0,4,'S.A.Fincher@kent.ac.uk','Sally','1',1,1,0);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserType`
--

DROP TABLE IF EXISTS `UserType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserType` (
  `UserTypeUID` int(11) NOT NULL AUTO_INCREMENT,
  `UserTypeDescription` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`UserTypeUID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserType`
--

LOCK TABLES `UserType` WRITE;
/*!40000 ALTER TABLE `UserType` DISABLE KEYS */;
INSERT INTO `UserType` VALUES (1,'ugtstudent'),(2,'admin'),(3,'staff'),(4,'PostGrad');
/*!40000 ALTER TABLE `UserType` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-21 14:46:53
