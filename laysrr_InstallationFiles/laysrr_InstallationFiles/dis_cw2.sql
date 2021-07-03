-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 11:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dis_cw2`
--

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `Fine_ID` int(11) NOT NULL,
  `Fine_Amount` int(11) NOT NULL,
  `Fine_Points` int(11) NOT NULL,
  `Incident_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fines`
--

INSERT INTO `fines` (`Fine_ID`, `Fine_Amount`, `Fine_Points`, `Incident_ID`) VALUES
(1, 2000, 6, 3),
(2, 50, 0, 2),
(3, 500, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `Incident_ID` int(11) NOT NULL,
  `Vehicle_ID` int(11) DEFAULT NULL,
  `People_ID` int(11) DEFAULT NULL,
  `Incident_Date` date NOT NULL,
  `Incident_Report` varchar(500) NOT NULL,
  `Offence_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`Incident_ID`, `Vehicle_ID`, `People_ID`, `Incident_Date`, `Incident_Report`, `Offence_ID`) VALUES
(1, 15, 4, '2017-12-01', '40mph in a 30 limit', 1),
(2, 20, 8, '2017-11-01', 'Double parked', 4),
(3, 13, 4, '2017-09-17', '110mph on motorway', 1),
(4, 14, 2, '2017-08-22', 'Failure to stop at a red light - travelling 25mph', 8),
(5, 13, 4, '2017-10-17', 'Not wearing a seatbelt on the M1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `offence`
--

CREATE TABLE `offence` (
  `Offence_ID` int(11) NOT NULL,
  `Offence_description` varchar(50) NOT NULL,
  `Offence_maxFine` int(11) NOT NULL,
  `Offence_maxPoints` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offence`
--

INSERT INTO `offence` (`Offence_ID`, `Offence_description`, `Offence_maxFine`, `Offence_maxPoints`) VALUES
(1, 'Speeding', 1000, 3),
(2, 'Speeding on a motorway', 2500, 6),
(3, 'Seat belt offence', 500, 0),
(4, 'Illegal parking', 500, 0),
(5, 'Drink driving', 10000, 11),
(6, 'Driving without a licence', 10000, 0),
(7, 'Driving without a licence', 10000, 0),
(8, 'Traffic light offences', 1000, 3),
(9, 'Cycling on pavement', 500, 0),
(10, 'Failure to have control of vehicle', 1000, 3),
(11, 'Dangerous driving', 1000, 11),
(12, 'Careless driving', 5000, 6),
(13, 'Dangerous cycling', 2500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ownership`
--

CREATE TABLE `ownership` (
  `People_ID` int(11) NOT NULL,
  `Vehicle_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ownership`
--

INSERT INTO `ownership` (`People_ID`, `Vehicle_ID`) VALUES
(3, 12),
(8, 20),
(4, 15),
(4, 13),
(1, 16),
(2, 14),
(5, 17),
(6, 18),
(7, 21);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `People_ID` int(11) NOT NULL,
  `People_name` varchar(50) NOT NULL,
  `People_address` varchar(50) DEFAULT NULL,
  `People_licence` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`People_ID`, `People_name`, `People_address`, `People_licence`) VALUES
(1, 'James Smith', '23 Barnsdale Road, Leicester', 'SMITH92LDOFJJ829'),
(2, 'Jennifer Allen', '46 Bramcote Drive, Nottingham', 'ALLEN88K23KLR9B3'),
(3, 'John Myers', '323 Derby Road, Nottingham', 'MYERS99JDW8REWL3'),
(4, 'James Smith', '26 Devonshire Avenue, Nottingham', 'SMITHR004JFS20TR'),
(5, 'Terry Brown', '7 Clarke Rd, Nottingham', 'BROWND3PJJ39DLFG'),
(6, 'Mary Adams', '38 Thurman St, Nottingham', 'ADAMSH9O3JRHH107'),
(7, 'Neil Becker', '6 Fairfax Close, Nottingham', 'BECKE88UPR840F9R'),
(8, 'Angela Smith', '30 Avenue Road, Grantham', 'SMITH222LE9FJ5DS');

-- --------------------------------------------------------

--
-- Stand-in structure for view `peoplevehicle`
-- (See below for the actual view)
--
CREATE TABLE `peoplevehicle` (
`People_ID` int(11)
,`Vehicle_ID` int(11)
,`People_name` varchar(50)
,`People_licence` varchar(16)
,`Vehicle_type` varchar(20)
,`Vehicle_colour` varchar(20)
,`Vehicle_licence` varchar(7)
);

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`id`, `username`, `password`, `type`) VALUES
(1, 'Regan', 'plod123', 'User'),
(2, 'Carter', 'fuzz42', 'User'),
(5, 'haskins', 'copper99', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vehicle_ID` int(11) NOT NULL,
  `Vehicle_type` varchar(20) NOT NULL,
  `Vehicle_colour` varchar(20) NOT NULL,
  `Vehicle_licence` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vehicle_ID`, `Vehicle_type`, `Vehicle_colour`, `Vehicle_licence`) VALUES
(12, 'Ford Fiesta', 'Blue', 'LB15AJL'),
(13, 'Ferrari 458', 'Red', 'MY64PRE'),
(14, 'Vauxhall Astra', 'Silver', 'FD65WPQ'),
(15, 'Honda Civic', 'Green', 'FJ17AUG'),
(16, 'Toyota Prius', 'Silver', 'FP16KKE'),
(17, 'Ford Mondeo', 'Black', 'FP66KLM'),
(18, 'Ford Focus', 'White', 'DJ14SLE'),
(20, 'Nissan Pulsar', 'Red', 'NY64KWD'),
(21, 'Renault Scenic', 'Silver', 'BC16OEA');

-- --------------------------------------------------------

--
-- Structure for view `peoplevehicle`
--
DROP TABLE IF EXISTS `peoplevehicle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`peopleVehicle`@`%` SQL SECURITY DEFINER VIEW `peoplevehicle`  AS SELECT `ownership`.`People_ID` AS `People_ID`, `ownership`.`Vehicle_ID` AS `Vehicle_ID`, `people`.`People_name` AS `People_name`, `people`.`People_licence` AS `People_licence`, `vehicle`.`Vehicle_type` AS `Vehicle_type`, `vehicle`.`Vehicle_colour` AS `Vehicle_colour`, `vehicle`.`Vehicle_licence` AS `Vehicle_licence` FROM ((`ownership` join `people` on(`ownership`.`People_ID` = `people`.`People_ID`)) join `vehicle` on(`ownership`.`Vehicle_ID` = `vehicle`.`Vehicle_ID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`Fine_ID`),
  ADD KEY `Incident_ID` (`Incident_ID`);

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`Incident_ID`),
  ADD KEY `fk_incident_vehicle` (`Vehicle_ID`),
  ADD KEY `fk_incident_people` (`People_ID`),
  ADD KEY `fk_incident_offence` (`Offence_ID`);

--
-- Indexes for table `offence`
--
ALTER TABLE `offence`
  ADD PRIMARY KEY (`Offence_ID`);

--
-- Indexes for table `ownership`
--
ALTER TABLE `ownership`
  ADD KEY `fk_people` (`People_ID`),
  ADD KEY `fk_vehicle` (`Vehicle_ID`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`People_ID`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Vehicle_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `Fine_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `Incident_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `offence`
--
ALTER TABLE `offence`
  MODIFY `Offence_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `People_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `Vehicle_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fk_fines` FOREIGN KEY (`Incident_ID`) REFERENCES `incident` (`Incident_ID`);

--
-- Constraints for table `incident`
--
ALTER TABLE `incident`
  ADD CONSTRAINT `fk_incident_offence` FOREIGN KEY (`Offence_ID`) REFERENCES `offence` (`Offence_ID`),
  ADD CONSTRAINT `fk_incident_people` FOREIGN KEY (`People_ID`) REFERENCES `people` (`People_ID`),
  ADD CONSTRAINT `fk_incident_vehicle` FOREIGN KEY (`Vehicle_ID`) REFERENCES `vehicle` (`Vehicle_ID`);

--
-- Constraints for table `ownership`
--
ALTER TABLE `ownership`
  ADD CONSTRAINT `fk_person` FOREIGN KEY (`People_ID`) REFERENCES `people` (`People_ID`),
  ADD CONSTRAINT `fk_vehicle` FOREIGN KEY (`Vehicle_ID`) REFERENCES `vehicle` (`Vehicle_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
