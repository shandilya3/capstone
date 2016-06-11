-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2016 at 02:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `housedetails`
--

CREATE TABLE IF NOT EXISTS `housedetails` (
  `listid` int(5) NOT NULL AUTO_INCREMENT,
  `imagesource` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`listid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `housedetails`
--

INSERT INTO `housedetails` (`listid`, `imagesource`, `location`) VALUES
  (1, 'images/listhouse.jpg', '40 south 900 east salt lake city'),
  (2, 'images/listing2.jpg', '700 south 900 east salt lake city'),
  (3, 'images/listing3.jpg', '500 east 200 south salt lake city');

-- --------------------------------------------------------

--
-- Table structure for table `ratingtable`
--

CREATE TABLE IF NOT EXISTS `ratingtable` (
  `userid` int(5) NOT NULL,
  `score` int(5) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `listid` int(5) NOT NULL,
  `location` varchar(50) NOT NULL,
  `comment` varchar(50) NOT NULL,
  UNIQUE KEY `userid` (`userid`,`listid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratingtable`
--

INSERT INTO `ratingtable` (`userid`, `score`, `datetime`, `listid`, `location`, `comment`) VALUES
  (1, 4, '2016-06-02 20:55:20', 1, '40 south 900 east salt lake city', 'I like it, this house is *** awesome'),
  (1, 4, '2016-06-02 21:00:13', 2, '700 south 900 east salt lake city', ''),
  (1, 5, '2016-06-02 16:37:32', 3, '500 east 200 south salt lake city', '*** awesome place'),
  (2, 4, '2016-01-31 16:08:24', 2, '700 south 900 east salt lake city', 'Interior is as good as the exterior'),
  (2, 5, '2016-01-31 16:15:53', 3, '500 east 200 south salt lake city', 'This is at prime location'),
  (3, 2, '2016-01-31 16:14:53', 1, '40 south 900 east salt lake city', 'Close to downtown and university');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE IF NOT EXISTS `userdetails` (
  `userid` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`userid`, `email`, `firstname`, `lastname`, `password`) VALUES
  (1, 'happyshandilya@gmail.com', 'happy', 'shandilya', 'newyork@123'),
  (2, 'tonyfantis@gmail.com', 'Tony ', 'Fantis', 'tony123'),
  (3, 'renjith@gmail.com', 'Renjith ', 'K', 'renjith123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
