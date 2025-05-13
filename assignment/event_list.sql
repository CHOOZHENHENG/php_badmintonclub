-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 07:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_list`
--

CREATE TABLE `event_list` (
  `event_name` varchar(50) NOT NULL,
  `date` varchar(12) NOT NULL,
  `time` varchar(6) NOT NULL,
  `member_price` varchar(6) NOT NULL,
  `non_member_price` varchar(6) NOT NULL,
  `contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_list`
--

INSERT INTO `event_list` (`event_name`, `date`, `time`, `member_price`, `non_member_price`, `contact`) VALUES
('Men\'s Double', '2021-11-21', '09:00', '70.00', '80.00', 'Edward (014-7332 2218)'),
('Men\'s Single', '2021-11-20', '09:00', '30.00', '35.00', 'Bryant (018-278 9567)'),
('Mixes Double', '2021-11-29', '09:00', '70.00', '80.00', 'Eddie (011-3159 5597)'),
('Women Double', '2021-11-28', '09:00', '70.00', '80.00', 'Sam (017-338 2014)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_list`
--
ALTER TABLE `event_list`
  ADD PRIMARY KEY (`event_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
