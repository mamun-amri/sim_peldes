-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2021 at 11:23 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_peldes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accortolak`
--

CREATE TABLE `tbl_accortolak` (
  `id` int(11) NOT NULL,
  `penolak` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accortolak`
--

INSERT INTO `tbl_accortolak` (`id`, `penolak`, `keterangan`) VALUES
(4, 'RW', 'sadaga');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 1, 2),
(4, 1, 3),
(5, 1, 6),
(6, 1, 7),
(7, 1, 8),
(10, 3, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(19, 1, 18),
(20, 1, 22),
(22, 1, 20),
(23, 1, 19),
(24, 1, 23),
(25, 1, 24),
(26, 1, 25),
(27, 1, 26),
(28, 1, 27),
(29, 1, 29),
(30, 1, 28),
(31, 1, 30),
(32, 1, 1),
(33, 1, 9),
(34, 1, 10),
(35, 1, 31),
(36, 1, 32),
(37, 1, 33),
(38, 1, 34),
(40, 1, 36),
(41, 1, 37),
(42, 1, 38),
(43, 1, 39),
(44, 1, 40),
(45, 6, 41),
(47, 6, 43),
(49, 5, 45),
(50, 5, 46),
(51, 5, 47),
(52, 5, 48),
(53, 5, 50),
(54, 5, 49),
(55, 2, 1),
(56, 2, 7),
(57, 2, 10),
(58, 2, 11),
(59, 2, 12),
(60, 2, 13),
(61, 2, 14),
(62, 2, 15),
(63, 2, 16),
(64, 2, 17),
(65, 2, 18),
(66, 2, 20),
(68, 2, 22),
(69, 2, 23),
(70, 2, 34),
(72, 4, 9),
(73, 4, 36),
(74, 4, 37),
(75, 4, 38),
(76, 3, 7),
(77, 3, 8),
(79, 3, 13),
(80, 3, 11),
(81, 3, 14),
(82, 3, 15),
(83, 3, 16),
(84, 3, 17),
(85, 3, 20),
(87, 3, 22),
(88, 3, 23),
(89, 3, 34),
(90, 1, 51),
(91, 2, 51),
(92, 3, 51),
(93, 1, 52),
(94, 1, 53),
(95, 1, 54),
(96, 2, 52),
(97, 2, 53),
(98, 2, 54),
(99, 6, 1),
(100, 5, 1),
(101, 1, 55),
(102, 2, 55),
(103, 3, 55),
(104, 7, 56),
(105, 7, 1),
(106, 1, 56),
(108, 6, 35),
(109, 1, 57),
(110, 2, 57),
(111, 1, 58),
(112, 2, 58),
(113, 8, 1),
(115, 3, 1),
(127, 1, 60),
(128, 2, 60),
(129, 3, 60),
(130, 4, 60),
(131, 5, 60),
(132, 6, 60),
(133, 7, 60),
(134, 8, 60),
(135, 6, 61),
(136, 6, 62),
(137, 1, 63),
(138, 1, 64),
(139, 1, 65),
(140, 1, 66),
(141, 1, 67),
(142, 1, 68),
(143, 1, 69),
(144, 1, 70),
(145, 1, 71),
(146, 1, 72),
(147, 1, 73),
(148, 12, 64),
(149, 12, 4),
(150, 11, 64),
(151, 11, 69),
(152, 11, 70),
(153, 11, 71),
(154, 11, 72),
(155, 11, 73),
(156, 10, 73),
(157, 10, 72),
(158, 10, 71),
(159, 10, 70),
(160, 10, 69),
(161, 10, 64),
(162, 9, 4),
(163, 9, 2),
(164, 9, 70),
(165, 9, 71),
(166, 9, 72),
(167, 9, 73),
(168, 9, 64),
(169, 9, 69),
(170, 10, 2),
(171, 10, 4),
(172, 11, 2),
(173, 11, 4),
(174, 12, 2),
(175, 12, 69),
(176, 12, 75),
(177, 11, 75),
(178, 10, 75),
(179, 9, 75),
(180, 1, 75);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'Dashboard', 'dashboard', 'fa fa-dashboard', 0, 'y'),
(2, 'Administration', '#', 'fa fa-gear', 0, 'y'),
(3, 'kelola menu', 'kelolamenu', 'fa fa-server', 2, 'y'),
(4, 'kelola pengguna', 'user', 'fa fa-user', 2, 'y'),
(5, 'level pengguna', 'userlevel', 'fa fa-users', 2, 'y'),
(6, 'Setting', 'setting', 'fa fa-gears', 2, 'n'),
(64, 'warga', '#', 'fa fa-user', 0, 'y'),
(69, 'Kelola Pengajuan', 'pengajuan', 'fa fa-user', 64, 'y'),
(70, 'Data Pengajuan', '#', 'fa fa-server', 0, 'y'),
(71, 'data ktp', 'pengajuan_ktp', 'fa fa-user', 70, 'y'),
(72, 'data kk', 'pengajuan_kk', 'fa fa-user', 70, 'y'),
(73, 'data domisili', 'pengajuan_domisili', 'fa fa-user', 70, 'y'),
(75, 'Acc OR Tolak', 'accortolak', 'fa fa-user', 70, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nik` varchar(30) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `status_menikah` varchar(30) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `negara` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(30) NOT NULL,
  `rw` varchar(30) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `kec` varchar(30) NOT NULL,
  `kab` varchar(30) NOT NULL,
  `prov` varchar(30) NOT NULL,
  `kd_post` varchar(30) NOT NULL,
  `pengajuan` varchar(30) NOT NULL,
  `lampiran` text DEFAULT NULL,
  `acc_rt` text DEFAULT NULL,
  `acc_rw` text DEFAULT NULL,
  `acc_kepdes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id`, `nama`, `email`, `nik`, `no_kk`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `status_menikah`, `pekerjaan`, `agama`, `no_telp`, `negara`, `alamat`, `rt`, `rw`, `desa`, `kec`, `kab`, `prov`, `kd_post`, `pengajuan`, `lampiran`, `acc_rt`, `acc_rw`, `acc_kepdes`) VALUES
(4, 'MAE', 'mae@gmail.com', '350618', '350618', 'pr', 'SERANG', '18/08/1997', 'belum', 'MAHASISWI', 'ISLAM', '08767698643', 'INDONESIA', 'KP. PANDELEKAN', '006', '002', 'WARAKAS', 'BINUANG', 'SERANG', 'BANTEN', '71878', 'ktp', 'lampiran1625360391.png', 'acc', 'acc', 'acc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `pengunjung_ip` varchar(40) DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`pengunjung_id`, `pengunjung_tanggal`, `pengunjung_ip`, `pengunjung_perangkat`) VALUES
(1, '2019-05-30 14:18:16', '::1', 'Chrome'),
(2, '2019-02-14 02:42:02', '::1', 'Chrome'),
(3, '2019-02-15 12:30:47', '::1', 'Chrome'),
(4, '2019-02-16 01:54:25', '::1', 'Chrome'),
(5, '2019-02-17 06:17:49', '::1', 'Chrome'),
(6, '2019-02-26 04:18:51', '::1', 'Chrome'),
(7, '2019-02-28 12:46:48', '::1', 'Chrome'),
(8, '2019-03-01 04:17:56', '::1', 'Chrome'),
(9, '2019-03-04 11:44:25', '::1', 'Chrome'),
(10, '2019-03-05 01:10:43', '::1', 'Chrome'),
(11, '2019-03-06 12:34:53', '::1', 'Chrome'),
(12, '2019-03-07 11:07:09', '::1', 'Chrome'),
(13, '2019-03-08 01:45:03', '::1', 'Chrome'),
(14, '2019-03-09 04:12:10', '::1', 'Chrome'),
(15, '2019-03-11 02:25:00', '::1', 'Chrome'),
(16, '2019-03-13 07:52:31', '::1', 'Chrome');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  `nik` varchar(30) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `status_menikah` varchar(30) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `negara` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(30) NOT NULL,
  `rw` varchar(30) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `kec` varchar(30) NOT NULL,
  `kab` varchar(30) NOT NULL,
  `prov` varchar(30) NOT NULL,
  `kd_post` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `nama`, `email`, `password`, `images`, `id_user_level`, `is_aktif`, `nik`, `no_kk`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `status_menikah`, `pekerjaan`, `agama`, `no_telp`, `negara`, `alamat`, `rt`, `rw`, `desa`, `kec`, `kab`, `prov`, `kd_post`) VALUES
('123', 'Ma\'mun Amri', 'mamunamri97@gmail.com', 'Zn90', 'foto_profil1625321787.png', 1, 'y', '123', '123', 'lk', '123', '06/29/2021', 'belum', '123', '123', '123', '123', 'serang', '001', '002', 'warakas`', 'binuang', 'serang', 'banten', '1234'),
('350618', 'MAE', 'mae@gmail.com', 'Zn90', 'foto_profil1625363992.png', 12, 'y', '350618', '350618', 'pr', 'SERANG', '18/08/1997', 'belum', 'MAHASISWI', 'ISLAM', '08778787987', 'INDONESIA', 'KP. WULUH TENGAH', '006', '002', 'WARAKAS', 'BINUANG', 'SERANG', 'BANTEN', '209098'),
('360410', 'JESAN', 'jesan@gmail.com', 'Zn90', 'foto_profil1625364248.png', 10, 'y', '360410', '360410', 'lk', 'SERANG', '11/10/1956', 'kawin', 'RW', 'ISLAM', '08098090', 'INDONESIA', 'KP. PANDELEKAN KIDUL', '001', '002', 'WARAKAS', 'BINUANG', 'SERANG', 'BANTEN', '78798'),
('360411', 'A.Yamin', 'yamina@gmail.com', 'Zn90', 'foto_profil1625646475.png', 9, 'y', '360411', '360411', 'lk', 'Serang', '11/02/1956', 'kawin', 'Kepala Desa', 'Islam', '089908239823', 'Indonesia', 'Kp. Pandelekan', '006', '002', 'Warakas', 'Binuang', 'Serang', 'Banten', '98989'),
('36043', 'Amir', 'amir@gmail.com', 'Zn90', 'foto_profil1625362584.png', 11, 'y', '36043', '36043', 'lk', 'SERANG', '18/07/1975', 'kawin', 'RT', 'ISLAM', '089999798787', 'INDONESIA', 'KP. PANDELEKAN LOR', '006', '002', 'WARAKAS', 'BINUANG', 'SERANG', 'BANTEN', '29198'),
('36044', 'JUNED', 'juned@gmail.com', 'Zn90', 'foto_profil1625365365.png', 12, 'y', '36044', '36044', 'lk', 'SERANG', '14/07/2000', 'belum', 'SISWA', 'ISLAM', '088799887', 'INDONESIA', 'KP. WULUH TENGAH', '006', '002', 'WARAKAS', 'BINUANG', 'SERANG', 'BANTEN', '10982');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(9, 'Kelurahan'),
(10, 'RW'),
(11, 'RT'),
(12, 'Warga');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(0, 'da42a19acaaad3a41163c01af1acc1', '1908-0002', '2019-08-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accortolak`
--
ALTER TABLE `tbl_accortolak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`) USING BTREE;

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`) USING BTREE;

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
