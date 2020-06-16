-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2020 at 01:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bayand`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Adetiya', '0', '$2y$10$TV1R4b1VzRlheBd7I7BugOGXzlMbsrBwGNpocPUmKW2lHnbugc6N6'),
(7, '2', '2', '$2y$10$S5YJ5lvQVdRXf13/ilzIMuFciyo1csJdmgMhi3dq0v6H.PwTyfm1u');

-- --------------------------------------------------------

--
-- Table structure for table `tb_officer`
--

CREATE TABLE `tb_officer` (
  `nik` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_officer`
--

INSERT INTO `tb_officer` (`nik`, `password`, `nama`, `no_telp`, `alamat`) VALUES
('2013223666', '$2y$10$avL.j7evvhAcsXFkjatOS.CnIzUaba50QMBGcCt0TiaNBb07iRoK.', 'Bayu Andikaa', '08979362272', ''),
('3201616021', '$2y$10$Jv.kt26QwtPbAmUDt5bXrOxYzXZI2Sw0/eQJ6S5A5ncVqfwBhJ27G', 'Ade', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftar`
--

CREATE TABLE `tb_pendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto_ktp` varchar(50) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Menunggu','Diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftar`
--

INSERT INTO `tb_pendaftar` (`id`, `nama`, `alamat`, `no_telp`, `email`, `foto_ktp`, `username`, `password`, `status`) VALUES
(1, 'Putra', 'Jalan Karet												', '089669432192', 'putra@gmail.com', '05e1d61c2503dac398cd85ffdb38c799.jpg', '0', '$2y$10$lcKrfxgafvl1nMedLJTp/OeucxJdboh4ly186jKBfhXRoihjtlobe', 'Diterima'),
(3, 'Bayu Andika', 'Jl. Komyos Sudarso Gg. Suka Maju Dlm. II no.07												', '08979362272', 'bayu@gmail.com', 'c5411776e8ecb7336fa1d6e838477769.jpg', 'bayu', '$2y$10$I7VF82no1R2P/pREvVdsMesv0P3XFvJ.y1WugJKFSUd6As3ek8I2S', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `id` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `kd_toko` varchar(4) NOT NULL,
  `id_officer` varchar(10) DEFAULT NULL,
  `tgl_sewa` date NOT NULL,
  `jangka_sewa` int(11) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `luas_sewa` varchar(20) NOT NULL,
  `kebutuhan` enum('Tidak','Listrik dan Air','Listrik','Air') NOT NULL,
  `foto_gerobak` varchar(50) NOT NULL,
  `produk_jual` text NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('Menunggu','Diterima','Ditolak','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sewa`
--

INSERT INTO `tb_sewa` (`id`, `id_pendaftar`, `kd_toko`, `id_officer`, `tgl_sewa`, `jangka_sewa`, `tgl_selesai`, `luas_sewa`, `kebutuhan`, `foto_gerobak`, `produk_jual`, `total`, `status`) VALUES
(41, 1, 'T7B6', '3201616021', '2020-06-12', 1, '2020-07-25', '2x1', 'Listrik dan Air', '553562ae903ec538572cba6609d24358.jpg', 'Bubble', 500000, 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tb_toko`
--

CREATE TABLE `tb_toko` (
  `kd_toko` varchar(4) NOT NULL,
  `nama_toko` varchar(30) NOT NULL,
  `alamat_toko` text NOT NULL,
  `harga_sewa` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_toko`
--

INSERT INTO `tb_toko` (`kd_toko`, `nama_toko`, `alamat_toko`, `harga_sewa`) VALUES
('llll', 'tes', 'tes', 800000),
('T2ST', 'Dr. Sutomo', 'Jalan Dr. Sutomo', 800000),
('T6JJ', 'K.H. Wahid Hasyim', 'Jalan K.H. Wahid Hasyim', 800000),
('T7B6', 'Wahidin Raya 45', 'Jalan Dr. Wahidin', 500000),
('TWWK', 'Merdeka 196', 'Jalan Merdeka', 800000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_officer`
--
ALTER TABLE `tb_officer`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pendaftar` (`id_pendaftar`) USING BTREE,
  ADD KEY `id_officer` (`id_officer`) USING BTREE,
  ADD KEY `kd_toko` (`kd_toko`) USING BTREE;

--
-- Indexes for table `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`kd_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD CONSTRAINT `tb_sewa_ibfk_1` FOREIGN KEY (`id_pendaftar`) REFERENCES `tb_pendaftar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_sewa_ibfk_3` FOREIGN KEY (`id_officer`) REFERENCES `tb_officer` (`nik`) ON DELETE SET NULL,
  ADD CONSTRAINT `tb_sewa_ibfk_4` FOREIGN KEY (`kd_toko`) REFERENCES `tb_toko` (`kd_toko`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
