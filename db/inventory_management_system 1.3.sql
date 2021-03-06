-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2019 at 07:55 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Khulna'),
(3, 'Jashore'),
(4, 'Rajshahi');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Bangladesh'),
(2, 'India'),
(3, 'Pakistan'),
(4, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `phn_no_1` varchar(50) NOT NULL,
  `phn_no_2` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `company_name`, `customer_name`, `phn_no_1`, `phn_no_2`, `email`, `address`, `city`, `zip_code`, `country`) VALUES
(1, 'utshab hasnath', 'hasnath rahman', '01968858940', '01968858940', 'hasnath.m99@gmail.com', '1872(new)/820(old),East Barandipara Bottola,Jashor', 'Jashore', '7400', 'Bangladesh'),
(3, 'sudipto ltd', 'sudipto mondol', '01968858940', '', 'hasnath.m99@gmail.com', '1872,east barandipara battala ,jessore', 'Jashore', '7400', 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `customer_due`
--

CREATE TABLE `customer_due` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_pid` varchar(11) NOT NULL,
  `net_total` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_due`
--

INSERT INTO `customer_due` (`id`, `customer_name`, `customer_pid`, `net_total`, `payment`, `due`, `payment_date`) VALUES
(1, 'sudipto mondol', '5caa35e5a2a', '270', '170', '100', '2019-04-07'),
(2, 'sudipto mondol', '5caa35e5a2a', '270', '50', '50', '2019-04-08'),
(3, 'sudipto mondol', '5caa35e5a2a', '270', '1', '49', '2019-04-07'),
(4, 'sudipto mondol', '5caa35e5a2a', '270', '49', '0', '2019-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `amount` text NOT NULL,
  `remarks` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `unit_type` varchar(11) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `total_qty` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_description`, `unit_type`, `product_image`, `total_qty`) VALUES
(1, 'nitol paper', 'this is test demo', 'Piece', 'Comming Soon', '80'),
(3, 'A7', 'this is a router', 'Kilogram', 'Comming Soon', '100'),
(4, 'router', 'this is a router', 'Piece', 'Comming Soon', '40');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `supplier_name` text NOT NULL,
  `order_date` date NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `qty` text NOT NULL,
  `unit_type` varchar(50) NOT NULL,
  `buy_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `supplier_name`, `order_date`, `product_name`, `qty`, `unit_type`, `buy_price`) VALUES
(1, 'hasnath', '2019-04-07', 'nitol paper', '100', 'Kilogram', '50'),
(2, 'hasnath', '2019-04-07', 'A7', '100', 'Carton', '55'),
(3, 'hasnath', '2019-04-07', 'router', '50', 'Piece', '40');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `pid` varchar(11) NOT NULL,
  `order_date` date NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `unit_type` varchar(50) NOT NULL,
  `p_unit_price` varchar(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `sub_total` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `net_total` varchar(50) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  `p_l` varchar(200) NOT NULL,
  `due_status` int(11) NOT NULL COMMENT '0 for active due,1 no due'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `pid`, `order_date`, `cust_name`, `pro_name`, `qty`, `unit_type`, `p_unit_price`, `price`, `sub_total`, `discount`, `net_total`, `paid`, `due`, `p_l`, `due_status`) VALUES
(1, '5caa35e5a2a', '2019-04-07', 'sudipto mondol', 'router', '10', 'Piece', '20', '30', '300', '30', '270', '170', '100', '70', 1),
(2, '5caa3637de6', '2019-04-07', 'hasnath rahman', 'nitol paper', '20', 'Kilogram', '20', '20', '400', '0', '400', '400', '0', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_type`
--

CREATE TABLE `unit_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_type`
--

INSERT INTO `unit_type` (`id`, `name`) VALUES
(1, 'Kilogram'),
(2, 'Piece'),
(3, 'Packet'),
(4, 'Carton');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `user_control_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `user_control_level`) VALUES
(1, 'sudipto', 'dip123', 1),
(2, 'hasnath', 'has123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_due`
--
ALTER TABLE `customer_due`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_type`
--
ALTER TABLE `unit_type`
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
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_due`
--
ALTER TABLE `customer_due`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit_type`
--
ALTER TABLE `unit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
