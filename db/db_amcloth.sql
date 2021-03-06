-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2019 at 11:27 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_amcloth`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `harga_beli` int(6) NOT NULL,
  `harga_jual` int(6) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `id_kategori`, `harga_beli`, `harga_jual`, `foto`, `ukuran`, `deleted`) VALUES
('jkt0000001', 'jaket bomber', 1, 80000, 130000, 'kaos1.jpg', 'XXL', 0),
('kaos2XL2', 'kaos yamaha', 2, 55000, 80000, '240px-Indonesia_New_Road_Sign_Mndtry_1f.png', 'S', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(2) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `deleted`) VALUES
(1, 'jaket', 0),
(2, 'kaos', 0),
(3, 'celana', 0),
(4, 'sepatu', 0),
(5, 'hayoo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `tgl_pembelian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_po`
--

CREATE TABLE `tb_po` (
  `id_po` int(3) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `keterangan` text NOT NULL,
  `dp` int(8) NOT NULL,
  `total` int(8) NOT NULL,
  `id_store` int(2) NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `id_store` int(2) NOT NULL,
  `tgl_riwayat` date NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock`
--

CREATE TABLE `tb_stock` (
  `id_stock` int(5) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `id_store` int(2) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stock`
--

INSERT INTO `tb_stock` (`id_stock`, `kode_barang`, `id_store`, `jumlah`, `deleted`) VALUES
(1, 'kaos2XL2', 1, 10, 0),
(2, 'kaos2XL2', 2, 5, 0),
(3, 'jkt0000001', 1, 5, 0),
(4, 'kaos2XL2 ', 1, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_store`
--

CREATE TABLE `tb_store` (
  `id_store` int(2) NOT NULL,
  `nama_store` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `JenisUser` int(1) NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_store`
--

INSERT INTO `tb_store` (`id_store`, `nama_store`, `username`, `password`, `alamat`, `no_hp`, `JenisUser`, `deleted`) VALUES
(1, 'AM Clothing Kademangaran', 'kademangaran', '5e779dc224b16620931e8a5e3d3655a2', 'kademangaran rt 05 rw 01 kec. dukuhturi kab.tegal', '085385663665', 0, 0),
(2, 'AM Clothing Singkil', 'singkil', '5a958de36ab4fbc1360c3c75a85307f4', 'jl. raya 2 singkil adiwerna', '085385663665', 0, 0),
(3, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'kademangaran', '085385663665', 1, 0),
(4, 'Super Admin', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'kademangaran', '085385663665', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_struk`
--

CREATE TABLE `tb_struk` (
  `id_struk` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_struk`
--

INSERT INTO `tb_struk` (`id_struk`, `total`, `bayar`, `deleted`) VALUES
(1, 180000, 200000, 0),
(2, 180000, 210000, 0),
(3, 130000, 140000, 0),
(4, 130000, 140000, 0),
(5, 130000, 140000, 0),
(6, 130000, 140000, 0),
(7, 130000, 140000, 0),
(8, 130000, 140000, 0),
(9, 80000, 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(8) NOT NULL,
  `id_stock` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(1) NOT NULL,
  `id_struk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_stock`, `jumlah`, `tgl_transaksi`, `deleted`, `id_struk`) VALUES
(1, '0', 2, '2019-07-04 20:55:49', 0, 5),
(2, '0', 1, '2019-07-04 20:55:49', 0, 5),
(3, 'jkt0000001', 2, '2019-07-04 20:58:32', 0, 6),
(4, 'kaos2xl2', 1, '2019-07-04 20:58:32', 0, 6),
(5, 'jkt0000001', 2, '2019-07-04 21:01:16', 0, 7),
(6, 'kaos2xl2', 1, '2019-07-04 21:01:16', 0, 7),
(7, 'jkt0000001', 2, '2019-07-04 21:20:18', 0, 8),
(8, 'kaos2xl2', 1, '2019-07-04 21:20:18', 0, 8),
(9, 'kaos2xl2', 1, '2019-07-04 21:23:10', 0, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_po`
--
ALTER TABLE `tb_po`
  ADD PRIMARY KEY (`id_po`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indexes for table `tb_store`
--
ALTER TABLE `tb_store`
  ADD PRIMARY KEY (`id_store`);

--
-- Indexes for table `tb_struk`
--
ALTER TABLE `tb_struk`
  ADD PRIMARY KEY (`id_struk`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_po`
--
ALTER TABLE `tb_po`
  MODIFY `id_po` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_stock`
--
ALTER TABLE `tb_stock`
  MODIFY `id_stock` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_store`
--
ALTER TABLE `tb_store`
  MODIFY `id_store` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_struk`
--
ALTER TABLE `tb_struk`
  MODIFY `id_struk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
