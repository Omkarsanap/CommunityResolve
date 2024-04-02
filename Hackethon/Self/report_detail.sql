-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 08:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `report_detail`
--

CREATE TABLE `report_detail` (
  `sno` int(10) NOT NULL,
  `reportdate` date NOT NULL,
  `email` varchar(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phno` int(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `adults` int(10) NOT NULL,
  `children` int(10) NOT NULL,
  `typeOfRoom` varchar(20) NOT NULL,
  `photoInput` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_detail`
--

INSERT INTO `report_detail` (`sno`, `reportdate`, `email`, `fname`, `lname`, `phno`, `address`, `city`, `state`, `zipcode`, `adults`, `children`, `typeOfRoom`, `photoInput`) VALUES
(4, '2024-04-02', 'sanapsagar', 'SAGAR', 'SANAP', 2147483647, 'frt', 'Kalyan', 'Maharashtr', 421301, 2, 0, '0', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report_detail`
--
ALTER TABLE `report_detail`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report_detail`
--
ALTER TABLE `report_detail`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
