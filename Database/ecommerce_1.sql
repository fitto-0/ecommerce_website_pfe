-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2025 at 03:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Makeup'),
(2, 'Skincare'),
(3, 'Haircare'),
(4, 'Fragrances'),
(5, 'Beauty Tools'),
(6, 'Bath & Body'),
(7, 'Nail Products');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 312346784, 1, 3, 'pending'),
(2, 1, 312346784, 2, 1, 'pending'),
(3, 1, 312346784, 4, 1, 'pending'),
(4, 1, 1918753782, 3, 2, 'pending'),
(5, 1, 351837813, 1, 2, 'pending'),
(6, 1, 911455513, 1, 3, 'pending'),
(7, 1, 911455513, 4, 2, 'pending'),
(8, 1, 911455513, 5, 1, 'pending'),
(9, 2, 689417214, 5, 3, 'pending'),
(10, 2, 689417214, 9, 4, 'pending'),
(11, 2, 689417214, 10, 2, 'pending'),
(12, 2, 1067767407, 10, 4, 'pending'),
(13, 2, 1067767407, 11, 13, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `payment_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `username`, `amount`, `payment_method`, `transaction_id`, `payment_date`) VALUES
(1, 1, 'exemple', 249.99, 'Credit Card', 'txn_6853f279a023c', '2025-06-19 12:20:48'),
(2, 1, 'exemple', 249.99, 'Credit Card', 'txn_6853f279a023c', '2025-06-19 12:21:57'),
(3, 1, 'exemple', 249.99, 'Credit Card', 'txn_6853f279a023c', '2025-06-19 12:22:57'),
(4, 1, 'exemple', 249.99, 'Credit Card', 'txn_68542606c6e13', '2025-06-19 16:00:44'),
(5, 8, 'exemple', 344.00, 'Credit Card', 'txn_68566de99c70e', '2025-06-21 09:32:13'),
(6, 9, 'Fatima Zahra Elkasmi', 114.00, 'Credit Card', 'txn_685873315410a', '2025-06-22 22:21:34'),
(7, 14, 'Fatima Zahra Elkasmi', 120.00, 'Credit Card', 'txn_685fdd14c2331', '2025-06-28 13:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(120) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image_one` varchar(255) NOT NULL,
  `product_image_two` varchar(255) NOT NULL,
  `product_image_three` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image_one`, `product_image_two`, `product_image_three`, `product_price`, `date`, `status`) VALUES
(5, 'Sky mascara', 'Mascara Sky High : Cils Vertigineux Maybelline', 'Mascara Sky High ', 1, 2, 'skymascara.jpg', 'hadik.jpg', 'hadik2.jpg', 12, '2025-05-12 08:57:26', 'true'),
(6, 'Color Bloom Liquid Blush-Hot Topic', 'Color Bloom Liquid Blush-Hot Topic', 'Color Bloom Liquid Blush-Hot Topic', 1, 0, 'p1.jpg', 'p2.jpg', 'p3.jpg', 5, '2025-05-12 08:52:42', 'true'),
(9, 'Summer Fridays Lip Butter ', 'Summer Fridays Lip Butter Balm 15g (Various shades)', 'Summer Fridays Lip Butter', 2, 0, 'p2-1.jpg', 'p2-2.jpg', 'p2-3.jpg', 24, '2025-05-12 08:34:16', 'true'),
(10, 'Super Volcanic AHA Pore Clearing Clay Mask', 'Super Volcanic AHA Pore Clearing Clay Mask', 'Super Volcanic AHA Pore Clearing Clay Mask', 2, 0, 'p3-1.jpg', 'p3-2.jpg', 'p3-3.jpg', 18, '2025-05-12 08:40:24', 'true'),
(11, 'Rosemary Oil ', 'Rosemary Oil Can Help Hair Grow Faster and Thicker.', 'Rosemary Oil ', 3, 0, 'p4-1.jpg', 'p4-2.jpg', 'p4-3.jpg', 18, '2025-05-12 10:28:54', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(4, 1, 120, 911455513, 3, '2025-05-05 18:30:22', 'pending'),
(5, 2, 168, 689417214, 3, '2025-05-19 23:20:55', 'pending'),
(6, 2, 306, 1067767407, 2, '2025-05-21 09:24:39', 'pending'),
(7, 7, 344, 886400, 4, '2025-06-21 09:26:29', 'pending'),
(8, 7, 344, 758901, 4, '2025-06-21 09:29:45', 'pending'),
(9, 8, 114, 535789, 2, '2025-06-22 21:40:48', 'paid'),
(10, 8, 141, 424658, 3, '2025-06-22 22:41:59', 'pending'),
(11, 8, 162, 842832, 1, '2025-06-22 23:35:02', 'pending'),
(12, 8, 72, 324348, 1, '2025-06-23 00:50:44', 'pending'),
(13, 8, 198, 872090, 2, '2025-06-28 12:26:53', 'pending'),
(14, 8, 120, 542562, 1, '2025-06-28 13:16:20', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_method`, `payment_date`) VALUES
(2, 9, 535789, 114, 'cash_on_delivery', '2025-06-22 21:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`, `role`) VALUES
(2, 'admin', 'admin@admin.com', '$2y$10$oif3crHRSIJTL.xzV4PG/uTrKnj2tEl9l98hd2tgXBdlKOmEhPuju', '11716a4b048d28c9685070d6982bcfe1.jpg', '::1', 'Tangier, Morocco', '+212692331466', 'admin'),
(7, 'Salma Gege', 'salmagege@gmail.com', '$2y$10$DFvPI1EtyPbWum4gnrxIXexwxqkSQEjlLeG1ZrLIlot4eAukHq4QG', '7b0551406cd7936252123558aacc9191.jpg', '::1', 'Tangier, Morocco', '+212690386422', 'user'),
(8, 'Fatima Zahra Elkasmi', 'fatimazahra@gmail.com', '$2y$10$deZkFHYy1KXuFw/ItjkFjeif4.dt.QF6cJE7j3GzfExRoTwv1MeXy', 'c14bcffa07a72439ab9cba58811f94da.jpg', '::1', 'Tangier, Morocco', '+212633790011', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
