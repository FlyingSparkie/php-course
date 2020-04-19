-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2017 at 11:33 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblsurvey`
--

CREATE TABLE `tblsurvey` (
  `ID` int(11) NOT NULL,
  `Question` text NOT NULL,
  `OptionA` varchar(255) NOT NULL,
  `OptionB` varchar(255) NOT NULL,
  `OptionC` varchar(255) NOT NULL,
  `VotedA` int(11) NOT NULL DEFAULT '1',
  `VotedB` int(11) NOT NULL DEFAULT '1',
  `VotedC` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsurvey`
--

INSERT INTO `tblsurvey` (`ID`, `Question`, `OptionA`, `OptionB`, `OptionC`, `VotedA`, `VotedB`, `VotedC`) VALUES
(1, 'Do you believe in UFOs?', 'Yes', 'No', 'Maybe', 3, 8, 4),
(2, 'Are you healthy?', 'Yes, fairly', 'Not unhealthy', 'I\'m a tub of lard!', 1, 3, 3),
(4, 'Do you like Facebook?', 'yes, it\'s brilliant!', 'It\'s OK', 'Yuk!', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblsurvey`
--
ALTER TABLE `tblsurvey`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblsurvey`
--
ALTER TABLE `tblsurvey`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
