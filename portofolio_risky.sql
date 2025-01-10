-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 12:37 PM
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
-- Database: `portofolio_risky`
--

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
-- Table structure for table `detailprojek`
--

CREATE TABLE `detailprojek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar_flyer` varchar(255) NOT NULL,
  `title_1` varchar(255) NOT NULL,
  `title_2` varchar(255) NOT NULL,
  `desk_1` text NOT NULL,
  `gambar_1` varchar(255) NOT NULL,
  `desk_2` text NOT NULL,
  `desk_3` text NOT NULL,
  `link_projek` varchar(255) DEFAULT NULL,
  `gambarIcon_1` varchar(255) DEFAULT NULL,
  `gambarIcon_2` varchar(255) DEFAULT NULL,
  `gambarIcon_3` varchar(255) DEFAULT NULL,
  `gambarIcon_4` varchar(255) DEFAULT NULL,
  `gambarIcon_5` varchar(255) DEFAULT NULL,
  `gambarIcon_6` varchar(255) DEFAULT NULL,
  `gambarIcon_7` varchar(255) DEFAULT NULL,
  `gambarIcon_8` varchar(255) DEFAULT NULL,
  `gambarIcon_9` varchar(255) DEFAULT NULL,
  `gambarProjek_1` varchar(255) DEFAULT NULL,
  `gambarProjek_2` varchar(255) DEFAULT NULL,
  `gambarProjek_3` varchar(255) DEFAULT NULL,
  `gambarProjek_4` varchar(255) DEFAULT NULL,
  `gambarProjek_5` varchar(255) DEFAULT NULL,
  `gambarProjek_6` varchar(255) DEFAULT NULL,
  `gambarProjek_7` varchar(255) DEFAULT NULL,
  `gambarProjek_8` varchar(255) DEFAULT NULL,
  `gambarProjek_9` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailprojek`
--

INSERT INTO `detailprojek` (`id`, `gambar_flyer`, `title_1`, `title_2`, `desk_1`, `gambar_1`, `desk_2`, `desk_3`, `link_projek`, `gambarIcon_1`, `gambarIcon_2`, `gambarIcon_3`, `gambarIcon_4`, `gambarIcon_5`, `gambarIcon_6`, `gambarIcon_7`, `gambarIcon_8`, `gambarIcon_9`, `gambarProjek_1`, `gambarProjek_2`, `gambarProjek_3`, `gambarProjek_4`, `gambarProjek_5`, `gambarProjek_6`, `gambarProjek_7`, `gambarProjek_8`, `gambarProjek_9`, `created_at`, `updated_at`) VALUES
(1, 'images/1736508516621-Probioware.png', 'PT Biofarma (Persero)', 'Probioware', 'Probioware merupakan sebuah web aplikasi inventaris PT Biofarma, web ini dapat digunakan dalam mendata barang baru dan lama yang ada pada PT Biofarma.', 'images/1736508516628-mockup_Probioware.png', 'Probioware dikembangkan menggunakan beberapa tools yaitu figma sebagai desain UI berbentuk prototype, boostrap sebagai implementasi tampilan UI, dan laravel sebagai framework pengembangan', 'Pada projek ini saya ditempatkan sebagai frontend developer serta desainer UI', 'https://respiracare.humicprototyping.com/', 'images/1736508648916-Bootstrap_logo.png', 'images/1736508648918-Laravel-Logo.png', 'images/1736508648919-figma.png', NULL, NULL, NULL, NULL, NULL, NULL, 'images/1736508610850-Probioware.png', 'images/1736508610851-Probioware.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-10 03:28:36', '2025-01-10 03:35:41');

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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CV_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `CV_name`, `path`, `created_at`, `updated_at`) VALUES
(4, '1736494444_TP_MOD_13_PPL_1302210056_MUHAMMAD RISKY FARHAN.pdf', 'C:\\Users\\HP\\Documents\\Semester 8\\Portofolio\\Web Portofolio\\portofolio\\public\\files\\1736494444_TP_MOD_13_PPL_1302210056_MUHAMMAD RISKY FARHAN.pdf', '2025-01-09 23:34:04', '2025-01-09 23:34:04');

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_01_07_092348_create_skills_table', 1),
(4, '2025_01_07_155551_create_users_table', 1),
(5, '2025_01_07_161000_create_sessions_table', 1),
(6, '2025_01_08_070844_detail_projek', 1),
(7, '2025_01_08_085830_projek_image', 2),
(8, '2025_01_08_085957_projek_icon', 2),
(9, '2025_01_08_092422_sertifikat', 3),
(10, '2025_01_09_013538_detail_projek', 4),
(11, '2025_01_09_042751_create_gambar_projek_table', 5),
(12, '2025_01_09_054335_create_gambar_projek_table', 6),
(13, '2025_01_09_081002_detail_projek', 7),
(14, '2025_01_10_053650_detail_projek', 8),
(15, '2025_01_10_055340_cv', 9),
(16, '2025_01_10_065022_cv', 10),
(17, '2025_01_10_105439_detail_projek', 11);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar_1` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `gambar_1`, `title`, `description`, `created_at`, `updated_at`) VALUES
(12, 'images/1736488263466-Biofarma.png', 'PT. Biofarma (Persero)', 'Sertifikat kerja praktik pada PT Biofarma periode 2024', '2025-01-09 21:51:03', '2025-01-09 21:51:03'),
(13, 'images/1736488317690-Eks_UkmKalimantan.png', 'Kepala divisi eksternal', 'Sertifikat kepengurusan UKM Kalimatan tahun 2022-2023', '2025-01-09 21:51:57', '2025-01-09 21:51:57'),
(14, 'images/1736488380997-WRAP.png', 'Work Ready Program', 'Sertifikat kegiatan WRAP sebagai frontend developer tahun 2023', '2025-01-09 21:53:01', '2025-01-09 21:53:01');

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
('IpPRwjnL8lU0tJKJoPnPayVDdO9k4yII0mkrbBGL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWcwQ2w2UEFQc1NsZXJ6amV5ZXVHdUV4bWN1MGVTVzZUYmZYVm1HSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736508968);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Desain UI', 'bi-app-indicator', 'memiliki pengalaman dalam membuat sebuah desain website menggunakan figma', '2025-01-07 23:41:08', '2025-01-07 23:41:08'),
(19, 'Web Dev', 'bi-activity', 'memiliki pengalaman dalam mengembangkan website dengan menggunakan Laravel dan CI3', '2025-01-08 16:45:00', '2025-01-08 16:45:00'),
(22, 'Ngomel', 'bi-apple', 'Atika', '2025-01-08 19:57:28', '2025-01-08 19:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'risky@admin.com', '$2y$12$bqAWT4K6NJkw7diIaJWY8uNe1yHBY0YM3Ndq.UuE7tWsaTRlBgcvO', '2025-01-07 23:13:18', '2025-01-07 23:13:18');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `detailprojek`
--
ALTER TABLE `detailprojek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
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
-- AUTO_INCREMENT for table `detailprojek`
--
ALTER TABLE `detailprojek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
