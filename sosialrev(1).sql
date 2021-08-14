-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2021 at 02:37 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosialrev`
--

-- --------------------------------------------------------

--
-- Table structure for table `dana`
--

CREATE TABLE `dana` (
  `id` int(11) NOT NULL,
  `idProgram` int(11) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'Pilih 1 & 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dana`
--

INSERT INTO `dana` (`id`, `idProgram`, `jumlah`, `status`) VALUES
(1, 1, 15000, 1),
(2, 1, 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `id` int(11) NOT NULL,
  `kdDonatur` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `jekel` enum('P','L') DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `id_chat` bigint(20) DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id`, `kdDonatur`, `nama`, `jekel`, `alamat`, `no_hp`, `id_chat`, `status`, `tgl_daftar`) VALUES
(2, 6105, 'Febriansyah', 'L', 'Ds. Dersalam RT 01 RW 08 Kecamatan Bae', '08980695197', 1625733126, 'Aktif', '2021-08-01'),
(3, 2147483647, 'Rina', 'P', 'Ds. Dersalam RT 01 RW 06 Kec Bae', '08980695197', 545425663, 'Aktif', '2021-08-01'),
(4, 610951, 'Ali Firdaus', 'L', 'Ds. Mlati Kidul RT 01 RW 04 Kec. Kota Kudus', '08980695197', 1715197608, 'Aktif', '2021-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `id` int(11) NOT NULL,
  `kdLembaga` varchar(10) NOT NULL,
  `nmLembaga` varchar(60) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `nmPimpinan` varchar(40) NOT NULL,
  `berkas` text DEFAULT NULL,
  `no_hp` varchar(14) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`id`, `kdLembaga`, `nmLembaga`, `alamat`, `nmPimpinan`, `berkas`, `no_hp`, `no_rek`, `tgl`) VALUES
(2, 'LMB001', 'Yayasan Pita Kuning', 'Ds. Dersalam RT 01 RW 08 Kecamatan Bae Kudus', 'Hj. Nuryanti', 'Lembaga_Yayasan Pita Kuning.zip', '0898767234', '056785421', '2021-08-01'),
(3, 'LMB002', 'Yayasan Pelita Hati', 'Ds. Dersalam RT 01 RW 08 Kecamatan Bae', 'H. Nooryanto', 'Lembaga_Yayasan Pelita Hati.zip', '0898767234', '1234895', '2021-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jenis`
--

CREATE TABLE `mst_jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_jenis`
--

INSERT INTO `mst_jenis` (`id`, `nama`) VALUES
(8, 'Sosial Hukum'),
(9, 'Kesehatan'),
(10, 'Yatim'),
(11, 'Lingkungan');

-- --------------------------------------------------------

--
-- Table structure for table `perseorangan`
--

CREATE TABLE `perseorangan` (
  `id` int(11) NOT NULL,
  `kdPerseorangan` varchar(20) DEFAULT NULL,
  `nama` varchar(70) NOT NULL,
  `jekel` enum('P','L') NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `berkas` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perseorangan`
--

INSERT INTO `perseorangan` (`id`, `kdPerseorangan`, `nama`, `jekel`, `alamat`, `berkas`, `no_hp`, `no_rek`, `tgl_daftar`) VALUES
(14, 'DPM001', 'Ali Zuhdi', 'L', 'Ds. Ploso', 'Perseorangan_Ali Zuhdi.zip', '08980695197', '0006576788', '2021-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `kdProgram` varchar(20) NOT NULL,
  `nmProgram` varchar(75) NOT NULL,
  `idLembaga` int(11) DEFAULT NULL,
  `idJenis` int(11) DEFAULT NULL,
  `gambar` varchar(300) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `donasi` varchar(50) NOT NULL,
  `jumlah` bigint(20) NOT NULL DEFAULT 0,
  `status` enum('T','P','A') DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `idLevel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `kdProgram`, `nmProgram`, `idLembaga`, `idJenis`, `gambar`, `keterangan`, `donasi`, `jumlah`, `status`, `tgl_masuk`, `tgl_akhir`, `idLevel`) VALUES
(1, 'PLDN01', 'Bansos 2022', 14, 8, 'Photo_PLDN01_perseorangan.png', 'KAKAKA', '1000000', 15000, 'A', '2021-08-06', '2021-08-09', 2),
(3, 'PLDN02', 'Donasi Sembako', 14, 9, 'Photo_PLDN02_perseorangan.png', 'Donasi Sembako untuk mereka terdampak covid', '500000', 0, 'A', '2021-08-06', '2021-08-13', 2),
(4, 'PLDN03', 'Pembagian Vitamin A & C', 14, 9, 'Photo_PLDN03_perseorangan.png', 'Disalurkan kepada yang lagi menjalani masa isolasi mandiri', '400000', 0, 'P', '2021-08-06', '2021-08-13', 2),
(5, 'PLDN04', 'Bantuan Banjir Bandang', 2, 9, 'Photo_PLDN04_Lembaga.png', 'kdjsmfl', '100000', 15000, 'A', '2021-08-07', '2021-08-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `idProgram` int(11) NOT NULL,
  `idDonatur` int(11) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti_transfer` varchar(225) DEFAULT NULL,
  `status` enum('K','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `idProgram`, `idDonatur`, `nominal`, `tanggal`, `bukti_transfer`, `status`) VALUES
(23, 4, 3, 100000, '2021-08-13', '', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('admin','perseorangan','donatur','O-pimpinan','O-admin') NOT NULL,
  `idDaftar` int(11) NOT NULL DEFAULT 0,
  `status` enum('Aktif','Nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='komen';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `idDaftar`, `status`) VALUES
(8, 'Administrator Sistem', 'admin', 'admin', 'admin', 0, 'Aktif'),
(9, 'Febriansyah', 'ian', 'ian', 'donatur', 2, 'Aktif'),
(10, 'Ali Zuhdi', 'ali', 'ali', 'perseorangan', 14, 'Aktif'),
(11, 'Riani Putri', 'riani', 'riani', 'O-pimpinan', 2, 'Aktif'),
(12, 'Lania Widiastuti', 'lania', 'lania', 'O-admin', 2, 'Aktif'),
(14, 'rina', 'rina', 'rina', 'donatur', 3, 'Aktif'),
(15, 'Ali Firdaus', 'alif', 'alif', 'perseorangan', 4, 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_jenis`
--
ALTER TABLE `mst_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perseorangan`
--
ALTER TABLE `perseorangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT for table `dana`
--
ALTER TABLE `dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_jenis`
--
ALTER TABLE `mst_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `perseorangan`
--
ALTER TABLE `perseorangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
