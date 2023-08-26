-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 06:15 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `ParkingId` int(30) NOT NULL,
  `ParkingName` varchar(30) NOT NULL,
  `Fair` int(30) NOT NULL,
  `TotalSlots` int(30) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`ParkingId`, `ParkingName`, `Fair`, `TotalSlots`, `Address`) VALUES
(1, 'Jheel', 80, 30, 'Jheel Road, Hazaribagh'),
(2, 'Cannery Hill', 40, 10, 'Cannery Hill, Hzb'),
(3, 'Nina Griffith', 59, 50, 'Expedita ea irure si'),
(4, 'RaIYAN', 11, 2, 'Id cillum voluptatem'),
(5, 'Ramnagar', 10, 15, 'hh'),
(6, 'PanchMandir', 15, 20, 'rr');

-- --------------------------------------------------------

--
-- Table structure for table `parkingslots`
--

CREATE TABLE `parkingslots` (
  `ParkingName` varchar(30) NOT NULL,
  `Slot1` varchar(20) DEFAULT NULL,
  `Slot2` varchar(20) DEFAULT NULL,
  `Slot3` varchar(20) DEFAULT NULL,
  `Slot4` varchar(20) DEFAULT NULL,
  `Slot5` varchar(20) DEFAULT NULL,
  `Slot6` varchar(20) DEFAULT NULL,
  `Slot7` varchar(20) DEFAULT NULL,
  `Slot8` varchar(20) DEFAULT NULL,
  `Slot9` varchar(20) DEFAULT NULL,
  `Slot10` varchar(20) DEFAULT NULL,
  `Slot11` varchar(20) DEFAULT NULL,
  `Slot12` varchar(20) DEFAULT NULL,
  `Slot13` varchar(20) DEFAULT NULL,
  `Slot14` varchar(20) DEFAULT NULL,
  `Slot15` varchar(20) DEFAULT NULL,
  `Slot16` varchar(20) DEFAULT NULL,
  `Slot17` varchar(20) DEFAULT NULL,
  `Slot18` varchar(20) DEFAULT NULL,
  `Slot19` varchar(20) DEFAULT NULL,
  `Slot20` varchar(20) DEFAULT NULL,
  `Slot21` varchar(20) DEFAULT NULL,
  `Slot22` varchar(20) DEFAULT NULL,
  `Slot23` varchar(20) DEFAULT NULL,
  `Slot24` varchar(20) DEFAULT NULL,
  `Slot25` varchar(20) DEFAULT NULL,
  `Slot26` varchar(20) DEFAULT NULL,
  `Slot27` varchar(20) DEFAULT NULL,
  `Slot28` varchar(20) DEFAULT NULL,
  `Slot29` varchar(20) DEFAULT NULL,
  `Slot30` varchar(20) DEFAULT NULL,
  `Slot31` varchar(20) DEFAULT NULL,
  `Slot32` varchar(20) DEFAULT NULL,
  `Slot33` varchar(20) DEFAULT NULL,
  `Slot34` varchar(20) DEFAULT NULL,
  `Slot35` varchar(20) DEFAULT NULL,
  `Slot36` varchar(20) DEFAULT NULL,
  `Slot37` varchar(20) DEFAULT NULL,
  `Slot38` varchar(20) DEFAULT NULL,
  `Slot39` varchar(20) DEFAULT NULL,
  `Slot40` varchar(20) DEFAULT NULL,
  `Slot41` varchar(20) DEFAULT NULL,
  `Slot42` varchar(20) DEFAULT NULL,
  `Slot43` varchar(20) DEFAULT NULL,
  `Slot44` varchar(20) DEFAULT NULL,
  `Slot45` varchar(20) DEFAULT NULL,
  `Slot46` varchar(20) DEFAULT NULL,
  `Slot47` varchar(20) DEFAULT NULL,
  `Slot48` varchar(20) DEFAULT NULL,
  `Slot49` varchar(20) DEFAULT NULL,
  `Slot50` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkingslots`
--

INSERT INTO `parkingslots` (`ParkingName`, `Slot1`, `Slot2`, `Slot3`, `Slot4`, `Slot5`, `Slot6`, `Slot7`, `Slot8`, `Slot9`, `Slot10`, `Slot11`, `Slot12`, `Slot13`, `Slot14`, `Slot15`, `Slot16`, `Slot17`, `Slot18`, `Slot19`, `Slot20`, `Slot21`, `Slot22`, `Slot23`, `Slot24`, `Slot25`, `Slot26`, `Slot27`, `Slot28`, `Slot29`, `Slot30`, `Slot31`, `Slot32`, `Slot33`, `Slot34`, `Slot35`, `Slot36`, `Slot37`, `Slot38`, `Slot39`, `Slot40`, `Slot41`, `Slot42`, `Slot43`, `Slot44`, `Slot45`, `Slot46`, `Slot47`, `Slot48`, `Slot49`, `Slot50`) VALUES
('Jheel', 'Reserved', 'Reserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Reserved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Cannery Hill', 'Reserved', 'Reserved', 'Reserved', 'Reserved', 'Reserved', 'Reserved', 'Reserved', 'Unreserved', 'Unreserved', 'Unreserved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Nina Griffith', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Reserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'reserved'),
('RaIYAN', 'Reserved', 'Reserved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Ramnagar', 'Unreserved', 'Reserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('PanchMandir', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Reserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', 'Unreserved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 123456789, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-07-05 05:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblregusers`
--

CREATE TABLE `tblregusers` (
  `ID` int(5) NOT NULL,
  `FirstName` varchar(250) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `Loc` varchar(200) DEFAULT NULL,
  `SlotNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblregusers`
--

INSERT INTO `tblregusers` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`, `Loc`, `SlotNo`) VALUES
(1, 'Mayur', 'Dhwaj', 1234567890, 'Customer@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-08-19 18:47:25', 'Cannery Hill', 'Slot4'),
(5, 'Raiyan', NULL, 7007806018, 'raiyan@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-08-23 09:49:44', 'Cannery Hill', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`ParkingId`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblregusers`
--
ALTER TABLE `tblregusers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MobileNumber` (`MobileNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parking`
--
ALTER TABLE `parking`
  MODIFY `ParkingId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblregusers`
--
ALTER TABLE `tblregusers`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
