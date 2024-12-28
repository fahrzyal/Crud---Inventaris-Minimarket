-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2024 pada 15.44
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
-- Database: `inventaris_minimarket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_muhammadalfachrozi_brg`
--

CREATE TABLE `tb_muhammadalfachrozi_brg` (
  `Id_brg` varchar(50) NOT NULL,
  `Nama_brg` varchar(250) DEFAULT NULL,
  `Stok` int(11) DEFAULT NULL,
  `Jenis_brg` enum('Pecah Belah','Mainan','Parabotan','Mebel','Makanan','Lainnya') DEFAULT NULL,
  `Tgl_expired` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_muhammadalfachrozi_brg`
--

INSERT INTO `tb_muhammadalfachrozi_brg` (`Id_brg`, `Nama_brg`, `Stok`, `Jenis_brg`, `Tgl_expired`) VALUES
('A000001', 'Piring ', 32, 'Pecah Belah', '2024-03-12'),
('A000002', 'Cangkir', 77, 'Pecah Belah', '2026-03-02'),
('A000003', 'Sendok', 100, 'Pecah Belah', '2024-12-07'),
('B000001', 'Lato - lato', 317, 'Mainan', '2029-04-01'),
('C000001', 'Sapu Ijo', 45, 'Parabotan', '2025-03-06'),
('E000002', 'Pasta Gigi', 11, 'Mainan', '2024-11-21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_muhammadalfachrozi_brg`
--
ALTER TABLE `tb_muhammadalfachrozi_brg`
  ADD PRIMARY KEY (`Id_brg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
