-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 07:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `AccountType` varchar(20) NOT NULL,
  `Company` varchar(1000) NOT NULL,
  `Tier` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Username`, `Password`, `AccountType`, `Company`, `Tier`) VALUES
('ethan', '543e33c48b3c23d3b3ef151358533bc206fa0225ba66b89933a795451f016479', 'user', 'Tingdene', 2),
('gibby', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin', 'Tingdene', 3),
('johnsmith', '1676fc26dc9117da77de3f8df83dcc19b9ae4e31fcbcacd0eb2624271f32d260', 'user', '', 1),
('oliver', '7dfef7aed2105b7eceb4d34e1ad84fdad4693bd5de041e1b47079efeb6001a83', 'user', 'Tingdene', 1);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `SiteID` int(8) NOT NULL,
  `SiteName` varchar(1000) NOT NULL,
  `SiteType` varchar(50) NOT NULL,
  `Latitude` varchar(15) NOT NULL,
  `Longitude` varchar(15) NOT NULL,
  `WebsiteLink` varchar(1000) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `Area` varchar(20) NOT NULL,
  `Valuation` varchar(20) NOT NULL,
  `Capacity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`SiteID`, `SiteName`, `SiteType`, `Latitude`, `Longitude`, `WebsiteLink`, `Company`, `Area`, `Valuation`, `Capacity`) VALUES
(23, 'Thames and Kennet', 'Marina', '51.4623018', '-0.9519213', 'Thames-and-Kennet', 'Tingdene', '0', '0', '0'),
(26, 'Osborne', 'Park', '52.679472', '0.157083', 'Osborne', 'Tingdene', '0', '0', '0'),
(27, 'Windsor', 'Marina', '51.4879317', '-0.6381952', 'Windsor', 'Tingdene', '0', '0', '0'),
(28, 'Badgerwood', 'Park', '51.389631', '-0.787389', 'Badgerwood', 'Tingdene', '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`SiteID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `SiteID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
