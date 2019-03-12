/*
SQLyog Ultimate v11.21 (64 bit)
MySQL - 10.1.38-MariaDB-0ubuntu0.18.04.1 : Database - puskesmas
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`puskesmas` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `puskesmas`;

/*Table structure for table `Obat` */

DROP TABLE IF EXISTS `obat`;

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(50) DEFAULT NULL,
  `jenis_obat` varchar(20) DEFAULT NULL,
  `merk_obat` varchar(20) DEFAULT NULL,
  `satuan_obat` enum('kapsul','tablet','lembar','kaplet','pil','sirup') DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `Obat` */

insert  into `obat`(`id_obat`,`nama_obat`,`jenis_obat`,`merk_obat`,`satuan_obat`,`tgl_kadaluarsa`) values (1,'antangin','Obat Masuk Angin','antangin','lembar','2019-02-28'),(2,'Konidin','Obat Kepala','Akodan','kapsul','2019-03-14');

/*Table structure for table `Pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(50) DEFAULT NULL,
  `alamat` text,
  `jenis_kelamin` enum('perempuan','laki-laki') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `pekerjaan` varchar(15) DEFAULT NULL,
  `riwayat_alergi` varchar(20) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `golongan_darah` enum('O','A','AB','B') DEFAULT 'O',
  `kepala_keluarga` varchar(50) DEFAULT NULL,
  `status` enum('BPJS','ASKES') DEFAULT NULL,
  `penyakit_riwayat_keluarga` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `Pasien` */

insert  into `pasien`(`id_pasien`,`nama_pasien`,`alamat`,`jenis_kelamin`,`tanggal_lahir`,`no_telepon`,`tgl_daftar`,`pekerjaan`,`riwayat_alergi`,`umur`,`golongan_darah`,`kepala_keluarga`,`status`,`penyakit_riwayat_keluarga`) values (1,'Joko Parminto','Jogja','laki-laki','1994-03-03','085645566','2019-02-07','Penyanyi','Obat Gatal',24,'O','Kevin','ASKES','Tidak ada'),(2,'Chen','Salatiga','laki-laki','2018-12-01','0856423626','2019-10-02','balita','tidak ada',3,'A','Anjar','ASKES','Tidak ada');

/*Table structure for table `Rekam_Medis` */

DROP TABLE IF EXISTS `rekam_medis`;

CREATE TABLE `rekam_medis` (
  `id_rekam_medis` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `id_tenaga_medis` int(11) DEFAULT NULL,
  `diagnosa` varchar(100) DEFAULT NULL,
  `status_rujuk` enum('YA','TIDAK') DEFAULT NULL,
  `status_rawat` enum('rawat-inap','rawat-jalan','rujuk') DEFAULT NULL,
  `anamnesa` varchar(100) DEFAULT NULL,
  `pemeriksaan_fisik` varchar(100) DEFAULT NULL,
  `tindakan` varchar(100) DEFAULT NULL,
  `tgl_rekam_medis` datetime DEFAULT NULL,
  PRIMARY KEY (`id_rekam_medis`),
  KEY `id_pasien` (`id_pasien`),
  KEY `id_obat` (`id_obat`),
  KEY `id_tenaga_medis` (`id_tenaga_medis`),
  CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  CONSTRAINT `rekam_medis_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  CONSTRAINT `rekam_medis_ibfk_3` FOREIGN KEY (`id_tenaga_medis`) REFERENCES `tenaga_medis` (`id_tenaga_medis`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `rekam_medis` */

insert  into `rekam_medis`(`id_rekam_medis`,`id_pasien`,`id_obat`,`id_tenaga_medis`,`diagnosa`,`status_rujuk`,`status_rawat`,`anamnesa`,`pemeriksaan_fisik`,`tindakan`,`tgl_rekam_medis`) values (14,2,1,2,'asdfasdf','YA','rawat-jalan','asdfasdf','sdfasdf','sadfasdf','2019-02-25 11:06:18');

/*Table structure for table `Resep_Obat` */

DROP TABLE IF EXISTS `resep_obat`;

CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL AUTO_INCREMENT,
  `id_rekam_medis` int(11) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `jml_obat` int(11) DEFAULT NULL,
  `status_pengambilan` int(1) DEFAULT NULL,
  `tanggal_pengambilan` date DEFAULT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_resep`),
  KEY `id_rekam_medis` (`id_rekam_medis`),
  KEY `id_obat` (`id_obat`),
  CONSTRAINT `resep_obat_ibfk_1` FOREIGN KEY (`id_rekam_medis`) REFERENCES `rekam_medis` (`id_rekam_medis`),
  CONSTRAINT `resep_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `Obat` (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `resep_obat` */

insert  into `resep_obat`(`id_resep`,`id_rekam_medis`,`id_obat`,`jml_obat`,`status_pengambilan`,`tanggal_pengambilan`,`catatan`) values (6,14,1,1,0,'0000-00-00','asdfasdfas');

/*Table structure for table `tenaga_medis` */

DROP TABLE IF EXISTS `tenaga_medis`;

CREATE TABLE `tenaga_medis` (
  `id_tenaga_medis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tenaga_medis` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `jabatan` varchar(30) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('l','p') DEFAULT 'l',
  `agama` enum('islam','protestan','katolik','hindu','budha','lainnya') DEFAULT NULL,
  `no_telepon` int(11) DEFAULT NULL,
  `user_name` varchar(30) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_tenaga_medis`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tenaga_medis` */

insert  into `tenaga_medis`(`id_tenaga_medis`,`nama_tenaga_medis`,`jabatan`,`tanggal_lahir`,`jenis_kelamin`,`agama`,`no_telepon`,`user_name`,`pendidikan`,`password`,`level`) values (1,'Kepala','Kepala Puskermas',NULL,'l','islam',2147483647,'kepala',NULL,'870f669e4bbbfa8a6fde65549826d1c4',0),(2,'Joko Parminto','Tenaga Medis',NULL,'l','islam',2147483647,'joko',NULL,'9ba0009aa81e794e628a04b51eaf7d7f',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
