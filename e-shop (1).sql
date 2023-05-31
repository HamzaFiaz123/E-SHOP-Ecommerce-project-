-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2023 at 05:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `ip_add` varchar(100) NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers_orders`
--

CREATE TABLE `customers_orders` (
  `id` int NOT NULL,
  `invoice_number` int NOT NULL,
  `total_amount` int NOT NULL,
  `placed_on` timestamp NOT NULL,
  `selected_payment_mode` varchar(100) NOT NULL,
  `customer_id` int NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers_orders`
--

INSERT INTO `customers_orders` (`id`, `invoice_number`, `total_amount`, `placed_on`, `selected_payment_mode`, `customer_id`, `order_status`, `payment_status`) VALUES
(33, 2056, 230, '2023-05-04 05:01:13', 'Pay Offline', 23, 'pending', 'unpaid'),
(34, 1084, 23, '2023-05-04 05:01:49', 'Pay Offline', 23, 'pending', 'unpaid'),
(35, 621, 230, '2023-05-04 11:19:00', 'Cash On Delivery', 23, 'pending', 'unpaid'),
(36, 6377, 43, '2023-05-24 05:27:24', 'Cash On Delivery', 23, 'pending', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `customer_account`
--

CREATE TABLE `customer_account` (
  `id` int NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_ip` varchar(100) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_country` text NOT NULL,
  `postal_code` int NOT NULL,
  `customer_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_account`
--

INSERT INTO `customer_account` (`id`, `customer_email`, `customer_password`, `customer_ip`, `customer_name`, `customer_phone`, `customer_address`, `customer_country`, `postal_code`, `customer_image`) VALUES
(23, 'hamza@gmail.com', '123', '::1', 'Zohaib Ahmad', '03044947345', 'C1-655 Wapda Town Gujranwala, Pakistan', 'Pakistan', 52250, 'Capture.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `inovoice_num` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `poduct_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `inovoice_num`, `product_id`, `qty`, `poduct_price`) VALUES
(63, 33, 2056, 37, 1, 230),
(64, 34, 1084, 38, 1, 23),
(65, 35, 621, 37, 1, 230),
(66, 36, 6377, 39, 1, 43);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `inovoice_num` int NOT NULL,
  `amount` int NOT NULL,
  `payment_mode` text NOT NULL,
  `reference_no` int NOT NULL,
  `code` int NOT NULL,
  `payment_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments_methods`
--

CREATE TABLE `payments_methods` (
  `id` int NOT NULL,
  `payment_method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments_methods`
--

INSERT INTO `payments_methods` (`id`, `payment_method`) VALUES
(1, 'Pay Offline'),
(2, 'Pay Paypal'),
(3, 'Cash On Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `prod_name` text NOT NULL,
  `prod_category` text NOT NULL,
  `prod_supplier` text NOT NULL,
  `prod_description` text NOT NULL,
  `prod_price` int NOT NULL,
  `prod_image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Stock_added` int NOT NULL,
  `Reamaining_stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_name`, `prod_category`, `prod_supplier`, `prod_description`, `prod_price`, `prod_image`, `Stock_added`, `Reamaining_stock`) VALUES
(37, 'Mens coat with shirt', 'clothes', 'Zohaib Mughal ( Clothes )', 'Beautifull mens formal coat with shirt. Highly demanded', 230, 'pro1.jpg', 10, -11),
(38, 'Formal Jeans Shoes', 'shoes', 'Junaid Mughal( Shoes )', 'Beautifull mens formal jeans shoes. Most loved item', 23, 'product-82-85x85.jpg', 10, -1),
(39, 'Womens Blue Jeans Jacket', 'clothes', 'Please Select', 'Beautifull Womens Blue Jeans Jacket. Discounted item', 43, 'product1.jpg', 10, 0),
(40, 'Dell Laptop', 'Laptops', 'Fyaz Ahmad ( Laptops )', 'Beautifull laptops', 67, 'category-3.jpg', 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `image`) VALUES
(17, 'shoes', 'category-6.jpg'),
(18, 'watches', 'category-4.jpg'),
(19, 'clothes', 'product-2-2.jpg'),
(20, 'Laptops', 'category-3.jpg'),
(29, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int NOT NULL,
  `supplier_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`) VALUES
(1, 'Junaid Mughal ( Shoes )'),
(2, 'Fyaz Ahmad ( Laptops )'),
(11, 'Zohaib Mughal ( Clothes )'),
(12, 'Zeeshan Shahzad ( Shoes )');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_orders`
--
ALTER TABLE `customers_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_account`
--
ALTER TABLE `customer_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_image` (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_methods`
--
ALTER TABLE `payments_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `customers_orders`
--
ALTER TABLE `customers_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `customer_account`
--
ALTER TABLE `customer_account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments_methods`
--
ALTER TABLE `payments_methods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
