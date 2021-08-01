-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2021 pada 05.35
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
-- Database: `sosialrev`
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
(2, 6105, 'Febriansyah', 'L', 'Ds. Dersalam RT 01 RW 08 Kecamatan Bae', '08980695197', 333456, 'Aktif', '2021-08-01'),
(3, 2147483647, 'Rina', 'P', 'Ds. Dersalam RT 01 RW 06 Kec Bae', '08980695197', 333456, 'Aktif', '2021-08-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembaga`
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
-- Dumping data untuk tabel `lembaga`
--

INSERT INTO `lembaga` (`id`, `kdLembaga`, `nmLembaga`, `alamat`, `nmPimpinan`, `berkas`, `no_hp`, `no_rek`, `tgl`) VALUES
(2, 'LMB001', 'Yayasan Pita Kuning', 'Ds. Dersalam RT 01 RW 08 Kecamatan Bae Kudus', 'Hj. Nuryanti', 'Lembaga_Yayasan Pita Kuning.zip', '0898767234', '056785421', '2021-08-01'),
(3, 'LMB002', 'Yayasan Pelita Hati', 'Ds. Dersalam RT 01 RW 08 Kecamatan Bae', 'H. Nooryanto', 'Lembaga_Yayasan Pelita Hati.zip', '0898767234', '1234895', '2021-08-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jenis`
--

CREATE TABLE `mst_jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_jenis`
--

INSERT INTO `mst_jenis` (`id`, `nama`) VALUES
(8, 'Sosial Hukum'),
(9, 'Kesehatan'),
(10, 'Yatim'),
(11, 'Lingkungan');

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
  `berkas` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perseorangan`
--

INSERT INTO `perseorangan` (`id`, `kdPerseorangan`, `nama`, `jekel`, `alamat`, `berkas`, `no_hp`, `no_rek`, `tgl_daftar`) VALUES
(14, 'DPM001', 'Ali Zuhdi', 'L', 'Ds. Ploso', 'Perseorangan_Ali Zuhdi.zip', '08980695197', '0006576788', '2021-08-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
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
  `status` enum('T','P','A') DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `idLevel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `kdProgram`, `nmProgram`, `idLembaga`, `idJenis`, `gambar`, `keterangan`, `donasi`, `status`, `tgl_masuk`, `tgl_akhir`, `idLevel`) VALUES
(25, 'PLDN01', 'Donasi Oksigen & Masker Covid-19', 2, 9, 'Photo_PLDN01.jpg', 'Diajukan', '8000000', 'P', '2021-08-01', NULL, 1);

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
(8, 'Administrator Sistem', 'admin', 'admin', 'admin', 0, 'Aktif'),
(9, 'Febriansyah', 'ian', 'ian', 'donatur', 2, 'Aktif'),
(10, 'Ali Zuhdi', 'ali', 'ali', 'perseorangan', 14, 'Aktif'),
(11, 'Riani Putri', 'riani', 'riani', 'L-kasie', 2, 'Aktif'),
(12, 'Lania Widiastuti', 'lania', 'lania', 'L-seksie', 2, 'Aktif'),
(13, 'Rina', 'rina', 'rina', 'perseorangan', 3, 'Nonaktif');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mst_jenis`
--
ALTER TABLE `mst_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `perseorangan`
--
ALTER TABLE `perseorangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
