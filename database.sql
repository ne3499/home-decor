-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 19, 2025 at 04:36 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_decor`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_name` varchar(300) DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_name`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_id`),
  KEY `receiver_id` (`receiver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES
(1, 13, 1, 'udhuhduhucfgu', '2025-03-18 05:41:48'),
(3, 13, 1, 'ok', '2025-03-18 05:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('Pending','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int NOT NULL DEFAULT '1',
  `product_id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`user_id`),
  KEY `fk_product` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_name`, `quantity`, `price`, `total_price`) VALUES
(1, 22, 'sofa', 1, 120000.00, 120000.00),
(2, 23, 'frame', 1, 15000.00, 15000.00),
(3, 24, 'frame', 1, 15000.00, 15000.00),
(4, 25, 'sofa', 1, 120000.00, 120000.00),
(5, 26, 'frame', 1, 15000.00, 15000.00),
(12, 33, 'show piece', 1, 50000.00, 50000.00),
(11, 34, 'wallpaper', 1, 1500.00, 1500.00),
(13, 45, 'wallpaper', 1, 1500.00, 1500.00),
(14, 45, 'show piece', 1, 50000.00, 50000.00),
(15, 46, 'sofa', 1, 50000.00, 50000.00),
(16, 47, 'show piece', 1, 50000.00, 50000.00),
(17, 48, 'lamp', 1, 1500.00, 1500.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category`, `image`, `created_at`) VALUES
(15, 'sofa', 'in living room', 50000.00, 'Living Room', 'uploads/1742282260_sofa03.jpg', '2025-03-18 01:47:40'),
(12, 'show piece', 'hdioheic', 50000.00, 'Living Room', 'uploads/1742274374_img01.jpg', '2025-03-17 22:58:53'),
(14, 'frame', 'good', 5000.00, 'Living Room', 'uploads/1742282168_img10.jpg', '2025-03-18 01:46:08'),
(13, 'frame', 'djbjjewbfj', 70000.00, 'Bedroom', 'uploads/1742272356_img07.jpg', '2025-03-17 23:02:36'),
(16, 'frame', 'it looks elegant', 2000.00, 'Bedroom', 'uploads/1742282364_img06.jpg', '2025-03-18 01:49:24'),
(17, 'lamp', 'in office ', 3000.00, 'office', 'uploads/1742282418_lamp04.jpg', '2025-03-18 01:50:18'),
(18, 'lamp', 'in office', 1500.00, 'office', 'uploads/1742282451_lamp09.webp', '2025-03-18 01:50:51'),
(19, 'sofa', 'in office', 25000.00, 'office', 'uploads/1742282490_offimg02.webp', '2025-03-18 01:51:30'),
(20, 'frame', 'in office', 3500.00, 'office', 'uploads/1742282669_offimg04.jpg', '2025-03-18 01:54:29'),
(21, 'sofa', 'in bedroom', 20000.00, 'Bedroom', 'uploads/1742282758_home image.png', '2025-03-18 01:55:58'),
(22, 'lamp', 'ihshn', 2000.00, 'Living Room', 'uploads/1742284650_lamp02.jpg', '2025-03-18 02:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `admin_email`, `admin_password`, `contact_number`) VALUES
(2, 'Home Decor', 'odedarakhushi30@gmail.com', '2005', '6352740277');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `created_at`, `role`) VALUES
(13, ' Jyoti odedara', 'odedarakhushi30@gmail.com', '$2y$10$8lwjYDF3pkrhPiSVIyb9Yu1RpVBqxlmQizB9VgGryPxiSqlq6D9t6', '6352740277', 'near jalaram mandir', '2025-03-15 04:41:36', 'admin'),
(14, 'Kashish', 'kash11@gmail.com', '$2y$10$pHYecjMncTAbkyQKj8kn3.pIKBgv75ZUsyhlednkAXuI2JbzMLIZ6', '9157505968', 'chala road', '2025-03-15 04:42:02', 'user'),
(15, 'Harsh Bari', 'harshbari227@gmail.com', '$2y$10$I9rbW4xHR3x95hqgpOoxTO/cLvyr//RuPQEWN.0zL/x7MHcZJKYO6', '6354591853', 'switzerland', '2025-03-15 05:04:31', 'user'),
(16, 'hirva', 'hirva23@gmail.com', '$2y$10$KrPwqPlDOkcb7/4Z68gZvekyyhhkVQukywS8DOset2XNWn8PJAKLS', '1234321222', 'vapi', '2025-03-18 17:05:44', 'user'),
(17, 'mummyyyy', 'mummy13@gmail.com', '$2y$10$90RNFrLiv9CAm8CojKMoEu83wcoteYKVcHymcGJCcgQmfeYcfAWXa', '9384786232', 'vapi', '2025-03-18 18:36:33', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
