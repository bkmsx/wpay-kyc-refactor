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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `currency` varchar(45) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `token_amount` float DEFAULT NULL,
  `token_bonus` float DEFAULT NULL,
  `conversion_rate` float DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `user_email`, `currency`, `amount`, `address`, `token_amount`, `token_bonus`, `conversion_rate`, `status`, `date`) VALUES
(134, 'tien@novum.capital', 'USD', 1000, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC5F', 4000, 280, 0.25, 'Confirmed', '2018-07-13 15:26:45'),
(135, 'tien@novum.capital', 'ETH', 18.3706, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC5F', 4000, 280, 0.00459266, 'Waiting', '2018-07-14 03:39:38'),
(136, 'tien@novum.capital', 'XLM', 40000, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC5F', 4000, 0, 10, 'Waiting', '2018-07-14 05:00:44'),
(137, 'tien@novum.capital', 'XLM', 40000, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC5F', 4000, 280, 10, 'Waiting', '2018-07-14 05:02:25'),
(138, 'tien@novum.capital', 'XLM', 39870, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC5F', 3987, 279, 10, 'Waiting', '2018-07-14 06:35:41'),
(139, 'tien2@gmail.com', 'XLM', 40000, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC4F', 4000, 280, 10, 'Waiting', '2018-07-14 07:11:56'),
(140, 'tien2@gmail.com', 'XLM', 40000, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC4F', 4000, 280, 10, 'Waiting', '2018-07-14 07:30:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
