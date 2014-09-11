-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2014 at 05:30 PM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `file_management`
--
CREATE DATABASE IF NOT EXISTS `file_management` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `file_management`;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `name`, `slug`, `date`) VALUES
(3, 'Zing Mp3', 'T29JCXTHXW', '2014-09-09 11:09:43'),
(5, 'Zalo', 'YTJF06XMAI', '2014-09-10 20:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `statistic`
--

DROP TABLE IF EXISTS `statistic`;
CREATE TABLE IF NOT EXISTS `statistic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `file_id` int(11) NOT NULL,
  `apk` int(11) NOT NULL DEFAULT '0',
  `ipa` int(11) NOT NULL DEFAULT '0',
  `jar` int(11) NOT NULL DEFAULT '0',
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `statistic`
--

INSERT INTO `statistic` (`id`, `day`, `file_id`, `apk`, `ipa`, `jar`, `date`) VALUES
(1, '2014-09-07 19:03:37', 3, 0, 0, 0, '8092014'),
(2, '2014-09-08 19:03:37', 3, 0, 0, 0, '9092014'),
(3, '2014-09-09 19:03:37', 3, 1, 2, 3, '10092014'),
(5, '2014-09-10 19:03:37', 3, 0, 0, 0, '11092014'),
(23, '2014-09-10 19:03:37', 5, 0, 0, 0, '11092014');

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

DROP TABLE IF EXISTS `url`;
CREATE TABLE IF NOT EXISTS `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `type` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `day_click` int(11) NOT NULL DEFAULT '0',
  `month_click` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `day_update` int(2) DEFAULT NULL,
  `month_update` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `file_id`, `type`, `url`, `day_click`, `month_click`, `total`, `day_update`, `month_update`) VALUES
(7, 3, 'apk', 'http://ic50.info/r/DG42CjURKi/apk', 0, 0, 0, 11, 9),
(8, 3, 'ipa', 'http://ic50.info/r/DG42CjURKi/ipa', 0, 0, 0, 11, 9),
(9, 3, 'jar', 'http://ic50.info/r/DG42CjURKi/jar', 0, 0, 0, 11, 9),
(13, 5, 'apk', 'http://gamehot.mobi/download/1455/ban-ca-an-xu', 0, 0, 0, 11, 9),
(14, 5, 'ipa', 'http://gamehot.mobi/download/1455/ban-ca-an-xu', 0, 0, 0, 11, 9),
(15, 5, 'jar', 'http://gamehot.mobi/download/1455/ban-ca-an-xu', 0, 0, 0, 11, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
