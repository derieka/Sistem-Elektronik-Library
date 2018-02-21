-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2016 at 10:45 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nis_nip` varchar(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `status` varchar(9) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tgl_masuk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `nis_nip`, `jurusan`, `status`, `jenis_kelamin`, `tgl_masuk`) VALUES
(1, 'Albertus Gulang Kalbu Adi', 'S1313007', 'TKJ', 'Siswa', 'L', '2015-06-17 15:07:06'),
(2, 'Aldia Gita Mawar Dani', 'S1313008', 'TKJ', 'Siswa', 'P', '2015-06-17 15:07:36'),
(3, 'Andhika Krismananda', 'S1313009', 'TKJ', 'Siswa', 'L', '2015-06-17 15:22:12'),
(109, 'Hardi Setyo Utomo', 'S1312950', 'TME', 'Siswa', 'L', '2016-12-31 06:33:01'),
(110, 'Chairul Firmanzah', 'S1312906', 'TEI', 'Siswa', 'L', '2016-12-31 06:33:32'),
(111, 'Ifada Tita Yudhitya', 'S1312808', 'TAV', 'Siswa', 'P', '2016-12-31 06:34:01'),
(112, 'Adheniar Juliane Maeda', 'S1312720', 'TKR', 'Siswa', 'P', '2016-12-31 06:34:28'),
(113, 'Muhammad Alexander Wibowo', 'S1312709', 'TP', 'Siswa', 'L', '2016-12-31 06:34:56'),
(114, 'Asya Lafifatus SyaDiyah', 'S1312583', 'TITL', 'Siswa', 'P', '2016-12-31 06:36:04'),
(115, 'Nadine Naungira', 'S1312531', 'TGB', 'Siswa', 'P', '2016-12-31 06:36:35'),
(116, 'Juan Rezky Sebastian', 'S1312449', 'TKBB', 'Siswa', 'L', '2016-12-31 06:37:03'),
(117, 'Gugun Godrong', 'G13120978', 'TKJ', 'Guru', 'L', '2016-12-31 10:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `thn_terbit` varchar(4) NOT NULL,
  `deskripsi_fisik` varchar(100) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `thn_terbit`, `deskripsi_fisik`, `isbn`, `genre`) VALUES
(10001, 'Harry Potter and The Deadly Hallows Part. 1', 'J.K. Rowling', 'Gramedia Pustaka Utama', '2013', '512 hlm, 23 cm, cetakan 1', '9799792288322', 'fiksi'),
(10002, 'Cara Beternak Lele', 'Edi Subono', 'Gramedia Pustaka Utama', '2016', '1 hlm, 2 cm, cetakan 3', '9791234567899', 'komedi'),
(10003, 'Cara Berternak Ikan Mas', 'Wawan Sutijan', 'Gramedia Pustaka Utama', '2015', '2 hlm, 10 cm, cetakan 4', '9876543212345', 'referensi');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kembali` date DEFAULT NULL,
  `id_buku` varchar(13) NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `id_petugas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `kembali`, `id_buku`, `id_anggota`, `id_petugas`) VALUES
(35, '2015-06-02', '2015-06-09', '2015-06-17', '9799792288322', 'S1313007', 'A1313017'),
(36, '2015-06-09', '2015-06-16', '2016-12-30', '9791234567899', 'S1313008', 'A1313015'),
(37, '2016-12-31', '2017-01-07', NULL, '9791234567899', 'S1313007', 'A1313017'),
(38, '2016-12-31', '2017-01-07', '2016-12-31', '9876543212345', 'S1313009', 'A1313017'),
(39, '2016-12-31', '2017-01-13', NULL, '9799792288322', 'S1312950', 'A1313017');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `nip`, `jenis_kelamin`, `username`, `password`) VALUES
(10101, 'Dino Damara Ramadhan', 'A1313017', 'L', 'dino', 'dino'),
(20202, 'Deri Eko Fauzi', 'A1313015', 'L', 'deri', 'deri'),
(40404, 'Rizal Chandra Rivaldi', 'A1313035', 'L', 'chandra', 'chandra'),
(301301, 'Rizal Ganda Setiawan', 'A1313036', 'L', 'rizal', 'rizal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `nis_nip` (`nis_nip`),
  ADD KEY `nis_nip_2` (`nis_nip`),
  ADD KEY `nis_nip_3` (`nis_nip`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `isbn` (`isbn`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `id_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`nis_nip`),
  ADD CONSTRAINT `id_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`isbn`),
  ADD CONSTRAINT `id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`nip`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
