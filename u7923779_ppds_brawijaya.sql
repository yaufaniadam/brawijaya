-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2021 at 09:17 PM
-- Server version: 10.3.28-MariaDB-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u7923779_ppds_brawijaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE `ci_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `spv` int(11) NOT NULL,
  `stase` int(11) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat_asal` text NOT NULL,
  `alamat_domisili` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `no_telp_drt` varchar(20) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pembiayaan` varchar(100) NOT NULL,
  `no_sip` varchar(30) NOT NULL,
  `no_str` varchar(30) NOT NULL,
  `no_bpjs` varchar(30) NOT NULL,
  `no_rekening` varchar(40) NOT NULL,
  `usia` varchar(3) NOT NULL,
  `aktif` int(1) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `username`, `nama_lengkap`, `email`, `photo`, `password`, `role`, `spv`, `stase`, `jenis_kelamin`, `alamat_asal`, `alamat_domisili`, `no_telp`, `no_telp_drt`, `nim`, `status`, `pembiayaan`, `no_sip`, `no_str`, `no_bpjs`, `no_rekening`, `usia`, `aktif`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin', 'nova810301@gmail.com', '1614143372_0c4d64b6be8192f48238.jpg', '$2y$10$2.n2b58qDdoZzoRdJwNEMuVE4ewa2EMTjqo.E5qO0PIZvTT1LjM2O', 1, 0, 0, 'l', 'ddfsdfsdfwerwesd', 'llololol\r\n', '2394283402', '2874239423', '2383749234', 'sdjkfnkfjwfe', 'mandiri', '', '37462836874', '90877975567', '6748237422', '', 1, '', '', '', '2017-09-29 10:09:44', '2021-04-17 01:44:47'),
(328, 'drsaifurrohman', 'dr. M.Saifur Rohman, Sp.JP(K), PhD', 'maifurrohman@gmail.com', '1605497845_8c50490e7e0fd46fb801.png', '$2y$12$7imwoVdxgukLdHoYaYKv.u.etr05PEtpGRn/Yn06BgdOmyHhYwPXy', 3, 0, 1, 'p', 'Malang', 'Malang', '0813', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2020-11-09 19:59:53', '2021-02-04 19:29:00'),
(330, 'drardian', 'dr. Ardian Rizal Sp.JP(K)', 'drardianrizal@gmail.com', '1617957770_9b754b9ec868e97614d0.png', '$2y$12$7imwoVdxgukLdHoYaYKv.u.etr05PEtpGRn/Yn06BgdOmyHhYwPXy', 3, 0, 3, 'l', 'Malang', 'Malang', '0812', '0812', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-01-08 02:06:38', '2021-04-15 03:45:31'),
(331, 'drsetyasih', 'dr. Setyasih Anjarwani, SpJP', 'setyasihanjarwani@gmail.com', '1612594838_d02ae97fb4756ffaa970.png', '$2y$12$7imwoVdxgukLdHoYaYKv.u.etr05PEtpGRn/Yn06BgdOmyHhYwPXy', 3, 0, 13, 'p', 'Malang', 'Malang', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-01-08 02:07:08', '2021-02-06 01:00:38'),
(355, 'debug', 'debug akun', 'bokergaming002@gmail.com', '', '$2y$10$ZJaSAy.pTgZLPqxvDCcxcOYRkZCtto3blBtqSN339rOnpFdUHGdbe', 4, 328, 0, 'l', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-04-13 20:55:23', '2021-04-13 22:55:52'),
(357, 'spv1', 'Supervisor tambahan 1', 'spv@tambahan.com', '', '$2y$10$AgplW4sQ4I4/KlqZtJA2POd/0vkwbDnwaviYCFtPpok1sEtrQQCZC', 3, 0, 2, 'l', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-04-13 21:40:23', '2021-04-13 21:40:52'),
(358, 'debug2', 'debug akun 2', 'waskitodamar770@gmail.com', '', '$2y$10$g.8jRQG5pqAF.rv0R60wheO52Cp1KFyeIhkwjsd5lCxElDOnfIEJ.', 4, 328, 0, 'l', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-04-13 23:16:07', '2021-04-13 23:16:07'),
(359, 'yaufaniadam', 'Yaufani Adam', 'yaufaniadam@gmail.com', '1618475505_7729fa24bc4b0370609e.png', '$2y$10$xNBgXQC9ATrXH5iwn9iEOuIBZblqTM9ztLTV1P81SK56iuI.1qQRG', 4, 357, 0, 'l', 'Joja', 'Jogja', '08123456', '08123456', '12345', '', '', '', '', '', '', '', 1, '', '', '', '2021-04-15 03:26:21', '2021-04-15 03:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `jenis_tugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `jenis_tugas`) VALUES
(3, 'Jurnal Reading', 1),
(4, 'Textbook Reading', 1),
(5, 'Case Report', 1),
(6, 'Literature Review', 1),
(7, 'lain-lain', 1),
(8, 'Proposal Thesis', 2),
(9, 'Hasil Thesis', 2),
(10, 'Case Report 1', 2),
(11, 'Case Report 2', 2),
(12, 'Literature Review Related Thesis', 2),
(13, 'Clinical Literature Review', 2);

-- --------------------------------------------------------

--
-- Table structure for table `log_book`
--

CREATE TABLE `log_book` (
  `id` int(11) NOT NULL,
  `judul` varchar(90) NOT NULL,
  `keterangan` text NOT NULL,
  `id_ppds` int(11) NOT NULL,
  `waktu` date NOT NULL,
  `pasien` varchar(60) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `usia` int(11) NOT NULL,
  `jenis_tindakan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_book`
--

INSERT INTO `log_book` (`id`, `judul`, `keterangan`, `id_ppds`, `waktu`, `pasien`, `jenis_kelamin`, `usia`, `jenis_tindakan`) VALUES
(11, 'Judul', 'Judul', 359, '2021-04-07', 'fulan', 'l', 36, 'ahsdkjasdh');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `isi` text NOT NULL,
  `redirect` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `sender`, `receiver`, `title`, `isi`, `redirect`, `tanggal`, `status`) VALUES
(107, 0, 3, 'Registrasi Pengguna baru', 'Registrasi Pengguna Baru', 'https://miokardmalang.com/admin/users/355', '2021-04-14 02:00:51', 1),
(108, 0, 328, 'Tugas Baru', 'https://miokardmalang.com/tugas/108', 'https://miokardmalang.com/tugas/108', '2021-04-14 02:23:14', 1),
(109, 0, 330, 'Tugas Baru', 'https://miokardmalang.com/tugas/108', 'https://miokardmalang.com/tugas/108', '2021-04-14 02:22:11', 1),
(110, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 02:41:17', 1),
(111, 0, 328, 'Tugas Baru', 'https://miokardmalang.com/tugas/109', 'https://miokardmalang.com/tugas/109', '2021-04-14 02:44:07', 1),
(112, 0, 330, 'Tugas Baru', 'https://miokardmalang.com/tugas/109', 'https://miokardmalang.com/tugas/109', '2021-04-14 02:44:48', 1),
(113, 0, 331, 'Tugas Baru', 'https://miokardmalang.com/tugas/109', 'https://miokardmalang.com/tugas/109', '2021-04-14 02:46:53', 1),
(114, 0, 357, 'Tugas Baru', 'https://miokardmalang.com/tugas/109', 'https://miokardmalang.com/tugas/109', '2021-04-14 02:49:08', 1),
(115, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:02:29', 0),
(116, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:03:04', 0),
(117, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:04:42', 0),
(118, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:08:01', 0),
(119, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:08:50', 0),
(120, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:09:34', 0),
(121, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:10:16', 0),
(122, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:10:50', 0),
(123, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:11:17', 0),
(124, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:11:51', 0),
(125, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:12:59', 0),
(126, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:13:37', 0),
(127, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:14:14', 0),
(128, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:14:55', 0),
(129, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:16:17', 0),
(130, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:16:51', 0),
(131, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:17:19', 0),
(132, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:18:17', 0),
(133, 0, 355, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-14 03:18:42', 0),
(134, 0, 3, 'Registrasi Pengguna baru', 'Registrasi Pengguna Baru', 'https://miokardmalang.com/admin/users/358', '2021-04-14 04:16:15', 1),
(135, 0, 328, 'Tugas Baru', 'https://miokardmalang.com/tugas/110', 'https://miokardmalang.com/tugas/110', '2021-04-14 04:18:56', 1),
(136, 0, 330, 'Tugas Baru', 'https://miokardmalang.com/tugas/110', 'https://miokardmalang.com/tugas/110', '2021-04-14 04:19:27', 1),
(137, 0, 331, 'Tugas Baru', 'https://miokardmalang.com/tugas/111', 'https://miokardmalang.com/tugas/111', '2021-04-14 04:30:18', 1),
(138, 0, 330, 'Tugas Baru', 'https://miokardmalang.com/tugas/111', 'https://miokardmalang.com/tugas/111', '2021-04-14 04:31:06', 1),
(139, 0, 328, 'Tugas Baru', 'https://miokardmalang.com/tugas/112', 'https://miokardmalang.com/tugas/112', '2021-04-14 07:50:07', 1),
(140, 0, 330, 'Tugas Baru', 'https://miokardmalang.com/tugas/112', 'https://miokardmalang.com/tugas/112', '2021-04-14 06:05:58', 1),
(141, 0, 331, 'Tugas Baru', 'https://miokardmalang.com/tugas/112', 'https://miokardmalang.com/tugas/112', '2021-04-14 07:50:46', 1),
(142, 0, 357, 'Tugas Baru', 'https://miokardmalang.com/tugas/112', 'https://miokardmalang.com/tugas/112', '2021-04-14 07:51:18', 1),
(143, 0, 3, 'Registrasi Pengguna baru', 'Registrasi Pengguna Baru', 'https://miokardmalang.com/admin/users/359', '2021-04-16 02:09:29', 1),
(144, 0, 328, 'Tugas Baru', 'https://miokardmalang.com/tugas/113', 'https://miokardmalang.com/tugas/113', '2021-04-15 08:34:17', 0),
(145, 0, 330, 'Tugas Baru', 'https://miokardmalang.com/tugas/113', 'https://miokardmalang.com/tugas/113', '2021-04-15 08:34:17', 0),
(146, 0, 328, 'Tugas Baru', 'https://miokardmalang.com/tugas/114', 'https://miokardmalang.com/tugas/114', '2021-04-15 08:35:21', 0),
(147, 0, 0, 'Tugas Baru', 'https://miokardmalang.com/tugas/114', 'https://miokardmalang.com/tugas/114', '2021-04-15 08:35:21', 0),
(148, 0, 328, 'Tugas Baru', 'https://miokardmalang.com/tugas/115', 'https://miokardmalang.com/tugas/115', '2021-04-15 08:45:08', 0),
(149, 0, 0, 'Tugas Baru', 'https://miokardmalang.com/tugas/115', 'https://miokardmalang.com/tugas/115', '2021-04-15 08:45:08', 0),
(150, 0, 330, 'Tugas Baru', 'https://miokardmalang.com/tugas/115', 'https://miokardmalang.com/tugas/115', '2021-04-15 08:45:08', 0),
(151, 0, 331, 'Tugas Baru', 'https://miokardmalang.com/tugas/115', 'https://miokardmalang.com/tugas/115', '2021-04-15 08:45:08', 0),
(152, 0, 359, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-15 09:01:45', 0),
(153, 0, 358, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-19 04:24:46', 0),
(154, 0, 358, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-19 04:35:05', 0),
(155, 0, 358, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-19 06:15:55', 0),
(156, 0, 358, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-19 06:37:51', 0),
(157, 0, 358, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-19 06:38:57', 0),
(158, 0, 358, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-19 06:51:36', 0),
(159, 0, 358, 'stase selesai', 'ada telah menyelesaikan stase', '', '2021-04-19 06:52:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `presensi_sidang`
--

CREATE TABLE `presensi_sidang` (
  `id` int(11) NOT NULL,
  `id_ppds` int(11) NOT NULL,
  `id_sidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi_sidang`
--

INSERT INTO `presensi_sidang` (`id`, `id_ppds`, `id_sidang`) VALUES
(8, 355, 109),
(9, 355, 112),
(10, 358, 112),
(11, 355, 115);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'admin stase'),
(3, 'supervisor'),
(4, 'ppds');

-- --------------------------------------------------------

--
-- Table structure for table `sidang_ppds`
--

CREATE TABLE `sidang_ppds` (
  `id` int(11) NOT NULL,
  `id_sidang` int(11) NOT NULL,
  `id_ppds` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stase`
--

CREATE TABLE `stase` (
  `id` int(11) NOT NULL,
  `stase` varchar(60) NOT NULL,
  `id_tahap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stase`
--

INSERT INTO `stase` (`id`, `stase`, `id_tahap`) VALUES
(1, 'Pembekalan', 1),
(2, 'IPD', 1),
(3, 'IKA-1', 1),
(4, 'PARU', 1),
(5, 'Kardiologi Klinik', 2),
(6, 'Diagnostik Non Invasif', 2),
(7, 'Vaskular', 3),
(8, 'Electrophysiology', 3),
(9, 'Preventif dan Rehabilitasi Jantung', 3),
(10, 'Imaging', 3),
(11, 'Post-Op Bedah Jantung', 3),
(12, 'IKA-2', 3),
(13, 'Kongenital', 3),
(14, 'Penelitian', 3),
(15, 'CVCU', 3),
(16, 'IGD', 3),
(17, 'RSUB', 3),
(18, 'Diagnostik Invasif', 3),
(19, 'Integrasi Invasif', 4),
(20, 'Intgerasi Cardiac Intensive Care dan Ward', 4),
(21, 'Integrasi', 4),
(22, 'DNI', 4),
(23, 'RSUD dr Iskak', 4),
(24, 'Interasi Poli dan Konsulan ', 4),
(25, 'temp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stase_ppds`
--

CREATE TABLE `stase_ppds` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `id_stase` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stase_ppds`
--

INSERT INTO `stase_ppds` (`id`, `id_user`, `tanggal_mulai`, `tanggal_selesai`, `id_stase`, `keterangan`) VALUES
(99, 354, '2021-04-14', '0000-00-00', 1, ''),
(100, 355, '2021-04-14', '2021-04-14', 1, ''),
(101, 355, '2021-04-14', '2021-04-14', 2, ''),
(102, 355, '2021-04-14', '2021-04-14', 3, ''),
(103, 355, '2021-04-14', '2021-04-14', 4, ''),
(104, 355, '2021-04-14', '2021-04-14', 5, ''),
(105, 355, '2021-04-14', '2021-04-14', 6, ''),
(106, 355, '2021-04-14', '2021-04-14', 8, ''),
(107, 355, '2021-04-14', '2021-04-14', 7, ''),
(108, 355, '2021-04-14', '2021-04-14', 9, ''),
(109, 355, '2021-04-14', '2021-04-14', 11, ''),
(110, 355, '2021-04-14', '2021-04-14', 10, ''),
(111, 355, '2021-04-14', '2021-04-14', 12, ''),
(112, 355, '2021-04-14', '2021-04-14', 13, ''),
(113, 355, '2021-04-14', '2021-04-14', 14, ''),
(114, 355, '2021-04-14', '2021-04-14', 15, ''),
(115, 355, '2021-04-14', '2021-04-14', 16, ''),
(116, 355, '2021-04-14', '2021-04-14', 17, ''),
(117, 355, '2021-04-14', '2021-04-14', 18, ''),
(118, 355, '2021-04-14', '2021-04-14', 19, ''),
(119, 355, '2021-04-14', '2021-04-14', 20, ''),
(120, 355, '2021-04-14', '2021-04-14', 21, ''),
(121, 355, '2021-04-14', '2021-04-14', 22, ''),
(122, 355, '2021-04-14', '2021-04-14', 23, ''),
(123, 355, '2021-04-14', '2021-04-14', 24, ''),
(124, 358, '2021-04-14', '2021-04-19', 1, ''),
(125, 359, '2021-04-15', '2021-04-15', 1, ''),
(126, 359, '2021-04-15', '0000-00-00', 3, ''),
(127, 358, '2021-04-19', '2021-04-19', 3, ''),
(128, 358, '2021-04-19', '2021-04-19', 2, ''),
(129, 358, '2021-04-19', '2021-04-19', 4, ''),
(130, 358, '2021-04-19', '2021-04-19', 6, ''),
(131, 358, '2021-04-19', '2021-04-19', 5, ''),
(132, 358, '2021-04-19', '2021-04-19', 7, ''),
(133, 358, '2021-04-19', '2021-04-19', 8, 'llkokahsdasd'),
(134, 358, '2021-04-19', '2021-04-19', 9, ''),
(135, 358, '2021-04-19', '2021-04-19', 10, 'idoasdasld'),
(136, 358, '2021-04-19', '0000-00-00', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `tahap`
--

CREATE TABLE `tahap` (
  `id` int(11) NOT NULL,
  `tahap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahap`
--

INSERT INTO `tahap` (`id`, `tahap`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tahap_ppds`
--

CREATE TABLE `tahap_ppds` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `id_tahap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahap_ppds`
--

INSERT INTO `tahap_ppds` (`id`, `id_user`, `tanggal_mulai`, `tanggal_selesai`, `id_tahap`) VALUES
(57, 354, '2021-04-14', '0000-00-00', 1),
(58, 355, '2021-04-14', '2021-04-14', 1),
(59, 355, '2021-04-14', '2021-04-14', 2),
(60, 355, '2021-04-14', '2021-04-14', 3),
(61, 355, '2021-04-14', '2021-04-14', 4),
(62, 358, '2021-04-14', '2021-04-19', 1),
(63, 359, '2021-04-15', '0000-00-00', 1),
(64, 358, '2021-04-19', '2021-04-19', 2),
(65, 358, '2021-04-19', '0000-00-00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `id_ppds` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_stase` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jenis_tugas` int(11) NOT NULL,
  `file` text NOT NULL,
  `file_presentasi` text NOT NULL,
  `jadwal_sidang` datetime NOT NULL,
  `id_penguji_1` int(11) NOT NULL,
  `id_penguji_2` int(11) NOT NULL,
  `id_pembimbing_1` int(11) NOT NULL,
  `id_pembimbing_2` int(11) NOT NULL,
  `nilai_1` int(11) NOT NULL,
  `nilai_2` int(11) NOT NULL,
  `nilai_3` int(11) NOT NULL,
  `nilai_4` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `id_ppds`, `judul`, `id_stase`, `deskripsi`, `id_kategori`, `jenis_tugas`, `file`, `file_presentasi`, `jadwal_sidang`, `id_penguji_1`, `id_penguji_2`, `id_pembimbing_1`, `id_pembimbing_2`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `status`, `deleted_at`) VALUES
(108, 355, 'test ilmiah no.1 stase pembekalan', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula venenatis venenatis. Vestibulum ultrices ultrices ornare. Nunc sapien nisl, placerat in massa quis, blandit malesuada lectus. Ut vitae pretium tellus. Aenean nulla risus, sodales id porttitor in, rhoncus et leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ultrices vulputate nisi tincidunt aliquet.', 4, 1, '1618366122_a63d5643c66302c39532.pdf', '1618366122_aa165f676e8b703e6fc1.pptx', '2021-04-15 09:08:00', 0, 0, 328, 330, 0, 0, 100, 100, 0, '0000-00-00 00:00:00'),
(109, 355, 'Tugas besar no.1 stase IPD', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula venenatis venenatis. Vestibulum ultrices ultrices ornare. Nunc sapien nisl, placerat in massa quis, blandit malesuada lectus. Ut vitae pretium tellus. Aenean nulla risus, sodales id porttitor in, rhoncus et leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ultrices vulputate nisi tincidunt aliquet.', 8, 2, '1618368213_b7a061248e144287db27.pdf', '1618368213_1c5ecdd4f7b8b440ce83.pptx', '2021-04-16 09:42:00', 331, 357, 328, 330, 100, 100, 98, 95, 0, '0000-00-00 00:00:00'),
(110, 358, 'test ilmiah no.2 stase pembekalan', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula venenatis venenatis. Vestibulum ultrices ultrices ornare. Nunc sapien nisl, placerat in massa quis, blandit malesuada lectus. Ut vitae pretium tellus. Aenean nulla risus, sodales id porttitor in, rhoncus et leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ultrices vulputate nisi tincidunt aliquet.', 4, 1, '1618373887_159c1cfdfb0135c6e518.pdf', '1618373887_53e24cca7b50ea8ef59b.pptx', '2021-04-15 11:17:00', 0, 0, 328, 330, 0, 0, 87, 100, 0, '0000-00-00 00:00:00'),
(111, 358, 'test ilmiah no.3 stase pembekalan ', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula venenatis venenatis. Vestibulum ultrices ultrices ornare. Nunc sapien nisl, placerat in massa quis, blandit malesuada lectus. Ut vitae pretium tellus. Aenean nulla risus, sodales id porttitor in, rhoncus et leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ultrices vulputate nisi tincidunt aliquet.', 3, 1, '1618374523_924b7cf82de3db81b85e.pdf', '1618374523_4c05c994fc0d59f2f19a.pptx', '2021-04-19 11:28:00', 0, 0, 331, 330, 0, 0, 75, 90, 0, '0000-00-00 00:00:00'),
(112, 358, 'test tugas besar no.2 stase pembekalan', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula venenatis venenatis. Vestibulum ultrices ultrices ornare. Nunc sapien nisl, placerat in massa quis, blandit malesuada lectus. Ut vitae pretium tellus. Aenean nulla risus, sodales id porttitor in, rhoncus et leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ultrices vulputate nisi tincidunt aliquet.', 10, 2, '1618378295_01e42b0ed47e07fa0253.pdf', '1618378295_f85f931d019ad333599e.pptx', '2021-04-16 12:31:00', 331, 357, 328, 330, 88, 98, 95, 90, 0, '0000-00-00 00:00:00'),
(113, 359, 'judul ilmiah', 1, 'deskripsi', 3, 1, '1618475651_d53f954bb0da6822f950.xlsx', '1618475651_fa1183e0136e3fa026f2.pptx', '2021-05-29 20:00:58', 0, 0, 328, 330, 89, 90, 90, 90, 0, '0000-00-00 00:00:00'),
(114, 359, 'Judul Tugas', 1, 'Deskripsi', 4, 1, '1618475707_c4f37cf578d377c4c4e5.docx', '1618475707_becfc1d96c5d5a8a43e8.pdf', '2021-04-24 20:00:00', 0, 0, 328, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(115, 359, 'Judul Tugas', 1, 'Judul Tugas', 8, 2, '1618476299_e666d688dbc624b54215.docx', '1618476299_27f319380e16c7912fb7.pptx', '2021-04-16 15:43:00', 330, 331, 328, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_book`
--
ALTER TABLE `log_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi_sidang`
--
ALTER TABLE `presensi_sidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidang_ppds`
--
ALTER TABLE `sidang_ppds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stase`
--
ALTER TABLE `stase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stase_ppds`
--
ALTER TABLE `stase_ppds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahap`
--
ALTER TABLE `tahap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahap_ppds`
--
ALTER TABLE `tahap_ppds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `log_book`
--
ALTER TABLE `log_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `presensi_sidang`
--
ALTER TABLE `presensi_sidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sidang_ppds`
--
ALTER TABLE `sidang_ppds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stase`
--
ALTER TABLE `stase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stase_ppds`
--
ALTER TABLE `stase_ppds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tahap`
--
ALTER TABLE `tahap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tahap_ppds`
--
ALTER TABLE `tahap_ppds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
