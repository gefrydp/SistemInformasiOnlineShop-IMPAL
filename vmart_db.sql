/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : vmart

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-05 22:39:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_kategori`
-- ----------------------------
DROP TABLE IF EXISTS `t_kategori`;
CREATE TABLE `t_kategori` (
  `id_kategori` char(10) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kategori
-- ----------------------------
INSERT INTO `t_kategori` VALUES ('BA', 'Baju Anak');
INSERT INTO `t_kategori` VALUES ('BK', 'Baju Koko');
INSERT INTO `t_kategori` VALUES ('BO', 'Baju Olahraga');
INSERT INTO `t_kategori` VALUES ('BP', 'Baju Pria');
INSERT INTO `t_kategori` VALUES ('BW', 'Baju Wanita');
INSERT INTO `t_kategori` VALUES ('CA', 'Celana Anak');
INSERT INTO `t_kategori` VALUES ('CJ', 'Celana Jeans');
INSERT INTO `t_kategori` VALUES ('CP', 'Celana Pria');
INSERT INTO `t_kategori` VALUES ('CW', 'Celana Wanita');
INSERT INTO `t_kategori` VALUES ('JA', 'Jaket Anak');
INSERT INTO `t_kategori` VALUES ('JP', 'Jaket Pria');
INSERT INTO `t_kategori` VALUES ('JW', 'Jaket Wanita');

-- ----------------------------
-- Table structure for `t_keranjang`
-- ----------------------------
DROP TABLE IF EXISTS `t_keranjang`;
CREATE TABLE `t_keranjang` (
  `id_keranjang` int(10) NOT NULL AUTO_INCREMENT,
  `id_member` int(10) NOT NULL,
  `id_produk` char(10) NOT NULL,
  `qty` int(5) NOT NULL,
  `ukuran` varchar(3) NOT NULL DEFAULT 'M',
  PRIMARY KEY (`id_keranjang`),
  KEY `id_produk` (`id_produk`),
  KEY `id_member` (`id_member`),
  CONSTRAINT `t_keranjang_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_keranjang_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `t_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_keranjang
-- ----------------------------
INSERT INTO `t_keranjang` VALUES ('23', '1', 'JA-1', '1', 'M');

-- ----------------------------
-- Table structure for `t_kontak`
-- ----------------------------
DROP TABLE IF EXISTS `t_kontak`;
CREATE TABLE `t_kontak` (
  `id_kontak` int(5) NOT NULL,
  `sms` varchar(20) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `bbm` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `pinterest` varchar(100) NOT NULL,
  `googleplus` varchar(100) NOT NULL,
  `ym` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kontak
-- ----------------------------
INSERT INTO `t_kontak` VALUES ('1', '085725555551', '085725555555', 'ABCDFG', 'mail@luqman.web.id', 'https://facebook.com/', 'http://twitter.com/', 'http://www.pinterest.com/', 'http://plus.google.com/', 'ym');

-- ----------------------------
-- Table structure for `t_member`
-- ----------------------------
DROP TABLE IF EXISTS `t_member`;
CREATE TABLE `t_member` (
  `id_member` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `forgot_key` varchar(30) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_member
-- ----------------------------
INSERT INTO `t_member` VALUES ('1', 'luqman', '6695b288c48f152002cb4723d38f7128', 'Luqman Hakim', 'mail@luqman.web.id', '085725549444', 'Surakarta', 'Jawa Tengah', 'Jakarta Pusat', '456121', '');
INSERT INTO `t_member` VALUES ('2', 'redwan', '74fdca4ae52545962249442f561a9a34', 'Redwan Driantoro', 'redwan@ymail.com', '08995243082', 'Surakarta', 'Jawa Tengah', 'Surakarta', '503', '');

-- ----------------------------
-- Table structure for `t_order`
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `id_order` int(10) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(10) NOT NULL,
  `id_member` int(10) NOT NULL,
  `id_tagihan` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `ukuran` varchar(3) NOT NULL DEFAULT 'M',
  PRIMARY KEY (`id_order`),
  KEY `t_order_ibfk_2` (`id_member`),
  KEY `t_order_ibfk_3` (`id_produk`),
  KEY `t_order_ibfk_4` (`id_tagihan`),
  CONSTRAINT `t_order_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `t_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_order_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_order_ibfk_4` FOREIGN KEY (`id_tagihan`) REFERENCES `t_tagihan` (`id_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('20', 'BO-2', '1', '1', '2', 'M');
INSERT INTO `t_order` VALUES ('21', 'JP-1', '1', '1', '1', 'M');
INSERT INTO `t_order` VALUES ('22', 'JA-1', '1', '2', '2', 'M');
INSERT INTO `t_order` VALUES ('23', 'JW-2', '1', '2', '1', 'M');
INSERT INTO `t_order` VALUES ('24', 'JA-2', '1', '2', '1', 'M');
INSERT INTO `t_order` VALUES ('25', 'BA-2', '1', '2', '1', 'M');
INSERT INTO `t_order` VALUES ('26', 'JW-2', '1', '3', '2', 'M');
INSERT INTO `t_order` VALUES ('27', 'BO-2', '1', '3', '1', 'M');
INSERT INTO `t_order` VALUES ('28', 'JW-1', '1', '3', '1', 'M');
INSERT INTO `t_order` VALUES ('29', 'JA-1', '1', '3', '1', 'M');
INSERT INTO `t_order` VALUES ('31', 'JP-1', '1', '3', '1', 'M');
INSERT INTO `t_order` VALUES ('32', 'JP-2', '1', '3', '1', 'M');
INSERT INTO `t_order` VALUES ('35', 'BP-1', '2', '5', '1', 'L');
INSERT INTO `t_order` VALUES ('36', 'BK-1', '2', '5', '1', 'L');
INSERT INTO `t_order` VALUES ('37', 'JP-1', '2', '6', '2', 'M');
INSERT INTO `t_order` VALUES ('38', 'BO-2', '1', '7', '3', 'L');
INSERT INTO `t_order` VALUES ('39', 'JA-2', '1', '7', '1', 'M');

-- ----------------------------
-- Table structure for `t_pengaturan`
-- ----------------------------
DROP TABLE IF EXISTS `t_pengaturan`;
CREATE TABLE `t_pengaturan` (
  `id` int(1) NOT NULL,
  `judul_website` varchar(50) NOT NULL,
  `banner_website` varchar(50) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `panduan` longtext NOT NULL,
  `slide` enum('aktif','tidak aktif') NOT NULL,
  `polling` enum('aktif','tidak aktif') NOT NULL,
  `google_analystics` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_pengaturan
-- ----------------------------
INSERT INTO `t_pengaturan` VALUES ('1', 'Solo Fashion', './images/website/logo.png', './images/fav.ico', 'toko online, solo fashion, solo', 'Sebuah Toko Yang Menjual Pakaian', '<center><span style=\"font-size:18px;\"><span class=\"title\"><strong class=\"title\">Panduan Berbelanja di Solo-Fashion.COM</strong></span></span></center>\r\n\r\n<center>&nbsp;</center>\r\n\r\n<p>1. Buka Halaman Home atau halaman produk yang ingin di order</p>\r\n\r\n<p>2.Pilih kategori produk yang ingin dibeli pada tab menu atau kategori.</p>\r\n\r\n<p>3.Pilih produk yang akan dibeli. Kemudian&nbsp; tekan tombol <strong>&#39;Beli&#39;</strong></p>\r\n\r\n<p>4.Secara otomatis orderan masuk ke shopping chart.</p>\r\n\r\n<p>5.Apabila ingin menambah orderan, lakukan langkah no. 2 dan no. 3</p>\r\n\r\n<p>6.Tekan tombol Lihat Cart untuk memastikan produk yang anda beli sudah benar. Apabila halaman shopping chart masih kosong, silahkan anda mengulang kembali dari langkah no. 1</p>\r\n\r\n<p>7.&nbsp;A. Untuk melakukan perubahan jumlah orderan, anda bisa ganti di kotak qty lalu pilih tombol update</p>\r\n\r\n<p>&nbsp; &nbsp; B. Untuk menghapus produk yang di order, anda bisa menggunakan tombol delete</p>\r\n\r\n<p>8.Pastikan <em><strong>Nama, Alamat, Kota, Provinsi, Kode POS</strong></em> sudah benar, Karena info tersebut akan digunakan untuk pengiriman</p>\r\n\r\n<p>9. Klik Tombol Check Out.</p>\r\n\r\n<p>10. Lakukan pembayaran ke rekening yang sudah ditetapkan</p>\r\n\r\n<p>11. Foto bukti pembayaran . Lalu masuk ke menu konfirmasi.</p>\r\n\r\n<p>12. Pilih Order yang akan dikonfirmasi</p>\r\n\r\n<p>13. Upload Foto Pembayaran Tadi</p>\r\n\r\n<p>14. Tunggu Admin Memproses</p>\r\n', 'aktif', 'aktif', 'UA-123132');

-- ----------------------------
-- Table structure for `t_pesan`
-- ----------------------------
DROP TABLE IF EXISTS `t_pesan`;
CREATE TABLE `t_pesan` (
  `id_pesan` int(3) NOT NULL AUTO_INCREMENT,
  `tgl_pesan` date NOT NULL,
  `dari` varchar(20) NOT NULL,
  `untuk` varchar(20) NOT NULL,
  `judul_pesan` varchar(50) NOT NULL,
  `isi_pesan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_pesan
-- ----------------------------
INSERT INTO `t_pesan` VALUES ('9', '2014-05-31', '1', 'Admin', 'Pengiriman', 'Barang nya kok belum sampai ya?');
INSERT INTO `t_pesan` VALUES ('11', '2014-07-23', '2', 'Admin', 'Tes', 'tes isi');
INSERT INTO `t_pesan` VALUES ('12', '2014-08-18', '2', 'Admin', 'komplain', 'ini barangnya beneran ada apa enggak gan ?');
INSERT INTO `t_pesan` VALUES ('13', '2014-08-18', 'Admin', '2', 'jawab', 'Ada lah.. :p');

-- ----------------------------
-- Table structure for `t_polling`
-- ----------------------------
DROP TABLE IF EXISTS `t_polling`;
CREATE TABLE `t_polling` (
  `id_polling` int(5) NOT NULL AUTO_INCREMENT,
  `isi` varchar(100) NOT NULL,
  `status` enum('Jawab','Tanya') NOT NULL,
  `rating` int(5) NOT NULL,
  PRIMARY KEY (`id_polling`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_polling
-- ----------------------------
INSERT INTO `t_polling` VALUES ('1', 'Bagaimanakah Pelayanan Kami?', 'Tanya', '0');
INSERT INTO `t_polling` VALUES ('2', 'Sangat Bagus', 'Jawab', '11');
INSERT INTO `t_polling` VALUES ('3', 'Bagus', 'Jawab', '20');
INSERT INTO `t_polling` VALUES ('4', 'Biasa', 'Jawab', '20');
INSERT INTO `t_polling` VALUES ('5', 'Kurang', 'Jawab', '5');

-- ----------------------------
-- Table structure for `t_produk`
-- ----------------------------
DROP TABLE IF EXISTS `t_produk`;
CREATE TABLE `t_produk` (
  `id_produk` char(10) NOT NULL,
  `id_kategori` char(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(40) NOT NULL,
  `gambar_produk` varchar(30) NOT NULL,
  `deskripsi_produk` longtext NOT NULL,
  `berat` varchar(5) NOT NULL,
  `stok` enum('Masih','Habis') NOT NULL,
  `tgl_post` date NOT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `t_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_produk
-- ----------------------------
INSERT INTO `t_produk` VALUES ('BA-1', 'BA', 'T 0321', '107650', './images/produk/BA-1.jpg', 'Baju-anak T 0321 adalah baju anak yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan combed cotton, baju-anak ini tersedia warna merah. \r\n', '0.5', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('BA-2', 'BA', 'T 0646', '113950', './images/produk/BA-2.jpg', 'Baju-anak T 0646 adalah baju anak yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan combed cotton, baju-anak ini tersedia warna abu-abu.', '0.9', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('BK-1', 'BK', 'SALY 350', '189250', './images/produk/BK-1.jpg', 'Baju-koko SALY 350 adalah baju koko yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan kelly, baju-koko ini tersedia warna putih. Adapun untuk ukuran baju-koko untuk tipe SALY 350 ini tersedia ukuran s, xl, l, m. ', '0.7', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('BK-2', 'BK', 'SALY 352', '179650', './images/produk/BK-2.jpg', 'Baju-koko SALY 352 adalah baju koko yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan kelly, baju-koko ini tersedia warna hijau. Adapun untuk ukuran baju-koko untuk tipe SALY 352 ini tersedia ukuran s, xl, l, m. ', '0.7', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('BO-1', 'BO', 'GN 0710', '204250', './images/produk/BO-1.jpg', 'Baju-olahraga GN 0710 adalah baju olahraga yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan diadora, baju-olahraga ini tersedia warna hitam. Adapun untuk ukuran baju-olahraga untuk tipe GN 0710 ini tersedia ukuran l, xl. ', '0.5', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('BO-2', 'BO', 'GN 0711', '204250', './images/produk/BO-2.jpg', 'Baju-olahraga GN 0711 adalah baju olahraga yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan diadora, baju-olahraga ini tersedia warna merah. Adapun untuk ukuran baju-olahraga untuk tipe GN 0711 ini tersedia ukuran l, xl.\r\n', '0.8', 'Masih', '2014-05-31');
INSERT INTO `t_produk` VALUES ('BP-1', 'BP', 'H 0732', '121300', './images/produk/BP-1.jpg', 'Baju-pria H 0732 adalah kaos pria yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan combed cotton, baju-pria ini tersedia warna hitam. Adapun untuk ukuran baju-pria untuk tipe H 0732 ini tersedia ukuran l, m, s, xl. ', '0.6', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('BP-2', 'BP', 'H 0552', '126550', './images/produk/BP-3.jpg', 'Baju-pria H 0552 adalah kaos pria yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan combed cotton, baju-pria ini tersedia warna abu-abu. Adapun untuk ukuran baju-pria untuk tipe H 0552 ini tersedia ukuran l, m, s, xl. ', '0.6', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('BW-1', 'BW', 'H 3128', '184300', './images/produk/BW-1.jpg', '\r\nBaju-wanita H 3128 adalah baju wanita yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan cotton, baju-wanita ini tersedia warna abu-abu. Adapun untuk ukuran baju-wanita untuk tipe H 3128 ini tersedia ukuran all size. ', '0.5', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('BW-2', 'BW', 'H 3127', '202150', './images/produk/BW-2.jpg', 'Baju-wanita H 3127 adalah baju wanita yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan spandex, baju-wanita ini tersedia warna pink. Adapun untuk ukuran baju-wanita untuk tipe H 3127 ini tersedia ukuran all size. ', '0.4', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('CA-1', 'CA', 'T 4055', '271450', './images/produk/CA-1.jpg', 'Celana-anak T 4055 adalah celana anak yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan denim, celana-anak ini tersedia warna biru', '0.5', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('CA-2', 'CA', 'T 8004', '184300', './images/produk/CA-2.jpg', 'Celana-anak T 8004 adalah celana anak yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan denim, celana-anak ini tersedia warna hitam, biru.', '0.9', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('CJ-1', 'CJ', 'CBE 027', '220000', './images/produk/CJ-1.jpg', 'Celana-jeans-pria CBE 027 adalah celana jeans yang bagus, nyaman dan gaul, yang terbuat dari bahan jeans, celana-jeans-pria ini tersedia warna biru. Adapun untuk ukuran celana-jeans-pria untuk tipe CBE 027 ini tersedia ukuran l, m, s, xl. ', '0.4', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('CJ-2', 'CJ', 'H 4126', '285100', './images/produk/CJ-2.jpg', 'Celana-jeans-pria H 4126 adalah celana jeans yang bagus, nyaman dan gaul, yang terbuat dari bahan denim, celana-jeans-pria ini tersedia warna hitam. ', '0.5', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('CW-1', 'CW', 'H 4127', '281950', './images/produk/CW-1.jpg', 'Celana-wanita H 4127 adalah celana jeans yang bagus, nyaman dan gaul, yang terbuat dari bahan denim, celana-wanita ini tersedia warna biru. Adapun untuk ukuran celana-wanita untuk tipe H 4127 ini tersedia ukuran l, m, s, xl. ', '0.8', 'Masih', '2014-05-30');
INSERT INTO `t_produk` VALUES ('JA-1', 'JA', 'T 2286', '186400', './images/produk/JA-1.jpg', 'Jaket-anak T 2286 adalah jaket anak yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan fleece, jaket-anak ini tersedia warna biru.', '3', 'Masih', '2014-05-31');
INSERT INTO `t_produk` VALUES ('JA-2', 'JA', 'T 2028', '185350', './images/produk/JA-2.jpg', 'Jaket-anak T 2028 adalah jaket anak yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan fleece, jaket-anak ini tersedia warna biru. ', '3', 'Masih', '2014-05-31');
INSERT INTO `t_produk` VALUES ('JP-1', 'JP', 'H 2352', '263050', './images/produk/JP-1.jpg', 'Jaket-pria H 2352 adalah jaket pria yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan fleece, jaket-pria ini tersedia warna coklat. Adapun untuk ukuran jaket-pria untuk tipe H 2352 ini tersedia ukuran l, m. ', '2', 'Masih', '2014-05-31');
INSERT INTO `t_produk` VALUES ('JP-2', 'JP', 'H 2318', '225250', './images/produk/JP-3.jpg', 'Jaket-pria H 2318 adalah jaket pria yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan taslan, jaket-pria ini tersedia warna hitam. Adapun untuk ukuran jaket-pria untuk tipe H 2318 ini tersedia ukuran l, m. ', '4', 'Masih', '2014-05-31');
INSERT INTO `t_produk` VALUES ('JW-1', 'JW', 'CSE 027 ', '177250', './images/produk/JW-1.jpg', 'Jaket-wanita CSE 027 adalah jaket wanita yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan fleece, jaket-wanita ini tersedia warna marun. Adapun untuk ukuran jaket-wanita untuk tipe CSE 027 ini tersedia ukuran l, m, s. ', '5', 'Masih', '2014-05-31');
INSERT INTO `t_produk` VALUES ('JW-2', 'JW', 'CYI 048', '159250', './images/produk/JW-2.jpg', 'Jaket-wanita CYI 048 adalah jaket wanita yang nyaman untuk dipakai, bahannya bagus dan modelnya trendy, yang terbuat dari bahan diadora, jaket-wanita ini tersedia warna cream. Adapun untuk ukuran jaket-wanita untuk tipe CYI 048 ini tersedia ukuran l, m, s. ', '3', 'Masih', '2014-05-31');

-- ----------------------------
-- Table structure for `t_profil`
-- ----------------------------
DROP TABLE IF EXISTS `t_profil`;
CREATE TABLE `t_profil` (
  `id_profil` int(3) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(50) NOT NULL,
  `kota_toko` varchar(50) NOT NULL,
  `provinsi_toko` varchar(50) NOT NULL,
  `alamat_toko` varchar(300) NOT NULL,
  `kode_pos` int(10) DEFAULT NULL,
  `tentang_toko` longtext NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_profil
-- ----------------------------
INSERT INTO `t_profil` VALUES ('1', 'Solo Fashion', 'Solo', 'Jawa Tengah', 'Jl. Slamet Riyadi, No.34', '23234', '<p>tes<br />\r\n&nbsp;</p>\r\n');

-- ----------------------------
-- Table structure for `t_rekening`
-- ----------------------------
DROP TABLE IF EXISTS `t_rekening`;
CREATE TABLE `t_rekening` (
  `id_rekening` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pemilik` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rekening`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_rekening
-- ----------------------------
INSERT INTO `t_rekening` VALUES ('2', 'Luqman', '12312312313123', 'BRI', 'Surakarta');
INSERT INTO `t_rekening` VALUES ('3', 'Hakim', '234234234234234', 'CIMB', 'Surakarta');
INSERT INTO `t_rekening` VALUES ('4', 'luqman.web.id', '213123131312312', 'BNI', 'Surakarta');
INSERT INTO `t_rekening` VALUES ('8', 'Sholeh', '231312313123', 'BCA', 'Surakarta');

-- ----------------------------
-- Table structure for `t_shipping`
-- ----------------------------
DROP TABLE IF EXISTS `t_shipping`;
CREATE TABLE `t_shipping` (
  `id_shipping` int(5) NOT NULL AUTO_INCREMENT,
  `wilayah` varchar(50) NOT NULL,
  `biaya` varchar(50) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  PRIMARY KEY (`id_shipping`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_shipping
-- ----------------------------
INSERT INTO `t_shipping` VALUES ('2', 'Batu', '16000', 'PT Pos Indonesia');
INSERT INTO `t_shipping` VALUES ('3', 'Aceh', '25000', 'JNE Regular Service');
INSERT INTO `t_shipping` VALUES ('4', 'Jakarta Pusat', '13000', 'PT Pos Indonesia');
INSERT INTO `t_shipping` VALUES ('5', 'Jakarta Barat', '13000', 'PT Pos Indonesia');
INSERT INTO `t_shipping` VALUES ('6', 'Tanggerang', '15000', 'PT Pos Indonesia');
INSERT INTO `t_shipping` VALUES ('7', 'Bogor', '15000', 'PT Pos Indonesia');
INSERT INTO `t_shipping` VALUES ('8', 'Depok', '15000', 'PT Pos Indonesia');
INSERT INTO `t_shipping` VALUES ('9', 'Bekasi', '15000', 'PT Pos Indonesia');
INSERT INTO `t_shipping` VALUES ('10', 'Bandung', '15000', 'PT Pos Indonesia');
INSERT INTO `t_shipping` VALUES ('11', 'Garut', '19000', 'PT Pos Indonesia');
INSERT INTO `t_shipping` VALUES ('12', 'Tegal', '14000', 'PT Pos Indonesia');
INSERT INTO `t_shipping` VALUES ('13', 'Magelang', '11500', 'PT Pos Indonesia');
INSERT INTO `t_shipping` VALUES ('14', 'Surakarta', '5000', 'JNE');

-- ----------------------------
-- Table structure for `t_slider`
-- ----------------------------
DROP TABLE IF EXISTS `t_slider`;
CREATE TABLE `t_slider` (
  `id_slider` int(5) NOT NULL,
  `nama_slider` varchar(50) NOT NULL,
  `deskripsi_slider` varchar(100) NOT NULL,
  `foto_slider` varchar(100) NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_slider
-- ----------------------------
INSERT INTO `t_slider` VALUES ('0', 'Selamat Datang', 'Selamat Datang di Solo Fashion', './images/slide/slide0.png');
INSERT INTO `t_slider` VALUES ('1', 'Belanja Mudah', 'Berbelanja di Solo Fashion', './images/slide/slide1.jpg');
INSERT INTO `t_slider` VALUES ('2', 'Toko Online', 'Toko Online Solo Fashion', './images/slide/slide2.png');

-- ----------------------------
-- Table structure for `t_statistika`
-- ----------------------------
DROP TABLE IF EXISTS `t_statistika`;
CREATE TABLE `t_statistika` (
  `id_statistika` int(5) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `online` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_statistika`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_statistika
-- ----------------------------
INSERT INTO `t_statistika` VALUES ('1', '127.0.0.1', '2014-05-30', '600', '1401469199');
INSERT INTO `t_statistika` VALUES ('2', '127.0.0.1', '2014-05-31', '408', '1401477269');
INSERT INTO `t_statistika` VALUES ('3', '192.168.96.101', '2014-06-04', '1', '1401859177');
INSERT INTO `t_statistika` VALUES ('4', '127.0.0.1', '2014-06-05', '87', '1401970301');
INSERT INTO `t_statistika` VALUES ('5', '127.0.0.1', '2014-06-08', '1', '1402223663');
INSERT INTO `t_statistika` VALUES ('6', '127.0.0.1', '2014-06-16', '125', '1402908868');
INSERT INTO `t_statistika` VALUES ('7', '127.0.0.1', '2014-06-17', '21', '1403017259');
INSERT INTO `t_statistika` VALUES ('8', '127.0.0.1', '2014-06-18', '39', '1403101483');
INSERT INTO `t_statistika` VALUES ('9', '127.0.0.1', '2014-06-19', '72', '1403169218');
INSERT INTO `t_statistika` VALUES ('10', '127.0.0.1', '2014-06-22', '11', '1403429506');
INSERT INTO `t_statistika` VALUES ('11', '::1', '2014-07-04', '1', '1404432943');
INSERT INTO `t_statistika` VALUES ('12', '127.0.0.1', '2014-07-14', '1', '1405338919');
INSERT INTO `t_statistika` VALUES ('13', '127.0.0.1', '2014-07-17', '97', '1405608883');
INSERT INTO `t_statistika` VALUES ('14', '127.0.0.1', '2014-07-18', '53', '1405688997');
INSERT INTO `t_statistika` VALUES ('15', '127.0.0.1', '2014-07-20', '5', '1405813563');
INSERT INTO `t_statistika` VALUES ('16', '127.0.0.1', '2014-07-21', '134', '1405902920');
INSERT INTO `t_statistika` VALUES ('17', '127.0.0.1', '2014-07-22', '386', '1406038165');
INSERT INTO `t_statistika` VALUES ('18', '127.0.0.1', '2014-07-23', '529', '1406125115');
INSERT INTO `t_statistika` VALUES ('19', '127.0.0.1', '2014-07-24', '442', '1406217603');
INSERT INTO `t_statistika` VALUES ('20', '127.0.0.1', '2014-07-25', '374', '1406300014');
INSERT INTO `t_statistika` VALUES ('21', '127.0.0.1', '2014-07-26', '1', '1406381573');
INSERT INTO `t_statistika` VALUES ('22', '127.0.0.1', '2014-07-27', '3', '1406442988');
INSERT INTO `t_statistika` VALUES ('23', '127.0.0.1', '2014-07-30', '7', '1406728959');
INSERT INTO `t_statistika` VALUES ('24', '127.0.0.1', '2014-08-01', '3', '1406896550');
INSERT INTO `t_statistika` VALUES ('25', '127.0.0.1', '2014-08-02', '2', '1406935292');
INSERT INTO `t_statistika` VALUES ('26', '192.168.137.226', '2014-08-02', '1', '1406944271');
INSERT INTO `t_statistika` VALUES ('27', '127.0.0.1', '2014-08-05', '1', '1407237657');
INSERT INTO `t_statistika` VALUES ('28', '127.0.0.1', '2014-08-06', '2', '1407335436');
INSERT INTO `t_statistika` VALUES ('29', '127.0.0.1', '2014-08-07', '1', '1407361423');
INSERT INTO `t_statistika` VALUES ('30', '127.0.0.1', '2014-08-09', '1', '1407588987');
INSERT INTO `t_statistika` VALUES ('31', '127.0.0.1', '2014-08-12', '82', '1407851524');
INSERT INTO `t_statistika` VALUES ('32', '127.0.0.1', '2014-08-13', '2', '1407894910');
INSERT INTO `t_statistika` VALUES ('33', '192.168.96.50', '2014-08-13', '1', '1407897123');
INSERT INTO `t_statistika` VALUES ('34', '::1', '2014-08-14', '4', '1408024915');
INSERT INTO `t_statistika` VALUES ('35', '192.168.88.101', '2014-08-14', '2', '1408024923');
INSERT INTO `t_statistika` VALUES ('36', '127.0.0.1', '2014-08-17', '102', '1408282253');
INSERT INTO `t_statistika` VALUES ('37', '::1', '2014-08-17', '27', '1408280225');
INSERT INTO `t_statistika` VALUES ('38', '192.168.88.63', '2014-08-18', '108', '1408335053');
INSERT INTO `t_statistika` VALUES ('39', '::1', '2014-08-18', '12', '1408340654');
INSERT INTO `t_statistika` VALUES ('40', '::1', '2014-08-27', '16', '1409119361');
INSERT INTO `t_statistika` VALUES ('41', '127.0.0.1', '2014-08-27', '33', '1409118835');
INSERT INTO `t_statistika` VALUES ('42', '10.0.1.51', '2014-08-27', '47', '1409118881');
INSERT INTO `t_statistika` VALUES ('43', '10.0.1.54', '2014-08-27', '52', '1409119160');
INSERT INTO `t_statistika` VALUES ('44', '::1', '2014-09-03', '15', '1409725460');
INSERT INTO `t_statistika` VALUES ('45', '::1', '2014-09-05', '1', '1409881667');
INSERT INTO `t_statistika` VALUES ('46', '::1', '2014-09-06', '2', '1409989103');
INSERT INTO `t_statistika` VALUES ('47', '::1', '2017-08-05', '49', '1501947538');

-- ----------------------------
-- Table structure for `t_tagihan`
-- ----------------------------
DROP TABLE IF EXISTS `t_tagihan`;
CREATE TABLE `t_tagihan` (
  `id_tagihan` int(10) NOT NULL AUTO_INCREMENT,
  `id_member` int(10) NOT NULL,
  `tgl_tagihan` date NOT NULL,
  `total_tagihan` int(50) NOT NULL,
  `foto_faktur` varchar(100) NOT NULL,
  `status_tagihan` enum('Belum Lunas','Lunas') NOT NULL DEFAULT 'Belum Lunas',
  `no_resi` varchar(100) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tagihan`),
  KEY `t_tagihan_ibfk_2` (`id_member`),
  CONSTRAINT `t_tagihan_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `t_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_tagihan
-- ----------------------------
INSERT INTO `t_tagihan` VALUES ('1', '1', '2014-07-25', '723550', './images/konfirmasi/1.gif', 'Lunas', '', '');
INSERT INTO `t_tagihan` VALUES ('2', '1', '2014-07-25', '873400', '', 'Belum Lunas', '', '');
INSERT INTO `t_tagihan` VALUES ('3', '1', '2014-07-25', '1943850', '', 'Belum Lunas', '', '');
INSERT INTO `t_tagihan` VALUES ('5', '2', '2014-08-18', '320550', './images/konfirmasi/5.jpg', 'Lunas', '', '');
INSERT INTO `t_tagihan` VALUES ('6', '2', '2014-08-18', '546100', './images/konfirmasi/6.jpg', 'Belum Lunas', '', '');
INSERT INTO `t_tagihan` VALUES ('7', '1', '2017-08-05', '876100', '', 'Belum Lunas', '', '');

-- ----------------------------
-- Table structure for `t_templates`
-- ----------------------------
DROP TABLE IF EXISTS `t_templates`;
CREATE TABLE `t_templates` (
  `id_template` int(5) NOT NULL AUTO_INCREMENT,
  `nama_template` varchar(30) NOT NULL,
  `lokasi_template` varchar(100) NOT NULL,
  `aktif_template` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_template`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_templates
-- ----------------------------
INSERT INTO `t_templates` VALUES ('1', 'Blue', 'blue/', '1');

-- ----------------------------
-- Table structure for `t_testimonial`
-- ----------------------------
DROP TABLE IF EXISTS `t_testimonial`;
CREATE TABLE `t_testimonial` (
  `id_testimonial` int(5) NOT NULL AUTO_INCREMENT,
  `id_member` int(10) NOT NULL,
  `isi_testimonial` varchar(100) NOT NULL,
  `tgl_testimonial` date NOT NULL,
  `tampil` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_testimonial`),
  KEY `id_member` (`id_member`),
  CONSTRAINT `t_testimonial_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `t_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_testimonial
-- ----------------------------
INSERT INTO `t_testimonial` VALUES ('5', '1', 'Permisi gan mau kasih testi,Solo Fashion emang top', '2014-05-31', '1');
INSERT INTO `t_testimonial` VALUES ('6', '1', 'JOS', '2014-06-16', '1');
INSERT INTO `t_testimonial` VALUES ('7', '2', 'websitenya keren gan', '2014-08-18', '1');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` enum('super admin','admin') NOT NULL,
  `last_login` varchar(40) NOT NULL,
  `ip_login` varchar(40) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1', 'admin', '771b40499df3ec93265589517f8486bb', 'mail@luqman.web.id', 'super admin', '27-08-2014 13:02', '::1');
INSERT INTO `t_user` VALUES ('2', 'luqman', '771b40499df3ec93265589517f8486bb', 'mail@luqman.web.id', 'admin', '27-05-2014 21:56', '127.0.0.1');
