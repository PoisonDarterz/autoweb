-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 05:35 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `idAlamat` int(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `bandar` varchar(30) DEFAULT NULL,
  `poskod` int(10) DEFAULT NULL,
  `negeri` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`idAlamat`, `alamat`, `bandar`, `poskod`, `negeri`) VALUES
(5000, '19, Jln Sg Ara 7', 'Bayan Lepas', 11900, 'Penang'),
(5001, '2,Lebuhraya Utara Selatan', 'Kuala Lumpur', 50000, 'Selangor'),
(5002, '6,Ltg Sg Pinang', 'Jelutong', 10150, 'Penang'),
(5003, '9-3A-2, Condominium,Jln Baru 3', 'Bayan Baru', 11950, 'Pulau Pinang');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `idHarga` int(10) NOT NULL,
  `hargaAsal` int(10) NOT NULL,
  `cukaiJalan` int(10) NOT NULL,
  `insurans` int(10) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`idHarga`, `hargaAsal`, `cukaiJalan`, `insurans`, `harga`) VALUES
(4000, 178000, 170, 8909, 187079),
(4001, 5000, 60, 253, 5313),
(4002, 90000, 90, 4505, 94595),
(4003, 53500, 90, 2680, 56270);

-- --------------------------------------------------------

--
-- Table structure for table `jualan`
--

CREATE TABLE `jualan` (
  `idJualan` int(10) NOT NULL,
  `nomPlat` varchar(20) NOT NULL,
  `tarikh` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `idPelanggan` int(10) NOT NULL,
  `idPekerja` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jualan`
--

INSERT INTO `jualan` (`idJualan`, `nomPlat`, `tarikh`, `idPelanggan`, `idPekerja`) VALUES
(1000, 'PKR2020', '2020-02-26 09:50:10.090980', 3000, 2001),
(1001, 'JJJ123', '2020-03-20 09:51:36.297307', 3001, 2001),
(1002, 'ABC1234', '2020-04-09 09:51:48.017352', 3002, 2001),
(1003, 'PPE3994', '2020-03-30 09:14:00.756459', 3003, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `kenderaan`
--

CREATE TABLE `kenderaan` (
  `nomPlat` varchar(20) NOT NULL,
  `model` varchar(40) DEFAULT NULL,
  `tahunDibuat` int(5) DEFAULT NULL,
  `idHarga` int(10) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kenderaan`
--

INSERT INTO `kenderaan` (`nomPlat`, `model`, `tahunDibuat`, `idHarga`, `status`) VALUES
('ABC1234', 'City', 2006, 4002, 'Secondhand'),
('JJJ123', 'Kancil', 2003, 4001, 'Secondhand'),
('PKR2020', 'Mercedes C200', 2018, 4000, 'Firsthand'),
('PPE3994', 'Perodua Myvi', 2020, 4003, 'Firsthand');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int(10) NOT NULL,
  `namaPelanggan` varchar(40) NOT NULL,
  `nomHP` varchar(15) DEFAULT NULL,
  `idAlamat` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `namaPelanggan`, `nomHP`, `idAlamat`) VALUES
(3000, 'Chuan Seng Huat', '0134242233', 5000),
(3001, 'Jonas Chuan', '0146879626', 5001),
(3002, 'Muhammad Ali', '0194737811', 5002),
(3003, 'Kumar a/l Prabakaran', '0121474896', 5003);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idPekerja` int(10) NOT NULL,
  `namaPengguna` varchar(40) NOT NULL,
  `kataLaluan` varchar(40) NOT NULL,
  `statusPengguna` varchar(10) NOT NULL DEFAULT 'pekerja'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idPekerja`, `namaPengguna`, `kataLaluan`, `statusPengguna`) VALUES
(2000, 'test', 'asdf', 'admin'),
(2001, 'pektest', 'qwer', 'pekerja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`idAlamat`),
  ADD UNIQUE KEY `uniq3` (`alamat`,`bandar`,`poskod`,`negeri`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`idHarga`),
  ADD UNIQUE KEY `uniq` (`hargaAsal`,`cukaiJalan`);

--
-- Indexes for table `jualan`
--
ALTER TABLE `jualan`
  ADD PRIMARY KEY (`idJualan`),
  ADD KEY `ka_pelanggan` (`idPelanggan`),
  ADD KEY `ka_pengguna` (`idPekerja`),
  ADD KEY `ka_kenderaan_jualan` (`nomPlat`);

--
-- Indexes for table `kenderaan`
--
ALTER TABLE `kenderaan`
  ADD PRIMARY KEY (`nomPlat`),
  ADD KEY `ka_harga` (`idHarga`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`),
  ADD UNIQUE KEY `uniq2` (`namaPelanggan`,`nomHP`),
  ADD KEY `ka_alamat` (`idAlamat`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idPekerja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `idAlamat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5004;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `idHarga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4004;

--
-- AUTO_INCREMENT for table `jualan`
--
ALTER TABLE `jualan`
  MODIFY `idJualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idPelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3004;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idPekerja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2002;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jualan`
--
ALTER TABLE `jualan`
  ADD CONSTRAINT `ka_kenderaan_jualan` FOREIGN KEY (`nomPlat`) REFERENCES `kenderaan` (`nomPlat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ka_pelanggan` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ka_pengguna` FOREIGN KEY (`idPekerja`) REFERENCES `pengguna` (`idPekerja`) ON UPDATE CASCADE;

--
-- Constraints for table `kenderaan`
--
ALTER TABLE `kenderaan`
  ADD CONSTRAINT `ka_harga` FOREIGN KEY (`idHarga`) REFERENCES `harga` (`idHarga`) ON UPDATE CASCADE;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `ka_alamat` FOREIGN KEY (`idAlamat`) REFERENCES `alamat` (`idAlamat`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
