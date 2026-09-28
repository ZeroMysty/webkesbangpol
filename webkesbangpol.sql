-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2026 at 09:14 AM
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
-- Database: `webkesbangpol`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'struktur_connector_data', '{\"waypoints\":{\"137-202\":[{\"x\":144,\"y\":148}]},\"colors\":{\"137-198\":\"red\",\"137-202\":\"red\"},\"styles\":{\"137-198\":{\"type\":\"orthogonal\",\"dash\":\"solid\"},\"137-202\":{\"type\":\"orthogonal\",\"dash\":\"solid\"},\"198-199\":{\"type\":\"orthogonal\",\"dash\":\"solid\"},\"198-200\":{\"type\":\"orthogonal\",\"dash\":\"solid\"},\"198-201\":{\"type\":\"orthogonal\",\"dash\":\"solid\"}},\"ports\":{\"137-198\":{\"fromPort\":\"b\",\"toPort\":\"t\"},\"137-202\":{\"fromPort\":\"b\",\"toPort\":\"t\"},\"198-199\":{\"fromPort\":\"b\",\"toPort\":\"t\"},\"198-200\":{\"fromPort\":\"b\",\"toPort\":\"t\"},\"198-201\":{\"fromPort\":\"b\",\"toPort\":\"t\"}}}', '2026-07-26 19:30:36', '2026-09-16 01:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `gambar_upload` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `judul`, `caption`, `gambar_upload`, `created_at`, `updated_at`) VALUES
(1, 'Kemah Pancasila', 'Hade Sadudulur Akur Salelembur', 'kemah-pancasila_20250523.jpg', '2025-05-23 09:28:59', '2025-05-23 09:28:59'),
(2, 'Pawai Kendaraan Hari Jadi Kota Bandung Yang Ke-214', 'Bakesbangpol Kota Bandung Menjuarai Pawai Kendaraan Rangkaian Hari Jadi Kota Bandung', 'pawai-kendaraan-hari-jadi-kota-bandung-yang-ke-214_20250523.jpg', '2025-05-23 09:34:56', '2025-05-29 20:49:23'),
(3, 'HUT RI KE 79', 'Perayaan HUT RI Dengan Tema 3 Menit Dari Bandung Untuk Indonesia', 'hut-ri-ke-79_20250523.jpg', '2025-05-23 09:36:12', '2025-05-23 09:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `bidangs`
--

CREATE TABLE `bidangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_bidang` varchar(255) NOT NULL,
  `nama_bidang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidangs`
--

INSERT INTO `bidangs` (`id`, `no_bidang`, `nama_bidang`, `created_at`, `updated_at`) VALUES
(1, '1', 'Bidang Ideologi, Wawasan Kebangsaan dan Karakter Bangsa', '2025-04-14 01:45:53', '2025-04-14 01:45:53'),
(2, '2', 'Bidang Politik Dalam Negeri', '2025-04-14 01:46:17', '2025-04-14 01:46:17'),
(3, '3', 'Bidang Ketahanan Ekonomi, Sosial, Budaya, Agama, dan Organisasi Kemasyarakatan', '2025-04-14 01:46:48', '2025-04-14 01:46:48'),
(4, '4', 'Bidang Kewaspadaan Nasional dan Penanganan Konflik', '2025-04-14 01:47:09', '2025-04-14 01:47:09');

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
-- Table structure for table `dokumen_ormas`
--

CREATE TABLE `dokumen_ormas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ormas_id` bigint(20) UNSIGNED NOT NULL,
  `akta_notaris` varchar(255) DEFAULT NULL,
  `ahu_skt` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen_ormas`
--

INSERT INTO `dokumen_ormas` (`id`, `ormas_id`, `akta_notaris`, `ahu_skt`, `npwp`, `created_at`, `updated_at`) VALUES
(506, 730, 'Nomor: 16, Tanggal: 12 Agustus 2022', 'Nomor: 0017235.AH.01.04.TAHUN, Tanggal: 16 Agustus 2022', '61.332.135.5-422.000', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(507, 731, 'Nomor: 02, Tanggal: 1 Februari 2023', 'Nomor: 0001857.AH.01.04.TAHUN2023, Tanggal: 3 Februari 2023', '50.907.306.0-429.000', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(508, 732, 'Nomor: 06, Tanggal: 27 Desember 2022', 'Nomor: 0002313.AH.01.08.TAHUN, Tanggal: 29 Desember 2022', '43.941.022.6-429.001', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(509, 733, 'Nomor: 16, Tanggal: 19 September 2019', 'Nomor: 0010185.AH.01.07.TAHUN, Tanggal: 26 September 2019', '82.983.087.6-422.001', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(510, 734, 'Nomor: 21, Tanggal: 21 November 2023', 'Nomor: 0000159.AH.01.08.TAHUN, Tanggal: 05 Februari 2024', '40.788.489.9-428.000', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(511, 735, 'Nomor: 33, Tanggal: 31 Agustus 2021', 'Nomor: 0001249.AH.01.08.TAHUN, Tanggal: 09 September 2021', '02.435.609.9-429.001', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(512, 736, 'Nomor: 01, Tanggal: 30 Juli 2020', 'Nomor: 0000704.AH.01.08.TAHUN, Tanggal: 4 Agustus 2020', '2.655.517.7-002.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(513, 737, 'Nomor: 73, Tanggal: 29 Agustus 2022', 'Nomor: 0010038.AH.01.07.TAHUN, Tanggal: 3 November 2023', '61.213.03.9-423.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(514, 738, 'Nomor: 14, Tanggal: 28 Februari 2023', 'Nomor: 0000507.AH.01.08.TAHUN, Tanggal: 4 April 2023', '02.365.129.2-423.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(515, 739, 'Nomor: 15, Tanggal: 31 Januari 2024', 'Nomor: 0000190.AH.01.08.TAHUN, Tanggal: 13 Februari 2024', '12.736.755.5-429.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(516, 740, 'Nomor: 2, Tanggal: 27 November 2018', 'Nomor: 0001586.AH.01.08.TAHUN, Tanggal: 23 Agustus 2022', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(517, 741, 'Nomor: 01, Tanggal: 18 Oktober 2022', 'Nomor: 0002071.AH.01.08.TAHUN, Tanggal: 15 November 2022', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(518, 742, 'Nomor: 04, Tanggal: 13 Maret 2018', 'Nomor: 0000216.AH.01.08.TAHUN, Tanggal: 16 Maret 2018', '81.388.779.1-447.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(519, 743, 'Nomor: 05, Tanggal: 18 Oktober 2022', 'Nomor: 0021687.AH.01.04.TAHUN, Tanggal: 18 Oktober 2022', '61.558.419.0-42.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(520, 744, 'Nomor: 17, Tanggal: 08 Desember 2023', 'Nomor: 0020773.AH.01.04.TAHUN, Tanggal: 12 Desember 2023', '13.815.865.4-429.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(521, 745, 'Nomor: 03, Tanggal: 15 April 2021', 'Nomor: 0000640.AH.01.08.TAHUN, Tanggal: 19 April 2021', '05.440.119.5-422.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(522, 746, 'Nomor: 12, Tanggal: 14 Januari 2019', 'Nomor: 0001149.AH.01.07.TAHUN, Tanggal: 12 Februari 2019', '91.435.279.4-421.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(523, 747, 'Nomor: 848, Tanggal: 23 Oktober 2023', 'Nomor: 0009836.AH.07.TAHUN, Tanggal: 27 Oktober 2023', '20.583.786.7-445.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(524, 748, 'Nomor: 05, Tanggal: 04 April 2024', 'Nomor: 0003719.AH.01.07.TAHUN, Tanggal: 24 April 2024', '99.827.114.2-423.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(525, 749, 'Nomor: 13, Tanggal: 16 Desember 2019', 'Nomor: 0012306.AH.01.07.TAHUN, Tanggal: 31 Desember 2019', '94.910.569.6-423.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(526, 750, 'Nomor: 19, Tanggal: 29 Juli 2019', 'Nomor: 0000535.AH.01.08.TAHUN, Tanggal: 29 April 2024', '92.435.038.2-428.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(527, 751, 'Nomor: 46, Tanggal: 21 November 2023', 'Nomor: 0019701.AH.01.04.TAHUN, Tanggal: 24 November 2023', '99.462.979.8-428.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(528, 752, 'Nomor: 01, Tanggal: 09 April 2024', 'Nomor: 0005831.AH.01.04.TAHUN, Tanggal: 18 Aapril 2024', '20.172.581.9-428.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(529, 753, 'Nomor: 03, Tanggal: 15 Oktober 2019', 'Nomor: 0015302.AH.01.04.TAHUN, Tanggal: 18 Oktober 2019', '93.675.943.0-409.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(530, 754, 'Nomor: 06, Tanggal: 10 Januari 2019', 'Nomor: 0000543.AH.01.04.TAHUN, Tanggal: 14 Januari 2019', '90.214.090.4-428.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(531, 755, 'Nomor: 01, Tanggal: 03 Januari 2024', 'Nomor: 0000014.AH.01.07.TAHUN, Tanggal: 03 Januari 2024', '20.946.700.0-428.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(532, 756, 'Nomor: 78, Tanggal: 21 Agustus 2018', 'Nomor: 0010614.AH.01.07.TAHUN, Tanggal: 29 Agustus 2018', '41.034.878.3-429.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(533, 757, 'Nomor: 3, Tanggal: 16 Mei 2024', 'Nomor: 0007447.AH.01.04.TAHUN, Tanggal: 17 Mei 2024', '05.486.057.2-429.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(534, 758, 'Nomor: 4, Tanggal: 12 September 2023', 'Nomor: 0014821.AH.01.04.TAHUN, Tanggal: 12 September 2023', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(535, 759, 'Nomor: 15, Tanggal: 18 Juli 2024', 'Nomor: 0011044.AH.01.04.TAHUN, Tanggal: 18 Juli 2024', '21.366.930.9-422.000', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(536, 760, 'Nomor: 1, Tanggal: 02 Desember 2014', 'Nomor: 00789.60.10.2014, Tanggal: 02 Desember 2014', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(537, 761, 'Nomor: 8, Tanggal: 21 Desember 2023', 'Nomor: 0011537.AH.01.07.TAHUN', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(538, 762, 'Nomor: 7, Tanggal: 12 Januari 2024', 'Nomor: 0001026.AH.01.07.TAHUN, Tanggal: 31 Januari 2024', '04.986.168.5-422.000', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(539, 763, 'Nomor: 16, Tanggal: 04 September 2024', 'Nomor: 0014605.H.01.04.TAHUN, Tanggal: 11 September 2024', '27.06.032.8-429.000', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(540, 764, 'Nomor: 07, Tanggal: 06 Oktober 2016', 'Nomor: 0039107.AH.01.04.TAHUN, Tanggal: 06 Oktober 2016', '66.612.036.5-429.000', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(541, 765, 'Nomor: 02, Tanggal: 04 Maret 2021', 'Nomor: 0007108.AH.01.04.TAHUN, Tanggal: 09 Maret 2021', '12.883.262.3-422.000', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(542, 766, 'Nomor: 28, Tanggal: 29 Juni 2024', 'Nomor: 0007299.AH.01.07.TAHUN, Tanggal: 27 Juli 2024', '13.828.192.8-422.000', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(543, 767, 'Nomor: 03, Tanggal: 11 November 2024', 'Nomor: 0001732.AH.01.08.TAHUN, Tanggal: 13 November 2024', '61.960.468.9-429.000', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(544, 768, 'Nomor: 05, Tanggal: 23 Maret 2022', 'Nomor: 0000548.AH.01.08.TAHUN, Tanggal: 24 Maret 2022', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(545, 769, 'Nomor: 25, Tanggal: 27 Juni 2024', 'Nomor: 0007996.AH.01.07.TAHUN, Tanggal: 19 Agustus 2024', '27.105.938.8-429.001', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(546, 770, 'Nomor: 8, Tanggal: 31 Agustus 2021', 'Nomor: 0001209.AH.01.08.TAHUN, Tanggal: 01 September 2021', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(547, 771, 'Nomor: 05, Tanggal: 15 Mei 2015', 'Nomor: AHU-0069623.AH.01.07, Tanggal: 04 Agustus 2016', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(548, 772, 'Nomor: 06, Tanggal: 25 Maret 2002', 'Nomor: AHU-0071931.AH.01.07, Tanggal: 25 Agustus 2016', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(549, 773, 'Nomor: 03, Tanggal: 05 Juli 2011', 'Nomor: AHU-0078059.AH.01.07, Tanggal: 11 November 2016', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(550, 774, NULL, 'Nomor: AHU-161.AH.01.07, Tanggal: 11 Oktober 2011', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(551, 775, 'Nomor: 02, Tanggal: 30 Nopember 2015', 'Nomor: AHU-0029175.AH.01.04, Tanggal: 04 Desember 2015', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(552, 776, 'Nomor: 02, Tanggal: 03 Juli 2017', 'Nomor: AHU-0010317.AH.0107, Tanggal: 11 Juli 2017', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(553, 777, 'Nomor: 18, Tanggal: 18 Januari 2016', 'Nomor: AHU-0060294.AH.01.07, Tanggal: 31 Mei 2016', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(554, 778, 'Nomor: 08, Tanggal: 13 Juli 2012', 'Nomor: AHU-0011907.AH.01.07, Tanggal: 01 Februari 2016', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(555, 779, 'Nomor: 07, Tanggal: 25 Agustus 2016', 'Nomor: AHU-0072151.AH.01.07, Tanggal: 29 Agustus 2016', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(556, 780, 'Nomor: 10, Tanggal: 30 Januari 2015', 'Nomor: AHU-00692.60.10., Tanggal: 11 November 2014', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(557, 781, 'Nomor: 01, Tanggal: 08 Agustus 2017', 'Nomor: AHU-0000427.AH.01.08, Tanggal: 09 Agustus 2017', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(558, 782, 'Nomor: 02, Tanggal: 01 September 2016', 'Nomor: AHU., Tanggal: 22 September 2016', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(559, 783, 'Nomor: 26, Tanggal: 28 September 2017', 'Nomor: SKT, Tanggal: 25 Januari 2018', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(560, 784, 'Nomor: 07, Tanggal: 06 November 2015', 'Nomor: SKT, Tanggal: 25 Januari 2018', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(561, 785, 'Nomor: 17, Tanggal: 16 November 2017', 'Nomor: ., Tanggal: 12 Februari 2018', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(562, 786, 'Nomor: 02, Tanggal: 26 Juli 2015', 'Nomor: 117-00-00/077/II/2018, Tanggal: 12 Februari 2018', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(563, 787, 'Nomor: 42, Tanggal: 12 November 2015', 'Nomor: ., Tanggal: 13 Januari 2016', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(564, 788, 'Nomor: 04, Tanggal: 07 Maret 2016', 'Nomor: AHU-0028667.AH.01.07, Tanggal: 10 Maret 2016', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(565, 789, 'Nomor: 16, Tanggal: 09 September 2013', 'Nomor: AHU-0023052.AH.01.07, Tanggal: 29 Februari 2016', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(566, 790, 'Nomor: 37, Tanggal: 30 Juni 2016', 'Nomor: AHU-0000385, Tanggal: 10 Juli 2016', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(567, 791, 'Nomor: 1, Tanggal: 03 Februari 2022', 'Nomor: 0000394.AH.01.08.Tahun, Tanggal: 01 Maret 2022', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(568, 792, 'Nomor: 02, Tanggal: 04 Januari 2018', 'Nomor: 1117-00-00/167/IV/2018, Tanggal: 04 April 2018', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(569, 793, 'Nomor: 01, Tanggal: 14 Desember 2017', 'Nomor: AHU, Tanggal: 15 Desember 2017', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(570, 794, 'Nomor: 01, Tanggal: 01 Juli 2013', 'Nomor: AHU-0043031.AH.01.07, Tanggal: 07 April 2016', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(571, 795, 'Nomor: 01, Tanggal: 01 Juli 2013', 'Nomor: AHU-0043031.AH.01.07, Tanggal: 07 April 2016', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(572, 796, 'Nomor: 64, Tanggal: 11 September 2017', 'Nomor: AHU.0000509.AH.01.08, Tanggal: 23 September 2017', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(573, 797, 'Nomor: 20, Tanggal: 10 Maret 2018', 'Nomor: AHU-0024160.AH.01.07, Tanggal: 01 Maret 2016', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(574, 798, 'Nomor: 1, Tanggal: 04 Januari 2017', 'Nomor: AHU-0000413.AH.01.07, Tanggal: 27 Agustus 2018', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(575, 799, 'Nomor: 13, Tanggal: 16 Mei 2017', 'Nomor: AHU-0008170.AH.01.07, Tanggal: 26 Juni 2018', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(576, 800, 'Nomor: 22, Tanggal: 23 Mei 2013', 'Nomor: AHU-000540.AH.01.08, Tanggal: 26 Oktober 2016', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(577, 801, 'Nomor: 31, Tanggal: 28 Februari 2018', 'Nomor: AHU-0000237.AH.01.08, Tanggal: 21 Maret 2018', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(578, 802, 'Nomor: 4, Tanggal: 4 Februari 2011', 'Nomor: 1108-00-00/255/V/2018, Tanggal: 11 Mei 2018', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(579, 803, 'Nomor: 5, Tanggal: 13 April 2018', 'Nomor: AHU-0005211.AH.01.07, Tanggal: 17 April 2018', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(580, 804, 'Nomor: 9, Tanggal: 16 Oktober 2018', 'Nomor: AHU-0013308.AH.01.07, Tanggal: 29 Oktober 2018', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(581, 805, 'Nomor: 35, Tanggal: 26 September 2018', 'Nomor: AHU-0013168.AH.01.07, Tanggal: 24 Oktober 2018', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(582, 806, 'Nomor: 04, Tanggal: 10 April 2013', 'Nomor: 70, Tanggal: 8 September 2015', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(583, 807, 'Nomor: 40, Tanggal: 30 Desember 2016', 'Nomor: AHU-004375.AH.01.07, Tanggal: 09 Januari 2017', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(584, 808, 'Nomor: 05, Tanggal: 4 Maret 2012', 'Nomor: 1117-00-00/762/XII/2018, Tanggal: 24 Januari 2019', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(585, 809, 'Nomor: 1953, Tanggal: 26 oktober 2016', 'Nomor: AHU-0077402.AH.01.07, Tanggal: 2 November 2016', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(586, 810, 'Nomor: 725, Tanggal: 14 Februari 2017', 'Nomor: AHU-0003876.AH.01.07, Tanggal: 16 April 2019', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(587, 811, 'Nomor: 18, Tanggal: 28 Maret 2018', 'Nomor: AHU-0001331.AH.01.07, Tanggal: 14 Februari 2019', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(588, 812, 'Nomor: 22, Tanggal: 20 Maret 2019', 'Nomor: AHU-0003562.AH.01.07, Tanggal: 27 Maret 2019', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(589, 813, 'Nomor: 01, Tanggal: 14 Desember 2017', 'Nomor: AHU-0017981.AH.01.07, Tanggal: 19 Desember 2017', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(590, 814, 'Nomor: 73, Tanggal: 09 Oktober 2018', 'Nomor: AHU-0012782.AH.01.07, Tanggal: 16 Oktober 2018', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(591, 815, 'Nomor: 02, Tanggal: 10 Desember 2014', 'Nomor: AHU-0064368.AH.01.07, Tanggal: 17 Juni 2016', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(592, 816, 'Nomor: 2, Tanggal: 5 April 2000', 'Nomor: AHU-0010602.AH.01.07, Tanggal: 29 Agustus 2018', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(593, 817, 'Nomor: 61, Tanggal: 9 Desember 2014', 'Nomor: AHU-000201.AH.01.07, Tanggal: 29 Juli 2019', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(594, 818, 'Nomor: 18, Tanggal: 27 Agustus 2018', 'Nomor: AHU-0015055.AH.01.07, Tanggal: 8 September 2018', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(595, 819, 'Nomor: 30, Tanggal: 14 April 2011', 'Nomor: AHU-70.AH.01.08, Tanggal: 08 September 2015', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(596, 820, 'Nomor: 4, Tanggal: 10 April 2013', 'Nomor: AHU-70.AH.01.08, Tanggal: 8 September 2015', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(597, 821, 'Nomor: 04, Tanggal: 19 April 2007', 'Nomor: 450.7/1003/POLPUM, Tanggal: 10 Maret 2016', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(598, 822, 'Nomor: 100, Tanggal: 27 Februari 2015', 'Nomor: AHU-0000534.AH.01.08, Tanggal: 19 Juli 2018', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(599, 823, 'Nomor: 23, Tanggal: 26 Oktober 2018', 'Nomor: AHU-0013440.AH.01.07, Tanggal: 15 Oktober 2019', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(600, 824, 'Nomor: C2-HT.01.03.A.165, Tanggal: 29 Januari 2004', 'Nomor: C2-HT.01.03.A.165, Tanggal: 29 Januari 2004', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(601, 825, 'Nomor: 8, Tanggal: 20 September 2019', 'Nomor: AHU-0010538.AH.01.07, Tanggal: 28 Oktober 2019', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(602, 826, 'Nomor: 02, Tanggal: 29 Oktober 2013', 'Nomor: AHU-0000529.AH.01.08, Tanggal: 17 Juli 2018', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(603, 827, 'Nomor: 176, Tanggal: 5 Januari 2018', 'Nomor: AHU-000212.AH.01.08, Tanggal: 15 maret 2018', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(604, 828, 'Nomor: 8, Tanggal: 30 Agustus 2004', 'Nomor: AHU-0088760.10.2014, Tanggal: 24 Desember 2014', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(605, 829, 'Nomor: 13, Tanggal: 27 September 2007', 'Nomor: AHU-000032.Ah.01.08, Tanggal: 12 Januari 2018', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(606, 830, 'Nomor: 48, Tanggal: 20 Oktober 2016', 'Nomor: AHU-0076452.AH.01.07, Tanggal: 21 Oktober 2016', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(607, 831, 'Nomor: 49, Tanggal: 10 Juni 2016', 'Nomor: AHU-0052812.AH.01.07, Tanggal: 10 Juni 2016', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(608, 832, 'Nomor: 3, Tanggal: 28 Januari 2016', 'Nomor: AHU-0000197.Ah.01.08, Tanggal: 23 maret 2016', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(609, 833, 'Nomor: 39, Tanggal: 30 Januari 2017', 'Nomor: AHU-0004211.AH.01.07, Tanggal: 9 Maret 2017', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(610, 834, 'Nomor: 26, Tanggal: 23 Mei 2015', 'Nomor: AHU-0000389.AH.01.08, Tanggal: 2 November 2017', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(611, 835, 'Nomor: 26, Tanggal: 25 Februari 2020', 'Nomor: AHU-0011843.AH.01.07, Tanggal: 5 Maret 2020', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(612, 836, 'Nomor: 01, Tanggal: 05 Mei 2020', 'Nomor: ., Tanggal: 20 Mei 2020', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(613, 837, 'Nomor: 07, Tanggal: 27 September 2017', 'Nomor: AHU-0014319.AH.01.07, Tanggal: 9 Juli 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(614, 838, 'Nomor: 04, Tanggal: 29 November 2018', 'Nomor: AHU-0014956.AH.01.07, Tanggal: 9 Juli 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(615, 839, 'Nomor: 03, Tanggal: 25 Januari 2017', 'Nomor: AHU-0002324.AH.01.07, Tanggal: 9 Juli 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(616, 840, 'Nomor: 104, Tanggal: 11 April 2018', 'Nomor: AHU-0002324.AH.01.07, Tanggal: 9 Juli 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(617, 841, 'Nomor: 01, Tanggal: 01 September 2018', 'Nomor: AHU-0011052.AH.01.07, Tanggal: 28 Agustus 2018', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(618, 842, 'Nomor: 207, Tanggal: 30 oktober 2015', 'Nomor: AHU-0000002.AH.01.08, Tanggal: 28 Agustus 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(619, 843, 'Nomor: 37, Tanggal: 10 Oktober 2015', 'Nomor: AHU-0014026.AH.01.07, Tanggal: 28 Agustus 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(620, 844, 'Nomor: 02, Tanggal: 28 Februari 2020', 'Nomor: AHU-0002495.AH.01.07, Tanggal: 28 Agustus 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(621, 845, 'Nomor: 02, Tanggal: 08 November 2018', 'Nomor: AHU-0013686.AH.01.07, Tanggal: 6 November 2018', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(622, 846, 'Nomor: 257, Tanggal: 06 Februari 2020', 'Nomor: ., Tanggal: 2 April 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(623, 847, 'Nomor: 03, Tanggal: 24 Juni 2020', 'Nomor: ., Tanggal: 03 Agustus 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(624, 848, 'Nomor: 17, Tanggal: 21 Maret 2018', 'Nomor: ., Tanggal: 20 Januari 2016', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(625, 849, 'Nomor: 48, Tanggal: 27 Maret 2020', 'Nomor: ., Tanggal: 30 April 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(626, 850, 'Nomor: 04, Tanggal: 25 Agustus 2010', 'Nomor: 0000252.AH.01.08., Tanggal: 20 April 2016', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(627, 851, 'Nomor: 15, Tanggal: 13 Agustus 2019', 'Nomor: ., Tanggal: 30 Agustus 2019', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(628, 852, 'Nomor: 2, Tanggal: 07 November 2019', 'Nomor: ., Tanggal: 28 November 2019', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(629, 853, 'Nomor: 21, Tanggal: 24 Nopember 2020', 'Nomor: 1117-00-00/268/XII/2020, Tanggal: 21 Desember 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(630, 854, 'Nomor: 1, Tanggal: 1 September 2020', 'Nomor: ., Tanggal: 22 September 2020', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(631, 855, 'Nomor: 16, Tanggal: 28 Januari 2019', 'Nomor: ., Tanggal: 28 April 2016', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(632, 856, 'Nomor: 04, Tanggal: 25 Agustus 2010', 'Nomor: AHU-, Tanggal: 20 April 2016', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(633, 857, 'Nomor: 02, Tanggal: 08 Oktober 2019', 'Tanggal: 07 Tahun 2019', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(634, 858, 'Nomor: 05, Tanggal: 07 Nopember 2016', 'Nomor: vember, Tanggal: 08 Tahun 2016', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(635, 859, 'Nomor: 47, Tanggal: 22 Maret 2016', 'Tanggal: 07 Tahun 2016', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(636, 860, 'Nomor: 04, Tanggal: 05 Oktober 2013', 'Tanggal: 07 Tahun 2018', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(637, 861, 'Nomor: 12, Tanggal: 22 September 2020', 'Nomor: mor, Tanggal: 07 Tahun 2020', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(638, 862, 'Nomor: 10, Tanggal: 10 Juli 2019', 'Nomor: 0007900.AH.01.07, Tanggal: 07 Tahun 2019', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(639, 863, 'Nomor: 28, Tanggal: 05 September 2019', 'Nomor: 0009508.AH.01.07, Tanggal: 07 Tahun 2019', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(640, 864, 'Nomor: 04, Tanggal: 09 Oktober 2018', 'Nomor: 0012659.AH.01.07, Tanggal: 07 Tahun 2015', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(641, 865, 'Nomor: 01, Tanggal: 11 Juni 2019', 'Nomor: 0002765.AH.01.07.Tahun, Tanggal: 02 Maret 2021', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(642, 866, 'Nomor: 03, Tanggal: 15 September 2020', 'Nomor: vember, Tanggal: 12 November 2020', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(643, 867, 'Nomor: 01, Tanggal: 05 Januari 2021', 'Tanggal: 18 Januari 2021', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(644, 868, 'Nomor: 06, Tanggal: 28 Nopember 2017', 'Tanggal: 15 Desember 2017', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(645, 869, 'Nomor: 21, Tanggal: 06 Desember 2016', 'Tanggal: 23 Januari 2019', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(646, 870, 'Nomor: 10, Tanggal: 11 November 2016', 'Nomor: 0078430.AH.01.07, Tanggal: 07 Tahun 2016', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(647, 871, 'Nomor: 22, Tanggal: 23 Maret 2021', 'Nomor: 0006152.A.H.01.07, Tanggal: 07 Tahun 2021', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(648, 872, 'Nomor: 11, Tanggal: 22 Oktober 2020', 'Nomor: 0009954.AH.01.07, Tanggal: 07 Tahun 2020', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(649, 873, 'Nomor: 15, Tanggal: 05 Maret 2021', 'Nomor: 0003670.AH.01.07., Tanggal: 22 Maret 2021', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(650, 874, 'Nomor: 438, Tanggal: 21 Mei 2018', 'Nomor: 0007044.AH.01.07, Tanggal: 07 tahun 2018', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(651, 875, 'Nomor: 17, Tanggal: 27 Mei 2020', 'Nomor: 0009954.AH.01.07, Tanggal: 07 Tahun 2020', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(652, 876, 'Nomor: 49, Tanggal: 29 Agustus 2019', 'Nomor: 0000913.A.H.01.08, Tanggal: 08 tahun 2019', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(653, 877, 'Nomor: 02, Tanggal: 25 Januari 2017', 'Nomor: 0000134.A.H.01.08, Tanggal: 08 Tahun 2017', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(654, 878, 'Nomor: 08, Tanggal: 17 Mei 2021', 'Nomor: 0007681.AH.01.07.TAHUN, Tanggal: 22 Juni 2021', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(655, 879, 'Nomor: 07, Tanggal: 28 Mei 2021', 'Nomor: 0008831.AH.01.07.tahun, Tanggal: 23 Juli 2021', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(656, 880, 'Nomor: 01, Tanggal: 01 Desember 2020', 'Nomor: 0012225.AH.01.07.TAHUN, Tanggal: 18 Desember 2020', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(657, 881, 'Nomor: 38, Tanggal: 29 November 2019', 'Nomor: 001026.AH.01.07.Tahun, Tanggal: 04 Februari 2020', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(658, 882, 'Nomor: 9, Tanggal: 13 Agustus 2021', 'Nomor: 0010518-AH.01.07.Tahun, Tanggal: 06 September 2021', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(659, 883, 'Nomor: 01, Tanggal: 19 Oktober 2017', 'Nomor: 0015822.AH.01.07.Tahun, Tanggal: 2 November 2017', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(660, 884, 'Nomor: 03, Tanggal: 20 Mei 2011', 'Nomor: 1000-00-00/0112/IV/2021, Tanggal: 21 April 2021', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(661, 885, 'Nomor: 03, Tanggal: 9 September 2019', 'Nomor: 0000808.AH.01.08.Tahun, Tanggal: 09 September 2019', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(662, 886, 'Nomor: 06, Tanggal: 20 Agustus 2021', 'Nomor: 0012432.AH.01.07.Tahun, Tanggal: 26 Oktober 2021', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(663, 887, 'Nomor: 03, Tanggal: 16 November 2015', 'Nomor: 0017904.AH.01.07.Tahun, Tanggal: 19 November 2015', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(664, 888, 'Nomor: 11, Tanggal: 27 Mei 2019', 'Nomor: 0000582.AH.01.08.Tahun, Tanggal: 10 Juli 2019', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(665, 889, 'Nomor: 05, Tanggal: 09 November 2021', 'Tanggal: 03 Desember 2021', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(666, 890, 'Nomor: 04, Tanggal: 05 Februari 2020', 'Nomor: 0002557.AH.01.07, Tanggal: 07 Tahun 2020', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(667, 891, 'Nomor: 120, Tanggal: 27 Nopember 2018', 'Nomor: vember, Tanggal: 07 Tahun 2018', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(668, 892, 'Nomor: 08, Tanggal: 15 Juli 2021', 'Tanggal: 07 Tahun 2021', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(669, 893, 'Nomor: 06, Tanggal: 15 Maret 2021', 'Tanggal: 07 Tahun 2021', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(670, 894, 'Nomor: 02, Tanggal: 10 November 2021', 'Nomor: vember, Tanggal: 08 Tahun 2021', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(671, 895, 'Nomor: 17, Tanggal: 16 Oktober 2015', 'Nomor: 0009392.AH.01.07.Tahun, Tanggal: 16 Oktober 2015', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(672, 896, 'Nomor: 10, Tanggal: 28 Februari 2014', 'Nomor: 0032231.AH.01.07.Tahun, Tanggal: 16 Maret 2016', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(673, 897, 'Nomor: 05, Tanggal: 05 Oktober 2018', 'Nomor: 01.00-00/700/XII/2018, Tanggal: 10 Desember 2018', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(674, 898, 'Nomor: 32, Tanggal: 30 September 2020', 'Nomor: 0011285.AH.01.07, Tanggal: 07 Tahun 2020', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(675, 899, 'Nomor: 05, Tanggal: 16 Februari 2021', 'Nomor: 0003318.AH.01.07.Tahun, Tanggal: 16 Maret 2021', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(676, 900, 'Nomor: 16, Tanggal: 24 Maret 2016', 'Nomor: 0049906.AH.01.07.Tahun, Tanggal: 26 April 2016', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(677, 901, 'Nomor: 08, Tanggal: 30 Nopember 2017', 'Nomor: 0000901.AH.01.08.Tahun, Tanggal: 22 November 2018', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(678, 902, 'Nomor: 15, Tanggal: 18 Mei 2016', 'Nomor: 0058098.AH.01.07.Tahun, Tanggal: 23 Mei 2016', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(679, 903, 'Nomor: 01, Tanggal: 08 September 2021', 'Nomor: 0012181.AH.01.07.Tahun, Tanggal: 18 Oktober 2021', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(680, 904, 'Nomor: 03, Tanggal: 02 Maret 2020', 'Nomor: 0002820.AH.01.07.Tahun, Tanggal: 30 Maret 2020', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(681, 905, 'Nomor: 2, Tanggal: 02 Oktober 2019', 'Nomor: 0000933.AH.01.08.Tahun, Tanggal: 16 Oktober 2019', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(682, 906, 'Nomor: 10, Tanggal: 16 Januari 2020', 'Nomor: 0000770.AH.01.07.Tahun, Tanggal: 29 Januari 2020', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(683, 907, 'Nomor: 07, Tanggal: 21 Juli 2021', 'Nomor: 0009308.AH.01.07.Tahun, Tanggal: 05 Agustus 2021', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(684, 908, 'Nomor: 03, Tanggal: 18 Oktober 2021', 'Nomor: 0000512.AH.01.07.Tahun, Tanggal: 22 Januari 2021', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(685, 909, 'Nomor: 51, Tanggal: 28 Februari 2018', 'Nomor: 0000185.AH.01.08.Tahun, Tanggal: 06 Maret 2018', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(686, 910, 'Nomor: 37, Tanggal: 27 Februari 2020', 'Nomor: 0000205.AH.01.08.Tahun, Tanggal: 02 Maret 2020', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(687, 911, 'Nomor: 07, Tanggal: 22 Maret 2021', 'Nomor: 0005228.AH.01.07.Tahun', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(688, 912, 'Nomor: 78, Tanggal: 21 Agustus 2018', 'Nomor: 0010614.AH.01.07.TAHUN, Tanggal: 29 Agustus 2018', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(689, 913, 'Nomor: 26, Tanggal: 31 Mei 2018', 'Nomor: AHU-0007885.AH.01, Tanggal: 06 Juni 2018', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(690, 914, 'Nomor: 12, Tanggal: 10 Oktober 2020', 'Nomor: 0018595.AH.01.04.Tahun, Tanggal: 10 Oktober 2020', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(691, 915, 'Nomor: 23, Tanggal: 27 Februari 2018', 'Nomor: ., Tanggal: 02 Maret 2018', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(692, 916, 'Nomor: 148, Tanggal: 31 Juli 2019', 'Nomor: ., Tanggal: 05 Agustus 2019', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(693, 917, 'Nomor: 01, Tanggal: 05 April 2017', 'Nomor: ., Tanggal: 05 April 2017', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(694, 918, 'Nomor: 5, Tanggal: 16 Maret 2018', 'Nomor: AHU-0003695.AH.01.04, Tanggal: 04 Tahun 2018', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(695, 919, 'Nomor: 6, Tanggal: 10 Juni 2021', 'Nomor: 0014154.AH.01.04.Tahun, Tanggal: 11 Juni 2021', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(696, 920, 'Nomor: 01, Tanggal: 01 November 2021', 'Nomor: 0025878.AH.01.04.Tahun, Tanggal: 01 November 2021', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(697, 921, 'Nomor: 1285, Tanggal: 29 Desember 2020', 'Nomor: 0026411.AH.01.04.Tahun, Tanggal: 29 Desember 2020', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(698, 922, 'Nomor: 21, Tanggal: 21 Maret 2019', 'Nomor: 0004580.AH.01.04.Tahun, Tanggal: 21 Maret 2019', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(699, 923, 'Nomor: 2, Tanggal: 25 Februari 2019', 'Nomor: 0003188.AH.01.04.Tahun, Tanggal: 26 Februari 2019', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(700, 924, 'Nomor: 01, Tanggal: 04 Oktober 2021', 'Nomor: 0024337.AH.01.04.Tahun, Tanggal: 12 Oktober 2021', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(701, 925, 'Nomor: 05, Tanggal: 22 Juni 2022', 'Nomor: 0013364.AH.01.04.Tahun, Tanggal: 23 Juni 2022', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(702, 926, 'Nomor: 04, Tanggal: 13 Juni 2022', 'Nomor: 0013048.AH.01.04.Tahun, Tanggal: 20 Juni 2022', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(703, 927, 'Nomor: 167, Tanggal: 23 Maret 2022', 'Nomor: 0007661.AH.01.04.Tahun, Tanggal: 29 Maret 2022', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(704, 928, 'Nomor: 07, Tanggal: 23 Juli 2021', 'Nomor: 0000952.AH.01.05.TAHUN, Tanggal: 28 Juli 2021', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(705, 929, 'Nomor: 02, Tanggal: 29 November 2021', 'Nomor: 0028374.AH.01.04.TAHUN, Tanggal: 30 November 2021', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27');

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
-- Table structure for table `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `gambar_upload` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeris`
--

INSERT INTO `galeris` (`id`, `judul`, `program_id`, `gambar_upload`, `created_at`, `updated_at`) VALUES
(1, 'Bebersih Bandung HJKB Ke-214-1', 6, 'bebersih-bandung-hjkb-ke-214-tahun-2024-1_20250523.jpg', '2025-05-23 07:52:48', '2025-05-23 08:42:28'),
(3, 'Bebersih Bandung HJKB Ke-214-2', 6, 'bebersih-bandung-hjkb-ke-214-tahun-2024_20250523-1.jpg', '2025-05-23 08:10:43', '2025-05-23 08:42:16'),
(4, 'Bebersih Bandung HJKB Ke-214-3', 6, 'bebersih-bandung-hjkb-ke-214-tahun-2024-3_20250523.jpg', '2025-05-23 08:25:42', '2025-05-23 08:42:04'),
(5, 'Safari Ormas-1', 11, 'safari-ormas-1_20250523.jpg', '2025-05-23 08:27:23', '2025-05-23 08:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `ikus`
--

CREATE TABLE `ikus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `file_upload` varchar(255) NOT NULL,
  `file_upload_wm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ikus`
--

INSERT INTO `ikus` (`id`, `created_at`, `updated_at`, `title`, `tahun`, `file_upload`, `file_upload_wm`) VALUES
(1, '2025-05-15 08:49:10', '2025-06-23 20:34:52', 'Indikator Kinerja Utama 2025', '2025', 'document/iku/1747324150_IKU 2025.pdf', 'document/iku/iku_wm/1747324150_IKU 2025_wm.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `import_batches`
--

CREATE TABLE `import_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `imported_count` int(11) NOT NULL DEFAULT 0,
  `skipped_count` int(11) NOT NULL DEFAULT 0,
  `imported_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `lakips`
--

CREATE TABLE `lakips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `file_upload` varchar(255) NOT NULL,
  `file_upload_wm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lakips`
--

INSERT INTO `lakips` (`id`, `created_at`, `updated_at`, `title`, `tahun`, `file_upload`, `file_upload_wm`) VALUES
(1, '2025-05-15 09:11:58', '2025-08-06 23:10:52', 'Laporan AKIP BAKESBANGPOL Tahun 2024', '2024', 'document/lakip/1754547052_1747325518_LKIP BAKESBANGPOL TAHUN 2024_wm (1).pdf', 'document/lakip/lakip_wm/1754547052_1747325518_LKIP BAKESBANGPOL TAHUN 2024_wm (1)_wm.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `landasan_hukums`
--

CREATE TABLE `landasan_hukums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bidang_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_peraturan` varchar(255) NOT NULL,
  `nomor_peraturan` varchar(255) NOT NULL,
  `tahun_peraturan` year(4) NOT NULL,
  `tentang` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landasan_hukums`
--

INSERT INTO `landasan_hukums` (`id`, `bidang_id`, `jenis_peraturan`, `nomor_peraturan`, `tahun_peraturan`, `tentang`, `created_at`, `updated_at`) VALUES
(1, 1, 'UU', '12', '2011', '<p>Pembentukan Peraturan Perundang-Undangan</p>', '2025-05-13 19:40:52', '2025-05-24 04:04:24'),
(2, 1, 'UU', '23', '2014', '<p>Pemerintah Daerah</p>', '2025-05-13 19:42:49', '2025-05-27 18:30:48'),
(3, 1, 'PP', '2', '2021', '<p>Penyelenggaraan Pendidikan Ideologi Pancasila dan Wawasan Kebangsaan</p>', '2025-05-13 19:44:32', '2025-05-27 18:30:55'),
(4, 1, 'Perpres', '98', '2016', '<p>Lembaga Ketahanan Nasional</p>', '2025-05-13 19:56:29', '2025-05-27 18:31:01'),
(5, 1, 'Kepres', '24', '2016', '<p>Hari Lahir Pancasila</p>', '2025-05-13 19:57:28', '2025-05-27 18:31:10'),
(6, 1, 'Permen', '71', '2012', '<p>Pedoman Pendidikan Wawasan Kebangsaan</p>', '2025-05-13 19:58:07', '2025-05-27 18:31:20'),
(7, 1, 'Kepmen', '2', '2004', '<p>Pembinaan Ideologi Pancasila dan Wawasan Kebangsaan</p>', '2025-05-13 19:59:04', '2025-05-27 18:31:28'),
(8, 1, 'Perda', '3', '2021', '<p>Pembinaan Ideologi Pancasila dan Wawasan Kebangsaan</p>', '2025-05-13 19:59:44', '2025-05-27 18:31:35'),
(9, 1, 'Perwal', '23', '2021', '<p>Kedudukan, susunan organisasi, tugas dan fungsi serta kerja Badan Kesatuan Bangsa dan Politik Kota Bandung</p>', '2025-05-13 20:01:09', '2025-05-27 18:31:47'),
(10, 2, 'UU', '7', '2015', '<p>Pemilu</p>', '2025-05-13 20:01:46', '2025-05-27 18:31:55'),
(11, 2, 'UU', '2', '2011', '<p>Partai Politik</p>', '2025-05-13 20:02:41', '2025-05-27 18:32:06'),
(12, 2, 'PP', '37', '2004', '<p>Larangan PNS Menjadi Anggota Partai Politik</p>', '2025-05-13 20:03:24', '2025-05-27 18:33:12'),
(13, 2, 'PP', '1', '2018', '<p>Bantuan Keuangan Kepada Partai Politik</p>', '2025-05-13 20:04:20', '2025-05-27 18:33:16'),
(14, 2, 'Permendagri', '11', '2019', '<p>Perangkat Daerah yang Melaksanakan Urusan Pemerintahan di Bidang Kesatuan Bangsa dan Politik</p>', '2025-05-13 20:05:03', '2025-05-27 18:33:21'),
(15, 2, 'Permendagri', '78', '2020', '<p>Tata Cara Penghitungan Penganggaran Dalam Anggaran Pendapatan dan Belanja Daerah dan Tertib Administrasi Pengajuan, Penyaluran, dan Laporan Pertanggungjawaban Penggunaan Bantuan Keuangan Partai Politik</p>', '2025-05-13 20:07:31', '2025-05-27 18:33:28'),
(16, 2, 'Peraturan KPU', '6', '2023', '<p>Daerah Pemilihan dan Alokasi Kursi Anggota DPR, DPRD Provinsi dan DPRD Kab/Kota Dalam Pemilu Tahun 2024</p>', '2025-05-13 20:09:10', '2025-05-27 18:33:47'),
(17, 2, 'Peraturan KPU', '20', '2023', '<p>Kampanye Pemilu</p>', '2025-05-13 20:10:05', '2025-05-27 18:33:52'),
(18, 2, 'Peraturan KPU', '8', '2024', '<p>Pencalonan Gubernur dan Wakil Gubernur, Bupati dan Wakil Bupati, Serta Wali Kota Dan Wakil Wali Kota</p>', '2025-05-13 20:10:43', '2025-05-27 18:33:56'),
(19, 2, 'Peraturan KPU', '13', '2024', '<p>Kampanye Pemilihan Gubernur, Bupati dan Wakil Bupati Serta Wali Kota Dan Wakil Wali Kota</p>', '2025-05-13 20:11:19', '2025-05-27 18:34:00'),
(20, 2, 'Keputusan KPU', '1363', '2024', '<p>Pedoman Teknis Pelaksanaan Kampanye Pemilihan Gubernur dan Wakil Gubernur, Bupati dan Wakil Bupati, Serta Wali Kota dan Wakil Wali Kota</p>', '2025-05-13 20:12:07', '2025-05-27 18:34:05'),
(21, 2, 'Keputusan KPU', '360', '2024', '<p>Penetapan Hasil Pemilu Presiden dan Wakil Presiden, Anggota DPR, DPD, DPRD Provinsi dan DPRD Kab/Kota Secara Nasional dalam Pemilu Tahun 2024</p>', '2025-05-13 20:13:42', '2025-05-27 18:34:22'),
(22, 2, 'Surat Gubernur Jawa Barat', '2894/KU.03.11.07/BAKESBANGPOL', '2023', '<p>Persetujuan Kenaikan Nilai Bantuan Keuangan Kepada Partai Politik</p>', '2025-05-13 20:14:42', '2025-05-27 18:34:29'),
(23, 2, 'Kepwal', '210/Kep.683- BKBP/2024', '2024', '<p>Penetapan Besaran Angka Bantuan Keuangan Kepada Partai Politik yang Mendapatkan Kursi di Dewan Perwakilan Rakyat Daerah Kota Bandung Periode 2024-2029 Hasil Pemilu Tahun 2024</p>', '2025-05-13 20:17:36', '2025-05-27 18:34:34'),
(24, 2, 'Kepwal', '210/Kep.684- BKBP/2024', '2024', '<p>Tim Verifikasi Kelengkapan Administrasi Pengajuan Permohonan Bantuan Keuangan Partai Politik Hasil Pemilu Tahun 2024 Tingkat Kota Bandung</p>', '2025-05-13 20:18:28', '2025-05-27 18:34:40'),
(25, 2, 'Surat Edaran Wali Kota Bandung', '107- BKBP/2023', '2023', '<p>Netralitas ASN dalam Pemilu dan Pemilihan Tahun 2024</p>', '2025-05-13 20:19:16', '2025-05-27 18:34:45'),
(26, 2, 'Surat Edaran Wali Kota Bandung', '109- BKPB/2023', '2023', '<p>Ikrar dan Penandatanganan Netralitas Pegawai ASN Pada Pemilu dan Pemilihan Tahun 2024</p>', '2025-05-13 20:20:18', '2025-05-27 18:35:02'),
(27, 2, 'Keputusan KPU Kota Bandung', '539', '2024', '<p>Penetapan Hasil Pemilihan Umum Anggota Dewan Perwakilan Rakyat Daerah Kota Bandung Tahun 2024</p>', '2025-05-13 20:21:10', '2025-05-27 18:35:07'),
(28, 3, 'UU', '2', '2017', '<p>Organisasi Kemasyarakatan</p>', '2025-05-13 20:22:53', '2025-05-27 18:35:11'),
(29, 3, 'Kepwal', '800/Kep.459- BKBP/2020', '2020', '<p>Tim Terpadu Pencegahan dan Pemberantasan Penyalahgunaan dan Peredaran Gelap Narkotika dan Prekursor Narkotika</p>', '2025-05-13 20:23:45', '2025-05-27 18:35:16'),
(30, 3, 'Kepwal', '148/Kep.1626- BKBP/2022', '2022', '<p>Penetapan Kelurahan Bersih Narkoba Tahun 2022</p>', '2025-05-13 20:24:22', '2025-05-27 18:35:20'),
(31, 3, 'Kepwal', '148/Kep.887- BKBP/2023', '2023', '<p>Penetapan Kelurahan Bersih Narkoba Tahun 2023</p>', '2025-05-13 20:25:34', '2025-05-27 18:36:20'),
(32, 3, 'Kepwal', '148/Kep.1259- BKBP/2024', '2024', '<p>Kelurahan Bersinar</p>', '2025-05-13 20:26:12', '2025-05-27 18:36:25'),
(33, 4, 'UU', '7', '2012', '<p>(1) Pemerintah dan Pemerintah Daerah berkewajiban melakukan upaya Pemulihan Pascakonflik secara terencana, terpadu, berkelanjutan, dan terukur. </p>\r\n\r\n<p>(2) Upaya Pemulihan Pascakonflik sebagaimana dimaksud pada ayat (1) meliputi: a. rekonsiliasi; b. rehabilitasi; c. rekonstruksi.</p>', '2025-05-13 20:28:17', '2025-05-27 18:38:42'),
(34, 4, 'PP', '2', '2015', '<p>(2) Pencegahan Konflik sebagaimana dimaksud pada ayat (1) dilakukan melalui: </p>\r\n\r\n<p>a. Memelihara kondisi damai dalam masyarakat; </p>\r\n\r\n<p>b. Mengembangkan sistem penyelesaian secara damai; </p>\r\n\r\n<p>c. Meredam potensi Konflik; </p>\r\n\r\n<p>d. Membangun sistem peringatan dini.</p>', '2025-05-13 20:30:11', '2025-05-27 18:39:26'),
(35, 4, 'Perpres', '7', '2021', '<p>Rencana Aksi Nasional Pencegahan dan Penanggulangan Ekstremisme Berbasis Kekerasan yang Mengarah Pada Terorisme Tahun 2020-2024</p>', '2025-05-13 20:30:58', '2025-05-27 18:39:34'),
(36, 4, 'Permendagri', '2', '2018', '<p>Kewaspadaan Dini Daerah</p>', '2025-05-13 20:31:24', '2025-05-27 18:39:52'),
(37, 4, 'Permendagri', '46', '2019', '<p>Kewaspadaan Dini Daerah</p>', '2025-05-13 20:31:54', '2025-05-27 18:39:57'),
(38, 4, 'Perwal', '4', '2023', '<p>Rencana Aksi Daerah Pencegahan dan Penanggulangan Ekstremisme Berbasis Kekerasan yang Mengarah Pada Terorisme Tahun 2023-2024</p>', '2025-05-13 20:32:44', '2025-05-27 18:40:03'),
(39, 4, 'Kepwal', '300/Kep.7-BKBP', '2024', '<p>Forum Kewaspadaan Dini Masyarakat Daerah Kota Bandung</p>', '2025-05-13 20:33:56', '2025-05-27 18:40:07'),
(40, 4, 'Kepwal', '460/Kep.157-BKBP', '2022', '<p>Tim Terpadu Penanganan Konflik Sosial Tingkat Kota Bandung</p>', '2025-05-13 20:34:33', '2025-05-27 18:40:12'),
(41, 4, 'Kepwal', '460/Kep.158-BKBP', '2022', '<p>Tim Kewaspadaan Dini Daerah Kota Bandung</p>', '2025-05-13 20:35:22', '2025-05-27 18:40:24'),
(42, 4, 'Kepwal', '300/Kep.336.Bakesbangpol', '2023', '<p>Kelompok Kerja Rencana Aksi Daerah Pencegahan dan Penanggulangan Ekstremisme Kota Bandung</p>', '2025-05-13 20:36:05', '2025-05-27 18:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kajians`
--

CREATE TABLE `laporan_kajians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tahun` year(4) NOT NULL,
  `file_upload` varchar(255) DEFAULT NULL,
  `file_upload_wm` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legislatifs`
--

CREATE TABLE `legislatifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_urut` int(11) NOT NULL DEFAULT 0,
  `nama_lengkap` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `riwayat_pendidikan` text DEFAULT NULL,
  `riwayat_pekerjaan` text DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `nama_partai` varchar(255) DEFAULT NULL,
  `logo_partai` varchar(255) DEFAULT NULL,
  `dapil` varchar(255) DEFAULT NULL,
  `suara_sah` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legislatifs`
--

INSERT INTO `legislatifs` (`id`, `no_urut`, `nama_lengkap`, `tempat_lahir`, `riwayat_pendidikan`, `riwayat_pekerjaan`, `jenis_kelamin`, `nama_partai`, `logo_partai`, `dapil`, `suara_sah`, `created_at`, `updated_at`) VALUES
(7612, 1, 'Mochammad Ulan Surlan, S.Tr. Akun', 'Kuningan', 'SMA', 'Manager Plaza Dinasti', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 1', 3934, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7613, 2, 'Moch Kahfi Nurdiman', 'Bandung', 'SMA', 'Humas PT. PLN Distribusi Jabar', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 1', 1641, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7614, 3, 'Lia Anggraeni, S.E.', 'Bandung', 'S1', 'Sekretaris Yayasan Graha Dhuafa Indonesia', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 1', 518, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7615, 4, 'Nur Ma`Rifah Aini, S.M.', 'Bandung', 'S1', 'Marketing PT. Infomedia Nusantara', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 1', 427, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7616, 5, 'Irma Zahrotunnisa', 'Karawang', 'S1', 'DPW PKB Jabar', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 1', 407, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7617, 6, 'Holil Muhlisi', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 1', 312, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7618, 7, 'Novik Safari, S.S.', 'Garut', 'S1', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 1', 2335, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7619, 8, 'Uyun Heryana, S.Pd., M.Pd.', 'Sumedang', 'S2', 'Ketua Pelaksana Stie Genesha', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 1', 706, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7620, 1, 'Ir. Kurnia Solihat', 'Bandung', 'S1', 'Anggota DPRD Kota Bandung', 'Laki-laki', 'Partai Gerindra', NULL, 'Kota Bandung 1', 11313, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7621, 2, 'Wandi Ruswandi, S.E.', 'Bandung', 'S1', 'Manager Marketing KJPP Nanang Rahayu', 'Laki-laki', 'Partai Gerindra', NULL, 'Kota Bandung 1', 2190, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7622, 3, 'Dra. Irene Lydia Kenari Silaen', 'Bandung', 'S1', 'Direktur PT. Mutiara Sinar Semesta', 'Perempuan', 'Partai Gerindra', NULL, 'Kota Bandung 1', 3241, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7623, 4, 'Hasan Faozi, S.Pd.', 'Purwakarta', 'S1', 'Anggota DPRD', 'Laki-laki', 'Partai Gerindra', NULL, 'Kota Bandung 1', 4795, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7624, 5, 'Andra Wahyu Hartawanti, S.H.', 'Jakarta', 'S1', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Gerindra', NULL, 'Kota Bandung 1', 1195, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7625, 6, 'Ahmad Bashiruddin Syamsudduha', 'Bandung', 'D3', 'Direktur PT. Bassam', 'Laki-laki', 'Partai Gerindra', NULL, 'Kota Bandung 1', 1109, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7626, 7, 'R. R. Sri Rahayu. Skd, Drg., M.M.', 'Bandung', 'S2', 'Direktur Rsia Budhi Jaya Jaksel', 'Perempuan', 'Partai Gerindra', NULL, 'Kota Bandung 1', 2311, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7627, 8, 'Ardiani Salmawati, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Gerindra', NULL, 'Kota Bandung 1', 1702, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7628, 1, 'H. Riantono, S.T., M.Si.', 'Jakarta', 'S2', 'Anggota DPRD', 'Laki-laki', 'Pdi Perjuangan', NULL, 'Kota Bandung 1', 4212, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7629, 2, 'Nina Fitriana, S.I.P.', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Perempuan', 'Pdi Perjuangan', NULL, 'Kota Bandung 1', 3041, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7630, 3, 'Rd Wawan Hermanto A', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Pdi Perjuangan', NULL, 'Kota Bandung 1', 823, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7631, 4, 'Robert Kenedy Sihombing', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Pdi Perjuangan', NULL, 'Kota Bandung 1', 2769, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7632, 5, 'Rahayu Widiowati, S.H., M.Si.', 'Bandung', 'S2', 'Advokat', 'Perempuan', 'Pdi Perjuangan', NULL, 'Kota Bandung 1', 1924, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7633, 6, 'Maruli Djaja Muliady, S.T., M.M.', 'Bandung', 'S2', 'Swasta/Wiraswasta', 'Laki-laki', 'Pdi Perjuangan', NULL, 'Kota Bandung 1', 1461, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7634, 7, 'Sonya Widiana, S.Ak.', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Perempuan', 'Pdi Perjuangan', NULL, 'Kota Bandung 1', 487, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7635, 8, 'Angke Delfa Rizal', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Pdi Perjuangan', NULL, 'Kota Bandung 1', 795, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7636, 1, 'Dr. H. Radea Respati Paramudhita, S.H., M.H.', 'Bandung', 'S3', 'Manager Partner Low Office Radea Reyraya & Partner', 'Laki-laki', 'Partai Golkar', NULL, 'Kota Bandung 1', 8582, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7637, 2, 'Medina Wiranatakusumah, S.E.', 'Bandung', 'S1', 'Sehretaris Direktur PT. Menara Wenang', 'Perempuan', 'Partai Golkar', NULL, 'Kota Bandung 1', 5047, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7638, 3, 'Neni Fitriani, A.Md.', 'Bandung', 'D3', 'Direktur Utama CV Misterindo', 'Perempuan', 'Partai Golkar', NULL, 'Kota Bandung 1', 1490, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7639, 4, 'Azhar Hariman', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Golkar', NULL, 'Kota Bandung 1', 1085, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7640, 5, 'Ir. H. Juwanda', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Golkar', NULL, 'Kota Bandung 1', 7221, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7641, 6, 'Dra. Indrawati, M.Si.', 'Bandung', 'S2', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Golkar', NULL, 'Kota Bandung 1', 744, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7642, 7, 'Budianto Santoso, S.H., M.Kn.', 'Ujung Pandang', 'S2', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Golkar', NULL, 'Kota Bandung 1', 443, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7643, 8, 'Umar Komarudin', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Golkar', NULL, 'Kota Bandung 1', 331, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7644, 1, 'Dudy Himawan, S.H.', 'Bandung', 'S1', 'Anggota DPRD', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 1', 7250, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7645, 2, 'Syafrul Rizal Nurzaman, S.T., M.B.A.', 'Bandung', 'S2', 'Komisaris PT. Musi Sentra Sinergi, Oil And Natural Gas', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 1', 4969, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7646, 3, 'Wieke Wiwik Purwati, S.H.', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 1', 488, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7647, 4, 'Ade Fahruroji', 'Pandeglang', 'SMA', 'DPRD Kota Bandung', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 1', 1657, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7648, 5, 'Djulaiha Sukmana, S.Sos., M.Kesos.', 'Jakarta', 'S2', 'Direktur Klinik Kesehatan Medika Familia', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 1', 2557, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7649, 6, 'Egi Dirgantara Goutama', 'Jakarta', 'SMA', 'Owner D\'Nay C & Kitchen', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 1', 674, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7650, 7, 'Abdul Rachman', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 1', 166, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7651, 8, 'Erwin Suharnoko', 'Serang', 'SMA', 'Owner KhariSMA Tiga Putra', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 1', 197, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7652, 1, 'Wagiyanto, S.E.', 'Purworejo', 'S1', 'Supervisor PT. Multi Garmenjaya', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 1', 410, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7653, 2, 'Yoedy Achmad Djatnika', 'Bandung', 'SMA', 'Asisten Manager Eldorado Executive Club', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 1', 265, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7654, 3, 'Siti Aisyah', 'Bandung', 'SMA', 'Operator PT. Lawe Adyaprima', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 1', 232, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7655, 4, 'Haeru Saleh', 'Karawang', 'SMA', 'Yantek PT. Haleyora Powerindo', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 1', 283, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7656, 5, 'Yayan Priatna', 'Bandung', 'SMA', 'Biller PT. Haleyora Powerindo', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 1', 289, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7657, 6, 'Sri Wahyuni', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 1', 166, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7658, 7, 'Wahyu Permana', 'Rangkasbitung', 'S1', 'Supir Damri', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 1', 50, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7659, 8, 'Apriyanita', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 1', 73, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7660, 1, 'Ahmad, S.A.P.', 'Bandung', 'S1', 'Staf It Kelurahan Sekeloa', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 1', 1499, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7661, 2, 'Yahya Rijalul Jihad', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 1', 667, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7662, 3, 'Sri Juliani, S.H.', 'Bandung', 'S1', 'Asissten Lawyer Kantor Hukum Natuna', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 1', 266, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7663, 4, 'Gan Bonddilie', 'Sungai Liat', 'S2', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 1', 1065, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7664, 5, 'Agus', 'Wonosobo', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 1', 138, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7665, 6, 'Sella Agustina', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Gelora', NULL, 'Kota Bandung 1', 511, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7666, 7, 'Yantie Nenti', 'Bandung', 'SMA', 'Agen Mitra Bpjs', 'Perempuan', 'Partai Gelora', NULL, 'Kota Bandung 1', 217, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7667, 8, 'R.Adang Komara', 'Garut', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 1', 113, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7668, 1, 'Eko Kurnianto W, S.T., M.Pmat.', 'Purworejo', 'S2', 'Pengawas Sekolah Alam Bandung', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 1', 16185, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7669, 2, 'Iman Lestariyono, S.Si.', 'Bandung', 'S1', 'Ketua Fraksi DPRD Kota Bandung', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 1', 7143, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7670, 3, 'Wiwi Hartanti, S.Pd.', 'Bandung', 'S1', 'Koordinator Pendidikan', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 1', 3450, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7671, 4, 'Zaenal Sahar, S.H.', 'Maros', 'S1', 'CV Berkah Mulia Abadi Daarut Tauhid', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 1', 5174, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7672, 5, 'Andi Nenie Sri Lestari, S.Pd., M.Si.', 'Jombang', 'S2', 'Dosen Umiversitas Jenderal Ahmad Yani', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 1', 2229, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7673, 6, 'Yusyadi, S.E.', 'Pangkal Pinang', 'S1', 'Konsultan Manajemen Balai', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 1', 812, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7674, 7, 'Raden Nenden Simbar Rahayu, S.Sos.', 'Bandung', 'S1', 'Guru Ibnu Sina Bandung', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 1', 2138, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7675, 8, 'Harry Gunawan Solistiaadhi, S.Pd.I.', 'Bandung', 'S1', 'Dewan Pembina Tarbiyat Al Quran Imaamuna', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 1', 1518, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7676, 1, 'David Charmichael Panjaitan', 'Duri', 'D3', 'Owner Ceu Logistik', 'Laki-laki', 'Partai Kebangkitan Nasional', NULL, 'Kota Bandung 1', 53, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7677, 2, 'Elizabeth Jesieka Pasaribu', 'Jakarta', 'D3', 'Owner Duri Durian', 'Perempuan', 'Partai Kebangkitan Nasional', NULL, 'Kota Bandung 1', 67, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7678, 3, 'Dito Wahyu Purwanto', 'Semarang', 'Tidak Diketahui', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Kebangkitan Nasional', NULL, 'Kota Bandung 1', 15, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7679, 4, 'Deva Gustian', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Kebangkitan Nasional', NULL, 'Kota Bandung 1', 11, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7680, 5, 'Nena Komalasari', 'Bandung', 'SMA', 'Staff PT. Veronica Jaya Abadi', 'Laki-laki', 'Partai Kebangkitan Nasional', NULL, 'Kota Bandung 1', 14, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7681, 6, 'Budiman Panggabean', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Kebangkitan Nasional', NULL, 'Kota Bandung 1', 27, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7682, 1, 'H. Ayi Hambali', 'Bandung', 'S2', 'Wakil Ketua Komite Iv Dpd', 'Laki-laki', 'Partai Hanura', NULL, 'Kota Bandung 1', 376, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7683, 2, 'Etit Gartiah', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Hanura', NULL, 'Kota Bandung 1', 162, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7684, 3, 'Siti Ratna', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Hanura', NULL, 'Kota Bandung 1', 97, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7685, 4, 'Widi Herlambang', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Hanura', NULL, 'Kota Bandung 1', 112, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7686, 1, 'Jovan Abdul Asyraf, S.I.Kom.', 'Bukitinggi', 'S1', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Garda Republik Indonesia', NULL, 'Kota Bandung 1', 87, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7687, 2, 'Fajar Anugrah, S.I.Kom.', 'Kuningan', 'S1', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Garda Republik Indonesia', NULL, 'Kota Bandung 1', 63, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7688, 3, 'Tini Gustini', 'Jakarta', 'Tidak Diketahui', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Garda Republik Indonesia', NULL, 'Kota Bandung 1', 61, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7689, 4, 'Alma Nurshiyami', 'Tasikmalaya', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Garda Republik Indonesia', NULL, 'Kota Bandung 1', 47, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7690, 1, 'Hj. Lisa Syafri, S.Sos.', 'Tanjung Karang', 'S1', 'Manager Marketing Sinarmas Bandung', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 1', 1447, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7691, 2, 'Lutfi Nurdianchah, S.T., M.T.', 'Yogyakarta', 'S2', 'Dosen Telkom University', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 1', 2211, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7692, 3, 'Yudi Mulyana', 'Bandung', 'SMA', 'Manager PT. Maybank', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 1', 853, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7693, 4, 'Deden Sumartono', 'Bandung', 'SMA', 'Kepala Gudang PT. Primaloka', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 1', 410, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7694, 5, 'Dewi Daryati', 'Bandung', 'SMA', 'Fgc PT. Avon Indonesia', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 1', 322, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7695, 6, 'Adi Mulyadi', 'Bandung', 'S1', 'Admin Umum Tvri Bandung', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 1', 302, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7696, 7, 'Rias Rianti', 'Bandung', 'SMA', 'Powner Dreams Wedding Organizer', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 1', 382, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7697, 8, 'Moh. Iqbal H.Abdul Karim', 'Tidore', 'S1', 'Wakil Ketua Pdam Kota Bandung', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 1', 348, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7698, 1, 'Nono Mulyana, S.T.', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 1', 348, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7699, 2, 'Rakhmat Supriatna', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 1', 348, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7700, 3, 'Sariyantin', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Bulan Bintang', NULL, 'Kota Bandung 1', 348, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7701, 4, 'Nana Sutisna', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 1', 348, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7702, 5, 'Waldiatri Rosidah', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Bulan Bintang', NULL, 'Kota Bandung 1', 348, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7703, 6, 'Wiwik Sugianti, S.Pd.', 'Magetan', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Bulan Bintang', NULL, 'Kota Bandung 1', 348, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7704, 1, 'Charles Andrianto, S.M.', 'Bandung', 'S1', 'Manager PT. Klinik Keluarga Sehat Mandiri', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 1', 348, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7705, 2, 'Muhamad Bangun Nagari, S.I.P.', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 1', 2262, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7706, 3, 'Hj. Yemi Resmiasih', 'Jakarta', 'SMA', 'Desainer Indonesia Yemi Galeri', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 1', 1513, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7707, 4, 'Najmul Ma\'Arif', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 1', 662, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7708, 5, 'Irna Yuninda, S.Farm.', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 1', 329, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7709, 6, 'Sulaeman Fahri, S.I.Kom.', 'Bandung', 'S1', 'Operator Anggaran Kelurahan Kebon Pisang', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 1', 774, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7710, 7, 'Ria Ristawati, S.E., M.M.', 'Bandung', 'S1', 'President Bmw Indonesia', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 1', 328, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7711, 8, 'Dede Hermawansyah', 'Banjarmasin', 'SMA', 'Wakil Ketua Dpc Kota Bandung', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 1', 241, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7712, 1, 'Erick Darmadjaya, B.Sc., M.K.P.', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 1', 3699, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7713, 2, 'Pirman Suharto, S.Pi.', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 1', 1137, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7714, 3, 'Joanne Sunarisa', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 1', 1382, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7715, 4, 'Jusin Tjandradipura', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 1', 405, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7716, 5, 'Setiadi Umar, Ph.D.', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 1', 252, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7717, 6, 'Neneng Dian Iswanty', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 1', 374, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7718, 7, 'Hulman Marasi, S.E., M.M.', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 1', 225, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7719, 8, 'Gaos Darmawan', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 1', 1948, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7720, 1, 'Dadi Gumilang, S.E.', 'Ciawi', 'S1', 'Direktur CV Karunia Hidup', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 1', 415, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7721, 2, 'Febby Resdian', 'Garut', 'SMA', 'Owner Sakindo Megah Jaya', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 1', 351, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7722, 3, 'S. Luciana Indriasari', 'Cianjur', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 1', 375, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7723, 4, 'Kiki Rudiana, S.E.', 'Bandung', 'S1', 'Owner CV Kiki', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 1', 926, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7724, 5, 'Andrian Roult', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 1', 156, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7725, 6, 'Tria Vitria Oktriani', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 1', 68, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7726, 7, 'Muslim', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 1', 231, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7727, 8, 'Drs. Eddi Cahyana LeSMAna', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 1', 196, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7728, 1, 'Hj. Dewi Muslimah, Bsw.', 'Cianjur', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 1', 646, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7729, 2, 'Ece Supriadi, S.Pd.I.', 'Cianjur', 'S1', 'Kesiswaan SMAs Bunga Bangsa Bandung', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 1', 423, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7730, 3, 'Yantini, S.Pd.', 'Bandung', 'S1', 'Kepala Sekolah Sejahtera Mandiri Bandung', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 1', 205, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7731, 4, 'Lani Widaningsih', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 1', 301, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7732, 5, 'H. Tata Muttaqin', 'Tasikmalaya', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 1', 187, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7733, 6, 'R. Achmad Yunus', 'Bandung', 'SMA', 'Staff Marketing PT. Maha Sentral Sejati', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 1', 89, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7734, 7, 'Nurul Muchlisah, S.T.', 'Soroako', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 1', 92, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7735, 8, 'Irshan Ramadhan, S.H.', 'Bandung', 'S1', 'Owner Wiside Resto & Cafe', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 1', 301, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7736, 1, 'Didin Nursaefuddin', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 1', 508, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7737, 2, 'Drs. H. Zuhry Suharto, M.Ag.', 'Sragen', 'S2', 'Guru Agama', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 1', 540, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7738, 3, 'Enden Siti Nursaidah', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Ummat', NULL, 'Kota Bandung 1', 66, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7739, 4, 'Taufik Hidayat', 'Bandung', 'D3', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 1', 286, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7740, 5, 'Sri Hartati', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Ummat', NULL, 'Kota Bandung 1', 63, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7741, 6, 'Solihin Ruswandi', 'Ciamis', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 1', 157, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7742, 1, 'Muhamad Syahlevi Erwin Apandi', 'Bandung', 'SMA', 'Direktur PT.Astra Graha Mobilindo', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 2', 6328, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7743, 2, 'Barnas Somantri', 'Garut', 'SMA', 'Direktur PT.Bangkit Sejahtera Solusindo Direktur PT.Dinamika Ardapa Mega Tama', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 2', 2151, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7744, 3, 'Rani Sintiawati, M.Pd.', 'Surabaya', 'S2', 'Direktur Lkp-Lpk \"Karya Jelita\" Kota Bandung', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 2', 924, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7745, 4, 'Rila Sonia', 'Bandung', 'SMA', 'Direktur PT. Sonia CiPT.a Cemerlang Indonesia', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 2', 503, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7746, 5, 'Rahmat Adiansyah', 'Cianjur', 'SMA', 'Head Credit PT. Artha Asia Finance  Manager Area Wilayah Sumatra PT. Magna Finance', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 2', 1477, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7747, 6, 'Edi Supriatna Korua', 'Bandung', 'SMA', 'Direktur Keuangan PT.Ginuluran (Developer)', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 2', 849, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7748, 1, 'Toni Wijaya, S.E., S.H.', 'Bandung', 'S1', 'Staff Redaksi Yayasan Pilar Empat', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 2', 5728, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7749, 2, 'N. Wina  Sariningsih, S.E', 'Bandung', 'S1', 'Staf Admin PT.Reska', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 2', 3074, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7750, 3, 'Dedy Rahmani Wildan, S.T., M.T.', 'Palembang', 'S2', 'General Manager PT.Samko Gosci (Swasta) Asisten Ahli Universitas Nurtanio Banding', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 2', 2151, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7751, 4, 'Rina Lestari', 'Bandung', 'SMA', 'Pemilik Konveksi', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 2', 951, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7752, 5, 'Ahmad Fauzi', 'Bandung', 'SMA', 'Wakil Direktur CV Berlian Berkah Mandiri', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 2', 1179, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7753, 6, 'Ance Bece, S.H.', 'Bandung', 'S1', 'Sales Executive Bil', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 2', 1881, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7754, 1, 'H. Achmad Nugraha Dh, S.H.', 'Bandung', 'S1', 'Wakil Ketua DPRD Kota Bandung Ketua                                Komisi D DPRD Kota Bandung', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 2', 1014, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7755, 2, 'Hera Harmatika', 'Garut', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 2', 944, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7756, 3, 'Dini Nur\'Aina', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 2', 2293, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7757, 4, 'Tina Adriani', 'Bandung', 'SMA', 'Sales Promotion Girl PT. Ramayana', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 2', 509, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7758, 5, 'Sendi Lukmanulhakim, S.H.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 2', 3807, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7759, 6, 'Taryan, S.Pd.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 2', 308, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7760, 1, 'M. Bagja Jaya Wibawa', 'Bandung', 'SMA', 'Direktur CV. Berkah Jaya Wibawa', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 2', 5968, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7761, 2, 'Ruslan Abdul Gani, S.Pd., M.Pd.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 2', 5931, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7762, 3, 'Asih Handayani', 'Kebumen', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 2', 825, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7763, 4, 'Elva, S.H.', 'Bandung', 'S1', 'Wiraswasta', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 2', 761, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7764, 5, 'Ari Purnama Sidik, S.H.', 'Bandung', 'S1', 'Owner Ari Purnama Sidik Associates', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 2', 1791, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7765, 6, 'Hj. Yeni Yuliani', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 2', 615, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7766, 1, 'Dr. Agung Firmansyah Sumantri, Sp.Pd., Khom., Mmrs., Finasim.', 'Bandung', 'S3', 'Dosen Tetap Ilmu Penyakit Dalam Fk Unisba Dosen Klinik/Dokter Tamu Rs Muhammadiyah Bandung                                                                                                        Dosen Klinik/Tamu Rsud Prov Jawa Barat Al Ihsan                                                                                             Dokter Tamu Rs Borromeus Bandung', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 2', 5356, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7767, 2, 'Fatra Radezayansyah, S.T., S.E., M.B.A.', 'Bandung', 'S2', 'Dosen Universitas Sriwijaya                                                                                     Ketua Fraksi Golkar Prd Provinsi Sumatera Selatan                                                       Wakil Ketua Frasi Golkar Drpd Provinsi Sumatera Selatan', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 2', 4326, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7768, 3, 'Dr. Dra. Hj. Fafarina, M.Si.', 'Kotabumi', 'S3', 'Guru SMAn Prokimal Lampung Utara Guru                                                 SMAn 12 Bandung                                                                                                Dosen Universitas Ars Internasional', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 2', 616, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7769, 4, 'Sigit Satryo Wibowo', 'Mataram', 'SMA', 'Pemilik CV. Trikarsa Aksi Mandiri', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 2', 657, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7770, 5, 'Hj. Kania Devi, S.E., M.B.A.', 'Bandung', 'S2', 'Direktur CV. Keenar Lestari', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 2', 1244, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7771, 6, 'Emilia Nurhayati', 'Bandung', 'SMA', 'Owner Mil\'S Cereal Bar                                                                           Owner Vin\'S Coffee                                                                                            Owner Vin\'S Vape                                                                                                 Owner Eaglo Sticker', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 2', 1621, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7772, 1, 'Ayi Romli, S.Ag.', 'Bandung', 'S1', 'Biller PT. Haleyora Powerindo', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 2', 316, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7773, 2, 'Ilmi Javandoda, S.E.', 'Tanjung Bulan', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 2', 131, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7774, 3, 'Sri Soegriyani', 'Tasikmalaya', 'SMA', 'Administrasi CV.Sinta', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 2', 189, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7775, 4, 'Yana Dwiyana Sobirin', 'Sumedang', 'D3', 'Supervisor Pemasaran Asuransi Mnc Life', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 2', 85, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7776, 5, 'Ricki Galih Ginanjar, A.Md.', 'Bandung', 'D3', 'Supervisor PT. Bandar Trisula', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 2', 74, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7777, 6, 'Syifa Lathifah Azhari', 'Garut', 'SMA', 'Direktur CV Nagaya Tech', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 2', 120, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7778, 1, 'Agus Rahmat Salamet', 'Cianjur', 'SMA', 'Diektur PT. Kinarya Maju Sejahtera', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 2', 607, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7779, 2, 'Ade Ihwanudin Latif', 'Bandung', 'SMA', 'Pedagang', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 2', 195, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7780, 3, 'Mira Widyawati, S.H.', 'Bandung', 'S1', 'Kepala Bagian Legal PT. Nyoman Nuarta Art                                              General Affair Manager PT. Nyoman Nuarta Art                                              Dosen Tetap Yayasan Universitas Langlangbuana Bandung', 'Perempuan', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 2', 119, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7781, 4, 'Agus Hermawan, S.E.', 'Bandung', 'S1', 'Wartawan Galmedia', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 2', 225, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7782, 5, 'Ade Subhan Hamzah', 'Bandung', 'D3', 'Manager Operasional (Overseas DePT.) PT.Wijaya Karya, Tbk', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 2', 247, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7783, 6, 'Nenah', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 2', 26, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7784, 1, 'H. Agus Andi Setyawan, S.Pd.I.', 'Bandung', 'S1', 'Anggota Badan Anggaran DPRD Kota Bandung', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 2', 9167, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7785, 2, 'Iwan Hermawan, S.E.Ak.', 'Bandung', 'S1', 'Kepala Sekolah SMA Miftahul Khoir Bandung Anggota DPRD', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 2', 5596, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7786, 3, 'Nunung Nurlia, S.Si.', 'Ciamis', 'S1', 'Guru Luqmanul Hakim', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 2', 1935, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7787, 4, 'Yogi Gustaman, S.T.', 'Cirebon', 'S1', 'Direktur Mi Studio (Konsultan Digital Marketing)', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 2', 1267, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7788, 5, 'Dian Setiyowati, S.Pd.', 'Bandung', 'S1', 'Owner D\'Syilma Kebab', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 2', 1572, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7789, 6, 'H. Aldi Daizona', 'Bandung', 'S1', 'Tenaga Ahli Anggota Dpr Ri', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 2', 3872, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7790, 1, 'Mei Rita Dewi', 'Tanjung Karang', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Nasional', NULL, 'Kota Bandung 2', 46, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7791, 2, 'Yosua Ami Dayan Mt. Hutapea', 'Tarutung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nasional', NULL, 'Kota Bandung 2', 97, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7792, 3, 'Sinda Hasian Siadari', 'Medan', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nasional', NULL, 'Kota Bandung 2', 11, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7793, 4, 'Mahdi', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nasional', NULL, 'Kota Bandung 2', 22, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7794, 1, 'Ni Sayu Tri Parastuti', 'Wonosobo', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 2', 172, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7795, 2, 'Abdul Rohman', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 2', 834, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7796, 3, 'Rachmat Widodo', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 2', 272, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7797, 4, 'Kelpin Firman Taufik', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 2', 29, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7798, 1, 'Pepen Sumpena', 'Bandar Lampung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Garda Republik Indonesia', NULL, 'Kota Bandung 2', 678, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7799, 1, 'Ir. Suryanto', 'Jambi', 'S1', 'Dan Denzibang 3 / Iii / Siliwangi Purnawirawan Tni-Ad', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 2', 1821, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7800, 2, 'Mardius, S.E.', 'Lubuk Linggau', 'S1', 'Pemilik Aqiqahku', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 2', 1658, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7801, 3, 'Tri Andayani, S.T.', 'Bandung', 'S1', 'Pemilik Pangkalan Gas', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 2', 967, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7802, 4, 'Arianto Yuliana', 'Bandung', 'SMA', 'Staff PT. Akar Daya Mandiri', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 2', 388, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7803, 5, 'Fahmi Khoerotunnisa A., S.T.P., M.I.L.', 'Bandung', 'SMA', 'Pemilik Ayam Taliwang Si Tante', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 2', 671, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7804, 6, 'Hari Sinastio', 'Bandung', 'S1', 'Manager Umum PT. Saudaraku', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 2', 302, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7805, 1, 'Hilmi Ali Zahid', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 2', 451, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7806, 2, 'Rustandi', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 2', 69, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7807, 3, 'Raden Roro Hersuparyani Dwiputranti', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Bulan Bintang', NULL, 'Kota Bandung 2', 88, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7808, 4, 'Heni Juheni', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Bulan Bintang', NULL, 'Kota Bandung 2', 109, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7809, 5, 'Dindin Suhardiman', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 2', 190, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7810, 6, 'Yudi Taofani', 'Garut', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 2', 16, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7811, 1, 'Eric Hermansyah', 'Bandung', 'SMA', 'Koordinator Bkm Mitra Sejahtera Lsm               Ketua Dpac Kec.Batununggal Partai Demokat Kepala Bpjk Cab Kota Bandung Partai Demokrat', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 2', 2702, '2025-08-07 20:42:25', '2025-08-07 20:42:25'),
(7812, 2, 'Desi Wulandari, A.Md.Keb.', 'Bandung', 'D3', 'Sekretaris PT. Global Artha Future                                            Marketing Prudential Insurance                                                                Ceo Dw Corporation', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 2', 1291, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7813, 3, 'Zamzam Aqbil Raziqin', 'Bandung', 'SMA', 'Sekretaris Badan Konsultasi Dan Bantuan Hukum Pp Persis                                                                                             Ketua Alumni Ikatan Pelajar Persis                              Sekretaris Bid Hukum Pp Pemuda Persis', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 2', 2341, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7814, 4, 'Riana', 'Bandung', 'SMA', 'Ketua Ika SMAn 14 Bandung                                                Ketua Ika FPT.k Upi Bandung                                            Ketua Lpm Kebonwaru Bandung', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 2', 2273, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7815, 5, 'Hj. Eppy Winaningsih', 'Bandung', 'SMA', 'Direktur CV Tanoshii', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 2', 460, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7816, 6, 'Sumidjan', 'Madiun', 'D1', 'Ketua Ranting Partai Demokrat Kota Bandung Ketua Pac Kiara Condong Dpc Kota Bandung Wk Bendahara Dpc Kota Bandung', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 2', 747, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7817, 1, 'Diah Pitaloka Citaresmi, S.T., M.U.D.D.', 'Bandung', 'Tidak Diketahui', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 2', 4787, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7818, 2, 'Lidia Merciana Suhandi, S.T.', 'Bandung', 'Tidak Diketahui', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 2', 1182, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7819, 3, 'Dodi Rosadi, S.Pd.', 'Bandung', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 2', 416, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7820, 4, 'Okky Firman Abdurachman, S.E.', 'Bandung', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 2', 335, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7821, 5, 'Nani Sumarni, S.E.', 'Bandung', 'Tidak Diketahui', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 2', 124, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7822, 6, 'Herawati', 'Bandung', 'Tidak Diketahui', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 2', 1168, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7823, 1, 'Mochammad Saefulloh Anwar', 'Bandung', 'SMA', 'Aspri Direktorat Pajak                                                                               Direktur CV Tri CiPT.a Perkasa', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 2', 463, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7824, 2, 'Hardy Alexander Kapantow', 'Makkasar', 'SMA', 'Manager PT.Minorco Services Indonesia', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 2', 487, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7825, 3, 'Sri Mulyati, S.T.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 2', 321, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7826, 4, 'Endang Supriadi', 'Subang', 'SMA', 'Owner Pd.Desta Putri', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 2', 117, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7827, 5, 'Rahmawati', 'Rengat', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 2', 63, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7828, 6, 'RuSMAna', 'Bandung', 'SMA', 'KA. Satpam PT. Admiral                                                                                                                                 Anggota Hoel Lengkong', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 2', 78, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7829, 1, 'Cecep Muhamad Yasin', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 2', 930, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7830, 2, 'Asep Toha Abdul Rahman', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 2', 790, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7831, 3, 'E.Siti Rokayah', 'Bandung', 'SMA', 'Pembina Pramuka Kwaran Regol', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 2', 111, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7832, 4, 'Ratih Komala', 'Bandung', 'SMA', 'Sekretaris Wpp Kota Bandung', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 2', 147, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7833, 5, 'Ashwin Hermawan Suganda', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 2', 90, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7834, 1, 'Sri Mulyati', 'Bandung', 'SMA', 'Staff Sikogartap Ii Bandung', 'Perempuan', 'Partai Ummat', NULL, 'Kota Bandung 2', 347, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7835, 2, 'Achmad Nurrizal Pahlevi D', 'Jakarta', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 2', 169, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7836, 3, 'Saeful Hidayat', 'Tasikmalaya', 'SMA', 'Swasta', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 2', 56, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7837, 4, 'Edi Junaedi Karnawiharja', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 2', 77, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7838, 1, 'Aa Abdul Rozak, S.Pd.I., M.Ag.', 'Garut', 'S2', 'Dosen', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 3', 5933, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7839, 2, 'Euis Supriati', 'Bandung', 'SMA', 'Partai Perindo - Ketua Dpd Kota Bandung', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 3', 1363, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7840, 3, 'Ferry Arya Putra, S.H.', 'Bandung', 'S1', 'Divisi Hukum PT. Pos Indonesia', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 3', 635, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7841, 4, 'Emal Rezka, S.E.', 'Bandung', 'S1', 'Direktur PT.Nusa Unggul Pratama', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 3', 371, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7842, 5, 'Rizkiah, S.Hum.', 'Karawang', 'S1', 'Staf Kantor DPW Pkb Jawa Barat', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 3', 171, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7843, 6, 'Wawat Hendrawati', 'Bandung', 'SMA', 'Owner Toko Cendrawasih', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 3', 91, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7844, 7, 'Restu Resmiyati, S.Pd., M.Pd.', 'Sukabumi', 'S2', 'Owner Beauty Ra Care', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 3', 1040, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7845, 8, 'Asep Suryana', 'Bandung', 'SMA', 'Owner Wedding', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 3', 259, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7846, 1, 'Fitri Ramdana Yanti, S.Sos.', 'Bandung', 'S1', 'Staff Adm PT. Artholink', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 3', 3395, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7847, 2, 'Drs. Edi Haryadi, M.Si.', 'Bandung', 'S2', 'Kabag Pembangunan SDA Pemkot Bandung', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 3', 5417, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7848, 3, 'Asep Robin, S.H., M.H.', 'Tasikmalaya', 'S2', 'Direktur Utama PT. Pakuan', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 3', 8937, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7849, 4, 'Edwin Burhanudin', 'Majalaya', 'D3', 'Direktur PT. Skyindo OPT. Ima', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 3', 834, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7850, 5, 'Rika Rahmawati', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 3', 1056, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7851, 6, 'Dawny Elang Iswanto', 'Jakarta', 'SMA', 'Direktur Utama PT. Balia Cipta Kreatif', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 3', 1183, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7852, 7, 'Dra. Eli Suliah, M.M.Pd.', 'Bandung', 'S2', 'Kepala Sekolah SDS', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 3', 635, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7853, 8, 'Duana Permadi, S.A.P.', 'Bandung', 'S1', 'Wakil Ketua DPC Partai Gerindra Kota Bandung', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 3', 2011, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7854, 1, 'H. Aries Supriyatna, S.H., M.H.', 'Bandung', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 3', 8396, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7855, 2, 'Iin Lina Yuliana, A.Md.', 'Garut', 'D3', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 3', 1096, '2025-08-07 20:43:05', '2025-08-07 20:43:05');
INSERT INTO `legislatifs` (`id`, `no_urut`, `nama_lengkap`, `tempat_lahir`, `riwayat_pendidikan`, `riwayat_pekerjaan`, `jenis_kelamin`, `nama_partai`, `logo_partai`, `dapil`, `suara_sah`, `created_at`, `updated_at`) VALUES
(7856, 3, 'Geger Susanto', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 3', 1363, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7857, 4, 'Leonardus Luber S', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 3', 2560, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7858, 5, 'Dede KuSMAra, S.Ip., M.Pd.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 3', 2342, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7859, 6, 'Cita Amalia, S.Sos.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 3', 737, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7860, 7, 'Achdiat Kartamihardja, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 3', 379, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7861, 8, 'Endang Darmaayu', 'Tasikmalaya', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 3', 172, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7862, 1, 'Iqbal Mohamad USMAn, S.I.P., S.H.', 'Tidak Diketahui', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 3', 14066, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7863, 2, 'Dra. Hj. Teni Kartini, M.M.', 'Kota Banung', 'S2', 'Wiraswasta', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 3', 3703, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7864, 3, 'Uyung Rommy Zulkarnain Putra, S.T.', 'Bandung', 'S1', 'Direktur Utama PT. Bersama Dengan Gemilang', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 3', 1919, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7865, 4, 'Wawan Gunawan', 'Bandung', 'SMA', 'Manager PT. Trisandi', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 3', 1355, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7866, 5, 'Ridwan, S.E.', 'Kota Bandung', 'SMA', 'Pelaksana Kesra Kota Bandung', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 3', 1636, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7867, 6, 'Melinda Lorenza, S.H.', 'Kota Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 3', 479, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7868, 7, 'Riny Fitriyani', 'Bandung', 'SMA', 'Prof. Dr. Dr. Benny Hasan Spog', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 3', 336, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7869, 8, 'Adimas Putra Yudi, S.I.Kom.', 'Kota Bandung', 'S1', 'Wiraswasta', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 3', 223, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7870, 1, 'Rendiana Awangga', 'Bandung', 'SMA', 'Anggota DPRD Kab/Kota', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 3', 13175, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7871, 2, 'Dandan Dede Amung Sutarya, S.Sos.', 'Subang', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 3', 2723, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7872, 3, 'Poetrena Oneal, S.I.Kom.', 'Dili', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 3', 364, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7873, 4, 'Entang Suryaman, S.H.', 'Bandung', 'S1', 'Anggota DPRD Kab/Kota', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 3', 3473, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7874, 5, 'Antoni Sitompul', 'Palembang', 'SMA', 'Pemilik CV Barokah Sinergi Jaya', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 3', 690, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7875, 6, 'R. Roosilawati, S.S.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 3', 149, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7876, 7, 'Tjetjep Suherman, B.E., S.Sos.', 'Sumedang', 'S1', 'Direktur Teknik CV Sawargi Raya', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 3', 490, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7877, 8, 'Deden Mardeni, B.E.', 'Bandung', 'D3', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 3', 487, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7878, 1, 'Riyanto', 'Purworejo', 'SMA', 'Ketua Bidang Partai Buruh', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 3', 230, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7879, 2, 'Yudi Yuliana', 'Bandung', 'SMA', 'Group Leader PT. Grand Textile Industry', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 3', 132, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7880, 3, 'Devi Wilianti Rudiansih, A.Ma.', 'Bandung', 'D2', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 3', 153, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7881, 4, 'Rian Darmawan', 'Bandung', 'SMA', 'Owner Freaks Merch', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 3', 67, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7882, 5, 'Budhi Setiawan, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 3', 168, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7883, 6, 'Susi Ratnasari', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 3', 104, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7884, 7, 'Decky Rizki', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 3', 31, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7885, 8, 'Siti Sofiah', 'Ntt', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 3', 91, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7886, 1, 'Dadang Hermanto, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 3', 481, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7887, 2, 'Desri Derica', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 3', 142, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7888, 3, 'Eko Ujianto, S.Sos.', 'Magelang', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 3', 297, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7889, 4, 'Hj. Dewi Lizna H, S.E.Ak, Ca.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 3', 312, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7890, 5, 'Satria Megha Prassila, A.Md.', 'Majalengka', 'D3', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 3', 61, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7891, 6, 'Madin, S.E.', 'Garut', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 3', 86, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7892, 7, 'H. Mohammad Iqbal, Lc.', 'Ciamis', 'S1', 'Manager Umroh Bess Finance Syariah Jabar', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 3', 177, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7893, 8, 'Yuriansah', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 3', 199, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7894, 1, 'Ahmad Rahmat Purnama, A.Md.', 'Yogyakarta', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 3', 7676, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7895, 2, 'Hj. Siti Nurjanah, S.S.', 'Bandung', 'S1', 'Anggota DPRD Kab/Kota', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 3', 6690, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7896, 3, 'H. Agus Gunadi ISMAil, S.T.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 3', 3963, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7897, 4, 'Drg. Susi Sulastri', 'Bandung', 'S1', 'Anggota DPRD Kab/Kota', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 3', 11862, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7898, 5, 'Prayitno, S.Si.', 'Purworejo', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 3', 2959, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7899, 6, 'Ir. Slamet Sutikno', 'Ungaran', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 3', 1306, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7900, 7, 'Dini Wahyuni, S.S.', 'Bandung', 'S1', 'Pemilik CV. Salma Fajar Pratama', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 3', 4001, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7901, 8, 'Ridwan Nurdin Mufti, S.I.Kom.', 'Bandung', 'S1', 'Manager Advokasi Dapil Kantor Komunikasi Dan Informasi Ledia Hanifa Amaliah', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 3', 4803, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7902, 1, 'Mardiah Abuzar', 'Jambi', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 3', 25, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7903, 2, 'Muhammad Rizaldi Hendriawan', 'Malang', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 3', 17, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7904, 3, 'Daniel Sinaga', 'Tarutung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 3', 39, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7905, 4, 'Rahmawati', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 3', 22, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7906, 5, 'Dede Lukman', 'Idramayu', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 3', 19, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7907, 1, 'Drs. Yana Rusmulyana, M.Si.', 'Sumedang', 'S2', 'Pegawai Negeri Sipil / Aparatur Sipil Negara', 'Laki-laki', 'Partai Hati Nuranai Rakyat', NULL, 'Kota Bandung 3', 394, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7908, 2, 'Ahmad Dinar, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nuranai Rakyat', NULL, 'Kota Bandung 3', 57, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7909, 3, 'Indri SePT.iani', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Hati Nuranai Rakyat', NULL, 'Kota Bandung 3', 61, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7910, 4, 'Tata Setiawan, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nuranai Rakyat', NULL, 'Kota Bandung 3', 91, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7911, 5, 'Rakha Adiprabawa Hendratman', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nuranai Rakyat', NULL, 'Kota Bandung 3', 53, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7912, 6, 'Syifa Yulianti', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Hati Nuranai Rakyat', NULL, 'Kota Bandung 3', 27, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7913, 7, 'Marjanuddin Hilmy', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nuranai Rakyat', NULL, 'Kota Bandung 3', 24, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7914, 1, 'Ayi Risnawati', 'Sukabumi', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partao Garda Republik Indonesia', NULL, 'Kota Bandung 3', 141, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7915, 2, 'Windy Widiahastuti', 'Bekasi', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partao Garda Republik Indonesia', NULL, 'Kota Bandung 3', 165, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7916, 1, 'Raden Kiki Kristiana Muharam', 'Bandung', 'SMA', 'Manager Qq Advertesing', 'Laki-laki', 'Partai Amanat Nasioanal', NULL, 'Kota Bandung 3', 2350, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7917, 2, 'Mansurya Manik, S.Pd.', 'Bukit Lawang Langkat', 'S1', 'Anak Buah Kapal PT. Pupuk Sriwijaya Palembang', 'Laki-laki', 'Partai Amanat Nasioanal', NULL, 'Kota Bandung 3', 704, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7918, 3, 'Adinda Natissa Serravina, S.S., M.Pd.', 'Bandung', 'S2', 'Digital Marketing Marema Properti', 'Perempuan', 'Partai Amanat Nasioanal', NULL, 'Kota Bandung 3', 835, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7919, 4, 'Mohamad Hamonangan Situmorang', 'Bandung', 'SMA', 'Direktur Utama Percetakan CV Sumberwadir', 'Laki-laki', 'Partai Amanat Nasioanal', NULL, 'Kota Bandung 3', 810, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7920, 5, 'Rima Ganea Syafa, A.Md.', 'Garut', 'D3', 'Admin PT. Mensa Bina Sukses', 'Perempuan', 'Partai Amanat Nasioanal', NULL, 'Kota Bandung 3', 375, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7921, 6, 'Erwin Bayu Ramdhani', 'Bandung', 'SMA', 'Direktur CV Braga Bagus', 'Laki-laki', 'Partai Amanat Nasioanal', NULL, 'Kota Bandung 3', 246, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7922, 7, 'Novista Nur Astridasari, S.Sos., M.Pd.', 'Bandung', 'S2', 'Pemilik Toko Vigatama', 'Perempuan', 'Partai Amanat Nasioanal', NULL, 'Kota Bandung 3', 411, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7923, 8, 'H. Yanyan Sopiyan, Lc.', 'Serang', 'SMA', 'Pemilik PT. Sadayanab Berkah Sinergi', 'Laki-laki', 'Partai Amanat Nasioanal', NULL, 'Kota Bandung 3', 348, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7924, 1, 'Romdi Permana, B.E.', 'Garut', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 3', 237, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7925, 2, 'Irma Agustriani', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Bulan Bintang', NULL, 'Kota Bandung 3', 102, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7926, 3, 'Sri Rini Sulastri', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Bulan Bintang', NULL, 'Kota Bandung 3', 80, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7927, 1, 'Asep Dikdik Herdian', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 3', 1911, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7928, 2, 'H. Aos Wijaya Akhmad Bintang, S.E., M.Si.', 'Ciamis', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 3', 1724, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7929, 3, 'Mega Handayani', 'Lampung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 3', 618, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7930, 4, 'Aswan Asep Wawan', 'Bandung', 'SMA', 'Wakil Direktur', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 3', 5161, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7931, 5, 'Catur Intan Deastuti', 'Serang', 'D3', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 3', 1568, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7932, 6, 'Tanu Wijaya', 'Garut', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 3', 1982, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7933, 7, 'Ponirah Kartika Rahayu, S.H., M.Kn.', 'Cilacap', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 3', 440, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7934, 8, 'Willy Santoso, S.I.Kom.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 3', 198, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7935, 1, 'Gina Mardiana, S.I.Kom.', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 3', 2428, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7936, 2, 'Sihombing, Jagar Naibaho', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 3', 1097, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7937, 3, 'Corfied Margetan, S.Kom.', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 3', 271, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7938, 4, 'Sepwan Syahrial Anwar', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 3', 540, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7939, 5, 'Richy Suffrianto', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 3', 138, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7940, 6, 'Anna O.M Waang Lona, S.Ak.', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 3', 190, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7941, 7, 'Kirman', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 3', 88, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7942, 8, 'Yovan Fabian', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 3', 161, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7943, 1, 'Ir. Heri Sismoro, S.T., M.T.', 'Tegal', 'S3', 'Direktur Utama PT.Golden Asia Abadi', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 3', 454, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7944, 2, 'John Binsar Tua Simalango, S.Kom., M.M.', 'Jakarta', 'S2', 'Mis Manager PT. Meprofarm Bandung', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 3', 3312, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7945, 3, 'Asih Supartini', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 3', 130, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7946, 4, 'Irfan Niti Sasmita', 'Sukabumi', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 3', 106, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7947, 5, 'Awang Kelana', 'Bandung', 'SMA', 'Foreman PT. Astra Internasional', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 3', 93, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7948, 6, 'Nur Astri Budiarti', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 3', 119, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7949, 7, 'Arief Santoso, A.Md.', 'Bekasi', 'D3', 'Koordinator Reses DPRD Kota Bandung Umkm Binaan Dekranasda Jawa Barat', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 3', 68, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7950, 8, 'Oloan Junjunan Situmorang', 'Bandung', 'D3', 'Owner CV. Situmorang', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 3', 105, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7951, 1, 'Endang Suherman', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 3', 1082, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7952, 2, 'Hamzah Hayatulloh, S.Sos.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 3', 1843, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7953, 3, 'Rahmi Fitriyah, S.Pd.', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 3', 303, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7954, 4, 'Agida Hafsyah Febriagivary', 'Bandung', 'S1', 'Guru Rumah Ke-2Ku', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 3', 104, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7955, 5, 'Budi LeSMAna, S.Sy.', 'Bandung', 'S1', 'Pimpinan Umum Pondok Pesantren Sabiilul Huda', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 3', 494, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7956, 6, 'Airlangga Prasadana Putra', 'Bandung', 'Tidak Diketahui', 'Supervisor PT. Persib Bandung Bermartabat', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 3', 93, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7957, 7, 'Anies Taufik Anggakusumah, S.Par.', 'Bandung', 'S1', 'Kepala Produksi Anargya Pro', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 3', 215, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7958, 8, 'Ifad Fadli Roudhi, S.I.Kom.', 'Bandung', 'S1', 'Owner Tb. Ar Raudhi', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 3', 1671, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7959, 1, 'Sidny Adam', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 3', 203, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7960, 2, 'Ir. Euis Atik Kartika', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Ummat', NULL, 'Kota Bandung 3', 124, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7961, 3, 'Dedi Sarnama, S.Ag.', 'Pandeglang', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 3', 274, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7962, 4, 'Muchtar Zaini, S.Sos.', 'Palembang', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 3', 132, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7963, 5, 'R. Yanti Rafianti', 'Padang', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Ummat', NULL, 'Kota Bandung 3', 29, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7964, 6, 'Mochamad Ridwan Andjali', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 3', 146, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7965, 7, 'Nirwan Alamsah, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 3', 255, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7966, 1, 'Jajang Jamaludin, M.Sy.', 'Ciamis', 'S2', 'Dosen Universitas Gunadarma', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 4', 3121, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7967, 2, 'Dra. Rokhayati, M.M.Pd.', 'Tegal', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 4', 1702, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7968, 3, 'H. Agus Nugraha ISMAil, S.T.', 'Bandung', 'S1', 'Petani', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 4', 3114, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7969, 4, 'Kiki Muhamad Mulyadi, S.Ak.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 4', 887, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7970, 5, 'Ramdan, S.Pd., M.Si.', 'Bandung', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 4', 532, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7971, 6, 'Nur Auliya Rakhma', 'Lumajang', 'SMA', 'Owner Rly (2022–2023)', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 4', 251, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7972, 7, 'USMAn Rahmat', 'Bandung', 'SMA', 'Ketua Komisi B Di DPRD Kota. Bandung (2019-2024)', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 4', 621, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7973, 1, 'Nunung Nurasiah, S.Pd.', 'Pandeglang', 'S1', 'Anggota DPRD Kabupaten Bandung Di Komisi B (2019–2024)', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 4', 7171, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7974, 2, 'Heru Sugiatno', 'Bandung', 'SMA', 'Manager Marketing CV. Mega Buana (1997–2015)\nManager Operasional PT. Macakal Mandala Sakti (2015–2024)', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 4', 2399, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7975, 3, 'Raden Muhammad Basjir Khan', 'Bandung', 'SMA', 'Direktur Droplets (2011-2024)', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 4', 3491, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7976, 4, 'Didin Samsudin, S.H., M.Si.', 'Bandung', 'SMA', 'Kasi Lurah Kelurahan Padasuka (1984-2020', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 4', 2307, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7977, 5, 'Theresia Seto Chandra', 'Bengkulu', 'D2', 'Finance Manager PT. Jayakusuma (1989–1994)\nAgency Manager Bni Life (2010–2013)\nDistrict Manager Zurich Life (2013–2015)\nDirektur PT. Gita Putra (2015–2023)', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 4', 954, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7978, 6, 'Dadang Chaerul Arif', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 4', 578, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7979, 7, 'Muhammad Zidane Nauval Izlal', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 4', 3597, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7980, 1, 'H. R Iwan Darmawan', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 4', 2330, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7981, 2, 'H. Sutaya, S.H., M.H.', 'Klaten', 'S2', 'Anggota DPRD Kab/Kota', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 4', 6044, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7982, 3, 'Riesca Ratna Djuwita, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 4', 1085, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7983, 4, 'Ganjar Kurniawan', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 4', 1178, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7984, 5, 'H. Ate Solichin Kosasih', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 4', 1950, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7985, 6, 'Herawati Tambunan', 'Labuhan Tambunan', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 4', 1253, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7986, 7, 'Vimby Bhakti Adikusumah, S.E.', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 4', 1108, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7987, 1, 'Dr. H. Edwin Senjaya, S.E., M.M.', 'Kota Bandung', 'S3', 'Ketua Umum Pengprov Wushu Jawa Barat', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 4', 10671, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7988, 2, 'Dudun Holidin', 'Kota Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 4', 5446, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7989, 3, 'Hj. Yetty Katmawati, S.Sos.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 4', 2903, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7990, 4, 'Dadan Wirahadikusuma, S.T., M.M.', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 4', 2425, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7991, 5, 'Nina Setiani K, S.H.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 4', 451, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7992, 6, 'Ekky El Hakim, S.H.Int.', 'Jakarta', 'S1', 'Wiraswasta', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 4', 308, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7993, 7, 'Muhammad Ilham Pratama Putra, S.H.', 'Kota Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 4', 549, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7994, 1, 'Asep Sudrajat, S.A.P.', 'Bandung', 'S1', 'Anggota Legislatif DPRD Kota Bandung', 'Laki-laki', 'Partai Nasional Demokrat', NULL, 'Kota Bandung 4', 4473, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7995, 2, 'Adiguna', 'Bandung', 'SMA', 'Direktur CV Deli Kue Dewata', 'Laki-laki', 'Partai Nasional Demokrat', NULL, 'Kota Bandung 4', 4144, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7996, 3, 'Ir. Yati Lismiati', 'Cimahi', 'S1', 'Direktur CV Hans Pratama', 'Perempuan', 'Partai Nasional Demokrat', NULL, 'Kota Bandung 4', 1186, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7997, 4, 'Irwan Suryaman Rukman, S.E.', 'Bandung', 'S1', 'Komisaris Direktur PT. Pratama Surya Gerha', 'Laki-laki', 'Partai Nasional Demokrat', NULL, 'Kota Bandung 4', 921, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7998, 5, 'H. Dadan Ramdani, S.T.', 'Bandung', 'S1', 'Direktur PT. Dara Cipta Persada', 'Laki-laki', 'Partai Nasional Demokrat', NULL, 'Kota Bandung 4', 4385, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(7999, 6, 'Conny Chusniaty Trirahayu, S.Pd.', 'Jakarta', 'S1', 'Kepala Sekolah Tk Daya Wanita Iii', 'Perempuan', 'Partai Nasional Demokrat', NULL, 'Kota Bandung 4', 446, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8000, 7, 'Slamet Agus Priono, S.H., M.Si.', 'Bandung', 'S2', 'Sekretaris Satpol PP Kota Bandung', 'Laki-laki', 'Partai Nasional Demokrat', NULL, 'Kota Bandung 4', 642, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8001, 1, 'Mamun', 'Bandung', 'SMA', 'Operator PT. Lawe Adyaprima', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 4', 248, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8002, 2, 'Razu Firmansyah, S.T.', 'Bandung', 'S1', 'Driver Shopeefood', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 4', 265, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8003, 3, 'Lia Julaeha', 'Tasikmalaya', 'D1', 'Impressions Body Care', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 4', 129, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8004, 4, 'Muhammad Yan Setiawan', 'Bogor', 'SMA', 'Karyawan Swasta', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 4', 89, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8005, 5, 'Arni Suminarni', 'Bandung', 'SMA', 'Qc PT. Nagotatek', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 4', 47, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8006, 6, 'Sheila Nur Fadilah', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 4', 122, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8007, 1, 'Mulyadi, S.E.', 'Bandung', 'S1', 'Dan Legal PT. Primarindo Asia Infrastructure Tbk', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 4', 1665, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8008, 2, 'Tedi', 'Bandung', 'SMA', 'Teknisi PT. Hergatex', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 4', 294, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8009, 3, 'Merry Ajeng Putri Dewi', 'Denpasar', 'S1', 'Direktur Utama PT. Merrys Tour And Travel Jawa Barat', 'Perempuan', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 4', 79, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8010, 4, 'Iman Harjono, S.E., M.Ak.', 'Pekalongan', 'S1', 'Finance & Accounting Controller Pulau Umang Resort & Hotel', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 4', 178, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8011, 5, 'Dede Ali', 'Garut', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 4', 268, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8012, 6, 'Lindawati', 'Bandung', NULL, 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 4', 35, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8013, 7, 'Muhammad Diki Feriandi, S.Sos.', 'Bandung', 'S1', 'Marketing PT. Tetra Oetama Putra', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 4', 163, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8014, 1, 'H. Andri RuSMAna, S.Pd.I.', 'Garut', 'S1', 'Ketua Badan Kehormatan DPRD Kota Bandung', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 4', 13650, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8015, 2, 'Taufiq Rizqon', 'Klaten', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 4', 4911, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8016, 3, 'Ratna Indriasari, S.Pd.I.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 4', 4598, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8017, 4, 'Jefri Akhmad Arifianto, S.T.', 'Pontianak', 'S1', 'Manajer CV Dapur Pulsa', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 4', 3171, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8018, 5, 'Intan Samira, S.E.', 'Bandung', 'S1', 'Pengajar Dan Wakil Bendahara TKA/TPA/TQA Ar Risalah', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 4', 1995, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8019, 6, 'Elton Agus Marjan', 'Bandung', 'SMA', 'Pemilik Pelangi Ceria Preschool', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 4', 5189, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8020, 7, 'Suhastin Santyati', 'Bandung', 'SMA', 'Owner Elfira Real Pro', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 4', 472, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8021, 1, 'Hand Mart Yeni', 'Kubang', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 4', 15, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8022, 2, 'Mohamad Reza Denia Fajar Buana', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 4', 255, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8023, 3, 'Agung Kurniawan', 'Bogor', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 4', 13, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8024, 4, 'Hadi Sunandi', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 4', 12, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8025, 5, 'Linda Tidja', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 4', 20, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8026, 6, 'Yayan Taryana', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 4', 7, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8027, 7, 'Yusnan Taripar Ranto', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 4', 6, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8028, 1, 'Tiara Yogapraananta, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 4', 1114, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8029, 2, 'Drs. Iwan Nuriswanto', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 4', 127, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8030, 3, 'Dadang Hermawansyah', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 4', 107, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8031, 4, 'Nissa Rosari, Sst.Par.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 4', 78, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8032, 5, 'R. Donny Permady, S.I.P.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 4', 61, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8033, 1, 'Gatot Supriyo, S.H', 'Bandung', 'S1', 'Pejabat/Karyawan Bumn/Bumd', 'Laki-laki', 'Partai Garda Republik Indonesia', NULL, 'Kota Bandung 4', 661, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8034, 1, 'H. Asep Sudarma Adjie, S.Si', 'Bandung', 'S1', 'Pemilik CV. Sukses Damai Mandiri', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 4', 2340, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8035, 2, 'H. Raden Gumilar, S.T., M.T.', 'Jakarta', 'S2', 'Kepalan Program Studi Teknik Geodesi Universitas Winaya Mukti', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 4', 935, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8036, 3, 'Susi Priyarsi', 'Bandung', 'SMA', 'Pelaksana PT. Inti', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 4', 552, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8037, 4, 'M. Arif Rahman, S.H.', 'Tasikmalaya', 'S1', 'Staff Marketing Pd. Jawi', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 4', 631, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8038, 5, 'Dita Floranti Handini', 'Amerika Serikat', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 4', 243, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8039, 6, 'Raden Muhammad Taufik Hidayat Sutadisastra, S.E., M.Ak., Ak.,Ca.', 'Bandung', 'S2', 'Tenaga Ahli Kped', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 4', 1040, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8040, 7, 'Rina Susiana', 'Bandung', 'SMA', 'Direktis CV Shahnaz', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 4', 170, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8041, 1, 'Asep Supriyatna', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 4', 178, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8042, 2, 'Uus Surachmat', 'Bandung', NULL, 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 4', 324, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8043, 3, 'Diana Anggayani', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Bulan Bintang', NULL, 'Kota Bandung 4', 40, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8044, 4, 'Dylan Muhamad Raihan', 'Jakarta', NULL, 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 4', 61, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8045, 1, 'Dr. Rini Ayu Susanti, S.E., M.Pd.', 'Bandung', 'SMA', 'Anggota DPRD Kab/Kota', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 4', 3462, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8046, 2, 'Mukhamad Adi Widyanto', 'Pasuruan', 'SMA', 'Pemilik/Direktur Utama PT. Tabia Cosmindo', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 4', 7292, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8047, 3, 'R. Darwin Suratman, S.T., M.A.P., Aifo.', 'Sukabumi', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 4', 1001, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8048, 4, 'Yulia Listianti, A.Ks., M.M.', 'Bandung', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 4', 599, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8049, 5, 'Amir Hidayat, S.E.', 'Bojonegoro', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 4', 527, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8050, 6, 'Dr. Hj. Minda Patriah, S.T., M.Pd.I.', 'Jakarta', 'S3', 'Pembina Sekolah Anak Jalanan \"Senja\" Kota Bandung', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 4', 1053, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8051, 7, 'Deden Taufiq Hartawan, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 4', 241, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8052, 1, 'Indri Hafsari, S.P.', 'Tidak Diketahui', 'S1', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 4', 1523, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8053, 2, 'Tommy Ramadhani', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 4', 466, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8054, 3, 'Irman Budiawan', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 4', 216, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8055, 4, 'Agus Budiyono, S.S., M.Th.', 'Tidak Diketahui', 'S2', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 4', 571, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8056, 5, 'Daniel Christianto, A.Md.', 'Tidak Diketahui', 'D3', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 4', 1391, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8057, 6, 'Tias Citra Mawarni', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 4', 315, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8058, 7, 'Budi Erdiansjah', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 4', 100, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8059, 1, 'Eri Kurnia Febri Fahrozi', 'Bandung', 'SMA', 'Pegawai CV Jatidiri', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 4', 399, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8060, 2, 'Rafi Reinard Octavaranza', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 4', 195, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8061, 3, 'Lisda Komala', 'Bandung', 'D1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 4', 226, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8062, 4, 'Raden Budi Santosa', 'Bandung', 'SMA', 'Chef Hyatt Hotel', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 4', 8, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8063, 5, 'Agus Budiman, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 4', 100, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8064, 6, 'Devi Rosaria Indah', 'Jakarta', 'SMA', 'Owner CV Jatidiri', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 4', 133, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8065, 7, 'Ramdhani Fitriyansyah, S.E.', 'Bandung', 'S1', 'Manager Bank BJB', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 4', 245, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8066, 1, 'Dr. H. Iyad Suryadi, M.M.', 'Garut', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 4', 776, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8067, 2, 'Deden Zaenal Mutaqin, A.Md.', 'Bandung', 'D3', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 4', 808, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8068, 3, 'Elin Nurasiah, S.Pd.', 'Tasikmalaya', 'S1', 'Kepala Sekolah KB AI Murnasaniyyah', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 4', 393, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8069, 4, 'Gun Gun Guruh Lahardi, S.Sos.I.', 'Tasikmalaya', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 4', 454, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8070, 5, 'Tri Herru Wahyudi', 'Jakarta', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 4', 34, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8071, 6, 'Ra.A Ekasari, B.A.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 4', 44, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8072, 7, 'Sindy Fitriana', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 4', 142, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8073, 1, 'Drs. Yayat Sukayat As', 'Subang', 'S1', 'Pengusaha Swasta', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 4', 581, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8074, 2, 'Muhamad Nawawi, S.Pd.', 'Cianjur', 'S1', 'Pengusaha Swasta', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 4', 521, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8075, 3, 'Eka Linda Handayani', 'Bekasi', 'D3', 'Pengusaha Swasta', 'Perempuan', 'Partai Ummat', NULL, 'Kota Bandung 4', 62, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8076, 4, 'Mochamad Sobar, S.Pd.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 4', 179, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8077, 5, 'Lulu Khulwatul Jannah Asrin, S.P.', 'Bandung', 'S1', 'Pengusaha Swasta', 'Perempuan', 'Partai Ummat', NULL, 'Kota Bandung 4', 74, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8078, 6, 'Tito Adiwibowo, S.T.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 4', 99, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8079, 1, 'Asep Mahyudin, S.Ag.', 'Kota Bandung', 'S1', 'Anggota DPRD Kota Bandung Dari Partai Kebangkitan Bangsa', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 5', 5767, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8080, 2, 'Soni Daniswara', 'Kota Bandung', 'SMA', 'Borneo Flasher Indonesia', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 5', 9362, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8081, 3, 'Eva Noer Jumariah', 'Kota Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 5', 302, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8082, 4, 'Muhamad Yazid', 'Kota Bandung', 'Smk', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 5', 477, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8083, 5, 'Wawan Ruswan, S.H.', 'Kota Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 5', 171, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8084, 6, 'Ana Triana Muslimah', 'Kota Bandung', 'Smk', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 5', 186, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8085, 1, 'Agus Hermawan, S.A.P.', 'Tasikmalaya', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 5', 3592, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8086, 2, 'Sugianto, S.H.', 'Bandung', 'Tidak Diketahui', 'CV Catur Media', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 5', 2918, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8087, 3, 'Evi Diana, S.E.', 'Bandung', 'S1', 'PSSI Pusat', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 5', 1226, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8088, 4, 'Dang Heri Mukti, S.H.', 'Bandung', 'S1', 'CV Putrajaya', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 5', 2875, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8089, 5, 'Raden Rendy Ginandjar Sutarman', 'Bandung', 'SMA', 'CV Alfariri Putra Mandiri', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 5', 1191, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8090, 6, 'Megiawati Rahayu, A.Md.', 'Bogor', 'D3', 'PT. Sukses Pratama Mandiri', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 5', 400, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8091, 1, 'Folmer Siswanto Maruhum Silalahi', 'Jakarta', 'S1', 'Anggota DPRD Kab/Kota', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 5', 4817, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8092, 2, 'Deni Priatna', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 5', 967, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8093, 3, 'Diah Permata Saraswati. S.I.Kom.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 5', 1949, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8094, 4, 'Mohamad Ariodillah, S.I.P.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 5', 943, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8095, 5, 'Rida Aisah, S.E.', 'Garut', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 5', 268, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8096, 6, 'Andri Gunawan', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 5', 6584, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8097, 1, 'Muhammad Reza Panglima Ulung', 'Kota Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 5', 5865, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8098, 2, 'Sofyanudin Syarif, Sm.Hk.', 'Garut', 'S1', 'Fraksi', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 5', 2261, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8099, 3, 'Hj. Dewi Heryani, S.H.', 'Kota Bandung', 'S1', 'Tidak Diketahui', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 5', 1524, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8100, 4, 'Lia Aprilia, S.Pd., M.M.', 'Bandung', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 5', 3970, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8101, 5, 'Deni Suhandani', 'Kota Bandung', 'Smk', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 5', 976, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8102, 6, 'Jalasenastri Saprala, S.I.Kom.', 'Kuningan', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 5', 163, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8103, 1, 'Dr. Rian Kurniawan, S.E., M.M.', 'Cirebon', 'S3', 'Dosen Tetap', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 5', 2096, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8104, 2, 'Kang Komar Bebeb', 'Banten', 'SMA', 'Trans Tv', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 5', 837, '2025-08-07 20:43:05', '2025-08-07 20:43:05');
INSERT INTO `legislatifs` (`id`, `no_urut`, `nama_lengkap`, `tempat_lahir`, `riwayat_pendidikan`, `riwayat_pekerjaan`, `jenis_kelamin`, `nama_partai`, `logo_partai`, `dapil`, `suara_sah`, `created_at`, `updated_at`) VALUES
(8105, 3, 'Imas Nurjanah', 'Bandung', 'SMA', 'PT. Tira Jakarta', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 5', 624, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8106, 4, 'Drs. Asep Suhendra', 'Bandung', 'S1', 'CV. Media Jasa Utama', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 5', 3728, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8107, 5, 'Reksipesi Zekiazhi, A.Md', 'Tanjung Enim', 'D3', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 5', 42, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8108, 6, 'Bora Akbar Alistian', 'Kota Bandung', 'SMA', 'Rumah Makan Bugel', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 5', 843, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8109, 1, 'Iwan Setiawan', 'Metro', 'SMA', 'PT. Haleyora Powerindo', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 5', 254, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8110, 2, 'Ria Beti Novianty', 'Bandung', 'SMA', 'PT. Haleyora Powerindo', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 5', 95, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8111, 3, 'Rusmono', 'Cirebon', 'SMA', 'PT. Masterindo Jaya Abadi', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 5', 56, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8112, 4, 'Ratna Juwitawati', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 5', 69, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8113, 5, 'Iis ISMAwati', 'Garut', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 5', 59, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8114, 1, 'Jajang Sunarto', 'Ciamis', 'SMA', 'CV. Lestari', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 5', 185, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8115, 2, 'Darmawansyah', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 5', 209, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8116, 3, 'Tika Handriani', 'Bandung', 'SMA', 'Tokyo Maree Insurance', 'Perempuan', 'Partai Gelora', NULL, 'Kota Bandung 5', 248, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8117, 4, 'Thomas Nasrulloh', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 5', 124, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8118, 5, 'Mohamad Hayun, S.E.', 'Bandung', 'S1', 'Algipin', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 5', 83, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8119, 6, 'Mulyati', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Gelora', NULL, 'Kota Bandung 5', 493, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8120, 1, 'H. Asep Mulyadi, S.H.', 'Ciamis', 'D3', 'DPRD Kota Bandung', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 5', 9001, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8121, 2, 'H. Sandi Muharam, S.E.', 'Kota Bandung', 'S1', 'DPRD Kota Bandung', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 5', 5060, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8122, 3, 'Shopa Mujahidah, S.I.Pol.', 'Cianjur', 'S1', 'Pkbm Sekolah Insan Kreatif', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 5', 1423, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8123, 4, 'Kastaniah', 'Samarinda', 'SMA', 'Karya CiPT.a Yasa (KCY)', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 5', 1914, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8124, 5, 'Dwianto Hari Prabowo', 'Bandung', 'SMA', 'Armindo Grup', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 5', 1122, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8125, 6, 'Drs. Musa Muhammad Ahmad, M.E.Sy.', 'Kota Bandung', 'S2', 'STIE Muhammadiyah Bandung/UMB', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 5', 1870, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8126, 1, 'Niko Petrus Fransisco Aritonang', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 5', 99, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8127, 2, 'Nurunisa Nanda Fadila', 'Kebumen', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 5', 10, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8128, 3, 'Fegi Prastia Vitalis', 'Cimahi', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 5', 13, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8129, 4, 'Yohanes Jeffersen Yonathan Mambu', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 5', 49, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8130, 1, 'Asep Riyadi, S.E.', 'Garut', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 5', 142, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8131, 2, 'Ratna Yulia', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 5', 173, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8132, 3, 'Rangga Putra Samudra', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 5', 61, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8133, 4, 'Ricky Rusdhiyana, S.Sos.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 5', 86, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8134, 5, 'Puji Yanti', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 5', 17, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8135, 1, 'Tenny Yartini', 'Garut', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Garda Republik Indonesia', NULL, 'Kota Bandung 5', 119, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8136, 2, 'Alex Sahdan Guntara', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Garda Republik Indonesia', NULL, 'Kota Bandung 5', 65, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8137, 1, 'Aviv Nugraha, S.I.P.', 'Bandung', 'S1', 'Danan Jaya', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 5', 1553, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8138, 2, 'Epa Paridah, S.H.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 5', 611, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8139, 3, 'Dindin Wahyudin, S.E.', 'Bandung', 'S1', 'Pangkalan Gas', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 5', 560, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8140, 4, 'Moh Yamin, S.Sos., M.M.', 'Garut', 'S2', 'CV Nusa Rencana Abadi', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 5', 699, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8141, 5, 'Sahda Talitha Desirristi', 'Bandung', 'SMA', 'PT. Sentosa Jaya Prima', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 5', 379, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8142, 6, 'Cep Rudi Permana', 'Bandung', 'Tidak Diketahui', 'Kiansantang Mandiri', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 5', 1327, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8143, 1, 'Asep Masykur', 'Kota Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 5', 190, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8144, 2, 'Joesdhy Aria, S.Sos.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Bulan Bintang', NULL, 'Kota Bandung 5', 39, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8145, 3, 'ISMAwati', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Bulan Bintang', NULL, 'Kota Bandung 5', 71, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8146, 1, 'Indra Aziz, S.E.', 'Tasikmalaya', 'S1', 'KNPI Jabar', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 5', 2822, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8147, 2, 'Bella Ginanjar, S.T.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 5', 1372, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8148, 3, 'Dra. Eli Harliani, M.Si.', 'Garut', 'SMA', 'Dinas Komunikasi Dan Informasi', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 5', 1139, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8149, 4, 'Denny Rudiana', 'Bandung', 'SMA', 'DPRD Provinsi Jawa Barat', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 5', 1479, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8150, 5, 'Mariana Siti Sondari', 'Bandung', 'SMA', 'Jimmy Enterprise Mas', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 5', 116, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8151, 6, 'Koes Koesnadi', 'Bandung', 'SMA', 'Swasta Agriculture', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 5', 486, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8152, 1, 'Christian Julianto Budiman', 'Kota Bandung', 'D3', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 5', 6910, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8153, 2, 'Irma Nurtanti, S.P.', 'Kota Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 5', 574, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8154, 3, 'Viddy Chrisanto, S.Th.', 'Kota Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 5', 933, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8155, 4, 'Rachmat Widjaja', 'Kota Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 5', 524, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8156, 6, 'Yayu Yuniarti', 'Kota Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 5', 118, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8157, 7, 'Iwan Hermawan, S.Sos.', 'Kota Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 5', 532, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8158, 1, 'Adi Wibowo, A.Md.', 'Jakarta', 'D3', 'CV Multi Sinergi Prima', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 5', 753, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8159, 2, 'Ruslan Abdul Gani', 'Bandung', 'SMA', 'PT Accer', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 5', 334, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8160, 3, 'Anggun Angelia, S.H.', 'Bandung', 'S1', 'Bank BJB\nUniversitas Widyatama\nKagum Grup', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 5', 904, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8161, 4, 'Iin Ruhiat, S.H.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 5', 170, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8162, 5, 'Rika Affianty', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 5', 75, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8163, 6, 'Priyatna', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 5', 87, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8164, 1, 'Hj. Ega Megantari, S.H., M.I.Kom.', 'Bandung', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 5', 472, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8165, 2, 'Kyai Ahmad Zambroni, S.Sy.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 5', 567, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8166, 3, 'Panji Akbar Pratama', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 5', 160, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8167, 4, 'Mohamad Dani Rochimat, S.E.', 'Bandung', 'S1', 'PT. Setiawan Sedjati', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 5', 90, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8168, 5, 'Indah Agussusan, S.T.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 5', 60, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8169, 6, 'Beta Abdu Akbar', 'Ambon', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 5', 118, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8170, 1, 'Dra. Hj. Maryam', 'Kota Bandung', 'S3', 'Swasta', 'Perempuan', 'Partai Ummat', NULL, 'Kota Bandung 5', 327, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8171, 2, 'Asep Muslihat', 'Kota Bandung', 'SMA', 'PNS/ASN', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 5', 150, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8172, 3, 'Drs. Syafruddin, S.H., M.Kn.', 'Kota Bandung', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 5', 141, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8173, 4, 'Marsel Magenda, S.T., M.T.', 'Kota Bandung', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 5', 38, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8174, 1, 'Indri Rindani', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 6', 5160, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8175, 2, 'Drs. Agustani K', 'Cianjur', 'S1', 'Staff Kantor Assalam', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 6', 4256, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8176, 3, 'Hamdan Nugraha, S.Sos.', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 6', 4221, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8177, 4, 'Menawati', 'Bandung', 'S1', 'Staff Astra Microtonic Technology Batam', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 6', 269, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8178, 5, 'Asep DaruSMAn', 'Bandung', 'SMA', 'Ketua DPD Kota Bandung', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 6', 785, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8179, 6, 'Dicky Kushendar Dipura', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 6', 607, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8180, 7, 'Budi Rachmat', 'Bandung', '`SMA', 'Produser News', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 6', 597, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8181, 1, 'Drg. Maya Himawati', 'Surabaya', 'S2', 'Kapubdep Gilut Rsal Dr. Mintoharjo', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 6', 5043, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8182, 2, 'Ute Rizalul Ali, S.E.', 'Bandung', 'S1', 'Proyek Manager Wahana', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 6', 1617, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8183, 3, 'Rizky Ridwansyah', 'Bandung', 'SMA', 'Bendahara Umum Dada Rosada Centre', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 6', 1827, '2025-08-07 20:43:05', '2025-08-07 20:43:05'),
(8184, 4, 'Siti Haola Mubarrokah, S.E.', 'Bandung', 'S1', 'Admin Kelurahan Sukahaji', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 6', 3675, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8185, 5, 'Mumuh Muharam', 'Bandung', 'SMA', 'Koordinator Security PT. Kagum', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 6', 2621, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8186, 6, 'Yudi Susanto, S.Sos.', 'Bandung', 'S1', 'Akunting Administrasi PT. Klasik Bean Sunda Hejo', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 6', 1667, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8187, 7, 'Rizqy Wijaya, S.H.', 'Bandung', 'S1', 'Owner Rbl', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 6', 681, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8188, 1, 'H. Isa Subagdja', 'Bandung', 'S1', 'Anggota DPRD', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 6', 5368, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8189, 2, 'Herman Budiyono, S.E.', 'Tasikmalaya', 'S1', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 6', 1034, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8190, 3, 'Vivi Sa`Adiah, S.Ag.', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 6', 1912, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8191, 4, 'Susilawati', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 6', 1372, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8192, 5, 'Lenny, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 6', 1927, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8193, 6, 'Revival Yosia Takariana', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 6', 818, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8194, 7, 'Markus Harison Rihi Hina', 'Pangkalan Brandan', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 6', 2241, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8195, 1, 'H. Rizal Khairul, S.I.P., M.Si.', 'Bandung', 'S2', 'Ketua Komisi A DPD', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 6', 8935, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8196, 2, 'SePT.yani Hidayat, A.Md.', 'Bandung', 'D3', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 6', 1232, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8197, 3, 'Taspen Effendi, S.H.', 'Lampung', 'S1', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 6', 1887, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8198, 4, 'Asep Rohanda, S.T.', 'Bandung', 'S1', 'Quality Control CV Tim Bangun Perkasa', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 6', 1264, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8199, 5, 'Beni Chandra, S.Si.', 'Bandung', 'S1', 'Owner Klinik Pratama N-Lab', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 6', 1710, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8200, 6, 'Eulis Rohaeni, S.I.P.', 'Bandung', 'S1', 'Swasta/Wiraswasta', 'Perempuan', 'Partai Golongan Karya', NULL, 'Kota Bandung 6', 594, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8201, 7, 'Afwan Abdul Gofur, S.Pd., M.Pd.', 'Bandung', 'S2', 'Pelatih Futsal Sd Darul Hikam Bandung', 'Laki-laki', 'Partai Golongan Karya', NULL, 'Kota Bandung 6', 694, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8202, 1, 'Heri Hermawan', 'Bandung', 'SMA', 'Anggota DPRD Kota Bandung', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 6', 11687, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8203, 2, 'Ali Al Haddad, S.T.', 'Bandung', 'S1', 'General Manager Sigiviolet', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 6', 8061, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8204, 3, 'Dra. Ani Sumarni', 'Bandung', 'S1', 'DPRD Kota Bandung', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 6', 454, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8205, 4, 'KaPT.en (Purn.) Darmin, S.Pd.', 'Kebumen', 'S1', 'Kabag Pam PT. Dwisaha Pradana', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 6', 1845, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8206, 5, 'Fitriyah', 'Bandung', 'S1', 'Direktur PT. Tri Mega Bintang', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 6', 208, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8207, 6, 'Muhamad Girhan', 'Bandung', 'SMA', 'Owner Bmw Entertainment', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 6', 420, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8208, 7, 'Ihsan Sahri Ramadan', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 6', 1605, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8209, 1, 'Hamdi', 'Ciamis', 'SMA', 'Biller PT. Haleyora Powerindo', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 6', 191, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8210, 2, 'Immanuel', 'Medan', 'S1', 'Producer PT. Axa Financial Indonesia', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 6', 170, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8211, 3, 'Desi Kemalasari, A.Md.', 'Langsa', 'D3', 'Ibu Rumah Tangga', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 6', 203, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8212, 4, 'Oki Nurmaddi', 'Pandeglang', 'SMA', 'Staff PT. Karya Utamaputra Mandiri', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 6', 204, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8213, 5, 'Toni Aprianto', 'Garut', 'SMA', 'Ass. Store Manager PT. Jco Donut\'S & Coffee', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 6', 70, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8214, 6, 'Rani Tristayanti', 'Cirebon', 'SMA', 'Marketing CV Eka Pratama', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 6', 106, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8215, 7, 'Tri Ariyanto Susanto', 'Purworejo', 'Tidak Diketahui', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 6', 250, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8216, 1, 'Ridwan Mustopa', 'Bandung', 'SMA', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 6', 1064, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8217, 2, 'Aditia Restianda, S.H.', 'Padang', 'S1', 'Legal Corporate PT. Indonesia Futura Teknologi', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 6', 97, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8218, 3, 'Neneng Yuliawati, S.I.P.', 'Bandung', 'S1', 'Op Pelayanan Kelurahan Cibaduyut Wetan', 'Perempuan', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 6', 241, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8219, 4, 'Wr Rahasdikin', 'Kuala Tungkal', 'Tidak Diketahui', 'Swasta/Wiraswasta', 'Laki-laki', 'Partai Gelombang Rakyat Indonesia', NULL, 'Kota Bandung 6', 979, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8220, 1, 'Yudi Cahyadi', 'Bandung', 'S1', 'Direktur CV.Mitra Unggul', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 6', 1927, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8221, 2, 'Hj. Zirly Nova Jamil, S.E.', 'Sukabumi', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 6', 2299, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8222, 3, 'Deni Nursani, S.Pd.I.', 'Bandung', 'SMA', 'Anggota DPRD Kota Bandung', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 6', 3325, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8223, 4, 'Ir. Ati Suharmayanti', 'Manado', 'S1', 'IRT', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 6', 1306, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8224, 5, 'H. Fakhruddin Rusyibani, S.H.I.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 6', 2766, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8225, 6, 'Opik Taufik', 'Kuningan', 'D1', 'HRD PT. Restu Ibu Mandiri', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 6', 2127, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8226, 7, 'Lia Yulia Dewi, A.Md.', 'Bandung', 'D3', 'IRT', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 6', 1826, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8227, 1, 'Nita Veronica', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 6', 33, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8228, 2, 'Samsul Hidayatullah', 'Jakarta', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 6', 19, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8229, 3, 'Lroyen Arianto', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 6', 28, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8230, 4, 'LaSMA', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 6', 6, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8231, 5, 'Slamet Tovik Riadi', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 6', 27, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8232, 1, 'Dayu A. G.', 'Garut', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 6', 252, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8233, 2, 'Isnaini Tuasa', 'Ambon', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 6', 204, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8234, 3, 'Betty Resna Budhiarti', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 6', 50, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8235, 4, 'Asep Yoga', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 6', 84, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8236, 5, 'H. Deden Rohimat Hidayat, S.P.', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 6', 408, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8237, 6, 'Wina Wikaningsih', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 6', 23, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8238, 1, 'Drs. Dadang Wardani', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Garda Republik Indonesia', NULL, 'Kota Bandung 6', 487, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8239, 1, 'Heri Cowet', 'Bandung', 'SMA', 'Ketua Umum Yayasan Anugerah Insan Residivist', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 6', 5079, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8240, 2, 'Irwan Sholeh', 'Bandung', 'SMA', 'Karyawan UNIPI', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 6', 2340, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8241, 3, 'Juanita Fitriana', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 6', 752, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8242, 4, 'Nina Rachmawaty', 'Bandung', 'D3', 'Pemilik Arms Steel Workshop', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 6', 1034, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8243, 5, 'Cecep Wisnu Safari', 'Bandung', 'SMA', 'Pemilik Mj Farm', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 6', 644, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8244, 6, 'Rani Tristayanti', 'Cirebon', 'SMA', 'Marketing CV. Eka Pratama', 'Perempuan', 'Partai Amanat Nasional', NULL, 'Kota Bandung 6', 293, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8245, 7, 'Deden Rukman Rumaji', 'Bandung', 'S2', 'Manager PT. Kalijati', 'Laki-laki', 'Partai Amanat Nasional', NULL, 'Kota Bandung 6', 268, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8246, 1, 'Cecep Kurniawan', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Parti Bulan Bintang', NULL, 'Kota Bandung 6', 209, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8247, 2, 'Arinda Juwita Mentari Putri Yusaria, S.H.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Parti Bulan Bintang', NULL, 'Kota Bandung 6', 87, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8248, 1, 'Ir. H. Agus Gunawan', 'Bandung', 'S1', 'Ketua DPAC Partai Demokrat', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 6', 6354, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8249, 2, 'Troyadi Ginanda Lukas, S.Sos.', 'Bandung', 'S1', 'Pengurus PT.MSI Prov. Jawa Barat', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 6', 514, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8250, 3, 'Yani Harisandi', 'Bandung', 'SMA', 'Bendahara Paguyuban SMP 5 Kota Bandung', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 6', 2991, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8251, 4, 'Bonny Yulia Ariani', 'Bandung', 'SMA', 'Wakil Bendahara DPC Kota Bandung', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 6', 303, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8252, 5, 'Nedi Gusnaedi', 'Bandung', 'SMA', 'Wakil Sekretaris DPC Kota Bandung', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 6', 127, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8253, 6, 'Novita Sari Mangadil', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrat', NULL, 'Kota Bandung 6', 229, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8254, 7, 'Fajar Hidayatullah, S.H.', 'Bandung', 'SMA', 'Sekretaris Generasi Muda Buah Batu Corps Eltor', 'Laki-laki', 'Partai Demokrat', NULL, 'Kota Bandung 6', 249, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8255, 1, 'Sherly Theresia, A.Md.Keb., S.St., M.A.R.S., M.M.', 'Tidak Diketahui', 'S2', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 6', 6483, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8256, 2, 'Alexander J. Ricky, S.T.', 'Tidak Diketahui', 'S1', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 6', 1884, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8257, 3, 'Irfan Rahmat Ginanjar, S.I.P.', 'Tidak Diketahui', 'S1', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 6', 607, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8258, 4, 'Dirgantara Rexy Martua Pangaribuan, S.H.Int.', 'Tidak Diketahui', 'S1', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 6', 846, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8259, 5, 'Kevin Alexander Wirawan, S.Hub.Int.', 'Tidak Diketahui', 'S1', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 6', 1366, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8260, 6, 'Non Riska Lusiandi', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Perempuan', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 6', 122, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8261, 7, 'Amidjaya Pramudhia S', 'Tidak Diketahui', 'Tidak Diketahui', 'Tidak Diketahui', 'Laki-laki', 'Partai Solidaritas Indonesia', NULL, 'Kota Bandung 6', 61, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8262, 1, 'Fetty Ernestyn, S.T.', 'Kuningan', 'S1', 'Principal Aipro', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 6', 1135, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8263, 2, 'Deden Sopian Adiwijaya', 'Jakarta', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 6', 227, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8264, 3, 'Edy Suhendi Hidayat, S.E., M.M.', 'Bandung', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 6', 568, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8265, 4, 'Kartika GuSMAwati, S.H.', 'Purwakarta', 'S1', 'Staff Kantor Notaris / PPAT', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 6', 1000, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8266, 5, 'Christian Dicky Setia Budhi, S.S., M.Pd.', 'Bandung', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Perindo', NULL, 'Kota Bandung 6', 470, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8267, 6, 'Aswita Sarasati', 'Jakarta', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 6', 77, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8268, 7, 'Indri Andriani', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Perindo', NULL, 'Kota Bandung 6', 101, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8269, 1, 'Lia Nurlaela, S.Sos.I.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 6', 2097, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8270, 2, 'Inden Mardiah, S.Ag.', 'Bandung', 'S1', 'Kepala Sekolah Madraah Ibtidayah YPPI', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 6', 280, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8271, 3, 'Poppy Pratiwi', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 6', 284, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8272, 4, 'Imas Rohimah', 'Bandung', 'SMA', 'Guru Paud Kb Al-Farizqi', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 6', 363, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8273, 5, 'Antonio Ronaldo Pesurnay', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 6', 47, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8274, 6, 'Taufik Saufiadi', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 6', 115, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8275, 7, 'Irfan Saefurrohman', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 6', 254, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8276, 1, 'Eko Budiyanto, S.T.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 6', 271, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8277, 2, 'Tika Ningsih', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Ummat', NULL, 'Kota Bandung 6', 50, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8278, 3, 'Ir. Tatang Jaya Saputra', 'Cilegon', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 6', 107, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8279, 4, 'Thariq Abdussalam, S.T.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 6', 103, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8280, 1, 'Aep Syaefudin', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 7', 257, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8281, 2, 'Ari Noveriana', 'Bandung', 'SMA', 'Drawer Winstudio', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 7', 545, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8282, 3, 'Agus Cahyana', 'Bandung', 'S1', 'Anggota DPRD Kab/Kota', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 7', 846, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8283, 4, 'Nenden Maryati, S.Pd.', 'Bandung', 'SMA', 'Staff PT. Multi Garmen Jaya', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 7', 1443, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8284, 5, 'Irawan, S.Sos.', 'Jakarta', 'S1', 'Staff Tenaga Ahli Anggota DPR RI Dari Partai PKB', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 7', 334, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8285, 6, 'Ayat Sutisna, S.E., M.Si.', 'Bandung', 'S2', 'Staff Elastico7', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 7', 557, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8286, 7, 'Genta Tediana Sundaya, S.Pd.', 'Bandung', 'S1', 'Staff PT. Gilland Ganesha', 'Laki-laki', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 7', 223, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8287, 8, 'Neng Reni Sugandi', 'Bandung', 'SMA', 'Owner Renny Enterprise', 'Perempuan', 'Partai Kebangkitan Bangsa', NULL, 'Kota Bandung 7', 353, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8288, 1, 'Abidharma Seba, S.H.', 'Bandung', 'S1', 'Manager HRD PT. Panasia', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 7', 2363, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8289, 2, 'Angelica Justicia Majid', 'Bandung', 'SMA', 'Crew CV. Boulder', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 7', 6642, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8290, 3, 'Warsino Haryo Yudanto', 'Karangayar', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 7', 1287, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8291, 4, 'Freddy Bumbunan Sirait, S.H., M.H.', 'Lampung', 'S2', 'Owner Kantor Hukum Freddy B Sirait & Associasi', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 7', 4839, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8292, 5, 'Yeane Marita Sunatra, S.E.', 'Bandung', 'S1', 'Manager Priority Banking (PBO) Bank Syariah Mandiri', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 7', 1402, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8293, 6, 'Ir. Asep Ali Basah, S.Pd., M.M.', 'Bandung', 'S2', 'Kepala Sekolah SMK Budaya Bangsa', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 7', 2446, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8294, 7, 'Rudi Hasanudin, S.E.', 'Makasar', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 7', 618, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8295, 8, 'Sicilia Caesar Irawan', 'Bandung', 'D3', 'Owner By Sicilia', 'Perempuan', 'Partai Gerakan Indonesia Raya', NULL, 'Kota Bandung 7', 996, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8296, 1, 'Rieke Suryaningsih, S.H.', 'Bandung', 'S1', 'Anggota DPRD Kab/Kota', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 7', 5144, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8297, 2, 'Willy Kuswandi', 'Tanggerang', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 7', 2408, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8298, 3, 'Parlindungan Sihombing, S.H., M.H.', 'Medan', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 7', 4744, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8299, 4, 'Natalia Theodora, S.E.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 7', 4819, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8300, 5, 'Mangiring Tumpal Sampetua Sibagariang, S.H.', 'Tasikmalaya', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 7', 366, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8301, 6, 'Joko Purboyo, S.H', 'Jakarta', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 7', 316, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8302, 7, 'Irvi Jusnita Suratman, S.S.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 7', 1177, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8303, 8, 'Yakob Budiman, S.H.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Demokrasi Indonesia Perjuangan', NULL, 'Kota Bandung 7', 187, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8304, 1, 'Juniarso Ridwan', 'Bandung', 'SMA', 'Wiraswasta', 'Laki-laki', 'Partai Golkar', NULL, 'Kota Bandung 7', 6347, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8305, 2, 'Senny Bunyamin Dudih, S.Sos.', 'Bandung', 'S1', 'Pemilik Ayakan Resto', 'Perempuan', 'Partai Golkar', NULL, 'Kota Bandung 7', 3082, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8306, 3, 'Reyraya Respati Paramudhita, S.H.', 'Bandung', 'S1', 'Manager Operasional PT. Pandu Dewanata Bima Perkasa', 'Laki-laki', 'Partai Golkar', NULL, 'Kota Bandung 7', 1008, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8307, 4, 'Herni Herdiani, S.T., M.Si.', 'Bandung', 'S2', 'Direktur Operasional PT. TMB', 'Perempuan', 'Partai Golkar', NULL, 'Kota Bandung 7', 2350, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8308, 5, 'Mohamad Bena Aji Satria, S.A.P.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Golkar', NULL, 'Kota Bandung 7', 596, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8309, 6, 'Adi Sumirat', 'Bandung', 'SMA', 'Penyiar Radio Maya FM', 'Laki-laki', 'Partai Golkar', NULL, 'Kota Bandung 7', 721, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8310, 7, 'Pramesti Dewi, S.E.', 'Tidak Diketahui', 'S1', 'Tidak Diketahui', 'Perempuan', 'Partai Golkar', NULL, 'Kota Bandung 7', 675, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8311, 8, 'Achmad Hamdeni, S.Sos., M.M.', 'Bandung', 'S2', 'Pranata Pemadam Kebakaran', 'Laki-laki', 'Partai Golkar', NULL, 'Kota Bandung 7', 1140, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8312, 1, 'Dr. Uung Tanuwidjaja, S.E., M.M.', 'Bandung', 'S3', 'Anggota DPRD Kab/Kota', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 7', 6149, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8313, 2, 'Dadang Munajat, S.T.', 'Bandung', 'S1', 'Direktur CV. Fakhirah Fairuz', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 7', 3008, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8314, 3, 'Santi Wulandari Mainur', 'Bandung', 'SMA', 'Manager Marketin Relief', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 7', 291, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8315, 4, 'Yanuar Rahman Ruchimat, S.E.', 'Bandung', 'S1', 'Manager Keuangan CV. Deuyna', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 7', 1022, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8316, 5, 'Recky Rianka', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 7', 186, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8317, 6, 'Siti Nur Salima', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Nasdem', NULL, 'Kota Bandung 7', 179, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8318, 7, 'Drs. Toto Harsono', 'Indramayu', 'S1', 'Kasi Trantib Pemeritah Kota Bandung', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 7', 596, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8319, 8, 'Edi Setiadi, S.E.', 'Bandung', 'S1', 'Kasubag Dinas Perumahan Dan Pemukiman', 'Laki-laki', 'Partai Nasdem', NULL, 'Kota Bandung 7', 1125, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8320, 1, 'Maman Suherman', 'Bandung', 'SMA', 'Kepala Regu PT. Trisulatex', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 7', 322, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8321, 2, 'Agus Solihat', 'Tasikmalaya', 'SMA', 'Petugas Baca Meter PLN PT.Haleyora Powerindo', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 7', 241, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8322, 3, 'Neng Riny Rahmawati S.E, M.E,', 'Tidak Diketahui', 'S2', 'Tidak Diketahui', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 7', 160, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8323, 4, 'Fuad Syakir, A.Md., S.St., M.M.', 'Bandung', 'S2', 'Dosen Politeknik Piksi Ganesha', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 7', 168, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8324, 5, 'Agus Dwi Wuryanto, S.H.', 'Kudus', 'S1', 'Ketua LBH P2Ra', 'Laki-laki', 'Partai Buruh', NULL, 'Kota Bandung 7', 71, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8325, 6, 'Nopi Susanti', 'Garut', 'SMA', 'Operator PT. Masterindo Jaya Abadi', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 7', 124, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8326, 7, 'Dini Kartika, S.I.P.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 7', 52, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8327, 8, 'Herna Dida Hindasyah, S.Farm.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Buruh', NULL, 'Kota Bandung 7', 96, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8328, 1, 'Boyke Hendrasah', 'Poso', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 7', 383, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8329, 2, 'Tekun Abdul Karim', 'Subang', 'SMA', 'Manager Hr Strategic / Hrga PT. Pertamina Trans Kontinental Kantor Pusat Jakarta', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 7', 173, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8330, 3, 'Ishthifa Robbi Rodhiya, S.Pd., M.Ars.', 'Bandung', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Gelora', NULL, 'Kota Bandung 7', 227, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8331, 4, 'Drs. Rizal Syaparudin', 'Pagar Alam', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 7', 114, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8332, 5, 'Yoga Adiana', 'Bandung', 'SMA', 'Direktur CV. Kc Multi Kreasi', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 7', 82, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8333, 6, 'Dalia Sariningsih', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Gelora', NULL, 'Kota Bandung 7', 203, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8334, 7, 'Bayu Anggoro Pratiwi', 'Bandung', 'S1', 'Jurnalis Hu Media Indonesia', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 7', 2144, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8335, 8, 'Irfan Hakim', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Gelora', NULL, 'Kota Bandung 7', 325, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8336, 1, 'Siti Marfu\'Ah, S.S., S.Pd., M.Pd.', 'Karawang', 'S2', 'Dosen Stai Syech Quro Kotabru Karawang', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 7', 1246, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8337, 2, 'H. Endrizal Nazar, S.T.', 'Agam', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 7', 2528, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8338, 3, 'Agus Salim', 'Bandung', 'D3', 'DPRD Kota Bandung', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 7', 5381, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8339, 4, 'Susanto Triyogo Adiputro, S.St.', 'Bandung', 'S1', 'Direktur Utama PT. Usaha Muda Berkarya', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 7', 5956, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8340, 5, 'Milly Utami, S.Pd.', 'Bandung', 'S2', 'Owner Li & Ly Cookies', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 7', 1942, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8341, 6, 'Ahyana, S.Pd.', 'Cirebon', 'S1', 'Konsultan Pendidikan Pusat Layanan Pendidikan', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 7', 591, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8342, 7, 'Roosphira Miswary, S.T.', 'Semarang', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 7', 487, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8343, 8, 'Ali Nuridin, A.Md.', 'Pelamang', 'D3', 'Pemilik Amanahjaya', 'Laki-laki', 'Partai Keadilan Sejahtera', NULL, 'Kota Bandung 7', 2756, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8344, 1, 'Fikri Gani', 'Jakarta', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 7', 32, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8345, 2, 'Trisna Devita', 'Painan', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 7', 9, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8346, 3, 'Michael Adjani', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 7', 12, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8347, 4, 'Riska Silvianie', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 7', 11, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8348, 5, 'Indra Nurjaman', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 7', 8, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8349, 6, 'Ganjar Ratmawan', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 7', 13, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8350, 7, 'Ai Hisanru Sebastian Manurung', 'Ajibata', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Kebangkitan Nusantara', NULL, 'Kota Bandung 7', 8, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8351, 1, 'Novita Setiawati, S.E.', 'Jakarta', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 7', 8, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8352, 2, 'Marsellinus Firdaus, S.H., M.H.', 'Bogor', 'S2', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 7', 8, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8353, 3, 'Lili Hartono, S.E.', 'Kudus', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 7', 8, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8354, 4, 'Eni Suwarni', 'Tidak Diketahui', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 7', 8, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8355, 5, 'Muhamad Haikal Yushendri, S.H.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Hati Nurani Rakyat', NULL, 'Kota Bandung 7', 8, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8356, 1, 'Budi Sopian, S.Pd.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Garuda', NULL, 'Kota Bandung 7', 180, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8357, 2, 'Dahlia', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Garuda', NULL, 'Kota Bandung 7', 149, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8358, 3, 'Suhartono', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Garuda', NULL, 'Kota Bandung 7', 96, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8359, 1, 'Saepudin Kurniawan, S.Ag.', 'Bandung', 'S1', 'Alfirdaus Farm', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 7', 857, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8360, 2, 'Anisa Siti Nurjannah', 'Bandung', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 7', 265, '2025-08-07 20:43:06', '2025-08-07 20:43:06');
INSERT INTO `legislatifs` (`id`, `no_urut`, `nama_lengkap`, `tempat_lahir`, `riwayat_pendidikan`, `riwayat_pekerjaan`, `jenis_kelamin`, `nama_partai`, `logo_partai`, `dapil`, `suara_sah`, `created_at`, `updated_at`) VALUES
(8361, 3, 'Renald Fahlevi', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 7', 143, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8362, 4, 'Budi Kurnia', 'Garut', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 7', 138, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8363, 5, 'Adang Sopyan', 'Cicalengka', 'Tidak Diketahui', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 7', 189, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8364, 6, 'Yosi Mardiana', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 7', 76, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8365, 7, 'Alfian Hafidh, S.H., M.Kn.', 'Bandung', 'S2', 'Firma Hukum Qoyum & Omar', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 7', 197, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8366, 8, 'Nandang Sutisna, S.Ag., S.H.', 'Cimahi', 'S1', 'Advokat', 'Laki-laki', 'Partai Persatuan Pembangunan', NULL, 'Kota Bandung 7', 1164, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8367, 2, 'Dida Gunawan, S.H.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 7', 152, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8368, 3, 'Asy Syfa Aulia Nurul Rahmah, A.Md.Keb.', 'Bandung', 'D3', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Ummat', NULL, 'Kota Bandung 7', 103, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8369, 4, 'Muhammad Rizal Jayadiwangsa', 'Bandung', 'SMA', 'Pejabat/Karyawan BUMN/BUMD', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 7', 104, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8370, 5, 'Dadan Suhendar, S.Pd.', 'Bandung', 'S1', 'Swasta/Wiraswasta/Lainnya', 'Laki-laki', 'Partai Ummat', NULL, 'Kota Bandung 7', 111, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8371, 6, 'Tien Kartini', 'Bandung', 'SMA', 'Swasta/Wiraswasta/Lainnya', 'Perempuan', 'Partai Ummat', NULL, 'Kota Bandung 7', 70, '2025-08-07 20:43:06', '2025-08-07 20:43:06'),
(8374, 7, 'Yesi, S.H', 'Tasikmalaya', 'JJJAJAJAJ', 'HSHJAJAJSJAKAKHSH', 'Laki-laki', 'Partai Gemoy', NULL, 'KOTA BANDUNG 1', 300, '2025-08-10 20:26:50', '2025-08-10 20:26:50'),
(8375, 6, 'Nail S.H', 'Tasikmalaya', 'hgffdah', 'jhggttdatryyhkk/hh/j21j33', 'Laki-laki', 'Partai Gemoy', NULL, 'KOTA BANDUNG 1', 10, '2025-08-10 20:44:17', '2025-08-10 20:44:17'),
(8376, 6, 'Naila Febriana', 'Tasikmalaya', 'hgffdah', 'jhggttdatryyhkk/hh/j21j33', 'Laki-laki', 'Partai Gemoy', NULL, 'KOTA BANDUNG 1', 10, '2025-08-10 20:47:35', '2025-08-10 20:47:35');

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
(3, '2020_01_01_000001_create_bidangs_table', 1),
(4, '2020_01_01_000002_create_programs_table', 1),
(5, '2020_01_01_000003_create_posts_table', 1),
(6, '2020_01_01_000004_create_visi_misis_table', 1),
(7, '2020_01_01_000005_create_strukturors_table', 1),
(8, '2020_01_01_000006_create_landasan_hukums_table', 1),
(9, '2020_01_01_000007_create_sakip_tables', 1),
(10, '2020_01_01_000008_create_ormas_tables', 1),
(11, '2020_01_01_000009_create_galeris_table', 1),
(12, '2020_01_01_000010_create_banners_table', 1),
(13, '2020_01_01_000011_create_potensi_konfliks_table', 1),
(14, '2020_01_01_000012_create_mitras_table', 1),
(15, '2020_01_01_000013_create_paslons_table', 1),
(16, '2020_01_01_000014_create_legislatifs_table', 1),
(17, '2026_07_16_032028_drop_legislatif_terpilihs_table', 2),
(18, '2026_07_20_040225_add_parent_id_to_strukturors_table', 3),
(19, '2026_07_22_000000_add_positions_and_color_to_strukturors_table', 4),
(20, '2026_07_27_000001_create_app_settings_table', 5),
(21, '2026_07_20_060328_add_logo_partai_to_legislatifs_table', 6),
(22, '2026_09_14_000001_change_sumber_data_in_ormas_table', 7),
(23, '2026_09_19_000001_make_ormas_fields_nullable', 7),
(24, '2026_09_19_000002_create_import_batches_table', 7),
(25, '2026_09_23_000001_create_laporan_kajians_table', 7),
(26, '2026_09_23_000002_add_tanggal_to_laporan_kajians_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mitras`
--

CREATE TABLE `mitras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_mitra` enum('FORKOPIMDA','KPU','BAWASLU','BNN','PARPOL','FKDM','FKUB','FPK') NOT NULL,
  `logo_lembaga` varchar(255) DEFAULT NULL,
  `nama_lembaga` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `ketua` varchar(255) DEFAULT NULL,
  `foto_ketua` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitras`
--

INSERT INTO `mitras` (`id`, `kategori_mitra`, `logo_lembaga`, `nama_lembaga`, `alamat`, `deskripsi`, `ketua`, `foto_ketua`, `kontak`, `created_at`, `updated_at`) VALUES
(18, 'FORKOPIMDA', '1751944086_686c8b965c7ea.png', 'PEMERINTAH KOTA BANDUNG', '<p>Jalan Wastukancana No. 2 Bandung, Jawa Barat, 40117</p>', '<p>Pemerintah Kota Bandung merupakan lembaga eksekutif daerah yang dipimpin oleh Wali Kota dan bertugas menyelenggarakan urusan pemerintahan, pembangunan, dan pelayanan publik di wilayah Kota Bandung.</p>', 'MUHAMMAD FARHAN', '1751944086_686c8b965d734.jpg', '(0658) 3813750', '2025-06-12 20:15:28', '2025-07-07 20:08:06'),
(28, 'FKUB', '1754547445_689444f5f2947.png', 'FORUM KERUKUNAN UMAT BERAGAMA', '<p>Gedung KORPRI, Jl. Cicendo No.4b, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117</p>', '<p>Dalam rangka kelancaran pemantapan kerukunan umat beragama tersebut sangat dibutuhkan adanya penunjang disamping sumber daya manusia yang sudah ada.</p>', 'Dr. H. AHMAD SUHERMAN, MPd', 'profile-template.webp', '0813-2203-4567', '2025-06-12 20:15:28', '2025-08-06 23:17:26'),
(29, 'FPK', '1754547400_689444c8d7977.jpg', 'FORUM PEMBAURAN KEBANGSAAN', '<p>Komplek bumi Kiara 1 N.18&nbsp;</p>', '<p>Forum Pembauran Kebangsaan (FPK) Kota Bandung dibentuk sebagai wadah untuk memperkuat persatuan dan kesatuan bangsa di tengah keberagaman suku, agama, ras, dan golongan (SARA) di Kota Bandung. Pembentukan FPK ini merupakan amanat dari Permendagri No. 34 Tahun 2006 tentang Pedoman Penyelenggaraan Pembauran Kebangsaan di Daerah.</p>', 'Tjaja Kuswara', '1751948029_686c9afd8e137.png', 'fpk.kotabangdug@gmail.com', '2025-06-12 20:15:28', '2025-08-06 23:16:40'),
(30, 'FORKOPIMDA', '1751944175_686c8bef050e9.png', 'DPRD KOTA BANDUNG', '<p>Jalan Sukabumi Nomor 30, Bandung, Jawa Barat, Indonesia 4027</p>', '<p>Dewan Perwakilan Rakyat Daerah (DPRD) Kota Bandung adalah lembaga legislatif yang memiliki fungsi legislasi, anggaran, dan pengawasan terhadap jalannya pemerintahan di Kota Bandung.</p>', 'H. ASEP MULYADI, S.H.', '1751944175_686c8bef057e8.jpg', '0821-6200-0142', '2025-07-07 20:09:35', '2025-07-07 20:09:35'),
(31, 'FORKOPIMDA', '1751944963_686c8f0350dae.png', 'POLRESTABES KOTA BANDUNG', '<p>Jl. Merdeka No.18-21, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117</p>', '<p>Kepolisian Resor Kota Besar (Polrestabes) Bandung merupakan institusi kepolisian yang bertanggung jawab menjaga keamanan, ketertiban, dan penegakan hukum di wilayah Kota Bandung.</p>', 'Kombes Pol. Dr BUDI SARTONO, S.Ik., M.Si., M.Han', '1751944963_686c8f03522a0.jpg', '110', '2025-07-07 20:22:43', '2025-07-07 20:22:43'),
(32, 'FORKOPIMDA', '1751945122_686c8fa20d766.png', 'KODIM 06/18 KOTA BANDUNG', '<p>Jl. Bangka No.2, Merdeka, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40113</p>', '<p>Komando Distrik Militer (Kodim) 0618/Kota Bandung adalah satuan teritorial TNI AD yang bertugas melaksanakan pembinaan teritorial, pertahanan wilayah, serta mendukung stabilitas keamanan di Kota Bandung.</p>', 'Kombes Pol. Dr BUDI SARTONO, S.Ik., M.Si., M.Han', NULL, NULL, '2025-07-07 20:29:15', '2026-07-14 20:00:28'),
(33, 'FORKOPIMDA', '1751946011_686c931b519e8.png', 'KEJAKSAAN NEGERI KOTA BANDUNG', '<p>Jalan Jakarta nomor 42-44, Kebonwaru, Kecamatan Batununggal, Kota Bandung.</p>', '<p>Kejaksaan Negeri Kota Bandung adalah lembaga penegak hukum yang berada di bawah Kejaksaan RI, bertugas dalam penuntutan, penyidikan tindak pidana tertentu, dan pelaksanaan putusan pengadilan di wilayah hukum Kota Bandung.</p>', 'IRFAN WIBOWO, SH., MH', '1751946011_686c931b5254d.jpg', '+628112088854', '2025-07-07 20:40:11', '2025-07-07 20:40:11'),
(34, 'FORKOPIMDA', '1754547169_689443e10004b.png', 'LANAL KOTA BANDUNG', '<p>Jl. Aria Jipang No.8, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115</p>', '<p>Pangkalan TNI Angkatan Laut (Lanal) Bandung merupakan satuan pelaksana TNI AL yang bertugas melaksanakan pembinaan potensi maritim serta mendukung tugas-tugas TNI AL di wilayah Bandung dan sekitarnya.</p>', 'KOLONEL LAUT (P) MUHAMMAD TAUFIK, M.TR.HANLA., M.M.,', '1753931965_688ae0bd55542.jpg', '(022) 4235931', '2025-07-07 20:40:46', '2026-07-14 20:00:28'),
(35, 'FORKOPIMDA', '1754547319_689444770e44d.png', 'LANUD KOTA BANDUNG', '<p>Jalan Pajajaran Nomor. 156, kelurahan Husen Sastranegara, kecamatan Cicendo, kota Bandung, Jawa Barat</p>', '<p>Pangkalan TNI Angkatan Udara (Lanud) di Kota Bandung merupakan bagian dari TNI AU yang berperan dalam pengamanan udara, pembinaan kekuatan pertahanan udara, serta mendukung operasi penerbangan di kawasan Bandung.</p>', 'Mayor Sus M. Faisal Ikramy Pulungan', '1754547319_6894447710589.jpg', '(022) 6037630', '2025-07-07 20:42:46', '2025-08-06 23:15:19'),
(36, 'KPU', '1751946368_686c94809e6ea.png', 'KOMISI PEMILIHAN UMUM', '<p>Jln. Soekarno Hatta No. 260 Bandung 40286</p>', '<p>Komisi Pemilihan Umum Kota Bandung dibentuk sebagai bagian dari Komisi Pemilihan Umum berdasarkan pada Keputusan Menteri Dalam Negeri Nomor 41 Tahun 2001 mengatur tentang pembentukan susunan organisasi dan tata kerja sekretariat umum Komisi Pemilihan Umum di Provinsi, Kabupaten/Kota dan Surat Menteri Dalam Negeri Nomor: 061/815/SJ tanggal 25 April 2002 tentang pembentukan Sekretariat Pelaksana Pemiludi Propinsi dan Kabupaten/Kota. Peraturan ini menjadi cikal bakal dibentuknya Sekretariat Komisi Pemilihan Umum Kota Bandung yang pada awalnya disebut Perwakilan Sekretariat Umum (Setum) KPU Kota Bandung.</p>', 'Khoirul Anam Gumilar Winata S.IP,M.IP', '1751946368_686c94809f19c.png', 'e-mail: kota_bandung@kpu.go.id phone: (7509667 - 7506657 fax: (022) 7506654', '2025-07-07 20:46:08', '2025-07-07 20:46:08'),
(37, 'BAWASLU', '1751946476_686c94ec01375.png', 'BADAN PENGAWASAN PEMILIHAN UMUM', '<p>Jl. Nuansa Mas Raya No.2, Cipamokolan, Rancasari, Kota Bandung</p>', '<p>Badan Pengawas Pemilihan Umum (Bawaslu) Kota Bandung merupakan lembaga yang bertugas mengawasi seluruh proses penyelenggaraan Pemilihan Umum (Pemilu) dan Pemilihan Kepala Daerah (Pilkada) di wilayah Kota Bandung. Bawaslu Kota Bandung memiliki tanggung jawab utama dalam melakukan pengawasan terhadap tahapan pemilu, mencegah dan menindak pelanggaran, menyelesaikan sengketa proses pemilu, serta mendorong partisipasi masyarakat dalam pengawasan demokratis. Melalui pengawasan yang menyeluruh, Bawaslu bertujuan menjaga integritas, keadilan, dan transparansi pemilu. Selain itu, Bawaslu juga melaksanakan edukasi politik kepada masyarakat dan membangun sinergi dengan berbagai pihak dalam menciptakan pemilu yang jujur dan adil.</p>\r\n\r\n<p>Visi Bawaslu Kota Bandung adalah \"Menjadi Lembaga Pengawas Pemilu yang Tepercaya.\"</p>\r\n\r\n<p>Untuk mewujudkan visi tersebut, Bawaslu Kota Bandung menetapkan sejumlah misi sebagai berikut:<br>Meningkatkan kualitas pencegahan dan pengawasan pemilu yang inovatif serta kepeloporan masyarakat dalam pengawasan partisipatif.<br>Meningkatkan kualitas penindakan pelanggaran dan penyelesaian sengketa proses pemilu yang progresif, cepat, dan sederhana.<br>Meningkatkan kualitas produk hukum yang harmonis dan terintegrasi.<br>Memperkuat sistem teknologi informasi untuk mendukung kinerja pengawasan, penindakan serta penyelesaian sengketa pemilu terintegrasi, efektif, transparan, dan aksesibel.<br>Mempercepat penguatan kelembagaan dan SDM pengawas serta aparatur sekretariat di seluruh jenjang kelembagaan pengawas pemilu melalui tata kelola organisasi yang profesional dan berbasis teknologi informasi, sesuai prinsip pemerintahan yang baik dan bersih.<br>Dengan landasan tugas dan misinya, Bawaslu Kota Bandung terus berupaya mewujudkan pemilu yang berkualitas, berintegritas, dan demokratis.</p>', 'Dimas Aryana Iskandar, S.H', '1751946476_686c94ec0189e.jpg', 'bdg.bawaslukota@gmail.com', '2025-07-07 20:47:56', '2025-07-07 20:47:56'),
(38, 'BNN', '1751946658_686c95a2e5d49.png', 'BADAN NARKOTIKA NASIONAL', '<p>Jalan Ciung Wanara No 12B Kelurahan Lebak Siliwangi Kecamatan Coblong Bandung - 40132A</p>', '<p>Kota Bandung terletak di wilayah Jawa Barat dan merupakan Ibu Kota Provinsi Jawa Barat, memiliki luas wilayah 16.729,65 Ha dengan jumlah penduduk 2.483.977 jiwa. Wilayah Kota Bandung terdiri atas 30 Kecamatan dan 151 Kelurahan. Kota Bandung merupakan kota metropolitan terbesar di Jawa Barat. Selain itu Kota Bandung juga dikenal sebagai kota belanja, dengan mall dan factory outlet yang banyak tersebar di kota ini, dan saat ini Kota Bandung berangsur-angsur juga menjadi kota wisata kuliner. Kota Bandung merupakan salah satu kota tujuan utama pariwisata dan pendidikan. Sebagai daerah tujuan wisata, berbagai wisatawan baik yang datangnya dari daerah lain yang ada di Indonesia maupun wisatawan mancanegara datang berkunjung ke Bandung. Bertolak dari hal tersebut, peluang untuk penyalahgunaan narkoba di Kota Bandung sangat besar. Olehnya itu diperlukan perhatian dan penanganan yang serius secara terpadu untuk meminimalisir penyalahgunaan narkoba di wilayah Kota Bandung baik dari segi peredaran maupun penggunanya. Pemerintah pusat melalui Badan Narkotika Nasional (BNN) merespon permasalahan tersebut dengan membentuk Badan Narkotika Nasional Kota Bandung pada tanggal 16 September 2013 bersamaan dengan dilantiknya kepala Badan Narkotika Nasional Kota Bandung dan Kepala Badan Narkotika Nasional Kabupaten/Kota seluruh Indonesia sebanyak 25 (dua puluh lima) BNNKab/Kota, dimana dasar pembentukan 25 (dua puluh lima) BNNKab/Kota yang baru tersebut adalah surat persetujuan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi, nomor B/2225/M.PAN-RB/7/2013 tentang Pembentukan 25 (dua puluh lima) Badan Narkotika Nasional Kabupaten/Kota tanggal 4 Juli 2013. Badan Narkotika Nasional Kota Bandung adalah instansi vertikal Badan Narkotika Nasional Republik Indonesia yang melaksanakan tugas, fungsi dan wewenang Badan Narkotika Nasional dalam wilayah Kota Bandung. BNN Kota Bandung berada di bawah dan bertanggung jawab kepada Kepala Badan Narkotika Nasional Provinsi Jawa Barat.</p>', 'Kombes Pol. Mada Roostanto, S.E, M.H.,', '1751946658_686c95a2e66d6.png', NULL, '2025-07-07 20:50:58', '2025-07-07 20:50:58'),
(39, 'PARPOL', '1751946873_686c9679c0475.png', 'PARTAI NASIONAL DEMOKRAT', '<p>JL. RAYA SINDANGLAYA NO.27/319 RT.002/012 BANDUNG</p>', '<p>Partai NasDem di Kota Bandung mengusung semangat restorasi Indonesia dengan fokus pada perubahan yang berkelanjutan dan penguatan demokrasi. Di tingkat kota, NasDem berperan aktif dalam mendorong kebijakan yang pro-rakyat, penguatan pelayanan publik, serta pemberdayaan ekonomi masyarakat urban. NasDem Kota Bandung juga berkomitmen pada politik tanpa mahar dan mendorong partisipasi generasi muda dalam politik.</p>', 'RENDIANA AWANGGA, S.Tr.Kom.Ak.', '1751946873_686c9679c107c.png', '(022) 63723843', '2025-07-07 20:54:33', '2025-07-07 20:54:33'),
(40, 'PARPOL', '1751946931_686c96b3f01ff.png', 'PARTAI KEBANGKITAN BANGSA', '<p>Jl. K.H. Ahmad Dahlan No.1b, Burangrang, Kec. Lengkong, Kota Bandung, Jawa Barat 40262</p>', '<p>PKB Kota Bandung merupakan perpanjangan dari nilai-nilai keislaman yang inklusif dan nasionalis yang berakar pada Nahdlatul Ulama (NU). Di tingkat kota, PKB mendorong pembangunan berbasis kearifan lokal, memperjuangkan kesejahteraan masyarakat menengah ke bawah, serta memperkuat peran pendidikan keagamaan dan pesantren di wilayah perkotaan.</p>', 'AA ABDUL ROZAK, Spd.L.,M.Ag.', '1751946931_686c96b3f0d3f.png', '(022) 73518229', '2025-07-07 20:55:32', '2025-07-07 20:55:32'),
(41, 'PARPOL', '1751947027_686c9713b7175.png', 'PARTAI KEADILAN SEJAHTERA', '<p>JL. BRIGJEN KATAMSO NO. 17 BANDUNG</p>', '<p>PKS dikenal kuat di Kota Bandung dengan basis kader yang militan dan terorganisir. Partai ini mengusung nilai-nilai keadilan, kesejahteraan, serta penguatan nilai-nilai keislaman dalam kehidupan berbangsa. Di Kota Bandung, PKS fokus pada pelayanan publik, pendidikan keluarga, pemberdayaan UMKM, dan penanggulangan kemiskinan secara sistematis.</p>', 'AHMAD RAHMAT PURNAMA, A.Md.', '1751947027_686c9713b7cb7.png', '(022) 7237260', '2025-07-07 20:57:07', '2025-07-07 20:57:21'),
(42, 'PARPOL', '1751947121_686c977128692.png', 'PARTAI DEMOKRASI INDONESIA PERJUANGAN', '<p>Jl. Arcamanik Endah, Sukamiskin, Kec. Arcamanik, Kota Bandung, Jawa Barat 40293</p>', '<p>Sebagai partai nasionalis dengan sejarah panjang, PDIP di Kota Bandung membawa semangat Trisakti dan ideologi Pancasila dalam setiap langkah politiknya. PDIP Kota Bandung aktif dalam isu-isu kerakyatan, reformasi birokrasi, penguatan ekonomi rakyat, serta kebudayaan lokal. Partai ini juga dikenal mendorong peran perempuan dan kaum muda dalam politik.</p>', 'DRS. ISA SUBAGJA', '1751947121_686c977129157.png', 'dpdpdiperjuanganjabar@gmail.com', '2025-07-07 20:58:41', '2025-07-07 20:58:41'),
(43, 'PARPOL', '1751947211_686c97cbf2954.png', 'PARTAI GOLONGAN KARYA', '<p>Jl. Pelajar Pejuang 45 No.113, Turangga, Kec. Lengkong, Kota Bandung, Jawa Barat 40264</p>', '<p>Partai Golkar di Kota Bandung mengusung prinsip pembangunan berkelanjutan dan stabilitas politik. Dengan jaringan yang luas, Golkar konsisten mendorong kebijakan berbasis ekonomi kreatif, pembangunan infrastruktur, dan peningkatan kualitas pendidikan serta layanan kesehatan di perkotaan. Golkar juga berperan aktif dalam mendorong kaderisasi politik yang profesional.</p>', 'DR. Ir. H JUNIARSO RIDWAN, SH., MH., M.Si.', '1751947211_686c97cbf32f9.png', NULL, '2025-07-07 21:00:12', '2025-07-07 21:00:12'),
(44, 'PARPOL', '1751947270_686c980687eb9.png', 'PARTAI GERAKAN INDONESIA RAYA', '<p>Jl. Talaga Bodas No.37, Lkr. Sel., Kec. Lengkong, Kota Bandung, Jawa Barat 40262</p>', '<p>Pada November 2007, dalam perjalanan ke Bandara Soekarno-Hatta, Fadli Zon dan Hashim Djojohadikusumo berdiskusi tentang kondisi politik Indonesia yang dianggap telah dibajak oleh kekuatan kapital. Kekecewaan ini memunculkan gagasan membentuk partai baru yang memperjuangkan kesejahteraan rakyat. Setelah melalui diskusi panjang bersama tokoh-tokoh seperti Prabowo Subianto, Ahmad Muzani, dan lainnya, terbentuklah Partai Gerindra. Nama Gerindra (Gerakan Indonesia Raya) diusulkan oleh Hashim karena mudah diingat dan mencerminkan semangat nasionalis. Lambang kepala burung garuda yang menghadap ke kanan adalah ide Prabowo, melambangkan keberanian dan kemandirian. Unsur-unsur dalam lambang, seperti sisik, jambul, dan bentuk segi lima, merepresentasikan tanggal kemerdekaan Indonesia (17-8-1945). Partai Gerindra resmi dideklarasikan pada 6 Februari 2008, dengan visi membangun masyarakat adil, makmur, dan berdaulat melalui sistem ekonomi kerakyatan. Dalam perjalanannya, Gerindra berhasil menarik simpati masyarakat dan menjadi salah satu partai besar di Indonesia</p>', 'drg. MAYA HIMAWATI, Sp. Orto', '1751947270_686c9806887b7.png', '+6289999999', '2025-07-07 21:01:10', '2025-07-07 21:01:10'),
(45, 'PARPOL', '1751947327_686c983f98b10.png', 'PARTAI SOLIDARITAS INDONESIA', '<p>City Square, Ruko, Jl. Abdul Rahman Saleh No.9 Blok A1-1, Husen Sastranegara, Kec. Cicendo, Kota Bandung, Jawa Barat 40174</p>', '<p>PSI di Kota Bandung dikenal sebagai partai anak muda yang progresif dan transparan. Fokus utama PSI adalah pemberantasan korupsi, reformasi birokrasi, dan penguatan hak-hak minoritas. Di Bandung, PSI mendorong keterbukaan data publik, pelibatan masyarakat dalam kebijakan kota, dan inovasi layanan digital dalam pemerintahan.</p>', 'ERICK DARMADJAYA, B.Sc. M.K.P', '1751947327_686c983f99310.png', '0812-2297-7762', '2025-07-07 21:02:07', '2025-07-07 21:02:07'),
(47, 'FKDM', '1752132591_686f6bef6bf3f.jpg', 'FORUM KEWASPADAAN DINI MASYARAKAT KOTA BANDUNG', '<p>Jl. Sumber Sari No.101, Cisaranten Kulon, Kec. Arcamanik, Kota Bandung, Jawa Barat 40293</p>', '<p>Forum Kewaspadaan Dini Masyarakat (FKDM) Kota Bandung adalah wadah bagi elemen masyarakat yang dibentuk untuk menjaga dan memelihara kewaspadaan dini masyarakat. FKDM bertugas menjaring, menampung, mengoordinasikan, dan mengomunikasikan data serta informasi dari masyarakat mengenai potensi ancaman, tantangan, hambatan, dan gangguan di Kota Bandung. Tugas Pokok FKDM Kota Bandung:<br>Menjaring dan menampung informasi:<br>Mengumpulkan data dan informasi terkait potensi ancaman, tantangan, hambatan, dan gangguan (ATHG) yang ada di masyarakat.<br>Mengkoordinasikan informasi:<br>Mengatur dan menyelaraskan data dan informasi yang terkumpul dari berbagai sumber.<br>Mengomunikasikan informasi:<br>Menyampaikan informasi kepada pihak terkait, termasuk Pemerintah Daerah, untuk menjadi bahan pertimbangan dalam pengambilan kebijakan.&nbsp;</p>', NULL, NULL, NULL, '2025-07-10 00:29:51', '2025-08-06 23:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `ormas`
--

CREATE TABLE `ormas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_organisasi` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `bidang` varchar(255) DEFAULT NULL,
  `sumber_data` varchar(255) DEFAULT NULL,
  `import_batch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ormas`
--

INSERT INTO `ormas` (`id`, `nama_organisasi`, `alamat`, `bidang`, `sumber_data`, `import_batch_id`, `created_at`, `updated_at`) VALUES
(730, 'YAYASAN ELMU NASIRULMATIIN', 'Pagarsih Barat No.340, RT.08, RW.10, Kel. Sukahaji, Kec. Babakan Ciparay', 'Sosial', 'verif', NULL, '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(731, 'YAYASAN CICADAS BANDUNG NGAHIJI', 'Jl. Sukalaksana No.09 RT.01/011 Kel. Cicaheum, Kec. Kiaracondong', 'Sosial dan Kemanusiaan', 'verif', NULL, '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(732, 'DPC. BULUTANGKIS WIRA MUDA INDONESIA KOTA BANDUNG', 'Komp. Aria Graha Regency Jl. Aria Selatan III No.16 Kel. Cipamokolan, Kec. Rancasari', 'Olahraga', 'verif', NULL, '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(733, 'PERSAUDARAAN SETIA HATI TERATE CABANG BANDUNG', 'Jl. Dirgantara IV No. 29 Kel. Gempolsari, Kec. Bandung Kulon', 'Olahraga, Sosial, Budaya', 'verif', NULL, '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(734, 'Perkumpulan Generasi Sembilan Tiga', 'Jl. Prof. Dr. Sutami No. 91, Kel. Sukarasa, Kec. Sukasari, Kota Bandung', 'Sosial Kemanusiaan', 'verif', NULL, '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(735, 'PD. Al- Jam’iyatul Washliyah Kota Bandung', 'Jl. Kawaluyaan Indah VI, RT.5 RW.6, Kel. Jatisari, Kec. Buahbatu, Kota Bandung', 'Dakwah, Pendidikan, Sosial', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(736, 'PW. Radio Antar Penduduk Indonesia Wilayah 12 Kota Bandung', 'Jl. Kadipaten Raya No. 5, Kel. Antapani Kidul, Kec. Antapani, Kota Bandung', 'Sosial', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(737, 'DPC. Perkumpulan Seluruh Pendeta Indonesia Raya Kota Bandung', 'Jl. Kawaluyaan Indah Ruko 3A,Kel. Jatisari, Kec. Buahbatu, Kota Bandung', 'Sosial', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(738, 'DPC. Perkumpulan Istri Veteran Republik Indonesia (PIVERI) Kota Bandung', 'Jl. Aceh No. 4, Kel. Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung', 'Sosial', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(739, 'BARISAN KEBANGKITAN NASIONAL (BARKIN)', 'Simpang 3 Derwati No. 25 RT.03/RW.06 Kel. Derwati, Kec. Rancasari, Kota Bandung', 'Sosial Kemasyarakatan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(740, 'PC. WANITA AL-IRSYAD KOTA BANDUNG', 'Jl. Cikutra No. 205 A RT.004 RW.002 Kec. Cibeunying Kaler, Kota Bandung', 'Pendidikan, Dakwah, Sosial', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(741, 'PD. PERSTUAN ISLAM (PERSIS) KOTA BANDUNG', 'Jl. Astanaanyar No. 310, Kel. Nyengseret, Kec. Astanaanyar, Kota Bandung', 'Sosial dan Keagamaan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(742, 'DPD. BARISAN PEMUDA NUSANTARA (BAPERA) KOTA BANDUNG', 'Jl. Mochammad Toha No. 146, Kel. Pelindung Hewan, Kec. Astanaanyar, Kota Bandung', 'Kepemudaan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(743, 'YAYASAN IKHSAN AL AZIZ BARPANI', 'Jl. Karees Timur No.164/121 RT.09 RW.09 Kel. Samoja, Kec. Batununggal, Kota Bandung', 'Pendidikan Sosial dan Keagamaan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(744, 'YAYASAN AL ISHLAH MABDAIL FALAH', 'Jl. Kebon Jayanti No.143 RT.004 RW.002 Kel. Kebon Jayanti, Kec. Kiaracondong, Kota Bandung', 'Sosial, Keagamaan, Kemanusiaan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(745, 'DPC. LSM KOREK KOTA BANDUNG', 'Jl. Astanaanyar NO.164 Pasar Anyar, Blok.A Lt:No.1-6, Kel. Nyengseret, Kec. Astanaanyar, Kota Bandung', 'Sosial Kontrol', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(746, 'DPC. GERAKAN MASYARAKAT PEDULI LINGKUNGAN', 'Jl. Manjahlega No.52, RT.03 RW.12 Kel. Manjahlega, Kec. Rancasari, Kota Bandung', 'Penggiat Peduli Lingkungan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(747, 'DPC. SINAR PEMUDA BANTEN KOTA BANDUNG', 'Jl. Cikutra Gg. Cukang Kawung RT.03 RW.13 Kel. Cigadung, Kec. Cibeunying Kaler, Kota Bandung', 'Seni dan Budaya', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(748, 'PERKUMPULAN WARGA PUNCLUT BERMARTABAT (PWPB)', 'Jl. Bukit Raya Atas Sekejulang RT.01 RW.02 Kel. Ciumbuleuit, Kec. Cidadap, Kota Bandung', 'Sosial', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(749, 'JURNALIS HUKUM BANDUNG (JBH)', 'Jl. Hercules No. 76-78, Kel. Cipedes, Kec. Sukajadi, Kota Bandung', 'Peliputan Jurnalistik Bidang Hukum', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(750, 'PANGGELAR NGERTAKEUN BUMI LAMBA', 'Jl. Dr. Curie No.01 Kel. Pasir Kaliki, Kec. Cicendo, Kota Bandung', 'Sosial Budaya', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(751, 'YAYASAN GUMILANG CAHAYA PASUNDAN', 'Jl. Maleber Gg. Srigunting I No.104 RT.001 RW.008 Kel. Maleber, Kec. Andir, Kota Bandung', 'Sosial', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(752, 'YAYASAN BUDILUHUR ORIGINAL NUSANTARA (BON)', 'Jl. Budi Luhur No.4 RT.007 RW.005 Kel. Gegerkalong, Kec. Sukasari, Kota Bandung', 'Pendidikan, Kesehatan, Sosial, Lingkungan Hidup dan Perlindungan Anak', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(753, 'YAYASAN BUMI SETIA BERBAKTI', 'Jl. A.H Nasution No. 51 RT.04 RE.01 Kel. Pasir Endah, Kec. Ujung Berung, Kota Bandung', 'Sosial, Kemanusiaan, Keagamaan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(754, 'YAYASAN PENGEMBANGAN KAPASITAS PEMUDA DAN KEOLAHRAGAAN (YAPKAPORA)', 'Jl. Suryalaya IX No.19 RT.008 RW.004 Kel. Cijagra Kec. Lengkong, Kota Bandung', 'Pemuda dan Keolahragaan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(755, 'PERKUMPULAN PEDAGANG PASAR SEDERHANA', 'Jl. Mukti No.7A RT.05 RW.10 Kel. Pasteur, Kec. Sukajadi, Kota Bandung', 'Sosial Kemasyarakatan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(756, 'PERKUMPULAN PENGGIAT LITERASI NASIONAL', 'Jl. Kencana Wangi Utara II/20 RT.010 RW.013 Kel. Cijawura, Kec. Buahbatu, Kota Bandung', 'Sosial, Pendidikan, Literasi', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(757, 'YAYASAN SANGKUR BUMI NEGERI', 'Jl. Sariwates 1-A No.6 RT.001 Kel. Antapani Kidul,Kec. Antapani, Kota Bandung', 'Sosial, Kemanusiaan, Keagamaan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(758, 'YAYASAN AMANAH DIFA INDONESIA', 'Jl. Cilandak 148, RT.03 RW.02 Kel. Sarijadi, Kec. Sukasari, Kota Bandung', 'Sosial, Kemanusiaan, Keagamaan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(759, 'YAYASAN PENATAAN DAN PEMBERDAYAAN PEDAGANG KAKI LIMA', 'Jl. Bogor No.2 RT.03 RW.07 Kel. Kacapiring, Kec. Batunung-gal, Kota Bandung', 'Sosial, Pendidikan, Keagamaan', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(760, 'DPC. LSM. PEMANTAU KINERJA APARATUR NEGARA (PENJARA)', 'Jl. Garuda Blk 100 No.18 RT.02 RW.05 Kel. Garuda, Kec. Andir Kota Bandung', 'Sosial Masyarakat', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(761, 'DPD. PERKUMPULAN PENGAMANAN ANUGERAH GARUDA (PAGAR) KOTA BANDUNG', 'Jl. Peta, Ruko Kopo Plaza No.A3 RT.09 RW.10 Sukaasih Bojongloa Kaler Bandung', 'Sosial Masyarakat', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(762, 'INSAN KELUARGA AHLI TEKSTIL BANDUNG RAYA BERDIKARI (IKAT BARAYA BERDIKARI)', 'Jl. Kopo No.594, Kel. Margasuka, Kec. Babakan Ciparay, Kota Bandung', 'Kekeluargaan, Kemasyarakatan, dan Profesi', 'verif', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(763, 'YAYASAN PENA KARYA HARMONIS', 'Jl. Jatihandap RT.2 RW.9 Kel. Jatihandap, Kec. Mandalajati, Kota Bandung', 'Pendidikan, Sosial, Lingkungan Hidup, Keagamaan', 'verif', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(764, 'YAYASAN SAKATA BANDUUNG', 'Jl. Sindang Sari II No.02, RT.06 RW.10, Kel. Antapani Wetan, Kec. Antapani, Kota Bandung', 'Sosial, Pendidikan, Kesenian', 'verif', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(765, 'YAYASAN AL-HAADII KOPO BOJONGLOA KALER', 'Jl. Soekarno Hatta Gg. Pusri RT.10 RW.04 Kel. Kopo, Kec. Bojongloa Kaler, Kota Bandung', 'Sosial, Kemanusiaan, Keagamaan', 'verif', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(766, 'DPC. JEMBATAN MASYARAKAT INDONESIA (JEMARI) KOTA BANDUNG', 'Jl. Singgasana No.67 A, RT.003 RW.001 Kel. Cibaduyut, Kec. Bojongloa Kidul, Kota Bandung', 'Sosial, Kemasyarakatan', 'verif', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(767, 'Paguyuban Warga Pasar Induk Gedebage (PWIG)', 'Jl. Soekarno Hatta Pasar Induk Gedebage RT.004 RW.006 Kel. Mekar Mulya, Kec. Panyileukan, Kota Bandung', 'Lingkungan Hidup Pengelolaan Sampah', 'verif', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(768, 'Parisada Hindu Dharma Indonesia Kota Bandung', 'Jl. Komp. Anggrek Residen No. C6 Jalan Rumah Sakit RT.01 RW.05 Kel. Sukamulya, Kec. Cinambo, Kota Bandung', 'Keagamaan Hindu', 'verif', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(769, 'DPC. Relawan Pelita Prabu Kota Bandung', 'Jl. Pluto Utara VI F3 RT.002 RW.014 Kel. Rancabolang, Kec. Gedebage, Kota Bandung', 'Sosial Kemasyarakatan', 'verif', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(770, 'DPD. Perkumpulan Pencak Silat Indonesia (PPSI) Kota Bandung', 'Jl. Cijagra III No. 12 RT.003 RW.002 Kel. Cijagra, Kec. Lengkong, Kota Bandung', 'Seni Budaya', 'verif', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(771, 'DPC. LSM KOMUNITAS PENGAWAS KORUPSI (KPK)', 'JL. H. Ibrahim Adjie, G. Babakan JATI 2 RT. 002/ 008, NO. 44, Kel. Binong, Kec. Batununggal, Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(772, 'FORUM AKSI GURU INDONESIA (FAGI) KOTA BANDUNG', 'Jl. Neglasari No. 10 Kel. Pasanggrahan Kec. Ujungberung Bandung', 'Pendidikan dan sosial', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(773, 'DPC. MANGGALA GARUDA PUTIH KOTA BANDUNG', 'Jl. Kebonjati No. 167 Bandung', 'Seni Budaya Sunda', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(774, 'PGRI KOTA BANDUNG', 'Gedung Guru Jalan Caringin No. 124 Bandung', 'Pendidikan', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(775, 'PC. FATAYAT NU KOTA BANDUNG', 'Jl. Sancang No. 08 Kel. Burangrang Kec. Lengkong Kota Bandung', 'Sosial keagamaan', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(776, 'DPD. PERKUMPULAN JURNALIS PEDULI MASYARAKAT KOTA BANDUNG', 'Jl. Pasirluyu No. 68-205 A RT.003/RW.002 Kel. Pasirluyu Kec. Regol Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(777, 'LSM. GERAKAN MASYARAKAT BAWAH INDONESIA (LSM. GMBI) DISTRIK KOTA BANDUNG', 'Jl. Baranang Siang No. 29 Kel. Kebon Pisang Kec. Sumur Bandung Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(778, 'GABUNGAN INISIATIF BARISAN ANAK SILIWANGI (GIBAS) DEWAN PIMPINAN RESORT BANDUNG', 'Jl. Peta Komp. Bumi Kopo Kencana Blok D7 Kel Sukaasih Kec Bojongloa Kaler Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(779, 'FORUM HONORER TENAGA ADMINISTRASI SEKOLAH', 'Jl. Kebon Jeruk III No. 47 RT 02/ RW 07 Kel. Derwati Kec. Rancasari Kota Bandung', 'Pendidikan', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(780, 'DPC. PERSATUAN WARTAWAN REPUBLIK INDONESIA KOTA BANDUNG', 'Jl. CipamoKolan No. 6 RT 01 / RW 08 Kel Cipamokolan Kec Rancasri Kota Bandung', 'Profesi', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(781, 'RUMAH CEMARA', 'Jl. Gegerkalong Girang No. 52 Bandung Kel. Isola Kec. Sukasari Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(782, 'DPC. LSM. WADAH GENERASI ANAK BANGSA (DPC. LSM.WGAB) KOTA BANDUNG', 'Jl. A. H. Nasution No. 51 RT 01/RW 11 Kel. Sukamiskin Kec. Arcamanik Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(783, 'JAGA MASJID', 'Jl. Laswi Gg. Slamet IV No. 85 / 122 RT. 03 / RW. 11 Kel. Samoja Kec. Batununggal Kota Bandung', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(784, 'PB. MUTIARA BANDUNG', 'Jl. Babakan Cibeureum No. 55 RT.01 RW.01 Kel. Cempaka Kec. Andir Kota Bandung', 'Olahraga', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(785, 'BANDUNG FOODTRUCK', 'Jl. Banjarsari raya No. 4 Kel. Antapani Tengah Kec. Antapani Kota Bandung', 'Pariwisata', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(786, 'PAGUYUBAN BANDUNG LAUTAN API KOTA BANDUNG', 'Jl. BKR No. 172 Kel. Ciateul Kec. Regol Kota Bandung', 'Sosial, ekonomi, budaya dan agama', 'lsm', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(787, 'PD. GERAKAN PEMUDA ISLAM INDONESIA KOTA BANDUNG', 'Jl. A. Yani RT.05/07 Kel. Kebonwaru Kec. Batununggal Kota Bandung', 'Keagamaan / kepemudaan / sosial / politik', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(788, 'PC. SYARIKAT ISLAM INDONESIA KOTA BANDUNG', 'Jl. Kavling Industri No.3 Kel. Cigondewah Kec. Bandung Kulon Kota Bandung.', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(789, 'DPC. LSM. PEMUDA MANDIRI PEDULI RAKYAT INDONESIA', 'Kp. Cigagak RT.01/014 Kel. Cipadung Kec. Cibiru Kota Bandung', 'Sosal', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(790, 'SPECIAL OLYMPICS INDONESIA', 'Jl. Sekepondok III No. 78 RT.07 RW.11 Kel. Padasuka Kec. Cibeunying Kidul Kota Bandung', 'Olahraga', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(791, 'DPD. IKATAN TUNANETRA MUSLIM INDONESIA KOTA BANDUNG', 'Komp. Griya Winaya Blok D3 RT. 06 RW. 12, Kel. Pasirwangi Kec. Ujungberung Kota Bandung', 'Pendidikan, pemberdayaan', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(792, 'FORUM SILATURAHMI LINTAS ORMAS GEDEBAGE (FOSILOGE) KOTA BANDUNG', 'Komp. Buana Soetta Residence Blok A 24 Kel. Cisaranten Kidul Kec. Gedebage Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(793, 'DPP. FORUM KEPEMUDAAN AMX INDONESIA', 'Jl. Sekepanjang I No. 5 RT.001 RW.010 Kel. Cikutra Kec. Cibeunying Kidul Kota Bandung', 'Lingkungan hidup, ekonomi, dan sosial budaya', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(794, 'DPC. FORUM KEPEMUDAAN AMX INDONESIA', 'Jl. Sekepanjang I No.5 RT 001 RW.010 Kel. Cikutra Kec. Cibeunying Kidul Kota Bandung', 'Lingkungan hidup, ekonomi, dan sosial budaya', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(795, 'KELUARGA BESAR PUTRA PUTRI POLRI (KBPPP) KOTA BANDUNG', 'Jl. Cijagra II No.3 B RT.01 RW. 07 Kel. Cijagra Kec. Lengkong Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(796, 'DPD. LEMBAGA PEJUANGAN HAK BURUH INDONESIA', 'Jl. Sadang Sari No. 6 Kel. Sekeloa Kec. Coblong Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(797, 'PERKUMPULAN OLAH RAGA USAHA NANTI ISTIRAHAT (POR UNI) BANDUNG', 'Cluster Green Baturaden B-3 Kel. Mekarjaya Kec. Rancasari Kota Bandung', 'Olahraga', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(798, 'DPC. LSM. GERAKAN MASYARAKAT ANTI KORUPSI KOTA BANDUNG', 'Komp. Griya Winaya A-5 No. 16 RT.01 RW. 12 Kel. Pasirwangi Kec. Ujungberung, Kota Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(799, 'ASOSIASI PENDETA INDONESIA', '<p>Jl. Soekarno Hatta 399 A 6 Kel. Karasak Kec. Astanaanyar Kota Bandung</p>', 'Keagamaan dan sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-24 04:11:35'),
(800, 'DPC. PERSATUAN PURNAWIRAWAN DAN WARAKAWURI TNI DAN POLRI (DPC. PEPABRI) KOTA BANDUNG', 'Jl. Sukabumi No. 32 Kel. Kacapiring Kec. Batununggal Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(801, 'PC. PERSATUAN ISTRI PURNAWIRAWAN (PC. PERIP) KOTA BANDUNG', 'Jl. Sukabumi No. 32 Kel. Kacapiring Kec. Batununggal Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(802, 'DPD. GERAKAN MASYARAKAT BERSATU KOTA BANDUNG', 'Jl. H. Sanusi - Rancacili RT. 02 RW. 02 Kel. Mekarjaya Kec. Rancasari Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(803, 'PERKUMPULAN CICADAS BANGKIT', 'Jl. Ahmad Yani No. 422 RT.003 RW. 007 Kel. Kebonwaru Kec. Batununggal Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(804, 'PATORADOS', 'Jl. Tongkeng No.48 D RT. 02 RW. 07 Kelurahan Merdeka Kecamatan Sumur Bandung, Kota Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(805, 'PERKUMPULAN PEMILIK HOTEL BUMI MELATI INDONESIA', 'Jl. Sukabumi No.42 RT.001 RW.006, Kelurahan Kacapiring Kecamatan Batununggal, Kota Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(806, 'PIMPINAN CABANG NAHDLATUL ULAMA KOTA BANDUNG', 'Jl. Sancang No.8 RT.008 RW.005 Kelurahan Burangrang, Kecamatan Lengkong, Kota Bandung', 'Sosial keagamaan', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(807, 'JAGA LEMBUR', 'Jl. Cicendo No. 4B Gedung Korpri Lantai 2 RT. 03 RW.02 Kelurahan Babakan Ciamis, Kecamatan Sumur Bandung, Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(808, 'IKATAN PEDAGANG BERSATU KOTA BANDUNG', 'Jl. Rajawali Timur No. 11 RT. 06 RW. 03 Kel. Ciroyom Kec. Andir Kota Bandung.', 'Profesi', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(809, 'LASKAR MERAH PUTIH INDONESIA', 'Jl. Mekarsari RT. 003/008 Kel. Sukamiskin Kec. Arcamanik Kota Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(810, 'LEMBAGA PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK (LP3A) KOTA BANDUNG', 'Jl. Cihampelas Gg. Bongkaran No.108 C RT. 003/015 Kel. Tamansari Kec. Bandung Wetan Kota Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(811, 'DPD. ORMAS BUAH BATU CORPS KOTA BANDUNG', 'Jl. Waas 1 No.10 Kel. Batununggal, Kec. Bandung Kidul, Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(812, 'PERKUMPULAN PENGUSAHA MEDIA PROMOSI INDONESIA', 'Jl. Sunda No. 93 A Bandung Kel. Merdeka Kec. Sumur Bandung Kota Bandung.', 'Profesi', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(813, 'PERKUMPULAN WIRAUSAHA BANDUNG', 'Jl. Cisaranten Wetan III No. 1 RT. 004 RW. 005 Kel. Cisaranten Wetan Kec. Cinambo Kota Bandung.', 'Profesi', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(814, 'DPD. JARINGAN PENGAWAS KEBIJAKAN PEMERINTAH KOTA BANDUNG', 'Jl. Parasdi No. 14 RT. 01 RW. 06 Kel. Situsaeur Kec. Bojongloa Kidul Kota Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(815, 'DPC. IKATAN PESANTREN INDONESIA KOTA BANDUNG', 'Jl. Pasirkunci RT. 002 RW.11 Kel. Pasirjati Kec. Ujungberung Kota Bandung', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(816, 'PC. PERGERAKAN MAHASISWA ISLAM INDONESIA (PC.PMII) KOTA BANDUNG', 'Jl. Yuda No. 3 RT.09 RW. 05 Kel. Balonggede Kec. Regol Kota Bandung', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(817, 'GERAKAN NASIONAL PENCEGAHAN KORUPSI REPUBLIK INDONESIA (GNPK-RI) PD. KOTA BANDUNG', 'Jl. Cinta Asih No. 178/122 RT.004 RW. 011 Kel. Samoja Kec. Batununggal Kota Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(818, 'DPD. INDEPENDEN NASIONALIS ANTI KORUPSI (DPD. INAKOR) KOTA BANDUNG', 'Jl. Pasirluyu No. 163 RT.05 RW.03 Kel. Pasirluyu Kec. Regol Kota Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(819, 'GERAKAN PEMUDA ANSOR KOTA BANDUNG', 'Jl. Sancang No. 8 Kel. Burangrang Kec. Lengkong Kota Bandung.', 'Sosial dan keagamaan', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(820, 'PC. LEMBAGA TAKMIR MASJID NAHDLATUL ULAMA KOTA BANDUNG', 'Jl. Sancang No. 8 Kel. Burangrang Kec. Lengkong Kota Bandung.', 'Sosial dan keagamaan', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(821, 'PC. PERSATUAN GURU NAHDLATUL ULAMA KOTA BANDUNG', 'Jl. Sancang No. 8 Kel. Burangrang Kec. Lengkong Kota Bandung', 'Pendidikan', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(822, 'DPC. PERKUMPULAN SATRIA SUNDA SAKTI KOTA BANDUNG', 'Serlok Bantaran Jl. Bukit Jarian V No.60 RT.06 RW.11 Kel. Hegarmanah, Kec. Cidadap, Kota Bandung', 'Seni Budaya', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(823, 'DPD. LASKAR BENTENG INDONESIA KOTA BANDUNG', 'Kp. Babakan RT.07 RW.04 Kelurahan Babakan Kecamatan Babakan Ciparay Kota Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(824, 'PC. IKATAN MAHASISWA MUHAMMADIYAH KOTA BANDUNG', 'Jl. Kadiapten Raya No. 4-6 Antapani, Kel. Antapani Kidul Kec. Antapani Kota Bandung', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(825, 'CIPTA KOMUNIKASI CENTER (CKC)', 'Jl. Cidurian Utara No.22 RT.02 RW.10 Kel. Sukapura Kec. Kiaracondong Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(826, 'DPD. AGOTAX KOTA BANDUNG', 'Jl. Lodaya 20 A Kel. Burangrang Kec. Lengkong Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(827, 'DPC. HPSI GADJAH PUTIH MEGA PAKSI PUSAKA KOTA BANDUNG', 'Jl. Inhofthank No. 12 RT.03 RW. 04 Kel. Pelindung Hewan Kec. Astana Anyar Kota Bandung.', 'Sosial budaya', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(828, 'LASKAR MERAH PUTIH KOTA BANDUNG', 'Gg. H. Hasan II RT.002 RW.007 Kel. Babakan Ciparay Kec. Babakan Ciparay Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(829, 'DPD. LEMBAGA DAKWAH ISLAM INDONESIA (DPD. LDII) KOTA BANDUNG', 'Jl. Bijaksana II No. 10 RT.03 RW.10 Kel. Pasteur Kec. Sukajadi Kota Bandung', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(830, 'BPD. IKATAN MAHASISWA ANGKATAN MUDA SILIWANGI (IMA AMS) KOTA BANDUNG', 'Jl. Braga No. 25 B Kel. Braga Kec. Sumur Bandung Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(831, 'JARINGAN MAKMUR NUSANTARA KOTA BANDUNG', 'Jl. Dungusema II No.6A/203 RT.03 RW.03 Kelurahan Ciseureuh Kecamatan Regol Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(832, 'PD. MATHLA’UL ANWAR KOTA BANDUNG', 'Jl. Jalaprang No. 27 Blok A RT.01 RW.09 Kelurahan Sukaluyu Kecamatan Cibeunying Kaler Kota Bandung', 'Sosial dan keagamaan', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(833, 'DPC. PERKUMPULAN PENYANDANG DISABILITAS INDONESIA (PPDI) KOTA BANDUNG', 'Jl. Pajajaran No. 52 RT. 06 RW. 03 Kelurahan Pasirkaliki Kecamatan Cicendo Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(834, 'DPC. LSM. PEMANTAU KINERJA APARATUR NEGARA (LSM. PENJARA) KOTA BANDUNG', 'Cluster Pratama Asri No. 7 Jl. Simpang Cigaringsing RT.006 RW. 004 Kelurahan Pasir Endah Kecamatan Ujungberung Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(835, 'DPC. BADAN PEMBINAAN POTENSI KELUARGA BESAR BANTEN (DPC. BPPKB) KOTA BANDUNG', 'Jl. Tamim No. 33 Kelurahan Kebon Jeruk Kecamatan Andir Kota Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(836, 'DPC. PERSATUAN ARTIS MUSIK MELAYU DANGDUT INDONESIA (PAMMI) KOTA BANDUNG', 'Jl. H. Alpi No. 42 Kelurahan Cibuntu Kecamatan Bandung Kulon Kota Bandung', 'Profesi', 'lsm', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(837, 'DPD JARINGAN PENDAMPING KINERJA PEMERINTAH (JPKP) KOTA BANDUNG', 'Jl. Kebonlega 2 RT.006 RW.001 Kelurahan Kebonlega Kecamatan Bojongloa Kidul Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(838, 'GERAKAN BAKTI CENDANA (GBC) KORDA KOTA BANDUNG', 'Jl. Trs. PSM No. 94 Rt.04 Rw.06 Kelurahan Sukapura Kecamatan Kiaracondong', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(839, 'DPD. HIMPUNAN PETERNAK PENGGEMAR AYAM PELUNG INDONESIA (HIPPAPI) KOTA BANDUNG', 'Jl. Jatihandap RT. 001 RW. 009 Kel. Jatihandap Kec. Mandalajati, Kota Bandung', 'Seni Budaya', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(840, 'DPC. LASKAR GARUDA INDONESIA (LGI) KOTA BANDUNG', 'Jl. Randu Sari I No.10 Antapani Kelurahan Antapani Wetan Kecamatan Antapani Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(841, 'DPC. LSM. PANDIKA SILIWANGI NUSANTARA (LSM. PSN) KOTA BANDUNG', 'Jl. Sukagalih Gg. Pak Elas VI No. 228 RT.04 RW.08 Kelurahan Cipedes, Kecamatan Sukajadi Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(842, 'DPC. PERKUMPULAN MOONRAKER KOTA BANDUNG', 'Jl. Embah Jaksa No. 10 RT/RW. 02/01 Kelurahan Cipadung, Kecamatan Cibiru Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(843, 'DPC. LSM. KOMUNITAS PEDULI RAKYAT (LSM. KPR) KOTA BANDUNG', 'Jl. Pelindung Hewan No. 25 Kel. Pelindung Hewan Kec. Astanaanyar Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(844, 'PERKUMPULAN PEDAGANG PASAR BARU TRADE CENTER (P3BTC) KOTA BANDUNG', 'Jl. Otista No.70 Rt.01/01 Pasar Baru Trade Center Lt.1 Blok A2 Kelurahan Kebon Jeruk Kecamatan Andir Bandung', 'Profesi', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(845, 'DPD. GENTRA MACAN ASIA KOTA BANDUNG', 'Jl. Babakan Sumedang RT.06 RW.15 Kelurahan Babakan Surabaya Kecamatan Kiaracondong Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(846, 'DPC. PROFESIONAL JARINGAN MITRA NEGARA (DPC. PROJAMIN) KOTA BANDUNG', 'Jln. Melania IV No. 5 RT. 05 RW.01 Kel. Cihaurgeulis Kec. Cibeunying Kaler Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(847, 'PATRIOT MUDA BERBANGSA', 'Kp. Babakan Dangdeur No. 19 RT.04 RW.04 Kel. Pasir Biru Kec. Cibiru Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(848, 'PD. KESATUAN AKSI MAHASISWA MUSLIM INDONESIA (PD. KAMMI) BANDUNG', 'Jl. Cisebe No. 1 Kel. Sukamaju Kec. Cibeunying Kidul Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(849, 'GLOBAL PENGGIAT WISATA INDONESIA (GPWI)', 'Jl. Soekarno Hatta No.105 RT.003 RW.008 Kel. Babakan, Kec. Babakan Ciparay, Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(850, 'PD. HIMPUNAN MAHASISWI PERSATUAN ISLAM INDONESIA (HIMI PERSIS)', 'Jl. Astanaanyar No. 310 RT.06 RW. 07 Kel. Nyengseret Kec. Astanaanyar Kota Bandung', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(851, 'DPW. BRIGEZ INDONESIA', 'Jl. Trs. Leo no.15 Rt. 010 Rw. 009 Kelurahan Gumuruh Kecamatan Batununggal Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(852, 'PERKUMPULAN YAKSA PELESTARI BUMI BERKELANJUTAN', 'Jl. Batik Uwit No.1 Rt. 009 Rw. 007 Kelurahan Sukaluyu Kecamatan Cibeunying Kaler Bandung', 'Lingkungan Hidup', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(853, 'LEMBAGA KAMPOENG BELAJAR', 'Kp. Sukaasih RT. 003 dan RT. 005/RW. 009 Kel. Sindangjaya Kec. Mandalajati Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(854, 'PERKUMPULAN PEDAGANG WARINGIN BERSATU', 'Jl. Jamika Gg. Siti Mariah 1 RT.01 RW.02 No. 400 Kel. Jamika Kec. Bojongloa Kaler Bandung', 'Profesi', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(855, 'DPD. PERKUMPULAN GURU PENDIDIKAN AGAMA ISLAM INDONESIA KOTA BANDUNG', 'Jl. Cibiru Tonggoh No. 23 RT. 003 RW. 008 Kel. Pasir Biru Kec. Cibiru Kota Bandung.', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(856, 'PD. PEMUDA PERSIS KOTA BANDUNG', 'Jl. Astanaanyar No. 310 Kel. Nyengseret Kec. Astanaanyar Bandung', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(857, 'DPC. PEMUDA BATAK BERSATU KOTA BANDUNG', 'Jl. Sukapura RT. 001 RW. 006 No. 37 Kel. Antapani Kulon Kec. Antapani Bandung', 'Ekonomi, Sosial dan Budaya', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(858, 'PERKUMPULAN KELUARGA BERENCANA INDONESIA CABANG KOTA BANDUNG', 'Jl. Pasirkaliki No. 26 RT.02 RW.04 Kel. Kebon Jeruk Kec. Andir Bandung', 'Sosial dan Pendidikan', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(859, 'DPD. KEBANGKITAN SUNDA BERSATU INDONESIA KOTA BANDUNG', 'Jl. Rancabentang II No. 31 RT.07 RW.06 Kel. Ciumbuleuit Kec. Cidadap Bandung', 'Ekonomi, Sosial dan Budaya', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(860, 'DEWAN MUSYAWARAH DAERAH ALIRAN KEBATINAN “PERJALANAN” KOTA BANDUNG', 'Jl. Babakan Ciparay No. 302/196A RT.01 RW.011 Kel. Kopo Kec. Bojongloa Kaler Bandung', 'Kepercayaan Terhadap Tuhan YME', 'lsm', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(861, 'DPC. POROS SAHABAT NUSANTARA KOTA BANDUNG', 'Jl. Babakan Tarogong Gg. Bojong Asih III RT.003 RW.004 Kel. Babakan Tarogong Kec. Bojongloa Kaler Bandung', 'Sosial dan Pendidikan', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(862, 'PERKUMPULAN SALAM TRETAN SATEJEH SITUNG DEUREUH BANDUNG BERSATU', 'Jl. Karees Kulon No. 23/33 RT. 05 RW 05 Kel. Malabar Kec. Lengkong Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(863, 'DPC. LSM GARDA BANGSA REFORMASI KOTA BANDUNG', 'Jl. Hegarmanah Kulon Gg. Hj, Sobandi No. I Rt.05 Rw.08 Kel. Hegarmanah Kec. Cidadap Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(864, 'DEWAN MASJID INDONESIA KOTA BANDUNG', 'Jl. Wastukencana no.27 Bandung', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(865, 'DPC PEMUDA DEMOKRAT KOTA BANDUNG', 'Gd. Green Kosambi Lt.I jl. Jenderal A. Yani No. 134/136 Kel. Malabar Kec. Lengkong Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(866, 'PANGLIMA JAWA BARAT BERSATU KORDA KOTA BANDUNG', 'Jl. Raya Cikadut No.32 RT. 01 RW.04, Babakan Sulaeman Kel. Karangpamulang Kec. Mandalajati Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(867, 'MITRA KOMANDO GARNISUN TETAP DUA BANDUNG', 'Jl. Nias No. 3 Kelurahan Babakan Ciamis Kecamatan Sumur Bandung, Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(868, 'FORUM SILATURAHMI ORGANISASI ISLAM (FSOI) KOTA BANDUNG', 'Jl. Cibiru Tonggoh RT. 03 RW.08 Kelurahan Pasirbiru Kecamatan Cibiru Bandung', 'Sosial Keagamaan', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(869, 'LEMBAGA GERAKAN LASKAR PRO 08 RESORT KOTA BANDUNG', 'Babakan Sentral No. 103 RT.06 RW.05 Kelurahan Sukapura Kecamatan Kiaracondong Bandung', 'Sosial Kemasyarakatan', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(870, 'HEDJO INSTITUTE', 'Jl. Bumi Asih No. 25 RT.001 RW.005 Kel. Cipamokolan Kec. Rancasari Bandung', 'Sosial dan lingkungan hidup', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(871, 'DPC. PATRIOT PEMERSATU BANTEN NASIONAL INDONESIA KOTA BANDUNG', 'Jl. Dirgantara VIII Blok Reungas No. 45 RT.004 RW.006 Kel. Gempolsari Kec. Bandung Kulon Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(872, 'DPC. LEMBAGA SILAMBAWIQRI BANTEN KOTA BANDUNG', 'Jl. Ahmad Yani No. 262 SOR Sidolig Persib Kel. Kacapiring Kec. Batununggal Bandung.', 'Ekonomi, Sosial dan Seni Budaya', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(873, 'DPP. FORUM SILATURAHMI ANTAR KOMUNITAS SELURUH INDONESIA', 'Jl. Pasir Impun Barat No. 171 RT.004 RW.009 Kel. Karang Pamulang Kec. Mandalajati Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(874, 'DPC. ORMAS INDONESIA BERSATU KOTA BANDUNG', 'Jl. Cibangkong RT. 001 RW. 011 Kel.Cibangkong Kec. Batununggal Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(875, 'DPD. PERKUMPULAN SATRIA KIANSANTANG BARISAN REFORMASI KOTA BANDUNG', 'Jl. Babakan Irigasi Kaler No. 30/89 RT.003 RW.004 Kel. Cibadak Kec. Astanaanyar Kota Bandung.', 'Ekonomi, Sosial dan Seni Budaya', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(876, 'DPC. IKATAN PENULIS DAN JURNALISTIK INDONESIA KOTA BANDUNG', 'Jl. Banjir Sari No. 47 Kel. Sukamiskin Kec. Arcamanik Kota Bandung.', 'Profesi', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(877, 'PENGURUS PERSATUAN WREDATAMA REPUBLIK INDONESIA KOTA BANDUNG', 'Terusan Jl. Dipenogoro/Muararajeun Lama No. 68 S/144 E Kel. Cihaurgeulis Kec. Cibeunying Kaler Kota Bandung', 'Kesamaan Kegiatan', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(878, 'DPC. FORUM KOMUNIKASI KADERISASI GENERASI DEMOKRASI KOTA BANDUNG', 'Komp. Riung Bandung Jl. Riung Hegar Raya No. 19 & 22 Kel. Cisaranten Kidul Kec. Gedebage Kota Bandung', 'Ekonomi', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(879, 'PERKUMPULAN PENYANYI JALANAN KOTA BANDUNG', 'Jl. Derwati RT. 001 RW. 003 Kel. Derwati Kec. Rancasari Kota Bandung', 'Seni Budaya', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(880, 'KOMUNITAS MASYARAKAT USAHA KREATIF MANDIRI KOTA BANDUNG', 'Jl. Caringin No. 88 RT. 002 RW. 004 Kel. Babakan Ciparay Kec. Babakan Ciparay Kota Bandung', 'Ekonomi', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(881, 'BKD. FORUM KADER BELA NEGARA KOTA BANDUNG', 'Jl. Terusan Pasir Koja No. 58, RT 003 RW 005 Kel. Cibadak Kec. Astanaanyar Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(882, 'DPW. RAJAWALI GARDA PEMUDA INDONESIA KOTA BANDUNG', 'Jl. Asia Afrika No. 90, Kel. Cikawao Kec. Lengkong Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(883, 'PERKUMPULAN JUANG KENCANA KOTA BANDUNG', 'Jl. Sukaharja I No.95 RT. 04 RW. 03 Kel. Sukapada Kec. Cibeunying Kidul, Kota Bandung', 'Kesamaan Kegiatan', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(884, 'DPD. AHLULBAIT INDONESIA KOTA BANDUNG', 'Jl. Gegerkalong Girang No. 90 RT. 03 RW. 06 Kel. Isola Kec. Sukasari Kota Bandung', 'Sosial, Pendidikan, Kemanusiaan, Keagamaan dan Kemasyarakatan', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(885, 'PC. PEMUDA PANCA MARGA KOTA BANDUNG', 'Jl. Aceh No. 4 Kel. Babakan Ciamis Kec. Sumur Bandung, Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(886, 'DPD. PRABHU INDONESIA JAYA KOTA BANDUNG', 'Jl. Ancol Utara I No. 44 B/36 D RT. 002 RW. 007 Kel. Balongggede Kec. Regol, Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(887, 'DPD. GENERASI MUDA KEADILAN KOTA BANDUNG', 'Jl. Bojong Raya 80 Kel. Caringin Kec. Bandung Kulon Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(888, 'PERSATUAN WARTAWAN INDONESIA KOTA BANDUNG', 'Jl. Jend. Ahmad Yani (Komp. Stadion Persib) No. 262 Kel. Kacapiring Kec. Batununggal Kota Bandung', 'Profesi', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(889, 'DPC. BINTANG MUDA INDONESIA DEMOKRAT KOTA BANDUNG', 'Jl. Raya Cibeunying Kolot No. 91 RT.01 RW.21 Kel. Sadang Serang Kec. Coblong Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(890, 'DPC CENDEKIAWAN ANAK PAHLAWAN KOTA BANDUNG', 'Jl. Santosa Asih IV Blok N1 No.32 RT.08 RW.05 Kelurahan Cipamokolan Kecamatan Rancasari Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(891, 'DPC GAGAK LUMEJANG KOTA BANDUNG', 'Komp. Pasanggrahan Indah Blok 21 No.38 RT. 004 RW. 014 Kelurahan Pasanggrahan Kecamatan Ujungberung Kota Bandung', 'Sosial, Ekonomi dan Budaya', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(892, 'LEMBAGA PENELITIAN PENGEMBANGAN PELAYANAN DAN PEMBERDAYAAN INDONESIA', 'Jl. Kebaktian I Kampus V No.13 RT.005 RW.008 Kelurahan Babakansari Kecamatan Kiaracondong Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(893, 'DPC. PERKUMPULAN WARGA SATYA INDONESIA KOTA BANDUNG', 'Jl. Muara Timur No.25 RT.05 RW. 05 Kelurahan Pelindung Hewan Kecamatan Astanaanyar Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(894, 'DPC. MITRA KOMUNIKASI BAKTI NEGERI KOTA BANDUNG', 'Jl. Soma Selatan No.18 RT.003 RW.001 Kelurahan Babakansari Kecamatan Kiaracondong Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(895, 'SENTRA KOMUNIKASI MITRA POLRI KOTA BANDUNG', 'Jl. Talaga Bodas No. 94 Kelurahan Lingkar Selatan Kecamatan Lengkong Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(896, 'DPD. BADAN KOMUNIKASI PEMUDA REMAJA MASJID INDONESIA KOTA BANDUNG', 'Jl. Wastukencana No. 27 Kelurahan Babakan Ciamis Kecamatan Sumur Bandung, Kota Bandung', 'Kepemudaan dan keagamaan', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(897, 'LASKAR MERAH PUTIH PERJUANGAN', 'Jl. Bata Merah No. 14 RT.004 RW.002 Kelurahan Caringin Kecamatan Bandung Kulon Kota Bandung', 'Pembangunan Kebangkitan Nasional', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(898, 'DEPICAB. SOKSI KOTA BANDUNG', 'Jl. Trs. Halimun II No. 5 RT.003 RW.005 Kel. Lingkar Selatan Kec. Lengkong Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(899, 'PADEPOKAN MAENPO GIRI PUSAKA', 'Jl. Giri Rahayu III No. 9 RT. 01 RW.04 Komp. Simpay Asih', 'Budaya', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(900, 'DPC. IKATAN WANITA PENGUSAHA INDONESIA KOTA BANDUNG', 'Jl. Cetarip Kulon I No. 157 RT. 004 RW. 009 Kel. Kopo Kec. Bojongloa Kaler Kota Bandung', 'Sosial dan Ekonomi', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(901, 'SENTRAL ORGANISASI KARYAWAN SWADIRI INDONESIA KOTA BANDUNG', 'Jl. H. Kurdi I No.1 RT.001 RW.001 Kel. Karasak Kec. Astanaanyar Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(902, 'IKATAN CENDEKIAWAN MUSLIM SE INDONESIA ORDA KOTA BANDUNG', 'Jl. Cikutra No. 276 D Kel. Neglasari Kec. Cibeunying Kidul Kota Bandung', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(903, 'DPD. PERKUMPULAN DOSEN PENELITI INDONESIA KOTA BANDUNG', 'Jl. Gegerkalong Hilir No.10 Kel. Gegerkalong Kec. Sukasari, Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(904, 'DPC. LSM. BIMA SAKTI WIBAWA MUKTI KOTA BANDUNG', 'Jl. Melong Asih No. 69 A RT. 007 RW. 008 Kel. Cijerah Kec. Bandung Kulon, Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(905, 'DPC. PERSATUAN TUNANETRA INDONESIA (PERTUNI) KOTA BANDUNG', 'Jl. Citepus II No. 112 RT.09 RW.06 Kel. Pajajaran, Kec. Cicendo Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(906, 'DPC. LSM BALADHIKA ADYAKSA NUSANTARA', 'Jl. Boscha no. 2 Kel. Pasteur Kec. Sukajadi Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(907, 'PIMPINAN DAERAH KOLEKTIF KOSGORO KOTA BANDUNG', 'Jl. Gegerkalong Hilir No.10 Kel. Gegerkalong Kec. Sukasari, Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(908, 'DPP. CORPS BRIGADE BARISAN RAKYAT (COBRA)', 'Komp. Bumi Panyileukan Blok H-7 No. 9 Kel. Cipadung Kidul Kec. Panyileukan, Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(909, 'DPC. ORGANISASI MASYARAKAT BERBASIS ANTI ANARKIS DAN KEKERASAN (OMBAK) KOTA BANDUNG', 'Jl. Kebon Sirih IV No. 133/5B, RT.08 RW.08, Kel. Babakan Ciamis Kec. Sumur Bandung Kota Bandung', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(910, 'DPD. Persatuan Ummat Islam (PUI) Kota Bandung', 'Jl. Susmita No. 342A/41 Cikaso, Kel. Sukamaju Kec. Cibeunying Kidul Kota Bandung', 'Keagamaan', 'lsm', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(911, 'DPC. Forum Kota Tua (FAKTA) Kota Bandung', 'Jl. Cicukang RT. 004 RW. 008 Kel. Cisaranten Bina Harapan Kec. Arcamanik, Kota Bandung.', 'Sosial', 'lsm', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(912, 'PERKUMPULAN PENGGIAT LITERASI NASIONAL (PELITNAS)', 'Jl. Kencana Wangi Utara II/20 RT.010 RW.013 Kel. Cijawura, Kec. Buahbatu, Kota Bandung', 'Sosial, Pendidikan, Literasi', 'lsm', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(913, 'YAYASAN ANUGERAH INSAN RESIDIVIST', 'Jl. Jamika Gg. Bah Karso RT.010 RW.006 Kel. Sukahaji Kec. Babakan Ciparay Kota Bandung', 'Sosial, Kemanusiaan dan Keagamaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(914, 'Yayasan Sapu Jagat Al Iklas Kota Bandung', 'Trs Suryani RT.007 RW.003 Kel. Warung Muncang, Kec. Bandung Kulon, Kota Bandung', 'Sosial, Kemanusiaan dan Keagamaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(915, 'YAYASAN PERGURUAN BELA DIRI MACAN PUSAKA NUSANTARA DPC. KOTA BANDUNG', 'Jl. Ciwastra Empang II RT 003 RW 006 Mekarjaya Rancasari Kota Bandung', 'Sosial, Keagamaan, Kemanusiaan dan Pendidikan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(916, 'YAYASAN KELOMPOK BAKTI SOSIAL PENGUSAHA', 'Jl. Setiabudhi No. 170 A RT.03 RW.05 Kel. Hegarmanah Kec. Cidadap Bandung', 'Sosial, Keagamaan dan Kemanusiaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(917, 'YAYASAN FATHURROBBAANIY KOTA BANDUNG', 'Jl. Pasar Sindanglaya No. 78 RT. 002 RW. 001 Kelurahan Cisaranten Bina Harapan Kecamatan Arcamanik Bandung.', 'Sosial, Keagamaan dan Kemanusiaan Pendidikan, Keagamaan, Sosial dan Kemanusiaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(918, 'DPD YAYASAN PERGERAKAN ANTI NAPSA NUSANTARA AMARTHA KOTA BANDUNG', 'Jl. A. Yani No. 262 Rt.02 RW. 02 ( Lapang Persib Sidolig) Kel. Kacapiring Kec. Batununggal Bandung', 'Sosial dan Kemanusiaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(919, 'YAYASAN MANUSIA WELAS ASIH (MAWAS CENTRE)', 'Jl. Embah Malim No. 18 RT. 003 RW. 004 Kel. Babakan Sari Kec. Kiaracondong Kota Bandung', 'Sosial, Kemanusiaan dan Keagamaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(920, 'YAYASAN KAMPUNG FILM INDONESIA', 'Jl. Parakansaat RT.005 RW.006 Kel. Cisaranten Endah, Kec. Arcamanik. Kota Bandung', 'Sosial', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(921, 'YAYASAN SAJIWA SEMBAGI ARUTALA', 'Jl. Setra Dago Utara No. 64 Kel. Antapani Wetan Kec. Antapani Kota Bandung', 'Sosial, Kemanusiaan dan Keagamaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(922, 'YAYASAN PENDIDIKAN DAARUL FAJR CIPAGALO GIRANG', 'Jl. Cipagalo Girang No.87 RT.008 RW.007 Kel. Margasari, Kec. Buahbatu, Kota Bandung', 'Pendidikan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(923, 'YAYASAN CITRA KARYA ASIH', 'Jl. Cidurian Utara No. 99 C RT. 001 RW. 013 Kel. Sukapura Kec. Kiaracondong Kota Bandung', 'Sosial, Kemanusiaan dan Keagamaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(924, 'YAYASAN MAHAD RAUDHATUL MAHMUDIYAH', 'Jl. Jatihandap No. 13 RT.006 RW.005 Kelurahan Jatihandap Kecamatan Mandalajati Kota Bandung', 'Sosial, Keagamaan dan Pendidikan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(925, 'Yayasan Gapura Manuja Semesta (GAMASE)', 'Jl. Lombok No. 11RT.004 RW.003 Kel. Merdeka, Kec. Sumur Bandung', 'Sosial, Kemanusiaan dan Keagamaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(926, 'Yayasan Sawitri Sejahtera Indonesia', 'Jl. Cibatu 10 No.8 Kel. Antapani tengah Kec. Antapani Bandung', 'Sosial, Kemanusiaan dan Keagamaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(927, 'Yayasan Marwah Wakaf Indonesia', 'Jl. Golf Raya No. 11 RT.003 RW.011 Kel. Cisaranten Bina Harapan Kec. Arcamanik, Kota Bandung', 'Sosial, Kemanusiaan dan Keagamaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(928, 'Yayasan Generasi Anti Narkotika dan Kriminalitas', 'Jl. Sandang No. 26 Cirengot RT.03/RW.02 Kel. Sukamulya, Kec. Cinambo, Kota Bandung', 'Ekonomi, Sosial, Lingkungan Hidup, Pendidikan & Latiham dan Hukum dan HAM', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(929, 'Yayasan Pandawa Putra Indonesia Cabang Kota Bandung', 'Jl. KH. Wahid Hasyim/Kopo Gg. Melati II No.2 RT.003/RW.002 Kel. Margasuka, Kec. Babakan Ciparay, Kota Bandung', 'Sosial, Kemanusiaan dan Keagamaan', 'yayasan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `paslons`
--

CREATE TABLE `paslons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_pemilu` varchar(255) NOT NULL DEFAULT 'pilpres',
  `no_urut` int(11) NOT NULL,
  `tahun_pemilu` year(4) NOT NULL,
  `partai_pengusung` varchar(255) NOT NULL,
  `total_suara` bigint(20) NOT NULL DEFAULT 0,
  `capres_nama` varchar(255) NOT NULL,
  `capres_foto` varchar(255) DEFAULT NULL,
  `capres_tempat_lahir` varchar(255) NOT NULL,
  `capres_tanggal_lahir` date NOT NULL,
  `capres_jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `capres_riwayat_pendidikan` text DEFAULT NULL,
  `capres_riwayat_pekerjaan` text DEFAULT NULL,
  `cawapres_nama` varchar(255) NOT NULL,
  `cawapres_foto` varchar(255) DEFAULT NULL,
  `cawapres_tempat_lahir` varchar(255) NOT NULL,
  `cawapres_tanggal_lahir` date NOT NULL,
  `cawapres_jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `cawapres_riwayat_pendidikan` text DEFAULT NULL,
  `cawapres_riwayat_pekerjaan` text DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paslons`
--

INSERT INTO `paslons` (`id`, `jenis_pemilu`, `no_urut`, `tahun_pemilu`, `partai_pengusung`, `total_suara`, `capres_nama`, `capres_foto`, `capres_tempat_lahir`, `capres_tanggal_lahir`, `capres_jenis_kelamin`, `capres_riwayat_pendidikan`, `capres_riwayat_pekerjaan`, `cawapres_nama`, `cawapres_foto`, `cawapres_tempat_lahir`, `cawapres_tanggal_lahir`, `cawapres_jenis_kelamin`, `cawapres_riwayat_pendidikan`, `cawapres_riwayat_pekerjaan`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, 'pilpres', 1, '2024', 'Partai Kebangkitan Bangsa, Partai Keadilan Sejahtera, Partai NasDem', 546484, 'H. ANIES RASYID BASWEDAN, Ph.D.', 'images/pemilu/1754576287_capres_AuCoMcP1H0tHd4ESk1ZsybVpuMomSAyLQ8JLMDhb.jpg', 'Kuningan', '1969-05-07', 'Laki-laki', 'S3', 'Karyawan Swasta', 'Dr. (H.C.) H. A. MUHAIMIN ISKANDAR', 'images/pemilu/1754576287_cawapres_UIr2bYZ7EVcZr81Mb3tmFKBPb55VE6QMkoayHUne.jpg', 'Jombang', '1966-09-24', 'Laki-laki', 'S2', 'Wakil Ketua DPR RI', 'Indonesia Adil Makmur Untuk Semua', 'Misi 1\r\nMemastikan Ketersediaan Kebutuhan Pokok dan Biaya Hidup Murah melalui Kemandirian Pangan, Ketahanan Energi, dan Kedaulatan Air.\r\n\r\nMisi 2\r\nMengentaskan Kemiskinan dengan Memperluas Kesempatan Berusaha dan Menciptakan Lapangan Kerja, Mewujudkan Upah Berkeadilan, Menjamin Kemajuan Ekonomi Berbasis Kemandirian dan Pemerataan, serta Mendukung Korporasi Indonesia Berhasil di Negeri Sendiri dan Bertumbuh di Kancah Global.\r\n\r\nMisi 3\r\nMewujudkan Keadilan Ekologis Berkelanjutan untuk Generasi Mendatang.\r\n\r\nMisi 4\r\nMembangun Kota dan Desa Berbasis Kawasan yang Manusiawi, Berkeadilan dan Saling Memajukan.\r\n\r\nMisi 5\r\nMewujudkan Manusia Indonesia yang Sehat, Cerdas, Produktif, Berakhlak, dan Berbudaya.\r\n\r\nMisi 6\r\nMewujudkan Keluarga Indonesia yang Sejahtera dan Bahagia sebagai Akar Kekuatan Bangsa.\r\n\r\nMisi 7\r\nMemperkuat Sistem Pertahanan dan Keamanan Negara, serta Meningkatkan Peran dan Kepemimpinan Indonesia dalam Arena Politik Global untuk Mewujudkan Kepentingan Nasional dan Perdamaian Dunia.\r\n\r\nMisi 8\r\nMemulihkan Kualitas Demokrasi, Menegakkan Hukum dan HAM, Memberantas Korupsi Tanpa Tebang Pilih, serta Menyelenggarakan Pemerintahan yang Berpihak pada Rakyat', '2025-08-07 07:18:07', '2025-08-07 07:18:07'),
(2, 'pilpres', 2, '2024', 'PAN, GOLKAR, GERINDA, PERINDO, PSI', 813925, 'H. PRABOWO SUBIANTO', 'images/pemilu/1754576523_capres_ToLDxICMG9W2NxlOBkVAh9pkJHqJR4wKw9hJgaYh.jpg', 'Jakarta', '1951-10-17', 'Laki-laki', 'D3', 'Menteri Pertahanan Republik Indonesia', 'GIBRAN RAKABUMING RAKA', 'images/pemilu/1754576523_cawapres_XtBX5Svx3jMD4YDO0Am1Yeg1eHoDEQ9pEi4XvSuo.jpg', 'Surakarta', '1987-10-01', 'Laki-laki', 'S1', 'Wali Kota Surakarta', 'Bersama Indonesia Maju Menuju Indonesia Emas 2045', 'Misi Asta Cita:\r\n\r\n1. Memperkokoh ideologi Pancasila, demokrasi, dan hak asasi manusia (HAM).\r\n2. Memantapkan sistem pertahanan keamanan negara dan mendorong kemandirian bangsa melalui swasembada pangan, energi, air, ekonomi syariah, ekonomi digital, ekonomi hijau, dan ekonomi biru.\r\n3. Melanjutkan pengembangan infrastruktur dan meningkatkan lapangan kerja yang berkualitas, mendorong kewirausahaan, mengembangkan industri kreatif serta mengembangkan agro-maritim industri di sentra produksi melalui peran aktif koperasi.\r\n4. Memperkuat pembangunan sumber daya manusia (SDM), sains, teknologi, pendidikan, kesehatan, prestasi olahraga, kesetaraan gender, serta penguatan peran perempuan, pemuda (generasi milenial dan generasi Z), dan penyandang disabilitas.\r\n5. Melanjutkan hilirisasi dan mengembangkan industri berbasis sumber daya alam untuk meningkatkan nilai tambah di dalam negeri.\r\n6. Membangun dari desa dan dari bawah untuk pertumbuhan ekonomi, pemerataan ekonomi, dan pemberantasan kemiskinan.\r\n7. Memperkuat reformasi politik, hukum, dan birokrasi, serta memperkuat pencegahan dan pemberantasan korupsi, narkoba, judi, dan penyelundupan.\r\n8. Memperkuat penyelarasan kehidupan yang harmonis dengan lingkungan, alam dan budaya, serta peningkatan toleransi antarumat beragama untuk mencapai masyarakat yang adil dan makmur.', '2025-08-07 07:22:03', '2025-08-07 07:22:03'),
(3, 'pilpres', 3, '2024', 'Partai Demokrasi Indonesia Perjuangan, PARTAI PERINDO, Partai Persatuan Pembangunan, Partai Hati Nurani Rakyat', 188317, 'H. GANJAR PRANOWO, S.H., M.I.P.', 'images/pemilu/1754576684_capres_wNVkLPHpog1OZAsPAUrVtH7d2xlgb8KESKeMUfbx.jpg', 'Karanganyar', '1968-10-28', 'Laki-laki', 'S2', 'Gubernur Jawa Tengah', 'Prof. Dr. H. M. MAHFUD MD', 'images/pemilu/1754576684_cawapres_c8kgcOwVcwu9OasLmCZu7X3t2uaZ6L5iX460YgbE.jpg', 'Sampang', '1957-05-13', 'Laki-laki', 'S3', 'Menteri Koordinator Politik Hukum dan Keamanan RI', 'Gerak cepat menuju Indonesia Unggul', '1. Manusia Indonesia yang sehat, terdidik, dan sejahtera\r\n2. Indonesia unggul dalam bidang inovasi dan teknologi\r\n3. Ekonomi yang tangguh dan berdikari\r\n4. Hilangnya kemiskinan dan ketimpangan antarwilayah dari akarnya\r\n5. Ekosistem digital yang mengutamakan akses internet cepat dan terjangkau\r\n6. Pembangunan ekonomi yang memperhatikan kelestarian lingkungan\r\n7. Demokrasi terjaga melalui pemberantasan korupsi dan pemerintahan inklusif berlandaskan supremasi hukum\r\n8. Indonesia bangsa terhormat di kancah internasional, serta pertahanan yang tangguh dan modern', '2025-08-07 07:24:44', '2025-08-07 07:24:44'),
(6, 'walikota', 1, '2025', 'Partai Demokrasi Indonesia Perjuangan, Partai Demokrat', 83498, 'Dr. H. Dandan Riza Wardana', 'images/pemilu/1754616839_capres_5cKGLhbREXYxNrBj3wHt211SNN7OkTzo4Dbrgtqa.jpg', 'Cimahi', '1968-07-02', 'Laki-laki', 'S3', 'Komisaris Utama PT Multazam Mulia (2023 - sekarang)\r\nKomisaris PT Jaswita Jabar (2022-2023)\r\nDirektur Keuangan dan Umum PT Bina Wana Lestari (2022-2023)\r\nStaf Ahli Direksi PT Jaswita Jabar (2021-2022)\r\nKomisaris Utama PT Jaswita Bumi Persada. (2020-2021', 'Arif Wijaya', 'images/pemilu/1754616839_cawapres_Mu2H1IwZNO1RlFp31Vzju1UG2dMWJuzTtltvB5L8.jpg', 'Bandung', '1989-03-04', 'Laki-laki', 'S2', NULL, 'Bandung Kota Jasa yang Agamis, Sejahtera, Inovatif, Kreatif, dan Kolaboratif yang Maju dan Berkelanjutan.', 'Misi 1\r\nMewujudkan masyarakat Bandung yang religius dan toleran, menghargai keberagaman dan memiliki karakter kesalihan sosial.\r\n\r\nMisi 2\r\nMenguatkan nilai-nilai budaya yang akan membangun karakter unggul dalam kehidupan masyarakat.\r\n\r\nMisi 3\r\nMemperkuat perlindungan hak perempuan dan anak untuk menciptakan masyarakat yang lebih adil dan setara.\r\n\r\nMisi 4\r\nMeningkatkan akses dan pemerataan pendidikan yang berkualitas di seluruh wilayah Kota Bandung.\r\n\r\nMisi 5\r\nMeningkatkan akses terhadap layanan kesehatan yang berkualitas, merata, dan terjangkau bagi seluruh lapisan masyarakat.\r\n\r\nMisi 6\r\nMenciptakan lapangan pekerjaan yang luas dan berkualitas guna mengurangi pengangguran dan meningkatkan taraf hidup masyarakat.\r\n\r\nMisi 7\r\nMendorong pelestarian lingkungan yang berkelanjutan untuk memastikan keseimbangan antara pembangunan dan keberlanjutan ekologi.\r\n\r\nMisi 8\r\nMengembangkan infrastruktur, tata ruang, dan transportasi publik yang terintegrasi dan ramah lingkungan.\r\n\r\nMisi 9\r\nMeningkatkan tata kelola pemerintahan yang bersih, transparan, dan akuntabel untuk meningkatkan pelayanan publik yang efektif.\r\n\r\nMisi 10\r\nMewujudkan transformasi ekonomi kreatif yang inklusif dan berdaya saing.\r\n\r\nMisi 11\r\nMewujudkan keamanan dan ketertiban umum yang kondusif sebagai fondasi pembangunan daerah', '2025-08-07 18:33:59', '2025-08-07 18:33:59'),
(7, 'walikota', 2, '2025', 'Partai Keadilan Sejahtera, Partai Gerindra', 427448, 'Dr. H. Haru Suandharu, S.Si., M.Si.,', 'images/pemilu/1754617770_capres_QqyErvmuzgZdMefNS8hIqJrGMlt7lwDeFOOsjVTd.jpg', 'Tasikmalaya', '1975-06-29', 'Laki-laki', 'S3', 'Unit Manager', 'R. Dhani Wirianata', 'images/pemilu/1754617770_cawapres_ts23cdTZADBp8bkjJLlJLstykadrZHyknhJ7bdNj.jpg', 'Jakarta', '1992-03-01', 'Laki-laki', 'S1', '-TIM MEDIA GERINDRA DAN PRABOWO\r\n- SPRI PRABOWO SUBIANTO\r\n- PT. GARUDA PANGAN NUSANTARA\r\n - KOMISARIS UTAMA\r\n- PT. AEN', 'Bandung Kota Kreatif Dunia yang Maju, Agamis, Sejahtera, dan Berkelanjutan Menuju Indonesia Emas 2045.', 'Misi 1\r\nMewujudkan masyarakat yang beragama, berbudaya luhur, dan berwawasan lingkungan sebagai pilar kondusivitas daerah.\r\n\r\nMisi 2\r\nMengembangkan SDM yang inovatif, berkualitas, dan berdaya saing.\r\n\r\nMisi 3\r\nMendorong perekonomian inklusif, tangguh, dan kreatif untuk meningkatkan kesejahteraan warga.\r\n\r\nMisi 4\r\nMewujudkan penataan ruang dan infrastruktur yang harmonis, humanis, dan berkualitas.\r\n\r\nMisi 5\r\nMenguatkan tata kelola pemerintahan yang bersih, melayani, dan berkesinambungan', '2025-08-07 18:49:30', '2025-08-07 18:49:30'),
(8, 'walikota', 3, '2025', 'Partai Kebangkitan Bangsa, Partai Nasional Demokrat, Partai Buruh, dan Partai Gelombang Rakyat Indonesia', 523000, 'Muhammad Farhan, S.E.', 'images/pemilu/1754617967_capres_j30tsE0y1iqO5IeeMrW2Spku6RVnyFbFoegvPKlT.jpg', 'Bogor', '1970-02-25', 'Laki-laki', 'S2', '-', 'Erwin, S.E., M.Pd.', 'images/pemilu/1754617967_cawapres_vqGN1cB7xhjA6YQXmpoXePqVPC65rEiiEYAsXjZb.jpg', 'Bandung', '1972-05-18', 'Laki-laki', 'S3', 'Anggota DPRD Kota Bandung (Komisi D – Kesejahteraan Rakyat, Badan Musyawarah, dan Badan Anggaran)\r\nKetua DPC Partai Kebangkitan Bangsa Kota Bandung\r\nPembina Ikatan Pengusaha Muslim Indonesia\r\nKetua Pagar Nusa Kota Bandung\r\nWakil Ketua HPN Jawa Barat\r\nSekretaris Umum Garda Bangsa Jawa Barat', 'Mewujudkan Kota Bandung yang Unggul, Terbuka, Amanah, Maju, dan Agamis melalui Pemerintahan yang Berorientasi Melayani serta Berkelanjutan dalam Mendukung Pembangunan Nasional.', 'Misi 1\r\nMewujudkan pelayanan publik dan kualitas hidup warga kota bandung yang unggul.\r\n\r\nMisi 2\r\nMewujudkan bandung sebagai kota yang terbuka, inklusif, demokratis, setara, dan berkeadilan.\r\n\r\nMisi 3\r\nPengelolaan tata pemerintahan dan pendayagunaan anggaran yang amah, bersih, jujur, efektif, akuntabel, dan terpercaya.\r\n\r\nMisi 4\r\nMewujudkan kota bandung yang maju dalam perekonomian dan infrastruktur, yang dilakukan secara merata untuk menunjang peningkatan daya saing.\r\n\r\nMisi 5\r\nMembentuk karakter warga kota bandung yang agamis, moderat. dan toleran.', '2025-08-07 18:52:47', '2025-08-07 18:52:47'),
(9, 'walikota', 4, '2025', 'Partai Amanat Nasional, Partai Hati Nurani Rakyat, Partai Solidaritas Indonesia, Partai Garda Republik Indonesia, Partai Golongan Karya', 131672, 'ARFI RAFNIALDI', 'images/pemilu/1754618118_capres_JXA3efi6vMLuoOSn4iqJYOW6QJTzNDJyPnBnHfvG.jpg', 'Tangerang', '1977-09-11', 'Laki-laki', 'S2', 'Founder & Trainer Pentagon Training House (2001–2003)\r\nIn House Engineer LAPI ITB (2002–2003)\r\nTrainer Kaizen Training Center (2003–2004)\r\nManager Pengembangan Usaha CV Aldyran Utama Karya (2003–2007)\r\nDirektur & Trainer GRAK System Management Consultant (sejak 2004)\r\nProject Engineer PT LAPI Ganeshatama Consulting (2005–2008)\r\nTim Fasilitator Muamalat Institute (2006)\r\nProfessional Executive Trainer Reza Leadership Center (2007)\r\nStaf Pengajar Softskill Institut Teknologi Bandung (sejak 2007)\r\nAssociate Trainer Training Indonesia (sejak 2008)\r\nPresiden Santri Siap Guna DT Wilayah Bojonegara (2003–2005)\r\nSekretaris Tim Pertimbangan Kebijakan Publik Wali Kota Bandung (2013–2018)\r\nTim Monev Program Wirausaha Baru & Apartemen Rakyat Kota Bandung\r\nPenggagas Mural PON 2016 (Jalan Siliwangi Bandung)\r\nPenggagas Cibunut Bersih RW 07 Kebon Pisang\r\nKetua Harian Tim Optimasi & Sinkronisasi Gubernur Jawa Barat (2018)\r\nKetua Eksekutif Tim Akselerasi Pembangunan (TAP) Jawa Barat (2018–2020)', 'HJ. YENA ISKANDAR MA\'SOEM', 'images/pemilu/1754618118_cawapres_T2MwnmIxgPOmjT1EKVr10J6D5CYxHlaUVNlzgc1E.jpg', 'Bandung', '1973-11-12', 'Laki-laki', 'S2', 'Direktur Utama PT Ma’soem General Utama\r\nDirektur Utama PT Yena Farma Indonesia\r\nKetua Pertiwi Jawa Barat (2020–2025)\r\nKetua Ikatan Apoteker Indonesia (IAI) Kota Bandung (2022–2026)\r\nBendahara Masyarakat Hukum Kesehatan Indonesia Provinsi Jawa Barat (2022–2027)\r\nKomisaris PT Ammara Sahya Gemilang\r\nBendahara Persatuan Olahraga Berkuda Seluruh Indonesia (PORDASI) (2023–2027)', 'Mewujudkan Kota Bandung yang Nyaman, Inklusif, Maju dan Berkelanjutan untuk Mendukung Kehidupan yang Berkualitas', 'Misi 1\r\nMewujudkan sumber daya manusia yang sehat, religius, kreatif, dan berdaya saing.\r\n\r\nMisi 2\r\nMeningkatkan kesejahteraan warga melalui pengembangan ekonomi.\r\n\r\nMisi 3\r\nMeningkatkan mobilitas dan kenyamanan ruang-ruang kota.\r\n\r\nMisi 4\r\nMewujudkan kota yang tangguh dan berkelanjutan.\r\n\r\nMisi 5\r\nMemperkuat tata kelola pemerintahan untuk layanan publik yang responsif dan partisipatif.', '2025-08-07 18:55:18', '2025-08-07 18:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin3@gmail.com', '$2y$12$VdVFiGekP4pY5KJl7GNGu.t/ezHHAX5piIul.TzcF4AFeXh9dZitK', '2025-05-23 22:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus_ormas`
--

CREATE TABLE `pengurus_ormas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ormas_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan` enum('Ketua','Sekretaris','Bendahara') NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengurus_ormas`
--

INSERT INTO `pengurus_ormas` (`id`, `ormas_id`, `jabatan`, `nama`, `no_telepon`, `created_at`, `updated_at`) VALUES
(1452, 730, 'Ketua', 'Citra Almatiin', '087862255795', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1453, 730, 'Sekretaris', 'Ricky Gumilang', NULL, '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1454, 730, 'Bendahara', 'Rudi Sulaeman', NULL, '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1455, 731, 'Ketua', 'Hj. Iis Rohaeni', '081321349000', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1456, 731, 'Sekretaris', 'H. Hendra Sopian', '081320563234', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1457, 731, 'Bendahara', 'Edi Diyana Kustiwa', '085221464567', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1458, 732, 'Ketua', 'Nabil Abdulhafizh', '081222788899', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1459, 732, 'Sekretaris', 'Adang Mulyana', '082214129287', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1460, 732, 'Bendahara', 'M. Taufik Afriansyah', '085353440288', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1461, 733, 'Ketua', 'Ir. Bambang Sadarta', '08128963311', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1462, 733, 'Sekretaris', 'Yully Ahmadi', '081395312864', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1463, 733, 'Bendahara', 'Sugiyanto', '082119221998', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1464, 734, 'Ketua', 'Tubagus Wendha Artha', '087804096817', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1465, 734, 'Sekretaris', 'Oka Panji', '081903165363', '2025-05-21 10:09:19', '2025-05-21 10:09:19'),
(1466, 734, 'Bendahara', 'Ratna Wulan', '08983200521', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1467, 735, 'Ketua', 'H. Parid Hajri', '085603077180', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1468, 735, 'Sekretaris', 'Kosasih', '081394444492', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1469, 735, 'Bendahara', 'Wawan Irawan', '089664816836', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1470, 736, 'Ketua', 'Saeful Hidayat', '085314140044', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1471, 736, 'Sekretaris', 'Sahidin', '081224770825', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1472, 736, 'Bendahara', 'Hj. Yetty Katmawati', '085894747024', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1473, 737, 'Ketua', 'Elizabeth Tamnge', '081312342160', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1474, 737, 'Sekretaris', 'Andra Wahyu Hartawanti', '081573529269', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1475, 737, 'Bendahara', 'Lim Sui Fa', '081222016652', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1476, 738, 'Ketua', 'Ny. Sri Suningsih', '082117212193', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1477, 738, 'Sekretaris', 'Ny. Siti Hodijah', '085721215014', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1478, 738, 'Bendahara', 'Ny. Hj. Eti Sutiasih', '08132121026', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1479, 739, 'Ketua', 'Dicky Ahmad', '081322110099', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1480, 739, 'Sekretaris', 'Eka Sobarna', '082129360837', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1481, 739, 'Bendahara', 'Erwan Setiawan', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1482, 740, 'Ketua', 'Neneng Hadiyah', '087823974787', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1483, 740, 'Sekretaris', 'Madhihah Bajri', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1484, 740, 'Bendahara', 'Hilvi Bajri', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1485, 741, 'Ketua', 'Andri Mulyadi', '081573669098', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1486, 741, 'Sekretaris', 'Rosad Nurdin', '089663775058', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1487, 741, 'Bendahara', 'Husni Taufik', '08122179978', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1488, 742, 'Ketua', 'Iyep Yusup Muharam', '082216224151', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1489, 742, 'Sekretaris', 'Riky', '0881022110602', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1490, 742, 'Bendahara', 'Anbiya Ahya Ramadhani', '085797395820', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1491, 743, 'Ketua', 'Nany Mulyani', '081320407638', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1492, 743, 'Sekretaris', 'Ucung Juhana', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1493, 743, 'Bendahara', 'Nono Suryono', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1494, 744, 'Ketua', 'Asep Mochamad Mulyadi', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1495, 744, 'Sekretaris', 'Akbar Romadona', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1496, 744, 'Bendahara', 'Dikdik', '081320760018', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1497, 745, 'Ketua', 'Dadi Sarana Setrawijaya', '082238506767', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1498, 745, 'Sekretaris', 'Yogi Sandro', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1499, 745, 'Bendahara', 'Abdul Pane', NULL, '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1500, 746, 'Ketua', 'Ujang Mulyana', '08996003328', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1501, 746, 'Sekretaris', 'Dian Nostika Suherman', '085703069162', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1502, 746, 'Bendahara', 'Iyan Riani', '085624066980', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1503, 747, 'Ketua', 'Geri Sandiana', '082126240288', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1504, 747, 'Sekretaris', 'Ina Saringgih', '08986817066', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1505, 747, 'Bendahara', 'Sugeng Suparman', '085220880033', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1506, 748, 'Ketua', 'Dalan Gunawan', '085720104609', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1507, 748, 'Sekretaris', 'Iyus Setiawan', '085794018863', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1508, 748, 'Bendahara', 'Lilis Rokayah', '085624309796', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1509, 749, 'Ketua', 'Suryono', '085324718009', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1510, 749, 'Sekretaris', 'Yedi Supriadi', '082119259649', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1511, 749, 'Bendahara', 'Robby Sanjaya', '081399069500', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1512, 750, 'Ketua', 'Sofian', '085947410148', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1513, 750, 'Sekretaris', 'Muhammad Aulia Yusron', '085155249119', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1514, 750, 'Bendahara', 'Daniel Krishnavy', '082240842048', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1515, 751, 'Ketua', 'Budi', '0895708011171', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1516, 751, 'Sekretaris', 'Astuti', '083844056005', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1517, 751, 'Bendahara', 'Yuliana', '085320909331', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1518, 752, 'Ketua', 'R. Michael V Kusnendar', '081310101123', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1519, 752, 'Sekretaris', 'Rully Hendarsyah', '08772228787', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1520, 752, 'Bendahara', 'Aghna Ihsan Sajidi', '081386865069', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1521, 753, 'Ketua', 'Andrian Mukmin Setiawan', '081222248408', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1522, 753, 'Sekretaris', 'Miftah Shiddieq', '085350866600', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1523, 753, 'Bendahara', 'Minarti Kartika Dewi', '082229018399', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1524, 754, 'Ketua', 'Naufal Juwan Herdinan', '087848893195', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1525, 754, 'Sekretaris', 'Shafa Putri Salsabila Prasetya', '088970908331', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1526, 754, 'Bendahara', 'Muhammad Nabil Hernada', '0895334718035', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1527, 755, 'Ketua', 'Hendro Suprapto', '088218714914', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1528, 755, 'Sekretaris', 'Aa Rusmana', '081320995511', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1529, 755, 'Bendahara', 'Amung', '081214426671', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1530, 756, 'Ketua', 'Sulaeman Sudrajat', '082126386533', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1531, 756, 'Sekretaris', 'Dadang Rohiman', '082126843082', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1532, 756, 'Bendahara', 'Ade Triyasa', '082126386533', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1533, 757, 'Ketua', 'Ganja Gandapraja', '082120031414', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1534, 757, 'Sekretaris', 'Herru Soerjono', '081320702743', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1535, 757, 'Bendahara', 'Asep Sonjaya', '082119623747', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1536, 758, 'Ketua', 'Wawan Suryana', '082115561167', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1537, 758, 'Sekretaris', 'Citra Dewi', '0895344656013', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1538, 758, 'Bendahara', 'Widanengsih', '08953370283399', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1539, 759, 'Ketua', 'Hilman Syam', '085320276411', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1540, 759, 'Sekretaris', 'Irzal Yanuardi', '08223643528', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1541, 759, 'Bendahara', 'Dadang Munajat', '087824927405', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1542, 760, 'Ketua', 'Erwin Hannes Aritonang', '081222277678', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1543, 760, 'Sekretaris', 'Andi Kurniadi', '081312228102', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1544, 760, 'Bendahara', 'Ratnna Kumala Sita', '081218341707', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1545, 761, 'Ketua', 'Budi Laksono', '08122399306', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1546, 761, 'Sekretaris', 'Wawan Juansyah', '08978071994', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1547, 761, 'Bendahara', 'Dodi Ramdani', '087722035599', '2025-05-21 10:09:20', '2025-05-21 10:09:20'),
(1548, 762, 'Ketua', 'Ayi Karyana', '081221314849', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1549, 762, 'Sekretaris', 'Syafpriadi Hakim Thoha', '08986178195', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1550, 762, 'Bendahara', 'Yuniar Kurniawaty', '081398326633', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1551, 763, 'Ketua', 'Hasan Purnama', '081322021809', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1552, 763, 'Sekretaris', 'Dedeh Hadiati', '0895802906193', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1553, 763, 'Bendahara', 'Arien Mandiri', '085794215159', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1554, 764, 'Ketua', 'Jajat Sudrajat', '089516065326', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1555, 764, 'Sekretaris', 'Tatang Hadiat', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1556, 764, 'Bendahara', 'Yeti Nurhayati', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1557, 765, 'Ketua', 'Agus Mulyana', '0873336483175', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1558, 765, 'Sekretaris', 'Rian Fathul Choer', '085795678009', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1559, 765, 'Bendahara', 'Kusnadi', '0852222333737', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1560, 766, 'Ketua', 'Suryana', '087720365191', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1561, 766, 'Sekretaris', 'Siswanto', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1562, 766, 'Bendahara', 'Lela Nur Fitriani', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1563, 767, 'Ketua', 'Agus Kustiana', '082115308831', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1564, 767, 'Sekretaris', 'Yoyon Hermawan', '081320909808', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1565, 767, 'Bendahara', 'Deni Mulyana', '082115308831', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1566, 768, 'Ketua', 'Dr. I Ketut Adi Purnama', '081266110030', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1567, 768, 'Sekretaris', 'Cening Sadiana', '0811136201', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1568, 768, 'Bendahara', 'I Ketut Sugiarsha', '081222231972', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1569, 769, 'Ketua', 'Sri Perwati', '081218596545', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1570, 769, 'Sekretaris', 'Risfa Mustifa Wangi', '0895421647985', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1571, 769, 'Bendahara', 'Subur', '0895803791119', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1572, 770, 'Ketua', 'H. Dadang Hemasnyah', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1573, 770, 'Sekretaris', 'Ridwansyah', '089677250707', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1574, 770, 'Bendahara', 'Irfan Fimansyah', '087880083932', '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1575, 771, 'Ketua', 'Ahmad Tarmizi', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1576, 771, 'Sekretaris', 'Firmansyah', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1577, 771, 'Bendahara', 'Abdul Hamid Al Gozali', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1578, 772, 'Ketua', 'Iwan Hermawan', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1579, 772, 'Sekretaris', 'Asep Sumpena', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1580, 772, 'Bendahara', 'Euis Sri Rahmawati', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1581, 773, 'Ketua', 'Moch Dadang', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1582, 773, 'Sekretaris', 'Ridwan Femi K', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1583, 773, 'Bendahara', 'Kustendi', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1584, 774, 'Ketua', 'Drs. Maman Sulaeman', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1585, 774, 'Sekretaris', 'Yayan Taryana, S.Pd., M.M.', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1586, 774, 'Bendahara', 'Hj. Martini Aan, S.Pd., M.M.Pd', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1587, 775, 'Ketua', 'Siti Badriah', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1588, 775, 'Sekretaris', 'Tifa Rachmi Kusumastuti, M.Si', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1589, 775, 'Bendahara', 'Fifi Siti Khodijatarrohmah, S.Pd.SD', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1590, 776, 'Ketua', 'Rosikin', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1591, 776, 'Sekretaris', 'Sujana', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1592, 776, 'Bendahara', 'Hendiyanto', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1593, 777, 'Ketua', 'Moch Mashur', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1594, 777, 'Sekretaris', 'Setia Bambang Irawan', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1595, 777, 'Bendahara', '-', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1596, 778, 'Ketua', 'Freddy B. Sirait', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1597, 778, 'Sekretaris', 'Acep Sudrajat', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1598, 778, 'Bendahara', 'Leni Anggtaeni, S.H.,M.H.', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1599, 779, 'Ketua', 'Dedi Kusniadi', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1600, 779, 'Sekretaris', 'Gun gun Hadiansyah', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1601, 779, 'Bendahara', 'Wawan Hermawan', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1602, 780, 'Ketua', 'Igud Rohman Suherman', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1603, 780, 'Sekretaris', 'Toto Tosin', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1604, 780, 'Bendahara', 'Peni Herawati', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1605, 781, 'Ketua', 'Aditia Taslim', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1606, 781, 'Sekretaris', 'Ridwan Natakusuma', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1607, 781, 'Bendahara', 'Ady Mulyadi', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1608, 782, 'Ketua', 'Suman Rinto Sitohang', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1609, 782, 'Sekretaris', 'Sahnan S., ST', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1610, 782, 'Bendahara', 'Binsar S.', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1611, 783, 'Ketua', 'Hilman Syam', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1612, 783, 'Sekretaris', 'Usep Rukanda', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1613, 783, 'Bendahara', 'Taufik Efendi', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1614, 784, 'Ketua', 'Sian Soegiarto', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1615, 784, 'Sekretaris', 'Felisia Kartiani', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1616, 784, 'Bendahara', 'Karni Koestionohendro', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1617, 785, 'Ketua', 'Ghilman Ahmad Fauzan', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1618, 785, 'Sekretaris', 'Analisa Cinta', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1619, 785, 'Bendahara', 'Henny Trina', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1620, 786, 'Ketua', 'Iwa Kartiwa', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1621, 786, 'Sekretaris', 'Rosa Gumilar', NULL, '2025-05-21 10:09:21', '2025-05-21 10:09:21'),
(1622, 786, 'Bendahara', 'Asep Hendra Setiawan', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1623, 787, 'Ketua', 'Ronny Saeful Rochman', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1624, 787, 'Sekretaris', 'Hadi Kurniawan', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1625, 787, 'Bendahara', 'Sukmaya', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1626, 788, 'Ketua', 'Wandy Soewandi', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1627, 788, 'Sekretaris', 'Uus Darusman, S.Ag.', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1628, 788, 'Bendahara', 'Rahmat Wahyudin', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1629, 789, 'Ketua', 'Rohman / Jokar', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1630, 789, 'Sekretaris', 'Fajar Budhi Wibowo', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1631, 789, 'Bendahara', 'Elan Suganda', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1632, 790, 'Ketua', 'Parsaoran Simanjuntak', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1633, 790, 'Sekretaris', 'Engku Kustia, S.Pd', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1634, 790, 'Bendahara', 'Heni Dede Rohaeni, S.Pd', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1635, 791, 'Ketua', 'Ucu Syamsudin', '081320314185', '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1636, 791, 'Sekretaris', 'Tri Nur Subhi', '081223099855', '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1637, 791, 'Bendahara', 'Suhetin', '087893609455', '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1638, 792, 'Ketua', 'Jajang Sutaryat', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1639, 792, 'Sekretaris', 'Boyke Lihawa', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1640, 792, 'Bendahara', 'Rudi Amminuloh', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1641, 793, 'Ketua', 'Lily Yudha Leksmana', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1642, 793, 'Sekretaris', 'Yoga Prisembodo, ST', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1643, 793, 'Bendahara', 'Dedi Wahyudi', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1644, 794, 'Ketua', 'Raden Achmad Taofiq Soheh', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1645, 794, 'Sekretaris', 'Angga Rudyanto', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1646, 794, 'Bendahara', 'Diah Putri Rahmawati', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1647, 795, 'Ketua', 'Hadi Gunadi', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1648, 795, 'Sekretaris', 'A. Hamzah Rivai, SH', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1649, 795, 'Bendahara', 'Tommy Siswanto', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1650, 796, 'Ketua', 'Bonny Permadi', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1651, 796, 'Sekretaris', 'Khoerul Matin', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1652, 796, 'Bendahara', 'Deni Himaitan Susanto', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1653, 797, 'Ketua', 'Benny Oewes', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1654, 797, 'Sekretaris', 'Achmad Setiandi', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1655, 797, 'Bendahara', 'Oyong Wastujaya', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1656, 798, 'Ketua', 'Ronal Maulana Siagian', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1657, 798, 'Sekretaris', 'R. Zakaria', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1658, 798, 'Bendahara', 'Andini Khoirunisa Al Rahmat', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1659, 799, 'Ketua', 'Pdp. Yohanes Handrik', NULL, '2025-05-21 10:09:22', '2025-05-24 04:11:35'),
(1660, 799, 'Sekretaris', 'Pdm. Frits P. Manihuruk M.A', NULL, '2025-05-21 10:09:22', '2025-05-24 04:11:35'),
(1661, 799, 'Bendahara', 'Pdt. Rumantina Situmorang S.Th', NULL, '2025-05-21 10:09:22', '2025-05-24 04:11:35'),
(1662, 800, 'Ketua', 'H. Mamat Erlan', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1663, 800, 'Sekretaris', 'Suzy Suzaini, BA', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1664, 800, 'Bendahara', 'H. Se Sudirman', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1665, 801, 'Ketua', 'Ny. Hj. Tiny Suhartini', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1666, 801, 'Sekretaris', 'Ny. Rochana Herman', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1667, 801, 'Bendahara', 'Ny. Arbiaty Edy Sumarno', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1668, 802, 'Ketua', 'Neneng Kartika', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1669, 802, 'Sekretaris', 'Iin Saepudin', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1670, 802, 'Bendahara', 'Ade Ruhiyat', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1671, 803, 'Ketua', 'Erik Sebastian', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1672, 803, 'Sekretaris', 'Ahmad Dani', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1673, 803, 'Bendahara', 'Udoyono', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1674, 804, 'Ketua', 'Dr. H. Himawan Nuryahya', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1675, 804, 'Sekretaris', 'M. Dede Sukandar, SH', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1676, 804, 'Bendahara', 'Asep Suhana Saputra', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1677, 805, 'Ketua', 'H. Teddy Achmad Rizaldi', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1678, 805, 'Sekretaris', 'M. Rudi At.P., SE., SH., MM', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1679, 805, 'Bendahara', 'Eka Atmayati', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1680, 806, 'Ketua', 'KH. Agus Syarif. Hidayatulah', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1681, 806, 'Bendahara', 'H. Wahyul Afif Al Ghofiqi, S.S', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1682, 806, 'Bendahara', 'H. Syarifudin Bebyl, Drs', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1683, 807, 'Ketua', 'Odoy Suganda', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1684, 807, 'Sekretaris', 'Yayan Kurniawan', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1685, 807, 'Bendahara', 'Oki Ariesyana, SE', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1686, 808, 'Ketua', 'Diki Suhendar', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1687, 808, 'Sekretaris', 'Budi Susanto', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1688, 808, 'Bendahara', 'Jajang Saepudin', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1689, 809, 'Ketua', 'Didin Nurdin', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1690, 809, 'Sekretaris', 'Doni Permadi, S.IP', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1691, 809, 'Bendahara', 'Sumadi', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1692, 810, 'Ketua', 'K; Dudi Saptiana', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1693, 810, 'Sekretaris', 'Susilawati', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1694, 810, 'Bendahara', 'Ema Rahmawati', NULL, '2025-05-21 10:09:22', '2025-05-21 10:09:22'),
(1695, 811, 'Ketua', 'Agung Firmansyah Sumantri', '0818200982', '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1696, 811, 'Sekretaris', 'Aswan Asep Wawan', '082193333251', '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1697, 811, 'Bendahara', 'Radea Respati', '0811200304', '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1698, 812, 'Ketua', 'Drs. H. Bambang Ruchiat', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1699, 812, 'Sekretaris', 'Drs. Epi Sutisna, SH', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1700, 812, 'Bendahara', 'Aryanti Sulyanti, S.Kom', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1701, 813, 'Ketua', 'Asep Sulaeman', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1702, 813, 'Sekretaris', 'Ahmad Haris Fadillah, SE', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1703, 813, 'Bendahara', 'Hj. Ani Surtiani', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1704, 814, 'Ketua', 'Mohammad Zainudin', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1705, 814, 'Sekretaris', 'Hendra Setiawan', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1706, 814, 'Bendahara', 'Rosmiati', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1707, 815, 'Ketua', 'Ade Sajidin MY', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1708, 815, 'Sekretaris', 'Tedi Mulyadi, S.Pd.I', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1709, 815, 'Bendahara', 'Saepudin Suanda', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1710, 816, 'Ketua', 'Irma Zahrotunnisa', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1711, 816, 'Sekretaris', 'Tyas Azis Arifin', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1712, 816, 'Bendahara', 'Elita Nur Ichsani', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1713, 817, 'Ketua', 'Iyan Supardiono', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1714, 817, 'Sekretaris', 'Edi Junaedi', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1715, 817, 'Bendahara', 'Begya Suseno', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1716, 818, 'Ketua', 'Dasri', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1717, 818, 'Sekretaris', 'Risma Nikolas Wahani', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1718, 818, 'Bendahara', 'Turyani', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1719, 819, 'Ketua', 'AA Abdul Rozak', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1720, 819, 'Sekretaris', 'Hendra Guntara, M.Ud', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1721, 819, 'Bendahara', 'Rano Sarip Wihardja, SS', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1722, 820, 'Ketua', 'Suyanto', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1723, 820, 'Sekretaris', 'Abdurahman, A.Md', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1724, 820, 'Bendahara', 'Moh. Minannurohman, S.Pd', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1725, 821, 'Ketua', 'Drs. Enjang Sunandar', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1726, 821, 'Sekretaris', 'Rifa Anggyana', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1727, 821, 'Bendahara', 'Ema Mahmudiah, M.Pd', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1728, 822, 'Ketua', 'Nusep Supriadi', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1729, 822, 'Sekretaris', 'Abdul Jabar', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1730, 822, 'Bendahara', 'Viktor Syaefullah', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1731, 823, 'Ketua', 'Wahyudin', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1732, 823, 'Sekretaris', 'Empur Purwandi', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1733, 823, 'Bendahara', 'Sukarman', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1734, 824, 'Ketua', 'Wildan Mulkan Hakim', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1735, 824, 'Sekretaris', 'Asep Tantan Permana', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1736, 824, 'Bendahara', 'Sukri Ramadhan', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1737, 825, 'Ketua', 'Rusman', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1738, 825, 'Sekretaris', 'H. Sugiarto', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1739, 825, 'Bendahara', 'Hermawan', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1740, 826, 'Ketua', 'Hilman Purnama', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1741, 826, 'Sekretaris', 'Taupik Iskandar', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1742, 826, 'Bendahara', 'Iis Lesmanawati', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1743, 827, 'Ketua', 'Wawan Sujana', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1744, 827, 'Sekretaris', 'Andri Firmansyah, S.Sos', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1745, 827, 'Bendahara', 'Jujus Suharna', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1746, 828, 'Ketua', 'Iwan Ridwan', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1747, 828, 'Sekretaris', 'Deki Nugraha', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1748, 828, 'Bendahara', 'Teti Rostiati', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1749, 829, 'Ketua', 'H. Edi Sunandar', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1750, 829, 'Sekretaris', 'H. Isnain Waluyo, A.Md', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1751, 829, 'Bendahara', 'H. Imam Kusnandar, S.E', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1752, 830, 'Ketua', 'Hamzah Hayatullah', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1753, 830, 'Sekretaris', 'Budi Antono', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1754, 830, 'Bendahara', 'Acep Jamaludin', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1755, 831, 'Ketua', 'Ruslan', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1756, 831, 'Sekretaris', 'M. Deny Sofyan', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1757, 831, 'Bendahara', 'Pipit Januarti', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1758, 832, 'Ketua', 'Abdul Aziz', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1759, 832, 'Sekretaris', 'Drs. Zaenal Aripin', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1760, 832, 'Bendahara', 'Anis Fuad', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1761, 833, 'Ketua', 'Guntur Afandi', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1762, 833, 'Sekretaris', 'Haryawan', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1763, 833, 'Bendahara', 'Anwar Permana', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1764, 834, 'Ketua', 'welly Yudiansyah', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1765, 834, 'Sekretaris', 'Dodi Egi M', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1766, 834, 'Bendahara', 'Bety Nurhayati', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1767, 835, 'Ketua', 'H. Tedi Setiawan', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1768, 835, 'Sekretaris', 'H. R. Setiana Jabar', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1769, 835, 'Bendahara', 'Dani Rusman', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1770, 836, 'Ketua', 'H. Dayu AG', NULL, '2025-05-21 10:09:23', '2025-05-21 10:09:23'),
(1771, 836, 'Sekretaris', 'Lahmuddin, S.Pd., S.H', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1772, 836, 'Bendahara', 'Hj. Euis Siti Komariah', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1773, 837, 'Ketua', 'Daris Iskandar', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1774, 837, 'Sekretaris', 'Nandang Rahmat', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1775, 837, 'Bendahara', 'Asep Sunardi', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1776, 838, 'Ketua', 'H. Muhadi', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1777, 838, 'Sekretaris', 'Asep Sarip Hidayat', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1778, 838, 'Bendahara', 'Nia Ratnita', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1779, 839, 'Ketua', 'Syarief Hidaya', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1780, 839, 'Sekretaris', 'Ade Wawan Purnama', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1781, 839, 'Bendahara', 'Trias Budi G', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1782, 840, 'Ketua', 'Billy Budi Santosa', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1783, 840, 'Sekretaris', 'Dadan U. Nugraha', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1784, 840, 'Bendahara', 'Olan Sitompul', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1785, 841, 'Ketua', 'Cecep Gunawan', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1786, 841, 'Sekretaris', 'Dani Hardiansyah', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1787, 841, 'Bendahara', 'Lian Johanes Manurung', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1788, 842, 'Ketua', 'M. Ridwan Fauzi', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1789, 842, 'Sekretaris', 'Haris Abdul Gani', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1790, 842, 'Bendahara', 'Fauzan Fathu Rochman', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1791, 843, 'Ketua', 'Drs. ST. RD. Manurung', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1792, 843, 'Sekretaris', 'Alexander B.C.T.P, S.Ikom', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1793, 843, 'Bendahara', 'J. Boru Hasibuan', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1794, 844, 'Ketua', 'H. Wawan Ridwan', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1795, 844, 'Sekretaris', 'H. Ifan Ustam, A.Md', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1796, 844, 'Bendahara', 'Hj. Euis Siti Komariah', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1797, 845, 'Ketua', 'Dedi Suhendi', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1798, 845, 'Sekretaris', 'A. Kustiawan', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1799, 845, 'Bendahara', 'Mimin Rukmini', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1800, 846, 'Ketua', 'Tumin', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1801, 846, 'Sekretaris', 'Deden Ahmad Z', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1802, 846, 'Bendahara', 'Bety', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1803, 847, 'Ketua', 'Duana Permadi', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1804, 847, 'Sekretaris', 'Barkah A Gani', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1805, 847, 'Bendahara', 'Silvi Fitria', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1806, 848, 'Ketua', 'Agum Restu Alam', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1807, 848, 'Sekretaris', 'Iqbal Abdurrahmansyah, S.Ap', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1808, 848, 'Bendahara', 'Lia Uswatun Gholiyyah, S.E', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1809, 849, 'Ketua', 'Fajar Suharyadi', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1810, 849, 'Sekretaris', 'Asep Jonih Haerul Fatah', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1811, 849, 'Bendahara', 'Jacky', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1812, 850, 'Ketua', 'Yungyun Surti Binangkit S.Ag.', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1813, 850, 'Sekretaris', 'Nena Nadia', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1814, 850, 'Bendahara', 'Restuty Amalia, S.Sos.', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1815, 851, 'Ketua', 'Berry Purnama', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1816, 851, 'Sekretaris', 'Andri Triadi', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1817, 851, 'Bendahara', 'Tomy Irwandi', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1818, 852, 'Ketua', 'David Sutasurya', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1819, 852, 'Sekretaris', 'Anilawati Nurwakhidin', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1820, 852, 'Bendahara', 'Entis Sutisna', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1821, 853, 'Ketua', 'Ir. Syamsul Arifin', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1822, 853, 'Sekretaris', 'Rachman Setiadi, SH', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1823, 853, 'Bendahara', 'Titik Wahyuni', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1824, 854, 'Ketua', 'Didin Saripudin', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1825, 854, 'Sekretaris', 'Ridwan Suherman', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1826, 854, 'Bendahara', 'Fajar Kristianto', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1827, 855, 'Ketua', 'Drs. Dadan Rosadi', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1828, 855, 'Sekretaris', 'H. Saeful Mufid, S.Pd.I, M.M.Pd', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1829, 855, 'Bendahara', 'Maemunah, M.Ag', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1830, 856, 'Ketua', 'Farhan Fuadi Rahman', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1831, 857, 'Ketua', 'Suwandi B.P Nainggolan', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1832, 857, 'Sekretaris', 'Hotben Sagala', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1833, 857, 'Bendahara', 'Tuty Br Siahaan', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1834, 858, 'Ketua', 'dr. Widiyastuti HDQ', '08122009820', '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1835, 858, 'Sekretaris', 'DR. Sisca Lestari, M.Ag', '085721019144', '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1836, 858, 'Bendahara', 'Hanifah Kartikasari, S.Pd', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1837, 859, 'Ketua', 'Ade Sutiarsyah', '085722388072', '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1838, 859, 'Sekretaris', 'Tati S', '0895331380775', '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1839, 859, 'Bendahara', 'Beben S', '081573033470', '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1840, 860, 'Ketua', 'Nanang Sutardi', '088218690934', '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1841, 860, 'Sekretaris', 'Deden Hadi Kushendar, S.SI.,M.Si', NULL, '2025-05-21 10:09:24', '2025-05-21 10:09:24'),
(1842, 860, 'Bendahara', 'Budi Hermana', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1843, 861, 'Ketua', 'h. Mimin Sutisna', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1844, 861, 'Sekretaris', 'Akhmad Solihin,M.Pd', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1845, 861, 'Bendahara', 'Nur Laily, S.Pd', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1846, 862, 'Ketua', 'Martona', '082116116157', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1847, 862, 'Sekretaris', 'Haris', '085220347984', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1848, 862, 'Bendahara', 'Sukdi', '085220802344', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1849, 863, 'Ketua', 'Agus Nugraha', '082216886921', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1850, 863, 'Sekretaris', 'Grata Saef Ibrohim, AMD', '082126660599', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1851, 863, 'Bendahara', 'Indra Permana', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1852, 864, 'Ketua', 'H. Mimin  Sutisna', '081320122484', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1853, 864, 'Sekretaris', 'H. Akhmad Solihin, M.Pd.I', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1854, 864, 'Bendahara', 'H. Rohmani, S.Ag.,M.Pd', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1855, 865, 'Ketua', 'Mohamad Soleh', '087823111868', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1856, 865, 'Sekretaris', 'Muhammad Bastari, SH', '081320576123', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1857, 865, 'Bendahara', 'Ani Suryani, S.I.KOM', '081322766802', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1858, 866, 'Ketua', 'Fendi Chandra', '085222298782', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1859, 866, 'Sekretaris', 'Nathanael Christoper C', '087722001289', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1860, 866, 'Bendahara', 'Asep Supriatno', '085794372875', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1861, 867, 'Ketua', 'Budijanto Ardiansjah', '0811238689', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1862, 867, 'Sekretaris', 'Anggiat Sahat Panjaitan', '081324000677', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1863, 867, 'Bendahara', 'Wirawan Sanjaya', '081320784800', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1864, 868, 'Ketua', 'Drs. H Ugas Rahmansyah', '082122874141', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1865, 868, 'Sekretaris', 'Drs. Zaenal Aripin', '082118765444', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1866, 868, 'Bendahara', 'Asril Agus, SE', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1867, 869, 'Ketua', 'Cahyana Wahyu', '087777977908', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1868, 869, 'Sekretaris', 'Herman Severijns', '081324076293', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1869, 869, 'Bendahara', 'Johan Suryana', '082217511715', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1870, 870, 'Ketua', 'Platini Hendriyana', '081214691561', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1871, 870, 'Sekretaris', 'Asep Yudi Mahendra', '082321060993', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1872, 870, 'Bendahara', 'Rasyid Karnain', '082219418298', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1873, 871, 'Ketua', 'Dede Apip Hidayatulloh', '082316027877', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1874, 871, 'Sekretaris', 'Dadan Suparman, SH', '081221489333', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1875, 871, 'Bendahara', 'Hari Patriana', '082120089617', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1876, 872, 'Ketua', 'Yoki Unggara', '088220931652', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1877, 872, 'Sekretaris', 'Indra Muhammad Ramdhani, SE', '087812917555', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1878, 872, 'Bendahara', 'Niko Warisman Maulana', '087726838382', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1879, 873, 'Ketua', 'Didin Samsudin', '081214259290', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1880, 873, 'Sekretaris', 'Uli Marlina', '082128420704', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1881, 873, 'Bendahara', 'Yani Suryani', '085315181920', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1882, 874, 'Ketua', 'Berland Aditya', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1883, 874, 'Sekretaris', 'A. Septian Sobari', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1884, 874, 'Bendahara', 'Muhammad Hariyadi Syaprudin', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1885, 875, 'Ketua', 'Yanuar Abdurohman', '081322771222', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1886, 875, 'Sekretaris', 'Heri Maryadi', '081282699388', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1887, 875, 'Bendahara', 'Sugih Rahmansyah', '081220061720', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1888, 876, 'Ketua', 'Warya', '085559716223', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1889, 876, 'Sekretaris', 'Usep Deni Yanto', '081296184874', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1890, 876, 'Bendahara', 'Taufik Fahruroji', '081394886709', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1891, 877, 'Ketua', 'Tatang Suniarja', '081220471621', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1892, 877, 'Sekretaris', 'Drs. Saeful Bironi', '082115146076', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1893, 877, 'Bendahara', 'Drs. H. Moch. Darmin M.BA', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1894, 878, 'Ketua', 'Gama Tirta Prakasa', '088215972566', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1895, 878, 'Bendahara', 'Wiwiet Kurniati', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1896, 879, 'Ketua', 'Cepi Suhendar', '085938554323', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1897, 879, 'Sekretaris', 'Febriani', '081546429450', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1898, 879, 'Bendahara', 'Deri Rusiana', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1899, 880, 'Ketua', 'Hj. Ani Surtiani', '087722561174', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1900, 880, 'Sekretaris', 'Abdul Rohman', '088224471286', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1901, 880, 'Bendahara', 'Wiwiek Dwitiyas', '817423513', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1902, 881, 'Ketua', 'Asep Mulyana', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1903, 881, 'Sekretaris', 'Dedhy Djoenaedhy', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1904, 881, 'Bendahara', 'Rosidin', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1905, 882, 'Ketua', 'Ridwan Femi K', '082116717199', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1906, 882, 'Sekretaris', 'Ade Teten Juntara', '085294166448', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1907, 882, 'Bendahara', 'Iwan Jamaludin Boncu', '82291172626', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1908, 883, 'Ketua', 'Hj. Elly Soejati', '081220258003', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1909, 883, 'Sekretaris', 'Rika Siswati, Spd', '081322294077', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1910, 883, 'Bendahara', 'Hj. Detti Tavarida', NULL, '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1911, 884, 'Ketua', 'Drs. Rustana Adhi', '08156154515', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1912, 884, 'Sekretaris', 'Muhammad Ali Assajjad Filail', '083822520752', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1913, 884, 'Bendahara', 'Ismail Hizburrohman', '083821230032', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1914, 885, 'Ketua', 'Hj. Dewi Heryani', '08122126666', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1915, 885, 'Sekretaris', 'Ayi Mulyana, SE', '08132148488', '2025-05-21 10:09:25', '2025-05-21 10:09:25'),
(1916, 885, 'Bendahara', 'Achmad Hamdeni', '08122124364', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1917, 886, 'Ketua', 'Asep Supriadi', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1918, 886, 'Sekretaris', 'Ryan Ardiansyah', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1919, 886, 'Bendahara', 'Tatang Supriatna', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1920, 887, 'Ketua', 'Yudi Cahyadi', '085974365211', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1921, 887, 'Sekretaris', 'Julhayadi Arya Puntara, S.Pd', '081221184251', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1922, 887, 'Bendahara', 'Purnomo', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1923, 888, 'Ketua', 'H. Herdiyansyah', '082116999008', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1924, 888, 'Sekretaris', 'Zaenal Ihsan, S.Sos', '082240520079', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1925, 888, 'Bendahara', 'Syamsudin', '091220497097', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1926, 889, 'Ketua', 'Aan Andi Purnama', '081320706795', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1927, 889, 'Sekretaris', 'Andi Rafiq, SE', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1928, 889, 'Bendahara', 'Visa Iriani Theresna, S.Pd.,MM', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1929, 890, 'Ketua', 'Endang Suryana', '0821321874012', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1930, 890, 'Sekretaris', 'Ir. Yusuf Tasdik', '087724407000', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1931, 890, 'Bendahara', 'Dwi Ratnasari', '0895327714938', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1932, 891, 'Ketua', 'Hendi Hadiarja', '087825006678', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1933, 891, 'Sekretaris', 'Ade Sukandi', '085829411659', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1934, 891, 'Bendahara', 'Haerul Huda', '0895365927967', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1935, 892, 'Ketua', 'Juanto', '081221958315', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1936, 892, 'Sekretaris', 'Drs. Dedy  R Mihardja, M.M', '081321506169', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1937, 892, 'Bendahara', 'Adi Resmana, SE', '08081290998387', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1938, 893, 'Ketua', 'Adeng Wijaya', '087829649278', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1939, 893, 'Sekretaris', 'Tumin', '081220080396', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1940, 893, 'Bendahara', 'Siti Aminah', '081222813596', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1941, 894, 'Ketua', 'Rohmat Senjaya', '08212071872', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1942, 894, 'Sekretaris', 'Rahmat Setiawan', '089313980482', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1943, 894, 'Bendahara', 'Elly Nurhayati', '081220139975', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1944, 895, 'Ketua', 'Eka Harip', '081297563048', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1945, 895, 'Sekretaris', 'suro udioko Prapanca, A.Md', '085820462715', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1946, 895, 'Bendahara', 'Dikki Hermawan', '08121351211', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1947, 896, 'Ketua', 'dr. Ahmad Nurhadi', '081223515164', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1948, 896, 'Sekretaris', 'Ramdan Junaeni, M. Sos.', '085890654879', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1949, 896, 'Bendahara', 'Misbahudin, ST.', '08569888469', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1950, 897, 'Ketua', 'Dedi Indrayana', '08226202666', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1951, 897, 'Sekretaris', 'Rony Harimurti, S.Pd., MM.', '0818229022', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1952, 897, 'Bendahara', 'Dra. Rachmi Krisdiani', '081220617272', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1953, 898, 'Ketua', 'Ari Purnama Sidik', '08112220299', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1954, 898, 'Sekretaris', 'Lutfi Mohamad Saputra, S.Kom', '0818383730', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1955, 898, 'Bendahara', 'Riny Fitriyani, S.Kom', '08197999111', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1956, 899, 'Ketua', 'Rd. Baran Bhuana', '083822171499', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1957, 899, 'Sekretaris', 'Tasya Khairunnisa S', '087870243828', '2025-05-21 10:09:26', '2025-05-21 10:09:26');
INSERT INTO `pengurus_ormas` (`id`, `ormas_id`, `jabatan`, `nama`, `no_telepon`, `created_at`, `updated_at`) VALUES
(1958, 899, 'Bendahara', 'Ratih', '083821074631', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1959, 900, 'Ketua', 'Hj. Ega Megantari', '087722395011', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1960, 900, 'Sekretaris', 'Tursiani Ratnawati, ST', '08122128599', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1961, 901, 'Ketua', 'Sofyanudin Syarif', '0821268335073', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1962, 901, 'Sekretaris', 'Rudy Sanjaya, SH. MH.', '081321667577', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1963, 901, 'Bendahara', 'Agung Sujianto,S.IP', '082117555399\'', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1964, 902, 'Ketua', 'H. Tatang Muhtar', '081318239023', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1965, 902, 'Sekretaris', 'Hj. Neneng Athiatul F, M. Ikom', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1966, 902, 'Bendahara', 'H. Tony Hermawan, ST', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1967, 903, 'Ketua', 'Yuniati Fransisa', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1968, 903, 'Sekretaris', 'Nur Azizah, S.Pd., M.M', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1969, 903, 'Bendahara', 'Utari Kartika Sari, S.E., M.Si.', NULL, '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1970, 904, 'Ketua', 'Dedi', '08980851030', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1971, 904, 'Bendahara', 'Drs. Ade Susanto', '085100412164', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1972, 904, 'Bendahara', 'Halim Susanto', '08121414699', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1973, 905, 'Ketua', 'Wahyu Hidayat', '081313112956', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1974, 905, 'Sekretaris', 'Pendi Effendi', '081909544173', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1975, 905, 'Bendahara', 'Aan Rohana', '081221998401', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1976, 906, 'Ketua', 'K ; R.A Richardy B', '08122257161', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1977, 906, 'Sekretaris', 'Lili Hartono, S>E,. MBA', '085659091536', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1978, 907, 'Ketua', 'Lili Hartono', '085659091536', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1979, 907, 'Sekretaris', 'Fetie Febrianie', '081222627274', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1980, 907, 'Bendahara', 'Dyonesia Adventiliana', '085624305372', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1981, 908, 'Ketua', 'Parlin Karya Siagian', '081214228802', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1982, 908, 'Sekretaris', 'Hery Wahriyadi', '08987800459', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1983, 908, 'Bendahara', 'Robert', '0882001984382', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1984, 909, 'Ketua', 'Syarief Setia', '082120997477', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1985, 909, 'Sekretaris', 'Dadang Nurwenda', '0818435933', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1986, 909, 'Bendahara', 'Dicky Ashari Setia', '081281000503', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1987, 910, 'Ketua', 'Husni Ahmadi', '08112111166', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1988, 910, 'Sekretaris', 'Rachmat Suhendar', '081222141211', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1989, 910, 'Bendahara', 'Purnomo', '08974169270', '2025-05-21 10:09:26', '2025-05-21 10:09:26'),
(1990, 911, 'Ketua', 'Muhamad Rahayu', '082120997477', '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(1991, 911, 'Sekretaris', 'Yusup Supriatna', '0818435933', '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(1992, 911, 'Bendahara', 'Riki Irawan', '081281000503', '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(1993, 912, 'Ketua', 'Sulaeman Sudrajat', '082126386533', '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(1994, 912, 'Sekretaris', 'Dadang Rohiman', '082126843082', '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(1995, 912, 'Bendahara', 'Ade Triyasa', '082126386533', '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(1996, 913, 'Ketua', 'Asep Djuhaeri', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(1997, 913, 'Sekretaris', 'Rully  Hendarsyah', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(1998, 913, 'Bendahara', 'Lili Sadeli', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(1999, 915, 'Ketua', 'Agus Mukti', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2000, 915, 'Sekretaris', 'Toni, S.pd', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2001, 915, 'Bendahara', 'Handri Hadiansyah', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2002, 916, 'Ketua', 'Chandra Tambayong', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2003, 916, 'Sekretaris', 'Iswahjudi Sastrosukarno', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2004, 916, 'Bendahara', 'Ely Gunawan, SH', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2005, 917, 'Ketua', 'Kurniadi Salim', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2006, 917, 'Sekretaris', 'Nopii Padilah, S.Ap', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2007, 917, 'Bendahara', 'Nunung Siti Nurrohmah', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2008, 918, 'Ketua', 'RD. Heri Heryawan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2009, 918, 'Sekretaris', 'Agil Yayat  Rahmat', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2010, 918, 'Bendahara', 'Yudi Gunawan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2011, 919, 'Ketua', 'Dr. Kurniawan Saefullah', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2012, 919, 'Sekretaris', 'Dr.  Fathurrachman', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2013, 919, 'Bendahara', 'Ariyyo Bimmo, S.H., LLM.', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2014, 920, 'Ketua', 'Gumilar Sayidul Akbar', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2015, 920, 'Sekretaris', 'Harry Prastowo, A.Md', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2016, 920, 'Bendahara', 'Satini', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2017, 921, 'Ketua', 'Syahida Lulu Salsabila', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2018, 921, 'Sekretaris', 'Sarah Maulida Lestari', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2019, 921, 'Bendahara', 'Mohammad Rizal Fadhilah', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2020, 922, 'Ketua', 'Fajar Budiman', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2021, 922, 'Sekretaris', 'Gugun Gunawan', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2022, 922, 'Bendahara', 'Wulansari', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2023, 923, 'Ketua', 'Asep Budi Pramono', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2024, 923, 'Sekretaris', 'Widya Ismi Hastuti', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2025, 923, 'Bendahara', 'Wida Novia Pangestika', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2026, 924, 'Ketua', 'H. Asep Salim', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2027, 924, 'Sekretaris', 'Reza Adel Haiji', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2028, 924, 'Bendahara', 'Imas Maemunah', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2029, 925, 'Ketua', 'Tanti Kusumah Dewi', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2030, 925, 'Sekretaris', 'Siti Saripah Daliyus Idawati, SE', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2031, 925, 'Bendahara', 'Erikrisna Loviandres, Dipl. Hot', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2032, 926, 'Ketua', 'Dra. Ida Widaningsih', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2033, 926, 'Sekretaris', 'Syahfitri Agustina', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27'),
(2034, 926, 'Bendahara', 'Tianur Evaningsih, SE', NULL, '2025-05-21 10:09:27', '2025-05-21 10:09:27');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bidang_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `bidang_id`, `program_id`, `image`, `title`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1749624982_pengukuhan-100-anggota-paskibraka-kota-bandung.jpg', 'PENGUKUHAN 100 ANGGOTA PASKIBRAKA KOTA BANDUNG', 'pengukuhan-100-anggota-paskibraka-kota-bandung', '<p>Sebanyak 100 calon anggota Pasukan Pengibar Bendera Pusaka (Paskibraka) Kota Bandung tahun 2024 resmi dikukuhkan dalam upacara yang berlangsung di Plaza Balai Kota Bandung pada Kamis, 15 Agustus 2024 malam.</p>\r\n\r\n<p>Dalam acara yang penuh khidmat ini, Pj. Wali Kota Bandung, Pak Bambang Tirtoyuliono menekankan pentingnya disiplin, loyalitas, dan pengabdian tanpa pamrih dalam menjalankan tugas mulia sebagai Paskibraka.</p>\r\n\r\n<p>Pak Bambang menegaskan, Paskibraka adalah orang-orang terpilih yang mendapatkan kehormatan untuk mengibarkan Sang Merah Putih pada peringatan HUT ke-79 Republik Indonesia.</p>\r\n\r\n<p>Pak Bambang berpesan, para anggota Paskibraka harus tetap menjadi teladan di lingkungan sekitar. Mereka diharapkan mampu menjaga sikap dan perilaku yang baik, menguatkan karakter sebagai generasi muda yang unggul, pantang menyerah, dan mampu beradaptasi dengan lingkungan di mana pun berada.</p>', '2025-04-14 03:27:15', '2025-06-10 23:56:22'),
(2, 1, 6, '1744626546_Bidang1artikel2.jpg', '3 MENIT UNTUK INDONESIA “DARI BANDUNG UNTUK INDONESIA\"', '3-menit-untuk-indonesia-dari-bandung-untuk-indonesia', '<p>Masyarakat antusias mengikuti upacara selama 3 menit itu di Simpang lima asia Afrika kota bandung dan Simpang Cikapayang Dago, Sabtu 17 Agustus 2024.</p>\r\n\r\n<p>Bendera Merah Putih pun dikibarkan di tugu simpang lima asia afrika dan di atas Fly Over Prof. Mochtar Kusumaatmadja (Pasupati), dengan sigap masyarakat pun hormat kepada bendera pusaka tersebut.</p>\r\n\r\n<p>Kegiatan tersebut diikuti oleh kepala OPD Kota Bandung berbagai komunitas, para petugas lalu lintas, pemadam kebakaran hingga masyarakat yang melintas kawasan itu.</p>\r\n\r\n<p>Diawali dengan membacakan Teks Proklamasi dilanjut pembacaan teks Pancasila secara bersamaan.</p>\r\n\r\n<p>Tepat pukul 10.17 yang tersambung dengan kegiatan di Istana Negara, masyarakat pun berdiri tegak sambil hormat kepada bendera merah putih.</p>', '2025-04-14 03:29:06', '2025-05-27 16:38:31'),
(3, 1, 5, '1744626609_Bidang1artikel3.jpg', 'KEMAH PANCASILA', 'kemah-pancasila', '<p>Bandung, 20-21 November 2024. Badan Kesatuan Bangsa dan Politik kota Bandung mengadakan kegiatan KEMAH PANCASILA bersama para anak muda kelompok bermotor dengan tema <strong>\"Akur Sadudulur Hade Salelembur\".</strong></p>\r\n\r\n<p>kegiatan ini bertujuan mempererat silaturahmi antara pemerintahan dengan Masyarakat khususnya anak muda Kota Bandung. melalui berbagai agenda salah satunya yaitu pematerian ideologi wawasan kebangsaan dan juga spiritual keagamaan yang menjadi Langkah awal mempererat tali persaudaraan diantara semuanya. Kegiatan ini berlangsung dengan lancar sehingga membuat anak muda semakin mengingat pentingnya nilai nilai Pancasila dalam kehidupan berbangsa dan bernegara.</p>', '2025-04-14 03:30:09', '2025-05-27 16:39:19'),
(4, 2, 7, '1744626707_Bidang2artikel1.jpg', 'KEGIATAN SOSIALISASI PERATURAN ALAT PERAGA KAMPANYE DAN PERATURAN NETRALITAS ASN PADA PILKADA SERENTAK TAHUN 2024', 'kegiatan-sosialisasi-peraturan-alat-peraga-kampanye-dan-peraturan-netralitas-asn-pada-pilkada-serentak-tahun-2024', '<p>Pelaksanaan Sosialisasi Peraturan Alat Peraga Kampanye dan Peraturan Netralitas PNS pada Pilkada Serentak Tahun 2024 dihadiri oleh para Kepala Perangkat Daerah di lingkungan Pemerintah Kota Bandung, Camat se-Kota Bandung dan Lurah se-Kota Bandung, dengan jumlah peserta sebanyak 235 orang. diawali dengan sambutan yang disampaikan oleh Penjabat Wali Kota Bandung yang didampingi oleh Kepala Badan Kesatuan Bangsa dan Politik Kota Bandung.</p>\r\n\r\n<p>Sosialisasi Peraturan Alat Peraga, Peraturan Alat Peraga Kampanye dan Peraturan Netralitas ASN pada Pilkada Serentak 2024 dirancang untuk memberikan pemahaman yang menyeluruh mengenai peraturan mengenai alat peraga kampanye dan netralitas ASN pada Pilkada Serentak 2024 kepada para Kepala Perangkat Daerah, Camat dan Lurah.</p>\r\n\r\n<p>pertemuan diadakan pada tanggal 1 Oktober 2024 dengan 235 peserta dari Pemerintah Kota Bandung, kecamatan, dan organisasi lokal lainnya. Sosialisasi Peraturan Alat Peraga Kampanye dan Peraturan Netralitas Pegawai dalam Pemilu Serentak 2024, Di Hotel Horison Bandung, Jalan Pelajar Pejuang 45 No. 121, Bandung</p>\r\n\r\n<p>Pada tahun 2024, akan mempersiapkan pemerintah daerah di semua tingkatan untuk menjalankan tugas dan fungsinya dalam mendukung pemilu yang jujur dan adil. Tujuannya adalah untuk menyadarkan para kepala daerah, camat dan lurah akan pentingnya mengikuti aturan kampanye dan menjaga netralitas pegawai. Dan menghindari pelanggaran dalam pemasangan alat peraga kampanye dan perilaku pegawai negeri sipil yang dapat mempengaruhi pemilu.</p>\r\n\r\n<p>Sementara itu, Bambang Sukardi, Kepala Badan Kesatuan Bangsa dan Politik (Bakesbangpol) Kota Bandung, mengatakan bahwa telah terjadi peningkatan dalam jumlah pemilu yang diadakan di Bandung.  bahwa selalu positif. Pilkada serentak 2024 akan berlangsung pada tanggal 27 November 2024. Warga Bandung akan memilih Walikota dan Wakil Walikota baru, serta Gubernur dan Wakil Gubernur Jawa Barat.</p>', '2025-04-14 03:31:47', '2025-05-27 16:41:12'),
(5, 2, 7, '1744626751_Bidang2artikel2.jpg', 'PENDIDIKAN POLITIK BAGI MASYARAKAT KOTA BANDUNG TAHUN 2024 (FPK, FKDM, MUI, TP. PKK & ORGANISASI MASYARAKAT)', 'pendidikan-politik-bagi-masyarakat-kota-bandung-tahun-2024-fpk-fkdm-mui-tp-pkk-organisasi-masyarakat', '<p>Kegiatan Pendidikan Politik bagi masyarakat Kota Bandung tahun 2024 yang dilaksanakan oleh Badan Kesatuan Bangsa dan Politik melibatkan berbagai organisasi, seperti FPK, FKDM, MUI, TP PKK, serta organisasi masyarakat lainnya. Program ini bertujuan meningkatkan kesadaran politik masyarakat terkait pentingnya Pemilu dan Pilkada yang damai, adil, dan demokratis. Melalui pendidikan politik, masyarakat diberi pemahaman mendalam mengenai hak dan kewajiban sebagai pemilih, serta didorong untuk berpartisipasi aktif dalam seluruh tahapan Pemilu.</p>\r\n\r\n<p>Pelaksanaan kegiatan ini diadakan pada 12 September 2024 di Hotel Horison Bandung dengan menghadirkan 300 peserta. Acara tersebut melibatkan berbagai narasumber, termasuk KPU, Bawaslu, dan akademisi lokal, yang menyampaikan materi terkait penyelenggaraan Pemilu dan Pilkada serentak 2024. Dalam kesempatan ini, pemerintah menekankan pentingnya netralitas aparatur sipil negara, literasi politik, serta produksi pesan politik yang menyejukkan oleh partai politik dan tim sukses untuk menjaga stabilitas dan keharmonisan sosial.</p>\r\n\r\n<p>Kegiatan ini berhasil menciptakan dialog yang konstruktif, mengidentifikasi potensi tantangan dalam proses Pemilu, serta membangun komitmen bersama untuk menyukseskan Pilkada serentak. Dengan dukungan dari seluruh pihak, acara ini diharapkan dapat mewujudkan Pemilu yang berkualitas, menghasilkan pemimpin legitimatif, dan berkontribusi pada pembangunan Kota Bandung yang lebih maju dan berkelanjutan​.</p>', '2025-04-14 03:32:31', '2025-05-27 16:41:51'),
(6, 2, 7, '1744626910_Bidang2artikel3.jpg', 'PENDIDIKAN POLITIK BAGI TENAGA PENGAJAR PKN PADA SMA/SMK/MA SE-KOTA BANDUNG', 'pendidikan-politik-bagi-tenaga-pengajar-pkn-pada-smasmkma-se-kota-bandung', '<p>Pada tanggal 21 Agustus 2024 di Hotel Horison Bandung para guru PKN SMA/SMK/MA se-Kota Bandung mendiskusikan pendidikan politik. Ide pelaksanaan pendidikan politik bagi tenaga pengajar ini datang dari para guru PKN SMA/SMK/MA se-Kota Bandung yang berjumlah 300 orang. Acara ini dibuka oleh Bapak Asisten 1 Kota Bandung, didampingi oleh Kepala Bidang Poldagri di Badan Kesatuan Bangsa dan Politik Kota Bandung. Peserta mendapatkan banyak materi tentang bagaimana Pemilu dan Pilkada 2024 yang akan berlangsung serentak dari para pembicara dari KPU Kota Bandung dan Bawaslu Kota Bandung.</p>\r\n\r\n<p>Tujuan dari kegiatan ini ingin mendorong generasi muda untuk memilih dan mengajak partai politik dan institusi pendidikan untuk bekerja sama dalam meningkatkan pendidikan politik dan pembangunan sosial. Partai politik dan institusi pendidikan bekerja sama untuk memberikan pendidikan politik dan mengembangkan etika dan budaya politik di tahun 2024. Hal ini membantu menciptakan iklim politik dalam negeri yang lebih kondusif dan kehidupan demokrasi di Kota Bandung. Hal ini mendukung visi pembangunan nasional yang sejalan dengan visi Kota Bandung, yaitu unggul, nyaman, sejahtera, dan religius.</p>\r\n\r\n<p>Program ini bertujuan untuk meningkatkan peran partai politik dan lembaga pendidikan melalui pendidikan politik. Para guru diharapkan dapat mengajak para siswanya untuk berpartisipasi dalam Pemilu 2024. 300 peserta berasal dari guru-guru PKN tingkat SMA/sederajat se-Kota Bandung. Kegiatan ini akan membantu para pemilih pemula yang diwakili oleh guru-guru PKN tingkat SMA/sederajat se-Kota Bandung untuk memahami Pemilu dan Pilkada Serentak 2024. Guru-guru PKN di sekolah menengah atas dan sekolah kejuruan dapat membantu masyarakat untuk memahami pemilu di Indonesia. Guru dapat mengajarkan tentang pemilu, demokrasi, serta hak dan tanggung jawab pemilih. Mereka dapat menggunakan buku pelajaran, materi multimedia, dan studi kasus pemilu yang nyata.</p>', '2025-04-14 03:35:10', '2025-05-27 16:42:17'),
(7, 2, 7, '1744626962_Bidang2artikel4.jpg', 'PENDIDIKAN POLITIK BAGI MASYARAKAT KOTA BANDUNG TAHUN 2024 (FORUM RW)', 'pendidikan-politik-bagi-masyarakat-kota-bandung-tahun-2024-forum-rw', '<p>Program pendidikan politik bagi masyarakat dengan tema \'Menyambut Pemilu dan Pilkada Serentak 2024\'. Idenya adalah untuk memberikan dorongan kepada partai politik dan institusi pendidikan melalui pendidikan politik dan pengembangan etika dan budaya politik pada tahun 2024. Pada tahun 2024, pendidikan politik dan pengembangan etika dan budaya politik akan menciptakan iklim politik dalam negeri yang kondusif dan kehidupan yang demokratis.</p>\r\n\r\n<p>Tujuannya ingin mendeteksi dan memprediksi perkembangan dinamika sosial dan politik di Kota Bandung menjelang Pemilihan Umum Serentak dan Pemilihan Kepala Daerah pada tahun 2024. juga ingin membantu masyarakat Kota Bandung untuk memahami dan menyadari hak dan kewajiban politiknya sebagai warga negara. Inisiatif Pendidikan Politik untuk Masyarakat Kota Bandung yang baru diluncurkan oleh Bapak Ka. Bagian Tata Pemerintahan Kota Bandung yang didampingi oleh Kepala Bidang Poldagri Badan Kesatuan Bangsa dan Politik Kota Bandung.</p>\r\n\r\n<p>Kegiatan Pelaksanaan Pendidikan Politik Bagi Masyarakat Kota Bandung di Hotel Horison Bandung pada tanggal 22 Agustus 2024.Peserta mendapatkan beberapa materi yang bermanfaat tentang bagaimana pelaksanaan pemilu dan pilkada serentak 2024 dari narasumber dari KPU Kota Bandung, Bawaslu Kota Bandung, dan akademisi Kota Bandung.</p>\r\n\r\n<p>Kesbangpol adalah pihak netral yang membantu memfasilitasi partisipasi dalam pemilu oleh partai politik, penyelenggara pemilu, dan masyarakat. memiliki program untuk meningkatkan peran partai politik dan lembaga pendidikan melalui pendidikan politik dan pengembangan etika dan budaya politik pada tahun 2022. Hal ini dilakukan untuk menciptakan iklim politik dalam negeri yang lebih baik dan kehidupan yang lebih demokratis di Kota Bandung, yang akan membantu kita mencapai tujuan pembangunan nasional.</p>', '2025-04-14 03:36:02', '2025-05-27 16:42:56'),
(8, 2, 8, '1744627006_Bidang2artikel5.jpg', 'BIMBINGAN TEKNIS LAPORAN PERTANGGUNG JAWABAN BANTUAN KEUANGAN PARTAI POLITIK KOTA BANDUNG', 'bimbingan-teknis-laporan-pertanggung-jawaban-bantuan-keuangan-partai-politik-kota-bandung', '<p>Kegiatan Bimbingan Teknis Laporan Pertanggungjawaban Bantuan Keuangan Partai Politik Kota Bandung Tahun 2024 dilaksanakan pada 16-17 Juli 2024 di Atlantic City Hotel Bandung. Acara ini diikuti oleh 30 kader dari 9 partai politik penerima dana hibah, dengan tujuan meningkatkan pemahaman tentang pengelolaan dan pelaporan keuangan yang transparan dan akuntabel.</p>\r\n\r\n<p>Materi yang disampaikan oleh narasumber dari Badan Diklat BPK RI, Ditjen Polpum Kemendagri, dan Inspektorat Kota Bandung mencakup tata cara penyusunan laporan dana hibah sesuai standar. Kegiatan ini diharapkan dapat mencegah temuan BPK serta meningkatkan profesionalisme partai dalam mengelola dana.</p>\r\n\r\n<p>Hasilnya, kegiatan ini memperkuat kapasitas pengurus partai dalam pengelolaan keuangan, meningkatkan kepercayaan publik terhadap partai politik, dan mendukung terciptanya demokrasi yang sehat dan berintegritas di Kota Bandung.</p>', '2025-04-14 03:36:46', '2025-05-27 16:44:26'),
(9, 2, 8, '1744627053_Bidang2artikel6.jpg', 'DEKLARASI DAMAI PILKADA SERENTAK KOTA BANDUNG TAHUN 2024', 'deklarasi-damai-pilkada-serentak-kota-bandung-tahun-2024', '<p>Kegiatan Deklarasi Damai Pilkada Serentak Kota Bandung Tahun 2024 dilaksanakan pada 12 Agustus 2024 di Hotel Horison Bandung, diikuti oleh 750 peserta, termasuk pejabat pemerintah, tokoh masyarakat, dan organisasi terkait. Acara ini bertujuan mewujudkan iklim politik yang kondusif, meningkatkan kesadaran demokrasi, serta memastikan pelaksanaan Pilkada berlangsung aman dan damai.</p>\r\n\r\n<p>Deklarasi ini berhasil menciptakan komitmen bersama dari berbagai pihak, termasuk pemerintah, partai politik, dan masyarakat, untuk mendukung Pilkada yang demokratis dan bebas konflik. Selain itu, acara ini memperkuat partisipasi masyarakat, dengan target peningkatan angka partisipasi lebih dari 90%, khususnya dari pemilih pemula.</p>\r\n\r\n<p>Dampak positifnya adalah peningkatan kepercayaan publik terhadap proses demokrasi, yang menghasilkan pemimpin legitimatif untuk mendukung pembangunan berkelanjutan di Kota Bandung. Deklarasi ini bukan sekadar formalitas, melainkan pengikat bersama dalam menjaga demokrasi yang bermartabat dan berkualitas​.</p>', '2025-04-14 03:37:33', '2025-05-27 16:47:10'),
(10, 2, 8, '1744627092_Bidang2artikel7.jpg', 'DISKUSI POLITIK KOTA BANDUNG TAHUN 2024', 'diskusi-politik-kota-bandung-tahun-2024', '<p>Diskusi Politik Kota Bandung Tahun 2024 dilaksanakan pada 21 Mei 2024 di Hotel Atlantic Bandung, dengan melibatkan 200 peserta dari berbagai organisasi masyarakat, BEM universitas, dan partai politik yang terverifikasi di KPU Kota Bandung. Acara ini dibuka oleh Sekretaris Badan Kesatuan Bangsa dan Politik Kota Bandung dan menghadirkan narasumber dari Ketua DPRD, budayawan, serta akademisi lokal untuk memberikan pemahaman mendalam mengenai penyelenggaraan Pemilu dan Pilkada serentak.</p>\r\n\r\n<p>Tujuan utama kegiatan ini adalah mendeteksi dinamika sosial politik di Kota Bandung, meningkatkan kesadaran hak dan kewajiban politik masyarakat, serta menciptakan iklim demokrasi yang sehat dan berkualitas. Diskusi ini juga menjadi platform untuk menyerap masukan dari masyarakat dalam rangka meningkatkan partisipasi pemilih, terutama generasi muda, dengan harapan mempertahankan tingkat partisipasi yang telah mencapai 80% pada pemilu sebelumnya.</p>\r\n\r\n<p>Hasil dari diskusi ini menunjukkan bahwa situasi sosial politik di Kota Bandung tetap kondusif dan masyarakat memiliki antusiasme tinggi terhadap Pemilu. Kesbangpol sebagai fasilitator netral membantu menjaga harmoni antara partai politik, penyelenggara Pemilu, dan masyarakat, untuk menciptakan proses demokrasi yang jujur, adil, dan damai demi pembangunan Kota Bandung yang unggul dan berkelanjutan​.</p>', '2025-04-14 03:38:12', '2025-05-27 16:47:23'),
(11, 2, 7, '1744627940_Bidang2artikel8.jpg', 'FESTIVAL DEMOKRASI KOTA BANDUNG TAHUN 2024', 'festival-demokrasi-kota-bandung-tahun-2024', '<p>Festival Demokrasi Kota Bandung tahun 2024 yang bertema \"Meningkatkan Partisipasi dan Edukasi Politik Bagi Masyarakat dan Pemilih Pemula Menuju Pilkada Serentak\" dilaksanakan pada 4 September 2024 di Tugu Monumen Bandung Lautan Api. Kegiatan ini diikuti oleh 2.000 peserta, termasuk pejabat pemerintah, organisasi masyarakat, tokoh agama, pelajar, serta berbagai stakeholder terkait. Festival ini bertujuan menciptakan iklim politik yang kondusif dan demokrasi berkualitas di Kota Bandung.</p>\r\n\r\n<p>Acara ini dibuka oleh Pj Wali Kota Bandung bersama Kepala Badan Kesatuan Bangsa dan Politik Kota Bandung. Selama acara, peserta menerima edukasi politik terkait hak dan kewajiban pemilih, pentingnya peran pemilih pemula, dan nilai-nilai demokrasi. Materi ini diharapkan dapat meningkatkan kesadaran politik masyarakat, terutama generasi muda, untuk berpartisipasi aktif dalam Pemilu dan Pilkada yang adil dan damai.</p>\r\n\r\n<p>Pelaksanaan Festival Demokrasi ini dibiayai oleh DPA Badan Kesatuan Bangsa dan Politik Kota Bandung. Selain sebagai ajang edukasi, festival ini menjadi wadah kolaborasi antara pemerintah, masyarakat, dan sektor pendidikan untuk memperkuat komitmen bersama dalam mewujudkan Pemilu yang damai, aman, dan demokratis​.</p>', '2025-04-14 03:38:51', '2025-05-27 16:45:31'),
(13, 1, 4, '1751527091_kecerdasaran-kepemimpinan-dan-pancasila-di-leadership-academy.jpg', 'KECERDASARAN KEPEMIMPINAN DAN PANCASILA DI LEADERSHIP ACADEMY', 'kecerdasaran-kepemimpinan-dan-pancasila-di-leadership-academy', '<p>Bandung, Juni 2025 — Badan Kesatuan Bangsa dan Politik (Bakesbangpol) Kota Bandung menyelenggarakan kegiatan bertema “Pemuda Merupakan Penerus Bangsa, Pemegang Tongkat Estafet Kepemimpinan di Masa Mendatang”. Kegiatan ini bertujuan untuk membekali generasi muda dengan semangat kepemimpinan yang berpijak pada nilai-nilai Pancasila serta memperkuat wawasan kebangsaan mereka dalam menghadapi berbagai tantangan zaman. Melalui kegiatan ini, pemuda didorong untuk lebih sadar akan peran pentingnya dalam menjaga keutuhan bangsa dan menjadi bagian dari solusi atas permasalahan yang ada di masyarakat.</p>\r\n\r\n<p>Dalam pelaksanaannya, peserta mengikuti sesi edukatif dan diskusi interaktif yang membahas pentingnya karakter kepemimpinan yang berintegritas, berlandaskan persatuan, keadilan sosial, gotong royong, dan toleransi. Nilai-nilai ini menjadi pondasi dalam membentuk pemimpin masa depan yang tidak hanya cerdas secara intelektual, tetapi juga kuat secara moral dan etika. Dari dokumentasi yang diunggah di media sosial, terlihat antusiasme para peserta dalam menyerap materi, bertanya, dan berdiskusi aktif selama kegiatan berlangsung.</p>\r\n\r\n<p>Kegiatan ini menjadi salah satu bentuk nyata komitmen Bakesbangpol Kota Bandung dalam menciptakan ruang pembinaan yang positif bagi pemuda. Melalui kegiatan semacam ini, diharapkan Pancasila tidak hanya dipahami sebagai dasar negara, tetapi benar-benar dihayati dan diamalkan dalam kehidupan sehari-hari. Generasi muda diharapkan mampu membawa estafet kepemimpinan dengan menjunjung tinggi nilai-nilai kebangsaan dan siap menghadapi masa depan dengan semangat yang tangguh dan bertanggung jawab. </p>', '2025-07-01 19:14:27', '2025-07-03 00:18:11'),
(14, 2, 7, '1751527066_pendidikan-politik-bersama-organisasi-kemasyarakatan-perkuat-peran-strategis-masyarakat-dalam-mendukung-visi-bandung-utama.jpg', 'PENDIDIKAN POLITIK BERSAMA ORGANISASI KEMASYARAKATAN: PERKUAT PERAN STRATEGIS MASYARAKAT DALAM MENDUKUNG VISI BANDUNG UTAMA', 'pendidikan-politik-bersama-organisasi-kemasyarakatan-perkuat-peran-strategis-masyarakat-dalam-mendukung-visi-bandung-utama', '<p>Bandung, 20 Mei 2025 — Badan Kesatuan Bangsa dan Politik (BAKESBANGPOL) Kota Bandung melalui Bidang Politik Dalam Negeri kembali menggelar kegiatan Pendidikan Politik yang melibatkan perwakilan dari berbagai Organisasi Kemasyarakatan (Ormas). Acara ini mengusung tema \"Peran dan Fungsi Organisasi Masyarakat dalam Mendukung Visi Bandung Utama\", yang bertujuan untuk meningkatkan pemahaman serta peran aktif Ormas dalam kehidupan demokrasi lokal.</p>\r\n\r\n<p>Kegiatan ini secara resmi dibuka oleh Wakil Wali Kota Bandung yang turut menyampaikan pentingnya peran strategis Ormas sebagai elemen kunci dalam mengawal nilai-nilai demokrasi dan pembangunan di Kota Bandung. Dalam sambutannya, beliau menekankan bahwa:</p>\r\n\r\n<p>“Hal penting yang menjadi kunci peran strategis Organisasi Kemasyarakatan dalam mendukung Visi Bandung UTAMA yaitu sebagai katalisator politik masyarakat dan menjadi garda terdepan dalam menyebarkan nilai-nilai demokrasi, kebangsaan, dan etika politik yang sehat yang berbasis kepada musyawarah, toleransi, dan keberagaman.”</p>\r\n\r\n<p>Pemerintah Kota Bandung mengapresiasi keterlibatan aktif masyarakat sipil sebagai kekuatan moral dan sosial yang mampu mendorong tata kelola pemerintahan yang lebih partisipatif dan inklusif.</p>\r\n\r\n<p>Untuk memperkaya wawasan peserta, acara ini menghadirkan narasumber dari berbagai latar belakang, mulai dari kalangan akademisi, budayawan, hingga pengamat politik. Kehadiran para narasumber ini diharapkan dapat memberikan pemahaman yang menyeluruh mengenai dinamika politik lokal serta peran strategis masyarakat dalam menjaga stabilitas demokrasi.</p>\r\n\r\n<p>Wakil Wali Kota juga menegaskan pentingnya kolaborasi antar elemen masyarakat untuk mewujudkan visi Bandung UTAMA sebuah visi yang mengedepankan pembangunan yang Unggul, Tertib, Aman, Mandiri, dan Agamis.</p>\r\n\r\n<p>“Pentingnya kolaborasi dari elemen masyarakat menjadi fondasi untuk menjadikan Kota Bandung sebagai kota yang maju, inklusif, dan demokratis,” tambahnya.</p>', '2025-07-01 19:27:55', '2025-07-03 00:17:46'),
(15, 3, 14, '1751527052_koordinasi-dan-diskusi-p4gn-menangkal-peredaran-narkoba-di-lingkungan-masyarakat.jpg', 'KOORDINASI DAN DISKUSI P4GN: MENANGKAL PEREDARAN NARKOBA DI LINGKUNGAN MASYARAKAT', 'koordinasi-dan-diskusi-p4gn-menangkal-peredaran-narkoba-di-lingkungan-masyarakat', '<p>Kegiatan Koordinasi dan Diskusi P4GN Kota Bandung Tahun 2025 dilaksanakan pada 26 Juni 2025 di Aula Kantor Bakesbangpol Kota Bandung. Kegiatan ini diikuti oleh unsur Forkopimda, BNN Kota Bandung, perangkat daerah, tokoh masyarakat, serta organisasi kepemudaan dan kemasyarakatan. Tujuan utama kegiatan ini adalah untukx memperkuat koordinasi lintas sektor dalam rangka Pencegahan, Pemberantasan, Penyalahgunaan, dan Peredaran Gelap Narkoba (P4GN) di wilayah Kota Bandung.</p>\r\n\r\n<p>Acara dibuka oleh Kepala Bakesbangpol Kota Bandung dan menghadirkan narasumber dari BNN Kota Bandung serta praktisi bidang hukum dan kesehatan masyarakat. Dalam diskusi, peserta menerima pemaparan mengenai data tren peredaran narkoba yang kian mengkhawatirkan di kalangan remaja dan usia produktif. Selain itu, dipaparkan pula strategi pencegahan berbasis komunitas, seperti pembentukan relawan anti-narkoba, edukasi di lingkungan sekolah dan kampus, serta penguatan peran keluarga dalam memberikan pengawasan dan pendidikan moral. Penekanan juga diberikan pada pentingnya partisipasi aktif masyarakat dalam melakukan deteksi dini, pelaporan kasus, dan mendukung proses rehabilitasi pengguna sebagai bagian dari pendekatan kemanusiaan dan reintegrasi sosial.</p>\r\n\r\n<p>Melalui kegiatan ini, diharapkan terbentuk kesadaran kolektif dan komitmen bersama dari berbagai pihak untuk melawan peredaran narkoba secara menyeluruh dan berkelanjutan. Kegiatan ini menjadi langkah awal yang konkret dalam membangun jejaring koordinatif yang solid di antara seluruh pemangku kepentingan di Kota Bandung. Pelaksanaan kegiatan koordinasi dan diskusi P4GN ini dibiayai oleh DPA Badan Kesatuan Bangsa dan Politik Kota Bandung. Selain sebagai bentuk edukasi, kegiatan ini juga menjadi wadah kolaborasi antara pemerintah, lembaga negara, dan masyarakat dalam menciptakan lingkungan yang aman, sehat, serta bebas dari penyalahgunaan narkoba di Kota Bandung.</p>', '2025-07-01 19:34:22', '2025-07-03 00:17:32'),
(16, 4, 18, '1751527029_apel-pembentukan-satgas-pemberantasan-premanisme-di-kecamatan-astana-anyar-perkuat-sinergi-demi-bandung-yang-aman-dan-nyaman.jpg', 'APEL PEMBENTUKAN SATGAS PEMBERANTASAN PREMANISME DI KECAMATAN ASTANA ANYAR: PERKUAT SINERGI DEMI BANDUNG YANG AMAN DAN NYAMAN', 'apel-pembentukan-satgas-pemberantasan-premanisme-di-kecamatan-astana-anyar-perkuat-sinergi-demi-bandung-yang-aman-dan-nyaman', '<p>Bandung, 14 April 2025 — Pemerintah Kota Bandung terus berkomitmen menciptakan lingkungan yang aman, tertib, dan nyaman bagi seluruh warga. Komitmen tersebut ditunjukkan melalui pelaksanaan Apel Pembentukan Satgas Pemberantasan Premanisme di Kecamatan Astana Anyar, yang dipimpin langsung oleh Wali Kota Bandung dan didampingi oleh jajaran Kepala OPD. Kegiatan ini menjadi bagian dari langkah strategis Pemerintah Kota Bandung dalam mengantisipasi dan memberantas praktik premanisme yang meresahkan masyarakat, khususnya di wilayah-wilayah rawan seperti pasar, terminal, dan pemakaman.</p>\r\n\r\n<p><strong>Arahan Walikota: Kolaborasi adalah Kunci</strong></p>\r\n\r\n<p>Dalam arahannya, Wali Kota menekankan pentingnya kolaborasi lintas sektor dalam mensukseskan pemberantasan premanisme:</p>\r\n\r\n<p>“Kolaborasi merupakan kunci utama dalam menciptakan Kota Bandung yang bebas dari premanisme. Dengan sinergi antar-instansi dan keterlibatan masyarakat, upaya ini akan menjadi lebih kuat dan berkelanjutan.”</p>\r\n\r\n<p><strong>Komposisi Satgas Anti Premanisme</strong></p>\r\n\r\n<p>Satgas Anti Premanisme yang dibentuk ini merupakan wujud nyata pendekatan kolaboratif, yang melibatkan berbagai unsur penting di lapangan, diantaranya TNI, Polri, ASN, Kepala UPT wilayah seperti pasar, terminal, dan pemakaman . Keterlibatan unsur-unsur strategis tersebut diharapkan dapat menghadirkan kehadiran negara secara langsung di tengah masyarakat serta menumbuhkan rasa aman dalam beraktivitas sehari-hari.<br><br>BAKESBANGPOL Kota Bandung sebagai fasilitator kegiatan ini menyampaikan apresiasi kepada seluruh pihak yang telah mendukung dan ikut serta dalam upaya pemberantasan premanisme, serta berharap kegiatan serupa dapat direplikasi di kecamatan lainnya.</p>', '2025-07-01 19:42:01', '2025-07-03 00:17:09'),
(17, 4, 20, '1751527007_rapat-sinergitas-dan-kunjungan-mitra-strategis-bakesbangpol-kota-bandung.jpg', 'RAPAT SINERGITAS DAN KUNJUNGAN MITRA STRATEGIS BAKESBANGPOL KOTA BANDUNG', 'rapat-sinergitas-dan-kunjungan-mitra-strategis-bakesbangpol-kota-bandung', '<p>Bakesbangpol Kota Bandung menerima kunjungan dari Dispotdirga Lanud Husein Sastranegara dalam rangka membangun sinergi dan koordinasi lintas sektor. Kegiatan ini berlangsung dalam suasana diskusi yang hangat bersama Plt. Kepala Bakesbangpol, Kepala Bidang Ideologi dan Wawasan Kebangsaan, serta perwakilan dari <strong>jajaran </strong>TNI AU. Pertemuan ini bertujuan mempererat hubungan kelembagaan dan menyamakan visi dalam mendukung ketahanan nasional di tingkat lokal.</p>\r\n\r\n<p>Dalam pertemuan tersebut, kedua pihak membahas potensi kerja sama dalam berbagai bidang strategis, khususnya edukasi kebangsaan, peningkatan wawasan bela negara, serta penguatan nilai-nilai nasionalisme di kalangan masyarakat, pelajar, dan generasi muda. Rencana kolaborasi mencakup pelaksanaan kegiatan bersama seperti sosialisasi di lingkungan sekolah, pelatihan kader bela negara, hingga kampanye kesadaran publik terkait pentingnya menjaga persatuan dan ketahanan nasional. Selain itu, juga membahas upaya integrasi program antara Bakesbangpol dan Dispotdirga yang bersifat preventif terhadap ancaman disintegrasi sosial maupun ideologi yang menyimpang. Kolaborasi ini diharapkan dapat memperkuat peran strategis kedua lembaga dalam menjaga stabilitas sosial-politik di Kota Bandung, meningkatkan ketahanan wilayah, serta mendukung tugas-tugas pertahanan, pelayanan publik, dan pembangunan karakter bangsa yang berkelanjutan.</p>\r\n\r\n<p>Kegiatan ini menjadi salah satu langkah konkret Bakesbangpol dalam memperluas jejaring kemitraan strategis, khususnya dengan institusi pertahanan. Melalui sinergi ini, diharapkan tercipta kolaborasi berkelanjutan dalam membangun masyarakat yang sadar akan pentingnya persatuan, kedisiplinan, dan semangat kebangsaan.</p>', '2027-09-10 17:00:00', '2026-09-23 18:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `potensi_konfliks`
--

CREATE TABLE `potensi_konfliks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_potensi` varchar(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `lokasi_kecamatan` varchar(255) NOT NULL,
  `lokasi_kelurahan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tingkat_potensi` enum('rendah','sedang','tinggi') NOT NULL DEFAULT 'rendah',
  `deskripsi` text DEFAULT NULL,
  `status` enum('aktif','selesai') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `potensi_konfliks`
--

INSERT INTO `potensi_konfliks` (`id`, `nama_potensi`, `kategori`, `lokasi_kecamatan`, `lokasi_kelurahan`, `alamat`, `tanggal`, `tingkat_potensi`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(205, 'Aksi Tolak RUU Cipta Kerja di Bandung Berujung Bentrok, Ratusan Mahasiswa Dirawat', 'Sosial Budaya', 'Coblong', 'Lebakgede', 'Jl. Dipati Ukur No.48, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132', '2020-10-08', 'tinggi', 'Aksi penolakan terhadap RUU Cipta Kerja di Bandung berakhir ricuh dan menyebabkan ratusan mahasiswa luka-luka', 'selesai', '2025-08-07 19:44:48', '2025-08-07 19:44:48'),
(206, 'Gerakan Perlawanan dan Produksi Ruang Publik: Kasus Tamansari Bandung', 'Sengketa Lahan', 'Bandung Wetan', 'Tamansari', 'Jl. Tamansari No.6-8, Tamansari, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40116', '2020-06-20', 'tinggi', 'Warga Tamansari menolak penggusuran untuk proyek rumah deret dan menyuarakan hak atas ruang publik', 'selesai', '2025-08-07 19:44:48', '2025-08-07 19:44:48'),
(207, 'Bentrokan Geng Motor di Kawasan Dago', 'Sosial Budaya', 'Bandung Wetan', 'Tamansari', 'Jl. Ir. H. Juanda No. 279, RT 05 RW 09, Kota Bandung, Jawa Barat', '2020-11-01', 'tinggi', 'Terjadi bentrok antar geng motor yang menyebabkan keresahan warga dan kerusakan fasilitas umum', 'selesai', '2025-08-07 19:44:48', '2025-08-07 19:44:48'),
(208, 'Warga Korban Penggusuran Citarum Harum Tuntut Hunian Layak', 'Sosial‑Politik', 'Batununggal', 'Binong', 'Jl. H. Basuki No.28b, Kota Bandung, Jawa Barat 40275', '2021-12-24', 'tinggi', 'Warga terdampak program revitalisasi Citarum Harum menuntut kompensasi dan hunian pengganti yang layak dari pemerintah.', 'selesai', '2025-08-07 19:45:01', '2025-08-07 19:45:01'),
(209, 'Soal Tanah Ex Erpacht Verponding 12, Warga Berharap Kehadiran Pemerintah', 'Sengketa Pertanahan', 'Cidadap', 'Cieumbeluit', 'Kantor ATR/BPN Kota Bandung, Jl. Cianjur No. 34, Kota Bandung', '2021-06-07', 'tinggi', 'Warga menuntut kepastian hukum dan kehadiran pemerintah dalam penyelesaian status kepemilikan tanah bekas hak erfpacht Verponding 12.', 'selesai', '2025-08-07 19:45:01', '2025-08-07 19:45:01'),
(210, 'Aksi unjuk rasa mahasiswa Papua tolak Otonomi Khusus (Otsus) dan konflik bersenjata di tanah Papua', 'Sosial‑Politik', 'Sumur', 'Merdeka', 'Gedung Sate, Jl. Diponegoro No. 22, Kota Bandung', '2021-05-21', 'sedang', 'Mahasiswa Papua menggelar unjuk rasa menolak Otonomi Khusus dan menyoroti konflik bersenjata di Papua.', 'selesai', '2025-08-07 19:45:01', '2025-08-07 19:45:01'),
(211, 'Demo UMK di Gedung Sate', 'Ekonomi', 'Bandung Wetan', 'Citarum', 'Gedung Sate, Jl Diponegoro No.22', '2023-12-14', 'tinggi', 'Terjadi aksi unjuk rasa besar-besaran oleh ribuan buruh di Gedung Sate menuntut kenaikan UMK 2024. Aksi berlangsung kondusif namun sempat memblokade jalan protokol.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(212, 'Sengketa Lahan TPST Cicabe', 'Lingkungan', 'Sumur', 'Merdeka', 'Jl Abdul Hamid, Cicabe', '2023-08-28', 'tinggi', 'DPRD meminta peninjauan ulang pembangunan TPST Cicabe karena lahan masih berstatus sengketa di PN Bandung', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(213, 'Demo Buruh Tuntut Revisi UMK', 'Ekonomi', 'Bandung Wetan', 'Citarum', 'Jl Diponegoro No. 22', '2023-12-16', 'sedang', 'Ribuan Buruh menuntut menuntut kenaikan upah minimum kota (UMK) di depan Gedung Sate yang menyebabkan macet dan penutupan jalan', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(214, 'Demonstrasi 9 Tahun Rezim Jokowi', 'Politik', 'Bandung Wetan', 'Citarum', 'DPRD Jabar, Jl Diponegoro', '2023-10-20', 'tinggi', 'Mahasiswa protes dan mengevaluasi kebijakan pemerintahan Jokowi selama 9 tahun yang digelar di depan kantor DPRD Jawa Barat.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(215, 'Dugaan KKN Rotasi-Mutasi oleh BKD Jabar (I)', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'Kantor BKD Jabar Jl. Ternate No. 2 Kota Bandung', '2023-01-03', 'tinggi', 'Dukungan agar Kejati Jabar segera menyelidiki dugaan KKN dalam rotasi dan mutasi oleh BKD Provinsi Jabar.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(216, 'Dugaan KKN Rotasi-Mutasi oleh BKD Jabar (II)', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'Kantor Kejaksaan Tinggi Provinsi Jabar Jl. LLRE. Martadinata No. 54 Kota Bandung', '2023-01-03', 'tinggi', 'Dukungan untuk Kejati Jabar dalam penyelidikan kasus serupa terkait rotasi dan mutasi BKD Jabar.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(217, 'Konflik Ojek Online (Ojol) vs Ojek Pangkalan (Opang) Pasir Impun', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Antapani', 'Antapani Wetan', 'Muhsola AL-IKLAS Polsek Antapani Jl. A.H. Nasution No.10 Kota Bandung', '2023-01-03', 'sedang', 'Konflik antara pengemudi ojek online dan ojek pangkalan di Pasir Impun, Kota Bandung.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(218, 'Desakan Usut Jual Beli Jabatan & Masalah Developer', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'Gedung Sate Jl. Diponegoro No 22 Kota Bandung', '2023-01-04', 'tinggi', 'Desakan pengusutan jual beli jabatan di BKD Jabar, pelanggaran tata ruang oleh developer, dan transparansi PT JASWITA.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(219, 'Permasalahan Pengambilan BPKB Konsumen', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Kebon Pisang', 'Sumurbandung', 'Kantor Leasing ACC Jl. Naripan No.24-26 Kota Bandung', '2023-01-05', 'rendah', 'Masalah pengambilan BPKB kendaraan milik konsumen a.n. Cadirah.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(220, 'Penyimpangan Proyek KA Kiaracondong-Cicalengka', 'Sosial Budaya', 'Gedebage', 'Babakan Penghulu', 'Kantor Balai Teknik Perkeretaapian Wil. Jabar Jl. Gedebage Selatan No. 68 Kota Bandung', '2023-01-05', 'tinggi', 'Tuntutan pengusutan penyimpangan dan penyalahgunaan wewenang proyek KA segmen Gedebage - Haurpugur.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(221, 'Dugaan Agunan Palsu di Bank BJB Majalengka', 'Sosial Budaya', 'Sumur Bandung', 'Braga', 'GOR Kantor Bank BJB Jl. Naripan No. 12 Kota Bandung.', '2023-01-09', 'tinggi', 'Dugaan pihak Bank BJB telah menerima jaminan/ agunan berbentuk dokumen / surat sertifikasi guru yang terindikasi palsu di Bank BJB Majalengka', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(222, 'Rapat Koordinasi Keamanan Lingkungan', 'Pertahanan dan Keamanan', 'Sumur', 'Babakan Ciamis', 'Ruang Rapat BTI Bakesbangpol Kota Bandung Jl. Wastukencana No. 2 Kota Bandung', '2023-01-13', 'sedang', 'Perumusan langkah-langkah antara Pemkot dan Forkopimda Kota Bandung dalam menjaga keamanan dan ketertiban lingkungan.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(223, 'Penyikapan Penahanan Aktivis ORMAS GARIS', 'Agama / Ideologi', 'Bandung Wetan', 'Citarum', 'Gedung Sate Jl. Diponegoro No. 22 Kota Bandung', '2023-02-02', 'sedang', 'Solidaritas terhadap penahanan aktivis ORMAS Islam GARIS atas kasus pencopotan nama di tenda bantuan korban gempa Cianjur.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(224, 'Solidaritas atas Tragedi Pembakaran Al-Quran di Swedia', 'Agama / Ideologi', 'Bandung Wetan', 'Citarum', 'Gedung Sate Jl. Diponegoro No. 22 Kota Bandung', '2023-02-03', 'tinggi', 'Aksi solidaritas terhadap pembakaran Al-Quran oleh aktivis Swedia pada unjuk rasa di depan Kedubes Turki, Stockholm, 29 Januari 2023.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(225, 'Tuntutan Keadilan atas Dugaan Penyalahgunaan Wewenang oleh BJB (Kasus Pertama)', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Bandung Wetan', 'Cihapit', 'Pengadilan Negeri Bandung, Jl. LLRE. Martadinata No. 74-80 Kota Bandun', '2023-02-08', 'tinggi', 'Meminta keadilan atas kasus dugaan penyalahgunaan wewenang oleh Bank BJB dan mendesak Hakim PN Bandung agar memutus perkara No. 713/Pid.B/2022 sesuai data, fakta, dan alat bukti. Juga meminta difasilitasi untuk audiensi.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(226, 'Penolakan Kebijakan Kerja dan Tuntutan Ketenagakerjaan di Lingkungan PLN', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Sumur', 'Braga', 'Kantor PLN Persero Unit Induk Industri Jl. Asia Afrika No. 63 Kota Bandung', '2023-02-14', 'tinggi', 'Aksi menolak penurunan upah tenaga ahli, perubahan status kerja menjadi volume-based dan pola kemitraan, serta kebijakan dana talangan pelanggan PLN. Juga menuntut dipekerjakannya kembali 19 pekerja PT. DKB Lampung, penghentian kecelakaan kerja di PLN, dan pengangkatan TAD sebagai pekerja tetap di anak perusahaan PLN.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(227, 'Permintaan Fasilitasi Pertemuan antara Serikat Pekerja dan BRI Terkait Aset PT. Matahari Sentosa Jaya', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'DPRD Prov. Jabar Jl. Diponegoro No. 27 Kota Bandung', '2023-03-02', 'sedang', 'PUK SP TSK SPSI PT. Matahari Sentosa Jaya meminta DPRD Provinsi Jawa Barat untuk memfasilitasi pertemuan dengan pihak BRI selaku pemegang aset perusahaan guna menyelesaikan permasalahan ketenagakerjaan.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(228, 'Keberatan Warga terhadap Aktivitas Aliran AKI di Gg. Jatimulya V', 'Agama / Ideologi', 'Batununggal', 'Gumuruh', 'Ruang Rapat Kantor Jl. Venus No. 6 Kota Bandung', '2023-03-06', 'tinggi', 'Warga Gg. Jatimulya V RT 09 RW 07 Kelurahan Gumuruh menyampaikan keberatan terhadap aktivitas aliran Amanah Keagungan Ilahi (AKI) yang berlangsung di lingkungan mereka karena dinilai meresahkan.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(229, 'Permasalahan Pembangunan Apartemen PT. KAI di Sukabumi-Laswi', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Sumur Bandung', 'Babakan Ciamis', 'Ruang Rapat Tengah Balaikota Jl. Wastukancana No. 2 Kota Bandung', '2023-03-20', 'sedang', 'Pembahasan mengenai permasalahan pembangunan apartemen dan fasilitas lain milik PT. KAI di Jalan Sukabumi dan Jalan Laswi, Kota Bandung, yang bekerja sama dengan PT. WIKA Realty.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(230, 'Penolakan Pengesahan PERPU Cipta Kerja', 'Politik', 'Bandung Wetan', 'Citarum', 'Kantor DPRD Prov. Jabar Jl. Diponegoro No. 27 Kota Bandung', '2023-03-29', 'tinggi', 'Aksi unjuk rasa dilakukan oleh kelompok masyarakat yang menolak pengesahan PERPU Cipta Kerja menjadi Undang-Undang karena dianggap merugikan pekerja dan melemahkan perlindungan tenaga kerja.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(231, 'Permasalahan CSR Yayasan PT Telkom', 'Sosial Budaya', 'Coblong', 'Sadang Serang', 'Kantor Telkom Jl. Japati No. 1 Kota Bandung', '2023-04-05', 'sedang', 'Isu terkait pengalokasian dan penyaluran dana CSR oleh yayasan milik PT. Telekomunikasi Indonesia, Tbk yang dinilai tidak transparan atau tepat sasaran.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(232, 'Penolakan Aktivitas Indomaret Tanpa Izin', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Coblong', 'Cipaganti', 'Jl. Cihampelas No. 149 Kota Bandung', '2023-04-15', 'sedang', 'Menyikapi adanya himbauan dari Pemkot Bandung terkait perizinan bangunan toko Indomaret di Jl. Cihampelas No. 149 yang belum lengkap, namun masih tetap melakukan aktivitas komersial.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(233, 'Permasalahan Penarikan Kendaraan oleh Debt Collector BFI', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Bandung Kidul', 'Batununggal', 'Kantor BFI Regional Bandung Jl. Soekarno-Hatta No. 472 Kota Bandung', '2023-04-17', 'sedang', 'Aspirasi masyarakat terkait tindakan penarikan unit kendaraan bermotor oleh debt collector BFI Regional Bandung yang dinilai merugikan dan tidak sesuai prosedur.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(234, 'Aksi May Day 2023', 'Sosial Budaya', 'Coblong', 'Lebakgede', 'Monumen Perjuangan Rakyat Jawa Barat Jl. Dipatiukur Kota Bandung', '2023-05-01', 'tinggi', 'Aksi unjuk rasa memperingati Hari Buruh Internasional (May Day) tahun 2023 oleh serikat pekerja dan organisasi buruh di Kota Bandung. Tuntutan berkaitan dengan upah layak, status pekerjaan, dan perlindungan buruh.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(235, 'Dugaan Penyimpangan Anggaran oleh Oknum', 'Sosial Budaya', 'Cidadap', 'Hegarmanah', 'Sekolah Tinggi Pariwisata Bandung Jl. Setiabudhi Kota Bandung', '2023-05-22', 'tinggi', 'Dugaan adanya penyimpangan anggaran dan permainan oleh oknum di Kementerian, Kepala STP, Komisi X DPR RI, dan Banggar DPR RI.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(236, 'Pengawalan Sidang PTUN terkait THR PT Masterindo', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Bandung Wetan', 'Citarum', 'PTUN Bandung Jl. Diponegoro No. 34 Kota Bandung', '2023-05-30', 'sedang', 'Mengawal sidang putusan PTUN Bandung mengenai pengenaan sanksi administratif oleh Disnaker Provinsi Jawa Barat kepada PT Masterindo karena belum membayarkan THR tahun 2021 kepada pekerja anggota PUK FSP TSK SPSI.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(237, 'Ketidaktegasan Perda No. 129 Tahun 2022', 'Sosial Budaya', 'Batununggal', 'Kacapiring', 'Kantor DPRD Kota Bandung Jl. Sukabumi No. 30 Kota Bandung', '2023-06-08', 'sedang', 'Menyoroti Peraturan Daerah Kota Bandung No. 129 Tahun 2022 yang belum mengatur secara jelas mengenai sanksi denda bagi pelanggar tata ruang sehingga berpotensi menimbulkan ketidakpastian hukum dan lemahnya penegakan aturan.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(238, 'Permintaan Keringanan Denda oleh Nasabah BCA Finance', 'Perselisihan Antar Ormas, LSM atau Instansi Lainnya', 'Kiaracondong', 'Cicaheum', 'Kantor Kas BCA Antapani\nJl. Terusan Jakarta No.57, Kota Bandung, Jawa Barat 40282', '2023-06-12', 'sedang', 'Nasabah meminta kebijakan pengurangan denda tunggakan sebesar 75% dari total Rp 4.650.000,- atas unit motor yang dibiayai oleh BCA Finance.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(239, 'Pengelolaan Area Parkir Taman Tegalega', 'Sosial Budaya', 'Jeruk', 'Andir', 'Ruang Rapat Kantor UPTD Pengelolaan Perparkiran Kota Bandung Jl. Babatan No. 4 Kota Bandung', '2023-06-14', 'sedang', 'Pembahasan terkait pengelolaan lahan parkir di kawasan Taman Tegalega Kota Bandung yang menjadi perhatian masyarakat terkait transparansi pengelolaan retribusi dan ketertiban parkir.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(240, 'Pengamanan Kedatangan Presiden RI di Kota Bandung', 'Pertahanan dan Keamanan', 'Sumur', 'Merdeka', 'Aula Citra Bhakti di Makodim 0618 Jl. Bangka No. 2 Kota Bandung', '2023-07-10', 'tinggi', 'Pengamanan terhadap lokasi yang akan dikunjungi Presiden RI seperti Hotel Pullman dan Masjid Al Jabbar, termasuk pengamanan jalur, penginapan, dan tempat ibadah.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(241, 'Rakor Evaluasi RAD PPKT 2022–2024', 'Sosial Budaya', 'Cidadap', 'Ledeng', 'GH Universal Hotel Jl. Setiabudi No. 376 Kota Bandung', '2023-07-13', 'sedang', 'Rapat koordinasi terkait evaluasi pelaksanaan Rencana Aksi Daerah Pencegahan dan Penanggulangan Ekstremisme Berbasis Kekerasan Mengarah pada Terorisme di Jawa Barat.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(242, 'Deteksi Dini Penertiban Kebun Binatang dan Peringatan Assyura', 'Pertahanan dan Keamanan', 'Sumur', 'Babakan Ciamis', 'Ruang BTI Bakesbangpol Kota Bandung Jl. Wastukencana No. 2 Kota Bandung', '2023-07-26', 'sedang', 'Upaya preventif terhadap potensi gejolak sosial yang ditimbulkan oleh rencana penertiban Kebun Binatang Bandung serta kegiatan peringatan Asyura oleh kelompok Syiah dan komunitas adat di kawasan Kabuyutan Gegerkalong.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(243, 'Pengajian Peringatan Asyura 1145H', 'Agama / Ideologi', 'Regol', 'Cigereleng', 'Majelis Habib Alwi Assegaf Jl. Kembar VI No. 6 Kota Bandung', '2023-07-27', 'rendah', 'Kegiatan pengajian dalam rangka memperingati Asyura 1145 Hijriah oleh kelompok tertentu yang perlu diawasi untuk menjaga ketertiban umum.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(244, 'Dugaan Penadahan Barang Hasil Pemanasan LPG 3 Kg', 'Sosial Budaya', 'Arcamanik', 'Cisaranten Bina Harapan', 'Kantor Direktorat Bina Teknik Jalan dan Jembatan Jl. AH Nasution No 264, Arcamanik Kota Bandung', '2023-08-03', 'sedang', 'Dugaan adanya pembiaran dan penadahan atas barang hasil pemanasan menggunakan gas LPG 3 kg dalam proyek Preservasi Jalan Tegal Buleud Sindangbarang–Cidaun, Kab. Cianjur dengan No Kontrak: KU.02.10/PJNWil.II-JBR/KONTRAK/PPK2.4/ TSC/I/2022/01.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(245, 'Penghargaan atas Suksesnya PPDB Jabar 2023/2024', 'Sosial Budaya', 'Cicendo', 'Pasir Kaliki', 'Kantor Dinas Pendidikan Jawa Barat Jl. Dr. Radjiman No. 6 Kota Bandung', '2023-08-07', 'rendah', 'Ucapan dan pemberian penghargaan atas sukses dan kondusifnya pelaksanaan PPDB Tahun Ajaran 2023/2024 di Jawa Barat, khususnya Kota Bandung.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(246, 'Desakan Penetapan Tersangka Baru Kasus Smart City', 'Sosial Budaya', 'Cidadap', 'Ledeng', 'GH Universal Hotel Jl. Setiabudi No. 376 Kota Bandung', '2023-08-10', 'tinggi', 'Tuntutan kepada KPK untuk segera menetapkan tersangka baru dalam kasus dugaan korupsi proyek Smart City, berdasarkan keterangan saksi-saksi di persidangan.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(247, 'Laporan Pemalsuan Ahli Waris Dago Elos', 'Sosial Budaya', 'Sumur', 'Babakan Ciamis', 'Kantor Polrestabes Bandung Jl. Merdeka No 18-20 Kota Bandung', '2023-08-14', 'tinggi', 'Tindakan pelaporan pemalsuan dokumen ahli waris oleh warga Dago Elos terkait sengketa lahan dengan keluarga Muller dan PT Dago Inti Graha.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(248, 'Pelantikan Pj Gubernur Jawa Barat hingga 2024', 'Politik', 'Bandung Wetan', 'Citarum', 'Gedung Sate Jl. Diponegoro No. 22 Kota Bandung', '2023-09-04', 'sedang', 'Informasi dan dinamika terkait pergantian serta pelantikan Penjabat Gubernur Jawa Barat yang akan menjabat hingga tahun 2024.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(249, 'Uji Coba Kereta Cepat Indonesia – Cina (KCIC)', 'Pertahanan dan Keamanan', 'Andir', 'Kebon Jeruk', 'Stasiun Kereta Kota Bandung Jl. Stasiun Barat Kota Bandung', '2023-09-13', 'sedang', 'Pelaksanaan uji coba operasional kereta cepat KCIC lintas Jakarta – Bandung menjelang peresmian dan pengoperasian penuh.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(250, 'Penegakan Hak Milik PT. KAI Daops 2 Bandung', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Husein Sastranegara', 'Cicendo', 'Jl. Jatayu Dalam I-VI Kota Bandung', '2023-09-26', 'tinggi', 'Tuntutan untuk mengembalikan atau menegakkan hak milik PT. KAI Daops 2 Bandung sesuai putusan Pengadilan Negeri Bandung Klas 1A Khusus.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(251, 'Evaluasi dan Persiapan Hibah Pilkada 2024', 'Politik', 'Bandung Wetan', 'Tamansari', 'Hotel California Bandung, Jl. Wastukencana No. 48 Bandung', '2023-10-03', 'sedang', 'Evaluasi hibah Pilkada, jaminan tenaga kerja/santunan, serta persiapan NPHD (Naskah Perjanjian Hibah Daerah) untuk penyelenggaraan Pilkada 2024.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(252, 'Penetapan DCT Dapil 7 Kota Bandung', 'Politik', 'Coblong', 'Cipaganti', 'Kantor DPW Nasdem Jawa Barat Jl. Cipaganti No. 158 Kota Bandung', '2023-10-09', 'sedang', 'Tuntutan klarifikasi atas tidak dimasukkannya Kang Hadian ke dalam Daftar Calon Tetap (DCT) Dapil 7 Kota Bandung.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(253, 'Sengketa Penarikan Kendaraan oleh Leasing', 'Perselisihan Antar Ormas, LSM atau Instansi Lainnya', 'Lengkong', 'Cijagra', 'Kantor PT. JCCS MPM FINANCE Cabang Bandung, Jl. BKR No. 26A Kota Bandung', '2023-10-27', 'sedang', 'Terjadi aksi unjuk rasa mempertanyakan satu unit kendaraan roda-4 yang ditarik oleh debt collector dari PT. JCCS MPM FINANCE Cabang Bandung di wilayah Cilacap.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(254, 'Polemik Pembangunan Patung Soekarno', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'Kantor Pemprov. Jabar, Jl. Diponegoro No. 22 Kota Bandung', '2023-10-30', 'rendah', 'Massa melakukan audiensi untuk meminta klarifikasi terkait rencana pembangunan Patung Soekarno di GOR Saparua, Bandung.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(255, 'Rakor Deklarasi Komitmen Jabar Anteng untuk Pemilu 2024', 'Politik', 'Sumur Bandung', 'Braga', 'Gedung Merdeka Jl. Asia Afrika No. 65, Braga, Kec. Sumur Bandung, Kota Bandung', '2023-11-18', 'rendah', 'Deklarasi Komitmen Bersama Mewujudkan Jawa Barat Anteng (Aman, Netral Dan Tenang) Pada Pemilu 2024', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(256, 'Monitoring Aspirasi Dukungan Palestina di McD Dago', 'Sosial Budaya', 'Coblong', 'Dago', 'McDonald Jl. Ir. Djuanda No. 181 Kota Bandung', '2023-11-19', 'sedang', 'Menyuarakan aspirasi dukungan terhadap negara Palestina', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(257, 'Deklarasi Pemilu AKUR Jabar', 'Politik', 'Bandung Wetan', 'Citarum', 'GOR Saparua Jl. Banda No. 28 Kota Bandung', '2023-11-27', 'sedang', 'Inisiatif menciptakan Pemilu 2024 di Provinsi Jawa Barat yang Aman, Kondusif, dan Rukun (AKUR) melalui kolaborasi antar pemangku kepentingan.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(258, 'Pemeliharaan Kerukunan Umat Beragama', 'Agama / Ideologi', 'Soreang', 'Pamekaran', 'Grand Sunshine Resort & Convention Jl. Raya Soreang No. 6 Km. 17 Pamekaran, Soreang, Kab. Bandung', '2023-12-12', 'sedang', 'Upaya pembinaan, penciptaan, dan pemeliharaan kerukunan antar umat beragama di Provinsi Jawa Barat.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(259, 'Dugaan Penyimpangan Proyek PEN & TAP Jabar', 'Sosial Budaya', 'Cibeunying Kaler', 'Citarum', 'Kantor Pemerintah Provinsi Jawa Barat No. 22 Kota Bandung', '2023-12-19', 'tinggi', 'Desakan pengusutan proyek di masa Ridwan Kamil sebagai Gubernur Jabar, khususnya terkait PEN (Pemulihan Ekonomi Nasional) dan TAP (Tim Akselerasi Pembangunan).', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(260, 'Refleksi Kinerja Pemerintah 2023', 'Sosial Budaya', 'Sumur', 'Braga', 'Gedung Merdeka Jl. Asia Afrika No. 65 Kota Bandung', '2023-12-30', 'sedang', 'Aksi atau diskusi publik untuk mengenang dan mengkritisi carut-marutnya kinerja pemerintah sepanjang tahun 2023 di berbagai sektor.', 'selesai', '2025-08-07 19:45:17', '2025-08-07 19:45:17'),
(261, 'Demo Tolak Revisi UU Pilkada', 'Sosial‑Politik', 'Bandung Wetan', 'Citarum', 'Gedung DPRD \nJl. Diponegoro No 27', '2024-08-22', 'tinggi', 'Terjadi unjuk rasa ricuh di depan DPRD Jabar. Seorang mahasiswa yang menjadi korban mengalami luka parah pada bagian mata kiri', 'selesai', '2025-08-07 19:45:43', '2025-08-07 19:45:43'),
(262, 'Sengketa Lahan Dago Elos', 'Sengketa Lahan', 'Coblong', 'Dago', 'Dago Elos Ii, Dago, Kecamatan Coblong, Kota Bandung, Jawa Barat 40135', '2024-10-01', 'sedang', 'Terjadi konflik atas sengketa lahan yang berlangsung antara warga Kampung Dago Elos melawan pemilik lahan atas nama pihak dari Keluarga Müller dan PT Dago Inti Graha', 'aktif', '2025-08-07 19:45:43', '2025-08-07 19:45:43'),
(263, 'Konflik antara Ojek Online (Ojol) dan Ojek Pangkalan (Opang)', 'Ekonomi Lokal', 'Mandalajati', 'Pasir Impun', 'Kawasan Pasir Impun, Kota Bandung', '2024-09-07', 'sedang', 'Terjadi konflik antara pengemudi ojek daring (ojol) dan ojek pangkalan (opang) yang dipicu oleh perselisihan terkait wilayah operasional. Insiden tersebut menyebabkan salah satu pihak terjatuh dan mengalami luka ringan. Konflik ini bersifat spontan dan tidak berlanjut, serta telah diselesaikan secara lokal.', 'selesai', '2025-08-07 19:45:43', '2025-08-07 19:45:43'),
(264, 'Demo Jurnalis Tolak RUU Penyiaran', 'Sosial', 'Bandung Wetan', 'Citarum', 'DPRD Jabar, Jl Diponegoro', '2024-05-28', 'sedang', 'Puluhan jurnalis melakukan aksi unjuk rasa terkait revisi Undang-Undang Penyiaran atau UU Penyiaran', 'selesai', '2025-08-07 19:45:43', '2025-08-07 19:45:43'),
(265, 'Kebingungan Publik Terkait Kenaikan PPN 12%', 'Ekonomi', 'Gedebage', 'Cimenerang', 'Polda Jabar Jl. Soekarno Hatta No. 851 Kota Bandung', '2025-01-03', 'sedang', 'Aspirasi terkait evaluasi kebijakan kenaikan PPN dalam 100 hari kerja Presiden Prabowo yang menimbulkan kebingungan masyarakat.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(266, 'Dugaan KKN di Dinas Pemberdayaan Masyarakat Desa Jabar', 'Sosial Budaya', 'Babakan Ciparay', 'Babakan Ciparay', 'LSM TRINUSA DPD - Jl. Caringin No.182C, Babakan Ciparay, Kota Bandung', '2025-01-07', 'tinggi', 'Dugaan praktik Korupsi, Kolusi, dan Nepotisme (KKN) di lingkungan DPMD Provinsi Jawa Barat.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(267, 'Permasalahan Pengelolaan Pasar Induk Gedebage', 'Sosial Budaya', 'Sumur', 'Babakan Ciamis', 'Ruang Rapat BTI Kantor Kesbangpol Kota Bandung Jl. Wastukencana No. 2 Kota Bandung', '2025-01-07', 'tinggi', 'Masalah iuran sampah, parkir, dan kerja sama pengelolaan pasar Gedebage yang tidak transparan.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(268, 'Evaluasi dan Persiapan PPDB 2025–2026', 'Sosial Budaya', 'Sumur', 'Kebon Pisang', 'Ruang Rapat Kantor Dinas Pendidikan Kota Bandung Jl. A. Yani No.239 Bandung', '2025-01-07', 'sedang', 'Permintaan evaluasi menyeluruh terhadap PPDB saat ini dan perbaikan untuk tahun depan.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(269, 'Krisis Sampah Kota Bandung', 'Sosial Budaya', 'Sumur', 'Babakan Ciamis', 'Balaikota Bandung Jl. Wastukencana No. 2 Kota Bandung', '2025-01-10', 'tinggi', 'Sistem pengelolaan sampah di Kota Bandung yang terus menuai kritik dari masyarakat dan LSM.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(270, 'Kontroversi Hasil Seleksi PPPK Jabar', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'DPRD Provinsi Jawa Barat Jl. Dipoengoro No. 24 Kota Bandung', '2025-01-13', 'sedang', 'Tuntutan kejelasan hasil seleksi PPPK oleh guru dan tenaga pendidik.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(271, 'Pengawasan Tempat Hiburan Malam dan Minuman Keras', 'Sosial Budaya', 'Sumur', 'Babakan Ciamis', 'Ruang BTI Bakesbangpol Kota Bandung Jl. Wastukencana No. 2 Kota Bandung', '2025-01-13', 'sedang', 'Permintaan kontrol dan evaluasi terhadap izin operasional tempat hiburan malam dan penjualan miras.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(272, 'Bentrokan GRIB dan Pemuda Pancasila', 'Sosial Budaya', 'Batununggal', 'Kacapiring', 'Sekretariat MPW Pemuda Pancasila Jl. BKR No.112 Kota Bandung', '2025-01-15', 'tinggi', 'Peristiwa bentrok antarormas yang mengganggu keamanan dan ketertiban masyarakat.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(273, 'Dugaan KKN di Pemprov Jabar', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'Kantor Biro Kesra Jabar Jl. Diponegoro No 22 Kota Bandung', '2025-01-23', 'tinggi', 'Aspirasi agar Biro Kesra Pemprov. Jabar memberikan klarifikasi atas dugaan KKN.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(274, 'Kritik DLHK Terkait Pengelolaan Sampah', 'Sosial Budaya', 'Coblong', 'Sekeloa', 'Dinas DLHK Kota Bandung di Jl. Sadang Tengah No.4-6 Kel.Sekeloa Kec. Coblong Kota Bandung', '2025-01-23', 'sedang', 'Tuntutan klarifikasi kepada DLHK atas sistem sampah Kota Bandung yang dinilai tidak efektif.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(275, '100 Hari Kerja Presiden Prabowo Subianto', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'Gedung Sate Jl. Diponegoro No. 22 Kota Bandung', '2025-01-15', 'tinggi', 'Ketegangan antara melanjutkan program Jokowi (seperti IKN, hilirisasi) dan memenuhi janji kampanye (subsidi pangan, kesejahteraan).', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(276, 'Sengketa Penggunaan Gedung Serba Guna Arcamanik', 'Agama/Ideologi', 'Sumur', 'Babakan Ciamis', 'Ruang Rapat BTI Bakesbangpol Kota Bandung Jl. Wastukencana No. 2 Kota Bandung', '2025-01-30', 'sedang', 'Keberatan warga terhadap peralihan fungsi GSG Jl. Sky Air No. 19.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(277, 'Dugaan Kolusi Oknum BNI dan Mafia Tanah', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Sumur', 'Babakan Ciamis', 'Kantor BNI Provinsi Jawa Barat Jl. Perintis Kemerdekaan No.03 Bandung Kota Bandung', '2025-02-02', 'sedang', 'Tuntutan agar pejabat BNI yang terlibat dengan mafia tanah ditindak.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(278, 'Dugaan Pelanggaran KKN oleh BPPW Jabar', 'Sosial Budaya', 'Lengkong', 'Lingkar Selatan', 'Kantor Balai Prasarana Permukiman Wilayah Jawa Barat Jl. Turangga No. 5 Kota Bandung.', '2025-02-05', 'tinggi', 'Aspirasi atas pelanggaran hukum bernuansa KKN pada proyek infrastruktur.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(279, 'Ketidakjelasan SLF Rusunami The Jardin', 'Sosial Budaya', 'Batununggal', 'Kacapiring', 'Kantor Dinas Cipta Karya, Bina Kontruksi dan Tata ruang Kota Bandung. Jl Cianjur No. 34 Kota Bandung', '2025-02-06', 'sedang', 'Protes warga terhadap pengembang Rusunami yang diduga belum memiliki Sertifikat Laik Fungsi.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(280, 'Sengketa Identitas Usaha Warteg Bumi Bahari (WBB)', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Regol', 'Ciseureuh', 'Auditorium Kantor Kecamatan Regol Jl. Denki No. 54 Kota Bandung', '2025-02-07', 'rendah', 'Keberatan warga atas branding warteg yang dianggap menyesatkan identitas kuliner Tegal.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(281, 'Pelanggaran Reklame di Lingkungan PLN Jabar', 'Sosial Budaya', 'Sumur', 'Braga', 'Kantor PLN Distribusi Jabar Jl. Asia-Afrika No. 63 Kota Bandung', '2025-02-12', 'rendah', 'Dugaan pemasangan reklame ilegal di kawasan kantor PLN Jabar.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(282, 'Transparansi Anggaran DKPP Bandung', 'Sosial Budaya', 'Cicendo', 'Husein Sastranegara', 'Kantor DKPP kota Bandung Jl. Arjuna No.45, Husen Sastranegara', '2025-02-12', 'sedang', 'Desakan masyarakat agar Dinas Ketahanan Pangan dan Pertanian membuka laporan penggunaan anggaran 2024.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(283, 'Gugatan Keluarga Muller terhadap Disduk Kab. Bandung', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Bandung Wetan', 'Citarum', 'PTUN Bandung Jl. Diponegoro No. 34 Kota Bandung', '2025-02-12', 'tinggi', 'Upaya Muller bersaudara mencoba kembali melakukan perlawanan balik dengan menggugat Disduk Kab.Bandung di Pengadilan Tata Usaha Negara.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(284, 'Pengawasan Dana Desa Bebas KKN', 'Sosial Budaya', 'Bandung Kidul', 'Batununggal', 'Kantor Dinas Pemberdayaan Masyarakat dan Desa Prov. Jawa Barat JI. Soekarno Hatta No. 466 Kota Bandung', '2025-02-13', 'sedang', 'Aspirasi agar pengelolaan Dana Desa transparan dan tidak terjadi KKN.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(285, 'Dugaan Korupsi Dana Rehabilitasi di Dinsos & DKPP', 'Sosial Budaya', 'Sumur', 'Babakan Ciamis', 'Ruang BTI Bakesbangpol Kota Bandung Jl. Wastukencana No. 02 Kota Bandung', '2025-02-13', 'tinggi', 'Tuntutan investigasi atas dugaan pengelolaan pengadaan pada DKPP dan dugaan ketidakwajaran dalam pengelolaan dana anggaran rehabilitasi pada Dinas Sosial Kota Bandung', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(286, 'Potensi Konflik Pengelolaan Sampah, Parkir, dan Pasar Induk Gedebage', 'Sosial Budaya', 'Sumur', 'Babakan Ciamis', 'Ruang BTI Bakesbangpol Kota Bandung Jl. Wastukencana No. 02 Kota Bandung', '2025-02-17', 'rendah', 'Permasalahan iuran sampah, pengelolaan parkir dan perjanjian Kerja Sama pengelolaan Pasar Induk Gedebage', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(287, 'Efisiensi Anggaran Pendidikan yang Dipertanyakan', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'Kantor DPRD Prov. Jabar Jl. Diponegoro No. 27 Kota Bandung', '2025-02-17', 'tinggi', 'Tuntutan pertanggungjawaban dan kejelasan terhadap efisiensi anggaran pendidikan yang dianggap tidak transparan.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(288, 'Desakan Cabut IUP Tambang oleh Pemprov Jabar', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'Gedung Sate Jl. Diponegoro No. 22 Kota Bandung', '2025-02-19', 'tinggi', 'Tuntutan kepada Pemprov Jabar untuk mencabut izin usaha pertambangan yang dianggap merusak lingkungan.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(289, 'Kritik terhadap Kebijakan Efisiensi Anggaran Pendidikan', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'Kantor DPRD Prov. Jabar Jl. Diponegoro No. 27 Kota Bandung', '2025-02-21', 'sedang', 'Penolakan atas kebijakan efisiensi anggaran khususnya di sektor pendidikan oleh pemerintah pusat.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(290, 'Aksi Damai Bela Palestina', 'Sosial Budaya', 'Bandung Wetan', 'Citarum', 'Gedung Sate Jl. Diponegoro No. 22 Kota Bandung dan di Depan Gedung Asia Afrika Jl. Asia Afrika Kota Bandung', '2025-02-23', 'sedang', 'Aksi solidaritas mendukung kemerdekaan Palestina.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(291, 'Sosialisasi Pengosongan Lahan di Babakan Ciparay', 'Sosial Budaya', 'Babakan Ciparay', 'Sukahaji', 'Balai RW. 04 Jl. Satata Sariksa Kota Bandung.', '2025-02-24', 'sedang', 'Aspirasi warga menolak atau mempertanyakan pengosongan lahan di RW 04', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(292, 'Skandal Korupsi Pemkot Bandung 5 Tahun Terakhir', 'Sosial Budaya', 'Sumur', 'Babakan Ciamis', 'Ruang Kepala Bakesbangpol Kota Bandung Jl. Wastukencana No. 2 Kota Bandung', '2025-02-25', 'tinggi', 'Tuntutan transparansi dan pengungkapan kasus korupsi selama 5 tahun terakhir.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(293, 'Permasalahan Pasar Tradisional Gedebage', 'Sosial Budaya', 'Batununggal', 'Kacapiring', 'Ruang Rapat Komisi B, Lt. 2 Kantor DPRD Kota Bandung Jl. Sukabumi No. 30 Kota Bandung', '2025-02-26', 'tinggi', 'Aspirasi pedagang terkait pengelolaan dan kebijakan pasar Gedebage.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(294, 'Konflik Kepemilikan Pasar Induk Gedebage', 'Sosial Budaya', 'Panyileukan', 'Mekar Mulya', 'PT. Ginanjar Saputra Jl. Soekarno-Hatta No. 827 Mekar Mulya Kota Bandung', '2025-02-26', 'tinggi', 'Perselisihan antara pihak swasta dan pemerintah terkait kepemilikan pasar Gedebage.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(295, 'Protes terhadap Debt Collector Mitra Bank Bukopin', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Lengkong', 'Kebon Pisang', 'Bank KB Bukopin KCU Bandung Jl. Asia Afrika No.121, Kota Bandung', '2025-02-27', 'tinggi', 'Memprotes pihak perusahaan jasa Debet Colektor sebagai mitra Bank Bukopin untuk meminta maaf terkait adanya ucapan oknum debt collector yang dianggap telah menghina orang Sunda serta meneror dan menagih kreditur/nasabah', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(296, 'Penolakan Pengelola GSG Arcamanik oleh Warga', 'Agama/Ideologi', 'Arcamanik', 'Sukamiskin', 'GSG Arcamanik Jl. Sky Air No.19 Kota Bandung', '2025-03-05', 'sedang', 'Warga menolak pengelolaan Gedung Serba Guna karena alasan administratif dan sosial.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(297, 'Permintaan Kejelasan Agunan Debitur BNI', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Sumur', 'Babakan Ciamis', 'Kantor Bank BNI Kantor Wilayah Jabar Jl. Perintis Kemerdekaan No. 3 Babakan Ciamis Bandung Kota Bandung', '2025-03-06', 'rendah', 'Aspirasi masyarakat untuk mendapatkan kejelasan soal pelanggan agunan debitur.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(298, 'Perempuan, Kehidupan, dan Pembebasan', 'Sosial Budaya', 'Coblong', 'Tamansari', 'Taman Dago Cikapayang Jl. Ir. H. Djuanda Kota Bandung', '2025-03-08', 'sedang', 'Aksi solidaritas dan kesetaraan gender dalam konteks demokrasi dan HAM.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(299, 'Penolakan GSG Arcamanik oleh Warga', 'Agama/Ideologi', 'Arcamanik', 'Sukamiskin', 'GSG Arcamanik Jl. Sky Air No.19 Kota Bandung', '2025-03-08', 'sedang', 'Isu yang sama terkait penolakan warga terhadap pengelola GSG Arcamanik.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(300, 'Desakan Usut Provider Telkomsel oleh APH', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Buahbatu', 'Jatisari', 'Kantor Telkomsel Jl. Soekarno Hatta No. 707 Kota Bandung', '2025-03-13', 'sedang', 'Tuntutan hukum terhadap dugaan penyalahgunaan atau pelanggaran yang dilakukan oleh provider Telkomsel.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(301, 'Desakan Usut Provider XL Axiata oleh APH', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Bandung Wetan', 'Citarum', 'Kantor PT. XL Axiata JI. L. L. R.E. Martadinata No.7, Kota Bandung', '2025-03-13', 'sedang', 'Tuntutan hukum terhadap dugaan penyalahgunaan atau pelanggaran yang dilakukan oleh XL Axiata', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(302, 'Desakan Usut Provider Indosat oleh APH', 'Perselisihan Antar Ormas, LSM atau Instansi lainnya', 'Bandung Kidul', 'Batununggal', 'Kantor Indosat PT. Persero Tbk Jl. Terusan Buah Batu No. 1 Kota Bandung', '2025-03-13', 'sedang', 'Desakan agar penegak hukum mengusut oknum di Indosat terkait pelanggaran', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(303, 'Sengketa SMAN 1 Bandung', 'Ekonomi', 'Coblong', 'Lebak Siliwangi', 'SMAN 1, Jl Ir H Juanda No.93', '2025-03-13', 'sedang', 'Terjadi sengketa lahan antara Disdik Jabar dan pihak penggugat yang berdampak pada kegiatan belajar mengajar di SMAN 1.', 'aktif', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(304, 'Dugaan Skandal di Bank BJB', 'Sosial Budaya', 'Sumur', 'Braga', 'Kantor Pusat Bank BJB Jl. Naripan No. 12-14 Kota Bandung', '2025-03-17', 'tinggi', 'Tuntutan pengusutan dugaan terjadinya skandal perbankan di Bank Jawa Barat dan Banten (BJB)', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(305, 'Korupsi di PT Pertamina', 'Sosial Budaya', 'Cinambo', 'Babakan Penghulu', 'PT. Pertamina Patra Niaga Tbbm Jl. Soekarno Hatta No. 728 Kota Bandung', '2025-03-18', 'tinggi', 'Tuntutan penegakan hukum terhadap dugaan korupsiyang terjadi di PT Pertamina.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(306, 'Korupsi di DPRD Kota Bandung', 'Sosial Budaya', 'Batununggal', 'Kacapiring', 'Gedung DPRD Kota Bandung Jl. Sukabumi No. 30 Kota Bandung', '2025-03-19', 'tinggi', 'Desakan penindakan atas dugaan korupsi anggota dewan DPRD Kota Bandung.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(307, 'Penolakan RUU TNI – Elemen Mahasiswa 1', 'Politik', 'Bandung Wetan', 'Citarum', 'Kantor DPRD Prov. Jawa Barat JI. Diponegoro No. 27 Kota Bandung', '2025-03-20', 'tinggi', 'Penolakan terhadap revisi UU TNI karena dianggap mengancam demokrasi sipil.', 'aktif', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(308, 'Penolakan RUU TNI – Elemen Mahasiswa 2', 'Politik', 'Bandung Wetan', 'Citarum', 'Kantor DPRD Prov. Jawa Barat JI. Diponegoro No. 27 Kota Bandung', '2025-03-21', 'tinggi', 'Melanjutkan penolakan terhadap revisi UU TNI oleh gabungan mahasiswa.', 'aktif', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(309, 'Penolakan RUU TNI – Mahasiswa & Masyarakat Jabar', 'Politik', 'Bandung Wetan', 'Citarum', 'Kantor DPRD Prov. Jawa Barat JI. Diponegoro No. 27 Kota Bandung', '2025-03-21', 'tinggi', 'Aksi menolak revisi UU TNI oleh berbagai elemen sipil.', 'aktif', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(310, 'Penolakan RUU TNI – FMN', 'Politik', 'Bandung Wetan', 'Citarum', 'Kantor DPRD Prov. Jawa Barat JI. Diponegoro No. 27 Kota Bandung', '2025-03-23', 'tinggi', 'FMN (Front Mahasiswa Nasional) menyatakan sikap menolak revisi RUU TNI.', 'aktif', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(311, 'Polemik Pembangunan Menara Telkom', 'Sosial Budaya', 'Coblong', 'Sadang Serang', 'Kantor PT TELKOM Jl.Japati No.01 Kota Bandung', '2025-03-24', 'rendah', 'Warga dan LSM mempertanyakan legalitas dua menara Telkom yang akan dibangun.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(312, 'Penolakan RUU TNI – Elemen Mahasiswa 3', 'Politik', 'Bandung Wetan', 'Citarum', 'Kantor DPRD Prov. Jawa Barat JI. Diponegoro No. 27 Kota Bandung', '2025-03-24', 'tinggi', 'Penolakan lanjutan terkait RUU TNI dari elemen mahasiswa lainnya.', 'aktif', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(313, 'Dukungan terhadap RUU TNI', 'Politik', 'Bandung Wetan', 'Citarum', 'Kantor DPRD Prov. Jawa Barat JI. Diponegoro No. 27 Kota Bandung', '2025-03-28', 'tinggi', 'Kelompok masyarakat mulai mendukung revisi UU TNI.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02'),
(314, 'Dukungan Kemerdekaan Palestina & Bangsa Terindas', 'Sosial Budaya', 'Sumur', 'Braga', 'Gedung Merdeka Jl. Asia Afrika No. 65 Kota Bandung', '2025-03-28', 'rendah', 'Aksi solidaritas untuk Palestina dan pembelaan HAM global.', 'selesai', '2025-08-07 19:46:02', '2025-08-07 19:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bidang_id` bigint(20) UNSIGNED NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `bidang_id`, `nama_program`, `created_at`, `updated_at`) VALUES
(2, 1, 'Pembentukan Paskibraka', '2025-05-13 00:08:58', '2025-05-13 00:08:58'),
(3, 1, 'Pembinaan Paskibra', '2025-05-13 00:10:49', '2025-05-13 00:10:49'),
(4, 1, 'Bela Negara', '2025-05-13 00:11:00', '2025-05-13 00:11:00'),
(5, 1, 'Kemah Pancasila', '2025-05-13 00:11:11', '2025-05-13 00:11:11'),
(6, 1, 'Upacara Hari Besar Nasional', '2025-05-13 00:11:22', '2025-05-13 00:11:22'),
(7, 2, 'Pendidikan Politik', '2025-05-13 00:14:11', '2025-05-13 00:14:11'),
(8, 2, 'Diskusi Politik', '2025-05-13 00:14:25', '2025-05-13 00:14:25'),
(9, 2, 'Kemah Parpol', '2025-05-13 00:14:37', '2025-05-13 00:14:37'),
(10, 2, 'Safari Parpol', '2025-05-13 00:14:48', '2025-05-13 00:14:48'),
(11, 3, 'Silaturahmi / Safari Ormas', '2025-05-13 00:15:16', '2025-05-13 00:15:16'),
(12, 3, 'Verifikasi Ormas', '2025-05-13 00:15:27', '2025-05-13 00:15:27'),
(13, 3, 'Silaturahmi Kerukunan Umat Beragama', '2025-05-13 00:15:39', '2025-05-13 00:15:39'),
(14, 3, 'Sosialisasi Bahaya Narkotika', '2025-05-13 00:15:50', '2025-05-13 00:15:50'),
(15, 4, 'Bimtek Peningkatan Kewaspadaan Dini Propaganda / Cipta Kondisi / Penggalangan Dalam Rangka Menjaga Kondusifitas Bandung', '2025-05-13 00:16:22', '2025-05-23 20:45:29'),
(16, 4, 'Rakoor Pengawasan Orang Asing', '2025-05-13 00:16:38', '2025-05-13 00:16:38'),
(17, 4, 'Rakoor Bakesbangpol Bandung Raya', '2025-05-13 00:16:54', '2025-05-13 00:16:54'),
(18, 4, 'Monitoring Wilayah', '2025-05-13 00:17:05', '2025-05-13 00:17:05'),
(19, 4, 'Optimalisasi Peran FKDM & TKDD', '2025-05-13 00:17:16', '2025-05-13 00:17:16'),
(20, 4, 'Peningkatan Komunikasi Forkopimda (Forum Koordinasi Pimpinan Daerah)', '2025-05-13 00:17:33', '2025-05-13 00:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `renjas`
--

CREATE TABLE `renjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `file_upload` varchar(255) NOT NULL,
  `file_upload_wm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renjas`
--

INSERT INTO `renjas` (`id`, `created_at`, `updated_at`, `title`, `tahun`, `file_upload`, `file_upload_wm`) VALUES
(2, '2025-05-14 06:36:05', '2025-08-06 23:08:20', 'Rencana Kerja 2022', '2022', 'document/renja/1754546900_1747230574_RENJA 2022_wm.pdf', 'document/renja/renja_wm/1747230574_RENJA 2022_wm.pdf'),
(3, '2025-05-14 06:38:14', '2025-08-06 23:08:30', 'Rencana Kerja 2023', '2023', 'document/renja/1754546910_1747230590_RENJA 2023_wm.pdf', 'document/renja/renja_wm/1747230590_RENJA 2023_wm.pdf'),
(4, '2025-05-14 06:40:44', '2025-08-06 23:08:41', 'Rencana Kerja 2024', '2024', 'document/renja/1754546921_1747230044_RENJA 2024_wm.pdf', 'document/renja/renja_wm/1747230044_RENJA 2024_wm.pdf'),
(6, '2025-08-06 23:07:53', '2025-08-06 23:07:53', 'Rencana Kerja 2025', '2025', 'document/renja/1754546873_RANCANGAN RENJA 2025.pdf', 'document/renja/renja_wm/1754546873_RANCANGAN RENJA 2025_wm.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `renstras`
--

CREATE TABLE `renstras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `tahun_mulai` year(4) NOT NULL,
  `tahun_selesai` year(4) NOT NULL,
  `file_upload` varchar(255) NOT NULL,
  `file_upload_wm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renstras`
--

INSERT INTO `renstras` (`id`, `created_at`, `updated_at`, `title`, `tahun_mulai`, `tahun_selesai`, `file_upload`, `file_upload_wm`) VALUES
(1, '2025-05-14 07:26:06', '2025-08-06 23:09:26', 'Perubahan Rencana Strategis Tahun 2018-2023', '2018', '2023', 'document/renstra/1754546966_1747232766_RENSTRA Perubahan Tahun 2018-2023_wm.pdf', 'document/renstra/renstra_wm/1747232766_RENSTRA Perubahan Tahun 2018-2023_wm.pdf'),
(2, '2025-05-14 07:26:56', '2025-08-06 23:09:49', 'Rencana Strategis 2024-2026', '2024', '2026', 'document/renstra/1754546989_1747232816_RENSTRA 2024-2026_wm.pdf', 'document/renstra/renstra_wm/1747232816_RENSTRA 2024-2026_wm.pdf');

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
('9iTM5BJjuDm6ziJ3oa0ifIAtFYgmTDB41ADGctDT', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSG8zN3RPcmQ0T0lLTmxiTXY1Q1VuZFM0S01sNFdpQW13c0tzSUJiSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9taXRyYS9rcHUiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTI3Mzg5ODU7fX0=', 1752739060),
('K4EcC3i95nOhtkvdYwXYObk3QyLD2e0r0yD5yu6U', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiV1JLa2w2cm1MZVk5cjZ4WVl3aGZnaVRTOFJNQjRMaHluOXY2WU54byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9taXRyYXMvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzUyNzE2NDAwO319', 1752726599);

-- --------------------------------------------------------

--
-- Table structure for table `strukturors`
--

CREATE TABLE `strukturors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `color` varchar(255) NOT NULL DEFAULT 'green',
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `golongan` varchar(255) DEFAULT NULL,
  `pangkat` varchar(255) DEFAULT NULL,
  `foto_profile` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `strukturors`
--

INSERT INTO `strukturors` (`id`, `parent_id`, `x`, `y`, `color`, `nama`, `nip`, `golongan`, `pangkat`, `foto_profile`, `jabatan`, `created_at`, `updated_at`) VALUES
(137, NULL, 480, 0, 'red', '-', NULL, '-', '-', '196707021998031011_IV_a.jpg', 'Jabatan Baru', '2026-07-26 05:03:20', '2026-09-16 01:48:09'),
(198, 137, 820, 200, 'blue', '-', NULL, '-', '-', NULL, 'Jabatan Baru', '2026-09-16 00:55:35', '2026-09-16 01:48:09'),
(199, 198, 400, 360, 'green', '-', NULL, '-', '-', NULL, 'Jabatan Baru', '2026-09-16 00:58:38', '2026-09-16 01:48:09'),
(200, 198, 720, 360, 'green', '-', NULL, '-', '-', NULL, 'Jabatan Baru', '2026-09-16 00:58:41', '2026-09-16 01:48:09'),
(201, 198, 1040, 360, 'green', '-', NULL, '-', '-', NULL, 'Jabatan Baru', '2026-09-16 00:58:45', '2026-09-16 01:48:09'),
(202, 137, 0, 560, 'blue', '-', NULL, '-', '-', NULL, 'Jabatan Baru', '2026-09-16 01:01:51', '2026-09-16 01:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `ukurkerjas`
--

CREATE TABLE `ukurkerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `file_upload` varchar(255) NOT NULL,
  `file_upload_wm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ukurkerjas`
--

INSERT INTO `ukurkerjas` (`id`, `created_at`, `updated_at`, `title`, `tahun`, `file_upload`, `file_upload_wm`) VALUES
(1, '2025-05-15 09:02:57', '2025-06-23 20:36:32', 'Laporan Hasil Pengukuran Kinerja Berkala Triwulan Tahun 2024', '2024', 'document/ukurkerja/1747324977_Pengukuran Kinerja Berkala TW 3 Tahun 2024.pdf', 'document/ukurkerja/ukurkerja_wm/1747324977_Pengukuran Kinerja Berkala TW 3 Tahun 2024_wm.pdf');

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
(6, 'Admin', 'admin@gmail.com', NULL, '$2y$12$RunN2nhvmiB4im1ozkhf8e/Ps1UVP3hv3T8BBqlvqTHfeNYRj97X.', 'kii5CRvXiev9tKlhhx18mZ6sy2OJ2gQ1dDFvvYDyw2jmDv1tNPVFGAuayT7A', '2026-07-14 22:09:36', '2026-07-14 22:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misis`
--

CREATE TABLE `visi_misis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tupoksi` text DEFAULT NULL,
  `sejarah` text DEFAULT NULL,
  `sejarah_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visi_misis`
--

INSERT INTO `visi_misis` (`id`, `visi`, `misi`, `created_at`, `updated_at`, `tupoksi`, `sejarah`, `sejarah_image`) VALUES
(1, '<p>Mewujudkan Kota Bandung yang unggul, terbuka, amanah, maju, dan agamis melalui pemerintah yang berorientasi melayani serta berkelanjutan dalam mendukung pembangunan sosial.</p>', '<ol><li>Mewujudkan Pelayanan Publik dan Kualitas Hidup Warga Kota Bandung. </li><li>Mewujudkan Bandung sebagai kota yang terbuka, inklusif, demokratis, setara dan berkeadilan. </li><li>Pengelolaan tata pemerintah dan pendayagunaan anggaran yang amanah, bersih, jujur, efektif, akuntabel, dan terpercaya. </li><li>Mewujudkan Kota Bandung yang maju dalam perkeonomian dan infrastruktur, yang dilakukan secara merata untuk menunjang peningkatan daya saing. </li><li>Membentuk Karakter Warga Kota Bandung yang Agamis, Moderat, dan Toleran.</li></ol>', '2025-04-14 08:21:19', '2025-05-24 03:44:37', '<p><strong>TUGAS POKOK</strong></p>\r\n\r\n<ol><li>Badan Kesatuan Bangsa dan Politik mempunyai tugas melaksanakan Urusan pemerintahan di bidang kesatuan bangsa dan politik berdasarkan ketentuan Perpu.</li><li>Untuk melaksanakan tugas sebagaimana yang dimaksud pada ayat (1), Badan Kesatuan Bangsa dan Politik menyelenggarakan fungsi :</li></ol>\r\n\r\n<p><strong>FUNGSI</strong></p>\r\n\r\n<ol><li>Perumusan kebijakan di bidang kesatuan bangsa dan politik di wilayah Kota sesuai dengan ketentuan Perpu.</li><li>Pelaksanaan kebijakan di bidang pembinaan ideologi Pancasila dan Wawasan Kebangsaan, pengelenggaraan politik dalam negeri dan kehidupan demokrasi, pemeliharaan ketahanan ekonomi sosial dan budaya, pembinaan kerukunan antarsuku dan intra suku, umat beragama, ras, dan golongan lainnya, pembinaan dan pemberdayaab organisasi kemasyarakatan serta pelaksanaan kewaspadaan nasional dan penanganan konflik sosial sesuai Perpu.</li><li>Pelaksanaan koordinasi di bidang pembinaan ideologi Pancasila dan wawasan kebangsaan, penyelenggaraan politik dalam negeri dan kehidupan demokrasi, pemeliharaan ketahanan ekonomi, sosial dan budaya, pembinaan kerukunan antar suku dan intra suku, umat beragama, ras, dan golongan lainnya, fasilitasi organisasi kemasyarakatan, serta pelaksanaan kewaspadaan nasional dan penanganan konflik sosial di wilayah kota sesuia ketentuan Perpu.</li><li>Pelaksanaan evaluasi dan pelaporan di bidang pembinaan ideologi Pancasila dan wawasan kebangsaan, penyelenggaraan politik dalam negeri dan kehidupan demokrasi, pemeliharaan ketahanan ekonomi, sosial dan budaya, pembinaan kerukunan antar suku dan intra suku, umat beragama, ras, dan golongan lainnya, fasilitasi organisasi kemasyarakatan, serta pelaksanaan kewaspadaan nasional dan penanganan konflik sosial di wilayah kota sesuai ketentuan Perpu.</li><li>Pelaksanaan fasilitasi forkopimda</li><li>Pelaksanaan administrasi Badan di Bidang Kesatuan Bangsa dan Politik Kota.</li><li>Pelaksanaan fungsi lain yang diberikan oleh Walikota sesuai dengan bidang tugasnya.</li></ol>', '<p><strong>SEJARAH BADAN KESATUAN BANGSA DAN POLITIK</strong></p>\r\n\r\n<p><strong>KOTA BANDUNG</strong></p>\r\n\r\n<p>Badan Kesatuan Bangsa dan Politik merupakan instansi yang bergerak menyelenggarakan fungsi penunjang urusan pemerintahan bidang kesatuan bangsa dan politik. Badan Kesatuan Bangsa dan Politik Kota Bandung sendiri sebelumnya Bernama Badan Kesatuan Bangsa, Perlindungan dan Pemberdayaan Masyarakat (BKBPPM) Kota Bandung. BKBPPM Kota Bandung dahulu di bentuk berdasarkan Peraturan Daerah Kota Bandung Nomor 12 Tahun 2007 Tentang Pembentukan dan Susunan Organisasi Lembaga Teknis Daerah Kota Bandung, hal tersebut merupakan sebuah Lembaga teknis yang dibentuk sebagaimana amanah dari Peraturan Pemerintah No. 38 Tahun 2007 tentang Pembagian Urusan Pemerintah Antara Pemerintah, Pemerintah Daerah Provinsi dan Pemerintah Daerah Kabupaten/Kota.</p>\r\n\r\n<p>Lalu badan tersebut Kembali berubah berdasarkan Peraturan Daerah Nomor 8 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota Bandung BKBPM menjadi Badan Kesatuan Bangsa dan Politik (Badan Kesatuan Bangsa dan Politik Kota Bandung) Kota Bandung dan Peraturan Walikota Bandung Nomor. 1406 Tahun 2016 Tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi, Serta Tata Kerja Badan Kesatuan Bangsa Dan Politik Kota Bandung. Didalamnya terdiri dari beberapa bidang yaitu, Bidang Bina Ideologi dan Wawasan Kebangsaan, Bidang Politik Dalam Negeri, Bidang Ketahanan Ekonomi, Seni Budaya dan Wawasan Kebangsaan, serta Bidang Kewaspadaan Nasional.</p>\r\n\r\n<p>Kemudian perubahan kembali terjadi berdasarkan Peraturan Daerah Kota Bandung Nomor. 3 Tahun 2021 Tentang Perubahan Atas Peraturan Daerah Kota Bandung Nomor. 8 Tahun 2016 dan Peraturan Walikota Bandung Nomor. 23 Tahun 2021 Tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi, Serta Tata Kerja Badan Kesatuan Bangsa dan Politik Kota Bandung. Kemudian bidang yang berada didalam Badan Kesatuan Bangsa Dan Politik sendiri Kembali mengalami perubahan menjadi terdiri dari Sekretariat, Bidang Ideologi, Wawasan Kebangsaan &amp; Karakter Bangsa, Bidang Politik Dalam Negeri, Seni Budaya Dan 6 Organisasi Kemasyarakatan, Bidang Ketahanan Ekonomi, Sosial, Budaya, Agama dan Bidang Kewaspadaan Nasional &amp; Penanganan Konflik.</p>', '1748061940_balai-kota6_8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `app_settings_key_unique` (`key`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidangs`
--
ALTER TABLE `bidangs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `dokumen_ormas`
--
ALTER TABLE `dokumen_ormas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumen_ormas_ormas_id_foreign` (`ormas_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeris_program_id_foreign` (`program_id`);

--
-- Indexes for table `ikus`
--
ALTER TABLE `ikus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_batches`
--
ALTER TABLE `import_batches`
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
-- Indexes for table `lakips`
--
ALTER TABLE `lakips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landasan_hukums`
--
ALTER TABLE `landasan_hukums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landasan_hukums_bidang_id_foreign` (`bidang_id`);

--
-- Indexes for table `laporan_kajians`
--
ALTER TABLE `laporan_kajians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legislatifs`
--
ALTER TABLE `legislatifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitras`
--
ALTER TABLE `mitras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ormas`
--
ALTER TABLE `ormas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ormas_import_batch_id_foreign` (`import_batch_id`);

--
-- Indexes for table `paslons`
--
ALTER TABLE `paslons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengurus_ormas`
--
ALTER TABLE `pengurus_ormas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengurus_ormas_ormas_id_foreign` (`ormas_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_bidang_id_foreign` (`bidang_id`),
  ADD KEY `posts_program_id_foreign` (`program_id`);

--
-- Indexes for table `potensi_konfliks`
--
ALTER TABLE `potensi_konfliks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs_bidang_id_foreign` (`bidang_id`);

--
-- Indexes for table `renjas`
--
ALTER TABLE `renjas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renstras`
--
ALTER TABLE `renstras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `strukturors`
--
ALTER TABLE `strukturors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `strukturors_nip_unique` (`nip`);

--
-- Indexes for table `ukurkerjas`
--
ALTER TABLE `ukurkerjas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visi_misis`
--
ALTER TABLE `visi_misis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bidangs`
--
ALTER TABLE `bidangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokumen_ormas`
--
ALTER TABLE `dokumen_ormas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=706;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ikus`
--
ALTER TABLE `ikus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `import_batches`
--
ALTER TABLE `import_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lakips`
--
ALTER TABLE `lakips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landasan_hukums`
--
ALTER TABLE `landasan_hukums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `laporan_kajians`
--
ALTER TABLE `laporan_kajians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `legislatifs`
--
ALTER TABLE `legislatifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8377;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mitras`
--
ALTER TABLE `mitras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `ormas`
--
ALTER TABLE `ormas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=930;

--
-- AUTO_INCREMENT for table `paslons`
--
ALTER TABLE `paslons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengurus_ormas`
--
ALTER TABLE `pengurus_ormas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2035;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `potensi_konfliks`
--
ALTER TABLE `potensi_konfliks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `renjas`
--
ALTER TABLE `renjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `renstras`
--
ALTER TABLE `renstras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `strukturors`
--
ALTER TABLE `strukturors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `ukurkerjas`
--
ALTER TABLE `ukurkerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visi_misis`
--
ALTER TABLE `visi_misis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumen_ormas`
--
ALTER TABLE `dokumen_ormas`
  ADD CONSTRAINT `dokumen_ormas_ormas_id_foreign` FOREIGN KEY (`ormas_id`) REFERENCES `ormas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galeris`
--
ALTER TABLE `galeris`
  ADD CONSTRAINT `galeris_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `landasan_hukums`
--
ALTER TABLE `landasan_hukums`
  ADD CONSTRAINT `landasan_hukums_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidangs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ormas`
--
ALTER TABLE `ormas`
  ADD CONSTRAINT `ormas_import_batch_id_foreign` FOREIGN KEY (`import_batch_id`) REFERENCES `import_batches` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pengurus_ormas`
--
ALTER TABLE `pengurus_ormas`
  ADD CONSTRAINT `pengurus_ormas_ormas_id_foreign` FOREIGN KEY (`ormas_id`) REFERENCES `ormas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidangs` (`id`),
  ADD CONSTRAINT `posts_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`);

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidangs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
