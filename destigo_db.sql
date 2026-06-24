-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2026 at 08:52 AM
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
-- Database: `destigo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `booking_code` varchar(255) NOT NULL,
  `visit_date` date NOT NULL,
  `adult_ticket_quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `child_ticket_quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `ticket_quantity` int(10) UNSIGNED NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `booking_status` enum('menunggu_pembayaran','aktif','dibatalkan','selesai') NOT NULL DEFAULT 'menunggu_pembayaran',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `destination_id`, `booking_code`, `visit_date`, `adult_ticket_quantity`, `child_ticket_quantity`, `ticket_quantity`, `total_price`, `booking_status`, `created_at`, `updated_at`) VALUES
(1, 2, 10, 'DST-20260623-SCAVEC', '2026-06-29', 1, 0, 1, 660000.00, 'aktif', '2026-06-23 05:37:24', '2026-06-23 05:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Indonesia', 'indonesia', 'Negara kepulauan dengan beragam destinasi wisata alam dan budaya.', 'countries/6NNW1YjcL4y9LDkMigBBV0arkxO1EqkPbYy6F0C6.jpg', '2026-06-22 22:57:04', '2026-06-22 22:57:04'),
(2, 'Jepang', 'jepang', 'Negara dengan perpaduan budaya tradisional, teknologi modern, dan berbagai destinasi wisata menarik.', 'countries/PBRALmseo5Su4znuUrB2xwsZiqg8Lmvt5dbNeBWU.jpg', '2026-06-22 22:57:36', '2026-06-22 22:57:36'),
(3, 'Korea Selatan', 'korea-selatan', 'Negara dengan destinasi hiburan, budaya populer, serta tempat wisata modern yang menarik dikunjungi.', 'countries/zsG5NdWSPawMpE4E0HZuygk2v9LRLLytaFDoRxGv.jpg', '2026-06-22 22:58:13', '2026-06-22 22:58:13'),
(4, 'Singapura', 'singapura', 'Negara modern dengan beragam atraksi wisata keluarga, taman kota, dan ikon arsitektur terkenal.', 'countries/cuiqOIV78eTybjs7CKZUJM9hvupfusxuDRfifBvy.jpg', '2026-06-22 22:58:54', '2026-06-22 22:58:54'),
(5, 'Turki', 'turki', 'Negara dengan perpaduan budaya Eropa dan Asia, bangunan bersejarah, serta pemandangan alam yang indah.', 'countries/XrsthEarM8cN4SI4rdrNMd8YhqYXfYGhGw9dwOXw.jpg', '2026-06-22 22:59:23', '2026-06-22 22:59:23'),
(6, 'Swiss', 'swiss', 'Negara dengan pemandangan pegunungan Alpen, danau indah, serta suasana wisata alam yang menenangkan.', 'countries/MzjFkATG6R2WgfMoiHdjJ6155tTOQKtKJ1GD58aV.jpg', '2026-06-22 22:59:52', '2026-06-22 22:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(12,2) NOT NULL,
  `adult_price` decimal(12,2) DEFAULT NULL,
  `child_price` decimal(12,2) DEFAULT NULL,
  `quota` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `country_id`, `name`, `slug`, `location`, `description`, `price`, `adult_price`, `child_price`, `quota`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gunung Bromo', 'gunung-bromo', 'Probolinggo, Jawa Timur', 'Gunung Bromo merupakan kawasan wisata alam di Taman Nasional Bromo Tengger Semeru yang terkenal dengan pemandangan kawah, lautan pasir, dan matahari terbit. Destinasi ini cocok untuk wisatawan yang ingin menikmati suasana pegunungan dan panorama alam yang ikonik.', 79000.00, 79000.00, 79000.00, 100, 'destinations/ZwpRy97X7MqtPRkwvPCZicti7t9QuxWQTUJxlP1b.jpg', '2026-06-22 23:08:23', '2026-06-22 23:08:23'),
(2, 1, 'Candi Borobudur', 'candi-borobudur', 'Magelang, Jawa Tengah', 'Candi Borobudur adalah destinasi wisata sejarah yang terkenal dengan bangunan candi megah, relief bersejarah, dan suasana kawasan yang ikonik. Tempat ini cocok untuk wisata budaya, edukasi, dan kunjungan keluarga.', 150000.00, 150000.00, 25000.00, 120, 'destinations/CyeI0NZ20tfh0QE2rpWH99WYtXgbO2nNa58tbVG0.jpg', '2026-06-22 23:09:41', '2026-06-22 23:09:41'),
(3, 1, 'Candi Prambanan', 'candi-prambanan', 'Sleman, Yogyakarta', 'Candi Prambanan merupakan kompleks candi Hindu terkenal di Yogyakarta yang memiliki arsitektur tinggi dan nilai sejarah yang kuat. Destinasi ini cocok untuk wisata budaya, sejarah, dan edukasi.', 50000.00, 50000.00, 25000.00, 120, 'destinations/tOXMEHNXJ79UY9lmscUIaSZNZnMcTA8UcTmSmlNh.jpg', '2026-06-22 23:10:36', '2026-06-22 23:10:36'),
(4, 1, 'Taman Safari Bogor', 'taman-safari-bogor', 'Cisarua, Bogor', 'Taman Safari Bogor adalah wisata satwa keluarga yang menawarkan pengalaman melihat hewan dari dekat, safari journey, dan berbagai atraksi edukatif. Tempat ini cocok untuk liburan keluarga dan wisata anak.', 195000.00, 195000.00, 150000.00, 100, 'destinations/L8gU5M4Z6Gaaz6FwELKzuwX183r2B9pDqmE9Vk3h.jpg', '2026-06-22 23:11:38', '2026-06-22 23:11:38'),
(5, 2, 'Tokyo Disneyland', 'tokyo-disneyland', 'Urayasu, Chiba, Jepang', 'Tokyo Disneyland adalah taman hiburan bertema Disney yang menawarkan wahana, parade, pertunjukan, dan area tematik. Destinasi ini cocok untuk liburan keluarga dan pengunjung yang ingin menikmati suasana hiburan khas Disney.', 830000.00, 830000.00, 500000.00, 100, 'destinations/VQ71VSF8VlsPPUpI0ilRUOg6XikhiLX2DlMxrfz5.jpg', '2026-06-22 23:12:44', '2026-06-22 23:12:44'),
(6, 2, 'Tokyo DisneySea', 'tokyo-disneysea', 'Urayasu, Chiba, Jepang', 'Tokyo DisneySea adalah taman hiburan bertema laut yang menjadi bagian dari Tokyo Disney Resort. Tempat ini menawarkan wahana, pertunjukan, dan suasana yang unik untuk wisata keluarga maupun perjalanan santai.', 830000.00, 830000.00, 500000.00, 100, 'destinations/NJ7CFQ7ZHOsUEjN5MjaMlxWjvO3ZUGWwkV05vzsv.jpg', '2026-06-22 23:13:47', '2026-06-22 23:13:47'),
(7, 2, 'Universal Studios Japan', 'universal-studios-japan', 'Osaka, Jepang', 'Universal Studios Japan adalah taman hiburan besar di Osaka yang menghadirkan wahana bertema film dan karakter populer. Destinasi ini cocok untuk wisatawan yang menyukai atraksi modern dan hiburan interaktif.', 950000.00, 950000.00, 650000.00, 100, 'destinations/BSiWNRfV0HaQXOENUsl4UkpyOnSDEJjXUU2iKEoo.jpg', '2026-06-22 23:14:41', '2026-06-22 23:14:41'),
(8, 2, 'Tokyo Skytree', 'tokyo-skytree', 'Tokyo, Jepang', 'Tokyo Skytree adalah menara observasi terkenal di Tokyo yang menawarkan pemandangan kota dari ketinggian. Tempat ini cocok untuk melihat panorama Tokyo, terutama saat sore atau malam hari.', 260000.00, 260000.00, 180000.00, 100, 'destinations/XQ2cU8vHnoliIOBi0uJQNeaORWhxY1LBFqLLlFY4.jpg', '2026-06-22 23:15:31', '2026-06-22 23:15:31'),
(9, 3, 'N Seoul Tower Observatory', 'n-seoul-tower-observatory', 'Seoul, Korea Selatan', 'N Seoul Tower Observatory adalah tempat wisata populer yang menawarkan pemandangan kota Seoul dari ketinggian. Destinasi ini cocok untuk menikmati panorama kota, terutama pada sore dan malam hari.', 350000.00, 350000.00, 280000.00, 100, 'destinations/krRQFGtYIEpyvCcmh6r4s2WECjwyho8hYoxo2y6X.jpg', '2026-06-22 23:16:25', '2026-06-22 23:16:25'),
(10, 3, 'Lotte World', 'lotte-world', 'Seoul, Korea Selatan', 'Lotte World adalah taman hiburan besar di Seoul dengan area indoor dan outdoor. Tempat ini cocok untuk keluarga, anak muda, dan wisatawan yang ingin menikmati wahana serta pertunjukan.', 660000.00, 660000.00, 470000.00, 99, 'destinations/mb7RcYTrliH7AitKzWyyuTOZOpp4knpqTmkYPsvl.jpg', '2026-06-22 23:17:11', '2026-06-23 05:37:50'),
(11, 3, 'Gyeongbokgung Palace', 'gyeongbokgung-palace', 'Seoul, Korea Selatan', 'Gyeongbokgung Palace adalah istana bersejarah di Seoul yang menampilkan arsitektur tradisional Korea. Destinasi ini cocok untuk wisata budaya, sejarah, dan pengalaman mengenal suasana kerajaan Korea.', 36000.00, 36000.00, 18000.00, 120, 'destinations/52iegIivzdaBmQmiszW7Wk1YJaggU3Xx5qoPPtLF.jpg', '2026-06-22 23:18:02', '2026-06-22 23:18:02'),
(12, 3, 'Seoul Sky Observatory', 'seoul-sky-observatory', 'Seoul, Korea Selatan', 'Seoul Sky Observatory berada di Lotte World Tower dan menawarkan pemandangan Seoul dari gedung tinggi. Tempat ini cocok untuk wisatawan yang ingin menikmati city view modern Korea Selatan.', 400000.00, 400000.00, 350000.00, 100, 'destinations/fXme8HApuRyjzJkZEVRZJxSK56BuMhLTK6OOaPJj.jpg', '2026-06-22 23:18:49', '2026-06-22 23:18:49'),
(13, 4, 'Gardens by the Bay', 'gardens-by-the-bay', 'Marina Bay, Singapura', 'Gardens by the Bay adalah taman modern di Singapura yang terkenal dengan Flower Dome, Cloud Forest, dan Supertree Grove. Destinasi ini cocok untuk wisata keluarga, foto, dan menikmati taman futuristik.', 420000.00, 420000.00, 320000.00, 100, 'destinations/MSgAUbOZhY02RfqpQ0SsGEETTvh7ZamsEOt6ttPY.jpg', '2026-06-22 23:19:38', '2026-06-22 23:19:38'),
(14, 4, 'Singapore Oceanarium', 'singapore-oceanarium', 'Sentosa Island, Singapura', 'Singapore Oceanarium adalah atraksi wisata laut yang menampilkan berbagai biota laut dan pengalaman edukatif. Destinasi ini cocok untuk keluarga dan wisatawan yang tertarik dengan dunia bawah laut.', 680000.00, 680000.00, 530000.00, 100, 'destinations/ngnQPR6kkJx20rj8JichKLJTHFlzcpC8UVGgLJec.jpg', '2026-06-22 23:21:35', '2026-06-22 23:21:35'),
(15, 4, 'Singapore Flyer', 'singapore-flyer', 'Marina Bay, Singapura', 'Singapore Flyer adalah bianglala observasi besar yang menawarkan pemandangan Marina Bay dan kota Singapura dari ketinggian. Tempat ini cocok untuk menikmati city view dengan suasana santai.', 490000.00, 490000.00, 310000.00, 100, 'destinations/o0I4YIAdSlvzbpelKlcUi7YCXPgTdWGOyzeLSABV.jpg', '2026-06-22 23:22:24', '2026-06-22 23:22:24'),
(16, 5, 'Cappadocia Hot Air Balloon', 'cappadocia-hot-air-balloon', 'Nevşehir, Turki', 'Cappadocia Hot Air Balloon adalah pengalaman wisata udara yang terkenal di Turki. Pengunjung dapat menikmati pemandangan lembah, batuan unik, dan suasana sunrise dari balon udara.', 3000000.00, 3000000.00, 2500000.00, 60, 'destinations/uKwprIMWCQ6YKQ7SCSQK8AcdiQK1yOARcKMu9sNh.jpg', '2026-06-22 23:23:13', '2026-06-22 23:23:13'),
(17, 5, 'Topkapi Palace', 'topkapi-palace', 'Istanbul, Turki', 'Topkapi Palace adalah kompleks istana peninggalan Kesultanan Ottoman yang kini menjadi destinasi sejarah dan museum. Tempat ini cocok untuk wisata arsitektur, sejarah, dan budaya Istanbul.', 1400000.00, 1400000.00, 1400000.00, 100, 'destinations/s521SAnP8TWIxBpcHAYIsbGd3668fcbNqxs4mBbf.jpg', '2026-06-22 23:25:20', '2026-06-22 23:25:20'),
(18, 6, 'Mount Titlis', 'mount-titlis', 'Engelberg, Swiss', 'Mount Titlis adalah destinasi pegunungan terkenal di Swiss yang menawarkan perjalanan cable car, pemandangan salju, dan panorama Alpen. Tempat ini cocok untuk wisatawan yang ingin menikmati suasana pegunungan bersalju.', 1900000.00, 1900000.00, 950000.00, 100, 'destinations/S14zAaIPmzn4vjAwqMvQYmAQAdALuV4B3nwcg7qp.jpg', '2026-06-22 23:26:46', '2026-06-22 23:26:46'),
(19, 6, 'Jungfraujoch', 'jungfraujoch', 'Bernese Oberland, Swiss', 'Jungfraujoch dikenal sebagai salah satu destinasi pegunungan populer di Swiss dengan perjalanan kereta menuju area tinggi Alpen. Destinasi ini cocok untuk menikmati salju, panorama gunung, dan pengalaman wisata alam khas Swiss.', 4500000.00, 4500000.00, 430000.00, 80, 'destinations/C7ADX84M6FFJ3Co2l45uWcPL6eVDIBp92MDVBA4a.jpg', '2026-06-22 23:27:35', '2026-06-22 23:27:35'),
(20, 6, 'Swiss Museum of Transport', 'swiss-museum-of-transport', 'Lucerne, Swiss', 'Swiss Museum of Transport adalah museum populer di Lucerne yang menampilkan koleksi transportasi, teknologi, dan pengalaman interaktif. Destinasi ini cocok untuk wisata edukasi dan liburan keluarga.', 700000.00, 700000.00, 350000.00, 120, 'destinations/bzbo8uts4QG7ly2N19zJIuYw3UFB0ls4yXXwWOuJ.jpg', '2026-06-22 23:28:31', '2026-06-22 23:28:31');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_27_132813_add_role_to_users_table', 1),
(5, '2026_05_27_135820_create_countries_table', 1),
(6, '2026_05_27_150513_create_destinations_table', 1),
(7, '2026_05_28_150226_create_bookings_table', 1),
(8, '2026_05_28_150240_create_visitors_table', 1),
(9, '2026_05_28_152430_create_payments_table', 1),
(10, '2026_05_31_145248_add_age_prices_to_destinations_table', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `snap_token` varchar(255) DEFAULT NULL,
  `gross_amount` decimal(12,2) NOT NULL,
  `payment_status` enum('pending','paid','failed','expired','cancelled') NOT NULL DEFAULT 'pending',
  `paid_at` timestamp NULL DEFAULT NULL,
  `notification_payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`notification_payload`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `order_id`, `transaction_id`, `payment_type`, `snap_token`, `gross_amount`, `payment_status`, `paid_at`, `notification_payload`, `created_at`, `updated_at`) VALUES
(1, 1, 'PAY-20260623123750-1', 'TRX-OYHNEQ4GEV', 'GoPay', NULL, 660000.00, 'paid', '2026-06-23 05:37:50', '{\"payment_method\":\"GoPay\",\"booking_code\":\"DST-20260623-SCAVEC\",\"paid_from\":\"Destigo payment page\"}', '2026-06-23 05:37:50', '2026-06-23 05:37:50');

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
('9ciV7JVLRgAQWlqMuCYPWrUqvdHHRscsWt3j7Kpd', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWXA4U3hkRmdhTEQ5cllsVGJTYlFZeWRVRTNkdGVhUDZjSTJyR2gyRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teS1ib29raW5ncyI7czo1OiJyb3V0ZSI7czoxNDoiYm9va2luZ3MuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1782283403),
('Aty8x3OgyS2fEIM0vldQWyO49cJetuQaFFpNjVWl', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieVl3YXg4bWhFVXdwc0swYXVUZWpLdjZEUEVGQmVRMFVvMXAzTEs4cCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teS1ib29raW5ncyI7czo1OiJyb3V0ZSI7czoxNDoiYm9va2luZ3MuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1782218316),
('eKqNRsdWgMzBOipMbdAiKk1lAlWJWEqnDfGyFPOj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUnE3Z1h4b0VZa0xraThwV1hJZ3FYTmxoZ2czVVA1VnFvZmozV2I5MiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ib29raW5ncyI7czo1OiJyb3V0ZSI7czoyMDoiYWRtaW4uYm9va2luZ3MuaW5kZXgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1782272440),
('PpPIthbHXLlstKLLtXz7GRgeqBS32sAbRaL5XyDY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDQyTE90NHlUUU5FdzhMZEhSVlM1NGRFRW9QbnFxZTlKY09TNkdUNCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1782194215),
('XCjMKQovlVHFai4l1KYw24oDRkAKsevQfBhWZDvN', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWktVM0JBR29CaEZuOUpLTzBuTlViZHZVRlY0ZG5Paklvekl1amRjTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXN0aW5hdGlvbnMvdG9reW8tc2t5dHJlZSI7czo1OiJyb3V0ZSI7czoxNzoiZGVzdGluYXRpb25zLnNob3ciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1782196401);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Destigo', 'admin@gmail.com', NULL, '$2y$12$JCYhCp1jaa00TKUqxTHvRusPvqceTQ44Pabgs/E/8.gd0JzAfFmPG', 'admin', NULL, '2026-06-22 22:42:35', '2026-06-22 22:42:35'),
(2, 'Cut Farah', 'cutfarah@gmail.com', NULL, '$2y$12$7dRawA9UIoN7.bgZAi1lQuZgIx7Y.lSV8gY24gpIO31JPi70cmP9a', 'user', NULL, '2026-06-22 23:31:41', '2026-06-22 23:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `age_category` enum('dewasa','anak') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `booking_id`, `visitor_name`, `age_category`, `created_at`, `updated_at`) VALUES
(1, 1, 'Farah', 'dewasa', '2026-06-23 05:37:24', '2026-06-23 05:37:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_booking_code_unique` (`booking_code`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_slug_unique` (`slug`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `destinations_slug_unique` (`slug`),
  ADD KEY `destinations_country_id_foreign` (`country_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_booking_id_unique` (`booking_id`),
  ADD UNIQUE KEY `payments_order_id_unique` (`order_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitors_booking_id_foreign` (`booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
