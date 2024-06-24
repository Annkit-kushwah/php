-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 06:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ankit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ankit`
--

CREATE TABLE `tbl_ankit` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `hobby` varchar(100) NOT NULL,
  `cars` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ankit`
--

INSERT INTO `tbl_ankit` (`id`, `name`, `email`, `password`, `phone`, `gender`, `hobby`, `cars`, `image`, `address`) VALUES
(7, 'suman kushwah', 'suman@gmail.com', '$2y$10$FBkh/miGwVKTAqoAu5lF9OCrjW96.02AEQFcPq8R5uge6EFdrCR7O', 8799409845, 'female', 'dancing,reading', 'benz', 'image/s-13.webp', '        Ghatlodiya ,ahmedabad'),
(8, 'ankit kushwah', 'ankit@gmail.com', '$2y$10$gQcm7JZipVlfrprEGxoueeFb9wAsg5TIbC5g/s8Iv42oNE5a.hU/6', 8799409845, 'male', 'singing,dancing,reading', 'audi', 'image/s-14.jpg', '               gwalior');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ankit`
--
ALTER TABLE `tbl_ankit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ankit`
--
ALTER TABLE `tbl_ankit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
