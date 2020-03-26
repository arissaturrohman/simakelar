-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 01:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dispo`
--

CREATE TABLE `tb_dispo` (
  `id_dispo` int(11) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `batas_waktu` date NOT NULL,
  `isi_dispo` text NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dispo`
--

INSERT INTO `tb_dispo` (`id_dispo`, `tujuan`, `batas_waktu`, `isi_dispo`, `catatan`, `sifat`, `id`) VALUES
(1, 'Sekcam', '2020-03-24', 'TL', '-', 'Biasa', 39),
(2, 'Kasi Trantib', '2020-03-26', 'Tindaklanjuti', '-', 'Segera', 41);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluar`
--

CREATE TABLE `tb_keluar` (
  `id` int(11) NOT NULL,
  `no_keluar` varchar(10) NOT NULL,
  `tgl_agenda` date NOT NULL,
  `isi` text NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `kla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keluar`
--

INSERT INTO `tb_keluar` (`id`, `no_keluar`, `tgl_agenda`, `isi`, `tujuan`, `foto`, `kla`) VALUES
(4, '0001', '2020-03-24', ' Rakord Pencegahan Covid-19', 'Dinas Kesehatan', '25032020055236-covid.jpeg', '900');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kla`
--

CREATE TABLE `tb_kla` (
  `id` int(11) NOT NULL,
  `no_kla` varchar(20) NOT NULL,
  `uraian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kla`
--

INSERT INTO `tb_kla` (`id`, `no_kla`, `uraian`) VALUES
(1, '900', 'Keuangan'),
(2, '980', 'Kearsipan  '),
(3, '200', 'Keamanan'),
(4, '300', 'Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `id` int(11) NOT NULL,
  `no_masuk` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `isi` text NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tgl_agenda` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `kla` int(11) NOT NULL,
  `dispo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masuk`
--

INSERT INTO `tb_masuk` (`id`, `no_masuk`, `tgl_masuk`, `isi`, `asal`, `tgl_agenda`, `foto`, `kla`, `dispo`) VALUES
(39, '0001', '2020-03-24', '  Undangan SAKIP', 'Inspektorat', '2020-03-24', '24032020112206-img147.jpg', 980, ''),
(41, '0002', '2020-03-23', '  Undangan LK', 'Inspektorat', '2020-03-25', '25032020052556-UU.jpeg', 900, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_opd`
--

CREATE TABLE `tb_opd` (
  `id` int(11) NOT NULL,
  `opd` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ka_opd` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `web` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_opd`
--

INSERT INTO `tb_opd` (`id`, `opd`, `alamat`, `foto`, `ka_opd`, `nip`, `email`, `web`, `telp`) VALUES
(1, 'Kecamatan Gajah', 'Jl. Raya Gajah No. 45 Gajah Demak', '25032020025755-logo-demak.png', 'Drs. AGUNG WIDODO, MM', '19720401 199203 1 001', 'office.kec.gajah@gmail.com', 'http://kecgajah.demakkab.go.id/', '(0291) 685250');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `foto`) VALUES
(1, 'Arissatur Rohman', 'admin', '$2y$10$RwV8sz0iGdKR2yy2PQeesu1uw1rv7mQ.nwIF7X5q4ZuCGO3NIG8LW', 'Admin', '22022020143911-garuda.png'),
(2, 'Lisnawati', 'user', '$2y$10$xA9tZ93oGdD9kYJjH1PdVu9mzRcz/6XUWWV1gHg3ML4x0M/EewIje', 'User', '22022020144416-perdes.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dispo`
--
ALTER TABLE `tb_dispo`
  ADD PRIMARY KEY (`id_dispo`);

--
-- Indexes for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kla`
--
ALTER TABLE `tb_kla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_opd`
--
ALTER TABLE `tb_opd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dispo`
--
ALTER TABLE `tb_dispo`
  MODIFY `id_dispo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kla`
--
ALTER TABLE `tb_kla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_opd`
--
ALTER TABLE `tb_opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
