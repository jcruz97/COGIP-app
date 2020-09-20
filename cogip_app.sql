-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2020 at 06:55 PM
-- Server version: 10.3.22-MariaDB-1ubuntu1
-- PHP Version: 7.4.3

SET SQL_MODE = " ";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cogip_app`
--
CREATE DATABASE IF NOT EXISTS `cogip_app` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cogip_app`;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `country`, `vat`, `type_id`) VALUES
(1, 'Raviga', 'United States', 'US456654342', 2),
(2, 'Dunder Mifflir', 'United States', 'US678765765', 2),
(3, 'Jouets Jean-Michel', 'France', 'FR677544000', 2),
(4, 'Bob Vance Refrig.', 'United States', 'US456654687', 2),
(5, 'Raviga', 'United States', 'US456654342', 2),
(6, 'Dunder Mifflir', 'United States', 'US678765765', 2),
(7, 'Jouets Jean-Michel', 'France', 'FR677544000', 2),
(8, 'Bob Vance Refrig.', 'United States', 'US456654687', 2),
(9, 'Belgalol', 'Belgique', 'BE0876654665', 1),
(10, 'Pierre Cailloux', 'France', 'FR678908654', 1),
(11, 'Proximdr', 'Belgique', 'BE0876985665', 1),
(12, 'ElectricPower', 'Italie', 'IT256852542', 1),
(13, 'Belgalol', 'Belgique', 'BE0876654665', 1),
(14, 'Pierre Cailloux', 'France', 'FR678908654', 1),
(15, 'Proximdr', 'Belgique', 'BE0876654665', 1),
(16, 'ElectricPower', 'Italie', 'IT256852542', 1),
(27, 'Mutiny', NULL, NULL, NULL),
(28, 'Hooli', NULL, NULL, NULL),
(29, 'Phoque Off', NULL, NULL, NULL),
(30, 'Pied Piper', NULL, NULL, NULL),
(34, 'Test', 'BE', '123456789', 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `company_id` int(11) DEFAULT NULL,
  `people_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `number`, `date`, `company_id`, `people_id`) VALUES
(2, 'F20190404-003', '2019-04-04 00:00:00', 2, NULL),
(3, 'F20190404-002', '2019-04-04 00:00:00', 10, NULL),
(4, 'F20190404-001', '2019-04-04 00:00:00', 30, NULL),
(5, 'F20190403-654', '2019-04-03 00:00:00', 1, NULL),
(6, 'F20190403-009', '2019-04-03 00:00:00', 16, NULL),
(7, 'F20190517-014', '2019-05-17 00:00:00', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first_name`, `last_name`, `telephone`, `email`, `company_id`) VALUES
(2, 'Peter', 'Gregory', '555-4567', 'peter.gregory@raviga.com', 1),
(3, 'Dwight', 'Schrute', '555-9859', 'dwight.schrute@ddmfl.com', 2),
(4, 'Cameron', 'Howe', '555-7896', 'cam.howe@mutiny.net', 27),
(5, 'Gavin', 'Belson', '555-4213', 'gavin@hooli.com', 28),
(6, 'Jian', 'Yang', '555-4567', 'jian.yang@phoque.off', 29),
(7, 'Bertram', 'Gilfoyle', '555-0987', 'gilfoyle@piedpiper.com', 30),
(8, 'Peter', 'Gregory', '555-4567', 'peter.gregory@reviga.com', 5),
(9, 'Cameron', 'Howe', '555-7896', 'cam.howe@mutiny.net', 27),
(10, 'Gavin', 'Belson', '555-4213', 'gavin@hooli.com', 28),
(11, 'Jian', 'Yang', '555-4567', 'jian.yang@phoque.off', 29),
(12, 'Bertram', 'Gilfoyle', '555-0987', 'gilfoyle@piedpiper.com', 30);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'Supplier'),
(2, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type_id`, `name`, `password`) VALUES
(7, 1, 'Jean-Christian', '$2y$10$hUeZfmeNR1M.ZzfZTOzpQuzG8zvlhbusR5W7yUoWvey9kknCZAoxi'),
(8, 2, 'Muriel', '$2y$10$90Spkobc64eIEFgHc.n9JOe5Q316YsB8TfKBCmdz//LAF4u2kPoL6'),
(9, 1, 'John', '$2y$10$rfrh7XvTo46BE9g51rFMhuOkYeQt5gs3JsFSd.h/en3Ynh6YgBQmy'),
(10, 2, 'Jurgen', '$2y$10$7Dq09rFSW4fF.I3x1Zp8BOmZXv6F3Bv/iyWVSQfIc2WIWdIav9WYK');

-- --------------------------------------------------------

--
-- Table structure for table `users_type`
--

CREATE TABLE `users_type` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_type`
--

INSERT INTO `users_type` (`id`, `type`) VALUES
(1, 'God Mode'),
(2, 'Moderator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_ibfk_1` (`type_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `people_id` (`people_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_ibfk_1` (`company_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_type`
--
ALTER TABLE `users_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `type_id` FOREIGN KEY (`type_id`) REFERENCES `users_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
