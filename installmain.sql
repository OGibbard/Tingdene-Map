-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 12:18 PM
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
  `Company` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Username`, `Password`, `AccountType`, `Company`) VALUES
('ethan', 'zone', 'user', 'Tingdene'),
('gibby', 'admin', 'admin', 'Tingdene'),
('johnsmith', '%)Ea#rK85V]d_Vm\"', 'user', ''),
('oliver', 'oliver', 'user', '');

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
  `Company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`SiteID`, `SiteName`, `SiteType`, `Latitude`, `Longitude`, `WebsiteLink`, `Company`) VALUES
(2, 'Windsor', 'Marina', '51.4879317', '-0.6381952', 'Windsor', 'Tingdene'),
(3, 'Thames and Kennet', 'Marina', '51.4623018', '-0.9519213', 'Thames-and-Kennet', 'Tingdene'),
(4, 'Osborne', 'Park', '52.679472', '0.157083', 'Osborne', 'Tingdene');

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
  MODIFY `SiteID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
