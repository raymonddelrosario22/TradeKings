-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2018 at 04:07 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `r_id` int(11) NOT NULL,
  `r_user` varchar(9999) NOT NULL,
  `r_date` date NOT NULL,
  `r_content` mediumtext NOT NULL,
  `r_topic_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`r_id`, `r_user`, `r_date`, `r_content`, `r_topic_id`) VALUES
(53, 'random@gmail.com', '2018-03-30', '			asdfasdfasfdasdfasdf', 54),
(54, 'random@gmail.com', '2018-03-30', '			asdfasdfasdf', 54),
(55, 'random@gmail.com', '2018-03-30', '			i agree', 56),
(56, 'random@gmail.com', '2018-03-30', '			so do i', 56),
(57, 'random@gmail.com', '2018-03-30', '			dgsadfdf', 54),
(58, 'random@gmail.com', '2018-04-03', '			sdfgsdfgsdfgsdfgsdfgsdg', 54),
(59, 'random@gmail.com', '2018-04-03', '			fgfgffggf', 54);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(9999) NOT NULL,
  `topic_content` mediumtext NOT NULL,
  `topic_creator` varchar(9999) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `topic_content`, `topic_creator`, `views`, `date`) VALUES
(54, 'testerasdfaf', '			asdfasdfasdf', 'random@gmail.com', 16, '2018-03-30'),
(55, 'asdfasdfasd', '			asdfasdfasdf', 'random@gmail.com', 1, '2018-03-30'),
(56, 'chris salad', '			this guy sucks', 'random@gmail.com', 3, '2018-03-30'),
(57, 'sdfgsdfgsdgdsgfdsgf', '			sdfgsdfgsdgsdfgsdgf', 'random@gmail.com', 0, '2018-04-03'),
(58, 'sdgsdgadfgsdfgsdfg', '			sdfgsdfgsdfgsdfgsdfgds', '', 0, '2018-04-03'),
(59, 'sdfgsdfgsdfgsdgsdfgdfs', '			dsgdfgdsfgsdfgsdfg', 'random@gmail.com', 0, '2018-04-03'),
(60, 'sdfgsdfgdsfg', '			dagsdfgdsfg', 'random@gmail.com', 0, '2018-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `password` varchar(9999) NOT NULL,
  `email` varchar(9999) NOT NULL,
  `date` date NOT NULL,
  `profile_pic` varchar(9999) NOT NULL DEFAULT 'images/default_pic.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `date`, `profile_pic`) VALUES
(22, 'billnye', 'nye', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'random@gmail.com', '2018-03-30', 'images/default_pic.png'),
(23, 'billnye', 'bill', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'random@gmail.com', '2018-04-02', 'images/default_pic.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
