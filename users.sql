-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2016 at 06:23 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acmsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Position` varchar(8) NOT NULL DEFAULT 'Member',
  `class` varchar(10) DEFAULT 'Freshman',
  `Payment` varchar(10) NOT NULL DEFAULT 'unpaid',
  `status` varchar(8) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `Email`, `Password`, `Position`, `class`, `Payment`, `status`) VALUES
(1, 'Zachary', 'Ostrowski', NULL, NULL, 'Member', 'Freshman', 'unpaid', 'Active'),
(2, 'Yashmin', 'Sainju', NULL, NULL, 'Officer', 'Freshman', 'unpaid', 'Active'),
(3, 'test', 'test', NULL, NULL, 'Member', 'Freshman', 'unpaid', 'Active');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `check_before_insert` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
declare msg varchar(100);
IF 
new.Position NOT IN ('member','officer','admin') THEN
set msg  = concat ('ERROR: invalid data for position. please specify as member, officer or admin.') ;
SIGNAL SQLSTATE '45000' set MESSAGE_TEXT = msg;
END IF;

IF
new.status NOT IN ('active','inactive') THEN
set msg  = concat ('ERROR: invalid data for status. please specify as active or inactive.') ;
SIGNAL SQLSTATE '45001' set MESSAGE_TEXT = msg;
END IF;

IF
new.payment NOT IN ('Semester','unpaid','year') THEN
set msg  = concat ('ERROR: invalid data for payment. please specify as semester, year, or unpaid.') ;
SIGNAL SQLSTATE '45001' set MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `chk_before_update` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
declare msg varchar(100);
IF new.Position NOT IN ('member','officer','admin') THEN
set msg  = concat ('ERROR: invalid data for position. please specify as member, officer or admin.') ;
SIGNAL SQLSTATE '45000' set MESSAGE_TEXT = msg;
END IF;

IF
new.status NOT IN ('active','inactive') THEN
set msg  = concat ('ERROR: invalid data for status. please specify as active or inactive.') ;
SIGNAL SQLSTATE '45001' set MESSAGE_TEXT = msg;
END IF;

IF
new.payment NOT IN ('Semester','unpaid','year') THEN
set msg  = concat ('ERROR: invalid data for payment. please specify as semester, year, or unpaid.') ;
SIGNAL SQLSTATE '45001' set MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
