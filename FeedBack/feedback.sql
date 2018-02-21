-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 02:58 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Adminid` int(3) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `ARegTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Adminid`, `Username`, `Password`, `ARegTime`, `Status`) VALUES
(1, 'admin', 'admin123', '2017-01-14 06:06:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ClassId` int(3) NOT NULL,
  `ClassCode` varchar(10) NOT NULL,
  `CStatus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ClassId`, `ClassCode`, `CStatus`) VALUES
(1, '3CSEA', 0),
(2, '3CSEB', 0),
(3, '3CSEC', 0),
(4, '2CSEA', 0),
(5, '2CSEB', 0),
(6, '2CSEC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Fid` int(10) NOT NULL,
  `FacultyName` varchar(30) NOT NULL,
  `Dept` varchar(10) NOT NULL,
  `Specialization` text NOT NULL,
  `FregTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Fstatus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Fid`, `FacultyName`, `Dept`, `Specialization`, `FregTime`, `Fstatus`) VALUES
(1, 'Faculty 1`', 'CSE', 'C,C++,Java,Web Technologies,Operating Systems', '2017-01-15 00:57:28', 0),
(2, 'Faculty 2', 'CSE', 'Java,Distributes Systems', '2017-01-15 00:57:28', 0),
(3, 'Faculty 3', 'CSE', 'Software Testing Methodlogies,Java', '2017-01-15 00:58:48', 0),
(4, 'Faculty 4', 'CSE', 'OOAD,CO', '2017-01-15 00:58:48', 0),
(5, 'Faculty 5', 'CSE', 'IPR,MEFA', '2017-01-15 00:59:35', 0),
(6, 'Faculty 6', 'CSE', 'Computer Networks,Information Security', '2017-01-15 01:00:27', 0),
(7, 'Faculty 7', 'IT', '', '2017-01-17 08:07:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE `feeds` (
  `Feedid` int(10) NOT NULL,
  `Atr1` int(2) NOT NULL,
  `Atr2` int(2) NOT NULL,
  `Atr3` int(2) NOT NULL,
  `Atr4` int(2) NOT NULL,
  `Atr5` int(2) NOT NULL,
  `Remarks` text NOT NULL,
  `Fid` int(10) NOT NULL,
  `FeedFlag` tinyint(1) NOT NULL DEFAULT '0',
  `FeedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`Feedid`, `Atr1`, `Atr2`, `Atr3`, `Atr4`, `Atr5`, `Remarks`, `Fid`, `FeedFlag`, `FeedTime`) VALUES
(1, 1, 1, 1, 1, 1, 'ihejbdjfcjjufu', 1, 0, '2017-01-17 09:43:06'),
(2, 1, 1, 1, 1, 1, 'ytftfuygfyutf1', 2, 0, '2017-01-17 09:43:06'),
(3, 1, 1, 1, 1, 1, 'yudewhfiuhfiu', 3, 0, '2017-01-17 09:43:06'),
(4, 1, 1, 1, 1, 1, 'iufrehlgheiofhjo', 4, 0, '2017-01-17 09:43:06'),
(5, 1, 1, 1, 1, 1, 'jceoijg;e', 5, 0, '2017-01-17 09:43:06'),
(6, 2, 2, 2, 2, 2, 'fheriogroj', 6, 0, '2017-01-17 09:43:06'),
(7, 3, 3, 3, 3, 3, 'ytftyfy', 1, 0, '2017-01-17 09:51:14'),
(8, 3, 3, 3, 3, 3, 'iuguu', 2, 0, '2017-01-17 09:51:14'),
(9, 3, 3, 3, 3, 3, '3yufuytftft7', 3, 0, '2017-01-17 09:51:14'),
(10, 3, 3, 3, 3, 3, 'i 76fuytfuytfyfc3', 4, 0, '2017-01-17 09:51:14'),
(11, 3, 3, 3, 3, 3, 'hcvtyycyc', 5, 0, '2017-01-17 09:51:14'),
(12, 3, 3, 3, 3, 3, 'ydufrdfyu', 6, 0, '2017-01-17 09:51:14'),
(13, 1, 2, 5, 3, 4, 'dfbh', 6, 0, '2017-01-17 10:04:35'),
(14, 1, 1, 1, 1, 1, '[object HTMLTextAreaElement]', 6, 0, '2017-01-17 15:02:38'),
(15, 1, 1, 1, 1, 1, '[object HTMLTextAreaElement]', 6, 0, '2017-01-17 15:05:37'),
(16, 1, 1, 1, 1, 1, '[object HTMLTextAreaElement]', 6, 0, '2017-01-17 15:07:56'),
(17, 1, 1, 1, 1, 1, '[object HTMLTextAreaElement]', 6, 0, '2017-01-17 15:09:06'),
(18, 5, 5, 5, 5, 5, 'xwejfij3ojfk3', 6, 0, '2017-01-17 15:13:17'),
(19, 5, 5, 5, 5, 5, 'fiejofhjrd', 1, 0, '2017-01-17 15:13:56'),
(20, 5, 5, 5, 5, 5, 'fiejofhjrd', 1, 0, '2017-01-17 15:14:20'),
(21, 5, 5, 5, 5, 5, 'feorhf', 1, 0, '2017-01-17 15:19:58'),
(22, 5, 5, 5, 5, 5, 'feorhf', 1, 0, '2017-01-17 15:20:12'),
(23, 5, 5, 5, 5, 5, 'Good', 1, 0, '2017-01-17 16:11:52'),
(24, 5, 4, 3, 3, 5, 'Good\n', 2, 0, '2017-01-17 16:12:27'),
(25, 4, 4, 4, 4, 4, 'OKay\n', 3, 0, '2017-01-17 16:12:47'),
(26, 3, 3, 3, 3, 3, 'Good\n', 4, 0, '2017-01-17 16:13:03'),
(27, 1, 1, 1, 1, 1, 'Poor', 5, 0, '2017-01-17 16:13:16'),
(28, 5, 5, 5, 5, 5, 'Excellent', 6, 0, '2017-01-17 16:13:32'),
(29, 5, 5, 5, 5, 5, 'Good', 1, 0, '2017-01-18 00:17:41'),
(30, 3, 3, 3, 3, 3, 'Good\n', 2, 0, '2017-01-18 00:18:05'),
(31, 3, 4, 4, 4, 4, 'good', 3, 0, '2017-01-18 00:18:22'),
(32, 5, 5, 5, 5, 5, 'Good\n', 4, 0, '2017-01-18 00:18:34'),
(33, 5, 5, 5, 5, 5, 'Good\n', 5, 0, '2017-01-18 00:18:48'),
(34, 5, 5, 5, 5, 5, 'Excellent\n', 6, 0, '2017-01-18 00:19:12'),
(35, 5, 5, 5, 5, 5, 'klkbjgoifjb', 1, 0, '2017-01-18 05:24:20'),
(36, 3, 3, 3, 3, 3, 'jrhgkjrn', 2, 0, '2017-01-18 05:24:38'),
(37, 4, 4, 4, 4, 4, 'voijifejnvok', 3, 0, '2017-01-18 05:24:50'),
(38, 5, 5, 5, 5, 5, '5viehfu\n', 4, 0, '2017-01-18 05:26:08'),
(39, 4, 4, 4, 4, 4, '4oijei', 5, 0, '2017-01-18 05:26:14'),
(40, 5, 5, 5, 5, 5, '5iojirejfkr', 6, 0, '2017-01-18 05:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Rollno` varchar(10) NOT NULL,
  `Password` varchar(65) NOT NULL,
  `ClassId` int(3) NOT NULL,
  `SRegTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SStatus` tinyint(1) NOT NULL DEFAULT '0',
  `ResetFlag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Rollno`, `Password`, `ClassId`, `SRegTime`, `SStatus`, `ResetFlag`) VALUES
('1111111111', '$2y$10$kvEAloYWBUrAoIw0Zg77CeK9N6n8BGl0V59gqW4moFYjSf/h0xxwK', 3, '2017-01-15 00:46:08', 0, 0),
('2222222222', '$2y$10$8jqojzsBPZy0IBt6jMNL3uIhrxHz/0uNzlg8pDfkIO32zZfjd3chC', 1, '2017-01-15 05:53:55', 0, 0),
('3333333333', '$2y$10$P1zLKvJ7REDyOdgoWmWXr.ypmQc.lCSGMmT1.3ZfnY.FLTZnw48A2', 1, '2017-01-15 00:45:37', 0, 1),
('4444444444', '$2y$10$15wLvv0rAu/fVtw5PLF6OO4.ergZQZsnmk9S4lM38dQH5tcVtr0Qm', 2, '2017-01-15 00:44:34', 0, 1),
('5555555555', '$2y$10$.EnFDO7F.CVM7Zm.UeajR.JTiEelgtt2YBmaHo/Lh/hQM9OFPyZU2', 1, '2017-01-16 05:18:01', 0, 0),
('6666666666', '$2y$10$GB9OU4SWuGm2vlZSDvEdVukZxwzkx9Oal0Kc5hwCc7uDAp1of2uhq', 2, '2017-01-17 09:43:56', 0, 1),
('7777777777', '$2y$10$VtpITxF0RFEGwoW1u/c8Z..5vY1eY8mrg9FtWYS9Ig8YW92ZWDNRe', 1, '2017-01-17 10:00:17', 0, 0),
('8888888888', '$2y$10$E8xbR5WzCwRkrjNBejKCJOvWURn7gt/ha11n.E8045WMSoyAmtB7i', 2, '2017-01-18 05:23:13', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr`
--

CREATE TABLE `tr` (
  `Fid` int(10) NOT NULL,
  `ClassId` int(3) NOT NULL,
  `Subject` varchar(60) NOT NULL,
  `DelFlag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr`
--

INSERT INTO `tr` (`Fid`, `ClassId`, `Subject`, `DelFlag`) VALUES
(1, 2, 'Web Technologies', 0),
(2, 2, 'Distributed Systems', 0),
(3, 2, 'Software Testing Methodologies', 0),
(4, 2, 'OOAD', 0),
(5, 2, 'MEFA', 0),
(6, 2, 'Information Security', 0),
(6, 1, 'Information Security', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Adminid`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClassId`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Fid`);

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`Feedid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Rollno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Adminid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ClassId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `Fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `Feedid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
