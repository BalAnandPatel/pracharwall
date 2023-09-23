-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2023 at 10:42 AM
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
-- Table structure for table `review_reply`
--

CREATE TABLE IF NOT EXISTS `review_reply` (
`id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `business_owner` varchar(255) NOT NULL,
  `user_reply` varchar(255) NOT NULL,
  `created_on` bigint(20) NOT NULL,
  `created_by` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `review_reply`
--

INSERT INTO `review_reply` (`id`, `user_id`, `business_owner`, `user_reply`, `created_on`, `created_by`) VALUES
(12, '128', '128', 'my reply', 1695461655, ''),
(13, '128', '128', 'my reply', 1695461734, '');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
