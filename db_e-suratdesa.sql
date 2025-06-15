-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 02:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
(22, 'Formulir Pengantar Nikah', '77888888', '12345', 'a. Laki-laki : Jejaka, Duda, a', 'b. Perempuan : Perawan, Janda', 'DAENG PATTA', 'sadas', '122112', 'asa', 'sa', 'as', 'as', 'as', 'as', 'as', 'as', 'as', 'as', 'as', '2025-06-13 11:57:15', 2, 'SELESAI', 1);

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
(36, 'Formulir Persetujuan Calon Pengantin', '12922592', '12345', 'Nama Bin', 'NAMA ISTRI', 'BIN ISTRI', 'NIK  ISTRI', 'TGL  ISTRI', 'wni  ISTRI', 'AGAMAR  ISTRI', 'PEKERJAAN  ISTRI', 'ALAMAT  ISTRI', '2025-06-13 10:19:53', 2, 'SELESAI', 1),
(37, 'Formulir Persetujuan Calon Pengantin', NULL, '12345', 'sd', 'sd', 'sd', 'sda', 'sd', 'sd', 'sddsds', 'dssd', 'dsdsa', '2025-06-13 11:58:19', NULL, 'PENDING', 1);

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
(41, 'Formulir Persetujuan Calon Pengantin Istri', '99857', '12345', 'Nama Bin', 'nama suami', 'bin suami', 'nik suami', 'tep suami', 'kew suami', 'aga suami', 'pek suami', 'ala', '2025-06-13 11:47:37', 2, 'SELESAI', 1),
(42, 'Formulir Persetujuan Calon Pengantin Istri', NULL, '12345', 'sda', 'sd', 'dsdssdds', 'sdaaa', 'sddsds', 'sddsds', 'dssd', 'dss', 'dsdsd', '2025-06-13 11:58:31', NULL, 'PENDING', 1);

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
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pejabat_desa`
--

INSERT INTO `pejabat_desa` (`id_pejabat_desa`, `nama_pejabat_desa`, `jabatan`, `nip`) VALUES
(1, 'H. Moh. Saifuddin', 'Kepala Desa22', 'NIP : 123445577788811'),
(2, '../../../../assets/img/barcode.png', 'Kepala Desa', '');

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
(1341, '0', 'atta HALILINTAR', 'JAKARTA', '1989-06-01', '', '', '', '', '', '', '', '', 'Kabupaten ', '', '', '', '', '', '', 'asdsaa', '', 'DAENG PATTA', 'RINA DG JPA'),
(1381, '12238899', 'BARU BARU', 'LLLL', '2000-06-02', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1410, '122388991', 'WWWWWW', 'LLLL', '1988-01-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, '12345', 'dg bali', 'JENEPONTO', '1988-06-25', 'Laki-laki', 'ISLAM', 'JENEPONTO', 'Ciokong', '001', '001', 'BULULOE', 'ALLU TAROWANG', 'Kabupaten JENEPONTO', '73225411111', 'S1/SEDERAJAT', 'S1/SEDERAJAT', 'D3/SEDERAJAT', 'PENGUSAHA', 'Menikah', 'Ayah', 'WNI', 'DAENG PATTA', 'RINA DG JPA'),
(1340, '22233', 'SUPARMAN baru', 'JENEPONTO baru baru', '2025-02-11', 'laki perempuan baru', 'islam baru', 'JENEPONTO baru', 'wwasas baru', '11 22', '22 33', 'BULULOE baru', 'adaweqwqaQ baru', 'Kabupaten deeewewee baru', '1222221200', '212121200', 'S22 baru', 's33 baru', 'waddedewdwe baru', 'ccdcwewdwed baru', 'asdsaa baru', 'daada', 'dadada baru', 'dadadasdasdsa baru'),
(92, '3517112233440001', 'Adi Fahrian Hidayat', 'jombang', '1997-12-14', 'Laki-laki', 'Islam', 'jl. KH. hasyim asy\'ari no. 15', 'Ciokong', '001', '002', 'menturus', 'kudu', 'jombang', '3517000000000002', 'SLTA/SEDERAJAT', 'SLTA/SEDERAJAT', 'S1/SEDERAJAT', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Imam Haryono', 'Nasihaha'),
(1276, '552267', 'BACONDON', 'KARISA', '1990-02-23', '', 'ISLAM', 'BONTORAPPA', '', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995523', '', '', '', 'PENGUSAHA', '', '', '', 'BADULLAH', 'PUTRI'),
(1277, '552268', 'BACONDON', 'KARISA', '1990-02-24', '', 'ISLAM', 'BONTORAPPA', '', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995524', '', '', '', 'PENGUSAHA', '', '', '', 'BADULLAH', 'PUTRI'),
(1278, '552269', 'BACONDON', 'KARISA', '1990-02-25', '', 'ISLAM', 'BONTORAPPA', '', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995525', '', '', '', 'PENGUSAHA', '', '', '', 'BADULLAH', 'PUTRI'),
(1279, '552270', 'BACONDON', 'KARISA', '1990-02-26', '', 'ISLAM', 'BONTORAPPA', '', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995526', '', '', '', 'PENGUSAHA', '', '', '', 'BADULLAH', 'PUTRI'),
(1280, '552271', 'BACONDON', 'KARISA', '1990-02-27', 'TIDAK TERDETEKSI', 'ISLAM', 'BONTORAPPA', 'RRR', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995527', '', '', '', 'PENGUSAHA', '', '', '', 'BADULLAH', 'PUTRI'),
(1281, '552272', 'BACONDON', 'KARISA', '1990-02-28', '', 'ISLAM', 'BONTORAPPA', '', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995528', '', '', '', 'PENGUSAHA', '', '', '', 'BADULLAH', 'PUTRI'),
(1282, '552273', 'BACONDON', 'KARISA', '1990-03-01', '', 'ISLAM', 'BONTORAPPA', 'BALANG BERU', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995529', '', '', '', 'PENGUSAHA', '', '', '', 'BADULLAH', 'PUTRI'),
(1283, '552274', 'BACONDON', 'KARISA', '1990-03-02', 'LAKILAKI', 'ISLAM', 'BONTORAPPA', 'RAPPOJAWA', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995530', '', '', '', 'PENGUSAHA', '', '', '', 'BADULLAH', 'PUTRI'),
(1284, '552275', 'BACONDON', 'KARISA', '1990-03-03', 'LAKI', 'ISLAM', 'BONTORAPPA', '', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995531', '', '', '', 'PENGUSAHA', '', '', '', 'BADULLAH', 'PUTRI'),
(1285, '552276', 'BACONDON', 'KARISA', '1990-03-04', 'LAKI-LAKI', 'ISLAM', 'BONTORAPPA', '', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995532', '', '', '', 'PENGUSAHA', '', '', '', 'BADULLAH', 'PUTRI'),
(1286, '552277', 'BACONDON', 'KARISA', '1990-03-05', 'PEREMPUAN', 'ISLAM', 'BONTORAPPA', 'BALANG BERU', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995533', 'S1', 'SMU', 'S1', 'PENGUSAHA', 'KAWIN', 'AYAH', 'WNI', 'BADULLAH', 'PUTRI'),
(1287, '552278', 'BACONDON', 'KARISA', '2021-10-31', 'WARIA', 'ISLAM', 'BONTORAPPA', 'RAPPOJAWA', '2', '3', 'MATENE', 'BONTORAMBA', 'JENEPONTO', '995534', '', '', '', 'PENGUSAHA', '', '', '', 'BADULLAH', 'PUTRI');

-- --------------------------------------------------------

--
-- Table structure for table `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id_profil_desa` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `ttd_digital` varchar(350) DEFAULT NULL,
  `gambar_kop` varchar(350) DEFAULT NULL,
  `logo_desa` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profil_desa`
--

INSERT INTO `profil_desa` (`id_profil_desa`, `nama_desa`, `alamat`, `no_telpon`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `ttd_digital`, `gambar_kop`, `logo_desa`) VALUES
(1, 'Allu Tarowang', 'Jl.Raya Cijulang No. 00', '085255430300', 'Tarowang', 'Kabupaten Jeneponto', 'Sulawesi Selatan', '9999', 'barcode.png', '72a6cd37-8809-4156-8fd2-41cbefc931a6.png', 'Logo-Pangandaran.png');

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

--
-- Dumping data for table `surat_keterangan`
--

INSERT INTO `surat_keterangan` (`id_sk`, `jenis_surat`, `no_surat`, `nik`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(139, 'Surat Keterangan', '0001/SK/KODE-DESA/VII/2025', '12345', 'KTP', '2025-06-08 21:26:56', 2, 'SELESAI', 1),
(140, 'Surat Keterangan', '0002/SK/KODE-DESA/VII/2025', '12345', 'SKCK', '2025-06-08 21:29:41', 1, 'SELESAI', 1),
(141, 'Surat Keterangan', '0003/SK/KODE-DESA/VII/2025', '12345', 'joss', '2025-06-08 21:50:00', 1, 'SELESAI', 1),
(142, 'Surat Keterangan', '0004/SK/KODE-DESA/VII/2025', '12345', 'MELAMAR KERJA', '2025-06-09 15:06:49', 1, 'SELESAI', 1),
(143, 'Surat Keterangan', '0005/SK/KODE-DESA/VII/2025', '12345', 'IJAZAH', '2025-06-09 16:17:51', 1, 'SELESAI', 1),
(144, 'Surat Keterangan', '0006/SK/KODE-DESA/VII/2025', '12345', 'MELAMAR KERJA', '2025-06-10 12:38:00', 1, 'SELESAI', 1),
(145, 'Surat Keterangan', '0007/SK/KODE-DESA/VII/2025', '12345', '212122', '2025-06-10 12:41:12', 1, 'SELESAI', 1),
(146, 'Surat Keterangan', '25', '12345', 'PENDAFTARAN', '2025-06-10 18:38:56', 1, 'SELESAI', 1),
(147, 'Surat Keterangan', '0008/ SK/KODE-DESA/VII/2025', '3517112233440001', 'PENDAFTARAN', '2025-06-10 18:39:18', 1, 'SELESAI', 1),
(148, 'Surat Keterangan', '0009/ SK/KODE-DESA/VII/2025', '12345', 'MELAMAR KERJA', '2025-06-10 18:41:49', 1, 'SELESAI', 1),
(149, 'Surat Keterangan', '010/SK/KODE-DESA/VII/2025', '12345', 'MELAMAR KERJA', '2025-06-10 18:42:49', 1, 'SELESAI', 1),
(150, 'Surat Keterangan', '0011/SK/KODE-DESA/VII/2025', '12345', 'PENDAFTARAN', '2025-06-10 18:43:16', 1, 'SELESAI', 1),
(151, 'Surat Keterangan', '99', '12345', 'PENDAFTARAN', '2025-06-10 18:50:01', 1, 'SELESAI', 1),
(152, 'Surat Keterangan', '0100', '12345', 'PENDAFTARAN', '2025-06-10 18:50:20', 1, 'SELESAI', 1),
(153, 'Surat Keterangan', '0101/STM/21', '12345', 'PENDAFTARAN', '2025-06-10 18:57:00', 1, 'SELESAI', 1),
(154, 'Surat Keterangan', '0102/STM/21', '12345', 'MELAMAR KERJA', '2025-06-10 18:57:26', 1, 'SELESAI', 1),
(155, 'Surat Keterangan', '66', '12345', 'MELAMAR KERJA', '2025-06-10 19:06:15', 1, 'SELESAI', 1),
(156, 'Surat Keterangan', '0012/SK/KODE-DESA/VII/2025', '12345', 'IJAZAH', '2025-06-10 19:06:37', 1, 'SELESAI', 1),
(157, 'Surat Keterangan', '0013/SK/KODE-DESA/VII/2025', '12345', 'PENDAFTARAN', '2025-06-10 19:06:53', 1, 'SELESAI', 1),
(158, 'Surat Keterangan', '0014/SK/KODE-DESA/VII/2025', '12345', 'MELAMAR KERJA', '2025-06-10 19:07:21', 1, 'SELESAI', 1),
(159, 'Surat Keterangan', '15/SK/KODE-DESA/VII/2025', '12345', 'PENDAFTARAN', '2025-06-10 19:56:03', 1, 'SELESAI', 1),
(160, 'Surat Keterangan', '16/SK/KODE-DESA/VII/2025', '12345', 'MELAMAR KERJA', '2025-06-11 06:00:48', 2, 'SELESAI', 1),
(161, 'Surat Keterangan', '17/SK/KODE-DESA/VII/2025', '12345', 'MELAMAR KERJA', '2025-06-11 06:06:16', 1, 'SELESAI', 1),
(162, 'Surat Keterangan', '18/SK/KODE-DESA/VII/2025', '12345', 'MELAMAR KERJA', '2025-06-11 06:06:47', 2, 'SELESAI', 1),
(163, 'Surat Keterangan', '19/SK/KODE-DESA/VII/2025', '12345', 'MELAMAR KERJA', '2025-06-11 06:08:12', 1, 'SELESAI', 1),
(164, 'Surat Keterangan', '20/SK/KODE-DESA/VII/2025', '12345', 'MELAMAR KERJA', '2025-06-14 21:50:36', 2, 'SELESAI', 1);

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
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_domisili`
--

INSERT INTO `surat_keterangan_domisili` (`id_skd`, `jenis_surat`, `no_surat`, `nik`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(7, 'Surat Keterangan Domisili', '31', '3517112233440001', '2019-12-14 04:01:28', 1, 'SELESAI', 1),
(8, 'Surat Keterangan Domisili', '002/SKD/KODE-DESA/06', '3517112233440001', '2019-12-14 04:01:32', 2, 'SELESAI', 1),
(9, 'Surat Keterangan Domisili', '003/SKD/KODE-DESA/VII/2025', '12345', '2025-06-08 21:55:10', 1, 'SELESAI', 1),
(10, 'Surat Keterangan Domisili', '004/SKD/KODE-DESA/VII/2025', '12345', '2025-06-08 21:57:23', 1, 'SELESAI', 1),
(11, 'Surat Keterangan Domisili', '005/SKD/KODE-DESA/VII/2025', '12345', '2025-06-08 21:58:19', 2, 'SELESAI', 1),
(12, 'Surat Keterangan Domisili', '006/SKD/KODE-DESA/VII/2025', '12345', '2025-06-09 10:26:42', 1, 'SELESAI', 1),
(13, 'Surat Keterangan Domisili', '007/SKD/KODE-DESA/VII/2025', '12345', '2025-06-09 11:10:59', 1, 'SELESAI', 1),
(14, 'Surat Keterangan Domisili', '008/SKD/KODE-DESA/VII/2025', '12345', '2025-06-09 13:54:23', 1, 'SELESAI', 1),
(15, 'Surat Keterangan Domisili', '009/SKD/KODE-DESA/VII/2025', '12345', '2025-06-09 15:25:28', 1, 'SELESAI', 1),
(16, 'Surat Keterangan Domisili', '010/SKD/KODE-DESA/VII/2025', '12345', '2025-06-10 05:54:24', 1, 'SELESAI', 1),
(17, 'Surat Keterangan Domisili', '011/SKD/KODE-DESA/VII/2025', '12345', '2025-06-10 07:37:27', 1, 'SELESAI', 1),
(18, 'Surat Keterangan Domisili', '0012/SKD/KODE-DESA/VII/2025', '12345', '2025-06-10 12:41:07', 1, 'SELESAI', 1),
(19, 'Surat Keterangan Domisili', '665', '12345', '2025-06-10 19:49:52', 1, 'SELESAI', 1),
(20, 'Surat Keterangan Domisili', '19999', '12345', '2025-06-10 19:50:10', 1, 'SELESAI', 1),
(21, 'Surat Keterangan Domisili', '20000', '12345', '2025-06-10 19:51:10', 1, 'SELESAI', 1),
(22, 'Surat Keterangan Domisili', '96', '12345', '2025-06-10 19:51:51', 1, 'SELESAI', 1),
(23, 'Surat Keterangan Domisili', '97', '12345', '2025-06-10 19:52:10', 1, 'SELESAI', 1),
(24, 'Surat Keterangan Domisili', '98/SKD/SS/VII/2025', '3517112233440001', '2025-06-10 19:53:00', 1, 'SELESAI', 1),
(25, 'Surat Keterangan Domisili', '99/SKD/SS/VII/2025', '12345', '2025-06-10 19:53:27', 2, 'SELESAI', 1),
(26, 'Surat Keterangan Domisili', '100/SKD/SS/VII/2025', '12345', '2025-06-10 19:55:35', 2, 'SELESAI', 1),
(27, 'Surat Keterangan Domisili', '101/SKD/SS/VII/2025', '12345', '2025-06-10 21:52:57', 2, 'SELESAI', 1),
(28, 'Surat Keterangan Domisili', '102/SKD/SS/VII/2025', '12345', '2025-06-10 22:31:21', 1, 'SELESAI', 1),
(29, 'Surat Keterangan Domisili', '103/SKD/SS/VII/2025', '12345', '2025-06-10 22:31:40', 1, 'SELESAI', 1),
(30, 'Surat Keterangan Domisili', '104/SKD/SS/VII/2025', '12345', '2025-06-10 22:32:01', 2, 'SELESAI', 1),
(31, 'Surat Keterangan Domisili', '105/SKD/SS/VII/2025', '12345', '2025-06-10 22:33:23', 1, 'SELESAI', 1),
(32, 'Surat Keterangan Domisili', '106/SKD/SS/VII/2025', '12345', '2025-06-10 22:33:36', 1, 'SELESAI', 1),
(33, 'Surat Keterangan Domisili', '107/SKD/SS/VII/2025', '3517112233440001', '2025-06-10 22:35:17', 1, 'SELESAI', 1),
(34, 'Surat Keterangan Domisili', '108/SKD/SS/VII/2025', '12345', '2025-06-10 22:45:25', 1, 'SELESAI', 1),
(35, 'Surat Keterangan Domisili', '109/SKD/SS/VII/2025', '3517112233440001', '2025-06-10 22:47:55', 1, 'SELESAI', 1),
(36, 'Surat Keterangan Domisili', '110/SKD/SS/VII/2025', '12345', '2025-06-10 22:54:55', 1, 'SELESAI', 1),
(37, 'Surat Keterangan Domisili', '111/SKD/SS/VII/2025', '12345', '2025-06-10 22:59:05', 2, 'SELESAI', 1),
(38, 'Surat Keterangan Domisili', '112/SKD/SS/VII/2025', '12345', '2025-06-11 01:52:14', 1, 'SELESAI', 1),
(39, 'Surat Keterangan Domisili', '113/SKD/SS/VII/2025', '12345', '2025-06-11 01:52:39', 2, 'SELESAI', 1),
(40, 'Surat Keterangan Domisili', '114/SKD/SS/VII/2025', '12345', '2025-06-13 19:43:42', 1, 'SELESAI', 1),
(41, 'Surat Keterangan Domisili', '115/SKD/SS/VII/2025', '12345', '2025-06-14 23:10:36', 1, 'SELESAI', 1),
(42, 'Surat Keterangan Domisili', '116/SKD/SS/VII/2025', '12345', '2025-06-15 14:21:38', 2, 'SELESAI', 1),
(43, 'Surat Keterangan Domisili', NULL, '12345', '2025-06-15 14:21:42', NULL, 'PENDING', 1);

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
(45, 'Surat Keterangan Domisili Usaha', NULL, '12345', 'jenis', 'JL. KUMALA BALANG BERU', '2025-06-14 18:47:07', NULL, 'PENDING', 1);

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
(18, 'Surat Keterangan Tidak Mampu', '07/SKTM/KODE-DESA/VI/2025', '12345', 'JENEPONTO, RT001/RW001, Dusun Ciokong,\r\nDesa BULUL', 'PENGUSAHA', 'MELAMAR KERJA', '2025-06-11 07:47:57', 1, 'SELESAI', 1),
(19, 'Surat Keterangan Tidak Mampu', NULL, '3517112233440001', 'jl. KH. hasyim asy\'ari no. 15, RT001/RW002, Dusun ', 'PELAJAR/MAHASISWA', 'MELAMAR KERJA', '2025-06-14 23:28:31', NULL, 'PENDING', 1);

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
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formulir_pengantar_nikah`
--
ALTER TABLE `formulir_pengantar_nikah`
  MODIFY `id_fpn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1471;

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
-- AUTO_INCREMENT for table `surat_keterangan_berkelakuan_baik`
--
ALTER TABLE `surat_keterangan_berkelakuan_baik`
  MODIFY `id_skbb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `surat_keterangan_domisili`
--
ALTER TABLE `surat_keterangan_domisili`
  MODIFY `id_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `surat_keterangan_domisili_usaha`
--
ALTER TABLE `surat_keterangan_domisili_usaha`
  MODIFY `id_skdu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
