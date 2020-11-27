-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 09:09 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `belanja`
--

CREATE TABLE `belanja` (
  `pesanan` int(50) NOT NULL,
  `id_buku` int(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `harga` int(50) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `belanja`
--

INSERT INTO `belanja` (`pesanan`, `id_buku`, `judul`, `pengarang`, `harga`, `id`) VALUES
(45, 6, 'Senyum Karyamin', 'Ahmad Tohari', 42000, 13),
(47, 5, 'Dihadapan Rahasia', 'Adhimas', 31500, 13);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `gambar`, `pengarang`, `harga`, `kategori`) VALUES
(5, 'Dihadapan Rahasia', 'images/buku/fk1.jpg', 'Adhimas', 31500, 'fiksi'),
(6, 'Senyum Karyamin', 'images/buku/fk2.jpg', 'Ahmad Tohari', 42000, 'fiksi'),
(8, 'Bukan Untuk Dibaca', 'images/buku/nf1.jpg', 'Deassy', 46000, 'nonfiksi'),
(9, 'Strategi Membangun Bisnis', 'images/buku/nf2.jpg', 'Didip', 87500, 'nonfiksi'),
(10, 'Bisnis Model Navigator', 'images/buku/nf3.jpg', 'Karolin', 92000, 'nonfiksi'),
(11, 'Dihadapan Rahasiaa', 'images/buku/fk1.jpg', 'Adhimas', 10000, 'fiksi'),
(12, 'Jagonnya Ulangan Harian', 'images/buku/pl2.jpg', 'Djarot', 63000, 'pelajaran'),
(13, 'Jagonya Ulangan Harian kl 4', 'images/buku/pl3.jpg', 'Djarot Juga', 20000, 'pelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(10) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `foto`, `nama`, `jenkel`, `email`, `username`, `password`, `level`) VALUES
(11, 'images/foto/3.jpg', 'puspa', 'Wanita', 'puspagpang@gmail.com', 'puspa', 3435, 'akses_admin'),
(12, 'images/foto/s.jpg', 'we', 'Wanita', 'we@gmail.com', 'we', 789, 'akses_user'),
(13, 'images/foto/bc.png', 'royan', 'pria', 'royan@gmail.com', 'royan', 123, 'akses_user'),
(15, 'images/foto/6.jpg', 'guest', 'wanita', 'lintang@gmail.com', 'guest', 123, 'akses_admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`pesanan`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `belanja`
--
ALTER TABLE `belanja`
  MODIFY `pesanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
