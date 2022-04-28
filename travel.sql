-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Nov 2017 pada 13.39
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `idjadwal` int(11) NOT NULL,
  `maskapai` varchar(40) DEFAULT NULL,
  `asal` varchar(20) DEFAULT NULL,
  `tujuan` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `berangkat` time DEFAULT NULL,
  `tiba` time DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `totalkursi` int(11) DEFAULT NULL,
  `dipesan` int(11) DEFAULT NULL,
  `sisakursi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`idjadwal`, `maskapai`, `asal`, `tujuan`, `tanggal`, `berangkat`, `tiba`, `kelas`, `harga`, `totalkursi`, `dipesan`, `sisakursi`) VALUES
(14, 'Garuda Indonesia', 'Surabaya', 'Jakarta', '2017-11-14', '07:00:00', '08:30:00', 'Ekonomi', 750000, 200, 0, 200),
(15, 'Sriwijaya Air', 'Surabaya', 'Jakarta', '2017-11-14', '11:00:00', '13:00:00', 'Bisnis', 800000, 300, 6, 294),
(16, 'Air Asia', 'Jakarta', 'Yogyakarta', '2017-11-15', '12:20:00', '13:10:00', 'Ekonomi', 200000, 100, 9, 291);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`nama`, `email`, `ttl`, `nohp`, `username`, `password`) VALUES
('Are', 'hehe', '2000-11-14', '0827272727', 'areare', 'areare'),
('Ferniandita Nilam Maulidina', 'ferniandita.nm10@gmail.com', '1996-08-09', '085655000200', 'ferniandita', '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idbayar` int(11) NOT NULL,
  `idpesan` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jmlpesan` int(11) DEFAULT NULL,
  `kodepromo` varchar(20) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `totalharga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idbayar`, `idpesan`, `harga`, `jmlpesan`, `kodepromo`, `diskon`, `totalharga`) VALUES
(5, 20, 800000, 5, '111', 12000, 3988000),
(6, 21, 200000, 2, '12345', 15000, 385000),
(7, 22, 200000, 3, '111', 12000, 588000),
(8, 23, 200000, 1, '111', 12000, 188000),
(9, 24, 800000, 1, '12345', 15000, 785000),
(10, 25, 200000, 3, '111', 12000, 588000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idpesan` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `idjadwal` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `noktp` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nohp` varchar(12) DEFAULT NULL,
  `jmlpesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`idpesan`, `username`, `idjadwal`, `nama`, `noktp`, `alamat`, `nohp`, `jmlpesan`) VALUES
(20, 'ferniandita', 15, 'Ferniandita Nilam Maulidina', '3517134908960001', 'Jombang', '085655000200', 5),
(21, 'ferniandita', 16, 'Anvare Rahmadan', '12345678', 'pugeran', '087786860759', 2),
(22, 'ferniandita', 16, 'Renoq', '6969', 'Jakal', '0856565656', 3),
(23, 'ferniandita', 16, 'Juliana', '123333', 'Yogyakarta', '12', 1),
(24, 'ferniandita', 15, 'Ferniandita', '3517134908960001', 'Baker Street', '085655000200', 1),
(25, 'ferniandita', 16, 'are', '323232', 'babarsari', '085212921', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `kodepromo` varchar(10) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`kodepromo`, `diskon`, `gambar`) VALUES
('111', 12000, 'gambarpromo2'),
('12345', 15000, 'gambarpromo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idjadwal`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idbayar`),
  ADD KEY `idpesan` (`idpesan`),
  ADD KEY `kodepromo` (`kodepromo`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpesan`),
  ADD KEY `fkidjadwal` (`idjadwal`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`kodepromo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idpesan`) REFERENCES `pemesanan` (`idpesan`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`kodepromo`) REFERENCES `promo` (`kodepromo`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fkidjadwal` FOREIGN KEY (`idjadwal`) REFERENCES `jadwal` (`idjadwal`),
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `member` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
