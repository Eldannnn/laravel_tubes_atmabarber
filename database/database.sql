-- ========================================================
-- Database Schema & Initial Data for ATMA BARBER (Tubes)
-- Database Name: laravel_tubes_atmabarber / laravel_tubes
-- Generated automatically for Laravel + Flutter integration
-- ========================================================

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";

-- --------------------------------------------------------
-- Table structure for `pelanggans`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `pelanggans`;
CREATE TABLE `pelanggans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pelanggans_username_unique` (`username`),
  UNIQUE KEY `pelanggans_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `barbers`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `barbers`;
CREATE TABLE `barbers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_barber` varchar(255) NOT NULL,
  `kontak_barber` varchar(20) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT 'Professional Barber Specialist',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `layanan` (Master Katalog Layanan Unik)
-- --------------------------------------------------------
DROP TABLE IF EXISTS `barber_layanan`;
DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_layanan` varchar(100) NOT NULL,
  `tarif` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `deskripsi_layanan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `layanan_jenis_layanan_unique` (`jenis_layanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `barber_layanan` (Pivot Many-to-Many)
-- 1 Barber bisa memiliki > 1 Layanan, 1 Layanan bisa dimiliki banyak Barber
-- --------------------------------------------------------
CREATE TABLE `barber_layanan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_barber` bigint(20) unsigned NOT NULL,
  `id_layanan` bigint(20) unsigned NOT NULL,
  `tarif_khusus` decimal(10, 2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barber_layanan_unique` (`id_barber`, `id_layanan`),
  KEY `barber_layanan_id_barber_foreign` (`id_barber`),
  KEY `barber_layanan_id_layanan_foreign` (`id_layanan`),
  CONSTRAINT `barber_layanan_id_barber_foreign` FOREIGN KEY (`id_barber`) REFERENCES `barbers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `barber_layanan_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `pesanans`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `pesanans`;
CREATE TABLE `pesanans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelanggan` bigint(20) unsigned DEFAULT NULL,
  `id_barber` bigint(20) unsigned DEFAULT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `total_harga` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `layanan_ambil` varchar(255) DEFAULT NULL,
  `kode_booking` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pesanans_kode_booking_unique` (`kode_booking`),
  KEY `pesanans_id_pelanggan_foreign` (`id_pelanggan`),
  KEY `pesanans_id_barber_foreign` (`id_barber`),
  CONSTRAINT `pesanans_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggans` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pesanans_id_barber_foreign` FOREIGN KEY (`id_barber`) REFERENCES `barbers` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `reviews`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelanggan` bigint(20) unsigned DEFAULT NULL,
  `id_barber` bigint(20) unsigned DEFAULT NULL,
  `id_pesanan` bigint(20) unsigned DEFAULT NULL,
  `id_history` bigint(20) unsigned DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `nama_barber` varchar(255) DEFAULT NULL,
  `jenis_layanan` varchar(255) DEFAULT NULL,
  `rating` tinyint(3) unsigned NOT NULL DEFAULT 5,
  `komentar` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `reviews_id_pelanggan_foreign` (`id_pelanggan`),
  KEY `reviews_id_barber_foreign` (`id_barber`),
  KEY `reviews_id_pesanan_foreign` (`id_pesanan`),
  CONSTRAINT `reviews_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_id_barber_foreign` FOREIGN KEY (`id_barber`) REFERENCES `barbers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `reviews_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanans` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `histories`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `histories`;
CREATE TABLE `histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ID_pengguna` bigint(20) unsigned NOT NULL,
  `ID_pesanan` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `transaksis`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `transaksis`;
CREATE TABLE `transaksis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `total_harga` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `personal_access_tokens` (Sanctum)
-- --------------------------------------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `users` (Core Laravel)
-- --------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `password_reset_tokens`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `sessions`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- SEED / INITIAL DUMMY DATA FOR TESTING
-- ========================================================

-- Sample Barbers
INSERT INTO `barbers` (`id`, `nama_barber`, `kontak_barber`, `deskripsi`) VALUES
(1, 'Alex Rivers', '081234567891', 'Senior Stylist & Fade Master with 7 years experience'),
(2, 'Budi Santoso', '081234567892', 'Classic Gentlemen Cut & Hot Towel Shave Expert'),
(3, 'David Kurnia', '081234567893', 'Modern Beard Sculpting & Hair Tattoo Specialist'),
(4, 'Reza Pratama', '081234567894', 'Creative Hair Coloring & Texture Specialist');

-- Master 6 Layanan Resmi
INSERT INTO `layanan` (`id`, `jenis_layanan`, `tarif`, `deskripsi_layanan`) VALUES
(1, 'Haircut', 50000.00, 'Potong rambut rapi dan stylish sesuai tren kekinian'),
(2, 'Treatment', 40000.00, 'Perawatan rambut lengkap, creambath & hair spa relaksasi'),
(3, 'Mustache', 20000.00, 'Perapihan dan grooming kumis profesional'),
(4, 'Coloring', 85000.00, 'Pewarnaan rambut trendi berkualitas premium'),
(5, 'Beard', 30000.00, 'Perawatan, trim dan pembentukan jenggot maskulin'),
(6, 'Shaving', 25000.00, 'Cukur halus higienis dengan teknik handuk hangat');

-- Relasi Barber - Layanan (Satu Barber Memiliki Banyak Layanan)
-- Barber 1: Alex Rivers (5 Layanan)
INSERT INTO `barber_layanan` (`id_barber`, `id_layanan`, `tarif_khusus`) VALUES
(1, 1, 50000.00),
(1, 2, 40000.00),
(1, 3, 20000.00),
(1, 5, 30000.00),
(1, 6, 25000.00);

-- Barber 2: Budi Santoso (4 Layanan)
INSERT INTO `barber_layanan` (`id_barber`, `id_layanan`, `tarif_khusus`) VALUES
(2, 1, 45000.00),
(2, 3, 20000.00),
(2, 5, 25000.00),
(2, 6, 25000.00);

-- Barber 3: David Kurnia (5 Layanan)
INSERT INTO `barber_layanan` (`id_barber`, `id_layanan`, `tarif_khusus`) VALUES
(3, 1, 50000.00),
(3, 2, 45000.00),
(3, 3, 25000.00),
(3, 4, 90000.00),
(3, 5, 35000.00);

-- Barber 4: Reza Pratama (4 Layanan)
INSERT INTO `barber_layanan` (`id_barber`, `id_layanan`, `tarif_khusus`) VALUES
(4, 1, 50000.00),
(4, 2, 40000.00),
(4, 4, 85000.00),
(4, 6, 25000.00);

-- Sample Pelanggan (Password: password123)
INSERT INTO `pelanggans` (`id`, `nama`, `username`, `email`, `telepon`, `password`) VALUES
(1, 'Eliandani', 'eliandani', 'eliandani@gmail.com', '081298765432', '$2y$10$ZkaeMqjMPSFdZVRJjMtmwu01yEtafdTpgzltodwPgaR5PcYCea2bu'),
(2, 'Pelanggan Demo', 'demo', 'demo@gmail.com', '081311223344', '$2y$10$ZkaeMqjMPSFdZVRJjMtmwu01yEtafdTpgzltodwPgaR5PcYCea2bu');

-- Sample Reviews
INSERT INTO `reviews` (`id`, `id_pelanggan`, `id_barber`, `id_pesanan`, `nama_pelanggan`, `nama_barber`, `jenis_layanan`, `rating`, `komentar`) VALUES
(1, 1, 1, 1, 'Eliandani', 'Alex Rivers', 'Haircut & Styling', 5, 'Pelayanan sangat memuaskan, potongan rambut rapi dan capster ramah!'),
(2, 2, 2, 2, 'Pelanggan Demo', 'Budi Santoso', 'Hot Towel Shave', 5, 'Shaving sangat nyaman dengan handuk hangat, pasti kembali lagi!');

-- Sample Pesanan
INSERT INTO `pesanans` (`id`, `id_pelanggan`, `id_barber`, `tanggal_pesanan`, `nama_pemesan`, `total_harga`, `layanan_ambil`, `kode_booking`, `status`) VALUES
(1, 1, 1, NOW(), 'Eliandani', 50000.00, 'Haircut & Styling', 'BOOK-001', 'Selesai'),
(2, 2, 2, NOW(), 'Pelanggan Demo', 35000.00, 'Hot Towel Shave', 'BOOK-002', 'Selesai');

SET FOREIGN_KEY_CHECKS = 1;
COMMIT;
