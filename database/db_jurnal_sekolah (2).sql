-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2024 pada 15.57
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `kode_guru` int(20) NOT NULL,
  `nama_guru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `kode_guru`, `nama_guru`) VALUES
(1, 1, 'Abdul Malik Nugroho, S.Pd.T'),
(2, 2, 'Nur Khayati, S.Pd, M.A'),
(3, 3, 'SR Putriyanti, S.Pd'),
(4, 4, 'Siti Zoelaichah, S.Pd, M.A'),
(5, 5, 'Anik Setyowati, S.PD, M.A'),
(6, 6, 'Sarti, M.Pd'),
(7, 7, 'Dra. St Salis Jazilah'),
(8, 8, 'Masrurin, S.Kom'),
(9, 9, 'Herry Iswahyuadi, S.Pd, M.A'),
(10, 10, 'Joko Pamuji Rahayu, S.Pd'),
(11, 11, 'Istiqomah, S.Pd'),
(12, 12, 'Surtiyem, S.Pd'),
(13, 13, 'Tutik Solichati, S.Pd'),
(14, 14, 'Moch Sopham Kurniawan, S.H'),
(15, 15, 'Subuh Widayat, S.Pd'),
(16, 16, 'Tuswuri Handayani, S.Pd, M.Pd'),
(17, 17, 'Prih Harjanto, S.Pd'),
(18, 18, 'Nur Wachid, S.Pd'),
(19, 19, 'Heribertus Didik H, S.T'),
(20, 20, 'Junaedi, S.T'),
(21, 21, 'Imam Supriyitno, S.T, M.M'),
(22, 22, 'Ifana, S.Pd'),
(23, 23, 'Eny Suskandani, S.Pd'),
(24, 24, 'Dini Lestari, S.S'),
(25, 25, 'Joko Supriyono, S.Pd, M.A'),
(26, 26, 'Didik Fatoni, S.Pd'),
(27, 27, 'Ria Nurma M, S.Kom'),
(28, 28, 'Siska Pris Setyanti, S.S'),
(29, 29, 'Ellysa Purwaningsih, S.Pd'),
(30, 30, 'Misno, S.T, M.Eng'),
(31, 31, 'Zaenal Arifin, S.Kom'),
(32, 32, 'Suroto, S.Pd.,M.Pd'),
(33, 33, 'Asep Nur Ajiyanti, S.Pd'),
(34, 34, 'Anafia Kurniawan, S.Kom'),
(35, 35, 'Muhamad Ariyanto, S.Kom'),
(36, 36, 'Nova Dyah W, S.Pd'),
(37, 37, 'Haning Muhadesi, S.T'),
(38, 38, 'Istiana, S.Pd'),
(39, 39, 'Tri Rimbawanti, S.S'),
(40, 40, 'Sari Nurani Rahayu, S.Sos'),
(41, 41, 'Maria Ani Lestari, S.Pd'),
(42, 42, 'Desi Umi Nurany, S.Pd'),
(43, 43, 'Tri Suprapti, S.Pd'),
(44, 44, 'Eko Asiyamto, S.Pd'),
(45, 45, 'C. Surman, S.Th'),
(46, 46, 'Andi Prabowo, S.Pd'),
(47, 47, 'Subchan, S.Fill'),
(48, 48, 'Tun Wahyuni, S.Pd'),
(49, 49, 'Tukaryanto, S.Pd'),
(50, 50, 'Pitri Purwanti, S.Kom'),
(51, 51, 'Lilik Hanifah, S.Kom'),
(52, 52, 'Septiana Andari, S.Kom'),
(53, 53, 'Sumiyati, S.Ag, M.Pd.H'),
(54, 54, 'Yoga Alit Pamungkas, S.Si'),
(55, 55, 'Anggo Dwi hartanto, S.Pd'),
(56, 56, 'Moch. Tasykur C N, S.Pd'),
(57, 57, 'Argiansyah Amin G, S.Pd'),
(58, 58, 'Nina saputri, S.Pd'),
(59, 59, 'Wulan Fitriyani, S.Pd'),
(60, 60, 'Cornado Setyo Sakti, S.Pd'),
(61, 61, 'M. Mustofa, S.Pd.I'),
(62, 62, 'Fatma Afifah, S.Pd'),
(63, 63, 'Muhamad Tri Wahyu S, S.Pd'),
(64, 64, 'Wulan Nila Sakti, S.Pd'),
(65, 65, 'Fitri Nur Aini, S.Pd'),
(66, 66, 'Supiyarni, S.Pd'),
(67, 67, 'Fikra Fahma Ihdina, S.Kom'),
(68, 68, 'Wahyu Pujiono, S.T'),
(69, 69, 'Putri Kartika Sari, S.Pd'),
(70, 70, 'Riza Heri Widodo, S.T'),
(71, 71, 'Indiana Krisnawati, S.T'),
(72, 72, 'Adi Zulkarnain, S.Kom'),
(73, 73, 'Dianing Ratri Oktaviani, S.Kom'),
(74, 74, 'Nardi, S.Pd'),
(75, 75, 'Muhammad Misbachul Munir, S.Pd'),
(76, 76, 'Arif Darmawan, S.T'),
(77, 77, 'Edwin Fatah, S.Pd'),
(78, 78, 'Deni Ardiyanto, S.Pd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurnal`
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
  `jumlah_siswa_hadir` int(10) NOT NULL,
  `jumlah_siswa_sakit` int(10) NOT NULL,
  `jumlah_siswa_izin` int(10) NOT NULL,
  `jumlah_siswa_alpha` int(10) NOT NULL,
  `nama_siswa_sakit` varchar(255) NOT NULL,
  `nama_siswa_izin` varchar(255) NOT NULL,
  `nama_siswa_alpha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `pria` int(11) NOT NULL,
  `wanita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `jumlah_siswa`, `pria`, `wanita`) VALUES
(1, 'XII RPL 2', 35, 13, 22),
(2, 'XII RPL 1', 36, 15, 21);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `kode_guru` (`kode_guru`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD CONSTRAINT `tb_jurnal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jurnal_ibfk_2` FOREIGN KEY (`kode_guru`) REFERENCES `tb_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
