-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2020 pada 15.48
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `credential_id_credential` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `credential`
--

CREATE TABLE `credential` (
  `id_credential` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `credential`
--

INSERT INTO `credential` (`id_credential`, `status`) VALUES
(1, 'admin'),
(2, 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `credential_id_credential` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kajur`
--

CREATE TABLE `kajur` (
  `id_kajur` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `credential_id_credential` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `credential_id_credential` int(11) NOT NULL,
  `skripsi_id_skripsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `email`, `kontak`, `credential_id_credential`, `skripsi_id_skripsi`) VALUES
(1, '1841720001', 'aldo dola', 'aldodola@gmail.com', '081216777377', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi_proses` int(11) NOT NULL,
  `mahasiswa_nim` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `dosen_id_dosen` int(11) NOT NULL,
  `kajur_id_kajur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi_personal`
--

CREATE TABLE `skripsi_personal` (
  `id_skripsi` int(11) NOT NULL,
  `judul` varchar(45) DEFAULT NULL,
  `file` varchar(45) DEFAULT NULL,
  `tema` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skripsi_personal`
--

INSERT INTO `skripsi_personal` (`id_skripsi`, `judul`, `file`, `tema`) VALUES
(1, 'pompa air', NULL, 'sains');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `fk_admin_credential1_idx` (`credential_id_credential`);

--
-- Indeks untuk tabel `credential`
--
ALTER TABLE `credential`
  ADD PRIMARY KEY (`id_credential`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `fk_dosen_credential1_idx` (`credential_id_credential`);

--
-- Indeks untuk tabel `kajur`
--
ALTER TABLE `kajur`
  ADD PRIMARY KEY (`id_kajur`),
  ADD KEY `fk_kajur_credential1_idx` (`credential_id_credential`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `fk_mahasiswa_credential1_idx` (`credential_id_credential`),
  ADD KEY `fk_mahasiswa_skripsi1_idx` (`skripsi_id_skripsi`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi_proses`),
  ADD KEY `fk_skripsi_proses_mahasiswa1_idx` (`mahasiswa_nim`),
  ADD KEY `fk_skripsi_dosen1_idx` (`dosen_id_dosen`),
  ADD KEY `fk_skripsi_kajur1_idx` (`kajur_id_kajur`);

--
-- Indeks untuk tabel `skripsi_personal`
--
ALTER TABLE `skripsi_personal`
  ADD PRIMARY KEY (`id_skripsi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `credential`
--
ALTER TABLE `credential`
  MODIFY `id_credential` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kajur`
--
ALTER TABLE `kajur`
  MODIFY `id_kajur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id_skripsi_proses` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_credential1` FOREIGN KEY (`credential_id_credential`) REFERENCES `credential` (`id_credential`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_dosen_credential1` FOREIGN KEY (`credential_id_credential`) REFERENCES `credential` (`id_credential`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kajur`
--
ALTER TABLE `kajur`
  ADD CONSTRAINT `fk_kajur_credential1` FOREIGN KEY (`credential_id_credential`) REFERENCES `credential` (`id_credential`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_mahasiswa_credential1` FOREIGN KEY (`credential_id_credential`) REFERENCES `credential` (`id_credential`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mahasiswa_skripsi1` FOREIGN KEY (`skripsi_id_skripsi`) REFERENCES `skripsi_personal` (`id_skripsi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `fk_skripsi_dosen1` FOREIGN KEY (`dosen_id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_skripsi_kajur1` FOREIGN KEY (`kajur_id_kajur`) REFERENCES `kajur` (`id_kajur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_skripsi_proses_mahasiswa1` FOREIGN KEY (`mahasiswa_nim`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
