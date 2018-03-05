# Host: localhost  (Version 5.5.5-10.1.30-MariaDB)
# Date: 2018-03-05 02:25:39
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

INSERT INTO `tb_customer` VALUES (2018020701,'PT Sampah ','Petukangan','07','05','08123456789','sampah@gmail.co','1'),(2018030202,'Bank Sampah Teratai','Ciledug Raya','06','04','021456687','bst@gmail.com','1');

#
# Structure for table "tb_ketkas"
#

DROP TABLE IF EXISTS `tb_ketkas`;
CREATE TABLE `tb_ketkas` (
  `id_ket` varchar(10) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('masuk','keluar') NOT NULL,
  PRIMARY KEY (`id_ket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_ketkas"
#

INSERT INTO `tb_ketkas` VALUES ('KET001','penjualan tunai','masuk'),('KET002','pembayaran listrik','keluar'),('KET003','gfdhfgdd','masuk');

#
# Structure for table "tb_kas"
#

DROP TABLE IF EXISTS `tb_kas`;
CREATE TABLE `tb_kas` (
  `no_transaksi` char(16) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nominal` decimal(10,0) NOT NULL DEFAULT '0',
  `ket_transaksi` varchar(10) NOT NULL,
  `status` enum('masuk','keluar') NOT NULL,
  `dest` varchar(255) NOT NULL,
  KEY `ket_transaksi` (`ket_transaksi`),
  CONSTRAINT `tb_kas_ibfk_1` FOREIGN KEY (`ket_transaksi`) REFERENCES `tb_ketkas` (`id_ket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_kas"
#

INSERT INTO `tb_kas` VALUES ('TK280220180001','2018-02-09',40000,'KET001','masuk','customer'),('TK280220180002','2018-02-15',10000,'KET002','keluar','pln'),('TK020320180003','2018-03-01',500000,'KET001','masuk','Customer'),('TK020320180003','2018-03-01',500000,'KET001','masuk','customer');

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

INSERT INTO `tb_nasabah` VALUES (2018020301,'4612318794163165','Ahmad Bakrie','1','Larangan','05','03','085872088101','ahmadbakrie@gma',61000.00,'1'),(2018020302,'4568791489792982','Aminah','0','Larangan','05','03','085872088102','aminah@gmail.co',30000.00,'1'),(2018020303,'1894151969521198','Syaiful Anwar','1','Ciledug Raya','04','02','085872088103','syaiful@gmail.c',23000.00,'1'),(2018040304,'1396841321489741','Zainal Abidin','1','Jl. gagak putih no 627','07','02','0549685410564','zainal@gmail.co',0.00,'1'),(2018040305,'1897461325065841','Marlon Suwanggai','1','Jl. supapa no.23','15','23','0651684123089','marlon47@gmail.',50000.00,'1'),(2018040306,'1063569810905968','Muhammad Zainal','1','jl. merpati putih 2. no.66','45','15','0561085910510','ahmadzainal@gma',0.00,'1'),(2018040307,'0518541508519498','Ratna Dewi','0','Jl. ampera selatan. no. 67','56','02','0651098105054','rdewi@gmail.com',0.00,'1'),(2018040308,'0321065849816849','Samsul Bahri','1','jl. peletok.','56','78','1684106848106','samsul@gmail.co',0.00,'1'),(2018040309,'0654198418498416','Diki Farabi','1','jl. badak utara. no.123','45','13','0549841569841','dfarabi@gmail.c',22800.00,'1');

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

INSERT INTO `tb_pencairantab` VALUES ('PT020320180001','2018-03-01',2018020301,10000.00),('PT020320180002','2018-03-01',2018020301,5000.00),('PT020320180003','2018-03-01',2018020301,50000.00),('PT020320180004','2018-03-01',2018020302,2500.00),('PT020320180005','2018-03-01',2018020303,5000.00),('PT040320180006','2018-03-04',2018040305,10000.00),('PT050320180007','2018-03-05',2018020301,50000.00);

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

INSERT INTO `tb_penjualan` VALUES ('2018-03-01','JS020320180001','admin',2018030202),('2018-03-01','JS020320180002','admin',2018020701);

#
# Structure for table "tb_petugas"
#

DROP TABLE IF EXISTS `tb_petugas`;
CREATE TABLE `tb_petugas` (
  `id_petugas` char(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nm_petugas` varchar(30) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_petugas"
#

INSERT INTO `tb_petugas` VALUES ('admin','21232f297a57a5a743894a0e4a801fc3','Zill','jl.larangan','08213124');

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

INSERT INTO `tb_detiltabungan` VALUES ('TB020320180001',2018020301,1,10,50000.00),('TB020320180002',2018020302,2,5,32500.00),('TB020320180003',2018020303,3,7,28000.00),('TB040320180004',2018020301,1,10,50000.00),('TB040320180005',2018040305,3,15,60000.00),('TB040320180006',2018040309,4,6,22800.00),('TB050320180007',2018020301,4,20,76000.00);

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

INSERT INTO `tb_detilpenjualan` VALUES ('JS020320180001',1,5,8000.00,40000.00),('JS020320180002',2,3,5000.00,15000.00);

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

INSERT INTO `tb_tabungan` VALUES ('2018-03-01','TB020320180001',2018020301),('2018-03-01','TB020320180002',2018020302),('2018-03-01','TB020320180003',2018020303),('2018-03-04','TB040320180004',2018020301),('2018-03-04','TB040320180005',2018040305),('2018-03-04','TB040320180006',2018040309),('2018-03-05','TB050320180007',2018020301);

#
# Trigger "UPDATE_SALDO_NABUNG"
#

DROP TRIGGER IF EXISTS `UPDATE_SALDO_NABUNG`;
db_banksampah

#
# Trigger "UPDATE_SALDO_TARIK"
#

DROP TRIGGER IF EXISTS `UPDATE_SALDO_TARIK`;
db_banksampah
