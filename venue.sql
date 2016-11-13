--
-- Database: `venue`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `confirmation#` int(11) NOT NULL,
  `tableNum` int(11) NOT NULL,
  `branchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`confirmation#`, `tableNum`, `branchID`) VALUES
(67821390, 1, 69435),
(67821391, 12, 69435),
(67821392, 10, 89200),
(67821393, 2, 89200),
(67821394, 3, 89200);

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
(456, '1y3n1', 796325, 69435),
(345, '2r9s7', 763347, 16502),
(234, '3c4d6', 649588, 89200),
(567, '3t9p8', 236011, 11447),
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
(90638, 'Rick', 'Martinez', NULL, 'rickym@yahoo.com', NULL),
(236011, 'Michael', 'Young', 9, 'hot@hotmail.ca', NULL),
(643102, 'Alena', 'Safina', 10, 'alena@ubccs.ca', NULL),
(649588, 'Eric', 'Thompson', 7, 'nerd92@gmail.com', NULL),
(763347, 'Danya', 'Karras', 10, 'danya@ubccs.ca', NULL),
(796325, 'Diana', 'Jagodic', 10, 'diana@ubccs.ca', NULL);

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
(123, 'Zumba Night', '2016-11-11', '22:00:00', 89200, 20),
(234, 'Country Fair', '2017-04-04', '18:00:00', 89200, 6.95),
(345, 'Intergalactic Rave', '2016-12-31', '19:00:00', 16502, 34.99),
(456, 'Seashore Gala', '2017-02-14', '17:00:00', 69435, 79.95),
(567, 'Singles Fest', '2016-12-19', '20:00:00', 11447, 10);

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
  `confirmation#` int(11) NOT NULL,
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

INSERT INTO `tablereservation` (`confirmation#`, `tableNum`, `numOfGuests`, `branchID`, `cid`, `date`, `time`) VALUES
(1032158, 10, 0, 69435, 90638, '2016-12-02', '10:00:00'),
(3669852, 12, 0, 69435, 643102, '2016-11-15', '19:00:00'),
(4569873, 12, 0, 69435, 236011, '2016-12-01', '21:00:00'),
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
  `cost` double NOT NULL,
  `branchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venuehastable`
--

INSERT INTO `venuehastable` (`tableNum`, `size`, `type`, `cost`, `branchID`) VALUES
(1, 2, 'intimate', 30, 69435),
(2, 8, 'bar', 100, 89200),
(3, 10, 'regular', 50, 89200),
(10, 4, 'booth', 20, 89200),
(12, 6, 'patio', 30, 69435);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`confirmation#`);

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
  ADD PRIMARY KEY (`confirmation#`);

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
  MODIFY `evid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=568;
--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `branchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89201;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
