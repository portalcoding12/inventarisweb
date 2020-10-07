-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 12:43 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbinventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail_pinjam` varchar(150) NOT NULL,
  `id_inventaris` varchar(150) NOT NULL,
  `id_peminjaman` varchar(150) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail_pinjam`, `id_inventaris`, `id_peminjaman`, `jumlah_pinjam`) VALUES
('5ca7239eb2fa2', '5ca7151726dd0', '5ca722beee41f', 2),
('5ca743bd34500', '5ca7151726dd0', '5ca743bd344fc', 2),
('5ca746d4049e6', '5ca746b8040ab', '5ca746d4049e2', 1),
('5ca76da84224e', '5ca7151726dd0', '5ca76da842249', 3),
('5ca824926b443', '5ca7151726dd0', '5ca824926b43f', 1),
('5d0a0c96e1159', '5d0a0c5f891c1', '5d0a0c96e1155', 3);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kondisi` varchar(150) NOT NULL,
  `keterangan_inventaris` varchar(500) NOT NULL,
  `jumlah` varchar(65) NOT NULL,
  `id_jenis` varchar(150) NOT NULL,
  `tanggal_register` date NOT NULL,
  `id_ruang` varchar(150) NOT NULL,
  `kode_inventaris` varchar(65) NOT NULL,
  `id_petugas` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama`, `kondisi`, `keterangan_inventaris`, `jumlah`, `id_jenis`, `tanggal_register`, `id_ruang`, `kode_inventaris`, `id_petugas`) VALUES
('5ca7151726dd0', 'Kursi kelas XII RPL', 'Baik', 'Kursi di kelas xii rpl, 2 kursi rusak.', '30', '5ca711c216ec6', '2019-04-05', '5ca713726c40a', 'kursixiirpl001', '5ca70d369823e'),
('5ca746b8040ab', 'Papan tulis kelas XII RPL', 'Sangat Baik', 'Papan tulis yang ada di kelas xii rpl', '1', '5ca7467421ec7', '2019-04-05', '5ca713726c40a', 'papantulisxiirpl001', '5ca70d369823e'),
('5d0a0c5f891c1', 'Kasur busa Kelas XII RPL', 'Sangat Baik', 'kasur busa untuk kelas xii rpl', '4', '5d0a0c0ca7437', '2019-06-19', '5ca713726c40a', 'kasurbusaxiirpl', '5ca70d369823e');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(150) NOT NULL,
  `nama_jenis` varchar(150) NOT NULL,
  `kode_jenis` varchar(150) NOT NULL,
  `keterangan_jenis` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan_jenis`) VALUES
('5ca711c216ec6', 'Kayu', 'kayujati001', 'untuk barang dari bahan jenis kayu jati'),
('5ca7467421ec7', 'Tripleks', 'tripleks01', 'untuk barang dengan jenis tripleks'),
('5d0a0c0ca7437', 'kasur busa', 'kasurbusa001', 'kasur busa ukuran 3 x 2 meter. stok ada 30');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'administrator'),
(2, 'operator'),
(3, 'peminjam');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(150) NOT NULL,
  `nama_pegawai` varchar(150) NOT NULL,
  `nip` int(11) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `alamat`) VALUES
('5ca715b32dc12', 'Sugito Munawar', 2147483647, 'Bandar agung lahat'),
('5ca746481bab3', 'Anggun Tri Puspa Sari', 2147483647, 'desa banjar negara'),
('5caaa8edc9a08', 'Si A', 2147483647, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(150) NOT NULL,
  `id_petugas` varchar(150) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_peminjaman` varchar(150) NOT NULL,
  `id_pegawai` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_petugas`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `id_pegawai`) VALUES
('5ca722beee41f', '5ca70d9db59d3', '2019-04-05', '2019-04-05', 'telah dikembalikan', '5ca715b32dc12'),
('5ca743bd344fc', '5ca70d369823e', '2019-04-05', '2019-12-05', 'telah dikembalikan', '5ca715b32dc12'),
('5ca746d4049e2', '5ca70d369823e', '2019-04-05', '2019-04-08', 'telah dikembalikan', '5ca746481bab3'),
('5ca76da842249', '5ca70d369823e', '2019-04-05', '2019-04-12', 'telah dikembalikan', '5ca715b32dc12'),
('5ca824926b43f', '5ca70d9db59d3', '2019-04-06', '2019-04-13', 'telah dikembalikan', '5ca746481bab3'),
('5d0a0c96e1155', '5ca70d369823e', '2019-06-19', '2019-06-26', 'telah dikembalikan', '5caaa8edc9a08');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(150) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `nama_petugas` varchar(150) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `id_level`) VALUES
('5ca70d369823e', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 1),
('5ca70d9db59d3', 'operator', '4b583376b2767b923c3e1da60d10de59', 'Operator', 2),
('5ca70db9d8d61', 'peminjam', '55f3894bc5fc71fead8412d321c2952c', 'Peminjam', 3),
('5caa8f8c5161b', 'erji12', '2a805f543806b3e4c04d36cdb4a2b06c', 'erji ridho lubis', 1),
('5d0a0e676e220', 'operator', '7815696ecbf1c96e6894b779456d330e', 'cv testing', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(150) NOT NULL,
  `nama_ruang` varchar(150) NOT NULL,
  `kode_ruang` varchar(150) NOT NULL,
  `keterangan_ruang` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `keterangan_ruang`) VALUES
('5ca713726c40a', 'ruang 01', 'ruang01', 'ruangan 01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `id_inventaris` (`id_inventaris`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `detail_pinjam_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pinjam_ibfk_2` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventaris_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
