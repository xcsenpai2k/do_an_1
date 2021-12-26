-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2021 at 06:22 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `do_an_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reviews` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `phone_number`, `address`, `date`, `email`, `password`, `reviews`) VALUES
(1, 'Nguyễn Hồng Ánh', 'nữ', '0378864753', 'Hà Nội', '2001-12-05', 'motconvit@gmail.com', 'anh12345', ''),
(2, 'Trần Đức Nam', 'nam', '0379987886', 'Nam Định', '2003-01-15', 'motconga@gmail.com', '12345', ''),
(3, 'Cao Thu Thuỷ', 'nữ', '0984776352', 'Đà Nẵng', '1999-11-05', 'congchua@gmail.com', '11223344', 'hàng đẹp'),
(4, 'Trần Ngọc Phong', 'nam', '0987665342', 'Thái Bình', '2000-07-24', 'hoangtucodon@gmail.com', '123456', ''),
(5, 'Phan Thanh Thư', 'nữ', '0378898765', 'Lai Châu', '2000-06-28', 'nabeu@gmail.com', '12345678', '');

-- --------------------------------------------------------

--
-- Table structure for table `producer`
--

CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producer`
--

INSERT INTO `producer` (`id`, `name`) VALUES
(1, 'Nike'),
(2, 'Chanel'),
(3, 'Gucci'),
(4, 'Louis Vuitton'),
(5, 'china');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `photo`, `price`, `producer_id`) VALUES
(18, 'áo nai kỳ', 'vải trơn, mát, đẹp', '1640506951.jpg', 550000, 1),
(19, 'áo luôn vui tươi', 'màu hoa lá hẹ', '1640506980.jpg', 1000000, 4),
(20, 'bộ quần áo nỉ', 'chất nỉ dày, ấm thích hợp cho dân FA', '1640507014.jpg', 5000000, 4),
(21, 'quần nai kỳ phà kè', 'vải đẹp, không phai màu theo thời gian', '1640507046.jpg', 500000, 1),
(22, 'áo chà  khoác chà neo dỏm', 'vải chợ đồng xuân, chất liệu co giãn', '1640507112.jpg', 650000, 2),
(23, 'Quần âu nam', 'khá đẹp, màu đen', '1640507184.jpg', 250000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `time_order` date NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_phone_number` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `customer_id`, `time_order`, `receiver_name`, `receiver_phone_number`, `address`, `status`, `total_price`) VALUES
(1, 1, '2021-12-22', 'Nguyễn Hồng Ánh', '0378864753', 'Hà Nội', '0', 5550000),
(2, 2, '2021-11-23', 'Nguyễn Đức Hưng', '0987665243', 'Nam Định', '2', 1800000),
(3, 3, '2021-12-23', 'Nguyễn Đức Hải', '0987665432', 'Hà Giang', '1', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_details`
--

CREATE TABLE `purchase_order_details` (
  `purchase_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantily` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order_details`
--

INSERT INTO `purchase_order_details` (`purchase_order_id`, `product_id`, `quantily`) VALUES
(1, 18, 1),
(1, 20, 1),
(2, 21, 1),
(2, 22, 2),
(3, 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `phone_number`, `address`, `gender`, `date`, `email`, `password`, `level`) VALUES
(1, 'Nguyến Phương Nam', '0987654321', 'Hà Nội', 'Nam', '1990-07-28', 'namphuong@gmail.com', '123456', 1),
(2, 'Trần Thu Phương', '0987654321', 'Hưng Yên', 'Nữ', '1995-08-18', 'girlcodon@gmail.com', '12345678', 0),
(3, 'Nguyến Hoàng Đức', '0987656453', 'Nam Định', 'Nam', '1994-11-08', 'boycodon@gmail.com', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producer_id` (`producer_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD PRIMARY KEY (`purchase_order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`);

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD CONSTRAINT `purchase_order_details_ibfk_1` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_order` (`id`),
  ADD CONSTRAINT `purchase_order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
