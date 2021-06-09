-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 11:53 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admiin`
--

CREATE TABLE `admiin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nama_lengkap` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admiin`
--

INSERT INTO `admiin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'kelompok10', '123456', 'kelompok10\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(80) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'jakarta', 20000),
(2, 'depok', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(80) NOT NULL,
  `email_pelanggan` varchar(80) NOT NULL,
  `password_pelanggan` varchar(80) NOT NULL,
  `telepon_pelanggan` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `telepon_pelanggan`, `alamat`) VALUES
(1, 'libran', 'libran@gmail.com', '123', 89765213, 'depok'),
(2, 'kelompok10', 'kelompok10@gmail.com', '123456', 893284923, 'bojongsari ali andong ');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `bank` varchar(80) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(5, 15, 'jen', 'bca', 820000, '2020-05-10', '202005100917382.PNG'),
(6, 14, 'keren', 'bca', 4000000, '2020-05-10', '202005100926453.PNG'),
(7, 14, 'keren', 'bca', 4000000, '2020-05-10', '202005100929373.PNG'),
(8, 16, 'jen', 'bca', 1620000, '2020-05-10', '202005100932566.PNG'),
(9, 16, 'jen', 'bca', 1620000, '2020-05-10', '202005100933546.PNG'),
(10, 19, 'ya', 'bca', 90000, '2020-05-12', '20200512094212bc.jpg'),
(11, 20, 'ridhwan', 'bri', 120000, '2020-05-16', '202005160750441.PNG'),
(12, 20, 'ridhwan', 'bri', 120000, '2020-05-16', '202005160751321.PNG'),
(13, 18, 'ibnu', 'bca', 60000, '2020-05-16', '202005160751562.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(90) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` varchar(80) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`) VALUES
(15, 1, 1, '2020-05-06', 820000, 'jakarta', 20000, 'sasdsad', 'success'),
(16, 1, 1, '2020-05-06', 1620000, 'jakarta', 20000, 'sdsa', 'proses kirim'),
(17, 1, 2, '2020-05-11', 110000, 'depok', 30000, 'bojongsari aliandong', 'pending'),
(18, 2, 1, '2020-05-12', 60000, 'jakarta', 20000, 'jakarta pinggir kali\r\n', 'success'),
(19, 2, 2, '2020-05-12', 90000, 'depok', 30000, 'depok pinggir', 'proses kirim'),
(20, 2, 1, '2020-05-16', 120000, 'jakarta', 20000, 'bojongsari aliandong rt02/07 no 35', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_produk` varchar(80) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `sub_berat` int(11) NOT NULL,
  `sub_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama_produk`, `harga_produk`, `berat_produk`, `sub_berat`, `sub_harga`) VALUES
(18, 17, 3, 2, 'buku laravel', 40000, 2000, 4000, 80000),
(19, 18, 3, 1, 'buku laravel', 40000, 2000, 2000, 40000),
(20, 19, 2, 1, 'Python', 60000, 7000, 7000, 60000),
(21, 20, 1, 2, 'Story mr. crack', 50000, 2000, 4000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(80) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `stock_produk` int(11) NOT NULL,
  `foto_produk` varchar(80) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `stock_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(1, 'Story mr. crack', 50000, 2000, 7, 'hbb.jpg', 'story mr crack. '),
(2, 'Python', 60000, 7000, 9, 'pyt.jpg', 'belajar bahasa python menggunakan study case'),
(3, 'buku laravel', 40000, 2000, 2, 'lara.jpg', 'bagus untuk memperdalam keahlian dalam framework');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admiin`
--
ALTER TABLE `admiin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admiin`
--
ALTER TABLE `admiin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
