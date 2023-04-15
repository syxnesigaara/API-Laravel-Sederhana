-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 04:38 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelreact`
--
CREATE DATABASE IF NOT EXISTS `laravelreact` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laravelreact`;

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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori_produk` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori_produk`, `nama_kategori_produk`, `created_at`, `updated_at`) VALUES
(1, 'Pakaian', '2021-01-03 05:00:08', '2021-01-03 05:00:08'),
(2, 'Minuman', '2021-01-03 05:00:08', '2021-01-03 05:00:08'),
(3, 'Makanan', '2021-01-03 05:00:08', '2021-01-03 05:00:08');

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
(4, '2021_01_03_040822_produk', 1),
(5, '2021_01_03_040837_kategori', 1),
(6, '2021_01_03_040857_produk_fk', 1);

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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori_produk` bigint(20) UNSIGNED NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori_produk`, `harga_produk`, `foto_produk`, `created_at`, `updated_at`) VALUES
(2, 'Es Campur', 2, 15000, '5213463=s1280=h960.jpg', NULL, NULL),
(13, 'Botols', 1, 51000, 'ladiesigniter.jpg', NULL, NULL),
(14, 'Cucians', 3, 30000, 'foto.jpg', NULL, NULL),
(20, 'Testing', 2, 290000, 'naf.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `email`, `password`, `telp`, `jenis_kelamin`, `tanggal_lahir`, `foto_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Budi', 'budi@gmail.com', '$2y$10$.BrApMCnL3MLKLqlr9NqP.7yIFND.jEy3OYRr6mNLx2XCZeCuQL0y', '087546698236', 'Pria', '2018-01-12', 'preatoriandefrontier.png', '7xlvIpx0OoMX7JFRLsVC6wvaFaTkcSpuYJqMLZwwXX5jgLTBSNFfNwuYfwg7', NULL, NULL),
(3, 'Joni', 'joni@gmail.com', '$2y$10$4et7uvGh9uX5caW72YCkS.0zstsgosI1lvpzr4Yr.fEyNadHAqfzm', '087544462154', 'Pria', '2021-01-21', 'logo.jpg', 'erNYpdpRRzFT4c09qqx846ffOQxfidR9ro7C5Nbt7zmIkWiZbgpAXAtKTeug', NULL, NULL),
(4, 'Gogo', 'gogo@gmail.com', '$2y$10$ocOC5URgUNmwNntBZoh2ne/M5bM5WNF3bFHIxeCYBlmJzDRYKpr6K', '08754544554', 'Pria', '2021-01-29', 'foto2.jpg', 'QXXNfNkHRW30G8GR5KKhUQum1JFkQQgntWNKYpDqTyjZ5J7EKRwWifqbx3MG', NULL, NULL),
(5, 'Iqbal', 'iqbal@webhozz.com', '$2y$10$QiD4nFR1AlVzgG6ziQTkTeOzbtg13kaDL9hGNVzB4lJHtiNmRN3g2', '084536436437', 'Pria', '2021-01-01', 'ladiesigniter.jpg', 'ZtE5K0g2ivSuclpSn8BZrQVGmtZRtvu3Jb0OWpnxKiZbTISyfCyhMLO9RoUZ', NULL, NULL),
(6, 'Bobi', 'bobi@gmail.com', '$2y$10$KsP10.Ke1MpK6Mu64S1okeAMZOH5mV6OLXSbVIp0HbLShzP/ygbiC', '08774664445', 'Pria', '2021-01-07', 'logo.jpg', NULL, NULL, NULL),
(7, 'Dodi', 'dodi@gmail.com', '$2y$10$MPav1gHgwnS2O6c/TAHoGOwXiGwr9sHqvA456Jr0MFHHRqR/9Mhcu', '04884883636', 'Pria', '2021-01-14', 'logo.jpg', 'Gaxz05vle39nMeOM2I8y8RpvnirM9cSUL44i1XqiQPxHmvffzfYA4rbV2ux0', NULL, NULL),
(8, 'Jojon', 'jojon@gmail.com', '$2y$10$XPqt6OaghWAtv6CM04/Y/ujKOCKB3ffPFHDjiU59NCdUnVg4RiU9a', '0872773743', 'Pria', '2021-01-08', 'foto.jpg', 'e495VaCkJruxKRxFdVpgTi6dqBTDxAqEcsXl7B3DwbpdQ9hSqeNJxzz2VkBE', NULL, NULL),
(9, 'Lala', 'lala@gmail.com', '$2y$10$xzArt3XCP3ZctANKvJO5ze3RRrvx4RO06/SVAN8C60Knop02xlOSy', '08582836', 'Wanita', '2021-01-03', 'ladiesigniter.jpg', 'H5j2tgSuQc5w0VDatnQ1464erKBaBLEepJ8KqCXbBL93bI2ipKZkxWTxRqb7', NULL, NULL),
(11, 'Hena', 'hena@gmail.com', '$2y$10$eeJJrRDc.Jsurdqh.T3teeeoP5q6PHJfD1EfnD9aH.pdV/l2ISHiK', '0835562626622', 'Wanita', '2021-11-23', 'ladiesigniter.jpg', NULL, NULL, NULL),
(18, 'hena', 'hana@gmail.com', '$2y$10$.rqmng6AQ0z5tVoPMh4rbug7i1pX7tzQ4P7T9Zd19bVRnyzY37OZC', '082244455215', 'Wanita', '2021-11-29', 'logo.jpg', NULL, NULL, NULL);

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
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori_produk`);

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
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_id_kategori_produk_foreign` (`id_kategori_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
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
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_kategori_produk_foreign` FOREIGN KEY (`id_kategori_produk`) REFERENCES `kategori` (`id_kategori_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
