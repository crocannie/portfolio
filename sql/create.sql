create database portfolio character set utf8;

--Города
create table cities (
	id integer primary key not null auto_increment,
	name char(64) not null
);

--Учебные заведения
create table universities(
	id integer primary key not null auto_increment,
	name char(128) not null,
	idCity integer not null,
	foreign key(idCity) references cities(id)
);

create table users(
	id integer primary key not null auto_increment,
	login char(64) not null,
	password char(128) not null,
	role integer not null
);
--Студенты
create table students (
	id integer primary key not null auto_increment,
	secondName char(64) not null,
	firstName char(64) not null,
	midleName char(64) not null,
	idCity integer,
	idUniversity integer,		
	idFacultet integer,
	idNapravlenie integer,
	idGroup integer,
	login char(64) not null,
	email char(64) not null,
	password char(64) not null,
	registrationCode char(64),
	foreign key(idCity) references cities(id),
	foreign key(idUniversity) references universities(id),
	foreign key(idFacultet) references facultet(id),
	foreign key(idNapravlenie) references napravlenie(id),	
	foreign key(idGroup) references sgroup(id)
);

create table valuesRating (
	id integer primary key not null auto_increment,
	idFacultet integer not null,
	idTable integer not null,
	idItem integer not null,
	value integer,
	foreign key(idFacultet) references facultet(id),
);

create table st(
	idStudent integer primary key,
	secondName char(64) not null,
	firstName char(64) not null,
	midleName char(64) not null,
	idCity integer,
	idUniversity integer,
	idFacultet integer,
	idLevel integer,
	kurs integer,
	idNapravlenie integer,
	idGroup integer,
	foreign key(idStudent) references user(id),
	foreign key(idCity) references cities(id),
	foreign key(idLevel) references educationLevel(id),
	foreign key(idStudent) references user(id),
	foreign key(idFacultet) references facultet(id),
	foreign key(idNapravlenie) references napravlenie(id),	
	foreign key(idGroup) references sgroup(id)
);

create table sotrudnik(
	idSotrudnik integer primary key,
	secondName char(64) not null,
	firstName char(64) not null,
	midleName char(64) not null,
	idCity integer,
	idUniversity integer,
	idFacultet integer,
	dolzn char(64) not null,
	foreign key(idSotrudnik) references user(id),
	foreign key(idCity) references cities(id),
	foreign key(idUniversity) references universities(id),
	foreign key(idFacultet) references facultet(id)
);
--Факультеты
create table facultet(
	id integer primary key not null auto_increment,
	name char(128) not null,
	idUniversity integer not null,
	foreign key(idUniversity) references universities(id)
);

--Направления обучения
create table napravlenie(
	id integer primary key not null auto_increment,
	shifr char(128) not null,
	name char(128) not null,
	idFacultet integer not null,
	foreign key(idFacultet) references facultet(id)
);

--Группа студента
create table sgroup(
	id integer primary key not null auto_increment,
	name char(128) not null,
	idNapravlenie integer not null,
	foreign key(idNapravlenie) references napravlenie(id)
);

------

--Достижения
--Учебная
create table achievements (
	id integer primary key not null auto_increment,
	name char(128) not null,
	dateEvent date not null,
	idEventType integer not null,
	idStatus integer not null,	
	eventTitle varchar(512) not null,
	idDocumentType integer not null,
	idDocument integer,
	idStudent integer not null,
	foreign key(idStudent) references students(id),
	foreign key(idEventType) references eventType(id),
	foreign key(idStatus) references statusEvent(id),
	foreign key(idDocumentType) references documentType(id),
	foreign key(idDocument) references documents(id)
);

-- Вид мероприятия (олимпиада, конкурс)
create table eventType (
	id integer primary key not null auto_increment,
	name char(128) not null
);

-- Статус мероприятия (международное, региональное)
create table statusEvent (
	id integer primary key not null auto_increment,
	name char(128) not null,
	value integer
);

-- Вид полученного документа (диплом, сертификат)
create table documentType (
	id integer primary key not null auto_increment,
	name char(128) not null,
	value integer
);

--Документы
create table documents (
	id integer primary key not null auto_increment,
	idStudent integer not null,
	userFileName varchar(256) not null,
	tmpFileName varchar(256) not null,
	size float not null,
	location varchar(1024) not null
);

create table studentDocuments(
	idStudent integer not null,
	idDocument integer not null,
	foreign key(idStudent) references students(id),
	foreign key(idDocument) references documents(id)
);

--Статьи
create table articles(
	id integer primary key not null auto_increment,
	idType integer not null,
	name char(128) not null,
	year date not null,
	idLanguage integer not null,
	idStatus integer not null,	
	idAuthorship integer not null,
	idDocument integer not null,
	idStudent integer not null,
	foreign key(idType) references articleType(id),	
	foreign key(idLanguage) references languages(id),
	foreign key(idStatus) references statusEvent(id),
	foreign key(idAuthorship) references authorship(id),
	foreign key(idDocument) references documents(id),
	foreign key(idStudent) references students(id)
);

ALTER TABLE articles MODIFY year integer NOT NULL:
ALTER TABLE articles ADD volumePublication integer not null;

--Тип статьи
create table articleType(
	id integer primary key not null auto_increment,
	name char(128) not null,
	value integer
);

--Языки
create table languages(
	id integer primary key not null auto_increment,
	name char(128) not null
);

--Соавторство
create table authorship(
	id integer primary key not null auto_increment,
	name char(128) not null,
	value integer
);

--
--Гранты
create table grants (
	id integer primary key not null auto_increment,
	nameProject varchar(512),
	nameOrganization varchar(512),
	dateBegin date,
	dateEnd date,
	regNumberCitis char(128),
	regNumber char(128),
	idTypeContest integer,
	idScienceDirection integer,
	idDocument integer not null,
	idStudent integer not null,
	foreign key(idTypeContest) references typeContest(id),
	foreign key(idScienceDirection) references scienceDirection(id),
	foreign key(idDocument) references documents(id),
	foreign key(idStudent) references students(id)
);

--Вид конкурса для гранта
create table typeContest(
	id integer primary key not null auto_increment,
	name char(128) not null,
	value integer
);

--Направление науки для гранта
create table scienceDirection(
	id integer primary key not null auto_increment,
	name char(128) not null,
	value integer
);

--Патенты
create table patents(
	id integer primary key not null auto_increment,
	name varchar(512),
	idTypePatent integer,
	status integer,
	copyrightHolder varchar(512),
	description varchar(1024),
	dateApp date,
	dateReg date,
	regNumber integer,
	appNumber integer,
	idDocument integer not null,
	idStudent integer not null,
	foreign key(idTypePatent) references typePatent(id),
	foreign key(idDocument) references documents(id),
	foreign key(idStudent) references students(id)
);

--Вид патента
create table typePatent(
	id integer primary key not null auto_increment,
	name char(128) not null,
	value integer
);

create table statusPatent (
	id integer primary key not null auto_increment,
	name char(128) not null,
	value integer
);
alter table patents add CONSTRAINT foreign key(status) references statusPatent(id);
alter table articles drop column status;

alter table articles add CONSTRAINT foreign key(idLanguage) references languages(id);
alter table articles drop column idLanguage;

--Общественная
--Виды участий
create table socialParticipationType (
	id integer primary key not null auto_increment,
	name varchar(256) not null,
	value integer
);

create table socialParticipation(
	id integer primary key not null auto_increment,
	idSocialParticipationType integer,
	description varchar(1024),
	count integer,
	idDocument integer not null,
	idStudent integer not null,
	foreign key(idDocument) references documents(id),
	foreign key(idStudent) references students(id)
);

--Общественаня деятельность


--Награды за КТД
create table achievementsKTD(
	id integer primary key not null auto_increment,
	name varchar(256),
	idStatus integer,
	idTypeContest integer,
	year integer,
	idDocumentType integer not null,
	idDocument integer,
	idStudent integer not null,	
	foreign key(idStatus) references statusEvent(id),
	foreign key(idTypeContest) references eventType(id),
	foreign key(idDocumentType) references typeDocument(id),
	foreign key(idDocument) references documents(id),
	foreign key(idStudent) references students(id)
);

--Виды публичных представлений
create table typePublicPerformance(
	id integer primary key not null auto_increment,
	name varchar(256) not null,
	value integer
);

--Публичные выступления
create table publicPerformance(
	id integer primary key not null auto_increment,
	name varchar(256),
	idStatus integer,
	idTypePublicPerformance integer,
	year integer,
	idDocumentType integer not null,
	idDocument integer,
	idStudent integer not null,	
	foreign key(idStatus) references statusEvent(id),
	foreign key(idTypePublicPerformance) references typePublicPerformance(id),
	foreign key(idDocumentType) references typeDocument(id),
	foreign key(idDocument) references documents(id),
	foreign key(idStudent) references students(id)
);

create table ktdParticipation(
	id integer primary key not null auto_increment,
	description varchar(1024),
	count integer,
	idDocument integer not null,
	idStudent integer not null,
	foreign key(idDocument) references documents(id),
	foreign key(idStudent) references students(id)
);

--Спортивная
--Получение награды (приза) за результаты спортивной деятельности 
create table achievementsSport(
	id integer primary key not null auto_increment,
	name varchar(256),
	idStatus integer,
	idTypeContest integer,
	year integer,
	idDocumentType integer not null,
	idDocument integer,
	idStudent integer not null,	
	foreign key(idStatus) references statusEvent(id),
	foreign key(idTypeContest) references eventType(id),
	foreign key(idDocumentType) references typeDocument(id),
	foreign key(idDocument) references documents(id),
	foreign key(idStudent) references students(id)
);
-- участие студента в спортивных мероприятиях
create table sportParticipation(
	id integer primary key not null auto_increment,
	description varchar(1024),
	count integer,
	idDocument integer not null,
	idStudent integer not null,
	foreign key(idDocument) references documents(id),
	foreign key(idStudent) references students(id)
);
--Достижения в спортивной деятельности студентам, получающим стипендию Президента 
create table achievementsPresident(
	id integer primary key not null auto_increment,
	description varchar(1024),
	count integer,
	idDocument integer not null,
	idStudent integer not null,
	foreign key(idDocument) references documents(id),
	foreign key(idStudent) references students(id)
);

--РЕЙТИНГИ
--НИР
create table rni (
	id integer primary key not null auto_increment,
	idStudent integer not null,	
	r1 double not null,
	r2 double not null,
	r3 double not null,
	foreign key(idStudent) references students(id)
);

create table value(
	id integer primary key not null auto_increment,
	name varchar(256) not null,
	value integer
);

--Учебная
create table ru (
	idStudent integer primary key not null,	
	r1 double not null
	foreign key(idStudent) references students(id)
);

CREATE TABLE IF NOT EXISTS `ratingScience` (
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

CREATE TABLE IF NOT EXISTS `ratingStudy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  `status` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
	foreign key(idStudent) references students(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `ratingSocial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  `status` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
	foreign key(idStudent) references students(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `ratingCulture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  `r2` double NOT NULL,
  `r3` double NOT NULL,
  `status` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
	foreign key(idStudent) references students(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `ratingSport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `r1` double NOT NULL,
  `r2` double NOT NULL,
  `status` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
	foreign key(idStudent) references students(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;