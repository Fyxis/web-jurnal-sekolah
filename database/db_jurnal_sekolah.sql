-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 03:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jurnal_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurnal`
--

CREATE TABLE `tb_jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `semester` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `jam_ke` varchar(50) NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `kode_guru` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `materi_pembelajaran` varchar(255) NOT NULL,
  `jumlah_siswa_hadir` int(10) NOT NULL,
  `jumlah_siswa_sakit` int(10) NOT NULL,
  `jumlah_siswa_alpha` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jurnal`
--

INSERT INTO `tb_jurnal` (`id_jurnal`, `id_kelas`, `kelas`, `semester`, `tanggal`, `tahun_ajaran`, `jam_ke`, `mata_pelajaran`, `kode_guru`, `nama_guru`, `materi_pembelajaran`, `jumlah_siswa_hadir`, `jumlah_siswa_sakit`, `jumlah_siswa_alpha`) VALUES
(1, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '4 - 6', 'Bahasa Indonesia', 'GR001', 'Samsudin', 'Pengenalan Huruf, angka, notasi, dan aljabar.', 33, 2, 0),
(2, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(3, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(4, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(5, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(6, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(7, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(8, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(9, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(10, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(11, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(12, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(13, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(14, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(15, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(16, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(17, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7),
(18, 1, 'XII RPL 2', 2, '2024-02-21', '2023 / 2024', '1 - 5', 'B. Inggris', 'GR002', 'Sarti', 'Verb', 21, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `pria` int(11) NOT NULL,
  `wanita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `jumlah_siswa`, `pria`, `wanita`) VALUES
(1, 'XII RPL 2', 35, 13, 22),
(2, 'XII RPL 1', 36, 15, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD CONSTRAINT `tb_jurnal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
