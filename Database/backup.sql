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
  `AgreementDescription` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Supervised` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`AgreementUID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Agreement`
--

LOCK TABLES `Agreement` WRITE;
/*!40000 ALTER TABLE `Agreement` DISABLE KEYS */;
INSERT INTO `Agreement` VALUES (3,'raptor.kent.ac.uk/proj/co600/project/m04_bookit/Agreements/EEG_Agreement.txt',0),(4,'blahdeblah',0),(5,'fiddlediddle',1);
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
  `OwnerUID` int(11) DEFAULT NULL,
  `AssetTypeUID` int(11) DEFAULT NULL,
  `AssetDescription` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AssetCondition` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AssetImage` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AssetRestriction` int(11) DEFAULT NULL,
  `AssetInBasket` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`AssetUID`),
  KEY `AgreementUID` (`AgreementUID`),
  KEY `OwnerUID` (`OwnerUID`),
  KEY `AssetTypeUID` (`AssetTypeUID`),
  CONSTRAINT `Asset_ibfk_1` FOREIGN KEY (`AgreementUID`) REFERENCES `Agreement` (`AgreementUID`),
  CONSTRAINT `Asset_ibfk_2` FOREIGN KEY (`OwnerUID`) REFERENCES `Owner` (`OwnerUID`),
  CONSTRAINT `Asset_ibfk_3` FOREIGN KEY (`AssetTypeUID`) REFERENCES `AssetType` (`AssetTypeUID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Asset`
--

LOCK TABLES `Asset` WRITE;
/*!40000 ALTER TABLE `Asset` DISABLE KEYS */;
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
INSERT INTO `AssetType` VALUES (1,'Book'),(2,'Lego'),(3,'Pi'),(4,'Other');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GroupA`
--

LOCK TABLES `GroupA` WRITE;
/*!40000 ALTER TABLE `GroupA` DISABLE KEYS */;
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
  PRIMARY KEY (`LoanUID`),
  KEY `UserUID` (`UserUID`),
  CONSTRAINT `Loan_ibfk_1` FOREIGN KEY (`UserUID`) REFERENCES `User` (`UserUID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Loan`
--

LOCK TABLES `Loan` WRITE;
/*!40000 ALTER TABLE `Loan` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LoanContent`
--

LOCK TABLES `LoanContent` WRITE;
/*!40000 ALTER TABLE `LoanContent` DISABLE KEYS */;
/*!40000 ALTER TABLE `LoanContent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Owner`
--

DROP TABLE IF EXISTS `Owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Owner` (
  `OwnerUID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupUID` int(11) DEFAULT NULL,
  `OwnerLocation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerEmail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerFname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `StubAsset`
--

LOCK TABLES `StubAsset` WRITE;
/*!40000 ALTER TABLE `StubAsset` DISABLE KEYS */;
INSERT INTO `StubAsset` VALUES (8,'jd601','Raspberry Pi','images/items/pi.jpg',1),(9,'jd601','Raspberry Pi','images/items/pi.jpg',1),(10,'jd601','Raspberry Pi','images/items/pi.jpg',1),(11,'jd601','Book','images/items/books.jpg',2),(12,'jd601','Book','images/items/books.jpg',2),(13,'jd601','Book','images/items/books.jpg',2),(14,'jd601','Book','images/items/books.jpg',2),(15,'jd601','Book','images/items/books.jpg',2),(16,'jd601','Book','images/items/books.jpg',2),(17,'jd601','Book','images/items/books.jpg',2),(18,'jd601','Book','images/items/books.jpg',2),(19,'jd601','Book','images/items/books.jpg',2),(20,'jd601','Book','images/items/books.jpg',2),(21,'jd601','Raspberry Pi','images/items/pi.jpg',1),(22,'jd601','Raspberry Pi','images/items/pi.jpg',1),(23,'jd601','Raspberry Pi','images/items/pi.jpg',1),(24,'jd601','Raspberry Pi','images/items/pi.jpg',1),(25,'jd601','Raspberry Pi','images/items/pi.jpg',1),(26,'jd601','Lego','images/items/lego.jpg',3),(27,'jd601','Lego','images/items/lego.jpg',3),(28,'jd601','Lego','images/items/lego.jpg',3),(29,'jd601','Lego','images/items/lego.jpg',3),(30,'jd601','Lego','images/items/lego.jpg',3),(31,'jd601','Lego','images/items/lego.jpg',3),(32,'jd601','Lego','images/items/lego.jpg',3);
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

-- Dump completed on 2017-01-24 13:22:04
