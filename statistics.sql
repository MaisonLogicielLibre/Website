-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2015 at 06:30 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mll_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE IF NOT EXISTS `statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commits` int(11) NOT NULL,
  `pull_requests_open` int(11) NOT NULL,
  `pull_requests_close` int(11) NOT NULL,
  `issues_open` int(11) NOT NULL,
  `issues_close` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `commits`, `pull_requests_open`, `pull_requests_close`, `issues_open`, `issues_close`, `date`) VALUES
(1, 0, 0, 0, 0, 0, '2015-09-07 00:00:00'),
(2, 27, 9, 8, 24, 8, '2015-09-14 00:00:00'),
(3, 132, 43, 44, 40, 38, '2015-09-21 00:00:00'),
(4, 65, 37, 35, 21, 21, '2015-09-28 00:00:00'),
(5, 91, 22, 21, 9, 22, '2015-10-05 00:00:00'),
(6, 27, 11, 13, 15, 7, '2015-10-12 00:00:00'),
(7, 91, 28, 28, 34, 32, '2015-10-19 00:00:00'),
(8, 47, 19, 20, 32, 25, '2015-10-26 00:00:00'),
(9, 141, 46, 45, 33, 34, '2015-11-02 00:00:00'),
(10, 32, 21, 18, 13, 12, '2015-11-09 00:00:00'),
(11, 32, 11, 10, 10, 12, '2015-11-16 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
