-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2021 pada 11.41
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosial`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana`
--

CREATE TABLE `dana` (
  `id` int(11) NOT NULL,
  `idProgram` int(11) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donatur`
--

CREATE TABLE `donatur` (
  `id` int(11) NOT NULL,
  `kdDonatur` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `jekel` enum('P','L') DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `id_chat` int(10) DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembaga`
--

CREATE TABLE `lembaga` (
  `id` int(11) NOT NULL,
  `kdLembaga` varchar(10) NOT NULL,
  `nmLembaga` varchar(60) NOT NULL,
  `idJenis` int(2) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `nmPimpinan` varchar(40) NOT NULL,
  `berkas` text DEFAULT NULL,
  `no_hp` varchar(14) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lembaga`
--

INSERT INTO `lembaga` (`id`, `kdLembaga`, `nmLembaga`, `idJenis`, `alamat`, `nmPimpinan`, `berkas`, `no_hp`, `no_rek`, `tgl`) VALUES
(1, 'LMB001', 'Yayasan Pelita Hati', 6, 'Ds. Mlati Kidul RT 01 RW 04 Kec. Kota Kudus', 'Hj. Nuryanti', 'Lembaga_Yayasan Pelita Hati.zip', '0898767234', '011897657', '2021-07-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jenis`
--

CREATE TABLE `mst_jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jenis` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_jenis`
--

INSERT INTO `mst_jenis` (`id`, `nama`, `jenis`) VALUES
(2, 'Bencana', 1),
(3, 'Yatim', 1),
(4, 'Lansia', 1),
(5, 'Perseorangan', 0),
(6, 'Sosial', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perseorangan`
--

CREATE TABLE `perseorangan` (
  `id` int(11) NOT NULL,
  `kdPerseorangan` varchar(20) DEFAULT NULL,
  `nama` varchar(70) NOT NULL,
  `jekel` enum('P','L') NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `idJenis` int(2) NOT NULL,
  `berkas` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `kdProgram` varchar(20) NOT NULL,
  `nmProgram` varchar(75) NOT NULL,
  `idLembaga` int(11) DEFAULT NULL,
  `gambar` varchar(300) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `donasi` varchar(50) NOT NULL,
  `status` enum('T','P','A') DEFAULT NULL,
  `idLevel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `kdProgram`, `nmProgram`, `idLembaga`, `gambar`, `keterangan`, `donasi`, `status`, `idLevel`) VALUES
(8, 'PLDN01', 'Peduli Sosial', 24, 'Photo_PLDN01.jpg', 'ok', '10000000', 'A', 1),
(10, 'PLDN09', 'KAKA MERAPI', 18, 'Photo_PLDN09.png', 'Duh', '2000000', 'P', 1),
(11, 'PLDN11', 'MBUT TANCA', 18, 'Photo_PLDN11.jpg', 'HAH', '3000000', 'T', 1),
(12, 'PLDN12', 'Donasi Oksigen & Masker Covid-19', 1, 'Photo_PLDN12.jpg', 'Donasi akan disalurkan kepada mereka yang membutuhkan', '500000', 'T', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `idProgram` int(11) NOT NULL,
  `idDonatur` int(11) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `status` enum('K','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('admin','perseorangan','L-kasie','L-seksie','donatur','K-lembaga') NOT NULL,
  `idDaftar` int(11) NOT NULL DEFAULT 0,
  `status` enum('Aktif','Nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='komen';

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `idDaftar`, `status`) VALUES
(1, 'Administator Sistem', 'admin', 'admin', 'admin', 0, 'Aktif'),
(2, 'Riani', 'riani', 'riani', 'admin', 0, 'Aktif'),
(3, 'Febrian', 'febrian', 'febrian', 'L-kasie', 1, 'Aktif'),
(4, 'Febrian', 'rian', 'rian', 'L-seksie', 1, 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_jenis`
--
ALTER TABLE `mst_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perseorangan`
--
ALTER TABLE `perseorangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dana`
--
ALTER TABLE `dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mst_jenis`
--
ALTER TABLE `mst_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `perseorangan`
--
ALTER TABLE `perseorangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
