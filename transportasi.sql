-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Nov 2020 pada 05.07
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `transportasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_booking`
--

CREATE TABLE IF NOT EXISTS `t_booking` (
  `kode_booking` varchar(50) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `surat_izinkegiatan` varchar(255) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `alamat_tujuan` varchar(50) NOT NULL,
  `jam_keberangkatan` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_sopir` int(11) NOT NULL,
  `kode_kendaraan` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_booking`
--

INSERT INTO `t_booking` (`kode_booking`, `nama_kegiatan`, `surat_izinkegiatan`, `tanggal_peminjaman`, `tanggal_kembali`, `alamat_tujuan`, `jam_keberangkatan`, `penanggung_jawab`, `no_hp`, `status`, `id_sopir`, `kode_kendaraan`, `id_user`) VALUES
('YSXZ1WT2NV', 'dinas secata', 'f19a7cf8fe52c585cbf1951183e3af79.jpg', '2020-11-03', '2020-11-05', 'padang panjang', '09:00', 'DIO', '08123457898', 'confirm', 14, 'K004', 24),
('19WFHXWHLF', 'anjangsana', 'f19a7cf8fe52c585cbf1951183e3af79.jpg', '2020-11-03', '2020-11-05', 'padang panjang', '07:00', 'nabila', '08123457898', 'cancel', 11, 'K004', 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jurusan`
--

CREATE TABLE IF NOT EXISTS `t_jurusan` (
`id_jurusan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `logo` varchar(40) NOT NULL,
  `ketua_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kendaraan`
--

CREATE TABLE IF NOT EXISTS `t_kendaraan` (
  `kode_kendaraan` varchar(50) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `nomor_polisi` varchar(50) NOT NULL,
  `gambar_kendaraan` text NOT NULL,
  `kapasitas` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `jumlah_roda` varchar(30) NOT NULL,
  `peruntukkan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kendaraan`
--

INSERT INTO `t_kendaraan` (`kode_kendaraan`, `jenis_kendaraan`, `nomor_polisi`, `gambar_kendaraan`, `kapasitas`, `warna`, `jumlah_roda`, `peruntukkan`, `status`) VALUES
('K001', 'SEPEDA MOTOR SUZUKI', 'BA 2376 AJ', 'Suzuki_Thunder_125_L_1.jpg', '125 CC', 'HITAM', '2', 'Operasional', 'disable'),
('K002', 'SEPEDA MOTOR SUZUKI', 'BA 2374 AJ', 'Suzuki-GSX-150-Bandit.jpg', '125 CC', 'MERAH', '2', 'Operasional', 'enable'),
('K003', 'YAMAHA VEGA', 'BA 4366 BI', 'fa43aca6-011d-4205-a006-55dd666e2de3.jpeg', '115 CC', 'MERAH', '2', 'Operasional', 'enable'),
('K004', 'TOYOTA AVANZA', 'BA 1839 AI', 'Toyota-Avanza-Facelift-Black-Metallic.jpg', '1297 CC', 'HITAM', '4', 'Operasional', 'disable');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_level`
--

CREATE TABLE IF NOT EXISTS `t_level` (
`id_level` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_level`
--

INSERT INTO `t_level` (`id_level`, `nama`) VALUES
(0, 'Admin'),
(1, 'Umum'),
(2, 'Ormawa'),
(3, 'Jurusan'),
(4, 'Unit'),
(5, 'Sopir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ormawa`
--

CREATE TABLE IF NOT EXISTS `t_ormawa` (
`id_ormawa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `logo` varchar(40) NOT NULL,
  `pembina` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_ormawa`
--

INSERT INTO `t_ormawa` (`id_ormawa`, `id_user`, `logo`, `pembina`) VALUES
(1, 25, 'ksr.jpg', 'Novirwan Trinanto, SE.,M.Si'),
(2, 26, 'KorpS+SATGAS.png', 'Budi Warsito, S.Sos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sopir`
--

CREATE TABLE IF NOT EXISTS `t_sopir` (
`id_sopir` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sopir`
--

INSERT INTO `t_sopir` (`id_sopir`, `id_user`, `status`) VALUES
(10, 34, 'enable'),
(11, 35, 'enable'),
(12, 36, 'enable'),
(13, 37, 'enable'),
(14, 38, 'disable');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_umum`
--

CREATE TABLE IF NOT EXISTS `t_umum` (
`id_umum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `prodi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_unit`
--

CREATE TABLE IF NOT EXISTS `t_unit` (
`id_unit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kepala_unit` varchar(40) NOT NULL,
  `admin_unit` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_unit`
--

INSERT INTO `t_unit` (`id_unit`, `id_user`, `kepala_unit`, `admin_unit`) VALUES
(2, 28, 'Alhapen Ruslin Chandra, S', 'Daddy Budiman, ST.,M.Eng'),
(3, 29, 'Dra. Fitri Adona, M.Si', 'Naswiradianto, SS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
`id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama`, `username`, `password`, `kontak`, `level`) VALUES
(24, 'admin', 'admin', '8cb2237d0679ca88db6464eac60da96345513964', '', 0),
(25, 'korps sukarela', 'ksrpnp', '8cb2237d0679ca88db6464eac60da96345513964', '081267926003', 2),
(26, 'Korps SATGAS', 'satgaspnp', '8cb2237d0679ca88db6464eac60da96345513964', '081267926002', 2),
(28, 'UPT. Hubungan Masyarakat', 'upthubunganmasyarakat', '8cb2237d0679ca88db6464eac60da96345513964', '081267926006', 4),
(29, 'UPT. Kerjasama', 'uptkerjasama', '8cb2237d0679ca88db6464eac60da96345513964', '081267926065', 4),
(30, 'Murahaa', 'sopir1', '642989fbd758bf2e3aaa655d559b962b14bc0120', '123', 5),
(34, 'Marjohan', 'Marjohan', '8cb2237d0679ca88db6464eac60da96345513964', '081363367087', 5),
(35, 'Handoyo', 'Handoyo', '8cb2237d0679ca88db6464eac60da96345513964', '081266439888', 5),
(36, 'Warkum', 'Warkum', '8cb2237d0679ca88db6464eac60da96345513964', '082384649632', 5),
(37, 'Aulia Rahman', 'Auliarahman', '8cb2237d0679ca88db6464eac60da96345513964', '081270572971', 5),
(38, 'Arisandi', 'Arisandi', '8cb2237d0679ca88db6464eac60da96345513964', '08126820453', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_booking`
--
ALTER TABLE `t_booking`
 ADD KEY `fkuser5` (`id_user`), ADD KEY `fkkendaraan` (`kode_kendaraan`);

--
-- Indexes for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
 ADD PRIMARY KEY (`id_jurusan`), ADD KEY `fkuser4` (`id_user`);

--
-- Indexes for table `t_kendaraan`
--
ALTER TABLE `t_kendaraan`
 ADD PRIMARY KEY (`kode_kendaraan`);

--
-- Indexes for table `t_level`
--
ALTER TABLE `t_level`
 ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `t_ormawa`
--
ALTER TABLE `t_ormawa`
 ADD PRIMARY KEY (`id_ormawa`), ADD KEY `fkuser3` (`id_user`);

--
-- Indexes for table `t_sopir`
--
ALTER TABLE `t_sopir`
 ADD PRIMARY KEY (`id_sopir`);

--
-- Indexes for table `t_umum`
--
ALTER TABLE `t_umum`
 ADD PRIMARY KEY (`id_umum`), ADD KEY `FK_user` (`id_user`);

--
-- Indexes for table `t_unit`
--
ALTER TABLE `t_unit`
 ADD PRIMARY KEY (`id_unit`), ADD UNIQUE KEY `indeks2` (`id_user`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_level`
--
ALTER TABLE `t_level`
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_ormawa`
--
ALTER TABLE `t_ormawa`
MODIFY `id_ormawa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_sopir`
--
ALTER TABLE `t_sopir`
MODIFY `id_sopir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `t_umum`
--
ALTER TABLE `t_umum`
MODIFY `id_umum` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_unit`
--
ALTER TABLE `t_unit`
MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_booking`
--
ALTER TABLE `t_booking`
ADD CONSTRAINT `fkuser5` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_jurusan`
--
ALTER TABLE `t_jurusan`
ADD CONSTRAINT `fkuser4` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_ormawa`
--
ALTER TABLE `t_ormawa`
ADD CONSTRAINT `fkuser3` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_umum`
--
ALTER TABLE `t_umum`
ADD CONSTRAINT `FK_user` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_unit`
--
ALTER TABLE `t_unit`
ADD CONSTRAINT `fkuser2` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_user`
--
ALTER TABLE `t_user`
ADD CONSTRAINT `fklevel` FOREIGN KEY (`level`) REFERENCES `t_level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
