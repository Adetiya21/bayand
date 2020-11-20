-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Nov 2020 pada 13.19
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sewa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Adetiya', '0', '$2y$10$YI6aecZF56IqnT9vIOKXb.IVmxssMHhOZjInfbtXwQvNS/q2WSj3u');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_officer`
--

CREATE TABLE `tb_officer` (
  `nik` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_officer`
--

INSERT INTO `tb_officer` (`nik`, `password`, `nama`, `no_telp`, `alamat`) VALUES
('2013046566', '$2y$10$YI6aecZF56IqnT9vIOKXb.IVmxssMHhOZjInfbtXwQvNS/q2WSj3u', 'Andi', '081256517309', ''),
('2013223666', '$2y$10$SHz1SYj1if1.zw.2RFj7tOR7Bp7vHOgF8B60eQbSlT.NZYCIdRMWy', 'Bayu Andika', '08979362272', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftar`
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
-- Dumping data untuk tabel `tb_pendaftar`
--

INSERT INTO `tb_pendaftar` (`id`, `nama`, `alamat`, `no_telp`, `email`, `foto_ktp`, `username`, `password`, `status`) VALUES
(1, 'Petrus Rico Yuditio', '', '', '', NULL, 'yudi', '$2y$10$5pHFxfFN43.t8nfq4Qh0huduO3ggTjHB9iNHQfJnYHrI6FDDeiS9a', 'Menunggu'),
(2, 'Kurnadi', 'Jl. Merdeka', '081256517308', 'kurnadinadi@gmail.com', 'ea3e101d79ba3e180ec230ac0b7c7717.JPG', 'kurnadi', '$2y$10$5pHFxfFN43.t8nfq4Qh0huduO3ggTjHB9iNHQfJnYHrI6FDDeiS9a', 'Diterima'),
(3, 'Eko', 'Jl. Komyos Sudarso Komp. Alpokat Lestari Permai', '081256517304', 'ekodoank@gmail.com', '244292420c936124c8c976b01f9023f2.JPG', 'eko', '$2y$10$Z65qY31tl542mth7fCVfbut95JSUTFBkD1YCa4dJzNLXOqsPlkVlq', 'Diterima'),
(4, 'Budi Setiawan', 'Jl. MT. Haryono Gg. Sehat 																																			', '081256517301', 'budisetia@gmail.com', '5411eef51c40f13c8e3a23291ba8d55f.JPG', 'budi', '$2y$10$wbq8JSkImehFYxFWFfCb7uG/i60ey7meCbfOqGC/I2wYAJdb356Ni', 'Diterima'),
(5, 'Yuni Yestika Rifai', '', '', '', NULL, 'yuni', '$2y$10$ckZsm5PjFad19SNxIrHHM.citk8DSUaSgmi0uqrxLj.AYzgc/NWse', 'Menunggu'),
(6, 'Dian Wahyu Ningsing', 'Jl. Masuka II Gg. Bochari', '081256517303', 'dianwahyuning@gmail.com', '5ca70050aaf2e92d131f8bbafe28f266.JPG', 'dian', '$2y$10$uQ7.m1ImT/TbhusCHaQsYunbPvFtUv9k0mxCg8gjTD9tjnrF1obQq', 'Diterima'),
(7, 'Muhammad Gilang', '', '', '', NULL, 'gilang', '$2y$10$T114ifiL8yKyzEog6ObIlOZ20Xu.lzoZ5R6vgSMaaHI4sg.P9bnuy', 'Menunggu'),
(8, 'Devi Yenni', 'Jl. Alianyang Gg. Rahayu												', '081256517302', 'devyenni@gmail.com', '3676815c4c88769c6b23a5d63db7a20c.JPG', 'devi', '$2y$10$fTPzn4XwwutvitaoffqqyOdGy.hMM1m80F061gA52xJhGHWt2Lpkm', 'Diterima'),
(9, 'Mira Hartati', 'Dusun Kenanga', '081256517309', 'miratati@gmail.com', 'ff29018aaf70460ed3be73fe1c69a2af.JPG', 'mira', '$2y$10$Lk1s0gYW2HVMU8VBKxsymO84KiH8O7LgU4p4teye14N0ng6amkcWa', 'Diterima'),
(10, 'Mita Sari', '', '', '', NULL, 'mita', '$2y$10$d2ZnzY4QLRJYEhhYSO2k..IvEjPaND8ne.mNXfR0tS3zNkOG1qYBq', 'Menunggu'),
(11, 'Evi Lestari', 'Jl. Nawawi Hasan Gg. Goa VI No.08', '081256517305', 'lestarievi@gmail.com', '90d8f30c072778e60388fd0bccf503a8.JPG', 'evi', '$2y$10$G4rMG04VwW.2xpcbf6Kn2OqHXmGinAI9DnlgE0B4rIATMUo9CpmNK', 'Diterima'),
(12, 'Hadi Susanto', 'Dusun Tengah', '081256517306', 'hadisusanto@gmail.com', '80378e816a57df1d6ab5aed7a913db21.JPG', 'hadi', '$2y$10$cmKRfUmOZTMYv3d9hqhChOSRlepQz7/KmMijFcDgr06MnkozP.o5W', 'Diterima'),
(13, 'Vianny', '', '', '', NULL, 'via', '$2y$10$28YdArkWT2nPVrhdRcaOUuuC2qo5uP3OorBHbxpeksFCwnGbYzy3G', 'Menunggu'),
(14, 'Tjong Se Kho', 'Jl. Padat Karya II', '081256517309', 'ijong123@gmail.com', '2c22a5efec4966f405b4356ddfdcaa01.JPG', 'ijong', '$2y$10$yMQ10aaQNf.hzTuPfj3Os.ZSvatqCjCO/OI2FADty.y9VxtC1QrLW', 'Menunggu'),
(15, 'Muhammad Abdurahman', '', '', '', NULL, 'maman', '$2y$10$cAcx6vnqvgl86D3wlpaZWuYixoV/VUq.GnReCHAJs/oxxefFOeNY2', 'Menunggu'),
(16, 'Hesti Fibriningrum', 'Jl. Sejarah Gg. Gunung Puting 2', '081256517307', 'hestiningrum@gmail.com', '51c26b89c5159724ab652290fde2c2a6.JPG', 'hesti', '$2y$10$uCwb17KHFAUfWeMVK8/ckuqoqjDz5UU1JNSnXrL.i6ekiholBMBui', 'Diterima'),
(17, 'Syafroyogi F', '', '', '', NULL, 'yogi', '$2y$10$cSGVBz9BS/DGkuVUYg2eH.NKHXm/.TrMorVSaT2jS5fBtk9uqUzDm', 'Menunggu'),
(18, 'Liana', 'Jl. Kebangkitan Nasional', '081256517308', 'lianalia@gmail.com', '3466c40e09ce95be86610008af01ed43.JPG', 'ana', '$2y$10$HFV9ruCOgn6oxq31PHMBy.WRaTGQKtEPpyR9Ln8jmntj9N3kOBFDG', 'Diterima'),
(19, 'Rizky Eko Prasetyawan', '', '', '', NULL, 'rizkyeko', '$2y$10$1G1Rokxsg8xIZRbfCAJxk.0LO0dkl4MSNhWnnMQpNQ4rSCrQ/FWHy', 'Menunggu'),
(20, 'Maulidy Azhilla', 'Jl. Tabrani Ahmad Komp. GBK 3												', '089693636312', 'zilaoi45@gmail.com', '889fab2df49fd87a63886fded616994c.JPG', 'zila', '$2y$10$sEXQOU8TjqOTrHqxuBx99uLpOHgk2WgLip/abQOIXuMZ1It01Nl0e', 'Diterima'),
(22, 'Bramasti Adi S', 'Jl. Parit H Muksin												', '081256517308', 'bramsantuy@gmail.com', '364167df3027dc5df772a79e7ef37f1a.JPG', 'bram', '$2y$10$aKJqFw82ZRGjzwpa6.isK.vp0WlblFEu0PnUzZYyvIGCsGRkNmLzO', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sewa`
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
  `status` enum('Menunggu','Diterima','Ditolak','Selesai') NOT NULL,
  `keterangan` text NOT NULL,
  `t_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sewa`
--

INSERT INTO `tb_sewa` (`id`, `id_pendaftar`, `kd_toko`, `id_officer`, `tgl_sewa`, `jangka_sewa`, `tgl_selesai`, `luas_sewa`, `kebutuhan`, `foto_gerobak`, `produk_jual`, `total`, `status`, `keterangan`, `t_biaya`) VALUES
(1, 2, 'FOZQ', '2013046566', '2020-08-25', 10, '2021-06-25', '2x1', 'Listrik dan Air', '3853c3541bc29b78b262111aa57048c5.JPG', 'Tahu Gejrot', 5000000, 'Diterima', '', 100000),
(2, 11, 'F13Y', NULL, '2020-08-25', 2, '2020-10-25', '2x1', 'Listrik dan Air', '8764bf2f516feb8122ce870c4fd58abb.JPG', 'Pandan Bolu', 1000000, 'Menunggu', '', 0),
(3, 20, 'F13Y', '2013223666', '2020-08-15', 5, '2021-01-15', '2x1', 'Listrik dan Air', '24acb18f31dcd1799cb8ad4cc2428e0d.JPG', 'Egg rop', 2500000, 'Menunggu', '', 0),
(4, 22, 'TFLF', '2013223666', '2020-10-20', 3, '0000-00-00', '2x1', 'Listrik dan Air', '8e569d7e14d1375b98f2177d4f454736.JPG', 'Kuch Kuch Hotahu', 2400000, 'Diterima', '', 0),
(5, 22, 'T4XU', NULL, '2020-10-20', 1, '1970-01-01', '2x1', 'Listrik dan Air', 'bfdb7f27b9ff57a57cb5d9d71803ffe8.JPG', 'Thai Thea', 500000, 'Menunggu', '', 0),
(6, 22, 'TFLF', '2013046566', '2020-11-10', 3, '0000-00-00', '2x1', 'Listrik dan Air', '4fccefdad58834afb6d3a89ff15c26ad.JPG', 'Ayam Krispy', 2400000, 'Menunggu', '', 0),
(7, 2, 'FOZQ', '2013046566', '2020-11-30', 2, '2021-01-30', '2x1', 'Listrik', '', 'makanan', 1000000, 'Ditolak', 'Tidak Jelas', 0);

--
-- Trigger `tb_sewa`
--
DELIMITER $$
CREATE TRIGGER `sewa` AFTER INSERT ON `tb_sewa` FOR EACH ROW BEGIN
	UPDATE tb_toko SET kouta_sewa=kouta_sewa-1
    where kd_toko=NEW.kd_toko;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `kd_toko` varchar(4) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` text NOT NULL,
  `harga_sewa` int(8) NOT NULL,
  `kouta_sewa` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`kd_toko`, `nama_toko`, `alamat_toko`, `harga_sewa`, `kouta_sewa`) VALUES
('F07I', 'Idf. Suwignyo', 'Jl. HM Suwignyo', 500000, 3),
('F13Y', 'Idf. Tabrani Ahmad', 'Jl. Tabrani Ahmad', 500000, 0),
('FOZQ', 'Idf. RE Martadinata', 'Jl. RE Martadinata', 500000, 1),
('T1CV', 'Idm. Purnama 156', 'Jl. Purnama', 500000, 4),
('T2ST', 'Idm. Dr Sutomo', 'Jl. Dr. Sutomo', 500000, 4),
('T4XU', 'Idm. Plus Eco Sungai Raya Dala', 'Jl. Sungai Raya Dalam', 500000, 3),
('T6JJ', 'Idm. KH Wahid Hasyim', 'Jl. K.H. Wahid Hasyim', 800000, 4),
('T7B6', 'Idm. Wahidin Raya 45', 'Jl. Dr. Wahidin', 500000, 4),
('T9ZQ', 'Idm. Hybrid Purnama', 'Jl. Purnama', 500000, 4),
('TFLF', 'Idm. Sungai Raya Dalam A2', 'Jl. Sungai Raya Dalam', 800000, 6),
('TH3M', 'Idm. Gusti Situt Mahmud 8', 'Jl. Gusti Situt Mahmud', 500000, 4),
('THMH', 'Idm. Parit H. Husin I', 'Jl. Parit H. Husin I', 500000, 4),
('TMMY', 'Idm. Ahmad Marzuki (Sambas - T', 'Jl. Ahmad Marzuki', 500000, 6),
('TQRU', 'Idm. M Yamin 16', 'Jl. M. Yamin', 500000, 3),
('TWWK', 'Merdeka 196', 'Jl. Merdeka', 800000, 4),
('TYFX', 'Idm. Hybrid 28 Oktober', 'Jl. 28 Oktober', 500000, 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_officer`
--
ALTER TABLE `tb_officer`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pendaftar` (`id_pendaftar`) USING BTREE,
  ADD KEY `id_officer` (`id_officer`) USING BTREE,
  ADD KEY `kd_toko` (`kd_toko`) USING BTREE;

--
-- Indeks untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`kd_toko`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD CONSTRAINT `tb_sewa_ibfk_1` FOREIGN KEY (`id_pendaftar`) REFERENCES `tb_pendaftar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_sewa_ibfk_3` FOREIGN KEY (`id_officer`) REFERENCES `tb_officer` (`nik`) ON DELETE SET NULL,
  ADD CONSTRAINT `tb_sewa_ibfk_4` FOREIGN KEY (`kd_toko`) REFERENCES `tb_toko` (`kd_toko`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
