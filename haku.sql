-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2019 at 01:31 PM
-- Server version: 10.3.13-MariaDB-2
-- PHP Version: 7.2.17-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autometa`
--

-- --------------------------------------------------------

--
-- Table structure for table `haku`
--

CREATE TABLE `haku` (
  `randomid` double NOT NULL,
  `keyword` text NOT NULL,
  `picture_id` text NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `haku`
--

INSERT INTO `haku` (`randomid`, `keyword`, `picture_id`, `user_id`) VALUES
(1, 'dog', 'img001.bmp', 'user01'),
(2, 'golden retriever', 'img001.bmp', 'user01'),
(3, 'legs', 'img002.bmp', 'user02'),
(4, 'dog', 'img002.bmp', 'user02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `haku`
--
ALTER TABLE `haku`
  ADD PRIMARY KEY (`randomid`) USING BTREE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
