-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 11:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `id` int(5) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_discription` varchar(100) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `tag` varchar(20) DEFAULT NULL,
  `regular_price` int(10) DEFAULT NULL,
  `sell_price` int(10) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`id`, `product_name`, `product_discription`, `brand`, `tag`, `regular_price`, `sell_price`, `category`, `photo`) VALUES
(5, 'T-shirt', 'W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve ', 'Top-Tan', 'Gabading Jines', 2000, 1900, 'High Quality', '251d08c3329469a88e79fe079d1e3199.jpg'),
(6, 'Blazer', 'W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve ', 'Female Faction', 'Cotton', 4500, 4450, 'High Quality', 'f0d5cdce8d7d74db659351f52279591e.jpg'),
(7, 'T-shirt', 'W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve ', 'Appex', 'Shuti', 1000, 800, 'Medium Quality', '81239ae70b19a1874a99aab8ce4e1b51.jpg'),
(8, 'T-shirt', 'W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve ', 'Female Faction', 'Cotton', 2000, 1950, 'High Quality', '9bdd483525a5feae5bed995fb44727b9.jpg'),
(9, 'Blazer', 'W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve ', 'Female Faction', 'Gabading Jines', 3000, 2700, 'Medium Quality', '0d225c82e1dae6fdc2dcdef3d9621ea1.jpg'),
(10, 'Blazer', 'W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve ', 'Top-Tan', 'Gabading', 2500, 2400, 'Medium Quality', 'd32dd68d37e172a3184614a061009558.jpg'),
(11, 'Blazer', '\r\nW3Schools is optimized for learning, testing, and training. Examples might be simplified to improv', 'Man Faction', 'Leader', 1300, 1200, 'Medium Quality', '1775e5a78cb87a0738a2f6dad460f0a6.jpg'),
(12, 'T-shirt', '\r\nW3Schools is optimized for learning, testing, and training. Examples might be simplified to improv', 'Top-Tan', 'Cotton', 3000, 2300, 'High Quality', '79fbeb2f464163dba19489e2708e1527.jpg'),
(13, 'Blazer', '\r\nW3Schools is optimized for learning, testing, and training. Examples might be simplified to improv', 'Man Faction', 'Gabading Jines', 6000, 5500, 'High Quality', 'c736688d7fb6764eed10819e0755149b.jpg'),
(14, 'Blazer', 'W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve ', 'Man Faction', 'Gabading', 800, 700, 'Medium Quality', 'b53540372b8c364c7150441f84576fe9.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
