-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 07:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haakdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user_name` varchar(100) NOT NULL,
  `admin_full_name` varchar(100) NOT NULL,
  `admin_phone` varchar(100) DEFAULT NULL,
  `admin_photo` varchar(255) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_address` varchar(100) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL,
  `admin_dell` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user_name`, `admin_full_name`, `admin_phone`, `admin_photo`, `admin_email`, `admin_address`, `admin_password`, `admin_dell`) VALUES
(1, 'admin', 'admin', '0935335', '', 'admin@gmail.com', 'bhri', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `customerFullName` varchar(100) NOT NULL,
  `customerUserName` varchar(100) NOT NULL,
  `customerPassword` varchar(100) NOT NULL,
  `customerEmail` varchar(100) DEFAULT NULL,
  `customerPhone` varchar(100) NOT NULL,
  `customerAddress` varchar(100) DEFAULT NULL,
  `customerDob` date DEFAULT NULL,
  `customerPhoto` varchar(255) DEFAULT NULL,
  `customerDel` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `customerFullName`, `customerUserName`, `customerPassword`, `customerEmail`, `customerPhone`, `customerAddress`, `customerDob`, `customerPhoto`, `customerDel`, `created_date`, `added_date`) VALUES
(1, 'Ahmed Ali Hassan', 'ahmed', '202cb962ac59075b964b07152d234b70', 'ahmed@gmail.com', '096566333', 'bhri', NULL, NULL, 0, '2023-11-14 14:10:19', '2023-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `haak_delivery`
--

CREATE TABLE `haak_delivery` (
  `delivery_man_id` int(11) NOT NULL,
  `deliv_full_name` varchar(100) NOT NULL,
  `delivery_username` varchar(100) NOT NULL,
  `delivery_phone` varchar(100) NOT NULL,
  `deliv_password` varchar(100) NOT NULL,
  `deliv_address` varchar(100) DEFAULT NULL,
  `deliv_email` varchar(100) DEFAULT NULL,
  `deliv_photo` varchar(200) DEFAULT NULL,
  `deliv_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 : active\r\n1 : not Active',
  `deliv_created_by` int(11) NOT NULL DEFAULT 0,
  `deliv_del` int(11) NOT NULL DEFAULT 0 COMMENT '\r\n1 : deleted\r\n',
  `deliv_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `haak_delivery`
--

INSERT INTO `haak_delivery` (`delivery_man_id`, `deliv_full_name`, `delivery_username`, `delivery_phone`, `deliv_password`, `deliv_address`, `deliv_email`, `deliv_photo`, `deliv_status`, `deliv_created_by`, `deliv_del`, `deliv_created_date`) VALUES
(1, 'osman ali', 'osman', '09321125', '202cb962ac59075b964b07152d234b70', 'bhri', 'osman@gmail.com', NULL, 0, 0, 0, '2023-11-14 14:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `provider_id` int(11) NOT NULL,
  `provider_name` varchar(100) NOT NULL,
  `provider_user_name` varchar(100) NOT NULL,
  `provider_password` varchar(100) NOT NULL,
  `provider_address` varchar(100) DEFAULT NULL,
  `provider_phone` varchar(100) NOT NULL,
  `provider_email` varchar(100) DEFAULT NULL,
  `provider_image` varchar(255) DEFAULT NULL,
  `provider_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 : active\r\n1 : not active',
  `provider_dell` int(11) NOT NULL DEFAULT 0,
  `provider_added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`provider_id`, `provider_name`, `provider_user_name`, `provider_password`, `provider_address`, `provider_phone`, `provider_email`, `provider_image`, `provider_status`, `provider_dell`, `provider_added_date`) VALUES
(1, 'ريح للخدمات', 'rayeh', '202cb962ac59075b964b07152d234b70', 'مدني', '012345667', NULL, NULL, 0, 0, '2023-11-15 17:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_details` varchar(200) DEFAULT NULL,
  `service_image` varchar(255) DEFAULT NULL,
  `service_status` int(11) NOT NULL DEFAULT 0,
  `service_del` int(11) NOT NULL DEFAULT 0,
  `service_added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_details`, `service_image`, `service_status`, `service_del`, `service_added_date`) VALUES
(1, 'test if work', 'testc detils', 'Investing.jpg', 0, 0, '2023-11-15 13:50:12'),
(2, 'testwithout', 'testcantod', NULL, 0, 0, '2023-11-15 13:50:45'),
(3, 'testwitfirllr', 'testcadkd', 'Investing.jpg', 0, 0, '2023-11-15 14:06:10'),
(4, '', '', NULL, 0, 0, '2023-11-15 18:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_detials` varchar(200) DEFAULT NULL,
  `category_icon` varchar(200) DEFAULT NULL,
  `category_del` int(11) NOT NULL DEFAULT 0,
  `category_added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`category_id`, `category_name`, `category_detials`, `category_icon`, `category_del`, `category_added_date`) VALUES
(1, 'testcat name', 'test cat Detils', 'clipart1846415.png', 0, '2023-11-15 12:37:02'),
(2, 'testcat2 photo', 'test cat Detils', 'elect.png', 0, '2023-11-15 12:38:56'),
(11, 'tetdhadiurr', 'tetstcatereadgasdfdfd', 'OIP.jpg', 0, '2023-11-15 13:36:02'),
(12, 'tetdhahhdfhd', 'tetstcatereadgasdfdfd', 'OIP.jpg', 0, '2023-11-15 14:03:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`),
  ADD UNIQUE KEY `customerEmail` (`customerEmail`);

--
-- Indexes for table `haak_delivery`
--
ALTER TABLE `haak_delivery`
  ADD PRIMARY KEY (`delivery_man_id`),
  ADD UNIQUE KEY `deliv_email` (`deliv_email`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `haak_delivery`
--
ALTER TABLE `haak_delivery`
  MODIFY `delivery_man_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
