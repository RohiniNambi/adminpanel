-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 11:57 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinayak`
--

-- --------------------------------------------------------

--
-- Table structure for table `mat_users`
--

CREATE TABLE `mat_users` (
  `uId` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobileNo` int(11) NOT NULL,
  `userType` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `v_category`
--

CREATE TABLE `v_category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryStatus` tinyint(1) NOT NULL DEFAULT '1',
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) NOT NULL,
  `consumable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_category`
--

INSERT INTO `v_category` (`categoryId`, `categoryName`, `categoryStatus`, `createdOn`, `createdBy`, `consumable`) VALUES
(1, 'PLANK1', 1, '2018-04-29 05:53:22', 2, 0),
(2, 'PIPE', 1, '2018-04-29 05:53:22', 2, 0),
(3, 'LIke5', 1, '2018-04-29 05:53:56', 1, 0),
(4, 'PIPE TYPE 3', 1, '2018-04-29 05:53:56', 2, 0),
(99999, 'Others', 1, '2018-05-27 06:16:00', 1, 0),
(100000, 'paint', 1, '2018-09-29 19:27:18', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `v_dogenerationhistory`
--

CREATE TABLE `v_dogenerationhistory` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `requestId` int(11) NOT NULL,
  `quantityRequested` int(11) NOT NULL,
  `quantityDelivered` int(11) NOT NULL,
  `quantityAccepted` int(11) NOT NULL,
  `approx` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `DONumber` int(11) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `requestStatus` tinyint(2) NOT NULL,
  `modifiedOn` datetime NOT NULL,
  `modifiedBy` int(11) NOT NULL,
  `driverId` int(11) NOT NULL,
  `vehicleId` int(11) NOT NULL,
  `DORemarks` text NOT NULL,
  `collectionRemarks` text NOT NULL,
  `driverRemarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_dogenerationhistory`
--

INSERT INTO `v_dogenerationhistory` (`id`, `categoryId`, `subCategoryId`, `requestId`, `quantityRequested`, `quantityDelivered`, `quantityAccepted`, `approx`, `description`, `DONumber`, `createdOn`, `active`, `requestStatus`, `modifiedOn`, `modifiedBy`, `driverId`, `vehicleId`, `DORemarks`, `collectionRemarks`, `driverRemarks`) VALUES
(1, 1, 1, 1, 345, 118, 118, 0, 'sfdas', 1, '2018-12-25 16:44:36', 1, 7, '2018-12-25 17:44:36', 5, 4, 4, 'qwqw', 'vzxzxc', ''),
(2, 1, 2, 2, 23, 23, 0, 0, 'sdfsdf', 2, '2018-10-27 09:20:26', 1, 99, '2018-10-27 09:24:19', 2, 4, 4, 'sdfsdf', '', 'adgfd'),
(3, 2, 4, 3, 234, 234, 2348, 1, 'xdsd', 0, '2018-10-27 08:24:38', 1, 11, '2018-10-27 10:24:38', 2, 4, 4, '', 'jkjjk', 'nnmnm'),
(4, 1, 1, 1, 345, 90, 90, 0, 'sfdas', 3, '2018-10-27 08:41:01', 1, 7, '2018-10-27 10:41:01', 2, 4, 5, 'kjjj', 'asd', 'dfsd'),
(5, 1, 1, 1, 345, 120, 120, 0, 'sfdas', 4, '2018-12-28 03:13:00', 1, 7, '2018-12-28 04:13:00', 2, 4, 4, 'assad', '', 'zxc'),
(6, 1, 2, 4, 23, 23, 23, 0, 'vc', 5, '2018-10-27 08:46:16', 1, 13, '2018-10-27 10:46:16', 2, 4, 4, '', 'sasd', 'xsdf'),
(7, 1, 2, 5, 23, 23, 10, 0, 'ddgfdfg', 6, '2018-12-04 05:03:43', 1, 13, '2018-12-04 06:03:43', 5, 4, 5, '', 'fsdf', ''),
(8, 1, 2, 6, 23, 23, 0, 0, 's', 7, '2018-12-04 04:57:30', 1, 10, '2018-12-04 05:57:30', 2, 4, 4, '', '', 'dasd'),
(9, 1, 2, 8, 233, 100, 0, 0, 'asd', 8, '2018-12-28 04:09:59', 1, 10, '2018-12-28 05:09:59', 2, 4, 4, 'sadasd', '', ''),
(10, 1, 2, 8, 233, 33, 0, 0, 'asd', 9, '2018-12-28 12:02:25', 1, 4, '2018-12-28 13:02:25', 2, 8, 4, 'sasd', '', ''),
(11, 1, 2, 8, 233, 50, 50, 0, 'asd', 10, '2018-12-02 05:43:49', 1, 13, '2018-12-02 06:43:49', 5, 4, 5, 'zxzxc', 'accepted', ''),
(12, 2, 3, 10, 234, 100, 0, 0, 'xzvzxv', 11, '2018-12-04 05:27:36', 1, 10, '0000-00-00 00:00:00', 0, 4, 5, 'ssss', '', ''),
(13, 2, 3, 10, 234, 34, 0, 0, 'xzvzxv', 12, '2018-12-04 05:29:16', 1, 10, '0000-00-00 00:00:00', 0, 4, 4, 'ssss', '', ''),
(14, 1, 1, 1, 345, 50, 50, 0, 'sfdas', 13, '2018-12-28 04:08:38', 1, 7, '2018-12-28 05:08:38', 2, 4, 5, 'szdasd', '', 'zxc'),
(15, 2, 3, 10, 234, 100, 0, 0, 'xzvzxv', 14, '2018-12-08 03:38:30', 1, 10, '0000-00-00 00:00:00', 0, 4, 5, 'fghdgdfg', '', ''),
(16, 1, 1, 11, 233, 100, 0, 0, 'asdas', 15, '2018-12-08 03:48:37', 1, 10, '0000-00-00 00:00:00', 0, 4, 4, 'zxzxc', '', ''),
(17, 2, 3, 12, 100, 50, 0, 0, 'sa', 16, '2018-12-09 04:27:32', 1, 10, '0000-00-00 00:00:00', 0, 4, 4, 'sdfsdf', '', ''),
(18, 2, 3, 12, 100, 10, 0, 0, 'sa', 17, '2018-12-09 04:30:54', 1, 10, '0000-00-00 00:00:00', 0, 4, 4, 'asas', '', ''),
(19, 3, 5, 13, 200, 90, 90, 0, 'zxzx', 18, '2018-12-28 04:12:06', 1, 13, '2018-12-28 05:12:06', 5, 4, 4, 'fxsd', '', ''),
(20, 2, 4, 15, 222, 100, 100, 0, 'asd', 19, '2019-02-03 08:20:06', 1, 13, '2019-02-03 09:20:06', 2, 4, 4, 'sqw', '', ''),
(21, 2, 4, 15, 222, 100, 100, 0, 'asd', 20, '2018-12-28 04:12:20', 1, 13, '2018-12-28 05:12:20', 5, 4, 4, 'jhjhj', '', ''),
(22, 2, 4, 15, 222, 10, 10, 0, 'asd', 21, '2018-12-28 04:12:32', 1, 13, '2018-12-28 05:12:32', 5, 4, 4, 'sdfsdf', '', ''),
(23, 1, 1, 9, 223, 110, 110, 0, 'sdf', 22, '2018-12-25 16:48:03', 1, 7, '2018-12-25 17:48:03', 5, 4, 4, 'df', '', 'sdfsdf'),
(24, 2, 3, 19, 123, 23, 23, 0, 'sda', 23, '2019-02-03 18:54:28', 1, 13, '2019-02-03 19:54:28', 2, 4, 4, 'sadsad', '', 'ghhjghh'),
(25, 2, 3, 21, 112, 12, 12, 0, 'aasd', 24, '2018-12-15 17:46:44', 1, 13, '2018-12-15 18:46:44', 3, 4, 4, 'asdsd', 'hjhkj', 'hjh'),
(26, 2, 3, 21, 112, 10, 10, 0, 'aasd', 25, '2018-12-15 18:15:08', 1, 13, '2018-12-15 19:15:08', 3, 4, 4, 'ddf', 'add', 'zxczxc'),
(27, 2, 3, 21, 112, 10, 10, 0, 'aasd', 26, '2018-12-15 18:13:03', 1, 13, '2018-12-15 19:13:03', 3, 4, 4, '676', 'ghg', 'hj'),
(28, 2, 3, 21, 112, 10, 10, 0, 'aasd', 27, '2018-12-15 18:18:38', 1, 13, '2018-12-15 19:18:38', 3, 4, 4, 'sdf', 'hghgh', 'hjhh'),
(29, 2, 3, 21, 112, 60, 0, 0, 'aasd', 28, '2019-01-02 19:01:15', 1, 14, '2019-01-02 20:01:15', 2, 8, 4, 'sdsdf', '', ''),
(30, 2, 3, 21, 112, 1, 0, 0, 'aasd', 29, '2018-12-16 17:04:41', 1, 14, '0000-00-00 00:00:00', 0, 4, 4, 'asdasd', '', ''),
(31, 1, 1, 22, 34, 34, 34, 1, 'sf', 0, '2018-12-17 04:27:40', 1, 11, '2018-12-17 05:27:40', 2, 4, 4, '', 'hgfg', 'sdfsdf'),
(32, 2, 3, 23, 776, 776, 700, 1, 'df', 0, '2018-12-17 05:09:26', 1, 11, '2018-12-17 06:09:26', 3, 4, 4, '', 'sdfsdf', 'ass'),
(33, 1, 2, 26, 150, 100, 100, 0, 'ss', 30, '2018-12-28 03:11:44', 1, 7, '2018-12-28 04:11:44', 2, 4, 4, 'asadasd', 'sdds', 'sdfsdf'),
(34, 1, 1, 9, 223, 173, 173, 0, 'sdf', 31, '2018-12-28 03:28:46', 1, 7, '2018-12-28 04:28:46', 2, 4, 4, 'ZXZ', 'dasdasd', 'asdasd'),
(35, 1, 1, 27, 150, 150, 150, 1, 'hjh', 0, '2018-12-28 04:07:37', 1, 11, '2018-12-28 05:07:37', 2, 4, 4, '', '', 'hh'),
(36, 3, 5, 28, 100, 90, 100, 0, 'dd', 32, '2019-01-02 18:11:06', 1, 7, '2019-01-02 19:11:06', 2, 4, 4, 'as', 'sdfsdf', 'zxc'),
(37, 3, 5, 28, 100, 20, 20, 0, 'dd', 33, '2019-01-02 18:19:11', 1, 7, '2019-01-02 19:19:11', 2, 4, 5, 'asd', '', 'zfsdf'),
(38, 3, 5, 29, 300, 100, 100, 0, 'sdf', 34, '2019-01-02 18:33:05', 1, 7, '2019-01-02 19:33:05', 2, 4, 4, 'dsf', 'ssdf', 'fsdf'),
(39, 3, 5, 29, 300, 200, 200, 0, 'sdf', 35, '2019-02-03 18:53:37', 1, 7, '2019-02-03 19:53:37', 2, 4, 4, 'asdsad', '', 's'),
(40, 2, 3, 30, 34234, 34234, 0, 1, 'sdf', 0, '2019-01-27 10:38:01', 1, 4, '0000-00-00 00:00:00', 0, 4, 5, '', '', ''),
(41, 2, 3, 31, 34234, 34234, 0, 1, 'sdf', 0, '2019-01-27 10:38:02', 1, 4, '0000-00-00 00:00:00', 0, 4, 5, '', '', ''),
(42, 1, 2, 33, 90, 10, 0, 0, 'dsd', 36, '2019-02-02 09:13:04', 1, 4, '0000-00-00 00:00:00', 0, 4, 4, 'hggfgf', '', ''),
(43, 1, 2, 33, 90, 40, 40, 0, 'dsd', 37, '2019-02-02 09:18:00', 1, 7, '2019-02-02 10:18:00', 2, 8, 4, 'fgfd', '', 'sadasd'),
(44, 1, 2, 33, 90, 20, 20, 0, 'dsd', 38, '2019-02-03 16:29:49', 1, 7, '2019-02-03 17:29:49', 2, 4, 4, '', '', ''),
(45, 1, 2, 33, 90, 15, 15, 0, 'dsd', 39, '2019-02-03 16:36:54', 1, 7, '2019-02-03 17:36:54', 2, 4, 4, '', '', ''),
(46, 1, 2, 33, 90, 7, 7, 0, 'dsd', 40, '2019-02-03 17:41:01', 1, 7, '2019-02-03 18:41:01', 2, 4, 5, '', '', ''),
(47, 2, 4, 34, 90, 40, 40, 0, 'ss', 41, '2019-02-03 17:45:18', 1, 7, '2019-02-03 18:45:18', 2, 4, 4, 'sasd', '', ''),
(48, 2, 4, 34, 90, 30, 30, 0, 'ss', 42, '2019-02-03 18:09:45', 1, 7, '2019-02-03 19:09:45', 2, 8, 4, 'sa', '', ''),
(49, 2, 4, 34, 90, 15, 15, 0, 'ss', 43, '2019-02-03 18:15:02', 1, 7, '2019-02-03 19:15:02', 2, 4, 4, 'dssd', '', ''),
(50, 3, 5, 35, 90, 30, 30, 0, 'as', 44, '2019-02-03 18:23:31', 1, 7, '2019-02-03 19:23:31', 2, 4, 4, 'sd', '', ''),
(51, 3, 5, 35, 90, 10, 15, 0, 'as', 45, '2019-02-03 18:28:53', 1, 7, '2019-02-03 19:28:53', 5, 4, 4, 'xc', '', ''),
(52, 3, 5, 35, 90, 15, 15, 0, 'as', 46, '2019-02-03 18:49:13', 1, 7, '2019-02-03 19:49:13', 2, 4, 4, 'asf', '', ''),
(53, 3, 5, 35, 90, 10, 15, 0, 'as', 47, '2019-02-03 18:48:46', 1, 7, '2019-02-03 19:48:46', 5, 4, 4, '', '', ''),
(54, 3, 5, 35, 90, 15, 15, 0, 'as', 48, '2019-02-03 18:52:00', 1, 7, '2019-02-03 19:52:00', 2, 4, 4, 'df', '', ''),
(55, 3, 5, 35, 90, 15, 15, 0, 'as', 49, '2019-02-03 19:02:49', 1, 7, '2019-02-03 20:02:49', 2, 4, 4, '', '', ''),
(56, 3, 5, 35, 90, 15, 15, 0, 'as', 50, '2019-02-03 19:06:07', 1, 7, '2019-02-03 20:06:07', 2, 4, 4, '', '', ''),
(57, 2, 3, 32, 23, 13, 0, 0, 'aasd', 51, '2019-03-09 07:13:05', 1, 14, '0000-00-00 00:00:00', 0, 8, 5, 'sds', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_drivers`
--

CREATE TABLE `v_drivers` (
  `driverId` int(11) NOT NULL,
  `driverName` varchar(100) NOT NULL,
  `mobileNo` bigint(20) NOT NULL,
  `driverStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_drivers`
--

INSERT INTO `v_drivers` (`driverId`, `driverName`, `mobileNo`, `driverStatus`) VALUES
(1, 'jeeva', 950006190, 1),
(2, 'rohit', 96660000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `v_materialrequests`
--

CREATE TABLE `v_materialrequests` (
  `id` int(11) NOT NULL,
  `requestId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `quantityRequested` int(11) NOT NULL,
  `quantityDelivered` int(11) NOT NULL,
  `quantityAccepted` int(11) NOT NULL,
  `description` text NOT NULL,
  `activeDoNumber` int(11) NOT NULL,
  `quantityRemaining` int(11) NOT NULL DEFAULT '-1',
  `modfiedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_materialrequests`
--

INSERT INTO `v_materialrequests` (`id`, `requestId`, `categoryId`, `subCategoryId`, `quantityRequested`, `quantityDelivered`, `quantityAccepted`, `description`, `activeDoNumber`, `quantityRemaining`, `modfiedOn`) VALUES
(4, 2, 1, 2, 23, 23, 23, 'sdfsdf', 2, 0, '2018-10-27 09:03:30'),
(5, 3, 2, 4, 234, 0, 0, 'xdsd', 0, 234, '0000-00-00 00:00:00'),
(8, 4, 1, 2, 23, 0, 0, 'vc', 0, 23, '0000-00-00 00:00:00'),
(9, 5, 1, 2, 23, 0, 0, 'ddgfdfg', 0, 23, '0000-00-00 00:00:00'),
(10, 6, 1, 2, 23, 0, 0, 's', 0, 23, '0000-00-00 00:00:00'),
(11, 7, 1, 1, 100, 0, 0, 'as', 0, 100, '0000-00-00 00:00:00'),
(15, 8, 1, 2, 233, 50, 50, 'asd', 10, 50, '2018-12-02 06:23:11'),
(21, 1, 1, 1, 345, 50, 50, 'sfdas', 13, 50, '2018-12-08 03:19:49'),
(22, 10, 2, 3, 234, 100, 100, 'xzvzxv', 14, 0, '2018-12-08 04:38:29'),
(23, 11, 1, 1, 233, 100, 100, 'asdas', 15, 133, '2018-12-08 04:48:36'),
(27, 12, 2, 3, 100, 10, 10, 'sa', 17, 40, '2018-12-09 05:30:54'),
(30, 13, 3, 5, 200, 100, 100, 'zxzx', 18, 100, '2018-12-09 05:37:13'),
(32, 14, 3, 5, 324, 0, 0, 'sdsd', 0, 324, '0000-00-00 00:00:00'),
(37, 15, 2, 4, 222, 10, 10, 'asd', 21, 12, '2018-12-09 07:36:39'),
(40, 16, 1, 1, 222, 0, 0, 'zas', 0, 222, '0000-00-00 00:00:00'),
(41, 17, 1, 2, 334, 0, 0, 'sdf', 0, 334, '0000-00-00 00:00:00'),
(43, 18, 2, 3, 233, 0, 0, 'zc', 0, 233, '0000-00-00 00:00:00'),
(45, 19, 2, 3, 123, 23, 23, 'sda', 23, 0, '2018-12-09 18:58:06'),
(46, 20, 1, 1, 78, 0, 0, 'as', 0, 78, '0000-00-00 00:00:00'),
(53, 21, 2, 3, 112, 1, 1, 'aasd', 29, 9, '2018-12-16 18:04:41'),
(54, 22, 1, 1, 34, 0, 0, 'sf', 0, 34, '0000-00-00 00:00:00'),
(55, 23, 2, 3, 776, 0, 0, 'df', 0, 776, '0000-00-00 00:00:00'),
(56, 24, 1, 2, 23, 0, 0, 'sf', 0, 23, '0000-00-00 00:00:00'),
(57, 25, 2, 4, 23, 0, 0, 'dd', 0, 23, '0000-00-00 00:00:00'),
(59, 26, 1, 2, 150, 150, 150, 'ss', 30, 0, '2018-12-28 03:59:45'),
(60, 9, 1, 1, 223, 123, 123, 'sdf', 31, 0, '2018-12-28 04:25:18'),
(61, 27, 1, 1, 150, 0, 0, 'hjh', 0, 150, '0000-00-00 00:00:00'),
(64, 28, 3, 5, 100, 10, 10, 'dd', 33, 0, '2019-01-02 19:16:34'),
(67, 29, 3, 5, 300, 200, 150, 'sdf', 35, 0, '2019-01-02 19:37:17'),
(68, 30, 2, 3, 34234, 0, 0, 'sdf', 0, 34234, '0000-00-00 00:00:00'),
(69, 31, 2, 3, 34234, 0, 0, 'sdf', 0, 34234, '0000-00-00 00:00:00'),
(76, 33, 1, 2, 90, 7, 5, 'dsd', 40, 5, '2019-02-03 17:39:00'),
(81, 34, 2, 4, 90, 5, 10, 'ss', 43, 10, '2019-02-03 19:13:39'),
(89, 35, 3, 5, 90, 15, 10, 'as', 50, 35, '2019-02-03 20:04:50'),
(90, 36, 2, 4, 998, 0, 0, 'jj', 0, 998, '0000-00-00 00:00:00'),
(91, 37, 2, 4, 232, 0, 0, 'ss', 0, 232, '0000-00-00 00:00:00'),
(92, 38, 2, 4, 234, 0, 0, 'sdfsdf', 0, 234, '0000-00-00 00:00:00'),
(93, 39, 1, 1, 34, 0, 0, 'sdfsf', 0, 34, '0000-00-00 00:00:00'),
(94, 40, 1, 1, 35, 0, 0, 'sdg', 0, 35, '0000-00-00 00:00:00'),
(95, 32, 2, 3, 23, 13, 13, 'aasd', 51, 10, '2019-03-09 08:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `v_misatchalert`
--

CREATE TABLE `v_misatchalert` (
  `requestId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `requestedBy` int(11) NOT NULL,
  `dateRequested` datetime NOT NULL,
  `formattedId` varchar(100) NOT NULL,
  `doId` varchar(100) NOT NULL,
  `doNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_misatchalert`
--

INSERT INTO `v_misatchalert` (`requestId`, `status`, `requestedBy`, `dateRequested`, `formattedId`, `doId`, `doNumber`) VALUES
(1, 2, 5, '2018-12-25 05:12:30', '18/10/0001', '18/12/0004', 4),
(9, 2, 5, '2018-12-28 04:12:11', '18/12/0003', '18/12/0031', 31),
(15, 2, 5, '2018-12-28 05:12:40', '18/12/0009', '18/12/0019', 19),
(19, 2, 5, '2018-12-28 05:12:24', '18/12/0013', '18/12/0023', 23),
(26, 2, 5, '2018-12-28 04:12:58', '18/12/0020', '18/12/0030', 30),
(28, 2, 5, '2019-01-02 07:01:06', '19/01/0001', '19/01/0033', 33),
(29, 1, 5, '2019-01-02 07:01:24', '19/01/0002', '19/01/0035', 35),
(29, 2, 5, '2019-01-02 07:01:51', '19/01/0002', '19/01/0034', 34),
(33, 2, 5, '2019-02-03 05:02:50', '19/02/0001', '19/02/0040', 40),
(34, 2, 5, '2019-02-03 07:02:27', '19/02/0002', '19/02/0043', 43),
(35, 1, 5, '2019-02-03 08:02:39', '19/02/0003', '19/02/0050', 50),
(35, 2, 5, '2019-02-03 08:02:24', '19/02/0003', '19/02/0049', 49);

-- --------------------------------------------------------

--
-- Table structure for table `v_projectreport`
--

CREATE TABLE `v_projectreport` (
  `projectId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `requestedQty` int(11) NOT NULL,
  `recievedQty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_projectreport`
--

INSERT INTO `v_projectreport` (`projectId`, `categoryId`, `subCategoryId`, `requestedQty`, `recievedQty`) VALUES
(4, 1, 1, 0, 184),
(4, 1, 2, 348, 0),
(4, 2, 3, 524, 845),
(4, 2, 4, 210, 0),
(4, 3, 5, 390, 100),
(5, 1, 1, 140, 101),
(5, 1, 2, 183, 83),
(5, 2, 3, 50, 96),
(5, 2, 4, 85, 2558),
(5, 3, 5, 210, 0);

-- --------------------------------------------------------

--
-- Table structure for table `v_projects`
--

CREATE TABLE `v_projects` (
  `projectId` int(11) NOT NULL,
  `projectName` varchar(100) NOT NULL,
  `projectStatus` tinyint(1) NOT NULL DEFAULT '1',
  `modifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_projects`
--

INSERT INTO `v_projects` (`projectId`, `projectName`, `projectStatus`, `modifiedOn`, `createdBy`, `createdOn`) VALUES
(3, 'project5', 9, '2018-04-29 05:06:33', 2, '2018-04-29 00:00:00'),
(4, 'project2', 1, '2018-04-29 05:06:33', 2, '2018-04-29 00:00:00'),
(5, 'project 3', 1, '2018-09-29 18:35:06', 0, '0000-00-00 00:00:00'),
(6, 'dsdf', 9, '2018-09-29 18:35:25', 0, '0000-00-00 00:00:00'),
(7, 'dsdf', 9, '2018-09-29 18:35:53', 0, '0000-00-00 00:00:00'),
(8, 'project5', 2, '2018-09-30 09:56:05', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `v_requests`
--

CREATE TABLE `v_requests` (
  `requestId` int(11) NOT NULL,
  `notificationType` tinyint(1) NOT NULL,
  `projectIdFrom` int(11) NOT NULL,
  `projectIdTo` int(11) NOT NULL,
  `description` text NOT NULL,
  `driverId` int(11) NOT NULL,
  `vehicleId` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `requestStatus` tinyint(2) NOT NULL,
  `approverComments` text NOT NULL,
  `notificationNumber` varchar(100) NOT NULL,
  `transferId` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `modifiedBy` int(11) NOT NULL,
  `modifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `requestNumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_requests`
--

INSERT INTO `v_requests` (`requestId`, `notificationType`, `projectIdFrom`, `projectIdTo`, `description`, `driverId`, `vehicleId`, `remarks`, `requestStatus`, `approverComments`, `notificationNumber`, `transferId`, `createdBy`, `modifiedBy`, `modifiedOn`, `createdOn`, `requestNumber`) VALUES
(1, 1, 5, 0, '', 0, 0, 'asdasd', 3, 'zxczxc', '', 0, 2, 2, '2018-12-27 23:38:38', '2018-10-27 02:59:09', '18/10/0001'),
(2, 1, 4, 0, '', 0, 0, 'sdfsdf', 99, 'sss', '', 0, 2, 2, '2018-10-27 03:54:19', '2018-10-27 03:23:42', '18/10/0002'),
(3, 2, 5, 0, '', 0, 0, 'sdfsdf', 11, '', '', 0, 2, 2, '2018-10-27 04:54:38', '2018-10-27 04:10:14', '18/10/0003'),
(4, 3, 5, 4, '', 0, 0, 'xxcv', 13, '', '18/10/0002', 10, 2, 2, '2018-10-27 05:16:16', '2018-10-27 05:15:31', '18/10/0004'),
(5, 3, 5, 4, '', 0, 0, 'sdfsdf', 13, '', '18/10/0002', 10, 2, 5, '2018-12-04 00:33:43', '2018-10-27 05:45:55', '18/10/0005'),
(6, 3, 5, 4, '', 0, 0, 'asdasd', 10, '', '18/10/0002', 2, 2, 2, '2018-12-04 00:27:30', '2018-10-27 05:50:26', '18/10/0006'),
(7, 1, 4, 0, '', 0, 0, 'sdfsdf', 3, 'aasd', '', 0, 5, 0, '2018-12-01 20:05:49', '2018-12-01 15:35:49', '18/12/0001'),
(8, 3, 5, 4, '', 0, 0, 'asasd', 13, 'jjj', '', 0, 5, 2, '2018-12-27 23:39:59', '2018-12-01 15:37:40', '18/12/0002'),
(9, 1, 5, 0, '', 0, 0, 'sdfsf', 4, 'zxczcx', '', 0, 2, 5, '2018-12-27 22:56:11', '2018-12-04 00:37:20', '18/12/0003'),
(10, 3, 4, 5, '', 0, 0, 'cvxcv', 10, 'sdfsdf', '', 0, 2, 0, '2018-12-07 23:08:29', '2018-12-04 00:45:24', '18/12/0004'),
(11, 3, 5, 4, '', 0, 0, 'asdasd', 12, 'zaasdasd', '', 0, 2, 0, '2018-12-07 23:18:37', '2018-12-06 23:34:16', '18/12/0005'),
(12, 3, 5, 4, '', 0, 0, 'xz', 12, 'xdassdasd', '', 0, 2, 0, '2018-12-09 00:00:54', '2018-12-08 23:44:23', '18/12/0006'),
(13, 3, 4, 5, '', 0, 0, 'zxc', 12, 'zxcas', '', 0, 2, 5, '2018-12-27 23:42:06', '2018-12-09 00:04:27', '18/12/0007'),
(14, 3, 5, 0, '', 0, 0, 'sdsd', 12, 'sedf', '', 0, 2, 2, '2018-12-09 00:23:41', '2018-12-09 00:23:34', '18/12/0008'),
(15, 3, 5, 4, '', 0, 0, 'asds', 12, 'cxxddf', '', 0, 2, 5, '2018-12-27 23:42:32', '2018-12-09 00:27:41', '18/12/0009'),
(16, 3, 5, 4, '', 0, 0, 'asdas', 12, 'asdasd', '', 0, 2, 2, '2018-12-09 04:28:02', '2018-12-09 04:27:55', '18/12/0010'),
(17, 3, 5, 4, '', 0, 0, 'sdfsd', 3, 'sdsdf', '', 0, 2, 0, '2018-12-09 09:06:37', '2018-12-09 04:36:37', '18/12/0011'),
(18, 3, 5, 4, '', 0, 0, 'zxcxc', 9, 'this cane be close', '', 0, 2, 2, '2018-12-09 13:02:17', '2018-12-09 13:02:10', '18/12/0012'),
(19, 3, 5, 4, '', 0, 0, 'asd', 13, 'zsdsad', '', 0, 2, 5, '2018-12-27 23:41:24', '2018-12-09 13:27:27', '18/12/0013'),
(20, 1, 5, 0, '', 0, 0, 'asdasd', 9, '', '', 0, 5, 0, '2018-12-09 18:52:33', '2018-12-09 14:22:33', '18/12/0014'),
(21, 3, 4, 4, '', 0, 0, 'asdasd', 12, 'aasd', '', 0, 2, 0, '2018-12-16 12:34:41', '2018-12-15 13:10:28', '18/12/0015'),
(22, 2, 4, 0, '', 0, 0, 'sdfsdf', 11, '', '', 0, 2, 2, '2018-12-16 23:57:40', '2018-12-16 23:55:17', '18/12/0016'),
(23, 2, 4, 0, '', 0, 0, 'zxczx', 11, '', '', 0, 5, 3, '2018-12-17 00:39:26', '2018-12-17 00:37:45', '18/12/0017'),
(24, 1, 5, 0, '', 0, 0, 'ads', 9, 'xzxc', '', 0, 2, 0, '2018-12-25 17:10:50', '2018-12-25 12:40:50', '18/12/0018'),
(25, 1, 5, 0, '', 0, 0, 'sdasd', 9, '', '', 0, 2, 0, '2018-12-25 17:25:22', '2018-12-25 12:55:22', '18/12/0019'),
(26, 1, 4, 0, '', 0, 0, 'asa', 4, 'xsaas', '', 0, 2, 5, '2018-12-27 22:38:58', '2018-12-27 22:28:57', '18/12/0020'),
(27, 2, 4, 0, '', 0, 0, 'hfhgf', 11, '', '', 0, 2, 2, '2018-12-27 23:37:37', '2018-12-27 23:19:18', '18/12/0021'),
(28, 1, 4, 0, '', 0, 0, 'zxczxc', 4, 'fsdfs', '', 0, 2, 5, '2019-01-02 13:48:06', '2019-01-02 13:38:08', '19/01/0001'),
(29, 1, 4, 0, '', 0, 0, 'sdf', 4, 'zxc', '', 0, 2, 5, '2019-01-02 14:08:24', '2019-01-02 13:53:17', '19/01/0002'),
(30, 2, 4, 0, '', 0, 0, 'dfgdgsf', 4, '', '', 0, 2, 0, '2019-01-27 10:37:56', '2019-01-27 06:07:56', '19/01/0003'),
(31, 2, 4, 0, '', 0, 0, 'dfgdgsf', 4, '', '', 0, 2, 0, '2019-01-27 10:38:02', '2019-01-27 06:08:02', '19/01/0003'),
(32, 3, 5, 4, '', 0, 0, 'asd', 12, 'dff', '', 0, 5, 0, '2019-03-09 02:43:04', '2019-01-27 06:40:39', '19/01/0004'),
(33, 1, 4, 0, '', 0, 0, 'sdfsdf', 3, 'hghhghghg', '', 0, 2, 5, '2019-02-03 12:09:50', '2019-02-02 04:41:38', '19/02/0001'),
(34, 1, 5, 0, '', 0, 0, 'sdas', 3, 'asd', '', 0, 2, 5, '2019-02-03 13:44:27', '2019-02-03 13:12:43', '19/02/0002'),
(35, 1, 5, 0, '', 0, 0, 'sa', 3, 'sAFd', '', 0, 2, 5, '2019-02-03 14:35:39', '2019-02-03 13:50:23', '19/02/0003'),
(36, 1, 5, 0, '', 0, 0, 'dfgfd', 1, '', '', 0, 2, 0, '2019-03-09 06:12:34', '2019-03-09 01:42:34', '19/03/0001'),
(37, 1, 5, 0, '', 0, 0, 'xzxc', 1, '', '', 0, 2, 0, '2019-03-09 06:18:58', '2019-03-09 01:48:58', '19/03/0002'),
(38, 1, 5, 0, '', 0, 0, 'sfsdfsdf', 1, '', '', 0, 2, 0, '2019-03-09 06:19:57', '2019-03-09 01:49:57', '19/03/0003'),
(39, 3, 5, 4, '', 0, 0, 'sdfsdf', 12, 'ghfghfgh', '', 0, 2, 0, '2019-03-09 06:31:06', '2019-03-09 02:01:06', '19/03/0004'),
(40, 1, 4, 0, 'sdg', 0, 0, 'sdsdf', 2, '', '', 0, 2, 0, '2019-03-09 06:42:48', '2019-03-09 02:12:48', '19/03/0005');

-- --------------------------------------------------------

--
-- Table structure for table `v_status`
--

CREATE TABLE `v_status` (
  `statusId` int(11) NOT NULL,
  `statusName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `v_subcategory`
--

CREATE TABLE `v_subcategory` (
  `subCategoryId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCategoryName` varchar(100) NOT NULL,
  `subCategoryStatus` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `storeBalance` int(11) NOT NULL,
  `currentBalance` int(11) NOT NULL,
  `storeIn` int(11) NOT NULL,
  `storeOut` int(11) NOT NULL,
  `price` float NOT NULL,
  `measurements` tinyint(2) NOT NULL DEFAULT '1',
  `consumable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_subcategory`
--

INSERT INTO `v_subcategory` (`subCategoryId`, `categoryId`, `subCategoryName`, `subCategoryStatus`, `createdBy`, `createdOn`, `storeBalance`, `currentBalance`, `storeIn`, `storeOut`, `price`, `measurements`, `consumable`) VALUES
(1, 1, '10MM', 1, 2, '2018-04-29 05:55:20', 10100, 32650, 23639, 989, 100.5, 1, 0),
(2, 1, '15MM', 1, 2, '2018-04-29 05:55:20', 10000, 9508, 0, 492, 100, 1, 0),
(3, 2, '6MM', 1, 2, '2018-04-29 05:56:00', 10000, 9060, 700, 765, 100, 1, 0),
(4, 2, '8MM', 1, 2, '2018-04-29 05:56:00', 10100, 12076, 2371, 295, 100, 1, 0),
(5, 3, '50MM', 1, 2, '2018-04-29 05:56:39', 10000, 9030, 343, 1283, 100, 1, 0),
(6, 4, '25MM', 1, 2, '2018-04-29 05:56:39', 10000, 9190, 0, 810, 100, 1, 0),
(8, 2, '10MM', 1, 2, '2018-09-30 09:52:25', 220, 22, 0, 0, 22, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `v_transferhistory`
--

CREATE TABLE `v_transferhistory` (
  `id` int(11) NOT NULL,
  `requestId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `quantityRequested` int(11) NOT NULL,
  `quantityRemaining` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_transferhistory`
--

INSERT INTO `v_transferhistory` (`id`, `requestId`, `categoryId`, `subCategoryId`, `quantityRequested`, `quantityRemaining`, `description`) VALUES
(1, 1, 1, 1, 345, 345, 'sfdas'),
(2, 2, 1, 2, 23, 23, 'sdfsdf'),
(3, 7, 1, 1, 100, 100, 'as'),
(4, 8, 1, 2, 233, 233, 'asd'),
(5, 9, 1, 1, 223, 223, 'sdf'),
(6, 10, 2, 3, 234, 234, 'xzvzxv'),
(7, 11, 1, 1, 233, 233, 'asdas'),
(8, 12, 2, 3, 100, 100, 'sa'),
(9, 12, 2, 3, 100, 100, 'sa'),
(10, 13, 3, 5, 200, 200, 'zxzx'),
(11, 13, 3, 5, 200, 200, 'zxzx'),
(12, 14, 3, 5, 324, 324, 'sdsd'),
(13, 14, 3, 5, 324, 324, 'sdsd'),
(14, 15, 2, 4, 222, 222, 'asd'),
(15, 15, 2, 4, 222, 222, 'asd'),
(16, 16, 1, 1, 222, 222, 'zas'),
(17, 16, 1, 1, 222, 222, 'zas'),
(18, 17, 1, 2, 334, 334, 'sdf'),
(19, 18, 2, 3, 233, 233, 'zc'),
(20, 18, 2, 3, 233, 233, 'zc'),
(21, 19, 2, 3, 123, 123, 'sda'),
(22, 20, 1, 1, 78, 78, 'as'),
(23, 21, 2, 3, 112, 112, 'aasd'),
(24, 24, 1, 2, 23, 23, 'sf'),
(25, 25, 2, 4, 23, 23, 'dd'),
(26, 26, 1, 2, 150, 150, 'ss'),
(27, 28, 3, 5, 100, 100, 'dd'),
(28, 29, 3, 5, 300, 300, 'sdf'),
(29, 32, 2, 3, 23, 23, 'aasd'),
(30, 33, 1, 2, 90, 90, 'dsd'),
(31, 34, 2, 4, 90, 90, 'ss'),
(32, 34, 2, 4, 90, 90, 'ss'),
(33, 35, 3, 5, 90, 90, 'as'),
(34, 36, 2, 4, 998, 998, 'jj'),
(35, 37, 2, 4, 232, 232, 'ss'),
(36, 38, 2, 4, 234, 234, 'sdfsdf'),
(37, 39, 1, 1, 34, 34, 'sdfsf'),
(38, 40, 1, 1, 35, 35, 'sdg');

-- --------------------------------------------------------

--
-- Table structure for table `v_users`
--

CREATE TABLE `v_users` (
  `userId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userType` smallint(2) NOT NULL,
  `userStatus` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `projects` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_users`
--

INSERT INTO `v_users` (`userId`, `Name`, `userName`, `password`, `userType`, `userStatus`, `createdBy`, `projects`) VALUES
(2, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 1, 1, 0, ''),
(3, 'jeeva', 'storeman', 'c6f929f8c30078248c2a2151be9f0f39', 3, 1, 0, ''),
(4, 'driver', 'driver', '703b02a2a8bb363f50386bb338892471', 4, 1, 0, ''),
(5, 'super', 'super', 'f35364bc808b079853de5a1e343e7159', 5, 1, 0, '4,5'),
(6, 'sss', 'ssss', 'affc43cb08a4fd1d9b27fae06b3c57cd', 5, 1, 0, '4,5,8'),
(7, 'jeeva', 'ssjeeva', 'e8717e52966964f14a532ba011503c64', 5, 1, 0, '4,5'),
(8, 'driver2', 'driver2', '703b02a2a8bb363f50386bb338892471', 4, 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `v_vehicles`
--

CREATE TABLE `v_vehicles` (
  `vehicleId` int(11) NOT NULL,
  `vehicleNumber` varchar(50) NOT NULL,
  `vehicleStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_vehicles`
--

INSERT INTO `v_vehicles` (`vehicleId`, `vehicleNumber`, `vehicleStatus`) VALUES
(2, 'TN22DE2690a', 9),
(3, 'TN10AC9680', 9),
(4, 'TN22DE2690', 1),
(5, 'TN10AC9680', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mat_users`
--
ALTER TABLE `mat_users`
  ADD PRIMARY KEY (`uId`);

--
-- Indexes for table `v_category`
--
ALTER TABLE `v_category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `v_dogenerationhistory`
--
ALTER TABLE `v_dogenerationhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requestId` (`requestId`,`requestStatus`),
  ADD KEY `requestStatus` (`requestStatus`);

--
-- Indexes for table `v_drivers`
--
ALTER TABLE `v_drivers`
  ADD PRIMARY KEY (`driverId`);

--
-- Indexes for table `v_materialrequests`
--
ALTER TABLE `v_materialrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_misatchalert`
--
ALTER TABLE `v_misatchalert`
  ADD UNIQUE KEY `requestId` (`requestId`,`status`);

--
-- Indexes for table `v_projectreport`
--
ALTER TABLE `v_projectreport`
  ADD UNIQUE KEY `projectId` (`projectId`,`categoryId`,`subCategoryId`);

--
-- Indexes for table `v_projects`
--
ALTER TABLE `v_projects`
  ADD PRIMARY KEY (`projectId`);

--
-- Indexes for table `v_requests`
--
ALTER TABLE `v_requests`
  ADD PRIMARY KEY (`requestId`),
  ADD KEY `requestId` (`requestId`,`notificationType`,`projectIdFrom`,`projectIdTo`,`requestStatus`),
  ADD KEY `requestStatus` (`requestStatus`);

--
-- Indexes for table `v_subcategory`
--
ALTER TABLE `v_subcategory`
  ADD PRIMARY KEY (`subCategoryId`),
  ADD KEY `subCategoryId` (`subCategoryId`,`categoryId`);

--
-- Indexes for table `v_transferhistory`
--
ALTER TABLE `v_transferhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_users`
--
ALTER TABLE `v_users`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `userName` (`userName`,`password`);

--
-- Indexes for table `v_vehicles`
--
ALTER TABLE `v_vehicles`
  ADD PRIMARY KEY (`vehicleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mat_users`
--
ALTER TABLE `mat_users`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_category`
--
ALTER TABLE `v_category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100001;

--
-- AUTO_INCREMENT for table `v_dogenerationhistory`
--
ALTER TABLE `v_dogenerationhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `v_drivers`
--
ALTER TABLE `v_drivers`
  MODIFY `driverId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `v_materialrequests`
--
ALTER TABLE `v_materialrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `v_projects`
--
ALTER TABLE `v_projects`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `v_requests`
--
ALTER TABLE `v_requests`
  MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `v_subcategory`
--
ALTER TABLE `v_subcategory`
  MODIFY `subCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `v_transferhistory`
--
ALTER TABLE `v_transferhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `v_users`
--
ALTER TABLE `v_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `v_vehicles`
--
ALTER TABLE `v_vehicles`
  MODIFY `vehicleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
