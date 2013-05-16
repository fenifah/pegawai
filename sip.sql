-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2013 at 10:53 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sip`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(0, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Administrasi'),
(2, 'Keuangan'),
(4, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_peg` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_peg`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_peg`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `notelp`, `id_jabatan`, `foto`) VALUES
(1, 'P2013-001', 'Brian', 'Bandung', '1994-01-04', 'L', 'Katholik', 'Yogyakarta', '081226889', 2, 'aku.png'),
(2, 'P2013-002', 'Paijo', 'Jogja', '1992-10-10', 'L', 'Budha', 'Jogja', '90990909', 4, '12.jpg'),
(3, 'P2013-003', 'Dewa', 'Yogyakarta', '1995-01-05', 'P', 'Kristen', 'ertsfdsfdf', '454454454', 2, '13.jpg'),
(5, 'P2013-004', 'sdsdsd', 'sadsadasd', '1992-12-12', 'L', 'Budha', 'stsetrt', '454545445', 4, 'untitled-a1_copy.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
