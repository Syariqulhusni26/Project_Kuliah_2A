-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table db_posac.tb_kategori
CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4545546 DEFAULT CHARSET=utf8mb4 ;

-- Membuang data untuk tabel db_posac.tb_kategori: ~13 rows (lebih kurang)
DELETE FROM `tb_kategori`;
INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Keyboard'),
	(2, 'Mouse'),
	(3, 'Mousepad'),
	(4, 'Headset'),
	(5, 'Webcam'),
	(6, 'Speaker'),
	(7, 'External Hard Disk'),
	(8, 'SSD'),
	(9, 'USB Flash Drive'),
	(10, 'Monitor Stand'),
	(11, 'Colling Pad'),
	(12, 'RAM'),
	(13, 'Cooling Water');

-- membuang struktur untuk table db_posac.tb_produk
CREATE TABLE IF NOT EXISTS `tb_produk` (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(100) DEFAULT NULL,
  `foto` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `nama_produk` varchar(200) DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `id_satuan` int DEFAULT NULL,
  PRIMARY KEY (`id_produk`) USING BTREE,
  KEY `FK_tb_produk_tb_kategori` (`id_kategori`),
  KEY `FK_tb_produk_tb_satuan` (`id_satuan`),
  CONSTRAINT `FK_tb_produk_tb_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_produk_tb_satuan` FOREIGN KEY (`id_satuan`) REFERENCES `tb_satuan` (`id_satuan`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_posac.tb_produk: ~0 rows (lebih kurang)
DELETE FROM `tb_produk`;

-- membuang struktur untuk table db_posac.tb_satuan
CREATE TABLE IF NOT EXISTS `tb_satuan` (
  `id_satuan` int NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(100) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_satuan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_posac.tb_satuan: ~10 rows (lebih kurang)
DELETE FROM `tb_satuan`;
INSERT INTO `tb_satuan` (`id_satuan`, `nama_satuan`) VALUES
	(1, 'Unit'),
	(2, 'Set'),
	(3, 'Buah'),
	(4, 'Pcs'),
	(5, 'Paket'),
	(6, 'Pasang'),
	(7, 'Meter'),
	(8, 'Rol'),
	(9, 'Kit'),
	(10, 'Potong');

-- membuang struktur untuk table db_posac.tb_teknisi
CREATE TABLE IF NOT EXISTS `tb_teknisi` (
  `id_teknisi` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `nohp` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id_teknisi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_posac.tb_teknisi: ~5 rows (lebih kurang)
DELETE FROM `tb_teknisi`;
INSERT INTO `tb_teknisi` (`id_teknisi`, `nama`, `alamat`, `nohp`) VALUES
	(1, 'Syariqul Husni', 'Medan', '082163446485'),
	(2, 'Admin', 'Lhokseumawe', '082293884733'),
	(3, 'Aldo Kurniawan', 'Cout Giriek', '09992837477'),
	(15, 'Siti Hajar', 'Simonis', '0822993848843'),
	(17, 'Teuku Ikhsanul Sabri', 'Cunda, Lhokseumawe', '085345678976');

-- membuang struktur untuk table db_posac.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `nohp` varchar(50) DEFAULT NULL,
  `level` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel db_posac.tb_user: ~4 rows (lebih kurang)
DELETE FROM `tb_user`;
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `alamat`, `nohp`, `level`) VALUES
	(1, 'Syariqul Husni', 'Syariqulhusni', 'md5(password)', 'Medan', '082163446485', 1),
	(2, 'Admin', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Lhokseumawe', '082293884733', 1),
	(3, 'Aldo Kurniawan', 'Aldokurniawan', '5f4dcc3b5aa765d61d8327deb882cf99', 'Cout Giriek', '09992837477', 2),
	(15, 'Siti Hajar', 'Sitihajarsiagian', '5f4dcc3b5aa765d61d8327deb882cf99', 'Simonis', '0822993848843', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
