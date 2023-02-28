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
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `judul` varchar(50) DEFAULT NULL,
  `isi` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.berita: ~0 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;


-- Dumping structure for table db_perbasi.klub
DROP TABLE IF EXISTS `klub`;
CREATE TABLE IF NOT EXISTS `klub` (
  `id_klub` int(11) NOT NULL,
  `pengurus` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `struktur_pengurus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_klub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.klub: ~0 rows (approximately)
/*!40000 ALTER TABLE `klub` DISABLE KEYS */;
/*!40000 ALTER TABLE `klub` ENABLE KEYS */;


-- Dumping structure for table db_perbasi.login
DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.login: ~0 rows (approximately)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;


-- Dumping structure for table db_perbasi.pemain
DROP TABLE IF EXISTS `pemain`;
CREATE TABLE IF NOT EXISTS `pemain` (
  `NIK` int(11) NOT NULL,
  `nama_pemain` varchar(50) DEFAULT NULL,
  `id_klub` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `foto_pemain` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NIK`),
  KEY `FK_pemain_klub` (`id_klub`),
  CONSTRAINT `FK_pemain_klub` FOREIGN KEY (`id_klub`) REFERENCES `klub` (`id_klub`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.pemain: ~0 rows (approximately)
/*!40000 ALTER TABLE `pemain` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemain` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
