-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 01:22 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `looma-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE IF NOT EXISTS `apps` (
  `appid` int(11) NOT NULL AUTO_INCREMENT,
  `app_name` varchar(500) NOT NULL,
  `app_desc` text NOT NULL,
  `app_type` varchar(500) NOT NULL,
  PRIMARY KEY (`appid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`appid`, `app_name`, `app_desc`, `app_type`) VALUES
(1, 'Whiteboard', 'This is an Whiteboard App written in HTML5 using HTML5 canvas API. This can be used to draw things on the canvas.', 'utility');

-- --------------------------------------------------------

--
-- Table structure for table `contentfiles`
--

CREATE TABLE IF NOT EXISTS `contentfiles` (
  `ContentFileID` int(11) NOT NULL AUTO_INCREMENT,
  `FileName` varchar(260) NOT NULL,
  `FileType` varchar(500) NOT NULL COMMENT 'pdf, html-inDir flash',
  PRIMARY KEY (`ContentFileID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contentfiles`
--

INSERT INTO `contentfiles` (`ContentFileID`, `FileName`, `FileType`) VALUES
(1, 'eng.pdf', 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `ContentID` int(11) NOT NULL AUTO_INCREMENT,
  `ContentFileID` int(11) NOT NULL,
  `SubjectID` int(11) NOT NULL,
  `Category` varchar(500) NOT NULL,
  `Subcategory` varchar(500) NOT NULL,
  `ContentType` varchar(500) NOT NULL COMMENT '"Activiy", "Illustrations","Book"',
  PRIMARY KEY (`ContentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`ContentID`, `ContentFileID`, `SubjectID`, `Category`, `Subcategory`, `ContentType`) VALUES
(1, 1, 11, 'Nepal''s History', 'Prithivi Narayan Shah!', 'Book');

-- --------------------------------------------------------

--
-- Table structure for table `savedsessions`
--

CREATE TABLE IF NOT EXISTS `savedsessions` (
  `SessionID` int(11) NOT NULL AUTO_INCREMENT,
  `TeacherID` int(11) NOT NULL,
  `SaveType` varchar(500) NOT NULL COMMENT '"subject" for SubjectID, "content" for ContentID',
  `StateID` int(11) NOT NULL COMMENT 'Corresponding ID for savetype',
  PRIMARY KEY (`SessionID`),
  UNIQUE KEY `TeacherID` (`TeacherID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `savedsessions`
--

INSERT INTO `savedsessions` (`SessionID`, `TeacherID`, `SaveType`, `StateID`) VALUES
(1, 1, 'subject', 11),
(18, 2, 'subject', 11);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `SubjectID` int(11) NOT NULL AUTO_INCREMENT,
  `SubjectName` varchar(500) NOT NULL,
  `ClassNumber` int(11) NOT NULL,
  PRIMARY KEY (`SubjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SubjectID`, `SubjectName`, `ClassNumber`) VALUES
(1, 'English', 1),
(2, 'Nepali', 1),
(3, 'Social Studies', 1),
(4, 'Maths', 1),
(5, 'English', 2),
(6, 'Nepali', 2),
(7, 'Social Studies', 2),
(8, 'Maths', 2),
(9, 'English', 3),
(10, 'Nepali', 3),
(11, 'Social Studies', 3),
(12, 'Maths', 3),
(13, 'English', 4),
(14, 'Nepali', 4),
(15, 'Social Studies', 4),
(16, 'Maths', 4),
(17, 'English', 5),
(18, 'Nepali', 5),
(19, 'Social Studies', 5),
(20, 'Maths', 5),
(21, 'English', 6),
(22, 'Nepali', 6),
(23, 'Social Studies', 6),
(24, 'Maths', 6),
(25, 'English', 7),
(26, 'Nepali', 7),
(27, 'Social Studies', 7),
(28, 'Maths', 7);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `TeacherID` int(11) NOT NULL AUTO_INCREMENT,
  `TeacherFullName` varchar(500) NOT NULL,
  PRIMARY KEY (`TeacherID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`TeacherID`, `TeacherFullName`) VALUES
(1, 'Nootan Ghimire'),
(2, 'Aika Calica');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
