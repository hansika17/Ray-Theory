-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 06:47 AM
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
-- Table structure for table `rt_coursedescription`
--

CREATE TABLE `rt_coursedescription` (
  `primarykey` varchar(255) NOT NULL,
  `rt_contentdesc` varchar(255) NOT NULL,
  `rt_price` varchar(255) NOT NULL,
  `rt_batchmode` varchar(255) NOT NULL,
  `rt_newbatchtime` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_coursedescription`
--

INSERT INTO `rt_coursedescription` (`primarykey`, `rt_contentdesc`, `rt_price`, `rt_batchmode`, `rt_newbatchtime`, `coursename`) VALUES
('adsfasd', 'asdfasd', 'adsfasd', 'adsfasdf', 'asdfasd', 'secondCourse'),
('asdf', 'adsfas', 'asdfasdf', 'asdfasdf', 'asdfas', 'firstCourse'),
('asdfas', 'sadfsa', 'asdfasdf', 'adsfasdf', 'asdffasdf', 'thirdCourse'),
('asdfasf', 'asdfasdfsadf', 'asdfasdfsadf', 'adsfasdfasdf', 'adsfsadfasdf', 'fourthCourse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rt_coursedescription`
--
ALTER TABLE `rt_coursedescription`
  ADD PRIMARY KEY (`primarykey`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
