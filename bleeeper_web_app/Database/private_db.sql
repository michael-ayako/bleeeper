-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2016 at 12:07 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `private_db`
--
CREATE DATABASE IF NOT EXISTS `private_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `private_db`;

-- --------------------------------------------------------

--
-- Table structure for table `boinkers_tb`
--

CREATE TABLE IF NOT EXISTS `boinkers_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'The identity of the boink',
  `id_user` bigint(20) NOT NULL COMMENT 'Id of the user who has updated',
  `boink` text NOT NULL COMMENT 'The boink that has been sent',
  `date` datetime NOT NULL COMMENT 'The date and time the boink was sent',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Stores information on boinks sent to the database' AUTO_INCREMENT=37 ;

--
-- Dumping data for table `boinkers_tb`
--

INSERT INTO `boinkers_tb` (`id`, `id_user`, `boink`, `date`) VALUES
(1, 1, 'I love my site', '2014-11-30 09:30:31'),
(2, 4, 'hey guyz', '2014-12-03 07:28:37'),
(3, 5, 'THIS IS AWESOME', '2014-12-04 09:17:59'),
(4, 6, 'anjax', '2014-12-04 10:45:37'),
(5, 7, 'j', '2014-12-04 11:30:15'),
(6, 15, 'wow Congratulations Michael Ayax', '2014-12-04 18:14:35'),
(7, 16, 'upload profile pic', '2014-12-09 07:19:37'),
(15, 1, 'I can finally boink from the comfort of my phone... yipeee!!!!', '2015-03-02 19:16:35'),
(16, 1, 'hey people', '2015-03-03 18:19:31'),
(17, 1, 'bills bills bills!!!!', '2015-03-03 18:46:00'),
(18, 1, 'tired', '2015-03-03 19:00:33'),
(19, 1, 'super tired I say', '2015-03-03 19:00:51'),
(20, 2, 'Code working fine', '2015-03-04 08:01:32'),
(21, 24, 'Running fine from this \nend', '2015-03-10 18:46:55'),
(22, 1, '', '2015-04-11 14:56:00'),
(23, 1, 'TURN UP', '2015-04-11 14:56:15'),
(24, 1, 'TURN UP', '2015-04-11 14:59:44'),
(25, 1, 'TURN UP', '2015-04-11 15:00:30'),
(26, 1, 'TURN UP', '2015-04-11 15:01:46'),
(27, 1, 'TURN UP', '2015-04-11 15:06:47'),
(28, 1, 'TURN UP', '2015-04-11 15:07:02'),
(29, 1, 'TURN UP', '2015-04-11 15:07:04'),
(30, 1, 'TURN UP', '2015-04-11 15:07:33'),
(31, 1, 'TURN UP', '2015-04-11 15:07:55'),
(32, 1, 'TURN UP', '2015-04-11 15:08:24'),
(34, 1, 'TURNUP', '2015-04-13 05:18:56'),
(35, 1, 'adasdadsad', '2015-04-13 05:31:33'),
(36, 1, 'PARTY TYM', '2015-04-13 05:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `freind_rel_tb`
--

CREATE TABLE IF NOT EXISTS `freind_rel_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'identity of friendship ',
  `id_sender` bigint(20) NOT NULL COMMENT 'identity of the friend request sender',
  `id_reciever` bigint(20) NOT NULL COMMENT 'identity of the reciever of the freind request',
  `state` bigint(20) NOT NULL COMMENT 'state of friendship',
  `date_and_time` datetime NOT NULL COMMENT 'date of freindship',
  PRIMARY KEY (`id`),
  KEY `id_sender` (`id_sender`),
  KEY `id_reciever` (`id_reciever`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `freind_rel_tb`
--

INSERT INTO `freind_rel_tb` (`id`, `id_sender`, `id_reciever`, `state`, `date_and_time`) VALUES
(2, 4, 1, 7, '2014-12-03 07:26:50'),
(3, 4, 1, 7, '2014-12-03 07:49:38'),
(5, 1, 4, 7, '2014-12-03 13:14:36'),
(6, 2, 1, 7, '2014-12-03 13:14:59'),
(7, 1, 2, 7, '2014-12-03 13:15:18'),
(8, 9, 1, 2, '2014-12-04 12:38:58'),
(9, 1, 9, 2, '2014-12-04 17:42:40'),
(10, 15, 1, 2, '2014-12-04 18:13:47'),
(11, 1, 15, 1, '2014-12-04 18:15:21'),
(12, 5, 4, 1, '2014-12-05 07:28:58'),
(13, 9, 1, 1, '2014-12-05 07:59:00'),
(14, 16, 1, 1, '2014-12-05 07:59:07'),
(15, 4, 5, 2, '2014-12-06 07:30:48'),
(16, 1, 17, 2, '2014-12-06 11:48:58'),
(17, 1, 19, 2, '2014-12-07 13:09:51'),
(18, 16, 1, 2, '2014-12-09 07:16:15'),
(19, 4, 16, 1, '2014-12-09 07:18:54'),
(20, 1, 4, 2, '2014-12-23 11:27:34'),
(21, 4, 16, 2, '2015-01-10 10:19:58'),
(22, 1, 2, 7, '2015-02-19 18:22:26'),
(23, 2, 1, 7, '2015-02-19 18:32:12'),
(24, 1, 2, 7, '2015-02-19 18:45:57'),
(25, 2, 1, 7, '2015-02-19 18:46:10'),
(26, 1, 2, 7, '2015-02-19 18:49:13'),
(27, 1, 2, 7, '2015-02-19 18:49:59'),
(28, 1, 2, 7, '2015-02-19 18:51:31'),
(29, 1, 2, 7, '2015-02-19 18:58:25'),
(30, 1, 2, 7, '2015-02-19 19:43:42'),
(31, 1, 2, 7, '2015-02-19 19:48:11'),
(32, 1, 2, 7, '2015-02-19 19:52:03'),
(33, 22, 1, 2, '2015-02-22 13:08:03'),
(34, 22, 8, 2, '2015-02-22 13:08:23'),
(35, 22, 14, 2, '2015-02-22 13:08:31'),
(36, 1, 2, 7, '2015-02-23 06:54:57'),
(37, 1, 2, 7, '2015-02-23 08:41:36'),
(38, 1, 2, 7, '2015-02-23 08:44:14'),
(39, 1, 2, 7, '2015-02-23 08:46:45'),
(40, 1, 2, 7, '2015-02-23 08:48:06'),
(41, 1, 2, 7, '2015-02-23 11:52:08'),
(42, 1, 2, 7, '2015-02-23 13:00:05'),
(43, 1, 2, 7, '2015-02-23 13:07:30'),
(44, 1, 2, 7, '2015-02-23 17:53:16'),
(45, 1, 2, 7, '2015-02-23 18:08:09'),
(46, 2, 1, 7, '2015-02-23 18:53:47'),
(47, 2, 1, 7, '2015-02-23 18:57:05'),
(48, 2, 1, 7, '2015-02-23 19:23:09'),
(49, 22, 1, 1, '2015-02-24 06:55:53'),
(50, 2, 1, 7, '2015-02-24 07:00:08'),
(51, 1, 2, 7, '2015-02-24 09:08:26'),
(52, 1, 2, 7, '2015-02-24 10:31:51'),
(53, 2, 1, 7, '0000-00-00 00:00:00'),
(54, 2, 1, 7, '2015-02-24 12:19:22'),
(55, 2, 1, 7, '2015-02-25 08:22:35'),
(56, 2, 1, 7, '2015-02-25 10:13:52'),
(57, 2, 1, 7, '0000-00-00 00:00:00'),
(58, 2, 1, 7, '2015-02-25 10:23:59'),
(59, 2, 1, 7, '2015-02-25 10:30:07'),
(60, 2, 1, 7, '2015-02-25 10:36:25'),
(61, 1, 2, 7, '2015-02-25 10:36:57'),
(62, 2, 1, 7, '0000-00-00 00:00:00'),
(63, 2, 1, 7, '2015-02-25 17:53:08'),
(64, 2, 1, 7, '2015-02-25 20:22:27'),
(65, 2, 1, 2, '2015-03-01 15:07:44'),
(66, 2, 1, 7, '2015-03-01 15:08:07'),
(67, 1, 2, 7, '2015-03-02 08:19:37'),
(68, 1, 2, 2, '2015-03-02 08:39:35'),
(69, 2, 1, 7, '2015-03-04 08:10:34'),
(70, 1, 16, 2, '2015-03-04 09:48:01'),
(71, 24, 1, 2, '2015-03-10 18:41:01'),
(72, 24, 1, 1, '2015-03-10 18:43:23'),
(73, 1, 7, 2, '2015-03-11 05:27:31'),
(74, 26, 1, 2, '2015-03-12 09:02:43'),
(75, 26, 19, 2, '2015-03-12 09:03:02'),
(76, 1, 26, 2, '2015-03-12 15:17:12'),
(80, 1, 2, 2, '2015-04-11 14:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `freind_req_tb`
--

CREATE TABLE IF NOT EXISTS `freind_req_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Index number for reference',
  `id_sender` bigint(20) NOT NULL COMMENT 'The ID of the sender of the request',
  `id_reciever` bigint(20) NOT NULL COMMENT 'ID of the person who has been sent for the request',
  `state` tinyint(4) NOT NULL DEFAULT '4' COMMENT 'State of  freind request',
  `date_of_req` datetime NOT NULL COMMENT 'The date and time of request',
  PRIMARY KEY (`id`),
  KEY `id_sender` (`id_sender`),
  KEY `id_reciever` (`id_reciever`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table stores values about the friendship requests' AUTO_INCREMENT=117 ;

--
-- Dumping data for table `freind_req_tb`
--

INSERT INTO `freind_req_tb` (`id`, `id_sender`, `id_reciever`, `state`, `date_of_req`) VALUES
(1, 2, 1, 7, '2014-12-02 09:18:29'),
(3, 4, 1, 7, '2014-12-03 07:15:48'),
(4, 4, 1, 7, '2014-12-03 07:26:50'),
(6, 1, 4, 7, '2014-12-03 13:14:36'),
(7, 1, 2, 7, '2014-12-03 13:15:18'),
(8, 5, 4, 1, '2014-12-04 09:13:30'),
(9, 9, 1, 1, '2014-12-04 12:38:54'),
(10, 9, 1, 5, '2014-12-04 12:38:58'),
(11, 1, 5, 4, '2014-12-04 17:42:08'),
(12, 1, 9, 5, '2014-12-04 17:42:40'),
(13, 1, 8, 4, '2014-12-04 17:42:58'),
(14, 1, 10, 4, '2014-12-04 17:44:35'),
(15, 1, 13, 4, '2014-12-04 17:44:59'),
(16, 1, 14, 4, '2014-12-04 17:47:59'),
(17, 1, 11, 4, '2014-12-04 17:52:27'),
(18, 1, 7, 4, '2014-12-04 17:54:16'),
(19, 1, 15, 1, '2014-12-04 18:09:04'),
(20, 15, 1, 5, '2014-12-04 18:13:47'),
(21, 16, 1, 1, '2014-12-05 06:34:46'),
(22, 4, 16, 1, '2014-12-05 06:37:17'),
(23, 4, 1, 6, '2014-12-05 07:29:27'),
(24, 4, 5, 5, '2014-12-06 07:30:48'),
(25, 4, 13, 4, '2014-12-06 07:31:24'),
(26, 4, 10, 4, '2014-12-06 07:31:28'),
(27, 4, 6, 4, '2014-12-06 07:31:31'),
(28, 1, 17, 5, '2014-12-06 11:48:58'),
(29, 1, 19, 4, '2014-12-07 13:09:42'),
(30, 1, 19, 5, '2014-12-07 13:09:51'),
(31, 16, 1, 5, '2014-12-09 07:16:15'),
(32, 1, 18, 4, '2014-12-10 05:47:46'),
(33, 1, 17, 4, '2014-12-23 11:23:45'),
(34, 1, 6, 4, '2014-12-23 11:24:36'),
(35, 1, 4, 4, '2014-12-23 11:27:05'),
(36, 1, 4, 5, '2014-12-23 11:27:34'),
(37, 1, 20, 4, '2014-12-23 11:29:58'),
(38, 1, 12, 4, '2014-12-23 11:31:11'),
(39, 4, 16, 5, '2015-01-10 10:19:58'),
(40, 1, 2, 7, '2015-02-19 18:20:07'),
(41, 2, 1, 7, '2015-02-19 18:31:58'),
(42, 1, 2, 7, '2015-02-19 18:43:50'),
(43, 2, 1, 7, '2015-02-19 18:46:10'),
(44, 1, 2, 7, '2015-02-19 18:49:05'),
(45, 1, 2, 7, '2015-02-19 18:49:50'),
(46, 1, 2, 7, '2015-02-19 18:51:20'),
(47, 1, 2, 7, '2015-02-19 18:58:04'),
(48, 1, 2, 7, '2015-02-19 19:43:35'),
(49, 1, 2, 7, '2015-02-19 19:45:12'),
(50, 1, 2, 7, '2015-02-19 19:51:31'),
(51, 22, 1, 1, '2015-02-22 13:07:58'),
(52, 22, 1, 5, '2015-02-22 13:08:03'),
(53, 22, 8, 4, '2015-02-22 13:08:18'),
(54, 22, 8, 5, '2015-02-22 13:08:23'),
(55, 22, 14, 4, '2015-02-22 13:08:27'),
(56, 22, 14, 5, '2015-02-22 13:08:31'),
(57, 1, 2, 7, '2015-02-23 06:54:35'),
(58, 1, 2, 7, '2015-02-23 08:35:36'),
(59, 1, 2, 7, '2015-02-23 08:43:55'),
(60, 1, 2, 7, '2015-02-23 08:46:09'),
(61, 1, 2, 7, '2015-02-23 08:47:49'),
(62, 1, 2, 7, '2015-02-23 11:49:04'),
(63, 1, 2, 7, '2015-02-23 12:06:34'),
(64, 1, 2, 7, '2015-02-23 13:05:10'),
(65, 1, 2, 7, '2015-02-23 17:48:11'),
(66, 1, 2, 7, '2015-02-23 18:07:59'),
(67, 2, 1, 7, '2015-02-23 18:52:04'),
(68, 2, 1, 7, '2015-02-23 18:56:43'),
(69, 2, 1, 7, '2015-02-23 19:00:49'),
(70, 2, 1, 7, '2015-02-24 06:59:54'),
(71, 1, 2, 7, '2015-02-24 09:01:41'),
(72, 2, 1, 7, '2015-02-24 09:44:53'),
(73, 2, 1, 7, '2015-02-24 10:20:57'),
(74, 2, 1, 7, '2015-02-24 10:23:51'),
(75, 1, 2, 7, '2015-02-24 10:28:47'),
(76, 2, 1, 7, '2015-02-24 10:33:10'),
(77, 1, 2, 7, '2015-02-24 11:20:52'),
(78, 1, 2, 7, '2015-02-24 11:24:07'),
(79, 2, 1, 7, '2015-02-24 12:19:22'),
(80, 2, 1, 7, '2015-02-25 08:22:35'),
(81, 2, 1, 7, '2015-02-25 08:32:29'),
(82, 2, 1, 7, '2015-02-25 10:13:52'),
(83, 2, 1, 7, '2015-02-25 10:20:22'),
(84, 2, 1, 7, '2015-02-25 10:29:41'),
(85, 2, 1, 7, '2015-02-25 10:36:25'),
(86, 1, 2, 7, '2015-02-25 10:36:57'),
(87, 2, 1, 7, '2015-02-25 10:40:25'),
(88, 1, 2, 7, '2015-02-25 17:18:06'),
(89, 2, 1, 7, '2015-02-25 17:24:53'),
(90, 2, 1, 7, '2015-02-25 17:27:26'),
(91, 2, 1, 7, '2015-02-25 17:33:19'),
(92, 2, 1, 7, '2015-02-25 17:43:23'),
(93, 2, 1, 7, '2015-02-25 20:21:53'),
(94, 2, 1, 7, '2015-02-25 20:54:20'),
(95, 1, 2, 7, '2015-03-01 14:49:27'),
(96, 2, 1, 7, '2015-03-01 14:50:18'),
(97, 2, 1, 7, '2015-03-01 14:53:42'),
(98, 2, 1, 7, '2015-03-01 14:57:02'),
(99, 2, 1, 6, '2015-03-01 14:58:40'),
(100, 2, 1, 1, '2015-03-01 15:06:23'),
(101, 2, 1, 5, '2015-03-01 15:07:44'),
(102, 1, 2, 7, '2015-03-02 08:19:37'),
(103, 1, 2, 5, '2015-03-02 08:39:35'),
(104, 2, 1, 1, '2015-03-04 08:07:06'),
(105, 1, 16, 5, '2015-03-04 09:48:01'),
(106, 24, 1, 1, '2015-03-10 18:40:55'),
(107, 24, 1, 5, '2015-03-10 18:41:01'),
(108, 1, 7, 5, '2015-03-11 05:27:31'),
(109, 26, 1, 5, '2015-03-12 09:02:43'),
(110, 26, 19, 5, '2015-03-12 09:03:02'),
(111, 26, 19, 4, '2015-03-12 09:03:06'),
(112, 1, 26, 5, '2015-03-12 15:17:12'),
(116, 1, 2, 5, '2015-04-11 14:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `group_data_information_tb`
--

CREATE TABLE IF NOT EXISTS `group_data_information_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'this is the id used for referencing the Id of the group',
  `group_name` text NOT NULL COMMENT 'this is the name of the group',
  `groups_admin_id` bigint(20) NOT NULL COMMENT 'this is the ID od the user administraing the group',
  `about_group` text NOT NULL COMMENT 'this talks in detail what the group is about',
  `state` tinyint(4) DEFAULT '1' COMMENT 'Checks whether a group is currently active or not',
  `date_and_time` datetime NOT NULL COMMENT 'date the group was formed',
  PRIMARY KEY (`id`),
  KEY `groups_admin_id` (`groups_admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores information about groups that are created in the system' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `group_data_information_tb`
--

INSERT INTO `group_data_information_tb` (`id`, `group_name`, `groups_admin_id`, `about_group`, `state`, `date_and_time`) VALUES
(1, 'Anti grav', 1, 'This is a group about KeMU dancers, we perform across Meru County', 1, '2014-11-30 09:44:38'),
(2, 'Slypix Media', 4, 'Photography and design. We also offer consulting services to clients on IT', 1, '2014-12-03 07:24:33'),
(3, 'Bleeeper Group Tester', 2, 'this group is suppose to check out the various functions of android and online activity', 1, '2015-03-10 17:08:42'),
(4, 'ALIEN', 2, 'NSERT INTO group_data_information_tb', 1, '2015-04-13 07:05:46'),
(5, 'ALIEN', 2, 'NSERT INTO group_data_information_tb', 1, '2015-04-13 07:06:02'),
(6, 'ALIEN', 2, 'NSERT INTO group_data_information_tb', 1, '2015-04-13 07:07:47'),
(7, 'ALIEN', 2, 'NSERT INTO group_data_information_tb', 1, '2015-04-13 07:08:08'),
(8, 'ALIEN', 2, 'NSERT INTO group_data_information_tb', 1, '2015-04-13 07:08:45'),
(9, 'ALIEN', 2, 'NSERT INTO group_data_information_tb', 1, '2015-04-13 07:08:46'),
(10, 'AJEKS', 24, 'asdafasdfs d fadf dsafd fdsfsd fasdf asdf as', 1, '2015-04-13 10:09:50'),
(11, 'AJEKS', 24, 'asdafasdfs d fadf dsafd fdsfsd fasdf asdf as', 1, '2015-04-13 10:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `group_invitation_tb`
--

CREATE TABLE IF NOT EXISTS `group_invitation_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'this is the invitation id ',
  `group_id` bigint(20) NOT NULL COMMENT 'this reffers to the id of a group',
  `reciever_id` bigint(20) NOT NULL COMMENT 'reffers to the id of the recievier of the id',
  `state` smallint(6) NOT NULL COMMENT 'the state the invitation is in',
  `date_and_time` datetime NOT NULL COMMENT 'date and time it was sent',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `reciever_id` (`reciever_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Stores information on the group member invitations' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `group_invitation_tb`
--

INSERT INTO `group_invitation_tb` (`id`, `group_id`, `reciever_id`, `state`, `date_and_time`) VALUES
(1, 2, 1, 2, '2014-12-03 07:30:13'),
(2, 1, 2, 1, '2014-12-06 13:44:43'),
(3, 3, 1, 2, '2015-03-10 17:09:07'),
(4, 1, 15, 1, '2015-04-13 09:03:39'),
(5, 1, 20, 1, '2015-04-13 09:04:46'),
(6, 1, 5, 1, '2015-04-13 09:06:27'),
(7, 1, 9, 1, '2015-04-13 09:27:28'),
(8, 1, 6, 1, '2015-04-13 09:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `group_member_rel_tb`
--

CREATE TABLE IF NOT EXISTS `group_member_rel_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id of user-group relationship',
  `group_id` bigint(20) NOT NULL COMMENT 'group ID',
  `user_id` bigint(20) NOT NULL COMMENT 'group member ID',
  `state` tinyint(4) NOT NULL,
  `date_and_time` datetime NOT NULL COMMENT 'Date and time of relationship creation',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores member relationships with the various groups' AUTO_INCREMENT=28 ;

--
-- Dumping data for table `group_member_rel_tb`
--

INSERT INTO `group_member_rel_tb` (`id`, `group_id`, `user_id`, `state`, `date_and_time`) VALUES
(1, 1, 1, 3, '2014-11-30 09:44:38'),
(2, 2, 4, 3, '2014-12-03 07:24:33'),
(3, 2, 1, 2, '2014-12-03 07:45:28'),
(4, 3, 2, 1, '2015-03-10 17:08:42'),
(11, 1, 1, 3, '2015-04-13 06:43:27'),
(13, 2, 1, 2, '2015-04-13 06:55:01'),
(14, 2, 1, 2, '2015-04-13 06:55:30'),
(16, 2, 1, 2, '2015-04-13 06:55:37'),
(17, 2, 1, 2, '2015-04-13 06:56:15'),
(18, 2, 1, 2, '2015-04-13 06:56:16'),
(19, 4, 2, 1, '2015-04-13 07:05:46'),
(20, 5, 2, 1, '2015-04-13 07:06:02'),
(21, 6, 2, 1, '2015-04-13 07:07:47'),
(22, 7, 2, 1, '2015-04-13 07:08:08'),
(23, 8, 2, 1, '2015-04-13 07:08:45'),
(24, 9, 2, 1, '2015-04-13 07:08:46'),
(25, 3, 1, 2, '2015-04-13 10:07:03'),
(26, 10, 24, 1, '2015-04-13 10:09:50'),
(27, 11, 24, 1, '2015-04-13 10:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `group_req_tb`
--

CREATE TABLE IF NOT EXISTS `group_req_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id of group request',
  `group_id` bigint(20) NOT NULL COMMENT 'id of group',
  `sender_id` bigint(20) NOT NULL COMMENT 'id of the sender',
  `state` tinyint(4) NOT NULL COMMENT 'state of the request',
  `date_and_time` datetime NOT NULL COMMENT 'date and time of sending it',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `sender_id` (`sender_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Provides info on uninvited user requests' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `group_req_tb`
--

INSERT INTO `group_req_tb` (`id`, `group_id`, `sender_id`, `state`, `date_and_time`) VALUES
(1, 1, 4, 3, '2014-12-03 15:24:00'),
(2, 1, 11, 1, '2015-04-13 09:39:42'),
(3, 1, 13, 1, '2015-04-13 09:40:50'),
(4, 9, 1, 1, '2015-04-13 09:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `grp_msg_tb`
--

CREATE TABLE IF NOT EXISTS `grp_msg_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'group message id',
  `group_id` bigint(20) NOT NULL COMMENT 'references the group id',
  `sender_id` bigint(20) NOT NULL COMMENT 'the id of the sender of the message',
  `message_type` varchar(20) NOT NULL COMMENT 'the type of message, i.e file or text',
  `context_message` text COMMENT 'Stores text message',
  `file_share` text COMMENT 'stores file messages',
  `date_and_time` datetime NOT NULL COMMENT 'date of message sending',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `sender_id` (`sender_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Stores information on message transsfers in the verymany groups' AUTO_INCREMENT=59 ;

--
-- Dumping data for table `grp_msg_tb`
--

INSERT INTO `grp_msg_tb` (`id`, `group_id`, `sender_id`, `message_type`, `context_message`, `file_share`, `date_and_time`) VALUES
(1, 2, 4, 'text', 'Hello guys', NULL, '2014-12-03 07:24:59'),
(2, 2, 4, 'text', 'thats me!', NULL, '2014-12-03 07:25:24'),
(3, 2, 1, 'text', 'i see you joined the group?', NULL, '2014-12-03 07:47:59'),
(4, 2, 1, 'file', NULL, 'PROPOSAL WRITE UP.doc', '2015-03-19 18:49:37'),
(8, 1, 1, 'text', 'suup nigguhz', NULL, '2015-03-19 19:21:45'),
(22, 1, 1, 'file', NULL, '', '2015-03-24 08:55:36'),
(23, 1, 1, 'file', NULL, 'Profile', '2015-03-24 08:55:56'),
(24, 1, 1, 'file', NULL, 'bleeeper.jpg', '2015-03-24 08:56:41'),
(25, 1, 1, 'file', NULL, 'displayTree.txt', '2015-03-24 08:58:06'),
(31, 1, 1, 'file', NULL, 'an', '2015-03-24 09:34:53'),
(37, 1, 1, 'file', NULL, 'bleeeper.jpg', '2015-03-24 09:49:03'),
(38, 1, 1, 'file', NULL, 'bleeeper.jpg', '2015-03-24 09:49:51'),
(39, 1, 1, 'file', NULL, 'renderTree.txt', '2015-03-24 09:52:18'),
(40, 1, 1, 'file', NULL, 'com.easy.apps.screencapture-1.0-www.APK4Fun.com.apk', '2015-03-24 09:52:31'),
(41, 1, 1, 'file', NULL, 'bleeeper.jpg', '2015-03-24 11:36:47'),
(44, 1, 1, 'text', 'Food', NULL, '2015-04-13 08:36:10'),
(45, 1, 1, 'text', 'Food', NULL, '2015-04-13 08:36:28'),
(46, 1, 1, 'text', 'Food', NULL, '2015-04-13 08:38:06'),
(47, 1, 1, 'text', 'Food', NULL, '2015-04-13 08:38:13'),
(48, 1, 1, 'text', 'Food', NULL, '2015-04-13 08:38:14'),
(49, 1, 1, 'text', 'Food', NULL, '2015-04-13 08:38:16'),
(50, 1, 1, 'text', 'Food', NULL, '2015-04-13 08:40:42'),
(51, 1, 1, 'text', 'Food', NULL, '2015-04-13 08:42:50'),
(52, 1, 1, 'text', 'Food', NULL, '2015-04-13 08:43:22'),
(53, 1, 1, 'text', 'Food', NULL, '2015-04-13 08:43:24'),
(54, 11, 24, 'text', 'gdfgdfg', NULL, '2015-04-13 10:11:21'),
(55, 11, 24, 'file', NULL, 'project number.txt', '2015-04-13 10:17:14'),
(56, 11, 24, 'file', NULL, 'job app Safoa Tech.doc', '2015-04-13 10:18:20'),
(57, 11, 24, 'file', NULL, 'readme.txt', '2015-04-13 10:21:37'),
(58, 11, 24, 'file', NULL, '&#35299;&#21387;&#23494;&#30721;.txt', '2015-04-13 10:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `msg_tb`
--

CREATE TABLE IF NOT EXISTS `msg_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'represents the message id in the database',
  `id_sender` bigint(20) NOT NULL COMMENT 'represents the is of the person who sent the message',
  `id_reciever` bigint(20) NOT NULL COMMENT 'represents the id of the person who recieves the sent message',
  `message` text NOT NULL COMMENT 'The message that was sent',
  `msg_state_send` tinyint(4) NOT NULL COMMENT 'identifies if the message is read or not',
  `msg_state_rec` tinyint(4) NOT NULL,
  `date` datetime NOT NULL COMMENT 'identifies the date and time it was sent',
  PRIMARY KEY (`id`),
  KEY `id_sender` (`id_sender`),
  KEY `id_reciever` (`id_reciever`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='pools the messages of various users' AUTO_INCREMENT=55 ;

--
-- Dumping data for table `msg_tb`
--

INSERT INTO `msg_tb` (`id`, `id_sender`, `id_reciever`, `message`, `msg_state_send`, `msg_state_rec`, `date`) VALUES
(1, 1, 4, 'Please notify me on any problem you might notice with the website.. Thank you', 2, 2, '2014-12-03 07:55:14'),
(2, 4, 1, 'there are quite a number esp with design layout and UX..but its realy good', 2, 2, '2014-12-03 15:22:51'),
(3, 1, 4, 'UX ni nini?', 2, 2, '2014-12-05 07:58:49'),
(4, 4, 1, 'User interface', 2, 2, '2014-12-06 07:30:26'),
(5, 1, 4, 'Oh, the user interface is meant for a 1366*768 screen.. thats the resolution i used in design ', 2, 2, '2014-12-06 12:47:13'),
(6, 2, 1, 'Hey', 2, 2, '2015-03-11 17:23:00'),
(7, 24, 1, 'Hi michael am running code check up for your website', 2, 2, '2015-03-14 12:23:08'),
(18, 1, 24, 'seems to be working fine from this end', 2, 2, '2015-03-14 13:06:14'),
(19, 1, 24, 'thats cool to know\n', 2, 2, '2015-03-14 13:07:47'),
(33, 24, 1, 'checking code', 2, 2, '2015-03-14 13:55:55'),
(34, 1, 24, 'code working smoothly', 2, 2, '2015-03-14 13:56:14'),
(35, 24, 1, 'not so much', 2, 2, '2015-03-14 13:58:03'),
(36, 24, 1, 'R u sure about that', 2, 2, '2015-03-14 13:59:53'),
(37, 1, 24, 'Yes i am', 2, 2, '2015-03-14 14:00:17'),
(38, 24, 1, 'okay', 2, 2, '2015-03-14 14:01:22'),
(39, 24, 1, 'Photos is the next thing', 2, 2, '2015-03-14 14:02:04'),
(40, 1, 24, 'Yes i hope that works out fine', 2, 2, '2015-03-14 14:04:26'),
(41, 1, 24, 'mee tooo', 2, 2, '2015-03-14 14:05:06'),
(42, 1, 16, 'farasi wewe', 2, 1, '2015-03-14 14:07:03'),
(43, 1, 2, 'nigguh', 2, 2, '2015-03-14 14:08:54'),
(44, 24, 1, 'Yaah wateva', 2, 2, '2015-03-14 14:16:25'),
(45, 1, 24, 'cool to know', 2, 2, '2015-03-14 14:26:10'),
(46, 1, 2, 'hey', 2, 2, '2015-03-14 14:26:40'),
(47, 1, 2, 'Suup', 2, 2, '2015-03-14 14:28:48'),
(48, 2, 1, 'Hey', 2, 2, '2015-03-14 14:31:00'),
(49, 1, 2, 'whats new', 2, 2, '2015-03-14 14:31:20'),
(50, 2, 1, 'nothing much you tell me', 2, 2, '2015-03-14 14:32:01'),
(51, 2, 1, 'call of duty this evening', 2, 2, '2015-03-14 14:32:50'),
(52, 1, 2, 'cool', 2, 2, '2015-03-14 14:33:05'),
(54, 1, 2, 'Awesomeness awaits thine', 2, 1, '2015-04-11 14:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `notificator_tb`
--

CREATE TABLE IF NOT EXISTS `notificator_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'the id of the notification',
  `id_reciever` bigint(20) NOT NULL COMMENT 'id of the reciever',
  `id_sender` bigint(20) NOT NULL COMMENT 'id of sender of the notification',
  `notification_type` int(11) NOT NULL COMMENT 'the type of the notification',
  `notification_state` int(11) NOT NULL COMMENT 'whether read or not',
  `DATE_AND_TIME` datetime NOT NULL COMMENT 'date and time of notification post',
  PRIMARY KEY (`id`),
  KEY `id_rec` (`id_reciever`),
  KEY `id_sen` (`id_sender`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores data on notifications' AUTO_INCREMENT=286 ;

--
-- Dumping data for table `notificator_tb`
--

INSERT INTO `notificator_tb` (`id`, `id_reciever`, `id_sender`, `notification_type`, `notification_state`, `DATE_AND_TIME`) VALUES
(1, 1, 2, 2, 1, '2014-12-02 09:18:29'),
(2, 2, 1, 3, 1, '2014-12-02 09:24:48'),
(3, 1, 4, 2, 1, '2014-12-03 07:15:48'),
(4, 1, 4, 3, 1, '2014-12-03 07:26:50'),
(5, 1, 4, 8, 1, '2014-12-03 07:30:13'),
(6, 4, 1, 9, 1, '2014-12-03 07:45:28'),
(7, 4, 1, 1, 1, '2014-12-03 07:49:38'),
(8, 4, 1, 3, 1, '2014-12-03 13:07:10'),
(9, 2, 1, 5, 1, '2014-12-03 13:13:36'),
(10, 4, 1, 5, 1, '2014-12-03 13:14:27'),
(11, 4, 1, 3, 1, '2014-12-03 13:14:36'),
(12, 2, 1, 1, 1, '2014-12-03 13:14:59'),
(13, 2, 1, 3, 1, '2014-12-03 13:15:18'),
(14, 1, 4, 7, 1, '2014-12-03 15:24:00'),
(15, 4, 5, 2, 1, '2014-12-04 09:13:30'),
(16, 1, 9, 2, 1, '2014-12-04 12:38:54'),
(17, 1, 9, 3, 1, '2014-12-04 12:38:58'),
(18, 5, 1, 2, 2, '2014-12-04 17:42:08'),
(19, 9, 1, 3, 2, '2014-12-04 17:42:40'),
(20, 8, 1, 2, 2, '2014-12-04 17:42:58'),
(21, 10, 1, 2, 2, '2014-12-04 17:44:35'),
(22, 13, 1, 2, 2, '2014-12-04 17:44:59'),
(23, 14, 1, 2, 2, '2014-12-04 17:47:59'),
(24, 11, 1, 2, 2, '2014-12-04 17:52:27'),
(25, 7, 1, 2, 2, '2014-12-04 17:54:16'),
(26, 15, 1, 2, 1, '2014-12-04 18:09:04'),
(27, 1, 15, 3, 1, '2014-12-04 18:13:47'),
(28, 1, 15, 1, 1, '2014-12-04 18:15:21'),
(29, 1, 16, 2, 1, '2014-12-05 06:34:46'),
(30, 16, 4, 2, 1, '2014-12-05 06:37:17'),
(31, 5, 4, 1, 2, '2014-12-05 07:28:58'),
(32, 1, 4, 494, 1, '2014-12-05 07:29:27'),
(33, 9, 1, 1, 2, '2014-12-05 07:59:00'),
(34, 16, 1, 1, 1, '2014-12-05 07:59:07'),
(35, 5, 4, 3, 2, '2014-12-06 07:30:48'),
(36, 13, 4, 2, 2, '2014-12-06 07:31:24'),
(37, 10, 4, 2, 2, '2014-12-06 07:31:28'),
(38, 6, 4, 2, 2, '2014-12-06 07:31:31'),
(39, 17, 1, 3, 2, '2014-12-06 11:48:58'),
(40, 2, 1, 8, 1, '2014-12-06 13:44:43'),
(41, 19, 1, 2, 2, '2014-12-07 13:09:42'),
(42, 19, 1, 3, 2, '2014-12-07 13:09:51'),
(43, 1, 16, 3, 1, '2014-12-09 07:16:15'),
(44, 4, 16, 1, 1, '2014-12-09 07:18:54'),
(45, 18, 1, 2, 2, '2014-12-10 05:47:46'),
(46, 17, 1, 2, 2, '2014-12-23 11:23:45'),
(47, 6, 1, 2, 2, '2014-12-23 11:24:36'),
(48, 4, 1, 2, 1, '2014-12-23 11:27:05'),
(49, 4, 1, 3, 1, '2014-12-23 11:27:34'),
(50, 20, 1, 2, 2, '2014-12-23 11:29:58'),
(51, 12, 1, 2, 2, '2014-12-23 11:31:11'),
(52, 16, 4, 3, 1, '2015-01-10 10:19:58'),
(53, 1, 2, 13, 1, '2015-02-19 18:17:52'),
(54, 2, 1, 2, 1, '2015-02-19 18:20:07'),
(55, 1, 2, 1, 1, '2015-02-19 18:22:26'),
(56, 1, 2, 13, 1, '2015-02-19 18:28:35'),
(57, 1, 2, 2, 1, '2015-02-19 18:31:58'),
(58, 2, 1, 1, 1, '2015-02-19 18:32:12'),
(59, 1, 2, 13, 1, '2015-02-19 18:39:24'),
(60, 2, 1, 2, 1, '2015-02-19 18:43:50'),
(61, 1, 2, 1, 1, '2015-02-19 18:45:57'),
(62, 1, 2, 3, 1, '2015-02-19 18:46:10'),
(63, 1, 2, 13, 1, '2015-02-19 18:46:38'),
(64, 2, 1, 2, 1, '2015-02-19 18:49:05'),
(65, 1, 2, 1, 2, '2015-02-19 18:49:13'),
(66, 1, 2, 13, 2, '2015-02-19 18:49:22'),
(67, 2, 1, 2, 1, '2015-02-19 18:49:50'),
(68, 1, 2, 1, 2, '2015-02-19 18:49:59'),
(69, 1, 2, 13, 2, '2015-02-19 18:50:06'),
(70, 2, 1, 2, 1, '2015-02-19 18:51:20'),
(71, 1, 2, 1, 2, '2015-02-19 18:51:31'),
(72, 1, 2, 13, 2, '2015-02-19 18:51:41'),
(73, 2, 1, 2, 1, '2015-02-19 18:58:04'),
(74, 1, 2, 1, 2, '2015-02-19 18:58:25'),
(75, 1, 2, 13, 2, '2015-02-19 19:40:19'),
(76, 2, 1, 2, 1, '2015-02-19 19:43:35'),
(77, 1, 2, 1, 2, '2015-02-19 19:43:42'),
(78, 1, 2, 13, 2, '2015-02-19 19:44:06'),
(79, 2, 1, 2, 1, '2015-02-19 19:45:12'),
(80, 1, 2, 1, 2, '2015-02-19 19:48:11'),
(81, 1, 2, 13, 2, '2015-02-19 19:48:19'),
(82, 2, 1, 13, 1, '2015-02-19 19:48:33'),
(83, 2, 1, 2, 1, '2015-02-19 19:51:31'),
(84, 1, 2, 1, 2, '2015-02-19 19:52:03'),
(85, 1, 2, 13, 2, '2015-02-19 20:06:10'),
(86, 1, 22, 2, 2, '2015-02-22 13:07:58'),
(87, 1, 22, 3, 2, '2015-02-22 13:08:03'),
(88, 8, 22, 2, 2, '2015-02-22 13:08:18'),
(89, 8, 22, 3, 2, '2015-02-22 13:08:23'),
(90, 14, 22, 2, 2, '2015-02-22 13:08:27'),
(91, 14, 22, 3, 2, '2015-02-22 13:08:31'),
(92, 2, 1, 2, 1, '2015-02-23 06:54:35'),
(93, 1, 2, 1, 2, '2015-02-23 06:54:57'),
(94, 1, 2, 13, 2, '2015-02-23 08:29:29'),
(95, 2, 1, 2, 1, '2015-02-23 08:35:36'),
(96, 1, 2, 1, 2, '2015-02-23 08:41:36'),
(97, 1, 2, 13, 2, '2015-02-23 08:41:42'),
(98, 2, 1, 2, 1, '2015-02-23 08:43:55'),
(99, 1, 2, 1, 2, '2015-02-23 08:44:14'),
(100, 1, 2, 13, 2, '2015-02-23 08:45:28'),
(101, 2, 1, 2, 1, '2015-02-23 08:46:09'),
(102, 1, 2, 1, 2, '2015-02-23 08:46:45'),
(103, 1, 2, 13, 2, '2015-02-23 08:47:30'),
(104, 2, 1, 2, 1, '2015-02-23 08:47:49'),
(105, 1, 2, 1, 2, '2015-02-23 08:48:06'),
(106, 1, 2, 13, 2, '2015-02-23 11:46:47'),
(107, 2, 1, 2, 1, '2015-02-23 11:49:04'),
(108, 1, 2, 1, 2, '2015-02-23 11:52:08'),
(109, 1, 2, 13, 2, '2015-02-23 11:52:34'),
(110, 2, 1, 2, 1, '2015-02-23 12:06:34'),
(111, 1, 2, 1, 2, '2015-02-23 13:00:05'),
(112, 1, 2, 13, 2, '2015-02-23 13:04:08'),
(113, 2, 1, 2, 1, '2015-02-23 13:05:10'),
(114, 1, 2, 1, 2, '2015-02-23 13:07:30'),
(115, 1, 2, 13, 2, '2015-02-23 16:11:14'),
(116, 2, 1, 2, 1, '2015-02-23 17:48:11'),
(117, 1, 2, 1, 1, '2015-02-23 17:53:16'),
(118, 1, 2, 13, 1, '2015-02-23 18:00:09'),
(119, 2, 1, 2, 1, '2015-02-23 18:07:59'),
(120, 1, 2, 1, 1, '2015-02-23 18:08:09'),
(121, 1, 2, 13, 1, '2015-02-23 18:51:32'),
(122, 1, 2, 2, 1, '2015-02-23 18:52:04'),
(123, 2, 1, 1, 1, '2015-02-23 18:53:47'),
(124, 2, 1, 13, 1, '2015-02-23 18:54:40'),
(125, 1, 2, 2, 1, '2015-02-23 18:56:43'),
(126, 2, 1, 1, 1, '2015-02-23 18:57:05'),
(127, 1, 2, 13, 1, '2015-02-23 18:57:32'),
(128, 1, 2, 2, 1, '2015-02-23 19:00:49'),
(129, 2, 1, 1, 1, '2015-02-23 19:23:09'),
(130, 22, 1, 1, 2, '2015-02-24 06:55:53'),
(131, 2, 1, 13, 1, '2015-02-24 06:58:27'),
(132, 1, 2, 2, 1, '2015-02-24 06:59:54'),
(133, 2, 1, 1, 1, '2015-02-24 07:00:08'),
(134, 1, 2, 13, 1, '2015-02-24 08:46:49'),
(135, 2, 1, 2, 1, '2015-02-24 09:01:41'),
(136, 1, 2, 1, 1, '2015-02-24 09:08:26'),
(137, 2, 1, 13, 1, '2015-02-24 09:12:48'),
(138, 2, 1, 13, 1, '2015-02-24 09:14:05'),
(139, 2, 1, 13, 1, '2015-02-24 09:19:45'),
(140, 1, 2, 2, 1, '2015-02-24 09:44:53'),
(141, 2, 1, 4, 1, '2015-02-24 10:20:17'),
(142, 1, 2, 2, 1, '2015-02-24 10:20:57'),
(143, 2, 1, 4, 1, '2015-02-24 10:22:59'),
(144, 1, 2, 2, 1, '2015-02-24 10:23:51'),
(145, 2, 1, 4, 1, '2015-02-24 10:28:20'),
(146, 2, 1, 2, 1, '2015-02-24 10:28:47'),
(147, 1, 2, 1, 1, '2015-02-24 10:31:51'),
(148, 2, 1, 13, 1, '2015-02-24 10:32:17'),
(149, 1, 2, 2, 1, '2015-02-24 10:33:10'),
(150, 2, 1, 1, 1, '0000-00-00 00:00:00'),
(151, 1, 2, 13, 1, '2015-02-24 11:20:30'),
(152, 2, 1, 2, 1, '2015-02-24 11:20:52'),
(153, 1, 2, 4, 1, '2015-02-24 11:21:11'),
(154, 2, 1, 2, 1, '2015-02-24 11:24:07'),
(155, 1, 2, 4, 1, '2015-02-24 11:34:05'),
(156, 1, 2, 4, 1, '2015-02-24 11:36:29'),
(157, 1, 2, 4, 1, '2015-02-24 11:38:34'),
(158, 1, 2, 5, 1, '2015-02-24 12:19:11'),
(159, 1, 2, 3, 1, '2015-02-24 12:19:22'),
(160, 1, 2, 5, 1, '2015-02-24 13:03:14'),
(161, 1, 2, 3, 1, '2015-02-25 08:22:35'),
(162, 1, 2, 2, 1, '2015-02-25 08:32:29'),
(163, 1, 2, 5, 1, '2015-02-25 10:12:54'),
(164, 1, 2, 3, 1, '2015-02-25 10:13:52'),
(165, 2, 1, 1, 1, '0000-00-00 00:00:00'),
(166, 1, 2, 13, 1, '2015-02-25 10:15:12'),
(167, 1, 2, 2, 1, '2015-02-25 10:20:22'),
(168, 2, 1, 1, 1, '2015-02-25 10:23:59'),
(169, 1, 2, 13, 1, '2015-02-25 10:26:31'),
(170, 1, 2, 2, 1, '2015-02-25 10:29:41'),
(171, 2, 1, 1, 1, '2015-02-25 10:30:07'),
(172, 1, 2, 5, 1, '2015-02-25 10:34:41'),
(173, 2, 1, 5, 1, '2015-02-25 10:35:24'),
(174, 1, 2, 3, 1, '2015-02-25 10:36:25'),
(175, 2, 1, 3, 1, '2015-02-25 10:36:57'),
(176, 2, 1, 13, 1, '2015-02-25 10:38:25'),
(177, 1, 2, 2, 1, '2015-02-25 10:40:25'),
(178, 2, 1, 1, 1, '0000-00-00 00:00:00'),
(179, 2, 1, 13, 1, '2015-02-25 10:43:46'),
(180, 2, 1, 2, 1, '2015-02-25 17:18:06'),
(181, 1, 2, 4, 1, '2015-02-25 17:24:45'),
(182, 1, 2, 2, 1, '2015-02-25 17:24:53'),
(183, 2, 1, 4, 1, '2015-02-25 17:27:17'),
(184, 1, 2, 2, 1, '2015-02-25 17:27:26'),
(185, 2, 1, 4, 1, '2015-02-25 17:28:11'),
(186, 1, 2, 2, 1, '2015-02-25 17:33:19'),
(187, 2, 1, 4, 1, '2015-02-25 17:42:29'),
(188, 1, 2, 2, 1, '2015-02-25 17:43:23'),
(189, 2, 1, 1, 1, '2015-02-25 17:53:08'),
(190, 1, 2, 13, 1, '2015-02-25 20:21:27'),
(191, 1, 2, 2, 1, '2015-02-25 20:21:53'),
(192, 2, 1, 1, 1, '2015-02-25 20:22:27'),
(193, 1, 2, 494, 1, '2015-02-25 20:54:20'),
(195, 2, 1, 2, 1, '2015-03-01 14:49:27'),
(196, 1, 2, 4, 1, '2015-03-01 14:49:38'),
(197, 1, 2, 494, 1, '2015-03-01 14:50:18'),
(199, 1, 2, 494, 1, '2015-03-01 14:53:42'),
(201, 1, 2, 494, 1, '2015-03-01 14:57:02'),
(203, 1, 2, 494, 1, '2015-03-01 14:58:40'),
(204, 1, 2, 595, 1, '2015-03-01 15:06:05'),
(205, 1, 2, 2, 1, '2015-03-01 15:06:23'),
(206, 1, 2, 3, 1, '2015-03-01 15:07:44'),
(207, 2, 1, 1, 2, '2015-03-01 15:08:07'),
(208, 2, 1, 4, 2, '2015-03-01 15:08:54'),
(209, 2, 1, 3, 1, '2015-03-02 08:19:37'),
(210, 2, 1, 5, 1, '2015-03-02 08:39:07'),
(211, 2, 1, 3, 1, '2015-03-02 08:39:35'),
(212, 2, 1, 13, 1, '2015-03-04 08:05:43'),
(213, 1, 2, 2, 1, '2015-03-04 08:07:06'),
(214, 2, 1, 1, 1, '2015-03-04 08:10:34'),
(215, 16, 1, 3, 1, '2015-03-04 09:48:01'),
(216, 1, 2, 8, 1, '2015-03-10 17:09:07'),
(217, 1, 24, 2, 1, '2015-03-10 18:40:55'),
(218, 1, 24, 3, 1, '2015-03-10 18:41:01'),
(219, 24, 1, 1, 1, '2015-03-10 18:43:23'),
(220, 7, 1, 3, 2, '2015-03-11 05:27:31'),
(221, 1, 26, 3, 1, '2015-03-12 09:02:43'),
(222, 19, 26, 3, 2, '2015-03-12 09:03:02'),
(223, 19, 26, 2, 2, '2015-03-12 09:03:06'),
(224, 26, 1, 3, 2, '2015-03-12 15:17:12'),
(225, 4, 1, 12, 2, '2015-03-19 11:51:07'),
(236, 2, 1, 13, 2, '2015-04-11 14:05:19'),
(237, 2, 1, 13, 2, '2015-04-11 14:05:57'),
(238, 2, 1, 13, 2, '2015-04-11 14:06:23'),
(239, 2, 1, 13, 2, '2015-04-11 14:06:27'),
(240, 2, 1, 13, 1, '2015-04-11 14:06:28'),
(241, 2, 1, 13, 1, '2015-04-11 14:07:04'),
(243, 2, 1, 3, 1, '2015-04-11 14:10:38'),
(250, 1, 1, 9, 2, '2015-04-13 06:43:27'),
(252, 1, 4, 10, 2, '2015-04-13 06:55:01'),
(253, 1, 4, 10, 1, '2015-04-13 06:55:30'),
(255, 1, 4, 10, 1, '2015-04-13 06:55:37'),
(256, 1, 4, 10, 1, '2015-04-13 06:56:15'),
(257, 1, 4, 10, 1, '2015-04-13 06:56:16'),
(259, 1, 1, 12, 1, '2015-04-13 07:17:19'),
(261, 15, 1, 8, 2, '2015-04-13 09:03:39'),
(262, 20, 1, 8, 2, '2015-04-13 09:04:46'),
(263, 5, 1, 8, 2, '2015-04-13 09:06:27'),
(264, 9, 1, 8, 2, '2015-04-13 09:27:28'),
(265, 6, 1, 8, 2, '2015-04-13 09:27:54'),
(267, 1, 1, 696, 2, '2015-04-13 09:32:17'),
(268, 1, 1, 696, 2, '2015-04-13 09:34:06'),
(270, 1, 11, 7, 1, '2015-04-13 09:39:42'),
(271, 1, 13, 7, 1, '2015-04-13 09:40:50'),
(272, 2, 1, 7, 1, '2015-04-13 09:43:04'),
(273, 15, 1, 797, 2, '2015-04-13 09:49:00'),
(274, 15, 1, 797, 2, '2015-04-13 09:49:18'),
(275, 15, 1, 797, 2, '2015-04-13 09:49:19'),
(276, 15, 1, 797, 2, '2015-04-13 09:50:09'),
(277, 15, 1, 797, 2, '2015-04-13 09:50:11'),
(278, 4, 4, 797, 2, '2015-04-13 09:54:32'),
(279, 4, 4, 797, 2, '2015-04-13 09:55:59'),
(280, 1, 1, 797, 1, '2015-04-13 09:57:28'),
(281, 4, 1, 11, 2, '2015-04-13 10:01:40'),
(282, 4, 1, 11, 2, '2015-04-13 10:02:02'),
(283, 4, 1, 11, 2, '2015-04-13 10:02:27'),
(284, 2, 1, 9, 1, '2015-04-13 10:07:03'),
(285, 2, 1, 11, 1, '2015-04-13 10:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `ppic_tb`
--

CREATE TABLE IF NOT EXISTS `ppic_tb` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ppic_link` text NOT NULL,
  `ppic_state` tinyint(4) NOT NULL,
  `file_type` text NOT NULL,
  `date_and_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppic_tb`
--

INSERT INTO `ppic_tb` (`id`, `user_id`, `ppic_link`, `ppic_state`, `file_type`, `date_and_time`) VALUES
(0, 1, 'index.jpg', 1, 'image/jpeg', '2015-03-22 13:01:19'),
(0, 1, '20150307_210036.jpg', 1, '', '0000-00-00 00:00:00'),
(0, 1, '20150307_210036.jpg', 1, '', '0000-00-00 00:00:00'),
(0, 1, '20150125_212223.jpg', 1, '', '2015-03-23 19:39:15'),
(0, 1, '20150125_212223.jpg', 1, '', '2015-03-23 19:39:26'),
(0, 1, '20150307_210036.jpg', 1, 'android', '2015-03-23 19:41:49'),
(0, 1, '20150307_210036.jpg', 1, 'android', '2015-03-23 19:42:22'),
(0, 1, '20150307_210036.jpg', 1, 'android', '2015-03-23 19:43:57'),
(0, 1, '20150307_210036.jpg', 1, 'android', '2015-03-23 19:44:14'),
(0, 1, 'IMG_20150103_115255.jpg', 1, 'android', '2015-03-23 19:49:47'),
(0, 1, 'IMG_20150103_115255.jpg', 1, 'android', '2015-03-23 19:50:29'),
(0, 1, 'IMG_20141225_110913.jpg', 1, 'android', '2015-03-24 11:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `profiling_tb`
--

CREATE TABLE IF NOT EXISTS `profiling_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL COMMENT 'Email address of the user',
  `username` varchar(50) NOT NULL COMMENT 'Username of the user',
  `password` varchar(500) NOT NULL COMMENT 'Encrypted password of the user',
  `date` datetime NOT NULL COMMENT 'Date and time of registration',
  `first_name` varchar(100) DEFAULT NULL COMMENT 'First name of the user',
  `middle_name` varchar(100) DEFAULT NULL COMMENT 'Middle name of the user',
  `last_name` varchar(100) DEFAULT NULL COMMENT 'Last name of the user',
  `date_of_birth` date DEFAULT NULL COMMENT 'Date of birth of user',
  `gender` varchar(20) DEFAULT NULL COMMENT 'Gender of the user',
  `country` varchar(50) DEFAULT NULL COMMENT 'Country form whish the user is from',
  `proffesion` varchar(100) DEFAULT NULL COMMENT 'The city rom which the stays',
  `userdevice_number` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='It stores information on user profiles' AUTO_INCREMENT=27 ;

--
-- Dumping data for table `profiling_tb`
--

INSERT INTO `profiling_tb` (`id`, `email`, `username`, `password`, `date`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `gender`, `country`, `proffesion`, `userdevice_number`) VALUES
(1, 'mikeayaks@gmail.com', 'djayax', '8a6e156d9612e38d884c2ce3aaf05805', '2014-11-30 08:39:08', 'Michael', 'Ayako', 'Nyakonu', '1993-04-13', 'Male', 'Kenya', 'Bleeeper Solo Developer', 'APA91bFZUhZXOts_HjmVyICC2gV56zCPrcaSK43ftieK-hLQhUcZSh0S5XhP9p3oPTiKN7_PVgP4NuoKsdcBZAJEhJfP2AfqeJSlNZ47r8WC7MstIOeSVbvs1GUxe2Zc35kPFtyPRER7WHjcLXn8aJY_gHNWTST9Qw'),
(2, 'shirukanagi@gmail.com', 'codexbot', '6559dd9fd1205080faa4356f5987388c', '2014-12-02 09:13:22', 'Codex', 'Bot', '', '1993-11-02', 'Female', 'Kenya', 'WatchDog', NULL),
(4, 'ndungusly@gmail.com', 'slypix', '738e26935b4a786e22d6c90777521e0a', '2014-12-03 07:14:04', NULL, NULL, NULL, NULL, NULL, 'Kenya', 'Artist', NULL),
(5, 'motatts08@yahoo.com', 'MOLADY', '8d6af9741f031b7b537c3f5c1d9e5787', '2014-12-04 09:12:43', 'MOLADY', 'MWANZIA', 'MAKAU', NULL, 'Female', 'Kenya', 'FIRE FIGHTER', NULL),
(6, 'tyzochola@gmail.com', 'oballoh', 'cd26250825af99c16c1bcfc8d8e2c1a7', '2014-12-04 10:43:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'victorluganu@gmail.com', 'bantu', '8d06b55f7e8a09b5b29af3675b925f0b', '2014-12-04 11:29:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'dkichangai@gmail.com', 'ichangai', '8e238747e6a9b395a9b67a6c4e756966', '2014-12-04 11:34:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'wilberlevi@gmail.com', 'wilberlevi', '8a22f7dad36fce75427b0469b33f5913', '2014-12-04 12:37:58', 'Wilberforce', NULL, 'Murikah', NULL, 'Male', NULL, 'Computer Scientist', NULL),
(10, 'pmwawato@gmail.com', 'Tsuma', '89449064b7854a7cdda00e5c0f5078b1', '2014-12-04 12:55:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'kelvinmunene@yahoo.com', 'kavohnesh', 'e66d479fc823cda419a527e892cca2ba', '2014-12-04 12:56:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'kelvinkamau444@gmail.com', 'kellyvin', 'c6b429ea780c499e6dffc5139e95f0ac', '2014-12-04 13:06:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'chibsbaron@yahoo.com', 'tuff90', 'af7660a0366c92f2e0fb8cb93dcb0b50', '2014-12-04 14:27:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'dr.ndegwa41@gmail.com', 'johnte', 'bf1776e1c74e98aa013e3890289c1462', '2014-12-04 17:10:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'ken.kiome@gmail.com', 'kenleon', '3db027c44d6ed4ce5c1afb55d259d22a', '2014-12-04 17:56:07', 'Ken', 'Kiome', NULL, NULL, 'Male', 'Kenya', 'Google Student Ambassador', NULL),
(16, 'omondi.john500@gmail.com', 'TROJAN', '68dbd457019f742ad30455c71af263ae', '2014-12-05 06:30:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'ericmutembei2012@gmail.com', 'eric19', '794c466f7c9081772a0a0342088d68eb', '2014-12-05 08:17:05', 'Eric', 'Kimathi', 'Mutembei', '1992-09-12', 'Male', 'Kenya', NULL, NULL),
(18, 'kyalonjenga@gmail.com', 'makaveliviq', 'ff55749987998bcd57cbe67eaea6dc65', '2014-12-05 12:51:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'hackers@russian.com', 'Blackswicky', 'c55738dab159f3eeafa7ea9d25ad20f0', '2014-12-06 09:49:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'jvillerickie@gmail.com', 'jvillekip', '98e2046c0955402de0a0982057eb65d7', '2014-12-15 04:25:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'joel@anyona.com', 'joelly', 'a9bd9157275621cfda5407ddc2e52f24', '2015-01-08 09:02:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'moseskiama52@gmail.com', 'moses', '84af7136a1c4c79506ce9ebbb447ad1e', '2015-02-22 13:04:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'nyongora@gmail.com', 'MillieB', 'b7492a07ab68d393a5f2394c3682b30a', '2015-03-02 14:38:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'codebottexeter@gmail.com', 'codebot', '9c45a39fe67565034d243023b9f626b4', '2015-03-10 18:37:49', 'Test', 'Bot', 'R2D2', NULL, 'Male', 'Bahamas', NULL, NULL),
(25, 'Maxwell.david402@gmail.com', 'MaxDavis', '531cea07d040d4f99176f14bcc25d05a', '2015-03-10 18:38:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'dallytweezo@yahoo.com', 'dalton', 'ff8e653e4cd525458a34551e8814ce07', '2015-03-12 09:00:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoutouts_tb`
--

CREATE TABLE IF NOT EXISTS `shoutouts_tb` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Stores the id_number to be used by the shout out',
  `id_user` bigint(20) NOT NULL COMMENT 'stores the id of the user how updated the shout out',
  `shoutout` text NOT NULL COMMENT 'Stores data on what shout out was posted by the user',
  `date` datetime NOT NULL COMMENT 'Stores the date on which the shout out was sent',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Stores the list of shout outs sent by various users in the database' AUTO_INCREMENT=21 ;

--
-- Dumping data for table `shoutouts_tb`
--

INSERT INTO `shoutouts_tb` (`id`, `id_user`, `shoutout`, `date`) VALUES
(1, 1, 'This is my site still under development though', '2014-11-30 09:32:19'),
(2, 4, 'not bad', '2014-12-03 07:28:28'),
(3, 9, 'Good stuff', '2014-12-04 12:43:26'),
(4, 2, 'Coding works fine over here\n', '2015-03-04 08:15:19'),
(5, 1, 'bored to death', '2015-03-04 08:50:41'),
(6, 1, 'bored to death', '2015-03-04 08:54:28'),
(7, 1, 'bored to death', '2015-03-04 08:55:12'),
(8, 1, 'bored to death', '2015-03-04 08:55:28'),
(9, 16, 'COD MW3', '2015-03-04 09:45:22'),
(13, 1, 'hahahahah', '2015-04-11 15:14:12'),
(14, 1, 'hahahahah', '2015-04-11 15:15:08'),
(15, 1, 'hahahahah', '2015-04-11 15:18:08'),
(16, 1, 'hahahahah', '2015-04-13 05:21:31'),
(17, 1, 'hahahahah', '2015-04-13 05:21:42'),
(18, 1, 'TURNUP', '2015-04-13 05:26:56'),
(19, 1, 'sdasdasd', '2015-04-13 05:30:39'),
(20, 1, 'asdasdasdasd', '2015-04-13 05:30:46');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boinkers_tb`
--
ALTER TABLE `boinkers_tb`
  ADD CONSTRAINT `boinkers_tb_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `freind_rel_tb`
--
ALTER TABLE `freind_rel_tb`
  ADD CONSTRAINT `freind_rel_tb_ibfk_1` FOREIGN KEY (`id_sender`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `freind_rel_tb_ibfk_2` FOREIGN KEY (`id_reciever`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `freind_req_tb`
--
ALTER TABLE `freind_req_tb`
  ADD CONSTRAINT `freind_req_tb_ibfk_1` FOREIGN KEY (`id_sender`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `freind_req_tb_ibfk_2` FOREIGN KEY (`id_reciever`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `group_data_information_tb`
--
ALTER TABLE `group_data_information_tb`
  ADD CONSTRAINT `group_data_information_tb_ibfk_1` FOREIGN KEY (`groups_admin_id`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `group_invitation_tb`
--
ALTER TABLE `group_invitation_tb`
  ADD CONSTRAINT `group_invitation_tb_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_data_information_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `group_invitation_tb_ibfk_3` FOREIGN KEY (`reciever_id`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `group_member_rel_tb`
--
ALTER TABLE `group_member_rel_tb`
  ADD CONSTRAINT `group_member_rel_tb_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_data_information_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `group_member_rel_tb_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `group_req_tb`
--
ALTER TABLE `group_req_tb`
  ADD CONSTRAINT `group_req_tb_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_data_information_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `group_req_tb_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grp_msg_tb`
--
ALTER TABLE `grp_msg_tb`
  ADD CONSTRAINT `grp_msg_tb_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_data_information_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grp_msg_tb_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `profiling_tb` (`id`);

--
-- Constraints for table `msg_tb`
--
ALTER TABLE `msg_tb`
  ADD CONSTRAINT `msg_tb_ibfk_1` FOREIGN KEY (`id_sender`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `msg_tb_ibfk_2` FOREIGN KEY (`id_reciever`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notificator_tb`
--
ALTER TABLE `notificator_tb`
  ADD CONSTRAINT `recieverlink` FOREIGN KEY (`id_reciever`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `senderlink` FOREIGN KEY (`id_sender`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shoutouts_tb`
--
ALTER TABLE `shoutouts_tb`
  ADD CONSTRAINT `shoutouts_tb_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `profiling_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
