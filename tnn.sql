-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 08:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tnn`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `grade_level` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `email`, `phone_number`, `birth_date`, `grade_level`, `gender`) VALUES
(2, 'Uliana Zalutska', 'zaluckaulana@gmail.com', '+48602670778', '2005-10-01', 4, 'Female'),
(3, 'John Doe', 'john.doe@example.com', '+380123456789', '2000-01-15', 5, 'Male'),
(4, 'Jane Smith', 'jane.smith@example.com', '+380987654321', '1999-12-25', 6, 'Female'),
(5, 'Michael Johnson', 'michael.j@example.com', '+380567890123', '2001-03-10', 7, 'Male'),
(6, 'Emily Davis', 'emily.d@example.com', '+380456789012', '2002-07-21', 8, 'Female'),
(7, 'William Brown', 'william.b@example.com', '+380345678901', '2000-09-30', 4, 'Male'),
(8, 'Sophia Wilson', 'sophia.w@example.com', '+380234567890', '2003-11-22', 3, 'Female'),
(9, 'James Moore', 'james.m@example.com', '+380123456789', '2001-05-12', 9, 'Male'),
(10, 'Olivia Taylor', 'olivia.t@example.com', '+380987654321', '1998-08-08', 10, 'Female'),
(11, 'Vikrotiia Tsytulska', 'viktoriia@gmail.com', '+48363545265', '2006-07-09', 4, 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
