-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2023 at 11:25 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glintqnj_pracharwall`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_category`
--

CREATE TABLE `business_category` (
  `id` int(255) NOT NULL,
  `businessCategory` varchar(100) NOT NULL,
  `subCategory` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updaredOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_category`
--

INSERT INTO `business_category` (`id`, `businessCategory`, `subCategory`, `status`, `createdOn`, `createdBy`, `updaredOn`, `updatedBy`) VALUES
(22, 'Education', 'Na', 1, '2023-07-03 06:25:41', 'Admin', '0000-00-00 00:00:00', ''),
(23, 'Programing Courses', 'HTML,CSS,JAVA,PHP', 1, '2023-07-17 05:59:19', 'Admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_inquiry`
--

CREATE TABLE `customer_inquiry` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_inquiry`
--

INSERT INTO `customer_inquiry` (`id`, `userId`, `cuId`, `cuName`, `cuMobile`, `cuAddress`, `cuEmail`, `requiredService`, `status`, `createdOn`, `createdBy`) VALUES
(68, '98', '99', 'Anand', '', '', 'ab@gmail.com', 'Programming Courcews', 0, '2023-07-17 05:39:00', 'Anand'),
(69, '100', '101', 'Sarita Patel', '', '', 'saritapatel680@gmail.com', 'Manths and HIndi clases', 0, '2023-07-17 06:23:00', 'Sarita Patel'),
(70, '100', '103', 'Anand', '', '', 'cut@gmail.com', 'We need programing cources', 0, '2023-07-18 06:17:00', 'Anand'),
(71, '98', '106', 'Yash', '', '', 'yashh@gmail.com', 'Jn', 0, '2023-07-17 22:18:00', 'Yash');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `userId`, `businessCategory`, `subCategory`, `alterMobile`, `userAddress`, `city`, `state`, `businessName`, `establishmentYear`, `paymentMode`, `businessTiming`, `businessDay`, `userServices`, `userWebsite`, `aboutUser`, `remark`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(94, '99', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-07-17 05:39:03', '99', '0000-00-00 00:00:00', ''),
(95, '100', '22', '', '8764534218', 'Madardeeh', 'Jaunpur', 'Up', 'Tanu Classes', '2001', 'Cash, Master Card, Visa Card, Debit Cards, Credit Cards, Cheques', '10:00am-8:00pm', 'Mon - Sat', 'Education', 'https://www.pracharwall.com', 'my eduction bussines is the best bussines', 'Approved', 1, '2023-07-17 06:23:09', '100', '2023-07-16 18:30:00', '100'),
(96, '101', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-07-17 05:56:52', '101', '0000-00-00 00:00:00', ''),
(93, '98', '22', '', '3214569877', 'Jaunpur', 'Jaunpur', 'Uttar Pradesh', 'Glintel Online Center Mungra', '2020', 'Cash, Master Card', '10:00-06:00pm', 'Mon - Fri', 'Glintel', 'https://glintel.com/fsadmitcard/user/registration_list.php', 'slslls', 'Approved', 1, '2023-07-17 05:47:16', '98', '2023-07-16 18:30:00', '98'),
(97, '102', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-07-17 06:27:38', '102', '0000-00-00 00:00:00', ''),
(98, '103', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-07-18 06:15:41', '103', '0000-00-00 00:00:00', ''),
(99, '104', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-07-17 22:11:55', '104', '0000-00-00 00:00:00', ''),
(100, '105', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-07-17 22:15:31', '105', '0000-00-00 00:00:00', ''),
(101, '106', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-07-17 22:16:51', '106', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_history`
--

CREATE TABLE `user_profile_history` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_history`
--

INSERT INTO `user_profile_history` (`id`, `userId`, `businessCategory`, `subCategory`, `alterMobile`, `userAddress`, `city`, `state`, `businessName`, `establishmentYear`, `paymentMode`, `businessTiming`, `businessDay`, `userServices`, `userWebsite`, `aboutUser`, `remark`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(68, '100', '22', '', '8764534218', 'Madardeeh', 'Jaunpur', 'Up', 'Tanu Brand', '2001', 'Cash', '10:00am-8:00pm', 'Mon - Sat', 'Education', 'https://www.pracharwall.com', 'my eduction bussines is the best bussines', '', 0, '2023-07-17 06:23:49', '', '2023-07-16 18:30:00', '100'),
(66, '100', '22', '', '8764534218', 'Madardeeh', 'Jaunpur', 'Up', 'Tanu Classes', '2001', 'Cash, Master Card, Visa Card, Debit Cards, Credit Cards, Cheques', '10:00am-8:00pm', 'Mon - Sat', 'Education', 'https://www.pracharwall.com', 'my eduction bussines is the best bussines', 'Approved', 1, '2023-07-17 06:23:09', '100', '2023-07-16 18:30:00', '100'),
(67, '101', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Approved', 1, '2023-07-17 06:23:09', '101', '0000-00-00 00:00:00', ''),
(63, '98', '22', '', '3214569877', 'Jaunpur', 'Jaunpur', 'Uttar Pradesh', 'Glintel Online Center', '2020', 'Cash', '10:00-06:00pm', 'Mon - Sun', 'Glintel', 'https://glintel.com/fsadmitcard/user/registration_list.php', 'slslls', 'Approved', 1, '2023-07-17 05:37:31', '98', '2023-07-16 18:30:00', '98'),
(64, '99', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Approved', 1, '2023-07-17 05:47:16', '99', '0000-00-00 00:00:00', ''),
(65, '98', '22', '', '3214569877', 'Jaunpur', 'Jaunpur', 'Uttar Pradesh', 'Glintel Online Center Mungra', '2020', 'Cash, Master Card', '10:00-06:00pm', 'Mon - Fri', 'Glintel', 'https://glintel.com/fsadmitcard/user/registration_list.php', 'slslls', 'Approved', 1, '2023-07-17 05:47:16', '', '2023-07-16 18:30:00', '98'),
(69, '102', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '2023-07-17 06:27:38', '102', '0000-00-00 00:00:00', ''),
(70, '103', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '2023-07-18 06:15:41', '103', '0000-00-00 00:00:00', ''),
(71, '104', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '2023-07-17 22:11:55', '104', '0000-00-00 00:00:00', ''),
(72, '105', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '2023-07-17 22:15:31', '105', '0000-00-00 00:00:00', ''),
(73, '106', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '2023-07-17 22:16:51', '106', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `userType`, `userName`, `userMobile`, `userEmail`, `userPass`, `status`, `remark`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(1, '1', 'Admin LTE', '', 'admin@gmail.com', 'admin@123', 1, '', '2023-07-12 08:31:13', '', '0000-00-00 00:00:00', ''),
(98, '2', 'Anand', '1234567893', 'abc@gmail.com', '12345', 0, '', '2023-07-17 05:35:16', 'Anand', '0000-00-00 00:00:00', ''),
(99, '3', 'Anand', '55665566', 'ab@gmail.com', '12345', 0, '', '2023-07-17 05:39:03', 'Anand', '0000-00-00 00:00:00', ''),
(100, '2', 'Tanu Tiwari', '9580765083', 'tanugict@gmail.com', '123', 0, '', '2023-07-17 05:56:38', 'Tanu Tiwari', '0000-00-00 00:00:00', ''),
(101, '3', 'Sarita Patel', '9795496850', 'saritapatel680@gmail.com', '12345', 0, '', '2023-07-17 05:56:52', 'Sarita Patel', '0000-00-00 00:00:00', ''),
(102, '3', 'Riya Tiwari', '9580765083', 'riya@gmail.com', '123', 0, '', '2023-07-17 06:27:38', 'Riya Tiwari', '0000-00-00 00:00:00', ''),
(103, '3', 'Anand', '9638527413', 'cut@gmail.com', '123', 0, '', '2023-07-18 06:15:41', 'Anand', '0000-00-00 00:00:00', ''),
(104, '3', 'Yash', '7896541230', 'yash@gmail.com', '123', 0, '', '2023-07-17 22:11:55', 'Yash', '0000-00-00 00:00:00', ''),
(105, '2', 'U', '123456', 'yas@gmail.com', '123', 0, '', '2023-07-17 22:15:31', 'U', '0000-00-00 00:00:00', ''),
(106, '3', 'Yash', '12345', 'yashh@gmail.com', '123', 0, '', '2023-07-17 22:16:51', 'Yash', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(255) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `userRole` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `wall_uploads` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wall_uploads`
--

INSERT INTO `wall_uploads` (`id`, `userId`, `businessCategory`, `subCategory`, `wallImg`, `status`, `remark`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(43, '100', '22', '', 'wall_img_100_27.png', 1, 'Approved', '2023-07-17 06:24:53', '100', '0000-00-00 00:00:00', ''),
(42, '98', '22', '', 'wall_img_98_39.jpg', 1, 'Approved', '2023-07-17 05:44:20', '98', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `wall_upload_history`
--

CREATE TABLE `wall_upload_history` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wall_upload_history`
--

INSERT INTO `wall_upload_history` (`id`, `userId`, `businessCategory`, `subCategory`, `wallImg`, `status`, `remark`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(45, '100', '22', '', 'wall_img_100_27.png', 1, 'Approved', '2023-07-17 06:24:53', '100', '0000-00-00 00:00:00', ''),
(44, '100', '22', '', 'wall_img_100_43.png', 1, 'Approved', '2023-07-17 06:22:44', '100', '0000-00-00 00:00:00', ''),
(43, '98', '22', '', 'wall_img_98_39.jpg', 1, 'Approved', '2023-07-17 05:44:20', '98', '0000-00-00 00:00:00', ''),
(42, '98', '22', '', 'wall_img_98_22.png', 1, 'Approved', '2023-07-17 05:37:23', '98', '0000-00-00 00:00:00', '');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wall_uploads`
--
ALTER TABLE `wall_uploads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`userId`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer_inquiry`
--
ALTER TABLE `customer_inquiry`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `user_profile_history`
--
ALTER TABLE `user_profile_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wall_uploads`
--
ALTER TABLE `wall_uploads`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `wall_upload_history`
--
ALTER TABLE `wall_upload_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
