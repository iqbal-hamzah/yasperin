-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2014 at 10:29 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yasperin`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `IdBuku` varchar(6) NOT NULL,
  `Sampul` varchar(100) NOT NULL,
  `Judul` varchar(50) NOT NULL,
  `Penulis` varchar(25) NOT NULL,
  `Kategori` varchar(20) NOT NULL,
  `Sinopsis` text NOT NULL,
  `Harga` int(11) NOT NULL,
  PRIMARY KEY (`IdBuku`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`IdBuku`, `Sampul`, `Judul`, `Penulis`, `Kategori`, `Sinopsis`, `Harga`) VALUES
('BK0001', 'Hayat/Sampul Pelajaran Dasar Tentang Hayat - Witness Lee.jpg', 'Pelajaran Dasar Tentang Hayat', 'Witness Lee', 'Hayat', '<p>Pelajaran dasar tentang hayat ini disampaikan oleh saudara Witness Lee dari bulan Februari hingga bulan Nopember 1979 di Anaheim, California</p>', 25000),
('BK0002', 'Hayat/Sampul Pengalaman Hayat (1) - Witness Lee.jpg', 'Pengalaman Hayat(1)', 'Witness Lee', 'Hayat', 'Isi berita ini (Pengalaman Hayat) membahas pengalaman atas hayat ', 45000),
('BK0005', 'Injil/Sampul Bagaimana Membagi Traktat - Watchman Nee.jpg', 'Bagaimana Membagi Traktat', 'Watchman Nee', 'Injil', 'Dalam berita ini kita akan membahas masalah membagikan traktat. ', 20000),
('BK0003', 'Hayat/Sampul Pengalaman Hayat (2) - Witness Lee.jpg', 'Pengalaman Hayat (2)', 'Witness Lee', 'Hayat', 'Buku ini merupakana seri lanjutan dari buku Pengalaman Hayat(1)', 45000),
('BK0004', 'Hayat/Sampul Pengenalan Hayat - Witness Lee.jpg', 'Pengenalan Hayat', 'Witness Lee', 'Hayat', 'Buku ini merupakana buku pengenalan tentang Hayat', 35000),
('BK0006', 'Injil/Sampul Garis-garis besar injil (1) - Witness Lee.jpg', 'Garis-garis besar injil (1)', 'Witness Lee', 'Injil', 'Garis-garisBesar Injil adalah catatan dariberita-beritayang diberikandalampelatihan pelayanan istimewa gereja di Taipei pada Oktober 1954', 50000),
('BK0007', 'Injil/Sampul Injil - Witness Lee.jpg', 'Injil', 'Witness Lee', 'Injil', 'Buku Tentang Injil ', 15000),
('BK0008', 'Injil/Sampul Pintas Ke Neraka - Watchman Nee.jpg', 'Pintas Ke Neraka', 'Watchman Nee', 'Injil', 'Buku tentang pintas ke neraka', 20000),
('BK0009', 'Karakter/Sampul Benar - LYD.jpg', 'Benar', 'LYD', 'Karakter', 'Buku tentang karakter benar', 12500),
('BK0010', 'Karakter/Sampul Ketat - LYD.jpg', 'Ketat', 'LYD', 'Karakter', 'Buku tentang karakter ketat', 12500),
('BK0011', 'Karakter/Sampul Rajin - LYD.jpg', 'Rajin', 'LYD', 'Karakter', 'Buku tentang karakter rajin', 12500),
('BK0012', 'Karakter/Sampul Tepat - LYD.jpg', 'Tepat', 'LYD', 'Karakter', 'Buku tentang karakter tepat', 12500),
('BK0013', 'Pembinaan Dasar/Sampul Bangun Pagi-pagi - Watchman Nee.jpg', 'Bangun Pagi-pagi', 'Watchman Nee', 'Pembinaan Dasar', 'Siapa yang bangunnya pagi-pagi, dia akan mendapat banyak faedah rohani. Doa pada waktu-waktu biasa tidak dapat memenangkan doa pada pagi hari. ', 15000),
('BK0014', 'Pembinaan Dasar/Sampul Baptisan - Watchman Nee.jpg', 'Baptisan', ' Watchman Nee', 'Pembinaan Dasar', 'Baptisan adalah satu judul yang sangat besar dalam Alkitab. Dalam hal baptisan ini ada dua perkara yang perlu kita pahami dengan jelas', 15000),
('BK0015', 'Pembinaan Dasar/Sampul Berbagai Jenis Sidang - Watchman Nee.jpg', 'Berbagai Jenis Sidang', 'Watchman Nee', 'Pembinaan Dasar', 'Buku tentang berbagai Jenis Sidang.', 15000),
('BK0016', 'Pembinaan Dasar/Sampul Berdoa - Watchman Nee.jpg', 'Berdoa', 'Watchman Nee', 'Pembinaan Dasar', 'Buku tentang cara berdoa', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `detailpemesanan`
--

CREATE TABLE IF NOT EXISTS `detailpemesanan` (
  `IdDetailPemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `IdPemesanan` varchar(6) NOT NULL,
  `IdBuku` varchar(6) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Diskon` int(11) NOT NULL,
  PRIMARY KEY (`IdDetailPemesanan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `detailpemesanan`
--

INSERT INTO `detailpemesanan` (`IdDetailPemesanan`, `IdPemesanan`, `IdBuku`, `Harga`, `Jumlah`, `Diskon`) VALUES
(1, 'PM0001', 'BK0001', 25000, 1, 0),
(33, 'PM0004', 'BK0002', 45000, 1, 0),
(32, 'PM0004', 'BK0001', 25000, 1, 0),
(13, 'PM0003', 'BK0001', 25000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `IdNota` varchar(6) NOT NULL,
  `TanggalNota` date NOT NULL,
  `IdPemesanan` varchar(6) NOT NULL,
  PRIMARY KEY (`IdNota`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`IdNota`, `TanggalNota`, `IdPemesanan`) VALUES
('NT0001', '2014-06-20', 'PM0002'),
('NT0002', '2014-06-20', 'PM0003'),
('NT0003', '2014-06-20', 'PM0003');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `IdPelanggan` varchar(6) NOT NULL,
  `Sandi` varchar(50) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `JenisKelamin` varchar(1) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Kota` varchar(20) NOT NULL,
  `KodePos` varchar(10) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Handphone` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  PRIMARY KEY (`IdPelanggan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IdPelanggan`, `Sandi`, `Nama`, `JenisKelamin`, `Alamat`, `Kota`, `KodePos`, `Phone`, `Handphone`, `Email`) VALUES
('PL0001', '1f8a9be8cb8749114d6a9d79c6381465', 'Pelanggan 1', 'F', 'Jalan Pelanggan 1', 'Jakarta Timur', '14400', '123421', '1231231', 'cust001@yahoo.com'),
('PL0002', '390405d90240039022e6b131e82eccf0', 'Pelanggan 2', 'M', 'Jalan Pelanggan 2', 'Bekasi', '142321', '09212121', '0812121212', 'cust002@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `IdPembayaran` varchar(6) NOT NULL,
  `IdPemesanan` varchar(6) NOT NULL,
  `IdPelanggan` varchar(15) NOT NULL,
  `Tanggal` date NOT NULL,
  `Total` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  PRIMARY KEY (`IdPembayaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`IdPembayaran`, `IdPemesanan`, `IdPelanggan`, `Tanggal`, `Total`, `Status`) VALUES
('PB0002', 'PM0003', 'PL0001', '0000-00-00', 55000, 'Sudah Bayar'),
('PB0003', 'PM0004', 'PL0001', '1970-01-01', 100000, 'Belum Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `IdPemesanan` varchar(6) NOT NULL,
  `IdPelanggan` varchar(25) NOT NULL,
  `Tanggal` date NOT NULL,
  `Total` int(11) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`IdPemesanan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`IdPemesanan`, `IdPelanggan`, `Tanggal`, `Total`, `Status`) VALUES
('PM0001', 'PL0001', '2014-05-28', 0, 'Cart'),
('PM0003', 'PL0001', '2014-05-30', 25000, 'Confirm'),
('PM0004', 'PL0001', '2014-06-10', 100000, 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `IdPengiriman` varchar(6) NOT NULL,
  `Tanggal` date NOT NULL,
  `Ongkos` int(6) NOT NULL,
  `Alamat` varchar(200) NOT NULL,
  `KodePos` int(7) NOT NULL,
  `Kota` varchar(20) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `IdPemesanan` varchar(6) NOT NULL,
  PRIMARY KEY (`IdPengiriman`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`IdPengiriman`, `Tanggal`, `Ongkos`, `Alamat`, `KodePos`, `Kota`, `Status`, `IdPemesanan`) VALUES
('PR0002', '2015-04-06', 30000, 'Jalan Jogja', 123456, 'Yogyakarta', 'Proses Kirim', 'PM0003'),
('PR0003', '1970-01-01', 30000, 'dsadsa', 12321321, 'Bali', 'Belum Dikirim', 'PM0004');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE IF NOT EXISTS `pengurus` (
  `IdPengurus` varchar(6) NOT NULL,
  `Sandi` varchar(50) NOT NULL,
  `TipeAkses` varchar(10) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `JenisKelamin` varchar(1) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Handphone` varchar(15) NOT NULL,
  PRIMARY KEY (`IdPengurus`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`IdPengurus`, `Sandi`, `TipeAkses`, `Nama`, `JenisKelamin`, `Alamat`, `Email`, `Phone`, `Handphone`) VALUES
('EM0001', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', 'M', 'Administrator Street', 'admin@admin.com', '12346', '0812345678'),
('EM0002', '1d0258c2440a8d19e716292b231e3190', 'Manager', 'Manager', 'F', 'Manager', 'manager@manager.com', '1234667', '123213231');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `IDPromosi` int(11) NOT NULL AUTO_INCREMENT,
  `JudulPromo` varchar(100) NOT NULL,
  `IsiPromo` text NOT NULL,
  `TglPromo` date NOT NULL,
  `IdPengurus` varchar(15) NOT NULL,
  PRIMARY KEY (`IDPromosi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`IDPromosi`, `JudulPromo`, `IsiPromo`, `TglPromo`, `IdPengurus`) VALUES
(21, 'May Promo', 'Buy 10 Books , Bonus Cashback', '2014-04-23', 'admin'),
(3, 'Special January !!!', 'Feels Discount 12% All Item', '2014-06-03', 'admin'),
(19, 'Februari Price', '14 February Disc 14% All Items Special for Valentine Day', '2014-02-04', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
