-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 11, 2016 at 05:43 AM
-- Server version: 5.5.49-MariaDB
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bleeeper_adminlog`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq_table`
--

CREATE TABLE IF NOT EXISTS `faq_table` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `complaint` text NOT NULL,
  `respond` text NOT NULL,
  `date_and_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Stores questions about FAQs asked by users' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `faq_table`
--

INSERT INTO `faq_table` (`id`, `email`, `subject`, `complaint`, `respond`, `date_and_time`) VALUES
(1, 'mikeayaks@gmail.com', 'groups', 'How can i join a group', 'we will be on it', '2015-03-24 11:39:23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
