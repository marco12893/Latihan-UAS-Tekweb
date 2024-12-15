-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2024 pada 12.04
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uastekweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_admin` varchar(256) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `nama_admin`, `status_aktif`) VALUES
(1, 'marco', '1234', 'Marco', 1),
(9, 'mic', '123', 'Mic', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_log_pengiriman`
--

CREATE TABLE `detail_log_pengiriman` (
  `id` int(11) NOT NULL,
  `nomor_resi` varchar(64) NOT NULL,
  `tanggal` date NOT NULL,
  `kota` varchar(64) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_log_pengiriman`
--

INSERT INTO `detail_log_pengiriman` (`id`, `nomor_resi`, `tanggal`, `kota`, `keterangan`) VALUES
(1, 'RS-002', '2024-12-01', 'Semarang', 'Sedang Diproses'),
(2, 'RS-002', '2024-12-14', 'Madiun', 'Sedang diantar kurir'),
(4, 'RS-002', '2024-12-09', 'Madiun', 'Deposit Pengiriman'),
(10, 'RS-004', '2024-12-15', 'Madiun', 'Sedang diantar kurir'),
(11, 'RS-004', '2024-12-16', 'Madiun', 'Sudah sampai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_resi_pengiriman`
--

CREATE TABLE `transaksi_resi_pengiriman` (
  `id` int(11) NOT NULL,
  `nomor_resi` varchar(64) NOT NULL,
  `tanggal_resi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `transaksi_resi_pengiriman`
--

INSERT INTO `transaksi_resi_pengiriman` (`id`, `nomor_resi`, `tanggal_resi`) VALUES
(2, 'RS-002', '2024-12-01'),
(8, 'RS-004', '2024-12-17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `detail_log_pengiriman`
--
ALTER TABLE `detail_log_pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomor_resi` (`nomor_resi`);

--
-- Indeks untuk tabel `transaksi_resi_pengiriman`
--
ALTER TABLE `transaksi_resi_pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_resi` (`nomor_resi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `detail_log_pengiriman`
--
ALTER TABLE `detail_log_pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi_resi_pengiriman`
--
ALTER TABLE `transaksi_resi_pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_log_pengiriman`
--
ALTER TABLE `detail_log_pengiriman`
  ADD CONSTRAINT `detail_log_pengiriman_ibfk_1` FOREIGN KEY (`nomor_resi`) REFERENCES `transaksi_resi_pengiriman` (`nomor_resi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
