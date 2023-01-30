-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 02:15 AM
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
(1, 'admin', 'e6e061838856bf47e1de730719fb2609', 'Admin Z', 'nemesis');

-- --------------------------------------------------------

--
-- Table structure for table `keluarans`
--

CREATE TABLE `keluarans` (
  `id` int(11) NOT NULL,
  `agenda` text NOT NULL,
  `tipe_sumber` text NOT NULL,
  `nm_sumber` text NOT NULL,
  `balance` int(11) NOT NULL,
  `tgl_masuk` text NOT NULL,
  `nominal_keluar` int(11) NOT NULL,
  `bulan` text NOT NULL,
  `tanggal` text NOT NULL,
  `tgl_keluar` text NOT NULL,
  `keterangan` text NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'INC001ATM', 'ATM', 'Mandiri', 160000, '30-01-2023', '01', '2023', 1, 'Admin Z');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keluarans`
--
ALTER TABLE `keluarans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masukans`
--
ALTER TABLE `masukans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sumbers`
--
ALTER TABLE `sumbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
