-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2019 at 06:03 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `email` varchar(255) COLLATE utf16_bin NOT NULL,
  `password` varchar(255) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `password`) VALUES
(1, 'Harikesh Sahu', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `assest`
--

DROP TABLE IF EXISTS `assest`;
CREATE TABLE IF NOT EXISTS `assest` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `date` varchar(255) COLLATE utf16_bin NOT NULL,
  `available` varchar(255) COLLATE utf16_bin NOT NULL,
  `total` varchar(255) COLLATE utf16_bin NOT NULL,
  `ocost` int(11) NOT NULL,
  `scost` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `assest`
--

INSERT INTO `assest` (`pid`, `name`, `date`, `available`, `total`, `ocost`, `scost`) VALUES
(1, 'Mouse', '2019-11-08', '0', '2000', 1000, 1200),
(2, 'Keyboard', '2019-11-14', '1', '3000', 1000, 1100),
(3, 'TV', '2019-11-02', '2', '30000', 10000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

DROP TABLE IF EXISTS `assign`;
CREATE TABLE IF NOT EXISTS `assign` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `request` varchar(255) COLLATE utf16_bin NOT NULL,
  `description` varchar(255) COLLATE utf16_bin NOT NULL,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `address1` varchar(255) COLLATE utf16_bin NOT NULL,
  `address2` varchar(255) COLLATE utf16_bin NOT NULL,
  `city` varchar(255) COLLATE utf16_bin NOT NULL,
  `state` varchar(255) COLLATE utf16_bin NOT NULL,
  `zip` varchar(255) COLLATE utf16_bin NOT NULL,
  `email` varchar(255) COLLATE utf16_bin NOT NULL,
  `mobile` varchar(255) COLLATE utf16_bin NOT NULL,
  `assign` varchar(255) COLLATE utf16_bin NOT NULL,
  `date` varchar(255) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`aid`, `rid`, `request`, `description`, `name`, `address1`, `address2`, `city`, `state`, `zip`, `email`, `mobile`, `assign`, `date`) VALUES
(20, 17, 'mobile hang', 'not working', 'AKASH GUPTA', 'SUBHASH NAGAR', 'airoli', 'thane', 'maharashtra', '400708', 'sahuharikesh0@gmail.com', '9727975275', 'akash', '2019-11-30'),
(19, 14, 'Laptop hang', ' not woking properly', 'Krishna', 'digha', 'airoli', 'thane', 'maharashtra', '400708', 'sahuharikesh0@gmail.com', '9727975275', 'Rahul', '2019-11-29'),
(17, 3, 'mobile hang', ' not woking properly', 'harikesh', 'subhas nagar ', 'digha', 'thane', 'maharashtra', '400708', 'sahuharikesh0@gmail.com', '9727975275', 'krishna', '2019-11-14'),
(18, 2, 'mobile hang', ' not woking properly', 'harikesh', 'subhas nagar ', 'digha', 'thane', 'maharashtra', '400708', 'sahuharikesh0@gmail.com', '9727975275', 'Rahul', '2019-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `request` varchar(255) COLLATE utf16_bin NOT NULL,
  `description` varchar(255) COLLATE utf16_bin NOT NULL,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `address1` varchar(255) COLLATE utf16_bin NOT NULL,
  `address2` varchar(255) COLLATE utf16_bin NOT NULL,
  `city` varchar(255) COLLATE utf16_bin NOT NULL,
  `state` varchar(255) COLLATE utf16_bin NOT NULL,
  `zip` varchar(255) COLLATE utf16_bin NOT NULL,
  `email` varchar(255) COLLATE utf16_bin NOT NULL,
  `mobile` varchar(255) COLLATE utf16_bin NOT NULL,
  `date` varchar(255) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`rid`, `request`, `description`, `name`, `address1`, `address2`, `city`, `state`, `zip`, `email`, `mobile`, `date`) VALUES
(1, 'mobile hang', ' not woking properly', 'harikesh', 'subhas nagar ', 'digha', 'thane', 'maharashtra', '400708', 'sahuharikesh0@gmail.com', '9727975275', '2019-11-23'),
(14, 'Laptop hang', ' not woking properly', 'Krishna', 'digha', 'airoli', 'thane', 'maharashtra', '400708', 'sahuharikesh0@gmail.com', '9727975275', '2019-11-14'),
(16, 'mobile hang', ' not woking properly', 'harikesh', 'subhas nagar', 'digha', 'thane', 'maharashtra', '400708', 'sahuharikesh0@gmail.com', '9727975275', '2019-11-27'),
(17, 'mobile hang', 'not working', 'AKASH GUPTA', 'SUBHASH NAGAR', 'airoli', 'thane', 'maharashtra', '400708', 'sahuharikesh0@gmail.com', '9727975275', '2019-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

DROP TABLE IF EXISTS `sell`;
CREATE TABLE IF NOT EXISTS `sell` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) COLLATE utf16_bin NOT NULL,
  `address` varchar(255) COLLATE utf16_bin NOT NULL,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `quantity` int(11) NOT NULL,
  `scost` int(11) NOT NULL,
  `stotal` int(11) NOT NULL,
  `sdate` varchar(255) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`sid`, `cname`, `address`, `name`, `quantity`, `scost`, `stotal`, `sdate`) VALUES
(1, 'Ram', 'digha', 'Keyboard', 1, 1100, 1100, '2019-11-16'),
(2, 'harikesh', 'subhas nagar', 'Mouse', 1, 1200, 1200, '2019-11-20'),
(3, 'Krishna', 'digha', 'Keyboard', 1, 1100, 1100, '2019-11-30'),
(4, 'Ram', 'digha', 'Keyboard', 1, 1100, 1100, '2019-11-30'),
(5, 'harikesh', 'subhas nagar', 'Mouse', 1, 1200, 1200, '2019-11-15'),
(6, 'harikesh', 'subhas nagar', 'Keyboard', 0, 1100, 1009, '2019-11-30'),
(7, 'harikesh', 'subhas nagar', 'Mouse', 1, 1200, 1200, '2019-11-23'),
(8, 'Ram', 'digha', 'TV', 1, 20000, 20000, '2019-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

DROP TABLE IF EXISTS `technician`;
CREATE TABLE IF NOT EXISTS `technician` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `city` varchar(255) COLLATE utf16_bin NOT NULL,
  `mobile` varchar(255) COLLATE utf16_bin NOT NULL,
  `email` varchar(255) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`tid`, `name`, `city`, `mobile`, `email`) VALUES
(1, 'Rahul', 'Thane', '987654321', 'rahul@gmail.com'),
(2, 'Ram', 'Thane', '9876543212', 'ram@gmail.com'),
(3, 'Krishna', 'Airoli', '9727975275', 'k@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `email` varchar(255) COLLATE utf16_bin NOT NULL,
  `password` varchar(255) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `password`) VALUES
(1, 'Harikesh Sahu', 'sahuharikesh0@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Krishna', 'krishna@gmail.com', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
