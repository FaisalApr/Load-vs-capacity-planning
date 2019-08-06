-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 04:32 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lcp`
--

-- --------------------------------------------------------

--
-- Table structure for table `carline`
--

CREATE TABLE `carline` (
  `id` int(11) NOT NULL,
  `id_district` int(11) NOT NULL,
  `nama_carline` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carline`
--

INSERT INTO `carline` (`id`, `id_district`, `nama_carline`, `status`) VALUES
(5, 1, 'TOYOTA C-HR', 1),
(6, 1, 'TOYOTA PRADO', 1),
(7, 1, 'TOYOTA PORTE', 1),
(8, 1, 'MAZDA DEMIO', 1),
(9, 1, 'MAZDA CX-5', 1),
(10, 1, 'TOYOTA ACE', 1),
(11, 1, 'TOYOTA LEXUS,LC,LS', 1),
(12, 1, 'TOYOTA HIACE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carline_has_line`
--

CREATE TABLE `carline_has_line` (
  `id` int(11) NOT NULL,
  `id_carline` int(11) NOT NULL,
  `id_line` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carline_has_line`
--

INSERT INTO `carline_has_line` (`id`, `id_carline`, `id_line`) VALUES
(7, 5, 7),
(8, 5, 7),
(9, 5, 8),
(10, 5, 9),
(11, 6, 10),
(12, 6, 11),
(13, 6, 12),
(14, 6, 13),
(15, 6, 14),
(16, 6, 9),
(17, 7, 2),
(18, 7, 9),
(19, 8, 15),
(20, 8, 16),
(21, 8, 5),
(22, 8, 9),
(23, 9, 6),
(24, 9, 17),
(25, 9, 18),
(26, 9, 19),
(27, 9, 9),
(28, 10, 20),
(29, 10, 9),
(30, 11, 21),
(31, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `nama`) VALUES
(1, 'SAI T'),
(2, 'SAI B');

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `nama_line` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id`, `nama_line`) VALUES
(1, '1A'),
(2, '2C'),
(3, '12A'),
(4, '12C'),
(5, '4A'),
(6, '4B'),
(7, '1C'),
(8, '2A'),
(9, 'PA'),
(10, '2A(140)'),
(11, '2A(185)'),
(12, '2A(223)'),
(13, '13A(154)'),
(14, 'JP4(507)'),
(15, '3B'),
(16, '3C-SBS'),
(17, '5B'),
(18, '5C'),
(19, '6C'),
(20, '5A'),
(21, '7C');

-- --------------------------------------------------------

--
-- Table structure for table `main_lcp`
--

CREATE TABLE `main_lcp` (
  `id` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `id_carline_has_line` int(11) NOT NULL,
  `mhout_shift` int(11) NOT NULL,
  `order_monthly` int(11) NOT NULL,
  `efficiency` int(11) NOT NULL,
  `mp_dl` int(11) NOT NULL,
  `mp_idl` int(11) NOT NULL DEFAULT '0',
  `shift_qty` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `working_days` int(11) NOT NULL,
  `ot_hours` float NOT NULL,
  `ot_plan` int(11) NOT NULL,
  `p_load` double NOT NULL,
  `exc_time` int(11) NOT NULL,
  `tot_productivity` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_lcp`
--

INSERT INTO `main_lcp` (`id`, `id_shift`, `id_carline_has_line`, `mhout_shift`, `order_monthly`, `efficiency`, `mp_dl`, `mp_idl`, `shift_qty`, `capacity`, `working_days`, `ot_hours`, `ot_plan`, `p_load`, `exc_time`, `tot_productivity`, `tanggal`) VALUES
(11, 1, 7, 20, 20, 0, 0, 0, 0, 20, 0, 0, 0, 100, 0, 0, '2019-08-01'),
(12, 1, 7, 0, 30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-09-01'),
(13, 1, 7, 0, 30, 0, 0, 0, 0, 30, 0, 0, 0, 100, 0, 0, '2019-09-01'),
(14, 1, 31, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-08-01'),
(15, 1, 31, 0, 20, 0, 0, 0, 0, 20, 0, 0, 0, 100, 0, 0, '2019-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `ppc_data`
--

CREATE TABLE `ppc_data` (
  `id` int(11) NOT NULL,
  `id_carline_has_line` int(11) NOT NULL,
  `mhout_shift` int(11) NOT NULL,
  `order_monthly` int(11) NOT NULL,
  `efficiency` int(11) NOT NULL,
  `mp_dl` int(11) NOT NULL,
  `shift_qty` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `working_days` int(11) NOT NULL,
  `ot_hours` float NOT NULL DEFAULT '0',
  `ot_plan` int(11) NOT NULL DEFAULT '0',
  `p_load` double NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `keterangan`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_line`
--

CREATE TABLE `user_has_line` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_list_carline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carline`
--
ALTER TABLE `carline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_district` (`id_district`);

--
-- Indexes for table `carline_has_line`
--
ALTER TABLE `carline_has_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carline` (`id_carline`),
  ADD KEY `id_line` (`id_line`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_lcp`
--
ALTER TABLE `main_lcp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_shift` (`id_shift`),
  ADD KEY `id_carline_has_line` (`id_carline_has_line`);

--
-- Indexes for table `ppc_data`
--
ALTER TABLE `ppc_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carline_has_line` (`id_carline_has_line`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_line`
--
ALTER TABLE `user_has_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_list_carline` (`id_list_carline`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carline`
--
ALTER TABLE `carline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `carline_has_line`
--
ALTER TABLE `carline_has_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `main_lcp`
--
ALTER TABLE `main_lcp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ppc_data`
--
ALTER TABLE `ppc_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_has_line`
--
ALTER TABLE `user_has_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `carline`
--
ALTER TABLE `carline`
  ADD CONSTRAINT `fk_id_district` FOREIGN KEY (`id_district`) REFERENCES `district` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carline_has_line`
--
ALTER TABLE `carline_has_line`
  ADD CONSTRAINT `fk_id_carline` FOREIGN KEY (`id_carline`) REFERENCES `carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_line` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_lcp`
--
ALTER TABLE `main_lcp`
  ADD CONSTRAINT `fk_id_carline_has_line` FOREIGN KEY (`id_carline_has_line`) REFERENCES `carline_has_line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_shift` FOREIGN KEY (`id_shift`) REFERENCES `shift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ppc_data`
--
ALTER TABLE `ppc_data`
  ADD CONSTRAINT `fk_id_carline_hs_line` FOREIGN KEY (`id_carline_has_line`) REFERENCES `carline_has_line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_line`
--
ALTER TABLE `user_has_line`
  ADD CONSTRAINT `fk_id_listcarline` FOREIGN KEY (`id_list_carline`) REFERENCES `carline_has_line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
