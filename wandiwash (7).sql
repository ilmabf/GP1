-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2021 at 05:06 PM
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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`User_ID`, `First_Name`, `Last_Name`, `Contact_Number`, `Date_Registered`, `Token`, `Verified`) VALUES
(5, 'Bf', 'Ilma', '0713198819', '2021-10-16', '', 1),
(6, 'Abdulla', 'Nalim', '0769099126', '2021-10-16', '', 1),
(11, 'bf', 'ilma', '0712345567', '2021-11-01', '0e9f3556d38466f65a363e40aebc56b11523c4e133fab8292441a1be3091cd9114c8ca66a9130c693a3a2ee80651429aef01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_location`
--

DROP TABLE IF EXISTS `customer_location`;
CREATE TABLE IF NOT EXISTS `customer_location` (
  `User_ID` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Latitude` float(33,30) NOT NULL,
  `Longitude` float(33,30) NOT NULL,
  PRIMARY KEY (`User_ID`,`Latitude`,`Longitude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_location`
--

INSERT INTO `customer_location` (`User_ID`, `Address`, `Latitude`, `Longitude`) VALUES
(5, 'Deltota,Kandy,Central Province,Sri Lanka', 7.173884868621826000000000000000, 80.685363769531250000000000000000),
(5, 'Ampitiya,Kandy,Central Province,Sri Lanka', 7.259989261627197000000000000000, 80.679870605468750000000000000000),
(5, 'Ginnoruwa,Badulla,Uva Province,Sri Lanka', 7.494988918304443000000000000000, 80.985290527343750000000000000000),
(5, 'Polonnaruwa,Polonnaruwa,North Central Province,Sri Lanka', 7.961271762847900000000000000000, 80.943542480468750000000000000000);

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

--
-- Dumping data for table `customer_vehicle`
--

INSERT INTO `customer_vehicle` (`User_ID`, `VID`, `Model`, `Colour`, `Type`, `Manufacturer`) VALUES
(5, 'ABC - 1234', 'Aqua', '#e60505', 'SUV', 'Toyota'),
(5, 'KP 8715', '123AD', '#29abbc', 'SUV', 'Toyota'),
(6, 'AG 3245', 'Premio', '#ee1111', 'SUV', 'Toyota'),
(6, 'FG 4536', 'Aqua', '#193ae1', 'SUV', 'Toyota'),
(6, 'SD 2345', 'I9', '#e81111', 'SUV', 'BMW');

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
  `Flag` int(1) NOT NULL,
  PRIMARY KEY (`Employee_ID`),
  KEY `STL_ID` (`STL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `First_Name`, `Last_Name`, `Contact_Number`, `Email`, `Date_Enrolled`, `Salary`, `NIC_No`, `Team`, `STL_ID`, `Flag`) VALUES
(23, 'Nimal', 'Tharusha', '0768934234', 'nimal@gmail.com', '2021-10-26', 30000, '64537823V', '1', NULL, 0),
(24, 'Ryan', 'Nihal', '0712367543', 'ryan06@gmail.com', '2021-10-18', 25000, '57435672V', '2', NULL, 1),
(25, 'Ramesh', 'Perera', '0712435464', 'rameshper@gmail.com', '2021-10-05', 20000, '32543424V', '2', NULL, 1),
(26, 'Gayan', 'Kurera', '0768934564', 'gayan08@gmail.com', '2021-10-19', 30000, '32563756V', '1', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `Equipment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Date_Acquired` date DEFAULT NULL,
  `Team` int(11) DEFAULT NULL,
  `Availability` int(1) DEFAULT '1',
  `Item_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Equipment_ID`),
  KEY `Team` (`Team`),
  KEY `Item_Id` (`Item_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`Equipment_ID`, `Name`, `Price`, `Date_Acquired`, `Team`, `Availability`, `Item_Id`) VALUES
(20, 'eq1', 10000, '2021-12-13', 1, 1, 1),
(21, 'eq2', 10000, '2021-12-06', NULL, 0, 1),
(22, 'eq3', 10000, '2021-12-28', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `Item_Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Total` int(11) DEFAULT NULL,
  `Free` int(11) DEFAULT NULL,
  PRIMARY KEY (`Item_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_Id`, `Name`, `Total`, `Free`) VALUES
(1, 'eq1', 1, 0),
(2, 'eq3', 1, 1);

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
  `Latitude` float(33,30) NOT NULL,
  `Longitude` float(33,30) NOT NULL,
  `Price` float NOT NULL,
  `Wash_Package_ID` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Service_team_leader_ID` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `Rating` float DEFAULT NULL,
  PRIMARY KEY (`Reservation_ID`),
  KEY `Wash_Package_ID` (`Wash_Package_ID`),
  KEY `Service_team_leader_ID` (`Service_team_leader_ID`),
  KEY `Customer_ID` (`Customer_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Reservation_ID`, `Vehicle_ID`, `Latitude`, `Longitude`, `Price`, `Wash_Package_ID`, `Date`, `Time`, `Service_team_leader_ID`, `Customer_ID`, `Rating`) VALUES
(1, 'ABC - 1234', 7.173884868621826000000000000000, 80.685363769531250000000000000000, 1000, 9, '2021-12-16', '10-12', 1, 5, NULL);

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
  `Review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  PRIMARY KEY (`Review_ID`),
  KEY `Customer_ID` (`Customer_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Review_ID`, `Date`, `Time`, `Content`, `Customer_ID`) VALUES
(1, '2021-10-21', '21:21:00', 'Good Service', 6),
(2, '2021-10-31', '13:27:47', 'Good job!', 5);

-- --------------------------------------------------------

--
-- Table structure for table `service_team_leader`
--

DROP TABLE IF EXISTS `service_team_leader`;
CREATE TABLE IF NOT EXISTS `service_team_leader` (
  `STL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Photo` varchar(255) NOT NULL,
  PRIMARY KEY (`STL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_team_leader`
--

INSERT INTO `service_team_leader` (`STL_ID`, `Photo`) VALUES
(1, '');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `PASSWORD`, `Email`, `STL_ID`) VALUES
(1, 'piyal99', '$2y$12$oZSSQ7X0Xe6fQAi9CTbYDeUE.V19OJYf.tvan5gzvz6ADoBS84PvS', 'systemadmin@gmail.com', NULL),
(2, 'jagath99', '$2y$12$oZSSQ7X0Xe6fQAi9CTbYDeUE.V19OJYf.tvan5gzvz6ADoBS84PvS', 'abdullanalimm@gmail.com', NULL),
(4, 'harith99', '$2y$12$oZSSQ7X0Xe6fQAi9CTbYDeUE.V19OJYf.tvan5gzvz6ADoBS84PvS', 'stl@gmail.com', 1),
(5, 'customer', '$2y$12$oZSSQ7X0Xe6fQAi9CTbYDeUE.V19OJYf.tvan5gzvz6ADoBS84PvS', 'leyakat.organa@gmail.com', NULL),
(6, 'abdulla1999', '$2y$12$lO5wNMgo8FkVwtcvB5mzl.N40EIDbDMMq2rURpLl7wxQgxr2GCQWu', 'abdullanalim1999@gmail.com', NULL),
(11, 'abcd', '$2y$12$Ieg30.obfL4ULsoDibufZOiip3sZTUoolLkDxXfup8KhlY8GLAPxW', 'ilmabasheer3@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wash_package`
--

DROP TABLE IF EXISTS `wash_package`;
CREATE TABLE IF NOT EXISTS `wash_package` (
  `Wash_Package_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`Wash_Package_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wash_package`
--

INSERT INTO `wash_package` (`Wash_Package_ID`, `Name`, `Description`) VALUES
(8, 'Interior Cleaning', 'Vacuuming, disposing garbage, cleaning the floor mats and windows from the inside.'),
(9, 'Exterior Wash', 'Pre-cleaning, handwashing, drying, cleaning the tyres, rims and windows from the outside.'),
(11, 'Sanitizing', 'Disinfecting your vehicle to protect you from germs.');

-- --------------------------------------------------------

--
-- Table structure for table `wash_package_vehicle_category`
--

DROP TABLE IF EXISTS `wash_package_vehicle_category`;
CREATE TABLE IF NOT EXISTS `wash_package_vehicle_category` (
  `Wash_Package_ID` int(11) NOT NULL,
  `Vehicle_Type` varchar(50) NOT NULL,
  `Price` float DEFAULT NULL,
  PRIMARY KEY (`Wash_Package_ID`,`Vehicle_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wash_package_vehicle_category`
--

INSERT INTO `wash_package_vehicle_category` (`Wash_Package_ID`, `Vehicle_Type`, `Price`) VALUES
(8, 'H-back', 200000),
(8, 'Luxury', NULL),
(8, 'Sedan', NULL),
(8, 'SUV', 1500),
(8, 'Van', NULL),
(9, 'H-back', NULL),
(9, 'Luxury', NULL),
(9, 'Sedan', 1000),
(9, 'SUV', 2000),
(9, 'Van', NULL),
(11, 'H-back', NULL),
(11, 'Luxury', NULL),
(11, 'Sedan', NULL),
(11, 'SUV', 3000),
(11, 'Van', NULL);

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
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`Team`) REFERENCES `service_team_leader` (`STL_ID`),
  ADD CONSTRAINT `equipment_ibfk_2` FOREIGN KEY (`Item_Id`) REFERENCES `item` (`Item_Id`);

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
