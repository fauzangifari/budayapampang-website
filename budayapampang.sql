-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2024 pada 12.06
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
-- Database: `budayapampang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` char(50) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `nama_admin`, `password`) VALUES
('admin', 'Paujan Gagah', '$2a$12$pQbSj2nFVMWgNFkCh6X.hujPQMM5BhiS8q/4vUuKBUxmbMVdFPQ9K');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` char(20) NOT NULL,
  `title_galeri` varchar(100) NOT NULL,
  `subtitle_galeri` varchar(100) NOT NULL,
  `image_galeri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `title_galeri`, `subtitle_galeri`, `image_galeri`) VALUES
('GLR3663', 'Tarian Udoq Aban', 'Wisata Budaya Pampang', 'Screenshot 2024-05-22 083854.png'),
('GLR5239', 'Tarian Nyelama Sakei', 'Wisata Budaya Pampang', 'Screenshot 2024-05-22 172113.png'),
('GLR7347', 'Tarian Pang Pagaq', 'Wisata Budaya Pampang', 'Screenshot 2024-05-22 144844.png'),
('GLR7422', 'Tarian Enggang Madang', 'Wisata Budaya Pampang', 'Screenshot 2024-05-22 172358.png'),
('GLR7695', 'Tarian Ajei', 'Wisata Budaya Pampang', 'Screenshot 2024-05-22 172638.png'),
('GLR7966', 'Tarian Pemung Tawai', 'Wisata Budaya Pampang', 'Screenshot 2024-05-22 144310.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id_session` char(10) NOT NULL,
  `username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id_session`),
  ADD UNIQUE KEY `id_session` (`id_session`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
