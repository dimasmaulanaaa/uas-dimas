-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 03:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

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
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(10) UNSIGNED NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `province_id`, `updated_at`, `created_at`, `name`) VALUES
(1, 1, NULL, NULL, 'Jakarta selatan'),
(2, 1, NULL, NULL, 'Jakarta Barat'),
(3, 2, NULL, NULL, 'Bandung'),
(4, 2, NULL, NULL, 'Depok'),
(5, 1, NULL, NULL, 'Kepulauan Seribu');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_12_040902_create_propinsi_table', 1),
(6, '2023_07_12_040907_create_kota_table', 1),
(7, '2023_07_12_040911_create_penduduk_table', 1);

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
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` int(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `umur_bulan` int(4) DEFAULT NULL,
  `propinsi_id` int(10) UNSIGNED DEFAULT NULL,
  `kota_id` int(10) UNSIGNED DEFAULT NULL,
  `alamat_pasien` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `nik`, `nama`, `jenis_kelamin`, `tgl_lahir`, `umur_bulan`, `propinsi_id`, `kota_id`, `alamat_pasien`, `created_at`, `updated_at`) VALUES
(4, 2147483647, 'belinda', 'Perempuan', '1992-11-03', 368, 2, 3, 'asda121', '2023-07-12 07:26:36', '2023-07-13 06:35:16'),
(5, 2147483647, 'aeq', 'Laki-Laki', '2022-07-05', 12, 1, 1, NULL, '2023-07-12 09:04:49', '2023-07-12 09:04:49'),
(6, 23141211, 'asra', 'Perempuan', '2022-10-05', 9, 2, 3, NULL, '2023-07-12 09:29:27', '2023-07-12 09:29:27'),
(7, 21474836, 'budi', 'Laki-Laki', '1950-11-03', 872, 1, 2, 'asda12', '2023-07-12 10:02:54', '2023-07-13 06:35:30'),
(9, 1231245, 'wertq', 'Perempuan', '2004-12-12', 223, 2, 3, 'eqwe12', '2023-07-12 10:47:55', '2023-07-12 11:26:20'),
(10, 2147483, 'gsdf', 'Laki-Laki', '2007-07-05', 192, 1, 2, 'djaads', '2023-07-13 06:34:20', '2023-07-13 06:34:20'),
(11, 2123141234, 'john', 'Laki-Laki', '1984-07-03', 468, 2, 4, 'sdhyjtrht', '2023-07-13 06:42:41', '2023-07-13 06:42:41');

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
-- Table structure for table `propinsi`
--

CREATE TABLE `propinsi` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propinsi`
--

INSERT INTO `propinsi` (`id`, `name`) VALUES
(1, 'Jakarta'),
(2, 'Jawa Barat'),
(3, 'Jawa Tengah');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'john', 'admin@app.com', NULL, 'admin123', NULL, NULL, NULL),
(3, 'john', 'john@app.com', NULL, '$2y$10$7LkLsrtuHa1cSA/dmiGGKuIuOhggebr7dVcyRDNG3QTe/w.CIhPIm', NULL, '2023-07-11 22:41:46', '2023-07-11 22:41:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

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
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propinsi_id` (`propinsi_id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `propinsi`
--
ALTER TABLE `propinsi`
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
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `propinsi`
--
ALTER TABLE `propinsi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `propinsi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `penduduk_ibfk_1` FOREIGN KEY (`propinsi_id`) REFERENCES `propinsi` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `penduduk_ibfk_2` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
