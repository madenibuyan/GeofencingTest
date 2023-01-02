-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2021 at 02:13 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` text NOT NULL,
  `othernames` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `lastname`, `othernames`, `email`, `password`) VALUES
(1, 'dosumu', 'ololade', 'admin@lasu.edu.ng', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pin` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `left_co` varchar(200) NOT NULL,
  `right_co` varchar(200) NOT NULL,
  `top_co` varchar(200) NOT NULL,
  `bottom_co` varchar(200) NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL,
  `str_start` bigint(20) NOT NULL,
  `str_end` bigint(20) NOT NULL,
  `date` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `pin`, `course_code`, `description`, `left_co`, `right_co`, `top_co`, `bottom_co`, `start`, `end`, `str_start`, `str_end`, `date`) VALUES
(2, '8A7LIP', 'csc 226', 'Object Oriented Programming', '6.5568767999999995,3.3488895999999997', '6.5568767999999995,3.3488895999999997', '6.5568767999999995,3.3488895999999997', '6.5568767999999995,3.3488895999999997', '30 May 2021, 02:59pm', '30 May 2021, 04:00pm', 1622383140, 1622386800, '30 May 2021, 02:58pm');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric_no` varchar(100) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `date` varchar(130) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `matric_no`, `course_code`, `pin`, `date`) VALUES
(2, '120591033', 'csc 226', '8A7LIP', '30 May 2021, 03:12pm');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` text NOT NULL,
  `othernames` text NOT NULL,
  `matric_no` varchar(100) NOT NULL,
  `department` text NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `surname`, `othernames`, `matric_no`, `department`, `level`) VALUES
(1, 'dosumu', 'uthman ololade', '120591033', 'Computer Science', 400);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
