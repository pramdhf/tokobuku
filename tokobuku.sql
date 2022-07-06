-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Jul 2022 pada 10.16
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobuku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `img_payment` varchar(256) NOT NULL,
  `tgl_pesan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `no_telp`, `payment`, `img_payment`, `tgl_pesan`) VALUES
(27, 'indra', 'tangerang', '081296983656', 'BNI', 'my-image_(10).png', '2022-07-06 15:16:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `categoryName`) VALUES
(1, 'Fiksi'),
(2, 'Non Fiksi'),
(3, 'Pengetahuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id`, `id_invoice`, `id_produk`, `productName`, `jumlah`, `harga`) VALUES
(31, 27, 2, 'Student Hidjo', 2, 100000),
(32, 27, 3, 'Funiculi Funicula', 1, 100000),
(33, 27, 5, 'Loving The Wounded Soul', 1, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `stock` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `productName`, `img`, `stock`, `categoryId`, `price`) VALUES
(1, 'Nyanyian Achilles (The Song of Achilles)', 'SongAchiles.jpg', 10, 1, 100000),
(2, 'Student Hidjo', 'hidjo.jpg', 10, 1, 100000),
(3, 'Funiculi Funicula', 'funiculi.jpg', 10, 1, 100000),
(4, 'Filosofi Teras', 'filosofiteras.jpg', 10, 2, 100000),
(5, 'Loving The Wounded Soul', 'loving.jpg', 10, 2, 100000),
(6, 'You Do You', 'ydy.jpg', 10, 2, 100000),
(7, 'The Tipping Point', 'tpt.jpg', 10, 3, 100000),
(8, 'Starter For Ten', 'sft.jpg', 10, 3, 100000),
(9, 'Bumi Manusia', 'bumi.jpg', 10, 3, 100000),
(70, 'The Perfect World of Miwako Sumida', 'the-perfect-image-of-miwako-sumida.jpg', 19, 1, 69000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `registerDate`) VALUES
(9, 'indra', 'hasanindra71@gmail.com', 'default.jpg', '$2y$10$ic49Xg8y1JJhwjX33ZKxYu6CpjEECVbDqwG9i/uQ8vBvBP0V80FXW', 2, 1, '0000-00-00 00:00:00'),
(10, 'test', 'indrahsan80@gmail.com', 'default.jpg', '$2y$10$Mx51LHBs98WRYZ102Xda4e7EBi/C0vqTtE85/yYL/ieCygWnx1LCG', 2, 1, '0000-00-00 00:00:00'),
(11, 'ansbdkas', 'kjabskdab@gmail.com', 'default.jpg', '$2y$10$tDXHshhBqA473rwmyafIte.CO9.GDFgtGV6XgFEJleyK7lJZSV4o6', 2, 1, '0000-00-00 00:00:00'),
(12, 'kimihime', 'davecovington@gmail.com', 'default.jpg', '$2y$10$4BvT2Xu9amf0YKX/BXjetOvYsCveGgVFVCSTRG6bUyZBBl8c3F5ri', 2, 1, '0000-00-00 00:00:00'),
(13, 'dave', 'duniailmu@gmail.com', 'default.jpg', '$2y$10$4BvT2Xu9amf0YKX/BXjetOvYsCveGgVFVCSTRG6bUyZBBl8c3F5ri', 1, 1, '2022-07-04 18:18:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_userrole`
--

CREATE TABLE `tb_userrole` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_userrole`
--

INSERT INTO `tb_userrole` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_userrole`
--
ALTER TABLE `tb_userrole`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_userrole`
--
ALTER TABLE `tb_userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
