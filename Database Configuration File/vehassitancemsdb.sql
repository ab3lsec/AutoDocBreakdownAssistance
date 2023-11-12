-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 08:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehassitancemsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Autodoc Admin', 'admin', 8979555557, 'autodocadm@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2020-01-02 12:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `ID` int(10) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `PhoneNumber` bigint(10) DEFAULT NULL,
  `PickupLoc` varchar(200) DEFAULT NULL,
  `Destination` varchar(200) DEFAULT NULL,
  `ServiceType` varchar(200) DEFAULT NULL,
  `PickupTime` varchar(200) DEFAULT NULL,
  `DateofRequest` timestamp NOT NULL DEFAULT current_timestamp(),
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `AssignTo` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`ID`, `BookingNumber`, `Name`, `Email`, `PhoneNumber`, `PickupLoc`, `Destination`, `ServiceType`, `PickupTime`, `DateofRequest`, `Remark`, `Status`, `AssignTo`, `UpdationDate`) VALUES
(15, 353075532, 'Abel Varghese', 'abelv@gmail.com', 8905674312, 'Near Forum mall, Koramangala', 'Autocare service center, Shantinagar', 'Two Wheeler', '21:00', '2022-08-31 15:30:02', 'Payment Recieved', 'Completed', 'DR100', '2022-08-31 15:37:49'),
(16, 953612392, 'Akash S', 'akash001@gmail.com', 6789543210, 'Near Big bazzar,  Whitefield', 'Hyundai Service center, Majestic', 'Four Wheeler Towing', '22:06', '2022-08-31 15:36:39', 'Assigned to DR100', 'Approved', 'DR100', '2022-08-31 15:37:12'),
(19, 282794642, 'Joyel P', 'joyelp@gmail.com', 9078654312, 'Near Christ Academy, Hullahalli', 'Wecare Service center, Begur', 'Two Wheeler Towing', '18:07', '2022-08-31 16:37:57', NULL, NULL, NULL, '2022-08-31 16:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbldriver`
--

CREATE TABLE `tbldriver` (
  `ID` int(10) NOT NULL,
  `DriverID` varchar(20) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `JoiningDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldriver`
--

INSERT INTO `tbldriver` (`ID`, `DriverID`, `Name`, `MobileNumber`, `Email`, `Address`, `Password`, `JoiningDate`) VALUES
(9, 'DR100', 'Vijay Kumar', 9879012345, 'vijaykumar77@gmail.com', 'Hongasandra, Bangalore', '1048a5d40968bdf9c05193f13309197d', '2022-08-31 14:30:53'),
(10, 'DR101', 'Joseph Kuruvilla', 8905674321, 'josephk@gmail.com', 'Shantinagar, Bangalore', 'bd9fa9edbeff8f0b88a6f26ce7665953', '2022-08-31 14:31:59'),
(11, 'DR102', 'Akshay Kumar', 7890345612, 'akshayk@gmail.com', 'Diary Circle, Bangalore', '50977d6b4d7d7b056427ae04b90b251d', '2022-08-31 14:35:49'),
(12, 'DR103', 'Shankar S', 7689012345, 'shankars@gmail.com', 'Hullahalli, Bangalore', '103e837b62017008b75ac289e505c71a', '2022-08-31 14:37:26'),
(13, 'DR104', 'Andrew G', 9786540123, 'andrew777@gmail.com', 'Koramangala, Bangalore', '47fab60bdcd2ffce91447d19fe9ce7f1', '2022-08-31 14:39:06'),
(14, 'DR105', 'Robert D', 6785904321, 'robbie@gmail.com', 'Majestic, Bangalore', 'a82762f30c1a27faa4f256b24fcaff24', '2022-08-31 14:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbltracking`
--

CREATE TABLE `tbltracking` (
  `ID` int(10) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltracking`
--

INSERT INTO `tbltracking` (`ID`, `BookingNumber`, `Remark`, `Status`, `UpdationDate`) VALUES
(16, 353075532, 'Assigned to DR100', 'Approved', '2022-08-31 15:33:04'),
(17, 353075532, 'Driver on the way', 'On The Way', '2022-08-31 15:34:28'),
(18, 953612392, 'Assigned to DR100', 'Approved', '2022-08-31 15:37:12'),
(19, 353075532, 'Payment Recieved', 'Completed', '2022-08-31 15:37:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BookingNumber` (`BookingNumber`);

--
-- Indexes for table `tbldriver`
--
ALTER TABLE `tbldriver`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltracking`
--
ALTER TABLE `tbltracking`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbldriver`
--
ALTER TABLE `tbldriver`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbltracking`
--
ALTER TABLE `tbltracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
