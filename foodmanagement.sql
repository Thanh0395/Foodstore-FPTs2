-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 06:01 AM
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
-- Database: `foodmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `calories`
--

CREATE TABLE `calories` (
  `Calo_id` bigint(20) UNSIGNED NOT NULL,
  `F_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calories` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Cate_id` bigint(20) UNSIGNED NOT NULL,
  `Cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Cate_id`, `Cate_name`, `created_at`, `updated_at`) VALUES
(2, 'Fronzen', '2022-11-06 10:30:11', '2022-11-06 10:30:11'),
(3, 'Protein Salad', '2022-11-06 10:30:15', '2022-11-16 09:19:49'),
(4, 'Pasta', '2022-11-06 10:30:05', '2022-11-16 08:31:05'),
(5, 'Combo', '2022-11-06 18:06:03', '2022-11-06 18:06:03'),
(7, 'Drink', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_id` bigint(20) UNSIGNED NOT NULL,
  `U_id` bigint(20) UNSIGNED NOT NULL,
  `P_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `F_id` bigint(20) UNSIGNED NOT NULL,
  `F_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cate_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`F_id`, `F_name`, `Cate_id`, `image`, `price`, `description`, `created_at`, `updated_at`) VALUES
(11, 'Premium WAGYU Hamburg Steak 150g', 2, 'images/food/Frozen01.jpg', 179000, 'Vacuum - Frozen and Free Sauce', NULL, NULL),
(12, 'Premium WAGYU Hamburg Steak 150g x 2pcs set', 2, 'images/food/Frozen02.jpg', 350000, 'Vacuum - Frozen and Free Sauce', NULL, NULL),
(13, 'Black Angus \"STANBROKE\" Rib Eye Steak 200g', 2, 'images/food/Frozen03.jpg', 790000, 'Vacuum - Frozen and Free Sauce', NULL, NULL),
(15, 'Black Angus \"STANBROKE\" Tenderloin Steak 200g', 2, 'images/food/Frozen04.jpg', 1180000, 'Vacuum - Frozen and Free Sauce', NULL, NULL),
(16, 'Black Angus \"STANBROKE\" Sirloin 150g', 2, 'images/food/Frozen05.jpg', 580000, 'Vacuum - Frozen and Free Sauce', NULL, NULL),
(17, 'Carbonara', 4, 'images/food/Pasta01.jpg', 230000, 'Bacon and creamy sauce with stir egg yolk', NULL, NULL),
(18, 'Pescatore', 4, 'images/food/Pasta02.jpg', 319, 'Tomato sauce with sea food', NULL, NULL),
(19, 'Rigatoni Ragu', 4, 'images/food/Pasta03.jpg', 210000, 'Beef stew with vegetables with Rigatoni pasta', NULL, NULL),
(20, 'Pesto', 4, 'images/food/Pasta04.jpg', 239000, 'Basil sauce with pine nuts', NULL, NULL),
(21, 'Baked Chicken', 4, 'images/food/Pasta05.jpg', 300000, 'Steamed chicken with stewed vegetables and tomato sauce', NULL, NULL),
(22, 'Extra Moist and Tender Chicken Breast × Mixed Green Salad', 3, 'images/food/Salad01.jpg', 160000, 'With 4 kinds of homemade salad dressings', NULL, NULL),
(23, 'Black Angus \"STANBROKE Flap Seak × Mixed Green Salad', 3, 'images/food/Salad02.jpg', 210000, 'With 4 kinds of homemade salad dressings', NULL, NULL),
(24, 'Marinated Norwegian Salmon × Mixed Green Salad', 3, 'images/food/Salad03.jpg', 210000, 'With 4 kinds of homemade salad dressings', NULL, NULL),
(25, 'Ceasar Salad', 3, 'images/food/Salad04.jpg', 120000, 'Bacon, soft-Boiled Egg with salty fish sauce', NULL, NULL),
(26, 'WAGYU Hamburg Combo for 2', 5, 'images/food/Combo01.jpg', 490000, 'Full-Blood WAGYU Hamburg Steak 160g (Japanese Style Grilled Meatball) ×2, 15 Kinds of Mixed Green Salad, Today\'s Soup ×2, French Fries', NULL, NULL),
(27, 'Chicken Curry Rice Combo for 2', 5, 'images/food/Combo02.jpg', 390000, 'Grilled Chicken & Vegetables Curry ×2, 15 Kinds of Mixed Green Salad, Today\'s Soup ×2', NULL, NULL),
(28, 'Steak & Hamburg Combo for 2', 5, 'images/food/Combo03.jpg', 690000, 'Black Angus \"STANBROKE\" Sirloin 150g, Full-Blood WAGYU Hamburg Steak 160g (Japanese Style Grilled Meatball), 15 Kinds of Mixed Green Salad, Today\'s Soup×2, French Fries', NULL, NULL),
(29, 'Party Set for 4', 5, 'images/food/Combo04.jpg', 1690000, 'Black Angus \"STANBROKE\" Rib Eye Steak 200g, Charcoal-Grilled Chicken Thigh 250g, Any of Homemade Sauce, Tender Beef-Cutlet Sandwich, Slow-Low-Roasted Beef Tongue, Homemade Salsiccia×4, 15 Kinds of Mixed Green Salad, Marinated Salmon, French Fries', NULL, NULL),
(30, 'WAGYU & ANGUS RIB EYE STEAK PLATTER', 5, 'images/food/Combo05.jpg', 1750000, 'WAGYU & ANGUS RIB EYE STEAK 150g', NULL, NULL),
(31, 'Coca-cola', 7, 'images/food/Drink01.jpg', 29000, '330ml', NULL, NULL),
(32, 'Dasani', 7, 'images/food/Drink02.jpg', 19000, '330ml', NULL, NULL),
(33, 'Beer - Saigon Special', 7, 'images/food/Drink03.jpg', 30000, '330ml', NULL, NULL),
(34, 'Beer - Heineken', 7, 'images/food/Drink04.jpg', 35000, '330ml', NULL, NULL),
(35, 'Wine - Delafinca Brut Sparkling', 7, 'images/food/Drink05.jpg', 500000, 'From - Spain', NULL, NULL),
(36, 'Wine - Hemisferio, Sauvignon Blanc', 7, 'images/food/Drink06.jpg', 660000, 'From - Chile', NULL, NULL),
(37, 'Louis Pinel, Pinot Noir', 7, 'images/food/Drink07.jpg', 580000, 'From - France', NULL, NULL),
(38, 'Hemisferio, Cabernet Sauvignon', 7, 'images/food/Drink08.jpg', 660000, 'From - Chile', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food_images`
--

CREATE TABLE `food_images` (
  `FoodImage_id` bigint(20) UNSIGNED NOT NULL,
  `F_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(177, '2014_10_12_000000_create_users_table', 1),
(178, '2014_10_12_100000_create_password_resets_table', 1),
(179, '2019_08_19_000000_create_failed_jobs_table', 1),
(180, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(181, '2022_10_28_063550_create_categories_table', 1),
(182, '2022_10_28_063617_create_foods_table', 1),
(183, '2022_10_28_063643_create_orders_table', 1),
(184, '2022_11_01_034436_create_order_detail_table', 1),
(185, '2022_11_01_034703_create_wishlish_table', 1),
(186, '2022_11_01_034932_create_rating_table', 1),
(187, '2022_11_01_035057_create_posts_table', 1),
(188, '2022_11_01_035142_create_comments_table', 1),
(189, '2022_11_01_070757_create_food_images_table', 1),
(190, '2022_11_01_073159_create_calories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `O_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Processing',
  `U_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`O_id`, `status`, `U_id`, `note`, `created_at`, `updated_at`) VALUES
(6, 'Finished', 2, 'boom hang', '2022-11-10 05:53:29', '2022-11-21 04:29:17'),
(7, 'Finished', 1, 'thanh cong', '2021-12-16 15:34:28', '2022-11-21 04:29:17'),
(8, 'Finished', 3, 'thanh cong', '2022-10-11 15:34:36', '2022-11-21 04:29:17'),
(10, 'Finished', 6, 'boom hang', '2022-07-18 15:49:13', '2022-11-21 04:29:17'),
(11, 'Cancelled', 1, 'boom hang', '2022-11-12 07:45:29', '2022-11-19 01:04:11'),
(12, 'Finished', 6, 'Done', '2022-07-28 12:52:39', '2022-11-21 04:29:17'),
(13, 'Finished', 1, NULL, '2022-11-09 12:54:56', '2022-11-18 23:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `OD_id` bigint(20) UNSIGNED NOT NULL,
  `O_id` bigint(20) UNSIGNED NOT NULL,
  `F_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`OD_id`, `O_id`, `F_id`, `quantity`, `created_at`, `updated_at`) VALUES
(11, 6, 12, 1, NULL, NULL),
(12, 7, 13, 2, NULL, NULL),
(13, 8, 13, 2, NULL, NULL),
(14, 8, 12, 3, NULL, NULL),
(15, 8, 11, 3, NULL, NULL),
(16, 10, 12, 1, NULL, NULL),
(17, 10, 11, 0, NULL, NULL),
(18, 11, 15, 1, NULL, NULL),
(19, 11, 11, 3, NULL, NULL),
(20, 12, 15, 2, NULL, NULL),
(21, 12, 12, 1, NULL, NULL),
(22, 13, 13, 2, NULL, NULL),
(23, 13, 15, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `P_id` bigint(20) UNSIGNED NOT NULL,
  `U_id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Publish',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `R_id` bigint(20) UNSIGNED NOT NULL,
  `U_id` bigint(20) UNSIGNED NOT NULL,
  `F_id` bigint(20) UNSIGNED NOT NULL,
  `rating` decimal(5,2) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`R_id`, `U_id`, `F_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 11, '4.00', 'ok tam', '2022-11-16 18:47:46', '2022-11-09 18:47:46'),
(2, 3, 12, '5.00', 'aaa', '2022-11-08 18:50:12', '2022-10-31 18:50:12'),
(3, 6, 11, '5.00', 'vb', '2022-11-17 18:47:24', '2022-11-17 18:47:24'),
(4, 2, 12, '3.60', 'hay qua lam dc roi', '2022-11-17 15:20:09', '2022-11-17 15:20:09'),
(8, 1, 11, '5.00', 'ab', '2022-11-18 04:26:13', '2022-11-18 04:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `U_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'images/user/avatar.png',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_id`, `role`, `name`, `email`, `phone`, `avatar`, `address`, `email_verified_at`, `password`, `confirm_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'thanh deptry', 'tranphamduythanh@gmail.com', '1234567123', 'images/user/avatar.png', 'abc street ha', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '2022-11-09 09:17:11'),
(2, 'user', 'develope', 'tranthanhthanh@gmail.com', '1234567890', 'images/user/avatar.png', 'aaa', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-11-09 02:03:09', '2022-11-16 08:38:11'),
(3, 'user', 'hokage', 'tranphamnh@gm.com', '1112223334', 'images/user/avatar.png', 'Tran Dung Hung', NULL, 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '2022-11-09 02:30:05', '2022-11-09 09:43:47'),
(6, 'user', 'develope', 'tranphamnh@gmail.com', '1234567890', 'images/user/avatar.png', NULL, NULL, '70fb874a43097a25234382390c0baeb3', '70fb874a43097a25234382390c0baeb3', NULL, '2022-11-09 09:25:43', '2022-11-19 01:39:39'),
(8, 'admin', 'Hung', 'hung@gmail.com', '1234567890', 'images/user/avatar.png', 'CMT8', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-11-18 04:38:56', '2022-11-18 04:38:56'),
(10, 'member', 'shipper', 'shipper@gmail.com', '0987777721', 'images/user/avatar.png', 'Tu biet duong', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-11-21 21:28:16', '2022-11-21 21:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `WL_id` bigint(20) UNSIGNED NOT NULL,
  `U_id` bigint(20) UNSIGNED NOT NULL,
  `F_id` bigint(20) UNSIGNED NOT NULL,
  `like` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`WL_id`, `U_id`, `F_id`, `like`, `created_at`, `updated_at`) VALUES
(10, 1, 11, 1, NULL, NULL),
(12, 1, 15, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calories`
--
ALTER TABLE `calories`
  ADD PRIMARY KEY (`Calo_id`),
  ADD KEY `calories_f_name_foreign` (`F_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Cate_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_id`),
  ADD KEY `comments_u_id_foreign` (`U_id`),
  ADD KEY `comments_p_id_foreign` (`P_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`F_id`),
  ADD UNIQUE KEY `foods_f_name_unique` (`F_name`),
  ADD KEY `foods_cate_id_foreign` (`Cate_id`);

--
-- Indexes for table `food_images`
--
ALTER TABLE `food_images`
  ADD PRIMARY KEY (`FoodImage_id`),
  ADD KEY `food_images_f_name_foreign` (`F_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`O_id`),
  ADD KEY `orders_u_id_foreign` (`U_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`OD_id`),
  ADD KEY `order_detail_o_id_foreign` (`O_id`),
  ADD KEY `order_detail_f_id_foreign` (`F_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`P_id`),
  ADD KEY `posts_u_id_foreign` (`U_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`R_id`),
  ADD KEY `rating_u_id_foreign` (`U_id`),
  ADD KEY `rating_f_id_foreign` (`F_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`WL_id`),
  ADD KEY `wishlist_u_id_foreign` (`U_id`),
  ADD KEY `wishlist_f_id_foreign` (`F_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calories`
--
ALTER TABLE `calories`
  MODIFY `Calo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Cate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `F_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `food_images`
--
ALTER TABLE `food_images`
  MODIFY `FoodImage_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `O_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `OD_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `P_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `R_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WL_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calories`
--
ALTER TABLE `calories`
  ADD CONSTRAINT `calories_f_name_foreign` FOREIGN KEY (`F_name`) REFERENCES `foods` (`F_name`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_p_id_foreign` FOREIGN KEY (`P_id`) REFERENCES `posts` (`P_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_u_id_foreign` FOREIGN KEY (`U_id`) REFERENCES `users` (`U_id`) ON DELETE CASCADE;

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_cate_id_foreign` FOREIGN KEY (`Cate_id`) REFERENCES `categories` (`Cate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food_images`
--
ALTER TABLE `food_images`
  ADD CONSTRAINT `food_images_f_name_foreign` FOREIGN KEY (`F_name`) REFERENCES `foods` (`F_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_u_id_foreign` FOREIGN KEY (`U_id`) REFERENCES `users` (`U_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_f_id_foreign` FOREIGN KEY (`F_id`) REFERENCES `foods` (`F_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_o_id_foreign` FOREIGN KEY (`O_id`) REFERENCES `orders` (`O_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_u_id_foreign` FOREIGN KEY (`U_id`) REFERENCES `users` (`U_id`) ON DELETE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_f_id_foreign` FOREIGN KEY (`F_id`) REFERENCES `foods` (`F_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_u_id_foreign` FOREIGN KEY (`U_id`) REFERENCES `users` (`U_id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_f_id_foreign` FOREIGN KEY (`F_id`) REFERENCES `foods` (`F_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_u_id_foreign` FOREIGN KEY (`U_id`) REFERENCES `users` (`U_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
