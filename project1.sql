-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 01:37 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
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
(3, '01', 'jajaj', 'C'),
(4, '01', 'Manajemen         ', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Muhammad Rizal Saski', 'rizalsaski', 'admin123', 'admin'),
(3, 'Vicorial Etophia Phinata', 'vicorial', 'vicorial123', 'pegawai'),
(4, 'Yuken Tri Viranda', 'yuken', 'yuken123', 'pegawai'),
(5, 'Septa Dinda Aryani', 'septa', 'septa123', 'pegawai'),
(6, 'Rina Anjelica', 'rina', 'rina123', 'pegawai');

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_prodi`
--
ALTER TABLE `dt_prodi`
  MODIFY `idprodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
