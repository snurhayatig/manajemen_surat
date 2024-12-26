-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 08:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengelolaan_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `jenis_surat` varchar(20) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `tanggal`, `no_surat`, `jenis_surat`, `perihal`, `lampiran`) VALUES
(1, '2024-12-16', '00/1', 'Surat Masuk', 'rapat', 'lampiran_675fe7c371bec2.53056809.pdf'),
(2, '2024-12-17', '00/2', 'Surat Masuk', 'seminar', 'lampiran_675fec31d3b8c3.61333811.pdf'),
(4, '2024-12-18', '00/4', 'Surat Masuk', 'kegiatan', 'lampiran_6762622f49dd50.60912388.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
