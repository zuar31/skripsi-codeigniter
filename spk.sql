-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Mei 2020 pada 12.04
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `alamat`, `username`, `password`) VALUES
(1, 'admin', 'asds', 'admin', '202cb962ac59075b964b07152d234b70'),
(2, 'admin Dua', 'alamt', 'admin2', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_idskmeans`
--

CREATE TABLE `rekap_idskmeans` (
  `id` int(11) NOT NULL,
  `periode_awal` datetime NOT NULL,
  `periode_akhir` datetime NOT NULL,
  `jumlah_alert` double NOT NULL,
  `high` double NOT NULL,
  `medium` double NOT NULL,
  `low` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap_idskmeans`
--

INSERT INTO `rekap_idskmeans` (`id`, `periode_awal`, `periode_akhir`, `jumlah_alert`, `high`, `medium`, `low`) VALUES
(11, '2020-01-09 00:00:00', '2020-01-09 23:59:00', 5, 60, 20, 20),
(12, '2020-01-08 00:00:00', '2020-01-08 23:59:00', 10, 50, 30, 20),
(13, '2020-01-07 00:00:00', '2020-01-07 23:59:00', 6, 66.666666666667, 16.666666666667, 16.666666666667),
(14, '2020-01-27 00:00:00', '2020-01-27 11:59:00', 10, 10, 70, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `role` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 'Admin', 'admin'),
(2, 'operator', '25d55ad283aa400af464c76d713c07ad', 'Operator', 'operator');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_acid_event`
--
CREATE TABLE `view_acid_event` (
`sid` int(10) unsigned
,`cid` int(10) unsigned
,`signature` int(10) unsigned
,`sig_name` varchar(255)
,`sig_class_id` int(10) unsigned
,`sig_priority` int(10) unsigned
,`timestamp` datetime
,`ip_src` int(10) unsigned
,`ip_dst` int(10) unsigned
,`ip_proto` int(11)
,`layer4_sport` int(10) unsigned
,`layer4_dport` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_iphdr`
--
CREATE TABLE `v_iphdr` (
`sid` int(10) unsigned
,`cid` int(10) unsigned
,`ip_src` int(10) unsigned
,`ip_dst` int(10) unsigned
,`ip_ver` tinyint(3) unsigned
,`ip_hlen` tinyint(3) unsigned
,`ip_tos` tinyint(3) unsigned
,`ip_len` smallint(5) unsigned
,`ip_id` smallint(5) unsigned
,`ip_flags` tinyint(3) unsigned
,`ip_off` smallint(5) unsigned
,`ip_ttl` tinyint(3) unsigned
,`ip_proto` tinyint(3) unsigned
,`ip_csum` smallint(5) unsigned
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_acid_event`
--
DROP TABLE IF EXISTS `view_acid_event`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_acid_event`  AS  select `snort`.`acid_event`.`sid` AS `sid`,`snort`.`acid_event`.`cid` AS `cid`,`snort`.`acid_event`.`signature` AS `signature`,`snort`.`acid_event`.`sig_name` AS `sig_name`,`snort`.`acid_event`.`sig_class_id` AS `sig_class_id`,`snort`.`acid_event`.`sig_priority` AS `sig_priority`,`snort`.`acid_event`.`timestamp` AS `timestamp`,`snort`.`acid_event`.`ip_src` AS `ip_src`,`snort`.`acid_event`.`ip_dst` AS `ip_dst`,`snort`.`acid_event`.`ip_proto` AS `ip_proto`,`snort`.`acid_event`.`layer4_sport` AS `layer4_sport`,`snort`.`acid_event`.`layer4_dport` AS `layer4_dport` from `snort`.`acid_event` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_iphdr`
--
DROP TABLE IF EXISTS `v_iphdr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_iphdr`  AS  select `snort`.`iphdr`.`sid` AS `sid`,`snort`.`iphdr`.`cid` AS `cid`,`snort`.`iphdr`.`ip_src` AS `ip_src`,`snort`.`iphdr`.`ip_dst` AS `ip_dst`,`snort`.`iphdr`.`ip_ver` AS `ip_ver`,`snort`.`iphdr`.`ip_hlen` AS `ip_hlen`,`snort`.`iphdr`.`ip_tos` AS `ip_tos`,`snort`.`iphdr`.`ip_len` AS `ip_len`,`snort`.`iphdr`.`ip_id` AS `ip_id`,`snort`.`iphdr`.`ip_flags` AS `ip_flags`,`snort`.`iphdr`.`ip_off` AS `ip_off`,`snort`.`iphdr`.`ip_ttl` AS `ip_ttl`,`snort`.`iphdr`.`ip_proto` AS `ip_proto`,`snort`.`iphdr`.`ip_csum` AS `ip_csum` from `snort`.`iphdr` where 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap_idskmeans`
--
ALTER TABLE `rekap_idskmeans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rekap_idskmeans`
--
ALTER TABLE `rekap_idskmeans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
