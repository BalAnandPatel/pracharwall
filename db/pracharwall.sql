-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2023 at 08:21 AM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pracharwall`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_category`
--

CREATE TABLE IF NOT EXISTS `business_category` (
`id` int(255) NOT NULL,
  `businessCategory` varchar(100) NOT NULL,
  `subCategory` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `business_category`
--

INSERT INTO `business_category` (`id`, `businessCategory`, `subCategory`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(25, 'Education', 'NA', 1, '2023-07-25 07:50:00', 'Admin', '2023-07-24 19:49:51', 'Admin'),
(24, 'Medical', 'Na', 1, '2023-07-21 06:05:49', 'Admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_inquiry`
--

CREATE TABLE IF NOT EXISTS `customer_inquiry` (
`id` int(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `cuId` varchar(255) NOT NULL,
  `cuName` varchar(100) NOT NULL,
  `cuMobile` varchar(20) NOT NULL,
  `cuAddress` varchar(255) NOT NULL,
  `cuEmail` varchar(200) NOT NULL,
  `requiredService` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
`id` int(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `businessCategory` varchar(100) NOT NULL,
  `subCategory` varchar(100) NOT NULL,
  `alterMobile` varchar(12) NOT NULL,
  `userAddress` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(255) NOT NULL,
  `businessName` varchar(100) NOT NULL,
  `establishmentYear` varchar(100) NOT NULL,
  `paymentMode` varchar(100) NOT NULL,
  `businessTiming` varchar(100) NOT NULL,
  `businessDay` varchar(50) NOT NULL,
  `userServices` varchar(100) NOT NULL,
  `userWebsite` varchar(255) NOT NULL,
  `aboutUser` varchar(2000) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `userId`, `businessCategory`, `subCategory`, `alterMobile`, `userAddress`, `city`, `state`, `businessName`, `establishmentYear`, `paymentMode`, `businessTiming`, `businessDay`, `userServices`, `userWebsite`, `aboutUser`, `remark`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(122, '127', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-08-24 22:57:41', '127', '0000-00-00 00:00:00', ''),
(120, '125', '25', '', '16524', 'Add Ress', 'City 1', 'Ste ', 'Ms Education', '2010', 'Cash, Master Card, Credit Cards', '10 Am To 6 Pm', 'Mon - Sat', 'Xmk', '', 'xdx', 'Approved', 1, '2023-08-24 12:19:32', '125', '2023-08-23 18:30:00', '125'),
(121, '126', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-08-24 20:35:04', '126', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_history`
--

CREATE TABLE IF NOT EXISTS `user_profile_history` (
`id` int(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `businessCategory` varchar(100) NOT NULL,
  `subCategory` varchar(100) NOT NULL,
  `alterMobile` varchar(12) NOT NULL,
  `userAddress` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `businessName` varchar(100) NOT NULL,
  `establishmentYear` varchar(100) NOT NULL,
  `paymentMode` varchar(100) NOT NULL,
  `businessTiming` varchar(100) NOT NULL,
  `businessDay` varchar(100) NOT NULL,
  `userServices` varchar(1000) NOT NULL,
  `userWebsite` varchar(255) NOT NULL,
  `aboutUser` varchar(2000) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `user_profile_history`
--

INSERT INTO `user_profile_history` (`id`, `userId`, `businessCategory`, `subCategory`, `alterMobile`, `userAddress`, `city`, `state`, `businessName`, `establishmentYear`, `paymentMode`, `businessTiming`, `businessDay`, `userServices`, `userWebsite`, `aboutUser`, `remark`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(99, '127', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '2023-08-24 22:57:41', '127', '0000-00-00 00:00:00', ''),
(97, '125', '25', '', '16524', 'Add Ress', 'City 1', 'Ste ', 'Ms Education', '2010', 'Cash, Master Card, Credit Cards', '10 Am To 6 Pm', 'Mon - Sat', 'Xmk', '', 'xdx', 'Approved', 1, '2023-08-24 12:19:32', '125', '2023-08-23 18:30:00', '125'),
(98, '126', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '2023-08-24 20:35:04', '126', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE IF NOT EXISTS `user_registration` (
`id` int(255) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userMobile` varchar(12) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `userPass` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `userType`, `userName`, `userMobile`, `userEmail`, `userPass`, `status`, `remark`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(1, '1', 'Admin LTE', '', 'admin@gmail.com', 'admin@123', 1, '', '2023-07-12 08:31:13', '', '0000-00-00 00:00:00', ''),
(126, '2', 'Mrityunjay Singh', '1651654', 'ms@00xm.com', 'mmmd', 0, '', '2023-08-24 20:35:04', 'Mrityunjay Singh', '0000-00-00 00:00:00', ''),
(127, '2', 'Yash', '654564', 'yasmaurya2000@gmail.com', '54', 0, '', '2023-08-24 22:57:41', 'Yash', '0000-00-00 00:00:00', ''),
(125, '2', 'Mrityunjay Singh ', '165465', 'ms@gmail.com', '12345', 0, '', '2023-08-24 00:07:06', 'Mrityunjay Singh ', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
`id` int(255) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `userRole` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `userType`, `userRole`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(1, '1', 'Admin', 1, '2023-05-30 11:19:18', '', '2023-05-30 11:19:18', ''),
(2, '2', 'User', 1, '2023-05-30 11:19:18', '', '2023-05-30 11:19:18', ''),
(3, '3', 'Customer', 1, '2023-05-30 11:20:10', '', '2023-05-30 11:20:10', '');

-- --------------------------------------------------------

--
-- Table structure for table `wall_uploads`
--

CREATE TABLE IF NOT EXISTS `wall_uploads` (
`id` int(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `businessCategory` varchar(100) NOT NULL,
  `subCategory` varchar(100) NOT NULL,
  `wallImg` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `wall_uploads`
--

INSERT INTO `wall_uploads` (`id`, `userId`, `businessCategory`, `subCategory`, `wallImg`, `status`, `remark`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(61, '125', '25', '', 'wall_img_125_89.png', 1, 'Approved', '2023-08-24 12:18:45', '125', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `wall_upload_history`
--

CREATE TABLE IF NOT EXISTS `wall_upload_history` (
`id` int(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `businessCategory` varchar(100) NOT NULL,
  `subCategory` varchar(100) NOT NULL,
  `wallImg` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `wall_upload_history`
--

INSERT INTO `wall_upload_history` (`id`, `userId`, `businessCategory`, `subCategory`, `wallImg`, `status`, `remark`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(78, '125', '25', '', 'wall_img_125_89.png', 1, 'Approved', '2023-08-24 12:18:45', '125', '0000-00-00 00:00:00', ''),
(77, '125', '25', '', 'wall_img_125_74.png', 2, 'rejected 2', '2023-08-24 12:18:02', '125', '0000-00-00 00:00:00', ''),
(76, '125', '25', '', 'wall_img_125_100.png', 2, 'rejected 1', '2023-08-24 12:16:52', '125', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_category`
--
ALTER TABLE `business_category`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `businessCategory` (`businessCategory`);

--
-- Indexes for table `customer_inquiry`
--
ALTER TABLE `customer_inquiry`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile_history`
--
ALTER TABLE `user_profile_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wall_uploads`
--
ALTER TABLE `wall_uploads`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `wall_upload_history`
--
ALTER TABLE `wall_upload_history`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_category`
--
ALTER TABLE `business_category`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `customer_inquiry`
--
ALTER TABLE `customer_inquiry`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `user_profile_history`
--
ALTER TABLE `user_profile_history`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wall_uploads`
--
ALTER TABLE `wall_uploads`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `wall_upload_history`
--
ALTER TABLE `wall_upload_history`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
