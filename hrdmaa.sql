-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2019 at 09:38 AM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrdmaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id_ac` int(10) NOT NULL,
  `id_pivot` int(11) DEFAULT '0',
  `id_fptk` int(10) DEFAULT '0',
  `nik` varchar(100) NOT NULL,
  `id_seleksi` int(5) NOT NULL,
  `hasil` char(50) DEFAULT 'Belum Ada Hasil',
  `keterangan` text,
  `tgl_panggilan` datetime DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bagians`
--

CREATE TABLE IF NOT EXISTS `bagians` (
  `id_bagian` int(11) unsigned NOT NULL,
  `nama_bagian` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagians`
--

INSERT INTO `bagians` (`id_bagian`, `nama_bagian`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN KREDIT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ADMIN PEMASARAN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'ADMIN PEMASARAN KPMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'ADMIN PENAGIHAN ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'ADMIN PENAGIHAN & KMK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'ADMIN PINJAMAN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'ANALIS KREDIT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'ANALISA KREDIT & PENJUALAN KKL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'BISNIS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'DANA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'DANA & KONSUMER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'DIRKOM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'KAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'KAS MOBKAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'KAS VALAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'KKL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'KMK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'KOMERSIAL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'KOMISARIS INDEPENDEN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'KONSUMER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'KPMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'LITIGASI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'OPERASIONAL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'PELAYANAN NASABAH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'PEMASARAN KMK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'PEMASARAN KPMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'PENAGIHAN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'PENANGANAN KRD BRMSLH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'PENGEMBANGAN BISNIS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'PENGIKATAN KREDIT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'PENJUALAN KKL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'PENJUALAN KKL & KPR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'PENJUALAN KPR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'REV.KRD.&TKSASI AGUNAN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'SA DANA, KONSUMER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'SDM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'SEKRETARIS PERUSAHAAN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'SENTRALISASI OPERASIONAL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'SIM & TI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'SKAI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'SKKMR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'TREASURY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'UMUM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'SEKRETARIS BISNIS', '2018-01-08 05:23:21', '2018-01-08 05:23:21'),
(45, 'BUSSINESS SUPPORT', '2018-01-08 05:24:47', '2018-01-08 05:24:47'),
(46, 'LEGAL COORPORATE', '2018-01-08 05:25:03', '2018-01-08 05:25:03'),
(47, 'KPR & KKL', '2018-01-08 05:30:24', '2018-01-08 05:30:24'),
(48, 'ADMIN DEPOSITO', '2018-01-08 05:59:40', '2018-01-08 05:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `cabangs`
--

CREATE TABLE IF NOT EXISTS `cabangs` (
  `id_cabang` int(3) unsigned NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabangs`
--

INSERT INTO `cabangs` (`id_cabang`, `nama_cabang`, `created_at`, `updated_at`) VALUES
(1, 'Kantor Cabang Utama', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Kantor Cabang Majapahit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Kantor Cabang Ungaran', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Kantor Cabang Pati', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Kantor Cabang Ngaliyan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Kantor Cabang Boyolali', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Kantor Cabang Wolmon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'KPNO', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fptk`
--

CREATE TABLE IF NOT EXISTS `fptk` (
  `id` int(10) NOT NULL,
  `id_bagian` int(11) unsigned NOT NULL,
  `grade` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `divisi` varchar(50) DEFAULT NULL,
  `id_cabang` int(3) unsigned NOT NULL,
  `keperluan` varchar(20) NOT NULL,
  `ket_keperluan` text NOT NULL,
  `status_karyawan` varchar(20) NOT NULL,
  `jns_kel` varchar(15) NOT NULL,
  `stat_pernikahan` varchar(15) NOT NULL,
  `pend` varchar(5) NOT NULL,
  `pengalaman_kerja` text NOT NULL,
  `min_pengalaman` int(3) DEFAULT NULL,
  `syarat_wajib` text NOT NULL,
  `syarat_dukung` text NOT NULL,
  `uraian_tugas` text NOT NULL,
  `status_acc` char(50) DEFAULT 'Menunggu Persetujuan',
  `keterangan_acc` text,
  `tgl_acc` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fptk_pelamar`
--

CREATE TABLE IF NOT EXISTS `fptk_pelamar` (
  `id` int(11) NOT NULL,
  `nik` varchar(100) DEFAULT '0',
  `idfptk` int(10) DEFAULT '0',
  `gelombang` int(10) DEFAULT '0',
  `status` int(10) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE IF NOT EXISTS `jabatans` (
  `id_jabatan` int(10) unsigned NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(10, 'Sopir', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Staff & Sopir', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Satpam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Staff', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Senior Staff', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'PJS Kasie', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'PJS Kepala Marketing', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Kepala Seksi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Waka', '2017-10-25 12:04:50', '2017-10-25 12:04:50'),
(22, 'Kepala Operasional', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Kepala Bagian', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Kepala Cabang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Kepala Devisi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Direktur Bisnis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Direktur Kepatuhan dan Operasional', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Direktur Utama', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Komisaris', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Komisaris Utama', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jns_tes`
--

CREATE TABLE IF NOT EXISTS `jns_tes` (
  `id` int(10) NOT NULL,
  `nama_tes` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jns_tes`
--

INSERT INTO `jns_tes` (`id`, `nama_tes`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Proses Seleksi', 'Kata', '2018-08-30 03:20:31', '2018-08-30 03:20:32'),
(2, 'UnProses', 'Kata', '2018-08-30 03:20:48', '2018-08-30 03:20:47'),
(3, 'Pindah FPTK', 'Kata', '2018-08-30 03:21:02', '2018-08-30 03:21:03'),
(4, 'Panggilan', 'Tes', '2018-09-04 18:53:00', '2018-09-04 18:53:00'),
(5, 'Interview HRD', 'Tes', '2018-09-04 18:53:00', '2019-01-16 21:24:01'),
(6, 'Psikotes', 'Tes', '2018-09-18 00:21:45', '2018-09-18 00:21:45'),
(7, 'SLIK', 'Tes', '2019-01-16 21:26:43', '2019-01-16 21:26:43'),
(8, 'Interview User', 'Tes', '2019-01-16 21:26:43', '2019-01-16 21:26:43'),
(9, 'Grafologi Untuk Kabag Keatas', 'Tes', '2019-01-16 21:26:43', '2019-01-16 21:26:43'),
(10, 'Litsus', 'Tes', '2019-01-16 21:26:43', '2019-01-16 21:26:43'),
(11, 'OL PKWT', 'Tes', '2019-01-16 21:26:43', '2019-01-16 21:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
  `id` int(5) NOT NULL,
  `nama_lowongan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE IF NOT EXISTS `pelamar` (
  `nik` varchar(100) NOT NULL,
  `idpelamar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jns_kel` varchar(15) NOT NULL,
  `stat_pernikahan` varchar(20) NOT NULL,
  `id_lowongan` int(5) DEFAULT NULL,
  `alamat_ktp` text NOT NULL,
  `alamat_domisili` text NOT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `pend_terakhir` varchar(100) NOT NULL,
  `tgl_masuk_lamaran` date DEFAULT NULL,
  `tgl_masuk_kerja` date DEFAULT NULL,
  `status_akhir` enum('0','1','2') DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_kerja`
--

CREATE TABLE IF NOT EXISTS `pengalaman_kerja` (
  `id` int(5) NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `nm_perusahaan` varchar(100) DEFAULT NULL,
  `jangka_kerja` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_file`
--

CREATE TABLE IF NOT EXISTS `upload_file` (
  `id` int(10) NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `cv` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ktp` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `kk` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ijazah` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `srt_pengalaman` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `nip` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelamin` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ktp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '2',
  `id_jabatan` int(10) unsigned DEFAULT NULL,
  `id_bagian` int(11) unsigned DEFAULT NULL,
  `id_cabang` int(11) unsigned DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `status_karyawan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` tinyint(4) NOT NULL DEFAULT '1',
  `avatar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2222 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `nama`, `kelamin`, `no_ktp`, `agama`, `no_hp`, `role`, `id_jabatan`, `id_bagian`, `id_cabang`, `tgl_lahir`, `alamat`, `tgl_masuk`, `status_karyawan`, `email`, `status_user`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1930, '014050417', 'AAN KUSUMANINGTYAS', 'Perempuan', '3374026512900001', 'Islam', '085641125644', 2, 13, 24, 1, '1990-12-23', 'Jl. Erowati Baru I/131 RT 004 RW 008, Kel. Bulu Lor, Semarang Utara', '2014-05-22', 'Tetap', 'none@none.com', 1, '014050417.JPG', '$2y$10$krD1ZLHkFTys5xR96cEzT.oNzm18bHSZRaE0ggk8UpRc/4Y.gXkj6', 'jrTISeNI8FRj1m8qgDJOUwEcvmMJ7eMB90D8GRK31pWUS47Rlzuqr7jieMQY', '2017-10-11 15:55:50', '2017-10-26 09:55:01'),
(1931, '014060420', 'ABDUL QODIR ZAELANI', 'Laki-Laki', '3374020707870001', 'Islam', '082133547171', 2, 13, 17, 1, '1987-07-07', 'Jl. Setiyaki Tengah II no. 7 RW 06 RW 07, Bulu Lor, Semarang Utara', '2014-06-02', 'Tetap', NULL, 1, '014060420.jpg', '$2y$10$vy35rOkcNyT2mMzYxQXoFOOLanWlUZaaF75NTG2YJCC4dnZmoAMc.', NULL, '2017-10-11 15:55:50', '2017-12-15 08:42:15'),
(1932, '012020198', 'AJI MUHAMMAD SUTOPO', 'Laki-Laki', '3374042611760001', 'Islam', '085740730207', 2, 13, 32, 1, '1976-11-26', 'Jl. Kenconowungu Dalam I RT 003 RW 004, Karangayu, Semarang Barat', '2012-02-15', 'Tetap', NULL, 1, '012020198.jpg', '$2y$10$Fohf8Wyt3AQHJy8oeSEF/.ulqqlI1KiEUlXd1GAlHI11TIb.e8BfK', NULL, '2017-10-11 15:55:50', '2017-10-11 15:55:50'),
(1933, '011040142', 'ALI MAS UD', 'Laki-Laki', '3374060311760006', 'Islam', '08156682818', 2, 13, 17, 1, '1976-11-03', 'Jl. Sedayu Melati, Perum Shima Regency B-8 RT 005 RW 001, Bangetayu Kulon, Semarang', '2011-04-15', 'Tetap', NULL, 1, '011040142.jpg', '$2y$10$V2DS/0ImDSkKepBIkjKMvO29qUxzulHdDVEy455Cu1KT2Zk06IoS.', NULL, '2017-10-11 15:55:50', '2017-12-15 08:44:55'),
(1934, '00406026', 'ANDY MARDIYANTO', 'Laki-Laki', '3374021803780006', 'Katholik', '085101304462', 2, 13, 27, 1, '1978-03-18', 'Jl. Sumber Mas I/41 RT 001 RW 005, Panggung Kidul, Semarang Utara', '2006-04-12', 'Tetap', NULL, 1, '00406026.jpg', '$2y$10$rjXUwdADlkNyDrZzsbsaI.Mxxd0Nazs1cqU5DJJI8neN.Qousm7lS', NULL, '2017-10-11 15:55:50', '2017-10-11 15:55:50'),
(1935, '017080608', 'ANISA FAUZIA', 'Perempuan', '3374084808930002', 'Islam', '083838921577', 2, 13, 5, 1, '1993-08-08', 'JL. KALIWIEU III/4-BRT 02/ RW 02 DESA KALIWIRU KEC. CANDISARI', '2017-08-04', 'Kontrak', NULL, 1, '017080608.jpg', '$2y$10$uSNj2l4sdmrOrTkvuawazeVvBcgTyJHTROlaN3hqj8J0..pBtM1ZO', NULL, '2017-10-11 15:55:51', '2017-10-11 15:55:51'),
(1936, '017090623', 'ANTONIUS AGUNG KRISTIAN RAJINISWANTA', 'Laki-Laki', '3374101106940001', 'Katholik', '083842996512', 2, 13, 13, 1, '1994-06-11', 'JL. DURIAN UTARA III RT 001/ RW 002, DESA PEDALANGAN, KEC. BANYUMANIK, KAB. SEMARANG', '2017-10-02', 'Kontrak', NULL, 1, '017090623.jpg', '$2y$10$sSjjVp9Xj7qGcU8zxYsOd.epKW1B3Qy4YRgNivk2oWJxCgxuze62G', NULL, '2017-10-11 15:55:51', '2017-10-11 15:55:51'),
(1937, '017050596', 'APRILIA INTAN QURNIA', 'Perempuan', '3374107004950001', 'Islam', '081510180734', 2, 13, 13, 1, '1995-04-30', 'JL. KABARAYA NO.3 RT 03, RW 012, KEL. TANANG, KEC. TEMBALANG, KAB. SEMARANG', '2017-05-05', 'Kontrak', NULL, 1, '017050596.jpg', '$2y$10$UZw7SXM9seLitKWbHCnAOeH/Mse7CCn2d8vW69gccY1S/GeuRcnNi', NULL, '2017-10-11 15:55:51', '2017-10-11 15:55:51'),
(1938, '014040391', 'ARI SETYO AGUNG', 'Laki-Laki', '3374082601760001', 'Islam', '081325628640', 2, 13, 27, 1, '1976-01-26', 'Candi  Stom RT 005 RW 010, Candi, Candisari, Semarang', '2014-04-01', 'Tetap', NULL, 1, '014040391.jpg', '$2y$10$mLSsvGpcyk8H7zK5oM0b9.fZ0DX2aXIyNRPI/LhuwdzSMf3gOUDW6', NULL, '2017-10-11 15:55:51', '2017-10-11 15:55:51'),
(1940, '014050412', 'BAMBANG RIYADI', 'Laki-Laki', '3374072307800001', 'Islam', '081914445448', 2, 20, 27, 1, '1980-07-23', 'Jl. Gaharu Utara Dalam II/116 RT 006 RW 012, Srondol Wetan, Banyumanik, Semarang', '2014-05-07', 'Tetap', NULL, 1, '014050412.jpg', '$2y$10$v8kEUZZ9iR7pdm.PJth.XuDUebWXmUEjJIdUQXSL6qOFO96o4pCqC', NULL, '2017-10-11 15:55:51', '2017-10-11 15:55:51'),
(1943, '016040583', 'DIAN DWI MULYA', 'Laki-Laki', '3374062603870003', 'Kristen', '085640008413', 2, 13, 21, 1, '1987-03-26', 'Jl.Kamiluto VI/25 Rt.4 Rw.2 Muktiharjo Kidul Pedurungan', '2016-03-30', 'Tetap', NULL, 1, '016040583.jpg', '$2y$10$jKpvlrSO7iaKvqGdhwqIEeMRvpFjmX8EPjEFxGxhsE94IVeH3.kPm', NULL, '2017-10-11 15:55:52', '2017-11-04 02:31:50'),
(1944, '015010469', 'ELVINA LATIFAH', 'Perempuan', '3374114604900002', 'Islam', '082242281990', 2, 13, 15, 1, '1990-04-06', 'Jl. Trangkil RT 003 RW 002, Ngesrep, Semarang', '2015-01-15', 'Tetap', NULL, 1, '015010469.jpg', '$2y$10$tPs.QyOh0ghiIxQ.hwgHZelfGuK5XH8d5MYTXX9mc.x/wftvZKdg2', NULL, '2017-10-11 15:55:52', '2017-10-11 15:55:52'),
(1945, '011060153', 'GINA HANJARIANI', 'Perempuan', '3374127112860002', 'Islam', '085712544886', 2, 20, 30, 1, '1986-12-31', 'Taman Candi Mutiara Timur II / 536 RT 008 RW 006, Kalipancur, Ngaliyan, Semarang', '2011-06-03', 'Tetap', NULL, 1, '011060153.jpeg', '$2y$10$u7qXuni3EAwu4oYJANtdgeNJ/r1paOAyPuReBTYGjmufFG1w7j.fi', NULL, '2017-10-11 15:55:52', '2018-03-21 04:09:37'),
(1946, '012010192', 'GUNUNG NUGROHO', 'Laki-Laki', '3374022711770005', 'Islam', '081326146500', 2, 13, 1, 1, '1977-11-27', 'Jl. Tawangsari no. 62 RT 006 RW 001, Tanjungmas, Semarang Utara', '2012-01-31', 'Tetap', NULL, 1, '012010192.jpg', '$2y$10$ODYxORaJLpXRsL1jXlGMsewW4zF9zw0XcKYCz2r9j2Y5v3oO03bmi', NULL, '2017-10-11 15:55:52', '2017-10-11 15:55:52'),
(1947, '013060295', 'INDAH APRIANI', 'Perempuan', '3327085102830021', 'Islam', '082242752414', 2, 13, 3, 1, '1983-02-11', 'Sugihwaras  RT 003 RW 005, Sugihwaras, Pemalang', '2013-06-17', 'Tetap', NULL, 1, '013060295.jpg', '$2y$10$St3oaUTmqnLHHLq6NOP43eRuswZ7QxSBmWQk.zwG12aiG9r5kJSDO', NULL, '2017-10-11 15:55:52', '2017-10-11 15:55:52'),
(1948, '016010578', 'LETA AFIANA', 'Perempuan', '3318085104940001', 'Budha', '087834589842', 2, 13, 21, 1, '1994-04-11', 'PEKUWON RT 005/ RW 001, DESA PEKUWON, KEC. JUWANA , KAB PATI', '2016-10-31', 'Tetap', NULL, 1, '016010578.jpg', '$2y$10$j9Bu1b3C.i3kjQfAdP5uCOyP7r06UyYwOosRXrPflHRhDBsxWONae', NULL, '2017-10-11 15:55:52', '2017-11-30 04:08:00'),
(1949, '017020586', 'LISTIO SAPTA ANDIKA', 'Laki-Laki', '3374130907880001', 'Islam', '085726726265', 2, 13, 13, 1, '1988-07-09', 'DESA NGEMPLAK RT 02/ RW 04 KEC.LASEM, KAB. REMBANG', '2017-02-28', 'Kontrak', NULL, 1, '017020586.jpg', '$2y$10$xeqkUwoQtg8r4gg2KKoRd.zo8D6mCl9/dF6kkIfiozy3sJM7W.eBW', NULL, '2017-10-11 15:55:52', '2017-10-11 15:55:52'),
(1950, '014040392', 'M KHOIRUL ANWAR', 'Laki-Laki', '3321011106830003', 'Islam', '085225570244', 2, 13, 40, 8, '1983-06-11', 'Jl. Kauman RT 002 RW 003, Mranggen, Demak', '2014-04-02', 'Tetap', NULL, 1, '014040392.jpg', '$2y$10$tt6qW0cNNBKllrMuAThMKe3rCkcdRMvPQ5K66UGxdfaDxXlihMWv6', NULL, '2017-10-11 15:55:52', '2017-11-03 12:01:35'),
(1951, '01012080', 'M NURUL FATAH', 'Laki-Laki', '3374122802750001', 'Islam', '081328976696', 2, 13, 27, 1, '1975-02-28', 'Jl. Dewi Sartika Timur Gg. V RT 002 RW 005 Sukorejo, Gunung pati, Semarang', '2010-12-08', 'Tetap', NULL, 1, '01012080.jpg', '$2y$10$cMwAEvFOHhcF8oY90bp2eeimV2zV9Jq77.CmsMWvnqwL1tqOVARtS', NULL, '2017-10-11 15:55:52', '2017-10-11 15:55:52'),
(1952, '015010466', 'MARDIAH DAMEANTI HARAHAP', 'Perempuan', '3374104105790001', 'Islam', '089640809011', 2, 13, 30, 1, '1979-05-01', 'Gemahsari XII/328 RT 004 RW 004, Kedungmundu, Tembalang, Semarang', '2015-01-12', 'Tetap', NULL, 1, '015010466.jpg', '$2y$10$wgfP2twzb5duVKscy.jMyeJ5x.HlYtFLgUOtvEeXzYVMiSMMSFL7O', NULL, '2017-10-11 15:55:53', '2017-10-11 15:55:53'),
(1953, '06010044', 'MARYANTO', 'Laki-Laki', '33740715003800002', 'Islam', '081228151830', 2, 13, 17, 1, '1980-03-15', 'Jl. Wonodri Kebon Dalem RT 002 RW 012, Wonodri, Semarang Selatan', '2010-06-26', 'Tetap', NULL, 1, '06010044.jpg', '$2y$10$ks3Q7.QRcqdGWo9yR14K.ukyUmHu5RHwexz9Ufy1EK.2fNB39Ndiu', NULL, '2017-10-11 15:55:53', '2017-12-15 08:46:20'),
(1954, '01003007', 'MIRMASARI FITRIKA I', 'Perempuan', '3374155509780006', 'Islam', '081575575515', 2, 22, 23, 1, '1978-09-15', 'Taman Candi Prambanan no. 1645 RT 005 RW  010, Kalipancur, Ngaliyan, Semarang', '2003-10-21', 'Tetap', 'mirmasari.fitrika@gmail.com', 1, '01003007.jpg', '$2y$10$WXo1ar/fVlU3nV4zMp0g0ey133jjqh/wjWqrj88/WbNM6y.Ud454e', 'XRgkJ3IvbiVUZ9KQhwcn33cR7Zm1HRYCT6CH2cn4biJDBqPlJLn6bNZwmDkB', '2017-10-11 15:55:53', '2017-12-15 06:19:16'),
(1955, '015080507', 'MIRZA SELVIA', 'Perempuan', '3374164303920001', 'Islam', '085729448848', 2, 13, 24, 1, '1992-03-02', 'Jl. Stasiun Rt.1 Rw.2 Jerakah Tugu', '2015-08-05', 'Tetap', NULL, 1, '015080507.jpg', '$2y$10$YoZMW4q1L3SDNfARPdiyeeE4y7VpLbRkb5uXZWPyHj.iWMdlrEOru', NULL, '2017-10-11 15:55:53', '2017-11-24 08:47:49'),
(1956, '014080434', 'MUHAMMAD SYIHABUDDIN', 'Laki-Laki', '3324072305900002', 'Islam', '085727760630', 2, 13, 30, 1, '1992-05-23', 'Dusun Rejosari RT 001 RW 001, Tampingan, Boja, Kendal', '2014-08-04', 'Tetap', NULL, 1, '014080434.jpg', '$2y$10$MMmhWRqsqB2OxjZgG8GhzOyGGZ18KWI5itVO9JRWRNZkmnKJ4bxv6', NULL, '2017-10-11 15:55:53', '2018-01-08 05:39:21'),
(1957, '017060600', 'NUR MAULANA ISKHAK', 'Laki-Laki', '3328141010940013', 'Islam', '08977066155', 2, 13, 30, 1, '1994-10-10', 'SETU RT 02, RW 02 KEL. SETU, KEC TARUB KAB. TEGAL', '2017-06-05', 'Kontrak', NULL, 1, '017060600.jpg', '$2y$10$szXsYheaLV/rVsI.eYf.2.D9o74mesf5dWN6lAFIDiPmRkjSd0MFC', 'xr1WZoEqgvV2o9LqlVCNVbCjoWDnwJJvo2TgPaS97aob4l3z2PUygdBYUBJj', '2017-10-11 15:55:53', '2017-10-11 15:55:53'),
(1958, '012120267', 'NURCAHYA SUKMA KUSUMA D', 'Perempuan', '3374065601860001', 'Islam', '08562687713', 2, 13, 6, 2, '1986-01-16', 'Jl. Plamongan Elok II C.566 RT 001 RW 011, Pedurungan Kidul , Pedurungan, Semarang', '2012-12-13', 'Tetap', NULL, 1, '012120267.jpg', '$2y$10$S7HghvqyRq9i/wPf7qGzTey7mDnPUKm8pDIxzzeag7nbPWgNXXJ7m', NULL, '2017-10-11 15:55:53', '2018-01-08 05:40:38'),
(1959, '017030590', 'PAULUS NOVA PUTRA HANDRIYO', 'Laki-Laki', '3314191811940002', 'Katholik', '085799181091', 2, 13, 24, 1, '1994-11-18', 'WIDODO RT 017 DESA DUKUH KEC. TANGEN, KAB. SRAGEN', '2017-03-14', 'Kontrak', NULL, 1, '017030590.jpg', '$2y$10$UN4UPiPJ9T0tRrIRogDvs.N4YubNMfX8sdZM1X5EKtkn7O5RySD0u', NULL, '2017-10-11 15:55:53', '2017-12-15 08:35:45'),
(1960, '00709058', 'PRIYO SETYO ADI', 'Laki-Laki', '3374060409820001', 'Islam', '081325142101', 2, 20, 16, 1, '1976-06-29', 'Jl. Menjangan VI no. 21 RT 003 RW 010, Palebon, Pedurungan, Semarang', '2009-07-22', 'Tetap', NULL, 1, '00709058.jpg', '$2y$10$0iP3aldenDO8Eh2tSycr0u1WGBto07oWKlxWe8ZR0k1hNNNd4sGZG', NULL, '2017-10-11 15:55:54', '2017-10-11 15:55:54'),
(1961, '012110263', 'PUGUH KUNCORO', 'Laki-Laki', '3374111709880001', 'Islam', '085640660176', 2, 13, 6, 1, '1988-09-17', 'Merbau III/115 RT 002 RW 007, Padangsari, Banyumanik, Semarang', '2012-11-27', 'Tetap', NULL, 1, '012110263.jpg', '$2y$10$NuvSmQizmD7zzLEtqRAOWuhUxqwpfsVB2ZuejKpKjma2TEZ2B7Xsi', NULL, '2017-10-11 15:55:54', '2017-10-11 15:55:54'),
(1963, '014050415', 'RENDY BUDIANTO', 'Laki-Laki', '3374132406870001', 'Katholik', '08156686395', 2, 20, 17, 1, '1987-06-24', 'Puri Anjasmoro B4/23 RT 002 Rw 002,Tawangmas,Semarang Barat', '2014-05-16', 'Tetap', NULL, 1, '014050415.jpg', '$2y$10$DPF0D49uosFvwuGB9g6EuOYgsju.q//.zlJc2QDsyF6AvdAIITMA2', NULL, '2017-10-11 15:55:54', '2017-10-11 15:55:54'),
(1965, '00909075', 'REZKI WIDIA KARINI', 'Perempuan', '3374025409830002', 'Kristen', '08112700607', 2, 20, 24, 1, '1983-09-14', 'Jl. Palgunadi no. 39, Semarang', '2006-10-09', 'Tetap', NULL, 1, '00909075.jpg', '$2y$10$zRtkI3yWdtLBoGA/mH2OkOAYgYkexNAqshZ9zwbPtzai./3bgYxzS', NULL, '2017-10-11 15:55:54', '2017-10-11 15:55:54'),
(1966, '017080609', 'RICKY BUDIYANTO', 'Laki-Laki', '3323091012860003', 'Islam', '085743288000', 2, 13, 5, 1, '1986-12-10', 'DUSUN DEMANGAN RT 007/ RW 005, KEL. NGADIREJO, KEC. NGADIREJO', '2017-08-03', 'Kontrak', NULL, 1, '017080609.jpg', '$2y$10$W2HpihGEaiiQtThDLTBSweV5lzv0K3Z.NYoXsr5zsHTBZ19rKPTcO', NULL, '2017-10-11 15:55:54', '2017-10-11 15:55:54'),
(1967, '04010020', 'RIDWAN FAJAR WIJAYA', 'Laki-Laki', '3315181809890002', 'Islam', '082313572359', 2, 20, 21, 1, '1989-09-18', 'Tegowanu Kulon RT 009 RW 001, Tegowanu Kulon, Grobogan', '2010-04-19', 'Tetap', NULL, 1, '04010020.jpg', '$2y$10$J8z23.D4hr1CMaVQcJEp.OLxtNzBLZ680LDrIJLC4jwgqY2/pT5rW', NULL, '2017-10-11 15:55:54', '2018-02-01 06:26:22'),
(1968, '00709065', 'RIZAL ALFATH IBNU S', 'Laki-Laki', '3374152510840001', 'Islam', '085640699011', 2, 20, 17, 1, '1984-10-25', 'Sedangguwo RT 009 RW 009, Gemah, Pedurungan, Semarang', '2009-07-13', 'Tetap', NULL, 1, '00709065.jpg', '$2y$10$1cc5gv16dPQuAaO/UKZMku9B5aKlByy2GaAF4foOrXZuM25yRvA3W', NULL, '2017-10-11 15:55:55', '2018-03-21 04:12:12'),
(1969, '015060502', 'ROBERT CHANDRA', 'Laki-Laki', '3374071609870001', 'Kristen', '087733009958', 2, 13, 17, 1, '1987-09-16', 'Jl. Peterongan Tengah No.6 Rt.4 Rw.2 Semarang Selatan', '2015-06-16', 'Tetap', NULL, 1, '015060502.jpeg', '$2y$10$Q1hTjGFEtVbvrU6scI9QYupUxP89g1K/sL/GQI9/kDnwXOxOxhWLC', NULL, '2017-10-11 15:55:55', '2017-12-28 11:17:25'),
(1970, '012010178', 'ROSETA APRILIA', 'Perempuan', '3374025904860004', 'Islam', '081315850823', 2, 20, 13, 1, '1986-04-19', 'Kalibaru Timur RT 001 RW 009, Bandarharjo Semarang Utara', '2012-01-09', 'Tetap', NULL, 1, '012010178.jpg', '$2y$10$1AsbGHs18AxIu0VF4O2zH.PL4CIHveuOKMXQOJMzZwJKkTLNYuQ3m', NULL, '2017-10-11 15:55:55', '2017-10-11 15:55:55'),
(1971, '012040223', 'SAFITRI BUDI PERTIWI', 'Perempuan', '3374025306860002', 'Islam', '082221390099', 2, 13, 48, 1, '1986-06-13', 'Jl. Arimbi 2D/21 Pondok Indraprasta RT 006 RW 002, Plombokan, Semarang Utara', '2012-04-25', 'Tetap', NULL, 1, '012040223.jpg', '$2y$10$q2gnfJYcuGvtCSTo2Gj4pOV5fAv/YI.bY1e9ndviKUeAtE1d2CYvK', NULL, '2017-10-11 15:55:55', '2018-01-08 06:00:22'),
(1972, '017030588', 'SRI AYU SUBANDI', 'Perempuan', '3374144705950001', 'Islam', '087731487883', 2, 13, 10, 1, '1995-05-07', 'CLUSTER ALAM HIJAU MULAWARMAN AH 15. RT 3, RT 14', '2017-03-02', 'Kontrak', NULL, 1, '017030588.jpg', '$2y$10$Vy8j4r9.VxXCc7Ga2FcRo.NZE9zzzxNTd5k.4gnAvm/qvQB1C9u5e', NULL, '2017-10-11 15:55:55', '2017-10-11 15:55:55'),
(1973, '00107041', 'SUBHKAN', 'Laki-Laki', '3374060804780003', 'Islam', '08156686251', 2, 26, 9, 1, '1978-04-08', 'Jl. Klipang Pesona Asri II/F-72 RT 002 RW 028, Sendangmulyo, Tembalang, Semarang', '2007-01-02', 'Tetap', NULL, 1, '00107041.jpg', '$2y$10$urgYZJez0ErcOpSqHM5KSeE5/mf.rT.sVRM9SqjHStxRRGCJ3nFq6', NULL, '2017-10-11 15:55:55', '2017-10-11 15:55:55'),
(1974, '013060299', 'SUGENG SIHONO', 'Laki-Laki', '3374050507750004', 'Islam', '082242329647', 2, 13, 27, 1, '1975-07-05', 'Genuksari RT 003 RW 005, Genuksari, Genuk, Semarang', '2013-06-24', 'Tetap', NULL, 1, '013060299.jpg', '$2y$10$N8uhCW.gNvwQPsK8vuw9.OfFDq7S2ktS72H6coIypi335yqefc2T.', NULL, '2017-10-11 15:55:55', '2017-10-11 15:55:55'),
(1975, '014100444', 'SUSI NORAKANTI', 'Perempuan', '374065108910005', 'Islam', '089678797125', 2, 13, 1, 7, '1991-08-11', 'TEGAL REJO TLOGOMULYO, RT.06/03 PEDURUNGAN SEMARANG', '2014-10-27', 'Tetap', NULL, 1, '014100444.jpg', '$2y$10$tcg9i5wmQHla6xKL7/LNBegzuUxUp0./nawCPqLRyQSsXhroXFIDS', NULL, '2017-10-11 15:55:55', '2017-12-15 08:37:57'),
(1976, '016070567', 'SULISTYOWATI', 'Perempuan', '3318125406930001', 'Islam', '085712170826', 2, 13, 1, 1, '1993-06-14', 'Ds.Margorejo Rt.5 Rw.7 Margorejo Pati', '2016-07-11', 'Tetap', NULL, 1, '016070567.jpg', '$2y$10$FkBO/wk7kA/WDSknaW2nZeO/3p5YZAqU3ic6ApIULth9BrBy17RYy', NULL, '2017-10-11 15:55:56', '2017-10-11 15:55:56'),
(1977, '016010576', 'TEGUH PUJIANA', 'Laki-Laki', '331513012900003', 'Islam', '085641864083', 2, 13, 33, 1, '1990-12-30', 'JL. CEMPAKA 1/12B RT 001/ RW 013, KEL. PURWODADI, KEC. PURWODADI, KAB. GROBOGAN', '2016-10-26', 'Kontrak', NULL, 1, '016010576.jpg', '$2y$10$I6UUQ9daI9ho5tdYrH78ieffrQP3X5E/CsvceSWVnYjUINFWQQJpq', 'gNG38z7cq4nzohLmepx8GdASKjLHVArPCBSIPuJpTnNs7oG7Expy6NWHpOYj', '2017-10-11 15:55:56', '2017-10-11 15:55:56'),
(1978, '012040220', 'T PIETMARINDRA TRIASIH', 'Perempuan', '3374105703760009', 'Khatolik', '08157791236', 2, 20, 21, 1, '1976-03-17', 'Klipang Pesona Asri III Blok E No. 27 RT 010 RW 028, Sendangmulyo, Tembalang, Semarang', '2012-04-04', 'Tetap', NULL, 1, '012040220.jpg', '$2y$10$hsVYovnhSHijfUx2vlUXyuHJjWMzujhORoER1gr5OG5KlsAy3QD.m', NULL, '2017-10-11 15:55:56', '2017-10-11 15:55:56'),
(1979, '012120266', 'WIDI HANGESTI PUTRI', 'Perempuan', '3374157009890002', 'Islam', '081901005859', 2, 13, 6, 1, '1989-09-30', 'Jl. Karonsih Utara 339 RT 006 RW 003, Ngaliyan, Semarang', '2012-12-13', 'Tetap', NULL, 1, '012120266.jpg', '$2y$10$nVi/FN02hNYjlYVV3YGR9ed7TFkWhS6JRrn2o0g/l0nJqihgPnfYW', NULL, '2017-10-11 15:55:56', '2017-10-11 15:55:56'),
(1980, '011040138', 'YAKI IKBAL LATIF', 'Laki-Laki', '3374061401850001', 'Islam', '085225047262', 2, 20, 1, 1, '1985-01-14', 'Perum Klipang Blok RX No.2 RT 005 RT 006, Sendang Mulyo, Tembalang, Semarang', '2011-04-04', 'Tetap', NULL, 1, '011040138.jpg', '$2y$10$jKhzqWaeG6JSLSxsbXJt3OYO4A3e6fQG6/NWiLTMQ0/TtzsME2pye', 'z7JrPpacjii0Zw5JddzwLW2Zx3znwjYlQXGT4Jts28U0uWfSatf12KbFXfhw', '2017-10-11 15:55:56', '2017-10-11 15:55:56'),
(1981, '016010553', 'YAYUK SETIAWATI', 'Perempuan', '3315166510880001', 'Islam', '085725881085', 2, 13, 24, 1, '1988-10-25', 'Dsn.Jatimas Rt.1 Rw.2 Manggarmas Godong Grobogan', '2016-01-12', 'Tetap', NULL, 1, '016010553.jpg', '$2y$10$g0PSz8FOHOsx88dTurykpeGxyRQkX9aZK6471SWKyXCdy7kiXuX5C', NULL, '2017-10-11 15:55:56', '2017-10-11 15:55:56'),
(1982, '011030127', 'YUKE INDAR PALUPI', 'Perempuan', '3374074609820001', 'Islam', '089510131836', 2, 20, 15, 1, '1982-09-06', 'Wonodri Grajen I/3 RT 006 RW 008, Wonodri , Semarang Selatan', '2011-03-01', 'Tetap', NULL, 1, '011030127.jpg', '$2y$10$PxsYwDbz3IenqJIHVrkj8ODiA7ekN9CBiCR0EDgJVmGux9oCajuTm', NULL, '2017-10-11 15:55:56', '2017-12-15 08:54:15'),
(1983, '00807036', 'A BUDI CAHYONO', 'Laki-Laki', '3374080709790003', 'Katholik', '08156686287', 2, 13, 7, 8, '1979-09-07', 'Lingkungan Klego RT 004 RW 001 Ngempon Bergas', '2007-09-01', 'Tetap', NULL, 1, '00807036.jpg', '$2y$10$HH1ZKDGhvrcsaB/swNaWH.mPh39U4WmDwBZBgYbG33drAvxjOuGK2', NULL, '2017-10-11 15:55:56', '2017-12-15 09:03:52'),
(1984, '01010002', 'ABDUL HANAFIYAH F R', 'Laki-Laki', '337407300480005', 'Islam', '08562719934', 2, 13, 21, 1, '1983-04-30', 'Lemah Gempal IV/07 RT 005 RW 004, Bulustalan,Semarang Selatan', '2010-01-04', 'Tetap', NULL, 1, '01010002.jpg', '$2y$10$LpH6P3RDOOBmrkqMOKXQve8Gqn2Tsd8fCra7Q9m3tIWe8ps/mRH.O', NULL, '2017-10-11 15:55:57', '2018-03-21 04:12:42'),
(1985, '014020371', 'A. ALI HASBI', 'Laki-Laki', '3305050109860003', 'Islam', '08170603038', 2, 13, 25, 2, '1986-09-01', 'Jl. Meranti Barat Dalam IV/146,  RT 003 RW 015, Srondol Wetan, Banyumanik, Semarang', '2014-02-17', 'Tetap', NULL, 1, '014020371.jpg', '$2y$10$xLjKOYI6x7ltUv4Xj1.lHOzcp49qZ2.hm6FrWhoT/D24RMlkkoUpO', NULL, '2017-10-11 15:55:57', '2017-10-11 15:55:57'),
(1986, '016040579', 'AGUNG PRIYANTO', 'Laki-Laki', '3374072502840002', 'Islam', '085740603613', 2, 13, 27, 2, '1984-02-25', 'Jl.Wonodri Kopen Barat I/56 Rt.4 Rw.XI Semarang', '2016-04-01', 'Tetap', NULL, 1, '016040579.jpg', '$2y$10$SDJaM/37P6bVWcAki8p8gOgX1KGLX47yyCNDsv9UAkUpcJjHNegFy', NULL, '2017-10-11 15:55:57', '2017-10-11 15:55:57'),
(1987, '00107016', 'ARIS SETIAWAN', 'Laki-Laki', '3374072712820002', 'Islam', '08156686239', 2, 24, 47, 8, '1982-12-27', 'Jl. Kalicari IV 7B RT 003 RW 003, Kalicari, Pedurungan, Semarang', '2009-07-23', 'Tetap', NULL, 1, '00107016.jpg', '$2y$10$b4kE72Pn7g1MIn3k/DDIo.vE5ViE/iMEj7Ark.EoMN1tu8Zp7Aory', NULL, '2017-10-11 15:55:57', '2018-01-08 05:31:05'),
(1988, '09010057', 'AYU VITA HAPSARI', 'Perempuan', '3374026007870002', 'Islam', '085713745338', 2, 13, 2, 2, '1987-07-20', 'Kuala Mas IV /179 RT 004 RW 013 Panggung Lor Semarang Utara', '2010-09-15', 'Tetap', NULL, 1, '09010057.jpg', '$2y$10$6vUgzG.g709dJXtzj4VBYOPCrNqkPO/Rh5jJvVkmidrzzwqWa9jKG', 'YHo0NiCJSk1k26WxK2JMzsY1TJPZpMgPCgfG4HTXMoexCDu3E0ZQaaWAcf3P', '2017-10-11 15:55:57', '2017-10-11 15:55:57'),
(1989, '014040406', 'CANDRA BAGUS ADITYA', 'Laki-Laki', '3374132004880005', 'Islam', '085726363617', 2, 13, 13, 2, '1988-04-20', 'Jl. Srinindito RT 009 RW 001, Ngemplak Simongan, Semarang Barat', '2014-04-28', 'Tetap', NULL, 1, '014040406.jpg', '$2y$10$s2/JUWNs1.wedTuTY/.GAOj.kuEJSeaoFSw52sANKScLmusz4kCma', NULL, '2017-10-11 15:55:57', '2017-10-11 15:55:57'),
(1990, '014020368', 'DWI MARTANTO', 'Laki-Laki', '3374082911770003', 'Islam', '081390027000', 2, 20, 27, 2, '1977-11-29', 'Genuksari Atas RT 007 RW 009, Tegalsari, Candisari, Semarang', '2014-02-12', 'Tetap', NULL, 1, '014020368.jpg', '$2y$10$EZ1Tbqy1gOiz7aMLbu6RMe9dD.XciqCv4PsLsFeXY0O7S1XQ/Maeu', NULL, '2017-10-11 15:55:57', '2017-10-11 15:55:57'),
(1991, '013110338', 'EKO KURNIAWAN', 'Laki-Laki', '3318100103900001', 'Katholik', '085866722268', 2, 13, 30, 2, '1990-03-01', 'Jl. Flamboyan XII/A.3 RT 005 RW 005, Kutoharjo, Pati', '2013-11-28', 'Tetap', NULL, 1, '013110338.jpg', '$2y$10$K7oRqA141gkPvMmqEIw4puJcNLjTba1a0Mm9MDn2HGtkWGpTILNR.', NULL, '2017-10-11 15:55:57', '2017-12-15 08:59:01'),
(1992, '00908081', 'ETIK SUHARYANI', 'Perempuan', '33741055055820004', 'Islam', '08156687332', 2, 22, 23, 2, '1982-05-15', 'Jl. Emerald Indah IV C.2 / 9  RT 003 RW 024, Meteseh, Tembalang, Semarang', '2008-10-06', 'Tetap', NULL, 1, '00908081.jpg', '$2y$10$1wlGV06bUXjmNoLtPyAkUeqfgE.NOFD46ixtTqQ0d6EOGdef7Hmmi', 'NcWbJWPxOb0mfH44qytr2buMMsDE1xge9Mm0SbQqOVkX9TKBokKF3db5Eqez', '2017-10-11 15:55:58', '2017-11-08 05:57:31'),
(1993, '013060293', 'FANI SULISTYORINI', 'Perempuan', '3374114507800001', 'Islam', '081901898877', 2, 20, 26, 2, '1980-07-05', 'Perum Dolog Tlogosari no. 13 RT 003 RW 001, Tlogosari Wetan, Pedurungan, Semarang', '2013-06-13', 'Tetap', NULL, 1, '013060293.jpg', '$2y$10$Qk2.bIX6N4vPQZQKw9HXzuXZWIotbFP5hBTKHaE21QT/sGdTaH14e', NULL, '2017-10-11 15:55:58', '2018-03-21 04:19:13'),
(1994, '016040578', 'HERU PRASETYA', 'Laki-Laki', '3374082801810006', 'Islam', '081575819998', 2, 13, 27, 2, '1981-01-28', 'Tegalsari Barat 2 Rt.6/13 No.8 Semarang', '2016-04-01', 'Tetap', NULL, 1, '016040578.jpg', '$2y$10$Xqe8rFRQ6GpVGSEbdZzkz.CaXngXP2PcDaQgiyU.59HW520yajVsa', NULL, '2017-10-11 15:55:58', '2017-10-11 15:55:58'),
(1996, '015100523', 'KURNIA ALAMSYAH EFFENDY', 'Laki-Laki', '3374090204910002', 'Islam', '085640016498', 2, 13, 25, 2, '1991-04-02', 'Kp. Karangrejo Rt.6 Rw.1 Gajahmungkur', '2015-10-02', 'Tetap', NULL, 1, '015100523.jpg', '$2y$10$CNQnGt70EC8T1swvsFNlS.ZhheVHEninjCZ7X3Z.tKoDhfCEHd.7C', NULL, '2017-10-11 15:55:58', '2017-10-11 15:55:58'),
(1997, '014050416', 'LEA NOVALITA', 'Perempuan', '3374115302900003', 'Kristen', '082326352282', 2, 20, 13, 1, '1990-02-13', 'Jl. Jatisari RT 007 RW 001, Ngesrep Banyumanik, Semarang', '2014-05-22', 'Tetap', 'novalitalea@gmail.com', 1, '014050416.jpg', '$2y$10$EAnk2Gh4khyV4cN2TbgdLOdXo3G5fN2YiS8Zg0hZHUtxuoUlEKIeC', NULL, '2017-10-11 15:55:58', '2017-12-15 08:52:26'),
(1998, '017030587', 'MAULANA ARDIAN ANANDA', 'Laki-Laki', '3374082308890006', 'Islam', '085878798771', 2, 13, 31, 2, '1989-08-23', 'JL. TAMAN TEGALSARI II NO. 34 RT 02/ RW 05, KEL. CANDI, KEC. CANDISARI, KOTA SEMARANG', '2017-03-03', 'Kontrak', NULL, 1, '017030587.jpg', '$2y$10$UL1eN3E2Eq.oZZjFmYROLe9CFRMwnH3IpWNZQux5ZDjFD3ht4VeAq', NULL, '2017-10-11 15:55:58', '2017-10-11 15:55:58'),
(1999, '012070241', 'MUHAMAD DEDY RIFAI', 'Laki-Laki', '3374030605840001', 'Islam', '081373788432', 2, 20, 25, 2, '1984-05-06', 'Jl.Tlogo Kuning No.9 Rt 007 RW 007, Palebon, Pedurungan, Semarang', '2012-07-02', 'Tetap', NULL, 1, '012070241.jpg', '$2y$10$e2Yk67Ky87bFuFIwkUxxhurTZyTdrMjCu1b.E9eYzp8OZcbFY0YRu', NULL, '2017-10-11 15:55:58', '2017-10-11 15:55:58'),
(2001, '014050414', 'NURUL HIDAYAH', 'Perempuan', '3374095008900004', 'Islam', '087731078064', 2, 13, 24, 2, '1990-08-10', 'Tlompak RT 004 RW 008, Tandang, Tembalang, Semarang', '2014-05-12', 'Tetap', NULL, 1, '014050414.jpg', '$2y$10$yKcfwLS6ZvNTS98X/7vPqOlEelwCWcmahNyZsuiu/1zAoSyGSwY3y', NULL, '2017-10-11 15:55:59', '2017-10-11 15:55:59'),
(2002, '01101094', 'RUMSARI MUTIARAWATI', 'Perempuan', '3374066708870004', 'Kristen', '085865571767', 2, 13, 4, 2, '1987-08-27', 'Gusti Putri I no.11, RT 009 RW 005 ,Tlogosari Kulon, Pedurungan,Semarang', '2011-01-10', 'Tetap', NULL, 1, '01101094.jpg', '$2y$10$u5TtIalPhbjsMI1n9Bsg0.OrFLFACC5QMIp9jTTNFZJEjQxgcmuH2', NULL, '2017-10-11 15:55:59', '2017-10-11 15:55:59'),
(2003, '01105012', 'SANI ADILLA', 'Perempuan', '3374066107810002', 'Islam', '08112708181', 2, 16, 10, 2, '1981-07-21', 'Parang Baris III no. 12 RT 002 RW 015 Tlogosari Kulon Pedurungan Semarang', '2005-11-09', 'Tetap', NULL, 1, '01105012.jpg', '$2y$10$0s0uyT66/ydg8IekcpPUIuCHyvJbHUuWI43D6jpnTMtmyIbdAwVXG', NULL, '2017-10-11 15:55:59', '2017-10-11 15:55:59'),
(2004, '014040403', 'SUNU PUJI ANGGORO', 'Laki-Laki', '3374091312880003', 'Islam', '085877719996', 2, 13, 31, 5, '1988-12-13', 'Jl. Bukit Unggul I No. 28 RT 004 RW 002 Bendan Ngisor, Gajah Mungkur, Semarang', '2014-04-28', 'Tetap', NULL, 1, '014040403.jpg', '$2y$10$RQKWq30GCPVXH5ZsqIjmHOGbAIL5rTOLxWohizo3scKQb2CECFW.C', NULL, '2017-10-11 15:55:59', '2017-12-15 09:06:26'),
(2005, '012080252', 'VERY ARDIYANTO', 'Laki-Laki', '3374050106850004', 'Islam', '082220099228', 2, 18, 6, 2, '1985-06-01', 'Parang Kembang VII no.12 RT 005 RW 007, Togosari Kulon, Pedurungan, Semarang', '2012-08-30', 'Tetap', NULL, 1, '012080252.jpg', '$2y$10$mih9h.eL1EkwnpBNj4qyTOe2vlTmd4VYwKfn8JaUcqoj.3wW5CHJK', NULL, '2017-10-11 15:55:59', '2018-03-21 04:21:21'),
(2006, '01101085', 'VITRA PRIYANDONO', 'Laki-Laki', '3374091310730001', 'Islam', '08156687199', 2, 13, 27, 2, '1973-10-13', 'Jl. Akasia no. 61 RT 003 RW 002, Sampangan, Gajah Mungkur, Semarang', '2011-01-03', 'Tetap', NULL, 1, '01101085.jpg', '$2y$10$/6IzhUScQDJoR089efPPGemAcW3DyGlIkd1SV8KN76RsqPW.jc0J2', NULL, '2017-10-11 15:55:59', '2017-10-11 15:55:59'),
(2007, '00000000', 'WAHYU DWI PUSPITASARI', 'Perempuan', '33740346048900003', 'Islam', '085741566313', 2, 13, 1, 2, '1989-04-06', 'Jl.Lintang Trenggono IV Rt.4/Rw.18 Tlogosari Kulon Pedurungan', '2016-02-09', 'Tetap', NULL, 1, '00000000.jpg', '$2y$10$NlhWDOJzWs/hMy1Pnrf9wOhsoOgCgLfKmKIMF.vHQ7d5YDEDkXx/O', NULL, '2017-10-11 15:55:59', '2018-03-21 03:49:52'),
(2008, '01010063', 'WISNU WIJAYANTO', 'Laki-Laki', '3374021105820002', 'Islam', '085225272276', 2, 13, 20, 2, '1982-05-11', 'Jl. Udawa Timur II RT 005 RW 010, Bulu Lor, Semarang Utara', '2010-10-15', 'Tetap', NULL, 1, '01010063.jpg', '$2y$10$CZ9vp8ysM4NZuJIcZVA6eO3/3k7daV1Cq6.C2pEqkStQZS6Y/2K7a', NULL, '2017-10-11 15:56:00', '2018-03-21 03:46:17'),
(2009, '09010056', 'YUSTISIA RAHMADHIKA', 'Perempuan', '3374106004850002', 'Islam', '081325705766', 2, 20, 46, 8, '1985-04-20', 'Ketileng Asri IX/F-11 RT 009 RW 011 Sendangmulyo Tembalang , Semarang', '2010-09-15', 'Tetap', NULL, 1, '09010056.jpg', '$2y$10$7qG/r0Vf6jwvKWK8XcDrUOSyjZPTKsg7hX6gQC5iFlKNmo4xDIPNy', NULL, '2017-10-11 15:56:00', '2018-01-08 05:42:45'),
(2010, '00609076', 'ADITYA BAYU AJI', 'Laki-Laki', '3373021610860003', 'Islam', '08156687329', 2, 24, 38, 8, '1986-10-16', 'Sanggrahan RT 02 RW 01 Tingkir Lor, Salatiga', '2009-06-15', 'Tetap', 'ajibayuaditya@gmail.com', 1, '00609076.jpg', '$2y$10$71cTsMf0PuqqtqT6gfN12uhGatnM1lmKo3LQ2HlcRta3y6/4ghWv6', 'NnkAAKyzCkZsDc0iA0Yx3m4TxAvXiHsmTcOPw5cTNqlPNxWhxpGsK4F7cKZW', '2017-10-11 15:56:00', '2018-02-05 08:21:21'),
(2011, '017040592', 'ADITYA REZA PRATAMA', 'Laki-Laki', '3373040206910002', 'Islam', '05740005765', 2, 13, 30, 3, '1991-06-02', 'JL. SUMANTRI V/01 RT 03/ RW 09, DESA DUKUH, KEC. SIDOMUKTI, KAB. SALATIGA', '2017-04-11', 'Kontrak', NULL, 1, '017040592.jpg', '$2y$10$bHD0aKSp0q.z/oAbKWExe.OZgdheONUAI0akQ18b3BwHTRYZmO83a', NULL, '2017-10-11 15:56:00', '2017-10-11 15:56:00'),
(2012, '013110337', 'AFIF UDIN ZUHRI', 'Laki-Laki', '3320071508860005', 'Islam', '08156679023', 2, 13, 26, 3, '1986-08-15', 'Gondang RT 008 RW 002, Karanggondang, Mlonggo, Jepara', '2013-11-28', 'Tetap', NULL, 1, '013110337.jpg', '$2y$10$OmgaCa02hQ4ieuVyVC22o.27bG8VkTivKpHF/6mUhhfzdTKvfy45a', NULL, '2017-10-11 15:56:00', '2017-10-11 15:56:00'),
(2015, '016011583', 'C. FRENDI UNGGUL W', 'Laki-Laki', '3322110202910001', 'Katholik', '085712547600', 2, 13, 24, 3, '1991-02-02', 'LING. KERBAN RT 003/ RW 001 KEL. HARJOSARI, KEC. BAWEN, KAB. SEMARANG, JAWA TENGAH', '2016-11-18', 'Tetap', NULL, 1, '016011583.jpg', '$2y$10$Et0V5zziV7TaUzoPWvesCOPmeKeKCVck2/bVmm5z/yBua5HmCFobW', NULL, '2017-10-11 15:56:00', '2018-03-21 04:05:40'),
(2016, '01208073', 'DEASY SULISTYORINI', 'Perempuan', '3374016110770001', 'Islam', '085225805637', 2, 13, 10, 3, '1977-01-21', 'Jl. Taman Duta Indah 10 RT 001 RW 009 , Duta Bukit Mas, Banyumanik, Semarang', '2008-12-26', 'Tetap', NULL, 1, '01208073.jpg', '$2y$10$8C/wdf8Z2XHTZbXOX8vF8eXs3ClVPhVHfHOhOLgPbKmn9MRLIpTC6', NULL, '2017-10-11 15:56:01', '2017-10-11 15:56:01'),
(2017, '017050593', 'DIAN DESTIRA RAHMAWATI', 'Perempuan', '3302144312910003', 'Islam', '082137875009', 2, 13, 24, 2, '1991-12-03', 'PERUM PASIR LUHUR PERMAI KOMPLEK BARAT, JL. PASIR BARAT 07 RT 02/ RW 07 NO B536 PURWOKERTO BARAT', '2017-05-15', 'Kontrak', NULL, 1, '017050593.jpg', '$2y$10$Tegm5BK4OZ6QyQbEZh1tNeGQ4UjUsXUk0pIQmYEQQyoWZ0Po4jciW', 'qnMBQTNLHDfs2TCqeBde7Do5RrgYY8DyhtTHZKw0YWyj9z2uzMd5d7KsIuGS', '2017-10-11 15:56:01', '2018-03-21 03:50:19'),
(2018, '015100527', 'DIMAS RAHMAT W', 'Laki-Laki', '3322060403910003', 'Islam', '085600503533', 2, 13, 6, 3, '1991-03-04', 'Bejiwetan Rt.1 Rw.4 Kalibeji Tuntang', '2015-10-05', 'Tetap', NULL, 1, '015100527.jpg', '$2y$10$iattolzq0K1KL5oPkOWssuGcUpLA/lHIEqR3YKejtBYgwdRYNHyaK', NULL, '2017-10-11 15:56:01', '2017-12-15 09:23:01'),
(2019, '0308062', 'EKO SULISTIYO', 'Laki-Laki', '3374061811830006', 'Islam', '08156686137', 2, 13, 25, 3, '1983-11-18', 'Jl. Sidomulyo IV no. 63 RT 004 RW 020, Muktiharjo Kidul, Pedurungan, Semarang', '2008-03-06', 'Tetap', NULL, 1, '0308062.jpg', '$2y$10$qqowY8wvaU8KwJKEzWxfYOdSfIhVO0q2mz0mVmqExmAZchzOx9vxC', NULL, '2017-10-11 15:56:01', '2017-10-11 15:56:01'),
(2020, '011020121', 'ERNA SUSANTI', 'Perempuan', '3322136808890003', 'Islam', '085740982828', 2, 20, 1, 3, '1989-08-28', 'Lingkungan Setinggen RT 003 RW 003, Wijil, Bergas, Semarang', '2011-02-21', 'Tetap', 'ernasaadi28@gmail.com', 1, '011020121.jpg', '$2y$10$.rUvVV6OTvdeLx76h1v58OrbSIpJVlAy8AuoLncZYqlQFzUEcZw46', 'Koa3Vdsg92yuWibI1KgxZJD7mSiUsiWAmMREpNr4T3UjXzFbglBMj7H85IQP', '2017-10-11 15:56:01', '2017-12-15 09:26:56'),
(2021, '011030130', 'ERVIANA', 'Perempuan', '3374124411890001', 'Islam', '085640836037', 2, 13, 2, 3, '1989-11-04', 'Patemon RT 003 RW 004 , Patemon, Gunungpati, Semarang', '2011-03-07', 'Tetap', NULL, 1, '011030130.jpg', '$2y$10$kIPWBZFLAWUHvoMSXKPeSOQCs5cvJZMF77csLNEJI51zEpN9vVdKu', NULL, '2017-10-11 15:56:01', '2017-10-11 15:56:01'),
(2022, '011010103', 'FRANSISKA NOFIANA', 'Perempuan', '3322135111830002', 'Islam', '08156686351', 2, 20, 31, 3, '1983-11-11', 'Lingkungan Ngempon RT 005 RW 003, Ngempon, Bergas, Semarang', '2011-01-17', 'Tetap', NULL, 1, '011010103.jpg', '$2y$10$z5TMWF8xKh.jHT1A1TSq7e1I/J/zlRNy9AfHRCfP5u595B0IC6p/C', NULL, '2017-10-11 15:56:01', '2017-12-15 09:19:06'),
(2023, '013110335', 'HERU SULISTYO', 'Laki-Laki', '3374062302730005', 'Islam', '085876232755', 2, 13, 27, 3, '1978-12-30', 'Jl. Pedurungan Kidul IX RT 006 RW 008, Gemah, Pedurungan, Semarang', '2013-11-26', 'Tetap', NULL, 1, '013110335.jpg', '$2y$10$RKuhzfzwDCgro4/AAWJ/1e0bMiz09IOjcx4.nki9LT6JGsoqPa3J6', NULL, '2017-10-11 15:56:01', '2017-10-11 15:56:01'),
(2024, '012010177', 'IDA RATNAWATI', 'Perempuan', '331902460760007', 'Islam', '082137148135', 2, 24, 21, 8, '1976-01-06', 'Jl. Srinindito Raya Timur no. 32 RT 001 RW 003, Ngemplak, Simongan, Semarang Barat', '2012-01-02', 'Tetap', NULL, 1, '012010177.jpg', '$2y$10$WUa.fjhzOSsbLpO.sctGPuY5O4h75QRTdu/HpDlFtxuGpn5Q/Rsxe', NULL, '2017-10-11 15:56:01', '2018-03-21 03:47:42'),
(2025, '017080616', 'JASMINTO', 'Laki-Laki', '3316140508840001', 'Islam', '081390383875', 2, 13, 31, 3, '1984-08-05', 'PURI DELTA ASRI 5 JL TREMBESI II BLOK E 3-14 RT 001/ RW 014, KALONGAN, UNGARAN TIMUR', '2017-08-25', 'Kontrak', NULL, 1, '017080616.jpg', '$2y$10$8nXeiS/0NyJ8NsqTVaLHJOBppm6vYQeU40ZqlX2o3BF785HjtL0Te', NULL, '2017-10-11 15:56:02', '2017-10-11 15:56:02'),
(2026, '011040137', 'KETUT JONI SIHMAWANTO', 'Laki-Laki', '3322190906820005', 'Islam', '085647454502', 2, 22, 23, 3, '1982-06-09', 'Mijen RT 005 RW 004, Gedanganak, Ungaran Timur', '2011-04-04', 'Tetap', NULL, 1, '011040137.jpg', '$2y$10$CCOPqUBaLJJaXoxGzdvWIeiKMIkx88GUIZGztNwAKqEAmWUfA0RTe', 'NWYEfBbjSYvhyaY1uqfTL6s8p1wbJj9DsWxm4jlAZJzDZ531hTdwhrHfEG0B', '2017-10-11 15:56:02', '2017-12-15 09:17:37'),
(2027, '017040591', 'LISTIYA FEBRIANA DWI KUSUMA', 'Perempuan', '3302144602920002', 'Islam', '085326601117', 2, 13, 10, 3, '1992-02-06', 'PANCASAN RT 005/ RW 001, DESA PANCASAN, KEC. AJIBARANG, KAB. BANYUMAS', '2017-04-10', 'Kontrak', NULL, 1, '017040591.jpg', '$2y$10$jCwGBy5vKeMezFDActT6QO6McdjPSesoZUdNV2TLPYFFP0b3ZB/.e', NULL, '2017-10-11 15:56:02', '2018-03-21 03:55:49'),
(2028, '013090318', 'NUR EKSAN RISWANTO', 'Laki-Laki', '3374082203830002', 'Islam', '08156686155', 2, 13, 7, 3, '1983-03-22', 'Srondol Kulon RT 005 RW 002, Srondol Kulon, Banyumanik, Semarang', '2013-09-23', 'Tetap', NULL, 1, '013090318.jpg', '$2y$10$Ahwi0eMWAhFs0eryyCH4QOnX93P7Z8jtZd777b0nxFri90PQM7xHK', NULL, '2017-10-11 15:56:02', '2017-10-11 15:56:02'),
(2029, '00108049', 'NUR FITRI NUZULIA', 'Perempuan', '3374114808790007', 'Islam', '08156686318', 2, 20, 26, 3, '1979-08-08', 'Villa Gedawang Permai Blok H no. 7 RT 006 RW 004, Gedawang, Banyumanik, Semarang', '2008-02-01', 'Tetap', NULL, 1, '00108049.jpg', '$2y$10$EIDoAG891KqP3wcvzHmiPOah2NgziUsmsfqaiCbDGwdcOpJUHIZ8m', NULL, '2017-10-11 15:56:02', '2017-12-15 09:20:22'),
(2030, '013010271', 'SISWI CAHYAWATI', 'Perempuan', '3322195006880001', 'Islam', '085740404091', 2, 13, 1, 3, '1988-06-10', 'JL. JENDRAL SUDIRMAN NO.9 RT04/04 GEDANGANAK UNGARAN', '2013-01-15', 'Tetap', NULL, 1, '013010271.jpg', '$2y$10$XphqG/2iWNG47NKKfnzOeusj0Y4DHZGZS6OXUfD1pRD7xH8ZqgPey', 'RDu2A3Kx7EOS690d9IALyzwzpKPRlUNnFii5lRebItiwkZqJYrGVHuO5TfJV', '2017-10-11 15:56:02', '2017-12-15 09:24:48'),
(2031, '016010561', 'SLAMET WIBOWO', 'Laki-Laki', '3308192302890001', 'Islam', '085726925570', 2, 13, 30, 3, '1989-02-23', 'Banyuurip I RT.3 Rw.5 Tegalrejo Magelang', '2016-02-04', 'Tetap', NULL, 1, '016010561.jpg', '$2y$10$GTTokPKl5X.PuS/ttJ9L8.q7rEmCrDZ64lBDCQAFuKYZTcKWLcQwu', NULL, '2017-10-11 15:56:02', '2017-10-11 15:56:02'),
(2033, '014010358', 'SRI PURWATI', 'Perempuan', '3322187005760001', 'Islam', '081575626660', 2, 13, 26, 3, '1976-05-30', 'Lewono RT 001 RW 005, Beji, Ungaran Timur, Semarang', '2014-01-13', 'Tetap', NULL, 1, '014010358.jpg', '$2y$10$o82qeBYn/AfXxJaleLgbpO8i9sAHvdQ21Shf9d3GtmZYBaSRpv/fq', NULL, '2017-10-11 15:56:03', '2017-10-11 15:56:03'),
(2034, '011050148', 'STIFANNY ANDARISKI A P', 'Perempuan', '3322116504910002', 'Islam', '087831170340', 2, 13, 3, 3, '1991-04-25', 'Lingkungan Kerban RT 003 RW 001, Harjosari, Bawen', '2011-05-03', 'Tetap', NULL, 1, '011050148.jpg', '$2y$10$ndQToihyWtgR6gWrat.uHOAXXXSfMSYjZCr9y8nmjvUgRMgOUqG4S', NULL, '2017-10-11 15:56:03', '2017-10-11 15:56:03'),
(2035, '014040401', 'TRI WAHYU ANGGRAENI', 'Perempuan', '3322186703910002', 'Islam', '085712008600', 2, 13, 24, 3, '1991-03-27', 'Blanten RT 004 RW 008, Nyatnyono,Ungaran Barat', '2014-04-28', 'Tetap', NULL, 1, '014040401.jpg', '$2y$10$690wzS2uIQqg2LYPxmHCv.VUFBIkHSgHAxII5W7mdz9J7J6wQFrs6', 'wkAumqM4A3R04FjVjZa522ozlnYp6GwS61l7OdWb9l2d8yC7mvIj8gNjOwia', '2017-10-11 15:56:03', '2017-10-11 15:56:03'),
(2036, '012020199', 'ZAEN', 'Laki-Laki', '3374011505860002', 'Islam', '085877732595', 2, 13, 6, 3, '1986-05-15', 'Jl. Petolongan no. 5 RT 001 RW 004, Purwodinatan, Semarang Tengah', '2012-02-15', 'Tetap', NULL, 1, '012020199.jpg', '$2y$10$fEK0bR6oP3oV0dKWv9/SnO8ns00ayo.xjqAmTaIiuyRjvTRm2F52S', NULL, '2017-10-11 15:56:03', '2017-10-11 15:56:03'),
(2037, '015110534', 'ANGGORO EKO SUSANTO', 'Laki-Laki', '3318101912890001', 'Islam', '085717919144', 2, 13, 25, 4, '1989-12-19', 'DS. Randu Kuning Rt 01 RW 03 Pati Lor Pati', '2015-11-02', 'Tetap', NULL, 1, '015110534.jpg', '$2y$10$nPZERr37VaCr.PeBrf5aH.Bz7B1qLMGR/4AECRKWJ6mzNpgyj5AVO', 'SrKQ0oRLf5hgh673tVWGgWSOXFqOVrCxxxOa8ykri0FcQuA4qJj1pilcWM0G', '2017-10-11 15:56:03', '2017-11-22 08:51:23'),
(2038, '012040221', 'ARIYANTO', 'Laki-Laki', '3318101006750012', 'Islam', '08122833736', 2, 13, 7, 4, '1975-06-10', 'Kel.Parenggan RT 003 RW 002 Parenggan, Pati', '2012-04-09', 'Tetap', NULL, 1, '012040221.jpg', '$2y$10$7RrCg.QewKUniYl1x.Eoxuat/WAzrAT8IOP8UZVfwrt0A/wKi8Mtq', NULL, '2017-10-11 15:56:03', '2017-10-11 15:56:03'),
(2039, '015010461', 'ASRI''AH', 'Perempuan', '3318156606880004', 'Islam', '085702109373', 2, 13, 2, 4, '1988-06-26', 'Ds. Koroyo RT 002 RW 001, Panggungrayom, Wedari Jaksa, Pati', '2015-01-05', 'Tetap', NULL, 1, '015010461.jpg', '$2y$10$/qL6jOWsdeGig3mgbn/fie45BK93jcRuSy.k1nk8KHWyXFUPpSLT.', NULL, '2017-10-11 15:56:03', '2017-10-11 15:56:03'),
(2040, '013090319', 'ENDI PURBASANA ARDANA PUTRA', 'Laki-Laki', '3324030107870002', 'Islam', '085641125728', 2, 13, 6, 4, '1987-07-01', 'Kp.Kauman RT 003 RW 001, Pati Kidul, Pati', '2013-09-23', 'Tetap', NULL, 1, '013090319.jpg', '$2y$10$.76IkWpjjjkdyl80M.DPaeMuEJ9dLMYVfbdId.sA69wnGqxqeOqkm', 'TVv27cQMOLBxOPegxHjKZAQ6DCdu3ki1eRUb41W2Nppq8IYu9supROk37oP2', '2017-10-11 15:56:03', '2017-10-11 15:56:03'),
(2041, '016010575', 'FITRI MUSRIAH', 'Perempuan', '3318105706860003', 'Islam', '085740525556', 2, 13, 26, 4, '1986-06-17', 'DS. SIDOKERTO RT 01/RW 02, KECAMATAN PATI, KABUPATEN PATI', '2016-10-12', 'Tetap', NULL, 1, '016010575.jpg', '$2y$10$H4WMUYDn9Spu5Hww93.p1OFFdnyPfVoavnWuUL1aaHkhEbgPDdbPi', NULL, '2017-10-11 15:56:04', '2017-12-15 09:33:09'),
(2042, '011020124', 'HEXA BAGOES KOERNIAWAN', 'Laki-Laki', '3318102006790009', 'Islam', '081226458806', 2, 20, 25, 4, '1979-06-20', 'Perum Permata Mulyoharjo RT 020 RW 002, Mulyoharjo, Pati', '2011-02-28', 'Tetap', NULL, 1, '011020124.jpg', '$2y$10$uuMYyzQ11Ac.PvxZMEmck.jPII5sex5pd38btRvlk2wIxoCLg8v9G', NULL, '2017-10-11 15:56:04', '2017-12-15 09:37:49'),
(2043, '013110341', 'IKA MUSLIANI', 'Perempuan', '3302164904880002', 'Islam', '085640138500', 2, 13, 13, 4, '1988-09-09', 'Nganguk Wali RT 001/RW 003 Kecamatan Kota Kabupaten Kudus', '2013-12-02', 'Tetap', 'ikamusliani@gmail.com', 1, '013110341.jpg', '$2y$10$ZP13dtbWAmBSCpNWs2HVv.6u/YbCMv2M5dx0ZmQosWCSqjPVZbAAm', '2oi4Rr0ib2SY9MQdUaRpj7WQX2A5991aYWftgTvFku6IWAG4DJwyHkFTQFTu', '2017-10-11 15:56:04', '2017-11-22 05:31:56'),
(2045, '017090622', 'KUKUH PRASTANTI', 'Perempuan', '3318145901940002', 'Islam', '085727454589', 2, 13, 10, 4, '1994-01-19', 'GUWO RT 001/ RW 002 DESA GUWO, KEC. TLOGOWUNGU KAB. PATI', '2017-09-25', 'Kontrak', NULL, 1, '017090622.jpg', '$2y$10$zEJgb24SbbpSq0YaF.eaoepbTh4Kh0j490Exrg7tZ8ChktGe5jzp.', NULL, '2017-10-11 15:56:04', '2017-10-11 15:56:04'),
(2046, '017070607', 'MUMPARIDAH', 'Perempuan', '3318156407860002', 'Islam', '085201896807', 2, 13, 31, 4, '2017-07-24', 'DESA NGURENREJO RT 004/ RW 002, KEC. WEDARIJAKSA, KAB. PATI', '2017-07-31', 'Kontrak', NULL, 1, '017070607.jpg', '$2y$10$Cxaw5GjVTAtoTeW8qomHPO10mDBTEsRuxhz3dxdsevAIMxF1WIutO', NULL, '2017-10-11 15:56:04', '2017-10-11 15:56:04'),
(2047, '016040582', 'NURHANA PANUNGGUL', 'Laki-Laki', '3318121409840007', 'Islam', '08122557762', 2, 13, 31, 4, '1984-09-14', 'Ds. Margorejo Rt.1 Rw.5 Margorejo', '2016-04-01', 'Tetap', NULL, 1, '016040582.jpg', '$2y$10$PHAhdWWrv6NjoDR0ILPq1uolPt8fzzz.ExocHUDLZ.r9.9Q9/eGC6', NULL, '2017-10-11 15:56:04', '2017-10-11 15:56:04'),
(2048, '06010035', 'NUR KINAYAH', 'Perempuan', '3318135812830003', 'Islam', '081326625095', 2, 20, 1, 4, '1983-12-18', 'Dk. Dayan RT 003 RW 006 Semirejo, Gembong, Pati', '2010-06-08', 'Tetap', 'iin.noor@yahoo.com', 1, '06010035.jpg', '$2y$10$ptx9bvr3sEbKZpxsZJeg7e1wSLP3ORXY4y3VBUFu.K9VJfQZS.ql6', 'LKWWMzQyenMi6xWxJHp61vZzHQowIzTHlHztLpHwLfisF2evpQCi2Y4oLrIO', '2017-10-11 15:56:04', '2017-11-22 03:14:31'),
(2050, '012070245', 'PURNOMO', 'Laki-Laki', '3374030310840005', 'Khatolik', '081216737980', 2, 22, 23, 4, '1984-10-03', 'Jl. Watulawang VI /62 RT 011 RW 008 Gajahmungkur, Semarang', '2012-06-26', 'Tetap', 'purnomopurpung@gmail.com', 1, '012070245.jpg', '$2y$10$VGQjslMQVCg/T7tED8VQ2OW.BAJyEkfxUYgMlYTxppJHdQWZf6oG.', 'GTy671pSSo67uL8qStrVM0Sa1ovIIjBLMCIfxouY9zNWCUkRCqoRWp9DZa5w', '2017-10-11 15:56:05', '2017-11-07 09:33:36'),
(2051, '017080610', 'SUPRIYANTO', 'Laki-Laki', '3318102112660004', 'Kristen', '085641414223', 2, 13, 43, 4, '1966-12-21', 'DESA PURI RT 002/ RW 006, DESA PURI, KEC. PATI', '2017-08-01', 'Kontrak', NULL, 1, '017080610.jpg', '$2y$10$I9cigkdFuT5cwJgvpEMpy..SN9HOWIN2pQzzcDJcbyEBU1au5m3Yy', NULL, '2017-10-11 15:56:05', '2017-10-11 15:56:05'),
(2053, '014040395', 'YOHAN DULIMARTA  ', 'Laki-Laki', '3273132107790002', 'Kristen', '081573168168', 2, 26, 9, 4, '1979-07-21', 'Jl. Srimanis No. 7A RT 008 RW  001, Cigereleng, Regol, Bandung', '2014-04-10', 'Tetap', NULL, 1, '014040395.jpg', '$2y$10$KA8xl3KbCkEvtP4oilY8quzxsjcBJjHda65Wkt6hlOeuc0nKRzyKi', NULL, '2017-10-11 15:56:05', '2017-10-11 15:56:05'),
(2054, '017060601', 'YULI NURHADI', 'Laki-Laki', '3318101407860001', 'Islam', '0856411900', 2, 13, 27, 4, '1986-07-14', 'DK KARANGDOWO RT 04, RW 01, KEL. KUTOHARJOKEC. PATI KAB. PATI', '2017-06-06', 'Kontrak', NULL, 1, '017060601.jpg', '$2y$10$9MRx9/VQztjpJ2Mrfr1akuyBLaOQdU2TdAU4g9ajOO261jg26E/Oy', NULL, '2017-10-11 15:56:05', '2017-10-11 15:56:05'),
(2055, '012030203', 'AGUNG WIMARWAN', 'Laki-Laki', '3374021603800004', 'Islam', '082138002130', 2, 18, 25, 5, '1980-03-16', 'Griya Mijen Permai Blok N No. 4 RT 010 RW 007 , Mijen, Semarang', '2012-03-01', 'Tetap', NULL, 1, '012030203.jpg', '$2y$10$KW3RNxg86L/lWyn1ChyFQe7LV85WxZfdh37GfqMeYpMkhhe6.Olfm', NULL, '2017-10-11 15:56:05', '2018-03-21 03:54:36'),
(2056, '017090624', 'AGNES VERENA APRILIA', 'Perempuan', '3318106004950005', 'Katholik', '085641169393', 2, 13, 1, 5, '1995-04-20', 'JL. SRIKAYA 2 NO. 1 PERUMNAS WINONG PATI RT 08/ RW 04 DESA WINONG, KC. PATI, KAB. PATI', '2017-10-02', 'Kontrak', NULL, 1, '017090624.jpg', '$2y$10$VaZSpeYlmGfi2p.0.4RKq.iTDP1Fl2HlTNeraPUzrxG8WuqPS9RvC', NULL, '2017-10-11 15:56:05', '2017-11-09 07:33:36'),
(2057, '011050146', 'AMBAR LARASATI', 'Perempuan', '3374135906830002', 'Islam', '085641197636', 2, 13, 2, 5, '1983-06-19', 'Puspogiwang Dalam I/9 RT 004 RW 003, Gisikdrono, Semarang', '2011-05-02', 'Tetap', NULL, 1, '011050146.jpg', '$2y$10$d.kUElSsVdI4N4rbbeSddedIkqdClVh9wijNNbLHX0qgMJR5nJDO2', NULL, '2017-10-11 15:56:05', '2017-10-11 15:56:05'),
(2058, '014110447', 'ANDI RIVKY PRAYUDHA', 'Laki-Laki', '3374130204870001', 'Islam', '082135354963', 2, 13, 25, 5, '1987-04-02', 'Jl. Wologito I/104 RT 006 RW 001, Kembangarum, Semarang Barat', '2014-11-17', 'Tetap', NULL, 1, '014110447.jpg', '$2y$10$ZGRigE07nvR4XAphtvmcvu2SSd8BPc1kqCiOpwtegyJ.6vDpeKkuq', NULL, '2017-10-11 15:56:06', '2017-10-11 15:56:06'),
(2060, '015120547', 'BINTORO', 'Laki-Laki', '3374020512810003', 'Islam', '083843793409', 2, 13, 7, 8, '1981-12-05', 'Jl.Delta Mas V/73 Rt.5 Rw.4 Kuningan Semarang Utara', '2015-12-07', 'Tetap', NULL, 1, '015120547.jpg', '$2y$10$sdGfsLAxaLuScuTRxoypwe.ClPGsgOf6dx4qDJX2XELO.yT.u8CzO', 'weXMa4XkE7YCDm5Jq01ktVXEJuDBMV3k5usDiasUswCWqkjPk2vwSFPfC8pi', '2017-10-11 15:56:06', '2017-12-15 09:54:00'),
(2061, '012070242', 'DEDY KUSUMA', 'Laki-Laki', '3374111909900002', 'Islam', '085743224041', 2, 20, 32, 5, '1990-09-19', 'JL. NGESREP BARAT IV NO.48 RT07/08 SRONDOL KULON', '2012-07-04', 'Tetap', NULL, 1, '012070242.jpg', '$2y$10$/RW3LW21yXqwCfKus64NnO8oxajVD0uFXqCtRvIJzgdnqOPtPzOXi', NULL, '2017-10-11 15:56:06', '2018-03-21 04:42:40'),
(2062, '016030572', 'EKO BUDI PRASETYO', 'Laki-Laki', '3374070605790002', 'Islam', '085641127136', 2, 13, 27, 5, '1979-05-06', 'Jl.Kedondong Dlm 3/IB Rt.03 Rw.04 Lamper Tengah Semarang', '2016-03-04', 'Tetap', NULL, 1, '016030572.jpg', '$2y$10$p9NKqxaq9r6ZeP7sn9c7B.cqPCS7zIwDifx.8LGVeONrimcQ/zyzW', NULL, '2017-10-11 15:56:06', '2017-10-11 15:56:06'),
(2063, '011020114', 'FENDI SUNARTO', 'Laki-Laki', '3374030102860005', 'Kristen', '08155711557', 2, 26, 9, 5, '1986-02-01', 'Jl. Dr. Cipto no. 70 RT 001 RW 001, Rejosari, Semarang Timur', '2011-02-02', 'Tetap', NULL, 1, '011020114.jpg', '$2y$10$MXOaq/TCeJQJ5bt5Y59KVOv9cLtFMAsq.bSzTAEYinGHE9QB4eaCu', NULL, '2017-10-11 15:56:06', '2017-10-11 15:56:06'),
(2064, '017050594', 'HAGI HUTOMO MUKTI', 'Laki-Laki', '3374150801950002', 'Islam', '081548928929', 2, 13, 30, 5, '1995-01-08', 'JL. TAMAN BUNGA RAYA BLOK A4/12A BSB RT 006/ RW 006, KEL. KEDUNGPANI, KEC. MIJEN, KAB. SEMARANG', '2017-05-02', 'Kontrak', NULL, 1, '017050594.jpg', '$2y$10$.ADALOa2NMC57LFG83pmG.6lQXR3Hs9r4TLh8V0EVl3iOZiEWM3TW', NULL, '2017-10-11 15:56:06', '2017-10-11 15:56:06'),
(2065, '015060504', 'HANTIAN GIWANGKARA', 'Laki-Laki', '33741329098900006', 'Islam', '081329599907', 2, 13, 25, 5, '1989-09-29', 'Jl.Borobudur Barat IV Rt.14 Rw.05', '2015-06-29', 'Tetap', NULL, 1, '015060504.jpg', '$2y$10$scKMBl3C2cebWtCsLxjZkelc5QMTVWvMpippLWRiJKAJzT.scNj7a', NULL, '2017-10-11 15:56:06', '2017-12-15 09:51:22'),
(2066, '016010559', 'RIRIS NING PAMBUDI U', 'Perempuan', '3374135609930003', 'Islam', '085641489599', 2, 13, 24, 5, '1993-09-16', 'Pringgodani Dalam I/9 RT.4 Rw.11 Krobokan Semarang Barat', '2016-02-04', 'Tetap', NULL, 1, '016010559.jpg', '$2y$10$C75qtwOT6zYQVKki2Ndwd.7cyPAHPFKMruqNNywCUjqmEnCwkiRY6', NULL, '2017-10-11 15:56:07', '2018-01-08 05:41:32'),
(2067, '012020197', 'SARI SETIANINGRUM', 'Perempuan', '3322184809850002', 'Kristen', '0817452263', 2, 22, 23, 5, '1985-09-08', 'Jl. Arjuna 3/19 RT 005 RW 010 Lerep, Ungaran Barat, Semarang', '2012-02-13', 'Tetap', NULL, 1, '012020197.jpg', '$2y$10$/45vj72uqNIML9AHGg9hIeDWhzs01.to7RGXNARkaw1YwOJXiZ6cW', NULL, '2017-10-11 15:56:07', '2017-10-11 15:56:07'),
(2069, '01012077', 'TITIN PUSPA NINGRUM', 'Perempuan', '3374075911830001', 'Islam', '082322676478', 2, 13, 6, 5, '1980-11-19', 'Perum Pratama Green Residence F.18 RT 004 RW 005m Kedungpani, Mijen, Semarang', '2010-12-13', 'Tetap', NULL, 1, '01012077.jpg', '$2y$10$mMXLy.Zc6eHzZjeX7GrkTOi9bwAQLyY2dmMq5Zkx./UYs.Nhc6PCO', NULL, '2017-10-11 15:56:07', '2017-10-11 15:56:07'),
(2070, '015010459', 'WIDI WIBOWO', 'Laki-Laki', '3374100504790005', 'Islam', '085712431748', 2, 13, 27, 5, '1979-04-05', 'Perum Dinar Asri Blok L-III no. 4 RT 004 RW 025, Meteseh, Tembalang, Semarang', '2015-01-05', 'Tetap', NULL, 1, '015010459.jpg', '$2y$10$85NLmGF2V4rq64jpPQyaaucTFmcl6/vzguGP5jHThvxzdW/iVV3OC', NULL, '2017-10-11 15:56:07', '2017-10-11 15:56:07'),
(2071, '015050497', 'AGUNG RIYADI', 'Laki-Laki', '3309051606859004', 'Islam', '085743837861', 2, 13, 25, 6, '1985-06-16', 'Jl. Merbabu No.33B Rt.3 Rw.3 Boyolali', '2015-05-05', 'Tetap', NULL, 1, '015050497.jpg', '$2y$10$SLmKMOk5phos.ySq7oC6Ue/5/zz/6TF/VjVIZGMQNOHohd08KIR/y', NULL, '2017-10-11 15:56:07', '2017-10-11 15:56:07'),
(2072, '00608065', 'AGUS BUDIYONO', 'Laki-Laki', '3313112405730003', 'Islam', '082322702098', 2, 22, 23, 6, '1973-05-24', 'Jl. Anthurium no. 9, Perum Permata Tembalang RT 004 RW 005, Kramas, Tembalang, Semarang', '2009-10-12', 'Tetap', NULL, 1, '00608065.jpg', '$2y$10$5/qQJtyqU9fyK46YHuo3W.BM5wbF4WdezQKjq9ecWD6wfaTh8abAq', NULL, '2017-10-11 15:56:07', '2017-10-11 15:56:07'),
(2073, '012110261', 'ARISTIA WAHYU YULIANINGSIH', 'Perempuan', '3311126507890003', 'Islam', '085702550840', 2, 13, 24, 6, '1989-07-25', 'Karang RT 001 RW 001 Ngaren Pedan Klaten', '2012-11-16', 'Tetap', NULL, 1, '012110261.jpg', '$2y$10$Yo5b.RGOD8wJbgBtEfKru.j/GzMrjefmKFblfIpeBmXmrX8eJx3QO', NULL, '2017-10-11 15:56:07', '2017-12-14 08:21:10'),
(2074, '015100535', 'DEDI HARIYANTO', 'Laki-Laki', '331012151282001', 'Islam', '085601577671', 2, 13, 31, 6, '1982-12-15', 'Karang RT 01  RW 01 Ngaren. Pedan Klaten', '2015-11-02', 'Tetap', NULL, 1, '015100535.jpg', '$2y$10$zGiguGJDumdpLDuIjEpQOO3MjmrwrYJ5MZm/iOp.fpy7oTYnm0mo2', NULL, '2017-10-11 15:56:07', '2017-12-15 09:56:39'),
(2075, '016030573', 'EKO NUGROHO P', 'Laki-Laki', '3372040506820007', 'Kristen', '085725111099', 2, 13, 27, 6, '1982-06-05', 'Wonowoso Rt.5 Rw.12 Ds Mojosongo Jebres', '2016-03-04', 'Tetap', NULL, 1, '016030573.jpg', '$2y$10$vBOmpQ2gfIul4BWKuHhWw.kCXy0hyf/HO/yEZfukNDxvCYJzr9wQW', NULL, '2017-10-11 15:56:08', '2017-10-11 15:56:08'),
(2077, '015030486', 'LILIK TRI HARJOKO', 'Laki-Laki', '3309060206779002', 'Islam', '08564064777', 2, 13, 31, 6, '1977-06-02', 'Jomboran RT 003 RW 10, Kemiri, Mojosongo, Boyolali 57321', '2015-03-24', 'Tetap', NULL, 1, '015030486.jpg', '$2y$10$b6uHKcfKwAh1/1SZ4Mhs4.wjBirH1j4nWm8fZeVjdhKCPUSD1Cq8W', NULL, '2017-10-11 15:56:08', '2017-10-11 15:56:08'),
(2078, '017080611', 'MUHAMMAD ARIF WIDASMORO', 'Laki-Laki', '3321040703940004', 'Islam', '081575254785', 2, 13, 13, 7, '1994-03-07', 'JOGO III RT 004/ RW 002, DESA GEMULAK, KEC. SAYUNG, KAB. DEMAK', '2017-08-08', 'Kontrak', NULL, 1, '017080611.jpg', '$2y$10$HVV.V5a6cdI1SXQPkt8RfOwNKQ4NIEKpPxyAABY6twDMD0aPb82gS', NULL, '2017-10-11 15:56:08', '2018-01-08 05:39:56'),
(2079, '01107048', 'MONALISA', 'Perempuan', '3374095204700005', 'Islam', '081326680888', 2, 20, 26, 6, '1970-04-12', 'Jl. Sampangan Baru A-14B  RT 003 RW 002, Bendan Ngisor, Gajah Mungkur, Semarang', '2007-11-28', 'Tetap', NULL, 1, '01107048.jpg', '$2y$10$rJnj69p1Z9B/dQshXrjDyOOgNAmrStr9QIqG4fQbMl.Qi26WOOPGG', NULL, '2017-10-11 15:56:08', '2017-12-15 09:58:52'),
(2080, '05010030', 'NANANG EKO P', 'Laki-Laki', '3374102803830005', 'Islam', '081575580622', 2, 24, 45, 8, '1983-03-28', 'Jl. Sawi IB no. 7 RT 001 RW 005, Sendangguwo, Tembalang, Semarang', '2010-05-26', 'Tetap', NULL, 1, '05010030.jpg', '$2y$10$FmVfJz20g8mLBbMK0hh97unpY9B0FneyXOYQ8eWoV1EQroQkJeeHa', NULL, '2017-10-11 15:56:08', '2018-03-22 03:55:05'),
(2081, '016011580', 'NANI SETYOWATI PUTRI', 'Perempuan', '3309046812950003', 'Islam', '081567665337', 2, 13, 2, 6, '1995-12-28', 'DK. CLUNTANG RT 012/ RW 003, DESA CLUNTANG, KEC MUSUK, KAB. BOYOLALI', '2016-11-02', 'Tetap', NULL, 1, '016011580.jpg', '$2y$10$PcNiUB8JkYIcp.LyLdNUd.RQNmcHdtqIXuTFulNWJxLxGM9.MO422', NULL, '2017-10-11 15:56:08', '2017-11-30 04:07:40');
INSERT INTO `users` (`id`, `nip`, `nama`, `kelamin`, `no_ktp`, `agama`, `no_hp`, `role`, `id_jabatan`, `id_bagian`, `id_cabang`, `tgl_lahir`, `alamat`, `tgl_masuk`, `status_karyawan`, `email`, `status_user`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2082, '012070240', 'PUTRI HANDAYANI', 'Perempuan', '3309094203870001', 'Islam', '085725282795', 2, 13, 1, 6, '1987-03-02', 'Catur RT 01 Rw 01, Catur Sambi, Kab. Boyolali', '2012-07-02', 'Tetap', NULL, 1, '012070240.jpg', '$2y$10$i6v0URnVYTh9yrARjD/93ulPUTmYoLxlPFgjZt815..kSuxBcFpIy', NULL, '2017-10-11 15:56:08', '2017-12-15 10:04:16'),
(2083, '016050591', 'RIFKI AULIA FAHRIZAL', 'Laki-Laki', '3322052411910001', 'Islam', '08988362845', 2, 13, 6, 6, '1991-11-24', 'Dsn Takankidul Rt.2 Rw.5 Pabelan Semarang', '2016-05-25', 'Tetap', NULL, 1, '016050591.jpg', '$2y$10$JHjezIkkC6Olz6.m9ef2uOtSeZtKod2VB2IWvDLNNIhX0wpnkF9AK', NULL, '2017-10-11 15:56:09', '2017-12-15 10:01:42'),
(2084, '014010359', 'SIGIT WIDIATMOKO', 'Laki-Laki', '3309060310799003', 'Islam', '085326627594', 2, 13, 8, 6, '1979-10-03', 'Karang Duren RT 03 RW 01, Metuk, Mojosongo, Boyolali', '2014-01-13', 'Tetap', NULL, 1, '014010359.jpg', '$2y$10$h5P2QsCQftzw4eE9yMXqZubvpmp3JumibPgQAn1qEDlh9WI131OXG', NULL, '2017-10-11 15:56:09', '2017-10-11 15:56:09'),
(2085, '015010474', 'TEGAR SUKMA TIMUR', 'Laki-Laki', '3306162402900001', 'Islam', '085729497228', 2, 13, 13, 6, '1990-02-24', 'Kaliboto Kulon RT003/004 Kec. Bener, Purworejo', '2015-01-29', 'Tetap', NULL, 1, '015010474.jpg', '$2y$10$4EH3OK5GkqwsmACnjS3SnukLuVhT37Wf5qMeKhhpEl/zRLABw/LpW', NULL, '2017-10-11 15:56:09', '2017-10-11 15:56:09'),
(2086, '00000001', 'AGUS RAHARJO', 'Laki-Laki', '3374100208800004', 'Islam', '081326159561', 2, 13, 27, 7, '1980-08-02', 'Jl. Kinibalu Timur RT 004 RW 003, Tandang, Tembalang, Semarang', '2014-04-02', 'Tetap', NULL, 1, '00000001.jpg', '$2y$10$dy1pTOCpVpiRdNU.c6oqc.fiwAoORYgT1/te6g1N2y0/CqF1WyuaG', NULL, '2017-10-11 15:56:09', '2017-12-15 10:18:47'),
(2089, '01101090', 'ANISA CANDRA DEWI', 'Perempuan', '3374134802890005', 'Islam', '085640186753', 2, 13, 2, 7, '1989-02-08', 'Karangroto Blok A RT 005 RW 004, Karangroto, Genuk, Semarang', '2011-01-03', 'Tetap', NULL, 1, '01101090.jpg', '$2y$10$.pMj/w9wmhqMXfLewJTjqOzM79/D5KnXMdJf3HkQ4mNo0kEOvMnGa', 'ruRXOSaYaMbMS8IpVVTlhVirSV9iITHmz5quBPkFymgBIaKCAkFhp3u4g8jH', '2017-10-11 15:56:09', '2017-10-11 15:56:09'),
(2090, '015080512', 'BUDI SUSILO', 'Laki-Laki', '3374131607820006', 'Islam', '085876530683', 2, 13, 43, 8, '1982-07-16', 'KP Sendang Indah Rt.01 Rw.03 Muktiharjo Lor Genuk', '2015-08-31', 'Tetap', NULL, 1, '015080512.jpg', '$2y$10$tTNw0EIUh/Jody3aQzMRWunESQkH1JEF/XJa3d/LtKwnAkJ3n9qzm', NULL, '2017-10-11 15:56:09', '2017-12-15 10:09:20'),
(2092, '017060603', 'MOHAMAD ROHKIM', 'Laki-Laki', '3374110910810002', 'Islam', '081327950700', 2, 13, 7, 8, '1981-10-09', 'JL. GONDANG TIMUR V RT 003/ RW 002, KEL. KRAMAS, KEC. TEMBALANG, SEMARANG', '2017-06-10', 'Kontrak', NULL, 1, '017060603.jpg', '$2y$10$5nSiDWHP5kp5EzcEm6jQ5eBwQWi7G8tBLFA.nSyJBYm/t7xFZpFI.', 'xNH2uVH0X1p8mUgliS0mv2w750GemB1GQMT0Qa8oNE8DjM9ANfAEL4c5tSbZ', '2017-10-11 15:56:10', '2017-12-15 10:28:32'),
(2093, '017050595', 'MUCHAMAD YOPHI ANDRIANO', 'Laki-Laki', '3374061706940003', 'Islam', '085713178476', 2, 13, 24, 7, '1994-06-17', 'PENGGARON KIDUL, RT 002/ RW 005, KEL PENGGARON KIDUL KEC. PEDURUNGAN KAB. SEMARANG', '2017-05-03', 'Kontrak', NULL, 1, '017050595.jpg', '$2y$10$hAOfWacr2X01PxNID2e4FOQPIYSsTaaD4cwvVnvloHKbkFh/k0Xre', NULL, '2017-10-11 15:56:10', '2017-12-15 10:27:46'),
(2094, '011030134', 'NANDARIKE SINDU MAPERALAGA', 'Laki-Laki', '3374150103830001', 'Islam', '085225220555', 2, 13, 25, 7, '1983-03-01', 'Jl. Bukit Barisan Blok G IV/21 RT 002 RW 011, Bringin, Ngaliyan, Semarang', '2011-03-14', 'Tetap', NULL, 1, '011030134.jpg', '$2y$10$7kVLS/UAjjJczZsafjGgZuSfBbPdGXam4dYJQTiMdsumogmzlBCM2', NULL, '2017-10-11 15:56:10', '2017-12-15 10:07:23'),
(2095, '01105016', 'NUR SUCI ANGGRAINI', 'Perempuan', '337411440879001', 'Islam', '08112539997', 2, 22, 23, 7, '1979-08-04', 'Jl Singa Utara 8 No. 30 RT 006 RW 004, Kalicari, Pedurungan, Semarang', '2005-02-11', 'Tetap', NULL, 1, '01105016.jpg', '$2y$10$VPDdzQfAxmkH68SNo8cww.rilvwAiYASSIweJuhfRPbkcM4kucWjG', NULL, '2017-10-11 15:56:10', '2017-10-11 15:56:10'),
(2096, '00809036', 'TUSIFATUL UTAMI', 'Perempuan', '3321047008890001', 'Islam', '085741564019', 2, 13, 30, 7, '1989-08-30', 'Krajan Utara RT 001 RW 005, Kalisari, Sayung, Demak', '2009-08-24', 'Tetap', NULL, 1, '00809036.jpg', '$2y$10$CFxx3PEkCw3s3Koczje4he3GI1P7.M33t3Psb1E.PVA5Rc3s.BBnq', '44dVRDiYNFaXwz78uH3yFzlSVpJcrfP0lCqRFt5RqVFS4nnHMkK4HSYWhxbG', '2017-10-11 15:56:10', '2017-10-11 15:56:10'),
(2097, '00608070', 'A ERLIAWAN SETYO N', 'Laki-Laki', '3374062407760004', 'Katholik', '08156686112', 2, 11, 43, 2, '1976-07-24', 'Jl. Imam Faruqi no. 48 Banjardowo Baru RT 005 RW 007, Karangroto, Genuk, Semarang', '2008-06-16', 'Tetap', NULL, 1, '00608070.jpg', '$2y$10$KyzrmBB2Gq7lTs5paD3FlOFxJw9TgroqcSIys2.Zj/yJURegYNDfq', NULL, '2017-10-11 15:56:10', '2017-11-10 02:35:22'),
(2098, '01040490', 'ADY JUNIARTO', 'Laki-Laki', '337406190679004', 'Islam', '081326264801', 2, 13, 34, 8, '1979-06-19', 'Jl.Menjangan Dalam V No.09 Palebon Semarang', '2015-04-27', 'Tetap', NULL, 1, '01040490.jpg', '$2y$10$./gDF9QfRnQC84lEszmUSuTcE2PUOlGVVJoQDaXzt3KI8mIIPqtr.', 'LJUcA25m0oOSsthkUQ0auYOxtVSH3Pc49rIoVmXaIyprOc30RQrs2MCtPSKR', '2017-10-11 15:56:10', '2017-11-01 10:59:23'),
(2099, '00209030', 'ADHY SUHARYANTO', 'Laki-Laki', '3301052309830002', 'Islam', '087832861226', 2, 12, 43, 2, '1983-09-23', 'Dusun Banjar Utama RT 002 RW 002, Banjareja, Nusawungu, Cilacap', '2009-02-26', 'Kontrak', NULL, 1, '00209030.jpg', '$2y$10$TppjqqULO/xIA5J1c.WABO5iWvm7Kz/wBo0DBNLdmqECyhP2UJzsW', NULL, '2017-10-11 15:56:10', '2018-02-01 06:15:06'),
(2100, '00409004', 'AGUNG DWI PRASETYO', 'Laki-Laki', '3374022805830003', 'Islam', '085742934900', 2, 13, 45, 8, '1983-05-28', 'Jl. Taman Sekar Jagad no. 19 RT 001 RW 028, Tlogosari Kulon, Pedurungan, Semarang', '2009-04-06', 'Tetap', NULL, 1, '00409004.jpg', '$2y$10$gd9Zfg8SyBKOrXEwfIeDmO1JU3WGOvzrN9pKnB5FOBDfvH6LOE.oq', 'USCkdjmQZieD69mtuZXP2qDbwdawpOj7qpWiRaGsTDUWXwQoZSkdINLWuW4W', '2017-10-11 15:56:11', '2018-01-08 05:26:32'),
(2102, '00107004', 'AGUS PRIYANTO', 'Laki-Laki', '3329090108830003', 'Islam', '085227773885', 2, 20, 34, 8, '1983-08-01', 'Pemaron RT 003 RW 001, Pemaron, Brebes', '2008-10-06', 'Tetap', NULL, 1, '00107004.jpg', '$2y$10$mLpVUGSYcilf8QBy/2YhOO5hmubignO1Cp1PtMCimAwg76VmcdrNG', 'LBX1kE1tI9BhxlGS5KnpXy21z9egZL6WMKDy7LiymAZft2XuoHRGTVE3wBKC', '2017-10-11 15:56:11', '2017-10-11 15:56:11'),
(2103, '012050330', 'ANDEWI BERTHA', 'Perempuan', '3374026208670001', 'Katholik', '082138280614', 2, 24, 46, 8, '1967-08-22', 'Jl. Sampangan Baru A.3A RT 003 RW 002 , Bendan Ngisor, Gajahmungkur, Semarang', '2012-05-28', 'Tetap', NULL, 1, '012050330.jpg', '$2y$10$hfNmt4OqYHra3NVw4xzt8eRY.v1hjF2nd.v8IWfjBpC3L7BZPLVvK', 'Rj2sufAV9oFmhdWMJMvXJivIJ7zRJt3TiNpL3zlhsFtMFtyWuACfC5a0vETV', '2017-10-11 15:56:11', '2018-01-08 05:28:27'),
(2104, '014030385', 'ANDHI NUGROHO', 'Laki-Laki', '3322133004910001', 'Islam', '081225195990', 2, 13, 29, 8, '1991-04-30', 'Lingkungan Ngempon RT 005 RW 003, Ngempon, Bergas, Semarang', '2014-03-19', 'Tetap', 'andhi.nugroho91@gmail.com', 1, '014030385.jpg', '$2y$10$BJVaHnTMhM95R.Nnu3lbE.yKJjIrlVUbCIG78IJUaEkY68UQzOXui', NULL, '2017-10-11 15:56:11', '2017-11-07 09:46:28'),
(2105, '014120449', 'ANDHIKA AJI LESFIYANTO', 'Laki-Laki', '3315171107890003', 'Islam', '08563810425', 2, 13, 41, 8, '1989-07-11', 'Pilang Lor RT 003 RW 003, Gubug, Grobogan', '2014-12-01', 'Tetap', NULL, 1, '014120449.jpg', '$2y$10$PNAWZuRB4JgX2XzQifzcbe7wV6VjeBuX7F7TjvCyXY5n/CTbz9NC.', NULL, '2017-10-11 15:56:11', '2018-01-02 07:41:13'),
(2106, '016070569', 'ANDREAS WIRYANTO BASUKI', 'Laki-Laki', '3373010412590002', 'Katholik', '085848513184', 2, 24, 36, 8, '1959-12-04', 'Jl.Cemara II / 81 Salatiga', '2016-07-18', 'Kontrak', NULL, 1, '016070569.jpg', '$2y$10$aWAREzck9VxpBq5d5/pnp.WriUJlbDH43W0631hc6cN2QMohDqu6.', 'ewscRV2kbOnmR2rEmvq1f8fyNNzuzlcaUhxgiIk3O9DmIWlQk8sqdOfs3G94', '2017-10-11 15:56:11', '2017-10-11 15:56:11'),
(2107, '015090513', 'ANGGER SURYOKUSUMO', 'Laki-Laki', '3374131112870004', 'Islam', '085640203937', 2, 13, 42, 8, '1987-12-11', 'Jl. Sawunggaling III/5 Banyumanik Semarang', '2015-09-02', 'Tetap', NULL, 1, '015090513.jpg', '$2y$10$SfAlH1/JOSyeo30JmS2ISOMCzzF/ATWMdNcUI6a5PR9bHF6mzg6Jq', NULL, '2017-10-11 15:56:11', '2017-10-11 15:56:11'),
(2108, '00108002', 'ANJARSARI MAYA K', 'Perempuan', '3374136605770003', 'Islam', '081225052777', 2, 24, 10, 8, '1977-05-26', 'Jl. Purianjasmoro D3-3 RT 001 RW 006, Tawangsari, Semarang Barat', '2008-02-01', 'Tetap', NULL, 1, '00108002.jpg', '$2y$10$QCCv2IVMYhJaBZ/xPSQ5buOrjLEF5NneSSHhRvEnloVbB86mom97S', NULL, '2017-10-11 15:56:12', '2017-10-11 15:56:12'),
(2109, '00707011', 'ARYO DWI CAHYADI', 'Laki-Laki', '3374121802760003', 'Islam', '08122938557', 2, 28, 28, 8, '1976-02-18', 'Jl. Waru Timur II no. 4 RT 009 RW 001, Pedalangan, Banyumanik, Semarang', '2007-07-09', 'Tetap', NULL, 1, '00707011.jpg', '$2y$10$NvYV3K7BZqbUrQRkTHlkPeKxnb6.efHqwWCx7Yt.8X0zWvU3I0rYi', 'qR95zvSu1zKak3hpUwBl6ONESQp0KzPMFyhMjdh3e9ENC4EXbtx61cj6hEGV', '2017-10-11 15:56:12', '2017-10-31 08:02:17'),
(2110, '015060503', 'ATIK PURWASIH', 'Perempuan', '3374105110860002', 'Islam', '085225600688', 2, 13, 43, 8, '1986-10-11', 'Jl. Sendang Mulyo Rt.3 Rw.8 Tembalang, Semarang', '2015-04-26', 'Tetap', NULL, 1, '015060503.jpg', '$2y$10$fh4b7YzcLd4NNd9.O4JWCO/fs940bHXNJvv.D9HiZAjCDF9DmRRlG', NULL, '2017-10-11 15:56:12', '2017-10-11 15:56:12'),
(2111, '01008070', 'BAMBANG SETYAWAN', 'Laki-Laki', '3309181911710001', 'Islam', '081326431727', 2, 12, 43, 1, '1971-11-09', 'Seworan RT 07 RW 84 Ketoyan, Wonosegoro, Boyolali', '2010-11-26', 'Kontrak', NULL, 1, '01008070.jpg', '$2y$10$u9KUxWc4sWWZu6yoCsPE3.bf8wCxNGlAxyTVJhPWtuElBQi6AOO5u', NULL, '2017-10-11 15:56:12', '2017-11-10 02:40:56'),
(2113, '017070612', 'BAMBANG WIDIYANTO', 'Laki-Laki', '3374092907560002', 'Kristen', '082112972333', 2, 36, 12, 8, '1956-07-29', 'JL. LEMPONGSARI TIMUR III RT 002/ RW 006, DESA LEMPONGSARI, KEC. GAAH MUNGKUR', '2017-07-10', 'Kontrak', NULL, 1, '017070612.jpg', '$2y$10$xYFm8adSo34G2Y.SfsXhSuMDnKXhf/DOPVArdB5aiQB8V4BaVbUza', 'sZ7UxNk70XwPkSeMMS0MqSO9HexQARDnjbH52k8xy4E2QlcVZzB4VZcYUTOc', '2017-10-11 15:56:12', '2017-10-23 10:50:14'),
(2114, '013100321', 'BELLA ADNANTIOSUTO', 'Laki-Laki', '3374072606870001', 'Islam', '085741063187', 2, 13, 34, 8, '1987-06-26', 'Arimbi 2D/21 RT 006 RW 002 Pondok Indraprasta, Plombokan, Semarang Utara', '2013-10-01', 'Tetap', 'bella.adnantio@gmail.com', 1, '013100321.jpg', '$2y$10$MzImOWlj2r5zrS1LK3Y3F.QXBSacd/bQ8LBsYOTECF3HuinDi2GXi', 'aj7RZfSsxyaO4ojaf1JorRnI8iO8LkUZsska5M6kq6hzv7m7zjTIoMEyLOKX', '2017-10-11 15:56:12', '2018-02-22 03:14:59'),
(2115, '015050495', 'BENNY AGUS SETYAWAN', 'Laki-Laki', '337411010830001', 'Islam', '081390316999', 2, 13, 28, 8, '1973-08-01', 'Jl.Karanganyar Rt.1 Rw.1 Banyumanik Semarang', '2015-05-02', 'Tetap', NULL, 1, '015050495.jpg', '$2y$10$l8iel3wucGnEnClUZTZd8ekPi6DhyIGANIf5/dcG1j4b0CsCguX1K', NULL, '2017-10-11 15:56:12', '2017-10-11 15:56:12'),
(2116, '07010052', 'BRUR FEBRIARDY', 'Laki-Laki', '3374032502840001', 'Islam', '08122555000', 2, 13, 38, 8, '1984-02-25', 'Jl. Krakatau II/4 RT 002 RW 001, Karangtempel, Semarang Timur', '2010-07-26', 'Tetap', 'brurfebri@gmail.com', 1, '07010052.jpg', '$2y$10$lJ1ByxtsejoyY6u2S0MJSOEradEANz8bGylqbPqraB2zFx9UIsuq6', '1Whv3Nl7adBiEs5b2bxihid9Xc8eeGhjF4ZGYGZPmHLFhXKPTg5xFDYY4lzX', '2017-10-11 15:56:13', '2017-10-30 08:00:16'),
(2117, '00105015', 'DARMOKO', 'Laki-Laki', '3374100408690003', 'Islam', '089657678295', 2, 13, 43, 7, '1969-08-04', 'JL. GENUK BARU RT05/06 NO.102 A TEGALSARI SEMARANG', '2005-01-24', 'Tetap', NULL, 1, '00105015.jpg', '$2y$10$NdH4uNf.3VC1OC4A.AjjTul5l9ZGF1KkxHWArOmnh726Zj.rnmVKi', NULL, '2017-10-11 15:56:13', '2017-12-15 10:09:41'),
(2118, '00805029', 'DARWANTO', 'Laki-Laki', '3374080510740000', 'Islam', '085640499677', 2, 20, 28, 8, '1974-10-05', 'Jomblang Barat IV no. 654, Candi, Candisari, Semarang', '2005-08-25', 'Tetap', NULL, 1, '00805029.jpg', '$2y$10$g1/vDCi9OxsYwwT3yqbJqetGs9gkSUoT4kQW8yBCURbYQaaEhOTOu', NULL, '2017-10-11 15:56:13', '2017-10-11 15:56:13'),
(2119, '015030483', 'DESIANA KURNIAWATI', 'Perempuan', '3305124912900003', 'Islam', '081225073390', 2, 20, 36, 8, '1990-12-09', 'Lingkungan Ngempon RT001/004 Desa Ngempon, ec. Bergas', '2015-03-12', 'Tetap', NULL, 1, '015030483.jpg', '$2y$10$uXdAdIrrw4OB74ET3zZLh.NwPhw8m.EaQ.ND0mjlMVitNPIucwjlO', NULL, '2017-10-11 15:56:13', '2017-11-24 09:43:30'),
(2120, '011010102', 'DEVI HANNI LIBRIANTI', 'Perempuan', '3374154510840001', 'Islam', '081390342352', 2, 24, 43, 8, '1984-10-05', 'Jl. Candi Kencana VI D2 RT 004 RW 008, Kalipancur, Ngaliyan, Semarang', '2011-01-17', 'Tetap', NULL, 1, '011010102.jpg', '$2y$10$kqOnC2tmHnjawymfWhRyPepVfQ0BLZAT4cPoDowqkxnaEui/Bo0E6', NULL, '2017-10-11 15:56:13', '2017-10-11 15:56:13'),
(2121, '01209011', 'DHANANG RESPATI D', 'Laki-Laki', '3374011401880001', 'Islam', '085641814992', 2, 13, 41, 8, '1988-01-14', 'Kp. Grobogan no. 48 RT 003 RW 003,Pandansari Semarang Tengah', '2009-12-15', 'Tetap', NULL, 1, '01209011.jpg', '$2y$10$ppiWgJK5OlF5V6d0vooGY.lgs4gvGyZtvjIl5tRQ9gJj9z2ZqcQJO', NULL, '2017-10-11 15:56:13', '2018-03-15 09:29:17'),
(2122, '013090314', 'DHARU ADHI NUGROHO', 'Laki-Laki', '3311110505840006', 'Islam', '085728857505', 2, 13, 34, 8, '1984-05-05', 'Dewo RT 001 RW 004, Tempel, Gatak, Sukoharjo', '2013-09-09', 'Tetap', NULL, 1, '013090314.jpg', '$2y$10$bkMAArkNy4zzg4X6GP0AjuqqM58fJU1CYz8k5fWBIsRt44aJVhpv2', NULL, '2017-10-11 15:56:13', '2017-10-11 15:56:13'),
(2123, '00610038', 'DWI ASMORO', 'Laki-Laki', '3374021406790006', 'Islam', '08732288700', 2, 13, 7, 8, '1979-06-14', 'Jl. Abdul Rohman Bugen RT 002 RW 001, Muktiharjo Kidul, Pedurungan, Semarang', '2007-01-02', 'Tetap', NULL, 1, '00610038.jpg', '$2y$10$fLiefuxvHjEVgHdTdvr.oerPmcOm0r1O9lqXHRVpc4SbrXxvumHHG', NULL, '2017-10-11 15:56:13', '2018-02-01 07:22:21'),
(2124, '014040405', 'DWI HARSANTA', 'Laki-Laki', '3310142112830001', 'Islam', '085643916155', 2, 13, 34, 8, '1983-12-21', 'Joyotakan RT 007 RW 005, Joyotakan, Serengan, Surakarta', '2014-04-28', 'Tetap', NULL, 1, '014040405.jpg', '$2y$10$B9dvv5M4bmPBxCUVnZXqAeh4TUCZz0C7gNPVMP5KVkFq6SGrHui4e', NULL, '2017-10-11 15:56:14', '2017-10-11 15:56:14'),
(2125, '013120349', 'DWI PRIHATIN', 'Perempuan', '3322174610920001', 'Islam', '085727838502', 2, 13, 1, 4, '1992-10-06', 'Dsn Poten  RT 002 RW 001, Siwal, Kaliwungu, Semarang', '2013-12-23', 'Tetap', NULL, 1, '013120349.jpg', '$2y$10$rO0G5rFY6tof/4lKxRsMle405VTEu7072FoaT/xqpFYebWEjPRksK', 'xCGYSRGvQ5xCra8aEkNdHs4zNL6rbYzzDRr3Hf6hZfw9JxNSzSB7CX5nzw9H', '2017-10-11 15:56:14', '2017-12-15 09:36:14'),
(2126, '015040491', 'DWI RAHAYUNINGSIH', 'Perempuan', '3374044210870001', 'Islam', '081215909478', 2, 13, 42, 8, '1987-10-02', 'Jl. Medoho I No.34 Rt.1 Rw.1 Semarang', '2015-04-27', 'Tetap', NULL, 1, '015040491.jpg', '$2y$10$NCqenDVOqCRxNqWHqAOm8uPIt3fmVXEzlfnP3Efik50JigWGwI5ay', 'SAj87ZXCWq7SjgpcFICmyAY1nMhH1uUPobcO1VIyxZkgkgWpLfPSHcQpnIdb', '2017-10-11 15:56:14', '2017-10-11 15:56:14'),
(2127, '04010018', 'EDDY BAGUS PRIANTORO', 'Laki-Laki', '3374020109540001', 'Islam', '081229019590', 2, 36, 12, 8, '1954-09-01', 'Jl. Muara Mas Timur no. 7 RT 004 RW 003, Panggung Lor, Semarang Utara', '2010-04-08', 'Kontrak', NULL, 1, '04010018.jpg', '$2y$10$40dC7rJvtIPsnXOq0jP3oOgPIVSXNE.sklF7aY/ag8QjRa/x6FcjS', NULL, '2017-10-11 15:56:14', '2017-10-11 15:56:14'),
(2128, '014040407', 'ERLY ROSALINA', 'Perempuan', '3374156507730001', 'Islam', '081914440233', 2, 13, 43, 8, '1973-07-25', 'Jl. Gatot Subroto no. 23 RT 004 RW 003 Purwoyoso, Ngaliyan, Semarang', '2014-04-28', 'Tetap', NULL, 1, '014040407.jpg', '$2y$10$Q7QhMs67E5LhkYFI9JA9sefhJHv1k1IkhBqKpN.QG2iQqv3NN/nqe', NULL, '2017-10-11 15:56:14', '2017-10-11 15:56:14'),
(2129, '011020109', 'ERNA SETYORINI', 'Perempuan', '3374046901770001', 'Islam', '082221704801', 2, 13, 37, 8, '1977-01-29', 'Jl. Karang kimpul  RT 003 RW 001 no. 10, Tambakrejo, Gayamsari, Semarang', '2011-02-07', 'Tetap', 'erna.setyorini.maa@gmail.com', 1, '011020109.jpg', '$2y$10$nCaD/97PWUOQqpJOvqYoSutpm2HLjv5zxblBObio.a5DRZRdCTpwy', 'sVzDfL61pOFjU9g5Hs55Mi8aTMK6V3DOSn0fv5XDoAJez6s5Omf65CXsDHfp', '2017-10-11 15:56:14', '2017-11-04 02:57:04'),
(2130, '00309052', 'ERNY YUNI HASTUTI', 'Perempuan', '3374135806710001', 'Islam', '081329511655', 2, 21, 41, 8, '1971-06-18', 'JL. KIMAR III/38 SEMARANG', '2009-03-23', 'Tetap', 'erny.yunihastuti@gmail.com', 1, '00309052.jpg', '$2y$10$NibLuREeXcvXgFmBQlg8f.gVuRttbTCd8AkLLA/afhWHNpNyIs6oG', 'AiAG9ouFCP2ocPyqxRCoX9gnKlR5jN3z2sGfWEBGqHk3kKFxiYKZMkKkJ2UR', '2017-10-11 15:56:14', '2017-11-15 03:48:11'),
(2131, '017080613', 'FANDY SEPTIAWAN', 'Laki-Laki', '3302252709890002', 'Islam', '085647631132', 2, 13, 6, 1, '1989-09-27', 'GENDONG RT004/ RW 008, SENDANG MULYO- TEMBALANG', '2017-08-18', 'Kontrak', NULL, 1, '017080613.jpg', '$2y$10$V/BE35q4ancZNFg2GOaauuOhSu9qucmLW4YkQVR0CJ/6wJFokTw3i', 'eNiBBc60d52PXVf5tPPTIbvXm3dz0V9VTNrHb74IBevbALbzumcn5HXDayb5', '2017-10-11 15:56:14', '2017-12-28 09:08:58'),
(2132, '015090517', 'FERI SULISTIANTO', 'Laki-Laki', '3309190209910002', 'Islam', '0822433660568', 2, 13, 43, 8, '1991-09-02', 'Dampit Rt.7 Rw.2 Kalimati Juwangi Boyolali', '2015-08-25', 'Tetap', NULL, 1, '015090517.jpg', '$2y$10$buXtwdyLfzoVc7SVNxqKLeM/bvzWR7S3UOOEPz6cfOLqWE42pWRTq', NULL, '2017-10-11 15:56:14', '2017-10-11 15:56:14'),
(2133, '014060421', 'FIRMAN NURYANTO', 'Laki-Laki', '3374030811820000', 'Islam', '082136049894', 2, 13, 40, 8, '1982-11-08', 'Rejosari Gumuk A no. 7 RT 001 RW 011, Rejosari Semarang Timur', '2014-06-02', 'Tetap', 'oman_fx@ymail.com', 1, '014060421.jpg', '$2y$10$N2mP8UTd7F8umINDhKAwS.1P5wy094wQiSbkoru70ivA3gaBQ1fNe', 'vDa8v87sNO8bdI2NB6LoezPOjvLkHhATuoXjUI69vzhE3reMfBTabNhiLXS7', '2017-10-11 15:56:15', '2017-11-07 05:32:11'),
(2134, '014060423', 'GAN, FANNY SETIOWATI WIBOWO', 'Perempuan', '3374026110660001', 'Kristen', '08122900676', 2, 20, 42, 8, '1966-10-21', 'Jl. Kuala Mas I/16 RT 001 RW 013 Panggung Lor, Semarang Utara', '2014-06-27', 'Tetap', NULL, 1, '014060423.jpg', '$2y$10$r4sraPZ9srLMy2cH04hSTOkI6L0sSx0S4gNxfzEe9akTYP4OJMzWa', NULL, '2017-10-11 15:56:15', '2017-10-11 15:56:15'),
(2135, '012010188', 'HARI CAHYADI', 'Laki-Laki', '3328142009850003', 'Islam', '082116219085', 2, 20, 40, 8, '1985-09-20', 'Jl. Gajah Barat VI no. 7 RT 012 RW 009, Pandean Lamper, Gayamsari, Semarang', '2012-01-26', 'Tetap', 'harycahyadi9@gmail.com', 1, '012010188.jpg', '$2y$10$Hg/c1.mjdFoUv5S7AGxoz.NYF2cudfSTUH79IeioJQK/eGKq.JLFO', 'Rw3pWNkaCnOKBW7ki9Mg38frovHoJISFbVTiM8FORf4OBj9TFKkGjMQ77KoP', '2017-10-11 15:56:15', '2017-12-21 08:00:18'),
(2136, '014090441', 'HARRY SUSANTO UTOMO', 'Laki-Laki', '3374021708540005', 'Khatolik', '08812401049', 2, 28, 34, 8, '1954-08-17', 'Permata Kuning  J-164, RT 007 RW 006, Kuningan Semarang Utara', '2014-09-15', 'Kontrak', NULL, 1, '014090441.jpg', '$2y$10$F2YVoN96XtqB9GedOWqXTehmkgESw.1w9SNrNpHuEW/./sRTCkSc6', NULL, '2017-10-11 15:56:15', '2017-10-11 15:56:15'),
(2137, '012060237', 'HASTUNGKORO EMILUGARA', 'Laki-Laki', '3374080205770001', 'Khatolik', '08156687285', 2, 24, 34, 8, '1977-05-02', 'Gombel Permai VII/185 RT 005 RW 007, Ngesrep, Banyumanik, Semarang', '2012-06-18', 'Tetap', NULL, 1, '012060237.jpg', '$2y$10$rMhJdk.ZlgfqIEfb6rteqeFCuGYMSD5urbcCwdglxRbVU89x62ete', '1Acc2jpVWt98DhLIZPuoGSLkyqqLUadL3z4GrCKjqsBZuGChKx1IOAbQO7rY', '2017-10-11 15:56:15', '2017-10-31 07:25:36'),
(2138, '01003000', 'HENGKY TANTO S', 'Laki-Laki', '3374011602720002', 'Kristen', '0811274466', 2, 34, 12, 8, '1972-02-16', 'Gang Tengah no. 49 RT 004 RW 004, Kranggan, Semarang Tengah', '2003-10-21', 'Tetap', NULL, 1, '01003000.jpg', '$2y$10$a9LCFHtAfe/Nz8wujOd0NuLMuvNrb7DuIV05Yi5ky6nAuKJbC9mD.', 'HkiAS0gLG9TZSqoUATWsjT4u3jRrRTu6Wuhw3XphgowUl3mf8IRQtDo5ovnV', '2017-10-11 15:56:15', '2017-10-11 15:56:15'),
(2139, '015040494', 'HERI WIJAYA', 'Laki-Laki', '520109020580002', 'Islam', '0817268254', 2, 24, 29, 8, '1985-05-02', 'Villa Tembalang Blok E 8 Bulusan Tembalang', '2015-04-28', 'Tetap', 'heriwijaya.bprmaa@gmail.com', 1, '015040494.jpg', '$2y$10$7tSgD2P98RhdmMUy.8zGvOX4Jx5de4KhVlI03g.2hlFAD5wH75v7q', 'is3u3jK4SDQ2pnSQCYaQqJIfiQzeeaE0zx7FJc092MQXHmK0JGX6eDpaRjv2', '2017-10-11 15:56:15', '2017-11-07 10:28:48'),
(2140, '016020567', 'IDA RODLOTUL CHASANAH', 'Perempuan', '3315166808920006', 'Islam', '082242724425', 2, 13, 36, 8, '1993-08-28', 'Jl.Kalimasada Banaran Gunung Pati Semarang, Desa Guci RT 02/ RW 01 Godong, Grobogan', '2016-02-13', 'Tetap', 'idachasanah33@gmail.com', 1, '016020567.jpg', '$2y$10$WfqjwyXrKe7eVuByotjNJu4LDk0g7A69JHMMycbE3KYwrq2RdxctS', '93HbchoYTXWEEyXcZPhCjLBRirQfn1sx4MIeBzBmu45Xf454VEcVSgGLs7tg', '2017-10-11 15:56:15', '2017-11-10 02:29:54'),
(2141, '014030388', 'IKA PUSPITA SARI W', 'Perempuan', '3374076612870001', 'Islam', '08156678918', 2, 13, 41, 8, '1987-12-26', 'Jl. Mugas Dalam XII no. 1 RT 005 RW 001, Mugasari, Semarang Selatan', '2014-03-24', 'Tetap', 'ikawirya87@gmail.com', 1, '014030388.jpg', '$2y$10$r9Z1nQ.aDEuFz0kUpYzefefH4/S1/8bZyeh.fRIwpIS68GeAjhQfG', '4yU0XQf931GbacTXHyLZYmgRMsXBel5deIhQgLM1XnLnkOwxsUBGF3F4gMXj', '2017-10-11 15:56:16', '2018-01-02 07:43:32'),
(2142, '015020475', 'ISRIANTO', 'Laki-Laki', '3318142211720002', 'Islam', '087731344966', 2, 13, 43, 8, '1972-11-22', 'Jatisari Lestari C2/2 RT006/011 Jatisari, Mijen', '2015-01-26', 'Tetap', NULL, 1, '015020475.jpg', '$2y$10$m3xm2IC.SYATzYm0j9pipuDjK.xcZ2f0oC2tKh8jOS349DeyphQx.', 'meS31dP1dVdooEdD70gRnjK6jcbjn9OurW39TK1ssMN3XPqRHFPiaGNbnZR8', '2017-10-11 15:56:16', '2017-10-11 15:56:16'),
(2143, '013080306', 'JOKO RIDWAN RISTIYAN', 'Laki-Laki', '3374112403920003', 'Islam', '085640005855', 2, 13, 34, 8, '1992-03-24', 'Klipang Permai Blok I/388, RT 003 RW 023', '2013-08-01', 'Tetap', NULL, 1, '013080306.jpg', '$2y$10$B9sGvbO1FdmzsEGE1p9ULupD47pz.q.thJ1n8yT0gOlE6aPA4rd9O', NULL, '2017-10-11 15:56:16', '2017-10-11 15:56:16'),
(2144, '01003005', 'JUNI PINARINGSIH', 'Perempuan', '3374074906750001', 'Kristen', '08156678259', 2, 24, 41, 8, '1975-06-09', 'Lamper Mijen RT 005 RW 005 Lamper Tengah, Semarang Selatan', '2003-10-21', 'Tetap', NULL, 1, '01003005.jpg', '$2y$10$RN6VCV7xowATq7KD2.gt/eB8eCrdbpQmRG4LsvD9Bu/BxN.IwnUf6', 'YSMhG8SEb42cmhtS1UVWGSwdIUaCzHpty6mEP3lVXRkPvegM92dG9bhZv7Hl', '2017-10-11 15:56:16', '2017-10-11 15:56:16'),
(2145, '01009010', 'KELIK SUGIANTO', 'Laki-Laki', '3374131007710015', 'Islam', '08112708777', 2, 28, 38, 8, '1971-07-10', 'Mega Residence, Jalan Tulip Garden No. 51 RT 016/RW 006 Kelurahan Pudak Payung Kecamatan Banyumanik Kota Semarang', '2009-10-19', 'Tetap', 'keliksugianto8777@gmail.com', 1, '01009010.jpg', '$2y$10$pA4lfwn.IKi0Q1.aqSApg.dS9RqSVqdUy3nQ7X6Cpsctml7iQCGT6', 'nMMn85a1razgToiSdwa4xxNlUJEwyQt1c2aQP39VLHWcJDeNbRZQngB7QTsy', '2017-10-11 15:56:16', '2017-12-14 02:34:24'),
(2146, '015010458', 'LAILATUL BADRIAH', 'Perempuan', '3315065807950001', 'Islam', '082220263649', 2, 13, 44, 8, '1995-07-18', 'Ds. Mlowo RT 001 RW 001, Mlowo, Karangtakur, Pulokulon, Grobogan', '2015-01-05', 'Tetap', NULL, 1, '015010458.jpg', '$2y$10$/3r2R4oi76DMP0ERE/QvO.H7gM3hnTmTOxGPURG1TDzWaGgzmRLMy', 'o137Cu9Tcm0zrjjeCYkhKyaZtpURcOlWlQGHj3d3YcZYIDpxITSF99JlMaIV', '2017-10-11 15:56:16', '2018-01-08 05:27:00'),
(2147, '012030218', 'LENY ARJANY', 'Perempuan', '3374094810710001', 'Kristen', '081914630558', 2, 30, 12, 8, '1971-10-08', 'Jl. Iman Bonjol no. 109 RT 003 RW 001, Purwosari, Semarang Utara', '2012-04-02', 'Tetap', NULL, 1, '012030218.jpg', '$2y$10$6aH3j8HRikPkExc/DQY7LuYnZikxpUT82g9llTjLxv9CSN/DyOtbi', '7ebEcHLRG5RnSEdcdlucZqezvH4CWgFdW8PpbjkPMOdpwOMwIf78ZSgm8ckr', '2017-10-11 15:56:16', '2017-11-06 02:30:16'),
(2148, '017090621', 'MADE LAKSANA AGUNG BAYUADI', 'Laki-Laki', '3374050111780001', 'Katholik', '081215556018', 2, 13, 40, 8, '1978-11-01', 'JL. ARGO MUKTI NO. 554 RT 005/ RW 025, TLOGOSARI KULON, KEC. PEDURUNGAN, KAB. SEMARANG ', '2017-09-25', 'Kontrak', NULL, 1, '017090621.jpg', '$2y$10$XKsy2Rstj84cnnrfOs3dBu3PcAeP7ZKMaycPs1gdj2kdcMxVLgV4e', 'hzu4FPPxFE8VgFNUB34iZgT6dybu2iA1eTvHE14qlbpVGUViVzZhnTUouE7B', '2017-10-11 15:56:16', '2017-10-11 15:56:16'),
(2149, '017080612', 'MARIA ADHETA', 'Perempuan', '3374114708950001', 'Katholik', '085290050946', 2, 13, 36, 8, '1995-08-07', 'JL. KEPODANG B-III/ 110 KOPKAR RT 004/ RW 012 PUDAK PAYUNG BANYUMANIK', '2017-08-16', 'Kontrak', NULL, 1, '017080612.jpg', '$2y$10$iPvEciKUS/y1sTTMiXyDu.AKSzhfKX7kw4SaByN6JOf0aqLkJNQD6', NULL, '2017-10-11 15:56:17', '2017-10-11 15:56:17'),
(2150, '01203009', 'M ISROI', 'Laki-Laki', '3374010509730004', 'Islam', '085713016914', 2, 12, 43, 1, '1973-09-05', 'Jl. Bedagan I no. 529 RT 003 RW 002, Sekayu, Semarang Tengah', '2009-12-04', 'Kontrak', NULL, 1, '01203009.jpg', '$2y$10$3s1juOXbHqFVNEFhiU4iJOZgqw8nsxg.R04RNGGPn5VIlHs.zijDy', NULL, '2017-10-11 15:56:17', '2017-11-10 02:43:41'),
(2151, '014120453', 'MAHARDIKA RIZKI AMALIA', 'Perempuan', '3374144212920001', 'Islam', '081227101448', 2, 13, 39, 8, '1992-12-02', 'Kedungpane RT 003 RW 005, Kedungpani, Mijen, Semarang', '2014-12-22', 'Tetap', NULL, 1, '014120453.jpg', '$2y$10$zfrksEDjpO0QBo2QTDNdSOkIDu1P.oPQW4Qh5AIImzD4Le3UGdiyG', '0SFqwMGbDYlm01pZvcIvBUjGxOTO9DXBO4TI5Ns0adxLcD7gFuL7erXFIag1', '2017-10-11 15:56:17', '2017-10-11 15:56:17'),
(2152, '017050599', 'MEGA BAGUS SUJATMOKO', 'Laki-Laki', '3319050603880002', 'Islam', '08112991388', 2, 13, 36, 8, '1988-03-06', 'JL. TIRTO USODO TIMUR, PERUM ROYAL ARCADIA NO. B9, PEDALANGAN BANYUMANIK', '2017-05-08', 'Kontrak', 'admin@gmail.com', 1, '017050599.jpg', '$2y$10$gG4EYAG2BOek2pcO11S.jOfXUD68lYrTHLTY/fBY6sUi0xoKBmNSG', 'Bhvj6ALK6HZggoZrawGNj6fTRxhlft5GrOBkkjiPNPQCpPh4Ruxp25aQTxSd', '2017-10-11 15:56:17', '2017-10-11 15:56:17'),
(2153, '01010067', 'MOCH HENDRI SUKAMTO', 'Laki-Laki', '3374080405810004', 'Islam', '081575387008', 2, 13, 28, 8, '1981-05-04', 'Kagok Dalam 3 no. 68 RT 001 RW 005, Wonotingal, Candisari, Semarang', '2010-10-26', 'Tetap', NULL, 1, '01010067.jpg', '$2y$10$eC56Iy77bba/VTuzofiq1ORNsGdwGFojiTs95pG0v46ONLdKjQHn.', NULL, '2017-10-11 15:56:17', '2017-10-11 15:56:17'),
(2154, '015050498', 'MUHAMMAD ARIFIN', 'Laki-Laki', '3374101803920002', 'Islam', '085824094008', 2, 13, 39, 8, '1992-03-18', 'Jl.Tegal Kangkung 143B Rt.5 Rw.2 Kedungmundu Tembalang Semarang', '2015-05-11', 'Tetap', NULL, 1, '015050498.jpg', '$2y$10$Zyoa614nZv1xgsrQzeIjrejKyuU4fh1ULKmMknhENz4O2Bt9y169u', 'NrN2HieZHiPgdct4SkNDywy5YR6qnr1iyLr6ueTzRJDDvZJ2CDIQiPs6cOyy', '2017-10-11 15:56:17', '2018-01-11 02:02:48'),
(2155, '012120270', 'MUNKARIS', 'Laki-Laki', '3374061904880003', 'Islam', '085878817499', 3, 20, 39, 8, '1988-04-19', 'Tlogomulyo Gasem Peting RT 007 RW 007, Tlogomulyo, Pedurungan, Semarang', '2013-11-26', 'Tetap', NULL, 1, '012120270.jpg', '$2y$10$IdCiDlgISPBkv1rmYwyi0.3TSFsQtvhxD0Ij9FowFgrbfFGPQqgZm', 'THLWJHdXBzj7Gw61UnGuERh5CdY6et41EVl3oIl7WpYpGQLZnUJqpvLc02NP', '2017-10-11 15:56:17', '2017-11-09 08:08:11'),
(2156, '014060418', 'N.T. YUDITYA WICAKSONO ADI NUGROHO', 'Laki-Laki', '3374130902850002', 'Katholik', '082134885989', 2, 24, 28, 8, '1985-02-09', 'Jl. Kurantil II/165 RT 05 RW 05, Kel. Krapyak, Semarang Barat', '2014-06-02', 'Tetap', NULL, 1, '014060418.jpg', '$2y$10$5kgMNmngmMmfdJOfoXqnIuV40GnUYuHxI0IuqXL3srGEYKN.uyAGi', NULL, '2017-10-11 15:56:17', '2017-10-11 15:56:17'),
(2157, '013050290', 'NUR ARIFIN', 'Laki-Laki', '3318190504860004', 'Islam', '085641346444', 2, 20, 43, 8, '1986-04-05', 'Sambiroto RT 008 / 001, Sambiroto, Tayu, Pati', '2013-05-22', 'Tetap', NULL, 1, '013050290.jpg', '$2y$10$MCB4DIxiwncAOz7tjmc0vOnn4ywQ6bIMlsnUEeZK6CbWaGbR3Nhl.', NULL, '2017-10-11 15:56:18', '2017-10-11 15:56:18'),
(2158, '017060602', 'NUGRAHANI DIAN LESTARI', 'Perempuan', '3374045701810001', 'Islam', '081901721121', 2, 13, 36, 8, '1981-01-17', 'PERMATA TEMBALANG EDELWEIS 45 BANYUMANIK RT 003/ RW 005 DESA KRAMAS ', '2017-06-12', 'Kontrak', NULL, 1, '017060602.jpg', '$2y$10$Mr1dACuxpXtiVF1FZm8Ge./a.TKEoEfw22RHh1y60f9d8MgsTmxYe', NULL, '2017-10-11 15:56:18', '2017-10-11 15:56:18'),
(2159, '01112168', 'PASRAHANTO MAHARDIKA', 'Laki-Laki', '3374113010900002', 'Islam', '085640919740', 2, 24, 39, 8, '1990-10-30', 'Jl. Kopodang Selatan I/A-9, RT 003 RW 014, Pundak Payung, Banyumanik, Semarang', '2011-12-12', 'Tetap', NULL, 1, '01112168.jpg', '$2y$10$wwepkDrRf97EzeCBqMRuNuK4/.w823VxrOf043jWptHGa.Um7BVOy', 'bPe2v1tJXFS90rY4hodt8AjLEewV8MkX4lt55OqCy8HApOqrU0zQ0qraY38d', '2017-10-11 15:56:18', '2017-10-11 15:56:18'),
(2160, '016040580', 'PETRUS CLAVER ARI S', 'Laki-Laki', '3374132509810003', 'Katholik', '081325755735', 2, 13, 34, 8, '1981-09-25', 'Jl.Patimura Perum Kampoeng Harmony O18 Rt.9/9 Bandarjo Ungaran Barat', '2016-04-01', 'Tetap', NULL, 1, '016040580.jpg', '$2y$10$vnJRYjwpoQ2DcFJiclbwGufnWDLgPYXHkm9meG3DLWHFq1vWqE30m', 'fNpWLHLyuijTwm8Ar5XEq9eYN191Kbtzws9TN3DLvmDGgCVQgDoM1hdWQFk7', '2017-10-11 15:56:18', '2017-10-11 15:56:18'),
(2161, '013120374', 'RIZKI BAYU ADMAJA', 'Laki-Laki', '3374101210960001', 'Islam', '089668601385', 2, 13, 38, 8, '1996-10-12', 'Klipang Blok Z XV/A/9 RT 003 RW 003, Sendangmulyo, Tembalang, Semarang', '2014-06-30', 'Tetap', 'rizkibayu16@gmail.com', 1, '013120374.jpg', '$2y$10$AuYlvYNt89qJvMc7OLD96uaQhAe69lu847cNIq/ilS/tXHd7etMSa', 'BL7IFdcTaYuoSNf2zovZYUmDBzoMxh9wnBToMDndv0OT2yqKZjeJDZUQzkZF', '2017-10-11 15:56:18', '2018-02-05 08:22:37'),
(2162, '014100443', 'RIYADI', 'Laki-Laki', '3311030408820002', 'Islam', '081325618253', 2, 13, 34, 8, '1982-08-04', 'Perum Puri Taman Asoka No. 37 Dk. Gambiran RT 003 RW 004 Ds. Sukoharjo Kec. Margorejo Kab. Pati', '2014-11-01', 'Tetap', NULL, 1, '014100443.jpg', '$2y$10$QkbudqqqAmzW5dwOS8Z59e2UTOwrQgT.ftQOKF46agxN8rQDiVgUy', 'u0aHtN3GySWmo9vLoP5cm27kOsQC6bQfzJvfvKVSC7sT91LM26yN3IJCNQcl', '2017-10-11 15:56:18', '2017-11-15 08:21:06'),
(2163, '011020123', 'ROSADY HERSASONGKO', 'Laki-Laki', '3374071305830002', 'Islam', '082225543931', 2, 13, 41, 8, '1983-05-13', 'Jl. Nias no. 8 RT 001 RW 004, Karangtempel, Semarang Timur', '2011-02-21', 'Tetap', NULL, 1, '011020123.jpg', '$2y$10$FWpvPXuo42gPRR15Zn/Iq.vDgiIEQUvqCwCE4iISvGmQI6YymJZjm', NULL, '2017-10-11 15:56:18', '2017-10-11 15:56:18'),
(2165, '05010025', 'SEPANOV KURNIANTO', 'Laki-Laki', '3322180211810003', 'Islam', '085727584484', 2, 20, 28, 8, '1981-11-02', 'Jl. Bima I no. 14 RT 006 RW 010 , Lerep, Ungaran Barat, Semarang', '2010-05-05', 'Tetap', NULL, 1, '05010025.jpg', '$2y$10$7Yj2YU6zhHF8b9p6EqpkfOO5HDK87b3U2qU/6BrusKXb97gfZgDtS', NULL, '2017-10-11 15:56:18', '2017-10-11 15:56:18'),
(2166, '00108054', 'SIGIT ARIE H', 'Laki-Laki', '3374130609790005', 'Islam', '085640691979', 2, 32, 12, 8, '1979-09-06', 'Jl. Mendut VII no. 8 RT 002 RW 011,Kalipancur, Ngaliyan, Semarang', '2008-02-08', 'Tetap', NULL, 1, '00108054.jpg', '$2y$10$xF5QwdndMVpTewd4VdOYWO3/rUwaaFVY4Nf7KDzgUbdzczuxsacla', 'aXK2BCntc5l4qWZe2kmftdhJssGZ0RDshdW2hI4htLFhljMQenp9l4lGpsng', '2017-10-11 15:56:19', '2017-10-11 15:56:19'),
(2167, '013040284', 'SIGIT BAGUS PANUNTUN', 'Laki-Laki', '3374123003900002', 'Islam', '081225226175', 2, 13, 29, 8, '1990-03-30', 'Jl. Dewi Sartika Barat IV / 16 RT 003 RW 003, Sukorejo Gunung Pati, Semarang', '2013-04-13', 'Tetap', 'sigit.baguspanuntun@gmail.com', 1, '013040284.jpg', '$2y$10$QNasTKrnmFDsdXQfpqfabuz9LOU2GH0xUOkJ/7qFzGrXxi1Y.Kuzi', 'RCJZkD4B7rCiV9i4XsqCCYjoF3vGTSB5YaR9eKXfC84tmzmwBPtD83rMOglT', '2017-10-11 15:56:19', '2017-11-07 10:09:26'),
(2168, '017090619', 'SITI NINGRUM WIDYASTUTI', 'Perempuan', '3308205805940001', 'Islam', '085619677960', 2, 13, 1, 1, '1994-05-18', 'DSN.BENER RT 01, RW 01,KEC. SECANG, KAB. MAGELANG', '2017-09-11', 'Kontrak', NULL, 1, '017090619.jpg', '$2y$10$bQV69VA4FpgFi3t3jxlv5OJoPluhR.tLJ4jH4H7Ul3opSn4YLEgEe', NULL, '2017-10-11 15:56:19', '2018-01-08 05:45:55'),
(2169, '017050597', 'SITI NURCAHYANI', 'Perempuan', '371011211990003', 'Islam', '08121535242', 2, 13, 34, 8, '1992-12-03', 'DUSUN SEMPU RT 01, RW 013, TANGGULREO MAGELANG', '2017-05-05', 'Kontrak', NULL, 1, '017050597.jpg', '$2y$10$d5DlvJfbu60kvT35S8xGdOAxbxlNSCaZTGq9jFVtAKTjrGWw0KJam', 'zdG9NwQq3kYxHzrAjlQghjn3B7rLbAgfsLlMb6X2iFA48AgiewgyHmp3T8n0', '2017-10-11 15:56:19', '2017-10-11 15:56:19'),
(2170, '01209009', 'SRI HANDAYANI', 'Perempuan', '3374014104780001', 'Islam', '085866919250', 2, 20, 28, 8, '1978-04-01', 'Jl. Turangga Utara IV no. 886, Pedurungan, Pedurungan Tengah, Semarang', '2009-12-07', 'Tetap', NULL, 1, '01209009.jpg', '$2y$10$a6OX0CZQUnalpOZVkfisxevKMygTxmvKHd1mAvfvATc9wxLtz2jc.', 'o2OhvmDZyNVbYNrFcUTBiLZ3lAYjke1jjsgfCfD7WbiflqlrupvVHaqypyj9', '2017-10-11 15:56:19', '2017-10-11 15:56:19'),
(2171, '01003001', 'SOEJANTO', 'Laki-Laki', '3374131809630001', 'Kristen', '0811290719', 2, 38, 12, 8, '1963-09-18', 'Golf Residence Kavling 7 no. 1 RT 008 RW 002, Jangli, Tembalang, Semarang', '2003-10-21', 'Tetap', NULL, 1, '01003001.jpg', '$2y$10$eOsU2mdT3SiqHKr.QF6xquSU9TszwaKzXOeOt088A6zuroI57TcYO', NULL, '2017-10-11 15:56:19', '2017-10-11 15:56:19'),
(2172, '06010040', 'SUGENG SARTONO', 'Laki-Laki', '3374091805590001', 'Islam', '08562694001', 2, 10, 43, 8, '1959-05-18', 'Kintelan no. 104 RT 001 RW 002, Bendungan, Gajah Mungkur, Semarang', '2010-06-21', 'Kontrak', NULL, 1, '06010040.jpg', '$2y$10$5zccO99QIYKlQJxWaYpRM.LnGqIq57.PdEc8OaZpQoUWQNQDywm2W', NULL, '2017-10-11 15:56:19', '2017-10-11 15:56:19'),
(2173, '00908078', 'SUYAMTO', 'Laki-Laki', '337410070180004', 'Islam', '082325562879', 2, 24, 18, 8, '1981-01-07', 'Saptamarga II no. 117 RT 001 RW 001,Jangli, Tembalang, Semarang', '2008-10-06', 'Tetap', NULL, 1, '00908078.jpg', '$2y$10$ru.Q0gBIEJyDW.dQm2yU/.AnpSUzYdQfgwe0LVOElPO0Xo3CAuADe', NULL, '2017-10-11 15:56:19', '2017-10-11 15:56:19'),
(2174, '00306034', 'TEGUH RAHAYU', 'Laki-Laki', '3373040703810003', 'Kristen', '088215524405', 2, 13, 34, 8, '1981-03-07', 'Jl. Nakula Sadewa Raya no. 10 RT 007 RW 003, Dukuh, Sidomukti, Salatiga', '2006-03-20', 'Tetap', NULL, 1, '00306034.jpg', '$2y$10$O9Ngu6mSARxXPq7DoZHqUu9Iu.3BspPQ0kbzpz2uSXJTl0q1sS9OW', 'beIQyTtxI7YzrVWSFrulNTWzqz3Fh0Q6Fi4QwQTj0biNcPyFTY1qVPMKcI1r', '2017-10-11 15:56:20', '2017-10-11 15:56:20'),
(2175, '015080511', 'TRI HANDOKO', 'Laki-Laki', '3374080801820001', 'Islam', '081226792580', 2, 13, 22, 8, '1982-01-08', 'Jl. Candi Pawon Selatan 8 N0 27 Rt.2 Rw.1 Kalipancur Ngaliyan', '2015-08-18', 'Tetap', NULL, 1, '015080511.jpg', '$2y$10$Cg6akMOy1Srrh/7Y1dyNd.YuYiTEuUPDBJupXdJ9DGUT91gy95bDS', NULL, '2017-10-11 15:56:20', '2017-10-11 15:56:20'),
(2176, '01003006', 'TRI YURI LESTARI', 'Perempuan', '3374064610670003', 'Islam', '081228508111', 2, 24, 42, 8, '1967-10-09', 'Pedurungan Tengah RT 004 RW 002, Pedurungan Tengah, Semarang', '2003-10-21', 'Tetap', NULL, 1, '01003006.jpg', '$2y$10$i3d2XckFFDIieFKWiaKWTuplPMP1jKb24s00v.YypxBqnxsjzPAe.', NULL, '2017-10-11 15:56:20', '2017-10-11 15:56:20'),
(2177, '015040492', 'TRI YANTO', 'Laki-Laki', '3374062705810011', 'Islam', '085640031155', 2, 13, 34, 8, '1981-05-27', 'Pedurungan Kidul Rt 3 Rw 1 Pedurungan Kidul Pedurungan', '2015-04-27', 'Tetap', NULL, 1, '015040492.jpg', '$2y$10$vCr4zAZ1Fiz3TaNjCmczZ.ZjS1nhGWOMjWmIug5TwXS86eDS9DEi2', 'n5Lgm1dMoLaxx3g32BantcpZPpNGJmq1rbRsKMyx9tCcbH9NA8wubcoQOs4e', '2017-10-11 15:56:20', '2017-11-13 03:23:53'),
(2179, '00104010', 'WAHYU PRIYO UTOMO', 'Laki-Laki', '3374031404760005', 'Islam', '08156576064', 2, 13, 39, 8, '1976-04-14', 'Jl. Blimbing  I- B2/1, RT 002 RW 012, Jatisari Permai, Mijen , Semarang', '2004-01-02', 'Tetap', NULL, 1, '00104010.jpg', '$2y$10$IB1E3ov3459PGg.gWWbS1O7zszlJMY2TG/xckbj.InoplTi71I9Da', '5pq4rxMUmqI14EQqYjgHe32GjhAEv6yxLclv4Z9HcZFrRQDWtkj3DTaAvZh5', '2017-10-11 15:56:20', '2017-10-11 15:56:20'),
(2180, '014020369', 'WAHYU WULAN ADISTA', 'Perempuan', '3374067012840001', 'Islam', '085600046656', 2, 13, 28, 8, '1984-12-30', 'Jl. Kangguru Raya no. 48 RT 006 RW 003, Gayamsari, Semarang', '2014-02-12', 'Tetap', 'adistahappy@gmail.com', 1, '014020369.jpg', '$2y$10$5j3mWyYr8s2/4J5RIVqiZOcZe8QMDbgQQQfXSUK3J.tkOG1ziGXhC', 'Zo1jv6292J2qJX4u0aQNd8oBPuZHsstuQePGqWjLSkYYpFM0sMa0s81i8Wra', '2017-10-11 15:56:20', '2018-01-29 09:14:33'),
(2181, '014060425', 'YANUARITA PITASARI', 'Perempuan', '3374035101740001', 'Islam', '083842036363', 2, 13, 42, 8, '1974-01-11', 'Jl. Rejosari VIII/30 RT 007 RW 011 , Rejosari, Semarang Timur', '2014-06-27', 'Tetap', NULL, 1, '014060425.jpg', '$2y$10$X9c3P/e99ZpKT768xdlihe8HcnGlnvhcz9AfX3xaCfRNsaxACmWJa', NULL, '2017-10-11 15:56:20', '2017-10-11 15:56:20'),
(2182, '013090320', 'YOSEP SURJANTO', 'Laki-Laki', '3374130807700002', 'Islam', '082133764182', 2, 20, 28, 8, '1970-07-08', 'Jl. Alam Peni D.1 / 11 RT 011 RW 016, Sendangmulyo, Tembalang, Semarang', '2013-09-23', 'Tetap', NULL, 1, '013090320.jpeg', '$2y$10$hAG/MuhLdNtAbX9Ybvuate.WyUWaVEdZaOjlv13SNg8LdXhBptUCm', NULL, '2017-10-11 15:56:21', '2017-12-29 08:58:14'),
(2184, '01009020', 'YUNIATI RETNO W', 'Perempuan', '3322187006760001', 'Islam', '087700320761', 2, 24, 40, 8, '1972-06-30', 'Dsn. Gebug RT 001 RW 009, Ungaran Barat, Semarang', '2003-12-01', 'Tetap', NULL, 1, '01009020.jpg', '$2y$10$SVgGUWE.knQb5QgjfRXoXu4kVA4vAop0D/qdfCj/3tg3T5fJsNhHO', 'EBEQ3gvPhHtwcidmdgLms4lBbbDm2wGda5Ov9r1ZJ3kpZtHmHXp9m9OdmX7Z', '2017-10-11 15:56:21', '2017-11-04 02:45:56'),
(2185, '017011635', 'ROSITA NATALIA', 'Perempuan', '3374094912840001', 'Islam', '085640420369', 2, 13, 21, 1, '1984-12-09', 'JL. Lempongsari 2 No. 503 RT 002/ RW 001 Lempongsari Gajah Mungkur', '2017-11-20', 'Kontrak', 'l_erga@yahoo.com', 1, '017011635.jpg', '$2y$10$sHrFnEBDTpbLrxE65zUwN.zeUHxCAeI2PpTnqozRVZQPeKE36.AfW', NULL, '2017-11-24 10:03:31', '2017-11-24 10:14:07'),
(2186, '017010630', 'NANDA BAYU ANDIKA INDRIYANTO', 'Laki-Laki', '3374060605840004', 'Islam', '081326039911', 2, 13, 1, 1, '1984-05-06', 'Giri Mukti No. 237 RT 003/RW 023 Desa Tlogosari Kulon Kec. Pedurungan', '2017-10-30', 'Kontrak', 'ubay.9911@gmail.com', 1, '017010630.jpg', '$2y$10$BMNzLiC5ph7Mffzf.LtfpeZGME1NFS12qwbJlmD.9G0WmhA6Jh.Su', NULL, '2017-11-24 10:10:27', '2017-11-24 10:10:27'),
(2189, '017010628', 'MUHAMAD SURURI', 'Laki-Laki', '3328011803850001', 'Islam', '085727525226', 2, 13, 27, 3, '1985-03-18', 'PRUPUK SELATAN RT 005/ RW 004, DESA PRUPUK SELATAN KEC. MARGASARI KAB. TEGALSelatan', '2017-10-09', 'Kontrak', 'muhamadsururi99@gmail.com', 1, '017010628.jpg', '$2y$10$cl.7z3yMOhX4SCXLiXmxSuQ3TFbUkF2L7hSIhHV2fBPT4TArxwNj6', NULL, '2017-11-25 04:49:42', '2017-11-25 04:49:42'),
(2190, '017011634', 'MILAWATI', 'Perempuan', '3324077001950001', 'Islam', '08997887294', 2, 13, 33, 5, '1995-01-30', 'Gunung Munding RT 02/ RW 09, Desa Pasigitan, Kec. Boja, Kab. Kendal Jateng', '2017-11-20', 'Kontrak', 'lala.mila51@yahoo.com', 1, '017011634.jpg', '$2y$10$nVt2V67Z1p3IA.VcrDGcS.jchMg2IXWz94c1USc4R0uwA85/8X.q6', NULL, '2017-11-25 05:41:51', '2017-11-25 05:41:51'),
(2191, '017010632', 'ANDREAS ARGATYA HARYANTO PUTRA', 'Laki-Laki', '3374112809890001', 'Katholik', '081228500464', 2, 13, 25, 5, '1989-09-28', 'KEPODANG RAYA P-77 RT 02/ RW 012 PUDAKPAYUNG, KEC. BANYUMANIK, SEMARANG', '2017-10-26', 'Kontrak', 'andreasargatyahp@gmail.com', 1, '017010632.jpg', '$2y$10$gG4EYAG2BOek2pcO11S.jOfXUD68lYrTHLTY/fBY6sUi0xoKBmNSG', '99yaypnPekWnOOqlh6gJWwz0QpWiOzNNJ6uK2R3VFL4u2T6SCR3x5mjjHwAn', '2017-11-25 05:48:48', '2018-03-21 03:49:15'),
(2192, '017011631', 'RISA SRI REJEKI', 'Perempuan', '3310195106980001', 'Islam', '085729715601', 2, 13, 26, 6, '1998-06-11', 'PUCANG KULON RT 01/ RW 06 PUCANGMILIRAN, KEC. TULUNG', '2017-11-06', 'Kontrak', 'risadoremi2@gmail.com', 1, '017011631.jpg', '$2y$10$WiLhWE3k44vnMjNm2rFqRORWFlnvGUIiQk91uJvh.pvw6G8u/YS06', NULL, '2017-11-25 05:56:18', '2017-11-25 05:56:18'),
(2193, '017012629', 'YOHANES HERMAWAN BUDI SAMBODO', 'Laki-Laki', '3312121211720002', 'Katolik', '081215325560', 2, 26, 9, 7, '1972-11-12', 'PERUM GIRI ASRI RT 02/ RW 03 KEL. SINGODUTAN, KEC. SELOGIRI', '2017-12-04', 'Kontrak', 'hermawan.bprmaa@gmail.com', 1, '017012629.jpeg', '$2y$10$dxS29d5VKWZuNKb79iPGRuV.IJdsf7DyUbJnMtp3BQ3vhdG.fGdQG', '4E8fFoiQxmTxQO1kfrverj7jdDS4Fiv9VdjYMzYQKGTTV1G08Il2QVPudPn8', '2017-12-11 03:24:20', '2018-01-12 10:09:47'),
(2194, '017012638', 'SONNY LAKSANA NUGRAHA', 'Laki-Laki', '3372041807680002', 'Kristen', '081325522715', 2, 26, 9, 2, '1968-07-18', 'MENDOKAN RT 001/ RW 028, KEL. JEBRES, KEC. JEBRES, KAB. KOTA SURAKARTA', '2017-12-04', 'Kontrak', 'sonnynugraha18@gmail.com', 1, '017012638.jpeg', '$2y$10$n.LAaq7P7V.WhyPMFJKffOeDwC8he4UY96qpztG0mMJlam/WzATom', 'WtUkhztRb8A3m5PdiDIw1GUmYHiwRfyCLR82lgB8PHjRmeiv5ksbca3CcGrb', '2017-12-14 08:07:37', '2018-01-08 05:33:06'),
(2195, '017012637', 'ARIS SETIAWAN', 'Laki-Laki', '3601130802950002', 'Islam', '083871517351', 2, 13, 43, 8, '1995-10-03', 'JL. TAMTAMA BARAT 5 NO.92 SAPTA MARGA 3 RT 07/ RW 09 DESA NGESREP, KEC. BANYUMANIK', '2017-12-04', 'Kontrak', 'aris.tea108@gmail.com', 1, '017012637.jpeg', '$2y$10$RRIE2PJo.Idgke1HBy0XruQmSQqtVCYJs9AulVjnZXA1A.dppUaG2', 'Qy4n1RFJ145RNG1VvA65BmoB0zWw0my2KxHZqEjxkbH9lveK1vHQmxVgpP9w', '2017-12-15 03:20:24', '2018-02-01 07:26:20'),
(2197, '017012640', 'ARIF ASROFI', 'Laki-Laki', '3318030905920001', 'Islam', '081229685119', 2, 13, 31, 4, '1992-05-09', 'KARANGMULYO RT 001/ RW 001,KARANGMULYO, KEC. TAMBAKROMO', '2017-12-11', 'Kontrak', 'arif.asrofi5@gmail.com', 1, '017012640.jpeg', '$2y$10$XY0ToOwXz.Pjd8mBdHAe0OCUCtz2iOO9w6l68.3ncMBu6nH35eKVe', NULL, '2017-12-15 03:35:11', '2018-03-21 04:32:59'),
(2198, '017012641', 'DYON JODDY KINZA NOVPRI', 'Laki-Laki', '''3322133011920001', 'Islam', '085740705692', 2, 13, 13, 3, '1992-10-30', 'LINGKUNGAN KRAJAN LOR RT 003/ RW 001 WUJIL, KEC. BERGAS KAB. SEMARANG', '2017-12-18', 'Kontrak', NULL, 1, '017012641.jpeg', '$2y$10$3ift7DIk5TV5a7qL1VO5OOeSnmFnfs6hOlFu0RDy4siB.hmmeZ69a', NULL, '2017-12-15 03:38:02', '2018-02-01 06:58:41'),
(2199, '017012642', 'TYAS ALIFIAN EFFENDI', 'Perempuan', '3215056403880003', 'Islam', '081393939192', 2, 13, 26, 2, '1988-03-24', 'PERUM KARAWANG JAYA BLOK BD/7 RT 028/ RW 016, GINTUNGKERTA KEC. KLARI KAB KARAWANG', '2017-12-18', 'Kontrak', 'tyasalifiana@gmail.com', 1, '017012642.jpg', '$2y$10$z8u9ZBtfv8fYDLaFJMobyuJQjpWbWp3EpsIQnC9lWzuoQ85JwOHnu', NULL, '2017-12-15 03:42:10', '2017-12-29 03:23:37'),
(2200, '017012644', 'EKO SISWOYO', 'Laki-Laki', '3326102603980003', 'Islam', '085712386283', 3, 13, 39, 8, '1998-03-26', 'DUKUH PEGIRIKAN RT 002/ RW 008 DESA TEGALONTAR, KEC. SRAGI', '2017-12-27', 'Kontrak', 'ekoputra351@gmail.com', 1, '017012644.jpeg', '$2y$10$jCnwjHKCYxy0pHnrfDq7vOBexUE5k6KkP7mVbMBHQyDYW7rNNZaiS', 'JQeULTjUVqQHkdtwe3lBvgFnFFqQ5ycLTXF88Ro4nOAz9oARmc2400U2pSJy', '2017-12-28 09:23:56', '2018-04-16 04:24:42'),
(2201, '017012643', 'DIANNITA SARI YUSUF', 'Perempuan', '3322134706830005', 'Islam', '081327979121', 2, 13, 26, 3, '1983-06-07', 'VILLA PUDAK PAYUNG BARU NO. 3 RT 001 RW 005, DESA PUDAK PAYUNG KEC. BANYUMANIK', '2017-12-27', 'Kontrak', 'diannita0706@gmail.com', 1, '017012643.jpeg', '$2y$10$H/JjNIblOiXCsMu7n3UcFeosAxM8pT4ax4HH3d.exPjLeMxByw6Bi', NULL, '2017-12-28 11:01:36', '2017-12-28 11:01:36'),
(2202, '017012645', 'EKA SUSANTI', 'Perempuan', '3374045012890002', 'Islam', '082137377491', 2, 13, 13, 5, '1989-12-10', 'KP. TAMBAKAN RT 001/ RW 007, DESA KALIGAWE, GAYAMSARI KOTA SEMARANG', '2017-12-27', 'Kontrak', 'eka.susanti1990@gmail.com', 1, '017012645.jpeg', '$2y$10$E8AFKqQvKqoS9VjeNwycyuIOl3OddkUTHuCcF3suXdGlLi6bgvDk6', NULL, '2017-12-28 11:06:26', '2018-01-08 05:38:34'),
(2203, '017012646', 'RIO MARTINDO GUMILAR', 'Laki-Laki', '3373032702920001', 'Islam', '089682554350', 2, 13, 13, 6, '1992-02-27', 'PERUM ARGAMAS BARAT III NO. 435 RT 001/ RW 013 DESA LEDOK, KEC. ARGOMULYO, KA. KOTA SALATIGA', '2017-12-27', 'Kontrak', 'rio.martindo92@gmail.com', 1, '017012646.jpeg', '$2y$10$mAOALxoDYzQitOl6.zDzn.yjz1mclckWxWkmEoCtkIC.qUGFd.sQ6', NULL, '2017-12-28 11:09:29', '2017-12-28 11:09:29'),
(2204, '018001647', 'DWI ERNAWATI', 'Perempuan', '3374104609950003', 'Islam', '085647847110', 2, 13, 13, 2, '1995-09-06', 'JL. TEGAL KANGKUNG XIII NO. 149, KEL KEDUNGMUNDU, KEC. TEMBALANG SEMARANG', '2018-01-02', 'Kontrak', NULL, 1, '018001647.jpg', '$2y$10$whVl7U/4UqSFCPStx4JPl.TfFkVB51OeaLz2Py8CVPefDnxlpwwpS', NULL, '2018-01-08 07:07:53', '2018-02-01 06:45:31'),
(2205, '018001648', 'AHMAD NOOR ROHMAN', 'Laki-Laki', '3318080311910022', 'Islam', '085216135990', 2, 13, 31, 7, '1991-11-03', 'JL. BUKIT TERATAI VII/348 RT 1, RW XIX, SENDANG MULYO', '2018-01-02', 'Kontrak', 'ahmad.hukumunnes@gmail.com', 1, '018001648.jpeg', '$2y$10$UD9FXK4QHeYCvdbqH5.ma.v4MMUtY/DjH9NEypBsAeEBR8BNlvpcS', NULL, '2018-01-08 07:13:36', '2018-01-08 07:13:36'),
(2206, '018001649', 'ARIES BUDI WIRAWAN', 'Laki-Laki', '3375010204870004', 'Islam', '082134775807', 2, 13, 31, 3, '1987-04-02', 'JL. LESTARI NO. 567 BINAGRIYA INDAH BLOK C PEKALONGAN', '2018-01-22', 'Kontrak', 'abw_1987@yahoo.co.id', 1, '018001649.jpg', '$2y$10$xp81WJChm/1D5fBoo8kQa..i3Gk4b.hsO8aiKS22DT0egjO57cQZi', NULL, '2018-02-01 05:59:43', '2018-02-01 05:59:43'),
(2207, '018001650', 'ADITYA HADIPUTRA', 'Laki-Laki', '3322192710890001', 'Islam', '081229170005', 2, 13, 31, 2, '1989-10-27', 'JL. ASRI RAYA NO. 39 RT 002/ RW 010, KEL. GEDANGANAK, KEC. UNGARAN TIMUR', '2018-01-29', 'Kontrak', 'adityahadi27@gmail.com', 1, '018001650.jpeg', '$2y$10$FPqBWfCudICITwue.loy9uhs1dbtQp4WWzcq8Qw/IVtd9qWdwwZvq', NULL, '2018-02-01 06:03:04', '2018-02-01 06:03:04'),
(2208, '018001651', 'NOVIA CANDRA MARETTA', 'Perempuan', '3318136303930005', 'Islam', '083838333373', 2, 13, 13, 3, '1993-03-23', 'DESA SEMIREJO RT 02/ RW 04, KEC. GEMBONG, KAB. PATI', '2018-01-29', 'Kontrak', 'noviacandramaretta@gmail.com', 1, '018001651.jpeg', '$2y$10$9q5C7IwEgU9fxJBe4qd19uu7UGgqwM/ZFHeJVOHMisi6V3F2ZLlx.', NULL, '2018-02-01 06:06:15', '2018-03-21 03:50:47'),
(2209, '018001652', 'RISZA ADITYARAHMAN', 'Laki-Laki', '3374061807910003', 'Islam', '081901813001', 2, 13, 13, 1, '1991-07-18', 'JL. GALAR VIII/2 RT 003/ RW 017 TLOGOSARI PEDURUNGAN', '2018-01-29', 'Kontrak', 'riszaadit@gmail.com', 1, '018001652.jpg', '$2y$10$uoFIo1JKcHen97bsDrDl6uJnORmVqBQLzmFfJvbf9NlAatFgs1nqW', NULL, '2018-02-01 06:09:20', '2018-02-01 06:09:20'),
(2210, '018001653', 'WIWIT IMAM CAHYONO', 'Laki-Laki', '3374022812730001', 'Islam', '081377545831', 2, 24, 28, 8, '1973-12-28', 'JL.KARANGGENENG INDAH NO. 6 RT 001/ RW 001 SUMUREJO GUNUNGPATI SEMARANG', '2018-02-01', 'Kontrak', 'cahyonoimam4@gmail.com', 1, '018001653.jpg', '$2y$10$Bjz.QclKw3iWeYy1c.5DT.enW1Iwo7YdXxJDl13bHEWsxjcZg7.UG', NULL, '2018-02-01 06:12:31', '2018-03-21 02:51:15'),
(2211, '018002654', 'DAESY CHRISTIANA DEWI', 'Perempuan', '3374026112730001', 'Katholik', '081914630048', 2, 26, 9, 3, '1973-12-21', 'JL. PASIR MAS I/117 RT 005/ RW 008 DESA PANGGUNG LOR SEMARANG UTARA', '2018-02-26', 'Kontrak', 'daesychristiana@gmail.com', 1, '018002654.jpg', '$2y$10$2nSWg/JuIUvnssK5LjvYL.snwVmh6/4Z2XRwne8ayVv.PuJUBBCZq', NULL, '2018-03-21 03:15:08', '2018-03-21 04:51:06'),
(2212, '018003655', 'EKO TRIYANTO BUDI UTOMO', 'Laki-Laki', '3315042005860003', 'Islam', '085642880762', 2, 13, 39, 8, '1986-05-20', 'PERUM KAUMAN REGENCY GIOK 5 NO. 39 RT 008, RW 009, MRANGGEN DEMAK', '2018-03-01', 'Kontrak', 'ekotriyantobudi@gmail.com', 1, '018003655.jpg', '$2y$10$TqhbkL5xMpFhtUA2GF6PN.xI73NmkOaGodAmqJ5itKsObZLt/SSwu', 'JRNCcnHcE7rTB0804iWFJV6L7MEimFdZ5SjnqI6u1O8mbmD0PZDwpIQtOyJJ', '2018-03-21 03:18:47', '2018-03-21 03:18:47'),
(2213, '018003656', 'NUR HIDAYATUN NIKMAH', 'Perempuan', '3318054703950001', 'Islam', '082248424325', 2, 13, 24, 4, '1995-03-07', 'DUKUH JATI LAWANG RT 008/ RW 002, KEL. PUCAKWANGI, KEC. PUCAKWANGI', '2018-03-05', 'Kontrak', 'nhidayatunnikmah@gmail.com', 1, '018003656.jpeg', '$2y$10$TSjJoOOLgL0ojEw6z67GYuQS/cjiHMBjLJASD6rhvrxLkFM6qwFei', NULL, '2018-03-21 03:23:24', '2018-03-21 03:23:24'),
(2214, '018003657', 'FITRA IRWANSYAH', 'Laki-Laki', '3324132104910001', 'Islam', '082138296324', 2, 13, 31, 5, '1991-04-21', 'PERUM PAKUWON ASRI RT 003/ RW 001, DESA KARANGTENGAH, KEC. KALIWUNGU, KAB. KENDAL', '2018-03-07', 'Kontrak', 'fitrairwansyah91@gmail.com', 1, '018003657.jpg', '$2y$10$IpsUJAQwB7LEld0Ezv2IpujNsjYaNe51axqRG9cxS9gjqyvVNrG2a', NULL, '2018-03-21 03:26:42', '2018-03-21 03:26:42'),
(2215, '018003658', 'EKO SETYO PRAHMONO', 'Laki-Laki', '3374052409890001', 'Islam', '082126604456', 2, 13, 26, 2, '1989-09-24', 'KP WIDURI II RT 00/ RW 005, DESA BANGETAYU KULON, KEC. GENUK', '2018-03-12', 'Kontrak', 'prahmono1989@gmail.com', 1, '018003658.jpeg', '$2y$10$mtWmmzH9fS9AQXKzhtZr1ulw7SdiGbRuxU1o.NhRC.4QZbGl7OuKC', NULL, '2018-03-21 03:30:33', '2018-03-21 03:30:33'),
(2216, '018003659', 'WIJAYANTO', 'Laki-Laki', '3374021807850001', 'Islam', '085642119152', 2, 13, 32, 7, '1985-07-18', 'SAMBIROTO VII RT 009/ RW 002, SAMBIROTO TEMBALANG SEMARANG', '2018-03-14', 'Kontrak', 'owijayanto@gmail.com', 1, '018003659.jpeg', '$2y$10$2C8BN6z32CW5A7Rkd9fH7O87ja3BFy88VV7oaGQctJu9m/DSWeHRq', NULL, '2018-03-21 03:34:28', '2018-03-21 03:34:28'),
(2217, '018003660', 'ARIANVIKA APRILIYANI', 'Perempuan', '3317106204910004', 'Islam', '085800485050', 2, 13, 21, 1, '1991-04-22', 'JL. SLAMET RIYADI NO. 43 UNGARAN RT 002/ RW 001 GENUK UNGARAN BARAT', '2018-03-16', 'Kontrak', 'arianvikaapriliyani@yahoo.com', 1, '018003660.jpeg', '$2y$10$vAVhILdyOOgqEb37I7rg4.nR7f6gXI.5NHLbmwh4dfsW1EFHiqGby', NULL, '2018-03-21 03:37:57', '2018-03-21 04:15:20'),
(2218, '018003661', 'DEDY PURWANTO', 'Laki-Laki', '3322181312810001', 'Islam', '085727727530', 2, 13, 28, 8, '1981-12-13', 'JL. BIMA IV/ 07 RT 007 RW 009 LEREP UNGARAN BARAT', '2018-03-21', 'Kontrak', 'dedypurwanto529@gmail.com', 1, '018003661.jpg', '$2y$10$O2w0xeGiZFTMuv1A/jSXouOtaOjoDhfK7GCKaY3jJX3H8Pk/1jWre', NULL, '2018-03-21 03:42:27', '2018-03-21 03:42:27'),
(2219, '018003662', 'WAHYU BAGUS WISNU WARDANA', 'Laki-Laki', '3322182104940001', 'Islam', '058007425502', 2, 13, 13, 3, '1994-04-21', 'CANDIREJO RT 003/ RW 005 CANDIREJO UNGARAN BARAT SEMARANG', '2018-03-21', 'Kontrak', 'user@gmail.com', 1, '018003662.jpg', '$2y$10$ZMp1STDasjno32m3ibS4W.vODMocMPZDeVpFhG4boJcnKlWTlERAy', 'dfTsr6wYtkEfIAWlzOYcbZjKu3wHr1rjI653AxC9D46E5yR9Cg5VEAmOWVjJ', '2018-03-21 03:45:06', '2018-03-21 08:09:41'),
(2220, '00001', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a@a.com', 1, 'default.jpg', '$2y$10$J2J3iwyxep4B6OkpYwdd2.VS3r9Bl6dFYjm2hqhHagEl9DrN84rve', 'b0h3Xs6jnmwrDD2uzZgpB2MGZuEhzVFS7H5lDjPIIxZ9masn84npWXXicJ2t', '2018-05-14 01:06:37', '2018-05-14 01:06:37');
INSERT INTO `users` (`id`, `nip`, `nama`, `kelamin`, `no_ktp`, `agama`, `no_hp`, `role`, `id_jabatan`, `id_bagian`, `id_cabang`, `tgl_lahir`, `alamat`, `tgl_masuk`, `status_karyawan`, `email`, `status_user`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2221, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eko@eko.com', 1, 'default.jpg', '$2y$10$.FaQZUr2bG3PMAcXE2qXOeix6Ara9zXPm4NHqK9dhHNPbjB05O0Oq', 'qecbHE0qUUihLHVK42qMJzLbDUJINDJePvFBxgfSGed3QkgFZVgsdmmW0NVQ', '2018-05-17 19:33:23', '2018-05-17 19:33:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_ac`),
  ADD KEY `nik` (`nik`),
  ADD KEY `FK_activity_fptk` (`id_fptk`),
  ADD KEY `FK_activity_jns_tes` (`id_seleksi`),
  ADD KEY `FK_activity_fptk_pelamar` (`id_pivot`);

--
-- Indexes for table `bagians`
--
ALTER TABLE `bagians`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `cabangs`
--
ALTER TABLE `cabangs`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `fptk`
--
ALTER TABLE `fptk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bagian` (`id_bagian`),
  ADD KEY `id_user` (`grade`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indexes for table `fptk_pelamar`
--
ALTER TABLE `fptk_pelamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_fptk_pelamar_pelamar` (`nik`),
  ADD KEY `FK_fptk_pelamar_fptk` (`idfptk`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jns_tes`
--
ALTER TABLE `jns_tes`
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
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_lowongan` (`id_lowongan`);

--
-- Indexes for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `upload_file`
--
ALTER TABLE `upload_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `no_ktp` (`no_ktp`),
  ADD KEY `id_cabang` (`id_cabang`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id_ac` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bagians`
--
ALTER TABLE `bagians`
  MODIFY `id_bagian` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `fptk`
--
ALTER TABLE `fptk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fptk_pelamar`
--
ALTER TABLE `fptk_pelamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id_jabatan` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `jns_tes`
--
ALTER TABLE `jns_tes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload_file`
--
ALTER TABLE `upload_file`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2222;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_3` FOREIGN KEY (`nik`) REFERENCES `pelamar` (`nik`),
  ADD CONSTRAINT `FK_activity_fptk` FOREIGN KEY (`id_fptk`) REFERENCES `fptk` (`id`),
  ADD CONSTRAINT `FK_activity_fptk_pelamar` FOREIGN KEY (`id_pivot`) REFERENCES `fptk_pelamar` (`id`),
  ADD CONSTRAINT `FK_activity_jns_tes` FOREIGN KEY (`id_seleksi`) REFERENCES `jns_tes` (`id`);

--
-- Constraints for table `fptk`
--
ALTER TABLE `fptk`
  ADD CONSTRAINT `fptk_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagians` (`id_bagian`),
  ADD CONSTRAINT `fptk_ibfk_3` FOREIGN KEY (`id_cabang`) REFERENCES `cabangs` (`id_cabang`);

--
-- Constraints for table `fptk_pelamar`
--
ALTER TABLE `fptk_pelamar`
  ADD CONSTRAINT `FK_fptk_pelamar_fptk` FOREIGN KEY (`idfptk`) REFERENCES `fptk` (`id`),
  ADD CONSTRAINT `FK_fptk_pelamar_pelamar` FOREIGN KEY (`nik`) REFERENCES `pelamar` (`nik`);

--
-- Constraints for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `pelamar_ibfk_1` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id`);

--
-- Constraints for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD CONSTRAINT `pengalaman_kerja_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pelamar` (`nik`);

--
-- Constraints for table `upload_file`
--
ALTER TABLE `upload_file`
  ADD CONSTRAINT `upload_file_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pelamar` (`nik`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatans` (`id_jabatan`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `bagians` (`id_bagian`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id_cabang`) REFERENCES `cabangs` (`id_cabang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
