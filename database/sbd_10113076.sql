-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2016 at 07:28 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14
drop database if exists sbd_10113076;
create database sbd_10113076;
use sbd_10113076;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbd_10113076`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` enum('Sakit','Izin','Alpa','Hadir') DEFAULT NULL,
  `id_kelas` varchar(8) DEFAULT NULL,
  `id_siswa` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `tanggal`, `keterangan`, `id_kelas`, `id_siswa`) VALUES
(12, '2016-01-24', 'Izin', 'K1', '10113070'),
(13, '2016-01-24', 'Hadir', 'K1', '10115001'),
(14, '2016-01-24', 'Sakit', 'K1', '10115002');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(8) NOT NULL,
  `nama_guru` varchar(20) DEFAULT NULL,
  `jk` enum('Pria','Wanita') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `foto_profil` varchar(254) DEFAULT NULL,
  `status` enum('Admin','Guru') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `jk`, `tgl_lahir`, `email`, `username`, `password`, `no_telp`, `foto_profil`, `status`) VALUES
('P1', 'Bayu Ganteng bingit', 'Pria', '1994-05-17', 'bayupaoh@gmail.com', 'bayupaoh', 'e10adc3949ba59abbe56e057f20f883e', '85738812545', 'bayu.png', 'Admin'),
('P10', 'Arifin sadara', 'Pria', '2016-01-13', 'samsul@gmail.com', 'samsul17', 'e10adc3949ba59abbe56e057f20f883e', '0874548348932', '248ecd98a82ff388146231f311dcf4d8.png', 'Guru'),
('P2', 'Samsul Arifin', 'Pria', '1994-05-17', 'samsularifin@gmail.com', 'samsularifin', '827ccb0eea8a706c4c34a16891f84e7b', '85738812545', 'samsularifin.jpg', 'Guru'),
('P3', 'Diyang Mardiana', 'Pria', '1994-05-17', 'diyangmardiana@gmail.com', 'diyang', 'e10adc3949ba59abbe56e057f20f883e', '85738812545', 'samsularifin.jpg', 'Guru'),
('P9', 'bay upaoh', 'Wanita', '1995-01-24', 'bay_upaoh@gmail.com', 'bay_u', '827ccb0eea8a706c4c34a16891f84e7b', '085123456789', '1b2830f6d00ca39cdb8819ce577c552c.png', 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(8) NOT NULL,
  `nama_kelas` varchar(20) DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_guru` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_sekolah`, `id_guru`) VALUES
('I9', 'R045', 1, 'P9'),
('K1', 'VII-A', 1, 'P2'),
('K2', 'VII-B', 1, 'P3'),
('K3', 'VIII-B', 1, 'P2');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat`, `deskripsi`) VALUES
(1, 'SMP Negeri 1 Cikijing', 'Jl. Cikijing Raya Majalengka 1', 'Sekolah yang fokus akan teknologi informasi. semoga dengan website ini sekolah ini bisa menjadi lebih baik lagi.amminnn');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah_backup`
--

CREATE TABLE `sekolah_backup` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah_backup`
--

INSERT INTO `sekolah_backup` (`id_sekolah`, `nama_sekolah`, `alamat`, `deskripsi`) VALUES
(1, 'SMP Negeri 1 Cikijing', 'Jl. Cikijing Raya Majalengka 1', 'Sekolah yang fokus akan teknologi informasi. semoga dengan website ini sekolah ini bisa menjadi lebih baik lagi.');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(8) NOT NULL,
  `nama_siswa` varchar(20) DEFAULT NULL,
  `jk` enum('Pria','Wanita') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `nama_ortu` varchar(20) DEFAULT NULL,
  `telp_ortu` varchar(13) DEFAULT NULL,
  `id_kelas` varchar(8) DEFAULT NULL,
  `foto_murid` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `jk`, `tgl_lahir`, `alamat`, `no_telp`, `nama_ortu`, `telp_ortu`, `id_kelas`, `foto_murid`) VALUES
('10113070', 'bah kjkj', 'Pria', '2016-01-01', 'ahjhajk', '87676766767', 'bayuyuayuy', '86562565', 'K1', '1b2830f6d00ca39cdb8819ce577c552c.png'),
('10115001', 'Bayu Tampan Sekali', 'Pria', '1994-05-17', 'Cikijing', '85738812545', 'Asep', '85237373337', 'K1', '2013_the_walking_dead_season_4-1600x900.jpg'),
('10115002', 'Samsul Jelek', 'Pria', '2016-01-01', 'sjkajskajskjsa', '87377365', 'dhjdh dgdg', '85736666', 'K1', '2013_the_walking_dead_season_4-1600x900.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `no_trans` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_sekolah` (`id_sekolah`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `sekolah_backup`
--
ALTER TABLE `sekolah_backup`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`no_trans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `no_trans` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
