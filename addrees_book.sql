-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 10:22 PM
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
-- Database: `addrees_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `prod_id`, `total_price`, `quantity`, `user_id`) VALUES
(4, 10, '10000', 5, 1),
(7, 22, '1000', 1, 1),
(8, 7, '1500', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cat_id`, `cat_name`) VALUES
(1, 'Neckwear'),
(2, 'Earrrings'),
(3, 'Hand Jewellery'),
(4, 'Rings'),
(5, 'Hair Accessories'),
(6, 'Makeup'),
(7, 'Nailpaint'),
(8, 'Lipsticks ');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_details`
--

CREATE TABLE `checkout_details` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `card_number` varchar(50) DEFAULT NULL,
  `card_expiry` varchar(10) DEFAULT NULL,
  `card_cvc` varchar(10) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout_details`
--

INSERT INTO `checkout_details` (`id`, `full_name`, `address`, `zip_code`, `city`, `country`, `card_number`, `card_expiry`, `card_cvc`, `total_price`, `order_date`) VALUES
(1, 'adsasd', 'asd', 'asd', 'asd', 'asd', 'asdasdasd', 'asda', 'asda', 250.00, '2025-05-07 19:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

CREATE TABLE `contactinfo` (
  `contactid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactinfo`
--

INSERT INTO `contactinfo` (`contactid`, `name`, `email`, `subject`, `message`) VALUES
(1, 'asd', 'asd@gmail.com', 'asd', 'ad');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `rate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prod_id`
--

CREATE TABLE `prod_id` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prod_img` varchar(50) NOT NULL,
  `prod_price` varchar(50) NOT NULL,
  `prod_description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prod_id`
--

INSERT INTO `prod_id` (`prod_id`, `prod_name`, `cat_id`, `prod_img`, `prod_price`, `prod_description`) VALUES
(7, 'kundan earring', 2, 'images/e1.webp', '1500', 'Shining Diva Fashion Latest Stylish Traditional Kundan Chandbali Earrings for Women and Girls'),
(8, 'jhumka', 2, 'images/e2.webp', '1400', 'Shining Diva Fashion Latest Stylish Traditional Kundan Chandbali Earrings for Women and Girls'),
(10, 'baaliyaan', 2, 'images/e3.webp', '2000', 'Shining Diva Fashion Latest Stylish Traditional Kundan Chandbali Earrings for Women and Girls'),
(11, 'jhumka', 2, 'images/e5.jpg', '1500', 'Shining Diva Fashion Latest Stylish Traditional Kundan Chandbali Earrings for Women and Girls'),
(12, 'baaliyaan', 2, 'images/e4.webp', '1400', 'Shining Diva Fashion Latest Stylish Traditional Kundan Chandbali Earrings for Women and Girls'),
(13, 'kundan earring', 2, 'images/e6.jpg', '2000', 'Shining Diva Fashion Latest Stylish Traditional Kundan Chandbali Earrings for Women and Girls'),
(20, 'bangles set', 3, 'images/bangles set.webp', '2000', 'Bridal Bangle set with Pearl and Kundan and Velvet Bangle'),
(21, 'kara', 3, 'images/silver bangles.webp', '1000', 'Crystal Bangle Set'),
(22, 'bracelet', 3, 'images/bracelet.webp', '1000', 'Nisha Bangles Set'),
(23, 'bracelet', 3, 'images/charm-bracelet-set.webp', '1000', 'Crystal Bangle Set'),
(24, 'kara', 3, 'images/silverv bracelet.webp', '1400', 'silver bracelet'),
(26, 'bracelet', 3, 'images/bracelet.jpg', '500', 'beautiful bracelet'),
(28, 'pearl wedding hair accessory', 5, 'images/hair.jpg', '1000', 'pearl hair accessory'),
(29, 'pins', 5, 'images/pins.jpg', '500', 'flower hair pin'),
(30, 'maang tika', 5, 'images/maang tika.webp', '1000', 'Embrace Tradition! Hyderabadi Jadau Maang Tika with Pearls '),
(31, 'hair clips', 5, 'images/hair clips.webp', '500', 'Crystal Hair Clips, Gold, Silver,'),
(32, 'one stone ring', 4, 'images/one stone ring.jpg', '400', 'one stone ring for girls'),
(33, 'ring', 4, 'images/silver ring.jpg', '400', 'silver one stone ring'),
(34, 'ring', 4, 'images/pearl ring.jpg', '500', 'pearl ring'),
(36, 'black stone ring', 4, 'images/black ston ring.jpg', '500', 'black stone beautiful ring'),
(37, 'one stone black ring', 4, 'images/dblack ring.jpg', '1000', 'black diamond ring'),
(38, 'black bow', 5, 'images/big black bow.jpg', '600', 'big black hair bow'),
(39, 'pearl hair chain', 5, 'images/pearl hair chain.jpg', '700', 'long pearl hair chain'),
(40, 'ring', 4, 'images/stone ring.jpg', '400', 'simple stone ring'),
(41, 'chokar', 1, 'images/chokar.jpg', '2000', 'bridal chokar'),
(42, 'necklace ', 1, 'images/pearl chokar set.jpeg', '2500', 'pearl beautiful necklace'),
(43, 'jennifer chokar', 1, 'images/jennifer chokar set.jpg', '2100', 'beautiful and elegant chokar'),
(44, 'necklace', 1, 'images/elegantchokar.jpeg', '1000', 'beautiful necklace for women'),
(45, 'haar', 1, 'images/prashvi-tushi-kyra-gold-necklace.webp', '3000', 'gold haar'),
(46, 'neckwear', 1, 'images/Red Stone-1.webp', '2000', 'red stone beautiful neckwear'),
(47, 'Nailpaint', 7, 'images/nailpaint 1.jpg', '400', 'decent color purple'),
(48, 'Nail paint', 7, 'images/nailpaint2.jpg', '600', 'dark purple in color'),
(49, 'Nailpaint', 7, 'images/nailpaint3.jpg', '400', 'skin brown color nail -paint'),
(50, 'nail paint', 7, 'images/nailpaint 4.jpg', '500', 'levendar color '),
(51, 'Nail paint', 7, 'images/nailpaint5.jpg', '700', 'decent skin color of nail paint'),
(52, 'Nail paint', 7, 'images/nailpaint 6.jpg', '650', 'unique color'),
(53, 'lipstick', 8, 'images/Classy-Lipstick_28_texture.webp', '350', 'classy lipstick in matt'),
(54, 'lipstick', 8, 'images/classy-lipstick-04_99_2.png.webp', '340', 'matt color in 16 shades'),
(55, 'lipstick', 8, 'images/lipsticks 2.webp', '650', 'semi matt dark maroon in color'),
(56, 'lipstick', 8, 'images/maybilline lipstick.jpg', '500', 'maybelline pink ibn color'),
(57, 'lipstick', 8, 'images/RivajClassyLipstick-Photoroom.webp', '520', 'elegant color in 14 shade'),
(58, 'lipstick in matt', 8, 'images/Ultra-Matte-Lipstick-10-1.webp', '700', 'ultra matt in color '),
(59, 'Eye shadow', 6, 'images/eye shadow pelit.webp', '1500', 'Velvet Eye Shadow Palette-28 Colors | Chrisitne Cosmectics – Christine Cosmetics Arabia'),
(60, 'Eye shadow', 6, 'images/eye shadow palette.png', '1000', 'RIVAJ Eyeshadow Palette 18 Color Shadow'),
(61, 'eyeshadow', 6, 'images/smoke eye shadow.webp', '1200', 'unique color eyeshadow palette'),
(62, 'makeup base ', 6, 'images/base.jfif', '1500', 'waterproof base'),
(63, 'makeup foundation', 6, 'images/makeup foundation.webp', '1290', 'liquid foundation'),
(65, 'BB cream foundation', 6, 'images/miss-rose-bb-cream-3.jpg', '800', 'BB cream foundation'),
(66, 'concealer', 6, 'images/concealer.webp', '700', 'concealer'),
(68, 'lash mascara', 6, 'images/lash mascara.jpg', '900', 'lash increase mascara');

-- --------------------------------------------------------

--
-- Table structure for table `user_management`
--

CREATE TABLE `user_management` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_management`
--

INSERT INTO `user_management` (`user_id`, `first_name`, `last_name`, `email`, `contact_number`, `password`) VALUES
(1, 'Ayesha', 'Khan', 'asd@gmail.com', 'asd', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `prod` (`prod_id`),
  ADD KEY `asdas` (`user_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `checkout_details`
--
ALTER TABLE `checkout_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactinfo`
--
ALTER TABLE `contactinfo`
  ADD PRIMARY KEY (`contactid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `cart` (`cart_id`);

--
-- Indexes for table `prod_id`
--
ALTER TABLE `prod_id`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cat` (`cat_id`);

--
-- Indexes for table `user_management`
--
ALTER TABLE `user_management`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `checkout_details`
--
ALTER TABLE `checkout_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactinfo`
--
ALTER TABLE `contactinfo`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prod_id`
--
ALTER TABLE `prod_id`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user_management`
--
ALTER TABLE `user_management`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `asdas` FOREIGN KEY (`user_id`) REFERENCES `user_management` (`user_id`),
  ADD CONSTRAINT `prod` FOREIGN KEY (`prod_id`) REFERENCES `prod_id` (`prod_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `cart` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user_management` (`user_id`);

--
-- Constraints for table `prod_id`
--
ALTER TABLE `prod_id`
  ADD CONSTRAINT `cat` FOREIGN KEY (`cat_id`) REFERENCES `catagories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
