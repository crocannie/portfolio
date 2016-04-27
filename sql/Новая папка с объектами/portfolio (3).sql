-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2016 at 12:22 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE IF NOT EXISTS `achievements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `dateEvent` date NOT NULL,
  `idEventType` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `eventTitle` varchar(512) NOT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`),
  KEY `idEventType` (`idEventType`),
  KEY `idStatus` (`idStatus`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idDocument` (`idDocument`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `name`, `dateEvent`, `idEventType`, `idStatus`, `eventTitle`, `idDocumentType`, `idDocument`, `idStudent`, `location`) VALUES
(97, 'ddss', '2016-03-04', 2, 2, 'ff', 1, NULL, 50, 'uploads/50/(lCq).png'),
(100, 'ddd', '2016-03-03', 1, 1, 'dd', 1, NULL, 50, 'uploads/50/(A1q).png'),
(104, 'вкпкппк', '2016-03-03', 1, 1, 'кпкп', 1, NULL, 50, 'uploads/50/a41a450b-6d6f-413d-a41b-68cc0bbc3f4a(0W5).jpg'),
(106, 'вмсвимипи', '2016-03-25', 2, 1, 'ввсв', 2, NULL, 50, 'uploads/50/a41a450b-6d6f-413d-a41b-68cc0bbc3f4a(UVK).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `achievementsKTD`
--

CREATE TABLE IF NOT EXISTS `achievementsKTD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idTypeContest` int(11) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStatus` (`idStatus`),
  KEY `idTypeContest` (`idTypeContest`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `achievementsKTD`
--

INSERT INTO `achievementsKTD` (`id`, `name`, `idStatus`, `idTypeContest`, `year`, `idDocumentType`, `idDocument`, `idStudent`, `location`) VALUES
(1, 'dfdhgf', 2, 3, '0000-00-00', 2, 82, 9, ''),
(2, 'DFDDFFD', 2, 2, '0000-00-00', 2, 58, 9, ''),
(3, '12121qwas', 1, 1, '1900-12-07', 1, NULL, 47, ''),
(4, '1qwas', 1, 1, '2016-03-01', 1, NULL, 47, ''),
(5, 'ячфыйц', 1, 1, '2016-03-01', 1, NULL, 47, ''),
(6, 'цыав', 1, 1, '2016-03-02', 1, NULL, 47, ''),
(7, 'цыав', 1, 1, '2016-03-02', 1, NULL, 47, 'uploads/gpBCxuEP73o.jpg'),
(8, 'wqwd', 1, 2, '2016-03-09', 2, NULL, 50, 'uploads/50/00main(NP6).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `achievementsPresident`
--

CREATE TABLE IF NOT EXISTS `achievementsPresident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idDocument` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `achievementsSport`
--

CREATE TABLE IF NOT EXISTS `achievementsSport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idTypeContest` int(11) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStatus` (`idStatus`),
  KEY `idTypeContest` (`idTypeContest`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `achievementsSport`
--

INSERT INTO `achievementsSport` (`id`, `name`, `idStatus`, `idTypeContest`, `year`, `idDocumentType`, `idDocument`, `idStudent`, `location`) VALUES
(1, 'setryuiilo', 1, 1, '0000-00-00', 1, 94, 50, ''),
(3, 'asdfg', 2, 2, '2016-03-01', 1, NULL, 50, 'uploads/requirements.php'),
(4, 'asdfg', 1, 2, '2016-03-01', 1, NULL, 47, 'uploads/requirements.php'),
(5, '21wd', 1, 1, '2016-03-15', 2, NULL, 47, 'uploads/fc80188118d699e73f8a56b25f97ff45.svg'),
(6, 'zxczxc', 1, 1, '2013-03-01', 1, NULL, 50, 'uploads/db.sql');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idType` int(11) NOT NULL,
  `name` char(255) NOT NULL,
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
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `idType`, `name`, `year`, `idStatus`, `idAuthorship`, `idDocument`, `idStudent`, `volumePublication`, `location`) VALUES
(7, 1, 'АНАЛИЗ НОМЕНКЛАТУРЫ ПРОГРАММНЫХ СРЕДСТВ МАССОВОГО ИСПОЛЬЗОВАНИЯ, ПРИМЕНЯЕМЫХ В РОССИЙСКИХ ВУЗАХ(НА ПРИМЕРЕ АСТРАХАНСКОГО ГОСУДАРddd', 2015, 1, 2, 59, 50, 8, ''),
(8, 2, 'Фитоняшки', 2015, 2, 1, 98, 50, 10, ''),
(31, 1, 'Анализ деятельности ВУЗа', 14, 1, 1, NULL, 47, 12, ''),
(36, 1, 'Олесячы', 2, 1, 1, NULL, 49, 12, 'uploads/DwQlMExPdCw.jpg'),
(37, 1, 'dsssf', 2, 1, 1, NULL, 49, 12, 'uploads/DwQlMExPdCw.jpg'),
(38, 2, 'zszs', 3, 2, 2, NULL, 49, 12, 'uploads/-качество-2015-новинка-ретро-дизайнер-супер-круглый-круг-очки-кошачий-глаз-полуободковые-женские-солнцезащитные-очки.jpg'),
(44, 1, 'оквпвпв', 1, 1, 1, NULL, 47, 3, 'uploads/DwQlMExPdCw.jpg'),
(45, 2, 'qwaszx', 2015, 1, 2, NULL, 47, 44, 'uploads/_вузов (вар_4).doc'),
(46, 2, 'fheqcr', 2002, 1, 1, NULL, 47, 3, 'uploads/DwQlMExPdCw.jpg'),
(47, 2, 'aesrdtuyio', 2003, 1, 1, NULL, 47, 3, 'uploads/1455823630-f4f213ad77f47231d3101561c87541de.jpeg'),
(48, 1, 'hello', 2016, 1, 1, NULL, 47, 3, 'uploads/Снимок экрана 2016-03-17 в 12.07.28.png');

-- --------------------------------------------------------

--
-- Table structure for table `authorship`
--

CREATE TABLE IF NOT EXISTS `authorship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `authorship`
--

INSERT INTO `authorship` (`id`, `name`, `value`) VALUES
(1, 'без соавторства', NULL),
(2, 'в соавторстве', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `auth_item_type_idx` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
(' moderator ', 1, 'Moderator ', 'group', NULL, 1459282593, 1459282593),
('admin', 1, 'Admin', 'group', NULL, 1459282593, 1459282593),
('superadmin', 1, 'Superadmin', 'group', NULL, 1459282593, 1459282593),
('user', 1, 'User', 'group', NULL, 1459282593, 1459282593);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', ' moderator '),
('superadmin', 'admin'),
(' moderator ', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('group', 'O:32:"common\\components\\rbac\\GroupRule":3:{s:4:"name";s:5:"group";s:9:"createdAt";i:1459282593;s:9:"updatedAt";i:1459282593;}', 1459282593, 1459282593);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Астрахань'),
(2, 'Москва'),
(3, 'Волгоград');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `userFileName` varchar(256) NOT NULL,
  `tmpFileName` varchar(256) NOT NULL,
  `size` float NOT NULL,
  `location` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `idStudent`, `userFileName`, `tmpFileName`, `size`, `location`) VALUES
(57, 9, '2Gorbacheva-Kharakteristika-MotPredstavlenie.docx', '/tmp/php6vccIv', 25468, 'path/2Gorbacheva-Kharakteristika-MotPredstavlenie.docx'),
(58, 9, 'home.php', '/tmp/phpk112Rc', 1557, 'path/home.php'),
(59, 9, 'mysql_diagram (1).doc', '/tmp/phpM6l64V', 315904, 'path/mysql_diagram (1).doc'),
(60, 9, '2EADC40500000578-3328701-image-a-21_1448142077752.jpg', '/tmp/phph5A4MW', 41176, 'path/2EADC40500000578-3328701-image-a-21_1448142077752.jpg'),
(61, 9, '2EADC40500000578-3328701-image-a-21_1448142077752.jpg', '/tmp/phpmtoedT', 41176, 'path/2EADC40500000578-3328701-image-a-21_1448142077752.jpg'),
(62, 9, '2EADC40500000578-3328701-image-a-21_1448142077752.jpg', '/tmp/phpPHviOW', 41176, 'path/2EADC40500000578-3328701-image-a-21_1448142077752.jpg'),
(63, 9, '7313W4QcBEk.jpg', '/tmp/phpECEGiH', 86610, 'path/7313W4QcBEk.jpg'),
(64, 9, 'full_ringattraction1.jpg', '/tmp/phpZE5Hgq', 275291, 'path/full_ringattraction1.jpg'),
(65, 9, 'pt4OS8057Bk.jpg', '/tmp/phpvucjdJ', 305923, 'path/pt4OS8057Bk.jpg'),
(66, 9, 'pt4OS8057Bk.jpg', '/tmp/phpXir3xu', 305923, 'path/pt4OS8057Bk.jpg'),
(67, 9, 'pt4OS8057Bk.jpg', '/tmp/phpgSjvuG', 305923, 'path/pt4OS8057Bk.jpg'),
(68, 9, 'pt4OS8057Bk.jpg', '/tmp/phphTnkCr', 305923, 'path/pt4OS8057Bk.jpg'),
(69, 9, 'pt4OS8057Bk.jpg', '/tmp/phpnKvDdW', 305923, 'path/pt4OS8057Bk.jpg'),
(70, 9, 'pt4OS8057Bk.jpg', '/tmp/phpET9WnC', 305923, 'path/pt4OS8057Bk.jpg'),
(71, 9, 'pt4OS8057Bk.jpg', '/tmp/phpndhom3', 305923, 'path/pt4OS8057Bk.jpg'),
(72, 9, 'full_ringattraction1.jpg', '/tmp/phpoE90ME', 275291, 'path/full_ringattraction1.jpg'),
(73, 9, 'pt4OS8057Bk.jpg', '/tmp/phpRNrFvq', 305923, 'path/pt4OS8057Bk.jpg'),
(74, 9, 'pt4OS8057Bk.jpg', '/tmp/phpz2Qkko', 305923, 'path/pt4OS8057Bk.jpg'),
(75, 9, 'pt4OS8057Bk.jpg', '/tmp/phpKdFKaj', 305923, 'path/pt4OS8057Bk.jpg'),
(76, 9, 'pt4OS8057Bk.jpg', '/tmp/phptSP7kd', 305923, 'path/pt4OS8057Bk.jpg'),
(77, 9, 'pt4OS8057Bk.jpg', '/tmp/phpIoEPOu', 305923, 'path/pt4OS8057Bk.jpg'),
(78, 9, 'pt4OS8057Bk.jpg', '/tmp/phpOeKxRx', 305923, 'path/pt4OS8057Bk.jpg'),
(79, 9, 'pt4OS8057Bk.jpg', '/tmp/phpmez0n7', 305923, 'path/pt4OS8057Bk.jpg'),
(80, 9, 'pt4OS8057Bk.jpg', '/tmp/phpUl94ac', 305923, 'path/pt4OS8057Bk.jpg'),
(81, 9, 'full_ringattraction1.jpg', '/tmp/php8bU8o2', 275291, 'path/full_ringattraction1.jpg'),
(82, 9, 'full_ringattraction1.jpg', '/tmp/phpVm9uPa', 275291, 'path/full_ringattraction1.jpg'),
(83, 9, 'full_ringattraction1.jpg', '/tmp/phpdD1rKp', 275291, 'path/full_ringattraction1.jpg'),
(84, 9, 'full_ringattraction1.jpg', '/tmp/phpoz7YXZ', 275291, 'path/full_ringattraction1.jpg'),
(85, 9, 'pt4OS8057Bk.jpg', '/tmp/php1B0iSg', 305923, 'path/pt4OS8057Bk.jpg'),
(86, 9, 'pt4OS8057Bk.jpg', '/tmp/phpIirtOy', 305923, 'path/pt4OS8057Bk.jpg'),
(87, 9, 'full_ringattraction1.jpg', '/tmp/phpNiZSZV', 275291, 'path/full_ringattraction1.jpg'),
(88, 9, 'full_ringattraction1.jpg', '/tmp/phpvzr436', 275291, 'path/full_ringattraction1.jpg'),
(89, 9, 'full_ringattraction1.jpg', '/tmp/phpGWFW55', 275291, 'path/full_ringattraction1.jpg'),
(90, 9, 'full_ringattraction1.jpg', '/tmp/php9IRGl0', 275291, 'path/full_ringattraction1.jpg'),
(91, 9, 'full_ringattraction1.jpg', '/tmp/phpIzVH2M', 275291, 'path/full_ringattraction1.jpg'),
(92, 9, 'pt4OS8057Bk.jpg', '/tmp/phpQ0Zo9o', 305923, 'path/pt4OS8057Bk.jpg'),
(93, 9, 'full_ringattraction1.jpg', '/tmp/phpUA2mX5', 275291, 'path/full_ringattraction1.jpg'),
(94, 9, 'pt4OS8057Bk.jpg', '/tmp/phpiHjBNu', 305923, 'path/pt4OS8057Bk.jpg'),
(95, 9, 'full_ringattraction1.jpg', '/tmp/php8JATKv', 275291, 'path/full_ringattraction1.jpg'),
(96, 9, 'pt4OS8057Bk.jpg', '/tmp/phpBmff5b', 305923, 'path/pt4OS8057Bk.jpg'),
(97, 9, 'full_ringattraction1.jpg', '/tmp/php44b1HW', 275291, 'path/full_ringattraction1.jpg'),
(98, 9, 'full_ringattraction1.jpg', '/tmp/phptb9ojT', 275291, 'path/full_ringattraction1.jpg'),
(99, 9, 'full_ringattraction1.jpg', '/tmp/phphkNn4L', 275291, 'path/full_ringattraction1.jpg'),
(100, 9, 'full_ringattraction1.jpg', '/tmp/phpagpZGC', 275291, 'path/full_ringattraction1.jpg'),
(101, 9, 'pt4OS8057Bk.jpg', '/tmp/phpqfwdqJ', 305923, 'path/pt4OS8057Bk.jpg'),
(102, 9, 'full_ringattraction1.jpg', '/tmp/phpXVP4t4', 275291, 'path/full_ringattraction1.jpg'),
(103, 9, 'pt4OS8057Bk.jpg', '/tmp/phpowpPsz', 305923, 'path/pt4OS8057Bk.jpg'),
(104, 9, 'pt4OS8057Bk.jpg', '/tmp/phpRtSlFd', 305923, 'path/pt4OS8057Bk.jpg'),
(105, 9, 'pt4OS8057Bk.jpg', '/tmp/phpvVXKUE', 305923, 'path/pt4OS8057Bk.jpg'),
(106, 9, 'pt4OS8057Bk.jpg', '/tmp/phpcgF2wt', 305923, 'path/pt4OS8057Bk.jpg'),
(107, 9, 'full_ringattraction1.jpg', '/tmp/phpgdskHU', 275291, 'path/full_ringattraction1.jpg'),
(108, 9, 'full_ringattraction1.jpg', '/tmp/php867W5Z', 275291, 'path/full_ringattraction1.jpg'),
(109, 9, 'full_ringattraction1.jpg', '/tmp/phprkPzVC', 275291, 'path/full_ringattraction1.jpg'),
(110, 9, 'full_ringattraction1.jpg', '/tmp/phpdO8mLt', 275291, 'path/full_ringattraction1.jpg'),
(111, 9, 'full_ringattraction1.jpg', '/tmp/phpIxDy5F', 275291, 'path/full_ringattraction1.jpg'),
(112, 9, 'full_ringattraction1.jpg', '/tmp/phpR0OxN3', 275291, 'path/full_ringattraction1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `educationLevel`
--

CREATE TABLE IF NOT EXISTS `educationLevel` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventType`
--

CREATE TABLE IF NOT EXISTS `eventType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `eventType`
--

INSERT INTO `eventType` (`id`, `name`, `value`) VALUES
(1, 'олимпиада', 10),
(2, 'соревнование', 5),
(3, 'программа', 2);

-- --------------------------------------------------------

--
-- Table structure for table `facultet`
--

CREATE TABLE IF NOT EXISTS `facultet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `idUniversity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUniversity` (`idUniversity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `facultet`
--

INSERT INTO `facultet` (`id`, `name`, `idUniversity`) VALUES
(1, 'физико-технический', 1),
(2, 'математики и информационных технологий', 1),
(3, 'социальных коммуникаций', 1),
(4, 'механико–математический', 3),
(5, 'химический', 3);

-- --------------------------------------------------------

--
-- Table structure for table `grants`
--

CREATE TABLE IF NOT EXISTS `grants` (
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
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `grants`
--

INSERT INTO `grants` (`id`, `nameProject`, `nameOrganization`, `dateBegin`, `dateEnd`, `regNumberCitis`, `regNumber`, `idTypeContest`, `idScienceDirection`, `idDocument`, `idStudent`, `location`) VALUES
(2, 'победитель программы\r\n"У.М.Н.И.К." Астинтех (2009)', 'УМНИК', '2016-02-02', '2016-02-10', 'dfghjkl', 'esrtyuio', 1, 2, 71, 47, ''),
(3, 'грант УМНИК ', 'УМНИК', '2016-02-08', '2016-02-15', 'у454455', '22435', 3, NULL, 97, 9, ''),
(4, 'dfdfdf', 'dfdffd', '2016-02-02', '2016-02-17', 'dfdf', 'dfdfdf', 2, NULL, 101, 9, ''),
(5, 'dgаропдл', 'esfsfsfsf', '2016-03-01', '2016-03-17', '345678', '3456789', 1, 4, NULL, 47, NULL),
(6, 'esfd', 'jhhl', '2016-03-10', '2016-03-31', '345678', '3456789', 1, 8, NULL, 50, 'uploads/passwordResetToken.php'),
(7, 'qwedw', 'gnhgfhb', '2016-03-01', '2016-03-04', '345678', '345678', 1, 4, NULL, 50, 'uploads/insert.sql'),
(8, 'qwqw', 'qwqwqw', '2016-03-02', '2016-03-08', '1221', '121212', 1, 1, NULL, 50, NULL),
(9, 'qwqw', 'qwqwqw', '2016-03-02', '2016-03-08', '1221', '121212', 1, 1, NULL, 50, 'uploads/50/25.jpg'),
(10, 'ssdf', 'dsff', '2016-03-04', '2016-03-05', 'dff', 'dsff', 3, 2, NULL, 50, 'uploads/50/DwQlMExPdCw.jpg'),
(11, 'ssd', 'sdsd', '2016-03-03', '2016-03-09', 'sddsd', 'sdsd', 2, 1, NULL, 50, 'uploads/50/a41a450b-6d6f-413d-a41b-68cc0bbc3f4a(t9U).jpg'),
(12, 'ываыва', 'ыаыа', '2016-03-03', '2016-03-03', 'выаа', 'ыаыа', 2, 1, NULL, 50, 'uploads/50/a41a450b-6d6f-413d-a41b-68cc0bbc3f4a(eMn).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ktdParticipation`
--

CREATE TABLE IF NOT EXISTS `ktdParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `location` varchar(512) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ktdParticipation`
--

INSERT INTO `ktdParticipation` (`id`, `description`, `count`, `date`, `location`, `idDocument`, `idStudent`) VALUES
(3, 'DFDF', 1, '0000-00-00', '', 57, 9),
(7, 'werytuiy', 4, '0000-00-00', '', 93, 47),
(8, '1234к', 1, '2016-03-01', '', NULL, 47),
(9, 'eihrukskjf', 1, '2016-03-01', 'uploads/README.md', NULL, 47);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1456829141),
('m130524_201442_init', 1456829163);

-- --------------------------------------------------------

--
-- Table structure for table `napravlenie`
--

CREATE TABLE IF NOT EXISTS `napravlenie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shifr` char(128) NOT NULL,
  `name` char(128) NOT NULL,
  `idFacultet` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idFacultet` (`idFacultet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `napravlenie`
--

INSERT INTO `napravlenie` (`id`, `shifr`, `name`, `idFacultet`) VALUES
(1, '03.03.02', 'Физика', 1),
(2, '15.03.01', 'Машиностроение', 1),
(3, '01.03.02', 'Прикладная математика и информатика', 2),
(4, '10.03.01', 'Информационная безопасность', 2),
(5, '01.05.01', 'Фундаментальная математика и механика', 4),
(6, '04.05.01', 'Фундаментальная и прикладная химия', 5);

-- --------------------------------------------------------

--
-- Table structure for table `patents`
--

CREATE TABLE IF NOT EXISTS `patents` (
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
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `patents`
--

INSERT INTO `patents` (`id`, `name`, `idTypePatent`, `copyrightHolder`, `description`, `status`, `dateApp`, `dateReg`, `regNumber`, `appNumber`, `idDocument`, `idStudent`, `location`) VALUES
(1, 'asdfgrgd', 1, 'ukhfgfbf', 'sadad', 1, '2016-03-02', '2016-03-10', 12345678, 9876543, NULL, 50, ''),
(2, '1asdfgrgd', 3, 'ukhfgfbf', 'ыааы', 2, '2016-03-02', '2016-03-10', 12345678, 9876543, NULL, 47, ''),
(3, '2asdfgrgd', 2, 'ukhfgfbf', 'выаыв', 1, '2016-03-02', '2016-03-10', 12345678, 9876543, NULL, 50, ''),
(4, '122323', 2, 'ukhfgfbf', 'выаыв', 1, '2016-03-02', '2016-03-10', 12345678, 9876543, NULL, 47, 'uploads/gpBCxuEP73o.jpg'),
(5, 'керно', 1, 'арвполо', '434556', 1, '2016-03-03', '2016-03-10', 122112, 12212, NULL, 50, ''),
(6, 'керно', 1, 'арвполо', '434556', 1, '2016-03-03', '2016-03-10', 122112, 12212, NULL, 50, 'uploads/50/san-francisco-twin-peaks-2565(UbJ).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `publicPerformance`
--

CREATE TABLE IF NOT EXISTS `publicPerformance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idTypePublicPerformance` int(11) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStatus` (`idStatus`),
  KEY `idTypePublicPerformance` (`idTypePublicPerformance`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `publicPerformance`
--

INSERT INTO `publicPerformance` (`id`, `name`, `idStatus`, `idTypePublicPerformance`, `year`, `idDocumentType`, `idDocument`, `idStudent`, `location`) VALUES
(1, 'ыпреолргшж', 1, 1, '0000-00-00', 1, 86, 9, ''),
(2, 'олк', 1, 2, '2016-03-01', 1, NULL, 47, ''),
(3, '5кам', 2, 4, '2016-03-02', 1, NULL, 47, 'uploads/composer.json');

-- --------------------------------------------------------

--
-- Table structure for table `ratingCulture`
--

CREATE TABLE IF NOT EXISTS `ratingCulture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  `r2` double NOT NULL,
  `r3` double NOT NULL,
  `status` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ratingScience`
--

CREATE TABLE IF NOT EXISTS `ratingScience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  `r2` double NOT NULL,
  `r3` double NOT NULL,
  `mark` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ratingSocial`
--

CREATE TABLE IF NOT EXISTS `ratingSocial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  `mark` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ratingSport`
--

CREATE TABLE IF NOT EXISTS `ratingSport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  `r2` double NOT NULL,
  `status` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ratingSport`
--

INSERT INTO `ratingSport` (`id`, `idStudent`, `r1`, `r2`, `status`, `mark`) VALUES
(2, 50, 15, 30, 1, 78);

-- --------------------------------------------------------

--
-- Table structure for table `ratingStudy`
--

CREATE TABLE IF NOT EXISTS `ratingStudy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  `mark` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ru`
--

CREATE TABLE IF NOT EXISTS `ru` (
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  PRIMARY KEY (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ru`
--

INSERT INTO `ru` (`idStudent`, `r1`) VALUES
(9, 110);

-- --------------------------------------------------------

--
-- Table structure for table `scienceDirection`
--

CREATE TABLE IF NOT EXISTS `scienceDirection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `scienceDirection`
--

INSERT INTO `scienceDirection` (`id`, `name`, `value`) VALUES
(1, 'Безопасность и противодействие терроризму', NULL),
(2, 'Индустрия наносистем', NULL),
(3, 'Информационно-телекоммуникационные системы', NULL),
(4, 'Науки о жизни', NULL),
(5, 'Перспективные  виды  вооружения,  военной   и   специальной\r\nтехники', NULL),
(6, 'Рациональное природопользование', NULL),
(7, 'Робототехнические     комплексы    (системы)    военного,\r\nспециального и двойного назначения', NULL),
(8, 'Транспортные и космические системы', NULL),
(9, 'Энергоэффективность, энергосбережение, ядерная энергетика', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sgroup`
--

CREATE TABLE IF NOT EXISTS `sgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `idNapravlenie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idNapravlenie` (`idNapravlenie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sgroup`
--

INSERT INTO `sgroup` (`id`, `name`, `idNapravlenie`) VALUES
(1, 'ЗИ', 4),
(2, 'ТС', 1),
(3, 'ХИ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `socialParticipation`
--

CREATE TABLE IF NOT EXISTS `socialParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSocialParticipationType` int(11) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `socialParticipation`
--

INSERT INTO `socialParticipation` (`id`, `idSocialParticipationType`, `description`, `count`, `date`, `idDocument`, `idStudent`, `location`) VALUES
(9, 1, 'Акция', 1, '0000-00-00', 100, 9, ''),
(10, 1, '1qwaszx', 3, '2016-03-01', NULL, 47, ''),
(11, 1, '2йцфыяч', 2, '2016-03-02', NULL, 47, ''),
(12, 1, '2йцфыяч', 2, '2016-03-02', NULL, 47, 'uploads/gpBCxuEP73o.jpg'),
(13, 2, '34qw', 3, '2016-03-09', NULL, 47, 'uploads/gpBCxuEP73o.jpg'),
(14, 1, 'effe', 1, '2016-03-09', NULL, 50, 'uploads/50/1. Основы создания Android-приложений(hL4).docx'),
(15, 1, 'sdsd', 1, '2016-03-04', NULL, 50, 'uploads/50/hEaiv6sLuKQ(Rxd).jpg'),
(16, 5, 'dfghjk', 8, '2016-03-02', NULL, 50, 'uploads/50/Screenshotfrom2016-03-2119:55:55(2KB).png');

-- --------------------------------------------------------

--
-- Table structure for table `sportParticipation`
--

CREATE TABLE IF NOT EXISTS `sportParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sportParticipation`
--

INSERT INTO `sportParticipation` (`id`, `description`, `count`, `date`, `idDocument`, `idStudent`, `location`) VALUES
(1, 'kkjlj;k', 9, '0000-00-00', 96, 9, ''),
(2, '3dde', 3, '2016-03-11', NULL, 50, 'uploads/yii.bat');

-- --------------------------------------------------------

--
-- Table structure for table `statusEvent`
--

CREATE TABLE IF NOT EXISTS `statusEvent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statusEvent`
--

INSERT INTO `statusEvent` (`id`, `name`, `value`) VALUES
(1, 'международное', 10),
(2, 'региональное', 5);

-- --------------------------------------------------------

--
-- Table structure for table `statusPatent`
--

CREATE TABLE IF NOT EXISTS `statusPatent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statusPatent`
--

INSERT INTO `statusPatent` (`id`, `name`, `value`) VALUES
(1, 'Отправлена заявка', NULL),
(2, 'Получен сертификат', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `idStudent` int(11) DEFAULT NULL,
  `secondName` char(64) NOT NULL,
  `firstName` char(64) NOT NULL,
  `midleName` char(64) NOT NULL,
  `idCity` int(11) DEFAULT NULL,
  `idUniversity` int(11) DEFAULT NULL,
  `idFacultet` int(11) DEFAULT NULL,
  `idLevel` int(11) NOT NULL,
  `kurs` int(11) DEFAULT NULL,
  `idNapravlenie` int(11) DEFAULT NULL,
  `idGroup` int(11) DEFAULT NULL,
  KEY `idCity` (`idCity`),
  KEY `idStudent` (`idStudent`),
  KEY `idFacultet` (`idFacultet`),
  KEY `idNapravlenie` (`idNapravlenie`),
  KEY `idGroup` (`idGroup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students1`
--

CREATE TABLE IF NOT EXISTS `students1` (
  `id` int(11) NOT NULL,
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
  KEY `idGroup` (`idGroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students1`
--

INSERT INTO `students1` (`id`, `secondName`, `firstName`, `midleName`, `idCity`, `idUniversity`, `idFacultet`, `idNapravlenie`, `idGroup`, `email`, `password`, `registrationCode`, `login`, `status`) VALUES
(9, 'Петрова', 'Иван', 'Иванович', 1, 1, 2, 3, NULL, 'qwaszx@gmail.com', '376c43878878ac04e05946ec1dd7a55f', '', 0, 0),
(47, 'Алехин', 'Михаил', 'Владимирович', 2, 3, 4, 5, 3, 'a1@gmail.com', '$2y$13$6zOM.ekj38y64VKR.Nj1FubPN.aXV36wzsMPVmuliXWVeHa4b9FWS', NULL, NULL, NULL),
(48, 'Петрова', 'София', 'Владимировна', 1, 1, 1, 1, 2, 'a2@gmail.com', 'qwaszx', NULL, NULL, NULL),
(49, 'Овсяенко', 'Маргарита', 'Алексеевна', 1, 1, 1, 1, 2, 'a3@gmail.com', '$2y$13$w/gcArQ6hbsWuUlVKMM/4.KQwXDx9EhgJMAoxvlwFBB8/aQynn7X2', NULL, NULL, NULL),
(50, 'Иванов', 'София', 'DFHGHL', 1, 1, 1, 1, 2, 'a4@gmail.com', '$2y$13$RujcYERNnsdHSRc8IYYOMOodYJutQTGyaI3BlKX4sYQ/mO5m4NgOO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `typeArticle`
--

CREATE TABLE IF NOT EXISTS `typeArticle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `typeArticle`
--

INSERT INTO `typeArticle` (`id`, `name`, `value`) VALUES
(1, 'статья в журнале', 90),
(2, 'тезисы докладов', 70);

-- --------------------------------------------------------

--
-- Table structure for table `typeContest`
--

CREATE TABLE IF NOT EXISTS `typeContest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `typeContest`
--

INSERT INTO `typeContest` (`id`, `name`, `value`) VALUES
(1, 'Издание монографии, учебника и т.д.', NULL),
(2, 'Инициативные проекты', NULL),
(3, 'Ориентированные фундаментальные исследования', NULL),
(4, 'Проведение конференции', NULL),
(5, 'Участие в конференции', NULL),
(6, 'Формирование тематики', NULL),
(7, 'Прочее', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `typeDocument`
--

CREATE TABLE IF NOT EXISTS `typeDocument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `typeDocument`
--

INSERT INTO `typeDocument` (`id`, `name`, `value`) VALUES
(1, 'диплом 1 степени', 10),
(2, 'диплом 2 степени', 5);

-- --------------------------------------------------------

--
-- Table structure for table `typePatent`
--

CREATE TABLE IF NOT EXISTS `typePatent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `typePatent`
--

INSERT INTO `typePatent` (`id`, `name`, `value`) VALUES
(1, 'Изобретения', NULL),
(2, 'Полезные модели', NULL),
(3, 'Промышленные образцы', NULL),
(4, 'База данных', NULL),
(5, 'Наименование места происхождения товара', NULL),
(6, 'Программа для ЭВМ', NULL),
(7, 'Товарные знаки и знаки обслуживания', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `typePublicPerformance`
--

CREATE TABLE IF NOT EXISTS `typePublicPerformance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `typePublicPerformance`
--

INSERT INTO `typePublicPerformance` (`id`, `name`, `value`) VALUES
(1, 'литературное произведение', NULL),
(2, 'драматическое произведение', NULL),
(3, 'музыкально-драматическое произведение', NULL),
(4, 'сценарное произведение', NULL),
(5, 'хореографическое произведение', NULL),
(6, 'пантомимы', NULL),
(7, 'музыкальное произведение с текстом или\r\nбез текста', NULL),
(8, 'аудиовизуальное произведение', NULL),
(9, 'произведения живописи', NULL),
(10, 'скульптуры', NULL),
(11, 'графика', NULL),
(12, 'дизайн', NULL),
(13, 'графический рассказ', NULL),
(14, 'комикс', NULL),
(15, 'другое произведение изобразительного\r\nискусства', NULL),
(16, 'произведение декоративно-прикладного\r\nискусства', NULL),
(17, 'сценографическое искусство', NULL),
(18, 'произведение архитектуры', NULL),
(19, 'градостроительство', NULL),
(20, 'садово-парковое искусство', NULL),
(21, 'проект', NULL),
(22, 'чертеж', NULL),
(23, 'изображения', NULL),
(24, 'макета', NULL),
(25, 'фотографическое произведение', NULL),
(26, 'произведение, полученное способом,\r\nаналогичным фотографии', NULL),
(27, 'географическая карта', NULL),
(28, 'геологическая карта', NULL),
(29, 'другая карта', NULL),
(30, 'план', NULL),
(31, 'эскиз', NULL),
(32, 'пластическое произведение, относящееся к\r\nгеографии', NULL),
(33, 'пластическое произведение, относящееся к\r\nтопографии', NULL),
(34, 'пластическое произведение, относящееся к\r\nдругим наукам', NULL),
(35, 'другое произведение', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `typeSocialParticipation`
--

CREATE TABLE IF NOT EXISTS `typeSocialParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `typeSocialParticipation`
--

INSERT INTO `typeSocialParticipation` (`id`, `name`, `value`) VALUES
(1, 'Социально ориентированные, культурные\r\n(культурно-просветительские, культурно-\r\nвоспитательные) деятельности в форме\r\nшефской помощи, благотворительных акций и\r\nиных подобных формах', NULL),
(2, 'Общественная\r\nдеятельность, направленная на пропаганду\r\nобщечеловеческих ценностей, уважения к\r\nправам и свободам человека, а также на защиту\r\nприроды', NULL),
(3, 'Общественно значимые культурно-массовые\r\nмероприятия', NULL),
(4, 'Деятельности по информационному\nобеспечению общественно значимых\nмероприятий, общественной жизни учреждения\nвысшего профессионального образования (в\nразработке сайта учреждения высшего\nпрофессионального образования, организации и\nобеспечении деятельн', NULL),
(5, 'Деятельность по информационному\nобеспечению общественно значимых\nмероприятий, общественной жизни учреждения\nвысшего профессионального образования ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE IF NOT EXISTS `universities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `idCity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCity` (`idCity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `idCity`) VALUES
(1, 'Астраханский государственный университет', 1),
(2, 'Астраханский Государственный Технический Университет', 1),
(3, 'Московский государственный университет', 2),
(4, 'Московский гуманитарный университет', 2),
(5, 'Волгоградский государственный университет', 3),
(6, 'Волгоградский государственный технический университет', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password_hash`, `role`, `username`, `auth_key`, `password_reset_token`, `status`, `created_at`, `updated_at`) VALUES
(3, 'a4@gmail.com', '$2y$13$cg1DqbaDnuv2Tb9aysfPsu2IRJ8TpgVwpv5HNx4IOP3A3CTYsocWe', 10, '', '', NULL, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `value`
--

CREATE TABLE IF NOT EXISTS `value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `value`
--

INSERT INTO `value` (`id`, `name`, `value`) VALUES
(1, 'грант', 90),
(2, 'патент', 80);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`),
  ADD CONSTRAINT `achievements_ibfk_2` FOREIGN KEY (`idEventType`) REFERENCES `eventType` (`id`),
  ADD CONSTRAINT `achievements_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  ADD CONSTRAINT `achievements_ibfk_4` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  ADD CONSTRAINT `achievements_ibfk_5` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`);

--
-- Constraints for table `achievementsKTD`
--
ALTER TABLE `achievementsKTD`
  ADD CONSTRAINT `achievementsKTD_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_2` FOREIGN KEY (`idTypeContest`) REFERENCES `eventType` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `achievementsPresident`
--
ALTER TABLE `achievementsPresident`
  ADD CONSTRAINT `achievementsPresident_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `achievementsPresident_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `achievementsSport`
--
ALTER TABLE `achievementsSport`
  ADD CONSTRAINT `achievementsSport_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  ADD CONSTRAINT `achievementsSport_ibfk_2` FOREIGN KEY (`idTypeContest`) REFERENCES `eventType` (`id`),
  ADD CONSTRAINT `achievementsSport_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  ADD CONSTRAINT `achievementsSport_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `achievementsSport_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `typeArticle` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`idAuthorship`) REFERENCES `authorship` (`id`),
  ADD CONSTRAINT `articles_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `articles_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facultet`
--
ALTER TABLE `facultet`
  ADD CONSTRAINT `facultet_ibfk_1` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`);

--
-- Constraints for table `grants`
--
ALTER TABLE `grants`
  ADD CONSTRAINT `grants_ibfk_1` FOREIGN KEY (`idTypeContest`) REFERENCES `typeContest` (`id`),
  ADD CONSTRAINT `grants_ibfk_2` FOREIGN KEY (`idScienceDirection`) REFERENCES `scienceDirection` (`id`),
  ADD CONSTRAINT `grants_ibfk_3` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `grants_ibfk_4` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `ktdParticipation`
--
ALTER TABLE `ktdParticipation`
  ADD CONSTRAINT `ktdParticipation_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `ktdParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `napravlenie`
--
ALTER TABLE `napravlenie`
  ADD CONSTRAINT `napravlenie_ibfk_1` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`);

--
-- Constraints for table `patents`
--
ALTER TABLE `patents`
  ADD CONSTRAINT `patents_ibfk_1` FOREIGN KEY (`idTypePatent`) REFERENCES `typePatent` (`id`),
  ADD CONSTRAINT `patents_ibfk_2` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `patents_ibfk_3` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`),
  ADD CONSTRAINT `patents_ibfk_4` FOREIGN KEY (`status`) REFERENCES `statusPatent` (`id`);

--
-- Constraints for table `publicPerformance`
--
ALTER TABLE `publicPerformance`
  ADD CONSTRAINT `publicPerformance_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  ADD CONSTRAINT `publicPerformance_ibfk_2` FOREIGN KEY (`idTypePublicPerformance`) REFERENCES `typePublicPerformance` (`id`),
  ADD CONSTRAINT `publicPerformance_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  ADD CONSTRAINT `publicPerformance_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `publicPerformance_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `ratingCulture`
--
ALTER TABLE `ratingCulture`
  ADD CONSTRAINT `ratingCulture_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `ratingScience`
--
ALTER TABLE `ratingScience`
  ADD CONSTRAINT `ratingScience_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `ratingSport`
--
ALTER TABLE `ratingSport`
  ADD CONSTRAINT `ratingSport_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `sgroup`
--
ALTER TABLE `sgroup`
  ADD CONSTRAINT `sgroup_ibfk_1` FOREIGN KEY (`idNapravlenie`) REFERENCES `napravlenie` (`id`);

--
-- Constraints for table `socialParticipation`
--
ALTER TABLE `socialParticipation`
  ADD CONSTRAINT `socialParticipation_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `socialParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `sportParticipation`
--
ALTER TABLE `sportParticipation`
  ADD CONSTRAINT `sportParticipation_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `sportParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students1` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`idStudent`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`),
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`idNapravlenie`) REFERENCES `napravlenie` (`id`),
  ADD CONSTRAINT `students_ibfk_6` FOREIGN KEY (`idGroup`) REFERENCES `sgroup` (`id`);

--
-- Constraints for table `students1`
--
ALTER TABLE `students1`
  ADD CONSTRAINT `students1_ibfk_1` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `students1_ibfk_2` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `students1_ibfk_3` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`),
  ADD CONSTRAINT `students1_ibfk_4` FOREIGN KEY (`idNapravlenie`) REFERENCES `napravlenie` (`id`),
  ADD CONSTRAINT `students1_ibfk_5` FOREIGN KEY (`idGroup`) REFERENCES `sgroup` (`id`);

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
