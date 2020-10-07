-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 08:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigiri_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about`) VALUES
(1, '“SIGIRI” has become a trademark that associates with each other and every individual in Sri Lanka, setting aside the racial and ethnic disparities. The accomplishments of the group not only contributed to the exponential growth of Sri Lanka but also shaped many lives with countless offerings of employment opportunities for the less privileged in our society.We have invested and branched out a number of key sectors in the industries as follows.. ');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `UserName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `FirstName`, `LastName`, `Email`, `Password`) VALUES
(1, 'admin', 'jeewantha', 'Bandara', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Option` varchar(10) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `Name`, `Image`, `Option`, `Status`) VALUES
(1, 'Toyota', '01.jpg', 'Enable', 'Enable'),
(2, 'Nissan', '02.jpg', 'Enable', 'Enable'),
(3, 'Honda', '03.jpg', 'Disable', 'Disable'),
(4, 'BMW', '04.jpg', 'Disable', 'Disable'),
(5, 'Hyundai', '05.jpg', 'Enable', 'Disable'),
(6, 'Audi', '06.jpg', 'Disable', 'Disable'),
(7, 'Landrover', '07.jpg', 'Disable', 'Disable'),
(8, 'Suzuki', '08.jpg', 'Disable', 'Disable'),
(9, 'Maruti-suzuki', '09.jpg', 'Disable', 'Disable'),
(10, 'Kia', '10.jpg', 'Disable', 'Disable'),
(11, 'Micro', '11.jpg', 'Disable', 'Disable'),
(12, 'Mercedes-Bens', '12.jpg', 'Disable', 'Disable'),
(13, 'Mazda', '13.jpg', 'Disable', 'Disable'),
(14, 'Mitsubishi', '14.jpg', 'Disable', 'Disable');

-- --------------------------------------------------------

--
-- Table structure for table `contactnumber`
--

CREATE TABLE `contactnumber` (
  `id` int(10) NOT NULL,
  `Number1` varchar(20) DEFAULT NULL,
  `Number2` varchar(20) DEFAULT NULL,
  `Number3` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactnumber`
--

INSERT INTO `contactnumber` (`id`, `Number1`, `Number2`, `Number3`) VALUES
(1, '+94 71 123 6547', '+94 71 123 6547', '+94 71 123 6547');

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(10) NOT NULL,
  `ProductName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Discription` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Price` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `ProductName`, `Discription`, `Price`, `Type`, `Image`, `Image2`, `Image3`, `Image4`, `ProductID`) VALUES
(1, 'Chair', 'wood', '4500', 'OI', '1592406783-1590172612-DSC_0248_149a72bf-dbd1-419a-8f81-09d2107b9146_500x.jpg.webp', '', '', '', 'SD201303');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `id` int(10) NOT NULL,
  `Name` varchar(10) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Ip` varchar(255) DEFAULT NULL,
  `LoginDate` date DEFAULT NULL,
  `LoginTime` time DEFAULT NULL,
  `Browser_OS` varchar(255) DEFAULT NULL,
  `Country` varchar(10) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`id`, `Name`, `Email`, `Ip`, `LoginDate`, `LoginTime`, `Browser_OS`, `Country`, `City`) VALUES
(1, NULL, NULL, NULL, '2020-09-23', '16:14:45', NULL, NULL, NULL),
(2, NULL, NULL, NULL, '2020-10-03', '10:26:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `name`, `email`, `subject`, `message`, `Date`) VALUES
(6, 'jeewantha', 'jeewantha@gmail.com', 'cars', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras pur', '2020-05-23'),
(8, 'Test', 'Test@gmail.com', 'Test', '00', '0000-00-00'),
(9, 'Test', 'admin@gmail.com', 'Test', '33', '2020-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `sociallinks`
--

CREATE TABLE `sociallinks` (
  `id` int(10) NOT NULL,
  `links1` varchar(255) DEFAULT NULL,
  `links2` varchar(255) DEFAULT NULL,
  `links3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sociallinks`
--

INSERT INTO `sociallinks` (`id`, `links1`, `links2`, `links3`) VALUES
(1, 'https://www.facebook.com/', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(12) NOT NULL,
  `VehicleBrand` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `VehicleModel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tansmission` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FuelType` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Edition` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModelYear` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EngineCapacity` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Mileage` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VOwner` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Price` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AC` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Wheels` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ABS` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AirBag` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AlloyWhells` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CruiseControl` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FogLamp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PowerMirror` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PowerSteering` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PowerWindows` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BackCamera` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Navigation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Other` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VehicleID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `VehicleBrand`, `VehicleModel`, `Tansmission`, `FuelType`, `Edition`, `ModelYear`, `EngineCapacity`, `Mileage`, `VOwner`, `Price`, `AC`, `Wheels`, `ABS`, `AirBag`, `AlloyWhells`, `CruiseControl`, `FogLamp`, `PowerMirror`, `PowerSteering`, `PowerWindows`, `BackCamera`, `Navigation`, `Other`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `VehicleID`) VALUES
(1, 'Toyota', 'belta', 'Manual', 'Diesel', 'yaris', '2007', '1000', '90000', 'New', '325000', NULL, NULL, NULL, 'AIR-BAG', NULL, NULL, 'FOG-Lamp', 'Power-Mirror', 'Power-Steering', NULL, 'Back-Camera', 'Navigation-System', '', '1600765916-XXX.jpg', '1600765916-YYY.jpeg', '1600765916-XXX.jpg', '1600765916-', '1600765916-', 'SM201156');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactnumber`
--
ALTER TABLE `contactnumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sociallinks`
--
ALTER TABLE `sociallinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contactnumber`
--
ALTER TABLE `contactnumber`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logindetails`
--
ALTER TABLE `logindetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sociallinks`
--
ALTER TABLE `sociallinks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
