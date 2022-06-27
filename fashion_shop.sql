-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 24, 2022 lúc 05:10 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashion_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `color`, `size`, `images`, `quantity`, `created_at`, `updated_at`) VALUES
(57, '30', '#50bf31', 'XL', '', '3', '2022-01-29 23:27:00', '2022-01-29 23:27:00'),
(58, '33', '#1b1818', 'L', '', '1', '2022-01-29 23:28:04', '2022-01-29 23:28:04'),
(59, '28', '#d5e133', 'M', '30', '1', '2022-01-29 23:28:38', '2022-01-29 23:28:38'),
(60, '30', '#50bf31', 'XL', '', '1', '2022-01-30 20:29:54', '2022-01-30 20:29:54'),
(61, '30', '#50bf31', 'XL', '', '2', '2022-01-30 21:38:09', '2022-01-30 21:38:09'),
(62, '28', '#d5e133', 'M', '29', '3', '2022-01-30 21:42:03', '2022-01-30 21:42:03'),
(63, '28', '#272525', 'M', '29', '2', '2022-02-18 20:57:46', '2022-02-18 20:57:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `status`) VALUES
(1, 'Men', 'uploads/types-of-shirts-for-men-bewakoof-blog-1-1610963787.jpg', 1),
(2, 'girl', 'https://static.dosi-in.com/images/detailed/114/dosiin-tinderella-met-114247114247.jpg', 1),
(3, 'accessory', 'uploads/17820905_MTAwMC0xMDAwLTljODUxOTg1NDU.jpg', 1),
(4, 'baby_outfit', 'uploads/616DC9kOtML._AC_UL320_.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `product_id`, `color`, `size`, `created_at`, `updated_at`) VALUES
(1, 30, '#50bf31', 'XL', '2021-09-08 17:33:15', '2021-09-08 17:33:15'),
(2, 33, '#24a887', 'XXL', '2021-11-14 15:30:25', '2021-11-14 15:30:25'),
(3, 33, '#d81818', 'L', '2021-11-14 15:30:33', '2021-11-14 15:30:33'),
(4, 33, '#1b1818', 'XS', '2021-11-14 15:30:43', '2021-11-14 15:30:43'),
(5, 28, '#51d11a', 'L', '2021-11-14 15:31:35', '2021-11-14 15:31:35'),
(6, 28, '#272525', 'M', '2021-11-14 15:31:45', '2021-11-14 15:31:45'),
(7, 28, '#d5e133', 'L', '2021-11-14 15:31:56', '2021-11-14 15:31:56'),
(8, 32, '#de1b1b', 'S', '2021-11-14 15:33:01', '2021-11-14 15:33:01'),
(9, 32, '#f0660a', 'M', '2021-11-14 15:33:10', '2021-11-14 15:33:10'),
(10, 206, '#817474', 'XS', '2021-11-14 15:33:32', '2021-11-14 15:33:32'),
(11, 206, '#b41d1d', 'L', '2021-11-14 15:33:40', '2021-11-14 15:33:40'),
(12, 35, '#083ddd', 'S', '2021-11-14 15:35:50', '2021-11-14 15:35:50'),
(13, 34, '#1459c8', 'XS', '2021-11-14 15:36:10', '2021-11-14 15:36:10'),
(14, 36, '#000000', 'L', '2021-11-14 15:36:21', '2021-11-14 15:36:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `note`) VALUES
(1, '', 'Lò Văn Đồng', '0353802878', 'lodong601@gmail.com'),
(2, '', 'Lò Văn Đồng', '0353802878', 'lodong601@gmail.com'),
(3, 'Lò Văn Đồng', '0353802878', 'lodong601@gmail.com', 'i want to get my orders as soon as possible '),
(4, 'Lò Văn Đồng', '0353802878', 'lodong601@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_price` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `name`, `image`, `color`, `size`, `price`, `quantity`, `total_price`, `payment_id`, `status`, `created_at`, `updated_at`) VALUES
(114, 'sweater2', '', '#d5e133', 'M', '1100', '1', '1100', '6623', '1', '2022-02-18 14:00:42', '2022-02-18 14:02:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `home_number` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_type` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id`, `cart_id`, `name`, `email`, `address`, `phone`, `home_number`, `note`, `color`, `size`, `pay_type`, `total_price`, `created_at`, `updated_at`) VALUES
(287, 0, 'lò văn nam ', 'name@gmail.com', 'bản nà xa,thuận châu,sơn la ', '0234434533', '22', 'hello, can I get my items faster, please?', '', '', 1, 6000, '2021-08-25 17:18:30', '2021-08-25 17:18:30'),
(288, 0, 'lo van dong', 'lodong@gmail.com', 'ktx mỹ đình', '0353802879', '22', 'fdgdfgdfhgfd', '', '', 1, 6000, '2021-11-10 04:38:24', '2021-11-10 04:38:24'),
(290, 0, 'Nguyễn văn Tưởng', 'lodong601@gmail.com', 'ktx mỹ đình', '0353802879', '22', 'zxvzxv', '', '', 1, 3000, '2021-11-14 10:16:29', '2021-11-14 10:16:29'),
(292, 0, 'lo van dong', 'lodong@gmail.com', 'thuận châu, sơn la', '0353802878', '21', 'i want to get item quickly', '#50bf31', 'XL', 1, 3000, '2021-11-16 02:27:25', '2021-11-16 02:27:25'),
(293, 0, 'Lò Văn Đồng', 'lodong601@gmail.com', 'ktx mỹ đình', '0353802878', '22', 'nhanh', '#f0660a', 'M', 1, 6000, '2022-01-13 03:05:35', '2022-01-13 03:05:35'),
(299, 0, 'Lò Văn Đồng', 'lodong601@gmail.com', 'ktx mỹ đình', '0353802879', '22', 'i want to refund ', '#d5e133', 'M', 1, 2200, '2022-02-18 14:00:42', '2022-02-18 14:00:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(30) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(34) NOT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sale_price` int(23) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `sale_price`, `category_id`, `created_at`, `updated_at`) VALUES
(28, 'sweater2', 2000, 'uploads/1_35fcbc35-8f2a-4545-85fc-fb8ad97e1010_1600x.jpg', 1100, 1, '2021-08-17', '2022-01-28 03:34:38.549331'),
(30, 'yellow', 2000, 'uploads/m-dv24solidmustard-diversify-original-imafkbzvhcn3vgs7.jpeg', 1500, 1, '2021-08-17', NULL),
(32, 'grey', 2000, 'uploads/grey.jpg', 1500, 1, '2021-08-17', NULL),
(33, 'Blue dot', 2000, 'uploads/1_72fd232f-fe4a-4746-96f6-7fa0b43efd14_2000x (1).jpg', 1500, 1, '2021-08-17', NULL),
(34, 'Blue back', 2500, 'uploads/5_7b5421d7-6709-4616-949e-71bdd8ef2013_2000x (1).jpg', 1400, 1, '2021-08-17', '2022-01-28 03:34:49.085672'),
(35, 'red T-shirt', 2000, 'uploads/DSC_7376_2000x.jpg', 1500, 1, '2021-08-17', NULL),
(36, 'sweater', 2500, 'uploads/1_17.jpg', 1300, 1, '2021-08-17', '2022-01-28 03:34:43.871298'),
(206, 'appa', 5000, 'uploads/1.jpg', 2500, 1, '2021-08-28', '2021-08-28 13:36:34.794828'),
(208, 'hooded_shirt', 5000, 'uploads/616DC9kOtML._AC_UL320_.jpg', 1300, 4, '2022-01-28', NULL),
(209, 'Blue dress', 5000, 'uploads/alice.jpg', 3500, 4, '2022-01-28', NULL),
(210, 'hooded_as_puppy ', 5000, 'uploads/alitle_pupple.jpg', 1000, 4, '2022-01-28', NULL),
(211, 'cute_pup[y', 4000, 'uploads/cut_baby_winter.jpg', 2600, 4, '2022-01-28', NULL),
(212, 'panda_cute_little', 12000, 'uploads/full_outfit.jpg', 5900, 4, '2022-01-28', NULL),
(213, 'Halloween For baby', 4000, 'uploads/halowen_bb.jpg', 3500, 4, '2022-01-28', NULL),
(214, 'baby_suit', 10000, 'uploads/menlybaby.jpg', 5600, 4, '2022-01-28', NULL),
(215, 'winter_outfit', 5000, 'uploads/full_winterwarmly.jpg', 3500, 4, '2022-01-28', NULL),
(216, 'little_monster', 12000, 'uploads/little_monster.jpg', 3500, 4, '2022-01-28', NULL),
(217, 'Organic Clothes', 12000, 'uploads/organic _baby_clothing.jpg', 8700, 4, '2022-01-28', NULL),
(218, 'baby Christmas ', 5000, 'uploads/merry_Christmas.jpg', 1500, 4, '2022-01-28', NULL),
(219, 'sweaters', 5000, 'uploads/sweaters.jpg', 2500, 4, '2022-01-28', NULL),
(220, 'summer outfit', 12000, 'uploads/summer_outfit.jpg', 6000, 4, '2022-01-28', NULL),
(221, 'sefie_stick', 3000, 'uploads/selfie_stick.jpg', 2500, 3, '2022-01-28', NULL),
(222, 'Speakers', 5000, 'uploads/81F+gzLiCvS._AC_SS450_.jpg', 2500, 3, '2022-01-28', NULL),
(223, 'backup battery ', 5000, 'uploads/battery_backup.jpg', 2500, 3, '2022-01-28', NULL),
(224, 'Back Pack', 5000, 'uploads/backpack.jpg', 3500, 3, '2022-01-28', NULL),
(225, 'Bluetooth Speakers', 5000, 'uploads/Bluetooth_speaker.jpg', 3000, 3, '2022-01-28', NULL),
(226, 'Lighting Charger', 4000, 'uploads/lighting_charger.jpg', 1500, 3, '2022-01-28', NULL),
(227, 'Mouse', 3000, 'uploads/computer_mouse.jpg', 2500, 3, '2022-01-28', '2022-01-28 10:21:39.561140'),
(228, 'Green Speakers', 5000, 'uploads/boldgreen.jpg', 3500, 3, '2022-01-28', NULL),
(229, 'HeadPhones', 12000, 'uploads/Computer-Stereo-Headset-Headphone-Mobile-Phone-Accessories.jpg', 6000, 3, '2022-01-28', NULL),
(230, 'Head_charger', 1000, 'uploads/qhfumhu0xo4urq3paqw4.jpg', 500, 3, '2022-01-28', NULL),
(231, 'USB', 5000, 'uploads/usb.jpg', 3500, 3, '2022-01-28', NULL),
(232, 'overcoat', 5000, 'uploads/2c206cb66aff556342f123e0d599b773.jpg', 3000, 2, '2022-01-28', NULL),
(233, 'OfficeOutfit', 12000, 'uploads/4c55d38e249377a2d8918b094885a0ef.jpg', 6000, 2, '2022-01-28', NULL),
(234, 'Summer yellow shirt ', 12000, 'uploads/685aaf9c604b3b7850857701287d372b.jpg', 6000, 2, '2022-01-28', NULL),
(235, 'Skirt', 5000, 'uploads/b4e1e7a5050d5e09b3171b6e5cf7e836.jpg', 2500, 2, '2022-01-28', NULL),
(236, 'prom outfit', 12000, 'uploads/charming_gentle.jpg', 3000, 2, '2022-01-28', NULL),
(237, 'Student outfit', 5000, 'uploads/fa42eea87b56ea82e8e740799d6dc52c.jpg', 2500, 2, '2022-01-28', NULL),
(238, 'Fall Casual', 5000, 'uploads/fall_casual.jpg', 2500, 2, '2022-01-28', NULL),
(239, 'young style', 8000, 'uploads/fd4a36a74f8e6174c85e7308d180b9b8.jpg', 4000, 2, '2022-01-28', NULL),
(240, 'leather jackets', 12000, 'uploads/leather2.jpg', 3500, 2, '2022-01-28', '2022-01-28 10:38:15.272209'),
(241, 'office clothes', 5000, 'uploads/office_clothes.jpg', 3500, 2, '2022-01-28', NULL),
(242, 'streetwear', 5000, 'uploads/prom.jpg', 3500, 2, '2022-01-28', NULL),
(243, 'shoulders Dress', 12000, 'uploads/prom_clothing.jpg', 6000, 2, '2022-01-28', NULL),
(244, 'Snow jacket', 12000, 'uploads/snow.jpg', 6000, 2, '2022-01-28', NULL),
(245, 'Summer style', 12000, 'uploads/sport_clothing.jpg', 6000, 2, '2022-01-28', NULL),
(246, 'Young girl style', 12000, 'uploads/summer_girl.jpg', 6000, 2, '2022-01-28', NULL),
(247, 'White outfit', 12000, 'uploads/white_color_shirt.jpg', 6000, 2, '2022-01-28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_heart`
--

CREATE TABLE `product_heart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_heart`
--

INSERT INTO `product_heart` (`id`, `product_id`, `user_name`, `created_at`, `updated_at`) VALUES
(4, 30, 'lò văn Đồng', '2022-01-25 10:13:34', '2022-01-25 10:13:34'),
(9, 28, 'VanDong', '2022-01-29 14:35:39', '2022-01-29 14:35:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pro_image`
--

CREATE TABLE `pro_image` (
  `id` int(11) NOT NULL,
  `images` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pro_image`
--

INSERT INTO `pro_image` (`id`, `images`, `product_id`) VALUES
(29, 'upload/long_sleeves.jpg', 28),
(30, 'upload/types-of-shirts-for-men-bewakoof-blog-1-1610963787.jpg', 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating_star`
--

CREATE TABLE `rating_star` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `star` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `admin_rep` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating_star`
--

INSERT INTO `rating_star` (`id`, `name`, `email`, `content`, `star`, `product_id`, `admin_rep`, `created_at`, `updated_at`) VALUES
(196, 'VanDong', 'vandong@gmail.com', 'good!', 2, 28, 'thanks for your feedback!', '2022-01-31 08:05:25', '2022-01-31 08:05:25'),
(197, 'VanDong', 'vandong@gmail.com', 'this product is good ever', 4, 32, 'thanks for your feedback', '2022-01-31 12:49:09', '2022-01-31 12:49:09'),
(198, 'VanDong', 'vandong@gmail.com', 'this t-shirt is my favorite ', 5, 30, 'thanks for your feedback', '2022-02-01 09:53:43', '2022-02-01 09:53:43'),
(199, 'lò văn Đồng', 'lodong601@gmail.com', 'this is a good product i think ', 5, 218, 'thanks for your feedback', '2022-02-16 07:50:12', '2022-02-16 07:50:12'),
(200, 'lò văn Đồng', 'lodong601@gmail.com', 'fasfas', 5, 227, 'thanks for your feedback', '2022-02-16 07:53:03', '2022-02-16 07:53:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(23) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `re_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `address`, `phone`, `pass`, `re_pass`, `avatar`) VALUES
(4, 'VanDong', 'vandong@gmail.com', 'Sonla', '0353802877', 'Bekind12345', 'Bekind12345', 'upload/264103124_617982022856731_8002547851632721050_n.jpg'),
(5, 'van dong', 'lodong@gmail.com', 'hanoi', '0353802878', 'e10adc3949ba59abbe56', '123456', NULL),
(6, 'Lò Văn Đồng', 'lodong601@gmail.com', 'ktx mỹ đình', '0353802879', '25d55ad283aa400af464c76d713c07ad', '12345678', 'upload/person.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_heart`
--
ALTER TABLE `product_heart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pro_image`
--
ALTER TABLE `pro_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating_star`
--
ALTER TABLE `rating_star`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT cho bảng `product_heart`
--
ALTER TABLE `product_heart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `pro_image`
--
ALTER TABLE `pro_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `rating_star`
--
ALTER TABLE `rating_star`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
