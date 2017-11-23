-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 12:08 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymnepal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'ram', 'ram123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `sn` int(11) NOT NULL,
  `user_id` int(3) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `clock` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`sn`, `user_id`, `date`, `time`, `clock`) VALUES
(5, 5, '2017-11-19', '01:00:47', 'am'),
(14, 8, '2017-11-19', '07:30:05', 'pm'),
(16, 5, '2017-11-20', '10:03:07', 'am'),
(18, 8, '2017-11-20', '08:18:44', 'pm'),
(19, 7, '2017-11-20', '09:53:09', 'pm'),
(20, 6, '2017-11-20', '09:57:41', 'pm'),
(26, 11, '2017-11-21', '11:47:40', 'am'),
(36, 2, '2017-11-22', '12:55:03', 'pm'),
(37, 14, '2017-11-22', '01:04:25', 'pm'),
(38, 11, '2017-11-22', '01:12:23', 'pm'),
(40, 1, '2017-11-22', '01:14:29', 'pm'),
(41, 3, '2017-11-22', '01:25:01', 'pm'),
(42, 3, '2017-11-22', '01:30:54', 'pm'),
(43, 4, '2017-11-22', '06:10:09', 'pm');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `user_id` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `temporay_address` varchar(16) NOT NULL,
  `permant_address` varchar(16) NOT NULL,
  `occupation` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`user_id`, `phone`, `dob`, `temporay_address`, `permant_address`, `occupation`) VALUES
(1, 9814145742, '1995-06-28', 'simalchour', 'simalchour', 'student'),
(2, 9806627492, '1997-06-28', 'bagar', 'bagar', 'student'),
(3, 9804147895, '1995-06-14', 'lakeside', 'mahendrapool', 'model'),
(4, 9814145741, '1995-06-28', 'simpani', 'simpani', 'student'),
(5, 9811422244, '2000-10-14', 'bagar', 'hospital chowk', 'student'),
(6, 9814145741, '0000-00-00', 'harichowk', 'lakeside', 'software engine'),
(7, 9845657895, '1997-12-10', 'lakeside', 'lakeside', 'driver'),
(8, 9814512333, '1998-10-12', 'lamachaur', 'lamachaur', 'student'),
(9, 9814512333, '2010-10-12', 'bagar', 'bagar', 'student'),
(10, 9814541233, '2010-10-12', 'bagar', 'bagar', 'condoctor'),
(11, 9814512333, '1997-12-13', 'miruwa', 'miruwa', 'student'),
(12, 9846078945, '2000-12-14', 'bagar', 'bagar', 'student'),
(13, 9814178955, '1996-07-02', 'bagar', 'bandipur', 'student'),
(14, 9814186207, '1997-12-13', 'bagar', 'nepalgunj', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `user_id` int(11) NOT NULL,
  `duration` int(3) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`user_id`, `duration`, `date`) VALUES
(1, 139, '2017-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `sn` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`sn`, `user_id`, `status`) VALUES
(1, 1, 0),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `duedate` date NOT NULL,
  `issue_date` date NOT NULL,
  `picture` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `duedate`, `issue_date`, `picture`) VALUES
(1, 'Talank', 'Baral', '2018-04-11', '2017-11-18', 'talank.jpg'),
(2, 'Elton', 'Shrestha', '2018-03-21', '2017-11-18', 'acoustic.png'),
(3, 'Gigi ', 'Hadid', '2017-12-16', '2017-11-18', '11.jpg'),
(4, 'Siddharthaa', 'katel', '2018-01-20', '2017-11-07', 'dandibiyo.jpg'),
(5, 'Anchal', 'Gurung', '2018-01-25', '2017-11-18', 'hqdefault.jpg'),
(6, 'Prajwal', 'Adk', '2017-12-22', '2017-11-19', 'elton.jpg'),
(7, 'Prajwal', 'ghimire', '2017-11-30', '2017-11-07', 'hqdefault.jpg'),
(8, 'Rajesh', 'Timislina', '2017-11-30', '2017-11-19', 'india.png'),
(9, 'Raju', 'Bk', '2017-11-25', '2017-11-15', 'hqdefault.jpg'),
(10, 'Anchal', 'Aryal', '2018-01-07', '2017-11-19', 'hqdefault.jpg'),
(11, 'Ashish', 'Parajuli', '2018-01-11', '2017-11-19', 'dandibiyo.jpg'),
(12, 'Prashant', 'tamrakar', '2017-12-13', '2017-11-20', 'guitar.png'),
(13, 'Suraj', 'Shrestha', '2018-01-21', '2017-11-21', 'Screenshot (3).png'),
(14, 'Ujwal', 'Mahato', '2017-12-18', '2017-11-22', 'WIN_20171122_09_18_13_Pro.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
