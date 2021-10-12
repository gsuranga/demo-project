-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 07:21 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dimo_lanka_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acc_def`
--

CREATE TABLE IF NOT EXISTS `tbl_acc_def` (
  `def_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_no` varchar(100) NOT NULL,
  `def` varchar(1000) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`def_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_acc_def`
--

INSERT INTO `tbl_acc_def` (`def_id`, `acc_no`, `def`, `status`, `date`) VALUES
(1, '731C9901', 'COLOMBO COUNTER - CASH SALES', 1, '2014-02-06'),
(2, '731C9900', 'COLOMBO COUNTER - CASH SALES', 1, '2014-02-06'),
(3, '731S0008', 'COLOMBO COUNTER - CREDIT SALES', 1, '2014-02-06'),
(4, '731S0220', 'COLOMBO COUNTER - CREDIT CARD SALES', 1, '2014-02-06'),
(5, '831D0001', 'Colombo Work Shop Credit Customer - Normal Repair.', 1, '2014-02-06'),
(6, '831C9900', 'Colombo Workshop cash Sales', 1, '2014-02-06'),
(7, '831C9901', 'Colombo Workshop cash Sales', 1, '2014-02-06'),
(8, '000W2831', 'Colombo work shop - Warranty repairs. ', 1, '2014-02-06'),
(9, '831A9999', 'Colombo work shop - Normal repairs', 1, '2014-02-06'),
(10, '831S0555', 'Colombo work shop - Normal repairs', 1, '2014-02-06'),
(11, '832D0001', 'Colombo work shop - Normal repairs', 1, '2014-02-06'),
(12, '731K0016', 'Colombo Dealer Sales', 1, '2014-02-10');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_all_sales`
--

CREATE TABLE IF NOT EXISTS `tbl_all_sales` (
  `all_sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_no` varchar(50) DEFAULT '-',
  `description` varchar(1000) DEFAULT '-',
  `date_decar` varchar(45) DEFAULT '-',
  `date_edit` varchar(45) DEFAULT '-',
  `time` varchar(100) DEFAULT NULL,
  `acc_no` varchar(50) DEFAULT '-',
  `customer_name` varchar(1000) DEFAULT '-',
  `qty` double DEFAULT '0',
  `cost_price` double DEFAULT '0',
  `selling_val` double DEFAULT '0',
  `retail_val` double DEFAULT '0',
  `invoice` double DEFAULT '0',
  `wip` double DEFAULT '0',
  `location` varchar(50) DEFAULT '-',
  `in_s` varchar(10) DEFAULT '-',
  `de` varchar(10) DEFAULT '-',
  `disc` int(11) DEFAULT '0',
  `s_e_name` varchar(45) DEFAULT NULL,
  `s_e_code` varchar(50) DEFAULT '-',
  `authorised_by` varchar(500) DEFAULT '-',
  `authorised_by_code` varchar(50) DEFAULT '-',
  `creating_op` varchar(500) DEFAULT '-',
  `creating_op_code` varchar(45) DEFAULT '-',
  `vehicle_reg_no` varchar(50) DEFAULT '-',
  `area_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`all_sales_id`),
  KEY `fk_area_id_idx` (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1534 ;

--
-- Dumping data for table `tbl_all_sales`
--

INSERT INTO `tbl_all_sales` (`all_sales_id`, `part_no`, `description`, `date_decar`, `date_edit`, `time`, `acc_no`, `customer_name`, `qty`, `cost_price`, `selling_val`, `retail_val`, `invoice`, `wip`, `location`, `in_s`, `de`, `disc`, `s_e_name`, `s_e_code`, `authorised_by`, `authorised_by_code`, `creating_op`, `creating_op_code`, `vehicle_reg_no`, `area_id`, `status`) VALUES
(1, 'TE285426205409', 'SPEEDO PINION', '2013-11-29', '2014-02-06', '16:04', '831C9902', 'Cash Sales Retail - Colombo Service -                           SVAT  (  Suspended VAT)', 1, 119.7111, 131.68, 205.75, 58723, 64351, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Prabath Rohana', 'PRR', 'Aruna Alwis', 'ASW', 'WPNA-8670', 4, 1),
(2, 'TE285426205408', 'SPEEDO PINION', '2013-11-29', '2014-02-06', '16:04', '831C9902', 'Cash Sales Retail - Colombo Service -                           SVAT  (  Suspended VAT)', 1, 100.19, 110.21, 220.12, 58723, 64351, 'SIYAMBAL', 'X', 'B', 0, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPNA-8670', 4, 1),
(3, 'TE252320123205', 'ASSY FUEL TANK CAP COMPLETE', '2013-11-29', '2014-02-11', '12:22', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 1, 691.5386, 808.55, 1129.01, 3020176, 19122, 'SIYAMBAL', 'X', 'B', 0, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPPW-4372', 4, 1),
(4, 'TE282982400125', 'KIT WASHER SYSTEM', '2013-11-29', '2014-02-11', '12:22', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 1, 1319.2636, 1715.04, 2601.76, 3020176, 19122, 'SIYAMBAL', 'X', 'B', 0, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPPW-4372', 4, 1),
(5, 'TET06560000043', 'TAIL LAMP', '2013-12-20', '2014-02-12', '13:50', '831L0001', 'Laugfs Gas Plc                                                                                      Do not release after the12-10-2013-ref email-2-10-', 5, 16287.44, 26650, 26650, 1011814, 18132, 'COLOMBO', 'X', 'B', 0, 'Gamini Ranasinghe', 'GAI', 'Lalinda Perera', 'LAH', 'Gamini Ranasinghe', 'GAI', 'WPLY-1861', 4, 1),
(6, 'TE266335707101', 'ASSY COMPLETE PKNGN', '2013-11-01', '2014-02-06', '15:23', '831C9902', 'Cash Sales Retail - Colombo Service -                           SVAT  (  Suspended VAT)', 1, 197498.55, 217248.41, 339918.7, 58723, 64351, 'SIYAMBAL', 'X', 'B', 0, 'Lalinda Perera', 'LAH', 'Lalinda Perera', 'LAH', 'Lalinda Perera', 'LAH', 'WPNA-8670', 4, 1),
(7, 'TE278603999947', 'WINDSCREEN ADHESIVE (TROPIC)', '2013-11-01', '2014-02-08', '14:23', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 2008.93, 2611.61, 2611.61, 58803, 10197, 'SIYAMBAL', 'X', 'B', 0, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPPP-8596', 4, 1),
(8, 'TE266335707101', 'ASSY WINDSHIELD GLASS', '2013-11-01', '2014-02-08', '14:21', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 26, 11145.4084, 20731.74, 20731.74, 58803, 10197, 'SIYAMBAL', 'X', 'B', 0, 'Achinthya Liyanage', 'DPL', 'Lalinda Perera', 'LAH', 'Achinthya Liyanage', 'DPL', 'WPPP-8596', 4, 1),
(9, 'TE252320123205', 'ASSY  HEAD  LAMP  RH', '2013-11-01', '2014-02-12', '09:48', '831C9900', 'Cash Sales Retail - Colombo Service -', 44, 1389.9733, 2148.894, 2387.66, 58932, 63516, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLJ-9503', 4, 1),
(10, 'TE285426518701', 'SPRING DETENT', '2013-11-20', '2014-02-06', '10:22', '831C9902', 'Cash Sales Retail - Colombo Service -                           SVAT  (  Suspended VAT)', 3, 7.73, 25.5, 57.99, 58723, 64351, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPNA-8670', 4, 1),
(11, 'TE285426703402', 'HALF BUSH', '2013-11-20', '2014-02-06', '10:22', '831C9902', 'Cash Sales Retail - Colombo Service -                           SVAT  (  Suspended VAT)', 2, 22.86, 50.3, 78.68, 58723, 64351, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPNA-8670', 4, 1),
(12, 'TE266335707101', 'HALF BUSH', '2013-11-20', '2014-02-06', '10:22', '831C9902', 'Cash Sales Retail - Colombo Service -                           SVAT  (  Suspended VAT)', 30, 24.6, 54.12, 84.64, 58723, 64351, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPNA-8670', 4, 1),
(13, 'TF15950100505', 'BALL 5DIA GRADE-20', '2013-11-20', '2014-02-06', '10:22', '831C9902', 'Cash Sales Retail - Colombo Service -                           SVAT  (  Suspended VAT)', 2, 8.9606, 16.66, 25.94, 58723, 64351, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPNA-8670', 4, 1),
(14, 'TE268426209901', 'CARRIER', '2013-11-20', '2014-02-06', '10:22', '831C9902', 'Cash Sales Retail - Colombo Service -                           SVAT  (  Suspended VAT)', 3, 30.3775, 99.12, 181.29, 58723, 64351, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPNA-8670', 4, 1),
(15, 'TE268426208701', 'COMPRESSIOR SPRING', '2013-11-20', '2014-02-06', '10:22', '831C9902', 'Cash Sales Retail - Colombo Service -                           SVAT  (  Suspended VAT)', 3, 8.73, 26.25, 45.69, 58723, 64351, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPNA-8670', 4, 1),
(16, 'TE285426258601', 'THRUST WASHER (5TH SPEED)', '2013-11-20', '2014-02-06', '10:22', '831C9902', 'Cash Sales Retail - Colombo Service -                           SVAT  (  Suspended VAT)', 1, 128.55, 141.41, 221.24, 58723, 64351, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPNA-8670', 4, 1),
(17, 'TE285426516701', 'INTERLOCK PIN', '2013-11-20', '2014-02-06', '10:22', '831C9902', 'Cash Sales Retail - Colombo Service -                           SVAT  (  Suspended VAT)', 2, 8.8, 19.36, 30.26, 58723, 64351, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPNA-8670', 4, 1),
(18, 'TE284572300121', 'INNER HANDLE ASSY LH G001', '2013-11-30', '2014-02-06', '09:17', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 1, 211.35, 274.76, 391, 3020110, 38467, 'SIYAMBAL', 'X', 'B', 0, 'Inoka Rajapaksha', 'INR', 'Aruna Alwis', 'ASW', 'Inoka Rajapaksha', 'INR', 'WPNA-9652', 4, 1),
(19, 'TE278609999920', 'STRAINER FUEL', '2014-01-31', '2014-02-01', '19:53', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 257.1899, 412.18, 412.18, 58630, 31761, 'SIYAMBAL', 'X', 'B', 0, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'UPNB-6399', 4, 1),
(20, 'TE278609119904', 'FUEL FILTER', '2014-01-31', '2014-02-01', '19:53', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 482.3875, 741.45, 741.45, 58630, 31761, 'SIYAMBAL', 'X', 'B', 0, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'UPNB-6399', 4, 1),
(21, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-01-31', '2014-02-01', '19:53', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 671.3473, 1092.85, 1092.85, 58630, 31761, 'SIYAMBAL', 'X', 'B', 0, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'UPNB-6399', 4, 1),
(22, 'TE264042120101', 'DRAIN  VALVE', '2014-01-31', '2014-02-01', '19:53', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 286.8597, 475.43, 475.43, 58630, 31761, 'SIYAMBAL', 'X', 'B', 0, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'UPNB-6399', 4, 1),
(23, 'TE251926308302', 'SHIM', '2014-01-31', '2014-02-11', '19:45', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 10, 16.05, 208.7, 274.5, 3020172, 30597, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', '01/N012851', 4, 1),
(24, 'TE257633403103', 'TAPER ROLLER BRG   32308', '2014-01-31', '2014-02-06', '19:19', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 1, 1658.3811, 2520.648, 2800.72, 1011751, 31607, 'SIYAMBAL', 'X', 'B', 10, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPLD-6534', 4, 1),
(25, 'TE257633403101', 'TAPER ROLLER BRG  565/562', '2014-01-31', '2014-02-06', '19:19', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 1, 3374.2435, 5235.687, 5817.43, 1011751, 31607, 'SIYAMBAL', 'X', 'B', 10, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPLD-6534', 4, 1),
(26, 'TE278603990147', 'HOSE CLAMP 20-32', '2014-01-31', '2014-02-01', '17:41', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 1, 98.21, 114.912, 127.68, 1011717, 31625, 'SIYAMBAL', 'X', 'B', 10, 'Malaka maduranga', 'DMM', 'Malaka maduranga', 'DMM', 'Malaka maduranga', 'DMM', 'WPNB-3756', 4, 1),
(27, 'TE252750105883', 'RUBBER HOSE', '2014-01-31', '2014-02-01', '17:41', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 1, 145.482, 217.179, 241.31, 1011717, 31625, 'SIYAMBAL', 'X', 'B', 10, 'Malaka maduranga', 'DMM', 'Malaka maduranga', 'DMM', 'Malaka maduranga', 'DMM', 'WPNB-3756', 4, 1),
(28, 'TE257667106339', 'COTTON WASTE', '2014-01-31', '2014-02-06', '17:22', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 12, 5.5531, 79.272, 88.08, 1011751, 31607, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLD-6534', 4, 1),
(29, 'TE284574300139', 'LANKA GREASE MP184K', '2014-01-31', '2014-02-06', '17:22', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 6, 506.7285, 4644, 5160, 1011751, 31607, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLD-6534', 4, 1),
(30, 'TE277954200110', 'KEROSENE OIL', '2014-01-31', '2014-02-06', '17:22', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 4, 109.7975, 440, 440, 1011751, 31607, 'SIYAMBAL', 'X', 'B', 0, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLD-6534', 4, 1),
(31, 'TE885435082515', 'HUB GREASING KIT - EX', '2014-01-31', '2014-02-06', '17:20', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 1, 1838.313, 2809.107, 3121.23, 1011751, 31607, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLD-6534', 4, 1),
(32, 'TE280826809901', 'COTTON WASTE', '2014-01-31', '2014-02-01', '16:48', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 5, 5.5531, 33.03, 36.7, 1011717, 31625, 'SIYAMBAL', 'X', 'B', 10, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPNB-3756', 4, 1),
(33, 'TE252520100124', 'ASSY.WATER PUMP-PSTG PLASTIC IMPELLER', '2014-01-31', '2014-02-01', '16:46', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 1, 8715.6272, 12717.0965, 14961.29, 1011717, 31625, 'SIYAMBAL', 'X', 'B', 15, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPNB-3756', 4, 1),
(34, 'TE252520105301', 'GASKET', '2014-01-31', '2014-02-01', '16:41', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 1, 61.0924, 95.049, 105.61, 1011717, 31625, 'SIYAMBAL', 'X', 'B', 10, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPNB-3756', 4, 1),
(35, 'TE282943100105', 'FUEL FILTER (MICO)', '2014-01-31', '2014-02-11', '16:36', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 4, 241.1928, 378.738, 420.82, 58885, 31346, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'NPPS-6974', 4, 1),
(36, 'TE277954200110', 'FUEL FILTER (MICO)', '2014-01-31', '2014-02-11', '16:36', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 338.7386, 493.74, 548.6, 58885, 31346, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'NPPS-6974', 4, 1),
(37, 'TE269841100101', 'U J CROSS ASSY', '2014-01-31', '2014-02-11', '16:36', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 1616.3449, 2537.001, 2818.89, 58885, 31346, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'NPPS-6974', 4, 1),
(38, 'TE252701155302', 'GASKET TAPPET COVER', '2014-01-31', '2014-02-11', '16:36', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 361.5503, 563.922, 626.58, 58885, 31346, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'NPPS-6974', 4, 1),
(39, 'TE254705107933', 'CAMSHAFT-NORMAL (SHORT INLET', '2014-02-03', '2014-02-03', '08:20', '834i0514', 'Kuruwita Service-INTERNAL SUBLET SALES', 1, 19500, 25350, 19500, 2000211, 29027, 'COLOMBO', 'X', 'Z', 0, 'Rumesh Charith', 'RUC', 'Rumesh Charith', 'RUC', 'Rumesh Charith', 'RUC', 'CPKB-3510', 4, 1),
(40, 'TE277054244601', 'REALY 24', '2014-01-31', '2014-02-05', '16:20', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 1, 199.4, 319.7035, 336.53, 3020084, 31557, 'SIYAMBAL', 'X', 'B', 5, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPLK-8216', 4, 1),
(41, 'TE215341120101', 'COTTON WASTE', '2014-01-31', '2014-02-05', '16:00', '831C9900', 'Cash Sales Retail - Colombo Service -', 2, 5.5531, 14.68, 14.68, 58712, 31696, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPLY-1762', 4, 1),
(42, 'TE264143700127', 'AIR DRIER R/KIT', '2014-01-31', '2014-02-05', '16:00', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 1988.2304, 3510.76, 3510.76, 58712, 31696, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPLY-1762', 4, 1),
(43, 'TE263243700117', 'DESSICANT  CARTRIDGE', '2014-01-31', '2014-02-05', '16:00', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 6557.3993, 11374.32, 11374.32, 58712, 31696, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPLY-1762', 4, 1),
(44, 'TE278809130114', 'ASSY. FILTER ELEMENT (FLEETGUARD)', '2014-01-31', '2014-02-08', '15:58', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 1677.5819, 1750.926, 2629.72, 58794, 30850, 'SIYAMBAL', 'X', 'B', 5, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPLF-7832', 4, 1),
(45, 'TE250726700152', 'SUB ASSY BALL & SOCKET', '2014-01-31', '2014-02-03', '15:49', '831R0017', 'Sri Lanka Railways', 1, 668.1974, 1142.964, 1269.96, 1011721, 26005, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLG-2875', 4, 1),
(46, 'TE264181900147', 'DOOR CLADDING LH', '2014-01-31', '2014-02-13', '15:45', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 1870.73, 3209.202, 3565.78, 59010, 26799, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLJ-1803', 4, 1),
(47, 'TE257632807502', 'BUSH RUBBER', '2014-01-31', '2014-02-05', '15:33', '831C9900', 'Cash Sales Retail - Colombo Service -', 4, 49.8928, 341.962, 359.96, 58682, 31557, 'SIYAMBAL', 'X', 'B', 5, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPLK-8216', 4, 1),
(48, 'TE282940306906', 'CLAMP  SPARE WHEEL MTG', '2014-01-31', '2014-02-08', '16:12', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 78.6719, 117.711, 130.79, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLF-7832', 4, 1),
(49, 'TE282940306501', 'HEX NUT', '2014-01-31', '2014-02-08', '16:12', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 73.0227, 116.478, 129.42, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLF-7832', 4, 1),
(50, 'TE265472300127', 'ASSY HANDLE (WINDOW REGULATOR', '2014-01-31', '2014-02-06', '15:03', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 1, 217.968, 334.008, 371.12, 1011751, 31607, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLD-6534', 4, 1),
(51, 'TE265172300105', 'HANDLE OUTER RH RHD', '2014-01-31', '2014-02-06', '15:03', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 2, 796.2929, 2412.072, 2680.08, 1011751, 31607, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLD-6534', 4, 1),
(52, 'TE257672500124', 'WINDOW REGULATOR RH', '2014-01-31', '2014-02-06', '15:03', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 1, 695.7705, 1162.584, 1291.76, 1011751, 31607, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLD-6534', 4, 1),
(53, 'TE257672500123', 'ASSY WINDOW REGULATOR L/H', '2014-01-31', '2014-02-06', '15:03', '831S0555', 'SAMPATH BANK-MASTER CARD                                VAT AC', 1, 702.1502, 1116.981, 1241.09, 1011751, 31607, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLD-6534', 4, 1),
(54, 'TE580725601601', 'ASSY CLUTCH RELEASE BEARING', '2014-01-31', '2014-02-11', '15:02', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 1, 819.5753, 1069.35, 1362.4, 3020161, 30138, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', '01/N036998', 4, 1),
(55, 'TE272425400159', '160 DIA. ASSLY. CLUTCH COVER', '2014-01-31', '2014-02-11', '15:02', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 1, 1555.8321, 2021.17, 2966.92, 3020161, 30138, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', '01/N036998', 4, 1),
(56, 'TE272425200164', '160 DIA. ASSLY. CLUTCH DISC', '2014-01-31', '2014-02-11', '15:02', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 1, 1130.8677, 1472.45, 2185.94, 3020161, 30138, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', '01/N036998', 4, 1),
(57, 'TE269126800108', 'COTTON WASTE', '2014-01-31', '2014-02-11', '15:00', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 3, 5.5531, 21.78, 22.02, 3020161, 30138, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', '01/N036998', 4, 1),
(58, 'TE257132803402', 'BUSH HALF TOP', '2014-01-31', '2014-02-05', '14:58', '831C9900', 'Cash Sales Retail - Colombo Service -', 2, 297.7958, 1040.763, 1095.54, 58682, 31557, 'SIYAMBAL', 'X', 'B', 5, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'WPLK-8216', 4, 1),
(59, 'TE252520156305', 'V BELT COGGED 1280MM', '2014-02-17', '2014-02-17', '15:18', '731S0002', 'SRI   LANKA   ARMY', 5, 534.2157, 7250, 4580, 1008105, 26142, 'TC1A08D3', 'X', 'A', 0, 'Walter Abeysekara', 'WAL', 'Walter Abeysekara', 'WAL', 'Walter Abeysekara', 'WAL', NULL, 4, 1),
(60, 'TE264126800225', 'GEAR LEVER ASSY BALL JT', '2014-01-31', '2014-02-03', '14:51', '831R0017', 'Sri Lanka Railways', 1, 511.3061, 873.04, 873.04, 1011721, 26005, 'SIYAMBAL', 'X', 'B', 0, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLG-2875', 4, 1),
(61, 'TE264126800224', 'ASSY BALL JOINT RH THREADS', '2014-01-31', '2014-02-03', '14:51', '831R0017', 'Sri Lanka Railways', 1, 499.4729, 897.26, 897.26, 1011721, 26005, 'SIYAMBAL', 'X', 'B', 0, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLG-2875', 4, 1),
(62, 'TE250726700152', 'SUB ASSY BALL & SOCKET', '2014-01-31', '2014-02-03', '14:51', '831R0017', 'Sri Lanka Railways', 1, 668.1974, 1168.3632, 1269.96, 1011721, 26005, 'SIYAMBAL', 'X', 'B', 8, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLG-2875', 4, 1),
(63, 'ZQ3730004', 'SILASTIC GREY', '2014-01-31', '2014-02-11', '14:47', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 1, 364.7389, 474.16, 474.16, 3020161, 30138, 'SIYAMBAL', 'X', 'B', 0, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', '01/N036998', 4, 1),
(64, 'ZQ5555555P', 'COTTON WASTE', '2014-01-31', '2014-02-11', '14:47', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 5, 5.5531, 36.3, 36.7, 3020161, 30138, 'SIYAMBAL', 'X', 'B', 0, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', '01/N036998', 4, 1),
(65, 'ZQ1020001', 'KEROSENE OIL', '2014-01-31', '2014-02-11', '14:47', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 2, 109.7975, 285.48, 285.48, 3020161, 30138, 'SIYAMBAL', 'X', 'B', 0, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', '01/N036998', 4, 1),
(66, 'TE267872300114', 'REG HANDLE', '2014-01-31', '2014-02-08', '16:12', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 2, 93.1935, 306.81, 340.9, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLF-7832', 4, 1),
(67, 'TE278605999928', 'GASKET VALVE COVER', '2014-01-31', '2014-02-01', '14:15', '831C9900', 'Cash Sales Retail - Colombo Service -', 6, 198.7354, 2056.74, 2056.74, 58616, 31253, 'SIYAMBAL', 'X', 'B', 0, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLI-3889', 4, 1),
(68, 'ZQ5555555P', 'COTTON WASTE', '2014-01-31', '2014-02-11', '14:06', '831U0012', 'Udaya Lanka (Private) Limited', 3, 5.5531, 19.818, 22.02, 1011806, 30702, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLK-7926', 4, 1),
(69, 'ZQ5180098', 'DE-GREASER', '2014-01-31', '2014-02-11', '14:06', '831U0012', 'Udaya Lanka (Private) Limited', 4, 78.1521, 365.616, 406.24, 1011806, 30702, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLK-7926', 4, 1),
(70, 'ZQ5180081', 'CAR WASH "CARE"', '2014-01-31', '2014-02-11', '14:06', '831U0012', 'Udaya Lanka (Private) Limited', 0.5, 108.3465, 63.441, 70.49, 1011806, 30702, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLK-7926', 4, 1),
(71, 'ZQ5170006', 'GLASS CLEANER (CARE)', '2014-01-31', '2014-02-11', '14:06', '831U0012', 'Udaya Lanka (Private) Limited', 0.1, 139.5113, 16.3224, 18.136, 1011806, 30702, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLK-7926', 4, 1),
(72, 'ZQ3830065', 'SURFACE SHINE[BRITOLü', '2014-01-31', '2014-02-11', '14:06', '831U0012', 'Udaya Lanka (Private) Limited', 0.1, 436.1503, 48.3147, 53.683, 1011806, 30702, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLK-7926', 4, 1),
(73, 'ZQ3730009', 'PAINT  COVER PAPER', '2014-01-31', '2014-02-11', '14:06', '831U0012', 'Udaya Lanka (Private) Limited', 0.1, 34.0011, 3.978, 4.42, 1011806, 30702, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLK-7926', 4, 1),
(74, 'ZQ1070183', 'MARFAK MULTIPURPOSE (LANKA GREASE P18)3', '2014-01-31', '2014-02-11', '14:06', '831U0012', 'Udaya Lanka (Private) Limited', 1.5, 523.4944, 985.5, 1095, 1011806, 30702, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLK-7926', 4, 1),
(75, 'ZQ1020001', 'KEROSENE OIL', '2014-01-31', '2014-02-11', '14:06', '831U0012', 'Udaya Lanka (Private) Limited', 3, 109.5477, 330, 330, 1011806, 30702, 'SIYAMBAL', 'X', 'B', 0, 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'Prabath Rohana', 'PRR', 'WPLK-7926', 4, 1),
(76, 'ZQ5555555P', 'COTTON WASTE', '2014-01-31', '2014-02-05', '14:02', '831C9900', 'Cash Sales Retail - Colombo Service -', 4, 5.5531, 27.892, 29.36, 58682, 31557, 'SIYAMBAL', 'X', 'B', 5, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLK-8216', 4, 1),
(77, 'ZQ2010123P', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-01-31', '2014-02-05', '14:02', '831C9900', 'Cash Sales Retail - Colombo Service -', 15, 362.8095, 6720.1575, 7073.85, 58682, 31557, 'SIYAMBAL', 'X', 'B', 5, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLK-8216', 4, 1),
(78, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-01-31', '2014-02-05', '14:02', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 534.6849, 807.766, 850.28, 58682, 31557, 'SIYAMBAL', 'X', 'B', 5, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLK-8216', 4, 1),
(79, 'TE278609999920', 'STRAINER FUEL', '2014-01-31', '2014-02-05', '14:02', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 257.1899, 391.571, 412.18, 58682, 31557, 'SIYAMBAL', 'X', 'B', 5, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLK-8216', 4, 1),
(80, 'TE278609119904', 'FUEL FILTER', '2014-01-31', '2014-02-05', '14:02', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 482.3875, 704.3775, 741.45, 58682, 31557, 'SIYAMBAL', 'X', 'B', 5, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLK-8216', 4, 1),
(81, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-01-31', '2014-02-05', '14:02', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 671.3473, 1038.2075, 1092.85, 58682, 31557, 'SIYAMBAL', 'X', 'B', 5, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLK-8216', 4, 1),
(82, 'TE278607989915', 'DRAIN  VALVE', '2014-01-31', '2014-02-05', '14:02', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 286.8597, 451.6585, 475.43, 58682, 31557, 'SIYAMBAL', 'X', 'B', 5, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLK-8216', 4, 1),
(83, 'MN007603 018104', 'RING,GENERAL,METAL', '2014-01-31', '2014-02-05', '14:02', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 162.6, 194.788, 205.04, 58682, 31557, 'SIYAMBAL', 'X', 'B', 5, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLK-8216', 4, 1),
(84, 'ZQ0530202', 'VALVE GUIDE CUMMINS', '2014-01-31', '2014-02-12', '13:58', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 1, 1719.0934, 2275, 2275, 3020191, 30844, 'SIYAMBAL', 'X', 'B', 0, 'Chaminda Dinesh', 'CAD', 'Chaminda Dinesh', 'CAD', 'Chaminda Dinesh', 'CAD', 'WPLK-3990', 4, 1),
(85, 'TE581326257902', 'INPUT SHAFT (4-SPEED) (RATIO:1ST=42/11;', '2014-01-31', '2014-02-11', '13:23', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 1, 2681.3, 3485.69, 4364.14, 3020161, 30138, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', '01/N036998', 4, 1),
(86, 'TE265432138717', 'COIL SPRING(YELLOW COLOUR)', '2014-02-05', '2014-02-05', '11:54', '731C0001', 'Ceylon Petrolium Storage Terminals Ltd', 1, 3423.9851, 5466.86, 5880.7, 1008032, 64796, 'COLOMBO', 'X', 'A', 0, 'Amila Umayanga', 'AGA', 'Amila Umayanga', 'AGA', 'Amila Umayanga', 'AGA', 'WPLE-3757', 4, 1),
(87, 'TE253415406302', 'POLY V BELT(6PK)1173 LG', '2014-02-05', '2014-02-05', '11:54', '731C0001', 'Ceylon Petrolium Storage Terminals Ltd', 1, 896.563, 1438.76, 1547.67, 1008032, 64796, 'COLOMBO', 'X', 'A', 0, 'Rumesh Charith', 'RUC', 'Amila Umayanga', 'AGA', 'Rumesh Charith', 'RUC', 'WPLE-3757', 4, 1),
(88, 'TE265432138705', 'FRONT SPRING', '2014-02-05', '2014-02-05', '11:54', '731C0001', 'Ceylon Petrolium Storage Terminals Ltd', 1, 2497.2476, 4354.89, 4684.55, 1008032, 64796, 'COLOMBO', 'X', 'A', 0, 'Rumesh Charith', 'RUC', 'Amila Umayanga', 'AGA', 'Rumesh Charith', 'RUC', 'WPLE-3757', 4, 1),
(89, 'TE265442800110', 'ASSY BRAKE HOSE', '2014-02-05', '2014-02-05', '11:54', '731C0001', 'Ceylon Petrolium Storage Terminals Ltd', 1, 852.5667, 1416.23, 1523.43, 1008032, 64796, 'COLOMBO', 'X', 'A', 0, 'Rumesh Charith', 'RUC', 'Amila Umayanga', 'AGA', 'Rumesh Charith', 'RUC', 'WPLE-3757', 4, 1),
(90, 'TE282972502302', 'GLASS FRONT DOOR RH', '2014-01-31', '2014-02-08', '12:30', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 1349.6635, 2318.886, 2576.54, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Damitha Sandaruwan', 'RDD', 'Prabath Rohana', 'PRR', 'WPLF-7832', 4, 1),
(91, 'TE282972500106', 'ASSY,WIND/REG RH', '2014-01-31', '2014-02-08', '12:30', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 875.3895, 1488.15, 1653.5, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Damitha Sandaruwan', 'RDD', 'Prabath Rohana', 'PRR', 'WPLF-7832', 4, 1),
(92, 'TE269872300103', 'ASSY OUTER HANDLE RH', '2014-01-31', '2014-02-08', '12:30', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 210.0513, 348.597, 387.33, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Damitha Sandaruwan', 'RDD', 'Prabath Rohana', 'PRR', 'WPLF-7832', 4, 1),
(93, 'TE269872300102', 'ASSY OUTER HANDLE LH', '2014-01-31', '2014-02-08', '12:30', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 120.616, 200.997, 223.33, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Prabath Rohana', 'PRR', 'Damitha Sandaruwan', 'RDD', 'Prabath Rohana', 'PRR', 'WPLF-7832', 4, 1),
(94, 'TEZ60060000004', 'SEAL RING ZF', '2014-01-31', '2014-02-05', '12:26', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 104.7878, 156.087, 173.43, 58674, 31558, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'UPLA-6553', 4, 1),
(95, 'TE264046200126', 'SEALING KIT [ZF STEERING]', '2014-01-31', '2014-02-05', '12:26', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 3439.57, 5510.754, 6123.06, 58674, 31558, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'UPLA-6553', 4, 1),
(96, 'TE265832100134', 'PIVOT BUSH FRT SUSP L/LIN', '2014-02-05', '2014-02-05', '11:54', '731C0001', 'Ceylon Petrolium Storage Terminals Ltd', 8, 389.3999, 4844.8, 5211.52, 1008032, 64796, 'COLOMBO', 'X', 'A', 0, 'Rumesh Charith', 'RUC', 'Amila Umayanga', 'AGA', 'Rumesh Charith', 'RUC', 'WPLE-3757', 4, 1),
(97, 'TE265932100114', 'BALL JOINT ASSY.-UPPER W/B', '2014-02-05', '2014-02-05', '11:54', '731C0001', 'Ceylon Petrolium Storage Terminals Ltd', 2, 1274.789, 4724.44, 4342.62, 1008032, 64796, 'COLOMBO', 'X', 'A', 0, 'Rumesh Charith', 'RUC', 'Amila Umayanga', 'AGA', 'Rumesh Charith', 'RUC', 'WPLE-3757', 4, 1),
(98, 'TE269832100163', 'ASSY TOP WISHBONE', '2014-02-05', '2014-02-05', '11:54', '731C0001', 'Ceylon Petrolium Storage Terminals Ltd', 2, 2959.035, 10339.22, 11121.88, 1008032, 64796, 'COLOMBO', 'X', 'A', 0, 'Rumesh Charith', 'RUC', 'Amila Umayanga', 'AGA', 'Rumesh Charith', 'RUC', 'WPLE-3757', 4, 1),
(99, 'ZQ1000010P', 'DIESEL', '2014-01-31', '2014-02-11', '12:15', '831C9900', 'Cash Sales Retail - Colombo Service -', 1, 121.24, 121.24, 121.24, 58892, 31591, 'SIYAMBAL', 'X', 'B', 0, 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'Aruna Alwis', 'ASW', 'EPLI-2081', 4, 1),
(100, 'TE282942300130', 'WHEEL CYLINDER ASSY LH', '2014-01-31', '2014-02-08', '11:59', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 1180.679, 1237.2705, 1989.44, 58794, 30850, 'SIYAMBAL', 'X', 'B', 5, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLF-7832', 4, 1),
(101, 'TE265142100121', 'ASSY.ADJUSTER COMP.FRT;&REAR', '2014-02-01', '2014-02-02', '08:45', '000W2831', 'Tata Commercial Vehicles Warranty Claims-A/C -Colombo Service------------>tranfer to 151T0202', 4, 951.8408, 6166.32, 6166.32, 3020070, 31075, 'SIYAMBAL', 'X', 'B', 0, 'Prabath Rohana', 'PRR', 'Chaminda Dinesh', 'CAD', 'Prabath Rohana', 'PRR', 'SPNB-6859', 4, 1),
(102, 'ZQ5555555P', 'COTTON WASTE', '2014-01-31', '2014-02-08', '11:51', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 5.5531, 6.606, 7.34, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLF-7832', 4, 1),
(103, 'ZQ2010164', 'BRAKE FLUID DOT4[P-164]', '2014-01-31', '2014-02-08', '11:51', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 0.25, 1363.2619, 416.25, 462.5, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLF-7832', 4, 1),
(104, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-01-31', '2014-02-08', '11:51', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1.5, 599.3188, 1147.5, 1275, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLF-7832', 4, 1),
(105, 'ZQ2010137', 'LANKA GEAR MP90', '2014-01-31', '2014-02-08', '11:51', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 425.6, 612, 680, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLF-7832', 4, 1),
(106, 'ZQ2010123P', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-01-31', '2014-02-08', '11:51', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 2.8, 362.8095, 1486.8, 1652, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLF-7832', 4, 1),
(107, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-01-31', '2014-02-08', '11:51', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 0.4, 506.7285, 309.6, 344, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLF-7832', 4, 1),
(108, 'ZQ1020001', 'KEROSENE OIL', '2014-01-31', '2014-02-08', '11:51', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 109.5477, 110, 110, 58794, 30850, 'SIYAMBAL', 'X', 'B', 0, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLF-7832', 4, 1),
(109, 'ZQ3730004', 'SILASTIC GREY', '2014-01-31', '2014-02-08', '11:50', '831C9901', 'Cash Sales Retail - Colombo Service -                               VAT', 1, 364.7389, 403.65, 448.5, 58794, 30850, 'SIYAMBAL', 'X', 'B', 10, 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'Damitha Sandaruwan', 'RDD', 'WPLF-7832', 4, 1),
(110, 'TE282967106301', 'MOULD WINDSHIELD', '2014-02-07', '2014-02-07', '17:51', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 724.19, 1264.95, 1264.95, 1905, 18184, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(111, 'TE282967100101', 'WINDSHIELD GLASS', '2014-02-07', '2014-02-07', '16:47', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 6247.95, 15673.63, 15673.63, 1904, 18183, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(112, 'TE254718130106', 'OIL FILTER', '2014-02-07', '2014-02-07', '16:44', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 436.7626, 726.219, 806.91, 1390, 18182, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPQ-8321', 7, 1),
(113, 'TV9451037404', 'FUEL FILTER (MICO)', '2014-02-07', '2014-02-07', '16:44', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 338.835, 493.74, 548.6, 1390, 18182, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPQ-8321', 7, 1),
(114, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-07', '2014-02-07', '16:44', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 248.1969, 378.738, 420.82, 1390, 18182, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPQ-8321', 7, 1),
(115, 'TE253418130169', 'ASSY.  OIL  FILTER', '2014-02-13', '2014-02-13', '14:42', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 896.4433, 1762.389, 1958.21, 1415, 18179, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLH-2746', 7, 1),
(116, 'TE272425400140', '200 DIA. CLUTCH COVER ASSY.(TCIC)', '2014-02-07', '2014-02-08', '15:58', '000W2851', 'Tata Commercial Vehicles Warranty Claims-A/C -Jaffna Service------------>tranfer to 151T0202', 1, 3393.761, 4411.89, 5805.48, 3000109, 18152, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'WPPX-0489', 7, 1),
(117, 'TE272425200147', '200 DIA. ASSY. CLUTCH DISC-VALEO', '2014-02-07', '2014-02-08', '15:58', '000W2851', 'Tata Commercial Vehicles Warranty Claims-A/C -Jaffna Service------------>tranfer to 151T0202', 1, 4380.36, 5694.47, 7669.77, 3000109, 18152, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'WPPX-0489', 7, 1),
(118, 'TE272425400113', 'ASSY CLUTCH COVER 170DIA', '2014-02-07', '2014-02-07', '15:50', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2058.3694, 3259.701, 3621.89, 1389, 18177, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPP-5765', 7, 1),
(119, 'TE265981100167', 'RV MIRROR OUTER RH', '2014-02-07', '2014-02-07', '15:14', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 932.9005, 1444.086, 1604.54, 1388, 18175, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPS-4182', 7, 1),
(120, 'TE269846600112', 'ASSY CENTRE LINK', '2014-02-07', '2014-02-07', '14:42', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 5058.69, 6272.1689, 7556.83, 1903, 18174, 'VAVUNIYA', 'X', 'C', 17, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(121, 'TE270215409912', 'GLOW  PLUG', '2014-02-07', '2014-02-07', '13:59', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 2, 1418.964, 4832.688, 5087.04, 1902, 18172, 'VAVUNIYA', 'X', 'C', 5, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(122, 'TE257335307705', 'OIL SEAL', '2014-02-01', '2014-02-01', '09:22', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 427.62, 648.522, 720.58, 1359, 18084, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPND-6989', 7, 1),
(123, 'TE265454509913', 'LOW OIL PRE/SWITCH', '2014-02-08', '2014-02-08', '13:09', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 282.36, 490.64, 490.64, 1391, 18171, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(124, 'TE252750100249', 'RADIATOR RESERVE WATER TANK', '2014-02-03', '2014-02-03', '10:37', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 4853.26, 8646.48, 9607.2, 1361, 18081, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLI-3445', 7, 1),
(125, 'TE282942700106', 'PARKING BRAKE CABLE LH', '2014-02-11', '2014-02-11', '15:22', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 503.38, 779.688, 866.32, 1407, 18236, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPQ-3471', 7, 1),
(126, 'TE269872300103', 'ASSY OUTER HANDLE RH', '2014-02-11', '2014-02-11', '15:22', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 211.7017, 367.9635, 387.33, 1407, 18236, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPQ-3471', 7, 1),
(127, 'TE269872300102', 'ASSY OUTER HANDLE LH', '2014-02-11', '2014-02-11', '15:22', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 119.26, 223.33, 223.33, 1407, 18236, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPQ-3471', 7, 1),
(128, 'TE278607989915', 'DRAIN  VALVE', '2014-02-07', '2014-02-07', '11:24', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 270.661, 427.887, 475.43, 1387, 18166, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(129, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-07', '2014-02-07', '11:24', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 671.2381, 983.565, 1092.85, 1387, 18166, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(130, 'TE278803990113', 'PISTON RING SET', '2014-02-11', '2014-02-11', '12:26', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1949.7476, 3216.6525, 3385.95, 1406, 18232, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(131, 'TE279001103708', 'CYLINDER LINNER', '2014-02-11', '2014-02-11', '12:26', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 657.19, 2148.976, 2262.08, 1406, 18232, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(132, 'TE278803990110', 'PISTON SET W/O RINGS', '2014-02-11', '2014-02-11', '12:26', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 3512.52, 5877.2225, 6186.55, 1406, 18232, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(133, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-07', '2014-02-07', '09:48', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 503.363, 1444.878, 1605.42, 1385, 18160, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NWLG-7005', 7, 1),
(134, 'TE885433032829', 'REPAIR KIT KING PIN ACE STD. FULL', '2014-02-07', '2014-02-07', '09:55', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2676.775, 4136.328, 4595.92, 1386, 18159, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'WPLE-4811', 7, 1),
(135, 'TE282946600108', 'DRAG LINK', '2014-02-07', '2014-02-07', '09:55', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2042.4338, 3303.081, 3670.09, 1386, 18159, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'WPLE-4811', 7, 1),
(136, 'TE282933800113', ' TIE ROD END RH', '2014-02-10', '2014-02-10', '16:23', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 696.3033, 1177.05, 1239, 1402, 18158, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPS-2635', 7, 1),
(137, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-01-30', '2014-02-06', '12:52', '851C9900', 'Parts Cash Sales Retail --Jaffna Service', 1, 264.46, 458.4, 458.4, 145, 17983, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'WPLE-0485', 7, 1),
(138, 'TE279005110103', '1364 / ASSY,IDLER', '2014-02-06', '2014-02-06', '16:14', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', -1, 1156.9157, -1727.496, -1919.44, 4000065, 18098, 'JAFFNA', 'X', 'A', 10, 'Kalpani Alwis', 'ERA', 'Kalpani Alwis', 'ERA', 'Kalpani Alwis', 'ERA', 'NPLG-7514', 7, 1),
(139, 'TE885441011210', '1365 / CROSS KIT WITH CIR CLIP', '2014-02-06', '2014-02-06', '16:02', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', -1, 1270.35, -2505.195, -2783.55, 4000064, 18100, 'JAFFNA', 'X', 'A', 10, 'Kalpani Alwis', 'ERA', 'Kalpani Alwis', 'ERA', 'Kalpani Alwis', 'ERA', 'NPLI-2116', 7, 1),
(140, 'TE253418130165', 'ASSY OIL FILTER', '2014-02-05', '2014-02-05', '14:58', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 933.98, 1431.099, 1590.11, 1372, 18066, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-7659', 7, 1),
(141, 'TE281830100101', 'ASSY. ACCELERATOR CABLE', '2014-02-06', '2014-02-06', '15:24', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1003.91, 1606.194, 1784.66, 1384, 18150, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPW-3143', 7, 1),
(142, 'TE269841100101', 'U J CROSS ASSY', '2014-02-06', '2014-02-06', '15:19', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1441.72, 2537.001, 2818.89, 1383, 18149, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLG-7602', 7, 1),
(143, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-06', '2014-02-06', '13:53', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 671.2381, 1092.85, 1092.85, 1382, 18145, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(144, 'TE278609119904', 'FUEL FILTER', '2014-02-06', '2014-02-06', '13:53', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 458.7644, 741.45, 741.45, 1382, 18145, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(145, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-11', '2014-02-11', '11:16', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 503.363, 1605.42, 1605.42, 1404, 18229, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPU-6204', 7, 1),
(146, 'TE279018130106', 'DIESELOIL FILTER', '2014-02-11', '2014-02-11', '11:16', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 499.3546, 908.23, 908.23, 1404, 18229, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPU-6204', 7, 1),
(147, 'TE272425400113', 'ASSY CLUTCH COVER 170DIA', '2014-02-11', '2014-02-11', '11:21', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2058.3694, 3440.7955, 3621.89, 1405, 18228, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPP-8506', 7, 1),
(148, 'TE272425200113', 'CLUTCH DISC 170 mm DIA', '2014-02-11', '2014-02-11', '11:21', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2737.9863, 4408.152, 4640.16, 1405, 18228, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPP-8506', 7, 1),
(149, 'VE270215209920', 'H;T;CABLT NO,04 MPFI', '2014-02-11', '2014-02-11', '10:14', '851C9900', 'Parts Cash Sales Retail --Jaffna Service', 1, 446.98, 737.51, 737.51, 148, 18224, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPKU-8785', 7, 1),
(150, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-06', '2014-02-06', '10:53', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 395.3072, 566.208, 629.12, 1381, 18142, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPU-9840', 7, 1),
(151, 'VE283447609903', 'FUEL FILTER', '2014-02-06', '2014-02-06', '10:48', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 164.4065, 273.47, 273.47, 1380, 18141, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPKU-8785', 7, 1),
(152, 'TE278620999959', 'WATER PUMP', '2014-02-10', '2014-02-10', '09:58', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 4426.9872, 6274.6174, 7559.78, 1395, 18140, 'JAFFNA', 'X', 'A', 17, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPND-8083', 7, 1),
(153, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-06', '2014-02-06', '09:22', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 671.2381, 1092.85, 1092.85, 1379, 18139, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLK-3328', 7, 1),
(154, 'TE278609119904', 'FUEL FILTER', '2014-02-06', '2014-02-06', '09:22', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 458.7644, 741.45, 741.45, 1379, 18139, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLK-3328', 7, 1),
(155, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-06', '2014-02-06', '09:22', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 530.8002, 850.28, 850.28, 1379, 18139, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLK-3328', 7, 1),
(156, 'TE269872300103', 'ASSY OUTER HANDLE RH', '2014-02-06', '2014-02-06', '08:47', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 211.7017, 321.4839, 387.33, 1378, 18113, 'JAFFNA', 'X', 'A', 17, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1);
INSERT INTO `tbl_all_sales` (`all_sales_id`, `part_no`, `description`, `date_decar`, `date_edit`, `time`, `acc_no`, `customer_name`, `qty`, `cost_price`, `selling_val`, `retail_val`, `invoice`, `wip`, `location`, `in_s`, `de`, `disc`, `s_e_name`, `s_e_code`, `authorised_by`, `authorised_by_code`, `creating_op`, `creating_op_code`, `vehicle_reg_no`, `area_id`, `status`) VALUES
(157, 'TE286409135820', 'RUBBER HOSE (INTERMEDIATE PIPE TO TC)', '2014-02-06', '2014-02-06', '08:47', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 709.35, 1013.3221, 1220.87, 1378, 18113, 'JAFFNA', 'X', 'A', 17, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(158, 'VE270215209919', 'H;T;CABLE NO,3 MPFI', '2014-02-11', '2014-02-11', '10:14', '851C9900', 'Parts Cash Sales Retail --Jaffna Service', 1, 58.55, 725.78, 725.78, 148, 18224, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPKU-8785', 7, 1),
(159, 'TE285035303101', 'PINION INNER BRG CONE & CUP', '2014-02-06', '2014-02-06', '08:47', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 887.83, 1235.0566, 1488.02, 1378, 18113, 'JAFFNA', 'X', 'A', 17, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(160, 'TE278603999977', 'SET PISTON RINGS STD', '2014-02-05', '2014-02-05', '18:35', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 6282.41, 10978.64, 10978.64, 1377, 18137, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPND-8083', 7, 1),
(161, 'TE278601999931', 'GASKET CYL. HEAD', '2014-02-05', '2014-02-05', '18:35', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 4002.19, 6124.383, 6804.87, 1377, 18137, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPND-8083', 7, 1),
(162, 'TE266835607701', 'OIL SEAL RR INNER', '2014-02-12', '2014-02-12', '09:48', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 2, 309.6003, 989.767, 1041.86, 1915, 18223, 'VAVUNIYA', 'X', 'C', 5, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPPR-5656', 7, 1),
(163, 'TE266835607702', 'OIL SEAL RR OUTER', '2014-02-12', '2014-02-12', '09:48', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 2, 226.0939, 736.478, 775.24, 1915, 18223, 'VAVUNIYA', 'X', 'C', 5, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPPR-5656', 7, 1),
(164, 'TE257672502303', 'GLASS PANE REG WINDOW', '2014-02-05', '2014-02-05', '17:34', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 952.24, 1735.9, 1735.9, 1376, 18134, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLK-8372', 7, 1),
(165, 'VE283447609903', 'FUEL FILTER', '2014-02-05', '2014-02-05', '16:51', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 164.4065, 273.47, 273.47, 1375, 18133, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPKT-9304', 7, 1),
(166, 'TE552388500101', 'ASSY FRONT BUMPER', '2014-02-05', '2014-02-05', '16:23', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 3539.88, 6216.8285, 6544.03, 1374, 18129, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(167, 'TE279018130106', 'DIESELOIL FILTER', '2014-02-05', '2014-02-05', '15:58', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 499.3546, 862.8185, 908.23, 1373, 18127, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPS-5282', 7, 1),
(168, 'TE265488500149', 'FRONT BUMPER ASSY	', '2014-02-10', '2014-02-10', '09:04', '751C9901', 'Cash Sales Retail --Jaffna Spare Parts                                       VAT', 1, 12115.41, 21196.1815, 22311.77, 1393, 18126, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPP-0985', 7, 1),
(169, 'TE885454000017', 'HALO.HEAD LAMP  RH RHD 12V  W/O BULB', '2014-02-05', '2014-02-05', '14:40', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 2376.19, 4095.93, 4095.93, 1901, 18124, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPLK-9171', 7, 1),
(170, 'TE270215409912', 'GLOW  PLUG', '2014-02-05', '2014-02-05', '12:48', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1418.964, 2340.0384, 2543.52, 1371, 18121, 'JAFFNA', 'X', 'A', 8, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLG-7224', 7, 1),
(171, 'TE272425600110', 'ASLY CLUTCH RELEASE BRG', '2014-02-05', '2014-02-05', '12:45', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2075.3369, 3611.7, 4013, 1370, 18120, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLH-3099', 7, 1),
(172, 'TE272425200110', 'CLUTCH DISC 228 mm DIA', '2014-02-05', '2014-02-05', '12:45', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 3272.6882, 4905.765, 5450.85, 1370, 18120, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLH-3099', 7, 1),
(173, 'TE270215409912', 'GLOW  PLUG', '2014-02-05', '2014-02-05', '11:59', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 2, 1418.964, 5087.04, 5087.04, 1900, 18117, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPPS-9118', 7, 1),
(174, 'VEG287132100124', 'BALL JOINTS', '2014-02-06', '2014-02-06', '08:47', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1066.6, 1396.9481, 1683.07, 1378, 18113, 'JAFFNA', 'X', 'A', 17, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(175, 'TE265472706310', 'PAD DOOR CLIP', '2014-02-06', '2014-02-06', '08:47', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 23.86, 25.81, 25.81, 1378, 18113, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(176, 'VE283472300143A6', 'ASSY OUTER HANDLE  LH', '2014-02-06', '2014-02-06', '08:47', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 139.25, 206.784, 229.76, 1378, 18113, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(177, 'VE570518130102', 'OIL FILTER', '2014-02-05', '2014-02-05', '10:13', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 272.0683, 775.6018, 934.46, 1368, 18112, 'JAFFNA', 'X', 'A', 17, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(178, 'TE282954200106', 'TANK UNIT [30 LTRS]', '2014-02-03', '2014-02-03', '17:04', '851C9900', 'Parts Cash Sales Retail --Jaffna Service', 1, 959.51, 1677.6, 1677.6, 144, 18104, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPQ-6161', 7, 1),
(179, 'TE264330100121', 'ASSY PULL CABLE ACCELERATER', '2014-02-03', '2014-02-03', '16:24', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 721.52, 1063.2217, 1280.99, 1367, 18103, 'JAFFNA', 'X', 'A', 17, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(180, 'TE278824200105', 'ASSY,ENG,MOUNT REAR', '2014-02-05', '2014-02-05', '10:40', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 1792.69, 5533.938, 6148.82, 1369, 18102, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPQ-3471', 7, 1),
(181, 'TE282967100101', 'WINDSHIELD GLASS', '2014-02-03', '2014-02-03', '16:07', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 6247.95, 14106.267, 15673.63, 1366, 18101, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(182, 'TE885441011210', 'CROSS KIT WITH CIR CLIP', '2014-02-03', '2014-02-03', '14:41', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1270.35, 2505.195, 2783.55, 1365, 18100, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLI-2116', 7, 1),
(183, 'TE279005110103', 'ASSY,IDLER', '2014-02-03', '2014-02-03', '14:16', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1156.9157, 1727.496, 1919.44, 1364, 18098, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLG-7514', 7, 1),
(184, 'TE552354409903', 'RELFEX REFLECTOR LH', '2014-02-10', '2014-02-10', '15:56', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 105.34, 183.4, 183.4, 1400, 18217, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(185, 'TE265446600115', 'TIE ROD ASSEMBLY (DI)', '2014-02-10', '2014-02-10', '16:11', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 1980.51, 6125.448772, 6647.98, 1401, 18216, 'JAFFNA', 'X', 'A', 8, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLH-3921', 7, 1),
(186, 'TE265932100114', 'BALL JOINT ASSY.-UPPER W/B', '2014-02-10', '2014-02-10', '16:11', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 1263.06, 4082.0628, 4342.62, 1401, 18216, 'JAFFNA', 'X', 'A', 6, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLH-3921', 7, 1),
(187, 'TE265433200126', 'ASSY  BALL  JOINT', '2014-02-10', '2014-02-10', '16:11', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 1427.0733, 4965.534, 5517.26, 1401, 18216, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLH-3921', 7, 1),
(188, 'TE274767102301', 'W/S GLASS LAMIN LPT709 EX,2515EX', '2014-02-10', '2014-02-10', '15:48', '751C9901', 'Cash Sales Retail --Jaffna Spare Parts                                       VAT', 1, 12254.7633, 22077.9, 22077.9, 1399, 18213, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLI-2226', 7, 1),
(189, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-10', '2014-02-10', '14:39', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 264.46, 435.48, 458.4, 1913, 18212, 'VAVUNIYA', 'X', 'C', 5, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPPP-6303', 7, 1),
(190, 'TE254705116301', 'TIMING BELT', '2014-02-10', '2014-02-10', '14:39', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 2223.2534, 3673.0895, 3866.41, 1913, 18212, 'VAVUNIYA', 'X', 'C', 5, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPPP-6303', 7, 1),
(191, 'TE281881100119', 'ORVM ASSEMBLY TIP TAP TYPE-LH-RH', '2014-02-10', '2014-02-10', '14:15', '751C9901', 'Cash Sales Retail --Jaffna Spare Parts                                       VAT', 1, 7827.7284, 13040.586, 14489.54, 1398, 18210, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-4696', 7, 1),
(192, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-10', '2014-02-10', '13:47', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 60.27, 193.194, 214.66, 1397, 18209, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPU-9840', 7, 1),
(193, 'VE270215209918', 'H;T;CABLE NO,2 MPFI', '2014-02-10', '2014-02-10', '12:42', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 570.9, 847.782, 941.98, 1396, 18208, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPKT-9304', 7, 1),
(194, 'TE264154400159', 'HEAD LAMP WITH LEVEL CONTROL LH', '2014-02-10', '2014-02-10', '11:50', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 4991.26, 8381.76, 8381.76, 1912, 18202, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPLH-0375', 7, 1),
(195, 'TE264154400158', 'HEAD LAMP WITH LEVEL CONTROL RH', '2014-02-10', '2014-02-10', '11:50', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 4588.82, 8006.63, 8006.63, 1912, 18202, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPLH-0375', 7, 1),
(196, 'TE254705116301', 'TIMING BELT', '2014-02-03', '2014-02-03', '13:48', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2223.2534, 3479.769, 3866.41, 1363, 18096, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLG-7514', 7, 1),
(197, 'TE279020100101', 'WATER PUMP', '2014-02-03', '2014-02-03', '13:48', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1918.3156, 3153.807, 3504.23, 1363, 18096, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLG-7514', 7, 1),
(198, 'TE270215409912', 'GLOW  PLUG', '2014-02-03', '2014-02-03', '11:45', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 2, 1418.964, 4832.688, 5087.04, 1899, 18095, 'VAVUNIYA', 'X', 'C', 5, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPPS-3159', 7, 1),
(199, 'TE265381106308', 'FENDER EXTENSION FRONT RH', '2014-02-03', '2014-02-03', '10:53', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 930.4, 1494.0581, 1800.07, 1362, 18093, 'JAFFNA', 'X', 'A', 17, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(200, 'TE281854509911', 'POWER_WINDOW_SWITCH', '2014-02-03', '2014-02-03', '10:45', '851C9900', 'Parts Cash Sales Retail --Jaffna Service', 1, 1292.46, 2209.88, 2209.88, 143, 18092, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPS-3593', 7, 1),
(201, 'TE282933208611', 'SHIM 0.1 THICK(KING PIN)', '2014-02-10', '2014-02-10', '09:58', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 10, 5.63, 109.726, 132.2, 1395, 18140, 'JAFFNA', 'X', 'A', 17, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPND-8083', 7, 1),
(202, 'TE278609999920', 'STRAINER FUEL', '2014-02-01', '2014-02-01', '11:53', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 256.2026, 370.962, 412.18, 1360, 18091, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLI-5766', 7, 1),
(203, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-01', '2014-02-01', '11:53', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 671.2381, 983.565, 1092.85, 1360, 18091, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLI-5766', 7, 1),
(204, 'TE268426807712', 'RUBBER  BELLOW -  G/S LEVER', '2014-02-10', '2014-02-10', '09:48', '751C9901', 'Cash Sales Retail --Jaffna Spare Parts                                       VAT', 1, 191.4, 301.374, 334.86, 1394, 18197, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(205, 'TE269830100128', 'ACCELARATOR CABLE', '2014-02-09', '2014-02-09', '09:38', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 510.422, 847.05, 847.05, 1910, 18196, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPPR-5656', 7, 1),
(206, 'TE263241120110', 'ASSY PROP SHAFT REAR COMP', '2014-02-09', '2014-02-09', '11:17', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 26222.86, 45341.4264, 48235.56, 1911, 18195, 'VAVUNIYA', 'X', 'C', 6, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'CPLH-3634', 7, 1),
(207, 'TE552355106309', 'SIDE STICKER LH ORANGE', '2014-02-08', '2014-02-08', '16:53', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 1039.78, 1808.23, 1808.23, 1909, 18116, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(208, 'TE278609119904', 'FUEL FILTER', '2014-02-01', '2014-02-01', '11:53', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 458.7644, 667.305, 741.45, 1360, 18091, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLI-5766', 7, 1),
(209, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-01', '2014-02-01', '11:53', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 530.8002, 765.252, 850.28, 1360, 18091, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLI-5766', 7, 1),
(210, 'TE282972300119', 'ASSY DOOR LATCH LH', '2014-02-08', '2014-02-08', '16:53', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 774.73, 1355.51, 1355.51, 1909, 18116, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(211, 'TE282972500105', 'ASSY,WIND/REG LH', '2014-02-08', '2014-02-08', '16:53', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 893.04, 1557.28, 1557.28, 1909, 18116, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(212, 'TE282972000109', 'DOOR SHELL LH', '2014-02-08', '2014-02-08', '16:53', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 12031.0604, 23962.77, 23962.77, 1909, 18116, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(213, 'ZQS8902610', 'WINDSCREEN ADHESIVE (TROPICS)', '2014-02-08', '2014-02-08', '16:53', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 1995.2545, 2147.32, 2147.32, 1909, 18116, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(214, 'TE282967106301', 'MOULD WINDSHIELD', '2014-02-08', '2014-02-08', '16:53', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 724.19, 1264.95, 1264.95, 1909, 18116, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(215, 'TE282967100101', 'WINDSHIELD GLASS', '2014-02-08', '2014-02-08', '16:53', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 6247.95, 15673.63, 15673.63, 1909, 18116, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(216, 'TE279001155308', 'GASKET CYL HEAD COVER', '2014-02-08', '2014-02-08', '15:41', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 349.69, 585.7225, 616.55, 1908, 18194, 'VAVUNIYA', 'X', 'C', 5, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPPR-6439', 7, 1),
(217, 'TE279001155327', 'MLS GASKET (FOR CYL.HEAD)1.5 THK', '2014-02-08', '2014-02-08', '15:41', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 4840.97, 7503.0905, 7897.99, 1908, 18194, 'VAVUNIYA', 'X', 'C', 5, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPPR-6439', 7, 1),
(218, 'TE265432130165', 'ASSY LOWER WISHBONE CON', '2014-02-10', '2014-02-10', '09:04', '751C9901', 'Cash Sales Retail --Jaffna Spare Parts                                       VAT', 1, 6560.375, 11234.2028, 12211.09, 1393, 18126, 'JAFFNA', 'X', 'A', 8, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPP-0985', 7, 1),
(219, 'TE278607999984', 'CAP  FILLER', '2014-02-10', '2014-02-10', '08:56', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 151.57, 336.618, 374.02, 1392, 18191, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLH-0336', 7, 1),
(220, 'TE265472200114', 'GUIDE CHANNEL LH DR GLASS', '2014-02-10', '2014-02-10', '09:04', '751C9901', 'Cash Sales Retail --Jaffna Spare Parts                                       VAT', 1, 218.41, 401.76, 401.76, 1393, 18126, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPP-0985', 7, 1),
(221, 'TE270215409912', 'GLOW  PLUG', '2014-02-08', '2014-02-08', '11:58', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 1418.964, 2543.52, 2543.52, 1907, 18188, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NCLG-8649', 7, 1),
(222, 'TE274788500104', 'ASSY FRONT  BUMPER', '2014-02-08', '2014-02-08', '11:40', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 7047.93, 12023.649, 13359.61, 1906, 18187, 'VAVUNIYA', 'X', 'C', 10, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPLH-0375', 7, 1),
(223, 'TE885433032829', 'REPAIR KIT KING PIN ACE STD. FULL', '2014-02-10', '2014-02-10', '18:03', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2676.775, 4136.328, 4595.92, 1403, 18185, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPS-2759', 7, 1),
(224, 'TE282981100116', 'REAR VIEW MIRROR LH', '2014-02-17', '2014-02-17', '15:25', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 827.4372, 1432.72, 1432.72, 1921, 18297, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(225, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-17', '2014-02-17', '14:47', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 503.363, 1525.149, 1605.42, 1433, 18295, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPS-1821', 7, 1),
(226, 'TE278801155303', 'GASKET CYL HEAD(1.8 THK)', '2014-02-17', '2014-02-17', '14:18', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1446.5428, 2375.1615, 2500.17, 1432, 18293, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NWPP-4189', 7, 1),
(227, 'TE272425200113', 'CLUTCH DISC 170 mm DIA', '2014-02-17', '2014-02-17', '13:20', '851C9900', 'Parts Cash Sales Retail --Jaffna Service', 1, 2737.9863, 4640.16, 4640.16, 150, 18288, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-4760', 7, 1),
(228, 'TE272425400113', 'ASSY CLUTCH COVER 170DIA', '2014-02-17', '2014-02-17', '13:20', '851C9900', 'Parts Cash Sales Retail --Jaffna Service', 1, 2145.6999, 3621.89, 3621.89, 150, 18288, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-4760', 7, 1),
(229, 'TE282932403401', 'SPRING BUSH', '2014-02-17', '2014-02-17', '16:02', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 6, 341.5565, 3243.828, 3525.9, 1434, 18291, 'JAFFNA', 'X', 'A', 8, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPV-4940', 7, 1),
(230, 'TE268426807712', 'RUBBER  BELLOW -  G/S LEVER', '2014-02-11', '2014-02-11', '16:29', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 191.4, 334.86, 334.86, 1914, 18239, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPPR-5656', 7, 1),
(231, 'TE28188810Z107', 'ASSY SIDE BONNET LH -1 TONNER', '2014-02-17', '2014-02-17', '12:41', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1155.37, 2045.0943, 2141.46, 1431, 18290, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-4246', 7, 1),
(232, 'TE282941100118', 'U,J,CROSS KIT', '2014-02-17', '2014-02-17', '12:16', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1195.6407, 1835.2252, 1994.81, 1430, 18289, 'JAFFNA', 'X', 'A', 8, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPU-9840', 7, 1),
(233, 'TE263254209903', 'TEMP. TRANSDUCER', '2014-02-17', '2014-02-17', '11:17', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 345.966, 571.63, 571.63, 1429, 18287, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLJ-5904', 7, 1),
(234, 'VE580725000102', 'ASSY 160 DIA CLUTCH DISC & PRPLATE', '2014-02-17', '2014-02-17', '11:10', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 6029.52, 6029.52, 6029.52, 1428, 18286, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPKU-8990', 7, 1),
(235, 'TE279014115314', 'GASKET (FOR FLANGE ON EXH.MANIFOLD', '2014-02-12', '2014-02-12', '10:17', '000W2851', 'Tata Commercial Vehicles Warranty Claims-A/C -Jaffna Service------------>tranfer to 151T0202', 1, 23.99, 31.19, 54.79, 3000110, 18241, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-4142', 7, 1),
(236, 'TE279014115803', 'HOSE(310)(T-CONNECTOR TO SOLENOID VALVE)', '2014-02-12', '2014-02-12', '10:17', '000W2851', 'Tata Commercial Vehicles Warranty Claims-A/C -Jaffna Service------------>tranfer to 151T0202', 1, 35.5775, 37.23, 49.13, 3000110, 18241, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-4142', 7, 1),
(237, 'TE279014117101', 'FLANGE (FOR EXHAUST MANIFOLD)', '2014-02-12', '2014-02-12', '10:17', '000W2851', 'Tata Commercial Vehicles Warranty Claims-A/C -Jaffna Service------------>tranfer to 151T0202', 1, 117.93, 153.31, 203.33, 3000110, 18241, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-4142', 7, 1),
(238, 'TE281829100145', 'ASSY. CLUTCH CABLE', '2014-02-12', '2014-02-12', '10:17', '000W2851', 'Tata Commercial Vehicles Warranty Claims-A/C -Jaffna Service------------>tranfer to 151T0202', 1, 1034.4643, 1254.53, 1821.26, 3000110, 18241, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-4142', 7, 1),
(239, 'TE281854209931', 'TEMP SESNSOR ED SUPERACE-VENTURE', '2014-02-12', '2014-02-12', '10:17', '000W2851', 'Tata Commercial Vehicles Warranty Claims-A/C -Jaffna Service------------>tranfer to 151T0202', 1, 629.7514, 818.68, 1099.1, 3000110, 18241, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-4142', 7, 1),
(240, 'TE286409130131', 'ASSY. AIR INTAKE PIPE (WITH CLAMP)', '2014-02-12', '2014-02-12', '10:17', '000W2851', 'Tata Commercial Vehicles Warranty Claims-A/C -Jaffna Service------------>tranfer to 151T0202', 1, 595.5098, 740.23, 933.56, 3000110, 18241, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-4142', 7, 1),
(241, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-15', '2014-02-15', '11:00', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 530.8002, 765.252, 850.28, 1424, 18282, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLI-5849', 7, 1),
(242, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-12', '2014-02-12', '13:11', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 626.1022, 1016.109, 1129.01, 1408, 18245, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPU-9840', 7, 1),
(243, 'TE279001107802', 'CRANK OIL SEAL RR', '2014-02-12', '2014-02-12', '13:29', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 786.1954, 1246.7515, 1312.37, 1409, 18246, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(244, 'TE279005110101', 'BELT TENSIONER', '2014-02-12', '2014-02-12', '13:29', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2182.301, 3448.683, 3831.87, 1409, 18246, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(245, 'TE279001107801', 'CR SHAFT OIL SEAL FR', '2014-02-12', '2014-02-12', '13:29', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 285.3527, 469.3285, 494.03, 1409, 18246, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(246, 'TE254705116301', 'TIMING BELT', '2014-02-12', '2014-02-12', '13:29', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2223.2534, 3557.0972, 3866.41, 1409, 18246, 'JAFFNA', 'X', 'A', 8, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(247, 'TE254701157814', 'OIL SEAL-CAM SHAFT', '2014-02-12', '2014-02-12', '13:29', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 260.35, 399.779, 420.82, 1409, 18246, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(248, 'TE279015146310', 'POLY BELT 720 LG', '2014-02-12', '2014-02-12', '13:29', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 443.7654, 764.2845, 804.51, 1409, 18246, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(249, 'TE279005110103', 'ASSY,IDLER', '2014-02-12', '2014-02-12', '13:29', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1156.9157, 1823.468, 1919.44, 1409, 18246, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(250, 'TE278801135301', 'SUMP GASKET', '2014-02-12', '2014-02-12', '13:29', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 223.6927, 367.707, 387.06, 1409, 18246, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(251, 'TE278801155303', 'GASKET CYL HEAD(1.8 THK)', '2014-02-12', '2014-02-12', '13:29', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1446.6235, 2375.1615, 2500.17, 1409, 18246, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(252, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-12', '2014-02-12', '13:29', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 264.46, 435.48, 458.4, 1409, 18246, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(253, 'TE279005107810', 'CAM SHAFT OIL SEAL', '2014-02-12', '2014-02-12', '13:29', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 52.1525, 116.964, 123.12, 1409, 18246, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(254, 'TE279018130106', 'DIESELOIL FILTER', '2014-02-17', '2014-02-17', '10:26', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 499.3546, 862.8185, 908.23, 1427, 18247, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPW-2144', 7, 1),
(255, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-17', '2014-02-17', '10:26', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 503.363, 1525.149, 1605.42, 1427, 18247, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPW-2144', 7, 1),
(256, 'TE281849200147', 'ASSY.FRONT PIPE WITH FLEXIBLE BELLOW', '2014-02-12', '2014-02-12', '14:01', '000W2851', 'Tata Commercial Vehicles Warranty Claims-A/C -Jaffna Service------------>tranfer to 151T0202', 1, 4829.73, 6278.65, 8846.55, 3000110, 18241, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-4142', 7, 1),
(257, 'TE281854200106', 'INSTRUMENT CLUSTER', '2014-02-12', '2014-02-12', '14:07', '000W2851', 'Tata Commercial Vehicles Warranty Claims-A/C -Jaffna Service------------>tranfer to 151T0202', 1, 6535.12, 8495.66, 12569.09, 3000111, 18248, 'JAFFNA', 'X', 'B', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPW-2144', 7, 1),
(258, 'TE274767102301', 'W/S GLASS LAMIN LPT709 EX,2515EX', '2014-02-15', '2014-02-15', '14:38', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 12254.7633, 22077.9, 22077.9, 1920, 18164, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(259, 'TE274781906305', 'CENTRE GRILL FRONT', '2014-02-15', '2014-02-15', '14:38', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 6203.775, 11338.95, 11338.95, 1920, 18164, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(260, 'TE281833407801', 'OIL SEAL', '2014-02-15', '2014-02-15', '12:11', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 176.01, 240.75, 240.75, 1426, 18281, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-0421', 7, 1),
(261, 'TE265433403102', 'HUB BEARING FRONT OUTER', '2014-02-15', '2014-02-15', '12:11', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 549.05, 977.4, 977.4, 1426, 18281, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-0421', 7, 1),
(262, 'TE265433403101', 'HUB BEARING FRONT INNER', '2014-02-15', '2014-02-15', '12:11', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 752.8775, 1384.8, 1384.8, 1426, 18281, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPT-0421', 7, 1),
(263, 'TE264167106305', 'R/MOULD W/SCREEN', '2014-02-15', '2014-02-15', '14:38', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 1910.17, 3337.26, 3337.26, 1920, 18164, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(264, 'TE265454410104', 'LAMP REGISTRATION PLATE', '2014-02-12', '2014-02-12', '16:41', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 697.92, 1114.146, 1237.94, 1410, 18251, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPS-4172', 7, 1),
(265, 'TE282932300128', 'ASSY FRONT SHOCK ABSORBER', '2014-02-13', '2014-02-13', '08:48', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 1701.085, 5147.271, 5418.18, 1411, 18253, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'WPLE-4811', 7, 1),
(266, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-13', '2014-02-13', '09:21', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 10, 673.1634, 9070.655, 10928.5, 1916, 18255, 'VAVUNIYA', 'X', 'C', 17, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(267, 'TE278603999977', 'SET PISTON RINGS STD', '2014-02-15', '2014-02-15', '11:19', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 6305.615, 9112.2712, 10978.64, 1425, 18278, 'JAFFNA', 'X', 'A', 17, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(268, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-13', '2014-02-13', '12:05', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 396.7064, 566.208, 629.12, 1412, 18259, 'JAFFNA', 'X', 'A', 10, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(269, 'TE282929100130', 'ASSY.  CLUTCH  CABLE', '2014-02-13', '2014-02-13', '12:44', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 518.2854, 915.88, 915.88, 1917, 18262, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NCPP-8519', 7, 1),
(270, 'TE279020100101', 'WATER PUMP', '2014-02-13', '2014-02-13', '13:36', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2002.43, 3223.8916, 3504.23, 1413, 18263, 'JAFFNA', 'X', 'A', 8, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-2565', 7, 1),
(271, 'TE253415406302', 'POLY V BELT(6PK)1173 LG', '2014-02-13', '2014-02-13', '14:21', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 856, 2940.573, 3095.34, 1414, 18264, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPJL-4546', 7, 1),
(272, 'TE282932300128', 'ASSY FRONT SHOCK ABSORBER', '2014-02-13', '2014-02-13', '14:56', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 2, 1701.085, 5418.18, 5418.18, 1416, 18266, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPS-2765', 7, 1),
(273, 'TE267872300114', 'REG HANDLE', '2014-02-13', '2014-02-13', '15:03', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 88.71, 170.45, 170.45, 1417, 18268, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPR-0785', 7, 1),
(274, 'TE265442103704', 'SUMO VENT DISC', '2014-02-13', '2014-02-13', '16:16', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2918.25, 4987.36, 4987.36, 1418, 18269, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPU-9449', 7, 1),
(275, 'TE265442100135', 'KIT BRAKE PAD', '2014-02-13', '2014-02-13', '16:16', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 3229.48, 5589.74, 5589.74, 1418, 18269, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPU-9449', 7, 1),
(276, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-13', '2014-02-13', '16:35', '752C9900', 'Cash Sales Retail --Vavunia Spare Parts', 1, 626.1022, 1072.5595, 1129.01, 1918, 18270, 'VAVUNIYA', 'X', 'C', 5, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'NPPX-0043', 7, 1),
(277, 'TE272425000134', 'CLUTCH DISE & COVER', '2014-02-13', '2014-02-13', '16:56', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 7914.12, 13011.561, 13696.38, 1419, 18271, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPS-3891', 7, 1),
(278, 'TE270225600101', ' OFFER DRG.-ASSY.CL.RELS.B', '2014-02-13', '2014-02-13', '16:56', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1260.68, 3188.371, 3356.18, 1419, 18271, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPS-3891', 7, 1),
(279, 'TE278801135301', 'SUMP GASKET', '2014-02-13', '2014-02-13', '17:07', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 223.6927, 367.707, 387.06, 1420, 18272, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPV-8743', 7, 1),
(280, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-13', '2014-02-13', '17:07', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 264.46, 435.48, 458.4, 1420, 18272, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPV-8743', 7, 1),
(281, 'TE278801155303', 'GASKET CYL HEAD(1.8 THK)', '2014-02-13', '2014-02-13', '17:07', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1446.6235, 2375.1615, 2500.17, 1420, 18272, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPV-8743', 7, 1),
(282, 'TE279001107801', 'CR SHAFT OIL SEAL FR', '2014-02-13', '2014-02-13', '17:07', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 285.3527, 469.3285, 494.03, 1420, 18272, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPV-8743', 7, 1),
(283, 'TE279005107810', 'CAM SHAFT OIL SEAL', '2014-02-13', '2014-02-13', '17:07', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 52.1525, 116.964, 123.12, 1420, 18272, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPV-8743', 7, 1),
(284, 'TE254705116301', 'TIMING BELT', '2014-02-13', '2014-02-13', '17:07', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2223.2534, 3673.0895, 3866.41, 1420, 18272, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPV-8743', 7, 1),
(285, 'TE279001107802', 'CRANK OIL SEAL RR', '2014-02-13', '2014-02-13', '17:07', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 786.1954, 1246.7515, 1312.37, 1420, 18272, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPV-8743', 7, 1),
(286, 'TE254701157814', 'OIL SEAL-CAM SHAFT', '2014-02-13', '2014-02-13', '17:07', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 260.35, 399.779, 420.82, 1420, 18272, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPV-8743', 7, 1),
(287, 'TE278803990113', 'PISTON RING SET', '2014-02-13', '2014-02-13', '17:07', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1949.7476, 3216.6525, 3385.95, 1420, 18272, 'VAVUNIYA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPV-8743', 7, 1),
(288, 'TE265442300117', 'R/KIT WHEEL CY. REAR', '2014-02-15', '2014-02-15', '11:19', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 155.04, 226.2663, 272.61, 1425, 18278, 'JAFFNA', 'X', 'A', 17, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', NULL, 7, 1),
(289, 'TE272425200113', 'CLUTCH DISC 170 mm DIA', '2014-02-13', '2014-02-13', '17:22', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2737.9863, 4408.152, 4640.16, 1421, 18274, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLG-5858', 7, 1),
(290, 'TE272425400113', 'ASSY CLUTCH COVER 170DIA', '2014-02-13', '2014-02-13', '17:22', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 2145.6999, 3440.7955, 3621.89, 1421, 18274, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLG-5858', 7, 1),
(291, 'TE272425600125', 'CLUTCH RELEASE BEARING', '2014-02-13', '2014-02-13', '17:22', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 1181.9454, 1889.4835, 1988.93, 1421, 18274, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPLG-5858', 7, 1),
(292, 'TE269533403101', 'HUB BEARING OUTER', '2014-02-13', '2014-02-13', '17:45', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 604.2441, 984.143, 1035.94, 1422, 18275, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPP-3770', 7, 1),
(293, 'TE282933403105', 'HUB BEARING INNER', '2014-02-13', '2014-02-13', '17:45', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 907.0841, 1544.72175, 1584.33, 1422, 18275, 'JAFFNA', 'X', 'A', 3, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPP-3770', 7, 1),
(294, 'TE265467102302', 'WINDSHIELD GLASS FRONT', '2014-02-15', '2014-02-15', '09:57', '752C9901', 'Cash Sales Retail --Vavunia Spare Parts               VAT', 1, 9656.36, 18670.56, 18670.56, 1919, 18277, 'VAVUNIYA', 'X', 'C', 0, 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', 'Ganamoothy Manoch', 'MAR', NULL, 7, 1),
(295, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-13', '2014-02-13', '17:45', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 57.97, 107.33, 107.33, 1422, 18275, 'JAFFNA', 'X', 'A', 0, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPP-3770', 7, 1),
(296, 'TE281854109901', 'EARTH STRAP', '2014-02-15', '2014-02-15', '09:19', '751C9900', 'Parts Cash Sales Retail --Jaffna Spare Parts', 1, 370.11, 620.996, 653.68, 1423, 18276, 'JAFFNA', 'X', 'A', 5, 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'Sekar Pirathap', 'PIR', 'NPPP-0296', 7, 1),
(297, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 4, 477.8813, 3440, 3440, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(298, 'ZQ5555555P', 'COTTON WASTE', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 50, 4.9061, 295.5, 295.5, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(299, 'TE265472300127', 'ASSY HANDLE (WINDOW REGULATOR', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 216.56, 742.24, 742.24, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Milan Gunawardana', 'MDG', 'Nilanka Heshan', 'LNH', 'Milan Gunawardana', 'MDG', NULL, 8, 1),
(300, 'TE257454209994', 'SPEEDOCABLE JIS 3600LG OF', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 1232.18, 4241.46, 4241.46, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(301, 'TE264040100101', 'WHEEL NUT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 162.4516, 4049.4, 4049.4, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(302, 'TE264154409905', 'ASSY; TAIL LAMP RH', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 1, 1855.14, 3235.02, 3235.02, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(303, 'TE269929100177', 'CLUTCH  M/C REPAIR KIT{MAJOR}', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 4, 623.2192, 4299.4, 4299.4, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(304, 'TE265429100157', 'SL CY REP KIT(MAJOR)', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 4, 585.2032, 4129.72, 4129.72, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(305, 'TE275429100106', 'CLUTCH SLAVE CYLINDER', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 1934.998, 6990.22, 6990.22, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(306, 'ZQ3730001', 'ARALDITE', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 1, 459.8506, 617.5, 617.5, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(307, 'ZQ9310112', 'GREASE NIPPLE UPPER', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 30, 20.1652, 786.3, 786.3, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(308, 'ZQS460-1824', 'WASHER', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 49.11, 957.6, 957.6, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(309, 'ZQ2775928', 'WASHER', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 20, 50, 1300, 1300, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(310, 'ZQ3730002', 'SUPER GLUE', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 5, 31.1074, 205.85, 205.85, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(311, 'ZQ80055', '12MM Y UNION', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 10, 546, 8190, 8190, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(312, 'ZQ80048', '12 MM STRAIGHT UNION', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 5, 338.3455, 2112.5, 2112.5, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1);
INSERT INTO `tbl_all_sales` (`all_sales_id`, `part_no`, `description`, `date_decar`, `date_edit`, `time`, `acc_no`, `customer_name`, `qty`, `cost_price`, `selling_val`, `retail_val`, `invoice`, `wip`, `location`, `in_s`, `de`, `disc`, `s_e_name`, `s_e_code`, `authorised_by`, `authorised_by_code`, `creating_op`, `creating_op_code`, `vehicle_reg_no`, `area_id`, `status`) VALUES
(313, 'ZQ80046', '6 MM STRAIGHT UNION', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 4, 225, 1170, 1170, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(314, 'ZQ80045', '8 MM STRAIGHT UNION', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 10, 393.4076, 4875, 4875, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(315, 'ZQ2010157', 'LANKA TRANSFLUID P157', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 8, 534.0373, 4893.84, 4893.84, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(316, 'ZQ2010146', 'CALTEX THUBAN EP SAE 85W-140', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 20, 529.8057, 13840, 13840, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(317, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 20, 596.769, 17000, 17000, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(318, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 100, 413.8866, 53330, 53330, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(319, 'TE257682400127', 'ASSY WIPER ARM', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 5, 564.0414, 5979.25, 5979.25, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(320, 'TE263254209903', 'TEMPERATURE TRANSDUCER', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 6, 350.5138, 3429.78, 3429.78, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(321, 'TE252709130330', 'ELEM AIR CLEANER (SAFETY)', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 881.0967, 4204.11, 4204.11, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(322, 'TE252709130329', 'ELEM. AIR CLEANER (PRIMARY)', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 2449.5933, 11958.84, 11958.84, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(323, 'ZQ9310108', 'BOLT SW 19', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 10, 49.8684, 617.5, 617.5, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(324, 'ZQ9310117', 'BOLT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 190, 3705, 3705, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(325, 'ZQ9310103', 'BOLT&NUT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 22.5398, 370.5, 370.5, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(326, 'ZQS892-00112', 'RADIATOR COOLENT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 616.184, 11752.2, 11752.2, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(327, 'ZQS502-181', 'CABLE TIE PLTONGUE BLACK7.8*360', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 35.7058, 696.45, 696.45, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(328, 'ZQS539-14060', 'HOSE CLAMP  40-60', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 6, 115.8596, 932.94, 932.94, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(329, 'ZQS539-1816', 'HOSE CLAMP 8-16', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 6, 84.72, 766.08, 766.08, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(330, 'ZQS539-180100', 'HOSE CLAMP 80-100', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 5, 146.943, 1073.65, 1073.65, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(331, 'ZQS539-15070', 'HOSE CLAMP 50-70', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 10, 118.755, 1567, 1567, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(332, 'ZQS539-13045', 'HOSE CLAMP 30-45', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 10, 112.9384, 1450.9, 1450.9, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(333, 'ZQS539-12540', 'HOSE CLAMP 25-40', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 10, 109.3931, 1334.8, 1334.8, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(334, 'ZQS539-12032', 'HOSE CLAMP 20-32', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 10, 104.8119, 1334.8, 1334.8, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(335, 'ZQ3730043', 'PLASTIC TAPE', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 12, 59.5852, 936, 936, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(336, 'TE257454410172', 'ASSY  TAIL  LAMP  LH  W / BULB', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 1457.56, 4844.34, 4844.34, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(337, 'DO2829', 'BULB', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 31, 45, 1813.5, 1813.5, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(338, 'DO7528', 'DOUBLE FILAMENT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 6, 35.0466, 273, 273, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(339, 'DO7511', 'SINGLE FILAMENT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 19, 35.0779, 864.5, 864.5, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(340, 'DO5008', 'SINGLE FILAMENT (SMALL)', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 10, 34.9657, 455, 455, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(341, 'TE250726700152', 'SUB ASSY BALL & SOCKET', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 6, 665.26, 7619.76, 7619.76, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(342, 'TE264126800224', 'ASSY BALL JOINT RH THREADS', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 12, 496.9658, 10767.12, 10767.12, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(343, 'TE266835607701', 'OIL SEAL RR INNER', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 311.8654, 7813.95, 7813.95, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(344, 'TE266835607703', 'OIL SEAL,DOUBLE LIP (120x145x15)OFFER', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 261.1668, 7606.05, 7606.05, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(345, 'TE266835607702', 'OIL SEAL RR OUTER', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 231.6707, 5814.3, 5814.3, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(346, 'TE257633407801', 'FRONT HUB OIL SEAL', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 181.4848, 4710.15, 4710.15, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(347, 'TE252509135810', 'RUBBER HOSE', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 3424.9075, 11800.22, 11800.22, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(348, 'TE263241300106', 'ASSY.CENTER BEARING BRACKET', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 3306.12, 11133.86, 11133.86, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(349, 'TE263241100118', 'ASSY.CENTRE BEARING (M/S RSB)', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 4629.56, 15930.92, 15930.92, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(350, 'TE257346200106', 'UNIVERSAL JOINT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 4, 1713.549, 12632.04, 12632.04, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(351, 'TE205054200103', 'TANK KIT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 474.3169, 2363.46, 2363.46, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(352, 'TE265172300105', 'HANDLE OUTER RH RHD', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 795.5655, 4020.12, 4020.12, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(353, 'TE257672300111', 'HANDLE OUTER L.H.', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 783.6225, 3977.76, 3977.76, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(354, 'TE267872300114', 'REG HANDLE', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 30, 93.1144, 5113.5, 5113.5, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(355, 'TE257672500124', 'WINDOW REGULATOR RH', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 698.6, 3875.28, 3875.28, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(356, 'TE257672500123', 'ASSY WINDOW REGULATOR L/H', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 697.356, 3723.27, 3723.27, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(357, 'TE264172500102', 'DOOR WINDOR REGULATOR RH', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 1, 1332.17, 2360.66, 2360.66, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(358, 'TE264172500101', 'ASY,WINDING REGULATOR L/H', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 1383.205, 4866.8, 4866.8, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(359, 'TE885454000017', 'HALO.HEAD LAMP  RH RHD 12V  W/O BULB', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 2366.0846, 8191.86, 8191.86, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(360, 'TE264154400159', 'HEAD LAMP WITH LEVEL CONTROL LH', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 4994.4597, 16763.52, 16763.52, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(361, 'TE264154400158', 'HEAD LAMP WITH LEVEL CONTROL RH', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 4557.72, 16013.26, 16013.26, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(362, 'TE278054209938', 'SPEED SENSOR 12V/24V (8 PULSES', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 8, 983.6098, 13789.6, 13789.6, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(363, 'TE264154200116', 'ASSY SPEEDOCABLE 3000 LG-OFFER P NO', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 794.9189, 4104.96, 4104.96, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(364, 'TE270254509950', 'REVERSE LIGHT SWITCH', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 8, 370.6639, 4994.48, 4994.48, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(365, 'TE278615996302', 'BELT V RIBBED  CUMMINS (3935335)', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 4, 1563.28, 10670.72, 10670.72, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(366, 'TE885409052516', 'SET OF 2516 AIR FILTER CARTRID', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 4851.6318, 23505.12, 23505.12, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(367, 'TE885409041613', 'SET OF 1613 AIR FILTER CARTRID', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 4229.0807, 20344.83, 20344.83, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(368, 'TE264182400142', 'KIT WIND MOTOR', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 1701.2438, 8603.22, 8603.22, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(369, 'TE263026700102', 'KNOB GEAR LEVER', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 5, 237.3411, 1980, 1980, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(370, 'TE264132300101', 'ASSY FR SHOCK ABSORBER', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 4, 2818.535, 19223.68, 19223.68, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(371, 'TE265146600102', 'CROSS', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 6, 1150.2011, 11041.68, 11041.68, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(372, 'TE252721990101', 'ASSEMBLY AIR FILTERS', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 4, 2780.4633, 19150.2, 19150.2, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(373, 'TE252750100249', 'RADIATOR RESERVE WATER TANK', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 5608.75, 19214.4, 19214.4, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(374, 'ZQ3730004', 'SILASTIC GREY', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 12, 369.0763, 6084, 6084, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(375, 'TE265133407804', 'OIL SEAL FRONT HUB', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 13, 178.4436, 3895.71, 3895.71, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(376, 'TE264140106703', 'HUB PIN REAR (S-CAM)	', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 133.44, 3254.55, 3254.55, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(377, 'TE264140106704', 'HUB PIN FRONT S-CAM', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 15, 115.1725, 2908.95, 2908.95, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(378, 'TE264182400109', 'ASSY WIPER  ARM (RHD)', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 5, 380.7063, 3389.5, 3389.5, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(379, 'TE264182409904', 'ASSY WIPER BLADE', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 5, 405.2871, 3688.85, 3688.85, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(380, 'ZQ2010164', 'BRAKE FLUID DOT4[P-164]', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 1352.4338, 5550, 5550, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(381, 'TE265129100148', 'REPAIR KIT MASTER CYL', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 5, 225.3162, 1940, 1940, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(382, 'TE265129100137', 'CLUTCH S/CEY KIT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 5, 425.8111, 3608.15, 3608.15, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(383, 'TE270530100112', 'ASSY. PULL CABLE ACCELERATOR', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 5, 716.577, 6379.4, 6379.4, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(384, 'TE264133200113', 'BALL JOINT - RIGHT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 3, 1455.6326, 7442.07, 7442.07, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(385, 'TE264133200112', 'BALL JOINT - LEFT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 4, 1464.6233, 9915.12, 9915.12, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(386, 'TE264146600165', 'ASSY. DRAG LINK (GREASELESS-M/S RANE)RHD', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 1, 3921.2037, 6933.37, 6933.37, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(387, 'TE264033200122', 'ASSY TIE ROD END {R/H}', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 5, 1190.0855, 10328.9, 10328.9, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(388, 'TF12052396016', 'HEX NUT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 35, 23.488, 1338.4, 1338.4, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(389, 'TE257641113201', 'BOLT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 40, 23.3919, 2151.2, 2151.2, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(390, 'TE885441011210', 'CROSS KIT WITH CIR CLIP', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 4, 1292.7219, 11134.2, 11134.2, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(391, 'TE270541120104', 'U J  CROSS KIT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 4, 2736.1491, 18191.24, 18191.24, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(392, 'TE252701130141', 'OIL SUMP GASKET KIT', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 2, 530.94, 1682.58, 1682.58, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(393, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 12, 540.5073, 10203.36, 10203.36, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(394, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 12, 675.1839, 13114.2, 13114.2, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(395, 'TE278607989915', 'DRAIN  VALVE', '2014-02-08', '2014-02-08', '05:15', '761Z0911', 'SAMPLE  ACCOUNT -  Anuradhapura Spare Parts                                                     - Hemal Rathnayake', 12, 285.4321, 5705.16, 5705.16, 1001089, 57510, 'APURAW/S', 'X', 'A', 0, 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', 'Nilanka Heshan', 'LNH', NULL, 8, 1),
(396, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 241.4466, 420.82, 420.82, 6475, 22060, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'CPNB-3294', 2, 1),
(397, 'TV9451037404', 'FUEL FILTER (MICO)', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 339.0199, 548.6, 548.6, 6475, 22060, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'CPNB-3294', 2, 1),
(398, 'TE253418130169', 'ASSY.  OIL  FILTER', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 885.0952, 1958.21, 1958.21, 6475, 22060, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'CPNB-3294', 2, 1),
(399, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2.8, 426.4049, 1357.468, 1357.468, 10311, 22028, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-3167', 2, 1),
(400, 'ZQ5555555P', 'COTTON WASTE', '2014-01-31', '2014-02-03', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 3, 5.5562, 21.93, 21.93, 10280, 21029, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'WPHD-8068', 2, 1),
(401, 'ZQ5180098', 'DE-GREASER', '2014-01-31', '2014-02-03', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 4, 84.0029, 406.24, 406.24, 10280, 21029, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'WPHD-8068', 2, 1),
(402, 'ZQ5180081', 'CAR WASH "CARE"', '2014-01-31', '2014-02-03', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.2, 108.2288, 28.184, 28.184, 10280, 21029, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'WPHD-8068', 2, 1),
(403, 'ZQ1070183', 'MARFAK MULTIPURPOSE (LANKA GREASE P18)3', '2014-01-31', '2014-02-03', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.5, 477.36, 365, 365, 10280, 21029, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'WPHD-8068', 2, 1),
(404, 'ZQ1020001', 'KEROSENE OIL', '2014-01-31', '2014-02-03', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 109.7182, 110, 110, 10280, 21029, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'WPHD-8068', 2, 1),
(405, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 675.7318, 1092.85, 1092.85, 10311, 22028, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-3167', 2, 1),
(406, 'DVF002G50003', 'GLOW PLUG', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 593.25, 1294.65, 1294.65, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPR-8873', 2, 1),
(407, 'VE283415209910', '[021] H T CABLE', '2014-02-13', '2014-02-13', '0.6875', '000W9970', 'Tata PCBU Vehicles  Warranty Claims-A/C - New  -  107T0005 ------------>tranfer to 151T0202', 2, 426.2508, 1379.06, 1379.06, 3004933, 22254, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPKV-2099', 2, 1),
(408, 'TE252318130182', 'OIL FILTER 18,000 Km', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 4, 536.1121, 3710.08, 3710.08, 6474, 22058, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Madushan A', 'ADA', NULL, 2, 1),
(409, 'TE269026107202', 'MAGNETIC DRAIN PLUG', '2014-02-13', '2014-02-13', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 92.69, 160.51, 160.51, 10361, 22252, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPR-6283', 2, 1),
(410, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-13', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 5, 5.5562, 32.895, 36.55, 10360, 22231, 'BALAGOLL', 'X', 'B', 10, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPNB-4867', 2, 1),
(411, 'ZQ5180098', 'DE-GREASER', '2014-02-13', '2014-02-13', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 5, 82.9115, 457.02, 507.8, 10360, 22231, 'BALAGOLL', 'X', 'B', 10, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPNB-4867', 2, 1),
(412, 'ZQ1070183', 'MARFAK MULTIPURPOSE (LANKA GREASE P18)3', '2014-02-13', '2014-02-13', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1.5, 477.36, 985.5, 1095, 10360, 22231, 'BALAGOLL', 'X', 'B', 10, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPNB-4867', 2, 1),
(413, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-13', '2014-02-13', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1.5, 597.8144, 1275, 1275, 10361, 22252, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPR-6283', 2, 1),
(414, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-13', '2014-02-13', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 413.2332, 680, 680, 10361, 22252, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPR-6283', 2, 1),
(415, 'TE257667102316', 'W/S GLASS LAMIN LPK 2516 LPS 3516 4018', '2014-02-13', '2014-02-13', '0.6875', '711S0017', 'S. K. Motors', 1, 13910.67, 21834.1792, 26306.24, 1001045, 22253, 'BALAGOLL', 'X', 'A', 17, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', NULL, 2, 1),
(416, 'D6L10X80BR', 'BRASSRIVERT', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 2, 680.4693, 1517.86, 1517.86, 6473, 22057, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', 'CPLJ-9410', 2, 1),
(417, 'D6RTTTPSM2STD', 'TATA 1313/1510 FRONT STD', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 2962.4016, 4762.21, 4762.21, 6473, 22057, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', 'CPLJ-9410', 2, 1),
(418, 'D6RTTTPSM1STD', 'TATA 1313/1510 FRONT STD', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 2261.8623, 2910, 2910, 6473, 22057, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', 'CPLJ-9410', 2, 1),
(419, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 3, 5.5562, 21.93, 21.93, 10310, 22019, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPPV-4941', 2, 1),
(420, 'ZQ5180098', 'DE-GREASER', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2, 84.0029, 203.12, 203.12, 10310, 22019, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPPV-4941', 2, 1),
(421, 'ZQ5180081', 'CAR WASH "CARE"', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.2, 108.2288, 28.184, 28.184, 10310, 22019, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPPV-4941', 2, 1),
(422, 'TE281829100145', 'ASSY. CLUTCH CABLE', '2014-01-31', '2014-02-13', '0.6875', '000W2811', 'Tata Commercial Vehicles Warranty Claims-A/C -Balagolla Service------------>tranfer to 151T0202', 1, 1038.1432, 1251.56, 1821.26, 3004936, 21808, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'UPPW-1515', 2, 1),
(423, 'ZQ1020001', 'KEROSENE OIL', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 109.7848, 110, 110, 10310, 22019, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPPV-4941', 2, 1),
(424, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 3, 5.5562, 21.93, 21.93, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPR-8873', 2, 1),
(425, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1.5, 597.8144, 1275, 1275, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Dhananjaya Medagoda', 'DBM', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DBM', 'CPPR-8873', 2, 1),
(426, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 413.2332, 680, 680, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Dhananjaya Medagoda', 'DBM', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DBM', 'CPPR-8873', 2, 1),
(427, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 3, 426.4049, 1454.43, 1454.43, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Dhananjaya Medagoda', 'DBM', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DBM', 'CPPR-8873', 2, 1),
(428, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 396.8245, 629.12, 629.12, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Dhananjaya Medagoda', 'DBM', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DBM', 'CPPR-8873', 2, 1),
(429, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2, 508.1224, 1605.42, 1605.42, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Dhananjaya Medagoda', 'DBM', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DBM', 'CPPR-8873', 2, 1),
(430, 'TE278801135301', 'SUMP GASKET', '2014-02-07', '2014-02-07', '0.6875', '711C9900', 'Cash Sales Retail -Balagolla Spare Parts -', 1, 212.4693, 387.06, 387.06, 3723, 22056, 'BALAGOLL', 'X', 'A', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPLG-7178', 2, 1),
(431, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 4, 5.5562, 29.24, 29.24, 10312, 22049, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPLK-8073', 2, 1),
(432, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 15, 452.3829, 7272.15, 7272.15, 10312, 22049, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPLK-8073', 2, 1),
(433, 'TF16220710282', 'SEALING WASHER CU 18X22', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 36.4048, 62.65, 62.65, 10312, 22049, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPLK-8073', 2, 1),
(434, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 549.4309, 850.28, 850.28, 10312, 22049, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPLK-8073', 2, 1),
(435, 'TE278609999920', 'STRAINER FUEL', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 257.1993, 412.18, 412.18, 10312, 22049, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPLK-8073', 2, 1),
(436, 'TE278609119904', 'FUEL FILTER', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 482.0577, 741.45, 741.45, 10312, 22049, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPLK-8073', 2, 1),
(437, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 674.5665, 1092.85, 1092.85, 10312, 22049, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPLK-8073', 2, 1),
(438, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 3, 5.5562, 21.93, 21.93, 10311, 22028, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-3167', 2, 1),
(439, 'ZQ5180098', 'DE-GREASER', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2, 84.0029, 203.12, 203.12, 10311, 22028, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-3167', 2, 1),
(440, 'ZQ5180081', 'CAR WASH "CARE"', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.2, 108.2288, 28.184, 28.184, 10311, 22028, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-3167', 2, 1),
(441, 'ZQ1070183', 'MARFAK MULTIPURPOSE (LANKA GREASE P18)3', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.5, 477.36, 365, 365, 10311, 22028, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-3167', 2, 1),
(442, 'ZQ1020001', 'KEROSENE OIL', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 109.7848, 110, 110, 10311, 22028, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-3167', 2, 1),
(443, 'TE257329100161', 'CLUTCH SLAVE CY KIT', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 128.9879, 222.42, 222.42, 6472, 22053, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', '63/0330', 2, 1),
(444, 'TE261829100110', 'CLUTCH MAST; CYL;REP;KIT MINOR', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 271.2327, 449.24, 449.24, 6472, 22053, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', '63/0330', 2, 1),
(445, 'TE275147100106', 'ASSY  SUCTION TUBE', '2014-01-30', '2014-02-01', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 480.41, 731.799, 813.11, 10261, 21778, 'BALAGOLL', 'X', 'B', 10, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPQ-9182', 2, 1),
(446, 'ZQ2010164', 'BRAKE FLUID DOT4[P-164]', '2014-01-30', '2014-02-12', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.5, 1291.1087, 773.0415, 858.935, 10349, 21300, 'BALAGOLL', 'X', 'B', 10, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPKA-9514', 2, 1),
(447, 'VE277943100129', 'S.V.MASTER ASSY-TYPE1-NON TCIC-M/S BOSCH', '2014-01-30', '2014-02-12', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 10640.35, 14045.256, 17556.57, 10349, 21300, 'BALAGOLL', 'X', 'B', 20, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPKA-9514', 2, 1),
(448, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 3, 5.5562, 21.93, 21.93, 10309, 22037, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-4546', 2, 1),
(449, 'ZQ5180098', 'DE-GREASER', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2, 84.0029, 203.12, 203.12, 10309, 22037, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-4546', 2, 1),
(450, 'ZQ5180081', 'CAR WASH "CARE"', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.2, 108.2288, 28.184, 28.184, 10309, 22037, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-4546', 2, 1),
(451, 'ZQ1070183', 'MARFAK MULTIPURPOSE (LANKA GREASE P18)3', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.5, 477.36, 365, 365, 10309, 22037, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-4546', 2, 1),
(452, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-13', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2, 5.5562, 14.62, 14.62, 10361, 22252, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPR-6283', 2, 1),
(453, 'ZQ1020001', 'KEROSENE OIL', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 109.7848, 110, 110, 10309, 22037, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-4546', 2, 1),
(454, 'TE257624200118', 'ENGINE MOUNT', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 1513.7567, 2606.47, 2606.47, 6471, 22050, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', 'NWLE-6996', 2, 1),
(455, 'TE261829100110', 'CLUTCH MAST; CYL;REP;KIT MINOR', '2014-02-07', '2014-02-07', '0.6875', '711C9900', 'Cash Sales Retail -Balagolla Spare Parts -', 1, 271.2327, 449.24, 449.24, 3722, 22048, 'BALAGOLL', 'X', 'A', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPNB-2744', 2, 1),
(456, 'TE269026806310', 'GEAR LEVER BUSH', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2, 20.22, 69.46, 69.46, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPR-8873', 2, 1);
INSERT INTO `tbl_all_sales` (`all_sales_id`, `part_no`, `description`, `date_decar`, `date_edit`, `time`, `acc_no`, `customer_name`, `qty`, `cost_price`, `selling_val`, `retail_val`, `invoice`, `wip`, `location`, `in_s`, `de`, `disc`, `s_e_name`, `s_e_code`, `authorised_by`, `authorised_by_code`, `creating_op`, `creating_op_code`, `vehicle_reg_no`, `area_id`, `status`) VALUES
(457, 'TE269026806303', 'BUSH (G S LEVER BALL SEAT)', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2, 25.18, 90.52, 90.52, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPR-8873', 2, 1),
(458, 'TE264126800224', 'ASSY BALL JOINT RH THREADS', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 479.3563, 897.26, 897.26, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPR-8873', 2, 1),
(459, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2, 5.5562, 14.62, 14.62, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Dhananjaya Medagoda', 'DBM', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DBM', 'CPPR-8873', 2, 1),
(460, 'ZQ5180081', 'CAR WASH "CARE"', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.2, 108.2288, 28.184, 28.184, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Dhananjaya Medagoda', 'DBM', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DBM', 'CPPR-8873', 2, 1),
(461, 'ZQ1070183', 'MARFAK MULTIPURPOSE (LANKA GREASE P18)3', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.5, 477.36, 365, 365, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Dhananjaya Medagoda', 'DBM', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DBM', 'CPPR-8873', 2, 1),
(462, 'ZQ1020001', 'KEROSENE OIL', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 109.7848, 110, 110, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Dhananjaya Medagoda', 'DBM', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DBM', 'CPPR-8873', 2, 1),
(463, 'ZQ5180098', 'DE-GREASER', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 84.0029, 101.56, 101.56, 10318, 22041, 'BALAGOLL', 'X', 'B', 0, 'Dhananjaya Medagoda', 'DBM', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DBM', 'CPPR-8873', 2, 1),
(464, 'TE886325010076', '352 DIA. ASSY. CLUTCH DISC', '2014-02-07', '2014-02-08', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 7995.79, 13957.74, 13957.74, 10324, 22001, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'UPNB-6055', 2, 1),
(465, 'TE265454204913', 'RELAY WITH RESISTER', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 336, 584.94, 584.94, 10310, 22019, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPPV-4941', 2, 1),
(466, 'TE252707130130', 'ASSY.  VACUUM  CYLINDER', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 2842.5703, 4825.34, 4825.34, 6470, 22047, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', 'CPPT-8115', 2, 1),
(467, 'TE286409139904', 'AIR FILTER ELEMENT 1 TONNE', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 1475.8334, 2302.72, 2302.72, 6469, 22046, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', 'CPPT-4088', 2, 1),
(468, 'TE279018130106', 'DIESEL OIL FILTER', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 495.9908, 908.23, 908.23, 6469, 22046, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', 'CPPT-4088', 2, 1),
(469, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 2, 508.1224, 1605.42, 1605.42, 6469, 22046, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', 'CPPT-4088', 2, 1),
(470, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-13', '2014-02-13', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2.8, 422.8949, 1357.468, 1357.468, 10361, 22252, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPR-6283', 2, 1),
(471, 'TE265442100135', 'KIT BRAKE PAD', '2014-02-07', '2014-02-07', '0.6875', '711C9900', 'Cash Sales Retail -Balagolla Spare Parts -', 1, 3229.1507, 5310.253, 5589.74, 3721, 22045, 'BALAGOLL', 'X', 'A', 5, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPLE-7908', 2, 1),
(472, 'TF62120400121', 'BULB 12V,21W', '2014-02-07', '2014-02-17', '0.6875', '811I0502', 'Balagolla Service-COST OF SALES', 1, 61.8772, 68.06, 112.3, 2011805, 22043, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'WPKP-0601', 2, 1),
(473, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-13', '2014-02-13', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 396.8245, 629.12, 629.12, 10361, 22252, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPR-6283', 2, 1),
(474, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 3, 5.5562, 21.93, 21.93, 10307, 22027, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-2351', 2, 1),
(475, 'ZQ5180098', 'DE-GREASER', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2, 84.0029, 203.12, 203.12, 10307, 22027, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-2351', 2, 1),
(476, 'ZQ5180081', 'CAR WASH "CARE"', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.2, 108.2288, 28.184, 28.184, 10307, 22027, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-2351', 2, 1),
(477, 'ZQ1070183', 'MARFAK MULTIPURPOSE (LANKA GREASE P18)3', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 0.5, 477.36, 365, 365, 10307, 22027, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-2351', 2, 1),
(478, 'ZQ1020001', 'KEROSENE OIL', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 109.7848, 110, 110, 10307, 22027, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-2351', 2, 1),
(479, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 3, 5.5562, 21.93, 21.93, 10309, 22037, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-4546', 2, 1),
(480, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-07', '2014-02-12', '0.6875', '000W2811', 'Tata Commercial Vehicles Warranty Claims-A/C -Balagolla Service------------>tranfer to 151T0202', 0.5, 452.3829, 274.88, 274.88, 3004925, 22037, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-4546', 2, 1),
(481, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-07', '2014-02-12', '0.6875', '000W2811', 'Tata Commercial Vehicles Warranty Claims-A/C -Balagolla Service------------>tranfer to 151T0202', 1, 396.8245, 515.87, 629.12, 3004925, 22037, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-4546', 2, 1),
(482, 'ZQS731-30010', 'MINI FUSE 10 AMP', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 39.37, 49.11, 49.11, 10310, 22019, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPPV-4941', 2, 1),
(483, 'ZQS731-010', 'FUSE', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 2, 10, 58, 58, 10310, 22019, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPPV-4941', 2, 1),
(484, 'TE257329100161', 'CLUTCH SLAVE CY KIT', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 128.9879, 222.42, 222.42, 6468, 22040, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', NULL, 2, 1),
(485, 'TE261829100110', 'CLUTCH MAST; CYL;REP;KIT MINOR', '2014-02-07', '2014-02-07', '0.6875', '712C9900', 'Cash Sales Retail -Kandy Spare Parts -', 1, 271.2327, 449.24, 449.24, 6468, 22040, 'KANDY', 'X', 'C', 0, 'Madushan A', 'ADA', 'Madushan A', 'ADA', 'Kapila Dissanayake', 'ADA', NULL, 2, 1),
(486, 'TE885409041613', 'SET OF 1613 AIR FILTER CARTRID', '2014-02-07', '2014-02-07', '0.6875', '711C9900', 'Cash Sales Retail -Balagolla Spare Parts -', 1, 4215.5732, 6442.5295, 6781.61, 3720, 22039, 'BALAGOLL', 'X', 'A', 5, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'SGLC-7754', 2, 1),
(487, 'TE278620999904', 'SCREW HEX FLANGE HD CAP', '2014-02-07', '2014-02-07', '0.6875', '711C9900', 'Cash Sales Retail -Balagolla Spare Parts -', 4, 32.4181, 223.136, 234.88, 3720, 22039, 'BALAGOLL', 'X', 'A', 5, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'SGLC-7754', 2, 1),
(488, 'TE551754209909', 'TEMPERATURE SENSOR FOR FAN CONTROLLER', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 355.14, 630.74, 630.74, 10310, 22019, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'EPPV-4941', 2, 1),
(489, 'VE283442990103', 'FRONT KIT SHOE ASSEMBLY COMPLETE', '2014-02-07', '2014-02-07', '0.6875', '711C9900', 'Cash Sales Retail -Balagolla Spare Parts -', 1, 972.44, 1510.21, 1510.21, 3719, 22035, 'BALAGOLL', 'X', 'A', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPKS-3530', 2, 1),
(490, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-07', '2014-02-07', '0.6875', '711C9900', 'Cash Sales Retail -Balagolla Spare Parts -', 1, 549.4309, 850.28, 850.28, 3718, 22033, 'BALAGOLL', 'X', 'A', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPLJ-3497', 2, 1),
(491, 'TE278609999920', 'STRAINER FUEL', '2014-02-07', '2014-02-07', '0.6875', '711C9900', 'Cash Sales Retail -Balagolla Spare Parts -', 1, 257.1993, 412.18, 412.18, 3718, 22033, 'BALAGOLL', 'X', 'A', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPLJ-3497', 2, 1),
(492, 'TE278609119904', 'FUEL FILTER', '2014-02-07', '2014-02-07', '0.6875', '711C9900', 'Cash Sales Retail -Balagolla Spare Parts -', 1, 482.0577, 741.45, 741.45, 3718, 22033, 'BALAGOLL', 'X', 'A', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPLJ-3497', 2, 1),
(493, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-07', '2014-02-07', '0.6875', '711C9900', 'Cash Sales Retail -Balagolla Spare Parts -', 1, 674.5665, 1092.85, 1092.85, 3718, 22033, 'BALAGOLL', 'X', 'A', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPLJ-3497', 2, 1),
(494, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 3, 5.5562, 21.93, 21.93, 10311, 22028, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-3167', 2, 1),
(495, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1.5, 597.8144, 1275, 1275, 10311, 22028, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-3167', 2, 1),
(496, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-07', '2014-02-07', '0.6875', '811C9900', 'Cash Sales Retail -Balagolla Service -', 1, 413.2332, 680, 680, 10311, 22028, 'BALAGOLL', 'X', 'B', 0, 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'Kapila Dissanayake', 'DMK', 'CPPW-3167', 2, 1),
(497, 'TE278809130113', 'AIR CLEANER ASSY', '2014-02-13', '2014-02-13', '18:48', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 3485.215, 6392.99, 6392.99, 6991, 49279, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPW-1745', 3, 1),
(498, 'TE282933800109', 'ASSY  TIE  ROD', '2014-02-13', '2014-02-13', '18:48', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 2438.97, 4027.33, 4027.33, 6991, 49279, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPW-1745', 3, 1),
(499, 'TE551729100121', 'ASSY. CLUTCH CABLE', '2014-02-13', '2014-02-13', '18:09', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 924.38, 1505.376, 1672.64, 7563, 49379, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-9874', 3, 1),
(500, 'VE283482400123', 'ASSY FRONT WIPER ARM', '2014-02-13', '2014-02-13', '18:01', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 625.88, 1184.82, 1184.82, 6990, 49410, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPKQ-9256', 3, 1),
(501, 'TE282954400103', 'SIDE REPEATER LAMP', '2014-02-13', '2014-02-13', '17:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 86.458, 165.78, 165.78, 7562, 49191, 'MATARA', 'X', 'B', 0, 'Melaka Pushpasara', 'MLX', 'Priyantha kulathunga', 'PLG', 'Melaka Pushpasara', 'MLX', 'SPPS-6948', 3, 1),
(502, 'ZQ2010164', 'BRAKE FLUID DOT4[P-164]', '2014-02-13', '2014-02-13', '17:13', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 1325.6267, 385.9375, 385.9375, 7563, 49379, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-9874', 3, 1),
(503, 'TE282933403105', 'HUB BEARING INNER', '2014-02-13', '2014-02-15', '16:46', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 940.1488, 1505.1135, 1584.33, 7569, 49380, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-1648', 3, 1),
(504, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-16', '16:35', '821C0009', 'Cosmic Construction ( Pvt) Ltd', 5, 5.5222, 36.55, 36.55, 1000365, 49392, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-1232', 3, 1),
(505, 'TE278609119904', 'FUEL FILTER', '2014-02-13', '2014-02-16', '16:35', '821C0009', 'Cosmic Construction ( Pvt) Ltd', 1, 486.5172, 741.45, 741.45, 1000365, 49392, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-1232', 3, 1),
(506, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-13', '2014-02-16', '16:35', '821C0009', 'Cosmic Construction ( Pvt) Ltd', 1, 674.6612, 1092.85, 1092.85, 1000365, 49392, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-1232', 3, 1),
(507, 'TE278607989915', 'DRAIN  VALVE', '2014-02-13', '2014-02-16', '16:35', '821C0009', 'Cosmic Construction ( Pvt) Ltd', 1, 285.7365, 475.43, 475.43, 1000365, 49392, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-1232', 3, 1),
(508, 'ZQS502-161', 'CABLE BAND BLACK PLASTIC', '2014-02-13', '2014-02-13', '16:27', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 17.86, 23.21, 23.21, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLK-3522', 3, 1),
(509, 'ZQ2010157', 'LANKA TRANSFLUID P157', '2014-02-13', '2014-02-13', '16:27', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 507.3481, 588.35, 588.35, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLK-3522', 3, 1),
(510, 'TE282943100104', 'M/C KIT MINOR', '2014-02-13', '2014-02-13', '16:04', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 620.96, 963.981, 1071.09, 7563, 49379, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-9874', 3, 1),
(511, 'TE269872300103', 'ASSY OUTER HANDLE RH', '2014-02-13', '2014-02-13', '15:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 211.23, 367.9635, 387.33, 7557, 49405, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPPV-0527', 3, 1),
(512, 'TE267872300114', 'REG HANDLE', '2014-02-13', '2014-02-13', '15:53', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 91.327, 161.9275, 170.45, 7557, 49405, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPPV-0527', 3, 1),
(513, 'TE282933403105', 'HUB BEARING INNER', '2014-02-13', '2014-02-13', '15:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 940.1488, 1505.1135, 1584.33, 7558, 49383, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-9538', 3, 1),
(514, 'TE269533403101', 'HUB BEARING OUTER', '2014-02-13', '2014-02-13', '15:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 605.8695, 984.143, 1035.94, 7558, 49383, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-9538', 3, 1),
(515, 'TE552354200109', 'ELECT.INSTR. CLST.(0.65 RATIO)PRICOL-ACE', '2014-02-13', '2014-02-15', '15:30', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 4747.42, 6171.65, 8102.2, 3004644, 49385, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'EPPW-5491', 3, 1),
(516, 'TE269026806303', 'BUSH G.S.LEVER BALL SEAT', '2014-02-13', '2014-02-13', '15:23', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 25.35, 90.52, 90.52, 6989, 49404, 'MATARA', 'X', 'A', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPQ-9955', 3, 1),
(517, 'Y9 50 50 055', '8 25 20 SMILER N14', '2014-02-13', '2014-02-13', '13:50', '521I0502', 'Matara Vehicle Sales-COST OF SALES', 0.5, 24962.23, 13729.225, 17680, 2012437, 48777, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-7743', 3, 1),
(518, 'TE282930100132', 'ACC,CABLE', '2014-02-13', '2014-02-13', '15:30', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 601.78, 929.0715, 977.97, 7555, 49373, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-2503', 3, 1),
(519, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-15', '14:40', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7569, 49380, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-1648', 3, 1),
(520, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-13', '2014-02-15', '14:40', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7569, 49380, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-1648', 3, 1),
(521, 'ZQ1020001', 'KEROSENE OIL', '2014-02-13', '2014-02-15', '14:40', '821C9900', 'Cash Sales Retail -Matara Service -', 0.5, 109.28, 55, 55, 7569, 49380, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-1648', 3, 1),
(522, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-13', '2014-02-15', '14:40', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 58.6973, 203.927, 214.66, 7569, 49380, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-1648', 3, 1),
(523, 'MN000094 004016', 'COTTON PIN', '2014-02-13', '2014-02-15', '14:40', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1.65, 4.3, 4.3, 7569, 49380, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-1648', 3, 1),
(524, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-13', '14:35', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7556, 49385, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'EPPW-5491', 3, 1),
(525, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-13', '2014-02-13', '14:35', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7556, 49385, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'EPPW-5491', 3, 1),
(526, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-13', '2014-02-13', '14:35', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 423.4993, 680, 680, 7556, 49385, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'EPPW-5491', 3, 1),
(527, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-13', '2014-02-13', '14:35', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7556, 49385, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'EPPW-5491', 3, 1),
(528, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-13', '2014-02-13', '14:35', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7556, 49385, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'EPPW-5491', 3, 1),
(529, 'TE282954200106', 'ASSY TANK UNIT', '2014-02-07', '2014-02-07', '17:06', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 971.7532, 1509.84, 1677.6, 7508, 49198, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-7509', 3, 1),
(530, 'TE282933403105', 'HUB BEARING INNER', '2014-02-07', '2014-02-07', '16:53', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 940.1488, 1425.897, 1584.33, 7508, 49198, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-7509', 3, 1),
(531, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-07', '2014-02-07', '16:49', '821C9900', 'Cash Sales Retail -Matara Service -', 5, 431.2164, 2986.45, 2986.45, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLG-9745', 3, 1),
(532, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '16:33', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5.5222, 7.31, 7.31, 7507, 49213, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPS-8842', 3, 1),
(533, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '15:47', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 5.5222, 7.18, 7.31, 3004625, 49207, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPW-9385', 3, 1),
(534, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-07', '2014-02-07', '15:47', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 431.2164, 560.58, 597.29, 3004625, 49207, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPW-9385', 3, 1),
(535, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-07', '2014-02-07', '15:47', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 399.0146, 518.72, 629.12, 3004625, 49207, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPW-9385', 3, 1),
(536, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '15:42', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7508, 49198, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-7509', 3, 1),
(537, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-07', '2014-02-07', '15:42', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7508, 49198, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-7509', 3, 1),
(538, 'ZQ1020001', 'KEROSENE OIL', '2014-02-07', '2014-02-07', '15:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7508, 49198, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-7509', 3, 1),
(539, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-07', '2014-02-07', '15:42', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 58.6973, 214.66, 214.66, 7508, 49198, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-7509', 3, 1),
(540, 'TE279005110103', 'ASSY,IDLER', '2014-02-07', '2014-02-07', '15:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1167.87, 1727.496, 1919.44, 7508, 49198, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-7509', 3, 1),
(541, 'TE279005110101', 'BELT TENSIONER', '2014-02-07', '2014-02-07', '15:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2275.014, 3448.683, 3831.87, 7508, 49198, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-7509', 3, 1),
(542, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-07', '2014-02-07', '15:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 262.9967, 412.56, 458.4, 7508, 49198, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-7509', 3, 1),
(543, 'TE254705116301', 'TIMING BELT', '2014-02-07', '2014-02-07', '15:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2258.9715, 3479.769, 3866.41, 7508, 49198, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-7509', 3, 1),
(544, 'MN000094 004016', 'COTTON PIN', '2014-02-07', '2014-02-07', '15:42', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1.65, 4.3, 4.3, 7508, 49198, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-7509', 3, 1),
(545, 'ZQN25', 'BATTERY N 25', '2014-02-10', '2014-02-13', '08:51', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 5500, 7150, 5500, 3004639, 49106, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Linken Weerarathne', 'LIW', 'Priyantha kulathunga', 'PLG', '01/N031218', 3, 1),
(546, 'VE269026204607', 'ENGAGING GEAR(3/4 SPEED)', '2014-02-11', '2014-02-15', '12:20', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 392.14, 509.78, 799.2, 3004645, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Priyantha kulathunga', 'PLG', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(547, 'TE278809135802', 'INTAKE HOSE(AIR FILTER)', '2014-02-07', '2014-02-07', '15:07', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 554.55, 872.841, 918.78, 6948, 49206, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-3186', 3, 1),
(548, 'TE265454209980', 'FUEL LEVEL SENSOR', '2014-02-07', '2014-02-07', '14:53', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 602.435, 1069.09, 1069.09, 6947, 49204, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-0921', 3, 1),
(549, 'TE269932100184', 'PIVOT  BUSH  NEW', '2014-02-07', '2014-02-07', '14:53', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 258.0292, 1013.58, 1013.58, 6947, 49204, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-0921', 3, 1),
(550, 'TE252701155302', 'GASKET TAPPET COVER', '2014-02-07', '2014-02-07', '14:46', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 361.5506, 626.58, 626.58, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLG-9745', 3, 1),
(551, 'TE285126200116', 'SYNCHRO KIT3/4 SPEED', '2014-02-11', '2014-02-15', '12:20', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 183.61, 238.69, 327.23, 3004645, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Priyantha kulathunga', 'PLG', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(552, 'TE269026203805', 'SYNCHROCONE(3/4/5/SPEED)', '2014-02-11', '2014-02-15', '12:20', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 460.16, 598.21, 790.46, 3004645, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Priyantha kulathunga', 'PLG', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(553, 'ZQMOBILLUBSAE75W901L', 'MOBIL 75W90 (NANO GEAR )', '2014-02-07', '2014-02-07', '14:25', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 1.5, 1698.0958, 2801.865, 3311.67, 2012385, 49183, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKV-5510', 3, 1),
(554, 'ZQMOBIL SUPER 15W40', 'MOBIL SUPER 15W40', '2014-02-07', '2014-02-07', '14:25', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 3, 538.9615, 1778.58, 2089.29, 2012385, 49183, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKV-5510', 3, 1),
(555, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '14:25', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 2, 5.5222, 12.14, 14.62, 2012385, 49183, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKV-5510', 3, 1),
(556, 'VE570518130102', 'ASSY OIL FILTER', '2014-02-07', '2014-02-07', '14:25', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 1, 255.2508, 280.78, 467.23, 2012385, 49183, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKV-5510', 3, 1),
(557, 'VE283447609903', 'FUEL FILTER', '2014-02-07', '2014-02-07', '14:25', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 1, 160.37, 176.41, 279.3, 2012385, 49183, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKV-5510', 3, 1),
(558, 'VEG279009130131', 'ASSY FILTER ELEMENT', '2014-02-08', '2014-02-08', '11:52', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 737.39, 1182.49, 1182.49, 6953, 49193, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPKG-5178', 3, 1),
(559, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '13:44', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7505, 49179, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-3391', 3, 1),
(560, 'TE551747600132', 'ASSY. RETURN LINE (ENGINE TO TANK)', '2014-02-07', '2014-02-07', '13:44', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 523.17, 824.429, 867.82, 7505, 49179, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-3391', 3, 1),
(561, 'TE265954410136', 'ASSY BLINKER LAMP', '2014-02-07', '2014-02-07', '13:25', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 910.05, 1561.61, 1561.61, 6946, 49200, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPR-9471', 3, 1),
(562, 'TE257682400127', '6900 / ASSY WIPER ARM', '2014-02-13', '2014-02-13', '14:20', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', -1, 562.31, -1076.265, -1195.85, 4000302, 49004, 'MATARA', 'X', 'A', 10, 'K ladduwahetti', 'KAL', 'K ladduwahetti', 'KAL', 'K ladduwahetti', 'KAL', 'SPLH-4971', 3, 1),
(563, 'TE252513140101', 'S/PISTON RINGSäSTDü', '2014-02-08', '2014-02-11', '16:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 336.16, 589.3135, 620.33, 7531, 49084, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-6668', 3, 1),
(564, 'TE252713100109', 'AIR COMP HEAD', '2014-02-09', '2014-02-11', '10:14', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 3073.44, 5372.25, 5655, 7531, 49084, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-6668', 3, 1),
(565, 'TE281830100101', 'ASSY. ACCELERATOR CABLE', '2014-02-07', '2014-02-07', '12:39', '721S0016', 'Sagara Motors', 1, 977.43, 1481.2678, 1784.66, 1001553, 49196, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(566, 'TE257682400125', '6900 / ASSY WIPER ARM', '2014-02-13', '2014-02-13', '14:20', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', -1, 634.93, -1274.229, -1415.81, 4000302, 49004, 'MATARA', 'X', 'A', 10, 'K ladduwahetti', 'KAL', 'K ladduwahetti', 'KAL', 'K ladduwahetti', 'KAL', 'SPLH-4971', 3, 1),
(567, 'TE270215409912', 'GLOW  PLUG', '2014-02-07', '2014-02-07', '12:39', '721S0016', 'Sagara Motors', 2, 1426.6057, 4222.2432, 5087.04, 1001553, 49196, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(568, 'TE279020100101', 'WATER PUMP', '2014-02-07', '2014-02-07', '12:39', '721S0016', 'Sagara Motors', 1, 1995.0002, 2908.5109, 3504.23, 1001553, 49196, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(569, 'TE257646000113', 'DRAG LINK REPAIR KIT', '2014-02-07', '2014-02-07', '12:39', '721S0016', 'Sagara Motors', 2, 1972.7425, 5590.1994, 6735.18, 1001553, 49196, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(570, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '12:39', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLG-9745', 3, 1),
(571, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-07', '2014-02-07', '12:39', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLG-9745', 3, 1),
(572, 'ZQ1020001', 'KEROSENE OIL', '2014-02-07', '2014-02-07', '12:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLG-9745', 3, 1),
(573, 'TE265981100167', 'RV MIRROR OUTER RH', '2014-02-07', '2014-02-07', '12:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 913.39, 1604.54, 1604.54, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLG-9745', 3, 1),
(574, 'TE265433407801', 'OIL SEAL FRONT HUB', '2014-02-07', '2014-02-07', '12:39', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 89.1625, 298.62, 298.62, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLG-9745', 3, 1),
(575, 'TE253409130241', 'ASSY  ELEMENT  AIR  CLEANER', '2014-02-07', '2014-02-07', '12:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1914.7967, 3197.02, 3197.02, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLG-9745', 3, 1),
(576, 'MN000094 004016', 'COTTON PIN', '2014-02-07', '2014-02-07', '12:39', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1.65, 4.3, 4.3, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLG-9745', 3, 1),
(577, 'ZQ9310109', 'BOLT', '2014-02-07', '2014-02-09', '13:18', '831I0502', 'Colombo Service-SIYAMBALAPE-COST OF SALES', 6, 15, 117, 546, 2012401, 49116, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPNA-8671', 3, 1),
(578, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-07', '2014-02-07', '12:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 242.143, 420.82, 420.82, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Linken Weerarathne', 'LIW', 'Priyantha kulathunga', 'PLG', 'WPLG-9745', 3, 1),
(579, 'TV9451037404', 'FUEL FILTER (MICO)', '2014-02-07', '2014-02-07', '12:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 340, 548.6, 548.6, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Linken Weerarathne', 'LIW', 'Priyantha kulathunga', 'PLG', 'WPLG-9745', 3, 1),
(580, 'TE254718130106', 'OIL FILTER', '2014-02-07', '2014-02-07', '12:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 380.3592, 806.91, 806.91, 7504, 49190, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Linken Weerarathne', 'LIW', 'Priyantha kulathunga', 'PLG', 'WPLG-9745', 3, 1),
(581, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-07', '2014-02-07', '12:07', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 674.6612, 1092.85, 1092.85, 6945, 49195, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-0747', 3, 1),
(582, 'TE278609119904', 'FUEL FILTER', '2014-02-07', '2014-02-07', '12:07', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 464.0531, 741.45, 741.45, 6945, 49195, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-0747', 3, 1),
(583, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-07', '2014-02-07', '12:07', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 541.3676, 850.28, 850.28, 6945, 49195, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-0747', 3, 1),
(584, 'TE266835607702', 'OIL SEAL RR OUTER', '2014-02-13', '2014-02-13', '14:08', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 234.0453, 368.239, 387.62, 6986, 49400, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'R08684', 3, 1),
(585, 'TE266835607701', 'OIL SEAL RR INNER', '2014-02-13', '2014-02-13', '14:08', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 311.5259, 494.8835, 520.93, 6986, 49400, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'R08684', 3, 1),
(586, 'TE282932300128', 'ASSY. FRONT SHOCK ABSORBER', '2014-02-07', '2014-02-07', '12:01', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 1712.31, 4605.453, 5418.18, 6944, 49194, 'MATARA', 'X', 'A', 15, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLD-5255', 3, 1),
(587, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-08', '2014-02-08', '11:52', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 506.863, 802.71, 802.71, 6953, 49193, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPKG-5178', 3, 1),
(588, 'TE279018130106', 'DIESEL OIL FILTER', '2014-02-08', '2014-02-08', '11:52', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 499.2567, 908.23, 908.23, 6953, 49193, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPKG-5178', 3, 1),
(589, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '11:28', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7502, 49178, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-5340', 3, 1),
(590, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-07', '2014-02-07', '11:28', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7502, 49178, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-5340', 3, 1),
(591, 'TE279020127701', 'SEAL THERMOSTAT', '2014-02-07', '2014-02-07', '11:28', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 11.04, 16.893, 18.77, 7502, 49178, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-5340', 3, 1),
(592, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-07', '2014-02-07', '11:28', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 566.208, 629.12, 7502, 49178, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-5340', 3, 1),
(593, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-07', '2014-02-07', '11:28', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 262.9967, 412.56, 458.4, 7502, 49178, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-5340', 3, 1),
(594, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-07', '2014-02-07', '11:28', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1444.878, 1605.42, 7502, 49178, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-5340', 3, 1),
(595, 'VE283454400121', 'ASSY FRONT FOG LAMP LH', '2014-02-07', '2014-02-07', '10:38', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 2049.11, 3353.85, 3353.85, 6942, 49189, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKR-6294', 3, 1),
(596, 'TE265443100133', 'MINOR KIT-TANDEM MASTER CYL', '2014-02-07', '2014-02-07', '10:29', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 407.8175, 706.29, 706.29, 6941, 49187, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPNB-0900', 3, 1),
(597, 'TE272425200110', 'CLUTCH DISC 228 mm DIA', '2014-02-07', '2014-02-07', '10:13', '721G0001', 'Gamage Motor House', 2, 3311.05, 9048.411, 10901.7, 1001552, 49188, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(598, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-07', '2014-02-07', '10:29', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 242.143, 841.64, 841.64, 6941, 49187, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPNB-0900', 3, 1),
(599, 'TE265129100137', 'CLUTCH S/CEY KIT', '2014-02-07', '2014-02-07', '10:29', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 428.65, 721.63, 721.63, 6941, 49187, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPNB-0900', 3, 1),
(600, 'TE270530100112', 'ASSY. PULL CABLE ACCELERATOR', '2014-02-13', '2014-02-13', '14:01', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 686.956, 1275.88, 1275.88, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLK-3522', 3, 1),
(601, 'TE282958900109', 'TOOL KIT - TATA ACE', '2014-02-13', '2014-02-13', '13:59', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 623.57, 1104.98, 1104.98, 6985, 49399, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'CPLE-9520', 3, 1),
(602, 'TEF002H20306', 'FINE  FILTER  ASSY.', '2014-02-07', '2014-02-07', '09:49', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 793.09, 2536.96, 2536.96, 6940, 49185, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPNB-3844', 3, 1),
(603, 'TE253418130169', 'ASSY.  OIL  FILTER', '2014-02-07', '2014-02-07', '09:49', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 885.1317, 1958.21, 1958.21, 6940, 49185, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPNB-3844', 3, 1),
(604, 'TE265129100148', 'REPAIR KIT MASTER CYL', '2014-02-07', '2014-02-07', '09:49', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 230.8136, 388, 388, 6940, 49185, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPNB-3844', 3, 1),
(605, 'ZQS890-323', 'SILICON SPECIAL250 BLACK', '2014-02-07', '2014-02-07', '09:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 883.93, 1149.11, 1149.11, 7501, 48867, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(606, 'ZQS502-161', 'CABLE BAND BLACK PLASTIC', '2014-02-13', '2014-02-13', '13:59', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 6, 17.86, 139.32, 139.32, 3004637, 49394, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-7683', 3, 1),
(607, 'TE251926207801', 'OIL SEAL MAIN SHAFT', '2014-02-07', '2014-02-07', '09:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 407.45, 658.87, 658.87, 7501, 48867, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(608, 'ZQS890-323', 'SILICON SPECIAL250 BLACK', '2014-02-07', '2014-02-07', '09:25', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 883.93, 1149.11, 1149.11, 3004624, 49176, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-5186', 3, 1),
(609, 'TE278801135301', 'SUMP GASKET', '2014-02-07', '2014-02-07', '09:25', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 212.8761, 276.74, 387.06, 3004624, 49176, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-5186', 3, 1),
(610, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '08:37', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7499, 49175, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-4543', 3, 1),
(611, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-07', '2014-02-07', '08:37', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7499, 49175, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-4543', 3, 1),
(612, 'ZQ1020001', 'KEROSENE OIL', '2014-02-07', '2014-02-07', '08:37', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7499, 49175, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-4543', 3, 1),
(613, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-07', '2014-02-07', '08:37', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1605.42, 1605.42, 7499, 49175, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-4543', 3, 1),
(614, 'ZQ5555555P', 'COTTON WASTE', '2014-02-07', '2014-02-07', '08:29', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7500, 49176, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-5186', 3, 1),
(615, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-07', '2014-02-07', '08:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7500, 49176, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-5186', 3, 1);
INSERT INTO `tbl_all_sales` (`all_sales_id`, `part_no`, `description`, `date_decar`, `date_edit`, `time`, `acc_no`, `customer_name`, `qty`, `cost_price`, `selling_val`, `retail_val`, `invoice`, `wip`, `location`, `in_s`, `de`, `disc`, `s_e_name`, `s_e_code`, `authorised_by`, `authorised_by_code`, `creating_op`, `creating_op_code`, `vehicle_reg_no`, `area_id`, `status`) VALUES
(616, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-07', '2014-02-07', '08:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 423.4993, 680, 680, 7500, 49176, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-5186', 3, 1),
(617, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-07', '2014-02-07', '08:29', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7500, 49176, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-5186', 3, 1),
(618, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-07', '2014-02-07', '08:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7500, 49176, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-5186', 3, 1),
(619, 'ZQ5555555P', 'COTTON WASTE', '2014-02-06', '2014-02-11', '17:24', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7538, 49165, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPV-6797', 3, 1),
(620, 'TE281854200122', 'ASSY TANK UNIT', '2014-01-31', '2014-02-01', '16:11', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1194.7103, 1863.243, 2070.27, 7448, 48931, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-2991', 3, 1),
(621, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-13', '13:59', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 2, 5.5222, 14.36, 14.62, 3004637, 49394, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-7683', 3, 1),
(622, 'ZQ2010176', 'CALTEX  RANDO  HDZ68 210LT', '2014-02-13', '2014-02-13', '13:59', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 347.6775, 451.98, 451.98, 3004637, 49394, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-7683', 3, 1),
(623, 'TE278614605802', 'HOSE INTERCOOLER TO INLET MANIFOLD', '2014-02-06', '2014-02-06', '17:21', '721A0006', 'Anura Motors', 2, 880.92, 2471.0262, 2977.14, 1001551, 49171, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(624, 'TE221787109004', 'AIR CONTROL VALVE', '2014-02-01', '2014-02-01', '11:53', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 17652.05, 25520.985, 28356.65, 7444, 48909, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLI-5498', 3, 1),
(625, 'TE274789110154', 'ASSY HYD.PUMP 1613TC', '2014-02-13', '2014-02-13', '13:59', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 20640.64, 26832.83, 35525.02, 3004637, 49394, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-7683', 3, 1),
(626, 'TE274789110151', 'HYD.  CYLINDER  FOR  CAB TILTING', '2014-02-13', '2014-02-13', '13:59', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 20549.83, 26714.78, 35283.75, 3004637, 49394, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-7683', 3, 1),
(627, 'TE263254209927', 'SPEEDOMETER(1:0.88)(BACKLIT)12V', '2014-02-13', '2014-02-13', '13:59', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 1647.4275, 2141.66, 3715.34, 3004637, 49394, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-7683', 3, 1),
(628, 'TE281854509916', 'HEAD LAMP LEVELLING SWITCH 1', '2014-02-16', '2014-02-16', '12:11', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 676.09, 878.92, 1074.57, 3004647, 48938, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-4043', 3, 1),
(629, 'TE215430100105', 'PULL CABLE FOR 713 TC RHD', '2014-02-06', '2014-02-06', '16:32', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 601.8917, 1003.3, 1003.3, 6938, 49169, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'EPLG-4121', 3, 1),
(630, 'TE257454209994', 'SPEEDOCABLE JIS 3600LG OF', '2014-02-13', '2014-02-13', '13:59', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 1228.53, 1560.46, 2120.73, 3004637, 49394, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-7683', 3, 1),
(631, 'TE282942103701', 'BRAKE DISC 17 THICK', '2014-02-06', '2014-02-06', '16:33', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1670.8634, 2778.959, 2925.22, 6939, 49167, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLG-7388', 3, 1),
(632, 'TE282933103702', 'FRONT HUB', '2014-02-06', '2014-02-06', '16:33', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1616.48, 2643.0425, 2782.15, 6939, 49167, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLG-7388', 3, 1),
(633, 'TE282947100184', 'ASSY. FILTER ELEMENT (PRE-FILTER)', '2014-02-06', '2014-02-06', '15:47', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2707.29, 4144.0995, 4362.21, 7496, 49157, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-6785', 3, 1),
(634, 'TE278615999902', 'TENSIONER BELT', '2014-02-13', '2014-02-13', '14:37', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 7269.12, 11380.113, 12644.57, 6987, 49398, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-8377', 3, 1),
(635, 'TE270215409912', 'GLOW  PLUG', '2014-02-06', '2014-02-06', '15:22', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1426.6057, 4832.688, 5087.04, 7495, 49123, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLG-8029', 3, 1),
(636, 'ZQS892-00112', 'RADIATOR COOLENT', '2014-02-06', '2014-02-13', '15:21', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 2, 606.717, 1896, 2066.08, 3004638, 49032, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-2664', 3, 1),
(637, 'ZQ5555555P', 'COTTON WASTE', '2014-02-06', '2014-02-13', '15:21', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 2, 5.5222, 14.36, 14.62, 3004638, 49032, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-2664', 3, 1),
(638, 'TE278609999920', 'STRAINER FUEL', '2014-02-06', '2014-02-06', '15:20', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 255.13, 412.18, 412.18, 6937, 49163, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'EPLG-4121', 3, 1),
(639, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-06', '2014-02-06', '15:20', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 674.6612, 1092.85, 1092.85, 6937, 49163, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'EPLG-4121', 3, 1),
(640, 'TE278609119904', 'FUEL FILTER', '2014-02-06', '2014-02-06', '15:20', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 464.0531, 741.45, 741.45, 6937, 49163, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'EPLG-4121', 3, 1),
(641, 'TE278243700163', 'AIR DRIER', '2014-02-06', '2014-02-06', '15:14', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 24006.98, 31209.07, 41215.2, 3004620, 49160, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLL-0650', 3, 1),
(642, 'TE282954400116', 'TAIL LAMP RH', '2014-02-06', '2014-02-06', '14:41', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 454.6884, 686.052, 762.28, 7493, 49027, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPR-7465', 3, 1),
(643, 'TE251926257801', 'DRIVE SHAFT OIL SEAL', '2014-02-05', '2014-02-07', '08:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 258.65, 385.191, 427.99, 7501, 48867, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(644, 'TE268426253104', 'BEARING NEEDLE CAGE', '2014-02-05', '2014-02-07', '08:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 357.4922, 569.241, 632.49, 7501, 48867, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(645, 'TE282954400115', 'TAIL LAMP LH', '2014-02-06', '2014-02-06', '14:41', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 448.5877, 682.839, 758.71, 7493, 49027, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPR-7465', 3, 1),
(646, 'TE282949100150', 'ASSY RUBBER HANGER BS 111', '2014-02-06', '2014-02-06', '14:35', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 141.9804, 231.2775, 243.45, 7495, 49123, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLG-8029', 3, 1),
(647, 'ZQS890-323', 'SILICON SPECIAL250 BLACK', '2014-02-06', '2014-02-15', '14:29', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 883.93, 1149.11, 1149.11, 3004645, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(648, 'ZQ5555555P', 'COTTON WASTE', '2014-02-06', '2014-02-15', '14:29', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 2, 5.5222, 14.36, 14.62, 3004645, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(649, 'TE268426250116', 'SUB ASSY DRIVE SHAFT UNEQUAL DACH', '2014-02-05', '2014-02-07', '08:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5191.675, 8480.268, 9422.52, 7501, 48867, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(650, 'TE551788500101', 'ASSY IMPACT BEAM FRONT BUMPER', '2014-02-11', '2014-02-13', '10:37', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 0.5, 3355.32, 2180.96, 2180.96, 3004635, 48656, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'UPPT-7274', 3, 1),
(651, 'TE278850105803', 'HOSE THERMOSTAT', '2014-02-13', '2014-02-13', '13:11', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 83.63, 145.37, 145.37, 6984, 49395, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPP-6293', 3, 1),
(652, 'TE278850105802', 'HOSE UPPER COOLING LINE', '2014-02-13', '2014-02-13', '13:11', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 89.6, 154.21, 154.21, 6984, 49395, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPP-6293', 3, 1),
(653, 'TE278850105804', 'HOSE UCL (TRANITION)', '2014-02-13', '2014-02-13', '13:11', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 616.2762, 1144.31, 1144.31, 6984, 49395, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPP-6293', 3, 1),
(654, 'TE278850105801', 'RADIATOR HOSE', '2014-02-13', '2014-02-13', '13:11', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 747.3332, 1284.17, 1284.17, 6984, 49395, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPP-6293', 3, 1),
(655, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-06', '2014-02-13', '14:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7552, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(656, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-06', '2014-02-13', '14:29', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 423.4993, 1360, 1360, 7552, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(657, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-06', '2014-02-13', '14:29', '821C9900', 'Cash Sales Retail -Matara Service -', 5.5, 409.65, 3285.095, 3285.095, 7552, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(658, 'TE279018130106', 'DIESEL OIL FILTER', '2014-02-06', '2014-02-13', '14:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 499.2567, 908.23, 908.23, 7552, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(659, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-06', '2014-02-13', '14:29', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1605.42, 1605.42, 7552, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(660, 'TE885426020207', 'SYNCHRO KIT GB76', '2014-02-06', '2014-02-07', '14:43', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1950, 2535, 803.32, 7501, 48867, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(661, 'TE885426010207', 'GASKET GBS76', '2014-02-06', '2014-02-07', '14:43', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 350, 455, 1366.42, 7501, 48867, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(662, 'ZQ5555555P', 'COTTON WASTE', '2014-02-06', '2014-02-06', '13:02', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5.5222, 7.31, 7.31, 7492, 49151, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SKIL', 3, 1),
(663, 'ZG1 900 905 016', 'BEARING', '2014-02-06', '2014-02-06', '13:02', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 200.89, 535.71, 535.71, 7492, 49151, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SKIL', 3, 1),
(664, 'TE282988506301', 'FRONT BUMPER', '2014-02-06', '2014-02-06', '13:23', '721K0001', 'Kamburupitiya Auto Service (pvt) Lltd', 1, 3130.0511, 4779.0736, 5757.92, 1001550, 49154, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(665, 'TE282946200129', 'STEERING GEAR BOX', '2014-02-13', '2014-02-13', '14:41', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 12063.96, 19449.036, 21610.04, 6988, 49393, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SGPV-2627', 3, 1),
(666, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-13', '12:38', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7558, 49383, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-9538', 3, 1),
(667, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-13', '2014-02-13', '12:38', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7558, 49383, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-9538', 3, 1),
(668, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-13', '2014-02-13', '12:38', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7558, 49383, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-9538', 3, 1),
(669, 'ZQ1020001', 'KEROSENE OIL', '2014-02-13', '2014-02-13', '12:38', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7558, 49383, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-9538', 3, 1),
(670, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-13', '2014-02-13', '12:38', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 58.6973, 203.927, 214.66, 7558, 49383, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-9538', 3, 1),
(671, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-13', '2014-02-13', '12:38', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 597.664, 629.12, 7558, 49383, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-9538', 3, 1),
(672, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-13', '2014-02-13', '12:38', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1525.149, 1605.42, 7558, 49383, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-9538', 3, 1),
(673, 'MN000094 004016', 'COTTON PIN', '2014-02-13', '2014-02-13', '12:38', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1.65, 4.3, 4.3, 7558, 49383, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-9538', 3, 1),
(674, 'TE885409041613', 'SET OF 1613 AIR FILTER CARTRID', '2014-02-13', '2014-02-13', '12:03', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 4232.4758, 6781.61, 6781.61, 6983, 49391, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLJ-0734', 3, 1),
(675, 'TE274789110108', 'ASSY SHOCK ABSORBER (M/S GAB) FOR SLPR.', '2014-02-03', '2014-02-03', '15:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 5577.74, 17143.02, 19047.8, 6920, 48866, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLJ-7667', 3, 1),
(676, 'TE264189106305', 'MUDGUARD RR LH 709', '2014-02-15', '2014-02-15', '16:22', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 2099.36, 3883.82, 3883.82, 6998, 48862, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLJ-4995', 3, 1),
(677, 'TE278082400101', 'ASSY.  WIPER  BLADE', '2014-02-13', '2014-02-13', '12:03', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 485.68, 1677.82, 1677.82, 6983, 49391, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLJ-0734', 3, 1),
(678, 'TE268426203802', 'SYNCHROCONE', '2014-02-06', '2014-02-07', '12:52', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 862.9475, 1304.523, 1449.47, 7501, 48867, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(679, 'OG1 619 PA0 505', 'DRIVE END SHIELD', '2014-02-06', '2014-02-06', '12:43', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 956.17, 1562.5, 1562.5, 6936, 49149, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(680, 'TE270254219909', 'DUAL  TEMRERATURE  T', '2014-02-06', '2014-02-06', '12:37', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 550.125, 988.51, 988.51, 6935, 49148, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', NULL, 3, 1),
(681, 'TE270254219909', 'DUAL  TEMRERATURE  T', '2014-02-06', '2014-02-06', '12:37', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 550.125, 988.51, 988.51, 6934, 49146, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(682, 'TE268426203804', 'SYNCHROCONE  2ND OD GEAR', '2014-02-06', '2014-02-07', '12:35', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 808.375, 1252.035, 1391.15, 7501, 48867, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(683, 'TE268426203802', 'SYNCHROCONE', '2014-02-06', '2014-02-07', '12:35', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 862.9475, 1304.523, 1449.47, 7501, 48867, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(684, 'TE279007146902', 'PLUG ( INJECTOR OVER FLOW )', '2014-02-13', '2014-02-13', '11:13', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 8.3912, 14.82, 14.82, 7550, 49377, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-1978', 3, 1),
(685, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-13', '11:12', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7563, 49379, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9874', 3, 1),
(686, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-13', '2014-02-13', '11:12', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 241.7491, 420.82, 420.82, 7563, 49379, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9874', 3, 1),
(687, 'TE551742700158', 'PARKING LEVER ASSY COMPLETE', '2014-02-13', '2014-02-13', '11:12', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 671.03, 1013.148, 1125.72, 7563, 49379, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9874', 3, 1),
(688, 'TE571709109903', 'FUEL FEED PUMP', '2014-02-13', '2014-02-13', '11:12', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1514.1517, 2524.392, 2804.88, 7563, 49379, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9874', 3, 1),
(689, 'TE571718139904', 'SPIN ON OIL FILTER', '2014-02-13', '2014-02-13', '11:12', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 209.2497, 306.198, 340.22, 7563, 49379, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9874', 3, 1),
(690, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-13', '2014-02-13', '11:12', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 431.2164, 1194.58, 1194.58, 7563, 49379, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9874', 3, 1),
(691, 'TE282932109207', 'WASHER 17 ID', '2014-02-13', '2014-02-13', '11:06', '821C9900', 'Cash Sales Retail -Matara Service -', 8, 22.683, 326.952, 344.16, 7554, 49375, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-1042', 3, 1),
(692, 'TE278650109909', 'PRESSURE CAP(NEW)', '2014-02-13', '2014-02-13', '11:05', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 359.08, 673.3695, 708.81, 6982, 49389, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLG-8075', 3, 1),
(693, 'TE278609999951', 'FUEL  STRAINER', '2014-02-13', '2014-02-13', '11:05', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 275.0344, 421.2395, 443.41, 6982, 49389, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLG-8075', 3, 1),
(694, 'TE278609119904', 'FUEL FILTER', '2014-02-13', '2014-02-13', '11:05', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 464.0531, 704.3775, 741.45, 6982, 49389, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLG-8075', 3, 1),
(695, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-13', '2014-02-13', '11:05', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 674.6612, 1038.2075, 1092.85, 6982, 49389, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLG-8075', 3, 1),
(696, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-13', '2014-02-13', '11:05', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 541.3676, 807.766, 850.28, 6982, 49389, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLG-8075', 3, 1),
(697, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-13', '11:04', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7549, 49374, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-7695', 3, 1),
(698, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-13', '2014-02-13', '11:04', '821C9900', 'Cash Sales Retail -Matara Service -', 0.5, 431.2164, 298.645, 298.645, 7549, 49374, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-7695', 3, 1),
(699, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-06', '2014-02-06', '12:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 262.9967, 435.48, 458.4, 7495, 49123, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLG-8029', 3, 1),
(700, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-06', '2014-02-06', '12:25', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 58.6973, 101.9635, 107.33, 7495, 49123, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLG-8029', 3, 1),
(701, 'TE282933403105', 'HUB BEARING INNER', '2014-02-06', '2014-02-06', '12:25', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 940.1488, 1505.1135, 1584.33, 7495, 49123, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLG-8029', 3, 1),
(702, 'TE269533403101', 'HUB BEARING OUTER', '2014-02-06', '2014-02-06', '12:25', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 605.8695, 984.143, 1035.94, 7495, 49123, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLG-8029', 3, 1),
(703, 'ZQ5555555P', 'COTTON WASTE', '2014-02-06', '2014-02-07', '12:20', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7497, 49132, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-2132', 3, 1),
(704, 'ZQ2010164', 'BRAKE FLUID DOT4[P-164]', '2014-02-06', '2014-02-07', '12:20', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 1321.44, 385.9375, 385.9375, 7497, 49132, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-2132', 3, 1),
(705, 'TE278229100110', 'CLUTCH MASTER CYL 19.05 DIA', '2014-02-06', '2014-02-06', '12:25', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2351.595, 3923.804, 4130.32, 6933, 49144, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLI-8631', 3, 1),
(706, 'ZQ5555555P', 'COTTON WASTE', '2014-02-06', '2014-02-06', '12:01', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7491, 49133, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGLD-6112', 3, 1),
(707, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-17', '10:55', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5.5222, 7.31, 7.31, 7581, 49337, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-2211', 3, 1),
(708, 'ZQ1020001', 'KEROSENE OIL', '2014-02-13', '2014-02-17', '10:55', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7581, 49337, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-2211', 3, 1),
(709, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-06', '2014-02-06', '12:01', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 262.9967, 458.4, 458.4, 7491, 49133, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGLD-6112', 3, 1),
(710, 'TE282949100150', 'ASSY RUBBER HANGER BS 111', '2014-02-06', '2014-02-06', '11:54', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 141.9804, 243.45, 243.45, 6932, 49143, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPV-4884', 3, 1),
(711, 'TE571724200102', 'ASSY.ENGINE MOUNT-C(REAR LEFT)', '2014-02-06', '2014-02-06', '11:53', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 2356.98, 3064.07, 4315.8, 3004622, 49142, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2488', 3, 1),
(712, 'TE279020125303', 'GASKET(WATER BY PASS)', '2014-02-13', '2014-02-17', '10:55', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 4.51, 7.82, 7.82, 7581, 49337, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-2211', 3, 1),
(713, 'TE252520156306', 'V-BELT  [1325MM]', '2014-02-06', '2014-02-06', '11:25', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 568.1, 961.05, 961.05, 6930, 49138, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'NPJM-2802', 3, 1),
(714, 'TE551754201610', 'ASSY FLOAT TANK UNIT', '2014-02-10', '2014-02-10', '13:54', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 1029.9, 1338.87, 2008.29, 3004632, 48141, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2328', 3, 1),
(715, 'TE265854709901', 'BLOWER RESISTOR SUBROS', '2014-02-06', '2014-02-06', '11:28', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 210.9878, 369.72, 369.72, 6931, 49137, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(716, 'TE252520156306', 'V-BELT  [1325MM]', '2014-02-06', '2014-02-06', '11:17', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 568.1, 961.05, 961.05, 6929, 49136, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'NPJM-2802', 3, 1),
(717, 'TE252520100116', 'ASSY,WATER PUMP', '2014-02-06', '2014-02-06', '11:17', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 6498.11, 11184.03, 11184.03, 6929, 49136, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'NPJM-2802', 3, 1),
(718, 'TE552330100113', 'ASSY.ACC CABLE', '2014-02-06', '2014-02-06', '11:02', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 474.55, 679.302, 754.78, 7494, 49134, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-8088', 3, 1),
(719, 'TE278801155302', 'CYL HEAD GASKET 1.7 mm', '2014-02-13', '2014-02-17', '10:55', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1515.086, 2565.68, 2565.68, 7581, 49337, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-2211', 3, 1),
(720, 'TE282946600108', '7451 / DRAG LINK', '2014-02-07', '2014-02-10', '09:09', '821I0502', 'Matara Service--COST OF SALES', -1, 2106.1637, -3670.09, -3670.09, 2012414, 49011, 'MATARA', 'X', 'B', 0, 'Anushka Gunawardena', 'ASG', 'Linken Weerarathne', 'LIW', 'Anushka Gunawardena', 'ASG', 'SPPR-5367', 3, 1),
(721, 'TE278801135301', '7451 / SUMP GASKET', '2014-02-07', '2014-02-10', '09:09', '821I0502', 'Matara Service--COST OF SALES', -1, 212.8761, -387.06, -387.06, 2012414, 49011, 'MATARA', 'X', 'B', 0, 'Anushka Gunawardena', 'ASG', 'Linken Weerarathne', 'LIW', 'Anushka Gunawardena', 'ASG', 'SPPR-5367', 3, 1),
(722, 'TE279018130101', '7451 / OIL FILTER ELEMENT', '2014-02-07', '2014-02-10', '09:09', '821I0502', 'Matara Service--COST OF SALES', -1, 396.3863, -629.12, -629.12, 2012414, 49011, 'MATARA', 'X', 'B', 0, 'Anushka Gunawardena', 'ASG', 'Linken Weerarathne', 'LIW', 'Anushka Gunawardena', 'ASG', 'SPPR-5367', 3, 1),
(723, 'ZQ2010123B', '7451 / DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-07', '2014-02-10', '09:09', '821I0502', 'Matara Service--COST OF SALES', -3, 409.65, -1599.9, -1599.9, 2012414, 49011, 'MATARA', 'X', 'B', 0, 'Anushka Gunawardena', 'ASG', 'Linken Weerarathne', 'LIW', 'Anushka Gunawardena', 'ASG', 'SPPR-5367', 3, 1),
(724, 'TE282946600108', 'DRAG LINK', '2014-02-02', '2014-02-06', '10:08', '102C9905', 'Diesel & Motor Engineering PLC', -1, 2106.1637, -3670.09, -3670.09, 4000069, 49011, 'MATARA', 'C', 'B', 0, 'Dumidu Pathiranage', 'PLP', NULL, NULL, 'Dumidu Pathiranage', 'PLP', NULL, 3, 1),
(725, 'TE278801135301', 'SUMP GASKET', '2014-02-02', '2014-02-06', '10:08', '102C9905', 'Diesel & Motor Engineering PLC', -1, 212.8761, -387.06, -387.06, 4000069, 49011, 'MATARA', 'C', 'B', 0, 'Dumidu Pathiranage', 'PLP', NULL, NULL, 'Dumidu Pathiranage', 'PLP', NULL, 3, 1),
(726, 'ZQS502-161', 'CABLE BAND BLACK PLASTIC', '2014-02-13', '2014-02-13', '10:44', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 17.86, 46.42, 46.42, 7550, 49377, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-1978', 3, 1),
(727, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-02', '2014-02-06', '10:08', '102C9905', 'Diesel & Motor Engineering PLC', -1, 396.3863, -629.12, -629.12, 4000069, 49011, 'MATARA', 'C', 'B', 0, 'Dumidu Pathiranage', 'PLP', NULL, NULL, 'Dumidu Pathiranage', 'PLP', NULL, 3, 1),
(728, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-02', '2014-02-06', '10:08', '102C9905', 'Diesel & Motor Engineering PLC', -3, 409.65, -1599.9, -1599.9, 4000069, 49011, 'MATARA', 'C', 'B', 0, 'Dumidu Pathiranage', 'PLP', NULL, NULL, 'Dumidu Pathiranage', 'PLP', NULL, 3, 1),
(729, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-06', '2014-02-06', '10:16', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 624.8208, 812.27, 1129.01, 3004621, 49130, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-9893', 3, 1),
(730, 'ZQ5555555P', 'COTTON WASTE', '2014-02-06', '2014-02-06', '10:08', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5.5222, 7.31, 7.31, 7488, 49128, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-1560', 3, 1),
(731, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-06', '2014-02-06', '10:08', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7488, 49128, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-1560', 3, 1),
(732, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-06', '2014-02-06', '10:08', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 423.4993, 680, 680, 7488, 49128, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-1560', 3, 1),
(733, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-06', '2014-02-06', '10:08', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 409.65, 1599.9, 1599.9, 7488, 49128, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-1560', 3, 1),
(734, 'TE282949100150', 'ASSY RUBBER HANGER BS 111', '2014-02-06', '2014-02-06', '10:08', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 141.9804, 231.2775, 243.45, 7488, 49128, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-1560', 3, 1),
(735, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-13', '10:44', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7550, 49377, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-1978', 3, 1),
(736, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-06', '2014-02-06', '10:08', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 597.664, 629.12, 7488, 49128, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-1560', 3, 1),
(737, 'TE270225103401', 'BUSH LOWER HSG', '2014-02-07', '2014-02-07', '11:41', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 16.71, 28.75, 28.75, 6943, 49131, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'SPLF-7062', 3, 1),
(738, 'TE285126207803', 'OIL SEAL MAIN SHAFT 38X48X8', '2014-02-07', '2014-02-07', '11:41', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 325.964, 539.91, 539.91, 6943, 49131, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'SPLF-7062', 3, 1),
(739, 'TE269026257710', 'OIL SEALINPU SHAFT)', '2014-02-07', '2014-02-07', '11:41', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 311.5674, 511.04, 511.04, 6943, 49131, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'SPLF-7062', 3, 1),
(740, 'TE279020127701', 'SEAL THERMOSTAT', '2014-02-06', '2014-02-06', '09:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 11.04, 17.8315, 18.77, 7495, 49123, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLG-8029', 3, 1),
(741, 'ZQ1020001', 'KEROSENE OIL', '2014-02-06', '2014-02-07', '09:36', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7501, 48867, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(742, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-13', '2014-02-13', '10:44', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 431.2164, 149.3225, 149.3225, 7550, 49377, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-1978', 3, 1),
(743, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-13', '2014-02-13', '10:44', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 262.9967, 458.4, 458.4, 7550, 49377, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-1978', 3, 1),
(744, 'DO5008', 'SINGLE FILAMENT (SMALL)', '2014-02-06', '2014-02-06', '09:23', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 20, 39.56, 39.56, 7487, 49122, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-6591', 3, 1),
(745, 'ZQ5555555P', 'COTTON WASTE', '2014-02-06', '2014-02-13', '09:20', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 3, 5.5222, 21.54, 21.93, 3004638, 49032, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-2664', 3, 1),
(746, 'TE272425400113', 'ASSY CLUTCH COVER 170DIA', '2014-02-06', '2014-02-13', '09:20', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 2164.464, 2825.01, 3621.89, 3004638, 49032, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-2664', 3, 1),
(747, 'TE272425200113', 'CLUTCH DISC 170 mm DIA', '2014-02-06', '2014-02-13', '09:20', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 2721.2534, 3605.26, 4640.16, 3004638, 49032, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-2664', 3, 1),
(748, 'ZQS892-00112', 'RADIATOR COOLENT', '2014-02-06', '2014-02-06', '09:19', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 606.717, 783.48, 783.48, 7495, 49123, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLG-8029', 3, 1),
(749, 'ZQ5555555P', 'COTTON WASTE', '2014-02-06', '2014-02-06', '09:19', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7495, 49123, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLG-8029', 3, 1),
(750, 'TE279020120102', 'ASSY THERMOSTAT-82 DEGSOT', '2014-02-06', '2014-02-06', '09:19', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 720.4426, 1188.6875, 1251.25, 7495, 49123, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLG-8029', 3, 1),
(751, 'DO7528', 'DOUBLE FILAMENT', '2014-02-06', '2014-02-06', '09:10', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 30, 78, 78, 7487, 49122, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLK-6591', 3, 1),
(752, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-06', '2014-02-06', '09:10', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 624.8208, 1129.01, 1129.01, 6928, 49129, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPR-9241', 3, 1),
(753, 'ZQMOBIL SUPER 15W40', 'MOBIL SUPER 15W40', '2014-02-06', '2014-02-06', '08:56', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 538.9615, 2089.29, 2089.29, 7489, 49124, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPKA-2744', 3, 1),
(754, 'ZQ5555555P', 'COTTON WASTE', '2014-02-06', '2014-02-06', '08:56', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7489, 49124, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPKA-2744', 3, 1),
(755, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-06', '2014-02-06', '08:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7489, 49124, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPKA-2744', 3, 1),
(756, 'ZQ5555555P', 'COTTON WASTE', '2014-02-06', '2014-02-06', '08:42', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 5.5222, 7.18, 7.31, 3004617, 48903, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', '01/N040022', 3, 1),
(757, 'TE265115100130', 'STARTER MOTOR', '2014-02-06', '2014-02-06', '08:42', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 32287.66, 41973.96, 55718.55, 3004617, 48903, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', '01/N040022', 3, 1),
(758, 'TE272425400140', '200 DIA. CLUTCH COVER ASSY.(TCIC) - VALE', '2014-02-06', '2014-02-06', '08:39', '721S0002', 'Saman Service Centre', 1, 3289.97, 4818.5484, 5805.48, 1001549, 49126, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(759, 'TE272425200147', '200 DIA. ASSY. CLUTCH DISC-VALEO', '2014-02-06', '2014-02-06', '08:39', '721S0002', 'Saman Service Centre', 1, 4390.8255, 6365.9091, 7669.77, 1001549, 49126, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(760, 'TE270225600101', 'ASSY.CL.RELS.BRG.WITH SLEEVE', '2014-02-06', '2014-02-06', '08:39', '721S0002', 'Saman Service Centre', 1, 1318.856, 2785.6294, 3356.18, 1001549, 49126, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(761, 'TE265482400177', 'ASSY WIPER KIT', '2014-02-05', '2014-02-05', '18:33', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 3595.92, 5570.1, 6189, 6927, 49121, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPS-7818', 3, 1),
(762, 'DO7528', 'DOUBLE FILAMENT', '2014-02-05', '2014-02-05', '17:55', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 30, 39, 39, 7484, 49079, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-7259', 3, 1),
(763, 'TE278824200105', 'ASSY,ENG,MOUNT REAR', '2014-02-05', '2014-02-05', '17:17', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 1657.49, 5533.938, 6148.82, 6926, 49120, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLC-8419', 3, 1),
(764, 'TE278824100105', 'ENG MOUNT FR', '2014-02-05', '2014-02-05', '17:17', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 945.82, 1351.845, 1502.05, 6926, 49120, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLC-8419', 3, 1),
(765, 'TE282932109207', 'WASHER 17 ID', '2014-02-13', '2014-02-13', '10:32', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 22.683, 40.869, 43.02, 7554, 49375, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-1042', 3, 1),
(766, 'ZQ5555555P', 'COTTON WASTE', '2014-02-05', '2014-02-07', '16:56', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7506, 49090, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKT-9143', 3, 1),
(767, 'VE580725600105', 'ASSY CLUTCH RELEASE BEARING', '2014-02-05', '2014-02-07', '16:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1036.34, 1662.5, 1750, 7506, 49090, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKT-9143', 3, 1),
(768, 'VE580725103403', 'UPPER BUSH (ON HOUSING)', '2014-02-05', '2014-02-07', '16:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 11.0329, 16.511, 17.38, 7506, 49090, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKT-9143', 3, 1),
(769, 'TE269946600111', 'ASSY TIE ROD RH', '2014-01-30', '2014-02-10', '12:13', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 2, 1994.85, 4388.68, 7082.02, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPD-8404', 3, 1),
(770, 'VE580725103402', 'BUSH LOWER (ON HOUSING)', '2014-02-05', '2014-02-07', '16:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 11.0443, 16.8625, 17.75, 7506, 49090, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKT-9143', 3, 1),
(771, 'VE580725000102', 'ASSY 160 DIA CLUTCH DISC & PRPLATE', '2014-02-05', '2014-02-07', '16:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 3633.0733, 5728.044, 6029.52, 7506, 49090, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKT-9143', 3, 1),
(772, 'TE282949100150', 'ASSY RUBBER HANGER BS 111', '2014-02-13', '2014-02-13', '10:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 141.9804, 231.2775, 243.45, 7554, 49375, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-1042', 3, 1);
INSERT INTO `tbl_all_sales` (`all_sales_id`, `part_no`, `description`, `date_decar`, `date_edit`, `time`, `acc_no`, `customer_name`, `qty`, `cost_price`, `selling_val`, `retail_val`, `invoice`, `wip`, `location`, `in_s`, `de`, `disc`, `s_e_name`, `s_e_code`, `authorised_by`, `authorised_by_code`, `creating_op`, `creating_op_code`, `vehicle_reg_no`, `area_id`, `status`) VALUES
(773, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-13', '2014-02-15', '09:52', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 624.8208, 796.06, 1129.01, 3004642, 49372, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPW-5817', 3, 1),
(774, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-13', '2014-02-15', '09:39', '521I0502', 'Matara Vehicle Sales-COST OF SALES', 0.25, 431.2164, 118.585, 149.3225, 2012446, 49378, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPX-0038', 3, 1),
(775, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-13', '2014-02-15', '09:39', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 624.8208, 796.06, 1129.01, 3004643, 49378, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPX-0038', 3, 1),
(776, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-13', '09:29', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7554, 49375, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-1042', 3, 1),
(777, 'TE281872500112', 'ASSY POWER WINDOW REGULATOR RH', '2014-02-05', '2014-02-05', '16:39', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 4519.96, 5875.95, 8043.09, 3004614, 49078, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPW-1361', 3, 1),
(778, 'TE282988506301', 'FRONT BUMPER', '2014-02-05', '2014-02-05', '16:20', '721A0003', 'D M H Auto Vision', 1, 3130.0511, 4779.0736, 5757.92, 1001548, 49117, 'MATARA', 'X', 'A', 17, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', NULL, 3, 1),
(779, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-13', '2014-02-13', '09:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7554, 49375, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-1042', 3, 1),
(780, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-13', '2014-02-13', '09:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 423.4993, 680, 680, 7554, 49375, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-1042', 3, 1),
(781, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-13', '2014-02-13', '09:29', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7554, 49375, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-1042', 3, 1),
(782, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-13', '2014-02-13', '09:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 597.664, 629.12, 7554, 49375, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-1042', 3, 1),
(783, 'TE252701130141', 'OIL SUMP GASKET KIT', '2014-02-13', '2014-02-13', '15:09', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 531.23, 841.29, 841.29, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'WPLK-3522', 3, 1),
(784, 'TE252723110103', 'STEERING ZF PUMP', '2014-02-13', '2014-02-13', '15:09', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 15057.14, 27113.83, 27113.83, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'WPLK-3522', 3, 1),
(785, 'DO7506', 'FLASHER LAMP', '2014-02-05', '2014-02-05', '15:46', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 30, 39, 39, 7482, 49083, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLL-0267', 3, 1),
(786, 'DO5008', 'SINGLE FILAMENT (SMALL)', '2014-02-05', '2014-02-05', '15:46', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 20, 39.56, 39.56, 7482, 49083, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLL-0267', 3, 1),
(787, 'TE270254219909', 'DUAL  TEMRERATURE  T', '2014-02-05', '2014-02-05', '15:38', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 550.125, 988.51, 988.51, 6925, 49115, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPS-6976', 3, 1),
(788, 'DO7506', 'FLASHER LAMP', '2014-02-05', '2014-02-11', '15:37', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 30, 117, 117, 7531, 49084, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLB-6668', 3, 1),
(789, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-05', '2014-02-05', '15:26', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 423.4993, 1360, 1360, 7484, 49079, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-7259', 3, 1),
(790, 'TE264143700127', 'AIR DRIER R/KIT', '2014-02-05', '2014-02-11', '15:09', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2024.98, 3335.222, 3510.76, 7531, 49084, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-6668', 3, 1),
(791, 'TE265446303416', 'BUSH', '2014-01-30', '2014-02-10', '12:13', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 1, 600.75, 643.46, 1033.96, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPD-8404', 3, 1),
(792, 'TE263243700117', 'DESSICANT  CARTRIDGE', '2014-02-05', '2014-02-11', '15:09', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 6615.72, 10805.604, 11374.32, 7531, 49084, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-6668', 3, 1),
(793, 'ZQ5555555P', 'COTTON WASTE', '2014-02-05', '2014-02-05', '15:06', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7482, 49083, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0267', 3, 1),
(794, 'TE278609999920', 'STRAINER FUEL', '2014-02-05', '2014-02-05', '15:06', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.13, 412.18, 412.18, 7482, 49083, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0267', 3, 1),
(795, 'TE278609119904', 'FUEL FILTER', '2014-02-05', '2014-02-05', '15:06', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 464.0531, 741.45, 741.45, 7482, 49083, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0267', 3, 1),
(796, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-05', '2014-02-05', '15:06', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 674.6612, 1092.85, 1092.85, 7482, 49083, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0267', 3, 1),
(797, 'TE278607989915', 'DRAIN  VALVE', '2014-02-05', '2014-02-05', '15:06', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 285.7365, 475.43, 475.43, 7482, 49083, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0267', 3, 1),
(798, 'TE265346600125', 'ASSY CENTER LINK', '2014-01-30', '2014-02-10', '12:13', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 1, 4818.07, 5299.88, 9885.33, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPD-8404', 3, 1),
(799, 'ZQ5555555P', 'COTTON WASTE', '2014-02-05', '2014-02-05', '15:02', '531I0501', 'Colombo Vehicle Sales-FREE SERVICE', 1, 5.5222, 6.07, 7.31, 2012366, 49082, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-7180', 3, 1),
(800, 'OG85224WT-85024', 'WD40 ANTI RUST 412ML', '2014-01-24', '2014-02-03', '09:12', '821I0502', 'Matara Service--COST OF SALES', 1, 642.86, 707.15, 707.15, 2012347, 47918, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'GENARAL', 3, 1),
(801, 'ZQS892-00112', 'RADIATOR COOLENT', '2014-02-13', '2014-02-17', '08:45', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 729.2336, 1033.04, 1033.04, 7581, 49337, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPR-2211', 3, 1),
(802, 'TE281881100119', 'ORVM ASSEMBLY TIP TAP TYPE-RH-RH', '2014-02-05', '2014-02-05', '15:02', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 7871.555, 10233.02, 14489.54, 3004615, 49082, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-7180', 3, 1),
(803, 'TE281881100118', 'ORVM ASSEMBLY TIP TAP TYPE-LH-SANDHAR-RH', '2014-02-05', '2014-02-05', '15:02', '821C9901', 'Cash Sales Retail -Matara Service -         VAT', 1, 4118.11, 7593.93, 7593.93, 7479, 49082, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-7180', 3, 1),
(804, 'ZQ5420104/1', 'FUSE 15AM', '2014-02-05', '2014-02-11', '15:00', '821C9900', 'Cash Sales Retail -Matara Service -', 6, 10, 78, 78, 7531, 49084, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-6668', 3, 1),
(805, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-17', '08:45', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7581, 49337, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPR-2211', 3, 1),
(806, 'ZQ5450110', 'REVERSE HORN', '2014-02-05', '2014-02-05', '14:35', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 1118.75, 1454.38, 1454.38, 3004610, 49075, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLL-0650', 3, 1),
(807, 'TE279020127701', 'SEAL THERMOSTAT', '2014-02-13', '2014-02-17', '08:45', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 11.04, 18.77, 18.77, 7581, 49337, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPR-2211', 3, 1),
(808, 'TE279020120102', 'ASSY THERMOSTAT-82 DEGSOT', '2014-02-13', '2014-02-17', '08:45', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 720.4426, 1251.25, 1251.25, 7581, 49337, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPR-2211', 3, 1),
(809, 'OG1 617 014 138', 'CARBON BRUSH SET', '2014-01-10', '2014-02-06', '16:48', '821P0015', 'Mr CRA Prathapasinghe', 1, 643.65, 1071.43, 1071.43, 1000362, 48301, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'GBH388', 3, 1),
(810, 'TE282946600108', 'DRAG LINK', '2014-01-20', '2014-02-05', '15:15', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', -1, 2116.7312, -3670.09, -3670.09, 4000300, 48509, 'MATARA', 'C', 'A', 0, 'Chamal Wickramarchch', 'CNW', NULL, NULL, 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(811, 'ZQ5555555P', 'COTTON WASTE', '2014-02-13', '2014-02-13', '08:22', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7555, 49373, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPT-2503', 3, 1),
(812, 'ZQ5555555P', 'COTTON WASTE', '2014-02-05', '2014-02-05', '12:34', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7478, 49075, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLL-0650', 3, 1),
(813, 'TEF002H20308', 'PRE FILTER SPIN ON PRIMARY', '2014-02-05', '2014-02-05', '12:34', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 870.94, 1375.31, 1375.31, 7478, 49075, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLL-0650', 3, 1),
(814, 'TEF002H20306', 'FINE  FILTER  ASSY.', '2014-02-05', '2014-02-05', '12:34', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 793.09, 1268.48, 1268.48, 7478, 49075, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLL-0650', 3, 1),
(815, 'OG1 610 290 066', 'RADIAL LIP TYPE 0', '2014-01-10', '2014-02-06', '15:41', '821P0015', 'Mr CRA Prathapasinghe', 1, 414.65, 669.64, 669.64, 1000362, 48301, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'GBH388', 3, 1),
(816, 'ZQ5555555P', 'COTTON WASTE', '2014-02-05', '2014-02-05', '12:13', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 5.5222, 7.18, 7.31, 3004611, 49098, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-5970', 3, 1),
(817, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-05', '2014-02-05', '12:13', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 624.8208, 812.27, 1129.01, 3004611, 49098, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-5970', 3, 1),
(818, 'OG1 610 119 012', 'SPRING RETAINING RIN', '2014-01-10', '2014-02-06', '15:41', '821P0015', 'Mr CRA Prathapasinghe', 1, 63.81, 803.57, 803.57, 1000362, 48301, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'GBH388', 3, 1),
(819, 'OG1 615 500 303', 'FAN COVER', '2014-01-10', '2014-02-06', '15:41', '821P0015', 'Mr CRA Prathapasinghe', 1, 387.03, 500, 500, 1000362, 48301, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'GBH388', 3, 1),
(820, 'ZQ5555555P', 'COTTON WASTE', '2014-01-10', '2014-02-06', '15:41', '821P0015', 'Mr CRA Prathapasinghe', 1, 5.5759, 7.31, 7.31, 1000362, 48301, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'GBH388', 3, 1),
(821, 'OG1 619 P06 002', 'ARMATURE', '2014-01-10', '2014-02-06', '15:41', '821P0015', 'Mr CRA Prathapasinghe', 1, 5253.54, 9821.43, 9821.43, 1000362, 48301, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'GBH388', 3, 1),
(822, 'OG1 611 015 050', 'SEALING FRAME', '2014-01-10', '2014-02-06', '15:41', '821P0015', 'Mr CRA Prathapasinghe', 1, 174.77, 446.43, 446.43, 1000362, 48301, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'GBH388', 3, 1),
(823, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-13', '2014-02-13', '08:22', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7555, 49373, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPT-2503', 3, 1),
(824, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-13', '2014-02-13', '08:22', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7555, 49373, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPT-2503', 3, 1),
(825, 'ZQ1020001', 'KEROSENE OIL', '2014-02-13', '2014-02-13', '08:22', '821C9900', 'Cash Sales Retail -Matara Service -', 0.5, 109.28, 55, 55, 7555, 49373, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPT-2503', 3, 1),
(826, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-13', '2014-02-13', '08:22', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 58.6973, 203.927, 214.66, 7555, 49373, 'MATARA', 'X', 'B', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPT-2503', 3, 1),
(827, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-13', '2014-02-13', '08:22', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 597.664, 629.12, 7555, 49373, 'MATARA', 'X', 'B', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPT-2503', 3, 1),
(828, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-13', '2014-02-13', '08:22', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1525.149, 1605.42, 7555, 49373, 'MATARA', 'X', 'B', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPT-2503', 3, 1),
(829, 'VE283415209910', 'H T CABLE', '2014-02-05', '2014-02-05', '12:01', '000W9970', 'Tata PCBU Vehicles  Warranty Claims-A/C - New  -  107T0005 ------------>tranfer to 151T0202', 2, 439.7254, 1352.04, 1352.04, 3004612, 49091, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8255', 3, 1),
(830, 'MN000094 004016', 'COTTON PIN', '2014-02-13', '2014-02-13', '08:22', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1.65, 4.3, 4.3, 7555, 49373, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPT-2503', 3, 1),
(831, 'ZG2 600 905 018', '627 EE BEARING', '2014-02-05', '2014-02-05', '12:00', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 214.5041, 625, 625, 7476, 49102, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'GST85', 3, 1),
(832, 'OG85224WT-85024', 'WD40 ANTI RUST 412ML', '2014-01-03', '2014-02-03', '14:32', '821I0502', 'Matara Service--COST OF SALES', 1, 642.86, 835.9, 575, 2012347, 47918, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'GENARAL', 3, 1),
(833, 'TE278803990113', 'PISTON RING SET', '2014-02-05', '2014-02-05', '11:32', '721A0006', 'Anura Motors', 1, 1929.3421, 2810.3385, 3385.95, 1001547, 49100, 'MATARA', 'X', 'A', 17, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', NULL, 3, 1),
(834, 'TE278650100339', 'RADIATOR RESERVE WATER TANK', '2014-02-05', '2014-02-05', '11:27', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 4966.45, 7746.363, 8607.07, 6924, 49101, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLH-6319', 3, 1),
(835, 'TE278801135301', 'SUMP GASKET', '2014-02-05', '2014-02-05', '11:16', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 212.8761, 367.707, 387.06, 7475, 49094, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-7168', 3, 1),
(836, 'TE278801155302', 'CYL HEAD GASKET 1.7 mm', '2014-02-05', '2014-02-05', '11:32', '721A0006', 'Anura Motors', 1, 1510.684, 2129.5144, 2565.68, 1001547, 49100, 'MATARA', 'X', 'A', 17, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', NULL, 3, 1),
(837, 'TE254705116301', 'TIMING BELT', '2014-02-05', '2014-02-05', '11:32', '721A0006', 'Anura Motors', 1, 2258.9715, 3209.1203, 3866.41, 1001547, 49100, 'MATARA', 'X', 'A', 17, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', NULL, 3, 1),
(838, 'TE886325010002', 'GB 600 PRESSURE PLATE', '2014-02-05', '2014-02-05', '11:32', '721A0006', 'Anura Motors', 1, 19298.04, 27607.4185, 33261.95, 1001547, 49100, 'MATARA', 'X', 'A', 17, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', NULL, 3, 1),
(839, 'TE282954409903', 'WHITE REFLECTER', '2014-02-05', '2014-02-05', '10:49', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 87.0469, 290.8, 290.8, 6923, 49099, 'MATARA', 'X', 'A', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPPR-0965', 3, 1),
(840, 'TE282932107704', 'TIP INSERT', '2014-02-05', '2014-02-05', '10:51', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 50.0483, 302.112, 335.68, 7483, 49081, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPP-1424', 3, 1),
(841, 'TE282932407703', 'CENTRE PAD', '2014-02-05', '2014-02-05', '10:51', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 53.1517, 82.287, 91.43, 7483, 49081, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPP-1424', 3, 1),
(842, 'TE282930100132', 'ACC,CABLE', '2014-02-05', '2014-02-05', '10:51', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 602.3578, 880.173, 977.97, 7483, 49081, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPP-1424', 3, 1),
(843, 'TE250526257808', 'SEAL RING RADIAL', '2014-02-12', '2014-02-17', '18:41', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 92.92, 120.8, 193.5, 3004649, 49335, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPNB-5091', 3, 1),
(844, 'TE264125400105', '280DIA.CLUTCH COVER ASSY.(REINF)-LuK IND', '2014-02-12', '2014-02-13', '18:16', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 6960.65, 9915.046, 11664.76, 7547, 49335, 'MATARA', 'X', 'B', 15, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPNB-5091', 3, 1),
(845, 'TE264033200122', 'ASSY TIE ROD END {R/H}', '2014-02-05', '2014-02-05', '10:34', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 1196.2583, 1555.14, 2065.78, 3004613, 49077, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-6431', 3, 1),
(846, 'ZQMOBIL SUPER 15W40', 'MOBIL SUPER 15W40', '2014-02-05', '2014-02-05', '10:33', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 3, 538.9615, 1778.58, 2089.29, 2012356, 49091, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-8255', 3, 1),
(847, 'ZQ5555555P', 'COTTON WASTE', '2014-02-05', '2014-02-05', '10:33', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 2, 5.5222, 12.14, 14.62, 2012356, 49091, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-8255', 3, 1),
(848, 'VE570518130102', 'ASSY OIL FILTER', '2014-02-05', '2014-02-05', '10:33', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 1, 255.2508, 280.78, 467.23, 2012356, 49091, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-8255', 3, 1),
(849, 'VE283447609903', 'FUEL FILTER', '2014-02-05', '2014-02-05', '10:33', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 1, 160.37, 176.41, 279.3, 2012356, 49091, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-8255', 3, 1),
(850, 'TE271942100115', 'KIT PAD ASSY.WITH PACKING', '2014-02-12', '2014-02-12', '17:56', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 3158.85, 5593.64, 5593.64, 6981, 49370, 'MATARA', 'X', 'A', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', NULL, 3, 1),
(851, 'VE28348870010121', 'CED COATED ASSY PANEL HOOD', '2014-02-12', '2014-02-12', '16:54', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 8804.89, 17788.04, 17788.04, 6980, 49367, 'MATARA', 'X', 'A', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8972', 3, 1),
(852, 'TE265832100134', 'PIVOT BUSH FRT SUSP L/LIN', '2014-02-12', '2014-02-12', '16:56', '721S0002', 'Saman Service Centre', 8, 389.8208, 4325.5616, 5211.52, 1001556, 49368, 'MATARA', 'X', 'A', 17, 'Thilina Swarnabandu', 'TSS', 'Priyantha kulathunga', 'PLG', 'Thilina Swarnabandu', 'TSS', NULL, 3, 1),
(853, 'ZQ5555555P', 'COTTON WASTE', '2014-02-05', '2014-02-06', '10:26', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 3, 5.5222, 21.54, 21.93, 3004619, 49086, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(854, 'TE264140106703', 'HUB PIN REAR (S-CAM)', '2014-02-12', '2014-02-12', '16:56', '721S0002', 'Saman Service Centre', 2, 133.44, 360.1702, 433.94, 1001556, 49368, 'MATARA', 'X', 'A', 17, 'Thilina Swarnabandu', 'TSS', 'Priyantha kulathunga', 'PLG', 'Thilina Swarnabandu', 'TSS', NULL, 3, 1),
(855, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-05', '2014-02-05', '10:26', '821C9900', 'Cash Sales Retail -Matara Service -', 5.5, 409.65, 2933.15, 2933.15, 7485, 49086, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(856, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-05', '2014-02-05', '10:26', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7485, 49086, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(857, 'ZQ1020001', 'KEROSENE OIL', '2014-02-05', '2014-02-06', '10:26', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 109.28, 142.06, 142.06, 3004619, 49086, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(858, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-12', '2014-02-13', '16:22', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 593.2978, 850, 850, 7548, 49330, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(859, 'TE278609999951', 'FUEL  STRAINER', '2014-02-12', '2014-02-13', '16:22', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 275.0344, 399.069, 443.41, 7548, 49330, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(860, 'TE264182409904', 'ASSY WIPER BLADE', '2014-02-12', '2014-02-13', '16:17', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 382.34, 1475.54, 1475.54, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLK-3522', 3, 1),
(861, 'ZQMOBILLUBSAE75W901L', 'MOBIL 75W90 (NANO GEAR )', '2014-02-12', '2014-02-12', '16:10', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 1698.0958, 3311.67, 3311.67, 7545, 49358, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8326', 3, 1),
(862, 'TE286409130131', 'ASSY. AIR INTAKE PIPE (WITH CLAMP)', '2014-02-05', '2014-02-06', '10:26', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 567.7308, 738.05, 933.56, 3004619, 49086, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(863, 'DO5008', 'SINGLE FILAMENT (SMALL)', '2014-02-12', '2014-02-13', '15:55', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 20, 39.56, 39.56, 7548, 49330, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(864, 'TE281854209931', 'NEW TEMP SESNSOR ED SUPERACE-VENTURE', '2014-02-05', '2014-02-06', '10:26', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 628.39, 816.91, 1099.1, 3004619, 49086, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(865, 'DO5008', 'SINGLE FILAMENT (SMALL)', '2014-02-12', '2014-02-13', '15:53', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 20, 39.56, 39.56, 7548, 49330, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(866, 'TE281849200147', 'ASSY.FRONT PIPE WITH FLEXIBLE BELLOW', '2014-02-05', '2014-02-06', '10:26', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 4829.73, 6278.65, 8846.55, 3004619, 49086, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(867, 'TE281829100145', 'ASSY. CLUTCH CABLE', '2014-02-05', '2014-02-06', '10:26', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 1030.899, 1340.17, 1821.26, 3004619, 49086, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(868, 'TE278850105803', 'HOSE THERMOSTAT', '2014-02-12', '2014-02-12', '15:29', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 83.63, 123.5645, 145.37, 6979, 49362, 'MATARA', 'X', 'A', 15, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLD-5268', 3, 1),
(869, 'TE279018130106', 'DIESEL OIL FILTER', '2014-02-05', '2014-02-05', '10:26', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 499.2567, 817.407, 908.23, 7485, 49086, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(870, 'TE279014117101', 'FLANGE (FOR EXHAUST MANIFOLD)', '2014-02-05', '2014-02-06', '10:26', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 117.993, 153.39, 203.33, 3004619, 49086, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(871, 'TE279014115803', 'HOSE(310)(T-CONNECTOR TO SOLENOID VALVE)', '2014-02-05', '2014-02-06', '10:26', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 30.197, 39.26, 49.13, 3004619, 49086, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(872, 'TE279014115314', 'GASKET (FOR FLANGE ON EXH.MANIFOLD', '2014-02-05', '2014-02-06', '10:26', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 24.3007, 31.59, 54.79, 3004619, 49086, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(873, 'ZQMOBIL SUPER 15W40', 'MOBIL SUPER 15W40', '2014-02-12', '2014-02-12', '15:10', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 538.9615, 2089.29, 2089.29, 7545, 49358, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8326', 3, 1),
(874, 'ZQ5555555P', 'COTTON WASTE', '2014-02-12', '2014-02-12', '15:10', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7545, 49358, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8326', 3, 1),
(875, 'VE570518130102', 'ASSY OIL FILTER', '2014-02-12', '2014-02-12', '15:10', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.2508, 467.23, 467.23, 7545, 49358, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8326', 3, 1),
(876, 'VE570509130106', 'ASSY AIR FILTER ELEMENT', '2014-02-12', '2014-02-12', '15:10', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 622.43, 1027.64, 1027.64, 7545, 49358, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8326', 3, 1),
(877, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-05', '2014-02-05', '10:26', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1444.878, 1605.42, 7485, 49086, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-7259', 3, 1),
(878, 'VE283447609903', 'FUEL FILTER', '2014-02-12', '2014-02-12', '15:10', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 160.37, 279.3, 279.3, 7545, 49358, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8326', 3, 1),
(879, 'ZQ5555555P', 'COTTON WASTE', '2014-02-05', '2014-02-05', '09:46', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 5.5222, 7.18, 7.31, 3004609, 49093, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-9000', 3, 1),
(880, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-05', '2014-02-05', '09:46', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 624.8208, 812.27, 1129.01, 3004609, 49093, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-9000', 3, 1),
(881, 'ZQ5555555P', 'COTTON WASTE', '2014-02-05', '2014-02-05', '09:42', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7474, 49077, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-6431', 3, 1),
(882, 'TE252709130329', 'ELEM. AIR CLEANER (PRIMARY)', '2014-02-05', '2014-02-05', '09:42', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 2433.82, 3163.97, 3986.28, 3004613, 49077, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-6431', 3, 1),
(883, 'ZQS890-323', 'SILICON SPECIAL250 BLACK', '2014-02-12', '2014-02-12', '14:18', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 883.93, 1149.11, 1149.11, 3004634, 49324, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-4242', 3, 1),
(884, 'TE278801135301', 'SUMP GASKET', '2014-02-12', '2014-02-12', '14:18', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 212.8761, 276.74, 387.06, 3004634, 49324, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-4242', 3, 1),
(885, 'TE252701155302', 'GASKET TAPPET COVER', '2014-02-05', '2014-02-05', '09:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 361.5506, 626.58, 626.58, 7474, 49077, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-6431', 3, 1),
(886, 'TE269026107202', 'MAGNETIC DRAIN PLUG', '2014-02-12', '2014-02-12', '14:18', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 92.8267, 120.67, 160.51, 3004634, 49324, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-4242', 3, 1),
(887, 'TE282932407701', 'TIP INSERT(REAR SPRING)', '2014-02-05', '2014-02-05', '10:51', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 72.6337, 331.803, 368.67, 7483, 49081, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPP-1424', 3, 1),
(888, 'TE270254219909', 'DUAL  TEMRERATURE  T', '2014-02-05', '2014-02-05', '10:51', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 550.125, 889.659, 988.51, 7483, 49081, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPP-1424', 3, 1),
(889, 'ZQACE262', 'ACE GEAR LEVER BALL JOINT', '2014-02-05', '2014-02-05', '10:51', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 185, 481, 481, 7483, 49081, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPP-1424', 3, 1),
(890, 'TE285126207803', 'OIL SEAL MAIN SHAFT 38X48X8', '2014-02-05', '2014-02-05', '10:51', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 325.964, 485.919, 539.91, 7483, 49081, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPP-1424', 3, 1),
(891, 'ZQ2010164', 'BRAKE FLUID DOT4[P-164]', '2014-02-12', '2014-02-13', '13:42', '821C9900', 'Cash Sales Retail -Matara Service -', 0.75, 1325.6267, 1157.8125, 1157.8125, 7547, 49335, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPNB-5091', 3, 1),
(892, 'TE279020127701', 'SEAL THERMOSTAT', '2014-02-05', '2014-02-05', '10:51', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 11.04, 16.893, 18.77, 7483, 49081, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPP-1424', 3, 1),
(893, 'TE281854509911', 'POWER WINDOW SWITCH', '2014-02-12', '2014-02-12', '12:09', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1292.46, 2209.88, 2209.88, 6977, 47131, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Priyantha kulathunga', 'PLG', 'Chamal Wickramarchch', 'CNW', 'SPPT-1827', 3, 1),
(894, 'TE278609999951', 'FUEL  STRAINER', '2014-02-12', '2014-02-13', '12:43', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 275.0344, 443.41, 443.41, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLK-3522', 3, 1),
(895, 'TE281882409913', 'WIPER BLADE CO-DRIVER', '2014-02-12', '2014-02-12', '12:40', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 605.68, 1072.7115, 1129.17, 7543, 49332, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-1827', 3, 1),
(896, 'TE281882409912', 'WIPER ARM DRIVER-BCS', '2014-02-12', '2014-02-12', '12:40', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 742.53, 1206.2435, 1269.73, 7543, 49332, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-1827', 3, 1),
(897, 'TE264129200101', 'ASSY.CLUTCH BOOSTER 90DIA', '2014-02-12', '2014-02-13', '12:35', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 3691.05, 5322.7935, 6262.11, 7547, 49335, 'MATARA', 'X', 'B', 15, 'Melaka Pushpasara', 'MLX', 'Priyantha kulathunga', 'PLG', 'Melaka Pushpasara', 'MLX', 'SPNB-5091', 3, 1),
(898, 'TT0009973446', 'OIL SEAL', '2014-02-12', '2014-02-13', '12:33', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 181.6491, 566.874, 629.86, 7548, 49330, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(899, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-05', '2014-02-05', '09:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7472, 49080, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-3987', 3, 1),
(900, 'TE254701155325', 'GASKET CAP CY/HD COVER TC', '2014-02-12', '2014-02-12', '12:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 8.952, 15.57, 15.57, 7546, 49336, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-0419', 3, 1),
(901, 'TE282940306906', 'CLAMP  SPARE WHEEL MTG', '2014-02-12', '2014-02-12', '12:27', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 76.06, 130.79, 130.79, 6978, 49354, 'MATARA', 'X', 'A', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-2144', 3, 1),
(902, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-05', '2014-02-05', '09:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 423.4993, 680, 680, 7472, 49080, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-3987', 3, 1),
(903, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-05', '2014-02-05', '09:20', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 409.65, 1599.9, 1599.9, 7472, 49080, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-3987', 3, 1),
(904, 'TE282940306501', 'HEX NUT', '2014-02-12', '2014-02-12', '12:27', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 75.2, 129.42, 129.42, 6978, 49354, 'MATARA', 'X', 'A', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPP-2144', 3, 1),
(905, 'TE282932407703', 'CENTRE PAD', '2014-02-05', '2014-02-05', '09:20', '521I0502', 'Matara Vehicle Sales-COST OF SALES', 1, 53.1517, 58.47, 91.43, 2012355, 49080, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-3987', 3, 1),
(906, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-05', '2014-02-05', '09:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 597.664, 629.12, 7472, 49080, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-3987', 3, 1),
(907, 'ZQ25765420', 'RELAY', '2014-02-12', '2014-02-12', '13:34', '531I0502', 'Colombo Vehicle Sales-COST OF SALES', 1, 495, 643.5, 643.5, 2012430, 49327, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-2168', 3, 1),
(908, 'TE282929100130', 'ASSY.  CLUTCH  CABLE', '2014-02-05', '2014-02-05', '09:12', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 523.5416, 915.88, 915.88, 6922, 49089, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-6639', 3, 1),
(909, 'TE268426207903', 'MAIN SHAFT', '2014-02-06', '2014-02-07', '09:33', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 4349.785, 6805.755, 7561.95, 7501, 48867, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(910, 'TEF002H20308', 'PRE FILTER SPIN ON PRIMARY', '2014-02-12', '2014-02-13', '11:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 870.94, 1375.31, 1375.31, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLK-3522', 3, 1),
(911, 'TEF002H20306', 'FINE  FILTER  ASSY.', '2014-02-12', '2014-02-13', '11:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 793.09, 1268.48, 1268.48, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLK-3522', 3, 1),
(912, 'ZQ5555555P', 'COTTON WASTE', '2014-02-05', '2014-02-07', '08:48', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7501, 48867, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(913, 'TE268426203821', 'SYNCHROCONE', '2014-02-05', '2014-02-07', '08:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 852.5525, 1283.382, 1425.98, 7501, 48867, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(914, 'TE268426203804', 'SYNCHROCONE  2ND OD GEAR', '2014-02-05', '2014-02-07', '08:48', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 808.375, 2504.07, 2782.3, 7501, 48867, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(915, 'TE268226253102', 'THRUST BEARING DRIVE SHAFT', '2014-02-05', '2014-02-07', '08:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 196.77, 287.073, 318.97, 7501, 48867, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'R51323', 3, 1),
(916, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-05', '2014-02-05', '08:43', '521I0502', 'Matara Vehicle Sales-COST OF SALES', 0.25, 593.2978, 163.1575, 212.5, 2012354, 49076, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPX-0791', 3, 1),
(917, 'TE252718130132', 'LUBE OIL FILTER-SPIN ON', '2014-02-05', '2014-02-05', '08:33', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 920.0048, 1444.44, 1444.44, 7474, 49077, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-6431', 3, 1),
(918, 'TE282972502301', 'GLASS FRONT DOORLH', '2014-02-12', '2014-02-12', '11:36', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 1344.76, 2642.41, 2642.41, 6976, 49350, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPS-5275', 3, 1),
(919, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-05', '2014-02-05', '08:33', '821C9900', 'Cash Sales Retail -Matara Service -', 11, 409.65, 5866.3, 5866.3, 7474, 49077, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-6431', 3, 1),
(920, 'TEF002H20308', 'PRE FILTER SPIN ON PRIMARY', '2014-02-05', '2014-02-05', '08:33', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 870.94, 1375.31, 1375.31, 7474, 49077, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-6431', 3, 1),
(921, 'TEF002H20306', 'FINE  FILTER  ASSY.', '2014-02-05', '2014-02-05', '08:33', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 793.09, 1268.48, 1268.48, 7474, 49077, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-6431', 3, 1),
(922, 'ZQ5555555P', 'COTTON WASTE', '2014-01-07', '2014-02-03', '16:30', '821I0502', 'Matara Service--COST OF SALES', 10, 5.5759, 60.7, 73.1, 2012347, 47918, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'GENARAL', 3, 1),
(923, 'ZQ5180081', 'CAR WASH "CARE"', '2014-01-07', '2014-02-03', '16:30', '821I0502', 'Matara Service--COST OF SALES', 4, 105.05, 462.24, 532.08, 2012347, 47918, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'GENARAL', 3, 1),
(924, 'ZQ1020001', 'KEROSENE OIL', '2014-01-07', '2014-02-03', '16:30', '821I0502', 'Matara Service--COST OF SALES', 5, 106.9804, 601.05, 601.05, 2012347, 47918, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'GENARAL', 3, 1),
(925, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-12', '2014-02-12', '11:28', '531I0502', 'Colombo Vehicle Sales-COST OF SALES', 1, 262.9967, 289.3, 458.4, 2012430, 49327, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-2168', 3, 1),
(926, 'TE278850105801', 'RADIATOR HOSE', '2014-02-12', '2014-02-12', '11:27', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 747.3332, 1091.5445, 1284.17, 6975, 49349, 'MATARA', 'X', 'A', 15, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLD-5268', 3, 1),
(927, 'TE279020127701', 'SEAL THERMOSTAT', '2014-02-12', '2014-02-12', '11:27', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 11.04, 15.9545, 18.77, 6975, 49349, 'MATARA', 'X', 'A', 15, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLD-5268', 3, 1),
(928, 'TE278850100107', 'PRESSURE CAP', '2014-02-12', '2014-02-12', '11:27', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 235.222, 329.511, 387.66, 6975, 49349, 'MATARA', 'X', 'A', 15, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLD-5268', 3, 1),
(929, 'TE279007146902', 'PLUG ( INJECTOR OVER FLOW )', '2014-02-12', '2014-02-12', '11:27', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 8.3912, 25.194, 29.64, 6975, 49349, 'MATARA', 'X', 'A', 15, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLD-5268', 3, 1);
INSERT INTO `tbl_all_sales` (`all_sales_id`, `part_no`, `description`, `date_decar`, `date_edit`, `time`, `acc_no`, `customer_name`, `qty`, `cost_price`, `selling_val`, `retail_val`, `invoice`, `wip`, `location`, `in_s`, `de`, `disc`, `s_e_name`, `s_e_code`, `authorised_by`, `authorised_by_code`, `creating_op`, `creating_op_code`, `vehicle_reg_no`, `area_id`, `status`) VALUES
(930, 'ZQS731-010', 'BLADE FUSE 10AMP', '2014-02-03', '2014-02-03', '18:01', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 9, 17.86, 208.98, 208.98, 3004608, 49021, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLL-0230', 3, 1),
(931, 'TE253420156310', 'V BELT COGGED 925MM LONG', '2014-02-12', '2014-02-12', '11:01', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 621.16, 1043.87, 1043.87, 7540, 49331, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLI-4579', 3, 1),
(932, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-03', '2014-02-03', '17:57', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 409.65, 532.55, 533.3, 3004606, 49074, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-9317', 3, 1),
(933, 'ZQ5555555P', 'COTTON WASTE', '2014-02-03', '2014-02-03', '17:46', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 3, 5.5222, 21.54, 21.93, 3004606, 49074, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-9317', 3, 1),
(934, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-03', '2014-02-03', '17:46', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 399.0146, 518.72, 629.12, 3004606, 49074, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-9317', 3, 1),
(935, 'ZQ5555555P', 'COTTON WASTE', '2014-02-12', '2014-02-12', '10:58', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7546, 49336, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-0419', 3, 1),
(936, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-12', '2014-02-12', '10:58', '821C9900', 'Cash Sales Retail -Matara Service -', 5.5, 431.2164, 3285.095, 3285.095, 7546, 49336, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-0419', 3, 1),
(937, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-12', '2014-02-12', '10:58', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7546, 49336, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-0419', 3, 1),
(938, 'ZQ1020001', 'KEROSENE OIL', '2014-02-12', '2014-02-12', '10:58', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7546, 49336, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-0419', 3, 1),
(939, 'TE279018130106', 'DIESEL OIL FILTER', '2014-02-12', '2014-02-12', '10:58', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 499.2567, 908.23, 908.23, 7546, 49336, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-0419', 3, 1),
(940, 'ZQ80048', '12 MM STRAIGHT UNION', '2014-02-03', '2014-02-06', '16:58', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 2, 575, 1495, 1495, 3004616, 48709, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-7161', 3, 1),
(941, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-12', '2014-02-12', '10:58', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1605.42, 1605.42, 7546, 49336, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-0419', 3, 1),
(942, 'MN000094 004016', 'COTTON PIN', '2014-02-12', '2014-02-12', '10:58', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1.65, 4.3, 4.3, 7546, 49336, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-0419', 3, 1),
(943, 'ZQ5555555P', 'COTTON WASTE', '2014-02-12', '2014-02-13', '10:55', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLK-3522', 3, 1),
(944, 'TE254701157814', '6913 / OIL SEAL-CAM SHAFT', '2014-02-03', '2014-02-03', '16:51', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', -1, 245.7693, -420.82, -420.82, 4000299, 49054, 'MATARA', 'X', 'A', 0, 'Kalpani Alwis', 'ERA', 'Kalpani Alwis', 'ERA', 'Kalpani Alwis', 'ERA', 'SPLF-7062', 3, 1),
(945, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-12', '2014-02-13', '10:55', '821C9900', 'Cash Sales Retail -Matara Service -', 11, 431.2164, 6570.19, 6570.19, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLK-3522', 3, 1),
(946, 'TE252718130132', 'LUBE OIL FILTER-SPIN ON', '2014-02-12', '2014-02-13', '10:55', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 920.0048, 1444.44, 1444.44, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLK-3522', 3, 1),
(947, 'TE279001107801', '6913 / CR SHAFT OIL SEAL FR', '2014-02-03', '2014-02-03', '16:51', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', -1, 285.72, -494.03, -494.03, 4000299, 49054, 'MATARA', 'X', 'A', 0, 'Kalpani Alwis', 'ERA', 'Kalpani Alwis', 'ERA', 'Kalpani Alwis', 'ERA', 'SPLF-7062', 3, 1),
(948, 'TE264382400104', '6918 / WIPER BLADE (CO-DRIVE)', '2014-02-12', '2014-02-12', '11:47', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', -1, 439.733, -895.64, -895.64, 4000301, 49064, 'MATARA', 'X', 'A', 0, 'K ladduwahetti', 'KAL', 'P Manukulasooriya', 'PRM', 'K ladduwahetti', 'KAL', 'WPLJ-0734', 3, 1),
(949, 'TE257682400128', '6918 / WIPER BLADE(DRIVER)', '2014-02-12', '2014-02-12', '11:47', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', -1, 543.98, -1061.29, -1061.29, 4000301, 49064, 'MATARA', 'X', 'A', 0, 'K ladduwahetti', 'KAL', 'P Manukulasooriya', 'PRM', 'K ladduwahetti', 'KAL', 'WPLJ-0734', 3, 1),
(950, 'TE279005107810', '6913 / CAM SHAFT OIL SEAL', '2014-02-03', '2014-02-03', '16:51', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', -1, 52.3257, -123.12, -123.12, 4000299, 49054, 'MATARA', 'X', 'A', 0, 'Kalpani Alwis', 'ERA', 'Kalpani Alwis', 'ERA', 'Kalpani Alwis', 'ERA', 'SPLF-7062', 3, 1),
(951, 'TE282955106302', 'STICKER RH ACE EX', '2014-02-12', '2014-02-12', '10:33', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 449.68, 736.2025, 774.95, 6974, 49346, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPP-6631', 3, 1),
(952, 'TE282955106301', 'STICKER LH ACE EX', '2014-02-12', '2014-02-12', '10:33', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 490.32, 856.824, 901.92, 6974, 49346, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPP-6631', 3, 1),
(953, 'TE252520100124', 'ASSY.WATER PUMP-PSTG PLASTIC IMPELLER', '2014-02-12', '2014-02-12', '10:23', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 8714.07, 14213.2255, 14961.29, 7540, 49331, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLI-4579', 3, 1),
(954, 'TE257654400133', 'TOP  MARKER LAMP LH', '2014-02-12', '2014-02-13', '10:17', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 418.49, 745.19, 745.19, 7561, 49329, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLK-3522', 3, 1),
(955, 'TE253420156310', 'V BELT COGGED 925MM LONG', '2014-02-12', '2014-02-12', '09:55', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 621.16, 1043.87, 1043.87, 6973, 49338, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLJ-9776', 3, 1),
(956, 'TE252520156305', 'V BELT', '2014-02-12', '2014-02-12', '09:55', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 547.03, 1832, 1832, 6973, 49338, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLJ-9776', 3, 1),
(957, 'TE264354208217', 'SPEED SENSOR 12/24V (8 PULSE)', '2014-02-03', '2014-02-03', '16:46', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 718.96, 1237.35, 1237.35, 6921, 49071, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPQ-7180', 3, 1),
(958, 'ZQ5555555P', 'COTTON WASTE', '2014-02-12', '2014-02-13', '09:40', '821C9900', 'Cash Sales Retail -Matara Service -', 10, 5.5222, 73.1, 73.1, 7548, 49330, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(959, 'ZQS890-323', 'SILICON SPECIAL250 BLACK', '2014-02-03', '2014-02-07', '16:36', '821L0005', 'Lucky Lanka Milk Processing Co Ltd', 1, 883.93, 1149.11, 1149.11, 1000363, 49044, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLG-0384', 3, 1),
(960, 'TE263254209903', 'TEMPERATURE TRANSDUCER', '2014-02-03', '2014-02-07', '16:36', '821L0005', 'Lucky Lanka Milk Processing Co Ltd', 1, 344.47, 543.0485, 571.63, 1000363, 49044, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLG-0384', 3, 1),
(961, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-12', '2014-02-13', '09:40', '821C9900', 'Cash Sales Retail -Matara Service -', 6, 593.2978, 5100, 5100, 7548, 49330, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(962, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-12', '2014-02-13', '09:40', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 423.4993, 2720, 2720, 7548, 49330, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(963, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-12', '2014-02-13', '09:40', '821C9900', 'Cash Sales Retail -Matara Service -', 11, 431.2164, 6570.19, 6570.19, 7548, 49330, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(964, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-12', '2014-02-13', '09:40', '821C9900', 'Cash Sales Retail -Matara Service -', 6, 477.36, 5160, 5160, 7548, 49330, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(965, 'ZQ1020001', 'KEROSENE OIL', '2014-02-12', '2014-02-13', '09:40', '821C9900', 'Cash Sales Retail -Matara Service -', 5, 109.28, 550, 550, 7548, 49330, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(966, 'TT0009973446', 'OIL SEAL', '2014-02-12', '2014-02-13', '09:40', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 181.6491, 566.874, 629.86, 7548, 49330, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(967, 'TEF002H20308', 'PRE FILTER SPIN ON PRIMARY', '2014-02-12', '2014-02-13', '09:40', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 870.94, 1237.779, 1375.31, 7548, 49330, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(968, 'TEF002H20306', 'FINE  FILTER  ASSY.', '2014-02-12', '2014-02-13', '09:40', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 793.09, 1141.632, 1268.48, 7548, 49330, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(969, 'TE252718130132', 'LUBE OIL FILTER-SPIN ON', '2014-02-12', '2014-02-13', '09:40', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 920.0048, 1299.996, 1444.44, 7548, 49330, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(970, 'TE252701155302', 'GASKET TAPPET COVER', '2014-02-12', '2014-02-13', '09:40', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 361.5506, 563.922, 626.58, 7548, 49330, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLJ-3551', 3, 1),
(971, 'ZQ5555555P', 'COTTON WASTE', '2014-01-29', '2014-02-01', '17:15', '521I0502', 'Matara Vehicle Sales-COST OF SALES', 2, 5.5759, 12.26, 14.62, 2012328, 48847, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPW-6976', 3, 1),
(972, 'ZQ2010123P', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-01-29', '2014-02-01', '17:15', '521I0502', 'Matara Vehicle Sales-COST OF SALES', 1, 362.93, 399.22, 533.3, 2012328, 48847, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPW-6976', 3, 1),
(973, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-12', '2014-02-12', '09:23', '531I0502', 'Colombo Vehicle Sales-COST OF SALES', 0.5, 431.2164, 237.17, 298.645, 2012430, 49327, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-2168', 3, 1),
(974, 'TE282949100150', 'ASSY RUBBER HANGER BS 111', '2014-02-12', '2014-02-12', '09:23', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 141.9804, 243.45, 243.45, 7542, 49327, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-2168', 3, 1),
(975, 'TE278054209938', 'SPEED SENSOR 12V/24V (8 PULSES', '2014-01-29', '2014-02-01', '17:14', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 981.9607, 1276.55, 1723.7, 3004598, 48848, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPW-9389', 3, 1),
(976, 'ZQ5555555P', 'COTTON WASTE', '2014-02-12', '2014-02-12', '09:20', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 2, 5.5222, 14.36, 14.62, 3004633, 49325, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-7612', 3, 1),
(977, 'TE278609999920', 'STRAINER FUEL', '2014-02-03', '2014-02-03', '16:24', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.13, 391.571, 412.18, 7468, 49021, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLL-0230', 3, 1),
(978, 'TE278609119904', 'FUEL FILTER', '2014-02-03', '2014-02-03', '16:24', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 464.0531, 704.3775, 741.45, 7468, 49021, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLL-0230', 3, 1),
(979, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-12', '2014-02-12', '09:20', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 431.2164, 560.58, 597.29, 3004633, 49325, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-7612', 3, 1),
(980, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-03', '2014-02-03', '16:24', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 674.6612, 1038.2075, 1092.85, 7468, 49021, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLL-0230', 3, 1),
(981, 'TE278607989915', 'DRAIN  VALVE', '2014-02-03', '2014-02-03', '16:24', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 285.7365, 451.6585, 475.43, 7468, 49021, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLL-0230', 3, 1),
(982, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-12', '2014-02-12', '09:20', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 399.0146, 518.72, 629.12, 3004633, 49325, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-7612', 3, 1),
(983, 'VE570515209902', 'SPARK PLUG', '2014-02-12', '2014-02-12', '09:18', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 136.385, 495.76, 495.76, 7541, 49328, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKQ-9204', 3, 1),
(984, 'VE283415209910', 'H T CABLE', '2014-02-12', '2014-02-12', '09:18', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 439.7254, 1352.04, 1352.04, 7541, 49328, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKQ-9204', 3, 1),
(985, 'ZQS892-00112', 'RADIATOR COOLENT', '2014-02-12', '2014-02-12', '08:48', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 729.2336, 2066.08, 2066.08, 7540, 49331, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLI-4579', 3, 1),
(986, 'ZQ5555555P', 'COTTON WASTE', '2014-02-12', '2014-02-12', '08:48', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7540, 49331, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLI-4579', 3, 1),
(987, 'ZQ5555555P', 'COTTON WASTE', '2014-02-12', '2014-02-12', '08:46', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7544, 49324, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-4242', 3, 1),
(988, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-12', '2014-02-12', '08:46', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7544, 49324, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-4242', 3, 1),
(989, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-12', '2014-02-12', '08:46', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 423.4993, 680, 680, 7544, 49324, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-4242', 3, 1),
(990, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-12', '2014-02-12', '08:46', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7544, 49324, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-4242', 3, 1),
(991, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-12', '2014-02-12', '08:46', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7544, 49324, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-4242', 3, 1),
(992, 'ZQ5555555P', 'COTTON WASTE', '2014-02-12', '2014-02-12', '08:34', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5.5222, 7.31, 7.31, 7541, 49328, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPKQ-9204', 3, 1),
(993, 'VE283447609903', 'FUEL FILTER', '2014-02-12', '2014-02-12', '08:34', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 160.37, 279.3, 279.3, 7541, 49328, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPKQ-9204', 3, 1),
(994, 'ZQ69011201', 'BEARING BALL', '2014-02-06', '2014-02-10', '11:21', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 600, 780, 845, 7525, 48537, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPNA-3706', 3, 1),
(995, 'ZQ5070012', 'WIRE 14/012', '2014-02-03', '2014-02-03', '15:50', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 7, 46.68, 424.69, 424.69, 3004608, 49021, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLL-0230', 3, 1),
(996, 'ZQ3730043', 'PLASTIC TAPE', '2014-02-03', '2014-02-03', '15:50', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 3, 59.39, 231.63, 231.63, 3004608, 49021, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLL-0230', 3, 1),
(997, 'ZQ5070012', 'HEAD LAMP LH WITH MOTOR', '2014-02-03', '2014-02-03', '15:43', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2500.4391, 3867.543, 4297.27, 6919, 49066, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-4941', 3, 1),
(998, 'TE264382400104', 'WIPER BLADE (CO-DRIVE)', '2014-02-03', '2014-02-03', '15:36', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 439.733, 895.64, 895.64, 6918, 49064, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLJ-0734', 3, 1),
(999, 'TE257682400128', 'WIPER BLADE(DRIVER)', '2014-02-03', '2014-02-03', '15:36', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 543.98, 1061.29, 1061.29, 6918, 49064, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLJ-0734', 3, 1),
(1000, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-03', '2014-02-03', '15:36', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 541.3676, 850.28, 850.28, 6918, 49064, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLJ-0734', 3, 1),
(1001, 'TE278609119904', 'FUEL FILTER', '2014-02-03', '2014-02-03', '15:36', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 464.0531, 741.45, 741.45, 6918, 49064, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLJ-0734', 3, 1),
(1002, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-03', '2014-02-03', '15:36', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 674.6612, 1092.85, 1092.85, 6918, 49064, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLJ-0734', 3, 1),
(1003, 'TE257681100153', 'REAR VIEW MIRROR LH', '2014-02-15', '2014-02-15', '16:22', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 1683.9763, 1741, 2853.41, 6998, 48862, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLJ-4995', 3, 1),
(1004, 'VE570524200105', 'ASSY ENGINE MOUNTING PAD ''C'' MOUNT', '2014-02-11', '2014-02-11', '15:35', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 587.63, 993.97, 993.97, 6972, 49320, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPKS-1175', 3, 1),
(1005, 'TE285126200115', 'SYNCHRO KIT(1/2 SPEED)', '2014-02-11', '2014-02-15', '15:15', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 296.81, 385.85, 458.46, 3004645, 49152, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPV-2373', 3, 1),
(1006, 'DO7528', 'DOUBLE FILAMENT', '2014-02-11', '2014-02-11', '13:59', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 30, 39, 39, 7536, 49303, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGPV-0083', 3, 1),
(1007, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-03', '2014-02-03', '15:01', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 506.863, 1605.42, 1605.42, 6917, 49062, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-0656', 3, 1),
(1008, 'TE207354500101', 'MAIN LINE SWITCH', '2014-02-03', '2014-02-03', '14:33', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 291.72, 379.24, 419.49, 3004608, 49021, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLL-0230', 3, 1),
(1009, 'TE270225103403', 'BUSH,UPPER (ON HOUSING)', '2014-02-03', '2014-02-03', '14:32', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 26.97, 42.1325, 44.35, 6916, 49061, 'MATARA', 'X', 'A', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLJ-1257', 3, 1),
(1010, 'TE269026203805', 'SYNCHROCONE(3/4/5/SPEED)', '2014-02-11', '2014-02-15', '12:56', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 460.16, 598.21, 790.46, 3004645, 49152, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPV-2373', 3, 1),
(1011, 'TE265829100114', 'ASSY,CL,MASTER CYL,', '2014-02-11', '2014-02-11', '12:55', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2184.95, 3687.33, 3687.33, 6971, 49315, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPJL-0672', 3, 1),
(1012, 'TE270225103401', 'BUSH LOWER HSG', '2014-02-03', '2014-02-03', '14:32', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 16.71, 27.3125, 28.75, 6916, 49061, 'MATARA', 'X', 'A', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLJ-1257', 3, 1),
(1013, 'TF15020502018', 'SRDG BEARING', '2014-02-03', '2014-02-03', '14:32', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 287.64, 510.9765, 537.87, 6916, 49061, 'MATARA', 'X', 'A', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLJ-1257', 3, 1),
(1014, 'TE272425600125', 'CLUTCH RELEASE BEARING', '2014-02-03', '2014-02-03', '14:32', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1187.5939, 1889.4835, 1988.93, 6916, 49061, 'MATARA', 'X', 'A', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLJ-1257', 3, 1),
(1015, 'TE272425400113', 'ASSY CLUTCH COVER 170DIA', '2014-02-03', '2014-02-03', '14:32', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2164.464, 3440.7955, 3621.89, 6916, 49061, 'MATARA', 'X', 'A', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLJ-1257', 3, 1),
(1016, 'TE272425200113', 'CLUTCH DISC 170 mm DIA', '2014-02-03', '2014-02-03', '14:32', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2721.2534, 4408.152, 4640.16, 6916, 49061, 'MATARA', 'X', 'A', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLJ-1257', 3, 1),
(1017, 'TE270432100126', 'ASSY.LOWER BALL JOINT', '2014-02-11', '2014-02-11', '12:44', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1303.12, 2293.96, 2293.96, 6970, 49313, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-7622', 3, 1),
(1018, 'TE265932100114', 'BALL JOINT ASSY.-UPPER W/B', '2014-02-11', '2014-02-11', '12:44', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1263.0115, 2171.31, 2171.31, 6970, 49313, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-7622', 3, 1),
(1019, 'TE278609999951', 'FUEL  STRAINER', '2014-02-11', '2014-02-11', '12:26', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 275.0344, 399.069, 443.41, 6969, 49312, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLI-8222', 3, 1),
(1020, 'ZQ5555555P', 'COTTON WASTE', '2014-02-11', '2014-02-11', '12:15', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7537, 49311, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLC-1223', 3, 1),
(1021, 'TE270215409912', 'GLOW  PLUG', '2014-02-11', '2014-02-11', '12:15', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1426.6057, 2289.168, 2543.52, 7537, 49311, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLC-1223', 3, 1),
(1022, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-11', '2014-02-11', '10:55', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 241.7491, 841.64, 841.64, 6968, 49310, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLJ-9776', 3, 1),
(1023, 'TE252718130132', 'LUBE OIL FILTER-SPIN ON', '2014-02-11', '2014-02-11', '10:55', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 920.0048, 1444.44, 1444.44, 6968, 49310, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLJ-9776', 3, 1),
(1024, 'TE551788500101', 'ASSY IMPACT BEAM FRONT BUMPER', '2014-02-11', '2014-02-11', '10:37', '821C9900', 'Cash Sales Retail -Matara Service -', 0.5, 3355.32, 1072.15, 1072.15, 7532, 48656, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'UPPT-7274', 3, 1),
(1025, 'ZQ5555555P', 'COTTON WASTE', '2014-02-11', '2014-02-11', '10:00', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7536, 49303, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGPV-0083', 3, 1),
(1026, 'TEF002H20308', 'PRE FILTER SPIN ON PRIMARY', '2014-02-03', '2014-02-07', '14:14', '821L0005', 'Lucky Lanka Milk Processing Co Ltd', 1, 870.94, 1306.5445, 1375.31, 1000363, 49044, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLG-0384', 3, 1),
(1027, 'TEF002H20306', 'FINE  FILTER  ASSY.', '2014-02-03', '2014-02-07', '14:14', '821L0005', 'Lucky Lanka Milk Processing Co Ltd', 1, 793.09, 1205.056, 1268.48, 1000363, 49044, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLG-0384', 3, 1),
(1028, 'TE278609999951', 'FUEL  STRAINER', '2014-02-03', '2014-02-07', '14:14', '821L0005', 'Lucky Lanka Milk Processing Co Ltd', 1, 275.0344, 421.2395, 443.41, 1000363, 49044, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLG-0384', 3, 1),
(1029, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-11', '2014-02-11', '10:00', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7536, 49303, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGPV-0083', 3, 1),
(1030, 'TE252701155302', 'GASKET TAPPET COVER', '2014-02-03', '2014-02-07', '14:14', '821L0005', 'Lucky Lanka Milk Processing Co Ltd', 1, 361.5506, 595.251, 626.58, 1000363, 49044, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLG-0384', 3, 1),
(1031, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-11', '2014-02-11', '10:00', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 423.4993, 1360, 1360, 7536, 49303, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGPV-0083', 3, 1),
(1032, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-11', '2014-02-11', '10:00', '821C9900', 'Cash Sales Retail -Matara Service -', 6.5, 431.2164, 3882.385, 3882.385, 7536, 49303, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGPV-0083', 3, 1),
(1033, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-11', '2014-02-11', '10:00', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7536, 49303, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGPV-0083', 3, 1),
(1034, 'ZQ1020001', 'KEROSENE OIL', '2014-02-11', '2014-02-11', '10:00', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7536, 49303, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGPV-0083', 3, 1),
(1035, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-11', '2014-02-11', '10:00', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 241.7491, 841.64, 841.64, 7536, 49303, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGPV-0083', 3, 1),
(1036, 'TE265433407801', 'OIL SEAL FRONT HUB', '2014-02-11', '2014-02-11', '10:00', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 89.1625, 298.62, 298.62, 7536, 49303, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGPV-0083', 3, 1),
(1037, 'TE254718130106', 'OIL FILTER', '2014-02-11', '2014-02-11', '10:00', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 380.3592, 806.91, 806.91, 7536, 49303, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SGPV-0083', 3, 1),
(1038, 'ZQ2010164', 'BRAKE FLUID DOT4[P-164]', '2014-02-11', '2014-02-11', '09:50', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 1325.6267, 385.9375, 385.9375, 7533, 49300, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'UPPT-7274', 3, 1),
(1039, 'TE282942700107', 'FRT PARKING BRAKE CABLE', '2014-02-11', '2014-02-11', '09:30', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 458.45, 787.46, 787.46, 7535, 49301, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPS-7932', 3, 1),
(1040, 'TE282991500107', 'ASSY SEAT BELT KIT COMPLETE', '2014-02-10', '2014-02-10', '13:54', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 4454.68, 5791.08, 8391.46, 3004632, 48141, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2328', 3, 1),
(1041, 'ZQ5555555P', 'COTTON WASTE', '2014-02-11', '2014-02-11', '09:30', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7535, 49301, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Chamal Wickramarchch', 'CNW', 'Priyantha kulathunga', 'PLG', 'SPPS-7932', 3, 1),
(1042, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-11', '2014-02-11', '09:30', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7535, 49301, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Chamal Wickramarchch', 'CNW', 'Priyantha kulathunga', 'PLG', 'SPPS-7932', 3, 1),
(1043, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-11', '2014-02-11', '09:30', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1605.42, 1605.42, 7535, 49301, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Chamal Wickramarchch', 'CNW', 'Priyantha kulathunga', 'PLG', 'SPPS-7932', 3, 1),
(1044, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-11', '2014-02-11', '09:30', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7535, 49301, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Chamal Wickramarchch', 'CNW', 'Priyantha kulathunga', 'PLG', 'SPPS-7932', 3, 1),
(1045, 'ZQ5555555P', 'COTTON WASTE', '2014-02-11', '2014-02-11', '09:09', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5.5222, 7.31, 7.31, 7530, 49304, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPU-8851', 3, 1),
(1046, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-11', '2014-02-11', '09:09', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7530, 49304, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPU-8851', 3, 1),
(1047, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-11', '2014-02-11', '09:09', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7530, 49304, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPU-8851', 3, 1),
(1048, 'ZQ5555555P', 'COTTON WASTE', '2014-02-11', '2014-02-11', '08:20', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7533, 49300, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'UPPT-7274', 3, 1),
(1049, 'TE269872300102', 'ASSY OUTER HANDLE LH', '2014-02-03', '2014-02-03', '13:43', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 120.0067, 223.33, 223.33, 6915, 49056, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPV-0882', 3, 1),
(1050, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-03', '2014-02-03', '13:41', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7461, 49048, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-9072', 3, 1),
(1051, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-03', '2014-02-03', '13:41', '821C9900', 'Cash Sales Retail -Matara Service -', 2.25, 409.65, 1199.925, 1199.925, 7461, 49048, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-9072', 3, 1),
(1052, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-11', '2014-02-11', '08:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7533, 49300, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'UPPT-7274', 3, 1),
(1053, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-11', '2014-02-11', '08:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 431.2164, 895.935, 895.935, 7533, 49300, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'UPPT-7274', 3, 1),
(1054, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-11', '2014-02-11', '08:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 241.7491, 420.82, 420.82, 7533, 49300, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'UPPT-7274', 3, 1),
(1055, 'TE571718139904', 'SPIN ON OIL FILTER', '2014-02-11', '2014-02-11', '08:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 209.2497, 340.22, 340.22, 7533, 49300, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'UPPT-7274', 3, 1),
(1056, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-03', '2014-02-03', '13:41', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 242.143, 399.779, 420.82, 7461, 49048, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-9072', 3, 1),
(1057, 'TE571718139904', 'SPIN ON OIL FILTER', '2014-02-03', '2014-02-03', '13:41', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 209.2497, 323.209, 340.22, 7461, 49048, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-9072', 3, 1),
(1058, 'TE282946600108', 'DRAG LINK', '2014-02-02', '2014-02-10', '10:08', '821I0502', 'Matara Service--COST OF SALES', 1, 2106.1637, 2316.78, 3670.09, 2012414, 49011, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', NULL, NULL, 'Dumidu Pathiranage', 'PLP', NULL, 3, 1),
(1059, 'DO7506', 'FLASHER LAMP', '2014-02-03', '2014-02-03', '13:35', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 30, 39, 39, 7460, 49017, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-9896', 3, 1),
(1060, 'TE278801135301', 'SUMP GASKET', '2014-02-02', '2014-02-10', '10:08', '821I0502', 'Matara Service--COST OF SALES', 1, 212.8761, 234.16, 387.06, 2012414, 49011, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', NULL, NULL, 'Dumidu Pathiranage', 'PLP', NULL, 3, 1),
(1061, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-02', '2014-02-10', '10:08', '821I0502', 'Matara Service--COST OF SALES', 1, 396.3863, 438.92, 629.12, 2012414, 49011, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', NULL, NULL, 'Dumidu Pathiranage', 'PLP', NULL, 3, 1),
(1062, 'TE270225103403', 'BUSH,UPPER (ON HOUSING)', '2014-02-03', '2014-02-03', '13:28', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 26.97, 44.35, 44.35, 6913, 49054, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-7062', 3, 1),
(1063, 'TE285126200116', 'SYNCHRO KIT3/4 SPEED', '2014-02-03', '2014-02-03', '13:28', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 183.61, 327.23, 327.23, 6913, 49054, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-7062', 3, 1),
(1064, 'TE285126200115', 'SYNCHRO KIT(1/2 SPEED)', '2014-02-03', '2014-02-03', '13:28', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 296.81, 458.46, 458.46, 6913, 49054, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-7062', 3, 1),
(1065, 'TE254701157814', 'OIL SEAL-CAM SHAFT', '2014-02-03', '2014-02-03', '13:28', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 245.7693, 420.82, 420.82, 6913, 49054, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-7062', 3, 1),
(1066, 'TE279001107802', 'CRANK OIL SEAL RR', '2014-02-03', '2014-02-03', '13:28', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 784.79, 1312.37, 1312.37, 6913, 49054, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-7062', 3, 1),
(1067, 'TE279001107801', 'CR SHAFT OIL SEAL FR', '2014-02-03', '2014-02-03', '13:28', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 285.72, 494.03, 494.03, 6913, 49054, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-7062', 3, 1),
(1068, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-02', '2014-02-10', '10:08', '821I0502', 'Matara Service--COST OF SALES', 3, 409.65, 1423.02, 1791.87, 2012414, 49011, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', NULL, NULL, 'Dumidu Pathiranage', 'PLP', NULL, 3, 1),
(1069, 'TE279005107810', 'CAM SHAFT OIL SEAL', '2014-02-03', '2014-02-03', '13:28', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 52.3257, 123.12, 123.12, 6913, 49054, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-7062', 3, 1),
(1070, 'TE272425600125', 'CLUTCH RELEASE BEARING', '2014-02-03', '2014-02-03', '13:28', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1187.5939, 1988.93, 1988.93, 6913, 49054, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLF-7062', 3, 1),
(1071, 'Y9 50 50 055', '8 25 20 SMILER N14', '2014-02-13', '2014-02-13', '13:50', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 0.5, 24962.23, 16225.45, 17680, 3004636, 48777, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-7743', 3, 1),
(1072, 'ZQ5555555P', 'COTTON WASTE', '2014-02-03', '2014-02-03', '12:51', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5.5759, 7.31, 7.31, 7463, 49038, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-4308', 3, 1),
(1073, 'TE269026107702', 'OIL  SEAL  -  SPEEDO  SHAFT', '2014-02-03', '2014-02-03', '12:51', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 47.68, 82.06, 82.06, 7463, 49038, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-4308', 3, 1),
(1074, 'Y9 50 40 021', '7 00 16 SMH N12', '2014-02-08', '2014-02-08', '13:07', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 15978.83, 20772.48, 28475, 3004626, 48815, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-6383', 3, 1),
(1075, 'ZQ5555555P', 'COTTON WASTE', '2014-02-03', '2014-02-03', '12:42', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 2, 5.5759, 14.5, 14.62, 3004603, 49040, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-4651', 3, 1),
(1076, 'TE279020127702', 'SEAL THERMOSTAT', '2014-02-03', '2014-02-03', '12:42', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 10.89, 14.16, 18.37, 3004603, 49040, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPV-4651', 3, 1),
(1077, 'ZQ2010164', 'BRAKE FLUID DOT4[P-164]', '2014-02-10', '2014-02-12', '17:57', '521I0502', 'Matara Vehicle Sales-COST OF SALES', 0.25, 1325.6267, 364.5475, 385.9375, 2012432, 49298, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-9194', 3, 1),
(1078, 'TE270215409912', 'GLOW  PLUG', '2014-02-03', '2014-02-03', '12:43', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 1426.6057, 4934.4288, 5087.04, 6912, 49051, 'MATARA', 'X', 'A', 3, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLH-0986', 3, 1),
(1079, 'TE207430100106', 'ASSY.  PULL  CABLE', '2014-02-03', '2014-02-03', '12:33', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 602.6567, 1086.52, 1086.52, 6911, 49049, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLE-9608', 3, 1),
(1080, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-01-29', '2014-02-15', '11:07', '821P0014', 'Mr MAN Pradeep', 0.25, 477.36, 215, 215, 1000364, 47827, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-4819', 3, 1),
(1081, 'TE278620999933', 'KIT UPPER GASKET', '2014-02-03', '2014-02-03', '12:30', '721A0006', 'Anura Motors', 1, 9245.77, 13515.9275, 16284.25, 1001546, 49050, 'MATARA', 'X', 'A', 17, 'Thilina Swarnabandu', 'TSS', 'Chamal Wickramarchch', 'CNW', 'Thilina Swarnabandu', 'TSS', NULL, 3, 1),
(1082, 'TE886325010002', 'GB 600 PRESSURE PLATE', '2014-02-03', '2014-02-03', '12:30', '721A0006', 'Anura Motors', 1, 19298.04, 27607.4185, 33261.95, 1001546, 49050, 'MATARA', 'X', 'A', 17, 'Thilina Swarnabandu', 'TSS', 'Chamal Wickramarchch', 'CNW', 'Thilina Swarnabandu', 'TSS', NULL, 3, 1),
(1083, 'ZQ1020001', 'KEROSENE OIL', '2014-01-29', '2014-02-15', '11:07', '821P0014', 'Mr MAN Pradeep', 1, 109.28, 110, 110, 1000364, 47827, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-4819', 3, 1),
(1084, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-01-29', '2014-02-15', '11:07', '821P0014', 'Mr MAN Pradeep', 2, 56.4235, 203.927, 214.66, 1000364, 47827, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-4819', 3, 1),
(1085, 'TE278850100104', 'RADIATOR WITH THERMO SWITCH', '2014-01-29', '2014-02-15', '11:07', '821P0014', 'Mr MAN Pradeep', 1, 11238.365, 18482.041, 19454.78, 1000364, 47827, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-4819', 3, 1),
(1086, 'MN000094 004016', 'COTTON PIN', '2014-01-29', '2014-02-15', '11:07', '821P0014', 'Mr MAN Pradeep', 2, 1.65, 4.3, 4.3, 1000364, 47827, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-4819', 3, 1);
INSERT INTO `tbl_all_sales` (`all_sales_id`, `part_no`, `description`, `date_decar`, `date_edit`, `time`, `acc_no`, `customer_name`, `qty`, `cost_price`, `selling_val`, `retail_val`, `invoice`, `wip`, `location`, `in_s`, `de`, `disc`, `s_e_name`, `s_e_code`, `authorised_by`, `authorised_by_code`, `creating_op`, `creating_op_code`, `vehicle_reg_no`, `area_id`, `status`) VALUES
(1087, 'ZQ5180031', 'HACKSAW BLADE-HIGH SPEED', '2014-01-29', '2014-02-03', '11:36', '821I0502', 'Matara Service--COST OF SALES', 1, 129.37, 156, 195, 2012347, 47918, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'GENARAL', 3, 1),
(1088, 'TE266835607703', 'OIL SEAL', '2014-02-03', '2014-02-03', '12:33', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 2, 301.23, 1014.14, 1014.14, 6911, 49049, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLE-9608', 3, 1),
(1089, 'TE266835607705', 'OIL SEAL (HUB OUTER)', '2014-02-03', '2014-02-03', '12:33', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 2, 168.52, 560.74, 560.74, 6911, 49049, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLE-9608', 3, 1),
(1090, 'TE250526257802', 'OIL SEAL FRT GBS 40/50', '2014-02-03', '2014-02-03', '12:33', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 23.63, 79.77, 79.77, 6911, 49049, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLE-9608', 3, 1),
(1091, 'ZQMOBIL SUPER 15W40', 'MOBIL SUPER 15W40', '2014-02-03', '2014-02-03', '11:37', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 538.9615, 2089.29, 2089.29, 7467, 49029, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKN-9458', 3, 1),
(1092, 'ZQ5555555P', 'COTTON WASTE', '2014-02-03', '2014-02-03', '11:37', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5.5759, 7.31, 7.31, 7467, 49029, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKN-9458', 3, 1),
(1093, 'VE570518130102', 'ASSY OIL FILTER', '2014-02-03', '2014-02-03', '11:37', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.2508, 443.8685, 467.23, 7467, 49029, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKN-9458', 3, 1),
(1094, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-03', '2014-02-03', '11:19', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 624.8208, 812.27, 1129.01, 3004599, 49043, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPX-0032', 3, 1),
(1095, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-03', '2014-02-03', '11:14', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 624.8208, 1072.5595, 1129.01, 6910, 49042, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPW-1663', 3, 1),
(1096, 'TE278609119903', 'FUEL WATER SEPERATOR', '2014-02-03', '2014-02-03', '11:07', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 823.3933, 1168.092, 1297.88, 6909, 49039, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'R08684', 3, 1),
(1097, 'TE278609119904', 'FUEL FILTER', '2014-02-03', '2014-02-03', '11:07', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 464.0531, 667.305, 741.45, 6909, 49039, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'R08684', 3, 1),
(1098, 'TE265483300190', 'VENTILATION NOZZLE', '2014-02-10', '2014-02-10', '16:50', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 2, 260.5, 573.1, 934.98, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPD-8404', 3, 1),
(1099, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-03', '2014-02-03', '10:34', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7459, 49024, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLG-3528', 3, 1),
(1100, 'TE282933403105', 'HUB BEARING INNER', '2014-02-03', '2014-02-03', '10:23', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 940.1488, 1425.897, 1584.33, 7458, 49016, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-8256', 3, 1),
(1101, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-03', '2014-02-03', '10:15', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 633.208, 812.27, 1129.01, 3004607, 49026, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-7251', 3, 1),
(1102, 'TE552388800101', 'ASSY LEAF SCREEN TRIM', '2014-02-13', '2014-02-13', '18:48', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 1215.74, 2866.33, 2866.33, 6991, 49279, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPW-1745', 3, 1),
(1103, 'TE282965708201', 'ROOF PANEL', '2014-02-13', '2014-02-13', '18:48', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 2168.22, 3974.19, 3974.19, 6991, 49279, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPW-1745', 3, 1),
(1104, 'TE281868900135', 'ASSY GLOVE BOX LATCH RHD', '2014-02-10', '2014-02-10', '12:58', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 191.16, 349.88, 349.88, 6966, 48793, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPS-8462', 3, 1),
(1105, 'TE282988800101BF', 'ASSY FRONT PANEL OUTER ARCTIC WHITE', '2014-02-10', '2014-02-13', '15:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 12996.1285, 24190.96, 24190.96, 7560, 49271, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SGPV-6917', 3, 1),
(1106, 'TE282988506701', 'ADJUSTERBLE SCREW', '2014-02-10', '2014-02-13', '15:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 42.14, 77.5, 77.5, 7560, 49271, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SGPV-6917', 3, 1),
(1107, 'TE282988506301', 'FRONT BUMPER', '2014-02-10', '2014-02-13', '15:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 3130.0511, 5757.92, 5757.92, 7560, 49271, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SGPV-6917', 3, 1),
(1108, 'TE282954409903', 'WHITE REFLECTER', '2014-02-10', '2014-02-13', '15:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 87.0469, 145.4, 145.4, 7560, 49271, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SGPV-6917', 3, 1),
(1109, 'TE282954400128', 'HEAD LAMP LH WITH MOTOR', '2014-02-10', '2014-02-13', '15:48', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2500.4391, 4297.27, 4297.27, 7560, 49271, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SGPV-6917', 3, 1),
(1110, 'TE281868900116', 'ASSY UTILITY BIN TOUCH LATCH', '2014-02-10', '2014-02-10', '12:58', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 647.04, 1193.15, 1193.15, 6966, 48793, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPS-8462', 3, 1),
(1111, 'TE265172502311', 'GLASS PANE REGULATINGWINDOW', '2014-02-03', '2014-02-03', '13:37', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1261.91, 2049.543, 2277.27, 6914, 48779, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', '43/7297', 3, 1),
(1112, 'VE279115210104', 'IGNITION COIL', '2014-02-10', '2014-02-10', '15:48', '721W0001', 'Walgama Tyre House', 1, 5972.84, 9776.5451, 11778.97, 1001555, 49291, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(1113, 'ZQS892-00112', 'RADIATOR COOLENT', '2014-02-03', '2014-02-03', '10:02', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 606.717, 783.48, 783.48, 7456, 49022, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLC-3285', 3, 1),
(1114, 'TE278650109909', 'PRESSURE CAP(NEW)', '2014-02-10', '2014-02-10', '15:25', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 359.08, 673.3695, 708.81, 6967, 49289, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLB-8075', 3, 1),
(1115, 'ZQ5555555P', 'COTTON WASTE', '2014-02-10', '2014-02-10', '15:00', '821C9901', 'Cash Sales Retail -Matara Service -         VAT', 1, 5.5222, 7.31, 7.31, 7523, 49281, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-1362', 3, 1),
(1116, 'ZQMOBIL SUPER 15W40', 'MOBIL SUPER 15W40', '2014-02-10', '2014-02-10', '14:50', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 538.9615, 2089.29, 2089.29, 7524, 49288, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-7101', 3, 1),
(1117, 'ZQ5555555P', 'COTTON WASTE', '2014-02-10', '2014-02-10', '14:47', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7524, 49288, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-7101', 3, 1),
(1118, 'VE570518130102', 'ASSY OIL FILTER', '2014-02-10', '2014-02-10', '14:47', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.2508, 467.23, 467.23, 7524, 49288, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-7101', 3, 1),
(1119, 'ZQN90', 'BATTERY N 90', '2014-02-12', '2014-02-12', '13:18', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 1, 15654.69, 23335, 23335, 2012431, 48682, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPPD-8404', 3, 1),
(1120, 'TE278609999920', 'STRAINER FUEL', '2014-02-10', '2014-02-11', '14:30', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.13, 412.18, 412.18, 7529, 49258, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLL-0266', 3, 1),
(1121, 'TE278609119904', 'FUEL FILTER', '2014-02-10', '2014-02-11', '14:30', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 464.0531, 741.45, 741.45, 7529, 49258, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLL-0266', 3, 1),
(1122, 'TE278801155302', 'CYL HEAD GASKET 1.7 mm', '2014-02-03', '2014-02-03', '09:51', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1501.88, 2565.68, 2565.68, 6908, 49036, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPP-5019', 3, 1),
(1123, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-10', '2014-02-11', '14:30', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 674.6612, 1092.85, 1092.85, 7529, 49258, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLL-0266', 3, 1),
(1124, 'TE278607989915', 'DRAIN  VALVE', '2014-02-10', '2014-02-11', '14:30', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 285.7365, 475.43, 475.43, 7529, 49258, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLL-0266', 3, 1),
(1125, 'TE282929100140', 'ASSY. CLUTCH CABLE ACE BS IV', '2014-02-03', '2014-02-03', '09:46', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 776.734, 1340.46, 1340.46, 7457, 49019, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'UPPU-9285', 3, 1),
(1126, 'TE282929100140', 'ASSY. CLUTCH CABLE ACE BS IV', '2014-02-03', '2014-02-03', '09:25', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 776.734, 1273.437, 1340.46, 6907, 49031, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPV-8332', 3, 1),
(1127, 'TE279005110103', 'ASSY,IDLER', '2014-02-03', '2014-02-03', '09:12', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1167.87, 1727.496, 1919.44, 7458, 49016, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-8256', 3, 1),
(1128, 'TE279005110101', 'BELT TENSIONER', '2014-02-03', '2014-02-03', '09:12', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2272.59, 3448.683, 3831.87, 7458, 49016, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-8256', 3, 1),
(1129, 'TE254705116301', 'TIMING BELT', '2014-02-03', '2014-02-03', '09:12', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2257.8801, 3479.769, 3866.41, 7458, 49016, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPT-8256', 3, 1),
(1130, 'ZQ2010164', 'BRAKE FLUID DOT4[P-164]', '2014-02-03', '2014-02-03', '09:07', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 1321.44, 429.4675, 429.4675, 7455, 49018, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPS-8816', 3, 1),
(1131, 'TE265429100157', 'SL CY REP KIT(MAJOR)', '2014-02-03', '2014-02-03', '09:07', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 584.9625, 1032.43, 1032.43, 7455, 49018, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPS-8816', 3, 1),
(1132, 'ZQ5555555P', 'COTTON WASTE', '2014-02-03', '2014-02-03', '08:36', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5759, 14.62, 14.62, 7458, 49016, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-8256', 3, 1),
(1133, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-03', '2014-02-03', '08:35', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 409.65, 1599.9, 1599.9, 7458, 49016, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-8256', 3, 1),
(1134, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-03', '2014-02-03', '08:35', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7458, 49016, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-8256', 3, 1),
(1135, 'ZQ1020001', 'KEROSENE OIL', '2014-02-03', '2014-02-03', '08:35', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7458, 49016, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-8256', 3, 1),
(1136, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-03', '2014-02-03', '08:35', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 56.4235, 193.194, 214.66, 7458, 49016, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-8256', 3, 1),
(1137, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-03', '2014-02-03', '08:35', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 396.3863, 566.208, 629.12, 7458, 49016, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-8256', 3, 1),
(1138, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-03', '2014-02-03', '08:35', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1444.878, 1605.42, 7458, 49016, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-8256', 3, 1),
(1139, 'TE265981100166', 'REAR VIEW MIRROR OUTER LH', '2014-02-10', '2014-02-10', '13:58', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1476.5, 2289.987, 2544.43, 7522, 49272, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-3339', 3, 1),
(1140, 'MN000094 004016', 'COTTON PIN', '2014-02-03', '2014-02-03', '08:35', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1.65, 2.15, 2.15, 7458, 49016, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-8256', 3, 1),
(1141, 'ZQ5555555P', 'COTTON WASTE', '2014-02-03', '2014-02-03', '08:26', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5759, 21.93, 21.93, 7457, 49019, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'UPPU-9285', 3, 1),
(1142, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-03', '2014-02-03', '08:26', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7457, 49019, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'UPPU-9285', 3, 1),
(1143, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-03', '2014-02-03', '08:26', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 423.4993, 680, 680, 7457, 49019, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'UPPU-9285', 3, 1),
(1144, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-03', '2014-02-03', '08:26', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 409.65, 1599.9, 1599.9, 7457, 49019, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'UPPU-9285', 3, 1),
(1145, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-03', '2014-02-03', '08:26', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 396.3863, 629.12, 629.12, 7457, 49019, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'UPPU-9285', 3, 1),
(1146, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-03', '2014-02-03', '08:16', '821C9900', 'Cash Sales Retail -Matara Service -', 15, 409.65, 7999.5, 7999.5, 7460, 49017, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-9896', 3, 1),
(1147, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-03', '2014-02-03', '08:16', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 541.3676, 850.28, 850.28, 7460, 49017, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-9896', 3, 1),
(1148, 'TE278609999920', 'STRAINER FUEL', '2014-02-03', '2014-02-03', '08:16', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.13, 412.18, 412.18, 7460, 49017, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-9896', 3, 1),
(1149, 'TE278609119904', 'FUEL FILTER', '2014-02-03', '2014-02-03', '08:16', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 464.0531, 741.45, 741.45, 7460, 49017, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-9896', 3, 1),
(1150, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-03', '2014-02-03', '08:16', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 663.9671, 1092.85, 1092.85, 7460, 49017, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-9896', 3, 1),
(1151, 'TE278607989915', 'DRAIN  VALVE', '2014-02-03', '2014-02-03', '08:16', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 285.4061, 475.43, 475.43, 7460, 49017, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-9896', 3, 1),
(1152, 'TE282932407703', 'CENTRE PAD', '2014-02-02', '2014-02-02', '15:25', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 53.1517, 91.43, 91.43, 7454, 49013, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPP-3447', 3, 1),
(1153, 'TE282932407701', 'TIP INSERT(REAR SPRING)', '2014-02-02', '2014-02-02', '15:25', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 72.6337, 122.89, 122.89, 7454, 49013, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPP-3447', 3, 1),
(1154, 'TE282968906308', 'BAZEL DIGITAL CLOCK', '2014-02-02', '2014-02-02', '13:38', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 46.3, 93.98, 93.98, 7454, 49013, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPP-3447', 3, 1),
(1155, 'TE282954209902', 'SPEEDOMEETER CABLE', '2014-02-02', '2014-02-02', '13:38', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 618.475, 1020.642, 1074.36, 7454, 49013, 'MATARA', 'X', 'B', 5, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPP-3447', 3, 1),
(1156, 'TE282949100150', 'ASSY RUBBER HANGER BS 111', '2014-02-02', '2014-02-02', '13:38', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 141.9804, 243.45, 243.45, 7454, 49013, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPP-3447', 3, 1),
(1157, 'TE282930100132', 'ACC,CABLE', '2014-02-02', '2014-02-02', '13:38', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 602.3578, 929.0715, 977.97, 7454, 49013, 'MATARA', 'X', 'B', 5, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPP-3447', 3, 1),
(1158, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-02', '2014-02-02', '13:02', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 409.65, 1599.9, 1599.9, 7454, 49013, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPP-3447', 3, 1),
(1159, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-02', '2014-02-02', '13:02', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 396.3863, 597.664, 629.12, 7454, 49013, 'MATARA', 'X', 'B', 5, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPP-3447', 3, 1),
(1160, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-02', '2014-02-02', '12:29', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 409.65, 1599.9, 1599.9, 7452, 49014, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPR-5367', 3, 1),
(1161, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-02', '2014-02-02', '12:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 633.208, 1129.01, 1129.01, 7452, 49014, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPR-5367', 3, 1),
(1162, 'TE282929100140', 'ASSY. CLUTCH CABLE ACE BS IV', '2014-02-02', '2014-02-02', '12:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 776.734, 1340.46, 1340.46, 7452, 49014, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPR-5367', 3, 1),
(1163, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-02', '2014-02-02', '12:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 396.3863, 629.12, 629.12, 7452, 49014, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPR-5367', 3, 1),
(1164, 'TE278801135301', 'SUMP GASKET', '2014-02-02', '2014-02-02', '12:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 212.8761, 387.06, 387.06, 7452, 49014, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPR-5367', 3, 1),
(1165, 'TE279005110103', 'ASSY,IDLER', '2014-02-02', '2014-02-02', '11:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1167.87, 1823.468, 1919.44, 7454, 49013, 'MATARA', 'X', 'B', 5, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPP-3447', 3, 1),
(1166, 'TE279005110101', 'BELT TENSIONER', '2014-02-02', '2014-02-02', '11:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2272.59, 3640.2765, 3831.87, 7454, 49013, 'MATARA', 'X', 'B', 5, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPP-3447', 3, 1),
(1167, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-02', '2014-02-02', '11:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 262.9967, 435.48, 458.4, 7454, 49013, 'MATARA', 'X', 'B', 5, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPP-3447', 3, 1),
(1168, 'TE270181100101', 'VENTILATION GRILL FRONT', '2014-02-02', '2014-02-02', '11:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 256.65, 451.66, 451.66, 7454, 49013, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPP-3447', 3, 1),
(1169, 'TE254705116301', 'TIMING BELT', '2014-02-02', '2014-02-02', '11:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2257.8801, 3673.0895, 3866.41, 7454, 49013, 'MATARA', 'X', 'B', 5, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPP-3447', 3, 1),
(1170, 'TE285035708201', 'RETAINER BEARING RING', '2014-02-02', '2014-02-02', '10:25', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 275.16, 553.04, 553.04, 6906, 49012, 'MATARA', 'X', 'A', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPS-2883', 3, 1),
(1171, 'TE285035307704', 'SEAL-OIL (2002108)', '2014-02-02', '2014-02-02', '10:25', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 330.56, 567.48, 567.48, 6906, 49012, 'MATARA', 'X', 'A', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPS-2883', 3, 1),
(1172, 'TE285035307702', 'OIL SEALOUT BOARD', '2014-02-02', '2014-02-02', '10:25', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 136.19, 234.95, 234.95, 6906, 49012, 'MATARA', 'X', 'A', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPS-2883', 3, 1),
(1173, 'TE285035603101', 'BALL BEARING', '2014-02-02', '2014-02-02', '10:25', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1104.01, 1867.04, 1867.04, 6906, 49012, 'MATARA', 'X', 'A', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPS-2883', 3, 1),
(1174, 'TE282946600108', 'DRAG LINK', '2014-02-02', '2014-02-02', '10:08', '102C9905', 'Diesel & Motor Engineering PLC', 1, 2106.1637, 3670.09, 3670.09, 7451, 49011, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPR-5367', 3, 1),
(1175, 'TE278801135301', 'SUMP GASKET', '2014-02-02', '2014-02-02', '10:08', '102C9905', 'Diesel & Motor Engineering PLC', 1, 212.8761, 387.06, 387.06, 7451, 49011, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPR-5367', 3, 1),
(1176, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-02', '2014-02-02', '10:08', '102C9905', 'Diesel & Motor Engineering PLC', 1, 396.3863, 629.12, 629.12, 7451, 49011, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPR-5367', 3, 1),
(1177, 'TE285035707901', 'AXLE SHAFT', '2014-02-13', '2014-02-13', '18:48', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 3851.43, 6398.08, 6398.08, 6991, 49279, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPW-1745', 3, 1),
(1178, 'TE282972502301', 'GLASS FRONT DOORLH', '2014-02-13', '2014-02-13', '18:48', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 1344.76, 2642.41, 2642.41, 6991, 49279, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPW-1745', 3, 1),
(1179, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-02', '2014-02-02', '10:08', '102C9905', 'Diesel & Motor Engineering PLC', 3, 409.65, 1599.9, 1599.9, 7451, 49011, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPR-5367', 3, 1),
(1180, 'TE552367106303', 'WINDSCREEN MOULD', '2014-02-13', '2014-02-13', '18:48', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 416.61, 789.61, 789.61, 6991, 49279, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPW-1745', 3, 1),
(1181, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-02', '2014-02-03', '09:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 541.3676, 765.252, 850.28, 7464, 48899, 'MATARA', 'X', 'B', 10, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SGLL-0394', 3, 1),
(1182, 'TE278609999920', 'STRAINER FUEL', '2014-02-02', '2014-02-02', '09:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.13, 412.18, 412.18, 7453, 48899, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SGLL-0394', 3, 1),
(1183, 'ZQS892-00112', 'RADIATOR COOLENT', '2014-02-10', '2014-02-11', '12:17', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 606.717, 1033.04, 1033.04, 7531, 49084, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-6668', 3, 1),
(1184, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-10', '2014-02-10', '12:11', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 431.2164, 560.58, 597.29, 3004631, 49265, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-9632', 3, 1),
(1185, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-10', '2014-02-10', '12:11', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 624.8208, 812.27, 1129.01, 3004631, 49265, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-9632', 3, 1),
(1186, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-10', '2014-02-10', '12:11', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 399.0146, 518.72, 629.12, 3004631, 49265, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-9632', 3, 1),
(1187, 'ZQ5555555P', 'COTTON WASTE', '2014-02-10', '2014-02-10', '12:07', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7521, 49266, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-6454', 3, 1),
(1188, 'TE272425600125', 'CLUTCH RELEASE BEARING', '2014-02-10', '2014-02-10', '12:07', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1190.324, 1790.037, 1988.93, 7521, 49266, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-6454', 3, 1),
(1189, 'TE278609119904', 'FUEL FILTER', '2014-02-02', '2014-02-02', '09:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 464.0531, 741.45, 741.45, 7453, 48899, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SGLL-0394', 3, 1),
(1190, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-02', '2014-02-02', '09:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 663.9671, 1092.85, 1092.85, 7453, 48899, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SGLL-0394', 3, 1),
(1191, 'TE272425400113', 'ASSY CLUTCH COVER 170DIA', '2014-02-10', '2014-02-10', '12:07', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2173.0857, 3259.701, 3621.89, 7521, 49266, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-6454', 3, 1),
(1192, 'TE278607989915', 'DRAIN  VALVE', '2014-02-02', '2014-02-02', '09:20', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 285.4061, 475.43, 475.43, 7453, 48899, 'MATARA', 'X', 'B', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SGLL-0394', 3, 1),
(1193, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-02', '2014-02-02', '08:50', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 396.3863, 629.12, 629.12, 6905, 49010, 'MATARA', 'X', 'A', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'WPPV-0527', 3, 1),
(1194, 'TE272425200113', 'CLUTCH DISC 170 mm DIA', '2014-02-10', '2014-02-10', '12:07', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2773.2756, 4176.144, 4640.16, 7521, 49266, 'MATARA', 'X', 'B', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPR-6454', 3, 1),
(1195, 'TE282954500105', 'COMB;SWITCH', '2014-02-10', '2014-02-15', '11:55', '821P0014', 'Mr MAN Pradeep', 1, 1281.795, 2063.97, 2172.6, 1000364, 47827, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-4819', 3, 1),
(1196, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-10', '2014-02-10', '11:47', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 431.2164, 560.58, 597.29, 3004631, 49265, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-9632', 3, 1),
(1197, 'DO7528', 'DOUBLE FILAMENT', '2014-02-10', '2014-02-15', '11:44', '821P0014', 'Mr MAN Pradeep', 1, 30, 39, 39, 1000364, 47827, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-4819', 3, 1),
(1198, 'TE278650100339', 'RADIATOR RESERVE WATER TANK', '2014-02-10', '2014-02-10', '11:09', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 4961.42, 8607.07, 8607.07, 6965, 49268, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLD-2261', 3, 1),
(1199, 'TE279007146902', 'PLUG ( INJECTOR OVER FLOW )', '2014-02-10', '2014-02-10', '10:35', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 8.3912, 14.82, 14.82, 6964, 49263, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-1853', 3, 1),
(1200, 'TE257633407801', 'FRONT HUB OIL SEAL', '2014-02-10', '2014-02-10', '09:50', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 4, 181.2715, 1130.436, 1256.04, 6963, 49261, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLH-4971', 3, 1),
(1201, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-10', '2014-02-15', '09:50', '821P0014', 'Mr MAN Pradeep', 2, 506.863, 1525.149, 1605.42, 1000364, 47827, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLE-4819', 3, 1),
(1202, 'ZQ5555555P', 'COTTON WASTE', '2014-02-10', '2014-02-15', '09:37', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7566, 49257, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPQ-6392', 3, 1),
(1203, 'TE282988800101BN', 'ASSY FRONT PANEL OUTER RUBY RED', '2014-02-10', '2014-02-15', '09:37', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 15546.07, 27166.257, 28596.06, 7566, 49257, 'MATARA', 'X', 'B', 5, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPQ-6392', 3, 1),
(1204, 'TE282954400129', 'HEAD LAMP RH WITH MOTOR', '2014-02-10', '2014-02-15', '09:37', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 2646.37, 4522.56, 4522.56, 7566, 49257, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPQ-6392', 3, 1),
(1205, 'TE885433020909', 'REPAIR KIT KING PIN 909 STD. FULL', '2014-02-10', '2014-02-10', '09:57', '721M0002', 'F D Motors (Pvt) Ltd', 1, 6673.48, 9533.2638, 11485.86, 1001554, 49260, 'MATARA', 'X', 'A', 17, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(1206, 'ZQ5555555P', 'COTTON WASTE', '2014-02-10', '2014-02-10', '09:08', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7520, 49252, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPU-6583', 3, 1),
(1207, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-10', '2014-02-10', '09:08', '821C9900', 'Cash Sales Retail -Matara Service -', 2.25, 431.2164, 1343.9025, 1343.9025, 7520, 49252, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPU-6583', 3, 1),
(1208, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-10', '2014-02-10', '09:08', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 241.7491, 420.82, 420.82, 7520, 49252, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPU-6583', 3, 1),
(1209, 'TE571718139904', 'SPIN ON OIL FILTER', '2014-02-10', '2014-02-10', '09:08', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 209.2497, 340.22, 340.22, 7520, 49252, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPU-6583', 3, 1),
(1210, 'ZQ5555555P', 'COTTON WASTE', '2014-02-10', '2014-02-10', '09:04', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 5.5222, 7.18, 7.31, 3004630, 49253, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-8651', 3, 1),
(1211, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-10', '2014-02-10', '09:04', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 0.25, 431.2164, 140.145, 149.3225, 3004630, 49253, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-8651', 3, 1),
(1212, 'ZQ5555555P', 'COTTON WASTE', '2014-02-10', '2014-02-10', '08:39', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7519, 49255, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-7047', 3, 1),
(1213, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-10', '2014-02-10', '08:39', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7519, 49255, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-7047', 3, 1),
(1214, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-10', '2014-02-10', '08:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7519, 49255, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-7047', 3, 1),
(1215, 'TE278801135301', 'SUMP GASKET', '2014-02-10', '2014-02-10', '08:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 212.8761, 387.06, 387.06, 7519, 49255, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-7047', 3, 1),
(1216, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-10', '2014-02-10', '08:39', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1605.42, 1605.42, 7519, 49255, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-7047', 3, 1),
(1217, 'VE283442990105', 'FRONT KIT WHEEL CYLINDER : MINOR', '2014-02-17', '2014-02-17', '17:03', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 110.13, 218.22, 218.22, 7582, 49470, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKT-0961', 3, 1),
(1218, 'ZQ5555555P', 'COTTON WASTE', '2014-02-17', '2014-02-17', '16:57', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7582, 49470, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKT-0961', 3, 1),
(1219, 'ZQ2010164', 'BRAKE FLUID DOT4[P-164]', '2014-02-17', '2014-02-17', '16:57', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 1325.6267, 385.9375, 385.9375, 7582, 49470, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKT-0961', 3, 1),
(1220, 'ZQS890-323', 'SILICON SPECIAL250 BLACK', '2014-02-10', '2014-02-10', '08:35', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 883.93, 1149.11, 1149.11, 3004630, 49253, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-8651', 3, 1),
(1221, 'ZQ5555555P', 'COTTON WASTE', '2014-02-10', '2014-02-10', '08:29', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7517, 49256, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-4217', 3, 1),
(1222, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-10', '2014-02-10', '08:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7517, 49256, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-4217', 3, 1),
(1223, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-10', '2014-02-10', '08:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 423.4993, 680, 680, 7517, 49256, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-4217', 3, 1),
(1224, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-10', '2014-02-10', '08:29', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7517, 49256, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-4217', 3, 1),
(1225, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-10', '2014-02-10', '08:29', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7517, 49256, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-4217', 3, 1),
(1226, 'VE283442990105', 'FRONT KIT WHEEL CYLINDER : MINOR', '2014-02-17', '2014-02-17', '16:24', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 110.13, 218.22, 218.22, 7009, 49474, 'MATARA', 'X', 'A', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKT-0961', 3, 1),
(1227, 'ZQS892-00112', 'RADIATOR COOLENT', '2014-02-17', '2014-02-17', '16:01', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 729.2336, 948, 1033.04, 3004653, 49444, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-4448', 3, 1),
(1228, 'TE571720109903', 'WATER PUMP ASSEMBLY (WITH LIQUID SEALANT', '2014-02-17', '2014-02-17', '16:01', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 3745.88, 4869.64, 7129.44, 3004653, 49444, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-4448', 3, 1),
(1229, 'TE268426807712', 'RUBBER  BELLOW -  G/S LEVER', '2014-01-27', '2014-02-10', '14:30', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 1, 191.39, 210.53, 334.86, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1230, 'ZQ2010176', 'CALTEX  RANDO  HDZ68 210LT', '2014-02-01', '2014-02-03', '19:53', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 2, 347.6775, 788, 788, 1000360, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1231, 'ZQ2010176', 'CALTEX  RANDO  HDZ68 210LT', '2014-02-01', '2014-02-03', '19:30', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 2, 347.6775, 788, 788, 1000361, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1232, 'TE205054200103', 'TANK KIT', '2014-02-01', '2014-02-03', '19:14', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 476.49, 619.44, 787.82, 3004601, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1233, 'TF17051002873', 'O" RING 28X3A NITRILE', '2014-01-27', '2014-02-10', '13:48', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 1, 7.3173, 8.05, 12.56, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1234, 'TE282933408602', 'SEALRACER(STUB AXLE)', '2014-02-09', '2014-02-09', '16:26', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 157.75, 258.3335, 271.93, 7516, 49250, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9666', 3, 1),
(1235, 'TE886325010001', 'GB 600 CLUTCH PLATE', '2014-02-17', '2014-02-17', '15:47', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 8618.57, 14390.334, 15147.72, 7007, 49468, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPLH-8746', 3, 1),
(1236, 'TE282946600108', 'DRAG LINK', '2014-01-20', '2014-02-17', '15:15', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2116.7312, 3670.09, 3670.09, 7006, 48509, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', NULL, NULL, 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(1237, 'TEF002H20306', 'FINE  FILTER  ASSY.', '2014-02-17', '2014-02-17', '13:18', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 793.09, 2536.96, 2536.96, 7005, 49467, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLJ-8348', 3, 1),
(1238, 'ZQS890-323', 'SILICON SPECIAL250 BLACK', '2014-02-17', '2014-02-17', '12:54', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 883.93, 1149.11, 1149.11, 3004649, 49335, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-5091', 3, 1),
(1239, 'ZQ1020001', 'KEROSENE OIL', '2014-02-17', '2014-02-17', '12:54', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 109.28, 142.06, 142.06, 3004649, 49335, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-5091', 3, 1),
(1240, 'DO7528', 'DOUBLE FILAMENT', '2014-02-17', '2014-02-17', '12:53', '821C9901', 'Cash Sales Retail -Matara Service -         VAT', 1, 30, 39, 39, 7578, 49443, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPPU-2969', 3, 1),
(1241, 'TE285126200115', 'SYNCHRO KIT(1/2 SPEED)', '2014-02-17', '2014-02-17', '12:44', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 296.81, 435.537, 458.46, 7004, 49463, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPV-2894', 3, 1),
(1242, 'ZQMOBIL SUPER 15W40', 'MOBIL SUPER 15W40', '2014-02-17', '2014-02-17', '12:38', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 3, 538.9615, 1778.58, 2089.29, 2012458, 49445, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8156', 3, 1),
(1243, 'ZQ5555555P', 'COTTON WASTE', '2014-02-17', '2014-02-17', '12:38', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 2, 5.5222, 12.14, 14.62, 2012458, 49445, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8156', 3, 1),
(1244, 'VE570518130102', 'ASSY OIL FILTER', '2014-02-17', '2014-02-17', '12:38', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 1, 255.2508, 280.78, 467.23, 2012458, 49445, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8156', 3, 1);
INSERT INTO `tbl_all_sales` (`all_sales_id`, `part_no`, `description`, `date_decar`, `date_edit`, `time`, `acc_no`, `customer_name`, `qty`, `cost_price`, `selling_val`, `retail_val`, `invoice`, `wip`, `location`, `in_s`, `de`, `disc`, `s_e_name`, `s_e_code`, `authorised_by`, `authorised_by_code`, `creating_op`, `creating_op_code`, `vehicle_reg_no`, `area_id`, `status`) VALUES
(1245, 'VE283449205306', 'GASKET(FOR CATALYTIC CONVERTE', '2014-02-17', '2014-02-17', '12:38', '117I0501', 'VSD-P\\C W\\S-COLOMBO-FREE SERVICE', 1, 86.77, 95.45, 228.41, 2012458, 49445, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPKU-8156', 3, 1),
(1246, 'ZQ5555555P', 'COTTON WASTE', '2014-02-17', '2014-02-17', '12:33', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7580, 49454, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-3977', 3, 1),
(1247, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-17', '2014-02-17', '12:33', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7580, 49454, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-3977', 3, 1),
(1248, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-17', '2014-02-17', '12:33', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 423.4993, 680, 680, 7580, 49454, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-3977', 3, 1),
(1249, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-17', '2014-02-17', '12:33', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7580, 49454, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-3977', 3, 1),
(1250, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-17', '2014-02-17', '12:33', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7580, 49454, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-3977', 3, 1),
(1251, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-17', '2014-02-17', '12:33', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 509.1609, 1605.42, 1605.42, 7580, 49454, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-3977', 3, 1),
(1252, 'TE551747100150', 'ASSY. FUEL TANK CAP( M/S JAY SWITCHES)', '2014-02-17', '2014-02-17', '12:32', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 600.36, 980.115, 1031.7, 7003, 49461, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPR-6033', 3, 1),
(1253, 'TE254701155325', 'GASKET CAP CY/HD COVER TC', '2014-02-17', '2014-02-17', '12:22', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 8.952, 15.57, 15.57, 7002, 49462, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPQ-9478', 3, 1),
(1254, 'TE279001159905', 'CAP CYL/HEAD COVER', '2014-02-17', '2014-02-17', '12:22', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 115.51, 198.78, 198.78, 7002, 49462, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPQ-9478', 3, 1),
(1255, 'TE282941100118', 'U,J,CROSS KIT', '2014-02-17', '2014-02-17', '12:22', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1201.3944, 1994.81, 1994.81, 7002, 49462, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPQ-9478', 3, 1),
(1256, 'TE264126800224', 'ASSY BALL JOINT RH THREADS', '2014-02-17', '2014-02-17', '12:22', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 486.0807, 897.26, 897.26, 7002, 49462, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPQ-9478', 3, 1),
(1257, 'ZQACE262', 'ACE GEAR LEVER BALL JOINT', '2014-02-17', '2014-02-17', '12:22', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 185, 481, 481, 7002, 49462, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPQ-9478', 3, 1),
(1258, 'TE285035300166', 'GEAR AND PINION ASSY - HYPOID DRIVE', '2014-02-17', '2014-02-17', '12:32', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 13029.67, 21624.1945, 22762.31, 7003, 49461, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPR-6033', 3, 1),
(1259, 'TE552354400115', 'ACE FACELIFT HEAD LAMP RH', '2014-02-17', '2014-02-17', '16:12', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 6105.3, 10443.44, 10443.44, 7008, 49460, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'SPPW-8813', 3, 1),
(1260, 'TE265129100148', 'REPAIR KIT MASTER CYL', '2014-02-17', '2014-02-17', '11:30', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 230.8136, 388, 388, 7001, 49458, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', NULL, 3, 1),
(1261, 'TE265429100156', 'SL/CY REP KIT(MINOR)', '2014-02-17', '2014-02-17', '11:30', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 230.13, 399.94, 399.94, 7001, 49458, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', NULL, 3, 1),
(1262, 'ZQ5555555P', 'COTTON WASTE', '2014-02-17', '2014-02-17', '11:21', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 2, 5.5222, 14.36, 14.62, 3004651, 49450, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPPW-5919', 3, 1),
(1263, 'TEL01402000069', 'STARTER MOTOR', '2014-02-17', '2014-02-17', '11:21', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 19373.47, 25185.51, 32156.33, 3004651, 49450, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPPW-5919', 3, 1),
(1264, 'ZQS502-161', 'CABLE BAND BLACK PLASTIC', '2014-02-17', '2014-02-17', '11:03', '821I0502', 'Matara Service--COST OF SALES', 2, 17.86, 39.3, 46.42, 2012456, 49442, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-9794', 3, 1),
(1265, 'ZQS892-00112', 'RADIATOR COOLENT', '2014-02-09', '2014-02-09', '16:13', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 606.717, 1566.96, 1566.96, 7515, 49248, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SGLH-8139', 3, 1),
(1266, 'ZQ5555555P', 'COTTON WASTE', '2014-02-09', '2014-02-09', '16:13', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7515, 49248, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SGLH-8139', 3, 1),
(1267, 'TE265146600102', 'CROSS', '2014-02-09', '2014-02-09', '16:13', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1019.7534, 1748.266, 1840.28, 7515, 49248, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SGLH-8139', 3, 1),
(1268, 'TE252750100249', 'RADIATOR RESERVE WATER TANK', '2014-02-09', '2014-02-09', '16:13', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5554.32, 9126.84, 9607.2, 7515, 49248, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SGLH-8139', 3, 1),
(1269, 'TE264040100101', 'WHEEL NUT', '2014-02-17', '2014-02-17', '10:56', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 159.8, 539.92, 539.92, 7000, 49453, 'MATARA', 'X', 'A', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLH-5947', 3, 1),
(1270, 'ZQ5555555P', 'COTTON WASTE', '2014-02-17', '2014-02-17', '10:42', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7577, 49451, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPNB-4884', 3, 1),
(1271, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-17', '2014-02-17', '10:42', '821C9900', 'Cash Sales Retail -Matara Service -', 7, 431.2164, 4181.03, 4181.03, 7577, 49451, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPNB-4884', 3, 1),
(1272, 'TE269533403101', 'HUB BEARING OUTER', '2014-02-09', '2014-02-09', '15:56', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 605.8695, 984.143, 1035.94, 7516, 49250, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9666', 3, 1),
(1273, 'ZQ5555555P', 'COTTON WASTE', '2014-02-09', '2014-02-09', '14:05', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7516, 49250, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9666', 3, 1),
(1274, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-09', '2014-02-09', '14:05', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7516, 49250, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9666', 3, 1),
(1275, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-09', '2014-02-09', '14:05', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7516, 49250, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9666', 3, 1),
(1276, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-17', '2014-02-17', '10:42', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 241.7491, 841.64, 841.64, 7577, 49451, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPNB-4884', 3, 1),
(1277, 'TE253418130169', 'ASSY.  OIL  FILTER', '2014-02-17', '2014-02-17', '10:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 885.1168, 1958.21, 1958.21, 7577, 49451, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPNB-4884', 3, 1),
(1278, 'DO7528', 'DOUBLE FILAMENT', '2014-02-01', '2014-02-03', '18:47', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 30, 39, 39, 1000361, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1279, 'TE252701155302', 'GASKET TAPPET COVER', '2014-02-17', '2014-02-17', '10:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 361.5506, 626.58, 626.58, 7577, 49451, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPNB-4884', 3, 1),
(1280, 'DO7528', 'DOUBLE FILAMENT', '2014-02-01', '2014-02-03', '18:42', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 30, 39, 39, 1000361, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1281, 'DO5008', 'SINGLE FILAMENT (SMALL)', '2014-02-01', '2014-02-03', '18:42', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 20, 39.56, 39.56, 1000361, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1282, 'DO5008', 'SINGLE FILAMENT (SMALL)', '2014-02-01', '2014-02-03', '18:22', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 2, 20, 79.12, 79.12, 1000360, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1283, 'ZQ5555555P', 'COTTON WASTE', '2014-02-01', '2014-02-03', '18:06', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 2, 5.5759, 14.62, 14.62, 1000360, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1284, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-01', '2014-02-03', '18:06', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 15, 409.65, 7999.5, 7999.5, 1000360, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1285, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-01', '2014-02-03', '18:06', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 541.3676, 850.28, 850.28, 1000360, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1286, 'TE278609999920', 'STRAINER FUEL', '2014-02-01', '2014-02-03', '18:06', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 255.13, 412.18, 412.18, 1000360, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1287, 'TE278609119904', 'FUEL FILTER', '2014-02-01', '2014-02-03', '18:06', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 464.0531, 741.45, 741.45, 1000360, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1288, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-01', '2014-02-03', '18:06', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 663.9671, 1092.85, 1092.85, 1000360, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1289, 'ZQ1020001', 'KEROSENE OIL', '2014-02-09', '2014-02-09', '14:05', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7516, 49250, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9666', 3, 1),
(1290, 'TE278607989915', 'DRAIN  VALVE', '2014-02-01', '2014-02-03', '18:06', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 285.4061, 475.43, 475.43, 1000360, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1291, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-09', '2014-02-09', '14:05', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 58.6973, 214.66, 214.66, 7516, 49250, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9666', 3, 1),
(1292, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-09', '2014-02-09', '14:05', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 597.664, 629.12, 7516, 49250, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9666', 3, 1),
(1293, 'TE266733757802', 'OIL SEAL', '2014-01-27', '2014-02-10', '11:08', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 2, 1349.4367, 2968.76, 4802.24, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPD-8404', 3, 1),
(1294, 'ZQ5555555P', 'COTTON WASTE', '2014-01-27', '2014-02-10', '09:50', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 2, 5.5759, 12.14, 14.62, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1295, 'TE265442300159', 'KIT BRAKE LINING NON-ASB AF2873', '2014-01-27', '2014-02-10', '09:50', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 1, 1543.3, 1697.63, 2731.19, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1296, 'TE267872300114', 'REG HANDLE', '2014-02-09', '2014-02-09', '14:05', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 91.327, 161.9275, 170.45, 7516, 49250, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9666', 3, 1),
(1297, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-09', '2014-02-09', '14:05', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1525.149, 1605.42, 7516, 49250, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9666', 3, 1),
(1298, 'TE265442100135', 'KIT BRAKE PAD', '2014-01-27', '2014-02-10', '09:50', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 1, 3229.5134, 3551.88, 5589.74, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1299, 'MN000094 004016', 'COTTON PIN', '2014-02-09', '2014-02-09', '14:05', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1.65, 4.3, 4.3, 7516, 49250, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPT-9666', 3, 1),
(1300, 'TE275454209904', 'SPEEDOCABLE 3200MM', '2014-02-09', '2014-02-09', '13:28', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 875.63, 1640.76, 1640.76, 6962, 49249, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-0052', 3, 1),
(1301, 'IGDTWIST 13W/827 E27', 'DTWIST 13W/827 E27', '2014-01-13', '2014-02-03', '12:50', '821I0502', 'Matara Service--COST OF SALES', 1, 219.16, 241.08, 482.14, 2012347, 47918, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'GENARAL', 3, 1),
(1302, 'OG85224WT-85024', 'WD40 ANTI RUST 412ML', '2014-01-13', '2014-02-03', '12:50', '821I0502', 'Matara Service--COST OF SALES', 1, 642.86, 707.15, 707.15, 2012347, 47918, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'GENARAL', 3, 1),
(1303, 'ZQ5555555P', 'COTTON WASTE', '2014-02-01', '2014-02-03', '17:14', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 3, 5.5759, 21.93, 21.93, 1000361, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1304, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-01', '2014-02-03', '17:14', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 15, 409.65, 7999.5, 7999.5, 1000361, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1305, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-01', '2014-02-03', '17:14', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 541.3676, 850.28, 850.28, 1000361, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1306, 'TE278609999920', 'STRAINER FUEL', '2014-02-01', '2014-02-03', '17:14', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 255.13, 412.18, 412.18, 1000361, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1307, 'TE278609119904', 'FUEL FILTER', '2014-02-01', '2014-02-03', '17:14', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 464.0531, 741.45, 741.45, 1000361, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1308, 'ZQ5555555P', 'COTTON WASTE', '2014-02-17', '2014-02-17', '10:27', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7583, 49447, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-4685', 3, 1),
(1309, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-17', '2014-02-17', '10:27', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7583, 49447, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-4685', 3, 1),
(1310, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-17', '2014-02-17', '10:27', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7583, 49447, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-4685', 3, 1),
(1311, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-17', '2014-02-17', '10:27', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 509.1609, 1605.42, 1605.42, 7583, 49447, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPS-4685', 3, 1),
(1312, 'VE283442990103', 'FRONT KIT SHOE ASSEMBLY COMPLETE', '2014-02-17', '2014-02-17', '10:25', '821C9901', 'Cash Sales Retail -Matara Service -         VAT', 1, 986.34, 1620.52, 1620.52, 7578, 49443, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPPU-2969', 3, 1),
(1313, 'ZQS890-323', 'SILICON SPECIAL250 BLACK', '2014-02-17', '2014-02-17', '09:44', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 883.93, 1149.11, 1149.11, 3004650, 49449, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-4526', 3, 1),
(1314, 'ZQ5555555P', 'COTTON WASTE', '2014-02-17', '2014-02-17', '09:44', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 2, 5.5222, 14.36, 14.62, 3004650, 49449, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-4526', 3, 1),
(1315, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-17', '2014-02-17', '09:44', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7579, 49449, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-4526', 3, 1),
(1316, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-17', '2014-02-17', '09:44', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7579, 49449, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-4526', 3, 1),
(1317, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-01', '2014-02-03', '17:14', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 663.9671, 1092.85, 1092.85, 1000361, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1318, 'TE278607989915', 'DRAIN  VALVE', '2014-02-01', '2014-02-03', '17:14', '821C0010', 'Cosmic Construction ( Pvt) Ltd', 1, 285.4061, 475.43, 475.43, 1000361, 48923, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0558', 3, 1),
(1319, 'TE279005107810', 'CAM SHAFT OIL SEAL', '2014-02-17', '2014-02-17', '09:44', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 52.3257, 68.02, 123.12, 3004650, 49449, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-4526', 3, 1),
(1320, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-17', '2014-02-17', '09:44', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 262.9967, 341.9, 458.4, 3004650, 49449, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPW-4526', 3, 1),
(1321, 'ZQ5555555P', 'COTTON WASTE', '2014-02-09', '2014-02-11', '12:38', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7531, 49084, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-6668', 3, 1),
(1322, 'TE253420156310', 'V BELT COGGED 925MM LONG', '2014-02-09', '2014-02-11', '12:38', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 621.16, 1043.87, 1043.87, 7531, 49084, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-6668', 3, 1),
(1323, 'TE285126207803', 'OIL SEAL MAIN SHAFT 38X48X8', '2014-02-09', '2014-02-15', '10:53', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 325.964, 423.75, 539.91, 3004646, 49165, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPV-6797', 3, 1),
(1324, 'TE252520100116', 'ASSY,WATER PUMP', '2014-02-09', '2014-02-11', '10:14', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 6567.39, 10624.8285, 11184.03, 7531, 49084, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-6668', 3, 1),
(1325, 'ZQ5555555P', 'COTTON WASTE', '2014-02-09', '2014-02-11', '09:55', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7538, 49165, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPV-6797', 3, 1),
(1326, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-09', '2014-02-11', '09:55', '821C9900', 'Cash Sales Retail -Matara Service -', 5.5, 431.2164, 3285.095, 3285.095, 7538, 49165, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPV-6797', 3, 1),
(1327, 'TE265429100157', 'SL CY REP KIT(MAJOR)', '2014-02-01', '2014-02-01', '17:06', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 584.9625, 1032.43, 1032.43, 6904, 49009, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLC-4159', 3, 1),
(1328, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-09', '2014-02-11', '09:55', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7538, 49165, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPV-6797', 3, 1),
(1329, 'ZQ1020001', 'KEROSENE OIL', '2014-02-09', '2014-02-11', '09:55', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7538, 49165, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPV-6797', 3, 1),
(1330, 'TE279018130106', 'DIESEL OIL FILTER', '2014-02-09', '2014-02-11', '09:55', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 499.2567, 908.23, 908.23, 7538, 49165, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPV-6797', 3, 1),
(1331, 'TE272425400140', '200 DIA. CLUTCH COVER ASSY.(TCIC) - VALE', '2014-02-09', '2014-02-15', '09:55', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 3452.48, 4499.65, 5805.48, 3004646, 49165, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPV-6797', 3, 1),
(1332, 'TE265442100135', 'KIT BRAKE PAD', '2014-02-01', '2014-02-01', '15:57', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 3228.98, 5589.74, 5589.74, 7450, 48990, 'MATARA', 'X', 'B', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'WPLB-7454', 3, 1),
(1333, 'ZQ5555555P', 'COTTON WASTE', '2014-02-01', '2014-02-10', '15:31', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5759, 21.93, 21.93, 7525, 48537, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPNA-3706', 3, 1),
(1334, 'TE886325010063', 'STAR BUS CLUTCH PLATE', '2014-02-01', '2014-02-10', '15:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 6915.51, 12335.08, 12335.08, 7525, 48537, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPNA-3706', 3, 1),
(1335, 'TE886325010051', 'PRESSURE PLATE 330 DIA COIL TYPE', '2014-02-01', '2014-02-10', '15:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 10605.74, 18387.81, 18387.81, 7525, 48537, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPNA-3706', 3, 1),
(1336, 'TE581225601602', 'OFFER-DRG. ASSY. CLUTCH', '2014-02-01', '2014-02-10', '15:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 845.36, 3524.39, 3524.39, 7525, 48537, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPNA-3706', 3, 1),
(1337, 'ZQ5555555P', 'COTTON WASTE', '2014-02-17', '2014-02-17', '08:47', '821C9901', 'Cash Sales Retail -Matara Service -         VAT', 3, 5.5222, 21.93, 21.93, 7578, 49443, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPU-2969', 3, 1),
(1338, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-17', '2014-02-17', '08:47', '821C9901', 'Cash Sales Retail -Matara Service -         VAT', 2.25, 431.2164, 1343.9025, 1343.9025, 7578, 49443, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPU-2969', 3, 1),
(1339, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-17', '2014-02-17', '08:47', '821C9901', 'Cash Sales Retail -Matara Service -         VAT', 0.25, 477.36, 215, 215, 7578, 49443, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPU-2969', 3, 1),
(1340, 'ZQ1020001', 'KEROSENE OIL', '2014-02-17', '2014-02-17', '08:47', '821C9901', 'Cash Sales Retail -Matara Service -         VAT', 1, 109.28, 110, 110, 7578, 49443, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPU-2969', 3, 1),
(1341, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-17', '2014-02-17', '08:47', '821C9901', 'Cash Sales Retail -Matara Service -         VAT', 1, 241.7491, 420.82, 420.82, 7578, 49443, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPU-2969', 3, 1),
(1342, 'TE571718139904', 'SPIN ON OIL FILTER', '2014-02-17', '2014-02-17', '08:47', '821C9901', 'Cash Sales Retail -Matara Service -         VAT', 1, 209.2497, 340.22, 340.22, 7578, 49443, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPU-2969', 3, 1),
(1343, 'MN000094 004016', 'COTTON PIN', '2014-02-17', '2014-02-17', '08:47', '821C9901', 'Cash Sales Retail -Matara Service -         VAT', 2, 1.65, 4.3, 4.3, 7578, 49443, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPU-2969', 3, 1),
(1344, 'ZQMOBIL SUPER 15W40', 'MOBIL SUPER 15W40', '2014-02-17', '2014-02-17', '08:39', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 538.9615, 2089.29, 2089.29, 7576, 49440, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKR-6927', 3, 1),
(1345, 'ZQ5555555P', 'COTTON WASTE', '2014-02-17', '2014-02-17', '08:39', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7576, 49440, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKR-6927', 3, 1),
(1346, 'VE570518130102', 'ASSY OIL FILTER', '2014-02-17', '2014-02-17', '08:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.2508, 467.23, 467.23, 7576, 49440, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKR-6927', 3, 1),
(1347, 'VE570509130106', 'ASSY AIR FILTER ELEMENT', '2014-02-17', '2014-02-17', '08:39', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 622.43, 1027.64, 1027.64, 7576, 49440, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKR-6927', 3, 1),
(1348, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-16', '2014-02-16', '15:00', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 431.2164, 149.3225, 149.3225, 7574, 49435, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-0507', 3, 1),
(1349, 'ZQACE262', 'ACE GEAR LEVER BALL JOINT', '2014-02-16', '2014-02-16', '14:57', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 185, 481, 481, 7573, 49434, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-8293', 3, 1),
(1350, 'TE264126800224', 'ASSY BALL JOINT RH THREADS', '2014-02-16', '2014-02-16', '14:57', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 486.0807, 807.534, 897.26, 7573, 49434, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-8293', 3, 1),
(1351, 'TE279005107810', 'CAM SHAFT OIL SEAL', '2014-02-16', '2014-02-16', '13:09', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 52.3257, 110.808, 123.12, 7573, 49434, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-8293', 3, 1),
(1352, 'TE272425200147', '200 DIA. ASSY. CLUTCH DISC-VALEO', '2014-02-09', '2014-02-15', '09:55', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 4380.36, 5694.47, 7669.77, 3004646, 49165, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPV-6797', 3, 1),
(1353, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-09', '2014-02-11', '09:55', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1605.42, 1605.42, 7538, 49165, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPV-6797', 3, 1),
(1354, 'MN000094 004016', 'COTTON PIN', '2014-02-09', '2014-02-11', '09:55', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1.65, 4.3, 4.3, 7538, 49165, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPV-6797', 3, 1),
(1355, 'ZQS892-00112', 'RADIATOR COOLENT', '2014-02-09', '2014-02-15', '09:40', '821P0014', 'Mr MAN Pradeep', 2, 606.717, 2066.08, 2066.08, 1000364, 47827, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-4819', 3, 1),
(1356, 'ZQ5555555P', 'COTTON WASTE', '2014-02-09', '2014-02-15', '09:40', '821P0014', 'Mr MAN Pradeep', 2, 5.5222, 14.62, 14.62, 1000364, 47827, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-4819', 3, 1),
(1357, 'TE278850105803', 'HOSE THERMOSTAT', '2014-02-09', '2014-02-15', '09:40', '821P0014', 'Mr MAN Pradeep', 1, 83.63, 138.1015, 145.37, 1000364, 47827, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-4819', 3, 1),
(1358, 'TE278850105801', 'RADIATOR HOSE', '2014-02-09', '2014-02-15', '09:40', '821P0014', 'Mr MAN Pradeep', 1, 747.3332, 1219.9615, 1284.17, 1000364, 47827, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-4819', 3, 1),
(1359, 'TE278801155304', 'CY HEAD GASKET COVER', '2014-02-16', '2014-02-16', '13:09', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 262.9967, 412.56, 458.4, 7573, 49434, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-8293', 3, 1),
(1360, 'ZQ3730058', 'WATER SAND PAPER ''400''', '2014-02-01', '2014-02-01', '15:19', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 40.1422, 52, 52, 7450, 48990, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-7454', 3, 1),
(1361, 'TE282949100150', 'ASSY RUBBER HANGER BS 111', '2014-02-01', '2014-02-01', '14:54', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 141.9804, 243.45, 243.45, 6903, 49008, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-1560', 3, 1),
(1362, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-01', '2014-02-01', '14:47', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 409.65, 1599.9, 1599.9, 7447, 48945, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPS-6885', 3, 1),
(1363, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-01', '2014-02-01', '14:47', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 155.14, 155.14, 7447, 48945, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPS-6885', 3, 1),
(1364, 'ZQ1020001', 'KEROSENE OIL', '2014-02-01', '2014-02-01', '14:47', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7447, 48945, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPS-6885', 3, 1),
(1365, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-01', '2014-02-01', '14:47', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 56.4235, 214.66, 214.66, 7447, 48945, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPS-6885', 3, 1),
(1366, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-01', '2014-02-01', '14:47', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 396.3863, 629.12, 629.12, 7447, 48945, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPS-6885', 3, 1),
(1367, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-01', '2014-02-01', '14:47', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 506.863, 1605.42, 1605.42, 7447, 48945, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPS-6885', 3, 1),
(1368, 'ZQ5555555P', 'COTTON WASTE', '2014-02-16', '2014-02-16', '12:16', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7572, 49436, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPS-0738', 3, 1),
(1369, 'TE278850100110', 'ASSY RAD W/H FAN SHROUD & MOT', '2014-02-08', '2014-02-08', '18:15', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 12717.67, 21854.81, 21854.81, 6961, 49243, 'MATARA', 'X', 'A', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPW-1745', 3, 1),
(1370, 'D6RTTTPSM2STD', 'TATA 1313/1510 FRONT STD', '2014-02-08', '2014-02-08', '17:34', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2782.5513, 4285.989, 4762.21, 6960, 49244, 'MATARA', 'X', 'A', 10, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPLH-4971', 3, 1),
(1371, 'MN000094 004016', 'COTTON PIN', '2014-02-01', '2014-02-01', '14:47', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1.65, 4.3, 4.3, 7447, 48945, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPPS-6885', 3, 1),
(1372, 'TE257454209994', 'SPEEDOCABLE JIS 3600LG OF', '2014-02-01', '2014-02-03', '14:05', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 1228.53, 1597.09, 2120.73, 3004600, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1373, 'D6RTTTPSM1STD', 'TATA 1313/1510 FRONT STD', '2014-02-08', '2014-02-08', '17:34', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2251.4711, 2619, 2910, 6960, 49244, 'MATARA', 'X', 'A', 10, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPLH-4971', 3, 1),
(1374, 'TE278850105804', 'HOSE UCL (TRANITION)', '2014-02-16', '2014-02-16', '12:16', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 616.2762, 1144.31, 1144.31, 7572, 49436, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPS-0738', 3, 1),
(1375, 'TE282963000101', 'ASSY.SIDE WALL COMPLETE-LH', '2014-02-08', '2014-02-08', '18:15', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 9936.78, 18383.04, 18383.04, 6961, 49243, 'MATARA', 'X', 'A', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPW-1745', 3, 1),
(1376, 'TE282972000109', 'DOOR SHELL LH', '2014-02-08', '2014-02-08', '18:15', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 12108.19, 23962.77, 23962.77, 6961, 49243, 'MATARA', 'X', 'A', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPW-1745', 3, 1),
(1377, 'TE264154420188', 'ASSY BLINKER LAMP LH-12V-E''CER', '2014-02-16', '2014-02-16', '11:16', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 645.375, 1101.26, 1101.26, 6999, 49437, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLF-0693', 3, 1),
(1378, 'TE257682400110', 'ACC.KIT', '2014-02-01', '2014-02-03', '13:44', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 5625.46, 7446.04, 9717.49, 3004600, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1379, 'TE217154209916', 'INSTRUMENT CLUSTER', '2014-02-01', '2014-02-03', '13:44', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 13712.67, 17826.47, 23621.72, 3004600, 48922, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0559', 3, 1),
(1380, 'TE278809130117', 'SNORKEL ASSY', '2014-02-01', '2014-02-01', '12:50', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1025.93, 1873.37, 1873.37, 6902, 49006, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', NULL, 3, 1),
(1381, 'ZQ5555555P', 'COTTON WASTE', '2014-02-16', '2014-02-16', '10:54', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7573, 49434, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-8293', 3, 1),
(1382, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-16', '2014-02-16', '10:54', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7573, 49434, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-8293', 3, 1),
(1383, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-16', '2014-02-16', '10:54', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 423.4993, 680, 680, 7573, 49434, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-8293', 3, 1),
(1384, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-16', '2014-02-16', '10:54', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7573, 49434, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-8293', 3, 1),
(1385, 'ZQ1020001', 'KEROSENE OIL', '2014-02-16', '2014-02-16', '10:54', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7573, 49434, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-8293', 3, 1),
(1386, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-16', '2014-02-16', '10:54', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 58.6973, 193.194, 214.66, 7573, 49434, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-8293', 3, 1),
(1387, 'MN000094 004016', 'COTTON PIN', '2014-02-16', '2014-02-16', '10:54', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1.65, 4.3, 4.3, 7573, 49434, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-8293', 3, 1),
(1388, 'ZQ5555555P', 'COTTON WASTE', '2014-02-16', '2014-02-16', '10:44', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7571, 49433, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-9748', 3, 1),
(1389, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-16', '2014-02-16', '10:44', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 593.2978, 1275, 1275, 7571, 49433, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-9748', 3, 1),
(1390, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-16', '2014-02-16', '10:44', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 423.4993, 1360, 1360, 7571, 49433, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-9748', 3, 1),
(1391, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-16', '2014-02-16', '10:44', '821C9900', 'Cash Sales Retail -Matara Service -', 5.5, 431.2164, 3285.095, 3285.095, 7571, 49433, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-9748', 3, 1),
(1392, 'TE279018130106', 'DIESEL OIL FILTER', '2014-02-16', '2014-02-16', '10:44', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 499.2567, 908.23, 908.23, 7571, 49433, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-9748', 3, 1),
(1393, 'TE254709110119', 'DIESEL FILTER ( LUCAS )', '2014-02-16', '2014-02-16', '10:44', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 509.1609, 1605.42, 1605.42, 7571, 49433, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-9748', 3, 1),
(1394, 'TE551747100150', 'ASSY. FUEL TANK CAP( M/S JAY SWITCHES)', '2014-02-16', '2014-02-16', '10:37', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 600.36, 780.47, 1031.7, 3004648, 49432, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-2265', 3, 1),
(1395, 'TE281829100145', 'ASSY. CLUTCH CABLE', '2014-02-15', '2014-02-15', '16:09', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1030.899, 1730.197, 1821.26, 7568, 49430, 'MATARA', 'X', 'B', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPS-5102', 3, 1),
(1396, 'TE551747100150', 'ASSY. FUEL TANK CAP( M/S JAY SWITCHES)', '2014-02-15', '2014-02-15', '15:53', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 600.36, 1031.7, 1031.7, 6997, 49429, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPX-0748', 3, 1),
(1397, 'TE269026203805', 'SYNCHROCONE(3/4/5/SPEED)', '2014-02-15', '2014-02-15', '15:35', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 460.16, 790.46, 790.46, 6996, 49427, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPV-2894', 3, 1),
(1398, 'TE270225600101', 'ASSY.CL.RELS.BRG.WITH SLEEVE', '2014-02-15', '2014-02-15', '15:35', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1318.856, 3356.18, 3356.18, 6996, 49427, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPV-2894', 3, 1),
(1399, 'TE264354208217', 'SPEED SENSOR 12/24V (8 PULSE)', '2014-02-15', '2014-02-15', '15:35', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 718.96, 1237.35, 1237.35, 6996, 49427, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPV-2894', 3, 1),
(1400, 'ZQS892-00112', 'RADIATOR COOLENT', '2014-02-15', '2014-02-15', '14:40', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 729.2336, 948, 1033.04, 3004645, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(1401, 'TE279020127701', 'SEAL THERMOSTAT', '2014-02-15', '2014-02-15', '14:40', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 11.04, 14.35, 18.77, 3004645, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(1402, 'TE265429100156', 'SL/CY REP KIT(MINOR)', '2014-02-15', '2014-02-15', '13:57', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 230.13, 359.946, 399.94, 6995, 49420, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'WPPD-6042', 3, 1),
(1403, 'TE265129100148', 'REPAIR KIT MASTER CYL', '2014-02-15', '2014-02-15', '13:57', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 230.8136, 349.2, 388, 6995, 49420, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Chamal Wickramarchch', 'CNW', 'Linken Weerarathne', 'LIW', 'WPPD-6042', 3, 1);
INSERT INTO `tbl_all_sales` (`all_sales_id`, `part_no`, `description`, `date_decar`, `date_edit`, `time`, `acc_no`, `customer_name`, `qty`, `cost_price`, `selling_val`, `retail_val`, `invoice`, `wip`, `location`, `in_s`, `de`, `disc`, `s_e_name`, `s_e_code`, `authorised_by`, `authorised_by_code`, `creating_op`, `creating_op_code`, `vehicle_reg_no`, `area_id`, `status`) VALUES
(1404, 'TE282932107704', 'TIP INSERT', '2014-02-15', '2014-02-15', '13:08', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 4, 50.0483, 318.896, 335.68, 6994, 49425, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPV-6856', 3, 1),
(1405, 'TE269872300103', 'ASSY OUTER HANDLE RH', '2014-02-15', '2014-02-15', '13:08', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 211.23, 367.9635, 387.33, 6994, 49425, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPV-6856', 3, 1),
(1406, 'ZQ5555555P', 'COTTON WASTE', '2014-02-15', '2014-02-15', '13:07', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7569, 49380, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPR-1648', 3, 1),
(1407, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-15', '2014-02-15', '13:07', '821C9900', 'Cash Sales Retail -Matara Service -', 0.5, 593.2978, 425, 425, 7569, 49380, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPR-1648', 3, 1),
(1408, 'ZQ1020001', 'KEROSENE OIL', '2014-02-15', '2014-02-15', '13:07', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7569, 49380, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPR-1648', 3, 1),
(1409, 'TE270225103403', 'BUSH,UPPER (ON HOUSING)', '2014-02-01', '2014-02-01', '12:47', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 26.97, 44.35, 44.35, 6901, 49005, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-3770', 3, 1),
(1410, 'TEW01190000052', '720209/SPARE SEAL KIT', '2014-02-08', '2014-02-08', '12:15', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2559.72, 4377.12, 839.35, 6955, 45809, 'MATARA', 'X', 'A', 0, 'Inoka Rajapaksha', 'INR', 'Chamal Wickramarchch', 'CNW', 'Inoka Rajapaksha', 'INR', 'SPLJ-2648', 3, 1),
(1411, 'TE552367100101', 'ASSY.GLASS WINDSHIELD', '2014-02-08', '2014-02-08', '18:15', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 9642.38, 17838.41, 17838.41, 6961, 49243, 'MATARA', 'X', 'A', 0, 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'Dumidu Pathiranage', 'PLP', 'SPPW-1745', 3, 1),
(1412, 'TE270225103401', 'BUSH LOWER HSG', '2014-02-01', '2014-02-01', '12:47', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 16.71, 28.75, 28.75, 6901, 49005, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLE-3770', 3, 1),
(1413, 'TE282946207804', 'OIL SEAL', '2014-02-15', '2014-02-15', '13:07', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 237.4, 409.8775, 431.45, 7569, 49380, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPR-1648', 3, 1),
(1414, 'TE278615996302', 'BELT V RIBBED  CUMMINS (3935335)', '2014-02-01', '2014-02-01', '12:46', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 1560.0127, 2400.912, 2667.68, 6900, 49004, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLH-4971', 3, 1),
(1415, 'TE278609999920', 'STRAINER FUEL', '2014-02-01', '2014-02-01', '12:46', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 255.13, 370.962, 412.18, 6900, 49004, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLH-4971', 3, 1),
(1416, 'TE257682400127', 'ASSY WIPER ARM', '2014-02-01', '2014-02-01', '12:46', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 562.31, 1076.265, 1195.85, 6900, 49004, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLH-4971', 3, 1),
(1417, 'TE257682400125', 'ASSY WIPER ARM', '2014-02-01', '2014-02-01', '12:46', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 634.93, 1274.229, 1415.81, 6900, 49004, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLH-4971', 3, 1),
(1418, 'TE551715109901', 'STARTER MOTOR', '2014-02-08', '2014-02-10', '16:57', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 25347.31, 32951.5, 43625.74, 3004632, 48141, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-2328', 3, 1),
(1419, 'TE278609119904', 'FUEL FILTER', '2014-02-01', '2014-02-01', '12:46', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 464.0531, 667.305, 741.45, 6900, 49004, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLH-4971', 3, 1),
(1420, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-01', '2014-02-01', '12:46', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 663.9671, 983.565, 1092.85, 6900, 49004, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLH-4971', 3, 1),
(1421, 'DO7528', 'DOUBLE FILAMENT', '2014-02-08', '2014-02-08', '16:14', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 30, 78, 78, 7511, 49221, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0270', 3, 1),
(1422, 'TE278618139902', 'OIL FILTER CARTRIDGE', '2014-02-01', '2014-02-01', '12:46', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 541.3676, 765.252, 850.28, 6900, 49004, 'MATARA', 'X', 'A', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLH-4971', 3, 1),
(1423, 'TE257699100104', 'PIN', '2014-02-01', '2014-02-01', '12:35', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 117.5435, 198.74, 198.74, 6899, 49003, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLH-7530', 3, 1),
(1424, 'DO5008', 'SINGLE FILAMENT (SMALL)', '2014-02-08', '2014-02-08', '16:14', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 20, 79.12, 79.12, 7511, 49221, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0270', 3, 1),
(1425, 'ZQMOBIL SUPER 15W40', 'MOBIL SUPER 15W40', '2014-02-08', '2014-02-08', '16:12', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 538.9615, 2089.29, 2089.29, 7513, 49236, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKS-8178', 3, 1),
(1426, 'TE282946207802', 'OIL SEAL STEERING', '2014-02-15', '2014-02-15', '13:07', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 114.47, 195.32, 205.6, 7569, 49380, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPR-1648', 3, 1),
(1427, 'TE257689107128', 'GUIDE PLATE', '2014-02-01', '2014-02-01', '12:35', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 82.71, 152.39, 152.39, 6899, 49003, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLH-7530', 3, 1),
(1428, 'ZQ5555555P', 'COTTON WASTE', '2014-02-08', '2014-02-08', '16:12', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5.5222, 7.31, 7.31, 7513, 49236, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKS-8178', 3, 1),
(1429, 'TE253403103102', 'BALL BEARING', '2014-02-15', '2014-02-15', '13:07', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 277.5839, 465.3005, 489.79, 7569, 49380, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPR-1648', 3, 1),
(1430, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-01', '2014-02-01', '11:57', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 409.65, 133.325, 133.325, 7443, 48995, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-0740', 3, 1),
(1431, 'TE282949100150', 'ASSY RUBBER HANGER BS 111', '2014-02-01', '2014-02-01', '11:57', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 141.9804, 243.45, 243.45, 7443, 48995, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-0740', 3, 1),
(1432, 'ZQ5555555P', 'COTTON WASTE', '2014-02-01', '2014-02-03', '11:48', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 5.5759, 7.25, 7.31, 3004604, 49002, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', '01/N040421', 3, 1),
(1433, 'TE264354208217', 'SPEED SENSOR 12/24V (8 PULSE)', '2014-02-01', '2014-02-03', '11:48', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 718.96, 934.65, 1237.35, 3004604, 49002, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', '01/N040421', 3, 1),
(1434, 'ZQ5555555P', 'COTTON WASTE', '2014-02-01', '2014-02-01', '11:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5.5759, 7.31, 7.31, 7445, 49001, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'EPPU-4716', 3, 1),
(1435, 'TE285126806015', 'SELECT LEVER', '2014-02-01', '2014-02-01', '11:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 242.74, 462.69, 462.69, 7445, 49001, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'EPPU-4716', 3, 1),
(1436, 'ZQ5555555P', 'COTTON WASTE', '2014-02-01', '2014-02-01', '11:26', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5759, 29.24, 29.24, 7450, 48990, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-7454', 3, 1),
(1437, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-01', '2014-02-01', '11:26', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 155.14, 155.14, 7450, 48990, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-7454', 3, 1),
(1438, 'ZQ1020001', 'KEROSENE OIL', '2014-02-01', '2014-02-01', '11:26', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7450, 48990, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-7454', 3, 1),
(1439, 'TE265433407801', 'OIL SEAL FRONT HUB', '2014-02-01', '2014-02-01', '11:26', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 89.15, 298.62, 298.62, 7450, 48990, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-7454', 3, 1),
(1440, 'ZQ2010157', 'LANKA TRANSFLUID P157', '2014-02-15', '2014-02-17', '12:30', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 507.3481, 659.55, 659.55, 3004652, 49415, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-8744', 3, 1),
(1441, 'VE570518130102', 'ASSY OIL FILTER', '2014-02-08', '2014-02-08', '16:12', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.2508, 467.23, 467.23, 7513, 49236, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKS-8178', 3, 1),
(1442, 'TE265433403101', 'HUB BEARING FRONT INNER', '2014-02-01', '2014-02-01', '11:26', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 841.9964, 2769.6, 2769.6, 7450, 48990, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLB-7454', 3, 1),
(1443, 'ZQ5555555P', 'COTTON WASTE', '2014-02-01', '2014-02-01', '10:49', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5759, 14.62, 14.62, 7449, 48987, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-1838', 3, 1),
(1444, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-02-01', '2014-02-01', '10:49', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 593.2978, 779.12, 779.12, 7449, 48987, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-1838', 3, 1),
(1445, 'ZQ2010137', 'LANKA GEAR MP90', '2014-02-01', '2014-02-01', '10:49', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 423.4993, 553.27, 553.27, 7449, 48987, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-1838', 3, 1),
(1446, 'TE551754201611', 'VEHICLE SPEED SENSOR', '2014-02-15', '2014-02-15', '11:57', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 795.62, 1034.31, 1315.94, 3004641, 49422, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-4448', 3, 1),
(1447, 'TE282972500105', 'ASSY,WIND/REG LH', '2014-02-08', '2014-02-08', '15:15', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 898.16, 1557.28, 1557.28, 6959, 49235, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLG-3425', 3, 1),
(1448, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-01', '2014-02-01', '10:49', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 409.65, 1599.9, 1599.9, 7449, 48987, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-1838', 3, 1),
(1449, 'TE282954200106', 'ASSY TANK UNIT', '2014-02-01', '2014-02-03', '10:49', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 969.182, 1263.28, 1677.6, 3004605, 48987, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-1838', 3, 1),
(1450, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-01', '2014-02-01', '10:49', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 396.3863, 629.12, 629.12, 7449, 48987, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-1838', 3, 1),
(1451, 'TE282982400125', 'KIT WASHER SYSTEM', '2014-02-01', '2014-02-03', '10:46', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 1324.52, 1721.88, 2601.76, 3004602, 48989, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-8456', 3, 1),
(1452, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-01', '2014-02-01', '10:16', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 409.65, 133.325, 133.325, 7440, 48989, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-8456', 3, 1),
(1453, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-01', '2014-02-01', '10:05', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 633.208, 1129.01, 1129.01, 6898, 48999, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPS-5923', 3, 1),
(1454, 'ZQ5555555P', 'COTTON WASTE', '2014-02-08', '2014-02-08', '14:31', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7511, 49221, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0270', 3, 1),
(1455, 'TE278609999920', 'STRAINER FUEL', '2014-02-08', '2014-02-08', '14:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.13, 412.18, 412.18, 7511, 49221, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0270', 3, 1),
(1456, 'TE278609119904', 'FUEL FILTER', '2014-02-08', '2014-02-08', '14:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 464.0531, 741.45, 741.45, 7511, 49221, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0270', 3, 1),
(1457, 'TE278607989916', 'ELEMENT  WATER  SEPERATOR', '2014-02-08', '2014-02-08', '14:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 674.6612, 1092.85, 1092.85, 7511, 49221, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0270', 3, 1),
(1458, 'TE265129100167', 'CLUTCH SLAVE CYL', '2014-02-01', '2014-02-01', '09:56', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1263.59, 2021.4575, 2127.85, 6897, 48998, 'MATARA', 'X', 'A', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-3146', 3, 1),
(1459, 'TE278607989915', 'DRAIN  VALVE', '2014-02-08', '2014-02-08', '14:31', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 285.7365, 475.43, 475.43, 7511, 49221, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-0270', 3, 1),
(1460, 'ZQMOBILLUBSAE75W901L', 'MOBIL 75W90 (NANO GEAR )', '2014-02-08', '2014-02-09', '14:28', '821C9900', 'Cash Sales Retail -Matara Service -', 1.5, 1698.0958, 3311.67, 3311.67, 7514, 49216, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-9364', 3, 1),
(1461, 'ZQMOBIL SUPER 15W40', 'MOBIL SUPER 15W40', '2014-02-08', '2014-02-09', '14:28', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 538.9615, 2089.29, 2089.29, 7514, 49216, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-9364', 3, 1),
(1462, 'ZQ5555555P', 'COTTON WASTE', '2014-02-08', '2014-02-09', '14:28', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5222, 21.93, 21.93, 7514, 49216, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-9364', 3, 1),
(1463, 'VE570518130102', 'ASSY OIL FILTER', '2014-02-08', '2014-02-09', '14:28', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 255.2508, 420.507, 467.23, 7514, 49216, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-9364', 3, 1),
(1464, 'DO5008', 'SINGLE FILAMENT (SMALL)', '2014-02-01', '2014-02-02', '09:42', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 20, 39.56, 39.56, 7453, 48899, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SGLL-0394', 3, 1),
(1465, 'VE283447609903', 'FUEL FILTER', '2014-02-08', '2014-02-09', '14:28', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 160.37, 251.37, 279.3, 7514, 49216, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPKU-9364', 3, 1),
(1466, 'ZQ5555555P', 'COTTON WASTE', '2014-02-01', '2014-02-01', '09:11', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 5.5759, 21.93, 21.93, 7442, 48986, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-5262', 3, 1),
(1467, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-01', '2014-02-01', '09:11', '821C9900', 'Cash Sales Retail -Matara Service -', 8, 409.65, 4266.4, 4266.4, 7442, 48986, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-5262', 3, 1),
(1468, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-02-01', '2014-02-01', '09:11', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 242.143, 841.64, 841.64, 7442, 48986, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-5262', 3, 1),
(1469, 'TE253418130169', 'ASSY.  OIL  FILTER', '2014-02-01', '2014-02-01', '09:11', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 885.1317, 1958.21, 1958.21, 7442, 48986, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-5262', 3, 1),
(1470, 'ZQ5555555P', 'COTTON WASTE', '2014-01-25', '2014-02-10', '08:36', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 5, 5.5759, 30.35, 36.55, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1471, 'ZQ2010164', 'BRAKE FLUID DOT4[P-164]', '2014-01-25', '2014-02-10', '08:36', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 0.5, 1321.44, 729.095, 771.875, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1472, 'TE252701155302', 'GASKET TAPPET COVER', '2014-02-01', '2014-02-01', '09:11', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 361.5506, 626.58, 626.58, 7442, 48986, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPNB-5262', 3, 1),
(1473, 'TE551729100121', 'ASSY. CLUTCH CABLE', '2014-02-01', '2014-02-01', '09:07', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 924.38, 1201.69, 1672.64, 3004597, 48991, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-3063', 3, 1),
(1474, 'ZQ2010145', 'THUBAN  EP SAE 80W-90', '2014-01-25', '2014-02-10', '08:36', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 1.5, 593.2978, 978.945, 1275, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1475, 'ZQ2010137', 'LANKA GEAR MP90', '2014-01-25', '2014-02-10', '08:36', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 2, 423.4993, 931.7, 1360, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1476, 'TE257681100153', 'REAR VIEW MIRROR LH', '2014-02-01', '2014-02-01', '09:07', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 1683.309, 2853.41, 2853.41, 7441, 48993, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLI-1230', 3, 1),
(1477, 'ZQ2010123P', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-01-25', '2014-02-10', '08:36', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 7, 362.93, 2794.54, 4130, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1478, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-01-25', '2014-02-10', '08:36', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 0.5, 477.36, 262.55, 430, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1479, 'TV9451037407', 'FUEL FILTER (MICO)', '2014-01-25', '2014-02-10', '08:36', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 2, 242.143, 531.84, 841.64, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1480, 'ZQ5555555P', 'COTTON WASTE', '2014-02-08', '2014-02-08', '14:25', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 5.5222, 7.31, 7.31, 7512, 49218, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-2696', 3, 1),
(1481, 'TE254705116301', 'TIMING BELT', '2014-02-01', '2014-02-01', '08:22', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2257.8801, 3479.769, 3866.41, 6896, 48992, 'MATARA', 'X', 'A', 10, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPLF-4941', 3, 1),
(1482, 'TE254718130117', 'ASSY. OIL FILTER REDUCED LENGTH', '2014-01-25', '2014-02-10', '08:36', '821I0503', 'Matara Service-MTC OF MOTOR VEHICLES', 1, 806.2928, 886.92, 1462.74, 2012416, 48682, 'MATARA', 'X', 'B', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-8404', 3, 1),
(1483, 'TE265454509913', 'LOW OIL PRE/SWITCH', '2014-02-01', '2014-02-01', '08:14', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 283.59, 490.64, 490.64, 6895, 48988, 'MATARA', 'X', 'A', 0, 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'Priyantha kulathunga', 'PLG', 'SPPC-0973', 3, 1),
(1484, 'TE253420100124', 'WATER PUMP ASSLY', '2014-02-08', '2014-02-08', '14:25', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 4384.7777, 7598.76, 7598.76, 7512, 49218, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPQ-2696', 3, 1),
(1485, 'TE265443100133', 'MINOR KIT-TANDEM MASTER CYL', '2014-02-08', '2014-02-08', '13:30', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 407.8175, 706.29, 706.29, 6958, 49232, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLJ-9507', 3, 1),
(1486, 'TE284547100107', 'ASSY FUEL TANK CAP COMPLETE', '2014-02-08', '2014-02-08', '13:09', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 624.8208, 812.27, 1129.01, 3004628, 49219, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-2154', 3, 1),
(1487, 'TE282932104202', 'U  BOLT FRONT', '2014-02-08', '2014-02-08', '12:41', '531I0501', 'Colombo Vehicle Sales-FREE SERVICE', 1, 75.99, 83.59, 129.15, 2012399, 49219, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-2154', 3, 1),
(1488, 'TE279005107810', 'CAM SHAFT OIL SEAL', '2014-02-08', '2014-02-08', '12:34', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 52.3257, 123.12, 123.12, 6956, 49230, 'MATARA', 'X', 'A', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-6866', 3, 1),
(1489, 'TE266733750117', 'SERVICE KIT-AUTO HUB LOCK 4X4 VEHICLES', '2014-02-08', '2014-02-08', '13:04', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 2, 4875.45, 22091.26, 22091.26, 6957, 49229, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(1490, 'ZQ5555555P', 'COTTON WASTE', '2014-02-08', '2014-02-08', '12:15', '531I0501', 'Colombo Vehicle Sales-FREE SERVICE', 1, 5.5222, 6.07, 7.31, 2012399, 49219, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-2154', 3, 1),
(1491, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-08', '2014-02-08', '12:15', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 431.2164, 597.29, 597.29, 7510, 49219, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-2154', 3, 1),
(1492, 'TE282968900101', 'ASSY  DASH BOARD', '2014-02-15', '2014-02-15', '11:53', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 3084.58, 5050.728, 5611.92, 6993, 49423, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', NULL, 3, 1),
(1493, 'TE282932104202', 'U  BOLT FRONT', '2014-02-08', '2014-02-08', '12:15', '531I0501', 'Colombo Vehicle Sales-FREE SERVICE', 1, 75.99, 83.59, 129.15, 2012399, 49219, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPW-2154', 3, 1),
(1494, 'ZQ5555555P', 'COTTON WASTE', '2014-02-15', '2014-02-15', '11:24', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 5.5222, 14.62, 14.62, 7565, 49417, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-0064', 3, 1),
(1495, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-15', '2014-02-15', '11:24', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7565, 49417, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-0064', 3, 1),
(1496, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-15', '2014-02-15', '11:24', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 629.12, 629.12, 7565, 49417, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-0064', 3, 1),
(1497, 'TE278801135301', 'SUMP GASKET', '2014-02-15', '2014-02-15', '11:24', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 218.2631, 348.354, 387.06, 7565, 49417, 'MATARA', 'X', 'B', 10, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-0064', 3, 1),
(1498, 'TE270215409912', 'GLOW  PLUG', '2014-02-15', '2014-02-15', '11:22', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 1426.6057, 1854.59, 2543.52, 3004640, 49416, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPV-9941', 3, 1),
(1499, 'TE279005110103', 'ASSY,IDLER', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1167.87, 1823.468, 1919.44, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1500, 'TE279005110101', 'BELT TENSIONER', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2275.014, 3640.2765, 3831.87, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1501, 'TE254705116301', 'TIMING BELT', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2258.9715, 3673.0895, 3866.41, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1502, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 399.0146, 597.664, 629.12, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1503, 'TE279005157801', 'VALVE GUIDE SEAL', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 4, 81.6573, 544.882, 573.56, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1504, 'TE265172300105', 'HANDLE OUTER RH RHD', '2014-02-15', '2014-02-15', '11:14', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 798.98, 1273.038, 1340.04, 6992, 49421, 'MATARA', 'X', 'A', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLH-7533', 3, 1),
(1505, 'TE278801155303', 'GASKET CYL HEAD(1.8 THK)', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1446.4125, 2375.1615, 2500.17, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1506, 'TE278801135301', 'SUMP GASKET', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 212.8761, 367.707, 387.06, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1507, 'TE278803990113', 'PISTON RING SET', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1929.3421, 3216.6525, 3385.95, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1508, 'TE254701157814', 'OIL SEAL-CAM SHAFT', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 245.7693, 399.779, 420.82, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1509, 'TE257672502303', 'GLASS PANE REG WINDOW', '2014-02-15', '2014-02-15', '11:14', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 952.24, 1649.105, 1735.9, 6992, 49421, 'MATARA', 'X', 'A', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLH-7533', 3, 1),
(1510, 'TE279020127701', 'SEAL THERMOSTAT', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 11.04, 17.8315, 18.77, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1511, 'TE279020120102', 'ASSY THERMOSTAT-82 DEGSOT', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 720.4426, 1188.6875, 1251.25, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1512, 'TE278803990120', 'BIG;BEARING SET STD', '2014-02-08', '2014-02-08', '11:45', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 262.524, 417.0595, 439.01, 6952, 49227, 'MATARA', 'X', 'A', 5, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPLC-8018', 3, 1),
(1513, 'TE265442300159', 'KIT BRAKE LINING NON-ASB AF2873', '2014-02-15', '2014-02-15', '13:57', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 1543.3, 2458.071, 2731.19, 6995, 49420, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-6042', 3, 1),
(1514, 'TE265932100114', 'BALL JOINT ASSY.-UPPER W/B', '2014-02-08', '2014-02-08', '11:05', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1263.0115, 2171.31, 2171.31, 6951, 49226, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPQ-8261', 3, 1),
(1515, 'TE282646600117', 'ASSY TIE ROD', '2014-02-08', '2014-02-08', '11:05', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 2665.1675, 4478.84, 4478.84, 6951, 49226, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPQ-8261', 3, 1),
(1516, 'TE271942100115', 'KIT PAD ASSY.WITH PACKING', '2014-02-15', '2014-02-15', '13:57', '721C9901', 'Cash Sales Retail -Matara Spare Parts -           VAT', 1, 3158.85, 5034.276, 5593.64, 6995, 49420, 'MATARA', 'X', 'A', 10, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'WPPD-6042', 3, 1),
(1517, 'TE269026204611', 'SHIFTER SLEEVE(3/4 SPEED)', '2014-02-11', '2014-02-15', '12:20', '000W2821', 'Tata Commercial Vehicles Warranty Claims-A/C -Matara Service------------>tranfer to 151T0202', 1, 2764.31, 3593.6, 4502.41, 3004645, 49152, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Priyantha kulathunga', 'PLG', 'Linken Weerarathne', 'LIW', 'SPPV-2373', 3, 1),
(1518, 'TE265981100167', 'RV MIRROR OUTER RH', '2014-02-08', '2014-02-08', '11:53', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 945.09, 1604.54, 1604.54, 6954, 49222, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPQ-8344', 3, 1),
(1519, 'TE282949100150', 'ASSY RUBBER HANGER BS 111', '2014-02-08', '2014-02-08', '09:41', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 4, 141.9804, 973.8, 973.8, 6950, 49223, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPU-1240', 3, 1),
(1520, 'ZQ5555555P', 'COTTON WASTE', '2014-02-08', '2014-02-08', '08:57', '821C9900', 'Cash Sales Retail -Matara Service -', 4, 5.5222, 29.24, 29.24, 7509, 49217, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-7784', 3, 1),
(1521, 'ZQ2010123B', 'DELO GOLD SAE 15W 40W MULTIGRADE', '2014-02-08', '2014-02-08', '08:57', '821C9900', 'Cash Sales Retail -Matara Service -', 3, 431.2164, 1791.87, 1791.87, 7509, 49217, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-7784', 3, 1),
(1522, 'ZQ1070184', 'LANKA GREASE MP184K', '2014-02-08', '2014-02-08', '08:57', '821C9900', 'Cash Sales Retail -Matara Service -', 0.25, 477.36, 215, 215, 7509, 49217, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-7784', 3, 1),
(1523, 'ZQ1020001', 'KEROSENE OIL', '2014-02-08', '2014-02-08', '08:57', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 109.28, 110, 110, 7509, 49217, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-7784', 3, 1),
(1524, 'TE282933407803', 'FRONT HUB OIL SEAL', '2014-02-08', '2014-02-08', '08:57', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 58.6973, 203.927, 214.66, 7509, 49217, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-7784', 3, 1),
(1525, 'TE279018130101', 'OIL FILTER ELEMENT', '2014-02-08', '2014-02-08', '08:57', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 399.0146, 597.664, 629.12, 7509, 49217, 'MATARA', 'X', 'B', 5, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-7784', 3, 1),
(1526, 'MN000094 004016', 'COTTON PIN', '2014-02-08', '2014-02-08', '08:57', '821C9900', 'Cash Sales Retail -Matara Service -', 2, 1.65, 4.3, 4.3, 7509, 49217, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPPU-7784', 3, 1),
(1527, 'TE282949100150', 'ASSY RUBBER HANGER BS 111', '2014-02-08', '2014-02-08', '08:49', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 4, 141.9804, 973.8, 973.8, 6949, 49220, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPU-1240', 3, 1),
(1528, 'TE282929100140', 'ASSY. CLUTCH CABLE ACE BS IV', '2014-02-08', '2014-02-08', '08:49', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 769.43, 1340.46, 1340.46, 6949, 49220, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPU-1240', 3, 1),
(1529, 'TE270215409912', 'GLOW  PLUG', '2014-02-08', '2014-02-08', '08:49', '721C9900', 'Cash Sales Retail -Matara Spare Parts -', 1, 1426.6057, 2543.52, 2543.52, 6949, 49220, 'MATARA', 'X', 'A', 0, 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'Chamal Wickramarchch', 'CNW', 'SPPU-1240', 3, 1),
(1530, 'TEF002H20308', 'PRE FILTER SPIN ON PRIMARY', '2014-02-15', '2014-02-15', '10:37', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 878.0811, 1375.31, 1375.31, 7567, 49415, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-8744', 3, 1),
(1531, 'TEF002H20306', 'FINE  FILTER  ASSY.', '2014-02-15', '2014-02-15', '10:37', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 793.09, 1268.48, 1268.48, 7567, 49415, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-8744', 3, 1),
(1532, 'TE278609999920', 'STRAINER FUEL', '2014-02-15', '2014-02-15', '10:37', '821C9900', 'Cash Sales Retail -Matara Service -', 1, 257.13, 412.18, 412.18, 7567, 49415, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'SPLK-8744', 3, 1),
(1533, 'TE278609999920', 'STRAINER FUEL', '2014-02-15', '2014-02-16', '09:11', '821C0009', 'Cosmic Construction ( Pvt) Ltd', 1, 257.13, 412.18, 412.18, 1000365, 49392, 'MATARA', 'X', 'B', 0, 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'Linken Weerarathne', 'LIW', 'WPLL-1232', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternative_part`
--

CREATE TABLE IF NOT EXISTS `tbl_alternative_part` (
  `alternative_part_id` int(11) NOT NULL AUTO_INCREMENT,
  `alternative_part_no` varchar(300) NOT NULL,
  `alternative_part_desc` varchar(500) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`alternative_part_id`),
  KEY `fk_al_item_id_idx` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_alternative_part`
--

INSERT INTO `tbl_alternative_part` (`alternative_part_id`, `alternative_part_no`, `alternative_part_desc`, `item_id`, `added_date`, `added_time`, `status`) VALUES
(3, 'TE279023120152', 'TE279023120152', 14, '2014-02-01', '17:38:47', 1),
(8, 'TE252320123205', 'TE252320123205', 17, '2014-02-01', '20:10:47', 1),
(9, 'TE252320123205', 'TE252320123205', 17, '2014-02-01', '20:10:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apm`
--

CREATE TABLE IF NOT EXISTS `tbl_apm` (
  `apm_id` int(11) NOT NULL AUTO_INCREMENT,
  `apm_account_no` varchar(45) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `apm_name` varchar(45) DEFAULT NULL,
  `apm_tel` varchar(45) DEFAULT NULL,
  `apm_address` varchar(45) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `apm_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`apm_id`),
  KEY `b_id_idx` (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 7168 kB; (`branch_id`) REFER `dimo_lanka_web/tb' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_apm`
--

INSERT INTO `tbl_apm` (`apm_id`, `apm_account_no`, `branch_id`, `apm_name`, `apm_tel`, `apm_address`, `email_address`, `added_date`, `added_time`, `status`, `apm_code`) VALUES
(1, 'APM00001', 1, 'Kapila de Silva', '0116565433', 'Maharagama, Colombo.', NULL, '2014:01:21', '07:10:20', 1, NULL),
(2, 'APM0002', 3, 'Saman Kumara', '011265561', 'Weliweriya, Gampaha.', NULL, '2014:01:21', '07:11:27', 1, NULL),
(3, 'APM00003', 2, 'dinesh ', '0716889987', 'Siyambalape', 'shdinesh.99@gmail.com', '2014:01:21', '07:13:08', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE IF NOT EXISTS `tbl_area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_account_no` varchar(45) DEFAULT NULL,
  `area_name` varchar(45) DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `area_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`area_id`, `area_account_no`, `area_name`, `added_date`, `added_time`, `status`, `area_code`) VALUES
(1, 'A0001', 'VSD', '2014-02-04', '18:49:06', 1, '-'),
(2, 'A0002', 'KANDY', '2014-02-04', '18:49:21', 1, '2711'),
(3, 'A0003', 'MATARA', '2014-02-04', '18:49:30', 1, '2721'),
(4, 'A0004', 'COLOMBO', '2014-02-04', '18:50:19', 1, '2731'),
(5, 'A0005', 'KURUWITA', '2014-02-04', '18:50:30', 1, '2734'),
(6, 'A0006', 'KURUNEGALA', '2014-02-04', '18:50:44', 1, '2741'),
(7, 'A0007', 'JAFFNA', '2014-02-04', '18:51:05', 1, '2751'),
(8, 'A0008', 'ANURADHAPURA', '2014-02-04', '18:51:22', 1, '2761'),
(9, 'A0009', 'TRINCOMALEE', '2014-02-04', '18:51:38', 1, '2762'),
(10, 'A0010', 'AMPARA', '2014-02-04', '18:52:19', 1, '2771');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area_codes`
--

CREATE TABLE IF NOT EXISTS `tbl_area_codes` (
  `idtbl_area_codes` int(11) NOT NULL AUTO_INCREMENT,
  `symbol` varchar(45) DEFAULT NULL,
  `counter` varchar(45) DEFAULT NULL,
  `areaId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtbl_area_codes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_area_codes`
--

INSERT INTO `tbl_area_codes` (`idtbl_area_codes`, `symbol`, `counter`, `areaId`) VALUES
(1, 'A', 'Colombo Counter', 1),
(2, 'B', 'Siyabalape WS', 1),
(3, 'C', 'Siyabalape Counter', 1),
(4, 'E', 'Yakkala Counter', 1),
(5, 'Z', 'Unit Repair', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area_wise_budget`
--

CREATE TABLE IF NOT EXISTS `tbl_area_wise_budget` (
  `area_wise_budget_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `year` double NOT NULL,
  `month` int(11) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `budget_amount` double DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`area_wise_budget_id`),
  KEY `a_id_idx` (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_area_wise_budget`
--

INSERT INTO `tbl_area_wise_budget` (`area_wise_budget_id`, `area_id`, `year`, `month`, `added_date`, `budget_amount`, `added_time`, `status`) VALUES
(1, 1, 2014, 1, '2014-01-25', 0, '14:17:46', 1),
(2, 2, 2014, 1, '2014-01-25', 0, '14:17:46', 1),
(3, 3, 2014, 1, '2014-01-25', 0, '14:17:46', 1),
(4, 4, 2014, 1, '2014-01-25', 0, '14:17:46', 1),
(5, 1, 2014, 2, '2014-01-25', 60000, '14:18:32', 1),
(6, 2, 2014, 2, '2014-01-25', 0, '14:18:32', 1),
(7, 3, 2014, 2, '2014-01-25', 0, '14:18:32', 1),
(8, 4, 2014, 2, '2014-01-25', 0, '14:18:32', 1),
(9, 3, 2014, 3, '2014-01-25', 65000, '14:19:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE IF NOT EXISTS `tbl_bank` (
  `bank_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(45) DEFAULT NULL,
  `added_date` date NOT NULL DEFAULT '0000-00-00',
  `added_time` time NOT NULL DEFAULT '00:00:00',
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`bank_id`, `bank_name`, `added_date`, `added_time`, `status`) VALUES
(1, 'Sampath Bank', '2014-01-12', '14:31:31', 1),
(2, 'Commercial Bank', '2014-01-12', '14:33:15', 1),
(3, 'BOC', '2014-01-12', '14:34:07', 1),
(4, 'HSBC', '2014-01-12', '14:35:50', 1),
(5, 'Hatton National', '2014-02-02', '18:39:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_deposit_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_bank_deposit_payment` (
  `bank_deposit_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `deposit_payment` double DEFAULT NULL,
  `deposit_date` date DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `added_time` time DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `bank_id` int(10) unsigned NOT NULL DEFAULT '0',
  `deliver_order_id` int(11) DEFAULT NULL,
  `account_no` varchar(45) NOT NULL DEFAULT '',
  `deposit_slip_image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`bank_deposit_payment_id`),
  KEY `FK_tbl_bank_deposit_payment_1` (`bank_id`),
  KEY `FK_tbl_bank_deposit_payment_2` (`deliver_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_bank_deposit_payment`
--

INSERT INTO `tbl_bank_deposit_payment` (`bank_deposit_payment_id`, `deposit_payment`, `deposit_date`, `added_date`, `added_time`, `status`, `bank_id`, `deliver_order_id`, `account_no`, `deposit_slip_image`) VALUES
(1, 111, '2014-03-25', '2014-03-10', '06:49:56', 1, 1, 15, '3444', '0'),
(2, 300, '2014-03-03', '2014-03-11', '05:40:09', 1, 1, 3, '34345435', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE IF NOT EXISTS `tbl_branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_account_no` varchar(45) DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `branch_name` varchar(45) DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `branch_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`branch_id`),
  KEY `fk_tbl_branch_area_id` (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_account_no`, `area_id`, `branch_name`, `added_date`, `added_time`, `status`, `branch_code`) VALUES
(1, '-', 2, 'BALAGOLLA', '2014-02-18', '18:16:08', 1, '-'),
(2, '-', 2, 'KANDY', '2014-02-18', '18:16:54', 1, '-'),
(3, '-', 3, 'MATARA', '2014-02-18', '18:17:20', 1, '-'),
(4, '-', 4, 'COLOMBO', '2014-02-18', '18:18:34', 1, '-'),
(5, '-', 4, 'SIYAMBALAPE', '2014-02-18', '18:18:55', 1, '-'),
(6, '-', 4, 'YAKKALA', '2014-02-18', '18:19:39', 1, '-'),
(7, '-', 4, 'WELIWERIYA', '2014-02-18', '18:19:59', 1, '-'),
(8, '-', 5, 'KURUWITA', '2014-02-18', '18:21:42', 1, '-'),
(9, '-', 6, 'KURUNEGALA', '2014-02-18', '18:22:01', 1, '-'),
(10, '-', 6, 'PUTTALM', '2014-02-18', '18:22:22', 1, '-'),
(11, '-', 7, 'JAFFNA', '2014-02-18', '18:23:56', 1, '-'),
(12, '-', 7, 'VAVUNIYA', '2014-02-18', '18:24:27', 1, '-'),
(13, '-', 8, 'ANURADHAPURA', '2014-02-18', '18:24:58', 1, '-'),
(14, '-', 9, 'TRINCO', '2014-02-18', '18:26:15', 1, '-'),
(15, '-', 10, 'AMPARA', '2014-02-18', '18:26:33', 1, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch_wise_budget`
--

CREATE TABLE IF NOT EXISTS `tbl_branch_wise_budget` (
  `branch_wise_budget_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `year` double DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `budget_amount` double DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`branch_wise_budget_id`),
  KEY `fk_branch_id_idx` (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_branch_wise_budget`
--

INSERT INTO `tbl_branch_wise_budget` (`branch_wise_budget_id`, `branch_id`, `year`, `month`, `added_date`, `budget_amount`, `added_time`, `status`) VALUES
(1, 1, 2014, 1, '2014-01-25', 0, '16:35:20', 1),
(2, 2, 2014, 1, '2014-01-25', 0, '16:35:20', 1),
(3, 3, 2014, 1, '2014-01-25', 0, '16:35:20', 1),
(4, 4, 2014, 1, '2014-01-25', 0, '16:35:20', 1),
(5, 1, 2014, 2, '2014-01-25', 2500, '16:36:25', 1),
(6, 2, 2014, 2, '2014-01-25', 2500, '16:36:25', 1),
(7, 3, 2014, 2, '2014-01-25', 2500, '16:36:25', 1),
(8, 4, 2014, 2, '2014-01-25', 2500, '16:36:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_call_inquery`
--

CREATE TABLE IF NOT EXISTS `tbl_call_inquery` (
  `call_inquery_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(45) DEFAULT NULL,
  `call_time` varchar(45) DEFAULT NULL,
  `call_date` date DEFAULT NULL,
  `answered_by` varchar(45) DEFAULT NULL,
  `answered_possition` varchar(45) DEFAULT NULL,
  `delar_id` int(11) DEFAULT NULL,
  `sales_officer_id` int(11) DEFAULT NULL,
  `apm_id` int(11) DEFAULT NULL,
  `purpose` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`call_inquery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

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
(95, 'Dealer Dinner', '2014-02-28', '2014-02-18', '10:47:48', 'd', 'd', 'd', 58, 'done.jpg', 1, 5, 0, 0),
(96, 'Dealer Dinner', '2014-02-27', '2014-02-18', '11:54:11', 'ddd', 'ddd', 'ddd', 588, '', 1, 4, 0, 0),
(97, 'Dealer Dinner', '2014-02-27', '2014-02-18', '11:54:11', 'ddd', 'ddd', 'ddd', 588, '', 1, 0, 1, 0),
(98, 'Garage Meet', '2014-02-28', '2014-02-18', '11:55:59', 'ss', 'ss', 'sss', 2587, 'add.jpg', 1, 0, 1, 0),
(99, 'Garage Meet', '2014-02-28', '2014-02-18', '12:04:01', 'cvf', 'cvf', 'cvf', 45669, 'home.jpg', 1, 0, 1, 0),
(100, 'Garage Meet', '2014-02-26', '2014-02-18', '12:12:03', 'ds', 'ds', 'ds', 589, 'notDone4.jpg', 1, 0, 1, 0),
(101, 'Garage Meet', '0000-00-00', '2014-02-18', '12:28:00', '', '', '', 0, '', 1, 6, 0, 0),
(102, 'Garage Meet', '2014-02-28', '2014-02-18', '12:42:12', 'd', 'd', 'd', 2589, 'room2.jpg', 1, 2, 0, 0),
(103, 'Garage Meet', '2014-02-27', '2014-02-18', '12:53:08', 'adv', 'dv', 'dv', 2589, 'room3.jpg', 1, 7, 0, 0),
(104, 'Garage Meet', '2014-02-20', '2014-02-18', '12:54:23', 'd', 'd', 'd', 258, 'view1.png', 1, 1, 0, 0),
(105, 'Garage Meet', '2014-02-27', '2014-02-18', '12:56:42', 'njk', 'njk', 'njk', 23698, 'hospita1.jpg', 1, 9, 1, 0),
(106, 'Garage Meet', '2014-02-27', '2014-02-19', '08:57:37', 'fg', 'ccc', 'cccc', 5896, 'a.jpg', 1, 10, 1, 0),
(107, 'Garage Meet', '2014-03-15', '2014-02-19', '09:25:48', 'dd', 'dd', 'dd', 2589, 'home1.jpg', 1, 10, 1, 0),
(108, 'Garage Meet', '2014-02-21', '2014-02-20', '12:49:43', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4852, 'b2.jpg', 1, 10, 0, 0),
(109, 'Garage Meet', '2014-02-18', '2014-02-20', '13:53:34', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 9, 0, 0),
(110, 'Garage Meet', '2014-02-27', '2014-02-20', '14:05:26', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 10, 0, 0),
(111, 'Garage Meet', '2014-02-12', '2014-02-20', '14:09:02', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 11, 0, 0),
(112, 'Garage Meet', '0000-00-00', '2014-02-20', '14:10:32', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 12, 0, 0),
(113, 'Garage Meet', '2014-02-06', '2014-02-20', '14:23:09', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 14, 0, 0),
(114, 'Garage Meet', '0000-00-00', '2014-02-20', '14:33:54', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 14, 0, 0),
(115, 'Garage Meet', '2014-02-25', '2014-02-20', '15:17:53', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 13, 0, 0),
(116, 'Garage Meet', '2014-02-11', '2014-02-20', '15:39:48', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 14, 0, 0),
(117, 'Garage Meet', '2014-02-26', '2014-02-20', '15:40:30', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 15, 0, 0),
(118, 'Garage Meet', '2014-02-05', '2014-02-20', '15:50:56', 'bvbnm,', 'fghjkl', 'xcvbnm,', 4, 'b2.jpg', 1, 16, 0, 1),
(119, 'Garage Meet', '2014-02-06', '2014-02-20', '17:08:13', 'ee', 'ee', 'ee', 55555555, 'hospita2.jpg', 1, 18, 0, 0),
(120, 'Garage Meet', '2014-02-28', '2014-02-20', '17:10:02', 'ee', 'ee', 'ee', 55, 'hospita2.jpg', 1, 17, 0, 1),
(121, 'Dealer Dinner', '2014-02-19', '2014-02-20', '17:20:17', 'sd', 'd', 'd', 5, 'done2.jpg', 1, 19, 0, 0),
(122, 'Dealer Dinner', '0000-00-00', '2014-02-20', '17:20:49', 'sd', 'd', 'd', 5, 'done2.jpg', 1, 18, 0, 1),
(123, 'Garage Meet', '2014-02-20', '2014-02-24', '10:20:43', 'ddd', 'ddd', 'ddd', 2569, 'bg.html', 1, 20, 0, 0),
(124, 'Garage Meet', '0000-00-00', '2014-02-24', '10:22:00', 'ddd', 'ddd', 'ddd', 2, 'accordian.html', 1, 20, 1, 1),
(125, 'Garage Meet', '2014-02-19', '2014-02-24', '14:23:24', 'jjrtng', 'trns', 'tsrh', 5181, 'accordian1.html', 1, 19, 0, 0),
(126, 'Garage Meet', '2014-02-06', '2014-02-24', '14:24:55', '6y', 't', 'tr', 52818, 'bg1.html', 1, 20, 0, 0),
(127, 'Store arrangement', '2014-02-20', '2014-02-24', '20:10:26', 'svd', 'sdvsvsdf', 'dfs', 123698, 'accordian2.html', 1, 22, 0, 0),
(128, 'Street Promote', '2014-02-13', '2014-02-25', '08:53:58', 'as', 'asc', 'asc', 5983, 'Hack22.Hack2', 1, 21, 0, 1),
(129, 'Street Promote', '2014-02-12', '2014-02-25', '09:15:52', 'as', 'asc', 'asc', 7896, 'Hack22.Hack2', 1, 22, 0, 1),
(130, 'Street Promote', '2014-02-05', '2014-02-25', '09:17:50', 'as', 'asc', 'asc', 89, 'Hack22.Hack2', 1, 23, 0, 1),
(131, 'Street Promote', '2014-02-05', '2014-02-25', '09:23:45', 'as', 'asc', 'asc', 89965, 'Hack22.Hack2', 1, 24, 0, 1),
(132, 'Street Promote', '2014-02-26', '2014-02-25', '09:26:20', 'as', 'asc', 'asc', 89653, 'Hack22.Hack2', 1, 26, 0, 1),
(133, 'Garage Meet', '2014-05-21', '2014-02-25', '15:19:29', 'fff', 'fff', 'fff', 45883, 'bg2.html', 1, 26, 0, 0),
(134, 'Garage Meet', '2014-02-12', '2014-02-25', '20:22:08', 'fff', 'fff', 'fff', 45, 'bg2.html', 1, 25, 0, 1),
(135, 'Garage Meet', '2014-02-27', '2014-02-25', '20:44:54', 't1', 'r1', 'l1', 253, 'bg3.html', 1, 27, 0, 0),
(136, 'Garage Meet', '2014-02-20', '2014-02-25', '20:48:08', 't1', 'r1', 'l1', 253, 'bg3.html', 1, 27, 1, 1),
(137, 'Garage Meet', '2014-02-14', '2014-02-26', '13:14:32', 'dac', 'sca', 'cas', 0, '', 1, 26, 0, 0),
(138, 'cool', '2014-02-04', '2014-02-26', '14:20:06', 'd', 'd', 'd', 288, '', 1, 27, 0, 0),
(139, 'Garage Meet', '2014-02-25', '2014-02-26', '14:21:45', 'ds', 'ds', 'ds', 28, '', 1, 28, 0, 0),
(140, 'dvsv', '2014-02-20', '2014-02-26', '16:08:47', 'ds', 'ds', 'dsds', 5551, 'bg4.html', 1, 29, 0, 0),
(141, 'Dealer Dinner', '2014-06-13', '2014-02-26', '16:29:22', 'xz', 'ds', 'ds', 369, 'accordian3.html', 1, 31, 1, 0),
(142, 'jj', '2014-02-14', '2014-02-26', '19:59:16', 'cee', 'jj', 'j', 555, '', 1, 31, 1, 0),
(143, 'Garage Meet', '2014-02-19', '2014-02-27', '09:40:16', 'dc', 'vd', 'vd', 32156, 'accordian4.html', 1, 31, 0, 0),
(144, 'Garage Meet', '2014-02-04', '2014-02-27', '09:46:45', 'd', 'd', 'd', 55, '', 1, 31, 0, 0),
(145, 'Garage Meet', '2014-02-06', '2014-02-27', '09:48:17', 'df', 'bd', 'd', 2, '', 1, 30, 0, 0),
(146, 'Garage Meet', '2014-02-13', '2014-02-27', '09:55:08', 'ac', 'acs', 'cas', 55, '', 1, 31, 0, 0),
(147, 'Garage Meet', '2014-02-20', '2014-02-27', '09:57:56', 'sac', 'cas', 'csa', 888, 'accordian5.html', 1, 32, 0, 0),
(148, 'Garage Meet', '2014-02-15', '2014-02-28', '10:14:34', 'wef', 'wfe', 'wf', 28, 'new_dimo.sql', 1, 33, 0, 0),
(149, 'Garage Meet', '2014-02-13', '2014-02-28', '10:21:26', 'p', 'po', 'po', 27, 'jquery-2.0.3.min.js', 1, 34, 0, 0),
(150, 'hgh', '2014-02-12', '2014-02-28', '10:22:14', 'uilu', 'uil', 'ui', 14, 'Cheque.odt', 1, 36, 0, 0),
(151, 'bbb', '2014-02-13', '2014-02-28', '10:31:41', 'sf', 'sfd', 'fsd', 727, 'dimo_lanka_web_(1).sql', 1, 35, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

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
(54, 99, '2014-02-25', '12:41:06', 'apm tre', '', 1, 1, 1),
(55, 100, '2014-02-25', '20:21:38', 'aelnb', '2014-02', 2, 0, 1),
(56, 102, '2014-02-25', '20:46:12', 'vg', '2014-06', 2, 0, 1),
(57, 103, '2014-02-25', '20:48:36', 'klo', '', 1, 1, 1),
(58, 108, '2014-02-26', '16:29:58', 'dsv', '', 1, 1, 1),
(59, 109, '2014-02-26', '20:36:16', '', '', 1, 1, 1),
(60, 58, '2014-02-27', '12:18:03', '', '', 1, 1, 1),
(61, 118, '2014-02-28', '15:22:42', 'sdgg', '', 1, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_campaign_dealer`
--

INSERT INTO `tbl_campaign_dealer` (`id_campaign_dealer`, `id_campaign`, `id_dealer`, `current_to`, `increase_to`, `status`) VALUES
(1, 148, 1, 926.6666666666667, 88, 1),
(2, 149, 1, 926.6666666666667, 7777, 1),
(3, 150, 1, 926.6666666666667, 525, 1),
(4, 151, 1, 926.6666666666667, 5272, 1),
(5, 0, 1, 833.3333333333334, 50000, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_campaign_ho`
--

INSERT INTO `tbl_campaign_ho` (`id_campaing_ho`, `id_campaign_apm`, `added_date`, `added_time`, `remark`, `due_date`, `ho_pending`, `status`) VALUES
(1, 61, '2014-02-28', '15:23:15', 'hfd', '', 1, 1),
(2, 60, '2014-02-28', '15:23:15', 'hfd', '', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

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
(114, 147, 33, 1, 0, 1),
(115, 148, 33, 1, 0, 1),
(117, 149, 33, 1, 0, 1),
(118, 150, 33, 1, 1, 1),
(119, 151, 33, 1, 0, 1),
(120, 0, 33, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campaign_type`
--

CREATE TABLE IF NOT EXISTS `tbl_campaign_type` (
  `id_campaing_type` int(11) NOT NULL AUTO_INCREMENT,
  `type_description` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_campaing_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
(12, 'd', 0),
(13, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cash_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_cash_payment` (
  `cash_payment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cash_payment` varchar(45) NOT NULL DEFAULT '',
  `deliver_order_id` int(11) NOT NULL,
  `added_date` date NOT NULL DEFAULT '0000-00-00',
  `added_time` time NOT NULL DEFAULT '00:00:00',
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cash_payment_id`),
  KEY `purchase_order_id` (`deliver_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_cash_payment`
--

INSERT INTO `tbl_cash_payment` (`cash_payment_id`, `cash_payment`, `deliver_order_id`, `added_date`, `added_time`, `status`) VALUES
(1, '1000', 1, '2014-02-04', '18:02:58', 1),
(2, '', 1, '2014-02-04', '18:03:27', 1),
(3, '', 1, '2014-02-10', '09:42:36', 1),
(4, '', 1, '2014-02-11', '05:13:56', 1),
(5, '', 1, '2014-02-26', '12:54:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cheque_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_cheque_payment` (
  `cheque_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `cheque_no` varchar(100) NOT NULL DEFAULT '',
  `cheque_payment` varchar(25) NOT NULL DEFAULT '',
  `realized_date` date NOT NULL DEFAULT '0000-00-00',
  `deliver_order_id` int(11) NOT NULL,
  `added_date` date NOT NULL DEFAULT '0000-00-00',
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `realized_status` int(10) unsigned NOT NULL DEFAULT '0',
  `bank_id` int(10) unsigned NOT NULL,
  `added_time` time NOT NULL DEFAULT '00:00:00',
  `cheque_image` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`cheque_payment_id`),
  KEY `FK_tbl_cheque_payment_1` (`bank_id`),
  KEY `realized_date` (`realized_date`),
  KEY `purchase_order_id` (`deliver_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_cheque_payment`
--

INSERT INTO `tbl_cheque_payment` (`cheque_payment_id`, `cheque_no`, `cheque_payment`, `realized_date`, `deliver_order_id`, `added_date`, `status`, `realized_status`, `bank_id`, `added_time`, `cheque_image`) VALUES
(1, '65165495495', '430', '2014-02-06', 1, '2014-02-04', 1, 1, 1, '18:03:27', NULL),
(2, '42525523', '25411', '2014-02-02', 1, '2014-02-26', 1, 1, 2, '12:54:44', 'logo.jpg'),
(3, '12222', '22', '2014-03-31', 1, '2014-03-10', 1, 1, 4, '06:51:55', '0'),
(4, '2222', '11', '2014-03-31', 2, '2014-03-10', 1, 0, 3, '06:52:49', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(500) NOT NULL,
  `city_code` varchar(45) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`city_id`),
  KEY `fk_district_id_idx` (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1459 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_name`, `city_code`, `district_id`, `postal_code`, `status`) VALUES
(1, 'Akarawita', 'CO', 1, '10732', 1),
(2, 'Angamuwa', 'CO', 1, '10150', 1),
(3, 'Avissawella', 'CO', 1, '10700', 1),
(4, 'Batawala', 'CO', 1, '10513', 1),
(5, 'Battaramulla', 'CO', 1, '10120', 1),
(6, 'Batugampola', 'CO', 1, '10526', 1),
(7, 'Bope', 'CO', 1, '10522', 1),
(8, 'Boralesgamuwa', 'CO', 1, '10290', 1),
(9, 'Borella', 'CO', 1, '800', 1),
(10, 'Dedigamuwa', 'CO', 1, '10656', 1),
(11, 'Dehiwala', 'CO', 1, '10350', 1),
(12, 'Deltara', 'CO', 1, '10302', 1),
(13, 'Habarakada', 'CO', 1, '10204', 1),
(14, 'Handapangoda', 'CO', 1, '10524', 1),
(15, 'Hanwella', 'CO', 1, '10650', 1),
(16, 'Hewainna', 'CO', 1, '10714', 1),
(17, 'Hiripitya', 'CO', 1, '10232', 1),
(18, 'Hokandara', 'CO', 1, '10118', 1),
(19, 'Homagama', 'CO', 1, '10200', 1),
(20, 'Horagala', 'CO', 1, '10502', 1),
(21, 'Kaduwela', 'CO', 1, '10640', 1),
(22, 'Kahawala', 'CO', 1, '10508', 1),
(23, 'Kalatuwawa', 'CO', 1, '10718', 1),
(24, 'Madapatha', 'CO', 1, '10306', 1),
(25, 'Maharagama', 'CO', 1, '10280', 1),
(26, 'Malabe', 'CO', 1, '10115', 1),
(27, 'Meegoda', 'CO', 1, '10504', 1),
(28, 'Padukka', 'CO', 1, '10500', 1),
(29, 'Pannipitiya', 'CO', 1, '10230', 1),
(30, 'Piliyandala', 'CO', 1, '10300', 1),
(31, 'Pitipana Homagama', 'CO', 1, '10206', 1),
(32, 'Polgasowita', 'CO', 1, '10320', 1),
(33, 'Puwakpitiya', 'CO', 1, '10712', 1),
(34, 'Ranala', 'CO', 1, '10654', 1),
(35, 'Siddamulla', 'CO', 1, '10304', 1),
(36, 'Slave Island', 'CO', 1, '200', 1),
(37, 'Sri Jayawardenapura', 'CO', 1, '10100', 1),
(38, 'Talawatugoda', 'CO', 1, '10116', 1),
(39, 'Tummodara', 'CO', 1, '10682', 1),
(40, 'Waga', 'CO', 1, '10680', 1),
(41, 'Watareka', 'CO', 1, '10511', 1),
(42, 'Akaragama', 'GQ', 2, '11536', 1),
(43, 'Alawala', 'GQ', 2, '11122', 1),
(44, 'Ambagaspitiya', 'GQ', 2, '11052', 1),
(45, 'Ambepussa', 'GQ', 2, '11212', 1),
(46, 'Andiambalama', 'GQ', 2, '11558', 1),
(47, 'Attanagalla', 'GQ', 2, '11120', 1),
(48, 'Badalgama', 'GQ', 2, '11538', 1),
(49, 'Banduragoda', 'GQ', 2, '11244', 1),
(50, 'Batuwatta', 'GQ', 2, '11011', 1),
(51, 'Bemmulla', 'GQ', 2, '11040', 1),
(52, 'Biyagama', 'GQ', 2, '11650', 1),
(53, 'Biyagama IPZ', 'GQ', 2, '11672', 1),
(54, 'Bokalagama', 'GQ', 2, '11216', 1),
(55, 'Bollete', 'GQ', 2, '11024', 1),
(56, 'Bopagama', 'GQ', 2, '11134', 1),
(57, 'Buthpitiya', 'GQ', 2, '11720', 1),
(58, 'Dagonna', 'GQ', 2, '11524', 1),
(59, 'Danowita', 'GQ', 2, '11896', 1),
(60, 'Debahera', 'GQ', 2, '11889', 1),
(61, 'Dekatana', 'GQ', 2, '11690', 1),
(62, 'Delgoda', 'GQ', 2, '11700', 1),
(63, 'Delwagura', 'GQ', 2, '11228', 1),
(64, 'Demalagama', 'GQ', 2, '11692', 1),
(65, 'Demanhandiya', 'GQ', 2, '11270', 1),
(66, 'Dewalapola', 'GQ', 2, '11102', 1),
(67, 'Divulapitiya', 'GQ', 2, '11250', 1),
(68, 'Divuldeniya', 'GQ', 2, '11208', 1),
(69, 'Dompe', 'GQ', 2, '11680', 1),
(70, 'Dunagaha', 'GQ', 2, '11264', 1),
(71, 'Ekala', 'GQ', 2, '11380', 1),
(72, 'Ellakkala', 'GQ', 2, '11116', 1),
(73, 'Essella', 'GQ', 2, '11108', 1),
(74, 'Gampaha', 'GQ', 2, '11000', 1),
(75, 'Ganemulla', 'GQ', 2, '11020', 1),
(76, 'GonawalaWP', 'GQ', 2, '11630', 1),
(77, 'Heiyanthuduwa', 'GQ', 2, '11618', 1),
(78, 'Henegama', 'GQ', 2, '11715', 1),
(79, 'Hinatiyana', 'GQ', 2, '11568', 1),
(80, 'Hiswella', 'GQ', 2, '11734', 1),
(81, 'Horampella', 'GQ', 2, '11564', 1),
(82, 'Hunumulla', 'GQ', 2, '11262', 1),
(83, 'Ihala Madampella', 'GQ', 2, '11265', 1),
(84, 'Imbulgoda', 'GQ', 2, '11856', 1),
(85, 'Ja-Ela', 'GQ', 2, '11350', 1),
(86, 'Kadawatha', 'GQ', 2, '11850', 1),
(87, 'Kahatowita', 'GQ', 2, '11144', 1),
(88, 'Kalagedihena', 'GQ', 2, '11875', 1),
(89, 'Kaleliya', 'GQ', 2, '11160', 1),
(90, 'Kaluaggala', 'GQ', 2, '11224', 1),
(91, 'Kandana', 'GQ', 2, '11320', 1),
(92, 'Kapugoda', 'GQ', 2, '10662', 1),
(93, 'Loluwagoda', 'GQ', 2, '11204', 1),
(94, 'Lunugama', 'GQ', 2, '11062', 1),
(95, 'Mabodale', 'GQ', 2, '11114', 1),
(96, 'Madelgamuwa', 'GQ', 2, '11033', 1),
(97, 'Makewita', 'GQ', 2, '11358', 1),
(98, 'Makola', 'GQ', 2, '11640', 1),
(99, 'Malwana', 'GQ', 2, '11670', 1),
(100, 'Mandawala', 'GQ', 2, '11061', 1),
(101, 'Marandagahamula', 'GQ', 2, '11260', 1),
(102, 'Mellawagedara', 'GQ', 2, '11234', 1),
(103, 'Pallewela', 'GQ', 2, '11150', 1),
(104, 'Pamunugama', 'GQ', 2, '11370', 1),
(105, 'Pamunuwatta', 'GQ', 2, '11214', 1),
(106, 'Pasyala', 'GQ', 2, '11890', 1),
(107, 'Peliyagoda', 'GQ', 2, '11830', 1),
(108, 'Pepiliyawala', 'GQ', 2, '11741', 1),
(109, 'Pethiyagoda', 'GQ', 2, '11043', 1),
(110, 'Polpithimukulana', 'GQ', 2, '11324', 1),
(111, 'Pugoda', 'GQ', 2, '10660', 1),
(112, 'Radawadunna', 'GQ', 2, '11892', 1),
(113, 'Radawana', 'GQ', 2, '11725', 1),
(114, 'Raddolugama', 'GQ', 2, '11400', 1),
(115, 'Ragama', 'GQ', 2, '11010', 1),
(116, 'Ruggahawila', 'GQ', 2, '11142', 1),
(117, 'Rukmale', 'GQ', 2, '11129', 1),
(118, 'Seeduwa', 'GQ', 2, '11410', 1),
(119, 'Siyambalape', 'GQ', 2, '11607', 1),
(120, 'Talahena', 'GQ', 2, '11504', 1),
(121, 'Thimbirigaskatuwa', 'GQ', 2, '11532', 1),
(122, 'Tittapattara', 'GQ', 2, '10664', 1),
(123, 'Udathuthiripitiya', 'GQ', 2, '11054', 1),
(124, 'Udugampola', 'GQ', 2, '11030', 1),
(125, 'Uggalboda', 'GQ', 2, '11034', 1),
(126, 'Urapola', 'GQ', 2, '11126', 1),
(127, 'Uswetakeiyawa', 'GQ', 2, '11328', 1),
(128, 'Veyangoda', 'GQ', 2, '11100', 1),
(129, 'Walgammulla', 'GQ', 2, '11146', 1),
(130, 'Walpita', 'GQ', 2, '11226', 1),
(131, 'Walpola (WP)', 'GQ', 2, '11012', 1),
(132, 'Wanaluwewa', 'GQ', 2, '11068', 1),
(133, 'Wathurugama', 'GQ', 2, '11724', 1),
(134, 'Watinapaha', 'GQ', 2, '11104', 1),
(135, 'Wattala', 'GQ', 2, '11300', 1),
(136, 'Weboda', 'GQ', 2, '11858', 1),
(137, 'Yakkala', 'GQ', 2, '11870', 1),
(138, 'Yatiyana(WP)', 'GQ', 2, '11566', 1),
(139, 'Agalawatta', 'KT', 3, '12200', 1),
(140, 'Alubomulla', 'KT', 3, '12524', 1),
(141, 'Alutgama', 'KT', 3, '12080', 1),
(142, 'Anguruwatota', 'KT', 3, '12320', 1),
(143, 'Baduraliya', 'KT', 3, '12230', 1),
(144, 'Bandaragama', 'KT', 3, '12530', 1),
(145, 'Bellana', 'KT', 3, '12224', 1),
(146, 'Beruwala', 'KT', 3, '12070', 1),
(147, 'Bolossagama', 'KT', 3, '12008', 1),
(148, 'Bombuwala', 'KT', 3, '12024', 1),
(149, 'Boralugoda', 'KT', 3, '12142', 1),
(150, 'Bulathsinhala', 'KT', 3, '12300', 1),
(151, 'DanawalaThiniyawala', 'KT', 3, '12148', 1),
(152, 'Delmella', 'KT', 3, '12304', 1),
(153, 'Dharga Town', 'KT', 3, '12090', 1),
(154, 'Diwalakada', 'KT', 3, '12308', 1),
(155, 'Dodangoda', 'KT', 3, '12020', 1),
(156, 'Dombagoda', 'KT', 3, '12416', 1),
(157, 'Galpatha', 'KT', 3, '12005', 1),
(158, 'Gamagoda', 'KT', 3, '12016', 1),
(159, 'Gonapola', 'KT', 3, '12410', 1),
(160, 'Govinna', 'KT', 3, '12310', 1),
(161, 'Gurulubadda', 'KT', 3, '12236', 1),
(162, 'Halkandawila', 'KT', 3, '12055', 1),
(163, 'Haltota', 'KT', 3, '12538', 1),
(164, 'Halwala', 'KT', 3, '12118', 1),
(165, 'Halwatura', 'KT', 3, '12306', 1),
(166, 'Hedigalla Colony', 'KT', 3, '12234', 1),
(167, 'Horana', 'KT', 3, '12400', 1),
(168, 'Ittapana', 'KT', 3, '12116', 1),
(169, 'Kalawila Kiranthidiya', 'KT', 3, '12078', 1),
(170, 'Kalutara', 'KT', 3, '12000', 1),
(171, 'Kananwila', 'KT', 3, '12418', 1),
(172, 'Kandanagama', 'KT', 3, '12428', 1),
(173, 'lngiriya', 'KT', 3, '12440', 1),
(174, 'Maggona', 'KT', 3, '12060', 1),
(175, 'Mahagama', 'KT', 3, '12210', 1),
(176, 'Mahakalupahana', 'KT', 3, '12126', 1),
(177, 'Matugama', 'KT', 3, '12100', 1),
(178, 'Meegahatenna', 'KT', 3, '12130', 1),
(179, 'Meegama', 'KT', 3, '12094', 1),
(180, 'Padagoda', 'KT', 3, '12074', 1),
(181, 'Pahalahewessa', 'KT', 3, '12144', 1),
(182, 'Paiyagala', 'KT', 3, '12050', 1),
(183, 'Panadura', 'KT', 3, '12500', 1),
(184, 'Pannila', 'KT', 3, '12114', 1),
(185, 'Paragastota', 'KT', 3, '12414', 1),
(186, 'Paragoda', 'KT', 3, '12302', 1),
(187, 'Paraigama', 'KT', 3, '12122', 1),
(188, 'Pelanda', 'KT', 3, '12214', 1),
(189, 'Pelawatta', 'KT', 3, '12138', 1),
(190, 'Pokunuwita', 'KT', 3, '12404', 1),
(191, 'Polgampola', 'KT', 3, '12136', 1),
(192, 'Poruwedanda', 'KT', 3, '12432', 1),
(193, 'Remunagoda', 'KT', 3, '12009', 1),
(194, 'Tebuwana', 'KT', 3, '12025', 1),
(195, 'Uduwara', 'KT', 3, '12322', 1),
(196, 'Utumgama', 'KT', 3, '12127', 1),
(197, 'Veyangalla', 'KT', 3, '12204', 1),
(198, 'Wadduwa', 'KT', 3, '12560', 1),
(199, 'Walagedara', 'KT', 3, '12112', 1),
(200, 'Walallawita', 'KT', 3, '12134', 1),
(201, 'Waskaduwa', 'KT', 3, '12580', 1),
(202, 'Yagirala', 'KT', 3, '12124', 1),
(203, 'Yatadolawatta', 'KT', 3, '12104', 1),
(204, 'Yatawara Junction', 'KT', 3, '12006', 1),
(205, 'Akurana', 'KY', 4, '20850', 1),
(206, 'Alawatugoda', 'KY', 4, '20140', 1),
(207, 'Aludeniya', 'KY', 4, '20062', 1),
(208, 'Ambagahapelessa', 'KY', 4, '20986', 1),
(209, 'Ambatenna', 'KY', 4, '20136', 1),
(210, 'Ampitiya', 'KY', 4, '20160', 1),
(211, 'Ankumbura', 'KY', 4, '20150', 1),
(212, 'Atabage', 'KY', 4, '20574', 1),
(213, 'Balana', 'KY', 4, '20308', 1),
(214, 'Bambaragahaela', 'KY', 4, '20644', 1),
(215, 'Barawardhana Oya', 'KY', 4, '20967', 1),
(216, 'Batagolladeniya', 'KY', 4, '20154', 1),
(217, 'Batugoda', 'KY', 4, '20132', 1),
(218, 'Batumulla', 'KY', 4, '20966', 1),
(219, 'Bawlana', 'KY', 4, '20218', 1),
(220, 'Bopana', 'KY', 4, '20932', 1),
(221, 'Danture', 'KY', 4, '20465', 1),
(222, 'Dedunupitiya', 'KY', 4, '20068', 1),
(223, 'Dekinda', 'KY', 4, '20658', 1),
(224, 'Deltota', 'KY', 4, '20430', 1),
(225, 'Dolapihilla', 'KY', 4, '20126', 1),
(226, 'Dolosbage', 'KY', 4, '20510', 1),
(227, 'Doluwa', 'KY', 4, '20532', 1),
(228, 'Doragamuwa', 'KY', 4, '20816', 1),
(229, 'Dunuwila', 'KY', 4, '20824', 1),
(230, 'Ekiriya', 'KY', 4, '20732', 1),
(231, 'Elamulla', 'KY', 4, '20742', 1),
(232, 'Etulgama', 'KY', 4, '20202', 1),
(233, 'Galaboda', 'KY', 4, '20664', 1),
(234, 'Galagedara', 'KY', 4, '20100', 1),
(235, 'Galaha', 'KY', 4, '20420', 1),
(236, 'Galhinna', 'KY', 4, '20152', 1),
(237, 'Gallellagama', 'KY', 4, '20095', 1),
(238, 'Gampola', 'KY', 4, '20500', 1),
(239, 'Gelioya', 'KY', 4, '20620', 1),
(240, 'Godamunna', 'KY', 4, '20214', 1),
(241, 'Gomagoda', 'KY', 4, '20184', 1),
(242, 'Gonagantenna', 'KY', 4, '20712', 1),
(243, 'Gonawalapatana', 'KY', 4, '20656', 1),
(244, 'Gunnepana', 'KY', 4, '20270', 1),
(245, 'Gurudeniya', 'KY', 4, '20189', 1),
(246, 'Halloluwa', 'KY', 4, '20032', 1),
(247, 'Handaganawa', 'KY', 4, '20984', 1),
(248, 'Handawalapitiya', 'KY', 4, '20438', 1),
(249, 'Handessa', 'KY', 4, '20480', 1),
(250, 'Hanguranketha', 'KY', 4, '20710', 1),
(251, 'Harankahawa', 'KY', 4, '20092', 1),
(252, 'Hasalaka', 'KY', 4, '20960', 1),
(253, 'Hataraliyadda', 'KY', 4, '20060', 1),
(254, 'Hewaheta', 'KY', 4, '20440', 1),
(255, 'Hindagala', 'KY', 4, '20414', 1),
(256, 'Hondiyadeniya', 'KY', 4, '20524', 1),
(257, 'Hunnasgiriya', 'KY', 4, '20948', 1),
(258, 'Jambugahapitiya', 'KY', 4, '20822', 1),
(259, 'Kadugannawa', 'KY', 4, '20300', 1),
(260, 'Kahataliyadda', 'KY', 4, '20924', 1),
(261, 'Kalugala', 'KY', 4, '20926', 1),
(262, 'Kandy', 'KY', 4, '20000', 1),
(263, 'Kapuliyadde', 'KY', 4, '20206', 1),
(264, 'Karandagolla', 'KY', 4, '20738', 1),
(265, 'Leemagahakotuwa', 'KY', 4, '20482', 1),
(266, 'lhala Kobbekaduwa', 'KY', 4, '20042', 1),
(267, 'lllagolla', 'KY', 4, '20724', 1),
(268, 'Lunuketiya Maditta', 'KY', 4, '20172', 1),
(269, 'Madawala Bazaar', 'KY', 4, '20260', 1),
(270, 'Madugalla', 'KY', 4, '20938', 1),
(271, 'Madulkele', 'KY', 4, '20840', 1),
(272, 'Mahadoraliyadda', 'KY', 4, '20945', 1),
(273, 'Mahamedagama', 'KY', 4, '20216', 1),
(274, 'Mailapitiya', 'KY', 4, '20702', 1),
(275, 'Makkanigama', 'KY', 4, '20828', 1),
(276, 'Makuldeniya', 'KY', 4, '20921', 1),
(277, 'Mandaram Nuwara', 'KY', 4, '20744', 1),
(278, 'Mapakanda', 'KY', 4, '20662', 1),
(279, 'Marassana', 'KY', 4, '20210', 1),
(280, 'Marymount Colony', 'KY', 4, '20714', 1),
(281, 'Maturata', 'KY', 4, '20748', 1),
(282, 'Mawatura', 'KY', 4, '20564', 1),
(283, 'Medamahanuwara', 'KY', 4, '20940', 1),
(284, 'MedawalaHarispattuwa', 'KY', 4, '20120', 1),
(285, 'Meetalawa', 'KY', 4, '20512', 1),
(286, 'Megoda Kalugamuwa', 'KY', 4, '20409', 1),
(287, 'Menikdiwela', 'KY', 4, '20470', 1),
(288, 'Menikhinna', 'KY', 4, '20170', 1),
(289, 'Pallebowala', 'KY', 4, '20734', 1),
(290, 'Pallekotuwa', 'KY', 4, '20084', 1),
(291, 'Panvila', 'KY', 4, '20830', 1),
(292, 'Panwilatenna', 'KY', 4, '20544', 1),
(293, 'Paradeka', 'KY', 4, '20578', 1),
(294, 'Pasbage', 'KY', 4, '20654', 1),
(295, 'Pattitalawa', 'KY', 4, '20511', 1),
(296, 'Peradeniya', 'KY', 4, '20400', 1),
(297, 'Pilawala', 'KY', 4, '20196', 1),
(298, 'Pilimatalawa', 'KY', 4, '20450', 1),
(299, 'Poholiyadda', 'KY', 4, '20106', 1),
(300, 'Polgolla', 'KY', 4, '20250', 1),
(301, 'Pujapitiya', 'KY', 4, '20112', 1),
(302, 'Pupuressa', 'KY', 4, '20546', 1),
(303, 'Pussellawa', 'KY', 4, '20580', 1),
(304, 'Putuhapuwa', 'KY', 4, '20906', 1),
(305, 'Rajawella', 'KY', 4, '20180', 1),
(306, 'Rambukpitiya', 'KY', 4, '20676', 1),
(307, 'Rambukwella', 'KY', 4, '20128', 1),
(308, 'Rangala', 'KY', 4, '20922', 1),
(309, 'Rantembe', 'KY', 4, '20990', 1),
(310, 'Rathukohodigala', 'KY', 4, '20818', 1),
(311, 'Rikillagaskada', 'KY', 4, '20730', 1),
(312, 'Sangarajapura', 'KY', 4, '20044', 1),
(313, 'Senarathwela', 'KY', 4, '20904', 1),
(314, 'Talatuoya', 'KY', 4, '20200', 1),
(315, 'Tawalantenna', 'KY', 4, '20838', 1),
(316, 'Teldeniya', 'KY', 4, '20900', 1),
(317, 'Tennekumbura', 'KY', 4, '20166', 1),
(318, 'Uda Peradeniya', 'KY', 4, '20404', 1),
(319, 'Udahentenna', 'KY', 4, '20506', 1),
(320, 'Udahingulwala', 'KY', 4, '20094', 1),
(321, 'Udatalawinna', 'KY', 4, '20802', 1),
(322, 'Udawatta', 'KY', 4, '20722', 1),
(323, 'Udispattuwa', 'KY', 4, '20916', 1),
(324, 'Ududumbara', 'KY', 4, '20950', 1),
(325, 'Uduwa', 'KY', 4, '20052', 1),
(326, 'Uduwahinna', 'KY', 4, '20934', 1),
(327, 'Uduwela', 'KY', 4, '20164', 1),
(328, 'Ulapane', 'KY', 4, '20562', 1),
(329, 'Ulpothagama', 'KY', 4, '20965', 1),
(330, 'Unuwinna', 'KY', 4, '20708', 1),
(331, 'Velamboda', 'KY', 4, '20640', 1),
(332, 'Wattappola', 'KY', 4, '20454', 1),
(333, 'Wattegama', 'KY', 4, '20810', 1),
(334, 'Yahalatenna', 'KY', 4, '20234', 1),
(335, 'Yatihalagala', 'KY', 4, '20034', 1),
(336, 'Akuramboda', 'MT', 5, '21142', 1),
(337, 'Alwatta', 'MT', 5, '21004', 1),
(338, 'Ambana', 'MT', 5, '21504', 1),
(339, 'Ataragallewa', 'MT', 5, '21512', 1),
(340, 'Bambaragaswewa', 'MT', 5, '21212', 1),
(341, 'Beligamuwa', 'MT', 5, '21214', 1),
(342, 'Dambulla', 'MT', 5, '21100', 1),
(343, 'Dankanda', 'MT', 5, '21032', 1),
(344, 'Devagiriya', 'MT', 5, '21552', 1),
(345, 'Dewahuwa', 'MT', 5, '21206', 1),
(346, 'Dullewa', 'MT', 5, '21054', 1),
(347, 'Dunkolawatta', 'MT', 5, '21046', 1),
(348, 'Dunuwilapitiya', 'MT', 5, '21538', 1),
(349, 'Elkaduwa', 'MT', 5, '21012', 1),
(350, 'Erawula Junction', 'MT', 5, '21108', 1),
(351, 'Etanawala', 'MT', 5, '21402', 1),
(352, 'Galewela', 'MT', 5, '21200', 1),
(353, 'Gammaduwa', 'MT', 5, '21068', 1),
(354, 'Gangala', 'MT', 5, '21404', 1),
(355, 'Handungamuwa', 'MT', 5, '21536', 1),
(356, 'Hattota Amuna', 'MT', 5, '21514', 1),
(357, 'Imbulgolla', 'MT', 5, '21064', 1),
(358, 'Inamaluwa', 'MT', 5, '21124', 1),
(359, 'Kaikawala', 'MT', 5, '21066', 1),
(360, 'Kalundawa', 'MT', 5, '21112', 1),
(361, 'Kandalama', 'MT', 5, '21106', 1),
(362, 'Karagahinna', 'MT', 5, '21014', 1),
(363, 'Laggala Pallegama', 'MT', 5, '21520', 1),
(364, 'Leliambe', 'MT', 5, '21008', 1),
(365, 'Lenadora', 'MT', 5, '21094', 1),
(366, 'lllukkumbura', 'MT', 5, '21406', 1),
(367, 'Madawala', 'MT', 5, '21074', 1),
(368, 'Madipola', 'MT', 5, '21156', 1),
(369, 'Mahawela', 'MT', 5, '21140', 1),
(370, 'Mananwatta', 'MT', 5, '21144', 1),
(371, 'Maraka', 'MT', 5, '21554', 1),
(372, 'Matale', 'MT', 5, '21000', 1),
(373, 'Melipitiya', 'MT', 5, '21055', 1),
(374, 'Metihakka', 'MT', 5, '21062', 1),
(375, 'Opalgala', 'MT', 5, '21076', 1),
(376, 'Ovilikanda', 'MT', 5, '21020', 1),
(377, 'Palapathwela', 'MT', 5, '21070', 1),
(378, 'Pallepola', 'MT', 5, '21152', 1),
(379, 'Perakanatta', 'MT', 5, '21532', 1),
(380, 'Pubbiliya', 'MT', 5, '21502', 1),
(381, 'Ranamuregama', 'MT', 5, '21524', 1),
(382, 'Rattota', 'MT', 5, '21400', 1),
(383, 'Selagama', 'MT', 5, '21058', 1),
(384, 'Sigiriya', 'MT', 5, '21120', 1),
(385, 'Talagoda Junction', 'MT', 5, '21506', 1),
(386, 'Talakiriyagama', 'MT', 5, '21116', 1),
(387, 'Udasgiriya', 'MT', 5, '21051', 1),
(388, 'Udatenna', 'MT', 5, '21006', 1),
(389, 'Ukuwela', 'MT', 5, '21300', 1),
(390, 'Wahacotte', 'MT', 5, '21160', 1),
(391, 'Walawela', 'MT', 5, '21048', 1),
(392, 'Yatawatta', 'MT', 5, '21056', 1),
(393, 'Agarapathana', 'NW', 6, '22094', 1),
(394, 'Ambagamuwa', 'NW', 6, '20678', 1),
(395, 'Ambatalawa', 'NW', 6, '20686', 1),
(396, 'Ambewela', 'NW', 6, '22216', 1),
(397, 'Bogawantalawa', 'NW', 6, '22060', 1),
(398, 'Bopattalawa', 'NW', 6, '22095', 1),
(399, 'Dagampitiya', 'NW', 6, '20684', 1),
(400, 'Dayagama Bazaar', 'NW', 6, '22096', 1),
(401, 'Dikoya', 'NW', 6, '22050', 1),
(402, 'Doragala', 'NW', 6, '20567', 1),
(403, 'Dunukedeniya', 'NW', 6, '22002', 1),
(404, 'Ginigathena', 'NW', 6, '20680', 1),
(405, 'Gonakele', 'NW', 6, '22226', 1),
(406, 'Haggala', 'NW', 6, '22208', 1),
(407, 'Halgranoya', 'NW', 6, '22240', 1),
(408, 'Hangarapitiya', 'NW', 6, '22044', 1),
(409, 'Hapugastalawa', 'NW', 6, '20668', 1),
(410, 'Harangalagama', 'NW', 6, '20669', 1),
(411, 'Harasbedda', 'NW', 6, '22262', 1),
(412, 'Hatton', 'NW', 6, '22000', 1),
(413, 'Hedunuwewa', 'NW', 6, '22024', 1),
(414, 'Hitigegama', 'NW', 6, '22046', 1),
(415, 'Kalaganwatta', 'NW', 6, '22282', 1),
(416, 'Kandapola', 'NW', 6, '22220', 1),
(417, 'Labukele', 'NW', 6, '20592', 1),
(418, 'Laxapana', 'NW', 6, '22034', 1),
(419, 'Lindula', 'NW', 6, '22090', 1),
(420, 'Madulla', 'NW', 6, '22256', 1),
(421, 'Maldeniya', 'NW', 6, '22021', 1),
(422, 'Maskeliya', 'NW', 6, '22070', 1),
(423, 'Maswela', 'NW', 6, '20566', 1),
(424, 'Padiyapelella', 'NW', 6, '20750', 1),
(425, 'Patana', 'NW', 6, '22012', 1),
(426, 'Pitawala', 'NW', 6, '20682', 1),
(427, 'Pundaluoya', 'NW', 6, '22120', 1),
(428, 'Ramboda', 'NW', 6, '20590', 1),
(429, 'Rozella', 'NW', 6, '22008', 1),
(430, 'Rupaha', 'NW', 6, '22245', 1),
(431, 'Ruwaneliya', 'NW', 6, '22212', 1),
(432, 'Santhipura', 'NW', 6, '22202', 1),
(433, 'Talawakele', 'NW', 6, '22100', 1),
(434, 'Teripeha', 'NW', 6, '22287', 1),
(435, 'Udamadura', 'NW', 6, '22285', 1),
(436, 'Udapussallawa', 'NW', 6, '22250', 1),
(437, 'Walapane', 'NW', 6, '22270', 1),
(438, 'Watagoda', 'NW', 6, '22110', 1),
(439, 'Watawala', 'NW', 6, '22010', 1),
(440, 'Ampilanthurai', 'BC', 7, '30162', 1),
(441, 'Araipattai', 'BC', 7, '30150', 1),
(442, 'Ayithiyamalai', 'BC', 7, '30362', 1),
(443, 'Bakiella', 'BC', 7, '30206', 1),
(444, 'Batticaloa', 'BC', 7, '30000', 1),
(445, 'Cheddipalayam', 'BC', 7, '30194', 1),
(446, 'Chenkaladi', 'BC', 7, '30350', 1),
(447, 'Eravur', 'BC', 7, '30300', 1),
(448, 'Kalkudah', 'BC', 7, '30410', 1),
(449, 'Kallar', 'BC', 7, '30250', 1),
(450, 'Kaluwanchikudi', 'BC', 7, '30200', 1),
(451, 'Kaluwankemy', 'BC', 7, '30372', 1),
(452, 'Kannankudah', 'BC', 7, '30016', 1),
(453, 'Karadiyanaru', 'BC', 7, '30354', 1),
(454, 'Mandur', 'BC', 7, '30220', 1),
(455, 'Mankemi', 'BC', 7, '30442', 1),
(456, 'Oddamavadi', 'BC', 7, '30420', 1),
(457, 'Panichankemi', 'BC', 7, '30444', 1),
(458, 'Pankudavely', 'BC', 7, '30352', 1),
(459, 'Periyaporativu', 'BC', 7, '30230', 1),
(460, 'Periyapullumalai', 'BC', 7, '30358', 1),
(461, 'Pillaiyaradi', 'BC', 7, '30022', 1),
(462, 'Punanai', 'BC', 7, '30428', 1),
(463, 'Puthukudiyiruppu', 'BC', 7, '30158', 1),
(464, 'Thannamunai', 'BC', 7, '30024', 1),
(465, 'Thettativu', 'BC', 7, '30196', 1),
(466, 'Thikkodai', 'BC', 7, '30236', 1),
(467, 'Thirupalugamam', 'BC', 7, '30234', 1),
(468, 'Thuraineelavanai', 'BC', 7, '30254', 1),
(469, 'Unnichchai', 'BC', 7, '30364', 1),
(470, 'Vakaneri', 'BC', 7, '30424', 1),
(471, 'Vakarai', 'BC', 7, '30450', 1),
(472, 'Valaichenai', 'BC', 7, '30400', 1),
(473, 'Vantharumoolai', 'BC', 7, '30376', 1),
(474, 'Vellavely', 'BC', 7, '30204', 1),
(475, 'Agbopura', 'TC', 8, '31304', 1),
(476, 'Buckmigama', 'TC', 8, '31028', 1),
(477, 'Chinabay', 'TC', 8, '31050', 1),
(478, 'Dehiwatte', 'TC', 8, '31226', 1),
(479, 'Echchilampattai', 'TC', 8, '31236', 1),
(480, 'Galmetiyawa', 'TC', 8, '31318', 1),
(481, 'Gomarankadawala', 'TC', 8, '31026', 1),
(482, 'Kaddaiparichchan', 'TC', 8, '31212', 1),
(483, 'Kanniya', 'TC', 8, '31032', 1),
(484, 'Kantalai', 'TC', 8, '31300', 1),
(485, 'KantalaiSugarFactory', 'TC', 8, '31306', 1),
(486, 'Lankapatuna', 'TC', 8, '31234', 1),
(487, 'Mahadivulwewa', 'TC', 8, '31036', 1),
(488, 'Maharugiramam', 'TC', 8, '31106', 1),
(489, 'Mallikativu', 'TC', 8, '31224', 1),
(490, 'Mawadichenai', 'TC', 8, '31238', 1),
(491, 'Pankulam', 'TC', 8, '31034', 1),
(492, 'Rottawewa', 'TC', 8, '31038', 1),
(493, 'Sampaltivu', 'TC', 8, '31006', 1),
(494, 'Sampur', 'TC', 8, '31216', 1),
(495, 'Serunuwara', 'TC', 8, '31232', 1),
(496, 'Seruwila', 'TC', 8, '31260', 1),
(497, 'Sirajnagar', 'TC', 8, '31314', 1),
(498, 'Somapura', 'TC', 8, '31222', 1),
(499, 'Tampalakamam', 'TC', 8, '31046', 1),
(500, 'Tiriyayi', 'TC', 8, '31016', 1),
(501, 'Toppur', 'TC', 8, '31250', 1),
(502, 'Trincomalee', 'TC', 8, '31000', 1),
(503, 'Vellamanal', 'TC', 8, '31053', 1),
(504, 'Wanela', 'TC', 8, '31308', 1),
(505, 'Addalaichenai', 'APR', 9, '32350', 1),
(506, 'Akkaraipattu', 'APR', 9, '32400', 1),
(507, 'Ampara', 'APR', 9, '32000', 1),
(508, 'Bakmitiyawa', 'APR', 9, '32024', 1),
(509, 'Central Camp', 'APR', 9, '32050', 1),
(510, 'Dadayamtalawa', 'APR', 9, '32046', 1),
(511, 'Damana', 'APR', 9, '32014', 1),
(512, 'Damanewela', 'APR', 9, '32126', 1),
(513, 'Deegawapiya', 'APR', 9, '32006', 1),
(514, 'Dehiattakandiya', 'APR', 9, '32150', 1),
(515, 'Devalahinda', 'APR', 9, '32038', 1),
(516, 'Digamadulla', 'APR', 9, '32008', 1),
(517, 'Dorakumbura', 'APR', 9, '32104', 1),
(518, 'Galapitagala', 'APR', 9, '32066', 1),
(519, 'Gonagolla', 'APR', 9, '32064', 1),
(520, 'Hingurana', 'APR', 9, '32010', 1),
(521, 'Hulannuge', 'APR', 9, '32514', 1),
(522, 'Kalmunai', 'APR', 9, '32300', 1),
(523, 'Kannakipuram', 'APR', 9, '32405', 1),
(524, 'Labunoruwa', 'APR', 9, '32512', 1),
(525, 'lmkkamam', 'APR', 9, '32450', 1),
(526, 'Madawalalanda', 'APR', 9, '32016', 1),
(527, 'Mahanagapura', 'APR', 9, '32018', 1),
(528, 'Mahaoya', 'APR', 9, '32070', 1),
(529, 'Malwatta', 'APR', 9, '32198', 1),
(530, 'Mangalagama', 'APR', 9, '32069', 1),
(531, 'Marathamune', 'APR', 9, '32314', 1),
(532, 'Mawanagama', 'APR', 9, '32158', 1),
(533, 'Oluvil', 'APR', 9, '32360', 1),
(534, 'Padiyatalawa', 'APR', 9, '32100', 1),
(535, 'Pahalalanda', 'APR', 9, '32034', 1),
(536, 'Palamunai', 'APR', 9, '32354', 1),
(537, 'Panama', 'APR', 9, '32508', 1),
(538, 'Pannalagama', 'APR', 9, '32022', 1),
(539, 'Paragahakele', 'APR', 9, '32031', 1),
(540, 'Periyaneelavanai', 'APR', 9, '32316', 1),
(541, 'Polwaga Janapadaya', 'APR', 9, '32032', 1),
(542, 'Pottuvil', 'APR', 9, '32500', 1),
(543, 'Rajagalatenna', 'APR', 9, '32068', 1),
(544, 'Sainthamaruthu', 'APR', 9, '32280', 1),
(545, 'Samanthurai', 'APR', 9, '32200', 1),
(546, 'Serankada', 'APR', 9, '32101', 1),
(547, 'Siripura', 'APR', 9, '32155', 1),
(548, 'Siyambalawewa', 'APR', 9, '32048', 1),
(549, 'Tempitiya', 'APR', 9, '32072', 1),
(550, 'Thambiluvil', 'APR', 9, '32415', 1),
(551, 'Tirukovil', 'APR', 9, '32420', 1),
(552, 'Uhana', 'APR', 9, '32060', 1),
(553, 'Wadinagala', 'APR', 9, '32039', 1),
(554, 'Wanagamuwa', 'APR', 9, '32454', 1),
(555, 'Jaffna', 'JA', 10, '40000', 1),
(556, 'Mannar', 'MB', 11, '41000', 1),
(557, 'Mullativu', 'MP', 12, '42000', 1),
(558, 'Vavuniya', 'VA', 13, '43000', 1),
(559, 'Andiyagala', 'AD', 14, '50112', 1),
(560, 'Angamuwa', 'AD', 14, '50248', 1),
(561, 'Anuradhapura', 'AD', 14, '50000', 1),
(562, 'Awukana', 'AD', 14, '50169', 1),
(563, 'Bogahawewa', 'AD', 14, '50566', 1),
(564, 'Dematawewa', 'AD', 14, '50356', 1),
(565, 'Dunumadalawa', 'AD', 14, '50214', 1),
(566, 'Dutuwewa', 'AD', 14, '50393', 1),
(567, 'Elayapattuwa', 'AD', 14, '50014', 1),
(568, 'Eppawala', 'AD', 14, '50260', 1),
(569, 'Etawatunuwewa', 'AD', 14, '50584', 1),
(570, 'Etaweeragollewa', 'AD', 14, '50518', 1),
(571, 'Galadivulwewa', 'AD', 14, '50210', 1),
(572, 'Galenbindunuwewa', 'AD', 14, '50390', 1),
(573, 'Galkadawala', 'AD', 14, '50006', 1),
(574, 'Galkiriyagama', 'AD', 14, '50120', 1),
(575, 'Galkulama', 'AD', 14, '50064', 1),
(576, 'Galnewa', 'AD', 14, '50170', 1),
(577, 'Gambirigaswewa', 'AD', 14, '50057', 1),
(578, 'Ganewalpola', 'AD', 14, '50142', 1),
(579, 'Gemunupura', 'AD', 14, '50224', 1),
(580, 'Getalawa', 'AD', 14, '50392', 1),
(581, 'Gnanikulama', 'AD', 14, '50036', 1),
(582, 'Gonahaddenawa', 'AD', 14, '50554', 1),
(583, 'Habarana', 'AD', 14, '50150', 1),
(584, 'Halmillawa', 'AD', 14, '50124', 1),
(585, 'Halmillawetiya', 'AD', 14, '50552', 1),
(586, 'Hidogama', 'AD', 14, '50044', 1),
(587, 'Horawpatana', 'AD', 14, '50350', 1),
(588, 'Horiwila', 'AD', 14, '50222', 1),
(589, 'Hurigaswewa', 'AD', 14, '50176', 1),
(590, 'Hurulunikawewa', 'AD', 14, '50394', 1),
(591, 'Kagama', 'AD', 14, '50282', 1),
(592, 'Kahatagasdigiliya', 'AD', 14, '50320', 1),
(593, 'Kahatagollewa', 'AD', 14, '50562', 1),
(594, 'Kalakarambewa', 'AD', 14, '50288', 1),
(595, 'Kalankuttiya', 'AD', 14, '50174', 1),
(596, 'Kalaoya', 'AD', 14, '50226', 1),
(597, 'Kalawedi Ulpotha', 'AD', 14, '50556', 1),
(598, 'Kallanchiya', 'AD', 14, '50454', 1),
(599, 'Kapugallawa', 'AD', 14, '50370', 1),
(600, 'Karagahawewa', 'AD', 14, '50232', 1),
(601, 'Labunoruwa', 'AD', 14, '50088', 1),
(602, 'lhala Halmillewa', 'AD', 14, '50262', 1),
(603, 'lhalagama', 'AD', 14, '50304', 1),
(604, 'lpologama', 'AD', 14, '50280', 1),
(605, 'Madatugama', 'AD', 14, '50130', 1),
(606, 'Maha Elagamuwa', 'AD', 14, '50126', 1),
(607, 'Mahabulankulama', 'AD', 14, '50196', 1),
(608, 'Mahailluppallama', 'AD', 14, '50270', 1),
(609, 'Mahakanadarawa', 'AD', 14, '50306', 1),
(610, 'Mahapothana', 'AD', 14, '50327', 1),
(611, 'Mahasenpura', 'AD', 14, '50574', 1),
(612, 'Mahawilachchiya', 'AD', 14, '50022', 1),
(613, 'Mailagaswewa', 'AD', 14, '50384', 1),
(614, 'Malwanagama', 'AD', 14, '50236', 1),
(615, 'Maneruwa', 'AD', 14, '50182', 1),
(616, 'Maradankadawala', 'AD', 14, '50080', 1),
(617, 'Maradankalla', 'AD', 14, '50308', 1),
(618, 'Medawachchiya', 'AD', 14, '50500', 1),
(619, 'Megodawewa', 'AD', 14, '50334', 1),
(620, 'Padavi Maithripura', 'AD', 14, '50572', 1),
(621, 'Padavi arakramapura', 'AD', 14, '50582', 1),
(622, 'Padavi Sripura', 'AD', 14, '50587', 1),
(623, 'Padavi Sritissapura', 'AD', 14, '50588', 1),
(624, 'Padaviya', 'AD', 14, '50570', 1),
(625, 'Padikaramaduwa', 'AD', 14, '50338', 1),
(626, 'Pahala Halmillewa', 'AD', 14, '50206', 1),
(627, 'Pahala Maragahawe', 'AD', 14, '50220', 1),
(628, 'Pahalagama', 'AD', 14, '50244', 1),
(629, 'Palagala', 'AD', 14, '50111', 1),
(630, 'Palugaswewa', 'AD', 14, '50144', 1),
(631, 'Pandukabayapura', 'AD', 14, '50448', 1),
(632, 'Pandulagama', 'AD', 14, '50029', 1),
(633, 'Parakumpura', 'AD', 14, '50326', 1),
(634, 'Parangiyawadiya', 'AD', 14, '50354', 1),
(635, 'Parasangahawewa', 'AD', 14, '50055', 1),
(636, 'Pemaduwa', 'AD', 14, '50020', 1),
(637, 'Perimiyankulama', 'AD', 14, '50004', 1),
(638, 'Pihimbiyagolewa', 'AD', 14, '50512', 1),
(639, 'Pubbogama', 'AD', 14, '50122', 1),
(640, 'Pulmoddai', 'AD', 14, '50567', 1),
(641, 'Punewa', 'AD', 14, '50506', 1),
(642, 'Rajanganaya', 'AD', 14, '50246', 1),
(643, 'Rambewa', 'AD', 14, '50450', 1),
(644, 'Rampathwila', 'AD', 14, '50386', 1),
(645, 'Ranorawa', 'AD', 14, '50212', 1),
(646, 'Rathmalgahawewa', 'AD', 14, '50514', 1),
(647, 'Saliyapura', 'AD', 14, '50008', 1),
(648, 'Seeppukulama', 'AD', 14, '50380', 1),
(649, 'Senapura', 'AD', 14, '50284', 1),
(650, 'Sivalakulama', 'AD', 14, '50068', 1),
(651, 'Siyambalewa', 'AD', 14, '50184', 1),
(652, 'Sravasthipura', 'AD', 14, '50042', 1),
(653, 'Talawa', 'AD', 14, '50230', 1),
(654, 'Tambuttegama', 'AD', 14, '50240', 1),
(655, 'Tammennawa', 'AD', 14, '50104', 1),
(656, 'Tantirimale', 'AD', 14, '50016', 1),
(657, 'Telhiriyawa', 'AD', 14, '50242', 1),
(658, 'Tirappane', 'AD', 14, '50072', 1),
(659, 'Tittagonewa', 'AD', 14, '50558', 1),
(660, 'Udunuwara Colony', 'AD', 14, '50207', 1),
(661, 'Upuldeniya', 'AD', 14, '50382', 1),
(662, 'Uttimaduwa', 'AD', 14, '50067', 1),
(663, 'Viharapalugama', 'AD', 14, '50012', 1),
(664, 'Vijithapura', 'AD', 14, '50110', 1),
(665, 'Wahalkada', 'AD', 14, '50564', 1),
(666, 'Wahamalgollewa', 'AD', 14, '50492', 1),
(667, 'Walagambahuwa', 'AD', 14, '50086', 1),
(668, 'Walahaviddawewa', 'AD', 14, '50516', 1),
(669, 'Alutwewa', 'PR', 15, '51014', 1),
(670, 'Aralaganwila', 'PR', 15, '51100', 1),
(671, 'Aselapura', 'PR', 15, '51072', 1),
(672, 'Attanakadawala', 'PR', 15, '51235', 1),
(673, 'Bakamuna', 'PR', 15, '51250', 1),
(674, 'Dalukana', 'PR', 15, '51092', 1),
(675, 'Damminna', 'PR', 15, '51106', 1),
(676, 'Dewagala', 'PR', 15, '51094', 1),
(677, 'Dimbulagala', 'PR', 15, '51031', 1),
(678, 'Divulankadawala', 'PR', 15, '51428', 1),
(679, 'Divuldamana', 'PR', 15, '51104', 1),
(680, 'Diyabeduma', 'PR', 15, '51225', 1),
(681, 'Diyasenpura', 'PR', 15, '51504', 1),
(682, 'Elahera', 'PR', 15, '51258', 1),
(683, 'Ellewewa', 'PR', 15, '51034', 1),
(684, 'Galamuna', 'PR', 15, '51416', 1),
(685, 'Galoya Junction', 'PR', 15, '51375', 1),
(686, 'Giritale', 'PR', 15, '51026', 1),
(687, 'Hansayapalama', 'PR', 15, '51098', 1),
(688, 'Hingurakdamana', 'PR', 15, '51408', 1),
(689, 'Hingurakgoda', 'PR', 15, '51400', 1),
(690, 'Jayanthipura', 'PR', 15, '51024', 1),
(691, 'Jayasiripura', 'PR', 15, '51246', 1),
(692, 'Kalingaela', 'PR', 15, '51002', 1),
(693, 'Kalukele Badanagala', 'PR', 15, '51037', 1),
(694, 'Lakshauyana', 'PR', 15, '51006', 1),
(695, 'Maduruoya', 'PR', 15, '51108', 1),
(696, 'MahaAmbagaswewa', 'PR', 15, '51518', 1),
(697, 'Mahatalakolawewa', 'PR', 15, '51506', 1),
(698, 'Mahawela Sinhapura', 'PR', 15, '51076', 1),
(699, 'Mampitiya', 'PR', 15, '51090', 1),
(700, 'Medirigiriya', 'PR', 15, '51500', 1),
(701, 'Meegaswewa', 'PR', 15, '51508', 1),
(702, 'Onegama', 'PR', 15, '51004', 1),
(703, 'Palugasdamana', 'PR', 15, '51046', 1),
(704, 'Parakramasamudraya', 'PR', 15, '51016', 1),
(705, 'Pelatiyawa', 'PR', 15, '51033', 1),
(706, 'Pimburattewa', 'PR', 15, '51102', 1),
(707, 'Polonnaruwa', 'PR', 15, '51000', 1),
(708, 'Pulastigama', 'PR', 15, '51050', 1),
(709, 'Sevanapitiya', 'PR', 15, '51062', 1),
(710, 'Sinhagama', 'PR', 15, '51378', 1),
(711, 'Sungavila', 'PR', 15, '51052', 1),
(712, 'Talpotha', 'PR', 15, '51044', 1),
(713, 'Tamankaduwa', 'PR', 15, '51089', 1),
(714, 'Tambala', 'PR', 15, '51049', 1),
(715, 'Unagalavehera', 'PR', 15, '51008', 1),
(716, 'Yodaela', 'PR', 15, '51422', 1),
(717, 'Yudaganawa', 'PR', 15, '51424', 1),
(718, 'Alahengama', 'KG', 16, '60416', 1),
(719, 'Alahitiyawa', 'KG', 16, '60182', 1),
(720, 'Alawatuwala', 'KG', 16, '60047', 1),
(721, 'Alawwa', 'KG', 16, '60280', 1),
(722, 'Ambakote', 'KG', 16, '60036', 1),
(723, 'Ambanpola', 'KG', 16, '60650', 1),
(724, 'Anhandiya', 'KG', 16, '60074', 1),
(725, 'Anukkane', 'KG', 16, '60214', 1),
(726, 'Aragoda', 'KG', 16, '60308', 1),
(727, 'Ataragalla', 'KG', 16, '60706', 1),
(728, 'Awulegama', 'KG', 16, '60462', 1),
(729, 'Balalla', 'KG', 16, '60604', 1),
(730, 'Bamunukotuwa', 'KG', 16, '60347', 1),
(731, 'Bandara Koswatta', 'KG', 16, '60424', 1),
(732, 'Bingiriya', 'KG', 16, '60450', 1),
(733, 'Bogamulla', 'KG', 16, '60107', 1),
(734, 'Bopitiya', 'KG', 16, '60155', 1),
(735, 'Boraluwewa', 'KG', 16, '60437', 1),
(736, 'Boyagane', 'KG', 16, '60027', 1),
(737, 'Bujjomuwa', 'KG', 16, '60291', 1),
(738, 'Buluwala', 'KG', 16, '60076', 1),
(739, 'Dambadeniya', 'KG', 16, '60130', 1),
(740, 'Daraluwa', 'KG', 16, '60174', 1),
(741, 'Deegalla', 'KG', 16, '60228', 1),
(742, 'Delwite', 'KG', 16, '60044', 1),
(743, 'Demataluwa', 'KG', 16, '60024', 1),
(744, 'Diddeniya', 'KG', 16, '60544', 1),
(745, 'Digannewa', 'KG', 16, '60485', 1),
(746, 'Divullegoda', 'KG', 16, '60472', 1),
(747, 'Dodangaslanda', 'KG', 16, '60530', 1),
(748, 'Doratiyawa', 'KG', 16, '60013', 1),
(749, 'Dummalasuriya', 'KG', 16, '60260', 1),
(750, 'Ehetuwewa', 'KG', 16, '60716', 1),
(751, 'Elibichchiya', 'KG', 16, '60156', 1),
(752, 'Embogama', 'KG', 16, '60718', 1),
(753, 'Etungahakotuwa', 'KG', 16, '60266', 1),
(754, 'Galgamuwa', 'KG', 16, '60700', 1),
(755, 'Gallewa', 'KG', 16, '60712', 1),
(756, 'Girathalana', 'KG', 16, '60752', 1),
(757, 'Giriulla', 'KG', 16, '60140', 1),
(758, 'Gokaralla', 'KG', 16, '60522', 1),
(759, 'Gonawila', 'KG', 16, '60170', 1),
(760, 'Halmillawewa', 'KG', 16, '60441', 1),
(761, 'Hengamuwa', 'KG', 16, '60414', 1),
(762, 'Hettipola', 'KG', 16, '60430', 1),
(763, 'Hilogama', 'KG', 16, '60486', 1),
(764, 'Hindagolla', 'KG', 16, '60034', 1),
(765, 'Hiriyala Lenawa', 'KG', 16, '60546', 1),
(766, 'Hiruwalpola', 'KG', 16, '60458', 1),
(767, 'Horambawa', 'KG', 16, '60181', 1),
(768, 'Hulogedara', 'KG', 16, '60474', 1),
(769, 'Hulugalla', 'KG', 16, '60477', 1),
(770, 'Hunupola', 'KG', 16, '60582', 1),
(771, 'Ihala Gomugomuwa', 'KG', 16, '60211', 1),
(772, 'Ihala Katugampala', 'KG', 16, '60135', 1),
(773, 'Indulgodakanda', 'KG', 16, '60016', 1),
(774, 'Inguruwatta', 'KG', 16, '60064', 1),
(775, 'Iriyagolla', 'KG', 16, '60045', 1),
(776, 'Ithanawatta', 'KG', 16, '60025', 1),
(777, 'Kadigawa', 'KG', 16, '60492', 1),
(778, 'Kahapathwala', 'KG', 16, '60062', 1),
(779, 'Kalugamuwa', 'KG', 16, '60096', 1),
(780, 'Kanadeniyawala', 'KG', 16, '60054', 1),
(781, 'Kanattewewa', 'KG', 16, '60422', 1),
(782, 'Karagahagedara', 'KG', 16, '60106', 1),
(783, 'Karambe', 'KG', 16, '60602', 1),
(784, 'Labbala', 'KG', 16, '60162', 1),
(785, 'lbbagamuwa', 'KG', 16, '60500', 1),
(786, 'lhala Kadigamuwa', 'KG', 16, '60238', 1),
(787, 'llukhena', 'KG', 16, '60232', 1),
(788, 'Lonahettiya', 'KG', 16, '60108', 1),
(789, 'Madahapola', 'KG', 16, '60552', 1),
(790, 'Madakumburumulla', 'KG', 16, '60209', 1),
(791, 'Maduragoda', 'KG', 16, '60532', 1),
(792, 'Maeliya', 'KG', 16, '60512', 1),
(793, 'Magulagama', 'KG', 16, '60221', 1),
(794, 'Mahagalkadawala', 'KG', 16, '60731', 1),
(795, 'Mahagirilla', 'KG', 16, '60479', 1),
(796, 'Mahamukalanyaya', 'KG', 16, '60516', 1),
(797, 'Mahananneriya', 'KG', 16, '60724', 1),
(798, 'Maharachchimulla', 'KG', 16, '60286', 1),
(799, 'Maho', 'KG', 16, '60600', 1),
(800, 'Makulewa', 'KG', 16, '60714', 1),
(801, 'Makulpotha', 'KG', 16, '60514', 1),
(802, 'Makulwewa', 'KG', 16, '60578', 1),
(803, 'Malagane', 'KG', 16, '60404', 1),
(804, 'Mandapola', 'KG', 16, '60434', 1),
(805, 'Maspotha', 'KG', 16, '60344', 1),
(806, 'Mawathagama', 'KG', 16, '60060', 1),
(807, 'Medivawa', 'KG', 16, '60612', 1),
(808, 'Meegalawa', 'KG', 16, '60750', 1),
(809, 'Meetanwala', 'KG', 16, '60066', 1),
(810, 'Meewellawa', 'KG', 16, '60484', 1),
(811, 'Melsiripura', 'KG', 16, '60540', 1),
(812, 'Metikumbura', 'KG', 16, '60304', 1),
(813, 'Metiyagane', 'KG', 16, '60121', 1),
(814, 'Padeniya', 'KG', 16, '60461', 1),
(815, 'Padiwela', 'KG', 16, '60236', 1),
(816, 'Pahalagiribawa', 'KG', 16, '60735', 1),
(817, 'Pahamune', 'KG', 16, '60112', 1),
(818, 'Palukadawala', 'KG', 16, '60704', 1),
(819, 'Panadaragama', 'KG', 16, '60348', 1),
(820, 'Panagamuwa', 'KG', 16, '60052', 1),
(821, 'Panaliya', 'KG', 16, '60312', 1),
(822, 'Panliyadda', 'KG', 16, '60558', 1),
(823, 'Pannala', 'KG', 16, '60160', 1),
(824, 'Pansiyagama', 'KG', 16, '60554', 1),
(825, 'Periyakadneluwa', 'KG', 16, '60518', 1),
(826, 'Pihimbiya Ratmale', 'KG', 16, '60439', 1),
(827, 'Pihimbuwa', 'KG', 16, '60053', 1),
(828, 'Pilessa', 'KG', 16, '60058', 1),
(829, 'Polgahawela', 'KG', 16, '60300', 1),
(830, 'Polpitigama', 'KG', 16, '60620', 1),
(831, 'Pothuhera', 'KG', 16, '60330', 1),
(832, 'Puswelitenna', 'KG', 16, '60072', 1),
(833, 'Ridibendiella', 'KG', 16, '60606', 1),
(834, 'Ridigama', 'KG', 16, '60040', 1),
(835, 'Saliya Asokapura', 'KG', 16, '60736', 1),
(836, 'Sandalankawa', 'KG', 16, '60176', 1),
(837, 'Sirisetagama', 'KG', 16, '60478', 1),
(838, 'Siyambalangamuwa', 'KG', 16, '60646', 1),
(839, 'Solepura', 'KG', 16, '60737', 1),
(840, 'Solewewa', 'KG', 16, '60738', 1),
(841, 'Sunandapura', 'KG', 16, '60436', 1),
(842, 'Talawattegedara', 'KG', 16, '60306', 1),
(843, 'Tambutta', 'KG', 16, '60734', 1),
(844, 'Thalahitimulla', 'KG', 16, '60208', 1),
(845, 'Thalakolawewa', 'KG', 16, '60624', 1),
(846, 'Thalwita', 'KG', 16, '60572', 1),
(847, 'Thambagalla', 'KG', 16, '60584', 1),
(848, 'Tharana Udawela', 'KG', 16, '60227', 1),
(849, 'Thimbiriyawa', 'KG', 16, '60476', 1),
(850, 'Tisogama', 'KG', 16, '60453', 1),
(851, 'Torayaya', 'KG', 16, '60499', 1),
(852, 'Tuttiripitigama', 'KG', 16, '60426', 1),
(853, 'Udubaddawa', 'KG', 16, '60250', 1),
(854, 'Uhumiya', 'KG', 16, '60094', 1),
(855, 'Ulpotha Pallekele', 'KG', 16, '60622', 1),
(856, 'Wadakada', 'KG', 16, '60318', 1),
(857, 'Wadumunnegedara', 'KG', 16, '60204', 1),
(858, 'Walakumburumulla', 'KG', 16, '60198', 1),
(859, 'Wannigama', 'KG', 16, '60465', 1),
(860, 'Wannikudawewa', 'KG', 16, '60721', 1),
(861, 'Wannilhalagama', 'KG', 16, '60722', 1),
(862, 'Wannirasnayakapura', 'KG', 16, '60490', 1),
(863, 'Warawewa', 'KG', 16, '60739', 1),
(864, 'Wariyapola', 'KG', 16, '60400', 1),
(865, 'Watuwatta', 'KG', 16, '60262', 1),
(866, 'Weerapokuna', 'KG', 16, '60454', 1),
(867, 'Yakwila', 'KG', 16, '60202', 1),
(868, 'Yatigaloluwa', 'KG', 16, '60314', 1),
(869, 'Adippala', 'PX', 17, '61012', 1),
(870, 'Ambakandawila', 'PX', 17, '61024', 1),
(871, 'Anamaduwa', 'PX', 17, '61500', 1),
(872, 'Andigama', 'PX', 17, '61508', 1),
(873, 'Angunawila', 'PX', 17, '61264', 1),
(874, 'Attawilluwa', 'PX', 17, '61328', 1),
(875, 'Bangadeniya', 'PX', 17, '61238', 1),
(876, 'Baranankattuwa', 'PX', 17, '61262', 1),
(877, 'Battuluoya', 'PX', 17, '61246', 1),
(878, 'Bujjampola', 'PX', 17, '61136', 1),
(879, 'Chilaw', 'PX', 17, '61000', 1),
(880, 'Dankotuwa', 'PX', 17, '61130', 1),
(881, 'Dunkannawa', 'PX', 17, '61192', 1),
(882, 'Eluwankulama', 'PX', 17, '61308', 1),
(883, 'Ettale', 'PX', 17, '61343', 1),
(884, 'Galmuruwa', 'PX', 17, '61233', 1),
(885, 'Ihala Kottaramulla', 'PX', 17, '61154', 1),
(886, 'Ihala Puliyankulama', 'PX', 17, '61316', 1),
(887, 'Ilippadeniya', 'PX', 17, '61018', 1),
(888, 'Inginimitiya', 'PX', 17, '61514', 1),
(889, 'Ismailpuram', 'PX', 17, '61302', 1),
(890, 'Kakkapalliya', 'PX', 17, '61236', 1),
(891, 'Kalladiya', 'PX', 17, '61534', 1),
(892, 'Kalpitiya', 'PX', 17, '61360', 1),
(893, 'Kandakuliya', 'PX', 17, '61358', 1),
(894, 'Lihiriyagama', 'PX', 17, '61138', 1),
(895, 'Lunuwila', 'PX', 17, '61150', 1),
(896, 'Madampe', 'PX', 17, '61230', 1),
(897, 'Madurankuliya', 'PX', 17, '61270', 1),
(898, 'Mahakumbukkadawala', 'PX', 17, '61272', 1),
(899, 'Mahauswewa', 'PX', 17, '61512', 1),
(900, 'Mahawewa', 'PX', 17, '61220', 1),
(901, 'Mampuri', 'PX', 17, '61341', 1),
(902, 'Mangalaeliya', 'PX', 17, '61266', 1),
(903, 'Marawila', 'PX', 17, '61210', 1),
(904, 'Palaviya', 'PX', 17, '61280', 1),
(905, 'Palliwasalturai', 'PX', 17, '61354', 1),
(906, 'Panirendawa', 'PX', 17, '61234', 1),
(907, 'Pothuwatawana', 'PX', 17, '61162', 1),
(908, 'Puttalam', 'PX', 17, '61300', 1),
(909, 'PuttalamCementFactory', 'PX', 17, '61326', 1),
(910, 'Rajakadaluwa', 'PX', 17, '61242', 1),
(911, 'Saliyawewa Junction', 'PX', 17, '61324', 1),
(912, 'Serukele', 'PX', 17, '61042', 1),
(913, 'Sirambiadiya', 'PX', 17, '61312', 1),
(914, 'Siyambalagashene', 'PX', 17, '61504', 1),
(915, 'Tabbowa', 'PX', 17, '61322', 1),
(916, 'Talawila Church', 'PX', 17, '61344', 1),
(917, 'Toduwawa', 'PX', 17, '61224', 1),
(918, 'Udappuwa', 'PX', 17, '61004', 1),
(919, 'Uridyawa', 'PX', 17, '61502', 1),
(920, 'Vanathawilluwa', 'PX', 17, '61306', 1),
(921, 'Waikkal', 'PX', 17, '61110', 1),
(922, 'Watugahamulla', 'PX', 17, '61198', 1),
(923, 'Yogiyana', 'PX', 17, '61144', 1),
(924, 'Akarella', 'RN', 18, '70082', 1),
(925, 'Atakalanpanna', 'RN', 18, '70294', 1),
(926, 'Ayagama', 'RN', 18, '70024', 1),
(927, 'Balangoda', 'RN', 18, '70100', 1),
(928, 'Batatota', 'RN', 18, '70504', 1),
(929, 'Belihuloya', 'RN', 18, '70140', 1),
(930, 'Bolthumbe', 'RN', 18, '70131', 1),
(931, 'Bomluwageaina', 'RN', 18, '70344', 1),
(932, 'Bulutota', 'RN', 18, '70346', 1),
(933, 'Dambuluwana', 'RN', 18, '70019', 1),
(934, 'Daugala', 'RN', 18, '70455', 1),
(935, 'Dela', 'RN', 18, '70042', 1),
(936, 'Delwala', 'RN', 18, '70046', 1),
(937, 'Demuwatha', 'RN', 18, '70332', 1),
(938, 'Dodampe', 'RN', 18, '70017', 1),
(939, 'Doloswalakanda', 'RN', 18, '70404', 1),
(940, 'Dumbara Manana', 'RN', 18, '70495', 1),
(941, 'Eheliyagoda', 'RN', 18, '70600', 1),
(942, 'Elapatha', 'RN', 18, '70032', 1),
(943, 'Ellagawa', 'RN', 18, '70492', 1),
(944, 'Ellaulla', 'RN', 18, '70552', 1),
(945, 'Ellawala', 'RN', 18, '70606', 1),
(946, 'Embilipitiya', 'RN', 18, '70200', 1),
(947, 'Eratna', 'RN', 18, '70506', 1),
(948, 'Erepola', 'RN', 18, '70602', 1),
(949, 'Gabbela', 'RN', 18, '70156', 1),
(950, 'Gallella', 'RN', 18, '70062', 1),
(951, 'Gangeyaya', 'RN', 18, '70195', 1),
(952, 'Gawaragiriya', 'RN', 18, '70026', 1),
(953, 'Getahetta', 'RN', 18, '70620', 1),
(954, 'Gillimale', 'RN', 18, '70002', 1),
(955, 'Godagampola', 'RN', 18, '70556', 1),
(956, 'Godakawela', 'RN', 18, '70160', 1),
(957, 'Gurubewilagama', 'RN', 18, '70136', 1),
(958, 'Halpe', 'RN', 18, '70145', 1),
(959, 'Halwinna', 'RN', 18, '70171', 1),
(960, 'Handagiriya', 'RN', 18, '70106', 1),
(961, 'Hapugastenna', 'RN', 18, '70164', 1),
(962, 'Hatangala', 'RN', 18, '70105', 1),
(963, 'Hatarabage', 'RN', 18, '70108', 1),
(964, 'Hidellana', 'RN', 18, '70012', 1),
(965, 'Hiramadagama', 'RN', 18, '70296', 1),
(966, 'Ihalagama', 'RN', 18, '70144', 1),
(967, 'Ittakanda', 'RN', 18, '70342', 1),
(968, 'Kahangama', 'RN', 18, '70016', 1),
(969, 'Kahawatta', 'RN', 18, '70150', 1),
(970, 'Kalawana', 'RN', 18, '70450', 1),
(971, 'Kaltota', 'RN', 18, '70122', 1),
(972, 'Lellopitiya', 'RN', 18, '70056', 1),
(973, 'lmbulpe', 'RN', 18, '70134', 1),
(974, 'Madalagama', 'RN', 18, '70158', 1),
(975, 'Mahawalatenna', 'RN', 18, '70112', 1),
(976, 'Makandura Sabara', 'RN', 18, '70298', 1),
(977, 'Malwala Junction', 'RN', 18, '70001', 1),
(978, 'Marapana', 'RN', 18, '70041', 1),
(979, 'Matuwagalagama', 'RN', 18, '70482', 1),
(980, 'Medagalatur', 'RN', 18, '70021', 1),
(981, 'Meddekanda', 'RN', 18, '70127', 1),
(982, 'Omalpe', 'RN', 18, '70215', 1),
(983, 'Opanayaka', 'RN', 18, '70080', 1),
(984, 'Padalangala', 'RN', 18, '70230', 1),
(985, 'Pallebedda', 'RN', 18, '70170', 1),
(986, 'Pambagolla', 'RN', 18, '70133', 1),
(987, 'Panamura', 'RN', 18, '70218', 1),
(988, 'Panapitiya', 'RN', 18, '70152', 1),
(989, 'Panapola', 'RN', 18, '70461', 1),
(990, 'Panawala', 'RN', 18, '70612', 1),
(991, 'Parakaduwa', 'RN', 18, '70550', 1),
(992, 'Pebotuwa', 'RN', 18, '70045', 1),
(993, 'Pelmadulla', 'RN', 18, '70070', 1),
(994, 'Pimbura', 'RN', 18, '70472', 1),
(995, 'Pinnawala', 'RN', 18, '70130', 1),
(996, 'Pothupitiya', 'RN', 18, '70338', 1),
(997, 'Rajawaka', 'RN', 18, '70116', 1),
(998, 'Rakwana', 'RN', 18, '70300', 1),
(999, 'Ranwala', 'RN', 18, '70162', 1),
(1000, 'Rassagala', 'RN', 18, '70135', 1),
(1001, 'Ratna Hangamuwa', 'RN', 18, '70036', 1),
(1002, 'Ratnapura', 'RN', 18, '70000', 1),
(1003, 'Samanalawewa', 'RN', 18, '70142', 1),
(1004, 'Sri Palabaddala', 'RN', 18, '70004', 1),
(1005, 'Sudagala', 'RN', 18, '70502', 1),
(1006, 'Talakolahinna', 'RN', 18, '70101', 1),
(1007, 'Tanjantenna', 'RN', 18, '70118', 1),
(1008, 'Teppanawa', 'RN', 18, '70512', 1),
(1009, 'Tunkama', 'RN', 18, '70205', 1),
(1010, 'Udaha Hawupe', 'RN', 18, '70154', 1),
(1011, 'Udakarawita', 'RN', 18, '70044', 1),
(1012, 'Udaniriella', 'RN', 18, '70034', 1),
(1013, 'Udawalawe', 'RN', 18, '70190', 1),
(1014, 'Ullinduwawa', 'RN', 18, '70345', 1),
(1015, 'Veddagala', 'RN', 18, '70459', 1),
(1016, 'Vijeriya', 'RN', 18, '70348', 1),
(1017, 'Waleboda', 'RN', 18, '70138', 1),
(1018, 'Watapotha', 'RN', 18, '70408', 1),
(1019, 'Waturawa', 'RN', 18, '70456', 1),
(1020, 'Alawatura', 'KE', 19, '71204', 1),
(1021, 'Algama', 'KE', 19, '71607', 1),
(1022, 'Alutnuwara', 'KE', 19, '71508', 1),
(1023, 'Ambalakanda', 'KE', 19, '71546', 1),
(1024, 'Ambulugala', 'KE', 19, '71503', 1),
(1025, 'Amitirigala', 'KE', 19, '71320', 1),
(1026, 'Ampagala', 'KE', 19, '71232', 1),
(1027, 'Anhettigama', 'KE', 19, '71403', 1),
(1028, 'Aranayaka', 'KE', 19, '71540', 1),
(1029, 'Aruggammana', 'KE', 19, '71041', 1),
(1030, 'Atale', 'KE', 19, '71363', 1),
(1031, 'Batuwita', 'KE', 19, '71321', 1),
(1032, 'Beligala(Sab)', 'KE', 19, '71044', 1),
(1033, 'Berannawa', 'KE', 19, '71706', 1),
(1034, 'Bopitiya', 'KE', 19, '71612', 1),
(1035, 'Boralankada', 'KE', 19, '71418', 1),
(1036, 'Bossella', 'KE', 19, '71208', 1),
(1037, 'Bulathkohupitiya', 'KE', 19, '71230', 1),
(1038, 'Damunupola', 'KE', 19, '71034', 1),
(1039, 'Debathgama', 'KE', 19, '71037', 1),
(1040, 'Dedugala', 'KE', 19, '71237', 1),
(1041, 'Deewala Pallegama', 'KE', 19, '71022', 1),
(1042, 'Dehiowita', 'KE', 19, '71400', 1),
(1043, 'Deldeniya', 'KE', 19, '71009', 1),
(1044, 'Deloluwa', 'KE', 19, '71401', 1),
(1045, 'Deraniyagala', 'KE', 19, '71430', 1),
(1046, 'Dewalegama', 'KE', 19, '71050', 1),
(1047, 'Dewanagala', 'KE', 19, '71527', 1),
(1048, 'Dombemada', 'KE', 19, '71115', 1),
(1049, 'Dorawaka', 'KE', 19, '71601', 1),
(1050, 'Dunumala', 'KE', 19, '71605', 1),
(1051, 'Galapitamada', 'KE', 19, '71603', 1),
(1052, 'Galatara', 'KE', 19, '71505', 1),
(1053, 'Galigamuwa Town', 'KE', 19, '71350', 1),
(1054, 'Galpatha(Sab)', 'KE', 19, '71312', 1),
(1055, 'Gantuna', 'KE', 19, '71222', 1),
(1056, 'Gonagala', 'KE', 19, '71318', 1),
(1057, 'Hakahinna', 'KE', 19, '71352', 1),
(1058, 'Hakbellawaka', 'KE', 19, '71715', 1),
(1059, 'Helamada', 'KE', 19, '71046', 1),
(1060, 'Hemmatagama', 'KE', 19, '71530', 1),
(1061, 'Hettimulla', 'KE', 19, '71210', 1),
(1062, 'Hewadiwela', 'KE', 19, '71108', 1),
(1063, 'Hingula', 'KE', 19, '71520', 1),
(1064, 'Hinguralakanda', 'KE', 19, '71417', 1),
(1065, 'Hiriwadunna', 'KE', 19, '71014', 1),
(1066, 'Imbulana', 'KE', 19, '71313', 1),
(1067, 'Imbulgasdeniya', 'KE', 19, '71055', 1),
(1068, 'Kabagamuwa', 'KE', 19, '71202', 1),
(1069, 'Kannattota', 'KE', 19, '71372', 1),
(1070, 'Lewangama', 'KE', 19, '71315', 1),
(1071, 'Mahabage', 'KE', 19, '71722', 1),
(1072, 'Mahapallegama', 'KE', 19, '71063', 1),
(1073, 'Maharangalla', 'KE', 19, '71211', 1),
(1074, 'Makehelwala', 'KE', 19, '71507', 1),
(1075, 'Malalpola', 'KE', 19, '71704', 1),
(1076, 'Maliboda', 'KE', 19, '71411', 1),
(1077, 'Malmaduwa', 'KE', 19, '71325', 1),
(1078, 'Mawanella', 'KE', 19, '71500', 1),
(1079, 'Parape', 'KE', 19, '71105', 1),
(1080, 'Pattampitiya', 'KE', 19, '71130', 1),
(1081, 'Pitagaldeniya', 'KE', 19, '71360', 1),
(1082, 'Pothukoladeniya', 'KE', 19, '71039', 1),
(1083, 'Rambukkana', 'KE', 19, '71100', 1),
(1084, 'Ruwanwella', 'KE', 19, '71300', 1),
(1085, 'Seaforth Colony', 'KE', 19, '71708', 1),
(1086, 'Talgaspitiya', 'KE', 19, '71541', 1),
(1087, 'Teligama', 'KE', 19, '71724', 1),
(1088, 'Tholangamuwa', 'KE', 19, '71619', 1),
(1089, 'Thotawella', 'KE', 19, '71106', 1),
(1090, 'Tulhiriya', 'KE', 19, '71610', 1),
(1091, 'Tuntota', 'KE', 19, '71062', 1),
(1092, 'Udagaldeniya', 'KE', 19, '71113', 1),
(1093, 'Udapotha', 'KE', 19, '71236', 1),
(1094, 'Udumulla', 'KE', 19, '71521', 1),
(1095, 'Undugoda', 'KE', 19, '71200', 1),
(1096, 'Ussapitiya', 'KE', 19, '71510', 1),
(1097, 'Wahakula', 'KE', 19, '71303', 1),
(1098, 'Waharaka', 'KE', 19, '71304', 1),
(1099, 'Warakapola', 'KE', 19, '71600', 1),
(1100, 'Watura', 'KE', 19, '71035', 1),
(1101, 'Weeoya', 'KE', 19, '71702', 1),
(1102, 'Yatagama', 'KE', 19, '71116', 1),
(1103, 'Yatapana', 'KE', 19, '71326', 1),
(1104, 'Yatiyantota', 'KE', 19, '71700', 1),
(1105, 'Yattogoda', 'KE', 19, '71029', 1),
(1106, 'Agaliya', 'GL', 20, '80212', 1),
(1107, 'Ahangama', 'GL', 20, '80650', 1),
(1108, 'Ahungalla', 'GL', 20, '80562', 1),
(1109, 'Akmeemana', 'GL', 20, '80090', 1),
(1110, 'Aluthwala', 'GL', 20, '80332', 1),
(1111, 'Ambalangoda', 'GL', 20, '80300', 1),
(1112, 'Ampegama', 'GL', 20, '80204', 1),
(1113, 'Amugoda', 'GL', 20, '80422', 1),
(1114, 'Anangoda', 'GL', 20, '80044', 1),
(1115, 'Angulugaha', 'GL', 20, '80122', 1),
(1116, 'Ankokkawala', 'GL', 20, '80048', 1),
(1117, 'Baddegama', 'GL', 20, '80200', 1),
(1118, 'Balapitiya', 'GL', 20, '80550', 1),
(1119, 'Banagala', 'GL', 20, '80143', 1),
(1120, 'Batapola', 'GL', 20, '80320', 1),
(1121, 'Bentota', 'GL', 20, '80500', 1),
(1122, 'Boossa', 'GL', 20, '80270', 1),
(1123, 'Dikkumbura', 'GL', 20, '80654', 1),
(1124, 'Dodanduwa', 'GL', 20, '80250', 1),
(1125, 'Ella Tanabaddegama', 'GL', 20, '80402', 1),
(1126, 'Elpitiya', 'GL', 20, '80400', 1),
(1127, 'Ethkandura', 'GL', 20, '80458', 1),
(1128, 'Galle', 'GL', 20, '80000', 1),
(1129, 'Ganegoda', 'GL', 20, '80440', 1),
(1130, 'Ginimellagaha', 'GL', 20, '80220', 1),
(1131, 'Gintota', 'GL', 20, '80280', 1),
(1132, 'Godahena', 'GL', 20, '80302', 1),
(1133, 'Gonagalpura', 'GL', 20, '80502', 1),
(1134, 'Gonamulla', 'GL', 20, '80054', 1),
(1135, 'Gonapinuwala', 'GL', 20, '80230', 1),
(1136, 'Habaraduwa', 'GL', 20, '80630', 1),
(1137, 'Haburugala', 'GL', 20, '80506', 1),
(1138, 'Halvitigala', 'GL', 20, '80146', 1),
(1139, 'Hawpe', 'GL', 20, '80132', 1),
(1140, 'Hikkaduwa', 'GL', 20, '80240', 1),
(1141, 'Hiniduma', 'GL', 20, '80080', 1),
(1142, 'Hiyare', 'GL', 20, '80056', 1),
(1143, 'Ihala Walpola', 'GL', 20, '80134', 1),
(1144, 'Kahaduwa', 'GL', 20, '80460', 1),
(1145, 'Kahawa', 'GL', 20, '80312', 1),
(1146, 'Kananke Bazaar', 'GL', 20, '80136', 1),
(1147, 'Karagoda', 'GL', 20, '80151', 1),
(1148, 'lhalahewessa', 'GL', 20, '80432', 1),
(1149, 'lmaduwa', 'GL', 20, '80130', 1),
(1150, 'lnduruwa', 'GL', 20, '80510', 1),
(1151, 'Magedara', 'GL', 20, '80152', 1),
(1152, 'Magedara', 'GL', 20, '80152', 1),
(1153, 'Malgalla Talangalla', 'GL', 20, '80144', 1),
(1154, 'Mapalagama', 'GL', 20, '80112', 1),
(1155, 'Mapalagama', 'GL', 20, '80112', 1),
(1156, 'Mapalagama Central', 'GL', 20, '80166', 1),
(1157, 'Mattaka', 'GL', 20, '80424', 1),
(1158, 'Meda-Keembiya', 'GL', 20, '80092', 1),
(1159, 'Meetiyagoda', 'GL', 20, '80330', 1),
(1160, 'Opatha', 'GL', 20, '80142', 1),
(1161, 'Panangala', 'GL', 20, '80075', 1),
(1162, 'Pannimulla anagoda', 'GL', 20, '80086', 1),
(1163, 'ParanaThanaYamgoda', 'GL', 20, '80114', 1),
(1164, 'Pitigala', 'GL', 20, '80420', 1),
(1165, 'Poddala', 'GL', 20, '80170', 1),
(1166, 'Porawagama', 'GL', 20, '80408', 1),
(1167, 'Rantotuwila', 'GL', 20, '80354', 1),
(1168, 'Ratgama', 'GL', 20, '80260', 1),
(1169, 'Talagampola', 'GL', 20, '80058', 1),
(1170, 'Talgaspe', 'GL', 20, '80406', 1),
(1171, 'Talgaswela', 'GL', 20, '80470', 1),
(1172, 'Talpe', 'GL', 20, '80615', 1),
(1173, 'Tawalama', 'GL', 20, '80148', 1),
(1174, 'Tiranagama', 'GL', 20, '80244', 1),
(1175, 'Udalamatta', 'GL', 20, '80108', 1),
(1176, 'Udugama', 'GL', 20, '80070', 1),
(1177, 'Uluvitike', 'GL', 20, '80168', 1),
(1178, 'Unawatuna', 'GL', 20, '80600', 1),
(1179, 'Unenwitiya', 'GL', 20, '80214', 1),
(1180, 'Uragaha', 'GL', 20, '80352', 1),
(1181, 'Uragasmanhandiya', 'GL', 20, '80350', 1),
(1182, 'Wakwella', 'GL', 20, '80042', 1),
(1183, 'Walahanduwa', 'GL', 20, '80046', 1),
(1184, 'Wanchawela', 'GL', 20, '80120', 1),
(1185, 'Wanduramba', 'GL', 20, '80100', 1),
(1186, 'Warukandeniya', 'GL', 20, '80084', 1),
(1187, 'Watugedara', 'GL', 20, '80340', 1),
(1188, 'Yakkalamulla', 'GL', 20, '80150', 1),
(1189, 'Yatalamatta', 'GL', 20, '80107', 1),
(1190, 'Akuressa', 'MH', 21, '81400', 1),
(1191, 'Alapaladeniya', 'MH', 21, '81475', 1),
(1192, 'Aparekka', 'MH', 21, '81032', 1),
(1193, 'Athuraliya', 'MH', 21, '81402', 1),
(1194, 'Bengamuwa', 'MH', 21, '81614', 1),
(1195, 'Beralapanathara', 'MH', 21, '81541', 1),
(1196, 'Bopagoda', 'MH', 21, '81412', 1),
(1197, 'Dampahala', 'MH', 21, '81612', 1),
(1198, 'Deegala Llenama', 'MH', 21, '81452', 1),
(1199, 'Deiyandara', 'MH', 21, '81320', 1),
(1200, 'Dellawa', 'MH', 21, '81477', 1),
(1201, 'Denagama', 'MH', 21, '81314', 1),
(1202, 'Denipitiya', 'MH', 21, '81730', 1),
(1203, 'Deniyaya', 'MH', 21, '81500', 1),
(1204, 'Derangala', 'MH', 21, '81454', 1),
(1205, 'Devinuwara (Dondra)', 'MH', 21, '81160', 1),
(1206, 'Dikwella', 'MH', 21, '81200', 1),
(1207, 'Diyagaha', 'MH', 21, '81038', 1),
(1208, 'Diyalape', 'MH', 21, '81422', 1),
(1209, 'Gandara', 'MH', 21, '81170', 1),
(1210, 'Godapitiya', 'MH', 21, '81408', 1),
(1211, 'Gomilamawarala', 'MH', 21, '81072', 1),
(1212, 'Hakmana', 'MH', 21, '81300', 1),
(1213, 'Handugala', 'MH', 21, '81326', 1),
(1214, 'Horapawita', 'MH', 21, '81108', 1),
(1215, 'Kalubowitiyana', 'MH', 21, '81478', 1),
(1216, 'Kamburugamuwa', 'MH', 21, '81750', 1),
(1217, 'Kamburupitiya', 'MH', 21, '81100', 1),
(1218, 'Karagoda', 'MH', 21, '81082', 1),
(1219, 'Lankagama', 'MH', 21, '81526', 1),
(1220, 'Makandura', 'MH', 21, '81070', 1);
INSERT INTO `tbl_city` (`city_id`, `city_name`, `city_code`, `district_id`, `postal_code`, `status`) VALUES
(1221, 'Maliduwa', 'MH', 21, '81424', 1),
(1222, 'Maramba', 'MH', 21, '81416', 1),
(1223, 'Matara', 'MH', 21, '81000', 1),
(1224, 'Mediripitiya', 'MH', 21, '81524', 1),
(1225, 'Miella', 'MH', 21, '81312', 1),
(1226, 'Pahala Millawa', 'MH', 21, '81472', 1),
(1227, 'Palatuwa', 'MH', 21, '81050', 1),
(1228, 'Paragala', 'MH', 21, '81474', 1),
(1229, 'Parapamulla', 'MH', 21, '81322', 1),
(1230, 'Pasgoda', 'MH', 21, '81615', 1),
(1231, 'Penetiyana', 'MH', 21, '81722', 1),
(1232, 'Pitabeddara', 'MH', 21, '81450', 1),
(1233, 'Pothdeniya', 'MH', 21, '81538', 1),
(1234, 'Puhulwella', 'MH', 21, '81290', 1),
(1235, 'Radawela', 'MH', 21, '81316', 1),
(1236, 'Ransegoda', 'MH', 21, '81064', 1),
(1237, 'Ratmale', 'MH', 21, '81030', 1),
(1238, 'Rotumba', 'MH', 21, '81074', 1),
(1239, 'Siyambalagoda', 'MH', 21, '81462', 1),
(1240, 'Sultanagoda', 'MH', 21, '81051', 1),
(1241, 'Telijjawila', 'MH', 21, '81060', 1),
(1242, 'Thihagoda', 'MH', 21, '81280', 1),
(1243, 'Urubokka', 'MH', 21, '81600', 1),
(1244, 'Urugamuwa', 'MH', 21, '81230', 1),
(1245, 'Urumutta', 'MH', 21, '81414', 1),
(1246, 'Viharahena', 'MH', 21, '81508', 1),
(1247, 'Walakanda', 'MH', 21, '81294', 1),
(1248, 'Walasgala', 'MH', 21, '81220', 1),
(1249, 'Waralla', 'MH', 21, '81479', 1),
(1250, 'Yatiyana', 'MH', 21, '81034', 1),
(1251, 'Ambalantota', 'HB', 22, '82100', 1),
(1252, 'Angunakolapelessa', 'HB', 22, '82220', 1),
(1253, 'Bandagiriya Colony', 'HB', 22, '82005', 1),
(1254, 'Barawakumbuka', 'HB', 22, '82110', 1),
(1255, 'Beliatta', 'HB', 22, '82400', 1),
(1256, 'Beragama', 'HB', 22, '82102', 1),
(1257, 'Beralihela', 'HB', 22, '82618', 1),
(1258, 'Bowalagama', 'HB', 22, '82458', 1),
(1259, 'Bundala', 'HB', 22, '82002', 1),
(1260, 'Ellagala', 'HB', 22, '82619', 1),
(1261, 'Gangulandeniya', 'HB', 22, '82506', 1),
(1262, 'Getamanna', 'HB', 22, '82420', 1),
(1263, 'Goda Koggalla', 'HB', 22, '82401', 1),
(1264, 'GonagamuwaUduwila', 'HB', 22, '82602', 1),
(1265, 'Gonnoruwa', 'HB', 22, '82006', 1),
(1266, 'Hakuruwela', 'HB', 22, '82248', 1),
(1267, 'Hambantota', 'HB', 22, '82000', 1),
(1268, 'Horewelagoda', 'HB', 22, '82456', 1),
(1269, 'Hungama', 'HB', 22, '82120', 1),
(1270, 'Ihala Beligala', 'HB', 22, '82412', 1),
(1271, 'Ittademaliya', 'HB', 22, '82462', 1),
(1272, 'Julampitiya', 'HB', 22, '82252', 1),
(1273, 'Kahandamodara', 'HB', 22, '82126', 1),
(1274, 'Lunama', 'HB', 22, '82108', 1),
(1275, 'Lunugamwehera', 'HB', 22, '82634', 1),
(1276, 'Magama', 'HB', 22, '82608', 1),
(1277, 'Mahagalwewa', 'HB', 22, '82016', 1),
(1278, 'Mamadala', 'HB', 22, '82109', 1),
(1279, 'Medamulana', 'HB', 22, '82254', 1),
(1280, 'Middeniya', 'HB', 22, '82270', 1),
(1281, 'Migahajandur', 'HB', 22, '82014', 1),
(1282, 'Padawkema', 'HB', 22, '82636', 1),
(1283, 'Pahala Andarawewa', 'HB', 22, '82008', 1),
(1284, 'Pallekanda', 'HB', 22, '82454', 1),
(1285, 'Rammalawarapitiya', 'HB', 22, '82554', 1),
(1286, 'Ranakeliya', 'HB', 22, '82612', 1),
(1287, 'Ranmuduwewa', 'HB', 22, '82018', 1),
(1288, 'Ranna', 'HB', 22, '82125', 1),
(1289, 'Ratmalwala', 'HB', 22, '82276', 1),
(1290, 'RU/Ridiyagama', 'HB', 22, '82106', 1),
(1291, 'Sooriyawewa Town', 'HB', 22, '82010', 1),
(1292, 'Tangalla', 'HB', 22, '82200', 1),
(1293, 'Tissamaharama', 'HB', 22, '82600', 1),
(1294, 'Uda Gomadiya', 'HB', 22, '82504', 1),
(1295, 'Udamattala', 'HB', 22, '82638', 1),
(1296, 'Uswewa', 'HB', 22, '82278', 1),
(1297, 'Vitharandeniya', 'HB', 22, '82232', 1),
(1298, 'Walasmulla', 'HB', 22, '82450', 1),
(1299, 'Weeraketiya', 'HB', 22, '82240', 1),
(1300, 'Weerawila', 'HB', 22, '82632', 1),
(1301, 'Weerawila New', 'HB', 22, '82615', 1),
(1302, 'Town', '', 22, '', 1),
(1303, 'Yatigala', 'HB', 22, '82418', 1),
(1304, 'Akkarasiy', 'BD', 23, '90166', 1),
(1305, 'Aluketiyaw', 'BD', 23, '90736', 1),
(1306, 'Aluttaramma', 'BD', 23, '90722', 1),
(1307, 'Ambadandegama', 'BD', 23, '90108', 1),
(1308, 'Ambagahawatta', 'BD', 23, '90326', 1),
(1309, 'Ambagasdowa', 'BD', 23, '90300', 1),
(1310, 'Amunumulla', 'BD', 23, '90204', 1),
(1311, 'Arawa', 'BD', 23, '90017', 1),
(1312, 'Arawakumbura', 'BD', 23, '90532', 1),
(1313, 'Arawatta', 'BD', 23, '90712', 1),
(1314, 'Atakiriya', 'BD', 23, '90542', 1),
(1315, 'Badulla', 'BD', 23, '90000', 1),
(1316, 'Baduluoya', 'BD', 23, '90019', 1),
(1317, 'Ballaketuwa', 'BD', 23, '90092', 1),
(1318, 'Bambarapana', 'BD', 23, '90322', 1),
(1319, 'Bandarawela', 'BD', 23, '90100', 1),
(1320, 'Beramada', 'BD', 23, '90066', 1),
(1321, 'Bibilegama', 'BD', 23, '90502', 1),
(1322, 'Bogahakumbura', 'BD', 23, '90354', 1),
(1323, 'Boragas', 'BD', 23, '90362', 1),
(1324, 'Boralanda', 'BD', 23, '90170', 1),
(1325, 'Bowela', 'BD', 23, '90302', 1),
(1326, 'Dambana', 'BD', 23, '90714', 1),
(1327, 'Demodara', 'BD', 23, '90080', 1),
(1328, 'Diganatenna', 'BD', 23, '90132', 1),
(1329, 'Dikkapitiya', 'BD', 23, '90214', 1),
(1330, 'Dimbulana', 'BD', 23, '90324', 1),
(1331, 'Divulapelessa', 'BD', 23, '90726', 1),
(1332, 'Diyatalawa', 'BD', 23, '90150', 1),
(1333, 'Dulgolla', 'BD', 23, '90104', 1),
(1334, 'Egodawela', 'BD', 23, '90013', 1),
(1335, 'Ella', 'BD', 23, '90090', 1),
(1336, 'Ettampitiya', 'BD', 23, '90140', 1),
(1337, 'Galauda', 'BD', 23, '90065', 1),
(1338, 'Galedanda', 'BD', 23, '90206', 1),
(1339, 'Galporuyaya', 'BD', 23, '90752', 1),
(1340, 'Gamewela', 'BD', 23, '90512', 1),
(1341, 'Gawarawela', 'BD', 23, '90082', 1),
(1342, 'Girandurukotte', 'BD', 23, '90750', 1),
(1343, 'Godunna', 'BD', 23, '90067', 1),
(1344, 'Gurutalawa', 'BD', 23, '90208', 1),
(1345, 'Haldummulla', 'BD', 23, '90180', 1),
(1346, 'Hali Ela', 'BD', 23, '90060', 1),
(1347, 'Hangunnawa', 'BD', 23, '90224', 1),
(1348, 'Haputale', 'BD', 23, '90160', 1),
(1349, 'Hebarawa', 'BD', 23, '90724', 1),
(1350, 'Heeloya', 'BD', 23, '90112', 1),
(1351, 'Helahalpe', 'BD', 23, '90122', 1),
(1352, 'Helapupula', 'BD', 23, '90094', 1),
(1353, 'Hewanakumbura', 'BD', 23, '90358', 1),
(1354, 'Hingurukaduwa', 'BD', 23, '90508', 1),
(1355, 'Hopton', 'BD', 23, '90524', 1),
(1356, 'Idalgashinna', 'BD', 23, '90167', 1),
(1357, 'Jangulla', 'BD', 23, '90063', 1),
(1358, 'Kahataruppa', 'BD', 23, '90052', 1),
(1359, 'Kalubululanda', 'BD', 23, '90352', 1),
(1360, 'Kalugahakandura', 'BD', 23, '90546', 1),
(1361, 'Kalupahana', 'BD', 23, '90186', 1),
(1362, 'Kandaketya', 'BD', 23, '90020', 1),
(1363, 'Kandegedara', 'BD', 23, '90070', 1),
(1364, 'Kandepuhulpola', 'BD', 23, '90356', 1),
(1365, 'Landewela', 'BD', 23, '90068', 1),
(1366, 'Liyangahawela', 'BD', 23, '90106', 1),
(1367, 'Lunugala', 'BD', 23, '90530', 1),
(1368, 'Lunuwatta', 'BD', 23, '90310', 1),
(1369, 'Madulsima', 'BD', 23, '90535', 1),
(1370, 'Madulsima', 'BD', 23, '90535', 1),
(1371, 'Mahiyanganaya', 'BD', 23, '90700', 1),
(1372, 'Makulella', 'BD', 23, '90114', 1),
(1373, 'Malgoda', 'BD', 23, '90754', 1),
(1374, 'Maliyadda', 'BD', 23, '90022', 1),
(1375, 'Mapakadawewa', 'BD', 23, '90730', 1),
(1376, 'Maspanna', 'BD', 23, '90328', 1),
(1377, 'Maussagolla', 'BD', 23, '90582', 1),
(1378, 'Medawela Udukinda', 'BD', 23, '90218', 1),
(1379, 'Medawelagama', 'BD', 23, '90518', 1),
(1380, 'Meegahakiula', 'BD', 23, '90015', 1),
(1381, 'Metigahatenna', 'BD', 23, '90540', 1),
(1382, 'Ohiya', 'BD', 23, '90168', 1),
(1383, 'Pahalarathkinda', 'BD', 23, '90756', 1),
(1384, 'Pallekiruwa', 'BD', 23, '90534', 1),
(1385, 'Passara', 'BD', 23, '90500', 1),
(1386, 'Pathanewatta', 'BD', 23, '90071', 1),
(1387, 'Pattiyagedara', 'BD', 23, '90138', 1),
(1388, 'Pelagahatenna', 'BD', 23, '90522', 1),
(1389, 'Perawella', 'BD', 23, '90222', 1),
(1390, 'Pitamaruwa', 'BD', 23, '90544', 1),
(1391, 'Pitapola', 'BD', 23, '90171', 1),
(1392, 'Puhulpola', 'BD', 23, '90212', 1),
(1393, 'Ratkarawwa', 'BD', 23, '90164', 1),
(1394, 'Ridimaliyadda', 'BD', 23, '90704', 1),
(1395, 'Rilpola', 'BD', 23, '90026', 1),
(1396, 'Silmiyapura', 'BD', 23, '90364', 1),
(1397, 'Sirimalgoda', 'BD', 23, '90044', 1),
(1398, 'Sorabora Colony', 'BD', 23, '90718', 1),
(1399, 'Soragune', 'BD', 23, '90183', 1),
(1400, 'Soranatota', 'BD', 23, '90008', 1),
(1401, 'Spring Valley', 'BD', 23, '90028', 1),
(1402, 'Taldena', 'BD', 23, '90014', 1),
(1403, 'Tennepanguwa', 'BD', 23, '90072', 1),
(1404, 'Timbirigaspitiya', 'BD', 23, '90012', 1),
(1405, 'Uduhawara', 'BD', 23, '90226', 1),
(1406, 'Uraniya', 'BD', 23, '90702', 1),
(1407, 'Uva Deegalla', 'BD', 23, '90062', 1),
(1408, 'Uva Karandagolla', 'BD', 23, '90091', 1),
(1409, 'Uva Mawelagama', 'BD', 23, '90192', 1),
(1410, 'Uva Tenna', 'BD', 23, '90188', 1),
(1411, 'Uva Tissapura', 'BD', 23, '90734', 1),
(1412, 'Uva Uduwara', 'BD', 23, '90061', 1),
(1413, 'Uvaparanagama', 'BD', 23, '90230', 1),
(1414, 'Yalagamuwa', 'BD', 23, '90329', 1),
(1415, 'Yalwela', 'BD', 23, '90706', 1),
(1416, 'Angunakolawewa', 'MJ', 24, '91302', 1),
(1417, 'Ayiwela', 'MJ', 24, '91516', 1),
(1418, 'Badalkumbura', 'MJ', 24, '91070', 1),
(1419, 'Baduluwela', 'MJ', 24, '91058', 1),
(1420, 'Bakinigahawela', 'MJ', 24, '91554', 1),
(1421, 'Balaharuwa', 'MJ', 24, '91295', 1),
(1422, 'Bibile', 'MJ', 24, '91500', 1),
(1423, 'Buddama', 'MJ', 24, '91038', 1),
(1424, 'Buttala', 'MJ', 24, '91100', 1),
(1425, 'Dambagalla', 'MJ', 24, '91050', 1),
(1426, 'Diyakobala', 'MJ', 24, '91514', 1),
(1427, 'Dombagahawela', 'MJ', 24, '91010', 1),
(1428, 'Ekamutugama', 'MJ', 24, '70254', 1),
(1429, 'Ekiriyankumbura', 'MJ', 24, '91502', 1),
(1430, 'Ethimalewewa', 'MJ', 24, '91020', 1),
(1431, 'Ettiliwewa', 'MJ', 24, '91250', 1),
(1432, 'Galabedda', 'MJ', 24, '91008', 1),
(1433, 'Hambegamuwa', 'MJ', 24, '91308', 1),
(1434, 'Hulandawa', 'MJ', 24, '91004', 1),
(1435, 'Inginiyagala', 'MJ', 24, '91040', 1),
(1436, 'Kandaudapanguwa', 'MJ', 24, '91032', 1),
(1437, 'Kandawinna', 'MJ', 24, '91552', 1),
(1438, 'Mahagama Colony', 'MJ', 24, '70256', 1),
(1439, 'Marawa', 'MJ', 24, '91006', 1),
(1440, 'Mariarawa', 'MJ', 24, '91052', 1),
(1441, 'Medagana', 'MJ', 24, '91550', 1),
(1442, 'Obbegoda', 'MJ', 24, '91007', 1),
(1443, 'Okkampitiya', 'MJ', 24, '91060', 1),
(1444, 'Pangura', 'MJ', 24, '91002', 1),
(1445, 'Pitakumbura', 'MJ', 24, '91505', 1),
(1446, 'Randeniya', 'MJ', 24, '91204', 1),
(1447, 'Ruwalwela', 'MJ', 24, '91056', 1),
(1448, 'Sella Kataragama', 'MJ', 24, '91405', 1),
(1449, 'Sewanagala', 'MJ', 24, '70250', 1),
(1450, 'Siyambalagune', 'MJ', 24, '91202', 1),
(1451, 'Siyambalanduwa', 'MJ', 24, '91030', 1),
(1452, 'Suriara', 'MJ', 24, '91306', 1),
(1453, 'Tanamalwila', 'MJ', 24, '91300', 1),
(1454, 'Uva Gangodagama', 'MJ', 24, '91054', 1),
(1455, 'Uva Kudaoya', 'MJ', 24, '91298', 1),
(1456, 'Uva Pelawatta', 'MJ', 24, '91112', 1),
(1457, 'Warunagama', 'MJ', 24, '91198', 1),
(1458, 'Wedikumbura', 'MJ', 24, '91005', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_competitor_parts`
--

CREATE TABLE IF NOT EXISTS `tbl_competitor_parts` (
  `competitor_parts_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_officer_id` int(11) DEFAULT NULL,
  `delar_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `competitor_part_no` varchar(100) DEFAULT NULL,
  `brand` varchar(500) DEFAULT NULL,
  `importer` varchar(500) DEFAULT NULL,
  `selling_price_non_tgp` double DEFAULT NULL,
  `movement_in_dealer` double DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_by_id` int(11) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`competitor_parts_id`),
  KEY `FK_tbl_competitor_parts_1` (`sales_officer_id`),
  KEY `FK_tbl_competitor_parts_2` (`delar_id`),
  KEY `FK_tbl_competitor_parts_3` (`item_id`) USING BTREE,
  KEY `FK_tbl_competitor_parts_114` (`added_by_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_competitor_parts`
--

INSERT INTO `tbl_competitor_parts` (`competitor_parts_id`, `sales_officer_id`, `delar_id`, `item_id`, `competitor_part_no`, `brand`, `importer`, `selling_price_non_tgp`, `movement_in_dealer`, `added_date`, `added_by_id`, `added_time`, `remarks`, `status`) VALUES
(1, 1, 1, 2, 'Z009232333333', 'TVS', 'Douglas & sons', 1250, 25, '2014-01-02', 2, '20:10:02', NULL, 1),
(2, 2, 2, 4, 'PK00123234434', 'Bajaj', 'Indian', 5000, 100, '2014-01-02', 2, '20:10:02', NULL, 1),
(3, 3, 3, 10, 'XN00123233332', 'TOYOTA', 'Mahindra (pvt) ltd', 1450, 50, '2014-01-02', 2, '20:10:02', NULL, 1),
(20, 15, 2, 10, 'XN00123233332', 'TOYOTA', 'Japan', 1450, 50, '2014-01-02', 2, '20:10:02 ', NULL, 1),
(21, 5, 1, 10, 'XN00123233332', 'TOYOTA', 'Japan', 1450, 50, '2014-01-02', 2, '20:10:02', NULL, 1),
(22, 5, 2, 10, 'XN00123233332', 'TOYOTA', 'Japan', 1450, 50, '2014-01-02', 2, '20:10:02', NULL, 1),
(23, 5, 2, 10, 'XN00123233332', 'TOYOTA', 'Japan', 1450, 50, '2014-01-02', 2, '20:10:02', NULL, 1),
(28, 5, 1, 3, '1', '1', '1', 1, 1, '2014:03:10', 1, '17:08:49', NULL, 1),
(29, 5, 1, 5, '1', '1', '1', 1, 1, '2014:03:10', 1, '17:11:01', NULL, 1),
(30, 5, 1, 5, '55', '55', '55', 55, 55, '2014:03:10', 1, '17:11:01', NULL, 1),
(31, 5, 2, 5, '444fffff', 'fffffff', 'fffff', 333, 133, '2014:03:10', 1, '17:12:52', NULL, 1),
(32, 15, 1, 6, '1', 'ss', '1', 1, 1, '2014:03:10', 6, '17:16:57', NULL, 1),
(33, 49, 55, 7, '1000', 'BAJAJ', 'Indian', 1000, 122, '2014:03:11', 1, '05:36:06', NULL, 1),
(34, 42, 30, 4, '1111', '111', '111', 111, 111, '2014:03:18', 1, '12:59:05', 'ssss', 1),
(35, 42, 30, 3, '111', '222', '333', 22, 22, '2014:03:18', 1, '12:59:05', 'ssss', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counter`
--

CREATE TABLE IF NOT EXISTS `tbl_counter` (
  `counter_id` int(11) NOT NULL AUTO_INCREMENT,
  `counter_name` varchar(500) NOT NULL,
  `counter_code` varchar(45) DEFAULT NULL,
  `counter_account_no` varchar(45) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `identifier` varchar(10) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`counter_id`),
  KEY `fk_area_id_counter_idx` (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_counter`
--

INSERT INTO `tbl_counter` (`counter_id`, `counter_name`, `counter_code`, `counter_account_no`, `area_id`, `identifier`, `added_date`, `added_time`, `status`) VALUES
(1, 'BALAGOLLA', '-', '-', 2, 'A', '2014-03-17', '17:00:00', 1),
(2, 'KANDY', '-', '-', 2, 'C', '2014-03-17', '17:00:00', 1),
(3, 'MATARA', '-', '-', 3, 'A', '2014-03-17', '17:00:00', 1),
(4, 'AMBALANGODA', '-', '-', 3, 'C', '2014-03-17', '17:00:00', 1),
(5, 'COLOMBO', '-', '-', 4, 'A', '2014-03-17', '17:00:00', 1),
(6, 'SIYAMBALAPE', '-', '-', 4, 'C', '2014-03-17', '17:00:00', 1),
(7, 'YAKKALA', '-', '-', 4, 'E', '2014-03-17', '17:00:00', 1),
(8, 'KURUWITA', '-', '-', 5, 'A', '2014-03-17', '17:00:00', 1),
(9, 'KURUNEGALA', '-', '-', 6, 'A', '2014-03-17', '17:00:00', 1),
(10, 'PUTTALAM', '-', '-', 6, 'C', '2014-03-17', '17:00:00', 1),
(11, 'JAFFNA', '-', '-', 7, 'A', '2014-03-17', '17:00:00', 1),
(12, 'VAVUNIYA', '-', '-', 7, 'C', '2014-03-17', '17:00:00', 1),
(13, 'ANURADHAPURA', '-', '-', 8, 'A', '2014-03-17', '17:00:00', 1),
(14, 'TRINCOMALEE', '-', '-', 9, 'A', '2014-03-17', '17:00:00', 1),
(15, 'WELIWERIYA', '-', '-', 1, 'L', '2014-03-17', '17:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_credit_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_credit_payment` (
  `credit_payment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `credit_payment` varchar(45) NOT NULL DEFAULT '',
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  `deliver_order_id` int(11) NOT NULL,
  `added_date` date NOT NULL DEFAULT '0000-00-00',
  `added_time` time NOT NULL DEFAULT '00:00:00',
  `status` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`credit_payment_id`),
  KEY `purchase_order_id` (`deliver_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_credit_payment`
--

INSERT INTO `tbl_credit_payment` (`credit_payment_id`, `credit_payment`, `due_date`, `deliver_order_id`, `added_date`, `added_time`, `status`) VALUES
(1, '430', '2014-03-06', 1, '2014-02-04', '18:02:58', 0),
(2, '0', '2014-03-06', 1, '2014-02-04', '18:03:27', 0),
(3, '-321.5', '2014-03-12', 1, '2014-02-10', '09:42:36', 0),
(4, '-321.5', '2014-03-13', 1, '2014-02-11', '05:13:56', 0),
(5, '-24731', '2014-03-28', 1, '2014-02-26', '12:54:45', 0),
(6, '723.5', '2014-04-09', 15, '2014-03-10', '06:49:56', 1),
(7, '-165.5', '2014-04-09', 1, '2014-03-10', '06:51:55', 1),
(8, '409', '2014-04-10', 3, '2014-03-11', '05:40:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(1000) NOT NULL,
  `cust_account_no` varchar(45) NOT NULL,
  `sales_officer_id` int(11) NOT NULL,
  `customer_code` varchar(45) DEFAULT NULL,
  `cust_contact_no` varchar(45) DEFAULT NULL,
  `cust_address` varchar(1000) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `sales_officer_id_idx` (`sales_officer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `cust_account_no`, `sales_officer_id`, `customer_code`, `cust_contact_no`, `cust_address`, `added_date`, `added_time`, `status`) VALUES
(1, 'Iresha Sellehandie', 'C00231', 1, NULL, '2323434', 'Galle', '2014:01:21', '17:17:00', 1),
(3, 'test', '13133', 2, NULL, '07665655', 'kokok', '2014:01:22', '05:09:24', 1),
(4, 'Iresha Sellehandie', 'C00232', 2, NULL, '07665655', 'hihijijijj', '2014:01:22', '08:24:11', 1),
(5, 'Iresha Sellehandie', 'C00232', 2, NULL, '07665655', 'efwefewfwf', '2014:01:22', '09:52:42', 1),
(6, 'ss', 'ss', 4, NULL, 'ss', 'sss', '2014:01:30', '19:59:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealer`
--

CREATE TABLE IF NOT EXISTS `tbl_dealer` (
  `delar_id` int(11) NOT NULL AUTO_INCREMENT,
  `delar_account_no` varchar(45) DEFAULT NULL,
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `sales_officer_id` int(11) NOT NULL DEFAULT '0',
  `delar_name` varchar(45) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `delar_address` varchar(45) DEFAULT NULL,
  `delar_shop_name` varchar(45) DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `date_account_open` varchar(45) DEFAULT NULL,
  `delar_code` varchar(45) CHARACTER SET big5 DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`delar_id`),
  KEY `b_id` (`branch_id`),
  KEY `s_o_id` (`sales_officer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=510 ;

--
-- Dumping data for table `tbl_dealer`
--

INSERT INTO `tbl_dealer` (`delar_id`, `delar_account_no`, `branch_id`, `sales_officer_id`, `delar_name`, `district_id`, `city_id`, `delar_address`, `delar_shop_name`, `discount_percentage`, `date_account_open`, `delar_code`, `status`) VALUES
(1, '711I0001', 2, 7, 'Indra Motor Spares (Pvt) Ltd', 1, 1, 'No : 43, D S Senanayake St,', 'Indra Motor Spares (Pvt) Ltd', 0, ' 05.04.2011 ', '-', 1),
(2, '711S0001', 2, 7, 'Samaru Motor Enterprises', 1, 1, 'No : 09, HEMAPALA MUNUDASA MAWATHA,', 'Samaru Motor Enterprises', 0, ' 06.04.2011 ', '-', 1),
(3, '711N0003', 2, 7, 'New Union Motors', 1, 1, 'No : 26, KING STREET', 'New Union Motors', 0, ' 05.04.2011 ', '-', 1),
(4, '711F0001', 2, 7, 'Fiat Mama Motors', 1, 1, 'No : 93D, Nuwara-Eliya Rd,\nMahara,', 'Fiat Mama Motors', 0, ' 05.04.2011 ', '-', 1),
(5, '711N0001', 2, 7, 'Neel Auto Spares', 1, 1, 'No : 170, COLOMBO RD', 'Neel Auto Spares', 0, ' 05.04.2011 ', '-', 1),
(6, '711W0002', 2, 7, 'Wellawatte Service Station', 1, 1, 'No : 81, Hemapala Munidasa Mw,', 'Wellawatte Service Station', 0, ' 06.04.2011 ', '-', 1),
(7, '711A0002', 2, 7, 'Auto Speed Center - Mr R Palpola', 1, 1, 'No : 200, Anis And Company Ltd, Mahara,', 'Auto Speed Center - Mr R Palpola', 0, ' 05.04.2011 ', '-', 1),
(8, '711N0007', 2, 7, 'Naushard Motors', 1, 1, 'No : 56, MAIN STREET', 'Naushard Motors', 0, ' 05.04.2011 ', '-', 1),
(9, '711A0010', 2, 7, 'Akeesha Enterprises ( Private ) Ltd', 1, 1, 'No. 40, Gannoruwa Road', 'Akeesha Enterprises ( Private ) Ltd', 0, ' 17.05.2013 ', '-', 1),
(10, '711T0006', 2, 7, 'Thilanka Motors', 1, 1, 'No : 51, Station Road', 'Thilanka Motors', 0, ' 09.04.2012 ', '-', 1),
(11, ' 711S0020 ', 2, 7, 'Srinath Motors', 1, 1, ' No : 92/A, Kandy Rd ', 'Srinath Motors', 0, ' 26.07.2012 ', '-', 1),
(12, '711N0002', 2, 7, 'Nugathalawa Service Station', 1, 1, 'Jayasuriya Mawatha, \nNugathalawa,', 'Nugathalawa Service Station', 0, ' 05.04.2011 ', '-', 1),
(13, '711Z0001', 2, 7, 'Zeene Motor House', 1, 1, 'No : 122, D S Senanayake Veediya,', 'Zeene Motor House', 0, ' 26.09.2011 ', '-', 1),
(14, '711M0005', 2, 7, 'Macaw Service Station', 1, 1, 'No : 01, Kahawatta Road,', 'Macaw Service Station', 0, ' 13.05.2011 ', '-', 1),
(15, '711S0014', 2, 7, 'Sumedha Tyre Centre', 1, 1, 'No : 305, Gampola Road,', 'Sumedha Tyre Centre', 0, ' 14.02.2012 ', '-', 1),
(16, '711G0001', 2, 7, 'Gunadasa Auto Traders', 1, 1, 'No : 136, Ambewela Road, \nRuwaneliya,', 'Gunadasa Auto Traders', 0, ' 05.04.2011 ', '-', 1),
(17, '711M0003', 2, 7, 'Matale Auto House', 1, 1, 'No : 88, MAIN STREET', 'Matale Auto House', 0, ' 05.04.2011 ', '-', 1),
(18, '711N0004', 2, 7, 'New Lanka Motors', 1, 1, 'Hadeniya,', 'New Lanka Motors', 0, ' 05.04.2011 ', '-', 1),
(19, '711U0001', 2, 7, 'Unicorn Service Station', 1, 1, 'No : 110, KANDY RD', 'Unicorn Service Station', 0, ' 06.04.2011 ', '-', 1),
(20, '711K0004', 2, 7, 'Kandy Motors', 1, 1, 'No : 56, 58, Dick Oya Road,', 'Kandy Motors', 0, ' 17.01.2012 ', '-', 1),
(21, '711C0004', 2, 7, 'Up - Country Motors', 1, 1, 'No : 52, Kotmale Road,', 'Up - Country Motors', 0, ' 17.01.2012 ', '-', 1),
(22, '711U0003', 2, 7, 'Upali Motors', 1, 1, 'No : 398, \nAladeniya', 'Upali Motors', 0, ' 05.10.2011 ', '-', 1),
(23, '711R0006', 2, 7, 'Ranjan Auto Care', 1, 1, 'No : 355/A, Kurunegala Road, ', 'Ranjan Auto Care', 0, ' 04.05.2012 ', '-', 1),
(24, '711K0001', 2, 7, 'Kurunegala Motors', 1, 1, 'No : 39/3, Gannoruwa Road,', 'Kurunegala Motors', 0, ' 05.04.2011 ', '-', 1),
(25, '711D0002', 2, 7, 'Diamond Service Station (Pvt ) Ltd', 1, 1, 'No : 22, Colombo Rd,\nEmbilmeegama,', 'Diamond Service Station (Pvt ) Ltd', 0, ' 05.04.2011 ', '-', 1),
(26, '711S0012', 2, 7, 'Shamal Motors', 1, 1, 'No : 85/A, Matale Road,', 'Shamal Motors', 0, ' 19.07.2011 ', '-', 1),
(27, '711A0001', 2, 7, 'Auto Mart Service Station & Caean Park', 1, 1, 'No : 270, Kandy Road, \nGodapola,', 'Auto Mart Service Station & Caean Park', 0, ' 05.04.2011 ', '-', 1),
(28, '711E0003', 2, 7, 'Eden Service Station', 1, 1, 'No : 12, Hapugaspitiya Rd,\nKeerapane,', 'Eden Service Station', 0, ' 24.06.2011 ', '-', 1),
(29, '711U0004', 2, 7, 'Uva Auto Park', 1, 1, 'Uda Pussellawa Road, Lunuwaththa', 'Uva Auto Park', 0, ' 17.05.2013 ', '-', 1),
(30, '711S0017', 2, 7, 'S. K. Motors', 1, 1, 'No : 733 A', 'S. K. Motors', 0, ' 04.05.2012 ', '-', 1),
(31, '711C0003', 2, 7, 'Caffoor & Sons', 1, 1, 'No : 59, Trincomalee Street,', 'Caffoor & Sons', 0, ' 19.07.2011 ', '-', 1),
(32, '711S0009', 2, 7, 'Sidique Enterprise', 1, 1, 'No : 18, MEEZAN TERRACE', 'Sidique Enterprise', 0, ' 07.04.2011 ', '-', 1),
(33, '711T0005', 2, 7, 'The National Tyre Traders', 1, 1, 'No : 335, Nuwara Eliya Road', 'The National Tyre Traders', 0, ' 09.12.2011 ', '-', 1),
(34, '711Q0001', 2, 7, 'Geethmal Motors', 1, 1, 'No : 49, Main Street,', 'Geethmal Motors', 0, ' 09.12.2011 ', '-', 1),
(35, '711I0003', 2, 7, 'Imalsha Motor Traders', 1, 1, 'Co-Operative Building, \nColombo Road,', 'Imalsha Motor Traders', 0, ' 15.12.2011 ', '-', 1),
(36, '711M0001', 2, 6, 'Manchanayake Filling Station - Mr M A S Manch', 1, 1, ' \nAnuradhapura Road,', 'Manchanayake Filling Station - Mr M A S Manch', 0, ' 05.04.2011 ', '-', 1),
(37, '711E0001', 2, 6, 'T R Engineering Co Ltd', 1, 1, 'Badulla Road,', 'T R Engineering Co Ltd', 0, ' 05.01.2011 ', '-', 1),
(38, '711V0001', 2, 6, 'Victory Motor Service', 1, 1, 'Padiyatalawa Road, \nNew Town,', 'Victory Motor Service', 0, ' 06.04.2011 ', '-', 1),
(39, '711M0002', 2, 6, 'Sithmina Motors', 1, 1, 'Palam Handiya,', 'Sithmina Motors', 0, ' 05.04.2011 ', '-', 1),
(40, '711A0003', 2, 6, 'A M S Motors', 1, 1, 'No : 02, New Town, \nKandy Road,', 'A M S Motors', 0, ' 05.04.2011 ', '-', 1),
(41, '711S0019', 2, 6, 'Sisira Leaf Springs (pvt) Ltd', 1, 1, 'No : 129 F, New Digana Road, Naththaranpotha', 'Sisira Leaf Springs (pvt) Ltd', 0, ' 25.05.2012 ', '-', 1),
(42, '711O0001', 2, 6, 'Ocean Motors', 1, 1, 'Mahiyangana Road, \nOruthota,', 'Ocean Motors', 0, ' 07.04.2011 ', '-', 1),
(43, '711S0002', 2, 6, 'W D R Samarakoon Logistics (Pvt) Ltd', 1, 1, 'No : 233, Colombo Street', 'W D R Samarakoon Logistics (Pvt) Ltd', 0, ' 07.04.2011 ', '-', 1),
(44, '711H0001', 2, 6, 'Harshani Motors', 1, 1, 'No : 59, Clinic Road,', 'Harshani Motors', 0, ' 05.04.2011 ', '-', 1),
(45, '711H0002', 2, 6, 'Hero Motors', 1, 1, 'No : 52, Main Street,', 'Hero Motors', 0, ' 03.11.2011 ', '-', 1),
(46, '711T0002', 2, 6, 'S M K Trading Co Ltd', 1, 1, 'Karaliyadda Road\nDigana', 'S M K Trading Co Ltd', 0, ' 06.04.2011 ', '-', 1),
(47, '711R0003', 2, 6, 'Ramitha Motors', 1, 1, 'No : 14 A, Kandy Rd,', 'Ramitha Motors', 0, ' 07.04.2011 ', '-', 1),
(48, '711A0006', 2, 6, 'Auto Services Dambulla (Pvt) Ltd', 1, 1, 'Mirisgoniyawa Junction,', 'Auto Services Dambulla (Pvt) Ltd', 0, ' 13.05.2011 ', '-', 1),
(49, '711U0002', 2, 6, 'Uva Motors', 1, 1, 'No : 41, COCOWATTE,', 'Uva Motors', 0, ' 06.04.2011 ', '-', 1),
(50, '711R0007', 2, 6, 'Rajapakse Travels ( Pvt ) Ltd', 1, 1, 'Green Terrece, Gurudeniya Road,', 'Rajapakse Travels ( Pvt ) Ltd', 0, ' 25.05.2012 ', '-', 1),
(51, '711S0018', 2, 6, 'Sri Land Auto House', 1, 1, 'No : 12, Main Street,', 'Sri Land Auto House', 0, ' 10.05.2012 ', '-', 1),
(52, '711G0002', 2, 6, 'G T S Holding (Pvt) Ltd', 1, 1, 'No : 234, Badulla Rd,', 'G T S Holding (Pvt) Ltd', 0, ' 26.09.2011 ', '-', 1),
(53, '711L0001', 2, 6, 'Lakmina Auto Service - Mr W G N Kumara', 1, 1, '\nIndustrial Area,', 'Lakmina Auto Service - Mr W G N Kumara', 0, ' 05.04.2011 ', '-', 1),
(54, '711A0004', 2, 6, 'Aur Engineers & Services - Mr A U Kumara', 1, 1, ' \nDambulu Road,', 'Aur Engineers & Services - Mr A U Kumara', 0, ' 29.04.2011 ', '-', 1),
(55, ' 711S0021 ', 2, 6, 'S M R Motors', 1, 1, 'Mahiyangana Road, Wilamuna', 'S M R Motors', 0, ' 17.05.2013 ', '-', 1),
(56, '711S0007', 2, 6, 'Samithi Motors', 1, 1, 'No : 22, London Road,', 'Samithi Motors', 0, ' 07.04.2011 ', '-', 1),
(57, '711O0002', 2, 6, 'Orit Clean Park', 1, 1, 'No : 05, 10Th Mile Post,', 'Orit Clean Park', 0, ' 07.04.2011 ', '-', 1),
(58, '711S0004', 2, 6, 'Sumathi Trading Co.', 1, 1, 'No : 62, Main Street,', 'Sumathi Trading Co.', 0, ' 07.04.2011 ', '-', 1),
(59, ' 711M0007 ', 2, 6, 'M K A Ahamed Mohideen (pvt) Ltd', 1, 1, ' No : 59/1 J L , Kurunagala Road ', 'M K A Ahamed Mohideen (pvt) Ltd', 0, ' 19.07.2011 ', '-', 1),
(60, '711T0001', 2, 6, 'Tyre Retraders', 1, 1, 'No : 51, BAZZAR STREET,', 'Tyre Retraders', 0, ' 05.04.2011 ', '-', 1),
(61, '711S0016', 2, 6, 'Sky Line International (pvt) Ltd', 1, 1, 'No : 03, Kandy Road', 'Sky Line International (pvt) Ltd', 0, ' 09.04.2012 ', '-', 1),
(62, '711K0005', 2, 6, 'Kundasale Auto Service (pvt) Ltd', 1, 1, 'Digana Road, Polwatte, ', 'Kundasale Auto Service (pvt) Ltd', 0, ' 10.05.2012 ', '-', 1),
(63, '711A0009', 2, 6, 'Auto Lanka', 1, 1, 'Badulla Road', 'Auto Lanka', 0, ' 13.03.2012 ', '-', 1),
(64, '721P0002', 3, 11, 'Perera Motors', 1, 1, 'No : 140, Main Street,\nKaluthra South', 'Perera Motors', 0, ' 27.06.2011 ', '-', 1),
(65, '721S0003', 3, 11, 'Siriwardena Motor Stores (Pvt) Ltd', 1, 1, 'No : 1/243, MAIN STREET', 'Siriwardena Motor Stores (Pvt) Ltd', 0, ' 07.04.2011 ', '-', 1),
(66, '721B0001', 3, 11, 'Bashi Lanka Motors', 1, 1, 'No : 6A, Ambalangoda Road,', 'Bashi Lanka Motors', 0, ' 05.04.2011 ', '-', 1),
(67, '721S0005', 3, 11, 'Sampath Motors', 1, 1, 'No : 68, Station Road,', 'Sampath Motors', 0, ' 13.05.2011 ', '-', 1),
(68, '721S0001', 3, 11, 'Sumanadasa Service Centre', 1, 1, 'No : 83/01, \nMaha Ambalangoda,', 'Sumanadasa Service Centre', 0, ' 07.04.2011 ', '-', 1),
(69, '721L0001', 3, 11, 'Lalith Auto Service Center', 1, 1, 'No : 335, Wakwela Road,', 'Lalith Auto Service Center', 0, ' 05.04.2011 ', '-', 1),
(70, '721S0012', 3, 11, 'S. M. Motors', 1, 1, 'No 90, Aluthgama Road', 'S. M. Motors', 0, ' 17.05.2013 ', '-', 1),
(71, '721A0002', 3, 11, 'W S Amanda Motors & Fishing Tackle', 1, 1, 'No : 175, Main Street,', 'W S Amanda Motors & Fishing Tackle', 0, ' 05.04.2011 ', '-', 1),
(72, '721S0010', 3, 11, 'Sanjeewa Motors', 1, 1, 'Horawala, Badugama', 'Sanjeewa Motors', 0, ' 09.04.2012 ', '-', 1),
(73, '721U0001', 3, 11, 'Udara Auto Service', 1, 1, 'Akuressa Road, Whala Kananke', 'Udara Auto Service', 0, ' 29.01.2013 ', '-', 1),
(74, '721S0014', 3, 11, 'New Samarasinghe Tyre Service', 1, 1, 'Akuressa Road', 'New Samarasinghe Tyre Service', 0, ' 17.05.2013 ', '-', 1),
(75, '721J0001', 3, 11, 'Jagath Service Station', 1, 1, 'No : 34, Galle Road, Mahawaskaduwa', 'Jagath Service Station', 0, ' 13.03.2012 ', '-', 1),
(76, '721R0003', 3, 11, 'Ruhunu Group (pvt) Ltd', 1, 1, 'Buddagama Road ', 'Ruhunu Group (pvt) Ltd', 0, ' 09.04.2012 ', '-', 1),
(77, '721A0005', 3, 11, 'Asiri Tyre Traders & Auto Service', 1, 1, 'Ethumale', 'Asiri Tyre Traders & Auto Service', 0, ' 09.04.2012 ', '-', 1),
(78, '721R0005', 3, 11, 'Ranik Motor Spares', 1, 1, 'No : 170/A, Kaluthara Road', 'Ranik Motor Spares', 0, ' 17.05.2013 ', '-', 1),
(79, '721M0005', 3, 11, 'Minari Auto Service Center', 1, 1, 'Pitigala Road', 'Minari Auto Service Center', 0, ' 19.06.2013 ', '-', 1),
(80, '721S0013', 3, 11, 'Sithu Motors', 1, 1, 'Gothatuwa Juntion, Galle Road', 'Sithu Motors', 0, ' 17.05.2013 ', '-', 1),
(81, '721A0007', 3, 11, 'A. P. Motors', 1, 1, 'Midannagoda, Makubura', 'A. P. Motors', 0, ' 17.05.2013 ', '-', 1),
(82, '721K0003', 3, 11, 'Kumara Motor Stores', 1, 1, 'No 101, Main Street', 'Kumara Motor Stores', 0, ' 17.05.2013 ', '-', 1),
(83, '721S0015', 3, 11, 'Safe Reboring', 1, 1, 'No : 20, Pelawatta Road', 'Safe Reboring', 0, ' 19.06.2013 ', '-', 1),
(84, '721M0001', 3, 11, 'Madara Auto Service Center', 1, 1, 'GODAKANDA ROAD, KARAPITIYA', 'Madara Auto Service Center', 0, ' 05.04.2011 ', '-', 1),
(85, '721S0006', 3, 11, 'Sun Lanka Auto Service Center', 1, 1, 'Manawilawatta, Manawila', 'Sun Lanka Auto Service Center', 0, ' 09.04.2012 ', '-', 1),
(86, '721L0005', 3, 11, 'Leyland Motors', 1, 1, 'No : 05, Beligaha Junction', 'Leyland Motors', 0, ' 05.12.2013 ', '-', 1),
(87, '721K0002', 3, 11, 'Kodagoda Motors', 1, 1, 'Ahangama Road, Kodagoda', 'Kodagoda Motors', 0, ' 13.03.2012 ', '-', 1),
(88, '721D0005', 3, 11, 'Dhammika Motors', 1, 1, 'New Shopping Complex, Thalgaswala', 'Dhammika Motors', 0, ' 27.01.2014 ', '-', 1),
(89, '721Z0001', 3, 11, 'Zodiac Auto Service Center', 1, 1, 'No 123, "azeez Manzil", Dharga Town', 'Zodiac Auto Service Center', 0, ' 17.05.2013 ', '-', 1),
(90, '721R0002', 3, 11, 'Richard Auto Works', 1, 1, 'No : 16, Galle Road,Angagoda', 'Richard Auto Works', 0, ' 13.03.2012 ', '-', 1),
(91, '721M0006', 3, 11, 'Mahanama Motors', 1, 1, 'Ganegoda', 'Mahanama Motors', 0, ' 19.06.2013 ', '-', 1),
(92, '721D0004', 3, 11, 'Dhanushka Enterprices', 1, 1, 'Rathnapura Road, Kalugala Junction', 'Dhanushka Enterprices', 0, ' 22.05.2013 ', '-', 1),
(93, '721A0008', 3, 11, 'Ahangama Auto Service Pvt.Ltd.', 1, 1, 'Imaduwa Road', 'Ahangama Auto Service Pvt.Ltd.', 0, ' 19.06.2013 ', '-', 1),
(94, '721W0002', 3, 11, 'Wijendra Motors', 1, 1, 'No : 43, Ambagaha Junction, Dharga Town', 'Wijendra Motors', 0, ' 19.06.2013 ', '-', 1),
(95, '721K0004', 3, 11, 'K.T.P Transport & Construction', 1, 1, 'No : 27, Maha Ambalangoda Road', 'K.T.P Transport & Construction', 0, ' 06.02..2014 ', '-', 1),
(96, '721S0002', 3, 12, 'Saman Service Centre', 1, 1, 'Debarawewa,', 'Saman Service Centre', 0, ' 07.04.2011 ', '-', 1),
(97, '721A0006', 3, 12, 'Anura Motors', 1, 1, 'No : 35, Main Street, ', 'Anura Motors', 0, ' 10.05.2012 ', '-', 1),
(98, '721D0001', 3, 12, 'Demo Auto Service', 1, 1, 'No : 177, Tangalle Road, \n\nTawaluwila,', 'Demo Auto Service', 0, ' 05.04.2011 ', '-', 1),
(99, '721M0002', 3, 12, 'F D Motors (Pvt) Ltd', 1, 1, 'No : 29, Tissa Road,', 'F D Motors (Pvt) Ltd', 0, ' 05.04.2011 ', '-', 1),
(100, '721P0003', 3, 12, 'Pathinayake Motors', 1, 1, 'No : 308, New Tangalle Road,', 'Pathinayake Motors', 0, ' 28.12.2011 ', '-', 1),
(101, '721D0002', 3, 12, 'Dulip Motors', 1, 1, 'No : 05, New Shopping Complex, \nMatara Road,', 'Dulip Motors', 0, ' 13.05.2011 ', '-', 1),
(102, '721I0001', 3, 12, 'Isuru Motors', 1, 1, 'No : 74, Matara Road,', 'Isuru Motors', 0, ' 14.09.2011 ', '-', 1),
(103, '721K0001', 3, 12, 'Kamburupitiya Auto Service (Pvt) Lltd', 1, 1, 'Mulatiyana Road,', 'Kamburupitiya Auto Service (Pvt) Lltd', 0, ' 05.04.2011 ', '-', 1),
(104, '721S0009', 3, 12, 'Shan Motors', 1, 1, 'Galpottahenawatta, Weliamuna', 'Shan Motors', 0, ' 13.03.2012 ', '-', 1),
(105, '721G0001', 3, 12, 'Gamage Tyre Works And Motor Stores', 1, 1, 'No : 109, Deniyaya Road,', 'Gamage Tyre Works And Motor Stores', 0, ' 05.04.2011 ', '-', 1),
(106, '721W0001', 3, 12, 'Walgama Tyre House', 1, 1, '57 Galle Road', 'Walgama Tyre House', 0, ' 13.03.2012 ', '-', 1),
(107, '721G0002', 3, 12, 'Gold Auto Service', 1, 1, 'Thisa Road,', 'Gold Auto Service', 0, ' 12.07.2011 ', '-', 1),
(108, '721P0004', 3, 12, 'Pathirana Motors', 1, 1, 'No : 185, Katuwana Road', 'Pathirana Motors', 0, ' 26.06.2013 ', '-', 1),
(109, '721A0003', 3, 12, 'D M H Auto Vision', 1, 1, 'No : 29, Gunawardena Mw, \nKotuwegoda,', 'D M H Auto Vision', 0, ' 05.04.2011 ', '-', 1),
(110, '721N0006', 3, 12, 'Nandana Stores', 1, 1, 'Deniyaya Road', 'Nandana Stores', 0, ' 28.10.2013 ', '-', 1),
(111, '721D0003', 3, 12, 'Dilshara Motors', 1, 1, 'No : 92, Tangalla Road', 'Dilshara Motors', 0, ' 29.01.2013 ', '-', 1),
(112, '721S0016', 3, 12, 'Sagara Motors', 1, 1, 'Kalugalawatta, Main Street', 'Sagara Motors', 0, ' 19.06.2013 ', '-', 1),
(113, '721O0017', 3, 12, 'S. E. Auto Parts', 1, 1, 'No : 394, Tangalle Road', 'S. E. Auto Parts', 0, ' 19.06.2013 ', '-', 1),
(114, '721G0003', 3, 12, 'Gamage Motors', 1, 1, 'Hakmana Road, Kirinda', 'Gamage Motors', 0, ' 19.06.2013 ', '-', 1),
(115, '721Q0001', 3, 12, 'Quickson Motors', 1, 1, 'No : 246, Old Thangalle Road', 'Quickson Motors', 0, ' 19.06.2013 ', '-', 1),
(116, '721C0001', 3, 12, 'C. K.  Motors', 1, 1, 'No : 91, Deniyaya Road', 'C. K.  Motors', 0, ' 19.06.2013 ', '-', 1),
(117, '721B0004', 3, 12, 'Buddhi Auto Traders Pvt Ltd', 1, 1, 'No : 179/1/A, Mahawela Road', 'Buddhi Auto Traders Pvt Ltd', 0, ' 28.01.2014 ', '-', 1),
(118, '721O0018', 3, 12, 'Siyalika Service Center', 1, 1, 'No : 232, Mahawela Road, Dodampahala', 'Siyalika Service Center', 0, ' 19.06.2013 ', '-', 1),
(119, '721B0002', 3, 12, 'Bajaj House', 1, 1, 'No : 269, New Street', 'Bajaj House', 0, ' 19.06.2013 ', '-', 1),
(120, '721S0008', 3, 12, 'Sameera Service Center', 1, 1, 'Peris Waththa, Akuressa Road', 'Sameera Service Center', 0, ' 13.03.2012 ', '-', 1),
(121, '721L0004', 3, 12, 'Luckmo Service Station', 1, 1, 'Deniyaya Rd,', 'Luckmo Service Station', 0, ' 05.04.2011 ', '-', 1),
(122, '721A0004', 3, 12, 'Auto Care Service Centre', 1, 1, 'No : 146, Deniyaya Road,', 'Auto Care Service Centre', 0, ' 17.01.2012 ', '-', 1),
(123, '721N0002', 3, 12, 'Neptune Super Service', 1, 1, 'Kuda Heella Road, ', 'Neptune Super Service', 0, ' 13.03.2012 ', '-', 1),
(124, '721L0002', 3, 12, 'Load Star (Pvt) Ltd', 1, 1, 'Midigama Factory, \nPathegama,', 'Load Star (Pvt) Ltd', 0, ' 05.04.2011 ', '-', 1),
(125, '721R0004', 3, 12, 'Richcomes Service Centre', 1, 1, '581 Anagarika Dharmapala Mw', 'Richcomes Service Centre', 0, ' 09.04.2012 ', '-', 1),
(126, '721U0002', 3, 12, 'United Auto Service', 1, 1, 'Gatamanawa Road, Weerathungage Watta, Kirinda', 'United Auto Service', 0, ' 18.03.2013 ', '-', 1),
(127, '721L0003', 3, 12, 'Lucky Lanka Milk Processing Co Ltd', 1, 1, 'Bibulewela, \nKaragoda, \nUyangoda,', 'Lucky Lanka Milk Processing Co Ltd', 0, ' 05.04.2011 ', '-', 1),
(128, '721H0001', 3, 12, 'Harischandra Mills Plc', 1, 1, 'No : 11, Delkada Road,', 'Harischandra Mills Plc', 0, ' 23.09.2011 ', '-', 1),
(129, '721A0001', 3, 12, 'Auto Care Centre', 1, 1, 'No : 11, Hiththotiya Road,', 'Auto Care Centre', 0, ' 05.04.2011 ', '-', 1),
(130, '721B0003', 3, 12, 'BHL Holdings Weligama Auto Care', 1, 1, 'No : 138/18, Old Galle', 'BHL Holdings Weligama Auto Care', 0, ' 11.12.2013 ', '-', 1),
(131, '721N0004', 3, 12, 'A. B. Nandias Silva And Sons', 1, 1, 'No : 161, Galle Road', 'A. B. Nandias Silva And Sons', 0, ' 10.05.2012 ', '-', 1),
(132, '721S0004', 3, 12, 'Nippon Paint Lanka (Pvt) Ltd. - (Silicone Coa', 1, 1, 'No : 67, Kumaradasa Road, \nHittatiga,', 'Nippon Paint Lanka (Pvt) Ltd. - (Silicone Coa', 0, ' 07.04.2011 ', '-', 1),
(133, '721S0017', 3, 12, 'Shell View Motors & Service Center', 1, 1, 'No : 517, Hambantota Road', 'Shell View Motors & Service Center', 0, ' 16.01.2014 ', '-', 1),
(134, '721N0003', 3, 12, 'Nihal Super Service', 1, 1, 'Koongahanena, Tangalle Road, ', 'Nihal Super Service', 0, ' 04.05.2012 ', '-', 1),
(135, '731P0004', 4, 53, 'Pathma Motor Stores', 1, 1, 'No : 175, 219, \nRagama Road, ', 'Pathma Motor Stores', 0, ' 05.04.2011 ', '-', 1),
(136, '731H0003', 4, 53, 'Hasitha Motors Pvt Ltd', 1, 1, 'No : 438/2B, Deshasewa Mawatha,', 'Hasitha Motors Pvt Ltd', 0, ' 05.04.2011 ', '-', 1),
(137, '731S0001', 4, 53, 'Susith Motors', 1, 1, 'No : 102, Chilaw Road,', 'Susith Motors', 0, ' 05.04.2011 ', '-', 1),
(138, '731S0069', 4, 53, 'Samanthi Motor Stores', 1, 1, 'No : 104, Main Street,', 'Samanthi Motor Stores', 0, ' 14.10.2011 ', '-', 1),
(139, '731A0012', 4, 53, 'Anrita Motors', 1, 1, 'No : 79, Chilaw Road,', 'Anrita Motors', 0, ' 17.08.2011 ', '-', 1),
(140, '731K0003', 4, 53, 'Kandana Automobile', 1, 1, 'No : 135C, \nNegombo Road, \nRilaulla', 'Kandana Automobile', 0, ' 05.04.2011 ', '-', 1),
(141, '731L0006', 4, 53, 'S G Lanka Enterprises', 1, 1, 'No : 153/8A, Kandy Road,', 'S G Lanka Enterprises', 0, ' 05.04.2011 ', '-', 1),
(142, '731U0001', 4, 53, 'Udara Leyland Motors', 1, 1, 'No : 07, New Market, \nMain Street,', 'Udara Leyland Motors', 0, ' 05.04.2011 ', '-', 1),
(143, '731I0006', 4, 53, 'Inwa Automotives', 1, 1, 'No : 156/3/H, New Kandy Road, \nBandarawatta,', 'Inwa Automotives', 0, ' 17.08.2011 ', '-', 1),
(144, '731S0050', 4, 53, 'S N J Auto International', 1, 1, 'No : 248/1, Kepungoda,', 'S N J Auto International', 0, ' 11.07.2011 ', '-', 1),
(145, '731S0014', 4, 53, 'Shan Lubricant Service Station', 1, 1, 'Kandy Road, \nMalwatte', 'Shan Lubricant Service Station', 0, ' 07.04.2011 ', '-', 1),
(146, '731L0007', 4, 53, 'Lucky Auto Spares (Pvt) Ltd', 1, 1, 'No : 477/1, Avissawella Road,', 'Lucky Auto Spares (Pvt) Ltd', 0, ' 05.04.2011 ', '-', 1),
(147, '731S0108', 4, 53, 'Supun Motors', 1, 1, 'No : 94, Galle Road, Kaldemulla', 'Supun Motors', 0, ' 13.12.2013 ', '-', 1),
(148, '731P0010', 4, 53, 'Panadura Auto Service & Filling Station', 1, 1, 'No : 383, Galle Road, Nalluruwa', 'Panadura Auto Service & Filling Station', 0, ' 13.03.2012 ', '-', 1),
(149, '731S0101', 4, 53, 'New Sooriya Service Center', 1, 1, 'No : 329, Kandy Road, Dalugama', 'New Sooriya Service Center', 0, ' 17.05.2013 ', '-', 1),
(150, '731D0012', 4, 53, 'Dias Automotive (pvt) Ltd', 1, 1, 'No : 22, Fernando Avenuue,', 'Dias Automotive (pvt) Ltd', 0, ' 10.05.2012 ', '-', 1),
(151, '731P0011', 4, 53, 'Pyramid Oil & Logistcs (pvt) Ltd', 1, 1, 'No : 24/1, Kotugoda Road, ', 'Pyramid Oil & Logistcs (pvt) Ltd', 0, ' 10.05.2012 ', '-', 1),
(152, '731S0011', 4, 53, 'Sena Auotcare Centre', 1, 1, 'No : 395/17, Medagoda, \nKolonnawa,', 'Sena Auotcare Centre', 0, ' 07.04.2011 ', '-', 1),
(153, '731L0014', 4, 53, 'Laksiri Motors', 1, 1, 'No : 44, Minuwangoda Road,', 'Laksiri Motors', 0, ' 17.10.2011 ', '-', 1),
(154, '731A0007', 4, 53, 'Asian Service Station / Autocare Solutions', 1, 1, 'No : 67, Avissawella Rd,', 'Asian Service Station / Autocare Solutions', 0, ' 05.04.2011 ', '-', 1),
(155, '731D0014', 4, 53, 'Dharmasiri Motors', 1, 1, 'No : 166, Colombo Road, Galloluwa', 'Dharmasiri Motors', 0, ' 06.12.2013 ', '-', 1),
(156, ' 731W0005 ', 4, 53, 'New Welca Service', 1, 1, ' Kurunegala Road, ', 'New Welca Service', 0, ' 07.01.2013 ', '-', 1),
(157, '731R0018', 4, 53, 'Randeniya Mtoros', 1, 1, 'No : 576, Kandy Road, Mahara', 'Randeniya Mtoros', 0, ' 27.11.2013 ', '-', 1),
(158, '731S0018', 4, 53, 'Sirini Auto Service Station (Pvt) Ltd', 1, 1, 'No : 17, Heenpanwila,', 'Sirini Auto Service Station (Pvt) Ltd', 0, ' 05.04.2011 ', '-', 1),
(159, '731S0088', 4, 53, 'S. S. Motors', 1, 1, 'No : 42, Minuwangoda Rd, Kanuwana', 'S. S. Motors', 0, ' 26.06.2012 ', '-', 1),
(160, '731S0106', 4, 53, 'Sasvee Automobile', 1, 1, 'No : 20, Wewalagawatte', 'Sasvee Automobile', 0, ' 29.10.2013 ', '-', 1),
(161, '731M0016', 4, 53, 'M K Motors & Engineering', 1, 1, 'No : 614, Bogaha Junction Road, New Town', 'M K Motors & Engineering', 0, ' 23.11.2011 ', '-', 1),
(162, '731S0071', 4, 53, 'St Anthony''s Lanka Service Station', 1, 1, 'Divulapitiya Road, \nMiriswatte', 'St Anthony''s Lanka Service Station', 0, ' 17.10.2011 ', '-', 1),
(163, '731M0017', 4, 53, 'Manjana Enterprices', 1, 1, 'No : 29, St Perers Road, Digarolla', 'Manjana Enterprices', 0, ' 04.05.2012 ', '-', 1),
(164, '731C0021', 4, 53, 'Civimech Automobile (Pvt) Ltd', 1, 1, 'No : 20, Vijitha Mawatha,', 'Civimech Automobile (Pvt) Ltd', 0, ' 13.03.2012 ', '-', 1),
(165, '731K0008', 4, 53, 'New Kelani Valley Service Center', 1, 1, 'No : 493, Negombo Road,', 'New Kelani Valley Service Center', 0, ' 25.07.2011 ', '-', 1),
(166, ' 731P0003 ', 4, 53, 'Pabavee Motor Traders', 1, 1, ' No : 08, Kapruka Shopping Complex, Kandy Roa', 'Pabavee Motor Traders', 0, ' 07.04.2011 ', '-', 1),
(167, '731W0004', 4, 53, 'Weeraratne Motors (Pvt) Ltd', 1, 1, 'No : 184 B, Colombo Road, \nGalloluwa Junction', 'Weeraratne Motors (Pvt) Ltd', 0, ' 26.09.2011 ', '-', 1),
(168, '731S0066', 4, 53, 'Saparamadu Motor Enterprises', 1, 1, 'No : 40, Elen Egoda,', 'Saparamadu Motor Enterprises', 0, ' 05.10.2011 ', '-', 1),
(169, '731A0015', 4, 53, 'Achini Motors', 1, 1, 'Aththanagalla Rd,', 'Achini Motors', 0, ' 18.07.2011 ', '-', 1),
(170, '731S0065', 4, 53, 'Sakura Enterprises', 1, 1, 'No : 129, Colombo Road, \nAbagahawatha,', 'Sakura Enterprises', 0, ' 05.10.2011 ', '-', 1),
(171, '731K0009', 4, 53, 'Karunarathne Motors', 1, 1, 'No : 188/1/A, Edithland Estate, Henegama Road', 'Karunarathne Motors', 0, ' 17.08.2011 ', '-', 1),
(172, '731N0013', 4, 53, 'Nuwanga Motors', 1, 1, 'No : 305, Temple Road,Himbutana', 'Nuwanga Motors', 0, ' 12.06.2012 ', '-', 1),
(173, '731S0105', 4, 53, 'Sineth Auto Spares', 1, 1, 'No : 102/10, Negombo Road', 'Sineth Auto Spares', 0, ' 11.09.2013 ', '-', 1),
(174, '731I0010', 4, 53, 'Irahanda Motors', 1, 1, 'No : 90/8 A, I D H Road (duwa), Kotikawatta', 'Irahanda Motors', 0, ' 23.11.2011 ', '-', 1),
(175, '731P0005', 4, 53, 'K N Perera & Son', 1, 1, 'No : 457, \nGalle Road, \nRawathawatte, ', 'K N Perera & Son', 0, ' 07.04.2011 ', '-', 1),
(176, '731N0004', 4, 53, 'Noyeli Service Center', 1, 1, 'No : 11/1, Embaraluwa Road,', 'Noyeli Service Center', 0, ' 05.04.2011 ', '-', 1),
(177, '731A0054', 4, 53, 'Abeywickrama Motor House', 1, 1, 'No : 158/1, Bandarawatta', 'Abeywickrama Motor House', 0, ' 17.05.2013 ', '-', 1),
(178, '731M0022', 4, 53, 'Malindu Auto Service Centre', 1, 1, 'No : 21/1 A, Ragama Rd', 'Malindu Auto Service Centre', 0, ' 25.11.2013 ', '-', 1),
(179, '731U0003', 4, 53, 'Upali Garage (Pvt) Ltd', 1, 1, 'No : 117A, Negombo Road', 'Upali Garage (Pvt) Ltd', 0, ' 22.05.2013 ', '-', 1),
(180, '731C0019', 4, 53, 'Charaka Motor Engineers', 1, 1, 'No : 414 B, Horana Road', 'Charaka Motor Engineers', 0, ' 13.03.2012 ', '-', 1),
(181, '731N0015', 4, 53, 'Nalaka Service', 1, 1, 'Rajagaha, Balagalla', 'Nalaka Service', 0, ' 30.10.2013 ', '-', 1),
(182, '731R0011', 4, 53, 'Real Auto Service', 1, 1, 'No : 66/5, Ragama Road, \nElapitiwala,', 'Real Auto Service', 0, ' 17.10.2011 ', '-', 1),
(183, '731S0107', 4, 53, 'Sun Indian Motors', 1, 1, 'No : 73/1/B, Colombo Road, Liyanagemulla', 'Sun Indian Motors', 0, ' 25.11.2013 ', '-', 1),
(184, '731R0013', 4, 53, 'Rahen Motors', 1, 1, 'No : 36A, Kadawatha Road', 'Rahen Motors', 0, ' 17.01.2012 ', '-', 1),
(185, '731K0001', 4, 53, 'Kiribathgoda Timber Stores', 1, 1, 'No: 382, Heenkenda,', 'Kiribathgoda Timber Stores', 0, ' 04.05.2011 ', '-', 1),
(186, '731A0013', 4, 53, 'Auto Beat International', 1, 1, 'No : 465/1/A, Eldeniya, \nRanmuthugala', 'Auto Beat International', 0, ' 25.07.2011 ', '-', 1),
(187, '731B0001', 4, 53, 'B & A Service And Clean Court', 1, 1, 'No : 434, Kandy Road, \nRanmuthugala,', 'B & A Service And Clean Court', 0, ' 05.04.2011 ', '-', 1),
(188, '731K0013', 4, 53, 'Kavinga Motors', 1, 1, 'No : 73/A, Kirindiwela Road,', 'Kavinga Motors', 0, ' 05.10.2011 ', '-', 1),
(189, '731R0010', 4, 53, 'Real Auto Traders', 1, 1, 'No : 55, Station Road,', 'Real Auto Traders', 0, ' 17.10.2011 ', '-', 1),
(190, '731S0058', 4, 53, 'S S Motors', 1, 1, 'No : 42, Minuwangoda Road, \nKanuwana,', 'S S Motors', 0, ' 24.08.2011 ', '-', 1),
(191, '731W0003', 4, 53, 'Wijayamini Motors', 1, 1, 'I P C Building, Negombo Road', 'Wijayamini Motors', 0, ' 26.09.2011 ', '-', 1),
(192, '731D0010', 4, 53, 'Devithuru Enterprices', 1, 1, 'No : 10/10/C, Ragama Rd,', 'Devithuru Enterprices', 0, ' 13.03.2012 ', '-', 1),
(193, ' 731A0020 ', 4, 53, 'Ahangama Auto Traders', 1, 1, ' No : 168, Old Negombo Road, Kanuwana ', 'Ahangama Auto Traders', 0, ' 04.05.2012 ', '-', 1),
(194, '731N0008', 4, 53, 'Nawagamuwa Oil Mart', 1, 1, 'No : 910, Nawagamuwa,', 'Nawagamuwa Oil Mart', 0, ' 25.07.2011 ', '-', 1),
(195, '731S0068', 4, 53, 'Senani Motor Stores', 1, 1, 'No : 525, Thalangama North,', 'Senani Motor Stores', 0, ' 14.10.2011 ', '-', 1),
(196, '731R0003', 4, 53, 'Rohan Engineering Works', 1, 1, 'No : 67, Awissawella Road,', 'Rohan Engineering Works', 0, ' 07.04.2011 ', '-', 1),
(197, '731A0008', 4, 54, 'Amila Motor Stores', 1, 1, 'No : 144/1, High Level Road,', 'Amila Motor Stores', 0, ' 05.04.2011 ', '-', 1),
(198, '731I0002', 4, 54, 'Isuru Motors', 1, 1, 'No : 238B, \nHigh Level Rd, \nPitipana Junction', 'Isuru Motors', 0, ' 05.04.2011 ', '-', 1),
(199, '731L0005', 4, 54, 'Lucky Auto House Hanwella', 1, 1, 'No : 137/1, Main Street,', 'Lucky Auto House Hanwella', 0, ' 05.04.2011 ', '-', 1),
(200, '731S0008', 4, 54, 'Sunbeam Eng & Overseas Trades', 1, 1, 'No : 260, Layards Broadway', 'Sunbeam Eng & Overseas Trades', 0, ' 06.04.2011 ', '-', 1),
(201, '731S0054', 4, 54, 'New Samudaya Motors', 1, 1, 'No : 230, Rathnapura Road,', 'New Samudaya Motors', 0, ' 18.07.2011 ', '-', 1),
(202, '731I0009', 4, 54, 'Inter Ocean Traders', 1, 1, 'No : 120, Layard''s Broadway', 'Inter Ocean Traders', 0, ' 17.11.2011 ', '-', 1),
(203, '731P0002', 4, 54, 'Peiris Service Centre', 1, 1, 'No : 43, DHARMARATHNA MW, PADUKKA RD,', 'Peiris Service Centre', 0, ' 07.04.2011 ', '-', 1),
(204, '731T0004', 4, 54, 'Tata Leyland Motors', 1, 1, 'No : 133C, Colombo Road,', 'Tata Leyland Motors', 0, ' 06.04.2011 ', '-', 1),
(205, '731S0086', 4, 54, 'Sanjeewa Motor House', 1, 1, 'No : 22 Sirimavo Bandaranayake Mawatha', 'Sanjeewa Motor House', 0, ' 25.05.2012 ', '-', 1),
(206, '731L0009', 4, 54, 'Lakshan Auto Parts', 1, 1, 'No : 347, High Level Road, \nGalagedara, ', 'Lakshan Auto Parts', 0, ' 17.08.2011 ', '-', 1),
(207, '731D0008', 4, 54, 'Dushantha Motors', 1, 1, 'No : 203, Kesbewa Road,', 'Dushantha Motors', 0, ' 23.11.2011 ', '-', 1),
(208, '731S0053', 4, 54, 'Savonta Service Centre', 1, 1, 'No : 255B/1, Ratnapura Road,', 'Savonta Service Centre', 0, ' 25.07.2011 ', '-', 1),
(209, '731M0012', 4, 54, 'M R Henry & Company', 1, 1, 'No : 375, Godagama Road,', 'M R Henry & Company', 0, ' 17.08.2011 ', '-', 1),
(210, '731T0005', 4, 54, 'Thushara Auto Parts', 1, 1, 'No : 635/B, Padukka Road,', 'Thushara Auto Parts', 0, ' 17.08.2011 ', '-', 1),
(211, '731K0016', 4, 54, 'K. V. K. Auto Consultants (pvt) Ltd', 1, 1, 'No. 53/4, Niyandagala,', 'K. V. K. Auto Consultants (pvt) Ltd', 0, ' 04.04.2013 ', '-', 1),
(212, '731R0015', 4, 54, 'Ranjith Motors (pvt) Ltd', 1, 1, 'No : 30, Sirimavo Bandaranayake Mawatha', 'Ranjith Motors (pvt) Ltd', 0, ' 26.06.2013 ', '-', 1),
(213, '731S0057', 4, 54, 'S C S Auto Lubricant And Cleaning Park', 1, 1, 'No : 106/A, Low Level,', 'S C S Auto Lubricant And Cleaning Park', 0, ' 23.08.2011 ', '-', 1),
(214, '731S0072', 4, 54, 'Sandun Motors', 1, 1, 'No : 19, karunarathne Building, \nMarket Lane', 'Sandun Motors', 0, ' 03.11.2011 ', '-', 1),
(215, '731A0016', 4, 54, 'Athurugiriya Service Station', 1, 1, 'No : 7/3, Ganawimala Mawatha,', 'Athurugiriya Service Station', 0, ' 17.08.2011 ', '-', 1),
(216, '731C0020', 4, 54, 'Ceylon Motor House', 1, 1, 'No : 892/B, Athurugiriya Road', 'Ceylon Motor House', 0, ' 13.03.2012 ', '-', 1),
(217, '731L0016', 4, 54, 'L M Perera & Company', 1, 1, 'No : 11 Abeysingharama Mawatha, Panchikawatta', 'L M Perera & Company', 0, ' 13.06.2012 ', '-', 1),
(218, '731R0008', 4, 54, 'Rohana Motors', 1, 1, 'Kegalle Rd, \nPitadeniya,', 'Rohana Motors', 0, ' 07.04.2011 ', '-', 1),
(219, '731L0011', 4, 54, 'Star Lube Lak Isuru Service Centre', 1, 1, 'No : 136/A, Colombo Road,', 'Star Lube Lak Isuru Service Centre', 0, ' 17.08.2011 ', '-', 1),
(220, '731P0008', 4, 54, 'Padukka Service Station', 1, 1, 'No : 186, Horana Road, Udumulla', 'Padukka Service Station', 0, ' 13.03.2012 ', '-', 1),
(221, '731K0004', 4, 54, 'Kollonna Service Centre', 1, 1, 'Thalduwa,', 'Kollonna Service Centre', 0, ' 05.04.2011 ', '-', 1),
(222, '731L0012', 4, 54, 'Lakshan Service Centre', 1, 1, 'Bulathsinghala Road, \nBellapitiya', 'Lakshan Service Centre', 0, ' 09.09.2011 ', '-', 1),
(223, '731H0007', 4, 54, 'Hingurana Distilleries (Pvt) Ltd', 1, 1, 'Malwana Road, Samanabedda', 'Hingurana Distilleries (Pvt) Ltd', 0, ' 26.07.2012 ', '-', 1),
(224, '731S0059', 4, 54, 'Slit Lubricants Pvt Ltd', 1, 1, 'No : 76, Sunethra Devi Road,', 'Slit Lubricants Pvt Ltd', 0, ' 30.08.2011 ', '-', 1),
(225, '731S0047', 4, 54, 'S A S Lanka Service Centre', 1, 1, '59/4, Miriswatta,', 'S A S Lanka Service Centre', 0, ' 21.06.2011 ', '-', 1),
(226, '731K0005', 4, 54, 'K K A R Kumarasinghe & Sons', 1, 1, 'Lanka Service Station, \nDehiowita', 'K K A R Kumarasinghe & Sons', 0, ' 05.04.2011 ', '-', 1),
(227, '731R0016', 4, 54, 'Ravindu Motors', 1, 1, 'No : 08, Colombo Road', 'Ravindu Motors', 0, ' 15.08.2013 ', '-', 1),
(228, '731D0003', 4, 54, 'David Motor House', 1, 1, 'No : 102/1, Colombo Road,\nUkwatte,', 'David Motor House', 0, ' 21.06.2011 ', '-', 1),
(229, '731S0060', 4, 54, 'Sun Star Service Station', 1, 1, 'No : 485/3, High Level Road,', 'Sun Star Service Station', 0, ' 30.08.2011 ', '-', 1),
(230, '731S0063', 4, 54, 'Siriruwan Motor Service', 1, 1, 'Meepe Junction,', 'Siriruwan Motor Service', 0, ' 16.09.2011 ', '-', 1),
(231, '731E0001', 4, 54, 'Eranga Enterprises', 1, 1, 'No : 233/2, Campus Road, \nKatubedda,', 'Eranga Enterprises', 0, ' 09.09.2011 ', '-', 1),
(232, '731J0001', 4, 54, 'D H J Jayakody & Brothers', 1, 1, 'Lanka Ioc Filling Station, \nNo : 27, Colombo ', 'D H J Jayakody & Brothers', 0, ' 05.04.2011 ', '-', 1),
(233, '731P0009', 4, 54, 'Prestige Auto Care', 1, 1, 'No : 391, Millagahawatte', 'Prestige Auto Care', 0, ' 13.03.2012 ', '-', 1),
(234, '731D0005', 4, 54, 'Dhinuco Automotives (Pvt) Ltd', 1, 1, 'No : 359, High Level Rd, \nNawinna,', 'Dhinuco Automotives (Pvt) Ltd', 0, ' 17.08.2011 ', '-', 1),
(235, '731N0010', 4, 54, 'Nuwansiri Motors', 1, 1, 'No : 55/A, Ginigathhena Road,', 'Nuwansiri Motors', 0, ' 14.10.2011 ', '-', 1),
(236, '731P0012', 4, 54, 'Pussalla Meat Producers (Pvt) Ltd', 1, 1, 'No : 585, School Lane, Pelawatte', 'Pussalla Meat Producers (Pvt) Ltd', 0, ' 28.01.2014 ', '-', 1),
(237, '731G0001', 4, 54, 'Kovida Motor Co Pyt Ltd', 1, 1, 'No : 202, WERAHERA', 'Kovida Motor Co Pyt Ltd', 0, ' 05.04.2011 ', '-', 1),
(238, '731R0007', 4, 54, 'Rasika Motors', 1, 1, 'No : 134/1, Dencil Kobbekaduwa Mw,', 'Rasika Motors', 0, ' 07.04.2011 ', '-', 1),
(239, '731D0007', 4, 54, 'Dinujaya Auto Service Centre', 1, 1, 'No : 294/20, Godagama Road,', 'Dinujaya Auto Service Centre', 0, ' 03.11.2011 ', '-', 1),
(240, '731I0008', 4, 54, 'Isuru Service Centre', 1, 1, 'Magammana,', 'Isuru Service Centre', 0, ' 14.10.2011 ', '-', 1),
(241, '731S0064', 4, 54, 'Samantha Enterprises', 1, 1, 'No : 130, Hign Level Road, \nGodagama', 'Samantha Enterprises', 0, ' 21.09.2011 ', '-', 1),
(242, '731C0013', 4, 54, 'Charith Motor Traders', 1, 1, 'No : 35, Colombo Road,', 'Charith Motor Traders', 0, ' 25.07.2011 ', '-', 1),
(243, '731S0023', 4, 54, 'Super Line Holding (Pvt) Limited', 1, 1, 'No : 411B, High Level Road, \nNawinna,', 'Super Line Holding (Pvt) Limited', 0, ' 07.04.2011 ', '-', 1),
(244, '731A0018', 4, 54, 'Akpel (private) Limited', 1, 1, 'No : 398/1A, High Level Road', 'Akpel (private) Limited', 0, ' 13.03.2012 ', '-', 1),
(245, '731S0087', 4, 54, 'T. D. Sirisena & Co. (pvt) Ltd.', 1, 1, 'No : 249 C, Panchikawatta Road ', 'T. D. Sirisena & Co. (pvt) Ltd.', 0, ' 07.06.2012 ', '-', 1),
(246, '731I0014', 4, 54, 'Irosha International (pvt) Ltd', 1, 1, 'No: 199, Panchikawatta Road', 'Irosha International (pvt) Ltd', 0, ' 12.06.2012 ', '-', 1),
(247, '731A0021', 4, 54, 'Abaya & Company Importers & Exporters (pvt) L', 1, 1, 'No : 89, Prince Of Wales Avenue', 'Abaya & Company Importers & Exporters (pvt) L', 0, ' 13.06.2012 ', '-', 1),
(248, '731U0002', 4, 54, 'Udawatta Motors (Pvt) Ltd', 1, 1, 'No : 135/5, Panchikawatta Road', 'Udawatta Motors (Pvt) Ltd', 0, ' 21.11.2012 ', '-', 1),
(249, '734R0002', 8, 15, 'Rathnaweera Auto Care', 1, 1, 'Moraketiya Road, \nPallegama', 'Rathnaweera Auto Care', 0, ' 07.04.2011 ', '-', 1),
(250, '734I0001', 8, 15, 'Indumini Motors', 1, 1, 'Pallegama,', 'Indumini Motors', 0, ' 05.04.2011 ', '-', 1),
(251, '734H0001', 8, 15, 'H L W Engineering Services', 1, 1, 'No : 42, MAIN STREET,', 'H L W Engineering Services', 0, ' 05.04.2011 ', '-', 1),
(252, '734R0001', 8, 15, 'Rishana (Pvt) Ltd', 1, 1, 'No : 62/11, Rassagala Road,', 'Rishana (Pvt) Ltd', 0, ' 07.04.2011 ', '-', 1),
(253, '734K0001', 8, 15, 'Kaleel Motor Stores', 1, 1, 'No : 74, MAIN STREET', 'Kaleel Motor Stores', 0, ' 05.04.2011 ', '-', 1),
(254, '734R0003', 8, 15, 'Ranjeewa Motor Stores', 1, 1, 'No : 20/1, Eduragala,', 'Ranjeewa Motor Stores', 0, ' 11.01.2012 ', '-', 1),
(255, '734G0004', 8, 15, 'Gavindu Motors', 1, 1, 'No : 351/3, Rathnapura Road, Munagama', 'Gavindu Motors', 0, ' 22.05.2013 ', '-', 1),
(256, '734O0002', 8, 15, 'Omega Motor Stores', 1, 1, 'Moraketiya Road', 'Omega Motor Stores', 0, ' 19.06.2013 ', '-', 1),
(257, '734J0001', 8, 15, 'Jayantha Service Centre', 1, 1, 'No : 34/1, Baddewewa, \nWijesinghe Mawatha,', 'Jayantha Service Centre', 0, ' 18.07.2011 ', '-', 1),
(258, '734K0003', 8, 15, 'K A Engineering & K A Auto Clean', 1, 1, 'Kirimetihena,', 'K A Engineering & K A Auto Clean', 0, ' 21.09.2011 ', '-', 1),
(259, '734L0001', 8, 15, 'Leel Motors', 1, 1, 'No : 08, Main Street,', 'Leel Motors', 0, ' 05.04.2011 ', '-', 1),
(260, '734O0001', 8, 15, 'Otek Auto Service Station', 1, 1, 'Kosnatota,', 'Otek Auto Service Station', 0, ' 05.10.2011 ', '-', 1),
(261, '734R0004', 8, 15, 'Ravinu Oil Mart', 1, 1, 'Elapatha South', 'Ravinu Oil Mart', 0, ' 19.06.2013 ', '-', 1),
(262, '734S0003', 8, 15, 'Sanasuma Enterprises', 1, 1, 'No : 208/A, Mail Street', 'Sanasuma Enterprises', 0, ' 19.06.2013 ', '-', 1),
(263, '734N0001', 8, 15, 'Niluka Motors', 1, 1, 'No : 248, Walana Junction, Kolombage Ara', 'Niluka Motors', 0, ' 28.11.2011 ', '-', 1),
(264, '734M0002', 8, 15, 'Minro Auto Service', 1, 1, 'Idangoda', 'Minro Auto Service', 0, ' 23.11.2011 ', '-', 1),
(265, '734S0002', 8, 15, 'Sirirenduna Service Station', 1, 1, 'Paadukka Road', 'Sirirenduna Service Station', 0, ' 13.03.2012 ', '-', 1),
(266, '734M0001', 8, 15, 'M N Motors', 1, 1, 'No : 63 A, Colombo Road,', 'M N Motors', 0, ' 02.08.2011 ', '-', 1),
(267, '734W0001', 8, 15, 'Wayamba Motors', 1, 1, 'Mosque Road, \nKadugalwatte,', 'Wayamba Motors', 0, ' 06.04.2011 ', '-', 1),
(268, '734K0002', 8, 15, 'Karanketiya Service Station', 1, 1, 'No : 11, Collins Road,', 'Karanketiya Service Station', 0, ' 25.07.2011 ', '-', 1),
(269, '734A0001', 8, 15, 'Anuvina Auto Service', 1, 1, 'Panukerapitiya', 'Anuvina Auto Service', 0, ' 13.03.2012 ', '-', 1),
(270, '734I0002', 8, 15, 'Ingiri Auto Care', 1, 1, 'St Peters Estate, Maha Ingiriya', 'Ingiri Auto Care', 0, ' 13.03.2012 ', '-', 1),
(271, '734C0001', 8, 15, 'Clean Park Service Station', 1, 1, 'Mahingoda,', 'Clean Park Service Station', 0, ' 05.04.2011 ', '-', 1),
(272, '734V0001', 8, 15, 'Yatiyana Group', 1, 1, 'Pallegama', 'Yatiyana Group', 0, ' 22.05.2013 ', '-', 1),
(273, '734G0001', 8, 15, 'General Trade Agencies', 1, 1, 'No : 70/B, Bandaranayake Mw,', 'General Trade Agencies', 0, ' 09.09.2011 ', '-', 1),
(274, '734S0001', 8, 15, 'Senarath Motors', 1, 1, 'No : 12, Shopping Complex,', 'Senarath Motors', 0, ' 25.07.2011 ', '-', 1),
(275, '734D0001', 8, 15, 'D S S N Auto Engineers (Pvt) Ltd', 1, 1, 'No : 278, Colombo Road', 'D S S N Auto Engineers (Pvt) Ltd', 0, ' 13.03.2012 ', '-', 1),
(276, '741O0002', 9, 21, 'Orient Motor Centre', 1, 1, 'No : 65, Colombo Road,', 'Orient Motor Centre', 0, ' 13.03.2012 ', '-', 1),
(277, '741J0003', 9, 21, 'Jayasiri Motors (Pvt) Ltd', 1, 1, 'No : 148, Main Street,', 'Jayasiri Motors (Pvt) Ltd', 0, ' 29.04.2011 ', '-', 1),
(278, '741A0001', 9, 21, 'Auto Fair', 1, 1, 'No : 128, Colombo Road,', 'Auto Fair', 0, ' 05.04.2011 ', '-', 1),
(279, '741N0012', 9, 21, 'Nilantha Motor Traders', 1, 1, 'No : 426, Anwarama', 'Nilantha Motor Traders', 0, ' 19.06.2013 ', '-', 1),
(280, ' 741B0001 ', 9, 21, 'Bitulink Emulsion (pvt) Ltd.', 1, 1, 'Apeladeniya Road, Masnoruwa', 'Bitulink Emulsion (pvt) Ltd.', 0, ' 10.10.2012 ', '-', 1),
(281, '741K0001', 9, 21, 'Kegalu Motors', 1, 1, 'No : 52, Main Street,', 'Kegalu Motors', 0, ' 05.04.2011 ', '-', 1),
(282, '741J0004', 9, 21, 'Jayoda Motors', 1, 1, 'No : 391, Kandy Road, \nRanwala,', 'Jayoda Motors', 0, ' 20.06.2011 ', '-', 1),
(283, '741K0003', 9, 21, 'Kegalu Tyre Service', 1, 1, 'No : 14, Polgahawela Road,', 'Kegalu Tyre Service', 0, ' 05.04.2011 ', '-', 1),
(284, '741A0004', 9, 21, 'Auto Care Centre', 1, 1, 'No : 455A, Kandy Road,', 'Auto Care Centre', 0, ' 21.06.2011 ', '-', 1),
(285, '741W0005', 9, 21, 'Wasantha Motors', 1, 1, 'No : 164/C, New Colombo Road', 'Wasantha Motors', 0, ' 21.02.2012 ', '-', 1),
(286, '741J0005', 9, 21, 'Jayasiri Clean Park (Pvt) Ltd', 1, 1, 'No : 526, Star Lube Service Station, Kandy Ro', 'Jayasiri Clean Park (Pvt) Ltd', 0, ' 14.09.2011 ', '-', 1),
(287, '741N0003', 9, 21, 'Neelagiri Motors', 1, 1, 'No : 221/A, Kandy Road,', 'Neelagiri Motors', 0, ' 05.04.2011 ', '-', 1),
(288, '741R0003', 9, 21, 'Rambukkana Auto Service', 1, 1, 'Kegalle Road, \nBathamburaya,', 'Rambukkana Auto Service', 0, ' 14.02.2012 ', '-', 1),
(289, '741A0011', 9, 21, 'A. W. M. Auto Service Station', 1, 1, 'No : 129, Kurunegala Road', 'A. W. M. Auto Service Station', 0, ' 25.11.2013 ', '-', 1),
(290, ' 741L0005 ', 9, 21, 'Lumbini Motors', 1, 1, 'No : 1/238, Kandy Road', 'Lumbini Motors', 0, ' 10.05.2012 ', '-', 1),
(291, '741O0001', 9, 21, 'Oriental Automotive Engineers', 1, 1, 'No : 75/49, Colombo Road,', 'Oriental Automotive Engineers', 0, ' 17.01.2012 ', '-', 1),
(292, '741R0005', 9, 21, 'Randika Motors', 1, 1, 'No : 8, Kandy Road', 'Randika Motors', 0, '13.03.2012', '-', 1),
(293, '741M0013', 9, 21, 'Madushan Motors', 1, 1, 'Wadu Maduwa Watta, Anguruwella', 'Madushan Motors', 0, ' 25.11.2013 ', '-', 1),
(294, '741V0001', 9, 21, 'Victory Auto Service', 1, 1, 'Diddeniya Watta, \nDambokka,', 'Victory Auto Service', 0, ' 13.05.2011 ', '-', 1),
(295, '741O0003', 9, 21, 'Omega Motors', 1, 1, 'No : 183/9, Kurunegala Road', 'Omega Motors', 0, ' 10.05.2013 ', '-', 1),
(296, '741U0003', 9, 21, 'Unique Motors', 1, 1, 'No : 68, Awissawella Road, Magammana', 'Unique Motors', 0, ' 25.11.2013 ', '-', 1),
(297, '741C0006', 9, 21, 'Chandrasiri Auto Service', 1, 1, 'Thuru Viyana, \nBulugolla,', 'Chandrasiri Auto Service', 0, ' 14.02.2012 ', '-', 1),
(298, '741N0001', 9, 20, 'Nanda Motors', 1, 1, 'No : 95, Puttalam Road,', 'Nanda Motors', 0, ' 05.04.2011 ', '-', 1),
(299, '741C0001', 9, 20, 'Colombage Motors', 1, 1, 'No : 79, CHILAW RD, ', 'Colombage Motors', 0, ' 05.04.2011 ', '-', 1),
(300, '741A0003', 9, 20, 'A M A Motors', 1, 1, 'No : 03, Colombo Road,', 'A M A Motors', 0, ' 20.06.2011 ', '-', 1),
(301, '741M0001', 9, 20, 'Marawila Auto Care (Pvt) Ltd -', 1, 1, 'CHILAW RD,', 'Marawila Auto Care (Pvt) Ltd -', 0, ' 05.04.2011 ', '-', 1),
(302, '741M0004', 9, 20, 'Mallika Motors', 1, 1, 'No : 271, CHILAW RD,', 'Mallika Motors', 0, ' 05.04.2011 ', '-', 1),
(303, '741S0007', 9, 20, 'Sharmila Motors (Pvt) Ltd', 1, 1, 'No : 12, Frazer Road,', 'Sharmila Motors (Pvt) Ltd', 0, ' 05.04.2011 ', '-', 1),
(304, '741S0001', 9, 20, 'Sridhara Auto Engineering And Services', 1, 1, 'No : 122, Kurunegala Road,', 'Sridhara Auto Engineering And Services', 0, ' 07.04.2011 ', '-', 1),
(305, '741A0002', 9, 20, 'Amila Motors', 1, 1, 'Puttalam Road,', 'Amila Motors', 0, ' 13.05.2011 ', '-', 1),
(306, '741A0010', 9, 20, 'Anthupituya Motors', 1, 1, 'No : 113, Chilaw Road', 'Anthupituya Motors', 0, ' 25.11.2013 ', '-', 1),
(307, '741S0006', 9, 20, 'Sena Motors Enterprises', 1, 1, 'No : 53, PANNALA RD', 'Sena Motors Enterprises', 0, ' 07.04.2011 ', '-', 1),
(308, '741A0008', 9, 20, 'Abeyrathna Motor House', 1, 1, 'No : 92, Negombo Road', 'Abeyrathna Motor House', 0, ' 29.01.2013 ', '-', 1),
(309, '741C0004', 9, 20, 'New Chandrika Motor', 1, 1, 'Kurunegala Road,', 'New Chandrika Motor', 0, ' 21.06.2011 ', '-', 1),
(310, '741K0008', 9, 20, 'Kurera Motors', 1, 1, 'No : 126, Pannala Road,', 'Kurera Motors', 0, ' 29.04.2011 ', '-', 1),
(311, '741C0003', 9, 20, 'Chandrika Motors (Pvt) Ltd', 1, 1, 'Chilaw Road,', 'Chandrika Motors (Pvt) Ltd', 0, ' 20.06.2011 ', '-', 1),
(312, '741K0007', 9, 20, 'Kalarani Motors', 1, 1, 'Puttalum Rd,', 'Kalarani Motors', 0, ' 27.04.2011 ', '-', 1),
(313, '741P0003', 9, 20, 'Priyadharshani Motors', 1, 1, 'Medagama Road, \nNew Town, ', 'Priyadharshani Motors', 0, ' 07.04.2011 ', '-', 1),
(314, '741S0004', 9, 20, 'Senura Motors', 1, 1, 'No : 183/10, Negombio Road,', 'Senura Motors', 0, ' 07.04.2011 ', '-', 1),
(315, '741R0004', 9, 20, 'R & R Filling Station', 1, 1, 'Puttalam Road,', 'R & R Filling Station', 0, ' 14.02.2012 ', '-', 1),
(316, '741N0002', 9, 20, 'Niroshan Motors', 1, 1, 'Colombo Road, \nMaikkulam,', 'Niroshan Motors', 0, ' 06.04.2011 ', '-', 1),
(317, '741S0027', 9, 20, 'Susan Auto Service', 1, 1, 'No : 344, Pallama', 'Susan Auto Service', 0, ' 15.08.2013 ', '-', 1),
(318, '741J0007', 9, 20, 'New Jayasiri Motors', 1, 1, 'Kuliyapitiya Road', 'New Jayasiri Motors', 0, ' 29.01.2013 ', '-', 1),
(319, '741S0020', 9, 20, 'Sanchala Motors', 1, 1, 'No : 235, Colombo Road, Angampitiya', 'Sanchala Motors', 0, ' 19.06.2013 ', '-', 1),
(320, '741P0004', 9, 20, 'Pifensaa Auto Cleaning Service, Garage And Ve', 1, 1, 'Sawaraja Watta', 'Pifensaa Auto Cleaning Service, Garage And Ve', 0, ' 29.01.2013 ', '-', 1),
(321, '741R0013', 9, 20, 'Romee Enterprices & Engineering', 1, 1, 'Isipathathanaramaya Asala, Pahala', 'Romee Enterprices & Engineering', 0, ' 25.11.2013 ', '-', 1),
(322, '741I0002', 9, 20, 'Inoka Motor Stores', 1, 1, 'No : 104, Chilaw Road, Main Street', 'Inoka Motor Stores', 0, ' 15.08.2013 ', '-', 1),
(323, '741T0001', 9, 20, 'Taisho Lanka (Pvt) Ltd', 1, 1, 'No : 54, Tuntota,', 'Taisho Lanka (Pvt) Ltd', 0, ' 13.05.2011 ', '-', 1),
(324, '741N0004', 9, 20, 'Niyasdeen Oil Mart', 1, 1, 'Main Street', 'Niyasdeen Oil Mart', 0, ' 05.04.2011 ', '-', 1),
(325, '741S0010', 9, 19, 'Silva Motor House', 1, 1, 'No : 223, Hettipola  Rd,', 'Silva Motor House', 0, ' 07.04.2011 ', '-', 1),
(326, '741P0002', 9, 19, 'Rathnayake Motors', 1, 1, 'No : 67, Negombo Road, ', 'Rathnayake Motors', 0, ' 07.04.2011 ', '-', 1),
(327, '741W0004', 9, 19, 'Warunamal Motors', 1, 1, 'No : 185, Kuliyapitiya Road,', 'Warunamal Motors', 0, ' 21.02.2012 ', '-', 1),
(328, ' 741R0002 ', 9, 19, 'Risara Motor Traders (pvt) Ltd', 1, 1, 'No : 53, Puttalam Road', 'Risara Motor Traders (pvt) Ltd', 0, ' 17.01.2012 ', '-', 1),
(329, '741W0003', 9, 19, 'Weerasinghe Auto Service', 1, 1, 'No : 67, Kurunegala Road, ', 'Weerasinghe Auto Service', 0, ' 13.05.2011 ', '-', 1),
(330, '741U0002', 9, 19, 'Upali Motor Stores', 1, 1, 'No : 75, Puttalam Road', 'Upali Motor Stores', 0, ' 29.01.2013 ', '-', 1),
(331, '741H0001', 9, 19, 'Hatsu Motor', 1, 1, 'Narammala Rd,', 'Hatsu Motor', 0, ' 24.06.2011 ', '-', 1),
(332, '741N0005', 9, 19, 'Mahinda Automotives', 1, 1, 'No : 123, Negombo Road,', 'Mahinda Automotives', 0, ' 25.05.2011 ', '-', 1),
(333, '741P0001', 9, 19, 'Princess Auto Service Filling Station', 1, 1, 'No : 341, HETTIPOLA RD', 'Princess Auto Service Filling Station', 0, ' 07.04.2011 ', '-', 1),
(334, '741J0001', 9, 19, 'New Jayasekera Auto Motors (Pvt) Ltd', 1, 1, 'No : 209, Wilgoda Circular Road, \nYanthampala', 'New Jayasekera Auto Motors (Pvt) Ltd', 0, ' 05.04.2011 ', '-', 1),
(335, ' 741S0019 ', 9, 19, 'New Sanjeewa Auto Spares', 1, 1, 'No : 98, Puttalam Road', 'New Sanjeewa Auto Spares', 0, ' 29.01.2013 ', '-', 1),
(336, '741Z0001', 9, 19, 'Zahira Motors', 1, 1, 'No 111, Near Filling Station, Kurunegala Road', 'Zahira Motors', 0, ' 21.02.2012 ', '-', 1),
(337, '741C0008', 9, 19, 'Chandana Motors', 1, 1, 'Puttalam Road', 'Chandana Motors', 0, ' 15.07.2013 ', '-', 1),
(338, '741M0003', 9, 19, 'Manoj Motors', 1, 1, 'Dambulla Road, \nNakatta', 'Manoj Motors', 0, ' 05.04.2011 ', '-', 1),
(339, ' 741S0017 ', 9, 19, 'Senarath Engineering And Agro Bussines(Pvt)Lt', 1, 1, 'Maddumamulla Estate, Thalammehera', 'Senarath Engineering And Agro Bussines(Pvt)Lt', 0, ' 29.01.2013 ', '-', 1),
(340, '741A0009', 9, 19, 'Ayesha Motors', 1, 1, 'F 01, New Sshopping Complex, Chilaw Road', 'Ayesha Motors', 0, ' 19.06.2013 ', '-', 1),
(341, '741K0005', 9, 19, 'Chrishmy Motors', 1, 1, 'Nikaweratiya,', 'Chrishmy Motors', 0, ' 05.04.2011 ', '-', 1),
(342, '741M0009', 9, 19, 'Manujitha Motors', 1, 1, 'No : 148, Puttlam Road', 'Manujitha Motors', 0, ' 29.01.2013 ', '-', 1),
(343, ' 741M0006 ', 9, 19, 'New Mallika Motor Centre', 1, 1, 'No : 10, Puttalam Road', 'New Mallika Motor Centre', 0, ' 13.05.2011 ', '-', 1),
(344, '741K0010', 9, 19, 'Keerthi Motors', 1, 1, 'No : 50, Walawwaththa,', 'Keerthi Motors', 0, ' 17.01.2012 ', '-', 1),
(345, '741L0006', 9, 19, 'Litharu Enterprise', 1, 1, 'No : 227, Uyanwatta, Kurunegala Road', 'Litharu Enterprise', 0, ' 19.06.2013 ', '-', 1),
(346, '741W0001', 9, 19, 'Wayamba Auto Service - Mr P Dasanayake', 1, 1, '\n2nd Mile Post, \nDambulla Road,', 'Wayamba Auto Service - Mr P Dasanayake', 0, ' 06.04.2011 ', '-', 1),
(347, '741M0007', 9, 19, 'Mahagalkadawala Service', 1, 1, 'Palusiyabalawa, \nMahagalkadawala', 'Mahagalkadawala Service', 0, ' 07.12.2011 ', '-', 1),
(348, '741S0023', 9, 19, 'Sarath Motors', 1, 1, 'No : 165/B 01, Kurunegala Road', 'Sarath Motors', 0, ' 15.07.2013 ', '-', 1),
(349, '741R0009', 9, 19, 'Rivilula Motors', 1, 1, '15Th Mile Post, Kuliyapitiya Road', 'Rivilula Motors', 0, ' 15.07.2013 ', '-', 1),
(350, '741C0005', 9, 19, 'Chandana Filling Station', 1, 1, 'No : 237, \nKurunegala Road,', 'Chandana Filling Station', 0, ' 14.09.2011 ', '-', 1),
(351, '741S0016', 9, 19, 'Suman Service Center', 1, 1, 'Madagalla Road', 'Suman Service Center', 0, ' 13.03.2012 ', '-', 1),
(352, '741N0013', 9, 19, 'Nelan Motors', 1, 1, 'Chilaw Road, Bandara', 'Nelan Motors', 0, ' 15.08.2013 ', '-', 1),
(353, '741I0001', 9, 19, 'Indika Metal Crusher', 1, 1, 'Sirigala,', 'Indika Metal Crusher', 0, ' 05.04.2011 ', '-', 1),
(354, '741S0013', 9, 19, 'Shantha Clean Park', 1, 1, 'Kobeigane,', 'Shantha Clean Park', 0, ' 13.05.2011 ', '-', 1),
(355, '741D0001', 9, 19, 'Dorabawilla Auto Service', 1, 1, 'Sirisara, Dorabawila', 'Dorabawilla Auto Service', 0, ' 09.04.2012 ', '-', 1),
(356, '741S0026', 9, 19, 'Sisira Motors', 1, 1, 'Talgodapitiya', 'Sisira Motors', 0, ' 15.08.2013 ', '-', 1),
(357, '741S0025', 9, 19, 'Sudath Motors', 1, 1, 'Dambulla Road', 'Sudath Motors', 0, ' 15.08.2013 ', '-', 1),
(358, ' 741J0006 ', 9, 19, 'New Jayaweera Auto Paint Work', 1, 1, 'Malpiyale Mawatha\n\n', 'New Jayaweera Auto Paint Work', 0, ' 26.06.2012 ', '-', 1),
(359, '741S0005', 9, 19, 'Solangarachchi Motors', 1, 1, 'No : 582 Madampe Road', 'Solangarachchi Motors', 0, ' 07.04.2011 ', '-', 1),
(360, '741Y0002', 9, 19, 'Yasasa Motors', 1, 1, 'No : 279, Madampe Road', 'Yasasa Motors', 0, ' 04.05.2012 ', '-', 1),
(361, '741T0005', 9, 19, 'Thusitha Tyre House', 1, 1, 'Anuradhapura Road', 'Thusitha Tyre House', 0, ' 25.11.2013 ', '-', 1),
(362, '741P0005', 9, 19, 'Pathmasena Iron Works', 1, 1, 'No : 79/1, Hospital Road', 'Pathmasena Iron Works', 0, ' 19.06.2013 ', '-', 1),
(363, '741A0005', 9, 19, 'Athula Motors & Service', 1, 1, 'Anuradhapura Road,', 'Athula Motors & Service', 0, ' 17.01.2012 ', '-', 1),
(364, '741K0006', 9, 19, 'Karie''s Auto Motor', 1, 1, 'No : 575, Meegahakotuwa,', 'Karie''s Auto Motor', 0, ' 05.04.2011 ', '-', 1),
(365, '741L0003', 9, 19, 'Lucky Auto Service', 1, 1, 'Rambe', 'Lucky Auto Service', 0, ' 13.03.2012 ', '-', 1),
(366, '741S0029', 9, 19, 'Sumudu Auto Service', 1, 1, 'Anuradhapura Road, Padeniya', 'Sumudu Auto Service', 0, ' 30.10.2013 ', '-', 1);
INSERT INTO `tbl_dealer` (`delar_id`, `delar_account_no`, `branch_id`, `sales_officer_id`, `delar_name`, `district_id`, `city_id`, `delar_address`, `delar_shop_name`, `discount_percentage`, `date_account_open`, `delar_code`, `status`) VALUES
(367, '741M0010', 9, 19, 'Muthugala Auto Service', 1, 1, 'No : 101, Wilgoda Road', 'Muthugala Auto Service', 0, ' 26.06.2012 ', '-', 1),
(368, '741R0010', 9, 19, 'Ruwan Motors', 1, 1, 'No : 12/1 A, Anuradhapura Road', 'Ruwan Motors', 0, ' 15.08.2013 ', '-', 1),
(369, '741N0011', 9, 19, 'Nitto Brake Liner', 1, 1, 'No : 122 ,Keppitigala Road,', 'Nitto Brake Liner', 0, ' 21.02.2012 ', '-', 1),
(370, '741G0003', 9, 19, 'Good Way Auto Service', 1, 1, 'No : 282, Anuradhapura Road', 'Good Way Auto Service', 0, ' 09.01.2014 ', '-', 1),
(371, '741S0024', 9, 19, 'Shanika Motor House', 1, 1, 'No : 46, Kuliyapitiya Road', 'Shanika Motor House', 0, ' 15.07.2013 ', '-', 1),
(372, '741R0006', 9, 19, 'Risiki Auto Service', 1, 1, 'Puttalam Road, Pellandeniya', 'Risiki Auto Service', 0, ' 09.04.2012 ', '-', 1),
(373, '741D0002', 9, 19, 'Daminda Motors & Tyre Center', 1, 1, 'Dambulla Road', 'Daminda Motors & Tyre Center', 0, ' 19.06.2013 ', '-', 1),
(374, '741L0004', 9, 19, 'Lanka Auto Service', 1, 1, 'Rideegama Road,Hunugal Kadulla', 'Lanka Auto Service', 0, ' 04.05.2012 ', '-', 1),
(375, '741E0001', 9, 19, 'Emeral Auto Service', 1, 1, '', 'Emeral Auto Service', 0, ' 29.01.2013 ', '-', 1),
(376, '741T0002', 9, 19, 'New Three Star Auto Service', 1, 1, 'No : 96, Keppetigala Road', 'New Three Star Auto Service', 0, ' 25.05.2012 ', '-', 1),
(377, '741K0004', 9, 19, 'Kalyani Motors', 1, 1, 'No : 91, KURUNEGALA ROAD,\n', 'Kalyani Motors', 0, ' 05.04.2011 ', '-', 1),
(378, '741S0030', 9, 19, 'Sasik Service Centre', 1, 1, 'Puttalam Road, Bambaragammana', 'Sasik Service Centre', 0, ' 25.11.2013 ', '-', 1),
(379, '741S0022', 9, 19, 'S. A. Silva & Sons Lanka (pvt) Ltd', 1, 1, 'Loluwagoda Mills', 'S. A. Silva & Sons Lanka (pvt) Ltd', 0, ' 19.06.2013 ', '-', 1),
(380, '741G0002', 9, 19, 'Gunathilaka Motors', 1, 1, 'Kurunegala Road, Hiripokuna', 'Gunathilaka Motors', 0, ' 15.07.2013 ', '-', 1),
(381, '741K0009', 9, 19, 'Costa Motors (Pvt) Ltd', 1, 1, 'No : 105, Chilaw Road,', 'Costa Motors (Pvt) Ltd', 0, ' 13.05.2011 ', '-', 1),
(382, '741R0008', 9, 19, 'Remokiya Lubrica', 1, 1, 'Kandy Road', 'Remokiya Lubrica', 0, ' 18.03.2013 ', '-', 1),
(383, ' 741N0009 ', 9, 19, 'Nishantha Motors', 1, 1, 'Anuradhapura Road, Ullalapola, Daladagama', 'Nishantha Motors', 0, ' 14.09.2012 ', '-', 1),
(384, '741S0014', 9, 19, 'Saliya Traders', 1, 1, 'No : 385, \nMadagalla Road,', 'Saliya Traders', 0, ' 08.08.2011 ', '-', 1),
(385, '741N0014', 9, 19, 'Indika Motors', 1, 1, 'Nakeththa', 'Indika Motors', 0, ' 18.11.2013 ', '-', 1),
(386, '731A0001', 11, 24, 'A M T Transport Services', 1, 1, 'No : 230, Wolfendhal Street', 'A M T Transport Services', 0, ' 05.04.2011 ', '-', 1),
(387, '751T0001', 11, 24, 'Tharnika Motors', 1, 1, 'No : 147, Manipe Road', 'Tharnika Motors', 0, ' 17.06.2011 ', '-', 1),
(388, '751K0001', 11, 24, 'Kugan Motor Stores', 1, 1, 'No : 52, 2nd Cross Street,', 'Kugan Motor Stores', 0, ' 05.04.2011 ', '-', 1),
(389, '751P0001', 11, 24, 'Params Motors', 1, 1, 'No : 113, Kandy Rd,', 'Params Motors', 0, ' 05.08.2011 ', '-', 1),
(390, '751M0001', 11, 24, 'Mannar Motor Spare Parts  & Hardware', 1, 1, 'No : 47, Convent Road', 'Mannar Motor Spare Parts  & Hardware', 0, ' 19.06.2013 ', '-', 1),
(391, '751R0002', 11, 24, 'Ram Motors', 1, 1, 'No : 59/B, Soosoipillayarkulam Road', 'Ram Motors', 0, ' 19.06.2013 ', '-', 1),
(392, '751P0002', 11, 24, 'P S Service Station', 1, 1, 'No : 257/1, Stanley Road,', 'P S Service Station', 0, ' 03.11.2011 ', '-', 1),
(393, '751S0003', 11, 24, 'Sai Ram Motors', 1, 1, 'No : 22, K K S Road\nMuruthanarmadam', 'Sai Ram Motors', 0, ' 14.09.2011 ', '-', 1),
(394, '751S0006', 11, 24, 'Sampath Motors Vavuniya (pvt) Limited', 1, 1, 'Mundiruppu, A9 Road', 'Sampath Motors Vavuniya (pvt) Limited', 0, ' 15.07.2013 ', '-', 1),
(395, '751R0001', 11, 24, 'Raj Motors', 1, 1, '4th Division', 'Raj Motors', 0, ' 14.02.2012 ', '-', 1),
(396, '751N0001', 11, 24, 'Nagarajeswari Motors', 1, 1, 'No : 797, K K S Road', 'Nagarajeswari Motors', 0, ' 29.06.2012 ', '-', 1),
(397, '761S0001', 13, 30, 'Seedevi Motors', 1, 1, 'No : 561/18, SENANAYAKE STREET', 'Seedevi Motors', 0, ' 07.04.2011 ', '-', 1),
(398, '761D0001', 13, 30, 'Deepthi Motors', 1, 1, 'No : 109B /334, MAIN STREET, \nNEW TOWN', 'Deepthi Motors', 0, ' 05.04.2011 ', '-', 1),
(399, '761K0004', 13, 30, 'Kundasale Auto Service (Pvt) Ltd', 1, 1, 'No : 132, Maradankulama,', 'Kundasale Auto Service (Pvt) Ltd', 0, ' 17.01.2012 ', '-', 1),
(400, '761I0001', 13, 30, 'Indunila Multi Centre', 1, 1, 'Jaffna Road,', 'Indunila Multi Centre', 0, ' 13.05.2011 ', '-', 1),
(401, '761R0002', 13, 30, 'Rajarata Motors', 1, 1, 'No : 123, Main Street,', 'Rajarata Motors', 0, ' 07.04.2011 ', '-', 1),
(402, '761D0006', 13, 30, 'D. D. B. Service Station', 1, 1, 'No : 151, Thalawa Road', 'D. D. B. Service Station', 0, ' 10.10.2012 ', '-', 1),
(403, '761S0003', 13, 30, 'Subasinghe Motor Stores', 1, 1, 'No : 65, Dambulla Rd,', 'Subasinghe Motor Stores', 0, ' 05.04.2011 ', '-', 1),
(404, '761H0001', 13, 30, 'D J H Motors', 1, 1, 'Tabuttegama Road,', 'D J H Motors', 0, ' 05.04.2011 ', '-', 1),
(405, '761S0008', 13, 30, 'Surendra Motor Service & Iron Works', 1, 1, 'Infront Of Lanka Sewa,', 'Surendra Motor Service & Iron Works', 0, ' 14.09.2011 ', '-', 1),
(406, '761J0003', 13, 30, 'Jayabima Service Centre', 1, 1, 'No : 397, Puttalam Road,', 'Jayabima Service Centre', 0, ' 21.06.2011 ', '-', 1),
(407, '761W0010', 13, 30, 'Wickramasinghe Metal Crusher', 1, 1, 'Kelegama Road, Issindessagala', 'Wickramasinghe Metal Crusher', 0, ' 15.08.2013 ', '-', 1),
(408, '761S0006', 13, 30, 'Shan Motors', 1, 1, 'No : 66, Puttalam Road,', 'Shan Motors', 0, ' 13.05.2011 ', '-', 1),
(409, '761N0003', 13, 30, 'National Motors', 1, 1, 'Hospital Road', 'National Motors', 0, ' 15.07.2013 ', '-', 1),
(410, '761W0001', 13, 30, 'Wariyapola Motors', 1, 1, 'No : 11, Bandiwewa,', 'Wariyapola Motors', 0, ' 29.04.2011 ', '-', 1),
(411, '761P0007', 13, 30, 'Purasanda Motors', 1, 1, 'No : 49, Colombo Road', 'Purasanda Motors', 0, ' 15.07.2013 ', '-', 1),
(412, '761D0009', 13, 30, 'Sripali Construction', 1, 1, 'Sripali, Anuradhapura Road', 'Sripali Construction', 0, ' 15.07.2013 ', '-', 1),
(413, '761S0012', 13, 30, 'K. B. Super Service Station', 1, 1, 'Thalawa Road', 'K. B. Super Service Station', 0, ' 17.10.2012 ', '-', 1),
(414, '761S0014', 13, 30, 'Sajith Auto Service & Group', 1, 1, 'Trincomale Road,', 'Sajith Auto Service & Group', 0, ' 19.06.2013 ', '-', 1),
(415, '761S0007', 13, 30, 'Sampath Motors', 1, 1, 'No : 334/109 C1, \nMain Street,', 'Sampath Motors', 0, ' 21.06.2011 ', '-', 1),
(416, '761A0002', 13, 30, 'A V P Motors', 1, 1, 'Mihinthale Road,', 'A V P Motors', 0, ' 17.01.2012 ', '-', 1),
(417, '761K0006', 13, 30, 'Keethani Enineers', 1, 1, 'Horowpathana Road', 'Keethani Enineers', 0, ' 10.10.2012 ', '-', 1),
(418, '761W0002', 13, 30, 'Wijesinghe Motor Stores', 1, 1, 'Horowpathana Road', 'Wijesinghe Motor Stores', 0, ' 17.01.2012 ', '-', 1),
(419, '761C0002', 13, 30, 'New Central Auto Service', 1, 1, 'No : 50/7, Dambulla Road,', 'New Central Auto Service', 0, ' 13.05.2011 ', '-', 1),
(420, '761A0001', 13, 30, 'Anura Motors', 1, 1, 'Engineering Works, \nBank Side', 'Anura Motors', 0, ' 17.01.2012 ', '-', 1),
(421, '761R0003', 13, 30, 'Rukmal Motors', 1, 1, 'No : 562/A1, \nJayanthi Mawatha', 'Rukmal Motors', 0, ' 20.06.2011 ', '-', 1),
(422, '761A0003', 13, 30, 'Auto Lanka Service Station', 1, 1, 'Reasthouse Road', 'Auto Lanka Service Station', 0, ' 10.10.2012 ', '-', 1),
(423, '761O0006', 13, 30, 'Calmart Service & Cleanpark (pvt) Ltd.', 1, 1, 'No : 09, Jayanthi Mw', 'Calmart Service & Cleanpark (pvt) Ltd.', 0, ' 19.06.2013 ', '-', 1),
(424, '761P0006', 13, 30, 'Pandulagama Super Service', 1, 1, 'No : 56/1 A', 'Pandulagama Super Service', 0, ' 15.07.2013 ', '-', 1),
(425, '761R0004', 13, 30, 'Rakum Engineering', 1, 1, '17Th Mile Post, Eliya Diwulwewa, ', 'Rakum Engineering', 0, ' 09.04.2012 ', '-', 1),
(426, '761S0005', 13, 30, 'Sisira Motors', 1, 1, 'Niwaththakachethiya Road', 'Sisira Motors', 0, ' 13.05.2011 ', '-', 1),
(427, '761M0005', 13, 30, 'Minimuthu Motor Traders', 1, 1, 'Kahatagasdigiliya Road', 'Minimuthu Motor Traders', 0, ' 09.04.2012 ', '-', 1),
(428, '761W0009', 13, 30, 'Wijeratne Garage', 1, 1, 'New Town', 'Wijeratne Garage', 0, ' 15.07.2013 ', '-', 1),
(429, '761P0003', 13, 30, 'P S Piyathilake And Sons (Pvt) Ltd', 1, 1, 'New Bus Stand,', 'P S Piyathilake And Sons (Pvt) Ltd', 0, ' 21.06.2011 ', '-', 1),
(430, '761W0008', 13, 30, 'Wasana Service Centre', 1, 1, 'No : 1720, Padavi', 'Wasana Service Centre', 0, ' 15.07.2013 ', '-', 1),
(431, '761P0002', 13, 30, 'Princes Motor Traders', 1, 1, 'No : 561/4, \nMaithripala Senanayake Mw,', 'Princes Motor Traders', 0, ' 07.04.2011 ', '-', 1),
(432, '761D0004', 13, 30, 'Dhanidu Motors', 1, 1, 'No : 07, Anuradhapura Road,', 'Dhanidu Motors', 0, ' 17.01.2012 ', '-', 1),
(433, '761K0003', 13, 30, 'Kosala Service Centre', 1, 1, 'No : 562/M/7, Udaya Road,', 'Kosala Service Centre', 0, ' 13.05.2011 ', '-', 1),
(434, '761M0003', 13, 29, 'Manjula Motors', 1, 1, 'Batticaloa Road,', 'Manjula Motors', 0, ' 21.06.2011 ', '-', 1),
(435, '762K0002', 13, 29, 'Keerthi Trade Centre & Fuel Mart', 1, 1, 'No : 61, 4th Mail Post, \nChina Bay Road, ', 'Keerthi Trade Centre & Fuel Mart', 0, ' 05.04.2011 ', '-', 1),
(436, '761L0001', 13, 29, 'Lakna Tractors & Motor Stores', 1, 1, 'No : 918, Saw Mill Junction, ', 'Lakna Tractors & Motor Stores', 0, ' 05.04.2011 ', '-', 1),
(437, '761L0006', 13, 29, 'Lakbima Rice Mills (Pvt) Ltd', 1, 1, 'No : 796, Hathamuna Road', 'Lakbima Rice Mills (Pvt) Ltd', 0, ' 04.04.2013 ', '-', 1),
(438, '761R0001', 13, 29, 'Ransiri Auto Service', 1, 1, 'No : 24, bandiwewa,', 'Ransiri Auto Service', 0, ' 07.04.2011 ', '-', 1),
(439, '761W0005', 13, 29, 'Wijaya Motors', 1, 1, 'Batticaloa Road, Gallalle', 'Wijaya Motors', 0, ' 04.04.2013 ', '-', 1),
(440, '762U0001', 13, 29, 'Upul Motors', 1, 1, 'No : 05th, Mile Post, \nKandy Road,', 'Upul Motors', 0, ' 21.06.2011 ', '-', 1),
(441, '761N0001', 13, 29, 'New Rathna Rice (Pvt) Ltd', 1, 1, 'Abayapura, \nPulasthigama', 'New Rathna Rice (Pvt) Ltd', 0, ' 07.04.2011 ', '-', 1),
(442, '762H0001', 13, 29, 'Mr A S A Hameed ', 1, 1, 'No : 333, \nKandy Road', 'Mr A S A Hameed ', 0, ' 14.02.2012 ', '-', 1),
(443, '761V0001', 13, 29, 'Viskam Service Station - Mr D L G Thilakarath', 1, 1, ' \n28Th Mile Post,', 'Viskam Service Station - Mr D L G Thilakarath', 0, ' 06.04.2011 ', '-', 1),
(444, '761L0007', 13, 29, 'Laalani Motors', 1, 1, '10Th Mile Post', 'Laalani Motors', 0, ' 17.05.2013 ', '-', 1),
(445, '761L0004', 13, 29, 'L & L Motor Spares', 1, 1, 'No : 36, Central Street', 'L & L Motor Spares', 0, ' 13.05.2011 ', '-', 1),
(446, '761L0005', 13, 29, 'Lathif Corporation', 1, 1, 'MAIN STREET,\n', 'Lathif Corporation', 0, ' 13.05.2011 ', '-', 1),
(447, '761S0011', 13, 29, 'S T S Ahamed & Sons Service', 1, 1, 'Main Street', 'S T S Ahamed & Sons Service', 0, ' 14.02.2012 ', '-', 1),
(448, '762C0001', 13, 29, 'Chandrika Tyre Center', 1, 1, 'No : 157, Trincomalee Rd', 'Chandrika Tyre Center', 0, ' 10.10.2012 ', '-', 1),
(449, '762K0001', 13, 29, 'Kalpana Service Station', 1, 1, 'Trinco Road,', 'Kalpana Service Station', 0, ' 05.04.2011 ', '-', 1),
(450, '761B0001', 13, 29, 'Binara Auto Service', 1, 1, 'No : 40/1, Palugasdamana,', 'Binara Auto Service', 0, ' 13.05.2011 ', '-', 1),
(451, '761W0007', 13, 29, 'Wickrama Fuel Center And Service Center', 1, 1, 'No : 01, Siripura', 'Wickrama Fuel Center And Service Center', 0, ' 19.06.2013 ', '-', 1),
(452, '761J0004', 13, 29, 'Jayalath Motors', 1, 1, 'D S Senanayake Street,', 'Jayalath Motors', 0, ' 21.06.2011 ', '-', 1),
(453, '761D0005', 13, 29, 'Darshana Super Motors', 1, 1, 'School Junction', 'Darshana Super Motors', 0, ' 10.10.2012 ', '-', 1),
(454, '761U0004', 13, 29, 'Upali Motors & Engineers', 1, 1, 'No : 03, Polonnaruwa Road', 'Upali Motors & Engineers', 0, ' 19.06.2013 ', '-', 1),
(455, '761S0002', 13, 29, 'S S R Oil Mart', 1, 1, 'Anuradhapura Road,', 'S S R Oil Mart', 0, ' 07.04.2011 ', '-', 1),
(456, '762J0001', 13, 29, 'Jayatissa Motors', 1, 1, 'No : 147, Trinco Road,', 'Jayatissa Motors', 0, ' 13.05.2011 ', '-', 1),
(457, '761K0005', 13, 29, 'Kaluarachchi Service', 1, 1, '', 'Kaluarachchi Service', 0, ' 14.02.2012 ', '-', 1),
(458, '771W0001', 15, 33, 'Weligama Motors', 1, 1, 'Weligama Motors, No : C62, \nD S Senanayake St', 'Weligama Motors', 0, ' 05.04.201 ', '-', 1),
(459, '771P0001', 15, 33, 'Pathinayake Motors', 1, 1, 'No : 141, \nWellawaya Road, ', 'Pathinayake Motors', 0, ' 07.04.2011 ', '-', 1),
(460, '771S0001', 15, 33, 'Sithmina Motors', 1, 1, 'Pothuvil  Road,', 'Sithmina Motors', 0, ' 07.04.2011 ', '-', 1),
(461, '771V0002', 15, 33, 'Victoriya Motors', 1, 1, 'No : C 570/1, Kalmunai Road,', 'Victoriya Motors', 0, ' 12.09.2011 ', '-', 1),
(462, '771A0002', 15, 33, 'Asiri Motors', 1, 1, 'No : 612B, Uhana Road,', 'Asiri Motors', 0, ' 05.04.2012 ', '-', 1),
(463, '771W0005', 15, 33, 'Wijayamali Motors - Wijayadoru Amal Indu Shan', 1, 1, 'No : 06, Opposite Cort Complex, New Town', 'Wijayamali Motors - Wijayadoru Amal Indu Shan', 0, '', '-', 1),
(464, '771J0001', 15, 33, 'Jayalanka Motor Stores', 1, 1, 'Ella Road,', 'Jayalanka Motor Stores', 0, ' 25.05.2011 ', '-', 1),
(465, '771J0003', 15, 33, 'Jayanthi Metal Quarry & Crusher', 1, 1, 'Kalmunai Road, 12Th Mile Post', 'Jayanthi Metal Quarry & Crusher', 0, ' 21.02.2013 ', '-', 1),
(466, '771S0003', 15, 33, 'Samagi Auto Service', 1, 1, 'Badulla Road,', 'Samagi Auto Service', 0, ' 14.02.2012 ', '-', 1),
(467, '771N0001', 15, 33, 'Nandasena Motors', 1, 1, 'No : 15, 04Th Lane,', 'Nandasena Motors', 0, ' 20.06.2011 ', '-', 1),
(468, '771W0002', 15, 33, 'W A S Service Auto Centre', 1, 1, 'No : 48, Ella Road,', 'W A S Service Auto Centre', 0, ' 29.04.2011 ', '-', 1),
(469, '771A0001', 15, 33, 'Asiri Service Station', 1, 1, 'No : 08, Pothuvil Road,', 'Asiri Service Station', 0, ' 05.04.2011 ', '-', 1),
(470, '771S0005', 15, 33, 'Suresh Service Center', 1, 1, 'Holike Road', 'Suresh Service Center', 0, ' 09.04.2012 ', '-', 1),
(471, '771N0003', 15, 33, 'New Rathna Motor Stores', 1, 1, 'F23, New Town', 'New Rathna Motor Stores', 0, ' 20.08.2012 ', '-', 1),
(472, '771W0004', 15, 33, 'Weerasinghe Motors', 1, 1, '', 'Weerasinghe Motors', 0, ' 09.04.2012 ', '-', 1),
(473, '771T0002', 15, 33, 'Tharindu Motors', 1, 1, 'No : 790A, Kalmunai Road,', 'Tharindu Motors', 0, ' 29.08.2011 ', '-', 1),
(474, '771U0001', 15, 33, 'Udara Motors', 1, 1, 'Kandy Road, Gonagolla', 'Udara Motors', 0, '06.04.2011', '-', 1),
(475, '771I0002', 15, 33, 'Isal Motor Traders', 1, 1, 'No : 01, \nNew Shopping Complex,', 'Isal Motor Traders', 0, ' 24.08.2011 ', '-', 1),
(476, '771T0003', 15, 33, 'Tishan Motors', 1, 1, 'No : 08 Hospital Road', 'Tishan Motors', 0, ' 29.08.2011 ', '-', 1),
(477, '771B0003', 15, 33, 'Buttala Motors', 1, 1, 'No : 200-202, Main Street,', 'Buttala Motors', 0, ' 16.02.2012 ', '-', 1),
(478, '771R0005', 15, 33, 'New Rathna Motor Enterprices', 1, 1, 'Hettipola', 'New Rathna Motor Enterprices', 0, ' 21.01.2013 ', '-', 1),
(479, '771A0005', 15, 33, 'Ariyapala Motors', 1, 1, 'Main Street,', 'Ariyapala Motors', 0, ' 28.09.2011 ', '-', 1),
(480, '771V0003', 15, 33, 'Vimukthi Motors', 1, 1, 'Ampara Junction,', 'Vimukthi Motors', 0, ' 23.11.2011 ', '-', 1),
(481, '771T0004', 15, 33, 'Thanamalwila Motors', 1, 1, 'Wllavaya Road', 'Thanamalwila Motors', 0, '13.03.2012', '-', 1),
(482, '771U0002', 15, 33, 'Union Motors', 1, 1, 'Monaragala Road,', 'Union Motors', 0, ' 17.10.2011 ', '-', 1),
(483, '771M0002', 15, 33, 'Marshal Auto Service', 1, 1, 'Marshal Garage, D. S. Senanayake Street', 'Marshal Auto Service', 0, '13.03.2012', '-', 1),
(484, '771T0001', 15, 33, 'Thaya Motor Stores', 1, 1, 'No : 278, TRINCO ROAD,', 'Thaya Motor Stores', 0, ' 05.04.2011 ', '-', 1),
(485, '771C0001', 15, 33, 'City Motors', 1, 1, 'Main Street,', 'City Motors', 0, ' 05.04.2011 ', '-', 1),
(486, '771A0007', 15, 33, 'A. K. Enterprises', 1, 1, 'No : 287, Batticaloa Road', 'A. K. Enterprises', 0, ' 20.02.2013 ', '-', 1),
(487, '771S0006', 15, 33, 'Sasis Motor Stores', 1, 1, 'No : 30, Bar Road', 'Sasis Motor Stores', 0, ' 19.11.2012 ', '-', 1),
(488, '771A0004', 15, 33, 'Ashik Motors', 1, 1, 'Main Street, \nMavadichenai', 'Ashik Motors', 0, ' 29.08.2011 ', '-', 1),
(489, '771M0005', 15, 33, 'M. J. Motors          ', 1, 1, 'Main Street', 'M. J. Motors          ', 0, ' 10.05.2012 ', '-', 1),
(490, '771A0003', 15, 33, 'Ahila Hardware', 1, 1, 'No : 16, Station Road,', 'Ahila Hardware', 0, ' 05.04.2011 ', '-', 1),
(491, '771R0001', 15, 33, 'Ramakrishna Motor Stores', 1, 1, 'No : 174, Trinco Road,', 'Ramakrishna Motor Stores', 0, ' 07.04.2011 ', '-', 1),
(492, '771K0001', 15, 33, 'K. F. Motors         ', 1, 1, 'No : 41, Ampara Road', 'K. F. Motors         ', 0, ' 10.05.2012 ', '-', 1),
(493, '771M0003', 15, 33, 'Mamco Service Station', 1, 1, 'Main Street, Arayanpathy-02 ', 'Mamco Service Station', 0, ' 04.05.2012 ', '-', 1),
(494, '771A0006', 15, 33, 'Al-Raiz Service Center', 1, 1, 'No : 01, Railway Station Road', 'Al-Raiz Service Center', 0, '13.03.2012', '-', 1),
(495, '771S0002', 15, 33, 'S S H Motors', 1, 1, 'No : 22, Public Market, \nAmpara Road,', 'S S H Motors', 0, ' 29.08.2011 ', '-', 1),
(496, '771J0002', 15, 33, 'J T Motors', 1, 1, 'No : 63, Main Street,', 'J T Motors', 0, ' 14.02.2012 ', '-', 1),
(497, '771E0001', 15, 33, 'New Ancheneya Timber Depot', 1, 1, 'No : 8, \nPiioneer Road,', 'New Ancheneya Timber Depot', 0, ' 05.04.2011 ', '-', 1),
(498, '771B0001', 15, 33, 'New Batticaloa Motors', 1, 1, 'No : 22, Station Road,', 'New Batticaloa Motors', 0, ' 05.04.2011 ', '-', 1),
(499, '771M0006', 15, 33, 'Maha Service Station', 1, 1, 'No : 609, Trinco Road', 'Maha Service Station', 0, ' 19.06.2013 ', '-', 1),
(500, '771R0002', 15, 33, 'Regal Motors', 1, 1, 'No : 114, New Bazar, \nMain Street,', 'Regal Motors', 0, ' 23.11.2011 ', '-', 1),
(501, '771T0005', 15, 33, 'Thilaka Filling Station', 1, 1, 'No : 183, Batticaloa Rd', 'Thilaka Filling Station', 0, ' 26.06.2012 ', '-', 1),
(502, '771P0002', 15, 33, 'Power Point Service Station', 1, 1, 'NO : 402 Main Street', 'Power Point Service Station', 0, ' 20.06.2011 ', '-', 1),
(503, '771V0001', 15, 33, 'Vijay Construction & Company', 1, 1, 'Paddiruppu,', 'Vijay Construction & Company', 0, ' 06.04.2011 ', '-', 1),
(504, '771I0001', 15, 33, 'Imana Service Centre', 1, 1, 'Main Street,', 'Imana Service Centre', 0, ' 20.06.2011 ', '-', 1),
(505, '771M0001', 15, 33, 'M K A Ahamed Mohideen (Pvt) Ltd', 1, 1, 'Spare Parts Division, \nMain Street, \nMavadich', 'M K A Ahamed Mohideen (Pvt) Ltd', 0, ' 11.01.2011 ', '-', 1),
(506, '771R0003', 15, 33, 'Royal Motors', 1, 1, 'Trinco Road', 'Royal Motors', 0, ' 13.03.2012 ', '-', 1),
(507, '771M0004', 15, 33, 'Al Mass Marketting      ', 1, 1, 'Market Road', 'Al Mass Marketting      ', 0, ' 10.05.2012 ', '-', 1),
(508, '771L0001', 15, 33, 'Lloyds Engineering Works', 1, 1, 'Main Street ', 'Lloyds Engineering Works', 0, ' 13.03.2012 ', '-', 1),
(509, '771W0003', 15, 33, 'Wijaya Motor Stores', 1, 1, 'Main Street', 'Wijaya Motor Stores', 0, ' 14.02.2012 ', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealer_deliver_order`
--

CREATE TABLE IF NOT EXISTS `tbl_dealer_deliver_order` (
  `deliver_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `accepted_date` varchar(45) DEFAULT NULL,
  `accepted_time` varchar(45) DEFAULT NULL,
  `accepted_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`deliver_order_id`),
  KEY `p_o_id_idx` (`purchase_order_id`),
  KEY `uid_idx` (`accepted_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_dealer_deliver_order`
--

INSERT INTO `tbl_dealer_deliver_order` (`deliver_order_id`, `purchase_order_id`, `total_amount`, `accepted_date`, `accepted_time`, `accepted_by`, `status`) VALUES
(1, 1, 1870, '2014:03:18', '08:18:07', 1, 1),
(2, 1, 1870, '2014:03:18', '08:22:23', 1, 1),
(3, 2, 1728, '2014:03:18', '08:29:04', 1, 1),
(4, 3, 1112, '2014:03:18', '17:40:28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealer_purchase_order`
--

CREATE TABLE IF NOT EXISTS `tbl_dealer_purchase_order` (
  `purchase_order_id` int(45) NOT NULL AUTO_INCREMENT,
  `dealer_purchase_order_id` int(11) NOT NULL,
  `purchase_order_number` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `complete` int(11) DEFAULT NULL,
  `lastupdatedate` varchar(45) DEFAULT NULL,
  `accepttodatabasetime` varchar(45) DEFAULT NULL,
  `accepttodatabasedate` int(11) DEFAULT NULL,
  `accepted_to_db` int(11) DEFAULT NULL,
  `dealer_id` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `sales_officer_id` int(11) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `battery` int(11) DEFAULT NULL,
  `total_discount` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`purchase_order_id`),
  KEY `d_id_idx` (`dealer_id`),
  KEY `fk_so_id_idx` (`sales_officer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_dealer_purchase_order`
--

INSERT INTO `tbl_dealer_purchase_order` (`purchase_order_id`, `dealer_purchase_order_id`, `purchase_order_number`, `date`, `time`, `complete`, `lastupdatedate`, `accepttodatabasetime`, `accepttodatabasedate`, `accepted_to_db`, `dealer_id`, `amount`, `sales_officer_id`, `lat`, `lon`, `battery`, `total_discount`, `status`) VALUES
(1, 1, 'P00001', '2014-03-18', '12:47:48', 1, NULL, NULL, NULL, NULL, 1, 1870, NULL, NULL, NULL, NULL, NULL, 1),
(2, 2, 'P00002', '2014-03-18', '12:57:51', 1, NULL, NULL, NULL, NULL, 1, 1728, NULL, NULL, NULL, NULL, NULL, 1),
(3, 3, 'P00003', '2014-03-18', '22:06:04', 1, NULL, NULL, NULL, NULL, 1, 1112, NULL, NULL, NULL, NULL, NULL, 1),
(4, 4, 'P00004', '2014-03-18', '22:33:12', 0, NULL, NULL, NULL, NULL, 197, 15049.5, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealer_purchase_order_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_dealer_purchase_order_detail` (
  `purchase_order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) DEFAULT NULL,
  `item_qty` double DEFAULT NULL,
  `accepted_qty` double DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`purchase_order_detail_id`),
  KEY `d_po_id` (`purchase_order_id`),
  KEY `fk_item_id_idx` (`item_id`),
  KEY `item_id` (`item_id`),
  KEY `item_id_fk` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_dealer_purchase_order_detail`
--

INSERT INTO `tbl_dealer_purchase_order_detail` (`purchase_order_detail_id`, `purchase_order_id`, `item_id`, `item_qty`, `accepted_qty`, `unit_price`, `discount_type`, `discount`, `status`) VALUES
(1, 1, 14, 20, 20, 23.5, NULL, NULL, 1),
(2, 1, 26, 20, 20, 35.5, NULL, NULL, 1),
(3, 1, 25, 20, 20, 34.5, NULL, NULL, 1),
(4, 2, 1, 20, 20, 10.5, NULL, NULL, 1),
(5, 2, 2, 20, 20, 11.5, NULL, NULL, 1),
(6, 2, 3, 20, 20, 12.5, NULL, NULL, 1),
(7, 2, 4, 15, 15, 13.5, NULL, NULL, 1),
(8, 2, 5, 20, 20, 14.5, NULL, NULL, 1),
(9, 2, 17, 12, 12, 26.5, NULL, NULL, 1),
(10, 2, 36, 5, 5, 45.5, NULL, NULL, 1),
(11, 3, 17, 10, 10, 26.5, NULL, NULL, 1),
(12, 3, 23, 10, 10, 32.5, NULL, NULL, 1),
(13, 3, 34, 12, 12, 43.5, NULL, NULL, 1),
(14, 4, 13, 10, 10, 22.5, NULL, NULL, 1),
(15, 4, 32, 23, 23, 41.5, NULL, NULL, 1),
(16, 4, 59, 10, 10, 1324, NULL, NULL, 1),
(17, 4, 43, 12, 12, 52.5, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealer_return`
--

CREATE TABLE IF NOT EXISTS `tbl_dealer_return` (
  `dealer_return_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(45) DEFAULT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `submitted_date` varchar(45) DEFAULT NULL,
  `submitted_time` varchar(45) DEFAULT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `user_admin` varchar(100) DEFAULT NULL,
  `complete_status` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`dealer_return_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_dealer_return`
--

INSERT INTO `tbl_dealer_return` (`dealer_return_id`, `invoice_no`, `purchase_order_id`, `submitted_date`, `submitted_time`, `dealer_id`, `user_admin`, `complete_status`, `status`) VALUES
(1, '1002', 1, '2014-02-16', '13:18:23', 1, NULL, NULL, 1),
(2, '1001', 1, '2014-02-17', '00:47:20', 1, NULL, NULL, 1),
(3, '114', 1, '2014-03-01', '15:48:41', 1, NULL, NULL, 1),
(4, '56568', 2, '2014-03-03', '14:51:14', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealer_return_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_dealer_return_detail` (
  `dealer_return_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `dealer_return_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `return_qty` double DEFAULT NULL,
  `dealer_return_reason` varchar(5000) DEFAULT NULL,
  `delivered` varchar(45) DEFAULT NULL,
  `admin_return_status` int(11) DEFAULT NULL,
  `admin_comment` varchar(5000) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`dealer_return_detail_id`),
  KEY `fk_dealer_return_id_idx` (`dealer_return_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_dealer_return_detail`
--

INSERT INTO `tbl_dealer_return_detail` (`dealer_return_detail_id`, `dealer_return_id`, `item_id`, `return_qty`, `dealer_return_reason`, `delivered`, `admin_return_status`, `admin_comment`, `status`) VALUES
(1, 1, 14, 5, '', 'delivered', NULL, NULL, 1),
(2, 1, 16, 20, '', 'not delvered', NULL, NULL, 1),
(3, 2, 28, 20, '', 'not delvered', NULL, NULL, 1),
(4, 3, 16, 15, 'not recived', 'not delvered', NULL, NULL, 1),
(5, 4, 5, 5, '5465', 'delivered', NULL, NULL, 1);

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
-- Table structure for table `tbl_delar_debt`
--

CREATE TABLE IF NOT EXISTS `tbl_delar_debt` (
  `delar_debt_id` int(11) NOT NULL AUTO_INCREMENT,
  `delar_payment_id` int(11) DEFAULT NULL,
  `debt_amount` double DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `debt_end_date` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`delar_debt_id`),
  KEY `dpid_idx` (`delar_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delar_debt_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_delar_debt_payment` (
  `delar_debt_payment_id` int(11) NOT NULL,
  `dealer_debt_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`delar_debt_payment_id`),
  KEY `debtid_idx` (`dealer_debt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delar_deliver_order_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_delar_deliver_order_detail` (
  `deliver_order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `deliver_order_id` int(11) DEFAULT NULL,
  `part_id` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`deliver_order_detail_id`),
  KEY `d_o_id_idx` (`deliver_order_id`),
  KEY `p_id_idx` (`part_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_delar_deliver_order_detail`
--

INSERT INTO `tbl_delar_deliver_order_detail` (`deliver_order_detail_id`, `deliver_order_id`, `part_id`, `unit_price`, `quantity`, `status`) VALUES
(1, 1, 14, 23.5, 20, 1),
(2, 1, 26, 35.5, 20, 1),
(3, 1, 25, 34.5, 20, 1),
(4, 2, 14, 23.5, 20, 1),
(5, 2, 26, 35.5, 20, 1),
(6, 2, 25, 34.5, 20, 1),
(7, 3, 1, 10.5, 20, 1),
(8, 3, 2, 11.5, 20, 1),
(9, 3, 3, 12.5, 20, 1),
(10, 3, 4, 13.5, 15, 1),
(11, 3, 5, 14.5, 20, 1),
(12, 3, 17, 26.5, 12, 1),
(13, 3, 36, 45.5, 5, 1),
(14, 4, 17, 26.5, 10, 1),
(15, 4, 23, 32.5, 10, 1),
(16, 4, 34, 43.5, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delar_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_delar_payment` (
  `delar_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `delar_deliver_order_id` int(11) DEFAULT NULL,
  `payed_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `delar_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`delar_payment_id`),
  KEY `fk_tbl_delar_payment_d_d_o_id` (`delar_deliver_order_id`),
  KEY `delar_id_idx` (`delar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_delar_payment`
--

INSERT INTO `tbl_delar_payment` (`delar_payment_id`, `delar_deliver_order_id`, `payed_amount`, `date`, `time`, `status`, `delar_id`) VALUES
(5, 1, 4500, '2013-12-29', '21:44:25', 1, 1),
(30, 1, 4500, '2013-12-29', '23:33:00', 1, 1),
(31, 1, 4500, '2013-12-29', '23:33:37', 1, 1),
(32, 15, 834.5, '2014-03-10', '06:49:56', 1, 1),
(33, 1, 834.5, '2014-03-10', '06:51:55', 1, 1),
(34, 2, 709, '2014-03-10', '06:52:49', 1, 1),
(35, 3, 709, '2014-03-11', '05:40:09', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_de_codes`
--

CREATE TABLE IF NOT EXISTS `tbl_de_codes` (
  `idtbl_de_codes` int(11) NOT NULL AUTO_INCREMENT,
  `symbol` varchar(45) DEFAULT NULL,
  `sales_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbl_de_codes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_de_codes`
--

INSERT INTO `tbl_de_codes` (`idtbl_de_codes`, `symbol`, `sales_type`) VALUES
(1, 'A', 'Counter Sales'),
(2, 'B', 'WS'),
(3, 'C', 'Counter Sales'),
(4, 'E', 'Counter Sales'),
(5, 'Z', 'Unit Repair'),
(6, 'I', 'PDI'),
(7, 'J', 'Parts Stock Adjestment'),
(8, 'M', 'Kandy Dealer Sales'),
(9, 'N', 'Matar Dealer Sales'),
(10, 'O', 'Colombo Dealer Sales'),
(11, 'P', 'Kurunegala Dealer Sales'),
(12, 'Q', 'Jaffna Dealer Sales'),
(13, 'R', 'Anuradhapura Dealer Sales'),
(14, 'S', 'Ampara Dealer Sales'),
(15, 'U', 'Kuruwita Dealer Sales');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE IF NOT EXISTS `tbl_district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(100) NOT NULL,
  `district_code` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`, `district_code`, `status`) VALUES
(1, 'Colombo', 'CO', 1),
(2, 'Gampaha', 'GQ', 1),
(3, 'Kalutara', 'KT', 1),
(4, 'Kandy', 'KY', 1),
(5, 'Matale', 'MT', 1),
(6, 'Nuwaraeliya', 'NW', 1),
(7, 'Batticaloa', 'BC', 1),
(8, 'Trincomalee', 'TC', 1),
(9, 'Ampara', 'APR', 1),
(10, 'Jaffna', 'JA', 1),
(11, 'Mannar', 'MB', 1),
(12, 'Mullaitivu', 'MP', 1),
(13, 'Vavuniya', 'VA', 1),
(14, 'Anuradhapura', 'AD', 1),
(15, 'Polonnaruwa', 'PR', 1),
(16, 'Kurunegala', 'KG', 1),
(17, 'Puttalam', 'PX', 1),
(18, 'Ratnapura', 'RN', 1),
(19, 'Kegalle', 'KE', 1),
(20, 'Galle', 'GL', 1),
(21, 'Matara', 'MH', 1),
(22, 'Hambantota', 'HB', 1),
(23, 'Badulla', 'BD', 1),
(24, 'Monaragala', 'MJ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_e_cat_def`
--

CREATE TABLE IF NOT EXISTS `tbl_e_cat_def` (
  `e_cat_def_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_cat_name` varchar(100) DEFAULT NULL,
  `e_cat_desc` varchar(45) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`e_cat_def_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_e_cat_def`
--

INSERT INTO `tbl_e_cat_def` (`e_cat_def_id`, `e_cat_name`, `e_cat_desc`, `added_date`, `added_time`, `status`) VALUES
(1, 'GEARBOX', NULL, '2013-12-20', NULL, 1),
(2, 'FUEL SYSTEM', NULL, '2013-12-20', NULL, 1),
(3, 'FRONT AXLE', NULL, '2013-12-20', NULL, 1),
(4, 'ELECTRICALS', NULL, '2013-12-20', NULL, 1),
(5, 'ENGINE', NULL, '2013-12-20', NULL, 1),
(6, 'BODY', NULL, '2013-12-20', NULL, 1),
(7, 'SUSPENSION', NULL, '2013-12-20', NULL, 1),
(8, 'BRAKES', NULL, '2013-12-20', NULL, 1),
(9, 'GEARBOX', NULL, '2013-12-20', NULL, 1),
(10, 'RADIATOR', NULL, '2013-12-20', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_garage`
--

CREATE TABLE IF NOT EXISTS `tbl_garage` (
  `garage_id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_name` varchar(500) NOT NULL,
  `garage_account_no` varchar(45) DEFAULT NULL,
  `garage_code` varchar(45) DEFAULT NULL,
  `garage_address` varchar(1000) DEFAULT NULL,
  `garage_contact_no` varchar(45) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `nearest_tata_dealer` int(11) DEFAULT NULL,
  `remarks` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`garage_id`),
  KEY `fk_added_by_idx` (`added_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_garage_indian_brands`
--

CREATE TABLE IF NOT EXISTS `tbl_garage_indian_brands` (
  `garage_indian_brand_id` int(11) NOT NULL,
  `garage_id` int(11) DEFAULT NULL,
  `indian_brand_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`garage_indian_brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_garage_non_tata_dealers`
--

CREATE TABLE IF NOT EXISTS `tbl_garage_non_tata_dealers` (
  `garage_non_tata_dealers_id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_id` int(11) DEFAULT NULL,
  `dealer_name` varchar(500) DEFAULT NULL,
  `dealer_address` varchar(50) DEFAULT NULL,
  `part_type_id` int(11) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`garage_non_tata_dealers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_garage_non_tgp_brand_details`
--

CREATE TABLE IF NOT EXISTS `tbl_garage_non_tgp_brand_details` (
  `non_tgp_brand_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_id` int(11) DEFAULT NULL,
  `vehicle_brand_id` int(11) DEFAULT NULL,
  `vehicle_repair_type_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`non_tgp_brand_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_garage_tata_models`
--

CREATE TABLE IF NOT EXISTS `tbl_garage_tata_models` (
  `garage_tata_model_id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_id` int(11) DEFAULT NULL,
  `vehicle_model_id` int(11) DEFAULT NULL,
  `vehicle_sub_model_id` int(11) DEFAULT NULL,
  `vehicle_repair_type_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`garage_tata_model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_garage_tgp_dealers`
--

CREATE TABLE IF NOT EXISTS `tbl_garage_tgp_dealers` (
  `garage_tgp_dealer_detail_id` int(11) NOT NULL,
  `garag_id` int(11) DEFAULT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `part_type_id` int(11) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`garage_tgp_dealer_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_garage_vehicle_type`
--

CREATE TABLE IF NOT EXISTS `tbl_garage_vehicle_type` (
  `garage_vehicle_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_id` int(11) DEFAULT NULL,
  `vehicle_type_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`garage_vehicle_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE IF NOT EXISTS `tbl_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_part_no` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT 'N/A',
  `pg_category_from_tml` varchar(45) DEFAULT 'N/A',
  `pg_category_local` varchar(45) DEFAULT 'N/A',
  `pricing_category` varchar(45) DEFAULT 'N/A',
  `product_hiracy` varchar(45) DEFAULT 'N/A',
  `vehicle_segment` varchar(45) DEFAULT 'N/A',
  `vehicle_model_local` varchar(45) DEFAULT 'N/A',
  `aggregate_tml` varchar(45) DEFAULT 'N/A',
  `vehicle_model_tml` varchar(45) DEFAULT 'N/A',
  `remark_tml` varchar(45) DEFAULT 'N/A',
  `aggregate_e_cat_def` varchar(45) DEFAULT 'N/A',
  `other_model` varchar(45) DEFAULT 'N/A',
  `other_definition` varchar(45) DEFAULT 'N/A',
  `product_definition` varchar(45) DEFAULT 'N/A',
  `added_date` varchar(45) DEFAULT 'N/A',
  `added_time` varchar(45) DEFAULT 'N/A',
  `selling_price` double DEFAULT NULL,
  `total_stock_qty` double DEFAULT NULL,
  `amd_vsd` double DEFAULT NULL,
  `avg_monthly_demand` double DEFAULT NULL,
  `avg_cost` double DEFAULT NULL,
  `vat_percentage` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_id_UNIQUE` (`item_id`),
  UNIQUE KEY `item_part_no_UNIQUE` (`item_part_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `item_part_no`, `description`, `pg_category_from_tml`, `pg_category_local`, `pricing_category`, `product_hiracy`, `vehicle_segment`, `vehicle_model_local`, `aggregate_tml`, `vehicle_model_tml`, `remark_tml`, `aggregate_e_cat_def`, `other_model`, `other_definition`, `product_definition`, `added_date`, `added_time`, `selling_price`, `total_stock_qty`, `amd_vsd`, `avg_monthly_demand`, `avg_cost`, `vat_percentage`, `status`) VALUES
(1, 'TE252320123205', 'COLLER SCREW', '#N/A', '#N/A', '#N/A', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 10.5, 0, 0, 0, 0, 2.5, 1),
(2, 'TE266335707101', 'ROIL SEAL RETAINER ,ETR-637', 'PG5', 'PG5', 'CD', 'OIL SEAL HG KIT', 'SCV/LCV', '#N/A', 'Breake Parts', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 11.5, 0, 0, 0, 0, 1.5, 1),
(3, 'TE251926806704', 'PIN', 'PG4', 'PG4', 'CC', 'OTHER GROUP 4 ITEMS', 'LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 12.5, 0, 0, 0, 0, 3, 1),
(4, 'TE265454510131', 'REVERSE-LIGHT SWITCH', '#N/A', '#N/A', 'CD', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 13.5, 0, 0, 0, 0, 2.833333333, 1),
(5, 'TE269968910159', 'ASSY AIR VENT CENTER', '#N/A', '#N/A', 'CF', '#N/A', '#N/A', '#N/A', 'Crankshaft', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 14.5, 0, 0, 0, 0, 3.083333333, 1),
(6, 'TE264042120101', '23.81DIA.WHEEL CYLINDER', 'PG2', 'PG2', 'CD', 'BRAKE & CLUTCH ACTIVATION PARTS', 'SCV/LCV', '#N/A', '', '407', '0', '#N/A', '', '', '', '2/1/2014', '8:50:01', 15.5, 0, 0, 0, 0, 3.333333333, 1),
(7, 'TE257667106339', 'RUBBER MOULD REAR WINDOW', 'PG5', 'PG5', 'CG', 'BODY PARTS', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 16.5, 0, 0, 0, 0, 3.583333333, 1),
(8, 'TE284574300139', 'HANDLE ASSY EXTERIOR REAR DOOR', 'PG5', 'PG5', 'CF', 'BODY PARTS', 'LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 17.5, 0, 0, 0, 0, 3.833333333, 1),
(9, 'TE280826809901', 'GEAR SHIFT LEVER', 'PG4', 'PG4', 'CD', 'GEAR SHIFTING MECHANISM PARTS', 'MHCV', '#N/A', '', '#N/A', '#N/A', 'GEARBOX', '', '', '', '2/1/2014', '8:50:01', 18.5, 0, 0, 0, 0, 4.083333333, 1),
(10, 'TE278603999947', 'VIBRATION DAMPER', 'PG1', 'PG1', 'CD', 'MISC ENGINE ITEMS-CUMMINS', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 19.5, 0, 0, 0, 0, 4.333333333, 1),
(11, 'TE278603990147', 'CRANKSHAFT ASSEMBLY', '#N/A', '#N/A', 'CD', '#N/A', '#N/A', '#N/A', '', '2516| 3118 |3516 | 4018', '6 BT Engine', '#N/A', '', '', '', '2/1/2014', '8:50:01', 20.5, 0, 0, 0, 0, 4.583333333, 1),
(12, 'TE277954200110', 'SPEEDO METER CABLE', '#N/A', '#N/A', 'CD', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 21.5, 0, 0, 0, 0, 4.833333333, 1),
(13, 'TE215341120101', 'ASSY PROP SHARFT REAR', 'PG5', 'PG5', 'CD', 'ASSY PROP SHAFT', 'HCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 22.5, 0, 0, 0, 0, 5.083333333, 1),
(14, 'TE269126800108', 'SUB ASSY BELL CRANK LEVER', 'PG4', 'PG4', 'CD', 'GB600 PARTS', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 23.5, 0, 0, 0, 0, 5.333333333, 1),
(15, 'TE275441110101', 'APSC 1615LPT48 90X3 1255 WITH CENT. BRG.', 'PG5', 'PG5', 'CE', 'PROPELLOR SHAFT', 'HCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 24.5, 0, 0, 0, 0, 5.583333333, 1),
(16, 'TE281847106913', 'SPACER TUBE', 'PG5', 'PG5', 'CD', 'BODY PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', 'FUEL SYSTEM', '', '', '', '2/1/2014', '8:50:01', 25.5, 0, 0, 0, 0, 5.833333333, 1),
(17, 'TE251826208612', 'SPACER (6.9 MM THK)', 'PG4', 'PG4', 'CD', 'OTHER GEAR/AXLE PARTS', 'LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 26.5, 0, 0, 0, 0, 6.083333333, 1),
(18, 'TE251826208626', 'BUTTING RING (5.50 MM THK)', 'PG4', 'PG4', 'CD', 'GB27 PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', 'GEAR BOX', '', '', '', '2/1/2014', '8:50:01', 27.5, 0, 0, 0, 0, 6.333333333, 1),
(19, 'TE250826254201', 'CLAMPING PLATE.', 'PG4', 'PG4', 'CD', 'OTHER GEAR/AXLE PARTS', 'LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 28.5, 0, 0, 0, 0, 6.583333333, 1),
(20, 'TE282933208623', 'SHIM 0.4 THK-SPACER', 'PG5', 'PG5', 'CD', 'FASTNERS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', 'FRONT AXLE', '', '', '', '2/1/2014', '8:50:01', 29.5, 0, 0, 0, 0, 6.833333333, 1),
(21, 'TE282954406309', 'COVER FOR REVERSE LAMP CUTOUT', 'PG3', 'PG3', 'CD', 'ELECTRICALS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', 'ELECTRICALS', '', '', '', '2/1/2014', '8:50:01', 30.5, 0, 0, 0, 0, 7.083333333, 1),
(22, 'TE269126718703', 'COMPRESSION SPRING (REVER', 'PG4', 'PG4', 'CD', 'GB600 PARTS', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 31.5, 0, 0, 0, 0, 7.333333333, 1),
(23, 'TE282933208625', 'SHIM 0.6 THK-SPACER', 'PG5', 'PG5', 'CD', 'FASTNERS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', 'FRONT AXLE', '', '', '', '2/1/2014', '8:50:01', 32.5, 0, 0, 0, 0, 7.583333333, 1),
(24, 'TE279007146902', 'PLUG ( INJECTOR OVER FLOW )', 'PG1', 'PG1', 'CG', 'MISC ENGINE ITEMS-CUMMINS', 'SCV/LCV', 'SUPER ACEACE HT', '', '#N/A', '#N/A', 'ENGINE', '', '', '', '2/1/2014', '8:50:01', 33.5, 0, 0, 0, 0, 7.833333333, 1),
(25, 'TE253420125834', 'HOSE (THERMO TO RAD) SPRINT', 'PG5', 'PG5', 'CG', 'HOSES RAD BRAKE', 'LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 34.5, 0, 0, 0, 0, 8.083333333, 1),
(26, 'TE551742990124', 'REAR KIT WHEEL CYLINDER  MINOR', 'PG2', 'PG2', 'CD', 'BRAKE & CLUTCH ACTIVATION PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 35.5, 0, 0, 0, 0, 8.333333333, 1),
(27, 'TE279023120152', 'ASSY TENSION PULLEY W/H SPACER', 'PG5', 'PG5', 'CD', 'Special Installations', 'SCV/LCV', '#N/A', 'Strg Part', '#N/A', '#N/A', 'ENGINE', '', '', '', '2/1/2014', '8:50:01', 36.5, 0, 0, 0, 0, 8.583333333, 1),
(28, 'TE277582400104', 'ASSY RR WIPER ARM & BLADE', '#N/A', '#N/A', 'CF', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 37.5, 0, 0, 0, 0, 8.833333333, 1),
(29, 'TE269026200141', 'CYL ROLLER BEARING', '#N/A', '#N/A', 'CD', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 38.5, 0, 0, 0, 0, 9.083333333, 1),
(30, 'TE284474502301', 'REAR DOOR GLASS', '#N/A', '#N/A', 'CF', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 39.5, 0, 0, 0, 0, 9.333333333, 1),
(31, 'TE265172300162', 'GLOVE BOX LOCK(MINDA)', 'PG5', 'PG5', 'CF', 'OTHER GROUP 5 ITEMS', 'LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 40.5, 0, 0, 0, 0, 9.583333333, 1),
(32, 'TE264189103703', 'ADJUSTER RH RHD TOR BAR', 'PG5', 'PG5', 'CD', 'OTHER GROUP 5 ITEMS', 'C ', '#N/A', '', '#N/A', '#N/A', 'BODY', '', '', '', '2/1/2014', '8:50:01', 41.5, 0, 0, 0, 0, 9.833333333, 1),
(33, 'TE276326807703', 'FLAP', 'PG5', 'PG5', '#N/A', 'OTHER GROUP 5 ITEMS', 'MHCV', '#N/A', '', '#N/A', '#N/A', 'GEARBOX', '', '', '', '2/1/2014', '8:50:01', 42.5, 0, 0, 0, 0, 10.08333333, 1),
(34, 'TE260829100118', 'PEDAL ASSY', 'PG2', 'PG2', 'CC', 'OTHER GROUP 2 ITEMS', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 43.5, 0, 0, 0, 0, 10.33333333, 1),
(35, 'TE265167100101', 'ASSY REAR WINDOW COMPLETE', 'PG5', 'PG5', 'CF', 'OTHER GROUP 5 ITEMS', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 44.5, 0, 0, 0, 0, 10.58333333, 1),
(36, 'TE282932600102', 'ASSY REAR SHOCK ABSO', 'PG3', 'PG3', 'CD', 'LEAF SPRINGS / SHACKLES', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 45.5, 0, 0, 0, 0, 10.83333333, 1),
(37, 'TE270242308706', 'RETURN SPRING D - P65 0013 6', 'PG2', 'PG2', 'CD', 'BRAKE & CLUTCH ACTIVATION PARTS', 'SCV/LCV', '#N/A', 'Strg Part', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 46.5, 0, 0, 0, 0, 11.08333333, 1),
(38, 'TE551740308210', 'LOCK PLATE (SPARE WHEEL MTG.)', 'PG5', 'PG5', 'CD', 'BODY PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 47.5, 0, 0, 0, 0, 11.33333333, 1),
(39, 'TF12140801401', 'NYLOC NUT M14X1.5', '#N/A', 'PG5', 'CC', 'FASTNERS', 'C ', '#N/A', '', '#N/A', '#N/A', 'SUSPENSION', '', '', '', '2/1/2014', '8:50:01', 48.5, 0, 0, 0, 0, 11.58333333, 1),
(40, 'TE282933000106', 'ASSY FRONT AXLE', 'PG4', 'PG4', 'CD', 'FRONT AXLE BEAM & REAR AXLE ASSY & HOUSI', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', 'FRONT AXLE', '', '', '', '2/1/2014', '8:50:01', 49.5, 0, 0, 0, 0, 11.83333333, 1),
(41, 'TE269126715101', 'SHIFTER FINGER', 'PG4', 'PG4', 'CD', 'GEAR SHIFTING MECHANISM PARTS', 'C ', '#N/A', '', '#N/A', '#N/A', 'GEAR BOX', '', '', '', '2/1/2014', '8:50:01', 50.5, 0, 0, 0, 0, 12.08333333, 1),
(42, 'TF12140801001', 'NYLOC NUT M10X1.25 ISO10512-10SS8451-8CH', '#N/A', 'PG5', 'CC', 'FASTNERS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 51.5, 0, 0, 0, 0, 12.33333333, 1),
(43, 'TE551746996502', 'NYLOC NUT', '#N/A', '#N/A', 'CC', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 52.5, 0, 0, 0, 0, 12.58333333, 1),
(44, 'TE269126518704', 'COMPRESSION SPRING (DETEN', 'PG4', 'PG4', 'CD', 'GB600 PARTS', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 53.5, 0, 0, 0, 0, 12.83333333, 1),
(45, 'TE252707100189', 'ASSY.ELECTRIC FUEL PUMP EURO-II', 'PG1', 'PG1', '0', 'MISC ENGINE ITEMS-TATA', 'Not fragmented', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 54.5, 0, 0, 0, 0, 13.08333333, 1),
(46, 'TE265947100111', 'ASSY.RUBBER BUSH', 'PG5', 'PG5', 'CG', 'RUBBER SUSPENSION', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', 'FUEL SYSTEM', '', '', '', '2/1/2014', '8:50:01', 55.5, 0, 0, 0, 0, 13.33333333, 1),
(47, 'TE265983500115', 'ASSY COIL HOUSING WITH ALUMINUM HEATER', 'PG4', 'PG4', '#N/A', 'GEAR BOX HSGS', 'LCV', '#N/A', '', '#N/A', '#N/A', 'BODY', '', '', '', '2/1/2014', '8:50:01', 56.5, 0, 0, 0, 0, 13.58333333, 1),
(48, 'TE252550506335', 'FAN SHROUD (WITH ONE CLIP)', 'PG1', 'PG1', 'CC', 'FAN-TATA', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 57.5, 0, 0, 0, 0, 13.83333333, 1),
(49, 'TE266335000209', 'ASSY RA44/9LSDNASBSWO/S.ABSA.ADJ', 'PG4', 'PG4', 'CE', 'FRONT AXLE BEAM & REAR AXLE ASSY & HOUSI', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 58.5, 0, 0, 0, 0, 14.08333333, 1),
(50, 'TE282943100105', 'MAJ REP KIT CALIPER', 'PG2', 'PG2', 'CD', 'BRAKE & CLUTCH ACTIVATION PARTS', 'SCV/LCV', 'TATA ACE', '', 'ACE', '0', 'BRAKES', '', '', '', '2/1/2014', '8:50:01', 59.5, 0, 0, 0, 0, 14.33333333, 1),
(51, 'TE551742990125', 'REAR KIT WHEEL CYLINDER  MAJOR', 'PG2', 'PG2', 'CD', 'BRAKE & CLUTCH ACTIVATION PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 200, 0, 0, 0, 0, 14.58333333, 1),
(52, 'TE289468906336', 'BOTTLE HOLDER / COIN HOLDER B002', 'PG5', 'PG5', 'CF', 'BODY PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 340.5, 0, 0, 0, 0, 14.83333333, 1),
(53, 'TE269126208203', 'OIL SLINGER (REAR COVER)', 'PG5', 'PG5', 'CD', 'OIL SEAL HG KIT', 'MHCV', '#N/A', '', '#N/A', '#N/A', 'GEARBOX', '', '', '', '2/1/2014', '8:50:01', 481, 0, 0, 0, 0, 15.08333333, 1),
(54, 'TE283260000188BF', 'ASSY. BODY SHELL PAINTED ARCTIC WHITE', 'PG5', 'PG5', 'CF', 'CABIN /COWLS', 'LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 621.5, 0, 0, 0, 0, 15.33333333, 1),
(55, 'TE206726707501', 'RUBBER BELLOW', 'PG5', 'PG5', 'CG', 'BODY PARTS', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 762, 0, 0, 0, 0, 15.58333333, 1),
(56, 'TE284354509913', 'WINDOW WIND SWITCH PACK', 'PG5', 'PG5', 'CD', 'BODY PARTS', 'LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 902.5, 0, 0, 0, 0, 15.83333333, 1),
(57, 'TE257646000113', 'DRAG LINK REPAIR KIT', 'PG2', 'PG2', 'CD', 'STEERING ASSEMBLY & LINKAGE', 'MHCV', '#N/A', '', '2515', '0', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1043, 0, 0, 0, 0, 16.08333333, 1),
(58, 'TT3222600040', 'GR.SHIFT KNOB/G32G40', '#N/A', 'PG4', 'ASSY.GR.SHIFT KNOB/G32G40', 'OTHER GEAR/AXLE PARTS', 'NLS', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1183.5, 0, 0, 0, 0, 16.33333333, 1),
(59, 'TE270247600180', 'ASSY BREATHER TUBE', '#N/A', '#N/A', 'CG', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1324, 0, 0, 0, 0, 16.58333333, 1),
(60, 'TE551730100137', 'ASSY.EXCESS CABLE', '#N/A', '#N/A', 'CD', '#N/A', '#N/A', '#N/A', 'Gear Parts', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1464.5, 0, 0, 0, 0, 16.83333333, 1),
(61, 'TE551742998703', 'SPRING W/CYL END', '#N/A', '#N/A', 'CD', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1605, 0, 0, 0, 0, 17.08333333, 1),
(62, 'TE551742990135', 'FRONT KIT SHOE ASSY. COMPLETE', 'PG2', 'PG2', 'CD', 'BRAKE & CLUTCH ACTIVATION PARTS', 'LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1745.5, 0, 0, 0, 0, 17.33333333, 1),
(63, 'TF11071812954', 'FLBOLT M12X1.5X140TS17130 10.9SS8451-8CH', '#N/A', 'PG5', 'CC', 'FASTNERS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1886, 0, 0, 0, 0, 17.58333333, 1),
(64, 'TE551732401606', 'BUMP STOPPER REAR', '#N/A', '#N/A', 'CD', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 2026.5, 0, 0, 0, 0, 17.83333333, 1),
(65, 'TE551732103201', 'HEX FLANGE BOLT FOR LBJ MTG', 'PG5', 'PG5', 'CD', 'FASTNERS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 2167, 0, 0, 0, 0, 18.08333333, 1),
(66, 'TF11071814906', 'FL BOLT M14X1.5X90TS17130 10.9SS8451-8CH', '#N/A', 'PG5', 'CC', 'FASTNERS', 'SCV/LCV', '#N/A', 'Lining', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 450.5, 0, 0, 0, 0, 18.33333333, 1),
(67, 'TF11071810358', 'FLBOLT M10X1.25X35TS17130 10.9SS8451-8CH', '#N/A', 'PG5', 'CC', 'FASTNERS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 889.5, 0, 0, 0, 0, 18.58333333, 1),
(68, 'TE581326300113', 'JOINT KIT WHEEL SIDE (LH)', 'PG4', 'PG4', 'CD', 'ACE AXLE PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1328.5, 0, 0, 0, 0, 18.83333333, 1),
(69, 'TE551730100101', 'ASSY. ACCELERATOR CABLE', 'PG3', 'PG3', 'CD', 'ELECTRICALS', 'LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1767.5, 0, 0, 0, 0, 19.08333333, 1),
(70, 'TE268426250119', 'NEEDLE CAGE', 'PG3', 'PG3', 'CD', 'BEARINGS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', 'GEARBOX', '', '', '', '2/1/2014', '8:50:01', 2206.5, 0, 0, 0, 0, 19.33333333, 1),
(71, 'TE254750109904', 'DRAIN COCK', 'PG2', 'PG2', 'CC', 'RADIATOR & CHILD PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', 'RADIATOR', '', '', '', '2/1/2014', '8:50:01', 2645.5, 0, 0, 0, 0, 19.58333333, 1),
(72, 'TE270246603405', 'RUBBER BUSHING', '#N/A', '#N/A', 'CG', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 3084.5, 0, 0, 0, 0, 19.83333333, 1),
(73, 'TF14580606009', 'INTERNAL CIRCLIP 60X2N IS3075P2 SS8400', '#N/A', 'PG5', 'CC', 'FASTNERS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 3523.5, 0, 0, 0, 0, 20.08333333, 1),
(74, 'TE265988500125BF', 'ASSY. BUMPER FRONT LH. ARCTIC WHITE', 'PG5', 'PG5', 'CF', 'BODY PARTS', 'SCV/LCV', '#N/A', 'Breake Parts', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 3962.5, 0, 0, 0, 0, 20.33333333, 1),
(75, 'TE265988500126BF', 'ASSY. BUMPER FRONT RH. ARCTIC WHITE', 'PG5', 'PG5', 'CF', 'BODY PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 4401.5, 0, 0, 0, 0, 20.58333333, 1),
(76, 'TE283442990137', 'KIT SPRING ASSY', 'PG2', 'PG2', 'CD', 'BRAKE & CLUTCH ACTIVATION PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 4840.5, 0, 0, 0, 0, 20.83333333, 1),
(77, 'TE283442990126', 'KIT LEVER PAWL- RH', 'PG2', 'PG2', 'CD', 'BRAKE & CLUTCH ACTIVATION PARTS', 'LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 5279.5, 0, 0, 0, 0, 21.08333333, 1),
(78, 'TEA09600000317', 'REAR BUMPER ASSY - RH', 'PG5', 'PG5', '#N/A', 'BODY PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 5718.5, 0, 0, 0, 0, 21.33333333, 1),
(79, 'TE283442990125', 'KIT LEVER PAWL CONTENTS PER LH BRAKE ASS', 'PG2', 'PG2', 'CD', 'BRAKE & CLUTCH ACTIVATION PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 6157.5, 0, 0, 0, 0, 21.58333333, 1),
(80, 'TE551746997703', 'RACK BUSH', '#N/A', '#N/A', 'CD', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 6596.5, 0, 0, 0, 0, 21.83333333, 1),
(81, 'TE265133800105', 'BALL JOINT ASSY', 'PG2', 'PG2', 'CD', 'STEERING ASSEMBLY & LINKAGE', 'SCV/LCV', '#N/A', 'Oil Filter', '407', '0', '#N/A', '', '', '', '2/1/2014', '8:50:01', 7035.5, 0, 0, 0, 0, 22.08333333, 1),
(82, 'TE551746208219', 'COVER SHEET', 'PG5', 'PG5', 'CD', 'BODY PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 7474.5, 0, 0, 0, 0, 22.33333333, 1),
(83, 'TET06560000043', 'PIN, PISTON', 'PG1', 'PG1', 'CD', 'PISTONS-TATA', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 7913.5, 0, 0, 0, 0, 22.58333333, 1),
(84, 'TE257535603110', 'REAR HUB INNER BEARING', 'PG3', 'PG3', 'CD', 'BEARINGS', 'C ', '#N/A', '', '32214', '0', 'REAR AXLE', '', '', '', '2/1/2014', '8:50:01', 900.25, 0, 0, 0, 0, 22.83333333, 1),
(85, 'TE265488700150', 'ASSY RELEASE CABLE RH RHD', 'PG5', 'PG5', 'CD', 'BODY PARTS', 'SCV/LCV', '207 DI', '', '#N/A', '#N/A', 'BODY', '', '', '', '2/1/2014', '8:50:01', 11.5, 0, 0, 0, 0, 23.08333333, 1),
(86, 'TE263254400131', 'BLINKER LAMP LH WITH BULB', 'PG3', 'PG3', 'CD', 'ELECTRICALS', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 11.5, 0, 0, 0, 0, 23.33333333, 1),
(87, 'TE263254400130', 'BLINKER LAMP RH WITH BULB', 'PG3', 'PG3', 'CD', 'ELECTRICALS', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 11.5, 0, 0, 0, 0, 23.58333333, 1),
(88, 'TE551746207701', 'RUBBER GASKET', 'PG5', 'PG5', 'CD', 'GASKET', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 11.5, 0, 0, 0, 0, 23.83333333, 1),
(89, 'TE551746200104', 'ASSY. STEERING RUBBER BELLOW-RHD', '#N/A', '#N/A', 'CD', '#N/A', '#N/A', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1500, 0, 0, 0, 0, 24.08333333, 1),
(90, 'TE287142990105', 'KIT - LEVER ASSY. RH', 'PG2', 'PG2', 'CD', 'BRAKE & CLUTCH ACTIVATION PARTS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 400, 0, 0, 0, 0, 24.33333333, 1),
(91, 'TE885403622525', 'BEARING SET STD', 'PG1', 'PG1', 'CD', 'BRGS : ENGINE-TATA', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 400, 0, 0, 0, 0, 24.58333333, 1),
(92, 'TE287142990104', 'KIT - LEVER ASSY - LH', 'PG2', 'PG2', 'CD', 'BRAKE & CLUTCH ACTIVATION PARTS', 'SCV/LCV', '#N/A', 'Air Filter', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 400, 0, 0, 0, 0, 24.83333333, 1),
(93, 'TE257454506927', 'PIANO  KEY  SWITCH', 'PG3', 'PG3', 'CD', 'ELECTRICALS', 'HCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 400, 0, 0, 0, 0, 25.08333333, 1),
(94, 'TE261854500106', 'HAZARD  WARNING SWITCH', 'PG3', 'PG3', 'CD', 'ELECTRICALS', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 11.5, 0, 0, 0, 0, 25.33333333, 1),
(95, 'TE885403642525', 'CON ROD BEARING RS1', 'PG1', 'PG1', 'CD', 'BRGS : ENGINE-TATA', 'MHCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1000, 0, 0, 0, 0, 25.58333333, 1),
(96, 'TE551732103204', 'STRUT MOUNTING PIN ECCENTRIC', 'PG5', 'PG5', 'CD', 'FASTNERS', 'SCV/LCV', '#N/A', '', '#N/A', '#N/A', '#N/A', '', '', '', '2/1/2014', '8:50:01', 1200, 0, 0, 0, 0, 25.83333333, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_alternative`
--

CREATE TABLE IF NOT EXISTS `tbl_item_alternative` (
  `alternative_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `part_number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`alternative_id`),
  KEY `item_ID_idx` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loginhistroy`
--

CREATE TABLE IF NOT EXISTS `tbl_loginhistroy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `logouttime` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `tbl_loginhistroy`
--

INSERT INTO `tbl_loginhistroy` (`id`, `lid`, `date`, `time`, `logouttime`) VALUES
(7, 5, '2013-11-16', '12:08:09', NULL),
(8, 6, '2013-11-16', '12:08:20', NULL),
(13, 5, '2013-11-16', '13:37:27', NULL),
(14, 5, '2013-11-16', '13:43:53', NULL),
(15, 5, '2013-11-16', '13:44:37', NULL),
(16, 5, '2013-11-16', '13:52:11', NULL),
(17, 5, '2013-11-19', '12:24:57', NULL),
(18, 5, '2013-11-19', '12:26:32', NULL),
(19, 5, '2013-11-19', '12:27:26', NULL),
(20, 5, '2013-11-19', '13:37:33', NULL),
(21, 5, '2013-11-19', '13:38:29', NULL),
(22, 5, '2013-11-19', '13:40:46', NULL),
(23, 5, '2013-11-19', '13:56:20', NULL),
(24, 5, '2013-11-19', '16:34:01', NULL),
(25, 5, '2013-11-19', '16:52:56', NULL),
(26, 5, '2013-11-20', '15:29:45', NULL),
(27, 5, '2013-11-21', '08:45:24', NULL),
(28, 5, '2013-11-29', '09:03:43', NULL),
(29, 5, '2013-11-29', '11:30:23', NULL),
(30, 5, '2013-11-29', '11:35:03', NULL),
(31, 5, '2013-11-29', '11:42:46', NULL),
(32, 5, '2013-11-29', '11:51:21', NULL),
(33, 5, '2013-11-29', '12:07:00', NULL),
(34, 5, '2013-11-29', '12:41:37', NULL),
(35, 5, '2013-11-29', '12:46:17', NULL),
(36, 5, '2013-11-29', '13:11:33', NULL),
(37, 5, '2013-11-30', '09:33:39', NULL),
(38, 5, '2013-11-30', '09:50:48', NULL),
(39, 5, '2013-11-30', '10:53:19', NULL),
(40, 5, '2013-12-02', '16:22:27', NULL),
(41, 5, '2013-12-02', '16:37:59', NULL),
(42, 5, '2013-12-02', '16:42:02', NULL),
(43, 5, '2013-12-02', '16:44:48', NULL),
(44, 5, '2013-12-02', '16:48:08', NULL),
(45, 5, '2013-12-02', '16:49:43', NULL),
(46, 5, '2013-12-02', '16:51:02', NULL),
(47, 5, '2013-12-02', '16:55:47', NULL),
(48, 5, '2013-12-02', '16:57:40', NULL),
(49, 5, '2013-12-03', '09:41:53', NULL),
(50, 5, '2013-12-03', '10:09:15', NULL),
(51, 5, '2013-12-03', '10:22:18', NULL),
(52, 5, '2013-12-03', '10:26:35', NULL),
(53, 5, '2013-12-03', '10:32:23', NULL),
(54, 5, '2013-12-03', '10:33:29', NULL),
(55, 5, '2013-12-03', '10:34:07', NULL),
(56, 5, '2013-12-03', '10:43:11', NULL),
(57, 5, '2013-12-03', '10:50:33', NULL),
(58, 5, '2013-12-03', '10:52:16', NULL),
(59, 5, '2013-12-03', '10:54:47', NULL),
(60, 5, '2013-12-03', '10:58:53', NULL),
(61, 5, '2013-12-03', '11:00:22', NULL),
(62, 5, '2013-12-03', '11:03:35', NULL),
(63, 5, '2013-12-03', '11:04:35', NULL),
(64, 5, '2013-12-03', '11:42:07', NULL),
(65, 5, '2013-12-03', '11:45:02', NULL),
(66, 5, '2013-12-03', '11:46:38', NULL),
(67, 5, '2013-12-03', '11:49:45', NULL),
(68, 5, '2013-12-03', '11:58:00', NULL),
(69, 5, '2013-12-03', '12:26:56', NULL),
(70, 5, '2013-12-03', '12:32:56', NULL),
(71, 5, '2013-12-03', '12:33:35', NULL),
(72, 5, '2013-12-03', '13:03:48', NULL),
(73, 5, '2013-12-03', '13:06:20', NULL),
(74, 5, '2013-12-03', '13:12:23', NULL),
(75, 5, '2013-12-03', '13:17:38', NULL),
(76, 5, '2013-12-03', '13:51:47', NULL),
(77, 5, '2013-12-03', '14:20:22', NULL),
(78, 5, '2013-12-03', '14:21:51', NULL),
(79, 5, '2013-12-03', '14:22:20', NULL),
(80, 5, '2013-12-03', '14:26:10', NULL),
(81, 5, '2013-12-03', '14:27:38', NULL),
(82, 5, '2013-12-03', '14:28:24', NULL),
(83, 5, '2013-12-03', '14:31:04', NULL),
(84, 5, '2013-12-03', '14:36:34', NULL),
(85, 5, '2013-12-03', '14:52:25', NULL),
(86, 5, '2013-12-03', '14:52:27', NULL),
(87, 5, '2013-12-03', '14:52:27', NULL),
(88, 5, '2013-12-03', '14:56:54', NULL),
(89, 5, '2013-12-03', '15:00:02', NULL),
(90, 5, '2013-12-03', '15:02:28', NULL),
(91, 5, '2013-12-03', '15:03:56', NULL),
(92, 5, '2013-12-03', '15:04:57', NULL),
(93, 5, '2013-12-03', '15:06:42', NULL),
(94, 5, '2013-12-03', '15:13:37', NULL),
(95, 5, '2013-12-03', '15:15:13', NULL),
(96, 5, '2013-12-03', '15:25:13', NULL),
(97, 5, '2013-12-03', '15:32:38', NULL),
(98, 5, '2013-12-03', '15:37:51', NULL),
(99, 5, '2013-12-03', '15:42:29', NULL),
(100, 5, '2013-12-03', '15:50:25', NULL),
(101, 5, '2013-12-03', '16:23:38', NULL),
(102, 5, '2013-12-03', '16:24:05', NULL),
(103, 5, '2013-12-04', '08:52:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meeting_branch`
--

CREATE TABLE IF NOT EXISTS `tbl_meeting_branch` (
  `meeting_branch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `meeting_minute_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`meeting_branch_id`),
  KEY `FK_tbl_meeting_branch_1` (`branch_id`),
  KEY `FK_tbl_meeting_branch_2` (`meeting_minute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

--
-- Dumping data for table `tbl_meeting_branch`
--

INSERT INTO `tbl_meeting_branch` (`meeting_branch_id`, `branch_id`, `meeting_minute_id`) VALUES
(146, 2, 104),
(147, 2, 105),
(148, 3, 106),
(149, 3, 107),
(150, 3, 108),
(151, 3, 109),
(152, 3, 110),
(153, 3, 111),
(154, 3, 112),
(155, 3, 113),
(156, 3, 114),
(157, 3, 115),
(158, 3, 116),
(159, 3, 117),
(160, 3, 118),
(161, 3, 119),
(162, 3, 120),
(163, 7, 121);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meeting_has_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_meeting_has_employee` (
  `meeting_has_employee_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meeting_responsibles_id` int(11) DEFAULT NULL,
  `responsibility` varchar(45) DEFAULT NULL,
  `follow_up` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`meeting_has_employee_id`),
  KEY `FK_tbl_meeting_has_employee_1` (`meeting_responsibles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meeting_minute`
--

CREATE TABLE IF NOT EXISTS `tbl_meeting_minute` (
  `meeting_minute_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_date` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `purpose` varchar(455) DEFAULT NULL,
  `start_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `meeting_type` varchar(45) NOT NULL DEFAULT '',
  `added_time` varchar(45) DEFAULT NULL,
  `start_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`meeting_minute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `tbl_meeting_minute`
--

INSERT INTO `tbl_meeting_minute` (`meeting_minute_id`, `added_date`, `location`, `purpose`, `start_time`, `status`, `meeting_type`, `added_time`, `start_date`) VALUES
(104, '2014:02:02', 'galle', 'test', '1:00 AM', 1, 'Board Meeting', '19:50:03', '2014-02-04'),
(105, '2014:02:02', 'galle', 'test2', '1:35 AM', 1, 'Board Meeting', '20:05:59', '2014-02-13'),
(106, '2014:02:02', 'dsdsdsd', 'wdwdwdd', '9:00 AM', 1, 'Branch Meeting', '16:03:41', '2014-02-28'),
(107, '2014:02:02', 'dsdsdsd', 'edededed', '1:15 AM', 1, 'Branch Meeting', '16:14:14', '2014-02-28'),
(108, '2014:02:02', 'ewdwede', 'wedwddfe', '1:30 AM', 1, 'Branch Meeting', '16:15:46', '2014-02-28'),
(109, '2014:02:03', 'Galle', 'Business Purpose.', '1:50 AM', 1, 'Branch Meeting', '04:59:53', '2014-02-28'),
(110, '2014:02:11', 'Galle', 'Test', '6:00 AM', 1, 'Branch Meeting', '04:54:06', '2014-02-28'),
(111, '2014:02:11', 'Galle', 'Test', '1:00 AM', 1, 'Branch Meeting', '04:57:03', '2014-02-28'),
(112, '2014:02:11', 'Galle', 'ffgfgh', '6:00 AM', 1, 'Branch Meeting', '04:58:44', '2014-02-28'),
(113, '2014:02:11', 'test', 'test', '1:20 AM', 1, 'Branch Meeting', '05:00:02', '2014-02-28'),
(114, '2014:02:11', 'Galwadugoda', 'Car Part', '1:50 AM', 1, 'Branch Meeting', '05:04:26', '2014-02-28'),
(115, '2014:02:11', 'dffgrfgr', 'rgrgrgrr', '9:00 AM', 1, 'Branch Meeting', '05:08:05', '2014-02-12'),
(116, '2014:02:27', 'weew', 'eerffe', '1:15 AM', 1, 'Branch Meeting', '05:59:42', '2014-02-28'),
(117, '2014:02:27', 'dvdvv', 'fvdvfvf', '2:00 AM', 1, 'Branch Meeting', '06:36:48', '2014-02-28'),
(118, '2014:02:27', 'ededeed', 'edededed', '1:45 AM', 1, 'Branch Meeting', '06:40:30', '2014-02-26'),
(119, '2014:02:27', 'Galle', 'ok', '1:20 AM', 1, 'Branch Meeting', '06:54:30', '2014-02-28'),
(120, '2014:02:27', 'Galle', 'test', '12:00 AM', 1, 'Branch Meeting', '09:55:44', '2014-02-28'),
(121, '2014:02:27', 'Galle', 'test', '6:00 AM', 1, 'Board Meeting', '12:16:54', '2014-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meeting_minute_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_meeting_minute_detail` (
  `meeting_minute_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) unsigned NOT NULL DEFAULT '0',
  `employee_type` varchar(45) NOT NULL DEFAULT '',
  `account_no` varchar(45) NOT NULL DEFAULT '',
  `responsibility` varchar(10) NOT NULL DEFAULT '',
  `meeting_minute_id` int(11) NOT NULL DEFAULT '0',
  `meting_us_status` tinyint(1) NOT NULL DEFAULT '1',
  `view_time` time DEFAULT NULL,
  `view_date` date DEFAULT NULL,
  PRIMARY KEY (`meeting_minute_detail_id`),
  KEY `FK_tbl_meeting_minute_detail_1` (`meeting_minute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_meeting_minute_detail`
--

INSERT INTO `tbl_meeting_minute_detail` (`meeting_minute_detail_id`, `employee_id`, `employee_type`, `account_no`, `responsibility`, `meeting_minute_id`, `meting_us_status`, `view_time`, `view_date`) VALUES
(1, 3, 'APM', '00366', '1', 104, 0, '10:34:12', '2014-03-03'),
(2, 3, 'APM', '0145', '1', 105, 0, '10:34:19', '2014-03-03'),
(3, 3, 'APM', '1231233', '1', 106, 0, '07:39:47', '2014-02-07'),
(4, 3, 'APM', '2213233', '1', 107, 0, '13:39:01', '2014-02-09'),
(5, 3, 'APM', '232334', '1', 108, 0, '17:53:23', '2014-02-06'),
(6, 1, 'Sales Officer', '989890', '1', 111, 0, '05:01:23', '2014-02-11'),
(7, 4, 'Sales Officer', '10000', '1', 118, 0, '06:51:29', '2014-02-27'),
(8, 4, 'Sales Officer', '1223', '1', 119, 0, '18:17:06', '2014-02-27'),
(9, 4, 'Sales Officer', '1000', '1', 120, 0, '11:26:18', '2014-02-28'),
(10, 2, 'Sales Officer', '1222', '1', 121, 0, '11:26:24', '2014-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meeting_problem`
--

CREATE TABLE IF NOT EXISTS `tbl_meeting_problem` (
  `meeting_problem_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `problem` varchar(255) DEFAULT NULL,
  `solution` varchar(255) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `meeting_responsibles_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`meeting_problem_id`),
  KEY `FK_tbl_meeting_problem_1` (`meeting_responsibles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_meeting_problem`
--

INSERT INTO `tbl_meeting_problem` (`meeting_problem_id`, `problem`, `solution`, `added_date`, `added_time`, `status`, `meeting_responsibles_id`) VALUES
(1, 'ssss', 'sss', '2014:03:13', '06:12:11', 1, 11),
(2, 'dddd', 'dddd', '2014:03:13', '06:14:07', 1, 13),
(3, '2', '2', '2014:03:13', '06:15:28', 1, 15),
(4, '3', '3', '2014:03:13', '06:15:28', 1, 15),
(5, '2', '2', '2014:03:13', '06:16:55', 1, 17),
(6, '3', '3', '2014:03:13', '06:16:55', 1, 17),
(7, '4', '4', '2014:03:13', '06:16:55', 1, 17),
(8, '2', '2', '2014:03:13', '06:36:11', 1, 18),
(9, '3', '3', '2014:03:13', '06:36:11', 1, 18),
(10, '2', '2', '2014:03:13', '06:37:21', 1, 19),
(11, '3', '3', '2014:03:13', '06:37:21', 1, 19),
(12, '5', '5', '2014:03:13', '06:37:21', 1, 19),
(13, '', '', '2014:03:13', '09:25:11', 1, 24),
(14, 'fgdgdg', 'gdgd', '2014:03:13', '09:30:45', 1, 28),
(15, 'fgdgdg', 'gdgd', '2014:03:13', '09:31:50', 1, 30),
(16, 'gdgdgdg', 'dfgdgd', '2014:03:13', '09:33:28', 1, 32),
(17, 'fgj', 'fffrtt', '2014:03:13', '17:01:10', 1, 36),
(18, 'kkkkkkkkkkkkkkkk', 'kkkkkkkkkkkkkkkkk', '2014:03:13', '17:08:08', 1, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meeting_responsibles`
--

CREATE TABLE IF NOT EXISTS `tbl_meeting_responsibles` (
  `meeting_responsibles_id` int(11) NOT NULL AUTO_INCREMENT,
  `meeting_id` int(11) DEFAULT NULL,
  `initials_review_date` date DEFAULT NULL,
  `final_review_date` date DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`meeting_responsibles_id`),
  KEY `m_id_idx` (`meeting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tbl_meeting_responsibles`
--

INSERT INTO `tbl_meeting_responsibles` (`meeting_responsibles_id`, `meeting_id`, `initials_review_date`, `final_review_date`, `status`, `added_date`, `added_time`) VALUES
(11, 104, '2014-02-09', '2014-02-14', 0, '2014:02:09', '17:50:27'),
(12, 104, '2014-02-09', '2014-02-14', 1, '2014:02:09', '17:51:43'),
(13, 104, '0000-00-00', '0000-00-00', 1, '2014:02:09', '17:51:55'),
(14, 104, '0000-00-00', '0000-00-00', 1, '2014:02:09', '17:52:20'),
(15, 104, '0000-00-00', '0000-00-00', 1, '2014:02:09', '17:52:27'),
(16, 104, '0000-00-00', '0000-00-00', 1, '2014:02:09', '17:52:44'),
(17, 104, '2014-02-09', '2014-02-14', 1, '2014:02:09', '17:53:13'),
(18, 104, '2014-02-09', '2014-02-14', 1, '2014:02:09', '17:54:49'),
(19, 104, '2014-02-09', '2014-02-14', 1, '2014:02:09', '17:55:46'),
(20, 104, '2014-02-09', '2014-02-14', 1, '2014:02:09', '17:56:24'),
(21, 104, '2014-02-09', '2014-02-14', 1, '2014:02:09', '17:57:48'),
(22, 111, '2014-03-31', '2014-02-28', 1, '2014:02:11', '05:02:07'),
(23, 104, '2014-02-14', '2014-02-13', 1, '2014:02:27', '06:00:51'),
(24, 104, '2014-02-28', '2014-02-28', 1, '2014:02:27', '06:44:43'),
(25, 119, '2014-02-28', '2014-02-28', 1, '2014:02:27', '06:55:19'),
(26, 104, '2014-03-31', '2014-03-21', 1, '2014:03:13', '05:49:27'),
(27, 105, '2014-03-20', '2014-03-26', 1, '2014:03:13', '06:01:09'),
(28, 106, '2014-03-27', '2014-03-26', 1, '2014:03:13', '06:04:12'),
(29, 105, '2014-03-31', '2014-03-31', 1, '2014:03:13', '06:12:11'),
(30, 104, '2014-03-12', '2014-03-29', 1, '2014:03:13', '06:14:07'),
(31, 104, '2014-03-12', '2014-03-26', 1, '2014:03:13', '06:15:28'),
(32, 105, '2014-03-25', '2014-03-25', 1, '2014:03:13', '06:16:54'),
(33, 104, '2014-03-24', '2014-03-20', 1, '2014:03:13', '06:36:11'),
(34, 105, '2014-03-31', '2014-03-24', 1, '2014:03:13', '06:37:21'),
(35, 104, '2014-03-13', '2014-03-13', 1, '2014:03:13', '09:23:51'),
(36, 104, '2014-03-13', '2014-03-13', 1, '2014:03:13', '09:24:40'),
(37, 104, '2014-03-19', '2014-03-04', 1, '2014:03:13', '09:24:48'),
(38, 104, '2014-03-05', '2014-03-19', 1, '2014:03:13', '09:25:10'),
(39, 104, '2014-03-13', '2014-03-19', 1, '2014:03:13', '09:25:51'),
(40, 104, '2014-03-04', '2014-03-14', 1, '2014:03:13', '09:27:59'),
(41, 104, '2014-03-06', '2014-03-20', 1, '2014:03:13', '09:30:45'),
(42, 104, '2014-03-06', '2014-03-20', 1, '2014:03:13', '09:31:50'),
(43, 104, '2014-03-13', '2014-03-15', 1, '2014:03:13', '09:32:26'),
(44, 104, '2014-03-13', '2014-03-21', 1, '2014:03:13', '09:33:28'),
(45, 104, '2014-03-13', '2014-03-21', 1, '2014:03:13', '09:33:50'),
(46, 105, '2014-03-13', '2014-03-19', 1, '2014:03:13', '16:53:14'),
(47, 105, '2014-03-13', '2014-03-19', 1, '2014:03:13', '16:56:58'),
(48, 105, '2014-03-18', '2014-03-23', 1, '2014:03:13', '17:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meeting_responsibles_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_meeting_responsibles_comments` (
  `responsibles_comments_id` int(11) NOT NULL AUTO_INCREMENT,
  `meeting_responsibles_id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `added_time` time NOT NULL,
  PRIMARY KEY (`responsibles_comments_id`),
  KEY `meeting_responsibles_id` (`meeting_responsibles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_meeting_responsibles_comments`
--

INSERT INTO `tbl_meeting_responsibles_comments` (`responsibles_comments_id`, `meeting_responsibles_id`, `user_name`, `comment`, `added_date`, `added_time`) VALUES
(1, 12, 'Iresha Sellehandie', '0', '2014-02-09', '22:04:50'),
(2, 12, 'Iresha Sellehandie', 'sdfsfsfsfsf', '2014-02-09', '22:06:19'),
(3, 12, 'Iresha Sellehandie', 'dfgrty', '2014-02-09', '22:19:40'),
(4, 12, 'Iresha Sellehandie', 'rtyry', '2014-02-09', '22:20:07'),
(5, 12, 'Iresha Sellehandie', 'ertett', '2014-02-09', '22:44:48'),
(6, 12, 'Iresha Sellehandie', 'rrrrrrrrrr', '2014-02-09', '22:44:57'),
(7, 22, 'dinesh', 'ffggg', '2014-02-11', '05:02:30'),
(8, 12, 'Iresha Sellehandie', 'hhhh', '2014-02-24', '04:50:36'),
(9, 12, 'Iresha Sellehandie', 'jjokkk', '2014-02-24', '04:50:49'),
(10, 15, 'Iresha Sellehandie', 'ssss', '2014-02-25', '15:01:09'),
(11, 15, 'Iresha Sellehandie', 'ssss', '2014-02-25', '15:01:14'),
(12, 12, 'Iresha Sellehandie', 'dddd', '2014-02-26', '06:25:43'),
(13, 12, 'Iresha Sellehandie', 'iresha', '2014-02-26', '06:25:51'),
(14, 14, 'Iresha Sellehandie', 'test', '2014-02-27', '04:05:09'),
(15, 14, 'Iresha Sellehandie', 'Remark Final Review Date', '2014-02-27', '04:05:16'),
(16, 14, 'Iresha Sellehandie', 'Remark Initial Review Date', '2014-02-27', '04:05:26'),
(17, 22, 'Iresha Sellehandie', 'edfff', '2014-02-27', '06:01:42'),
(18, 22, 'Iresha Sellehandie', 'dfdfref', '2014-02-27', '06:01:50'),
(19, 13, 'Iresha Sellehandie', 'iresha', '2014-02-27', '06:45:50'),
(20, 13, 'Iresha Sellehandie', 'iresha', '2014-02-27', '06:45:55'),
(21, 25, 'Iresha Sellehandie', 'ssss', '2014-02-27', '06:55:33'),
(22, 25, 'Iresha Sellehandie', 'ssss', '2014-02-27', '06:55:38'),
(23, 12, 'dinesh', 'iresha', '2014-02-27', '12:15:55'),
(24, 12, 'dinesh', 'test', '2014-02-27', '12:16:04'),
(25, 17, 'dinesh', 'yryytuy', '2014-03-14', '04:32:42'),
(26, 17, 'dinesh', 'u67u67u67', '2014-03-14', '04:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meeting_responsibles_details`
--

CREATE TABLE IF NOT EXISTS `tbl_meeting_responsibles_details` (
  `responsibles_details_id` int(4) NOT NULL AUTO_INCREMENT,
  `meeting_responsibles_id` int(4) NOT NULL,
  `esponsibility_person` varchar(45) NOT NULL,
  `follow_up_person` varchar(45) NOT NULL,
  `added_date` date NOT NULL,
  `added_time` time NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`responsibles_details_id`),
  KEY `meeting_responsibles_id` (`meeting_responsibles_id`),
  KEY `meeting_responsibles_id_2` (`meeting_responsibles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_meeting_responsibles_details`
--

INSERT INTO `tbl_meeting_responsibles_details` (`responsibles_details_id`, `meeting_responsibles_id`, `esponsibility_person`, `follow_up_person`, `added_date`, `added_time`, `status`) VALUES
(1, 21, '0002', 'APM0002', '2014-02-09', '17:57:48', 1),
(2, 21, 'APM0002', 'ddedd', '2014-02-09', '17:57:48', 1),
(3, 23, 'APM00001', 'APM00003', '2014-02-27', '06:00:51', 1),
(4, 24, 'APM00001', 'APM0002', '2014-02-27', '06:44:43', 1),
(5, 25, 'APM00001', 'APM0002', '2014-02-27', '06:55:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meeting_type`
--

CREATE TABLE IF NOT EXISTS `tbl_meeting_type` (
  `meeting_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meeting_type` varchar(45) DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `added_time` time DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`meeting_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_meeting_type`
--

INSERT INTO `tbl_meeting_type` (`meeting_type_id`, `meeting_type`, `added_date`, `added_time`, `status`) VALUES
(1, 'Board Meeting', '2014-01-21', '21:02:01', 1),
(2, 'Branch Meeting', '2014-01-21', '21:02:01', 0),
(24, 'Branch Meeting', '2014-02-06', '11:15:10', 1),
(25, 'test', '2014-02-06', '11:15:17', 0),
(26, 'weer', '2014-02-06', '11:38:19', 0),
(27, '', '2014-02-11', '04:50:28', 0),
(28, 'qweqew', '2014-03-04', '09:51:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monthly_target_additional`
--

CREATE TABLE IF NOT EXISTS `tbl_monthly_target_additional` (
  `monthly_target_additional_id` int(11) NOT NULL AUTO_INCREMENT,
  `monthly_target_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`monthly_target_additional_id`),
  KEY `fk_m_t_id_idx` (`monthly_target_id`),
  KEY `fk_item_id_no_idx` (`item_id`),
  KEY `fk_item_id_xxxx_idx` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_monthly_target_additional`
--

INSERT INTO `tbl_monthly_target_additional` (`monthly_target_additional_id`, `monthly_target_id`, `item_id`, `item_qty`, `status`) VALUES
(1, 2, 1, 3, '1'),
(2, 14, 1, 2, '1'),
(3, 14, 1, 22, '1'),
(4, 7, 1, 10, '1'),
(5, 15, 1, 30, '1'),
(6, 16, 3, 45, '1'),
(7, 17, 3, 45, '1'),
(8, 18, 3, 40, '1'),
(9, 19, 4, 350, '1'),
(10, 20, 4, 1000, '1'),
(11, 21, 4, 350, '1'),
(12, 22, 1, 35, '1'),
(15, 22, 2, 33, '1'),
(16, 23, 2, 10, '1'),
(17, 24, 2, 100, '1'),
(18, 25, 12, 250, '1'),
(19, 26, 83, 330, '1'),
(20, 26, 50, 80, '1'),
(21, 26, 12, 44, '1'),
(22, 28, 14, 22, '1'),
(23, 28, 15, 222, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monthly_target_minimum`
--

CREATE TABLE IF NOT EXISTS `tbl_monthly_target_minimum` (
  `monthly_target_minimum_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `monthly_target_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_qty` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`monthly_target_minimum_detail_id`),
  KEY `fk_monthly_target_id_idx` (`monthly_target_id`),
  KEY `item_id_idx` (`item_id`),
  KEY `fk_item_id_no_idx` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_monthly_target_minimum`
--

INSERT INTO `tbl_monthly_target_minimum` (`monthly_target_minimum_detail_id`, `monthly_target_id`, `item_id`, `item_qty`, `status`) VALUES
(1, 1, 1, 5, 1),
(2, 2, 1, 45, 1),
(3, 3, 1, 20, 0),
(4, 4, 1, 30, 1),
(5, 5, 1, 10, 1),
(6, 2, 2, 10, 1),
(7, 7, 1, 100, 1),
(8, 8, 1, 100, 1),
(9, 7, 2, 55, 1),
(10, 11, 1, 200, 1),
(11, 12, 2, 200, 1),
(12, 13, 2, 200, 1),
(13, 14, 1, 15, 1),
(14, 15, 1, 50, 1),
(15, 16, 4, 60, 1),
(16, 17, 4, 80, 1),
(17, 18, 4, 240, 1),
(22, 23, 2, 10, 1),
(23, 24, 2, 100, 1),
(24, 25, 9, 100, 1),
(25, 26, 50, 450, 1),
(26, 26, 11, 33, 1),
(27, 26, 12, 45, 1),
(28, 28, 13, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_man_wise_profitability`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_man_wise_profitability` (
  `id_sales_man_wise_profitability` int(11) NOT NULL AUTO_INCREMENT,
  `turn_over` double NOT NULL,
  `cost_of_sales` double NOT NULL,
  `allocation` double NOT NULL,
  `iou` double NOT NULL,
  `meals` double NOT NULL,
  `lodging` double NOT NULL,
  `fuel` double NOT NULL,
  `traveling` double NOT NULL,
  `stationary` double NOT NULL,
  `telephone` double NOT NULL,
  `other` double NOT NULL,
  `type` int(1) NOT NULL COMMENT '1=Budget,2=Actual',
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `sales_officer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_sales_man_wise_profitability`),
  KEY `sales_officer_id` (`sales_officer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=385 ;

--
-- Dumping data for table `tbl_sales_man_wise_profitability`
--

INSERT INTO `tbl_sales_man_wise_profitability` (`id_sales_man_wise_profitability`, `turn_over`, `cost_of_sales`, `allocation`, `iou`, `meals`, `lodging`, `fuel`, `traveling`, `stationary`, `telephone`, `other`, `type`, `year`, `month`, `sales_officer_id`, `status`) VALUES
(1, 45622, 0, 4, 4, 0, 0, 12, 0, 563, 52, 0, 1, 2014, 1, 1, 1),
(2, 0, 0, 14, 4, 0, 0, 0, 0, 0, 0, 40, 2, 2014, 1, 1, 1),
(3, 110, 25, 0, 0, 0, 0, 52, 0, 0, 0, 0, 1, 2014, 2, 1, 1),
(4, 0, 0, 0, 0, 0, 0, 52, 0, 0, 0, 0, 2, 2014, 2, 1, 1),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 1, 1),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 1, 1),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 1, 1),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 1, 1),
(9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 1, 1),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 1, 1),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 1, 1),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 1, 1),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 1, 1),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 1, 1),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 1, 1),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 1, 1),
(17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 1, 1),
(18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 1, 1),
(19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 1, 1),
(20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 1, 1),
(21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 1, 1),
(22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 1, 1),
(23, 1000, 0, 100, 200, 300, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 1, 1),
(24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 1, 1),
(25, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 2014, 1, 33, 1),
(26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2, 2014, 1, 33, 1),
(27, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25, 10, 1, 2014, 2, 33, 1),
(28, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25, 0, 2, 2014, 2, 33, 1),
(29, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 33, 1),
(30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 33, 1),
(31, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 33, 1),
(32, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 33, 1),
(33, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 33, 1),
(34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 33, 1),
(35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 33, 1),
(36, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 33, 1),
(37, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 33, 1),
(38, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 33, 1),
(39, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 33, 1),
(40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 33, 1),
(41, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 33, 1),
(42, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 33, 1),
(43, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 33, 1),
(44, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 33, 1),
(45, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 33, 1),
(46, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 33, 1),
(47, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 33, 1),
(48, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 33, 1),
(49, 0, 0, 0, 0, 0, 10, 0, 123, 0, 0, 0, 1, 2014, 1, 2, 1),
(50, 0, 0, 0, 0, 0, 0, 10, 123, 0, 0, 0, 2, 2014, 1, 2, 1),
(51, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 2, 2, 1),
(52, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 2, 2, 1),
(53, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 2, 1),
(54, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 2, 1),
(55, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 2, 1),
(56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 2, 1),
(57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 2, 1),
(58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 2, 1),
(59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 2, 1),
(60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 2, 1),
(61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 2, 1),
(62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 2, 1),
(63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 2, 1),
(64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 2, 1),
(65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 2, 1),
(66, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 2, 1),
(67, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 2, 1),
(68, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 2, 1),
(69, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 2, 1),
(70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 2, 1),
(71, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 2, 1),
(72, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 2, 1),
(73, 0, 0, 0, 0, 0, 23, 0, 0, 0, 0, 0, 1, 2014, 1, 6, 1),
(74, 0, 0, 0, 0, 0, 23, 0, 0, 0, 0, 0, 2, 2014, 1, 6, 1),
(75, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 1, 2014, 2, 6, 1),
(76, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 2, 2014, 2, 6, 1),
(77, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 6, 1),
(78, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 6, 1),
(79, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 6, 1),
(80, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 6, 1),
(81, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 6, 1),
(82, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 6, 1),
(83, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 6, 1),
(84, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 6, 1),
(85, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 6, 1),
(86, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 6, 1),
(87, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 6, 1),
(88, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 6, 1),
(89, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 6, 1),
(90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 6, 1),
(91, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 6, 1),
(92, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 6, 1),
(93, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 6, 1),
(94, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 6, 1),
(95, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 6, 1),
(96, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 6, 1),
(97, 1, 0, 1, 0, 0, 23, 0, 0, 0, 0, 0, 1, 2014, 1, 50, 1),
(98, 0, 0, 1, 0, 0, 23, 0, 0, 0, 0, 0, 2, 2014, 1, 50, 1),
(99, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 1, 2014, 2, 50, 1),
(100, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 2, 2014, 2, 50, 1),
(101, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 50, 1),
(102, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 50, 1),
(103, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 50, 1),
(104, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 50, 1),
(105, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 50, 1),
(106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 50, 1),
(107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 50, 1),
(108, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 50, 1),
(109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 50, 1),
(110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 50, 1),
(111, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 50, 1),
(112, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 50, 1),
(113, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 50, 1),
(114, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 50, 1),
(115, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 50, 1),
(116, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 50, 1),
(117, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 50, 1),
(118, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 50, 1),
(119, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 50, 1),
(120, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 50, 1),
(121, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 1, 35, 1),
(122, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 1, 35, 1),
(123, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 2, 35, 1),
(124, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 2, 35, 1),
(125, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 35, 1),
(126, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 35, 1),
(127, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 35, 1),
(128, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 35, 1),
(129, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 35, 1),
(130, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 35, 1),
(131, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 35, 1),
(132, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 35, 1),
(133, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 35, 1),
(134, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 35, 1),
(135, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 35, 1),
(136, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 35, 1),
(137, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 35, 1),
(138, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 35, 1),
(139, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 35, 1),
(140, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 35, 1),
(141, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 35, 1),
(142, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 35, 1),
(143, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 35, 1),
(144, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 35, 1),
(145, 1000, 0, 1, 0, 0, 0, 0, 0, 0, 0, 10, 1, 2014, 1, 15, 1),
(146, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 1, 15, 1),
(147, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 2, 15, 1),
(148, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 2, 15, 1),
(149, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 15, 1),
(150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 15, 1),
(151, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 15, 1),
(152, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 15, 1),
(153, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 15, 1),
(154, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 15, 1),
(155, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 15, 1),
(156, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 15, 1),
(157, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 15, 1),
(158, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 15, 1),
(159, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 15, 1),
(160, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 15, 1),
(161, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 15, 1),
(162, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 15, 1),
(163, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 15, 1),
(164, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 15, 1),
(165, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 15, 1),
(166, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 15, 1),
(167, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 15, 1),
(168, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 15, 1),
(169, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 1, 20, 1),
(170, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 1, 20, 1),
(171, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 2, 20, 1),
(172, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 2, 20, 1),
(173, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 20, 1),
(174, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 20, 1),
(175, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 20, 1),
(176, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 20, 1),
(177, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 20, 1),
(178, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 20, 1),
(179, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 20, 1),
(180, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 20, 1),
(181, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 20, 1),
(182, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 20, 1),
(183, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 20, 1),
(184, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 20, 1),
(185, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 20, 1),
(186, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 20, 1),
(187, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 20, 1),
(188, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 20, 1),
(189, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 20, 1),
(190, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 20, 1),
(191, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 20, 1),
(192, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 20, 1),
(193, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 1, 19, 1),
(194, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 1, 19, 1),
(195, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 2, 19, 1),
(196, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 2, 19, 1),
(197, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 19, 1),
(198, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 19, 1),
(199, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 19, 1),
(200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 19, 1),
(201, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 19, 1),
(202, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 19, 1),
(203, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 19, 1),
(204, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 19, 1),
(205, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 19, 1),
(206, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 19, 1),
(207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 19, 1),
(208, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 19, 1),
(209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 19, 1),
(210, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 19, 1),
(211, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 19, 1),
(212, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 19, 1),
(213, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 19, 1),
(214, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 19, 1),
(215, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 19, 1),
(216, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 19, 1),
(217, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 1, 5, 1),
(218, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 1, 5, 1),
(219, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 2, 5, 1),
(220, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 2, 5, 1),
(221, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 5, 1),
(222, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 5, 1),
(223, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 5, 1),
(224, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 5, 1),
(225, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 5, 1),
(226, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 5, 1),
(227, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 5, 1),
(228, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 5, 1),
(229, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 5, 1),
(230, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 5, 1),
(231, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 5, 1),
(232, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 5, 1),
(233, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 5, 1),
(234, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 5, 1),
(235, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 5, 1),
(236, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 5, 1),
(237, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 5, 1),
(238, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 5, 1),
(239, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 5, 1),
(240, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 5, 1),
(241, 0, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 1, 17, 1),
(242, 0, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 1, 17, 1),
(243, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 2, 17, 1),
(244, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 2, 17, 1),
(245, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 17, 1),
(246, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 17, 1),
(247, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 17, 1),
(248, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 17, 1),
(249, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 17, 1),
(250, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 17, 1),
(251, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 17, 1),
(252, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 17, 1),
(253, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 17, 1),
(254, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 17, 1),
(255, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 17, 1),
(256, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 17, 1),
(257, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 17, 1),
(258, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 17, 1),
(259, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 17, 1),
(260, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 17, 1),
(261, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 17, 1),
(262, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 17, 1),
(263, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 17, 1),
(264, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 17, 1),
(265, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 1, 43, 1),
(266, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 1, 43, 1),
(267, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 2, 43, 1),
(268, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 2, 43, 1),
(269, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 43, 1),
(270, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 43, 1),
(271, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 43, 1),
(272, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 43, 1),
(273, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 43, 1),
(274, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 43, 1),
(275, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 43, 1),
(276, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 43, 1),
(277, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 43, 1),
(278, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 43, 1),
(279, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 43, 1),
(280, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 43, 1),
(281, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 43, 1),
(282, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 43, 1),
(283, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 43, 1),
(284, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 43, 1),
(285, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 43, 1),
(286, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 43, 1),
(287, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 43, 1),
(288, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 43, 1),
(289, 0, 0, 25, 0, 0, 36, 0, 0, 0, 0, 0, 1, 2014, 1, 7, 1),
(290, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 1, 7, 1),
(291, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 2, 7, 1),
(292, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 2, 7, 1),
(293, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 3, 7, 1),
(294, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 3, 7, 1),
(295, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 4, 7, 1),
(296, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 4, 7, 1),
(297, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 5, 7, 1),
(298, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 5, 7, 1),
(299, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 6, 7, 1),
(300, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 6, 7, 1),
(301, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 7, 7, 1),
(302, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 7, 7, 1),
(303, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 8, 7, 1),
(304, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 8, 7, 1),
(305, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 9, 7, 1),
(306, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 9, 7, 1),
(307, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 10, 7, 1),
(308, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 10, 7, 1),
(309, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 11, 7, 1),
(310, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 11, 7, 1),
(311, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2014, 12, 7, 1),
(312, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2014, 12, 7, 1),
(313, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 1, 1, 1),
(314, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 1, 1, 1),
(315, 10, 23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 2, 1, 1),
(316, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 2, 1, 1),
(317, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 3, 1, 1),
(318, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 3, 1, 1),
(319, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 4, 1, 1),
(320, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 4, 1, 1),
(321, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 5, 1, 1),
(322, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 5, 1, 1),
(323, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 6, 1, 1),
(324, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 6, 1, 1),
(325, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 7, 1, 1),
(326, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 7, 1, 1),
(327, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 8, 1, 1),
(328, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 8, 1, 1),
(329, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 9, 1, 1),
(330, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 9, 1, 1),
(331, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 10, 1, 1),
(332, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 10, 1, 1),
(333, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 11, 1, 1),
(334, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 11, 1, 1),
(335, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 12, 1, 1),
(336, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 12, 1, 1),
(337, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 1, 33, 1),
(338, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 1, 33, 1),
(339, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 2, 33, 1),
(340, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 2, 33, 1),
(341, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 3, 33, 1),
(342, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 3, 33, 1),
(343, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 4, 33, 1),
(344, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 4, 33, 1),
(345, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 5, 33, 1),
(346, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 5, 33, 1),
(347, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 6, 33, 1),
(348, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 6, 33, 1),
(349, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 7, 33, 1),
(350, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 7, 33, 1),
(351, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 8, 33, 1),
(352, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 8, 33, 1),
(353, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 9, 33, 1),
(354, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 9, 33, 1),
(355, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 10, 33, 1),
(356, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 10, 33, 1),
(357, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 11, 33, 1),
(358, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 11, 33, 1),
(359, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2004, 12, 33, 1),
(360, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2004, 12, 33, 1),
(361, 586, 200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 1, 15, 1),
(362, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 1, 15, 1),
(363, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 2, 15, 1),
(364, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 2, 15, 1),
(365, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 3, 15, 1),
(366, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 3, 15, 1),
(367, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 4, 15, 1),
(368, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 4, 15, 1),
(369, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 5, 15, 1),
(370, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 5, 15, 1),
(371, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 6, 15, 1),
(372, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 6, 15, 1),
(373, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 7, 15, 1),
(374, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 7, 15, 1),
(375, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 8, 15, 1),
(376, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 8, 15, 1),
(377, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 9, 15, 1),
(378, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 9, 15, 1),
(379, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 10, 15, 1),
(380, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 10, 15, 1),
(381, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 11, 15, 1),
(382, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 11, 15, 1),
(383, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2006, 12, 15, 1),
(384, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2006, 12, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_officer`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_officer` (
  `sales_officer_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_officer_account_no` varchar(45) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `sales_officer_name` varchar(45) DEFAULT NULL,
  `sales_officer_tel` varchar(45) DEFAULT '-',
  `sales_officer_address` varchar(45) DEFAULT '-',
  `email_address` varchar(45) DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `sales_officer_code` varchar(45) DEFAULT NULL,
  `sales_type_id` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sales_officer_id`),
  KEY `fk_tbl_sales_officer_branch_id` (`branch_id`),
  KEY `fk_sales_type_id_idx` (`sales_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `tbl_sales_officer`
--

INSERT INTO `tbl_sales_officer` (`sales_officer_id`, `sales_officer_account_no`, `branch_id`, `sales_officer_name`, `sales_officer_tel`, `sales_officer_address`, `email_address`, `added_date`, `added_time`, `sales_officer_code`, `sales_type_id`, `status`) VALUES
(1, '4032', 1, 'KapilaDisanayake', '-', 'JetawanaRoad', '-', '2014-02-20', '10:00:00AM', 'dmk', 2, '1'),
(2, '1224', 1, 'SrimalWickramasinghe', '-', 'KandyBranch', 'sasanka.wickramasingha@dimolanka.com', '2014-02-20', '10:00:00AM', 'sts', 2, '1'),
(3, '4920', 1, 'GayanJayasinghe', '-', 'KandyBranch', 'gayan.jayasinghe@dimolanka.com', '2014-02-20', '10:00:00AM', 'gcj', 2, '1'),
(4, '-', 1, 'ArunaKarunarathne', '-', '-', '', '2014-02-20', '10:00:00AM', 'ask', 2, '1'),
(5, '4811', 2, 'MadushanAlgerathne', '-', 'KandyBranch', 'madushan.algerathne@dimol', '2014-02-20', '10:00:00AM', 'ada', 2, '1'),
(6, '4127', 2, 'ShanakaGunathilaka', '-', 'BloemendhalRoad', '-', '2014-02-20', '10:00:00AM', 'sgg', 1, '1'),
(7, '4421', 2, 'PrabathAthukorala', '-', 'JetawanaRoad', 'prabath.athukorala@dimola', '2014-02-20', '10:00:00AM', 'pwa', 1, '1'),
(8, '3930', 3, 'LinkenWeeraratna', '-', 'JetawanaRoad', '-', '2014-02-20', '10:01:00AM', 'liw', 2, '1'),
(9, '4889', 3, 'PriyanthaHewapathiranage', '-', 'MataraBranch', 'priyantha.kulathunga@dimo', '2014-02-20', '10:01:00AM', 'plg', 2, '1'),
(10, '4758', 3, 'ChamalWickramarachchi', '-', 'JetawanaRoad', 'chamal.wickramarachchi@di', '2014-02-20', '10:01:00AM', 'cnw', 2, '1'),
(11, '984823', 3, 'DuminduPathiranage', '-', 'MataraBranch', 'dumindu.pathiranage@dimol', '2014-02-20', '10:01:00AM', 'plp', 1, '1'),
(12, '4389', 3, 'ThilinaSwarnabandu', '-', 'Matara', 'thilina.swarnabandu@dimol', '2014-02-20', '10:01:00AM', 'tss', 1, '1'),
(13, '4670', 8, 'NamalAmarasinghe', '-', 'Kuruwita-Embilipit', 'namal.amarasinghe@dimolan', '2014-02-20', '10:02:00AM', 'dna', 2, '1'),
(14, '3608', 8, 'PriyanthaWijesinghe', '-', 'Kuruwita', 'priyantha.wijesinghe@dimo', '2014-02-20', '10:02:00AM', 'ppw', 2, '1'),
(15, '3904', 8, 'JaliyaChathuranga', '-', 'JetawanaRoad', '-', '2014-02-20', '10:02:00AM', 'hhj', 1, '1'),
(16, '4380', 9, 'PrasadSanjeewa', '-', 'JetawanaRoad', 'prasad.sanjeewa@dimolanka', '2014-02-20', '10:03:00AM', 'hmp', 2, '1'),
(17, '4766', 9, 'MilindaKathrige', '-', 'KurunegalaBranch', 'milinda.kathrige@dimolank', '2014-02-20', '10:03:00AM', 'mrk', 2, '1'),
(18, '4892', 10, 'Pasindunayanananda', '-', 'Kuranegala', 'pasindu.nayanananda@dimol', '2014-02-20', '10:03:00AM', 'psn', 2, '1'),
(19, '1377', 9, 'IndikaBandaranayake', '-', 'KurunegalaBranch', 'indika.Bandaranayake@dimo', '2014-02-20', '10:03:00AM', 'idb', 1, '1'),
(20, '4924', 9, 'HeshanWijesundara', '-', 'KurunegalaBranch', 'heshan.wijesundara@dimola', '2014-02-20', '10:03:00AM', 'hew', 1, '1'),
(21, '4938', 9, 'AnuraSrinarayana', '-', 'KurunegalaBranch', 'anura.srinarayanal@dimola', '2014-02-20', '10:03:00AM', 'sbm', 1, '1'),
(22, '5057', 11, 'SekarPirathap', '-', 'Syambalape', 'sekar.pirathap@dimolanka.', '2014-02-20', '10:04:00AM', 'pir', 2, '1'),
(23, '4976', 12, 'GanamoothyManoch', '-', 'JaffnaBranch', 'ganamoothy.manoch@dimolan', '2014-02-20', '10:04:00AM', 'mar', 2, '1'),
(24, '2594', 11, 'ChristyFernando', '-', 'JetawanaRoad', '-', '2014-02-20', '10:04:00AM', 'crf', 1, '1'),
(25, '4067', 13, 'NimalJayaweera', '-', 'AnuradhapuraBranch', '-', '2014-02-20', '10:05:00AM', 'ewn', 2, '1'),
(26, '4679', 13, 'MilanGunawardana', '-', 'JetawanaRoad', 'milan.gunawardana@dimolan', '2014-02-20', '10:05:00AM', 'mdg', 2, '1'),
(27, '4955', 13, 'NilankaHeshan', '-', 'AnuradhapuraBranch', 'nilanka.heshan@dimolanka.', '2014-02-20', '10:05:00AM', 'lnh', 2, '1'),
(28, '-', 13, 'NALINDRASAMITH', '-', 'ANURADHAPURA', '-', '2014-02-20', '10:05:00AM', 'MGN', 2, '1'),
(29, '4518', 13, 'PradeepThilakarathne', '-', 'KurunegalaBranch', 'pradeep.thilakarathne@dim', '2014-02-20', '10:05:00AM', 'prt', 1, '1'),
(30, '4805', 13, 'AsankaAmarasingha', '-', 'AnuradhapuraBranch', 'asanka.amarasingha@dimola', '2014-02-20', '10:05:00AM', 'apr', 1, '1'),
(31, '4940', 14, 'AzarIsham', '-', 'Anuradhupura', 'azar.isham@dimolanka.com', '2014-02-20', '10:06:00AM', 'azm', 2, '1'),
(32, '1221', 15, 'JemzilUthumalebbe', '-', 'JetawanaRoad', 'jemzil.uthumalebbe@dimola', '2014-02-20', '10:07:00AM', 'jem', 2, '1'),
(33, '5146', 15, 'KalpaPerera', '-', 'AmparaBranch', 'kalpa.perera@dimolanka.co', '2014-02-20', '10:07:00AM', 'suj', 2, '1'),
(34, '869', 4, 'ChrishanthaSilva', '-', 'JetawanaRoad', 'chrishantha.silva@dimolan', '2014-02-20', '10:08:00AM', 'ipc', 2, '1'),
(35, '4183', 4, 'KandasamyAnbalagan', '-', 'ColomboBranch', 'kandasamy.anbalagan@dimol', '2014-02-20', '10:08:00AM', 'kab', 2, '1'),
(36, '4922', 4, 'MohanDharmakeerthi', '-', 'ColomboBranch', 'mohan.dharmakeerthi@dimol', '2014-02-20', '10:08:00AM', 'nvm', 2, '1'),
(37, '98945', 4, 'TeenaWijesundara', '-', 'ColomboBranch', 'teena.wijesundara@dimolan', '2014-02-20', '10:08:00AM', 'tee', 2, '1'),
(38, '-', 4, 'RumeshCharith', '-', '-', '-', '2014-02-20', '10:08:00AM', 'RUC', 2, '1'),
(39, '98946', 5, 'ChathurikaDissanayake', '-', 'ColomboBranch', 'chathurika.dissanayake@di', '2014-02-20', '10:09:00AM', 'dcd', 2, '1'),
(40, '4567', 5, 'ArunaShanthaAlwis', '-', 'Syambalape', 'aruna.alwis@dimolanka.com', '2014-02-20', '10:09:00AM', 'asw', 2, '1'),
(41, '3882', 5, 'LalindaHarshaPerera', '-', 'JetawanaRoad', '-', '2014-02-20', '10:09:00AM', 'lah', 2, '1'),
(42, '3981', 5, 'DamithaSandaruwan', '-', 'JetawanaRoad', '-', '2014-02-20', '10:09:00AM', 'rdd', 2, '1'),
(43, '4057', 5, 'MalakaMaduranga', '-', 'JetawanaRoad', '-', '2014-02-20', '10:09:00AM', 'dmm', 2, '1'),
(44, '4395', 5, 'ChamindaDinesh', '-', 'Syambalape', 'chaminda.dinesh@dimolanka', '2014-02-20', '10:09:00AM', 'cad', 2, '1'),
(45, '3080', 5, 'PrabathRohana', '-', 'ColomboBranch', 'prabath.rohana@dimolanka.', '2014-02-20', '10:09:00AM', 'prr', 2, '1'),
(46, '4397', 6, 'KasunRangana', '-', 'ColomboBranch', 'kasun.rangana@dimolanka.c', '2014-02-20', '10:10:00AM', 'kpr', 2, '1'),
(47, '98943', 6, 'IreshaWickramaarachchi', '-', 'ColomboBranch', 'iresha.wickramaarachchi@d', '2014-02-20', '10:10:00AM', 'wai', 2, '1'),
(48, '4022', 7, 'LakmalSamarasinghe', '-', 'JetawanaRoad', 'lakmal.samarasinghe@dimol', '2014-02-20', '10:11:00AM', 'lks', 2, '1'),
(49, '98955', 7, 'DinushaMeedenidewage', '-', 'ColomboBranch', 'dinusha.meedenidewage@dim', '2014-02-20', '10:11:00AM', 'ddd', 2, '1'),
(50, '262', 4, 'SampathHettige', '-', 'JetawanaRoad', 'sampath.hettige@dimolanka', '2014-02-20', '10:12:00AM', 'sap', 5, '1'),
(51, '119', 4, 'WalterAbeysekera', '-', 'JetawanaRoad', 'walter.abeysekera@dimolan', '2014-02-20', '10:12:00AM', 'wal', 5, '1'),
(52, '3727', 4, 'AmilaUmayanga', '-', 'ColomboBranch', 'Amila.umayanga@dimolanka.', '2014-02-20', '10:12:00AM', 'aga', 5, '1'),
(53, '1318', 4, 'AnnesleyRanasinghe', '-', 'ColomboBranch', 'annesley.ranasinghe@dimol', '2014-02-20', '10:14:00AM', 'anr', 1, '1'),
(54, '4791', 4, 'LankeshWeerathunga', '-', 'ColomboBranch', 'lankesh.weerathunga@dimol', '2014-02-20', '10:14:00AM', 'plc', 1, '1'),
(55, '87899', 3, 'Dinesh', '8798465', 'Galle', 'dinesh@', '2014-03-11', '19:19:40', 'DIN', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_officer_daily_visit`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_officer_daily_visit` (
  `daily_visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_officer_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `visit_date` varchar(45) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `route` varchar(1000) DEFAULT NULL,
  `visit_category_id` int(11) NOT NULL,
  `purpose_id` int(11) NOT NULL,
  `other_details` varchar(10000) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `lan` double DEFAULT NULL,
  `lot` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`daily_visit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_officer_monthly_target`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_officer_monthly_target` (
  `monthly_target_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_officer_id` int(11) DEFAULT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `year` double DEFAULT '2014',
  `month` double DEFAULT '4',
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`monthly_target_id`),
  KEY `fk_sales_officer_id_for_target_idx` (`sales_officer_id`),
  KEY `fk_dealer_id_idx` (`dealer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_sales_officer_monthly_target`
--

INSERT INTO `tbl_sales_officer_monthly_target` (`monthly_target_id`, `sales_officer_id`, `dealer_id`, `year`, `month`, `added_date`, `added_time`, `status`) VALUES
(1, 1, 1, 2014, 1, NULL, NULL, 1),
(2, 8, 1, 2014, 4, NULL, NULL, 1),
(3, 9, 1, 2014, 4, NULL, NULL, 1),
(4, 10, 1, 2014, 4, NULL, NULL, 1),
(5, 2, 1, 2014, 4, NULL, NULL, 1),
(6, 3, 1, 2013, 4, NULL, NULL, 1),
(7, 12, 2, 2013, 4, NULL, NULL, 1),
(8, 13, 1, 2014, 4, NULL, NULL, 1),
(9, 15, 1, 2013, 4, NULL, NULL, 1),
(10, 9, 1, 2014, 4, NULL, NULL, 1),
(11, 1, 1, 2014, 4, NULL, NULL, 1),
(12, 2, 1, 2014, 4, NULL, NULL, 1),
(13, 3, 1, 2014, 4, NULL, NULL, 1),
(14, 7, 1, 2014, 4, NULL, NULL, 1),
(15, 1, 1, 2014, 4, NULL, NULL, 1),
(16, 8, 1, 2014, 4, NULL, NULL, 1),
(17, 9, 1, 2014, 4, NULL, NULL, 1),
(18, 31, 1, 2014, 4, NULL, NULL, 1),
(19, 23, 1, 2014, 4, NULL, NULL, 1),
(20, 25, 1, 2014, 4, NULL, NULL, 1),
(21, 4, 1, 2014, 4, NULL, NULL, 1),
(22, 55, 1, 2014, 4, NULL, NULL, 1),
(23, 1, 1, 2014, 4, NULL, NULL, 1),
(24, 1, 1, 2014, 4, NULL, NULL, 1),
(25, 1, 1, 2014, 4, NULL, NULL, 1),
(26, 32, 1, 2014, 4, NULL, NULL, 1),
(27, 33, 1, 2014, 4, NULL, NULL, 1),
(28, 55, 1, 2014, 4, NULL, NULL, 1),
(29, 1, 1, 2014, 4, NULL, NULL, 1),
(30, 7, 88, 2014, 12, '2014:03:17', '11:02:33', 1),
(31, 54, 50, 2014, 9, '2014:03:17', '11:04:41', 1),
(32, 54, 44, 2014, 11, '2014:03:17', '11:05:41', 1),
(33, 11, 47, 2014, 12, '2014:03:17', '11:11:10', 1),
(34, 29, 212, 2014, 11, '2014:03:17', '11:14:38', 1),
(35, 29, 212, 2014, 11, '2014:03:17', '11:15:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_officer_visit`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_officer_visit` (
  `sales_officer_visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_officer_id` int(11) DEFAULT NULL,
  `visit_time` varchar(45) DEFAULT NULL,
  `route` varchar(45) DEFAULT NULL,
  `customer_category` varchar(45) DEFAULT NULL,
  `purpose` varchar(45) DEFAULT NULL,
  `visit_address` varchar(45) CHARACTER SET big5 DEFAULT NULL,
  `account_no_OR_vehicle_no` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sales_officer_visit_id`),
  KEY `fk_tbl_sales_officer_visit_s_o_id` (`sales_officer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_officer_wise_budget`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_officer_wise_budget` (
  `sales_officer_wise_budget_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_officer_id` int(11) NOT NULL,
  `year` double NOT NULL,
  `month` int(11) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `budget_amount` double DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `number_of_working_days` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`sales_officer_wise_budget_id`),
  KEY `fk_S_O_id_idx` (`sales_officer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_sales_officer_wise_budget`
--

INSERT INTO `tbl_sales_officer_wise_budget` (`sales_officer_wise_budget_id`, `sales_officer_id`, `year`, `month`, `added_date`, `budget_amount`, `added_time`, `number_of_working_days`, `status`) VALUES
(1, 8, 2013, 2, '2014-03-02', 25000, '14:25:37', 24, 1),
(2, 9, 2013, 2, '2014-03-02', 25000, '14:25:37', 24, 1),
(3, 10, 2013, 2, '2014-03-02', 25000, '14:25:37', 24, 1),
(4, 11, 2013, 2, '2014-03-02', 25000, '14:25:37', 24, 1),
(5, 12, 2013, 2, '2014-03-02', 25000, '14:25:37', 24, 1),
(6, 8, 2014, 2, '2014-03-02', 25000, '14:25:58', 24, 1),
(7, 9, 2014, 2, '2014-03-02', 25000, '14:25:58', 24, 1),
(8, 10, 2014, 2, '2014-03-02', 25000, '14:25:58', 24, 1),
(9, 11, 2014, 2, '2014-03-02', 25000, '14:25:58', 24, 1),
(10, 12, 2014, 2, '2014-03-02', 25000, '14:25:58', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_type`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_type` (
  `sales_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_type_name` varchar(45) NOT NULL,
  `sales_type_code` varchar(45) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`sales_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_sales_type`
--

INSERT INTO `tbl_sales_type` (`sales_type_id`, `sales_type_name`, `sales_type_code`, `added_date`, `added_time`, `status`) VALUES
(1, 'Field Sales', 'F', '2014-01-23', '9:09', 1),
(2, 'Counter Sales', 'C', '2014-01-23', '9:10', 1),
(3, 'Work Shop Normal Repairs', 'W1', '2014-01-23', '9:11', 1),
(4, 'Work shop warranty Repairs', 'W2', '2014-01-23', '9:12', 1),
(5, 'Institutional', 'I', '2014-01-23', '9:13', 1),
(6, 'Other Sales', NULL, '2014-01-23', '9:14', 1),
(7, 'PDI', NULL, '2014-01-24', '9:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_type_budget`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_type_budget` (
  `sales_type_budget_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_type_id` int(11) NOT NULL,
  `budget_amount` double NOT NULL,
  `year` double NOT NULL,
  `month` varchar(45) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`sales_type_budget_id`),
  KEY `type_id_idx` (`sales_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_sales_type_budget`
--

INSERT INTO `tbl_sales_type_budget` (`sales_type_budget_id`, `sales_type_id`, `budget_amount`, `year`, `month`, `added_date`, `added_time`, `status`) VALUES
(1, 1, 0, 2014, '01', '2014-01-25', '13:13:39', 1),
(2, 2, 0, 2014, '01', '2014-01-25', '13:13:39', 1),
(3, 3, 0, 2014, '01', '2014-01-25', '13:13:39', 1),
(4, 4, 0, 2014, '01', '2014-01-25', '13:13:39', 1),
(5, 5, 0, 2014, '01', '2014-01-25', '13:13:39', 1),
(6, 6, 0, 2014, '01', '2014-01-25', '13:13:39', 1),
(7, 7, 0, 2014, '01', '2014-01-25', '13:13:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_special_promotion`
--

CREATE TABLE IF NOT EXISTS `tbl_special_promotion` (
  `special_promotion_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  `starting_date` varchar(45) NOT NULL,
  `end_date` varchar(45) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`special_promotion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_special_promotion`
--

INSERT INTO `tbl_special_promotion` (`special_promotion_id`, `description`, `starting_date`, `end_date`, `added_date`, `status`) VALUES
(1, 'Shamil''s Birthday', '2014-04-01', '2014-04-30', '2014:02:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_special_promotion_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_special_promotion_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `special_promotion_id` int(5) NOT NULL,
  `item_id` int(11) NOT NULL,
  `discount` double DEFAULT NULL,
  `discount_type` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `FK_tbl_special_promotion_detail_1` (`special_promotion_id`),
  KEY `FK_tbl_special_promotion_item_id` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_special_promotion_detail`
--

INSERT INTO `tbl_special_promotion_detail` (`detail_id`, `special_promotion_id`, `item_id`, `discount`, `discount_type`, `status`) VALUES
(1, 1, 9, 7, 1, 1),
(2, 1, 13, 10, 1, 1),
(3, 1, 50, 20, 0, 1),
(4, 1, 68, 20, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_s_o_deliver_order`
--

CREATE TABLE IF NOT EXISTS `tbl_s_o_deliver_order` (
  `s_o_deliver_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_o_purchase_order_id` int(11) DEFAULT NULL,
  `add_deliver_date` date DEFAULT NULL,
  `add_deliver_time` time DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `total_discount` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_o_deliver_order_id`),
  KEY `fk_tbl_s_o_deliver_order_p_id_idx` (`s_o_purchase_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_s_o_deliver_order`
--

INSERT INTO `tbl_s_o_deliver_order` (`s_o_deliver_order_id`, `s_o_purchase_order_id`, `add_deliver_date`, `add_deliver_time`, `amount`, `total_discount`, `status`) VALUES
(16, 48, '2014-01-10', '16:28:04', 5382, 318, 1),
(17, 50, '2014-01-10', '16:29:32', 2627.5, 122.5, 1),
(18, 76, '2014-01-13', '08:42:18', 496, 4, 1),
(19, 75, '2014-01-13', '10:05:11', 2300, 200, 1),
(20, 58, '2014-01-13', '11:36:40', 498, 2, 1),
(21, 77, '2014-01-13', '11:54:39', 6808, 592, 1),
(22, 78, '2014-01-13', '14:11:20', 5135, 365, 1),
(23, 78, '2014-01-13', '14:11:33', 3616, 184, 1),
(24, 79, '2014-01-13', '14:13:37', 2375, 125, 1),
(25, 80, '2014-01-13', '14:41:55', 498, 2, 1),
(26, 59, '2014-01-17', '12:04:56', 2450, 50, 1),
(27, 81, '2014-01-17', '12:09:49', 498, 2, 1),
(28, 89, '2014-01-29', '15:56:10', 500, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_s_o_deliver_order_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_s_o_deliver_order_detail` (
  `s_o_deliver_order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_o_deliver_order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `unit_price` double NOT NULL,
  `qty` double DEFAULT NULL,
  `new_qty` int(11) DEFAULT NULL,
  `discount_type` int(1) NOT NULL,
  `discount` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_o_deliver_order_detail_id`),
  KEY `fk_tbl_s_o_deliver_order_detail_d_o_id_idx` (`s_o_deliver_order_id`),
  KEY `fk_tbl_s_o_deliver_order_detail_item_id_idx` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tbl_s_o_deliver_order_detail`
--

INSERT INTO `tbl_s_o_deliver_order_detail` (`s_o_deliver_order_detail_id`, `s_o_deliver_order_id`, `item_id`, `unit_price`, `qty`, `new_qty`, `discount_type`, `discount`, `status`) VALUES
(26, 16, 2, 250, 5, 12, 0, 6, 1),
(27, 16, 1, 300, 4, 4, 1, 4, 1),
(28, 16, 2, 250, 6, 6, 0, 6, 1),
(29, 17, 2, 250, 3, 6, 0, 4, 1),
(30, 17, 2, 250, 5, 5, 0, 5, 1),
(31, 18, 2, 250, 2, 2, 0, 2, 1),
(32, 19, 2, 250, 8, 10, 0, 8, 1),
(33, 20, 2, 250, 1, 1, 0, 1, 1),
(34, 21, 2, 250, 8, 10, 0, 8, 1),
(35, 21, 1, 300, 8, 8, 1, 8, 1),
(36, 21, 2, 250, 8, 10, 0, 8, 1),
(37, 22, 2, 250, 8, 10, 0, 5, 1),
(38, 22, 1, 300, 6, 10, 1, 8, 1),
(39, 23, 2, 250, 8, 8, 0, 5, 1),
(40, 23, 1, 300, 6, 6, 1, 8, 1),
(41, 24, 2, 250, 5, 10, 0, 5, 1),
(42, 25, 2, 250, 1, 2, 0, 1, 1),
(43, 26, 2, 250, 5, 10, 0, 5, 1),
(44, 27, 2, 250, 1, 2, 0, 1, 1),
(45, 28, 2, 250, 2, 2, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_s_o_purchase_order`
--

CREATE TABLE IF NOT EXISTS `tbl_s_o_purchase_order` (
  `s_o_purchase_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_officer_id` int(11) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `total_discount` decimal(6,2) NOT NULL,
  `lat` varchar(45) DEFAULT NULL,
  `lon` float(10,6) DEFAULT NULL,
  `battery` varchar(45) DEFAULT NULL,
  `accept` int(1) NOT NULL DEFAULT '0',
  `status` int(1) DEFAULT NULL,
  `delar_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_o_purchase_order_id`),
  KEY `fk_tbl_s_o_purchase_order_s_o_id` (`sales_officer_id`),
  KEY `fk_tbl_s_o_purchase_order_d_id_idx` (`delar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_s_o_purchase_order`
--

INSERT INTO `tbl_s_o_purchase_order` (`s_o_purchase_order_id`, `sales_officer_id`, `date`, `time`, `amount`, `total_discount`, `lat`, `lon`, `battery`, `accept`, `status`, `delar_id`) VALUES
(1, 1, '2014:02:02', '12:39:27', '21', 0.00, NULL, NULL, NULL, 0, 1, 1),
(2, 1, '2014:02:03', '05:57:06', '5', 100.00, NULL, NULL, NULL, 0, 1, 1),
(3, 1, '2014:02:28', '11:40:16', '52.5', 0.00, NULL, NULL, NULL, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_s_o_purchase_order_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_s_o_purchase_order_detail` (
  `s_o_purchase_order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_o_deliver_order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `new_qty` int(11) DEFAULT NULL,
  `unit_price` double NOT NULL,
  `discount_type` int(1) NOT NULL,
  `discount` double DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `s_o_purchase_order_id` int(11) NOT NULL,
  PRIMARY KEY (`s_o_purchase_order_detail_id`),
  KEY `fk_tbl_s_o_purchase_order_detail_item_id` (`item_id`),
  KEY `s_o_purchase_order_id` (`s_o_purchase_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_s_o_purchase_order_detail`
--

INSERT INTO `tbl_s_o_purchase_order_detail` (`s_o_purchase_order_detail_id`, `s_o_deliver_order_id`, `item_id`, `qty`, `new_qty`, `unit_price`, `discount_type`, `discount`, `status`, `s_o_purchase_order_id`) VALUES
(1, NULL, 1, 5, NULL, 10.5, 0, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour_plan`
--

CREATE TABLE IF NOT EXISTS `tbl_tour_plan` (
  `tour_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_officer_id` int(11) NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  `tour_plan` varchar(1000) DEFAULT NULL,
  `amendments` varchar(1000) DEFAULT NULL,
  `amend_reason` varchar(1000) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`tour_plan_id`),
  KEY `fk_sales_officer_id_idx` (`sales_officer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `privilage` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `typeid` int(11) DEFAULT NULL,
  `employee_id` int(10) NOT NULL DEFAULT '0',
  `token_user_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `typeid_idx` (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `privilage`, `status`, `date`, `time`, `typeid`, `employee_id`, `token_user_id`) VALUES
(1, 'Dinesh Madushanka', 'dinesh', 'Xyq5wr47uTXl0/sQQASb4UAhvyY5QXmkIVyuIOaBSGv+8UhifKmCP8TZRYkg1r6zHTwAkv9f7SfUtzpxHI4BwA==', 1, 1, '2014:02:02', '19:23:55', 1, 0, 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'Shehan M.Fernamdo', 'shehan', 'dhWKB1f9HmtWjim6mp2GQlo8G0OlQbpANGcIwbR4r1JNRZE7aZH3JGKL8H5GBjUT54cP//BOLiThPt0eUA9BqQ==', 1, 1, '2014:02:02', '19:24:24', 1, 0, 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'Lankesh Weerathinga', 'lankesh', 'vszKnrFBPtUs/LQ0mhJHSXDTIJP7V07UOJe31BGeRGNZJ340iKniakb31pLjHXl+VvkxmY2fJLvkoeR6Hm7ecA==', 1, 1, '2014:02:02', '19:25:22', 3, 0, 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'Kapila de Silva', 'kapila', '/v1H+xq/JFpmRLmu6cLBpbqpBeDIMDNArHPTr/KabhjUu+Yo4GpRhPyv2aie3UmWR91Px4P45F0WpicQXxMDMQ==', 1, 1, '2014:02:02', '19:27:12', 2, 0, 'a87ff679a2f3e71d9181a67b7542122c'),
(5, 'Jinapala de silva', 'silva', 'q/IAaj46AJBTnzr10LhKqK9T2Km7CXM4cFOBoDm9ayyEd4QNk1n2KSVxqo702ASM9oID1WiWEySGNB3pkTXk6w==', 1, 1, '2014:02:02', '19:28:14', 4, 0, 'e4da3b7fbbce2345d7772b0674a318d5'),
(6, 'Kapila de Silva', 'apm', 'VpspOWPgDSFY9C3PgdNOM6LUOINfz8cHH89m6pyWzafA8e5nNdTvDXjv+dEOmVK6Fdybc5/iWqR1a2XUaNwIsw==', 1, 1, '2014:02:28', '15:17:19', 2, 1, '1679091c5a880faf6fb5e6087eb1b2dc'),
(7, 'KapilaDisanayake', 'kapila', 'd5V2Hs4wmnlmqrnSKJZtOQrGX63a0BxxEy4OzCFtnA38uVNMk1a7mdSsibuBBrAaV9gOix1lAsmQd2FltNqD2g==', 1, 1, '2014:03:05', '07:14:06', 3, 1, '8f14e45fceea167a5a36dedd4bea2543'),
(8, 'SrimalWickramasinghe', 'sri', 'dJ1a/9/XQQORTTi0ErN7QPr6Use22uqsYe1NVwbdgjRM5sGEQ/jd+CQN+a4QUCDmwlTM0DTbk7FSnXhKw/rUug==', 1, 1, '2014:03:05', '07:17:00', 3, 2, 'c9f0f895fb98ab9159f51fd0297e236d');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE IF NOT EXISTS `tbl_usertype` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(30) NOT NULL DEFAULT '',
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`typeid`, `typename`, `added_date`, `added_time`, `status`) VALUES
(1, 'Super Admin', '2014-01-12', '14:12:00', 1),
(2, 'APM', '2014-01-12', '14:13:00', 1),
(3, 'Sales Officer', '2014-01-12', '14:14:00', 1),
(4, 'Dealer', '2014:01:19', '18:32:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_model_id` int(11) NOT NULL,
  `vehicle_reg_no` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`) USING BTREE,
  KEY `fk_vehicle_model_id__idx` (`vehicle_model_id`),
  KEY `fk_cust_id_idx` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`vehicle_id`, `vehicle_model_id`, `vehicle_reg_no`, `customer_id`, `added_date`, `added_time`, `status`) VALUES
(1, 4, 'WP-56546', 6, '2014:02:27', '05:30:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_brand` (
  `vehicle_brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_brand_name` varchar(45) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`vehicle_brand_id`),
  KEY `fk_vehicle_type_id_idx` (`vehicle_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_vehicle_brand`
--

INSERT INTO `tbl_vehicle_brand` (`vehicle_brand_id`, `vehicle_brand_name`, `vehicle_type_id`, `added_date`, `added_time`, `status`) VALUES
(1, 'TATA', 1, '2014-01-27', '14:31', 1),
(2, 'Leyland', 1, '2014-01-27', '14:31', 1),
(3, 'Mahindra', 1, '2014-01-27', '14:31', 1),
(4, 'Other', 1, '2014-01-27', '14:31', 0),
(5, 'All', 1, '2014-01-27', '14:31', 0),
(6, 'Tata', 2, '2014:01:28', '06:06:05', 0),
(7, 'Tata', 1, '2014:01:28', '06:30:26', 0),
(8, 'Tata', 3, '2014:01:28', '06:30:53', 0),
(9, 'Tata', 1, '2014:01:28', '07:26:11', 0),
(10, 'LUK', 1, '2014:01:29', '08:41:47', 1),
(11, 'TGP', 1, '2014:01:29', '08:42:08', 1),
(12, 'SAKURA', 1, '2014:01:29', '08:42:24', 1),
(13, 'BOSCH', 1, '2014:01:29', '08:42:42', 1),
(14, 'ABS', 1, '2014:01:29', '08:42:57', 1),
(15, 'TVS', 1, '2014:01:29', '08:43:14', 1),
(16, 'KAS', 1, '2014:01:29', '08:43:32', 1),
(17, 'TELCO', 1, '2014:01:29', '08:43:57', 1),
(18, 'OTHER', 1, '2014:01:29', '08:44:17', 1),
(19, 'test', 1, '2014:02:03', '05:01:13', 0),
(20, 'test', 1, '2014:02:03', '05:07:15', 0),
(21, 'test', 2, '2014:02:03', '05:08:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_business_type`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_business_type` (
  `business_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `business_type_name` varchar(100) NOT NULL,
  `vehicle_purpose_id` int(11) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`business_type_id`),
  KEY `FK_tbl_vehicle_business_type_1` (`vehicle_purpose_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_driver_details`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_driver_details` (
  `vehicle_driver_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_name` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`vehicle_driver_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `tbl_vehicle_driver_details`
--

INSERT INTO `tbl_vehicle_driver_details` (`vehicle_driver_detail_id`, `vehicle_id`, `driver_name`, `status`) VALUES
(1, 87, 'gr', 1),
(2, 88, 'gr', 1),
(3, 93, 'sdd', 1),
(4, 93, 'drfg', 1),
(5, 94, 'sdd', 1),
(6, 94, 'drfg', 1),
(7, 95, 'sdd', 1),
(8, 95, 'drfg', 1),
(9, 148, 'ggh', 1),
(10, 149, 'ggh', 1),
(11, 150, 'ggh', 1),
(12, 151, 'ggh', 1),
(13, 152, 'ggh', 1),
(14, 153, 'ggh', 1),
(15, 154, 'ggh', 1),
(16, 155, 'ggh', 1),
(17, 156, 'ggh', 1),
(18, 157, 'ggh', 1),
(19, 158, 'ggh', 1),
(20, 159, 'h', 1),
(21, 160, 'h', 1),
(22, 161, 'h', 1),
(23, 162, 'h', 1),
(24, 163, 'h', 1),
(25, 164, 'h', 1),
(26, 165, 'h', 1),
(27, 166, 'h', 1),
(28, 167, 'h', 1),
(29, 168, 'h', 1),
(30, 169, 'h', 1),
(31, 170, 'hh', 1),
(32, 171, 'hh', 1),
(33, 172, 'hh', 1),
(34, 173, 'pk', 1),
(35, 173, 'hm', 1),
(36, 174, 'pk', 1),
(37, 174, 'hm', 1),
(38, 175, 'pk', 1),
(39, 175, 'hm', 1),
(40, 176, 'pk', 1),
(41, 176, 'hm', 1),
(42, 177, 'gg', 1),
(43, 178, 'hh', 1),
(44, 182, 'hh', 1),
(45, 183, 'hh', 1),
(46, 184, 'hh', 1),
(47, 185, 'hh', 1),
(48, 186, 'hh', 1),
(49, 187, 'hh', 1),
(50, 188, 'hh', 1),
(51, 189, 'hh', 1),
(52, 190, 'him', 1),
(53, 190, 'mada', 1),
(54, 191, 'hhh', 1),
(55, 192, 'hhh', 1),
(56, 193, 'ff', 1),
(57, 194, 'tgt', 1),
(58, 195, 'gf', 1),
(59, 196, 'gh', 1),
(60, 197, '', 1),
(61, 198, '', 1),
(62, 199, '', 1),
(63, 200, '', 1),
(64, 201, '', 1),
(65, 202, '', 1),
(66, 203, '', 1),
(67, 204, '', 1),
(68, 205, '', 1),
(69, 206, '', 1),
(70, 207, 'd', 1),
(71, 208, 'd', 1),
(72, 209, 'd', 1),
(73, 210, 'ggt', 1),
(74, 211, '', 1),
(75, 212, 'hh', 1),
(76, 213, '', 1),
(77, 214, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_garage`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_garage` (
  `vehicle_garage_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `garage_id` int(11) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `adde_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`vehicle_garage_id`),
  KEY `fk_v_id__idx` (`vehicle_id`),
  KEY `fk_garage_id_idx` (`garage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_model`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_model` (
  `vehicle_model_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_model_name` varchar(45) NOT NULL,
  `vehicle_brand_id` int(11) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`vehicle_model_id`),
  KEY `fk_vehicle_brand_id_idx` (`vehicle_brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_vehicle_model`
--

INSERT INTO `tbl_vehicle_model` (`vehicle_model_id`, `vehicle_model_name`, `vehicle_brand_id`, `added_date`, `added_time`, `status`) VALUES
(1, 'ACE', 1, '2014-01-27', '14:43', 1),
(2, 'CABS', 1, '2014-01-27', '14:43', 1),
(3, 'LCV', 1, '2014-01-27', '14:43', 1),
(4, 'MCV', 1, '2014-01-27', '14:43', 1),
(5, 'HCV', 1, '2014-01-27', '14:43', 1),
(6, 'ted', 2, '2014:01:28', '09:24:36', 0),
(7, 'test', 14, '2014:02:03', '05:25:24', 0),
(8, 'test', 14, '2014:02:03', '05:25:50', 0),
(9, 'test2222', 14, '2014:02:03', '05:29:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_part_purchase_tata_dealers`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_part_purchase_tata_dealers` (
  `vehicle_part_purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `dealer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`vehicle_part_purchase_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tbl_vehicle_part_purchase_tata_dealers`
--

INSERT INTO `tbl_vehicle_part_purchase_tata_dealers` (`vehicle_part_purchase_id`, `vehicle_id`, `dealer_id`, `status`) VALUES
(1, 148, 1, 1),
(2, 149, 1, 1),
(3, 152, 1, 1),
(4, 158, 1, 1),
(5, 159, 1, 1),
(6, 174, 200, 1),
(7, 175, 200, 1),
(8, 176, 200, 1),
(9, 177, 16, 1),
(10, 178, 0, 1),
(11, 182, 0, 1),
(12, 183, 0, 1),
(13, 184, 0, 1),
(14, 185, 0, 1),
(15, 186, 0, 1),
(16, 187, 0, 1),
(17, 188, 0, 1),
(18, 189, 0, 1),
(19, 190, 11, 1),
(20, 191, 8, 1),
(21, 192, 8, 1),
(22, 193, 4, 1),
(23, 194, 8, 1),
(24, 195, 9, 1),
(25, 196, 12, 1),
(26, 197, 0, 1),
(27, 198, 0, 1),
(28, 199, 0, 1),
(29, 200, 0, 1),
(30, 201, 0, 1),
(31, 202, 0, 1),
(32, 203, 0, 1),
(33, 204, 0, 1),
(34, 205, 0, 1),
(35, 206, 0, 1),
(36, 207, 7, 1),
(37, 208, 7, 1),
(38, 209, 7, 1),
(39, 210, 12, 1),
(40, 211, 0, 1),
(41, 212, 6, 1),
(42, 213, 0, 1),
(43, 214, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_part_type`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_part_type` (
  `part_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_type_name` varchar(45) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`part_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_vehicle_part_type`
--

INSERT INTO `tbl_vehicle_part_type` (`part_type_id`, `part_type_name`, `added_date`, `added_time`, `status`) VALUES
(1, 'test', '2014:01:29', '04:44:19', 1),
(2, 'test', '2014:01:29', '05:02:26', 1),
(3, 'test', '2014:01:29', '05:02:35', 1),
(4, 'Enginue', '2014:01:29', '05:11:31', 1),
(5, 'Engine', '2014:01:29', '07:39:33', 1),
(6, 'Gear Box', '2014:01:29', '07:40:01', 1),
(7, 'Running rep', '2014:01:29', '07:40:51', 1),
(8, 'Electronic', '2014:01:29', '07:41:13', 1),
(9, 'Services', '2014:01:29', '07:41:39', 1),
(10, 'LCV', '2014:01:29', '07:42:10', 1),
(11, 'MCV', '2014:01:29', '07:42:26', 1),
(12, 'HCV', '2014:01:29', '07:42:47', 1),
(13, 'ACE', '2014:01:29', '07:43:25', 1),
(14, 'CABS', '2014:01:29', '07:43:52', 1),
(15, 'All', '2014:01:29', '07:44:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_purpose`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_purpose` (
  `vehicle_purpose_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_purpose_name` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`vehicle_purpose_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_vehicle_purpose`
--

INSERT INTO `tbl_vehicle_purpose` (`vehicle_purpose_id`, `vehicle_purpose_name`, `description`, `added_date`, `added_time`, `status`) VALUES
(1, 'business', '-', '2014-02-07', '10:10:00', 1),
(2, 'personal', '-', '2014-02-07', '10:11:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_purposes_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_purposes_detail` (
  `vehicle_purposes_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `vehicle_purpose_id` int(11) DEFAULT NULL,
  `tbl_vehicle_business_type_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`vehicle_purposes_detail_id`),
  KEY `fk_vehicle_id_business_type_idx` (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_repair_type`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_repair_type` (
  `repair_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `repair_type_name` varchar(45) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`repair_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_vehicle_repair_type`
--

INSERT INTO `tbl_vehicle_repair_type` (`repair_type_id`, `repair_type_name`, `added_date`, `added_time`, `status`) VALUES
(18, 'engine repair', '2014:01:29', '07:11:25', 1),
(20, 'engine wash', '2014:01:29', '15:59:59', 1),
(21, 'painting', '2014:01:29', '16:00:12', 1),
(22, 'ede3223', '2014:01:29', '16:02:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_sub_model`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_sub_model` (
  `vehicle_sub_model_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_sub_model_name` varchar(45) NOT NULL,
  `vehicle_model_id` int(11) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`vehicle_sub_model_id`),
  KEY `FK_tbl_vehicle_sub_model_1` (`vehicle_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_vehicle_sub_model`
--

INSERT INTO `tbl_vehicle_sub_model` (`vehicle_sub_model_id`, `vehicle_sub_model_name`, `vehicle_model_id`, `added_date`, `added_time`, `status`) VALUES
(1, 'test', 4, '2014:01:28', '11:39:08', 0),
(2, 'Sub Model', 1, '2014:01:28', '11:52:28', 0),
(3, 'Sub Model', 4, '2014:01:28', '12:29:09', 0),
(4, 'test', 1, '2014:01:28', '13:01:12', 0),
(5, 'ACE', 1, '2014:01:29', '07:29:23', 1),
(6, 'Super Ace', 1, '2014:01:29', '07:30:03', 1),
(7, 'ZIP', 1, '2014:01:29', '07:30:19', 1),
(8, 'XENON', 2, '2014:01:29', '07:30:51', 1),
(9, 'Telcoline', 2, '2014:01:29', '07:31:25', 1),
(10, '709', 3, '2014:01:29', '07:32:04', 1),
(11, '407', 3, '2014:01:29', '07:32:23', 1),
(12, '1615', 4, '2014:01:29', '07:32:55', 1),
(13, '2516', 5, '2014:01:29', '07:33:16', 1),
(14, '4018', 5, '2014:01:29', '07:33:36', 1),
(15, '207', 2, '2014:01:29', '07:50:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_travel_area`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_travel_area` (
  `travel_area_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`travel_area_id`),
  KEY `fk_city_id_idx` (`city_id`),
  KEY `FK_tbl_vehicle_travel_area_3` (`vehicle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_vehicle_travel_area`
--

INSERT INTO `tbl_vehicle_travel_area` (`travel_area_id`, `vehicle_id`, `city_id`, `district_id`, `location`, `added_date`, `added_time`, `status`) VALUES
(1, 1, 1, 3, 'koewfu', '2014-02-27', '05:30:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_type`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_type` (
  `vehicle_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type_name` varchar(45) NOT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`vehicle_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_vehicle_type`
--

INSERT INTO `tbl_vehicle_type` (`vehicle_type_id`, `vehicle_type_name`, `added_date`, `added_time`, `status`) VALUES
(1, 'Indian', '2014-01-27', '14:26', 1),
(2, 'Japanise', '2014-01-27', '14:26', 1),
(3, 'Other', '2014-01-27', '14:27', 1),
(4, 'all', '2014-01-27', '14:27', 0),
(10, 'up', '2014:02:03', '05:00:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visit_category`
--

CREATE TABLE IF NOT EXISTS `tbl_visit_category` (
  `visit_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `category_code` varchar(45) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`visit_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_visit_category`
--

INSERT INTO `tbl_visit_category` (`visit_category_id`, `category_name`, `category_code`, `added_date`, `added_time`, `status`) VALUES
(1, 'Dealer', 'D', '2014:02:23', '21:31:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visit_purpose`
--

CREATE TABLE IF NOT EXISTS `tbl_visit_purpose` (
  `visit_purpose_id` int(11) NOT NULL AUTO_INCREMENT,
  `purpose_id_name` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `visit_purpose_code` varchar(45) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`visit_purpose_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workshop`
--

CREATE TABLE IF NOT EXISTS `tbl_workshop` (
  `workshop_id` int(11) NOT NULL AUTO_INCREMENT,
  `workshop_name` varchar(500) NOT NULL,
  `workshop_code` varchar(45) DEFAULT NULL,
  `workshop_account_no` varchar(45) DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `identifier` varchar(10) DEFAULT NULL,
  `added_date` varchar(45) DEFAULT NULL,
  `added_time` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`workshop_id`),
  KEY `fk_branch_id_workshop_idx` (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_workshop`
--

INSERT INTO `tbl_workshop` (`workshop_id`, `workshop_name`, `workshop_code`, `workshop_account_no`, `area_id`, `identifier`, `added_date`, `added_time`, `status`) VALUES
(1, 'BALAGOLLA', '-', '-', 2, 'B', '2014-03-15', '10:00:00', 1),
(2, 'MATARA', '-', '-', 3, 'B', '2014-03-15', '10:00:00', 1),
(3, 'SIYAMBALAPE', '-', '-', 4, 'B', '2014-03-15', '10:00:00', 1),
(4, 'KURUWITA', '-', '-', 5, 'B', '2014-03-15', '10:00:00', 1),
(5, 'KURUNEGALA', '-', '-', 6, 'B', '2014-03-15', '10:00:00', 1),
(6, 'JAFFNA', '-', '-', 7, 'B', '2014-03-15', '10:00:00', 1),
(7, 'ANURADHAPURA', '-', '-', 8, 'B', '2014-03-15', '10:00:00', 1),
(8, 'TRINCOMALEE', '-', '-', 9, 'B', '2014-03-15', '10:00:00', 1),
(9, 'abc', '-', '-', 2, 'A', '2014-03-15', '10:00:00', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_after_campaign`
--
ALTER TABLE `tbl_after_campaign`
  ADD CONSTRAINT `tbl_after_campaign_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `tbl_campaign` (`id_campaing`);

--
-- Constraints for table `tbl_all_sales`
--
ALTER TABLE `tbl_all_sales`
  ADD CONSTRAINT `fk_area_id` FOREIGN KEY (`area_id`) REFERENCES `tbl_area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_alternative_part`
--
ALTER TABLE `tbl_alternative_part`
  ADD CONSTRAINT `fk_al_item_id` FOREIGN KEY (`item_id`) REFERENCES `tbl_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_apm`
--
ALTER TABLE `tbl_apm`
  ADD CONSTRAINT `br_id` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_area_wise_budget`
--
ALTER TABLE `tbl_area_wise_budget`
  ADD CONSTRAINT `a_id` FOREIGN KEY (`area_id`) REFERENCES `tbl_area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
