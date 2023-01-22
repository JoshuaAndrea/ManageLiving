-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 22, 2023 at 12:51 PM
-- Server version: 10.10.2-MariaDB-1:10.10.2+maria~ubu2204
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ManageLivingDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressId` int(11) NOT NULL,
  `streetname` varchar(255) NOT NULL,
  `housenumber` int(11) NOT NULL,
  `extension` varchar(16) DEFAULT NULL,
  `postcode` varchar(8) NOT NULL,
  `city` varchar(128) NOT NULL,
  `tenantId` int(11) DEFAULT NULL COMMENT 'Foreign key Tenant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressId`, `streetname`, `housenumber`, `extension`, `postcode`, `city`, `tenantId`) VALUES
(3, 'Poelenburg', 254, NULL, '1504NL', 'Zaandam', 1),
(4, 'Carpinistraat', 33, NULL, '5665HP', 'Geldrop', NULL),
(5, 'Bijdorplaan', 15, NULL, '2015CE', 'Haarlem', NULL),
(6, 'Bijdorplaan', 16, NULL, '2015CE', 'Haarlem', NULL),
(7, 'Poelenburg', 253, NULL, '1504NL', 'Zaandam', 1),
(8, 'Poelenburg', 252, NULL, '1504NL', 'Zaandam', 1),
(9, 'Poelenburg', 251, NULL, '1504NL', 'Zaandam', 1),
(10, 'Poelenburg', 250, NULL, '1504NL', 'Zaandam', 1),
(11, 'Poelenburg', 255, NULL, '1504NL', 'Zaandam', 1),
(12, 'Poelenburg', 256, NULL, '1504NL', 'Zaandam', 1),
(13, 'Poelenburg', 257, NULL, '1504NL', 'Zaandam', 1),
(14, 'Poelenburg', 258, NULL, '1504NL', 'Zaandam', 1),
(15, 'Bijdorplaan', 17, NULL, '2015CE', 'Haarlem', NULL),
(16, 'Carpinistraat', 32, NULL, '5665HP', 'Geldrop', NULL),
(17, 'Carpinistraat', 31, NULL, '5665HP', 'Geldrop', NULL),
(18, 'Carpinistraat', 30, NULL, '5665HP', 'Geldrop', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactMoment`
--

CREATE TABLE `contactMoment` (
  `contactMomentId` int(11) NOT NULL,
  `datetime` varchar(64) NOT NULL,
  `contactType` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `isResolved` tinyint(1) NOT NULL,
  `addressId` int(11) NOT NULL COMMENT 'Foreign key Address'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactMoment`
--

INSERT INTO `contactMoment` (`contactMomentId`, `datetime`, `contactType`, `title`, `message`, `isResolved`, `addressId`) VALUES
(2, '20-01-2023', 'Contactform', 'Repair Request', 'toilet broke pls halp', 0, 3),
(4, '19-01-2023 23:53', 'Contactform', 'Repair Request', 'Joshua Andrea / 0634531077 / joshua@email.com / door ded', 0, 3),
(6, '19-01-2023 23:56', 'Contactform', 'Contract Question', 'Bibi Stokvis / 0612312322 / bibi@email.nl / When&#039;s the next payment?', 0, 3),
(9, '20-01-2023 12:21', 'Contactform', 'Repair Request', 'Joshua Andrea / 0634531077 / joshua@email.com / door ded', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenantId` int(11) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phoneNumber` varchar(64) NOT NULL,
  `dateOfBirth` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenantId`, `firstName`, `lastName`, `email`, `phoneNumber`, `dateOfBirth`) VALUES
(1, 'Joshua', 'Andrea', 'joshua.andrea@hotmail.com', '06-34531088', '16-04-1998'),
(2, 'Guyon', 'Belgiano', 'guyon.belgiano@belgian-email.com', '+32-410032017', '03-05-1988'),
(3, 'David', 'Lee', 'h.lee@naver.com', '06-12340234', '05-01-1996'),
(7, 'John', 'Smith', 'johnsmith@gmail.com', '06-12451245', '01-04-2000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `hashPassword` varchar(256) NOT NULL,
  `userType` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `firstName`, `lastName`, `hashPassword`, `userType`) VALUES
(2, 'Michael@ManageLiving.nl', 'Michael', 'Johnson', '$2y$10$rdHKMLUzTSWNr3hnpJHdIOkgpx0lprWXeNBaA/mO1/jECevWFKzS2', 'Employee'),
(3, 'Mark@Manageliving.nl', 'Mark', 'De Haan', '$2y$10$.faNAHCcACJkK/3dp4wX1.beHc0XDUfvqtN2YaZK/7klemNxz2Zg6', 'Admin'),
(5, 'TestEmployee@ManageLiving.nl', 'Test', 'McTesty', '$2y$10$Uor7meM1ksCgDFIyXLj2Ye4lJUKGb8j2.kH7NXFACfAE5KxwDANye', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `contactMoment`
--
ALTER TABLE `contactMoment`
  ADD PRIMARY KEY (`contactMomentId`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenantId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contactMoment`
--
ALTER TABLE `contactMoment`
  MODIFY `contactMomentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
