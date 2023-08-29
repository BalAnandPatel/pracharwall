-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2023 at 03:54 PM
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
-- Database: `glintqnj_krishilimited`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(100) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `createdOn` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `fullName`, `userName`, `password`, `createdOn`, `createdBy`, `updatedOn`, `updatedBy`) VALUES
(1, 'mrityunjay singh', 'Glintel@gmail.com', '12345', '2023-06-05 06:17:28.094642', '0', '0000-00-00 00:00:00.000000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(155) NOT NULL,
  `exam_name` varchar(200) DEFAULT NULL,
  `type` varchar(155) DEFAULT NULL,
  `amount` double(255,2) DEFAULT NULL,
  `total_post` varchar(100) NOT NULL,
  `eligibility` varchar(255) NOT NULL,
  `age` varchar(255) DEFAULT NULL,
  `status` varchar(155) DEFAULT NULL,
  `exam_date_start` varchar(255) DEFAULT NULL,
  `exam_date_end` varchar(255) NOT NULL,
  `result_date` varchar(255) DEFAULT NULL,
  `admit_card_date` varchar(255) DEFAULT NULL,
  `created_by` varchar(155) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `exam_name`, `type`, `amount`, `total_post`, `eligibility`, `age`, `status`, `exam_date_start`, `exam_date_end`, `result_date`, `admit_card_date`, `created_by`, `created_on`, `updated_on`, `updated_by`) VALUES
(42, 'DEMO2', 'GLINTEL', 2.00, '20', 'Graducation', '25', '1', '18-08-2023', '21-12-2023', '31-12-2023', '30-12-2023', 'Admin', '2023-08-03 05:43:15', '0000-00-00 00:00:00', ''),
(41, 'TEST', 'MCQS', 5.00, '500', 'Graduation', '20-25', '1', '02-08-2023', '03-08-2023', '25-08-2023', '16-01-0200', 'Admin', '2023-08-02 06:46:51', '0000-00-00 00:00:00', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `farmerregistration`
--

CREATE TABLE `farmerregistration` (
  `id` int(255) NOT NULL,
  `farmerName` varchar(100) NOT NULL,
  `farmerMobile` varchar(12) NOT NULL,
  `farmerDistrict` varchar(200) NOT NULL,
  `farmerMsg` varchar(2000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmerregistration`
--

INSERT INTO `farmerregistration` (`id`, `farmerName`, `farmerMobile`, `farmerDistrict`, `farmerMsg`, `status`, `createdOn`, `createdBy`) VALUES
(7, 'Harendra Singh', '8009678491, ', 'Lucknow', '??????? ?????,\r\n???? ???? ?? ???? ????? ??? ???????? ???? ??? ??? ?? ??? ???? ???????? ?? ??? ???? ??? ?????? ?? ???? ????? ????\r\n?? ?? ??????? ??? ????, ???? ????? ?? ???? ????? ?????? ??? ??????\r\n???????', 0, '2023-06-14 05:37:58', 'Harendra Singh'),
(6, 'HARENDRA SINGH', '8009678491, ', 'LUCKNOW', 'Hello sir, my agriculture land in RAE BARELI and ballia', 0, '2023-06-11 05:05:10', 'HARENDRA SINGH'),
(8, 'HARENDRA SINGH', '8009678491 ,', 'LUCKNOW', 'Sir, I have agriculture Land in Two District (Rea Bareli and Ballia). ', 0, '2023-06-28 04:22:18', 'HARENDRA SINGH'),
(9, 'Vijay Narayan Srivastava', '9452951856', 'Azamgarh', 'My Land rent  required. please contact me', 0, '2023-07-04 04:08:05', 'Vijay Narayan Srivastava');

-- --------------------------------------------------------

--
-- Table structure for table `imagegallery`
--

CREATE TABLE `imagegallery` (
  `id` int(255) NOT NULL,
  `galleryTitle` varchar(255) NOT NULL,
  `galleryDescription` varchar(1000) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagegallery`
--

INSERT INTO `imagegallery` (`id`, `galleryTitle`, `galleryDescription`, `created_on`, `created_by`) VALUES
(28, 'Goat Farming With Farmer', 'Goat farming Farmer Goat Herding in Ground.', '2023-06-23 06:13:36', 'Admin'),
(29, 'Duck Farming', 'Duck is Collecting Food from Ground and Pound.', '2023-06-23 06:17:27', 'Admin'),
(30, 'Sonali Murgi farming', 'Sonali Murgi Farming. Farmer is collecting feed for Hens.', '2023-06-23 06:24:13', 'Admin'),
(31, 'Flower farming', 'Farmer picking flowers.', '2023-06-23 10:40:47', 'Admin'),
(32, 'Fish seed packing', 'Farmer packing the baby fish.', '2023-06-23 10:45:20', 'Admin'),
(33, 'Applicable industry', 'Company\'s trainer giving training of applicable industry to housewife', '2023-06-23 11:10:44', 'Admin'),
(34, 'Tailoring training', 'Company\'s trainer giving tailoring training to housewife', '2023-06-23 11:11:26', 'Admin'),
(46, 'Sample of Two year Fish', 'Sample of Two year Fish', '2023-06-30 09:28:13', 'Admin'),
(36, 'The office was inaugurated in Lucknow', 'The office was inaugurated in Lucknow, the capital of the state, from where the whole of Uttar Pradesh would be monitored.', '2023-06-23 11:19:01', 'Admin'),
(37, 'Transporting eggs.', 'Transporting eggs from company', '2023-06-23 11:24:05', 'Admin'),
(45, 'Making organic fish feed', 'Making organic fish feed for the Better Growth', '2023-06-28 11:56:40', 'Admin'),
(39, 'Catching Fish in Pound', 'Catching Fish in Found by Fisher Farmer', '2023-06-28 09:50:31', 'Admin'),
(40, 'Sample of Fish of 5 to 6 Month', '5 to 6 Moth Size Fish', '2023-06-28 09:51:56', 'Admin'),
(41, 'Fish loading For Fish Market', 'Ready to Sale in Market', '2023-06-28 09:53:22', 'Admin'),
(42, 'Nature of Pound', 'Pound Cleaning Activity By Farmer', '2023-06-28 09:54:25', 'Admin'),
(43, 'Fish Catching Team', 'Fish Catching team is Ready to Move in Pound with Boat', '2023-06-28 09:55:39', 'Admin'),
(44, 'Biggest Pound in Jaunpur', 'The Biggest Pound in Jaunpur Distric Uttar Pradesh', '2023-06-28 10:43:24', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `news_gallery`
--

CREATE TABLE `news_gallery` (
  `id` int(255) NOT NULL,
  `newsTitle` varchar(255) NOT NULL,
  `newsDescription` varchar(2000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(255) NOT NULL,
  `n_title` varchar(200) NOT NULL,
  `n_description` varchar(200) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `n_title`, `n_description`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(6, 'Shyamavsvsvss Start the Direct Requitment for new startup orgnization', '', '2023-08-03 06:09:05', 'Admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `user_id` varchar(155) DEFAULT NULL,
  `amount` double(255,2) DEFAULT NULL,
  `transaction_id` varchar(155) DEFAULT NULL,
  `status` varchar(155) DEFAULT NULL,
  `request_id` varchar(155) DEFAULT NULL,
  `created_by` varchar(155) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `order_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tracking_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `bank_ref_no` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_status` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `failure_message` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_tel` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_email` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vault` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer_type` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer_code` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount_value` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eci_value` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `retry` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `response_code` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_notes` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trans_date` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`order_id`, `tracking_id`, `bank_ref_no`, `order_status`, `failure_message`, `payment_mode`, `card_name`, `status_code`, `billing_tel`, `billing_email`, `vault`, `offer_type`, `offer_code`, `discount_value`, `amount`, `eci_value`, `retry`, `response_code`, `billing_notes`, `trans_date`) VALUES
('x0Zrw_8101875477', '112960119872', 'R81132', 'Success', '', 'Credit Card', 'RuPay', 'null', '1122334455', 'ms@gmail.com', 'N', 'null', 'null', '', '1.00', 'null', 'N', '0', '', '02/08/2023 12:50:41'),
('LRUwn_1922881423', '112960129386', '321410256408', 'Failure', '', 'Unified Payments', 'UPI', '', '9984087027', 'giplanand@gmail.com', 'N', 'null', 'null', '', '1.00', '', 'N', '', '', '02/08/2023 13:03:12'),
('L613U_1922881423', '112960143898', '321410289469', 'Success', '', 'Unified Payments', 'UPI', '', '9984087027', 'giplanand@gmail.com', 'N', 'null', 'null', '', '1.00', '', 'N', '', '', '02/08/2023 13:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `full_name` varchar(155) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(155) DEFAULT NULL,
  `marital_status` varchar(155) DEFAULT NULL,
  `father_name` varchar(155) DEFAULT NULL,
  `mother_name` varchar(155) DEFAULT NULL,
  `status` varchar(155) DEFAULT NULL,
  `password` varchar(155) DEFAULT NULL,
  `result` varchar(155) DEFAULT NULL,
  `admit_card` varchar(155) DEFAULT NULL,
  `spouse_name` varchar(155) DEFAULT NULL,
  `cor_address` text,
  `address1` text,
  `address2` text,
  `address3` text,
  `district` text,
  `state` text,
  `pincode` text,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `h_qualification` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `passing_date` timestamp NULL DEFAULT NULL,
  `h_percentage` double(255,2) DEFAULT NULL,
  `grade` varchar(155) DEFAULT NULL,
  `languages` varchar(155) DEFAULT NULL,
  `is_read` varchar(155) DEFAULT NULL,
  `is_write` varchar(155) DEFAULT NULL,
  `is_speak` varchar(155) DEFAULT NULL,
  `alternate_mobile` varchar(155) DEFAULT NULL,
  `zone` varchar(155) DEFAULT NULL,
  `post` varchar(155) DEFAULT NULL,
  `postcode` varchar(155) DEFAULT NULL,
  `disability_cat` varchar(155) DEFAULT NULL,
  `disability_type` varchar(155) DEFAULT NULL,
  `ex_serviceman` varchar(155) DEFAULT NULL,
  `exam_name` varchar(200) DEFAULT NULL,
  `serving_defence_per` varchar(155) DEFAULT NULL,
  `service_period` varchar(155) DEFAULT NULL,
  `religion` varchar(155) DEFAULT NULL,
  `nationality` varchar(155) DEFAULT NULL,
  `category` varchar(155) DEFAULT NULL,
  `state_exam1` varchar(155) DEFAULT NULL,
  `center_exam1` varchar(155) DEFAULT NULL,
  `state_exam2` varchar(155) DEFAULT NULL,
  `center_exam2` varchar(155) DEFAULT NULL,
  `registration_no` varchar(155) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `payment_id` varchar(600) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `created_by` varchar(155) DEFAULT NULL,
  `updated_by` varchar(155) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `full_name`, `dob`, `gender`, `marital_status`, `father_name`, `mother_name`, `status`, `password`, `result`, `admit_card`, `spouse_name`, `cor_address`, `address1`, `address2`, `address3`, `district`, `state`, `pincode`, `mobile`, `email`, `h_qualification`, `subject`, `passing_date`, `h_percentage`, `grade`, `languages`, `is_read`, `is_write`, `is_speak`, `alternate_mobile`, `zone`, `post`, `postcode`, `disability_cat`, `disability_type`, `ex_serviceman`, `exam_name`, `serving_defence_per`, `service_period`, `religion`, `nationality`, `category`, `state_exam1`, `center_exam1`, `state_exam2`, `center_exam2`, `registration_no`, `payment_status`, `payment_id`, `created_on`, `created_by`, `updated_by`, `updated_on`) VALUES
(86, 'MRITYUNJAY SINGH', '01/01/2000', 'MALE', 'Unmarried', 'F NAME', 'M NAME', '0', '01012000', '0', '0', 'NA', 'C ADD', 'ADD 1', 'ADD 2', 'ADD 3', 'DIS', 'STATE', '230306', '1122334455', 'ms@gmail.com', 'UNDER GRADUATION', 'SUB', '2014-12-31 18:30:00', 80.00, 'First', 'HINDI', 'Yes', 'Yes', 'Yes', '1646464611', NULL, NULL, NULL, 'dt', 'dt', 'No', 'TEST', 'No', '1', 'REL', 'NAT', 'CAT', NULL, NULL, NULL, NULL, '8101875477', 'Success', 'x0Zrw_8101875477', '2023-08-02 07:19:04', 'USER', NULL, NULL),
(87, 'DFG', '01/01/1970', 'MALE', 'Married', 'DSGFDSFG', 'DSGDSG', '0', '01011970', '0', '0', 'DDFSFDSG', 'ANANDJ', 'PATEL', 'XCFD', 'SDFS', 'JAUNPUR', 'UTTAR PRADESH', '222202', '9984087027', 'giplanand@gmail.com', 'UNDER GRADUATION', 'HINDI', '2020-08-13 18:30:00', 50.00, 'First', 'HINDI', 'Yes', 'Yes', 'Yes', '9984087027', NULL, NULL, NULL, 'cf', 'sdf', 'No', 'TEST', 'No', '10', 'HINDI', 'INDIA', 'OBC', NULL, NULL, NULL, NULL, '1922881423', 'Success', 'L613U_1922881423', '2023-08-02 07:25:48', 'USER', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videogallery`
--

CREATE TABLE `videogallery` (
  `id` int(255) NOT NULL,
  `videoTitle` varchar(255) NOT NULL,
  `videoDescription` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videogallery`
--

INSERT INTO `videogallery` (`id`, `videoTitle`, `videoDescription`, `status`, `created_on`, `created_by`) VALUES
(8, 'Duck Farming', 'Ducks are collecting food behind the pound.', 0, '2023-06-24 11:14:37', 'Admin'),
(9, 'Fish transferring', 'Fish Transferring from one Pound to other Pound', 0, '2023-06-28 10:10:21', 'Admin'),
(10, 'Creating New Pound', 'Creating New Pound For Fish Clutre', 0, '2023-06-28 10:32:33', 'Admin'),
(11, 'Small Fish', 'Small Fish Ready For Sale ', 0, '2023-06-28 10:40:48', 'Admin'),
(14, 'Team of doctors giving injection to fish', 'Team of doctors giving injection to fish\r\n', 0, '2023-07-11 13:43:12', 'Admin'),
(13, 'Making organic fish feed', 'Making organic fish feed for the Better Growth', 0, '2023-06-28 11:59:05', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_name` (`exam_name`),
  ADD UNIQUE KEY `exam_name_2` (`exam_name`);

--
-- Indexes for table `farmerregistration`
--
ALTER TABLE `farmerregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagegallery`
--
ALTER TABLE `imagegallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_gallery`
--
ALTER TABLE `news_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`tracking_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videogallery`
--
ALTER TABLE `videogallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `farmerregistration`
--
ALTER TABLE `farmerregistration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `imagegallery`
--
ALTER TABLE `imagegallery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `news_gallery`
--
ALTER TABLE `news_gallery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `videogallery`
--
ALTER TABLE `videogallery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
