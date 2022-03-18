-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2021 at 06:37 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.20

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bayu`
--
DROP DATABASE IF EXISTS `bayu`;
CREATE DATABASE IF NOT EXISTS `bayu` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bayu`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `foto`, `telp`, `alamat`, `jabatan`, `password`, `remember_token`) VALUES
(1, 'Administrator', 'administrator@mail.com', 'Administrator.png', '0123456789', 'Pekalongan', 'HRD', '$2y$10$tCr5Rw54BbNE/ygWRD7a3ONNrCC.7ONMqHacVBMZtWrzI3jyWJNmG', '0W8K0gLDfD7bE6LaTAz1ZQQCRA3co0PnoXLHnh4KKxLmoom6bKDvqfIHNo7w'),
(2, 'Alexandra', 'alexandra@mail.com', 'Alexandra.png', '5258545555666', 'Jalan hasanudin  No.26 Pekalongan Jawa tengah', 'Manajer', '$2y$10$3lJUNFLiefpK1hWvsMA0oupiVpftktjjEqoCGUbtFO1d07TInsSJm', 'xpvi8tj8vMTLsgxqo4c7xKsMyOrKuJEXluvifD36KDSa5GzblexVDInmdpaP'),
(3, 'tina', 'tina@mail.com', 'tina.png', '0215552221', 'Jalan hasanudin  No.26 Pekalongan Jawa tengah', 'staff', '$2y$10$vWRGDA0SKTrsGaQPaCAIVucVeBFw/sWGARhp80WZII2prj9iec7fe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelamar_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `jawaban` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `pelamar_id`, `soal_id`, `jawaban`) VALUES
(1, 12, 1, 'a'),
(2, 12, 3, 'a'),
(3, 12, 4, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelamar_id` int(11) NOT NULL,
  `lowongan_id` int(11) NOT NULL,
  `nilai_ujian` int(11) NOT NULL DEFAULT '0',
  `nilai_wawancara` int(11) NOT NULL DEFAULT '0',
  `status` enum('daftar','proses','lulus','gagal') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id`, `pelamar_id`, `lowongan_id`, `nilai_ujian`, `nilai_wawancara`, `status`) VALUES
(1, 12, 3, 33, 100, 'lulus');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departemen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id`, `departemen`, `jabatan`, `gaji`, `deskripsi`) VALUES
(1, 'Marketing', 'Sekretaris', '1.000.000 - 2.500.0000', '<p>Deskripsi Pekerjaan: </p><p>· Mengatur agenda direksi </p><p>· Mengelola dokumen dan melakukan tugas administrative yang menjadi tanggung jawabnya </p><p>· Sebagai perantara komunikasi antara direksi dengan pihak eksternal melalui telepon, email, dan media komunikasi lainnya </p><p>· Mengelola aktivitas meeting perusahaan </p><p><br></p><p>Kualifikasi: </p><p>· Pendidikan D3/S1 Sekretaris </p><p>· Pengalaman di posisi yang sama minimal 1 tahun </p><p>· Mampu mengoperasikan komputer </p><p>· Familiar dengan teknologi komunikasi yang ada </p><p>· Kemampuan komunikasi baik. </p>'),
(2, 'Marketing', 'Staff Senior', '1.000.000 - 2.500.0000', '<p>1. Menjalankan perintah pimpinan </p><p>2. Sebagai penghubung antara para klien perusahaan</p><p>3. Mengatur dan menerima perintah dari atasan</p>'),
(3, 'Outlet', 'Outlet Manager', '1.000.000 - 2.500.0000', '<p>Description : </p><p>• The selected candidate will be responsible to operate and achieve sales target in Outlet of the designated area. Responsibilities include : </p><p>• Responsible for the market in designated area </p><p>• Collaborating with team to achieve sales targets and KPIs </p><p>• Daily reporting to head office Other requirements include : </p><p>• Maximum 35 years old, min. Bachelor degree (S-1). </p><p>• Minimum 1 year of experience in retail business</p><p>• Strong analytical skill and Comunication </p><p>• Expert knowledge in automotive industry would be advantages </p><p>• Proven track record in developing and maintaining outlet / branch </p><p>• Having knowledge in social media, online sales &amp; digital marketing </p><p>• Having experienced in marketing events or promotion activities would be an advantage </p><p>• Can work personally or as a team member without high supervisory </p><p>• Able to work under pressure</p>');

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
(4, '2020_09_06_031114_create_admins_table', 2),
(5, '2020_10_03_025140_create_sessions_table', 3),
(6, '2020_10_04_062329_create_settings_table', 4),
(7, '2020_10_06_011543_create_pages_table', 4),
(8, '2020_10_06_040934_create_page_details_table', 5),
(9, '2020_10_07_033358_create_social_links_table', 6),
(10, '2020_10_07_114506_create_media_files_table', 7),
(11, '2020_10_08_103446_create_questions_table', 8),
(12, '2020_10_09_025437_create_notifications_table', 8),
(13, '2020_10_09_043711_create_notifications_table', 9),
(14, '2020_10_10_134603_create_bussiness_types_table', 10),
(15, '2020_10_12_050455_create_user_documents_table', 11),
(16, '2020_10_12_055342_create_document_settings_table', 11),
(17, '2020_10_12_103845_create_documents_settings_table', 12),
(18, '2020_10_12_111056_create_user_documents_table', 13),
(19, '2020_10_15_040941_create_master_facilities_table', 14),
(20, '2020_10_15_044706_create_user_handlers_table', 14),
(21, '2020_10_15_045108_create_products_table', 15),
(22, '2020_10_15_045237_create_inquiries_table', 15),
(23, '2020_10_15_135537_create_product_variants_table', 15),
(24, '2020_10_16_060741_create_product_types_table', 15),
(25, '2020_10_16_092833_create_orders_table', 16),
(26, '2020_10_16_113437_create_order_details_table', 16),
(27, '2020_10_16_133757_create_product_images_table', 16),
(28, '2020_10_16_162854_create_product_facilities_table', 17),
(29, '2021_03_11_154206_create_soals_table', 18),
(30, '2021_03_12_185508_create_jawabans_table', 18),
(31, '2021_03_15_130237_create_lowongans_table', 18),
(32, '2021_03_15_131344_create_lamarans_table', 18),
(33, '2021_03_17_065053_create_settings_table', 19),
(34, '2021_04_08_151143_create_departemens_table', 19),
(35, '2021_04_08_151537_create_jabatans_table', 19);

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
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id`, `nama`, `email`, `telp`, `alamat`, `tempat_lahir`, `tgl_lahir`, `foto`, `cv`, `email_verified_at`, `password`, `remember_token`) VALUES
(1, 'User 1', 'user1@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$0A0a92iDzI6snZ63DfB0iuioSLDF2Ftu9q74NWm9yr978.kYTUmNS', NULL),
(12, 'Rizal SK', 'rizalmasyhadi@gmail.com', '555666666', 'Jalan hasanudin  No.26 Pekalongan Jawa tengah', 'Pekalongan', '2021-04-01', 'Rizal SK.jpg', NULL, NULL, '$2y$10$0A0a92iDzI6snZ63DfB0iuioSLDF2Ftu9q74NWm9yr978.kYTUmNS', '9Em8b6zhzbraD4pjsMT8zHEATvCSrsb8Qu3FGlSBlOEyCnejT0mdU9pApZpk'),
(13, 'Wiro', 'wiro@email.com', '10021211555', NULL, 'Denpasar', '2021-04-12', 'Wiro.jpg', NULL, NULL, '$2y$10$0A0a92iDzI6snZ63DfB0iuioSLDF2Ftu9q74NWm9yr978.kYTUmNS', NULL),
(14, 'Tono', 'tono@mail.com', '10021211555', NULL, 'Jakarta', '2021-04-23', 'Tono.jpg', NULL, NULL, '$2y$10$0A0a92iDzI6snZ63DfB0iuioSLDF2Ftu9q74NWm9yr978.kYTUmNS', NULL),
(20, 'Jihan', 'jihan@mail.com', '5258545555666', NULL, 'Jakarta', '2021-04-21', 'Jihan.jpg', NULL, NULL, '$2y$10$0A0a92iDzI6snZ63DfB0iuioSLDF2Ftu9q74NWm9yr978.kYTUmNS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `d` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` enum('a','b','c','d') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'a',
  `menit` tinyint(4) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `soal`, `a`, `b`, `c`, `d`, `jawaban`, `menit`) VALUES
(1, '1,3,5,...?', '7', '3', '5', '2', 'a', 1),
(3, '5x5 = ...?', '23', '24', '25', '26', 'c', 5),
(4, '<p>2x2 = ...</p>', '1', '3', '4', '5', 'c', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
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
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
