-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2022 at 02:07 AM
-- Server version: 10.3.36-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websbdgw_soumita`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_book`
--

CREATE TABLE `address_book` (
  `users_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `address_type` varchar(500) NOT NULL,
  `full_name` varchar(500) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `city` varchar(500) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `state` varchar(500) DEFAULT NULL,
  `address` varchar(2000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address_book`
--

INSERT INTO `address_book` (`users_id`, `address_id`, `address_type`, `full_name`, `phone`, `email`, `city`, `pincode`, `state`, `address`, `created_at`, `updated_at`) VALUES
(17, 1, 'office', 'Vijay Gupta', '8250570236', 'vijay@gmail.com', 'Noida', '201301', 'Noida', 'Noida Sector-2 ', '2022-09-22 13:21:47', NULL),
(18, 2, 'office', 'dinesh', '8690054777', 'shubhda2018@gmail.com', 'ajmer', '305001', 'rajasthan', 'office no.8 ajmer', '2022-09-27 07:02:17', NULL),
(19, 3, 'home', 'Chitra Pant Tiwari', '7053756560', 'chitratiwari1802@gmail.com', 'New Delhi', '110096', 'Delhi', 'B Block New Ashok Nagar', '2022-10-01 09:44:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `banner_link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `banner_link`, `status`) VALUES
(10, 'Sept_26-02-Banner.webp', '', 1),
(11, 'Sept_26-Banner.webp', '', 1),
(12, 'Sept_26-03-Banner.webp', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buy_wholesales`
--

CREATE TABLE `buy_wholesales` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy_wholesales`
--

INSERT INTO `buy_wholesales` (`id`, `name`, `company_name`, `email`, `mobile`, `product_name`, `qty`, `message`, `date`) VALUES
(1, 'Vijay Gupta', 'Web IT', 'vijay@gmail.com', '0825 057 0236', 'Modi-Jacket', 100, 'I want To Be Buy This Product', '2022-09-21 08:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(250) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `slug`, `status`) VALUES
(1, 'MODI-JACKETS', 'modi-jackets', 1),
(2, 'WOMEN-NIGHT-WEAR', 'women-night-wear', 1);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `order_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`, `order_by`, `status`) VALUES
(1, 'Maroon', 1, 1),
(2, 'Blue', 2, 1),
(4, 'Black', 4, 1),
(5, 'Baige', 5, 1),
(8, 'Grey', 1, 1),
(10, 'Sky Blue', 0, 1),
(11, 'Purple', 0, 1),
(12, 'Pink', 0, 1),
(13, 'Sea Green', 0, 1),
(14, 'Pista', 0, 1),
(15, 'Pista Green', 0, 1),
(16, 'Yellow', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers_heading`
--

CREATE TABLE `offers_heading` (
  `id` int(11) NOT NULL,
  `heading` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers_heading`
--

INSERT INTO `offers_heading` (`id`, `heading`, `status`) VALUES
(3, '200% OFF', 0),
(4, '10%', 0),
(5, '10 % Every Page', 0),
(6, '10 % Every Page', 0),
(7, '20 % Every Product', 0),
(8, '30% Off for 1st user', 0),
(9, 'Buy 3 Get 1 Free', 1),
(10, 'Buy 2 Get 1 Free', 0),
(11, 'Get 40% Flat off For 1st user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `invoice_id` varchar(500) NOT NULL,
  `order_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `total_tax` int(11) DEFAULT NULL,
  `coupon` varchar(500) DEFAULT NULL,
  `payment_id` varchar(500) DEFAULT NULL,
  `payment_mode` varchar(500) NOT NULL DEFAULT 'online',
  `order_status` int(11) NOT NULL DEFAULT 1,
  `is_paid` varchar(51) DEFAULT NULL,
  `payment_time` datetime DEFAULT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`invoice_id`, `order_id`, `users_id`, `address_id`, `total_item`, `total_pay`, `total_tax`, `coupon`, `payment_id`, `payment_mode`, `order_status`, `is_paid`, `payment_time`, `order_time`) VALUES
('20220922CF33', 1, 17, 1, 1, 850, 0, NULL, NULL, '1', 4, NULL, NULL, '2022-09-27 07:04:32'),
('20220927B242', 2, 18, 2, 1, 1750, 0, NULL, NULL, '1', 3, NULL, NULL, '2022-09-27 07:04:17'),
('2022100129C8', 3, 19, 3, 1, 599, 0, NULL, NULL, '1', 1, NULL, NULL, '2022-10-01 09:44:32'),
('2022100302C2', 4, 17, 1, 1, 629, 30, NULL, NULL, '1', 1, NULL, NULL, '2022-10-03 07:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `invoice_id` varchar(1000) NOT NULL,
  `order_products_id` int(11) NOT NULL,
  `pdid` int(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `p_image` varchar(1000) NOT NULL,
  `p_name` varchar(1000) NOT NULL,
  `p_size` varchar(11) DEFAULT NULL,
  `p_color` varchar(51) DEFAULT NULL,
  `p_qty` int(11) NOT NULL,
  `p_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`invoice_id`, `order_products_id`, `pdid`, `users_id`, `p_image`, `p_name`, `p_size`, `p_color`, `p_qty`, `p_price`, `total_price`, `created_at`) VALUES
('20220922CF33', 1, 4, 17, 'maroon4.jpg', 'Soumita Men\'s Jute Solid Regular Fit Ethnic Nehru Jacket (Maroon, Size- 40)', 'XL', 'Blue', 1, 850, 850, '2022-09-22 13:22:03'),
('20220927B242', 2, 3, 18, 'b3.jpg', 'Soumita Men\'s Jute Solid Regular Fit Ethnic Nehru Jacket', '2XL', 'Blue', 2, 875, 1750, '2022-09-27 07:02:40'),
('2022100129C8', 3, 13, 19, 'matte1.jpg', 'Soumita Men\'s Jute Regular Fit Nehru Modi Jacket Mandarin Collar Sleeveless with Pockets', 'M', 'Blue', 1, 599, 599, '2022-10-01 09:44:33'),
('2022100302C2', 4, 14, 17, 'PHOTO-2022-03-23-17-40-36.jpg', 'Soumita Men\'s Nehru Jacket Jute Regular Fit Modi Coat Mandarin Collar Sleeveless with Pockets for Boys Latest', 'S', 'Blue', 1, 599, 599, '2022-10-03 07:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories` varchar(500) NOT NULL,
  `sub_categories` int(11) NOT NULL,
  `size_id` varchar(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `mrp` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sold` varchar(20) NOT NULL,
  `gst` varchar(200) NOT NULL,
  `image` varchar(250) NOT NULL,
  `image2` varchar(1000) DEFAULT NULL,
  `image3` varchar(1000) NOT NULL,
  `image4` varchar(1000) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `prod_desc` varchar(2000) NOT NULL,
  `meta_title` varchar(500) NOT NULL,
  `meta_keyword` varchar(500) NOT NULL,
  `meta_desc` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `offer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories`, `sub_categories`, `size_id`, `name`, `slug`, `mrp`, `price`, `qty`, `sold`, `gst`, `image`, `image2`, `image3`, `image4`, `short_desc`, `prod_desc`, `meta_title`, `meta_keyword`, `meta_desc`, `status`, `offer`) VALUES
(1, '1', 2, '', 'Soumita Mens Nehru Coat Modi Matte Jacket Regular Fit Mandarin Collar Sleeveless with Pockets for Boys', '', 1599, 699, 0, '', '5', '41UccpGZ1aL._UX569_.jpg', '51njvXTgKOL._UX569_.jpg', '51GFPgcjeFL._UX569_.jpg', '41UccpGZ1aL._UX569_.jpg', '<p><b>. </b>Men\'s Regular Fit Nehru Waist Jacket , Jacket for Party and Special Occasion</p><p>Men\'s Modi / Nehru Indian Traditional Ethnic Jacket .</p><p>Design Details: Look your Absolute Best in this Super-Stylish yet Contemporary Ethnic WaistJacket . Team it with Indian Traditional outfits such as Kurta Payjama, Jodhpuri Pants, Chudidhar Pants or with Western outfits such as Formal Trousers or Jeans for Perfect Appeal.</p><p>Occasion : Casual, Festival, Party, Marriage or Traditional Wear.</p><p>Closure Type: Button; Age Range Description: Adult .</p><p>\r\n                                </p>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Matte</td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p><br></p><p>\r\n                                    \r\n                                </p>', 'Soumita Mens Nehru Coat Modi Matte Jacket Regular Fit Mandarin Collar Sleeveless with Pockets for Boys', 'Mens Trending Jacket', 'Men\'s Regular Fit Nehru Waist Jacket , Jacket for Party and Special Occasion', 1, 0),
(2, '1', 1, '', 'Soumita Men\'s Nehru Jacket Jute Regular Fit Modi Coat Mandarin Collar Sleeveless with Pockets for Boys', '', 1499, 599, 0, '', '5', '51WT1Sg1RNL._UY741_.jpg', '51kTI1Og+qL._UY741_.jpg', '51S5TB8GrTL._UY741_.jpg', '514AadOHBZL._UY741_.jpg', '<ul><li>Soumita\'s jute-fabric modi jackets are a perfect blend of fashion and comfort.</li><li>The stylish jute fabric is carefully woven from the raw fibres of jute and then delivered to you in the form of Modi jackets, which promise not just elegance in your attire but also a great level of comfort.</li><li>Our Modi jackets fit like magic and come in trendy colours and many sizes to suit everyone\'s needs.</li><li>You can style our modi jackets with a kurta-pajama or trousers of your choice and simply rock the show.</li><li><br></li><li>\r\n                                   \r\n                                </li></ul>', '', '', '', '', 1, 1),
(3, '1', 1, '', 'Soumita Men\'s Jute Solid Regular Fit Ethnic Nehru Jacket', '', 1499, 599, 0, '', '5', 'b3.jpg', 'b2.jpg', 'b4.jpg', 'b5.jpg', '<ul>\r\n<li>Soumita\'s jute-fabric modi jackets are a perfect blend of fashion and comfort.</li><li>The stylish jute fabric is carefully woven from the raw fibres of jute and then delivered to you in the form of Modi jackets, which promise not just elegance in your attire but also a great level of comfort.</li><li>Our Modi jackets fit like magic and come in trendy colours and many sizes to suit everyone\'s needs.</li><li>You can style our modi jackets with a kurta-pajama or trousers of your choice and simply rock the show</li></ul><p><br></p>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Jute</td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 0),
(4, '1', 1, '', 'Soumita Men\'s Jute Solid Regular Fit Ethnic Nehru Jacket Trending', '', 1499, 599, 0, '', '5', 'maroon4.jpg', 'maroon3.jpg', 'maroon2.jpg', 'maroon1.jpg', '<p>\r\n                                   <b>.&nbsp;</b>Material used for Nehru jacket.Fabric Quality:- High-Quality Jute Fusing:- Cotton Heavy Fusing Use In Side Jacket lining:- Heavy Satin High-Quality Material, Directly From Manufactures \"</p><p><b>.&nbsp;</b>Pocket, 4 Pocket. 1 Chest Pocket, 2 Side Pockets, 1 Left Inside Pocket</p><p><b>.</b>&nbsp;{Product Features} - Type: Regular Look in Solid Plain Colours; Fabric: Cotton Jute; Style: Traditional Ethnic; Sleeveless; Rounded Neck; Buttoned Closure; Regular Fit; Inner Lining: Dobby; Actual Product may vary a bit due to Photoshoot, Lighting Affect &amp; Resolution Settings</p><p><b>.</b>&nbsp;Fit Type: Regular Fit. Style:- Nehru Jacket 5 Fancy Button, Suitable for: Formal, Casual, Official, Party Wear Business Work, Date, Party, Weddings, Engagement, Gift for Families, Friends and Boyfriend Etc.</p><p><b>.&nbsp;</b>Size Details - Kindly refer our Size Chart before ordering. All Sizes indicated are Chest Sizes as in Shirts in inches. For example, if your chest size is 40, then select 42 from the Size Chart and that should fit you fine</p><p><br></p><p><br></p><p>\r\n                                </p>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Jute</td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 1),
(5, '1', 1, '', 'Soumita Men\'s Rayon Bandhgala Festive Nehru Jacket', 'soumita-men-s-rayon-bandhgala-festive-nehru-jacket', 1195, 978, 0, '', '', '718zaGv+XBL._UX466_.jpg', '71UbVm5t0rL._UX466_.jpg', '714+j7jKWhL._UX466_.jpg', '91hwt+o111L._UX385_.jpg', '', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Jute</td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 0, 1),
(6, '1', 3, '', 'Men\'s Cotton crepe Nehru Jacket', '', 1899, 799, 0, '', '5', '001-removebg-preview.png', '', '', '', '<ul><li>Treat yourself with the best of styles with our modi jackets which come in the finest crepe fabric that will just upgrade your fashion game. From office wear to party wear,</li><li>Our crepe fabric modi jackets come in all ranges to suit the needs of various customers, and we also give them a decent choice in picking up the colors.</li><li>We make sure that our crepe fabric modi jackets not just provide our customers with a high fashion quotient but also a great sense of comfort at the same time.</li></ul>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Crepe</td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 0),
(7, '1', 3, '', 'Sleeveless Men\'s crepe Nehru Jacket', '', 1899, 799, 0, '', '', '002-removebg-preview.png', '', '', '', '<ul><li>Treat yourself with the best of styles with our modi jackets which come in the finest crepe fabric that will just upgrade your fashion game. From office wear to party wear,</li><li>Our crepe fabric modi jackets come in all ranges to suit the needs of various customers, and we also give them a decent choice in picking up the colors.</li><li>We make sure that our crepe fabric modi jackets not just provide our customers with a high fashion quotient but also a great sense of comfort at the same time.</li></ul>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Crepe</td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 0),
(8, '1', 3, '', 'Soumita Men\'s Crepe Regular Fit Nehru Modi Jacket Sleeveless with Pockets', '', 1899, 799, 0, '', '', '003-removebg-preview.png', '', '', '', '<ul><li>Treat yourself with the best of styles with our modi jackets which come in the finest crepe fabric that will just upgrade your fashion game. From office wear to party wear,</li><li>Our crepe fabric modi jackets come in all ranges to suit the needs of various customers, and we also give them a decent choice in picking up the colors.</li><li>We make sure that our crepe fabric modi jackets not just provide our customers with a high fashion quotient but also a great sense of comfort at the same time.</li></ul>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Crepe</td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 0),
(9, '1', 3, '', 'Sleeveless Men\'s crepe Nehru Jacket', '', 1899, 799, 0, '', '', '004-removebg-preview.png', '', '', '', '<ul><li>Treat yourself with the best of styles with our modi jackets which come in the finest crepe fabric that will just upgrade your fashion game. From office wear to party wear,</li><li>Our crepe fabric modi jackets come in all ranges to suit the needs of various customers, and we also give them a decent choice in picking up the colors.</li><li>We make sure that our crepe fabric modi jackets not just provide our customers with a high fashion quotient but also a great sense of comfort at the same time.</li></ul>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Crepe</td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 1),
(10, '1', 3, '', 'Soumita Men\'s crepe Solid Regular Fit Ethnic Nehru Jacket', '', 1899, 799, 0, '', '', '005-removebg-preview.png', '', '', '', '<ul><li>Treat yourself with the best of styles with our modi jackets which come in the finest crepe fabric that will just upgrade your fashion game. From office wear to party wear,</li><li>Our crepe fabric modi jackets come in all ranges to suit the needs of various customers, and we also give them a decent choice in picking up the colors.</li><li>We make sure that our crepe fabric modi jackets not just provide our customers with a high fashion quotient but also a great sense of comfort at the same time.</li></ul>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Crepe</td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 0),
(11, '1', 3, '', 'Sleeveless Men\'s crepe Nehru Jacket', '', 1899, 799, 0, '', '', '006-removebg-preview.png', '', '', '', '<ul><li>Treat yourself with the best of styles with our modi jackets which come in the finest crepe fabric that will just upgrade your fashion game. From office wear to party wear,</li><li>Our crepe fabric modi jackets come in all ranges to suit the needs of various customers, and we also give them a decent choice in picking up the colors.</li><li>We make sure that our crepe fabric modi jackets not just provide our customers with a high fashion quotient but also a great sense of comfort at the same time.</li></ul><p><br></p>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Crepe</td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 0),
(12, '1', 3, '', 'Soumita Men\'s Crepe Regular Fit Nehru Modi Jacket Sleeveless with Pockets', '', 1899, 799, 0, '', '', '007-removebg-preview.png', '', '', '', '<ul><li>Treat yourself with the best of styles with our modi jackets which come in the finest crepe fabric that will just upgrade your fashion game. From office wear to party wear,</li><li>Our crepe fabric modi jackets come in all ranges to suit the needs of various customers, and we also give them a decent choice in picking up the colors.</li><li>We make sure that our crepe fabric modi jackets not just provide our customers with a high fashion quotient but also a great sense of comfort at the same time.</li><li><br></li></ul>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Crepe</td></tr><tr><td>Sleevetype</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 0),
(13, '1', 1, '', 'Soumita Men\'s Jute Regular Fit Nehru Modi Jacket Mandarin Collar Sleeveless with Pockets', '', 1499, 599, 0, '', '', 'matte1.jpg', 'matte2.jpg', 'matte3.jpg', '', '<ul><li></li><li>Soumita\'s jute-fabric modi jackets are a perfect blend of fashion and comfort.</li><li>The stylish jute fabric is carefully woven from the raw fibres of jute and then delivered to you in the form of Modi jackets, which promise not just elegance in your attire but also a great level of comfort.</li><li>Our Modi jackets fit like magic and come in trendy colours and many sizes to suit everyone\'s needs.</li><li>You can style our modi jackets with a kurta-pajama or trousers of your choice and simply rock the show.</li></ul><p><br></p>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Jute</td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>Closure</td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr><tr><td><br></td><td><br></td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 0),
(14, '1', 1, '', 'Soumita Men\'s Nehru Jacket Jute Regular Fit Modi Coat Mandarin Collar Sleeveless with Pockets for Boys Latest', '', 1899, 599, 0, '', '5', 'PHOTO-2022-03-23-17-40-36.jpg', 'PHOTO-2022-03-23-17-40-27 (1).jpg', 'PHOTO-2022-03-23-17-40-25.jpg', 'PHOTO-2022-03-23-17-40-26 (1).jpg', '<ul><li></li><li>Soumita\'s jute-fabric modi jackets are a perfect blend of fashion and comfort.</li><li>The stylish jute fabric is carefully woven from the raw fibres of jute and then delivered to you in the form of Modi jackets, which promise not just elegance in your attire but also a great level of comfort.</li><li>Our Modi jackets fit like magic and come in trendy colours and many sizes to suit everyone\'s needs.</li><li>You can style our modi jackets with a kurta-pajama or trousers of your choice and simply rock the show.</li></ul><p><br></p>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Brand</td><td>Soumita</td></tr><tr><td>Fabric</td><td>Jute</td></tr><tr><td>Sleeve</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Ragular</td></tr><tr><td>OccasionÂ </td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 0),
(15, '1', 6, '', 'Soumita Men\'s Nehru Jacket Jacquard Fabric Regular Fit Modi Coat Mandarin Collar Sleeveless with Pockets for Boys Latest', '', 2299, 999, 0, '', '5', 'PHOTO-2022-03-23-17-40-28.jpg', 'PHOTO-2022-03-23-17-40-26.jpg', 'PHOTO-2022-03-23-17-40-29.jpg', '', '<p>At Soumita, we understand that jacquard fabrics are indeed the most comfortable ones because of their readiness of their yarns in getting woven directly into the fabrics which promises amazing craftsmanship as well.<br>Our jacquard fabric modi jackets are a promise from our side that we will assure our customers of the mix of comfort and trendiness without making a compromise on any side.&nbsp;<br>We value trends, but at the same time, the uneasiness of a garment is something that we strictly avoid.</p><p>\r\n                                   \r\n                                </p>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>BrandÂ </td><td>Soumita</td></tr><tr><td>Fabric</td><td>JacquardÂ </td></tr><tr><td>Sleeve Type</td><td>Sleeveless</td></tr><tr><td>Body Fit</td><td>Regular</td></tr><tr><td>ClosureÂ </td><td>Buttons</td></tr><tr><td>Occasion</td><td>Ethnic</td></tr></tbody></table><p>\r\n                                    \r\n                                </p>', '', '', '', 1, 0),
(16, '2', 4, '', 'Women Cotton Bra Panty Set', '', 300, 260, 0, '', '', 'WhatsApp Image 2022-10-01 at 12.00.41.webp', '', '', '', '', '', '', '', '', 1, 0),
(17, '2', 4, '', 'Women Lingerie Set Bra Panty', 'women-lingerie-set-bra-panty', 280, 240, 0, '', '', 'WhatsApp Image 2022-10-01 at 12.00.41 (1).jpeg', '', '', '', '', '', '', '', '', 1, 0),
(18, '2', 4, '', 'Women with Sexy Bra Panty Set', 'women-with-sexy-bra-panty-set', 300, 260, 0, '', '', 'WhatsApp Image 2022-10-01 at 12.00.42.jpeg', '', '', '', '', '', '', '', '', 1, 0),
(19, '2', 4, '', 'Cotton Mix Bra and Panty Set for Women\'s', 'cotton-mix-bra-and-panty-set-for-women-s', 280, 240, 0, '', '', 'WhatsApp Image 2022-10-01 at 12.00.42 (1).jpeg', '', '', '', '', '', '', '', '', 1, 0),
(20, '2', 4, '', 'Lycra Stretchable Bra Panty Set for Women', 'lycra-stretchable-bra-panty-set-for-women', 380, 280, 0, '', '', 'WhatsApp Image 2022-10-01 at 12.00.43.jpeg', '', '', '', '', '', '', '', '', 1, 0),
(21, '2', 4, '', 'Lingerie Set for Women Bra Panty Set for Women', 'lingerie-set-for-women-bra-panty-set-for-women', 300, 280, 0, '', '', 'WhatsApp Image 2022-10-01 at 12.00.43 (1).jpeg', '', '', '', '', '', '', '', '', 1, 0),
(22, '2', 4, '', 'Women Bridal Bra Panty Set and Swimwear', 'women-bridal-bra-panty-set-and-swimwear', 300, 280, 0, '', '', 'WhatsApp Image 2022-10-01 at 12.00.44.jpeg', '', '', '', '', '', '', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `product_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `colors` varchar(256) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_attribute`
--

INSERT INTO `product_attribute` (`product_id`, `id`, `size_id`, `colors`, `qty`, `product_code`) VALUES
(0, 1, 1, NULL, 12, ''),
(79, 2, 1, '', 10, 'W'),
(79, 3, 2, '', 10, 'C'),
(79, 4, 3, '', 10, '5'),
(105, 5, 1, NULL, 10, 'HFTS-001-GREY-RED-S'),
(105, 6, 2, NULL, 10, 'HFTS-001-GREY-RED-M'),
(105, 7, 3, NULL, 10, 'HFTS-001-GREY-RED-L'),
(90, 8, 1, NULL, 10, ''),
(90, 9, 2, NULL, 0, ''),
(90, 10, 3, NULL, 0, ''),
(78, 11, 1, '', 20, 'JOGGER010-GREY-S'),
(78, 12, 2, '', 10, 'JOGGER010-GREY-M'),
(89, 13, 1, NULL, 10, 'M-12324'),
(104, 15, 1, '', 20, 'RASasAS'),
(104, 16, 2, '', 20, 'N'),
(104, 17, 3, '', 20, '-'),
(104, 18, 4, '', 20, 'Y'),
(104, 19, 5, '', 20, 'e'),
(1, 20, 1, '8,1,2,4,5', 10, ''),
(93, 23, 1, NULL, 20, 'P'),
(93, 24, 2, NULL, 20, 'a'),
(101, 27, 1, NULL, 10, 'T'),
(101, 28, 2, NULL, 10, 's'),
(101, 29, 3, NULL, 10, 'h'),
(101, 30, 4, NULL, 10, 'i'),
(101, 31, 5, NULL, 10, 'r'),
(105, 32, 4, NULL, 10, 'HFTS-001-GREY-RED-XL'),
(105, 33, 5, NULL, 10, 'HFTS-001-GREY-RED-XXL'),
(106, 34, 1, NULL, 10, 'HFTS-001-BLACK-RES-S'),
(106, 35, 2, NULL, 10, 'HFTS-001-BLACK-RES-M'),
(106, 36, 3, NULL, 10, 'HFTS-001-BLACK-RES-L'),
(106, 37, 4, NULL, 10, 'HFTS-001-BLACK-RES-XL'),
(106, 38, 5, NULL, 10, 'HFTS-001-BLACK-RES-XXL'),
(107, 39, 1, NULL, 10, 'H'),
(107, 40, 2, NULL, 10, 'O'),
(107, 41, 3, NULL, 10, 'O'),
(107, 42, 4, NULL, 10, 'D'),
(107, 43, 5, NULL, 10, 'E'),
(108, 44, 1, NULL, 10, 'H'),
(108, 45, 2, NULL, 10, 'a'),
(108, 46, 3, NULL, 10, 'l'),
(108, 47, 4, NULL, 10, 'f'),
(108, 48, 5, NULL, 10, 'S'),
(109, 49, 1, NULL, 10, 'A'),
(109, 50, 2, NULL, 10, 'i'),
(109, 51, 3, NULL, 10, 'r'),
(109, 52, 4, NULL, 10, 'j'),
(109, 53, 5, NULL, 10, 'e'),
(110, 54, 1, NULL, 10, 'Airjet-Black-Navy-S'),
(111, 55, 1, NULL, 10, 'A'),
(111, 56, 2, NULL, 10, 'i'),
(111, 57, 3, NULL, 10, 'r'),
(111, 58, 4, NULL, 10, 'j'),
(111, 59, 5, NULL, 10, 'e'),
(83, 60, 2, NULL, 20, 'B'),
(83, 61, 3, NULL, 20, 'o'),
(83, 62, 4, NULL, 20, 'x'),
(83, 63, 5, NULL, 20, 'e'),
(112, 64, 1, NULL, 10, 'A'),
(112, 65, 2, NULL, 10, 'i'),
(112, 66, 3, NULL, 10, 'r'),
(112, 67, 4, NULL, 10, 'j'),
(112, 68, 5, NULL, 10, 'e'),
(113, 69, 1, '', 10, 'ChikanPlazzo-White-S'),
(113, 70, 2, '', 10, 'ChikanPlazzo-White-M'),
(113, 71, 3, '', 10, 'ChikanPlazzo-White-L'),
(113, 72, 4, '', 10, 'ChikanPlazzo-White-XL'),
(113, 73, 5, '', 10, 'ChikanPlazzo-White-XXL'),
(114, 74, 1, '', 10, 'KurtaPlazzo2-Green-S'),
(114, 75, 2, '', 10, 'KurtaPlazzo2-Green-M'),
(114, 76, 3, '', 10, 'KurtaPlazzo2-Green-L'),
(114, 77, 4, '', 10, 'KurtaPlazzo2-Green-XL'),
(114, 78, 5, '', 10, 'KurtaPlazzo2-Green-XXL'),
(115, 79, 1, NULL, 10, 'KurtaPlazzo2-Grey-S'),
(115, 80, 2, NULL, 10, 'u'),
(115, 81, 3, NULL, 10, 'r'),
(115, 82, 4, NULL, 10, 't'),
(115, 83, 5, NULL, 10, 'a'),
(116, 84, 1, NULL, 10, 'K'),
(116, 85, 2, NULL, 10, 'u'),
(116, 86, 3, NULL, 10, 'r'),
(116, 87, 4, NULL, 10, 't'),
(116, 88, 5, NULL, 10, 'a'),
(117, 89, 1, NULL, 10, 'K'),
(117, 90, 2, NULL, 10, 'u'),
(117, 91, 3, NULL, 10, 'r'),
(117, 92, 4, NULL, 10, 't'),
(117, 93, 5, NULL, 10, 'a'),
(118, 94, 1, NULL, 10, 'K'),
(118, 95, 2, NULL, 10, 'u'),
(118, 96, 3, NULL, 10, 'r'),
(118, 97, 4, NULL, 10, 't'),
(118, 98, 5, NULL, 10, 'a'),
(119, 99, 1, NULL, 10, 'K'),
(119, 100, 2, NULL, 10, 'u'),
(119, 101, 3, NULL, 10, 'r'),
(119, 102, 4, NULL, 10, 't'),
(119, 103, 5, NULL, 10, 'a'),
(120, 104, 1, NULL, 10, 'K'),
(120, 105, 2, NULL, 10, 'u'),
(120, 106, 3, NULL, 10, 'r'),
(120, 107, 4, NULL, 10, 't'),
(120, 108, 5, NULL, 10, 'a'),
(121, 109, 1, NULL, 10, 'C'),
(121, 110, 2, NULL, 10, 'h'),
(121, 111, 2, NULL, 10, 'i'),
(121, 112, 3, NULL, 10, 'k'),
(121, 113, 4, NULL, 10, 'a'),
(122, 114, 1, NULL, 10, 'C'),
(122, 115, 2, NULL, 10, 'h'),
(122, 116, 3, NULL, 10, 'i'),
(122, 117, 4, NULL, 10, 'k'),
(122, 118, 5, NULL, 10, 'a'),
(123, 119, 1, NULL, 10, 'C'),
(123, 120, 2, NULL, 10, 'h'),
(123, 121, 3, NULL, 10, 'i'),
(123, 122, 4, NULL, 10, 'k'),
(123, 123, 5, NULL, 10, 'a'),
(124, 124, 1, NULL, 10, 'C'),
(124, 125, 2, NULL, 10, 'h'),
(124, 126, 3, NULL, 10, 'i'),
(124, 127, 4, NULL, 10, 'k'),
(124, 128, 5, NULL, 10, 'a'),
(125, 129, 1, '', 10, 'R'),
(125, 130, 2, '', 10, 'N'),
(125, 131, 3, '', 10, '-'),
(125, 132, 4, '', 10, 'F'),
(125, 133, 5, '', 10, 'L'),
(126, 134, 1, '', 10, 'R'),
(126, 135, 2, '', 10, 'N'),
(126, 136, 3, '', 10, '-'),
(126, 137, 4, '', 10, 'F'),
(126, 138, 5, '', 10, 'L'),
(93, 139, 3, NULL, 20, 'j'),
(87, 140, 2, NULL, 20, 'H'),
(95, 141, 2, NULL, 10, 'S'),
(88, 142, 2, NULL, 10, 'C'),
(80, 143, 1, '', 10, 'W'),
(80, 144, 2, '', 10, 'C'),
(80, 145, 3, '', 10, '5'),
(80, 146, 4, '', 10, '5'),
(80, 147, 5, '', 10, '0'),
(78, 148, 3, '', 10, 'JOGGER010-GREY-L'),
(78, 149, 4, '', 10, 'JOGGER010-GREY-XL'),
(78, 150, 5, '', 10, 'JOGGER010-GREY-XXL'),
(81, 151, 1, '', 10, 'W'),
(81, 152, 2, '', 10, 'C'),
(81, 153, 3, '', 10, '5'),
(81, 154, 4, '', 10, '5'),
(81, 155, 5, '', 10, '0'),
(88, 156, 3, NULL, 10, 'h'),
(88, 157, 4, NULL, 10, 'i'),
(95, 158, 3, NULL, 10, 'U'),
(95, 159, 4, NULL, 10, 'I'),
(96, 160, 2, NULL, 10, 'T'),
(96, 161, 1, NULL, 10, 'r'),
(96, 162, 3, NULL, 10, 'o'),
(96, 163, 5, NULL, 10, 'u'),
(82, 164, 1, '', 20, 'Z'),
(82, 165, 2, '', 20, 'i'),
(82, 166, 3, '', 20, 'p'),
(82, 167, 4, '', 20, '-'),
(82, 168, 5, '', 20, 'H'),
(93, 169, 4, NULL, 20, 'a'),
(93, 170, 5, NULL, 20, 'm'),
(98, 171, 1, NULL, 10, 'N'),
(98, 172, 2, NULL, 10, 'i'),
(98, 173, 3, NULL, 10, 'g'),
(98, 174, 4, NULL, 10, 'h'),
(97, 175, 1, NULL, 10, 'N'),
(97, 176, 2, NULL, 10, 'i'),
(97, 177, 3, NULL, 10, 'g'),
(97, 178, 4, NULL, 10, 'h'),
(127, 179, 1, '', 10, 'P'),
(127, 180, 2, '', 10, 'l'),
(127, 181, 3, '', 10, 'a'),
(127, 182, 4, '', 10, 'z'),
(127, 183, 5, '', 10, 'z'),
(128, 184, 1, '3', 10, 'P'),
(128, 185, 2, '3', 10, 'l'),
(128, 186, 3, '3', 10, 'a'),
(128, 187, 4, '3', 10, 'z'),
(128, 188, 5, '3', 10, 'z'),
(129, 189, 1, NULL, 10, 'W'),
(129, 190, 2, NULL, 10, '-'),
(129, 191, 3, NULL, 10, 'P'),
(129, 192, 4, NULL, 10, 'a'),
(129, 193, 5, NULL, 10, 'j'),
(130, 194, 1, NULL, 10, 'W'),
(130, 195, 2, NULL, 10, '-'),
(130, 196, 3, NULL, 10, 'P'),
(130, 197, 4, NULL, 10, 'a'),
(130, 198, 5, NULL, 10, 'j'),
(131, 199, 1, NULL, 10, 'W'),
(131, 200, 2, NULL, 10, '-'),
(131, 201, 3, NULL, 10, 'P'),
(131, 202, 4, NULL, 10, 'a'),
(131, 203, 5, NULL, 10, 'j'),
(132, 204, 1, '', 10, 'P'),
(132, 205, 2, '', 10, 'l'),
(132, 206, 3, '', 10, 'a'),
(132, 207, 4, '', 10, 'z'),
(132, 208, 5, '', 10, 'z'),
(133, 209, 1, '', 10, 'H'),
(133, 210, 2, '', 10, 'e'),
(133, 211, 3, '', 10, 'n'),
(133, 212, 4, '', 10, 'l'),
(133, 213, 5, '', 10, 'e'),
(134, 214, 1, NULL, 10, 'H'),
(134, 215, 2, NULL, 10, 'e'),
(134, 216, 3, NULL, 10, 'n'),
(134, 217, 4, NULL, 10, 'l'),
(134, 218, 5, NULL, 10, 'e'),
(135, 219, 1, '8', 10, 'K'),
(135, 220, 2, '8', 10, 'u'),
(135, 221, 3, '8', 10, 'r'),
(135, 222, 4, '8', 10, 't'),
(135, 223, 5, '8', 10, 'a'),
(136, 224, 1, NULL, 10, 'A'),
(136, 225, 2, NULL, 10, 'r'),
(136, 226, 3, NULL, 10, 'm'),
(136, 227, 4, NULL, 10, 'y'),
(136, 228, 5, NULL, 10, '1'),
(137, 229, 1, NULL, 20, 'M'),
(137, 230, 2, NULL, 10, 'V'),
(137, 231, 3, NULL, 20, ''),
(137, 232, 4, NULL, 20, ''),
(137, 233, 5, NULL, 10, 'H'),
(138, 234, 1, NULL, 10, 'H'),
(138, 235, 2, NULL, 10, 'F'),
(138, 236, 3, NULL, 10, 'T'),
(138, 237, 4, NULL, 10, 'S'),
(138, 238, 5, NULL, 10, '-'),
(139, 239, 1, NULL, 10, 'H'),
(139, 240, 2, NULL, 10, 'F'),
(139, 241, 3, NULL, 10, 'T'),
(139, 242, 4, NULL, 10, 'S'),
(139, 243, 5, NULL, 10, '-'),
(140, 244, 1, NULL, 10, 'H'),
(140, 245, 2, NULL, 10, 'E'),
(140, 246, 3, NULL, 10, 'N'),
(140, 247, 4, NULL, 10, 'L'),
(140, 248, 5, NULL, 10, 'E'),
(141, 249, 1, '', 10, 'H'),
(141, 250, 2, '', 10, 'E'),
(141, 251, 3, '', 10, 'N'),
(141, 252, 4, '', 10, 'L'),
(141, 253, 5, '', 10, 'E'),
(142, 254, 1, '', 10, 'H'),
(142, 255, 2, '', 10, 'S'),
(142, 256, 3, '', 10, '-'),
(142, 257, 4, '', 10, 'P'),
(142, 258, 5, '', 10, 'O'),
(143, 259, 1, NULL, 10, 'H'),
(143, 260, 2, NULL, 10, 'S'),
(143, 261, 3, NULL, 10, '-'),
(143, 262, 4, NULL, 10, 'P'),
(143, 263, 5, NULL, 10, 'O'),
(144, 264, 1, NULL, 10, 'H'),
(144, 265, 2, NULL, 10, 'S'),
(144, 266, 3, NULL, 10, '-'),
(144, 267, 4, NULL, 10, 'P'),
(144, 268, 5, NULL, 10, 'O'),
(145, 269, 1, '', 10, 'F'),
(145, 270, 2, '', 10, 'S'),
(145, 271, 3, '', 10, '-'),
(145, 272, 4, '', 10, 'R'),
(145, 273, 5, '', 10, 'O'),
(146, 274, 1, '', 10, 'F'),
(146, 275, 2, '', 10, 'S'),
(146, 276, 3, '', 10, '-'),
(146, 277, 4, '', 10, 'R'),
(146, 278, 5, '', 10, 'O'),
(147, 279, 1, '', 10, 'F'),
(147, 280, 2, '', 10, 'S'),
(147, 281, 3, '', 10, '-'),
(147, 282, 4, '', 10, 'R'),
(147, 283, 5, '', 10, 'O'),
(94, 284, 1, '', 10, 'A'),
(94, 285, 2, '', 10, 'r'),
(94, 286, 3, '', 10, 'm'),
(94, 287, 4, '', 10, 'y'),
(94, 288, 5, '', 10, '3'),
(79, 289, 4, '', 10, '5'),
(79, 290, 5, '', 10, '0'),
(99, 291, 1, NULL, 10, ''),
(99, 292, 2, NULL, 10, ''),
(99, 293, 3, NULL, 10, ''),
(99, 294, 4, NULL, 10, ''),
(100, 295, 1, NULL, 10, 'K'),
(100, 296, 2, NULL, 10, 'U'),
(100, 297, 3, NULL, 10, 'R'),
(100, 298, 4, NULL, 10, 'T'),
(92, 299, 1, NULL, 10, 'K'),
(92, 300, 2, NULL, 10, 'U'),
(92, 301, 3, NULL, 10, 'R'),
(92, 302, 4, NULL, 10, 'T'),
(148, 303, 1, '', 10, 'R'),
(148, 304, 2, '', 10, 'N'),
(148, 305, 3, '', 10, '-'),
(148, 306, 4, '', 10, 'M'),
(148, 307, 5, '', 10, 'a'),
(149, 308, 1, '', 10, 'R'),
(149, 309, 2, '', 10, 'N'),
(149, 310, 3, '', 10, '-'),
(149, 311, 4, '', 10, 'R'),
(149, 312, 5, '', 10, 'e'),
(150, 313, 1, NULL, 10, 'N'),
(150, 314, 2, NULL, 10, 'i'),
(150, 315, 3, NULL, 10, 'g'),
(150, 316, 4, NULL, 10, 'h'),
(150, 317, 5, NULL, 10, 't'),
(151, 318, 1, NULL, 10, 'R'),
(151, 319, 2, NULL, 20, 'H'),
(152, 320, 1, '', 10, ''),
(152, 321, 2, '', 10, ''),
(152, 322, 4, '', 10, ''),
(153, 323, 1, '', 10, 'K'),
(153, 324, 2, '', 10, 'a'),
(153, 325, 3, '', 10, 'n'),
(153, 326, 4, '', 10, 'g'),
(153, 327, 5, '', 10, 'a'),
(154, 328, 1, '', 10, 'W'),
(154, 329, 2, '', 10, 'C'),
(154, 330, 3, '', 10, '2'),
(154, 331, 4, '', 10, '2'),
(154, 332, 5, '', 10, '0'),
(155, 334, 1, '', 10, 'W'),
(155, 335, 2, '', 10, 'C'),
(155, 336, 3, '', 10, '2'),
(155, 337, 4, '', 10, '2'),
(155, 338, 5, '', 10, '0'),
(156, 339, 1, '', 10, 'W'),
(156, 340, 2, '', 10, 'C'),
(156, 341, 3, '', 10, '2'),
(156, 342, 4, '', 10, '2'),
(156, 343, 5, '', 10, '0'),
(157, 344, 1, '', 10, 'W'),
(157, 345, 2, '', 10, 'C'),
(157, 346, 3, '', 10, '2'),
(157, 347, 4, '', 10, '2'),
(157, 348, 5, '', 10, '-'),
(158, 349, 1, NULL, 10, 'W'),
(158, 350, 2, NULL, 10, 'C'),
(158, 351, 3, NULL, 10, '2'),
(158, 352, 4, NULL, 10, '2'),
(158, 353, 5, NULL, 10, '-'),
(159, 354, 1, '', 10, 'W'),
(159, 355, 2, '', 10, 'C'),
(159, 356, 3, '', 10, '2'),
(159, 357, 4, '', 10, '2'),
(159, 358, 5, '', 10, '-'),
(160, 359, 1, '', 10, 'W'),
(160, 360, 2, '', 10, 'C'),
(160, 361, 3, '', 10, '2'),
(160, 362, 4, '', 10, '2'),
(160, 363, 5, '', 10, '-'),
(161, 364, 1, '', 10, 'K'),
(161, 365, 2, '', 10, 'A'),
(161, 366, 3, '', 10, 'G'),
(161, 367, 4, '', 10, 'A'),
(161, 368, 5, '', 10, 'R'),
(162, 369, 1, '', 10, 'K'),
(162, 370, 2, '', 10, 'A'),
(162, 371, 3, '', 10, 'G'),
(162, 372, 4, '', 10, 'A'),
(162, 373, 5, '', 10, 'R'),
(163, 374, 1, '', 10, ''),
(163, 375, 2, '', 10, ''),
(163, 376, 3, '', 10, ''),
(163, 377, 4, '', 10, ''),
(163, 378, 5, '', 10, ''),
(164, 379, 1, '', 10, 'Z'),
(164, 380, 2, '', 10, 'I'),
(164, 381, 3, '', 10, 'P'),
(164, 382, 4, '', 10, '1'),
(164, 383, 5, '', 10, '-'),
(165, 384, 1, '', 10, ''),
(165, 385, 2, '', 10, ''),
(165, 386, 3, '', 10, ''),
(165, 387, 4, '', 10, ''),
(165, 388, 5, '', 10, ''),
(166, 389, 1, '', 10, ''),
(166, 390, 2, '', 10, ''),
(166, 391, 3, '', 10, ''),
(166, 392, 4, '', 10, ''),
(167, 394, 2, '', 10, ''),
(167, 395, 3, '', 10, ''),
(167, 396, 4, '', 10, ''),
(167, 397, 5, '', 10, ''),
(168, 398, 2, '4', 10, ''),
(168, 399, 3, '4', 10, ''),
(168, 400, 4, '4', 10, ''),
(168, 401, 5, '4', 10, ''),
(169, 402, 2, '', 10, ''),
(169, 403, 3, '', 10, ''),
(169, 404, 4, '', 10, ''),
(169, 405, 5, '', 10, ''),
(170, 406, 2, '', 10, ''),
(170, 407, 3, '', 10, ''),
(170, 408, 4, '', 10, ''),
(170, 409, 5, '', 10, ''),
(171, 410, 2, NULL, 10, ''),
(171, 411, 3, NULL, 10, ''),
(171, 412, 4, NULL, 10, ''),
(171, 413, 5, NULL, 10, ''),
(172, 414, 2, '', 10, ''),
(172, 415, 3, '', 10, ''),
(172, 416, 4, '', 10, ''),
(172, 417, 5, '', 10, ''),
(173, 418, 5, NULL, 30, ''),
(173, 419, 3, NULL, 20, 'W'),
(174, 420, 4, NULL, 20, 'M'),
(174, 421, 12, NULL, 30, 'D'),
(175, 425, 2, '1', 10, 'Airjet-Black-White-S'),
(176, 426, 12, '2', 12, ' '),
(152, 433, 5, '', 10, ''),
(177, 434, 1, '9', 10, ''),
(177, 435, 2, '', 10, ''),
(177, 436, 3, '9', 10, ''),
(177, 437, 4, '9', 10, ''),
(177, 438, 5, '9', 10, ''),
(178, 439, 1, '8', 10, ''),
(178, 440, 2, '', 10, ''),
(178, 441, 3, '8', 10, ''),
(178, 442, 4, '8', 10, ''),
(178, 443, 5, '8', 10, ''),
(179, 444, 1, '8', 10, ''),
(179, 445, 2, '', 10, ''),
(179, 446, 3, '8', 10, ''),
(179, 447, 4, '8', 10, ''),
(179, 448, 5, '8', 10, ''),
(180, 449, 1, '3', 10, ''),
(180, 450, 2, '', 10, ''),
(180, 451, 3, '3', 10, ''),
(180, 452, 4, '3', 10, ''),
(180, 453, 5, '3', 10, ''),
(181, 454, 1, '2', 10, ''),
(181, 455, 2, '', 10, ''),
(181, 456, 3, '2', 10, ''),
(181, 457, 4, '2', 10, ''),
(181, 458, 5, '2', 10, ''),
(182, 459, 1, '4', 10, ''),
(182, 460, 2, '', 10, ''),
(182, 461, 3, '4', 10, ''),
(182, 462, 4, '4', 10, ''),
(182, 463, 5, '4', 10, ''),
(183, 464, 1, '8', 10, ''),
(183, 465, 2, '', 10, ''),
(183, 466, 3, '8', 10, ''),
(183, 467, 4, '8', 10, ''),
(183, 468, 5, '8', 10, ''),
(184, 469, 1, '2', 10, ''),
(184, 470, 2, '', 10, ''),
(184, 471, 3, '2', 10, ''),
(184, 472, 4, '2', 10, ''),
(184, 473, 5, '2', 10, ''),
(185, 474, 1, '9,2', 10, ''),
(185, 475, 2, '', 10, ''),
(185, 476, 3, '9', 10, ''),
(185, 477, 4, '9', 10, ''),
(185, 478, 5, '9', 10, ''),
(186, 479, 3, '1', 20, 'M-12324'),
(187, 480, 2, '1,9', 10, 'MZqq00031'),
(188, 481, 1, '1,3', 10, 'MZqq00031'),
(2, 483, 0, '8,1,2,4,5', 10, ''),
(3, 484, 1, '8,1,2,4,5', 10, ''),
(5, 486, 1, '1,8,2,4,5', 10, ''),
(5, 487, 2, '1,8,2,4,5', 20, ''),
(1, 488, 1, '8,1,2,4,5', 10, ''),
(1, 489, 2, '8,1,2,4,5', 10, ''),
(1, 490, 3, '8,1,2,4,5', 10, ''),
(1, 491, 4, '8,1,2,4,5', 10, ''),
(1, 492, 6, '8,1,2,4,5', 10, ''),
(1, 494, 7, '8,1,2,4,5', 0, ''),
(1, 495, 8, '8,1,2,4,5', 10, ''),
(1, 496, 9, '8,1,2,4,5', 10, ''),
(2, 497, 1, '8,1,2,4,5', 10, ''),
(2, 498, 2, '8,1,2,4,5', 10, ''),
(2, 499, 3, '8,1,2,4,5', 10, ''),
(2, 500, 4, '8,1,2,4,5', 10, ''),
(2, 501, 6, '8,1,2,4,5', 10, ''),
(2, 502, 7, '8,1,2,4,5', 10, ''),
(2, 503, 8, '8,1,2,4,5', 10, ''),
(3, 513, 2, '8,1,2,4,5', 10, ''),
(3, 514, 3, '8,1,2,4,5', 10, ''),
(3, 515, 4, '8,1,2,4,5', 10, ''),
(3, 516, 6, '8,1,2,4,5', 10, ''),
(3, 517, 7, '8,1,2,4,5', 10, ''),
(3, 518, 8, '8,1,2,4,5', 10, ''),
(3, 519, 9, '8,1,2,4,5', 10, ''),
(4, 520, 1, '8,1,2,4,5', 10, ''),
(4, 521, 2, '8,1,2,4,5', 10, ''),
(4, 522, 3, '8,1,2,4,5', 10, ''),
(4, 523, 4, '8,1,2,4,5', 10, ''),
(4, 524, 6, '8,1,2,4,5', 10, ''),
(4, 525, 7, '8,1,2,4,5', 10, ''),
(4, 526, 8, '8,1,2,4,5', 10, ''),
(4, 527, 9, '8,1,2,4,5', 10, ''),
(5, 531, 3, '1,8,2,4,5', 10, ''),
(5, 532, 4, '1,8,2,4,5', 0, ''),
(5, 533, 6, '1,8,2,4,5', 10, ''),
(5, 534, 7, '1,8,2,4,5', 10, ''),
(5, 535, 8, '1,8,2,4,5', 10, ''),
(5, 536, 9, '1,8,2,4,5', 10, ''),
(6, 537, 1, '15,14,13,12,11,2,4', 10, 'S'),
(6, 538, 2, '15,14,13,12,11,2,4', 10, 'O'),
(6, 539, 3, '15,14,13,12,11,2,4', 10, 'U'),
(6, 540, 4, '15,14,13,12,11,2,4', 10, 'M'),
(6, 541, 6, '15,14,13,12,11,2,4', 10, 'I'),
(6, 542, 7, '15,14,13,12,11,2,4', 10, 'T'),
(6, 543, 8, '15,14,13,12,11,2,4', 10, 'A'),
(6, 544, 9, '15,14,13,12,11,2,4', 10, '0'),
(7, 545, 1, '15,14,13,12,11,2,4', 10, 'S'),
(7, 546, 2, '15,14,13,12,11,2,4', 10, 'O'),
(7, 547, 3, '15,14,13,12,11,2,4', 10, 'U'),
(7, 548, 4, '15,14,13,12,11,2,4', 10, 'M'),
(7, 549, 6, '15,14,13,12,11,2,4', 10, 'I'),
(7, 550, 7, '15,14,13,12,11,2,4', 10, 'T'),
(7, 551, 8, '8,1,2,4,5', 10, 'A'),
(7, 552, 9, '15,14,13,12,11,2,4', 10, '1'),
(8, 553, 1, '15,14,13,12,11,2,4', 10, 'S'),
(8, 554, 2, '15,14,13,12,11,2,4', 10, 'O'),
(8, 555, 3, '15,14,13,12,11,2,4', 10, 'U'),
(8, 556, 4, '15,14,13,12,11,2,4', 10, 'M'),
(8, 557, 6, '15,14,13,12,11,2,4', 10, 'I'),
(8, 558, 7, '15,14,13,12,11,2,4', 10, 'T'),
(8, 559, 8, '15,14,13,12,11,2,4', 10, 'A'),
(8, 560, 9, '15,14,13,12,11,2,4', 10, '2'),
(9, 561, 1, '15,14,13,12,11,2,4', 10, 'S'),
(9, 562, 2, '15,14,13,12,11,2,4', 10, 'O'),
(9, 563, 3, '15,14,13,12,11,2,4', 10, 'U'),
(9, 564, 4, '15,14,13,12,11,2,4', 10, 'M'),
(9, 565, 6, '15,14,13,12,11,2,4', 10, 'I'),
(9, 566, 7, '15,14,13,12,11,2,4', 10, 'T'),
(9, 567, 8, '15,14,13,12,11,2,4', 10, 'A'),
(9, 568, 9, '15,14,13,12,11,2,4', 10, '3'),
(10, 569, 1, '15,14,13,12,11,2,4', 10, 'S'),
(10, 570, 2, '15,14,13,12,11,2,4', 10, 'O'),
(10, 571, 3, '15,14,13,12,11,2,4', 10, 'U'),
(10, 572, 4, '15,14,13,12,11,2,4', 10, 'M'),
(10, 573, 6, '15,14,13,12,11,2,4', 10, 'I'),
(10, 574, 7, '15,14,13,12,11,2,4', 10, 'T'),
(10, 575, 8, '15,14,13,12,11,2,4', 10, 'A'),
(10, 576, 9, '15,14,13,12,11,2,4', 10, '4'),
(11, 577, 1, '15,14,13,12,11,2,4', 10, 'S'),
(11, 578, 2, '15,14,13,12,11,2,4', 10, 'O'),
(11, 579, 3, '15,14,13,12,11,2,4', 10, 'U'),
(11, 580, 4, '15,14,13,12,11,2,4', 10, 'M'),
(11, 581, 6, '15,14,13,12,11,2,4', 10, 'I'),
(11, 582, 7, '15,14,13,12,11,2,4', 10, 'T'),
(11, 583, 8, '15,14,13,12,11,2,4', 10, 'A'),
(11, 584, 9, '15,14,13,12,11,2,4', 10, '4'),
(12, 585, 1, '15,14,13,12,11,2,4,5', 10, 'S'),
(12, 586, 2, '15,14,13,12,11,2,4', 10, 'O'),
(12, 587, 3, '15,14,13,12,11,2,4', 10, 'U'),
(12, 588, 4, '15,14,13,12,11,2,4', 10, 'M'),
(12, 589, 6, '15,14,13,12,11,2,4', 10, 'I'),
(12, 590, 7, '15,14,13,12,11,2,4', 10, 'T'),
(12, 591, 8, '15,14,13,12,11,2,4', 10, 'A'),
(12, 592, 9, '15,14,13,12,11,2,4', 10, '5'),
(13, 593, 1, '8,1,2,4,5', 10, 'S'),
(13, 594, 2, '8,1,2,4,5', 10, 'O'),
(13, 595, 3, '8,1,2,4,5', 10, 'U'),
(13, 596, 4, '8,1,2,4,5', 10, 'M'),
(13, 597, 6, '8,1,2,4,5', 10, 'I'),
(13, 598, 7, '8,1,2,4,5', 10, 'T'),
(13, 599, 8, '8,1,2,4,5', 10, 'A'),
(13, 600, 9, '8,1,2,4,5', 10, '6'),
(14, 601, 1, '8,1,2,4,5', 10, ''),
(14, 602, 2, '8,1,2,4,5', 10, ''),
(14, 603, 3, '8,1,2,4,5', 10, ''),
(14, 604, 4, '8,1,2,4,5', 10, ''),
(14, 605, 6, '8,1,2,4,5', 10, ''),
(14, 606, 7, '8,1,2,4,5', 10, ''),
(14, 607, 8, '8,1,2,4,5', 10, ''),
(14, 608, 9, '8,1,2,4,5', 10, ''),
(15, 609, 1, '16', 10, ''),
(15, 610, 2, '16', 10, ''),
(15, 611, 3, '16', 10, ''),
(15, 612, 4, '16', 10, ''),
(15, 613, 6, '16', 10, ''),
(15, 614, 7, '16', 10, ''),
(15, 615, 8, '16', 10, ''),
(15, 616, 9, '16', 10, ''),
(16, 617, 0, '', 0, ''),
(17, 618, 0, '', 0, ''),
(18, 619, 0, '', 0, ''),
(19, 620, 0, '', 0, ''),
(20, 621, 0, '', 0, ''),
(21, 622, 0, '', 0, ''),
(22, 623, 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `short_banner`
--

CREATE TABLE `short_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `banner_link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `short_banner`
--

INSERT INTO `short_banner` (`id`, `image`, `banner_link`, `status`) VALUES
(1, 'ad-1.webp', ' http://riverhill.in/pro_category.php?id=1&sub_categories=26', 1),
(2, 'ad-2.webp', ' http://riverhill.in/pro_category.php?id=1&sub_categories=1', 1),
(3, 'ad-3.webp', ' http://riverhill.in/pro_category.php?id=1&sub_categories=9', 1),
(4, 'bg1.webp', ' http://riverhill.in/pro_category.php?id=2&sub_categories=11', 1),
(5, 'bg2.webp', ' http://riverhill.in/pro_category.php?id=2&sub_categories=17', 1),
(6, 'bg3.webp', ' http://riverhill.in/pro_category.php?id=2&sub_categories=2', 1),
(7, 'bb11.webp', ' http://riverhill.in/products', 1),
(8, 'bb4.webp', 'http://riverhill.in/products	', 1);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `order_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`, `order_by`, `status`) VALUES
(1, 'S', 1, 1),
(2, 'M', 2, 1),
(3, 'L', 3, 1),
(4, 'XL', 4, 1),
(6, '2XL', 6, 1),
(7, '3XL', 7, 1),
(8, '4XL', 8, 1),
(9, '5XL', 9, 1),
(10, '34', 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcribers`
--

CREATE TABLE `subcribers` (
  `s_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcribers`
--

INSERT INTO `subcribers` (`s_id`, `email`, `created_at`) VALUES
(1, 'vijay@gmail.com', '2022-09-20 13:34:45'),
(2, 'vijay@gmail.com', '2022-09-21 07:13:13'),
(3, 'vijay@gmail.com', '2022-09-21 08:15:17'),
(4, 'vijay@gmail.com', '2022-09-21 08:34:21'),
(5, '70piyushshah@gmail.com', '2022-10-01 20:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories` int(11) NOT NULL,
  `sub_categories` varchar(200) NOT NULL,
  `slug` varchar(51) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories`, `sub_categories`, `slug`, `status`) VALUES
(1, 1, 'Modi jackets ( Jute Fabric )', '', 1),
(2, 1, 'Modi jackets ( Matte Fabric )', 'modi-jackets-matte-fabric', 1),
(3, 1, 'Modi jackets ( Crepe Fabric )', 'modi-jackets-crepe-fabric', 1),
(4, 2, 'Bra Panty Set', 'bra-panty-set', 1),
(6, 1, 'Modi Jackets  (Jacquard Fabric)', 'modi-jackets-jacquard-fabric', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_subcategories`
--

CREATE TABLE `sub_subcategories` (
  `id` int(11) NOT NULL,
  `categories` int(11) NOT NULL,
  `sub_categories` int(11) NOT NULL,
  `sub_subcategories` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_subcategories`
--

INSERT INTO `sub_subcategories` (`id`, `categories`, `sub_categories`, `sub_subcategories`, `status`) VALUES
(1, 1, 1, 'T-Shirts', 1),
(2, 1, 1, 'Hoodies', 1),
(3, 1, 1, 'Boxer/Shorts', 1),
(4, 1, 1, '3/4Th', 1),
(5, 1, 1, 'Pajamas for men', 1),
(6, 1, 1, 'Mens Short Kurta', 1),
(7, 1, 1, 'Shirts', 1),
(8, 1, 1, 'Waistcoat', 1),
(9, 1, 1, 'Suit Jackets', 1),
(10, 2, 3, 'Kurta', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fullname` varchar(500) NOT NULL,
  `users_id` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(64) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `city` varchar(500) DEFAULT NULL,
  `pincode` int(10) DEFAULT NULL,
  `state` varchar(500) DEFAULT NULL,
  `user_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fullname`, `users_id`, `phone`, `email`, `password`, `address`, `city`, `pincode`, `state`, `user_status`, `created_at`, `updated_at`) VALUES
('Vijay Gupta', 1, '0825 057 023', 'vijay@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, 1, '2022-05-31 06:30:21', NULL),
('radhikA', 2, '9999472123', 'writetoradhikachopra@gmail.com', 'efd103d97fb7568fd15e51c1d3aae767', NULL, NULL, NULL, NULL, 1, '2022-06-01 07:24:19', NULL),
('BADAL BISWAS', 3, '+91880019773', 'badalbiswas90@gmail.com', '68357b9a4c9a26329d4e20eeca1e10ce', NULL, NULL, NULL, NULL, 1, '2022-06-01 15:39:47', NULL),
('Aman', 4, '9863298656', 'aman@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, 1, '2022-06-07 18:08:06', NULL),
('Annu', 5, '8800341387', 'sharma3009annu@gmail.com', 'ac224f465ae6724020375819cf0a0bab', NULL, NULL, NULL, NULL, 1, '2022-06-09 05:48:45', NULL),
('pawan', 6, '9098433389', 'pixl.pawan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 1, '2022-06-14 04:41:37', NULL),
('Rajesh Chatterjee', 7, '+91991088122', 'rajeshchatterjee99@gmail.com', 'ef775988943825d2871e1cfa75473ec0', NULL, NULL, NULL, NULL, 1, '2022-06-14 12:57:55', NULL),
('Suvojit das', 8, '9064912390', 'suvo54976@gmail.com', '266de3a886bd251a2cdec31c4e067b3f', NULL, NULL, NULL, NULL, 1, '2022-06-16 08:12:58', NULL),
('sss', 9, '4455667788', 'rssuman15@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, NULL, NULL, 1, '2022-06-18 04:48:31', NULL),
('jas jasss', 10, '8091094414', 'jasbinderptm@gmail.com', '87a7d8ca5e86be131a621142df0953f0', NULL, NULL, NULL, NULL, 1, '2022-06-18 10:46:36', NULL),
('himanshu shukla', 11, '07217751315', 'himanshu2.shekhar@paytmpayments.com', '0b3bc9ce555f07d127c6da44337e364f', NULL, NULL, NULL, NULL, 1, '2022-06-20 10:56:42', NULL),
('sateesh', 12, '8076844420', 'info@webscruise.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 1, '2022-06-23 17:09:55', NULL),
('Vijay', 13, '0825 057 023', 'vijayguptasibaiya123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, 1, '2022-06-27 12:02:48', NULL),
('Pranaw ', 14, '8987155216', 'asharay13014@gmail.com', '19aef98d762860da468f359202f587d2', NULL, NULL, NULL, NULL, 1, '2022-08-26 17:48:35', NULL),
('Vijay Gupta', 15, '7878980900', 'vijay@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, 1, '2022-09-20 10:58:06', NULL),
('FIZA', 16, '08527079802', 'fizak5743@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, 1, '2022-09-22 11:12:22', NULL),
('Vijay Gupta', 17, '8250570236', 'vijay@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, 1, '2022-09-22 13:17:42', NULL),
('Dinesh Bahal', 18, '8690054777', 'shubhda2018@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, 1, '2022-09-27 06:59:45', NULL),
('Chitra Pant Tiwari', 19, '7053756560', 'chitratiwari1802@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, 1, '2022-10-01 09:41:02', NULL),
('Piyush Shah', 20, '9825948749', '70piyushshah@gmail.com', '75c68fcbcd5402fcd2f96c67f366d223', NULL, NULL, NULL, NULL, 1, '2022-10-01 20:09:49', NULL),
('Ashok Kumar ', 21, '8283959917', 'ashokjarial916@gmail.com', '44b4051b72f1d4ef6a8f5a712c05e5f5', NULL, NULL, NULL, NULL, 1, '2022-10-08 16:42:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_wholesales`
--
ALTER TABLE `buy_wholesales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_heading`
--
ALTER TABLE `offers_heading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_products_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `short_banner`
--
ALTER TABLE `short_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcribers`
--
ALTER TABLE `subcribers`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_subcategories`
--
ALTER TABLE `sub_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_book`
--
ALTER TABLE `address_book`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buy_wholesales`
--
ALTER TABLE `buy_wholesales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `offers_heading`
--
ALTER TABLE `offers_heading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=624;

--
-- AUTO_INCREMENT for table `short_banner`
--
ALTER TABLE `short_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcribers`
--
ALTER TABLE `subcribers`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
