-- phpMyAdmin SQL Dump
-- version 4.1.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2014 at 02:52 PM
-- Server version: 5.5.34-MariaDB
-- PHP Version: 5.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `type`) VALUES
(1, 'blue'),
(2, 'black'),
(3, 'green'),
(4, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `birthdate` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `lastname`, `firstname`, `email`, `password`, `birthdate`, `gender`) VALUES
(1, 'housi', 'Lange', 'Hans', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '1970-01-01', 'Male'),
(5, 'hannam', 'Meier', 'Hanna', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '2000-Mar-18', 'Female'),
(6, 'susi21', 'Huggentobler', 'Susi', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '1990-12-12', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `hardness`
--

CREATE TABLE IF NOT EXISTS `hardness` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hardness`
--

INSERT INTO `hardness` (`id`, `type`) VALUES
(1, 'HB'),
(2, 'B'),
(3, 'F'),
(4, '2F');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `type`) VALUES
(1, 'None'),
(2, 'Rubber'),
(3, 'Handle');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customerid` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pencils`
--

CREATE TABLE IF NOT EXISTS `pencils` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pencils`
--

INSERT INTO `pencils` (`id`, `type`) VALUES
(1, 'Standard pencil1'),
(2, 'Mechanical pencil'),
(3, 'Special pencil'),
(12, 'Super pencil'),
(15, 'Pencil 123');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `pname` varchar(30) NOT NULL,
  `pdesc` varchar(100) NOT NULL,
  `ptype` int(5) NOT NULL,
  `poption` int(5) DEFAULT NULL,
  `color` int(5) NOT NULL,
  `hardness` int(5) NOT NULL,
  `price` varchar(3) NOT NULL,
  `adate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `pdesc`, `ptype`, `poption`, `color`, `hardness`, `price`, `adate`) VALUES
(1, 'Pencil 1', 'This is just a pencil.', 1, 1, 1, 1, '11', '2013-12-08'),
(2, 'Pencil 2', 'This is just a pencil.', 2, 1, 3, 2, '2', '2014-12-18'),
(3, 'Pencil 3', 'This is just a pencil.', 2, 1, 2, 1, '3', '2013-12-14'),
(4, 'Pencil 4', 'This is just a pencil.', 2, 3, 1, 1, '2', '2013-12-23'),
(5, 'Pencil 5', 'This is just a pencil.', 3, 3, 3, 3, '3', '2013-12-23'),
(6, 'Pencil 6', 'This is just another pencil', 1, 1, 2, 1, '11', '2013-12-01'),
(8, 'Pencil 9', 'Just the ultimate pencil.', 2, 2, 2, 1, '50', '2014-01-05'),
(9, 'Pencil surprise', '', 1, 2, 4, 1, '4', '2014-01-13'),
(10, 'Pencil 5', '', 3, 3, 3, 3, '3', '2013-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `salt`) VALUES
(1, 'test', '1af91d82ec0bf901fd1973b6d7049b00750fc8fe321a9f4b106ff740f7706ec3', 'test@webshop', '29b'),
(2, 'admin', '4ee0ed1d02f94a66b968cfc3c670f61f64efff3f85619644a23204f460f38c05', 'admin@webshop', '54b'),
(3, 'test1', 'f4c25201dd25c770120bccdfb77db3a6317fbd1dc627c30f38a26d891722e4a8', 'test1@webshop', '731');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
