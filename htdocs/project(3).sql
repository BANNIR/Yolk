-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 10:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(70) NOT NULL,
  `isSeller` tinyint(1) NOT NULL,
  `isConsumer` tinyint(1) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_product_id` int(11) NOT NULL,
  `cart_consumer_id` int(11) NOT NULL,
  `cart_product_quantity` int(11) NOT NULL,
  `cart_order_price` double NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `catalogue_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `checkout_cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

CREATE TABLE `consumer` (
  `consumer_id` int(11) NOT NULL,
  `user_id_consumer` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productperchases`
--

CREATE TABLE `productperchases` (
  `purchases_id` int(11) NOT NULL,
  `purchases_checkout_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productreturn`
--

CREATE TABLE `productreturn` (
  `return_id` int(11) NOT NULL,
  `return_product_id` int(11) NOT NULL,
  `return_seller_id` int(11) NOT NULL,
  `return_consumer_id` int(11) NOT NULL,
  `return_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `request_consumer_id` int(11) NOT NULL,
  `request_seller_id` int(11) NOT NULL,
  `request_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `user_id_seller` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`catalogue_product_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`),
  ADD KEY `checkout_cart_id_fk` (`checkout_cart_id`);

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`consumer_id`),
  ADD KEY `user_id_consumer_fk` (`user_id_consumer`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `seller_id_fk` (`seller_id`);

--
-- Indexes for table `productperchases`
--
ALTER TABLE `productperchases`
  ADD PRIMARY KEY (`purchases_id`),
  ADD KEY `productpurchase_checkout_id_fk` (`purchases_checkout_id`);

--
-- Indexes for table `productreturn`
--
ALTER TABLE `productreturn`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `return_product_id_fk` (`return_product_id`),
  ADD KEY `return_consumer_id_fk` (`return_consumer_id`),
  ADD KEY `return_seller_id_fk` (`return_seller_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `request_consumer_id_fk` (`request_consumer_id`),
  ADD KEY `request_seller_id_fk` (`request_seller_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `user_id_fk` (`user_id_seller`),
  ADD KEY `product_id_fk` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `catalogue_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
  MODIFY `consumer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productperchases`
--
ALTER TABLE `productperchases`
  MODIFY `purchases_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productreturn`
--
ALTER TABLE `productreturn`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_consumer_id` FOREIGN KEY (`cart_consumer_id`) REFERENCES `consumer` (`consumer_id`),
  ADD CONSTRAINT `cart_product_id` FOREIGN KEY (`cart_product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD CONSTRAINT `catalog_product_id_fk` FOREIGN KEY (`catalogue_product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_cart_id_fk` FOREIGN KEY (`checkout_cart_id`) REFERENCES `cart` (`cart_id`);

--
-- Constraints for table `consumer`
--
ALTER TABLE `consumer`
  ADD CONSTRAINT `user_id_consumer_fk` FOREIGN KEY (`user_id_consumer`) REFERENCES `account` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `seller_id_fk` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `productperchases`
--
ALTER TABLE `productperchases`
  ADD CONSTRAINT `productpurchase_checkout_id_fk` FOREIGN KEY (`purchases_checkout_id`) REFERENCES `checkout` (`checkout_id`);

--
-- Constraints for table `productreturn`
--
ALTER TABLE `productreturn`
  ADD CONSTRAINT `return_consumer_id_fk` FOREIGN KEY (`return_consumer_id`) REFERENCES `consumer` (`consumer_id`),
  ADD CONSTRAINT `return_product_id_fk` FOREIGN KEY (`return_product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `return_seller_id_fk` FOREIGN KEY (`return_seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_consumer_id_fk` FOREIGN KEY (`request_consumer_id`) REFERENCES `consumer` (`consumer_id`),
  ADD CONSTRAINT `request_seller_id_fk` FOREIGN KEY (`request_seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id_seller`) REFERENCES `account` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
