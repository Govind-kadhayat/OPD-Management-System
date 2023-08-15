-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 12:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(200) NOT NULL,
  `invoce_no` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phno` bigint(50) NOT NULL,
  `consultant` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `dob` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_detail`
--

CREATE TABLE `doctor_detail` (
  `name` varchar(200) NOT NULL,
  `Phno` varchar(200) NOT NULL,
  `Specialist` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_detail`
--

INSERT INTO `doctor_detail` (`name`, `Phno`, `Specialist`, `address`, `id`) VALUES
('Surendra', '9811323231', 'Cardo', 'PatanDhoka,lalitpur', 2),
('Mahesh', '9898998989', 'Dermatology', 'ktm', 3),
('Ganesh', '0909090909', 'Anesthesiology', 'Lalitpur', 4);

-- --------------------------------------------------------

--
-- Table structure for table `particular`
--

CREATE TABLE `particular` (
  `id` int(200) NOT NULL,
  `invoice_no` int(200) DEFAULT NULL,
  `paticular` varchar(200) NOT NULL,
  `qty` int(200) NOT NULL,
  `price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `particular`
--

INSERT INTO `particular` (`id`, `invoice_no`, `paticular`, `qty`, `price`) VALUES
(5, NULL, '0', 1, 1200),
(5, NULL, '0', 12, 12000),
(5, NULL, 'ECO', 12, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `patient_list`
--

CREATE TABLE `patient_list` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `Doctor` varchar(200) NOT NULL,
  `phno` bigint(200) NOT NULL,
  `Department` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `dob` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_list`
--

INSERT INTO `patient_list` (`id`, `name`, `Doctor`, `phno`, `Department`, `user`, `address`, `Status`, `dob`) VALUES
(1, 'Rahul', 'Dr.surendra', 0, 'Cardio', '', 'kalopool', '', NULL),
(2, 'Sagar Chaudhary', 'Ganesh', 0, 'Cardio', '', 'Dhangadhi', '', NULL),
(5, 'RAMESH', ' Surendra', 32423423423, ' General Physican', 'surendra', 'mahendranger', 'pending', '2023-07-12 00:00:00.000000'),
(6, 'RAMESH', ' Surendra', 32423423423, ' General Physican', 'surendra', 'mahendranger', 'pending', '2023-07-12 00:00:00.000000'),
(7, 'Asmita Bhattta', 'Ganesh', 0, 'Cardio', '', 'Lalipur', '', NULL),
(8, 'Sandy', ' Surendra', 989898998, ' General Physican', 'Govind', 'Maitidevi', 'pending', '2023-07-26 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `MNumber` bigint(50) NOT NULL,
  `Address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `Name`, `Email`, `Password`, `MNumber`, `Address`) VALUES
(2, 'Govind', 'Govind@gmail.com', '$2y$10$JSpqSA5sSbRPrfC8ql3mN.fs.f0JB2nBhTzoT3IMHH2ALTQ7cw4qe', 9868585585, 'PatanDhoka,lalitpur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`invoce_no`);

--
-- Indexes for table `doctor_detail`
--
ALTER TABLE `doctor_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `particular`
--
ALTER TABLE `particular`
  ADD KEY `f_key` (`invoice_no`);

--
-- Indexes for table `patient_list`
--
ALTER TABLE `patient_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `invoce_no` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_detail`
--
ALTER TABLE `doctor_detail`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_list`
--
ALTER TABLE `patient_list`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `particular`
--
ALTER TABLE `particular`
  ADD CONSTRAINT `f_key` FOREIGN KEY (`invoice_no`) REFERENCES `bill` (`invoce_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
