-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 05:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petpal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`username`, `password`) VALUES
('petpalservice@gmail.com', 'petpal2024');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `owners_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` bigint(12) DEFAULT NULL,
  `pet_name` varchar(50) DEFAULT NULL,
  `pet_type` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `owners_name`, `email`, `contact`, `pet_name`, `pet_type`, `date`, `status`) VALUES
(2, 'Von Laurence Alfelor', 'men@gmen.men', 9700879105, 'Estrera', 'Dog', '2024-05-25', 'Cancelled'),
(5, 'Roxanne D. Dalag', 'roxannedalag@gmail.com', NULL, 'Luna', 'Cat', '2024-05-25', 'Cancelled'),
(6, 'Roxy Dalag', 'roxannedalag@gmail.com', NULL, 'Peeve', 'Dog', '2024-05-27', 'Cancelled'),
(7, 'Kaye Nuevo', 'kaye.nuevo@evsu.edu.ph', 9078444971, 'Peeve', 'Dog', '2024-05-28', 'Confirmed'),
(8, 'Jamie cons', 'bossjamie@gmail.com', 9987654321, 'Simba', 'Lion king just like ', '2024-05-29', 'Confirmed'),
(9, 'K Nuevo', 'kaye.nuevo@evsu.edu.ph', 9078444971, 'Cath', 'Cat', '2024-05-28', 'Confirmed'),
(10, 'Kei Nuevo', 'kaye.nuevo@evsu.edu.ph', 9465584553, 'Yllac', 'Cat', '2024-05-30', 'Confirmed'),
(11, 'opaw opaw opaw', 'opaw@gmail.com', 98866215, 'Unidentified', 'alien', '2024-05-09', 'Confirmed'),
(12, 'yamimatoy', 'yamimatoy@gmail.com', 9700879105, 'Idiot', 'human type', '2024-05-02', 'Confirmed'),
(13, 'Cathia RainRain', 'rainy@gmail.com', 9700879105, 'water type ni sya goys', 'buwad', '2024-05-10', 'Confirmed'),
(15, 'Jamie cons', 'jamiecons@gmail.com', 9987654321, 'semi cute siya gar', 'wild type', '2024-05-09', 'Confirmed'),
(16, 'Cons Jamie boy', 'jamieboy@gmail.cons', 9465584553, 'mula samar hanggang leyte', 'joy', '2024-05-15', 'Confirmed'),
(17, 'Mugiwara', 'mugiwara@gmail.com', 9987654321, 'Monkey', 'Idiot', '2024-05-25', 'Cancelled'),
(18, 'Mugiwara', 'mugiwara@gmail.com', 9987654321, 'Monkey', 'Idiot', '2024-05-25', 'Confirmed'),
(19, 'Mugiwara', 'mugiwara@gmail.com', 9987654321, 'Monkey', 'Idiot', '2024-05-25', 'Pending'),
(20, 'Mugiwara', 'mugiwara@gmail.com', 9987654321, 'Monkey', 'Idiot', '2024-05-25', 'Confirmed'),
(21, 'Mugiwara', 'mugiwara@gmail.com', 9987654321, 'Monkey', 'Idiot', '2024-05-25', 'Confirmed'),
(22, 'Mugiwara', 'mugiwara@gmail.com', 9987654321, 'Monkey', 'Idiot', '2024-05-25', 'Confirmed'),
(23, 'Mugiwara', 'trafalgar@water.law', 9987654321, 'Monkey', 'Idiot', '2024-05-25', 'Confirmed'),
(24, 'kaye m nuevo', 'trafalgar@water.law', 9078444971, 'Animal', 'unidentified', '2024-05-20', 'Confirmed'),
(25, 'kaie m nuevo', 'trafalgar@water.law', 9465584553, 'ming', 'Cat', '2024-05-31', 'Confirmed'),
(26, 'kiminonawa', 'trafalgar@water.law', 98866215, 'semi cute siya gar', 'Wild type', '2024-05-17', 'Confirmed'),
(27, 'Jeon Jungkook', 'goldenmaknae@gmail.com', 9700879105, 'Bam', 'Dog', '2024-05-27', 'Confirmed'),
(28, 'ChanPaul Colo', 'chanpaul@gmail.com', 1234567891, 'Kaie', 'K', '2024-05-31', 'Confirmed'),
(29, 'Chan Chan Colo', 'chanpaul@gmail.com', 1234567891, 'Chanana', 'Cat', '2024-05-29', 'Confirmed'),
(30, 'Kim Taehyung', 'roxannedalag@gmail.com', 9700879105, 'Luna', 'Cat', '2024-05-12', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `middleName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contactNum` bigint(11) NOT NULL,
  `addRess` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `middleName`, `email`, `password`, `contactNum`, `addRess`) VALUES
(7, 'Jungkook', 'Jeon', 'GM', 'goldenmaknae@gmail.com', 'jungkook', 9700879105, 'Busan, South Korea'),
(8, 'Chan', 'Colo', 'Nuevo', 'chanpaul@gmail.com', 'chanchan', 1234567891, 'Tambulilid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
