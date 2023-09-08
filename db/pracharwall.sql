-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2023 at 11:31 AM
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
  `businessCategory` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subCategory` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `business_category`
--

INSERT INTO `business_category` (`id`, `businessCategory`, `subCategory`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(25, 'Education', 'NA', 1, '2023-09-04 09:52:30', 'Admin', '2023-09-03 21:52:28', 'Admin'),
(24, 'Medical', 'Na', 1, '2023-07-21 06:05:49', 'Admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_inquiry`
--

CREATE TABLE IF NOT EXISTS `customer_inquiry` (
`id` int(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `cuId` varchar(255) NOT NULL,
  `cuName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cuMobile` varchar(20) NOT NULL,
  `cuAddress` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cuEmail` varchar(200) NOT NULL,
  `requiredService` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE IF NOT EXISTS `review_table` (
`review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `business_owner` varchar(255) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `created_on` bigint(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_id`, `business_owner`, `user_rating`, `user_review`, `created_on`) VALUES
(22, 'Mrityunjay Singh', '128', '128', 3, 'Veri good service ', 1694168227),
(24, 'Ms', '128', '129', 3, 'Dcdc', 1694171461);

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
  `userAddress` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `businessName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `establishmentYear` varchar(100) NOT NULL,
  `paymentMode` varchar(100) NOT NULL,
  `businessTiming` varchar(100) NOT NULL,
  `businessDay` varchar(50) NOT NULL,
  `userServices` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userWebsite` varchar(255) NOT NULL,
  `aboutUser` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `userId`, `businessCategory`, `subCategory`, `alterMobile`, `userAddress`, `city`, `state`, `businessName`, `establishmentYear`, `paymentMode`, `businessTiming`, `businessDay`, `userServices`, `userWebsite`, `aboutUser`, `remark`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(123, '128', '24', '', '2365478541', 'मेडुआडीह चौराहा नरायनपुर कला प्रतापगढ', 'प्रतापगढ', 'उत्तर प्रदेश', 'मेरा बिजनेस', '2021', 'Cash, Master Card, Visa Card, Debit Cards', '10 Am To 06 Pm', 'Mon - Sat', 'हमारे सर्विसेज', '', 'बिजनेश के बारे में ।', 'Approved', 1, '2023-09-04 09:51:20', '128', '2023-09-03 18:30:00', '128'),
(124, '129', '24', '', '6546545', 'Jaipalpur', 'Mugra Badshahpur', 'Uttar Pradesh', 'Yash Medical ', '2010', 'Cash, Master Card, Visa Card, Debit Cards', '10 Am To 6 Pm', 'Mon - Sat', 'Your Services', '', 'yash medical shop', 'Approved', 1, '2023-09-08 10:54:06', '129', '2023-09-07 18:30:00', '129');

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
  `userAddress` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `businessName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `establishmentYear` varchar(100) NOT NULL,
  `paymentMode` varchar(100) NOT NULL,
  `businessTiming` varchar(100) NOT NULL,
  `businessDay` varchar(100) NOT NULL,
  `userServices` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userWebsite` varchar(255) NOT NULL,
  `aboutUser` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `user_profile_history`
--

INSERT INTO `user_profile_history` (`id`, `userId`, `businessCategory`, `subCategory`, `alterMobile`, `userAddress`, `city`, `state`, `businessName`, `establishmentYear`, `paymentMode`, `businessTiming`, `businessDay`, `userServices`, `userWebsite`, `aboutUser`, `remark`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(100, '128', '24', '', '2365478541', 'Ms Add', 'Ms City', 'Ms State', 'Ms Medical', '2021', 'Cash, Master Card, Visa Card, Debit Cards, Credit Cards', '10 Am To 06 Pm', 'Mon - Sat', 'Cxsds', '', 'desdf', 'Approved', 1, '2023-09-02 11:00:47', '128', '2023-09-01 18:30:00', '128'),
(101, '128', '24', '', '2365478541', 'मेडुआडीह चौराहा नरायनपुर कला प्रतापगढ', 'प्रतापगढ', 'उत्तर प्रदेश', 'मेरा बिजनेस', '2021', 'Cash, Master Card, Visa Card, Debit Cards', '10 Am To 06 Pm', 'Mon - Sat', 'हमारे सर्विसेज', '', 'बिजनेश के बारे में ।', 'Approved', 1, '2023-09-04 09:51:20', '', '2023-09-03 18:30:00', '128'),
(102, '129', '24', '', '6546545', 'Jaipalpur', 'Mugra Badshahpur', 'Uttar Pradesh', 'Yash Medical ', '2010', 'Cash, Master Card, Visa Card, Debit Cards', '10 Am To 6 Pm', 'Mon - Sat', 'Your Services', '', 'yash medical shop', 'Approved', 1, '2023-09-08 10:54:06', '129', '2023-09-07 18:30:00', '129');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `userType`, `userName`, `userMobile`, `userEmail`, `userPass`, `status`, `remark`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(1, '1', 'Admin LTE', '', 'admin@gmail.com', 'admin@123', 1, '', '2023-07-12 08:31:13', '', '0000-00-00 00:00:00', ''),
(129, '2', 'Yash Maurya', '123456789', 'yash@gmail.com', '190362', 0, '', '2023-09-07 22:50:06', 'Yash Maurya', '0000-00-00 00:00:00', ''),
(128, '2', 'Mrityunjay Singh', '165464', 'ms@gmail.com', '798730', 0, '', '2023-09-01 22:52:08', 'Mrityunjay Singh', '0000-00-00 00:00:00', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `wall_uploads`
--

INSERT INTO `wall_uploads` (`id`, `userId`, `businessCategory`, `subCategory`, `wallImg`, `status`, `remark`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(63, '129', '24', '', 'wall_img_129_24.jpg', 1, 'Approved', '2023-09-08 10:54:00', '129', '0000-00-00 00:00:00', ''),
(62, '128', '24', '', 'wall_img_128_55.jpg', 1, 'Approved', '2023-09-02 11:00:39', '128', '0000-00-00 00:00:00', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `wall_upload_history`
--

INSERT INTO `wall_upload_history` (`id`, `userId`, `businessCategory`, `subCategory`, `wallImg`, `status`, `remark`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(80, '129', '24', '', 'wall_img_129_24.jpg', 1, 'Approved', '2023-09-08 10:54:00', '129', '0000-00-00 00:00:00', ''),
(79, '128', '24', '', 'wall_img_128_55.jpg', 1, 'Approved', '2023-09-02 11:00:39', '128', '0000-00-00 00:00:00', '');

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
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
 ADD PRIMARY KEY (`review_id`);

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
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `customer_inquiry`
--
ALTER TABLE `customer_inquiry`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `user_profile_history`
--
ALTER TABLE `user_profile_history`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wall_uploads`
--
ALTER TABLE `wall_uploads`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `wall_upload_history`
--
ALTER TABLE `wall_upload_history`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
