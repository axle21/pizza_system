-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2019 at 04:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tests`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `complete_address` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `queue` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `email`, `full_name`, `contact`, `complete_address`, `date_added`, `queue`) VALUES
(1, 'boy1@sample.com', 'boy1', 911111111, 'marikina', '2019-02-18 15:10:45', 1),
(2, 'boy2@sample.com', 'boy2', 922222222, 'Queazon city', '2019-02-18 15:10:45', 0),
(3, 'boy3@gmail.com', 'boy3', 922356521, 'makati city', '2019-02-19 11:18:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `customer_info_id` int(11) NOT NULL,
  `item_name` varchar(15) NOT NULL,
  `item_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `toppings` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `customer_info_id`, `item_name`, `item_price`, `quantity`, `toppings`, `date_added`) VALUES
(1, 1, 'HAawaiian', 26010, 3, 'Ground Beef', '2019-02-18 15:12:12'),
(2, 1, 'cheese', 17510, 1, 'Cheese,Bacon,Ground Beef', '2019-02-18 15:12:12'),
(3, 2, 'Roasted Garlic', 24010, 1, 'Bacon', '2019-02-18 15:12:12'),
(4, 2, 'Pepp & Mushrm', 22010, 2, 'Cheese,Bacon,Ground Beef', '2019-02-18 15:12:12'),
(5, 3, 'Roasted Garlic', 40514, 2, 'Salami,Capers,Mushroom', '2019-02-19 11:18:56'),
(6, 3, 'Manhattan', 29514, 1, 'Cheese,Ham', '2019-02-19 11:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `type`) VALUES
(1, 'cheese', '1.jpg', 1),
(2, 'NY Classic', '2.jpg', 1),
(3, 'Pepp & Mushrm', '3.jpg', 1),
(4, 'Manhattan', '4.jpg', 1),
(5, 'Garden Special', '5.jpg', 1),
(6, 'HAawaiian', '6.jpg', 1),
(7, 'Tribeca Mushroom', '7.jpg', 2),
(8, 'Anchovy Lovers', '7.jpg', 2),
(9, '#4 Cheese', '7.jpg', 2),
(10, 'Corona Chicken', '7.jpg', 2),
(11, 'Goumet Garden', '7.jpg', 2),
(12, 'Roasted Garlic', '7.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_price`
--

CREATE TABLE `tbl_product_price` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_price`
--

INSERT INTO `tbl_product_price` (`id`, `product_id`, `size`, `price`) VALUES
(1, 1, 10, 175),
(2, 1, 14, 285),
(3, 1, 18, 440),
(4, 2, 10, 210),
(5, 2, 14, 340),
(6, 2, 18, 530),
(7, 3, 10, 220),
(8, 3, 14, 250),
(9, 3, 18, 540),
(10, 4, 10, 250),
(11, 4, 14, 295),
(12, 4, 18, 565),
(13, 5, 10, 210),
(14, 5, 14, 340),
(15, 5, 18, 530),
(16, 6, 10, 260),
(17, 6, 14, 420),
(18, 6, 18, 575),
(19, 7, 10, 245),
(20, 7, 14, 390),
(21, 7, 18, 560),
(22, 8, 10, 275),
(23, 8, 14, 450),
(24, 8, 18, 595),
(25, 9, 10, 250),
(26, 9, 14, 400),
(27, 9, 18, 560),
(28, 13, 10, 250),
(29, 10, 14, 420),
(30, 10, 18, 575),
(31, 11, 10, 250),
(32, 11, 14, 410),
(33, 11, 18, 585),
(34, 12, 10, 240),
(35, 12, 14, 405),
(36, 12, 18, 505);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(1, '\"admin\"', '\"admin@PIZZA.COM\"', '\".md5(\"admin\").\"', '0000-00-00 00:00:00'),
(2, 'admin', 'admin@pizza.com', '21232f297a57a5a743894a0e4a801fc3', '2019-02-15 08:41:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_price`
--
ALTER TABLE `tbl_product_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_product_price`
--
ALTER TABLE `tbl_product_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
