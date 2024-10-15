-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 مارس 2023 الساعة 17:08
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amuri`
--

-- --------------------------------------------------------

--
-- بنية الجدول `cart`
--

CREATE TABLE `cart` (
  `Product_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Colors` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Type` varchar(10) NOT NULL DEFAULT 'clothes',
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`ID`, `Name`, `Colors`, `Price`, `Description`, `Image`, `Type`, `Quantity`) VALUES
(1, 'سترة سوداء', 3, 29.99, 'سترة جلد سوداء', 'images/black-top.jpg', 'clothes', 43),
(2, 'سترة أديداس', 3, 24.99, 'سترة بيضاء نايلون', 'images/white-top.jpg', 'clothes', 39),
(3, 'سترة سوداء', 1, 29.99, 'سترة جلد سوداء', 'images/black-top.jpg', 'clothes', 50),
(4, 'سترة أديداس', 3, 24.99, 'سترة نايلون بيضاء', 'images/white-top.jpg', 'clothes', 50),
(5, 'حذاء أديداس', 3, 49.99, 'حذاء أديداس فاخر', 'images/white-shoe.jpg', 'shoes', 48),
(6, 'حذاء نايكي', 3, 54.99, 'حذاء نايكي فاخر', 'images/gray-shoe.jpg', 'shoes', 47),
(7, 'حذاء جوردان', 2, 69.99, 'حذاء جوردان فاخر', 'images/black-shoe.webp', 'shoes', 20),
(8, 'حذاء كرة قدم', 3, 99.99, 'حذاء من مستوى عالي لكرة القدم', 'images/football-shoe.webp', 'shoes', 9),
(9, 'حذاء كرة سلة', 2, 89.99, 'حذاء جوردان لكرة السلة', 'images/basket-shoe.webp', 'shoes', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `foreign_key_id` (`Product_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `foreign_key_id` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
