-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 02:18 PM
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
  `kode_guru` int(20) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `materi_pembelajaran` varchar(255) NOT NULL,
  `jumlah_siswa_hadir` int(10) NOT NULL DEFAULT 0,
  `jumlah_siswa_sakit` int(10) NOT NULL DEFAULT 0,
  `jumlah_siswa_izin` int(10) NOT NULL DEFAULT 0,
  `jumlah_siswa_alpha` int(10) NOT NULL,
  `nama_siswa_sakit` varchar(255) NOT NULL,
  `nama_siswa_izin` varchar(255) NOT NULL,
  `nama_siswa_alpha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jurnal`
--

INSERT INTO `tb_jurnal` (`id_jurnal`, `id_kelas`, `kelas`, `semester`, `tanggal`, `tahun_ajaran`, `jam_ke`, `mata_pelajaran`, `kode_guru`, `nama_guru`, `materi_pembelajaran`, `jumlah_siswa_hadir`, `jumlah_siswa_sakit`, `jumlah_siswa_izin`, `jumlah_siswa_alpha`, `nama_siswa_sakit`, `nama_siswa_izin`, `nama_siswa_alpha`) VALUES
(1, 19, 'X PPLG 1', 1, '2024-02-27', '2023 / 2024', '1 - 3', 'PPKN', 78, 'Deni Ardiyanto, S.Pd', 'Pengertian negara dan cara kerjanya', 35, 1, 2, 1, 'Kipli', 'Ali, Budi', 'Yanto'),
(2, 19, 'X PPLG 1', 1, '2024-02-27', '2022 / 2023', '1 - 4', 'PKK', 13, 'Tutik Solichati, S.Pd', 'Praktek Kewirausahawan', 32, 2, 0, 0, 'Dimas, Alex', '', ''),
(3, 29, 'X TE 2', 2, '2024-02-27', '2021 / 2022', '2 - 4', 'PWPB', 2, 'Nur Khayati, S.Pd, M.A', 'Web', 34, 0, 0, 1, '', '', 'Agung'),
(4, 19, 'X PPLG 1', 1, '2024-02-28', '2023 / 2024', '2 - 5', 'Matematika', 5, 'Anik Setyowati, S.PD, M.A', 'Aljabar', 34, 1, 0, 2, 'Tanto', '', 'Raul, Jamal'),
(5, 19, 'X PPLG 1', 1, '2024-02-01', '2024 / 2025', '2 - 4', 'B. Inggris', 6, 'Sarti, M.Pd', 'Past Tense', 35, 0, 0, 1, '', '', 'Ajik'),
(6, 21, 'X PPLG 3', 1, '2024-03-01', '2024 / 2025', '1 - 2', 'Olahraga', 59, 'Wulan Fitriyani, S.Pd', 'Bola Kecil', 34, 2, 0, 0, 'Yudistira, Riko', '', ''),
(7, 21, 'X PPLG 3', 1, '2024-02-25', '2021 / 2022', '4 - 6', 'Matematika', 8, 'Masrurin, S.Kom', 'Fungsi', 35, 1, 1, 1, 'Bagus', 'Isna', 'Ronald'),
(8, 33, 'XI TE 3', 1, '2024-03-03', '2012 / 2013', '4 - 5', 'BK', 41, 'Maria Ani Lestari, S.Pd', 'Narkoba', 34, 0, 1, 0, '', 'Ivan', ''),
(9, 39, 'XI TKI 1', 1, '2024-03-03', '2024 / 2025', '1 - 4', 'PPKN', 46, 'Andi Prabowo, S.Pd', 'Dasar Dasar Kimia', 32, 1, 2, 1, 'Sandika', 'Zahira, Alya', 'Alya'),
(10, 19, 'X PPLG 1', 2, '2024-03-03', '2022 / 2023', '2 - 3', 'Asd', 1, 'Abdul Malik Nugroho, S.Pd.T', 'Asd', 35, 0, 1, 0, '', 'Asd', ''),
(11, 21, 'X PPLG 3', 1, '2024-03-03', '2023 / 2024', '2 - 3', 'Matematika', 2, 'Nur Khayati, S.Pd, M.A', 'Adasd', 36, 0, 0, 0, '', '', ''),
(12, 21, 'X PPLG 3', 1, '2024-03-03', '2023 / 2024', '1 - 3', 'PPKN', 77, 'Edwin Fatah, S.Pd', 'Negara', 35, 1, 0, 0, 'Bagus', '', ''),
(13, 21, 'X PPLG 3', 1, '2024-03-03', '2023 / 2024', '1 - 2', 'Asd', 12, 'Surtiyem, S.Pd', 'Ads', 36, 0, 0, 0, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `kode_guru` (`kode_guru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD CONSTRAINT `tb_jurnal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jurnal_ibfk_2` FOREIGN KEY (`kode_guru`) REFERENCES `tb_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
