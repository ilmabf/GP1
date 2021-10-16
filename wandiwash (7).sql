-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2021 at 11:54 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wandiwash`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Contact_Number` varchar(50) NOT NULL,
  `Date_Registered` date NOT NULL,
  `Token` varchar(255) NOT NULL,
  `Verified` int(1) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_location`
--

DROP TABLE IF EXISTS `customer_location`;
CREATE TABLE IF NOT EXISTS `customer_location` (
  `User_ID` int(11) NOT NULL,
  `Latitude` float(10,10) NOT NULL,
  `Longitude` float(10,10) NOT NULL,
  PRIMARY KEY (`User_ID`,`Latitude`,`Longitude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_vehicle`
--

DROP TABLE IF EXISTS `customer_vehicle`;
CREATE TABLE IF NOT EXISTS `customer_vehicle` (
  `User_ID` int(11) NOT NULL,
  `VID` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Colour` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Manufacturer` varchar(50) NOT NULL,
  PRIMARY KEY (`User_ID`,`VID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `Employee_ID` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Contact_Number` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date_Enrolled` date NOT NULL,
  `Salary` int(11) NOT NULL,
  `NIC_No` varchar(50) NOT NULL,
  `Team` varchar(50) NOT NULL,
  `STL_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`),
  KEY `STL_ID` (`STL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `Equipment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Date_Acquired` date NOT NULL,
  `Team` int(11) DEFAULT NULL,
  PRIMARY KEY (`Equipment_ID`),
  KEY `Team` (`Team`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

DROP TABLE IF EXISTS `password_reset_temp`;
CREATE TABLE IF NOT EXISTS `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `keyno` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Vehicle_ID` varchar(50) NOT NULL,
  `Latitude` float(10,10) NOT NULL,
  `Longitude` float(10,10) NOT NULL,
  `Price` float NOT NULL,
  `Wash_Package_ID` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Service_team_leader_ID` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `Rating` float DEFAULT NULL,
  PRIMARY KEY (`Reservation_ID`),
  KEY `Wash_Package_ID` (`Wash_Package_ID`),
  KEY `Service_team_leader_ID` (`Service_team_leader_ID`),
  KEY `Customer_ID` (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_photos`
--

DROP TABLE IF EXISTS `reservation_photos`;
CREATE TABLE IF NOT EXISTS `reservation_photos` (
  `Reservation_ID` int(11) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Time_Uploaded` datetime NOT NULL,
  PRIMARY KEY (`Reservation_ID`,`Picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `Review_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  PRIMARY KEY (`Review_ID`),
  KEY `Customer_ID` (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_team_leader`
--

DROP TABLE IF EXISTS `service_team_leader`;
CREATE TABLE IF NOT EXISTS `service_team_leader` (
  `STL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Photo` varchar(255) NOT NULL,
  PRIMARY KEY (`STL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_team_leader_equipment`
--

DROP TABLE IF EXISTS `service_team_leader_equipment`;
CREATE TABLE IF NOT EXISTS `service_team_leader_equipment` (
  `STL_ID` int(11) NOT NULL,
  `Equipment_ID` int(11) NOT NULL,
  PRIMARY KEY (`STL_ID`,`Equipment_ID`),
  KEY `Equipment_ID` (`Equipment_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `STL_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `STL_ID` (`STL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wash_package`
--

DROP TABLE IF EXISTS `wash_package`;
CREATE TABLE IF NOT EXISTS `wash_package` (
  `Wash_Package_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`Wash_Package_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wash_package_vehicle_category`
--

DROP TABLE IF EXISTS `wash_package_vehicle_category`;
CREATE TABLE IF NOT EXISTS `wash_package_vehicle_category` (
  `Wash_Package_ID` int(11) NOT NULL,
  `Vehicle_Type` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  PRIMARY KEY (`Wash_Package_ID`,`Vehicle_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `customer_location`
--
ALTER TABLE `customer_location`
  ADD CONSTRAINT `customer_location_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `customer` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `customer_vehicle`
--
ALTER TABLE `customer_vehicle`
  ADD CONSTRAINT `customer_vehicle_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `customer` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`STL_ID`) REFERENCES `service_team_leader` (`STL_ID`) ON DELETE SET NULL;

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`Team`) REFERENCES `service_team_leader` (`STL_ID`) ON DELETE SET NULL;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Wash_Package_ID`) REFERENCES `wash_package` (`Wash_Package_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Service_team_leader_ID`) REFERENCES `service_team_leader` (`STL_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `reservation_photos`
--
ALTER TABLE `reservation_photos`
  ADD CONSTRAINT `reservation_photos_ibfk_1` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservation` (`Reservation_ID`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `service_team_leader_equipment`
--
ALTER TABLE `service_team_leader_equipment`
  ADD CONSTRAINT `service_team_leader_equipment_ibfk_1` FOREIGN KEY (`STL_ID`) REFERENCES `service_team_leader` (`STL_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_team_leader_equipment_ibfk_2` FOREIGN KEY (`Equipment_ID`) REFERENCES `equipment` (`Equipment_ID`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`STL_ID`) REFERENCES `service_team_leader` (`STL_ID`) ON DELETE SET NULL;

--
-- Constraints for table `wash_package_vehicle_category`
--
ALTER TABLE `wash_package_vehicle_category`
  ADD CONSTRAINT `wash_package_vehicle_category_ibfk_1` FOREIGN KEY (`Wash_Package_ID`) REFERENCES `wash_package` (`Wash_Package_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
