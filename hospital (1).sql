-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 07:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctb`
--

CREATE TABLE `doctb` (
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctb`
--

INSERT INTO `doctb` (`name`) VALUES
('Dr. Puneet Sharma'),
('Dr. Ashok Shetty'),
('Dr. Shaminder Mahajan'),
('Dr. Rajiv Malhotra'),
('Dr. Sandeep Ohri'),
('Dr. Prashant Singh'),
('Dr. Shashi Arora');

-- --------------------------------------------------------

--
-- Table structure for table `doctorapp`
--

CREATE TABLE `doctorapp` (
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `docapp` varchar(60) NOT NULL,
  `payment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorapp`
--

INSERT INTO `doctorapp` (`fname`, `lname`, `email`, `contact`, `docapp`, `payment`) VALUES
('Rajiv', 'Khanna', 'khanna.rajiv99@gmail.com', '8264136526', 'Dr Sharma From 6pm to 8pm', 'Pay later'),
('Anita', 'Thakur', 'thakur.anita72@gmail.com', '9417014071', 'Dr Shetty From 4pm to 6pm', 'Paid'),
('Aman', 'Chopra', 'aman.chopra645@gmail.com', '8968264675', 'Dr Shetty From 4pm to 6pm', 'Pay later'),
('Karan', 'Mahajan', 'karan6966@gmail.com', '9517171817', 'Dr Sharma From 6pm to 8pm', 'Pay later'),
('Kartikey', 'Batra', 'batra.kartikey69@gmail.com', '8146522193', 'Dr Mahajan From 4pm to 6pm', 'Pay Later'),
('Rahul', 'Kumar', 'kumar.rahul445@gmail.com', '7009128902', 'Dr Mahajan From 4pm to 6pm', 'Pay Later'),
('Banita', 'Rani', 'banita.rani121@gmail.com', '9569825414', 'Dr Sharma From 6pm to 8pm', 'Paid'),
('Anchal', 'Rai', 'rai.anchal55@gmail.com', '9780183409', 'Dr. Rajiv Malhotra From 4pm to 6pm', 'Paid'),
('Smeeksha', 'Sharma', 'er.sharma2k14@gmail.com', '9780803604', 'Dr. Rajiv Malhotra From 12pm to 2pm', 'pay later');

-- --------------------------------------------------------

--
-- Table structure for table `hos_reg`
--

CREATE TABLE `hos_reg` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hos_reg`
--

INSERT INTO `hos_reg` (`email`, `password`, `number`) VALUES
('er.sharma2k14@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 8264136526),
('batra.kartikey69@gmail.com', '1ae7ae8d6ff012ca5ab4a5017601f645', 9780902905),
('harnoor.sandhu44@gmail.com', '543eccff875a16060d72d5cb4ddbbb6e', 9517171817);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'pass');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
