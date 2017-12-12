-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 08:42 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `breakfast`
--

CREATE TABLE `breakfast` (
  `bType` varchar(25) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `bPrice` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breakfast`
--

INSERT INTO `breakfast` (`bType`, `HotelID`, `Description`, `bPrice`) VALUES
('American', 1, 'Simple American Breakfast', 13.75),
('American', 2, 'Simple American Breakfast', 13.75),
('American', 3, 'Simple American Breakfast', 13.75),
('American', 4, 'Simple American Breakfast', 13.75),
('Continental', 1, 'Simple Continental Breakfast', 12.75),
('Continental', 2, 'Simple Continental Breakfast', 12.75),
('Continental', 3, 'Simple Continental Breakfast', 12.75),
('Continental', 4, 'Simple Continental Breakfast', 12.75),
('English', 1, 'Simple English Breakfast', 10.75),
('English', 2, 'Simple English Breakfast', 10.75),
('English', 3, 'Simple English Breakfast', 10.75),
('English', 4, 'Simple English Breakfast', 10.75),
('Italian', 1, 'Simple Italian Breakfast', 11.75),
('Italian', 2, 'Simple Italian Breakfast', 11.75),
('Italian', 3, 'Simple Italian Breakfast', 11.75),
('Italian', 4, 'Simple Italian Breakfast', 11.75);

-- --------------------------------------------------------

--
-- Table structure for table `breakfastreview`
--

CREATE TABLE `breakfastreview` (
  `ReviewID` int(11) NOT NULL,
  `bType` varchar(25) DEFAULT NULL,
  `hotelNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breakfastreview`
--

INSERT INTO `breakfastreview` (`ReviewID`, `bType`, `hotelNo`) VALUES
(1, 'American', 3),
(110, 'American', 3),
(625, 'Italian', 4),
(841, 'Continental', 2);

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `Cnumber` bigint(20) NOT NULL,
  `ExpDate` date DEFAULT NULL,
  `BillingAddr` varchar(50) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `SecCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`Cnumber`, `ExpDate`, `BillingAddr`, `name`, `SecCode`) VALUES
(0, '0000-00-00', '', '', 0),
(1111222233334444, '2021-01-00', '110 Frelinghuysen Road, Piscataway, NJ, 08854-8019', 'Moxie', 111),
(1111222277779999, '2017-01-00', 'asdf', 'asdf', 0),
(1111444422223333, '2022-03-00', '110 Frelinghuysen Road, Piscataway, NJ, 08854-8019', 'Guy Person', 112),
(1111444455557777, '2019-10-00', '23 Quit Lane', 'Mitch Michaels', 123),
(1111666677773333, '2022-05-00', 'adfs', 'asdf', 123),
(1234123413241234, '2023-09-00', 'Brett Hall', 'Larry West', 234),
(1234555533332222, '2022-09-00', '123445 Place', 'Chu Chu', 123),
(1234567878900987, '2017-01-00', 'Shibuya Crossing', 'Kazuma Satou', 324),
(1234567890123451, '2023-08-00', 'Bakeville, OH', 'Tom Baker', 343),
(4117744023154697, '2020-12-00', '185 PATERSON AVE APT 1', 'Scott Avalos', 666),
(5555666677778888, '2019-10-00', '123445 Place', 'Damn Daniel', 723),
(6666444478771111, '2020-08-00', '123445 Place', 'Damn Daniel', 761),
(6666555544443333, '2017-01-00', '123445 Place', 'Chu Chu', 0),
(9999999999999999, '2020-07-00', 'Shibuya Crossing', 'Kazuma Satou', 123);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CID` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Phone_no` varchar(25) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `Email`, `Address`, `Phone_no`, `name`) VALUES
(1, 'bobmarley@music.net', 'Heaven', '111-222-3333', 'Bob Marley'),
(2, 'tombaker@sports.net', 'Chicago', '111-222-3334', 'Tom Baker'),
(3, 'jackyonts@science.net', 'Miami', '111-222-3335', NULL),
(4, 'billymoxy@music.net', 'New York', '111-222-3337', 'Billy Moxy'),
(5, 'larrywest@math.net', 'San Francisco', '111-222-3337', 'Larry West'),
(6, 'kellg@teach.net', 'Union', '111-222-3338', 'Kelly Gonzales'),
(7, 'jonthad@cars.net', 'New Brunswicj', '111-222-3339', 'Jon Thad'),
(360, 'guyperson@hotmail.com', '110 Frelinghuysen Road, Piscataway, NJ, 08854-8019', '123-456-7890', 'Guy Person'),
(599, 'meguminbestgirl@kek.com', '123 Not A Place', '1234567890', 'Kazuma Satou'),
(832, 'backatitagain@whitevans.com', '404 Dumb Meme Road', '7325481971', 'Damn Daniel');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `HotelID` int(11) NOT NULL,
  `location` varchar(500) DEFAULT NULL,
  `Phone_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`HotelID`, `location`, `Phone_no`) VALUES
(1, 'New York, USA', '636-997-1498'),
(2, 'London, United Kingdom', '01632 960575'),
(3, 'Tokyo, Japan', '0492-758011'),
(4, 'Beijing, China', '0558-6573616'),
(5, 'San Francisco, California', '818-979-2519'),
(6, 'Paris, France', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offerroom`
--

CREATE TABLE `offerroom` (
  `Room_no` int(11) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `SDate` date DEFAULT NULL,
  `EDate` date DEFAULT NULL,
  `Discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offerroom`
--

INSERT INTO `offerroom` (`Room_no`, `HotelID`, `SDate`, `EDate`, `Discount`) VALUES
(1, 1, '2017-10-31', '2017-12-31', 10);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `InvoiceNO` int(20) NOT NULL,
  `CID` int(11) DEFAULT NULL,
  `Cnumber` bigint(20) DEFAULT NULL,
  `checkIn` date DEFAULT NULL,
  `checkOut` date DEFAULT NULL,
  `hotelID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`InvoiceNO`, `CID`, `Cnumber`, `checkIn`, `checkOut`, `hotelID`) VALUES
(29, 360, 1111222233334444, '2017-12-01', '2017-12-03', 1),
(189, 832, 5555666677778888, '2017-12-12', '2017-12-12', 6),
(250, 5, 1234123413241234, '2017-12-12', '2017-12-12', 1),
(255, 832, 6666444478771111, '2019-01-12', '2019-01-15', 4),
(284, 360, 1111222233334444, '2017-12-01', '2017-12-14', 1),
(383, 4, 1111222233334444, '2017-12-01', '2017-12-01', 1),
(411, 360, 1111222233334444, '2017-12-01', '2017-12-31', 1),
(454, 4, 1111222233334444, '2017-12-01', '2017-12-01', 1),
(500, 1, 1111222233334444, '2017-12-01', '2017-12-01', 1),
(539, 599, 9999999999999999, '2017-12-12', '2017-12-12', 2),
(688, 1, 1111222233334444, '2017-12-01', '2017-12-31', 1),
(772, 360, 1111444422223333, '2018-01-19', '2018-02-14', 1),
(809, 360, 1111222233334444, '2017-12-01', '2017-12-01', 1),
(858, 4, 1111222233334444, '2017-12-01', '2017-12-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `CID` int(11) DEFAULT NULL,
  `Rating` float DEFAULT NULL,
  `TextComment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `CID`, `Rating`, `TextComment`) VALUES
(1, 832, 4, 'Food was alright, but the water was too wet for my liking.'),
(16, 360, 4, 'hi'),
(36, 1, 3, 'hihihihhi'),
(81, 2, 8, 'Gr8 place, 8/8'),
(110, 360, 10, '10 outta 10'),
(120, 1, 3, 'hihih'),
(130, 832, 9, 'Stellar service, will be back at it again.'),
(239, 1, 5, 'hhh'),
(293, 1, 5, 'jjjj'),
(305, 1, 5, 'hhh'),
(357, 360, 4, '1212'),
(358, 599, 2, 'Found cockroaches beneath my bed. At least it wasn\'t a horse stable.'),
(428, 1, 5, 'test'),
(447, 1, 5, 'hihhihi'),
(479, 7, 7, 'too much water 7.5/10'),
(544, 360, 1, 'nope just nope'),
(548, 360, 7, '7.5/10 too musch water'),
(625, 5, 10, 'Premier food. Can\'t recommend enough.'),
(626, 360, 5, ''),
(656, 360, 5, ''),
(725, 360, 5, '7.5/10 too much water'),
(754, 1, 5, 'hihih'),
(841, 832, 3, 'I\'m allergic to vegan foods, and the granola almost killed me.'),
(847, 1, 8, 'Good room from hotel'),
(858, 1, 5, ''),
(865, 360, 7, '7.5/10 too much water'),
(992, 5, 9, 'Very impressive room. Space was nice and will be returning shortly.');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_no` int(11) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `Floor_no` int(11) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_no`, `HotelID`, `price`, `Capacity`, `Floor_no`, `Description`, `Type`) VALUES
(1, 1, 25, 1, 1, 'A room', 'Single'),
(1, 2, 25, 1, 1, 'A room', 'Single'),
(2, 1, 25, 1, 2, 'A room', 'Single'),
(2, 2, 25, 1, 2, 'A room', 'Single'),
(3, 1, 25, 1, 3, 'A room', 'Single'),
(3, 2, 25, 1, 3, 'A room', 'Single'),
(4, 1, 50, 2, 4, 'A room', 'Double'),
(4, 2, 50, 2, 4, 'A room', 'Double'),
(5, 1, 50, 2, 5, 'A room', 'Double'),
(5, 2, 50, 2, 5, 'A room', 'Double'),
(6, 1, 50, 2, 6, 'A room', 'Double'),
(6, 2, 50, 2, 6, 'A room', 'Double'),
(7, 1, 75, 3, 7, 'A room', 'Triple'),
(7, 2, 75, 3, 7, 'A room', 'Triple'),
(8, 1, 75, 3, 8, 'A room', 'Triple'),
(8, 2, 75, 3, 8, 'A room', 'Triple'),
(9, 1, 75, 3, 9, 'A room', 'Triple'),
(9, 2, 75, 3, 9, 'A room', 'Triple'),
(10, 1, 100, 4, 10, 'A room', 'Master'),
(10, 2, 100, 4, 10, 'A room', 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `roomreview`
--

CREATE TABLE `roomreview` (
  `ReviewID` int(11) NOT NULL,
  `Room_no` int(11) DEFAULT NULL,
  `hotelNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomreview`
--

INSERT INTO `roomreview` (`ReviewID`, `Room_no`, `hotelNo`) VALUES
(81, 6, 1),
(130, 5, 6),
(358, 8, 3),
(847, 2, 1),
(865, 1, 1),
(992, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `sType` varchar(25) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `sCost` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`sType`, `HotelID`, `sCost`) VALUES
('Laundry', 1, 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `servicereview`
--

CREATE TABLE `servicereview` (
  `ReviewID` int(11) NOT NULL,
  `sType` varchar(25) DEFAULT NULL,
  `hotelNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicereview`
--

INSERT INTO `servicereview` (`ReviewID`, `sType`, `hotelNo`) VALUES
(428, 'Laundry', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `pw` varchar(25) DEFAULT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `pw`, `fname`, `lname`, `admin`) VALUES
(0, 'admin', 'password', 'Admin', NULL, 1),
(1, 'bobmarley', 'music', 'Bob', 'Marley', 0),
(2, 'TomBaker', 'sports', 'Tom', 'Baker', 0),
(3, 'JackYonts', 'science', 'Jack', 'Yonts', 0),
(4, 'BillyMoxy', 'music', 'Billy', 'Moxie', 0),
(5, 'LarryWest', 'math', 'Larry', 'West', 0),
(7, 'JonThad', 'cars', 'Jon', 'Thad', 0),
(360, 'guyperson', 'human', 'Guy', 'Person', 0),
(599, 'steal', 'steal', 'Kazuma', 'Satou', 0),
(832, 'whitevans', 'whitevans', 'Damn', 'Daniel', 0),
(1000, '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breakfast`
--
ALTER TABLE `breakfast`
  ADD PRIMARY KEY (`bType`,`HotelID`),
  ADD KEY `HotelID` (`HotelID`);

--
-- Indexes for table `breakfastreview`
--
ALTER TABLE `breakfastreview`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `bType` (`bType`),
  ADD KEY `breakfastreview_ibfk_3_idx` (`hotelNo`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`Cnumber`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`HotelID`);

--
-- Indexes for table `offerroom`
--
ALTER TABLE `offerroom`
  ADD PRIMARY KEY (`Room_no`,`HotelID`),
  ADD KEY `HotelID` (`HotelID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`InvoiceNO`),
  ADD KEY `reservation_ibfk_2_idx` (`Cnumber`),
  ADD KEY `reservation_ibfk_1` (`CID`),
  ADD KEY `hotelID` (`hotelID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `review_ibfk_1` (`CID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_no`,`HotelID`),
  ADD KEY `HotelID` (`HotelID`);

--
-- Indexes for table `roomreview`
--
ALTER TABLE `roomreview`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `Room_no` (`Room_no`),
  ADD KEY `roomreview_ibfk_3_idx` (`hotelNo`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`sType`,`HotelID`),
  ADD KEY `HotelID` (`HotelID`);

--
-- Indexes for table `servicereview`
--
ALTER TABLE `servicereview`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `sType` (`sType`),
  ADD KEY `servicereview_ibfk_3_idx` (`hotelNo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `breakfast`
--
ALTER TABLE `breakfast`
  ADD CONSTRAINT `breakfast_ibfk_1` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`) ON DELETE CASCADE;

--
-- Constraints for table `breakfastreview`
--
ALTER TABLE `breakfastreview`
  ADD CONSTRAINT `breakfastreview_ibfk_1` FOREIGN KEY (`ReviewID`) REFERENCES `review` (`ReviewID`) ON DELETE CASCADE,
  ADD CONSTRAINT `breakfastreview_ibfk_2` FOREIGN KEY (`bType`) REFERENCES `breakfast` (`bType`) ON DELETE NO ACTION,
  ADD CONSTRAINT `breakfastreview_ibfk_3` FOREIGN KEY (`hotelNo`) REFERENCES `hotel` (`HotelID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `offerroom`
--
ALTER TABLE `offerroom`
  ADD CONSTRAINT `offerroom_ibfk_1` FOREIGN KEY (`Room_no`) REFERENCES `room` (`Room_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `offerroom_ibfk_2` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Cnumber`) REFERENCES `creditcard` (`Cnumber`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`hotelID`) REFERENCES `hotel` (`HotelID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON DELETE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`) ON DELETE CASCADE;

--
-- Constraints for table `roomreview`
--
ALTER TABLE `roomreview`
  ADD CONSTRAINT `roomreview_ibfk_1` FOREIGN KEY (`ReviewID`) REFERENCES `review` (`ReviewID`) ON DELETE CASCADE,
  ADD CONSTRAINT `roomreview_ibfk_2` FOREIGN KEY (`Room_no`) REFERENCES `room` (`Room_no`) ON DELETE NO ACTION,
  ADD CONSTRAINT `roomreview_ibfk_3` FOREIGN KEY (`hotelNo`) REFERENCES `hotel` (`HotelID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`) ON DELETE CASCADE;

--
-- Constraints for table `servicereview`
--
ALTER TABLE `servicereview`
  ADD CONSTRAINT `servicereview_ibfk_1` FOREIGN KEY (`ReviewID`) REFERENCES `review` (`ReviewID`) ON DELETE CASCADE,
  ADD CONSTRAINT `servicereview_ibfk_2` FOREIGN KEY (`sType`) REFERENCES `service` (`sType`) ON DELETE NO ACTION,
  ADD CONSTRAINT `servicereview_ibfk_3` FOREIGN KEY (`hotelNo`) REFERENCES `hotel` (`HotelID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
