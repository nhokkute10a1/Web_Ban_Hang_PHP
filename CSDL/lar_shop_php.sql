-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2017 at 04:49 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lar_shop_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdondathang`
--

CREATE TABLE `chitietdondathang` (
  `id` int(10) UNSIGNED NOT NULL,
  `IdDonDatHang` int(10) UNSIGNED NOT NULL,
  `IdSanPham` int(10) UNSIGNED NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT '0',
  `GiaBan` decimal(18,3) NOT NULL,
  `ThanhTien` decimal(18,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE `dondathang` (
  `id` int(10) UNSIGNED NOT NULL,
  `NgayDat` datetime NOT NULL,
  `NgayGiao` datetime NOT NULL,
  `DaThanhToan` tinyint(4) NOT NULL DEFAULT '0',
  `TinhTrangGiao` tinyint(4) NOT NULL DEFAULT '0',
  `IdUser` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenLoai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `TenLoai`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', '2017-04-03 18:08:44', '2017-04-03 18:08:44'),
(2, 'Laptop', '2017-04-04 00:55:10', '2017-04-04 00:55:10'),
(3, 'Thiết bị mạng', '2017-04-04 00:55:19', '2017-04-04 00:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2017_03_19_075242_create_LoaiSanPham_table', 1),
(25, '2017_03_19_075337_create_NhaSanXuat_table', 1),
(26, '2017_03_19_075537_create_SanPham_table', 1),
(27, '2017_03_19_075648_create_DonDatHang_table', 1),
(28, '2017_03_19_075705_create_ChiTietDonDatHang_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenNhaSanXuat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`id`, `TenNhaSanXuat`, `DiaChi`, `SDT`, `created_at`, `updated_at`) VALUES
(1, 'Dell', 'áđà', '123456', '2017-04-03 18:08:55', '2017-04-03 18:08:55'),
(2, 'HP', 'áđá', '123124', '2017-04-04 00:55:32', '2017-04-04 00:55:32'),
(3, 'Sony', 'đasad', '12434543', '2017-04-04 00:55:44', '2017-04-04 00:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `IdLoai` int(10) UNSIGNED NOT NULL,
  `IdNsx` int(10) UNSIGNED NOT NULL,
  `TenSanPham` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `GiaBan` decimal(18,3) NOT NULL,
  `Mota` text COLLATE utf8_unicode_ci NOT NULL,
  `NgayCapNhap` datetime NOT NULL,
  `HinhAnh` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT '0',
  `Vip` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `IdLoai`, `IdNsx`, `TenSanPham`, `GiaBan`, `Mota`, `NgayCapNhap`, `HinhAnh`, `SoLuong`, `Vip`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'sdfsd', '1.000', '<p>&aacute;đ&aacute;</p>', '2017-04-04 00:00:00', '17105690_1429046480453401_1391318639_n.png', 1, 1, '2017-04-03 18:09:10', '2017-04-03 18:46:19'),
(2, 1, 1, 'May tinh 9', '1.000', '<p>aaaaaa</p>', '2017-04-04 00:00:00', '5-When-life-puts-you-in-tough-situations-dont-say-Why-me-just-say-Try-me.jpg', 1, 0, '2017-04-03 18:16:43', '2017-04-04 00:41:59'),
(3, 1, 1, 'âsdsdsds', '1.000', '<p>sads</p>', '2017-04-04 00:00:00', '1-1.jpg', 1, 1, '2017-04-03 18:17:20', '2017-04-04 00:56:25'),
(4, 2, 2, 'sản phẩm 1', '12233.000', '<p>sgfdsfsdf</p>', '2017-04-04 00:00:00', '16189_400833416753122_2372186676633907451_n.jpg', 11, 1, '2017-04-04 00:56:15', '2017-04-04 00:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `Ho` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `Ho`, `Ten`, `DiaChi`, `SDT`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'dfsdf', 'dfsdf', 'dfsdf', '1434234', 1, '$2y$10$3c2E6bV08mIsvszKg6MEyeq65S0cQSznH/RcpRKohGElKuEXKh/rW', NULL, '2017-04-03 18:08:20', '2017-04-03 18:08:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietdondathang_iddondathang_foreign` (`IdDonDatHang`),
  ADD KEY `chitietdondathang_idsanpham_foreign` (`IdSanPham`);

--
-- Indexes for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dondathang_iduser_foreign` (`IdUser`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loaisanpham_tenloai_unique` (`TenLoai`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nhasanxuat_tennhasanxuat_unique` (`TenNhaSanXuat`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_idloai_foreign` (`IdLoai`),
  ADD KEY `sanpham_idnsx_foreign` (`IdNsx`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  ADD CONSTRAINT `chitietdondathang_iddondathang_foreign` FOREIGN KEY (`IdDonDatHang`) REFERENCES `dondathang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdondathang_idsanpham_foreign` FOREIGN KEY (`IdSanPham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `dondathang_iduser_foreign` FOREIGN KEY (`IdUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_idloai_foreign` FOREIGN KEY (`IdLoai`) REFERENCES `loaisanpham` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanpham_idnsx_foreign` FOREIGN KEY (`IdNsx`) REFERENCES `nhasanxuat` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
