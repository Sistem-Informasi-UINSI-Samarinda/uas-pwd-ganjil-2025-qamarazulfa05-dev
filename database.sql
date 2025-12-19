-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2025 pada 04.01
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_obat`
--

CREATE TABLE `inventory_obat` (
  `id_obat` int(11) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `stock_obat` int(11) NOT NULL DEFAULT 0,
  `harga_obat` decimal(10,2) NOT NULL,
  `expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inventory_obat`
--

INSERT INTO `inventory_obat` (`id_obat`, `kode_obat`, `nama_obat`, `stock_obat`, `harga_obat`, `expired`) VALUES
(21, 'OBT001', 'Paracetamol 500 mg', 50, 8000.00, '2027-08-20'),
(22, 'OBT002', 'Amoxicillin 500 mg', 70, 10000.00, '2027-10-05'),
(23, 'OBT003', 'Ibuprofen 400 mg', 30, 8000.00, '2027-03-15'),
(24, 'OBT004', 'Asam Mefenamat 500 mg', 40, 7000.00, '2027-11-15'),
(26, 'OBT005', 'Metformin 500 mg', 70, 11000.00, '2027-05-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nama_lengkap`, `created_at`) VALUES
(4, 'admin', 'admin@admin.com', '$2y$10$MZNdSoJGMfetsnzlMjMWveZgH06c/VtGI6tZiK37mP6CKe5rVfDEi', 'Administrator Website', '2025-12-18 12:14:19'),
(5, 'admin', 'admin@admin.com', '$2y$10$ReaLWH8CjyJLarUze15cRegjz2Ap6uHCuos62axtCezwrLHMOW/cW', 'Administrator Website', '2025-12-18 12:14:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `inventory_obat`
--
ALTER TABLE `inventory_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `email_2` (`email`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `inventory_obat`
--
ALTER TABLE `inventory_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
