-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2024 pada 00.47
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id` int(11) NOT NULL,
  `id_pendaftar` int(11) DEFAULT NULL,
  `akta_kelahiran` varchar(255) DEFAULT NULL,
  `kartu_keluarga` varchar(255) DEFAULT NULL,
  `ijazah_smp` varchar(255) DEFAULT NULL,
  `surat_kelulusan` varchar(255) DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id`, `id_pendaftar`, `akta_kelahiran`, `kartu_keluarga`, `ijazah_smp`, `surat_kelulusan`, `tanggal_upload`, `status`) VALUES
(20, 31, 'DIAGRAM WEBSITE CUTI-ERD.pdf', 'DIAGRAM WEBSITE CUTI-ERD.pdf', 'DIAGRAM WEBSITE CUTI-ERD.pdf', 'DIAGRAM WEBSITE CUTI-ERD.pdf', '2024-01-18 23:05:04', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nilai_indo` double DEFAULT NULL,
  `nilai_inggris` double DEFAULT NULL,
  `nilai_mtk` double NOT NULL,
  `nilai_ipa` double NOT NULL,
  `nilai_rata` double(100,0) NOT NULL,
  `status` int(1) NOT NULL,
  `pendaftar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `nilai_indo`, `nilai_inggris`, `nilai_mtk`, `nilai_ipa`, `nilai_rata`, `status`, `pendaftar_id`) VALUES
(37, 100, 100, 100, 100, 100, 1, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `email`, `telepon`, `foto`, `users_id`) VALUES
(12, 'Mochammad Syaifuddin Zuhri', 'Pasuruan', '1901-06-19', 'L', 'islam', 'Talang', 'test@gmail.com', '085646126950', 'Mochammad Syaifuddin Zuhri.jpg', 21),
(17, 'Anisa', 'Pasuruan', '2000-10-10', 'P', 'islam', 'Talang', 'anisa@gmail.com', '085646126950', '', 26),
(18, 'Ali', 'Pasuruan', '2020-04-23', 'Laki-laki', 'Islam', 'Talang Watuagung Prigen', 'ali@gmail.com', '085646126950', '', 27),
(19, 'Tita', 'Pasuruan', '2000-01-23', 'P', 'islam', 'Talang Watuagung Prigen', 'tita@gmail.com', '085646126950', 'Tita.jpg', 28),
(20, 'Andino', 'Pasuruan', '0000-00-00', 'L', 'islam', 'Pasuruan', 'andino@gmail.com', '085646126950', '', 29),
(21, 'Aan', 'Pasuruan', '2000-06-26', 'L', 'islam', 'Talang', 'aan@gmail.com', '085646126950', 'Aan.jpg', 30),
(22, 'budi', 'padang', '2024-01-19', 'L', 'katolik', 'padang', 'budi@gmail.com', '082165443677', '', 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admnistrator', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(21, 'Syaifuddin', 'test@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(26, 'Anisa', 'anisa@gmail.com', '40cc8f68f52757aff1ad39a006bfbf11', 'siswa'),
(27, 'Ali', 'ali@gmail.com', '86318e52f5ed4801abe1d13d509443de', 'siswa'),
(28, 'Tita', 'tita@gmail.com', '1843a91724e69f036b067183cf51c6cd', 'siswa'),
(29, 'Andino', 'andino@gmail.com', 'e67b7077845a1dc9ad06d4993b9fd5dd', 'siswa'),
(30, 'Aan', 'aan@gmail.com', '4607ed4bd8140e9664875f907f48ae14', 'siswa'),
(31, 'budi', 'budi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_pendaftar1_idx` (`pendaftar_id`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_pendaftar_users_idx` (`users_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_nilai_pendaftar1` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `fk_pendaftar_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
