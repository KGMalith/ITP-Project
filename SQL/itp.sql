-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 03:04 PM
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
-- Table structure for table `buyinginvoiceitem`
--

CREATE TABLE `buyinginvoiceitem` (
  `id` int(11) NOT NULL,
  `inlistTableId` int(11) NOT NULL,
  `BInvoiceID` varchar(50) NOT NULL,
  `itemName` varchar(60) NOT NULL,
  `itemQuantity` int(11) NOT NULL,
  `itemPrice` decimal(10,2) NOT NULL,
  `actualAmount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `humidity` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyinginvoiceitem`
--

INSERT INTO `buyinginvoiceitem` (`id`, `inlistTableId`, `BInvoiceID`, `itemName`, `itemQuantity`, `itemPrice`, `actualAmount`, `discount`, `humidity`, `total`) VALUES
(9, 9, 'BINVOICE1', '1', 250, '66.00', '16500.00', '0.00', 'NO', '16500.00'),
(10, 9, 'BINVOICE1', '2', 500, '250.00', '125000.00', '0.00', 'YES', '125000.00');

-- --------------------------------------------------------

--
-- Table structure for table `buyinginvoicelist`
--

CREATE TABLE `buyinginvoicelist` (
  `id` int(11) NOT NULL,
  `BInvoiceID` varchar(50) NOT NULL,
  `orderDate` varchar(20) NOT NULL,
  `vendorid` int(11) NOT NULL,
  `finalAmount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyinginvoicelist`
--

INSERT INTO `buyinginvoicelist` (`id`, `BInvoiceID`, `orderDate`, `vendorid`, `finalAmount`) VALUES
(9, 'BINVOICE1', '10-05-2020', 3, '141500.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `CusID` varchar(50) NOT NULL,
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

INSERT INTO `customer` (`customerID`, `CusID`, `cName`, `cMNumber`, `cLNumber`, `cEmail`, `cAddress`, `cCity`, `cDistrict`) VALUES
(6, 'CUS1', 'dadadadada', '0201010110', '', '', 'sdnfalncljkajkl/cnka/lclkan/lkcnac', 'Kandy', 'Kandy'),
(7, 'CUS2', 'test', '0718989891', '', '', 'akhsdkajsd', 'Ampara', 'Ampara');

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
(6, 15, 8, '5', '01/01/2020,01/02/2020,01/03/2020,01/04/2020,01/05/2020', ''),
(7, 19, 12, '2', '04/14/2020,04/15/2020', ''),
(8, 15, 10, '1', '05/01/2020', ''),
(9, 16, 15, '7', '10/05/2020,11/05/2020,12/05/2020,13/05/2020,14/05/2020,15/05/2020,16/05/2020', '');

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
(19, 'EMP5', 'sasas', 'isuru', '03/18/1992', 'Male', '4646464646', '0123456789', 'dsdcdscs6csdcsdscdscsc', '01/02/2020', 'Contract', 'Driver', '45454545', '', '0'),
(21, 'EMP6', 'asasasasdd', 'asasasas', '03/06/1992', 'Male', '965552333', '0776316717', 'sadasdsadasdad', '01/02/2020', 'Contract', 'Driver', '1131313131', '', '0');

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
(5, '23/04/2020', 8, 3, '25000.00', 'Cash'),
(6, '01/05/2020', 9, 4, '2000.00', 'Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `expensegroup`
--

CREATE TABLE `expensegroup` (
  `ExpGID` int(11) NOT NULL,
  `ExpGroupID` varchar(50) NOT NULL,
  `ExpGName` varchar(50) NOT NULL,
  `Descrip` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensegroup`
--

INSERT INTO `expensegroup` (`ExpGID`, `ExpGroupID`, `ExpGName`, `Descrip`) VALUES
(8, 'EXPG1', 'Salaries and wages', 'Include Expenses Such as Employees Salaries Wages'),
(9, 'EXPG2', 'Utility', 'Include Expenses Such as Water Bill, Electricity Bill'),
(10, 'EXPG3', 'Cost of goods sold', 'Include Expenses Such as Marketing, advertising, and promotion'),
(11, 'EXPG4', 'Administration expenses', 'Include Expenses Such as Building rent,Insurance,Office supplies'),
(12, 'EXPG5', 'Finance costs', 'Interest and other costs that an entity incurs in connection with the borrowing of funds'),
(13, 'EXPG6', 'Depreciation', 'A Reduction in the value of an asset over time');

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
(3, 8, 'Salaries'),
(4, 9, 'Electricity Bills'),
(5, 10, 'Advertisement');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `I_ID` int(11) NOT NULL,
  `itemID` varchar(50) NOT NULL,
  `itemName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`I_ID`, `itemID`, `itemName`) VALUES
(1, 'ITEM1', 'Keeri'),
(2, 'ITEM2', 'Nadu'),
(3, 'ITEM3', 'Samba');

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE `leavetype` (
  `Lid` int(11) NOT NULL,
  `leaveTypeId` varchar(50) NOT NULL,
  `LeaveName` varchar(150) NOT NULL,
  `EmpType` varchar(20) NOT NULL,
  `NoofDays` varchar(10) NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`Lid`, `leaveTypeId`, `LeaveName`, `EmpType`, `NoofDays`, `Description`) VALUES
(14, 'LVTYP1', 'Annual Leave', 'Permanent', '14', ''),
(15, 'LVTYP2', 'Annual Leave', 'Contract', '14', ''),
(16, 'LVTYP3', 'Casual Leave', 'Permanent', '7', ''),
(17, 'LVTYP4', 'Casual Leave', 'Contract', '5', '');

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
(12, 'ODR1', 6, '08/05/2020', '17/05/2020', 'Yes', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `riceprice`
--

CREATE TABLE `riceprice` (
  `rpID` int(11) NOT NULL,
  `item_ID` int(11) NOT NULL,
  `price5kg` decimal(10,2) NOT NULL,
  `price10kg` decimal(10,2) NOT NULL,
  `price25kg` decimal(10,2) NOT NULL,
  `Descrip` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riceprice`
--

INSERT INTO `riceprice` (`rpID`, `item_ID`, `price5kg`, `price10kg`, `price25kg`, `Descrip`) VALUES
(1, 1, '55.00', '65.00', '75.00', ''),
(2, 3, '35.00', '0.00', '75.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sellinginvoiceitem`
--

CREATE TABLE `sellinginvoiceitem` (
  `id` int(11) NOT NULL,
  `sinlistTableid` int(11) NOT NULL,
  `SInvoiceID` varchar(50) NOT NULL,
  `itemName` int(11) NOT NULL,
  `itemQuan5kg` int(11) NOT NULL,
  `itemPrice5kg` decimal(10,2) NOT NULL,
  `actualAmount5kg` decimal(10,2) NOT NULL,
  `itemQuan10kg` int(11) NOT NULL,
  `itemPrice10kg` decimal(10,2) NOT NULL,
  `actualAmount10kg` decimal(10,2) NOT NULL,
  `itemQuan25kg` int(11) NOT NULL,
  `itemPrice25kg` decimal(10,2) NOT NULL,
  `actualAmount25kg` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `subTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellinginvoiceitem`
--

INSERT INTO `sellinginvoiceitem` (`id`, `sinlistTableid`, `SInvoiceID`, `itemName`, `itemQuan5kg`, `itemPrice5kg`, `actualAmount5kg`, `itemQuan10kg`, `itemPrice10kg`, `actualAmount10kg`, `itemQuan25kg`, `itemPrice25kg`, `actualAmount25kg`, `discount`, `subTotal`) VALUES
(3, 2, 'SINVOICE1', 1, 250, '55.00', '13750.00', 0, '0.00', '0.00', 100, '75.00', '7500.00', '1500.00', '19750.00'),
(4, 2, 'SINVOICE1', 3, 160, '35.00', '5600.00', 0, '0.00', '0.00', 0, '0.00', '0.00', '500.00', '5100.00');

-- --------------------------------------------------------

--
-- Table structure for table `sellinginvoicelist`
--

CREATE TABLE `sellinginvoicelist` (
  `id` int(11) NOT NULL,
  `SInvoiveID` varchar(50) NOT NULL,
  `orderID` varchar(50) NOT NULL,
  `SellingInvDate` varchar(50) NOT NULL,
  `CusID` int(11) NOT NULL,
  `finalAmt` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellinginvoicelist`
--

INSERT INTO `sellinginvoicelist` (`id`, `SInvoiveID`, `orderID`, `SellingInvDate`, `CusID`, `finalAmt`) VALUES
(2, 'SINVOICE1', '12', '10-05-2020', 6, '24850.00');

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
(12, 12, 9, 5, 15, '08/05/2020', '1', 1);

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
(1, 'test', 'test@gmail.com', '$2y$10$Vw9bne/h1z3Goxk/lh6/ounXE0JPwtE6Cfaibq4e/D/kbi.zd7j6y'),
(2, 'malith', 'test@gmail.com', '$2y$10$YmKIomOxQyt5sNOKR69ITeSj1qHMa5IefyWu8GkAGHHUpCufg7wD2'),
(3, 'testing', 'testing@gmail.com', '$2y$10$tNk1i6H/ytNveqYJ0PoicuYZIFlqHDgScejrqoEx9bVjojQ14HSue');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VehicleID` int(11) NOT NULL,
  `VehID` varchar(50) NOT NULL,
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

INSERT INTO `vehicle` (`VehicleID`, `VehID`, `VRegistrationNo`, `ModelNo`, `ChassisNo`, `EngineNo`, `V_typeId`, `id`, `VOwner`, `Status`) VALUES
(5, 'VEH1', '022255', '555555', '44455c6', '1531', 9, 15, 'Company', 'Active'),
(6, 'VEH2', '131', '555555', '42', '5as65a6s4', 8, 21, 'Company', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `V_typeId` int(11) NOT NULL,
  `vehicleTId` varchar(50) NOT NULL,
  `V_typeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`V_typeId`, `vehicleTId`, `V_typeName`) VALUES
(8, 'VEHT1', 'Car'),
(9, 'VEHT2', 'Van'),
(10, 'VEHT3', 'Lorry');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(11) NOT NULL,
  `VenID` varchar(50) NOT NULL,
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

INSERT INTO `vendor` (`vendorID`, `VenID`, `vName`, `vMNumber`, `vLNumber`, `vEmail`, `vAddress`, `vCity`, `vDistrict`) VALUES
(3, 'VEN1', 'testing', '0718989891', '', '', 'sdnfalncljkajkl/cnka/lclkan/lkcnac', 'Homagama', 'Colombo'),
(4, 'VEN2', 'testing123', '0201010110', '', '', 'akhsdkajsd', 'Ampara', 'Colombo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyinginvoiceitem`
--
ALTER TABLE `buyinginvoiceitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyinginvoicelist`
--
ALTER TABLE `buyinginvoicelist`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`I_ID`);

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
-- Indexes for table `riceprice`
--
ALTER TABLE `riceprice`
  ADD PRIMARY KEY (`rpID`);

--
-- Indexes for table `sellinginvoiceitem`
--
ALTER TABLE `sellinginvoiceitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellinginvoicelist`
--
ALTER TABLE `sellinginvoicelist`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `buyinginvoiceitem`
--
ALTER TABLE `buyinginvoiceitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `buyinginvoicelist`
--
ALTER TABLE `buyinginvoicelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `empleave`
--
ALTER TABLE `empleave`
  MODIFY `LeaveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `EXPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expensegroup`
--
ALTER TABLE `expensegroup`
  MODIFY `ExpGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expensetype`
--
ALTER TABLE `expensetype`
  MODIFY `ExpTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `I_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `Lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orderm`
--
ALTER TABLE `orderm`
  MODIFY `OrderM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `riceprice`
--
ALTER TABLE `riceprice`
  MODIFY `rpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sellinginvoiceitem`
--
ALTER TABLE `sellinginvoiceitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sellinginvoicelist`
--
ALTER TABLE `sellinginvoicelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `t_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `VehicleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `V_typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
