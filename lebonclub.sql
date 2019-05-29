-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2019 at 03:11 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.18-1+ubuntu18.04.1+deb.sury.org+1

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
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` text NOT NULL,
  `detail` text NOT NULL,
  `monday_friday_open_hour` varchar(10) NOT NULL,
  `saturday_open_hour` varchar(10) NOT NULL,
  `sunday_open_hour` varchar(10) NOT NULL,
  `monday_friday_close_hour` varchar(10) NOT NULL,
  `saturday_close_hour` varchar(10) NOT NULL,
  `sunday_close_hour` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `img`, `detail`, `monday_friday_open_hour`, `saturday_open_hour`, `sunday_open_hour`, `monday_friday_close_hour`, `saturday_close_hour`, `sunday_close_hour`) VALUES
(1, 'Club X1', 'images/act1.jpeg', 'Lorem ipsum dolor sit amet, ex mea eius velit consequat', '07:30', '07:30', 'close', '17:30', '13:30', 'close'),
(2, 'Club X1', 'images/act1.jpeg', 'Lorem ipsum dolor sit amet, ex mea eius velit consequat', '07:30', '07:30', 'close', '17:30', '13:30', 'close'),
(3, 'Club X1', 'images/act1.jpeg', 'Lorem ipsum dolor sit amet, ex mea eius velit consequat', '07:30', '07:30', 'close', '17:30', '13:30', 'close'),
(4, 'Club X1', 'images/act1.jpeg', 'Lorem ipsum dolor sit amet, ex mea eius velit consequat', '07:30', '07:30', 'close', '17:30', '13:30', 'close'),
(5, 'Club X1', 'images/act1.jpeg', 'Lorem ipsum dolor sit amet, ex mea eius velit consequat', '07:30', '07:30', 'close', '17:30', '13:30', 'close'),
(6, 'Club X1', 'images/act1.jpeg', 'Lorem ipsum dolor sit amet, ex mea eius velit consequat', '07:30', '07:30', 'close', '17:30', '13:30', 'close'),
(7, 'Club X1', 'images/act1.jpeg', 'Lorem ipsum dolor sit amet, ex mea eius velit consequat', '07:30', '07:30', 'close', '17:30', '13:30', 'close'),
(8, 'Club X1', 'images/act1.jpeg', 'Lorem ipsum dolor sit amet, ex mea eius velit consequat', '07:30', '07:30', 'close', '17:30', '13:30', 'close');

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
(2, '{\"gender\": \"M\", \"number\": \"\", \"location\": \"rue roda nb 107\", \"name_last\": \"hamza\", \"name_child\": \"mohamed amine hamza\", \"name_first\": \"mohamed\", \"profession\": \"\"}', 2),
(3, '{\"gender\": \"M\", \"number\": \"\", \"location\": \"rue roda nb 107\", \"name_last\": \"hamza\", \"name_child\": \"mohamed amine hamza\", \"name_first\": \"mohamed\", \"profession\": \"\"}', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inscri`
--
ALTER TABLE `inscri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inscri`
--
ALTER TABLE `inscri`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
