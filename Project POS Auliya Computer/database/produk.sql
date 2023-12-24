-- --------------------------------------------------------
-- Host:                         tiduapnl.com
-- Versi server:                 10.6.14-MariaDB-cll-lve - MariaDB Server
-- OS Server:                    Linux
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

-- membuang struktur untuk table u901156130_AuliyaComputer.tb_produk
CREATE TABLE IF NOT EXISTS `tb_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) DEFAULT NULL,
  `kode_produk` varchar(100) DEFAULT NULL,
  `nama_produk` varchar(200) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produk`) USING BTREE,
  KEY `FK_tb_produk_tb_kategori` (`id_kategori`),
  KEY `FK_tb_produk_tb_satuan` (`id_satuan`),
  CONSTRAINT `FK_tb_produk_tb_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_produk_tb_satuan` FOREIGN KEY (`id_satuan`) REFERENCES `tb_satuan` (`id_satuan`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel u901156130_AuliyaComputer.tb_produk: ~11 rows (lebih kurang)
DELETE FROM `tb_produk`;
INSERT INTO `tb_produk` (`id_produk`, `foto`, `kode_produk`, `nama_produk`, `id_kategori`, `harga`, `stok`, `id_satuan`) VALUES
	(10, '99999-Logitech G G413.jpg', 'BRG001', 'Logitech G G413', 1, 550000.00, 4, 2),
	(11, '99999-Logitech G Pro.jpg', 'BRG002', 'Logitech G Pro', 1, 750000.00, 10, 2),
	(12, '100000-Logitech G213.jpg', 'BRG003', 'Logitech G213', 1, 350000.00, 12, 2),
	(13, '100000-Logitech G502 Hero.jpg', 'BRG004', 'Logitech G502 Hero', 2, 440000.00, 11, 3),
	(14, '100000-Logitech M185.jpg', 'BRG005', 'Logitech M185', 2, 100000.00, 11, 3),
	(15, '100000-Logitech M590.jpg', 'BRG006', 'Logitech M590', 2, 90000.00, 5, 3),
	(16, '100000-Samsung SSD 1TB.jpg', 'BRG007', 'Samsung SSD 1TB', 8, 1200000.00, 6, 3),
	(17, '99999-WD-Blue SSD 512GB.jpg', 'BRG008', 'WD-Blue SSD 512GB', 8, 1200000.00, 6, 3),
	(18, '99999-Sandisk Blazer 64gb.jpg', 'BRG009', 'Sandisk Blazer 64gb', 9, 50000.00, 10, 4),
	(19, '100000-Sandisk Ultra 8gb.jpg', 'BRG010', 'Sandisk Ultra 8gb', 9, 60000.00, 10, 4),
	(20, '100000-Sandisk Ultra 128gb.jpg', 'BRG011', 'Sandisk Ultra 128gb', 9, 150000.00, 20, 4);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
