-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2023 at 02:09 PM
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
-- Database: `demo1`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(2, 'PHP coding Notepad++', '2021-02-08 03:17:15', '2021-02-10 04:00:00'),
(6, 'Basketball', '2021-02-05 00:00:00', '2021-02-05 14:30:00'),
(7, 'Birthday Party', '2021-02-12 00:00:00', '2021-02-13 00:00:00'),
(12, 'dd', '2023-11-16 00:00:00', '2023-11-17 00:00:00'),
(15, 'JAVA', '2023-11-17 00:00:00', '2023-11-18 00:00:00'),
(16, 'SQL', '2023-11-17 00:00:00', '2023-11-18 00:00:00'),
(17, 'JS', '2023-11-17 00:00:00', '2023-11-18 00:00:00'),
(20, 'session 1', '2023-11-15 10:00:00', '2023-11-15 10:30:00'),
(21, 'vue js', '2023-11-19 07:30:00', '2023-11-19 08:00:00'),
(24, 'python lab', '2023-11-22 09:00:00', '2023-11-22 09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `stname` varchar(100) NOT NULL,
  `stclass` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stname`, `stclass`) VALUES
('john', '12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone_number` varchar(20) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `telephone_number`, `nic`, `role`) VALUES
(1, 'user1', 'password123', '12345', '981000706v', 'parent'),
(2, 'user2', 'letmein', '0000123', '199810000706', 'student'),
(3, 'Rinas', '12345', '701231231', '981000700v', 'teacher');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
