-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 06:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `email_verified_at`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mason', 'Admin', '+109309409430', 'admin@gmail.com', NULL, '$2y$10$UiurG0zL18dbzmb54PFMzO1Wk86vUlmPCFshM6DpQF/oN6NacQpIC', '67538.jpg', 1, NULL, NULL, '2020-12-14 04:01:10'),
(2, 'sub admin', 'sub admin', '030499994949', 'subadmin@gmail.com', NULL, '$2y$10$6wnaltn72tnEBmvvUIRGbOVGwZPKRUVNUm1aWOG0g7BcoBzo7Wrbq', '3.jpg', 1, NULL, NULL, NULL),
(3, 'editor', 'editor', '030499994949', 'editr@gmail.com', NULL, '$2y$10$6wnaltn72tnEBmvvUIRGbOVGwZPKRUVNUm1aWOG0g7BcoBzo7Wrbq', '5.jpg', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`, `title`, `alt`, `status`, `created_at`, `updated_at`) VALUES
(1, 'stock-photo-red-banners-for-websites-on-new-years-eve-there-are-gift-boxes-and-discount-messages-1096657.jpg-77011.jpg', 'big-sale', 'Big Sale', 'Big Sale Banner', 1, NULL, '2020-12-22 14:16:23'),
(2, 'WEB-DESIGN-BANNER.jpg-72801.jpg', 'day-deal', 'Deal of the day', 'Deal', 1, NULL, '2020-12-22 13:54:02'),
(3, 'Banner-ads-Advertising-websites-networks-paid-advertisements-ads2020-marketing.jpg-43884.jpg', 'bags', 'Bags Sale', 'Bags', 1, NULL, '2020-12-22 13:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gul Ahmed', 1, '2020-12-21 11:06:10', '2020-12-21 12:16:28'),
(2, 'J Dot', 1, '2020-12-21 11:06:28', '2020-12-21 12:19:41'),
(8, 'P-WIRE', 1, '2020-12-21 12:32:55', '2020-12-21 12:32:55'),
(9, 'Nike', 0, '2020-12-21 12:33:12', '2020-12-21 12:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `user_id`, `product_id`, `size`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'U7k2j7gQmuxidA0oVxKZi4kmSAHz6CKMUbRNoIhM', 0, 5, 'M', 1, '2020-12-26 08:37:51', '2020-12-26 08:37:51'),
(2, 'U7k2j7gQmuxidA0oVxKZi4kmSAHz6CKMUbRNoIhM', 0, 1, 'M', 2, '2020-12-26 08:49:05', '2020-12-26 08:49:05'),
(3, 'UGoLZGbW5xHw396EM1fDgmSn8pdPu2QxVI6U0yUF', 0, 1, 'M', 5, '2020-12-26 14:21:53', '2020-12-26 20:06:35'),
(4, 'UGoLZGbW5xHw396EM1fDgmSn8pdPu2QxVI6U0yUF', 0, 5, 'L', 7, '2020-12-26 14:26:12', '2020-12-26 20:03:10'),
(17, 'QuAzvtsC761lm7SzEpSpOJ10fHVr5zdJ06uKfU4U', 0, 1, 'S', 5, '2020-12-27 05:36:43', '2020-12-27 05:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_discount` double(8,2) NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `category_image`, `category_discount`, `category_description`, `category_url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(2, 0, 1, 'T-shirts', '67508.jpg', 800.00, '', 't-shirts', '', '', '', 1, '2020-12-15 08:08:44', '2020-12-15 08:09:37'),
(3, 0, 2, 'Tops', '7357.jpg', 80.00, '', 'tops', '', '', '', 1, '2020-12-15 10:15:31', '2020-12-15 10:15:31'),
(4, 2, 1, 'Casual T-shirts', '14014.jpg', 5.00, 'Casual T-shirts', 'casual-t-shirts', 'Casual T-shirts', 'Casual T-shirts', 'Casual T-shirts', 1, '2020-12-15 11:55:47', '2020-12-26 03:50:44'),
(5, 2, 1, 'Formal T-shirts', '29945.jpg', 1000.00, 'Category Description', 'formal-t-shirts', 'formal T=shirts', 'formal T=shirts', 'formal T=shirts', 1, '2020-12-16 11:54:44', '2020-12-16 11:54:44'),
(7, 3, 2, 'Denims', '62391.jpg', 0.00, 'Category Description', 'denims', 'Meta  title', 'Category Description', 'Meta keywords', 1, '2020-12-17 12:34:02', '2020-12-26 14:28:35'),
(8, 0, 3, 'Denims', '49147.jpg', 800.00, 'Category Description', 'denims', 'Meta title', 'Meta Description', 'Meta keywords', 1, '2020-12-17 12:35:16', '2020-12-22 06:34:33'),
(9, 0, 1, 'Shirts', '2569.webp', 80.00, 'Category Description', 'shirts', 'meta title', 'Meta Description', 'meta keywords', 1, '2020-12-22 05:33:41', '2020-12-22 06:33:21'),
(10, 9, 1, 'Formal Shirts', '77810.jpg', 80.00, 'Category Description', 'formal-shirts', 'meta title', 'meta Description', 'meta keywords', 1, '2020-12-22 05:36:18', '2020-12-22 05:36:18'),
(11, 0, 2, 'Casual Suits', '84765.jpg', 80.00, 'Category Description', 'casual-suits', 'meta title', 'meta Description', 'meta keywords', 1, '2020-12-22 06:48:10', '2020-12-22 06:48:10'),
(12, 0, 2, 'Formal Suits', '36336.jpg', 80.00, 'Category Description', 'formal-suits', 'meta title', 'meta Description', 'meta keywords', 1, '2020-12-22 06:49:36', '2020-12-22 06:49:36'),
(13, 0, 3, 'Girl Suits', '59168.jpg', 80.00, 'Category Description', 'girl-suit', 'meta title', 'meta Description', 'meta keywords', 1, '2020-12-22 06:51:21', '2020-12-22 06:51:37');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_11_171802_create_admins_table', 1),
(5, '2020_12_14_091512_create_sections_table', 2),
(6, '2020_12_14_115939_create_categories_table', 3),
(7, '2020_12_16_191916_create_products_table', 4),
(8, '2020_12_18_005504_create_products_attributes_table', 5),
(9, '2020_12_21_095614_create_products_images_table', 6),
(10, '2020_12_21_134045_create_brands_table', 7),
(11, '2020_12_21_172536_add_column_to_products', 8),
(12, '2020_12_22_132312_create_banners_table', 9),
(13, '2020_12_25_101152_create_carts_table', 10),
(14, '2020_12_25_101811_create_carts_table', 11),
(15, '2020_12_28_022107_add_columns_to_users', 12);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wash_care` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabric` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sleeve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occassion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `section_id`, `brand_id`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_video`, `main_image`, `description`, `wash_care`, `fabric`, `pattern`, `sleeve`, `fit`, `occassion`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 2, 'Black Casual T-shirt', 'Bl-01', 'black', '1000', '', '200', '', 'tate-logo-black--tshirt-back-g1086.jpg-70475.jpg', '', '', '', '', '', '', '', '', '', '', 'Yes', 1, NULL, '2020-12-26 03:52:01'),
(2, 4, 1, 1, 'Grey Casual T-shirt', 'Bl-02', 'grey', '2000', '20', '220', '', 'autism-t-shirt-autism-awareness-seeing-the-world-from-different-angles-cute-tees-gift-shirts-customcat-2518802038873_1024x.jpg-41192.jpg', 'Product Description', 'Hand Wash', 'Wool', 'Printed', 'Full Sleeve', 'Slim', '', '', '', '', 'Yes', 1, NULL, '2020-12-26 03:08:10'),
(3, 4, 1, 1, 'Black Casual T-shirts', 'Bl-01', 'Black', '1000', '20', '200', '', '634485-0320.jpg-50968.jpg', 'Product Description', 'Machine Wash', 'Polyester', 'Plain', 'Half Sleeve', 'Regular', '', '', '', '', 'Yes', 1, '2020-12-17 15:01:20', '2020-12-26 03:08:24'),
(5, 7, 2, 1, 'Pakistani Girls dress', 'PK-1-02', 'silver', '3000', '', '200', 'SampleVideo_640x360_1mb.mp4-14547023.mp4', 'download.jpg-99298.jpg', '', 'Machine Wash', '', '', '', '', '', '', '', '', 'Yes', 1, '2020-12-17 15:14:55', '2020-12-26 14:25:02'),
(6, 4, 1, 2, 'White T-shirt', 'WH-02', 'white', '1000', '30', '200', '', 'f0trevor_f_White.jpg-39138.jpg', 'Beautiful slim white shirt', 'Machine Wash', 'Wool', 'Printed', 'Half Sleeve', 'Slim', '', '', '', '', 'Yes', 1, '2020-12-17 15:58:41', '2020-12-26 03:12:16'),
(7, 4, 1, 2, 'White T-shirt Printed', 'Wh-011', 'white', '3000', '5', '200', 'file_example_MP4_480_1_5MG.mp4-555802569.mp4', 'Winging-Life-Winging-It-Care-Free-Attitude-Nonchalant-Shirt.jpg-59836.jpg', 'Product Description', 'Machine Wash', 'Polyester', 'Printed', 'Half Sleeve', 'Regular', '', 'Printed Casual T-shirts', 'Meta Description', 'Meta Keywords', 'Yes', 1, '2020-12-17 16:18:26', '2020-12-26 03:12:49'),
(8, 5, 1, 1, 'Grey T-shirt', 'Gr-01', 'grey', '2000', '15', '200', '', 'images (1).jpg-78151.jpg', 'Description', 'Machine Wash', 'Polyester', 'Checked', 'Half Sleeve', 'Slim', '', 'title', 'Description', 'keywords', 'Yes', 1, '2020-12-17 17:56:45', '2020-12-26 03:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `size`, `price`, `stock`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'L', 1500.00, 5, 'sku-gr-01', 1, '2020-12-20 23:59:35', '2020-12-26 03:54:52'),
(2, 8, 'M', 2300.00, 10, 'sku-gr-02', 1, '2020-12-21 00:01:14', '2020-12-26 03:54:52'),
(3, 8, 'S', 2000.00, 15, 'sku-gr-03', 1, '2020-12-21 00:08:00', '2020-12-26 03:54:52'),
(4, 8, 'L', 2500.00, 20, 'sku-gr-04', 1, '2020-12-21 00:08:00', '2020-12-26 03:54:52'),
(5, 6, 'L', 1500.00, 30, 'sk-wh-01', 1, '2020-12-21 03:49:31', '2020-12-26 03:57:37'),
(6, 6, 'M', 1200.00, 15, 'sk-wh-02', 1, '2020-12-21 03:50:50', '2020-12-26 03:57:37'),
(7, 6, 'S', 1000.00, 15, 'sk-wh-03', 1, '2020-12-21 03:50:51', '2020-12-26 03:57:37'),
(9, 1, 'L', 1500.00, 30, 'bl-cd--1', 1, '2020-12-26 03:06:52', '2020-12-26 03:06:52'),
(10, 1, 'M', 1300.00, 30, 'bl-cd--2', 1, '2020-12-26 03:06:52', '2020-12-26 03:06:52'),
(11, 1, 'S', 1000.00, 20, 'bl-cd--3', 1, '2020-12-26 03:06:52', '2020-12-27 05:40:25'),
(12, 5, 'L', 5000.00, 30, 'sil-cd--1', 1, '2020-12-26 03:10:31', '2020-12-26 03:10:31'),
(13, 5, 'M', 4000.00, 30, 'sil-cd--2', 1, '2020-12-26 03:10:31', '2020-12-26 03:10:31'),
(14, 5, 'S', 3000.00, 20, 'sil-cd--3', 1, '2020-12-26 03:11:29', '2020-12-26 03:11:29'),
(15, 7, 'L', 3500.00, 30, 'wh-cd-001', 1, '2020-12-26 03:56:46', '2020-12-26 03:56:46'),
(16, 7, 'M', 3200.00, 20, 'wh-cd-002', 1, '2020-12-26 03:56:46', '2020-12-26 03:56:46'),
(17, 7, 'S', 3000.00, 20, 'wh-cd-003', 1, '2020-12-26 03:56:46', '2020-12-26 03:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(6, 6, '7191091608557587.jpg', 1, '2020-12-21 08:33:08', '2020-12-21 08:33:28'),
(7, 6, '9750311608557588.jpg', 1, '2020-12-21 08:33:08', '2020-12-21 08:33:30'),
(8, 1, '9832901608970063.jpg', 0, '2020-12-26 03:07:43', '2020-12-26 03:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men', 1, NULL, '2020-12-21 13:46:25'),
(2, 'Women', 1, NULL, '2020-12-21 13:42:26'),
(3, 'Kids', 1, NULL, '2020-12-22 05:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', '', '', '', '', '', '03234322', 'user@mail.com', NULL, '$2y$10$ul1th01mub6ZmEihSRqHv.3RLKqTjAtBe0L0BdxQ2I9tnbdOJBRN6', 0, NULL, '2020-12-27 22:43:45', '2020-12-27 22:43:45'),
(2, 'admin1', '', '', '', '', '', '03234322', 'admin1@gmail.com', NULL, '$2y$10$CyPvOIBRP49ZPu01NM7LSOJvik7S80ySvgv5o4Vlz15TM94dNdRq.', 0, NULL, '2020-12-27 23:01:18', '2020-12-27 23:01:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
