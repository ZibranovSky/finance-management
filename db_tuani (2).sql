-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 01:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tuani`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `typeuser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `name`, `typeuser`) VALUES
(1, 'admin', 'e6e061838856bf47e1de730719fb2609', 'Admin Z', 'nemesis'),
(2, 'zibran', '0c95fad809534c582d3c32c53920aa2f', 'Zibran', 'user'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin tes', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `keluarans`
--

CREATE TABLE `keluarans` (
  `id` int(11) NOT NULL,
  `agenda` text NOT NULL,
  `tipe_sumber` text NOT NULL,
  `nm_sumber` text NOT NULL,
  `nominal_keluar` int(11) NOT NULL,
  `bulan` text NOT NULL,
  `tahun` text NOT NULL,
  `tgl_keluar` text NOT NULL,
  `keterangan` text NOT NULL,
  `utang` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluarans`
--

INSERT INTO `keluarans` (`id`, `agenda`, `tipe_sumber`, `nm_sumber`, `nominal_keluar`, `bulan`, `tahun`, `tgl_keluar`, `keterangan`, `utang`, `id_admin`, `admin`) VALUES
(2, 'Bayar y', 'ATM', 'Mandiri', 30000, '01', '2023', '31-01-2023', '', '', 1, 'Admin Z'),
(3, 'Bayar z', 'ATM', 'Mandiri', 30000, '01', '2023', '31-01-2023', '-', '', 1, 'Admin Z'),
(4, 'bayar hp', 'ATM', 'Mandiri', 20000, '01', '2023', '31-01-2023', '-', '', 1, 'Admin Z'),
(10, 'Top Up Tabungan Neo', 'MBANKING', 'MANDIRI', 600000, '06', '2024', '03-06-2024', '', '', 3, 'admin tes'),
(12, 'Bayar BPJS Misel & Queen Bulan Juni', 'MBANKING', 'MANDIRI', 72500, '06', '2024', '04-06-2024', '', '', 3, 'admin tes'),
(13, 'tarik tunai', 'MBANKING', 'MANDIRI', 1700000, '06', '2024', '04-06-2024', '', '', 3, 'admin tes'),
(14, 'Beli token listrik ', 'MBANKING', 'MANDIRI', 53500, '06', '2024', '05-06-2024', '', '', 3, 'admin tes'),
(15, 'deposit pintu crypto', 'MBANKING', 'MANDIRI', 30000, '06', '2024', '06-06-2024', '', '', 3, 'admin tes'),
(16, 'Top up dana ', 'MBANKING', 'MANDIRI', 52500, '06', '2024', '07-06-2024', '', '', 3, 'admin tes'),
(17, 'tarik tunai', 'MBANKING', 'MANDIRI', 207500, '06', '2024', '09-06-2024', '', '', 3, 'admin tes'),
(18, 'TF Kuntul', 'MBANKING', 'MANDIRI', 350000, '06', '2024', '10-06-2024', '', '', 3, 'admin tes'),
(19, 'Beli token listrik', 'MBANKING', 'MANDIRI', 53500, '06', '2024', '12-06-2024', '', '', 3, 'admin tes'),
(21, 'admin', 'MBANKING', 'MANDIRI', 2500, '06', '2024', '13-06-2024', '', 'no', 3, 'admin tes'),
(22, 'beli kapsul pegagan', 'MBANKING', 'MANDIRI', 32000, '06', '2024', '14-06-2024', '', 'no', 3, 'admin tes'),
(23, 'admin debit', 'MBANKING', 'MANDIRI', 3500, '06', '2024', '15-06-2024', '', 'no', 3, 'admin tes'),
(24, 'Tarik Tunai', 'MBANKING', 'MANDIRI', 207500, '06', '2024', '17-06-2024', '', 'no', 3, 'admin tes'),
(25, 'Beli spion motor', 'MBANKING', 'MANDIRI', 86000, '06', '2024', '17-06-2024', '', 'no', 3, 'admin tes'),
(26, 'bayar wifi', 'MBANKING', 'MANDIRI', 223575, '06', '2024', '18-06-2024', '', 'no', 3, 'admin tes'),
(27, 'Beli token listrik', 'MBANKING', 'MANDIRI', 53500, '06', '2024', '19-06-2024', '', 'no', 3, 'admin tes'),
(28, 'top up shoopepay', 'MBANKING', 'MANDIRI', 51000, '06', '2024', '19-06-2024', '', 'no', 3, 'admin tes'),
(29, 'Bayar BNI', 'MBANKING', 'MANDIRI', 162500, '06', '2024', '20-06-2024', '', 'yes', 3, 'admin tes'),
(30, 'Tarik tunai', 'MBANKING', 'MANDIRI', 300000, '06', '2024', '20-06-2024', '', 'no', 3, 'admin tes'),
(31, 'Bayar wifi titip bayar', 'MBANKING', 'MANDIRI', 223575, '06', '2024', '22-06-2024', '', 'no', 3, 'admin tes'),
(32, 'Beli Kuota AXIS', 'MBANKING', 'MANDIRI', 19000, '06', '2024', '23-06-2024', '', 'no', 3, 'admin tes');

-- --------------------------------------------------------

--
-- Table structure for table `masukans`
--

CREATE TABLE `masukans` (
  `id` int(11) NOT NULL,
  `kd_sumber` varchar(255) NOT NULL,
  `tipe_sumber` text NOT NULL,
  `nm_sumber` text NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_masuk` text NOT NULL,
  `bulan` text NOT NULL,
  `tahun` text NOT NULL,
  `id_admin` int(11) NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masukans`
--

INSERT INTO `masukans` (`id`, `kd_sumber`, `tipe_sumber`, `nm_sumber`, `nominal`, `tgl_masuk`, `bulan`, `tahun`, `id_admin`, `admin`) VALUES
(10, 'INC001ATM', 'ATM', 'Mandiri', 40000, '30-01-2023', '01', '2023', 1, 'Admin Z'),
(15, 'INC001ATM', 'MBANKING', 'MANDIRI', 5878700, '03-06-2024', '06', '2024', 3, 'admin tes'),
(16, 'INC001ATM', 'MBANKING', 'MANDIRI', 250000, '12-06-2024', '06', '2024', 3, 'admin tes'),
(17, 'INC001ATM', 'MBANKING', 'MANDIRI', 5000000, '12-06-2024', '06', '2024', 2, 'Zibran');

-- --------------------------------------------------------

--
-- Table structure for table `sumbers`
--

CREATE TABLE `sumbers` (
  `id` int(11) NOT NULL,
  `kd_sumber` varchar(255) NOT NULL,
  `tipe_sumber` text NOT NULL,
  `name` text NOT NULL,
  `balance` int(11) NOT NULL,
  `tgl_masuk` text NOT NULL,
  `bulan` text NOT NULL,
  `tahun` text NOT NULL,
  `id_admin` int(11) NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sumbers`
--

INSERT INTO `sumbers` (`id`, `kd_sumber`, `tipe_sumber`, `name`, `balance`, `tgl_masuk`, `bulan`, `tahun`, `id_admin`, `admin`) VALUES
(2, 'INC001ATM', 'ATM', 'Mandiri', 120000, '30-01-2023', '01', '2023', 1, 'Admin Z'),
(7, 'INC001ATM', 'MBANKING', 'MANDIRI', 1574550, '03-06-2024', '06', '2024', 3, 'admin tes'),
(8, 'INC001ATM', 'MBANKING', 'MANDIRI', 4935000, '12-06-2024', '06', '2024', 2, 'Zibran');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluarans`
--
ALTER TABLE `keluarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masukans`
--
ALTER TABLE `masukans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumbers`
--
ALTER TABLE `sumbers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keluarans`
--
ALTER TABLE `keluarans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `masukans`
--
ALTER TABLE `masukans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sumbers`
--
ALTER TABLE `sumbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
