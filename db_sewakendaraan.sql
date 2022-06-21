-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2022 pada 14.10
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sewakendaraan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kendaraan`
--

CREATE TABLE `detail_kendaraan` (
  `id_detailkendaraan` int(10) NOT NULL,
  `id_sup` int(10) DEFAULT NULL,
  `id_kendaraan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_kendaraan`
--

INSERT INTO `detail_kendaraan` (`id_detailkendaraan`, `id_sup`, `id_kendaraan`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(10) DEFAULT NULL,
  `id_kendaraan` int(10) DEFAULT NULL,
  `id_detail` int(10) NOT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `lama_peminjaman` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_kendaraan`, `id_detail`, `tgl_peminjaman`, `tgl_pengembalian`, `lama_peminjaman`) VALUES
(2, 1, 1, '0000-00-00', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(10) NOT NULL,
  `id_transmisi` int(10) DEFAULT NULL,
  `merk` varchar(20) NOT NULL,
  `nopol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `id_transmisi`, `merk`, `nopol`) VALUES
(1, 0, 'Brio', 'L 5590 AAG'),
(2, 1, 'JEEP', 'L 5690 AAC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_peg` int(10) NOT NULL,
  `nama_peg` varchar(30) NOT NULL,
  `notelp_peg` varchar(15) NOT NULL,
  `username_peg` varchar(50) DEFAULT NULL,
  `pass_peg` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_peg`, `nama_peg`, `notelp_peg`, `username_peg`, `pass_peg`) VALUES
(1, 'Ilyasa', '081556765341', 'ilyas', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_sup` int(10) NOT NULL,
  `nama_sup` varchar(30) NOT NULL,
  `notelp_sup` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_sup`, `nama_sup`, `notelp_sup`) VALUES
(1, 'ABDI JAYA CAR', '0811111111'),
(2, 'SURYA KENCANA MOTOR', '0822222222'),
(3, 'ISKANDARIA MOTOR', '0833333333'),
(4, 'SIMON JAYA ABADI', '0844444444'),
(5, 'SURYA KENCANA MOTOR', '0822222222'),
(6, 'FLOURENT KENCANA', '0866666666'),
(7, 'HELMI JAYA CAR', '0877777777'),
(8, 'AGUNG KENCANA MOTOR', '0888888888'),
(9, 'FELIX MOTOR', '0899999999'),
(10, 'SUPER JAYA ABADI', '0812345678'),
(11, 'ILYASA COMPANY', '0834567891'),
(12, 'NANDA COMPANY', '0845678912'),
(13, 'SEMERU ABADI', '08567890123'),
(14, 'SINAR ABADI JAYA', '0856789123'),
(15, 'YUYU ABADI JAYA', '08678912345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_transmisi`
--

CREATE TABLE `tipe_transmisi` (
  `id_transmisi` int(10) NOT NULL,
  `jenis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_transmisi`
--

INSERT INTO `tipe_transmisi` (`id_transmisi`, `jenis`) VALUES
(0, 'Matic'),
(1, 'Manual'),
(2, 'Otomatis CVT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `tgl_transaksi`) VALUES
(1, 1, '0000-00-00'),
(2, 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `notelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `notelp`) VALUES
(1, 'Ilyasa', 'Lakarsantri', '081555555'),
(2, 'Rahmad', 'Babatan', '082333333'),
(3, 'Nanda', 'Babatan', '082444444');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_kendaraan`
--
ALTER TABLE `detail_kendaraan`
  ADD PRIMARY KEY (`id_detailkendaraan`),
  ADD KEY `id_sup` (`id_sup`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_id_transaksi` (`id_transaksi`),
  ADD KEY `fk_id_kendaraan` (`id_kendaraan`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `fk_id_transmisi` (`id_transmisi`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_peg`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_sup`);

--
-- Indeks untuk tabel `tipe_transmisi`
--
ALTER TABLE `tipe_transmisi`
  ADD PRIMARY KEY (`id_transmisi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_kendaraan`
--
ALTER TABLE `detail_kendaraan`
  ADD CONSTRAINT `detail_kendaraan_ibfk_1` FOREIGN KEY (`id_sup`) REFERENCES `supplier` (`id_sup`),
  ADD CONSTRAINT `detail_kendaraan_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_id_kendaraan` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `fk_id_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `fk_id_transmisi` FOREIGN KEY (`id_transmisi`) REFERENCES `tipe_transmisi` (`id_transmisi`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
