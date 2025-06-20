-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 04:11 PM
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
(191, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '', '2025-06-21 22:09:11');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `formulir_pengantar_nikah`
--

INSERT INTO `formulir_pengantar_nikah` (`id_fpn`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `status_nikah1`, `status_nikah2`, `nama_ayah`, `nik_ayah`, `tempat_tgl_lahir_ayah`, `kewarganegaraan_ayah`, `agama_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nik_ibu`, `tempat_tgl_lahir_ibu`, `kewarganegaraan_ibu`, `agama_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(31, 'Formulir Pengantar Nikah', '04/FPN/KODE-DESA/VI/2025', '7304080811110001', 162, 'Omnis tenetur do qui', 'Ea suscipit atque mo', 'Velit facilis ab ips', 'Eum expedita quod qu', 'Possimus impedit q', 'Et quo et qui eligen', 'Voluptatem Sint mo', 'Dolor nihil ut a vol', 'Aliquam ullamco temp', 'Consequatur Tenetur', 'Quas voluptatibus od', 'Dolore pariatur Aut', 'Sunt officiis corrup', 'Sint minim consequat', 'Quia dolorum illo om', 'Voluptatem beatae eu', '2025-06-21 21:41:55', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `formulir_permohonan_kehendak_nikah`
--

INSERT INTO `formulir_permohonan_kehendak_nikah` (`id_fpkn`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `kepada_yth`, `calon_suami`, `calon_istri`, `hari_tanggal`, `tempat_akad`, `delapan`, `sembilan`, `sepuluh`, `sebelas`, `dua_belas`, `tiga_belas`, `kepala_kua`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(36, 'Formulir Permohonan Kehendak Nikah', '04/FPKN/KODE-DESA/VI/2025', '7304080811110001', 163, 'MAKASSAR', 'Culpa suscipit totam', 'Velit maxime conseq', 'Blanditiis sint id ', 'Facilis totam perfer', 'Ducimus amet iste ', 'Officiis minus quae ', 'Lorem suscipit earum', 'Natus est officia ad', 'Magnam qui dolorum p', 'Similique natus mini', 'BANTAENG', '2025-06-21 21:42:05', 1, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `formulir_persetujuan_calon_pengantin`
--

INSERT INTO `formulir_persetujuan_calon_pengantin` (`id_fpcp`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `bin`, `nama_istri`, `bin_istri`, `nik_istri`, `tgl_lahir_istri`, `kewarganegaraan_istri`, `agama_istri`, `pekerjaan_istri`, `alamat_istri`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(41, 'Formulir Persetujuan Calon Pengantin', '04/FPCP/KODE-DESA/VI/2025', '7304080811110001', 164, 'Necessitatibus sed l', 'Ut dolores culpa nos', 'Iure ut quia blandit', 'Rerum adipisicing po', 'Irure est culpa ess', 'Consequatur Fugiat ', 'Eligendi ut aliquam ', 'Incididunt qui in ma', 'Molestias odio debit', '2025-06-21 21:42:13', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `formulir_persetujuan_calon_pengantin_istri`
--

INSERT INTO `formulir_persetujuan_calon_pengantin_istri` (`id_fpcp2`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `bin`, `nama_suami`, `bin_suami`, `nik_suami`, `tgl_lahir_suami`, `kewarganegaraan_suami`, `agama_suami`, `pekerjaan_suami`, `alamat_suami`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(46, 'Formulir Persetujuan Calon Pengantin Istri', '04/FPCPI/KODE-DESA/VI/2025', '7304080811110001', 165, 'Neque itaque veniam', 'In est magna facili', 'Fugiat laboriosam ', 'Quis animi iusto co', 'Voluptatem ut provi', 'Nisi suscipit in ali', 'Eum inventore sit u', 'Ut qui corrupti non', 'Voluptatem corrupti', '2025-06-21 21:42:20', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `formulir_surat_izin_orang_tua`
--

INSERT INTO `formulir_surat_izin_orang_tua` (`id_fsiot`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `bin`, `nama1`, `bin1`, `nik1`, `tempat_tgl_lahir1`, `kewarganegaraan1`, `agama1`, `pekerjaan1`, `alamat1`, `nama2`, `bin2`, `nik2`, `tempat_tgl_lahir2`, `kewarganegaraan2`, `agama2`, `pekerjaan2`, `alamat2`, `nama3`, `bin3`, `nik3`, `tempat_tgl_lahir3`, `kewarganegaraan3`, `agama3`, `pekerjaan3`, `alamat3`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(44, 'Formulir Surat Izin Orang Tua', '04/FSIOT/KODE-DESA/VI/2025', '7304080811110001', 166, 'Doloribus sed rerum ', 'Aut nulla et sit ut ', 'Eius suscipit ex con', 'Ut quasi ullamco Nam', 'Reiciendis enim ulla', 'At omnis tenetur lab', 'Commodo anim excepte', 'A consectetur aut li', 'Et corrupti sint mo', 'Animi odit nostrum ', 'Ipsam est aliquid a', 'Nemo eum sit ut et ', 'Odit dolorum in dolo', 'Ut lorem autem et es', 'Rerum odio aut dicta', 'Qui est do repudiand', 'Est culpa suscipit ', 'Ad in dolor corrupti', 'Sit dignissimos tem', 'Aut quia in cupidata', 'Ut obcaecati magna d', 'Iusto non enim moles', 'Ullam nemo ab sit a', 'Harum deserunt nulla', 'Repudiandae optio a', '2025-06-21 21:42:29', 2, 'SELESAI', 1);

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
(1, 'LUKMAN, SE', 'Lurah', 'Pangkat Penata, III/c', 'Nip. 19840728201001 1 019'),
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
(2527, '-', 'Faizal', 'Jeneponto', '2017-07-30', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2793, '5313051201970002', 'Aswar', 'Balampasu', '1997-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2769, '7304013112910033', 'Suardi', 'Batu Le\'leng', '1991-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2498, '7304041301120002', 'Rendi', 'Bo\'nia', '2012-01-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2795, '7304042007860001', 'Nimbang', 'Bontosunggu', '1986-07-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2495, '7304043112530079', 'Make', 'Bo\'nia', '1953-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2798, '7304043112640004', 'Badullah', 'Bungeng', '1964-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2703, '7304047011770001', 'Sulkepi', 'Togo-Togo', '1996-06-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2738, '7304053112900229', 'Ali', 'Camba Jawa', '1990-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2694, '7304080103760001', 'Hasan', 'Je\'neponto', '1976-03-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2482, '7304080103900001', 'Erwin', 'Bo\'nia', '1990-03-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2549, '7304080104050001', 'Rapli', 'Jeneponto', '2005-04-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2507, '7304080106800001', 'Taju', 'Bo\'nia', '1980-06-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2670, '7304080107450001', 'Sainong', 'Jeneponto', '1945-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2750, '7304080107650006', 'Jufri', 'Arungkeke', '1970-01-01', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2613, '7304080107700008', 'Haseng', 'Jeneponto', '1970-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2480, '7304080107740002', 'Kaharuddin', 'Taroang', '1974-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(3150, '7304080107740003', 'Abd. Latif', 'Kaluku', '1974-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2486, '7304080107790004', 'Suharto Ancha', 'Sarroanging', '1979-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2548, '7304080107830042', 'Rannu', 'Jeneponto', '1985-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2702, '7304080107910040', 'Hairuddin', 'Saroanging', '1991-07-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2609, '7304080111970001', 'Firmansyah', 'Sarroanging', '1997-11-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2542, '7304080201620001', 'Banyo', 'Jeneponto', '1952-01-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2578, '7304080202820001', 'Baharuddin', 'Jeneponto', '1982-02-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2772, '7304080203760001', 'Alexander Agung, S.Sos', 'Jeneponto', '1976-07-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2579, '7304080203830004', 'Kasmawati', 'Bo\'nia', '1983-03-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2620, '7304080204820005', 'Sarifuddin Dg. Lallo', 'Jeneponto', '1982-04-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2716, '7304080206680002', 'Sattu', 'Balang Loe', '1968-05-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2649, '7304080301150002', 'Danil Syaputra', 'Bo\'nia', '2015-01-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2488, '7304080303040003', 'Feri', 'Sarroanging', '2004-03-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2679, '7304080304150001', 'Muh. Tasbi', 'Je\'neponto', '2015-04-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2519, '7304080304900002', 'Amriani', 'Bo\'nia', '1990-12-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2521, '7304080305000004', 'Dedi Arsandi', 'Bo\'nia', '2000-03-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2774, '7304080305030001', 'Muh. Sigit Nur Agung', 'Bo\'nia', '2002-05-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2790, '7304080305520001', 'Siajang', 'Bo\'nia', '1952-05-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2538, '7304080305700001', 'Farida', 'Bo\'nia', '1970-06-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2590, '7304080305930003', 'Jumriani', 'Bo\'nia', '1993-05-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2726, '7304080306080002', 'Muhammad Aldo', 'Bo\'nia', '2008-06-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2731, '7304080306830002', 'Akrim Nuhun Musa, S.Pdi', 'Marica', '1983-06-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2682, '7304080308160002', 'Muh.Farhan Yusuf', 'Je\'neponto', '2016-08-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2493, '7304080309980001', 'Hendrawan', 'Kaluku', '1998-09-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2572, '7304080311630001', 'Moddin', 'Bo\'nia', '1963-11-03', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2632, '7304080311710002', 'Mardiana', 'Makassar', '1971-11-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2741, '7304080312790002', 'Arifin', 'Bo\'nia', '1979-12-03', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2700, '7304080402520001', 'Hadeng', 'Bo\'nia', '1952-02-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2581, '7304080404150002', 'Muh. Rizky Setiawan', 'Bo\'nia', '2015-04-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2577, '7304080404150003', 'Muh. Rifki Setiawan', 'Bo\'nia', '2015-04-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2591, '7304080406940001', 'Herman', 'Bo\'nia', '1994-06-04', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2584, '7304080407930001', 'Herawati', 'Makassar,', '1993-07-04', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2517, '7304080501520001', 'Balumbung', 'Jeneponto', '1962-01-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2787, '7304080505650001', 'H. Jamaluddin, S.Sos', 'Bo\'nia', '1965-05-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2565, '7304080506770003', 'Andi Muh. Amin, SH.', 'Jakarta', '1977-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2472, '7304080508540001', 'Suma Dg. Jarre', 'Jeneponto', '1954-08-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2727, '7304080509640001', 'Syamsuddin', 'Jeneponto', '1964-09-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2502, '7304080510070001', 'Rudi', 'Bo\'nia', '2007-10-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2582, '7304080510700001', 'Rafiuddin', 'Jeneponto', '1970-10-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2680, '7304080510880004', 'Muh Yusuf', 'Kendari', '1988-10-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2631, '7304080608720001', 'Azis', 'Jenepontio', '1972-08-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2569, '7304080609500001', 'Rali', 'Bo\'nia', '1950-09-06', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2566, '7304080610740001', 'Hariyati, S.Com', 'Bo\'nia', '1974-10-06', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2589, '7304080610900001', 'Rasyid', 'Bo\'nia', '1990-10-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2754, '7304080612710001', 'Sahabuddin', 'Jeneponto', '1971-12-06', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2692, '7304080702170001', 'Affan Asrofi Nas', 'Je\'neponto', '2017-02-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2547, '7304080703810001', 'Mantan Dg. Tale', 'Jeneponto', '1981-03-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2586, '7304080705020001', 'Aswar', 'Bo\'nia', '2002-05-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2474, '7304080706720001', 'Samsuddin', 'Bo\'nia', '1964-06-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2758, '7304080706780002', 'Ribi', '', '2025-06-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2657, '7304080708590002', 'Kasri', 'Saroanging', '1959-08-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2555, '7304080709640001', 'Mashudi', 'Bo\'nia', '1964-09-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2673, '7304080711850001', 'Jumrah', 'Bo\'nia', '1985-11-07', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2746, '7304080711940002', 'Sudarmin', 'Jeneponto', '1994-11-07', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2537, '7304080802130001', 'Dela Savira', 'Bo\'nia', '2013-02-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2658, '7304080802810001', 'Tamsir', 'Jeneponto', '1981-02-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2611, '7304080805110002', 'Firgawahyu', 'Jeneponto', '2011-05-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2489, '7304080807100001', 'Wahyudi', 'Sarroanging', '2010-07-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2686, '7304080808090002', 'Aditia', 'Bo\'nia', '2009-08-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2699, '7304080808930001', 'Muhlis', 'Bo\'nia', '1993-06-05', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(3228, '7304080811110001', 'A. Rezky Anas Fahri', 'Jeneponto', '2011-11-08', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2775, '7304080901090002', 'Muh. Khaerun Nur Agung', 'Bo\'nia', '2009-09-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2592, '7304080902010001', 'Irfan', 'Bo\'nia', '2001-02-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2781, '7304080902050001', 'Muh. Nur Fahmi', 'Jeneponto', '2005-02-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2518, '7304081002700001', 'Satturri', 'Jeneponto', '1970-02-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2677, '7304081005920003', 'Rahmat', 'Talabua', '1992-05-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2669, '7304081007000001', 'Rahul', 'Bo\'nia', '2002-07-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2570, '7304081007660001', 'Kulle', 'Bo\'nia', '1966-07-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2596, '7304081010650001', 'Mansyur DJS', 'Bo\'nia', '1965-10-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2783, '7304081010650005', 'Mansyur DJS', 'Bo\'nia', '1965-10-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2484, '7304081012600001', 'Taju Dg. Jarre', 'Bo\'nia', '1960-12-10', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2667, '7304081104680001', 'Nusu', 'Bo\'nia', '1968-04-11', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2687, '7304081106950002', 'Sakri', 'Bo\'nia', '1970-01-01', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2675, '7304081112100001', 'Ahmad Ali Akbar', 'Bo\'nia', '2010-12-11', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2477, '7304081201050001', 'Jusriani', 'Bo\'nia', '2005-01-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2654, '7304081201520001', 'M. Dg. Lili', 'Sidenre', '1952-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2634, '7304081201790002', 'Sultan', 'Jeneponto', '1979-01-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2637, '7304081203070003', 'Muh. Ulil Raezy Saputra', 'Bo\'nia', '2007-03-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2639, '7304081203630003', 'Sahrir', 'Jeneponto', '1969-03-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2544, '7304081203870001', 'Neru', 'Jeneponto', '1987-03-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2683, '7304081204730001', 'Mantang', 'Je\'neponto', '1973-04-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2736, '7304081207150002', 'Abrar R. Al muarif', 'jeneponto', '2015-07-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2573, '7304081207630001', 'Sinampara', 'Jeneponto', '1963-07-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2685, '7304081212980001', 'Agung', 'Bo\'nia', '1998-04-07', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2734, '7304081303910003', 'Abdullah, S.pdi', 'Kaluku', '1991-03-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2650, '7304081308890001', 'Agus Salim', 'Jeneponto', '1989-08-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2567, '7304081310030001', 'A. Wahyu Arifin Nur', 'Jeneponto', '2003-10-13', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2539, '7304081403990001', 'Adrian', 'Makassar', '1999-03-14', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2721, '7304081404600001', 'Sampara', 'Je\'neponto', '1960-04-14', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2743, '7304081409990002', 'Syahrul Arifin', 'Bo\'nia', '2000-02-27', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2595, '7304081411070001', 'Muh. Alif Safaat', 'Makassar', '2007-11-14', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2674, '7304081501060003', 'Adel Amelia', 'Bo\'nia', '2006-01-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2718, '7304081505090003', 'Aril S', 'Bo\'nia', '2009-05-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2623, '7304081506080001', 'Said Abidin Al Monawar', 'Jeneponto', '2008-06-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2605, '7304081507600001', 'Mangngaribi', 'Bo\'nia', '1960-07-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2533, '7304081510090001', 'Al Gazali', 'Bo\'nia', '2009-10-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2733, '7304081510100001', 'M Subhan Hidayatullah', 'Jeneponto', '2010-10-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2745, '7304081512920004', 'Gatot', 'Jeneponto', '1992-12-15', 'Laki -Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2782, '7304081603180002', 'Muh. Azka Al Gibran', 'Jeneponto', '2018-03-16', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2643, '7304081603560001', 'Samsia', 'Bo\'nia', '1956-03-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2530, '7304081606820001', 'Akbar Tompo', 'Bo\'nia', '1982-06-16', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2612, '7304081607140004', 'Firhandani', 'Jeneponto', '2014-07-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2554, '7304081702100001', 'Selfiana', 'Antang', '2010-02-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2642, '7304081702540001', 'Sarifuddin', 'Jeneponto', '1954-02-17', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2524, '7304081703890001', 'Nurbaya', 'Bo\'nia', '1989-03-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2540, '7304081707050001', 'Aidir Aswar', 'Makassar', '2003-07-28', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2525, '7304081712090002', 'Ahmad Fajri', 'Jeneponto', '2009-12-17', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2546, '7304081802090001', 'Refal', 'Lianga', '2009-02-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2562, '7304081803780002', 'Kamaruddin', 'Jeneponto', '1978-03-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2505, '7304081805150001', 'Reski', 'Bo\'nia', '2015-05-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2593, '7304081806650001', 'Sitorongking, S.Pd.', 'Bungung Boddi', '1965-06-18', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2564, '7304081901070006', 'Syamsuddin Arif Hidayatullah', 'Tarakan', '2007-01-19', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2574, '7304081901080001', 'Muh. Rais Setiawan', 'Bo\'nia', '2008-01-19', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2648, '7304081906060003', 'Dimas', 'Malaysia', '2006-06-19', 'Laki-laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2626, '7304082003550001', 'H. Hama', 'Jeneponto', '1955-03-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2526, '7304082004150001', 'Awal Al Khairul', 'Jeneponto', '2015-04-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2513, '7304082008760001', 'Manni', 'Barayya', '1976-08-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2501, '7304082101050002', 'Heri', 'Bo\'nia', '2005-05-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2534, '7304082105830002', 'Saenal', 'Bo\'nia', '1983-05-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2644, '7304082106450001', 'Juru', 'Saroanging', '1945-06-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2656, '7304082106560001', 'Sambe', 'Saroanging', '1956-06-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2766, '7304082107910003', 'Ilyas', 'Cambalangkasa', '1997-07-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2779, '7304082108760001', 'Suamang', 'Jeneponto', '1976-08-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2672, '7304082108800001', 'Kahar Dg Boko', 'Jeneponto', '1980-08-21', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2536, '7304082205080001', 'Muh. Fachri', 'Bo\'nia', '2008-05-22', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2645, '7304082304770002', 'Rudi', 'Bontolaya', '1977-04-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2629, '7304082305650001', 'Badong Dg. Limpo', 'Jenepontio', '1963-05-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2636, '7304082306020001', 'Muh. Misba Prayoga Sultan', 'Bo\'nia', '2002-06-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2641, '7304082307880003', 'Rendi Rian', 'Bo\'nia', '1988-07-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2610, '7304082312990001', 'Firdayanti', 'Jeneponto', '1999-01-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2529, '7304082401060001', 'Dandi', 'Bo\'nia', '2006-01-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2737, '7304082401170001', 'Azlam Al- Azzam', 'jeneponto', '2017-01-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2583, '7304082408770001', 'Herma', 'Ujung Pandang', '1977-08-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2704, '7304082409100001', 'Rian', 'Saroanging', '2010-11-19', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2516, '7304082411040001', 'Erwin', 'Bo\'nia', '2004-11-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2553, '7304082412040001', 'Suci', 'Antang', '2004-12-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2638, '7304082503090001', 'Muh. Tri Mukhtar', 'Bo\'nia', '2009-03-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2492, '7304082503950001', 'Heriwardani', 'Kaluku', '1995-03-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2470, '7304082506580001', 'H. Baso Se\'re', 'Jeneponto', '1958-06-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2556, '7304082506690001', 'Syamsuyanti', 'Bo\'nia', '1969-06-25', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2607, '7304082508730002', 'Kamaruddin', 'Jeneponto', '1973-08-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2471, '7304082509910001', 'Abd. Rahman', 'Jeneponto', '1991-09-25', 'laki-laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2522, '7304082511030004', 'Adi Gunawan', 'Bo\'nia', '2003-11-25', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2604, '7304082607110002', 'Muhammad Riza Syaputra', 'Kalumpang Loe', '2011-07-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2625, '7304082610100002', 'Muh.Zaki Akbar', '', '1970-01-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2697, '7304082611080001', 'Muh. Riflki', 'Bo\'nia', '2005-11-26', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2478, '7304082701530001', 'Jumaseng', 'Lianga', '1953-01-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2622, '7304082703060004', 'Said Agil Al Monawar', 'Jeneponto', '2006-03-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2655, '7304082704540001', 'Mida', 'Bo\'nia', '1954-04-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2693, '7304082705570002', 'Bakkang Dg Rate', 'Je\'neponto', '1957-05-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2499, '7304082706740001', 'Turu', 'Bo\'nia', '1974-06-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2552, '7304082710850001', 'Rosdiana', 'Antang', '1985-10-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2640, '7304082712000001', 'Dedi Arsandi', 'Bo\'nia', '2000-12-27', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2476, '7304082802000001', 'Jusman', 'Bo\'nia', '2000-02-28', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2535, '7304082812850001', 'Rosmala Dewi', 'Bo\'nia', '1985-12-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2497, '7304082908970001', 'Agus', 'Bo\'nia', '1997-08-29', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2635, '7304083012780002', 'Hasniati', 'Bo\'nia', '1978-12-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2600, '7304083012790001', 'Ruslan Rola', 'Jeneponto', '1979-12-30', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2550, '7304083103110001', 'Muh. Zul Ikram', 'Jeneponto', '2011-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2792, '7304083107000001', 'Ardianto', 'Bo\'nia', '2000-07-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2523, '7304083108760002', 'Safaruddin Dg. Rani', 'Bo\'nia', '1976-08-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2588, '7304083112290019', 'Tahere', 'Bo\'nia', '1929-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2559, '7304083112380001', 'Jarigau Dg. Bundu', 'Bo\'nia', '1958-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2560, '7304083112430001', 'Rukiah', 'Bo\'nia', '1943-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2561, '7304083112780001', 'Rahma', 'Bo\'nia', '1978-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2585, '7304083112980001', 'Muh. Rasul', 'Bo\'nia', '1998-12-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2617, '7304084102020001', 'Nuralisa', 'Jeneponto', '2002-02-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2594, '7304084102490002', 'Hj. Yummi', 'Jeneponto', '1949-02-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2770, '7304084102990002', 'Rina', 'Bo\'nia', '1999-02-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2606, '7304084105610001', 'Sitti', 'Bo\'nia', '1961-05-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2661, '7304084106090001', 'Nur Al  firah', 'Jeneponto', '2009-06-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2508, '7304084106860001', 'Suarni', 'Bo\'nia', '1986-06-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2747, '7304084107000055', 'Nurfani', 'Jeneponto', '2000-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2671, '7304084107490002', 'Sadaria', 'Bo\'nia', '1949-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2597, '7304084107620043', 'Saribulang', 'Bo\'nia', '1962-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2628, '7304084107840006', 'Hasnah', 'Bo\'nia', '1984-07-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2724, '7304084109040001', 'Israwati', 'Sungguminasa', '2004-09-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2491, '7304084110740001', 'Sinawati', 'Kaluku', '1974-10-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2503, '7304084203100002', 'Bintang', 'Bo\'nia', '2010-03-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2701, '7304084203420001', 'Sakati', 'Jeneponto', '1942-03-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2684, '7304084207700001', 'Basmi', 'Bontorea', '1970-07-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2765, '7304084209800002', 'Hayati', 'Cambalangkasa', '1980-09-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2481, '7304084211720001', 'Halija', 'Bo\'nia', '1972-11-02', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2729, '7304084307720002', 'Nia', 'Jeneponto', '1972-07-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2773, '7304084308830001', 'Hj. Nurlaela', 'Bo\'nia', '1983-08-03', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2668, '7304084403700001', 'Ati', 'Bo\'nia', '1970-03-04', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2698, '7304084403780001', 'Hasnah', 'Jeneponto', '1978-03-04', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2515, '7304084506030002', 'Yulianti', 'Jeneponto', '1999-10-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2719, '7304084506100003', 'Hartina S', 'Bo\'nia', '2010-06-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2601, '7304084506820001', 'Syamsinar', 'Kalumpang Loe', '1970-01-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2512, '7304084507100002', 'Putri Anita', 'Bo\'nia', '2012-07-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2799, '7304084508720005', 'Ria', 'Bo\'nia', '1972-08-05', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2614, '7304084609720002', 'Sarilu', 'Jeneponto', '1972-09-06', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2720, '7304084709780003', 'Mawati', 'Bo\'nia', '1978-09-07', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2744, '7304084710110001', 'Syahrini', 'Bo\'nia', '2011-10-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2485, '7304084803650001', 'Balaeng', 'Bo\'nia', '1969-03-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2633, '7304084805970002', 'Halima Tussadiyah', 'Kalimantan Timur', '1997-07-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2739, '7304084808930002', 'Irmawati', 'Benrong', '1993-08-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2789, '7304084809930001', 'Fitriani', 'Bo\'nia', '1993-09-08', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2615, '7304084901940001', 'Nurjanni', 'Jeneponto', '1994-10-09', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2715, '7304084911650001', 'Sitti', 'Bo\'nia', '1965-11-09', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2514, '7304085002800001', 'Ida', 'Bo\'nia', '1980-02-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2487, '7304085003800001', 'Manci', 'Sarroanging', '1980-03-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2630, '7304085004550001', 'Hj. Nursiah', 'Jenepontio', '1955-04-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2788, '7304085005650001', 'Hj. Hadasiah', 'Bo\'nia', '1965-05-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2725, '7304085008770002', 'Suriani', 'Bo\'nia', '1977-08-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2543, '7304085009550001', 'Pati', 'Jeneponto', '1955-09-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2602, '7304085010020008', 'Oktaviana', 'Kalumpang Loe', '2002-10-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2717, '7304085010780001', 'Sarinang', 'Bo\'nia', '1978-10-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2545, '7304085010900004', 'Nurhayati', 'Lianga', '1990-10-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2780, '7304085101760002', 'Salmawati', 'Jeneponto', '1976-01-11', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2621, '7304085107820003', 'Idawati Dg. Kanang', 'Jeneponto', '1982-07-11', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2755, '7304085112730003', 'Hj. Nurhayati', 'Mombi', '1970-01-01', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2571, '7304085201600001', 'Pia', 'Jeneponto', '1960-01-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2757, '7304085201600002', 'Rapati', 'Bo\'nia', '1960-01-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2647, '7304085202020002', 'Dini Aminarti', 'Bo\'nia', '2002-02-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2696, '7304085202990001', 'Devi Dwiyanti', 'Bone', '1999-04-10', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2479, '7304085205550002', 'Sitti', 'Bo\'nia', '1955-05-12', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2616, '7304085210970002', 'Risal', 'Jeneponto', '1997-10-12', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2791, '7304085302610001', 'Sayati', 'Mattoanging', '1961-02-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2751, '7304085303690001', 'Suasah', 'Jeneponto', '1969-03-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2764, '7304085303860004', 'Irma', 'Jeneponto', '1986-03-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2551, '7304085304170002', 'Naila Aprilia Humaerah', 'Jeneponto', '2017-04-13', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2598, '7304085411700001', 'Salma', 'Bo\'nia', '1970-11-14', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2681, '7304085503790002', 'Irmawati', 'Je\'neponto', '1979-03-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2646, '7304085506780001', 'Suriani', 'Bo\'nia', '1978-06-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2723, '7304085512990001', 'Risma Trisnawati', 'Bo\'nia', '1999-12-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2742, '7304085603790002', 'Rabaisa', 'Bonto Parang', '1979-03-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2763, '7304085607840004', 'Sumarni', 'Jeneponto', '1984-07-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2608, '7304085611760001', 'Dahlia', 'Jeneponto', '1976-11-16', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2740, '7304085708140001', 'Husni Agustina', 'Bo\'nia', '2014-08-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2753, '7304085711020001', 'Nurul Suci', 'Jeneponto', '2002-11-17', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2756, '7304085711230546', 'Hj. Sannari', 'Bo\'nia', '1930-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2500, '7304085803730001', 'Rindu', 'Bo\'nia', '1973-03-18', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2695, '7304085806740001', 'Samsinar', 'Bo\'nia', '1974-08-18', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2722, '7304085812710001', 'Cia', 'Kindang', '1971-12-18', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2624, '7304085903150001', 'Ainun Thalita Zahra', 'Jeneponto', '2015-03-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2541, '7304085907060001', 'Adelia', 'Jeneponto', '2006-07-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2531, '7304085909740001', 'Harniati', 'Bo\'nia', '1974-09-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2678, '7304085909920001', 'Lina', 'Bo\'nia', '1992-09-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2752, '7304085910950001', 'Nana Marselah', 'Jeneponto', '1995-10-19', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2728, '7304086003700001', 'Rosdiana', 'Jeneponto', '1970-03-20', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2557, '7304086003990002', 'Sri Mariasti', 'Bo\'nia', '1999-03-20', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2735, '7304086007860001', 'Rasmila', 'jeneponto', '1986-07-20', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2520, '7304086101950001', 'Samsinar', 'Bo\'nia', '1995-01-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2713, '7304086107860002', 'Samsuarni', 'Bo\'nia', '1986-07-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2575, '7304086112870001', 'Samsuanti', 'Bo\'nia', '1987-12-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2483, '7304086201130002', 'Selvina', 'Bo\'nia', '2013-01-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `penduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `jalan`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `no_kk`, `pend_kk`, `pend_terakhir`, `pend_ditempuh`, `pekerjaan`, `status_perkawinan`, `status_dlm_keluarga`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`) VALUES
(2762, '7304086201800001', 'Samsiah', 'Jeneponto', '1980-01-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2511, '7304086206100003', 'Putri Natasyah', 'Bo\'nia', '2010-06-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2563, '7304086208870001', 'Syamsiah', 'Bo\'nia', '1987-08-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2691, '7304086210860002', 'Yulianti,S.Pd', 'Je\'neponto', '1986-10-22', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2506, '7304086302160001', 'Ira', 'Jeneponto', '2016-02-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2510, '7304086303060001', 'Nur Indayanti', 'Bo\'nia', '2006-03-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2627, '7304086306600001', 'Hj. Karenia', 'Jeneponto', '1960-06-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2660, '7304086307050001', 'Nur Fitrah', 'Jeneponto', '2005-07-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2599, '7304086307880001', 'Rahmi', 'Jenepont', '1988-07-23', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2618, '7304086404100001', 'Nur Cahya Putri', 'Jeneponto', '2010-04-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2768, '7304086404840003', 'Irma', 'Jeneponto', '1984-04-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2473, '7304086407600001', 'Mina', 'Mattoangin', '1960-07-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2558, '7304086408050002', 'Andini Agustiani', 'Bo\'nia', '2005-08-24', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2532, '7304086605070001', 'Inka Monika Pratami', 'Bo\'nia', '2007-05-26', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2576, '7304086701000002', 'Lisnawati', 'Bo\'nia', '2000-01-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2619, '7304086701140002', 'Hajra Pratiwi', 'Jeneponto', '2014-01-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2651, '7304086702900003', 'Mariani', 'Bo\'nia', '1990-02-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2659, '7304086706840002', 'Salma', 'Jeneponto', '1984-06-27', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2603, '7304086802060002', 'Qory Dwita', 'Kalumpang Loe', '2006-02-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2475, '7304086802750001', 'Sarsina', 'Bo\'nia', '1975-02-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2730, '7304086802990002', 'Ani', 'Bo\'nia', '1999-02-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2509, '7304086804020001', 'Marshanda', 'Bo\'nia', '2002-04-28', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2494, '7304086904070002', 'Hera Wardina', 'Bo\'nia', '2007-04-29', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2705, '7304087003170001', 'Nurul Salsabila', 'Jeneponto', '2017-03-30', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2732, '7304087010760003', 'Bulaeng, A.M.a', 'Jeneponto', '1976-10-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2796, '7304087010920000', 'Ekawati', 'Bo\'nia', '1992-10-30', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2504, '7304087110120002', 'Rini', 'Bo\'nia', '2012-10-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2706, '7304087112280002', 'Cami', 'Bo\'nia', '1928-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2761, '7304087112440003', 'Basse', 'Jeneponto', '1944-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2707, '7304087112500011', 'Joho', 'Bo\'nia', '1928-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2708, '7304087112530002', 'Kami', 'Bo\'nia', '1953-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2689, '7304087112600018', 'Patimasan', 'Bo\'nia', '1960-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2528, '7304087112690001', 'Salma', 'Karampangpajja', '1969-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2496, '7304087112700023', 'Sari', 'Bo\'nia', '1970-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2709, '7304111505840002', 'Sapiruddin', 'Borongloe', '1984-05-15', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2711, '7304112011110001', 'Rezaldi', 'Borongloe', '2011-11-20', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2710, '7304117112850066', 'Lia', 'Makassar', '1985-12-31', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2712, '7306073112910052', 'Syarifuddin Syam', 'Bontoa', '1989-07-24', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2666, '7371070201020007', 'Nandito', 'Jeneponto', '2002-01-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2663, '7371070210750012', 'Rudi', 'Jeneponto', '1975-10-02', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2665, '7371075503990009', 'Nadilah', 'Jeneponto', '1999-03-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2664, '7371075505800012', 'Hasnah', 'Jeneponto', '1980-05-15', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2690, '7371100607830015', 'Nasaruddin,S.Pd', 'Je\'neponto', '1963-07-06', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2777, '7371102302740015', 'Syamsuddin Itho', 'Makassar', '1974-02-23', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2760, '7371102903980006', 'Muh.Fadil Dalali', 'Pare-pare', '1970-01-01', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2759, '7371106108760009', 'Suraidah', 'Jeneponto', '1976-08-21', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2778, '7371106911760008', 'Karesunggu', 'Jeneponto', '1976-11-29', 'Perempuan', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', ''),
(2767, '7371143103820001', 'Achmad Fauzie', 'Jakarta', '1982-03-31', 'Laki-Laki', 'Islam', '', 'Bo\'nia', '', '', 'Bungungoe', 'Turatea', 'Jeneponto', '', '', '', '', '', '', '', '', '', '');

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
  `ttd_digital` varchar(350) DEFAULT NULL,
  `gambar_kop` varchar(350) DEFAULT NULL,
  `logo_desa` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profil_desa`
--

INSERT INTO `profil_desa` (`id_profil_desa`, `nama_desa`, `alamat`, `no_telpon`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `ttd_digital`, `gambar_kop`, `logo_desa`) VALUES
(1, 'Kelurahan Pallengu', 'Alamat : Bontosunggu Utara Desa Bungungloe Kec. Turatea Kabupaten Jeneponto', '', 'Kecamatan Binamu', 'Kabupaten Jeneponto', 'Sulawesi Selatan', '', 'barcode.png', '311122910_406575298308078_714964801078203355_n.png', 'Logo-Pangandaran.png');

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
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan`
--

INSERT INTO `surat_keterangan` (`id_sk`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(169, 'Surat Keterangan', '04/SK/KODE-DESA/VI/2025', '7304080811110001', 167, 'Nostrum et velit ame', '2025-06-21 21:42:36', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_beda_identitas`
--

INSERT INTO `surat_keterangan_beda_identitas` (`id_skbi`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `perbedaan`, `nama_kartu_identitas`, `nama_no_identitas`, `nama2`, `tgl_lahir2`, `jenis_kelamin2`, `alamat2`, `agama2`, `pekerjaan2`, `keterangan2`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(34, 'Surat Keterangan Beda Identitas', '04/SKBI/KODE-DESA/VI/2025', '7304080811110001', 168, 'Quo ipsa in dolorem', 'Enim laboris aperiam', 'Fugit pariatur Lab', 'Ullamco omnis delect', 'Quis quo nulla quam ', 'Perempuan', 'Aute consequatur do', 'Non veritatis explic', 'Do vel et ullam opti', 'Ipsam eos doloribus ', '2025-06-21 21:42:43', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_beda_identitas_kis`
--

INSERT INTO `surat_keterangan_beda_identitas_kis` (`id_skbis`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `keperluan`, `no_kartu`, `nama_di_kartu`, `nik2`, `alamat2`, `tanggal_lahir`, `faskes_tingkat`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(37, 'Surat Keterangan Beda Identitas KIS', '04/SKBIS/KODE-DESA/VI/2025', '7304080811110001', 169, 'Laboris officiis lab', 'Commodi magna volupt', 'Sequi quo et est al', 'Voluptatum possimus', 'Porro blanditiis dol', '0000-00-00', 'Ea duis et rerum dol', '2025-06-21 21:42:51', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_berkelakuan_baik`
--

INSERT INTO `surat_keterangan_berkelakuan_baik` (`id_skbb`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(22, 'Surat Keterangan Berkelakuan Baik', '04/SKBB/KODE-DESA/VI', '7304080811110001', 170, 'Repudiandae eum quae', '2025-06-21 21:42:58', 2, 'SELESAI', 1);

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
(106, 'Surat Keterangan Domisili', '04/SKD/KODE-DESA/VI/2025', '7304080811110001', 171, '2025-06-21 21:43:04', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_domisili_usaha`
--

INSERT INTO `surat_keterangan_domisili_usaha` (`id_skdu`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `jenis_usaha`, `alamat_usaha`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(54, 'Surat Keterangan Domisili Usaha', '04/SKDU/KODE-DESA/VI/2025', '7304080811110001', 172, 'Lorem in est unde q', 'Animi omnis elit q', '2025-06-21 21:43:11', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_kematian`
--

INSERT INTO `surat_keterangan_kematian` (`id_skk`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `tanggal_meninggal`, `bertempat_di`, `penyebab_kematian`, `nama_pelapor`, `nik_pelapor`, `tanggal_lahir_pelapor`, `pekerjaan_pelapor`, `alamat_pelapor`, `hubungan_pelapor`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(45, 'Surat Keterangan Kematian', '001/SKK/KODE-DESA/VI/2025', '7304080811110001', 173, 'Ipsum in quia volupt', 'Dolores a labore lab', 'Velit expedita enim ', 'Enim aliqua Cumque ', 'Ea nulla sint odit l', 'Autem ducimus verit', 'Illo et in molestiae', 'Quo est temporibus ', 'Consequatur quia au', '2025-06-21 21:43:18', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--

INSERT INTO `surat_keterangan_kepemilikan_kendaraan_bermotor` (`id_skkkb`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `roda`, `merk_type`, `jenis_model`, `tahun_pembuatan`, `cc`, `warna_cat`, `no_rangka`, `no_mesin`, `no_polisi`, `no_bpkb`, `atas_nama_pemilik`, `alamat_pemilik`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(16, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '04/SKKKB/KODE-DESA/VI/2025', '7304080811110001', 174, '', 'Veniam sint ad veli', 'Reiciendis rerum eli', 'Aperiam pariatur Ni', 'Saepe dignissimos mo', 'Ipsum debitis nisi ', 'Anim id at est con', 'Esse aliquam impedi', 'Non vitae voluptatum', 'Voluptatem asperiore', 'Quibusdam ullamco au', 'Esse animi asperna', 'Est adipisicing sit', '2025-06-21 21:43:28', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(67, 'Surat Keterangan Pengantar', '12/SKP/KODE-DESA/VI/2025', '7304080705020001', 190, 'Molestiae reprehende', '7 Hari', 'Voluptatibus natus q', '2025-06-21 22:07:52', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_penghasilan_orang_tua`
--

INSERT INTO `surat_keterangan_penghasilan_orang_tua` (`id_skpot`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `nomor_induk_siswa`, `jurusan_fakultas`, `sekolah_perguruan_tinggi`, `kelas_semester`, `nama_ayah`, `tgl_lahir2`, `nik2`, `jenis_kelamin2`, `agama2`, `pekerjaan2`, `alamat2`, `penghasilan_ayah`, `nama_ibu`, `tgl_lahir3`, `nik3`, `jenis_kelamin3`, `agama3`, `pekerjaan3`, `alamat3`, `penghasilan_ibu`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(27, 'Surat Keterangan Penghasilan Orang Tua', '04/SKPOT/KODE-DESA/VI/2025', '7304080811110001', 176, 'Sunt atque et qui el', 'Quia optio duis sus', 'Omnis omnis fugit q', 'Explicabo Sunt fug', 'Qui iure commodi bea', 'Dolore consectetur ', 'Magna aut non magni ', 'LAKI-LAKI', 'Sed alias earum ut q', 'Odit tempore et con', 'Minim est aliquid ob', 'Rp. 999,-', 'Mollitia et aperiam ', 'Incidunt excepteur ', 'Explicabo Ullam sit', 'LAKI-LAKI', 'Dignissimos quis nul', 'Reprehenderit qui q', 'Sequi cillum omnis n', 'Rp. 999,-', '2025-06-21 21:43:48', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_perhiasan`
--

INSERT INTO `surat_keterangan_perhiasan` (`id_skp`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `jenis_perhiasan`, `nama_perhiasan`, `berat`, `toko_perhiasan`, `lokasi_toko_perhiasan`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(15, 'Surat Keterangan Perhiasan', '005/SKP/KODE-DESA/VII/2025', '7304080811110001', 177, 'Etnik', 'Culpa ut in id sit', 'Offic', 'Enim est ad quo ea n', 'Praesentium maiores ', 'Veritatis sapiente n', '2025-06-21 21:43:57', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_tidak_mampu`
--

CREATE TABLE `surat_keterangan_tidak_mampu` (
  `id_sktm` int(11) NOT NULL,
  `jenis_surat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_surat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
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

INSERT INTO `surat_keterangan_tidak_mampu` (`id_sktm`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `alamat`, `pekerjaan`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(26, 'Surat Keterangan Tidak Mampu', '005/SKTM/KODE-DESA/VII/2025', '7304080811110001', 178, ', RT/RW, Dusun Bo\'nia,\r\nDesa Bungungoe, Kecamatan ', '', 'Voluptas eum elit i', '2025-06-21 21:44:05', 2, 'SELESAI', 1),
(27, 'Surat Keterangan Tidak Mampu', '06/SKTM/KODE-DESA/VII/2025', '7304080811110001', 191, ', RT/RW, Dusun Bo\'nia,\r\nDesa Bungungoe, Kecamatan ', '', 'Enim autem cupiditat', '2025-06-21 22:09:11', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_keterangan_usaha`
--

INSERT INTO `surat_keterangan_usaha` (`id_sku`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `usaha`, `alamat_usaha`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(32, 'Surat Keterangan Usaha', '001/SKU/KODE-DESA/VI/2025', '7304080811110001', 179, 'Soluta culpa deseru', 'Commodi qui dolor ad', 'In quisquam eius iur', '2025-06-21 21:44:12', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_lapor_hajatan`
--

INSERT INTO `surat_lapor_hajatan` (`id_slh`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `bukti_ktp`, `bukti_kk`, `jenis_hajat`, `hari`, `tanggal`, `jenis_hiburan`, `pemilik`, `alamat_pemilik`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(15, 'Surat Lapor Hajatan', '005/SLH/KODE-DESA/VII/2025', '7304080811110001', 180, 'Ut aliqua Qui p', 'Delectus nihil ', 'Tasyakuran', 'Jum\'at', '1985-03-21 00:00:00', 'Ducimus et rerum be', 'Dolor aut in vitae v', 'Ab duis maxime nesci', '2025-06-21 21:44:19', 2, 'SELESAI', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_pengantar_skck`
--

INSERT INTO `surat_pengantar_skck` (`id_sps`, `jenis_surat`, `no_surat`, `nik`, `id_arsip`, `bukti_ktp`, `bukti_kk`, `keperluan`, `keterangan`, `masa_berlaku`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(18, 'Surat Pengantar SKCK', '001/SPS/KODE-DESA/VI/2025', '7304080811110001', 183, 'Illum maxime im', 'Ad doloribus nul', 'Permohonan SKCK', 'Ad sequi eiusmod nos', '3 Hari', '2025-06-21 21:44:43', 2, 'SELESAI', 1);

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
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formulir_pengantar_nikah`
--
ALTER TABLE `formulir_pengantar_nikah`
  MODIFY `id_fpn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `formulir_permohonan_kehendak_nikah`
--
ALTER TABLE `formulir_permohonan_kehendak_nikah`
  MODIFY `id_fpkn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `formulir_persetujuan_calon_pengantin`
--
ALTER TABLE `formulir_persetujuan_calon_pengantin`
  MODIFY `id_fpcp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `formulir_persetujuan_calon_pengantin_istri`
--
ALTER TABLE `formulir_persetujuan_calon_pengantin_istri`
  MODIFY `id_fpcp2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `formulir_surat_izin_orang_tua`
--
ALTER TABLE `formulir_surat_izin_orang_tua`
  MODIFY `id_fsiot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3460;

--
-- AUTO_INCREMENT for table `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id_profil_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `surat_keterangan_beda_identitas`
--
ALTER TABLE `surat_keterangan_beda_identitas`
  MODIFY `id_skbi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `surat_keterangan_beda_identitas_kis`
--
ALTER TABLE `surat_keterangan_beda_identitas_kis`
  MODIFY `id_skbis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `surat_keterangan_berkelakuan_baik`
--
ALTER TABLE `surat_keterangan_berkelakuan_baik`
  MODIFY `id_skbb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `surat_keterangan_domisili`
--
ALTER TABLE `surat_keterangan_domisili`
  MODIFY `id_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `surat_keterangan_domisili_usaha`
--
ALTER TABLE `surat_keterangan_domisili_usaha`
  MODIFY `id_skdu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `surat_keterangan_kematian`
--
ALTER TABLE `surat_keterangan_kematian`
  MODIFY `id_skk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `surat_keterangan_kematian_dan_penguburan`
--
ALTER TABLE `surat_keterangan_kematian_dan_penguburan`
  MODIFY `id_skkp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--
ALTER TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor`
  MODIFY `id_skkkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `surat_keterangan_pengantar`
--
ALTER TABLE `surat_keterangan_pengantar`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `surat_keterangan_penghasilan_orang_tua`
--
ALTER TABLE `surat_keterangan_penghasilan_orang_tua`
  MODIFY `id_skpot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `surat_keterangan_perhiasan`
--
ALTER TABLE `surat_keterangan_perhiasan`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `surat_keterangan_tidak_mampu`
--
ALTER TABLE `surat_keterangan_tidak_mampu`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  MODIFY `id_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `surat_lapor_hajatan`
--
ALTER TABLE `surat_lapor_hajatan`
  MODIFY `id_slh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `surat_pengantar_hewan`
--
ALTER TABLE `surat_pengantar_hewan`
  MODIFY `id_sph` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `surat_pengantar_skck`
--
ALTER TABLE `surat_pengantar_skck`
  MODIFY `id_sps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
