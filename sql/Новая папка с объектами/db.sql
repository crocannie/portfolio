-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: portfolio
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achievements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `dateEvent` date NOT NULL,
  `idEventType` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `eventTitle` varchar(512) NOT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`),
  KEY `idEventType` (`idEventType`),
  KEY `idStatus` (`idStatus`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idDocument` (`idDocument`),
  CONSTRAINT `achievements_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`),
  CONSTRAINT `achievements_ibfk_2` FOREIGN KEY (`idEventType`) REFERENCES `eventType` (`id`),
  CONSTRAINT `achievements_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  CONSTRAINT `achievements_ibfk_4` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  CONSTRAINT `achievements_ibfk_5` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievements`
--

LOCK TABLES `achievements` WRITE;
/*!40000 ALTER TABLE `achievements` DISABLE KEYS */;
INSERT INTO `achievements` VALUES (28,'Предметная олимпиада по информационным системам «Университет будущего»','2015-10-10',2,2,'Университет будущего',2,63,47,''),(42,'adweyrtiyui;o','2016-02-10',1,1,'esrdytuykulk;l',1,NULL,47,'');
/*!40000 ALTER TABLE `achievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `achievementsKTD`
--

DROP TABLE IF EXISTS `achievementsKTD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achievementsKTD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idTypeContest` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStatus` (`idStatus`),
  KEY `idTypeContest` (`idTypeContest`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`),
  CONSTRAINT `achievementsKTD_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  CONSTRAINT `achievementsKTD_ibfk_2` FOREIGN KEY (`idTypeContest`) REFERENCES `eventType` (`id`),
  CONSTRAINT `achievementsKTD_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  CONSTRAINT `achievementsKTD_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  CONSTRAINT `achievementsKTD_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievementsKTD`
--

LOCK TABLES `achievementsKTD` WRITE;
/*!40000 ALTER TABLE `achievementsKTD` DISABLE KEYS */;
INSERT INTO `achievementsKTD` VALUES (1,'dfdhgf',2,3,2014,2,82,9),(2,'DFDDFFD',2,2,2014,2,58,9);
/*!40000 ALTER TABLE `achievementsKTD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `achievementsPresident`
--

DROP TABLE IF EXISTS `achievementsPresident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achievementsPresident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idDocument` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`),
  CONSTRAINT `achievementsPresident_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  CONSTRAINT `achievementsPresident_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievementsPresident`
--

LOCK TABLES `achievementsPresident` WRITE;
/*!40000 ALTER TABLE `achievementsPresident` DISABLE KEYS */;
/*!40000 ALTER TABLE `achievementsPresident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `achievementsSport`
--

DROP TABLE IF EXISTS `achievementsSport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achievementsSport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idTypeContest` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStatus` (`idStatus`),
  KEY `idTypeContest` (`idTypeContest`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`),
  CONSTRAINT `achievementsSport_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  CONSTRAINT `achievementsSport_ibfk_2` FOREIGN KEY (`idTypeContest`) REFERENCES `eventType` (`id`),
  CONSTRAINT `achievementsSport_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  CONSTRAINT `achievementsSport_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  CONSTRAINT `achievementsSport_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievementsSport`
--

LOCK TABLES `achievementsSport` WRITE;
/*!40000 ALTER TABLE `achievementsSport` DISABLE KEYS */;
INSERT INTO `achievementsSport` VALUES (1,'setryuiilo',1,1,2016,1,94,9);
/*!40000 ALTER TABLE `achievementsSport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idType` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `year` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `idAuthorship` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `volumePublication` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idType` (`idType`),
  KEY `idStatus` (`idStatus`),
  KEY `idAuthorship` (`idAuthorship`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `typeArticle` (`id`),
  CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`idAuthorship`) REFERENCES `authorship` (`id`),
  CONSTRAINT `articles_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  CONSTRAINT `articles_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (7,1,'АНАЛИЗ НОМЕНКЛАТУРЫ ПРОГРАММНЫХ СРЕДСТВ МАССОВОГО ИСПОЛЬЗОВАНИЯ, ПРИМЕНЯЕМЫХ В РОССИЙСКИХ ВУЗАХ(НА ПРИМЕРЕ АСТРАХАНСКОГО ГОСУДАР',2015,1,2,59,9,8,''),(8,2,'Фитоняшки',2015,2,1,98,9,10,''),(31,1,'Анализ деятельности ВУЗа',14,1,1,NULL,47,12,''),(36,1,'Олесячы',2,1,1,NULL,49,12,'uploads/DwQlMExPdCw.jpg'),(37,1,'dsssf',2,1,1,NULL,49,12,'uploads/DwQlMExPdCw.jpg'),(38,2,'zszs',3,2,2,NULL,49,12,'uploads/-качество-2015-новинка-ретро-дизайнер-супер-круглый-круг-очки-кошачий-глаз-полуободковые-женские-солнцезащитные-очки.jpg'),(44,1,'оквпвпв',1,1,1,NULL,47,3,'uploads/DwQlMExPdCw.jpg'),(45,2,'qwaszx',2015,1,2,NULL,47,44,'uploads/_вузов (вар_4).doc'),(46,2,'fheqcr',2002,1,1,NULL,47,3,'uploads/DwQlMExPdCw.jpg'),(47,2,'aesrdtuyio',2003,1,1,NULL,47,3,'uploads/1455823630-f4f213ad77f47231d3101561c87541de.jpeg'),(48,1,'hello',2016,1,1,NULL,47,3,'uploads/Снимок экрана 2016-03-17 в 12.07.28.png');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authorship`
--

DROP TABLE IF EXISTS `authorship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authorship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authorship`
--

LOCK TABLES `authorship` WRITE;
/*!40000 ALTER TABLE `authorship` DISABLE KEYS */;
INSERT INTO `authorship` VALUES (1,'без соавторства',NULL),(2,'в соавторстве',NULL);
/*!40000 ALTER TABLE `authorship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Астрахань'),(2,'Москва'),(3,'Волгоград');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `userFileName` varchar(256) NOT NULL,
  `tmpFileName` varchar(256) NOT NULL,
  `size` float NOT NULL,
  `location` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (57,9,'2Gorbacheva-Kharakteristika-MotPredstavlenie.docx','/tmp/php6vccIv',25468,'path/2Gorbacheva-Kharakteristika-MotPredstavlenie.docx'),(58,9,'home.php','/tmp/phpk112Rc',1557,'path/home.php'),(59,9,'mysql_diagram (1).doc','/tmp/phpM6l64V',315904,'path/mysql_diagram (1).doc'),(60,9,'2EADC40500000578-3328701-image-a-21_1448142077752.jpg','/tmp/phph5A4MW',41176,'path/2EADC40500000578-3328701-image-a-21_1448142077752.jpg'),(61,9,'2EADC40500000578-3328701-image-a-21_1448142077752.jpg','/tmp/phpmtoedT',41176,'path/2EADC40500000578-3328701-image-a-21_1448142077752.jpg'),(62,9,'2EADC40500000578-3328701-image-a-21_1448142077752.jpg','/tmp/phpPHviOW',41176,'path/2EADC40500000578-3328701-image-a-21_1448142077752.jpg'),(63,9,'7313W4QcBEk.jpg','/tmp/phpECEGiH',86610,'path/7313W4QcBEk.jpg'),(64,9,'full_ringattraction1.jpg','/tmp/phpZE5Hgq',275291,'path/full_ringattraction1.jpg'),(65,9,'pt4OS8057Bk.jpg','/tmp/phpvucjdJ',305923,'path/pt4OS8057Bk.jpg'),(66,9,'pt4OS8057Bk.jpg','/tmp/phpXir3xu',305923,'path/pt4OS8057Bk.jpg'),(67,9,'pt4OS8057Bk.jpg','/tmp/phpgSjvuG',305923,'path/pt4OS8057Bk.jpg'),(68,9,'pt4OS8057Bk.jpg','/tmp/phphTnkCr',305923,'path/pt4OS8057Bk.jpg'),(69,9,'pt4OS8057Bk.jpg','/tmp/phpnKvDdW',305923,'path/pt4OS8057Bk.jpg'),(70,9,'pt4OS8057Bk.jpg','/tmp/phpET9WnC',305923,'path/pt4OS8057Bk.jpg'),(71,9,'pt4OS8057Bk.jpg','/tmp/phpndhom3',305923,'path/pt4OS8057Bk.jpg'),(72,9,'full_ringattraction1.jpg','/tmp/phpoE90ME',275291,'path/full_ringattraction1.jpg'),(73,9,'pt4OS8057Bk.jpg','/tmp/phpRNrFvq',305923,'path/pt4OS8057Bk.jpg'),(74,9,'pt4OS8057Bk.jpg','/tmp/phpz2Qkko',305923,'path/pt4OS8057Bk.jpg'),(75,9,'pt4OS8057Bk.jpg','/tmp/phpKdFKaj',305923,'path/pt4OS8057Bk.jpg'),(76,9,'pt4OS8057Bk.jpg','/tmp/phptSP7kd',305923,'path/pt4OS8057Bk.jpg'),(77,9,'pt4OS8057Bk.jpg','/tmp/phpIoEPOu',305923,'path/pt4OS8057Bk.jpg'),(78,9,'pt4OS8057Bk.jpg','/tmp/phpOeKxRx',305923,'path/pt4OS8057Bk.jpg'),(79,9,'pt4OS8057Bk.jpg','/tmp/phpmez0n7',305923,'path/pt4OS8057Bk.jpg'),(80,9,'pt4OS8057Bk.jpg','/tmp/phpUl94ac',305923,'path/pt4OS8057Bk.jpg'),(81,9,'full_ringattraction1.jpg','/tmp/php8bU8o2',275291,'path/full_ringattraction1.jpg'),(82,9,'full_ringattraction1.jpg','/tmp/phpVm9uPa',275291,'path/full_ringattraction1.jpg'),(83,9,'full_ringattraction1.jpg','/tmp/phpdD1rKp',275291,'path/full_ringattraction1.jpg'),(84,9,'full_ringattraction1.jpg','/tmp/phpoz7YXZ',275291,'path/full_ringattraction1.jpg'),(85,9,'pt4OS8057Bk.jpg','/tmp/php1B0iSg',305923,'path/pt4OS8057Bk.jpg'),(86,9,'pt4OS8057Bk.jpg','/tmp/phpIirtOy',305923,'path/pt4OS8057Bk.jpg'),(87,9,'full_ringattraction1.jpg','/tmp/phpNiZSZV',275291,'path/full_ringattraction1.jpg'),(88,9,'full_ringattraction1.jpg','/tmp/phpvzr436',275291,'path/full_ringattraction1.jpg'),(89,9,'full_ringattraction1.jpg','/tmp/phpGWFW55',275291,'path/full_ringattraction1.jpg'),(90,9,'full_ringattraction1.jpg','/tmp/php9IRGl0',275291,'path/full_ringattraction1.jpg'),(91,9,'full_ringattraction1.jpg','/tmp/phpIzVH2M',275291,'path/full_ringattraction1.jpg'),(92,9,'pt4OS8057Bk.jpg','/tmp/phpQ0Zo9o',305923,'path/pt4OS8057Bk.jpg'),(93,9,'full_ringattraction1.jpg','/tmp/phpUA2mX5',275291,'path/full_ringattraction1.jpg'),(94,9,'pt4OS8057Bk.jpg','/tmp/phpiHjBNu',305923,'path/pt4OS8057Bk.jpg'),(95,9,'full_ringattraction1.jpg','/tmp/php8JATKv',275291,'path/full_ringattraction1.jpg'),(96,9,'pt4OS8057Bk.jpg','/tmp/phpBmff5b',305923,'path/pt4OS8057Bk.jpg'),(97,9,'full_ringattraction1.jpg','/tmp/php44b1HW',275291,'path/full_ringattraction1.jpg'),(98,9,'full_ringattraction1.jpg','/tmp/phptb9ojT',275291,'path/full_ringattraction1.jpg'),(99,9,'full_ringattraction1.jpg','/tmp/phphkNn4L',275291,'path/full_ringattraction1.jpg'),(100,9,'full_ringattraction1.jpg','/tmp/phpagpZGC',275291,'path/full_ringattraction1.jpg'),(101,9,'pt4OS8057Bk.jpg','/tmp/phpqfwdqJ',305923,'path/pt4OS8057Bk.jpg'),(102,9,'full_ringattraction1.jpg','/tmp/phpXVP4t4',275291,'path/full_ringattraction1.jpg'),(103,9,'pt4OS8057Bk.jpg','/tmp/phpowpPsz',305923,'path/pt4OS8057Bk.jpg'),(104,9,'pt4OS8057Bk.jpg','/tmp/phpRtSlFd',305923,'path/pt4OS8057Bk.jpg'),(105,9,'pt4OS8057Bk.jpg','/tmp/phpvVXKUE',305923,'path/pt4OS8057Bk.jpg'),(106,9,'pt4OS8057Bk.jpg','/tmp/phpcgF2wt',305923,'path/pt4OS8057Bk.jpg'),(107,9,'full_ringattraction1.jpg','/tmp/phpgdskHU',275291,'path/full_ringattraction1.jpg'),(108,9,'full_ringattraction1.jpg','/tmp/php867W5Z',275291,'path/full_ringattraction1.jpg'),(109,9,'full_ringattraction1.jpg','/tmp/phprkPzVC',275291,'path/full_ringattraction1.jpg'),(110,9,'full_ringattraction1.jpg','/tmp/phpdO8mLt',275291,'path/full_ringattraction1.jpg'),(111,9,'full_ringattraction1.jpg','/tmp/phpIxDy5F',275291,'path/full_ringattraction1.jpg'),(112,9,'full_ringattraction1.jpg','/tmp/phpR0OxN3',275291,'path/full_ringattraction1.jpg');
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventType`
--

DROP TABLE IF EXISTS `eventType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventType`
--

LOCK TABLES `eventType` WRITE;
/*!40000 ALTER TABLE `eventType` DISABLE KEYS */;
INSERT INTO `eventType` VALUES (1,'олимпиада'),(2,'соревнование'),(3,'программа');
/*!40000 ALTER TABLE `eventType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facultet`
--

DROP TABLE IF EXISTS `facultet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facultet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `idUniversity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUniversity` (`idUniversity`),
  CONSTRAINT `facultet_ibfk_1` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultet`
--

LOCK TABLES `facultet` WRITE;
/*!40000 ALTER TABLE `facultet` DISABLE KEYS */;
INSERT INTO `facultet` VALUES (1,'физико-технический',1),(2,'математики и информационных технологий',1),(3,'социальных коммуникаций',1),(4,'механико–математический',3),(5,'химический',3);
/*!40000 ALTER TABLE `facultet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grants`
--

DROP TABLE IF EXISTS `grants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameProject` varchar(512) DEFAULT NULL,
  `nameOrganization` varchar(512) DEFAULT NULL,
  `dateBegin` date DEFAULT NULL,
  `dateEnd` date DEFAULT NULL,
  `regNumberCitis` char(128) DEFAULT NULL,
  `regNumber` char(128) DEFAULT NULL,
  `idTypeContest` int(11) DEFAULT NULL,
  `idScienceDirection` int(11) DEFAULT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idTypeContest` (`idTypeContest`),
  KEY `idScienceDirection` (`idScienceDirection`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`),
  CONSTRAINT `grants_ibfk_1` FOREIGN KEY (`idTypeContest`) REFERENCES `typeContest` (`id`),
  CONSTRAINT `grants_ibfk_2` FOREIGN KEY (`idScienceDirection`) REFERENCES `scienceDirection` (`id`),
  CONSTRAINT `grants_ibfk_3` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  CONSTRAINT `grants_ibfk_4` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grants`
--

LOCK TABLES `grants` WRITE;
/*!40000 ALTER TABLE `grants` DISABLE KEYS */;
INSERT INTO `grants` VALUES (2,'победитель программы\r\n\"У.М.Н.И.К.\" Астинтех (2009)','УМНИК','2016-02-02','2016-02-10','dfghjkl','esrtyuio',1,2,71,47,''),(3,'грант УМНИК ','УМНИК','2016-02-08','2016-02-15','у454455','22435',3,NULL,97,9,''),(4,'dfdfdf','dfdffd','2016-02-02','2016-02-17','dfdf','dfdfdf',2,NULL,101,9,''),(5,'dgаропдл','esfsfsfsf','2016-03-01','2016-03-17','345678','3456789',1,4,NULL,47,NULL),(6,'esfd','jhhl','2016-03-10','2016-03-31','345678','3456789',1,8,NULL,47,'uploads/passwordResetToken.php');
/*!40000 ALTER TABLE `grants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ktdParticipation`
--

DROP TABLE IF EXISTS `ktdParticipation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ktdParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idDocument` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`),
  CONSTRAINT `ktdParticipation_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  CONSTRAINT `ktdParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ktdParticipation`
--

LOCK TABLES `ktdParticipation` WRITE;
/*!40000 ALTER TABLE `ktdParticipation` DISABLE KEYS */;
INSERT INTO `ktdParticipation` VALUES (3,'DFDF',1,57,9),(7,'werytuiy',4,93,9);
/*!40000 ALTER TABLE `ktdParticipation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1456829141),('m130524_201442_init',1456829163);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `napravlenie`
--

DROP TABLE IF EXISTS `napravlenie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `napravlenie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shifr` char(128) NOT NULL,
  `name` char(128) NOT NULL,
  `idFacultet` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idFacultet` (`idFacultet`),
  CONSTRAINT `napravlenie_ibfk_1` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `napravlenie`
--

LOCK TABLES `napravlenie` WRITE;
/*!40000 ALTER TABLE `napravlenie` DISABLE KEYS */;
INSERT INTO `napravlenie` VALUES (1,'03.03.02','Физика',1),(2,'15.03.01','Машиностроение',1),(3,'01.03.02','Прикладная математика и информатика',2),(4,'10.03.01','Информационная безопасность',2),(5,'01.05.01','Фундаментальная математика и механика',4),(6,'04.05.01','Фундаментальная и прикладная химия',5);
/*!40000 ALTER TABLE `napravlenie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patents`
--

DROP TABLE IF EXISTS `patents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `idTypePatent` int(11) DEFAULT NULL,
  `copyrightHolder` varchar(512) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `dateApp` date DEFAULT NULL,
  `dateReg` date DEFAULT NULL,
  `regNumber` int(11) DEFAULT NULL,
  `appNumber` int(11) DEFAULT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTypePatent` (`idTypePatent`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`),
  KEY `status` (`status`),
  CONSTRAINT `patents_ibfk_1` FOREIGN KEY (`idTypePatent`) REFERENCES `typePatent` (`id`),
  CONSTRAINT `patents_ibfk_2` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  CONSTRAINT `patents_ibfk_3` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`),
  CONSTRAINT `patents_ibfk_4` FOREIGN KEY (`status`) REFERENCES `statusPatent` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patents`
--

LOCK TABLES `patents` WRITE;
/*!40000 ALTER TABLE `patents` DISABLE KEYS */;
/*!40000 ALTER TABLE `patents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicPerformance`
--

DROP TABLE IF EXISTS `publicPerformance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicPerformance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idTypePublicPerformance` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStatus` (`idStatus`),
  KEY `idTypePublicPerformance` (`idTypePublicPerformance`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`),
  CONSTRAINT `publicPerformance_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  CONSTRAINT `publicPerformance_ibfk_2` FOREIGN KEY (`idTypePublicPerformance`) REFERENCES `typePublicPerformance` (`id`),
  CONSTRAINT `publicPerformance_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  CONSTRAINT `publicPerformance_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  CONSTRAINT `publicPerformance_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicPerformance`
--

LOCK TABLES `publicPerformance` WRITE;
/*!40000 ALTER TABLE `publicPerformance` DISABLE KEYS */;
INSERT INTO `publicPerformance` VALUES (1,'ыпреолргшж',1,1,2016,1,86,9);
/*!40000 ALTER TABLE `publicPerformance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rni`
--

DROP TABLE IF EXISTS `rni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  `r2` double NOT NULL,
  `r3` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`),
  CONSTRAINT `rni_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rni`
--

LOCK TABLES `rni` WRITE;
/*!40000 ALTER TABLE `rni` DISABLE KEYS */;
/*!40000 ALTER TABLE `rni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ru`
--

DROP TABLE IF EXISTS `ru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ru` (
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  PRIMARY KEY (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ru`
--

LOCK TABLES `ru` WRITE;
/*!40000 ALTER TABLE `ru` DISABLE KEYS */;
INSERT INTO `ru` VALUES (9,110);
/*!40000 ALTER TABLE `ru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scienceDirection`
--

DROP TABLE IF EXISTS `scienceDirection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scienceDirection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scienceDirection`
--

LOCK TABLES `scienceDirection` WRITE;
/*!40000 ALTER TABLE `scienceDirection` DISABLE KEYS */;
INSERT INTO `scienceDirection` VALUES (1,'Безопасность и противодействие терроризму',NULL),(2,'Индустрия наносистем',NULL),(3,'Информационно-телекоммуникационные системы',NULL),(4,'Науки о жизни',NULL),(5,'Перспективные  виды  вооружения,  военной   и   специальной\r\nтехники',NULL),(6,'Рациональное природопользование',NULL),(7,'Робототехнические     комплексы    (системы)    военного,\r\nспециального и двойного назначения',NULL),(8,'Транспортные и космические системы',NULL),(9,'Энергоэффективность, энергосбережение, ядерная энергетика',NULL);
/*!40000 ALTER TABLE `scienceDirection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgroup`
--

DROP TABLE IF EXISTS `sgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `idNapravlenie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idNapravlenie` (`idNapravlenie`),
  CONSTRAINT `sgroup_ibfk_1` FOREIGN KEY (`idNapravlenie`) REFERENCES `napravlenie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgroup`
--

LOCK TABLES `sgroup` WRITE;
/*!40000 ALTER TABLE `sgroup` DISABLE KEYS */;
INSERT INTO `sgroup` VALUES (1,'ЗИ',4),(2,'ТС',1),(3,'ХИ',5);
/*!40000 ALTER TABLE `sgroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socialParticipation`
--

DROP TABLE IF EXISTS `socialParticipation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `socialParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSocialParticipationType` int(11) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idDocument` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`),
  CONSTRAINT `socialParticipation_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  CONSTRAINT `socialParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socialParticipation`
--

LOCK TABLES `socialParticipation` WRITE;
/*!40000 ALTER TABLE `socialParticipation` DISABLE KEYS */;
INSERT INTO `socialParticipation` VALUES (9,1,'Акция',1,100,9);
/*!40000 ALTER TABLE `socialParticipation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sportParticipation`
--

DROP TABLE IF EXISTS `sportParticipation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sportParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idDocument` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`),
  CONSTRAINT `sportParticipation_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  CONSTRAINT `sportParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sportParticipation`
--

LOCK TABLES `sportParticipation` WRITE;
/*!40000 ALTER TABLE `sportParticipation` DISABLE KEYS */;
INSERT INTO `sportParticipation` VALUES (1,'kkjlj;k',9,96,9);
/*!40000 ALTER TABLE `sportParticipation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusEvent`
--

DROP TABLE IF EXISTS `statusEvent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statusEvent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusEvent`
--

LOCK TABLES `statusEvent` WRITE;
/*!40000 ALTER TABLE `statusEvent` DISABLE KEYS */;
INSERT INTO `statusEvent` VALUES (1,'международное',10),(2,'региональное',5);
/*!40000 ALTER TABLE `statusEvent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusPatent`
--

DROP TABLE IF EXISTS `statusPatent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statusPatent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusPatent`
--

LOCK TABLES `statusPatent` WRITE;
/*!40000 ALTER TABLE `statusPatent` DISABLE KEYS */;
INSERT INTO `statusPatent` VALUES (1,'Отправлена заявка',NULL),(2,'Получен сертификат',NULL);
/*!40000 ALTER TABLE `statusPatent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secondName` char(64) DEFAULT NULL,
  `firstName` char(64) DEFAULT NULL,
  `midleName` char(64) DEFAULT NULL,
  `idCity` int(11) DEFAULT NULL,
  `idUniversity` int(11) DEFAULT NULL,
  `idFacultet` int(11) DEFAULT NULL,
  `idNapravlenie` int(11) DEFAULT NULL,
  `idGroup` int(11) DEFAULT NULL,
  `email` char(64) NOT NULL,
  `password` char(64) NOT NULL,
  `registrationCode` char(64) DEFAULT NULL,
  `login` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCity` (`idCity`),
  KEY `idUniversity` (`idUniversity`),
  KEY `idFacultet` (`idFacultet`),
  KEY `idNapravlenie` (`idNapravlenie`),
  KEY `idGroup` (`idGroup`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`),
  CONSTRAINT `students_ibfk_2` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`),
  CONSTRAINT `students_ibfk_3` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`),
  CONSTRAINT `students_ibfk_4` FOREIGN KEY (`idNapravlenie`) REFERENCES `napravlenie` (`id`),
  CONSTRAINT `students_ibfk_5` FOREIGN KEY (`idGroup`) REFERENCES `sgroup` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (9,'Петрова','Иван','Иванович',1,1,2,3,NULL,'qwaszx@gmail.com','376c43878878ac04e05946ec1dd7a55f','',0,0),(47,'Алехин','Михаил','Владимирович',2,3,4,5,3,'a1@gmail.com','$2y$13$6zOM.ekj38y64VKR.Nj1FubPN.aXV36wzsMPVmuliXWVeHa4b9FWS',NULL,NULL,NULL),(48,'Петрова','София','Владимировна',1,1,1,1,2,'a2@gmail.com','qwaszx',NULL,NULL,NULL),(49,'Овсяенко','Маргарита','Алексеевна',1,1,1,1,2,'a3@gmail.com','$2y$13$w/gcArQ6hbsWuUlVKMM/4.KQwXDx9EhgJMAoxvlwFBB8/aQynn7X2',NULL,NULL,NULL),(50,'Иванов','София','DFHGHL',1,1,1,1,2,'a4@gmail.com','$2y$13$RujcYERNnsdHSRc8IYYOMOodYJutQTGyaI3BlKX4sYQ/mO5m4NgOO',NULL,NULL,NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeArticle`
--

DROP TABLE IF EXISTS `typeArticle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeArticle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeArticle`
--

LOCK TABLES `typeArticle` WRITE;
/*!40000 ALTER TABLE `typeArticle` DISABLE KEYS */;
INSERT INTO `typeArticle` VALUES (1,'статья в журнале',90),(2,'тезисы докладов',70);
/*!40000 ALTER TABLE `typeArticle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeContest`
--

DROP TABLE IF EXISTS `typeContest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeContest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeContest`
--

LOCK TABLES `typeContest` WRITE;
/*!40000 ALTER TABLE `typeContest` DISABLE KEYS */;
INSERT INTO `typeContest` VALUES (1,'Издание монографии, учебника и т.д.',NULL),(2,'Инициативные проекты',NULL),(3,'Ориентированные фундаментальные исследования',NULL),(4,'Проведение конференции',NULL),(5,'Участие в конференции',NULL),(6,'Формирование тематики',NULL),(7,'Прочее',NULL);
/*!40000 ALTER TABLE `typeContest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeDocument`
--

DROP TABLE IF EXISTS `typeDocument`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeDocument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeDocument`
--

LOCK TABLES `typeDocument` WRITE;
/*!40000 ALTER TABLE `typeDocument` DISABLE KEYS */;
INSERT INTO `typeDocument` VALUES (1,'диплом 1 степени',NULL),(2,'диплом 2 степени',NULL);
/*!40000 ALTER TABLE `typeDocument` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typePatent`
--

DROP TABLE IF EXISTS `typePatent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typePatent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typePatent`
--

LOCK TABLES `typePatent` WRITE;
/*!40000 ALTER TABLE `typePatent` DISABLE KEYS */;
INSERT INTO `typePatent` VALUES (1,'Изобретения',NULL),(2,'Полезные модели',NULL),(3,'Промышленные образцы',NULL),(4,'База данных',NULL),(5,'Наименование места происхождения товара',NULL),(6,'Программа для ЭВМ',NULL),(7,'Товарные знаки и знаки обслуживания',NULL);
/*!40000 ALTER TABLE `typePatent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typePublicPerformance`
--

DROP TABLE IF EXISTS `typePublicPerformance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typePublicPerformance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typePublicPerformance`
--

LOCK TABLES `typePublicPerformance` WRITE;
/*!40000 ALTER TABLE `typePublicPerformance` DISABLE KEYS */;
INSERT INTO `typePublicPerformance` VALUES (1,'литературное произведение',NULL),(2,'драматическое произведение',NULL),(3,'музыкально-драматическое произведение',NULL),(4,'сценарное произведение',NULL),(5,'хореографическое произведение',NULL),(6,'пантомимы',NULL),(7,'музыкальное произведение с текстом или\r\nбез текста',NULL),(8,'аудиовизуальное произведение',NULL),(9,'произведения живописи',NULL),(10,'скульптуры',NULL),(11,'графика',NULL),(12,'дизайн',NULL),(13,'графический рассказ',NULL),(14,'комикс',NULL),(15,'другое произведение изобразительного\r\nискусства',NULL),(16,'произведение декоративно-прикладного\r\nискусства',NULL),(17,'сценографическое искусство',NULL),(18,'произведение архитектуры',NULL),(19,'градостроительство',NULL),(20,'садово-парковое искусство',NULL),(21,'проект',NULL),(22,'чертеж',NULL),(23,'изображения',NULL),(24,'макета',NULL),(25,'фотографическое произведение',NULL),(26,'произведение, полученное способом,\r\nаналогичным фотографии',NULL),(27,'географическая карта',NULL),(28,'геологическая карта',NULL),(29,'другая карта',NULL),(30,'план',NULL),(31,'эскиз',NULL),(32,'пластическое произведение, относящееся к\r\nгеографии',NULL),(33,'пластическое произведение, относящееся к\r\nтопографии',NULL),(34,'пластическое произведение, относящееся к\r\nдругим наукам',NULL),(35,'другое произведение',NULL);
/*!40000 ALTER TABLE `typePublicPerformance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeSocialParticipation`
--

DROP TABLE IF EXISTS `typeSocialParticipation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeSocialParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeSocialParticipation`
--

LOCK TABLES `typeSocialParticipation` WRITE;
/*!40000 ALTER TABLE `typeSocialParticipation` DISABLE KEYS */;
INSERT INTO `typeSocialParticipation` VALUES (1,'Социально ориентированные, культурные\r\n(культурно-просветительские, культурно-\r\nвоспитательные) деятельности в форме\r\nшефской помощи, благотворительных акций и\r\nиных подобных формах',NULL),(2,'Общественная\r\nдеятельность, направленная на пропаганду\r\nобщечеловеческих ценностей, уважения к\r\nправам и свободам человека, а также на защиту\r\nприроды',NULL),(3,'Общественно значимые культурно-массовые\r\nмероприятия',NULL),(4,'Деятельности по информационному\nобеспечению общественно значимых\nмероприятий, общественной жизни учреждения\nвысшего профессионального образования (в\nразработке сайта учреждения высшего\nпрофессионального образования, организации и\nобеспечении деятельн',NULL),(5,'Деятельность по информационному\nобеспечению общественно значимых\nмероприятий, общественной жизни учреждения\nвысшего профессионального образования ',NULL);
/*!40000 ALTER TABLE `typeSocialParticipation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universities`
--

DROP TABLE IF EXISTS `universities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `universities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `idCity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCity` (`idCity`),
  CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universities`
--

LOCK TABLES `universities` WRITE;
/*!40000 ALTER TABLE `universities` DISABLE KEYS */;
INSERT INTO `universities` VALUES (1,'Астраханский государственный университет',1),(2,'Астраханский Государственный Технический Университет',1),(3,'Московский государственный университет',2),(4,'Московский гуманитарный университет',2),(5,'Волгоградский государственный университет',3),(6,'Волгоградский государственный технический университет',3);
/*!40000 ALTER TABLE `universities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'qtrt','Lql-BAgssiMDTP8ZI0GtpE0AEmkK5MMb','$2y$13$j249ngPXYzf2wNip/7pDwePFntn2tROptuG3Rr60I0.uJhKrE28iu',NULL,'a007@gmail.com',10,1456829315,1456829315),(2,'qw','vTOD-3_kGuuUfkrreOyUuU-ki-AZv_ep','$2y$13$8Ub/4MDj0Gdu8u0JfxE/2OCSo1JUMZlk7/axB3gS8LwuTTppv.lZa',NULL,'a008@gmail.com',10,1456829845,1456829845);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `value`
--

DROP TABLE IF EXISTS `value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `value`
--

LOCK TABLES `value` WRITE;
/*!40000 ALTER TABLE `value` DISABLE KEYS */;
INSERT INTO `value` VALUES (1,'грант',90),(2,'патент',80);
/*!40000 ALTER TABLE `value` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-18 11:28:11
