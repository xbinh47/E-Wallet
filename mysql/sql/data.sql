-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: May 31, 2022 at 06:24 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuoiki`
--
CREATE DATABASE IF NOT EXISTS `cuoiki` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cuoiki`;

-- --------------------------------------------------------

--
-- Table structure for table `debidcard`
--

CREATE TABLE `debidcard` (
  `cardnumber` int NOT NULL,
  `expdate` date NOT NULL,
  `cvv` int NOT NULL,
  `balance` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `debidcard`
--

INSERT INTO `debidcard` (`cardnumber`, `expdate`, `cvv`, `balance`) VALUES
(111111, '2022-10-10', 411, 984000000),
(222222, '2022-11-11', 443, 1000000000),
(333333, '2022-12-12', 577, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int NOT NULL,
  `idtrans` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `cardnumber` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `idtrans`, `cardnumber`) VALUES
(1, 'DE000001', 111111);

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE `network` (
  `networkid` int NOT NULL,
  `networkname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fee` decimal(5,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `network`
--

INSERT INTO `network` (`networkid`, `networkname`, `fee`) VALUES
(11111, 'viettel', '0.00'),
(22222, 'mobifone', '0.00'),
(33333, 'vinaphone', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `otp_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `otp_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `idState` int NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`idState`, `description`) VALUES
(0, 'Lần đầu đăng nhập'),
(1, 'Chờ xác minh'),
(2, 'Đã xác minh'),
(3, 'Đã vô hiệu hóa'),
(4, 'Vô hiệu hóa do đăng nhập'),
(5, 'admin'),
(6, 'Chờ cập nhập'),
(7, 'Đăng nhập bất thường');

-- --------------------------------------------------------

--
-- Table structure for table `times_login`
--

CREATE TABLE `times_login` (
  `id` int NOT NULL,
  `times` int DEFAULT '0',
  `datelock` datetime DEFAULT NULL,
  `oldState` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `times_login`
--

INSERT INTO `times_login` (`id`, `times`, `datelock`, `oldState`) VALUES
(49, 8, '2022-05-31 12:26:52', '2');

-- --------------------------------------------------------

--
-- Table structure for table `topupcard`
--

CREATE TABLE `topupcard` (
  `id` int NOT NULL,
  `idtrans` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `cardcode` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `networkname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topupcard`
--

INSERT INTO `topupcard` (`id`, `idtrans`, `cardcode`, `networkname`, `price`) VALUES
(1, 'TC000001', '3333390583', 'vinaphone', 100000),
(2, 'TC000001', '3333383837', 'vinaphone', 100000),
(3, 'TC000001', '3333389782', 'vinaphone', 100000),
(4, 'TC000001', '3333367195', 'vinaphone', 100000),
(5, 'TC000001', '3333363493', 'vinaphone', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `idtrans` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `transtype` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetrans` datetime NOT NULL,
  `amount` int NOT NULL,
  `approval` tinyint(1) NOT NULL,
  `receiver` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`idtrans`, `transtype`, `email`, `datetrans`, `amount`, `approval`, `receiver`) VALUES
('DE000001', 'deposit', 'nguyenxuanbinh472002@gmail.com', '2022-05-31 12:07:09', 20000000, 1, NULL),
('TC000001', 'topupcard', 'nguyenxuanbinh472002@gmail.com', '2022-05-31 12:07:34', 500000, 1, NULL),
('TF000001', 'transfer', 'nguyenxuanbinh472002@gmail.com', '2022-05-31 12:18:16', 2000000, 1, '0909043076'),
('WD000001', 'withdraw', 'nguyenxuanbinh472002@gmail.com', '2022-05-31 12:07:26', 2000000, 1, NULL),
('WD000002', 'withdraw', 'nguyenxuanbinh472002@gmail.com', '2022-05-31 12:09:22', 2000000, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int NOT NULL,
  `idtrans` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `feepaid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `idtrans`, `note`, `feepaid`) VALUES
(1, 'TF000001', 'Test Transfer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `front` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `back` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `idState` int DEFAULT NULL,
  `createAT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `balance` bigint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `username`, `password`, `phone`, `birthday`, `address`, `front`, `back`, `idState`, `createAT`, `updateAT`, `balance`) VALUES
(41, NULL, 'admin', 'admin', '14e1b600b1fd579f47433b88e8d85291', NULL, NULL, NULL, NULL, NULL, 5, '2022-05-23 12:50:17', '2022-05-31 05:06:46', 0),
(46, 'nguyenxuanbinh472002@gmail.com', 'Xuan Binh', '3887508862', '14e1b600b1fd579f47433b88e8d85291', '0968278202', '2002-07-04', 'Go Vap', 'nguyenxuanbinh472002@gmail_com/sql.png', 'nguyenxuanbinh472002@gmail_com/tdt.png', 2, '2022-05-24 08:35:56', '2022-05-31 05:06:46', 13200000),
(47, 'hienqt0205@gmail.com', 'Nguyễn Công Hiền', '9368682428', '14e1b600b1fd579f47433b88e8d85291', '0909043076', '2002-05-02', 'Bình Thạnh', 'hienqt0205@gmail_com/MailSetup.png', 'hienqt0205@gmail_com/homnay.png', 2, '2022-05-31 12:12:24', '2022-05-31 05:12:24', 2000000),
(48, 'binhnguyenxuan47@gmail.com', 'Nguyễn Xuân Bình', '7745652352', '14e1b600b1fd579f47433b88e8d85291', '0932758302', '2002-07-04', '59/39/18G', 'binhnguyenxuan47@gmail_com/MailSetup.png', 'binhnguyenxuan47@gmail_com/homnay.png', 3, '2022-05-31 12:19:39', '2022-05-31 05:19:39', 0),
(49, 'ngxbinh47@gmail.com', 'Nguyễn Trần Minh Trang', '3643360824', '14e1b600b1fd579f47433b88e8d85291', '0968278123', '2022-02-09', '59/39/18G', 'ngxbinh47@gmail_com/MailSetup.png', 'ngxbinh47@gmail_com/homnay.png', 4, '2022-05-31 12:21:32', '2022-05-31 05:21:32', 0),
(50, 'huynhphucnguyen2709@gmail.com', 'Huỳnh Phúc Nguyên', '8446418912', '14e1b600b1fd579f47433b88e8d85291', '0932758123', '2002-06-05', 'Quận 7', 'huynhphucnguyen2709@gmail_com/MailSetup.png', 'huynhphucnguyen2709@gmail_com/homnay.png', 6, '2022-05-31 13:17:39', '2022-05-31 06:17:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int NOT NULL,
  `idtrans` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `cardnumber` int NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `idtrans`, `cardnumber`, `note`) VALUES
(1, 'WD000001', 111111, ''),
(2, 'WD000002', 111111, 'Test chuyển tiền');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `debidcard`
--
ALTER TABLE `debidcard`
  ADD PRIMARY KEY (`cardnumber`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtrans` (`idtrans`);

--
-- Indexes for table `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`networkid`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD KEY `email` (`email`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`idState`);

--
-- Indexes for table `times_login`
--
ALTER TABLE `times_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topupcard`
--
ALTER TABLE `topupcard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtrans` (`idtrans`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`idtrans`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtrans` (`idtrans`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `idState` (`idState`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtrans` (`idtrans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topupcard`
--
ALTER TABLE `topupcard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`idtrans`) REFERENCES `transactions` (`idtrans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `otp`
--
ALTER TABLE `otp`
  ADD CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `times_login`
--
ALTER TABLE `times_login`
  ADD CONSTRAINT `times_login_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `topupcard`
--
ALTER TABLE `topupcard`
  ADD CONSTRAINT `topupcard_ibfk_1` FOREIGN KEY (`idtrans`) REFERENCES `transactions` (`idtrans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`idtrans`) REFERENCES `transactions` (`idtrans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idState`) REFERENCES `state` (`idState`);

--
-- Constraints for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD CONSTRAINT `withdraw_ibfk_1` FOREIGN KEY (`idtrans`) REFERENCES `transactions` (`idtrans`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
