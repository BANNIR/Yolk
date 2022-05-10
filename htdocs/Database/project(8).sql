-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 09:30 PM
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
  `email` text NOT NULL,
  `secret_key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `username`, `password_hash`, `isSeller`, `isConsumer`, `email`, `secret_key`) VALUES
(1, 'bag', '$2y$10$TPGyx4n6LNy9096dwk/fY.I1cZ5YZz0QZ1NQq2jxtviPnxBRIa2/e', 1, 0, 'sah@has.com', 'QXGTYIHEMZ3ZVYTP'),
(2, 'consumer', '$2y$10$G7NitKfHA2.AlZvPnRDkjem4bd9tvso6CMDkIn9rU6ykdVslsCMCi', 0, 1, 'consumer@baguette.com', '5O2ZPYU6JXUU2TEH'),
(3, 'thecardude', '$2y$10$mt2gLyR9jzInaxXMmvj/k.DD8618gk6mMhw4L5epkmoEBxjkvGW0y', 1, 0, 'car@car.com', ''),
(4, 'consumer2', '$2y$10$8lj0NC0Omo0a0NBXHLzpAu1UbB4Jr.gEIQakKcHPc3Gcx7qwR7Fwu', 0, 1, 'consumer2@consumer.com', ''),
(5, 'phonedude', '$2y$10$cxIiKop9hSthq3k4skvpeeG64IqQV17ckdLpOp1DSEjlFYB4aA5Ve', 1, 0, 'aemail@gmail.com', 'VUPJSSEYHBB3DZOB'),
(6, '2fa', '$2y$10$BvQzp1h.YTwwFiSyosUSIex5vU4GjhCnwfCKl2kXJmper37yIvPz.', 0, 1, 'blah', 'VDJEBLL2LYCJT72F'),
(7, 'someguy', '$2y$10$AZ2anxvzgUVeKXuVKi0W5O4zGrrw8dhGSG/Y1aIhBsfGjpQc0N/0m', 1, 0, 'email@gmail.com', 'OW6ULPSBPJIV3SWQ'),
(8, 'someone', '$2y$10$aym6qhJsN6lVWV8rcIure.Mihqjdl5LkVGykkep4YU3/8/.pAId.q', 0, 1, 'aemail@gmail.com', 'KCRV5CGDMBPA2CNE'),
(9, 'haaa', '$2y$10$EhjX5BNwomz2orDH2dsueO0wsAWArjssXr2c6g6bSqFDIYZiKLZOm', 0, 1, 'email@emailll.com', ''),
(10, 'con', '$2y$10$TlPGTHhzA6UDET2nxjPMm.GPGE2bRbE.7t9T4wppKRGqlMhzFcP9u', 0, 1, 'con@con.con', ''),
(11, 'test', '$2y$10$JQiixc9S00g..puUlcmEnOFVwp98AtuCuoV/Zjj3/U5UTCodW4x3S', 0, 1, 'test@test.com', ''),
(12, 'sel', '$2y$10$weciueQclVJ6rlzKEGGl.OdWvixT8C3XAJqbz0ijBjDQXNQOSYC3e', 1, 0, 'sell@sell.com', ''),
(13, 's', '$2y$10$qOBnNR8ZMnfNHXg4ESZAFuUxxvaxciF9xwolNzGiFwGPOGRLUboky', 1, 0, 's', ''),
(14, 'c', '$2y$10$pB7.XOrlFgOCI0zbdx/aJuXatj5iBJ0VZ5S8HZLZHPiBLMLqilX5e', 0, 1, 'c', 'YITVM5RXFBKLZ3XI');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_product_id` int(11) NOT NULL,
  `cart_consumer_id` int(11) NOT NULL,
  `cart_product_quantity` int(11) NOT NULL,
  `cart_order_price` double NOT NULL,
  `cart_id` int(11) NOT NULL,
  `cart_total_price_item` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_product_id`, `cart_consumer_id`, `cart_product_quantity`, `cart_order_price`, `cart_id`, `cart_total_price_item`) VALUES
(15, 6, 1, 3563.98, 81, 3563.98);

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
  `checkout_product_id` int(11) NOT NULL,
  `checkout_product_quantity` int(11) NOT NULL,
  `checkout_consumer_id` int(11) NOT NULL,
  `totalPrice` double NOT NULL,
  `dateOfPurchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `checkout_product_id`, `checkout_product_quantity`, `checkout_consumer_id`, `totalPrice`, `dateOfPurchase`) VALUES
(64, 15, 1, 5, 3563.98, '2022-04-26 10:30:42'),
(65, 15, 1, 5, 3563.98, '2022-04-26 10:34:59'),
(66, 15, 1, 6, 3563.98, '2022-04-28 19:46:28'),
(67, 24, 1, 6, 10, '2022-04-28 23:35:52'),
(68, 15, 2, 7, 7127.96, '2022-05-02 13:11:21'),
(69, 17, 4, 7, 19.96, '2022-05-02 20:21:58'),
(70, 25, 1, 6, 1000, '2022-05-10 14:40:35'),
(71, 15, 1, 6, 3563.98, '2022-05-10 15:10:51'),
(72, 24, 2, 6, 20, '2022-05-10 15:10:51');

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

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`consumer_id`, `user_id_consumer`, `first_name`, `last_name`, `address`) VALUES
(1, 2, 'Baguette', 'Jr.', '111 rue St-Croix'),
(2, 4, 'consumer2', 'consumer2', 'address'),
(3, 6, '2fa', 'Test account', '111 rue Imagine'),
(4, 8, 'me', 'me', 'meee'),
(5, 9, 'sd', 'sd', 'sd'),
(6, 10, 'con', 'con', 'con'),
(7, 14, 'test 2', 'test', 'here');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `street_name` varchar(30) DEFAULT NULL,
  `street_number` varchar(10) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `postal_code` varchar(6) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` double DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = in cart, 1 = pending, 2 = accepted, 3 = shipped, 4 = delivered/closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unit_price` double NOT NULL,
  `price` double NOT NULL
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
  `picture` text NOT NULL DEFAULT 'blank.jpg',
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `advertisement` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `seller_id`, `product_description`, `picture`, `product_price`, `product_quantity`, `advertisement`) VALUES
(15, 'The amazing baguette', 1, 'Made out of diamonds, for the first time\r\n', '626720fb54e43.jpg', '3563.98', 3, 'Limited Edition Only!\r\nOnly 3 in stock!'),
(17, 'Another baguette', 1, 'Baguette', 'blank.jpg', '4.99', 9, NULL),
(24, 'Test Product', 5, 'Test Description', 'blank.jpg', '10.00', 3, NULL),
(25, 'computer', 1, 'this is a computer', '62700f2d8dcc4.png', '1000.00', 7, 'Buy 2 get the third free');

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
  `return_description` text NOT NULL,
  `date` datetime NOT NULL,
  `isAccepted` tinyint(1) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productreturn`
--

INSERT INTO `productreturn` (`return_id`, `return_product_id`, `return_seller_id`, `return_consumer_id`, `return_description`, `date`, `isAccepted`) VALUES
(15, 24, 5, 6, 'carboord', '2022-05-10 15:11:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `request_consumer_id` int(11) NOT NULL,
  `request_seller_id` int(11) NOT NULL,
  `request_product_id` int(11) NOT NULL,
  `request_description` text NOT NULL,
  `date` datetime NOT NULL,
  `isDone` tinyint(1) NOT NULL,
  `seller_response` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `request_consumer_id`, `request_seller_id`, `request_product_id`, `request_description`, `date`, `isDone`, `seller_response`) VALUES
(9, 1, 1, 15, 'hello there cutie <3\r\nbaguette', '2022-04-24 16:44:23', 1, 'no go away'),
(10, 6, 1, 15, 'help me', '2022-04-28 19:46:44', 1, 'ther you go'),
(11, 6, 1, 15, 'help me', '2022-04-28 19:49:53', 0, NULL),
(12, 6, 1, 15, 'help me', '2022-04-28 19:50:57', 0, NULL),
(13, 6, 1, 15, 'help me', '2022-04-28 19:51:15', 0, NULL),
(14, 6, 1, 15, 'help me', '2022-04-28 19:52:38', 0, NULL),
(15, 6, 1, 15, 'help me', '2022-04-28 20:33:31', 0, NULL),
(16, 6, 1, 15, 'test', '2022-04-28 23:37:08', 0, NULL),
(17, 6, 5, 24, 'test\r\n', '2022-04-28 23:38:06', 1, 'baguette'),
(18, 7, 1, 15, 'The bread was moldy\r\n', '2022-05-02 13:11:53', 1, 'Sorry we\'ll, send a replacement');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `user_id_seller` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `user_id_seller`, `name`) VALUES
(1, 1, 'Vik'),
(2, 3, 'the car dude'),
(3, 5, 'phonedude'),
(4, 7, 'phonedude2'),
(5, 12, 'Seller Co.');

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
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `cart_total_price_item` (`cart_total_price_item`),
  ADD KEY `cart_consumer_id` (`cart_consumer_id`),
  ADD KEY `cart_product_quantity` (`cart_product_quantity`),
  ADD KEY `cart_product_id` (`cart_product_id`);

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
  ADD KEY `checkout_product_quantity_fk` (`checkout_product_quantity`),
  ADD KEY `checkout_product_id_fk` (`checkout_product_id`) USING BTREE,
  ADD KEY `checkout_total_price_item_fk` (`totalPrice`),
  ADD KEY `checkout_consumer_id_fk` (`checkout_consumer_id`) USING BTREE;

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
  ADD KEY `user_id_fk` (`user_id_seller`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
  MODIFY `consumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `productperchases`
--
ALTER TABLE `productperchases`
  MODIFY `purchases_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productreturn`
--
ALTER TABLE `productreturn`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id_seller`) REFERENCES `account` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
