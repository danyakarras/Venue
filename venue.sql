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
-- Table structure for table `buysticketsfor`
--

CREATE TABLE `buysticketsfor` (
  `evid` int(11) NOT NULL,
  `ticketID` varchar(6) NOT NULL,
  `cid` int(11) NOT NULL,
  `branchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buysticketsfor`
--

INSERT INTO `buysticketsfor` (`evid`, `ticketID`, `cid`, `branchID`) VALUES
(123, '1295', 796325, 89200),
(123, '1935', 172729, 89200),
(456, '1y3n1', 796325, 69435),
(123, '2382', 172729, 89200),
(456, '2988', 172729, 69435),
(345, '2r9s7', 763347, 16502),
(345, '3675', 796325, 16502),
(234, '3c4d6', 649588, 89200),
(567, '3t9p8', 236011, 11447),
(567, '4106', 796325, 11447),
(123, '4300', 172729, 89200),
(567, '4346', 796325, 11447),
(123, '4937', 172729, 89200),
(0, '5538', 172729, 0),
(123, '5680', 172729, 89200),
(123, '6603', 796325, 89200),
(123, '6964', 796325, 89200),
(123, '7647', 172729, 89200),
(345, '7674', 796325, 16502),
(123, '8386', 172729, 89200),
(123, 'v6ty9', 643102, 89200);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `hotness` int(11) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `f_name`, `l_name`, `hotness`, `email`, `password`) VALUES
(90638, 'Rick', 'Martinez', NULL, 'rickym@yahoo.com', 'ricky'),
(172729, 'Robby', 'Dennis', NULL, 'robby@gmail.com', 'robby'),
(236011, 'Michael', 'Young', 9, 'hot@hotmail.ca', 'imhot'),
(643102, 'Alena', 'Safina', 10, 'alena@ubccs.ca', 'alena'),
(649588, 'Eric', 'Thompson', 7, 'nerd92@gmail.com', 'nerd'),
(763347, 'Danya', 'Karras', 10, 'danya@ubccs.ca', 'danya'),
(796325, 'Diana', 'Jagodic', 10, 'diana@ubccs.ca', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `entertainment`
--

CREATE TABLE `entertainment` (
  `enid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `genre` varchar(20) NOT NULL,
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
  `branchID` int(11) NOT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostedevent`
--

INSERT INTO `hostedevent` (`evid`, `name`, `date`, `start_time`, `branchID`, `price`) VALUES
(123, 'Zumba Night', '2016-11-16', '22:00:00', 89200, 20),
(143, 'Crazy Train', '2016-11-29', '19:00:00', 89200, 25.65),
(345, 'Intergalactic Rave', '2016-12-31', '19:00:00', 16502, 34.99),
(456, 'Seashore Gala', '2017-02-14', '17:00:00', 69435, 79.95),
(567, 'Singles Fest', '2016-12-19', '20:00:00', 11447, 10),
(775, 'Bones', '2016-11-25', '19:00:00', 61359, 54.95),
(777, 'Superhero Night', '2016-11-30', '18:00:00', 69435, 24.99);

-- --------------------------------------------------------

--
-- Table structure for table `playsat`
--

CREATE TABLE `playsat` (
  `evid` int(11) NOT NULL,
  `enid` int(11) NOT NULL,
  `branchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playsat`
--

INSERT INTO `playsat` (`evid`, `enid`, `branchID`) VALUES
(123, 44, 89200),
(234, 33, 89200),
(345, 22, 16502),
(456, 55, 69435),
(567, 11, 11447);

-- --------------------------------------------------------

--
-- Table structure for table `staffemployed`
--

CREATE TABLE `staffemployed` (
  `sid` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `branchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffemployed`
--

INSERT INTO `staffemployed` (`sid`, `f_name`, `l_name`, `branchID`) VALUES
(123456, 'Joanna', 'White', 69435),
(234567, 'Jenny', 'Lam', 89200),
(345678, 'Priya', 'Kapoor', 61359),
(456789, 'Leonard', 'Roberts', 16502),
(567890, 'Jackson', 'Jonson', 11447),
(678901, 'Bob', 'Dibbles', 69435),
(789012, 'Donald', 'Drumph', 89200);

-- --------------------------------------------------------

--
-- Table structure for table `tablereservation`
--

CREATE TABLE `tablereservation` (
  `confirmationNum` int(11) NOT NULL,
  `tableNum` int(11) NOT NULL,
  `numOfGuests` int(11) NOT NULL,
  `branchID` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablereservation`
--

INSERT INTO `tablereservation` (`confirmationNum`, `tableNum`, `numOfGuests`, `branchID`, `cid`, `date`, `time`) VALUES
(1032158, 10, 0, 69435, 90638, '2016-12-02', '10:00:00'),
(1454834, 3, 1, 89200, 172729, '2016-11-16', '22:00:00'),
(1722900, 10, 3, 89200, 172729, '2016-11-11', '22:00:00'),
(2365222, 12, 10, 69435, 649588, '2016-11-15', '19:00:00'),
(3486572, 12, 5, 69435, 796325, '2016-11-22', '11:00:00'),
(3669852, 12, 116, 69435, 643102, '2016-11-15', '19:00:00'),
(4008301, 1, 3, 69435, 796325, '2016-11-16', '09:00:00'),
(4569873, 12, 0, 69435, 236011, '2016-12-01', '21:00:00'),
(5756592, 2, 1, 89200, 172729, '2016-11-11', '22:00:00'),
(6086914, 3, 3, 89200, 172729, '2016-11-11', '22:00:00'),
(6099854, 3, 1, 89200, 172729, '2016-11-16', '22:00:00'),
(6107422, 2, 1, 89200, 172729, '2016-11-11', '22:00:00'),
(7362134, 10, 0, 89200, 643102, '2016-12-31', '22:00:00'),
(9730154, 3, 0, 89200, 796325, '2016-12-24', '20:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tableserved`
--

CREATE TABLE `tableserved` (
  `tableNum` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `branchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableserved`
--

INSERT INTO `tableserved` (`tableNum`, `sid`, `branchID`) VALUES
(1, 123456, 69435),
(2, 234567, 89200),
(3, 234567, 89200),
(10, 234567, 89200),
(12, 123456, 69435);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `branchID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `cover_charge` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`branchID`, `name`, `address`, `capacity`, `cover_charge`) VALUES
(11447, 'TGIF', '666 University Blvd', 100, 12),
(16502, 'Fortune', '123 Davie St', 250, 10),
(61359, 'Stargazer', '310 Hamilton St', 200, 10),
(69435, 'Blue Lagoon', '10 Water St', 500, 15),
(89200, 'Thrills', '980 Commercial Drive', 300, 8);

-- --------------------------------------------------------

--
-- Table structure for table `venuehastable`
--

CREATE TABLE `venuehastable` (
  `tableNum` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `numOfTableType` int(11) NOT NULL,
  `cost` double NOT NULL,
  `branchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venuehastable`
--

INSERT INTO `venuehastable` (`tableNum`, `size`, `type`, `numOfTableType`, `cost`, `branchID`) VALUES
(1, 2, 'intimate', 10, 30, 69435),
(2, 8, 'bar', 5, 100, 89200),
(3, 10, 'regular', 15, 50, 89200),
(4, 8, 'booth', 10, 20, 69435),
(5, 1, 'bar', 30, 5, 69435),
(6, 4, 'regular', 20, 9.95, 61359),
(7, 1, 'bar', 32, 6, 61359),
(8, 2, 'intimate', 15, 14.95, 61359),
(9, 5, 'booth', 9, 24.99, 61359),
(10, 4, 'booth', 8, 20, 89200),
(11, 2, 'intimate', 17, 16.95, 89200),
(12, 6, 'patio', 20, 30, 69435),
(13, 6, 'patio', 8, 11.95, 61359),
(14, 5, 'patio', 9, 7.99, 16502),
(15, 4, 'regular', 20, 4.99, 16502),
(16, 2, 'intimate', 8, 9.99, 16502),
(17, 1, 'bar', 26, 3, 16502),
(18, 4, 'regular', 20, 4.99, 11447),
(19, 1, 'bar', 60, 2.95, 11447);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buysticketsfor`
--
ALTER TABLE `buysticketsfor`
  ADD PRIMARY KEY (`ticketID`);

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
  ADD PRIMARY KEY (`evid`);

--
-- Indexes for table `staffemployed`
--
ALTER TABLE `staffemployed`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tablereservation`
--
ALTER TABLE `tablereservation`
  ADD PRIMARY KEY (`confirmationNum`);

--
-- Indexes for table `tableserved`
--
ALTER TABLE `tableserved`
  ADD PRIMARY KEY (`tableNum`);

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
  ADD PRIMARY KEY (`tableNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entertainment`
--
ALTER TABLE `entertainment`
  MODIFY `enid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `hostedevent`
--
ALTER TABLE `hostedevent`
  MODIFY `evid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=870;
--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `branchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89201;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;