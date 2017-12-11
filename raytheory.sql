-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 07:13 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raytheory`
--

-- --------------------------------------------------------

--
-- Table structure for table `rt_courecontent`
--

CREATE TABLE `rt_courecontent` (
  `rt_name` varchar(255) NOT NULL,
  `rt_hourstaken` varchar(255) NOT NULL,
  `rt_coursede` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_courecontent`
--

INSERT INTO `rt_courecontent` (`rt_name`, `rt_hourstaken`, `rt_coursede`) VALUES
('sfdgsgsdf', 'sdfgdsfg', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `rt_coursedescription`
--

CREATE TABLE `rt_coursedescription` (
  `primarykey` varchar(255) NOT NULL,
  `rt_conentshortdesc` varchar(255) NOT NULL,
  `rt_contentdesc` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `rt_offlineprice` varchar(255) NOT NULL,
  `rt_onlineprice` varchar(255) NOT NULL,
  `rt_offlinebatchtime` varchar(255) NOT NULL,
  `rt_onlinebatchtime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_coursedescription`
--

INSERT INTO `rt_coursedescription` (`primarykey`, `rt_conentshortdesc`, `rt_contentdesc`, `coursename`, `rt_offlineprice`, `rt_onlineprice`, `rt_offlinebatchtime`, `rt_onlinebatchtime`) VALUES
('adsfasd', '', 'asdfasd', 'secondCourse', '', '', '', ''),
('asdf', 'ssdfgsdfgdsfgsdfgsdfg', 'adsfas', 'firstCourse', 'sdfgsdfgsdfg', 'sdfgsdfgsdfff', 'gsfgsdfgsdfgsdfg', 'sfdgsdfgsdf'),
('asdfas', '', 'sadfsa', 'thirdCourse', '', '', '', ''),
('asdfasf', '', 'asdfasdfsadf', 'fourthCourse', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rt_coursehighlights`
--

CREATE TABLE `rt_coursehighlights` (
  `rt_name` varchar(255) NOT NULL,
  `rt_highdesc` varchar(255) NOT NULL,
  `rt_coursedescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_coursehighlights`
--

INSERT INTO `rt_coursehighlights` (`rt_name`, `rt_highdesc`, `rt_coursedescription`) VALUES
('addgasfgasdf', 'asgasgasfgsa', '	\r\nasdf'),
('asdfs', 'adsfas', 'asdfff'),
('asdfas', 'asdfsafd', 'asdf'),
('asdasdffas', 'asdfsadsfasdfafd', 'asdf'),
('asdassdfgdsdffas', 'asdfsadsfasdfsdfgsdfafd', 'asdf'),
('asdfdsfsd', 'asdfsadfas', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `rt_enquiry`
--

CREATE TABLE `rt_enquiry` (
  `id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `enquiry_msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rt_payment`
--

CREATE TABLE `rt_payment` (
  `id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `merchant_id` varchar(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `pay_time` datetime NOT NULL,
  `customer_ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rt_coursedescription`
--
ALTER TABLE `rt_coursedescription`
  ADD PRIMARY KEY (`primarykey`);

--
-- Indexes for table `rt_enquiry`
--
ALTER TABLE `rt_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rt_payment`
--
ALTER TABLE `rt_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `name_2` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rt_enquiry`
--
ALTER TABLE `rt_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rt_payment`
--
ALTER TABLE `rt_payment`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
