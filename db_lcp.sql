-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2019 at 05:15 AM
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
(31, 1, 'TOYOTA C-HR', 1),
(32, 1, 'TOYOTA PRADO', 1),
(33, 1, 'TOYOTA PORTE', 1),
(34, 1, 'MAZDA DEMIO', 1),
(35, 1, 'MAZDA CX-5', 1),
(36, 1, 'TOYOTA ACE', 1),
(37, 1, 'TOYOTA LEXUS,LC,LS', 1),
(38, 1, 'TOYOTA CROWN', 1),
(39, 1, 'TOYOTA ESTIMA', 1),
(40, 1, 'FJ CRUISER / RYU', 1),
(41, 1, 'TOYOTA ALPHARD', 1),
(42, 1, 'TOYOTA HIACE', 1),
(43, 1, 'TOYOTA AURIS, COROLLA FIELDER', 1),
(44, 1, 'TOYOTA AURIS', 1),
(45, 1, 'TOYOTA COROLLA', 1),
(46, 1, 'TOYOTA COROLLA FIELDER', 1);

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
(142, 31, 7),
(143, 31, 8),
(144, 31, 9),
(145, 32, 10),
(146, 32, 11),
(147, 32, 12),
(148, 32, 13),
(149, 32, 14),
(150, 32, 9),
(151, 33, 2),
(152, 33, 9),
(153, 34, 15),
(154, 34, 16),
(155, 34, 5),
(156, 34, 9),
(157, 35, 6),
(158, 35, 17),
(159, 35, 18),
(160, 35, 19),
(161, 35, 9),
(162, 36, 20),
(163, 36, 9),
(164, 37, 21),
(165, 37, 22),
(166, 37, 9),
(167, 38, 23),
(168, 38, 24),
(169, 38, 9),
(170, 39, 25),
(171, 39, 26),
(172, 39, 9),
(173, 40, 27),
(174, 40, 9),
(175, 41, 28),
(176, 41, 29),
(177, 41, 30),
(178, 41, 9),
(179, 42, 31),
(180, 42, 32),
(181, 42, 33),
(182, 42, 34),
(183, 42, 35),
(184, 42, 9),
(185, 43, 36),
(186, 43, 9),
(187, 44, 37),
(188, 44, 9),
(189, 45, 38),
(190, 45, 39),
(191, 45, 40),
(192, 45, 9),
(193, 46, 41),
(194, 46, 9);

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
-- Table structure for table `komposisi_mp`
--

CREATE TABLE `komposisi_mp` (
  `id` int(11) NOT NULL,
  `id_lcp` int(11) NOT NULL,
  `housing_bt` int(11) NOT NULL,
  `insert_plug` int(11) NOT NULL,
  `setting` int(11) NOT NULL,
  `taping` int(11) NOT NULL,
  `sp` int(11) NOT NULL,
  `offline` int(11) NOT NULL,
  `grommet` int(11) NOT NULL,
  `housing_ck` int(11) NOT NULL,
  `checker_gri` int(11) NOT NULL,
  `dimchecker_sig` int(11) NOT NULL,
  `vis` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komposisi_mp`
--

INSERT INTO `komposisi_mp` (`id`, `id_lcp`, `housing_bt`, `insert_plug`, `setting`, `taping`, `sp`, `offline`, `grommet`, `housing_ck`, `checker_gri`, `dimchecker_sig`, `vis`, `total`) VALUES
(11, 769, 4, 4, 4, 4, 4, 4, 44, 4, 4, 4, 4, 84),
(12, 771, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 22),
(14, 770, 2, 5, 4, 4, 4, 4, 4, 4, 4, 4, 4, 43);

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
(21, '7C'),
(22, '9A'),
(23, '10A'),
(24, '10C'),
(25, 'JP-2'),
(26, '14B'),
(27, 'JP-3'),
(28, '11C'),
(29, '12B'),
(30, '13C'),
(31, '15A'),
(32, '15C'),
(33, '17C'),
(34, '18B'),
(35, '19A'),
(36, '19C'),
(37, '20B'),
(38, '23B'),
(39, '24B'),
(40, '25B'),
(41, '27B');

-- --------------------------------------------------------

--
-- Table structure for table `main_lcp`
--

CREATE TABLE `main_lcp` (
  `id` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `id_carline_has_line` int(11) NOT NULL,
  `mhout_shift` double NOT NULL DEFAULT '0',
  `order_monthly` double NOT NULL DEFAULT '0',
  `efficiency` double NOT NULL DEFAULT '0',
  `mp_dl` double NOT NULL DEFAULT '0',
  `mp_idl` double NOT NULL DEFAULT '0',
  `shift_qty` int(11) NOT NULL DEFAULT '0',
  `capacity` int(11) NOT NULL DEFAULT '0',
  `working_days` int(11) NOT NULL DEFAULT '0',
  `ot_hours` float NOT NULL DEFAULT '0',
  `ot_plan` int(11) NOT NULL DEFAULT '0',
  `p_load` double NOT NULL DEFAULT '0',
  `exc_time` double NOT NULL DEFAULT '0',
  `tot_productivity` double NOT NULL DEFAULT '0',
  `balance` double NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_lcp`
--

INSERT INTO `main_lcp` (`id`, `id_shift`, `id_carline_has_line`, `mhout_shift`, `order_monthly`, `efficiency`, `mp_dl`, `mp_idl`, `shift_qty`, `capacity`, `working_days`, `ot_hours`, `ot_plan`, `p_load`, `exc_time`, `tot_productivity`, `balance`, `tanggal`) VALUES
(769, 1, 142, 0, 0, 0, 84, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, '2019-08-01'),
(770, 1, 142, 0, 0, 0, 43, 0, 0, 0, 30, 0, 0, 0, 0, 0, 0, '2019-09-01'),
(771, 2, 142, 0, 0, 0, 22, 0, 0, 0, 12, 0, 0, 0, 0, 0, 0, '2019-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `mp_idl`
--

CREATE TABLE `mp_idl` (
  `id` int(11) NOT NULL,
  `id_lcp` int(11) NOT NULL,
  `tpo` int(11) NOT NULL,
  `material_supply` int(11) NOT NULL,
  `circuit_supply` int(11) NOT NULL,
  `supply_fuse` int(11) NOT NULL,
  `chorobiki` int(11) NOT NULL,
  `pic_repair` int(11) NOT NULL,
  `tanoko_ass` int(11) NOT NULL,
  `tanoko_insp` int(11) NOT NULL,
  `gl_ass` int(11) NOT NULL,
  `gl_insp` int(11) NOT NULL,
  `line_leader` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppc_data`
--

CREATE TABLE `ppc_data` (
  `id` int(11) NOT NULL,
  `id_carline_has_line` int(11) NOT NULL,
  `mhout_shift` int(11) NOT NULL,
  `order_monthly` double NOT NULL,
  `efficiency` double NOT NULL,
  `mp_dl` int(11) NOT NULL,
  `shift_qty` int(11) NOT NULL,
  `capacity` double NOT NULL,
  `working_days` int(11) NOT NULL,
  `ot_hours` float NOT NULL DEFAULT '0',
  `ot_plan` double NOT NULL DEFAULT '0',
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
-- Indexes for table `komposisi_mp`
--
ALTER TABLE `komposisi_mp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idlcp` (`id_lcp`);

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
-- Indexes for table `mp_idl`
--
ALTER TABLE `mp_idl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lcp` (`id_lcp`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `carline_has_line`
--
ALTER TABLE `carline_has_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `komposisi_mp`
--
ALTER TABLE `komposisi_mp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `main_lcp`
--
ALTER TABLE `main_lcp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=772;
--
-- AUTO_INCREMENT for table `mp_idl`
--
ALTER TABLE `mp_idl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ppc_data`
--
ALTER TABLE `ppc_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1198;
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
-- Constraints for table `komposisi_mp`
--
ALTER TABLE `komposisi_mp`
  ADD CONSTRAINT `fk_idlcp` FOREIGN KEY (`id_lcp`) REFERENCES `main_lcp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
