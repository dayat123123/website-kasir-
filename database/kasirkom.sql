-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2022 pada 10.20
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirkom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` int(100) NOT NULL,
  `stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `harga_barang`, `stok`) VALUES
(2, '99', 'tepung terigu', 111, 1156),
(4, '122', 'susu tigasapi', 1000, 1),
(5, '1122', 'mentega blueband', 122, 33),
(6, 'sas', 'sirup oren', 12, 12),
(7, '123', 'saos pedas', 11, 11),
(8, '124', 'kecap asin', 11, 11),
(9, '125', 'royco', 11, 11),
(10, '126', 'ajinomoto', 11, 11),
(11, '127', 'teh sisri', 11, 11),
(12, '128', 'mama lemon', 11, 11),
(100, '183510583', 'afik', 19999, 10),
(101, '1211', 'dsd', 12, 1),
(102, '11111', 'adul', 123, 122),
(103, '12222', 'rrurheru', 1212, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `disbarang`
--

CREATE TABLE `disbarang` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `disbarang`
--

INSERT INTO `disbarang` (`id`, `barang_id`, `qty`, `potongan`) VALUES
(11, 2, 122, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_waktu`, `nomor`, `total`, `nama`, `bayar`, `kembali`) VALUES
(14, '2022-08-02 08:36:49', '823818', 122, 'kasir', 1000, 878),
(15, '2022-08-02 08:41:12', '597500', 122, 'kasir', 10000, 9878),
(16, '2022-08-02 08:45:48', '440172', 19999, 'kasir', 20000, 1),
(17, '2022-08-02 08:49:58', '457372', 122, 'kasir', 1000, 878),
(18, '2022-08-02 08:52:57', '619584', 122, 'kasir', 11111, 10989),
(19, '2022-08-02 08:53:18', '772303', 122, 'kasir', 1111, 989),
(20, '2022-08-02 08:53:45', '298883', 122, 'kasir', 1111, 989),
(21, '2022-08-02 09:15:28', '697110', 122, 'kasir', 1111, 989),
(22, '2022-08-02 09:20:59', '597617', 20121, 'kasir', 25000, 4879),
(23, '2022-08-02 09:23:43', '844212', 82262, 'kasir', 100000, 17738),
(24, '2022-08-02 09:24:44', '305347', 1011, 'kasir', 5000, 3989),
(25, '2022-08-02 09:25:32', '651557', 1000, 'kasir', 11111, 10111),
(26, '2022-08-02 09:29:44', '684422', 11, 'kasir', 1111, 1100),
(27, '2022-08-02 09:29:53', '242181', 0, 'kasir', 111, 111),
(28, '2022-08-02 09:40:40', '146253', 122, 'kasir', 1212, 1090),
(29, '2022-08-02 09:49:54', '907375', 122, 'kasir', 1111, 989),
(30, '2022-08-02 09:50:32', '866883', 122, 'kasir', 1222, 1100),
(31, '2022-08-02 09:50:53', '123539', 122, 'kasir', 1111, 989),
(32, '2022-08-02 09:52:17', '803736', 122, 'kasir', 1111, 989),
(33, '2022-08-02 09:52:33', '305554', 122, 'kasir', 11222, 11100),
(34, '2022-08-02 09:56:33', '257031', 122, 'kasir', 1111, 989),
(35, '2022-08-02 10:02:27', '859483', 122, 'kasir', 1111, 989),
(36, '2022-08-02 10:03:15', '645618', 122, 'kasir', 1111, 989),
(37, '2022-08-02 10:03:43', '276281', 122, 'kasir', 11111, 10989),
(38, '2022-08-02 10:04:21', '907681', 122, 'kasir', 1111, 989),
(39, '2022-08-02 10:08:19', '230228', 122, 'kasir', 11111, 10989),
(40, '2022-08-02 10:09:06', '610053', 22121, 'kasir', 111111, 88990),
(41, '2022-08-02 10:10:13', '877676', 21354, 'kasir', 111111, 89757),
(42, '2022-08-02 10:10:48', '897322', 233, 'kasir', 235, 2),
(43, '2022-08-02 10:11:45', '550975', 1122, 'kasir', 5000, 3878),
(44, '2022-08-02 10:37:36', '531083', 122, 'kasir', 1000, 878),
(45, '2022-08-02 10:37:55', '927507', 11, 'kasir', 12, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `id_barang`, `harga`, `qty`, `total`, `diskon`) VALUES
(24, 8, 3, 2000, 5, 10000, 2000),
(36, 14, 5, 122, 1, 122, 0),
(37, 15, 5, 122, 1, 122, 0),
(38, 16, 100, 19999, 1, 19999, 0),
(39, 17, 5, 122, 1, 122, 0),
(40, 18, 5, 122, 1, 122, 0),
(41, 19, 5, 122, 1, 122, 0),
(42, 20, 5, 122, 1, 122, 0),
(43, 21, 5, 122, 1, 122, 0),
(44, 22, 5, 122, 1, 122, 0),
(45, 22, 100, 19999, 1, 19999, 0),
(46, 23, 5, 122, 1, 122, 0),
(47, 23, 100, 19999, 4, 79996, 0),
(48, 23, 2, 111, 1, 111, 0),
(49, 23, 4, 1000, 2, 2000, 0),
(50, 23, 12, 11, 2, 22, 0),
(51, 23, 11, 11, 1, 11, 0),
(52, 24, 4, 1000, 1, 1000, 0),
(53, 24, 12, 11, 1, 11, 0),
(54, 25, 4, 1000, 1, 1000, 0),
(55, 26, 12, 11, 1, 11, 0),
(56, 28, 5, 122, 1, 122, 0),
(57, 29, 5, 122, 1, 122, 0),
(58, 30, 5, 122, 1, 122, 0),
(59, 31, 5, 122, 1, 122, 0),
(60, 32, 5, 122, 1, 122, 0),
(61, 33, 5, 122, 1, 122, 0),
(62, 34, 5, 122, 1, 122, 0),
(63, 35, 5, 122, 1, 122, 0),
(64, 36, 5, 122, 1, 122, 0),
(65, 37, 5, 122, 1, 122, 0),
(66, 38, 5, 122, 1, 122, 0),
(67, 39, 5, 122, 1, 122, 0),
(68, 40, 5, 122, 1, 122, 0),
(69, 40, 4, 1000, 2, 2000, 0),
(70, 40, 100, 19999, 1, 19999, 0),
(71, 41, 5, 122, 2, 244, 0),
(72, 41, 100, 19999, 1, 19999, 0),
(73, 41, 4, 1000, 1, 1000, 0),
(74, 41, 2, 111, 1, 111, 0),
(75, 42, 5, 122, 1, 122, 0),
(76, 42, 2, 111, 1, 111, 0),
(77, 43, 5, 122, 1, 122, 0),
(78, 43, 4, 1000, 1, 1000, 0),
(79, 44, 5, 122, 1, 122, 0),
(80, 45, 7, 11, 1, 11, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(110) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_level` varchar(110) NOT NULL,
  `user_foto` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `user_username`, `user_password`, `user_level`, `user_foto`) VALUES
(17, 'admin', 'admin', '81effc96f8bfeabdceddf83f92ce617d', 'administrator', '1293879237_NBLSTORELOGO.jpg'),
(18, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', '1293879237_NBLSTORELOGO.jpg'),
(19, 'kasir', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `disbarang`
--
ALTER TABLE `disbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

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
  MODIFY `id_barang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `disbarang`
--
ALTER TABLE `disbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
