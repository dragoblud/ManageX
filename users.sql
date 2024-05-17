-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 06:15 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assets`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS assets (
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL,
  sno int(11) NOT NULL,
  user varchar(32) NOT NULL,
  department varchar(32) NOT NULL,
  machinetype varchar(32) NOT NULL,
  manufacturer VARCHAR(1000),
  machinesn VARCHAR(1000),
  processor VARCHAR(1000),
  os VARCHAR(1000),
  systemspecs VARCHAR(1000),
  dateofpurchase VARCHAR(1000),
  warrantystatus VARCHAR(1000),
  vendor VARCHAR(1000),
  fromyear int(11),
  totalyear float,
  tyear VARCHAR(32),
  PRIMARY KEY(id)
);




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
