-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 10:15 PM
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
(2, 'RODzRc8wRKFj3g0wP42yPUZQijE2mjobj59YiCvM', 0, 1, 'L', 2, '2020-12-29 08:15:11', '2020-12-29 08:15:19'),
(5, 'yvvrnnM4LWZL1gaeXuvL9sGnFW3OLJ1iZ6DFeyw5', 0, 1, 'M', 5, '2021-01-05 06:06:51', '2021-01-05 07:34:19'),
(6, 'yvvrnnM4LWZL1gaeXuvL9sGnFW3OLJ1iZ6DFeyw5', 0, 1, 'S', 7, '2021-01-05 06:18:09', '2021-01-05 07:41:05'),
(16, 'vMPIQcYyJfA83sCwKgR2kDL8U1ZCRNrZxzhGXjDe', 0, 6, 'S', 2, '2021-07-31 22:57:34', '2021-07-31 22:57:34'),
(17, '0uHwE6QDuFQjhBDct4A6J0tIxqW6AI8deHGs09k1', 0, 6, 'S', 2, '2021-07-31 23:00:28', '2021-07-31 23:00:28');

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
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`) VALUES
(1, 'AF', 'Afghanistan', 1),
(2, 'AL', 'Albania', 1),
(3, 'DZ', 'Algeria', 1),
(4, 'DS', 'American Samoa', 1),
(5, 'AD', 'Andorra', 1),
(6, 'AO', 'Angola', 1),
(7, 'AI', 'Anguilla', 1),
(8, 'AQ', 'Antarctica', 1),
(9, 'AG', 'Antigua and Barbuda', 1),
(10, 'AR', 'Argentina', 1),
(11, 'AM', 'Armenia', 1),
(12, 'AW', 'Aruba', 1),
(13, 'AU', 'Australia', 1),
(14, 'AT', 'Austria', 1),
(15, 'AZ', 'Azerbaijan', 1),
(16, 'BS', 'Bahamas', 1),
(17, 'BH', 'Bahrain', 1),
(18, 'BD', 'Bangladesh', 1),
(19, 'BB', 'Barbados', 1),
(20, 'BY', 'Belarus', 1),
(21, 'BE', 'Belgium', 1),
(22, 'BZ', 'Belize', 1),
(23, 'BJ', 'Benin', 1),
(24, 'BM', 'Bermuda', 1),
(25, 'BT', 'Bhutan', 1),
(26, 'BO', 'Bolivia', 1),
(27, 'BA', 'Bosnia and Herzegovina', 1),
(28, 'BW', 'Botswana', 1),
(29, 'BV', 'Bouvet Island', 1),
(30, 'BR', 'Brazil', 1),
(31, 'IO', 'British Indian Ocean Territory', 1),
(32, 'BN', 'Brunei Darussalam', 1),
(33, 'BG', 'Bulgaria', 1),
(34, 'BF', 'Burkina Faso', 1),
(35, 'BI', 'Burundi', 1),
(36, 'KH', 'Cambodia', 1),
(37, 'CM', 'Cameroon', 1),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 1),
(40, 'KY', 'Cayman Islands', 1),
(41, 'CF', 'Central African Republic', 1),
(42, 'TD', 'Chad', 1),
(43, 'CL', 'Chile', 1),
(44, 'CN', 'China', 1),
(45, 'CX', 'Christmas Island', 1),
(46, 'CC', 'Cocos (Keeling) Islands', 1),
(47, 'CO', 'Colombia', 1),
(48, 'KM', 'Comoros', 1),
(49, 'CD', 'Democratic Republic of the Congo', 1),
(50, 'CG', 'Republic of Congo', 1),
(51, 'CK', 'Cook Islands', 1),
(52, 'CR', 'Costa Rica', 1),
(53, 'HR', 'Croatia (Hrvatska)', 1),
(54, 'CU', 'Cuba', 1),
(55, 'CY', 'Cyprus', 1),
(56, 'CZ', 'Czech Republic', 1),
(57, 'DK', 'Denmark', 1),
(58, 'DJ', 'Djibouti', 1),
(59, 'DM', 'Dominica', 1),
(60, 'DO', 'Dominican Republic', 1),
(61, 'TP', 'East Timor', 1),
(62, 'EC', 'Ecuador', 1),
(63, 'EG', 'Egypt', 1),
(64, 'SV', 'El Salvador', 1),
(65, 'GQ', 'Equatorial Guinea', 1),
(66, 'ER', 'Eritrea', 1),
(67, 'EE', 'Estonia', 1),
(68, 'ET', 'Ethiopia', 1),
(69, 'FK', 'Falkland Islands (Malvinas)', 1),
(70, 'FO', 'Faroe Islands', 1),
(71, 'FJ', 'Fiji', 1),
(72, 'FI', 'Finland', 1),
(73, 'FR', 'France', 1),
(74, 'FX', 'France, Metropolitan', 1),
(75, 'GF', 'French Guiana', 1),
(76, 'PF', 'French Polynesia', 1),
(77, 'TF', 'French Southern Territories', 1),
(78, 'GA', 'Gabon', 1),
(79, 'GM', 'Gambia', 1),
(80, 'GE', 'Georgia', 1),
(81, 'DE', 'Germany', 1),
(82, 'GH', 'Ghana', 1),
(83, 'GI', 'Gibraltar', 1),
(84, 'GK', 'Guernsey', 1),
(85, 'GR', 'Greece', 1),
(86, 'GL', 'Greenland', 1),
(87, 'GD', 'Grenada', 1),
(88, 'GP', 'Guadeloupe', 1),
(89, 'GU', 'Guam', 1),
(90, 'GT', 'Guatemala', 1),
(91, 'GN', 'Guinea', 1),
(92, 'GW', 'Guinea-Bissau', 1),
(93, 'GY', 'Guyana', 1),
(94, 'HT', 'Haiti', 1),
(95, 'HM', 'Heard and Mc Donald Islands', 1),
(96, 'HN', 'Honduras', 1),
(97, 'HK', 'Hong Kong', 1),
(98, 'HU', 'Hungary', 1),
(99, 'IS', 'Iceland', 1),
(100, 'IN', 'India', 1),
(101, 'IM', 'Isle of Man', 1),
(102, 'ID', 'Indonesia', 1),
(103, 'IR', 'Iran (Islamic Republic of)', 1),
(104, 'IQ', 'Iraq', 1),
(105, 'IE', 'Ireland', 1),
(106, 'IL', 'Israel', 1),
(107, 'IT', 'Italy', 1),
(108, 'CI', 'Ivory Coast', 1),
(109, 'JE', 'Jersey', 1),
(110, 'JM', 'Jamaica', 1),
(111, 'JP', 'Japan', 1),
(112, 'JO', 'Jordan', 1),
(113, 'KZ', 'Kazakhstan', 1),
(114, 'KE', 'Kenya', 1),
(115, 'KI', 'Kiribati', 1),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 1),
(117, 'KR', 'Korea, Republic of', 1),
(118, 'XK', 'Kosovo', 1),
(119, 'KW', 'Kuwait', 1),
(120, 'KG', 'Kyrgyzstan', 1),
(121, 'LA', 'Lao People\'s Democratic Republic', 1),
(122, 'LV', 'Latvia', 1),
(123, 'LB', 'Lebanon', 1),
(124, 'LS', 'Lesotho', 1),
(125, 'LR', 'Liberia', 1),
(126, 'LY', 'Libyan Arab Jamahiriya', 1),
(127, 'LI', 'Liechtenstein', 1),
(128, 'LT', 'Lithuania', 1),
(129, 'LU', 'Luxembourg', 1),
(130, 'MO', 'Macau', 1),
(131, 'MK', 'North Macedonia', 1),
(132, 'MG', 'Madagascar', 1),
(133, 'MW', 'Malawi', 1),
(134, 'MY', 'Malaysia', 1),
(135, 'MV', 'Maldives', 1),
(136, 'ML', 'Mali', 1),
(137, 'MT', 'Malta', 1),
(138, 'MH', 'Marshall Islands', 1),
(139, 'MQ', 'Martinique', 1),
(140, 'MR', 'Mauritania', 1),
(141, 'MU', 'Mauritius', 1),
(142, 'TY', 'Mayotte', 1),
(143, 'MX', 'Mexico', 1),
(144, 'FM', 'Micronesia, Federated States of', 1),
(145, 'MD', 'Moldova, Republic of', 1),
(146, 'MC', 'Monaco', 1),
(147, 'MN', 'Mongolia', 1),
(148, 'ME', 'Montenegro', 1),
(149, 'MS', 'Montserrat', 1),
(150, 'MA', 'Morocco', 1),
(151, 'MZ', 'Mozambique', 1),
(152, 'MM', 'Myanmar', 1),
(153, 'NA', 'Namibia', 1),
(154, 'NR', 'Nauru', 1),
(155, 'NP', 'Nepal', 1),
(156, 'NL', 'Netherlands', 1),
(157, 'AN', 'Netherlands Antilles', 1),
(158, 'NC', 'New Caledonia', 1),
(159, 'NZ', 'New Zealand', 1),
(160, 'NI', 'Nicaragua', 1),
(161, 'NE', 'Niger', 1),
(162, 'NG', 'Nigeria', 1),
(163, 'NU', 'Niue', 1),
(164, 'NF', 'Norfolk Island', 1),
(165, 'MP', 'Northern Mariana Islands', 1),
(166, 'NO', 'Norway', 1),
(167, 'OM', 'Oman', 1),
(168, 'PK', 'Pakistan', 1),
(169, 'PW', 'Palau', 1),
(170, 'PS', 'Palestine', 1),
(171, 'PA', 'Panama', 1),
(172, 'PG', 'Papua New Guinea', 1),
(173, 'PY', 'Paraguay', 1),
(174, 'PE', 'Peru', 1),
(175, 'PH', 'Philippines', 1),
(176, 'PN', 'Pitcairn', 1),
(177, 'PL', 'Poland', 1),
(178, 'PT', 'Portugal', 1),
(179, 'PR', 'Puerto Rico', 1),
(180, 'QA', 'Qatar', 1),
(181, 'RE', 'Reunion', 1),
(182, 'RO', 'Romania', 1),
(183, 'RU', 'Russian Federation', 1),
(184, 'RW', 'Rwanda', 1),
(185, 'KN', 'Saint Kitts and Nevis', 1),
(186, 'LC', 'Saint Lucia', 1),
(187, 'VC', 'Saint Vincent and the Grenadines', 1),
(188, 'WS', 'Samoa', 1),
(189, 'SM', 'San Marino', 1),
(190, 'ST', 'Sao Tome and Principe', 1),
(191, 'SA', 'Saudi Arabia', 1),
(192, 'SN', 'Senegal', 1),
(193, 'RS', 'Serbia', 1),
(194, 'SC', 'Seychelles', 1),
(195, 'SL', 'Sierra Leone', 1),
(196, 'SG', 'Singapore', 1),
(197, 'SK', 'Slovakia', 1),
(198, 'SI', 'Slovenia', 1),
(199, 'SB', 'Solomon Islands', 1),
(200, 'SO', 'Somalia', 1),
(201, 'ZA', 'South Africa', 1),
(202, 'GS', 'South Georgia South Sandwich Islands', 1),
(203, 'SS', 'South Sudan', 1),
(204, 'ES', 'Spain', 1),
(205, 'LK', 'Sri Lanka', 1),
(206, 'SH', 'St. Helena', 1),
(207, 'PM', 'St. Pierre and Miquelon', 1),
(208, 'SD', 'Sudan', 1),
(209, 'SR', 'Suriname', 1),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 1),
(211, 'SZ', 'Swaziland', 1),
(212, 'SE', 'Sweden', 1),
(213, 'CH', 'Switzerland', 1),
(214, 'SY', 'Syrian Arab Republic', 1),
(215, 'TW', 'Taiwan', 1),
(216, 'TJ', 'Tajikistan', 1),
(217, 'TZ', 'Tanzania, United Republic of', 1),
(218, 'TH', 'Thailand', 1),
(219, 'TG', 'Togo', 1),
(220, 'TK', 'Tokelau', 1),
(221, 'TO', 'Tonga', 1),
(222, 'TT', 'Trinidad and Tobago', 1),
(223, 'TN', 'Tunisia', 1),
(224, 'TR', 'Turkey', 1),
(225, 'TM', 'Turkmenistan', 1),
(226, 'TC', 'Turks and Caicos Islands', 1),
(227, 'TV', 'Tuvalu', 1),
(228, 'UG', 'Uganda', 1),
(229, 'UA', 'Ukraine', 1),
(230, 'AE', 'United Arab Emirates', 1),
(231, 'GB', 'United Kingdom', 1),
(232, 'US', 'United States', 1),
(233, 'UM', 'United States minor outlying islands', 1),
(234, 'UY', 'Uruguay', 1),
(235, 'UZ', 'Uzbekistan', 1),
(236, 'VU', 'Vanuatu', 1),
(237, 'VA', 'Vatican City State', 1),
(238, 'VE', 'Venezuela', 1),
(239, 'VN', 'Vietnam', 1),
(240, 'VG', 'Virgin Islands (British)', 1),
(241, 'VI', 'Virgin Islands (U.S.)', 1),
(242, 'WF', 'Wallis and Futuna Islands', 1),
(243, 'EH', 'Western Sahara', 1),
(244, 'YE', 'Yemen', 1),
(245, 'ZM', 'Zambia', 1),
(246, 'ZW', 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_option`, `coupon_code`, `categories`, `users`, `coupon_type`, `amount_type`, `amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manual', 'test10', '2,3', 'dummy@gmailc.om,faiza@gmail.com', 'single', 'Percentage', 10.00, '2021-12-31', 1, NULL, '2021-01-08 12:06:59'),
(2, 'Automatic', '9517608', '2,9', 'dummy@gmail.com', 'Multiple Times', 'Percentage', 87.00, '2021-07-29', 1, '2021-07-29 20:58:37', '2021-07-31 03:32:57'),
(3, 'Manual', 'RE23322', '4,5,3,7', 'dummy@gmail.com', 'Single Time', 'Fixed', 300.00, '2022-07-29', 1, '2021-07-29 21:02:46', '2021-08-02 18:55:19'),
(4, 'Automatic', '720034', '2,4', 'dummy@gmail.com', 'Multiple Times', 'Percentage', 5.00, '2022-08-05', 1, '2021-07-29 21:07:42', '2021-07-31 04:09:35'),
(6, 'Automatic', '895086', '2,4', 'developer@gmail.com', 'Multiple Times', 'Fixed', 342345.00, '2022-03-03', 1, '2021-07-29 21:10:52', '2021-07-29 21:10:52'),
(7, 'Automatic', '8872192', '5', 'dummy@gmail.com', 'Single Time', 'Fixed', 500000.00, '2022-05-04', 1, '2021-07-29 21:20:37', '2021-07-29 21:20:37'),
(8, 'Manual', 'St3334', '4,5', '', 'Multiple Times', 'Percentage', 49.00, '2022-05-04', 1, '2021-07-29 21:44:49', '2021-07-31 03:32:39'),
(9, 'Manual', 'Go4344', '2,3', 'dummy@gmail.com', 'Multiple Times', 'Percentage', 29.99, '2021-11-03', 1, '2021-07-29 21:52:02', '2021-07-31 03:32:19'),
(10, 'Manual', 'Co43332', '2,10', 'dummy@gmail.com,developer@gmail.com', 'Single Time', 'Percentage', 50.00, '2022-05-04', 1, '2021-07-30 04:29:29', '2021-07-30 04:29:29'),
(11, 'Manual', 'CO-3445', '2,4,5,9,3', 'dummy@gmail.com', 'Single Time', 'Percentage', 25.00, '2021-10-05', 1, '2021-08-05 21:09:07', '2021-08-05 21:11:59'),
(12, 'Manual', 'CO-4444', '4,7', 'dummy@gmail.com,developer@gmail.com', 'Single Time', 'Fixed', 100.00, '2021-08-25', 1, '2021-08-05 21:44:06', '2021-08-05 21:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `delievery_addresses`
--

CREATE TABLE `delievery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delievery_addresses`
--

INSERT INTO `delievery_addresses` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'Islamabad', 'Capital Territory Islamabad', 'Pakistan', '46000', '00923045097558', 0, '2021-08-03 00:06:50', '2021-08-03 01:20:08'),
(7, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 0, '2021-08-03 02:32:04', '2021-08-03 02:32:36'),
(8, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 0, '2021-08-04 16:10:11', '2021-08-04 16:10:11'),
(9, 5, 'Developer', 'Street#55, Houston Texas United Stattes', 'Houston', 'Texas', 'United States', '770000', '00123457654', 0, '2021-08-05 21:51:32', '2021-08-05 21:51:32');

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
(15, '2020_12_28_022107_add_columns_to_users', 12),
(16, '2020_12_29_125945_create_chat_messages_table', 13),
(17, '2021_01_08_135122_create_coupons_table', 14),
(18, '2021_08_02_132408_create_delievery_addresses_table', 15),
(19, '2021_08_02_205457_create_orders_table', 16),
(20, '2021_08_02_211154_create_orders_products_table', 17),
(21, '2021_08_03_194925_create_order_statuses_table', 18),
(22, '2021_08_04_130314_create_orders_logs_table', 19),
(23, '2021_08_04_135351_update_orders_table', 20),
(24, '2021_08_05_163648_create_shipping_charges_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` double(8,2) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` double(8,2) DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `payment_gateway`, `grand_total`, `courier_name`, `tracking_number`, `created_at`, `updated_at`) VALUES
(1, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, '720034', 123.50, 'Shipped', 'COD', 'COD', 2346.50, 'Leopard', '879779', '2021-08-03 11:01:44', '2021-08-04 21:38:52'),
(2, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'Islamabad', 'Capital Territory Islamabad', 'Pakistan', '46000', '00923045097558', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'Paid', 'COD', 'COD', 1800.00, '', '', '2021-08-03 11:05:38', '2021-08-04 03:52:09'),
(3, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'Islamabad', 'Capital Territory Islamabad', 'Pakistan', '46000', '00923045097558', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'Shipped', 'COD', 'COD', 3700.00, 'Leopard', '7678678', '2021-08-03 11:07:20', '2021-08-05 02:48:24'),
(5, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'Islamabad', 'Capital Territory Islamabad', 'Pakistan', '46000', '00923045097558', 'dummy@gmail.com', 0.00, 'RE23322', NULL, 'Shipped', 'COD', 'COD', 6650.00, 'Leopard', '3456', '2021-08-03 12:09:48', '2021-08-05 03:03:22'),
(6, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'RE23322', NULL, 'Shipped', 'COD', 'COD', 5000.00, 'Leopard', '88789', '2021-08-03 12:21:49', '2021-08-05 21:40:45'),
(7, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, NULL, NULL, 'In Process', 'COD', 'COD', 2510.00, '', '', '2021-08-03 17:21:12', '2021-08-04 03:39:26'),
(8, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 9800.00, '', '', '2021-08-04 05:22:37', '2021-08-04 05:22:37'),
(9, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 9800.00, '', '', '2021-08-04 05:23:49', '2021-08-04 05:23:49'),
(10, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 9800.00, '', '', '2021-08-04 05:27:13', '2021-08-04 05:27:13'),
(11, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'Hold', 'COD', 'COD', 9800.00, '', '', '2021-08-04 05:29:51', '2021-08-04 20:14:31'),
(12, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 9800.00, '', '', '2021-08-04 05:30:35', '2021-08-04 05:30:35'),
(13, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 9800.00, '', '', '2021-08-04 05:37:01', '2021-08-04 05:37:01'),
(14, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 9800.00, '', '', '2021-08-04 05:39:04', '2021-08-04 05:39:04'),
(15, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 9800.00, '', '', '2021-08-04 05:39:44', '2021-08-04 05:39:44'),
(16, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 9800.00, '', '', '2021-08-04 05:42:09', '2021-08-04 05:42:09'),
(17, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 9800.00, '', '', '2021-08-04 05:43:00', '2021-08-04 05:43:00'),
(18, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'Islamabad', 'Capital Territory Islamabad', 'Pakistan', '46000', '00923045097558', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 650.00, '', '', '2021-08-04 05:45:55', '2021-08-04 05:45:55'),
(19, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'Islamabad', 'Capital Territory Islamabad', 'Pakistan', '46000', '00923045097558', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 650.00, '', '', '2021-08-04 05:46:32', '2021-08-04 05:46:32'),
(20, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'Islamabad', 'Capital Territory Islamabad', 'Pakistan', '46000', '00923045097558', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 3025.00, '', '', '2021-08-04 05:47:49', '2021-08-04 05:47:49'),
(21, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'Islamabad', 'Capital Territory Islamabad', 'Pakistan', '46000', '00923045097558', 'dummy@gmail.com', 0.00, 'RE23322', 300.00, 'New', 'COD', 'COD', 3025.00, '', '', '2021-08-04 05:48:17', '2021-08-04 05:48:17'),
(22, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:10:29', '2021-08-04 16:10:29'),
(23, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:14:06', '2021-08-04 16:14:06'),
(24, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:15:32', '2021-08-04 16:15:32'),
(25, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:17:02', '2021-08-04 16:17:02'),
(26, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:18:19', '2021-08-04 16:18:19'),
(27, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:18:26', '2021-08-04 16:18:26'),
(28, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:19:34', '2021-08-04 16:19:34'),
(29, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:20:14', '2021-08-04 16:20:14'),
(30, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:21:09', '2021-08-04 16:21:09'),
(31, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:21:59', '2021-08-04 16:21:59'),
(32, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:23:14', '2021-08-04 16:23:14'),
(33, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:24:08', '2021-08-04 16:24:08'),
(34, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:24:22', '2021-08-04 16:24:22'),
(35, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:24:47', '2021-08-04 16:24:47'),
(36, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:25:21', '2021-08-04 16:25:21'),
(37, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:25:35', '2021-08-04 16:25:35'),
(38, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:25:52', '2021-08-04 16:25:52'),
(39, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:26:53', '2021-08-04 16:26:53'),
(40, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:27:20', '2021-08-04 16:27:20'),
(41, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:27:36', '2021-08-04 16:27:36'),
(42, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:28:09', '2021-08-04 16:28:09'),
(43, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 3040.00, '', '', '2021-08-04 16:28:25', '2021-08-04 16:28:25'),
(44, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, '720034', 247.00, 'New', 'COD', 'COD', 4693.00, '', '', '2021-08-04 16:29:51', '2021-08-04 16:29:51'),
(45, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, '720034', 247.00, 'Pending', 'COD', 'COD', 4693.00, '', '', '2021-08-04 16:46:57', '2021-08-04 19:50:16'),
(46, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, '720034', 247.00, 'New', 'COD', 'COD', 9833.00, '', '', '2021-08-04 21:41:25', '2021-08-04 21:41:25'),
(47, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'Islamabad', 'Capital Territory Islamabad', 'Pakistan', '46000', '00923045097558', 'dummy@gmail.com', 0.00, 'CO-3445', 420.00, 'New', 'COD', 'COD', 1260.00, '', '', '2021-08-05 21:34:48', '2021-08-05 21:34:48'),
(48, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'Islamabad', 'Capital Territory Islamabad', 'Pakistan', '46000', '00923045097558', 'dummy@gmail.com', 0.00, 'CO-3445', 420.00, 'New', 'COD', 'COD', 1260.00, '', '', '2021-08-05 21:36:37', '2021-08-05 21:36:37'),
(49, 4, 'Jennifer', 'jennifergwaltney1@gmail.com', 'Houston', 'Texas', 'United States', '770011', '00189767898', 'dummy@gmail.com', 0.00, 'CO-3445', 420.00, 'New', 'COD', 'COD', 1005.00, '', '', '2021-08-05 21:38:27', '2021-08-05 21:38:27'),
(50, 4, 'Awais', 'Muhammadi Town Sohan Islamabad', 'islambad', 'Islambad', 'Pakistan', '460000', '03045097559', 'dummy@gmail.com', 0.00, 'CO-4444', 100.00, 'New', 'COD', 'COD', 1325.00, '', '', '2021-08-05 21:45:13', '2021-08-05 21:45:13'),
(51, 5, 'Developer', 'Street#55, Houston Texas United Stattes', 'Houston', 'Texas', 'United States', '770000', '00123457654', 'developer@gmail.com', 0.00, 'CO-4444', 100.00, 'New', 'COD', 'COD', 3900.00, '', '', '2021-08-05 21:51:44', '2021-08-05 21:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `orders_logs`
--

CREATE TABLE `orders_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_logs`
--

INSERT INTO `orders_logs` (`id`, `order_id`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 11, 'Hold', '2021-08-04 20:14:34', '2021-08-04 20:14:34'),
(2, 1, 'In Process', '2021-08-04 20:26:53', '2021-08-04 20:26:53'),
(3, 1, 'Paid', '2021-08-04 20:41:36', '2021-08-04 20:41:36'),
(4, 1, 'Shipped', '2021-08-04 21:38:56', '2021-08-04 21:38:56'),
(5, 3, 'Shipped', '2021-08-05 02:48:31', '2021-08-05 02:48:31'),
(6, 5, 'Pending', '2021-08-05 03:02:47', '2021-08-05 03:02:47'),
(7, 5, 'Shipped', '2021-08-05 03:03:25', '2021-08-05 03:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_color`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 'Bl-01', 'Black Casual T-shirt', 'black', 'M', 1235.00, 2, '2021-08-03 11:01:44', '2021-08-03 11:01:44'),
(2, 2, 4, 6, 'WH-02', 'White T-shirt', 'white', 'S', 700.00, 3, '2021-08-03 11:05:38', '2021-08-03 11:05:38'),
(3, 3, 4, 5, 'PK-1-02', 'Pakistani Girls dress', 'silver', 'M', 4000.00, 1, '2021-08-03 11:07:20', '2021-08-03 11:07:20'),
(5, 5, 4, 7, 'Wh-011', 'White T-shirt Printed', 'white', 'L', 3325.00, 2, '2021-08-03 12:09:48', '2021-08-03 12:09:48'),
(6, 6, 4, 5, 'PK-1-02', 'Pakistani Girls dress', 'silver', 'L', 5000.00, 1, '2021-08-03 12:21:49', '2021-08-03 12:21:49'),
(7, 7, 4, 8, 'Gr-01', 'Grey T-shirt', 'grey', 'L', 1275.00, 1, '2021-08-03 17:21:12', '2021-08-03 17:21:12'),
(8, 7, 4, 1, 'Bl-01', 'Black Casual T-shirt', 'black', 'M', 1235.00, 1, '2021-08-03 17:21:12', '2021-08-03 17:21:12'),
(9, 8, 4, 8, 'Gr-01', 'Grey T-shirt', 'grey', 'S', 1700.00, 3, '2021-08-04 05:22:37', '2021-08-04 05:22:37'),
(10, 8, 4, 5, 'PK-1-02', 'Pakistani Girls dress', 'silver', 'L', 5000.00, 1, '2021-08-04 05:22:37', '2021-08-04 05:22:37'),
(11, 18, 4, 1, 'Bl-01', 'Black Casual T-shirt', 'black', 'S', 950.00, 1, '2021-08-04 05:45:55', '2021-08-04 05:45:55'),
(12, 20, 4, 7, 'Wh-011', 'White T-shirt Printed', 'white', 'L', 3325.00, 1, '2021-08-04 05:47:49', '2021-08-04 05:47:49'),
(13, 22, 4, 7, 'Wh-011', 'White T-shirt Printed', 'white', 'M', 3040.00, 1, '2021-08-04 16:10:29', '2021-08-04 16:10:29'),
(14, 44, 4, 1, 'Bl-01', 'Black Casual T-shirt', 'black', 'M', 1235.00, 4, '2021-08-04 16:29:51', '2021-08-04 16:29:51'),
(15, 46, 4, 7, 'Wh-011', 'White T-shirt Printed', 'white', 'M', 3040.00, 2, '2021-08-04 21:41:25', '2021-08-04 21:41:25'),
(16, 46, 4, 5, 'PK-1-02', 'Pakistani Girls dress', 'silver', 'M', 4000.00, 1, '2021-08-04 21:41:25', '2021-08-04 21:41:25'),
(17, 47, 4, 6, 'WH-02', 'White T-shirt', 'white', 'M', 840.00, 2, '2021-08-05 21:34:48', '2021-08-05 21:34:48'),
(18, 49, 4, 1, 'Bl-01', 'Black Casual T-shirt', 'black', 'L', 1425.00, 1, '2021-08-05 21:38:27', '2021-08-05 21:38:27'),
(19, 50, 4, 1, 'Bl-01', 'Black Casual T-shirt', 'black', 'L', 1425.00, 1, '2021-08-05 21:45:13', '2021-08-05 21:45:13'),
(20, 51, 5, 5, 'PK-1-02', 'Pakistani Girls dress', 'silver', 'M', 4000.00, 1, '2021-08-05 21:51:44', '2021-08-05 21:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New', 1, NULL, NULL),
(2, 'Pending', 1, NULL, NULL),
(3, 'Hold', 1, NULL, NULL),
(4, 'Cancelled', 1, NULL, NULL),
(5, 'In Process', 1, NULL, NULL),
(6, 'Paid', 1, NULL, NULL),
(7, 'Shipped', 1, NULL, NULL),
(8, 'Delievered', 1, NULL, NULL);

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
(11, 1, 'S', 1000.00, 20, 'bl-cd--3', 1, '2020-12-26 03:06:52', '2021-07-31 19:47:57'),
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
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country`, `shipping_charges`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 80.00, 1, '2021-08-05 07:00:00', '2021-08-06 02:03:12'),
(2, 'Albania', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(3, 'Algeria', 150.00, 1, '2021-08-05 07:00:00', '2021-08-06 01:43:04'),
(4, 'American Samoa', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(5, 'Andorra', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(6, 'Angola', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(7, 'Anguilla', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(8, 'Antarctica', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(9, 'Antigua and Barbuda', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(10, 'Argentina', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(11, 'Armenia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(12, 'Aruba', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(13, 'Australia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(14, 'Austria', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(15, 'Azerbaijan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(16, 'Bahamas', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(17, 'Bahrain', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(18, 'Bangladesh', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(19, 'Barbados', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(20, 'Belarus', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(21, 'Belgium', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(22, 'Belize', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(23, 'Benin', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(24, 'Bermuda', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(25, 'Bhutan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(26, 'Bolivia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(27, 'Bosnia and Herzegovina', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(28, 'Botswana', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(29, 'Bouvet Island', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(30, 'Brazil', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(31, 'British Indian Ocean Territory', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(32, 'Brunei Darussalam', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(33, 'Bulgaria', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(34, 'Burkina Faso', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(35, 'Burundi', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(36, 'Cambodia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(37, 'Cameroon', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(38, 'Canada', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(39, 'Cape Verde', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(40, 'Cayman Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(41, 'Central African Republic', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(42, 'Chad', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(43, 'Chile', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(44, 'China', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(45, 'Christmas Island', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(46, 'Cocos (Keeling) Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(47, 'Colombia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(48, 'Comoros', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(49, 'Democratic Republic of the Congo', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(50, 'Republic of Congo', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(51, 'Cook Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(52, 'Costa Rica', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(53, 'Croatia (Hrvatska)', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(54, 'Cuba', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(55, 'Cyprus', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(56, 'Czech Republic', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(57, 'Denmark', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(58, 'Djibouti', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(59, 'Dominica', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(60, 'Dominican Republic', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(61, 'East Timor', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(62, 'Ecuador', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(63, 'Egypt', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(64, 'El Salvador', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(65, 'Equatorial Guinea', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(66, 'Eritrea', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(67, 'Estonia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(68, 'Ethiopia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(69, 'Falkland Islands (Malvinas)', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(70, 'Faroe Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(71, 'Fiji', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(72, 'Finland', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(73, 'France', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(74, 'France, Metropolitan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(75, 'French Guiana', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(76, 'French Polynesia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(77, 'French Southern Territories', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(78, 'Gabon', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(79, 'Gambia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(80, 'Georgia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(81, 'Germany', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(82, 'Ghana', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(83, 'Gibraltar', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(84, 'Guernsey', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(85, 'Greece', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(86, 'Greenland', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(87, 'Grenada', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(88, 'Guadeloupe', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(89, 'Guam', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(90, 'Guatemala', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(91, 'Guinea', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(92, 'Guinea-Bissau', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(93, 'Guyana', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(94, 'Haiti', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(95, 'Heard and Mc Donald Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(96, 'Honduras', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(97, 'Hong Kong', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(98, 'Hungary', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(99, 'Iceland', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(100, 'India', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(101, 'Isle of Man', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(102, 'Indonesia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(103, 'Iran (Islamic Republic of)', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(104, 'Iraq', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(105, 'Ireland', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(106, 'Israel', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(107, 'Italy', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(108, 'Ivory Coast', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(109, 'Jersey', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(110, 'Jamaica', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(111, 'Japan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(112, 'Jordan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(113, 'Kazakhstan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(114, 'Kenya', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(115, 'Kiribati', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(116, 'Korea, Democratic People\'s Republic of', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(117, 'Korea, Republic of', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(118, 'Kosovo', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(119, 'Kuwait', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(120, 'Kyrgyzstan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(121, 'Lao People\'s Democratic Republic', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(122, 'Latvia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(123, 'Lebanon', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(124, 'Lesotho', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(125, 'Liberia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(126, 'Libyan Arab Jamahiriya', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(127, 'Liechtenstein', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(128, 'Lithuania', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(129, 'Luxembourg', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(130, 'Macau', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(131, 'North Macedonia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(132, 'Madagascar', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(133, 'Malawi', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(134, 'Malaysia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(135, 'Maldives', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(136, 'Mali', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(137, 'Malta', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(138, 'Marshall Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(139, 'Martinique', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(140, 'Mauritania', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(141, 'Mauritius', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(142, 'Mayotte', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(143, 'Mexico', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(144, 'Micronesia, Federated States of', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(145, 'Moldova, Republic of', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(146, 'Monaco', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(147, 'Mongolia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(148, 'Montenegro', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(149, 'Montserrat', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(150, 'Morocco', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(151, 'Mozambique', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(152, 'Myanmar', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(153, 'Namibia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(154, 'Nauru', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(155, 'Nepal', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(156, 'Netherlands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(157, 'Netherlands Antilles', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(158, 'New Caledonia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(159, 'New Zealand', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(160, 'Nicaragua', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(161, 'Niger', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(162, 'Nigeria', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(163, 'Niue', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(164, 'Norfolk Island', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(165, 'Northern Mariana Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(166, 'Norway', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(167, 'Oman', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(168, 'Pakistan', 50.00, 1, '2021-08-05 07:00:00', '2021-08-06 01:49:26'),
(169, 'Palau', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(170, 'Palestine', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(171, 'Panama', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(172, 'Papua New Guinea', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(173, 'Paraguay', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(174, 'Peru', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(175, 'Philippines', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(176, 'Pitcairn', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(177, 'Poland', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(178, 'Portugal', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(179, 'Puerto Rico', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(180, 'Qatar', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(181, 'Reunion', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(182, 'Romania', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(183, 'Russian Federation', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(184, 'Rwanda', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(185, 'Saint Kitts and Nevis', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(186, 'Saint Lucia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(187, 'Saint Vincent and the Grenadines', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(188, 'Samoa', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(189, 'San Marino', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(190, 'Sao Tome and Principe', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(191, 'Saudi Arabia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(192, 'Senegal', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(193, 'Serbia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(194, 'Seychelles', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(195, 'Sierra Leone', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(196, 'Singapore', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(197, 'Slovakia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(198, 'Slovenia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(199, 'Solomon Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(200, 'Somalia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(201, 'South Africa', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(202, 'South Georgia South Sandwich Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(203, 'South Sudan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(204, 'Spain', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(205, 'Sri Lanka', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(206, 'St. Helena', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(207, 'St. Pierre and Miquelon', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(208, 'Sudan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(209, 'Suriname', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(210, 'Svalbard and Jan Mayen Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(211, 'Swaziland', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(212, 'Sweden', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(213, 'Switzerland', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(214, 'Syrian Arab Republic', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(215, 'Taiwan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(216, 'Tajikistan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(217, 'Tanzania, United Republic of', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(218, 'Thailand', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(219, 'Togo', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(220, 'Tokelau', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(221, 'Tonga', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(222, 'Trinidad and Tobago', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(223, 'Tunisia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(224, 'Turkey', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(225, 'Turkmenistan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(226, 'Turks and Caicos Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(227, 'Tuvalu', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(228, 'Uganda', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(229, 'Ukraine', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(230, 'United Arab Emirates', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(231, 'United Kingdom', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(232, 'United States', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(233, 'United States minor outlying islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(234, 'Uruguay', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(235, 'Uzbekistan', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(236, 'Vanuatu', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(237, 'Vatican City State', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(238, 'Venezuela', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(239, 'Vietnam', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(240, 'Virgin Islands (British)', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(241, 'Virgin Islands (U.S.)', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(242, 'Wallis and Futuna Islands', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(243, 'Western Sahara', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(244, 'Yemen', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(245, 'Zambia', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00'),
(246, 'Zimbabwe', 100.00, 1, '2021-08-05 07:00:00', '2021-08-05 07:00:00');

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
(4, 'Awais', 'Gujranwala main street', 'Gujranwala', 'Punjab', 'Pakistan', '3453', '0323432278767', 'dummy@gmail.com', NULL, '$2y$10$ir.p8E9I0OMFeikFPBsTYe0kFU319NUIIxlrfm5ZcOCtzppkdBbDq', 1, NULL, '2020-12-28 12:31:57', '2021-07-31 00:36:13'),
(5, 'developer', '', '', '', '', '', '03234322897899', 'developer@gmail.com', NULL, '$2y$10$xK8DoJL.ze34ek.7P5yTPOlGEIpB3e4.0gm6EFE7DxEUkf3vEbcl6', 1, NULL, '2021-01-02 02:34:11', '2021-01-02 04:19:20');

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
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delievery_addresses`
--
ALTER TABLE `delievery_addresses`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_logs`
--
ALTER TABLE `orders_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
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
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `delievery_addresses`
--
ALTER TABLE `delievery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders_logs`
--
ALTER TABLE `orders_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
