-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 10:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getDeleteDataLogStudent` ()  begin
			delete from log_student where id % 2 <> 0;
			end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `printInvoice` (IN `getNis` VARCHAR(64))  begin
    SELECT a.nis, b.student_name, b.class, b.jenis_kelamin, c.fullname, a.spp_status, a.tanggal, a.admin FROM transaksi as a join student as b on a.nis = b.nis join wclass as c on b.class = c.class where a.nis = getNis;
    end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `current_spp`
--

CREATE TABLE `current_spp` (
  `nis` varchar(128) NOT NULL,
  `current_duedate` date DEFAULT NULL,
  `current_status` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current_spp`
--

INSERT INTO `current_spp` (`nis`, `current_duedate`, `current_status`) VALUES
('124578', '2022-06-15', 'Belum Lunas'),
('142536', '2022-06-22', 'Belum Lunas'),
('143625', '2022-06-22', 'Belum Lunas'),
('253647', '2022-06-22', 'Belum Lunas'),
('475869', '2022-06-22', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(1, 'L'),
(2, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `log_student`
--

CREATE TABLE `log_student` (
  `id` int(11) NOT NULL,
  `nis` varchar(128) DEFAULT NULL,
  `old_name` varchar(255) DEFAULT NULL,
  `old_class` varchar(8) DEFAULT NULL,
  `old_period` varchar(128) DEFAULT NULL,
  `old_duedate` date DEFAULT NULL,
  `old_spp_cost` int(11) DEFAULT NULL,
  `new_name` varchar(255) DEFAULT NULL,
  `new_class` varchar(8) DEFAULT NULL,
  `new_period` varchar(128) DEFAULT NULL,
  `new_duedate` date DEFAULT NULL,
  `new_spp_cost` int(11) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_student`
--

INSERT INTO `log_student` (`id`, `nis`, `old_name`, `old_class`, `old_period`, `old_duedate`, `old_spp_cost`, `new_name`, `new_class`, `new_period`, `new_duedate`, `new_spp_cost`, `status`, `tanggal`, `admin`) VALUES
(139, '112211', NULL, NULL, NULL, NULL, NULL, 'Nishimiya', '10-C', '2021-2022', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-10 14:55:31', 'Afila Ansori'),
(140, '112211', 'Nishimiya', '10-C', '2021-2022', '2022-06-15', 250000, 'Nishimiya', '11-A', '2021-2022', '2022-06-15', 250000, 'Merubah Data Siswa', '2022-06-10 14:55:53', 'Afila Ansori'),
(141, '112211', 'Nishimiya', '11-A', '2021-2022', '2022-06-15', 250000, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-10 14:56:18', 'Afila Ansori'),
(142, '164888', NULL, NULL, NULL, NULL, NULL, 'Nishimiya', '10-B', '2021-2022', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-10 16:18:05', 'Afila Ansori'),
(143, '164888', 'Nishimiya', '10-B', '2021-2022', '2022-06-15', 250000, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-10 18:40:39', 'Afila Ansori'),
(144, '202020', NULL, NULL, NULL, NULL, NULL, 'Dada', '10-F', '2020 - 2021', '0000-00-00', 250000, 'Memasukkan Data Siswa', '2022-06-11 15:56:26', 'Afila Ansori'),
(145, '212121', NULL, NULL, NULL, NULL, NULL, 'Didi', '11-F', '2020 - 2021', '0000-00-00', 250000, 'Memasukkan Data Siswa', '2022-06-11 15:56:26', 'Afila Ansori'),
(146, '222222', NULL, NULL, NULL, NULL, NULL, 'Dede', '12-F', '2020 - 2021', '0000-00-00', 250000, 'Memasukkan Data Siswa', '2022-06-11 15:56:26', 'Afila Ansori'),
(147, '202020', 'Dada', '10-F', '2020 - 2021', '0000-00-00', 250000, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-11 16:16:36', 'Afila Ansori'),
(148, '212121', 'Didi', '11-F', '2020 - 2021', '0000-00-00', 250000, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-11 16:16:42', 'Afila Ansori'),
(149, '222222', 'Dede', '12-F', '2020 - 2021', '0000-00-00', 250000, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-11 16:16:48', 'Afila Ansori'),
(150, '202020', NULL, NULL, NULL, NULL, NULL, 'Dada', '10-F', '2020 - 2021', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-11 16:17:31', 'Afila Ansori'),
(151, '212121', NULL, NULL, NULL, NULL, NULL, 'Didi', '11-F', '2020 - 2021', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-11 16:17:31', 'Afila Ansori'),
(152, '222222', NULL, NULL, NULL, NULL, NULL, 'Dede', '12-F', '2020 - 2021', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-11 16:17:31', 'Afila Ansori'),
(153, '228877', NULL, NULL, NULL, NULL, NULL, 'Sarah', '11-F', '2021-2022', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-11 22:33:04', 'Afila Ansori'),
(154, '228877', 'Sarah', '11-F', '2021-2022', '2022-06-15', 250000, 'Sarah', '10-A', '2021-2022', '2022-06-15', 250000, 'Merubah Data Siswa', '2022-06-11 22:47:18', 'Afila Ansori'),
(155, '221111', NULL, NULL, NULL, NULL, NULL, 'Nishimiya', '10-C', '2021-2022', '2022-06-16', 250000, 'Memasukkan Data Siswa', '2022-06-12 14:17:02', 'Afila Ansori'),
(156, '221111', 'Nishimiya', '10-C', '2021-2022', '2022-06-16', 250000, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 14:17:58', 'Afila Ansori'),
(157, '202020', 'Dada', '10-F', '2020 - 2021', '2022-07-15', 250000, 'Dada', '10-F', '2022-2023', '2022-07-15', 250000, 'Merubah Data Siswa', '2022-06-12 14:19:29', 'Afila Ansori'),
(158, '221111', 'Himura Kenshin', '10-A', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:16:10', 'Afila Ansori'),
(159, '221111', 'Nagakura Shinpachi', '10-E', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:16:10', 'Afila Ansori'),
(160, '221111', 'Okita Souji', '10-B', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:16:10', 'Afila Ansori'),
(161, '221111', 'Dada', '10-F', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:16:10', 'Afila Ansori'),
(162, '221111', 'Didi', '11-F', '2020 - 2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:16:10', 'Afila Ansori'),
(163, '221111', 'Dede', '12-F', '2020 - 2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:16:10', 'Afila Ansori'),
(164, '221111', 'Sarah', '10-A', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:16:10', 'Afila Ansori'),
(165, '221111', 'Hijikata Toshizou', '10-C', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:16:10', 'Afila Ansori'),
(166, '221111', 'Oda Ooichi', '10-D', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:16:10', 'Afila Ansori'),
(167, '200453', NULL, NULL, NULL, NULL, NULL, 'Yor', '10-F', '2020-2021', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:47', 'Afila Ansori'),
(168, '234545', NULL, NULL, NULL, NULL, NULL, 'Loid', '11-F', '2020-2021', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:48', 'Afila Ansori'),
(169, '232525', NULL, NULL, NULL, NULL, NULL, 'Kazuto', '12-F', '2020-2021', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:48', 'Afila Ansori'),
(170, '224455', NULL, NULL, NULL, NULL, NULL, 'Mikazuki', '12-F', '2021-2022', '2022-06-16', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:48', 'Afila Ansori'),
(171, '225325', NULL, NULL, NULL, NULL, NULL, 'Abe', '10-B', '2022-2023', '2022-06-17', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:48', 'Afila Ansori'),
(172, '221322', NULL, NULL, NULL, NULL, NULL, 'Ogata', '10-A', '2021-2022', '2022-06-18', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:49', 'Afila Ansori'),
(173, '241241', NULL, NULL, NULL, NULL, NULL, 'Chizuru', '10-A', '2021-2022', '2022-06-19', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:49', 'Afila Ansori'),
(174, '222241', NULL, NULL, NULL, NULL, NULL, 'Anya', '10-B', '2021-2022', '2022-06-20', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:49', 'Afila Ansori'),
(175, '231312', NULL, NULL, NULL, NULL, NULL, 'Tsukihime', '10-C', '2021-2022', '2022-06-21', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:49', 'Afila Ansori'),
(176, '234243', NULL, NULL, NULL, NULL, NULL, 'Shin', '10-C', '2021-2022', '2022-06-22', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:49', 'Afila Ansori'),
(177, '214189', NULL, NULL, NULL, NULL, NULL, 'Shiba', '10-D', '2021-2022', '2022-06-23', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:49', 'Afila Ansori'),
(178, '224230', NULL, NULL, NULL, NULL, NULL, 'Mafu', '11-A', '2021-2022', '2022-06-24', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:49', 'Afila Ansori'),
(179, '244546', NULL, NULL, NULL, NULL, NULL, 'Uzuru', '10-D', '2021-2022', '2022-06-25', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:50', 'Afila Ansori'),
(180, '233345', NULL, NULL, NULL, NULL, NULL, 'Izann', '10-E', '2021-2022', '2022-06-26', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:50', 'Afila Ansori'),
(181, '222345', NULL, NULL, NULL, NULL, NULL, 'Yuri', '10-E', '2021-2022', '2022-06-27', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:50', 'Afila Ansori'),
(182, '289643', NULL, NULL, NULL, NULL, NULL, 'Megumin', '11-F', '2021-2022', '2022-06-28', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:50', 'Afila Ansori'),
(183, '234455', NULL, NULL, NULL, NULL, NULL, 'Shintaro', '10-F', '2021-2022', '2022-06-29', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:50', 'Afila Ansori'),
(184, '233335', NULL, NULL, NULL, NULL, NULL, 'Asuna', '12-A', '2021-2022', '2022-06-30', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:50', 'Afila Ansori'),
(185, '234567', NULL, NULL, NULL, NULL, NULL, 'Yuuto', '11-A', '2021-2022', '2022-07-01', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:51', 'Afila Ansori'),
(186, '234457', NULL, NULL, NULL, NULL, NULL, 'Oreki', '11-B', '2021-2022', '2022-07-02', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:51', 'Afila Ansori'),
(187, '223556', NULL, NULL, NULL, NULL, NULL, 'Mayu', '11-D', '2022-2023', '2022-07-03', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:51', 'Afila Ansori'),
(188, '298087', NULL, NULL, NULL, NULL, NULL, 'Kurumi', '11-C', '2022-2023', '2022-07-04', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:51', 'Afila Ansori'),
(189, '276450', NULL, NULL, NULL, NULL, NULL, 'Saitama', '11-A', '2022-2023', '2022-07-05', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:51', 'Afila Ansori'),
(190, '267880', NULL, NULL, NULL, NULL, NULL, 'Odama', '11-D', '2022-2023', '2022-07-06', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:51', 'Afila Ansori'),
(191, '276976', NULL, NULL, NULL, NULL, NULL, 'Oguro', '11-E', '2022-2023', '2022-07-07', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:52', 'Afila Ansori'),
(192, '287869', NULL, NULL, NULL, NULL, NULL, 'Lola', '12-A', '2022-2023', '2022-07-08', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:52', 'Afila Ansori'),
(193, '287868', NULL, NULL, NULL, NULL, NULL, 'Bojji', '12-B', '2022-2023', '2022-07-09', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:52', 'Afila Ansori'),
(194, '286759', NULL, NULL, NULL, NULL, NULL, 'Yukihime', '12-D', '2022-2023', '2022-07-10', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:53', 'Afila Ansori'),
(195, '278886', NULL, NULL, NULL, NULL, NULL, 'Kurama', '12-C', '2022-2023', '2022-07-11', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:53', 'Afila Ansori'),
(196, '265875', NULL, NULL, NULL, NULL, NULL, 'Ruri', '12-E', '2022-2023', '2022-07-13', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:54', 'Afila Ansori'),
(197, '255666', NULL, NULL, NULL, NULL, NULL, 'Tohsaka', '12-B', '2022-2023', '2022-07-14', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:54', 'Afila Ansori'),
(198, '243443', NULL, NULL, NULL, NULL, NULL, 'Kazuma', '12-C', '2022-2023', '2022-07-15', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:54', 'Afila Ansori'),
(199, '223412', NULL, NULL, NULL, NULL, NULL, 'Rei', '12-E', '2022-2023', '2022-07-16', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:38:55', 'Afila Ansori'),
(200, '221111', 'Yor', '10-F', '2020-2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(201, '221111', 'Shiba', '10-D', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(202, '221111', 'Ogata', '10-A', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(203, '221111', 'Anya', '10-B', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(204, '221111', 'Yuri', '10-E', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(205, '221111', 'Rei', '12-E', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(206, '221111', 'Mayu', '11-D', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(207, '221111', 'Mafu', '11-A', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(208, '221111', 'Mikazuki', '12-F', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(209, '221111', 'Abe', '10-B', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(210, '221111', 'Tsukihime', '10-C', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(211, '221111', 'Kazuto', '12-F', '2020-2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(212, '221111', 'Asuna', '12-A', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(213, '221111', 'Izann', '10-E', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(214, '221111', 'Shin', '10-C', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(215, '221111', 'Shintaro', '10-F', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(216, '221111', 'Oreki', '11-B', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(217, '221111', 'Loid', '11-F', '2020-2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(218, '221111', 'Yuuto', '11-A', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(219, '221111', 'Chizuru', '10-A', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(220, '221111', 'Kazuma', '12-C', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(221, '221111', 'Uzuru', '10-D', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(222, '221111', 'Tohsaka', '12-B', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(223, '221111', 'Ruri', '12-E', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(224, '221111', 'Odama', '11-D', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(225, '221111', 'Saitama', '11-A', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(226, '221111', 'Oguro', '11-E', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(227, '221111', 'Kurama', '12-C', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(228, '221111', 'Yukihime', '12-D', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(229, '221111', 'Bojji', '12-B', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(230, '221111', 'Lola', '12-A', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(231, '221111', 'Megumin', '11-F', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(232, '221111', 'Kurumi', '11-C', '2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-06-12 15:41:19', 'Afila Ansori'),
(233, '200453', NULL, NULL, NULL, NULL, NULL, 'Yor', '10-F', '2020-2021', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:12', 'Afila Ansori'),
(234, '234545', NULL, NULL, NULL, NULL, NULL, 'Loid', '11-F', '2020-2021', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:12', 'Afila Ansori'),
(235, '232525', NULL, NULL, NULL, NULL, NULL, 'Kazuto', '12-F', '2020-2021', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:12', 'Afila Ansori'),
(236, '224455', NULL, NULL, NULL, NULL, NULL, 'Mikazuki', '12-F', '2021-2022', '2022-06-16', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:12', 'Afila Ansori'),
(237, '225325', NULL, NULL, NULL, NULL, NULL, 'Abe', '10-B', '2022-2023', '2022-06-17', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:12', 'Afila Ansori'),
(238, '221322', NULL, NULL, NULL, NULL, NULL, 'Ogata', '10-A', '2021-2022', '2022-06-18', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:13', 'Afila Ansori'),
(239, '241241', NULL, NULL, NULL, NULL, NULL, 'Chizuru', '10-A', '2021-2022', '2022-06-19', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:13', 'Afila Ansori'),
(240, '222241', NULL, NULL, NULL, NULL, NULL, 'Anya', '10-B', '2021-2022', '2022-06-20', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:13', 'Afila Ansori'),
(241, '231312', NULL, NULL, NULL, NULL, NULL, 'Tsukihime', '10-C', '2021-2022', '2022-06-21', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:13', 'Afila Ansori'),
(242, '234243', NULL, NULL, NULL, NULL, NULL, 'Shin', '10-C', '2021-2022', '2022-06-22', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:14', 'Afila Ansori'),
(243, '214189', NULL, NULL, NULL, NULL, NULL, 'Shiba', '10-D', '2021-2022', '2022-06-23', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:14', 'Afila Ansori'),
(244, '224230', NULL, NULL, NULL, NULL, NULL, 'Mafu', '11-A', '2021-2022', '2022-06-24', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:14', 'Afila Ansori'),
(245, '244546', NULL, NULL, NULL, NULL, NULL, 'Uzuru', '10-D', '2021-2022', '2022-06-25', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:14', 'Afila Ansori'),
(246, '233345', NULL, NULL, NULL, NULL, NULL, 'Izann', '10-E', '2021-2022', '2022-06-26', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:15', 'Afila Ansori'),
(247, '222345', NULL, NULL, NULL, NULL, NULL, 'Yuri', '10-E', '2021-2022', '2022-06-27', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:15', 'Afila Ansori'),
(248, '289643', NULL, NULL, NULL, NULL, NULL, 'Megumin', '11-F', '2021-2022', '2022-06-28', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:15', 'Afila Ansori'),
(249, '234455', NULL, NULL, NULL, NULL, NULL, 'Shintaro', '10-F', '2021-2022', '2022-06-29', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:15', 'Afila Ansori'),
(250, '233335', NULL, NULL, NULL, NULL, NULL, 'Asuna', '12-A', '2021-2022', '2022-06-30', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:16', 'Afila Ansori'),
(251, '234567', NULL, NULL, NULL, NULL, NULL, 'Yuuto', '11-A', '2021-2022', '2022-06-01', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:16', 'Afila Ansori'),
(252, '234457', NULL, NULL, NULL, NULL, NULL, 'Oreki', '11-B', '2021-2022', '2022-06-02', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:16', 'Afila Ansori'),
(253, '223556', NULL, NULL, NULL, NULL, NULL, 'Mayu', '11-D', '2022-2023', '2022-06-03', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:16', 'Afila Ansori'),
(254, '298087', NULL, NULL, NULL, NULL, NULL, 'Kurumi', '11-C', '2022-2023', '2022-06-04', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:17', 'Afila Ansori'),
(255, '276450', NULL, NULL, NULL, NULL, NULL, 'Saitama', '11-A', '2022-2023', '2022-06-05', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:17', 'Afila Ansori'),
(256, '267880', NULL, NULL, NULL, NULL, NULL, 'Odama', '11-D', '2022-2023', '2022-06-06', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:17', 'Afila Ansori'),
(257, '276976', NULL, NULL, NULL, NULL, NULL, 'Oguro', '11-E', '2022-2023', '2022-06-07', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:18', 'Afila Ansori'),
(258, '287869', NULL, NULL, NULL, NULL, NULL, 'Lola', '12-A', '2022-2023', '2022-06-08', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:18', 'Afila Ansori'),
(259, '287868', NULL, NULL, NULL, NULL, NULL, 'Bojji', '12-B', '2022-2023', '2022-06-09', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:18', 'Afila Ansori'),
(260, '286759', NULL, NULL, NULL, NULL, NULL, 'Yukihime', '12-D', '2022-2023', '2022-06-10', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:18', 'Afila Ansori'),
(261, '278886', NULL, NULL, NULL, NULL, NULL, 'Kurama', '12-C', '2022-2023', '2022-06-11', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:19', 'Afila Ansori'),
(262, '265875', NULL, NULL, NULL, NULL, NULL, 'Ruri', '12-E', '2022-2023', '2022-06-13', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:19', 'Afila Ansori'),
(263, '255666', NULL, NULL, NULL, NULL, NULL, 'Tohsaka', '12-B', '2022-2023', '2022-06-14', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:19', 'Afila Ansori'),
(264, '243443', NULL, NULL, NULL, NULL, NULL, 'Kazuma', '12-C', '2022-2023', '2022-06-15', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:19', 'Afila Ansori'),
(265, '223412', NULL, NULL, NULL, NULL, NULL, 'Rei', '12-E', '2022-2023', '2022-06-16', 250000, 'Memasukkan Data Siswa', '2022-06-12 15:43:20', 'Afila Ansori');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `id` int(11) NOT NULL,
  `old_name` varchar(255) DEFAULT NULL,
  `old_username` varchar(255) DEFAULT NULL,
  `old_role` varchar(64) DEFAULT NULL,
  `old_password` varchar(255) DEFAULT NULL,
  `new_name` varchar(255) DEFAULT NULL,
  `new_username` varchar(255) DEFAULT NULL,
  `new_role` varchar(64) DEFAULT NULL,
  `new_password` varchar(255) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`id`, `old_name`, `old_username`, `old_role`, `old_password`, `new_name`, `new_username`, `new_role`, `new_password`, `status`, `tanggal`, `admin`) VALUES
(10, 'a', 'walikelas', 'a', 'a', NULL, NULL, NULL, NULL, 'Menghapus Data User', '2022-06-01 14:29:51', 'Afila Ansori'),
(11, 'John', 'admin', 'j0hn', 'root', NULL, NULL, NULL, NULL, 'Menghapus Data User', '2022-06-01 14:29:51', 'Afila Ansori'),
(12, 'Jeanne', 'walikelas', 'root', 'root', NULL, NULL, NULL, NULL, 'Menghapus Data User', '2022-06-01 14:29:51', 'Afila Ansori'),
(13, NULL, NULL, NULL, NULL, 'Larry Page', 'lp3', 'admin', 'root', 'Memasukkan Data User', '2022-06-01 14:32:18', 'Afila Ansori'),
(14, NULL, NULL, NULL, NULL, 'Dian Angraini', 'dian', 'walikelas', 'root', 'Memasukkan Data User', '2022-06-01 14:33:33', 'Afila Ansori'),
(29, 'Larry Page', 'larry', 'admin', 'root', 'Larry Page', 'larry', 'walikelas', 'root', 'Merubah Data User', '2022-06-01 17:47:34', 'Afila Ansori'),
(30, 'Larry Page', 'larry', 'walikelas', 'root', 'Larry Page', 'larry', 'admin', 'root', 'Merubah Data User', '2022-06-01 19:55:14', 'Afila Ansori'),
(31, NULL, NULL, NULL, NULL, 'Administrator', 'admin', 'admin', 'admin', 'Memasukkan Data User', '2022-06-04 21:20:00', 'Afila Ansori'),
(32, 'Administrator', 'admin', 'admin', 'admin', 'Quinella', 'admin', 'admin', 'admin', 'Merubah Data User', '2022-06-04 21:29:00', 'Afila Ansori'),
(33, 'Quinella', 'admin', 'admin', 'admin', 'Administator', 'admin', 'admin', 'admin', 'Merubah Data User', '2022-06-04 21:30:27', 'Afila Ansori'),
(34, 'Administator', 'admin', 'admin', 'admin', 'Quinella', 'admin', 'admin', 'admin', 'Merubah Data User', '2022-06-04 21:36:23', 'Afila Ansori'),
(35, 'Quinella', 'admin', 'admin', 'admin', 'Administator', 'admin', 'admin', 'admin', 'Merubah Data User', '2022-06-04 21:43:55', 'Afila Ansori'),
(36, 'Administator', 'admin', 'admin', 'admin', NULL, NULL, NULL, NULL, 'Menghapus Data User', '2022-06-04 22:13:05', 'Afila Ansori'),
(37, NULL, NULL, NULL, NULL, 'Administator', 'admin', 'admin', 'admin', 'Memasukkan Data User', '2022-06-04 23:39:38', 'Afila Ansori'),
(38, 'Administator', 'admin', 'admin', 'admin', 'Quinella', 'admin', 'admin', 'admin', 'Merubah Data User', '2022-06-04 23:39:48', 'Afila Ansori'),
(39, 'Quinella', 'admin', 'admin', 'admin', NULL, NULL, NULL, NULL, 'Menghapus Data User', '2022-06-04 23:39:54', 'Afila Ansori'),
(40, NULL, NULL, NULL, NULL, 'h', 'h', 'walikelas', 'h', 'Memasukkan Data User', '2022-06-10 11:17:06', 'Afila Ansori'),
(41, 'h', 'h', 'walikelas', 'h', 'h', 'r', 'walikelas', 'h', 'Merubah Data User', '2022-06-10 11:17:15', 'Afila Ansori'),
(42, 'h', 'r', 'walikelas', 'h', NULL, NULL, NULL, NULL, 'Menghapus Data User', '2022-06-10 11:17:23', 'Afila Ansori'),
(43, 'Dian Angraini', 'dian', 'admin', 'root', 'Dian Angraini', 'dian', 'walikelas', 'root', 'Merubah Data User', '2022-06-11 22:42:06', 'Afila Ansori'),
(44, 'Dian Angraini', 'dian', 'walikelas', 'root', 'Dian Anggraini', 'dian', 'walikelas', 'root', 'Merubah Data User', '2022-06-11 22:51:06', 'Afila Ansori');

-- --------------------------------------------------------

--
-- Table structure for table `log_wclass`
--

CREATE TABLE `log_wclass` (
  `id` int(11) NOT NULL,
  `old_name` varchar(255) DEFAULT NULL,
  `old_class` varchar(8) DEFAULT NULL,
  `new_name` varchar(255) DEFAULT NULL,
  `new_class` varchar(8) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_wclass`
--

INSERT INTO `log_wclass` (`id`, `old_name`, `old_class`, `new_name`, `new_class`, `status`, `tanggal`, `admin`) VALUES
(8, 'Larry Page', '10-A', NULL, NULL, 'Menghapus Data Walikelas', '2022-06-01 14:29:59', 'Afila Ansori'),
(9, 'Barron Jeggaer', '10-B', NULL, NULL, 'Menghapus Data Walikelas', '2022-06-01 14:29:59', 'Afila Ansori'),
(10, NULL, NULL, 'Dian Angraini', '10-A', 'Memasukkan Data Walikelas', '2022-06-01 14:43:20', 'Afila Ansori'),
(11, NULL, NULL, 'Barron Jeggaer', '10-B', 'Memasukkan Data Walikelas', '2022-06-01 14:43:39', 'Afila Ansori'),
(12, NULL, NULL, 'Larry Page', '10-C', 'Memasukkan Data Walikelas', '2022-06-01 14:43:49', 'Afila Ansori'),
(13, 'Larry Page', '10-C', 'Larry Page', '10-D', 'Merubah Data Walikelas', '2022-06-01 14:46:19', 'Afila Ansori'),
(14, NULL, NULL, 'Dante', '10-C', 'Memasukkan Data Walikelas', '2022-06-01 15:30:11', 'Afila Ansori'),
(15, 'Dante', '10-C', 'Dante', '10-E', 'Merubah Data Walikelas', '2022-06-01 15:30:26', 'Afila Ansori'),
(16, NULL, NULL, 'Away', '10-C', 'Memasukkan Data Walikelas', '2022-06-01 15:38:43', 'Afila Ansori'),
(17, NULL, NULL, 'Vergil', '11-A', 'Memasukkan Data Walikelas', '2022-06-04 23:40:19', 'Afila Ansori'),
(18, NULL, NULL, 'Quinella', '12-A', 'Memasukkan Data Walikelas', '2022-06-04 23:47:50', 'Afila Ansori'),
(19, 'Quinella', '12-A', 'Quinella', '12-B', 'Merubah Data Walikelas', '2022-06-04 23:48:02', 'Afila Ansori'),
(20, 'Quinella', '12-B', NULL, NULL, 'Menghapus Data Walikelas', '2022-06-04 23:51:40', 'Afila Ansori'),
(21, NULL, NULL, 'Quinella', '12-A', 'Memasukkan Data Walikelas', '2022-06-04 23:52:12', 'Afila Ansori'),
(22, 'Quinella', '12-A', NULL, NULL, 'Menghapus Data Walikelas', '2022-06-04 23:52:18', 'Afila Ansori'),
(23, NULL, NULL, 'baba', '12-D', 'Memasukkan Data Walikelas', '2022-06-05 14:04:52', 'Afila Ansori'),
(24, 'baba', '12-D', 'baba', '10-F', 'Merubah Data Walikelas', '2022-06-05 14:05:15', 'Afila Ansori'),
(25, 'baba', '10-F', NULL, NULL, 'Menghapus Data Walikelas', '2022-06-05 14:05:26', 'Afila Ansori'),
(26, NULL, NULL, 'n', '11-F', 'Memasukkan Data Walikelas', '2022-06-10 11:17:38', 'Afila Ansori'),
(27, 'n', '11-F', NULL, NULL, 'Menghapus Data Walikelas', '2022-06-10 11:17:45', 'Afila Ansori'),
(28, NULL, NULL, 'Hendriyana', '10-F', 'Memasukkan Data Walikelas', '2022-06-11 16:12:10', 'Afila Ansori'),
(29, NULL, NULL, 'M.Iqbal A', '11-F', 'Memasukkan Data Walikelas', '2022-06-11 16:12:10', 'Afila Ansori'),
(30, NULL, NULL, 'Deden', '12-F', 'Memasukkan Data Walikelas', '2022-06-11 16:12:10', 'Afila Ansori'),
(31, 'Dian Angraini', '10-A', 'Dian Anggraini', 'null', 'Merubah Data Walikelas', '2022-06-11 22:23:56', 'Afila Ansori'),
(32, 'Dian Anggraini', 'null', 'Dian Anggraini', '10-A', 'Merubah Data Walikelas', '2022-06-11 22:24:15', 'Afila Ansori'),
(33, NULL, NULL, 'Bagas', '10-A', 'Memasukkan Data Walikelas', '2022-06-12 15:37:27', 'Afila Ansori'),
(34, NULL, NULL, 'Bagus', '10-B', 'Memasukkan Data Walikelas', '2022-06-12 15:37:27', 'Afila Ansori'),
(35, NULL, NULL, 'Budi', '10-C', 'Memasukkan Data Walikelas', '2022-06-12 15:37:27', 'Afila Ansori'),
(36, NULL, NULL, 'Deni', '10-D', 'Memasukkan Data Walikelas', '2022-06-12 15:37:28', 'Afila Ansori'),
(37, NULL, NULL, 'Anisa', '10-E', 'Memasukkan Data Walikelas', '2022-06-12 15:37:28', 'Afila Ansori'),
(38, NULL, NULL, 'Alia', '10-F', 'Memasukkan Data Walikelas', '2022-06-12 15:37:28', 'Afila Ansori'),
(39, NULL, NULL, 'Satou', '11-A', 'Memasukkan Data Walikelas', '2022-06-12 15:37:29', 'Afila Ansori'),
(40, NULL, NULL, 'Satoshi', '11-B', 'Memasukkan Data Walikelas', '2022-06-12 15:37:29', 'Afila Ansori'),
(41, NULL, NULL, 'Hikari', '11-C', 'Memasukkan Data Walikelas', '2022-06-12 15:37:29', 'Afila Ansori'),
(42, NULL, NULL, 'Haru', '11-D', 'Memasukkan Data Walikelas', '2022-06-12 15:37:29', 'Afila Ansori'),
(43, NULL, NULL, 'Fuka', '11-E', 'Memasukkan Data Walikelas', '2022-06-12 15:37:29', 'Afila Ansori'),
(44, NULL, NULL, 'Majime', '11-F', 'Memasukkan Data Walikelas', '2022-06-12 15:37:29', 'Afila Ansori'),
(45, NULL, NULL, 'Albert', '12-A', 'Memasukkan Data Walikelas', '2022-06-12 15:37:30', 'Afila Ansori'),
(46, NULL, NULL, 'Michael', '12-B', 'Memasukkan Data Walikelas', '2022-06-12 15:37:30', 'Afila Ansori'),
(47, NULL, NULL, 'Lisa', '12-C', 'Memasukkan Data Walikelas', '2022-06-12 15:37:30', 'Afila Ansori'),
(48, NULL, NULL, 'Winny', '12-D', 'Memasukkan Data Walikelas', '2022-06-12 15:37:30', 'Afila Ansori'),
(49, NULL, NULL, 'Jean', '12-E', 'Memasukkan Data Walikelas', '2022-06-12 15:37:30', 'Afila Ansori'),
(50, NULL, NULL, 'Gilbert', '12-F', 'Memasukkan Data Walikelas', '2022-06-12 15:37:31', 'Afila Ansori');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'walikelas');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` int(11) NOT NULL,
  `nis` varchar(128) DEFAULT NULL,
  `duedate` date NOT NULL,
  `spp_cost` int(11) DEFAULT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `nis`, `duedate`, `spp_cost`, `status`) VALUES
(72, '200453', '2022-06-15', 250000, 'Belum Lunas'),
(73, '234545', '2022-06-15', 250000, 'Belum Lunas'),
(74, '232525', '2022-06-15', 250000, 'Belum Lunas'),
(75, '224455', '2022-06-16', 250000, 'Belum Lunas'),
(76, '225325', '2022-06-17', 250000, 'Belum Lunas'),
(77, '221322', '2022-06-18', 250000, 'Belum Lunas'),
(78, '241241', '2022-06-19', 250000, 'Belum Lunas'),
(79, '222241', '2022-07-20', 250000, 'Belum Lunas'),
(80, '231312', '2022-06-21', 250000, 'Belum Lunas'),
(81, '234243', '2022-06-22', 250000, 'Belum Lunas'),
(82, '214189', '2022-06-23', 250000, 'Belum Lunas'),
(83, '224230', '2022-06-24', 250000, 'Belum Lunas'),
(84, '244546', '2022-06-25', 250000, 'Belum Lunas'),
(85, '233345', '2022-06-26', 250000, 'Belum Lunas'),
(86, '222345', '2022-06-27', 250000, 'Belum Lunas'),
(87, '289643', '2022-06-28', 250000, 'Belum Lunas'),
(88, '234455', '2022-06-29', 250000, 'Belum Lunas'),
(89, '233335', '2022-06-30', 250000, 'Belum Lunas'),
(90, '234567', '2022-06-01', 250000, 'Belum Lunas'),
(91, '234457', '2022-06-02', 250000, 'Belum Lunas'),
(92, '223556', '2022-06-03', 250000, 'Belum Lunas'),
(93, '298087', '2022-06-04', 250000, 'Belum Lunas'),
(94, '276450', '2022-06-05', 250000, 'Belum Lunas'),
(95, '267880', '2022-06-06', 250000, 'Belum Lunas'),
(96, '276976', '2022-06-07', 250000, 'Belum Lunas'),
(97, '287869', '2022-06-08', 250000, 'Belum Lunas'),
(98, '287868', '2022-06-09', 250000, 'Belum Lunas'),
(99, '286759', '2022-06-10', 250000, 'Belum Lunas'),
(100, '278886', '2022-06-11', 250000, 'Belum Lunas'),
(102, '265875', '2022-06-13', 250000, 'Belum Lunas'),
(103, '255666', '2022-06-14', 250000, 'Belum Lunas'),
(104, '243443', '2022-06-15', 250000, 'Belum Lunas'),
(105, '223412', '2022-06-16', 250000, 'Belum Lunas');

--
-- Triggers `spp`
--
DELIMITER $$
CREATE TRIGGER `pay` AFTER UPDATE ON `spp` FOR EACH ROW begin
    declare getStatus varchar(64);
    select status into getStatus from spp where nis = '222241';
    if getStatus = 'Lunas' then
    insert into transaksi values ('','Afila Ansori','222241',now(),'Lunas');
    end if;
    end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `nis` varchar(128) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `class` varchar(8) DEFAULT NULL,
  `periode` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`nis`, `student_name`, `jenis_kelamin`, `class`, `periode`) VALUES
('200453', 'Yor', 'P', '10-F', '2020-2021'),
('214189', 'Shiba', 'L', '10-D', '2021-2022'),
('221322', 'Ogata', 'L', '10-A', '2021-2022'),
('222241', 'Anya', 'P', '10-B', '2021-2022'),
('222345', 'Yuri', 'P', '10-E', '2021-2022'),
('223412', 'Rei', 'P', '12-E', '2022-2023'),
('223556', 'Mayu', 'P', '11-D', '2022-2023'),
('224230', 'Mafu', 'L', '11-A', '2021-2022'),
('224455', 'Mikazuki', 'L', '12-F', '2021-2022'),
('225325', 'Abe', 'L', '10-B', '2022-2023'),
('231312', 'Tsukihime', 'P', '10-C', '2021-2022'),
('232525', 'Kazuto', 'L', '12-F', '2020-2021'),
('233335', 'Asuna', 'P', '12-A', '2021-2022'),
('233345', 'Izann', 'L', '10-E', '2021-2022'),
('234243', 'Shin', 'L', '10-C', '2021-2022'),
('234455', 'Shintaro', 'L', '10-F', '2021-2022'),
('234457', 'Oreki', 'L', '11-B', '2021-2022'),
('234545', 'Loid', 'L', '11-F', '2020-2021'),
('234567', 'Yuuto', 'L', '11-A', '2021-2022'),
('241241', 'Chizuru', 'P', '10-A', '2021-2022'),
('243443', 'Kazuma', 'L', '12-C', '2022-2023'),
('244546', 'Uzuru', 'P', '10-D', '2021-2022'),
('255666', 'Tohsaka', 'P', '12-B', '2022-2023'),
('265875', 'Ruri', 'P', '12-E', '2022-2023'),
('267880', 'Odama', 'L', '11-D', '2022-2023'),
('276450', 'Saitama', 'L', '11-A', '2022-2023'),
('276976', 'Oguro', 'L', '11-E', '2022-2023'),
('278886', 'Kurama', 'L', '12-C', '2022-2023'),
('286759', 'Yukihime', 'P', '12-D', '2022-2023'),
('287868', 'Bojji', 'L', '12-B', '2022-2023'),
('287869', 'Lola', 'P', '12-A', '2022-2023'),
('289643', 'Megumin', 'P', '11-F', '2021-2022'),
('298087', 'Kurumi', 'P', '11-C', '2022-2023');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `add_student` AFTER INSERT ON `student` FOR EACH ROW begin
          insert into log_student values ('','223412',null,null,null,null,null,new.student_name,new.class,new.periode,'2022-06-16','250000','Memasukkan Data Siswa',now(),'Afila Ansori');
          end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_student` AFTER DELETE ON `student` FOR EACH ROW begin
		declare getDuedate date;
		declare getCost int;
		select duedate into getDuedate from spp where nis = '221111';
		select spp_cost into getCost from spp where nis = '221111';
		delete from spp where nis='221111';
		insert into log_student values ('','221111',old.student_name,old.class,old.periode,getDuedate,getCost,null,null,null,null,null,'Menghapus Data Siswa',now(),'Afila Ansori');
		end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_student` AFTER UPDATE ON `student` FOR EACH ROW begin
			declare getOldSppCost int;
			declare getOldDuedate date;
			declare getNewSppCost int;
			declare getNewDuedate date;
			select spp.spp_cost into getOldSppCost from spp join student on spp.nis = student.nis where spp.nis = '202020';
			select spp.duedate into getOldDuedate from spp join student on spp.nis = student.nis where spp.nis = '202020';
			update spp set nis = '202020', duedate = '2022-07-15', spp_cost = '250000' where nis = '202020';
			select spp.spp_cost into getNewSppCost from spp join student on spp.nis = student.nis where spp.nis = '202020';
			select spp.duedate into getNewDuedate from spp join student on spp.nis = student.nis where spp.nis = '202020';
			insert into log_student values ('','202020',old.student_name,old.class,old.periode,getOldDuedate,getOldSppCost,new.student_name,new.class,new.periode,getNewDuedate,getNewSppCost,'Merubah Data Siswa',now(),'Afila Ansori');
			end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `nis` varchar(128) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `spp_status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `admin`, `nis`, `tanggal`, `spp_status`) VALUES
(46, 'Afila Ansori', '222241', '2022-06-12 15:44:02', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(255) NOT NULL,
  `role` enum('admin','walikelas') DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `role`, `username`, `password`) VALUES
('Afila Ansori', 'admin', 'alter0z', 'password'),
('Dian Anggraini', 'walikelas', 'dian', 'root'),
('Larry Page', 'admin', 'larry', 'root');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `add_user` AFTER INSERT ON `user` FOR EACH ROW begin
			insert into log_user values ('',null,null,null,null,new.name,new.username,new.role,new.password,'Memasukkan Data User',now(),'Afila Ansori');
			end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_user` AFTER DELETE ON `user` FOR EACH ROW begin
			insert into log_user values ('',old.name,old.username,old.role,old.password,null,null,null,null,'Menghapus Data User',now(),'Afila Ansori');
			end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_user` AFTER UPDATE ON `user` FOR EACH ROW begin
			insert into log_user values ('',old.name,old.username,old.role,old.password,new.name,new.username,new.role,new.password,'Merubah Data User',now(),'Afila Ansori');
			end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_invoice`
-- (See below for the actual view)
--
CREATE TABLE `view_invoice` (
`nis` varchar(128)
,`student_name` varchar(255)
,`class` varchar(8)
,`jenis_kelamin` varchar(1)
,`fullname` varchar(255)
,`spp_status` varchar(64)
,`tanggal` datetime
,`admin` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `wclass`
--

CREATE TABLE `wclass` (
  `class` varchar(8) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wclass`
--

INSERT INTO `wclass` (`class`, `fullname`) VALUES
('10-A', 'Bagas'),
('10-B', 'Bagus'),
('10-C', 'Budi'),
('10-D', 'Deni'),
('10-E', 'Anisa'),
('10-F', 'Alia'),
('11-A', 'Satou'),
('11-B', 'Satoshi'),
('11-C', 'Hikari'),
('11-D', 'Haru'),
('11-E', 'Fuka'),
('11-F', 'Majime'),
('12-A', 'Albert'),
('12-B', 'Michael'),
('12-C', 'Lisa'),
('12-D', 'Winny'),
('12-E', 'Jean'),
('12-F', 'Gilbert');

--
-- Triggers `wclass`
--
DELIMITER $$
CREATE TRIGGER `add_wclass` AFTER INSERT ON `wclass` FOR EACH ROW begin
          insert into log_wclass values ('',null,null,new.fullname,new.class,'Memasukkan Data Walikelas',now(),'Afila Ansori');
          end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edit_wclass` AFTER UPDATE ON `wclass` FOR EACH ROW begin
			insert into log_wclass values ('',old.fullname,old.class,new.fullname,new.class,'Merubah Data Walikelas',now(),'Afila Ansori');
			end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `view_invoice`
--
DROP TABLE IF EXISTS `view_invoice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_invoice`  AS SELECT `a`.`nis` AS `nis`, `b`.`student_name` AS `student_name`, `b`.`class` AS `class`, `b`.`jenis_kelamin` AS `jenis_kelamin`, `c`.`fullname` AS `fullname`, `a`.`spp_status` AS `spp_status`, `a`.`tanggal` AS `tanggal`, `a`.`admin` AS `admin` FROM ((`transaksi` `a` join `student` `b` on(`a`.`nis` = `b`.`nis`)) join `wclass` `c` on(`b`.`class` = `c`.`class`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_spp`
--
ALTER TABLE `current_spp`
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_student`
--
ALTER TABLE `log_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_wclass`
--
ALTER TABLE `log_wclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `wclass`
--
ALTER TABLE `wclass`
  ADD PRIMARY KEY (`class`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_student`
--
ALTER TABLE `log_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `log_wclass`
--
ALTER TABLE `log_wclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `student` (`nis`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`class`) REFERENCES `wclass` (`class`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `current_spp` (`nis`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `student` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
