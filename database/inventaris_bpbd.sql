-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 04:37 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_bpbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `id_jenis` int(10) UNSIGNED NOT NULL,
  `merek` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` enum('B','LP','G') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_barang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rangka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_mesin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_bpkb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pajak` date DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `asal_usul` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_register` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_pengadaan` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `merek`, `kondisi`, `gambar_barang`, `no_rangka`, `no_mesin`, `no_bpkb`, `tgl_pajak`, `harga`, `asal_usul`, `keterangan`, `no_register`, `tahun_pengadaan`, `stok`, `status`) VALUES
(1, 5, 'Olimpik', 'LP', '', 'asd', 'asd', 'asd', NULL, 24999999, 'Pembelian', 'asdasd', '0001', 0, 9, 'TA'),
(2, 4, 'Yamaha', 'B', '2020-Yamaha.jpg', '463sdf', 'gdfg4', 'sdfg', '2020-08-28', 5000000, 'Pembelian', '', '0001', 2020, 3, 'AK'),
(7, 5, 'Oplimpik', 'B', '2019-Oplimpik.jpg', '', '', '', NULL, 130000, 'asd', 'asd', '', 2019, 14, 'AK'),
(8, 5, 'laksdj', 'B', '2020-laksdj.jpg', '', '', '', NULL, 1000000, 'Beli', 'aklsdj', '', 2020, 3, 'AK');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail_pinjam`, `id_peminjaman`, `id_barang`, `jumlah`) VALUES
(37, 12, 1, 0),
(38, 12, 2, 0),
(39, 10, 7, 0),
(40, 10, 1, 0),
(41, 11, 7, 0),
(42, 11, 2, 0),
(43, 14, 7, 2),
(44, 14, 1, 1),
(49, 15, 7, 1),
(50, 15, 8, 1),
(51, 13, 7, 1),
(52, 13, 8, 3),
(53, 16, 8, 1),
(54, 17, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `infrastruktur`
--

CREATE TABLE `infrastruktur` (
  `id_infrastruktur` int(11) NOT NULL,
  `kd_infrastruktur` varchar(50) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `kontruksi` varchar(50) NOT NULL,
  `gambar_barang` text NOT NULL,
  `panjang` int(5) NOT NULL,
  `luas` int(11) NOT NULL,
  `lebar` int(5) NOT NULL,
  `letak` text NOT NULL,
  `tahun_pengadaan` int(4) NOT NULL,
  `dokumen_tanggal` date NOT NULL,
  `dokumen_nomor` varchar(255) NOT NULL,
  `status_tanah` varchar(20) NOT NULL,
  `asal_usul` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `no_register` varchar(4) NOT NULL,
  `status` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infrastruktur`
--

INSERT INTO `infrastruktur` (`id_infrastruktur`, `kd_infrastruktur`, `id_jenis`, `kontruksi`, `gambar_barang`, `panjang`, `luas`, `lebar`, `letak`, `tahun_pengadaan`, `dokumen_tanggal`, `dokumen_nomor`, `status_tanah`, `asal_usul`, `harga`, `kondisi`, `keterangan`, `no_register`, `status`) VALUES
(1, '', 6, 'Beton', '', 30, 300, 10, 'Jl Subroto', 2020, '2020-02-22', 'asdasd231', 'Milik Negara', 'Pembelian', 240000, 'Baik', 'asdasd', '0001', 'AK'),
(3, 'wewe', 6, 'asd', '1235-asd.jpg', 0, 324, 0, '', 1235, '2020-02-24', '', '', 'asdasd', 3235, '', 'asdasd', '', 'AK');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(10) UNSIGNED NOT NULL,
  `fk_jenis` int(11) NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `fk_jenis`, `nama`, `level`) VALUES
(1, 0, 'Kendaraan', 1),
(2, 0, 'Barang', 1),
(3, 0, 'Infrastruktur', 1),
(4, 1, 'Motor', 2),
(5, 2, 'Meja', 2),
(6, 3, 'Tanah Kosong', 2),
(8, 0, 'Agus', 0),
(9, 1, 'Agus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode_peminjaman` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_peminjaman` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode_peminjaman`, `id_user`, `tgl_pinjam`, `tgl_kembali`, `status_peminjaman`) VALUES
(10, 'askafj', 1, '2020-02-28', '2020-02-29', 'selesai'),
(11, 'koa023490', 2, '2020-08-27', '2020-08-29', 'selesai'),
(12, '93810asd', 1, '2020-03-02', '2020-03-04', 'selesai'),
(13, 'p03948', 1, '2020-08-27', '2020-08-29', 'Belum Diambil'),
(14, 'nzsrxghkl9', 2, '2020-08-28', '2020-08-29', 'Selesai'),
(15, 'kget8p6m04', 1, '2020-10-17', '2020-10-20', 'Belum Diambil'),
(16, 'ia6zdlx5uo', 1, '2020-10-17', '2020-10-20', 'Belum Diambil'),
(17, 'bdgih6k1wy', 2, '2020-10-19', '2020-10-20', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `biaya` int(11) NOT NULL,
  `jenis_perawatan` enum('PJK','SRV','PBK') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id_perawatan`, `id_barang`, `id_user`, `tgl_permintaan`, `biaya`, `jenis_perawatan`) VALUES
(1, 2, 3, '2020-02-25', 50000, 'SRV'),
(2, 7, 2, '2020-02-25', 20000, 'PBK');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` char(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nip`, `nama_lengkap`, `username`, `password`, `jenis_kelamin`, `alamat`, `no_hp`, `divisi`, `foto`, `hak_akses`) VALUES
(1, '23235', 'Admin', 'admin', 'admin', '', 'sadfsdf', '46346346', 'asdasd', 'A-admin1.png', 'A'),
(2, '242626', 'Karyawan', 'karyawan', 'karyawan', '', 'asd', '436346', 'asdsad', 'K-karyawan.png', 'K'),
(3, '234234234', 'Kepala Bidang', 'kepala_bidang', 'kepala_bidang', '', 'asdasd', '325463634', 'Divisi 1', 'KB-kepala_bidang2.jpg', 'KB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_id_jenis_foreign` (`id_jenis`);

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`);

--
-- Indexes for table `infrastruktur`
--
ALTER TABLE `infrastruktur`
  ADD PRIMARY KEY (`id_infrastruktur`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `infrastruktur`
--
ALTER TABLE `infrastruktur`
  MODIFY `id_infrastruktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_id_jenis_foreign` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
