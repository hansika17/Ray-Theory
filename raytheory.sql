-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 06:16 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `rt_courses`
--

CREATE TABLE IF NOT EXISTS `rt_courses` (
  `primary_key` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(6) NOT NULL,
  `batch_mode` varchar(50) NOT NULL,
  `new_batch_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rt_enquiry`
--

CREATE TABLE IF NOT EXISTS `rt_enquiry` (
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

CREATE TABLE IF NOT EXISTS `rt_payment` (
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
