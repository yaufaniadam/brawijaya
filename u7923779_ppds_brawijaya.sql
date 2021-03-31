-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2021 at 09:54 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.3.6

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
(3, 'admin', 'admin', 'nova810301@gmail.com', '1613452811_5270dea979588bd04d3d.png', '$2y$10$2.n2b58qDdoZzoRdJwNEMuVE4ewa2EMTjqo.E5qO0PIZvTT1LjM2O', 1, 0, 0, 'w', '', '', '', '', '', '', '', '', '', '90877975567', '', '', 1, '', '', '', '2017-09-29 10:09:44', '2021-02-15 23:20:32'),
(328, 'drsaifurrohman', 'dr. M.Saifur Rohman, Sp.JP(K), PhD', 'maifurrohman@gmail.com', '1605497845_8c50490e7e0fd46fb801.png', '$2y$12$7imwoVdxgukLdHoYaYKv.u.etr05PEtpGRn/Yn06BgdOmyHhYwPXy', 3, 0, 1, 'p', 'Malang', 'Malang', '0813', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2020-11-09 19:59:53', '2021-02-04 19:29:00'),
(330, 'drardian', 'dr. Ardian Rizal Sp.JP(K)', 'drardianrizal@gmail.com', '1612595670_c855dc04d72d8078e215.jpg', '$2y$12$7imwoVdxgukLdHoYaYKv.u.etr05PEtpGRn/Yn06BgdOmyHhYwPXy', 3, 0, 3, 'w', 'Malang', 'Malang', '0812', '0812', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-01-08 02:06:38', '2021-02-06 01:14:30'),
(331, 'drsetyasih', 'dr. Setyasih Anjarwani, SpJP', 'setyasihanjarwani@gmail.com', '1612594838_d02ae97fb4756ffaa970.png', '$2y$10$JAFqpCsHbgrCnN.JyJlf9epsBqu1sJNAA035LGvYmY2oBXvh9GOo.', 3, 0, 13, 'w', 'Malang', 'Malang', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-01-08 02:07:08', '2021-02-06 01:00:38'),
(332, 'spv4', '', 'asasdas@asasd.asd', '', '$2y$10$4VwsVQMnBEsPFZJoqEWnDuSiwt34b9wLUj2hF.mk0W0RfQoH81Me2', 3, 0, 17, 'w', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '2021-01-08 02:07:38', '2021-01-08 02:07:38'),
(336, 'test2', 'ngetest register 2', 'test@test.com', '', '$2y$10$CRROUCBu/iuHWOGZpgfQwOdqLknaqJ57MJkL9EWtVW1uOaoz150oK', 4, 328, 0, 'p', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '2021-01-18 04:32:59', '2021-01-18 04:32:59'),
(337, 'test3', 'ngetest register 3', 'ngetest3@test.com', '', '$2y$10$APfE3G4wz2QZM97iySCebO9X2YXJWlSk.nn7uOpMj9K1dk3aQEfNO', 4, 331, 0, 'p', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '2021-01-18 04:34:44', '2021-01-18 04:34:44'),
(338, 'abcdefg', 'lkasdasd', 'skdas@sdasd.co', '', '$2y$10$XC2RAQLQpjEnbySdODajDet98Zzr4vwBlpMvxnfR7bdDx4mXN/lSa', 4, 332, 0, 'p', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '2021-01-18 04:36:51', '2021-01-18 04:36:51'),
(341, 'spv1', '', '-', '', '$2y$10$jplGTtPEqxSsFOnVww0f7.waSb9KRnKBZsY9ObKZxQV6MVQw7joL2', 3, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '2021-02-04 19:37:56', '2021-02-04 19:37:56'),
(342, 'testregist', 'dr. Faris Wahyu Nugroho', 'fariswahyunugroho@gmail.com', '', '$2y$12$7imwoVdxgukLdHoYaYKv.u.etr05PEtpGRn/Yn06BgdOmyHhYwPXy', 4, 328, 0, 'p', 'Kudus', '', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-02-04 19:59:44', '2021-02-04 20:01:21'),
(343, 'teguh', 'Teguh', 'teguhgnote2@gmail.com', '', '$2y$10$FTRi39NrJF5RCDNYerotgO2SBXnUKCvbNoisYsBwy7mXFhoegyGOu', 4, 330, 0, 'p', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-02-04 20:21:13', '2021-02-04 20:21:13'),
(344, 'drteguh', 'dr Teguh', 'nova81030@gmail.com', '', '$2y$10$neINzeg3VJCJ3QpbrpTL.uz6OE1UUDwlDCbOXhF7DZoLQ99PZpnOa', 4, 330, 0, 'p', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-02-04 20:21:41', '2021-02-04 20:21:41'),
(345, 'yaufaniadam', 'Yaufani Adam', 'yaufani@gmail.com', '', '$2y$10$IjQPunZHgdsSTX2qFsTlXOCOZB7ybca78C0Otk5LNWkiG6o/nAQEG', 4, 328, 0, 'p', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-02-04 20:26:54', '2021-02-04 20:26:54'),
(346, 'debug', 'debug akun', 'bokergaming002@gmail.com', '', '$2y$10$9X0pzhZi//7kgaSgMjzya.irdXCViIXKYT5d5kYNVpZuMVIxTuWo6', 4, 330, 0, 'p', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '2021-02-06 00:23:23', '2021-02-07 20:46:09'),
(347, 'nining', 'Nining', 'niningdwie@gmail.com', '', '$2y$10$ptJnwilkoosBnIMbEL60O.o/P.A1vKDZ.aHWLtr4TwiWW0gl5xcT.', 4, 328, 0, 'w', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '3qY84HBtVK1YusHvE2So2TmS/DwSoVEd7xGob2/yFzE=', '', '2021-02-07 20:29:53', '2021-02-07 20:29:53');

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
(9, 'test upload logbook', 'test upload logbook', 346, '2021-02-09', 'pasien logbook', 'l', 23, 'tindakan penanganan pasien');

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
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `sender`, `receiver`, `title`, `isi`, `tanggal`, `status`) VALUES
(47, 0, 339, 'stase selesai', 'ada telah menyelesaikan stase', '2021-02-05 02:53:18', 0),
(48, 0, 344, 'stase selesai', 'ada telah menyelesaikan stase', '2021-02-05 02:53:56', 0),
(49, 0, 344, 'stase selesai', 'ada telah menyelesaikan stase', '2021-02-06 04:40:03', 0),
(50, 0, 345, 'stase selesai', 'ada telah menyelesaikan stase', '2021-02-06 04:40:21', 0),
(51, 0, 330, 'Tugas Baru', 'http://miokardmalang.com/tugas/89', '2021-02-06 04:50:41', 1),
(52, 0, 331, 'Tugas Baru', 'http://miokardmalang.com/tugas/89', '2021-02-06 04:49:56', 0),
(53, 0, 331, 'Tugas Baru', 'http://miokardmalang.com/tugas/90', '2021-02-06 06:24:54', 0),
(54, 0, 328, 'Tugas Baru', 'http://miokardmalang.com/tugas/90', '2021-02-06 06:26:26', 1),
(55, 0, 346, 'stase selesai', 'ada telah menyelesaikan stase', '2021-02-06 06:27:03', 0),
(56, 0, 330, 'Tugas Baru', 'http://miokardmalang.com/tugas/91', '2021-02-06 06:31:54', 1),
(57, 0, 328, 'Tugas Baru', 'http://miokardmalang.com/tugas/91', '2021-02-06 06:32:16', 1),
(58, 0, 331, 'Tugas Baru', 'http://miokardmalang.com/tugas/91', '2021-02-06 06:31:13', 0),
(59, 0, 332, 'Tugas Baru', 'http://miokardmalang.com/tugas/91', '2021-02-06 06:31:13', 0),
(60, 0, 346, 'stase selesai', 'ada telah menyelesaikan stase', '2021-02-06 07:05:35', 0),
(61, 0, 328, 'Tugas Baru', 'http://miokardmalang.com/tugas/92', '2021-02-06 07:10:15', 1),
(62, 0, 331, 'Tugas Baru', 'http://miokardmalang.com/tugas/92', '2021-02-06 07:09:53', 0),
(63, 0, 330, 'Tugas Baru', 'http://miokardmalang.com/tugas/92', '2021-02-06 07:14:53', 1),
(64, 0, 341, 'Tugas Baru', 'http://miokardmalang.com/tugas/92', '2021-02-06 07:09:53', 0),
(65, 0, 330, 'Tugas Baru', 'http://miokardmalang.com/tugas/93', '2021-02-08 02:57:33', 0),
(66, 0, 328, 'Tugas Baru', 'http://miokardmalang.com/tugas/93', '2021-02-08 02:57:33', 0),
(67, 0, 328, 'Tugas Baru', 'http://miokardmalang.com/tugas/94', '2021-02-08 03:10:20', 0),
(68, 0, 330, 'Tugas Baru', 'http://miokardmalang.com/tugas/94', '2021-02-08 03:10:20', 0),
(69, 0, 330, 'Tugas Baru', 'http://miokardmalang.com/tugas/96', '2021-02-09 06:23:40', 0),
(70, 0, 331, 'Tugas Baru', 'http://miokardmalang.com/tugas/96', '2021-02-09 06:23:40', 0),
(71, 0, 328, 'Tugas Baru', 'http://miokardmalang.com/tugas/96', '2021-02-09 06:23:40', 0),
(72, 0, 332, 'Tugas Baru', 'http://miokardmalang.com/tugas/96', '2021-02-09 06:23:40', 0),
(73, 0, 328, 'Tugas Baru', 'http://miokardmalang.com/tugas/98', '2021-02-09 06:37:44', 0),
(74, 0, 330, 'Tugas Baru', 'http://miokardmalang.com/tugas/98', '2021-02-09 06:37:44', 0),
(75, 0, 331, 'Tugas Baru', 'http://miokardmalang.com/tugas/98', '2021-02-09 06:37:44', 0),
(76, 0, 332, 'Tugas Baru', 'http://miokardmalang.com/tugas/98', '2021-02-09 06:37:44', 0),
(77, 0, 346, 'stase selesai', 'ada telah menyelesaikan stase', '2021-02-16 04:42:56', 0),
(78, 0, 344, 'stase selesai', 'ada telah menyelesaikan stase', '2021-02-20 02:36:32', 0);

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
(7, 346, 92);

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
  `id_stase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stase_ppds`
--

INSERT INTO `stase_ppds` (`id`, `id_user`, `tanggal_mulai`, `tanggal_selesai`, `id_stase`) VALUES
(78, 339, '2021-02-05', '2021-02-05', 1),
(79, 342, '2021-02-05', '0000-00-00', 1),
(80, 344, '2021-02-05', '2021-02-05', 1),
(81, 339, '2021-02-05', '0000-00-00', 3),
(82, 344, '2021-02-05', '2021-02-06', 4),
(83, 345, '2021-02-05', '2021-02-06', 1),
(84, 344, '2021-02-06', '2021-02-20', 3),
(85, 345, '2021-02-06', '0000-00-00', 4),
(86, 346, '2021-02-06', '2021-02-06', 1),
(87, 346, '2021-02-06', '2021-02-06', 3),
(88, 346, '2021-02-06', '2021-02-16', 4),
(89, 347, '2021-02-08', '0000-00-00', 1),
(90, 343, '2021-02-16', '0000-00-00', 1),
(91, 346, '2021-02-16', '2021-02-16', 2),
(92, 346, '2021-02-16', '0000-00-00', 5),
(93, 344, '2021-02-20', '0000-00-00', 2);

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
(37, 329, '2020-11-10', '0000-00-00', 1),
(38, 333, '2021-01-18', '0000-00-00', 1),
(39, 334, '2021-01-18', '0000-00-00', 1),
(40, 335, '2021-01-18', '0000-00-00', 1),
(41, 336, '2021-01-18', '0000-00-00', 1),
(42, 337, '2021-01-18', '0000-00-00', 1),
(43, 338, '2021-01-18', '0000-00-00', 1),
(44, 339, '2021-01-18', '0000-00-00', 1),
(45, 340, '2021-01-20', '0000-00-00', 1),
(46, 339, '2021-02-05', '0000-00-00', 1),
(47, 342, '2021-02-05', '0000-00-00', 1),
(48, 344, '2021-02-05', '0000-00-00', 1),
(49, 345, '2021-02-05', '0000-00-00', 1),
(50, 346, '2021-02-06', '2021-02-16', 1),
(51, 347, '2021-02-08', '0000-00-00', 1),
(52, 343, '2021-02-16', '0000-00-00', 1),
(53, 346, '2021-02-16', '0000-00-00', 2);

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
(70, 329, 'asdasd', 1, 'asdasd', 3, 1, '1604976588_9d5656836c24313920f6.pdf', '1604976588_8eb6d3bd1a397048bb3e.pptx', '2020-11-18 17:00:00', 328, 0, 0, 0, 0, 0, 0, 0, 0, '2020-11-10 00:24:38'),
(71, 329, 'asasdf', 1, 'asdas', 3, 1, '1604994418_4ed3c3de01281af834b8.pdf', '1604994418_de4ba891c28575210039.pptx', '2020-11-25 19:00:00', 328, 0, 0, 0, 80, 75, 80, 80, 0, '0000-00-00 00:00:00'),
(72, 329, 'asdasdas', 1, 'asdasdas', 8, 2, '1610093295_0dc39db0f15103d30baa.pdf', '1610093295_ba81e896ddf382ba2fd2.pdf', '2021-01-15 15:08:00', 328, 330, 331, 332, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(73, 329, 'asdas', 1, 'dasdasda', 8, 2, '1610093358_2332b8746d625106d345.pdf', '1610093358_513d83e244625433bf8a', '2021-01-14 15:09:00', 328, 330, 331, 332, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(74, 329, 'asdasd', 1, 'asdasd', 8, 2, '1610093425_7b38441e83b82897eda7.pdf', '1610093425_1f44ab7b0e1d53fced7e.pdf', '2021-01-20 15:10:00', 328, 330, 331, 332, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(75, 329, 'zxczxczxc', 1, 'xcvxcvxcbvnfg', 4, 1, '1610613425_28e1651f841a9e9aa00d.pdf', '1610613425_1b00a554c0505a2779c8.pdf', '2021-01-29 15:36:00', 328, 330, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(76, 340, 'sdsdfsdfsd', 3, 'sdfsdfsdfsdf', 9, 2, '1612333413_663937458f54f638cc79.pdf', '1612333413_070c9255e12704c6af6d.pdf', '2021-02-09 13:22:00', 331, 332, 328, 330, 0, 0, 0, 0, 0, '2021-02-03 00:25:25'),
(77, 340, 'asdzxcZXCzxcxcvc', 3, 'zczXCZCZXcxvxc', 10, 2, '1612333604_151e4841293f470cda03.pdf', '1612333604_fbf710c481493d8306c9.pdf', '2021-02-05 13:25:00', 331, 332, 328, 330, 0, 0, 0, 0, 0, '2021-02-03 00:33:30'),
(78, 340, 'asdzxcZXCzxcxcvc', 3, 'zczXCZCZXcxvxc', 10, 2, '1612333965_a7636a71c5ac163b616a.pdf', '1612333965_65157b325dd97ba91e67.pdf', '2021-02-05 13:25:00', 331, 332, 328, 330, 0, 0, 0, 0, 0, '2021-02-03 00:33:33'),
(79, 340, 'XCZsdsdfsd', 3, 'ZXcdwefwefSCs', 9, 2, '1612334050_7bfc6c7be062fcb83666.pdf', '1612334050_f120595435fc769f7922.pdf', '2021-02-05 13:33:00', 331, 332, 328, 330, 0, 0, 0, 0, 0, '2021-02-03 01:36:55'),
(80, 340, 'XCZsdsdfsd', 3, 'ZXcdwefwefSCs', 9, 2, '1612334062_eca29ba247e262ca1abe.pdf', '1612334062_4a9e38f3600f896ad1a3.pdf', '2021-02-05 13:33:00', 331, 332, 328, 330, 0, 0, 0, 0, 0, '2021-02-03 01:36:59'),
(81, 340, 'asdaszxczx', 3, 'czxczxczsdaffd', 9, 2, '1612337857_e8e12be81229431ee726.pdf', '1612337857_6fd6653792bf0f27caa8.pdf', '2021-02-05 14:37:00', 332, 331, 328, 330, 0, 0, 0, 0, 0, '2021-02-03 02:46:19'),
(82, 340, 'asdaszxczx', 3, 'czxczxczsdaffd', 9, 2, '1612337873_212b1c85fded61cfd66d.pdf', '1612337873_a8d80f313048743bd689.pdf', '2021-02-05 14:37:00', 332, 331, 328, 330, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(83, 340, 'dsdsdfdxcvzvzdf', 3, 'dfgdfgdfgdfgdfger', 8, 2, '1612342014_3a7955680900dc63aea8.pdf', '1612342014_31b9d1cbc475df4fcbc1.pdf', '2021-02-11 15:46:00', 332, 331, 328, 330, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(84, 340, 'sdfsdfs', 3, 'dsdfsdfs', 9, 2, '1612343143_4d229c1b417066d81dc6.pdf', '1612343143_6c5c320d12fbe0411fb0.pdf', '2021-02-11 16:05:00', 332, 331, 328, 330, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(85, 340, 'dfxfghfgnvbnvb', 3, 'nvbnvdfgdfg', 9, 2, '1612428629_040bd9d6b4a3afd8b562.pdf', '1612428629_35dca62cf9566573ed8c.pdf', '2021-02-06 15:50:00', 331, 332, 328, 330, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(86, 340, 'ersrsfghdghg', 3, 'hgjghjfjhjh', 8, 2, '1612428946_4cd029ceb6ae7156e53b.pdf', '1612428946_0bc87808417eaec58886.pdf', '2021-02-05 15:55:00', 330, 332, 328, 331, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(87, 344, 'test ilmiah 1', 1, 'test ilmiah 1', 4, 1, '1612492077_db317e50e5bcc95c29e6.pdf', '1612492077_ccce442b5f5c78dcfb1e.pdf', '2021-02-07 09:27:00', 0, 0, 328, 331, 90, 70, 80, 90, 0, '0000-00-00 00:00:00'),
(88, 344, 'test tugas besar', 1, 'test tugas besar 1', 8, 2, '1612493104_0bc7b8755fd6084fb587.pdf', '1612493104_dd691ea474cdda4e0ee1.pdf', '2021-02-07 09:44:00', 330, 331, 328, 332, 80, 79, 76, 90, 0, '0000-00-00 00:00:00'),
(89, 344, 'test ilmiah 2', 3, 'test ilmiah 2', 6, 1, '1612586996_e388d6bf7097981e78d2.pdf', '1612586996_a9a46f05712e408a7ed4.pdf', '2021-02-08 11:49:00', 0, 0, 330, 331, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(90, 346, 'debug ilmiah', 1, 'debug ilmiah', 3, 1, '1612753914_f3e78cf8a0e676ffe74f.pdf', '1612592694_96f1a1507175705aec51.pdf', '2021-02-09 10:12:00', 0, 0, 328, 331, 0, 0, 0, 90, 0, '0000-00-00 00:00:00'),
(91, 346, 'fgdfgdsfgsd', 3, 'fgsdfgsrgsetry67u', 8, 2, '1612593073_6f2c8c1bfeb2e70c470c.pdf', '1612593073_c94ae7fac572acd1bd31.pdf', '2021-02-08 13:30:00', 331, 332, 330, 328, 0, 0, 90, 100, 0, '0000-00-00 00:00:00'),
(92, 346, 'asdasd', 4, 'asdzczxczdsddf', 9, 2, '1612595393_0b48868dacfb8fe803b3.pdf', '1612595393_f1f93c78a65566d3be08.pdf', '2021-02-12 14:07:00', 330, 341, 328, 331, 76, 0, 90, 0, 0, '0000-00-00 00:00:00'),
(93, 347, 'Ilmiah saya', 1, 'jhasdkahd', 3, 1, '1612753053_18c60935891449d76970.pdf', '1612753053_eb2bd9405786dd8ee1bd.pdf', '2021-02-13 09:57:00', 0, 0, 330, 328, 0, 0, 0, 0, 0, '2021-02-07 21:09:28'),
(94, 346, 'test upload presentasi', 4, 'sldmasdnASdm[adwqwd', 3, 1, '1612753820_665ca46bc3cb6380bf72.pdf', '1612753820_3b80d8fa441258f6eafa.pptx', '2021-02-09 10:10:00', 0, 0, 328, 330, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(95, 347, 'asd', 1, 'asd', 8, 2, '1612851764_d19a53a67deaf7fe5a4f', '1612851764_a2eb3fbb1663af13cabd', '2021-02-11 14:00:00', 331, 332, 328, 330, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(96, 347, 'asdasd', 1, 'asdasd', 8, 2, '1612851820_909a6e9a9bc75a9731fc.pdf', '1612851820_1ece171e1bb990b2c253.pdf', '0000-00-00 00:00:00', 330, 332, 328, 331, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(97, 347, 'asdads', 1, 'asd', 8, 2, '1612851870_03803449ab32e9a0ebe1', '1612851870_4c5f63e9f796c774923c', '2021-02-09 16:00:00', 328, 332, 330, 331, 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(98, 347, 'sdfsdf', 1, 'dsfsdf', 8, 2, '1612852664_29b39576f2a59a1d0d30.pdf', '1612852664_ce1b8a3594b1d8932bbf.pdf', '2021-02-20 17:00:00', 331, 332, 328, 330, 0, 0, 0, 0, 0, '2021-02-09 00:41:05');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `log_book`
--
ALTER TABLE `log_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `presensi_sidang`
--
ALTER TABLE `presensi_sidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tahap`
--
ALTER TABLE `tahap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tahap_ppds`
--
ALTER TABLE `tahap_ppds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
