-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2018 at 07:33 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `api_assign`
--
CREATE DATABASE IF NOT EXISTS `api_assign` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `api_assign`;

-- --------------------------------------------------------

--
-- Table structure for table `api_courses`
--

CREATE TABLE IF NOT EXISTS `api_courses` (
  `api_assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_type` varchar(50) NOT NULL,
  PRIMARY KEY (`api_assign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `api_courses`
--

INSERT INTO `api_courses` (`api_assign_id`, `course_id`, `course_name`, `course_type`) VALUES
(1, '69Bku0KoEeWZtA4u62x6lQ', 'Gamification', 'v2.ondemand');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
