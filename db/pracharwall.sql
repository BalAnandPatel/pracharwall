-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2023 at 08:40 AM
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
  `createdOn` timestamp NOT NULL,
  `createdBy` varchar(255) NOT NULL,
  `updaredOn` timestamp NOT NULL,
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `business_category`
--

INSERT INTO `business_category` (`id`, `businessCategory`, `subCategory`, `status`, `createdOn`, `createdBy`, `updaredOn`, `updatedBy`) VALUES
(1, 'Food', 'Veg ', 1, '2023-05-29 21:57:29', 'Admin', '0000-00-00 00:00:00', ''),
(2, 'Realestate', 'Land', 1, '2023-05-29 22:08:06', 'Admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_inquiry`
--

CREATE TABLE IF NOT EXISTS `customer_inquiry` (
`id` int(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `cuId` varchar(255) NOT NULL,
  `cuName` varchar(100) NOT NULL,
  `cuEmail` varchar(200) NOT NULL,
  `requiredService` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL,
  `createdBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `customer_inquiry`
--

INSERT INTO `customer_inquiry` (`id`, `userId`, `cuId`, `cuName`, `cuEmail`, `requiredService`, `status`, `createdOn`, `createdBy`) VALUES
(2, '', '', 'mrityunjay ', 'ms@gmail.com', 'new', 0, '2023-06-04 20:29:00', 'mrityunjay '),
(3, '', '', 'yash', 'yash@gmail.com', 'ser', 0, '2023-06-04 20:29:00', 'yash'),
(4, '', '', 'mrityunjay ', 'ms@gmail.com', 'new', 0, '2023-06-04 20:31:00', 'mrityunjay '),
(5, '', '', 'mrityunjay ', 'ms@gmail.com', 'ser', 0, '2023-06-04 20:32:00', 'mrityunjay '),
(6, '', '', 'dwsd', 'dwd@gmail.com', 'dswd', 0, '2023-06-04 20:33:00', 'dwsd'),
(7, '', '', 'mrityunjay ', 'ms@gmail.com', 'any service', 0, '2023-06-04 20:34:00', 'mrityunjay '),
(8, '', '', 'mrityunjay ', 'dwd@gmail.com', 'dwd', 0, '2023-06-04 20:38:00', 'mrityunjay '),
(9, '', '', 'mrityunjay ', 'ms@gmail.com', 'any service', 0, '2023-06-04 20:39:00', 'mrityunjay '),
(10, '', '', 'mrityunjay ', 'ms@gmail.com', 'any service', 0, '2023-06-04 20:44:00', 'mrityunjay '),
(11, '', '', 'mrityunjay ', 'dwd@gmail.com', 'any service', 0, '2023-06-04 20:58:00', 'mrityunjay '),
(12, '', '', 'mrityunjay ', 'dwd@gmail.com', 'any service', 0, '2023-06-04 20:59:00', 'mrityunjay '),
(13, '', '', 'mrityunjay ', 'ms@gmail.com', 'dwd', 0, '2023-06-04 21:08:00', 'mrityunjay '),
(14, '', '', 'mrityunjay ', 'dwd@gmail.com', 'any service', 0, '2023-06-04 21:09:00', 'mrityunjay '),
(15, '', '', 'mrityunjay ', 'ms@gmail.com', 'any service', 0, '2023-06-04 21:10:00', 'mrityunjay '),
(16, '', '', 'yash', 'ms@gmail.com', 'new', 0, '2023-06-04 21:13:00', 'yash'),
(17, '', '', 'mrityunjay ', 'dwd@gmail.com', 'any service', 0, '2023-06-04 21:29:00', 'mrityunjay '),
(18, '', '', 'mrityunjay ', 'dwd@gmail.com', 'dwd', 0, '2023-06-04 21:33:00', 'mrityunjay '),
(19, '', '', 'dwsd', 'ms@gmail.com', 'any service', 0, '2023-06-04 21:34:00', 'dwsd'),
(20, '', '', 'mrityunjay ', 'dwd@gmail.com', 'dwd', 0, '2023-06-04 22:09:00', 'mrityunjay '),
(21, '', '', 'mrityunjay ', 'dwd@gmail.com', 'dwd', 0, '2023-06-06 06:41:00', 'mrityunjay '),
(22, '5', '1', 'mrityunjay ', 'dwd@gmail.com', 'dwd', 0, '2023-06-06 07:14:00', 'mrityunjay '),
(23, '5', '1', 'mrityunjay ', 'dwd@gmail.com', 'dwd', 0, '2023-06-06 07:18:00', 'mrityunjay ');

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
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL,
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `userId`, `businessCategory`, `subCategory`, `alterMobile`, `userAddress`, `city`, `state`, `businessName`, `establishmentYear`, `paymentMode`, `businessTiming`, `businessDay`, `userServices`, `userWebsite`, `aboutUser`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(5, '4', 'Food', '', '3698574859', 'Pratapgarh Road Mungra Badshahpur Jaunpur 222202', 'Jaunpur', 'Uttar Pradesh', 'Shivam Restaurant ', '2023', 'Cash, Master Card, Debit Cards, Credit Cards', '10AM - 8PM', 'Mon - Sat', '', 'https://glintel.com/', 'Hi I am mrityunjay ', 1, '2023-05-31 20:39:58', 'Mrityunjay Singh', '2023-05-31 18:30:00', '4'),
(6, '5', 'Realestate', '', '6354654646', 'Jhusi Prayagraj', 'Prayagraj', 'Uttar Pradesh', 'Ultrimax Land Developer', '2023', 'Cash, Master Card, Visa Card', '10AM - 8PM', 'Mon - Sat', '', 'https://glintel.com/', 'Ultrimax land developer a real estate company  ', 1, '2023-06-02 05:33:39', 'Karan', '2023-06-02 18:30:00', '5'),
(7, '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-06-01 21:55:04', 'Rahul', '0000-00-00 00:00:00', '');

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
  `createdOn` timestamp NOT NULL,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL,
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `userType`, `userName`, `userMobile`, `userEmail`, `userPass`, `status`, `remark`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(5, '2', 'Karan', '654567744655', 'karan@gmail.com', '123456', 1, '', '2023-06-02 05:33:39', 'Karan', '0000-00-00 00:00:00', ''),
(4, '2', 'Mrityunjay Singh', '23654478958', 'ms@gmail.com', '12345', 1, 'Rejected', '2023-05-31 20:39:58', 'Mrityunjay Singh', '0000-00-00 00:00:00', ''),
(6, '3', 'Rahul', '1654474987', 'rahul@gmail.com', '1111', 0, '', '2023-06-01 21:55:04', 'Rahul', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
`id` int(255) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `userRole` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL,
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
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
 ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_category`
--
ALTER TABLE `business_category`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_inquiry`
--
ALTER TABLE `customer_inquiry`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wall_uploads`
--
ALTER TABLE `wall_uploads`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
