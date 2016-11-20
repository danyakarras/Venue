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
(1295, 89200, 123, 796325),
(1935, 89200, 123, 172729),
(2382, 89200, 123, 172729),
(6862, 16502, 345, 796325),
(7647, 89200, 123, 172729),
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
  `branchID` int(11) DEFAULT NULL
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
(1454834, '2016-11-16', '22:00:00', 1, 172729, 3, 89200),
(1722900, '2016-11-11', '22:00:00', 3, 172729, 10, 89200),
(2365222, '2016-11-15', '19:00:00', 10, 649588, 12, 69435),
(3486572, '2016-11-22', '11:00:00', 5, 796325, 12, 69435),
(3669852, '2016-11-15', '19:00:00', 116, 643102, 12, 69435),
(4008301, '2016-11-16', '09:00:00', 3, 796325, 1, 69435),
(4569873, '2016-12-01', '21:00:00', 0, 236011, 12, 69435),
(5756592, '2016-11-11', '22:00:00', 1, 172729, 2, 89200),
(6086914, '2016-11-11', '22:00:00', 3, 172729, 3, 89200),
(6099854, '2016-11-16', '22:00:00', 1, 172729, 3, 89200),
(6107422, '2016-11-11', '22:00:00', 1, 172729, 2, 89200),
(7362134, '2016-12-31', '22:00:00', 0, 643102, 10, 89200),
(9730154, '2016-12-24', '20:30:00', 0, 796325, 3, 89200);

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
  `address` varchar(20) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `cover_charge` double DEFAULT NULL
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
(17, 1, 26, 'bar', 3, 16502);

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
  ADD KEY `tablereservation_ibfk_2` (`tableNum`),
  ADD KEY `tablereservation_ibfk_3` (`branchID`);

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
  ADD CONSTRAINT `tablereservation_ibfk_2` FOREIGN KEY (`tableNum`) REFERENCES `tableserved` (`tableNum`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tablereservation_ibfk_3` FOREIGN KEY (`branchID`) REFERENCES `venue` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tableserved`
--
ALTER TABLE `tableserved`
  ADD CONSTRAINT `tableserved_ibfk_1` FOREIGN KEY (`branchID`) REFERENCES `venue` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tableserved_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `staffemployed` (`sid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `venuehastable`
--
ALTER TABLE `venuehastable`
  ADD CONSTRAINT `venuehastable_ibfk_1` FOREIGN KEY (`branchID`) REFERENCES `venue` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
