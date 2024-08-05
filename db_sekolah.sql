-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306:4306
-- Generation Time: Nov 18, 2023 at 02:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id`, `nip`, `nama`, `alamat`, `telpon`, `agama`, `foto`) VALUES
(8, '123456789990123456', 'Fathir S.pd', 'Jalan Patin', '098764345678', 'Islam', 'default-user.png'),
(9, '234432456543234567', 'Raffa M.Kom', 'Jalan Karya', '08127723443', 'Islam', '288-Foto R.jpg'),
(10, '3456534567876446778', 'Dimas S.pd', 'Jalan Arwana', '08654345635', 'Islam', 'default-user.png'),
(11, '665678765434567899', 'Arya S.Kom', 'Jalan Paus', '089654567367', 'Islam', '207-rangga.jpeg'),
(12, '5432456789432456345', 'Rangga S.T', 'Jalan Hiu', '08345678655678', 'Islam', 'default-user.png'),
(16, '66523456782345678456', 'Indah S.Kom', 'Jalan Pengabdian', '08734567796456', 'Kristen', '939-guru1.jpg'),
(17, '56878907653645789778', 'Riska S.SI', 'Jalan Pengabdian', '085456774367678', 'Katholik', 'default-user.png'),
(18, '53456788534567976567', 'Irma S.Tr', 'Jalan Kartama ', '08975456234567', 'Budha', 'default-user.png'),
(19, '567898765423345678', 'Gerald M.Pd', 'Jalan Gabus', '084567865434567', 'Kristen', 'default-user.png'),
(20, '4578456789654567887', 'Ali M.Pdi', 'Jalan Paus', '087345665456721', 'Islam', '835-rangga.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_ujian`
--

CREATE TABLE `tbl_nilai_ujian` (
  `id` int(11) NOT NULL,
  `no_ujian` char(7) NOT NULL,
  `pelajaran` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `nilai_ujian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai_ujian`
--

INSERT INTO `tbl_nilai_ujian` (`id`, `no_ujian`, `pelajaran`, `jurusan`, `nilai_ujian`) VALUES
(22, 'UTS-001', 'Matematika', 'Umum', 95),
(23, 'UTS-001', 'IPA', 'Umum', 95),
(24, 'UTS-001', 'PJOK', 'Umum', 100),
(25, 'UTS-001', 'Agama Islam', 'Umum', 100),
(26, 'UTS-001', 'PWPB', 'Rekayasa Perangkat Lunak', 100),
(27, 'UTS-001', 'PBO', 'Rekayasa Perangkat Lunak', 100),
(28, 'UTS-001', 'P. Bergerak', 'Rekayasa Perangkat Lunak', 90),
(29, 'UTS-002', 'Matematika', 'Umum', 60),
(30, 'UTS-002', 'IPA', 'Umum', 45),
(31, 'UTS-002', 'PJOK', 'Umum', 60),
(32, 'UTS-002', 'Agama Islam', 'Umum', 50),
(33, 'UTS-002', 'KJD', 'Teknik Komputer Jaringan', 55),
(34, 'UTS-002', 'S. Komputer', 'Teknik Komputer Jaringan', 55),
(35, 'UTS-002', 'SKD', 'Teknik Komputer Jaringan', 50),
(36, 'UTS-003', 'Matematika', 'Umum', 45),
(37, 'UTS-003', 'IPA', 'Umum', 60),
(38, 'UTS-003', 'PJOK', 'Umum', 65),
(39, 'UTS-003', 'Agama Islam', 'Umum', 60),
(40, 'UTS-003', 'PWPB', 'Rekayasa Perangkat Lunak', 65),
(41, 'UTS-003', 'PBO', 'Rekayasa Perangkat Lunak', 80),
(42, 'UTS-003', 'P. Bergerak', 'Rekayasa Perangkat Lunak', 80),
(43, 'UTS-004', 'Matematika', 'Umum', 95),
(44, 'UTS-004', 'IPA', 'Umum', 90),
(45, 'UTS-004', 'PJOK', 'Umum', 80),
(46, 'UTS-004', 'Agama Islam', 'Umum', 85),
(47, 'UTS-004', 'KJD', 'Teknik Komputer Jaringan', 85),
(48, 'UTS-004', 'S. Komputer', 'Teknik Komputer Jaringan', 90),
(49, 'UTS-004', 'SKD', 'Teknik Komputer Jaringan', 80),
(50, 'UTS-005', 'Matematika', 'Umum', 65),
(51, 'UTS-005', 'IPA', 'Umum', 70),
(52, 'UTS-005', 'PJOK', 'Umum', 45),
(53, 'UTS-005', 'Agama Islam', 'Umum', 55),
(54, 'UTS-005', 'PWPB', 'Rekayasa Perangkat Lunak', 60),
(55, 'UTS-005', 'PBO', 'Rekayasa Perangkat Lunak', 40),
(56, 'UTS-005', 'P. Bergerak', 'Rekayasa Perangkat Lunak', 50),
(57, 'UTS-006', 'Matematika', 'Umum', 75),
(58, 'UTS-006', 'IPA', 'Umum', 90),
(59, 'UTS-006', 'PJOK', 'Umum', 80),
(60, 'UTS-006', 'Agama Islam', 'Umum', 75),
(61, 'UTS-006', 'KJD', 'Teknik Komputer Jaringan', 90),
(62, 'UTS-006', 'S. Komputer', 'Teknik Komputer Jaringan', 85),
(63, 'UTS-006', 'SKD', 'Teknik Komputer Jaringan', 80),
(64, 'UTS-007', 'Matematika', 'Umum', 90),
(65, 'UTS-007', 'IPA', 'Umum', 80),
(66, 'UTS-007', 'PJOK', 'Umum', 65),
(67, 'UTS-007', 'Agama Islam', 'Umum', 80),
(68, 'UTS-007', 'KJD', 'Teknik Komputer Jaringan', 80),
(69, 'UTS-007', 'S. Komputer', 'Teknik Komputer Jaringan', 85),
(70, 'UTS-007', 'SKD', 'Teknik Komputer Jaringan', 95),
(71, 'UTS-008', 'Matematika', 'Umum', 80),
(72, 'UTS-008', 'IPA', 'Umum', 45),
(73, 'UTS-008', 'PJOK', 'Umum', 65),
(74, 'UTS-008', 'Agama Islam', 'Umum', 75),
(75, 'UTS-008', 'PWPB', 'Rekayasa Perangkat Lunak', 65),
(76, 'UTS-008', 'PBO', 'Rekayasa Perangkat Lunak', 65),
(77, 'UTS-008', 'P. Bergerak', 'Rekayasa Perangkat Lunak', 95),
(78, 'UTS-009', 'Matematika', 'Umum', 70),
(79, 'UTS-009', 'IPA', 'Umum', 85),
(80, 'UTS-009', 'PJOK', 'Umum', 90),
(81, 'UTS-009', 'Agama Islam', 'Umum', 75),
(82, 'UTS-009', 'KJD', 'Teknik Komputer Jaringan', 80),
(83, 'UTS-009', 'S. Komputer', 'Teknik Komputer Jaringan', 75),
(84, 'UTS-009', 'SKD', 'Teknik Komputer Jaringan', 95),
(85, 'UTS-010', 'Matematika', 'Umum', 95),
(86, 'UTS-010', 'IPA', 'Umum', 95),
(87, 'UTS-010', 'PJOK', 'Umum', 80),
(88, 'UTS-010', 'Agama Islam', 'Umum', 70),
(89, 'UTS-010', 'PWPB', 'Rekayasa Perangkat Lunak', 45),
(90, 'UTS-010', 'PBO', 'Rekayasa Perangkat Lunak', 65),
(91, 'UTS-010', 'P. Bergerak', 'Rekayasa Perangkat Lunak', 70),
(92, 'UTS-011', 'Matematika', 'Umum', 55),
(93, 'UTS-011', 'IPA', 'Umum', 90),
(94, 'UTS-011', 'PJOK', 'Umum', 80),
(95, 'UTS-011', 'Agama Islam', 'Umum', 70),
(96, 'UTS-011', 'PWPB', 'Rekayasa Perangkat Lunak', 80),
(97, 'UTS-011', 'PBO', 'Rekayasa Perangkat Lunak', 90),
(98, 'UTS-011', 'P. Bergerak', 'Rekayasa Perangkat Lunak', 90),
(100, 'UTS-013', 'Matematika', 'Umum', 85),
(101, 'UTS-013', 'IPA', 'Umum', 90),
(102, 'UTS-013', 'PJOK', 'Umum', 70),
(103, 'UTS-013', 'Agama Islam', 'Umum', 70),
(104, 'UTS-013', 'PWPB', 'Rekayasa Perangkat Lunak', 80),
(105, 'UTS-013', 'PBO', 'Rekayasa Perangkat Lunak', 90),
(106, 'UTS-013', 'P. Bergerak', 'Rekayasa Perangkat Lunak', 90),
(107, 'UTS-014', 'Matematika', 'Umum', 70),
(108, 'UTS-014', 'IPA', 'Umum', 65),
(109, 'UTS-014', 'PJOK', 'Umum', 80),
(110, 'UTS-014', 'Agama Islam', 'Umum', 65),
(111, 'UTS-014', 'KJD', 'Teknik Komputer Jaringan', 70),
(112, 'UTS-014', 'S. Komputer', 'Teknik Komputer Jaringan', 75),
(113, 'UTS-014', 'SKD', 'Teknik Komputer Jaringan', 60),
(114, 'UTS-012', 'Matematika', 'Umum', 65),
(115, 'UTS-012', 'IPA', 'Umum', 60),
(116, 'UTS-012', 'PJOK', 'Umum', 70),
(117, 'UTS-012', 'Agama Islam', 'Umum', 50),
(118, 'UTS-012', 'PWPB', 'Rekayasa Perangkat Lunak', 40),
(119, 'UTS-012', 'PBO', 'Rekayasa Perangkat Lunak', 60),
(120, 'UTS-012', 'P. Bergerak', 'Rekayasa Perangkat Lunak', 80),
(121, 'UTS-013', 'Matematika', 'Umum', 100),
(122, 'UTS-013', 'IPA', 'Umum', 70),
(123, 'UTS-013', 'PJOK', 'Umum', 85),
(124, 'UTS-013', 'Agama Islam', 'Umum', 80),
(125, 'UTS-013', 'PWPB', 'Rekayasa Perangkat Lunak', 60),
(126, 'UTS-013', 'PBO', 'Rekayasa Perangkat Lunak', 65),
(127, 'UTS-013', 'P. Bergerak', 'Rekayasa Perangkat Lunak', 45),
(128, 'UTS-014', 'Matematika', 'Umum', 45),
(129, 'UTS-014', 'IPA', 'Umum', 50),
(130, 'UTS-014', 'PJOK', 'Umum', 45),
(131, 'UTS-014', 'Agama Islam', 'Umum', 45),
(132, 'UTS-014', 'PWPB', 'Rekayasa Perangkat Lunak', 50),
(133, 'UTS-014', 'PBO', 'Rekayasa Perangkat Lunak', 50),
(134, 'UTS-014', 'P. Bergerak', 'Rekayasa Perangkat Lunak', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelajaran`
--

CREATE TABLE `tbl_pelajaran` (
  `id` int(11) NOT NULL,
  `pelajaran` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelajaran`
--

INSERT INTO `tbl_pelajaran` (`id`, `pelajaran`, `jurusan`, `guru`) VALUES
(44, 'Matematika', 'Umum', 'Fathir S.pd'),
(45, 'IPA', 'Umum', 'Dimas S.pd'),
(46, 'PJOK', 'Umum', 'Gerald M.Pdi'),
(47, 'Agama Islam', 'Umum', 'Ali M.Pdi'),
(49, 'PWPB', 'Rekayasa Perangkat Lunak', 'Raffa M.Kom'),
(50, 'PBO', 'Rekayasa Perangkat Lunak', 'Arya S.Kom'),
(51, 'P. Bergerak', 'Rekayasa Perangkat Lunak', 'Rangga S.T'),
(53, 'KJD', 'Teknik Komputer Jaringan', 'Indah S.Kom'),
(54, 'S. Komputer', 'Teknik Komputer Jaringan', 'Riska S.SI'),
(55, 'SKD', 'Teknik Komputer Jaringan', 'Irma S.Tr');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `akreditasi` char(1) NOT NULL,
  `status` varchar(128) NOT NULL,
  `email` varchar(100) NOT NULL,
  `visimisi` varchar(256) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id`, `nama`, `alamat`, `akreditasi`, `status`, `email`, `visimisi`, `gambar`) VALUES
(1, 'SMKN 2 Pekanbaru', 'Jalan Pattimura No.14', 'A', 'Negeri', 'smkn2pku@gmail.com', 'SMK Bisa SMK Hebat', '28-bgLogin.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` char(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama`, `alamat`, `kelas`, `jurusan`, `foto`) VALUES
('NIS001', 'Raffa Eka', 'Jalan Sudirman', 'X', 'Rekayasa Perangkat Lunak', '100-raffa.jpg'),
('NIS002', 'Reihan', 'Jalan Kartama', 'X', 'Teknik Komputer Jaringan', '983-rangga.jpeg'),
('NIS003', 'Rangga', 'Jalan Pattimura', 'X', 'Rekayasa Perangkat Lunak', '911-rangga.jpeg'),
('NIS004', 'Ridwan', 'Jalan Patin', 'XII', 'Teknik Komputer Jaringan', 'default-user.png'),
('NIS005', 'Hakim', 'Jalan Garuda', 'XII', 'Rekayasa Perangkat Lunak', 'default-user.png'),
('NIS006', 'Ghaitsa', 'Jalan Tengku', 'XI', 'Teknik Komputer Jaringan', 'default-user.png'),
('NIS007', 'Wanda', 'Jalan Hiu', 'XII', 'Teknik Komputer Jaringan', 'default-user.png'),
('NIS008', 'Ibra', 'Jalan Merdeka', 'XII', 'Rekayasa Perangkat Lunak', 'default-user.png'),
('NIS009', 'Agus', 'Jalan cendana', 'XII', 'Teknik Komputer Jaringan', 'default-user.png'),
('NIS010', 'Rere', 'Jalan Melati', 'XII', 'Rekayasa Perangkat Lunak', 'default-user.png'),
('NIS011', 'Siswa', 'Jalan Mawar', 'XI', 'Teknik Komputer Jaringan', '153-Lambang SMKN 2.png'),
('NIS012', 'Yaya', 'Jalan Maya', 'XII', 'Rekayasa Perangkat Lunak', 'default-user.png'),
('NIS013', 'Daiva', 'Jalan Duyung', 'X', 'Teknik Komputer Jaringan', 'default-user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ujian`
--

CREATE TABLE `tbl_ujian` (
  `no_ujian` char(7) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `nis` char(6) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `nilai_terendah` int(11) NOT NULL,
  `nilai_tertinggi` int(11) NOT NULL,
  `nilai_rata2` int(11) NOT NULL,
  `hasil_ujian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ujian`
--

INSERT INTO `tbl_ujian` (`no_ujian`, `tgl_ujian`, `nis`, `jurusan`, `total_nilai`, `nilai_terendah`, `nilai_tertinggi`, `nilai_rata2`, `hasil_ujian`) VALUES
('UTS-001', '2023-10-14', 'NIS001', 'Rekayasa Perangkat Lunak', 680, 90, 100, 97, 'LULUS'),
('UTS-002', '2023-10-14', 'NIS002', 'Teknik Komputer Jaringan', 375, 45, 60, 54, 'GAGAL'),
('UTS-003', '2023-10-14', 'NIS003', 'Rekayasa Perangkat Lunak', 455, 45, 80, 65, 'GAGAL'),
('UTS-004', '2023-10-14', 'NIS004', 'Teknik Komputer Jaringan', 605, 80, 95, 86, 'LULUS'),
('UTS-005', '2023-10-14', 'NIS005', 'Rekayasa Perangkat Lunak', 385, 40, 70, 55, 'GAGAL'),
('UTS-006', '2023-10-14', 'NIS006', 'Teknik Komputer Jaringan', 575, 75, 90, 82, 'LULUS'),
('UTS-007', '2023-10-14', 'NIS007', 'Teknik Komputer Jaringan', 575, 65, 95, 82, 'LULUS'),
('UTS-008', '2023-10-14', 'NIS008', 'Rekayasa Perangkat Lunak', 490, 45, 95, 70, 'GAGAL'),
('UTS-009', '2023-10-14', 'NIS009', 'Teknik Komputer Jaringan', 570, 70, 95, 81, 'LULUS'),
('UTS-010', '2023-10-14', 'NIS010', 'Rekayasa Perangkat Lunak', 520, 45, 95, 74, 'GAGAL'),
('UTS-011', '2023-10-22', 'NIS011', 'Rekayasa Perangkat Lunak', 555, 55, 90, 79, 'LULUS'),
('UTS-012', '2023-10-24', 'NIS012', 'Rekayasa Perangkat Lunak', 425, 40, 80, 61, 'GAGAL'),
('UTS-013', '2023-10-24', 'NIS013', 'Rekayasa Perangkat Lunak', 505, 45, 100, 72, 'GAGAL'),
('UTS-014', '2023-10-24', 'NIS013', 'Rekayasa Perangkat Lunak', 325, 40, 50, 46, 'GAGAL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`, `alamat`, `jabatan`, `foto`, `level`) VALUES
(1, 'SuperAdmin', '$2y$10$rNUSoZA6F61FmZeWR2.bX.vR7FQYjoQRX/TLuGskKNH2vnfCB.Z8O', 'Raffa Eka Prayoga', 'Jalan Pattimura', 'Kepsek', 'logo.png', 1),
(2, 'Admin', '$2y$10$g3rxHnpc48Hnc/Fohgp6XOT0JXBgykjMVsLQwwBa8L54rOZL70HKK', 'Rahsya Benova Akbar', 'Jalan Riau', 'Staf TU', '933-WhatsApp Image 2023-01-16 at 13.28.03.jpeg', 2),
(3, 'User', '$2y$10$5KT6gk24kEERYFu5hRwCduzgP2YV3yxXlEDTj4P5MNOTc0mPzIAe2', 'Wildan Fathan', 'Jalan Mawar', 'Guru', 'default-user.png', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_ujian` (`no_ujian`);

--
-- Indexes for table `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD PRIMARY KEY (`no_ujian`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD CONSTRAINT `tbl_ujian_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_ujian_ibfk_2` FOREIGN KEY (`no_ujian`) REFERENCES `tbl_nilai_ujian` (`no_ujian`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
