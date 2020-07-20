-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2020 pada 04.54
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bonshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID_admin` int(5) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `url_foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_admin`, `password`, `nama_admin`, `url_foto`) VALUES
(1, 'YXN1', 'admin', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `ID_cart` int(5) NOT NULL,
  `ID_user` int(5) DEFAULT NULL,
  `ID_produk` int(5) DEFAULT NULL,
  `jumlah_produk` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produk`
--

CREATE TABLE `data_produk` (
  `ID_data_produk` int(5) NOT NULL,
  `harga` varchar(15) DEFAULT NULL,
  `stok` int(5) DEFAULT NULL,
  `url_foto` varchar(50) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_produk`
--

INSERT INTO `data_produk` (`ID_data_produk`, `harga`, `stok`, `url_foto`, `kategori`) VALUES
(1, '23000', 5, 'gambar.png', 'boneka, bear'),
(2, '25000', 4, 'gambar.png', 'boneka, bear, xl'),
(5, '34000', 5, 'gambar.png', 'doraemon, l'),
(6, '34000', 5, 'gambar.png', 'doraemon, l'),
(7, '14000', 5, 'gambar.png', 'doraemon, s'),
(8, '16000', 3, 'gambar.png', 'doraemon, m');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `ID_data_user` int(5) NOT NULL,
  `nama_depan` varchar(25) DEFAULT NULL,
  `nama_belakang` varchar(25) DEFAULT NULL,
  `ID_jk` int(5) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `nomor_telp` varchar(15) DEFAULT NULL,
  `url_foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`ID_data_user`, `nama_depan`, `nama_belakang`, `ID_jk`, `tgl_lahir`, `nomor_telp`, `url_foto`) VALUES
(1, 'fadil', 'nur', 1, '1998-03-12', '081237', ''),
(2, 'fadil', 'run', 2, '2000-01-24', '01239', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `ID_jk` int(5) NOT NULL,
  `jenis_kelamin` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_pembayaran` int(5) NOT NULL,
  `ID_order` int(5) DEFAULT NULL,
  `total_bayar` varchar(15) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `url_bukti_bayar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_order` int(5) NOT NULL,
  `ID_produk` int(5) DEFAULT NULL,
  `ID_user` int(5) DEFAULT NULL,
  `jumlah_produk` int(50) DEFAULT NULL,
  `total_bayar` varchar(50) NOT NULL,
  `status_order` int(5) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`ID_order`, `ID_produk`, `ID_user`, `jumlah_produk`, `total_bayar`, `status_order`, `tgl_masuk`, `alamat`) VALUES
(1, 8, 1, 2, '16000', 1, '2020-06-02', 'JL. Malang'),
(2, 1, 1, 3, '69000', 1, '2020-06-02', 'JL. Malang'),
(3, 6, 1, 1, '34000', 1, '2020-07-05', 'JL. Malang'),
(4, 8, 1, 2, '32000', 1, '2020-07-05', 'Jalan Malang 7A'),
(5, 8, 1, 2, '32000', 1, '2020-07-05', 'Jalan Merdeka nomor 1'),
(6, 8, 1, 2, '32000', 1, '2020-07-05', 'Jalan Mondoroko nomor 3'),
(7, 8, 1, 3, '48000', 1, '2020-07-05', 'Jalan Lawang 56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ID_produk` int(5) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ID_produk`, `nama_produk`) VALUES
(1, 'Bear L'),
(2, 'Bear XL'),
(5, 'Doraemon L'),
(6, 'Doraemon L'),
(7, 'Doraemon S'),
(8, 'Doraemon M');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_order`
--

CREATE TABLE `status_order` (
  `ID_status_order` int(5) NOT NULL,
  `status_order` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_order`
--

INSERT INTO `status_order` (`ID_status_order`, `status_order`) VALUES
(1, 'Pending'),
(2, 'Diproses'),
(3, 'Cancel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_user` int(5) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_user`, `password`, `username`) VALUES
(1, 'YXN1', '081237'),
(2, 'YWFhYWFhYQ==', '01239');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID_cart`);

--
-- Indeks untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`ID_data_produk`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`ID_data_user`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`ID_jk`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_pembayaran`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_order`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ID_produk`);

--
-- Indeks untuk tabel `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`ID_status_order`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `ID_cart` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `ID_data_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `ID_data_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `ID_jk` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `ID_pembayaran` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `ID_order` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `ID_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `status_order`
--
ALTER TABLE `status_order`
  MODIFY `ID_status_order` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
