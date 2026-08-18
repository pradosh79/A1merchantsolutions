-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 18, 2026 at 06:43 AM
-- Server version: 11.8.8-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u533806958_adcoupon`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(32) NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `screen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `advertiser_id` bigint(20) UNSIGNED DEFAULT NULL,
  `claim_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `type`, `subject_type`, `subject_id`, `screen_id`, `offer_id`, `advertiser_id`, `claim_id`, `meta`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, 'offer_click', 'App\\Models\\Offer', 29, NULL, 29, 7, NULL, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-10 08:24:49'),
(2, 'offer_click', 'App\\Models\\Offer', 29, NULL, 29, 7, NULL, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-10 08:24:49'),
(3, 'offer_click', 'App\\Models\\Offer', 31, NULL, 31, 7, NULL, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-10 08:25:04'),
(4, 'offer_click', 'App\\Models\\Offer', 31, NULL, 31, 7, NULL, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-10 08:25:04'),
(5, 'offer_click', 'App\\Models\\Offer', 27, NULL, 27, 6, NULL, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-10 08:25:15'),
(6, 'offer_click', 'App\\Models\\Offer', 27, NULL, 27, 6, NULL, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-10 08:25:15'),
(7, 'offer_click', 'App\\Models\\Offer', 23, NULL, 23, 5, NULL, NULL, '45.250.244.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-11 10:49:36'),
(8, 'offer_click', 'App\\Models\\Offer', 23, NULL, 23, 5, NULL, NULL, '45.250.244.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-11 10:49:36'),
(9, 'offer_click', 'App\\Models\\Offer', 31, NULL, 31, 7, NULL, NULL, '117.194.194.180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-12 05:14:33'),
(10, 'offer_click', 'App\\Models\\Offer', 31, NULL, 31, 7, NULL, NULL, '117.194.194.180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-12 05:14:33'),
(11, 'offer_click', 'App\\Models\\Offer', 30, NULL, 30, 7, NULL, NULL, '117.194.194.180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-12 05:14:45'),
(12, 'offer_click', 'App\\Models\\Offer', 30, NULL, 30, 7, NULL, NULL, '117.194.194.180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-12 05:14:45'),
(13, 'offer_click', 'App\\Models\\Offer', 26, NULL, 26, 8, NULL, NULL, '2409:4091:33:8a11:c111:1ecf:1bf1:de31', 'Mozilla/5.0 (Linux; Android 13; Pixel 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', '2026-08-13 15:57:58'),
(14, 'offer_click', 'App\\Models\\Offer', 26, NULL, 26, 8, NULL, NULL, '2409:4091:33:8a11:c111:1ecf:1bf1:de31', 'Mozilla/5.0 (Linux; Android 13; Pixel 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', '2026-08-13 15:57:58'),
(15, 'offer_click', 'App\\Models\\Offer', 9, NULL, 9, 7, NULL, NULL, '2409:4091:33:8a11:c111:1ecf:1bf1:de31', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-08-13 17:49:26'),
(16, 'offer_click', 'App\\Models\\Offer', 9, NULL, 9, 7, NULL, NULL, '2409:4091:33:8a11:c111:1ecf:1bf1:de31', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-08-13 17:49:26'),
(17, 'offer_click', 'App\\Models\\Offer', 31, NULL, 31, 7, NULL, NULL, '2409:4091:33:8a11:c111:1ecf:1bf1:de31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 17:50:24'),
(18, 'offer_click', 'App\\Models\\Offer', 31, NULL, 31, 7, NULL, NULL, '2409:4091:33:8a11:c111:1ecf:1bf1:de31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 17:50:24'),
(19, 'offer_click', 'App\\Models\\Offer', 21, NULL, 21, 5, NULL, NULL, '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:04:41'),
(20, 'offer_click', 'App\\Models\\Offer', 21, NULL, 21, 5, NULL, NULL, '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:04:41'),
(21, 'coupon_claim', 'App\\Models\\Claim', 210, NULL, 21, 5, 210, '{\"coupon_code_masked\":\"XS******\"}', '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:04:55'),
(22, 'coupon_claim', 'App\\Models\\Claim', 210, NULL, 21, 5, 210, '{\"coupon_code_masked\":\"XS******\"}', '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:04:55'),
(23, 'offer_click', 'App\\Models\\Offer', 15, NULL, 15, 2, NULL, NULL, '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:07:46'),
(24, 'offer_click', 'App\\Models\\Offer', 15, NULL, 15, 2, NULL, NULL, '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:07:46'),
(25, 'offer_click', 'App\\Models\\Offer', 26, NULL, 26, 8, NULL, NULL, '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:07:54'),
(26, 'offer_click', 'App\\Models\\Offer', 26, NULL, 26, 8, NULL, NULL, '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:07:54'),
(27, 'offer_click', 'App\\Models\\Offer', 33, NULL, 33, 8, NULL, NULL, '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:15:13'),
(28, 'offer_click', 'App\\Models\\Offer', 33, NULL, 33, 8, NULL, NULL, '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:15:13'),
(29, 'coupon_claim', 'App\\Models\\Claim', 211, NULL, 33, 8, 211, '{\"coupon_code_masked\":\"86******\"}', '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:15:17'),
(30, 'coupon_claim', 'App\\Models\\Claim', 211, NULL, 33, 8, 211, '{\"coupon_code_masked\":\"86******\"}', '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:15:17'),
(31, 'offer_click', 'App\\Models\\Offer', 25, NULL, 25, 8, NULL, NULL, '2409:4091:33:8a11:6daa:ce05:baa:4313', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 21:02:50'),
(32, 'offer_click', 'App\\Models\\Offer', 25, NULL, 25, 8, NULL, NULL, '2409:4091:33:8a11:6daa:ce05:baa:4313', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 21:02:50'),
(33, 'coupon_claim', 'App\\Models\\Claim', 212, NULL, 25, 8, 212, '{\"coupon_code_masked\":\"NX******\"}', '2409:4091:33:8a11:6daa:ce05:baa:4313', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 21:02:56'),
(34, 'coupon_claim', 'App\\Models\\Claim', 212, NULL, 25, 8, 212, '{\"coupon_code_masked\":\"NX******\"}', '2409:4091:33:8a11:6daa:ce05:baa:4313', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 21:02:56'),
(35, 'offer_click', 'App\\Models\\Offer', 35, NULL, 35, 9, NULL, NULL, '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:03:57'),
(36, 'offer_click', 'App\\Models\\Offer', 35, NULL, 35, 9, NULL, NULL, '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:03:57'),
(37, 'coupon_claim', 'App\\Models\\Claim', 213, NULL, 35, 9, NULL, '{\"coupon_code_masked\":\"35******\"}', '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:04:17'),
(38, 'coupon_claim', 'App\\Models\\Claim', 213, NULL, 35, 9, NULL, '{\"coupon_code_masked\":\"35******\"}', '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:04:17'),
(39, 'offer_click', 'App\\Models\\Offer', 35, NULL, 35, 9, NULL, NULL, '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:18:02'),
(40, 'offer_click', 'App\\Models\\Offer', 35, NULL, 35, 9, NULL, NULL, '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:18:02'),
(41, 'coupon_claim', 'App\\Models\\Claim', 214, NULL, 35, 9, NULL, '{\"coupon_code_masked\":\"UX******\"}', '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:18:14'),
(42, 'coupon_claim', 'App\\Models\\Claim', 214, NULL, 35, 9, NULL, '{\"coupon_code_masked\":\"UX******\"}', '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:18:14'),
(43, 'offer_click', 'App\\Models\\Offer', 35, NULL, 35, 9, NULL, NULL, '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:32:51'),
(44, 'offer_click', 'App\\Models\\Offer', 35, NULL, 35, 9, NULL, NULL, '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:32:51'),
(45, 'coupon_claim', 'App\\Models\\Claim', 215, NULL, 35, 9, 215, '{\"coupon_code_masked\":\"8L******\"}', '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:33:06'),
(46, 'coupon_claim', 'App\\Models\\Claim', 215, NULL, 35, 9, 215, '{\"coupon_code_masked\":\"8L******\"}', '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:33:06'),
(47, 'offer_click', 'App\\Models\\Offer', 33, NULL, 33, 8, NULL, NULL, '2401:4900:882b:1fed:60ad:f930:cfd3:dad9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 23:46:00'),
(48, 'offer_click', 'App\\Models\\Offer', 33, NULL, 33, 8, NULL, NULL, '2401:4900:882b:1fed:60ad:f930:cfd3:dad9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 23:46:00'),
(49, 'coupon_claim', 'App\\Models\\Claim', 216, NULL, 33, 8, 216, '{\"coupon_code_masked\":\"G9******\"}', '2401:4900:882b:1fed:60ad:f930:cfd3:dad9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 23:46:12'),
(50, 'coupon_claim', 'App\\Models\\Claim', 216, NULL, 33, 8, 216, '{\"coupon_code_masked\":\"G9******\"}', '2401:4900:882b:1fed:60ad:f930:cfd3:dad9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 23:46:12'),
(51, 'offer_click', 'App\\Models\\Offer', 34, NULL, 34, 8, NULL, NULL, '2402:3a80:1989:474f:fd66:1948:a90f:99b1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-18 02:09:14'),
(52, 'offer_click', 'App\\Models\\Offer', 34, NULL, 34, 8, NULL, NULL, '2402:3a80:1989:474f:fd66:1948:a90f:99b1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-18 02:09:14'),
(53, 'offer_click', 'App\\Models\\Offer', 23, NULL, 23, 8, NULL, NULL, '2402:3a80:1989:474f:fd66:1948:a90f:99b1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-18 02:15:00'),
(54, 'offer_click', 'App\\Models\\Offer', 23, NULL, 23, 8, NULL, NULL, '2402:3a80:1989:474f:fd66:1948:a90f:99b1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-18 02:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `advertisers`
--

CREATE TABLE `advertisers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `redemption_token` varchar(64) NOT NULL,
  `redemption_token_rotated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisers`
--

INSERT INTO `advertisers` (`id`, `uuid`, `name`, `slug`, `contact_email`, `contact_phone`, `logo_path`, `address`, `status`, `redemption_token`, `redemption_token_rotated_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'db68a9be-1bc6-403e-a45f-bb4d784a308b', 'Cape Plumbing INC', 'larkin-cummings-and-stanton-phts', 'test@gmail.com', '561-555-0199', NULL, 'Boca Raton, FL', 'active', 'CXFGP3rk84T87ib0WOYJRqPggqWuU0XaaVMckgqs', '2026-08-11 14:44:49', '2026-08-10 08:24:02', '2026-08-13 18:46:02', NULL),
(2, '30821c5b-2805-42eb-881a-68070dd3d126', 'Lemke Inc', 'lemke-inc-ccne', 'bill.mcglynn@mante.biz', '973.223.0714', NULL, '6430 Ulises Parkways\nNorth Beauview, OH 54349', 'active', 'e1A7ymYpwarXATjffHOGVyqMevdZRCwrpklNuFMJ', NULL, '2026-08-10 08:24:02', '2026-08-10 08:24:02', NULL),
(3, '93ed479c-540f-4180-9e24-7a3b9d9fb920', 'Gorczany, Bashirian and Windler', 'gorczany-bashirian-and-windler-xxfc', 'windler.bernard@donnelly.com', '415-279-2562', NULL, '651 Herbert Vista\nBergnaumburgh, AZ 44491', 'active', 'GvlEYiAdDh6xh3DGxjipcU9ivjFa6rQ2PKKWTdXi', NULL, '2026-08-10 08:24:02', '2026-08-10 08:24:02', NULL),
(4, '62bdce25-0789-4c15-8790-5e2da3330d0b', 'Boehm, Sipes and Jakubowski', 'boehm-sipes-and-jakubowski-ts3g', 'bayer.walton@lueilwitz.com', '+1-832-571-2175', NULL, '1170 Hailee Club Apt. 081\nSouth Johnathonside, KY 28774', 'active', 'EXd60kOn5KPQl0Kdx63FoPzzuRWWqpIMZRRXgXiU', NULL, '2026-08-10 08:24:02', '2026-08-10 08:24:02', NULL),
(5, 'cab6ad84-e8b1-4766-aa5f-828f7f8c3fee', 'Mayer-Dickinson', 'mayer-dickinson-org0', 'hackett.adella@hudson.info', '1-915-578-8487', NULL, '90930 Shields Well Apt. 758\nNew Ricky, FL 66577-3407', 'active', '6VQmRE7r5VvUQzXG0U3LKGSID94SPlqKTRaorz87', NULL, '2026-08-10 08:24:02', '2026-08-10 08:24:02', NULL),
(6, 'bc095e3c-2d99-4a4d-85c8-21514d4fff66', 'Mills, Carroll and Bogan', 'mills-carroll-and-bogan-updz', 'deborah94@gleason.com', '+1-681-780-1042', NULL, '7868 Bahringer Ports Apt. 284\nNew Howell, DC 29581-7911', 'active', '3conqVG5M963yTEneVqfICvUxHXDv8a1tpwwWop1', NULL, '2026-08-10 08:24:02', '2026-08-10 08:24:02', NULL),
(7, '13d9e389-a58c-4f79-9d1e-2c6da86e2b3d', 'A-1 Merchant Solutions', 'a-1-merchant-solutions-in27', 'partners@a1merchantsolutions.com', '1800-000-000', 'http://localhost/images/logo.png', NULL, 'active', 'eJbbrp5qMyYr4KecS8BrJzY5fsnEWYyvhLHnDrMJ', NULL, '2026-08-10 08:24:02', '2026-08-10 08:24:02', NULL),
(8, 'ea3b6280-1c51-49ed-8222-5379c4757768', '7-Eleven', '7-eleven-lslk', '7eleven@example.com', '9876543210', NULL, 'Test', 'active', 'fxyPZj40wdrIIbec6YLESUR1HYxixWtLcXcNqir9', NULL, '2026-08-11 14:52:15', '2026-08-11 14:52:15', NULL),
(9, '03c9e0a5-5767-421e-bc96-55f0a6a4be08', '1320 Emergency Towing', '1320-emergency-towing-wpay', 'test@gmail.com', '9542953812', NULL, '1241 N Dixie Hwy, Pompano Beach', 'active', 'xqzXkearstt9d2xYf20hyIV98uH3NUmYNYARpURL', NULL, '2026-08-13 18:16:39', '2026-08-13 22:01:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('20c9347649b2b503c232882b6ee82f87', 'i:1;', 1786999387),
('20c9347649b2b503c232882b6ee82f87:timer', 'i:1786999387;', 1786999387),
('5ada5bef36303b27b092a8ca5ca38039', 'i:1;', 1786632377),
('5ada5bef36303b27b092a8ca5ca38039:timer', 'i:1786632377;', 1786632377),
('6b4cc6e1a537fe96f5cbf9e45161dadb', 'i:1;', 1786723446),
('6b4cc6e1a537fe96f5cbf9e45161dadb:timer', 'i:1786723446;', 1786723446),
('a252414cea655432802aff44d4ab39ed', 'i:1;', 1786635236),
('a252414cea655432802aff44d4ab39ed:timer', 'i:1786635236;', 1786635236),
('bd40ece56cabbe3302969f39931301e4', 'i:1;', 1786731432),
('bd40ece56cabbe3302969f39931301e4:timer', 'i:1786731432;', 1786731432);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_icons`
--

CREATE TABLE `category_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `icon_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_icons`
--

INSERT INTO `category_icons` (`id`, `category`, `icon_path`, `created_at`, `updated_at`) VALUES
(10, 'lifestyle', 'categories/9yt8blzXOBgZHNHSLYK723f88PihGA2bky65Imuo.png', '2026-08-11 14:00:34', '2026-08-14 17:27:06'),
(11, 'sports', 'categories/wgms33eYpTFkLUay9YJo42eNFsuMoz7qG3634Rqs.png', '2026-08-12 12:54:17', '2026-08-12 12:54:17'),
(12, 'food_and_drinks', 'categories/VBTWBni7PvTgvpV7g6wV8p948x5Pxmn0WtYTmEqd.png', '2026-08-12 12:54:17', '2026-08-12 12:54:17'),
(13, 'e_commerce', 'categories/ZFBgIkEU7Zvh1DMFKalIikTj4ng7UkJX4ahBKYjV.png', '2026-08-12 12:54:17', '2026-08-12 12:54:17'),
(14, 'fashion', 'categories/16Dk0NoGNdbYhCgTlOM2zDEwMbkelNOieShu7DXs.png', '2026-08-12 12:54:17', '2026-08-12 12:54:17'),
(15, 'beauty', 'categories/1orODdWfCsvzQwQZgVRfPciN1H6jSCuyWiySVsZp.png', '2026-08-12 12:54:17', '2026-08-12 12:54:17'),
(16, 'entertainment', 'categories/0tNlVHv1ozywYA1yZ4eRYsLPfzmqwh7h1WOOVPt8.png', '2026-08-12 12:54:17', '2026-08-12 12:54:17'),
(17, 'others', 'categories/rjbRPFBuVBweqWqY0kkaQOdPBaCmyXlCerywOCet.png', '2026-08-12 12:54:17', '2026-08-12 12:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `screen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(32) NOT NULL,
  `qr_code_path` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'claimed',
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `redeemed_at` timestamp NULL DEFAULT NULL,
  `redeemed_by` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `uuid`, `offer_id`, `screen_id`, `name`, `email`, `phone`, `coupon_code`, `qr_code_path`, `status`, `expires_at`, `redeemed_at`, `redeemed_by`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 'b82ee6f1-7056-449b-918c-c308a54cf4f8', 1, 1, 'Teresa Medhurst PhD', 'pgulgowski@example.net', '808-882-6412', 'GH0KOYHA', NULL, 'claimed', '2026-09-09 08:24:04', NULL, NULL, '100.203.202.37', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows 95; Trident/3.0)', '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(2, '9f77c199-204f-483b-ab3a-5e60566e0bf5', 1, 1, 'Kali Baumbach', 'gerhold.marlee@example.org', '+1.206.224.8049', 'Z3UQERPX', NULL, 'claimed', '2026-09-09 08:24:04', NULL, NULL, '111.253.130.115', 'Mozilla/5.0 (Windows; U; Windows NT 5.01) AppleWebKit/531.12.3 (KHTML, like Gecko) Version/5.0.1 Safari/531.12.3', '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(3, '9bcd4a34-88c7-4c66-b12a-cb4830fd07e9', 1, 1, 'Dr. Ben Watsica', 'louie09@example.org', '+18657459673', 'B7YSMPDK', NULL, 'redeemed', '2026-08-10 13:54:05', '2026-08-10 08:24:05', 'seed-data', '111.226.252.92', 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/5360 (KHTML, like Gecko) Chrome/40.0.891.0 Mobile Safari/5360', '2026-08-10 08:24:04', '2026-08-10 08:24:05'),
(4, '92099fbb-7b90-4ae8-ac9a-0250a9fdc3d3', 1, 1, 'Emile Berge', 'max.schmeler@example.net', '+12193250521', 'EJF30PTH', NULL, 'redeemed', '2026-08-10 13:54:05', '2026-08-10 08:24:05', 'seed-data', '120.154.24.219', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_8_0) AppleWebKit/5362 (KHTML, like Gecko) Chrome/39.0.880.0 Mobile Safari/5362', '2026-08-10 08:24:04', '2026-08-10 08:24:05'),
(5, 'fc83d335-1e84-4f22-ad22-23afb7f4ec4f', 1, 1, 'Dane Kessler', 'darryl38@example.org', '678.255.6467', 'ABJEZGLQ', NULL, 'claimed', '2026-09-09 08:24:04', NULL, NULL, '23.199.254.238', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_7_4) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/80.0.4710.33 Safari/537.2 Edg/80.01132.84', '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(6, '76a6105f-1821-4874-a220-66ea9a1a38f4', 1, 1, 'Chris Gutkowski', 'zlang@example.net', '+15034341889', 'ULJUJEN8', NULL, 'claimed', '2026-09-09 08:24:04', NULL, NULL, '38.79.113.71', 'Mozilla/5.0 (Windows NT 5.01) AppleWebKit/532.1 (KHTML, like Gecko) Chrome/79.0.4822.93 Safari/532.1 Edg/79.01060.33', '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(7, '9ea7b788-0f01-4117-850a-26dae884ceb2', 1, 1, 'Chase Goldner', 'fcrona@example.com', '+1-458-786-2663', 'LOJVXKZ1', NULL, 'claimed', '2026-09-09 08:24:04', NULL, NULL, '23.202.207.13', 'Opera/8.28 (Windows NT 5.01; sl-SI) Presto/2.9.275 Version/12.00', '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(8, 'c07a0f4f-8519-4da6-9497-70416ef9b389', 1, 1, 'Ruby Franecki DDS', 'candace17@example.org', '+13233231085', '9YJXXQAH', NULL, 'claimed', '2026-09-09 08:24:04', NULL, NULL, '15.191.209.63', 'Opera/9.37 (X11; Linux x86_64; en-US) Presto/2.12.165 Version/12.00', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(9, '55a30e71-720d-449b-8f25-02b9a3e9be59', 2, 1, 'Alisha Zemlak', 'madyson53@example.net', '+1-320-271-4746', 'GLVZSBA4', NULL, 'redeemed', '2026-08-10 13:54:05', '2026-08-10 08:24:05', 'seed-data', '182.207.63.225', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 5.01; Trident/5.1)', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(10, '7b0efabc-23ed-4a74-b7dc-83349bb241bb', 2, 1, 'Odie Hodkiewicz', 'donnie.jenkins@example.com', '+1.443.958.4041', 'GUUR1ERZ', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '18.125.177.72', 'Opera/9.15 (Windows NT 5.1; en-US) Presto/2.10.205 Version/12.00', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(11, 'a4416622-89fd-4eee-8678-3bb08740fe00', 2, 1, 'Selmer Kunze', 'bwunsch@example.org', '+1 (351) 992-4425', 'EJJLVLER', NULL, 'redeemed', '2026-08-10 13:54:05', '2026-08-10 08:24:05', 'seed-data', '76.12.63.137', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_1 like Mac OS X; sl-SI) AppleWebKit/531.18.2 (KHTML, like Gecko) Version/3.0.5 Mobile/8B111 Safari/6531.18.2', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(12, 'b3924397-e4c9-4d8c-943e-b4bbecf6c6a4', 3, 1, 'Dr. Adrien Reynolds', 'stoltenberg.rogelio@example.org', '1-341-327-0343', 'KPONKIJ8', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '122.87.210.67', 'Opera/8.98 (X11; Linux i686; nl-NL) Presto/2.8.294 Version/10.00', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(13, '357eb5b4-74a8-4044-aabf-86c47de69b2b', 3, 1, 'Prof. Blanca Little', 'astiedemann@example.org', '434.677.0723', 'GPZCKFJ0', NULL, 'redeemed', '2026-08-10 13:54:05', '2026-08-10 08:24:05', 'seed-data', '92.98.222.206', 'Opera/8.17 (X11; Linux i686; sl-SI) Presto/2.8.166 Version/10.00', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(14, '57517bb8-e39f-4f5f-90ea-dcf924b2f355', 3, 1, 'Guiseppe Jakubowski I', 'mswaniawski@example.org', '+1 (316) 372-1601', 'EBMAVID1', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '85.105.246.253', 'Mozilla/5.0 (X11; Linux i686; rv:5.0) Gecko/20140813 Firefox/37.0', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(15, 'c2734a19-3043-4185-a937-e06ec31dd802', 3, 1, 'Mae O\'Hara', 'zgleichner@example.net', '+1-678-932-2196', 'HXDXABRE', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '153.22.175.221', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_4 rv:3.0) Gecko/20101228 Firefox/37.0', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(16, '0c8183f7-e06b-4751-b126-19ba8e88dc5a', 3, 1, 'Jovan Brekke PhD', 'gkihn@example.com', '515.934.1914', 'TVEH94FO', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '164.232.91.65', 'Mozilla/5.0 (Windows 98; Win 9x 4.90; en-US; rv:1.9.1.20) Gecko/20251007 Firefox/37.0', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(17, '52a94df8-ed0f-4bb4-b09d-377005e425c1', 3, 1, 'Prof. Diamond Heaney Jr.', 'mbahringer@example.com', '+12314033471', 'KBL440P4', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '3.89.215.44', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/531.1 (KHTML, like Gecko) Chrome/91.0.4396.84 Safari/531.1 EdgA/91.01007.24', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(18, '76a84501-ddbf-46a5-8c09-e19cfa0c7ce0', 3, 1, 'Augustus Connelly Jr.', 'wolff.adele@example.com', '+1-480-983-5733', 'TVMEE3C4', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '203.106.233.231', 'Mozilla/5.0 (X11; Linux i686; rv:6.0) Gecko/20240616 Firefox/37.0', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(19, '3fb86f56-d561-4828-af41-1fd096eeff51', 3, 1, 'Guido Bogan', 'afisher@example.org', '469.412.1274', 'JAAAXQOM', NULL, 'redeemed', '2026-08-10 13:54:05', '2026-08-10 08:24:05', 'seed-data', '31.201.90.22', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_7_3 rv:5.0; nl-NL) AppleWebKit/532.29.6 (KHTML, like Gecko) Version/5.0.2 Safari/532.29.6', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(20, '33da3a6b-449b-4c12-9a81-f745c2326548', 4, 1, 'Declan Lynch', 'mariane80@example.org', '(364) 534-6506', 'UWHULCBV', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '98.55.242.155', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/5352 (KHTML, like Gecko) Chrome/39.0.871.0 Mobile Safari/5352', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(21, 'ff556c7d-93b7-4b37-8655-e68054e4bea9', 4, 1, 'Mr. Ezequiel Schaefer', 'sammie76@example.net', '419-885-3718', 'PRARTHLC', NULL, 'redeemed', '2026-08-10 13:54:05', '2026-08-10 08:24:05', 'seed-data', '21.239.106.98', 'Mozilla/5.0 (compatible; MSIE 5.0; Windows NT 5.1; Trident/4.1)', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(22, '7cf01a65-2755-460f-9d9e-5f871ec174bf', 4, 1, 'Mr. Wilhelm Renner', 'robel.randy@example.com', '218.614.7416', 'BTHVD5QE', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '200.101.77.76', 'Mozilla/5.0 (Windows NT 4.0) AppleWebKit/5312 (KHTML, like Gecko) Chrome/38.0.860.0 Mobile Safari/5312', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(23, '5884ffed-6c97-4f03-b693-56288dec1277', 4, 1, 'Jayson Beahan', 'henri.hill@example.com', '904-316-1030', 'LYZRAHRD', NULL, 'redeemed', '2026-08-10 13:54:05', '2026-08-10 08:24:05', 'seed-data', '6.239.239.89', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_2 like Mac OS X) AppleWebKit/537.2 (KHTML, like Gecko) Version/15.0 EdgiOS/82.01095.4 Mobile/15E148 Safari/537.2', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(24, '979e466e-a03f-4adb-b9ed-21326644f1b8', 4, 1, 'Dominic Hodkiewicz', 'xfunk@example.net', '864.298.7946', 'THULBM4N', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '207.19.107.95', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_7_1 rv:4.0) Gecko/20120419 Firefox/36.0', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(25, 'af5ae4ab-7267-476e-98ec-9e41d3937de9', 5, 1, 'Brenden Tremblay', 'nikki02@example.net', '+1 (442) 740-9674', 'RWMU7YEK', NULL, 'redeemed', '2026-08-10 13:54:05', '2026-08-10 08:24:05', 'seed-data', '54.224.116.222', 'Mozilla/5.0 (compatible; MSIE 7.0; Windows 98; Win 9x 4.90; Trident/4.0)', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(26, '41551289-92e5-4eea-ae8e-03f26fea71a6', 5, 1, 'Tomas Wilderman', 'ransom32@example.net', '223-378-3843', '2C5KWVF8', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '251.110.228.198', 'Mozilla/5.0 (Windows NT 6.0; sl-SI; rv:1.9.2.20) Gecko/20150320 Firefox/36.0', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(27, 'e7d46f95-34a2-4c7b-9cd6-d496bba7a9b2', 5, 1, 'Baron Yost', 'bria06@example.com', '1-252-970-5774', 'PJGTYD1C', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '182.179.24.184', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 4.0; Trident/5.0)', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(28, '062827dd-95d8-4955-b23b-b92f119b9db1', 5, 1, 'Juwan Adams', 'zhintz@example.org', '+1.930.635.4669', 'WJSO1YV2', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '107.9.100.226', 'Opera/9.94 (Windows NT 6.2; sl-SI) Presto/2.10.232 Version/10.00', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(29, 'b709e84b-b805-482e-b50a-f85908e5568c', 5, 1, 'Prof. Francis White III', 'ycrona@example.com', '959.721.7750', 'IMRLLXZD', NULL, 'claimed', '2026-09-09 08:24:05', NULL, NULL, '213.74.27.88', 'Mozilla/5.0 (Windows 95) AppleWebKit/537.0 (KHTML, like Gecko) Chrome/82.0.4018.37 Safari/537.0 Edg/82.01088.5', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(30, 'ecf3153b-9d22-466a-a070-b5ffdc71708f', 5, 1, 'Aylin Tillman', 'langosh.emilie@example.org', '1-414-771-5820', 'PWTHR8FB', NULL, 'redeemed', '2026-08-10 13:54:05', '2026-08-10 08:24:05', 'seed-data', '248.94.52.73', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/4.0)', '2026-08-10 08:24:05', '2026-08-10 08:24:05'),
(31, '7af97347-61f8-4a82-a0a4-818eacc23a67', 6, 1, 'Dr. Stuart Kirlin Sr.', 'green.annetta@example.net', '415-579-6676', '7QQYWXRT', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '197.114.9.176', 'Mozilla/5.0 (Windows NT 5.2) AppleWebKit/5342 (KHTML, like Gecko) Chrome/39.0.845.0 Mobile Safari/5342', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(32, 'cf8f18fd-44f6-46f2-a2d6-66753f2d6e64', 6, 1, 'Dr. Tyson Robel', 'imogene55@example.com', '+1 (434) 316-9495', 'JDZ8NWVV', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '56.146.33.225', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/5310 (KHTML, like Gecko) Chrome/36.0.840.0 Mobile Safari/5310', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(33, '7cb6c8ea-0dc2-4ae3-9cc2-e94099060e60', 6, 1, 'Prof. Katarina Bogisich Sr.', 'edyth.effertz@example.org', '470.679.6051', 'MUISU3NF', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '207.96.159.106', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_1 like Mac OS X; sl-SI) AppleWebKit/531.25.5 (KHTML, like Gecko) Version/4.0.5 Mobile/8B113 Safari/6531.25.5', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(34, '4839a562-cf25-451f-8217-6dc19622dab9', 6, 1, 'Andre Greenholt', 'kristopher48@example.com', '1-863-760-9159', 'KVSQXYHO', NULL, 'redeemed', '2026-08-10 13:54:06', '2026-08-10 08:24:06', 'seed-data', '15.152.145.131', 'Opera/8.14 (Windows 98; Win 9x 4.90; nl-NL) Presto/2.10.223 Version/11.00', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(35, '50a19dfb-6f8d-4ed2-a28d-250cc75ccd9d', 6, 1, 'Prof. Will Botsford', 'will.katlyn@example.net', '704.908.0589', 'XBKLCMT0', NULL, 'redeemed', '2026-08-10 13:54:06', '2026-08-10 08:24:06', 'seed-data', '18.238.192.155', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/531.0 (KHTML, like Gecko) Chrome/82.0.4013.85 Safari/531.0 EdgA/82.01069.3', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(36, 'd4bd8465-9b46-45f5-91c5-9e84674d6f65', 6, 1, 'Prof. Gideon Jacobson', 'nadams@example.net', '854.398.0219', 'MRVCQ2WY', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '162.228.182.25', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/85.0.4404.56 Safari/535.1 Edg/85.01028.79', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(37, 'fe1f7369-55cb-4308-9bc4-7f754736466b', 6, 1, 'Prof. Ivory Veum', 'xgottlieb@example.net', '+1-260-616-1350', 'WNFYGEGW', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '135.35.53.25', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/533.0 (KHTML, like Gecko) Version/15.0 EdgiOS/90.01031.64 Mobile/15E148 Safari/533.0', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(38, '3e4e1d9a-7f86-42a2-845a-afab5737e77c', 7, 1, 'Marlen Hill', 'goyette.rebeca@example.org', '+1-908-505-5669', 'CNAK1PF2', NULL, 'redeemed', '2026-08-10 13:54:06', '2026-08-10 08:24:06', 'seed-data', '55.45.170.82', 'Mozilla/5.0 (Windows NT 6.0; sl-SI; rv:1.9.0.20) Gecko/20110919 Firefox/35.0', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(39, '5ac5f167-8576-491e-a740-e445361c1607', 7, 1, 'Mr. Dane Hirthe II', 'wilbert.tremblay@example.net', '1-276-389-2430', 'HHA4OVN4', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '84.252.2.0', 'Mozilla/5.0 (Windows 98; Win 9x 4.90; nl-NL; rv:1.9.1.20) Gecko/20181130 Firefox/35.0', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(40, 'a11710c9-cce6-4768-a239-503fa6a95217', 7, 1, 'Jena Reynolds', 'grant.adrain@example.net', '+1 (650) 563-6925', '15S6CKCJ', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '118.81.85.249', 'Mozilla/5.0 (X11; Linux x86_64; rv:7.0) Gecko/20131012 Firefox/37.0', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(41, '385e2a7d-5cd1-442d-961c-e0c972712f5b', 7, 1, 'Crystal Erdman', 'umclaughlin@example.org', '+1-269-553-2948', 'IGYKTZZX', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '245.221.211.231', 'Mozilla/5.0 (compatible; MSIE 5.0; Windows 98; Trident/4.1)', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(42, '5dc0a7aa-70d1-4ca6-aa9c-e36dfaa269bf', 7, 1, 'Prof. Marley Hane', 'ikiehn@example.com', '(737) 603-9513', 'BDMF2FIP', NULL, 'redeemed', '2026-08-10 13:54:06', '2026-08-10 08:24:06', 'seed-data', '165.160.148.101', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5330 (KHTML, like Gecko) Chrome/36.0.812.0 Mobile Safari/5330', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(43, '440983bb-150d-4e54-9a4b-f3504ec4baff', 7, 1, 'Prof. Felicia Marks IV', 'mflatley@example.org', '1-830-709-4454', '3JP1IX2N', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '221.83.154.169', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/531.0 (KHTML, like Gecko) Version/15.0 EdgiOS/94.01108.6 Mobile/15E148 Safari/531.0', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(44, '52d3d1f3-ae3a-4507-80f8-86d2a5510295', 8, 1, 'Jerome Leffler', 'brock.corwin@example.net', '307-636-9717', 'R4OMWGDK', NULL, 'redeemed', '2026-08-10 13:54:06', '2026-08-10 08:24:06', 'seed-data', '214.235.198.107', 'Mozilla/5.0 (Windows; U; Windows NT 5.0) AppleWebKit/534.32.3 (KHTML, like Gecko) Version/5.0.1 Safari/534.32.3', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(45, 'a58a316e-947a-483a-b644-dc4fd2192f68', 8, 1, 'Daisy Fahey', 'zieme.rubye@example.net', '1-615-324-4951', 'L796LDY3', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '82.14.184.53', 'Mozilla/5.0 (compatible; MSIE 8.0; Windows CE; Trident/5.1)', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(46, '6a2465e4-9183-462d-aec4-06ea83409a24', 8, 1, 'Ms. Dessie Kassulke V', 'lenna58@example.net', '(207) 564-8107', 'JVNADGVW', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '233.228.167.140', 'Mozilla/5.0 (compatible; MSIE 7.0; Windows CE; Trident/4.0)', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(47, 'a6cf28f4-2e26-48a9-ad78-0ca40b0fcb54', 8, 1, 'Dr. Eleanora Pfannerstill', 'stuart53@example.org', '(573) 887-5798', 'J6YGKXIU', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '101.50.107.57', 'Mozilla/5.0 (Windows CE) AppleWebKit/5341 (KHTML, like Gecko) Chrome/36.0.865.0 Mobile Safari/5341', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(48, '049c39da-2017-4733-951b-79ac6820ae03', 8, 1, 'Darren Mohr', 'fanny38@example.net', '(571) 917-4958', '0DMULHXE', NULL, 'redeemed', '2026-08-10 13:54:06', '2026-08-10 08:24:06', 'seed-data', '169.111.70.110', 'Mozilla/5.0 (compatible; MSIE 7.0; Windows NT 6.2; Trident/5.0)', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(49, '24788990-504c-4307-a130-d2a013b9b944', 9, 1, 'Marvin Hessel Sr.', 'verna37@example.net', '+1-414-959-9346', 'OEJZO0SU', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '124.59.218.13', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5320 (KHTML, like Gecko) Chrome/36.0.890.0 Mobile Safari/5320', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(50, '1930b7eb-f5f9-4b81-85c4-fa1cbda3389a', 9, 1, 'Mr. Lavern Cartwright MD', 'hermann.rodriguez@example.com', '(919) 305-3621', 'GPFONHEG', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '145.91.163.58', 'Mozilla/5.0 (Windows 98; Win 9x 4.90) AppleWebKit/5321 (KHTML, like Gecko) Chrome/36.0.880.0 Mobile Safari/5321', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(51, '8bdffcb3-92fb-4089-9e94-e7df07c6ee8d', 9, 1, 'Mia Veum', 'zbednar@example.com', '+1-605-405-1409', 'XW8WQZ4E', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '45.12.144.177', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_8_3 rv:3.0) Gecko/20140327 Firefox/35.0', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(52, '10f37e6a-c5c2-4501-a67d-78c622023cac', 9, 1, 'Ms. Kirstin Flatley PhD', 'mtremblay@example.net', '+1 (870) 305-4896', 'NA031EQC', NULL, 'redeemed', '2026-08-10 13:54:06', '2026-08-10 08:24:06', 'seed-data', '14.149.62.18', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.0; Trident/4.0)', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(53, 'b24a7b5c-be4c-4c36-a188-923dac6363c1', 9, 1, 'Mr. Jalon Ebert DVM', 'albertha15@example.org', '812.826.0565', 'SQS2Z08I', NULL, 'redeemed', '2026-08-10 13:54:06', '2026-08-10 08:24:06', 'seed-data', '64.148.88.56', 'Mozilla/5.0 (Windows NT 4.0; nl-NL; rv:1.9.0.20) Gecko/20130920 Firefox/37.0', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(54, '306f1e84-376d-4da9-830f-fc677434af80', 9, 1, 'Hilda Spencer', 'vernie75@example.net', '(623) 221-7027', 'TWUPCT3A', NULL, 'claimed', '2026-09-09 08:24:06', NULL, NULL, '209.252.113.51', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_1 rv:6.0; sl-SI) AppleWebKit/535.37.3 (KHTML, like Gecko) Version/5.0 Safari/535.37.3', '2026-08-10 08:24:06', '2026-08-10 08:24:06'),
(55, '0d519d9e-2c26-4ad9-a86f-64dd69b2c41e', 10, 4, 'Angus Wolff I', 'erin27@example.org', '+1-754-827-9181', 'RJZJZMEQ', NULL, 'redeemed', '2026-08-10 13:54:07', '2026-08-10 08:24:07', 'seed-data', '2.207.140.29', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_1 rv:4.0) Gecko/20130120 Firefox/36.0', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(56, '45c4b3c7-f5c3-4602-a6fd-ffd191b26004', 10, 4, 'Casey Wolff', 'qosinski@example.net', '+18388077655', 'UHNZMULX', NULL, 'redeemed', '2026-08-10 13:54:07', '2026-08-10 08:24:07', 'seed-data', '227.161.217.254', 'Mozilla/5.0 (compatible; MSIE 7.0; Windows NT 5.01; Trident/4.0)', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(57, '53ab1b95-9147-45ba-afe4-6c3790ca718b', 10, 4, 'Alexanne Wisozk', 'anissa.cummings@example.org', '+1-240-255-1316', 'CCMXLGUV', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '123.172.54.78', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/531.0 (KHTML, like Gecko) Chrome/90.0.4658.47 Safari/531.0 Edg/90.01142.31', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(58, '503d9215-2d9c-42ba-8ba5-940cf4d476f1', 10, 4, 'Lyda Quigley', 'kristina.metz@example.com', '+1-541-339-1464', '7PZLYQ79', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '62.124.191.146', 'Mozilla/5.0 (Windows; U; Windows NT 5.01) AppleWebKit/535.25.3 (KHTML, like Gecko) Version/5.0.1 Safari/535.25.3', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(59, 'bba48423-7fea-4551-8200-8f8d044ce324', 11, 1, 'London Luettgen', 'nicolas.lockman@example.net', '1-307-273-9441', 'XLIAUA0Q', NULL, 'redeemed', '2026-08-10 13:54:07', '2026-08-10 08:24:07', 'seed-data', '62.187.149.83', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_7) AppleWebKit/5350 (KHTML, like Gecko) Chrome/38.0.872.0 Mobile Safari/5350', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(60, '31dba7b5-56c3-4663-8365-27ab7fa34d1b', 11, 1, 'Miss Maddison Towne II', 'lmiller@example.net', '475.284.9423', 'HLZH9FRV', NULL, 'redeemed', '2026-08-10 13:54:07', '2026-08-10 08:24:07', 'seed-data', '180.88.162.183', 'Mozilla/5.0 (Windows NT 6.2; nl-NL; rv:1.9.1.20) Gecko/20150827 Firefox/36.0', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(61, '95249d3f-9aa8-4ab0-b1dd-94e69c75f768', 11, 1, 'Miss Elinor Will', 'gkilback@example.com', '+18638652241', 'XPLSDETD', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '37.73.118.90', 'Opera/9.71 (X11; Linux x86_64; nl-NL) Presto/2.12.238 Version/10.00', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(62, '677872f7-c017-4b7f-9206-1dfe95077748', 12, 2, 'Payton Heaney', 'jude.dare@example.net', '1-516-208-6365', 'Z8BFZDDY', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '215.227.113.147', 'Mozilla/5.0 (X11; Linux x86_64; rv:6.0) Gecko/20120104 Firefox/37.0', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(63, '0035885f-038a-44a1-bf73-a5a0f053f6b5', 12, 2, 'Rae Wehner', 'adolphus.weimann@example.org', '(463) 429-7403', '1QYYXUFB', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '240.166.92.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/80.0.4434.10 Safari/535.1 EdgA/80.01132.83', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(64, '3380448f-4bc8-4368-a501-343faeacee15', 12, 2, 'Reinhold Haag', 'yadira.prohaska@example.com', '+1.463.382.5994', 'FVV3VKMN', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '38.206.115.31', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_1 like Mac OS X) AppleWebKit/534.2 (KHTML, like Gecko) Version/15.0 EdgiOS/87.01039.86 Mobile/15E148 Safari/534.2', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(65, 'd81545da-91bd-48d4-a6d4-58315a6645c6', 12, 2, 'Preston Feil', 'trantow.colt@example.org', '+16185525693', 'TPHNSJ4H', NULL, 'redeemed', '2026-08-10 13:54:07', '2026-08-10 08:24:07', 'seed-data', '109.102.62.176', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_5_3 rv:4.0; en-US) AppleWebKit/534.5.6 (KHTML, like Gecko) Version/4.0 Safari/534.5.6', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(66, 'ce7dd57a-c514-4563-b9b5-81895d81e3ff', 12, 2, 'Otilia Morissette', 'alison.quigley@example.org', '(513) 934-6515', 'T08IWZWZ', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '77.185.128.122', 'Opera/8.57 (Windows NT 4.0; en-US) Presto/2.11.332 Version/11.00', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(67, '27f2a3fc-cf08-4dc5-8181-746133e3756f', 12, 2, 'Katlyn Veum', 'karolann.metz@example.org', '786.320.5269', 'FAO1EQK1', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '82.14.233.112', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5310 (KHTML, like Gecko) Chrome/39.0.818.0 Mobile Safari/5310', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(68, '3ea0671b-6834-4e88-bf91-5229d6b95f71', 12, 2, 'Gillian Pacocha', 'orlando.hyatt@example.net', '628.423.5548', 'P4C7FTEH', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '46.33.100.87', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_7_7 rv:4.0; en-US) AppleWebKit/535.44.2 (KHTML, like Gecko) Version/5.1 Safari/535.44.2', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(69, '3d0eb0f5-3707-4bcd-bedc-aa835f796545', 12, 2, 'Katelynn Farrell', 'darrel83@example.com', '+1-325-907-0572', 'QZNUEOHZ', NULL, 'redeemed', '2026-08-10 13:54:07', '2026-08-10 08:24:07', 'seed-data', '92.237.51.116', 'Mozilla/5.0 (compatible; MSIE 6.0; Windows CE; Trident/4.1)', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(70, '63afb064-0813-4bc8-adea-50298908a625', 13, 4, 'Prof. Cruz Bechtelar V', 'violette.hickle@example.org', '+1-313-594-8384', 'BDCK0PCM', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '247.168.100.207', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_6_6 rv:5.0; sl-SI) AppleWebKit/532.8.4 (KHTML, like Gecko) Version/5.0.5 Safari/532.8.4', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(71, 'e52c6dbd-a634-4563-b7cf-81bcbb981f4c', 13, 4, 'Dawn Von', 'shegmann@example.org', '(971) 919-5806', 'GVA44EZY', NULL, 'redeemed', '2026-08-10 13:54:07', '2026-08-10 08:24:07', 'seed-data', '150.105.119.208', 'Mozilla/5.0 (compatible; MSIE 7.0; Windows NT 5.01; Trident/5.0)', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(72, '2baa29e6-0516-4f06-9a99-f96a560973e8', 13, 4, 'Mr. Emmitt Cronin MD', 'jast.seamus@example.net', '714.529.7801', 'FW0L6IJI', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '110.34.42.55', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_5_4 rv:2.0) Gecko/20141128 Firefox/35.0', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(73, '4b62b116-6ba3-49a0-8b4e-48bfdf53d83e', 13, 4, 'Mr. Adolfo Morar DDS', 'destin.jakubowski@example.net', '470-700-7797', 'V90PYS5Z', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '121.68.22.120', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_2 like Mac OS X) AppleWebKit/531.0 (KHTML, like Gecko) Version/15.0 EdgiOS/97.01076.69 Mobile/15E148 Safari/531.0', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(74, '366e911e-bc64-4a96-b15b-2eb1776cd75a', 13, 4, 'Miller Considine', 'shayne.stehr@example.net', '938-855-2057', 'TFBRKQ91', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '105.89.244.197', 'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/531.32.3 (KHTML, like Gecko) Version/5.0.2 Safari/531.32.3', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(75, 'b1e6be56-b644-45d6-8d8d-1e77497b02fa', 13, 4, 'Cathy Morar', 'marianne.jacobi@example.com', '678-468-6884', 'S97CLOVK', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '46.196.198.158', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_6_2 rv:3.0) Gecko/20251022 Firefox/36.0', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(76, '376e565e-9bec-4f11-81ad-948e6874be97', 13, 4, 'Adele Daugherty', 'pstark@example.net', '1-929-423-1768', 'RORLMNZO', NULL, 'redeemed', '2026-08-10 13:54:07', '2026-08-10 08:24:07', 'seed-data', '193.25.47.6', 'Mozilla/5.0 (Windows CE; en-US; rv:1.9.1.20) Gecko/20191217 Firefox/36.0', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(77, '34038044-1e1d-4642-a2cc-fb963fb19cae', 14, 3, 'Josefina Kris', 'jrunolfsson@example.net', '+17819191294', 'SDRVFKFI', NULL, 'redeemed', '2026-08-10 13:54:07', '2026-08-10 08:24:07', 'seed-data', '167.36.69.76', 'Mozilla/5.0 (Windows NT 5.1; nl-NL; rv:1.9.1.20) Gecko/20210131 Firefox/36.0', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(78, '7ec60820-bb36-4326-8784-db326c293965', 14, 3, 'Claudie Gleason', 'wconroy@example.org', '+1.443.660.9280', 'SUIFMNAZ', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '65.106.15.54', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_8_4 rv:4.0; nl-NL) AppleWebKit/531.30.2 (KHTML, like Gecko) Version/4.0.2 Safari/531.30.2', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(79, '74eb416d-cbe5-4aae-9446-56df99fb1080', 14, 3, 'Norene Daniel', 'frau@example.net', '985-570-8582', 'JDRJVUJJ', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '6.106.136.140', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/83.0.4763.82 Safari/535.1 EdgA/83.01144.26', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(80, '3a2f7c91-0d13-49b2-a1d9-9f99d4956e07', 14, 3, 'Prof. Abner Balistreri', 'uohara@example.net', '+1.657.247.6261', 'LFUDUYXX', NULL, 'redeemed', '2026-08-10 13:54:07', '2026-08-10 08:24:07', 'seed-data', '95.198.253.243', 'Mozilla/5.0 (Windows CE) AppleWebKit/5361 (KHTML, like Gecko) Chrome/36.0.836.0 Mobile Safari/5361', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(81, '2a3377a7-00b8-4090-9ab9-1214ea8ed243', 14, 3, 'Mr. Zion Padberg IV', 'okon.katlyn@example.org', '385.631.7931', 'MID0AXGW', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '56.203.235.139', 'Mozilla/5.0 (Windows 95) AppleWebKit/537.0 (KHTML, like Gecko) Chrome/86.0.4254.48 Safari/537.0 Edg/86.01137.85', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(82, 'ce64dcd4-fe84-40f1-bd42-97dd090686a2', 14, 3, 'Isaias Dickens', 'ocie.wyman@example.com', '+1-424-532-7654', 'TZ1E3FG7', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '97.72.124.165', 'Mozilla/5.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.1)', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(83, '2dd577af-3380-47c2-8aea-3a1ef80f02c1', 14, 3, 'Prof. Caitlyn Mayer', 'altenwerth.keyshawn@example.com', '608.306.8636', '9OXLKEXE', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '126.176.135.231', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_6_7 rv:3.0; en-US) AppleWebKit/534.15.5 (KHTML, like Gecko) Version/5.1 Safari/534.15.5', '2026-08-10 08:24:07', '2026-08-10 08:24:07'),
(84, '4dc05091-9e89-4fab-b5f8-4082f929dd07', 15, 4, 'Janick Will V', 'edwardo.padberg@example.org', '+1-763-404-9185', 'HYTABGZ6', NULL, 'redeemed', '2026-08-10 13:54:08', '2026-08-10 08:24:08', 'seed-data', '68.252.69.177', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.0 (KHTML, like Gecko) Chrome/95.0.4374.89 Safari/537.0 EdgA/95.01055.18', '2026-08-10 08:24:07', '2026-08-10 08:24:08'),
(85, 'faab2e76-8881-4dcf-9ab0-9de47a26c084', 15, 4, 'Adriel Erdman', 'edna.mraz@example.com', '+12073120413', 'LNX0K5WH', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '88.115.143.32', 'Mozilla/5.0 (compatible; MSIE 5.0; Windows NT 6.1; Trident/5.0)', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(86, 'bd57adf0-462f-44a5-bfa0-566b38a3fdb3', 15, 4, 'Jayce Hirthe', 'heathcote.leif@example.com', '+1 (269) 630-2056', 'PDZ6VG7E', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '84.15.198.5', 'Mozilla/5.0 (compatible; MSIE 6.0; Windows 98; Trident/5.1)', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(87, '2ffca72b-1252-47f0-910d-f7332df0d712', 15, 4, 'Betsy Little', 'wpredovic@example.org', '+1 (574) 623-9959', 'VJDZJF0E', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '122.89.109.57', 'Opera/9.29 (Windows NT 5.2; nl-NL) Presto/2.8.274 Version/10.00', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(88, '05d8befd-eed6-4caa-926b-359f1714a359', 15, 4, 'Stefanie Abernathy', 'ludie78@example.org', '+1-325-703-9335', 'YQ1QCR4T', NULL, 'claimed', '2026-09-09 08:24:07', NULL, NULL, '96.27.98.66', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_5_7 rv:3.0) Gecko/20250419 Firefox/37.0', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(89, 'f62bb73d-ffcc-4c26-b2d4-7a7bbb8409ba', 15, 4, 'Prof. Cassandra Farrell Jr.', 'alittel@example.net', '1-657-248-5466', 'HKHXHEOB', NULL, 'redeemed', '2026-08-10 13:54:08', '2026-08-10 08:24:08', 'seed-data', '228.196.218.219', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_2 like Mac OS X; nl-NL) AppleWebKit/531.20.2 (KHTML, like Gecko) Version/3.0.5 Mobile/8B119 Safari/6531.20.2', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(90, '75ddada4-5721-43c3-9f1f-22205ff79306', 16, 1, 'Mr. Jaycee Lubowitz II', 'zella.sanford@example.net', '231-608-4080', 'PDQMSR9C', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '101.95.56.43', 'Mozilla/5.0 (Windows NT 5.0; en-US; rv:1.9.0.20) Gecko/20180201 Firefox/36.0', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(91, 'ad55d39b-e2a2-485b-b6dd-7e2abbdeff36', 16, 1, 'Elyssa Hegmann I', 'cblick@example.org', '1-870-793-3868', 'V7COLGKT', NULL, 'redeemed', '2026-08-10 13:54:08', '2026-08-10 08:24:08', 'seed-data', '167.242.222.27', 'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/531.10.1 (KHTML, like Gecko) Version/5.0 Safari/531.10.1', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(92, '8bd7d0ca-608f-4130-b52a-58f8930a282f', 16, 1, 'Mario Heidenreich', 'darrel78@example.org', '1-623-456-8880', 'BUSU2KGO', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '185.191.157.81', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_7_3) AppleWebKit/536.1 (KHTML, like Gecko) Chrome/86.0.4135.43 Safari/536.1 Edg/86.01130.67', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(93, 'f8c89b15-ca16-48db-9ca5-ea28503cad90', 16, 1, 'Tremayne Swaniawski', 'cruz.cronin@example.org', '+1.480.386.8956', 'F9JR0HW6', NULL, 'redeemed', '2026-08-10 13:54:08', '2026-08-10 08:24:08', 'seed-data', '38.100.107.140', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/532.0 (KHTML, like Gecko) Chrome/93.0.4309.19 Safari/532.0 Edg/93.01103.68', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(94, '2ee266e9-1275-4535-9da9-68d6b76292b7', 17, 1, 'Maxwell Nikolaus', 'stephany.kris@example.net', '+1 (574) 231-9080', '498JFPVM', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '152.192.56.208', 'Opera/8.99 (Windows NT 5.01; sl-SI) Presto/2.11.279 Version/12.00', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(95, '3a72f70f-fcc7-479a-88d6-9b568d5a33dd', 17, 1, 'Dr. Jacinthe Fritsch IV', 'okovacek@example.net', '+1.678.228.0521', 'UYR2JUAW', NULL, 'redeemed', '2026-08-10 13:54:08', '2026-08-10 08:24:08', 'seed-data', '13.104.68.172', 'Mozilla/5.0 (Windows 98) AppleWebKit/5331 (KHTML, like Gecko) Chrome/37.0.862.0 Mobile Safari/5331', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(96, 'c5bc4234-6ddf-47f4-9f75-a3c3c884958a', 17, 1, 'Gabrielle Hudson', 'lincoln.schmitt@example.net', '+1.423.448.4591', 'FIC1RCTS', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '65.26.174.148', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/5321 (KHTML, like Gecko) Chrome/39.0.804.0 Mobile Safari/5321', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(97, 'fb611e6d-29ab-4079-82dd-32ec46c7fa1c', 17, 1, 'Ms. Romaine VonRueden PhD', 'geo.marvin@example.com', '+1 (320) 449-6002', 'DWHBFCTP', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '107.222.193.190', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_2 like Mac OS X) AppleWebKit/535.0 (KHTML, like Gecko) Version/15.0 EdgiOS/83.01131.64 Mobile/15E148 Safari/535.0', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(98, 'e8ee22c1-71a4-44eb-856a-a3a7e5aad9ef', 17, 1, 'Rozella Terry', 'aurelio.reynolds@example.org', '+1-802-285-7582', 'LHF2HJRF', NULL, 'redeemed', '2026-08-10 13:54:08', '2026-08-10 08:24:08', 'seed-data', '111.142.23.55', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_5_1 rv:6.0) Gecko/20210814 Firefox/37.0', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(99, 'bd18641d-8723-4851-bb57-7e0041fc7c65', 17, 1, 'Mr. Favian Davis', 'wilkinson.darlene@example.com', '612.762.9146', 'CDC7KUBO', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '141.95.33.244', 'Mozilla/5.0 (iPad; CPU OS 8_1_1 like Mac OS X; sl-SI) AppleWebKit/531.48.4 (KHTML, like Gecko) Version/3.0.5 Mobile/8B113 Safari/6531.48.4', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(100, '3abc41a1-7c03-4d39-ad72-212887523abc', 17, 1, 'Anissa Stamm', 'burnice.damore@example.net', '(949) 948-6973', '7OFOAMEM', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '189.117.207.62', 'Opera/9.44 (Windows NT 5.1; en-US) Presto/2.11.300 Version/11.00', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(101, '97f25e6d-9106-4170-83cf-0724bb638c99', 17, 1, 'Prof. Kyleigh McCullough', 'amya.mcclure@example.net', '(540) 445-1560', 'R7Q9D0P4', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '89.105.197.106', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/534.0 (KHTML, like Gecko) Chrome/91.0.4047.31 Safari/534.0 Edg/91.01139.69', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(102, '6227d7be-ea44-45e8-8272-a3a0ecf2c245', 18, 1, 'Mr. Cade Jones', 'kschroeder@example.net', '+13016689841', 'NV0VK6KR', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '250.208.19.145', 'Mozilla/5.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/5.0)', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(103, 'ca18c517-c80f-43bb-bdf3-83e88564c7bb', 18, 1, 'Joy Kuphal', 'angelica44@example.net', '1-971-469-7210', 'DQ3XTMNM', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '24.81.68.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_2 like Mac OS X) AppleWebKit/532.2 (KHTML, like Gecko) Version/15.0 EdgiOS/83.01037.26 Mobile/15E148 Safari/532.2', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(104, 'a20b242c-28ce-46e4-811c-936bd9498d30', 18, 1, 'Eula Stoltenberg V', 'dooley.ashly@example.net', '617.717.1181', 'UZTWRWI9', NULL, 'redeemed', '2026-08-10 13:54:08', '2026-08-10 08:24:08', 'seed-data', '146.99.153.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5311 (KHTML, like Gecko) Chrome/40.0.892.0 Mobile Safari/5311', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(105, '85cfe33a-5ebb-4fec-8baf-65302644711c', 18, 1, 'Miss Karianne Oberbrunner', 'muller.eliza@example.com', '540.241.3341', 'X4PHHDSJ', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '43.230.175.238', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_6_7 rv:3.0) Gecko/20101106 Firefox/36.0', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(106, 'a1817f64-b51f-46e1-8252-5da62075fac2', 18, 1, 'Prof. Korey Morar', 'carolyne66@example.com', '+1 (757) 667-9191', 'PB1GPCNG', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '219.7.235.246', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_7_6) AppleWebKit/5321 (KHTML, like Gecko) Chrome/38.0.840.0 Mobile Safari/5321', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(107, '1b50dd5e-ae29-4b7e-a3c8-384f689b4c4f', 18, 1, 'Jon Daugherty III', 'otha49@example.com', '283.627.3625', '6FYLAF12', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '21.99.83.77', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/5312 (KHTML, like Gecko) Chrome/40.0.889.0 Mobile Safari/5312', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(108, '6f20a6e3-b1e3-41e7-8cd7-83c0a9c6ebd8', 18, 1, 'Yasmeen Conn PhD', 'edwardo.russel@example.com', '769-872-4385', 'QOVHIRL6', NULL, 'redeemed', '2026-08-10 13:54:08', '2026-08-10 08:24:08', 'seed-data', '192.228.119.233', 'Mozilla/5.0 (compatible; MSIE 6.0; Windows CE; Trident/3.0)', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(109, '2fdaaca1-3540-49c7-8605-810f7d1435fa', 18, 1, 'Liana Runolfsson Jr.', 'modesta.stroman@example.net', '1-336-392-3200', '8HTX7PSO', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '7.246.115.88', 'Opera/8.99 (Windows NT 5.2; en-US) Presto/2.12.262 Version/10.00', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(110, 'b82e563f-d2f8-4a72-91d5-029dad4f3c8a', 19, 4, 'Chesley Moen', 'salvatore68@example.net', '1-689-916-0003', 'KSEXIDR3', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '47.50.10.20', 'Opera/9.57 (Windows 98; en-US) Presto/2.12.204 Version/12.00', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(111, '0a94c781-2a6e-4fe7-b1af-b57b28443b2b', 19, 4, 'Curt Feeney', 'wilkinson.jeffery@example.com', '636-800-1284', '9DOZUL50', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '200.17.213.20', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_7_1) AppleWebKit/531.1 (KHTML, like Gecko) Chrome/95.0.4516.88 Safari/531.1 Edg/95.01022.52', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(112, '8b3f3229-30b6-46a0-b3ce-6c1a23d6e080', 19, 4, 'Prof. Paxton Beatty', 'sdoyle@example.com', '+14452254646', 'KZYEXYQX', NULL, 'redeemed', '2026-08-10 13:54:08', '2026-08-10 08:24:08', 'seed-data', '113.51.219.120', 'Mozilla/5.0 (Windows NT 5.1; en-US; rv:1.9.1.20) Gecko/20110226 Firefox/37.0', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(113, '9bd1e552-1b51-44b4-b7c1-a73e5f27f325', 19, 4, 'Jazlyn Weissnat', 'rita33@example.org', '331-634-2906', 'SUMUQNON', NULL, 'redeemed', '2026-08-10 13:54:08', '2026-08-10 08:24:08', 'seed-data', '174.238.251.198', 'Mozilla/5.0 (Windows NT 5.2; sl-SI; rv:1.9.0.20) Gecko/20101101 Firefox/37.0', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(114, '8619cd1f-d16a-4b62-810e-adebae86b923', 19, 4, 'Jocelyn Prosacco IV', 'brown92@example.com', '1-339-559-4764', 'QGKMRAXH', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '2.20.173.64', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5331 (KHTML, like Gecko) Chrome/40.0.811.0 Mobile Safari/5331', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(115, '283384a7-1105-4147-ad62-16f21995b93f', 19, 4, 'Kaleb Kris', 'conner52@example.org', '586.554.3004', 'VIIVHREV', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '240.93.165.12', 'Opera/8.27 (X11; Linux i686; en-US) Presto/2.12.278 Version/12.00', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(116, '02a690b6-142f-482c-8c75-263aa73294a6', 19, 4, 'Nathen Sauer Sr.', 'bartoletti.zane@example.com', '1-814-972-2450', 'JZACJWV6', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '223.145.20.111', 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_1_1 like Mac OS X; nl-NL) AppleWebKit/532.44.1 (KHTML, like Gecko) Version/4.0.5 Mobile/8B113 Safari/6532.44.1', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(117, 'efa8c405-a386-49ea-8230-db03759efd66', 19, 4, 'Alford Walker', 'schinner.maiya@example.org', '610-982-5094', '79OALIZL', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '148.93.244.29', 'Mozilla/5.0 (iPad; CPU OS 7_1_2 like Mac OS X; en-US) AppleWebKit/533.7.4 (KHTML, like Gecko) Version/4.0.5 Mobile/8B118 Safari/6533.7.4', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(118, 'eb8e36a1-708b-43c9-9e8a-d678f1ae0aeb', 20, 2, 'Ila Tremblay', 'xmoore@example.com', '+1-559-316-8760', 'MU9GONDS', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '155.108.103.167', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2 like Mac OS X) AppleWebKit/531.2 (KHTML, like Gecko) Version/15.0 EdgiOS/86.01046.73 Mobile/15E148 Safari/531.2', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(119, '5538f9e9-31d5-438a-b984-2bdacf569697', 20, 2, 'Mrs. Cassidy Dicki', 'kiera45@example.org', '+1-463-487-3598', 'AWJP1MRR', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '107.229.233.123', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/5310 (KHTML, like Gecko) Chrome/37.0.894.0 Mobile Safari/5310', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(120, 'd278e2b6-3eb4-48c4-b37b-5efe3be42d99', 20, 2, 'Dr. Quinton Goodwin IV', 'sipes.emile@example.com', '(916) 212-1327', 'RSGUBML2', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '255.53.156.183', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows 98; Win 9x 4.90; Trident/3.1)', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(121, '69f8396f-7d76-4371-8f1a-0c9b5dbfbbd1', 20, 2, 'Juvenal Huel', 'prosacco.leon@example.net', '931-633-1477', 'DWLT8BQQ', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '243.138.10.229', 'Mozilla/5.0 (Windows 95; nl-NL; rv:1.9.2.20) Gecko/20100110 Firefox/36.0', '2026-08-10 08:24:08', '2026-08-10 08:24:08'),
(122, '37df60ce-44e8-44b8-b9ca-7febb887ad7a', 20, 2, 'Prof. Jazmyn Hudson', 'clementine.witting@example.org', '(920) 623-9081', 'DYHH4PNV', NULL, 'redeemed', '2026-08-10 13:54:09', '2026-08-10 08:24:09', 'seed-data', '234.66.94.199', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows CE; Trident/5.1)', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(123, '41b69493-a797-4f65-abdc-405a204c8b15', 20, 2, 'Jessyca Barton', 'kprosacco@example.net', '425.781.8025', '7FVOCAI0', NULL, 'redeemed', '2026-08-10 13:54:09', '2026-08-10 08:24:09', 'seed-data', '204.127.233.245', 'Mozilla/5.0 (Windows NT 5.01) AppleWebKit/5351 (KHTML, like Gecko) Chrome/36.0.865.0 Mobile Safari/5351', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(124, '74fbe3e5-e79c-487c-a844-431651100758', 20, 2, 'Mrs. Maya Ullrich', 'fredy69@example.com', '(380) 702-1597', 'IFBRM0YZ', NULL, 'claimed', '2026-09-09 08:24:08', NULL, NULL, '36.172.216.75', 'Mozilla/5.0 (compatible; MSIE 5.0; Windows NT 5.1; Trident/4.1)', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(125, 'a45f4a5a-8982-49ed-ae50-ad44fcbe9ab9', 21, 1, 'Sean Koch', 'amya.gutmann@example.com', '1-680-898-6772', 'ZE57VCCV', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '170.140.255.186', 'Opera/9.24 (Windows NT 4.0; sl-SI) Presto/2.12.320 Version/12.00', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(126, '8557504b-952f-4e31-af42-8a9c5e8c9df8', 21, 1, 'Hattie Kertzmann', 'john45@example.com', '947.444.3701', '46LY5GWM', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '206.45.234.50', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_8 rv:6.0; sl-SI) AppleWebKit/531.16.2 (KHTML, like Gecko) Version/5.0.5 Safari/531.16.2', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(127, 'ea998ab4-acfe-4216-9ba0-b1c67ca39758', 21, 1, 'Prof. Hazle Bradtke V', 'dominic.wolf@example.net', '1-251-788-2396', '2ARFAAGQ', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '192.214.137.217', 'Opera/8.87 (X11; Linux i686; nl-NL) Presto/2.12.341 Version/11.00', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(128, '25b03c19-9764-4269-a75c-e10626a22daf', 21, 1, 'Terrell Rice', 'nienow.marcel@example.org', '(731) 857-3092', 'TE9UHAFO', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '204.250.247.81', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_6_2) AppleWebKit/5361 (KHTML, like Gecko) Chrome/40.0.849.0 Mobile Safari/5361', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(129, '8b8f9a64-2279-4b58-93da-68b7a83f2779', 21, 1, 'Ms. Brenna Lindgren DVM', 'tyrique.ryan@example.net', '1-781-877-8681', 'MSBZPQBS', NULL, 'redeemed', '2026-08-10 13:54:09', '2026-08-10 08:24:09', 'seed-data', '248.89.181.65', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_8_8 rv:2.0) Gecko/20101228 Firefox/37.0', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(130, '4963a094-0444-4fef-b822-6042aa9ada42', 21, 1, 'Dr. Aurelia Parisian I', 'toney.conn@example.com', '+1.986.805.4025', 'JNYAZBU9', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '103.148.22.0', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_8_4 rv:5.0; sl-SI) AppleWebKit/534.44.6 (KHTML, like Gecko) Version/4.0.1 Safari/534.44.6', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(131, 'cdde5f01-2a2a-4e08-8274-20824b032844', 21, 1, 'Mathias Rowe', 'krussel@example.org', '+1-442-395-0816', 'AOCJ7ZRX', NULL, 'redeemed', '2026-08-10 13:54:09', '2026-08-10 08:24:09', 'seed-data', '217.159.24.39', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_2 like Mac OS X) AppleWebKit/532.2 (KHTML, like Gecko) Version/15.0 EdgiOS/95.01101.58 Mobile/15E148 Safari/532.2', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(132, 'f421d663-cf38-4961-ae67-f0592157ec17', 21, 1, 'Mrs. Oceane Kovacek', 'bradley13@example.net', '317-756-5728', '3U4N01W3', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '73.63.195.14', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2 like Mac OS X) AppleWebKit/532.1 (KHTML, like Gecko) Version/15.0 EdgiOS/87.01115.15 Mobile/15E148 Safari/532.1', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(133, '6bc7fed1-138f-4937-94a3-de17debe2bf7', 22, 4, 'Carley Kerluke', 'xhills@example.org', '281.475.8011', '3UY6C3DS', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '63.180.40.36', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_2 like Mac OS X) AppleWebKit/535.2 (KHTML, like Gecko) Version/15.0 EdgiOS/87.01066.9 Mobile/15E148 Safari/535.2', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(134, '33ef0bbe-d936-4ebb-b8d0-fc2325685062', 22, 4, 'Aliyah Braun', 'chill@example.net', '+1 (347) 855-7815', 'V9OC8JXF', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '102.59.10.157', 'Mozilla/5.0 (Windows; U; Windows NT 5.01) AppleWebKit/535.25.6 (KHTML, like Gecko) Version/4.1 Safari/535.25.6', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(135, '3429c60f-a27f-4684-87ef-fea5f850d0f3', 22, 4, 'Ethelyn Lueilwitz', 'zsipes@example.net', '815-655-3312', '1RV1TEQD', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '44.202.112.37', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/531.2 (KHTML, like Gecko) Chrome/88.0.4476.18 Safari/531.2 EdgA/88.01021.75', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(136, 'ae582173-3b4b-4606-8856-2062dbe6b9ee', 22, 4, 'Ivah Osinski', 'javonte.gorczany@example.com', '773-641-8314', 'SIVMBF6L', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '175.58.227.159', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/5320 (KHTML, like Gecko) Chrome/40.0.824.0 Mobile Safari/5320', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(137, '9c6dc07f-e1f6-443d-b085-4e314c7f8e54', 22, 4, 'Finn Jakubowski', 'nwintheiser@example.com', '+1-740-273-1801', 'ZLNTQFAS', NULL, 'redeemed', '2026-08-10 13:54:09', '2026-08-10 08:24:09', 'seed-data', '78.254.61.29', 'Mozilla/5.0 (iPad; CPU OS 7_1_2 like Mac OS X; en-US) AppleWebKit/535.41.3 (KHTML, like Gecko) Version/3.0.5 Mobile/8B115 Safari/6535.41.3', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(138, 'b6b4f88a-ca1c-427b-a213-700c95206d03', 22, 4, 'Mike Kreiger', 'cswaniawski@example.org', '762.493.8328', 'FPYWKQS2', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '194.254.235.180', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_8_4 rv:3.0) Gecko/20210714 Firefox/37.0', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(139, '1204bfdc-a727-4c36-9838-8b6670aa015a', 22, 4, 'Mr. Eliezer Runolfsson', 'kris.alisha@example.org', '+1-606-614-2155', 'C5F3BHK0', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '22.86.9.41', 'Mozilla/5.0 (Windows; U; Windows NT 5.0) AppleWebKit/532.43.6 (KHTML, like Gecko) Version/5.0.1 Safari/532.43.6', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(140, 'fcfd2335-43a4-4514-8948-9d9c10666970', 22, 4, 'Dr. Seamus Lubowitz', 'stefanie.fritsch@example.net', '+15732777467', 'YRTBEMDH', NULL, 'claimed', '2026-09-09 08:24:09', NULL, NULL, '87.242.149.254', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_7_0 rv:6.0; sl-SI) AppleWebKit/531.22.6 (KHTML, like Gecko) Version/4.0 Safari/531.22.6', '2026-08-10 08:24:09', '2026-08-10 08:24:09'),
(141, 'aa293e11-6c83-4cea-be4d-5ff6ee75fb30', 22, 4, 'Isadore McGlynn', 'qkrajcik@example.net', '+1-214-684-7710', 'E6DIZFTB', NULL, 'redeemed', '2026-08-10 13:54:09', '2026-08-10 08:24:09', 'seed-data', '154.150.206.58', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5360 (KHTML, like Gecko) Chrome/36.0.827.0 Mobile Safari/5360', '2026-08-10 08:24:09', '2026-08-10 08:24:09');
INSERT INTO `claims` (`id`, `uuid`, `offer_id`, `screen_id`, `name`, `email`, `phone`, `coupon_code`, `qr_code_path`, `status`, `expires_at`, `redeemed_at`, `redeemed_by`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(142, '3bc40f52-083a-4511-8067-ece1c511e6ed', 23, 4, 'Ms. Heather Kunde', 'skemmer@example.org', '510-519-8637', 'DQUOLPNG', NULL, 'redeemed', '2026-08-10 13:54:10', '2026-08-10 08:24:10', 'seed-data', '215.143.210.134', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_5_9) AppleWebKit/5330 (KHTML, like Gecko) Chrome/38.0.864.0 Mobile Safari/5330', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(143, 'ac67fbf8-66ce-4a9e-9dbb-7a7f1c4ef2cf', 23, 4, 'Cora Bailey', 'mcglynn.roselyn@example.org', '+16089551412', 'EGDWZ4EG', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '247.53.1.103', 'Mozilla/5.0 (Windows CE) AppleWebKit/5351 (KHTML, like Gecko) Chrome/40.0.833.0 Mobile Safari/5351', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(144, '74362143-8bc2-4099-836c-05f6cc68debf', 23, 4, 'Donald Kulas', 'pcollins@example.net', '+1-432-482-4324', 'KUPS57FZ', NULL, 'redeemed', '2026-08-10 13:54:10', '2026-08-10 08:24:10', 'seed-data', '20.151.33.252', 'Opera/9.51 (Windows 98; Win 9x 4.90; en-US) Presto/2.9.227 Version/10.00', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(145, '5c36e9c2-2539-4de2-9209-8e60621a208e', 23, 4, 'Eli Russel III', 'champlin.dorcas@example.net', '(360) 370-4117', 'R5TSB0VH', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '84.23.220.120', 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_1_2 like Mac OS X; sl-SI) AppleWebKit/531.8.1 (KHTML, like Gecko) Version/4.0.5 Mobile/8B113 Safari/6531.8.1', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(146, 'd79c0240-a107-4c61-9e31-e8bbcb727942', 24, 1, 'Prof. Margaretta Waters Sr.', 'xhand@example.org', '+1-480-921-4964', '0F4PEIT4', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '138.160.162.182', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.2; Trident/3.0)', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(147, '1b4a275b-ef5c-462d-a029-ba2139eaa118', 24, 1, 'Miguel Herzog', 'angie53@example.org', '707-936-4024', '4ES8HMR7', NULL, 'redeemed', '2026-08-10 13:54:10', '2026-08-10 08:24:10', 'seed-data', '117.28.113.165', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_0 rv:2.0; nl-NL) AppleWebKit/531.35.1 (KHTML, like Gecko) Version/5.0 Safari/531.35.1', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(148, '0d385156-3b80-4c09-8995-f6f322b759d8', 24, 1, 'Ms. Gwendolyn Muller Sr.', 'hhauck@example.org', '+1-337-687-1443', '3FYZRVAH', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '180.41.217.88', 'Opera/9.25 (Windows NT 5.01; sl-SI) Presto/2.10.219 Version/10.00', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(149, '43791475-3bc5-4fc1-94ca-b1c9387fe041', 24, 1, 'Cecelia Effertz DDS', 'mertie65@example.org', '954-852-4847', 'OBJ1QBFH', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '112.166.188.80', 'Mozilla/5.0 (Windows NT 5.0) AppleWebKit/5362 (KHTML, like Gecko) Chrome/38.0.825.0 Mobile Safari/5362', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(150, '5f532cb8-4b77-4563-82ab-fe35b1013736', 24, 1, 'Jaiden Metz', 'shand@example.net', '+1-908-265-1441', 'JOUHRVEX', NULL, 'redeemed', '2026-08-10 13:54:10', '2026-08-10 08:24:10', 'seed-data', '178.84.60.27', 'Mozilla/5.0 (compatible; MSIE 5.0; Windows NT 4.0; Trident/5.0)', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(151, 'f0d55c62-0bae-44d4-b457-1f2024f3f7f1', 25, 1, 'Dejah Tromp', 'will.leif@example.com', '(949) 430-4893', 'QP8DOKKZ', NULL, 'redeemed', '2026-08-10 13:54:10', '2026-08-10 08:24:10', 'seed-data', '56.243.163.186', 'Mozilla/5.0 (Windows NT 5.01) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/82.0.4116.50 Safari/535.1 Edg/82.01066.30', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(152, '1fd36e51-cef4-4cc9-91ab-1ecba5f1ff5c', 25, 1, 'Joshuah Koepp', 'xnolan@example.org', '+1-929-534-7823', 'TI8ENBNP', NULL, 'redeemed', '2026-08-10 13:54:10', '2026-08-10 08:24:10', 'seed-data', '239.220.159.11', 'Opera/9.71 (Windows NT 5.2; en-US) Presto/2.8.191 Version/10.00', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(153, 'f3a3e6c7-9cb4-46a6-8598-eed9105997e1', 25, 1, 'Hulda Skiles', 'charlie.runte@example.com', '1-724-815-5273', 'SP6MKVN6', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '142.7.249.221', 'Mozilla/5.0 (compatible; MSIE 11.0; Windows 95; Trident/3.1)', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(154, '99651d6d-49ef-4c4d-b120-0286d11fc0bc', 25, 1, 'Thelma Raynor III', 'fwhite@example.org', '(757) 907-2815', 'RG4HBGNI', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '116.101.84.172', 'Opera/9.53 (Windows NT 6.0; sl-SI) Presto/2.11.295 Version/10.00', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(155, 'f57ab313-f11a-4823-9201-2b2599e21f48', 25, 1, 'Garth Moore Jr.', 'claire.bergnaum@example.org', '256.649.8659', 'UO5QDBOT', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '90.59.169.151', 'Opera/8.23 (Windows NT 5.0; nl-NL) Presto/2.8.280 Version/11.00', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(156, 'ad832b66-c633-4252-b3aa-9ff169c2e426', 25, 1, 'Miss Dina Bartell II', 'langworth.gardner@example.net', '+1 (828) 681-4283', 'ZY55V2XY', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '224.254.181.217', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 4.0; Trident/3.1)', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(157, '01ed0f30-bd71-4bd0-88e4-7a59ca7bb168', 25, 1, 'Cathryn Weissnat', 'hortense13@example.org', '585.570.5778', 'USJJBFX3', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '240.188.227.116', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_3 rv:5.0; en-US) AppleWebKit/531.34.2 (KHTML, like Gecko) Version/5.0.1 Safari/531.34.2', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(158, '82fedcf2-19a0-4ac9-84b1-4b635fc4060a', 26, 2, 'Breanne Beahan II', 'jerome40@example.com', '934.902.1545', 'KFTZKGYN', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '77.74.23.92', 'Mozilla/5.0 (compatible; MSIE 5.0; Windows NT 5.2; Trident/4.1)', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(159, 'a5978c35-c7fb-44af-b05a-ad26700fc34e', 26, 2, 'Kavon Ondricka', 'wolf.edward@example.org', '806-247-3580', '4VYYBZY4', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '159.35.193.152', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows 98; Win 9x 4.90; Trident/3.1)', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(160, '941e9c26-f004-480d-930f-e14f35a7db94', 26, 2, 'Nicholas Langworth', 'aiden.bergstrom@example.com', '845-950-6953', 'OELKT0IO', NULL, 'redeemed', '2026-08-10 13:54:10', '2026-08-10 08:24:10', 'seed-data', '23.102.62.36', 'Mozilla/5.0 (iPad; CPU OS 7_2_2 like Mac OS X; nl-NL) AppleWebKit/535.31.2 (KHTML, like Gecko) Version/3.0.5 Mobile/8B118 Safari/6535.31.2', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(161, '3003b301-d56c-4626-8ef7-4f99356ee57e', 26, 2, 'Penelope Reilly', 'laila45@example.com', '1-424-953-9162', '1FCTEI2R', NULL, 'redeemed', '2026-08-10 13:54:10', '2026-08-10 08:24:10', 'seed-data', '132.204.126.36', 'Mozilla/5.0 (Windows; U; Windows 98; Win 9x 4.90) AppleWebKit/531.9.5 (KHTML, like Gecko) Version/4.1 Safari/531.9.5', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(162, '6b805975-b77f-4787-b8dd-b797fbc79d35', 26, 2, 'Prof. Reid Price', 'clifton.kling@example.net', '346.277.2691', 'KGGYFAS6', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '147.199.70.31', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5312 (KHTML, like Gecko) Chrome/40.0.856.0 Mobile Safari/5312', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(163, '0680b3ed-8dac-4658-9c94-bab861dd2330', 26, 2, 'Trudie Schowalter V', 'ashlynn.daniel@example.com', '949.892.7683', 'SYPS8DNR', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '17.57.111.55', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_5_6 rv:4.0) Gecko/20160818 Firefox/36.0', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(164, '343cd2c1-88b6-47e2-9abf-6859573fadb6', 26, 2, 'Margaret Bahringer', 'donna34@example.net', '+1-551-685-4329', '8AN3UMG0', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '146.116.84.4', 'Mozilla/5.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/5.1)', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(165, 'c121e6b4-9901-425b-b90c-d83ab33361d2', 26, 2, 'George Reinger II', 'sabrina49@example.org', '+17858940528', 'VANFFTV1', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '157.49.21.235', 'Mozilla/5.0 (compatible; MSIE 11.0; Windows 98; Win 9x 4.90; Trident/5.1)', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(166, '5ef4d743-08f3-4b9c-835e-b4d914b4345f', 26, 2, 'Unique Cremin', 'santa.hirthe@example.org', '(810) 831-4483', 'QY14FSGG', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '28.44.58.225', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_1 like Mac OS X) AppleWebKit/535.1 (KHTML, like Gecko) Version/15.0 EdgiOS/82.01063.1 Mobile/15E148 Safari/535.1', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(167, 'fd7621c5-be94-4a06-917c-510e5926aa6a', 27, 1, 'Romaine Hoppe III', 'camren46@example.org', '1-276-213-0438', '6IVG0FAE', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '143.252.24.8', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/90.0.4660.46 Safari/535.1 EdgA/90.01091.85', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(168, '80f05570-4f07-4e29-9381-ab5e51712790', 27, 1, 'Mr. Domenic Littel MD', 'vheathcote@example.net', '1-219-647-8191', '84EJYDA2', NULL, 'redeemed', '2026-08-10 13:54:10', '2026-08-10 08:24:10', 'seed-data', '67.110.237.135', 'Opera/9.66 (X11; Linux x86_64; sl-SI) Presto/2.9.293 Version/12.00', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(169, '155f7908-5a81-47ff-a9de-6f9bc843ba6e', 27, 1, 'Reyna Jerde Jr.', 'mitchell.lizzie@example.org', '925-671-3164', '8JEOLIBS', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '160.60.66.122', 'Mozilla/5.0 (iPad; CPU OS 8_2_2 like Mac OS X; nl-NL) AppleWebKit/535.16.2 (KHTML, like Gecko) Version/3.0.5 Mobile/8B111 Safari/6535.16.2', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(170, 'd523022f-f2f2-49a0-beb8-1cbc77a9deb8', 27, 1, 'Yazmin McCullough', 'pklocko@example.com', '+1-602-725-3019', 'WPNAU7JU', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '205.111.254.25', 'Mozilla/5.0 (compatible; MSIE 6.0; Windows NT 4.0; Trident/3.1)', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(171, 'c06b836b-4922-462f-852e-2c49b74ac2b1', 27, 1, 'Dr. Rosemary Denesik DVM', 'hkub@example.com', '480.882.5588', 'EATSHNQV', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '156.167.29.82', 'Mozilla/5.0 (X11; Linux x86_64; rv:7.0) Gecko/20231016 Firefox/36.0', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(172, '579aac0d-e524-4ee1-81af-0866c67d0236', 27, 1, 'Prof. Alec Grimes MD', 'rachael86@example.net', '832-439-3847', 'N0CHIHK9', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '32.25.221.171', 'Mozilla/5.0 (compatible; MSIE 5.0; Windows 95; Trident/3.1)', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(173, '3e3f42cf-b5fe-4d20-b098-6351b192a8f7', 27, 1, 'Dusty Stroman MD', 'mcassin@example.org', '+1-520-274-3627', 'THJOBIZ8', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '73.243.26.188', 'Opera/9.43 (X11; Linux x86_64; nl-NL) Presto/2.12.347 Version/12.00', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(174, '1c185ae1-fe44-4bc2-8436-6e59fd958d52', 27, 1, 'Tavares Corwin', 'max52@example.org', '208-665-2234', '6EPVTWN5', NULL, 'redeemed', '2026-08-10 13:54:10', '2026-08-10 08:24:10', 'seed-data', '228.182.121.26', 'Opera/9.18 (Windows NT 5.1; sl-SI) Presto/2.10.313 Version/12.00', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(175, 'd4b89499-8594-47e6-b611-4758773c096e', 28, 1, 'Blaise Wisoky', 'autumn00@example.net', '(534) 247-6032', 'UPWAAQHT', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '225.215.91.187', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_2_2 like Mac OS X; en-US) AppleWebKit/533.38.6 (KHTML, like Gecko) Version/4.0.5 Mobile/8B116 Safari/6533.38.6', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(176, '88a4e8fb-adf5-4dc9-ac45-efffb94ac996', 28, 1, 'Mr. Tyree Robel MD', 'francesco.kunde@example.com', '+14019197171', 'AW88ES7A', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '153.145.114.78', 'Opera/8.22 (Windows CE; sl-SI) Presto/2.8.271 Version/10.00', '2026-08-10 08:24:10', '2026-08-10 08:24:10'),
(177, 'da31eaab-4d27-43d1-9c62-7cf478d2330c', 28, 1, 'Delia Mann', 'trath@example.org', '1-260-448-0699', 'LINEYDY4', NULL, 'redeemed', '2026-08-10 13:54:11', '2026-08-10 08:24:11', 'seed-data', '7.141.86.108', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/5342 (KHTML, like Gecko) Chrome/37.0.865.0 Mobile Safari/5342', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(178, 'e6772f7b-2e46-4eeb-b09d-2acf2f5803c9', 28, 1, 'Miss Sarah Corkery PhD', 'zoie.fisher@example.com', '959.324.2202', 'B2REIXGC', NULL, 'redeemed', '2026-08-10 13:54:11', '2026-08-10 08:24:11', 'seed-data', '41.162.214.234', 'Mozilla/5.0 (compatible; MSIE 11.0; Windows NT 5.0; Trident/3.1)', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(179, 'b39276f0-6aab-4c97-ac32-2ba9ed6394ee', 28, 1, 'Rodger Robel', 'ashleigh12@example.com', '+1 (678) 558-9936', 'MWEPAPLR', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '19.116.243.162', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_5_6) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/87.0.4048.20 Safari/537.2 Edg/87.01062.54', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(180, '45d69e8c-ed56-46a1-bfa9-d186dc5e26f3', 28, 1, 'Valentin Rempel', 'emmie11@example.com', '+1-220-856-1338', '1JQ2DPPX', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '120.189.12.93', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_7_0 rv:3.0) Gecko/20181118 Firefox/36.0', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(181, 'b64663ea-d4fd-41b3-97ba-911d873aec1f', 28, 1, 'Prof. Cedrick Wolff', 'susie84@example.net', '854.476.1712', 'Q98X5VIA', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '48.195.126.219', 'Mozilla/5.0 (iPad; CPU OS 8_1_1 like Mac OS X; en-US) AppleWebKit/535.11.1 (KHTML, like Gecko) Version/4.0.5 Mobile/8B114 Safari/6535.11.1', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(182, '8e812620-01f1-4541-9e7c-5856b68ff7c2', 28, 1, 'Mr. Hipolito Abshire II', 'kenton.skiles@example.net', '737-991-2310', 'V099E1HK', NULL, 'claimed', '2026-09-09 08:24:10', NULL, NULL, '168.36.6.53', 'Opera/9.66 (Windows 98; Win 9x 4.90; en-US) Presto/2.8.343 Version/12.00', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(183, '31afd2cf-baae-4dac-b574-645041de7235', 29, 2, 'Joannie Parker', 'zackery73@example.org', '971-506-1875', 'KYVXUVU3', NULL, 'redeemed', '2026-08-10 13:54:11', '2026-08-10 08:24:11', 'seed-data', '46.95.217.144', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_8_2) AppleWebKit/5352 (KHTML, like Gecko) Chrome/38.0.898.0 Mobile Safari/5352', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(184, 'db1736a8-7272-4f46-9f63-f48d3dbefc40', 29, 2, 'Mr. Moshe Fadel', 'torphy.kelli@example.com', '1-843-518-3531', 'GUGARVZ1', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '149.117.134.81', 'Opera/8.91 (X11; Linux x86_64; en-US) Presto/2.9.254 Version/10.00', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(185, 'f032af96-e0a8-4919-82ab-bbf325eebe92', 29, 2, 'Ferne Ullrich', 'schneider.nelle@example.net', '+15415642493', 'HCLM7EYA', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '90.195.143.77', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_6_9 rv:4.0; nl-NL) AppleWebKit/535.1.5 (KHTML, like Gecko) Version/4.0.2 Safari/535.1.5', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(186, 'd765cf13-6516-4a6a-93d9-59a7cb462c77', 29, 2, 'Adrien Bins', 'tatyana.hermann@example.net', '(561) 788-8042', '8VK054VT', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '69.175.116.2', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.2; Trident/3.0)', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(187, '566bbf4e-5fc0-40e6-8163-961cbd1d31a0', 29, 2, 'Keven Roob', 'zokeefe@example.com', '1-272-884-1915', 'VXJE95WK', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '173.199.221.139', 'Mozilla/5.0 (Windows; U; Windows NT 5.0) AppleWebKit/531.9.3 (KHTML, like Gecko) Version/5.1 Safari/531.9.3', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(188, '361cf084-09df-4d93-aed8-244ab855e945', 29, 2, 'Nicola Hermann', 'drussel@example.org', '+1 (240) 746-7771', 'V4G816EO', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '51.104.32.211', 'Opera/9.68 (Windows NT 5.2; sl-SI) Presto/2.8.195 Version/11.00', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(189, 'ce4f8dee-70aa-480d-afa8-e9c523023b08', 29, 2, 'Ms. Joanny Romaguera', 'adaline74@example.com', '1-231-551-5106', 'FUOUWF3D', NULL, 'redeemed', '2026-08-10 13:54:11', '2026-08-10 08:24:11', 'seed-data', '4.85.207.255', 'Mozilla/5.0 (iPad; CPU OS 8_2_2 like Mac OS X; nl-NL) AppleWebKit/534.30.7 (KHTML, like Gecko) Version/4.0.5 Mobile/8B115 Safari/6534.30.7', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(190, '77ec57c4-731b-41e6-8bcc-1d3c0e91b60d', 29, 2, 'Lora Hayes', 'angeline51@example.net', '+1 (952) 835-6480', 'VBRIXN6W', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '145.196.88.141', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_0 like Mac OS X) AppleWebKit/534.2 (KHTML, like Gecko) Version/15.0 EdgiOS/81.01069.30 Mobile/15E148 Safari/534.2', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(191, '86f43884-fc39-4478-82f5-28fb68f5d141', 29, 2, 'Garland Rosenbaum', 'chandler.wunsch@example.com', '424-485-2943', 'F2JSEAZP', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '145.70.89.138', 'Mozilla/5.0 (X11; Linux i686; rv:5.0) Gecko/20160608 Firefox/36.0', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(192, '312e15ad-d212-4f41-835f-17357db2b6db', 30, 1, 'Adrienne Schumm', 'ciara.macejkovic@example.org', '+1 (423) 817-3766', 'XXWYGYSE', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '183.239.12.216', 'Mozilla/5.0 (Windows NT 6.1; en-US; rv:1.9.1.20) Gecko/20130704 Firefox/37.0', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(193, '60a410a1-b80c-4f80-9407-3000ad2a372e', 30, 1, 'Larissa Kutch', 'cbednar@example.net', '+1-914-963-8260', '9MXRQRUM', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '144.19.114.198', 'Mozilla/5.0 (compatible; MSIE 5.0; Windows 98; Trident/3.1)', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(194, '0a939385-bcf5-4003-aafb-8f39208453ec', 30, 1, 'Miguel Champlin', 'bmorar@example.com', '+1.310.278.8604', 'NQCEYPVH', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '213.10.47.20', 'Mozilla/5.0 (compatible; MSIE 5.0; Windows NT 6.1; Trident/4.1)', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(195, '4d346144-9baa-467b-9e0d-52ffc4e0066b', 30, 1, 'Michele Mohr', 'fshields@example.org', '1-831-993-5945', 'G4ALD0YG', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '22.230.118.117', 'Mozilla/5.0 (iPad; CPU OS 7_2_1 like Mac OS X; nl-NL) AppleWebKit/532.11.6 (KHTML, like Gecko) Version/3.0.5 Mobile/8B115 Safari/6532.11.6', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(196, '9807e721-00f5-4887-ab74-7a4fbdd5b1fe', 30, 1, 'Lourdes Considine', 'wilson.jenkins@example.com', '+1-623-313-7683', '2I9J1QI5', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '130.152.5.45', 'Mozilla/5.0 (Windows NT 5.0) AppleWebKit/5322 (KHTML, like Gecko) Chrome/38.0.817.0 Mobile Safari/5322', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(197, '14ea5d36-289a-4899-9acc-fad692854d49', 30, 1, 'Carrie Haley', 'tressa27@example.net', '510.492.0815', '8HOQ4AW0', NULL, 'redeemed', '2026-08-10 13:54:11', '2026-08-10 08:24:11', 'seed-data', '121.120.97.5', 'Mozilla/5.0 (Windows; U; Windows NT 5.0) AppleWebKit/532.10.2 (KHTML, like Gecko) Version/4.1 Safari/532.10.2', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(198, 'dfc6714f-f521-4ea3-ae65-8b6c1ff68d43', 30, 1, 'Dr. Norberto Douglas V', 'aleannon@example.net', '+1-667-671-8962', 'FTJPQPSS', NULL, 'redeemed', '2026-08-10 13:54:11', '2026-08-10 08:24:11', 'seed-data', '208.83.50.12', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_0 like Mac OS X) AppleWebKit/537.0 (KHTML, like Gecko) Version/15.0 EdgiOS/98.01140.29 Mobile/15E148 Safari/537.0', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(199, 'f1f9e03c-a563-47c4-a7d3-1c8f2b095ce7', 30, 1, 'Aiyana McDermott', 'chloe76@example.com', '+1 (707) 417-2381', '8ZKSVIU1', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '232.124.157.254', 'Opera/8.60 (X11; Linux i686; en-US) Presto/2.12.198 Version/10.00', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(200, '16e06ca5-9951-4e03-b0a7-1a82ac51255c', 30, 1, 'Kallie Runolfsson', 'freddy.macejkovic@example.net', '321.462.6085', 'CJGKV1EM', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '241.138.119.6', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_0) AppleWebKit/5340 (KHTML, like Gecko) Chrome/37.0.828.0 Mobile Safari/5340', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(201, '097653e7-e50d-423a-b551-e9742a039e3c', 31, 4, 'Hanna Lowe', 'raleigh38@example.com', '1-862-700-0149', 'RZDTO6KH', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '190.82.93.26', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_8_1) AppleWebKit/5310 (KHTML, like Gecko) Chrome/40.0.832.0 Mobile Safari/5310', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(202, '426c11d5-6481-4053-a924-f7d4fb885074', 31, 4, 'Neva Koelpin', 'lisandro64@example.org', '+1 (510) 352-0520', 'MLI7EDRW', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '29.243.244.44', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/532.2 (KHTML, like Gecko) Chrome/91.0.4582.91 Safari/532.2 EdgA/91.01030.41', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(203, 'd4347a47-77fa-4295-9719-721bceef844c', 31, 4, 'Trystan Streich', 'veum.ellen@example.net', '(239) 788-3388', 'ZOMVB8A7', NULL, 'redeemed', '2026-08-10 13:54:11', '2026-08-10 08:24:11', 'seed-data', '215.168.25.192', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/531.0 (KHTML, like Gecko) Version/15.0 EdgiOS/99.01116.10 Mobile/15E148 Safari/531.0', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(204, 'e9761364-5cf2-4b96-b098-b8aae11d170c', 31, 4, 'Dr. Megane Kuhic', 'adella.gerhold@example.net', '(979) 341-1191', 'MARGC6PF', NULL, 'redeemed', '2026-08-10 13:54:11', '2026-08-10 08:24:11', 'seed-data', '78.5.70.69', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5321 (KHTML, like Gecko) Chrome/37.0.814.0 Mobile Safari/5321', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(205, '963c23fd-dcc6-46fc-9cec-d2ec83c4f6b3', 31, 4, 'Rosemary Waters III', 'lisandro64@example.net', '(214) 932-6224', 'MTXUTXB6', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '127.186.228.155', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/5342 (KHTML, like Gecko) Chrome/38.0.869.0 Mobile Safari/5342', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(206, '4f7e92e9-78dc-4c50-b639-e31b05ecc51a', 32, 4, 'Mrs. Katlyn Mills', 'lueilwitz.tyrell@example.org', '+1 (830) 684-7972', '8YE9DMAJ', NULL, 'redeemed', '2026-08-10 13:54:12', '2026-08-10 08:24:12', 'seed-data', '19.153.252.33', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/536.0 (KHTML, like Gecko) Chrome/95.0.4451.95 Safari/536.0 EdgA/95.01092.9', '2026-08-10 08:24:11', '2026-08-10 08:24:12'),
(207, '6a99cb86-64a5-4566-9dce-708bc826e9da', 32, 4, 'Xavier Klein', 'marta.halvorson@example.net', '+1-539-232-4933', '2HZARYQN', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '20.163.100.69', 'Opera/9.22 (X11; Linux x86_64; en-US) Presto/2.11.260 Version/11.00', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(208, '664200d0-c122-4048-80ed-9d0b6e5b73f1', 32, 4, 'Roosevelt Paucek', 'vanessa98@example.org', '+1-575-904-9215', 'QY8ZGWSK', NULL, 'claimed', '2026-09-09 08:24:11', NULL, NULL, '3.5.38.87', 'Mozilla/5.0 (Windows; U; Windows NT 4.0) AppleWebKit/534.36.5 (KHTML, like Gecko) Version/5.0.1 Safari/534.36.5', '2026-08-10 08:24:11', '2026-08-10 08:24:11'),
(209, '7d1bfed0-35af-434f-91c2-772fe76acbe0', 32, 4, 'Dr. Jennifer Waters IV', 'ekoepp@example.org', '+1-413-535-0488', '6WFU9NXE', NULL, 'redeemed', '2026-08-10 13:54:12', '2026-08-10 08:24:12', 'seed-data', '161.85.20.170', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_2 like Mac OS X) AppleWebKit/532.2 (KHTML, like Gecko) Version/15.0 EdgiOS/94.01019.7 Mobile/15E148 Safari/532.2', '2026-08-10 08:24:11', '2026-08-10 08:24:12'),
(210, '57a9f853-43cf-419c-ac6a-856a9cc1952d', 21, NULL, 'Tirtha Pratim Purakayastha', 'tirthabig0@gmail.com', NULL, 'XSHSQ4CJ', 'qrcodes/xshsq4cj-ykDn1f.svg', 'claimed', '2026-09-12 20:04:55', NULL, NULL, '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:04:55', '2026-08-13 20:04:55'),
(211, 'd26332dd-fa44-4874-a171-dd4be19bec7f', 33, NULL, 'Tirtha Pratim Purakayastha', 'tirthabig0@gmail.com', NULL, '86QX5FWP', 'qrcodes/86qx5fwp-YDIQ9a.svg', 'claimed', '2026-09-12 20:15:17', NULL, NULL, '2409:4091:33:8a11:35ef:9421:60ed:5f03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 20:15:17', '2026-08-13 20:15:17'),
(212, '9b468235-ab86-4b2b-a25e-be91aa9e0770', 25, NULL, 'Tirtha Pratim Purakayastha', 'tirthabig0@gmail.com', NULL, 'NX8Y8WT3', 'qrcodes/nx8y8wt3-afgLvH.svg', 'claimed', '2026-09-12 21:02:56', NULL, NULL, '2409:4091:33:8a11:6daa:ce05:baa:4313', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-13 21:02:56', '2026-08-13 21:02:56'),
(215, '29efca3e-732b-4a3a-911b-6c9b25aca0c3', 35, NULL, 'Pradosh Mukherjee', 'pradoshbig0@gmail.com', '9674419914', '8LFNEBD3', 'qrcodes/8lfnebd3-wbL4AY.svg', 'claimed', '2026-09-13 21:33:06', NULL, NULL, '45.250.244.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 21:33:06', '2026-08-14 21:33:06'),
(216, '4309468c-e5f2-4617-9af6-928cd9ecabf4', 33, NULL, 'Gourav Biswas', 'gourav@pravixaai.com', '09883547107', 'G9APYUSN', 'qrcodes/g9apyusn-kJy9VS.svg', 'claimed', '2026-09-13 23:46:12', NULL, NULL, '2401:4900:882b:1fed:60ad:f930:cfd3:dad9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-14 23:46:12', '2026-08-14 23:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"4d22dfb0-1954-41a0-a902-3a512611b915\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:210;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786631695,\"delay\":null}', 0, NULL, 1786631695, 1786631695),
(2, 'default', '{\"uuid\":\"a3f6ca62-56d7-428e-81ac-0d1f1cdf2596\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:210;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786631695,\"delay\":null}', 0, NULL, 1786631695, 1786631695),
(3, 'default', '{\"uuid\":\"e9c98853-93e5-4b81-a137-6a691a9765c5\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:211;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786632317,\"delay\":null}', 0, NULL, 1786632317, 1786632317),
(4, 'default', '{\"uuid\":\"49ef9db3-3942-4e97-81d7-e8be73588d4d\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:211;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786632317,\"delay\":null}', 0, NULL, 1786632317, 1786632317),
(5, 'default', '{\"uuid\":\"ab9542b5-1379-4dee-ac7b-9022c1331d4f\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:212;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786635176,\"delay\":null}', 0, NULL, 1786635176, 1786635176),
(6, 'default', '{\"uuid\":\"d30bc63d-2b79-4515-b58b-cb9c32f87ecd\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:212;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786635176,\"delay\":null}', 0, NULL, 1786635176, 1786635176),
(7, 'default', '{\"uuid\":\"26f15db9-b5f3-4eda-b37d-7418f8043787\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:213;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786721657,\"delay\":null}', 0, NULL, 1786721657, 1786721657),
(8, 'default', '{\"uuid\":\"85a1522e-bff0-4459-ad5d-1538e8fcdc63\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:213;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786721657,\"delay\":null}', 0, NULL, 1786721657, 1786721657),
(9, 'default', '{\"uuid\":\"d52bd703-95bd-44aa-930f-c2686e3e93a4\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:214;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786722494,\"delay\":null}', 0, NULL, 1786722494, 1786722494),
(10, 'default', '{\"uuid\":\"c61e3528-aae7-4cf6-8019-f1bc2bcb4d59\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:214;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786722494,\"delay\":null}', 0, NULL, 1786722494, 1786722494),
(11, 'default', '{\"uuid\":\"769a2a74-7e13-4ce3-ad8c-7a76210dc0f8\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:215;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786723386,\"delay\":null}', 0, NULL, 1786723386, 1786723386),
(12, 'default', '{\"uuid\":\"c29ad87b-8c51-461d-b958-dbe5941bff5a\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:215;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786723386,\"delay\":null}', 0, NULL, 1786723386, 1786723386),
(13, 'default', '{\"uuid\":\"bf1a4da7-bb53-49fa-9be0-2761fa88b2cf\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:216;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786731372,\"delay\":null}', 0, NULL, 1786731372, 1786731372),
(14, 'default', '{\"uuid\":\"630b2e45-5564-41f6-84e4-e2b477cb0f00\",\"displayName\":\"App\\\\Listeners\\\\SendCouponEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":3,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":\"30\",\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":26:{s:5:\\\"class\\\";s:29:\\\"App\\\\Listeners\\\\SendCouponEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:23:\\\"App\\\\Events\\\\ClaimCreated\\\":1:{s:5:\\\"claim\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:16:\\\"App\\\\Models\\\\Claim\\\";s:2:\\\"id\\\";i:216;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"offer\\\";i:1;s:16:\\\"offer.advertiser\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}}s:5:\\\"tries\\\";i:3;s:13:\\\"maxExceptions\\\";N;s:7:\\\"backoff\\\";i:30;s:10:\\\"retryUntil\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"failOnTimeout\\\";b:0;s:17:\\\"shouldBeEncrypted\\\";b:0;s:14:\\\"shouldBeUnique\\\";b:0;s:29:\\\"shouldBeUniqueUntilProcessing\\\";b:0;s:8:\\\"uniqueId\\\";N;s:9:\\\"uniqueFor\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\",\"batchId\":null},\"createdAt\":1786731372,\"delay\":null}', 0, NULL, 1786731372, 1786731372);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '0001_01_01_000000_create_users_table', 1),
(12, '0001_01_01_000001_create_cache_table', 1),
(13, '0001_01_01_000002_create_jobs_table', 1),
(14, '2026_08_06_000001_create_personal_access_tokens_table', 1),
(15, '2026_08_06_000010_create_advertisers_table', 1),
(16, '2026_08_06_000011_create_screens_table', 1),
(17, '2026_08_06_000012_create_offers_table', 1),
(18, '2026_08_06_000013_create_claims_table', 1),
(19, '2026_08_06_000014_create_activity_logs_table', 1),
(20, '2026_08_06_000015_create_notifications_table', 1),
(21, '2026_08_10_000001_add_category_to_offers_table', 1),
(22, '2026_08_10_000002_create_newsletter_subscribers_table', 1),
(23, '2026_08_11_000001_create_site_settings_table', 2),
(24, '2026_08_11_000002_create_category_icons_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `unsubscribed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `source`, `ip_address`, `unsubscribed_at`, `created_at`, `updated_at`) VALUES
(1, 'tirthabig0@gmail.com', 'homepage_footer_banner', '2409:4091:33:8a11:35ef:9421:60ed:5f03', NULL, '2026-08-13 20:08:25', '2026-08-13 20:08:25'),
(3, 'gourav@pravixaai.com', 'homepage_footer_banner', '2402:3a80:1989:474f:fd66:1948:a90f:99b1', NULL, '2026-08-18 02:12:07', '2026-08-18 02:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `advertiser_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(32) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `max_claims` int(10) UNSIGNED DEFAULT NULL,
  `claims_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `redemptions_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `starts_at` datetime DEFAULT NULL,
  `ends_at` datetime DEFAULT NULL,
  `coupon_expiry_days` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `uuid`, `advertiser_id`, `category`, `title`, `slug`, `description`, `terms`, `image_path`, `status`, `max_claims`, `claims_count`, `redemptions_count`, `starts_at`, `ends_at`, `coupon_expiry_days`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '23e89ebc-2136-4d63-a41a-176cf6e761ef', 7, 'lifestyle', 'FLAT 20% OFF on Wellness Products', 'flat-20-off-on-wellness-products', 'Live a healthy & happy life with our curated wellness range.', 'One coupon per customer. Cannot be combined with other offers. Valid at participating locations only.', 'https://placehold.co/400x220/2E7D32/ffffff?text=Wellness+Products', 'active', 200, 8, 2, '2026-08-07 13:54:02', '2026-10-09 13:54:02', NULL, '2026-08-10 08:24:02', '2026-08-10 08:24:05', NULL),
(2, '56846620-afe0-4276-a56c-1f7f254537e5', 7, 'beauty', 'UPTO 60% OFF on Beauty Essentials', 'upto-60-off-on-beauty-essentials', 'Look beautiful everyday with top beauty brands.', 'One coupon per customer. Cannot be combined with other offers. Valid at participating locations only.', 'https://placehold.co/400x220/AD1457/ffffff?text=Beauty+Essentials', 'active', 200, 3, 2, '2026-08-07 13:54:02', '2026-10-09 13:54:02', NULL, '2026-08-10 08:24:02', '2026-08-10 08:24:05', NULL),
(3, '38af763e-3a61-4095-b036-bf674b90e90a', 7, 'sports', 'FLAT 30% OFF on Sports Gear', 'flat-30-off-on-sports-gear', 'Get the best deals on top sports brands.', 'One coupon per customer. Cannot be combined with other offers. Valid at participating locations only.', 'https://placehold.co/400x220/EF6C00/ffffff?text=Sports+Gear', 'active', 200, 8, 2, '2026-08-07 13:54:02', '2026-10-09 13:54:02', NULL, '2026-08-10 08:24:02', '2026-08-10 08:24:05', NULL),
(4, 'ae30b109-ed1c-4fee-b733-0607555aa32f', 7, 'food_and_drinks', 'MID-DAY OFFER on Cravings', 'mid-day-offer-on-cravings', 'Delicious deals on your favourite food, all day long.', 'One coupon per customer. Cannot be combined with other offers. Valid at participating locations only.', 'https://placehold.co/400x220/D84315/ffffff?text=Cravings', 'active', 200, 5, 2, '2026-08-07 13:54:02', '2026-10-09 13:54:02', NULL, '2026-08-10 08:24:02', '2026-08-10 08:24:05', NULL),
(5, '9d5a185d-33e0-4cff-a0f9-94dcd392e6b7', 8, 'food_and_drinks', 'Snacks Jumbo Offer', 'end-of-session-offer-on-winter-collection', 'I\'m just running in for water', 'One coupon per customer. Cannot be combined with other offers. Valid at participating locations only.', 'offers/qaRaY38IHPdTmAvRq84mXlckfOlvbkRSXvOBqsoo.jpg', 'active', 50, 6, 2, '2026-08-13 19:00:00', '2026-08-23 19:00:00', NULL, '2026-08-10 08:24:03', '2026-08-13 20:50:39', NULL),
(6, '0fa2fc2e-04ac-4582-951b-20c250730a84', 8, 'food_and_drinks', 'The $3 Saviour', 'extra-30-off-on-online-shopping', '2 for $3 Big Bite Hot Dogs', NULL, 'offers/DNBJ9M1SRo5d2zp1zayX2rmVQbBGxCjzGIX695Ej.jpg', 'active', 60, 7, 2, '2026-08-13 19:00:00', '2026-09-06 19:00:00', NULL, '2026-08-10 08:24:03', '2026-08-13 20:50:53', NULL),
(7, '0099eee7-6bd5-46c4-89ef-a7ad32e75649', 8, 'food_and_drinks', 'Grab at the grill', 'get-25-off-on-movie-tickets', 'Cure your problems with $3', NULL, 'offers/AJ0tXukGgA9G74EGlHtVIaFgEEBWPXS19Kgvr8YD.jpg', 'active', 200, 6, 2, '2026-08-13 19:00:00', '2026-08-31 19:00:00', NULL, '2026-08-10 08:24:03', '2026-08-13 20:51:14', NULL),
(8, '7cc91645-d14b-4c73-9f0e-18b863a0ea07', 8, 'food_and_drinks', 'The Haul Starter Pack', 'special-deals-on-accessories', 'The 2AM everything run', NULL, 'offers/LFVFNJdy4tu7U04g6n0p1BAqRWR6f4AJH0kt6Och.jpg', 'active', 200, 5, 2, '2026-08-13 18:59:00', '2026-08-31 19:00:00', NULL, '2026-08-10 08:24:03', '2026-08-13 20:51:30', NULL),
(9, 'de6a4beb-4c9d-4111-aa3e-1d0fb6be8a3b', 9, 'food_and_drinks', 'Free Drink with Entry', 'buy-1-get-1-free-on-burgers', 'Tacos, tortas and platos hechos en casa', NULL, 'offers/28JIjsMKuHicPQL2Y6WTG13wgtOgI0Wo462L0Jpd.png', 'active', 200, 6, 2, '2026-08-13 19:00:00', '2026-09-06 19:00:00', NULL, '2026-08-10 08:24:03', '2026-08-13 20:52:00', NULL),
(10, '1d0d5bd3-3fe0-4aac-9187-8a099acc6e98', 1, 'lifestyle', 'Plonbye onet. San Fose vann.', 'est-molestias-minima-offer-qsjr', '$50 Rabe sou nenpot reparasyon', 'Quo quod et qui voluptas nesciunt fuga sit. Distinctio nisi eum sunt aut itaque nemo. Incidunt et mollitia soluta amet voluptatem.', 'offers/pU8nzg7lcefxlyAaVrHRys6qqGzKWsLBMBFuSP1D.jpg', 'active', 40, 4, 2, '2026-08-13 19:00:00', '2026-08-31 19:00:00', NULL, '2026-08-10 08:24:03', '2026-08-13 20:52:20', NULL),
(11, 'e7bc82b1-63d1-448a-8b42-6c8fbbd510cf', 1, 'lifestyle', 'Plomeros Honestos. Sin Enganos.', 'error-ea-vel-offer-cfbd', '$50 off any repair', NULL, 'offers/zuFFRMsG7S2ElyR4kkoU60SMpVCRsAYDG2nmZlt7.jpg', 'active', 20, 3, 2, '2026-08-13 19:00:00', '2026-09-27 19:00:00', NULL, '2026-08-10 08:24:03', '2026-08-13 20:52:38', NULL),
(12, '04775762-c6ed-4efa-8c65-6fbd7b7a8d56', 1, 'lifestyle', 'Honest Plumbers. No Upsells', 'distinctio-tempora-possimus-offer-wrwc', '$50 off any repair', NULL, 'offers/r9Z7nzAN5TXkPYlVbpO0Fh0oKTiZskig039suFbM.jpg', 'active', 20, 8, 2, '2026-08-23 19:00:00', '2026-08-31 19:00:00', NULL, '2026-08-10 08:24:03', '2026-08-13 18:48:08', NULL),
(13, '5e0fb05e-41ea-4eff-89c7-0e88d5f09f01', 1, 'lifestyle', 'Plomeros Honestos. Sin Ventas Ocultas.', 'unde-expedita-vero-offer-3axf', '$50 De descuento en cualquier reparacioan', NULL, 'offers/Czw92KFfD6CmujOAWUEfcVLgGMA0d3My2ulUSzik.jpg', 'active', 100, 7, 2, '2026-08-16 19:00:00', '2026-08-31 19:00:00', NULL, '2026-08-10 08:24:03', '2026-08-13 19:00:24', NULL),
(14, 'f7286b75-0064-4a7b-9457-a001a12414be', 1, 'lifestyle', 'honest plumbers. No Upsells.', 'dolorem-ipsa-aut-offer-4taq', '$50 off on any repair', NULL, 'offers/vDOXKvTYzMyNmqzZIkLIvtKIN309cNlKCebnyeS1.jpg', 'active', 100, 7, 2, '2026-08-16 19:00:00', '2026-09-06 19:00:00', NULL, '2026-08-10 08:24:03', '2026-08-13 19:02:44', NULL),
(15, '736e8d5a-bbbb-478d-8296-eab5172fc284', 2, 'sports', 'Aut voluptatem deserunt Offer', 'aut-voluptatem-deserunt-offer-venb', 'Eligendi ut aut sunt nesciunt dolorem. Aliquid culpa quis reiciendis. Architecto dolores porro porro eligendi aut dolore.', 'Hic eum cupiditate consequatur mollitia atque. Sunt aut quis eum atque adipisci. Quae sint voluptatem nihil dicta ea. Nobis possimus voluptas qui tempora molestias.', NULL, 'active', 100, 6, 2, '2026-08-09 13:54:03', '2026-09-10 13:54:03', NULL, '2026-08-10 08:24:03', '2026-08-10 08:24:08', NULL),
(16, 'd4494403-b15d-45ae-856d-688808dba70e', 2, 'beauty', 'Quae blanditiis sint Offer', 'quae-blanditiis-sint-offer-fzer', 'Aut et doloremque nobis accusantium fugiat ea beatae. Amet sed laborum voluptatibus. Non ea minus rerum non rerum doloribus repellat provident.', 'Rerum enim pariatur distinctio distinctio error. Aut adipisci est perferendis culpa vero nulla officiis. Est eaque facere et iste eligendi et.', NULL, 'active', 500, 4, 2, '2026-08-09 13:54:03', '2026-09-10 13:54:03', NULL, '2026-08-10 08:24:03', '2026-08-10 08:24:08', NULL),
(17, '35bfd2c7-d32e-401b-9331-25520b200742', 3, 'entertainment', 'Nostrum quia harum Offer', 'nostrum-quia-harum-offer-5vbv', 'Veritatis qui sed qui voluptate. Ut culpa id dolore velit ut repudiandae perferendis. Aspernatur aperiam consequatur doloribus facere occaecati quia.', 'Officiis dolores et iusto excepturi voluptate. Natus accusantium ut dolorem laudantium. Odit dicta recusandae atque hic eveniet. Dolorem voluptatem eligendi ut fuga maxime et.', NULL, 'active', 50, 8, 2, '2026-08-09 13:54:03', '2026-09-10 13:54:03', NULL, '2026-08-10 08:24:03', '2026-08-10 08:24:08', NULL),
(18, 'fa6d44d7-5e3e-4310-a79c-817fd7a97e17', 3, 'entertainment', 'Reiciendis itaque ut Offer', 'reiciendis-itaque-ut-offer-u4pn', 'Quibusdam sint dolorum ipsa illo dignissimos. Velit animi quasi veniam at est molestiae qui. Iste aut asperiores at consequatur.', 'Maiores ducimus voluptas sunt quisquam iure placeat. Veniam dolorum est et maxime corrupti et labore. Laborum est voluptatum dolores ratione.', NULL, 'active', 500, 8, 2, '2026-08-09 13:54:03', '2026-09-10 13:54:03', NULL, '2026-08-10 08:24:03', '2026-08-10 08:24:08', NULL),
(19, '8517a831-36b0-40ff-a66a-719c34d60d89', 4, 'food_and_drinks', 'Ipsam qui exercitationem Offer', 'ipsam-qui-exercitationem-offer-xx4a', 'Porro praesentium maxime et doloremque ut voluptate. Qui non officiis omnis omnis animi saepe sit. Animi deserunt magni quod explicabo cupiditate nulla qui laborum. Ipsum saepe et eaque enim sapiente sunt soluta.', 'Blanditiis et vel placeat sunt sint quae ea. Commodi ea et sed in nemo voluptas ut molestiae. Corrupti debitis aspernatur explicabo tempora quod repudiandae eum. Rerum aut illo et fuga. Recusandae eum fugiat soluta iusto voluptatem possimus.', NULL, 'active', NULL, 8, 2, '2026-08-09 13:54:03', '2026-09-10 13:54:03', NULL, '2026-08-10 08:24:03', '2026-08-10 08:24:08', NULL),
(20, 'cb48966b-f3a0-4162-b2b1-9b178b5c333e', 4, 'e_commerce', 'Et suscipit quo Offer', 'et-suscipit-quo-offer-vdb0', 'Ea ex necessitatibus quas distinctio nihil. Iure qui non molestiae delectus nihil alias.', 'Porro eius est labore. Id dolores non minus et ullam ut architecto excepturi. Voluptatem est esse tempora. At autem perferendis odit laboriosam. Fuga voluptas sit et.', NULL, 'active', 100, 7, 2, '2026-08-09 13:54:03', '2026-09-10 13:54:03', NULL, '2026-08-10 08:24:03', '2026-08-10 08:24:09', NULL),
(21, 'a11b64fe-6bfa-4536-9c71-e86b93ba9e39', 5, 'beauty', 'Rerum quia dolores Offer', 'rerum-quia-dolores-offer-70we', 'Odio velit et animi minima. Sed est blanditiis est est veniam voluptate et. Quo placeat impedit consequatur exercitationem repellendus et eum et.', 'Nisi quam doloribus expedita recusandae voluptatum nihil magni. Repellat eum nisi qui dolores ab iure voluptatem. Enim recusandae aut ipsam aliquid.', NULL, 'active', 500, 9, 2, '2026-08-09 13:54:03', '2026-09-10 13:54:03', NULL, '2026-08-10 08:24:03', '2026-08-13 20:04:55', NULL),
(22, '4872fd57-096b-4df9-bfec-061b385e4529', 5, 'beauty', 'Quaerat saepe eius Offer', 'quaerat-saepe-eius-offer-rsx6', 'Alias rerum laboriosam alias rerum. Non esse quidem nulla fugiat voluptas. Consequatur magni adipisci nemo unde ex illum quibusdam.', 'In minima inventore sit commodi illo. Culpa distinctio facere incidunt non. Laborum exercitationem in quidem est omnis.', NULL, 'active', 50, 9, 2, '2026-08-09 13:54:03', '2026-09-10 13:54:03', NULL, '2026-08-10 08:24:03', '2026-08-14 14:37:01', '2026-08-14 14:37:01'),
(23, 'da13de53-f07b-4c3c-af1f-92074aaa2ced', 8, 'food_and_drinks', 'Buy 1 Get 1', 'id-rerum-quas-offer-1rob', 'Any size slurpee drink', NULL, 'offers/OLU5maLB9AxJA1UeNIbKJK2RFxBwE4eVWg2qulZT.jpg', 'active', 500, 4, 2, '2026-08-13 00:59:00', '2026-08-31 19:54:00', NULL, '2026-08-10 08:24:04', '2026-08-13 20:43:13', NULL),
(24, 'efba3959-97fb-4c96-be29-c9e0c905bc42', 8, 'food_and_drinks', '2 Slices for $3', 'ratione-suscipit-vero-offer-ec9s', 'Fresh hot pepperoni pizza', NULL, 'offers/RPlfB9LIs0SRxnivcMbqsNnQwOi3JAdF55bWurMF.jpg', 'active', 500, 5, 2, '2026-08-13 13:54:00', '2026-08-23 13:54:00', NULL, '2026-08-10 08:24:04', '2026-08-13 20:43:43', NULL),
(25, '0f23b8f4-8c94-443a-8adb-5a0b4256de5e', 8, 'food_and_drinks', 'We\'ve Got You', 'id-reiciendis-occaecati-offer-kztd', 'Hot. Fresh. Made for right now.', NULL, 'offers/YKVHechlUYYVZ5gmkZyeO42Gj4Oui1QvZhGOrKUG.jpg', 'active', 50, 8, 2, '2026-08-13 17:58:00', '2026-08-23 13:54:00', NULL, '2026-08-10 08:24:04', '2026-08-13 21:02:56', NULL),
(26, '83e07178-67bc-4cf0-9565-de357c3531cc', 8, 'food_and_drinks', '2 For $3 Big Bite Hot Dogs', 'sunt-velit-alias-offer-oyrf', 'Big bite hot dogs', NULL, 'offers/VisqIbbU62vzkxzi0VeqgFThfqVlYymbHNVgnE3t.jpg', 'active', NULL, 9, 2, '2026-08-09 13:54:00', '2026-09-10 13:54:00', NULL, '2026-08-10 08:24:04', '2026-08-12 19:00:22', NULL),
(27, 'f839c299-83d5-49b3-9284-2b13c655dd6b', 8, 'food_and_drinks', 'Grab at The Grill', 'suscipit-id-non-offer-d5du', '2 for $3 big bite hot dogs', NULL, 'offers/98RbUfsreFE0ga0yvq7t7iW98SzoyQwKxFckdbVv.jpg', 'active', NULL, 8, 2, '2026-08-13 16:57:00', '2026-09-27 13:54:00', NULL, '2026-08-10 08:24:04', '2026-08-13 20:44:46', NULL),
(28, '80467267-bf47-45e7-860d-bced1a74c1bc', 8, 'food_and_drinks', '2 for $3', 'ex-unde-enim-offer-6za2', 'big bite hot dogs', NULL, 'offers/uU02YzeEuKDafStR63LHF2XSIJPg2MRfxgK5qzw4.jpg', 'active', 50, 8, 2, '2026-08-13 13:54:00', '2026-09-05 13:54:00', NULL, '2026-08-10 08:24:04', '2026-08-13 20:45:04', NULL),
(29, '9b27e00c-dd58-4c10-b5ad-86f52574d1d0', 8, 'food_and_drinks', 'Grab at the grill', 'voluptas-consequuntur-et-offer-ksbz', '2 for $3 big bite hot dogs', NULL, 'offers/NzpgfxsrIVM7HGjaMQQ5rH5bhbuuddgIC6BFNki0.jpg', 'active', NULL, 9, 2, '2026-08-13 17:58:00', '2026-08-31 13:54:00', NULL, '2026-08-10 08:24:04', '2026-08-13 20:45:20', NULL),
(30, '7c259c13-9359-4516-945e-3b0a9f098d9d', 8, 'food_and_drinks', '2 for $3', 'occaecati-est-recusandae-offer-4qhz', 'Big Bite Hot Dogs', NULL, 'offers/Iu29z1AdMafnG7kQG8cMb7MfXGrvVBHnrfVeYRFb.jpg', 'active', 20, 9, 2, '2026-08-13 15:00:00', '2026-08-31 16:00:00', NULL, '2026-08-10 08:24:04', '2026-08-13 20:49:37', NULL),
(31, '3c9694bf-59e2-48ec-846e-32deda5d9828', 8, 'food_and_drinks', 'Starter Pack', 'voluptatibus-et-quis-offer-ombk', 'the \"my life is falling apart but 7-Eleven is open\" starter pack', NULL, 'offers/jkUd3pY1Z8XZ4mEcd10VVgNXaeNMfRylEzMgP6cf.jpg', 'active', 25, 5, 2, '2026-08-13 19:00:00', '2026-08-23 19:00:00', NULL, '2026-08-10 08:24:04', '2026-08-13 20:49:55', NULL),
(32, 'f00d6d74-ca04-4e09-bc74-b748b0f112bb', 8, 'food_and_drinks', 'Snacks Value Pack', 'sed-nesciunt-perferendis-offer-hrxf', 'Went for snack and came out with enough supplies', NULL, 'offers/S5qVNJJhrfG7RYPdGZbGMfJeYBnNnZRtJafYcn9z.jpg', 'active', 50, 4, 2, '2026-08-13 00:05:00', '2026-08-31 19:00:00', NULL, '2026-08-10 08:24:04', '2026-08-13 20:50:14', NULL),
(33, 'cf826837-9964-4cd6-800e-87a314969b0d', 8, 'food_and_drinks', '$1.50 Any Size', 'hot-fresh-coffee', 'Hot Fresh Brewed Coffee', NULL, 'offers/J6vzcSE0QtarEFskLbmYtcN3PfDVjWcFBSrrxpdG.jpg', 'active', 10, 2, 0, '2026-08-11 20:25:00', '2026-08-16 20:26:00', NULL, '2026-08-11 14:56:09', '2026-08-14 23:46:12', NULL),
(34, 'a17daed2-a436-4bf8-a6be-57f86e1af2bb', 8, 'food_and_drinks', '2 for $3 Big Bite Hot Dogs', '2-for-3-big-bite-hot-dogs', 'babe, it\'s 2 AM, where are we going?', NULL, 'offers/AvxZFLqX1gSXKiOzQL0rT4OhK8GoYAEFxh1Zs66k.jpg', 'active', 20, 0, 0, '2026-08-13 06:06:00', '2026-08-26 00:00:00', NULL, '2026-08-12 21:55:51', '2026-08-13 20:42:38', NULL),
(35, '7cfe1c25-5167-435e-b1de-9c2bd76386fb', 9, 'others', '24 Hour Flatbed Tow', '24-hour-flatbed-tow', 'Flat rate quoted before we roll', NULL, 'offers/8QFnhygindULdOyYoES4HGfu35cqXufEZmSP0Im6.png', 'active', NULL, 3, 0, '2026-08-13 22:04:00', '2026-08-31 00:23:00', NULL, '2026-08-13 18:17:56', '2026-08-14 21:33:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offer_screen`
--

CREATE TABLE `offer_screen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `screen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_screen`
--

INSERT INTO `offer_screen` (`id`, `offer_id`, `screen_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-08-10 08:24:02', '2026-08-10 08:24:02'),
(2, 2, 1, '2026-08-10 08:24:02', '2026-08-10 08:24:02'),
(3, 3, 1, '2026-08-10 08:24:02', '2026-08-10 08:24:02'),
(4, 4, 1, '2026-08-10 08:24:02', '2026-08-10 08:24:02'),
(5, 5, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(6, 6, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(7, 7, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(8, 8, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(9, 9, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(10, 10, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(11, 10, 4, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(12, 11, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(13, 11, 2, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(14, 12, 2, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(15, 12, 4, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(16, 13, 2, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(17, 13, 4, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(18, 14, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(19, 14, 3, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(20, 15, 3, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(21, 15, 4, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(22, 16, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(23, 16, 3, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(24, 17, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(25, 17, 4, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(26, 18, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(27, 18, 2, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(28, 19, 3, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(29, 19, 4, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(30, 20, 1, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(31, 20, 2, '2026-08-10 08:24:03', '2026-08-10 08:24:03'),
(32, 21, 1, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(33, 21, 3, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(34, 22, 2, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(35, 22, 4, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(38, 24, 1, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(39, 24, 3, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(40, 25, 1, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(41, 25, 4, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(42, 26, 2, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(43, 26, 3, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(44, 27, 1, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(45, 27, 3, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(46, 28, 1, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(48, 29, 2, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(49, 29, 3, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(50, 30, 1, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(51, 30, 4, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(52, 31, 2, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(53, 31, 4, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(54, 32, 1, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(55, 32, 4, '2026-08-10 08:24:04', '2026-08-10 08:24:04'),
(57, 33, 4, '2026-08-12 16:38:01', '2026-08-12 16:38:01'),
(59, 23, 4, '2026-08-12 18:31:00', '2026-08-12 18:31:00'),
(60, 28, 4, '2026-08-12 21:51:46', '2026-08-12 21:51:46'),
(61, 34, 4, '2026-08-12 21:55:51', '2026-08-12 21:55:51'),
(62, 35, 4, '2026-08-13 18:17:56', '2026-08-13 18:17:56'),
(63, 9, 4, '2026-08-13 18:42:34', '2026-08-13 18:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `code` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `last_ping_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`id`, `uuid`, `code`, `name`, `location`, `status`, `meta`, `last_ping_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '44d1dcf9-1228-4617-b96b-fd2e9f4f3a63', 'JX1PWTKY', 'Graham Island Digital Screen', '32120 Amparo Drives\nPort Janice, ND 84849-9857', 'active', '{\"width\":1080,\"height\":1920}', '2026-08-10 08:24:02', '2026-08-10 08:24:02', '2026-08-10 08:24:02', NULL),
(2, 'a3ec72a1-d8ad-40db-8520-f1a4567cc6c1', 'TKXLVEXL', 'Graham Rapid Digital Screen', '7040 Kirsten Overpass Apt. 340\nWest Bradenburgh, MN 33146', 'active', '{\"width\":1080,\"height\":1920}', '2026-08-10 08:24:02', '2026-08-10 08:24:02', '2026-08-10 08:24:02', NULL),
(3, '1e6f4e39-22ae-46a6-b861-92451bd247c4', 'D5VJTUY8', 'Mueller Drive Digital Screen', '69689 Adan Rue Suite 387\nThielmouth, WI 59208-9636', 'active', '{\"width\":1080,\"height\":1920}', '2026-08-10 08:24:02', '2026-08-10 08:24:02', '2026-08-10 08:24:02', NULL),
(4, '5628604b-cc17-4c98-b60c-03eb3215ab62', 'VDXRBN5L', 'Chelsey Courts Digital Screen', '59264 Gutmann Island\nOrtizchester, NE 98758', 'active', '{\"width\":1080,\"height\":1920}', '2026-08-10 08:24:02', '2026-08-10 08:24:02', '2026-08-10 08:24:02', NULL),
(5, '3814c7a8-366f-4fc5-8741-30275193c48c', 'ghui45', 'Test', 'Test Location', 'active', NULL, NULL, '2026-08-11 14:59:31', '2026-08-11 14:59:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NDD78vrR8q2ejo4EYZ1ppopi4FKFVkPaGiNfLO3T', 1, '2402:3a80:1989:474f:fd66:1948:a90f:99b1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZXZDYVB0ampOUW5jZUc1eVZCZm42YUdCV094TFFGbktKZlZ1WEpzbyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTc6Imh0dHBzOi8vYTFtZXJjaGFudHNvbHV0aW9ucy50cml2aWlvLmNvbS9hZG1pbi9hZHZlcnRpc2VycyI7czo1OiJyb3V0ZSI7czoyMzoiYWRtaW4uYWR2ZXJ0aXNlcnMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1786999657),
('Yvd73BgvOvUPH5Agwetk0VC7EujIGk09iKHAXIro', NULL, '2402:3a80:1989:474f:fd66:1948:a90f:99b1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVRUNXRXRXZGU0tLbWw3bjBYYkxTcjRYbE8zeVhuS2w0eGIxVXBqNSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjA6Imh0dHBzOi8vYTFtZXJjaGFudHNvbHV0aW9ucy50cml2aWlvLmNvbS9wdWJsaWMvaW1hZ2VzL3FyLnBuZyI7czo1OiJyb3V0ZSI7czoxMzoicHVibGljLmltYWdlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1786999501);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `email_verified_at`, `password`, `role`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '46c79215-33d6-49d5-b619-3bcec560c809', 'Platform Admin', 'admin@adplatform.test', '2026-08-10 08:24:01', '$2y$12$2TkGw5d3IW51p17cWTEl9OaJc8rvnbmqosATB/5f1Cxe41surO5Ri', 'super_admin', 1, NULL, '2026-08-10 08:24:01', '2026-08-10 08:24:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_subject_type_subject_id_index` (`subject_type`,`subject_id`),
  ADD KEY `activity_logs_screen_id_foreign` (`screen_id`),
  ADD KEY `activity_logs_claim_id_foreign` (`claim_id`),
  ADD KEY `activity_logs_type_created_at_index` (`type`,`created_at`),
  ADD KEY `activity_logs_offer_id_type_index` (`offer_id`,`type`),
  ADD KEY `activity_logs_advertiser_id_type_index` (`advertiser_id`,`type`);

--
-- Indexes for table `advertisers`
--
ALTER TABLE `advertisers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `advertisers_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `advertisers_slug_unique` (`slug`),
  ADD UNIQUE KEY `advertisers_redemption_token_unique` (`redemption_token`),
  ADD KEY `advertisers_status_index` (`status`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `category_icons`
--
ALTER TABLE `category_icons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_icons_category_unique` (`category`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `claims_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `claims_coupon_code_unique` (`coupon_code`),
  ADD KEY `claims_screen_id_foreign` (`screen_id`),
  ADD KEY `claims_offer_id_email_index` (`offer_id`,`email`),
  ADD KEY `claims_status_expires_at_index` (`status`,`expires_at`),
  ADD KEY `claims_coupon_code_status_index` (`coupon_code`,`status`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_subscribers_email_unique` (`email`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offers_advertiser_id_slug_unique` (`advertiser_id`,`slug`),
  ADD UNIQUE KEY `offers_uuid_unique` (`uuid`),
  ADD KEY `offers_status_starts_at_ends_at_index` (`status`,`starts_at`,`ends_at`),
  ADD KEY `offers_category_index` (`category`);

--
-- Indexes for table `offer_screen`
--
ALTER TABLE `offer_screen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offer_screen_offer_id_screen_id_unique` (`offer_id`,`screen_id`),
  ADD KEY `offer_screen_screen_id_foreign` (`screen_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `screens_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `screens_code_unique` (`code`),
  ADD KEY `screens_status_index` (`status`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_settings_key_unique` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_is_active_index` (`role`,`is_active`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `advertisers`
--
ALTER TABLE `advertisers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_icons`
--
ALTER TABLE `category_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `offer_screen`
--
ALTER TABLE `offer_screen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_advertiser_id_foreign` FOREIGN KEY (`advertiser_id`) REFERENCES `advertisers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `activity_logs_claim_id_foreign` FOREIGN KEY (`claim_id`) REFERENCES `claims` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `activity_logs_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `activity_logs_screen_id_foreign` FOREIGN KEY (`screen_id`) REFERENCES `screens` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `claims`
--
ALTER TABLE `claims`
  ADD CONSTRAINT `claims_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `claims_screen_id_foreign` FOREIGN KEY (`screen_id`) REFERENCES `screens` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_advertiser_id_foreign` FOREIGN KEY (`advertiser_id`) REFERENCES `advertisers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offer_screen`
--
ALTER TABLE `offer_screen`
  ADD CONSTRAINT `offer_screen_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `offer_screen_screen_id_foreign` FOREIGN KEY (`screen_id`) REFERENCES `screens` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
