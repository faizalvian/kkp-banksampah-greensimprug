# Host: localhost  (Version 5.5.5-10.1.28-MariaDB)
# Date: 2018-02-07 18:31:12
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tb_customer"
#

DROP TABLE IF EXISTS `tb_customer`;
CREATE TABLE `tb_customer` (
  `id_customer` int(10) NOT NULL,
  `nm_customer` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `RT` char(2) NOT NULL,
  `RW` char(2) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_customer"
#

INSERT INTO `tb_customer` VALUES (2018020701,'PT Sampah ','Petukangan','07','05','08123456789','sampah@gmail.co','1');

#
# Structure for table "tb_kaskeluar"
#

DROP TABLE IF EXISTS `tb_kaskeluar`;
CREATE TABLE `tb_kaskeluar` (
  `Id_kaskeluar` varchar(10) NOT NULL DEFAULT '',
  `keterangan_keluar` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id_kaskeluar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_kaskeluar"
#

INSERT INTO `tb_kaskeluar` VALUES ('KET001','Pembayaran Listrik'),('KET002','Biaya Transportasi');

#
# Structure for table "tb_kasmasuk"
#

DROP TABLE IF EXISTS `tb_kasmasuk`;
CREATE TABLE `tb_kasmasuk` (
  `id_kas` varchar(10) NOT NULL DEFAULT '0',
  `keterangan` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_kas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_kasmasuk"
#

INSERT INTO `tb_kasmasuk` VALUES ('KET001','Penjualan Tunai'),('KET002','Subsidi Pemerintah');

#
# Structure for table "tb_nasabah"
#

DROP TABLE IF EXISTS `tb_nasabah`;
CREATE TABLE `tb_nasabah` (
  `id_nasabah` int(10) NOT NULL,
  `no_ktp` char(16) NOT NULL,
  `nm_nasabah` varchar(30) DEFAULT NULL,
  `jenkel` enum('1','0') NOT NULL,
  `alamat` text,
  `RT` char(2) NOT NULL,
  `RW` char(2) NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(15) DEFAULT NULL,
  `tabungan` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id_nasabah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_nasabah"
#

INSERT INTO `tb_nasabah` VALUES (2018060201,'0123456789102018','Budi','1','Ciledug Raya','05','03','021456789','Budi@gmail.com',11000.00,'1'),(2018060202,'0123456789102019','Luhur','0','Ciledug','04','02','021123789','Luhur@gmail.com',13000.00,'1'),(2018060203,'0123456789102020','Cakti','1','Petukangan','03','01','021365498','Cakti@gmail.com',32000.00,'1'),(2018070204,'0123456789102021','Faiz','1','Bintaro','06','04','085872088105','faizalvian97@gm',30000.00,'1');

#
# Structure for table "tb_pencairantab"
#

DROP TABLE IF EXISTS `tb_pencairantab`;
CREATE TABLE `tb_pencairantab` (
  `no_transaksi` char(16) NOT NULL DEFAULT '',
  `tgl_transaksi` date NOT NULL DEFAULT '0000-00-00',
  `id_nasabah` int(10) NOT NULL DEFAULT '0',
  `jumlah_tarik` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`no_transaksi`),
  KEY `id_nasabah` (`id_nasabah`),
  CONSTRAINT `tb_pencairantab_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_pencairantab"
#

INSERT INTO `tb_pencairantab` VALUES ('PT070220180001','2018-02-07',2018060201,9000.00),('PT070220180002','2018-02-07',2018070204,7000.00);

#
# Structure for table "tb_penerimaankas"
#

DROP TABLE IF EXISTS `tb_penerimaankas`;
CREATE TABLE `tb_penerimaankas` (
  `no_transaksi` char(16) NOT NULL DEFAULT '',
  `tgl_transaksi` date NOT NULL DEFAULT '0000-00-00',
  `nominal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ket_transaksi` varchar(30) NOT NULL DEFAULT '',
  `terima_dari` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_penerimaankas"
#

INSERT INTO `tb_penerimaankas` VALUES ('TK070220180001','2018-02-07',5000000.00,'KET002','pemerintah Kota Tangerang'),('TK070220180002','2018-02-07',4000000.00,'KET001','Djaetun');

#
# Structure for table "tb_pengeluarankas"
#

DROP TABLE IF EXISTS `tb_pengeluarankas`;
CREATE TABLE `tb_pengeluarankas` (
  `no_transaksi` char(16) NOT NULL DEFAULT '',
  `tgl_transaksi` date NOT NULL DEFAULT '0000-00-00',
  `nominal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ket_transaksi` varchar(30) NOT NULL DEFAULT '',
  `bayar_ke` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_pengeluarankas"
#

INSERT INTO `tb_pengeluarankas` VALUES ('PK070220180001','2018-02-07',350000.00,'KET002','Transport'),('PK070220180002','2018-02-07',1000000.00,'KET001','PLN Ciledug');

#
# Structure for table "tb_penjualan"
#

DROP TABLE IF EXISTS `tb_penjualan`;
CREATE TABLE `tb_penjualan` (
  `tgl_transaksi` date NOT NULL DEFAULT '0000-00-00',
  `no_transaksi` char(16) NOT NULL,
  `id_petugas` char(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  PRIMARY KEY (`no_transaksi`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `tb_penjualan_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `tb_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_penjualan"
#

INSERT INTO `tb_penjualan` VALUES ('2018-02-07','JS070220180001','admin',2018020701),('2018-02-07','JS070220180002','admin',2018020701),('2018-02-07','JS070220180003','admin',2018020701),('2018-02-07','JS070220180004','admin',2018020701),('2018-02-07','JS070220180005','admin',2018020701);

#
# Structure for table "tb_petugas"
#

DROP TABLE IF EXISTS `tb_petugas`;
CREATE TABLE `tb_petugas` (
  `id_petugas` char(10) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nm_petugas` varchar(30) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_petugas"
#

INSERT INTO `tb_petugas` VALUES ('admin','admin','Admin','dsadadsa','32312321');

#
# Structure for table "tb_sampah"
#

DROP TABLE IF EXISTS `tb_sampah`;
CREATE TABLE `tb_sampah` (
  `id_sampah` tinyint(2) NOT NULL,
  `jenis_sampah` varchar(20) DEFAULT NULL,
  `stok` int(5) NOT NULL DEFAULT '0',
  `hargabeli` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_sampah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_sampah"
#

INSERT INTO `tb_sampah` VALUES (1,'Alumunium',6,5000.00),(2,'Besi',9,6500.00),(3,'Kaleng',10,4000.00),(4,'Koran',3,3800.00),(5,'Kardus',10,3700.00),(6,'Emberan/Plastik',0,4000.00),(7,'Gelas Mineral',0,4000.00),(8,'Botol Mineral',0,4200.00),(9,'Botol Kaca Pet A',0,4300.00),(10,'Buku',0,7000.00),(11,'Tutup Botol',0,3000.00),(12,'SP/Boncos',0,3500.00);

#
# Structure for table "tb_detiltabungan"
#

DROP TABLE IF EXISTS `tb_detiltabungan`;
CREATE TABLE `tb_detiltabungan` (
  `no_transaksi` char(16) NOT NULL,
  `id_nasabah` int(10) NOT NULL,
  `id_sampah` tinyint(2) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  KEY `no_transaksi` (`no_transaksi`),
  KEY `id_sampah` (`id_sampah`),
  KEY `id_nasabah` (`id_nasabah`),
  CONSTRAINT `tb_detiltabungan_ibfk_3` FOREIGN KEY (`id_sampah`) REFERENCES `tb_sampah` (`id_sampah`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb_detiltabungan_ibfk_4` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_nasabah` (`id_nasabah`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_detiltabungan"
#

INSERT INTO `tb_detiltabungan` VALUES ('TB070220180001',2018060201,1,5,25000.00),('TB070220180002',2018060201,3,1,4000.00),('TB070220180003',2018060202,2,2,13000.00),('TB070220180004',2018060203,3,3,12000.00),('TB070220180005',2018070204,5,5,18500.00),('TB070220180006',2018070204,5,5,18500.00),('TB070220180007',2018060203,6,5,20000.00);

#
# Structure for table "tb_detilpenjualan"
#

DROP TABLE IF EXISTS `tb_detilpenjualan`;
CREATE TABLE `tb_detilpenjualan` (
  `no_transaksi` char(16) NOT NULL,
  `id_sampah` tinyint(2) NOT NULL,
  `jumlah` int(2) NOT NULL DEFAULT '0',
  `hargajual` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  KEY `no_transaksi` (`no_transaksi`),
  KEY `id_sampah` (`id_sampah`),
  CONSTRAINT `tb_detilpenjualan_ibfk_4` FOREIGN KEY (`id_sampah`) REFERENCES `tb_sampah` (`id_sampah`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_detilpenjualan"
#

INSERT INTO `tb_detilpenjualan` VALUES ('JS070220180001',1,1,7000.00,7000.00),('JS070220180002',3,1,5000.00,5000.00),('JS070220180003',5,5,5000.00,25000.00),('JS070220180004',5,2,8000.00,16000.00),('JS070220180005',5,5,6000.00,30000.00);

#
# Structure for table "tb_tabungan"
#

DROP TABLE IF EXISTS `tb_tabungan`;
CREATE TABLE `tb_tabungan` (
  `tgl_transaksi` date NOT NULL DEFAULT '0000-00-00',
  `no_transaksi` char(16) NOT NULL,
  `id_nasabah` int(10) NOT NULL,
  PRIMARY KEY (`no_transaksi`),
  KEY `no_nasabah` (`id_nasabah`),
  CONSTRAINT `tb_tabungan_ibfk_2` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_tabungan"
#

INSERT INTO `tb_tabungan` VALUES ('2018-02-07','TB070220180001',2018060201),('2018-02-07','TB070220180002',2018060201),('2018-02-07','TB070220180003',2018060202),('2018-02-07','TB070220180004',2018060203),('2018-02-07','TB070220180005',2018070204),('2018-02-07','TB070220180006',2018070204),('2018-02-07','TB070220180007',2018060203);

#
# Trigger "TG_STOKUPDATE_JUAL"
#

DROP TRIGGER IF EXISTS `TG_STOKUPDATE_JUAL`;
db_banksampah

#
# Trigger "TG_UPDATE_SISASALDO"
#

DROP TRIGGER IF EXISTS `TG_UPDATE_SISASALDO`;
db_banksampah

#
# Trigger "TG_UPDATESALDO_TABUNGAN"
#

DROP TRIGGER IF EXISTS `TG_UPDATESALDO_TABUNGAN`;
db_banksampah
