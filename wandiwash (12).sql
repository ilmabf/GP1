-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 04:24 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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

CREATE TABLE `customer` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Contact_Number` varchar(50) NOT NULL,
  `Date_Registered` date NOT NULL,
  `Token` varchar(255) NOT NULL,
  `Verified` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`User_ID`, `First_Name`, `Last_Name`, `Contact_Number`, `Date_Registered`, `Token`, `Verified`) VALUES
(5, 'Bf', 'Ilma', '0713198819', '2021-10-16', '', 1),
(6, 'Abdulla', 'Nalim', '0769099126', '2021-10-16', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_location`
--

CREATE TABLE `customer_location` (
  `User_ID` int(11) NOT NULL,
  `Latitude` float(10,10) NOT NULL,
  `Longitude` float(10,10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_vehicle`
--

CREATE TABLE `customer_vehicle` (
  `User_ID` int(11) NOT NULL,
  `VID` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Colour` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Manufacturer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_vehicle`
--

INSERT INTO `customer_vehicle` (`User_ID`, `VID`, `Model`, `Colour`, `Type`, `Manufacturer`) VALUES
(6, 'AG 3245', 'Premio', '#ee1111', 'SUV', 'Toyota'),
(6, 'FG 4536', 'Aqua', '#193ae1', 'SUV', 'Toyota'),
(6, 'SD 2345', 'I9', '#e81111', 'SUV', 'BMW');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Contact_Number` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date_Enrolled` date NOT NULL,
  `Salary` int(11) NOT NULL,
  `NIC_No` varchar(50) NOT NULL,
  `Team` varchar(50) NOT NULL,
  `STL_ID` int(11) DEFAULT NULL,
  `Flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `First_Name`, `Last_Name`, `Contact_Number`, `Email`, `Date_Enrolled`, `Salary`, `NIC_No`, `Team`, `STL_ID`, `Flag`) VALUES
(23, 'Nimal', 'Tharusha', '0768934234', 'nimal@gmail.com', '2021-10-26', 30000, '64537823V', '1', NULL, 0),
(24, 'Ryan', 'Nihal', '0712367543', 'ryan05@gmail.com', '2021-10-18', 25000, '57435672V', '2', NULL, 1),
(25, 'Ramesh', 'Perera', '0712435464', 'rameshper@gmail.com', '2021-10-05', 20000, '32543424V', '2', NULL, 1),
(26, 'Gayan', 'Kurera', '0768934564', 'gayan08@gmail.com', '2021-10-19', 30000, '32563756V', '1', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `Equipment_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Date_Acquired` date NOT NULL,
  `Team` int(11) DEFAULT NULL,
  `Availability` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`Equipment_ID`, `Name`, `Price`, `Date_Acquired`, `Team`, `Availability`) VALUES
(1, 'Compressor', 12000, '2021-10-05', NULL, 0),
(2, 'Vaccum Cleaner', 12000, '2021-10-05', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `keyno` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_ID` int(11) NOT NULL,
  `Vehicle_ID` varchar(50) NOT NULL,
  `Latitude` float(10,10) NOT NULL,
  `Longitude` float(10,10) NOT NULL,
  `Price` float NOT NULL,
  `Wash_Package_ID` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Service_team_leader_ID` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `Rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_photos`
--

CREATE TABLE `reservation_photos` (
  `Reservation_ID` int(11) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Time_Uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Review_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Review_ID`, `Date`, `Time`, `Content`, `Customer_ID`) VALUES
(1, '2021-10-21', '21:21:00', 'Good Service', 6);

-- --------------------------------------------------------

--
-- Table structure for table `service_team_leader`
--

CREATE TABLE `service_team_leader` (
  `STL_ID` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_team_leader`
--

INSERT INTO `service_team_leader` (`STL_ID`, `Photo`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `service_team_leader_equipment`
--

CREATE TABLE `service_team_leader_equipment` (
  `STL_ID` int(11) NOT NULL,
  `Equipment_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `STL_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `PASSWORD`, `Email`, `STL_ID`) VALUES
(1, 'piyal99', '$2a$12$I4MIN6YtnQ1938v0xRCIhOOvhEe6.aAsRbjGITxOKDUSDvbztpAbS', 'systemadmin@gmail.com', NULL),
(2, 'jagath99', '$2a$12$m84ivglPH0dyG8CqFW0Vmel/fx6zJGeA2hLStzxM6hv/Xy.5vDcb6', 'abdullanalimm@gmail.com', NULL),
(4, 'harith99', '$2a$12$zL9kPAeTnMf31uu8gkl87efPRkSVWQ2/k/zIFIUATEEZqrnc0TkaO', 'stl@gmail.com', 1),
(5, 'customer', '$2y$12$oZSSQ7X0Xe6fQAi9CTbYDeUE.V19OJYf.tvan5gzvz6ADoBS84PvS', 'leyakat.organa@gmail.com', NULL),
(6, 'abdulla1999', '$2y$12$lO5wNMgo8FkVwtcvB5mzl.N40EIDbDMMq2rURpLl7wxQgxr2GCQWu', 'abdullanalim1999@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wash_package`
--

CREATE TABLE `wash_package` (
  `Wash_Package_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wash_package_vehicle_category`
--

CREATE TABLE `wash_package_vehicle_category` (
  `Wash_Package_ID` int(11) NOT NULL,
  `Vehicle_Type` varchar(50) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `customer_location`
--
ALTER TABLE `customer_location`
  ADD PRIMARY KEY (`User_ID`,`Latitude`,`Longitude`);

--
-- Indexes for table `customer_vehicle`
--
ALTER TABLE `customer_vehicle`
  ADD PRIMARY KEY (`User_ID`,`VID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD KEY `STL_ID` (`STL_ID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`Equipment_ID`),
  ADD KEY `Team` (`Team`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `Wash_Package_ID` (`Wash_Package_ID`),
  ADD KEY `Service_team_leader_ID` (`Service_team_leader_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `reservation_photos`
--
ALTER TABLE `reservation_photos`
  ADD PRIMARY KEY (`Reservation_ID`,`Picture`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `service_team_leader`
--
ALTER TABLE `service_team_leader`
  ADD PRIMARY KEY (`STL_ID`);

--
-- Indexes for table `service_team_leader_equipment`
--
ALTER TABLE `service_team_leader_equipment`
  ADD PRIMARY KEY (`STL_ID`,`Equipment_ID`),
  ADD KEY `Equipment_ID` (`Equipment_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `STL_ID` (`STL_ID`);

--
-- Indexes for table `wash_package`
--
ALTER TABLE `wash_package`
  ADD PRIMARY KEY (`Wash_Package_ID`);

--
-- Indexes for table `wash_package_vehicle_category`
--
ALTER TABLE `wash_package_vehicle_category`
  ADD PRIMARY KEY (`Wash_Package_ID`,`Vehicle_Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `Equipment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `Review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_team_leader`
--
ALTER TABLE `service_team_leader`
  MODIFY `STL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
