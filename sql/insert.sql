-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost:8889
-- Время создания: Мар 20 2016 г., 13:00
-- Версия сервера: 5.5.42
-- Версия PHP: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `dateEvent` date NOT NULL,
  `idEventType` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `eventTitle` varchar(512) NOT NULL,
  `idDocumentType` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `achievements`
--

INSERT INTO `achievements` (`id`, `name`, `dateEvent`, `idEventType`, `idStatus`, `eventTitle`, `idDocumentType`, `idDocument`, `idStudent`, `location`) VALUES
(28, 'Предметная олимпиада по информационным системам «Университет будущего»', '2015-10-10', 2, 2, 'Университет будущего', 2, 63, 47, ''),
(42, 'adweyrtiyui;o', '2016-02-10', 1, 1, 'esrdytuykulk;l', 1, NULL, 47, '');

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
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `achievementsKTD`
--

INSERT INTO `achievementsKTD` (`id`, `name`, `idStatus`, `idTypeContest`, `year`, `idDocumentType`, `idDocument`, `idStudent`, `location`) VALUES
(1, 'dfdhgf', 2, 3, '0000-00-00', 2, 82, 9, ''),
(2, 'DFDDFFD', 2, 2, '0000-00-00', 2, 58, 9, ''),
(3, '12121qwas', 1, 1, '1900-12-07', 1, NULL, 47, ''),
(4, '1qwas', 1, 1, '2016-03-01', 1, NULL, 47, ''),
(5, 'ячфыйц', 1, 1, '2016-03-01', 1, NULL, 47, ''),
(6, 'цыав', 1, 1, '2016-03-02', 1, NULL, 47, ''),
(7, 'цыав', 1, 1, '2016-03-02', 1, NULL, 47, 'uploads/gpBCxuEP73o.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `achievementsPresident`
--

CREATE TABLE `achievementsPresident` (
  `id` int(11) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `idDocument` int(11) NOT NULL,
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
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `achievementsSport`
--

INSERT INTO `achievementsSport` (`id`, `name`, `idStatus`, `idTypeContest`, `year`, `idDocumentType`, `idDocument`, `idStudent`, `location`) VALUES
(1, 'setryuiilo', 1, 1, '0000-00-00', 1, 94, 9, ''),
(3, 'asdfg', 1, 2, '2016-03-01', 1, NULL, 47, 'uploads/requirements.php'),
(4, 'asdfg', 1, 2, '2016-03-01', 1, NULL, 47, 'uploads/requirements.php'),
(5, '21wd', 1, 1, '2016-03-15', 2, NULL, 47, 'uploads/fc80188118d699e73f8a56b25f97ff45.svg');

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `year` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `idAuthorship` int(11) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `volumePublication` int(11) NOT NULL,
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `idType`, `name`, `year`, `idStatus`, `idAuthorship`, `idDocument`, `idStudent`, `volumePublication`, `location`) VALUES
(7, 1, 'АНАЛИЗ НОМЕНКЛАТУРЫ ПРОГРАММНЫХ СРЕДСТВ МАССОВОГО ИСПОЛЬЗОВАНИЯ, ПРИМЕНЯЕМЫХ В РОССИЙСКИХ ВУЗАХ(НА ПРИМЕРЕ АСТРАХАНСКОГО ГОСУДАР', 2015, 1, 2, 59, 9, 8, ''),
(8, 2, 'Фитоняшки', 2015, 2, 1, 98, 9, 10, ''),
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
-- Структура таблицы `authorship`
--

CREATE TABLE `authorship` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authorship`
--

INSERT INTO `authorship` (`id`, `name`, `value`) VALUES
(1, 'без соавторства', NULL),
(2, 'в соавторстве', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` char(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Астрахань'),
(2, 'Москва'),
(3, 'Волгоград');

-- --------------------------------------------------------

--
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `userFileName` varchar(256) NOT NULL,
  `tmpFileName` varchar(256) NOT NULL,
  `size` float NOT NULL,
  `location` varchar(1024) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `documents`
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
-- Структура таблицы `eventType`
--

CREATE TABLE `eventType` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `eventType`
--

INSERT INTO `eventType` (`id`, `name`) VALUES
(1, 'олимпиада'),
(2, 'соревнование'),
(3, 'программа');

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
(1, 'физико-технический', 1),
(2, 'математики и информационных технологий', 1),
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
  `dateBegin` date DEFAULT NULL,
  `dateEnd` date DEFAULT NULL,
  `regNumberCitis` char(128) DEFAULT NULL,
  `regNumber` char(128) DEFAULT NULL,
  `idTypeContest` int(11) DEFAULT NULL,
  `idScienceDirection` int(11) DEFAULT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `grants`
--

INSERT INTO `grants` (`id`, `nameProject`, `nameOrganization`, `dateBegin`, `dateEnd`, `regNumberCitis`, `regNumber`, `idTypeContest`, `idScienceDirection`, `idDocument`, `idStudent`, `location`) VALUES
(2, 'победитель программы\r\n"У.М.Н.И.К." Астинтех (2009)', 'УМНИК', '2016-02-02', '2016-02-10', 'dfghjkl', 'esrtyuio', 1, 2, 71, 47, ''),
(3, 'грант УМНИК ', 'УМНИК', '2016-02-08', '2016-02-15', 'у454455', '22435', 3, NULL, 97, 9, ''),
(4, 'dfdfdf', 'dfdffd', '2016-02-02', '2016-02-17', 'dfdf', 'dfdfdf', 2, NULL, 101, 9, ''),
(5, 'dgаропдл', 'esfsfsfsf', '2016-03-01', '2016-03-17', '345678', '3456789', 1, 4, NULL, 47, NULL),
(6, 'esfd', 'jhhl', '2016-03-10', '2016-03-31', '345678', '3456789', 1, 8, NULL, 47, 'uploads/passwordResetToken.php');

-- --------------------------------------------------------

--
-- Структура таблицы `ktdParticipation`
--

CREATE TABLE `ktdParticipation` (
  `id` int(11) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `location` varchar(512) NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ktdParticipation`
--

INSERT INTO `ktdParticipation` (`id`, `description`, `count`, `date`, `location`, `idDocument`, `idStudent`) VALUES
(3, 'DFDF', 1, '0000-00-00', '', 57, 9),
(7, 'werytuiy', 4, '0000-00-00', '', 93, 47),
(8, '1234к', 1, '2016-03-01', '', NULL, 47),
(9, 'eihrukskjf', 1, '2016-03-01', 'uploads/README.md', NULL, 47);

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `napravlenie`
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
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patents`
--

INSERT INTO `patents` (`id`, `name`, `idTypePatent`, `copyrightHolder`, `description`, `status`, `dateApp`, `dateReg`, `regNumber`, `appNumber`, `idDocument`, `idStudent`, `location`) VALUES
(1, 'asdfgrgd', 1, 'ukhfgfbf', 'sadad', 1, '2016-03-02', '2016-03-10', 12345678, 9876543, NULL, 47, ''),
(2, '1asdfgrgd', 3, 'ukhfgfbf', 'ыааы', 2, '2016-03-02', '2016-03-10', 12345678, 9876543, NULL, 47, ''),
(3, '2asdfgrgd', 2, 'ukhfgfbf', 'выаыв', 1, '2016-03-02', '2016-03-10', 12345678, 9876543, NULL, 47, ''),
(4, '122323', 2, 'ukhfgfbf', 'выаыв', 1, '2016-03-02', '2016-03-10', 12345678, 9876543, NULL, 47, 'uploads/gpBCxuEP73o.jpg');

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
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publicPerformance`
--

INSERT INTO `publicPerformance` (`id`, `name`, `idStatus`, `idTypePublicPerformance`, `year`, `idDocumentType`, `idDocument`, `idStudent`, `location`) VALUES
(1, 'ыпреолргшж', 1, 1, '0000-00-00', 1, 86, 9, ''),
(2, 'олк', 1, 2, '2016-03-01', 1, NULL, 47, ''),
(3, '5кам', 2, 4, '2016-03-02', 1, NULL, 47, 'uploads/composer.json');

-- --------------------------------------------------------

--
-- Структура таблицы `rni`
--

CREATE TABLE `rni` (
  `id` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  `r2` double NOT NULL,
  `r3` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ru`
--

CREATE TABLE `ru` (
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ru`
--

INSERT INTO `ru` (`idStudent`, `r1`) VALUES
(9, 110);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sgroup`
--

INSERT INTO `sgroup` (`id`, `name`, `idNapravlenie`) VALUES
(1, 'ЗИ', 4),
(2, 'ТС', 1),
(3, 'ХИ', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `socialParticipation`
--

CREATE TABLE `socialParticipation` (
  `id` int(11) NOT NULL,
  `idSocialParticipationType` int(11) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `socialParticipation`
--

INSERT INTO `socialParticipation` (`id`, `idSocialParticipationType`, `description`, `count`, `date`, `idDocument`, `idStudent`, `location`) VALUES
(9, 1, 'Акция', 1, '0000-00-00', 100, 9, ''),
(10, 1, '1qwaszx', 3, '2016-03-01', NULL, 47, ''),
(11, 1, '2йцфыяч', 2, '2016-03-02', NULL, 47, ''),
(12, 1, '2йцфыяч', 2, '2016-03-02', NULL, 47, 'uploads/gpBCxuEP73o.jpg'),
(13, 2, '34qw', 3, '2016-03-09', NULL, 47, 'uploads/gpBCxuEP73o.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `sportParticipation`
--

CREATE TABLE `sportParticipation` (
  `id` int(11) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `idDocument` int(11) DEFAULT NULL,
  `idStudent` int(11) NOT NULL,
  `location` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sportParticipation`
--

INSERT INTO `sportParticipation` (`id`, `description`, `count`, `date`, `idDocument`, `idStudent`, `location`) VALUES
(1, 'kkjlj;k', 9, '0000-00-00', 96, 9, ''),
(2, '3dde', 3, '2016-03-11', NULL, 47, 'uploads/yii.bat');

-- --------------------------------------------------------

--
-- Структура таблицы `statusEvent`
--

CREATE TABLE `statusEvent` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statusEvent`
--

INSERT INTO `statusEvent` (`id`, `name`, `value`) VALUES
(1, 'международное', 10),
(2, 'региональное', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `statusPatent`
--

CREATE TABLE `statusPatent` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statusPatent`
--

INSERT INTO `statusPatent` (`id`, `name`, `value`) VALUES
(1, 'Отправлена заявка', NULL),
(2, 'Получен сертификат', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
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
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `secondName`, `firstName`, `midleName`, `idCity`, `idUniversity`, `idFacultet`, `idNapravlenie`, `idGroup`, `email`, `password`, `registrationCode`, `login`, `status`) VALUES
(9, 'Петрова', 'Иван', 'Иванович', 1, 1, 2, 3, NULL, 'qwaszx@gmail.com', '376c43878878ac04e05946ec1dd7a55f', '', 0, 0),
(47, 'Алехин', 'Михаил', 'Владимирович', 2, 3, 4, 5, 3, 'a1@gmail.com', '$2y$13$6zOM.ekj38y64VKR.Nj1FubPN.aXV36wzsMPVmuliXWVeHa4b9FWS', NULL, NULL, NULL),
(48, 'Петрова', 'София', 'Владимировна', 1, 1, 1, 1, 2, 'a2@gmail.com', 'qwaszx', NULL, NULL, NULL),
(49, 'Овсяенко', 'Маргарита', 'Алексеевна', 1, 1, 1, 1, 2, 'a3@gmail.com', '$2y$13$w/gcArQ6hbsWuUlVKMM/4.KQwXDx9EhgJMAoxvlwFBB8/aQynn7X2', NULL, NULL, NULL),
(50, 'Иванов', 'София', 'DFHGHL', 1, 1, 1, 1, 2, 'a4@gmail.com', '$2y$13$RujcYERNnsdHSRc8IYYOMOodYJutQTGyaI3BlKX4sYQ/mO5m4NgOO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `typeArticle`
--

CREATE TABLE `typeArticle` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typeArticle`
--

INSERT INTO `typeArticle` (`id`, `name`, `value`) VALUES
(1, 'статья в журнале', 90),
(2, 'тезисы докладов', 70);

-- --------------------------------------------------------

--
-- Структура таблицы `typeContest`
--

CREATE TABLE `typeContest` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typeContest`
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
-- Структура таблицы `typeDocument`
--

CREATE TABLE `typeDocument` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typeDocument`
--

INSERT INTO `typeDocument` (`id`, `name`, `value`) VALUES
(1, 'диплом 1 степени', NULL),
(2, 'диплом 2 степени', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `typePatent`
--

CREATE TABLE `typePatent` (
  `id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typePatent`
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
-- Структура таблицы `typePublicPerformance`
--

CREATE TABLE `typePublicPerformance` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typePublicPerformance`
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
-- Структура таблицы `typeSocialParticipation`
--

CREATE TABLE `typeSocialParticipation` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typeSocialParticipation`
--

INSERT INTO `typeSocialParticipation` (`id`, `name`, `value`) VALUES
(1, 'Социально ориентированные, культурные\r\n(культурно-просветительские, культурно-\r\nвоспитательные) деятельности в форме\r\nшефской помощи, благотворительных акций и\r\nиных подобных формах', NULL),
(2, 'Общественная\r\nдеятельность, направленная на пропаганду\r\nобщечеловеческих ценностей, уважения к\r\nправам и свободам человека, а также на защиту\r\nприроды', NULL),
(3, 'Общественно значимые культурно-массовые\r\nмероприятия', NULL),
(4, 'Деятельности по информационному\nобеспечению общественно значимых\nмероприятий, общественной жизни учреждения\nвысшего профессионального образования (в\nразработке сайта учреждения высшего\nпрофессионального образования, организации и\nобеспечении деятельн', NULL),
(5, 'Деятельность по информационному\nобеспечению общественно значимых\nмероприятий, общественной жизни учреждения\nвысшего профессионального образования ', NULL);

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
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'qtrt', 'Lql-BAgssiMDTP8ZI0GtpE0AEmkK5MMb', '$2y$13$j249ngPXYzf2wNip/7pDwePFntn2tROptuG3Rr60I0.uJhKrE28iu', NULL, 'a007@gmail.com', 10, 1456829315, 1456829315),
(2, 'qw', 'vTOD-3_kGuuUfkrreOyUuU-ki-AZv_ep', '$2y$13$8Ub/4MDj0Gdu8u0JfxE/2OCSo1JUMZlk7/axB3gS8LwuTTppv.lZa', NULL, 'a008@gmail.com', 10, 1456829845, 1456829845);

-- --------------------------------------------------------

--
-- Структура таблицы `value`
--

CREATE TABLE `value` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `value`
--

INSERT INTO `value` (`id`, `name`, `value`) VALUES
(1, 'грант', 90),
(2, 'патент', 80);

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
  ADD KEY `idDocument` (`idDocument`);

--
-- Индексы таблицы `achievementsKTD`
--
ALTER TABLE `achievementsKTD`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idTypeContest` (`idTypeContest`),
  ADD KEY `idDocumentType` (`idDocumentType`),
  ADD KEY `idDocument` (`idDocument`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Индексы таблицы `achievementsPresident`
--
ALTER TABLE `achievementsPresident`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDocument` (`idDocument`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Индексы таблицы `achievementsSport`
--
ALTER TABLE `achievementsSport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idTypeContest` (`idTypeContest`),
  ADD KEY `idDocumentType` (`idDocumentType`),
  ADD KEY `idDocument` (`idDocument`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idType` (`idType`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idAuthorship` (`idAuthorship`),
  ADD KEY `idDocument` (`idDocument`),
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
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
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
  ADD KEY `idDocument` (`idDocument`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Индексы таблицы `ktdParticipation`
--
ALTER TABLE `ktdParticipation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDocument` (`idDocument`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `idDocument` (`idDocument`),
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
  ADD KEY `idDocument` (`idDocument`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Индексы таблицы `rni`
--
ALTER TABLE `rni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Индексы таблицы `ru`
--
ALTER TABLE `ru`
  ADD PRIMARY KEY (`idStudent`);

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
  ADD KEY `idDocument` (`idDocument`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Индексы таблицы `sportParticipation`
--
ALTER TABLE `sportParticipation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDocument` (`idDocument`),
  ADD KEY `idStudent` (`idStudent`);

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
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCity` (`idCity`),
  ADD KEY `idUniversity` (`idUniversity`),
  ADD KEY `idFacultet` (`idFacultet`),
  ADD KEY `idNapravlenie` (`idNapravlenie`),
  ADD KEY `idGroup` (`idGroup`);

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
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `value`
--
ALTER TABLE `value`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT для таблицы `achievementsKTD`
--
ALTER TABLE `achievementsKTD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `achievementsPresident`
--
ALTER TABLE `achievementsPresident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `achievementsSport`
--
ALTER TABLE `achievementsSport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT для таблицы `authorship`
--
ALTER TABLE `authorship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT для таблицы `eventType`
--
ALTER TABLE `eventType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `facultet`
--
ALTER TABLE `facultet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `grants`
--
ALTER TABLE `grants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `ktdParticipation`
--
ALTER TABLE `ktdParticipation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `napravlenie`
--
ALTER TABLE `napravlenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `patents`
--
ALTER TABLE `patents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `publicPerformance`
--
ALTER TABLE `publicPerformance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `rni`
--
ALTER TABLE `rni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `scienceDirection`
--
ALTER TABLE `scienceDirection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `sgroup`
--
ALTER TABLE `sgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `socialParticipation`
--
ALTER TABLE `socialParticipation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `sportParticipation`
--
ALTER TABLE `sportParticipation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `statusEvent`
--
ALTER TABLE `statusEvent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `statusPatent`
--
ALTER TABLE `statusPatent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `typeArticle`
--
ALTER TABLE `typeArticle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `typeContest`
--
ALTER TABLE `typeContest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `typeDocument`
--
ALTER TABLE `typeDocument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `value`
--
ALTER TABLE `value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `achievements_ibfk_2` FOREIGN KEY (`idEventType`) REFERENCES `eventType` (`id`),
  ADD CONSTRAINT `achievements_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  ADD CONSTRAINT `achievements_ibfk_4` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  ADD CONSTRAINT `achievements_ibfk_5` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`);

--
-- Ограничения внешнего ключа таблицы `achievementsKTD`
--
ALTER TABLE `achievementsKTD`
  ADD CONSTRAINT `achievementsKTD_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_2` FOREIGN KEY (`idTypeContest`) REFERENCES `eventType` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `achievementsKTD_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `achievementsPresident`
--
ALTER TABLE `achievementsPresident`
  ADD CONSTRAINT `achievementsPresident_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `achievementsPresident_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `achievementsSport`
--
ALTER TABLE `achievementsSport`
  ADD CONSTRAINT `achievementsSport_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  ADD CONSTRAINT `achievementsSport_ibfk_2` FOREIGN KEY (`idTypeContest`) REFERENCES `eventType` (`id`),
  ADD CONSTRAINT `achievementsSport_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  ADD CONSTRAINT `achievementsSport_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `achievementsSport_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `typeArticle` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`idAuthorship`) REFERENCES `authorship` (`id`),
  ADD CONSTRAINT `articles_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `articles_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `facultet`
--
ALTER TABLE `facultet`
  ADD CONSTRAINT `facultet_ibfk_1` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`);

--
-- Ограничения внешнего ключа таблицы `grants`
--
ALTER TABLE `grants`
  ADD CONSTRAINT `grants_ibfk_1` FOREIGN KEY (`idTypeContest`) REFERENCES `typeContest` (`id`),
  ADD CONSTRAINT `grants_ibfk_2` FOREIGN KEY (`idScienceDirection`) REFERENCES `scienceDirection` (`id`),
  ADD CONSTRAINT `grants_ibfk_3` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `grants_ibfk_4` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `ktdParticipation`
--
ALTER TABLE `ktdParticipation`
  ADD CONSTRAINT `ktdParticipation_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `ktdParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `napravlenie`
--
ALTER TABLE `napravlenie`
  ADD CONSTRAINT `napravlenie_ibfk_1` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`);

--
-- Ограничения внешнего ключа таблицы `patents`
--
ALTER TABLE `patents`
  ADD CONSTRAINT `patents_ibfk_1` FOREIGN KEY (`idTypePatent`) REFERENCES `typePatent` (`id`),
  ADD CONSTRAINT `patents_ibfk_2` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `patents_ibfk_3` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `patents_ibfk_4` FOREIGN KEY (`status`) REFERENCES `statusPatent` (`id`);

--
-- Ограничения внешнего ключа таблицы `publicPerformance`
--
ALTER TABLE `publicPerformance`
  ADD CONSTRAINT `publicPerformance_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `statusEvent` (`id`),
  ADD CONSTRAINT `publicPerformance_ibfk_2` FOREIGN KEY (`idTypePublicPerformance`) REFERENCES `typePublicPerformance` (`id`),
  ADD CONSTRAINT `publicPerformance_ibfk_3` FOREIGN KEY (`idDocumentType`) REFERENCES `typeDocument` (`id`),
  ADD CONSTRAINT `publicPerformance_ibfk_4` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `publicPerformance_ibfk_5` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `rni`
--
ALTER TABLE `rni`
  ADD CONSTRAINT `rni_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `sgroup`
--
ALTER TABLE `sgroup`
  ADD CONSTRAINT `sgroup_ibfk_1` FOREIGN KEY (`idNapravlenie`) REFERENCES `napravlenie` (`id`);

--
-- Ограничения внешнего ключа таблицы `socialParticipation`
--
ALTER TABLE `socialParticipation`
  ADD CONSTRAINT `socialParticipation_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `socialParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `sportParticipation`
--
ALTER TABLE `sportParticipation`
  ADD CONSTRAINT `sportParticipation_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `sportParticipation_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`idUniversity`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`idFacultet`) REFERENCES `facultet` (`id`),
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`idNapravlenie`) REFERENCES `napravlenie` (`id`),
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`idGroup`) REFERENCES `sgroup` (`id`);

--
-- Ограничения внешнего ключа таблицы `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`idCity`) REFERENCES `cities` (`id`);
