-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2020 at 12:51 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petrichor`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_m` varchar(10) NOT NULL,
  `m_name` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `available` int(1) DEFAULT '1',
  `picture` varchar(250) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_m`, `m_name`, `price`, `available`, `picture`) VALUES
('0252738889', 'Americano', 10000, 0, '0252738889.jpg'),
('4576567555', 'Teh Hangat', 5000, 1, 'default.png'),
('5689379921', 'Air Putih 2', 3000, 1, 'default.png'),
('5e85eaa19b', 'Milk', 7600, 1, 'default.png'),
('5e85eb6199', 'Energen', 8000, 1, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_trans` int(11) NOT NULL,
  `trans_date` date NOT NULL,
  `trans_time` time NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price_per_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_trans`, `trans_date`, `trans_time`, `item_id`, `quantity`, `price_per_item`) VALUES
(1, '2020-04-06', '05:27:07', '0252738889', 1, 10000),
(2, '2020-04-06', '00:00:00', 'qnty', 2, 3000),
(2, '2020-04-06', '00:00:00', 'qnty', 2, 5000),
(2, '2020-04-06', '00:00:00', 'qnty', 2, 3000),
(2, '2020-04-06', '00:00:00', 'qnty', 1, 10000),
(2, '2020-04-06', '00:00:00', 'id_m', 3, 10000),
(2, '2020-04-06', '00:00:00', '5689379921', 3, 3000),
(2, '2020-04-06', '00:00:00', '252738889', 2, 10000),
(2, '2020-04-06', '00:00:00', '5689379921', 1, 3000),
(2, '2020-04-06', '00:00:00', '4576567555', 1, 5000),
(2, '2020-04-06', '17:37:54', '252738889', 1, 10000),
(2, '2020-04-06', '17:37:54', '5689379921', 5, 3000),
(2, '2020-04-06', '17:40:03', '252738889', 5, 10000),
(3, '2020-04-06', '17:41:13', '252738889', 5, 10000),
(4, '2020-04-06', '17:41:40', '4576567555', 6, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_m`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
