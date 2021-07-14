-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 03:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `SNO` int(100) NOT NULL,
  `REFERENCE_ID` varchar(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PHONE_NUMBER` varchar(12) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `TYPE_OF_WORK` int(50) NOT NULL,
  `STARTING_DATE_OF_WORK` date NOT NULL,
  `END_DATE_OF_WORK` date NOT NULL,
  `DOCUMENTS_GIVEN` varchar(100) NOT NULL,
  `ADVANCE_GIVEN` int(25) NOT NULL,
  `TOTAL_AMOUNT_TO_PAY` int(25) NOT NULL,
  `STATUS_OF_WORK` varchar(50) NOT NULL,
  `WORK_IS_TAKEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`SNO`, `REFERENCE_ID`, `NAME`, `PHONE_NUMBER`, `ADDRESS`, `TYPE_OF_WORK`, `STARTING_DATE_OF_WORK`, `END_DATE_OF_WORK`, `DOCUMENTS_GIVEN`, `ADVANCE_GIVEN`, `TOTAL_AMOUNT_TO_PAY`, `STATUS_OF_WORK`, `WORK_IS_TAKEN`) VALUES
(3, '1', 'Parul Parima', '9546404182', 'Deoghar', 0, '2021-07-14', '0000-00-00', 'Map', 2000, 0, '-', '-'),
(4, '2', 'Prashant', '7763******', 'Delhi', 0, '2021-07-23', '0000-00-00', 'Map', 4000, 0, '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Password`) VALUES
('user1', 'user1'),
('user2', 'user2');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `SNO` int(100) NOT NULL,
  `Reference_ID` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Purpose` int(100) NOT NULL,
  `Amount` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`SNO`, `Reference_ID`, `Date`, `Purpose`, `Amount`) VALUES
(1, '1', '2021-07-14', 0, 200);

-- --------------------------------------------------------

--
-- Table structure for table `user1attend`
--

CREATE TABLE `user1attend` (
  `SNO` int(100) NOT NULL,
  `TIME` time(6) NOT NULL,
  `Date` date NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user1attend`
--

INSERT INTO `user1attend` (`SNO`, `TIME`, `Date`, `type`) VALUES
(1, '13:16:34.000000', '2021-07-14', 'IN'),
(2, '13:16:43.000000', '2021-07-14', 'OUT');

-- --------------------------------------------------------

--
-- Table structure for table `user1sal`
--

CREATE TABLE `user1sal` (
  `SNO` int(200) NOT NULL,
  `Transaction_DATE` date NOT NULL,
  `Amount` int(25) NOT NULL,
  `Type` varchar(12) NOT NULL,
  `Current_Balance` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user1sal`
--

INSERT INTO `user1sal` (`SNO`, `Transaction_DATE`, `Amount`, `Type`, `Current_Balance`) VALUES
(1, '2021-07-14', 2000, 'DEBIT', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `user2attend`
--

CREATE TABLE `user2attend` (
  `SNO` int(100) NOT NULL,
  `TIME` time(6) NOT NULL,
  `Date` date NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user2sal`
--

CREATE TABLE `user2sal` (
  `SNO` int(200) NOT NULL,
  `Transaction_DATE` date NOT NULL,
  `Amount` int(25) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Current_Balance` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`SNO`),
  ADD UNIQUE KEY `REFERENCE_ID` (`REFERENCE_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`SNO`),
  ADD UNIQUE KEY `Reference_ID` (`Reference_ID`);

--
-- Indexes for table `user1attend`
--
ALTER TABLE `user1attend`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `user1sal`
--
ALTER TABLE `user1sal`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `user2attend`
--
ALTER TABLE `user2attend`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `user2sal`
--
ALTER TABLE `user2sal`
  ADD PRIMARY KEY (`SNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `SNO` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `SNO` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user1attend`
--
ALTER TABLE `user1attend`
  MODIFY `SNO` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user1sal`
--
ALTER TABLE `user1sal`
  MODIFY `SNO` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user2attend`
--
ALTER TABLE `user2attend`
  MODIFY `SNO` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user2sal`
--
ALTER TABLE `user2sal`
  MODIFY `SNO` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
