-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 06:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryType` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `categoryType`) VALUES
(1, 'Sunglasses', 'DIY'),
(2, 'Scrunchies', 'Handmade'),
(3, 'Bhai Tika', 'DIY'),
(4, 'Dog', 'Handmade');

-- --------------------------------------------------------

--
-- Table structure for table `messagebox`
--

CREATE TABLE `messagebox` (
  `mID` int(11) NOT NULL,
  `fName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subText` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messageField` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messagebox`
--

INSERT INTO `messagebox` (`mID`, `fName`, `lName`, `email`, `subText`, `messageField`) VALUES
(1, 'Kabir', 'Deula', 'kabirdeula167@gmail.com', 'Wishing a bright future', 'Dear Aayusha, \r\nBest of luck for your future. \r\nMay your business grow well.\r\nYours,\r\nKabir Deula');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productDesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `productPhoto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productDesc`, `productPrice`, `productPhoto`, `categoryID`) VALUES
(1, 'Dog Scarf Collar', 'Give your Puppy a new look', '120.00', 'product-6.jpg', 4),
(2, 'Beige Sunglasses', 'Sunglasses to protect your eyes.', '700.00', 'product-1.jpg', 1),
(3, 'Glov Scrunchies', 'Scrunchies made with love', '75.00', 'product-2.jpg', 2),
(4, 'Bhai Masala', 'Gift your brother something special this Bhai Tika', '1250.00', 'product-3.jpg', 3),
(5, 'Didi lai Koseli', 'Gift your sister something special this Bhai Tika', '1800.00', 'product-4.jpg', 3),
(6, 'Bhai lai Koseli', 'Gift your brother something special this Bhai Tika', '1800.00', 'product-5.jpg', 3),
(9, 'bags', 'handmade bags', '1000.00', 'product-7.jpg', 1),
(10, 'socks', 'beautiful socks for winter', '250.00', 'product-8.jpg', 2),
(11, 'bracelets', 'couple bracelets for your loved one', '500.00', 'product-9.jpg', 3),
(12, 'hair accessories', 'decorate your hair', '300.00', 'product-10.jpg', 3),
(13, 'room decoration', 'make your room even more attractive', '600.00', 'product-11.jpg', 4),
(14, 'Sweaters', 'woolen sweater ', '3500.00', 'product-12.jpg', 1),
(15, 'makeup box', 'handmade wooden makeup box', '2000.00', 'product-13.jpg', 3),
(17, 'greeting cards', 'handmade cards', '200.00', 'product-14.jpg', 2),
(18, 'paintings', 'handmade painting for your rooms', '5000.00', 'product-15.jpg', 2),
(19, 'hats', 'pretty hats', '3500.00', 'product-16.jpg', 2),
(20, 'scarf', 'handmade scarf', '600.00', 'product-17.jpg', 4),
(21, 'toys', 'handmade dolls', '700.00', 'product-18.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uID` int(11) NOT NULL,
  `userName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userPassword` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userType` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uID`, `userName`, `firstName`, `lastName`, `email`, `userPassword`, `userType`) VALUES
(1, 'bijinamaharjan', 'Bijina', 'Maharjan', 'bijinamaharjan65@gmail.com', 'Bijin@123', 'admin'),
(2, 'kabirdeula', 'Kabir', 'Deula', 'kabirdeula167@gmail.com', 'lunala', 'users'),
(3, 'sanishamaharjan', 'Sanisha', 'Maharjan', 'msani07@gmail.com', 'sanishabts', 'users'),
(4, 'smriti', 'Smriti ', 'Maharjan', 'smritimaharjan720@gmail.com', 'smriti98760', 'users'),
(5, 'aayusha', 'Aayusha', 'Maharjan', 'aayushamhrzn@gmail.com', 'juicebar', 'admin'),
(6, 'snehamanandhar', 'Sneha', 'Manandhar', 'manandharsneha730@gmail.com', '12345678', 'users'),
(7, 'muskanshilakar', 'Muskan', 'Shilakar', 'mshilakar01@gmail.com', '125478963', 'users'),
(8, 'lastamaharjan', 'Lasta', 'Maharjan', 'lastamaharjan@gmail.com', '1548797611', 'users'),
(9, 'nikitashahi', 'Nikita', 'Shahi', 'nikitashahi@gmail.com', '147859923', 'users');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `messagebox`
--
ALTER TABLE `messagebox`
  ADD PRIMARY KEY (`mID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messagebox`
--
ALTER TABLE `messagebox`
  MODIFY `mID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;