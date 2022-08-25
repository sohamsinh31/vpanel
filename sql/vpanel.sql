-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 06:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachements`
--

CREATE TABLE `attachements` (
  `id` int(255) NOT NULL,
  `classid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `type2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attachements`
--

INSERT INTO `attachements` (`id`, `classid`, `name`, `path`, `type2`) VALUES
(10, 6, 'Unit1', 'attachements/6/136.pdf', 'pdf'),
(11, 6, 'unit1', 'attachements/6/926.mp4', 'video'),
(12, 6, 'unit1', 'attachements/6/306.png', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `teachername` varchar(255) NOT NULL,
  `teacherid` int(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `sem` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `subject`, `teachername`, `teacherid`, `degree`, `branch`, `sem`) VALUES
(6, 'SESH1080', 'vikas s. chomal', 4, 'BE/BTECH', 'CS', 1),
(7, 'SECV1050', 'vikas s. chomal', 4, 'BE/BTECH', 'CS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `examtable`
--

CREATE TABLE `examtable` (
  `id` int(255) NOT NULL,
  `pdfurl` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `sem` int(255) NOT NULL,
  `degree` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examtable`
--

INSERT INTO `examtable` (`id`, `pdfurl`, `date`, `sem`, `degree`) VALUES
(1, 'attachements/exam/177.pdf', '2022-07-25', 1, 'BE/BTECH');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` bigint(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `absent` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `absent`, `degree`, `branch`, `semester`, `start_datetime`, `end_datetime`) VALUES
(8, 'SESH1080', ',21SE02CS001,21SE02CS003,', ',21SE02CS002,', 'BE/BTECH', 'CS', '1', '2022-06-24 20:56:00', '2022-06-24 21:56:00'),
(12, 'SESH1080', ',21SE02CS001,21SE02CS002,21SE02CS003,', 'none', 'BE/BTECH', 'CS', '1', '2022-06-26 11:38:00', '2022-06-26 00:39:00'),
(14, 'SESH1070', '21SE02CS001,21SE02CS002,21SE02CS003,', '', 'BE/BTECH', 'CS', '1', '2022-06-26 11:50:00', '2022-06-26 00:50:00'),
(15, 'SESH1070', '21SE02CS001,21SE02CS002,21SE02CS003,', '', 'BE/BTECH', 'CS', '1', '2022-06-26 11:50:00', '2022-06-26 00:50:00'),
(16, 'SESH1080', '21SE02CS002,21SE02CS003,', '21SE02CS001,', 'BE/BTECH', 'CS', '1', '2022-06-27 22:06:00', '2022-06-26 23:07:00'),
(21, 'SESH1080', '21SE02CS001,21SE02CS003,', '21SE02CS002,', 'BE/BTECH', 'CS', '1', '2022-08-24 08:14:55', '2022-08-24 08:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(255) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` int(255) NOT NULL,
  `mobile` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photourl` varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `proffesionf` varchar(255) NOT NULL,
  `mobilef` int(255) NOT NULL,
  `mothername` varchar(255) NOT NULL,
  `proffesionm` varchar(255) NOT NULL,
  `mobilem` int(255) NOT NULL,
  `physicst` int(255) NOT NULL,
  `physicsp` int(255) NOT NULL,
  `chemistryt` int(255) NOT NULL,
  `chemistryp` int(255) NOT NULL,
  `mathst` int(255) NOT NULL,
  `english` int(255) NOT NULL,
  `percentage` int(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `semester` int(255) NOT NULL,
  `enrollment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `studentname`, `dob`, `age`, `gender`, `address`, `pincode`, `mobile`, `email`, `password`, `photourl`, `fathername`, `proffesionf`, `mobilef`, `mothername`, `proffesionm`, `mobilem`, `physicst`, `physicsp`, `chemistryt`, `chemistryp`, `mathst`, `english`, `percentage`, `degree`, `branch`, `year`, `semester`, `enrollment`) VALUES
(4, 'Boraisa sohamsinh jitendrasinh', '2003-12-01', 18, 'A/206 shriji villa recidency ', 'A/206 shriji villa recidency ', 33002, 2147483647, 'sohamb2019@gmail.com', '1234567', 'students/Boraisa/WhatsApp Image 2022-02-08 at 7.38.04 PM.jpeg', 'Boraisa jitendrasinh narpatsinh', 'job', 2147483647, 'Borasia hemlataben jitendrasinh', 'teacher', 2147483647, 77, 77, 77, 77, 77, 77, 77, 'BE/BTECH', 'CS', 21, 1, '21SE02CS001'),
(5, 'Brahmbhatt yuvraj shyamsinh', '2022-07-26', 18, 'kuchh bhi likh do', 'kuchh bhi likh do', 393002, 2147483647, 'sohamb2020@gmail.com', '1234567', 'students/Brahmbhatt/Vehical-Color-Change-Film.jpg', 'asdxxs', 'buissness', 2147483647, 'sdcdcsc', 'buissness', 2147483647, 77, 77, 77, 77, 77, 7, 77, 'BE/BTECH', 'CS', 21, 1, '21SE02CS003'),
(10, 'Boraisa trrr rf', '2022-06-16', 12, 'male', 'edeffrfrf', 393002, 2147483647, 'sohamb2024@gmail.com', '1234567', 'students/Boraisa/Vehical-Color-Change-Film.jpg', 'dcdfff', 'buissness', 2147483647, 'cdsdfg', 'buissness', 2147483647, 11, 11, 11, 11, 11, 11, 11, 'BE/BTECH', 'CS', 21, 1, '21SE02CS002');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(255) NOT NULL,
  `teachername` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teachername`, `degree`, `branch`, `profession`, `email`, `password`) VALUES
(4, 'teacher', 'BE/BTECH', 'CSE', 'Computer', 'teacher@gmail.com', '1234567'),
(5, 'Admin', 'BE/BTECH', 'CSE', 'Admin of collage', 'superuser@gmail.com', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` bigint(255) NOT NULL,
  `teacherid` bigint(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `sem` int(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `teacherid`, `subject`, `branch`, `sem`, `degree`, `class`, `starttime`, `endtime`) VALUES
(1, 4, 'SESH1080', 'CS', 1, 'BE/BTECH', 'c-107', '08:14:55', '10:32:55'),
(2, 4, 'SESH1070', 'CS', 1, 'BE/BTECH', 'c-101', '04:32:55', '08:48:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachements`
--
ALTER TABLE `attachements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examtable`
--
ALTER TABLE `examtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachements`
--
ALTER TABLE `attachements`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `examtable`
--
ALTER TABLE `examtable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
