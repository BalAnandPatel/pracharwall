-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2023 at 12:33 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pracharwall`
--

-- --------------------------------------------------------

--
-- Table structure for table `review_reply`
--

CREATE TABLE `review_reply` (
  `id` int(11) NOT NULL,
  `review_id` varchar(100) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `business_owner` varchar(255) NOT NULL,
  `user_reply` varchar(255) NOT NULL,
  `created_on` bigint(20) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_reply`
--

INSERT INTO `review_reply` (`id`, `review_id`, `user_id`, `business_owner`, `user_reply`, `created_on`, `created_by`) VALUES
(18, '22', '129', '129', 'yasyash', 1695471138, '129');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review_reply`
--
ALTER TABLE `review_reply`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review_reply`
--
ALTER TABLE `review_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
