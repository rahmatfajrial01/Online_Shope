-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2022 pada 17.46
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin@gmail.com', 'admin@gmail.com', 'admin admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_kategori`
--

INSERT INTO `t_kategori` (`id_kategori`, `nama_kategori`) VALUES
(14, 'Ikan Laut'),
(15, 'Ikan Air Tawar'),
(18, 'Ikan Asin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ongkir`
--

CREATE TABLE `t_ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_ongkir`
--

INSERT INTO `t_ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(3, 'Padang', 30000),
(4, 'Bukit Tinggi', 30000),
(5, 'Pariaman', 20000),
(6, 'Payakumbuh', 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pelanggan`
--

CREATE TABLE `t_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(7, 'rian@gmail.com', '12345', 'Rian Pratama', '0823912345', 'Payakumbuh'),
(8, 'algi@gmail.com', '12345', 'Algi Prakoso', '08239145678', 'Bukit Tinggi'),
(9, 'eki@gmail.com', '12345', 'Eki Riski', '0823567889', 'Pariaman'),
(10, 'yanto@gmail.com', '12345', 'Yanto Ismoyo', '0834564565', 'Payakumbuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pembayaran`
--

CREATE TABLE `t_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pembayaran`
--

INSERT INTO `t_pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(35, 89, 'Rian', 'Mandiri', 152000, '2022-01-12', '20220112095014struck1.jfif'),
(36, 90, 'Algi', 'Mandiri', 147000, '2022-01-12', '20220112095326struck2.jpg'),
(37, 91, 'Eki', 'BRI', 263000, '2022-01-12', '20220112095801struck1.jfif'),
(38, 92, 'Rian', 'Mandiri', 150000, '2022-01-12', '20220112100848struck1.jfif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pembelian`
--

CREATE TABLE `t_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pembelian`
--

INSERT INTO `t_pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(89, 7, 6, '2022-01-12', 152000, 'Payakumbuh', 40000, 'Payakumbuh Balai Nan Duo', 'sudah kirim pembayaran', ''),
(90, 8, 4, '2022-01-12', 147000, 'Bukit Tinggi', 30000, 'Bukit Tinggi Pasar Ateh', 'Lunas', ''),
(91, 9, 5, '2022-01-12', 263000, 'Pariaman', 20000, 'Pariaman Kabupaten Tiku', 'barang dikirim', 'ABC00123'),
(92, 7, 6, '2022-01-12', 150000, 'Payakumbuh', 40000, 'Payakumbuh Balai Nan DUO', 'sudah kirim pembayaran', ''),
(93, 7, 6, '2022-01-12', 128000, 'Payakumbuh', 40000, 'Payakumbuh Balai Nan Duo', 'pending', ''),
(94, 10, 6, '2022-01-13', 227000, 'Payakumbuh', 40000, 'Payakumbuh komplek indah sari blok A5', 'pending', ''),
(95, 10, 6, '2022-01-13', 88000, 'Payakumbuh', 40000, 'payakumbuh komprel indah sari blok A4', 'pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pembelian_produk`
--

CREATE TABLE `t_pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pembelian_produk`
--

INSERT INTO `t_pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(234, 89, 54, 2, 'Ikan Nila        ', 24000, 1, 2, 48000),
(235, 89, 55, 2, 'Ikan Gurame  ', 32000, 1, 2, 64000),
(236, 90, 53, 3, 'Ikan lele  ', 23000, 1, 3, 69000),
(237, 90, 54, 2, 'Ikan Nila        ', 24000, 1, 2, 48000),
(238, 91, 55, 4, 'Ikan Gurame  ', 32000, 1, 4, 128000),
(239, 91, 53, 5, 'Ikan lele  ', 23000, 1, 5, 115000),
(240, 92, 55, 2, 'Ikan Gurame  ', 32000, 1, 2, 64000),
(241, 92, 53, 2, 'Ikan lele  ', 23000, 1, 2, 46000),
(242, 93, 55, 2, 'Ikan Gurame  ', 32000, 1, 2, 64000),
(243, 93, 54, 1, 'Ikan Nila        ', 24000, 1, 1, 24000),
(244, 94, 54, 3, 'Ikan Nila        ', 24000, 1, 3, 72000),
(245, 94, 53, 5, 'Ikan lele  ', 23000, 1, 5, 115000),
(246, 95, 54, 2, 'Ikan Nila        ', 24000, 1, 2, 48000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk`
--

CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `deskripsi_produk` varchar(100) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `stok_produk` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `deskripsi_produk`, `foto_produk`, `stok_produk`) VALUES
(53, 15, 'Ikan lele  ', 23000, 1, ' ikan lele pak ujang beru di panen\r\n                        ', 'Untitled-1.jpg', 6),
(54, 15, 'Ikan Nila        ', 24000, 1, 'ikan nila segar baru di panen\r\n                         \r\n                        ', 'Untitled-2.jpg', 7),
(55, 15, 'Ikan Gurame  ', 32000, 1, 'ikan gurame segar baru panen\r\n                        ', 'Untitled-3.jpg', 18),
(56, 14, 'Ikan Tuna    ', 95000, 1, 'ikan tuna baru di tanggkap\r\n                         \r\n                        ', 'Untitled-4.jpg', 30),
(59, 14, 'Ikan Kakap', 70000, 1, 'ikan kakap merah', 'ikankakap.jpg', 40);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `t_ongkir`
--
ALTER TABLE `t_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `t_pembelian`
--
ALTER TABLE `t_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `t_pembelian_produk`
--
ALTER TABLE `t_pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `t_ongkir`
--
ALTER TABLE `t_ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `t_pembelian`
--
ALTER TABLE `t_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `t_pembelian_produk`
--
ALTER TABLE `t_pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
