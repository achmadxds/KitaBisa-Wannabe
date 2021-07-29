-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2021 pada 04.27
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
  `status` int(11) NOT NULL COMMENT 'Pilih 1 & 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dana`
--

INSERT INTO `dana` (`id`, `idProgram`, `jumlah`, `status`) VALUES
(5, 13, 60000, 1),
(6, 13, 60000, 1),
(7, 13, 60000, 1),
(8, 13, 60000, 1);

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

--
-- Dumping data untuk tabel `donatur`
--

INSERT INTO `donatur` (`id`, `kdDonatur`, `nama`, `jekel`, `alamat`, `no_hp`, `id_chat`, `status`, `tgl_daftar`) VALUES
(1, 9999, 'Riani Widiastuti', 'P', 'Ds. Golantepus RT 01 RW 04', '08980695197', 111678, 'Aktif', '2021-07-24');

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
(1, 'LMB001', 'Yayasan Pelita Hati', 6, 'Ds. Mlati Norowito RT 01 RW 04 Kec. Kota Kudus', 'Hj. Nuryanti', 'Lembaga_Yayasan Pelita Hati.zip', '0898767234', '011897657', '2021-07-24');

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

--
-- Dumping data untuk tabel `perseorangan`
--

INSERT INTO `perseorangan` (`id`, `kdPerseorangan`, `nama`, `jekel`, `alamat`, `idJenis`, `berkas`, `no_hp`, `no_rek`, `tgl_daftar`) VALUES
(7, 'DPM001', 'rsdf', 'P', 'kjdfn', 5, 'a', '9048590845', '9340348', '2021-07-28'),
(11, 'DPM002', 'rsdf', 'P', 'kjdfn', 5, 'a', '9048590845', '9340348', '2021-07-28'),
(12, 'DPM003', 'rsdf', 'P', 'kjdfn', 5, 'Perseorangan_rsdf.zip', '9048590845', '9340348', '2021-07-28'),
(13, 'DPM004', 'Ali', 'L', 'Desa Panjunan', 5, 'Perseorangan_Ali.zip', '08980695197', '0006576788', '2021-07-29');

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
  `tgl_masuk` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `idLevel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `kdProgram`, `nmProgram`, `idLembaga`, `gambar`, `keterangan`, `donasi`, `status`, `tgl_masuk`, `tgl_akhir`, `idLevel`) VALUES
(13, 'PLDN13', 'Bagi Bagi Sembako', 1, 'Photo_PLDN13.jpg', 'Lokasi Sekitar Kudus', '600000', 'P', NULL, NULL, 1),
(19, 'PLDN14', 'Pembangunan Gedung Yatama', 1, 'Photo_PLDN14.png', 'Pembangunan Gedung yatama yayasan pelita hati', '90000000', 'P', '2021-07-29', NULL, 1),
(20, 'PLDN20', 'Bantuan Banjir Bandang', 13, 'Photo_PLDN20.png', 'Banjir bandang menimpa di daerah kudus bagian selatan. Mari bantu saudara kita yang terkena musibah', '5000000', 'P', '2021-07-29', '2021-08-07', 2),
(21, 'PLDN21', 'Donasi Oksigen & Masker Covid-19', 13, 'Photo_PLDN21.png', 'Coba coba', '2000000', 'T', '2021-07-29', '2021-08-07', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `idProgram` int(11) NOT NULL,
  `idDonatur` int(11) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('K','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `idProgram`, `idDonatur`, `nominal`, `tanggal`, `status`) VALUES
(8, 13, 1, 60000, '0000-00-00', 'K'),
(10, 10, 1, 1000, '2021-07-28', 'T'),
(11, 16, 1, 30000, '2021-07-28', 'K'),
(12, 19, 1, 5000000, '2021-07-29', 'T'),
(13, 19, 1, 5000000, '2021-07-29', 'T'),
(14, 20, 1, 300000, '2021-07-29', 'K');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('admin','perseorangan','L-kasie','L-seksie','donatur') NOT NULL,
  `idDaftar` int(11) NOT NULL DEFAULT 0,
  `status` enum('Aktif','Nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='komen';

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `idDaftar`, `status`) VALUES
(1, 'Administator Sistem', 'admin', 'admin', 'admin', 0, 'Aktif'),
(2, 'Riani', 'riani', 'riani', 'L-kasie', 1, 'Aktif'),
(3, 'Febrian', 'febrian', 'febrian', 'donatur', 1, 'Aktif'),
(4, 'Febrian', 'rian', 'rian', 'L-seksie', 1, 'Aktif'),
(5, 'Yudha Aris', 'yudha', 'yudha', 'perseorangan', 12, 'Aktif'),
(6, 'Ali Firdaus', 'ali', 'ali', 'perseorangan', 13, 'Aktif');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
