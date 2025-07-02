-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 01:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `nama` varchar(100) DEFAULT NULL,
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

INSERT INTO `arsip_surat` (`id_arsip`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `jalan`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `no_kk`, `pend_kk`, `pend_terakhir`, `pend_ditempuh`, `pekerjaan`, `status_perkawinan`, `status_dlm_keluarga`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`, `waktu_disalin`) VALUES
(84, '5313051201970002', 'Aswar', 'Balampasu', '1997-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 07:18:43'),
(85, '7304080107650006', 'Jufri', 'Arungkeke', '1970-01-01', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 07:26:18'),
(86, '7304080404150003', 'Muh. Rifki Setiawan', 'Bo\'nia', '2015-04-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 07:33:41'),
(87, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 13:35:29'),
(88, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 13:35:33'),
(89, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 13:35:39'),
(90, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 13:35:46'),
(91, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 13:50:42'),
(92, '7304047011770001', 'Sulkepi', 'Togo-Togo', '1996-06-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 14:41:46'),
(93, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 15:12:27'),
(94, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 15:13:12'),
(95, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 15:45:22'),
(96, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 15:46:43'),
(97, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 15:53:46'),
(98, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 16:02:20'),
(99, '7304047011770001', 'Sulkepi', 'Togo-Togo', '1996-06-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 17:28:25'),
(100, '7304047011770001', 'Sulkepi', 'Togo-Togo', '1996-06-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-19 17:28:46'),
(101, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-20 16:54:22'),
(102, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-20 16:56:49'),
(103, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-20 16:59:20'),
(104, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-20 17:01:36'),
(105, '7304087010760003', 'Bulaeng, A.M.a', 'Jeneponto', '1976-10-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 12:10:07'),
(106, '7304085907060001', 'Adelia', 'Jeneponto', '2006-07-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 12:13:44'),
(107, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 12:26:07'),
(108, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 12:26:53'),
(109, '7304087010760003', 'Bulaeng, A.M.a', 'Jeneponto', '1976-10-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 12:27:16'),
(110, '7304087010760003', 'Bulaeng, A.M.a', 'Jeneponto', '1976-10-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 12:38:50'),
(111, '7304081207150002', 'Abrar R. Al muarif', 'jeneponto', '2015-07-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 12:44:11'),
(112, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 12:51:08'),
(113, '7304081403990001', 'Adrian', 'Makassar', '1999-03-14', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 12:52:00'),
(114, '7304081112100001', 'Ahmad Ali Akbar', 'Bo\'nia', '2010-12-11', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:01:12'),
(115, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:09:47'),
(116, '7304080203760001', 'Alexander Agung, S.Sos', 'Jeneponto', '1976-07-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:09:53'),
(117, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:10:51'),
(118, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:11:34'),
(119, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:15:35'),
(120, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:24:17'),
(121, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:24:38'),
(122, '7304081303910003', 'Abdullah, S.pdi', 'Kaluku', '1991-03-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:26:07'),
(123, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:27:27'),
(124, '7304080705020001', 'Aswar', 'Bo\'nia', '2002-05-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:44:10'),
(125, '7304080306830002', 'Akrim Nuhun Musa, S.Pdi', 'Marica', '1983-06-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:45:57'),
(126, '7304081303910003', 'Abdullah, S.pdi', 'Kaluku', '1991-03-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:50:57'),
(127, '7304085907060001', 'Adelia', 'Jeneponto', '2006-07-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:51:16'),
(128, '5313051201970002', 'Aswar', 'Balampasu', '1997-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:54:22'),
(129, '7304082509910001', 'Abd. Rahman', 'Jeneponto', '1991-09-25', 'laki-laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:54:30'),
(130, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:54:38'),
(131, '7304080107740003', 'Abd. Latif', 'Kaluku', '1974-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:54:46'),
(132, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:54:55'),
(133, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:55:07'),
(134, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:55:16'),
(135, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:55:26'),
(136, '7371143103820001', 'Achmad Fauzie', 'Jakarta', '1982-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:55:38'),
(137, '5313051201970002', 'Aswar', 'Balampasu', '1997-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:55:52'),
(138, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:56:02'),
(139, '7371143103820001', 'Achmad Fauzie', 'Jakarta', '1982-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:56:13'),
(140, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:56:23'),
(141, '7304081501060003', 'Adel Amelia', 'Bo\'nia', '2006-01-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:56:37'),
(142, '7304085907060001', 'Adelia', 'Jeneponto', '2006-07-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:56:50'),
(143, '7371143103820001', 'Achmad Fauzie', 'Jakarta', '1982-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:57:00'),
(144, '7304081303910003', 'Abdullah, S.pdi', 'Kaluku', '1991-03-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:57:12'),
(145, '7304085907060001', 'Adelia', 'Jeneponto', '2006-07-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:57:19'),
(146, '7371143103820001', 'Achmad Fauzie', 'Jakarta', '1982-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:57:36'),
(147, '7304081501060003', 'Adel Amelia', 'Bo\'nia', '2006-01-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:57:45'),
(148, '7371143103820001', 'Achmad Fauzie', 'Jakarta', '1982-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:57:55'),
(149, '7304081207150002', 'Abrar R. Al muarif', 'jeneponto', '2015-07-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:58:05'),
(150, '7371143103820001', 'Achmad Fauzie', 'Jakarta', '1982-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:58:17'),
(151, '7371143103820001', 'Achmad Fauzie', 'Jakarta', '1982-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:58:32'),
(152, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:59:00'),
(153, '7304081303910003', 'Abdullah, S.pdi', 'Kaluku', '1991-03-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 13:59:10'),
(154, '7304081501060003', 'Adel Amelia', 'Bo\'nia', '2006-01-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 15:06:14'),
(155, '7304080107740003', 'Abd. Latif', 'Kaluku', '1974-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 15:21:52'),
(156, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 19:15:17'),
(157, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 19:55:31'),
(158, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 20:00:33'),
(159, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'LAKI-LAKI', 'Islam', '', '', '', '', '', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 20:52:52'),
(160, '5313051201970002', 'Aswar', 'Balampasu', '1997-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:13:57'),
(161, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'LAKI-LAKI', 'Islam', '', '', '', '', '', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:14:40'),
(162, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:41:55'),
(163, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:42:05'),
(164, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:42:13'),
(165, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:42:20'),
(166, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:42:29'),
(167, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:42:36'),
(168, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:42:43'),
(169, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:42:51'),
(170, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:42:58'),
(171, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:43:04'),
(172, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:43:11'),
(173, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:43:18'),
(174, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:43:28'),
(175, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:43:35'),
(176, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:43:48'),
(177, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:43:57'),
(178, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:44:05'),
(179, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:44:12'),
(180, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:44:19'),
(181, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:44:27'),
(182, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:44:36'),
(183, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:44:43'),
(184, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:52:22'),
(185, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:53:29'),
(186, '7371143103820001', 'Achmad Fauzie', 'Jakarta', '1982-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:55:22'),
(187, '7304080808090002', 'Aditia', 'Bo\'nia', '2009-08-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:55:30'),
(188, '7304084207700001', 'Basmi', 'Bontorea', '1970-07-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:55:39'),
(189, '7304085907060001', 'Adelia', 'Jeneponto', '2006-07-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 21:58:12'),
(190, '7304080705020001', 'Aswar', 'Bo\'nia', '2002-05-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 22:07:52'),
(191, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 22:09:11'),
(192, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 22:20:52'),
(193, '7304080107740003', 'Abd. Latif', 'Kaluku', '1974-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 22:21:35'),
(194, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 23:05:34'),
(195, '7304082509910001', 'Abd. Rahman', 'Jeneponto', '1991-09-25', 'laki-laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-22 08:36:23'),
(196, '7304087112440003', 'Basse', 'Jeneponto', '1944-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-22 09:02:20'),
(197, '7304082511030004', 'Adi Gunawan', 'Bo\'nia', '2003-11-25', '', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-22 09:03:12'),
(198, '7304081501060003', 'Adel Amelia', 'Bo\'nia', '2006-01-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-22 11:41:05'),
(199, '7304085907060001', 'Adelia', 'Jeneponto', '2006-07-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-22 12:00:45'),
(200, '7304081501060003', 'Adel Amelia', 'Bo\'nia', '2006-01-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-22 12:13:03'),
(201, '7304081303910003', 'Abdullah, S.pdi', 'Kaluku', '1991-03-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-22 12:29:31'),
(202, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-22 22:31:16'),
(203, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 17:26:53'),
(204, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 18:56:33'),
(205, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 18:57:03'),
(206, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 18:58:11'),
(207, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 19:02:06'),
(208, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 19:02:52'),
(209, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 19:03:13'),
(210, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 19:04:16'),
(211, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 19:06:12'),
(212, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 19:06:25'),
(213, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 19:07:28'),
(214, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 19:12:09'),
(215, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 19:12:33'),
(216, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 19:13:11'),
(217, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 19:14:24'),
(218, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 20:00:18'),
(219, '7371143103820001', 'Achmad Fauzie', 'Jakarta', '1982-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 20:08:13'),
(220, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-23 21:06:15'),
(221, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-23 21:07:59'),
(222, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-23 21:24:42'),
(223, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-23 21:42:20'),
(224, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-23 21:43:05'),
(225, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-23 21:45:06'),
(226, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-23 21:47:05'),
(227, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-23 21:47:36'),
(228, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-23 21:53:52'),
(229, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-23 21:56:03'),
(230, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-24 00:17:39'),
(231, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-24 07:20:03'),
(232, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-24 07:23:04'),
(233, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-24 07:51:10'),
(234, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-24 12:31:31'),
(235, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '-', '', '', '', '', '', '2025-06-24 12:34:40'),
(236, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 14:14:38'),
(237, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 14:16:09'),
(238, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 14:16:52'),
(239, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 14:40:06'),
(240, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 14:40:48'),
(241, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 14:46:02'),
(242, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 14:46:26'),
(243, '7304081207150002', 'Abrar R. Al muarif', 'jeneponto', '2015-07-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 15:51:35'),
(244, '7304080306830002', 'Akrim Nuhun Musa, S.Pdi', 'Marica', '1983-06-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 16:21:35'),
(245, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 16:42:27'),
(246, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 17:06:49'),
(247, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 17:22:05'),
(248, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 18:41:34'),
(249, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 18:41:41'),
(250, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 18:50:24'),
(251, '5313051201970002', 'Aswar', 'Balampasu', '1997-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 19:18:38'),
(252, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 20:00:54'),
(253, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 20:04:16'),
(254, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-25 23:06:23'),
(255, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 00:53:38'),
(256, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 01:02:57'),
(257, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 01:03:05'),
(258, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 01:03:17'),
(259, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 01:37:27'),
(260, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 01:37:49'),
(261, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 01:41:43'),
(262, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 01:41:50'),
(263, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 01:47:19'),
(264, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 01:47:26'),
(265, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 01:52:15'),
(266, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 06:51:32'),
(267, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 07:01:58'),
(268, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 07:02:06'),
(269, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 07:04:29'),
(270, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 07:04:34'),
(271, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 07:04:47'),
(272, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 07:04:57'),
(273, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 10:36:44'),
(274, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 10:37:21'),
(275, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 10:37:54'),
(276, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 10:40:50'),
(277, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 14:24:36'),
(278, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 14:28:34'),
(279, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 14:29:54'),
(280, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 14:38:55'),
(281, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 14:47:33'),
(282, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 14:50:29'),
(283, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 15:31:49'),
(284, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-26 15:55:20'),
(285, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 08:56:05'),
(286, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 08:56:55'),
(287, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 08:57:42'),
(288, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 08:58:39'),
(289, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 08:59:23'),
(290, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 09:08:59'),
(291, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 13:06:49'),
(292, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 19:36:12'),
(293, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 19:56:32'),
(294, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 21:10:16'),
(295, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 21:10:42'),
(296, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 21:27:37'),
(297, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 21:32:17'),
(298, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 21:49:23'),
(299, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 22:04:58'),
(300, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 22:36:43'),
(301, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 22:54:31'),
(302, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 22:55:06'),
(303, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 22:55:35'),
(304, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 22:58:06'),
(305, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 22:59:44'),
(306, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 23:08:45'),
(307, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 23:13:54'),
(308, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 23:15:50'),
(309, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 23:16:21'),
(310, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 23:25:08'),
(311, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 23:31:33'),
(312, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 23:39:26'),
(313, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-27 23:51:21'),
(314, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 00:14:50'),
(315, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 00:18:26'),
(316, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 00:29:48'),
(317, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 00:29:56'),
(318, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 00:30:01');
INSERT INTO `arsip_surat` (`id_arsip`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `jalan`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `no_kk`, `pend_kk`, `pend_terakhir`, `pend_ditempuh`, `pekerjaan`, `status_perkawinan`, `status_dlm_keluarga`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`, `waktu_disalin`) VALUES
(319, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 00:38:54'),
(320, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 00:39:00'),
(321, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 00:39:05'),
(322, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:21:38'),
(323, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:38:11'),
(324, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:38:53'),
(325, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:40:35'),
(326, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:43:20'),
(327, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:43:52'),
(328, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:46:26'),
(329, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:47:07'),
(330, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:47:44'),
(331, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:56:27'),
(332, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:59:44'),
(333, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:59:50'),
(334, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 01:59:58'),
(335, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:02:04'),
(336, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:03:34'),
(337, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:04:42'),
(338, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:14:00'),
(339, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:14:04'),
(340, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:14:09'),
(341, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:19:24'),
(342, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:21:58'),
(343, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:34:19'),
(344, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:34:44'),
(345, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:37:46'),
(346, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:40:45'),
(347, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:41:19'),
(348, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:48:08'),
(349, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:48:13'),
(350, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:48:18'),
(351, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:50:42'),
(352, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:53:53'),
(353, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:54:29'),
(354, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:55:00'),
(355, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:58:11'),
(356, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 02:58:37'),
(357, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 03:08:06'),
(358, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 03:11:43'),
(359, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 03:11:49'),
(360, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 03:11:54'),
(361, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 03:11:59'),
(362, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:29:26'),
(363, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:33:01'),
(364, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:34:10'),
(365, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:46:08'),
(366, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:46:15'),
(367, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:46:22'),
(368, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:46:27'),
(369, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:47:54'),
(370, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:52:14'),
(371, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:52:19'),
(372, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:52:23'),
(373, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:52:27'),
(374, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 08:52:33'),
(375, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 09:19:19'),
(376, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 09:19:25'),
(377, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 09:19:29'),
(378, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 09:19:34'),
(379, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 09:19:38'),
(380, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 09:19:43'),
(381, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 09:19:48'),
(382, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 09:51:35'),
(383, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 09:57:39'),
(384, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 09:57:43'),
(385, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 09:57:48'),
(386, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 10:38:53'),
(387, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 10:42:34'),
(388, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 10:42:51'),
(389, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 10:42:59'),
(390, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 10:47:19'),
(391, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 10:47:47'),
(392, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 10:59:03'),
(393, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 11:00:55'),
(394, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 11:01:00'),
(395, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 11:29:51'),
(396, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 11:29:59'),
(397, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 11:30:11'),
(398, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 11:30:22'),
(399, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 19:42:00'),
(400, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 19:47:10'),
(401, '7304081303910003', 'Abdullah, S.pdi', 'Kaluku', '1991-03-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 19:49:22'),
(402, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 19:53:55'),
(403, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 20:18:53'),
(404, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:02:57'),
(405, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:03:02'),
(406, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:03:07'),
(407, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:03:13'),
(408, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:03:18'),
(409, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:03:23'),
(410, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:03:29'),
(411, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:03:38'),
(412, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:03:44'),
(413, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:03:50'),
(414, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:04:02'),
(415, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:04:08'),
(416, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:04:15'),
(417, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:04:23'),
(418, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-28 21:04:28'),
(419, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 09:12:55'),
(420, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 09:38:42'),
(421, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 09:40:06'),
(422, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 09:44:42'),
(423, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 09:45:18'),
(424, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 09:45:28'),
(425, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 09:53:50'),
(426, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:13:57'),
(427, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:17:27'),
(428, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:22:09'),
(429, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:25:24'),
(430, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:30:04'),
(431, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:33:44'),
(432, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:38:52'),
(433, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:38:57'),
(434, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:45:50'),
(435, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:51:28'),
(436, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:55:13'),
(437, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 10:59:49'),
(438, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 11:41:26'),
(439, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 13:23:29'),
(440, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 13:25:16'),
(441, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 13:25:58'),
(442, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 13:39:46'),
(443, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 13:40:06'),
(444, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 13:47:30'),
(445, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 14:40:22'),
(446, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 14:45:41'),
(447, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 14:45:57'),
(448, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 14:54:54'),
(449, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 14:56:11'),
(450, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 15:02:06'),
(451, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 15:44:49'),
(452, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 15:44:53'),
(453, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 15:57:49'),
(454, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 15:58:25'),
(455, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:09:39'),
(456, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:12:51'),
(457, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:16:49'),
(458, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:21:30'),
(459, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:30:56'),
(460, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:34:17'),
(461, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:43:23'),
(462, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:46:12'),
(463, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:48:53'),
(464, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:51:39'),
(465, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:55:43'),
(466, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 16:59:14'),
(467, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 17:02:28'),
(468, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 17:15:08'),
(469, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 17:19:45'),
(470, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 17:21:52'),
(471, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 17:25:52'),
(472, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 20:02:41'),
(473, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 20:09:37'),
(474, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 20:09:42'),
(475, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 20:24:51'),
(476, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 20:24:56'),
(477, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 20:35:16'),
(478, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 20:35:44'),
(479, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 20:48:18'),
(480, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 20:49:44'),
(481, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'LAKI-LAKI', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 20:57:21'),
(482, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-29 21:28:04'),
(483, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-01 23:20:42'),
(484, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-01 23:46:26'),
(485, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-02 00:02:27'),
(486, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 00:38:46'),
(487, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 00:39:34'),
(488, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 00:45:52'),
(489, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 00:52:30'),
(490, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 00:53:44'),
(491, '7304081207150002', 'Abrar R. Al muarif', 'jeneponto', '2015-07-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 00:54:11'),
(492, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 00:56:22'),
(493, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:06:00'),
(494, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:09:19'),
(495, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:10:40'),
(496, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:13:13'),
(497, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:14:07'),
(498, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:16:38'),
(499, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:17:44'),
(500, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:23:51'),
(501, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:30:33'),
(502, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:32:05'),
(503, '7304084506030002', 'Yulianti', 'Jeneponto', '1999-10-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:33:29'),
(504, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:35:55'),
(505, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:45:57'),
(506, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 01:58:11'),
(507, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:04:13'),
(508, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:07:29'),
(509, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:09:57'),
(510, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:19:27'),
(511, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:19:44'),
(512, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:29:06'),
(513, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:29:40'),
(514, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:31:41'),
(515, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:42:40'),
(516, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:43:44'),
(517, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:57:19'),
(518, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 02:59:59'),
(519, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 03:00:28'),
(520, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 03:07:18'),
(521, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 03:09:06'),
(522, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 03:09:44'),
(523, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 03:09:54'),
(524, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 03:13:07'),
(525, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 03:16:07'),
(526, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 03:22:01'),
(527, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 03:34:12'),
(528, '7304081303910003', 'Abdullah, S.pdi', 'Kaluku', '1991-03-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 03:55:13'),
(529, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 06:26:39'),
(530, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 06:28:49'),
(531, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 07:04:44'),
(532, '7304081207150002', 'Abrar R. Al muarif', 'jeneponto', '2015-07-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 07:05:27'),
(533, '7304080107740003', 'Abd. Latif', 'Kaluku', '1974-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-07-03 07:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(11) NOT NULL,
  `nama_dusun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulir_pengantar_nikah`
--

INSERT INTO `formulir_pengantar_nikah` (`id_fpn`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `status_nikah1`, `status_nikah2`, `nama_ayah`, `nik_ayah`, `tempat_tgl_lahir_ayah`, `kewarganegaraan_ayah`, `agama_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nik_ibu`, `tempat_tgl_lahir_ibu`, `kewarganegaraan_ibu`, `agama_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(114, 'Formulir Pengantar Nikah', '018/FPN/SANGAT MEMBANTU/VI/2025', '7304080811110001', 402, 'hf', 'gfh', 'g', 'gf', 'fg', 'gf', 'gf', 'gf', 'g', 'h', 'gh', 'gh', 'gfh', 'g', 'gh', 'gh', '2025-06-28 20:21:18', 1, 'SELESAI', 1),
(115, 'Formulir Pengantar Nikah', '023/FPN/SANGAT MEMBANTU/VI/2025', '7304080506770003', 404, 'Non voluptas rerum a', 'Rem eum accusantium ', 'Sit dolorem nisi qui', 'Reiciendis ut sed qu', 'Sit sunt nostrud est', 'Inventore sit offici', 'Fugit sapiente cons', 'Exercitationem id q', 'In officia voluptati', 'Explicabo Alias eu ', 'Tenetur sunt ut rer', 'Veniam modi volupta', 'Amet quasi vel enim', 'Omnis quod dolores m', 'Quas ut iusto quisqu', 'Dicta voluptas dolor', '2025-06-28 22:07:17', 2, 'SELESAI', 1),
(116, 'Formulir Pengantar Nikah', '025/FPN/XXX/VI/2025', '7304080811110001', 419, 'a. Laki-laki : Jejaka, Duda, a', 'b. Perempuan : Perawan, Janda', 'DAENG PATTA', 'nik ayah', 'd', 'asd', 'ads', 'das', 'dsa', 'dsa', 'sda', 'sda', 'sad', 'asd', 'das', 'sda', '2025-06-29 09:38:06', 2, 'SELESAI', 1),
(118, 'Formulir Pengantar Nikah', '026/CCC/XXX/VI/2025', '7304080506770003', 421, 'A explicabo Molesti', 'Recusandae Ad in pa', 'Numquam vitae adipis', 'Saepe labore quos ut', 'Ea voluptatibus magn', 'Cillum consequatur ', 'Nulla odit rem dolor', 'Ipsam anim aute impe', 'Numquam veniam sunt', 'Rerum eum irure est', 'Tempor atque id lor', 'Obcaecati velit temp', 'Facere itaque enim v', 'Omnis maiores quibus', 'Quia quia facere adi', 'In expedita quam ull', '2025-06-29 09:44:23', 2, 'SELESAI', 1),
(119, 'Formulir Pengantar Nikah', '912/027/BARU/VI/2025', '7304080506770003', 424, 'Sapiente voluptate r', 'Pariatur Enim labor', 'Voluptatem Soluta d', 'At deserunt maiores ', 'Omnis ut eius conseq', 'Irure amet expedita', 'At qui modi error do', 'Sunt aut atque assum', 'Iste amet qui aut o', 'Eius velit culpa en', 'Ea perspiciatis sol', 'Odit doloribus quisq', 'Magnam vel atque ull', 'Dicta occaecat conse', 'Enim harum alias aut', 'Optio consequatur h', '2025-06-29 09:53:24', 2, 'SELESAI', 1),
(120, 'Formulir Pengantar Nikah', '029/KODESURAT/DBL/VI/2025', '7304080506770003', 425, 'Labore eiusmod aut o', 'Aliquam et voluptate', 'Nostrud ullam aut ut', 'Soluta vel in omnis ', 'Perspiciatis veniam', 'Hic sed unde et sit', 'Rem sint culpa exer', 'A eaque dolor aut de', 'Rem adipisicing quam', 'Voluptatem dolorum d', 'Earum quis ullam nos', 'Aut cupiditate eius ', 'Qui eum quidem incid', 'Laudantium do optio', 'Ducimus et nesciunt', 'Ut tempore ut et pr', '2025-06-29 10:13:37', 2, 'SELESAI', 1),
(121, 'Formulir Pengantar Nikah', '030/TTTT/DBL/VI/2025', '7304080506770003', 426, 'Error tempore aut e', 'Natus distinctio Un', 'Labore et optio vel', 'Illo aliquip in quae', 'Voluptates velit qui', 'Blanditiis minus sin', 'Consequuntur asperna', 'Provident quae labo', 'Officia omnis perfer', 'Est harum architecto', 'Et eos deserunt temp', 'Est rerum aperiam p', 'Harum ea veniam in ', 'Aliqua Esse commodi', 'Iusto ex quibusdam i', 'Iure beatae adipisci', '2025-06-29 10:17:16', 2, 'SELESAI', 1),
(122, 'Formulir Pengantar Nikah', '031/coba/DBL/VI/2025', '7304080506770003', 427, 'Occaecat expedita an', 'Ut eaque reiciendis ', 'Adipisicing qui dolo', 'Anim pariatur Incid', 'Sed neque incidunt ', 'Unde in quos labore ', 'Ad culpa elit adip', 'Deserunt sunt dolore', 'Dolorem voluptatibus', 'Et eaque ullamco ut ', 'Cillum odit quae inc', 'Eum rem ea aut volup', 'Sint et dolor et lib', 'Consequatur aliquip', 'Quo explicabo Autem', 'Dolor facilis proide', '2025-06-29 10:21:49', 2, 'SELESAI', 1),
(123, 'Formulir Pengantar Nikah', 'MANTAP/032/DBL/VI/2025', '7304080506770003', 428, 'Harum natus esse su', 'Incidunt doloremque', 'Sunt nihil deserunt', 'Quis elit alias qui', 'Velit a anim omnis ', 'Vel perferendis modi', 'Laboris magna quaera', 'In consequatur Nost', 'Aliqua Cupiditate d', 'Voluptatum illo volu', 'Ad quia minima volup', 'Ea iste culpa aut e', 'Qui facilis in et vo', 'Ea architecto deseru', 'Beatae harum explica', 'Optio totam in quae', '2025-06-29 10:25:17', 2, 'SELESAI', 1),
(124, 'Formulir Pengantar Nikah', 'GANTI/033/DBL/VI/2025', '7304080506770003', 429, 'Eveniet est tempori', 'Tempor sint ut cillu', 'Fugit irure vero ad', 'Quia qui consequatur', 'Ut consequatur Reru', 'Deserunt perferendis', 'Animi nisi saepe in', 'Qui molestiae cumque', 'Aliqua Minim nihil ', 'Consequat Consectet', 'Velit sit commodo re', 'Enim laboris aut ad ', 'Et voluptas et excep', 'Ea sequi sint saepe ', 'Corporis et sapiente', 'Provident doloribus', '2025-06-29 10:29:51', 2, 'SELESAI', 1),
(125, 'Formulir Pengantar Nikah', 'JOOS/034/DBL/VI/2025', '7304080506770003', 430, 'Aut explicabo Repre', 'Consectetur minima q', 'Id ipsum asperiore', 'Obcaecati libero eiu', 'Autem sunt sint max', 'Fugiat sapiente iust', 'In neque maiores mag', 'Eum dolores qui aliq', 'Voluptatum quod volu', 'Doloremque ab numqua', 'Laboriosam et qui r', 'Iusto reprehenderit', 'Esse laboris vitae c', 'Dolorem natus laboru', 'Voluptatibus consequ', 'Voluptatem Deserunt', '2025-06-29 10:33:35', 2, 'SELESAI', 1),
(126, 'Formulir Pengantar Nikah', '035/FPN/DBL/VI/2025', '7304080506770003', 431, 'Adipisci quia conseq', 'Omnis omnis quis vol', 'Labore libero nostru', 'Esse hic eaque eum i', 'Aspernatur mollitia ', 'Dolor ea eiusmod sae', 'Magnam eos elit sim', 'Officia ex consequat', 'Do adipisci nulla an', 'Eveniet dolorem tem', 'Odit tenetur Nam in ', 'Proident rerum sapi', 'Autem in in dolor te', 'Nemo consequatur lab', 'Dolorem nobis dolore', 'Repellendus Exercit', '2025-06-29 10:38:43', 1, 'SELESAI', 1),
(127, 'Formulir Pengantar Nikah', '037/BISSMILLAH/DBL/VI/2025', '7304080506770003', 432, 'Veritatis repudianda', 'Sequi eos ut Nam sin', 'Cumque aperiam sed i', 'In aliqua Aliqua E', 'Eiusmod at dicta vol', 'Doloribus est dolor ', 'Voluptate repudianda', 'Quia est eaque exped', 'Doloremque nesciunt', 'Et ullamco similique', 'Esse doloribus debi', 'Ad exercitation unde', 'Quis neque sapiente ', 'Dolor est quas esse ', 'Quo amet esse debi', 'Veniam est consequa', '2025-06-29 10:45:39', 2, 'SELESAI', 1),
(128, 'Formulir Pengantar Nikah', '036/14HHS/DBL/VI/2025', '7304080811110001', 433, 'Voluptatem culpa la', 'Recusandae Lorem re', 'Quas id mollitia co', 'Voluptatum dolorum d', 'Quas est dolor sunt', 'Eiusmod rerum qui ap', 'Dolore iusto qui dol', 'At ad ut sit quos o', 'Ratione voluptas et ', 'Iste laborum enim qu', 'In Nam inventore ill', 'Quia vel eaque paria', 'Optio eiusmod quasi', 'Eiusmod molestias cu', 'Enim itaque pariatur', 'Non ut expedita porr', '2025-06-29 10:39:12', 2, 'SELESAI', 1),
(129, 'Formulir Pengantar Nikah', '038/FPN/KODE-DS/VI/2025', '7304080506770003', 434, 'Aut nemo sint et ma', 'Qui quo ullam mollit', 'Totam amet veniam ', 'Iure elit accusamus', 'Quod temporibus ea l', 'Eu et facilis quis c', 'Quos dolores iusto q', 'Dolorem esse nihil ', 'Dolor in culpa quis ', 'Aliquid aut quasi it', 'Quis qui itaque nost', 'Consequuntur vel ven', 'Irure cum culpa sed', 'Id in quisquam quia ', 'Corporis esse ex ex', 'Velit nihil a sunt m', '2025-06-29 10:50:06', 2, 'SELESAI', 1),
(130, 'Formulir Pengantar Nikah', '039/EWAKO/DBL/VI/2025', '7304080506770003', 435, 'Nihil sunt at corrup', 'Quia ducimus repudi', 'Enim consequuntur be', 'Iusto dolor dicta no', 'Est elit optio rer', 'Reprehenderit aut q', 'Deleniti natus asper', 'Laborum Occaecat ut', 'Dolor qui quis eum c', 'Omnis nostrud dolore', 'Doloribus officia so', 'Sit accusamus est i', 'Excepteur sint maxim', 'Voluptatibus quasi v', 'Est et necessitatib', 'Autem magnam reicien', '2025-06-29 10:55:03', 2, 'SELESAI', 1),
(131, 'Formulir Pengantar Nikah', '040/TTTT/DBL/VI/2025', '7304080506770003', 436, 'Non nulla laborum A', 'Veniam in ut nostru', 'Odit itaque dolor fu', 'Nam architecto cumqu', 'Ea et et voluptatibu', 'Deserunt dolorem aut', 'Tempora sit quis tem', 'Nisi ab incidunt su', 'Sint adipisicing ei', 'Nemo ex suscipit mol', 'Pariatur In ipsum n', 'Officia ut debitis e', 'Maiores suscipit pro', 'Labore in hic repreh', 'Ab animi natus offi', 'Eveniet soluta inci', '2025-06-29 10:59:37', 2, 'SELESAI', 1),
(132, 'Formulir Pengantar Nikah', '041/BISSMILLAH/DBL/VI/2025', '7304080506770003', 437, 'Voluptatem Neque ea', 'Non ea cupiditate ex', 'Et cum aut exercitat', 'Obcaecati voluptates', 'Aute obcaecati volup', 'Ut architecto sunt n', 'Voluptate officia la', 'Est voluptatem Sol', 'Ut cum iusto ullam a', 'Dicta accusantium po', 'Autem aliquam incidi', 'Ut nostrum dolor mod', 'Aliquam ipsa velit ', 'Cum libero aliquam v', 'Nihil facere consequ', 'Dolorum magnam sint', '2025-06-29 11:41:13', 2, 'SELESAI', 1),
(137, 'Formulir Pengantar Nikah', '001/9966/MANTAP/VI/2025', '7304080506770003', 443, 'Ea id eius voluptate', 'Ab ut corrupti nisi', 'Nemo earum quibusdam', 'Qui non est velit ', 'Sunt voluptatem aliq', 'Corrupti non quod n', 'Perspiciatis incidu', 'Sed est pariatur Od', 'Enim exercitation pe', 'Dolore quia animi m', 'Totam ipsum harum cu', 'Assumenda distinctio', 'Dignissimos accusant', 'Aute ut dicta in con', 'Dolor expedita magna', 'Eaque ratione odit a', '2025-06-29 13:47:20', 2, 'SELESAI', 1),
(138, 'Formulir Pengantar Nikah', '008/POOLL/MANTAP22/VI/2025', '7304080506770003', 444, 'Ipsum nisi earum ni', 'Consectetur mollitia', 'Omnis maiores eligen', 'Est consequat Vero ', 'Facere nihil vitae e', 'Aspernatur non qui q', 'Praesentium laudanti', 'Maiores officia debi', 'In laudantium moles', 'Sed deleniti nostrum', 'Praesentium non nisi', 'Fugiat porro expedit', 'Voluptatem sit quos ', 'Culpa Nam cupidatat ', 'Consequatur libero ', 'Molestiae perferendi', '2025-06-29 15:44:43', 2, 'SELESAI', 1),
(139, 'Formulir Pengantar Nikah', '006/SUKSES/MANTAP22/VI/2025', '7304080506770003', 447, 'Eu ullamco qui sed a', 'Sunt minus id anim d', 'Laudantium nemo in ', 'Ex assumenda tenetur', 'Et sunt minus volupt', 'Laborum Ut distinct', 'Ducimus a perspicia', 'Velit temporibus del', 'Magna aute ut quod q', 'Voluptatibus nisi la', 'Cum ducimus est rer', 'Reprehenderit aspern', 'Ad tenetur sed illum', 'Est sed accusamus au', 'Ab in quia dicta err', 'Laboris ut error ut ', '2025-06-29 14:53:56', 2, 'SELESAI', 1),
(140, 'Formulir Pengantar Nikah', '99UJICONA/017/WOOW/VI/2025', '7304080506770003', 448, 'Necessitatibus sint ', 'Nam aliquip minus in', 'Aut distinctio Dolo', 'Pariatur Qui et tem', 'Consequatur minim m', 'Quia aperiam officia', 'Temporibus ex itaque', 'Dolor modi similique', 'Impedit est ea rati', 'Consequat Magnam vo', 'Provident aspernatu', 'Dolorum hic repellen', 'Provident quidem ex', 'Aliquip culpa conse', 'Et dolor qui non exp', 'Sed duis porro provi', '2025-06-29 18:58:42', 2, 'SELESAI', 1),
(141, 'Formulir Pengantar Nikah', 'KODEFPN/001/KODE-DS/VI/2025', '7304080506770003', 449, 'Labore itaque nulla ', 'Quis ut a ipsam anim', 'Aliquam velit quae i', 'Minus et et obcaecat', 'Cillum quibusdam fug', 'Error maiores vel ma', 'Dolore in dolor cupi', 'Molestiae id quod qu', 'Accusamus ipsum con', 'Et eaque ut sunt ve', 'Culpa dolores deleni', 'Veniam voluptatum e', 'Voluptas vitae vitae', 'Vero itaque beatae d', 'Quos adipisicing bla', 'Exercitationem delen', '2025-06-29 19:24:46', 2, 'SELESAI', 1),
(142, 'Formulir Pengantar Nikah', '99UJICONA/018/WOOW/VI/2025', '7304080506770003', 450, 'Tempore culpa dolo', 'Beatae neque elit m', 'Minima minim cillum ', 'Porro at quisquam ve', 'Esse non amet imped', 'Velit et voluptas ma', 'A vitae eum omnis ve', 'Distinctio Officiis', 'Harum impedit do ma', 'Impedit exercitatio', 'Molestiae suscipit c', 'Eum nostrum ad do qu', 'Autem non veritatis ', 'Non praesentium temp', 'Quis molestias molli', 'Cupidatat voluptate ', '2025-06-29 18:59:07', 2, 'SELESAI', 1),
(143, 'Formulir Pengantar Nikah', '011/PILIHAN/MANTAP/VI/2025', '7304080506770003', 451, 'Autem aut iusto cons', 'Quis ullamco culpa a', 'Itaque et voluptatib', 'Aliquam amet iste e', 'Labore nulla molesti', 'Corporis officia dol', 'Vel incididunt illo ', 'Et quasi et ullamco ', 'Eum maxime quibusdam', 'Reiciendis quisquam ', 'Laboris sint rerum q', 'Ad inventore proiden', 'Sed occaecat consect', 'Non deserunt magna n', 'Sed voluptas elit q', 'Cupiditate adipisici', '2025-06-29 20:02:33', 2, 'SELESAI', 1),
(144, 'Formulir Pengantar Nikah', '013/PILIHAN/MANTAP/VI/2025', '7304080506770003', 472, 'Aut quis aut quasi p', 'In eu eos rerum qui', 'Ipsa blanditiis mol', 'Nesciunt irure reru', 'Eos recusandae Lab', 'Veniam atque aute d', 'Itaque deserunt occa', 'Itaque eveniet occa', 'Soluta odit ut harum', 'Commodo voluptates n', 'Nobis non modi conse', 'Qui nemo accusamus e', 'Placeat consequatur', 'Facilis consequat M', 'Excepteur architecto', 'Obcaecati ut modi ob', '2025-06-29 20:09:20', 2, 'SELESAI', 1),
(145, 'Formulir Pengantar Nikah', 'PILIHAN/016/MANTAP/VI/2025', '7304080506770003', 473, 'Deleniti dolores in ', 'Nisi iste fuga Cons', 'Esse in do doloremqu', 'Aliquip quia veniam', 'Ut dolor do officiis', 'Expedita ea beatae d', 'Rerum enim ab perfer', 'Perferendis consequa', 'In et mollitia in et', 'Sit veritatis dolor ', 'Totam fuga Dolor do', 'Vel quae error numqu', 'Rem eveniet itaque ', 'Voluptatum magnam du', 'Aut ipsum rerum reru', 'Proident sit tempo', '2025-06-29 20:24:38', 2, 'SELESAI', 1),
(146, 'Formulir Pengantar Nikah', 'PILIHAN/015/MANTAP/VI/2025', '7304080811110001', 474, 'Quo cupidatat error ', 'Pariatur In error r', 'Magnam numquam facil', 'Officiis vero molest', 'Est ducimus aut ull', 'Dicta et et et Nam e', 'Aute culpa velit ex', 'Qui impedit cillum ', 'Quidem eu omnis volu', 'Inventore pariatur ', 'Illum facere repreh', 'Molestias iure minim', 'Sed nihil quasi est ', 'Vero est commodi rat', 'Earum accusamus non ', 'Nostrud rerum nihil ', '2025-06-29 20:19:14', 2, 'SELESAI', 1),
(147, 'Formulir Pengantar Nikah', 'PILIHAN/017/MANTAP/VI/2025', '7304080506770003', 475, 'Quis eu corporis ips', 'Aut suscipit eligend', 'Sequi consectetur q', 'Voluptatem est natu', 'Veniam veniam illu', 'Sit omnis voluptatem', 'Nihil qui veniam ac', 'Quas ut aliquam esse', 'Quis eiusmod omnis v', 'Magnam nostrud cupid', 'Veniam tempor enim ', 'Aut aut sint omnis ', 'A illum amet neces', 'Omnis amet fugiat ', 'A ea provident sunt', 'Molestiae quia illo ', '2025-06-29 20:26:39', 2, 'SELESAI', 1),
(148, 'Formulir Pengantar Nikah', 'PILIHAN/018/MANTAP/VI/2025', '7304080811110001', 476, 'Dolore similique est', 'Vitae expedita dolor', 'Ut accusamus aut con', 'Repudiandae dolore o', 'Quia aut facilis sae', 'Aliquip est minus d', 'Error sint exercita', 'Et exercitation prov', 'Beatae quia similiqu', 'Ad dignissimos cillu', 'Rerum consequat Ull', 'Sequi ex sed dolorib', 'Dicta et aute recusa', 'Laboriosam ipsum i', 'Error beatae ipsam o', 'Repudiandae saepe la', '2025-06-29 20:31:08', 2, 'SELESAI', 1),
(149, 'Formulir Pengantar Nikah', 'PILIHAN/500/MANTAP/VI/2025', '7304080506770003', 477, 'Est nisi laboris do', 'Occaecat et adipisic', 'Nam commodi pariatur', 'Voluptates sint et d', 'Nam quia sint id si', 'Laboris dolores beat', 'Dolor quas nihil off', 'Quod ut quo nihil cu', 'Placeat quod invent', 'Consectetur autem l', 'Sed vel non enim lib', 'Voluptate dolore acc', 'Irure et eligendi om', 'Consectetur ut earu', 'Sunt nisi esse magn', 'Exercitation velit r', '2025-06-29 20:35:24', 2, 'SELESAI', 1),
(151, 'Formulir Pengantar Nikah', 'PILIHAN/019/MANTAP/VII/2025', '7304053112900229', 486, 'a. Laki-laki : Jejaka, Duda, a', 'b. Perempuan : Perawan, Janda', 'DAENG PATTA', 'nik ayah', '122112', '21212', 'gfgf', 'ttr', 'trt', 'trtr', 'rt', 'trrt', 'rt', 'fh', 'tr', 'hfth', '2025-07-03 00:39:00', 2, 'SELESAI', 1),
(152, 'Formulir Pengantar Nikah', '024/PILIHAN/MANTAP/VII/2025', '7304080811110001', 487, 'hg', 'hg', 'rt', 'rt', 'hg', 'fg', 'hgj', 'hgj', 'ghgh', 'ghj', 'fg', 'rt', 'j', 'gh', 'gh', 'hg', '2025-07-03 00:39:41', 1, 'SELESAI', 1),
(153, 'Formulir Pengantar Nikah', NULL, '7304053112900229', 517, 'rg', 'r', 'g', 'g', 'f', 'yj', 'yt', 'yt', 'yj', 'gfh', 'g', 'yku', 'jh', 'hj', 'jhk', 'hjk', '2025-07-03 02:57:19', NULL, 'PENDING', 1),
(154, 'Formulir Pengantar Nikah', NULL, '7304053112900229', 519, 'yt', 'yj', 'yt', 'ty', 'tyj', 'j', 'j', 'tyj', 'y', 'yt', 'y', 'y', 'jy', 'y', 'yt', 'yj', '2025-07-03 03:00:28', NULL, 'PENDING', 1),
(155, 'Formulir Pengantar Nikah', NULL, '7304053112900229', 520, 'hg', 'gh', 'g', 'gh', 'jhg', 'hg', 'h', 'g', 'h', 'hj', 'hg', 'h', 'h', 'h', 'h', 'h', '2025-07-03 03:07:18', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Table structure for table `formulir_permohonan_kehendak_nikah`
--

CREATE TABLE `formulir_permohonan_kehendak_nikah` (
  `id_fpkn` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulir_permohonan_kehendak_nikah`
--

INSERT INTO `formulir_permohonan_kehendak_nikah` (`id_fpkn`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `kepada_yth`, `calon_suami`, `calon_istri`, `hari_tanggal`, `tempat_akad`, `delapan`, `sembilan`, `sepuluh`, `sebelas`, `dua_belas`, `tiga_belas`, `kepala_kua`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(48, 'Formulir Permohonan Kehendak Nikah', '021/FPKN/SANGAT MEMBANTU/VI/2025', '7304080811110001', 405, 'TEMPAT BARU', 'Ab ducimus reprehen', 'Alias voluptatum cum', 'Rerum ex earum dolor', 'In non sit est ad vo', 'Quibusdam soluta qui', 'Fugit enim eu in di', 'Exercitationem repud', 'Ut minima minim prae', 'Consequat Et offici', 'Minima architecto es', 'BANTAENG', '2025-06-28 21:42:35', 1, 'SELESAI', 1),
(49, 'Formulir Permohonan Kehendak Nikah', '003/FPKN/MANTAP22/VI/2025', '7304080506770003', 422, 'TEMPAT BARU', 'Quibusdam rem dolore', 'Est et beatae dolor ', 'Reprehenderit magna', 'Nihil in nisi est e', 'Enim nulla esse nos', 'Id ab est esse dis', 'Voluptates in volupt', 'Error officia amet ', 'Fuga Quam voluptate', 'A magni aut qui minu', 'BANTAENG', '2025-06-29 14:39:03', 2, 'SELESAI', 1),
(50, 'Formulir Permohonan Kehendak Nikah', '004/FPKN/MANTAP22/VI/2025', '7304080811110001', 423, 'dsa', 'Consequat Expedita ', 'Quas id quod pariatu', 'Ab dolor obcaecati r', 'Quia eiusmod quam ea', 'Autem voluptatem con', 'Quisquam molestiae i', 'Magnam molestiae et ', 'Officiis perspiciati', 'Magni eveniet excep', 'Qui iste ad quidem q', 'ds', '2025-06-29 14:40:05', 1, 'SELESAI', 1),
(51, 'Formulir Permohonan Kehendak Nikah', '002/FPKN/MANTAP/VI/2025', '7304080506770003', 441, 'MAKASSAR', 'Dolor dolorem aliqua', 'Voluptatem et dolor', 'Facere quaerat sed t', 'Et in elit facilis ', 'Et dolorem aut dolor', 'Ipsa possimus omni', 'Porro est distinctio', 'Ut nostrum eos asper', 'Ut lorem autem delen', 'Accusamus cupidatat ', 'DRS MASOwww', '2025-06-29 14:38:32', 1, 'SELESAI', 1),
(52, 'Formulir Permohonan Kehendak Nikah', '005/884GOLL/MANTAP22/VI/2025', '7304080506770003', 445, 'TEMPAT BARU', 'Quis at laboriosam ', 'Alias dolorem rerum ', 'Neque voluptatem Si', 'Aspernatur ipsum ut ', 'Duis repellendus De', 'Qui pariatur Illo q', 'Fuga Quaerat rem fa', 'In molestiae est am', 'Fugiat tempora non ', 'Beatae maiores sunt ', 'DRS MASOwww', '2025-06-29 14:45:18', 2, 'SELESAI', 1),
(53, 'Formulir Permohonan Kehendak Nikah', '007/TESS999/MANTAP22/VI/2025', '7304080506770003', 446, 'TEMPAT BARU', 'In excepturi maxime ', 'Ut deleniti praesent', 'Praesentium aut modi', 'Anim assumenda nostr', 'Nihil hic sed numqua', 'Deleniti sint est a ', 'Quia nemo numquam eo', 'Esse non aspernatur', 'Porro ducimus tempo', 'Sed natus quia esse ', 'BANTAENG', '2025-06-29 15:44:34', 2, 'SELESAI', 1),
(54, 'Formulir Permohonan Kehendak Nikah', 'FPKN/021/MANTAP/VI/2025', '7304080506770003', 452, 'p', 'Amet neque eaque er', 'Perspiciatis atque ', 'Et blanditiis ipsum', 'Qui voluptatum nihil', 'Consequatur Vel dol', 'Eveniet corrupti v', 'Inventore alias enim', 'Repudiandae culpa c', 'Omnis nostrud facere', 'Ipsa reprehenderit ', 'po', '2025-06-29 20:32:59', 1, 'SELESAI', 1),
(55, 'Formulir Permohonan Kehendak Nikah', 'JOPO/502/HELLO/VI/2025', '7304080506770003', 479, 'DSFDF', 'Quibusdam temporibus', 'Sit aperiam sint o', 'Amet eum doloremque', 'Itaque laborum Omni', 'Totam quo maiores pl', 'Enim pariatur Ut qu', 'Beatae veniam unde ', 'Qui fugiat lorem qu', 'Sunt similique tota', 'Consequatur Nisi ut', 'FDDFFD', '2025-06-29 20:49:30', 2, 'SELESAI', 1),
(56, 'Formulir Permohonan Kehendak Nikah', 'FPKN/022/MANTAP/VI/2025', '7304080506770003', 480, 'TTT', 'Magnam impedit ut q', 'Esse incidunt quo ', 'Officia aut tempora ', 'Numquam placeat vol', 'Iure amet possimus', 'Aspernatur nostrud v', 'Harum dolorem et sun', 'Officia veniam aliq', 'Fuga Non ducimus t', 'Voluptas quas rerum ', 'TTTT', '2025-06-29 20:58:09', 1, 'SELESAI', 1),
(57, 'Formulir Permohonan Kehendak Nikah', 'FPKN/023/MANTAP/VI/2025', '7304080811110001', 481, 'JOSS', 'Est sit tempor quam', 'Officia sed dignissi', 'Et delectus et lore', 'Corrupti aliqua Al', 'Aut aut laboriosam ', 'Consequuntur porro a', 'Amet nihil magni su', 'Fugiat dolores cum d', 'Ut sed quasi exercit', 'Quo elit quis occae', 'JOSS', '2025-06-29 20:59:43', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `formulir_persetujuan_calon_pengantin`
--

CREATE TABLE `formulir_persetujuan_calon_pengantin` (
  `id_fpcp` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulir_persetujuan_calon_pengantin`
--

INSERT INTO `formulir_persetujuan_calon_pengantin` (`id_fpcp`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `bin`, `nama_istri`, `bin_istri`, `nik_istri`, `tgl_lahir_istri`, `kewarganegaraan_istri`, `agama_istri`, `pekerjaan_istri`, `alamat_istri`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(41, 'Formulir Persetujuan Calon Pengantin', '04/FPCP/KODE-DESA/VI/2025', '7304080811110001', 164, 'Necessitatibus sed l', 'Ut dolores culpa nos', 'Iure ut quia blandit', 'Rerum adipisicing po', 'Irure est culpa ess', 'Consequatur Fugiat ', 'Eligendi ut aliquam ', 'Incididunt qui in ma', 'Molestias odio debit', '2025-06-21 21:42:13', 2, 'SELESAI', 1),
(42, 'Formulir Persetujuan Calon Pengantin Istri', '05/FPCP/KODE-DESA/VI/2025', '7304081501060003', 198, 'Nama Bin', 'NAMA ISTRI', 'BIN ISTRI', 'sadsda', 'sdds', 'sdsd', 'sdsd', 'dsda', 'ddsa', '2025-06-22 11:41:05', 2, 'SELESAI', 1),
(43, 'Formulir Persetujuan Calon Pengantin Istri', '06/FPCP/KODE-DESA/VI/2025', '7304085907060001', 199, 'Bin istri', 'xxxxxx', 'xxxxx', 'xxx', 'xxx', 'xxx', 'xxx', 'xx', 'xx', '2025-06-22 12:00:45', 2, 'SELESAI', 1),
(44, 'Formulir Persetujuan Calon Pengantin', '07/FPCP/KODE-DESA/VI/2025', '7304081303910003', 201, 'bin suami', 'DD', 'DD', 'DD', 'DD', 'DD', 'DD', 'DD', 'DD', '2025-06-22 12:29:31', 2, 'SELESAI', 1),
(45, 'Formulir Persetujuan Calon Pengantin', '007/FPCP/PENGANTIN/VI/2025', '7304080505650001', 383, 'Culpa mollitia iste', 'Neque eveniet alias', 'Sunt praesentium lab', 'Ipsam quis ad velit ', 'Ex qui repellendus ', 'Vero id obcaecati co', 'Eaque id accusantium', 'Mollitia quaerat exe', 'Reprehenderit earum ', '2025-06-28 09:57:39', 2, 'SELESAI', 1),
(48, 'Formulir Persetujuan Calon Pengantin', '008/FPCP/PENGANTIN/VI/2025', '7304080505650001', 387, 'Consequatur veniam', 'Aliquip placeat aut', 'Laboris sunt repudia', 'Sed deserunt numquam', 'Adipisicing explicab', 'Consequuntur ut ea q', 'Adipisicing distinct', 'Natus officia esse ', 'Possimus ipsa aut ', '2025-06-28 10:42:34', 1, 'SELESAI', 1),
(49, 'Formulir Persetujuan Calon Pengantin', '009/FPCP/MANTAP22/VI/2025', '7304080811110001', 406, 'Ratione exercitation', 'Irure quia quis iust', 'Pariatur Et minim d', 'Adipisicing fugiat ', 'Ratione aut et omnis', 'Exercitation veritat', 'Obcaecati recusandae', 'Architecto qui sapie', 'Temporibus aliqua A', '2025-06-29 15:57:39', 2, 'SELESAI', 1),
(50, 'Formulir Persetujuan Calon Pengantin', '010/OKEFPCP/MANTAP22/VI/2025', '7304080506770003', 453, 'Soluta iure occaecat', 'Aliquip distinctio ', 'Fugiat eligendi lau', 'Consequatur aut id ', 'In proident hic et ', 'Quo esse occaecat e', 'Consequatur quis ve', 'Perferendis beatae n', 'Consectetur volupta', '2025-06-29 15:58:09', 2, 'SELESAI', 1),
(51, 'Formulir Persetujuan Calon Pengantin', 'FPCP/019/MANTAP/VI/2025', '7304080506770003', 454, 'Modi ut voluptas mol', 'Id a in sunt quidem', 'Ut in cumque aperiam', 'Sit non sed in mole', 'Ullam unde quis quo ', 'Molestiae ut vel aut', 'Veniam molestiae as', 'In temporibus possim', 'Rerum et ut in est ', '2025-06-29 20:26:00', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `formulir_persetujuan_calon_pengantin_istri`
--

CREATE TABLE `formulir_persetujuan_calon_pengantin_istri` (
  `id_fpcp2` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulir_persetujuan_calon_pengantin_istri`
--

INSERT INTO `formulir_persetujuan_calon_pengantin_istri` (`id_fpcp2`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `bin`, `nama_suami`, `bin_suami`, `nik_suami`, `tgl_lahir_suami`, `kewarganegaraan_suami`, `agama_suami`, `pekerjaan_suami`, `alamat_suami`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(47, 'Formulir Persetujuan Calon Pengantin Istri', '04/FPCPI/KODE-DESA/VI/2025', '7304081501060003', 200, 'Bin istri', 'XXX', 'XXX', 'XX', 'XX', 'XX', 'XX', 'XX', 'XX', '2025-06-22 12:13:03', 2, 'SELESAI', 1),
(48, 'Formulir Persetujuan Calon Pengantin Istri', '011/istri/MANTAP22/VI/2025', '7304080506770003', 407, 'Odit et enim eu in a', 'Et sed sint nostrud ', 'Cupiditate expedita ', 'Ullam tempora earum ', 'Eum minim omnis prae', 'Consequatur quas cup', 'Reprehenderit archi', 'At temporibus dolore', 'Asperiores vel tempo', '2025-06-29 16:09:26', 2, 'SELESAI', 1),
(49, 'Formulir Persetujuan Calon Pengantin Istri', '018/FPCPI/MANTAP/VI/2025', '7304080506770003', 455, 'Expedita in rerum re', 'Ullamco culpa sed l', 'Dignissimos consequa', 'Nulla sed amet magn', 'Ut nostrud qui est ', 'Exercitation occaeca', 'Eu esse rerum quaer', 'Excepturi vero rerum', 'Magnam expedita exce', '2025-06-29 20:25:41', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `formulir_surat_izin_orang_tua`
--

CREATE TABLE `formulir_surat_izin_orang_tua` (
  `id_fsiot` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulir_surat_izin_orang_tua`
--

INSERT INTO `formulir_surat_izin_orang_tua` (`id_fsiot`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `bin`, `nama1`, `bin1`, `nik1`, `tempat_tgl_lahir1`, `kewarganegaraan1`, `agama1`, `pekerjaan1`, `alamat1`, `nama2`, `bin2`, `nik2`, `tempat_tgl_lahir2`, `kewarganegaraan2`, `agama2`, `pekerjaan2`, `alamat2`, `nama3`, `bin3`, `nik3`, `tempat_tgl_lahir3`, `kewarganegaraan3`, `agama3`, `pekerjaan3`, `alamat3`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(44, 'Formulir Surat Izin Orang Tua', '04/FSIOT/KODE-DESA/VI/2025', '7304080811110001', 166, 'Doloribus sed rerum ', 'Aut nulla et sit ut ', 'Eius suscipit ex con', 'Ut quasi ullamco Nam', 'Reiciendis enim ulla', 'At omnis tenetur lab', 'Commodo anim excepte', 'A consectetur aut li', 'Et corrupti sint mo', 'Animi odit nostrum ', 'Ipsam est aliquid a', 'Nemo eum sit ut et ', 'Odit dolorum in dolo', 'Ut lorem autem et es', 'Rerum odio aut dicta', 'Qui est do repudiand', 'Est culpa suscipit ', 'Ad in dolor corrupti', 'Sit dignissimos tem', 'Aut quia in cupidata', 'Ut obcaecati magna d', 'Iusto non enim moles', 'Ullam nemo ab sit a', 'Harum deserunt nulla', 'Repudiandae optio a', '2025-06-21 21:42:29', 2, 'SELESAI', 1),
(45, 'Formulir Surat Izin Orang Tua', '022/FSIOT/SANGAT MEMBANTU/VI/2025', '7304080811110001', 408, 'Deserunt animi tota', 'Et quia sint omnis ', 'In in amet ut enim ', 'Quibusdam in quis ip', 'Porro eaque est eaq', 'Nihil nisi exercitat', 'Ex autem hic ducimus', 'Eaque nostrud perfer', 'In nemo magnam quis ', 'Animi ducimus modi', 'Voluptatem neque non', 'Aut harum eos volup', 'Est repellendus Vit', 'Quasi architecto vel', 'Culpa quibusdam iste', 'Eveniet dolorem tem', 'Magna cum quaerat al', 'Dolor beatae dolorem', 'Anim veniam elit n', 'Qui ipsum est quam ', 'Et mollitia assumend', 'Qui non sed autem as', 'Adipisicing optio r', 'Iure cillum recusand', 'In excepteur nisi do', '2025-06-28 21:56:07', 2, 'SELESAI', 1),
(46, 'Formulir Surat Izin Orang Tua', 'FSIOT/014/MANTAP/VI/2025', '7304080506770003', 456, 'Veniam rerum id vel', 'Praesentium numquam ', 'Non ea qui id dolor', 'Voluptatem Pariatur', 'In aliqua Voluptas ', 'Quos ratione aliquid', 'Ex quisquam est omni', 'Alias quibusdam esse', 'Sunt commodi sed ne', 'Sit numquam et omni', 'Dolore nihil rem imp', 'Minima consequuntur ', 'Ipsam in mollit quid', 'Dolores incidunt ea', 'Ad aut incidunt omn', 'Ipsa quod veniam m', 'Exercitation id fugi', 'Dolorum maxime aut v', 'Consequat Fugit do', 'Aperiam ex tempore ', 'Cumque repudiandae p', 'Qui vel obcaecati al', 'Dolor rerum est sim', 'Eiusmod sequi quis a', 'Ut dolor est praesen', '2025-06-29 20:18:08', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(350) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin@e-suratdesa.com', '$2y$10$chqOaXjjQ7DIHrGSdRMBNO2Qef7iKPqLA3tgxFA1wEzeuMKaRnzg.', 'admin'),
(2, 'Kepala Desa', 'kades', 'kepaladesa@desa.id', '0cfa66469d25bd0d9e55d7ba583f9f2f', 'kades');

-- --------------------------------------------------------

--
-- Table structure for table `nomor_surat`
--

CREATE TABLE `nomor_surat` (
  `id` int(11) NOT NULL,
  `kode_surat` varchar(10) NOT NULL,
  `kode_desa` varchar(20) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nomor_urut` int(11) NOT NULL,
  `nomor_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nomor_surat`
--

INSERT INTO `nomor_surat` (`id`, `kode_surat`, `kode_desa`, `bulan`, `tahun`, `nomor_urut`, `nomor_lengkap`) VALUES
(1, 'KODEFPN', 'KODE-DS', '6', '2025', 7, 'KODEFPN/001/KODE-DS/VI/2025'),
(2, 'SKDU', 'MANTAP', '6', '2025', 8, 'SKDU/008/MANTAP/VI/2025'),
(3, 'SLH', 'MANTAP', '6', '2025', 9, 'SLH/009/MANTAP/VI/2025'),
(4, 'SKU', 'MANTAP', '6', '2025', 10, '010/SKU/MANTAP/VI/2025'),
(5, 'PILIHAN', 'MANTAP', '6', '2025', 11, '011/PILIHAN/MANTAP/VI/2025'),
(6, 'SKBI', 'MANTAP', '6', '2025', 12, '012/SKBI/MANTAP/VI/2025'),
(7, 'PILIHAN', 'MANTAP', '6', '2025', 13, '013/PILIHAN/MANTAP/VI/2025'),
(8, 'FSIOT', 'MANTAP', '6', '2025', 14, 'FSIOT/014/MANTAP/VI/2025'),
(9, 'PILIHAN', 'MANTAP', '6', '2025', 15, 'PILIHAN/015/MANTAP/VI/2025'),
(10, 'SKP', 'MANTAP', '6', '2025', 16, 'SKP/016/MANTAP/VI/2025'),
(11, 'SKD', 'MANTAP', '6', '2025', 17, 'SKD/017/MANTAP/VI/2025'),
(12, 'PILIHAN', 'MANTAP', '6', '2025', 16, 'PILIHAN/016/MANTAP/VI/2025'),
(13, 'FPCPI', 'MANTAP', '6', '2025', 18, '018/FPCPI/MANTAP/VI/2025'),
(14, 'FPCP', 'MANTAP', '6', '2025', 19, 'FPCP/019/MANTAP/VI/2025'),
(15, 'PILIHAN', 'MANTAP', '6', '2025', 17, 'PILIHAN/017/MANTAP/VI/2025'),
(16, 'PILIHAN', 'MANTAP', '6', '2025', 18, 'PILIHAN/018/MANTAP/VI/2025'),
(17, 'SKPOT', 'MANTAP', '6', '2025', 20, 'SKPOT/020/MANTAP/VI/2025'),
(18, 'FPKN', 'MANTAP', '6', '2025', 21, 'FPKN/021/MANTAP/VI/2025'),
(22, 'SKJB', 'MANTAP', '6', '2025', 22, '022/SKJB/MANTAP/VI/2025'),
(23, 'FPKN', 'MANTAP', '6', '2025', 22, 'FPKN/022/MANTAP/VI/2025'),
(24, 'FPKN', 'MANTAP', '6', '2025', 23, 'FPKN/023/MANTAP/VI/2025'),
(25, '999', 'MANTAP', '6', '2025', 1, '999/001/MANTAP/VI/2025'),
(26, '999', 'MANTAP', '6', '2025', 2, '999/002/MANTAP/VI/2025'),
(27, 'SKBIK', 'MANTAP', '7', '2025', 1, 'SKBIK/001/MANTAP/VII/2025'),
(28, 'SKBB', 'MANTAP', '7', '2025', 1, 'SKBB/001/MANTAP/VII/2025'),
(29, 'SKD', 'MANTAP', '7', '2025', 18, 'SKD/018/MANTAP/VII/2025'),
(30, 'SKKP', 'MANTAP', '7', '2025', 1, 'SKKP/001/MANTAP/VII/2025'),
(31, 'SK', 'MANTAP', '7', '2025', 1, 'SK/001/MANTAP/VII/2025'),
(32, 'SKBIK', 'MANTAP', '7', '2025', 2, 'SKBIK/002/MANTAP/VII/2025'),
(33, 'PILIHAN', 'MANTAP', '7', '2025', 19, 'PILIHAN/019/MANTAP/VII/2025'),
(34, 'PILIHAN', 'MANTAP', '7', '2025', 24, '024/PILIHAN/MANTAP/VII/2025'),
(35, 'SKTM', 'MANTAP', '7', '2025', 25, '025/SKTM/MANTAP/VII/2025');

-- --------------------------------------------------------

--
-- Table structure for table `pejabat_desa`
--

CREATE TABLE `pejabat_desa` (
  `id_pejabat_desa` int(11) NOT NULL,
  `nama_pejabat_desa` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `alamat` varchar(250) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pejabat_desa`
--

INSERT INTO `pejabat_desa` (`id_pejabat_desa`, `nama_pejabat_desa`, `jabatan`, `pangkat`, `nip`, `alamat`) VALUES
(1, 'LUKMAN, SE', 'Kepala Desa', 'Pangkat Penata, III/c', 'Nip. 19840728201001 1 019', 'JL. BALANG BARU 3 NO 23'),
(2, '../../../../assets/img/barcode.png', 'Kepala Desa', '', '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `jalan`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `no_kk`, `pend_kk`, `pend_terakhir`, `pend_ditempuh`, `pekerjaan`, `status_perkawinan`, `status_dlm_keluarga`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`) VALUES
(7081, '5313051201970002', 'Aswar', 'Balampasu', '1997-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7059, '7304013112910033', 'Suardi', 'Batu Le\'leng', '1991-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6798, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7083, '7304042007860001', 'Nimbang', 'Bontosunggu', '1986-07-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6795, '7304043112530079', 'Make', 'Bo\'nia', '1953-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7085, '7304043112640004', 'Badullah', 'Bungeng', '1964-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6996, '7304047011770001', 'Sulkepi', 'Togo-Togo', '1996-06-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7030, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6987, '7304080103760001', 'Hasan', 'Je\'neponto', '1976-03-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6782, '7304080103900001', 'Erwin', 'Bo\'nia', '1990-03-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6848, '7304080104050001', 'Rapli', 'Jeneponto', '2005-04-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6807, '7304080106800001', 'Taju', 'Bo\'nia', '1980-06-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6965, '7304080107450001', 'Sainong', 'Jeneponto', '1945-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7040, '7304080107650006', 'Jufri', 'Arungkeke', '1970-01-01', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6911, '7304080107700008', 'Haseng', 'Jeneponto', '1970-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6780, '7304080107740002', 'Kaharuddin', 'Taroang', '1974-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6790, '7304080107740003', 'Abd. Latif', 'Kaluku', '1974-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6786, '7304080107790004', 'Suharto Ancha', 'Sarroanging', '1979-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6847, '7304080107830042', 'Rannu', 'Jeneponto', '1985-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6995, '7304080107910040', 'Hairuddin', 'Saroanging', '1991-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6907, '7304080111970001', 'Firmansyah', 'Sarroanging', '1997-11-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6841, '7304080201620001', 'Banyo', 'Jeneponto', '1952-01-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6877, '7304080202820001', 'Baharuddin', 'Jeneponto', '1982-02-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7061, '7304080203760001', 'Alexander Agung, S.Sos', 'Jeneponto', '1976-07-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6878, '7304080203830004', 'Kasmawati', 'Bo\'nia', '1983-03-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6918, '7304080204820005', 'Sarifuddin Dg. Lallo', 'Jeneponto', '1982-04-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7008, '7304080206680002', 'Sattu', 'Balang Loe', '1968-05-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6947, '7304080301150002', 'Danil Syaputra', 'Bo\'nia', '2015-01-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6788, '7304080303040003', 'Feri', 'Sarroanging', '2004-03-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6973, '7304080304150001', 'Muh. Tasbi', 'Je\'neponto', '2015-04-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6819, '7304080304900002', 'Amriani', 'Bo\'nia', '1990-12-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6821, '7304080305000004', 'Dedi Arsandi', 'Bo\'nia', '2000-03-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7063, '7304080305030001', 'Muh. Sigit Nur Agung', 'Bo\'nia', '2002-05-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7078, '7304080305520001', 'Siajang', 'Bo\'nia', '1952-05-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6837, '7304080305700001', 'Farida', 'Bo\'nia', '1970-06-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6888, '7304080305930003', 'Jumriani', 'Bo\'nia', '1993-05-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7018, '7304080306080002', 'Muhammad Aldo', 'Bo\'nia', '2008-06-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7023, '7304080306830002', 'Akrim Nuhun Musa, S.Pdi', 'Marica', '1983-06-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6976, '7304080308160002', 'Muh.Farhan Yusuf', 'Je\'neponto', '2016-08-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6793, '7304080309980001', 'Hendrawan', 'Kaluku', '1998-09-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6871, '7304080311630001', 'Moddin', 'Bo\'nia', '1963-11-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6930, '7304080311710002', 'Mardiana', 'Makassar', '1971-11-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7033, '7304080312790002', 'Arifin', 'Bo\'nia', '1979-12-03', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6993, '7304080402520001', 'Hadeng', 'Bo\'nia', '1952-02-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6880, '7304080404150002', 'Muh. Rizky Setiawan', 'Bo\'nia', '2015-04-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6876, '7304080404150003', 'Muh. Rifki Setiawan', 'Bo\'nia', '2015-04-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6889, '7304080406940001', 'Herman', 'Bo\'nia', '1994-06-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6883, '7304080407930001', 'Herawati', 'Makassar,', '1993-07-04', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6817, '7304080501520001', 'Balumbung', 'Jeneponto', '1962-01-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7075, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6864, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6772, '7304080508540001', 'Suma Dg. Jarre', 'Jeneponto', '1954-08-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7019, '7304080509640001', 'Syamsuddin', 'Jeneponto', '1964-09-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6802, '7304080510070001', 'Rudi', 'Bo\'nia', '2007-10-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6881, '7304080510700001', 'Rafiuddin', 'Jeneponto', '1970-10-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6974, '7304080510880004', 'Muh Yusuf', 'Kendari', '1988-10-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6929, '7304080608720001', 'Azis', 'Jenepontio', '1972-08-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6868, '7304080609500001', 'Rali', 'Bo\'nia', '1950-09-06', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6865, '7304080610740001', 'Hariyati, S.Com', 'Bo\'nia', '1974-10-06', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6887, '7304080610900001', 'Rasyid', 'Bo\'nia', '1990-10-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7044, '7304080612710001', 'Sahabuddin', 'Jeneponto', '1971-12-06', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6985, '7304080702170001', 'Affan Asrofi Nas', 'Je\'neponto', '2017-02-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6846, '7304080703810001', 'Mantan Dg. Tale', 'Jeneponto', '1981-03-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6885, '7304080705020001', 'Aswar', 'Bo\'nia', '2002-05-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6774, '7304080706720001', 'Samsuddin', 'Bo\'nia', '1964-06-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7048, '7304080706780002', 'Ribi', '', '2025-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6953, '7304080708590002', 'Kasri', 'Saroanging', '1959-08-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6854, '7304080709640001', 'Mashudi', 'Bo\'nia', '1964-09-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6968, '7304080711850001', 'Jumrah', 'Bo\'nia', '1985-11-07', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7038, '7304080711940002', 'Sudarmin', 'Jeneponto', '1994-11-07', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6836, '7304080802130001', 'Dela Savira', 'Bo\'nia', '2013-02-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6954, '7304080802810001', 'Tamsir', 'Jeneponto', '1981-02-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6909, '7304080805110002', 'Firgawahyu', 'Jeneponto', '2011-05-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6789, '7304080807100001', 'Wahyudi', 'Sarroanging', '2010-07-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6980, '7304080808090002', 'Aditia', 'Bo\'nia', '2009-08-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6992, '7304080808930001', 'Muhlis', 'Bo\'nia', '1993-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6867, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7064, '7304080901090002', 'Muh. Khaerun Nur Agung', 'Bo\'nia', '2009-09-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6890, '7304080902010001', 'Irfan', 'Bo\'nia', '2001-02-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7069, '7304080902050001', 'Muh. Nur Fahmi', 'Jeneponto', '2005-02-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6818, '7304081002700001', 'Satturri', 'Jeneponto', '1970-02-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6971, '7304081005920003', 'Rahmat', 'Talabua', '1992-05-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6964, '7304081007000001', 'Rahul', 'Bo\'nia', '2002-07-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6869, '7304081007660001', 'Kulle', 'Bo\'nia', '1966-07-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6894, '7304081010650001', 'Mansyur DJS', 'Bo\'nia', '1965-10-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7071, '7304081010650005', 'Mansyur DJS', 'Bo\'nia', '1965-10-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6784, '7304081012600001', 'Taju Dg. Jarre', 'Bo\'nia', '1960-12-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6962, '7304081104680001', 'Nusu', 'Bo\'nia', '1968-04-11', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6981, '7304081106950002', 'Sakri', 'Bo\'nia', '1970-01-01', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6970, '7304081112100001', 'Ahmad Ali Akbar', 'Bo\'nia', '2010-12-11', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6777, '7304081201050001', 'Jusriani', 'Bo\'nia', '2005-01-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6950, '7304081201520001', 'M. Dg. Lili', 'Sidenre', '1952-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6932, '7304081201790002', 'Sultan', 'Jeneponto', '1979-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6935, '7304081203070003', 'Muh. Ulil Raezy Saputra', 'Bo\'nia', '2007-03-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6937, '7304081203630003', 'Sahrir', 'Jeneponto', '1969-03-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6843, '7304081203870001', 'Neru', 'Jeneponto', '1987-03-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6977, '7304081204730001', 'Mantang', 'Je\'neponto', '1973-04-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7028, '7304081207150002', 'Abrar R. Al muarif', 'jeneponto', '2015-07-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6872, '7304081207630001', 'Sinampara', 'Jeneponto', '1963-07-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6979, '7304081212980001', 'Agung', 'Bo\'nia', '1998-04-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7026, '7304081303910003', 'Abdullah, S.pdi', 'Kaluku', '1991-03-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6948, '7304081308890001', 'Agus Salim', 'Jeneponto', '1989-08-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6866, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6838, '7304081403990001', 'Adrian', 'Makassar', '1999-03-14', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7013, '7304081404600001', 'Sampara', 'Je\'neponto', '1960-04-14', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7035, '7304081409990002', 'Syahrul Arifin', 'Bo\'nia', '2000-02-27', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6893, '7304081411070001', 'Muh. Alif Safaat', 'Makassar', '2007-11-14', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6969, '7304081501060003', 'Adel Amelia', 'Bo\'nia', '2006-01-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7010, '7304081505090003', 'Aril S', 'Bo\'nia', '2009-05-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6921, '7304081506080001', 'Said Abidin Al Monawar', 'Jeneponto', '2008-06-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6903, '7304081507600001', 'Mangngaribi', 'Bo\'nia', '1960-07-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6832, '7304081510090001', 'Al Gazali', 'Bo\'nia', '2009-10-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7025, '7304081510100001', 'M Subhan Hidayatullah', 'Jeneponto', '2010-10-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7037, '7304081512920004', 'Gatot', 'Jeneponto', '1992-12-15', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7070, '7304081603180002', 'Muh. Azka Al Gibran', 'Jeneponto', '2018-03-16', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6941, '7304081603560001', 'Samsia', 'Bo\'nia', '1956-03-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6829, '7304081606820001', 'Akbar Tompo', 'Bo\'nia', '1982-06-16', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6910, '7304081607140004', 'Firhandani', 'Jeneponto', '2014-07-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6853, '7304081702100001', 'Selfiana', 'Antang', '2010-02-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6940, '7304081702540001', 'Sarifuddin', 'Jeneponto', '1954-02-17', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6824, '7304081703890001', 'Nurbaya', 'Bo\'nia', '1989-03-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6839, '7304081707050001', 'Aidir Aswar', 'Makassar', '2003-07-28', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6825, '7304081712090002', 'Ahmad Fajri', 'Jeneponto', '2009-12-17', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6845, '7304081802090001', 'Refal', 'Lianga', '2009-02-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6861, '7304081803780002', 'Kamaruddin', 'Jeneponto', '1978-03-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6805, '7304081805150001', 'Reski', 'Bo\'nia', '2015-05-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6891, '7304081806650001', 'Sitorongking, S.Pd.', 'Bungung Boddi', '1965-06-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6863, '7304081901070006', 'Syamsuddin Arif Hidayatullah', 'Tarakan', '2007-01-19', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6873, '7304081901080001', 'Muh. Rais Setiawan', 'Bo\'nia', '2008-01-19', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6946, '7304081906060003', 'Dimas', 'Malaysia', '2006-06-19', 'Laki-laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6924, '7304082003550001', 'H. Hama', 'Jeneponto', '1955-03-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6826, '7304082004150001', 'Awal Al Khairul', 'Jeneponto', '2015-04-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6813, '7304082008760001', 'Manni', 'Barayya', '1976-08-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6801, '7304082101050002', 'Heri', 'Bo\'nia', '2005-05-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6833, '7304082105830002', 'Saenal', 'Bo\'nia', '1983-05-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6942, '7304082106450001', 'Juru', 'Saroanging', '1945-06-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6952, '7304082106560001', 'Sambe', 'Saroanging', '1956-06-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7056, '7304082107910003', 'Ilyas', 'Cambalangkasa', '1997-07-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7067, '7304082108760001', 'Suamang', 'Jeneponto', '1976-08-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6967, '7304082108800001', 'Kahar Dg Boko', 'Jeneponto', '1980-08-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6835, '7304082205080001', 'Muh. Fachri', 'Bo\'nia', '2008-05-22', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6943, '7304082304770002', 'Rudi', 'Bontolaya', '1977-04-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6927, '7304082305650001', 'Badong Dg. Limpo', 'Jenepontio', '1963-05-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6934, '7304082306020001', 'Muh. Misba Prayoga Sultan', 'Bo\'nia', '2002-06-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6939, '7304082307880003', 'Rendi Rian', 'Bo\'nia', '1988-07-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6908, '7304082312990001', 'Firdayanti', 'Jeneponto', '1999-01-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6828, '7304082401060001', 'Dandi', 'Bo\'nia', '2006-01-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7029, '7304082401170001', 'Azlam Al- Azzam', 'jeneponto', '2017-01-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6882, '7304082408770001', 'Herma', 'Ujung Pandang', '1977-08-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6997, '7304082409100001', 'Rian', 'Saroanging', '2010-11-19', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6816, '7304082411040001', 'Erwin', 'Bo\'nia', '2004-11-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6852, '7304082412040001', 'Suci', 'Antang', '2004-12-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6936, '7304082503090001', 'Muh. Tri Mukhtar', 'Bo\'nia', '2009-03-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6792, '7304082503950001', 'Heriwardani', 'Kaluku', '1995-03-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6770, '7304082506580001', 'H. Baso Se\'re', 'Jeneponto', '1958-06-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6855, '7304082506690001', 'Syamsuyanti', 'Bo\'nia', '1969-06-25', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6905, '7304082508730002', 'Kamaruddin', 'Jeneponto', '1973-08-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6771, '7304082509910001', 'Abd. Rahman', 'Jeneponto', '1991-09-25', 'laki-laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6822, '7304082511030004', 'Adi Gunawan', 'Bo\'nia', '2003-11-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6902, '7304082607110002', 'Muhammad Riza Syaputra', 'Kalumpang Loe', '2011-07-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6923, '7304082610100002', 'Muh.Zaki Akbar', '', '1970-01-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6990, '7304082611080001', 'Muh. Riflki', 'Bo\'nia', '2005-11-26', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6778, '7304082701530001', 'Jumaseng', 'Lianga', '1953-01-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6920, '7304082703060004', 'Said Agil Al Monawar', 'Jeneponto', '2006-03-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6951, '7304082704540001', 'Mida', 'Bo\'nia', '1954-04-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6986, '7304082705570002', 'Bakkang Dg Rate', 'Je\'neponto', '1957-05-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6799, '7304082706740001', 'Turu', 'Bo\'nia', '1974-06-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6851, '7304082710850001', 'Rosdiana', 'Antang', '1985-10-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6938, '7304082712000001', 'Dedi Arsandi', 'Bo\'nia', '2000-12-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6776, '7304082802000001', 'Jusman', 'Bo\'nia', '2000-02-28', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6834, '7304082812850001', 'Rosmala Dewi', 'Bo\'nia', '1985-12-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6797, '7304082908970001', 'Agus', 'Bo\'nia', '1997-08-29', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6933, '7304083012780002', 'Hasniati', 'Bo\'nia', '1978-12-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6898, '7304083012790001', 'Ruslan Rola', 'Jeneponto', '1979-12-30', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6849, '7304083103110001', 'Muh. Zul Ikram', 'Jeneponto', '2011-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7080, '7304083107000001', 'Ardianto', 'Bo\'nia', '2000-07-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6823, '7304083108760002', 'Safaruddin Dg. Rani', 'Bo\'nia', '1976-08-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6886, '7304083112290019', 'Tahere', 'Bo\'nia', '1929-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6858, '7304083112380001', 'Jarigau Dg. Bundu', 'Bo\'nia', '1958-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6859, '7304083112430001', 'Rukiah', 'Bo\'nia', '1943-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6860, '7304083112780001', 'Rahma', 'Bo\'nia', '1978-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6884, '7304083112980001', 'Muh. Rasul', 'Bo\'nia', '1998-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6915, '7304084102020001', 'Nuralisa', 'Jeneponto', '2002-02-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6892, '7304084102490002', 'Hj. Yummi', 'Jeneponto', '1949-02-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7060, '7304084102990002', 'Rina', 'Bo\'nia', '1999-02-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6904, '7304084105610001', 'Sitti', 'Bo\'nia', '1961-05-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6957, '7304084106090001', 'Nur Al  firah', 'Jeneponto', '2009-06-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6808, '7304084106860001', 'Suarni', 'Bo\'nia', '1986-06-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7039, '7304084107000055', 'Nurfani', 'Jeneponto', '2000-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6966, '7304084107490002', 'Sadaria', 'Bo\'nia', '1949-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6895, '7304084107620043', 'Saribulang', 'Bo\'nia', '1962-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6926, '7304084107840006', 'Hasnah', 'Bo\'nia', '1984-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7016, '7304084109040001', 'Israwati', 'Sungguminasa', '2004-09-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6791, '7304084110740001', 'Sinawati', 'Kaluku', '1974-10-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6803, '7304084203100002', 'Bintang', 'Bo\'nia', '2010-03-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6994, '7304084203420001', 'Sakati', 'Jeneponto', '1942-03-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6978, '7304084207700001', 'Basmi', 'Bontorea', '1970-07-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7055, '7304084209800002', 'Hayati', 'Cambalangkasa', '1980-09-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6781, '7304084211720001', 'Halija', 'Bo\'nia', '1972-11-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7021, '7304084307720002', 'Nia', 'Jeneponto', '1972-07-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7062, '7304084308830001', 'Hj. Nurlaela', 'Bo\'nia', '1983-08-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6963, '7304084403700001', 'Ati', 'Bo\'nia', '1970-03-04', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6991, '7304084403780001', 'Hasnah', 'Jeneponto', '1978-03-04', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6815, '7304084506030002', 'Yulianti', 'Jeneponto', '1999-10-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7011, '7304084506100003', 'Hartina S', 'Bo\'nia', '2010-06-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6899, '7304084506820001', 'Syamsinar', 'Kalumpang Loe', '1970-01-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6812, '7304084507100002', 'Putri Anita', 'Bo\'nia', '2012-07-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7086, '7304084508720005', 'Ria', 'Bo\'nia', '1972-08-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6912, '7304084609720002', 'Sarilu', 'Jeneponto', '1972-09-06', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7012, '7304084709780003', 'Mawati', 'Bo\'nia', '1978-09-07', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7036, '7304084710110001', 'Syahrini', 'Bo\'nia', '2011-10-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6785, '7304084803650001', 'Balaeng', 'Bo\'nia', '1969-03-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6931, '7304084805970002', 'Halima Tussadiyah', 'Kalimantan Timur', '1997-07-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7031, '7304084808930002', 'Irmawati', 'Benrong', '1993-08-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7077, '7304084809930001', 'Fitriani', 'Bo\'nia', '1993-09-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6913, '7304084901940001', 'Nurjanni', 'Jeneponto', '1994-10-09', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7007, '7304084911650001', 'Sitti', 'Bo\'nia', '1965-11-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6814, '7304085002800001', 'Ida', 'Bo\'nia', '1980-02-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6787, '7304085003800001', 'Manci', 'Sarroanging', '1980-03-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6928, '7304085004550001', 'Hj. Nursiah', 'Jenepontio', '1955-04-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7076, '7304085005650001', 'Hj. Hadasiah', 'Bo\'nia', '1965-05-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7017, '7304085008770002', 'Suriani', 'Bo\'nia', '1977-08-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6842, '7304085009550001', 'Pati', 'Jeneponto', '1955-09-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6900, '7304085010020008', 'Oktaviana', 'Kalumpang Loe', '2002-10-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7009, '7304085010780001', 'Sarinang', 'Bo\'nia', '1978-10-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6844, '7304085010900004', 'Nurhayati', 'Lianga', '1990-10-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7068, '7304085101760002', 'Salmawati', 'Jeneponto', '1976-01-11', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6919, '7304085107820003', 'Idawati Dg. Kanang', 'Jeneponto', '1982-07-11', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7045, '7304085112730003', 'Hj. Nurhayati', 'Mombi', '1970-01-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6870, '7304085201600001', 'Pia', 'Jeneponto', '1960-01-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7047, '7304085201600002', 'Rapati', 'Bo\'nia', '1960-01-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6945, '7304085202020002', 'Dini Aminarti', 'Bo\'nia', '2002-02-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6989, '7304085202990001', 'Devi Dwiyanti', 'Bone', '1999-04-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6779, '7304085205550002', 'Sitti', 'Bo\'nia', '1955-05-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6914, '7304085210970002', 'Risal', 'Jeneponto', '1997-10-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7079, '7304085302610001', 'Sayati', 'Mattoanging', '1961-02-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7041, '7304085303690001', 'Suasah', 'Jeneponto', '1969-03-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7054, '7304085303860004', 'Irma', 'Jeneponto', '1986-03-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6850, '7304085304170002', 'Naila Aprilia Humaerah', 'Jeneponto', '2017-04-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6896, '7304085411700001', 'Salma', 'Bo\'nia', '1970-11-14', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6975, '7304085503790002', 'Irmawati', 'Je\'neponto', '1979-03-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6944, '7304085506780001', 'Suriani', 'Bo\'nia', '1978-06-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7015, '7304085512990001', 'Risma Trisnawati', 'Bo\'nia', '1999-12-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7034, '7304085603790002', 'Rabaisa', 'Bonto Parang', '1979-03-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7053, '7304085607840004', 'Sumarni', 'Jeneponto', '1984-07-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6906, '7304085611760001', 'Dahlia', 'Jeneponto', '1976-11-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7032, '7304085708140001', 'Husni Agustina', 'Bo\'nia', '2014-08-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7043, '7304085711020001', 'Nurul Suci', 'Jeneponto', '2002-11-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7046, '7304085711230546', 'Hj. Sannari', 'Bo\'nia', '1930-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6800, '7304085803730001', 'Rindu', 'Bo\'nia', '1973-03-18', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6988, '7304085806740001', 'Samsinar', 'Bo\'nia', '1974-08-18', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7014, '7304085812710001', 'Cia', 'Kindang', '1971-12-18', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6922, '7304085903150001', 'Ainun Thalita Zahra', 'Jeneponto', '2015-03-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6840, '7304085907060001', 'Adelia', 'Jeneponto', '2006-07-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6830, '7304085909740001', 'Harniati', 'Bo\'nia', '1974-09-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6972, '7304085909920001', 'Lina', 'Bo\'nia', '1992-09-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7042, '7304085910950001', 'Nana Marselah', 'Jeneponto', '1995-10-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7020, '7304086003700001', 'Rosdiana', 'Jeneponto', '1970-03-20', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6856, '7304086003990002', 'Sri Mariasti', 'Bo\'nia', '1999-03-20', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7027, '7304086007860001', 'Rasmila', 'jeneponto', '1986-07-20', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6820, '7304086101950001', 'Samsinar', 'Bo\'nia', '1995-01-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7006, '7304086107860002', 'Samsuarni', 'Bo\'nia', '1986-07-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6874, '7304086112870001', 'Samsuanti', 'Bo\'nia', '1987-12-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6783, '7304086201130002', 'Selvina', 'Bo\'nia', '2013-01-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `penduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `jalan`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `no_kk`, `pend_kk`, `pend_terakhir`, `pend_ditempuh`, `pekerjaan`, `status_perkawinan`, `status_dlm_keluarga`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`) VALUES
(7052, '7304086201800001', 'Samsiah', 'Jeneponto', '1980-01-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6811, '7304086206100003', 'Putri Natasyah', 'Bo\'nia', '2010-06-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6862, '7304086208870001', 'Syamsiah', 'Bo\'nia', '1987-08-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6984, '7304086210860002', 'Yulianti,S.Pd', 'Je\'neponto', '1986-10-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6806, '7304086302160001', 'Ira', 'Jeneponto', '2016-02-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6810, '7304086303060001', 'Nur Indayanti', 'Bo\'nia', '2006-03-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6925, '7304086306600001', 'Hj. Karenia', 'Jeneponto', '1960-06-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6956, '7304086307050001', 'Nur Fitrah', 'Jeneponto', '2005-07-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6897, '7304086307880001', 'Rahmi', 'Jenepont', '1988-07-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6916, '7304086404100001', 'Nur Cahya Putri', 'Jeneponto', '2010-04-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7058, '7304086404840003', 'Irma', 'Jeneponto', '1984-04-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6773, '7304086407600001', 'Mina', 'Mattoangin', '1960-07-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6857, '7304086408050002', 'Andini Agustiani', 'Bo\'nia', '2005-08-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6831, '7304086605070001', 'Inka Monika Pratami', 'Bo\'nia', '2007-05-26', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6875, '7304086701000002', 'Lisnawati', 'Bo\'nia', '2000-01-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6917, '7304086701140002', 'Hajra Pratiwi', 'Jeneponto', '2014-01-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6949, '7304086702900003', 'Mariani', 'Bo\'nia', '1990-02-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6955, '7304086706840002', 'Salma', 'Jeneponto', '1984-06-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6901, '7304086802060002', 'Qory Dwita', 'Kalumpang Loe', '2006-02-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6775, '7304086802750001', 'Sarsina', 'Bo\'nia', '1975-02-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7022, '7304086802990002', 'Ani', 'Bo\'nia', '1999-02-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6809, '7304086804020001', 'Marshanda', 'Bo\'nia', '2002-04-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6794, '7304086904070002', 'Hera Wardina', 'Bo\'nia', '2007-04-29', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6998, '7304087003170001', 'Nurul Salsabila', 'Jeneponto', '2017-03-30', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7024, '7304087010760003', 'Bulaeng, A.M.a', 'Jeneponto', '1976-10-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7084, '7304087010920000', 'Ekawati', 'Bo\'nia', '1992-10-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6804, '7304087110120002', 'Rini', 'Bo\'nia', '2012-10-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6999, '7304087112280002', 'Cami', 'Bo\'nia', '1928-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7051, '7304087112440003', 'Basse', 'Jeneponto', '1944-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7000, '7304087112500011', 'Joho', 'Bo\'nia', '1928-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7001, '7304087112530002', 'Kami', 'Bo\'nia', '1953-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6982, '7304087112600018', 'Patimasan', 'Bo\'nia', '1960-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6827, '7304087112690001', 'Salma', 'Karampangpajja', '1969-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6796, '7304087112700023', 'Sari', 'Bo\'nia', '1970-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7002, '7304111505840002', 'Sapiruddin', 'Borongloe', '1984-05-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7004, '7304112011110001', 'Rezaldi', 'Borongloe', '2011-11-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7003, '7304117112850066', 'Lia', 'Makassar', '1985-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7005, '7306073112910052', 'Syarifuddin Syam', 'Bontoa', '1989-07-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6961, '7371070201020007', 'Nandito', 'Jeneponto', '2002-01-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6958, '7371070210750012', 'Rudi', 'Jeneponto', '1975-10-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6960, '7371075503990009', 'Nadilah', 'Jeneponto', '1999-03-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6959, '7371075505800012', 'Hasnah', 'Jeneponto', '1980-05-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(6983, '7371100607830015', 'Nasaruddin,S.Pd', 'Je\'neponto', '1963-07-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7065, '7371102302740015', 'Syamsuddin Itho', 'Makassar', '1974-02-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7050, '7371102903980006', 'Muh.Fadil Dalali', 'Pare-pare', '1970-01-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7049, '7371106108760009', 'Suraidah', 'Jeneponto', '1976-08-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7066, '7371106911760008', 'Karesunggu', 'Jeneponto', '1976-11-29', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(7057, '7371143103820001', 'Achmad Fauzie', 'Jakarta', '1982-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengikut_surat_keterangan_pindah_penduduk`
--

CREATE TABLE `pengikut_surat_keterangan_pindah_penduduk` (
  `id_skpp` int(11) NOT NULL,
  `id_surat_pindah` int(11) NOT NULL,
  `nik_pengikut` varchar(20) NOT NULL,
  `nama_pengikut` varchar(100) DEFAULT NULL,
  `masa_berlaku_ktp` varchar(50) DEFAULT NULL,
  `shdk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengikut_surat_keterangan_pindah_penduduk`
--

INSERT INTO `pengikut_surat_keterangan_pindah_penduduk` (`id_skpp`, `id_surat_pindah`, `nik_pengikut`, `nama_pengikut`, `masa_berlaku_ktp`, `shdk`) VALUES
(1, 17, '212', '', 'wew', 'we'),
(2, 18, 'sdads', '', 'sdasas', 'dssad'),
(3, 18, 'sdsd', '', 'sdds', 'sdasd'),
(4, 19, 'sdssd', '', 'sddsa', 'dsadas'),
(5, 20, 'sssd', 'sddsa', 'sdsad', 'sds'),
(6, 21, 'sdsad', 'sdds', 'sdsd', 'sdsd'),
(7, 21, 'sdsda', 'sddsa', 'dss', 'ssda');

-- --------------------------------------------------------

--
-- Table structure for table `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id_profil_desa` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_telpon` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` varchar(50) NOT NULL,
  `wa_admin` varchar(25) NOT NULL,
  `ttd_digital` varchar(350) DEFAULT NULL,
  `gambar_kop` varchar(350) DEFAULT NULL,
  `logo_desa` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_desa`
--

INSERT INTO `profil_desa` (`id_profil_desa`, `nama_desa`, `alamat`, `no_telpon`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `wa_admin`, `ttd_digital`, `gambar_kop`, `logo_desa`) VALUES
(1, 'Kelurahan Pallengu', 'Alamat : Bontosunggu Utara Desa Bungungloe Kec. Turatea Kabupaten Jeneponto', '', 'Kecamatan Binamu', 'Kabupaten Jeneponto', 'Sulawesi Selatan', '', '85796000009', 'barcode.png', 'DEDIG_ID_Logo.png', 'Logo_Jeneponto.png');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan`
--

CREATE TABLE `surat_keterangan` (
  `id_sk` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `keperluan` varchar(250) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan`
--

INSERT INTO `surat_keterangan` (`id_sk`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(169, 'Surat Keterangan', '04/SK/KODE-DESA/VI/2025', '7304080811110001', 167, 'Nostrum et velit ame', '2025-06-21 21:42:36', 2, 'SELESAI', 1),
(171, 'Surat Keterangan', '012/SKJOSKU/WOOW/VI/2025', '7304080506770003', 409, 'Labore et quas velit', '2025-06-29 16:16:40', 2, 'SELESAI', 1),
(173, 'Surat Keterangan', 'SK/001/MANTAP/VII/2025', '7304081310030001', 484, 'PENDAFTARAN', '2025-07-01 23:46:33', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_beda_identitas`
--

CREATE TABLE `surat_keterangan_beda_identitas` (
  `id_skbi` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_beda_identitas`
--

INSERT INTO `surat_keterangan_beda_identitas` (`id_skbi`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `perbedaan`, `nama_kartu_identitas`, `nama_no_identitas`, `nama2`, `tgl_lahir2`, `jenis_kelamin2`, `alamat2`, `agama2`, `pekerjaan2`, `keterangan2`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(34, 'Surat Keterangan Beda Identitas', '04/SKBI/KODE-DESA/VI/2025', '7304080811110001', 168, 'Quo ipsa in dolorem', 'Enim laboris aperiam', 'Fugit pariatur Lab', 'Ullamco omnis delect', 'Quis quo nulla quam ', 'Perempuan', 'Aute consequatur do', 'Non veritatis explic', 'Do vel et ullam opti', 'Ipsam eos doloribus ', '2025-06-21 21:42:43', 2, 'SELESAI', 1),
(36, 'Surat Keterangan Beda Identitas', '012/SKBI/MANTAP/VI/2025', '7304080506770003', 410, 'Labore ut voluptatem', 'Ratione nihil eligen', 'Dolor perferendis id', 'Vero et cupiditate i', 'Sed alias consectetu', 'Laki-Laki', 'Corporis sed magni n', 'Sint mollitia molest', 'Repudiandae ut quis ', 'Maxime reiciendis om', '2025-06-29 20:09:12', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_beda_identitas_kis`
--

CREATE TABLE `surat_keterangan_beda_identitas_kis` (
  `id_skbis` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_beda_identitas_kis`
--

INSERT INTO `surat_keterangan_beda_identitas_kis` (`id_skbis`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `keperluan`, `no_kartu`, `nama_di_kartu`, `nik2`, `alamat2`, `tanggal_lahir`, `faskes_tingkat`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(37, 'Surat Keterangan Beda Identitas KIS', '04/SKBIS/KODE-DESA/VI/2025', '7304080811110001', 169, 'Laboris officiis lab', 'Commodi magna volupt', 'Sequi quo et est al', 'Voluptatum possimus', 'Porro blanditiis dol', '0000-00-00', 'Ea duis et rerum dol', '2025-06-21 21:42:51', 2, 'SELESAI', 1),
(38, 'Surat Keterangan Beda Identitas KIS', '024/SKBIK/SANGAT MEMBANTU/VI/2025', '7304080506770003', 411, 'Consequatur ipsa la', 'Molestiae eiusmod in', 'Sed vitae natus prov', 'Dolore in dolores ex', 'Magni nihil earum pr', '0000-00-00', 'Iste inventore volup', '2025-06-29 09:13:10', 2, 'SELESAI', 1),
(39, 'Surat Keterangan Beda Identitas KIS', 'SKBIK/001/MANTAP/VII/2025', '7304080506770003', 458, 'Voluptate minima aut', 'Quidem ipsum nisi e', 'Qui ex velit quia mi', 'Quis fugiat corrupti', 'Et aut ex qui dolore', '0000-00-00', 'Ut quia excepturi pr', '2025-07-01 23:43:17', 2, 'SELESAI', 1),
(40, 'Surat Keterangan Beda Identitas KIS', 'SKBIK/002/MANTAP/VII/2025', '7304053112900229', 485, 'r', 're', 'df', 'etr', 'dsf', '2025-07-02', 'rer', '2025-07-02 00:02:43', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_belum_terbit_sppt_pbb`
--

CREATE TABLE `surat_keterangan_belum_terbit_sppt_pbb` (
  `id_skbtsp` int(11) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `lokasi` varchar(250) NOT NULL,
  `tanah_utara` text NOT NULL,
  `tanah_timur` text NOT NULL,
  `tanah_selatan` text NOT NULL,
  `tanah_barat` text NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` enum('PENDING','SELESAI') NOT NULL DEFAULT 'PENDING',
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_belum_terbit_sppt_pbb`
--

INSERT INTO `surat_keterangan_belum_terbit_sppt_pbb` (`id_skbtsp`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `lokasi`, `tanah_utara`, `tanah_timur`, `tanah_selatan`, `tanah_barat`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(3, 'Surat Keterangan Belum Terbit SPPT PBB', '04/SKBTSP/KODE-DESA/VI/2025', '7304053112900229', 290, 'Dusun Bonton Desa Bonto Manani Kabupate Jeneponto', 'tanah mlik badullah', 'tanah mlik ronaldo', 'tanah mlik sipato', 'tanah mlik essi', '2025-06-27 09:08:59', 2, 'SELESAI', 1),
(4, 'Surat Keterangan Belum Terbit SPPT PBB', '05/SKBTSP/KODE-DESA/VI/2025', '7304081310030001', 291, 'Dusun Bonton Desa Bonto Manani Kabupate Jeneponto', 'tanah mlik badullah', 'tanah mlik ronaldo', 'tanah mlik sipato', 'tanah mlik essi', '2025-06-27 13:06:49', 2, 'SELESAI', 1),
(6, 'Surat Keterangan Belum Terbit SPPT PBB', 'SKBTSP/020/WOOW/VI/2025', '7304080506770003', 459, 'Voluptas irure Nam i', 'Occaecat sunt aut do', 'Incididunt est ad re', 'Est maiores fugiat ', 'Est corporis maxime', '2025-06-29 19:07:20', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_berkelakuan_baik`
--

CREATE TABLE `surat_keterangan_berkelakuan_baik` (
  `id_skbb` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_berkelakuan_baik`
--

INSERT INTO `surat_keterangan_berkelakuan_baik` (`id_skbb`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(22, 'Surat Keterangan Berkelakuan Baik', '04/SKBB/KODE-DESA/VI', '7304080811110001', 170, 'Repudiandae eum quae', '2025-06-21 21:42:58', 2, 'SELESAI', 1),
(24, 'Surat Keterangan Berkelakuan Baik', '05/SKBB/KODE-DESA/VI', '7304053112900229', 270, 'MELAMAR KERJA', '2025-06-26 07:04:34', 2, 'SELESAI', 1),
(25, 'Surat Keterangan Berkelakuan Baik', 'SKBB/001/MANTAP/VII/', '7304080506770003', 460, 'In pariatur Quo eni', '2025-07-01 23:44:52', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_domisili`
--

INSERT INTO `surat_keterangan_domisili` (`id_skd`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(106, 'Surat Keterangan Domisili', '04/SKD/KODE-DESA/VI/2025', '7304080811110001', 171, '2025-06-21 21:43:04', 2, 'SELESAI', 1),
(107, 'Surat Keterangan Domisili', '05/SKD/KODE-DESA/VI/2025', '7304082511030004', 197, '2025-06-22 09:03:12', 2, 'SELESAI', 1),
(108, 'Surat Keterangan Domisili', '06/SKD/KODE-DESA/VI/2025', '7304053112900229', 202, '2025-06-22 22:31:16', 2, 'SELESAI', 1),
(109, 'Surat Keterangan Domisili', '07/SKD/KODE-DESA/VI/2025', '7304080811110001', 203, '2025-06-23 17:26:53', 2, 'SELESAI', 1),
(110, 'Surat Keterangan Domisili', '08/SKD/KODE-DESA/VI/2025', '7304053112900229', 220, '2025-06-23 21:06:15', 2, 'SELESAI', 1),
(111, 'Surat Keterangan Domisili', '09/SKD/KODE-DESA/VI/2025', '7304053112900229', 221, '2025-06-23 21:07:59', 2, 'SELESAI', 1),
(112, 'Surat Keterangan Domisili', '10/SKD/KODE-DESA/VI/2025', '7304053112900229', 230, '2025-06-24 00:17:39', 2, 'SELESAI', 1),
(122, 'Surat Keterangan Domisili', '12/SKD/KODE-DESA/VI/2025', '7304053112900229', 262, '2025-06-26 01:41:50', 1, 'SELESAI', 1),
(123, 'Surat Keterangan Domisili', '13/SKD/KODE-DESA/VI/2025', '7304053112900229', 263, '2025-06-26 01:47:19', 2, 'SELESAI', 1),
(126, 'Surat Keterangan Domisili', '14/SKD/KODE-DESA/VI/2025', '7304053112900229', 269, '2025-06-26 07:04:29', 2, 'SELESAI', 1),
(127, 'Surat Keterangan Domisili', '001/SKD/KODE-DS/VI/2025', '7304053112900229', 293, '2025-06-27 19:56:32', 2, 'SELESAI', 1),
(129, 'Surat Keterangan Domisili', '017/SKD/SANGAT MEMBANTU/VI/2025', '7304080505650001', 382, '2025-06-28 20:16:51', 2, 'SELESAI', 1),
(131, 'Surat Keterangan Domisili', 'SKD/017/MANTAP/VI/2025', '7304080506770003', 418, '2025-06-29 20:21:22', 1, 'SELESAI', 1),
(132, 'Surat Keterangan Domisili', 'SKD/018/MANTAP/VII/2025', '7304081310030001', 483, '2025-07-01 23:44:55', 1, 'SELESAI', 1),
(133, 'Surat Keterangan Domisili', NULL, '7304081310030001', 489, '2025-07-03 00:52:30', NULL, 'PENDING', 1),
(134, 'Surat Keterangan Domisili', NULL, '7304081310030001', 490, '2025-07-03 00:53:44', NULL, 'PENDING', 1),
(135, 'Surat Keterangan Domisili', NULL, '7304081207150002', 491, '2025-07-03 00:54:11', NULL, 'PENDING', 1),
(136, 'Surat Keterangan Domisili', NULL, '7304081310030001', 492, '2025-07-03 00:56:22', NULL, 'PENDING', 1),
(137, 'Surat Keterangan Domisili', NULL, '7304053112900229', 493, '2025-07-03 01:06:00', NULL, 'PENDING', 1),
(138, 'Surat Keterangan Domisili', NULL, '7304053112900229', 494, '2025-07-03 01:09:19', NULL, 'PENDING', 1),
(139, 'Surat Keterangan Domisili', NULL, '7304053112900229', 495, '2025-07-03 01:10:40', NULL, 'PENDING', 1),
(140, 'Surat Keterangan Domisili', NULL, '7304053112900229', 496, '2025-07-03 01:13:13', NULL, 'PENDING', 1),
(141, 'Surat Keterangan Domisili', NULL, '7304053112900229', 497, '2025-07-03 01:14:07', NULL, 'PENDING', 1),
(142, 'Surat Keterangan Domisili', NULL, '7304053112900229', 498, '2025-07-03 01:16:38', NULL, 'PENDING', 1),
(143, 'Surat Keterangan Domisili', NULL, '7304053112900229', 499, '2025-07-03 01:17:44', NULL, 'PENDING', 1),
(144, 'Surat Keterangan Domisili', NULL, '7304053112900229', 521, '2025-07-03 03:09:06', NULL, 'PENDING', 1),
(145, 'Surat Keterangan Domisili', NULL, '7304053112900229', 524, '2025-07-03 03:13:07', NULL, 'PENDING', 1),
(146, 'Surat Keterangan Domisili', NULL, '7304053112900229', 527, '2025-07-03 03:34:12', NULL, 'PENDING', 1),
(147, 'Surat Keterangan Domisili', NULL, '7304081303910003', 528, '2025-07-03 03:55:13', NULL, 'PENDING', 1),
(148, 'Surat Keterangan Domisili', NULL, '7304053112900229', 529, '2025-07-03 06:26:39', NULL, 'PENDING', 1),
(149, 'Surat Keterangan Domisili', NULL, '7304081310030001', 531, '2025-07-03 07:04:44', NULL, 'PENDING', 1),
(150, 'Surat Keterangan Domisili', NULL, '7304081207150002', 532, '2025-07-03 07:05:27', NULL, 'PENDING', 1),
(151, 'Surat Keterangan Domisili', NULL, '7304080107740003', 533, '2025-07-03 07:14:52', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_domisili_usaha`
--

CREATE TABLE `surat_keterangan_domisili_usaha` (
  `id_skdu` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `jenis_usaha` varchar(50) NOT NULL,
  `alamat_usaha` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_domisili_usaha`
--

INSERT INTO `surat_keterangan_domisili_usaha` (`id_skdu`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `jenis_usaha`, `alamat_usaha`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(54, 'Surat Keterangan Domisili Usaha', '04/SKDU/KODE-DESA/VI/2025', '7304080811110001', 172, 'Lorem in est unde q', 'Animi omnis elit q', '2025-06-21 21:43:11', 2, 'SELESAI', 1),
(55, 'Surat Keterangan Domisili Usaha', 'SKDU/008/MANTAP/VI/2025', '7304080506770003', 417, 'Iusto mollitia delen', 'Nihil ducimus dolor', '2025-06-29 19:25:40', 2, 'SELESAI', 1),
(56, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 500, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 01:23:51', NULL, 'PENDING', 1),
(57, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 501, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 01:30:33', NULL, 'PENDING', 1),
(58, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 502, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 01:32:05', NULL, 'PENDING', 1),
(59, 'Surat Keterangan Domisili Usaha', NULL, '7304084506030002', 503, 'ss', 'JL. KUMALA BALANG BERU', '2025-07-03 01:33:29', NULL, 'PENDING', 1),
(60, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 504, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 01:35:55', NULL, 'PENDING', 1),
(61, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 505, 'f', 'sdf', '2025-07-03 01:45:57', NULL, 'PENDING', 1),
(62, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 506, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 01:58:11', NULL, 'PENDING', 1),
(63, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 507, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 02:04:13', NULL, 'PENDING', 1),
(64, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 508, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 02:07:29', NULL, 'PENDING', 1),
(65, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 509, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 02:09:57', NULL, 'PENDING', 1),
(66, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 510, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 02:19:27', NULL, 'PENDING', 1),
(67, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 511, 'jenis', 'BONTOSUNGGU', '2025-07-03 02:19:44', NULL, 'PENDING', 1),
(68, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 512, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 02:29:06', NULL, 'PENDING', 1),
(69, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 513, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 02:29:40', NULL, 'PENDING', 1),
(70, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 514, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 02:31:41', NULL, 'PENDING', 1),
(71, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 515, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 02:42:40', NULL, 'PENDING', 1),
(72, 'Surat Keterangan Domisili Usaha', NULL, '7304080506770003', 516, 'Asperiores ullam com', 'Vel fugit aut offic', '2025-07-03 02:43:44', NULL, 'PENDING', 1),
(73, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 518, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 02:59:59', NULL, 'PENDING', 1),
(74, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 523, 's', 'sf', '2025-07-03 03:09:54', NULL, 'PENDING', 1),
(75, 'Surat Keterangan Domisili Usaha', NULL, '7304053112900229', 530, 'jenis', 'JL. KUMALA BALANG BERU', '2025-07-03 06:28:49', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_jual_beli`
--

CREATE TABLE `surat_keterangan_jual_beli` (
  `id_skjb` int(11) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `nik2` varchar(20) DEFAULT NULL,
  `nama2` varchar(100) DEFAULT NULL,
  `tempat_tgl_lahir2` varchar(100) DEFAULT NULL,
  `pekerjaan2` varchar(100) DEFAULT NULL,
  `alamat2` text DEFAULT NULL,
  `yang_diperjualbelikan` text DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `informasi_objek` text DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `tahun_jual_beli` varchar(10) DEFAULT NULL,
  `tanah_utara` varchar(255) DEFAULT NULL,
  `tanah_timur` varchar(255) DEFAULT NULL,
  `tanah_selatan` varchar(255) DEFAULT NULL,
  `tanah_barat` varchar(255) DEFAULT NULL,
  `saksi1` varchar(100) NOT NULL,
  `saksi2` varchar(100) DEFAULT NULL,
  `saksi3` varchar(100) DEFAULT NULL,
  `saksi4` varchar(100) DEFAULT NULL,
  `nama_dusun` varchar(100) DEFAULT NULL,
  `kepala_dusun` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` enum('PENDING','SELESAI') NOT NULL DEFAULT 'PENDING',
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_jual_beli`
--

INSERT INTO `surat_keterangan_jual_beli` (`id_skjb`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `nik2`, `nama2`, `tempat_tgl_lahir2`, `pekerjaan2`, `alamat2`, `yang_diperjualbelikan`, `lokasi`, `informasi_objek`, `harga`, `tahun_jual_beli`, `tanah_utara`, `tanah_timur`, `tanah_selatan`, `tanah_barat`, `saksi1`, `saksi2`, `saksi3`, `saksi4`, `nama_dusun`, `kepala_dusun`, `keterangan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(1, 'Surat Keterangan Jual Beli', '04/SKJB/KODE-DESA/VI/2025', '7304080506770003', 283, 'Error occaecat tenet', 'Perferendis fugiat ', 'Voluptate recusandae', 'Sunt corrupti natu', 'Sequi voluptatem cu', 'Omnis obcaecati arch', 'Eos et veritatis pos', 'Ea dolor dolorem vol', '250,000,000', 'Tenetur is', 'Rem aspernatur ipsa', 'In aliquip iste exer', 'Voluptatum anim vel ', 'Doloremque consectet', 'Optio rerum et exce', 'Incididunt libero di', '', '', 'Voluptates consequun', 'Beatae lorem delenit', 'Apabila di kemudian hari, ternyata keluarga, anak cucu kami menggugat lokasi hak milik yang sudah kami jual, dan atau ada pihak lain yang menggugat dan atau dalam pemberian keterangan jual beli ini tidak benar maka saya / kami selaku penjual atau pembeli siap mempertanggung jawabkan sesuai peraturan perundang-undangan yang berlaku. Dalam surat keterangan jual beli ini kami kedua belah pihak bersepakat bahwa surat keterangan dapat di pergunakan dalam pengurusan Akte jual Beli / Balik Nama ke notaris atau pejabat pembuat Akte Tanah (PPAT), Tanpa menghadirkan pihak penjual ( Foto copy KTP Pihak penjual terlampir ).', '2025-06-26 15:31:49', 2, 'SELESAI', 1),
(2, 'Surat Keterangan Jual Beli', '05/SKJB/KODE-DESA/VI/2025', '7304053112900229', 284, 'dffd', 'dd', 'df', 'df', 'PAK KUSNADI TOMPO', 'dsffd', 'dfd', 'dfsfd', '9,500,000', 'ddffd', '', '', '', '', 'PAK KUSNADI TOMPO', 'PAK KUSNADI TOMPO', 'PAK KUSNADI TOMPO', 'PAK KUSNADI TOMPO', 'PAK KUSNADI TOMPO', 'PAK KUSNADI TOMPO', 'Apabila di kemudian hari, ternyata keluarga, anak cucu kami menggugat lokasi hak milik yang sudah kami jual, dan atau ada pihak lain yang menggugat dan atau dalam pemberian keterangan jual beli ini tidak benar maka saya / kami selaku penjual atau pembeli siap mempertanggung jawabkan sesuai peraturan perundang-undangan yang berlaku. Dalam surat keterangan jual beli ini kami kedua belah pihak bersepakat bahwa surat keterangan dapat di pergunakan dalam pengurusan Akte jual Beli / Balik Nama ke notaris atau pejabat pembuat Akte Tanah (PPAT), Tanpa menghadirkan pihak penjual ( Foto copy KTP Pihak penjual terlampir ).', '2025-06-26 15:55:20', 2, 'SELESAI', 1),
(3, 'Surat Keterangan Jual Beli', '022/SKJB/MANTAP/VI/2025', '7304080506770003', 461, 'Est quis tempora eni', 'Id enim qui autem la', 'Ea est consequat In', 'Possimus rem eum ut', 'Elit sint voluptate', 'Ut incidunt adipisc', 'Pariatur In rerum a', 'Excepturi iste ullam', '11', 'Voluptatum', 'Beatae elit alias m', 'Et officiis ratione ', 'Cupidatat dolor iust', 'Sunt consequatur M', 'Qui quis do id volup', '', '', '', 'Distinctio Harum in', 'Qui vitae voluptate ', 'Reiciendis deleniti ', '2025-06-29 20:50:44', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_kematian`
--

CREATE TABLE `surat_keterangan_kematian` (
  `id_skk` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_kematian`
--

INSERT INTO `surat_keterangan_kematian` (`id_skk`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `tanggal_meninggal`, `bertempat_di`, `penyebab_kematian`, `nama_pelapor`, `nik_pelapor`, `tanggal_lahir_pelapor`, `pekerjaan_pelapor`, `alamat_pelapor`, `hubungan_pelapor`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(45, 'Surat Keterangan Kematian', '001/SKK/KODE-DESA/VI/2025', '7304080811110001', 173, 'Ipsum in quia volupt', 'Dolores a labore lab', 'Velit expedita enim ', 'Enim aliqua Cumque ', 'Ea nulla sint odit l', 'Autem ducimus verit', 'Illo et in molestiae', 'Quo est temporibus ', 'Consequatur quia au', '2025-06-21 21:43:18', 2, 'SELESAI', 1),
(46, 'Surat Keterangan Kematian', '999/001/MANTAP/VI/2025', '7304080811110001', 462, 'Molestiae consequat', 'Dicta rerum illo min', 'Voluptatibus a volup', 'Vel exercitation qua', 'Aut consectetur dele', 'Aliquid rem qui tota', 'Aliquid nesciunt re', 'Aliquip debitis qui ', 'Laborum Neque aut d', '2025-06-29 21:27:38', 2, 'SELESAI', 1),
(47, 'Surat Keterangan Kematian', '999/002/MANTAP/VI/2025', '7304080506770003', 482, 'Sit consequatur comm', 'Delectus officia cu', 'Rerum provident fug', 'Dolor reprehenderit ', 'Eius architecto enim', 'Quia voluptatibus au', 'Anim lorem ipsa ab ', 'Esse nisi doloremque', 'Ducimus voluptatum ', '2025-06-29 21:28:18', 2, 'SELESAI', 1),
(48, 'Surat Keterangan Kematian', NULL, '7304053112900229', 526, 'fd', 'gf', 'fd', 'fd', 'fg', 'fd', 'f', 'fd', 'fd', '2025-07-03 03:22:01', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_kematian_dan_penguburan`
--

CREATE TABLE `surat_keterangan_kematian_dan_penguburan` (
  `id_skkp` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `hari_tanggal_kematian` varchar(100) NOT NULL,
  `jam_pukul` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `hari_tanggal_dikebumikan` varchar(100) NOT NULL,
  `jam_pukul_dikebumikan` varchar(100) NOT NULL,
  `tempat_dikebumikan` varchar(250) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_kematian_dan_penguburan`
--

INSERT INTO `surat_keterangan_kematian_dan_penguburan` (`id_skkp`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `hari_tanggal_kematian`, `jam_pukul`, `tempat`, `hari_tanggal_dikebumikan`, `jam_pukul_dikebumikan`, `tempat_dikebumikan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(6, 'Surat Keterangan Kematian dan Penguburan', '001/SKKP/KODE-DESA/VI/2025', '7304080107740003', 193, 'sas', 'ds', 'sadsad', 'sdasd', 'sddasadsad', 'sdasd', '2025-06-21 22:21:35', 2, 'SELESAI', 1),
(7, 'Surat Keterangan Kematian dan Penguburan', '011/SKKDP/KUE-BOLU/VI/2025', '7304080505650001', 390, 'Ullam libero cumque ', 'Dolores porro pariat', 'Rem sit molestias di', 'Ea impedit accusamu', 'In necessitatibus du', 'Magnam sed earum rep', '2025-06-28 10:47:19', 1, 'SELESAI', 1),
(10, 'Surat Keterangan Kematian dan Penguburan', 'SKKP/001/MANTAP/VII/2025', '7304080506770003', 463, 'Esse consectetur n', 'Sunt at perferendis ', 'Sit voluptas vero qu', 'Est qui pariatur E', 'Quis quo in labore l', 'Molestias nesciunt ', '2025-07-01 23:45:13', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--

CREATE TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor` (
  `id_skkkb` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--

INSERT INTO `surat_keterangan_kepemilikan_kendaraan_bermotor` (`id_skkkb`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `roda`, `merk_type`, `jenis_model`, `tahun_pembuatan`, `cc`, `warna_cat`, `no_rangka`, `no_mesin`, `no_polisi`, `no_bpkb`, `atas_nama_pemilik`, `alamat_pemilik`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(16, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '04/SKKKB/KODE-DESA/VI/2025', '7304080811110001', 174, '', 'Veniam sint ad veli', 'Reiciendis rerum eli', 'Aperiam pariatur Ni', 'Saepe dignissimos mo', 'Ipsum debitis nisi ', 'Anim id at est con', 'Esse aliquam impedi', 'Non vitae voluptatum', 'Voluptatem asperiore', 'Quibusdam ullamco au', 'Esse animi asperna', 'Est adipisicing sit', '2025-06-21 21:43:28', 2, 'SELESAI', 1),
(17, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '05/SKKKB/KODE-DESA/VI/2025', '7304053112900229', 271, '', 'ds', 'sad', 'sd', 'sd', 'sd', 'sd', 'sd', 'sd', 'ds', 'ds', 'ds', 'dsa', '2025-06-26 07:04:47', 2, 'SELESAI', 1),
(18, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', 'SKKKB/019/WOOW/VI/2025', '7304080506770003', 464, '', 'Debitis qui optio e', 'Velit minima in expe', 'Amet officia ducimu', 'Magna iusto nulla te', 'Illum commodi qui e', 'Ex veniam consectet', 'Quis obcaecati assum', 'Corporis ut officia ', 'Et dolor explicabo ', 'Non sed repellendus', 'Exercitationem ut ex', 'Nulla id voluptates ', '2025-06-29 19:06:36', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_mahar_sunrang`
--

CREATE TABLE `surat_keterangan_mahar_sunrang` (
  `id_skm` int(11) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `mahar` varchar(250) NOT NULL,
  `tempat_mahar` varchar(250) NOT NULL,
  `tanah_utara` mediumtext NOT NULL,
  `tanah_timur` mediumtext NOT NULL,
  `tanah_selatan` mediumtext NOT NULL,
  `tanah_barat` mediumtext NOT NULL,
  `orang_tua` varchar(150) NOT NULL,
  `tempat_tgl_lahir2` varchar(150) NOT NULL,
  `alamat2` mediumtext NOT NULL,
  `perempuan` varchar(150) NOT NULL,
  `tempat_tgl_lahir3` varchar(150) NOT NULL,
  `alamat3` mediumtext NOT NULL,
  `saksi1` varchar(150) NOT NULL,
  `saksi2` varchar(150) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` enum('PENDING','SELESAI') NOT NULL DEFAULT 'PENDING',
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_mahar_sunrang`
--

INSERT INTO `surat_keterangan_mahar_sunrang` (`id_skm`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `mahar`, `tempat_mahar`, `tanah_utara`, `tanah_timur`, `tanah_selatan`, `tanah_barat`, `orang_tua`, `tempat_tgl_lahir2`, `alamat2`, `perempuan`, `tempat_tgl_lahir3`, `alamat3`, `saksi1`, `saksi2`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(1, 'Surat Keterangan Mahar Sunrang', '04/SKJB/KODE-DESA/VI/2025', '7304053112900229', 253, 'df', 'df', 'df', 'dfdf', 'dfs', 'df', 'df', 'dfs', 'df', 'df', 'df', 'dfs', 'dfs', 'dfs', '2025-06-25 20:04:16', 2, 'SELESAI', 1),
(3, 'Surat Keterangan Mahar Sunrang', '019/SKMS/SANGAT MEMBANTU/VI/2025', '7304080506770003', 395, 'Et ut fuga Et dolor', 'Amet ex non esse om', 'Quasi ipsum sed off', 'Id maiores est des', 'Enim cillum ipsum iu', 'Iusto et sapiente li', 'Sunt ratione nemo ve', 'Ut accusamus impedit', 'Praesentium eos id', 'Et sapiente elit ut', 'Sit sunt quisquam a', 'Qui itaque asperiore', 'Odio at ex commodi v', 'Occaecat exercitatio', '2025-06-28 20:59:02', 2, 'SELESAI', 1),
(4, 'Surat Keterangan Mahar Sunrang', '028/SKMS/BARU/VI/2025', '7304080506770003', 412, 'Numquam minim est l', 'Deserunt in placeat', 'Aliquid sit voluptat', 'Non sed rerum sed la', 'Dolorum asperiores a', 'Qui doloribus volupt', 'Facere molestias ame', 'Minim excepturi fugi', 'Tempor et qui vero l', 'Rerum ut ex qui assu', 'Dolorem ad aliquam e', 'Molestias sit facili', 'Expedita Nam laborum', 'Dolorem commodo anim', '2025-06-29 10:02:25', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_pengantar`
--

CREATE TABLE `surat_keterangan_pengantar` (
  `id_skp` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `keperluan` varchar(50) NOT NULL,
  `berlaku` varchar(20) NOT NULL,
  `golongan_darah` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_pengantar`
--

INSERT INTO `surat_keterangan_pengantar` (`id_skp`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `keperluan`, `berlaku`, `golongan_darah`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(60, 'Surat Keterangan Pengantar', '005/SKP/KODE-DESA/VII/2025', '7304080811110001', 175, 'Dolorum recusandae ', '1 Hari', 'Totam voluptates tot', '2025-06-21 21:43:35', 2, 'SELESAI', 1),
(61, 'Surat Keterangan Pengantar', '06/SKP/KODE-DESA/VII/2025', '7304080506770003', 184, 'Voluptatibus perspic', '30 Hari', 'Sint quod eu quaera', '2025-06-21 21:52:22', 2, 'SELESAI', 1),
(62, 'Surat Keterangan Pengantar', '07/SKP/KODE-DESA/VII/2025', '7304080811110001', 185, 'Autem eos et nemo s', '3 Hari', 'Aliquam fuga Velit ', '2025-06-21 21:53:29', 2, 'SELESAI', 1),
(63, 'Surat Keterangan Pengantar', '08/SKP/KODE-DESA/VII/2025', '7371143103820001', 186, 'Aliqua Velit labor', '1 Hari', 'Laborum eiusmod vel ', '2025-06-21 21:55:22', 2, 'SELESAI', 1),
(64, 'Surat Keterangan Pengantar', '09/SKP/KODE-DESA/VII/2025', '7304080808090002', 187, 'Officia rerum qui si', '3 Hari', 'Consequatur Tempori', '2025-06-21 21:55:30', 2, 'SELESAI', 1),
(65, 'Surat Keterangan Pengantar', '10/SKP/KODE-DESA/VII/2025', '7304084207700001', 188, 'Tempor ut quasi ea s', '-', 'Provident inventore', '2025-06-21 21:55:39', 2, 'SELESAI', 1),
(66, 'Surat Keterangan Pengantar', '011/SKP/KODE-DESA/VI/2025', '7304085907060001', 189, 'Ut qui aperiam sit m', '7 Hari', 'Distinctio Ducimus', '2025-06-21 21:58:12', 2, 'SELESAI', 1),
(67, 'Surat Keterangan Pengantar', '12/SKP/KODE-DESA/VI/2025', '7304080705020001', 190, 'Molestiae reprehende', '7 Hari', 'Voluptatibus natus q', '2025-06-21 22:07:52', 2, 'SELESAI', 1),
(68, 'Surat Keterangan Pengantar', '13/SKP/KODE-DESA/VI/2025', '7371143103820001', 219, 'MELAMAR KERJA', '7 Hari', 'B', '2025-06-23 20:08:13', 1, 'SELESAI', 1),
(69, 'Surat Keterangan Pengantar', '14/SKP/KODE-DESA/VI/2025', '7304053112900229', 272, 'asd', '30 Hari', 'daads', '2025-06-26 07:04:57', 2, 'SELESAI', 1),
(70, 'Surat Keterangan Pengantar', '013/SKP/WOOW/VI/2025', '7304080506770003', 465, 'Eos molestias pariat', '', 'In quo pariatur Ita', '2025-06-29 16:56:04', 1, 'SELESAI', 1),
(71, 'Surat Keterangan Pengantar', '014/SKPBERLAKU/WOOW/VI/2025', '7304080506770003', 466, 'Aliquip incididunt e', '30 Hari', 'Possimus qui incidu', '2025-06-29 16:59:30', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_pengantar_rujuk_atau_cerai`
--

CREATE TABLE `surat_keterangan_pengantar_rujuk_atau_cerai` (
  `id_skrc` int(11) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `bin` varchar(250) NOT NULL,
  `nama2` varchar(250) NOT NULL,
  `binti2` varchar(250) NOT NULL,
  `tempat_tgl_lahir2` varchar(250) NOT NULL,
  `kewarganegaraan2` varchar(250) NOT NULL,
  `agama2` varchar(250) NOT NULL,
  `pekerjaan2` varchar(250) NOT NULL,
  `alamat2` varchar(250) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(20) NOT NULL DEFAULT 'PENDING',
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_pengantar_rujuk_atau_cerai`
--

INSERT INTO `surat_keterangan_pengantar_rujuk_atau_cerai` (`id_skrc`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `bin`, `nama2`, `binti2`, `tempat_tgl_lahir2`, `kewarganegaraan2`, `agama2`, `pekerjaan2`, `alamat2`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(1, 'Surat Keterangan Pengantar Rujuk Atau Cerai', '001/SKPRC/KODE-DESA/VI/2025', '7304053112900229', 233, 'dsfdsdf', 'dfsd', 'dfdsfds', 'ddssf', 'WNI', 'Islam', 'dsdf', 'dsfsfdsdf', '2025-06-24 07:51:10', 2, 'SELESAI', 1),
(2, 'Surat Keterangan Pengantar Rujuk Atau Cerai', '015/SKPRC/SANGAT MEMBANTU/VI/2025', '7304080506770003', 397, 'Quas debitis expedit', 'Dolor eum perspiciat', 'Ullamco veniam ut v', 'Facere reiciendis om', 'WNA', 'Konghucu', 'Velit eos quasi aut', 'Quis quia officia es', '2025-06-28 11:30:11', 1, 'SELESAI', 1),
(3, 'Surat Keterangan Pengantar Rujuk Atau Cerai', '016/SKPRC/SANGAT MEMBANTU/VI/2025', '7304081303910003', 401, 'Nama Bin', 'ds', 'dfdsfds', 'jenepoonto / 12 juni 1966', 'WNI', 'Konghucu', 'df', 'adsad', '2025-06-28 19:49:22', 2, 'SELESAI', 1),
(4, 'Surat Keterangan Pengantar Rujuk Atau Cerai', '501/SKPRC/MANTAP/VI/2025', '7304080506770003', 467, 'Reiciendis cupidatat', 'Eos sequi illum obc', 'Ad rerum magni enim ', 'Aperiam porro volupt', 'WNA', 'Katolik', 'Fuga Fugit aliquam', 'Quia dolorem quaerat', '2025-06-29 20:36:15', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_penghasilan_orang_tua`
--

CREATE TABLE `surat_keterangan_penghasilan_orang_tua` (
  `id_skpot` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_penghasilan_orang_tua`
--

INSERT INTO `surat_keterangan_penghasilan_orang_tua` (`id_skpot`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `nomor_induk_siswa`, `jurusan_fakultas`, `sekolah_perguruan_tinggi`, `kelas_semester`, `nama_ayah`, `tgl_lahir2`, `nik2`, `jenis_kelamin2`, `agama2`, `pekerjaan2`, `alamat2`, `penghasilan_ayah`, `nama_ibu`, `tgl_lahir3`, `nik3`, `jenis_kelamin3`, `agama3`, `pekerjaan3`, `alamat3`, `penghasilan_ibu`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(27, 'Surat Keterangan Penghasilan Orang Tua', '04/SKPOT/KODE-DESA/VI/2025', '7304080811110001', 176, 'Sunt atque et qui el', 'Quia optio duis sus', 'Omnis omnis fugit q', 'Explicabo Sunt fug', 'Qui iure commodi bea', 'Dolore consectetur ', 'Magna aut non magni ', 'LAKI-LAKI', 'Sed alias earum ut q', 'Odit tempore et con', 'Minim est aliquid ob', 'Rp. 999,-', 'Mollitia et aperiam ', 'Incidunt excepteur ', 'Explicabo Ullam sit', 'LAKI-LAKI', 'Dignissimos quis nul', 'Reprehenderit qui q', 'Sequi cillum omnis n', 'Rp. 999,-', '2025-06-21 21:43:48', 2, 'SELESAI', 1),
(28, 'Surat Keterangan Penghasilan Orang Tua', 'SKPOT/020/MANTAP/VI/2025', '7304080506770003', 414, 'Dolor explicabo Min', 'Enim id voluptatibus', 'Fuga Nulla in et ip', 'Veniam sit rem com', 'Sit illo nihil moll', 'Ullamco deserunt in ', 'Est ipsa facilis co', 'PEREMPUAN', 'Velit totam rerum Na', 'Labore molestiae qui', 'Rerum voluptatem ips', 'Rp. 250,-', 'Error est fugiat si', 'Necessitatibus dolor', 'Voluptas aut fugit ', 'LAKI-LAKI', 'Dolor alias sint par', 'Reprehenderit proide', 'Facilis exercitation', 'Rp. 0,-', '2025-06-29 20:31:25', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_perhiasan`
--

CREATE TABLE `surat_keterangan_perhiasan` (
  `id_skp` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_perhiasan`
--

INSERT INTO `surat_keterangan_perhiasan` (`id_skp`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `jenis_perhiasan`, `nama_perhiasan`, `berat`, `toko_perhiasan`, `lokasi_toko_perhiasan`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(15, 'Surat Keterangan Perhiasan', '005/SKP/KODE-DESA/VII/2025', '7304080811110001', 177, 'Etnik', 'Culpa ut in id sit', 'Offic', 'Enim est ad quo ea n', 'Praesentium maiores ', 'Veritatis sapiente n', '2025-06-21 21:43:57', 2, 'SELESAI', 1),
(16, 'Surat Keterangan Perhiasan', '020/SKP/SANGAT MEMBANTU/VI/2025', '7304080506770003', 396, 'Berlian', 'Laboris ducimus non', 'Harum', 'Dolor non et nostrum', 'Placeat excepteur a', 'Dolore fugiat quaer', '2025-06-28 20:59:52', 2, 'SELESAI', 1),
(17, 'Surat Keterangan Perhiasan', 'SKP/016/MANTAP/VI/2025', '7304080506770003', 413, 'Berlian', 'Nisi eveniet possim', 'Dolor', 'Accusamus ut nulla a', 'Sit est officia se', 'Quibusdam id enim vo', '2025-06-29 20:21:14', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_pindah_penduduk`
--

CREATE TABLE `surat_keterangan_pindah_penduduk` (
  `id_skpp` int(11) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `alamat_yang_dituju` mediumtext NOT NULL,
  `alasan_pindah` mediumtext NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `jumlah_pengikut_display` int(11) DEFAULT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(20) NOT NULL DEFAULT 'PENDING',
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_pindah_penduduk`
--

INSERT INTO `surat_keterangan_pindah_penduduk` (`id_skpp`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `alamat_yang_dituju`, `alasan_pindah`, `tanggal_pindah`, `jumlah_pengikut_display`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(17, 'Surat Keterangan Pindah Penduduk', '04/SKPP/KODE-DESA/VI/2025', '7304053112900229', 223, 'dsd', 'sdsa', '2025-06-10', 1, '2025-06-23 21:42:20', 2, 'SELESAI', 1),
(18, 'Surat Keterangan Pindah Penduduk', '05/SKPP/KODE-DESA/VI/2025', '7304053112900229', 224, 'dsas', 'dsdsa', '2025-05-29', 2, '2025-06-23 21:43:05', 2, 'SELESAI', 1),
(19, 'Surat Keterangan Pindah Penduduk', '06/SKPP/KODE-DESA/VI/2025', '7304053112900229', 225, 'sdadsa', 'dsdsa', '2025-06-06', 1, '2025-06-23 21:45:06', 1, 'SELESAI', 1),
(20, 'Surat Keterangan Pindah Penduduk', '07/SKPP/KODE-DESA/VI/2025', '7304053112900229', 226, 'sds', 'dsds', '2025-06-05', 1, '2025-06-23 21:47:05', 2, 'SELESAI', 1),
(21, 'Surat Keterangan Pindah Penduduk', '08/SKPP/KODE-DESA/VI/2025', '7304053112900229', 227, 'sddsa', 'ddsa', '2025-06-11', 2, '2025-06-23 21:47:36', 2, 'SELESAI', 1),
(22, 'Surat Keterangan Pindah Penduduk', '09/SKPP/KODE-DESA/VI/2025', '7304053112900229', 228, 'd', 'sdsdd', '2025-06-10', 0, '2025-06-23 21:53:52', 2, 'SELESAI', 1),
(23, 'Surat Keterangan Pindah Penduduk', '10/SKPP/KODE-DESA/VI/2025', '7304053112900229', 229, 'sdads', 'dsda', '2025-06-12', 0, '2025-06-23 21:56:03', 1, 'SELESAI', 1),
(24, 'Surat Keterangan Pindah Penduduk', '012/SKPP/SANGAT MEMBANTU/VI/2025', '7304080506770003', 389, 'Nisi aute a voluptas', 'Maxime soluta et cul', '1994-12-08', 0, '2025-06-28 10:42:59', 1, 'SELESAI', 1),
(25, 'Surat Keterangan Pindah Penduduk', NULL, '7304053112900229', 525, 'hkhj', 'jh', '2025-07-03', 0, '2025-07-03 03:16:07', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_tidak_mampu`
--

CREATE TABLE `surat_keterangan_tidak_mampu` (
  `id_sktm` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(20) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_tidak_mampu`
--

INSERT INTO `surat_keterangan_tidak_mampu` (`id_sktm`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `alamat`, `pekerjaan`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(26, 'Surat Keterangan Tidak Mampu', '005/SKTM/KODE-DESA/VII/2025', '7304080811110001', 178, ', RT/RW, Dusun Bo\'nia,\r\nDesa Bungungoe, Kecamatan ', '', 'Voluptas eum elit i', '2025-06-21 21:44:05', 2, 'SELESAI', 1),
(27, 'Surat Keterangan Tidak Mampu', '06/SKTM/KODE-DESA/VII/2025', '7304080811110001', 191, ', RT/RW, Dusun Bo\'nia,\r\nDesa Bungungoe, Kecamatan ', '', 'Enim autem cupiditat', '2025-06-21 22:09:11', 2, 'SELESAI', 1),
(28, 'Surat Keterangan Tidak Mampu', '07/SKTM/KODE-DESA/VII/2025', '7304053112900229', 192, ', RT/RW, Dusun Bo\'nia,\r\nDesa Bungungoe, Kecamatan ', '', 'MELAMAR KERJA', '2025-06-21 22:20:52', 2, 'SELESAI', 1),
(29, 'Surat Keterangan Tidak Mampu', '08/SKTM/KODE-DESA/VII/2025', '7304080506770003', 194, ', RT/RW, Dusun Bo\'nia,\r\nDesa Bungungoe, Kecamatan ', '', 'Unde distinctio Ea ', '2025-06-21 23:05:34', 2, 'SELESAI', 1),
(30, 'Surat Keterangan Tidak Mampu', '09/SKTM/KODE-DESA/VII/2025', '7304082509910001', 195, ', RT/RW, Dusun Bo\'nia,\r\nDesa Bungungoe, Kecamatan ', '', 'MELAMAR KERJA', '2025-06-22 08:36:23', 2, 'SELESAI', 1),
(31, 'Surat Keterangan Tidak Mampu', '10/SKTM/KODE-DESA/VII/2025', '7304087112440003', 196, ', RT/RW, Dusun Bo\'nia,\r\nDesa Bungungoe, Kecamatan ', '', 'PENDAFTARAN', '2025-06-22 09:02:20', 2, 'SELESAI', 1),
(32, 'Surat Keterangan Tidak Mampu', '025/SKTM/MANTAP/VII/2025', '7304053112900229', 488, 'Dusun Bo\'nia Desa Bungungoe Kecamatan Turatea Jene', '', 'MELAMAR KERJA', '2025-07-03 00:46:01', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_usaha`
--

CREATE TABLE `surat_keterangan_usaha` (
  `id_sku` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `usaha` varchar(30) DEFAULT NULL,
  `alamat_usaha` varchar(200) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_usaha`
--

INSERT INTO `surat_keterangan_usaha` (`id_sku`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `usaha`, `alamat_usaha`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(32, 'Surat Keterangan Usaha', '001/SKU/KODE-DESA/VI/2025', '7304080811110001', 179, 'Soluta culpa deseru', 'Commodi qui dolor ad', 'In quisquam eius iur', '2025-06-21 21:44:12', 2, 'SELESAI', 1),
(33, 'Surat Keterangan Usaha', '010/SKU/KODE-DS/VI/2025', '7304080505650001', 388, 'Tempore laudantium', 'Itaque veritatis rep', 'Ea aperiam voluptati', '2025-06-28 10:42:51', 2, 'SELESAI', 1),
(34, 'Surat Keterangan Usaha', '010/SKU/MANTAP/VI/2025', '7304080506770003', 416, 'Duis dolor exercitat', 'Voluptatibus vel sin', 'A adipisci facere vo', '2025-06-29 19:59:29', 2, 'SELESAI', 1),
(35, 'Surat Keterangan Usaha', NULL, '7304053112900229', 522, 'sd', 'sd', 'sd', '2025-07-03 03:09:44', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_wali_hakim`
--

CREATE TABLE `surat_keterangan_wali_hakim` (
  `id_skwh` int(11) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `tempat_menikah` varchar(250) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(20) NOT NULL DEFAULT 'PENDING',
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keterangan_wali_hakim`
--

INSERT INTO `surat_keterangan_wali_hakim` (`id_skwh`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `tempat_menikah`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(2, 'Surat Keterangan Wali Hakim', '04/SKWH/KODE-DESA/VI/2025', '7304053112900229', 235, 'KUA Kecamata Binamu Kabupaten Jenenponto', '2025-06-24 12:34:40', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_lapor_hajatan`
--

CREATE TABLE `surat_lapor_hajatan` (
  `id_slh` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_lapor_hajatan`
--

INSERT INTO `surat_lapor_hajatan` (`id_slh`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `bukti_ktp`, `bukti_kk`, `jenis_hajat`, `hari`, `tanggal`, `jenis_hiburan`, `pemilik`, `alamat_pemilik`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(15, 'Surat Lapor Hajatan', '005/SLH/KODE-DESA/VII/2025', '7304080811110001', 180, 'Ut aliqua Qui p', 'Delectus nihil ', 'Tasyakuran', 'Jum\'at', '1985-03-21 00:00:00', 'Ducimus et rerum be', 'Dolor aut in vitae v', 'Ab duis maxime nesci', '2025-06-21 21:44:19', 2, 'SELESAI', 1),
(16, 'Surat Lapor Hajatan', 'SLH/009/MANTAP/VI/2025', '7304080506770003', 415, 'Dicta neque moll', 'Ut est voluptate', 'Khitanan', 'Jum\'at', '2015-09-27 00:00:00', 'Rerum rerum in aut m', 'Accusamus fugiat vo', 'Voluptatibus fuga A', '2025-06-29 19:25:47', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengantar_hewan`
--

CREATE TABLE `surat_pengantar_hewan` (
  `id_sph` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `nama_hewan` varchar(100) NOT NULL,
  `jenis_kelamin_hewan` varchar(100) NOT NULL,
  `umur` varchar(100) NOT NULL,
  `warna_bulu` varchar(100) NOT NULL,
  `tanduk` varchar(100) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `untuk` varchar(250) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_pengantar_hewan`
--

INSERT INTO `surat_pengantar_hewan` (`id_sph`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `nama_hewan`, `jenis_kelamin_hewan`, `umur`, `warna_bulu`, `tanduk`, `tujuan`, `untuk`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(42, 'Surat Pengantar Hewan', '005/SPH/KODE-DESA/VII/2025', '7304080811110001', 181, 'Ut culpa sit sit ', 'Aut do pariatur Ess', 'Ratione ut corporis ', 'Proident quaerat il', '', 'Cupidatat necessitat', 'Ipsam accusamus rati', '2025-06-21 21:44:27', 2, 'SELESAI', 1),
(43, 'Surat Pengantar Hewan', '06/SPH/KODE-DESA/VII/2025', '7304080811110001', 182, 'Sit rerum aliqua I', 'Aliquid irure exerci', 'Nihil laudantium cu', 'Odit et laborum Con', '', 'Consectetur vitae u', 'Molestiae voluptatib', '2025-06-21 21:44:36', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengantar_skck`
--

CREATE TABLE `surat_pengantar_skck` (
  `id_sps` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `bukti_ktp` varchar(30) DEFAULT NULL,
  `bukti_kk` varchar(30) DEFAULT NULL,
  `keperluan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `masa_berlaku` varchar(20) DEFAULT NULL,
  `tanggal_surat` datetime DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_pengantar_skck`
--

INSERT INTO `surat_pengantar_skck` (`id_sps`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `bukti_ktp`, `bukti_kk`, `keperluan`, `keterangan`, `masa_berlaku`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(18, 'Surat Pengantar SKCK', '001/SPS/KODE-DESA/VI/2025', '7304080811110001', 183, 'Illum maxime im', 'Ad doloribus nul', 'Permohonan SKCK', 'Ad sequi eiusmod nos', '3 Hari', '2025-06-21 21:44:43', 2, 'SELESAI', 1),
(20, 'Surat Pengantar SKCK', '015/SPSKEREN/WOOW/VI/2025', '7304080506770003', 470, 'Vel ullam laboru', 'Laboris laborum', 'Permohonan SKCK', 'Dolores nobis adipis', '7 Hari', '2025-06-29 17:24:59', 2, 'SELESAI', 1),
(21, 'Surat Pengantar SKCK', '016/SPSKEREN/WOOW/VI/2025', '7304080506770003', 471, 'Ut ut dolores id', 'Debitis voluptat', 'Permohonan SKCK', 'Ipsa quisquam maxim', '30 Hari', '2025-06-29 17:26:01', 1, 'SELESAI', 1);

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
-- Indexes for table `nomor_surat`
--
ALTER TABLE `nomor_surat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_surat` (`kode_surat`,`nomor_urut`,`tahun`);

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
-- Indexes for table `pengikut_surat_keterangan_pindah_penduduk`
--
ALTER TABLE `pengikut_surat_keterangan_pindah_penduduk`
  ADD PRIMARY KEY (`id_skpp`),
  ADD KEY `idx_id_surat_pindah` (`id_surat_pindah`);

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
-- Indexes for table `surat_keterangan_belum_terbit_sppt_pbb`
--
ALTER TABLE `surat_keterangan_belum_terbit_sppt_pbb`
  ADD PRIMARY KEY (`id_skbtsp`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_arsip` (`id_arsip`),
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
-- Indexes for table `surat_keterangan_jual_beli`
--
ALTER TABLE `surat_keterangan_jual_beli`
  ADD PRIMARY KEY (`id_skjb`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_arsip` (`id_arsip`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- Indexes for table `surat_keterangan_kematian`
--
ALTER TABLE `surat_keterangan_kematian`
  ADD PRIMARY KEY (`id_skk`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `surat_keterangan_kematian_dan_penguburan`
--
ALTER TABLE `surat_keterangan_kematian_dan_penguburan`
  ADD PRIMARY KEY (`id_skkp`),
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
-- Indexes for table `surat_keterangan_mahar_sunrang`
--
ALTER TABLE `surat_keterangan_mahar_sunrang`
  ADD PRIMARY KEY (`id_skm`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_arsip` (`id_arsip`),
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
-- Indexes for table `surat_keterangan_pengantar_rujuk_atau_cerai`
--
ALTER TABLE `surat_keterangan_pengantar_rujuk_atau_cerai`
  ADD PRIMARY KEY (`id_skrc`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_arsip` (`id_arsip`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`);

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
-- Indexes for table `surat_keterangan_pindah_penduduk`
--
ALTER TABLE `surat_keterangan_pindah_penduduk`
  ADD PRIMARY KEY (`id_skpp`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`);

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
-- Indexes for table `surat_keterangan_wali_hakim`
--
ALTER TABLE `surat_keterangan_wali_hakim`
  ADD PRIMARY KEY (`id_skwh`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_arsip` (`id_arsip`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`);

--
-- Indexes for table `surat_lapor_hajatan`
--
ALTER TABLE `surat_lapor_hajatan`
  ADD PRIMARY KEY (`id_slh`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indexes for table `surat_pengantar_hewan`
--
ALTER TABLE `surat_pengantar_hewan`
  ADD PRIMARY KEY (`id_sph`),
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
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formulir_pengantar_nikah`
--
ALTER TABLE `formulir_pengantar_nikah`
  MODIFY `id_fpn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `formulir_permohonan_kehendak_nikah`
--
ALTER TABLE `formulir_permohonan_kehendak_nikah`
  MODIFY `id_fpkn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `formulir_persetujuan_calon_pengantin`
--
ALTER TABLE `formulir_persetujuan_calon_pengantin`
  MODIFY `id_fpcp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `formulir_persetujuan_calon_pengantin_istri`
--
ALTER TABLE `formulir_persetujuan_calon_pengantin_istri`
  MODIFY `id_fpcp2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `formulir_surat_izin_orang_tua`
--
ALTER TABLE `formulir_surat_izin_orang_tua`
  MODIFY `id_fsiot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nomor_surat`
--
ALTER TABLE `nomor_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pejabat_desa`
--
ALTER TABLE `pejabat_desa`
  MODIFY `id_pejabat_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7404;

--
-- AUTO_INCREMENT for table `pengikut_surat_keterangan_pindah_penduduk`
--
ALTER TABLE `pengikut_surat_keterangan_pindah_penduduk`
  MODIFY `id_skpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id_profil_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `surat_keterangan_beda_identitas`
--
ALTER TABLE `surat_keterangan_beda_identitas`
  MODIFY `id_skbi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `surat_keterangan_beda_identitas_kis`
--
ALTER TABLE `surat_keterangan_beda_identitas_kis`
  MODIFY `id_skbis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `surat_keterangan_belum_terbit_sppt_pbb`
--
ALTER TABLE `surat_keterangan_belum_terbit_sppt_pbb`
  MODIFY `id_skbtsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_keterangan_berkelakuan_baik`
--
ALTER TABLE `surat_keterangan_berkelakuan_baik`
  MODIFY `id_skbb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `surat_keterangan_domisili`
--
ALTER TABLE `surat_keterangan_domisili`
  MODIFY `id_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `surat_keterangan_domisili_usaha`
--
ALTER TABLE `surat_keterangan_domisili_usaha`
  MODIFY `id_skdu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `surat_keterangan_jual_beli`
--
ALTER TABLE `surat_keterangan_jual_beli`
  MODIFY `id_skjb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_keterangan_kematian`
--
ALTER TABLE `surat_keterangan_kematian`
  MODIFY `id_skk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `surat_keterangan_kematian_dan_penguburan`
--
ALTER TABLE `surat_keterangan_kematian_dan_penguburan`
  MODIFY `id_skkp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--
ALTER TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor`
  MODIFY `id_skkkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `surat_keterangan_mahar_sunrang`
--
ALTER TABLE `surat_keterangan_mahar_sunrang`
  MODIFY `id_skm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_keterangan_pengantar`
--
ALTER TABLE `surat_keterangan_pengantar`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `surat_keterangan_pengantar_rujuk_atau_cerai`
--
ALTER TABLE `surat_keterangan_pengantar_rujuk_atau_cerai`
  MODIFY `id_skrc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_keterangan_penghasilan_orang_tua`
--
ALTER TABLE `surat_keterangan_penghasilan_orang_tua`
  MODIFY `id_skpot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `surat_keterangan_perhiasan`
--
ALTER TABLE `surat_keterangan_perhiasan`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `surat_keterangan_pindah_penduduk`
--
ALTER TABLE `surat_keterangan_pindah_penduduk`
  MODIFY `id_skpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `surat_keterangan_tidak_mampu`
--
ALTER TABLE `surat_keterangan_tidak_mampu`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  MODIFY `id_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `surat_keterangan_wali_hakim`
--
ALTER TABLE `surat_keterangan_wali_hakim`
  MODIFY `id_skwh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_lapor_hajatan`
--
ALTER TABLE `surat_lapor_hajatan`
  MODIFY `id_slh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `surat_pengantar_hewan`
--
ALTER TABLE `surat_pengantar_hewan`
  MODIFY `id_sph` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `surat_pengantar_skck`
--
ALTER TABLE `surat_pengantar_skck`
  MODIFY `id_sps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengikut_surat_keterangan_pindah_penduduk`
--
ALTER TABLE `pengikut_surat_keterangan_pindah_penduduk`
  ADD CONSTRAINT `fk_pengikut_surat_pindah` FOREIGN KEY (`id_surat_pindah`) REFERENCES `surat_keterangan_pindah_penduduk` (`id_skpp`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
