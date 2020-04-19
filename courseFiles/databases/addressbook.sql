-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2017 at 01:34 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addressbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_book`
--

CREATE TABLE `tbl_address_book` (
  `ID` smallint(6) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Address` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address_book`
--

INSERT INTO `tbl_address_book` (`ID`, `First_Name`, `Surname`, `Address`) VALUES
(1, 'Test', 'Name', '12 Test Street'),
(2, 'Paul', 'McCartney', 'Penny Lane'),
(3, 'John', 'Lenon', 'Penny Lane'),
(4, 'John', 'Lenon', 'Penny Lane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address_book`
--
ALTER TABLE `tbl_address_book`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address_book`
--
ALTER TABLE `tbl_address_book`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
