-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: siprodi_if
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `judul_banner` varchar(100) NOT NULL,
  `text_banner` text NOT NULL,
  `foto_banner` text NOT NULL,
  `url` text,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'Selamat Datang','<p>di Website Program Studi Informatika</p>\r\n','si.jpg','https://google.com'),(2,'Selamat Datang','<p>di Website Program Studi Informatika</p>\r\n','if.jpeg',''),(3,'Selamat Datang','<p>di Website Program Studi Informatika</p>\r\n','if2.jpeg',''),(4,'Selamat Datang','<p>di Website Program Studi Informatika</p>\r\n','if3.jpg','');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beasiswa`
--

DROP TABLE IF EXISTS `beasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beasiswa` (
  `idBeasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_beasiswa` varchar(250) NOT NULL,
  `slug_beasiswa` text NOT NULL,
  `tanggal_beasiswa` date NOT NULL,
  `text_beasiswa` text NOT NULL,
  `foto_beasiswa` text,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`idBeasiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beasiswa`
--

LOCK TABLES `beasiswa` WRITE;
/*!40000 ALTER TABLE `beasiswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `beasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq` (
  `idfaq` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` longtext NOT NULL,
  PRIMARY KEY (`idfaq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `foto_galeri` text NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` VALUES (1,'banner-11.jpg');
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan`
--

DROP TABLE IF EXISTS `kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatan` (
  `idKegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `judul_kegiatan` text NOT NULL,
  `foto_kegiatan` text,
  `jenis_kegiatan` text NOT NULL,
  `penyelenggara_kegiatan` text,
  `materi_kegiatan` text,
  `peserta_kegiatan` text,
  `tgl_kegiatan` datetime NOT NULL,
  `lokasi_kegiatan` text NOT NULL,
  `ruang_kegiatan` varchar(15) DEFAULT NULL,
  `slug_kegiatan` text NOT NULL,
  PRIMARY KEY (`idKegiatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan`
--

LOCK TABLES `kegiatan` WRITE;
/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keketatan`
--

DROP TABLE IF EXISTS `keketatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keketatan` (
  `idKeketatan` int(11) NOT NULL AUTO_INCREMENT,
  `jalur_keketatan` varchar(20) NOT NULL,
  `tahun_keketatan` year(4) NOT NULL,
  `kuota_keketatan` int(11) NOT NULL,
  `peminat_keketatan` int(11) NOT NULL,
  `nilai` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`idKeketatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keketatan`
--

LOCK TABLES `keketatan` WRITE;
/*!40000 ALTER TABLE `keketatan` DISABLE KEYS */;
INSERT INTO `keketatan` VALUES (1,'SBMPTN',2019,36,223,NULL),(2,'UTBK',2019,0,0,565.03);
/*!40000 ALTER TABLE `keketatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_berita`
--

DROP TABLE IF EXISTS `m_berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_berita` (
  `idBerita` int(11) NOT NULL AUTO_INCREMENT,
  `judul_berita` text NOT NULL,
  `foto_berita` text NOT NULL,
  `video_berita` text,
  `tanggal_berita` date NOT NULL,
  `isi_berita` longtext NOT NULL,
  `slug_berita` text NOT NULL,
  `idKategori` int(11) NOT NULL,
  PRIMARY KEY (`idBerita`),
  KEY `idKategori` (`idKategori`),
  CONSTRAINT `m_berita_ibfk_1` FOREIGN KEY (`idKategori`) REFERENCES `m_berita_kategori` (`idKategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_berita`
--

LOCK TABLES `m_berita` WRITE;
/*!40000 ALTER TABLE `m_berita` DISABLE KEYS */;
INSERT INTO `m_berita` VALUES (2,'EDUKASI PENGGUNAAN INTERNET SEHAT UNTUK MEDIA PEMBELAJARAN DI SMP NEGERI BALIKPAPAN','upload_web.jpg','','2019-11-11','<p>Program Studi Informatika telah melakukan pengabdian masyarakat pada tanggal 17 bulan Juli 2019. Pengabdian masyarakat dengan judul &quot;EDUKASI PENGGUNAAN INTERNET SEHAT UNTUK MEDIA PEMBELAJARAN DI SMP NEGERI BALIKPAPAN&quot; yang telah dilaksanakan di SMP Negeri 11 Balikpapan utara. Kegiatan pengabdian ini dilaksanakan dengan target siswa baru yang baru memulai masa perkenalan sekolah. Materi yang disampaikan memiliki topik yang di liputi internet sehat dan media pembelajaran yang baik dan positif dalam kehidupan sehari-hari maupun dalam pengajaran disekolah.</p>\r\n','edukasi-penggunaan-internet-sehat-untuk-media-pembelajaran-di-smp-negeri-balikpapan',1),(3,'Dosen Informatika berpartisipasi dalam ','telkomfest.jpg','','2019-11-11','<p>Dosen Informatika berpartisipasi dalam &quot;BORN INNOVATION FESTIVAL&quot; &nbsp;yang diadakan oleh telkom.</p>\r\n','dosen-informatika-berpartisipasi-dalam',2),(4,'Forum Group Discussion Kurikulum Prodi Informatika ITK','FGD_2019.jpeg','','2019-11-14','<p>Sesuai dengan Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi Republik Indonesia Nomor 44 tahun 2015, perguruan tinggi diwajibkan untuk menyusun, menyelenggarakan, dan mengevaluasi kurikulum. Kurikulum adalah seperangkat rencana dan pengaturan mengenai capaian pembelajaran lulusan, bahan kajian, proses, dan penilaian yang digunakan sebagai pedoman penyelenggaraan program studi yang disesuaikan dengan profil lulusan. Kegiatan pemantauan dan evaluasi kurikulum perlu dilakukan secara periodik dalam rangka menjaga dan meningkatkan mutu proses pembelajaran. Disamping itu, perancanaan program kerja pada satu tahun kedepan perlu menjadi perhatian khusus. Perencanaan progam kerja mempertimbangkan prinsip efektifitas dan efesiensi, sehingga diharapkan mempercepat laju perkembangan mutu pendidikan dan penelitian pada Program Studi Informatika. Oleh karena itu, Program Studi Informatika ITK bermaksud menyelenggarakan Focus Group Discussion (FGD) Kurikulum sebagai sarana untuk sosialisasi dan penetapan kurikulum Informatika ITK 2020-2025 yang sebelumnya telah disusun oleh Tim Kurkulum Informatika ITK, sedangkan Rapat Kerja Internal sebagai sarana untuk perumusan dan perencanaan program kerja untuk tahun 2020.</p>\r\n\r\n<p><img alt=\"\" src=\"http://if.itk.ac.id/asset/backend/upload/ckeditor/images/P_20191114_084917%5B1%5D.jpg\" style=\"height:400px\" /></p>\r\n\r\n<p>Tujuan<br />\r\nTujuan dari kegiatan ini adalah:<br />\r\n1. Menyampaikan hasil kerja Tim Kurikulum Informatika ITK sebagai bahan untuk&nbsp;ditetapkanya Kurukulum Informatika periode 2020-2025.<br />\r\n2. Menetapkan Kurikulum Informatika ITK periode 2020-2025 yang telah disahkan melalui&nbsp;FGD.<br />\r\n3. Merumuskan dan menetapkan Program Kerja Informatika tahun 2020.<br />\r\n4. Menetapkan struktur organisasi dan tata kelola kerja di lingkungan internal Informatika&nbsp;ITK.<br />\r\n5. Menetapkan bidang riset unggulan Informatika ITK periode 2020-2025.</p>\r\n\r\n<p>Pelaksanaan<br />\r\nHari, Tanggal : Kamis, 14 November 2019<br />\r\nTempat : Hotel Jatra, Mahogani Meeting Room at 08th Floor<br />\r\nSuper Block,&nbsp;</p>\r\n\r\n<p>Rapat ini dihadiri oleh :</p>\r\n\r\n<p>1. Wakil Rekor Bidang Akademik<br />\r\n2. Ariyadi, S.ST., M.T.<br />\r\n3. Bima Prihasto, S.Si., M.Si.<br />\r\n4. Muchammad Chandra Cahyo Utomo, S.Kom., M.Kom.<br />\r\n5. Syamsul Mujahidin, S.Kom., M.Eng.<br />\r\n6. Tegar Palyus Fiqar, S.T., M.Kom.<br />\r\n7. Nur Fajri Azhar, S.Kom., M.Kom.<br />\r\n8. Aditya Putra Pratama, S.Si., M.Si.<br />\r\n9. Nisa Rizqiya Fadhliana, S.Kom., M.T.<br />\r\n10. Gusti Ahmad Fanshuri Alfarisy., S.Kom., M.Kom.<br />\r\n11. Lovinta Happy Atrinawati, S.T., M.T.<br />\r\n12. Menasita Mayantasari, S.Si., M.T.<br />\r\n13. Soleh Ardiansyah, S.Kom., M.Sc.<br />\r\n14. Sri Rahayu Natasia, S.Kom., M.Si.<br />\r\n15. Wahyuni Lasniah, S.T.<br />\r\n16. Vina Indah Samudra, S.Si.</p>\r\n','forum-group-discussion-kurikulum-prodi-informatika-itk',3),(5,'KULIAH TAMU \"EMPOWER BUSINESS THROUGH VR & AR\"','KULTAM2.jpeg','','2019-11-22','<p>KULIAH TAMU OLEH PEMBICARA ANNISA ZASKIA PUTRI, Chief Experience Officer smarteye.id</p>\r\n','kuliah-tamu-empower-business-through-vr-ar',4),(6,'FORUM GROUP DISCUSSION EVALUASI KURIKULLUM  PROGRAM STUDI INFORMATIKA - 2','FGD2.jpg','','2019-12-09','<p>Sesuai dengan Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi Republik Indonesia Nomor 44 tahun 2015, perguruan tinggi diwajibkan untuk menyusun, menyelenggarakan, dan mengevaluasi kurikulum. Kurikulum adalah seperangkat rencana dan pengaturan mengenai capaian pembelajaran lulusan, bahan kajian, proses, dan penilaian yang digunakan sebagai pedoman penyelenggaraan program studi yang disesuaikan dengan profil lulusan. Kegiatan pemantauan dan evaluasi kurikulum perlu dilakukan secara periodik dalam rangka menjaga dan meningkatkan mutu proses pembelajaran. Oleh karena itu, Program Studi Informatika ITK bermaksud menyelenggarakan Focus Group Discussion (FGD) Kurikulum sebagai sarana untuk sosialisasi dan penetapan kurikulum Informatika ITK 2020-2025 yang sebelumnya telah disusun oleh Tim Kurkulum Informatika ITK.</p>\r\n\r\n<p>Pembicara dan Materi:&nbsp;</p>\r\n\r\n<p>1. Prof. Ir. Zainal Arifin Hasibuan, MSc., PhD. (Ketua APTIKOM 2018-2022)</p>\r\n\r\n<p>2.&nbsp;Dr.techn. Saiful Akbar, ST., MT. (Kaprodi Program Sarjana Teknik Informatika ITB)</p>\r\n','forum-group-discussion-evaluasi-kurikullum-program-studi-informatika-2',5);
/*!40000 ALTER TABLE `m_berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_berita_kategori`
--

DROP TABLE IF EXISTS `m_berita_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_berita_kategori` (
  `idKategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(15) NOT NULL,
  PRIMARY KEY (`idKategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_berita_kategori`
--

LOCK TABLES `m_berita_kategori` WRITE;
/*!40000 ALTER TABLE `m_berita_kategori` DISABLE KEYS */;
INSERT INTO `m_berita_kategori` VALUES (1,'Pengmas'),(2,'Pembicara'),(3,'Rapat Internal'),(4,'KULIAH TAMU'),(5,'FGD');
/*!40000 ALTER TABLE `m_berita_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_kontak`
--

DROP TABLE IF EXISTS `m_kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_kontak` (
  `id_kontak` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `telpon` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `gmap` text,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_kontak`
--

LOCK TABLES `m_kontak` WRITE;
/*!40000 ALTER TABLE `m_kontak` DISABLE KEYS */;
INSERT INTO `m_kontak` VALUES (1,'if@itk.ac.id','0542-8530800','Jl. Soekarno-Hatta Km. 15, Karang Joang, Balikpapan, Kalimantan Timur, 76127','https://www.google.com/maps/embed?origin=mfe&pb=!1m3!2m1!1sInstitut+teknologi+kalimantan!6i13','https://www.facebook.com','https://www.twitter.com','https://www.facebook.com','https://www.instagram.com');
/*!40000 ALTER TABLE `m_kontak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `nameMenu` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`idMenu`),
  UNIQUE KEY `nameMenu` (`nameMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Beranda','#'),(2,'Berita','berita'),(3,'Profile Prodi','#'),(4,'Akademik','#'),(5,'Kemahasiswaan','#'),(6,'Penelitian & Pengabdian','#'),(7,'Kontak','kontak');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `overview_prodi`
--

DROP TABLE IF EXISTS `overview_prodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `overview_prodi` (
  `id_overview` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan` text NOT NULL,
  `akreditasi` varchar(15) NOT NULL,
  `jumlah_mahasiswa` int(50) NOT NULL,
  `foto_overview` text NOT NULL,
  `url_youtube` text NOT NULL,
  `text_overview` text NOT NULL,
  `idDosen` int(11) NOT NULL,
  PRIMARY KEY (`id_overview`),
  KEY `idDosen` (`idDosen`),
  CONSTRAINT `overview_prodi_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `sm_dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `overview_prodi`
--

LOCK TABLES `overview_prodi` WRITE;
/*!40000 ALTER TABLE `overview_prodi` DISABLE KEYS */;
INSERT INTO `overview_prodi` VALUES (1,'Jurusan Matematika dan Teknologi Informasi','Baik',155,'logo.png','','Lulusan Prodi Informatika ITK diharapkan memiliki kompetensi dalam bidang dasar informatika, memiliki keahlian dalam pemrograman komputer serta mampu mendayagunakan, mengevaluasi dan mengidentifikasi pengembangan sistem berbasis komputer.',1);
/*!40000 ALTER TABLE `overview_prodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengumuman`
--

DROP TABLE IF EXISTS `pengumuman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengumuman` (
  `idPengumuman` int(11) NOT NULL AUTO_INCREMENT,
  `judul_pengumuman` text NOT NULL,
  `foto_pengumuman` text,
  `text_pengumuman` longtext NOT NULL,
  `tgl_pengumuman` datetime NOT NULL,
  `slug_pengumuman` text NOT NULL,
  PRIMARY KEY (`idPengumuman`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengumuman`
--

LOCK TABLES `pengumuman` WRITE;
/*!40000 ALTER TABLE `pengumuman` DISABLE KEYS */;
INSERT INTO `pengumuman` VALUES (1,'Kuliah Tamu \"Empower Business Through VR & AR\"','kultam1fix.jpg','<p>Kuliah Tamu dilaksanakan pada hari Jum&#39;at, 15 November 2019&nbsp;<br />\r\njam 09.30 - 10.30&nbsp;<br />\r\nRuang B203 Kampus ITK.</p>\r\n','2019-11-14 14:22:00','kuliah-tamu-empower-business-through-vr-ar');
/*!40000 ALTER TABLE `pengumuman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodi_lain`
--

DROP TABLE IF EXISTS `prodi_lain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodi_lain` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(200) NOT NULL,
  `nomor_prodi` varchar(5) NOT NULL,
  `url_prodi` varchar(200) NOT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodi_lain`
--

LOCK TABLES `prodi_lain` WRITE;
/*!40000 ALTER TABLE `prodi_lain` DISABLE KEYS */;
INSERT INTO `prodi_lain` VALUES (1,'Fisika','01','http://phy.itk.ac.id'),(2,'Matematika','02','http://math.itk.ac.id'),(3,'Teknik Mesin','03','http://me.itk.ac.id'),(4,'Teknik Elektro','04','http://ee.itk.ac.id'),(5,'Teknik Kimia','05','http://che.itk.ac.id'),(6,'Teknik Material dan Metalurgi','06','http://mme.itk.ac.id'),(7,'Teknik Sipil','07','http://ce.itk.ac.id'),(8,'Perencanaan Wilayah dan Kota','08','http://urp.itk.ac.id'),(9,'Teknik Perkapalan','09','http://na.itk.ac.id'),(10,'Sistem Informasi','10','http://is.itk.ac.id'),(11,'Informatika','11','http://if.itk.ac.id'),(12,'Teknik Industri','12','http://ie.itk.ac.id'),(13,'Teknik Lingkungan','13','http://enviro.itk.ac.id'),(14,'Teknik Kelautan','14','http://oe.itk.ac.id');
/*!40000 ALTER TABLE `prodi_lain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_akreditasi`
--

DROP TABLE IF EXISTS `sm_akreditasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_akreditasi` (
  `id_akreditasi` int(11) NOT NULL AUTO_INCREMENT,
  `akreditasi_text` longtext NOT NULL,
  `akreditasi_file` text NOT NULL,
  PRIMARY KEY (`id_akreditasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_akreditasi`
--

LOCK TABLES `sm_akreditasi` WRITE;
/*!40000 ALTER TABLE `sm_akreditasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `sm_akreditasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_alumni`
--

DROP TABLE IF EXISTS `sm_alumni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_alumni` (
  `nim_alumni` varchar(11) NOT NULL,
  `nama_alumni` varchar(50) NOT NULL,
  `tahunmasuk_alumni` year(4) NOT NULL,
  `tahunlulus_alumni` year(4) NOT NULL,
  `foto_alumni` text,
  `jejak` longtext NOT NULL,
  `text_jejak` longtext NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`nim_alumni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_alumni`
--

LOCK TABLES `sm_alumni` WRITE;
/*!40000 ALTER TABLE `sm_alumni` DISABLE KEYS */;
/*!40000 ALTER TABLE `sm_alumni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_biayakuliah`
--

DROP TABLE IF EXISTS `sm_biayakuliah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_biayakuliah` (
  `idBiayaKuliah` int(11) NOT NULL AUTO_INCREMENT,
  `jalur_biaya` varchar(20) NOT NULL,
  `kategori_biaya` varchar(20) NOT NULL,
  `tarif_biaya` int(11) NOT NULL,
  `tarif_spi_biaya` int(11) NOT NULL,
  PRIMARY KEY (`idBiayaKuliah`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_biayakuliah`
--

LOCK TABLES `sm_biayakuliah` WRITE;
/*!40000 ALTER TABLE `sm_biayakuliah` DISABLE KEYS */;
INSERT INTO `sm_biayakuliah` VALUES (1,'Mandiri','',10000000,25000000),(2,'SBMPTN/SNMPTN','Kategori I',500000,0),(3,'SBMPTN/SNMPTN','Kategori II',1000000,0),(4,'SBMPTN/SNMPTN','Kategori III',2000000,0),(5,'SBMPTN/SNMPTN','Kategori IV',4000000,0),(6,'SBMPTN/SNMPTN','Kategori V',6000000,0),(7,'SBMPTN/SNMPTN','Kategori VI',8000000,0),(8,'SBMPTN/SNMPTN','Kategori VII',9000000,0),(9,'SBMPTN/SNMPTN','Kategori VIII',10000000,0);
/*!40000 ALTER TABLE `sm_biayakuliah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_bidangminat`
--

DROP TABLE IF EXISTS `sm_bidangminat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_bidangminat` (
  `idBidangminat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bidangminat` text NOT NULL,
  `text_bidangminat` longtext NOT NULL,
  `slug_bidangminat` varchar(150) NOT NULL,
  `foto_bidangminat` text,
  PRIMARY KEY (`idBidangminat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_bidangminat`
--

LOCK TABLES `sm_bidangminat` WRITE;
/*!40000 ALTER TABLE `sm_bidangminat` DISABLE KEYS */;
INSERT INTO `sm_bidangminat` VALUES (1,'Computer Science','<p>Bidang minat Computer Science</p>\r\n','computer-science','logo.png'),(2,'Computer Network','<p>Bidang minat Computer Network</p>\r\n','computer-network','logo1.png'),(3,'Software Engineering','<p>Bidang minat Software Engineering</p>\r\n','software-engineering','logo2.png');
/*!40000 ALTER TABLE `sm_bidangminat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_dosen`
--

DROP TABLE IF EXISTS `sm_dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_dosen` (
  `idDosen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(50) NOT NULL,
  `nip_dosen` varchar(18) NOT NULL,
  `jabatan_dosen` text,
  `email_dosen` varchar(50) DEFAULT NULL,
  `foto_dosen` text,
  `text_dosen` text NOT NULL,
  `gschoolar` text,
  `linkedin` text,
  `scopus` text NOT NULL,
  `slug_dosen` varchar(200) NOT NULL,
  PRIMARY KEY (`idDosen`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_dosen`
--

LOCK TABLES `sm_dosen` WRITE;
/*!40000 ALTER TABLE `sm_dosen` DISABLE KEYS */;
INSERT INTO `sm_dosen` VALUES (1,'Ariyadi,  S.ST., M.T.','100115023','Koordinator Program Studi','ariyadi@lecturer.itk.ac.id','IS-ariyadi-300x300.jpg','','https://scholar.google.co.id/citations?hl=en&user=trRpZuIAAAAJ','id.linkedin.com/in/ariyadi','','ariyadi-sst-mt'),(2,'Tegar Palyus Fiqar, S.T., M.Kom.','199009072019031014','Dosen','tegar@lecturer.itk.ac.id','tegar.jpg','','https://scholar.google.co.id/citations?user=rXZB_b0AAAAJ&hl=en','https://www.linkedin.com/in/tegar/','','tegar-palyus-fiqar-st-mkom'),(3,'Aditya Putra Pratama, S.Si., M.Si.','-','Dosen','adityapp@lecturer.itk.ac.id','adit.jpg','','','https://www.linkedin.com/in/aditya-putra-pratama-8aa34b119/','','aditya-putra-pratama-ssi-msi'),(4,'Bima Prihasto, S.Si., M.Si.','100115004','Dosen','bima@lecturer.itk.ac.id','IS-Bimo-1.png','','https://scholar.google.com/citations?user=pSauBVkAAAAJ&hl=en','https://www.linkedin.com/in/bima-prihasto-575075a6','','bima-prihasto-ssi-msi'),(5,'Syamsul Mujahidin, S.Kom., M.Eng','199002182019031009','Dosen','syamsul@lecturer.itk.ac.id','Photo_Ukuran_Kecil_Putih.jpg','','','','','syamsul-mujahidin-skom-meng'),(6,'Nur Fajri Azhar, S.Kom., M.Kom.','199205182019031015','Dosen','fajri@lecturer.itk.ac.id','NurFajriAzhar1.jpg','','https://scholar.google.co.id/citations?user=6KT6-JUAAAAJ&hl=id&authuser=2','https://www.linkedin.com/in/fajri-azhar-a754b0144/','','nur-fajri-azhar-skom-mkom'),(7,'Nisa Rizqiya Fadhliana, S.Kom., M.T.','1','Dosen','nisafadhliana@lecturer.itk.ac.id',NULL,'','','','','nisa-rizqiya-fadhliana-skom-mt'),(8,'Muchammad Chandra Cahyo Utomo, M.Kom.','199205202019031013','Dosen','ccahyo@lecturer.itk.ac.id','c1.jpeg','','https://scholar.google.co.id/citations?user=QNu4zG0AAAAJ&hl=id','https://www.researchgate.net/profile/Muchammad_Utomo','http://sintadev.ristekdikti.go.id/authors/detail?id=6656384&view=overview','muchammad-chandra-cahyo-utomo-mkom'),(9,'Gusti Ahmad Fanshuri Alfarisy, S.Kom., M.Kom.','1','Dosen','gusti.alfarisy@lecturer.itk.ac.id','0.jpg','','https://scholar.google.co.id/citations?user=_x0UsdoAAAAJ&hl=en','https://www.linkedin.com/in/gusti-ahmad-fanshuri-alfarisy-01238461/','https://www.scopus.com/authid/detail.uri?authorId=57202775142','gusti-ahmad-fanshuri-alfarisy-skom-mkom');
/*!40000 ALTER TABLE `sm_dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_dosen_keahlian`
--

DROP TABLE IF EXISTS `sm_dosen_keahlian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_dosen_keahlian` (
  `idKeahlian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_keahlian` text NOT NULL,
  `idDosen` int(11) NOT NULL,
  PRIMARY KEY (`idKeahlian`),
  KEY `idDosen` (`idDosen`),
  CONSTRAINT `sm_dosen_keahlian_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `sm_dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_dosen_keahlian`
--

LOCK TABLES `sm_dosen_keahlian` WRITE;
/*!40000 ALTER TABLE `sm_dosen_keahlian` DISABLE KEYS */;
INSERT INTO `sm_dosen_keahlian` VALUES (1,'Artificial Intelligence',1),(2,'Adaptive Agents',1),(3,'Game Technology',1),(4,'Immersive Environment',1),(5,'Image Processing',2),(6,'Computer Vision',2),(7,'Embedded System',2),(8,'Data Security',2),(9,'Graph Theory',3),(10,'Dioid Algebra',3),(11,'Discrete Event Dynamics Systems',3),(12,'Stochastic Max-Plus Algebra',3),(13,'Stochastic Filtering',3),(14,'Numerical Optimization',3),(15,'Artificial Neural Network',4),(16,'Computer Vision',4),(17,'Machine Learning',4),(18,'    Data Mining',4),(20,'software engineering',6),(21,'Pemograman Web',6),(22,'Fuzzy Inference System',8),(23,'Fuzzy Neural Networks',8),(24,'Evolution Strategies',8),(25,' Optimasi',9),(26,'Jaringan Syaraf Tiruan',9),(27,'Kecerdasan Web',9),(28,'Sistem Cerdas',9);
/*!40000 ALTER TABLE `sm_dosen_keahlian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_dosen_minatpenelitian`
--

DROP TABLE IF EXISTS `sm_dosen_minatpenelitian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_dosen_minatpenelitian` (
  `idMinat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_minat` text NOT NULL,
  `idDosen` int(11) NOT NULL,
  PRIMARY KEY (`idMinat`),
  KEY `idDosen` (`idDosen`),
  CONSTRAINT `sm_dosen_minatpenelitian_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `sm_dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_dosen_minatpenelitian`
--

LOCK TABLES `sm_dosen_minatpenelitian` WRITE;
/*!40000 ALTER TABLE `sm_dosen_minatpenelitian` DISABLE KEYS */;
INSERT INTO `sm_dosen_minatpenelitian` VALUES (2,'Advanced Machine Learning',1),(3,'Autonomous Agents and Things',1),(5,'Ambient User Experience',1),(6,'Robotics',2),(7,'Artificial Intelligence',2),(8,'Motion Capture',2),(9,'Image Processing',2),(10,'Computer Vision',2),(11,'Computer Graphics',2),(12,'Embedded System',2),(13,'Control System',2),(14,'Data Security',2),(15,'Information Security',2),(16,'Graph',3),(17,'Dioid Algebra',3),(18,'Discrete Event Dynamics Systems',3),(19,' Stochastic Max-Plus Algebra',3),(20,'Stochastic Filtering',3),(21,'Numerical Optimization',3),(22,'Computer Vision',4),(23,'Deep Learning',4),(24,'Computer Vision',5),(25,'Machine Learning',5),(26,'Software Engineering',5),(27,'Software engineering',6),(28,'Virtual Reality',6),(29,'Game Development',6),(30,'Machine Learning',6),(31,'Supply Chain Management',8),(32,'Job-Shop Scheduling Problem',8),(33,'Traveling Salesman Problem',8),(35,'Informatika Nutrisi / Kesehatan',9),(36,'Pemrosesan Bahasa Alami',9),(37,'Edukasi (AI / Sistem / E-Learning)',9),(38,'Desain Otomatis',9),(39,'Kecerdasan Web',9),(40,'Augmented Reality',9);
/*!40000 ALTER TABLE `sm_dosen_minatpenelitian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_dosen_pendidikan`
--

DROP TABLE IF EXISTS `sm_dosen_pendidikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_dosen_pendidikan` (
  `idPendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `text_pendidikan` text NOT NULL,
  `idDosen` int(11) NOT NULL,
  PRIMARY KEY (`idPendidikan`),
  KEY `idDosen` (`idDosen`),
  CONSTRAINT `sm_dosen_pendidikan_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `sm_dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_dosen_pendidikan`
--

LOCK TABLES `sm_dosen_pendidikan` WRITE;
/*!40000 ALTER TABLE `sm_dosen_pendidikan` DISABLE KEYS */;
INSERT INTO `sm_dosen_pendidikan` VALUES (1,'     S1 Teknik Informatika Politeknik Elektronika Negeri Surabaya',1),(2,'S2 Jaringan Cerdas Multimedia Institut Teknologi Sepuluh Nopember',1),(3,'     S1 Teknik Elektro Institut Teknologi Sepuluh Nopember',2),(4,'S2 Teknik Informatika Institut Teknologi Sepuluh Nopember',2),(5,'S1 Matematika Institut Teknologi Sepuluh Nopember',3),(6,'S2 Matematika Institut Teknologi Sepuluh Nopember',3),(7,'S1 Matematika Institut Teknologi Sepuluh Nopember, Indonesia',4),(8,'S2 Matematika Institut Teknologi Sepuluh Nopember, Indonesia',4),(9,'S1 Teknik Informatika - Universitas Islam Indonesia',5),(10,'S2 Teknik Elektro dan Teknologi Informasi - Universitas Gadjah Mada',5),(11,'S1- Teknik Informatika (Universitas Muhammadiyah Malang)',6),(12,'S2 - Teknik Informatika (Institut Teknologi Kalimantan)',6);
/*!40000 ALTER TABLE `sm_dosen_pendidikan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_dosen_penelitian`
--

DROP TABLE IF EXISTS `sm_dosen_penelitian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_dosen_penelitian` (
  `idPenelitian` int(11) NOT NULL AUTO_INCREMENT,
  `text_penelitian` text NOT NULL,
  `idDosen` int(11) NOT NULL,
  PRIMARY KEY (`idPenelitian`),
  KEY `idDosen` (`idDosen`),
  CONSTRAINT `sm_dosen_penelitian_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `sm_dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_dosen_penelitian`
--

LOCK TABLES `sm_dosen_penelitian` WRITE;
/*!40000 ALTER TABLE `sm_dosen_penelitian` DISABLE KEYS */;
INSERT INTO `sm_dosen_penelitian` VALUES (1,'DIPA ITK, 2015: Mobile Learning System for Higher Education ',1),(2,'On Ideal Theory in Quotient Semirings',3),(3,'Primary Ideal in Quotient Semirings',3),(4,'Bifurcation Analysis in Advertising Problem',3),(5,'Some Characteristics (k,n)-Closed Ideal and Semi-n-absorbing Ideal in Quotient Semiring',3),(6,'Safety Verification of Uncertain Max-Plus-Linear Systems',3),(7,'d-Lucky Prime Labelling in Some Special Graph',3),(8,'Finite Abstraction of Uncertain Max-Plus-Linear Systems',3),(9,'Homotopy Perturbation Method on Multi-Asset Options Valuation with Black-Scholes Equations',3),(10,'Penelitian dan pengembangan potensi produksi dan jaringan distribusi gas metana di zona 1,2, dan 3 tempat pemrosesan akhir sampah (TPAS) Manggar, Balikpapan',6);
/*!40000 ALTER TABLE `sm_dosen_penelitian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_dosen_pengalaman`
--

DROP TABLE IF EXISTS `sm_dosen_pengalaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_dosen_pengalaman` (
  `idPengalaman` int(11) NOT NULL AUTO_INCREMENT,
  `text_pengalaman` text NOT NULL,
  `idDosen` int(11) NOT NULL,
  PRIMARY KEY (`idPengalaman`),
  KEY `idDosen` (`idDosen`),
  CONSTRAINT `sm_dosen_pengalaman_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `sm_dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_dosen_pengalaman`
--

LOCK TABLES `sm_dosen_pengalaman` WRITE;
/*!40000 ALTER TABLE `sm_dosen_pengalaman` DISABLE KEYS */;
INSERT INTO `sm_dosen_pengalaman` VALUES (1,'IT Support, PT. Trakindo Utama, Samarinda, Indonesia (2009)',1),(2,'Data Entry, Jawa Post Institute Pro Otonom, Samarinda, Indonesia (2010)',1),(4,'Lecturer, Dept. of Mathematics and Information Technology, Institut Teknologi Kalimantan, Indonesia (2015 - Now)',1),(5,'Internship, Pusat Robotika Institut Teknologi Sepuluh Nopember (ITS), Surabaya, Indonesia (2011)',2),(6,'Apps Developer, PT Niltava Teknologi Indonesia, Surabaya, Indonesia (2013)',2),(7,'Assistant Lecturer, Department of Mathematics, Institut Teknologi Sepuluh Nopember Surabaya, Indonesia (2012?2014).',4),(9,'Wakil Kepala ICT Universitas Balikpapan',6),(10,'Kepala ICT Universitas Balikpapan',6),(11,'Developer',9),(12,'GEMSS Solution Indonesia',9);
/*!40000 ALTER TABLE `sm_dosen_pengalaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_dosen_publikasi`
--

DROP TABLE IF EXISTS `sm_dosen_publikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_dosen_publikasi` (
  `idPublikasi` int(11) NOT NULL AUTO_INCREMENT,
  `text_publikasi` text NOT NULL,
  `link_publikasi` text,
  `idDosen` int(11) NOT NULL,
  PRIMARY KEY (`idPublikasi`),
  KEY `idDosen` (`idDosen`),
  CONSTRAINT `sm_dosen_publikasi_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `sm_dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_dosen_publikasi`
--

LOCK TABLES `sm_dosen_publikasi` WRITE;
/*!40000 ALTER TABLE `sm_dosen_publikasi` DISABLE KEYS */;
INSERT INTO `sm_dosen_publikasi` VALUES (1,'Ariyadi, S. M. S. Nugroho, and M. H. Purnomo. (2014). “Creep Offenses Evolution in Tower Defense Games using NSGA-II.” 8th International Conference on Information & Communication Technology and Systems (ICTS), Sept. 24, Surabaya, Indonesia','',1),(2,'Fiqar, T.P., Zaini. A., and Muhtadin, Movement Control of Humanoid Robot Using Motion Capture Sensor, “Institut Teknologi Sepuluh Nopember Surabaya”, Bachelor Thesis, 2013.','',2),(3,' Rosady, S.D.N., Kusumadewayanti, E., Amanatin, D.R., Nasikhin, R., and Fiqar, T.P., Modifikasi Fotobioreaktor Hemat Energi dengan Light Emitting Diode (LED) untuk Meningkatkan Populasi Chlorella Spp. dalam Upaya Pemenuhan Pakan Alami Larva Ikan Bandeng. “Jurnal Teknologi Pangan REKAPANGAN”, vol.6, no.1, pp. 1-7, 2013.','',2),(4,' Fadllullah, A., Fiqar, T.P., Nasir, M., and Arifin., A.Z., Segmentasi Cortical Bone Pada Citra Dental Panoramic Radiograph dengan Kombinasi Filter Gaussian dan Modifikasi Watershed Gradient-Barrier, “Jurnal Cybermatika”, vol.3, no.1, 2015. ','',2),(5,'Fiqar, T. P., and Pradana, A., Multiple Level Data Hiding Medical Image based on Discrete Cosine Transform (DCT) Method Using Multi Scale Image Sharing (MSIS). “JUTI: Jurnal Ilmiah Teknologi Informasi”, vol.14, no.1, pp. 29-43, 2016.','',2),(6,'Fiqar, T.P., and Ahmad, T., Peningkatan Kapasitas Penyisipan Audio Data Hiding Berbasiskan Modifikasi Metode Least Significant Digit, “Jurnal Nasional Teknik Elektro dan Teknologi Informasi - JNTETI”, vol.6, no.3, 2017.','',2),(7,' Fiqar, T.P., and Ahmad, T., Enhancement Capacity and Improvement Quality Audio Data Hiding based on Newton’s Divided-Difference Interpolating Polynomials, “Institut Teknologi Sepuluh Nopember Surabaya”, Master Thesis, 2017.','',2),(8,'B. Prihasto, M.I. Irawan, A. Masduqi. (2014). Fuzzy MADM method for decision support system based on artificial neural network to water quality assessment in Surabaya river. Journal of Soft Computing and Decision Support Systems, 1 (1) (2014), pp. 24–29.','',4),(10,'PEMANFAATAN AUGMENTED REALITY UNTUK GAME “RANGER TARGET” FPS BERBASIS ANDROID MENGGUNAKAN UNITY 3D DAN VUFORIA SDK','https://www.academia.edu/9614559/PEMANFAATAN_AUGMENTED_REALITY_UNTUK_GAME_RANGER_TARGET_FPS_BERBASIS_ANDROID_MENGGUNAKAN_UNITY_3D_DAN_VUFORIA_SDK',6),(11,'Memprediksi Waktu Memperbaiki Bug dari Laporan Bug Menggunakan Klasifikasi Random Forest','https://jsi.stikom-bali.ac.id/index.php/jsi/article/view/99',6),(12,'Rainfall forecasting in Banyuwangi using adaptive neuro fuzzy inference system','http://jitecs.ub.ac.id/index.php/jitecs/article/download/12/8',9),(13,'Hybrid Genetic Algorithm and Simulated Annealing for Function Optimization','http://jitecs.ub.ac.id/index.php/jitecs/article/download/15/10',9),(14,'Optimizing Laying Hen Diet using Multi-swarm Particle Swarm Optimization','https://www.researchgate.net/profile/Wayan_Mahmudy/publication/326544317_Optimizing_Laying_Hen_Diet_using_Multi-Swarm_Particle_Swarm_Optimization/links/5be048724585150b2b9fc126/Optimizing-Laying-Hen-Diet-using-Multi-Swarm-Particle-Swarm-Optimization.pdf',9),(15,'Optimizing Laying Hen Diet Using Particle Swarm Optimization with Two Swarms','http://journal.utem.edu.my/index.php/jtec/article/viewFile/3677/2609',9),(16,'Good Parameters for PSO in Optimizing Laying Hen Diet','https://search.proquest.com/openview/84d23988e709fcdbb421f4196aa18538/1?pq-origsite=gscholar&cbl=1686344',9),(17,'Focused web crawler for Indonesian recipes','https://ieeexplore.ieee.org/abstract/document/8304134',9),(18,'Optimasi Formulasi Pakan Ayam Petelur Menggunakan Hibridisasi Particle Swarm Optimization','http://repository.ub.ac.id/9401/',9),(19,'Extracting fuzzy rules and parameters using particle swarm optimization for rainfall forecasting','https://ieeexplore.ieee.org/abstract/document/8355056',9);
/*!40000 ALTER TABLE `sm_dosen_publikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_dosen_studi`
--

DROP TABLE IF EXISTS `sm_dosen_studi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_dosen_studi` (
  `idStudi` int(11) NOT NULL AUTO_INCREMENT,
  `studi` varchar(15) NOT NULL,
  `idDosen` int(11) NOT NULL,
  PRIMARY KEY (`idStudi`),
  KEY `idDosen` (`idDosen`),
  CONSTRAINT `idDosen` FOREIGN KEY (`idDosen`) REFERENCES `sm_dosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_dosen_studi`
--

LOCK TABLES `sm_dosen_studi` WRITE;
/*!40000 ALTER TABLE `sm_dosen_studi` DISABLE KEYS */;
/*!40000 ALTER TABLE `sm_dosen_studi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_gruppenelitian`
--

DROP TABLE IF EXISTS `sm_gruppenelitian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_gruppenelitian` (
  `idGrupPenelitian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_grup` varchar(50) NOT NULL,
  `deskripsi_grup` longtext NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`idGrupPenelitian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_gruppenelitian`
--

LOCK TABLES `sm_gruppenelitian` WRITE;
/*!40000 ALTER TABLE `sm_gruppenelitian` DISABLE KEYS */;
/*!40000 ALTER TABLE `sm_gruppenelitian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_hasilpenelitian`
--

DROP TABLE IF EXISTS `sm_hasilpenelitian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_hasilpenelitian` (
  `id_penelitian` int(11) NOT NULL AUTO_INCREMENT,
  `judul_penelitian` varchar(250) NOT NULL,
  `foto_penelitian` text,
  `text_penelitian` text NOT NULL,
  `tahun_penelitian` year(4) NOT NULL,
  `sumberdana_penelitian` varchar(250) NOT NULL,
  `slug_penelitian` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_penelitian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_hasilpenelitian`
--

LOCK TABLES `sm_hasilpenelitian` WRITE;
/*!40000 ALTER TABLE `sm_hasilpenelitian` DISABLE KEYS */;
/*!40000 ALTER TABLE `sm_hasilpenelitian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_hasilpengabdian`
--

DROP TABLE IF EXISTS `sm_hasilpengabdian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_hasilpengabdian` (
  `id_pengabdian` int(11) NOT NULL AUTO_INCREMENT,
  `judul_pengabdian` varchar(250) NOT NULL,
  `foto_pengabdian` text,
  `text_pengabdian` text NOT NULL,
  `tahun_pengabdian` year(4) NOT NULL,
  `sumberdana_pengabdian` varchar(250) NOT NULL,
  `slug_pengabdian` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_pengabdian`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_hasilpengabdian`
--

LOCK TABLES `sm_hasilpengabdian` WRITE;
/*!40000 ALTER TABLE `sm_hasilpengabdian` DISABLE KEYS */;
INSERT INTO `sm_hasilpengabdian` VALUES (1,'test','Screenshot_(56).png','                                      sdsadsa',2011,'321321','test',0),(2,'EDUKASI PENGGUNAAN INTERNET SEHAT UNTUK MEDIA PEMBELAJARAN DI SMP NEGERI BALIKPAPAN','upload_web.jpg','<p>Program Studi Informatika telah melakukan pengabdian masyarakat pada tanggal 17 bulan Juli 2019. Pengabdian masyarakat dengan judul &quot;EDUKASI PENGGUNAAN INTERNET SEHAT UNTUK MEDIA PEMBELAJARAN DI SMP NEGERI BALIKPAPAN&quot; yang telah dilaksanakan di SMP Negeri 11 Balikpapan utara. Kegiatan pengabdian ini dilaksanakan dengan target siswa baru yang baru memulai masa perkenalan sekolah. Materi yang disampaikan memiliki topik yang di liputi internet sehat dan media pembelajaran yang baik dan positif dalam kehidupan sehari-hari maupun dalam pengajaran disekolah.</p>\r\n',2019,'ITK','edukasi-penggunaan-internet-sehat-untuk-media-pembelajaran-di-smp-negeri-balikpapan',1);
/*!40000 ALTER TABLE `sm_hasilpengabdian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_kalenderakademik`
--

DROP TABLE IF EXISTS `sm_kalenderakademik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_kalenderakademik` (
  `id_kalender` int(11) NOT NULL AUTO_INCREMENT,
  `judul_kalender` text NOT NULL,
  `start_kalender` date NOT NULL,
  `end_kalender` date NOT NULL,
  PRIMARY KEY (`id_kalender`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_kalenderakademik`
--

LOCK TABLES `sm_kalenderakademik` WRITE;
/*!40000 ALTER TABLE `sm_kalenderakademik` DISABLE KEYS */;
/*!40000 ALTER TABLE `sm_kalenderakademik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_kalenderakademik_file`
--

DROP TABLE IF EXISTS `sm_kalenderakademik_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_kalenderakademik_file` (
  `id_kalender` int(11) NOT NULL AUTO_INCREMENT,
  `tahunajar_kalender` varchar(10) NOT NULL,
  `kalender_file` text NOT NULL,
  `tglrilis_kalender` date NOT NULL,
  `ukuran_file` text NOT NULL,
  PRIMARY KEY (`id_kalender`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_kalenderakademik_file`
--

LOCK TABLES `sm_kalenderakademik_file` WRITE;
/*!40000 ALTER TABLE `sm_kalenderakademik_file` DISABLE KEYS */;
INSERT INTO `sm_kalenderakademik_file` VALUES (1,'2019/2020','12328_KALENDER_AKADEMIK.pdf','2019-09-22','2139.4');
/*!40000 ALTER TABLE `sm_kalenderakademik_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_kerjasama`
--

DROP TABLE IF EXISTS `sm_kerjasama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_kerjasama` (
  `idKerjasama` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kerjasama` varchar(25) NOT NULL,
  `file_kerjasama` text,
  `deskripsi_kerjasama` longtext NOT NULL,
  PRIMARY KEY (`idKerjasama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_kerjasama`
--

LOCK TABLES `sm_kerjasama` WRITE;
/*!40000 ALTER TABLE `sm_kerjasama` DISABLE KEYS */;
/*!40000 ALTER TABLE `sm_kerjasama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_kurikulum`
--

DROP TABLE IF EXISTS `sm_kurikulum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_kurikulum` (
  `idKurikulum` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kurikulum` text NOT NULL,
  PRIMARY KEY (`idKurikulum`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_kurikulum`
--

LOCK TABLES `sm_kurikulum` WRITE;
/*!40000 ALTER TABLE `sm_kurikulum` DISABLE KEYS */;
INSERT INTO `sm_kurikulum` VALUES (1,'Mata Kuliah Semester'),(2,'Mata Kuliah Keminatan');
/*!40000 ALTER TABLE `sm_kurikulum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_kurikulum_detail`
--

DROP TABLE IF EXISTS `sm_kurikulum_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_kurikulum_detail` (
  `idDetailKurikulum` int(11) NOT NULL AUTO_INCREMENT,
  `idKurikulum` int(11) NOT NULL,
  `nama_detailkurikulum` text NOT NULL,
  PRIMARY KEY (`idDetailKurikulum`),
  KEY `idKurikulum` (`idKurikulum`),
  CONSTRAINT `sm_kurikulum_detail_ibfk_1` FOREIGN KEY (`idKurikulum`) REFERENCES `sm_kurikulum` (`idKurikulum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_kurikulum_detail`
--

LOCK TABLES `sm_kurikulum_detail` WRITE;
/*!40000 ALTER TABLE `sm_kurikulum_detail` DISABLE KEYS */;
INSERT INTO `sm_kurikulum_detail` VALUES (1,1,'Semester 1'),(2,1,'Semester 2'),(3,1,'Semester 3'),(4,1,'Semester 4'),(5,1,'Semester 5'),(6,1,'Semester 6'),(7,1,'Semester 7'),(8,1,'Semester 8'),(9,2,'Computer Network'),(10,2,'Computer Science'),(11,2,'Software Engineering');
/*!40000 ALTER TABLE `sm_kurikulum_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_kurikulum_matkul`
--

DROP TABLE IF EXISTS `sm_kurikulum_matkul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_kurikulum_matkul` (
  `idMatkul` int(11) NOT NULL AUTO_INCREMENT,
  `kode_matkul` varchar(6) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `sks_matkul` int(1) NOT NULL,
  `praktikum_matkul` tinyint(1) NOT NULL,
  `idDetailKurikulum` int(11) NOT NULL,
  PRIMARY KEY (`idMatkul`),
  KEY `idDetailKurikulum` (`idDetailKurikulum`),
  CONSTRAINT `sm_kurikulum_matkul_ibfk_1` FOREIGN KEY (`idDetailKurikulum`) REFERENCES `sm_kurikulum_detail` (`idDetailKurikulum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_kurikulum_matkul`
--

LOCK TABLES `sm_kurikulum_matkul` WRITE;
/*!40000 ALTER TABLE `sm_kurikulum_matkul` DISABLE KEYS */;
INSERT INTO `sm_kurikulum_matkul` VALUES (1,'MA1001','Kalkulus I',3,0,1),(2,'FI1001','Fisika Dasar I',3,1,1),(3,'Ku1003','Teknik Komunikasi Ilmiah',2,0,1),(4,'KI1001','Kimia Dasar',2,0,1),(5,'KU10XX','Agama',2,0,1),(6,'IF1101','Matematika Diskrit',3,0,1),(7,'IF1102','Pengantar Sistem Teknologi Informasi',2,0,1),(8,'MA1004','Kalkulus II',3,0,2),(9,'FI1004','Fisika Dasar II',3,1,2),(10,'EL1003','Algoritma dan Pemograman',3,1,2),(11,'MA1005','Pengantar Metode Statistik',3,0,2),(12,'KU1004','Bahasa Inggris',2,0,2),(13,'IF1103','Sistem Digital',3,1,2),(14,'IF1104','Pengantar Sistem Operasi',3,1,2),(15,'KU10XX','Wawasan Kebangsaan',2,0,3),(16,'IF1105','Aljabar Linier',3,0,3),(17,'IF1106','Sistem Basis Data',3,1,3),(18,'IF1201','Organisasi Komputer',3,0,3),(19,'IF1202','Struktur Data',4,1,3),(20,'IF1203','Teori Graf',3,0,3),(21,'IF1204','Pemrograman Berorientasi Objek',3,0,4),(22,'IF1205','Perancangan dan Analisis Algoritma',3,0,4),(23,'IF1206','Desain Web',3,0,4),(24,'IF1207','Otomata',3,0,4),(25,'IF1208','Manajemen Basis Data',4,0,4),(26,'IF1209','Jaringan Komputer',3,0,4),(27,'IF1107','Komputasi Numerik',4,0,5),(32,'IF1210','Perancangan dan Analisis Sistem Informasi',3,0,5),(33,'IF1211','Kecerdasan Buatan',3,0,5),(34,'IF1212','Pemrograman Web',3,0,5),(35,'IF1213','Perancangan Perangkat Lunak',4,0,5),(36,'IF1214','Perancangan dan Analisis Algoritma Lanjut',3,0,5),(37,'KU1011','Wawasan Teknologi dan Lingkungan',3,0,6),(38,'IF1108','Etika Profesi',2,0,6),(39,'IF1215','Grafika Komputer',3,0,6),(40,'IF1216','Pemrograman Jaringan',3,0,6),(41,'IF12XX','Mata Kuliah Pilihan',6,0,6),(42,'KU10XX','Technopreneurship',3,0,7),(43,'IF1109','Kerja Praktik',2,0,7),(44,'IF1223','Interaksi Manusia dan Komputer',3,0,7),(45,'IF13XX','Mata Kuliah Pilihan',9,0,7),(46,'IF1110','Tugas Akhir',6,0,8),(47,'IF13XX','Mata Kuliah Pilihan',12,0,8),(48,'IF1217','Sistem Terdistribusi',3,0,9),(49,'IF1218','Keamanan Informasi dan Jaringan',3,0,9),(50,'IF1301','Jaringan Nirkabel',3,0,9),(51,'IF1302','Komputasi Awan',3,0,9),(52,'IF1303','Teknologi Antar Jaringan',3,0,9),(53,'IF1304','Jaringan Multimedia',3,0,9),(54,'IF1305','Komputasi Grid dan Parallel',3,0,9),(55,'IF1306','Komputasi Pervasif dan Jaringan Sensor',3,0,9),(56,'IF1307','Perancangan Keamanan Sistem dan Jaringan',3,0,9),(63,'IF1219','Pengolahan Citra Digital',3,0,10),(64,'IF1220','Kecerdasan Komputasional',3,0,10),(65,'IF1308','Visi Komputer',3,0,10),(66,'IF1309','Penambangan Data',3,0,10),(67,'IF1310','Komputasi Biomedik',3,0,10),(68,'IF1311','Permodelan dan Simulasi',3,0,10),(69,'IF1312','Sistem Temu Kembali Informasi',3,0,10),(70,'IF1313','Big Data',3,0,10),(71,'IF1314','Analisis Data Multivariat',3,0,10),(72,'IF1221','Konstruksi Perangkat Lunak',3,0,11),(73,'IF1222','Manajemen Proyek Perangkat Lunak',3,0,11),(74,'IF1315','Arsitektur Perangkat Lunak',3,0,11),(75,'IF1316','Penjaminan Mutu Perangkat Lunak',3,0,11),(76,'IF1317','Sistem Enterprise',3,0,11),(77,'IF1318','Realitas Virtual dan Augmentasi',3,0,11),(78,'IF1319','Basis Data Terdistribusi',3,0,11),(79,'IF1320','Pemrograman Perangkat Bergerak',3,0,11),(80,'IF1321','Pengembangan Permainan',3,0,11);
/*!40000 ALTER TABLE `sm_kurikulum_matkul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_laboratorium`
--

DROP TABLE IF EXISTS `sm_laboratorium`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_laboratorium` (
  `id_laboratorium` int(11) NOT NULL AUTO_INCREMENT,
  `nama_laboratorium` text NOT NULL,
  `laboratorium_text` longtext NOT NULL,
  `laboratorium_file` text,
  PRIMARY KEY (`id_laboratorium`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_laboratorium`
--

LOCK TABLES `sm_laboratorium` WRITE;
/*!40000 ALTER TABLE `sm_laboratorium` DISABLE KEYS */;
/*!40000 ALTER TABLE `sm_laboratorium` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_ormas`
--

DROP TABLE IF EXISTS `sm_ormas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_ormas` (
  `idOrmas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ormas` varchar(100) NOT NULL,
  `foto_ormas` text,
  `deskripsi_ormas` longtext NOT NULL,
  PRIMARY KEY (`idOrmas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_ormas`
--

LOCK TABLES `sm_ormas` WRITE;
/*!40000 ALTER TABLE `sm_ormas` DISABLE KEYS */;
/*!40000 ALTER TABLE `sm_ormas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_pkm`
--

DROP TABLE IF EXISTS `sm_pkm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_pkm` (
  `idPKM` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pkm` varchar(100) NOT NULL,
  `tahun_pkm` varchar(10) NOT NULL,
  `foto_pkm` text,
  `jenis_pkm` varchar(50) NOT NULL,
  `text_pkm` longtext NOT NULL,
  `ketua_pkm` varchar(50) NOT NULL,
  `anggota_pkm` longtext NOT NULL,
  `slug_pkm` longtext NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`idPKM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_pkm`
--

LOCK TABLES `sm_pkm` WRITE;
/*!40000 ALTER TABLE `sm_pkm` DISABLE KEYS */;
/*!40000 ALTER TABLE `sm_pkm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_prestasi`
--

DROP TABLE IF EXISTS `sm_prestasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_prestasi` (
  `idPrestasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prestasi` varchar(50) NOT NULL,
  `date_prestasi` date NOT NULL,
  `tempat_prestasi` varchar(50) NOT NULL,
  `peringkat_prestasi` varchar(25) NOT NULL,
  `anggota_prestasi` longtext NOT NULL,
  `foto_prestasi` text,
  `slug_prestasi` longtext NOT NULL,
  `text_prestasi` text NOT NULL,
  PRIMARY KEY (`idPrestasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_prestasi`
--

LOCK TABLES `sm_prestasi` WRITE;
/*!40000 ALTER TABLE `sm_prestasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `sm_prestasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_profillulusan`
--

DROP TABLE IF EXISTS `sm_profillulusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_profillulusan` (
  `idProfillulusan` int(11) NOT NULL AUTO_INCREMENT,
  `profil` varchar(250) NOT NULL,
  `capaian` longtext NOT NULL,
  PRIMARY KEY (`idProfillulusan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_profillulusan`
--

LOCK TABLES `sm_profillulusan` WRITE;
/*!40000 ALTER TABLE `sm_profillulusan` DISABLE KEYS */;
INSERT INTO `sm_profillulusan` VALUES (1,'Profil Pertama','<p>Pemahaman teknis terkait ilmu komputer</p>\r\n'),(2,'Profil Kedua','<p>Pemahaman terhadap tema dan prinsip-prinsip umum untuk diterapkan dan diaplikasikan pada bidang Informatika dan bidang lainnya</p>\r\n'),(3,'Profil Ketiga','<p>Pemahaman terkait interaksi antara teori dan praktek</p>\r\n'),(4,'Profil Keempat','<p>Kemampuan berpikir pada berbagai tingkat detail dan transaksi</p>\r\n'),(5,'Profil Kelima','<p>Pemahaman dalam menerapkan pengetahuan Informatika untuk memecahkan masalah di dunia nyata</p>\r\n'),(6,'Profil Keenam','<p>Pengalaman untuk menerapkan pengetahuan dalam proyek pengembangan perangkat lunak</p>\r\n'),(7,'Profil Ketujuh','<p>Komitmen untuk terus belajar dan meningkatkan keahlian sepanjang karir, melalui sertifikasi, pelatihan manajemen, atau pelatihan bidang ilmu tertentu</p>\r\n'),(8,'Profil Kedelapan','<p>Komitmen terhadap tanggung jawab profesi</p>\r\n'),(9,'Profil Kesembilan','<p>Kemampuan komunikasi dan organisasi</p>\r\n'),(10,'Profil Kesepuluh','<p>Pengetahuan yang luas terhadap aplikasi komputasi</p>\r\n'),(11,'Profil Kesebelas','<p>Pengetahuan terhadap bidang ilmu yang spesifik selain informatika</p>\r\n');
/*!40000 ALTER TABLE `sm_profillulusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_sejarah`
--

DROP TABLE IF EXISTS `sm_sejarah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_sejarah` (
  `id_sejarah` int(11) NOT NULL AUTO_INCREMENT,
  `sejarah_text` longtext NOT NULL,
  PRIMARY KEY (`id_sejarah`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_sejarah`
--

LOCK TABLES `sm_sejarah` WRITE;
/*!40000 ALTER TABLE `sm_sejarah` DISABLE KEYS */;
INSERT INTO `sm_sejarah` VALUES (1,'<p>Program Studi Informatika berdiri pada tahun 2016 bersamaan dengan Program Studi Teknik Industri dan Teknik Lingkungan. Kehadiran program studi Informatika di Institut Teknologi Kalimantan diharapkan dapat berpartisipasi aktif dalam mendukung Buku Putih Indonesia 2005-2025 di bidang Teknologi Informasi dan Komunikasi.</p>\r\n');
/*!40000 ALTER TABLE `sm_sejarah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_silabus`
--

DROP TABLE IF EXISTS `sm_silabus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_silabus` (
  `id_silabus` int(11) NOT NULL AUTO_INCREMENT,
  `file_silabus` text NOT NULL,
  `tglrilis_silabus` date NOT NULL,
  `ukuran_file` varchar(50) NOT NULL,
  PRIMARY KEY (`id_silabus`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_silabus`
--

LOCK TABLES `sm_silabus` WRITE;
/*!40000 ALTER TABLE `sm_silabus` DISABLE KEYS */;
INSERT INTO `sm_silabus` VALUES (1,'SILABUS_INFORMATIKA.pdf','2019-09-11','1330.9');
/*!40000 ALTER TABLE `sm_silabus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_strukturorganisasi`
--

DROP TABLE IF EXISTS `sm_strukturorganisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_strukturorganisasi` (
  `id_strukturorganisasi` int(11) NOT NULL AUTO_INCREMENT,
  `struktur_file` text NOT NULL,
  PRIMARY KEY (`id_strukturorganisasi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_strukturorganisasi`
--

LOCK TABLES `sm_strukturorganisasi` WRITE;
/*!40000 ALTER TABLE `sm_strukturorganisasi` DISABLE KEYS */;
INSERT INTO `sm_strukturorganisasi` VALUES (1,'WhatsApp_Image_2019-08-01_at_21_48_09.jpeg');
/*!40000 ALTER TABLE `sm_strukturorganisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_visimisitujuanmotto`
--

DROP TABLE IF EXISTS `sm_visimisitujuanmotto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_visimisitujuanmotto` (
  `id_visimisi` int(11) NOT NULL AUTO_INCREMENT,
  `visi_text` longtext NOT NULL,
  `misi_text` longtext NOT NULL,
  `tujuan_text` longtext NOT NULL,
  `motto_text` longtext NOT NULL,
  PRIMARY KEY (`id_visimisi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_visimisitujuanmotto`
--

LOCK TABLES `sm_visimisitujuanmotto` WRITE;
/*!40000 ALTER TABLE `sm_visimisitujuanmotto` DISABLE KEYS */;
INSERT INTO `sm_visimisitujuanmotto` VALUES (1,'<p>Menjadi program studi unggul di bidang Informatika yang inovatif dan kreatif dalam porosKalimantan pada tahun 2025</p>\r\n','<ol>\r\n	<li>\r\n	<p>Menyelenggarakan sistem pendidikan yang efektif, efisien, dan berkelanjutan dalam rangka menghasilkan lulusan sarjana Informatika</p>\r\n	</li>\r\n	<li>\r\n	<p>Menghasilkan lulusan yang memiliki kompetensi di bidang Informatika, berjiwa wirausaha (<em>entrepreneur</em>) dan dapat berperan positif di tingkat nasional dan internasional (<em>world class</em>)</p>\r\n	</li>\r\n	<li>\r\n	<p>Meningkatkan kontribusi dan kolaborasi dengan berbagai pihak dalam masyarakat dengan mengembangkan produk dan layanan dalam bidang Informatika di tingkat regional, nasional maupun internasional</p>\r\n	</li>\r\n</ol>\r\n','','');
/*!40000 ALTER TABLE `sm_visimisitujuanmotto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submenu`
--

DROP TABLE IF EXISTS `submenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submenu` (
  `idMenu` int(11) NOT NULL,
  `idSubmenu` int(11) NOT NULL AUTO_INCREMENT,
  `nameSubmenu` varchar(100) NOT NULL,
  `url` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idSubmenu`),
  UNIQUE KEY `nameSubmenu` (`nameSubmenu`),
  KEY `idMenu` (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submenu`
--

LOCK TABLES `submenu` WRITE;
/*!40000 ALTER TABLE `submenu` DISABLE KEYS */;
INSERT INTO `submenu` VALUES (3,1,'Sejarah','profile/sejarah',1),(3,2,'Visi, Misi, Tujuan, dan Moto','profile/visimisi',1),(3,3,'Struktur Organisasi','profile/struktur_organisasi',1),(3,4,'Dosen dan Tenaga Pendidik','profile/dosen',1),(3,5,'Kerjasama','profile/kerjasama',1),(4,6,'Kurikulum','akademik/kurikulum',1),(4,7,'Silabus','akademik/silabus',1),(4,8,'Kalender Akademik','akademik/kalender_akademik',1),(4,9,'Laboratorium','akademik/laboratorium',1),(4,10,'Profile Lulusan','akademik/profile_lulusan',1),(4,11,'Akreditasi','akademik/akreditasi',1),(5,12,'Organisasi Kemahasiswaan','kemahasiswaan/ormawa',1),(5,13,'Program Kreativitas Mahasiswa','kemahasiswaan/pkm',1),(5,14,'Prestasi Mahasiswa','kemahasiswaan/prestasi_mahasiswa',1),(5,15,'Alumni','kemahasiswaan/alumni',1),(6,16,'Grup Penelitian','penelitian/grup_penelitian',1),(6,17,'Hasil Penelitian','penelitian/hasil_penelitian',1),(6,18,'Hasil Pengabdian','penelitian/hasil_pengabdian',1),(4,19,'Biaya Kuliah','akademik/biaya_kuliah',1);
/*!40000 ALTER TABLE `submenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submenu_bantu`
--

DROP TABLE IF EXISTS `submenu_bantu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submenu_bantu` (
  `idBantu` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `nameSubMenu` varchar(100) NOT NULL,
  `slug_submenu` varchar(100) NOT NULL,
  `url_bantu` varchar(50) NOT NULL,
  `kolom1` text NOT NULL,
  `kolom2` text NOT NULL,
  `kolom3` text NOT NULL,
  PRIMARY KEY (`idBantu`),
  KEY `idSubmenu` (`idMenu`),
  CONSTRAINT `submenu_bantu_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `submenu` (`idSubmenu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submenu_bantu`
--

LOCK TABLES `submenu_bantu` WRITE;
/*!40000 ALTER TABLE `submenu_bantu` DISABLE KEYS */;
/*!40000 ALTER TABLE `submenu_bantu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimoni`
--

DROP TABLE IF EXISTS `testimoni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimoni` (
  `idTestimoni` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL,
  `posisi` varchar(250) NOT NULL,
  `testimoni` text NOT NULL,
  `foto_testimoni` text NOT NULL,
  PRIMARY KEY (`idTestimoni`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimoni`
--

LOCK TABLES `testimoni` WRITE;
/*!40000 ALTER TABLE `testimoni` DISABLE KEYS */;
INSERT INTO `testimoni` VALUES (2,'Steve Job','Founder Apple Inc','<p>The doers are the major thinkers. The people that really create the things that change this industry are both the thinker and doer in one person.</p>\r\n','stevejobs.jpg');
/*!40000 ALTER TABLE `testimoni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `nama_user` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `foto_user` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `akses` tinyint(1) NOT NULL,
  `token` varchar(100) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'admin','Admistrator','e4be96e519f9611b7b20e61db1f148a20344eac3fa9a6d2ca9102ba7fce5f9bcabbd9c31473c2722ed3f7aecc49f9c3f38c390f2f9d33e23043dd686bd3eaa62','','11181051@student.itk.ac.id',1,'c31PdkrXMiSLRweh2OzV0t4uACNFlp5vsgnjIbyxGKETUm8BoW');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'siprodi_if'
--

--
-- Dumping routines for database 'siprodi_if'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-13 11:48:02
