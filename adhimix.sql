-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 02:43 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adhimix`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_company` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pict` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id_user`, `id_company`, `fullname`, `username`, `password`, `jabatan`, `no_telp`, `pict`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin gans', 'admin', 'admin123', 'tinggi', '099818129991', '-', 'admin', '2018-10-29 02:32:30', '2018-10-29 02:32:30'),
(2, 1, 'staff PT Sejahtera', 'staff', 'staff123', 'rendah', '08827261122', '-', 'staff', '2018-10-29 02:45:25', '2018-10-29 02:45:25'),
(3, 2, 'Sumanto AF', 'sumanto', 'sumanto123', 'jabatan', '089889777821', '-', 'admin', '2018-10-29 19:45:02', '2018-10-29 19:45:02'),
(4, 3, 'padangdanss', 'padang', 'padang123', 'jabatans', '02919238', '-', 'admin', '2018-10-29 19:51:55', '2018-10-29 19:51:55'),
(5, 4, 'admin jawa', 'semenjawa', 'semenjawa', 'jabatan', '091821389', '-', 'admin', '2018-10-30 00:09:10', '2018-10-30 00:09:10'),
(6, 5, 'admin hideng', 'hideng', 'hideng123', 'jabatan', '0192391291', '-', 'admin', '2018-10-30 00:13:48', '2018-10-30 00:13:48'),
(7, 8, 'fds', 'fds', 'sdf', 'sfd', 'fds', '-', 'admin', '2018-10-30 00:21:21', '2018-10-30 00:21:21'),
(8, 3, 'padang tea', 'padangstaff', 'staff123', 'staff', '087987123438', '-', 'staff', '2018-10-30 20:53:49', '2018-10-30 20:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `name`, `username`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'adminadhimix', 'adhimix', 'admin123', 'admin', NULL, NULL),
(2, 'superadmin', 'super', 'super123', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id_company` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_rek` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pict` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id_company`, `company_name`, `address`, `npwp`, `email`, `no_telp`, `no_rek`, `about`, `pict`, `created_at`, `updated_at`) VALUES
(1, 'PT.Sejahteras', 'Bogor jauh', 'mpwp', 'sejahtera@gmail.com', '0982878362', '0001181818181', NULL, NULL, '2018-10-29 02:32:27', '2018-11-09 03:04:17'),
(2, 'PT.Abadi jaya', 'jakarta barat', 'mpkwks', 'abadiA@gmail.com', '087876677898', '011290123281', NULL, NULL, '2018-10-29 19:38:23', '2018-10-29 19:38:23'),
(3, 'PT.semenpadang', 'padang', 'mpwpw', 'padang@gmail.com', '08789912123242', '0110922779', NULL, NULL, '2018-10-29 19:46:57', '2018-10-29 19:46:57'),
(4, 'PT.semenjawa', 'bogor', 'pwpn', 'jawasemen@gmail.com', '0898212329281', '02011231001', NULL, NULL, '2018-10-30 00:07:29', '2018-10-30 00:07:29'),
(5, 'PT.semenpapua', 'papua', 'mpwp', 'semenp@gmail.com', '089812344859', '012320101', NULL, NULL, '2018-10-30 00:10:51', '2018-10-30 00:10:51'),
(6, 'perusahaan', 'alamat', 'npwp', 'email@gmail.com', '213213', '0912093021', NULL, NULL, '2018-10-30 00:14:48', '2018-10-30 00:14:48'),
(7, 'PT.Sejahtera clalu', 'alamat', 'mpw', 'amdasla@MALSL', '01003', '02312', NULL, NULL, '2018-10-30 00:16:42', '2018-10-30 00:16:42'),
(8, 'fsd', 'fsd', 'fsd', 'sejahtera@gmail.comdfs', '08827261122', '2131', NULL, NULL, '2018-10-30 00:21:21', '2018-10-30 00:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `dukungans`
--

CREATE TABLE `dukungans` (
  `id_dukungan` int(10) UNSIGNED NOT NULL,
  `id_company` int(11) NOT NULL,
  `nama_proyek` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proyek_mulai` date NOT NULL,
  `proyek_akhir` date NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dukungans`
--

INSERT INTO `dukungans` (`id_dukungan`, `id_company`, `nama_proyek`, `provinsi`, `kota`, `owner`, `proyek_mulai`, `proyek_akhir`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, 'proyek 1', 'Banten', 'Tangerang kota', 'owner 1', '2018-10-30', '2018-10-31', 'alamat 1', NULL, NULL),
(2, 1, 'proyek 2', 'Jakarta', 'Jakarta Barat', 'owner 2', '2018-10-31', '2018-11-30', 'alamat 2', NULL, NULL),
(3, 1, 'proyek 3', 'Jakarta', 'Tangerang kota', 'owner 3', '2018-02-11', '2018-12-12', 'alamat 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history_penawarans`
--

CREATE TABLE `history_penawarans` (
  `id_history` int(10) UNSIGNED NOT NULL,
  `id_respon` int(11) NOT NULL,
  `mutu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slump` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spec` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `vol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ppn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uang_muka` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `history_penawarans`
--

INSERT INTO `history_penawarans` (`id_history`, `id_respon`, `mutu`, `slump`, `spec`, `harga`, `vol`, `ppn`, `uang_muka`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '90', '9', 11, '090', 'Include', 10, '2018-10-29 20:42:10', '2018-10-29 20:42:10'),
(2, 1, '2', '90', '90', 11, '90', 'Include', 10, '2018-10-29 20:42:10', '2018-10-29 20:42:10'),
(3, 2, '1', '90', '90', 100, '2', 'Exclude', 10, '2018-11-06 20:31:54', '2018-11-06 20:31:54'),
(4, 4, '1', '90', '90', 10, '10', 'Exclude', 9, '2018-11-18 21:02:06', '2018-11-18 21:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `kontraks`
--

CREATE TABLE `kontraks` (
  `id_kontrak` int(10) UNSIGNED NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `komentar` text COLLATE utf8_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kontraks`
--

INSERT INTO `kontraks` (`id_kontrak`, `id_proyek`, `komentar`, `pdf`, `created_at`, `updated_at`) VALUES
(1, 1, 'nah', 'KONTRAK_1542781673.pdf', '2018-11-20 23:27:53', '2018-11-20 23:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_23_023227_create_companies_table', 1),
(4, '2018_10_23_035220_create_accounts_table', 2),
(5, '2018_10_24_031533_create_dukungans_table', 3),
(6, '2018_10_24_034021_create_mutudukungans_table', 3),
(7, '2018_10_24_035746_create_mutudukungans_table', 4),
(8, '2018_10_24_035952_create_mutus_table', 5),
(9, '2018_10_24_052649_create_respon_dukungans_table', 6),
(10, '2018_10_24_064539_create_penawarans_table', 7),
(11, '2018_10_24_122719_create_mutupenawarans_table', 8),
(12, '2018_10_24_131107_create_respon_penawarans_table', 9),
(13, '2018_10_24_135925_create_history_penawarans_table', 10),
(14, '2018_10_25_033134_create_kontraks_table', 11),
(15, '2018_10_31_043959_create_produksis_table', 12),
(16, '2018_10_31_050357_create_pengirimen_table', 13),
(17, '2018_11_01_081035_create_piutangs_table', 14),
(18, '2018_11_05_042529_create_admins_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `mutudukungans`
--

CREATE TABLE `mutudukungans` (
  `id_mutu_dukungan` int(10) UNSIGNED NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_mutu` int(11) NOT NULL,
  `vol` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mutudukungans`
--

INSERT INTO `mutudukungans` (`id_mutu_dukungan`, `id_proyek`, `id_mutu`, `vol`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 11, NULL, NULL),
(2, 1, 2, 21, NULL, NULL),
(13, 2, 1, 12, NULL, NULL),
(14, 3, 1, 11, NULL, NULL),
(15, 3, 2, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mutupenawarans`
--

CREATE TABLE `mutupenawarans` (
  `id_mutu_penawaran` int(10) UNSIGNED NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_mutu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slump` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spec` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mutupenawarans`
--

INSERT INTO `mutupenawarans` (`id_mutu_penawaran`, `id_proyek`, `id_mutu`, `slump`, `spec`, `vol`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '90', '9', '090', '11', NULL, '2018-10-29 20:42:10'),
(2, 1, '2', '90', '90', '90', '11', NULL, '2018-10-29 20:42:10'),
(3, 2, '2', '90', '9', '2', '11', NULL, NULL),
(4, 2, '1', '90', '90', '10', '10', NULL, '2018-11-18 21:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `mutus`
--

CREATE TABLE `mutus` (
  `id_mutu` int(10) UNSIGNED NOT NULL,
  `nama_mutu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mutus`
--

INSERT INTO `mutus` (`id_mutu`, `nama_mutu`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'K-001', 1000, NULL, NULL),
(2, 'k-002', 2000, NULL, NULL),
(3, 'k-003', 3000, NULL, NULL),
(4, 'k-004', 4000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penawarans`
--

CREATE TABLE `penawarans` (
  `id_penawaran` int(10) UNSIGNED NOT NULL,
  `id_company` int(11) NOT NULL,
  `nama_proyek` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mulai_proyek` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `akhir_proyek` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uang_muka` int(11) DEFAULT NULL,
  `ppn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `penawarans`
--

INSERT INTO `penawarans` (`id_penawaran`, `id_company`, `nama_proyek`, `owner`, `alamat`, `provinsi`, `kota`, `mulai_proyek`, `akhir_proyek`, `uang_muka`, `ppn`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'proyek 1', 'owner 1', 'alamat 1', 'Banten', 'Tangerang kota', '2018-10-31', '2018-10-31', 10, 'Include', NULL, '2018-11-06 20:28:30', 'done'),
(2, 1, 'proyek 2', 'owner 2', 'alamat 2', 'DKI Jakarta', 'Jakarta Barat', '2018-10-30', '2018-10-31', 9, 'Exclude', NULL, '2018-11-18 21:02:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengirimen`
--

CREATE TABLE `pengirimen` (
  `id_produksi` int(10) UNSIGNED NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `docket` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `no_tm` int(11) NOT NULL,
  `nama_driver` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vol_kirim` int(11) NOT NULL,
  `vol_terima` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pengirimen`
--

INSERT INTO `pengirimen` (`id_produksi`, `id_proyek`, `docket`, `tanggal_kirim`, `no_tm`, `nama_driver`, `vol_kirim`, `vol_terima`, `created_at`, `updated_at`) VALUES
(1, 1, 'dokett', '2018-10-31', 1, 'ucok', 100, 100, NULL, NULL),
(2, 2, 'dockets', '2018-11-02', 2, 'coki', 500, 100, NULL, NULL),
(3, 2, 'docketss', '2018-11-03', 2, 'coki', 500, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `piutangs`
--

CREATE TABLE `piutangs` (
  `id_credit_list` int(10) UNSIGNED NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_inv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_faktur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_inv` date NOT NULL,
  `dpp_ppn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_terbayar` int(11) NOT NULL,
  `tanggal_terakhir_bayar` date NOT NULL,
  `tanggal_terakhir_update` date NOT NULL,
  `sisa_kredit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `piutangs`
--

INSERT INTO `piutangs` (`id_credit_list`, `id_proyek`, `nama_proyek`, `no_inv`, `no_faktur`, `tanggal_inv`, `dpp_ppn`, `total_terbayar`, `tanggal_terakhir_bayar`, `tanggal_terakhir_update`, `sisa_kredit`, `created_at`, `updated_at`) VALUES
(1, 1, 'proyek 1', 'fak1', 'f1', '2018-11-01', '100', 100000, '2018-11-02', '2018-11-03', 900000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produksis`
--

CREATE TABLE `produksis` (
  `id_proyek` int(10) UNSIGNED NOT NULL,
  `nama_proyek` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_proyek` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `vol_kontrak` int(11) NOT NULL,
  `terkirim` int(11) NOT NULL,
  `tersisa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produksis`
--

INSERT INTO `produksis` (`id_proyek`, `nama_proyek`, `alamat_proyek`, `nama_owner`, `tanggal_mulai`, `tanggal_akhir`, `vol_kontrak`, `terkirim`, `tersisa`, `created_at`, `updated_at`) VALUES
(1, 'proyek 1', 'alamat 1', 'owner 1', '2018-10-31', '2018-11-01', 100, 60, 40, NULL, NULL),
(2, 'proyek 2', 'alamat 2', 'owner 2', '2018-11-01', '2018-11-08', 1000, 200, 800, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `respon_dukungans`
--

CREATE TABLE `respon_dukungans` (
  `id_respon_dukungan` int(10) UNSIGNED NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `responDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `respon_dukungans`
--

INSERT INTO `respon_dukungans` (`id_respon_dukungan`, `id_proyek`, `responDesc`, `pdf`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, '-', '-', 'Tolak', '2018-10-24 10:48:14', '2018-10-24 10:48:14'),
(3, 13, 'Selamat anda di terima', 'PDF_1540405105.pdf', 'Terima', '2018-10-24 11:18:25', '2018-10-24 11:18:25'),
(4, 14, '-', '-', 'Tolak', '2018-10-24 11:41:25', '2018-10-24 11:41:25'),
(5, 15, 'dukungan di terima', 'PDF_1540444539.pdf', 'Terima', '2018-10-24 22:15:39', '2018-10-24 22:15:39'),
(6, 16, 'komentar', 'PDF_1540455883.pdf', 'Terima', '2018-10-25 01:24:43', '2018-10-25 01:24:43'),
(7, 1, 'selamat', 'PDF_1542776686.pdf', 'Terima', '2018-10-29 20:06:41', '2018-10-29 20:06:41'),
(8, 2, '-', '-', 'Tolak', '2018-11-20 22:02:09', '2018-11-20 22:02:09'),
(9, 3, 'selamat !!', 'PDF_1542776686.pdf', 'Terima', '2018-11-20 22:04:46', '2018-11-20 22:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `respon_penawarans`
--

CREATE TABLE `respon_penawarans` (
  `id_respon_penawaran` int(10) UNSIGNED NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `tgl_respon` date NOT NULL,
  `pdf` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `times` int(11) NOT NULL,
  `insert_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `respon_penawarans`
--

INSERT INTO `respon_penawarans` (`id_respon_penawaran`, `id_proyek`, `tgl_respon`, `pdf`, `times`, `insert_by`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-10-30', 'KONTRAK_1540439741.pdf', 1, 'Admin', '2018-10-29 20:42:10', '2018-10-29 20:42:10'),
(2, 2, '2018-11-07', 'PDF_1541561514.pdf', 1, 'Admin', '2018-11-06 20:31:54', '2018-11-06 20:31:54'),
(4, 2, '2018-11-19', 'PDF_1541561514.pdf', 2, 'Vendor', '2018-11-18 21:02:06', '2018-11-18 21:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `dukungans`
--
ALTER TABLE `dukungans`
  ADD PRIMARY KEY (`id_dukungan`);

--
-- Indexes for table `history_penawarans`
--
ALTER TABLE `history_penawarans`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `kontraks`
--
ALTER TABLE `kontraks`
  ADD PRIMARY KEY (`id_kontrak`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutudukungans`
--
ALTER TABLE `mutudukungans`
  ADD PRIMARY KEY (`id_mutu_dukungan`);

--
-- Indexes for table `mutupenawarans`
--
ALTER TABLE `mutupenawarans`
  ADD PRIMARY KEY (`id_mutu_penawaran`);

--
-- Indexes for table `mutus`
--
ALTER TABLE `mutus`
  ADD PRIMARY KEY (`id_mutu`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penawarans`
--
ALTER TABLE `penawarans`
  ADD PRIMARY KEY (`id_penawaran`);

--
-- Indexes for table `pengirimen`
--
ALTER TABLE `pengirimen`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `piutangs`
--
ALTER TABLE `piutangs`
  ADD PRIMARY KEY (`id_credit_list`);

--
-- Indexes for table `produksis`
--
ALTER TABLE `produksis`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `respon_dukungans`
--
ALTER TABLE `respon_dukungans`
  ADD PRIMARY KEY (`id_respon_dukungan`);

--
-- Indexes for table `respon_penawarans`
--
ALTER TABLE `respon_penawarans`
  ADD PRIMARY KEY (`id_respon_penawaran`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id_company` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dukungans`
--
ALTER TABLE `dukungans`
  MODIFY `id_dukungan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `history_penawarans`
--
ALTER TABLE `history_penawarans`
  MODIFY `id_history` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kontraks`
--
ALTER TABLE `kontraks`
  MODIFY `id_kontrak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `mutudukungans`
--
ALTER TABLE `mutudukungans`
  MODIFY `id_mutu_dukungan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `mutupenawarans`
--
ALTER TABLE `mutupenawarans`
  MODIFY `id_mutu_penawaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mutus`
--
ALTER TABLE `mutus`
  MODIFY `id_mutu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `penawarans`
--
ALTER TABLE `penawarans`
  MODIFY `id_penawaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengirimen`
--
ALTER TABLE `pengirimen`
  MODIFY `id_produksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `piutangs`
--
ALTER TABLE `piutangs`
  MODIFY `id_credit_list` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produksis`
--
ALTER TABLE `produksis`
  MODIFY `id_proyek` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `respon_dukungans`
--
ALTER TABLE `respon_dukungans`
  MODIFY `id_respon_dukungan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `respon_penawarans`
--
ALTER TABLE `respon_penawarans`
  MODIFY `id_respon_penawaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
