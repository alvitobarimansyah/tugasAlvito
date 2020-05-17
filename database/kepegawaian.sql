-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2020 pada 05.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diklat`
--

CREATE TABLE `diklat` (
  `id` int(11) NOT NULL,
  `idpegawai` int(11) NOT NULL,
  `idmateri` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diklat`
--

INSERT INTO `diklat` (`id`, `idpegawai`, `idmateri`, `keterangan`) VALUES
(1, 22, 1, 'sedang berlangsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `nama`) VALUES
(1, 'Direktur Utama'),
(2, 'Direktur Keuangan'),
(3, 'Direktur'),
(4, 'Direktur Pemasaran'),
(5, 'Direktur Operasional'),
(6, 'IT'),
(7, 'Jaringan'),
(8, 'Projek'),
(9, 'Engineering'),
(10, 'Operasional'),
(11, 'Marketing'),
(12, 'Keuangan dan Umum'),
(13, 'Administrasi dan Gudang'),
(15, ' QC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `idpegawai` int(11) NOT NULL,
  `gapok` double NOT NULL,
  `tunjab` double NOT NULL,
  `lain2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id`, `idpegawai`, `gapok`, `tunjab`, `lain2`) VALUES
(1, 1, 20000000, 10000000, 5000000),
(2, 2, 15000000, 7500000, 3750000),
(3, 3, 15000000, 7500000, 3750000),
(4, 4, 15000000, 7500000, 3750000),
(5, 5, 15000000, 7500000, 3750000),
(6, 6, 10000000, 5000000, 2500000),
(7, 7, 10000000, 5000000, 2500000),
(8, 8, 10000000, 5000000, 2500000),
(9, 9, 10000000, 5000000, 2500000),
(10, 10, 10000000, 5000000, 2500000),
(11, 11, 10000000, 5000000, 2500000),
(12, 12, 10000000, 5000000, 2500000),
(13, 13, 10000000, 5000000, 2500000),
(14, 14, 5000000, 2500000, 1250000),
(15, 15, 5000000, 2500000, 1250000),
(16, 16, 5000000, 2500000, 1250000),
(17, 17, 5000000, 2500000, 1250000),
(18, 18, 5000000, 2500000, 1250000),
(19, 19, 5000000, 2500000, 1250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(1, 'Dewan Direksi'),
(2, 'Manager'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tempat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `nama`, `tgl_mulai`, `tgl_akhir`, `tempat`) VALUES
(1, ' Phyton Data Science', '2020-04-01', '2020-07-01', ' Universitas Indonesia'),
(3, 'Android Developer', '2020-05-01', '2020-08-01', 'STT Nurul Fikri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` enum('administrator','manager','staff') NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `fullname`, `username`, `password`, `role`, `email`, `foto`) VALUES
(2, 'Budi Santoso', 'budi', '83161a62f22277c65a6cdb7ebc314f218c376c63', 'manager', 'budi@gmail.com', NULL),
(16, 'Alvito Barimansyah', 'alvito', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'administrator', 'alvitocikini@gmail.com', ''),
(19, 'Sunandar', 'sunan', '74424c634acdac8608a2994f1c6f9b53701f7a8f', 'staff', 'sunan@gmail.com', ''),
(20, 'Alfian Cahya', 'alfian', '54897a260862d9ed92d8c97c43f42348e888282a', 'staff', 'alfian@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `idjabatan` int(11) NOT NULL,
  `iddivisi` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `gender`, `idjabatan`, `iddivisi`, `alamat`, `foto`) VALUES
(1, '202103L001    ', 'Alvito ', 'L', 1, 1, ' Jakarta         ', ''),
(2, '202103L002', 'Sunan', 'L', 1, 2, 'Jakarta', NULL),
(3, '202103P003', 'Sarlin', 'P', 1, 3, 'Bogor', NULL),
(4, '202103L004', 'Alfian', 'L', 1, 4, 'Jakarta', NULL),
(5, '202103L005', 'Danu', 'L', 1, 5, 'Jakarta', NULL),
(6, '202103L006', 'Rio', 'L', 2, 6, 'Jakarta', NULL),
(7, '202103P007', 'Helen', 'P', 2, 7, 'Jakarta', NULL),
(8, '202103P008', 'Okta', 'P', 2, 8, 'Jakarta', NULL),
(9, '202103L009', 'Seno', 'L', 2, 9, 'Jakarta', NULL),
(10, '202103P010', 'Sella', 'P', 2, 10, 'Jakarta', NULL),
(11, '202103P011', 'Riyah', 'P', 2, 11, 'Jakarta', NULL),
(12, '202103P012', 'Esthu', 'P', 2, 12, 'Bekasi', NULL),
(13, '202103P013', 'Cony', 'P', 2, 13, 'Jakarta', NULL),
(14, '202103P014', 'Ilena', 'P', 3, 6, 'Jakarta', NULL),
(15, '202103L015', 'Dimas', 'L', 3, 7, 'Jakarta', NULL),
(16, '202103L016', 'Ridwan', 'L', 3, 8, 'Jakarta', NULL),
(17, '202103P017', 'Naila', 'P', 3, 9, 'Jakarta', NULL),
(18, '202103L018', 'Noris', 'L', 3, 10, 'Jakarta', NULL),
(19, '202103L019', 'Agung', 'L', 3, 11, 'Jakarta', NULL),
(20, '202103L020', 'Fajar', 'P', 3, 12, 'Jakarta', NULL),
(21, '202103L021', 'Dimas A.', 'L', 3, 13, 'Jakarta', NULL),
(22, '202104L022', 'Irfan', 'L', 3, 6, 'Jakarta', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diklat`
--
ALTER TABLE `diklat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_diklat_pegawai2_idx` (`idpegawai`),
  ADD KEY `fk_diklat_materi2_idx` (`idmateri`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gaji_pegawai1_idx` (`idpegawai`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pegawai_divisi_idx` (`iddivisi`),
  ADD KEY `fk_pegawai_jabatan1_idx` (`idjabatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diklat`
--
ALTER TABLE `diklat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `diklat`
--
ALTER TABLE `diklat`
  ADD CONSTRAINT `fk_diklat_materi2` FOREIGN KEY (`idmateri`) REFERENCES `materi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_diklat_pegawai2` FOREIGN KEY (`idpegawai`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `fk_gaji_pegawai1` FOREIGN KEY (`idpegawai`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_pegawai_divisi` FOREIGN KEY (`iddivisi`) REFERENCES `divisi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pegawai_jabatan1` FOREIGN KEY (`idjabatan`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
