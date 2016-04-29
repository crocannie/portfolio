-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2016 at 04:11 PM
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
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `secondName` varchar(256) NOT NULL,
  `firstName` varchar(256) NOT NULL,
  `midleName` varchar(256) NOT NULL,
  `idCity` int(11) NOT NULL,
  `idUniversity` int(11) NOT NULL,
  `idFacultet` int(11) NOT NULL,
  `position` varchar(256) NOT NULL,
  `password` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `email`, `secondName`, `firstName`, `midleName`, `idCity`, `idUniversity`, `idFacultet`, `position`, `password`) VALUES
(1, 'fmiit@asu.edu.ru', 'Васильева', 'Мария', 'Александровна', 1, 1, 2, '', '$2y$13$RujcYERNnsdHSRc8IYYOMOodYJutQTGyaI3BlKX4sYQ/mO5m4NgOO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
