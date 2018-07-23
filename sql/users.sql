-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2018 at 10:46 AM
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
  `click_id` varchar(100) NOT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `date_birth`, `citizenship`, `country`, `passport_location`, `date`, `status`, `row_number`, `wallet_address`, `token_number`, `utm_source`, `click_id`, `update_date`) VALUES
(413, 'tien@novum.capital', '$2y$10$86iJijbVC.ht8cvjqFiTou.b769E22RNs9l8escEojHlw0Gp1HYui', 'Tien', 'Lai', '10/07/2018', 'ABKHAZIAN', 'ABKHAZIA', '/files/1531835586.png', '2018-07-17 17:26:42', 'CLEARED', 2, '', 156, '', '', '2018-07-23 14:32:19'),
(414, 'migototo90@gmail.com', '$2y$10$dpvw9h1y6WaObNNnM/vKQet9PWaTAqJz8kohbMU7UQBKrl4we95cW', 'Van Binh', 'Tran', '02/12/1990', 'ABKHAZIAN', 'ABKHAZIA', NULL, '2018-07-20 16:39:14', 'CLEARED', 3, 'asdfas', 320, '', '', '2018-07-23 14:31:53');

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
