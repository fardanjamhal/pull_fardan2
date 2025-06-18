-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2025 at 11:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e-suratdesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_surat`
--

CREATE TABLE `arsip_surat` (
  `id_arsip` int(11) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama_arsip` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jalan` text DEFAULT NULL,
  `dusun` varchar(50) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `no_kk` varchar(20) DEFAULT NULL,
  `pend_kk` varchar(50) DEFAULT NULL,
  `pend_terakhir` varchar(50) DEFAULT NULL,
  `pend_ditempuh` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `status_perkawinan` varchar(50) DEFAULT NULL,
  `status_dlm_keluarga` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `waktu_disalin` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arsip_surat`
--

INSERT INTO `arsip_surat` (`id_arsip`, `nik`, `nama_arsip`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `jalan`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `no_kk`, `pend_kk`, `pend_terakhir`, `pend_ditempuh`, `pekerjaan`, `status_perkawinan`, `status_dlm_keluarga`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`, `waktu_disalin`) VALUES
(1, '12345', 'dg bali', 'JENEPONTO', '1988-06-25', 'Laki-laki', 'ISLAM', 'JENEPONTO', 'Ciokong', '001', '001', 'BULULOE', 'ALLU TAROWANG', 'Kabupaten JENEPONTO', '73225411111', 'S1/SEDERAJAT', 'S1/SEDERAJAT', 'D3/SEDERAJAT', 'PENGUSAHA', 'Menikah', 'Ayah', 'WNI', 'DAENG PATTA', 'RINA DG JPA', '2025-06-18 06:56:01'),
(3, '12345', 'dg bali', 'JENEPONTO', '1988-06-25', 'Laki-laki', 'ISLAM', 'JENEPONTO', 'Ciokong', '001', '001', 'BULULOE', 'ALLU TAROWANG', 'Kabupaten JENEPONTO', '73225411111', 'S1/SEDERAJAT', 'S1/SEDERAJAT', 'D3/SEDERAJAT', 'PENGUSAHA', 'Menikah', 'Ayah', 'WNI', 'DAENG PATTA', 'RINA DG JPA', '2025-06-18 14:32:26'),
(5, '12345', 'dg bali', 'JENEPONTO', '1988-06-25', 'Laki-laki', 'ISLAM', 'JENEPONTO', 'Ciokong', '001', '001', 'BULULOE', 'ALLU TAROWANG', 'Kabupaten JENEPONTO', '73225411111', 'S1/SEDERAJAT', 'S1/SEDERAJAT', 'D3/SEDERAJAT', 'PENGUSAHA', 'Menikah', 'Ayah', 'WNI', 'DAENG PATTA', 'RINA DG JPA', '2025-06-18 14:47:06'),
(7, '3517112233440001', 'Adi Fahrian Hidayat FARDAN GATT', 'jombang', '1997-12-14', '', 'Islam', 'jl. KH. hasyim asy\'ari no. 15', 'Ciokong', '001', '002', 'menturus', 'kudu', 'jombang', '3517000000000002', 'SLTA/SEDERAJAT', 'SLTA/SEDERAJAT', 'S1/SEDERAJAT', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Imam Haryono', 'Nasihaha', '2025-06-18 15:02:03'),
(8, '3517112233440001', 'Adi Fahrian Hidayat FARDAN GATT', 'jombang', '1997-12-14', '', 'Islam', 'jl. KH. hasyim asy\'ari no. 15', 'Ciokong', '001', '002', 'menturus', 'kudu', 'jombang', '3517000000000002', 'SLTA/SEDERAJAT', 'SLTA/SEDERAJAT', 'S1/SEDERAJAT', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Imam Haryono', 'Nasihaha', '2025-06-18 15:03:40'),
(9, '12345', 'dg bali', 'JENEPONTO', '1988-06-25', 'Laki-laki', 'ISLAM', 'JENEPONTO', 'Ciokong', '001', '001', 'BULULOE', 'ALLU TAROWANG', 'Kabupaten JENEPONTO', '73225411111', 'S1/SEDERAJAT', 'S1/SEDERAJAT', 'D3/SEDERAJAT', 'PENGUSAHA', 'Menikah', 'Ayah', 'WNI', 'DAENG PATTA', 'RINA DG JPA', '2025-06-18 15:16:56'),
(10, '12345', 'dg bali', 'JENEPONTO', '1988-06-25', 'Laki-laki', 'ISLAM', 'JENEPONTO', 'Ciokong', '001', '001', 'BULULOE', 'ALLU TAROWANG', 'Kabupaten JENEPONTO', '73225411111', 'S1/SEDERAJAT', 'S1/SEDERAJAT', 'D3/SEDERAJAT', 'PENGUSAHA', 'Menikah', 'Ayah', 'WNI', 'DAENG PATTA', 'RINA DG JPA', '2025-06-18 15:20:50'),
(11, '12345', 'dg bali', 'JENEPONTO', '1988-06-25', 'Laki-laki', 'ISLAM', 'JENEPONTO', 'Ciokong', '001', '001', 'BULULOE', 'ALLU TAROWANG', 'Kabupaten JENEPONTO', '73225411111', 'S1/SEDERAJAT', 'S1/SEDERAJAT', 'D3/SEDERAJAT', 'PENGUSAHA', 'Menikah', 'Ayah', 'WNI', 'DAENG PATTA', 'RINA DG JPA', '2025-06-18 15:29:33'),
(12, '7304080306080002', 'Muhammad Aldo', 'Bo\'nia', '2008-06-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-18 15:30:43'),
(13, '7304080306080002', 'Muhammad Aldo', 'Bo\'nia', '2008-06-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-18 15:30:59'),
(14, '7304080306080002', 'Muhammad Aldo FARDANFARDAN', 'Bo\'nia', '2008-06-03', '', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-18 15:31:29'),
(15, '7304080107910040', 'Hairuddin', 'Saroanging', '1991-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-18 15:34:53'),
(16, '7304080107910040', 'HairuddinC FARDN', 'Saroanging', '1991-07-01', '', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-18 15:35:12'),
(17, '7304041301120002', 'Rendi SEBELUM', 'Bo\'nia', '2012-01-13', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-18 16:11:17'),
(18, '7304041301120002', 'Rendi sesudah', 'Bo\'nia', '2012-01-13', 'PEREMPUAN', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', 'tambah BATRU', '', '', '', '', '', '2025-06-18 16:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(11) NOT NULL,
  `nama_dusun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `nama_dusun`) VALUES
(1, 'Ciheras'),
(2, 'Cipari'),
(3, 'Ciokong'),
(4, 'Sukajadi');

-- --------------------------------------------------------

--
-- Table structure for table `formulir_pengantar_nikah`
--

CREATE TABLE `formulir_pengantar_nikah` (
  `id_fpn` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `status_nikah1` varchar(30) NOT NULL,
  `status_nikah2` varchar(30) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nik_ayah` varchar(30) NOT NULL,
  `tempat_tgl_lahir_ayah` varchar(20) NOT NULL,
  `kewarganegaraan_ayah` varchar(50) NOT NULL,
  `agama_ayah` varchar(30) NOT NULL,
  `pekerjaan_ayah` varchar(200) NOT NULL,
  `alamat_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `tempat_tgl_lahir_ibu` varchar(50) NOT NULL,
  `kewarganegaraan_ibu` varchar(50) NOT NULL,
  `agama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `alamat_ibu` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `formulir_pengantar_nikah`
--

INSERT INTO `formulir_pengantar_nikah` (`id_fpn`, `jenis_surat`, `no_surat`, `nik`, `status_nikah1`, `status_nikah2`, `nama_ayah`, `nik_ayah`, `tempat_tgl_lahir_ayah`, `kewarganegaraan_ayah`, `agama_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nik_ibu`, `tempat_tgl_lahir_ibu`, `kewarganegaraan_ibu`, `agama_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(22, 'Formulir Pengantar Nikah', '77888888', '12345', 'a. Laki-laki : Jejaka, Duda, a', 'b. Perempuan : Perawan, Janda', 'DAENG PATTA', 'sadas', '122112', 'asa', 'sa', 'as', 'as', 'as', 'as', 'as', 'as', 'as', 'as', 'as', '2025-06-13 11:57:15', 2, 'SELESAI', 1),
(24, 'Formulir Pengantar Nikah', '77888889', '3517112233440001', 'DFSDS', 'FDDS', 'DF', 'DFDFS', 'DF', 'DFS', 'DFS', 'DFS', 'FDS', 'DFS', 'DFS', 'DSF', 'DF', 'DF', 'DSF', 'DF', '2025-06-17 18:04:43', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `formulir_permohonan_kehendak_nikah`
--

CREATE TABLE `formulir_permohonan_kehendak_nikah` (
  `id_fpkn` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `kepada_yth` varchar(30) NOT NULL,
  `calon_suami` varchar(50) NOT NULL,
  `calon_istri` varchar(50) NOT NULL,
  `hari_tanggal` varchar(30) NOT NULL,
  `tempat_akad` varchar(80) NOT NULL,
  `delapan` varchar(30) NOT NULL,
  `sembilan` varchar(20) NOT NULL,
  `sepuluh` varchar(50) NOT NULL,
  `sebelas` varchar(30) NOT NULL,
  `dua_belas` varchar(200) NOT NULL,
  `tiga_belas` varchar(50) NOT NULL,
  `kepala_kua` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `formulir_permohonan_kehendak_nikah`
--

INSERT INTO `formulir_permohonan_kehendak_nikah` (`id_fpkn`, `jenis_surat`, `no_surat`, `nik`, `kepada_yth`, `calon_suami`, `calon_istri`, `hari_tanggal`, `tempat_akad`, `delapan`, `sembilan`, `sepuluh`, `sebelas`, `dua_belas`, `tiga_belas`, `kepala_kua`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(31, 'Formulir Permohonan Kehendak Nikah', '12', '12345', 'MAKASSAR', 'calon suami', 'calon istri', 'SELASA/21', 'tempat akad', 'RWWER', 'REREWRWE', 'DSADASDAS', 'DSSADSA', '12121', 'de', 'BANTAENG', '2025-06-15 09:38:52', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `formulir_persetujuan_calon_pengantin`
--

CREATE TABLE `formulir_persetujuan_calon_pengantin` (
  `id_fpcp` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `bin` varchar(50) NOT NULL,
  `nama_istri` varchar(50) NOT NULL,
  `bin_istri` varchar(50) NOT NULL,
  `nik_istri` varchar(50) NOT NULL,
  `tgl_lahir_istri` varchar(50) NOT NULL,
  `kewarganegaraan_istri` varchar(50) NOT NULL,
  `agama_istri` varchar(50) NOT NULL,
  `pekerjaan_istri` varchar(50) NOT NULL,
  `alamat_istri` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `formulir_persetujuan_calon_pengantin`
--

INSERT INTO `formulir_persetujuan_calon_pengantin` (`id_fpcp`, `jenis_surat`, `no_surat`, `nik`, `bin`, `nama_istri`, `bin_istri`, `nik_istri`, `tgl_lahir_istri`, `kewarganegaraan_istri`, `agama_istri`, `pekerjaan_istri`, `alamat_istri`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(31, 'Formulir Persetujuan Calon Pengantin', '12922590', '12345', 'Nama Bin', 'NAMA ISTRI', 'BIN ISTRI', 'NIK  ISTRI', 'TGL  ISTRI', 'wni  ISTRI', 'AGAMAR  ISTRI', 'PEKERJAAN  ISTRI', 'ALAMAT  ISTRI', '2025-06-13 00:56:10', 2, 'SELESAI', 1),
(32, 'Formulir Persetujuan Calon Pengantin', '12922591', '12345', 'Nama Bin', 'NAMA ISTRI', 'BIN ISTRI', 'NIK  ISTRI', 'TGL  ISTRI', 'wni  ISTRI', 'AGAMAR  ISTRI', 'PEKERJAAN  ISTRI', 'ALAMAT  ISTRI', '2025-06-13 06:17:17', 2, 'SELESAI', 1),
(36, 'Formulir Persetujuan Calon Pengantin', '12922592', '12345', 'Nama Bin', 'NAMA ISTRI', 'BIN ISTRI', 'NIK  ISTRI', 'TGL  ISTRI', 'wni  ISTRI', 'AGAMAR  ISTRI', 'PEKERJAAN  ISTRI', 'ALAMAT  ISTRI', '2025-06-13 10:19:53', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `formulir_persetujuan_calon_pengantin_istri`
--

CREATE TABLE `formulir_persetujuan_calon_pengantin_istri` (
  `id_fpcp2` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `bin` varchar(50) NOT NULL,
  `nama_suami` varchar(50) NOT NULL,
  `bin_suami` varchar(50) NOT NULL,
  `nik_suami` varchar(50) NOT NULL,
  `tgl_lahir_suami` varchar(50) NOT NULL,
  `kewarganegaraan_suami` varchar(50) NOT NULL,
  `agama_suami` varchar(50) NOT NULL,
  `pekerjaan_suami` varchar(50) NOT NULL,
  `alamat_suami` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `formulir_persetujuan_calon_pengantin_istri`
--

INSERT INTO `formulir_persetujuan_calon_pengantin_istri` (`id_fpcp2`, `jenis_surat`, `no_surat`, `nik`, `bin`, `nama_suami`, `bin_suami`, `nik_suami`, `tgl_lahir_suami`, `kewarganegaraan_suami`, `agama_suami`, `pekerjaan_suami`, `alamat_suami`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(38, 'Formulir Persetujuan Calon Pengantin Istri', '99855', '12345', 'Bin istri', 'nama suami', 'bin suami', 'nik suami', 'tep suami', 'kew suami', 'aga suami', 'pek suami', 'ala', '2025-06-13 09:33:10', 2, 'SELESAI', 1),
(39, 'Formulir Persetujuan Calon Pengantin Istri', '99856', '12345', 'Nama Bin', 'nama suami', 'bin suami', 'nik suami', 'tep suami', 'kew suami', 'aga suami', 'pek suami', 'ala', '2025-06-13 10:20:08', 2, 'SELESAI', 1),
(41, 'Formulir Persetujuan Calon Pengantin Istri', '99857', '12345', 'Nama Bin', 'nama suami', 'bin suami', 'nik suami', 'tep suami', 'kew suami', 'aga suami', 'pek suami', 'ala', '2025-06-13 11:47:37', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `formulir_surat_izin_orang_tua`
--

CREATE TABLE `formulir_surat_izin_orang_tua` (
  `id_fsiot` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `bin` varchar(50) NOT NULL,
  `nama1` varchar(50) NOT NULL,
  `bin1` varchar(50) NOT NULL,
  `nik1` varchar(50) NOT NULL,
  `tempat_tgl_lahir1` varchar(50) NOT NULL,
  `kewarganegaraan1` varchar(50) NOT NULL,
  `agama1` varchar(50) NOT NULL,
  `pekerjaan1` varchar(50) NOT NULL,
  `alamat1` varchar(50) NOT NULL,
  `nama2` varchar(50) NOT NULL,
  `bin2` varchar(50) NOT NULL,
  `nik2` varchar(50) NOT NULL,
  `tempat_tgl_lahir2` varchar(50) NOT NULL,
  `kewarganegaraan2` varchar(50) NOT NULL,
  `agama2` varchar(50) NOT NULL,
  `pekerjaan2` varchar(50) NOT NULL,
  `alamat2` varchar(50) NOT NULL,
  `nama3` varchar(50) NOT NULL,
  `bin3` varchar(50) NOT NULL,
  `nik3` varchar(50) NOT NULL,
  `tempat_tgl_lahir3` varchar(50) NOT NULL,
  `kewarganegaraan3` varchar(50) NOT NULL,
  `agama3` varchar(50) NOT NULL,
  `pekerjaan3` varchar(50) NOT NULL,
  `alamat3` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `formulir_surat_izin_orang_tua`
--

INSERT INTO `formulir_surat_izin_orang_tua` (`id_fsiot`, `jenis_surat`, `no_surat`, `nik`, `bin`, `nama1`, `bin1`, `nik1`, `tempat_tgl_lahir1`, `kewarganegaraan1`, `agama1`, `pekerjaan1`, `alamat1`, `nama2`, `bin2`, `nik2`, `tempat_tgl_lahir2`, `kewarganegaraan2`, `agama2`, `pekerjaan2`, `alamat2`, `nama3`, `bin3`, `nik3`, `tempat_tgl_lahir3`, `kewarganegaraan3`, `agama3`, `pekerjaan3`, `alamat3`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(39, 'Formulir Surat Izin Orang Tua', '998522', '12345', 'dsd', 'dsdas', 'sdsa', 'sdas', 'sd', 'sd', 'sad', 'ds', 'asd', 'sd', 'sd', 'sd', 'sd', 'sda', '-', '-', '-', '-', '-', '-', '-', 'hgjgh', 'hj', 'j', 'hg', '2025-06-13 16:48:19', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin@e-suratdesa.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Kepala Desa', 'kades', 'kepaladesa@desa.id', '0cfa66469d25bd0d9e55d7ba583f9f2f', 'kades');

-- --------------------------------------------------------

--
-- Table structure for table `pejabat_desa`
--

CREATE TABLE `pejabat_desa` (
  `id_pejabat_desa` int(11) NOT NULL,
  `nama_pejabat_desa` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pejabat_desa`
--

INSERT INTO `pejabat_desa` (`id_pejabat_desa`, `nama_pejabat_desa`, `jabatan`, `pangkat`, `nip`) VALUES
(1, 'H JAMALUDDIN, S.Sos', 'Kepala Desa', 'Pangkat penata III/e', 'Nip. 12559966887799'),
(2, '../../../../assets/img/barcode.png', 'Kepala Desa', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jalan` varchar(100) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `pend_kk` varchar(20) NOT NULL,
  `pend_terakhir` varchar(20) NOT NULL,
  `pend_ditempuh` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `status_dlm_keluarga` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(5) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `jalan`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `no_kk`, `pend_kk`, `pend_terakhir`, `pend_ditempuh`, `pekerjaan`, `status_perkawinan`, `status_dlm_keluarga`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`) VALUES
(93, '12345', 'dg bali', 'JENEPONTO', '1988-06-25', 'Laki-laki', 'ISLAM', 'JENEPONTO', 'Ciokong', '001', '001', 'BULULOE', 'ALLU TAROWANG', 'Kabupaten JENEPONTO', '73225411111', 'S1/SEDERAJAT', 'S1/SEDERAJAT', 'D3/SEDERAJAT', 'PENGUSAHA', 'Menikah', 'Ayah', 'WNI', 'DAENG PATTA', 'RINA DG JPA'),
(92, '3517112233440001', 'Adi Fahrian Hidayat FARDAN GATT', 'jombang', '1997-12-14', '', 'Islam', 'jl. KH. hasyim asy\'ari no. 15', 'Ciokong', '001', '002', 'menturus', 'kudu', 'jombang', '3517000000000002', 'SLTA/SEDERAJAT', 'SLTA/SEDERAJAT', 'S1/SEDERAJAT', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Imam Haryono', 'Nasihaha'),
(1502, '7304041301120002', 'Rendi sesudah', 'Bo\'nia', '2012-01-13', 'PEREMPUAN', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', 'tambah BATRU', '', '', '', '', ''),
(1499, '7304043112530079', 'Make', 'Bo\'nia', '1953-12-31', '', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1674, '7304080107450001', 'Sainong', 'Jeneponto', '1945-07-01', '', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1754, '7304080107650006', 'Jufri', 'Arungkeke', '1970-01-01', '', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1552, '7304080107830042', 'Rannu', 'Jeneponto', '1985-07-01', '', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1706, '7304080107910040', 'HairuddinC FARDN', 'Saroanging', '1991-07-01', '', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1613, '7304080111970001', 'Firmansyah', 'Sarroanging', '1997-11-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1546, '7304080201620001', 'Banyo', 'Jeneponto', '1952-01-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1582, '7304080202820001', 'Baharuddin', 'Jeneponto', '1982-02-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1776, '7304080203760001', 'Alexander Agung, S.Sos', 'Jeneponto', '1976-07-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1583, '7304080203830004', 'Kasmawati', 'Bo\'nia', '1983-03-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1624, '7304080204820005', 'Sarifuddin Dg. Lallo', 'Jeneponto', '1982-04-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1720, '7304080206680002', 'Sattu', 'Balang Loe', '1968-05-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1653, '7304080301150002', 'Danil Syaputra', 'Bo\'nia', '2015-01-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1492, '7304080303040003', 'Feri', 'Sarroanging', '2004-03-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1683, '7304080304150001', 'Muh. Tasbi', 'Je\'neponto', '2015-04-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1523, '7304080304900002', 'Amriani', 'Bo\'nia', '1990-12-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1525, '7304080305000004', 'Dedi Arsandi', 'Bo\'nia', '2000-03-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1778, '7304080305030001', 'Muh. Sigit Nur Agung', 'Bo\'nia', '2002-05-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1794, '7304080305520001', 'Siajang', 'Bo\'nia', '1952-05-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1542, '7304080305700001', 'Farida', 'Bo\'nia', '1970-06-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1594, '7304080305930003', 'Jumriani', 'Bo\'nia', '1993-05-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1730, '7304080306080002', 'Muhammad Aldo FARDANFARDAN', 'Bo\'nia', '2008-06-03', '', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1735, '7304080306830002', 'Akrim Nuhun Musa, S.Pdi', 'Marica', '1983-06-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1686, '7304080308160002', 'Muh.Farhan Yusuf', 'Je\'neponto', '2016-08-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1497, '7304080309980001', 'Hendrawan', 'Kaluku', '1998-09-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1576, '7304080311630001', 'Moddin', 'Bo\'nia', '1963-11-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1636, '7304080311710002', 'Mardiana', 'Makassar', '1971-11-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1745, '7304080312790002', 'Arifin', 'Bo\'nia', '1979-12-03', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1704, '7304080402520001', 'Hadeng', 'Bo\'nia', '1952-02-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1585, '7304080404150002', 'Muh. Rizky Setiawan', 'Bo\'nia', '2015-04-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1581, '7304080404150003', 'Muh. Rifki Setiawan', 'Bo\'nia', '2015-04-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1595, '7304080406940001', 'Herman', 'Bo\'nia', '1994-06-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1588, '7304080407930001', 'Herawati', 'Makassar,', '1993-07-04', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1521, '7304080501520001', 'Balumbung', 'Jeneponto', '1962-01-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1791, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1569, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1476, '7304080508540001', 'Suma Dg. Jarre', 'Jeneponto', '1954-08-05', '', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1731, '7304080509640001', 'Syamsuddin', 'Jeneponto', '1964-09-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1506, '7304080510070001', 'Rudi', 'Bo\'nia', '2007-10-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1586, '7304080510700001', 'Rafiuddin', 'Jeneponto', '1970-10-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1684, '7304080510880004', 'Muh Yusuf', 'Kendari', '1988-10-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1635, '7304080608720001', 'Azis', 'Jenepontio', '1972-08-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1573, '7304080609500001', 'Rali', 'Bo\'nia', '1950-09-06', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1570, '7304080610740001', 'Hariyati, S.Com', 'Bo\'nia', '1974-10-06', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1593, '7304080610900001', 'Rasyid', 'Bo\'nia', '1990-10-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1758, '7304080612710001', 'Sahabuddin', 'Jeneponto', '1971-12-06', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1696, '7304080702170001', 'Affan Asrofi Nas', 'Je\'neponto', '2017-02-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1551, '7304080703810001', 'Mantan Dg. Tale', 'Jeneponto', '1981-03-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1590, '7304080705020001', 'Aswar', 'Bo\'nia', '2002-05-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1478, '7304080706720001', 'Samsuddin', 'Bo\'nia', '1964-06-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1762, '7304080706780002', 'Ribi', '', '2025-06-17', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1661, '7304080708590002', 'Kasri', 'Saroanging', '1959-08-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1559, '7304080709640001', 'Mashudi', 'Bo\'nia', '1964-09-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1677, '7304080711850001', 'Jumrah', 'Bo\'nia', '1985-11-07', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1750, '7304080711940002', 'Sudarmin', 'Jeneponto', '1994-11-07', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1541, '7304080802130001', 'Dela Savira', 'Bo\'nia', '2013-02-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1662, '7304080802810001', 'Tamsir', 'Jeneponto', '1981-02-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1615, '7304080805110002', 'Firgawahyu', 'Jeneponto', '2011-05-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1493, '7304080807100001', 'Wahyudi', 'Sarroanging', '2010-07-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1690, '7304080808090002', 'Aditia', 'Bo\'nia', '2009-08-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1703, '7304080808930001', 'Muhlis', 'Bo\'nia', '1993-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1572, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1779, '7304080901090002', 'Muh. Khaerun Nur Agung', 'Bo\'nia', '2009-09-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1596, '7304080902010001', 'Irfan', 'Bo\'nia', '2001-02-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1785, '7304080902050001', 'Muh. Nur Fahmi', 'Jeneponto', '2005-02-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1522, '7304081002700001', 'Satturri', 'Jeneponto', '1970-02-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1681, '7304081005920003', 'Rahmat', 'Talabua', '1992-05-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1673, '7304081007000001', 'Rahul', 'Bo\'nia', '2002-07-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1574, '7304081007660001', 'Kulle', 'Bo\'nia', '1966-07-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1600, '7304081010650001', 'Mansyur DJS', 'Bo\'nia', '1965-10-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1787, '7304081010650005', 'Mansyur DJS', 'Bo\'nia', '1965-10-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1488, '7304081012600001', 'Taju Dg. Jarre', 'Bo\'nia', '1960-12-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1671, '7304081104680001', 'Nusu', 'Bo\'nia', '1968-04-11', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1691, '7304081106950002', 'Sakri', 'Bo\'nia', '1970-01-01', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1679, '7304081112100001', 'Ahmad Ali Akbar', 'Bo\'nia', '2010-12-11', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1481, '7304081201050001', 'Jusriani', 'Bo\'nia', '2005-01-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1658, '7304081201520001', 'M. Dg. Lili', 'Sidenre', '1952-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1638, '7304081201790002', 'Sultan', 'Jeneponto', '1979-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1641, '7304081203070003', 'Muh. Ulil Raezy Saputra', 'Bo\'nia', '2007-03-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1643, '7304081203630003', 'Sahrir', 'Jeneponto', '1969-03-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1548, '7304081203870001', 'Neru', 'Jeneponto', '1987-03-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1687, '7304081204730001', 'Mantang', 'Je\'neponto', '1973-04-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1740, '7304081207150002', 'Abrar R. Al muarif', 'jeneponto', '2015-07-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1577, '7304081207630001', 'Sinampara', 'Jeneponto', '1963-07-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1689, '7304081212980001', 'Agung', 'Bo\'nia', '1998-04-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1738, '7304081303910003', 'Abdullah, S.pdi', 'Kaluku', '1991-03-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1654, '7304081308890001', 'Agus Salim', 'Jeneponto', '1989-08-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1571, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1543, '7304081403990001', 'Adrian', 'Makassar', '1999-03-14', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1725, '7304081404600001', 'Sampara', 'Je\'neponto', '1960-04-14', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1747, '7304081409990002', 'Syahrul Arifin', 'Bo\'nia', '2000-02-27', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1599, '7304081411070001', 'Muh. Alif Safaat', 'Makassar', '2007-11-14', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1678, '7304081501060003', 'Adel Amelia', 'Bo\'nia', '2006-01-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1722, '7304081505090003', 'Aril S', 'Bo\'nia', '2009-05-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1627, '7304081506080001', 'Said Abidin Al Monawar', 'Jeneponto', '2008-06-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1609, '7304081507600001', 'Mangngaribi', 'Bo\'nia', '1960-07-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1537, '7304081510090001', 'Al Gazali', 'Bo\'nia', '2009-10-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1737, '7304081510100001', 'M Subhan Hidayatullah', 'Jeneponto', '2010-10-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1749, '7304081512920004', 'Gatot', 'Jeneponto', '1992-12-15', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1786, '7304081603180002', 'Muh. Azka Al Gibran', 'Jeneponto', '2018-03-16', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1647, '7304081603560001', 'Samsia', 'Bo\'nia', '1956-03-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1534, '7304081606820001', 'Akbar Tompo', 'Bo\'nia', '1982-06-16', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1616, '7304081607140004', 'Firhandani', 'Jeneponto', '2014-07-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1558, '7304081702100001', 'Selfiana', 'Antang', '2010-02-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1646, '7304081702540001', 'Sarifuddin', 'Jeneponto', '1954-02-17', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1528, '7304081703890001', 'Nurbaya', 'Bo\'nia', '1989-03-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1544, '7304081707050001', 'Aidir Aswar', 'Makassar', '2003-07-28', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1529, '7304081712090002', 'Ahmad Fajri', 'Jeneponto', '2009-12-17', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1550, '7304081802090001', 'Refal', 'Lianga', '2009-02-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1566, '7304081803780002', 'Kamaruddin', 'Jeneponto', '1978-03-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1509, '7304081805150001', 'Reski', 'Bo\'nia', '2015-05-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1597, '7304081806650001', 'Sitorongking, S.Pd.', 'Bungung Boddi', '1965-06-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1568, '7304081901070006', 'Syamsuddin Arif Hidayatullah', 'Tarakan', '2007-01-19', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1578, '7304081901080001', 'Muh. Rais Setiawan', 'Bo\'nia', '2008-01-19', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1652, '7304081906060003', 'Dimas', 'Malaysia', '2006-06-19', 'Laki-laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1630, '7304082003550001', 'H. Hama', 'Jeneponto', '1955-03-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1530, '7304082004150001', 'Awal Al Khairul', 'Jeneponto', '2015-04-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1517, '7304082008760001', 'Manni', 'Barayya', '1976-08-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1505, '7304082101050002', 'Heri', 'Bo\'nia', '2005-05-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1538, '7304082105830002', 'Saenal', 'Bo\'nia', '1983-05-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1648, '7304082106450001', 'Juru', 'Saroanging', '1945-06-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1660, '7304082106560001', 'Sambe', 'Saroanging', '1956-06-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1770, '7304082107910003', 'Ilyas', 'Cambalangkasa', '1997-07-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1783, '7304082108760001', 'Suamang', 'Jeneponto', '1976-08-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1676, '7304082108800001', 'Kahar Dg Boko', 'Jeneponto', '1980-08-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1540, '7304082205080001', 'Muh. Fachri', 'Bo\'nia', '2008-05-22', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1649, '7304082304770002', 'Rudi', 'Bontolaya', '1977-04-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1633, '7304082305650001', 'Badong Dg. Limpo', 'Jenepontio', '1963-05-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1640, '7304082306020001', 'Muh. Misba Prayoga Sultan', 'Bo\'nia', '2002-06-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1645, '7304082307880003', 'Rendi Rian', 'Bo\'nia', '1988-07-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1614, '7304082312990001', 'Firdayanti', 'Jeneponto', '1999-01-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1533, '7304082401060001', 'Dandi', 'Bo\'nia', '2006-01-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1741, '7304082401170001', 'Azlam Al- Azzam', 'jeneponto', '2017-01-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1587, '7304082408770001', 'Herma', 'Ujung Pandang', '1977-08-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1708, '7304082409100001', 'Rian', 'Saroanging', '2010-11-19', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1520, '7304082411040001', 'Erwin', 'Bo\'nia', '2004-11-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1557, '7304082412040001', 'Suci', 'Antang', '2004-12-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1642, '7304082503090001', 'Muh. Tri Mukhtar', 'Bo\'nia', '2009-03-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1496, '7304082503950001', 'Heriwardani', 'Kaluku', '1995-03-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1474, '7304082506580001', 'H. Baso Se\'re', 'Jeneponto', '1958-06-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1560, '7304082506690001', 'Syamsuyanti', 'Bo\'nia', '1969-06-25', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1611, '7304082508730002', 'Kamaruddin', 'Jeneponto', '1973-08-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1475, '7304082509910001', 'Abd. Rahman', 'Jeneponto', '1991-09-25', 'laki-laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1526, '7304082511030004', 'Adi Gunawan', 'Bo\'nia', '2003-11-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1608, '7304082607110002', 'Muhammad Riza Syaputra', 'Kalumpang Loe', '2011-07-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1629, '7304082610100002', 'Muh.Zaki Akbar', '', '1970-01-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1701, '7304082611080001', 'Muh. Riflki', 'Bo\'nia', '2005-11-26', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1482, '7304082701530001', 'Jumaseng', 'Lianga', '1953-01-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1626, '7304082703060004', 'Said Agil Al Monawar', 'Jeneponto', '2006-03-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1659, '7304082704540001', 'Mida', 'Bo\'nia', '1954-04-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1697, '7304082705570002', 'Bakkang Dg Rate', 'Je\'neponto', '1957-05-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1503, '7304082706740001', 'Turu', 'Bo\'nia', '1974-06-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1556, '7304082710850001', 'Rosdiana', 'Antang', '1985-10-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1644, '7304082712000001', 'Dedi Arsandi', 'Bo\'nia', '2000-12-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1480, '7304082802000001', 'Jusman', 'Bo\'nia', '2000-02-28', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1539, '7304082812850001', 'Rosmala Dewi', 'Bo\'nia', '1985-12-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1501, '7304082908970001', 'Agus', 'Bo\'nia', '1997-08-29', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1639, '7304083012780002', 'Hasniati', 'Bo\'nia', '1978-12-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1604, '7304083012790001', 'Ruslan Rola', 'Jeneponto', '1979-12-30', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1554, '7304083103110001', 'Muh. Zul Ikram', 'Jeneponto', '2011-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1796, '7304083107000001', 'Ardianto', 'Bo\'nia', '2000-07-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1527, '7304083108760002', 'Safaruddin Dg. Rani', 'Bo\'nia', '1976-08-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1592, '7304083112290019', 'Tahere', 'Bo\'nia', '1929-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1563, '7304083112380001', 'Jarigau Dg. Bundu', 'Bo\'nia', '1958-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1564, '7304083112430001', 'Rukiah', 'Bo\'nia', '1943-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1565, '7304083112780001', 'Rahma', 'Bo\'nia', '1978-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1589, '7304083112980001', 'Muh. Rasul', 'Bo\'nia', '1998-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1621, '7304084102020001', 'Nuralisa', 'Jeneponto', '2002-02-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1598, '7304084102490002', 'Hj. Yummi', 'Jeneponto', '1949-02-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1774, '7304084102990002', 'Rina', 'Bo\'nia', '1999-02-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1610, '7304084105610001', 'Sitti', 'Bo\'nia', '1961-05-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1665, '7304084106090001', 'Nur Al  firah', 'Jeneponto', '2009-06-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1512, '7304084106860001', 'Suarni', 'Bo\'nia', '1986-06-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1751, '7304084107000055', 'Nurfani', 'Jeneponto', '2000-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1675, '7304084107490002', 'Sadaria', 'Bo\'nia', '1949-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1601, '7304084107620043', 'Saribulang', 'Bo\'nia', '1962-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1632, '7304084107840006', 'Hasnah', 'Bo\'nia', '1984-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1728, '7304084109040001', 'Israwati', 'Sungguminasa', '2004-09-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1495, '7304084110740001', 'Sinawati', 'Kaluku', '1974-10-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1507, '7304084203100002', 'Bintang', 'Bo\'nia', '2010-03-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1705, '7304084203420001', 'Sakati', 'Jeneponto', '1942-03-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1688, '7304084207700001', 'Basmi', 'Bontorea', '1970-07-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1769, '7304084209800002', 'Hayati', 'Cambalangkasa', '1980-09-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1485, '7304084211720001', 'Halija', 'Bo\'nia', '1972-11-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1733, '7304084307720002', 'Nia', 'Jeneponto', '1972-07-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1777, '7304084308830001', 'Hj. Nurlaela', 'Bo\'nia', '1983-08-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1672, '7304084403700001', 'Ati', 'Bo\'nia', '1970-03-04', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1702, '7304084403780001', 'Hasnah', 'Jeneponto', '1978-03-04', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1519, '7304084506030002', 'Yulianti', 'Jeneponto', '1999-10-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1723, '7304084506100003', 'Hartina S', 'Bo\'nia', '2010-06-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1605, '7304084506820001', 'Syamsinar', 'Kalumpang Loe', '1970-01-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1516, '7304084507100002', 'Putri Anita', 'Bo\'nia', '2012-07-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1803, '7304084508720005', 'Ria', 'Bo\'nia', '1972-08-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1618, '7304084609720002', 'Sarilu', 'Jeneponto', '1972-09-06', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1724, '7304084709780003', 'Mawati', 'Bo\'nia', '1978-09-07', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1748, '7304084710110001', 'Syahrini', 'Bo\'nia', '2011-10-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1489, '7304084803650001', 'Balaeng', 'Bo\'nia', '1969-03-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1637, '7304084805970002', 'Halima Tussadiyah', 'Kalimantan Timur', '1997-07-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1743, '7304084808930002', 'Irmawati', 'Benrong', '1993-08-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1793, '7304084809930001', 'Fitriani', 'Bo\'nia', '1993-09-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1619, '7304084901940001', 'Nurjanni', 'Jeneponto', '1994-10-09', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1719, '7304084911650001', 'Sitti', 'Bo\'nia', '1965-11-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1518, '7304085002800001', 'Ida', 'Bo\'nia', '1980-02-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1491, '7304085003800001', 'Manci', 'Sarroanging', '1980-03-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1634, '7304085004550001', 'Hj. Nursiah', 'Jenepontio', '1955-04-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1792, '7304085005650001', 'Hj. Hadasiah', 'Bo\'nia', '1965-05-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1729, '7304085008770002', 'Suriani', 'Bo\'nia', '1977-08-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1547, '7304085009550001', 'Pati', 'Jeneponto', '1955-09-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1606, '7304085010020008', 'Oktaviana', 'Kalumpang Loe', '2002-10-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1721, '7304085010780001', 'Sarinang', 'Bo\'nia', '1978-10-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1549, '7304085010900004', 'Nurhayati', 'Lianga', '1990-10-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1784, '7304085101760002', 'Salmawati', 'Jeneponto', '1976-01-11', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1625, '7304085107820003', 'Idawati Dg. Kanang', 'Jeneponto', '1982-07-11', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1759, '7304085112730003', 'Hj. Nurhayati', 'Mombi', '1970-01-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1575, '7304085201600001', 'Pia', 'Jeneponto', '1960-01-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1761, '7304085201600002', 'Rapati', 'Bo\'nia', '1960-01-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1651, '7304085202020002', 'Dini Aminarti', 'Bo\'nia', '2002-02-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1700, '7304085202990001', 'Devi Dwiyanti', 'Bone', '1999-04-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1483, '7304085205550002', 'Sitti', 'Bo\'nia', '1955-05-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1620, '7304085210970002', 'Risal', 'Jeneponto', '1997-10-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1795, '7304085302610001', 'Sayati', 'Mattoanging', '1961-02-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1755, '7304085303690001', 'Suasah', 'Jeneponto', '1969-03-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1768, '7304085303860004', 'Irma', 'Jeneponto', '1986-03-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1555, '7304085304170002', 'Naila Aprilia Humaerah', 'Jeneponto', '2017-04-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1602, '7304085411700001', 'Salma', 'Bo\'nia', '1970-11-14', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1685, '7304085503790002', 'Irmawati', 'Je\'neponto', '1979-03-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1650, '7304085506780001', 'Suriani', 'Bo\'nia', '1978-06-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1727, '7304085512990001', 'Risma Trisnawati', 'Bo\'nia', '1999-12-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1746, '7304085603790002', 'Rabaisa', 'Bonto Parang', '1979-03-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1767, '7304085607840004', 'Sumarni', 'Jeneponto', '1984-07-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1612, '7304085611760001', 'Dahlia', 'Jeneponto', '1976-11-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1744, '7304085708140001', 'Husni Agustina', 'Bo\'nia', '2014-08-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1757, '7304085711020001', 'Nurul Suci', 'Jeneponto', '2002-11-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1760, '7304085711230546', 'Hj. Sannari', 'Bo\'nia', '1930-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1504, '7304085803730001', 'Rindu', 'Bo\'nia', '1973-03-18', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1699, '7304085806740001', 'Samsinar', 'Bo\'nia', '1974-08-18', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1726, '7304085812710001', 'Cia', 'Kindang', '1971-12-18', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1628, '7304085903150001', 'Ainun Thalita Zahra', 'Jeneponto', '2015-03-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1545, '7304085907060001', 'Adelia', 'Jeneponto', '2006-07-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1535, '7304085909740001', 'Harniati', 'Bo\'nia', '1974-09-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1682, '7304085909920001', 'Lina', 'Bo\'nia', '1992-09-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1756, '7304085910950001', 'Nana Marselah', 'Jeneponto', '1995-10-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1732, '7304086003700001', 'Rosdiana', 'Jeneponto', '1970-03-20', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1561, '7304086003990002', 'Sri Mariasti', 'Bo\'nia', '1999-03-20', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1739, '7304086007860001', 'Rasmila', 'jeneponto', '1986-07-20', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1524, '7304086101950001', 'Samsinar', 'Bo\'nia', '1995-01-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1717, '7304086107860002', 'Samsuarni', 'Bo\'nia', '1986-07-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1579, '7304086112870001', 'Samsuanti', 'Bo\'nia', '1987-12-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1487, '7304086201130002', 'Selvina', 'Bo\'nia', '2013-01-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1766, '7304086201800001', 'Samsiah', 'Jeneponto', '1980-01-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1515, '7304086206100003', 'Putri Natasyah', 'Bo\'nia', '2010-06-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1567, '7304086208870001', 'Syamsiah', 'Bo\'nia', '1987-08-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1695, '7304086210860002', 'Yulianti,S.Pd', 'Je\'neponto', '1986-10-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1510, '7304086302160001', 'Ira', 'Jeneponto', '2016-02-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1514, '7304086303060001', 'Nur Indayanti', 'Bo\'nia', '2006-03-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1631, '7304086306600001', 'Hj. Karenia', 'Jeneponto', '1960-06-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1664, '7304086307050001', 'Nur Fitrah', 'Jeneponto', '2005-07-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1603, '7304086307880001', 'Rahmi', 'Jenepont', '1988-07-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1622, '7304086404100001', 'Nur Cahya Putri', 'Jeneponto', '2010-04-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1772, '7304086404840003', 'Irma', 'Jeneponto', '1984-04-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `penduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `jalan`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `no_kk`, `pend_kk`, `pend_terakhir`, `pend_ditempuh`, `pekerjaan`, `status_perkawinan`, `status_dlm_keluarga`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`) VALUES
(1477, '7304086407600001', 'Mina', 'Mattoangin', '1960-07-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1562, '7304086408050002', 'Andini Agustiani', 'Bo\'nia', '2005-08-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1536, '7304086605070001', 'Inka Monika Pratami', 'Bo\'nia', '2007-05-26', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1580, '7304086701000002', 'Lisnawati', 'Bo\'nia', '2000-01-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1623, '7304086701140002', 'Hajra Pratiwi', 'Jeneponto', '2014-01-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1655, '7304086702900003', 'Mariani', 'Bo\'nia', '1990-02-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1663, '7304086706840002', 'Salma', 'Jeneponto', '1984-06-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1607, '7304086802060002', 'Qory Dwita', 'Kalumpang Loe', '2006-02-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1479, '7304086802750001', 'Sarsina', 'Bo\'nia', '1975-02-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1734, '7304086802990002', 'Ani', 'Bo\'nia', '1999-02-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1513, '7304086804020001', 'Marshanda', 'Bo\'nia', '2002-04-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1498, '7304086904070002', 'Hera Wardina', 'Bo\'nia', '2007-04-29', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1709, '7304087003170001', 'Nurul Salsabila', 'Jeneponto', '2017-03-30', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1736, '7304087010760003', 'Bulaeng, A.M.a', 'Jeneponto', '1976-10-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1800, '7304087010920000', 'Ekawati', 'Bo\'nia', '1992-10-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1508, '7304087110120002', 'Rini', 'Bo\'nia', '2012-10-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1710, '7304087112280002', 'Cami', 'Bo\'nia', '1928-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1765, '7304087112440003', 'Basse', 'Jeneponto', '1944-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1711, '7304087112500011', 'Joho', 'Bo\'nia', '1928-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1712, '7304087112530002', 'Kami', 'Bo\'nia', '1953-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1693, '7304087112600018', 'Patimasan', 'Bo\'nia', '1960-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1532, '7304087112690001', 'Salma', 'Karampangpajja', '1969-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1500, '7304087112700023', 'Sari', 'Bo\'nia', '1970-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1713, '7304111505840002', 'Sapiruddin', 'Borongloe', '1984-05-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1715, '7304112011110001', 'Rezaldi', 'Borongloe', '2011-11-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1714, '7304117112850066', 'Lia', 'Makassar', '1985-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1716, '7306073112910052', 'Syarifuddin Syam', 'Bontoa', '1989-07-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1670, '7371070201020007', 'Nandito', 'Jeneponto', '2002-01-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1667, '7371070210750012', 'Rudi', 'Jeneponto', '1975-10-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1669, '7371075503990009', 'Nadilah', 'Jeneponto', '1999-03-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1668, '7371075505800012', 'Hasnah', 'Jeneponto', '1980-05-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1694, '7371100607830015', 'Nasaruddin,S.Pd', 'Je\'neponto', '1963-07-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1781, '7371102302740015', 'Syamsuddin Itho', 'Makassar', '1974-02-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1764, '7371102903980006', 'Muh.Fadil Dalali', 'Pare-pare', '1970-01-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1763, '7371106108760009', 'Suraidah', 'Jeneponto', '1976-08-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(1782, '7371106911760008', 'Karesunggu', 'Jeneponto', '1976-11-29', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id_profil_desa` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telpon` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` varchar(50) NOT NULL,
  `ttd_digital` varchar(350) DEFAULT NULL,
  `gambar_kop` varchar(350) DEFAULT NULL,
  `logo_desa` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profil_desa`
--

INSERT INTO `profil_desa` (`id_profil_desa`, `nama_desa`, `alamat`, `no_telpon`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `ttd_digital`, `gambar_kop`, `logo_desa`) VALUES
(1, 'Bungungloe', 'Alamat : Bontosunggu Utara Desa Bungungloe Kec. Turatea Kabupaten Jeneponto', '', 'Turatea', 'Kabupaten Jeneponto', 'Sulawesi Selatan', 'Kode Pos 92312', 'barcode.png', '311122910_406575298308078_714964801078203355_n.png', 'Logo-Pangandaran.png');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan`
--

CREATE TABLE `surat_keterangan` (
  `id_sk` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_beda_identitas`
--

CREATE TABLE `surat_keterangan_beda_identitas` (
  `id_skbi` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `perbedaan` varchar(30) NOT NULL,
  `nama_kartu_identitas` varchar(30) NOT NULL,
  `nama_no_identitas` varchar(30) NOT NULL,
  `nama2` varchar(30) NOT NULL,
  `tgl_lahir2` varchar(30) NOT NULL,
  `jenis_kelamin2` varchar(20) NOT NULL,
  `alamat2` varchar(50) NOT NULL,
  `agama2` varchar(30) NOT NULL,
  `pekerjaan2` varchar(200) NOT NULL,
  `keterangan2` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_beda_identitas`
--

INSERT INTO `surat_keterangan_beda_identitas` (`id_skbi`, `jenis_surat`, `no_surat`, `nik`, `perbedaan`, `nama_kartu_identitas`, `nama_no_identitas`, `nama2`, `tgl_lahir2`, `jenis_kelamin2`, `alamat2`, `agama2`, `pekerjaan2`, `keterangan2`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(25, 'Surat Keterangan Beda Identitas', '001/SKTM/KODE-DESA/VI/2025', '12345', 'KTP', 'saa', 'sa1122', 'sd', '2121', 'Perempuan', 'adsad', '-', '15', 'assa', '2025-06-16 14:50:06', 2, 'SELESAI', 1),
(26, 'Surat Keterangan Beda Identitas', '02/SKTM/KODE-DESA/VI/2025', '12345', '', 'saa', 'sa1122', 'sd', '2121', 'Laki-Laki', 'adsad', '14', '15', 'assa', '2025-06-16 15:29:07', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_beda_identitas_kis`
--

CREATE TABLE `surat_keterangan_beda_identitas_kis` (
  `id_skbis` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `no_kartu` varchar(30) NOT NULL,
  `nama_di_kartu` varchar(30) NOT NULL,
  `nik2` varchar(30) NOT NULL,
  `alamat2` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `faskes_tingkat` varchar(30) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_beda_identitas_kis`
--

INSERT INTO `surat_keterangan_beda_identitas_kis` (`id_skbis`, `jenis_surat`, `no_surat`, `nik`, `keperluan`, `no_kartu`, `nama_di_kartu`, `nik2`, `alamat2`, `tanggal_lahir`, `faskes_tingkat`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(30, 'Surat Keterangan Beda Identitas KIS', '001/SKTM/KODE-DESA/VI/2025', '12345', '', '0101', '4141', '4141', 'adsad', '1990-04-21', 'DFDD', '2025-06-16 18:46:04', 1, 'SELESAI', 1),
(31, 'Surat Keterangan Beda Identitas KIS', '02/SKTM/KODE-DESA/VI/2025', '12345', '', '0101', '4141', '4141', 'adsad', '2001-06-14', 'DFDD', '2025-06-16 19:13:19', 2, 'SELESAI', 1),
(32, 'Surat Keterangan Beda Identitas KIS', '03/SKTM/KODE-DESA/VI/2025', '3517112233440001', '', '0101', '4141', '4141', 'adsad', '2025-06-06', 'DFDD', '2025-06-16 19:34:24', 1, 'SELESAI', 1),
(33, 'Surat Keterangan Beda Identitas KIS', '04/SKTM/KODE-DESA/VI/2025', '12345', 'MENGURUS', '12256633225858744', 'NONCI NONCI', '73925555698855541', 'adsadSAAASSASAA', '0000-00-00', 'DFDDSAAASAA', '2025-06-16 19:52:08', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_berkelakuan_baik`
--

CREATE TABLE `surat_keterangan_berkelakuan_baik` (
  `id_skbb` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_berkelakuan_baik`
--

INSERT INTO `surat_keterangan_berkelakuan_baik` (`id_skbb`, `jenis_surat`, `no_surat`, `nik`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(6, 'Surat Keterangan Berkelakuan Baik', '22', '3517112233440001', 'Persyaratan Melamar Pekerjaan', '2019-12-14 04:01:17', 2, 'SELESAI', 1),
(7, 'Surat Keterangan Berkelakuan Baik', '003/SKT/KODE/06/2025', '3517112233440001', 'Persyaratan Melamar Pekerjaan', '2019-12-14 04:01:22', 1, 'SELESAI', 1),
(8, 'Surat Keterangan Berkelakuan Baik', '003/SKBB/KODE/06/202', '12345', 'IJAZAH', '2025-06-08 21:51:30', 1, 'SELESAI', 1),
(9, 'Surat Keterangan Berkelakuan Baik', '004/SKBB/KODE/06/202', '12345', 'MELAMAR KERJA', '2025-06-08 21:54:13', 1, 'SELESAI', 1),
(10, 'Surat Keterangan Berkelakuan Baik', '005/SKBB/KODE/06/202', '12345', 'MELAMAR KERJA', '2025-06-08 21:54:44', 1, 'SELESAI', 1),
(11, 'Surat Keterangan Berkelakuan Baik', '006/SKBB/KODE/06/202', '12345', 'SKCK', '2025-06-09 16:45:14', 1, 'SELESAI', 1),
(12, 'Surat Keterangan Berkelakuan Baik', '007/SKBB/KODE/06/202', '12345', 'MELAMAR KERJA', '2025-06-09 17:51:36', 1, 'SELESAI', 1),
(13, 'Surat Keterangan Berkelakuan Baik', '0008/SKBB/KODE/06/20', '12345', '1312', '2025-06-10 12:41:18', 1, 'SELESAI', 1),
(14, 'Surat Keterangan Berkelakuan Baik', '09/SKBB/KODE/06/20', '12345', 'MELAMAR KERJA', '2025-06-10 19:56:08', 1, 'SELESAI', 1),
(15, 'Surat Keterangan Berkelakuan Baik', '10/SKBB/KODE/06/20', '12345', 'MELAMAR KERJA', '2025-06-11 06:11:36', 2, 'SELESAI', 1),
(16, 'Surat Keterangan Berkelakuan Baik', '11/SKBB/KODE/06/20', '3517112233440001', 'PENDAFTARAN', '2025-06-11 06:11:41', 2, 'SELESAI', 1),
(17, 'Surat Keterangan Berkelakuan Baik', '12/SKBB/KODE/06/20', '3517112233440001', 'PENDAFTARAN', '2025-06-11 06:14:08', 1, 'SELESAI', 1),
(18, 'Surat Keterangan Berkelakuan Baik', '13/SKBB/KODE/06/20', '3517112233440001', 'MELAMAR KERJA', '2025-06-11 06:14:46', 2, 'SELESAI', 1),
(19, 'Surat Keterangan Berkelakuan Baik', NULL, '12345', 'MELAMAR KERJA', '2025-06-14 23:28:39', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_domisili`
--

CREATE TABLE `surat_keterangan_domisili` (
  `id_skd` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_domisili`
--

INSERT INTO `surat_keterangan_domisili` (`id_skd`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(7, 'Surat Keterangan Domisili', '31', '3517112233440001', NULL, '2019-12-14 04:01:28', 1, 'SELESAI', 1),
(8, 'Surat Keterangan Domisili', '002/SKD/KODE-DESA/06', '3517112233440001', NULL, '2019-12-14 04:01:32', 2, 'SELESAI', 1),
(9, 'Surat Keterangan Domisili', '003/SKD/KODE-DESA/VII/2025', '12345', NULL, '2025-06-08 21:55:10', 1, 'SELESAI', 1),
(10, 'Surat Keterangan Domisili', '004/SKD/KODE-DESA/VII/2025', '12345', NULL, '2025-06-08 21:57:23', 1, 'SELESAI', 1),
(11, 'Surat Keterangan Domisili', '005/SKD/KODE-DESA/VII/2025', '12345', NULL, '2025-06-08 21:58:19', 2, 'SELESAI', 1),
(12, 'Surat Keterangan Domisili', '006/SKD/KODE-DESA/VII/2025', '12345', NULL, '2025-06-09 10:26:42', 1, 'SELESAI', 1),
(13, 'Surat Keterangan Domisili', '007/SKD/KODE-DESA/VII/2025', '12345', NULL, '2025-06-09 11:10:59', 1, 'SELESAI', 1),
(14, 'Surat Keterangan Domisili', '008/SKD/KODE-DESA/VII/2025', '12345', NULL, '2025-06-09 13:54:23', 1, 'SELESAI', 1),
(15, 'Surat Keterangan Domisili', '009/SKD/KODE-DESA/VII/2025', '12345', NULL, '2025-06-09 15:25:28', 1, 'SELESAI', 1),
(16, 'Surat Keterangan Domisili', '010/SKD/KODE-DESA/VII/2025', '12345', NULL, '2025-06-10 05:54:24', 1, 'SELESAI', 1),
(17, 'Surat Keterangan Domisili', '011/SKD/KODE-DESA/VII/2025', '12345', NULL, '2025-06-10 07:37:27', 1, 'SELESAI', 1),
(18, 'Surat Keterangan Domisili', '0012/SKD/KODE-DESA/VII/2025', '12345', NULL, '2025-06-10 12:41:07', 1, 'SELESAI', 1),
(19, 'Surat Keterangan Domisili', '665', '12345', NULL, '2025-06-10 19:49:52', 1, 'SELESAI', 1),
(20, 'Surat Keterangan Domisili', '19999', '12345', NULL, '2025-06-10 19:50:10', 1, 'SELESAI', 1),
(21, 'Surat Keterangan Domisili', '20000', '12345', NULL, '2025-06-10 19:51:10', 1, 'SELESAI', 1),
(22, 'Surat Keterangan Domisili', '96', '12345', NULL, '2025-06-10 19:51:51', 1, 'SELESAI', 1),
(23, 'Surat Keterangan Domisili', '97', '12345', NULL, '2025-06-10 19:52:10', 1, 'SELESAI', 1),
(24, 'Surat Keterangan Domisili', '98/SKD/SS/VII/2025', '3517112233440001', NULL, '2025-06-10 19:53:00', 1, 'SELESAI', 1),
(25, 'Surat Keterangan Domisili', '99/SKD/SS/VII/2025', '12345', NULL, '2025-06-10 19:53:27', 2, 'SELESAI', 1),
(26, 'Surat Keterangan Domisili', '100/SKD/SS/VII/2025', '12345', NULL, '2025-06-10 19:55:35', 2, 'SELESAI', 1),
(27, 'Surat Keterangan Domisili', '101/SKD/SS/VII/2025', '12345', NULL, '2025-06-10 21:52:57', 2, 'SELESAI', 1),
(28, 'Surat Keterangan Domisili', '102/SKD/SS/VII/2025', '12345', NULL, '2025-06-10 22:31:21', 1, 'SELESAI', 1),
(29, 'Surat Keterangan Domisili', '103/SKD/SS/VII/2025', '12345', NULL, '2025-06-10 22:31:40', 1, 'SELESAI', 1),
(30, 'Surat Keterangan Domisili', '104/SKD/SS/VII/2025', '12345', NULL, '2025-06-10 22:32:01', 2, 'SELESAI', 1),
(31, 'Surat Keterangan Domisili', '105/SKD/SS/VII/2025', '12345', NULL, '2025-06-10 22:33:23', 1, 'SELESAI', 1),
(32, 'Surat Keterangan Domisili', '106/SKD/SS/VII/2025', '12345', NULL, '2025-06-10 22:33:36', 1, 'SELESAI', 1),
(33, 'Surat Keterangan Domisili', '107/SKD/SS/VII/2025', '3517112233440001', NULL, '2025-06-10 22:35:17', 1, 'SELESAI', 1),
(34, 'Surat Keterangan Domisili', '108/SKD/SS/VII/2025', '12345', NULL, '2025-06-10 22:45:25', 1, 'SELESAI', 1),
(35, 'Surat Keterangan Domisili', '109/SKD/SS/VII/2025', '3517112233440001', NULL, '2025-06-10 22:47:55', 1, 'SELESAI', 1),
(36, 'Surat Keterangan Domisili', '110/SKD/SS/VII/2025', '12345', NULL, '2025-06-10 22:54:55', 1, 'SELESAI', 1),
(37, 'Surat Keterangan Domisili', '111/SKD/SS/VII/2025', '12345', NULL, '2025-06-10 22:59:05', 2, 'SELESAI', 1),
(38, 'Surat Keterangan Domisili', '112/SKD/SS/VII/2025', '12345', NULL, '2025-06-11 01:52:14', 1, 'SELESAI', 1),
(39, 'Surat Keterangan Domisili', '113/SKD/SS/VII/2025', '12345', NULL, '2025-06-11 01:52:39', 2, 'SELESAI', 1),
(40, 'Surat Keterangan Domisili', '114/SKD/SS/VII/2025', '12345', NULL, '2025-06-13 19:43:42', 1, 'SELESAI', 1),
(41, 'Surat Keterangan Domisili', '115/SKD/SS/VII/2025', '12345', NULL, '2025-06-14 23:10:36', 1, 'SELESAI', 1),
(42, 'Surat Keterangan Domisili', '116/SKD/SS/VII/2025', '12345', NULL, '2025-06-15 14:21:38', 2, 'SELESAI', 1),
(43, 'Surat Keterangan Domisili', '117/SKD/SS/VII/2025', '12345', NULL, '2025-06-15 14:21:42', 2, 'SELESAI', 1),
(45, 'Surat Keterangan Domisili', '118/SKD/SS/VII/2025', '12345', NULL, '2025-06-18 06:56:01', 2, 'SELESAI', 1),
(46, 'Surat Keterangan Domisili', '119/SKD/SS/VII/2025', '3517112233440001', NULL, '2025-06-18 14:32:09', 1, 'SELESAI', 1),
(47, 'Surat Keterangan Domisili', '120/SKD/SS/VII/2025', '12345', NULL, '2025-06-18 14:32:26', 2, 'SELESAI', 1),
(50, 'Surat Keterangan Domisili', '122/SKD/SS/VII/2025', '3517112233440001', NULL, '2025-06-18 14:56:56', 2, 'SELESAI', 1),
(51, 'Surat Keterangan Domisili', '123/SKD/SS/VII/2025', '3517112233440001', NULL, '2025-06-18 15:02:03', 2, 'SELESAI', 1),
(52, 'Surat Keterangan Domisili', '124/SKD/SS/VII/2025', '3517112233440001', NULL, '2025-06-18 15:03:40', 2, 'SELESAI', 1),
(53, 'Surat Keterangan Domisili', '125/SKD/SS/VII/2025', '12345', NULL, '2025-06-18 15:16:56', 2, 'SELESAI', 1),
(54, 'Surat Keterangan Domisili', '126/SKD/SS/VII/2025', '12345', 10, '2025-06-18 15:20:50', 2, 'SELESAI', 1),
(55, 'Surat Keterangan Domisili', '127/SKD/SS/VII/2025', '12345', 11, '2025-06-18 15:29:33', 1, 'SELESAI', 1),
(56, 'Surat Keterangan Domisili', '128/SKD/SS/VII/2025', '7304080306080002', 12, '2025-06-18 15:30:43', 1, 'SELESAI', 1),
(57, 'Surat Keterangan Domisili', '129/SKD/SS/VII/2025', '7304080306080002', 13, '2025-06-18 15:30:59', 2, 'SELESAI', 1),
(58, 'Surat Keterangan Domisili', '130/SKD/SS/VII/2025', '7304080306080002', 14, '2025-06-18 15:31:29', 2, 'SELESAI', 1),
(59, 'Surat Keterangan Domisili', '131/SKD/SS/VII/2025', '7304080107910040', 15, '2025-06-18 15:34:53', 2, 'SELESAI', 1),
(60, 'Surat Keterangan Domisili', '132/SKD/SS/VII/2025', '7304080107910040', 16, '2025-06-18 15:35:12', 1, 'SELESAI', 1),
(61, 'Surat Keterangan Domisili', '133/SKD/SS/VII/2025', '7304041301120002', 17, '2025-06-18 16:11:17', 1, 'SELESAI', 1),
(62, 'Surat Keterangan Domisili', '134/SKD/SS/VII/2025', '7304041301120002', 18, '2025-06-18 16:12:05', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_domisili_usaha`
--

CREATE TABLE `surat_keterangan_domisili_usaha` (
  `id_skdu` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `jenis_usaha` varchar(50) NOT NULL,
  `alamat_usaha` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_domisili_usaha`
--

INSERT INTO `surat_keterangan_domisili_usaha` (`id_skdu`, `jenis_surat`, `no_surat`, `nik`, `jenis_usaha`, `alamat_usaha`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(44, 'Surat Keterangan Domisili Usaha', '99', '12345', 'jenis', 'BONTOSUNGGU', '2025-06-14 18:09:12', 2, 'SELESAI', 1),
(46, 'Surat Keterangan Domisili Usaha', '100', '12345', 'jenis', 'JL. KUMALA BALANG BERU', '2025-06-16 20:29:00', 2, 'SELESAI', 1),
(47, 'Surat Keterangan Domisili Usaha', NULL, '12345', '', '', '2025-06-17 11:26:33', NULL, 'PENDING', 1),
(48, 'Surat Keterangan Domisili Usaha', '001/SKTM/KODE-DESA/VI/2025', '3517112233440001', 'jenis', 'JL. KUMALA BALANG BERU', '2025-06-17 18:54:01', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_kematian`
--

CREATE TABLE `surat_keterangan_kematian` (
  `id_skk` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal_meninggal` varchar(50) NOT NULL,
  `bertempat_di` varchar(50) NOT NULL,
  `penyebab_kematian` varchar(50) NOT NULL,
  `nama_pelapor` varchar(50) NOT NULL,
  `nik_pelapor` varchar(50) NOT NULL,
  `tanggal_lahir_pelapor` varchar(50) NOT NULL,
  `pekerjaan_pelapor` varchar(50) NOT NULL,
  `alamat_pelapor` varchar(50) NOT NULL,
  `hubungan_pelapor` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_kematian`
--

INSERT INTO `surat_keterangan_kematian` (`id_skk`, `jenis_surat`, `no_surat`, `nik`, `tanggal_meninggal`, `bertempat_di`, `penyebab_kematian`, `nama_pelapor`, `nik_pelapor`, `tanggal_lahir_pelapor`, `pekerjaan_pelapor`, `alamat_pelapor`, `hubungan_pelapor`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(39, 'Surat Keterangan Kematian', '12', '12345', 'hari meninggal', 'tempat meninggal', 'penyebab meninggal', 'nama pelapor', 'nik pelapor', 'tanggal pelapor', 'pekerjaan pelapor', 'alamat pelapor', 'hubungan pelapor', '2025-06-14 14:52:54', 2, 'SELESAI', 1),
(41, 'Surat Keterangan Kematian', '13', '12345', 'hari meninggal', 'tempat meninggal', 'penyebab meninggal', 'wqq', 'wwq', 'wqwq', 'wqqw', 'qwqw', 'wqqw', '2025-06-14 17:16:54', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--

CREATE TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor` (
  `id_skkkb` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `roda` varchar(20) NOT NULL,
  `merk_type` varchar(30) DEFAULT NULL,
  `jenis_model` varchar(30) DEFAULT NULL,
  `tahun_pembuatan` varchar(30) DEFAULT NULL,
  `cc` varchar(30) DEFAULT NULL,
  `warna_cat` varchar(30) NOT NULL,
  `no_rangka` varchar(30) NOT NULL,
  `no_mesin` varchar(30) NOT NULL,
  `no_polisi` varchar(30) NOT NULL,
  `no_bpkb` varchar(30) NOT NULL,
  `atas_nama_pemilik` varchar(30) NOT NULL,
  `alamat_pemilik` varchar(200) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--

INSERT INTO `surat_keterangan_kepemilikan_kendaraan_bermotor` (`id_skkkb`, `jenis_surat`, `no_surat`, `nik`, `roda`, `merk_type`, `jenis_model`, `tahun_pembuatan`, `cc`, `warna_cat`, `no_rangka`, `no_mesin`, `no_polisi`, `no_bpkb`, `atas_nama_pemilik`, `alamat_pemilik`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(5, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '003/KKKB/KODE-DESA/VII/2025', '3517112233440001', '', 'honda', 'sepeda motor', '2015', '125', 'merah-putih', 'MH1JFP113FK367341', 'JFP1E1375858', 'S 5503ZW', 'L-12009674', 'adi fahrian hidayat', 'Jl. KH. Hasyim Asy\'ari No. 15, RT001/RW002, Dusun Menturus,\r\nDesa Menturus, Kecamatan Kudu, Jombang', 'Kelengkapan Persyaratan Pengajuan Modal Usaha', '2019-12-14 04:04:51', 1, 'SELESAI', 1),
(6, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '004/KKKB/KODE-DESA/VII/2025', '12345', '', '111222', '111222', '111222', '111222', 'MERAH', '111222', '111222', '111222', '111222', '111222', '111222', 'PENGURUSAN', '2025-06-08 20:46:52', 2, 'SELESAI', 1),
(7, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '005/KKKB/KODE-DESA/VII/2025', '12345', '', '122222', '122222', '122222', '122222', 'MERAH', '122222', '122222', '111', '122222', '122222', '122222', 'PENDAFTARAN', '2025-06-08 20:59:46', 1, 'SELESAI', 1),
(8, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '006/KKKB/KODE-DESA/VII/2025', '12345', '', '1222', '1222', '1212', '1221', 'merah', '111222', '111222', '111222', '111', 'banyus', '1111', 'PENDAFTARAN', '2025-06-08 21:02:49', 1, 'SELESAI', 1),
(9, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '007/KKKB/KODE-DESA/VII/2025', '12345', '', '11', '111222', '11', '1221', 'merah', '111222', '111222', '111222', '111222', '111222', '111222', 'SSS', '2025-06-08 21:59:33', 1, 'SELESAI', 1),
(10, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '0008/KKKB/KODE-DESA/VII/2025', '12345', '', 'wqqw', '111222', 'wqqw', '1221', 'merah', '111222', '111222', '111222', '111', '111222', 'WWWW', 'MELAMAR KERJA', '2025-06-10 12:41:37', 1, 'SELESAI', 1),
(11, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '09/KKKB/KODE-DESA/VII/2025', '12345', '', '11', '111222', '11', '1221', 'W', '111222', '111222', '111', '111', '111222', '11DDD', 'MELAMAR KERJA', '2025-06-10 19:56:29', 2, 'SELESAI', 1),
(12, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '10/KKKB/KODE-DESA/VII/2025', '12345', '', '11', '111222', '11', '1221', 'merah', '122222', '111222', '111222', '111', '122222', 'WWWW', 'MELAMAR KERJA', '2025-06-11 06:43:56', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_pengantar`
--

CREATE TABLE `surat_keterangan_pengantar` (
  `id_skp` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `berlaku` varchar(20) NOT NULL,
  `golongan_darah` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_pengantar`
--

INSERT INTO `surat_keterangan_pengantar` (`id_skp`, `jenis_surat`, `no_surat`, `nik`, `keperluan`, `berlaku`, `golongan_darah`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(53, 'Surat Keterangan Pengantar', '99', '3517112233440001', 'MELAMAR KERJA', '', 'B', '2025-06-14 22:48:39', 2, 'SELESAI', 1),
(54, 'Surat Keterangan Pengantar', '100', '12345', 'MELAMAR KERJA', '', 'B', '2025-06-14 23:10:21', 1, 'SELESAI', 1),
(56, 'Surat Keterangan Pengantar', '101', '12345', 'MELAMAR KERJA', '7 Hari', 'B', '2025-06-14 23:25:39', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_penghasilan_orang_tua`
--

CREATE TABLE `surat_keterangan_penghasilan_orang_tua` (
  `id_skpot` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `nomor_induk_siswa` varchar(30) NOT NULL,
  `jurusan_fakultas` varchar(30) NOT NULL,
  `sekolah_perguruan_tinggi` varchar(30) NOT NULL,
  `kelas_semester` varchar(30) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `tgl_lahir2` varchar(50) NOT NULL,
  `nik2` varchar(30) NOT NULL,
  `jenis_kelamin2` varchar(200) NOT NULL,
  `agama2` varchar(50) NOT NULL,
  `pekerjaan2` varchar(50) NOT NULL,
  `alamat2` varchar(50) NOT NULL,
  `penghasilan_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tgl_lahir3` varchar(50) NOT NULL,
  `nik3` varchar(30) NOT NULL,
  `jenis_kelamin3` varchar(200) NOT NULL,
  `agama3` varchar(50) NOT NULL,
  `pekerjaan3` varchar(50) NOT NULL,
  `alamat3` varchar(50) NOT NULL,
  `penghasilan_ibu` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_penghasilan_orang_tua`
--

INSERT INTO `surat_keterangan_penghasilan_orang_tua` (`id_skpot`, `jenis_surat`, `no_surat`, `nik`, `nomor_induk_siswa`, `jurusan_fakultas`, `sekolah_perguruan_tinggi`, `kelas_semester`, `nama_ayah`, `tgl_lahir2`, `nik2`, `jenis_kelamin2`, `agama2`, `pekerjaan2`, `alamat2`, `penghasilan_ayah`, `nama_ibu`, `tgl_lahir3`, `nik3`, `jenis_kelamin3`, `agama3`, `pekerjaan3`, `alamat3`, `penghasilan_ibu`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(24, 'Surat Keterangan Penghasilan Orang Tua', '005/KKKB/KODE-DESA/VII/2025', '12345', 'dfdf', 'dfd', 'dffd', 'df', 'dffd', 'dfdf', 'dfd', 'LAKI-LAKI', 'fdfd', 'fddf', 'dfdf', 'Rp. 90.000,-', 'sdsd', 'sdds', 'sdsd', 'PEREMPUAN', 'sdds', '23', 'sdsad', 'Rp. 9.365,-', '2025-06-17 11:46:42', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_perhiasan`
--

CREATE TABLE `surat_keterangan_perhiasan` (
  `id_skp` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `jenis_perhiasan` varchar(20) NOT NULL,
  `nama_perhiasan` varchar(50) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `toko_perhiasan` varchar(50) NOT NULL,
  `lokasi_toko_perhiasan` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_perhiasan`
--

INSERT INTO `surat_keterangan_perhiasan` (`id_skp`, `jenis_surat`, `no_surat`, `nik`, `jenis_perhiasan`, `nama_perhiasan`, `berat`, `toko_perhiasan`, `lokasi_toko_perhiasan`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(5, 'Surat Keterangan Perhiasan', '51', '3517112233440001', 'Emas', 'cincin', '3', 'sumber emas', 'pasar legi', 'penjualan perhiasan', '2019-12-14 04:05:23', 1, 'SELESAI', 1),
(6, 'Surat Keterangan Perhiasan', '001/SKP/KODE-DESA/VII/2025', '3517112233440001', 'Emas', 'cincin', '3', 'sumber emas', 'pasar legi', 'penjualan perhiasan', '2019-12-14 04:05:35', 1, 'SELESAI', 1),
(7, 'Surat Keterangan Perhiasan', '002/SKP/KODE-DESA/VII/2025', '12345', 'Emas', 'MANTAP', '11', 'TOKO KARISA', '2255', 'PAMER', '2025-06-08 22:00:32', 1, 'SELESAI', 1),
(8, 'Surat Keterangan Perhiasan', '003/SKP/KODE-DESA/VII/2025', '12345', 'Emas', 'MANTAP', '11', 'TOKO KARISA', '2255', 'MELAMAR KERJA', '2025-06-09 09:26:41', 1, 'SELESAI', 1),
(9, 'Surat Keterangan Perhiasan', '0004/SKP/KODE-DESA/VII/2025', '12345', 'Emas', 'MANTAP', '11', 'TOKO KARISA', '2255', 'MELAMAR KERJA', '2025-06-10 12:41:55', 1, 'SELESAI', 1),
(10, 'Surat Keterangan Perhiasan', '05/SKP/KODE-DESA/VII/2025', '12345', 'Emas', 'MANTAP', '11', 'TOKO KARISA', '2255', 'MELAMAR KERJA', '2025-06-10 19:56:45', 2, 'SELESAI', 1),
(11, 'Surat Keterangan Perhiasan', '06/SKP/KODE-DESA/VII/2025', '12345', 'Emas', 'MANTAP', '11', 'TOKO KARISA', '2255', 'PENDAFTARAN', '2025-06-11 06:45:22', 1, 'SELESAI', 1),
(12, 'Surat Keterangan Perhiasan', '07/SKP/KODE-DESA/VII/2025', '3517112233440001', 'Emas', 'MANTAP', '11', 'TOKO KARISA', '2255', 'MELAMAR KERJA', '2025-06-11 07:08:02', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_tidak_mampu`
--

CREATE TABLE `surat_keterangan_tidak_mampu` (
  `id_sktm` int(11) NOT NULL,
  `jenis_surat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_surat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pekerjaan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keperluan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_tidak_mampu`
--

INSERT INTO `surat_keterangan_tidak_mampu` (`id_sktm`, `jenis_surat`, `no_surat`, `nik`, `alamat`, `pekerjaan`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(8, 'Surat Keterangan Tidak Mampu', '001/SKU/KODE-DESA/VII/2025', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', 'PENDAFTARAN', '2025-06-09 11:14:06', 1, 'SELESAI', 1),
(9, 'Surat Keterangan Tidak Mampu', '002/SKU/KODE-DESA/VII/2025', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', 'PENDAFTARAN', '2025-06-09 11:18:19', 1, 'SELESAI', 1),
(10, 'Surat Keterangan Tidak Mampu', '003/SKU/KODE-DESA/VII/2025', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', 'MELAMAR KERJA', '2025-06-09 11:21:51', 2, 'SELESAI', 1),
(11, 'Surat Keterangan Tidak Mampu', '12', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', 'PENDAFTARAN', '2025-06-09 11:26:23', 2, 'SELESAI', 1),
(12, 'Surat Keterangan Tidak Mampu', '001/SKTM/KODE-DESA/VI/2025', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', 'MELAMAR KERJA', '2025-06-09 11:28:56', 1, 'SELESAI', 1),
(13, 'Surat Keterangan Tidak Mampu', '002/SKTM/KODE-DESA/VI/2025', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', 'MELAMAR KERJA', '2025-06-09 11:29:40', 1, 'SELESAI', 1),
(14, 'Surat Keterangan Tidak Mampu', '003/SKTM/KODE-DESA/VI/2025', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', 'PENDAFTARAN', '2025-06-09 12:30:28', 1, 'SELESAI', 1),
(15, 'Surat Keterangan Tidak Mampu', '004/SKTM/KODE-DESA/VI/2025', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', 'MELAMAR KERJA', '2025-06-09 15:28:17', 1, 'SELESAI', 1),
(16, 'Surat Keterangan Tidak Mampu', '0005/SKTM/KODE-DESA/VI/2025', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', 'MELAMAR KERJA', '2025-06-10 12:42:33', 1, 'SELESAI', 1),
(17, 'Surat Keterangan Tidak Mampu', '06/SKTM/KODE-DESA/VI/2025', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', '-', '2025-06-10 19:57:25', 2, 'SELESAI', 1),
(18, 'Surat Keterangan Tidak Mampu', '07/SKTM/KODE-DESA/VI/2025', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', 'MELAMAR KERJA', '2025-06-11 07:47:57', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_usaha`
--

CREATE TABLE `surat_keterangan_usaha` (
  `id_sku` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `usaha` varchar(30) DEFAULT NULL,
  `alamat_usaha` varchar(200) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_usaha`
--

INSERT INTO `surat_keterangan_usaha` (`id_sku`, `jenis_surat`, `no_surat`, `nik`, `usaha`, `alamat_usaha`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(6, 'Surat Keterangan Usaha', '62', '3517112233440001', 'Toko Bangunan', 'Jl. KH. Hasyim Asy\'ari No. 15, RT001/RW002, Dusun Menturus, Desa Menturus, Kecamatan Kudu, Jombang', 'Kelengkapan Persyaratan Pengajuan Modal Usaha', '2019-12-14 04:06:00', 2, 'SELESAI', 1),
(7, 'Surat Keterangan Usaha', '12', '3517112233440001', 'Toko Bangunan', 'Jl. KH. Hasyim Asy\'ari No. 15, RT001/RW002, Dusun Menturus, Desa Menturus, Kecamatan Kudu, Jombang', 'Kelengkapan Persyaratan Pengajuan Modal Usaha', '2019-12-14 04:06:09', 1, 'SELESAI', 1),
(8, 'Surat Keterangan Usaha', '001/SKU/KODE-DESA/VII/2025', '12345', 'makan', 'BONTOSUNGGU', 'PENDAFTARAN', '2025-06-08 22:03:54', 1, 'SELESAI', 1),
(9, 'Surat Keterangan Usaha', '002/SKU/KODE-DESA/VII/2025', '12345', 'makan', 'BONTOSUNGGU', 'MELAMAR KERJA', '2025-06-08 22:06:21', 1, 'SELESAI', 1),
(10, 'Surat Keterangan Usaha', '003/SKU/KODE-DESA/VII/2025', '12345', 'makan', 'BONTOSUNGGU', 'MELAMAR KERJA', '2025-06-09 09:48:35', 1, 'SELESAI', 1),
(11, 'Surat Keterangan Usaha', '004/SKU/KODE-DESA/VII/2025', '12345', 'makan', 'BONTOSUNGGU', 'IJAZAH', '2025-06-09 09:49:45', 1, 'SELESAI', 1),
(12, 'Surat Keterangan Usaha', '005/SKU/KODE-DESA/VII/2025', '12345', 'TOKO BARANG CAMPURAN', 'JL. KUMALA BALANG BERU', 'MENGAJUKAN KREDIT DI BANK', '2025-06-09 16:56:41', 1, 'SELESAI', 1),
(13, 'Surat Keterangan Usaha', '0006/SKU/KODE-DESA/VII/2025', '12345', 'makan', 'JL. KUMALA BALANG BERU', 'PENDAFTARAN', '2025-06-10 12:42:03', 1, 'SELESAI', 1),
(14, 'Surat Keterangan Usaha', '07/SKU/KODE-DESA/VII/2025', '12345', 'makan', 'JL. KUMALA BALANG BERU', 'MELAMAR KERJA', '2025-06-10 19:56:54', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_lapor_hajatan`
--

CREATE TABLE `surat_lapor_hajatan` (
  `id_slh` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `bukti_ktp` varchar(30) DEFAULT NULL,
  `bukti_kk` varchar(30) DEFAULT NULL,
  `jenis_hajat` varchar(30) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jenis_hiburan` varchar(50) NOT NULL,
  `pemilik` varchar(30) NOT NULL,
  `alamat_pemilik` varchar(200) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_lapor_hajatan`
--

INSERT INTO `surat_lapor_hajatan` (`id_slh`, `jenis_surat`, `no_surat`, `nik`, `bukti_ktp`, `bukti_kk`, `jenis_hajat`, `hari`, `tanggal`, `jenis_hiburan`, `pemilik`, `alamat_pemilik`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(4, 'Surat Lapor Hajatan', '71', '3517112233440001', '3517000000000001', '', 'Pernikahan', 'Minggu', '2019-12-15 00:00:00', 'Dangdutan', 'Suwono', 'jl. soto no. 13, rt002/rw003, dusun menturus, desa menturus, kecamatan kudu, kabupaten jombang', '2019-12-14 04:06:40', 1, 'SELESAI', 1),
(5, 'Surat Lapor Hajatan', '12', '3517112233440001', '3517000000000001', '', 'Pernikahan', 'Minggu', '2019-12-15 00:00:00', 'Dangdutan', 'Suwono', 'jl. soto no. 13, rt002/rw003, dusun menturus, desa menturus, kecamatan kudu, kabupaten jombang', '2019-12-14 04:06:57', 2, 'SELESAI', 1),
(6, 'Surat Lapor Hajatan', '001/SLH/KODE-DESA/VII/2025', '12345', '255447', '1222222', 'Pernikahan', 'Selasa', '1992-02-02 00:00:00', 'WWW', 'WWWW', 'WWWW', '2025-06-08 22:09:00', 1, 'SELESAI', 1),
(7, 'Surat Lapor Hajatan', '002/SLH/KODE-DESA/VII/2025', '12345', '255447', '111', 'Pernikahan', 'Sabtu', '1999-06-25 00:00:00', 'WWW', 'WWWW', 'WWWW', '2025-06-08 22:11:27', 2, 'SELESAI', 1),
(8, 'Surat Lapor Hajatan', '003/SLH/KODE-DESA/VII/2025', '12345', '255447', '1111', 'Khitanan', 'Rabu', '2026-02-06 00:00:00', 'WQWQW', '111', '11DDD', '2025-06-08 22:13:32', 1, 'SELESAI', 1),
(9, 'Surat Lapor Hajatan', '0004/SLH/KODE-DESA/VII/2025', '12345', '255447', '1222222', 'Pernikahan', 'Senin', '1990-06-02 00:00:00', 'WWW', 'WWWW', 'WWWW', '2025-06-10 12:42:20', 1, 'SELESAI', 1),
(10, 'Surat Lapor Hajatan', '05/SLH/KODE-DESA/VII/2025', '12345', '255447', '1222222', 'Pernikahan', 'Selasa', '2025-06-11 00:00:00', 'WWW', 'WWWW', 'WWWW', '2025-06-10 19:57:09', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengantar_skck`
--

CREATE TABLE `surat_pengantar_skck` (
  `id_sps` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `bukti_ktp` varchar(30) DEFAULT NULL,
  `bukti_kk` varchar(30) DEFAULT NULL,
  `keperluan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `masa_berlaku` varchar(20) DEFAULT NULL,
  `tanggal_surat` datetime DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_pengantar_skck`
--

INSERT INTO `surat_pengantar_skck` (`id_sps`, `jenis_surat`, `no_surat`, `nik`, `bukti_ktp`, `bukti_kk`, `keperluan`, `keterangan`, `masa_berlaku`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(4, 'Surat Pengantar SKCK', '82', '3517112233440001', '3517000000000001', '', 'Permohonan SKCK', 'Persyaratan Melamar Pekerjaan', NULL, '2019-12-14 04:07:20', 2, 'SELESAI', 1),
(5, 'Surat Pengantar SKCK', '111', '3517112233440001', '3517000000000001', '', 'Permohonan SKCK', 'Persyaratan Melamar Pekerjaan', '7 Hari', '2019-12-14 04:07:28', 2, 'SELESAI', 1),
(6, 'Surat Pengantar SKCK', '001/SPS/KODE-DESA/VII/2025', '12345', '255447', '1222222', 'Permohonan SKCK', 'MELAMAR KERJA', '30 Hari', '2025-06-08 22:14:18', 1, 'SELESAI', 1),
(7, 'Surat Pengantar SKCK', '002/SPS/KODE-DESA/VII/2025', '12345', '255447', '111', 'Permohonan SKCK', 'AAA', '30 Hari', '2025-06-08 22:16:26', 1, 'SELESAI', 1),
(8, 'Surat Pengantar SKCK', '003/SPS/KODE-DESA/VII/2025', '12345', '122121', '21212121', 'Permohonan SKCK', '2122121', '30 Hari', '2025-06-08 22:17:44', 1, 'SELESAI', 1),
(9, 'Surat Pengantar SKCK', '004/SPS/KODE-DESA/VII/2025', '12345', '255447', '1222222', 'Permohonan SKCK', '2122121', '30 Hari', '2025-06-08 23:01:12', 1, 'SELESAI', 1),
(10, 'Surat Pengantar SKCK', '005/SPS/KODE-DESA/VII/2025', '12345', '255447', '1222222', 'Permohonan SKCK', 'Syarat Melamar Kerja', '30 Hari', '2025-06-09 17:21:45', 1, 'SELESAI', 1),
(11, 'Surat Pengantar SKCK', '0006/SPS/KODE-DESA/VII/2025', '12345', '255447', '1222222', 'Permohonan SKCK', '2122121', '30 Hari', '2025-06-10 12:42:28', 1, 'SELESAI', 1),
(12, 'Surat Pengantar SKCK', '07/SPS/KODE-DESA/VII/2025', '12345', '255447', '1222222', 'Permohonan SKCK', '2122121', '30 Hari', '2025-06-10 19:57:19', 2, 'SELESAI', 1),
(13, 'Surat Pengantar SKCK', '08/SPS/KODE-DESA/VII/2025', '12345', '255447', '1222222', 'Permohonan SKCK', 'AAA', '30 Hari', '2025-06-11 07:44:52', 2, 'SELESAI', 1),
(14, 'Surat Pengantar SKCK', NULL, '12345', '255447', '1222222', 'Permohonan SKCK', '2122121', NULL, '2025-06-14 23:28:20', NULL, 'PENDING', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indexes for table `formulir_pengantar_nikah`
--
ALTER TABLE `formulir_pengantar_nikah`
  ADD PRIMARY KEY (`id_fpn`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `formulir_permohonan_kehendak_nikah`
--
ALTER TABLE `formulir_permohonan_kehendak_nikah`
  ADD PRIMARY KEY (`id_fpkn`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `formulir_persetujuan_calon_pengantin`
--
ALTER TABLE `formulir_persetujuan_calon_pengantin`
  ADD PRIMARY KEY (`id_fpcp`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `formulir_persetujuan_calon_pengantin_istri`
--
ALTER TABLE `formulir_persetujuan_calon_pengantin_istri`
  ADD PRIMARY KEY (`id_fpcp2`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `formulir_surat_izin_orang_tua`
--
ALTER TABLE `formulir_surat_izin_orang_tua`
  ADD PRIMARY KEY (`id_fsiot`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pejabat_desa`
--
ALTER TABLE `pejabat_desa`
  ADD PRIMARY KEY (`id_pejabat_desa`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `idx_id_penduduk` (`id_penduduk`);

--
-- Indexes for table `profil_desa`
--
ALTER TABLE `profil_desa`
  ADD PRIMARY KEY (`id_profil_desa`);

--
-- Indexes for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- Indexes for table `surat_keterangan_beda_identitas`
--
ALTER TABLE `surat_keterangan_beda_identitas`
  ADD PRIMARY KEY (`id_skbi`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `surat_keterangan_beda_identitas_kis`
--
ALTER TABLE `surat_keterangan_beda_identitas_kis`
  ADD PRIMARY KEY (`id_skbis`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `surat_keterangan_berkelakuan_baik`
--
ALTER TABLE `surat_keterangan_berkelakuan_baik`
  ADD PRIMARY KEY (`id_skbb`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- Indexes for table `surat_keterangan_domisili`
--
ALTER TABLE `surat_keterangan_domisili`
  ADD PRIMARY KEY (`id_skd`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- Indexes for table `surat_keterangan_domisili_usaha`
--
ALTER TABLE `surat_keterangan_domisili_usaha`
  ADD PRIMARY KEY (`id_skdu`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `surat_keterangan_kematian`
--
ALTER TABLE `surat_keterangan_kematian`
  ADD PRIMARY KEY (`id_skk`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--
ALTER TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor`
  ADD PRIMARY KEY (`id_skkkb`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- Indexes for table `surat_keterangan_pengantar`
--
ALTER TABLE `surat_keterangan_pengantar`
  ADD PRIMARY KEY (`id_skp`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `surat_keterangan_penghasilan_orang_tua`
--
ALTER TABLE `surat_keterangan_penghasilan_orang_tua`
  ADD PRIMARY KEY (`id_skpot`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `surat_keterangan_perhiasan`
--
ALTER TABLE `surat_keterangan_perhiasan`
  ADD PRIMARY KEY (`id_skp`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- Indexes for table `surat_keterangan_tidak_mampu`
--
ALTER TABLE `surat_keterangan_tidak_mampu`
  ADD PRIMARY KEY (`id_sktm`);

--
-- Indexes for table `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  ADD PRIMARY KEY (`id_sku`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- Indexes for table `surat_lapor_hajatan`
--
ALTER TABLE `surat_lapor_hajatan`
  ADD PRIMARY KEY (`id_slh`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `surat_pengantar_skck`
--
ALTER TABLE `surat_pengantar_skck`
  ADD PRIMARY KEY (`id_sps`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formulir_pengantar_nikah`
--
ALTER TABLE `formulir_pengantar_nikah`
  MODIFY `id_fpn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `formulir_permohonan_kehendak_nikah`
--
ALTER TABLE `formulir_permohonan_kehendak_nikah`
  MODIFY `id_fpkn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `formulir_persetujuan_calon_pengantin`
--
ALTER TABLE `formulir_persetujuan_calon_pengantin`
  MODIFY `id_fpcp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `formulir_persetujuan_calon_pengantin_istri`
--
ALTER TABLE `formulir_persetujuan_calon_pengantin_istri`
  MODIFY `id_fpcp2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `formulir_surat_izin_orang_tua`
--
ALTER TABLE `formulir_surat_izin_orang_tua`
  MODIFY `id_fsiot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pejabat_desa`
--
ALTER TABLE `pejabat_desa`
  MODIFY `id_pejabat_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1805;

--
-- AUTO_INCREMENT for table `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id_profil_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `surat_keterangan_beda_identitas`
--
ALTER TABLE `surat_keterangan_beda_identitas`
  MODIFY `id_skbi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `surat_keterangan_beda_identitas_kis`
--
ALTER TABLE `surat_keterangan_beda_identitas_kis`
  MODIFY `id_skbis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `surat_keterangan_berkelakuan_baik`
--
ALTER TABLE `surat_keterangan_berkelakuan_baik`
  MODIFY `id_skbb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `surat_keterangan_domisili`
--
ALTER TABLE `surat_keterangan_domisili`
  MODIFY `id_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `surat_keterangan_domisili_usaha`
--
ALTER TABLE `surat_keterangan_domisili_usaha`
  MODIFY `id_skdu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `surat_keterangan_kematian`
--
ALTER TABLE `surat_keterangan_kematian`
  MODIFY `id_skk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--
ALTER TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor`
  MODIFY `id_skkkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `surat_keterangan_pengantar`
--
ALTER TABLE `surat_keterangan_pengantar`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `surat_keterangan_penghasilan_orang_tua`
--
ALTER TABLE `surat_keterangan_penghasilan_orang_tua`
  MODIFY `id_skpot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `surat_keterangan_perhiasan`
--
ALTER TABLE `surat_keterangan_perhiasan`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `surat_keterangan_tidak_mampu`
--
ALTER TABLE `surat_keterangan_tidak_mampu`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  MODIFY `id_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `surat_lapor_hajatan`
--
ALTER TABLE `surat_lapor_hajatan`
  MODIFY `id_slh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surat_pengantar_skck`
--
ALTER TABLE `surat_pengantar_skck`
  MODIFY `id_sps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD CONSTRAINT `fk_id_pejabat_desa_sk` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profil_desa_sk` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_sk` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_keterangan_berkelakuan_baik`
--
ALTER TABLE `surat_keterangan_berkelakuan_baik`
  ADD CONSTRAINT `fi_id_profil_desa_skbb` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pejabat_desa_skbb` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_skbb` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_keterangan_domisili`
--
ALTER TABLE `surat_keterangan_domisili`
  ADD CONSTRAINT `fi_id_profil_desa_skd` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pejabat_desa_skd` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_skd` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--
ALTER TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor`
  ADD CONSTRAINT `fk_id_pejabat_desa_skkkb` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profil_desa_skkkb` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_skkkb` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_keterangan_perhiasan`
--
ALTER TABLE `surat_keterangan_perhiasan`
  ADD CONSTRAINT `fk_id_pejabat_desa_skp` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profil_desa_skp` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_skp` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  ADD CONSTRAINT `fi_id_profil_desa_sku` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pejabat_desa_sku` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_sku` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_lapor_hajatan`
--
ALTER TABLE `surat_lapor_hajatan`
  ADD CONSTRAINT `fk_id_pejabat_desa_slh` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profil_desa_slh` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_slh` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_pengantar_skck`
--
ALTER TABLE `surat_pengantar_skck`
  ADD CONSTRAINT `fk_id_pejabat_desa_sps` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profil_desa_sps` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_sps` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
