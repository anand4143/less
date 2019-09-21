-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 05:04 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lesssuperstars`
--

-- --------------------------------------------------------

--
-- Table structure for table `judge_contest_levels`
--

CREATE TABLE `judge_contest_levels` (
  `id` int(10) NOT NULL,
  `judgeID` int(11) NOT NULL COMMENT 'master_judge table id',
  `contestID` int(11) NOT NULL COMMENT 'master_contests table id',
  `levelID` int(11) NOT NULL COMMENT 'contest_levels table id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='maping of master_judge,master_contests,contest_levels table';

--
-- Dumping data for table `judge_contest_levels`
--

INSERT INTO `judge_contest_levels` (`id`, `judgeID`, `contestID`, `levelID`) VALUES
(23, 1, 2, 5),
(25, 2, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `judge_contest_levels`
--
ALTER TABLE `judge_contest_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `judge_contest_levels`
--
ALTER TABLE `judge_contest_levels`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
