-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 10:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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

--
-- Dumping data for table `calories`
--

INSERT INTO `calories` (`Calo_id`, `F_name`, `calories`, `created_at`, `updated_at`) VALUES
(1, 'Baked Chicken', 370, NULL, NULL),
(2, 'Beer - Heineken', 150, NULL, NULL),
(3, 'Beer - Saigon Special', 150, NULL, NULL),
(4, 'Black Angus \"STANBROKE\" Rib Eye Steak 200g', 551, NULL, NULL),
(5, 'Black Angus \"STANBROKE\" Sirloin 150g', 426, NULL, NULL),
(6, 'Black Angus \"STANBROKE\" Tenderloin Steak 200g', 501, NULL, NULL),
(7, 'Black Angus \"STANBROKE Flap Seak × Mixed Green Salad', 361, NULL, NULL),
(8, 'Carbonara', 523, NULL, NULL),
(9, 'Ceasar Salad', 362, NULL, NULL),
(10, 'Chicken Curry Rice Combo for 2', 847, NULL, NULL),
(11, 'Coca-cola', 139, NULL, NULL),
(12, 'Dasani', 0, NULL, NULL),
(13, 'Extra Moist and Tender Chicken Breast × Mixed Green Salad', 336, NULL, NULL),
(14, 'Hemisferio, Cabernet Sauvignon', 600, NULL, NULL),
(15, 'Louis Pinel, Pinot Noir', 600, NULL, NULL),
(16, 'Marinated Norwegian Salmon × Mixed Green Salad', 305, NULL, NULL),
(17, 'Party Set for 4', 2570, NULL, NULL),
(18, 'Pescatore', 202, NULL, NULL),
(19, 'Pesto', 135, NULL, NULL),
(20, 'Premium WAGYU Hamburg Steak 150g', 443, NULL, NULL),
(21, 'WAGYU Hamburg Combo for 2', 1110, NULL, NULL),
(22, 'Wine - Delafinca Brut Sparkling', 600, NULL, NULL),
(23, 'Wine - Hemisferio, Sauvignon Blanc', 600, NULL, NULL),
(24, 'Rigatoni Ragu', 135, NULL, NULL),
(25, 'Steak &amp; Hamburg Combo for 2', 1110, NULL, NULL),
(26, 'WAGYU & ANGUS RIB EYE STEAK PLATTER', 501, NULL, NULL),
(27, 'Premium WAGYU Hamburg Steak 150g x 2pcs set', 884, NULL, NULL);

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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `email`, `message`) VALUES
(1, 'hung@gmail.com', 'sadasdasdasdasd'),
(2, 'hung@gmail.com', 'sadasdasdasdasd'),
(3, 'hung@gmail.com', 'dasdas');

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
(18, 'Pescatore', 4, 'images/food/Pasta02.jpg', 319000, 'Tomato sauce with sea food', NULL, NULL),
(19, 'Rigatoni Ragu', 4, 'images/food/Pasta03.jpg', 210000, 'Beef stew with vegetables with Rigatoni pasta', NULL, NULL),
(20, 'Pesto', 4, 'images/food/Pasta04.jpg', 239000, 'Basil sauce with pine nuts', NULL, NULL),
(21, 'Baked Chicken', 4, 'images/food/Pasta05.jpg', 300000, 'Steamed chicken with stewed vegetables and tomato sauce', NULL, NULL),
(22, 'Extra Moist and Tender Chicken Breast × Mixed Green Salad', 3, 'images/food/Salad01.jpg', 160000, 'With 4 kinds of homemade salad dressings', NULL, NULL),
(23, 'Black Angus \"STANBROKE Flap Seak × Mixed Green Salad', 3, 'images/food/Salad02.jpg', 210000, 'With 4 kinds of homemade salad dressings', NULL, NULL),
(24, 'Marinated Norwegian Salmon × Mixed Green Salad', 3, 'images/food/Salad03.jpg', 210000, 'With 4 kinds of homemade salad dressings', NULL, NULL),
(25, 'Ceasar Salad', 3, 'images/food/Salad04.jpg', 120000, 'Bacon, soft-Boiled Egg with salty fish sauce', NULL, NULL),
(26, 'WAGYU Hamburg Combo for 2', 5, 'images/food/Combo01.jpg', 217000, 'Full-Blood WAGYU Hamburg Steak 160g (Japanese Style Grilled Meatball) ×2, 15 Kinds of Mixed Green Salad, Today\'s Soup ×2, French Fries', NULL, NULL),
(27, 'Chicken Curry Rice Combo for 2', 5, 'images/food/Combo02.jpg', 149000, 'Grilled Chicken & Vegetables Curry ×2, 15 Kinds of Mixed Green Salad, Today\'s Soup ×2', NULL, NULL),
(28, 'Steak &amp; Hamburg Combo for 2', 5, 'images/food/Combo03.jpg', 178000, 'Black Angus \"STANBROKE\" Sirloin 150g, Full-Blood WAGYU Hamburg Steak 160g (Japanese Style Grilled Meatball), 15 Kinds of Mixed Green Salad, Today\'s Soup×2, French Fries', NULL, NULL),
(29, 'Party Set for 4', 5, 'images/food/Combo04.jpg', 439000, 'Black Angus \"STANBROKE\" Rib Eye Steak 200g, Charcoal-Grilled Chicken Thigh 250g, Any of Homemade Sauce, Tender Beef-Cutlet Sandwich, Slow-Low-Roasted Beef Tongue, Homemade Salsiccia×4, 15 Kinds of Mixed Green Salad, Marinated Salmon, French Fries', NULL, NULL),
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
-- Table structure for table `hotdeal`
--

CREATE TABLE `hotdeal` (
  `deal_id` int(11) NOT NULL,
  `voucher_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotdeal`
--

INSERT INTO `hotdeal` (`deal_id`, `voucher_code`, `percent`, `start_date`, `end_date`) VALUES
(1, 'hotdeal_10', 10, '2022-12-02 13:51:14', '2022-12-31 15:00:00'),
(2, 'exp_deal', 15, '2022-11-01 13:00:00', '2022-11-30 13:52:13'),
(3, 'hotdeal_30', 30, '2022-12-09 00:49:22', '2022-12-31 00:49:01');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `voucher_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`O_id`, `status`, `U_id`, `note`, `created_at`, `updated_at`, `voucher_code`) VALUES
(6, 'Finished', 2, 'boom hang', '2022-11-10 05:53:29', '2022-12-05 00:35:44', NULL),
(7, 'Finished', 1, 'thanh cong', '2021-12-16 15:34:28', '2022-12-05 01:14:21', 'hotdeal_10'),
(8, 'Finished', 3, 'thanh cong', '2022-10-11 15:34:36', '2022-12-05 00:35:44', NULL),
(10, 'Finished', 6, 'boom hang', '2022-07-18 15:49:13', '2022-12-05 01:14:21', NULL),
(11, 'Cancelled', 1, 'boom hang', '2022-11-12 07:45:29', '2022-11-19 01:04:11', 'hotdeal_30'),
(12, 'Finished', 6, 'Done', '2022-07-28 12:52:39', '2022-12-05 00:35:44', NULL),
(13, 'Finished', 1, NULL, '2022-11-09 12:54:56', '2022-12-05 00:35:44', 'exp_deal'),
(14, 'Finished', 1, NULL, '2022-11-27 16:13:36', '2022-12-05 00:35:44', NULL),
(17, 'Finished', 8, NULL, '2022-12-08 06:01:59', NULL, 'hotdeal_10'),
(18, 'Processing', 8, NULL, '2022-12-08 06:11:04', NULL, 'hotdeal_10'),
(19, 'Processing', 8, NULL, '2022-12-08 06:13:09', NULL, 'hotdeal_10'),
(20, 'Processing', 8, NULL, '2022-12-08 06:13:30', NULL, 'hotdeal_10'),
(21, 'Processing', 8, NULL, '2022-12-08 06:15:41', NULL, 'hotdeal_10'),
(22, 'Processing', 8, NULL, '2022-12-08 06:16:09', NULL, 'hotdeal_10'),
(23, 'Processing', 8, NULL, '2022-12-08 06:17:05', NULL, 'hotdeal_10'),
(24, 'Processing', 8, NULL, '2022-12-08 06:17:07', NULL, 'hotdeal_10'),
(25, 'Processing', 8, NULL, '2022-12-08 06:19:07', NULL, 'hotdeal_10'),
(26, 'Processing', 8, NULL, '2022-12-08 06:19:12', NULL, 'hotdeal_10'),
(27, 'Processing', 8, NULL, '2022-12-08 06:19:28', NULL, 'hotdeal_10'),
(28, 'Processing', 8, NULL, '2022-12-08 06:41:54', NULL, 'hotdeal_10'),
(29, 'Processing', 8, NULL, '2022-12-08 06:41:55', NULL, 'hotdeal_10'),
(30, 'Processing', 8, NULL, '2022-12-08 06:44:01', NULL, 'hotdeal_10'),
(31, 'Processing', 8, NULL, '2022-12-08 06:44:01', NULL, 'hotdeal_10'),
(32, 'Processing', 8, NULL, '2022-12-08 06:52:09', NULL, 'hotdeal_10'),
(33, 'Processing', 8, NULL, '2022-12-08 06:53:03', NULL, 'hotdeal_10'),
(34, 'Processing', 8, NULL, '2022-12-08 06:54:30', NULL, 'hodeal_10'),
(35, 'Processing', 8, NULL, '2022-12-08 06:59:51', NULL, 'hotdeal_10'),
(36, 'Processing', 8, NULL, '2022-12-08 07:06:57', NULL, 'hotdeal_10'),
(37, 'Processing', 8, NULL, '2022-12-08 07:07:17', NULL, 'hotdeal_10'),
(38, 'Processing', 8, NULL, '2022-12-08 07:14:13', NULL, 'hotdeal_10'),
(39, 'Processing', 8, NULL, '2022-12-08 07:17:32', NULL, 'hotdeal_10'),
(40, 'Processing', 8, NULL, '2022-12-08 07:17:44', NULL, 'hotdeal_10'),
(41, 'Processing', 8, NULL, '2022-12-08 07:19:20', NULL, 'hotdeal_10'),
(42, 'Processing', 8, NULL, '2022-12-08 07:41:35', NULL, 'hotdeal_10'),
(43, 'Processing', 8, NULL, '2022-12-08 08:55:53', NULL, 'hotdeal_10'),
(44, 'Processing', 8, NULL, '2022-12-08 08:57:22', NULL, 'hotdeal_10'),
(45, 'Processing', 8, NULL, '2022-12-08 08:57:47', NULL, 'hotdeal_10'),
(46, 'Processing', 8, NULL, '2022-12-08 08:57:58', NULL, 'hotdeal_10'),
(47, 'Processing', 8, NULL, '2022-12-08 08:58:06', NULL, 'hotdeal_10'),
(48, 'Processing', 8, NULL, '2022-12-08 08:58:15', NULL, 'hotdeal_10'),
(49, 'Processing', 8, NULL, '2022-12-08 08:58:24', NULL, 'hotdeal_10'),
(50, 'Processing', 8, NULL, '2022-12-08 08:58:39', NULL, 'hotdeal_10'),
(51, 'Processing', 8, NULL, '2022-12-09 01:01:45', NULL, NULL);

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
(23, 13, 15, 2, NULL, NULL),
(24, 14, 32, 1, '2022-11-27 16:14:43', NULL),
(28, 17, 11, 2, '2022-12-08 06:03:20', NULL),
(29, 17, 23, 3, '2022-12-08 06:03:20', NULL),
(30, 17, 11, 2, '2022-12-08 06:18:22', NULL),
(31, 17, 23, 3, '2022-12-08 06:18:22', NULL),
(32, 17, 11, 2, '2022-12-08 06:53:47', NULL),
(33, 17, 12, 3, '2022-12-08 06:53:47', NULL),
(34, 17, 11, 2, '2022-12-08 07:01:11', NULL),
(35, 17, 12, 3, '2022-12-08 07:01:11', NULL),
(36, 17, 11, 2, '2022-12-08 07:05:03', NULL),
(37, 17, 12, 3, '2022-12-08 07:05:03', NULL),
(38, 17, 11, 2, '2022-12-08 07:06:27', NULL),
(39, 17, 12, 3, '2022-12-08 07:06:27', NULL),
(40, 17, 11, 2, '2022-12-08 07:06:29', NULL),
(41, 17, 12, 3, '2022-12-08 07:06:29', NULL),
(42, 17, 11, 2, '2022-12-08 07:06:31', NULL),
(43, 17, 12, 3, '2022-12-08 07:06:31', NULL),
(44, 17, 11, 2, '2022-12-08 07:06:31', NULL),
(45, 17, 12, 3, '2022-12-08 07:06:31', NULL),
(46, 17, 11, 2, '2022-12-08 07:06:35', NULL),
(47, 17, 12, 3, '2022-12-08 07:06:35', NULL),
(48, 17, 11, 2, '2022-12-08 07:07:51', NULL),
(49, 17, 12, 3, '2022-12-08 07:07:51', NULL),
(50, 17, 11, 2, '2022-12-08 07:13:07', NULL),
(51, 17, 12, 3, '2022-12-08 07:13:07', NULL),
(52, 17, 11, 2, '2022-12-08 07:19:57', NULL),
(53, 17, 12, 3, '2022-12-08 07:19:57', NULL),
(54, 17, 11, 2, '2022-12-08 07:20:32', NULL),
(55, 17, 12, 3, '2022-12-08 07:20:32', NULL),
(56, 17, 11, 2, '2022-12-08 07:21:01', NULL),
(57, 17, 12, 3, '2022-12-08 07:21:01', NULL),
(58, 17, 11, 2, '2022-12-08 07:42:13', NULL),
(59, 17, 12, 3, '2022-12-08 07:42:13', NULL),
(60, 17, 11, 2, '2022-12-08 07:42:49', NULL),
(61, 17, 12, 3, '2022-12-08 07:42:49', NULL);

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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Publish',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`P_id`, `U_id`, `title`, `content`, `feature_image_path`, `feature_image_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'Popular Japanese Pasta Recipes For Dinner (Ready in 30 Minutes)', '<h2>1.&nbsp;Creamy Mushroom &amp; Bacon Pasta</h2>\r\n\r\n<p><img alt=\"Creamy Mushroom and Bacon Pasta on a grey plate.\" src=\"https://www.justonecookbook.com/wp-content/uploads/2019/02/Creamy-Mushroom-Bacon-Spaghetti-II.jpg\" style=\"height:1200px; width:800px\" /></p>\r\n\r\n<p>Shiitake mushrooms and shimeji mushrooms are added to give new life to this western-inspired pasta. For extra umami, just a dash of soy sauce will do the trick! Feel free to leave out the bacon, and add a spoonful of nutritional yeast for a vegetarian version.</p>\r\n\r\n<p><em>&hearts; &lsquo;It was easy to make and very tasty indeed., we replaced bacon with seafood and some vegetables (baby spinach and broccoli). My family enjoyed this dish very much and this recipe is for keeps. We will of course be doing this dish again.&rsquo;</em>&nbsp;&ndash;&nbsp;<strong>Ravi</strong></p>\r\n\r\n<h2>2.&nbsp;Ketchup Spaghetti (Napolitan)</h2>\r\n\r\n<p><img alt=\"A white plate containing Japanese Ketchup Spaghetti (Napolitan).\" src=\"https://www.justonecookbook.com/wp-content/uploads/2020/04/Ketchup-Spaghetti-0146-III.jpg\" style=\"height:1200px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Spaghetti with ketchup may get some serious objections, especially to our Italian friends. This pasta actually has a long history that reflects the openness of Japanese food culture.&nbsp;You need to try it to understand its popularity.</p>\r\n\r\n<p><em>&hearts; &lsquo;This is surprisingly delicious. I&rsquo;ve had it several times and I must say the first time I didn&rsquo;t realize it contained ketchup. (Maybe I was still jetlagged!). Children and some grown men are crazy for &lsquo;Ketchup Spaghetti&rsquo;. The grown men includes my husband.&rsquo;</em>&nbsp;&ndash;&nbsp;<strong>Kitty</strong></p>\r\n\r\n<h2>3.&nbsp;Japanese Style Pasta with Shrimp &amp; Broccolini</h2>\r\n\r\n<p><img alt=\"A white plate containing Japanese Pasta with Shrimp and Broccolini.\" src=\"https://www.justonecookbook.com/wp-content/uploads/2020/03/Quick-Japanese-Pasta-with-Shrimp-and-Broccolini-0228-IV.jpg\" style=\"height:1200px; width:800px\" /></p>\r\n\r\n<p>Seasoned with butter, dashi soy sauce, and garlic chili oil, this is an easy pasta dish everyone will love! Ready in 15 minutes.</p>\r\n\r\n<p><em>&hearts; &lsquo;My husband is on a low-carb lifestyle so I used the Healthy Noodle (from Costco) and regular broccoli with tofu (didn&rsquo;t have shrimp) and it was absolutely delicious!! I ordered the chili paste from Amazon specifically for this dish, but I&rsquo;ll be using it in many dishes from now on.&rsquo;</em>&nbsp;&ndash; Laina</p>\r\n\r\n<h2>4.&nbsp;Creamy Miso Pasta with Tofu and Asparagus</h2>\r\n\r\n<p><img alt=\"A grey bowl containing Creamy Miso Pasta with Tofu and Asparagus.\" src=\"https://www.justonecookbook.com/wp-content/uploads/2020/04/Creamy-Miso-Pasta-with-Tofu-and-Asparagus-0674-III.jpg\" style=\"height:1200px; width:800px\" /></p>\r\n\r\n<p>This pasta translates to a wholesome, plant-based, and delightful weeknight dinner.</p>\r\n\r\n<p><em>&hearts; &lsquo;This recipe is magic. We&rsquo;ve had increasing difficulty with pasta dishes because dairy is bad for my partner&rsquo;s digestive system. So many pasta sauces/recipes use either tomato or cheese (or both!), and we&rsquo;d been having trouble finding any other options. Magic, I tell you. Turned out the first time, solved all our longstanding issues with pasta sauce. My partner loved it (I did too for that matter), and we had everything I needed just lying around the house.&rsquo;</em>&nbsp;&ndash;&nbsp;<strong>DC</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>6.&nbsp;Shiso Garlic Pasta</h2>\r\n\r\n<p><img alt=\"A white ceramic containing shiso garlic pasta.\" src=\"https://www.justonecookbook.com/wp-content/uploads/2020/03/Shiso-Garlic-Pasta-0512-II.jpg\" style=\"height:1200px; width:800px\" /></p>\r\n\r\n<p>A Japanese take on the classic Spaghetti Aglio, Olio, the dish is simple yet so good. Toss the al dente noodles with plenty of garlic-and-chili-infused olive oil, and add in some chopped shiso leaves for a special touch.&nbsp;You can find shiso leaves from Japanese grocery stores, or grow them in your backyard. This aromatic herb comes in handy for many delicious Japanese dishes.</p>\r\n\r\n<p><em>&lsquo;Easy to make, light on the tummy and full of flavor. So yummy!</em>&nbsp;&lsquo;-&nbsp;<strong>Yui</strong></p>\r\n\r\n<h2>7.&nbsp;Miso Butter Pasta with Tuna &amp; Cabbage</h2>\r\n\r\n<p><img alt=\"A blue plate containing Japanese-style Tuna and Cabbage Pasta.\" src=\"https://www.justonecookbook.com/wp-content/uploads/2020/03/Tuna-and-Cabbage-Japanese-Pasta-0431-III.jpg\" style=\"height:1200px; width:800px\" /></p>\r\n\r\n<p>This is another favorite pantry-led pasta. All you need is canned fish, pasta, cabbage, and basic Japanese seasonings to turn it into a full-blown meal.</p>\r\n\r\n<p><em>&hearts; &lsquo;I was initially dubious about a tuna and cabbage pasta but my three-year-old inhaled hers! That butter miso&hellip; goes down a treat!&rsquo; &ndash;&nbsp;<strong>Rebecca C</strong></em></p>\r\n\r\n<h2>8.&nbsp;Ume Shiso Pasta</h2>\r\n\r\n<p><img alt=\"A white plate containing ume shiso pasta.\" src=\"https://www.justonecookbook.com/wp-content/uploads/2021/01/Ume-Shiso-Pasta-8493-II.jpg\" style=\"height:1200px; width:800px\" /></p>\r\n\r\n<p>The combo of ume (Japanese salted plum) and shiso lends a truly unique Japanese character to this simple pasta. To bulk it up, I added chicken and shimeji mushrooms. You can switch the chicken with lobster, salmon, scallop, or leave it out for a vegan pasta.</p>\r\n\r\n<p><em>&hearts; &lsquo;I just made this last night and it was super yummy! Thanks for the tasty recipe!&rsquo; &ndash;&nbsp;<strong>Kennedy</strong></em></p>\r\n\r\n<h2>9.&nbsp;Clam Pasta</h2>\r\n\r\n<p><img alt=\"A white plate containing clam pasta.\" src=\"https://www.justonecookbook.com/wp-content/uploads/2021/01/Clam-Pasta-8877-II.jpg\" style=\"height:1200px; width:800px\" /></p>\r\n\r\n<p>Infused with garlic, briny clams, white wine, and chili flakes, this clam pasta is very popular in Japan. It will remind you of a trip to the ocean.</p>\r\n\r\n<p><em>&hearts; &lsquo;Thanks for such an easy but yummy recipe. I made it twice n my kids love it!&rsquo;</em>&nbsp;&ndash;&nbsp;<strong>Wendy</strong></p>', 'images/post/pasta-post.jpg', NULL, 'Publish', '2022-12-06 07:06:02', '2022-12-06 12:07:14'),
(4, 1, 'PROTEIN-PACKED SALAD RECIPES', '<p>Salads aren&rsquo;t just a prelude to a main meal&mdash;done right, they&rsquo;re bursting with flavor, packed with nutrition, and deliciously satisfying. The secret ingredient in each of these recipes: a centerpiece of high-quality protein, whether that&rsquo;s grilled&nbsp;<a href=\"https://www.muscleandfitness.com/nutrition/meal-plans/5-creative-ways-cook-chicken/\" target=\"_blank\">chicken breast</a>, hearty steak, simple seafood, or even a&nbsp;<a href=\"https://www.muscleandfitness.com/muscle-fitness-hers/hers-nutrition/5-healthy-vegetarian-recipes-clean-eating/\" target=\"_blank\">vegetarian-friendly</a>&nbsp;option.</p>\r\n\r\n<p>These recipes were created by Carlo Filippone (aka the &ldquo;Muscle Chef&rdquo;), a three-time national bodybuilding champion and the founder of Elite Lifestyle Cuisine, who knows what it takes to eat clean without losing flavor. Each takes only minutes to prepare, so you can have dinner on the table without much&nbsp;<a href=\"https://www.muscleandfitness.com/nutrition/meal-plans/5-key-points-successful-meal-prep/\" target=\"_blank\">prep</a>&nbsp;or fuss.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Italian Kale and Beef Salad\" src=\"https://www.muscleandfitness.com/wp-content/uploads/2018/01/italian-kale-beef-salad-1109.jpg?w=800&amp;quality=40&amp;strip=all\" style=\"height:443px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Italian Kale and Beef Salad</h2>\r\n\r\n<p>Steak and salad are a perfect combination, especially when you blend fresh kale and tender filet mignon. Top with pecorino Romano cheese for a finishing touch.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Shrimp salad\" src=\"https://www.muscleandfitness.com/wp-content/uploads/2018/01/Shrimp-Citrus-Salad-11090.jpg?w=800&amp;quality=40&amp;strip=all\" style=\"height:443px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Orange Citrus Shrimp Over Mixed Greens</h2>\r\n\r\n<p>You can substitute scallops for shrimp; either work well as a counterpoint to the crisp, plentiful greens and fresh citrus.</p>\r\n\r\n<p><img alt=\"Southwest Chicken Salad\" src=\"https://www.muscleandfitness.com/wp-content/uploads/2018/01/chicken-salad-11091.jpg?w=800&amp;quality=55&amp;strip=all\" style=\"height:443px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Southwest Chicken Salad</h2>\r\n\r\n<p>Delicious Southwestern flavor shines thanks to the corn, beans, avocado, and&nbsp;<a href=\"https://www.muscleandfitness.com/nutrition/healthy-recipes/10-salad-dressing-recipes-wont-wreck-your-diet/\" target=\"_blank\">cilantro-lime dressing.</a>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Veggie Salad With Tofu\" src=\"https://www.muscleandfitness.com/wp-content/uploads/2018/01/veggie-salad-tofu-2-1109.jpg?w=800&amp;quality=86&amp;strip=all\" style=\"height:443px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Chopped Veggie Salad With Tofu</h2>\r\n\r\n<p>This vegetarian favorite features a bounty of fresh, colorful vegetables. Firm tofu provides the protein punch.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Tuna Greek Salad\" src=\"https://www.muscleandfitness.com/wp-content/uploads/2018/01/1109-tuna-greek-salad.jpg?w=800&amp;quality=86&amp;strip=all\" style=\"height:443px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Greek Salad With Tuna</h2>\r\n\r\n<p>Using canned tuna makes this recipe super quick to prepare, but you can also use grilled fresh tuna for enhanced flavor.</p>', 'images/post/Salad02.jpg', NULL, 'Publish', '2022-12-06 07:12:24', '2022-12-06 03:02:30'),
(5, 1, 'Miguel Torres ‘Hemisferio’ Cabernet Sauvignon', '<p>Exquisite aroma of wild berries and spices over a rich background of leather and liquorice. The Fruit tannins and vegetable notes stand out on the palate. Round and elegant tannins, which give it a great structure, with a long and consistent finish.</p>\r\n\r\n<p>Backed by a history rooted in winemaking culture in Spain, Miguel Torres Chile arrived in the Curico Valley in 1979 after searching for a new location. On this journey, as well as finding excellent climatic conditions, the family has committed to innovating in wine production, incorporating stainless steel tanks and French oak barrels.</p>\r\n\r\n<p>Throughout Chile, our wineries have forged an identity and created unique products according to their climate, providing Miguel Torres Chile with varieties with the typical vinestocks and flavours of this country.</p>\r\n\r\n<p>Today, Miguel Torres Chile also focuses its commitment on organic vine-growing and Fair Trade certification for various wines. These advances have helped the company to become more sustainable, and to implement several sustainable projects. With a presence in over 100 countries, the Miguel Torres Chile family winery has established itself over the past 30 years as one of Chile&rsquo;s main producers of high-quality wines, through its products&rsquo; identity, respect for the environment, and social responsibility.</p>', 'images/post/Hemisferio.jpg', NULL, 'Publish', '2022-12-06 07:16:49', '2022-12-06 07:16:49'),
(6, 1, 'RECIPE: 24-HOUR SOUS VIDE BEEF SHORT RIBS', '<p>This recipe for 24-hour Sous Vide Beef Short Ribs is accompanied by delicious truffle cauliflower pur&eacute;e, shiitake mushrooms and spiced raspberry jus. Use the recipe for the sides below or come up with your own.</p>\r\n\r\n<h3>Ingredients</h3>\r\n\r\n<p>For the ribs</p>\r\n\r\n<ul>\r\n	<li>2 English cut beef short ribs &ndash; 1kg (approx)</li>\r\n	<li>4 garlic cloves</li>\r\n	<li>50g butter</li>\r\n	<li>Salt and pepper</li>\r\n	<li>1 tbsp olive oil</li>\r\n	<li>Parsley</li>\r\n	<li>Thyme</li>\r\n</ul>\r\n\r\n<p>For the cauliflower pur&eacute;e</p>\r\n\r\n<ul>\r\n	<li>300g cauliflower, chopped into small pieces</li>\r\n	<li>1/2 white onion, diced</li>\r\n	<li>Salt and pepper</li>\r\n	<li>1 garlic clove, crushed</li>\r\n	<li>25g butter</li>\r\n	<li>300ml milk</li>\r\n	<li>1 tsp truffle oil (optional)</li>\r\n</ul>\r\n\r\n<p>For the raspberry jus</p>\r\n\r\n<ul>\r\n	<li>400ml red wine</li>\r\n	<li>400ml beef stock or veal stock</li>\r\n	<li>2 sprigs thyme</li>\r\n	<li>1/2 onion, diced</li>\r\n	<li>2 garlic cloves, crushed</li>\r\n	<li>1 star anise</li>\r\n	<li>1 bay leaf</li>\r\n	<li>1 tbsp raspberry jam</li>\r\n	<li>Salt and pepper</li>\r\n	<li>1 knob butter</li>\r\n	<li>1 tsp flour</li>\r\n</ul>\r\n\r\n<p>Mushrooms</p>\r\n\r\n<ul>\r\n	<li>12 shiitake mushrooms</li>\r\n	<li>1 tbsp olive oil</li>\r\n	<li>1 knob butter</li>\r\n</ul>\r\n\r\n<p><strong>Essential Tools</strong></p>\r\n\r\n<ul>\r\n	<li>Sous vide machine</li>\r\n	<li>Vac pack machine</li>\r\n	<li>Large pot</li>\r\n	<li>Cling wrap</li>\r\n	<li>2 saucepans</li>\r\n	<li>Sieve</li>\r\n	<li>Sharp knives</li>\r\n	<li>Chopping board</li>\r\n	<li>Measuring spoons</li>\r\n	<li>2 frying pans</li>\r\n	<li>Food processor/blender</li>\r\n</ul>\r\n\r\n<h2>Method</h2>\r\n\r\n<h3>For the ribs</h3>\r\n\r\n<p>Step 1</p>\r\n\r\n<p>Oil and season ribs. Sear on high heat until golden brown, approximately 5 mins.</p>\r\n\r\n<p>Step 2</p>\r\n\r\n<p>Allow to cool slightly and place in vac pack bag and add butter, garlic and herbs. Vac pack the ribs and set aside.</p>\r\n\r\n<p>Step 3</p>\r\n\r\n<p>Set your sous vide machine to 55&deg;C for a 24-hour cook and place bagged ribs in a water bath. Cover the bath with a lid or cling wrap to stop water evaporating.</p>\r\n\r\n<p>Step 4</p>\r\n\r\n<p>If using straight away, remove from the bag and remove the bone by slicing down the rib with sharp knife. Pat dry and sear on high heat for 30 seconds each side. Leave to rest for 3-5 minutes and slice into strips. See the tips if you&rsquo;re not using immediately.</p>\r\n\r\n<h3>For the cauliflower pur&eacute;e</h3>\r\n\r\n<p><em>This can be made in advance and heated in a saucepan before serving.</em></p>\r\n\r\n<p>Step 1</p>\r\n\r\n<p>Place cauliflower, butter and onion into a sauce pan.</p>\r\n\r\n<p>Step 2</p>\r\n\r\n<p>Cover with a lid and cook on a low heat until cauliflower is tender, approximately 8-10 minutes.</p>\r\n\r\n<p>Step 3</p>\r\n\r\n<p>Place the cauliflower mixture in the food processor along with half of the milk and blend adding more milk as necessary until you have a thick but smooth pur&eacute;e. Taste and season accordingly. Add truffle oil if using and blend for a minute to incorporate.</p>\r\n\r\n<h3>For the spiced raspberry jus</h3>\r\n\r\n<p><em>This can be made in advance and heated in a saucepan before serving.</em></p>\r\n\r\n<p>Step 1</p>\r\n\r\n<p>Add all ingredients except seasoning, butter and flour into saucepan and simmer on a low to medium heat until sauce has reduced to 1/3.</p>\r\n\r\n<p>Step 2</p>\r\n\r\n<p>Taste and adjust seasoning with salt, pepper (and sugar if necessary).</p>\r\n\r\n<p>Step 3</p>\r\n\r\n<p>Strain sauce through a sieve into a clean saucepan.</p>\r\n\r\n<p>Step 4</p>\r\n\r\n<p>Make a roux using softened butter and flour. On a low heat, whisk roux in to sauce to thicken it.</p>\r\n\r\n<h3>For the mushrooms</h3>\r\n\r\n<p>Step 1</p>\r\n\r\n<p>Clean and cut the mushrooms in half.</p>\r\n\r\n<p>Step 2</p>\r\n\r\n<p>On a high heat, add oil to a sauce pan and cook the mushrooms&nbsp; for 2-3 minutes.</p>\r\n\r\n<p>Step 3</p>\r\n\r\n<p>Add a knob of butter, toss mushrooms in this and remove from heat.</p>\r\n\r\n<h3>To Serve</h3>\r\n\r\n<p>Step 1</p>\r\n\r\n<p>Place a large spoon of pur&eacute;e to the left of the centre of the plate.</p>\r\n\r\n<p>Step 2</p>\r\n\r\n<p>Run the back of a tablespoon through pur&eacute;e in a circular motion.</p>\r\n\r\n<p>Step 3</p>\r\n\r\n<p>Slice the meat and place to the side of the pur&eacute;e.</p>\r\n\r\n<p>Step 4</p>\r\n\r\n<p>Place mushrooms next to the meat and drizzle a little sauce around the plate.</p>\r\n\r\n<h3>Tips/Tricks</h3>\r\n\r\n<ul>\r\n	<li>If you&rsquo;re not using the ribs straight away, submerge in ice cold water for 30 minutes. At this point they can be stored in the fridge for up to four days or frozen.</li>\r\n	<li>To bring the ribs back up to temperature, reheat in sous vide at 55&deg;C for 30 minutes or in the oven at 110&deg;C until internal temp is 55&deg;C, approximately 20-30 minutes.</li>\r\n	<li>To make the short ribs a softer, pull-apart texture, cook at 80-85&deg;C for 24-hours.</li>\r\n</ul>', 'images/post/stanbroke.jpg', NULL, 'Publish', '2022-12-06 07:20:46', '2022-12-06 07:20:46');

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
(8, 1, 11, '5.00', 'cc', '2022-11-18 04:26:13', '2022-11-29 10:55:24'),
(9, 1, 13, '4.50', 'ab', '2022-11-29 01:22:06', '2022-12-05 01:15:32'),
(10, 1, 12, '5.00', 'ab', '2022-11-29 07:20:25', '2022-12-02 05:54:36'),
(11, 1, 20, '5.00', 'Quá ngon', '2022-11-29 08:34:15', '2022-11-29 08:34:27'),
(12, 1, 17, '4.00', 'ab', '2022-11-29 11:22:27', '2022-11-29 11:22:27'),
(13, 1, 33, '5.00', 'a', '2022-12-05 01:15:39', '2022-12-05 01:15:39'),
(14, 1, 23, '4.50', 'tot', '2022-12-05 19:41:20', '2022-12-05 19:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `sauce`
--

CREATE TABLE `sauce` (
  `Sauce_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sauce`
--

INSERT INTO `sauce` (`Sauce_id`, `name`) VALUES
(1, 'Demi'),
(2, 'Red Wine'),
(3, 'BBQ'),
(4, 'Oyster');

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
(1, 'admin', 'thanh deptry', 'tranphamduythanh@gmail.com', '0372368467', 'images/user/register.jpg', '590 CMT8', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '2022-12-02 10:33:09'),
(2, 'user', 'develope', 'tranthanhthanh@gmail.com', '1234567890', 'images/user/avatar.png', 'aaa', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-11-09 02:03:09', '2022-11-16 08:38:11'),
(3, 'user', 'hokage', 'tranphamnh@gm.com', '1112223334', 'images/user/avatar.png', 'Tran Dung Hung', NULL, 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '2022-11-09 02:30:05', '2022-11-09 09:43:47'),
(6, 'user', 'develope', 'tranphamnh@gmail.com', '1234567890', 'images/user/avatar.png', NULL, NULL, '70fb874a43097a25234382390c0baeb3', '70fb874a43097a25234382390c0baeb3', NULL, '2022-11-09 09:25:43', '2022-11-19 01:39:39'),
(8, 'admin', 'Hung', 'hung@gmail.com', '1234567890', 'images/user/avatar.png', 'CMT8', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-11-18 04:38:56', '2022-11-18 04:38:56'),
(10, 'member', 'shipper', 'shipper@gmail.com', '0987777721', 'images/user/avatar.png', 'Tu biet duong', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-11-21 21:28:16', '2022-11-21 21:28:56'),
(11, 'user', 'tho ho', 'thoho@gmail.com', '0987654321', 'images/user/avatar.png', 'Duong 3/2', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-12-05 02:36:18', '2022-12-05 02:36:18');

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
(12, 1, 15, 0, NULL, '2022-11-29 10:56:35'),
(14, 1, 16, 0, NULL, NULL),
(16, 1, 17, 0, '2022-11-28 02:45:55', '2022-11-30 09:47:23'),
(18, 1, 12, 0, '2022-11-29 07:19:55', '2022-12-02 05:52:04'),
(19, 1, 20, 1, '2022-11-29 08:34:01', '2022-11-29 08:34:37'),
(21, 1, 25, 1, '2022-12-03 07:56:14', '2022-12-03 07:56:14'),
(22, 1, 11, 0, NULL, NULL);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

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
-- Indexes for table `hotdeal`
--
ALTER TABLE `hotdeal`
  ADD PRIMARY KEY (`deal_id`),
  ADD UNIQUE KEY `voucher_code` (`voucher_code`);

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
-- Indexes for table `sauce`
--
ALTER TABLE `sauce`
  ADD PRIMARY KEY (`Sauce_id`);

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
  MODIFY `Calo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Cate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `hotdeal`
--
ALTER TABLE `hotdeal`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `O_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `OD_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `P_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `R_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sauce`
--
ALTER TABLE `sauce`
  MODIFY `Sauce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WL_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
