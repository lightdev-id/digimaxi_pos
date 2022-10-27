-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 01:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edukidos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` varchar(255) NOT NULL,
  `id_kategori` int(255) NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `harga_jual` bigint(255) NOT NULL,
  `harga_beli` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `id_kategori`, `nama_bahan`, `harga_jual`, `harga_beli`) VALUES
('631ee7b6d7296', 3, 'Flexy Korea 450', 80000, 60000),
('631ee7d6db8cf', 3, 'Flexy China 380', 60000, 40000),
('631ee7e8ee99a', 1, 'AC 230', 20000, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(255) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_customer`, `alamat`, `email`) VALUES
('631ee80d1f5d9', 'Mas Adul', 'Jl. Kebaksdbka laksdjla laksj dlkajs dlkalsk jdaslk jl askjdhak aksdjhakl laskdjalk laskd as;ldk laksjdlak lkasd lkjasd', 'abdul@gmail.com'),
('631fead535095', 'Rafii Yuuki', 'Banten', 'rafi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
('1', 'A3'),
('2', 'Indoor'),
('3', 'Outdoor');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id_order` varchar(255) NOT NULL,
  `tgl_order` date NOT NULL,
  `no_po` text NOT NULL,
  `no_inv` varchar(255) NOT NULL,
  `nama_kerja` varchar(255) NOT NULL,
  `urgensi` int(1) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `file` text NOT NULL,
  `panjang` int(255) NOT NULL,
  `lebar` int(255) NOT NULL,
  `biaya_design` bigint(255) NOT NULL,
  `harga_bahan` bigint(255) NOT NULL,
  `dp_awal` bigint(20) NOT NULL,
  `catatan` text NOT NULL,
  `finishing` text NOT NULL,
  `status` int(1) NOT NULL,
  `status_bayar` int(1) NOT NULL,
  `spk` varchar(255) DEFAULT NULL,
  `tgl_spk` date DEFAULT NULL,
  `op_finishing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `orderan`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `orderan` FOR EACH ROW UPDATE stok  
SET 
  stok = stok-NEW.jumlah
WHERE 
  id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_gudang`
--

CREATE TABLE `order_gudang` (
  `id_order` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `supplier` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_gudang`
--

INSERT INTO `order_gudang` (`id_order`, `id_barang`, `tgl_order`, `supplier`, `qty`) VALUES
('1', '1', '2022-06-09', 'PT. KERTAS', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `id_barang`, `no_po`, `jumlah`, `tgl_beli`) VALUES
('63579e1e421ca', '631ee7d6db8cf', 'PO001', 10, '2022-10-25');

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `pembelian` FOR EACH ROW UPDATE stok
SET
 stok = stok+NEW.jumlah
WHERE
  id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `norek` text NOT NULL,
  `bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `atas_nama`, `norek`, `bank`) VALUES
('631ee85db3b09', 'PT. Edukidos Madina Creativa', '541738591', 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_barang` varchar(255) NOT NULL,
  `stok` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stok_retur`
--

CREATE TABLE `stok_retur` (
  `id_retur` varchar(255) NOT NULL,
  `id_beli` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah_retur` int(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_retur` date NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `stok_retur`
--
DELIMITER $$
CREATE TRIGGER `stok_retur` AFTER INSERT ON `stok_retur` FOR EACH ROW UPDATE stok  
SET 
  stok = stok-NEW.jumlah_retur
WHERE 
  id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id_surat` varchar(255) NOT NULL,
  `id_order` varchar(255) NOT NULL,
  `plat_nomor` varchar(255) NOT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `role`) VALUES
('1', 'superadmin', 'Direktur', '123', 1),
('2', 'spk', 'Divisi SPK', '123', 2),
('3', 'gudang', 'Divisi Gudang', '123', 3),
('4', 'admin', 'Divisi Admin', '123', 4),
('5', 'finishing', 'Divisi Finishing', '123', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_gudang`
--
ALTER TABLE `order_gudang`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `stok_retur`
--
ALTER TABLE `stok_retur`
  ADD PRIMARY KEY (`id_retur`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
