-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2024 pada 21.14
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerja_praktek_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerja_praktek`
--

CREATE TABLE `kerja_praktek` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `tempat_magang` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `pembimbing1` varchar(100) DEFAULT NULL,
  `pembimbing2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kerja_praktek`
--

INSERT INTO `kerja_praktek` (`id`, `judul`, `nim`, `nama_mahasiswa`, `angkatan`, `tempat_magang`, `kota`, `pembimbing1`, `pembimbing2`) VALUES
(20, 'Implementasi Aplikasi Mobile untuk Pemantauan Kesehatan', '6404221090', 'Riduwan', '2021', 'RSU Jakarta', 'Jakarta', 'Niky Hardinata, M.Kom', 'Desi Amirullah, M.T'),
(21, 'Pembangunan Sistem E-Commerce Berbasis Web dengan PHP dan MySQL', '6404221091', 'Jeremia Peswadi Ginting', '2022', 'Startup E-Commerce', 'Surabaya', 'Eko Prayitno, M.Kom', 'Lipantri Mashur Gultom, M.Kom'),
(23, 'Pengembangan Aplikasi Sistem Pendukung Keputusan untuk Penilaian Karyawan', '6404221093', 'Azmil Fikri', '2020', 'HRD Perusahaan', 'Yogyakarta', 'Sri Mawarni, M.Si', 'Supria, M.Kom'),
(24, 'Desain dan Implementasi Sistem Basis Data Menggunakan PostgreSQL', '6404221094', 'M. Ikhwanur Royyan', '2022', 'Startup Database', 'Makassar', 'Tengku Musri, M.Kom', 'Wahyat, M.Kom'),
(25, 'Pengembangan Website Portofolio Berbasis CMS WordPress', '6404221095', 'Ona Mazura', '2021', 'Freelancer', 'Palembang', 'Mansur, M.Kom', 'Agus Tedyyana, M.Kom'),
(26, 'Penerapan Teknologi Blockchain dalam Sistem Keuangan', '6404221096', 'Fiyona Qaisara Betrisyia', '2020', 'Perusahaan Fintech', 'Bali', 'Fajar Ratnawati, M.Cs', 'Fajri Profesio Putra, M.Cs'),
(27, 'Rancang Bangun Sistem Manajemen Proyek Berbasis Cloud', '6404221097', 'Wahyu Danuarta', '2022', 'Perusahaan Konsultan', 'Makassar', 'Elvi Rahmi, S.T., M.Kom', 'Eva Yumami, S.Kom., M.T'),
(28, 'Pengembangan Aplikasi IoT untuk Monitoring Energi Rumah Tangga', '6404221098', 'Irfan Sazali', '2021', 'Perusahaan IoT', 'Semarang', 'Fajar Ratnawati, M.Cs', 'Jaroji, M.Kom'),
(29, 'Penerapan Algoritma Machine Learning untuk Prediksi Penjualan', '6404221099', 'Febi Wulan Adha', '2022', 'Startup Data Science', 'Surabaya', 'Kasmawi, M.Kom', 'Ryci Rahmatil Fiska, M.Kom'),
(30, 'Desain dan Implementasi Sistem Otomasi Rumah Pintar Menggunakan Arduino', '6404221100', 'Jeny Marliana', '2020', 'Perusahaan Elektronik', 'Denpasar', 'Sri Mawarni, M.Si', 'Muhammad Asep Subandri, M.Kom'),
(31, 'Pengembangan Sistem Informasi Akademik untuk Sekolah Menengah', '6404221102', 'Muhira Rani', '2021', 'Sekolah Menengah', 'Bandung', 'Nurmi Hidayasari, ST., M.Kom', 'Rezki Kurniati, M.Kom'),
(32, 'Implementasi Virtual Reality dalam Aplikasi Pelatihan Keterampilan Teknik', '6404221103', 'Syahrudi Yahya', '2022', 'Perusahaan VR', 'Medan', 'Agus Tedyyana, M.Kom', 'Elvi Rahmi, S.T., M.Kom'),
(34, 'Pengembangan Sistem Informasi Manajemen Perpustakaan', '6404221105', 'Muhammad Syafiq Fikri', '2021', 'Perpustakaan Universitas', 'Bali', 'Elvi Rahmi, S.T., M.Kom', 'Sri Mawarni, M.Si'),
(35, 'Implementasi Aplikasi Mobile untuk Pemantauan Kesehatan', '6404221106', 'Mona Ratuliu', '2022', 'RSU Jakarta', 'Jakarta', 'Fajar Ratnawati, M.Cs', 'Jaroji, M.Kom'),
(36, 'Pembangunan Sistem E-Commerce Berbasis Web dengan PHP dan MySQL', '6404221107', 'Aldi Suhandi', '2020', 'Startup E-Commerce', 'Surabaya', 'Kasmawi, M.Kom', 'Nurmi Hidayasari, ST., M.Kom'),
(37, 'Analisis dan Perancangan Sistem Keamanan Jaringan Komputer', '6404221108', 'Fazri Nugraha', '2021', 'PT. Victory International Futures', 'Yogyakarta', 'Mansur, M.Kom', 'Ryci Rahmatil Fiska, M.Kom'),
(38, 'Pengembangan Aplikasi Sistem Pendukung Keputusan untuk Penilaian Karyawan', '6404221109', 'Diwo Hasqavarna', '2022', 'HRD Perusahaan', 'Palembang', 'Muhammad Nasir, M.Kom', 'Fajri Profesio Putra, M.Cs'),
(39, 'Desain dan Implementasi Sistem Basis Data Menggunakan PostgreSQL', '6404221110', 'Dea Agustina Purba', '2020', 'Startup Database', 'Medan', 'Lipantri Mashur Gultom, M.Kom', 'Depandi Enda, M.Kom'),
(40, 'Pengembangan Website Portofolio Berbasis CMS WordPress', '6404221111', 'Suci Maharani', '2021', 'Freelancer', 'Bandung', 'Tengku Musri, M.Kom', 'Nurul Fahmi, M.T'),
(41, 'Penerapan Teknologi Blockchain dalam Sistem ', '6404221112', 'Fatullazi Abdul Haq', '2022', 'Perusahaan Fintech', 'Jakarta', 'Eva Yumami, S.Kom., M.T', 'Fajar Ratnawati, M.Cs'),
(42, 'Rancang Bangun Sistem Manajemen Proyek Berbasis Cloud', '6404221114', 'M.Isma Halil', '2020', 'Perusahaan Konsultan', 'Makassar', 'Elvi Rahmi, S.T., M.Kom', 'Jaroji, M.Kom'),
(43, 'Pengembangan Aplikasi IoT untuk Monitoring Energi Rumah Tangga', '6404221115', 'Jefry Subastian', '2021', 'Perusahaan IoT', 'Surabaya', 'Muhammad Asep Subandri, M.Kom', 'Lidya Wati, M.kom'),
(44, 'Penerapan Algoritma Machine Learning untuk Prediksi Penjualan', '6404221116', 'Juliyono', '2022', 'Startup Data Science', 'Denpasar', 'Kasmawi, M.Kom', 'Ryci Rahmatil Fiska, M.Kom'),
(45, 'Desain dan Implementasi Sistem Otomasi Rumah Pintar Menggunakan Arduino', '6404221117', 'Muhammad Ridho', '2020', 'Perusahaan Elektronik', 'Jakarta', 'Fajri Profesio Putra, M.Cs', 'Elvi Rahmi, S.T., M.Kom'),
(46, 'Pengembangan Sistem Informasi Akademik untuk Sekolah Menengah', '6404221118', 'Hidayatur Romadhan', '2021', 'Sekolah Menengah', 'Palembang', 'Sri Mawarni, M.Si', 'Mansur, M.Kom'),
(47, 'Implementasi Virtual Reality dalam Aplikasi Pelatihan Keterampilan Teknik', '6404221119', 'Nurulfadhlia', '2022', 'Perusahaan VR', 'Bandung', 'Eva Yumami, S.Kom., M.T', 'Tengku Musri, M.Kom'),
(48, 'Analisis Keamanan dan Perlindungan Data pada Sistem Cloud Computing', '6404221120', 'Muhammad Kurniawan Akbar', '2020', 'Perusahaan Cloud', 'Yogyakarta', 'Jaroji, M.Kom', 'Depandi Enda, M.Kom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Koordinator','Mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `role`) VALUES
(1, 'koordinator1', '$2y$10$G3iFJScdlvdbYGAnO4vRNOJMEEXkxcD1ytfHQ.y3ncnuopX.BkJ6S', 'Koordinator'),
(2, 'mahasiswa1', '$2y$10$VcdtSk5XptNrqqV3MXsF8Oxi/dZQFJBC4sTvgZ02AJkTqcU90V3Ou', 'Mahasiswa'),
(3, 'mahasiswa', '$2y$10$QxPobkzFPJc1vzH4zsLpfu6AyVM0kEC/RsXMZPGdmn/uuHFK8mLHK', 'Mahasiswa'),
(4, 'koordinator', '$2y$10$zahQW2G8btPcmVFtyS2tSeQgd2coHbSXt55K3.x4vH5/cR2XPC4je', 'Koordinator'),
(5, 'fazri nugraha', '$2y$10$P9a.ScVfsE3DBFMAuyKBr.5QWStPpW94zWnKdWcINfkIZenEolZya', 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kerja_praktek`
--
ALTER TABLE `kerja_praktek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kerja_praktek`
--
ALTER TABLE `kerja_praktek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
