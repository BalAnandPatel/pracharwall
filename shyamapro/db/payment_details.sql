-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2023 at 02:19 PM
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
('STanV_5817364117', '112962580175', '321617557604', 'Success', '', 'Unified Payments', 'UPI', '', '347987', 'ms@gmail.com', 'N', 'null', 'null', '', '1.00', '', 'N', '', '', '04/08/2023 16:27:35'),
('OyBPL_2663743284', '112969817275', '322339126825', 'Success', '', 'Unified Payments', 'UPI', '', '9876543210', 'email@gmail.com', 'N', 'null', 'null', '', '1.00', '', 'N', '', '', '11/08/2023 16:14:59'),
('X25UH_5069363130', '112974731871', 'IGAQAWQNL7', 'Success', '', 'Net Banking', 'State Bank of India', 'null', '9984087027', 'giplanand@gmail.com', 'N', 'null', 'null', '', '500.00', 'null', 'N', '0', '', '16/08/2023 17:31:20'),
('n9Lw1_2719235925', '112977942920', '323160962458', 'Success', '', 'Unified Payments', 'UPI', '', '1234567891', 'smrityunjay570@gmail.com', 'N', 'null', 'null', '', '2.00', '', 'N', '', '', '19/08/2023 16:56:21'),
('N1rV7_3412883277', '112984519050', 'null', 'Aborted', '', 'Unified Payments', 'UPI', '', '9517433825', 'shubhamsibbu951743@gmail.com', 'N', 'null', 'null', '', '400.00', '', 'N', '', '', '26/08/2023 12:44:48'),
('0oTgC_3412883277', '112984556008', '323879064920', 'Success', '', 'Unified Payments', 'UPI', '', '9517433825', 'shubhamsibbu951743@gmail.com', 'N', 'null', 'null', '', '400.00', '', 'N', '', '', '26/08/2023 13:14:06'),
('p65cw_2351288963', '112984932218', '323880157096', 'Success', '', 'Unified Payments', 'UPI', '', '8115361288', 'shubhamyadavsubi@gmail.com', 'N', 'null', 'null', '', '400.00', '', 'N', '', '', '26/08/2023 19:51:00'),
('Jkxen_4884358460', '112984957565', '323880262061', 'Success', '', 'Unified Payments', 'UPI', '', '7706881516', 'ajitkumar770688@gmail.com', 'N', 'null', 'null', '', '400.00', '', 'N', '', '', '26/08/2023 20:24:41'),
('pU39M_5364326904', '112985267545', 'null', 'Aborted', '', 'Unified Payments', 'UPI', '', '9125766952', 'kumar795552@gmail.com', 'N', 'null', 'null', '', '400.00', '', 'N', '', '', '27/08/2023 11:58:15'),
('kc4fC_5364326904', '112985276123', 'null', 'Aborted', '', 'Unified Payments', 'UPI', '', '09125766952', 'kumar795552@gmail.com', 'N', 'null', 'null', '', '400.00', '', 'N', '', '', '27/08/2023 12:00:33'),
('SP786_5364326904', '112985279433', 'null', 'Aborted', '', 'Unified Payments', 'UPI', '', '09125766952', 'kumar795552@gmail.com', 'N', 'null', 'null', '', '400.00', '', 'N', '', '', '27/08/2023 12:03:42'),
('eEQ8W_5364326904', '112985281162', '323981466571', 'Success', '', 'Unified Payments', 'UPI', '', '9125766952', 'kumar795552@gmail.com', 'N', 'null', 'null', '', '400.00', '', 'N', '', '', '27/08/2023 12:07:13'),
('jdCvU_8539613965', '112986967761', '324186926186', 'Success', '', 'Unified Payments', 'UPI', '', '09125766952', 'kumar795552@gmail.com', 'N', 'null', 'null', '', '300.00', '', 'N', '', '', '29/08/2023 12:10:55'),
('oOXHt_8122039186', '112987078098', '324138638031', 'Success', '', 'Unified Payments', 'UPI', '', '7017615956', 'akashsagar188@gmail.com', 'N', 'null', 'null', '', '400.00', '', 'N', '', '', '29/08/2023 13:34:00'),
('QSwVu_3065787353', '112987096445', '*', 'Failure', '', 'Debit Card', 'Visa Debit Card', 'null', '9696240095', 'amritanshuverma37@gmail.com', 'N', 'null', 'null', '', '400.00', 'null', 'N', '0', '', '29/08/2023 13:50:56'),
('lAOwh_3065787353', '112987105333', '324187283458', 'Success', '', 'Unified Payments', 'UPI', '', '9696240095', 'amritanshuverma37@gmail.com', 'N', 'null', 'null', '', '400.00', '', 'N', '', '', '29/08/2023 13:57:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`tracking_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
