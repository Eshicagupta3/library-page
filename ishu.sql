-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2017 at 05:44 PM
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
-- Database: `ishu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('ishika', 'ishika'),
('ishi', 'i');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `sem` int(10) NOT NULL,
  `available` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `title`, `author`, `sem`, `available`) VALUES
(1, 'physics', 'schand', 1, 11),
(2, 'math', 'hk', 1, 31),
(3, 'math', 'vk', 1, 18),
(4, 'physics', 'pk', 2, 13),
(5, 'chemistry', 'schand', 2, 0),
(6, 'chemistry', 'vk', 3, 8),
(7, 'chemistry', 'pradeep', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `no` int(15) NOT NULL,
  `stu_name` varchar(20) NOT NULL,
  `enrollment` int(20) NOT NULL,
  `year` int(10) NOT NULL,
  `book_title` varchar(30) NOT NULL,
  `book_author` varchar(20) NOT NULL,
  `issue_date` varchar(20) NOT NULL,
  `return_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`no`, `stu_name`, `enrollment`, `year`, `book_title`, `book_author`, `issue_date`, `return_date`) VALUES
(61, 'divya', 4, 3, 'physics', 'schand', '20-08-17', '24-08-17'),
(62, 'divya', 4, 3, 'math', 'hk', '20-08-17', '24-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `enrollment` int(11) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`username`, `password`, `enrollment`, `branch`, `year`) VALUES
('ishika', 'i', 1, 'it', 3),
('ishi', 'i', 2, 'it', 3),
('rachit', 'r', 3, 'it', 3),
('divya', 'divya', 4, 'ec', 3);

-- --------------------------------------------------------

--
-- Table structure for table `my`
--

CREATE TABLE `my` (
  `username` varchar(10) NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my`
--

INSERT INTO `my` (`username`, `password`) VALUES
('10', 0),
('ishika', 0),
('a', 1),
('aa', 1),
('ishi', 123),
('q', 12),
('vbn', 123),
('isha', 123),
('i', 1),
('is', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(50) NOT NULL,
  `imglink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `username`, `password`, `imglink`) VALUES
(2, 'isha', 123, 'uploads/16252238_748843178614546_7393410189944989222_o.jpg'),
(3, 'i', 1, 'uploads/IMG-20170208-WA0031.jpg'),
(4, 'isg', 1, 'uploads/download1.png'),
(5, 'isu', 1, 'uploads/ishika1.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`enrollment`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `isbn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `enrollment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
