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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `currency` varchar(45) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `wallet_address` varchar(100) DEFAULT NULL,
  `token_amount` float DEFAULT NULL,
  `token_bonus` float DEFAULT NULL,
  `conversion_rate` float DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `email`, `currency`, `amount`, `wallet_address`, `token_amount`, `token_bonus`, `conversion_rate`, `status`, `date`, `update_date`) VALUES
(162, 'tien@novum.capital', 'BTC', 1.38613, '03249mcnh238hf89wqjd092iij20fh793g7c3c2', 4000, 10, 0.000346532, 'Canceled', '2018-07-17 10:27:09', '2018-07-23 14:00:09'),
(163, 'tien@novum.capital', 'XLM', 4000, '03249mcnh238hf89wqjd092iij20fh793g7c3c2', 400, 0, 10, 'Waiting', '2018-07-17 10:33:34', '0000-00-00 00:00:00'),
(164, 'tien@novum.capital', 'XLM', 500, '03249mcnh238hf89wqjd092iij20fh793g7c3c2', 50, 0, 10, 'Waiting', '2018-07-17 10:35:59', '0000-00-00 00:00:00'),
(165, 'tien@novum.capital', 'BTC', 1.40066, '03249mcnh238hf89wqjd092iij20fh793g7c3c2', 4000, 0, 0.000350166, 'Waiting', '2018-07-18 01:31:00', '0000-00-00 00:00:00'),
(166, 'tien@novum.capital', 'XLM', 40000, '03249mcnh238hf89wqjd092iij20fh793g7c3c2', 4000, 0, 10, 'Confirmed', '2018-07-18 02:11:13', '0000-00-00 00:00:00'),
(167, 'tien@novum.capital', 'BTC', 0.0393045, 'sdfasdf', 100, 0, 0.000393045, 'Confirmed', '2018-07-19 02:57:05', '2018-07-23 14:32:19'),
(168, 'tien@novum.capital', 'XLM', 1000, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC5F', 100, 0, 10, 'Canceled', '2018-07-20 07:16:50', '0000-00-00 00:00:00'),
(169, 'tien@novum.capital', 'XLM', 1000, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC5F', 100, 0, 10, 'Canceled', '2018-07-20 07:17:24', '0000-00-00 00:00:00'),
(170, 'tien@novum.capital', 'XLM', 1000, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC5F', 100, 0, 10, 'Canceled', '2018-07-20 09:15:26', '0000-00-00 00:00:00'),
(171, 'tien@novum.capital', 'BTC', 0.0388951, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC5F', 100, 0, 0.000388951, 'Canceled', '2018-07-20 09:15:55', '0000-00-00 00:00:00'),
(172, 'migototo90@gmail.com', 'XLM', 1000, 'sadf', 100, 0, 10, 'Canceled', '2018-07-20 10:25:32', '0000-00-00 00:00:00'),
(173, 'migototo90@gmail.com', 'XLM', 1000, 'fdgs', 100, 0, 10, 'Canceled', '2018-07-20 10:26:17', '0000-00-00 00:00:00'),
(174, 'migototo90@gmail.com', 'BTC', 0.0378674, 'm m', 100, 0, 0.000378674, 'Canceled', '2018-07-20 14:43:01', '0000-00-00 00:00:00'),
(175, 'migototo90@gmail.com', 'XLM', 1000, 'bmb', 100, 0, 10, 'Canceled', '2018-07-20 14:43:32', '0000-00-00 00:00:00'),
(176, 'migototo90@gmail.com', 'XLM', 1000, 'GD65VYF4K7PNIUWAV7VD66AW3YBUJYFEZPHQF35BKEBWKHKQW3QRZPBZ', 100, 0, 10, 'Confirmed', '2018-07-23 06:47:15', '2018-07-23 14:31:53'),
(177, 'migototo90@gmail.com', 'ETH', 0.636944, '0xFAF31560d94E7dDE9098dC99B3419b927b87bC4F', 100, 90, 0.00636944, 'Pending', '2018-07-23 07:40:08', '2018-07-23 14:41:05');

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
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
