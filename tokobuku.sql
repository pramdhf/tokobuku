-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2022 at 08:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL,
  `custName` varchar(100) NOT NULL,
  `custEmail` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `ccInfo` varchar(16) NOT NULL,
  `shippingInfo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailorder`
--

CREATE TABLE `tb_detailorder` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unitCost` float NOT NULL,
  `subTotal` float NOT NULL,
  `paymentMethod` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `categoryName`) VALUES
(1, 'Fiksi'),
(2, 'Non Fiksi'),
(3, 'Pengetahuan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateShipped` datetime NOT NULL,
  `custId` int(11) NOT NULL,
  `orderStatus` varchar(15) NOT NULL,
  `shippingId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `stock` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `productName`, `img`, `stock`, `categoryId`, `price`) VALUES
(1, 'Nyanyian Achilles (The Song of Achilles)', 'SongAchiles.jpg', 10, 1, 100000),
(2, 'Student Hidjo', 'hidjo.jpg', 10, 1, 100000),
(3, 'Funiculi Funicula', 'funiculi.jpg', 10, 1, 100000),
(4, 'Filosofi Teras', 'filosofiteras.jpg', 10, 2, 100000),
(5, 'Loving The Wounded Soul', 'loving.jpg', 10, 2, 100000),
(6, 'You Do You', 'ydy.jpg', 10, 2, 100000),
(7, 'The Tipping Point', 'tpt.jpg', 10, 3, 100000),
(8, 'Starter For Ten', 'sft.jpg', 10, 3, 100000),
(9, 'Bumi Manusia', 'bumi.jpg', 10, 3, 100000),
(70, 'The Perfect World of Miwako Sumida', 'the-perfect-image-of-miwako-sumida.jpg', 19, 1, 69000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_shippinginfo`
--

CREATE TABLE `tb_shippinginfo` (
  `id` int(11) NOT NULL,
  `shippingType` varchar(25) NOT NULL,
  `shippingCost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `registerDate`) VALUES
(9, 'indra', 'hasanindra71@gmail.com', 'default.jpg', '$2y$10$ic49Xg8y1JJhwjX33ZKxYu6CpjEECVbDqwG9i/uQ8vBvBP0V80FXW', 2, 1, '0000-00-00 00:00:00'),
(10, 'test', 'indrahsan80@gmail.com', 'default.jpg', '$2y$10$Mx51LHBs98WRYZ102Xda4e7EBi/C0vqTtE85/yYL/ieCygWnx1LCG', 2, 1, '0000-00-00 00:00:00'),
(11, 'ansbdkas', 'kjabskdab@gmail.com', 'default.jpg', '$2y$10$tDXHshhBqA473rwmyafIte.CO9.GDFgtGV6XgFEJleyK7lJZSV4o6', 2, 1, '0000-00-00 00:00:00'),
(12, 'kimihime', 'davecovington@gmail.com', 'default.jpg', '$2y$10$4BvT2Xu9amf0YKX/BXjetOvYsCveGgVFVCSTRG6bUyZBBl8c3F5ri', 2, 1, '0000-00-00 00:00:00'),
(13, 'dave', 'duniailmu@gmail.com', 'default.jpg', '$2y$10$4BvT2Xu9amf0YKX/BXjetOvYsCveGgVFVCSTRG6bUyZBBl8c3F5ri', 1, 1, '2022-07-04 18:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_userrole`
--

CREATE TABLE `tb_userrole` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_userrole`
--

INSERT INTO `tb_userrole` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detailorder`
--
ALTER TABLE `tb_detailorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_shippinginfo`
--
ALTER TABLE `tb_shippinginfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_userrole`
--
ALTER TABLE `tb_userrole`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detailorder`
--
ALTER TABLE `tb_detailorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tb_shippinginfo`
--
ALTER TABLE `tb_shippinginfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_userrole`
--
ALTER TABLE `tb_userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
