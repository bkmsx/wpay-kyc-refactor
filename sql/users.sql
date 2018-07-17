-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2018 at 03:36 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `date_birth` varchar(45) DEFAULT NULL,
  `citizenship` varchar(45) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `passport_location` varchar(45) DEFAULT NULL,
  `date` datetime NOT NULL,
  `status` varchar(45) NOT NULL,
  `row_number` int(11) NOT NULL,
  `wallet_address` varchar(255) NOT NULL,
  `token_number` int(11) NOT NULL DEFAULT '0',
  `utm_source` varchar(50) NOT NULL,
  `click_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `date_birth`, `citizenship`, `country`, `passport_location`, `date`, `status`, `row_number`, `wallet_address`, `token_number`, `utm_source`, `click_id`) VALUES
(396, 'tien@novum.capital', '$2y$10$XzrlFmeP9B6KfFMU43IkHe6gcOV/vC6DjOBgLCr4vUqf2sB.5OvZC', 'Trung Tien', 'Lai', '07/08/2018', 'ABKHAZIAN', 'ABKHAZIA', NULL, '2018-07-16 22:26:37', 'PENDING', 2, 'werwerwer', 4280, '', ''),
(397, 'tien1@gmail.com', '$2y$10$bij4UIyCUJZaMLPmWoBTOOrFcnGGAZ2NJWqJxojK1xA8J1qkP/Yuy', 'trung', 'tien', '02/12/1990', 'ABKHAZIAN', 'ABKHAZIA', NULL, '2018-07-14 13:40:52', 'CLEARED', 3, '0xFAF31560d94E7dDE9098dC99Ba419b927b87bC5F', 0, '', ''),
(398, 'tien2@gmail.com', '$2y$10$B31ZoTvbMv1PB3J44teQTeG1CsIdNAMr4EBsNB2CRX4L9mUl0m4fi', 'trung', 'tien', '02/12/1990', 'ABKHAZIAN', 'ABKHAZIA', NULL, '2018-07-14 14:08:40', 'CLEARED', 4, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC4F', 0, '', ''),
(399, 'tien3@novum.capital', '$2y$10$IBGUBDva6/VZYWYSWuxLZuiM/FubCACvsIcdcN9iLOX.TBfgqWq/u', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-16 16:44:34', '', 5, '', 0, '', ''),
(400, 'tien4@gmail.com', '$2y$10$ivUGQMmI5w52IjAHrfm8guAX3P8IAalvdkCYoILTdIQIyy3MW7Hcm', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-16 16:50:01', '', 6, '', 0, '', ''),
(401, 'tien5@gmail.com', '$2y$10$o6E2whh7erM9KW/IOFF0re.S8GWGVrtlyLLGqtn4bSLTxPC9qNUnK', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-16 16:53:13', '', 7, '', 0, '', ''),
(402, 'bien@gmail.com', '$2y$10$/SQDA.9/wH8IRT2qDJkhTe3qwaKMD3UMPkqp4cfdqSDzMxG7vmHYq', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-16 16:56:55', '', 8, '', 0, '', ''),
(403, 'bien1@gmail.com', '$2y$10$//nLWmAGoSseVCweF6fZxe1d.80NfFVWSGLeNCDJGYlz2hkVtOBQS', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-16 17:04:43', '', 9, '', 0, '', ''),
(404, 'bien2@gmail.com', '$2y$10$GCba7X34S4sGE3K6tUIlEOGMzLWWFBEaiH04/fxvcn8TzGcgB83Mi', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-16 17:05:38', '', 10, '', 0, '', ''),
(405, 'bien@gmail.com4', '$2y$10$IaGMZh/OxmM45C6bf8lUuu/coU2rJS8OULnFVRhKeZfyQQljTzt4q', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-16 17:06:16', '', 11, '', 0, '', ''),
(406, 'bien4@gmail.com', '$2y$10$FWDfAGU1ynBdyLZzV0rEqOQiYBQe/CmhfsRWJUSdASkPNWNVUYzUm', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-16 17:07:05', '', 12, '', 0, '', ''),
(407, 'bien5@gmail.com', '$2y$10$KuldNArpk8ov7aGowlI.y.sTtMq1Hsbxecgyort0pOma17/zsbXUi', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-16 17:07:51', '', 13, '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
