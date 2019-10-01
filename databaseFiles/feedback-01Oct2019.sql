-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 06:32 AM
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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mobileno` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fullname`, `email`, `mobileno`, `comment`, `createdDate`) VALUES
(1, 'sharad patel', 'sharad@less.com', 7406146121, 'asdfasdf', '2019-09-30 19:16:31'),
(2, 'sharad patel', 'sharad@less.com', 7406146121, 'asdfsadfsdf', '2019-09-30 19:19:43'),
(3, 'Anand Shukla', 'ananddshukkla00@gmail.com', 987654321, 'asdfasdf', '2019-09-30 19:25:44'),
(4, 'Anand Shukla', 'ananddshukkla00@gmail.com', 987654321, 'asdfasdf', '2019-09-30 19:54:49'),
(5, 'dsfsdfsdfsdf', '', 0, '', '2019-09-30 19:55:42'),
(6, 'sharad patel', 'sharad@less.com', 7406146121, 'asdfasdfasdfasdf', '2019-10-01 04:27:13'),
(7, 'sharad patel', 'sharad@less.com', 7406146121, 'sadfasdfasdf', '2019-10-01 04:30:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
