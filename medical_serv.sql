-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2023 at 08:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_serv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `admin_type` enum('admin','super_admin') NOT NULL DEFAULT 'admin',
  `admin_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_type`, `admin_at`) VALUES
(8, 'Abdelrahman', 'generalal700@gmail.com', '$2y$10$0ZdAd7HnhdmXKp44GSBbGu8bnC6emBX4.iWuEXC9iZuJzgcDsvgT2', 'super_admin', '2023-07-19 01:00:29'),
(11, 'Admin', 'admin@gmail.com', '$2y$10$v0w7QrKOB5chNat/tbcrYuMnf6tBIdIrt5xIPu7q1ariKhEuqLoEm', 'super_admin', '2023-09-26 08:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `city_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_at`) VALUES
(45, 'El-minya', '2023-07-22 23:12:30'),
(47, 'mallawy', '2023-07-22 23:14:39'),
(48, 'Alex', '2023-07-25 20:13:08'),
(49, 'Cairo', '2023-09-26 07:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_mobile` varchar(25) NOT NULL,
  `order_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `order_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `order_serv_name` varchar(100) NOT NULL,
  `order_city_name` varchar(100) NOT NULL,
  `order_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_mobile`, `order_email`, `order_notes`, `order_serv_name`, `order_city_name`, `order_at`) VALUES
(140, 'Abdelrahman', '01013230', '', '    ', 'Medical consultation', 'mallawy', '2023-07-22 23:15:14'),
(142, 'Abdelrahmans', '01013230', '', '      ', 'medical dliver', 'El-minya', '2023-07-22 23:15:27'),
(143, 'Abdelrahmansss', '01013230', '', '        ', 'medical dliver', 'El-minya', '2023-07-22 23:15:37'),
(144, 'Abdelrahmansss', '01013230', '', '          ', 'medical dliver', 'El-minya', '2023-07-22 23:15:54'),
(145, 'Abdelrahmansssaaa', '01013230', '', '            ', 'medical dliver', 'El-minya', '2023-07-22 23:16:03'),
(146, 'Abdelrahman', '01013230248', 'general@gmail.com', '  ', 'medical dliver', 'mallawy', '2023-07-25 20:08:19'),
(147, 'Ahmed ELmahady', '01013230248', '', '  ', 'Medical consultation', 'El-minya', '2023-07-25 20:12:21'),
(164, 'aswsdqw', '01013230248', 'generalal@gmail.com', '                      this is My Name', 'medical dliver', 'El-minya', '2023-09-26 07:15:27'),
(171, 'aswsdqw', '01013230248', 'generalal@gmail.com', '                                  this is My Name', 'medical dliver', 'El-minya', '2023-09-26 07:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serv_id` int NOT NULL,
  `serv_name` varchar(100) NOT NULL,
  `serv_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serv_id`, `serv_name`, `serv_at`) VALUES
(33, 'medical dliver', '2023-07-22 23:12:39'),
(34, 'Medical consultation', '2023-07-22 23:14:54'),
(35, 'Medicl DON', '2023-07-25 20:13:34'),
(36, 'Medical Test', '2023-09-26 07:17:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `city_name` (`city_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_serv_id` (`order_serv_name`),
  ADD KEY `order_city_id` (`order_city_name`),
  ADD KEY `order_city_name` (`order_city_name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serv_id`),
  ADD KEY `serv_name` (`serv_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serv_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_city_name`) REFERENCES `cities` (`city_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_serv_name`) REFERENCES `services` (`serv_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
