-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2020 at 08:01 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rumahrahil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `option_a` varchar(128) NOT NULL,
  `option_b` varchar(128) NOT NULL,
  `option_c` varchar(128) NOT NULL,
  `option_d` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id_jawaban`, `soal_id`, `option_a`, `option_b`, `option_c`, `option_d`) VALUES
(1, 1, 'Jam 6', 'Jam 8', 'Jam 5', 'Jam 12 '),
(2, 1, 'Jam 1', 'Jam 3', 'Jam 18', 'Jam 12 ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kunci_jawaban`
--

CREATE TABLE `tb_kunci_jawaban` (
  `id_kunci_jawaban` int(11) NOT NULL,
  `jawaban_benar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kunci_jawaban`
--

INSERT INTO `tb_kunci_jawaban` (`id_kunci_jawaban`, `jawaban_benar`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `subtema_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `total_jawaban_benar` int(50) NOT NULL,
  `total_jawaban_salah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`, `hak_akses`) VALUES
(1, 'admin', 0),
(2, 'guru', 1),
(3, 'siswa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `tingkat_id` int(11) NOT NULL,
  `subtema_id` int(11) NOT NULL,
  `kunci_jawaban_id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `soal_gambar` varchar(256) DEFAULT NULL,
  `soal_suara` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `tingkat_id`, `subtema_id`, `kunci_jawaban_id`, `soal`, `soal_gambar`, `soal_suara`) VALUES
(1, 1, 1, 1, 'Jam berapakah Sholat Maghrib?', '', ''),
(2, 2, 1, 3, 'Jam berapakah Sholat Maghrib?', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subtema`
--

CREATE TABLE `tb_subtema` (
  `id_subtema` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `nama_subtema` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subtema`
--

INSERT INTO `tb_subtema` (`id_subtema`, `tema_id`, `nama_subtema`) VALUES
(1, 1, 'Kegiatan di rumah menentukan waktu sholat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tema`
--

CREATE TABLE `tb_tema` (
  `id_tema` int(11) NOT NULL,
  `tingkat_id` int(11) NOT NULL,
  `nama_tema` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tema`
--

INSERT INTO `tb_tema` (`id_tema`, `tingkat_id`, `nama_tema`) VALUES
(1, 1, 'Kegiatan di Rumah'),
(2, 1, 'Belajar di luar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tingkat`
--

CREATE TABLE `tb_tingkat` (
  `id_tingkat` int(11) NOT NULL,
  `nama_tingkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tingkat`
--

INSERT INTO `tb_tingkat` (`id_tingkat`, `nama_tingkat`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `tingkat_id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `role_id`, `tingkat_id`, `nama`, `alamat`, `email`, `password`, `asal_sekolah`) VALUES
(3, 0, 0, 'Sudrajad Dwi Sasmita', 'Losawi, Tunjungtirto', 'sudrajad.dwi@gmail.com', '$2y$10$rq3StNa3mazGsT4YuxS9veuKGq36B8q0l1U3UUs.gy.jS9c5cwBkm', 'SDN Banjartanggul 1'),
(4, 2, 2, 'Sudrajad Dwi Sasmita', 'Losawi, Tunjungtirto', 'sudrajad.sasmita@gmail.com', '$2y$10$aW7bY/nTvBkYyFLqsmbfiesA3dbe8ofU/Maj7pW/QUt/6I3rvXkk6', 'SDN Banjartanggul 1'),
(5, 3, 5, 'rahil', 'Losawi, Tunjungtirto', 'rahil@mail.com', '$2y$10$HkEJxIw50gwaxBW4CKhxTuVAbMgtWziSrEXTqf6tfXjsJYkXrtI1C', 'SDN Banjartanggul 1'),
(7, 1, 0, 'admin', 'admin', 'admin@mail.com', '$2y$10$uTBImZOo1u8Q..00umHBceaiLk3YMIbd9TYydtiTk5tZCz9MqVLXi', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `tb_kunci_jawaban`
--
ALTER TABLE `tb_kunci_jawaban`
  ADD PRIMARY KEY (`id_kunci_jawaban`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tb_subtema`
--
ALTER TABLE `tb_subtema`
  ADD PRIMARY KEY (`id_subtema`);

--
-- Indexes for table `tb_tema`
--
ALTER TABLE `tb_tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indexes for table `tb_tingkat`
--
ALTER TABLE `tb_tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kunci_jawaban`
--
ALTER TABLE `tb_kunci_jawaban`
  MODIFY `id_kunci_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_subtema`
--
ALTER TABLE `tb_subtema`
  MODIFY `id_subtema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tema`
--
ALTER TABLE `tb_tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tingkat`
--
ALTER TABLE `tb_tingkat`
  MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
