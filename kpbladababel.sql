/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.10-MariaDB : Database - kpbladababel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `dokumen_perusahaan` */

DROP TABLE IF EXISTS `dokumen_perusahaan`;

CREATE TABLE `dokumen_perusahaan` (
  `id_dokumen_perusahaan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_jenis_dokumen_perusahaan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `no_dokumen_perusahaan` varchar(255) DEFAULT NULL,
  `dokumen_perusahaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_dokumen_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dokumen_perusahaan` */

insert  into `dokumen_perusahaan`(`id_dokumen_perusahaan`,`id_jenis_dokumen_perusahaan`,`id_perusahaan`,`no_dokumen_perusahaan`,`dokumen_perusahaan`) values 
(6,2,1,'sadsa','telkom_indo3.pdf');

/*Table structure for table `harga_mwp` */

DROP TABLE IF EXISTS `harga_mwp`;

CREATE TABLE `harga_mwp` (
  `id_harga_mwp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_berlaku` date NOT NULL,
  `harga_mwp1_petani` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_mwp1_fob` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_mwp2_petani` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_mwp2_fob` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_asta_petani` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_asta_fob` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_esa_petani` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_esa_fob` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_ipc_petani` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_ipc_fob` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_sni1_petani` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_sni1_fob` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_iso_petani` int(10) unsigned NOT NULL DEFAULT 0,
  `harga_iso_fob` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_harga_mwp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `harga_mwp` */

insert  into `harga_mwp`(`id_harga_mwp`,`tanggal_berlaku`,`harga_mwp1_petani`,`harga_mwp1_fob`,`harga_mwp2_petani`,`harga_mwp2_fob`,`harga_asta_petani`,`harga_asta_fob`,`harga_esa_petani`,`harga_esa_fob`,`harga_ipc_petani`,`harga_ipc_fob`,`harga_sni1_petani`,`harga_sni1_fob`,`harga_iso_petani`,`harga_iso_fob`) values 
(1,'2020-01-13',60000,62000,56000,56000,56000,56000,56000,56000,56000,56000,56000,56000,56000,56000),
(2,'2020-01-01',100,100,100,100,100,100,100,100,100,100,100,100,101,100);

/*Table structure for table `jenis_dokumen_perusahaan` */

DROP TABLE IF EXISTS `jenis_dokumen_perusahaan`;

CREATE TABLE `jenis_dokumen_perusahaan` (
  `id_jenis_dokumen_perusahaan` int(10) unsigned NOT NULL,
  `nama_jenis_dokumen_perusahaan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jenis_dokumen_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_dokumen_perusahaan` */

insert  into `jenis_dokumen_perusahaan`(`id_jenis_dokumen_perusahaan`,`nama_jenis_dokumen_perusahaan`) values 
(1,'NPWP'),
(2,'SIUP'),
(3,'Surat Izin PMDN'),
(4,'Surat Izin PMA');

/*Table structure for table `jenis_mutu` */

DROP TABLE IF EXISTS `jenis_mutu`;

CREATE TABLE `jenis_mutu` (
  `id_jenis_mutu` int(10) unsigned NOT NULL,
  `nama_jenis_mutu` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jenis_mutu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_mutu` */

insert  into `jenis_mutu`(`id_jenis_mutu`,`nama_jenis_mutu`) values 
(1,'MWP1'),
(2,'MWP2'),
(3,'ASTA'),
(4,'ESA'),
(5,'IPC'),
(6,'SNI1'),
(7,'ISO');

/*Table structure for table `jenis_pengemasan` */

DROP TABLE IF EXISTS `jenis_pengemasan`;

CREATE TABLE `jenis_pengemasan` (
  `id_jenis_pengemasan` int(10) unsigned NOT NULL,
  `nama_jenis_pengemasan` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  PRIMARY KEY (`id_jenis_pengemasan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_pengemasan` */

insert  into `jenis_pengemasan`(`id_jenis_pengemasan`,`nama_jenis_pengemasan`,`kapasitas`) values 
(1,'Jumbo Bag 1 Ton',1000),
(2,'Mini Bag 50 Kg',50);

/*Table structure for table `jenis_perusahaan` */

DROP TABLE IF EXISTS `jenis_perusahaan`;

CREATE TABLE `jenis_perusahaan` (
  `id_jenis_perusahaan` int(10) unsigned NOT NULL,
  `nama_jenis_perusahaan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jenis_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_perusahaan` */

insert  into `jenis_perusahaan`(`id_jenis_perusahaan`,`nama_jenis_perusahaan`) values 
(1,'Pengirim Komoditi'),
(2,'UMKM');

/*Table structure for table `negara` */

DROP TABLE IF EXISTS `negara`;

CREATE TABLE `negara` (
  `id_negara` varchar(2) NOT NULL,
  `nama_negara` varchar(255) NOT NULL,
  PRIMARY KEY (`id_negara`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `negara` */

insert  into `negara`(`id_negara`,`nama_negara`) values 
('AD','Andorra'),
('AE','United Arab Emirates'),
('AF','Afghanistan'),
('AG','Antigua and Barbuda'),
('AI','Anguilla'),
('AL','Albania'),
('AM','Armenia'),
('AO','Angola'),
('AQ','Antarctica'),
('AR','Argentina'),
('AS','American Samoa'),
('AT','Austria'),
('AU','Australia'),
('AW','Aruba'),
('AX','Ã…land Islands'),
('AZ','Azerbaijan'),
('BA','Bosnia and Herzegovina'),
('BB','Barbados'),
('BD','Bangladesh'),
('BE','Belgium'),
('BF','Burkina Faso'),
('BG','Bulgaria'),
('BH','Bahrain'),
('BI','Burundi'),
('BJ','Benin'),
('BL','Saint BarthÃ©lemy'),
('BM','Bermuda'),
('BN','Brunei Darussalam'),
('BO','Bolivia, Plurinational State of'),
('BQ','Bonaire, Sint Eustatius and Saba'),
('BR','Brazil'),
('BS','Bahamas'),
('BT','Bhutan'),
('BV','Bouvet Island'),
('BW','Botswana'),
('BY','Belarus'),
('BZ','Belize'),
('CA','Canada'),
('CC','Cocos (Keeling) Islands'),
('CD','Congo, the Democratic Republic of the'),
('CF','Central African Republic'),
('CG','Congo'),
('CH','Switzerland'),
('CI','CÃ´te d\'Ivoire'),
('CK','Cook Islands'),
('CL','Chile'),
('CM','Cameroon'),
('CN','China'),
('CO','Colombia'),
('CR','Costa Rica'),
('CU','Cuba'),
('CV','Cape Verde'),
('CW','CuraÃ§ao'),
('CX','Christmas Island'),
('CY','Cyprus'),
('CZ','Czech Republic'),
('DE','Germany'),
('DJ','Djibouti'),
('DK','Denmark'),
('DM','Dominica'),
('DO','Dominican Republic'),
('DZ','Algeria'),
('EC','Ecuador'),
('EE','Estonia'),
('EG','Egypt'),
('EH','Western Sahara'),
('ER','Eritrea'),
('ES','Spain'),
('ET','Ethiopia'),
('FI','Finland'),
('FJ','Fiji'),
('FK','Falkland Islands (Malvinas)'),
('FM','Micronesia, Federated States of'),
('FO','Faroe Islands'),
('FR','France'),
('GA','Gabon'),
('GB','United Kingdom'),
('GD','Grenada'),
('GE','Georgia'),
('GF','French Guiana'),
('GG','Guernsey'),
('GH','Ghana'),
('GI','Gibraltar'),
('GL','Greenland'),
('GM','Gambia'),
('GN','Guinea'),
('GP','Guadeloupe'),
('GQ','Equatorial Guinea'),
('GR','Greece'),
('GS','South Georgia and the South Sandwich Islands'),
('GT','Guatemala'),
('GU','Guam'),
('GW','Guinea-Bissau'),
('GY','Guyana'),
('HK','Hong Kong'),
('HM','Heard Island and McDonald Islands'),
('HN','Honduras'),
('HR','Croatia'),
('HT','Haiti'),
('HU','Hungary'),
('ID','Indonesia'),
('IE','Ireland'),
('IL','Israel'),
('IM','Isle of Man'),
('IN','India'),
('IO','British Indian Ocean Territory'),
('IQ','Iraq'),
('IR','Iran, Islamic Republic of'),
('IS','Iceland'),
('IT','Italy'),
('JE','Jersey'),
('JM','Jamaica'),
('JO','Jordan'),
('JP','Japan'),
('KE','Kenya'),
('KG','Kyrgyzstan'),
('KH','Cambodia'),
('KI','Kiribati'),
('KM','Comoros'),
('KN','Saint Kitts and Nevis'),
('KP','Korea, Democratic People\'s Republic of'),
('KR','Korea, Republic of'),
('KW','Kuwait'),
('KY','Cayman Islands'),
('KZ','Kazakhstan'),
('LA','Lao People\'s Democratic Republic'),
('LB','Lebanon'),
('LC','Saint Lucia'),
('LI','Liechtenstein'),
('LK','Sri Lanka'),
('LR','Liberia'),
('LS','Lesotho'),
('LT','Lithuania'),
('LU','Luxembourg'),
('LV','Latvia'),
('LY','Libya'),
('MA','Morocco'),
('MC','Monaco'),
('MD','Moldova, Republic of'),
('ME','Montenegro'),
('MF','Saint Martin (French part)'),
('MG','Madagascar'),
('MH','Marshall Islands'),
('MK','Macedonia, the Former Yugoslav Republic of'),
('ML','Mali'),
('MM','Myanmar'),
('MN','Mongolia'),
('MO','Macao'),
('MP','Northern Mariana Islands'),
('MQ','Martinique'),
('MR','Mauritania'),
('MS','Montserrat'),
('MT','Malta'),
('MU','Mauritius'),
('MV','Maldives'),
('MW','Malawi'),
('MX','Mexico'),
('MY','Malaysia'),
('MZ','Mozambique'),
('NA','Namibia'),
('NC','New Caledonia'),
('NE','Niger'),
('NF','Norfolk Island'),
('NG','Nigeria'),
('NI','Nicaragua'),
('NL','Netherlands'),
('NO','Norway'),
('NP','Nepal'),
('NR','Nauru'),
('NU','Niue'),
('NZ','New Zealand'),
('OM','Oman'),
('PA','Panama'),
('PE','Peru'),
('PF','French Polynesia'),
('PG','Papua New Guinea'),
('PH','Philippines'),
('PK','Pakistan'),
('PL','Poland'),
('PM','Saint Pierre and Miquelon'),
('PN','Pitcairn'),
('PR','Puerto Rico'),
('PS','Palestine, State of'),
('PT','Portugal'),
('PW','Palau'),
('PY','Paraguay'),
('QA','Qatar'),
('RE','RÃ©union'),
('RO','Romania'),
('RS','Serbia'),
('RU','Russian Federation'),
('RW','Rwanda'),
('SA','Saudi Arabia'),
('SB','Solomon Islands'),
('SC','Seychelles'),
('SD','Sudan'),
('SE','Sweden'),
('SG','Singapore'),
('SH','Saint Helena, Ascension and Tristan da Cunha'),
('SI','Slovenia'),
('SJ','Svalbard and Jan Mayen'),
('SK','Slovakia'),
('SL','Sierra Leone'),
('SM','San Marino'),
('SN','Senegal'),
('SO','Somalia'),
('SR','Suriname'),
('SS','South Sudan'),
('ST','Sao Tome and Principe'),
('SV','El Salvador'),
('SX','Sint Maarten (Dutch part)'),
('SY','Syrian Arab Republic'),
('SZ','Swaziland'),
('TC','Turks and Caicos Islands'),
('TD','Chad'),
('TF','French Southern Territories'),
('TG','Togo'),
('TH','Thailand'),
('TJ','Tajikistan'),
('TK','Tokelau'),
('TL','Timor-Leste'),
('TM','Turkmenistan'),
('TN','Tunisia'),
('TO','Tonga'),
('TR','Turkey'),
('TT','Trinidad and Tobago'),
('TV','Tuvalu'),
('TW','Taiwan, Province of China'),
('TZ','Tanzania, United Republic of'),
('UA','Ukraine'),
('UG','Uganda'),
('UM','United States Minor Outlying Islands'),
('US','United States'),
('UY','Uruguay'),
('UZ','Uzbekistan'),
('VA','Holy See (Vatican City State)'),
('VC','Saint Vincent and the Grenadines'),
('VE','Venezuela, Bolivarian Republic of'),
('VG','Virgin Islands, British'),
('VI','Virgin Islands, U.S.'),
('VN','Viet Nam'),
('VU','Vanuatu'),
('WF','Wallis and Futuna'),
('WS','Samoa'),
('YE','Yemen'),
('YT','Mayotte'),
('ZA','South Africa'),
('ZM','Zambia'),
('ZW','Zimbabwe');

/*Table structure for table `pengiriman` */

DROP TABLE IF EXISTS `pengiriman`;

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_pengiriman` varchar(255) NOT NULL DEFAULT 'Untitled',
  `nama_komoditi` varchar(255) NOT NULL DEFAULT 'Lada Putih Butir',
  `status_proposal` enum('DIMULAI','DIPROSES','DITERIMA','DITOLAK') NOT NULL DEFAULT 'DIMULAI',
  `id_tahap_proposal` int(11) DEFAULT NULL,
  `status_bp3l_rek` enum('MENUNGGU','DIPROSES','DITERIMA','DITOLAK') NOT NULL DEFAULT 'MENUNGGU',
  `dokumen_bp3l_rek` varchar(255) DEFAULT NULL,
  `catatan_bp3l_rek` varchar(255) DEFAULT NULL,
  `status_bpsmb_mutu` enum('MENUNGGU','DIPROSES','DITERIMA','DITOLAK') NOT NULL DEFAULT 'MENUNGGU',
  `dokumen_bpsmb_mutu` varchar(255) DEFAULT NULL,
  `catatan_bpsmb_mutu` varchar(255) DEFAULT NULL,
  `status_disperindag_izin` enum('MENUNGGU','DIPROSES','DITERIMA','DITOLAK') NOT NULL DEFAULT 'MENUNGGU',
  `dokumen_disperindag_izin` varchar(255) DEFAULT NULL,
  `catatan_disperindag_izin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pengiriman`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `pengiriman` */

insert  into `pengiriman`(`id_pengiriman`,`id_perusahaan`,`created_at`,`nama_pengiriman`,`nama_komoditi`,`status_proposal`,`id_tahap_proposal`,`status_bp3l_rek`,`dokumen_bp3l_rek`,`catatan_bp3l_rek`,`status_bpsmb_mutu`,`dokumen_bpsmb_mutu`,`catatan_bpsmb_mutu`,`status_disperindag_izin`,`dokumen_disperindag_izin`,`catatan_disperindag_izin`) values 
(10,1,'2020-01-14 11:03:57','Untitled','Lada Putih Butir','DITERIMA',99,'DITERIMA','wwww.pdf',NULL,'DITERIMA','China_Pepper_Dryer1.pdf',NULL,'DITERIMA','form_pengajuan_IG.pdf',NULL),
(12,1,'2020-01-31 08:46:57','Untitled','Lada Putih Butir','DITERIMA',99,'DITERIMA','undangan_28_feb_20201.pdf',NULL,'DITERIMA','undangan_28_feb_2020.pdf',NULL,'DITERIMA','undangan_28_feb_2020.pdf',NULL);

/*Table structure for table `pengiriman_item` */

DROP TABLE IF EXISTS `pengiriman_item`;

CREATE TABLE `pengiriman_item` (
  `id_pengiriman_item` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pengiriman` int(10) unsigned NOT NULL,
  `netto` int(11) DEFAULT NULL,
  `id_jenis_mutu` int(11) DEFAULT NULL,
  `nama_importir` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `id_negara` varchar(2) DEFAULT NULL,
  `id_port_of_origin` int(11) DEFAULT NULL,
  `port_of_destination` varchar(255) DEFAULT NULL,
  `id_jenis_pengemasan` int(11) DEFAULT NULL,
  `tanggal_pengiriman` date DEFAULT NULL,
  `shipping_mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pengiriman_item`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengiriman_item` */

insert  into `pengiriman_item`(`id_pengiriman_item`,`id_pengiriman`,`netto`,`id_jenis_mutu`,`nama_importir`,`city`,`province`,`id_negara`,`id_port_of_origin`,`port_of_destination`,`id_jenis_pengemasan`,`tanggal_pengiriman`,`shipping_mark`) values 
(1,10,11000,2,'My Importir','MyCityyx','MyPRovincex','IE',3,'MyDestinationx',1,'2020-01-14','234-asd2d-234xx'),
(3,10,11000,2,'My Importir','MyCityyx','MyPRovincex','ID',3,'MyDestinationx',2,'2020-01-14','234-asd2d-234xx'),
(4,12,5200,2,'My Importir','San Fransisco','California','US',3,'MyDestinationx',2,'2020-01-14','234-asd2d-234xx'),
(5,12,4000,2,'My Importir','MyCityyx','MyPRovincex','JP',3,'MyDestinationx',1,'2020-01-14','234-asd2d-234xx');

/*Table structure for table `perusahaan` */

DROP TABLE IF EXISTS `perusahaan`;

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_jenis_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `nama_pimpinan` varchar(255) DEFAULT NULL,
  `lok_perusahaan_full` varchar(255) DEFAULT NULL,
  `lok_perusahaan_kec` varchar(50) DEFAULT NULL,
  `lok_perusahaan_kabkot` varchar(50) DEFAULT NULL,
  `lok_unit_pengelolaan_full` varchar(255) DEFAULT NULL,
  `lok_unit_pengelolaan_kec` varchar(50) DEFAULT NULL,
  `lok_unit_pengelolaan_kabkot` varchar(50) DEFAULT NULL,
  `lok_gudang_penyimpanan_full` varchar(255) DEFAULT NULL,
  `lok_gudang_penyimpanan_kec` varchar(50) DEFAULT NULL,
  `lok_gudang_penyimpanan_kabkot` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`),
  KEY `fk_eksportir_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `perusahaan` */

insert  into `perusahaan`(`id_perusahaan`,`id_user`,`id_jenis_perusahaan`,`nama_perusahaan`,`nama_pimpinan`,`lok_perusahaan_full`,`lok_perusahaan_kec`,`lok_perusahaan_kabkot`,`lok_unit_pengelolaan_full`,`lok_unit_pengelolaan_kec`,`lok_unit_pengelolaan_kabkot`,`lok_gudang_penyimpanan_full`,`lok_gudang_penyimpanan_kec`,`lok_gudang_penyimpanan_kabkot`,`no_telepon`,`email`) values 
(1,50,1,'PT Lada','Ahmada Pranata','b','c','d','e','f','g','h','i','j','k','l@o.p');

/*Table structure for table `port_of_origin` */

DROP TABLE IF EXISTS `port_of_origin`;

CREATE TABLE `port_of_origin` (
  `id_port_of_origin` int(10) unsigned NOT NULL,
  `nama_port_of_origin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_port_of_origin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `port_of_origin` */

insert  into `port_of_origin`(`id_port_of_origin`,`nama_port_of_origin`) values 
(1,'Pangkalan Balam'),
(2,'Sadai'),
(3,'Tanjung Kalian');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id_product` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int(10) unsigned NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_product` varchar(255) NOT NULL DEFAULT 'Untitled',
  `cover_product` varchar(255) DEFAULT NULL,
  `deskripsi_product` varchar(255) NOT NULL DEFAULT '-',
  `attachment_product` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `product` */

insert  into `product`(`id_product`,`id_perusahaan`,`updated_at`,`nama_product`,`cover_product`,`deskripsi_product`,`attachment_product`) values 
(1,1,'2020-01-05 19:18:11','My Product','coverpmw.jpg','Sed eget neque ipsum. Fusce pellentesque mauris orci, sit amet varius leo luctus a. Ut a leo lobortis, fringilla turpis nec, facilisis arcu. Vestibulum ut eleifend elit. Integer in viverra lorem, ac sollicitudin magna. Vivamus congue maximus tempor. Nulla','spesifikasi_product.pdf'),
(4,1,'2020-01-10 19:27:02','My Producx','Mekanika-Quantum-Travel-Banner-14.jpg','Sed eget neque ipsum. Fusce pellentesque mauris orci, sit amet varius leo luctus a. Ut a leo lobortis, fringilla turpis nec, facilisis arcu. Vestibulum ut eleifend elit. Integer in viverra lorem, ac sollicitudin magna. Vivamus congue maximus tempor. Nulla','telkom_indo2.pdf'),
(5,1,'2020-01-11 09:35:49','Untitled',NULL,'-',NULL),
(6,1,'2020-01-11 09:35:54','Untitled',NULL,'-',NULL),
(7,1,'2020-01-11 09:35:58','Untitled',NULL,'-',NULL);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id_role` int(2) unsigned NOT NULL,
  `title_role` varchar(50) NOT NULL,
  `nama_role` varchar(50) NOT NULL,
  `nama_controller` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`id_role`,`title_role`,`nama_role`,`nama_controller`) values 
(1,'Admin','admin','AdminController'),
(2,'Perusahaan','perusahaan','PerusahaanController'),
(3,'Disperindag','disperindag','DisperindagController'),
(4,'Balai Uji Mutu','mutu','MutuController'),
(5,'Balai Karantina','karantina','KarantinaController'),
(6,'BP3L','bp3l','BP3LController'),
(7,'KSOP','ksop','KSOPController'),
(8,'Bea Cukai','bea','BeaController'),
(9,'Bursa Komoditi','bursa','BursaController');

/*Table structure for table `tahap_proposal` */

DROP TABLE IF EXISTS `tahap_proposal`;

CREATE TABLE `tahap_proposal` (
  `id_tahap_proposal` int(10) unsigned NOT NULL,
  `nama_tahap_proposal` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tahap_proposal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tahap_proposal` */

insert  into `tahap_proposal`(`id_tahap_proposal`,`nama_tahap_proposal`) values 
(1,'Draft'),
(2,'Rek BP3L'),
(3,'Mutu BPSMB'),
(4,'Izin Disperindag'),
(99,'Selesai');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` char(32) NOT NULL,
  `id_role` int(2) unsigned NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `uq_user` (`username`),
  KEY `fk_user_role` (`id_role`),
  CONSTRAINT `fk_user_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`nama`,`photo`,`password`,`id_role`) values 
(49,'admin','adminbbx',NULL,'857c058d9cee7f5798d51876963b5ce9',1),
(50,'ptlada','PT Lada',NULL,'857c058d9cee7f5798d51876963b5ce9',2),
(51,'disperindag','Disperindag',NULL,'857c058d9cee7f5798d51876963b5ce9',3),
(52,'mutu','Balai Uji Mutu',NULL,'857c058d9cee7f5798d51876963b5ce9',4),
(53,'karantina','Balai Karantina',NULL,'857c058d9cee7f5798d51876963b5ce9',5),
(54,'bp3l','BP3L',NULL,'857c058d9cee7f5798d51876963b5ce9',6),
(55,'ksop','KSOP',NULL,'857c058d9cee7f5798d51876963b5ce9',7),
(56,'bea','Bea Cukai',NULL,'857c058d9cee7f5798d51876963b5ce9',8),
(57,'bursa','Bursa Komoditi',NULL,'857c058d9cee7f5798d51876963b5ce9',9);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
