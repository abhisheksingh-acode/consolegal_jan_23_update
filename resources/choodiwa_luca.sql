-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2021 at 10:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `choodiwa_luca`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '324323423', NULL, '$2y$10$tkaw64z1Edc3hTHX2TFbJuBpzBqD5l0mu9395yWe30VqiGBzWek2y', NULL, '2021-10-05 01:17:58', '2021-10-05 01:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

CREATE TABLE `assigned` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fran_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned`
--

INSERT INTO `assigned` (`id`, `form_name`, `user_id`, `fran_id`, `submitted`, `status`, `created_at`, `updated_at`) VALUES
(1, 'document', '1', 'null', '0', '1', '2021-10-05 23:50:06', '2021-10-05 23:50:06'),
(2, 'document', '5', 'null', '0', '1', NULL, NULL),
(3, 'document', '5', 'null', '0', '1', NULL, NULL),
(4, 'document', '1', 'null', '0', '1', NULL, NULL),
(5, 'document', '5', 'null', '0', '1', NULL, NULL),
(6, 'document', '5', 'null', '0', '1', NULL, NULL),
(7, 'document', '1', 'null', '0', '1', NULL, NULL),
(8, 'document', '1', 'null', '0', '1', NULL, NULL),
(9, 'document', '1', 'null', '0', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redeem_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `type`, `method`, `amount`, `redeem_count`, `service_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'welcome offer', 'consolegal', 'discount', 'flat', '200', '1', '3', '1', '2021-10-21 22:25:07', '2021-10-21 22:25:07'),
(2, 'waitsoon', 'winter', 'cashback', 'flat', '50', '0', '1', '1', '2021-10-21 22:32:19', '2021-10-21 22:32:19'),
(3, 'waitsoon', 'winter', 'cashback', 'flat', '50', '0', '1', '1', '2021-10-21 22:33:23', '2021-10-21 22:33:23');

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
-- Table structure for table `form_contents`
--

CREATE TABLE `form_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_name_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_contents`
--

INSERT INTO `form_contents` (`id`, `form_name_id`, `form_content`, `required`, `type`, `status`, `created_at`, `updated_at`) VALUES
(3, '1', 'doc', '1', 'file', '1', NULL, NULL),
(4, '1', 'gst no', '1', 'text', '1', NULL, NULL),
(5, '1', 'content', '1', 'text', '1', NULL, NULL),
(7, '2', 'pan', '1', 'file', '1', NULL, NULL),
(8, '6', 'aadhaar', '1', 'file', '1', NULL, NULL),
(9, '12', 'aadhaar', '1', 'file', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_names`
--

CREATE TABLE `form_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_names`
--

INSERT INTO `form_names` (`id`, `name`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'form name 1', '3', NULL, '2021-10-20 11:20:07'),
(2, 'document', '1', NULL, NULL),
(6, 'form name 2', '3', NULL, NULL),
(7, 'custom form', '18', NULL, '2021-10-24 03:34:35'),
(12, 'foma one', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_submits`
--

CREATE TABLE `form_submits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_content_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fran_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frans`
--

CREATE TABLE `frans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frans`
--

INSERT INTO `frans` (`id`, `name`, `phone`, `email`, `password`, `gst`, `company_name`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'abhishek', '8587983993', 'abhishek@gmail.com', '$2y$10$yHjRC0/.AOcAkMtrsb3UTerIVpQHaufiUbg1zrsZeVaUGdQR5pc1O', 'gst1235', 'awarno', 'delhi', '1', '2021-10-04 23:22:50', '2021-10-04 23:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fran_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `email`, `phone`, `service_id`, `from`, `fran_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'vicky', 'test@gmail.com', '564524554', '3', 'web', '', '1', '2021-10-05 00:35:25', '2021-10-05 00:35:25'),
(4, 'vicky', 'test2@gmail.com', '5645245543', '3', 'user', '1', '1', '2021-10-05 00:36:13', '2021-10-05 00:36:13'),
(5, 'vinay singh', 'vinay@gmail.com', '34353535345', '1', 'admin', '1', '1', '2021-10-20 01:41:28', '2021-10-20 01:41:28'),
(8, 'abhishek', 'abhishek@gmail.com', '8587878787', '3', 'admin', '1', '1', '2021-10-20 01:44:02', '2021-10-20 01:44:02');

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
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2019_08_19_000000_create_failed_jobs_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2021_09_06_114611_admin', 2),
(7, '2021_09_07_133510_create_services_table', 2),
(8, '2021_09_07_134536_create_services_sub_heads_table', 2),
(9, '2021_09_09_070229_create_form_names_table', 2),
(10, '2021_09_09_072928_create_form_contents_table', 2),
(11, '2021_09_11_122222_create_form_submits_table', 2),
(12, '2021_09_27_171118_create_leads_table', 2),
(13, '2021_09_27_172117_create_coupons_table', 2),
(14, '2021_09_27_172154_create_refers_table', 2),
(15, '2021_09_27_172224_create_working_statuses_table', 2),
(16, '2021_09_27_172304_create_wallets_table', 2),
(20, '2021_09_27_172431_create_assigned_table', 2),
(21, '2021_10_04_100001_create_service_done_table', 2),
(22, '2021_10_04_101049_create_royalty_points_table', 2),
(23, '2021_10_04_101548_add_entry_to_wallet_history', 3),
(24, '2021_09_27_172329_create_wallet_history_table', 4),
(26, '2021_09_27_172405_create_frans_table', 5),
(27, '2021_09_27_172354_create_orders_table', 6),
(28, '2021_10_20_184256_create_blogs_table', 7),
(29, '2021_10_24_112504_create_tabs_content_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fran_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_submitted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fran_id`, `service_id`, `working_status`, `form_submitted`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'null', '1', 'null', '0', '1', '2021-10-05 04:56:15', '2021-10-05 04:56:15'),
(2, '1', 'null', '1', 'null', '0', '1', '2021-10-05 04:57:17', '2021-10-05 04:57:17'),
(3, '1', 'null', '1', 'null', '0', '1', '2021-10-05 04:57:40', '2021-10-05 04:57:40'),
(18, '5', 'null', '1', '1', '0', '0', '2021-10-21 00:40:49', '2021-10-21 00:40:49');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refers`
--

CREATE TABLE `refers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `royalty_points`
--

CREATE TABLE `royalty_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `royalty_points`
--

INSERT INTO `royalty_points` (`id`, `service_id`, `points`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '2021-10-05 06:03:10', '2021-10-05 06:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''1''',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `points`, `status`, `created_at`, `updated_at`) VALUES
(1, 'gst services', '', '18000', '500', '1', NULL, '2021-10-24 21:51:41'),
(3, 'iso1', '', '15000', '500', '1', NULL, NULL),
(14, 'ertre', NULL, 'erter', 'erter', '1', '2021-10-22 04:58:06', NULL),
(16, 'ertre23', NULL, 'erter', 'erter', '1', '2021-10-22 05:06:15', NULL),
(18, 'service one', NULL, '2000', '300', '', '2021-10-22 05:17:30', NULL),
(21, 'service two', NULL, '4000', '300', '', '2021-10-22 05:18:57', NULL),
(22, 'service three', '', '20000', '1000', '1', '2021-10-22 06:30:42', NULL),
(23, 'service thresa', '', '20000', '1000', '1', '2021-10-22 06:32:10', NULL),
(24, 'service thresasss', '', '20000', '1000', '1', '2021-10-22 06:32:36', NULL),
(52, 'service custom create', '', '2000', '300', '1', '2021-10-25 00:46:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_sub_heads`
--

CREATE TABLE `services_sub_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_no` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_sub_heads`
--

INSERT INTO `services_sub_heads` (`id`, `sub_head`, `sr_no`, `status`, `created_at`, `updated_at`) VALUES
(62, 'one one', '1', '1', NULL, '2021-10-24 19:31:23'),
(63, 'two', '2', '1', NULL, NULL),
(64, 'three', '3', '1', NULL, NULL),
(65, 'four four', '4', '1', NULL, '2021-10-24 19:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `service_done`
--

CREATE TABLE `service_done` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabs_content`
--

CREATE TABLE `tabs_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabs_content`
--

INSERT INTO `tabs_content` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'faq', 'admin', '2021-10-24 20:30:40', '2021-10-24 20:30:40'),
(3, 'overview', 'admin@gmail.com', '2021-10-24 20:36:41', '2021-10-24 20:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `company`, `ref_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abhishek3', 'abhishek@gmail.com', NULL, '387298373', 'awarno', NULL, '$2y$10$KT0vUoAMeaDZzl7t8h232epXpS0wy0uW6jOi.lfYtxiuOxF7f3vSW', NULL, '2021-10-04 23:19:32', '2021-10-04 23:19:32'),
(4, 'user', 'user@gmail.com', NULL, '38729831', 'awarno', NULL, '$2y$10$10N5JvUgp6IOUWGkB4X0ZeJVkTqAcg/AF0NjHGsQzg0alxiLC/OzS', NULL, '2021-10-18 07:20:51', '2021-10-18 07:20:51'),
(5, 'vinay singh', 'vinay@gmail.com', NULL, '8587899030', 'awarno', NULL, '$2y$10$ZrFiAoCQBUNwFEgaCFPNs.qn0F1PwVZb77ncFqGU5VA2PYz1/318W', NULL, '2021-10-21 00:38:25', '2021-10-21 00:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1180', '1', '2021-10-04 23:19:32', '2021-10-05 23:50:06'),
(2, '4', '300', '1', '2021-10-18 07:20:51', '2021-10-18 07:20:51'),
(3, '5', '0', '1', '2021-10-21 00:38:25', '2021-10-21 00:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE `wallet_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_history`
--

INSERT INTO `wallet_history` (`id`, `user_id`, `amount`, `amount_type`, `entry`, `wallet_id`, `created_at`, `updated_at`) VALUES
(1, '1', '120', 'fla', 'debit', '1', '2021-10-05 04:34:54', '2021-10-05 04:34:54'),
(2, '1', '120', 'fla', 'debit', '1', '2021-10-05 04:36:45', '2021-10-05 04:36:45'),
(3, '1', '1200', 'fla', 'credit', '1', '2021-10-05 04:37:19', '2021-10-05 04:37:19'),
(4, '1', '20', 'flat', 'debit', '1', '2021-10-05 05:44:14', '2021-10-05 05:44:14'),
(5, '1', '20', 'flat', 'debit', '1', '2021-10-05 05:45:18', '2021-10-05 05:45:18'),
(6, '1', '20', 'flat', 'debit', '1', '2021-10-05 05:46:11', '2021-10-05 05:46:11'),
(7, '1', '20', 'flat', 'debit', '1', '2021-10-05 05:46:21', '2021-10-05 05:46:21'),
(8, '1', '20', 'flat', 'debit', '{\"id\":1,\"user_id\":\"1\",\"amount\":\"1140\",\"status\":\"1\",\"created_at\":\"2021-10-05T04:49:32.000000Z\",\"updated_at\":\"2021-10-05T11:16:21.000000Z\"}', '2021-10-05 06:59:44', '2021-10-05 06:59:44'),
(9, '1', '20', 'flat', 'debit', '{\"id\":1,\"user_id\":\"1\",\"amount\":\"1120\",\"status\":\"1\",\"created_at\":\"2021-10-05T04:49:32.000000Z\",\"updated_at\":\"2021-10-05T12:29:44.000000Z\"}', '2021-10-05 07:00:26', '2021-10-05 07:00:26'),
(10, '1', '20', 'flat', 'debit', '1', '2021-10-05 07:03:47', '2021-10-05 07:03:47'),
(11, '1', '20', 'flat', 'debit', '1', '2021-10-05 07:04:17', '2021-10-05 07:04:17'),
(12, '1', '20', 'flat', 'debit', '1', '2021-10-05 07:10:39', '2021-10-05 07:10:39'),
(13, '1', '50', 'royalty', 'credit', '1', '2021-10-05 07:10:40', '2021-10-05 07:10:40'),
(14, '1', '20', 'flat', 'debit', '1', '2021-10-05 07:11:02', '2021-10-05 07:11:02'),
(15, '1', '50', 'royalty', 'credit', '1', '2021-10-05 07:11:02', '2021-10-05 07:11:02'),
(16, '1', '20', 'flat', 'debit', '1', '2021-10-05 23:49:24', '2021-10-05 23:49:24'),
(17, '1', '50', 'royalty', 'credit', '1', '2021-10-05 23:49:24', '2021-10-05 23:49:24'),
(18, '1', '20', 'flat', 'debit', '1', '2021-10-05 23:50:06', '2021-10-05 23:50:06'),
(19, '1', '50', 'royalty', 'credit', '1', '2021-10-05 23:50:06', '2021-10-05 23:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `working_statuses`
--

CREATE TABLE `working_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_statuses`
--

INSERT INTO `working_statuses` (`id`, `name`, `sno`, `service_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'step1', '1', '1', '1', '2021-10-05 05:56:58', '2021-10-05 05:56:58'),
(2, 'step2', '1', '1', '1', '2021-10-05 05:57:12', '2021-10-05 05:57:12'),
(3, 'step3', '1', '1', '1', '2021-10-05 05:57:15', '2021-10-05 05:57:15'),
(4, 'step4', '1', '1', '1', '2021-10-05 05:57:19', '2021-10-05 05:57:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `assigned`
--
ALTER TABLE `assigned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `form_contents`
--
ALTER TABLE `form_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_names`
--
ALTER TABLE `form_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_submits`
--
ALTER TABLE `form_submits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frans`
--
ALTER TABLE `frans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `frans_phone_unique` (`phone`),
  ADD UNIQUE KEY `frans_email_unique` (`email`),
  ADD UNIQUE KEY `frans_gst_unique` (`gst`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leads_email_unique` (`email`),
  ADD UNIQUE KEY `leads_phone_unique` (`phone`);

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
-- Indexes for table `refers`
--
ALTER TABLE `refers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `royalty_points`
--
ALTER TABLE `royalty_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_name_unique` (`name`);

--
-- Indexes for table `services_sub_heads`
--
ALTER TABLE `services_sub_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_done`
--
ALTER TABLE `service_done`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabs_content`
--
ALTER TABLE `tabs_content`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tabs_content_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_statuses`
--
ALTER TABLE `working_statuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned`
--
ALTER TABLE `assigned`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_contents`
--
ALTER TABLE `form_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `form_names`
--
ALTER TABLE `form_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `form_submits`
--
ALTER TABLE `form_submits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frans`
--
ALTER TABLE `frans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refers`
--
ALTER TABLE `refers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `royalty_points`
--
ALTER TABLE `royalty_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `services_sub_heads`
--
ALTER TABLE `services_sub_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `service_done`
--
ALTER TABLE `service_done`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabs_content`
--
ALTER TABLE `tabs_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `working_statuses`
--
ALTER TABLE `working_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
