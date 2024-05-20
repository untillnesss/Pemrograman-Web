-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Waktu pembuatan: 20 Bulan Mei 2024 pada 02.56
-- Versi server: 5.7.16
-- Versi PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemrograman_web_said`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori_barang` varchar(50) NOT NULL,
  `deskripsi_barang` text,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `supplier_barang` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `kategori_barang`, `deskripsi_barang`, `harga_beli`, `harga_jual`, `stok_barang`, `supplier_barang`, `tanggal_masuk`) VALUES
(1, 'BRG-001', 'Laptop', 'Elektronik', 'Laptop ASUS Vivobook A416', 5000000, 6500000, 10, 'PT. Citra Mandiri', '2024-03-19'),
(2, 'BRG-002', 'Handphone', 'Elektronik', 'Handphone Samsung Galaxy A53', 4500000, 5700000, 15, 'PT. Global Elektronik', '2024-05-19'),
(3, 'BRG-003', 'Televisi', 'Elektronik', 'Televisi LG 43 inch', 3000000, 4000000, 8, 'PT. Elektra Komponen', '2024-05-18'),
(4, 'BRG-004', 'Kipas Angin', 'Elektronik', 'Kipas Angin Sayang 16 inch', 150000, 200000, 20, 'PT. Putra Mandiri', '2024-05-17'),
(5, 'BRG-005', 'Rice Cooker', 'Elektronik', 'Rice Cooker Cosmos 2 liter', 200000, 250000, 12, 'PT. Elektronik Jaya', '2024-05-16'),
(6, 'BRG-006', 'Sepatu', 'Fashion', 'Sepatu Nike Air Jordan 1', 750000, 1200000, 10, 'PT. Sport Fashion', '2024-05-15'),
(7, 'BRG-007', 'Baju', 'Fashion', 'Kemeja Polo Tommy Hilfiger', 300000, 450000, 15, 'PT. Fashion Nusantara', '2024-05-14'),
(8, 'BRG-008', 'Celana', 'Fashion', 'Celana Jeans Levis', 400000, 550000, 8, 'PT. Distrindo Raya', '2024-05-13'),
(9, 'BRG-009', 'Buku', 'Alat Tulis', 'Buku Pemrograman Python', 100000, 150000, 12, 'PT. Gramedia Pustaka Utama', '2024-05-12'),
(10, 'BRG-010', 'Pena', 'Alat Tulis', 'Pena Pilot G2', 15000, 20000, 20, 'PT. ATK Central', '2024-05-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `debts`
--

CREATE TABLE `debts` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `amount` double NOT NULL,
  `is_settled` int(11) NOT NULL,
  `description` text,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `npm` varchar(20) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `alamat` text,
  `mata_kuliah_favorit` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `npm`, `angkatan`, `kelas`, `alamat`, `mata_kuliah_favorit`, `email`, `jenis_kelamin`, `tanggal_lahir`) VALUES
(11, 'Ahmad Bin Jafar', '1412220022', 2022, 'A', 'Jl. Sudirman No. 10 RT 01 RW 02 Desa Sumber Kec. Jenu, Tuban', 'Pemrograman Web', 'ahmad@example.com', 'Laki-laki', '2000-05-15'),
(12, 'Budi Prasetyo', '1412220023', 2022, 'B', 'Jl. Pahlawan No. 5 RT 02 RW 03 Desa Karangasem Kec. Bancar, Tuban', 'Sistem Basis Data', 'budi@example.com', 'Laki-laki', '2001-12-10'),
(13, 'Citra Putri Utami', '1412220024', 2022, 'C', 'Jl.Diponegoro No. 15 RT 03 RW 04 Desa Karang Anyar Kec. Jenu,Tuban', 'Pengembangan Aplikasi Mobile', 'citra@example.com', 'Perempuan', '2002-02-20'),
(14, 'Dewi Lestari', '1412220025', 2022, 'D', 'Jl. A. Yani No.20 RT 04 RW 05 Desa Kalitengah Kec. Merakurak, Tuban', 'Analisis Algoritma', 'dewi@example.com', 'Perempuan', '2003-08-25'),
(15, 'Eko Prasetyo', '1412220026', 2022, 'E', 'Jl. Raya Tuban -Bojonegoro No. 25 RT 05 RW 06 Desa Kalidawir Kec. Tuban,Tuban', 'Desain Grafis', 'eko@example.com', 'Laki-laki', '2004-10-05'),
(16, 'Fani Indah Sari', '1412220027', 2022, 'F', 'Jl.Cendrawasih No. 30 RT 06 RW 07 Desa Kedungwaru Kec.Plumpang, Tuban', 'Manajemen Proyek', 'fani@example.com', 'Perempuan', '2005-04-12'),
(17, 'Gita Lestari', '1412220028', 2022, 'G', 'Jl. Gajah MadaNo. 35 RT 07 RW 08 Desa Jatiroto Kec. Widang, Tuban', 'Pengantar Sistem Informasi', 'gita@example.com', 'Perempuan', '2006-07-30'),
(18, 'Hadi Prasetyo', '1412220029', 2022, 'H', 'Jl. KH. HasyimAsyari No. 40 RT 08 RW 09 Desa Sidokare Kec. Jatirogo,Tuban', 'Rekayasa Perangkat Lunak', 'hadi@example.com', 'Laki-laki', '2007-03-18'),
(19, 'Indra Setiawan', '1412220030', 2022, 'I', 'Jl. KusumaBangsa No. 45 RT 09 RW 10 Desa Kenduruan Kec. Bancar,Tuban', 'Pemrograman Lanjut', 'indra@example.com', 'Laki-laki', '2008-01-08'),
(20, 'Joko Susilo', '1412220031', 2022, 'J', 'Jl. Kartini No.50 RT 10 RW 11 Desa Jatirogo Kec. Jatirogo, Tuban', 'BasisData Terdistribusi', 'joko@example.com', 'Laki-laki', '2009-11-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'veluverazu@mailinator.com', 'dibozudy@mailinator.com', '$2y$10$NoE7vWId6BU77NCrTInZ6.SSvjhoPnbo6kJipKibu0Pb4i9RNxe0C');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `debts`
--
ALTER TABLE `debts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `debts`
--
ALTER TABLE `debts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
