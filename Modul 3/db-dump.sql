-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Waktu pembuatan: 29 Jun 2024 pada 10.15
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
(23, 'Nobis sit dolorem n', 'Voluptas alias ut ve', 'Totam praesentium su', 'Rem mollitia ullam v', 13, 43, 63, 'Maiores est dolor q', '1994-05-08');

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

--
-- Dumping data untuk tabel `debts`
--

INSERT INTO `debts` (`id`, `name`, `amount`, `is_settled`, `description`, `date`, `user_id`) VALUES
(1, 'Hammett Sampson', 2, 0, 'Ea eos inventore nih', '2007-12-18', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `name`) VALUES
(1, 'Kamar mandi dalam'),
(2, 'Wifi'),
(4, 'Kiayada Stricklandads ads ehehhe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `idkamar` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`idkamar`, `tipe`, `jumlah`, `harga`, `gambar`) VALUES
(6, 'Kamar Premium 3', 203, 100003, '6.jpg'),
(7, 'Odio rerum accusamus', 98, 58, '7.jpg'),
(9, 'At cupiditate tempor', 12, 28, '8.png'),
(10, 'Veniam ea reprehend', 36, 57, '10.png'),
(11, 'Veniam ea reprehend', 36, 57, '11.png'),
(12, 'Veniam ea reprehend', 36, 57, '12.png'),
(13, 'Sequi id autem unde', 12, 35, '13.png'),
(14, 'Kamar Kosan Sepi', -19, 50000, '14.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar_fasilitas`
--

CREATE TABLE `kamar_fasilitas` (
  `id` int(11) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `fasilitas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar_fasilitas`
--

INSERT INTO `kamar_fasilitas` (`id`, `kamar_id`, `fasilitas_id`) VALUES
(15, 14, 2),
(16, 14, 1);

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
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `idpesan` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_bayaran` int(11) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `norek` varchar(15) NOT NULL,
  `namarek` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `idpesan`, `nama`, `jumlah_bayaran`, `bank`, `norek`, `namarek`, `bukti_pembayaran`) VALUES
(1, '37', 'Aljumad', 450000, 'BCA', '1234567890', 'ALJUMAD', '2.jpg'),
(2, '39', 'Inka Ardya Indrawan', 1400000, 'Mandiri', '33344455566666', 'Inka', '5.jpg'),
(3, '40', 'Muh. Fahrizal', 1800000, 'BNI', '677777777777777', 'Fahri', '7.jpg'),
(4, '42', 'Muh. Ade Furkan', 1350000, 'BRI', '493111122233344', 'Furkan', '5.jpg'),
(5, '45', 'testing', 410000, 'BCA', '123123123123123', 'test', '060.png'),
(6, '50', 'Aljumad', 43, 'BCA', '123', 'test', '50.jpg'),
(7, '51', 'Aljumad', 42, 'BCA', '123', 'test', '.jpg'),
(8, '51', 'Aljumad', 42, 'BCA', '', '', '.jpg'),
(9, '52', 'Aljumad', 5, 'BCA', '123', 'test', '.jpg'),
(10, '53', 'Aljumad', 41, 'BCA', '123', 'test', '.png'),
(15, '51', 'Aljumad', 41, 'BCA', '123', 'test', '.png'),
(16, '54', 'Aljumad', 4, 'BCA', '345345', '3fsdfsdfdsf', '.png'),
(17, '54', 'Aljumad', 4, 'BCA', '345345', '3fsdfsdfdsf', '.png'),
(18, '54', 'Aljumad', 4, 'BCA', '345345', '3fsdfsdfdsf', '.png'),
(19, '54', 'Aljumad', 4, 'BCA', '345345', '3fsdfsdfdsf', '.png'),
(20, '54', 'Aljumad', 4, 'BCA', '345345', '3fsdfsdfdsf', '.png'),
(21, '54', 'Aljumad', 4, 'BCA', '345345', '3fsdfsdfdsf', '.png'),
(22, '54', 'Aljumad', 4, 'BCA', '345345', '3fsdfsdfdsf', '.png'),
(23, '53', 'Adipisicing qui repr', 4, 'BNI', 'Et aut impedit ', 'Dolore vitae perspic', '.png'),
(24, '52', 'Aljumad', 4, 'BCA', 'erdgg', 'fdgdfg', '52.jpeg'),
(25, '60', 'Cillum et velit ius', 0, 'BNI', '94', 'Officia quia dicta b', '60.png'),
(26, '61', 'Dignissimos lorem ei', 0, 'BRI', '36', 'Sunt dolor duis temp', '61.JPG'),
(27, '62', 'Qui sit quis unde q', 0, 'BCA', '72', 'Ea sunt sint vel rei', '62.png'),
(28, '63', 'Omnis odit proident', 0, 'BRI', '40', 'Unde eum eu ut cupid', '63.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idpesan` int(11) NOT NULL,
  `tglpesan` datetime NOT NULL,
  `batasbayar` datetime NOT NULL,
  `idkamar` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `idtamu` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `tglmasuk` date NOT NULL,
  `tglkeluar` date NOT NULL,
  `lamahari` int(11) NOT NULL DEFAULT '0',
  `totalbayar` int(11) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT 'Pending...'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`idpesan`, `tglpesan`, `batasbayar`, `idkamar`, `tipe`, `harga`, `jumlah`, `idtamu`, `nama`, `alamat`, `telepon`, `tglmasuk`, `tglkeluar`, `lamahari`, `totalbayar`, `status`) VALUES
(62, '2024-06-29 16:49:40', '2024-06-29 21:49:40', 14, 'Kamar Kosan Sepi', 50000, 38, 18, 'Ut adipisicing quisq', 'Sit quis occaecat pr', '40', '1991-10-19', '2008-03-07', 5985, 2147483647, 'Berhasil'),
(63, '2024-06-29 17:07:49', '2024-06-29 22:07:49', 13, 'Sequi id autem unde', 35, 25, 18, 'Enim omnis voluptate', 'Suscipit repudiandae', '76', '1979-10-09', '2020-07-06', 14882, 13021750, 'Berhasil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `idtamu` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  `level_user` enum('1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`idtamu`, `username`, `password`, `email`, `nama`, `alamat`, `telepon`, `foto`, `level_user`) VALUES
(10, 'ali', '202cb962ac59075b964b07152d234b70', 'ali@gmail.com', 'Aljumad', 'Jl. qwerty', '081222333444', 'favicon.png', '2'),
(14, 'admin', '202cb962ac59075b964b07152d234b70', '', '', '', '', NULL, '1'),
(15, 'qwerty', 'asdfgh', 'asdfgh', 'sdsd', 'adasd', 'sdsa', 'asdsad', '2'),
(16, 'penyimpanan13@gmail.com', 'ya29.a0AXooCgufx69YFzHNhvBSTgHU0udH386ujB9gThXCvV-', 'penyimpanan13@gmail.com', 'Na Sa', '', '', '', '2'),
(17, 'muhammadabdullahsaid0@gmail.com', 'ya29.a0AXooCgspt0crMUvLk68V21LYe-6qP00hllSUqDyRV52', 'muhammadabdullahsaid0@gmail.com', 'Muhammad Abdullah Said', '', '', '', '2'),
(18, 'mas.said3000@gmail.com', 'ya29.a0AXooCgvz1Mh0WAjnpNwfMMCFqNp9NpF979LVI8sMHh5', 'mas.said3000@gmail.com', '68 Muhammad Abdullah Sa\'id', '', '', '', '2');

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
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`idkamar`);

--
-- Indeks untuk tabel `kamar_fasilitas`
--
ALTER TABLE `kamar_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpesan`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`idtamu`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `debts`
--
ALTER TABLE `debts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `idkamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kamar_fasilitas`
--
ALTER TABLE `kamar_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `idtamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
