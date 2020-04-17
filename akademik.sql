-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 04:19 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_prodi`
--

CREATE TABLE `dt_prodi` (
  `idprodi` int(11) NOT NULL,
  `kdprodi` varchar(6) NOT NULL,
  `nmprodi` varchar(70) NOT NULL,
  `akreditasi` enum('A','B','C','-') NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_prodi`
--

INSERT INTO `dt_prodi` (`idprodi`, `kdprodi`, `nmprodi`, `akreditasi`) VALUES
(1, '751', 'Agribisnis', 'A'),
(2, '752', 'Akuntansi', 'A'),
(1, '753', 'Manajemen Informatika', 'B'),
(1, '754', 'Agribisnis Pangan', '-'),
(1, '755', 'Akuntansi Perpajakan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `telepon` varchar(13) CHARACTER SET latin1 DEFAULT NULL,
  `jenis_kelamin` enum('-','male','female','') CHARACTER SET latin1 DEFAULT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `alamat`, `telepon`, `jenis_kelamin`, `level`) VALUES
(1, 'Muhammad Rizal Saski', 'rizal123', 'admin123', 'Lampung Timur', '82282304963', 'male', 'admin'),
(2, 'Vicorial Etophia Phinata', 'vico123','admin123', 'Lampung', '877304040404', 'male', 'admin'),
(3, 'M. Irham Azka', 'azka123','admin123', 'Lampung', '877304040405', 'male', 'admin'),
(4, 'Rina Anjelica', 'rina123','admin123', 'Muaradua', '877304040406', 'female', 'admin'),
(5, 'Septa Dinda Ariyani', 'septa123','admin123', 'Lampung Barat', '877304040407', 'female', 'admin'),
(6, 'Yuken Tri Viranda', 'yuken123','admin123', 'Baturaja', '877304040408', 'female', 'admin'),
(7, 'Muhammad Rizal Saski', 'rizal456','pgw123', 'admin123', 'Lampung Timur', '82282304962', 'male', 'pegawai'),
(8, 'Vicorial Etophia Phinata', 'vico456','pgw123', 'Lampung', '877304040414', 'male', 'pegawai'),
(9, 'M. Irham Azka', 'azka456', 'Lampung','pgw123', '877304040415', 'male', 'pegawai'),
(10, 'Rina Anjelica', 'rina456','pgw123', 'Muaradua', '877304040416', 'female', 'pegawai'),
(11, 'Septa Dinda Ariyani', 'septa456','pgw123', 'Lampung Barat', '877304040417', 'female', 'pegawai'),
(12, 'Yuken Tri Viranda', 'yuken456', 'pgw123','Baturaja', '877304040418', 'female', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_prodi`
--
ALTER TABLE `dt_prodi`
  ADD PRIMARY KEY (`idprodi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_prodi`
--
ALTER TABLE `dt_prodi`
  MODIFY `idprodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
