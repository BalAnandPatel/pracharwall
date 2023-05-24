-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2023 at 07:39 AM
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
-- Table structure for table `register_wall`
--

CREATE TABLE IF NOT EXISTS `register_wall` (
`id` int(255) NOT NULL,
  `serviceName` varchar(100) NOT NULL,
  `serviceType` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL,
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `userPass` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL,
  `createdBy` varchar(255) NOT NULL,
  `updatedOn` timestamp NOT NULL,
  `updatedBy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
`id` int(255) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `userRole` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `userType`, `userRole`, `status`) VALUES
(1, '1', 'Admin', 0),
(2, '2', 'User', 0),
(3, '3', 'Customer', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_wall`
--
ALTER TABLE `register_wall`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_wall`
--
ALTER TABLE `register_wall`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
