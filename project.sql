-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 09:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Date` date NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Time` time NOT NULL,
  `Buyerid` int(10) NOT NULL,
  `Property_Uploadid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Date`, `Location`, `Time`, `Buyerid`, `Property_Uploadid`) VALUES
('2020-12-27', 'h', '16:46:00', 1, 1),
('2021-02-28', 'aminbazer', '22:56:00', 3, 2),
('2020-12-27', 'kda', '21:09:00', 2, 3),
('2021-03-08', 'r', '13:41:00', 5, 4),
('2022-06-12', 'dhaka', '12:45:00', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `NID Number` int(20) NOT NULL,
  `Mobile NO` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `Name`, `NID Number`, `Mobile NO`, `Address`, `Email`, `password`) VALUES
(1, 'kabil', 123456, 1521410912, 'kbd', 'kabil@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'nae', 1233, 1521410900, 'hjjhjjj', 'nae@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(3, 'naeem', 123450, 1521410990, 'kbd', 'naeem@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(4, 'naeem', 6, 2147483647, 'kada', 'naem@gmail.com', '1679091c5a880faf6fb5e6087eb1b2dc'),
(5, 'prodip', 123488, 2147483647, 'kdo', 'prodip@gmail.com', '83878c91171338902e0fe0fb97a8c47a'),
(7, 'soton', 1, 1599410912, 'kada', 'soton@gmail.com', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(8, 'hemal', 1234000, 2147483647, 'kbd', 'hemal@gmail.com', 'e4da3b7fbbce2345d7772b0674a318d5'),
(9, 'kk', 99, 1521410988, 'kada', 'kk@gmail.com', 'dc468c70fb574ebd07287b38d0d0676d'),
(11, 'prodip', 24, 1117303200, 'Dhaka', 'pro@gmail.com', '83878c91171338902e0fe0fb97a8c47a'),
(12, 'saad', 90, 1921410990, 'bnorghti', 'saad5@gmail.com', '347602146a923872538f3803eb5f3cef');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Amount` int(100) NOT NULL,
  `Buyerid` int(10) NOT NULL,
  `AppointmentProperty_Uploadid2` int(10) NOT NULL,
  `date` date NOT NULL,
  `transactionid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Amount`, `Buyerid`, `AppointmentProperty_Uploadid2`, `date`, `transactionid`) VALUES
(234455, 1, 1, '2020-12-27', 9),
(234459, 2, 3, '2020-12-27', 8),
(234455, 3, 2, '2021-02-28', 9),
(234455, 5, 4, '2021-02-28', 0),
(10000000, 5, 5, '2022-06-12', 1212);

-- --------------------------------------------------------

--
-- Table structure for table `property_upload`
--

CREATE TABLE `property_upload` (
  `id` int(10) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Amount Of Space` int(50) NOT NULL,
  `rsimage` varchar(255) NOT NULL,
  `csimage` varchar(255) NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `Sellerid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_upload`
--

INSERT INTO `property_upload` (`id`, `Location`, `Amount Of Space`, `rsimage`, `csimage`, `pimage`, `Sellerid`) VALUES
(1, 'kda', 9, '31012021_100144rs.jpg', '31012021_100144cs.jpg', '31012021_10014437c084c0a98a8aba89c3483d3f19ad03.jpg', 1),
(2, 'aminbazer', 60, '31012021_120152cs.jpg', '31012021_120152rs.jpg', '31012021_120152download.jpg', 2),
(3, 'kda', 9, '31012021_020132cs.jpg', '31012021_020132rs.jpg', '31012021_02013237c084c0a98a8aba89c3483d3f19ad03.jpg', 3),
(4, 'kda', 13, '31012021_020137cs.jpg', '31012021_020137rs.jpg', '31012021_020137download.jpg', 2),
(5, 'kda', 12, '12062022_08061828012021_040147rs.jpg', '12062022_08061831012021_020137cs.jpg', '12062022_08061820012021_050115c9aaf8853557c381c80ee827db0dad64.jpg', 4),
(6, 'banordhati', 20, '12062022_08064212062022_08061828012021_040147rs.jpg', '12062022_08064212062022_08061831012021_020137cs.jpg', '12062022_08064231012021_020137download.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `NID Number` int(20) NOT NULL,
  `Mobile No` int(11) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `Name`, `NID Number`, `Mobile No`, `Address`, `Email`, `password`) VALUES
(1, 'naeem', 4657678, 1716524399, 'ojinkjn', 'naeem@gmail.com', '7b8b965ad4bca0e41ab51de7b31363a1'),
(2, 'nam', 4657679, 1716524390, 'ojinkjn', 'nam@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(3, 'kano', 9999, 2147483647, 'ojinkjn', 'kono@gmail.com', 'c9f0f895fb98ab9159f51fd0297e236d'),
(4, 'Md Kabil', 1234, 1521410912, 'kda', 'kabilbiswas566@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(5, 'saad', 90, 1921410990, 'banorgati', 'saad5@gmail.com', '347602146a923872538f3803eb5f3cef'),
(7, 'taki', 89, 1821410990, 'banorgati', 'taki8@gmail.com', '69e41c2b301b01a200c3d3d2e2d7b41e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Property_Uploadid`),
  ADD KEY `FKAppointmen561491` (`Property_Uploadid`),
  ADD KEY `FKAppointmen355956` (`Buyerid`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NID Number` (`NID Number`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `FKPayment256672` (`Buyerid`),
  ADD KEY `FKPayment385617` (`AppointmentProperty_Uploadid2`);

--
-- Indexes for table `property_upload`
--
ALTER TABLE `property_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKProperty_U827183` (`Sellerid`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NID Number` (`NID Number`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `property_upload`
--
ALTER TABLE `property_upload`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `FKAppointmen355956` FOREIGN KEY (`Buyerid`) REFERENCES `buyer` (`id`),
  ADD CONSTRAINT `FKAppointmen561491` FOREIGN KEY (`Property_Uploadid`) REFERENCES `property_upload` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FKPayment256672` FOREIGN KEY (`Buyerid`) REFERENCES `buyer` (`id`),
  ADD CONSTRAINT `FKPayment385617` FOREIGN KEY (`AppointmentProperty_Uploadid2`) REFERENCES `appointment` (`Property_Uploadid`);

--
-- Constraints for table `property_upload`
--
ALTER TABLE `property_upload`
  ADD CONSTRAINT `FKProperty_U827183` FOREIGN KEY (`Sellerid`) REFERENCES `seller` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
