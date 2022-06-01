-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 06:13 AM
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
('124578', '2022-05-24', 'Lunas'),
('235689', '2022-05-26', 'Belum Lunas');

--
-- Triggers `current_spp`
--
DELIMITER $$
CREATE TRIGGER `pay` AFTER UPDATE ON `current_spp` FOR EACH ROW begin
  insert into transaksi values ('','Afila Ansori','124578',now());
  update spp set duedate = date_add(duedate,interval 1 month), status = 'Belum Lunas' where nis = '124578';
  end
$$
DELIMITER ;

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
(40, '', 'Nishimiya', '10-A', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-05-30 23:12:55', 'Afila Ansori'),
(41, '124578', NULL, NULL, NULL, NULL, NULL, 'Nishimiya', '10-B', '2021-2022', NULL, NULL, 'Memasukkan Data Siswa', '2022-05-30 23:22:53', 'Afila Ansori'),
(42, '235689', NULL, NULL, NULL, '2022-06-24', 250000, 'Shouyo', '10-A', '2021-2022', NULL, NULL, 'Memasukkan Data Siswa', '2022-05-30 23:33:17', 'Afila Ansori'),
(43, '235689', 'Shouyo', '10-A', '2021-2022', '2022-06-24', 250000, 'Shouyo', '10-B', '2021-2022', NULL, NULL, 'Merubah Data Siswa', '2022-05-30 23:35:20', 'Afila Ansori'),
(44, '235689', 'Shouyo', '10-B', '2021-2022', '2022-06-24', 250000, 'Shouyo', '10-B', '2021-2022', NULL, NULL, 'Merubah Data Siswa', '2022-05-30 23:35:21', 'Afila Ansori'),
(45, '', 'Shouyo', '10-B', '2021-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menghapus Data Siswa', '2022-05-30 23:35:33', 'Afila Ansori');

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
(4, 'Larry Page', 'admin', 'pagelarry3', '123456789', 'Larry Page', 'admin', 'lp3', '123456789', 'Merubah Data User', '2022-05-30 23:28:22', 'Afila Ansori'),
(5, 'Larry Page', 'admin', 'lp3', '123456789', NULL, NULL, NULL, NULL, 'Menghapus Data User', '2022-05-30 23:28:29', 'Afila Ansori'),
(6, NULL, NULL, NULL, NULL, 'a', 'admin', 'a', 'a', 'Memasukkan Data User', '2022-05-30 23:54:56', 'Afila Ansori'),
(7, 'John Doe', 'walikelas', 'j0hn3', 'john123', NULL, NULL, NULL, NULL, 'Menghapus Data User', '2022-05-30 23:55:01', 'Afila Ansori');

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
(3, NULL, NULL, 'Dian Diana', '10-E', 'Memasukkan Data Walikelas', '2022-05-30 23:28:53', 'Afila Ansori'),
(4, 'Dian Diana', '10-E', 'Dian Angraini', '11-A', 'Merubah Data Walikelas', '2022-05-30 23:32:53', 'Afila Ansori'),
(5, NULL, NULL, 'a', '11-B', 'Memasukkan Data Walikelas', '2022-05-31 00:20:38', 'Afila Ansori'),
(6, NULL, NULL, 'd', '12-B', 'Memasukkan Data Walikelas', '2022-05-31 00:23:36', 'Afila Ansori'),
(7, 'd', '12-B', NULL, NULL, 'Menghapus Data Walikelas', '2022-05-31 00:23:41', 'Afila Ansori');

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
  `duedate` date NOT NULL,
  `spp_cost` int(11) DEFAULT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`nis`, `duedate`, `spp_cost`, `status`) VALUES
('235689', '2022-05-26', 250000, 'Belum Lunas');

--
-- Triggers `spp`
--
DELIMITER $$
CREATE TRIGGER `add_spp` AFTER INSERT ON `spp` FOR EACH ROW begin
			update log_student set new_spp_cost = new.spp_cost, new_duedate = new.duedate where nis = '235689';
			end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_spp` AFTER DELETE ON `spp` FOR EACH ROW begin
		update log_student set old_spp_cost = old.spp_cost, old_duedate = old.duedate where nis = '235689';
		end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_spp` AFTER UPDATE ON `spp` FOR EACH ROW begin
			update log_student set old_spp_cost = old.spp_cost, new_spp_cost = new.spp_cost, old_duedate = old.duedate, new_duedate = new.duedate where nis = '235689';
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
('124578', 'Nishimiya', 'P', '10-B', '2021-2022');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `add_student` AFTER INSERT ON `student` FOR EACH ROW begin
			insert into spp values ('235689','2022-05-26','250000','Belum Lunas');
			insert into current_spp values ('235689','2022-05-26','Belum Lunas');
			insert into log_student values ('','235689',null,null,null,null,null,new.student_name,new.class,new.periode,null,null,'Memasukkan Data Siswa',now(),'Afila Ansori');
			end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_student` AFTER DELETE ON `student` FOR EACH ROW begin
		delete from spp where nis='124578';
		insert into log_student values ('','',old.student_name,old.class,old.periode,null,null,null,null,null,null,null,'Menghapus Data Siswa',now(),'Afila Ansori');
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
(19, 'Afila Ansori', '124578', '2022-05-30');

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
('a', 'admin', 'a', 'a'),
('Afila Ansori', 'admin', 'alter0z', 'password'),
('John', 'admin', 'j0hn', 'root'),
('Jeanne', 'walikelas', 'root', 'root');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `add_user` AFTER INSERT ON `user` FOR EACH ROW begin
			insert into log_user values ('',null,null,null,null,new.name,new.role,new.username,new.password,'Memasukkan Data User',now(),'Afila Ansori');
			end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_user` AFTER DELETE ON `user` FOR EACH ROW begin
		insert into log_user values ('',old.name,old.role,old.username,old.password,null,null,null,null,'Menghapus Data User',now(),'Afila Ansori');
		end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_user` AFTER UPDATE ON `user` FOR EACH ROW begin
			insert into log_user values ('',old.name,old.role,old.username,old.password,new.name,new.role,new.username,new.password,'Merubah Data User',now(),'Afila Ansori');
			end
$$
DELIMITER ;

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
('10-B', 'Barron Jeggaer');

--
-- Triggers `wclass`
--
DELIMITER $$
CREATE TRIGGER `add_wclass` AFTER DELETE ON `wclass` FOR EACH ROW begin
		insert into log_wclass values ('',old.fullname,old.class,null,null,'Menghapus Data Walikelas',now(),'Afila Ansori');
		end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edit_wclass` AFTER UPDATE ON `wclass` FOR EACH ROW begin
			insert into log_wclass values ('',old.fullname,old.class,new.fullname,new.class,'Merubah Data Walikelas',now(),'Afila Ansori');
			end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_spp`
--
ALTER TABLE `current_spp`
  ADD UNIQUE KEY `nis` (`nis`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_wclass`
--
ALTER TABLE `log_wclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
