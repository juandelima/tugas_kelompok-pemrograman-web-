-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 10:07 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw`
--

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(3) NOT NULL,
  `kode_matkul` varchar(8) NOT NULL,
  `nama_matkul` varchar(35) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `created_at`, `updated_at`) VALUES
(3, 'TI03', 'Matematika Informatika', '2018-11-07 19:04:23', '2018-11-07 12:04:23'),
(9, 'A004', 'Bisnis Informatika', '2018-11-07 06:13:18', '2018-11-07 06:13:18'),
(10, 'A002', 'Struktur Data 1', '2018-11-07 16:02:52', '2018-11-07 09:02:52'),
(16, 'A001', 'Algoritma', '2018-11-07 09:20:27', '2018-11-07 09:20:27'),
(17, 'B012', 'Bahasa Inggris', '2018-11-07 09:34:36', '2018-11-07 09:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mahasiswa`
--

CREATE TABLE `nilai_mahasiswa` (
  `id_mahasiswa` int(3) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_matkul` int(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `grade` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_mahasiswa`
--

INSERT INTO `nilai_mahasiswa` (`id_mahasiswa`, `npm`, `nama`, `id_matkul`, `nilai_uts`, `nilai_uas`, `grade`, `created_at`, `updated_at`) VALUES
(1, '53415615', 'Juan Valerian Delima', 16, 90, 85, 'A', '2018-11-07 18:33:11', '2018-11-07 11:33:11'),
(2, '45215116', 'Ario Waskita', 10, 85, 65, 'B', '2018-11-07 08:49:54', '2018-11-07 08:49:54'),
(3, '25215718', 'Andi Ler', 3, 65, 55, 'C', '2018-11-07 18:34:56', '2018-11-07 11:34:56'),
(4, '53415712', 'Nagyan Yosse', 17, 88, 75, 'A', '2018-11-07 18:34:27', '2018-11-07 11:34:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `nilai_mahasiswa`
--
ALTER TABLE `nilai_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nilai_mahasiswa`
--
ALTER TABLE `nilai_mahasiswa`
  MODIFY `id_mahasiswa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
