-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 07:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_harshj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `firstName`, `lastName`, `email`, `password`, `status`, `createdAt`, `updatedAt`) VALUES
(79, 'herry', 'poter', 'herry@ccc', 'c20ad4d76fe97759aa27a0c99bff6710', 1, '2022-04-07 13:40:47', NULL),
(80, 'herry', 'poter', 'herry@ccc', 'c20ad4d76fe97759aa27a0c99bff6710', 1, '2022-04-07 13:40:55', NULL),
(81, 'Herry', 'poter', 'herrypoter@gmail.com', '123456', 1, '2022-04-10 10:04:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `subTotal` float NOT NULL,
  `shippingMethod` int(11) NOT NULL,
  `shippingCharge` float NOT NULL,
  `paymentMethod` int(11) NOT NULL,
  `taxAmount` float NOT NULL,
  `discount` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_address`
--

CREATE TABLE `cart_address` (
  `addressId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postalCode` int(7) NOT NULL,
  `billing` tinyint(4) NOT NULL DEFAULT 2,
  `shipping` tinyint(4) NOT NULL DEFAULT 2,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `itemId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `itemTotal` float NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `tax` float NOT NULL,
  `taxAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` bigint(24) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `base` int(11) DEFAULT NULL,
  `thumb` int(11) DEFAULT NULL,
  `small` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL,
  `parentId` bigint(24) DEFAULT NULL,
  `path` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`, `base`, `thumb`, `small`, `status`, `createdAt`, `updatedAt`, `parentId`, `path`) VALUES
(127, 'Laptop', NULL, NULL, NULL, 1, '2022-04-10 10:04:43', NULL, NULL, '127'),
(128, 'Dell', NULL, NULL, NULL, 1, '2022-04-10 10:04:51', NULL, 127, '127/128'),
(129, 'hp', 45, 45, 45, 1, '2022-04-10 10:04:00', NULL, 127, '127/129'),
(130, 'inspiron', NULL, NULL, NULL, 1, '2022-04-10 10:04:12', NULL, 128, '127/128/130');

-- --------------------------------------------------------

--
-- Table structure for table `category_media`
--

CREATE TABLE `category_media` (
  `mediaId` int(11) NOT NULL,
  `categoryId` bigint(24) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gallery` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_media`
--

INSERT INTO `category_media` (`mediaId`, `categoryId`, `name`, `gallery`) VALUES
(45, 129, '120220410105624.jpeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `entityId` int(24) NOT NULL,
  `productId` int(24) NOT NULL,
  `categoryId` bigint(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`entityId`, `productId`, `categoryId`) VALUES
(47, 35, 127),
(48, 35, 128),
(49, 35, 129),
(50, 35, 130);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `configId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`configId`, `name`, `code`, `value`, `status`, `createdAt`) VALUES
(2, 'Host1', 'Hostcode', 'host111', 1, '2022-02-28 08:02:30'),
(7, 'Host2', 'Host2', 'Host222', 1, '2022-04-10 09:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `salesmanId` int(11) DEFAULT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `salesmanId`, `firstName`, `lastName`, `email`, `mobile`, `status`, `createdAt`, `updatedAt`) VALUES
(248, 423, 'Herry', 'poter', 'herry@ccc', 123456789, 1, '2022-04-10 09:04:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `address` text NOT NULL,
  `postalCode` int(7) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `billing` tinyint(1) NOT NULL DEFAULT 2,
  `shipping` tinyint(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `customerId`, `address`, `postalCode`, `city`, `state`, `country`, `billing`, `shipping`) VALUES
(195, 248, 'Veraval', 360024, 'Rajkot', 'Gujarat', 'india', 1, 2),
(196, 248, 'Veraval', 360024, 'Rajkot', 'Gujarat', 'india', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_price`
--

CREATE TABLE `customer_price` (
  `entityId` int(11) NOT NULL,
  `customerId` int(11) DEFAULT NULL,
  `productId` int(11) NOT NULL,
  `price` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `addressId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postalCode` bigint(6) NOT NULL,
  `billing` tinyint(1) NOT NULL DEFAULT 2,
  `shipping` tinyint(4) NOT NULL DEFAULT 2,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`addressId`, `orderId`, `firstName`, `lastName`, `email`, `mobile`, `address`, `city`, `state`, `country`, `postalCode`, `billing`, `shipping`, `createdAt`) VALUES
(45, 46, 'Herry', 'poter', 'herry@ccc', 123456789, 'Veraval', 'Rajkot', 'Gujarat', 'india', 360024, 1, 2, '2022-04-10 10:34:47'),
(46, 46, 'Herry', 'poter', 'herry@ccc', 123456789, 'Veraval', 'Rajkot', 'Gujarat', 'india', 360024, 2, 1, '2022-04-10 10:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_comment`
--

CREATE TABLE `order_comment` (
  `commentId` int(24) NOT NULL,
  `orderId` int(24) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `note` varchar(255) NOT NULL,
  `customerNotified` tinyint(1) NOT NULL DEFAULT 2,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_comment`
--

INSERT INTO `order_comment` (`commentId`, `orderId`, `status`, `note`, `customerNotified`, `createdAt`) VALUES
(4, 46, 2, 'xxxxxx', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `itemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `tax` float NOT NULL,
  `taxAmount` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`itemId`, `orderId`, `productId`, `name`, `sku`, `price`, `discount`, `tax`, `taxAmount`, `quantity`, `createdAt`) VALUES
(35, 46, 31, 'Mi', 'Mobile', 5000, 5, 5, 250, 1, '2022-04-10 10:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_record`
--

CREATE TABLE `order_record` (
  `orderId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `grandTotal` int(11) NOT NULL,
  `shippingId` int(11) NOT NULL,
  `shippingCharge` int(11) NOT NULL,
  `taxAmount` float NOT NULL,
  `discount` float NOT NULL,
  `paymentId` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_record`
--

INSERT INTO `order_record` (`orderId`, `customerId`, `firstName`, `lastName`, `email`, `mobile`, `grandTotal`, `shippingId`, `shippingCharge`, `taxAmount`, `discount`, `paymentId`, `state`, `status`, `createdAt`) VALUES
(46, 248, 'Herry', 'poter', 'herry@ccc', 123456789, 5315, 2, 70, 250, 5, 1, 2, 2, '2022-04-10 10:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `pageId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`pageId`, `name`, `code`, `content`, `status`, `createdAt`, `updatedAt`) VALUES
(47, 'Page47', 'page47', 'page47', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Page50', 'page50', 'page50', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Page51', 'page51', 'page51', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Page52', 'page52', 'page52', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Page53', 'page53', 'page53', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Page54', 'page54', 'page54', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Page55', 'page55', 'page55', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Page56', 'page56', 'page56', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Page57', 'page57', 'page57', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Page58', 'page58', 'page58', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'Page59', 'page59', 'page59', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Page60', 'page60', 'page60', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Page61', 'page61', 'page61', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Page62', 'page62', 'page62', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Page63', 'page63', 'page63', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'Page64', 'page64', 'page64', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'Page65', 'page65', 'page65', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'Page66', 'page66', 'page66', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'Page67', 'page67', 'page67', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'Page68', 'page68', 'page68', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Page69', 'page69', 'page69', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Page70', 'page70', 'page70', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'Page71', 'page71', 'page71', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'Page72', 'page72', 'page72', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'Page73', 'page73', 'page73', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Page74', 'page74', 'page74', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Page75', 'page75', 'page75', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'Page76', 'page76', 'page76', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'Page77', 'page77', 'page77', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'Page78', 'page78', 'page78', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Page79', 'page79', 'page79', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Page80', 'page80', 'page80', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'Page81', 'page81', 'page81', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'Page82', 'page82', 'page82', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'Page83', 'page83', 'page83', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'Page84', 'page84', 'page84', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'Page85', 'page85', 'page85', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `methodId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`methodId`, `name`) VALUES
(1, 'Card Payment (Credit/Debit Card)'),
(2, 'UPI'),
(3, 'QR'),
(4, 'Case On Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `base` int(11) DEFAULT NULL,
  `thumb` int(11) DEFAULT NULL,
  `small` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `tax` float NOT NULL,
  `discount` float NOT NULL,
  `msp` float NOT NULL,
  `costPrice` float NOT NULL,
  `quantity` int(5) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `base`, `thumb`, `small`, `price`, `tax`, `discount`, `msp`, `costPrice`, `quantity`, `status`, `createdAt`, `updatedAt`) VALUES
(31, 'Mobile', 'Mi', 48, 48, 48, 5000, 5, 5, 3000, 2000, 1, 1, '2022-04-10 10:04:06', NULL),
(33, 'Samsung', 'F23', 51, 51, 51, 10000, 5, 500, 8000, 7000, 1, 1, '2022-04-10 10:05:20', NULL),
(35, 'Dell', 'Inspiration', 52, 52, 52, 70000, 5, 3500, 60000, 50000, 1, 1, '2022-04-10 10:19:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `mediaId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gallery` tinyint(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`mediaId`, `productId`, `name`, `gallery`) VALUES
(48, 31, '220220410100628.jpeg', 1),
(51, 33, '120220410101609.jpeg', 2),
(52, 35, '320220410101928.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `salesmanId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) DEFAULT NULL,
  `discount` float(5,2) DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 2,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`salesmanId`, `firstName`, `lastName`, `email`, `mobile`, `discount`, `status`, `createdAt`, `updatedAt`) VALUES
(423, 'Herry', 'Potter', 'Herrypotter@ccc', 123456789, 50.00, 1, '2022-04-10 09:38:27', '2022-04-10 09:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

CREATE TABLE `shipping_method` (
  `methodId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_method`
--

INSERT INTO `shipping_method` (`methodId`, `name`, `charge`) VALUES
(1, 'Same Day Delivery', 100),
(2, 'Express Delivery', 70),
(3, 'Normal Delivery', 50);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `status` tinyint(1) DEFAULT 2,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorId`, `firstName`, `lastName`, `email`, `mobile`, `status`, `createdAt`, `updatedAt`) VALUES
(22, 'John', 'mark', 'mark@gmail.com', 21215487, 1, '2022-04-10 10:04:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_address`
--

CREATE TABLE `vendor_address` (
  `addressId` int(11) NOT NULL,
  `vendorId` int(11) NOT NULL,
  `address` text NOT NULL,
  `postalCode` int(7) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_address`
--

INSERT INTO `vendor_address` (`addressId`, `vendorId`, `address`, `postalCode`, `city`, `state`, `country`) VALUES
(23, 22, 'cicago', 588577, 'cicago', 'CA', 'USA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `customerId_from_customer` (`customerId`);

--
-- Indexes for table `cart_address`
--
ALTER TABLE `cart_address`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `cartId_from_cart` (`cartId`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `productId_from_product` (`productId`),
  ADD KEY `cartId` (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `base` (`base`),
  ADD KEY `small` (`small`),
  ADD KEY `thumb` (`thumb`),
  ADD KEY `categoryParent` (`parentId`);

--
-- Indexes for table `category_media`
--
ALTER TABLE `category_media`
  ADD PRIMARY KEY (`mediaId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`entityId`),
  ADD KEY `product_id` (`productId`),
  ADD KEY `category_id` (`categoryId`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`configId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `salesmanId` (`salesmanId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `address_ibfk_1` (`customerId`);

--
-- Indexes for table `customer_price`
--
ALTER TABLE `customer_price`
  ADD PRIMARY KEY (`entityId`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `order_comment`
--
ALTER TABLE `order_comment`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `order_record`
--
ALTER TABLE `order_record`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `shippingId` (`shippingId`),
  ADD KEY `paymentId` (`paymentId`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `base_product` (`base`),
  ADD KEY `thumb_product` (`thumb`),
  ADD KEY `small_product` (`small`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`mediaId`),
  ADD KEY `media` (`productId`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`salesmanId`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorId`);

--
-- Indexes for table `vendor_address`
--
ALTER TABLE `vendor_address`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `vendorId` (`vendorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `cart_address`
--
ALTER TABLE `cart_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` bigint(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `category_media`
--
ALTER TABLE `category_media`
  MODIFY `mediaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `entityId` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `configId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `customer_price`
--
ALTER TABLE `customer_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_comment`
--
ALTER TABLE `order_comment`
  MODIFY `commentId` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_record`
--
ALTER TABLE `order_record`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `mediaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `salesmanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vendor_address`
--
ALTER TABLE `vendor_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `customerId_from_customer` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_address`
--
ALTER TABLE `cart_address`
  ADD CONSTRAINT `cartId_from_cart` FOREIGN KEY (`cartId`) REFERENCES `cart` (`cartId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cartId`) REFERENCES `cart` (`cartId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productId_from_product` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `base` FOREIGN KEY (`base`) REFERENCES `category_media` (`mediaId`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `categoryParent` FOREIGN KEY (`parentId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `small` FOREIGN KEY (`small`) REFERENCES `category_media` (`mediaId`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `thumb` FOREIGN KEY (`thumb`) REFERENCES `category_media` (`mediaId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `category_media`
--
ALTER TABLE `category_media`
  ADD CONSTRAINT `categoryId` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `salesmanId` FOREIGN KEY (`salesmanId`) REFERENCES `salesman` (`salesmanId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE;

--
-- Constraints for table `customer_price`
--
ALTER TABLE `customer_price`
  ADD CONSTRAINT `customerId` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productId` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_address`
--
ALTER TABLE `order_address`
  ADD CONSTRAINT `order_address_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order_record` (`orderId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_comment`
--
ALTER TABLE `order_comment`
  ADD CONSTRAINT `order_comment_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order_record` (`orderId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `order_record` (`orderId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_record`
--
ALTER TABLE `order_record`
  ADD CONSTRAINT `order_record_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_record_ibfk_2` FOREIGN KEY (`shippingId`) REFERENCES `shipping_method` (`methodId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_record_ibfk_3` FOREIGN KEY (`paymentId`) REFERENCES `payment_method` (`methodId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `base_product` FOREIGN KEY (`base`) REFERENCES `product_media` (`mediaId`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `small_product` FOREIGN KEY (`small`) REFERENCES `product_media` (`mediaId`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `thumb_product` FOREIGN KEY (`thumb`) REFERENCES `product_media` (`mediaId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_media`
--
ALTER TABLE `product_media`
  ADD CONSTRAINT `media` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_address`
--
ALTER TABLE `vendor_address`
  ADD CONSTRAINT `vendorId` FOREIGN KEY (`vendorId`) REFERENCES `vendor` (`vendorId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
