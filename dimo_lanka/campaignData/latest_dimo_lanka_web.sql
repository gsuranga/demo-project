-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2014 at 06:01 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `latest_dimo_lanka_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_after_campaign`
--

CREATE TABLE IF NOT EXISTS `tbl_after_campaign` (
  `id_after_campaign` int(11) NOT NULL AUTO_INCREMENT,
  `id_campaign` int(11) NOT NULL,
  `actual_cost` double NOT NULL,
  `so_comment` varchar(60) NOT NULL,
  `apm_comment` varchar(60) NOT NULL,
  `ho_comment` varchar(60) NOT NULL,
  `areas_to_improve` varchar(60) NOT NULL,
  `images` varchar(100) NOT NULL,
  `added_date` date NOT NULL,
  `added_time` time NOT NULL,
  `apm_seen` int(11) NOT NULL,
  `ho_seen` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_after_campaign`),
  KEY `id_campaign` (`id_campaign`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_after_campaign`
--

INSERT INTO `tbl_after_campaign` (`id_after_campaign`, `id_campaign`, `actual_cost`, `so_comment`, `apm_comment`, `ho_comment`, `areas_to_improve`, `images`, `added_date`, `added_time`, `apm_seen`, `ho_seen`, `status`) VALUES
(1, 69, 8000, 'j', '', '', 'j', '0', '2014-02-17', '00:00:16', 0, 0, 1),
(7, 84, 589, 'gg', '', '', 'gg', '0', '2014-02-18', '10:41:59', 0, 0, 1),
(8, 94, 555, 'fdv', 'rehh', '', 'afd', '0', '2014-02-18', '10:43:38', 1, 0, 1),
(9, 82, 88, 's', 'cccccccc', '', 'cas', '0', '2014-02-18', '10:45:54', 1, 0, 1),
(11, 88, 12583, 'Finished', 'vvvc', 'cccc', 'Finished', '0', '2014-02-18', '11:51:58', 1, 1, 1),
(12, 98, 588996, 'xz', '', '', 'asc', '0', '2014-02-18', '11:57:45', 1, 0, 1),
(13, 99, 588, 'xzzx', 'abc', 'def', 'dsds', '0', '2014-02-18', '12:07:59', 1, 1, 1),
(15, 97, 589, 'da', '', '', 'da', 'notDone3.jpg', '2014-02-18', '12:09:53', 0, 0, 1),
(18, 100, 2589, 'ffg', '', '', 'vvv', 'room1.jpg', '2014-02-18', '12:22:21', 0, 0, 1),
(19, 105, 12154, 'dfd', '', '', 'fdfd', 'room4.jpg', '2014-02-18', '17:44:34', 0, 0, 1),
(20, 107, 58, 'd', '', '', 'd', 'room5.jpg', '2014-02-19', '11:28:51', 0, 0, 1),
(21, 106, 5225, 'sb', '', '', 'sdb', '', '2014-02-26', '16:32:20', 0, 0, 1),
(22, 142, 155, 'hhjv', '', '', 'hjvvj', '', '2014-02-26', '20:37:07', 0, 0, 1),
(23, 124, 82, 'sac', '', '', 'csa', 'Photo0742.jpg', '2014-02-27', '15:01:43', 0, 0, 1),
(24, 136, 55, 'dv', '', '', 'dv', 'ho', '2014-02-27', '15:04:16', 0, 0, 1),
(25, 141, 34, 'cv', '', '', 'cv', 'Finished_Campaign', '2014-02-27', '15:20:41', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campaign`
--

CREATE TABLE IF NOT EXISTS `tbl_campaign` (
  `id_campaing` int(100) NOT NULL AUTO_INCREMENT,
  `campaign_type` varchar(20) NOT NULL,
  `campaign_date` date NOT NULL,
  `added_date` date NOT NULL,
  `added_time` time NOT NULL,
  `objective` varchar(100) NOT NULL,
  `material_required_from_ho` varchar(100) NOT NULL,
  `other_requirement_from_branch` varchar(100) NOT NULL,
  `budget` double NOT NULL,
  `quotation_file_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `priority` int(11) NOT NULL,
  `after_ho_permition` int(11) NOT NULL DEFAULT '0' COMMENT 'not seen =0,finished=1,As new=2,clear=3',
  `has_hold_campaign` int(11) NOT NULL,
  PRIMARY KEY (`id_campaing`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=148 ;

--
-- Dumping data for table `tbl_campaign`
--

INSERT INTO `tbl_campaign` (`id_campaing`, `campaign_type`, `campaign_date`, `added_date`, `added_time`, `objective`, `material_required_from_ho`, `other_requirement_from_branch`, `budget`, `quotation_file_name`, `status`, `priority`, `after_ho_permition`, `has_hold_campaign`) VALUES
(60, 'baby', '2014-02-14', '2014-02-05', '14:18:41', 'xz', 'x', 'x', 25, '', 1, 0, 0, 0),
(61, 'cool', '2014-03-22', '2014-02-05', '14:19:38', 'dd', 'dd', 'dd', 125, '', 1, 0, 0, 0),
(62, 'Dealer Dinner', '2014-02-26', '2014-02-05', '15:20:43', 'njk', 'ddd', 'sds', 2586, '', 1, 0, 0, 0),
(63, 'Garage Meet', '2014-02-08', '2014-02-05', '17:25:31', 'CNHH', 'loiu', 'sddsd', 3698542, 'chmod1.txt', 1, 0, 0, 0),
(64, 'Garage Meet', '2014-02-20', '2014-02-05', '17:51:42', 'd', 'd', 'd', 258, 'a.png.jpg', 1, 0, 0, 0),
(65, 'Garage Meet', '2014-02-22', '2014-02-06', '09:19:59', 'hghjg', 'yuub', 'kjjjjjjjjj', 24546, 'attrib_-a_-s_-d2.attrib -a -s -d', 1, 0, 0, 0),
(66, 'Garage Meet', '2014-02-20', '2014-02-06', '09:37:40', 'dddd', 'dddd', 'dddd', 2588, 'new_Sql.sql', 1, 0, 0, 0),
(67, 'Garage Meet', '2014-02-19', '2014-02-06', '16:10:01', '', '', '', 258, 'Book1.xlsx', 1, 0, 0, 0),
(68, 'Street Promote', '2014-02-28', '2014-02-07', '15:23:19', 'qd', 'qd', 'qd', 25886, 'Hack2', 1, 0, 0, 0),
(69, 'Garage Meet', '2014-03-22', '2014-02-07', '17:49:23', 'adg', 'hjl', 'zxcv', 58963, 'Hack21.Hack2', 1, 0, 1, 0),
(70, 'Street Promote', '2014-02-22', '2014-02-07', '17:51:58', 'as', 'asc', 'asc', 0, 'Hack22.Hack2', 1, 0, 0, 0),
(71, 'Garage Meet', '2014-02-21', '2014-02-07', '17:53:39', 'asf', 'afsc', 'af', 55, 'Hack23.Hack2', 1, 0, 1, 0),
(72, 'Garage Meet', '2014-02-04', '2014-02-07', '17:55:39', 'WF', 'WEF', 'WEF', 5, 'ho', 1, 0, 1, 0),
(73, 'Dealer Dinner', '2014-02-22', '2014-02-10', '08:43:45', 'ddd', 'ddd', 'ddd', 897, 'jdv.txt', 1, 0, 0, 0),
(74, 'GHu', '2014-02-08', '2014-02-10', '08:50:23', 'dddddd', 'ddddd', 'dddddd', 4588, '', 1, 0, 0, 0),
(75, 'Dealer Dinner', '2014-02-22', '2014-02-10', '08:53:15', 'vg', 'vg', 'vg', 98745, '', 1, 0, 0, 0),
(76, 'Garage Meet', '2014-02-12', '2014-02-10', '08:55:06', 'x', 'x', 'x', 258, '', 1, 0, 0, 0),
(77, 'Garage Meet', '2014-03-15', '2014-02-10', '10:39:07', 'Test 1', 'Test 1', 'Test 1', 12333, 'accordian.html', 1, 3, 0, 0),
(78, 'Street Promote', '2014-02-22', '2014-02-10', '10:40:41', 'Test 2', 'Test 2', 'Test 2', 25369, 'ho1.ho', 1, 0, 0, 0),
(79, 'Dealer Dinner', '2014-02-20', '2014-02-10', '15:03:17', 'cdf', 'cdf', 'cdf', 1236, '', 1, 0, 0, 0),
(80, 'Garage Meet', '2014-02-22', '2014-02-10', '16:38:12', 'cs', 'sd', 'c', 52545, '', 1, 0, 0, 0),
(81, 'Garage Meet', '2014-02-26', '2014-02-10', '16:41:08', 'fr', 'rf', 'rf', 2588, '', 1, 4, 0, 0),
(82, 'Garage Meet', '2014-02-20', '2014-02-10', '16:41:34', 'f', 'f', 'f', 255, '', 1, 0, 1, 0),
(83, 'Garage Meet', '2014-02-28', '2014-02-10', '17:02:25', 'fwrgh', 'sgdhf', 'fsg', 2488, '', 1, 6, 0, 0),
(84, 'Garage Meet', '2014-02-28', '2014-02-12', '13:28:37', 'tgh', 'lok', 'mjk', 25896, 'jquery-2.0.3.min.js', 1, 0, 1, 0),
(85, 'Garage Meet', '2014-02-28', '2014-02-12', '16:29:57', 'x', 'x', 'x', 18, '', 1, 0, 0, 0),
(86, 'Garage Meet', '2014-02-28', '2014-02-12', '16:29:57', 'x', 'x', 'x', 18, '', 1, 8, 0, 0),
(87, 'Garage Meet', '2014-02-13', '2014-02-12', '16:30:54', 'xd', 'xx', 'ss', 285, 'room.jpg', 1, 5, 0, 0),
(88, 'Dealer Dinner', '2014-02-27', '2014-02-13', '16:49:33', 'ds', 'ds', 'ds', 2588, 'IMG_20131202_174402.jpg', 1, 8, 1, 0),
(89, 'Garage Meet', '2014-02-27', '2014-02-13', '16:50:52', 'c', 'c', 'c', 111, 'IMG_20131202_174422.jpg', 1, 2, 0, 0),
(90, 'Garage Meet', '2014-02-26', '2014-02-13', '16:57:36', 'd', 'd', 'd', 255, 'IMG_20131202_174409.jpg', 1, 1, 0, 0),
(91, 'Garage Meet', '2014-02-12', '2014-02-13', '21:29:43', 'dd', '', '', 25, 'notDone.jpg', 1, 1, 0, 0),
(92, 'Garage Meet', '2014-02-20', '2014-02-13', '21:31:19', 'c', 'c', 'c', 258, 'IMG_20131206_163637.jpg', 1, 3, 0, 0),
(93, 'Garage Meet', '2014-02-14', '2014-02-17', '09:21:18', 'a', 'a', 'a', 12365, '13864_159033947636491_1556030215_n.jpg', 1, 0, 0, 0),
(94, 'Garage Meet', '2014-02-20', '2014-02-17', '09:31:37', 'bg', 'bg', 'bg', 123, '1010858_211830342320408_1662778728_n.jpg', 1, 0, 1, 0),
(95, 'Dealer Dinner', '2014-02-28', '2014-02-18', '10:47:48', 'd', 'd', 'd', 58, 'done.jpg', 1, 4, 0, 0),
(96, 'Dealer Dinner', '2014-02-27', '2014-02-18', '11:54:11', 'ddd', 'ddd', 'ddd', 588, '', 1, 2, 0, 0),
(97, 'Dealer Dinner', '2014-02-27', '2014-02-18', '11:54:11', 'ddd', 'ddd', 'ddd', 588, '', 1, 0, 1, 0),
(98, 'Garage Meet', '2014-02-28', '2014-02-18', '11:55:59', 'ss', 'ss', 'sss', 2587, 'add.jpg', 1, 0, 1, 0),
(99, 'Garage Meet', '2014-02-28', '2014-02-18', '12:04:01', 'cvf', 'cvf', 'cvf', 45669, 'home.jpg', 1, 0, 1, 0),
(100, 'Garage Meet', '2014-02-26', '2014-02-18', '12:12:03', 'ds', 'ds', 'ds', 589, 'notDone4.jpg', 1, 0, 1, 0),
(101, 'Garage Meet', '0000-00-00', '2014-02-18', '12:28:00', '', '', '', 0, '', 1, 6, 0, 0),
(102, 'Garage Meet', '2014-02-28', '2014-02-18', '12:42:12', 'd', 'd', 'd', 2589, 'room2.jpg', 1, 5, 0, 0),
(103, 'Garage Meet', '2014-02-27', '2014-02-18', '12:53:08', 'adv', 'dv', 'dv', 2589, 'room3.jpg', 1, 7, 0, 0),
(104, 'Garage Meet', '2014-02-20', '2014-02-18', '12:54:23', 'd', 'd', 'd', 258, 'view1.png', 1, 9, 0, 0),
(105, 'Garage Meet', '2014-02-27', '2014-02-18', '12:56:42', 'njk', 'njk', 'njk', 23698, 'hospita1.jpg', 1, 9, 1, 0),
(106, 'Garage Meet', '2014-02-27', '2014-02-19', '08:57:37', 'fg', 'ccc', 'cccc', 5896, 'a.jpg', 1, 10, 1, 0),
(107, 'Garage Meet', '2014-03-15', '2014-02-19', '09:25:48', 'dd', 'dd', 'dd', 2589, 'home1.jpg', 1, 10, 1, 0),
(108, 'Garage Meet', '2014-02-21', '2014-02-20', '12:49:43', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4852, 'b2.jpg', 1, 10, 0, 0),
(109, 'Garage Meet', '2014-02-18', '2014-02-20', '13:53:34', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 10, 0, 0),
(110, 'Garage Meet', '2014-02-27', '2014-02-20', '14:05:26', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 11, 0, 0),
(111, 'Garage Meet', '2014-02-12', '2014-02-20', '14:09:02', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 12, 0, 0),
(112, 'Garage Meet', '0000-00-00', '2014-02-20', '14:10:32', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 13, 0, 0),
(113, 'Garage Meet', '2014-02-06', '2014-02-20', '14:23:09', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 14, 0, 0),
(114, 'Garage Meet', '0000-00-00', '2014-02-20', '14:33:54', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 14, 0, 0),
(115, 'Garage Meet', '2014-02-25', '2014-02-20', '15:17:53', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 14, 0, 0),
(116, 'Garage Meet', '2014-02-11', '2014-02-20', '15:39:48', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 15, 0, 0),
(117, 'Garage Meet', '2014-02-26', '2014-02-20', '15:40:30', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 16, 0, 0),
(118, 'Garage Meet', '2014-02-05', '2014-02-20', '15:50:56', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 17, 0, 1),
(119, 'Garage Meet', '2014-02-06', '2014-02-20', '17:08:13', 'ee', 'ee', 'ee', 55555555, 'hospita2.jpg', 1, 18, 0, 0),
(120, 'Garage Meet', '2014-02-28', '2014-02-20', '17:10:02', 'ee', 'ee', 'ee', 55, 'hospita2.jpg', 1, 18, 0, 1),
(121, 'Dealer Dinner', '2014-02-19', '2014-02-20', '17:20:17', 'sd', 'd', 'd', 5, 'done2.jpg', 1, 19, 0, 0),
(122, 'Dealer Dinner', '0000-00-00', '2014-02-20', '17:20:49', 'sd', 'd', 'd', 5, 'done2.jpg', 1, 19, 0, 1),
(123, 'Garage Meet', '2014-02-20', '2014-02-24', '10:20:43', 'ddd', 'ddd', 'ddd', 2569, 'bg.html', 1, 20, 0, 0),
(124, 'Garage Meet', '0000-00-00', '2014-02-24', '10:22:00', 'ddd', 'ddd', 'ddd', 2, 'accordian.html', 1, 20, 1, 1),
(125, 'Garage Meet', '2014-02-19', '2014-02-24', '14:23:24', 'jjrtng', 'trns', 'tsrh', 5181, 'accordian1.html', 1, 20, 0, 0),
(126, 'Garage Meet', '2014-02-06', '2014-02-24', '14:24:55', '6y', 't', 'tr', 52818, 'bg1.html', 1, 21, 0, 0),
(127, 'Store arrangement', '2014-02-20', '2014-02-24', '20:10:26', 'svd', 'sdvsvsdf', 'dfs', 123698, 'accordian2.html', 1, 22, 0, 0),
(128, 'Street Promote', '2014-02-13', '2014-02-25', '08:53:58', 'as', 'asc', 'asc', 5983, 'Hack22.Hack2', 1, 22, 0, 1),
(129, 'Street Promote', '2014-02-12', '2014-02-25', '09:15:52', 'as', 'asc', 'asc', 7896, 'Hack22.Hack2', 1, 23, 0, 1),
(130, 'Street Promote', '2014-02-05', '2014-02-25', '09:17:50', 'as', 'asc', 'asc', 89, 'Hack22.Hack2', 1, 24, 0, 1),
(131, 'Street Promote', '2014-02-05', '2014-02-25', '09:23:45', 'as', 'asc', 'asc', 89965, 'Hack22.Hack2', 1, 25, 0, 1),
(132, 'Street Promote', '2014-02-26', '2014-02-25', '09:26:20', 'as', 'asc', 'asc', 89653, 'Hack22.Hack2', 1, 26, 0, 1),
(133, 'Garage Meet', '2014-05-21', '2014-02-25', '15:19:29', 'fff', 'fff', 'fff', 45883, 'bg2.html', 1, 26, 0, 0),
(134, 'Garage Meet', '2014-02-12', '2014-02-25', '20:22:08', 'fff', 'fff', 'fff', 45, 'bg2.html', 1, 26, 0, 1),
(135, 'Garage Meet', '2014-02-27', '2014-02-25', '20:44:54', 't1', 'r1', 'l1', 253, 'bg3.html', 1, 27, 0, 0),
(136, 'Garage Meet', '2014-02-20', '2014-02-25', '20:48:08', 't1', 'r1', 'l1', 253, 'bg3.html', 1, 27, 1, 1),
(137, 'Garage Meet', '2014-02-14', '2014-02-26', '13:14:32', 'dac', 'sca', 'cas', 0, '', 1, 27, 0, 0),
(138, 'cool', '2014-02-04', '2014-02-26', '14:20:06', 'd', 'd', 'd', 288, '', 1, 28, 0, 0),
(139, 'Garage Meet', '2014-02-25', '2014-02-26', '14:21:45', 'ds', 'ds', 'ds', 28, '', 1, 29, 0, 0),
(140, 'dvsv', '2014-02-20', '2014-02-26', '16:08:47', 'ds', 'ds', 'dsds', 5551, 'bg4.html', 1, 30, 0, 0),
(141, 'Dealer Dinner', '2014-06-13', '2014-02-26', '16:29:22', 'xz', 'ds', 'ds', 369, 'accordian3.html', 1, 31, 1, 0),
(142, 'jj', '2014-02-14', '2014-02-26', '19:59:16', 'cee', 'jj', 'j', 555, '', 1, 31, 1, 0),
(143, 'Garage Meet', '2014-02-19', '2014-02-27', '09:40:16', 'dc', 'vd', 'vd', 32156, 'accordian4.html', 1, 31, 0, 0),
(144, 'Garage Meet', '2014-02-04', '2014-02-27', '09:46:45', 'd', 'd', 'd', 55, '', 1, 31, 0, 0),
(145, 'Garage Meet', '2014-02-06', '2014-02-27', '09:48:17', 'df', 'bd', 'd', 2, '', 1, 31, 0, 0),
(146, 'Garage Meet', '2014-02-13', '2014-02-27', '09:55:08', 'ac', 'acs', 'cas', 55, '', 1, 32, 0, 0),
(147, 'Garage Meet', '2014-02-20', '2014-02-27', '09:57:56', 'sac', 'cas', 'csa', 888, 'accordian5.html', 1, 33, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campaign_apm`
--

CREATE TABLE IF NOT EXISTS `tbl_campaign_apm` (
  `id_campaign_apm` int(11) NOT NULL AUTO_INCREMENT,
  `id_campaing_sales_officer` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `added_time` time NOT NULL,
  `remark` varchar(100) NOT NULL,
  `due_date` varchar(20) NOT NULL,
  `apm_pending` int(11) NOT NULL COMMENT 'accept=1,hold=2,reject=3',
  `ho_pending` int(11) NOT NULL DEFAULT '0' COMMENT 'ho seen =1',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_campaign_apm`),
  KEY `id_campaing_sales_officer` (`id_campaing_sales_officer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `tbl_campaign_apm`
--

INSERT INTO `tbl_campaign_apm` (`id_campaign_apm`, `id_campaing_sales_officer`, `added_date`, `added_time`, `remark`, `due_date`, `apm_pending`, `ho_pending`, `status`) VALUES
(15, 36, '2014-02-07', '17:49:38', '', '0000-00-00', 1, 1, 1),
(16, 39, '2014-02-07', '17:57:33', '', '0000-00-00', 1, 1, 1),
(17, 38, '2014-02-07', '17:58:33', '', '2014-02-20', 2, 0, 1),
(18, 37, '2014-02-07', '18:00:08', '', '2014-02-26', 2, 0, 1),
(19, 40, '2014-02-10', '08:44:22', '', '2014-02-27', 2, 0, 1),
(20, 41, '2014-02-10', '08:50:30', '', '0000-00-00', 1, 1, 1),
(21, 42, '2014-02-10', '08:54:09', '', '0000-00-00', 3, 0, 1),
(22, 43, '2014-02-10', '08:55:21', '', '0000-00-00', 1, 1, 1),
(23, 49, '2014-02-10', '17:20:31', 'cool', '0000-00-00', 1, 1, 1),
(24, 49, '2014-02-10', '17:20:34', 'cool', '0000-00-00', 1, 1, 1),
(25, 45, '2014-02-10', '17:28:44', '', '2014-02-20', 2, 0, 1),
(26, 46, '2014-02-10', '17:28:56', '', '2014-02-18', 2, 0, 1),
(27, 47, '2014-02-10', '17:43:42', '', '0000-00-00', 1, 1, 1),
(28, 51, '2014-02-12', '13:29:16', 'njk', '0000-00-00', 1, 1, 1),
(29, 52, '2014-02-13', '09:34:53', '', '2014-04-26', 2, 0, 1),
(30, 61, '2014-02-17', '09:31:58', 'cool', '0000-00-00', 1, 1, 1),
(31, 48, '2014-02-18', '10:27:54', '', '0000-00-00', 2, 0, 1),
(32, 56, '2014-02-18', '10:27:54', '', '0000-00-00', 2, 0, 1),
(33, 57, '2014-02-18', '10:30:42', '', '2014-03', 2, 0, 1),
(34, 44, '2014-02-18', '10:33:16', '', '2014-03', 2, 0, 1),
(35, 60, '2014-02-18', '10:33:16', '', '2014-03', 2, 0, 1),
(36, 54, '2014-02-18', '10:35:46', '', '', 1, 1, 1),
(37, 50, '2014-02-18', '10:38:49', '', '', 1, 1, 1),
(38, 55, '2014-02-18', '10:45:20', '', '', 1, 1, 1),
(39, 65, '2014-02-18', '11:56:57', 'bhhy', '', 1, 1, 1),
(40, 64, '2014-02-18', '12:04:41', 'dd', '', 1, 1, 1),
(41, 66, '2014-02-18', '12:05:44', 'acac', '', 1, 1, 1),
(42, 67, '2014-02-18', '12:13:15', 'f', '', 1, 1, 1),
(43, 72, '2014-02-18', '12:57:01', '', '', 1, 1, 1),
(44, 73, '2014-02-19', '08:57:51', 'bg', '', 1, 1, 1),
(45, 74, '2014-02-19', '09:26:07', '', '', 1, 1, 1),
(46, 75, '2014-02-20', '12:50:02', '', '2014-02', 2, 0, 1),
(47, 80, '2014-02-20', '14:33:00', 'fgf', '2014-03', 2, 0, 1),
(48, 81, '2014-02-20', '14:34:13', '', '', 1, 1, 1),
(49, 86, '2014-02-20', '17:09:21', '', '', 1, 1, 1),
(50, 88, '2014-02-20', '17:20:34', '', '2014-02', 2, 0, 1),
(51, 90, '2014-02-24', '10:21:10', '', '2014-02', 2, 0, 1),
(52, 91, '2014-02-24', '10:22:16', '', '', 1, 1, 1),
(53, 94, '2014-02-24', '20:11:05', 'svs', '2014-04', 2, 0, 1),
(54, 99, '2014-02-25', '12:41:06', 'apm tre', '', 1, 0, 1),
(55, 100, '2014-02-25', '20:21:38', 'aelnb', '2014-02', 2, 0, 1),
(56, 102, '2014-02-25', '20:46:12', 'vg', '2014-06', 2, 0, 1),
(57, 103, '2014-02-25', '20:48:36', 'klo', '', 1, 1, 1),
(58, 108, '2014-02-26', '16:29:58', 'dsv', '', 1, 1, 1),
(59, 109, '2014-02-26', '20:36:16', '', '', 1, 1, 1),
(60, 58, '2014-02-27', '12:18:03', '', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campaign_dealer`
--

CREATE TABLE IF NOT EXISTS `tbl_campaign_dealer` (
  `id_campaign_dealer` int(11) NOT NULL AUTO_INCREMENT,
  `id_campaign` int(11) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `current_to` double NOT NULL,
  `increase_to` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_campaign_dealer`),
  KEY `id_dealer` (`id_dealer`),
  KEY `id_campaign` (`id_campaign`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `tbl_campaign_dealer`
--

INSERT INTO `tbl_campaign_dealer` (`id_campaign_dealer`, `id_campaign`, `id_dealer`, `current_to`, `increase_to`, `status`) VALUES
(35, 60, 1, 20000, 25, 1),
(36, 61, 2, 50000, 655, 1),
(37, 62, 1, 20000, 0, 1),
(38, 63, 1, 20000, 258, 1),
(39, 64, 1, 20000, 258, 1),
(40, 65, 1, 20000, 258, 1),
(41, 65, 2, 50000, 326, 1),
(42, 66, 1, 20000, 2000000, 1),
(43, 66, 2, 50000, 369874, 1),
(44, 67, 1, 20000, 258741, 1),
(45, 68, 1, 20000, 25896, 1),
(46, 69, 1, 20000, 50000, 1),
(47, 69, 1, 20000, 100000, 1),
(48, 70, 2, 50000, 2589, 1),
(49, 71, 1, 20000, 8, 1),
(50, 72, 2, 50000, 456, 1),
(51, 73, 1, 20000, 50000, 1),
(52, 74, 1, 20000, 89000, 1),
(53, 75, 2, 50000, 2399999, 1),
(54, 76, 2, 50000, 698, 1),
(55, 77, 2, 50000, 100000, 1),
(56, 78, 2, 50000, 36987, 1),
(57, 79, 2, 50000, 258, 1),
(58, 80, 2, 50000, 63987, 1),
(59, 81, 2, 50000, 258, 1),
(60, 82, 1, 20000, 852, 1),
(61, 83, 1, 20000, 236589, 1),
(62, 84, 2, 50000, 3658, 1),
(63, 85, 2, 50000, 258, 1),
(64, 86, 2, 50000, 258, 1),
(65, 87, 1, 20000, 258, 1),
(66, 88, 1, 20000, 28635, 1),
(67, 89, 2, 50000, 258, 1),
(68, 90, 2, 50000, 3214, 1),
(69, 91, 2, 50000, 258, 1),
(70, 92, 2, 50000, 2589, 1),
(71, 93, 1, 20000, 6987, 1),
(72, 94, 2, 50000, 589745, 1),
(73, 94, 1, 20000, 23698, 1),
(74, 95, 1, 20000, 5896, 1),
(75, 96, 1, 20000, 889, 1),
(76, 97, 1, 20000, 889, 1),
(77, 98, 1, 20000, 2589, 1),
(78, 99, 1, 20000, 36987, 1),
(79, 100, 1, 20000, 588, 1),
(81, 102, 2, 50000, 2365, 1),
(82, 103, 1, 20000, 5896, 1),
(83, 104, 1, 20000, 258, 1),
(84, 105, 1, 20000, 2589, 1),
(85, 106, 1, 20000, 5896, 1),
(86, 107, 2, 50000, 59656, 1),
(87, 107, 1, 20000, 2589663, 1),
(88, 108, 1, 20000, 258628, 1),
(89, 108, 2, 50000, 4854785, 1),
(90, 109, 2, 50, 4, 1),
(91, 110, 1, 20, 258, 1),
(92, 110, 2, 50, 4, 1),
(93, 111, 1, 20, 258, 1),
(94, 111, 2, 50, 4, 1),
(95, 112, 1, 20, 258, 1),
(96, 112, 2, 50, 4, 1),
(97, 113, 1, 20000, 258628, 1),
(98, 113, 2, 50000, 4854785, 1),
(99, 114, 1, 20000, 258628, 1),
(100, 114, 2, 50000, 4854785, 1),
(101, 115, 1, 20000, 258628, 1),
(102, 115, 2, 50000, 4854785, 1),
(103, 116, 1, 20000, 258628, 1),
(104, 116, 2, 50000, 4854785, 1),
(105, 117, 1, 20000, 258628, 1),
(106, 117, 2, 50000, 4854785, 1),
(107, 118, 1, 20000, 258628, 1),
(108, 118, 2, 50000, 4854785, 1),
(109, 119, 1, 20000, 258, 1),
(110, 120, 1, 20000, 258, 1),
(111, 121, 2, 50000, 258, 1),
(112, 122, 2, 50000, 258, 1),
(113, 123, 1, 0, 25896, 1),
(114, 123, 4, 0, 32556, 1),
(115, 124, 1, 0, 25896, 1),
(116, 124, 4, 0, 32556, 1),
(117, 125, 1, 926.6666666666667, 5688, 1),
(118, 125, 2, 4898.666666666667, 0, 1),
(119, 126, 1, 926.6666666666667, 36985, 1),
(120, 126, 2, 4898.666666666667, 3698745, 1),
(121, 127, 1, 926.6666666666667, 253698, 1),
(122, 127, 2, 4898.666666666667, 2588945, 1),
(123, 127, 3, 0, 25899, 1),
(124, 128, 2, 4898.666666666667, 569, 1),
(125, 129, 2, 4898.666666666667, 8963, 1),
(126, 130, 2, 4898.666666666667, 5889, 1),
(127, 131, 2, 4898.666666666667, 0, 1),
(128, 132, 2, 4898.666666666667, 58963, 1),
(129, 133, 1, 926.6666666666667, 56983, 1),
(130, 133, 2, 4898.666666666667, 8845, 1),
(131, 134, 1, 926.6666666666667, 0, 1),
(132, 134, 2, 4898.666666666667, 0, 1),
(133, 135, 1, 926.6666666666667, 639, 1),
(134, 135, 2, 4898.666666666667, 3215, 1),
(135, 136, 1, 926.6666666666667, 2563, 1),
(136, 136, 2, 4898.666666666667, 5555, 1),
(137, 137, 1, 926.6666666666667, 2588, 1),
(138, 138, 1, 926.6666666666667, 255, 1),
(139, 139, 2, 4898.666666666667, 25888, 1),
(140, 140, 1, 926.6666666666667, 255, 1),
(141, 141, 1, 926.6666666666667, 258896, 1),
(142, 142, 1, 926.6666666666667, 666, 1),
(143, 143, 1, 926.6666666666667, 3215, 1),
(144, 143, 3, 3698.22, 3699, 1),
(145, 144, 1, 926.6666666666667, 55, 1),
(146, 145, 1, 926.6666666666667, 8855, 1),
(147, 146, 1, 926.6666666666667, 255, 1),
(148, 147, 1, 926.6666666666667, 777, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campaign_ho`
--

CREATE TABLE IF NOT EXISTS `tbl_campaign_ho` (
  `id_campaing_ho` int(11) NOT NULL AUTO_INCREMENT,
  `id_campaign_apm` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `added_time` time NOT NULL,
  `remark` varchar(100) NOT NULL,
  `due_date` varchar(20) NOT NULL,
  `ho_pending` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_campaing_ho`),
  KEY `id_campaign_apm` (`id_campaign_apm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_campaign_ho`
--

INSERT INTO `tbl_campaign_ho` (`id_campaing_ho`, `id_campaign_apm`, `added_date`, `added_time`, `remark`, `due_date`, `ho_pending`, `status`) VALUES
(3, 15, '0000-00-00', '17:51:06', '', '0000-00-00', 1, 1),
(4, 16, '0000-00-00', '17:58:04', '', '0000-00-00', 1, 1),
(5, 20, '0000-00-00', '08:51:42', '', '0000-00-00', 2, 1),
(6, 22, '0000-00-00', '09:07:44', '', '0000-00-00', 3, 1),
(7, 23, '0000-00-00', '17:28:26', '', '0000-00-00', 1, 1),
(8, 24, '0000-00-00', '17:29:33', '', '0000-00-00', 2, 1),
(9, 28, '0000-00-00', '14:08:56', 'completed', '0000-00-00', 1, 1),
(10, 30, '0000-00-00', '09:32:18', 'why', '0000-00-00', 1, 1),
(11, 36, '0000-00-00', '10:35:59', '', '0000-00-00', 2, 1),
(12, 37, '0000-00-00', '10:39:03', '', '2014-03', 2, 1),
(13, 38, '0000-00-00', '10:45:27', '', '', 1, 1),
(14, 39, '0000-00-00', '11:57:09', 'gg', '', 1, 1),
(15, 41, '0000-00-00', '12:05:55', '', '', 1, 1),
(16, 40, '2014-02-18', '12:09:30', '', '', 1, 1),
(17, 27, '2014-02-18', '12:11:17', 'd', '', 1, 1),
(18, 42, '2014-02-18', '12:13:39', '', '', 1, 1),
(19, 43, '2014-02-18', '12:57:09', '', '', 1, 1),
(20, 44, '2014-02-19', '08:58:07', 'mhg', '', 1, 1),
(21, 45, '2014-02-19', '09:26:16', '', '', 1, 1),
(22, 48, '2014-02-20', '14:34:25', '', '2014-04', 2, 1),
(23, 49, '2014-02-20', '17:09:39', '', '2014-02', 2, 1),
(24, 52, '2014-02-24', '10:22:26', '', '', 1, 1),
(25, 57, '2014-02-25', '20:49:16', 'jiu', '', 1, 1),
(26, 58, '2014-02-26', '16:30:23', 'fe', '', 1, 1),
(27, 59, '2014-02-26', '20:36:46', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campaign_sales_officer`
--

CREATE TABLE IF NOT EXISTS `tbl_campaign_sales_officer` (
  `id_campaing_sales_officer` int(11) NOT NULL AUTO_INCREMENT,
  `id_campaign` int(11) NOT NULL,
  `id_sales_officer` int(11) NOT NULL,
  `id_branch` int(11) NOT NULL,
  `pending` int(11) NOT NULL DEFAULT '0' COMMENT 'APM seen pending=1',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_campaing_sales_officer`),
  KEY `id_campaign` (`id_campaign`),
  KEY `id_sales_officer` (`id_sales_officer`),
  KEY `id_branch` (`id_branch`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `tbl_campaign_sales_officer`
--

INSERT INTO `tbl_campaign_sales_officer` (`id_campaing_sales_officer`, `id_campaign`, `id_sales_officer`, `id_branch`, `pending`, `status`) VALUES
(36, 69, 33, 2, 1, 1),
(37, 70, 33, 1, 1, 1),
(38, 71, 33, 1, 1, 1),
(39, 72, 33, 1, 1, 1),
(40, 73, 33, 1, 1, 1),
(41, 74, 33, 1, 1, 1),
(42, 75, 33, 1, 1, 1),
(43, 76, 33, 1, 1, 1),
(44, 77, 33, 1, 1, 1),
(45, 78, 25, 1, 1, 1),
(46, 79, 25, 1, 1, 1),
(47, 80, 25, 1, 1, 1),
(48, 81, 33, 1, 1, 1),
(49, 82, 33, 1, 1, 1),
(50, 83, 33, 1, 1, 1),
(51, 84, 33, 2, 1, 1),
(52, 85, 33, 1, 1, 1),
(53, 86, 33, 1, 0, 1),
(54, 87, 33, 1, 1, 1),
(55, 88, 33, 1, 1, 1),
(56, 89, 33, 1, 1, 1),
(57, 90, 33, 1, 1, 1),
(58, 91, 33, 1, 1, 1),
(59, 92, 33, 1, 0, 1),
(60, 93, 33, 1, 1, 1),
(61, 94, 33, 1, 1, 1),
(62, 95, 33, 1, 0, 1),
(63, 96, 33, 1, 0, 1),
(64, 97, 33, 1, 1, 1),
(65, 98, 33, 1, 1, 1),
(66, 99, 33, 1, 1, 1),
(67, 100, 33, 1, 1, 1),
(68, 101, 33, 1, 0, 1),
(69, 102, 33, 1, 0, 1),
(70, 103, 33, 1, 0, 1),
(71, 104, 33, 1, 0, 1),
(72, 105, 33, 1, 1, 1),
(73, 106, 33, 1, 1, 1),
(74, 107, 33, 1, 1, 1),
(75, 108, 33, 1, 1, 1),
(76, 109, 33, 1, 0, 1),
(77, 110, 33, 1, 0, 1),
(78, 111, 33, 1, 0, 1),
(79, 112, 33, 1, 0, 1),
(80, 113, 33, 1, 1, 1),
(81, 114, 33, 1, 1, 1),
(82, 115, 33, 1, 0, 1),
(83, 116, 33, 1, 0, 1),
(84, 117, 33, 1, 0, 1),
(85, 118, 33, 1, 0, 1),
(86, 119, 33, 1, 1, 1),
(87, 120, 33, 1, 0, 1),
(88, 121, 33, 1, 1, 1),
(89, 122, 33, 1, 0, 1),
(90, 123, 33, 1, 1, 1),
(91, 124, 33, 1, 1, 1),
(92, 125, 33, 1, 0, 1),
(93, 126, 33, 1, 0, 1),
(94, 127, 33, 1, 1, 1),
(95, 128, 33, 1, 0, 1),
(96, 129, 33, 1, 0, 1),
(97, 130, 33, 1, 0, 1),
(98, 131, 33, 1, 0, 1),
(99, 132, 33, 1, 1, 1),
(100, 133, 33, 1, 1, 1),
(101, 134, 33, 1, 0, 1),
(102, 135, 33, 1, 1, 1),
(103, 136, 33, 1, 1, 1),
(104, 137, 33, 1, 0, 1),
(105, 138, 33, 1, 0, 1),
(106, 139, 33, 1, 0, 1),
(107, 140, 33, 1, 0, 1),
(108, 141, 33, 1, 1, 1),
(109, 142, 33, 1, 1, 1),
(110, 143, 25, 1, 0, 1),
(111, 144, 25, 1, 0, 1),
(112, 145, 33, 1, 0, 1),
(113, 146, 33, 1, 0, 1),
(114, 147, 33, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campaign_type`
--

CREATE TABLE IF NOT EXISTS `tbl_campaign_type` (
  `id_campaing_type` int(11) NOT NULL AUTO_INCREMENT,
  `type_description` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_campaing_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_campaign_type`
--

INSERT INTO `tbl_campaign_type` (`id_campaing_type`, `type_description`, `status`) VALUES
(3, 'Garage Meet', 1),
(4, 'Dealer Dinner', 1),
(8, 'Store arrangement', 1),
(9, 'cool', 0),
(10, 'a', 0),
(11, 'v', 0),
(12, 'd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealer_sales`
--

CREATE TABLE IF NOT EXISTS `tbl_dealer_sales` (
  `id_dealer_sales` int(11) NOT NULL AUTO_INCREMENT,
  `id_dealer` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `sold_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_dealer_sales`),
  KEY `id_dealer` (`id_dealer`),
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_dealer_sales`
--

INSERT INTO `tbl_dealer_sales` (`id_dealer_sales`, `id_dealer`, `id_item`, `qty`, `unit_price`, `sold_date`, `status`) VALUES
(1, 1, 1, 10, 250, '2014-01-15', 1),
(2, 2, 2, 3, 120, '2013-12-24', 1),
(3, 1, 4, 5, 56, '2013-11-28', 1),
(4, 1, 3, 25, 256.2, '2013-10-16', 1),
(5, 2, 2, 56, 256, '2014-02-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hold_campaign`
--

CREATE TABLE IF NOT EXISTS `tbl_hold_campaign` (
  `id_hold_campaign` int(11) NOT NULL AUTO_INCREMENT,
  `id_campaign` int(11) NOT NULL,
  `hold_campaign_id` int(11) NOT NULL,
  `apm_approve` varchar(8) NOT NULL,
  `ho_approve` varchar(8) NOT NULL,
  `hold_date` varchar(10) NOT NULL,
  PRIMARY KEY (`id_hold_campaign`),
  KEY `id_campaign` (`id_campaign`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_hold_campaign`
--

INSERT INTO `tbl_hold_campaign` (`id_hold_campaign`, `id_campaign`, `hold_campaign_id`, `apm_approve`, `ho_approve`, `hold_date`) VALUES
(1, 108, 0, 'Hold', '', '2014-02'),
(2, 108, 0, 'Hold', '', '2014-02'),
(3, 117, 108, 'Hold', '', '2014-02'),
(4, 118, 108, 'Hold', '', '2014-02'),
(5, 120, 119, 'Accept', 'Hold', '2014-02'),
(6, 122, 121, 'Hold', '', '2014-02'),
(7, 124, 123, 'Hold', '', '2014-02'),
(8, 128, 70, 'Hold', '', '2014-02'),
(9, 129, 70, 'Hold', '', '2014-02'),
(10, 130, 70, 'Hold', '', '2014-02'),
(11, 131, 70, 'Hold', '', '2014-02'),
(12, 132, 70, 'Hold', '', '2014-02'),
(13, 134, 133, 'Hold', '', '2014-02'),
(14, 136, 135, 'Hold', '', '2014-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hold_campaign_dealer`
--

CREATE TABLE IF NOT EXISTS `tbl_hold_campaign_dealer` (
  `id_hold_campaign_dealer` int(11) NOT NULL AUTO_INCREMENT,
  `id_campaign` int(11) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `current_t_o` double NOT NULL,
  `increase_to` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_hold_campaign_dealer`),
  KEY `id_campaign` (`id_campaign`),
  KEY `id_dealer` (`id_dealer`),
  KEY `current_t_o` (`current_t_o`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_hold_campaign_dealer`
--

INSERT INTO `tbl_hold_campaign_dealer` (`id_hold_campaign_dealer`, `id_campaign`, `id_dealer`, `current_t_o`, `increase_to`, `status`) VALUES
(1, 132, 2, 50000, 2589, 1),
(2, 134, 1, 926.67, 56983, 1),
(3, 134, 2, 4898.67, 8845, 1),
(4, 136, 1, 926.67, 639, 1),
(5, 136, 2, 4898.67, 3215, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_after_campaign`
--
ALTER TABLE `tbl_after_campaign`
  ADD CONSTRAINT `tbl_after_campaign_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `tbl_campaign` (`id_campaing`);

--
-- Constraints for table `tbl_campaign_apm`
--
ALTER TABLE `tbl_campaign_apm`
  ADD CONSTRAINT `tbl_campaign_apm_ibfk_1` FOREIGN KEY (`id_campaing_sales_officer`) REFERENCES `tbl_campaign_sales_officer` (`id_campaing_sales_officer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_campaign_dealer`
--
ALTER TABLE `tbl_campaign_dealer`
  ADD CONSTRAINT `tbl_campaign_dealer_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `tbl_campaign` (`id_campaing`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_campaign_dealer_ibfk_2` FOREIGN KEY (`id_dealer`) REFERENCES `tbl_dealer` (`delar_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_campaign_ho`
--
ALTER TABLE `tbl_campaign_ho`
  ADD CONSTRAINT `tbl_campaign_ho_ibfk_1` FOREIGN KEY (`id_campaign_apm`) REFERENCES `tbl_campaign_apm` (`id_campaign_apm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_campaign_sales_officer`
--
ALTER TABLE `tbl_campaign_sales_officer`
  ADD CONSTRAINT `tbl_campaign_sales_officer_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `tbl_campaign` (`id_campaing`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_campaign_sales_officer_ibfk_2` FOREIGN KEY (`id_sales_officer`) REFERENCES `tbl_sales_officer` (`sales_officer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_campaign_sales_officer_ibfk_3` FOREIGN KEY (`id_branch`) REFERENCES `tbl_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_dealer_sales`
--
ALTER TABLE `tbl_dealer_sales`
  ADD CONSTRAINT `tbl_dealer_sales_ibfk_1` FOREIGN KEY (`id_dealer`) REFERENCES `tbl_dealer` (`delar_id`),
  ADD CONSTRAINT `tbl_dealer_sales_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `tbl_item` (`item_id`);

--
-- Constraints for table `tbl_hold_campaign`
--
ALTER TABLE `tbl_hold_campaign`
  ADD CONSTRAINT `tbl_hold_campaign_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `tbl_campaign` (`id_campaing`);

--
-- Constraints for table `tbl_hold_campaign_dealer`
--
ALTER TABLE `tbl_hold_campaign_dealer`
  ADD CONSTRAINT `tbl_hold_campaign_dealer_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `tbl_campaign` (`id_campaing`),
  ADD CONSTRAINT `tbl_hold_campaign_dealer_ibfk_2` FOREIGN KEY (`id_dealer`) REFERENCES `tbl_dealer` (`delar_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
