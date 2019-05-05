-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2019 at 11:50 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lebonclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `inscri`
--

CREATE TABLE `inscri` (
  `id` int(8) NOT NULL,
  `metadata` json NOT NULL,
  `club_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscri`
--

INSERT INTO `inscri` (`id`, `metadata`, `club_id`) VALUES
(2, '{\"gender\": \"M\", \"number\": \"\", \"location\": \"rue roda nb 107\", \"name_last\": \"hamza\", \"name_child\": \"mohamed amine hamza\", \"name_first\": \"mohamed\", \"profession\": \"\"}', 0),
(3, '{\"gender\": \"M\", \"number\": \"\", \"location\": \"rue roda nb 107\", \"name_last\": \"hamza\", \"name_child\": \"mohamed amine hamza\", \"name_first\": \"mohamed\", \"profession\": \"\"}', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inscri`
--
ALTER TABLE `inscri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inscri`
--
ALTER TABLE `inscri`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
