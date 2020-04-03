-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 11:56 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `cName` varchar(100) NOT NULL,
  `cMNumber` int(10) NOT NULL,
  `cLNumber` int(10) DEFAULT NULL,
  `cEmail` varchar(150) DEFAULT NULL,
  `cAddress` varchar(250) NOT NULL,
  `cCity` varchar(50) NOT NULL,
  `cDistrict` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `cName`, `cMNumber`, `cLNumber`, `cEmail`, `cAddress`, `cCity`, `cDistrict`) VALUES
(4, 'supun', 123456789, 2147483647, '', '5558999', 'mathara', 'Matara'),
(6, 'test', 256333555, 115618177, 'test@gmail.com', 'asaaaaaaaaaaaaaa', 'homagama', 'Colombo'),
(11, 'isurubu', 1222333665, 0, '', '408/5', 'awissawella', 'Colombo');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `iName` varchar(50) NOT NULL,
  `5KGQuantity` int(11) NOT NULL,
  `5KGPrice` double NOT NULL,
  `10KGQuantity` int(11) NOT NULL,
  `10KGPrice` double NOT NULL,
  `25KGQuantity` int(11) NOT NULL,
  `25KGPrice` double NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(11) NOT NULL,
  `vName` varchar(100) NOT NULL,
  `vMNumber` int(10) NOT NULL,
  `vLNumber` int(10) DEFAULT NULL,
  `vEmail` varchar(150) DEFAULT NULL,
  `vAddress` varchar(250) NOT NULL,
  `vCity` varchar(50) NOT NULL,
  `vDistrict` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `vName`, `vMNumber`, `vLNumber`, `vEmail`, `vAddress`, `vCity`, `vDistrict`) VALUES
(19, 'test', 2147483647, 0, '', '408/5', 'rathnapura', 'Colombo'),
(20, 'nethsara', 2147483647, 0, '', 'asas', 'rathnapura', 'Colombo'),
(22, 'hhhhhsa', 2147483647, 0, '', '408/5', 'rathnapura', 'Colombo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
