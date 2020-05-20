-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 10:28 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(4, '2020_05_19_213508_create_products_table', 1),
(5, '2020_05_19_230129_create_product_attributes_table', 2);

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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(10, 'qq', 'qq', 'qq', 'qq', 1, '2020-05-19 23:54:43', '2020-05-20 12:00:10'),
(13, 'qweqwe', 'ahmed', 'ahmed', 'addj  mdflkccm ldddd', 1, '2020-05-20 15:20:57', '2020-05-20 15:20:57'),
(14, 'mmmm', 'mmmm', 'mmmm', 'mmmmmm', 1, '2020-05-20 15:34:40', '2020-05-20 15:34:40'),
(15, 'mmmm', 'mmmm', 'mmmm', 'mmmmmm', 1, '2020-05-20 15:44:31', '2020-05-20 15:44:31'),
(16, 'mmmm', 'mmmm', 'mmmm', NULL, 1, '2020-05-20 15:54:56', '2020-05-20 16:09:46'),
(17, 'qwewww', 'qwqw', 'qwqw', NULL, 0, '2020-05-20 18:00:04', '2020-05-20 18:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `options`, `sku`, `stock`, `price`, `sale_price`, `created_at`, `updated_at`) VALUES
(29, 10, '{\"color\":\"zzzzzzzzzzz\",\"size\":\"zzzzzzz\"}', 'zzzzzzz', 1, '11.00', '1.00', '2020-05-20 12:51:12', '2020-05-20 12:51:12'),
(30, 10, '{\"color\":\"qwqw\",\"size\":\"wq\"}', 'qw', 1, '1.00', '1.00', '2020-05-20 12:51:12', '2020-05-20 12:51:12'),
(32, 10, '{\"color\":\"3\",\"size\":\"3\"}', '3', 3, '3.00', '3.00', '2020-05-20 12:51:12', '2020-05-20 12:51:12'),
(34, 13, '{\"color\":\"qweq\",\"size\":\"qweq\"}', 'qweqw', 15, '12.00', '12.25', '2020-05-20 15:20:58', '2020-05-20 15:20:58'),
(35, 13, '{\"color\":\"asd\",\"size\":\"asd\"}', 'asd', 70, '12.40', '12.47', '2020-05-20 15:20:58', '2020-05-20 15:20:58'),
(36, 14, '{\"color\":\"mmmm\",\"size\":\"mmmm\"}', 'mmmm', 12, '12.12', '12.12', '2020-05-20 15:34:40', '2020-05-20 15:34:40'),
(37, 14, '{\"color\":\"AAA\",\"size\":\"AAAA\"}', 'AAAA', 12, '12.12', '12.12', '2020-05-20 15:34:40', '2020-05-20 15:34:40'),
(40, 16, '{\"color\":\"aqaq\",\"size\":\"aqaq\"}', 'awaq', 12, '12.00', '12.00', '2020-05-20 16:10:26', '2020-05-20 16:10:26'),
(41, 16, '{\"color\":\"q111\",\"size\":\"q1q\"}', 'qw3212', 12, '12.00', '12.00', '2020-05-20 16:10:26', '2020-05-20 16:10:26'),
(42, 16, '{\"color\":\"qqwqqw\",\"size\":\"qwqw\"}', 'sweda', 1212, '1212.00', '1212.00', '2020-05-20 16:49:33', '2020-05-20 16:49:33'),
(43, 17, '{\"color\":\"qwqw\",\"size\":\"qwqw\"}', '8955qq', 12, '12.00', '12.00', '2020-05-20 18:00:04', '2020-05-20 18:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
