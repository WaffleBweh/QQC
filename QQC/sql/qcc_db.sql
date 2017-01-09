-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2017 at 11:39 AM
-- Server version: 5.7.13-log
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qcc_db`
--
CREATE DATABASE IF NOT EXISTS `qcc_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `qcc_db`;

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

DROP TABLE IF EXISTS `buildings`;
CREATE TABLE `buildings` (
  `name` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

DROP TABLE IF EXISTS `classrooms`;
CREATE TABLE `classrooms` (
  `name` varchar(20) NOT NULL,
  `idBuilding` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deroule`
--

DROP TABLE IF EXISTS `deroule`;
CREATE TABLE `deroule` (
  `idLesson` varchar(10) NOT NULL,
  `idClassroom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE `follow` (
  `idStudent` int(11) NOT NULL,
  `idLesson` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `give`
--

DROP TABLE IF EXISTS `give`;
CREATE TABLE `give` (
  `idTeacher` int(11) NOT NULL,
  `idLesson` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
CREATE TABLE `lesson` (
  `nickname` varchar(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `idSchoolTerms` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schoolterms`
--

DROP TABLE IF EXISTS `schoolterms`;
CREATE TABLE `schoolterms` (
  `id` varchar(40) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studentgroups`
--

DROP TABLE IF EXISTS `studentgroups`;
CREATE TABLE `studentgroups` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `idStudentGroup` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `nickname` varchar(4) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`name`),
  ADD KEY `idBuilding` (`idBuilding`);

--
-- Indexes for table `deroule`
--
ALTER TABLE `deroule`
  ADD PRIMARY KEY (`idLesson`,`idClassroom`),
  ADD KEY `idClassroom` (`idClassroom`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`idStudent`,`idLesson`),
  ADD KEY `idLesson` (`idLesson`);

--
-- Indexes for table `give`
--
ALTER TABLE `give`
  ADD PRIMARY KEY (`idTeacher`,`idLesson`),
  ADD KEY `idLesson` (`idLesson`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`nickname`),
  ADD KEY `idSchoolTerms` (`idSchoolTerms`);

--
-- Indexes for table `schoolterms`
--
ALTER TABLE `schoolterms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentgroups`
--
ALTER TABLE `studentgroups`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idStudentGroup` (`idStudentGroup`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_ibfk_1` FOREIGN KEY (`idBuilding`) REFERENCES `buildings` (`name`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `deroule`
--
ALTER TABLE `deroule`
  ADD CONSTRAINT `deroule_ibfk_1` FOREIGN KEY (`idLesson`) REFERENCES `lesson` (`nickname`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `deroule_ibfk_2` FOREIGN KEY (`idClassroom`) REFERENCES `classrooms` (`name`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`idLesson`) REFERENCES `lesson` (`nickname`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `give`
--
ALTER TABLE `give`
  ADD CONSTRAINT `give_ibfk_1` FOREIGN KEY (`idTeacher`) REFERENCES `teachers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `give_ibfk_2` FOREIGN KEY (`idLesson`) REFERENCES `lesson` (`nickname`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`idSchoolTerms`) REFERENCES `schoolterms` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`idStudentGroup`) REFERENCES `studentgroups` (`name`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
