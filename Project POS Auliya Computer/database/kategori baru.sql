-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;tb_produktb_produktb_produktb_produk
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table db_posac.tb_produk
CREATE TABLE IF NOT EXISTS `tb_produk` (
  `id_produk` varchar(50) NOT NULL DEFAULT '',
  `foto` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `nama_produk` varchar(200) DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `id_satuan` int DEFAULT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `FK_tb_produk_tb_kategori` (`id_kategori`),
  KEY `FK_tb_produk_tb_satuan` (`id_satuan`),
  CONSTRAINT `FK_tb_produk_tb_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_produk_tb_satuan` FOREIGN KEY (`id_satuan`) REFERENCES `tb_satuan` (`id_satuan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- Membuang data untuk tabel db_posac.tb_produk: ~3 rows (lebih kurang)
DELETE FROM `tb_produk`;
INSERT INTO `tb_produk` (`id_produk`, `foto`, `nama_produk`, `id_kategori`, `harga`, `stok`, `id_satuan`) VALUES
	('BRG001', 'Gambar login right.jpg', 'Kingstone Flashdisk 32gb', 9, 80000.00, 10, 3),
	('BRG002', 'Logo.png', 'Adata Flashdisk 128gb', 9, 150000.00, 20, 3),
	('BRG032', '99999-1.jpg', 'Logitect G223', 2, 334000.00, 26, 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
