-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 04:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carparkingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `phone` text NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
--CREATE TABLE `id18605985_carparkingsystem`.`users` ( `id` INT(11) NOT NULL , `userid` INT(4) NOT NULL , `name` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , `plate_no` VARCHAR(30) NOT NULL , `phone` INT(12) NOT NULL , `image` VARCHAR(100) NOT NULL ) ENGINE = InnoDB;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `plate_no` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `image` varchar(100) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

I

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--
--CREATE TABLE `id18605985_carparkingsystem`.`booking` ( `id` INT(5) NOT NULL , `userid` INT(4) NOT NULL , `city` VARCHAR(30) NOT NULL , `PlateNumber` VARCHAR(30) NOT NULL , `model` VARCHAR(30) NOT NULL , `vehicle` VARCHAR(30) NOT NULL , `PhoneNumber` INT(12) NOT NULL , `date` DATE NOT NULL , `time` TIME NOT NULL , `status` VARCHAR(20) NOT NULL ) ENGINE = InnoDB;
CREATE TABLE `booking` (
  `id` int(5) NOT NULL,
  `userid` int(4) NOT NULL,
  `city` varchar(30) NOT NULL,
  `PlateNumber` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `slot` varchar(30) NOT NULL,
  `PhoneNumber` int(12) NOT NULL
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `booking`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `booking`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

