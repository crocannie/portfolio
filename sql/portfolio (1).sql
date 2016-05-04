-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost:8889
-- Время создания: Май 04 2016 г., 21:55
-- Версия сервера: 5.5.42
-- Версия PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `portfolio`
--

-- --------------------------------------------------------

--
-- Структура таблицы `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `dateEvent` date NOT NULL,
  `idEventType` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `eventTitle` varchar(512) NOT NULL,
  `idDocumentType` int(11) NOT NULL,
  `location` varchar(512) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `achievements`
--

INSERT INTO `achievements` (`id`, `name`, `idStudent`, `dateEvent`, `idEventType`, `idLevel`, `idStatus`, `eventTitle`, `idDocumentType`, `location`) VALUES
(5, 'Конкурс инновационных   проектов среди студентов и магистрантов', 52, '2016-02-02', 1, 2, 4, 'Конкурс инновационных   проектов среди студентов и магистрантов', 1, 'uploads/52/mozilla(Ok9).pdf'),
(6, 'Студенческий конкурс по программированию', 52, '2015-08-21', 1, 3, 3, 'Студенческий конкурс по программированию', 4, 'uploads/52/00main(2)(h8q).pdf'),
(7, 'ИТ-Олимпиада "IT-Universe"', 53, '2016-02-09', 1, 4, 1, 'ИТ-Олимпиада "IT-Universe"\r\n', 4, 'uploads/53/Портфолио(CG5).pdf'),
(8, 'Олимпиада 1', 53, '2016-05-09', 1, 2, 3, 'Олимпиада 1', 2, 'uploads/53/Презентация2(Uy8).pdf'),
(9, 'Школа 1', 53, '2016-05-09', 2, 3, 3, 'Школа 1', 4, 'uploads/53/Презентация2(nIb).pdf'),
(10, 'Конкурс инновационных   проектов среди студентов и магистрантов', 53, '2016-02-02', 1, 2, 4, 'Конкурс инновационных   проектов среди студентов и магистрантов', 1, 'uploads/52/mozilla(Ok9).pdf'),
(11, 'Школа 2', 53, '2016-05-09', 2, 3, 3, 'Школа 1', 4, 'uploads/53/Презентация2(nIb).pdf');

-- --------------------------------------------------------

--
-- Структура таблицы `achievementsKTD`
--

CREATE TABLE `achievementsKTD` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idTypeContest` int(11) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  `idLevel` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `achievementsKTD`
--

INSERT INTO `achievementsKTD` (`id`, `name`, `idStatus`, `idTypeContest`, `year`, `idDocumentType`, `idDocument`, `idStudent`, `location`, `idLevel`) VALUES
(2, 'Достижения 1', 3, 1, '2016-05-04', 2, NULL, 54, 'uploads/54/Презентация2(jV0).pptx', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `achievementsPresident`
--

CREATE TABLE `achievementsPresident` (
  `id` int(11) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `achievementsSport`
--

CREATE TABLE `achievementsSport` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idTypeContest` int(11) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  `idLevel` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `achievementsSport`
--

INSERT INTO `achievementsSport` (`id`, `name`, `idStatus`, `idTypeContest`, `year`, `idDocumentType`, `idStudent`, `location`, `idLevel`) VALUES
(1, 'Универсиада, 1 место за бег 1 км', 1, 1, '2016-04-13', 1, 52, 'uploads/52/2016.02.18Критерииоценкикандидатовнаповышенныестипендии(проект)(19z).docx', 4),
(2, 'Спорт1', 4, 1, '2016-05-03', 1, 55, 'uploads/55/Презентация2(XM2).pptx', 2),
(3, 'Спорт2', 3, 1, '2016-05-06', 3, 55, 'uploads/55/Презентация2(cn1).pdf', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `activity`
--

INSERT INTO `activity` (`id`, `name`) VALUES
(1, 'Учебная'),
(2, 'Научно-исследовательская'),
(3, 'Общественная'),
(4, 'Культурно-творческая'),
(5, 'Спортивная');

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `year` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `idAuthorship` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `volumePublication` int(11) NOT NULL,
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `idType`, `name`, `year`, `idStatus`, `idAuthorship`, `idStudent`, `volumePublication`, `location`) VALUES
(1, 3, 'Анализ номенклатуры программных средств массового использования, применяемых в российских вузах', 2015, 3, 2, 52, 7, 'uploads/52/ГорбачеваАнна(mPa).pdf');

-- --------------------------------------------------------

--
-- Структура таблицы `authorship`
--

CREATE TABLE `authorship` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authorship`
--

INSERT INTO `authorship` (`id`, `name`) VALUES
(1, 'без соавторства'),
(2, 'в соавторстве');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` char(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Астрахань'),
(2, 'Москва'),
(3, 'Волгоград'),
(4, 'Саратов'),
(5, 'Самара'),
(6, 'Ульяновск'),
(7, 'Таганрог'),
(8, 'Краснодар');

-- --------------------------------------------------------

--
-- Структура таблицы `educationLevel`
--

CREATE TABLE `educationLevel` (
  `id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `educationLevel`
--

INSERT INTO `educationLevel` (`id`, `name`) VALUES
(1, 'бакалавриат/специалитет, 1 курс'),
(2, 'бакалавриат/специалитет, 2 курс'),
(3, 'бакалавриат/специалитет, 3 курс'),
(4, 'бакалавриат/специалитет, 4 курс'),
(5, 'бакалавриат/специалитет, 5 курс'),
(6, 'магистратура, 1 курс'),
(7, 'магистратура, 2 курс');

-- --------------------------------------------------------

--
-- Структура таблицы `eventType`
--

CREATE TABLE `eventType` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `eventType`
--

INSERT INTO `eventType` (`id`, `name`) VALUES
(1, 'Олимпиада, соревнование, конкурс'),
(2, 'Программа, школа, семинар');

-- --------------------------------------------------------

--
-- Структура таблицы `facultet`
--

CREATE TABLE `facultet` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `idUniversity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `facultet`
--

INSERT INTO `facultet` (`id`, `name`, `idUniversity`) VALUES
(1, 'математики и информационных технологий', 1),
(2, 'физико-технический', 1),
(3, 'социальных коммуникаций', 1),
(4, 'механико–математический', 3),
(5, 'химический', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `grants`
--

CREATE TABLE `grants` (
  `id` int(11) NOT NULL,
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
  `idLevel` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `grantType`
--

CREATE TABLE `grantType` (
  `id` int(11) NOT NULL,
  `name` char(128) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `grantType`
--

INSERT INTO `grantType` (`id`, `name`) VALUES
(2, 'Исполнитель'),
(3, 'Руководитель');

-- --------------------------------------------------------

--
-- Структура таблицы `ktdParticipation`
--

CREATE TABLE `ktdParticipation` (
  `id` int(11) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idLevel` int(11) NOT NULL,
  `idTypeParticipant` int(11) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(512) NOT NULL,
  `idStudent` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ktdParticipation`
--

INSERT INTO `ktdParticipation` (`id`, `description`, `count`, `idStatus`, `idLevel`, `idTypeParticipant`, `date`, `location`, `idStudent`) VALUES
(1, 'ч мвамвсч мвамвсч мвамвсч мвамвсч мвамвс', 1, 1, 2, 1, '2016-05-11', 'uploads/52/Презентация2(oS2).pptx', 52),
(2, 'Мероприятие', 1, 4, 1, 3, '2016-05-11', 'uploads/54/Презентация2(Jvn).pptx', 54),
(3, 'Мероприятие', 1, 4, 2, 2, '2016-05-17', 'uploads/54/Портфолио(dAw).pdf', 54);

-- --------------------------------------------------------

--
-- Структура таблицы `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name` char(128) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `level`
--

INSERT INTO `level` (`id`, `name`) VALUES
(1, 'институт'),
(2, 'университета'),
(3, 'области'),
(4, 'ФО'),
(5, 'РФ'),
(6, 'международный');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1456829141),
('m130524_201442_init', 1456829163);

-- --------------------------------------------------------

--
-- Структура таблицы `napravlenie`
--

CREATE TABLE `napravlenie` (
  `id` int(11) NOT NULL,
  `shifr` char(128) NOT NULL,
  `name` char(128) NOT NULL,
  `idFacultet` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `napravlenie`
--

INSERT INTO `napravlenie` (`id`, `shifr`, `name`, `idFacultet`) VALUES
(16, '01.03.02', '	 Прикладная математика и информатика', 1),
(17, '10.03.01', '	 Информационная безопасность', 1),
(19, '09.03.01', 'Информатика и вычислительная техника', 1),
(20, '09.03.02', 'Информационные системы и технологии', 1),
(21, '12.03.04', 'Биотехнические системы и технологии', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `patents`
--

CREATE TABLE `patents` (
  `id` int(11) NOT NULL,
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
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `publicPerformance`
--

CREATE TABLE `publicPerformance` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `idTypePublicPerformance` int(11) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL,
  `idLevel` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publicPerformance`
--

INSERT INTO `publicPerformance` (`id`, `name`, `idStatus`, `idTypePublicPerformance`, `year`, `idDocumentType`, `idStudent`, `location`, `idLevel`) VALUES
(1, 'Выступление с музыкально- драматическим произведением «В мире музыки» ', 3, 3, '2016-03-09', 4, 52, 'uploads/52/НИР_Цельная(Xf9).docx', 3),
(2, 'Представление 1', 3, 5, '2016-05-04', 4, 54, 'uploads/54/Презентация2(lJY).pptx', 2),
(3, 'Представление 2', 3, 3, '2016-04-26', 4, 54, 'uploads/54/Презентация2(S53).pptx', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `quotas`
--

CREATE TABLE `quotas` (
  `id` int(11) NOT NULL,
  `idFacultet` int(11) NOT NULL,
  `cnt` int(11) NOT NULL,
  `study` int(11) NOT NULL,
  `science` int(11) NOT NULL,
  `social` int(11) NOT NULL,
  `culture` int(11) NOT NULL,
  `sport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `quotas`
--

INSERT INTO `quotas` (`id`, `idFacultet`, `cnt`, `study`, `science`, `social`, `culture`, `sport`) VALUES
(1, 1, 10, 1, 5, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `scienceDirection`
--

CREATE TABLE `scienceDirection` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `scienceDirection`
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
-- Структура таблицы `sgroup`
--

CREATE TABLE `sgroup` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `idNapravlenie` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sgroup`
--

INSERT INTO `sgroup` (`id`, `name`, `idNapravlenie`) VALUES
(5, 'МП-21', 16),
(6, 'ЗИ-11', 17),
(7, 'ВС-31', 19),
(8, 'ИТ-41', 20),
(9, 'ИБ-11', 21);

-- --------------------------------------------------------

--
-- Структура таблицы `socialParticipation`
--

CREATE TABLE `socialParticipation` (
  `id` int(11) NOT NULL,
  `idSocialParticipationType` int(11) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idStatus` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `idTypeParticipant` int(11) NOT NULL,
  `date` date NOT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `socialParticipation`
--

INSERT INTO `socialParticipation` (`id`, `idSocialParticipationType`, `description`, `count`, `idStatus`, `idLevel`, `idTypeParticipant`, `date`, `idStudent`, `location`) VALUES
(20, 3, 'Организация и проведение областного конкурса «Я в мире IT»', 1, 4, 1, 1, '2016-03-09', 52, 'uploads/52/945(Vle).docx'),
(21, 3, 'Участник всероссийской программы «IT-START» г. Майкоп', 1, 2, 4, 4, '2015-05-13', 52, 'uploads/52/(gIh).docx'),
(22, 3, 'Участник «Битвы хоров в АГУ» в рамках фестиваля проектов социализации 2014 года', 1, 4, 2, 3, '2015-09-15', 52, 'uploads/52/_Дек_Цельная(ldy).doc'),
(23, 5, '1 организация (является участником содружества активной молодежи)', 1, 3, 2, 4, '2016-04-06', 52, 'uploads/52/РОССИИ(5uP).docx'),
(24, 1, 'Мероприятие 1', 1, 4, 1, 3, '2016-04-25', 54, 'uploads/54/Презентация2(twE).pptx'),
(25, 2, 'Мероприятие 2', 1, 3, 2, 3, '2016-05-02', 54, 'uploads/54/Презентация2(oWG).pdf'),
(26, 3, 'Мероприятие 3', 1, 4, 2, 2, '2016-05-02', 54, 'uploads/54/Презентация2(7NK).pptx');

-- --------------------------------------------------------

--
-- Структура таблицы `sotrudnik`
--

CREATE TABLE `sotrudnik` (
  `idSotrudnik` int(11) NOT NULL,
  `secondName` char(64) NOT NULL,
  `firstName` char(64) NOT NULL,
  `midleName` char(64) NOT NULL,
  `idCity` int(11) DEFAULT NULL,
  `idUniversity` int(11) DEFAULT NULL,
  `idFacultet` int(11) DEFAULT NULL,
  `dolzn` char(64) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sotrudnik`
--

INSERT INTO `sotrudnik` (`idSotrudnik`, `secondName`, `firstName`, `midleName`, `idCity`, `idUniversity`, `idFacultet`, `dolzn`) VALUES
(48, 'Галлагер', 'Феона', 'Френковна', 1, 1, 1, '???????');

-- --------------------------------------------------------

--
-- Структура таблицы `sportParticipation`
--

CREATE TABLE `sportParticipation` (
  `id` int(11) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idStatus` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `idTypeParticipant` int(11) NOT NULL,
  `date` date NOT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sportParticipation`
--

INSERT INTO `sportParticipation` (`id`, `description`, `count`, `idStatus`, `idLevel`, `idTypeParticipant`, `date`, `idStudent`, `location`) VALUES
(1, 'sffefef', 1, 1, 2, 2, '2016-05-11', 52, 'uploads/52/Презентация2(IN2).pptx');

-- --------------------------------------------------------

--
-- Структура таблицы `statusEvent`
--

CREATE TABLE `statusEvent` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statusEvent`
--

INSERT INTO `statusEvent` (`id`, `name`) VALUES
(1, 'международное'),
(2, 'всероссийское'),
(3, 'региональное'),
(4, 'ведомственное');

-- --------------------------------------------------------

--
-- Структура таблицы `statusPatent`
--

CREATE TABLE `statusPatent` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statusPatent`
--

INSERT INTO `statusPatent` (`id`, `name`) VALUES
(1, 'Отправлена заявка'),
(2, 'Получен сертификат');

-- --------------------------------------------------------

--
-- Структура таблицы `studentRating`
--

CREATE TABLE `studentRating` (
  `id` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `idFacultet` int(11) NOT NULL,
  `idActivity` int(11) NOT NULL,
  `r1` double NOT NULL,
  `r2` double NOT NULL,
  `r3` double NOT NULL,
  `status` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `cnt` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `studentRating`
--

INSERT INTO `studentRating` (`id`, `idStudent`, `idFacultet`, `idActivity`, `r1`, `r2`, `r3`, `status`, `mark`, `cnt`) VALUES
(11, 52, 1, 2, 224, 0, 0, 1, 90, 0),
(12, 52, 1, 3, 158, 0, 0, 1, 90, 0),
(13, 53, 1, 1, 250, 0, 0, 1, 80, 0),
(14, 54, 1, 3, 60, 0, 0, 1, 80, 0),
(15, 55, 1, 5, 60, 0, 0, 1, 80, 0),
(16, 56, 1, 1, 220, 0, 0, 1, 90, 0),
(17, 57, 1, 2, 180, 0, 0, 1, 90, 0),
(18, 58, 1, 3, 134, 0, 0, 1, 90, 0),
(19, 59, 1, 4, 290, 0, 0, 1, 90, 0),
(20, 60, 1, 5, 224, 0, 0, 1, 90, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `idStudent` int(11) NOT NULL,
  `secondName` char(64) CHARACTER SET utf8 NOT NULL,
  `firstName` char(64) CHARACTER SET utf8 NOT NULL,
  `midleName` char(64) CHARACTER SET utf8 NOT NULL,
  `idCity` int(11) DEFAULT NULL,
  `idUniversity` int(11) DEFAULT NULL,
  `idFacultet` int(11) DEFAULT NULL,
  `idLevel` int(11) DEFAULT NULL,
  `idNapravlenie` int(11) DEFAULT NULL,
  `idGroup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`idStudent`, `secondName`, `firstName`, `midleName`, `idCity`, `idUniversity`, `idFacultet`, `idLevel`, `idNapravlenie`, `idGroup`) VALUES
(52, 'Лавров', 'Олег', 'Евгеньевич', 1, 1, 1, 2, 16, 5),
(53, 'Некрасов', 'Илья', 'Викторович', 1, 1, 1, 2, 16, 5),
(54, 'Сидорова', 'Валерия', 'Сергеевна', 1, 1, 1, 2, 16, 5),
(55, 'Елизавета', 'Елизавета', 'Никитична', 1, 1, 1, 2, 16, 5),
(56, 'Терентьева', 'Валентина', 'Эдуардовна', 1, 1, 1, 2, 16, 5),
(57, 'Лаврентьева', 'Анна', 'Львовна', 1, 1, 1, 2, 16, 5),
(58, 'Френкель', 'Марфа', 'Мариановна', 1, 1, 1, 2, 16, 5),
(59, 'Рубинштейн', 'Адриан', 'Михайлович', 1, 1, 1, 2, 16, 5),
(60, 'Бродский', 'Мефодий', 'Афанасьевич', 1, 1, 1, 2, 16, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `table`
--

CREATE TABLE `table` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `table`
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
-- Структура таблицы `typeArticle`
--

CREATE TABLE `typeArticle` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typeArticle`
--

INSERT INTO `typeArticle` (`id`, `name`) VALUES
(1, 'Международные журналы (Scopus, Web ofScience и др.)'),
(2, 'Журналы ВАК'),
(3, 'Журналы РИНЦ'),
(4, 'Иные журналы'),
(5, 'Международные конференции (Scopus, Web of Science и др.)'),
(6, 'Конференции РИНЦ'),
(7, 'Иные материалы конференций'),
(8, 'Тезисы докладов'),
(9, 'Иные публикации');

-- --------------------------------------------------------

--
-- Структура таблицы `typeContest`
--

CREATE TABLE `typeContest` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typeContest`
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
-- Структура таблицы `typeDocument`
--

CREATE TABLE `typeDocument` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typeDocument`
--

INSERT INTO `typeDocument` (`id`, `name`) VALUES
(1, 'Диплом 1 степени (победитель, призер)'),
(2, 'Диплом 2 степени'),
(3, 'Диплом 3 степени'),
(4, 'Сертификат участия');

-- --------------------------------------------------------

--
-- Структура таблицы `typeParticipant`
--

CREATE TABLE `typeParticipant` (
  `id` int(11) NOT NULL,
  `name` char(128) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `typeParticipant`
--

INSERT INTO `typeParticipant` (`id`, `name`) VALUES
(1, 'Организатор'),
(2, 'Руководитель коллектива'),
(3, 'Участник'),
(4, 'Индивидуальный участник');

-- --------------------------------------------------------

--
-- Структура таблицы `typePatent`
--

CREATE TABLE `typePatent` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typePatent`
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
-- Структура таблицы `typePublicPerformance`
--

CREATE TABLE `typePublicPerformance` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typePublicPerformance`
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
-- Структура таблицы `typeSocialParticipation`
--

CREATE TABLE `typeSocialParticipation` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typeSocialParticipation`
--

INSERT INTO `typeSocialParticipation` (`id`, `name`) VALUES
(1, 'Систематическое \nучастие\n студента в \nпроведении (обеспечении проведения) \nсоциально ориентированной, культурной \n(культурно\n-\nпросветительской, культурно\n-\nвоспитательной) деятельности в форме \nшефской помощи, благотворительных акций и \nиных подобных формах'),
(2, 'Систематическое \nучастие\n студента в \nпроведении \n(обеспечении\n проведения) общественной \nдеятельности, направленной на пропаганду \nобщечеловеческих ценностей, уважения к \nправам и свободам человека, а также на защиту \nприроды'),
(3, 'Систематическое \nучастие\n студента в \nпроведении (обеспечении проведения)\nобщественно значимых культурно\n-\nмассовых \nмероприятий'),
(4, 'Систематическое \nучастие\n студента в \nдеятельности по информационному \nобеспечению общественно значимых \nмероприятий, общественной жизни учреждения \nвысшего профессионального образования (в \nразработке сайта учреждения высшего \nпрофессионального образова\nния, организации и \nобеспечении деятельности средств массовой \nинформации, в том числе в издании газеты, \nжурнала, создании и реализации теле\n-\n и \nрадиопрограмм учреждения высшего \nпрофессионального образования)'),
(5, 'Участие (членство)\nстудента в общественных \nорганизациях \n(в течение 1 последнего года)'),
(6, 'Систематическое \r\nучастие\r\n студента в \r\nобеспечении защиты прав студентов'),
(7, 'Систематическое безвозмездное \r\nвыполнение\r\nстудентом\r\n общественно полезной деятельности, в \r\nтом числе организационной, направленной \r\nна \r\nподдержание общественной безопасности, \r\nблагоу\r\nстройство окружающей среды, \r\nприродоохранной деятельности или иной \r\nаналогичной деятельности');

-- --------------------------------------------------------

--
-- Структура таблицы `universities`
--

CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `idCity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `universities`
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
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password_hash`, `role`, `auth_key`, `password_reset_token`, `status`, `created_at`, `updated_at`) VALUES
(48, 'fmiit@gmail.com', '$2y$13$HRqXBDrJNXULUrr11uFxS./S0zZ2/gw0NizIMMDsLseKcEmppGE5O', 15, '', NULL, 10, 0, 0),
(50, 'a@gmail.com', '$2y$13$bM3JzRPrVtIJRaVuQGAzBuQPGtYlYtDm/7iUYs8FKu8mWvFOnyHl6', 10, '', NULL, 10, 0, 0),
(52, 'lavrov@gmail.com', '$2y$13$zdQJ5KYEqZP3ogCFftb6DulygrMllLkIqvW6uv7l.E6bZJ31Nhfxi', 10, '', NULL, 10, 0, 0),
(53, 'nekrasov@gmail.com', '$2y$13$IF5ICUl.jH9QlDTtQjp2quLLQ0LrAOtTN30PUCxVWLu4D8B0ASME6', 10, '', NULL, 10, 0, 0),
(54, 'sidorova@gmail.com', '$2y$13$wnnG1ltPr6U3w0VRiNaFXegIEl6Ne/05j/kRUBwGmr38sgUU6d13e', 10, '', NULL, 10, 0, 0),
(55, 'rybakova@gmail.com', '$2y$13$lM49pKLQAlMmOgVaOehvD.QvuVMowzO/3oUe1FsaLjII/JumMle4O', 10, '', NULL, 10, 0, 0),
(56, 'a1@gmail.com', '$2y$13$bM3JzRPrVtIJRaVuQGAzBuQPGtYlYtDm/7iUYs8FKu8mWvFOnyHl6', 10, '', NULL, 10, 0, 0),
(57, 'a2@gmail.com', '$2y$13$bM3JzRPrVtIJRaVuQGAzBuQPGtYlYtDm/7iUYs8FKu8mWvFOnyHl6', 10, '', NULL, 10, 0, 0),
(58, 'a3@gmail.com', '$2y$13$bM3JzRPrVtIJRaVuQGAzBuQPGtYlYtDm/7iUYs8FKu8mWvFOnyHl6', 10, '', NULL, 10, 0, 0),
(59, 'a4@gmail.com', '$2y$13$bM3JzRPrVtIJRaVuQGAzBuQPGtYlYtDm/7iUYs8FKu8mWvFOnyHl6', 10, '', NULL, 10, 0, 0),
(60, 'a5@gmail.com', '$2y$13$bM3JzRPrVtIJRaVuQGAzBuQPGtYlYtDm/7iUYs8FKu8mWvFOnyHl6', 10, '', NULL, 10, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `valuesRating`
--

CREATE TABLE `valuesRating` (
  `id` int(11) NOT NULL,
  `idFacultet` int(11) NOT NULL,
  `idTable` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `value` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `valuesRating`
--

INSERT INTO `valuesRating` (`id`, `idFacultet`, `idTable`, `idItem`, `value`) VALUES
(1, 1, 1, 1, 2),
(2, 1, 1, 2, 9),
(3, 1, 1, 3, 2),
(4, 1, 1, 4, 2),
(5, 1, 2, 1, 5),
(6, 1, 2, 2, 6),
(7, 1, 3, 1, 2),
(8, 1, 3, 2, 3),
(9, 1, 3, 3, 4),
(10, 1, 3, 4, 5),
(11, 1, 4, 1, 2),
(12, 1, 4, 2, 3),
(13, 1, 4, 3, 4),
(14, 1, 4, 4, 5),
(15, 1, 4, 5, 6),
(16, 1, 4, 6, 7),
(17, 1, 4, 7, 8),
(18, 1, 4, 8, 9),
(19, 1, 4, 9, 10),
(20, 1, 5, 1, 2),
(21, 1, 5, 2, 3),
(22, 1, 5, 3, 4),
(23, 1, 5, 4, 5),
(24, 1, 5, 5, 6),
(25, 1, 5, 6, 7),
(26, 1, 5, 7, 8),
(27, 1, 5, 8, 9),
(28, 1, 5, 9, 10),
(29, 1, 6, 1, 2),
(30, 1, 6, 2, 3),
(31, 1, 6, 3, 4),
(32, 1, 6, 4, 5),
(33, 1, 6, 5, 6),
(34, 1, 6, 6, 7),
(35, 1, 6, 7, 8),
(36, 1, 7, 1, 2),
(37, 1, 7, 2, 3),
(38, 1, 7, 3, 4),
(39, 1, 7, 4, 5),
(40, 1, 7, 5, 6),
(41, 1, 7, 6, 7),
(42, 1, 7, 7, 8),
(43, 1, 8, 0, 2),
(44, 1, 8, 1, 3),
(45, 1, 8, 2, 4),
(46, 1, 8, 3, 5),
(47, 1, 8, 4, 6),
(48, 1, 8, 5, 7),
(49, 1, 8, 6, 8),
(50, 1, 9, 1, 2),
(51, 1, 9, 2, 3),
(52, 1, 10, 1, 2),
(53, 1, 10, 2, 3),
(54, 1, 11, 1, 1),
(55, 1, 11, 2, 5),
(56, 1, 11, 3, 1),
(57, 1, 11, 4, 1),
(58, 1, 11, 5, 1),
(59, 1, 12, 1, 2),
(60, 1, 12, 2, 3),
(61, 1, 12, 3, 4),
(62, 1, 12, 4, 5),
(63, 1, 12, 5, 6),
(64, 1, 12, 6, 7),
(65, 1, 13, 2, 2),
(66, 1, 13, 3, 3),
(67, 1, 14, 1, 3),
(68, 1, 14, 2, 3),
(69, 1, 14, 3, 4),
(70, 1, 14, 4, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `idEventType` (`idEventType`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idDocumentType` (`idDocumentType`),
  ADD KEY `idLevel` (`idLevel`);

--
-- Индексы таблицы `achievementsKTD`
--
ALTER TABLE `achievementsKTD`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idTypeContest` (`idTypeContest`),
  ADD KEY `idDocumentType` (`idDocumentType`),
  ADD KEY `idDocument` (`idDocument`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `idLevel` (`idLevel`);

--
-- Индексы таблицы `achievementsPresident`
--
ALTER TABLE `achievementsPresident`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Индексы таблицы `achievementsSport`
--
ALTER TABLE `achievementsSport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idTypeContest` (`idTypeContest`),
  ADD KEY `idDocumentType` (`idDocumentType`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `idLevel` (`idLevel`);

--
-- Индексы таблицы `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idType` (`idType`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idAuthorship` (`idAuthorship`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Индексы таблицы `authorship`
--
ALTER TABLE `authorship`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `educationLevel`
--
ALTER TABLE `educationLevel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `eventType`
--
ALTER TABLE `eventType`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `facultet`
--
ALTER TABLE `facultet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUniversity` (`idUniversity`);

--
-- Индексы таблицы `grants`
--
ALTER TABLE `grants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTypeContest` (`idTypeContest`),
  ADD KEY `idScienceDirection` (`idScienceDirection`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `typeGrant` (`typeGrant`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idLevel` (`idLevel`);

--
-- Индексы таблицы `grantType`
--
ALTER TABLE `grantType`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ktdParticipation`
--
ALTER TABLE `ktdParticipation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `idStatus` (`idStatus`,`idLevel`),
  ADD KEY `idLevel` (`idLevel`),
  ADD KEY `idTypeParticipant` (`idTypeParticipant`);

--
-- Индексы таблицы `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `napravlenie`
--
ALTER TABLE `napravlenie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFacultet` (`idFacultet`);

--
-- Индексы таблицы `patents`
--
ALTER TABLE `patents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTypePatent` (`idTypePatent`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `publicPerformance`
--
ALTER TABLE `publicPerformance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idTypePublicPerformance` (`idTypePublicPerformance`),
  ADD KEY `idDocumentType` (`idDocumentType`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `idLevel` (`idLevel`);

--
-- Индексы таблицы `quotas`
--
ALTER TABLE `quotas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `scienceDirection`
--
ALTER TABLE `scienceDirection`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sgroup`
--
ALTER TABLE `sgroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idNapravlenie` (`idNapravlenie`);

--
-- Индексы таблицы `socialParticipation`
--
ALTER TABLE `socialParticipation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idLevel` (`idLevel`),
  ADD KEY `idTypeParticipant` (`idTypeParticipant`);

--
-- Индексы таблицы `sotrudnik`
--
ALTER TABLE `sotrudnik`
  ADD PRIMARY KEY (`idSotrudnik`),
  ADD KEY `idCity` (`idCity`),
  ADD KEY `idUniversity` (`idUniversity`),
  ADD KEY `idFacultet` (`idFacultet`);

--
-- Индексы таблицы `sportParticipation`
--
ALTER TABLE `sportParticipation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `idStatus` (`idStatus`,`idLevel`,`idTypeParticipant`),
  ADD KEY `idLevel` (`idLevel`),
  ADD KEY `idTypeParticipant` (`idTypeParticipant`);

--
-- Индексы таблицы `statusEvent`
--
ALTER TABLE `statusEvent`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statusPatent`
--
ALTER TABLE `statusPatent`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `studentRating`
--
ALTER TABLE `studentRating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `idActivity` (`idActivity`),
  ADD KEY `idFacultet` (`idFacultet`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`idStudent`),
  ADD KEY `idCity` (`idCity`),
  ADD KEY `idLevel` (`idLevel`),
  ADD KEY `idFacultet` (`idFacultet`),
  ADD KEY `idNapravlenie` (`idNapravlenie`),
  ADD KEY `idGroup` (`idGroup`),
  ADD KEY `idUniversity` (`idUniversity`);

--
-- Индексы таблицы `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `typeArticle`
--
ALTER TABLE `typeArticle`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `typeContest`
--
ALTER TABLE `typeContest`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `typeDocument`
--
ALTER TABLE `typeDocument`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `typeParticipant`
--
ALTER TABLE `typeParticipant`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `typePatent`
--
ALTER TABLE `typePatent`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `typePublicPerformance`
--
ALTER TABLE `typePublicPerformance`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `typeSocialParticipation`
--
ALTER TABLE `typeSocialParticipation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCity` (`idCity`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `valuesRating`
--
ALTER TABLE `valuesRating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFacultet` (`idFacultet`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `achievementsKTD`
--
ALTER TABLE `achievementsKTD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `achievementsPresident`
--
ALTER TABLE `achievementsPresident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `achievementsSport`
--
ALTER TABLE `achievementsSport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `authorship`
--
ALTER TABLE `authorship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `eventType`
--
ALTER TABLE `eventType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `facultet`
--
ALTER TABLE `facultet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `grants`
--
ALTER TABLE `grants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `grantType`
--
ALTER TABLE `grantType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `ktdParticipation`
--
ALTER TABLE `ktdParticipation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `napravlenie`
--
ALTER TABLE `napravlenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `patents`
--
ALTER TABLE `patents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `publicPerformance`
--
ALTER TABLE `publicPerformance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `scienceDirection`
--
ALTER TABLE `scienceDirection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `sgroup`
--
ALTER TABLE `sgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `socialParticipation`
--
ALTER TABLE `socialParticipation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `sportParticipation`
--
ALTER TABLE `sportParticipation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `statusEvent`
--
ALTER TABLE `statusEvent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `statusPatent`
--
ALTER TABLE `statusPatent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `studentRating`
--
ALTER TABLE `studentRating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `table`
--
ALTER TABLE `table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `typeArticle`
--
ALTER TABLE `typeArticle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `typeContest`
--
ALTER TABLE `typeContest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `typeDocument`
--
ALTER TABLE `typeDocument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `typeParticipant`
--
ALTER TABLE `typeParticipant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `typePatent`
--
ALTER TABLE `typePatent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `typePublicPerformance`
--
ALTER TABLE `typePublicPerformance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблицы `typeSocialParticipation`
--
ALTER TABLE `typeSocialParticipation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT для таблицы `valuesRating`
--
ALTER TABLE `valuesRating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievements_ibfk_2` FOREIGN KEY (`idEventType`) REFERENCES `eventType` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievements_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievements_ibfk_4` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievements_ibfk_5` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`);

--
-- Ограничения внешнего ключа таблицы `achievementsKTD`
--
ALTER TABLE `achievementsKTD`
  ADD CONSTRAINT `achievementsKTD_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsKTD_ibfk_2` FOREIGN KEY (`idTypeContest`) REFERENCES `eventType` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsKTD_ibfk_6` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `achievementsPresident`
--
ALTER TABLE `achievementsPresident`
  ADD CONSTRAINT `achievementsPresident_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`);

--
-- Ограничения внешнего ключа таблицы `achievementsSport`
--
ALTER TABLE `achievementsSport`
  ADD CONSTRAINT `achievementsSport_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsSport_ibfk_2` FOREIGN KEY (`idTypeContest`) REFERENCES `eventType` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsSport_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsSport_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `achievementsSport_ibfk_6` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `typeArticle` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`idAuthorship`) REFERENCES `authorship` (`id`),
  ADD CONSTRAINT `articles_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `facultet`
--
ALTER TABLE `facultet`
  ADD CONSTRAINT `facultet_ibfk_1` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`);

--
-- Ограничения внешнего ключа таблицы `grants`
--
ALTER TABLE `grants`
  ADD CONSTRAINT `grants_ibfk_1` FOREIGN KEY (`idTypeContest`) REFERENCES `typeContest` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grants_ibfk_2` FOREIGN KEY (`idScienceDirection`) REFERENCES `scienceDirection` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grants_ibfk_4` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grants_ibfk_5` FOREIGN KEY (`typeGrant`) REFERENCES `grantType` (`id`),
  ADD CONSTRAINT `grants_ibfk_6` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grants_ibfk_7` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ktdParticipation`
--
ALTER TABLE `ktdParticipation`
  ADD CONSTRAINT `ktdParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ktdParticipation_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ktdParticipation_ibfk_4` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ktdParticipation_ibfk_5` FOREIGN KEY (`idTypeParticipant`) REFERENCES `typeParticipant` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `napravlenie`
--
ALTER TABLE `napravlenie`
  ADD CONSTRAINT `napravlenie_ibfk_1` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `patents`
--
ALTER TABLE `patents`
  ADD CONSTRAINT `patents_ibfk_1` FOREIGN KEY (`idTypePatent`) REFERENCES `typePatent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `patents_ibfk_3` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patents_ibfk_4` FOREIGN KEY (`status`) REFERENCES `statusPatent` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `publicPerformance`
--
ALTER TABLE `publicPerformance`
  ADD CONSTRAINT `publicPerformance_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `publicPerformance_ibfk_2` FOREIGN KEY (`idTypePublicPerformance`) REFERENCES `typePublicPerformance` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `publicPerformance_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `publicPerformance_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publicPerformance_ibfk_6` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sgroup`
--
ALTER TABLE `sgroup`
  ADD CONSTRAINT `sgroup_ibfk_1` FOREIGN KEY (`idNapravlenie`) REFERENCES `napravlenie` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `socialParticipation`
--
ALTER TABLE `socialParticipation`
  ADD CONSTRAINT `socialParticipation_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `socialParticipation_ibfk_2` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `socialParticipation_ibfk_3` FOREIGN KEY (`idTypeParticipant`) REFERENCES `typeParticipant` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `socialParticipation_ibfk_4` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sotrudnik`
--
ALTER TABLE `sotrudnik`
  ADD CONSTRAINT `sotrudnik_ibfk_1` FOREIGN KEY (`idSotrudnik`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `sotrudnik_ibfk_2` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `sotrudnik_ibfk_3` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `sotrudnik_ibfk_4` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`);

--
-- Ограничения внешнего ключа таблицы `sportParticipation`
--
ALTER TABLE `sportParticipation`
  ADD CONSTRAINT `sportParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sportParticipation_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sportParticipation_ibfk_4` FOREIGN KEY (`idLevel`) REFERENCES `level` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sportParticipation_ibfk_5` FOREIGN KEY (`idTypeParticipant`) REFERENCES `typeParticipant` (`id`);

--
-- Ограничения внешнего ключа таблицы `studentRating`
--
ALTER TABLE `studentRating`
  ADD CONSTRAINT `studentrating_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`idStudent`),
  ADD CONSTRAINT `studentrating_ibfk_2` FOREIGN KEY (`idActivity`) REFERENCES `activity` (`id`);

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`idLevel`) REFERENCES `educationLevel` (`id`),
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`),
  ADD CONSTRAINT `students_ibfk_6` FOREIGN KEY (`idNapravlenie`) REFERENCES `napravlenie` (`id`),
  ADD CONSTRAINT `students_ibfk_7` FOREIGN KEY (`idGroup`) REFERENCES `sgroup` (`id`),
  ADD CONSTRAINT `students_ibfk_8` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`);

--
-- Ограничения внешнего ключа таблицы `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`);

--
-- Ограничения внешнего ключа таблицы `valuesRating`
--
ALTER TABLE `valuesRating`
  ADD CONSTRAINT `valuesRating_ibfk_1` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
