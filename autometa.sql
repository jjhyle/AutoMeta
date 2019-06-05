-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2019 at 01:29 PM
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
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `picture_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `keyword`, `picture_id`, `user_id`) VALUES
(1, 'dog', 1, 5286),
(2, 'dog', 2, 5286),
(3, 'dog', 4, 5286),
(4, 'cat', 5, 5286),
(5, 'female', 6, 5286),
(6, 'dog', 3, 5286),
(7, 'female', 7, 5286),
(8, 'male', 8, 5286),
(9, 'male', 9, 5286);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `keyword_id` int(11) NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`keyword_id`, `keyword`) VALUES
(15, 'Cheerleader'),
(6, 'Child'),
(4, 'adult '),
(48, 'africa  '),
(1, 'age '),
(44, 'airplane  '),
(49, 'america  '),
(47, 'asia  '),
(8, 'attorney'),
(9, 'audience'),
(10, 'author'),
(5, 'baby '),
(25, 'bear  '),
(53, 'beverge'),
(42, 'bicycle  '),
(28, 'bird  '),
(11, 'bishop'),
(12, 'blacksmith]'),
(43, 'boat  '),
(13, 'bride'),
(45, 'buildings  '),
(26, 'camel  '),
(14, 'cantor'),
(40, 'car  '),
(24, 'cat  '),
(16, 'chef '),
(50, 'clothing  '),
(17, 'clown'),
(18, 'coach '),
(19, 'competitor'),
(20, 'concessionaire'),
(27, 'cow  '),
(21, 'cowboy '),
(23, 'dog'),
(46, 'europe  '),
(3, 'female'),
(22, 'fish  '),
(52, 'food  '),
(30, 'grass  '),
(31, 'leaves  '),
(32, 'lichen  '),
(2, 'male '),
(33, 'moss  '),
(41, 'motorbike  '),
(34, 'seaweed  '),
(35, 'shrub  '),
(38, 'sports  '),
(7, 'teenager'),
(36, 'thistle  '),
(37, 'tree  '),
(39, 'weather  '),
(51, 'wedding  '),
(29, 'wolf  ');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `picturename` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`picture_id`, `picturename`, `location`) VALUES
(1, 'golden.jpeg', ''),
(2, 'dog.jpeg', ''),
(3, 'golden2.jpg', ''),
(4, 'hauva.gif', 'desktop'),
(5, 'elain.jpeg', ''),
(6, 'keira.jpeg', ''),
(7, 'marvel.jpg', ''),
(8, 'male.png', ''),
(9, '', 'https://youtu.be/av5JD1dfj_c.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `verified`, `token`, `user_type`, `password`) VALUES
(5286, 'tommi', 't.laiho@gmail.com', 0, '24f71f5171dd44f1ae9011768d07de0e8cb2dc6e83199d7d30273b935fa3a82794e61a3c69c6bfb5f98ab5ff267fbc9ce21c', 'user', '$2y$10$itDL8uje/.30LZ7pVQSgHOgdbwN5tLaICZEGYeazvk0vm0KHIyonK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`,`picture_id`,`keyword`,`user_id`),
  ADD UNIQUE KEY `PK_gallery` (`keyword`,`picture_id`,`user_id`) USING BTREE,
  ADD KEY `picture_view` (`picture_id`),
  ADD KEY `user_view` (`user_id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`keyword`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5287;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `picture_view` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`picture_id`),
  ADD CONSTRAINT `user_view` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
