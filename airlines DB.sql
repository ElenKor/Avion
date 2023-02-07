-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 06:29 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airlines`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BOOKING` (IN `UserName` VARCHAR(20), IN `flight` VARCHAR(20), IN `number` INT, IN `amount` FLOAT, IN `stats` VARCHAR(20), IN `payment` VARCHAR(20))  BEGIN
insert into booking (username, flightID, no_of_tickets, price, status, Paymentmethod) values(UserName, flight, number, amount, stats, payment);

update flights set Capacity = Capacity-number where flightID = flight;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminName` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `contact` int(10) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminName`, `password`, `contact`, `email`) VALUES
('admin', 'password', 11111, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `flightID` varchar(20) NOT NULL,
  `no_of_tickets` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `Paymentmethod` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flightID` varchar(20) NOT NULL,
  `departure` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flightID`, `departure`, `destination`, `Date`, `Time`, `Capacity`, `Price`) VALUES
('bd22', 'Bangalore', 'Delhi', '2019-12-08', '23:00:00', 138, 3700),
('bg22', 'Bangalore', 'Gujarat', '2019-12-11', '02:15:00', 160, 3400),
('bh11', 'Bangalore', 'Hyderabad', '2019-12-09', '05:10:00', 160, 3500),
('bm11', 'Bangalore', 'Mumbai', '2019-12-12', '06:20:00', 100, 3650),
('db11', 'Delhi', 'Bangalore', '2019-12-13', '14:00:00', 147, 4300),
('dg11', 'Delhi', 'Gujarat', '2019-12-14', '09:10:00', 166, 3700),
('dh11', 'Delhi', 'Hyderabad', '2019-12-13', '16:30:00', 155, 4150),
('dm11', 'Delhi', 'Mumbai', '2019-12-19', '04:40:00', 160, 3700),
('gb11', 'Gujarat', 'Bangalore', '2019-12-11', '03:10:00', 135, 3175),
('gd11', 'Gujarat', 'Delhi', '2019-12-10', '00:30:00', 165, 4175),
('gh11', 'Gujarat', 'Hyderabad', '2019-12-10', '22:30:00', 150, 4265),
('gm11', 'Gujarat', 'Mumbai', '2019-12-12', '18:15:00', 160, 3790),
('hb11', 'Hyderabad', 'Bangalore', '2019-12-19', '23:00:00', 140, 3200),
('hd11', 'Hyderabad', 'Delhi', '2019-12-15', '05:20:00', 150, 3100),
('hg11', 'Hyderabad', 'Gujarat', '2019-12-11', '06:30:00', 120, 3400),
('hm11', 'Hyderabad', 'Mumbai', '2019-12-13', '09:00:00', 155, 3150),
('mb11', 'Mumbai', 'Bangalore', '2019-12-14', '17:25:00', 165, 2850),
('md11', 'Mumbai', 'Delhi', '2019-12-12', '19:45:00', 140, 2500),
('mg11', 'Mumbai', 'Gujarat', '2019-12-13', '08:00:00', 150, 2800),
('mh11', 'Mumbai', 'Hyderabad', '2019-12-13', '20:20:00', 150, 2900);

--
-- Triggers `flights`
--
DELIMITER $$
CREATE TRIGGER `status` BEFORE DELETE ON `flights` FOR EACH ROW UPDATE booking SET status = "cancelled" where booking.flightID = old.flightID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `PNRNumber` int(5) NOT NULL,
  `flightID` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Contact` int(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminName`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `flightID` (`flightID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flightID`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`PNRNumber`),
  ADD UNIQUE KEY `PNRNumber` (`PNRNumber`),
  ADD KEY `flightID` (`flightID`),
  ADD KEY `username` (`username`),
  ADD KEY `flightID_2` (`flightID`),
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `PNRNumber` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
