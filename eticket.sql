-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2015 at 06:35 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigncounter`
--

CREATE TABLE IF NOT EXISTS `assigncounter` (
  `userid` int(16) NOT NULL,
  `counterid` int(16) NOT NULL,
  `contact_info` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigncounter`
--

INSERT INTO `assigncounter` (`userid`, `counterid`, `contact_info`) VALUES
(1, 2, 0),
(1, 3, 1936789765),
(1, 4, 1936789765),
(1, 6, 1936789765),
(3, 3, 1936789765),
(3, 5, 1938151756),
(4, 3, 1936789765);

-- --------------------------------------------------------

--
-- Table structure for table `assignseats`
--

CREATE TABLE IF NOT EXISTS `assignseats` (
  `counterid` int(11) NOT NULL,
  `departure_configid` int(12) NOT NULL,
  `seatid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignseats`
--

INSERT INTO `assignseats` (`counterid`, `departure_configid`, `seatid`) VALUES
(3, 1, 1),
(4, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
`id` int(11) NOT NULL,
  `name` varchar(14) NOT NULL,
  `bus_no` int(21) NOT NULL,
  `bus_type` varchar(7) NOT NULL,
  `brand` varchar(11) NOT NULL,
  `other_info` varchar(21) NOT NULL,
  `seat` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `name`, `bus_no`, `bus_type`, `brand`, `other_info`, `seat`) VALUES
(1, 'Baghdadhs', 11, 'AC', 'Marcidise', 'luxaroius nice car', 40),
(3, 'Green Line', 4, 'AC', 'HTP-Hoter', 'luxaroius nice car', 42),
(4, 'Narail Express', 13, 'AC', 'Marcidise', 'luxaroius nice car', 44),
(5, 'Tisha--11', 0, 'Select', 'Marcidies', 'nice car', 48),
(6, 'Matlab Express', 0, 'AC', 'Marcidies', 'nice car Luxurious  ', 50),
(7, 'Padda Express', 1119, 'AC', 'Marcidies', 'nice car Luxurious  ', 60);

-- --------------------------------------------------------

--
-- Table structure for table `busseats`
--

CREATE TABLE IF NOT EXISTS `busseats` (
`id` int(12) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `busseats`
--

INSERT INTO `busseats` (`id`, `name`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(10, 'B1'),
(11, 'B2'),
(12, 'B3'),
(5, 'B4'),
(6, 'C1'),
(7, 'C2'),
(8, 'C3'),
(9, 'C4'),
(13, 'D1'),
(14, 'D2'),
(15, 'D3'),
(16, 'D4'),
(17, 'E1'),
(18, 'E2'),
(19, 'E3'),
(20, 'E4'),
(21, 'F1'),
(22, 'F2'),
(23, 'F3'),
(24, 'F4'),
(25, 'G1'),
(26, 'G2'),
(27, 'G3'),
(28, 'G4'),
(29, 'H1'),
(30, 'H2'),
(31, 'H3'),
(32, 'H4'),
(33, 'I1'),
(34, 'I2'),
(35, 'I3'),
(36, 'I4'),
(37, 'J1'),
(38, 'J2'),
(39, 'J3'),
(40, 'J4'),
(41, 'K1'),
(42, 'K2'),
(43, 'K3'),
(44, 'K4'),
(49, 'L1'),
(50, 'L2'),
(51, 'L3'),
(52, 'L4'),
(53, 'M1'),
(54, 'M2'),
(55, 'M3'),
(56, 'M4'),
(57, 'N1'),
(58, 'N2'),
(59, 'N3'),
(60, 'N4'),
(61, 'O1'),
(62, 'O2'),
(63, 'O3'),
(64, 'O4'),
(65, 'P1'),
(66, 'P2'),
(67, 'P3'),
(68, 'P4'),
(69, 'Q1');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
`id` int(111) NOT NULL,
  `name` varchar(56) NOT NULL,
  `address` varchar(46) NOT NULL,
  `telephone_contact` varchar(11) NOT NULL,
  `status` varchar(43) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `name`, `address`, `telephone_contact`, `status`) VALUES
(1, 'Panthopath C', 'Dhaka,Dhanmondi Bangl', '01818234567', 'Branch Counter11'),
(2, 'Jatrabari', 'Jatrabari ,Demra Dhaka,Bangladesh', '0193567890', 'Bra'),
(3, 'Chittagong111', 'Chittagong,Bangladesh', '01819156489', 'Branch Counter'),
(4, 'Comilla Sada', 'Comilla Bangladesh', '0193567890', 'Branch Counter'),
(5, 'Khulna Sadar', 'Khulna Panir tank', '01818234567', 'Branch Counter'),
(6, 'Motijheel', 'Dhaka,Bangladesh', '01818234567', 'Branch Counter'),
(7, 'Daudkandi', 'Comilla Bangladesh', '01818234567', 'Branch Counter');

-- --------------------------------------------------------

--
-- Table structure for table `departure_config`
--

CREATE TABLE IF NOT EXISTS `departure_config` (
`id` int(12) NOT NULL,
  `busid` int(11) NOT NULL,
  `coachno` varchar(24) CHARACTER SET utf8 NOT NULL,
  `station_from` int(11) NOT NULL,
  `station_to` int(12) NOT NULL,
  `bus_fare` int(21) NOT NULL,
  `via_counters_array` varchar(200) NOT NULL,
  `vialocation` varchar(100) NOT NULL,
  `journey_type` varchar(10) NOT NULL,
  `start_time` varchar(11) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `startdate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departure_config`
--

INSERT INTO `departure_config` (`id`, `busid`, `coachno`, `station_from`, `station_to`, `bus_fare`, `via_counters_array`, `vialocation`, `journey_type`, `start_time`, `end_time`, `startdate`) VALUES
(1, 3, '121', 7, 6, 0, '3', 'Daudkandi', 'NonSpecial', '1.00AM', '4.00PM', '0000-00-00'),
(2, 4, '4', 8, 5, 0, '', 'Daudkandi', 'S', '8:00AM', '4.00PM', '0000-00-00'),
(3, 3, '41', 5, 4, 0, '5', 'Comilla', 'NonSpecial', '1.00AM', '4.00PM', '0000-00-00'),
(4, 4, '33', 4, 7, 0, '', 'Daudkandi', 'S', '8:00AM', '1.00AM', '0000-00-00'),
(5, 3, '44', 11, 5, 0, '', 'Comilla', 'NS', '10.24AM', '4.00PM', '0000-00-00'),
(6, 4, '33', 6, 5, 0, '', 'Kustia', 'Special', '10.24AM', '4.00PM', '0000-00-00'),
(8, 3, '36', 4, 5, 0, '', '', 'Special', '10.24AM', '4.00PM', '0000-00-00'),
(13, 3, 'A4-5611111', 6, 7, 0, '', 'Kustia', 'NonSpecial', '10.24AM', '4.00PM', '0000-00-00'),
(14, 4, 'A4-5611111111', 3, 8, 0, '', 'Daudkandi', 'Special', '10.24PM', '4.00PM', '2015-03-25'),
(15, 3, 'f11111', 4, 8, 0, '', 'Kustia', 'NonSpecial', '10.24PM', '4.00PM', '2015-03-26'),
(16, 4, 'fa11111', 4, 3, 0, '6', 'Kustia', '', '8:00AM', '4:00PM', '2015-03-30'),
(17, 3, 'SsL-11', 3, 3, 0, '5', 'Dhaka', 'NonSpecial', '11.00AM', '4.00PM', '2015-03-10'),
(18, 3, 'C-004', 5, 4, 0, '4', 'Daudkandi', 'Special', '11.00AM', '4.00PM', '2015-03-30'),
(19, 3, 'AASA-11111', 12, 5, 0, '4', 'Daudkandi', 'Special', '11.00AM', '4.00PM', '2015-03-31'),
(20, 4, 'C-004111', 13, 14, 0, '4', 'Daudkandi', 'Special', '11.00AM', '4.00PM', '2015-03-23'),
(21, 5, 'AR-333', 4, 7, 0, '5', 'Daudkandi', 'Special', '11.00AM', '4.00PM', '2015-03-31'),
(22, 5, 'AWE-11', 4, 5, 0, '5', 'Daudkandi', '', '1.00AM', '4.00PM', '2015-03-26'),
(23, 5, 'AASA-112', 8, 7, 0, '2', 'Daudkandi', 'Special', '11.00AM', '4.00PM', '2015-03-31'),
(24, 4, 'Shakib111', 1, 3, 700, '5', 'Daudkandi', 'Special', '11.00AM', '4.00PM', '2015-04-02'),
(25, 5, 'AR-543', 13, 14, 888, '5', 'Daudkandi', 'Special', '11.00AM', '4.00PM', '2015-04-04'),
(26, 6, 'A11-12', 13, 5, 980, '7', 'Daudkandi', 'Special', '11.00AM', '4.00PM', '2015-04-16'),
(27, 7, 'A444-11', 5, 15, 650, '7', 'Comilla', 'Special', '11.00AM', '4.00PM', '2015-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
`id` int(12) NOT NULL,
  `name` varchar(12) NOT NULL,
  `email` varchar(43) NOT NULL,
  `gender` varchar(4) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `payment_type` varchar(19) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `name`, `email`, `gender`, `mobile`, `payment_type`) VALUES
(1, 'Evans', 'farhadevan@gmail.com', 'm', '01938161058', 'bkash'),
(3, '', 'farhadss@gmail.com', 'Male', '01818853446', ''),
(4, '', 'fakhrul@gmail.com', 'Male', '1234567890', ''),
(5, 'Evan', 'email.com', 'Male', '1234', ''),
(11, 'askldjf', 'alskdjf', 'Male', '5678', ''),
(21, 'aslkdjf', 'lkjdkfj', 'Male', 'skadf', ''),
(22, 'Tofayel', 'ttttttt@gmail.com', 'Male', '0192345678', ''),
(23, 'err', 'errrrr', 'Fema', '01346', ''),
(24, 'NurMohammad', 'nur@gmail.com', 'Male', '01835656668', ''),
(25, 'Evanhhh', 'yujkjhjj', 'Male', '2345678', ''),
(26, 'Zakariya', 'zakaria@gmail.com', 'Male', '01836677279', '');

-- --------------------------------------------------------

--
-- Table structure for table `seatbooking`
--

CREATE TABLE IF NOT EXISTS `seatbooking` (
`id` int(11) NOT NULL,
  `departure_config_id` int(11) NOT NULL,
  `seats_array` varchar(200) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `confirmed_by` int(11) NOT NULL,
  `confirmation_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seatbooking`
--

INSERT INTO `seatbooking` (`id`, `departure_config_id`, `seats_array`, `passenger_id`, `confirmed_by`, `confirmation_status`) VALUES
(6, 25, 'H4,G3,', 11, 0, 0),
(7, 25, 'A3,C4,D4,E3,', 5, 0, 0),
(8, 25, 'G4,H2,', 21, 0, 0),
(9, 24, 'A2,B2,C2,', 22, 0, 0),
(10, 24, 'D2,E2,', 23, 0, 0),
(11, 26, 'A1,A2,B2,', 24, 0, 0),
(12, 26, 'F2,G2,', 25, 0, 0),
(13, 27, 'A1,A2,A3,A4,', 26, 0, 0),
(14, 27, 'B1,C1,', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
`id` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `description` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`id`, `name`, `description`) VALUES
(1, ' Jatrabari', '1st Area'),
(2, 'Jatrabari', 'Dhaka,Bangladesh'),
(3, 'MeghPara Chi', 'Chittagong'),
(4, 'Comilla Mounamuti', 'Comilla'),
(5, 'Motijheel,Dhaka', 'Dhaka,Bangladesh'),
(6, 'Jossore New Market Moor', 'Jossore'),
(7, 'Chandina', 'Comilla,Chandina'),
(8, 'Kotuoli Thana', 'Comilla,Kutooali'),
(9, 'Feni', 'Chittagong, Feni'),
(10, 'Noahkhali', 'Noahkhali ,Sadar'),
(11, 'Sadar Comilla', 'Near Mounamuti'),
(12, 'Eliatgong', 'Daudkandi '),
(13, 'Nayair--111', 'Daudkandi Comilla'),
(14, 'Golisrtan', 'Dhaka Bangladesh'),
(15, 'KalibariChandpur', 'Chandpur Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`Id` int(12) NOT NULL,
  `FullName` varchar(16) NOT NULL,
  `Email` varchar(21) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `Info` varchar(21) DEFAULT NULL,
  `UserType` varchar(4) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `FullName`, `Email`, `Password`, `Info`, `UserType`, `RegDate`) VALUES
(1, 'Farhad Evan11', 'farhad@gmail.coms', '12', 'Dhaka, Bangladesh', 'Sele', '2015-02-08 09:05:54'),
(2, 'Joy Ahmed', 'admin@gmail.com', '12', 'Dhaka', 'co', '2015-01-16 16:26:01'),
(3, 'Sajib', 'sajib@gmail.com', '12', 'Chittagong', 'co', '2015-01-19 18:37:10'),
(4, 'Sabuj', 'sabuj@gmail.com', '12', 'Khulna', 'co', '2015-01-19 18:37:50'),
(5, 'Farhad Hossain11', 'hossain@gmail.com', '11111', 'Dhaka11', 'oper', '2015-02-08 09:06:12'),
(6, 'Sakib', 'sakib@gmail.com', '12', 'Dhaka, Bangladesh', 'co', '2015-01-20 08:25:46'),
(7, 'Kaushik Sarkar', 'kaushik@gmail.com', '12', 'Chittagong', 'Sele', '2015-02-08 09:06:24'),
(8, 'Ashik Ahmed', 'ashik@gmail.com', '12', 'Comilla', 'sa', '2015-02-08 07:34:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigncounter`
--
ALTER TABLE `assigncounter`
 ADD PRIMARY KEY (`userid`,`counterid`), ADD KEY `counterid` (`counterid`);

--
-- Indexes for table `assignseats`
--
ALTER TABLE `assignseats`
 ADD PRIMARY KEY (`counterid`,`departure_configid`,`seatid`), ADD KEY `departure_configid` (`departure_configid`), ADD KEY `seatid` (`seatid`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `busseats`
--
ALTER TABLE `busseats`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `seatname` (`name`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departure_config`
--
ALTER TABLE `departure_config`
 ADD PRIMARY KEY (`id`), ADD KEY `busid` (`busid`), ADD KEY `station_from` (`station_from`), ADD KEY `station_to` (`station_to`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `seatbooking`
--
ALTER TABLE `seatbooking`
 ADD PRIMARY KEY (`id`), ADD KEY `departure_config_id` (`departure_config_id`), ADD KEY `confirmed_by` (`confirmed_by`), ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`Id`), ADD UNIQUE KEY `email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `busseats`
--
ALTER TABLE `busseats`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
MODIFY `id` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `departure_config`
--
ALTER TABLE `departure_config`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `seatbooking`
--
ALTER TABLE `seatbooking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigncounter`
--
ALTER TABLE `assigncounter`
ADD CONSTRAINT `assigncounter_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `assigncounter_ibfk_2` FOREIGN KEY (`counterid`) REFERENCES `counter` (`id`);

--
-- Constraints for table `assignseats`
--
ALTER TABLE `assignseats`
ADD CONSTRAINT `assignseats_ibfk_1` FOREIGN KEY (`counterid`) REFERENCES `counter` (`id`),
ADD CONSTRAINT `assignseats_ibfk_2` FOREIGN KEY (`departure_configid`) REFERENCES `departure_config` (`id`),
ADD CONSTRAINT `assignseats_ibfk_3` FOREIGN KEY (`seatid`) REFERENCES `busseats` (`id`);

--
-- Constraints for table `departure_config`
--
ALTER TABLE `departure_config`
ADD CONSTRAINT `departure_config_ibfk_1` FOREIGN KEY (`busid`) REFERENCES `bus` (`id`),
ADD CONSTRAINT `departure_config_ibfk_2` FOREIGN KEY (`station_from`) REFERENCES `station` (`id`),
ADD CONSTRAINT `departure_config_ibfk_3` FOREIGN KEY (`station_to`) REFERENCES `station` (`id`);

--
-- Constraints for table `seatbooking`
--
ALTER TABLE `seatbooking`
ADD CONSTRAINT `seatbooking_ibfk_1` FOREIGN KEY (`departure_config_id`) REFERENCES `departure_config` (`id`),
ADD CONSTRAINT `seatbooking_ibfk_3` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
