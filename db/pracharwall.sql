-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2023 at 12:33 PM
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
  `updaredOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `business_category`
--

INSERT INTO `business_category` (`id`, `businessCategory`, `subCategory`, `status`, `createdOn`, `createdBy`, `updaredOn`, `updatedBy`) VALUES
(22, 'Education', 'Na', 1, '2023-07-03 06:25:41', 'Admin', '0000-00-00 00:00:00', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `customer_inquiry`
--

INSERT INTO `customer_inquiry` (`id`, `userId`, `cuId`, `cuName`, `cuMobile`, `cuAddress`, `cuEmail`, `requiredService`, `status`, `createdOn`, `createdBy`) VALUES
(67, '68', '68', 'Mrityunjay Singh', '', '', 'ms@gmail.com', 'Dw', 0, '2023-07-04 00:21:00', 'Mrityunjay Singh');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `userId`, `businessCategory`, `subCategory`, `alterMobile`, `userAddress`, `city`, `state`, `businessName`, `establishmentYear`, `paymentMode`, `businessTiming`, `businessDay`, `userServices`, `userWebsite`, `aboutUser`, `remark`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(67, '72', '22', '', '2365478956', 'Mungra Badshahpur Jaunpur  Uttar Pradesh 222202', 'Mungra Badshahpur', 'Uttar Pradesh', 'Glintel Technology 3', '2015', 'Cash, Master Card, Visa Card, Debit Cards', '9 Am To 6 Pm', 'Mon - Sat', 'Web Development  ', 'https://www.glintel.com/', 'glintel technology private limited company', 'Approved', 1, '2023-07-08 09:33:24', '72', '2023-07-07 18:30:00', '72'),
(68, '73', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-07-07 06:10:45', '73', '0000-00-00 00:00:00', '');

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
  `createdOn` timestamp NOT NULL,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL,
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_profile_history`
--

INSERT INTO `user_profile_history` (`id`, `userId`, `businessCategory`, `subCategory`, `alterMobile`, `userAddress`, `city`, `state`, `businessName`, `establishmentYear`, `paymentMode`, `businessTiming`, `businessDay`, `userServices`, `userWebsite`, `aboutUser`, `remark`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(5, '72', '22', '', '2365478956', 'Mungra Badshahpur Jaunpur  Uttar Pradesh 222202', 'Mungra Badshahpur', 'Uttar Pradesh', 'Glintel Technology ( GIPL1)', '2015', 'Cash, Master Card, Visa Card', '9 Am To 6 Pm', 'Mon - Sat', 'Web Development  ', 'https://www.glintel.com/', 'glintel technology private limited company', 'Approved', 1, '0000-00-00 00:00:00', '', '2023-07-06 18:30:00', '72'),
(6, '72', '22', '', '2365478956', 'Mungra Badshahpur Jaunpur  Uttar Pradesh 222202', 'Mungra Badshahpur', 'Uttar Pradesh', 'Glintel Technology 2', '2015', 'Cash', '9 Am To 6 Pm', 'Wed - Wed', 'Web Development  ', 'https://www.glintel.com/', 'glintel technology private limited company', 'Approved', 1, '0000-00-00 00:00:00', '', '2023-07-06 18:30:00', '72'),
(7, '72', '22', '', '2365478956', 'Mungra Badshahpur Jaunpur  Uttar Pradesh 222202', 'Mungra Badshahpur', 'Uttar Pradesh', 'Glintel Technology 3', '2015', 'Cash, Master Card, Visa Card, Debit Cards', '9 Am To 6 Pm', 'Mon - Sat', 'Web Development  ', 'https://www.glintel.com/', 'glintel technology private limited company', 'Approved', 1, '0000-00-00 00:00:00', '', '2023-07-07 18:30:00', '72');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `userType`, `userName`, `userMobile`, `userEmail`, `userPass`, `status`, `remark`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(72, '2', 'Mrityunjay Singh', '1234569871', 'ms123@gmail.com', '123', 0, '', '2023-07-07 08:48:09', 'Mrityunjay Singh', '0000-00-00 00:00:00', ''),
(73, '2', 'Arun Kumar Patel', '2365896589', 'arun12345@gmail.com', '12345', 0, '', '2023-07-07 06:10:45', 'Arun Kumar Patel', '0000-00-00 00:00:00', ''),
(1, '1', 'Admin', '16541654', 'admin@gmail.com', 'admin@123', 1, '', '2023-07-06 11:12:09', '', '0000-00-00 00:00:00', '');

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
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wall_uploads`
--

INSERT INTO `wall_uploads` (`id`, `userId`, `businessCategory`, `subCategory`, `wallImg`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(2, '72', '', '', 'wall_img_72_43.png', 0, '2023-07-08 11:55:03', '72', '2023-07-07 18:30:00', '72');

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
  `createdOn` timestamp NOT NULL,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL,
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_category`
--
ALTER TABLE `business_category`
 ADD PRIMARY KEY (`id`);

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
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `customer_inquiry`
--
ALTER TABLE `customer_inquiry`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `user_profile_history`
--
ALTER TABLE `user_profile_history`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wall_uploads`
--
ALTER TABLE `wall_uploads`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wall_upload_history`
--
ALTER TABLE `wall_upload_history`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
