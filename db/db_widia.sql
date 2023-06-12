-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 08:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_widia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_denda`
--

CREATE TABLE `tbl_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL,
  `batas` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biaya_denda`
--

INSERT INTO `tbl_biaya_denda` (`id_biaya_denda`, `batas`, `nominal`) VALUES
(1, 7, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(5) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `kode_buku`, `id_kategori`, `id_rak`, `judul`, `pengarang`, `penerbit`, `isbn`, `stok`, `gambar`) VALUES
(2, 'BK002', 2, 1, 'Mahir PHP', 'Abdullah ', 'PT Skuy Skuy', '123123', 10, 'buku.jpeg'),
(3, 'BK003', 2, 1, 'Pemrograman Dasar 2', 'Pengarang Satu', 'Penerbit Satu', '123121921', 11, 'buku1.png'),
(4, 'BK004', 5, 1, 'Algoritma Matematika', 'Udin', 'Petot', '1231827763', 6, 'buku1.jpeg'),
(5, 'BK005', 4, 2, 'Bahasa Indonesia', 'Puan', 'Megawati', '2931018921', 5, 'buku3.png'),
(6, 'BK006', 2, 1, 'Pemrograman 2', 'Ngarang aja', 'Terbit', '1312839128', 15, 'buku1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL,
  `no_pinjam` varchar(5) NOT NULL,
  `denda` varchar(100) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_denda` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_denda`
--

INSERT INTO `tbl_denda` (`id_denda`, `no_pinjam`, `denda`, `lama_pinjam`, `tgl_denda`) VALUES
(1, 'TR002', '9000', 7, '2023-04-02'),
(2, 'TR007', '0', 7, '2023-04-02'),
(3, 'TR007', '0', 7, '2023-04-02'),
(4, 'TR006', '0', 7, '2023-04-02'),
(5, 'TR005', '0', 7, '2023-04-02'),
(6, 'TR001', '0', 7, '2023-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Komputer dan Jaringan'),
(2, 'Pengelasan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Pemrograman'),
(4, 'Seni'),
(5, 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'Satu'),
(2, 'Dua');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `gender` enum('Laki - Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nisn`, `nama`, `id_jurusan`, `gender`, `alamat`) VALUES
(1, '2057570029', 'Bismillah', 1, 'Laki - Laki', 'Perapatan Arab'),
(2, '205757002', 'Zukri', 1, 'Laki - Laki', 'Amerika Serikat'),
(4, '2057570029', 'Bang Messi', 2, 'Laki - Laki', 'Ciledug');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_pinjam` varchar(5) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `kode_buku` varchar(5) NOT NULL,
  `tgl_pinjam` varchar(20) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_kembali` varchar(20) NOT NULL,
  `tgl_pengembalian` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `no_pinjam`, `nisn`, `kode_buku`, `tgl_pinjam`, `lama_pinjam`, `tgl_kembali`, `tgl_pengembalian`, `status`) VALUES
(1, 'TR001', '2057570029', 'BK004', '2023-04-02', 7, '2023-04-09', '2023-04-02', 'Di Kembalikan'),
(2, 'TR001', '2057570029', 'BK003', '2023-04-02', 7, '2023-04-09', '2023-04-02', 'Di Kembalikan'),
(3, 'TR002', '2057570021', 'BK002', '2023-03-04', 7, '2023-03-11', '2023-04-02', 'Di Kembalikan'),
(4, 'TR002', '2057570021', 'BK003', '2023-03-04', 7, '2023-03-11', '2023-04-02', 'Di Kembalikan'),
(5, 'TR003', '2057570029', 'BK005', '2023-02-01', 7, '2023-02-07', '0', 'Dipinjam'),
(6, 'TR004', '205757002', 'BK004', '2023-03-15', 7, '2023-03-22', '0', 'Dipinjam'),
(7, 'TR005', '2057570029', 'BK005', '2023-04-02', 7, '2023-04-09', '2023-04-02', 'Di Kembalikan'),
(8, 'TR005', '2057570029', 'BK004', '2023-04-02', 7, '2023-04-09', '2023-04-02', 'Di Kembalikan'),
(9, 'TR006', '2057570029', 'BK002', '2023-04-02', 7, '2023-04-09', '2023-04-02', 'Di Kembalikan'),
(10, 'TR006', '2057570029', 'BK003', '2023-04-02', 7, '2023-04-09', '2023-04-02', 'Di Kembalikan'),
(11, 'TR007', '2057570029', 'BK005', '2023-04-02', 7, '2023-04-09', '2023-04-02', 'Di Kembalikan'),
(12, 'TR007', '2057570029', 'BK004', '2023-04-02', 7, '2023-04-09', '2023-04-02', 'Di Kembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `foto`, `id_level`) VALUES
(1, 'Widia', 'admin', '123', 'admin1.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  ADD PRIMARY KEY (`id_biaya_denda`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_rak` (`id_rak`);

--
-- Indexes for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  MODIFY `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD CONSTRAINT `tbl_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_buku_ibfk_2` FOREIGN KEY (`id_rak`) REFERENCES `tbl_rak` (`id_rak`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
