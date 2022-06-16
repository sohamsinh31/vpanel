-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2014 at 02:35 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbexam`
--
CREATE DATABASE IF NOT EXISTS `dbexam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbexam`;

-- --------------------------------------------------------

--
-- Table structure for table `tbq1word`
--

CREATE TABLE IF NOT EXISTS `tbq1word` (
  `wordid` int(11) NOT NULL AUTO_INCREMENT,
  `wquestion` varchar(50) DEFAULT NULL,
  `wanswer` varchar(25) DEFAULT NULL,
  `uemail` varchar(25) DEFAULT NULL,
  `subid` int(11) DEFAULT NULL,
  PRIMARY KEY (`wordid`),
  KEY `subid` (`subid`),
  KEY `uemail` (`uemail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbq1word`
--

INSERT INTO `tbq1word` (`wordid`, `wquestion`, `wanswer`, `uemail`, `subid`) VALUES
(1, 'What is 2+2?', '4', 'admin@exam.com', 1),
(2, 'What is 4+5?', '9', 'admin@exam.com', 1),
(3, 'What is 3+9?', '9', 'admin@exam.com', 1),
(4, 'What is 5+7?', '12', 'admin@exam.com', 1),
(5, 'What is 18+2?', '20', 'admin@exam.com', 1),
(6, 'What is the colour of the sun?', 'Yellow', 'admin@exam.com', 2),
(7, 'What is the colour of teeth?', 'white', 'admin@exam.com', 2),
(8, 'What the place where you live?', 'home', 'admin@exam.com', 2),
(9, 'what comes after 3?', '4', 'admin@exam.com', 1),
(11, 'what comes after P?', 'Q', 'admin@exam.com', 2),
(15, 'what comes after C?', 'E', 'admin@exam.com', 2),
(17, 'what is 5+5?', '10', 'admin@exam.com', 1),
(21, 'what is 25+5?', '30', 'admin@exam.com', 1),
(22, 'what comes after L?', 'M', 'admin@exam.com', 2),
(23, 'what is 99+1', '1000', 'admin@exam.com', 1),
(24, 'Write notation for 252', 'two hundred and fifty two', 'admin@exam.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbqbrief`
--

CREATE TABLE IF NOT EXISTS `tbqbrief` (
  `bid` int(11) NOT NULL,
  `bquestion` varchar(50) DEFAULT NULL,
  `banswer` varchar(1000) DEFAULT NULL,
  `uemail` varchar(25) DEFAULT NULL,
  `subid` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid`),
  KEY `subid` (`subid`),
  KEY `uemail` (`uemail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbqbrief`
--

INSERT INTO `tbqbrief` (`bid`, `bquestion`, `banswer`, `uemail`, `subid`) VALUES
(0, 'Write notation for 666.', 'six hundred and sixty six', 'admin@exam.com', 1),
(1, 'What is "Cross your heart, hope to die?"', 'It means if i lie the i will die.', 'admin@exam.com', 2),
(2, 'What should be done to improve listening comprehen', 'Reading is very important and listening to English news and reading English newspaper', 'admin@exam.com', 2),
(3, 'What is the meaning of  You are kidding?', 'It means you are not serious about what you are talking.', 'admin@exam.com', 2),
(4, 'What is am and pm in time ?', 'am is after midnight and pm is past midnight', 'admin@exam.com', 2),
(5, 'Write 254 in notation.', 'Two hundred and fifty four.', 'admin@exam.com', 1),
(6, 'Write 7854 in notation.', 'Seven thousand and eight hundred and fifty four.', 'admin@exam.com', 1),
(7, 'write 7006 in notation.', 'Seven thousand and six', 'admin@exam.com', 1),
(8, 'Write notation for 555.', 'five hundred and fifty five', 'admin@exam.com', 1),
(9, 'what is ment by may god bless his soul.', 'it means person is dead', 'admin@exam.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbqmcq`
--

CREATE TABLE IF NOT EXISTS `tbqmcq` (
  `mcqid` int(11) NOT NULL AUTO_INCREMENT,
  `mcqquestion` varchar(50) DEFAULT NULL,
  `mcqanswer1` varchar(20) DEFAULT NULL,
  `mcqanswer2` varchar(20) DEFAULT NULL,
  `mcqanswer3` varchar(20) DEFAULT NULL,
  `mcqanswer4` varchar(20) DEFAULT NULL,
  `uemail` varchar(25) DEFAULT NULL,
  `subid` int(11) DEFAULT NULL,
  PRIMARY KEY (`mcqid`),
  KEY `subid` (`subid`),
  KEY `uemail` (`uemail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbqmcq`
--

INSERT INTO `tbqmcq` (`mcqid`, `mcqquestion`, `mcqanswer1`, `mcqanswer2`, `mcqanswer3`, `mcqanswer4`, `uemail`, `subid`) VALUES
(1, '______you remember to lock the door?', 'Didn’t', 'Aren’t', 'Haven’t', 'Doesn’t', 'admin@exam.com', 2),
(2, 'Have you found ______missing pen yet?', 'your ', 'you', 'yours', 'your''s', 'admin@exam.com', 2),
(3, 'The film was more enjoyable _____we had expected', 'as', 'then', 'since', 'after', 'admin@exam.com', 2),
(4, '_____they told me is utter nonsense', 'when', 'how', 'what ', 'where', 'admin@exam.com', 2),
(5, '_____comes just before 413.', '403', '410', '411', '412', 'admin@exam.com', 1),
(6, 'In 289, the place value of 8 is_____', 'ones', 'hundreds', 'thousands', 'tens', 'admin@exam.com', 1),
(7, '10+43+34=____', '87', '77', '104334', '188', 'admin@exam.com', 1),
(8, 'what is 888+1', '887', '855', '889', '886', 'admin@exam.com', 1),
(9, 'what comes after C?', 'E', 'D', 'A', 'K', 'admin@exam.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbsub`
--

CREATE TABLE IF NOT EXISTS `tbsub` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `subname` char(15) DEFAULT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbsub`
--

INSERT INTO `tbsub` (`subid`, `subname`) VALUES
(1, 'Maths'),
(2, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `ufname` char(15) DEFAULT NULL,
  `ulname` char(15) DEFAULT NULL,
  `ucontact` int(10) DEFAULT NULL,
  `ucollg` varchar(50) DEFAULT NULL,
  `uboard` char(10) DEFAULT NULL,
  `uemail` varchar(50) NOT NULL,
  `upasswd` varchar(25) DEFAULT NULL,
  `uaddress` varchar(100) DEFAULT NULL,
  `ucountry` char(20) DEFAULT NULL,
  `udesc` varchar(50) DEFAULT NULL,
  `utype` char(15) DEFAULT NULL,
  PRIMARY KEY (`uemail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`ufname`, `ulname`, `ucontact`, `ucollg`, `uboard`, `uemail`, `upasswd`, `uaddress`, `ucountry`, `udesc`, `utype`) VALUES
('admin', 'admin', 1234, 'sicsr', 'siu', 'admin@exam.com', 'admin123', 'pune', 'india', 'admin', 'admin'),
('sameer', 'deshmukh', 2147483647, 'SICSR', 'SYMBIOSIS', 'yogeshdeshmukh90@yahoo.com', 'sameer', 'pune', 'india', 'admin', 'teacher');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbq1word`
--
ALTER TABLE `tbq1word`
  ADD CONSTRAINT `tbq1word_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `tbsub` (`subid`),
  ADD CONSTRAINT `tbq1word_ibfk_2` FOREIGN KEY (`uemail`) REFERENCES `tbuser` (`uemail`);

--
-- Constraints for table `tbqbrief`
--
ALTER TABLE `tbqbrief`
  ADD CONSTRAINT `tbqbrief_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `tbsub` (`subid`),
  ADD CONSTRAINT `tbqbrief_ibfk_2` FOREIGN KEY (`uemail`) REFERENCES `tbuser` (`uemail`);

--
-- Constraints for table `tbqmcq`
--
ALTER TABLE `tbqmcq`
  ADD CONSTRAINT `tbqmcq_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `tbsub` (`subid`),
  ADD CONSTRAINT `tbqmcq_ibfk_2` FOREIGN KEY (`uemail`) REFERENCES `tbuser` (`uemail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
