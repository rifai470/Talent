-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 02:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talent`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 10),
(5, 1, 15),
(7, 1, 25),
(9, 1, 27),
(10, 3, 27),
(11, 1, 28),
(12, 1, 29),
(13, 1, 30),
(14, 2, 27),
(15, 2, 28),
(16, 2, 29),
(17, 2, 30),
(18, 2, 25),
(19, 1, 31),
(20, 1, 32),
(21, 4, 32),
(22, 4, 27),
(23, 1, 33),
(25, 1, 34),
(26, 1, 35),
(27, 1, 36),
(28, 1, 37),
(29, 1, 38),
(30, 1, 39),
(31, 1, 40),
(32, 1, 41),
(33, 1, 42);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `icon` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`, `icon`) VALUES
(1, 'Influencer', 'influencer.jpg'),
(2, 'MC', 'mc1.jpg'),
(3, 'Model', 'model.jpg'),
(4, 'Make Up', 'make up.jpg'),
(5, 'Fotografi', 'fotografi.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'Menu', 'kelolamenu', 'fa-circle', 10, 'y'),
(2, 'User Login', 'user', 'fa-circle', 10, 'y'),
(3, 'User Level', 'userlevel', 'fa-circle', 10, 'y'),
(10, 'Administrator', 'welcome', 'fa fa-user-alt', 0, 'y'),
(15, 'Hak Akses', 'tbl_hak_akses', 'fa-circle', 10, 'y'),
(33, 'Master Data', 'welcome', 'fa fa-archive', 0, 'y'),
(34, 'Talent List', 'Tbl_talent', 'fa fa-user-circle', 0, 'y'),
(35, 'Prestasi', 'Tbl_prestasi', 'fa fa-trophy', 33, 'y'),
(36, 'Photo', 'Tbl_photo', 'fa fa-picture-o', 33, 'y'),
(37, 'Tarif', 'Tbl_tarif', 'fa fa-money', 33, 'y'),
(38, 'Sosial Media', 'Tbl_sosmed', 'fa fa-address-card', 33, 'y'),
(39, 'Kategori', 'Tbl_kategori', 'fa fa-user-circle', 33, 'y'),
(42, 'Talent Verify', 'Tbl_talent_verify', 'fas fa-thumbs-up', 0, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE `tbl_photo` (
  `id_photo` int(11) NOT NULL,
  `photo` text DEFAULT NULL,
  `code_talent` varchar(9) NOT NULL,
  `SecLogUser` varchar(250) NOT NULL,
  `SecLogDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_photo`
--

INSERT INTO `tbl_photo` (`id_photo`, `photo`, `code_talent`, `SecLogUser`, `SecLogDate`) VALUES
(1, 'jihane.jpg', 'TLN-1', 'admin', '2022-01-14'),
(2, 'jihan.jpg', 'TLN-1', 'admin', '2022-01-14'),
(3, 'belinda.JPG', 'TLN-2', 'admin', '2022-01-14'),
(4, 'Puteri_Indonesia_Logo.png', 'TLN-3', 'admin', '2022-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prestasi`
--

CREATE TABLE `tbl_prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `prestasi` varchar(250) DEFAULT NULL,
  `code_talent` varchar(9) NOT NULL,
  `SecLogUser` varchar(250) NOT NULL,
  `SecLogDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prestasi`
--

INSERT INTO `tbl_prestasi` (`id_prestasi`, `prestasi`, `code_talent`, `SecLogUser`, `SecLogDate`) VALUES
(1, '<p><b>Putri Indonesia Jawa Tengah 2020<br>Putri Indonesia Pariwisata 2020<br>Miss Supranational Asia 2021</b></p>', 'TLN-1', 'admin', '2022-01-14'),
(2, '<p>-<br></p>', 'TLN-2', 'admin', '2022-01-14'),
(3, '', 'TLN-3', 'admin', '2022-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sosmed`
--

CREATE TABLE `tbl_sosmed` (
  `id_sosmed` int(11) NOT NULL,
  `instagram` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `other` text DEFAULT NULL,
  `code_talent` varchar(9) NOT NULL,
  `SecLogUser` varchar(250) NOT NULL,
  `SecLogDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sosmed`
--

INSERT INTO `tbl_sosmed` (`id_sosmed`, `instagram`, `facebook`, `twitter`, `other`, `code_talent`, `SecLogUser`, `SecLogDate`) VALUES
(1, 'https://www.instagram.com/jihanealmira/', '', 'https://twitter.com/jihanealmira_', '', 'TLN-1', 'admin', '2022-01-14'),
(2, '', '', '', '', 'TLN-2', 'admin', '2022-01-14'),
(3, '', '', '', '', 'TLN-3', 'admin', '2022-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `id_tags` int(11) NOT NULL,
  `tags` varchar(225) DEFAULT NULL,
  `SecLogUser` varchar(250) NOT NULL,
  `SecLogDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`id_tags`, `tags`, `SecLogUser`, `SecLogDate`) VALUES
(1, 'model', 'admin', '2022-01-14'),
(2, 'acting', 'admin', '2022-01-14'),
(3, 'doctor', 'admin', '2022-01-14'),
(4, 'sekolah', 'admin', '2022-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags_label`
--

CREATE TABLE `tbl_tags_label` (
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(100) NOT NULL,
  `id_tags` int(11) NOT NULL,
  `tag_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tags_label`
--

INSERT INTO `tbl_tags_label` (`rel_id`, `rel_type`, `id_tags`, `tag_order`) VALUES
(1, 'talent', 1, 1),
(1, 'talent', 2, 2),
(2, 'talent', 1, 1),
(2, 'talent', 2, 2),
(2, 'talent', 3, 3),
(3, 'talent', 1, 1),
(3, 'talent', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_talent`
--

CREATE TABLE `tbl_talent` (
  `id_talent` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `code_talent` varchar(9) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(2) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `hobby` text DEFAULT NULL,
  `pendidikan` varchar(250) NOT NULL,
  `pekerjaan` varchar(250) NOT NULL,
  `bahasa` varchar(150) NOT NULL,
  `tinggi_badan` int(5) NOT NULL,
  `berat_badan` int(5) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tentang` text DEFAULT NULL,
  `id_tarif` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `SecLogUser` varchar(250) NOT NULL,
  `SecLogDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_talent`
--

INSERT INTO `tbl_talent` (`id_talent`, `id_users`, `code_talent`, `nama`, `nama_panggilan`, `tempat`, `tanggal_lahir`, `usia`, `jenis_kelamin`, `hobby`, `pendidikan`, `pekerjaan`, `bahasa`, `tinggi_badan`, `berat_badan`, `id_kategori`, `tentang`, `id_tarif`, `status`, `SecLogUser`, `SecLogDate`) VALUES
(1, 0, 'TLN-1', 'JIHANE ALMIRA CHEDID', 'JIHANE', 'Jakarta', '2000-02-04', 21, 'Wanita', '-', 'Sarjana Design Grafis', 'Acting', 'Indonesia', 175, 52, 1, '-', 2, 'rejected', 'admin', '2022-01-14'),
(2, 0, 'TLN-2', 'BELINDA PRITASARI', 'BELINDA', 'Jakarta', '1994-08-06', 27, 'Wanita', '--', 'Sarjana Kedokteran', 'Doctor', 'Inggris', 171, 48, 1, '-', 2, 'inactive', 'admin', '2022-01-14'),
(3, 28, 'TLN-3', ' Lakky', 'lakky', 'Jakarta', '2022-01-13', 1, 'Pria', '-', 'Sarjana Design Grafis', 'Model', 'Indonesia', 175, 50, 1, '--', 1, 'active', 'admin', '2022-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tarif`
--

CREATE TABLE `tbl_tarif` (
  `id_tarif` int(11) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tarif`
--

INSERT INTO `tbl_tarif` (`id_tarif`, `tarif`) VALUES
(1, 20000),
(2, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `code` text NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  `cookie` varchar(255) NOT NULL,
  `perusahaan` varchar(100) DEFAULT NULL,
  `images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `username`, `password`, `nama_lengkap`, `kontak`, `id_user_level`, `code`, `is_aktif`, `cookie`, `perusahaan`, `images`) VALUES
(1, 'admin@gmail.com', '$2y$04$ynPLGl2vPQvwBpM40SiWn.QvTWqvxZW1AeFK.xz5.XrKI.UYBOtOy', 'admin', '', 1, '', 'y', 'zjPm8Sb9ewcGsY1GENRtwNSO2xXeLW3vQZtBfAFhopQIz9MUfKyi8JAakbXUdVn5', NULL, NULL),
(2, 'development@mustika-ratu.co.id', '$2y$04$ynPLGl2vPQvwBpM40SiWn.QvTWqvxZW1AeFK.xz5.XrKI.UYBOtOy', '', '', 1, '', 'y', '', NULL, NULL),
(3, 'elfarida@mustika-ratu.co.id', '$2y$04$qyvjI4N6zPYM0cs89zFvwu61vOeA9bpGwZvuBWunvbSijXA/4yeTW', '', '', 3, '', 'y', '', NULL, NULL),
(4, 'nisha.wulandari@mustika-ratu.co.id', '$2y$04$qyvjI4N6zPYM0cs89zFvwu61vOeA9bpGwZvuBWunvbSijXA/4yeTW', '', '', 4, '', 'y', '', 'PT. Mustika Ratu', NULL),
(5, 'iis@mustika-ratu.co.id', '$2y$04$qyvjI4N6zPYM0cs89zFvwu61vOeA9bpGwZvuBWunvbSijXA/4yeTW', '', '', 3, '', 'y', '', NULL, NULL),
(6, 'alfan.nr@mustika-ratu.co.id', '$2y$04$qyvjI4N6zPYM0cs89zFvwu61vOeA9bpGwZvuBWunvbSijXA/4yeTW', '', '', 4, '', 'y', '', 'PT. MECAYYA', NULL),
(7, 'lakky@gmail.com', '$2y$04$8l0e4aIGyk07Nd48VtEN7uh4ASJmbeELM5RmuR55aKECOaRiRG6Nu', '', '', 4, '', 'y', '', 'PT. MECCAYA', NULL),
(8, '', '$2y$04$gPSFs1yMm07A7PYYSaXeyeGyWuDaMRnXF2kHpFK4rxmxk/ErYHL/6', '', '', 3, '', 'y', '', NULL, NULL),
(9, 'demo@sehat.com', '$2y$04$zzRd70SxPba1yqi53D/nj.RnygQ4jHiIzOUSlyBFl4b.yoxlUPnZC', '', '', 5, '', 'y', '', 'Demo', NULL),
(10, 'daniel@mustika-ratu.co.id', '$2y$04$7crHBa9hRXahsW8WV./sz.lOcM.8DhdAK3H9M.X0.Z8d6OQR36jMG', '', '', 3, '', 'y', '', NULL, NULL),
(11, 'lakkyfdp@gmail.com', '$2y$04$vlveFXvw34H7TKghJvKxJurHSRVeygwHWccJSg/xCGamI0lOvVZva', 'Lakky FDP', '081234566543', 3, '40T6k25agniu16 Dlan8ayeR', 'n', '', NULL, NULL),
(12, 'lakkyfangestuu@gmail.com', '$2y$04$OUWE9r3tUyCWfMB.NPALmeCX3I.vfycoHg.dLnswhJyoIE.K5bbhi', 'lakkyfdp2', '087887448691', 3, 'Tuk8Ratg46sylmeiaunadn8k', 'n', '', NULL, NULL),
(13, 'kay@gmail.com', '$2y$04$MIxIbkUJ188LhRa79gTD4OGDdQrikvEa3NK0uHGXjRRGiZm6wPKve', 'kayy', '08123123123', 3, 'a21uminak2tatg1knyMeRTa1', 'y', '4mdwsGSsCDkFhl79DZbKvJLV8C51bPpgnGLfA95MqOXlEnxaRRd0PVyhjeTIvctz', NULL, NULL),
(14, 'b@gmail.com', '$2y$04$xwmYjlu5UCgw87fDo7jJ4OwrnG.z1lsf6VJTMsStgE.EF8J2/uJSi', 'b', '1234567', 4, 'ts6auM7atiegtTabknm3MteR', 'y', '', NULL, NULL),
(18, 'c@gmail.com', '$2y$04$v4757CL6IPovnnyo/aR/cusn0gnockNI9zjDfIvQxOnXGBzEuhGSq', 'c', '1234567', 3, 'ln726i3ea1ttaaRseuntt4Mc', 'n', '', NULL, NULL),
(19, 'd@gmail.com', '$2y$04$KUC.ROEt1o2CYyFPpEfo/Ogyoxorm8O1oE6thU0udiMMrItVgx3gm', 'd', '1234567', 3, 'nnds3tMaaeeMmatuTR7anl5u', 'n', '', NULL, NULL),
(21, 'e@gmail.com', '$2y$04$0HjWHa7eM2RWBO5jTWIhYO/WgTRWKmsVQLYsDGbhdpUVam9.RJcl2', 'e', '123243', 3, 'nal342i3neaRseneaTketmtM', 'n', '', NULL, NULL),
(27, 'helpdesk@mustika-ratu.co.id', '$2y$04$W2Oh99sXX3DYil0FvOX/0.szLrg9DhdVgFEs08X42ntW3Cmwg8JMG', 'tes', '08123123123', 4, 'ttMa3t1g1uaue8attsasen2k', 'y', '', NULL, NULL),
(28, 'lakkyfangestu@gmail.com', '$2y$04$S/bHWzWM/Kus79YFmb1Fb.uYjp/Q/4wQcSz.tMm4DF95G46JcU5pe', 'lakky', '1234567', 3, 'ktgaen5tat36lMlk1sRnn2mu', 'y', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Talent'),
(4, 'Client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_sosmed`
--
ALTER TABLE `tbl_sosmed`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`id_tags`);

--
-- Indexes for table `tbl_talent`
--
ALTER TABLE `tbl_talent`
  ADD PRIMARY KEY (`id_talent`);

--
-- Indexes for table `tbl_tarif`
--
ALTER TABLE `tbl_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sosmed`
--
ALTER TABLE `tbl_sosmed`
  MODIFY `id_sosmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id_tags` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_talent`
--
ALTER TABLE `tbl_talent`
  MODIFY `id_talent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tarif`
--
ALTER TABLE `tbl_tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
