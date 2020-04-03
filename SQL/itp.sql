-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 05:43 AM
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
-- Database: `itp`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyinginvoice`
--

CREATE TABLE `buyinginvoice` (
  `border_id` int(11) NOT NULL,
  `b_order_no` varchar(50) NOT NULL,
  `b_order_date` date NOT NULL,
  `vName` varchar(100) NOT NULL,
  `vAddress` varchar(250) NOT NULL,
  `t_discount` decimal(10,2) NOT NULL,
  `t_price` decimal(10,2) NOT NULL,
  `pay_method` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyinginvoice`
--

INSERT INTO `buyinginvoice` (`border_id`, `b_order_no`, `b_order_date`, `vName`, `vAddress`, `t_discount`, `t_price`, `pay_method`, `datetime`) VALUES
(1, 'b001', '2019-12-30', 'abc', 'gghhhvfddddff', '250.00', '500.00', 'cash', '2019-12-30 00:00:00'),
(2, 'b002', '2019-12-31', 'hhbb', 'kkjkkkkkkjjhhggkkkk', '25.00', '250.00', 'cheque', '2019-12-31 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `buyingitem`
--

CREATE TABLE `buyingitem` (
  `b_item_id` int(11) NOT NULL,
  `border_id` int(11) NOT NULL,
  `iName` varchar(50) NOT NULL,
  `iquantity` int(11) NOT NULL,
  `iprice` decimal(10,0) NOT NULL,
  `iactual_amount` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `humidity` varchar(10) NOT NULL,
  `final_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `cName` varchar(100) NOT NULL,
  `cMNumber` varchar(10) NOT NULL,
  `cLNumber` varchar(10) DEFAULT NULL,
  `cEmail` varchar(150) DEFAULT NULL,
  `cAddress` varchar(250) NOT NULL,
  `cCity` varchar(50) NOT NULL,
  `cDistrict` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `cName`, `cMNumber`, `cLNumber`, `cEmail`, `cAddress`, `cCity`, `cDistrict`) VALUES
(3, 'dadadadad', '0215115631', '', '', 'adaddadnna;cnmac\\\\\\\';jio', 'Kandy', 'Kandy'),
(4, 'test', '0201010110', '', '', 'sdnfalncljkajkl/cnka/lclkan/lkcnac', 'Kandy', 'Kandy');

-- --------------------------------------------------------

--
-- Table structure for table `empleave`
--

CREATE TABLE `empleave` (
  `LeaveID` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `Lid` int(11) NOT NULL,
  `DaysTaken` varchar(50) NOT NULL DEFAULT '0',
  `days` varchar(200) NOT NULL,
  `Reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleave`
--

INSERT INTO `empleave` (`LeaveID`, `empid`, `Lid`, `DaysTaken`, `days`, `Reason`) VALUES
(2, 15, 9, '7', '01/01/2020', ''),
(3, 16, 10, '2', '01/07/2020,01/08/2020', ''),
(4, 17, 9, '1', '01/08/2020', ''),
(5, 16, 11, '1', '01/08/2020', ''),
(6, 15, 8, '5', '01/01/2020,01/02/2020,01/03/2020,01/04/2020,01/05/2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nicnum` varchar(12) NOT NULL,
  `mnumber` varchar(10) NOT NULL,
  `empaddress` varchar(250) NOT NULL,
  `jondate` varchar(50) NOT NULL,
  `emptype` varchar(15) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `DrivingLicenNum` varchar(50) NOT NULL,
  `Imglocation` varchar(200) NOT NULL,
  `Imgstatus` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `empid`, `fullname`, `name`, `dob`, `gender`, `nicnum`, `mnumber`, `empaddress`, `jondate`, `emptype`, `designation`, `DrivingLicenNum`, `Imglocation`, `Imgstatus`) VALUES
(15, 'EMP1', 'test', 'dsdsdsdds', '07/17/1997', 'Male', '46545616', '0779023434', 'ddlldmskdsk', '01/10/2020', 'Permanent', 'Driver', '12345695g', '../Uploads/profileEMP1.jpg', '1'),
(16, 'EMP2', 'test123', 'dsdsdsdds', '07/17/1997', 'Female', '46545616', '0779023434', 'ddlldmskdsk', '01/10/2020', 'Contract', 'Worker', '', '', '0'),
(17, 'EMP3', 'test3', 'dsdsdsdds', '07/17/1997', 'Male', '46545616', '0779023434', 'ddlldmskdsk', '01/10/2020', 'Permanent', 'Supervisor', '', '../Uploads/profileEMP3.jpg', '0'),
(18, 'EMP4', 'rusiru', 'alvin', '02/12/1997', 'Male', '6464161466a', '0779023434', 'ddlldmskdsk', '01/01/2020', 'Permanent', 'Vehicle Mechanic', '', '../Uploads/profileEMP4.jpg', '1'),
(19, 'EMP5', 'sasas', 'isuru', '03/18/1992', 'Male', '4646464646', '0123456789', 'dsdcdscs6csdcsdscdscsc', '01/02/2020', 'Contract', 'Driver', '45454545', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `EXPID` int(11) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `ExpGID` int(11) NOT NULL,
  `ExpTID` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `PMethod` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`EXPID`, `Date`, `ExpGID`, `ExpTID`, `Amount`, `PMethod`) VALUES
(3, '01/02/2020', 2, 1, '250.00', 'Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `expensegroup`
--

CREATE TABLE `expensegroup` (
  `ExpGID` int(11) NOT NULL,
  `ExpGName` varchar(50) NOT NULL,
  `Descrip` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensegroup`
--

INSERT INTO `expensegroup` (`ExpGID`, `ExpGName`, `Descrip`) VALUES
(1, 'Salaries and wages', 'Include Expenses Such as Employees Salaries Wages '),
(2, 'Utility', 'Include Expenses Such as Water Bill, Electricity Bill'),
(3, 'Cost of goods sold', 'Include Expenses Such as Marketing, advertising, and promotion'),
(4, 'Administration expenses', 'Include Expenses Such as Building rent,Insurance,Office supplies'),
(5, 'Finance costs', 'Interest and other costs that an entity incurs in connection with the borrowing of funds'),
(6, 'Depreciation', 'A Reduction in the value of an asset over time');

-- --------------------------------------------------------

--
-- Table structure for table `expensetype`
--

CREATE TABLE `expensetype` (
  `ExpTID` int(11) NOT NULL,
  `ExpGID` int(11) NOT NULL,
  `ExpTName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensetype`
--

INSERT INTO `expensetype` (`ExpTID`, `ExpGID`, `ExpTName`) VALUES
(1, 2, 'Electricity Bills'),
(2, 1, 'salary');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `iName` varchar(50) NOT NULL,
  `5KGQuantity` int(11) NOT NULL,
  `5KGPrice` decimal(10,2) NOT NULL,
  `10KGQuantity` int(11) NOT NULL,
  `10KGPrice` decimal(10,2) NOT NULL,
  `25KGQuantity` int(11) NOT NULL,
  `25KGPrice` decimal(10,2) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `iName`, `5KGQuantity`, `5KGPrice`, `10KGQuantity`, `10KGPrice`, `25KGQuantity`, `25KGPrice`, `description`) VALUES
(1, 'keeri', 253, '25.00', 445, '58.00', 0, '0.00', ''),
(2, 'nadu', 256, '23.00', 3332, '20.00', 0, '0.00', ''),
(3, 'samba', 0, '0.00', 563, '45.00', 533, '65.00', ''),
(4, 'rathu kakulu', 133, '133.00', 133, '25.00', 446, '23.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE `leavetype` (
  `Lid` int(11) NOT NULL,
  `LeaveName` varchar(150) NOT NULL,
  `EmpType` varchar(20) NOT NULL,
  `NoofDays` varchar(10) NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`Lid`, `LeaveName`, `EmpType`, `NoofDays`, `Description`) VALUES
(8, 'Annual Leave', 'Permanent', '14', ''),
(9, 'Casual Leave', 'Permanent', '7', ''),
(10, 'Medical', 'Permanent', '7', ''),
(11, 'cas', 'Contract', '5', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderm`
--

CREATE TABLE `orderm` (
  `OrderM_ID` int(11) NOT NULL,
  `Order_ID` varchar(50) NOT NULL,
  `customerID` int(11) NOT NULL,
  `Order_Date` varchar(50) NOT NULL,
  `Order_D_Date` varchar(50) NOT NULL,
  `D_Status` varchar(10) NOT NULL,
  `t_status` varchar(2) NOT NULL DEFAULT '0',
  `t_d_status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderm`
--

INSERT INTO `orderm` (`OrderM_ID`, `Order_ID`, `customerID`, `Order_Date`, `Order_D_Date`, `D_Status`, `t_status`, `t_d_status`) VALUES
(7, 'ODR1', 3, '02/04/2020', '04/04/2020', 'Yes', '1', 1),
(8, 'ODR2', 4, '02/04/2020', '21/04/2020', 'Yes', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `riceorder`
--

CREATE TABLE `riceorder` (
  `OID` int(11) NOT NULL,
  `Order_ID` varchar(50) NOT NULL,
  `itemID` int(11) NOT NULL,
  `5KGQuantity` int(11) NOT NULL,
  `10KGQuantity` int(11) NOT NULL,
  `25KGQuantity` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `DiliveryCost` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `t_Id` int(11) NOT NULL,
  `OrderM_ID` int(11) NOT NULL,
  `vtypeID` int(11) NOT NULL,
  `vehID` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `dil_Date` varchar(50) NOT NULL,
  `t_status` varchar(2) NOT NULL DEFAULT '0',
  `t_d_status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`t_Id`, `OrderM_ID`, `vtypeID`, `vehID`, `id`, `dil_Date`, `t_status`, `t_d_status`) VALUES
(6, 7, 3, 2, 15, '02/04/2020', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `uname`, `email`, `password`) VALUES
(1, 'test', 'test@gmail.com', '$2y$10$Vw9bne/h1z3Goxk/lh6/ounXE0JPwtE6Cfaibq4e/D/kbi.zd7j6y');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VehicleID` int(11) NOT NULL,
  `VRegistrationNo` varchar(60) NOT NULL,
  `ModelNo` varchar(150) NOT NULL,
  `ChassisNo` varchar(150) NOT NULL,
  `EngineNo` varchar(150) NOT NULL,
  `V_typeId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `VOwner` varchar(20) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VehicleID`, `VRegistrationNo`, `ModelNo`, `ChassisNo`, `EngineNo`, `V_typeId`, `id`, `VOwner`, `Status`) VALUES
(2, 'saa44455', '555555', '454as', '5as65a6s4', 3, 15, 'Company', 'Active'),
(3, '61561651', '1616165', '325165156', '1516315', 4, 19, 'Hire', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `V_typeId` int(11) NOT NULL,
  `V_typeName` varchar(50) NOT NULL,
  `V_typeDesc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`V_typeId`, `V_typeName`, `V_typeDesc`) VALUES
(3, 'Car', ''),
(4, 'Lorry', ''),
(5, 'bus', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(11) NOT NULL,
  `vName` varchar(100) NOT NULL,
  `vMNumber` varchar(10) NOT NULL,
  `vLNumber` varchar(10) DEFAULT NULL,
  `vEmail` varchar(150) DEFAULT NULL,
  `vAddress` varchar(250) NOT NULL,
  `vCity` varchar(50) NOT NULL,
  `vDistrict` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `vName`, `vMNumber`, `vLNumber`, `vEmail`, `vAddress`, `vCity`, `vDistrict`) VALUES
(1, 'test', '9874563210', '', '', 'asaasasas', 'awissawella', 'Colombo'),
(2, 'testing', '0465416155', '', '', 'scda\\\\[caksc[askca[ps\\\\ckoask,opako', 'Kandy', 'Kandy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyinginvoice`
--
ALTER TABLE `buyinginvoice`
  ADD PRIMARY KEY (`border_id`);

--
-- Indexes for table `buyingitem`
--
ALTER TABLE `buyingitem`
  ADD PRIMARY KEY (`b_item_id`),
  ADD KEY `border_id` (`border_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `empleave`
--
ALTER TABLE `empleave`
  ADD PRIMARY KEY (`LeaveID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`EXPID`);

--
-- Indexes for table `expensegroup`
--
ALTER TABLE `expensegroup`
  ADD PRIMARY KEY (`ExpGID`);

--
-- Indexes for table `expensetype`
--
ALTER TABLE `expensetype`
  ADD PRIMARY KEY (`ExpTID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `leavetype`
--
ALTER TABLE `leavetype`
  ADD PRIMARY KEY (`Lid`);

--
-- Indexes for table `orderm`
--
ALTER TABLE `orderm`
  ADD PRIMARY KEY (`OrderM_ID`);

--
-- Indexes for table `riceorder`
--
ALTER TABLE `riceorder`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`t_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VehicleID`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`V_typeId`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyinginvoice`
--
ALTER TABLE `buyinginvoice`
  MODIFY `border_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyingitem`
--
ALTER TABLE `buyingitem`
  MODIFY `b_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `empleave`
--
ALTER TABLE `empleave`
  MODIFY `LeaveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `EXPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expensegroup`
--
ALTER TABLE `expensegroup`
  MODIFY `ExpGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expensetype`
--
ALTER TABLE `expensetype`
  MODIFY `ExpTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `Lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderm`
--
ALTER TABLE `orderm`
  MODIFY `OrderM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `riceorder`
--
ALTER TABLE `riceorder`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `t_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `VehicleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `V_typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyingitem`
--
ALTER TABLE `buyingitem`
  ADD CONSTRAINT `buyingitem_ibfk_1` FOREIGN KEY (`border_id`) REFERENCES `buyinginvoice` (`border_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
