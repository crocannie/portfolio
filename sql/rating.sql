-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2016 at 09:23 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratingCulture`
--
ALTER TABLE `ratingCulture`
  ADD CONSTRAINT `ratingCulture_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Constraints for table `ratingScience`
--
ALTER TABLE `ratingScience`
  ADD CONSTRAINT `ratingScience_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

--
-- Constraints for table `ratingSport`
--
ALTER TABLE `ratingSport`
  ADD CONSTRAINT `ratingSport_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
