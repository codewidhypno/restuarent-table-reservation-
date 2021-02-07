-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 12:47 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tablebooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_users`
--

CREATE TABLE `tbl_auth_users` (
  `auth_id` int(11) NOT NULL,
  `auth_name` varchar(20) NOT NULL,
  `auth_email` varchar(50) NOT NULL,
  `auth_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_auth_users`
--

INSERT INTO `tbl_auth_users` (`auth_id`, `auth_name`, `auth_email`, `auth_status`) VALUES
(1, 'bibin', 'bibinbabuman@gmail.com', 1),
(2, 'binil', 'dev.dott3@gmail.com', 1),
(3, 'Thansim', 'thansimpm12@gmail.com', 1),
(4, 'binil', 'bibdev@yahoo.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotspot_coods`
--

CREATE TABLE `tbl_hotspot_coods` (
  `CoodID` int(11) NOT NULL,
  `seat_map_id` int(11) NOT NULL,
  `x1` int(11) NOT NULL,
  `y1` int(11) NOT NULL,
  `x2` int(11) NOT NULL,
  `y2` int(11) NOT NULL,
  `x3` int(11) NOT NULL,
  `y3` int(11) NOT NULL,
  `x4` int(11) NOT NULL,
  `y4` int(11) NOT NULL,
  `Total_chairs` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotspot_coods`
--

INSERT INTO `tbl_hotspot_coods` (`CoodID`, `seat_map_id`, `x1`, `y1`, `x2`, `y2`, `x3`, `y3`, `x4`, `y4`, `Total_chairs`, `Status`) VALUES
(1, 2, 53, 106, 81, 132, 54, 158, 25, 134, 4, 0),
(2, 2, 151, 156, 178, 185, 155, 212, 126, 181, 6, 1),
(3, 2, 249, 207, 277, 233, 251, 260, 233, 231, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Usertype` varchar(15) NOT NULL,
  `LastLogin` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`ID`, `Username`, `Password`, `Usertype`, `LastLogin`, `Status`) VALUES
(1, 'admin', 'admin', 'admin', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation_master`
--

CREATE TABLE `tbl_reservation_master` (
  `reservationID` int(11) NOT NULL,
  `customer_firstname` varchar(35) NOT NULL,
  `customer_secondname` varchar(35) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_mobile` varchar(15) NOT NULL,
  `reservation_date` datetime NOT NULL,
  `person_count` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `booking_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservation_master`
--

INSERT INTO `tbl_reservation_master` (`reservationID`, `customer_firstname`, `customer_secondname`, `customer_email`, `customer_mobile`, `reservation_date`, `person_count`, `table_id`, `booking_status`) VALUES
(1, 'Bibin', 'Babu', 'bibin.babu@gmail.com', '7558004080', '2020-08-22 09:30:00', 0, 1, 'confirmed'),
(2, 'Bibin', 'Babu', 'bibinbbm26@gmail.com', '9526290482', '2020-08-24 11:45:00', 2, 1, 'cancelled'),
(3, '', '', '', '', '2020-08-28 20:43:00', 2, 3, ' Pending'),
(4, '', '', '', '', '2020-08-28 17:06:00', 2, 3, ' Pending'),
(5, 'Binil', 'Babu', 'bibinbbm26@gmail.com', '7558004080', '2020-08-27 15:56:00', 2, 2, ' Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seat_map`
--

CREATE TABLE `tbl_seat_map` (
  `seat_map_id` int(11) NOT NULL,
  `seat_map_file` varchar(30) NOT NULL,
  `map_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seat_map`
--

INSERT INTO `tbl_seat_map` (`seat_map_id`, `seat_map_file`, `map_status`) VALUES
(1, 'Screenshot (160).png', 0),
(2, 'map.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_auth_users`
--
ALTER TABLE `tbl_auth_users`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `tbl_hotspot_coods`
--
ALTER TABLE `tbl_hotspot_coods`
  ADD PRIMARY KEY (`CoodID`),
  ADD KEY `seat_map_id` (`seat_map_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_reservation_master`
--
ALTER TABLE `tbl_reservation_master`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `table_id` (`table_id`);

--
-- Indexes for table `tbl_seat_map`
--
ALTER TABLE `tbl_seat_map`
  ADD PRIMARY KEY (`seat_map_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_auth_users`
--
ALTER TABLE `tbl_auth_users`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_hotspot_coods`
--
ALTER TABLE `tbl_hotspot_coods`
  MODIFY `CoodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_reservation_master`
--
ALTER TABLE `tbl_reservation_master`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_seat_map`
--
ALTER TABLE `tbl_seat_map`
  MODIFY `seat_map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_hotspot_coods`
--
ALTER TABLE `tbl_hotspot_coods`
  ADD CONSTRAINT `tbl_hotspot_coods_ibfk_1` FOREIGN KEY (`seat_map_id`) REFERENCES `tbl_seat_map` (`seat_map_id`);

--
-- Constraints for table `tbl_reservation_master`
--
ALTER TABLE `tbl_reservation_master`
  ADD CONSTRAINT `tbl_reservation_master_ibfk_1` FOREIGN KEY (`table_id`) REFERENCES `tbl_hotspot_coods` (`CoodID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
