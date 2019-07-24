-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 11:10 PM
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
-- Database: `less`
--

-- --------------------------------------------------------

--
-- Table structure for table `contest_levels`
--

CREATE TABLE `contest_levels` (
  `id` int(11) UNSIGNED NOT NULL,
  `contestID` int(11) UNSIGNED NOT NULL,
  `levelName` varchar(128) NOT NULL,
  `levelSequence` tinyint(1) UNSIGNED DEFAULT NULL,
  `description` varbinary(256) DEFAULT NULL,
  `isEnabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'always show the current level',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `isDeleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'this is for system only if in futrue you want deleted levels',
  `eby` int(11) UNSIGNED DEFAULT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest_levels`
--

INSERT INTO `contest_levels` (`id`, `contestID`, `levelName`, `levelSequence`, `description`, `isEnabled`, `status`, `isDeleted`, `eby`, `createdDate`, `updatedDate`) VALUES
(1, 1, 'Level one', 1, 0x72747972736466677364666720736466647320313131, 0, 0, 0, NULL, '2019-07-14 17:21:20', '2019-07-21 11:41:24'),
(2, 1, 'Level two', NULL, 0x686767686a67, 0, 0, 0, NULL, '2019-07-15 02:34:43', '2019-07-21 11:40:02'),
(3, 1, 'Level three', NULL, 0x736466736466202d2d2d2d2d, 0, 0, 0, NULL, '2019-07-15 03:01:52', '2019-07-21 11:40:09'),
(4, 1, 'Level four', NULL, 0x61736466617364666173647364666473207364, 0, 0, 0, NULL, '2019-07-15 03:04:06', '2019-07-21 11:32:41'),
(5, 1, 'Level five', NULL, 0x736466736466323232, 0, 0, 0, NULL, '2019-07-15 17:08:25', '2019-07-21 11:40:18'),
(6, 1, 'Level six', NULL, 0x736466736435353535, 0, 0, 0, NULL, '2019-07-15 17:08:38', '2019-07-21 11:40:26'),
(7, 1, 'Level seven', NULL, 0x64666764666764676466736466647364203738373837, 0, 1, 1, 0, '2019-07-15 17:11:14', '2019-07-21 11:33:15'),
(8, 1, 'Level eight', NULL, 0x73646667732064662034353435343534206a67686a67682020686b686a6b686b20686a67686a676a6720686a68, 0, 1, 0, 0, '2019-07-15 17:27:23', '2019-07-21 11:40:32'),
(9, 1, 'Level nine', NULL, 0x206173646661736466, 0, 1, 0, NULL, '2019-07-15 17:27:34', '2019-07-21 11:33:45'),
(10, 1, 'Level ten', NULL, 0x61736466617364, 0, 1, 0, NULL, '2019-07-15 17:27:43', '2019-07-21 11:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `master_contests`
--

CREATE TABLE `master_contests` (
  `id` int(11) UNSIGNED NOT NULL,
  `uniqueID` varchar(32) NOT NULL,
  `contestName` varchar(128) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `isDeleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `eby` int(11) DEFAULT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_contests`
--

INSERT INTO `master_contests` (`id`, `uniqueID`, `contestName`, `description`, `startDate`, `endDate`, `status`, `isDeleted`, `eby`, `createdDate`, `updatedDate`) VALUES
(1, '', 'Bhopal Idol', 'test    sdfsd                      fdgfd      ', '2019-08-31', '2019-07-31', 1, 1, NULL, '2019-07-11 18:02:55', '2019-07-21 11:50:24'),
(2, '', 'Panjab Idol', 'asdfds', '2019-08-22', '2019-07-13', 1, 1, NULL, '2019-07-11 18:09:57', '2019-07-21 11:50:17'),
(3, '', 'UP Idol', 'asdfas kghkhjg hjghgj', '2019-08-08', '2019-07-31', 1, 0, NULL, '2019-07-11 18:48:46', '2019-07-21 11:50:11'),
(4, '', 'Delhi Idol', 'asdfasdf hgj jhghjgj', '2019-08-01', '2019-07-31', 1, 0, NULL, '2019-07-14 16:16:57', '2019-07-21 11:50:04'),
(5, '', 'Bangalore Idol', 'asdf asdf', '2019-07-31', '2019-07-18', 1, 0, NULL, '2019-07-17 17:56:17', '2019-07-21 11:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `master_judge`
--

CREATE TABLE `master_judge` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `userType` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'this column always = 1',
  `isActive` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0->inActive,1->Active',
  `aboutJudge` text NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_judge`
--

INSERT INTO `master_judge` (`id`, `email`, `firstName`, `lastName`, `password`, `userType`, `isActive`, `aboutJudge`, `createdDate`, `updatedDate`) VALUES
(1, 'anandd@gmail.com', 'anandJ', 'shuklsJ', '202cb962ac59075b964b07152d234b70', 1, 1, '', '2019-07-19 05:04:29', '0000-00-00 00:00:00'),
(2, 'saurabh@lesssuperstar.com', 'saurabh', 'verma', '202cb962ac59075b964b07152d234b70', 1, 1, 'test', '2019-07-19 16:40:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trans_contest_participation`
--

CREATE TABLE `trans_contest_participation` (
  `id` int(11) UNSIGNED NOT NULL,
  `contestID` int(11) UNSIGNED NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL,
  `isActive` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `isDeleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `eby` int(11) UNSIGNED DEFAULT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_votings`
--

CREATE TABLE `trans_votings` (
  `id` int(11) UNSIGNED NOT NULL,
  `contestID` int(11) UNSIGNED NOT NULL,
  `contestLevelID` int(11) UNSIGNED NOT NULL,
  `participantID` int(11) UNSIGNED NOT NULL,
  `votedByUserID` int(11) UNSIGNED NOT NULL,
  `ratings` smallint(4) NOT NULL,
  `isActive` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `isDeleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` tinyint(4) NOT NULL DEFAULT '3' COMMENT '1=>Admin,2=>participants',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isActive` tinyint(2) NOT NULL COMMENT '0->inActive,1->Active',
  `aboutUser` text NOT NULL,
  `updatedData` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `email`, `firstName`, `lastName`, `password`, `userType`, `createdDate`, `isActive`, `aboutUser`, `updatedData`) VALUES
(1, 'anand4143', 'anand.knp@gmail.com', 'anand', 'shukla', '202cb962ac59075b964b07152d234b70', 1, '2019-07-09 05:02:38', 0, '', '0000-00-00 00:00:00'),
(2, 'saurabh4143123', 'verma.thegreat92@gmail.com', 'Sourabh123', 'Verma', '202cb962ac59075b964b07152d234b70', 2, '2019-07-21 05:02:53', 0, '', '0000-00-00 00:00:00'),
(3, '', 'deepesh@gmail.com', 'Deepesh', 'Singh', 'dd4936bf8f4c399b2bd95c07486172b5', 1, '2019-07-13 09:50:11', 1, '', '0000-00-00 00:00:00'),
(4, '', 'harijjmd@gmail.com', 'Hari', 'Choudhary', '202cb962ac59075b964b07152d234b70', 2, '2019-07-18 19:53:30', 1, '', '0000-00-00 00:00:00'),
(15, 'judge1', 'judge1@lesssuperstar.com', 'judge1', 'judge1123', '', 2, '2019-07-18 03:23:02', 1, 'judge1judge1judge1judge1judge1judge1 judge1judge1judge1 judge1judge1judge1judge1judge1', '0000-00-00 00:00:00'),
(16, 'judge2', 'judge2@lesssuperstar.com', 'judge22', 'judge2', '', 2, '2019-07-18 03:22:58', 1, 'judge2judge2judge2 judge2judge2judge2judge2 judge2', '0000-00-00 00:00:00'),
(17, 'saurabh4143123', 'saurabh4143123@lesssuperstar.com', 'anand', 'shukla', '', 2, '2019-07-18 03:22:52', 1, 'this is testing judge', '0000-00-00 00:00:00'),
(14, 'anandd', 'ananddshukkla@lesssuperstart.com', 'ANAND123', 'SHUKLA', '', 2, '2019-07-18 03:00:06', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_contests_levels`
--

CREATE TABLE `users_contests_levels` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL COMMENT 'users table id',
  `level_id` int(10) NOT NULL COMMENT 'contest_level id',
  `contest_id` int(10) NOT NULL COMMENT 'master_contests table id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is mapping of users,master_contests,and levels';

-- --------------------------------------------------------

--
-- Table structure for table `users_judge`
--

CREATE TABLE `users_judge` (
  `id` int(10) NOT NULL,
  `judge_id` int(10) NOT NULL COMMENT 'master_judge table id',
  `user_id` int(10) NOT NULL COMMENT 'users table id',
  `levels_id` int(10) NOT NULL COMMENT 'contest_levels table id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='relation b/w master_judge & users tables';

--
-- Dumping data for table `users_judge`
--

INSERT INTO `users_judge` (`id`, `judge_id`, `user_id`, `levels_id`) VALUES
(1, 1, 1, 8),
(2, 1, 16, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user_smule`
--

CREATE TABLE `user_smule` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `contest_id` int(10) NOT NULL,
  `levels_id` int(10) NOT NULL COMMENT 'contest_levels table id',
  `smuleUrl` varchar(1024) NOT NULL,
  `smuleID` varchar(1024) NOT NULL COMMENT 'this is smule app id',
  `createdBy` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This is mapping b/w user and smule URL';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contest_levels`
--
ALTER TABLE `contest_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_contests`
--
ALTER TABLE `master_contests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_judge`
--
ALTER TABLE `master_judge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_contest_participation`
--
ALTER TABLE `trans_contest_participation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_votings`
--
ALTER TABLE `trans_votings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_contests_levels`
--
ALTER TABLE `users_contests_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_judge`
--
ALTER TABLE `users_judge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_smule`
--
ALTER TABLE `user_smule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contest_levels`
--
ALTER TABLE `contest_levels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `master_contests`
--
ALTER TABLE `master_contests`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_judge`
--
ALTER TABLE `master_judge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trans_contest_participation`
--
ALTER TABLE `trans_contest_participation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_votings`
--
ALTER TABLE `trans_votings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users_contests_levels`
--
ALTER TABLE `users_contests_levels`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_judge`
--
ALTER TABLE `users_judge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_smule`
--
ALTER TABLE `user_smule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
