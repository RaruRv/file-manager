-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2020 at 05:21 PM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wr`
--

-- --------------------------------------------------------

--
-- Table structure for table `directory_list`
--

CREATE TABLE `directory_list` (
  `directory_id` int NOT NULL,
  `directory_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `directory_list`
--

INSERT INTO `directory_list` (`directory_id`, `directory_name`) VALUES
(21, '/var/www/html/wR/assets/assets/img/portfolio/');

-- --------------------------------------------------------

--
-- Table structure for table `files_list`
--

CREATE TABLE `files_list` (
  `file_id` int NOT NULL,
  `file_name` text NOT NULL,
  `directory_id` int NOT NULL,
  `status` char(8) NOT NULL DEFAULT 'ENABLED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `files_list`
--

INSERT INTO `files_list` (`file_id`, `file_name`, `directory_id`, `status`) VALUES
(57, '..', 21, 'ENABLED'),
(58, 'cabin.png', 21, 'ENABLED'),
(59, 'cake.png', 21, 'ENABLED'),
(60, 'circus.png', 21, 'ENABLED'),
(61, 'game.png', 21, 'ENABLED'),
(62, 'safe.png', 21, 'ENABLED'),
(63, 'submarine.png', 21, 'ENABLED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directory_list`
--
ALTER TABLE `directory_list`
  ADD PRIMARY KEY (`directory_id`);

--
-- Indexes for table `files_list`
--
ALTER TABLE `files_list`
  ADD PRIMARY KEY (`file_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `directory_list`
--
ALTER TABLE `directory_list`
  MODIFY `directory_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `files_list`
--
ALTER TABLE `files_list`
  MODIFY `file_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
