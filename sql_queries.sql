-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 08:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuel_rate_predict`
--
CREATE DATABASE IF NOT EXISTS `fuel_rate_predict` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `fuel_rate_predict`;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_quote_history`
--

CREATE TABLE `fuel_quote_history` (
  `fuel_quote_id` bigint(10) NOT NULL,
  `id` bigint(10) NOT NULL,
  `gallons` int(10) NOT NULL,
  `delivery_address` text COLLATE utf8_unicode_ci NOT NULL,
  `delivery_date` date NOT NULL,
  `price_per_gallon` int(5) NOT NULL,
  `total_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fuel_quote_history`
--

INSERT INTO `fuel_quote_history` VALUES
(1, 5, 2, 'fdf', '2003-04-14', 3, 5),
(2, 5, 3, '2250 Holly Hall Street', '0003-04-05', 4, 12),
(3, 5, 8, '2250 Holly Hall Street', '0003-04-05', 4, 32),
(4, 5, 3, '2250 Holly Hall Street', '0003-04-05', 4, 12),
(5, 12, 30, 'address 1', '2022-04-05', 3, 90),
(6, 12, 30, 'address 1', '2022-04-05', 3, 90),
(7, 13, 30, 'address 1', '2022-04-05', 3, 90),
(8, 13, 30, 'address 1', '2022-04-05', 3, 90),
(9, 14, 30, 'address 1', '2022-04-05', 3, 90),
(10, 14, 30, 'address 1', '2022-04-05', 3, 90),
(15, 14, 40, 'address 1', '2022-04-05', 3, 120),
(16, 5, 3, '2250 Holly Hall Street', '0003-04-05', 4, 0),
(17, 5, 3, '2250 Holly Hall Street', '0003-04-05', 4, 0),
(18, 5, 3, '2250 Holly Hall Street', '0003-04-05', 4, 0),
(19, 5, 3, '2250 Holly Hall Street', '0003-04-05', 4, 0),
(20, 5, 1, '2250 Holly Hall Street', '0003-04-05', 4, 4),
(21, 15, 40, 'address 1', '2022-04-05', 3, 120),
(22, 15, 40, 'address 1', '2022-04-05', 3, 120),
(23, 17, 40, 'address 1', '2022-04-05', 3, 120),
(24, 17, 40, 'address 1', '2022-04-05', 3, 120),
(25, 18, 40, 'address 1', '2022-04-05', 3, 120),
(26, 18, 40, 'address 1', '2022-04-05', 3, 120);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(10) NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address1` text COLLATE utf8_unicode_ci NOT NULL,
  `address2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` VALUES
(5, 'Usha Rani Nalla', '2250 Holly Hall Street', 'Scotland Yards Apt 122', 'Houston', 'TX', '77054'),
(12, 'usha', 'address 1', 'address 2', 'dallas', 'TX', '77056'),
(13, 'usha', 'address 1', 'address 2', 'dallas', 'TX', '77056'),
(14, 'usha', 'address 1', 'address 2', 'dallas', 'TX', '77056'),
(17, 'usha', 'address 1', 'address 2', 'dallas', 'TX', '77056'),
(18, 'usha', 'address 1', 'address 2', 'dallas', 'TX', '77056');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `state_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` VALUES
('AK', 'Alaska'),
('AL', 'Alabama'),
('AR', 'Arkansas'),
('AZ', 'Arizona'),
('CA', 'California'),
('CO', 'Colorado'),
('CT', 'Connecticut'),
('DC', 'District of Columbia'),
('DE', 'Delaware'),
('FL', 'Florida'),
('GA', 'Georgia'),
('HI', 'Hawaii'),
('IA', 'Iowa'),
('ID', 'Idaho'),
('IL', 'Illinois'),
('IN', 'Indiana'),
('KS', 'Kansas'),
('KY', 'Kentucky'),
('LA', 'Louisiana'),
('MA', 'Massachusetts'),
('MD', 'Maryland'),
('ME', 'Maine'),
('MI', 'Michigan'),
('MN', 'Minnesota'),
('MO', 'Missouri'),
('MS', 'Mississippi'),
('MT', 'Montana'),
('NC', 'North Carolina'),
('ND', 'North Dakota'),
('NE', 'Nebraska'),
('NH', 'New Hampshire'),
('NJ', 'New Jersey'),
('NM', 'New Mexico'),
('NV', 'Nevada'),
('NY', 'New York'),
('OH', 'Ohio'),
('OK', 'Oklahoma'),
('OR', 'Oregon'),
('PA', 'Pennsylvania'),
('PR', 'Puerto Rico'),
('RI', 'Rhode Island'),
('SC', 'South Carolina'),
('SD', 'South Dakota'),
('TN', 'Tennessee'),
('TX', 'Texas'),
('UT', 'Utah'),
('VA', 'Virginia'),
('VI', 'Virgin Islands'),
('VT', 'Vermont'),
('WA', 'Washington'),
('WI', 'Wisconsin'),
('WV', 'West Virginia'),
('WY', 'Wyoming');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES
(1, 'abc', 'abc'),
(2, 'usha', 'usha'),
(5, 'ddd', '9c969ddf454079e3d439973bbab63ea6233e4087'),
(11, 'ccc', 'f36b4825e5db2cf7dd2d2593b3f5c24c0311d8b2'),
(12, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(13, 'test2', '109f4b3c50d7b0df729d299bc6f8e9ef9066971f'),
(14, 'test3', '3ebfa301dc59196f18593c45e519287a23297589'),
(15, 'test4', '1ff2b3704aede04eecb51e50ca698efd50a1379b'),
(16, 'test5', '911ddc3b8f9a13b5499b6bc4638a2b4f3f68bf23'),
(17, 'test6', 'a66df261120b6c2311c6ef0b1bab4e583afcbcc0'),
(18, 'test7', 'ea3243132d653b39025a944e70f3ecdf70ee3994'),
(19, 'test8', 'd03f9d34194393019e6d12d7c942827ebd694443'),
(20, 'xyz', '66b27417d37e024c46526c2f6d358a754fc552f3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fuel_quote_history`
--
ALTER TABLE `fuel_quote_history`
  ADD PRIMARY KEY (`fuel_quote_id`),
  ADD KEY `unique_id_fuel_quote` (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_key` (`state_code`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fuel_quote_history`
--
ALTER TABLE `fuel_quote_history`
  MODIFY `fuel_quote_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fuel_quote_history`
--
ALTER TABLE `fuel_quote_history`
  ADD CONSTRAINT `fuel_quote_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `unique_id_fuel_quote` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `state_key` FOREIGN KEY (`state_code`) REFERENCES `state` (`state_code`),
  ADD CONSTRAINT `unique_profile_key` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
