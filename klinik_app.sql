-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2026 pada 15.18
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('menunggu','dipanggil','diperiksa','selesai') DEFAULT 'menunggu',
  `no_antrian` int(11) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id`, `user_id`, `tanggal`, `status`, `no_antrian`, `jam`) VALUES
(1, 2, '0000-00-00', 'selesai', NULL, NULL),
(2, 2, '2026-04-22', 'selesai', NULL, NULL),
(3, 2, '2026-04-22', 'selesai', NULL, NULL),
(4, 2, '2026-04-30', 'menunggu', NULL, NULL),
(5, 5, '2026-04-06', 'menunggu', NULL, NULL),
(6, 11, '2026-04-30', 'menunggu', NULL, NULL),
(7, 11, '2026-04-30', 'diperiksa', NULL, NULL),
(8, 11, '2026-04-24', 'selesai', 1, '10:00-11:00'),
(9, 11, '2026-04-22', 'selesai', 1, '09:00-10:00'),
(10, 12, '2026-04-22', 'selesai', 2, '08:00-09:00'),
(11, 12, '2026-04-23', 'selesai', 1, '08:00-09:00'),
(12, 11, '2026-04-23', 'menunggu', 2, '08:00-09:00'),
(13, 13, '2026-04-23', 'selesai', 3, '10:00-11:00'),
(14, 14, '2026-04-23', 'selesai', 4, '08:00-09:00'),
(15, 15, '2026-04-23', 'selesai', 5, '08:00-09:00'),
(16, 14, '2026-04-23', 'selesai', 6, '09:00-10:00'),
(17, 18, '2026-04-23', 'selesai', 7, '09:00-10:00'),
(18, 19, '2026-04-23', 'selesai', 8, '14:00-15:00'),
(19, 19, '2026-04-24', 'selesai', 2, '14:00-15:00'),
(20, 19, '2026-04-24', 'diperiksa', 3, '08:00-09:00'),
(21, 21, '2026-04-24', 'dipanggil', 4, '08:00-09:00'),
(22, 21, '2026-04-25', 'menunggu', 1, '10:00-11:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('admin','petugas','pasien') DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `no_hp`, `jk`) VALUES
(9, 'admin', 'admin@gmail.com', '$2y$10$zpwC1hnD.JPC5pb7OqT/tOyIC2119pjyjbFWkNeOhctznMSo7QpOm', 'admin', NULL, NULL),
(10, 'petugas', 'petugas@gmail.com', '$2y$10$zpwC1hnD.JPC5pb7OqT/tOyIC2119pjyjbFWkNeOhctznMSo7QpOm', 'petugas', NULL, NULL),
(12, 'yaa', 'ya@gmail.com', '$2y$10$KpC4YXhroq8rb44sYgNi2uDppslUcAmaNoGEfSwvix2GAZJ.0vDNS', 'pasien', '08272726', 'P'),
(13, 'nano', 'no@gmail.com', '$2y$10$9ogvEIv0N4Lsv3tn.Z4rGuawYF1ViaKiV4nx1iMiwr3ZzZiEKeatS', 'pasien', '0827726355', 'L'),
(14, 'sana', 'sa@gmail.com', '$2y$10$LurWJGcLPXAw6MwF5kFYE.xKpzAkmZegO7HRqHRUIxcX4U6Wzro5K', 'pasien', '03982872', 'L'),
(15, 'ma', 'ma@gmail.com', '$2y$10$pD9wUhtAcPdlT7S6./3EHurgDxeleO/kUH72uhWx3Kf2uNxyFjxXG', 'pasien', '0998987', 'P'),
(17, 'iya', 'i@gmail.com', '202cb962ac59075b964b07152d234b70', 'pasien', '08765456', 'L'),
(18, 'kiki', 'ki@gmaial.com', '$2y$10$82OhiiCFiCjW0kX0LLVL7OanCsfLv7NqQXL6wQZg5QUEPMvuS98Tu', 'pasien', '0983516', 'L'),
(19, 'o', '0@gmail.com', '$2y$10$bstY25d8mkpdFsqWJ0QfV.8s9RuWde17ZxpXq7nyJz/AAFG02TfJy', 'pasien', '09087656', 'L'),
(21, 'nara', 'raa@gmail.com', '$2y$10$QYrh09jrpX6rj3/2jC32beR4Bon9P0/MXY8euRvMG76qiIMKmSLR6', 'pasien', '02878734', 'L'),
(22, 'tiya', 'tiya@gmail.com', '$2y$10$0JENrHcDlaDiuu4QE1/B9em2ZfpZmRagq1kg6UjqxMr6qRqrTcdKy', 'admin', '085917654328', 'P');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
