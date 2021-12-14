-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 06:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bot`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(300) DEFAULT NULL,
  `replies` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'name,name?,hi,hello', 'Hi ! I am clinic assistant'),
(2, 'location,address,located,3,3.', 'Here is how to get to our hospital:<br>\nLagankhel Satdobato Rd, Lalitpur 44700<br>\nwww.pahs.edu.np<br>\n+97715522295'),
(3, 'opening,hour,visiting,2,2.', '24 Hours Health Services\n<br>\nEmergency Service, Pathology Service, Ambulance Service, Pharmacy Service, Radiology Service, Trauma and Orthopedic Service\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctime`
--

CREATE TABLE `tbl_doctime` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `docname` varchar(50) NOT NULL,
  `docstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctime`
--

INSERT INTO `tbl_doctime` (`id`, `date_time`, `docname`, `docstatus`) VALUES
(1, '2021-12-05 10:00:00', 'nischal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'niraj', '$2y$10$peg3WxdGszv9TJjicG2vTuD9Y8lZ69wg7kMpsbB.oISqLaKX3E1gm', '2021-12-12 09:31:29'),
(2, 'belina', '$2y$10$G/Gk3lsYNpdSJnozSCTH1e55n8xUgJRAfGS80HRb4Fb87KHwlXr9e', '2021-12-12 12:10:14'),
(3, 'admin', '$2y$10$MIJQywDKr/FR8xxA0zwNmuWJFWQUFmzhAR.1DBqhhIqjDX.9psTsS', '2021-12-14 10:00:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doctime`
--
ALTER TABLE `tbl_doctime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_doctime`
--
ALTER TABLE `tbl_doctime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
