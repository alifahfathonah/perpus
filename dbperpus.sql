-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 08:11 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbperpus`
--
CREATE DATABASE IF NOT EXISTS `dbperpus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbperpus`;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(4) NOT NULL,
  `judul_buku` varchar(30) NOT NULL,
  `genre_buku` varchar(20) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun_buku` int(4) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `sinopsis` varchar(1000) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `stok` int(5) NOT NULL,
  `sumber` varchar(200) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `genre_buku`, `penerbit`, `tahun_buku`, `cover`, `sinopsis`, `lokasi`, `stok`, `sumber`, `harga`) VALUES
(1111, 'berhasil', 'pasti', 'sukse', 1988, '160720180623421.jpg', 'asawaway', 'rak 3', 0, 'Dana BOS', 200000),
(3129, 'Gemar Bertanam di Pekarangan', 'Go Green', 'Amalia Nurmida', 2010, '160720180550306.jpg', 'Buku yang berisi cara bercocok tanam yang baik dan benar.', 'Rak 1', 84, 'Dana BOS', 40000),
(3153, 'Peningkatan Mutu', 'SDM', 'H. Restianti', 2015, '090720180951526.jpg', 'Buku yang berisi cara peningkatan mutu SDM & klarifikasi pemilihannya.', 'Rak 2', 76, '', 0),
(3195, 'Budi Daya Jamur', 'Jamur', 'Eko Darwaningsih', 2012, '090720180952194.jpg', 'buku yang berisi cara budi daya jamur.', 'Rak 3', 0, '', 0),
(3214, 'Perempuan Berjilbab', 'Jilbab', 'Fand', 2010, '090720180952313.jpg', 'Cerita novel ringan mengenai kisah seorang wanita berjilbab.', 'Rak 4', 5, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail` int(4) NOT NULL,
  `id_buku` int(4) NOT NULL,
  `id_pinjam` int(4) NOT NULL,
  `jumlah` int(1) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail`, `id_buku`, `id_pinjam`, `jumlah`, `tgl_kembali`) VALUES
(1, 3129, 1, 1, '27-05-2018'),
(2, 3153, 2, 1, '29-05-2018'),
(3, 3129, 3, 1, '07-07-2018'),
(4, 3129, 4, 1, '08-06-2018'),
(5, 3195, 6, 1, '08-06-2018'),
(6, 3129, 7, 1, '00-00-0000'),
(8, 3129, 11, 1, '00-00-0000'),
(9, 3129, 13, 1, '00-00-0000'),
(10, 3153, 15, 1, '00-00-0000'),
(11, 3129, 16, 1, '00-00-0000'),
(12, 1111, 17, 1, '00-00-0000'),
(13, 1111, 19, 2, '00-00-0000'),
(14, 1111, 21, 1, '00-00-0000'),
(15, 1111, 22, 1, '00-00-0000');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(4) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tgl_pinjam` varchar(40) NOT NULL,
  `limit_tanggal` varchar(50) NOT NULL,
  `status_peminjaman` varchar(10) NOT NULL,
  `terlambat` varchar(40) NOT NULL,
  `denda` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_user`, `tgl_pinjam`, `limit_tanggal`, `status_peminjaman`, `terlambat`, `denda`) VALUES
(1, 6, '20-05-2018', '27-05-2018', 'kembali', '0 hari', 0),
(2, 6, '20-05-2018', '27-05-2018', 'kembali', '2 hari', 1000),
(3, 5, '07-07-2018', '14-07-2018', 'kembali', '0 hari', 0),
(4, 4, '04-06-2018', '11-06-2018', 'kembali', '0 hari', 0),
(6, 5, '04-06-2018', '11-06-2018', 'kembali', '0 hari', 0),
(7, 4, '10-07-2018', '17-07-2018', 'pinjam', '0 Hari', 0),
(11, 4, '10-07-2018', '17-07-2018', 'pinjam', '0 Hari', 0),
(13, 5, '10-07-2018', '17-07-2018', 'pinjam', '0 Hari', 0),
(15, 6, '12-07-2018', '19-07-2018', 'pinjam', '0 Hari', 0),
(16, 4, '13-07-2018', '20-07-2018', 'onProses', '0 Hari', 0),
(17, 4, '16-07-2018', '23-07-2018', 'pinjam', '0 Hari', 0),
(19, 6, '16-07-2018', '23-07-2018', 'pinjam', '0 Hari', 0),
(21, 4, '16-07-2018', '23-07-2018', 'pinjam', '0 Hari', 0),
(22, 4, '19-07-2018', '26-07-2018', 'pinjam', '0 Hari', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jk` char(2) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `forgot_pass_identity` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'calonmember',
  `tahun_masuk` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `jk`, `alamat`, `email`, `foto`, `pass`, `forgot_pass_identity`, `status`, `tahun_masuk`, `created_at`, `update_at`) VALUES
(1, 'admin', 'admin sma', '', 'sma pgri 2 palembang', 'admin@gmail.com', '', 'bdf340df088e7dbe2847e68260a2477f', '', 'admin', 2018, '2018-04-28 12:07:59', '2018-04-28 12:08:36'),
(4, '1234567891', 'Muhammad Yukiyu ', 'l', 'jakabaring', 'Andi@gmail.com', '5.png', '0cc175b9c0f1b6a831c399e269772661', '', 'member', 2015, '2018-05-13 17:36:36', '2018-07-09 07:37:13'),
(5, '1232512323', 'Dora', 'p', 'Plaju', 'dora@gmail.com', '2.png', '0cc175b9c0f1b6a831c399e269772661', '', 'member', 2017, '2018-05-13 17:43:01', '2018-07-09 07:37:36'),
(6, '1234567819', 'Arnart la', 'l', 'Plaju', 'narta1208@gmail.com', '090720180953123.png', '202cb962ac59075b964b07152d234b70', '', 'member', 2016, '2018-05-14 03:10:01', '2018-07-09 07:53:12'),
(7, '1231231234', 'x', 'l', 'PALEMBANG', 'X', '130720180928485.png', '202cb962ac59075b964b07152d234b70', '', 'member', 2016, '2018-07-10 03:00:21', '2018-07-13 07:28:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_pinjam` (`id_pinjam`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3215;
--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `detail_peminjaman_ibfk_3` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`id_pinjam`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
