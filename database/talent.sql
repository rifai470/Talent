-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 03:10 AM
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
(30, 1, 39);

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
(2, 'MC', 'mc.jpg'),
(3, 'Model', 'model.jpg'),
(4, 'Make Up', 'make up.jpg'),
(5, 'Fotografi', 'fotografi.jpg'),
(6, 'test', 'wilda2.jpg'),
(7, 'kecewa', 'kecewa.jpg'),
(10, 'bagus', 'bagus.jpg');

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
(34, 'Talent', 'Tbl_talent', 'fa fa-user-circle', 0, 'y'),
(35, 'Prestasi', 'Tbl_prestasi', 'fa fa-trophy', 33, 'y'),
(36, 'Photo', 'Tbl_photo', 'fa fa-picture-o', 33, 'y'),
(37, 'Tarif', 'Tbl_tarif', 'fa fa-money', 33, 'y'),
(38, 'Sosial Media', 'Tbl_sosmed', 'fa fa-address-card', 33, 'y'),
(39, 'Kategori', 'Tbl_kategori', 'fa fa-user-circle', 33, 'y');

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
(1, 'jihan2.jpg', 'TLN-1', 'admin', '2021-12-27'),
(3, 'putu.jpeg', 'TLN-2', 'admin', '2021-12-28'),
(4, 'belinda2.JPG', 'TLN-3', 'admin', '2021-12-29'),
(5, 'MEGHNA_SHARMA.jpg', 'TLN-4', 'admin', '2021-12-29'),
(6, 'KALISTA_ISKANDAR.jpg', 'TLN-5', 'admin', '2021-12-29'),
(7, 'ayu.png', 'TLN-6', 'admin', '2021-12-29'),
(8, 'ayu2.jpg', 'TLN-6', '', '0000-00-00'),
(9, 'jihan3.jpeg', 'TLN-1', '', '0000-00-00'),
(10, 'jihan4.png', 'TLN-1', '', '0000-00-00');

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
(1, 'Putri Indonesia Jawa Tengah 2020<br>Putri Indonesia Pariwisata 2020<br>Miss Supranational Asia 2021<br>', 'TLN-1', 'admin', '2021-12-27'),
(3, 'Putri Indonesia Bali 2020,<br>Putri Indonesia Lingkungan 2020<br>Miss International Indonesia 2020<br>', 'TLN-2', 'admin', '2021-12-28'),
(4, '<br>', 'TLN-3', 'admin', '2021-12-29'),
(5, 'Putri Indonesia Sumatera Utara 2020<br>Top 11 Puteri Indonesia 2020', 'TLN-4', 'admin', '2021-12-29'),
(6, 'Putri Indonesia Sumatera Barat 2020<br>3rd Runner up Puteri Indonesia 2021', 'TLN-5', 'admin', '2021-12-29'),
(7, '<p>Putri Indonesia 2020 (1st Place)<br>Miss Universe Indonesia 2020<br>Winner Face of Indonesia 2019<br>Winner Face of Asia 2019<br></p>', 'TLN-6', 'admin', '2021-12-29'),
(8, '<p>Putri Indonesia 2020 (1st Place)<br>Miss Universe Indonesia 2020<br>Winner Face of Indonesia 2019<br>Winner Face of Asia 2019<br></p>', 'TLN-7', 'admin', '2021-12-29');

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
(1, 'www.instagram.com/jihanealmira', 'www..facebook.com/jihanealmira.chedid.77', 'www.twitter.com/jihanealmira_', '', 'TLN-1', 'admin', '2021-12-27'),
(3, 'www.instagram.com/ayusarasw/', '', 'www.twitter.com/utaeeeeee', '', 'TLN-2', 'admin', '2021-12-28'),
(4, 'www.instagram.com/belindatirps', '', '', '', 'TLN-3', 'admin', '2021-12-29'),
(5, 'www.instagram.com/meghnavs', '', '', '', 'TLN-4', 'admin', '2021-12-29'),
(6, 'www.instagram.com/kalistaiskandar', '', '', '', 'TLN-5', 'admin', '2021-12-29'),
(7, 'www.instagram.com/ayumaulida97', '', '', '', 'TLN-6', 'admin', '2021-12-29'),
(8, 'www.instagram.com/ayumaulida97', '', '', '', 'TLN-7', 'admin', '2021-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `id_tags` int(11) NOT NULL,
  `tags` varchar(225) DEFAULT NULL,
  `code_talent` varchar(9) NOT NULL,
  `SecLogUser` varchar(250) NOT NULL,
  `SecLogDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`id_tags`, `tags`, `code_talent`, `SecLogUser`, `SecLogDate`) VALUES
(1, 'model', 'TLN-6', 'admin', '2021-12-29');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_talent`
--

CREATE TABLE `tbl_talent` (
  `id_talent` int(11) NOT NULL,
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
  `SecLogUser` varchar(250) NOT NULL,
  `SecLogDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_talent`
--

INSERT INTO `tbl_talent` (`id_talent`, `code_talent`, `nama`, `nama_panggilan`, `tempat`, `tanggal_lahir`, `usia`, `jenis_kelamin`, `hobby`, `pendidikan`, `pekerjaan`, `bahasa`, `tinggi_badan`, `berat_badan`, `id_kategori`, `tentang`, `id_tarif`, `SecLogUser`, `SecLogDate`) VALUES
(1, 'TLN-1', 'JIHANE ALMIRA CHEDID', 'JIHANE ', 'Jakarta', '2000-02-04', 21, 'Wanita', '-', 'Sarjana Design Grafis', 'Acting', 'Indonesia', 175, 52, 1, '--', 1, 'admin', '2021-12-27'),
(3, 'TLN-2', 'PUTU AYU SARASWATI', 'PUTU', 'Denpasar', '1997-07-06', 24, 'Wanita', '-', 'Sarjana Kedokteran', 'Model', 'Indonesia', 175, 50, 1, '-', 1, 'admin', '2021-12-28'),
(4, 'TLN-3', 'BELINDA PRITASARI  ', 'BELINDA', 'Jakarta', '1994-08-06', 27, 'Wanita', '-', 'Sarjana Kedokteran', 'Doctor', 'Inggris', 171, 48, 1, '--', 1, '', '2021-12-29'),
(5, 'TLN-4', 'MEGHNA SHARMA', 'MEGHNA ', 'Medan', '1995-11-06', 25, 'Wanita', '-', 'Sarjana Fashion Design', 'Host', 'Indonesia', 173, 55, 1, '--', 1, 'admin', '2021-12-29'),
(6, 'TLN-5', 'KALISTA ISKANDAR', 'KALISTA', 'Sumatra Barat', '1998-07-14', 23, 'Wanita', '-', 'Sarjana Hukum', 'Host', 'Indonesia', 175, 50, 1, '--', 1, 'admin', '2021-12-29'),
(7, 'TLN-6', ' AYU MAULIDA PUTRI ', 'AYU', 'Surabaya', '1997-07-11', 23, 'Wanita', '-', 'Sarjana Hukum', 'Modeling', 'Indonesia', 179, 54, 1, '--', 1, 'admin', '2021-12-29');

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
(1, 10000);

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
(10, 'daniel@mustika-ratu.co.id', '$2y$04$7crHBa9hRXahsW8WV./sz.lOcM.8DhdAK3H9M.X0.Z8d6OQR36jMG', '', '', 3, '', 'y', '', NULL, NULL);

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
(2, 'Admin');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sosmed`
--
ALTER TABLE `tbl_sosmed`
  MODIFY `id_sosmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id_tags` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_talent`
--
ALTER TABLE `tbl_talent`
  MODIFY `id_talent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_tarif`
--
ALTER TABLE `tbl_tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
