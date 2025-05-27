-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2025 at 09:39 AM
-- Server version: 8.0.41-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `pname` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `pprop` text CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `pprice` int NOT NULL,
  `pcount` int NOT NULL,
  `ppic` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `pprop`, `pprice`, `pcount`, `ppic`) VALUES
(1, 'گردن بند', 'بسیار زیبا با فالن', 15000, 5, ''),
(10, 'gy', '2bubi', 2, 10, ''),
(201, 'hhh', 'bhuigyi', 250, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `singup`
--

CREATE TABLE `singup` (
  `code` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `emil` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `singup`
--

INSERT INTO `singup` (`code`, `name`, `emil`, `password`) VALUES
(9, 'matin', 'matin@gmail.com', 'matinking.ir'),
(10, 'maitn', 'maitnking@gmail.com', 'matin'),
(11, 'admin', 'admin@gmail.com', 'admin'),
(12, 'mmd ', 'mmdsar@gmailcom', 'mmd'),
(13, 'reza', 'rezaali@gmail.com', 'rezaali'),
(14, 'mohammad', 'mohammad@gmail.com', 'maitn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singup`
--
ALTER TABLE `singup`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3133;

--
-- AUTO_INCREMENT for table `singup`
--
ALTER TABLE `singup`
  MODIFY `code` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
