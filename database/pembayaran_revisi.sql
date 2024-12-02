-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 15, 2021 at 07:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembayaran_revisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_bayar` int(11) NOT NULL,
  `nis_siswa` varchar(50) NOT NULL,
  `nama_bayar` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar_bebas`
--

CREATE TABLE `tb_bayar_bebas` (
  `id_bayar_bebas` int(11) NOT NULL,
  `id_tagihan_bebas` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `cara_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id_bulan` varchar(15) NOT NULL DEFAULT '0',
  `nama_bulan` varchar(25) DEFAULT NULL,
  `urutan` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bulan`
--

INSERT INTO `tb_bulan` (`id_bulan`, `nama_bulan`, `urutan`) VALUES
('1', 'Januari', 7),
('10', 'Oktober', 4),
('11', 'November', 5),
('12', 'Desember', 6),
('2', 'Februari', 8),
('3', 'Maret', 9),
('4', 'April', 10),
('5', 'Mei', 11),
('6', 'Juni', 12),
('7', 'Juli', 1),
('8', 'Agustus', 2),
('9', 'September', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `bulan_tahun` varchar(30) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `masuk` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `lembur` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `bulan_tahun`, `nip`, `masuk`, `sakit`, `izin`, `lembur`, `alpha`) VALUES
(24, '012017', '12344', 1, 3, 2, 5, 4),
(25, '012017', '434322', 6, 8, 7, 10, 8),
(26, '052020', '12344', 19, 3, 2, 5, 4),
(27, '052020', '434322', 20, 3, 2, 5, 4),
(28, '052020', '343443555', 19, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_bayar`
--

CREATE TABLE `tb_jenis_bayar` (
  `id_bayar` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `nama_bayar` varchar(100) NOT NULL,
  `tipe_bayar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_bayar`
--

INSERT INTO `tb_jenis_bayar` (`id_bayar`, `id_tahun_ajaran`, `nama_bayar`, `tipe_bayar`) VALUES
(6, 3, 'SPP', 'Bulanan'),
(7, 3, 'iuaran', 'Bebas'),
(8, 1, 'spp2', 'Bulanan'),
(9, 2, 'spp3', 'Bulanan'),
(10, 4, 'spp2021', 'Bulanan'),
(11, 4, 'infak', 'Bebas'),
(12, 3, 'uang gedung', 'Bebas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kas`
--

CREATE TABLE `tb_kas` (
  `id_kas` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tgl_kas` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `penerimaan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `jenis_kas` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `id_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '1A'),
(2, '1B'),
(3, '2a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_maintenance`
--

CREATE TABLE `tb_maintenance` (
  `id_maintenance` int(11) NOT NULL,
  `kode_brg` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `teknisi` varchar(30) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_maintenance`
--

INSERT INTO `tb_maintenance` (`id_maintenance`, `kode_brg`, `jumlah`, `posisi`, `tanggal`, `teknisi`, `jenis`, `status`) VALUES
(2, 'BG-0001', 2, 'Ruang Kepegawaian', '2020-07-25', 'TK-0001', 'tes', 0),
(3, 'BG-0002', 2, 'Ruang Kepegawaian', '2020-07-25', 'TK-0001', 'tes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `kode_pinjam` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`kode_pinjam`, `kode_barang`, `jumlah`, `posisi`, `nama_peminjam`, `tgl_pinjam`, `tgl_kembali`, `no_telp`, `status`) VALUES
(2, 'BG-0001', 2, 'Ruang Kepegawaian', 'tes2', '2020-07-25', '2020-07-25', '321', 0),
(3, 'BG-0002', 2, 'Ruang Kepegawaian', 'tes2', '2020-07-25', '2020-07-25', '321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `website` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `bendahara` varchar(100) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ktu` varchar(255) NOT NULL,
  `nip_ktu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profile`
--

INSERT INTO `tb_profile` (`nama_sekolah`, `alamat`, `telpon`, `website`, `kota`, `bendahara`, `nip`, `foto`, `ktu`, `nip_ktu`) VALUES
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434'),
('SEKOLAH BAHAGIA SELALU', 'JALAN RONGGOLAW NO 25 KOTA COBA-COBA', '021.090939', 'www.sekolah.com', 'Jakarta', 'Bejo Santoso', '1968890993933434', 'admin.png', 'ABDUL MUIS', '343434343434');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nama_ortu` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp_ortu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan_bebas`
--

CREATE TABLE `tb_tagihan_bebas` (
  `id_tagihan_bebas` int(11) NOT NULL,
  `id_bayar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `terbayar` int(11) NOT NULL,
  `status_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan_bulanan`
--

CREATE TABLE `tb_tagihan_bulanan` (
  `id_tagihan_bulanan` int(11) NOT NULL,
  `id_bayar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  `terbayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_bayar` int(11) NOT NULL,
  `cara_bayar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahun_ajaran`
--

INSERT INTO `tb_tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`, `status`) VALUES
(1, '2018/2019', 'tidak'),
(2, '2019/2020', 'tidak'),
(3, '2020/2021', 'tidak'),
(4, '2021/2022', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teknisi`
--

CREATE TABLE `tb_teknisi` (
  `kode_teknisi` varchar(20) NOT NULL,
  `nama_teknisi` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_teknisi`
--

INSERT INTO `tb_teknisi` (`kode_teknisi`, `nama_teknisi`, `telp`) VALUES
('TK-0001', 'AGUS RAHARJO', '3434345'),
('TK-0002', 'PARMAN', '3434345');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `nama_user`, `password`, `level`, `foto`) VALUES
(1, 'admin', 'Admin', 'admin', 'admin', 'avatar.png'),
(5, '123', 'Agung Saputra', '123456', 'user', 'avatar.png'),
(6, '456', 'Dian Syaputra', '123456', 'user', 'avatar.png'),
(7, '321', 'Mirani Rahmawati', '123456', 'user', 'avatar.png'),
(8, '654', 'Novita Sari', '123456', 'user', 'avatar.png'),
(9, '123', 'Agung Saputra', '123456', 'user', 'avatar.png'),
(10, '456', 'Dian Syaputra', '123456', 'user', 'avatar.png'),
(11, '321', 'Mirani Rahmawati', '123456', 'user', 'avatar.png'),
(12, '654', 'Novita Sari', '123456', 'user', 'avatar.png'),
(13, '123', 'Agung Saputra', '123456', 'user', 'avatar.png'),
(14, '456', 'Dian Syaputra', '123456', 'user', 'avatar.png'),
(15, '321', 'Mirani Rahmawati', '123456', 'user', 'avatar.png'),
(16, '654', 'Novita Sari', '123456', 'user', 'avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_bayar_bebas`
--
ALTER TABLE `tb_bayar_bebas`
  ADD PRIMARY KEY (`id_bayar_bebas`);

--
-- Indexes for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tb_jenis_bayar`
--
ALTER TABLE `tb_jenis_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_maintenance`
--
ALTER TABLE `tb_maintenance`
  ADD PRIMARY KEY (`id_maintenance`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`kode_pinjam`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_tagihan_bebas`
--
ALTER TABLE `tb_tagihan_bebas`
  ADD PRIMARY KEY (`id_tagihan_bebas`);

--
-- Indexes for table `tb_tagihan_bulanan`
--
ALTER TABLE `tb_tagihan_bulanan`
  ADD PRIMARY KEY (`id_tagihan_bulanan`);

--
-- Indexes for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `tb_teknisi`
--
ALTER TABLE `tb_teknisi`
  ADD PRIMARY KEY (`kode_teknisi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_bayar_bebas`
--
ALTER TABLE `tb_bayar_bebas`
  MODIFY `id_bayar_bebas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_jenis_bayar`
--
ALTER TABLE `tb_jenis_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kas`
--
ALTER TABLE `tb_kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_maintenance`
--
ALTER TABLE `tb_maintenance`
  MODIFY `id_maintenance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `kode_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_tagihan_bebas`
--
ALTER TABLE `tb_tagihan_bebas`
  MODIFY `id_tagihan_bebas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_tagihan_bulanan`
--
ALTER TABLE `tb_tagihan_bulanan`
  MODIFY `id_tagihan_bulanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=721;

--
-- AUTO_INCREMENT for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
