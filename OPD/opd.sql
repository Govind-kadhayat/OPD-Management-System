-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 02:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `user` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
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
(5, NULL, 'ECO', 12, 12000),
(1, NULL, 'Seroflow', 12, 2500),
(1, NULL, 'Seroflow', 12, 3500);

-- --------------------------------------------------------

--
-- Table structure for table `patient_list`
--

CREATE TABLE `patient_list` (
  `id` int(200) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `Doctor` varchar(200) NOT NULL,
  `dr_id` int(200) NOT NULL,
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

INSERT INTO `patient_list` (`id`, `user_id`, `name`, `Doctor`, `dr_id`, `phno`, `Department`, `user`, `address`, `Status`, `dob`) VALUES
(1, 2, 'Rahul', 'Dr.surendra', 2, 0, ' General Physican', '   Surendra ', '   kalopool', 'Accepted', NULL),
(2, 3, 'Sagar Chaudhary', 'Ganesh', 3, 0, 'Cardio', '', 'Dhangadhi', '', NULL),
(6, 5, 'RAMESH', ' Surendra', 2, 32423423423, ' General Physican', '  surendra', '  mahendranger', 'Pending', '2023-07-12 00:00:00.000000'),
(7, 6, 'Asmita Bhattta', 'Ganesh', 3, 0, ' General Physican', ' Surendra', ' Lalipur', 'Accepted', NULL),
(8, 7, 'Sandy', ' Surendra', 2, 989898998, ' General Physican', 'Govind', 'Maitidevi', 'pending', '2023-07-26 00:00:00.000000');

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
  `Address` varchar(200) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `Name`, `Email`, `Password`, `MNumber`, `Address`, `user_type`) VALUES
(2, 'Govind', 'Govind@gmail.com', '$2y$10$JSpqSA5sSbRPrfC8ql3mN.fs.f0JB2nBhTzoT3IMHH2ALTQ7cw4qe', 9868585585, 'PatanDhoka,lalitpur', 'Admin\r\n'),
(3, 'Super Admin', 'Superadmin@gmail.com', '$2y$10$gobes/CQeq6myfI5TucMVukIhynS3dX.fQIgAmxKw89VOPzpqtvQS', 9868585585, 'Patandhoka', ''),
(4, 'Akash', 'akash12@gmail.com', '$2y$10$TmfrviSBFF587XzgTg2Oae0s1ig2IDJeG1R5iSUlE8Odef4aHcTm2', 9856858585, 'Dhading', ''),
(5, 'Akash', 'Ak12@gmail.com', '$2y$10$ofbwQi6N5pDHYyC3ddEece6gY367QUQjLlYuDU7LmtmPH7KVSNiay', 9856858585, 'Dhading', 'Admin'),
(6, 'Local', 'local12@gmail.com', '$2y$10$yeWkIx5saqMfOIQ1oAxFgeuuLSyqmnRTpy3l/5FPu7zf7m1Sq9Tme', 9898989898, 'Kathmand', 'User'),
(7, 'new', 'new@gmail.com', '$2y$10$HXWdb.L7YN6yYJPPlqpIN.BbCjH7QqHYkM7h/Y8d8bWxXOBubm.tq', 9898989898, 'ktm', 'Admin'),
(9, 'Kabir', 'kabir@gmail.com', '$2y$10$xsXRD9WT5s/5oS43cQspPu1obADLwyjZ3jCCI/Fb2Q2mO2OSd457K', 9898989898, 'swyambu', 'User'),
(10, 'Admin', 'Admin@gmail.com', '$2y$10$NEJFaSUxaDxhp1IbJPc4puHCE76PkVz4FpVj.oLEeFTurMuAzwigm', 9868585585, 'Patan dhoka', ' Admin'),
(11, 'User', 'User@gmail.com', '$2y$10$6S8eM4IEWpFUpsErXVnP5eTaN8ZtQ8f1EvuD6DCaURl1ivY3AakN2', 9868585585, 'chabil', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `email`, `password`, `type`) VALUES
(1, 'Govind@gmail.com', 'Govind@123', 'Admin\r\n'),
(2, 'Kadhayat@gmail.com', 'Kadhayat@123', 'User\r\n'),
(3, 'Admin@gmail.com', 'Admin@123', 'Admin'),
(4, 'govind@gmail.com', 'govind@123', 'Admin'),
(5, 'u@gmail.com', 'u@123', 'User\r\n'),
(6, 'User@gmail.com', 'User@123', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`invoce_no`),
  ADD KEY `u_id` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `dr_id` (`dr_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
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
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`);

--
-- Constraints for table `particular`
--
ALTER TABLE `particular`
  ADD CONSTRAINT `f_key` FOREIGN KEY (`invoice_no`) REFERENCES `bill` (`invoce_no`);

--
-- Constraints for table `patient_list`
--
ALTER TABLE `patient_list`
  ADD CONSTRAINT `dr_id` FOREIGN KEY (`dr_id`) REFERENCES `doctor_detail` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
