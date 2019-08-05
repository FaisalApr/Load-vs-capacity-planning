-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Agu 2019 pada 10.06
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `carline`
--

CREATE TABLE `carline` (
  `id` int(11) NOT NULL,
  `id_district` int(11) NOT NULL,
  `nama_carline` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `carline`
--

INSERT INTO `carline` (`id`, `id_district`, `nama_carline`, `status`) VALUES
(1, 1, 'ALPHARD', 1),
(2, 1, 'CHR', 1),
(3, 1, 'MAZDA', 1),
(4, 1, 'XENIA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `carline_has_line`
--

CREATE TABLE `carline_has_line` (
  `id` int(11) NOT NULL,
  `id_carline` int(11) NOT NULL,
  `id_line` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `carline_has_line`
--

INSERT INTO `carline_has_line` (`id`, `id_carline`, `id_line`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 3, 5),
(6, 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `district`
--

INSERT INTO `district` (`id`, `nama`) VALUES
(1, 'SAI T'),
(2, 'SAI B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `nama_line` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `line`
--

INSERT INTO `line` (`id`, `nama_line`) VALUES
(1, '1A'),
(2, '2C'),
(3, '12A'),
(4, '12C'),
(5, '4A'),
(6, '4B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_lcp`
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
-- Dumping data untuk tabel `main_lcp`
--

INSERT INTO `main_lcp` (`id`, `id_shift`, `id_carline_has_line`, `mhout_shift`, `order_monthly`, `efficiency`, `mp_dl`, `mp_idl`, `shift_qty`, `capacity`, `working_days`, `ot_hours`, `ot_plan`, `p_load`, `exc_time`, `tot_productivity`, `tanggal`) VALUES
(1, 1, 1, 230, 120, 89, 40, 3, 2, 127, 20, 2, 0, 444.44444444444446, 0, 0, '2019-08-01'),
(2, 1, 1, 260, 238, 3, 55, 0, 0, 140, 0, 0, 0, 285.7142857142857, 0, 0, '2019-09-01'),
(3, 1, 1, 320, 210, 0, 0, 0, 0, 120, 0, 0, 0, 155.83333333333334, 0, 0, '2019-10-01'),
(4, 1, 1, 0, 0, 0, 200, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-11-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppc_data`
--

CREATE TABLE `ppc_data` (
  `id` int(11) NOT NULL,
  `id_carline_has_line` int(11) NOT NULL,
  `order_ppc` int(11) NOT NULL,
  `kap_prod` int(11) NOT NULL,
  `Bal` int(11) NOT NULL,
  `Load_persen` int(11) NOT NULL,
  `ot_hour` int(11) NOT NULL,
  `dl_need` int(11) NOT NULL,
  `efficiency` int(11) NOT NULL,
  `working_days` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ppc_data`
--

INSERT INTO `ppc_data` (`id`, `id_carline_has_line`, `order_ppc`, `kap_prod`, `Bal`, `Load_persen`, `ot_hour`, `dl_need`, `efficiency`, `working_days`, `tanggal`) VALUES
(66, 1, 5000, 1000, 501, 434, 2, 80, 200, 20, '2019-08-01'),
(67, 1, 6000, 1000, 501, 50, 2, 80, 200, 20, '2019-09-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shift`
--

INSERT INTO `shift` (`id`, `keterangan`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Struktur dari tabel `user_has_line`
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
-- Indeks untuk tabel `carline`
--
ALTER TABLE `carline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_district` (`id_district`);

--
-- Indeks untuk tabel `carline_has_line`
--
ALTER TABLE `carline_has_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carline` (`id_carline`),
  ADD KEY `id_line` (`id_line`);

--
-- Indeks untuk tabel `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `main_lcp`
--
ALTER TABLE `main_lcp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_shift` (`id_shift`),
  ADD KEY `id_carline_has_line` (`id_carline_has_line`);

--
-- Indeks untuk tabel `ppc_data`
--
ALTER TABLE `ppc_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carline_has_line` (`id_carline_has_line`);

--
-- Indeks untuk tabel `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_has_line`
--
ALTER TABLE `user_has_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_list_carline` (`id_list_carline`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carline`
--
ALTER TABLE `carline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `carline_has_line`
--
ALTER TABLE `carline_has_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `main_lcp`
--
ALTER TABLE `main_lcp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ppc_data`
--
ALTER TABLE `ppc_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_has_line`
--
ALTER TABLE `user_has_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carline`
--
ALTER TABLE `carline`
  ADD CONSTRAINT `fk_id_district` FOREIGN KEY (`id_district`) REFERENCES `district` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `carline_has_line`
--
ALTER TABLE `carline_has_line`
  ADD CONSTRAINT `fk_id_carline` FOREIGN KEY (`id_carline`) REFERENCES `carline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_line` FOREIGN KEY (`id_line`) REFERENCES `line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `main_lcp`
--
ALTER TABLE `main_lcp`
  ADD CONSTRAINT `fk_id_carline_has_line` FOREIGN KEY (`id_carline_has_line`) REFERENCES `carline_has_line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_shift` FOREIGN KEY (`id_shift`) REFERENCES `shift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ppc_data`
--
ALTER TABLE `ppc_data`
  ADD CONSTRAINT `fk_id_carline_hs_line` FOREIGN KEY (`id_carline_has_line`) REFERENCES `carline_has_line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_has_line`
--
ALTER TABLE `user_has_line`
  ADD CONSTRAINT `fk_id_listcarline` FOREIGN KEY (`id_list_carline`) REFERENCES `carline_has_line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
