-- --------------------------------------------------------
-- Host:                         Localhost
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.klub: ~0 rows (approximately)
/*!40000 ALTER TABLE `klub` DISABLE KEYS */;
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
  `nik` int(11) NOT NULL,
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
  `nik` int(11) NOT NULL,
  `nama_pemain` varchar(50) DEFAULT NULL,
  `id_klub` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `foto_pemain` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `FK_pemain_klub` (`id_klub`),
  CONSTRAINT `FK_pemain_klub` FOREIGN KEY (`id_klub`) REFERENCES `klub` (`id_klub`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.pemain: ~0 rows (approximately)
/*!40000 ALTER TABLE `pemain` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemain` ENABLE KEYS */;

-- Dumping structure for table db_perbasi.wasit
DROP TABLE IF EXISTS `wasit`;
CREATE TABLE IF NOT EXISTS `wasit` (
  `nik` int(11) NOT NULL,
  `nama_wasit` varchar(50) DEFAULT NULL,
  `lisensi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_perbasi.wasit: ~0 rows (approximately)
/*!40000 ALTER TABLE `wasit` DISABLE KEYS */;
/*!40000 ALTER TABLE `wasit` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
