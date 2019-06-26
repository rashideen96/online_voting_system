-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2019 at 07:01 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidate_id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `year_level` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `party` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `position`, `firstname`, `lastname`, `year_level`, `gender`, `img`, `party`) VALUES
(9, 'FCVAC', 'Mimy Minarti Bt Pangeran', NULL, '2nd Year', 'Female', 'upload/pic.png', 'FCVAC 02'),
(10, 'FCVAC', 'Asyraf', NULL, '', '', 'upload/pic.png', 'FCVAC 03'),
(11, '', '', '', '', '', 'upload/pic.png', 'P03'),
(12, '', '', NULL, '', '', 'upload/pic.png', 'P03'),
(13, '', '', '', '', '', 'upload/pic.png', 'P03'),
(14, '', '', NULL, '', '', 'upload/pic.png', 'P04'),
(15, '', '', '', '', '', 'upload/pic.png', 'P04');

-- --------------------------------------------------------

--
-- Table structure for table `ids`
--

CREATE TABLE `ids` (
  `id_number` varchar(100) NOT NULL,
  `names` varchar(225) NOT NULL,
  `started` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ids`
--

INSERT INTO `ids` (`id_number`, `names`, `started`) VALUES
('3163009681', 'Ahmad', '1997-02-22'),
('3163009682', 'Muhammad Asyraf', '2016-06-06'),
('3163009683', 'Asyraf Anuar', '6666-06-07'),
('3164007561', 'Aisar Azfar', '2016-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `login_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(11) NOT NULL,
  `party_id` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `president` varchar(255) NOT NULL,
  `vice_president` varchar(255) NOT NULL,
  `vote_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `party_id`, `img`, `president`, `vice_president`, `vote_count`) VALUES
(2, 'P01', 'upload/pic.png', 'Nurul Aqilah Binti Mahmud', 'Muhammad Anwar Hadi B. Romli', 2),
(3, 'P02', 'upload/pic.png', 'Ahmad', 'Nurul', 2),
(5, 'P03', 'upload/pic.png', 'Abu', 'Sarah', 1),
(6, 'P04', 'upload/pic.png', 'Izat', 'Ain', 0),
(7, 'P05', 'upload/pic.png', 'test1', 'test2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `Phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `Phone`, `email`) VALUES
(1, 'admin', 'admin', 'Asyraf', 'Anuar', 1116568649, 'acap.anuar98@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `Phone` int(100) NOT NULL DEFAULT '260',
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `voters_id` int(11) NOT NULL,
  `id_number` varchar(12) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `prog_study` varchar(10) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL DEFAULT 'Inactive',
  `date` date DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`voters_id`, `id_number`, `firstname`, `lastname`, `gender`, `prog_study`, `year_level`, `status`, `account`, `date`, `password`) VALUES
(79, '3163009682', 'Asyraf Anuar', NULL, 'Male', '', 'FCVAC', 'Unvoted', 'Active', '2019-06-12', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(255) NOT NULL,
  `candidate_id` varchar(255) NOT NULL,
  `voters_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `candidate_id`, `voters_id`) VALUES
(111, '1', '59'),
(112, '3', '59'),
(113, '6', '59'),
(114, '8', '59'),
(115, '9', '59'),
(116, '11', '59'),
(117, '14', '59'),
(118, '15', '59'),
(119, '18', '59'),
(120, '19', '59'),
(121, '22', '59'),
(122, '2', '63'),
(123, '3', '63'),
(124, '6', '63'),
(125, '8', '63'),
(126, '10', '63'),
(127, '11', '63'),
(128, '13', '63'),
(129, '16', '63'),
(130, '17', '63'),
(131, '19', '63'),
(132, '22', '63'),
(133, '6', '79'),
(134, '7', '79'),
(135, '', '79'),
(136, '', '79'),
(137, '', '79'),
(138, '', '79'),
(139, '', '79'),
(140, '', '79'),
(141, '', '79'),
(142, '', '79'),
(143, '', '79'),
(144, '6', '79'),
(145, '7', '79'),
(146, '', '79'),
(147, '', '79'),
(148, '', '79'),
(149, '', '79'),
(150, '', '79'),
(151, '', '79'),
(152, '', '79'),
(153, '', '79'),
(154, '', '79'),
(155, '6', '79'),
(156, '7', '79'),
(157, '', '79'),
(158, '', '79'),
(159, '', '79'),
(160, '', '79'),
(161, '', '79'),
(162, '', '79'),
(163, '', '79'),
(164, '', '79'),
(165, '', '79'),
(166, '', '79'),
(167, '', '79'),
(168, '', '79'),
(169, '', '79'),
(170, '', '79'),
(171, '', '79'),
(172, '', '79'),
(173, '', '79'),
(174, '', '79'),
(175, '', '79'),
(176, '', '79'),
(177, '', '79'),
(178, '', '79'),
(179, '', '79'),
(180, '', '79'),
(181, '', '79'),
(182, '', '79'),
(183, '', '79'),
(184, '', '79'),
(185, '', '79'),
(186, '', '79'),
(187, '', '79'),
(188, '', '79'),
(189, '', '79'),
(190, '', '79'),
(191, '', '79'),
(192, '', '79'),
(193, '', '79'),
(194, '', '79'),
(195, '', '79'),
(196, '', '79'),
(197, '', '79'),
(198, '', '79'),
(199, '', '79'),
(200, '', '79'),
(201, '', '79'),
(202, '', '79'),
(203, '', '79'),
(204, '', '79'),
(205, '', '79'),
(206, '', '79'),
(207, '', '79'),
(208, '', '79'),
(209, '', '79'),
(210, '', '79'),
(211, '', '79'),
(212, '', '79'),
(213, '', '79'),
(214, '', '79'),
(215, '', '79'),
(216, '', '79'),
(217, '', '79'),
(218, '', '79'),
(219, '', '79'),
(220, '', '79'),
(221, '', '79'),
(222, '', '79'),
(223, '', '79'),
(224, '', '79'),
(225, '', '79'),
(226, '', '79'),
(227, '', '79'),
(228, '', '79'),
(229, '', '79'),
(230, '', '79'),
(231, '', '79'),
(232, '', '79'),
(233, '', '79'),
(234, '', '79'),
(235, '', '79'),
(236, '', '79'),
(237, '', '79'),
(238, '', '79'),
(239, '', '79'),
(240, '', '79'),
(241, '', '79'),
(242, '', '79'),
(243, '', '79'),
(244, '', '79'),
(245, 'Array', '79');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `ids`
--
ALTER TABLE `ids`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`voters_id`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `voters_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
