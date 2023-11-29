-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2023 at 02:10 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
CREATE TABLE IF NOT EXISTS `assignment` (
  `assignment_id` int NOT NULL AUTO_INCREMENT,
  `assignment_name` varchar(255) NOT NULL,
  PRIMARY KEY (`assignment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `assignment_name`) VALUES
(1, 'Homework 1'),
(2, 'Lab 1'),
(3, 'Project 1'),
(7, 'Tma 2');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(1, 'Mathematics'),
(2, 'Physics'),
(3, 'Computer Science'),
(4, 'data science'),
(5, 'Python'),
(9, 'data modeling  2');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `mark_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `assignment_id` int DEFAULT NULL,
  `mark` int DEFAULT NULL,
  PRIMARY KEY (`mark_id`),
  KEY `student_id` (`student_id`),
  KEY `course_id` (`course_id`),
  KEY `assignment_id` (`assignment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mark_id`, `student_id`, `course_id`, `assignment_id`, `mark`) VALUES
(1, 1, 1, 1, 90),
(2, 1, 2, 1, 85),
(3, 2, 1, 1, 88),
(4, 2, 2, 1, 92),
(5, 3, 1, 1, 78),
(6, 3, 2, 1, 80),
(7, 1, 3, 2, 95),
(8, 2, 3, 2, 89),
(9, 3, 3, 2, 91),
(10, 4, 1, 3, 75),
(11, 2, 5, 3, 82),
(12, 3, 6, 3, 88),
(13, 7, 4, 1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`) VALUES
(1, 'Alice'),
(2, 'Bob'),
(3, 'Charlie'),
(4, 'John Doe'),
(5, 'Jane Smith');

-- --------------------------------------------------------

--
-- Table structure for table `student_record`
--

DROP TABLE IF EXISTS `student_record`;
CREATE TABLE IF NOT EXISTS `student_record` (
  `record_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  `term` int NOT NULL,
  `year` int NOT NULL,
  `mark` int DEFAULT NULL,
  PRIMARY KEY (`record_id`),
  KEY `student_id` (`student_id`),
  KEY `course_id` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_record`
--

INSERT INTO `student_record` (`record_id`, `student_id`, `course_id`, `term`, `year`, `mark`) VALUES
(1, 1, 1, 5, 2023, 85),
(2, 1, 1, 3, 2022, 90),
(3, 1, 1, 4, 2023, 88),
(4, 1, 1, 6, 2023, 82),
(5, 3, 1, 1, 2022, 78),
(6, 3, 2, 1, 2022, 80),
(7, 1, 1, 2, 2022, 95),
(8, 2, 3, 2, 2022, 89),
(9, 3, 3, 2, 2022, 91),
(11, 2, 1, 3, 2022, 82),
(12, 3, 1, 3, 2022, 88),
(13, 1, 1, 1, 2023, 90),
(15, 2, 1, 1, 2023, 92),
(16, 2, 2, 1, 2023, 85),
(17, 3, 1, 1, 2023, 80),
(18, 3, 2, 1, 2023, 78),
(20, 2, 3, 2, 2023, 89),
(21, 3, 3, 2, 2023, 94),
(23, 2, 1, 3, 2023, 88),
(24, 3, 1, 3, 2023, 90);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
