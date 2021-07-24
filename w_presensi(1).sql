-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2021 at 04:43 AM
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
-- Database: `w_presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `ID_absensi` bigint(20) NOT NULL,
  `kode_absen` varchar(35) NOT NULL,
  `tgl_kerja` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `foto_m` varchar(100) DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `foto_p` varchar(100) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `kinerja` varchar(300) DEFAULT NULL,
  `fileLain` text DEFAULT NULL,
  `kondisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`ID_absensi`, `kode_absen`, `tgl_kerja`, `jam_masuk`, `foto_m`, `jam_pulang`, `foto_p`, `file`, `kinerja`, `fileLain`, `kondisi`) VALUES
(1, 'aa', '2021-07-22', '03:32:04', 'Administator Sistem_jobdesk_2021-07-22.png', NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `d_absensi`
--

CREATE TABLE `d_absensi` (
  `ID_absensi` bigint(20) NOT NULL,
  `jam_kerja` time NOT NULL,
  `tgl_kerja` date NOT NULL,
  `kondisi` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_absensi`
--

INSERT INTO `d_absensi` (`ID_absensi`, `jam_kerja`, `tgl_kerja`, `kondisi`) VALUES
(1, '06:24:45', '2021-07-12', NULL),
(2, '06:26:38', '2021-07-12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `d_kinerja`
--

CREATE TABLE `d_kinerja` (
  `ID_kinerja` bigint(20) NOT NULL,
  `kode_absen` varchar(35) NOT NULL,
  `tgl_kerja` date NOT NULL,
  `kinerja` varchar(300) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `m_ip`
--

CREATE TABLE `m_ip` (
  `ID_IP` int(11) NOT NULL,
  `ip_address` varchar(40) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_ip`
--

INSERT INTO `m_ip` (`ID_IP`, `ip_address`, `lokasi`, `ket`) VALUES
(1, '18.90.100.20', 'Gedung C', 'Di Gedung C');

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

CREATE TABLE `users_group` (
  `idGroup` int(10) UNSIGNED NOT NULL,
  `nama` enum('ADMIN','DOSEN','KARYAWAN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`idGroup`, `nama`) VALUES
(1, 'ADMIN'),
(2, 'DOSEN'),
(3, 'KARYAWAN');

-- --------------------------------------------------------

--
-- Table structure for table `u_data`
--

CREATE TABLE `u_data` (
  `IDuser` int(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1=aktif, 0=tidak aktif',
  `idReg` int(9) NOT NULL,
  `user_group` enum('ADMIN','DOSEN','KARYAWAN') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_data`
--

INSERT INTO `u_data` (`IDuser`, `username`, `password`, `nama_user`, `status`, `idReg`, `user_group`) VALUES
(1, 'ADMIN', 'ADMIN', 'Administator Sistem', 1, 0, 'ADMIN'),
(2, 'sumaji', 'sandibaru', 'Sumaji Mantoman', 1, 2, 'DOSEN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`ID_absensi`);

--
-- Indexes for table `d_absensi`
--
ALTER TABLE `d_absensi`
  ADD PRIMARY KEY (`ID_absensi`),
  ADD KEY `kode_absen` (`jam_kerja`,`tgl_kerja`,`kondisi`);

--
-- Indexes for table `d_kinerja`
--
ALTER TABLE `d_kinerja`
  ADD PRIMARY KEY (`ID_kinerja`);

--
-- Indexes for table `m_ip`
--
ALTER TABLE `m_ip`
  ADD PRIMARY KEY (`ID_IP`);

--
-- Indexes for table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`idGroup`);

--
-- Indexes for table `u_data`
--
ALTER TABLE `u_data`
  ADD PRIMARY KEY (`IDuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `ID_absensi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `d_absensi`
--
ALTER TABLE `d_absensi`
  MODIFY `ID_absensi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `d_kinerja`
--
ALTER TABLE `d_kinerja`
  MODIFY `ID_kinerja` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_ip`
--
ALTER TABLE `m_ip`
  MODIFY `ID_IP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_group`
--
ALTER TABLE `users_group`
  MODIFY `idGroup` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `u_data`
--
ALTER TABLE `u_data`
  MODIFY `IDuser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
