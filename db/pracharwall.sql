-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2023 at 01:57 PM
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
(19, 'Travel &amp; Transport', 'Travel', 1, '2023-06-28 19:51:05', 'Admin', '0000-00-00 00:00:00', ''),
(18, 'Health &amp; Clinic', 'Doctor', 1, '2023-06-28 19:50:06', 'Admin', '0000-00-00 00:00:00', ''),
(20, 'Home Coching', 'Center', 1, '2023-06-28 19:54:45', 'Admin', '0000-00-00 00:00:00', ''),
(21, 'Progaraming Courses', 'All Courses', 1, '2023-06-28 20:12:34', 'Admin', '0000-00-00 00:00:00', '');

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
(50, '52', '52', 'Rani Pal', '7651882341', 'nibhapur', 'radhapalpal2000@gmail.com', 'Pasta', 0, '2023-06-28 19:49:00', 'rani pal'),
(49, '48', '48', 'Pramila Patel', '9372832713', 'nibhapur', 'pramilapatel095@gmail.com', 'Kurkure', 0, '2023-06-28 19:48:00', 'pramila patel'),
(48, '47', '47', 'Kajal Yadav', '8456457667', 'Jakhiniya raipur', 'saritapatel680@gmail.com', 'Rasgulla', 0, '2023-06-28 19:46:00', 'Kajal Yadav'),
(47, '47', '47', 'Kajal Yadav', '8456457667', 'Jakhiniya raipur', 'saritapatel680@gmail.com', 'Rasgulla', 0, '2023-06-28 19:46:00', 'Kajal Yadav'),
(46, '48', '48', 'Rupma', '5678453678', 'mugranbadshahpur', 'hoeny@gmail.com', 'Education', 0, '2023-06-28 19:45:00', 'rupma'),
(45, '48', '48', 'Sarita Patel', '9795496850', 'Raipur', 'saritapatel680@gmail.com', 'Laddu', 0, '2023-06-28 19:44:00', 'Sarita patel'),
(44, '47', '47', 'Rani Pal', '7641882341', 'nibhapur', 'radhapalpal2000@gmail.com', 'Adca', 0, '2023-06-28 19:44:00', 'rani pal'),
(51, '52', '52', 'Pramila', '9372832713', 'nibhapur', 'pramilapatel095@gmail.com', 'Laddoo', 0, '2023-06-28 19:50:00', 'pramila'),
(52, '47', '47', 'Pramila Patel', '9372832713', 'nibhapur', 'pramilapatel095@gmail.com', 'Rasgulla', 0, '2023-06-28 19:54:00', 'pramila patel'),
(53, '54', '54', 'Nisha Patel', '45847645564', 'Jaypal pur', 'saritapatel680@gmail.com', 'Teeth', 0, '2023-06-28 20:05:00', 'Nisha patel'),
(54, '57', '57', 'Kajal ', '9795496850', 'Raipur', 'saritapatel680@gmail.com', 'Html, css java', 0, '2023-06-28 20:07:00', 'Kajal '),
(55, '54', '54', 'Rani Pal', '7651882341', 'nibhapur', 'radhapalpal2000@gmail.com', 'Pasta and nasta', 0, '2023-06-28 20:09:00', 'rani pal'),
(56, '59', '59', 'Kajal Yadav', '5698595756', 'Umarganj', 'saritapatel680@gmail.com', 'Coldring', 0, '2023-06-28 20:14:00', 'Kajal yadav'),
(57, '58', '58', 'Sarita', '9335605074', 'madardeeh', 'rupmamaurya@gmail.com', 'Icecream', 0, '2023-06-28 20:16:00', 'sarita'),
(58, '54', '54', 'Pramila Patel', '9372832713', 'nibhapur', 'pramilapatel095@gmail.com', 'Tree', 0, '2023-06-28 20:16:00', 'pramila patel'),
(59, '58', '58', 'Khushi Tiwari', '9795496850', 'raipur', 'saritapatel680@gmail.com', 'Pasta', 0, '2023-06-28 20:16:00', 'Khushi tiwari'),
(60, '58', '58', 'Srita', '5678994367', 'madardeeh', 'rupmamaurya@gmail.com', 'Icecreem', 0, '2023-06-28 20:18:00', 'srita'),
(61, '57', '57', 'Rani Pal', '7651882341', 'rampur bhodi', 'radhapalpal2000@gmail.com', 'Hii pramila', 0, '2023-06-28 20:29:00', 'rani pal');

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
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `userId`, `businessCategory`, `subCategory`, `alterMobile`, `userAddress`, `city`, `state`, `businessName`, `establishmentYear`, `paymentMode`, `businessTiming`, `businessDay`, `userServices`, `userWebsite`, `aboutUser`, `status`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(60, '64', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-06-28 20:37:43', 'Rani Pal', '0000-00-00 00:00:00', ''),
(61, '65', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-06-28 20:55:23', 'Fff', '0000-00-00 00:00:00', ''),
(62, '66', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-06-28 20:56:01', 'Mrityunjay Singh', '0000-00-00 00:00:00', ''),
(59, '63', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-06-28 20:33:30', 'Jooly', '0000-00-00 00:00:00', ''),
(58, '62', 'Progaraming Courses', '', '9918956769', 'Banbeerpur', 'Mugrabadshahpur', 'Uthar Prdesh', 'Progaraming Center', '2023', 'Cash, Master Card, Visa Card, Debit Cards, Credit Cards, Cheques', '2-23', 'Wed - Wed', '', 'https://website.com', 'welcome to gict computer', 0, '2023-06-29 08:37:33', 'Sarita', '2023-06-28 18:30:00', '62'),
(57, '61', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-06-28 20:28:21', 'Sarita', '0000-00-00 00:00:00', ''),
(56, '60', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-06-28 20:07:13', 'Jiya Tiwari', '0000-00-00 00:00:00', ''),
(55, '59', 'Home Coching', '', '9335605074', 'Madardeeh', 'Mugrabadshahpur', 'Uthar Prdesh', 'Gict Compney', '2023', 'Cash, Master Card, Visa Card, Debit Cards, Credit Cards, Cheques', '1-38', 'Tue - Tue', '', 'https://website.com', 'welcome to gict', 0, '2023-06-29 08:10:30', 'Radha', '2023-06-28 18:30:00', '59'),
(54, '58', 'Health &amp; Clinic', '', '3467568956', 'Madardeeh Raipur', 'JAUNPUR', 'UTTAR PRADESH', 'Ankita Trade', '2001', 'Cash', '08AM T0  5PM', 'Mon - Sat', '', 'https://www.pracharwall.com', 'My bussiness is start good conditoin.', 0, '2023-06-29 08:14:03', 'Ankita', '2023-06-28 18:30:00', '58'),
(52, '56', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-06-28 19:59:42', 'Ankita Tiwari', '0000-00-00 00:00:00', ''),
(53, '57', 'Home Coching', '', '9372832713', 'Nibhapur', 'Prayagraj', 'Up', 'Programing Center', '2023', 'Cash, Master Card, Visa Card, Debit Cards, Credit Cards, Cheques', '10-11', 'Mon - Sat', '', 'https://www.website.com', 'welcome to programing center', 0, '2023-06-29 08:05:11', 'Pramila Patel', '2023-06-28 18:30:00', '57'),
(49, '53', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-06-28 19:45:43', 'Pramila Patel', '0000-00-00 00:00:00', ''),
(45, '49', 'na', '', 'na', 'Raipur', 'na', 'na', 'na', 'na', 'na', 'na', 'na', '', 'na', 'na', 0, '2023-06-29 07:41:38', 'Sarita Patel', '2023-06-28 18:30:00', '49'),
(46, '50', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-06-28 19:35:38', 'Rupma', '0000-00-00 00:00:00', ''),
(47, '51', 'Education', '', '9372832713', 'Nibhapur', 'Prayagraj', 'Up', 'Pramila Center', '2023', 'Cash, Master Card, Visa Card, Debit Cards, Credit Cards, Cheques', '10-11', 'Mon - Sat', '', 'https://www.website.com', 'welcome', 0, '2023-06-29 07:38:45', 'Pramila Patel', '2023-06-28 18:30:00', '51'),
(48, '52', ' Home Coching', '', '5678453678', 'Mungra Badshahpur Jaunpur Uttar Pradesh 222202', 'MUNGRA BADSHAHPUR', 'UTTAR PRADESH', 'Public Dhaba', '2023', 'Cash, Master Card, Visa Card, Debit Cards, Credit Cards, Cheques', '10AM to 08PM', 'Tue - Tue', '', 'https://www.website.com', 'you are bussiness', 0, '2023-06-29 07:42:32', 'Rupma', '2023-06-28 18:30:00', '52'),
(50, '54', 'Health &amp; Clinic', '', '9565561904', 'Mungra Badshahpur Jaunpur Uttar Pradesh 222202', 'Badshahpur', 'UTTAR PRADESH', 'Green Garden', '2023', 'Cash, Master Card, Visa Card, Debit Cards, Credit Cards, Cheques', '10AM to 08PM', 'Tue - Tue', '', 'https://www.website.com', 'this is best green garden', 0, '2023-06-29 08:03:35', 'Radha', '2023-06-28 18:30:00', '54'),
(51, '55', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-06-28 19:58:54', 'Rupma', '0000-00-00 00:00:00', ''),
(43, '47', 'Education', '', '7651882341', 'Nibhapur', 'Prayagraj', 'Up', 'New Gict Computer', '2023', 'Cash, Master Card, Visa Card, Debit Cards, Credit Cards, Cheques', '10-11', 'Tue - Wed', '', 'https://www.website.com', 'this is best gict computer', 0, '2023-06-29 07:39:20', 'Rani Pal', '2023-06-28 18:30:00', '47'),
(44, '48', 'Education', '', '8765346282', 'Madardeeh Raipur', 'JAUNPUR', 'UTTAR PRADESH', 'Tanu Foods', '2002', 'Cash', '08AM T0  5PM', 'Mon - Sat', '', 'https://www.pracharwall.com', 'my bussiness is the best bussiness.', 0, '2023-06-29 07:58:10', 'Tanu Tiwari', '2023-06-28 18:30:00', '48'),
(42, '46', 'Education', '', '02536985478', 'Bhujayni, Kahala, Pratapgarh, Uttar Pradesh', 'Pratapgarh', 'Uttar Pradesh', 'Raghuvansham Academy', '2023', 'Cash, Master Card, Visa Card, Debit Cards', '10 AM To 08 PM', 'Mon - Sat', '', 'https://pracharwall.com/', 'Mr. Achhelal ( Principal of this school )', 0, '2023-06-29 07:57:59', 'Mrityunjay Singh', '2023-06-28 18:30:00', '46');

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
(12, '1', 'Admin', '', 'admin@gmail.com', 'admin@123', 1, '', '2023-06-09 07:32:44', '', '2023-06-09 07:32:44', ''),
(64, '2', 'Rani Pal', '7651882341', 'tanumam2000@gmail.com', '12345', 0, '', '2023-06-28 20:37:43', 'Rani Pal', '0000-00-00 00:00:00', ''),
(63, '2', 'Jooly', '9565561904', 'gipljooly@gmail.com', '5566', 0, '', '2023-06-28 20:33:30', 'Jooly', '0000-00-00 00:00:00', ''),
(62, '2', 'Sarita', '9918956769', 'saritabind180@gmail.com', '54321', 0, '', '2023-06-28 20:32:07', 'Sarita', '0000-00-00 00:00:00', ''),
(61, '2', 'Sarita', '9918956769', 'saritagict@gmail.com', '54321', 0, '', '2023-06-28 20:28:21', 'Sarita', '0000-00-00 00:00:00', ''),
(59, '2', 'Radha', '9335605074', 'rupmamaurya@gmail.com', '123456', 1, 'Approved', '2023-06-29 08:11:53', 'Radha', '0000-00-00 00:00:00', ''),
(58, '2', 'Ankita', '92943848', 'tanu@gict.com', '123', 1, 'Approved', '2023-06-29 08:04:55', 'Ankita', '0000-00-00 00:00:00', ''),
(57, '2', 'Pramila Patel', '9372832713', 'komalpatel123@gmail.com', '12345', 1, 'Approved', '2023-06-29 08:01:31', 'Pramila Patel', '0000-00-00 00:00:00', ''),
(56, '2', 'Ankita Tiwari', '9580765083', 'Ankita@gmail.com', '12345', 1, 'Approved', '2023-06-29 08:01:28', 'Ankita Tiwari', '0000-00-00 00:00:00', ''),
(55, '2', 'Rupma', '9335605074', 'saritabindgict@gmail.com', '12345', 1, 'Approved', '2023-06-29 08:01:36', 'Rupma', '0000-00-00 00:00:00', ''),
(54, '2', 'Radha', '9565561904', 'radha2000@gmail.com', '12345', 1, 'Approved', '2023-06-29 08:01:33', 'Radha', '0000-00-00 00:00:00', ''),
(60, '2', 'Jiya Tiwari', '9876546392', 'Jiya@gmail.com', '123', 2, 'Profile is nat valid', '2023-06-29 08:09:13', 'Jiya Tiwari', '0000-00-00 00:00:00', ''),
(52, '2', 'Rupma', '5678453678', 'hoeny@gmail.com', '222244', 1, 'Approved', '2023-06-29 07:45:51', 'Rupma', '0000-00-00 00:00:00', ''),
(51, '2', 'Pramila Patel', '9372832713', 'amarpatel095@gmail.com', '98765', 1, 'Approved', '2023-06-29 07:42:32', 'Pramila Patel', '0000-00-00 00:00:00', ''),
(50, '2', 'Rupma', '5678453678', 'mauryarupma@gmail.com', '1234', 1, 'Approved', '2023-06-29 07:42:29', 'Rupma', '0000-00-00 00:00:00', ''),
(49, '3', 'Sarita Patel', '9795406850', 'saritapatel680@gmail.com', '12345', 0, '', '2023-06-28 19:35:15', 'Sarita Patel', '0000-00-00 00:00:00', ''),
(48, '2', 'Tanu Tiwari', '9580765083', 'tanugict@gmail.com', '12345', 1, 'Approved', '2023-06-29 07:42:40', 'Tanu Tiwari', '0000-00-00 00:00:00', ''),
(47, '2', 'Rani Pal', '7651882341', 'radhapalpal2000@gmail.com', '12345', 1, 'Approved', '2023-06-29 07:42:37', 'Rani Pal', '0000-00-00 00:00:00', ''),
(53, '3', 'Pramila Patel', '9372832713', 'pramilapatel095@gmail.com', '98765', 0, '', '2023-06-28 19:45:43', 'Pramila Patel', '0000-00-00 00:00:00', ''),
(46, '2', 'Mrityunjay Singh', '1234567891', 'ms123@gmail.com', '123', 1, 'Approved', '2023-06-29 07:43:03', 'Mrityunjay Singh', '0000-00-00 00:00:00', '');

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
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_category`
--
ALTER TABLE `business_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer_inquiry`
--
ALTER TABLE `customer_inquiry`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wall_uploads`
--
ALTER TABLE `wall_uploads`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
