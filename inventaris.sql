-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2019 pada 12.55
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_peminjaman` varchar(10) NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `jumlah_pinjam` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail_pinjam`, `id_peminjaman`, `id_inventaris`, `jumlah_pinjam`, `created_at`, `updated_at`) VALUES
(42, 'HFBx', 14, 10, '2019-02-11 21:05:30', '2019-02-11 21:05:30'),
(44, 'kzu7', 14, 10, '2019-02-11 21:14:45', '2019-02-11 21:14:45'),
(45, 'gCMS', 14, 10, '2019-02-11 22:11:01', '2019-02-11 22:11:01'),
(46, 'QzwZ', 14, 10, '2019-02-11 22:52:19', '2019-02-11 22:52:19'),
(47, 'ULpD', 14, 70, '2019-02-11 22:55:08', '2019-02-11 22:55:08'),
(48, 'VRFg', 15, 10, '2019-02-12 09:05:21', '2019-02-12 09:05:21'),
(49, 'uXJX', 15, 10, '2019-02-12 09:07:12', '2019-02-12 09:07:12'),
(50, 'xLLP', 17, 10, '2019-02-12 09:19:57', '2019-02-12 09:19:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `id_jenis` int(10) DEFAULT NULL,
  `tanggal_register` date NOT NULL,
  `id_ruang` int(10) DEFAULT NULL,
  `kode_inventaris` varchar(100) NOT NULL,
  `id_petugas` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `image`, `nama`, `kondisi`, `keterangan`, `jumlah`, `id_jenis`, `tanggal_register`, `id_ruang`, `kode_inventaris`, `id_petugas`, `created_at`, `updated_at`) VALUES
(14, '1549943668.jpg', 'Mouse SPC', 'Normal', 'Test', 10, 12, '2019-02-12', 11, 'gQoTn', 6, '2019-02-11 20:54:28', '2019-02-12 09:21:14'),
(15, '1549943696.jpg', 'Monitor LG', 'Normal', 'Test', 90, 9, '2019-02-12', 14, 'Ce49a', 7, '2019-02-11 20:54:56', '2019-02-12 09:07:12'),
(16, '1549987325.jpg', 'Headset Sades', 'Normal', 'Test', 100, 9, '2019-02-12', 14, 'YWrwS', 6, '2019-02-12 09:02:05', '2019-02-12 09:02:05'),
(17, '1549988333.jpg', 'flashdisk', 'normal', 'Test', 100, 9, '2019-02-12', 10, 'knht3', 6, '2019-02-12 09:18:53', '2019-02-12 09:20:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(1000) NOT NULL,
  `kode_jenis` varchar(100) NOT NULL,
  `keterangan` varchar(10000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, 'Aksesoris Komputer', 'N89TBH', 'Test', '2019-01-24 04:14:34', '2019-01-24 04:14:34'),
(9, 'Perangkat Elektronik Komputer', 'N27HBC', 'Test', '2019-01-27 10:39:28', '2019-01-27 03:39:28'),
(12, 'Buku', 'N27HBC', 'test', '2019-01-27 07:30:47', '2019-01-27 07:30:47'),
(13, 'Alat Bersih', 'N27HBC', 'test', '2019-01-27 07:31:02', '2019-01-27 07:31:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(3, 'Administrator'),
(4, 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `gambar_pegawai` varchar(40) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `gambar_pegawai`, `nip`, `alamat`, `username`, `password`, `created_at`, `updated_at`) VALUES
(7, 'Bakhrul Bila', '1549346251.jpg', '0002850363', 'Lemahbang', 'bakhrul', '$2y$10$47xbqspmJxIy2KjgBxtQZOpNXgscjrLxMbyFfRkGAaH8egcbHBgJu', '2019-02-09 04:59:17', '2019-02-08 21:59:17'),
(9, 'Pak Arif', '1549346314.jpg', '03383838', 'Test', 'arif', '$2y$10$4YK3OrgHobPs8qN.5AJnF.v5pIKZiYiiVR3yj/1AOIoaaCxZY6MO2', '2019-02-11 07:08:03', '2019-02-11 00:08:03'),
(11, 'Pak Erik', '1549346724.jpg', '03383837', 'Test', 'erik', '$2y$10$tXhqGectvqm4xLLmDt8hze9Epxg0PzhRtDBdewQ0rnHrxM04WTovS', '2019-02-11 07:14:30', '2019-02-11 00:14:30'),
(13, 'operatordemo', '1549924597.jpg', '0002850363', 'Purwosari', 'operatordemo', '$2y$10$lJmNEFAmUvuD3ZseVbU7g.acZ5Lvvrw4L3..n8jtDguDfhM3qgIhm', '2019-02-11 23:35:17', '2019-02-11 16:35:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `gambar_peminjam` varchar(100) DEFAULT NULL,
  `nip_nis` varchar(50) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `nama_peminjam`, `gambar_peminjam`, `nip_nis`, `alamat`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(5, 'Muhammad Bakhrul Bila Sakhil', '1549150501.jpg', '000284747', 'Lemahbang', 'bakhrul', '$2y$10$g9Cj.Me.Ba/BDIupAgdkX.i8/jPFAqgUxLioFcmAiNBu0rgT8iT9i', 'bakhrul@gmail.com', '2019-02-12 03:33:31', '2019-02-08 21:54:18'),
(13, 'userdemo', '1549924669.jpg', '0002850363', 'Purwosari', 'userdemo', '$2y$10$5XEIz43LCM5nyNEGjkyLjebYegbQF0DZHRADw3M5e.CZ6Ae3vHwAy', 'userdemo@gmail.com', '2019-02-12 03:38:57', '2019-02-11 16:35:35'),
(14, 'demo', '1549942857.jpg', '0002850363', 'Purwosari', 'demo', '$2y$10$zkzu05KdGo/xYYBjuvfcs.VoAjRY00q2GWC.gwh5Z47zbuvb.p2J2', 'demo@gmail.com', '2019-02-12 03:46:20', '2019-02-11 20:46:20'),
(15, 'isyana sarasvati', '1549943368.jpg', '0002850363', 'Purwosari', 'isyana', '$2y$10$QtPTPdluixaD1jHkedVcWOtiCfp.hizL3X6MzpC.9Sv99S/GyJ7wa', 'isyana@gmail.com', '2019-02-11 20:49:28', '2019-02-11 20:49:28'),
(17, 'userdemo', NULL, '000285', 'test', 'test', '$2y$10$G4xznO6orPVlMn3c7Dd1l.2Zif4c1//anImhyn9RUYSjdd1ioV.eW', 'test@heheheh.com', '2019-02-11 21:16:19', '2019-02-11 21:16:19'),
(18, 'demosecond', '1549948181.jpg', '0002850363', 'test', 'demosecond', '$2y$10$TXQCzbqSWrr6id7pXUsh5OzpFyMF3hC4Y1x/22SixvH3yNZX4Z/EO', 'demo1@gmail.com', '2019-02-11 22:09:41', '2019-02-11 22:09:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_peminjaman` varchar(50) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nama_barang`, `nama_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `id_pegawai`, `created_at`, `updated_at`) VALUES
('gCMS', 'Mouse SPC', 'demosecond', '2019-02-12', '2019-02-14', 'Belum Kembali', 11, '2019-02-11 22:11:00', '2019-02-11 22:11:00'),
('HFBx', 'Mouse SPC', 'Bakhrul', '2019-02-12', '2019-02-14', 'Belum Kembali', 7, '2019-02-11 21:05:30', '2019-02-11 21:05:30'),
('kzu7', 'Mouse SPC', 'test', '2019-02-12', '2019-02-13', 'Kembali', 13, '2019-02-11 21:14:44', '2019-02-11 21:15:00'),
('QzwZ', 'Mouse SPC', 'demo', '2019-02-12', '2019-02-12', 'Kembali', 7, '2019-02-11 22:52:18', '2019-02-12 09:21:14'),
('ULpD', 'Mouse SPC', 'demo', '2019-02-12', '2019-02-13', 'Belum Kembali', 7, '2019-02-11 22:55:07', '2019-02-11 22:55:07'),
('uXJX', 'Monitor LG', 'userdemo', '2019-02-12', '2019-02-13', 'Belum Kembali', 11, '2019-02-12 09:07:12', '2019-02-12 09:07:12'),
('VRFg', 'Monitor LG', 'Dimas Nury', '2019-02-12', '2019-02-13', 'Kembali', 13, '2019-02-12 09:05:20', '2019-02-12 09:05:45'),
('xLLP', 'flashdisk', 'Muhammad Bakhrul', '2019-02-12', '2019-02-14', 'Kembali', 11, '2019-02-12 09:19:57', '2019-02-12 09:20:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `gambar_petugas` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `id_level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `alamat`, `gambar_petugas`, `username`, `password`, `nama_petugas`, `nip`, `id_level`, `created_at`, `updated_at`) VALUES
(6, 'Lemahbang', '1549164340.jpg', 'administrator', '$2y$10$8gx2ErqFMnRrWUGdv0mvReopY0VmW1oRDU/bO4ioJgnh3aoNimY1q', 'Bakhrul Bila', '19850313', 3, '2019-02-09 04:16:32', '2019-02-08 21:16:32'),
(7, 'Purwosari', '1549198358.jpg', 'radit', '$2y$10$EGlpOgTCn/Qz2pyey8ADNutnRe0a2uP24PXZAYKYYFvX4D4zrWdwa', 'Raditya', '2222222', 4, '2019-02-11 07:11:24', '2019-02-11 00:11:24'),
(10, 'Test', '1549346141.jpg', 'djarot', '$2y$10$Kn9xxaJhPa9cWFeXl.SLreGMGQRsHvMx1NfvFu/cNStW1f0c6gF/i', 'Pak Djarot', '1928373', 3, '2019-02-11 07:11:33', '2019-02-11 00:11:33'),
(11, 'Test', '1549346204.jpg', 'muhadi', '$2y$10$3SyMsvHWtczQ9SCyMekx..CX1ti1vZ4vVEyFqRaKTE1fkeSKLvqYG', 'Pak Muhadi', '08847462', 3, '2019-02-11 07:11:46', '2019-02-11 00:11:46'),
(15, 'test', '1549944642.jpg', 'admindemo', '$2y$10$qAV9fp3emSsjkQ/pE7tD2.jL1MWXoPjJIjR6S1.u6V1wSidaf1.ga', 'admindemo', '0002850363', 3, '2019-02-11 21:10:43', '2019-02-11 21:10:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `kode_ruang` varchar(50) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, 'Lab 2 RPL', 'N89TBH', 'Test', '2019-01-24 04:15:32', '2019-01-24 04:15:32'),
(10, 'Lab 1 RPL', 'N27HBC', 'test', '2019-01-27 07:13:51', '2019-01-27 07:13:51'),
(11, 'Gudang', 'N89TBH', 'Test', '2019-01-27 07:29:44', '2019-01-27 07:29:44'),
(13, 'Perpustakaan', 'N89TBH', 'test', '2019-01-27 07:30:30', '2019-01-27 07:30:30'),
(14, 'Lab KKPI', '984GHTG', 'Test', '2019-02-04 23:08:38', '2019-02-04 23:08:38'),
(15, 'Lab TKJ', 'TYu75', 'Test', '2019-02-12 09:19:23', '2019-02-12 09:19:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `peminjaman_relasi` (`id_peminjaman`),
  ADD KEY `inventaris_relasi` (`id_inventaris`) USING BTREE;

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `jenis_relasi` (`id_jenis`),
  ADD KEY `petugas_relasi` (`id_petugas`),
  ADD KEY `ruang_relasi` (`id_ruang`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `level_relasi` (`id_level`) USING BTREE;

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `inventaris_relasi` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`),
  ADD CONSTRAINT `peminjaman_relasi` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `jenis_relasi` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `petugas_relasi` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `ruang_relasi` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `pegawai_relasi` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `level_relasi` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
