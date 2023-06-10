-- --------------------------------------------------------
-- Host:                         127.0.0.8
-- Server version:               10.4.20-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for db_perbasi
DROP DATABASE IF EXISTS `db_perbasi`;
CREATE DATABASE IF NOT EXISTS `db_perbasi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_perbasi`;


-- Dumping structure for table db_perbasi.berita
DROP TABLE IF EXISTS `berita`;
CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `judul` varchar(50) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `isi` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.berita: ~0 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;


-- Dumping structure for table db_perbasi.klub
DROP TABLE IF EXISTS `klub`;
CREATE TABLE IF NOT EXISTS `klub` (
  `id_klub` int(11) NOT NULL AUTO_INCREMENT,
  `nama_klub` varchar(50) DEFAULT NULL,
  `pengurus` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `struktur_pengurus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_klub`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.klub: ~12 rows (approximately)
/*!40000 ALTER TABLE `klub` DISABLE KEYS */;
REPLACE INTO `klub` (`id_klub`, `nama_klub`, `pengurus`, `logo`, `struktur_pengurus`) VALUES
	(1, 'Mahadaya Feniks', 'Rizky Yosfia Ruswita', NULL, NULL),
	(2, 'Mandala Banjarmasin', 'Luthpi Nor Fahriansyah', NULL, NULL),
	(3, 'Reborn Geo Energy', NULL, NULL, NULL),
	(4, 'Rivers Banjaramasin', NULL, NULL, NULL),
	(5, 'Rong Qing Basketball', NULL, NULL, NULL),
	(6, 'Siring Kota', NULL, NULL, NULL),
	(7, 'Sunday Morning Indonesia', NULL, NULL, NULL),
	(8, 'Roosters Basketball', NULL, NULL, NULL),
	(9, 'Titan Basket Indonesia', NULL, NULL, NULL),
	(10, 'The Police', NULL, NULL, NULL),
	(11, 'Satria Utama', NULL, NULL, NULL),
	(12, 'Gazelle Baskteball', NULL, NULL, NULL);
/*!40000 ALTER TABLE `klub` ENABLE KEYS */;


-- Dumping structure for table db_perbasi.login
DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.login: ~0 rows (approximately)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;


-- Dumping structure for table db_perbasi.pelatih
DROP TABLE IF EXISTS `pelatih`;
CREATE TABLE IF NOT EXISTS `pelatih` (
  `nik` varchar(50) NOT NULL DEFAULT '',
  `nama_pelatih` varchar(50) DEFAULT NULL,
  `lisensi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.pelatih: ~0 rows (approximately)
/*!40000 ALTER TABLE `pelatih` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelatih` ENABLE KEYS */;


-- Dumping structure for table db_perbasi.pemain
DROP TABLE IF EXISTS `pemain`;
CREATE TABLE IF NOT EXISTS `pemain` (
  `nik` varchar(50) NOT NULL DEFAULT '',
  `nama_pemain` varchar(50) DEFAULT NULL,
  `id_klub` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `foto_pemain` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `FK_pemain_klub` (`id_klub`),
  CONSTRAINT `FK_pemain_klub` FOREIGN KEY (`id_klub`) REFERENCES `klub` (`id_klub`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.pemain: ~12 rows (approximately)
/*!40000 ALTER TABLE `pemain` DISABLE KEYS */;
REPLACE INTO `pemain` (`nik`, `nama_pemain`, `id_klub`, `tempat_lahir`, `tanggal_lahir`, `posisi`, `jk`, `tinggi_badan`, `berat_badan`, `foto_pemain`) VALUES
	('1', 'Rizky Yosfia Ruswita', 1, 'Banjarmasin', '1993-06-16', 'F', NULL, 180, 107, NULL),
	('10', 'M Rizky Maulana', 1, 'Banjarmasin', '1999-07-22', 'C', NULL, NULL, NULL, NULL),
	('11', 'Rio Saputra', 1, 'Banjarmasin', '1995-01-24', 'G', NULL, NULL, NULL, NULL),
	('12', 'Ramadhan Upu Dirgantara', 1, 'Tamiyang Layang', '1999-12-29', 'SG', 'L', NULL, NULL, NULL),
	('13', 'Hiskia Steven Imanuel Kameng', 1, 'Buntok', '2004-09-30', 'SG', 'L', NULL, NULL, NULL),
	('14', 'Zaini Hasyim', 1, 'Banjarmasin', '2003-10-17', 'SG', 'L', NULL, NULL, NULL),
	('15', 'Aditia Noor Rizki', 1, 'Banjarmasin', '1998-07-06', 'G', 'L', NULL, NULL, NULL),
	('16', 'Dior More Pangaribuan', 1, 'Pekanbaru', '1986-05-22', 'PF', 'L', NULL, NULL, NULL),
	('17', 'M Fikriyani', 1, 'Banjarmasin', '1991-12-29', 'C', 'L', NULL, NULL, NULL),
	('18', 'Yusuf Iqbal', 1, 'Balikpapan', '1995-12-10', 'SG', 'L', NULL, NULL, NULL),
	('19', 'M Ridho Nurdika', 1, 'Banjarmasin', '1992-08-10', 'G', 'L', NULL, NULL, NULL),
	('2', 'Ryan Abdilla', 1, 'Banjarmasin', '1993-07-12', 'F', 'L', 180, 75, NULL),
	('20', 'Fikri Subhan', 1, 'Banjarmasin', '1988-08-08', 'PF', 'L', NULL, NULL, NULL),
	('21', 'Muhammad Rafii', 1, 'Banjarmasin', '1989-12-12', 'F', 'L', NULL, NULL, NULL),
	('22', 'M Alvito Riyaldi', 1, 'Banjarmasin', '2002-05-11', 'SG', 'L', NULL, NULL, NULL),
	('23', 'M Yoga Ramadhan', 1, 'Banjarbaru', '1996-01-26', 'F', 'L', NULL, NULL, NULL),
	('24', 'Andi Rio Saputra', 1, 'Burau', '1992-01-14', 'SG', 'L', NULL, NULL, NULL),
	('25', 'Syahril Hanla Azis', 1, 'Banjarmasin', '1999-04-06', 'F', 'L', NULL, NULL, NULL),
	('26', 'M Yunizar Firdatullah', 1, 'Banjarmasin', '2003-06-14', 'F', 'L', NULL, NULL, NULL),
	('27', 'Suharsono', 1, 'Banjar', '1996-01-15', 'C', 'L', NULL, NULL, NULL),
	('28', 'Michael Kevin', 1, 'Bekasi', '2004-05-20', 'SG', 'L', NULL, NULL, NULL),
	('29', 'Adamas Rajesha Ramzy', 1, 'Banjarmasin', '1994-08-08', 'PF', 'L', NULL, NULL, NULL),
	('3', 'Bambang Adisurya Putra', 1, 'Bogor', '1990-09-25', 'F', 'L', 180, 62, NULL),
	('4', 'Syam Hasyimi A', 1, 'Jakarta', '1999-08-30', 'F', 'L', NULL, NULL, NULL),
	('5', 'M Syirgi Aga', 1, 'Mataram', '2003-03-14', 'F', 'L', NULL, NULL, NULL),
	('6', 'Rizky Kurniawan', 1, 'Banjarmasin', '2003-06-30', 'SG', 'L', NULL, NULL, NULL),
	('7', 'Luciandro Gideon Situmorang', 1, 'Bontang', '2002-05-16', 'PF', 'L', NULL, NULL, NULL),
	('8', 'Daniel', 1, 'Bekasi', '1995-12-18', 'C', 'L', NULL, NULL, NULL),
	('9', 'Alif Riz Diasya', 1, 'Banjarmasin', '2002-07-24', 'G', 'L', NULL, NULL, NULL);
/*!40000 ALTER TABLE `pemain` ENABLE KEYS */;


-- Dumping structure for table db_perbasi.wasit
DROP TABLE IF EXISTS `wasit`;
CREATE TABLE IF NOT EXISTS `wasit` (
  `nik` varchar(50) NOT NULL DEFAULT '',
  `nama_wasit` varchar(50) DEFAULT NULL,
  `lisensi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.wasit: ~0 rows (approximately)
/*!40000 ALTER TABLE `wasit` DISABLE KEYS */;
/*!40000 ALTER TABLE `wasit` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
