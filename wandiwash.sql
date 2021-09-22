-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 06, 2021 at 12:44 PM
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`User_ID`, `First_Name`, `Last_Name`, `Contact_Number`, `Date_Registered`, `Token`, `Verified`) VALUES
(27, 'bf', 'ilma', '0713198819', '2021-09-06', 'b6fee6298904d33c2f41c6047e939ce5f3ea1ace4fc73a62999c84273d05217d04ba1e26d3ebf414e66ba6967d85c52c53ff', 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`User_ID`,`VID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `Employee_ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Contact_Number` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date_Enrolled` date NOT NULL,
  `Salary` float NOT NULL,
  `NIC_No` varchar(50) NOT NULL,
  `Team` varchar(50) NOT NULL,
  `STL_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`),
  KEY `STL_ID` (`STL_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `Equipment_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Date_Acquired` date NOT NULL,
  PRIMARY KEY (`Equipment_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

DROP TABLE IF EXISTS `password_reset_temp`;
CREATE TABLE IF NOT EXISTS `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `keyno` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `keyno`, `expDate`) VALUES
('leyakat.organa@gmail.com', '768e78024aa8fdb9b8fe87be86f647450c74b2fc46', '2021-09-06 09:20:34'),
('leyakat.organa@gmail.com', '768e78024aa8fdb9b8fe87be86f64745e2701890e4', '2021-09-06 09:25:35'),
('leyakat.organa@gmail.com', '768e78024aa8fdb9b8fe87be86f64745f34df9fa85', '2021-09-06 09:29:40'),
('leyakat.organa@gmail.com', '768e78024aa8fdb9b8fe87be86f647452871aae6c1', '2021-09-06 10:05:30'),
('leyakat.organa@gmail.com', '768e78024aa8fdb9b8fe87be86f64745eadd7de73d', '2021-09-06 11:14:54'),
('leyakat.organa@gmail.com', '768e78024aa8fdb9b8fe87be86f6474567c873d488', '2021-09-06 12:23:51');

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
  `Wash_Package_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Service_team_leader_ID` int(11) DEFAULT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Rating` float DEFAULT NULL,
  PRIMARY KEY (`Reservation_ID`),
  KEY `Wash_Package_ID` (`Wash_Package_ID`),
  KEY `Service_team_leader_ID` (`Service_team_leader_ID`),
  KEY `Customer_ID` (`Customer_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_team_leader`
--

DROP TABLE IF EXISTS `service_team_leader`;
CREATE TABLE IF NOT EXISTS `service_team_leader` (
  `STL_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`STL_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_team_leader`
--

INSERT INTO `service_team_leader` (`STL_ID`) VALUES
(1);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `PASSWORD`, `Email`, `STL_ID`) VALUES
(27, 'customer', '$2y$12$7jfbOcPy9zekK9CFUn09mO5F96/boZzA46Eedmu05JAoBgIpWX5rO', 'leyakat.organa@gmail.com', NULL);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
