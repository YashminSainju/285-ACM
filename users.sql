-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 09:36 PM
-- Server version: 10.1.18-MariaDB
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
CREATE DATABASE IF NOT EXISTS `acmsite` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `acmsite`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `User_ID` varchar(20) NOT NULL,
  `id_token` varchar(50) NOT NULL,
  `Position` varchar(8) NOT NULL DEFAULT 'Member',
  `status` varchar(8) NOT NULL DEFAULT 'Active',
  `class` varchar(10) DEFAULT 'Freshman'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`FirstName`, `LastName`, `User_ID`, `id_token`, `Position`, `status`, `class`) VALUES
('Zachary', 'Ostrowski', 'kanku13', 'w0641076@selu.edu', 'Member', 'Active', 'Freshman'),
('Yashmin', 'Sainju', 'Yashmin', 'yashminsainju@selu.edu', 'Officer', 'Active', 'Freshman');

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
  ADD PRIMARY KEY (`User_ID`);
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `User_ID` varchar(20) NOT NULL,
  `ID_Token` varchar(50) NOT NULL,
  `Position` varchar(8) NOT NULL DEFAULT 'Member',
  `status` varchar(8) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
