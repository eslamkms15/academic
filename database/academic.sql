-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 06:45 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` varchar(255) NOT NULL,
  `ADMIN_PASSWORD` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_PASSWORD`, `type`) VALUES
('academic', 'academic', 1),
('ADMIN', 'ADMIN', 3),
('Selection', 'Selection', 2);

-- --------------------------------------------------------

--
-- Table structure for table `deprivation`
--

CREATE TABLE `deprivation` (
  `deprivation_ID` int(11) NOT NULL,
  `Course_Name` varchar(200) NOT NULL,
  `deprivation_NAME` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `Academic_advisor` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `deprivation_DATE` date NOT NULL,
  `AVAILABLE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deprivation`
--

INSERT INTO `deprivation` (`deprivation_ID`, `Course_Name`, `deprivation_NAME`, `percentage`, `EMAIL`, `Academic_advisor`, `details`, `deprivation_DATE`, `AVAILABLE`) VALUES
(35, 'علوم حاسب', 'منع من دخول الامتحان النهائي', 80, 'eslam.kms15@gmail.com', 'علي حسن', 'منع من دخول الامتحان النهائي', '2023-09-24', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_ID` int(11) NOT NULL,
  `deprivation_ID` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `request_DATE` date NOT NULL,
  `details` varchar(255) NOT NULL,
  `request` varchar(255) NOT NULL DEFAULT 'UNDER PROCESSING',
  `reason_of_refuse` varchar(255) NOT NULL,
  `Selection` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_ID`, `deprivation_ID`, `EMAIL`, `request_DATE`, `details`, `request`, `reason_of_refuse`, `Selection`) VALUES
(87, 35, 'eslam.kms15@gmail.com', '2023-09-24', 'ظروف عائلية', 'تمت الموافقة', 'UNDER PROCESSING', 'تمت الموافقة');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `FNAME` varchar(255) NOT NULL,
  `LNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE_NUMBER` bigint(11) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`FNAME`, `LNAME`, `EMAIL`, `PHONE_NUMBER`, `PASSWORD`, `GENDER`) VALUES
('Eslam', 'Mohamed', 'eslam.kms15@gmail.com', 105648105, '202cb962ac59075b964b07152d234b70', 'ذكر');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `deprivation`
--
ALTER TABLE `deprivation`
  ADD PRIMARY KEY (`deprivation_ID`),
  ADD KEY `deprivation_ibfk_1` (`EMAIL`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_ID`,`deprivation_ID`),
  ADD KEY `CAR_ID` (`deprivation_ID`),
  ADD KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deprivation`
--
ALTER TABLE `deprivation`
  MODIFY `deprivation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deprivation`
--
ALTER TABLE `deprivation`
  ADD CONSTRAINT `deprivation_ibfk_1` FOREIGN KEY (`EMAIL`) REFERENCES `users` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`deprivation_ID`) REFERENCES `deprivation` (`deprivation_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`EMAIL`) REFERENCES `users` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
