-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 06:35 PM
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
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `degree`) VALUES
('AE', 'Aeronautical Engineering ', 'BE/BTECH'),
('AME', 'AUTOMOBILE ENGINEERING', 'BE/BTECH'),
('AR', 'AUTOMATION AND ROBOTICS', 'BE/BTECH'),
('BE', 'BIOCHEMICAL ENGINEERING', 'BE/BTECH'),
('BT', 'BIOTECHNOLOGY', 'BE/BTECH'),
('CE', 'COMPUTER ENGINEERING', 'BE/BTECH'),
('CEG', 'CERAMIC ENGINEERING', 'BE/BTECH'),
('CEN', 'CERAMIC ENGINEERING', 'BE/BTECH'),
('CH', 'CHEMICAL ENGINEERING', 'BE/BTECH'),
('CS', 'COMPUTER SCIENCE AND ENGINEERING', 'BE/BTECH'),
('CS(AIML)', 'COMPUTER SCEINCE AND ENGINEERING ARTIFICIAL INTELLIGENCE AND MACHINE LEARNING', 'BE/BTECH'),
('CS(CLOUD)', 'COMPUTER SCEINCE AND ENGINEERING CLOUD AND BIG DATA', 'BE/BTECH'),
('CS(CS)', 'COMPUTER SCEINCE AND ENGINEERING CYBER SECURITY', 'BE/BTECH'),
('CS(IOT)', 'COMPUTER SCIENCE AND ENGINEERING INTERNET OF THINGS', 'BE/BTECH'),
('CSN', 'COMPUTER SCEINCE AND NETWORKING', 'BE/BTECH'),
('CV', 'CIVIL ENGINEERING', 'BE/BTECH'),
('EC', 'ELECTRONICS AND COMMUNICATIONS', 'BE/BTECH'),
('ECE', 'ELECTRICAL ENGINEERING', 'BE/BTECH'),
('EE', 'ENVIROMENTAL ENGINEERING', 'BE/BTECH'),
('IT', 'INFORMATION AND TECHNOLOGIES', 'BE/BTECH'),
('ITE', 'INFORMATION TECHNOLOGIES AND ENGINEERING', 'BE/BTECH'),
('ITEN', 'INSTRUMENTATION ENGINEERING', 'BE/BTECH'),
('MB', 'MICROBIOLOGY', 'BE/BTECH'),
('ME', 'MECHANICAL ENGINEERING', 'BE/BTECH'),
('ME-AA', 'AIR ARMAMENT', 'MTECH'),
('ME-ACE', 'AQUA CULTURE ENGINNEERING', 'MTECH'),
('ME-AE', 'AEROSPACE ENGINEERING', 'MTECH'),
('ME-AEL', 'APPLIED ELECTRONICS', 'MTECH'),
('ME-AT', 'ALLOY TECHNOLOGY', 'MTECH'),
('ME-BM', 'BIOMEDICAL ENGINEERING', 'MTECH'),
('ME-BME', 'BIO MINERAL ENGINEERING', 'MTECH'),
('ME-CE', 'COMPUTER ENGINEERING', 'MTECH'),
('ME-CEM', 'CONSTRUCTION ENGINEERING MANAGEMENT', 'MTECH'),
('ME-CMS', 'COMMUNICATION SYSTEMS', 'MTECH'),
('ME-CNE', 'COMPUTER NETWORK ENGINEERING', 'MTECH'),
('ME-CONS', 'CONTROL SYSTEMS', 'MTECH'),
('ME-CS', 'COMPUTER SCIENCE AND ENGINEERING', 'MTECH'),
('ME-CYS', 'CYBER SECURITY', 'MTECH'),
('ME-DE', 'DIGITAL ELECTRONICS AND COMMUNICATION SYSTEMS', 'MTECH'),
('ME-EP', 'ENGINEERING PHYSICS', 'MTECH'),
('ME-FB', 'FOOD BIOTECHNOLOGY', 'MTECH'),
('ME-FD', 'FLUID DYNAMICS', 'MTECH'),
('ME-GE', 'GEOTECHNICAL ENGINEERING', 'MTECH'),
('ME-NT', 'NANO TECHNOLOGY', 'MTECH'),
('ME-PHE', 'PHARMASUTICAL ENGINEERING', 'MTECH'),
('ME-RE', 'ROBOTICS ENGINEERING', 'MTECH'),
('MEC', 'MECHATRONICS ENGINEERING', 'BE/BTECH'),
('PE', 'PHARMASUTICAL ENGINEERING', 'BE/BTECH'),
('PEN', 'PRODUCTION ENGINEERING', 'BE/BTECH'),
('TE', 'TEXTILE ENGINEERING', 'BE/BTECH'),
('TEN', 'TELECOMUNICATION ENGINEERING', 'BE/BTECH');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `teachername` varchar(255) NOT NULL,
  `teacherid` int(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `sem` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `subject`, `teachername`, `teacherid`, `branch`, `sem`) VALUES
(6, 'SESH1080', 'demo teacher', 4, 'CS', 1),
(7, 'SECV1050', 'demo teacher', 4, 'CS', 1);

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
(1, 'attachements/exam/177.pdf', '2022-07-25', 1, 'BE/BTECH'),
(2, '../../admin/attachements/exam/460.pdf', '2022-01-02', 1, 'BE/BTECH');

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
(21, 'SESH1080', '21SE02CS001,21SE02CS003,', '21SE02CS002,', 'BE/BTECH', 'CS', '1', '2022-08-24 08:14:55', '2022-08-24 08:14:55'),
(22, 'SESH-1111', '21SE02CS001,21SE02CS002,', '21SE02CS003,', 'BE/BTECH', 'CS', '1', '2022-09-14 09:32:55', '2022-09-14 09:32:55');

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
  `branchid` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `semester` int(255) NOT NULL,
  `enrollment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `studentname`, `dob`, `age`, `gender`, `address`, `pincode`, `mobile`, `email`, `password`, `photourl`, `fathername`, `proffesionf`, `mobilef`, `mothername`, `proffesionm`, `mobilem`, `physicst`, `physicsp`, `chemistryt`, `chemistryp`, `mathst`, `english`, `percentage`, `branchid`, `year`, `semester`, `enrollment`) VALUES
(4, 'Boraisa sohamsinh jitendrasinh', '2003-12-01', 18, 'A/206 shriji villa recidency ', 'A/206 shriji villa recidency ', 33002, 2147483647, 'sohamb2019@gmail.com', '1234567', 'students/Boraisa/WhatsApp Image 2022-02-08 at 7.38.04 PM.jpeg', 'Boraisa jitendrasinh narpatsinh', 'job', 2147483647, 'Borasia hemlataben jitendrasinh', 'teacher', 2147483647, 77, 77, 77, 77, 77, 77, 77, 'CS', 21, 1, '21SE02CS001'),
(5, 'Brahmbhatt yuvraj shyamsinh', '2022-07-26', 18, 'kuchh bhi likh do', 'kuchh bhi likh do', 393002, 2147483647, 'sohamb2020@gmail.com', '1234567', 'students/Brahmbhatt/Vehical-Color-Change-Film.jpg', 'asdxxs', 'buissness', 2147483647, 'sdcdcsc', 'buissness', 2147483647, 77, 77, 77, 77, 77, 7, 77, 'CS', 21, 1, '21SE02CS003'),
(10, 'Boraisa trrr rf', '2022-06-16', 12, 'male', 'edeffrfrf', 393002, 2147483647, 'sohamb2024@gmail.com', '1234567', 'students/Boraisa/Vehical-Color-Change-Film.jpg', 'dcdfff', 'buissness', 2147483647, 'cdsdfg', 'buissness', 2147483647, 11, 11, 11, 11, 11, 11, 11, 'CS', 21, 1, '21SE02CS002');

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
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id` int(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sem` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 4, 'SESH1080', 'CS', 1, 'BE/BTECH', 'c-107', '05:14:55', '08:32:55'),
(3, 4, 'SESH-1111', 'CS', 1, 'BE/BTECH', 'C-888', '09:32:55', '10:32:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachements`
--
ALTER TABLE `attachements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch` (`branch`);

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
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD CONSTRAINT `branch` FOREIGN KEY (`branch`) REFERENCES `branches` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
