-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 06:46 PM
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
(3, '258147', NULL, NULL, NULL, '2022-05-25', 250000, 'as', '10-B', '2021-2022', '2022-05-25', 250000, 'Memasukkan Data Siswa', '2022-05-25 22:43:00', 'Afila Ansori'),
(4, '258147', 'as', '10-B', '2021-2022', '2022-05-25', 250000, NULL, NULL, NULL, '2022-05-25', 250000, 'Menghapus Data Siswa', '2022-05-25 22:44:20', 'Afila Ansori'),
(5, '258147', 'Ucup', '10-C', '2021-2022', '2022-05-25', 250000, NULL, NULL, NULL, '2022-05-25', 250000, 'Menghapus Data Siswa', '2022-05-25 22:44:56', 'Afila Ansori'),
(6, '235689', NULL, NULL, NULL, '2022-05-25', 250000, 'ucup', '10-C', '2021-2022', NULL, NULL, 'Memasukkan Data Siswa', '2022-05-25 22:46:24', 'Afila Ansori'),
(7, '235689', 'ucup', '10-C', '2021-2022', '2022-05-25', 250000, 'ucok', '10-C', '2021-2022', NULL, NULL, 'Merubah Data Siswa', '2022-05-25 22:46:56', 'Afila Ansori'),
(8, '235689', 'ucok', '10-C', '2021-2022', '2022-05-25', 250000, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-05-25 22:47:09', 'Afila Ansori');

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

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role`) VALUES
('admin'),
('walikelas');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `nis` varchar(128) DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `spp_cost` int(11) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`nis`, `duedate`, `spp_cost`, `status`) VALUES
('164131', '2022-04-15', 250000, 'Lunas'),
('146516', '2022-04-14', 250000, 'Lunas'),
('645186', '2022-04-15', 250000, 'Belum Lunas'),
('164586', '2022-04-12', 250000, 'Lunas'),
('164528', '2022-04-27', 250000, 'Lunas'),
('185625', '2022-04-29', 250000, 'Belum Lunas'),
('128945', '2022-04-30', 250000, 'Lunas'),
('451578', '2022-04-27', 250000, 'Belum Lunas');

--
-- Triggers `spp`
--
DELIMITER $$
CREATE TRIGGER `add_spp` AFTER INSERT ON `spp` FOR EACH ROW begin
			update log_student set new_duedate = new.duedate, new_spp_cost = new.spp_cost;
			end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_spp` AFTER DELETE ON `spp` FOR EACH ROW begin
			update log_student set old_duedate = old.duedate, old_spp_cost = old.spp_cost;
			end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pay` AFTER UPDATE ON `spp` FOR EACH ROW begin
  insert into transaksi values ('','Afila Ansori','164586',now());
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
  `class` varchar(8) DEFAULT NULL,
  `periode` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`nis`, `student_name`, `class`, `periode`) VALUES
('128945', 'Bagus Pribadi', '12-A', '2021-2022'),
('146516', 'bryand', '10-B', '2021-2022'),
('164131', 'ansori', '10-A', '2021-2022'),
('164528', 'Bunga Lestari', '11-A', '2021-2022'),
('164586', 'Sarah', '10-C', '2021-2022'),
('185625', 'Diah Pitaloka', '11-A', '2021-2022'),
('451578', 'Surya Putra', '12-A', '2021-2022'),
('645186', 'Jane', '10-C', '2021-2022');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `add_student` AFTER INSERT ON `student` FOR EACH ROW begin
			insert into spp values ('235689','2022-05-25','250000','Belum Lunas');
			insert into log_student values ('','235689',null,null,null,null,null,new.student_name,new.class,new.periode,null,null,'Memasukkan Data Siswa',now(),'Afila Ansori');
			end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_student` AFTER DELETE ON `student` FOR EACH ROW begin
			insert into log_student values ('','235689',old.student_name,old.class,old.periode,null,null,null,null,null,null,null,'Menghapus Data Siswa',now(),'Afila Ansori');
			end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_student` AFTER UPDATE ON `student` FOR EACH ROW begin
			insert into log_student values ('','235689',old.student_name,old.class,old.periode,null,null,new.student_name,new.class,new.periode,null,null,'Merubah Data Siswa',now(),'Afila Ansori');
			end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `nis` varchar(128) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `nis` varchar(128) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `admin`, `nis`, `tanggal`) VALUES
(4, 'Afila Ansori', '164528', '2022-05-25'),
(5, 'Afila Ansori', '164586', '2022-05-25'),
(6, 'Afila Ansori', '164586', '2022-05-25');

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
('John', 'admin', 'j0hn', 'root'),
('John Doe', 'walikelas', 'j0hn3', 'john123'),
('Larry Page', 'admin', 'pagelarry3', '123456789'),
('Jeanne', 'walikelas', 'root', 'root');

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
('10-A', 'Larry Page'),
('10-B', 'Johns'),
('10-C', 'Jeanne'),
('11-A', 'Lia Mustika'),
('12-A', 'Barron Jeggaer');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

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
-- AUTO_INCREMENT for table `log_student`
--
ALTER TABLE `log_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_wclass`
--
ALTER TABLE `log_wclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`class`) REFERENCES `wclass` (`class`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `student` (`nis`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `student` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
