--
-- Database: `venue`
--
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
-- --------------------------------------------------------
--
-- Database: `venue`
--

-- --------------------------------------------------------

--
-- Table structure for table `buysticketsfor`
--

CREATE TABLE `buysticketsfor` (
  `ticketID` int(11) NOT NULL,
  `branchID` int(11) DEFAULT NULL,
  `evid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buysticketsfor`
--

INSERT INTO `buysticketsfor` (`ticketID`, `branchID`, `evid`, `cid`) VALUES
(1037, 16502, 345, 796325),
(1073, 69435, 456, 906380),
(1254, 89200, 143, 796325),
(1295, 89200, 123, 796325),
(1640, 16502, 345, 763347),
(1742, 16502, 345, 796325),
(1935, 89200, 123, 172729),
(2027, 11447, 777, 796325),
(2382, 89200, 123, 172729),
(2534, 69435, 775, 796325),
(3273, 89200, 143, 796325),
(3544, 69435, 775, 796325),
(3728, 69435, 456, 763347),
(3741, 89200, 123, 763347),
(4325, 69435, 775, 763347),
(4588, 11447, 777, 796325),
(5063, 89200, 123, 763347),
(5293, 11447, 777, 763347),
(6094, 89200, 143, 796325),
(6746, 11447, 777, 763347),
(6862, 16502, 345, 796325),
(7276, 69435, 775, 796325),
(7405, 11447, 777, 763347),
(7647, 89200, 123, 172729),
(7655, 16502, 345, 906380),
(7765, 69435, 456, 763347),
(8386, 89200, 123, 172729),
(8913, 16502, 345, 796325);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `hotness` int(11) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `f_name`, `l_name`, `hotness`, `email`, `password`) VALUES
(172729, 'Robby', 'Dennis', NULL, 'robby@gmail.com', 'robby'),
(236011, 'Michael', 'Young', 9, 'hot@hotmail.ca', 'imhot'),
(643102, 'Alena', 'Safina', 10, 'alena@ubccs.ca', 'alena'),
(649588, 'Eric', 'Thompson', 7, 'nerd92@gmail.com', 'eric'),
(763347, 'Danya', 'Karras', 10, 'danya@ubccs.ca', 'danya'),
(796325, 'Diana', 'Jagodic', 10, 'diana@ubccs.ca', 'diana'),
(906380, 'Rick', 'Martinez', NULL, 'rickym@yahoo.com', 'ricky');

-- --------------------------------------------------------

--
-- Table structure for table `entertainment`
--

CREATE TABLE `entertainment` (
  `enid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `genre` varchar(20) DEFAULT NULL,
  `cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entertainment`
--

INSERT INTO `entertainment` (`enid`, `name`, `genre`, `cost`) VALUES
(11, 'Lordi', 'rock', 3500),
(22, 'Space Girls', 'pop', 10000),
(33, 'Truck Boiz', 'country', 10),
(44, 'Skrillerz', 'trap', 6000),
(55, 'Pentatonix', 'acapella', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `hostedevent`
--

CREATE TABLE `hostedevent` (
  `evid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `branchID` int(11) DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostedevent`
--

INSERT INTO `hostedevent` (`evid`, `name`, `date`, `start_time`, `branchID`, `price`) VALUES
(123, 'Zumba Night', '2016-11-16', '22:00:00', 89200, 20),
(143, 'Crazy Train', '2016-11-29', '19:00:00', 89200, 25.65),
(345, 'Intergalactic Rave', '2016-12-31', '19:00:00', 16502, 34.99),
(456, 'Seashore Gala', '2017-02-14', '17:00:00', 69435, 79.95),
(775, 'Bones', '2016-11-25', '19:00:00', 69435, 54.95),
(777, 'Superhero Night', '2016-11-30', '18:00:00', 11447, 24.99);

-- --------------------------------------------------------

--
-- Table structure for table `playsat`
--

CREATE TABLE `playsat` (
  `evid` int(11) DEFAULT NULL,
  `enid` int(11) DEFAULT NULL,
  `branchID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playsat`
--

INSERT INTO `playsat` (`evid`, `enid`, `branchID`) VALUES
(456, 55, 69435),
(143, 33, 89200),
(345, 22, 16502),
(775, 55, 69435),
(777, 11, 11447),
(123, 44, 89200);

-- --------------------------------------------------------

--
-- Table structure for table `staffemployed`
--

CREATE TABLE `staffemployed` (
  `sid` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `branchID` int(11) DEFAULT NULL,
  `manager` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffemployed`
--

INSERT INTO `staffemployed` (`sid`, `f_name`, `l_name`, `branchID`, `manager`) VALUES
(123456, 'Joanna', 'White', 69435, 1),
(234567, 'Jenny', 'Lam', 89200, 1),
(345678, 'Priya', 'Kapoor', 61359, 1),
(456789, 'Leonard', 'Roberts', 16502, 1),
(567890, 'Jackson', 'Jonson', 11447, 1),
(678901, 'Bob', 'Dibbles', 69435, 0),
(789012, 'Donald', 'Drumph', 89200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tablereservation`
--

CREATE TABLE `tablereservation` (
  `confirmationNum` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `numOfGuests` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `tableNum` int(11) DEFAULT NULL,
  `branchID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablereservation`
--

INSERT INTO `tablereservation` (`confirmationNum`, `date`, `time`, `numOfGuests`, `cid`, `tableNum`, `branchID`) VALUES
(1202148, '2017-02-14', '17:00:00', 1, 906380, 1, 69435),
(2315673, '2016-12-03', '09:00:00', 1, 796325, 6, 61359),
(3436523, '2016-11-20', '09:00:00', 1, 763347, 2, 89200),
(5502686, '2016-11-16', '22:00:00', 1, 763347, 2, 89200),
(6618897, '2017-02-14', '17:00:00', 1, 763347, 1, 69435),
(6762207, '2016-12-04', '09:00:00', 1, 763347, 1, 69435),
(6767334, '2016-11-29', '19:00:00', 4, 796325, 10, 89200),
(8314698, '2016-12-02', '09:00:00', 1, 796325, 20, 60042),
(8930909, '2016-11-25', '19:00:00', 9, 796325, 12, 69435);

-- --------------------------------------------------------

--
-- Table structure for table `tableserved`
--

CREATE TABLE `tableserved` (
  `tableNum` int(11) NOT NULL,
  `branchID` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableserved`
--

INSERT INTO `tableserved` (`tableNum`, `branchID`, `sid`) VALUES
(1, 69435, 123456),
(2, 89200, 234567),
(3, 89200, 234567),
(10, 89200, 234567),
(12, 69435, 123456);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `branchID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(64) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `cover_charge` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`branchID`, `name`, `address`, `capacity`, `cover_charge`) VALUES
(11447, 'TGIF', '6371 Crescent Rd, Vancouver, BC, Canada', 100, 12),
(16502, 'Fortune', '1022 Davie St, Vancouver, BC, Canada', 250, 10),
(60042, 'Fuck Yeah', '750 Pacific Blvd Vancouver, BC, Canada', 200, 5),
(61359, 'Stargazer', '881 Granville St, Vancouver, BC, Canada', 200, 10),
(69435, 'Blue Lagoon', '350 Water St, Vancouver, BC, Canada', 500, 15),
(89200, 'Thrills', '2010 W 4th Ave Vancouver, BC, Canada', 300, 8),
(99019, 'TEST', 'TEST', 7000, 70),
(99620, 'TEST 2', 'TEST 2', 8000, 80);

--
-- Triggers `venue`
--
DELIMITER $$
CREATE TRIGGER `addtablestovenue` AFTER INSERT ON `venue` FOR EACH ROW BEGIN 
                INSERT INTO `venuehastable` VALUES ('', 2, 10, 'intimate', 12.95, 99019), ('', 1, 30, 'bar', 3.95, 99019), ('', 6, 15, 'regular', 7.99, 99019);
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `venuehastable`
--

CREATE TABLE `venuehastable` (
  `tableNum` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `numOfTableType` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `cost` double NOT NULL,
  `branchID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venuehastable`
--

INSERT INTO `venuehastable` (`tableNum`, `size`, `numOfTableType`, `type`, `cost`, `branchID`) VALUES
(1, 2, 10, 'intimate', 30, 69435),
(2, 8, 5, 'bar', 100, 89200),
(3, 10, 15, 'regular', 50, 89200),
(4, 8, 10, 'booth', 20, 69435),
(5, 1, 30, 'bar', 5, 69435),
(6, 4, 20, 'regular', 9.95, 61359),
(7, 1, 32, 'bar', 6, 61359),
(8, 2, 15, 'intimate', 14.95, 61359),
(9, 5, 9, 'booth', 24.99, 61359),
(10, 4, 8, 'booth', 20, 89200),
(11, 2, 17, 'intimate', 16.95, 89200),
(12, 6, 20, 'patio', 30, 69435),
(13, 6, 8, 'patio', 11.95, 61359),
(14, 5, 9, 'patio', 7.99, 16502),
(15, 4, 20, 'regular', 4.99, 16502),
(16, 2, 8, 'intimate', 9.99, 16502),
(17, 1, 26, 'bar', 3, 16502),
(18, 2, 12, 'intimate', 5.99, 11447),
(19, 10, 30, 'regular', 6.99, 11447),
(20, 5, 50, 'regular', 3, 60042),
(24, 2, 10, 'intimate', 12.95, 99019),
(25, 1, 30, 'bar', 3.95, 99019),
(26, 6, 15, 'regular', 7.99, 99019),
(27, 2, 10, 'intimate', 12.95, 99019),
(28, 1, 30, 'bar', 3.95, 99019),
(29, 6, 15, 'regular', 7.99, 99019);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buysticketsfor`
--
ALTER TABLE `buysticketsfor`
  ADD PRIMARY KEY (`ticketID`),
  ADD KEY `buysticketsfor_ibfk_1` (`branchID`),
  ADD KEY `buysticketsfor_ibfk_2` (`evid`),
  ADD KEY `buysticketsfor_ibfk_3` (`cid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `entertainment`
--
ALTER TABLE `entertainment`
  ADD PRIMARY KEY (`enid`);

--
-- Indexes for table `hostedevent`
--
ALTER TABLE `hostedevent`
  ADD PRIMARY KEY (`evid`),
  ADD KEY `hostedevent_ibfk_1` (`branchID`);

--
-- Indexes for table `playsat`
--
ALTER TABLE `playsat`
  ADD KEY `playsat_ibfk_1` (`evid`),
  ADD KEY `playsat_ibfk_2` (`enid`),
  ADD KEY `playsat_ibfk_3` (`branchID`);

--
-- Indexes for table `staffemployed`
--
ALTER TABLE `staffemployed`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `staffemployed_ibfk_1` (`branchID`);

--
-- Indexes for table `tablereservation`
--
ALTER TABLE `tablereservation`
  ADD PRIMARY KEY (`confirmationNum`),
  ADD KEY `tablereservation_ibfk_1` (`cid`),
  ADD KEY `tablereservation_ibfk_3` (`branchID`),
  ADD KEY `tablereservation_ibfk_2` (`tableNum`);

--
-- Indexes for table `tableserved`
--
ALTER TABLE `tableserved`
  ADD PRIMARY KEY (`tableNum`),
  ADD KEY `tableserved_ibfk_1` (`branchID`),
  ADD KEY `tableserved_ibfk_2` (`sid`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`branchID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `venuehastable`
--
ALTER TABLE `venuehastable`
  ADD PRIMARY KEY (`tableNum`),
  ADD KEY `venuehastable_ibfk_1` (`branchID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `venuehastable`
--
ALTER TABLE `venuehastable`
  MODIFY `tableNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buysticketsfor`
--
ALTER TABLE `buysticketsfor`
  ADD CONSTRAINT `buysticketsfor_ibfk_1` FOREIGN KEY (`branchID`) REFERENCES `venue` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buysticketsfor_ibfk_2` FOREIGN KEY (`evid`) REFERENCES `hostedevent` (`evid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buysticketsfor_ibfk_3` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostedevent`
--
ALTER TABLE `hostedevent`
  ADD CONSTRAINT `hostedevent_ibfk_1` FOREIGN KEY (`branchID`) REFERENCES `venue` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playsat`
--
ALTER TABLE `playsat`
  ADD CONSTRAINT `playsat_ibfk_1` FOREIGN KEY (`evid`) REFERENCES `hostedevent` (`evid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playsat_ibfk_2` FOREIGN KEY (`enid`) REFERENCES `entertainment` (`enid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `playsat_ibfk_3` FOREIGN KEY (`branchID`) REFERENCES `venue` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staffemployed`
--
ALTER TABLE `staffemployed`
  ADD CONSTRAINT `staffemployed_ibfk_1` FOREIGN KEY (`branchID`) REFERENCES `venue` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tablereservation`
--
ALTER TABLE `tablereservation`
  ADD CONSTRAINT `tablereservation_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tablereservation_ibfk_2` FOREIGN KEY (`tableNum`) REFERENCES `venuehastable` (`tableNum`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tablereservation_ibfk_3` FOREIGN KEY (`branchID`) REFERENCES `venue` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tableserved`
--
ALTER TABLE `tableserved`
  ADD CONSTRAINT `tableserved_ibfk_1` FOREIGN KEY (`branchID`) REFERENCES `venue` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tableserved_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `staffemployed` (`sid`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
