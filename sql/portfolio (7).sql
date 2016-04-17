-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2016 at 09:29 PM
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
  `idStudent` int(11) NOT NULL,
  `dateEvent` date NOT NULL,
  `idEventType` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `eventTitle` varchar(512) NOT NULL,
  `idDocumentType` int(11) NOT NULL,
  `location` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`),
  KEY `idEventType` (`idEventType`),
  KEY `idStatus` (`idStatus`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idLevel` (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

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
  `idLevel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStatus` (`idStatus`),
  KEY `idTypeContest` (`idTypeContest`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idDocument` (`idDocument`),
  KEY `idStudent` (`idStudent`),
  KEY `idLevel` (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `achievementsKTD`
--

INSERT INTO `achievementsKTD` (`id`, `name`, `idStatus`, `idTypeContest`, `year`, `idDocumentType`, `idDocument`, `idStudent`, `location`, `idLevel`) VALUES
(2, 'll', 1, 1, '2016-04-02', 1, NULL, 50, 'uploads/50/perechen_spec_16(Lz7).docx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `achievementsPresident`
--

CREATE TABLE IF NOT EXISTS `achievementsPresident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
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
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  `idLevel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStatus` (`idStatus`),
  KEY `idTypeContest` (`idTypeContest`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idStudent` (`idStudent`),
  KEY `idLevel` (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `achievementsSport`
--

INSERT INTO `achievementsSport` (`id`, `name`, `idStatus`, `idTypeContest`, `year`, `idDocumentType`, `idStudent`, `location`, `idLevel`) VALUES
(2, 'ss', 1, 1, '2016-04-06', 1, 50, 'uploads/50/photo7387417219805410(21B).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `name`) VALUES
(1, 'Учебная'),
(2, 'Научно-исследовательская'),
(3, 'Общественная'),
(4, 'Культурно-творческая'),
(5, 'Спортивная');

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
  `idStudent` int(11) NOT NULL,
  `volumePublication` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idType` (`idType`),
  KEY `idStatus` (`idStatus`),
  KEY `idAuthorship` (`idAuthorship`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `idType`, `name`, `year`, `idStatus`, `idAuthorship`, `idStudent`, `volumePublication`, `location`) VALUES
(1, 1, 'x', 2015, 1, 1, 50, 1, 'uploads/50/photo7387417219805410(MGW).jpg');

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
-- Table structure for table `educationLevel`
--

CREATE TABLE IF NOT EXISTS `educationLevel` (
  `id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educationLevel`
--

INSERT INTO `educationLevel` (`id`, `name`) VALUES
(0, 'бакалавр');

-- --------------------------------------------------------

--
-- Table structure for table `eventType`
--

CREATE TABLE IF NOT EXISTS `eventType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `eventType`
--

INSERT INTO `eventType` (`id`, `name`) VALUES
(1, 'олимпиада'),
(2, 'соревнование'),
(3, 'программа');

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
  `typeGrant` int(11) NOT NULL,
  `dateBegin` date DEFAULT NULL,
  `dateEnd` date DEFAULT NULL,
  `regNumberCitis` char(128) DEFAULT NULL,
  `regNumber` char(128) DEFAULT NULL,
  `idTypeContest` int(11) DEFAULT NULL,
  `idScienceDirection` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) DEFAULT NULL,
  `idStatus` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTypeContest` (`idTypeContest`),
  KEY `idScienceDirection` (`idScienceDirection`),
  KEY `idStudent` (`idStudent`),
  KEY `typeGrant` (`typeGrant`),
  KEY `idStatus` (`idStatus`),
  KEY `idLevel` (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grants`
--

INSERT INTO `grants` (`id`, `nameProject`, `nameOrganization`, `typeGrant`, `dateBegin`, `dateEnd`, `regNumberCitis`, `regNumber`, `idTypeContest`, `idScienceDirection`, `idStudent`, `location`, `idStatus`, `idLevel`) VALUES
(2, 'дд', 'лл', 2, '2016-04-07', '2016-04-22', '345678', '3456789', 1, 1, 50, 'uploads/50/report(5Z0).pdf', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grantType`
--

CREATE TABLE IF NOT EXISTS `grantType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `grantType`
--

INSERT INTO `grantType` (`id`, `name`) VALUES
(2, 'Исполнитель'),
(3, 'Руководитель');

-- --------------------------------------------------------

--
-- Table structure for table `ktdParticipation`
--

CREATE TABLE IF NOT EXISTS `ktdParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idLevel` int(11) NOT NULL,
  `idTypeParticipant` int(11) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(512) NOT NULL,
  `idStudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`),
  KEY `idStatus` (`idStatus`,`idLevel`),
  KEY `idLevel` (`idLevel`),
  KEY `idTypeParticipant` (`idTypeParticipant`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ktdParticipation`
--

INSERT INTO `ktdParticipation` (`id`, `description`, `count`, `idStatus`, `idLevel`, `idTypeParticipant`, `date`, `location`, `idStudent`) VALUES
(2, 'dr', 1, 1, 1, 1, '2016-03-31', 'uploads/50/Zaochka(mQW).xlsx', 50);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`) VALUES
(1, 'на уровне института');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `napravlenie`
--

INSERT INTO `napravlenie` (`id`, `shifr`, `name`, `idFacultet`) VALUES
(1, '03.03.02', 'Физика', 1),
(2, '15.03.01', 'Машиностроение', 1),
(3, '01.03.02', 'Прикладная математика и информатика', 2),
(4, '10.03.01', 'Информационная безопасность', 2),
(5, '01.05.01', 'Фундаментальная математика и механика', 4),
(6, '04.05.01', 'Фундаментальная и прикладная химия', 5),
(12, '22.03.01', 'Материаловедение и технологии материалов', 1),
(13, '22.03.01', 'Материаловедение и технологии материалов', 1),
(14, '15.03.06', 'Мехотроника и робототехника', 1),
(15, '15.03.06', 'Машиностроение', 1);

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
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTypePatent` (`idTypePatent`),
  KEY `idStudent` (`idStudent`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `patents`
--

INSERT INTO `patents` (`id`, `name`, `idTypePatent`, `copyrightHolder`, `description`, `status`, `dateApp`, `dateReg`, `regNumber`, `appNumber`, `idStudent`, `location`) VALUES
(9, 'ee', 1, 'ee', 'ee', 1, '2016-04-03', '2016-04-04', 22, 333, 50, 'uploads/50/photo7387417219805410(Bdg).jpg');

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
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  `idLevel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStatus` (`idStatus`),
  KEY `idTypePublicPerformance` (`idTypePublicPerformance`),
  KEY `idDocumentType` (`idDocumentType`),
  KEY `idStudent` (`idStudent`),
  KEY `idLevel` (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `publicPerformance`
--

INSERT INTO `publicPerformance` (`id`, `name`, `idStatus`, `idTypePublicPerformance`, `year`, `idDocumentType`, `idStudent`, `location`, `idLevel`) VALUES
(5, 's', 1, 1, '2016-04-01', 1, 50, 'uploads/50/Zaochka(tpY).xlsx', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sgroup`
--

INSERT INTO `sgroup` (`id`, `name`, `idNapravlenie`) VALUES
(1, 'ЗИ', 4),
(2, 'ОП-11', 13),
(3, 'ХИ', 5),
(4, 'ыв', 15);

-- --------------------------------------------------------

--
-- Table structure for table `socialParticipation`
--

CREATE TABLE IF NOT EXISTS `socialParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSocialParticipationType` int(11) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idStatus` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `idTypeParticipant` int(11) NOT NULL,
  `date` date NOT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`),
  KEY `idStatus` (`idStatus`),
  KEY `idLevel` (`idLevel`),
  KEY `idTypeParticipant` (`idTypeParticipant`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `socialParticipation`
--

INSERT INTO `socialParticipation` (`id`, `idSocialParticipationType`, `description`, `count`, `idStatus`, `idLevel`, `idTypeParticipant`, `date`, `idStudent`, `location`) VALUES
(18, 1, ';jj', 1, 1, 1, 1, '2016-04-06', 50, 'uploads/50/uslovia16(Y3j).docx');

-- --------------------------------------------------------

--
-- Table structure for table `sotrudnik`
--

CREATE TABLE IF NOT EXISTS `sotrudnik` (
  `idSotrudnik` int(11) NOT NULL,
  `secondName` char(64) NOT NULL,
  `firstName` char(64) NOT NULL,
  `midleName` char(64) NOT NULL,
  `idCity` int(11) DEFAULT NULL,
  `idUniversity` int(11) DEFAULT NULL,
  `idFacultet` int(11) DEFAULT NULL,
  `dolzn` char(64) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idSotrudnik`),
  KEY `idCity` (`idCity`),
  KEY `idUniversity` (`idUniversity`),
  KEY `idFacultet` (`idFacultet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sotrudnik`
--

INSERT INTO `sotrudnik` (`idSotrudnik`, `secondName`, `firstName`, `midleName`, `idCity`, `idUniversity`, `idFacultet`, `dolzn`) VALUES
(48, 'Галлагер', 'Феона', 'Френковна', 1, 1, 1, '???????');

-- --------------------------------------------------------

--
-- Table structure for table `sportParticipation`
--

CREATE TABLE IF NOT EXISTS `sportParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idStatus` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `idTypeParticipant` int(11) NOT NULL,
  `date` date NOT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`),
  KEY `idStatus` (`idStatus`,`idLevel`,`idTypeParticipant`),
  KEY `idLevel` (`idLevel`),
  KEY `idTypeParticipant` (`idTypeParticipant`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sportParticipation`
--

INSERT INTO `sportParticipation` (`id`, `description`, `count`, `idStatus`, `idLevel`, `idTypeParticipant`, `date`, `idStudent`, `location`) VALUES
(4, 'a', 1, 1, 1, 1, '2016-04-14', 50, 'uploads/50/Pravila_priem_2016(QRn).doc');

-- --------------------------------------------------------

--
-- Table structure for table `statusEvent`
--

CREATE TABLE IF NOT EXISTS `statusEvent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `statusEvent`
--

INSERT INTO `statusEvent` (`id`, `name`) VALUES
(1, 'международное'),
(2, 'всероссийское'),
(3, 'региональное'),
(4, 'ведомственное');

-- --------------------------------------------------------

--
-- Table structure for table `statusPatent`
--

CREATE TABLE IF NOT EXISTS `statusPatent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statusPatent`
--

INSERT INTO `statusPatent` (`id`, `name`) VALUES
(1, 'Отправлена заявка'),
(2, 'Получен сертификат');

-- --------------------------------------------------------

--
-- Table structure for table `studentRating`
--

CREATE TABLE IF NOT EXISTS `studentRating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `idActivity` int(11) NOT NULL,
  `r1` double NOT NULL,
  `r2` double NOT NULL,
  `r3` double NOT NULL,
  `status` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStudent` (`idStudent`),
  KEY `idActivity` (`idActivity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `idStudent` int(11) NOT NULL,
  `secondName` char(64) CHARACTER SET utf8 NOT NULL,
  `firstName` char(64) CHARACTER SET utf8 NOT NULL,
  `midleName` char(64) CHARACTER SET utf8 NOT NULL,
  `idCity` int(11) DEFAULT NULL,
  `idUniversity` int(11) DEFAULT NULL,
  `idFacultet` int(11) DEFAULT NULL,
  `idLevel` int(11) DEFAULT NULL,
  `kurs` int(11) DEFAULT NULL,
  `idNapravlenie` int(11) DEFAULT NULL,
  `idGroup` int(11) DEFAULT NULL,
  PRIMARY KEY (`idStudent`),
  KEY `idCity` (`idCity`),
  KEY `idLevel` (`idLevel`),
  KEY `idFacultet` (`idFacultet`),
  KEY `idNapravlenie` (`idNapravlenie`),
  KEY `idGroup` (`idGroup`),
  KEY `idUniversity` (`idUniversity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idStudent`, `secondName`, `firstName`, `midleName`, `idCity`, `idUniversity`, `idFacultet`, `idLevel`, `kurs`, `idNapravlenie`, `idGroup`) VALUES
(50, 'Васильева', 'Маргарита', 'Ивановвава', 1, 1, 1, 0, 1, 1, 2),
(51, 'Иванов', 'Алексей', 'Сергеевич', 1, 1, 1, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

CREATE TABLE IF NOT EXISTS `table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `table`
--

INSERT INTO `table` (`id`, `name`) VALUES
(1, 'statusEvent'),
(2, 'eventType'),
(3, 'typeDocument'),
(4, 'typeArticle'),
(5, 'scienceDirection'),
(6, 'typePatent'),
(7, 'typeContest'),
(8, 'educationLevel'),
(9, 'authorship'),
(10, 'statusPatent'),
(11, 'activity'),
(12, 'level'),
(13, 'grantType'),
(14, 'typeParticipant');

-- --------------------------------------------------------

--
-- Table structure for table `typeArticle`
--

CREATE TABLE IF NOT EXISTS `typeArticle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `typeArticle`
--

INSERT INTO `typeArticle` (`id`, `name`) VALUES
(1, 'статья в журнале'),
(2, 'тезисы докладов');

-- --------------------------------------------------------

--
-- Table structure for table `typeContest`
--

CREATE TABLE IF NOT EXISTS `typeContest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `typeContest`
--

INSERT INTO `typeContest` (`id`, `name`) VALUES
(1, 'Издание монографии, учебника и т.д.'),
(2, 'Инициативные проекты'),
(3, 'Ориентированные фундаментальные исследования'),
(4, 'Проведение конференции'),
(5, 'Участие в конференции'),
(6, 'Формирование тематики'),
(7, 'Прочее');

-- --------------------------------------------------------

--
-- Table structure for table `typeDocument`
--

CREATE TABLE IF NOT EXISTS `typeDocument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `typeDocument`
--

INSERT INTO `typeDocument` (`id`, `name`) VALUES
(1, 'диплом 1 степени'),
(2, 'диплом 2 степени');

-- --------------------------------------------------------

--
-- Table structure for table `typeParticipant`
--

CREATE TABLE IF NOT EXISTS `typeParticipant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `typeParticipant`
--

INSERT INTO `typeParticipant` (`id`, `name`) VALUES
(1, 'Организатор'),
(2, 'Руководитель'),
(3, 'Участник');

-- --------------------------------------------------------

--
-- Table structure for table `typePatent`
--

CREATE TABLE IF NOT EXISTS `typePatent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `typePatent`
--

INSERT INTO `typePatent` (`id`, `name`) VALUES
(1, 'Изобретения'),
(2, 'Полезные модели'),
(3, 'Промышленные образцы'),
(4, 'База данных'),
(5, 'Наименование места происхождения товара'),
(6, 'Программа для ЭВМ'),
(7, 'Товарные знаки и знаки обслуживания');

-- --------------------------------------------------------

--
-- Table structure for table `typePublicPerformance`
--

CREATE TABLE IF NOT EXISTS `typePublicPerformance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `typePublicPerformance`
--

INSERT INTO `typePublicPerformance` (`id`, `name`) VALUES
(1, 'литературное произведение'),
(2, 'драматическое произведение'),
(3, 'музыкально-драматическое произведение'),
(4, 'сценарное произведение'),
(5, 'хореографическое произведение'),
(6, 'пантомимы'),
(7, 'музыкальное произведение с текстом или\r\nбез текста'),
(8, 'аудиовизуальное произведение'),
(9, 'произведения живописи'),
(10, 'скульптуры'),
(11, 'графика'),
(12, 'дизайн'),
(13, 'графический рассказ'),
(14, 'комикс'),
(15, 'другое произведение изобразительного\r\nискусства'),
(16, 'произведение декоративно-прикладного\r\nискусства'),
(17, 'сценографическое искусство'),
(18, 'произведение архитектуры'),
(19, 'градостроительство'),
(20, 'садово-парковое искусство'),
(21, 'проект'),
(22, 'чертеж'),
(23, 'изображения'),
(24, 'макета'),
(25, 'фотографическое произведение'),
(26, 'произведение, полученное способом,\r\nаналогичным фотографии'),
(27, 'географическая карта'),
(28, 'геологическая карта'),
(29, 'другая карта'),
(30, 'план'),
(31, 'эскиз'),
(32, 'пластическое произведение, относящееся к\r\nгеографии'),
(33, 'пластическое произведение, относящееся к\r\nтопографии'),
(34, 'пластическое произведение, относящееся к\r\nдругим наукам'),
(35, 'другое произведение');

-- --------------------------------------------------------

--
-- Table structure for table `typeSocialParticipation`
--

CREATE TABLE IF NOT EXISTS `typeSocialParticipation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `typeSocialParticipation`
--

INSERT INTO `typeSocialParticipation` (`id`, `name`) VALUES
(1, 'Социально ориентированные, культурные\r\n(культурно-просветительские, культурно-\r\nвоспитательные) деятельности в форме\r\nшефской помощи, благотворительных акций и\r\nиных подобных формах'),
(2, 'Общественная\r\nдеятельность, направленная на пропаганду\r\nобщечеловеческих ценностей, уважения к\r\nправам и свободам человека, а также на защиту\r\nприроды'),
(3, 'Общественно значимые культурно-массовые\r\nмероприятия'),
(4, 'Деятельности по информационному\nобеспечению общественно значимых\nмероприятий, общественной жизни учреждения\nвысшего профессионального образования (в\nразработке сайта учреждения высшего\nпрофессионального образования, организации и\nобеспечении деятельн'),
(5, 'Деятельность по информационному\nобеспечению общественно значимых\nмероприятий, общественной жизни учреждения\nвысшего профессионального образования ');

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
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password_hash`, `role`, `auth_key`, `password_reset_token`, `status`, `created_at`, `updated_at`) VALUES
(48, 'fmiit@gmail.com', '$2y$13$HRqXBDrJNXULUrr11uFxS./S0zZ2/gw0NizIMMDsLseKcEmppGE5O', 15, '', NULL, 10, 0, 0),
(50, 'a@gmail.com', '$2y$13$bM3JzRPrVtIJRaVuQGAzBuQPGtYlYtDm/7iUYs8FKu8mWvFOnyHl6', 10, '', NULL, 10, 0, 0),
(51, 'kjsjc', 'dfdf', 10, '', NULL, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `valuesRating`
--

CREATE TABLE IF NOT EXISTS `valuesRating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idFacultet` int(11) NOT NULL,
  `idTable` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `value` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idFacultet` (`idFacultet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `valuesRating`
--

INSERT INTO `valuesRating` (`id`, `idFacultet`, `idTable`, `idItem`, `value`) VALUES
(1, 1, 1, 1, 2),
(2, 1, 1, 2, 3),
(3, 1, 1, 3, 4),
(4, 1, 1, 4, 5),
(5, 1, 2, 1, 2),
(6, 1, 2, 2, 3),
(7, 1, 2, 3, 4),
(8, 1, 3, 1, 2),
(9, 1, 3, 2, 3),
(10, 1, 4, 1, 2),
(11, 1, 4, 2, 3),
(12, 1, 5, 1, 2),
(13, 1, 5, 2, 3),
(14, 1, 5, 3, 4),
(15, 1, 5, 4, 5),
(16, 1, 5, 5, 6),
(17, 1, 5, 6, 7),
(18, 1, 5, 7, 8),
(19, 1, 5, 8, 9),
(20, 1, 5, 9, 10),
(21, 1, 6, 1, 2),
(22, 1, 6, 2, 3),
(23, 1, 6, 3, 4),
(24, 1, 6, 4, 5),
(25, 1, 6, 5, 6),
(26, 1, 6, 6, 7),
(27, 1, 6, 7, 8),
(28, 1, 7, 1, 2),
(29, 1, 7, 2, 3),
(30, 1, 7, 3, 4),
(31, 1, 7, 4, 5),
(32, 1, 7, 5, 6),
(33, 1, 7, 6, 7),
(34, 1, 7, 7, 8),
(35, 1, 8, 0, 2),
(36, 1, 9, 1, 2),
(37, 1, 9, 2, 3),
(38, 1, 10, 1, 2),
(39, 1, 10, 2, 3),
(40, 1, 11, 1, 2),
(41, 1, 11, 2, 3),
(42, 1, 11, 3, 4),
(43, 1, 11, 4, 5),
(44, 1, 11, 5, 6),
(45, 1, 12, 1, 2),
(46, 1, 13, 2, 2),
(47, 1, 13, 3, 3),
(48, 1, 14, 1, 2),
(49, 1, 14, 2, 3),
(50, 1, 14, 3, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_ibfk_5` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`),
  ADD CONSTRAINT `achievements_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `achievements_ibfk_2` FOREIGN KEY (`idEventType`) REFERENCES `eventType` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievements_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievements_ibfk_4` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `achievementsKTD`
--
ALTER TABLE `achievementsKTD`
  ADD CONSTRAINT `achievementsKTD_ibfk_6` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsKTD_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsKTD_ibfk_2` FOREIGN KEY (`idTypeContest`) REFERENCES `eventType` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `achievementsPresident`
--
ALTER TABLE `achievementsPresident`
  ADD CONSTRAINT `achievementsPresident_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`);

--
-- Constraints for table `achievementsSport`
--
ALTER TABLE `achievementsSport`
  ADD CONSTRAINT `achievementsSport_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsSport_ibfk_2` FOREIGN KEY (`idTypeContest`) REFERENCES `eventType` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsSport_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsSport_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsSport_ibfk_6` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `typeArticle` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`idAuthorship`) REFERENCES `authorship` (`id`),
  ADD CONSTRAINT `articles_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facultet`
--
ALTER TABLE `facultet`
  ADD CONSTRAINT `facultet_ibfk_1` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`);

--
-- Constraints for table `grants`
--
ALTER TABLE `grants`
  ADD CONSTRAINT `grants_ibfk_1` FOREIGN KEY (`idTypeContest`) REFERENCES `typeContest` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grants_ibfk_2` FOREIGN KEY (`idScienceDirection`) REFERENCES `scienceDirection` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grants_ibfk_4` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grants_ibfk_5` FOREIGN KEY (`typeGrant`) REFERENCES `grantType` (`id`),
  ADD CONSTRAINT `grants_ibfk_6` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grants_ibfk_7` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ktdParticipation`
--
ALTER TABLE `ktdParticipation`
  ADD CONSTRAINT `ktdParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ktdParticipation_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ktdParticipation_ibfk_4` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ktdParticipation_ibfk_5` FOREIGN KEY (`idTypeParticipant`) REFERENCES `typeParticipant` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `napravlenie`
--
ALTER TABLE `napravlenie`
  ADD CONSTRAINT `napravlenie_ibfk_1` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `patents`
--
ALTER TABLE `patents`
  ADD CONSTRAINT `patents_ibfk_1` FOREIGN KEY (`idTypePatent`) REFERENCES `typePatent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `patents_ibfk_3` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patents_ibfk_4` FOREIGN KEY (`status`) REFERENCES `statusPatent` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `publicPerformance`
--
ALTER TABLE `publicPerformance`
  ADD CONSTRAINT `publicPerformance_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `publicPerformance_ibfk_2` FOREIGN KEY (`idTypePublicPerformance`) REFERENCES `typePublicPerformance` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `publicPerformance_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `publicPerformance_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publicPerformance_ibfk_6` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sgroup`
--
ALTER TABLE `sgroup`
  ADD CONSTRAINT `sgroup_ibfk_1` FOREIGN KEY (`idNapravlenie`) REFERENCES `napravlenie` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `socialParticipation`
--
ALTER TABLE `socialParticipation`
  ADD CONSTRAINT `socialParticipation_ibfk_4` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `socialParticipation_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `socialParticipation_ibfk_2` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `socialParticipation_ibfk_3` FOREIGN KEY (`idTypeParticipant`) REFERENCES `typeParticipant` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sotrudnik`
--
ALTER TABLE `sotrudnik`
  ADD CONSTRAINT `sotrudnik_ibfk_1` FOREIGN KEY (`idSotrudnik`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `sotrudnik_ibfk_2` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `sotrudnik_ibfk_3` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `sotrudnik_ibfk_4` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`);

--
-- Constraints for table `sportParticipation`
--
ALTER TABLE `sportParticipation`
  ADD CONSTRAINT `sportParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sportParticipation_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sportParticipation_ibfk_4` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sportParticipation_ibfk_5` FOREIGN KEY (`idTypeParticipant`) REFERENCES `typeParticipant` (`id`);

--
-- Constraints for table `studentRating`
--
ALTER TABLE `studentRating`
  ADD CONSTRAINT `studentrating_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`),
  ADD CONSTRAINT `studentrating_ibfk_2` FOREIGN KEY (`idActivity`) REFERENCES `activity` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`idLevel`) REFERENCES `educationLevel` (`id`),
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`),
  ADD CONSTRAINT `students_ibfk_6` FOREIGN KEY (`idNapravlenie`) REFERENCES `napravlenie` (`id`),
  ADD CONSTRAINT `students_ibfk_7` FOREIGN KEY (`idGroup`) REFERENCES `sgroup` (`id`),
  ADD CONSTRAINT `students_ibfk_8` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`);

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`);

--
-- Constraints for table `valuesRating`
--
ALTER TABLE `valuesRating`
  ADD CONSTRAINT `valuesRating_ibfk_1` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
