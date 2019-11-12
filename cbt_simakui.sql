-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 10:09 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt_simakui`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `password`, `name`, `email`) VALUES
('admin1', 'sanggarbelajar', 'Admin 1', 'admin1@sanggarbelajar.com'),
('anwar', 'anwarsanggarbelajar', 'M. Anwar Ma''sum', 'anwar.rejoso@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_tryout_ka`
--

CREATE TABLE `hasil_tryout_ka` (
  `userid` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `school` varchar(25) NOT NULL,
  `class` varchar(25) NOT NULL,
  `benar` varchar(20) DEFAULT NULL,
  `salah` varchar(20) DEFAULT NULL,
  `kosong` varchar(20) DEFAULT NULL,
  `mtkbenar` varchar(20) DEFAULT NULL,
  `mtksalah` varchar(20) DEFAULT NULL,
  `mtkkosong` varchar(20) DEFAULT NULL,
  `biobenar` varchar(20) DEFAULT NULL,
  `biosalah` varchar(20) DEFAULT NULL,
  `biokosong` varchar(20) DEFAULT NULL,
  `fisbenar` varchar(20) DEFAULT NULL,
  `fissalah` varchar(20) DEFAULT NULL,
  `fiskosong` varchar(20) DEFAULT NULL,
  `kimbenar` varchar(20) DEFAULT NULL,
  `kimsalah` varchar(20) DEFAULT NULL,
  `kimkosong` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_tryout_ka`
--

INSERT INTO `hasil_tryout_ka` (`userid`, `name`, `school`, `class`, `benar`, `salah`, `kosong`, `mtkbenar`, `mtksalah`, `mtkkosong`, `biobenar`, `biosalah`, `biokosong`, `fisbenar`, `fissalah`, `fiskosong`, `kimbenar`, `kimsalah`, `kimkosong`) VALUES
('adi', 'Adi Nuradi', 'SMA', 'XII', '0', '3', '57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_tryout_kd`
--

CREATE TABLE `hasil_tryout_kd` (
  `userid` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `school` varchar(25) NOT NULL,
  `class` varchar(25) NOT NULL,
  `benar` varchar(20) DEFAULT NULL,
  `salah` varchar(20) DEFAULT NULL,
  `kosong` varchar(20) DEFAULT NULL,
  `mdbenar` varchar(20) DEFAULT NULL,
  `mdsalah` varchar(20) DEFAULT NULL,
  `mdkosong` varchar(20) DEFAULT NULL,
  `indbenar` varchar(20) DEFAULT NULL,
  `indsalah` varchar(20) DEFAULT NULL,
  `indkosong` varchar(20) DEFAULT NULL,
  `ingbenar` varchar(20) DEFAULT NULL,
  `ingsalah` varchar(20) DEFAULT NULL,
  `ingkosong` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_tryout_kd`
--

INSERT INTO `hasil_tryout_kd` (`userid`, `name`, `school`, `class`, `benar`, `salah`, `kosong`, `mdbenar`, `mdsalah`, `mdkosong`, `indbenar`, `indsalah`, `indkosong`, `ingbenar`, `ingsalah`, `ingkosong`) VALUES
('adi', 'Adi Nuradi', 'SMA', 'XII', '0', '0', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_tryout_ks`
--

CREATE TABLE `hasil_tryout_ks` (
  `userid` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `school` varchar(25) NOT NULL,
  `class` varchar(25) NOT NULL,
  `benar` varchar(20) DEFAULT NULL,
  `salah` varchar(20) DEFAULT NULL,
  `kosong` varchar(20) DEFAULT NULL,
  `ekobenar` varchar(20) DEFAULT NULL,
  `ekosalah` varchar(20) DEFAULT NULL,
  `ekokosong` varchar(20) DEFAULT NULL,
  `sejbenar` varchar(20) DEFAULT NULL,
  `sejsalah` varchar(20) DEFAULT NULL,
  `sejkosong` varchar(20) DEFAULT NULL,
  `geobenar` varchar(20) DEFAULT NULL,
  `geosalah` varchar(20) DEFAULT NULL,
  `geokosong` varchar(20) DEFAULT NULL,
  `sosbenar` varchar(20) DEFAULT NULL,
  `sossalah` varchar(20) DEFAULT NULL,
  `soskosong` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_tryout_ks`
--

INSERT INTO `hasil_tryout_ks` (`userid`, `name`, `school`, `class`, `benar`, `salah`, `kosong`, `ekobenar`, `ekosalah`, `ekokosong`, `sejbenar`, `sejsalah`, `sejkosong`, `geobenar`, `geosalah`, `geokosong`, `sosbenar`, `sossalah`, `soskosong`) VALUES
('adi', 'Adi Nuradi', 'SMA', 'XII', '0', '5', '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `userid` varchar(25) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `specialization` varchar(20) NOT NULL,
  `sesi` int(11) NOT NULL,
  `random_bin` int(11) NOT NULL,
  `random_mat` int(11) NOT NULL,
  `random_bing` int(11) NOT NULL,
  `random_p1` int(11) NOT NULL,
  `random_p2` int(11) NOT NULL,
  `random_p3` int(11) NOT NULL,
  `random_pg` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_tryout_ka`
--

CREATE TABLE `jawaban_tryout_ka` (
  `userid` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `school` varchar(25) NOT NULL,
  `class` varchar(25) NOT NULL,
  `jawabantka` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_tryout_ka`
--

INSERT INTO `jawaban_tryout_ka` (`userid`, `name`, `school`, `class`, `jawabantka`) VALUES
('adi', 'Adi Nuradi', 'SMA', 'XII', 'A;B;C;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;#');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_tryout_kd`
--

CREATE TABLE `jawaban_tryout_kd` (
  `userid` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `school` varchar(25) NOT NULL,
  `class` varchar(25) NOT NULL,
  `jawabantkd` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_tryout_kd`
--

INSERT INTO `jawaban_tryout_kd` (`userid`, `name`, `school`, `class`, `jawabantkd`) VALUES
('adi', 'Adi Nuradi', 'SMA', 'XII', '_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;#');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_tryout_ks`
--

CREATE TABLE `jawaban_tryout_ks` (
  `userid` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `school` varchar(25) NOT NULL,
  `class` varchar(25) NOT NULL,
  `jawabantks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_tryout_ks`
--

INSERT INTO `jawaban_tryout_ks` (`userid`, `name`, `school`, `class`, `jawabantks`) VALUES
('adi', 'Adi Nuradi', 'SMA', 'XII', 'A;A;A;A;A;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;_;#');

-- --------------------------------------------------------

--
-- Table structure for table `pilihanprodi`
--

CREATE TABLE `pilihanprodi` (
  `userid` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `school` varchar(25) NOT NULL,
  `class` varchar(25) NOT NULL,
  `prodireg1` varchar(75) DEFAULT NULL,
  `prodireg2` varchar(75) DEFAULT NULL,
  `prodireg3` varchar(75) DEFAULT NULL,
  `prodipar1` varchar(75) DEFAULT NULL,
  `prodipar2` varchar(75) DEFAULT NULL,
  `prodipar3` varchar(75) DEFAULT NULL,
  `prodivok1` varchar(75) DEFAULT NULL,
  `prodivok2` varchar(75) DEFAULT NULL,
  `prodivok3` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihanprodi`
--

INSERT INTO `pilihanprodi` (`userid`, `name`, `school`, `class`, `prodireg1`, `prodireg2`, `prodireg3`, `prodipar1`, `prodipar2`, `prodipar3`, `prodivok1`, `prodivok2`, `prodivok3`) VALUES
('adi', 'Adi Nuradi', 'SMA', 'XII', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `peminatan` varchar(75) NOT NULL,
  `jenjang` varchar(75) NOT NULL,
  `kode` varchar(75) NOT NULL,
  `prodi` varchar(75) NOT NULL,
  `ketetatan` float NOT NULL,
  `z` float NOT NULL,
  `nn` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `peminatan`, `jenjang`, `kode`, `prodi`, `ketetatan`, `z`, `nn`) VALUES
(3161, 'Saintek', 'Paralel', '321301', 'Matematika', 0.0341, 0.9659, 676.309),
(3162, 'Saintek', 'Paralel', '321302', 'Fisika', 0.0647, 0.9353, 661.408),
(3163, 'Saintek', 'Paralel', '321303', 'Biologi', 0.0342, 0.9658, 676.309),
(3164, 'Saintek', 'Paralel', '321304', 'Kimia', 0.0476, 0.9524, 668.859),
(3165, 'Saintek', 'Paralel', '321305', 'Teknik Industri', 0.0158, 0.9842, 692.701),
(3166, 'Saintek', 'Paralel', '321306', 'Teknik Metalurgi & Material', 0.0235, 0.9765, 684.753),
(3167, 'Saintek', 'Paralel', '321307', 'Teknik Sipil', 0.0173, 0.9827, 690.714),
(3168, 'Saintek', 'Paralel', '321308', 'Teknik Mesin', 0.0269, 0.9731, 681.773),
(3169, 'Saintek', 'Paralel', '321309', 'Teknik Kimia', 0.0267, 0.9733, 681.773),
(3170, 'Saintek', 'Paralel', '321310', 'Arsitektur', 0.0158, 0.9842, 692.701),
(3171, 'Saintek', 'Paralel', '321311', 'Teknik Elektro', 0.0309, 0.9691, 678.793),
(3172, 'Saintek', 'Paralel', '321312', 'Sistem Informasi', 0.0135, 0.9865, 695.681),
(3173, 'Saintek', 'Paralel', '321313', 'Ilmu Komputer', 0.0229, 0.9771, 685.25),
(3174, 'Saintek', 'Paralel', '321314', 'Farmasi', 0.024, 0.976, 684.257),
(3175, 'Saintek', 'Paralel', '321315', 'Geografi', 0.0539, 0.9461, 665.879),
(3176, 'Saintek', 'Internasional', '321401', 'Pendidikan Dokter', 0.0875, 0.9125, 653.461),
(3177, 'Saintek', 'Internasional', '321402', 'Teknik Metalurgi', 0.6666, 0.3334, 564.552),
(3178, 'Saintek', 'Internasional', '321403', 'Teknik Kimia', 0.6904, 0.3096, 561.075),
(3179, 'Saintek', 'Internasional', '321404', 'Teknik Sipil', 0.5714, 0.4286, 576.969),
(3180, 'Saintek', 'Internasional', '321405', 'Teknik Mesin', 0.5789, 0.4211, 575.976),
(3181, 'Saintek', 'Internasional', '321406', 'Teknik Elektro', 0.6571, 0.3429, 566.042),
(3182, 'Saintek', 'Internasional', '321407', 'Arsitektur', 0.4461, 0.5539, 592.864),
(3183, 'Saintek', 'Internasional', '321408', 'Teknik Industri', 0.4523, 0.5477, 591.87),
(3184, 'Saintek', 'Internasional', '321409', 'Ilmu Komputer', 0.2931, 0.7069, 613.229),
(3185, 'Saintek', 'Vokasi', '321501', 'Perumahsakitan', 0.1031, 0.8969, 648.494),
(3186, 'Saintek', 'Vokasi', '321502', 'Fisioterapi', 0.0466, 0.9534, 669.356),
(3187, 'Saintek', 'Vokasi', '321503', 'Okupasi Terapi', 0.0943, 0.9057, 650.481),
(3188, 'Saintek', 'Vokasi', '321504', 'Adm. Asuransi dan Aktuaria', 0.0588, 0.9412, 663.892),
(3189, 'Saintek', 'Reguler', '321301', 'Matematika', 0.0341, 0.9659, 676.309),
(3190, 'Saintek', 'Reguler', '321302', 'Fisika', 0.0647, 0.9353, 661.408),
(3191, 'Saintek', 'Reguler', '321303', 'Biologi', 0.0342, 0.9658, 676.309),
(3192, 'Saintek', 'Reguler', '321304', 'Kimia', 0.0476, 0.9524, 668.859),
(3193, 'Saintek', 'Reguler', '321305', 'Teknik Industri', 0.0158, 0.9842, 692.701),
(3194, 'Saintek', 'Reguler', '321306', 'Teknik Metalurgi & Material', 0.0235, 0.9765, 684.753),
(3195, 'Saintek', 'Reguler', '321307', 'Teknik Sipil', 0.0173, 0.9827, 690.714),
(3196, 'Saintek', 'Reguler', '321308', 'Teknik Mesin', 0.0269, 0.9731, 681.773),
(3197, 'Saintek', 'Reguler', '321309', 'Teknik Kimia', 0.0267, 0.9733, 681.773),
(3198, 'Saintek', 'Reguler', '321310', 'Arsitektur', 0.0158, 0.9842, 692.701),
(3199, 'Saintek', 'Reguler', '321311', 'Teknik Elektro', 0.0309, 0.9691, 678.793),
(3200, 'Saintek', 'Reguler', '321312', 'Sistem Informasi', 0.0135, 0.9865, 695.681),
(3201, 'Saintek', 'Reguler', '321313', 'Ilmu Komputer', 0.0229, 0.9771, 685.25),
(3202, 'Saintek', 'Reguler', '321314', 'Farmasi', 0.024, 0.976, 684.257),
(3203, 'Saintek', 'Reguler', '321315', 'Geografi', 0.0539, 0.9461, 665.879),
(3204, 'Saintek', 'Reguler', '321401', 'Pendidikan Dokter', 0.0875, 0.9125, 653.461),
(3205, 'Saintek', 'Reguler', '321402', 'Teknik Metalurgi', 0.6666, 0.3334, 564.552),
(3206, 'Saintek', 'Reguler', '321403', 'Teknik Kimia', 0.6904, 0.3096, 561.075),
(3207, 'Saintek', 'Reguler', '321404', 'Teknik Sipil', 0.5714, 0.4286, 576.969),
(3208, 'Saintek', 'Reguler', '321405', 'Teknik Mesin', 0.5789, 0.4211, 575.976),
(3209, 'Saintek', 'Reguler', '321406', 'Teknik Elektro', 0.6571, 0.3429, 566.042),
(3210, 'Saintek', 'Reguler', '321407', 'Arsitektur', 0.4461, 0.5539, 592.864),
(3211, 'Saintek', 'Reguler', '321408', 'Teknik Industri', 0.4523, 0.5477, 591.87),
(3212, 'Saintek', 'Reguler', '321409', 'Ilmu Komputer', 0.2931, 0.7069, 613.229),
(3213, 'Saintek', 'Reguler', '321501', 'Perumahsakitan', 0.1031, 0.8969, 648.494),
(3214, 'Saintek', 'Reguler', '321502', 'Fisioterapi', 0.0466, 0.9534, 669.356),
(3215, 'Saintek', 'Reguler', '321503', 'Okupasi Terapi', 0.0943, 0.9057, 650.481),
(3216, 'Saintek', 'Reguler', '321504', 'Adm. Asuransi dan Aktuaria', 0.0588, 0.9412, 663.892),
(3217, 'Soshum', 'Paralel', '321001', 'Ilmu Hukum', 0.0214, 0.9786, 653.273),
(3218, 'Soshum', 'Paralel', '321002', 'Akuntansi', 0.0056, 0.9944, 670.993),
(3219, 'Soshum', 'Paralel', '321003', 'Ilmu Perpustakaan', 0.0247, 0.9753, 650.792),
(3220, 'Soshum', 'Paralel', '321004', 'Sastra Cina', 0.0776, 0.9224, 631.655),
(3221, 'Soshum', 'Paralel', '321005', 'Sastra Arab', 0.0604, 0.9396, 636.262),
(3222, 'Soshum', 'Paralel', '321006', 'Sastra Jepang', 0.0331, 0.9669, 646.185),
(3223, 'Soshum', 'Paralel', '321007', 'Sastra Inggris', 0.0144, 0.9856, 658.944),
(3224, 'Soshum', 'Paralel', '321008', 'Sastra Perancis', 0.0411, 0.9589, 642.996),
(3225, 'Soshum', 'Paralel', '321009', 'Sastra Jerman', 0.0361, 0.9639, 645.122),
(3226, 'Soshum', 'Paralel', '321010', 'Sastra Belanda', 0.0448, 0.9552, 641.578),
(3227, 'Soshum', 'Paralel', '321011', 'Bahasa dan Kebudayaan Korea', 0.0343, 0.9657, 645.122),
(3228, 'Soshum', 'Paralel', '321012', 'Psikologi', 0.0142, 0.9858, 658.944),
(3229, 'Soshum', 'Paralel', '321013', 'Ilmu Komunikasi', 0.0039, 0.9961, 679.144),
(3230, 'Soshum', 'Paralel', '321014', 'Ilmu Administrasi Fiskal', 0.0123, 0.9877, 661.07),
(3231, 'Soshum', 'Paralel', '321015', 'Ilmu Administrasi Negara', 0.0118, 0.9882, 661.424),
(3232, 'Soshum', 'Paralel', '321016', 'Ilmu Administrasi Niaga', 0.0127, 0.9873, 660.361),
(3233, 'Soshum', 'Internasional', '321112', 'Ilmu Hukum', 0.2189, 0.7811, 604.366),
(3234, 'Soshum', 'Internasional', '321113', 'Ilmu Ekonomi', 0.5937, 0.4063, 572.824),
(3235, 'Soshum', 'Internasional', '321114', 'Manajemen', 0.2513, 0.7487, 605.075),
(3236, 'Soshum', 'Internasional', '321115', 'Akuntansi', 0.4719, 0.5281, 606.138),
(3237, 'Soshum', 'Internasional', '321116', 'Psikologi', 0.3375, 0.6625, 596.215),
(3238, 'Soshum', 'Internasional', '321117', 'Ilmu Komunikasi', 0.2477, 0.7523, 605.429),
(3239, 'Soshum', 'Vokasi', '321221', 'Akuntansi', 0.0178, 0.9822, 655.754),
(3240, 'Soshum', 'Vokasi', '321222', 'Manajemen Informasi dan Dokumen (MID)', 0.0478, 0.9522, 640.515),
(3241, 'Soshum', 'Vokasi', '321223', 'Komunikasi', 0.0366, 0.9634, 644.768),
(3242, 'Soshum', 'Vokasi', '321224', 'Adm. Keuangan dan Perbankan', 0.0141, 0.9859, 658.944),
(3243, 'Soshum', 'Vokasi', '321225', 'Adm. Perkantoran Dan Sekretari', 0.0413, 0.9587, 642.641),
(3244, 'Soshum', 'Vokasi', '321226', 'Adm. Perpajakan', 0.0102, 0.9898, 663.551),
(3245, 'Soshum', 'Vokasi', '321227', 'Pariwisata', 0.0332, 0.9668, 646.185);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `userid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `school` varchar(25) NOT NULL,
  `class` varchar(25) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`userid`, `password`, `name`, `school`, `class`, `email`, `phone`, `nis`, `nisn`) VALUES
('adi', 'adi', 'Adi Nuradi', 'SMA', 'XII', NULL, NULL, NULL, NULL),
('bimbelsg', 'bimbelsg', 'Adib Maulana Akmal Subakti', 'MA Al Hamid', '12 IPA', NULL, NULL, NULL, NULL),
('sg1001', '1104', 'AHMAD SYATHIBI HAFIZH', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1002', '1208', 'AISHA SALSABILA TANNIA WIJAYA', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1003', '1312', 'ALIFIA NUR CHOLIFAH', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1004', '1416', 'ANWAR HAKIM', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1005', '1520', 'DEBBIE FEBRINA', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1006', '1624', 'DIKY PERMANA PUTRA', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1007', '1728', 'DINDA AULIA FEBRIYANNY', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1008', '1832', 'DYAH AYU MAYA SARI', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1009', '1936', 'ELSYA NABILAH', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1010', '2040', 'FAIZAH ANJANI ', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1011', '2144', 'FARAH AZIZAH HAQ', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1012', '2248', 'FIRDA FADHILAH ARBAH', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1013', '2352', 'IMTINAN SAFINATUN NAJA', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1014', '2456', 'JATNIKA RAHAYU', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1015', '2560', 'JUANSYAH IQDAMAL SYARIF', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1016', '2664', 'MAHSA NURAINI SYAHDA', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1017', '2768', 'MIFTAHUL FALAH SAMURI', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1018', '2872', 'MOHAMAD ZYDANE ULIR RIZQI T', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1019', '2976', 'MUHAMMAD AL FADIO UMMAM ', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1020', '3080', 'MUHAMMAD FAISAL NUGRAHA', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1021', '3184', 'MUHAMMAD IHSAN NURFAWAZ', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1022', '3288', 'MUHAMMAD RYAN FAHLEVI', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1023', '3392', 'RESTU INDIANTO', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1024', '3496', 'REZA FACHREZY SEPTIAWAN', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1025', '3600', 'RIDWAN SYAMSA SAEFULLAH', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1026', '3704', 'RIFQI ADITYA SANTOSO', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1027', '3808', 'SAKTI ADZIE PRAWIRA', 'MA Al Hamidiyah', 'IPA', NULL, NULL, NULL, NULL),
('sg1028', '3912', 'ABITIAN PRIYA NOUVADIL', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1029', '4016', 'ANNISA RAMADHANI NURFAHDA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1030', '4120', 'ELLEN NATASYA ANDINI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1031', '4224', 'FAROQ AL FARIZI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1032', '4328', 'FAWAZ AZIZY', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1033', '4432', 'GHULAM RIZQI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1034', '4536', 'HANIF NUR MAZADI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1035', '4640', 'ILHAM YOGA ADIYANTO', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1036', '4744', 'LUKMANUL HAKIM', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1037', '4848', 'M. ANDRY OCTA PRATAMA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1038', '4952', 'MUHAMMAD CAKRA SABILLI RIFQI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1039', '5056', 'NABILAH AZZAHRA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1040', '5160', 'NADA NUR MAULIDINA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1041', '5264', 'NADIATUL HAFIAN', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1042', '5368', 'NAURAH KHAIRUNNISA AZIZAH', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1043', '5472', 'NUR MUHAMMAD MAHDI ULIL A', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1044', '5576', 'PRANAJA DWI SURYA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1045', '5680', 'RIZKA AMIRA NURASYID', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1046', '5784', 'SHAFIRA NUR RAMADHANTI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1047', '5888', 'SITI ZAHRA DANISA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1048', '5992', 'WAHYU WIDODO', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1049', '6096', 'ANDI  MUHAMMAD ISKANDAR ', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1050', '6200', 'ANGGRAENI DWI NINGRUM', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1051', '6304', 'ANITA AYU PRIMADYAH', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1052', '6408', 'ANNISA DWI OCTAVIANI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1053', '6512', 'ANNISA PUTRI ', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1054', '6616', 'FATIMAH ZAHRO', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1055', '6720', 'HANIFA AUDELIA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1056', '6824', 'MUAMMAR MUBARAK IBRAHIM', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1057', '6928', 'MUHAMAD DIMAS ARKHAN', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1058', '7032', 'MUHAMAD NURDIANTOMO', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1059', '7136', 'MUHAMMAD HARITS ZHAFRAN', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1060', '7240', 'MUHAMMAD RAFI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1061', '7344', 'MUHAMMAD RAFI RAMADHAN', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1062', '7448', 'MUHAMMAD RIVANDI LUBIS', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1063', '7552', 'NAJLA SHULHATUL FAUZA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1064', '7656', 'NAUVAL HALIM HABIBI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1065', '7760', 'NAZHILA DELYANARACHMA P', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1066', '7864', 'RAMDHAN GHUFRON ASSIDDIQI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1067', '7968', 'RIZKY BAGAS RAMDANI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1068', '8072', 'SALMA ANDZALA SHAKINATA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1069', '8176', 'SYALSABILA HAYA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1070', '8280', 'SYARIFUDDIN OGANDA PUTRA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1071', '8384', 'TARISA AMALIA RABBANI', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1072', '8488', 'TEGGAR ANUGRAH RAMADHAN', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1073', '8592', 'TITO WIRADINATA', 'MA Al Hamidiyah', 'IPS', NULL, NULL, NULL, NULL),
('sg1074', '8696', 'AMALIA SOFA IZZA', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1075', '8800', 'ANANDA NABILLA JASMINE', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1076', '8904', 'ANNISA NUZULIYA INAYATI', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1077', '9008', 'ARYO BIMO SANTOSO', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1078', '9112', 'FADHLURROHMAN FAKHRI SAFNA', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1079', '9216', 'FAHRI AKMAL SYARIF', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1080', '9320', 'GEORGE KHATAMI ALBUSTOMY', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1081', '9424', 'ILHAM', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1082', '9528', 'KHRISNA RHADITYA PUTRA', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1083', '9632', 'M. KHAIRU MAMNUN', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1084', '9736', 'MELLY NUR RAHMAWATI', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1085', '9840', 'MUHAMAD FIKRI RAMADHAN', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1086', '9944', 'MUHAMMAD BUDIMAN TU D', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1087', '10048', 'MUHAMMAD FAUZIL ADHIM', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1088', '10152', 'MUHAMMAD IKHSAN RAHMAT', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1089', '10256', 'MUHAMMAD REZA', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1090', '10360', 'MUHAMMAD RIDWAN', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1091', '10464', 'PILLARIA AZZAHRA', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1092', '10568', 'VIRA SERVIA', 'MA Al Hamidiyah', 'Agama', NULL, NULL, NULL, NULL),
('sg1093', '10672', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1094', '10776', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1095', '10880', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1096', '10984', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1097', '11088', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1098', '11192', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1099', '11296', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1100', '11400', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1101', '11504', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1102', '11608', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1103', '11712', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1104', '11816', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1105', '11920', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1106', '12024', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1107', '12128', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1108', '12232', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1109', '12336', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL),
('sg1110', '12440', '-', 'MA Al Hamidiyah', '-', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `degree` varchar(25) NOT NULL,
  `specialization` varchar(20) DEFAULT NULL,
  `number` int(11) NOT NULL,
  `description` text NOT NULL,
  `fileimage` varchar(40) NOT NULL,
  `optionA` text NOT NULL,
  `optionB` text NOT NULL,
  `optionC` text NOT NULL,
  `optionD` text NOT NULL,
  `optionE` text NOT NULL,
  `flagOption` tinyint(1) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `code`, `subject`, `degree`, `specialization`, `number`, `description`, `fileimage`, `optionA`, `optionB`, `optionC`, `optionD`, `optionE`, `flagOption`, `answer`) VALUES
(1, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 1, '', 'TKD_MD1.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'C'),
(2, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 2, '', 'TKD_MD2.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'B'),
(3, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 3, '', 'TKD_MD3.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'A'),
(4, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 4, '', 'TKD_MD4.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'B'),
(5, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 5, '', 'TKD_MD5.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'D'),
(6, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 6, '', 'TKD_MD6.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'C'),
(7, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 7, '', 'TKD_MD7.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'A'),
(8, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 8, '', 'TKD_MD8.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'A'),
(9, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 9, '', 'TKD_MD9.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'D'),
(10, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 10, '', 'TKD_MD10.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'B'),
(11, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 11, '', 'TKD_MD11.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'B'),
(12, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 12, '', 'TKD_MD12.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'D'),
(13, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 13, '', 'TKD_MD13.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'D'),
(14, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 14, '', 'TKD_MD14.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'E'),
(15, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'MD', 15, '', 'TKD_MD15.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'E'),
(16, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 16, '<p>&nbsp; &nbsp; &nbsp; (1) Para peneliti telah menemukan bahwa ritual pengorbanan manusia memainkan peran dalam evolusi masyarakat modern yang kompleks. (2) Dalam studi yang diterbitkan di jurnal Nature disebutkan bahwa ritual pengorbanan manusia mungkin telah membantu mendorong pembentukan dan pemertahanan hierarki sosial. (3) Bukti arkeologis menunjukkan bahwa pengorbanan manusia menjadi dalam budaya Afrika, Amerika, Arab, Austronesia, Cina, Jerman, Inuit, Turki, dan Jepang.</p>\r\n<p>&nbsp; &nbsp; &nbsp; (4) Menurut &ldquo;hipotesis kontrol sosial&rdquo;, pengorbanan manusia memberikan pembenaran supernatural kepada otoritas tertinggi untuk mengambil kehidupan kaum kelas bawah. (5) Dalam hal ini, stratifikasi sosial mungkin menjadi salah satu bentuk awal kepemimpinan dan kemudian mengarah pada bentuk kerajaan, monarki, dan pemerintah. (6) Hipotesis tersebutlah yang diujikan dalam sebuah penelitian yang dipimpin oleh Joseph Watts dari University of Auckland terhadap 93 budaya Austronesia tradisional.</p>\r\n<p>&nbsp; &nbsp; &nbsp; (7) Watts mengatakan bahwa pelanggaran hukum, pemakaman seorang pemimpin, dan peresmian rumah atau perahu baru menjadi momen untuk pengorbanan manusia. (8) Korban biasanya berasal dari status sosial yang rendah, misalnya budak, namun penggagas pengorbanan berasal dari status sosial yang tinggi, seperti kepala suku. (9) Metode pengorbanannya bermacam-macam: pembakaran, penenggelaman, pencekikan, pemukulan, dan pemenggalan. (10) Hasil temuan Watts dan timnya menunjukkan bahwa ritual pengorbanan membantu manusia bertransisi dari kelompok egaliter kecil, seperti nenek moyang kita dulu, menjadi masyarakat dengan banyak tingkatan sosial seperti sekarang.</p>\r\n<p>Gagasan inti dari bacaan di atas adalah ...</p>', 'white.png', 'hubungan ritual pengorbanan manusia dengan pembentukan kelas sosial.', 'fungsi ritual pengorbanan manusia pada budaya Austronesia.', 'pengorbanan manusia dari tingkat sosial rendah.', 'kekuasaan kelas sosial tinggi terhadap kelas sosial rendah.', 'Pengujian &ldquo;hipotesis kontrol sosial&rdquo; pada ritual pengorbanan manusia.', 0, 'A'),
(17, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 17, '<p>&nbsp; &nbsp; &nbsp;(1) Para peneliti telah menemukan bahwa ritual pengorbanan manusia memainkan peran dalam evolusi masyarakat modern yang kompleks. (2) Dalam studi yang diterbitkan di jurnal Nature disebutkan bahwa ritual pengorbanan manusia mungkin telah membantu mendorong pembentukan dan pemertahanan hierarki sosial. (3) Bukti arkeologis menunjukkan bahwa pengorbanan manusia menjadi dalam budaya Afrika, Amerika, Arab, Austronesia, Cina, Jerman, Inuit, Turki, dan Jepang.</p>\r\n<p>&nbsp; &nbsp; &nbsp;(4) Menurut &ldquo;hipotesis kontrol sosial&rdquo;, pengorbanan manusia memberikan pembenaran supernatural kepada otoritas tertinggi untuk mengambil kehidupan kaum kelas bawah. (5) Dalam hal ini, stratifikasi sosial mungkin menjadi salah satu bentuk awal kepemimpinan dan kemudian mengarah pada bentuk kerajaan, monarki, dan pemerintah. (6) Hipotesis tersebutlah yang diujikan dalam sebuah penelitian yang dipimpin oleh Joseph Watts dari University of Auckland terhadap 93 budaya Austronesia tradisional.</p>\r\n<p>&nbsp; &nbsp; &nbsp;(7) Watts mengatakan bahwa pelanggaran hukum, pemakaman seorang pemimpin, dan peresmian rumah atau perahu baru menjadi momen untuk pengorbanan manusia. (8) Korban biasanya berasal dari status sosial yang rendah, misalnya budak, namun penggagas pengorbanan berasal dari status sosial yang tinggi, seperti kepala suku. (9) Metode pengorbanannya bermacam-macam: pembakaran, penenggelaman, pencekikan, pemukulan, dan pemenggalan. (10) Hasil temuan Watts dan timnya menunjukkan bahwa ritual pengorbanan membantu manusia bertransisi dari kelompok egaliter kecil, seperti nenek moyang kita dulu, menjadi masyarakat dengan banyak tingkatan sosial seperti sekarang.</p>\r\n<p>Kata <em>penggagas</em> dalam kalimat (8) pada bacaan di atas bermakna ...</p>', 'white.png', 'pelaku.', 'pelaksana.', 'pemrakarsa.', 'pembunuh.', 'pengusul.', 0, 'C'),
(18, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 18, '<p>&nbsp; &nbsp; &nbsp;(1) Para peneliti telah menemukan bahwa ritual pengorbanan manusia memainkan peran dalam evolusi masyarakat modern yang kompleks. (2) Dalam studi yang diterbitkan di jurnal Nature disebutkan bahwa ritual pengorbanan manusia mungkin telah membantu mendorong pembentukan dan pemertahanan hierarki sosial. (3) Bukti arkeologis menunjukkan bahwa pengorbanan manusia menjadi dalam budaya Afrika, Amerika, Arab, Austronesia, Cina, Jerman, Inuit, Turki, dan Jepang.</p>\r\n<p>&nbsp; &nbsp; &nbsp;(4) Menurut &ldquo;hipotesis kontrol sosial&rdquo;, pengorbanan manusia memberikan pembenaran supernatural kepada otoritas tertinggi untuk mengambil kehidupan kaum kelas bawah. (5) Dalam hal ini, stratifikasi sosial mungkin menjadi salah satu bentuk awal kepemimpinan dan kemudian mengarah pada bentuk kerajaan, monarki, dan pemerintah. (6) Hipotesis tersebutlah yang diujikan dalam sebuah penelitian yang dipimpin oleh Joseph Watts dari University of Auckland terhadap 93 budaya Austronesia tradisional.</p>\r\n<p>&nbsp; &nbsp; &nbsp;(7) Watts mengatakan bahwa pelanggaran hukum, pemakaman seorang pemimpin, dan peresmian rumah atau perahu baru menjadi momen untuk pengorbanan manusia. (8) Korban biasanya berasal dari status sosial yang rendah, misalnya budak, namun penggagas pengorbanan berasal dari status sosial yang tinggi, seperti kepala suku. (9) Metode pengorbanannya bermacam-macam: pembakaran, penenggelaman, pencekikan, pemukulan, dan pemenggalan. (10) Hasil temuan Watts dan timnya menunjukkan bahwa ritual pengorbanan membantu manusia bertransisi dari kelompok egaliter kecil, seperti nenek moyang kita dulu, menjadi masyarakat dengan banyak tingkatan sosial seperti sekarang.</p>\r\n<p>Kalimat (8) kurang efektif. Kalimat tersebut dapat diganti dengan ...</p>', 'white.png', '<p>Korban biasanya berasal dari status sosial yang rendah, misalnya budak, dan penggagas pengorbanan berasal dari status sosial yang tinggi, seperti kepala suku.</p>', '<p>Korban biasanya berasal dari status sosial yang rendah, misalnya budak, sedangkan penggagas pengorbanan berasal dari status sosial yang tinggi, seperti kepala suku.</p>', '<p>Korban biasanya berasal dari status sosial yang rendah, misalnya budak, tetapi penggagas pengorbanan berasal dari status sosial yang tinggi, seperti kepala suku.</p>', '<p>Korban biasanya berasal dari status sosial yang rendah, misalnya budak, namun yang menggagas pengorbanan berasal dari status sosial yang tinggi, seperti kepala suku.</p>', '<p>Korban biasanya berasal dari status sosial yang rendah, misalnya budak, karena penggagas pengorbanan berasal dari status sosial yang tinggi, seperti kepala suku.</p>', 0, 'C'),
(19, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 19, '<p>&nbsp; &nbsp; &nbsp;(1) Para peneliti telah menemukan bahwa ritual pengorbanan manusia memainkan peran dalam evolusi masyarakat modern yang kompleks. (2) Dalam studi yang diterbitkan di jurnal Nature disebutkan bahwa ritual pengorbanan manusia mungkin telah membantu mendorong pembentukan dan pemertahanan hierarki sosial. (3) Bukti arkeologis menunjukkan bahwa pengorbanan manusia menjadi dalam budaya Afrika, Amerika, Arab, Austronesia, Cina, Jerman, Inuit, Turki, dan Jepang.</p>\r\n<p>&nbsp; &nbsp; &nbsp;(4) Menurut &ldquo;hipotesis kontrol sosial&rdquo;, pengorbanan manusia memberikan pembenaran supernatural kepada otoritas tertinggi untuk mengambil kehidupan kaum kelas bawah. (5) Dalam hal ini, stratifikasi sosial mungkin menjadi salah satu bentuk awal kepemimpinan dan kemudian mengarah pada bentuk kerajaan, monarki, dan pemerintah. (6) Hipotesis tersebutlah yang diujikan dalam sebuah penelitian yang dipimpin oleh Joseph Watts dari University of Auckland terhadap 93 budaya Austronesia tradisional.</p>\r\n<p>&nbsp; &nbsp; &nbsp;(7) Watts mengatakan bahwa pelanggaran hukum, pemakaman seorang pemimpin, dan peresmian rumah atau perahu baru menjadi momen untuk pengorbanan manusia. (8) Korban biasanya berasal dari status sosial yang rendah, misalnya budak, namun penggagas pengorbanan berasal dari status sosial yang tinggi, seperti kepala suku. (9) Metode pengorbanannya bermacam-macam: pembakaran, penenggelaman, pencekikan, pemukulan, dan pemenggalan. (10) Hasil temuan Watts dan timnya menunjukkan bahwa ritual pengorbanan membantu manusia bertransisi dari kelompok egaliter kecil, seperti nenek moyang kita dulu, menjadi masyarakat dengan banyak tingkatan sosial seperti sekarang.</p>\r\n<p>Kata <em><strong>itu</strong></em> pada kalimat (5) merujuk pada ...</p>', 'white.png', 'hipotesis kontrol sosial.', 'pembenaran terhadap otoritas.', 'kehidupan kaum kelas bawah.', 'pengorbanan manusia.', 'stratifikasi sosial.', 0, 'A'),
(20, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 20, '<p>&nbsp; &nbsp; &nbsp;(1) Para peneliti telah menemukan bahwa ritual pengorbanan manusia memainkan peran dalam evolusi masyarakat modern yang kompleks. (2) Dalam studi yang diterbitkan di jurnal Nature disebutkan bahwa ritual pengorbanan manusia mungkin telah membantu mendorong pembentukan dan pemertahanan hierarki sosial. (3) Bukti arkeologis menunjukkan bahwa pengorbanan manusia menjadi dalam budaya Afrika, Amerika, Arab, Austronesia, Cina, Jerman, Inuit, Turki, dan Jepang.</p>\r\n<p>&nbsp; &nbsp; &nbsp;(4) Menurut &ldquo;hipotesis kontrol sosial&rdquo;, pengorbanan manusia memberikan pembenaran supernatural kepada otoritas tertinggi untuk mengambil kehidupan kaum kelas bawah. (5) Dalam hal ini, stratifikasi sosial mungkin menjadi salah satu bentuk awal kepemimpinan dan kemudian mengarah pada bentuk kerajaan, monarki, dan pemerintah. (6) Hipotesis tersebutlah yang diujikan dalam sebuah penelitian yang dipimpin oleh Joseph Watts dari University of Auckland terhadap 93 budaya Austronesia tradisional.</p>\r\n<p>&nbsp; &nbsp; &nbsp;(7) Watts mengatakan bahwa pelanggaran hukum, pemakaman seorang pemimpin, dan peresmian rumah atau perahu baru menjadi momen untuk pengorbanan manusia. (8) Korban biasanya berasal dari status sosial yang rendah, misalnya budak, namun penggagas pengorbanan berasal dari status sosial yang tinggi, seperti kepala suku. (9) Metode pengorbanannya bermacam-macam: pembakaran, penenggelaman, pencekikan, pemukulan, dan pemenggalan. (10) Hasil temuan Watts dan timnya menunjukkan bahwa ritual pengorbanan membantu manusia bertransisi dari kelompok egaliter kecil, seperti nenek moyang kita dulu, menjadi masyarakat dengan banyak tingkatan sosial seperti sekarang.</p>\r\n<p>Simpulan yang tepat untuk bacaan di atas adalah ...</p>', 'white.png', 'ritual pengorbanan manusia berkontribusi pada pembentukan strata sosial.', 'ritual pengorbanan manusia terjadi di berbagai budaya di dunia.', 'kehidupan kaum kelas bawah menjadi milik kelas atas melalui pengorbanan manusia.', 'kelas-kelas dalam masyarakat modern saat ini disebabkan oleh pengorbanan manusia.', '&ldquo;hipotesis kontrol sosial&rdquo; terbukti dengan penelitian tentang pengorbanan manusia.', 0, 'A'),
(21, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 21, '<p>Dalam dunia pendidikan pada masa kini menuntut guru sebagai fasilitator membuat anak dapat mengaplikasikan ilmu yang diperoleh di sekolah dalam kehidupan sehari-hari.</p>\r\n<p>Kalimat di atas tidak baku. Kalimat itu akan menjadi baku jika diperbaiki dengan cara ...</p>', 'white.png', 'mengubah kata menuntut menjadi dituntut', 'keterangannya diletakkan di akhir kalimat', 'menghilangkan kata dalam', 'menghilangkan kata dalam kehidupan sehari-hari', 'mengganti kata sebagai', 0, 'C'),
(22, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 22, '<p>(1) Kondisi ekonomi Indonesia saat ini cukup baik. (2) Hal ini dapat dilihat dari berbagai usaha, baik jasa maupun barang yang berkembang pesat. (3) Salah satunya adalah usaha minimarket yang merupakan bisnis usaha pelayanan. (4) Untuk usaha ini didirikan di daerah yang jauh dari keramaian kota. (5) Fasilitas ini banyak membantu masyarakat dalam mencukupi kebutuhan sehari-hari, seperti sembako dan peralatan rumah tangga, sehingga proses distribusi barang dari produsen ke konsumen semakin mudah.</p>\r\n<p>Dalam alinea tersebut terdapat kalimat yang strukturnya salah. Kalimat yang dimaksud adalah ...</p>', 'white.png', 'kalimat (1)', 'kalimat (2)', 'kalimat (3)', 'kalimat (4)', 'kalimat (5)', 0, 'D'),
(23, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 23, '<p>Penulisan bilangan dengan huruf yang tepat ditemukan dalam kalimat-kalimat berikut, kecuali ...</p>', 'white.png', 'Empat puluh saham yang dibeli perusahaan konglomerat itu merupakan saham dengan IHSG yang stabil selama ini.', 'Seorang narasumber mengatakan ada sekitar dua ratus empat puluh bangunan di kawasan kota lama dengan tidak lebih dari dua ratus telah dimanfaatkan.', 'Berbeda dengan tiga tahun yang lalu, dua tahun terakhir ini kondisi perdagangan produk bahari meningkat.', 'Sementara itu, dua orang awak hilang setelah perahu kecil yang mereka tumpangi terbalik diterjang gelombang.', 'Sejumlah lima persen mahasiswa berindeks prestasi terbaik mendapat beasiswa sepanjang studi.', 0, 'B'),
(24, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 24, '<p>Karena keluarga menjadi korban bencana gempa dan tsunami, maka mereka menjadi sangat menderita.</p>\r\n<p>Kalimat tersebut termasuk dalam kalimat tidak baku seperti kalimat-kalimat berikut, kecuali ...</p>', 'white.png', 'Walaupun sumbangan datang dari berbagai negara, tetapi rakyat Aceh masih tetap menderita.', 'Untuk keperluan biaya pembangunan, Aceh memerlukan bantuan berbagai pihak.', 'Dalam rapat tersebut membahas tentang bagaimana membangun Aceh kembali.', 'Kami sangat berduka melihat anak-anak menjadi korban bencana itu, maka jika diizinkan kami ingin menjadi orang tua asuh.', 'Karena sudah banyak orang yang memberikan bantuan sehingga kini mereka tidak perlu gelisah dan merasa takut lagi.', 0, 'B'),
(25, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 25, '<p>Negara Indonesia dengan wilayah yang begitu luas, mulai dari Sabang sampai Merauke, memiliki begitu banyak objek wisata yang dapat dijadikan modal untuk menarik wisatawan mancanegara maupun wisatawan domestik yang dapat menghasilkan devisa untuk membantu perekonomian Indonesia yang sedang mengalami krisis multidimensial.</p>\r\n<p>Kalimat panjang tersebut merupakan perluasan dari kalimat inti ...</p>', 'white.png', 'Negara Indonesia memiliki wilayah yang begitu luas.', 'Negara Indonesia dapat dijadikan modal untuk menarik wisatawan.', 'Negara Indonesia memiliki banyak objek wisata.', 'Objek wisata di Indonesia dapat menarik wisatawan yang menghasilkan devisa.', 'Objek wisata di Indonesia dapat menghasilkan devisa.', 0, 'C'),
(26, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 26, '<p>Sudah cukup lama ayahnya meninggal dunia. Warga di desanya masih mengingat jasa-jasanya. Selain taat menjalankan ibadah, ayahnya sangat dermawan. Meskipun ayahnya termasuk orang berada, ia tetap rendah hati dan sangat peduli dengan kehidupan orang lain, terutama orang-orang yang berada di sekitarnya. Tak pernah sekali pun ayahnya alpa jika ada kegiatan sosial di desanya.</p>\r\n<p>Peribahasa yang sesuai dengan gambaran situasi di atas adalah ...</p>', 'white.png', 'Karena nila setitik, rusak susu sebelanga.', 'Hancur badan dikandung tanah, budi baik dikenang jua.', 'Buruk muka, cermin dibelah.', 'Bunga yang harum itu ada juga durinya.', 'Belakang parang pun kalau diasah pasti tajam juga.', 0, 'B'),
(27, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 27, '<p>Sentimen negatif di antara para pelaku bursa turut mewarnai kondisi pasar modal regional. Sentimen negatif terlihat sejak perdagangan dimulai. Sikap yang tidak menguntungkan pelaku pasar ini sangat memperburuk kondisi perdagangan di pasar modal tersebut. Hal ini berakibat pada turunnya indeks harga saham gabungan, bahkan sampai level penutupan pun tidak bisa mencapai level normal.</p>\r\n<p>Paragraf di atas akan menjadi paragraf yang baik jika direvisi dengan cara sebagai berikut ...</p>', 'white.png', 'di antara (kalimat 1) diganti oleh', 'terlihat (kalimat 2) diganti tampak', 'sangat (kalimat 3) dihilangkan', 'bahkan (kalimat 4) diganti sehingga', 'penutupan pun (kalimat 4) ditulis penutupanpun', 0, 'C'),
(28, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 28, '<p>Kalimat berikut yang termasuk kalimat baku adalah ...</p>', 'white.png', 'Ia menceritakan tentang peristiwa kepada teman-temannya.', 'Surat itu memberitakan mengenai keadaan neneknya yang sedang sakit.', 'Kita harus saling percaya akan kemampuan orang lain, tidak boleh saling curiga.', 'Kita harus dapat melawan hawa nafsu yang dapat menjerumuskan ke lembah kehinaan.', 'Demi untuk mempertahankan semangat korps, kita tidak boleh saling menghujat.', 0, 'D'),
(29, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 29, '<p>Feri berpenumpang 1.318 orang milik pengusaha Mesir tenggelam saat berlayar dari Dubai menuju Safaga yang berjarak 193 kilometer.</p>\r\n<p>Ide terpenting yang perlu diperhatikan saat membaca kalimat tersebut adalah ...</p>', 'white.png', 'Feri berlayar dari Dubai menuju Safaga.', 'Feri berpenumpang 1.318 orang dan milik pengusaha Mesir.', 'Dubai berjarak 193 kilometer.', 'Feri tenggelam.', 'Feri tenggelam saat berlayar.', 0, 'D'),
(30, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'IND', 30, '<p>Kalimat-kalimat di bawah ini mempunyai pola kalimat sama, kecuali ...</p>', 'white.png', 'Anton menarik lengan saya seraya menunjuk ke sebuah mobil VW yang sedang diperbaiki.', 'Peristiwa itu terjadi sewaktu keluargaku sedang dalam suasana berkabung.', 'Aku lebih bergembira sejak sikap ibu padaku berubah.', 'Ia baru kembali ke desa setelah biaya untuk melanjutkan sekolahnya tidak ada.', 'Aku melompat dari anak tangga dan kemudian berlari ke halaman.', 0, 'E'),
(31, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 31, '<p>&nbsp; &nbsp; Plastic bags are often thought as free, no-brainer solutions to carry your groceries of to use as trashcan liners. However, research has shown that as a consequence of carefree usage of plastic bags millions of tons of plastic particles ... (31) ... in our seas each year. Reversing this trend and finding ways to maintain both the health of our oceans and the human benefits associated with it are complicated tasks. Most people appreciate and value the importance of the ocean and see marine litter as a global problem. ... (32) ..., the challenge is connecting the dots. So many of human behaviours and decisions contribute to this problem, but rarely are there attempts to link their impact to the environment. Behavioural science has been recognized as ... (33) ... to understand drivers of human behavior which support ongoing initiatives to clean up our environments. For instance, behavioural scientists have suggested that the public could become more ... (34) ... if powerful images were carried on everyday products, similar to that already being used on cigarette packaging.</p>\r\n<p>...</p>', 'white.png', 'accumulate', 'accumulator', 'accumulation', 'accumulating', 'accumulative', 0, 'A'),
(32, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 32, '<p>&nbsp; &nbsp; Plastic bags are often thought as free, no-brainer solutions to carry your groceries of to use as trashcan liners. However, research has shown that as a consequence of carefree usage of plastic bags millions of tons of plastic particles ... (31) ... in our seas each year. Reversing this trend and finding ways to maintain both the health of our oceans and the human benefits associated with it are complicated tasks. Most people appreciate and value the importance of the ocean and see marine litter as a global problem. ... (32) ..., the challenge is connecting the dots. So many of human behaviours and decisions contribute to this problem, but rarely are there attempts to link their impact to the environment. Behavioural science has been recognized as ... (33) ... to understand drivers of human behavior which support ongoing initiatives to clean up our environments. For instance, behavioural scientists have suggested that the public could become more ... (34) ... if powerful images were carried on everyday products, similar to that already being used on cigarette packaging.</p>\r\n<p>...</p>', 'white.png', 'Therefore', 'In contrast', 'Also', 'In other words', 'After that', 0, 'A'),
(33, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 33, '<p>&nbsp; &nbsp; Plastic bags are often thought as free, no-brainer solutions to carry your groceries of to use as trashcan liners. However, research has shown that as a consequence of carefree usage of plastic bags millions of tons of plastic particles ... (31) ... in our seas each year. Reversing this trend and finding ways to maintain both the health of our oceans and the human benefits associated with it are complicated tasks. Most people appreciate and value the importance of the ocean and see marine litter as a global problem. ... (32) ..., the challenge is connecting the dots. So many of human behaviours and decisions contribute to this problem, but rarely are there attempts to link their impact to the environment. Behavioural science has been recognized as ... (33) ... to understand drivers of human behavior which support ongoing initiatives to clean up our environments. For instance, behavioural scientists have suggested that the public could become more ... (34) ... if powerful images were carried on everyday products, similar to that already being used on cigarette packaging.</p>\r\n<p>...</p>', 'white.png', 'a gap', 'a cure', 'an advantage', 'an alternative', 'an impediment', 0, 'D'),
(34, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 34, '<p>&nbsp; &nbsp; Plastic bags are often thought as free, no-brainer solutions to carry your groceries of to use as trashcan liners. However, research has shown that as a consequence of carefree usage of plastic bags millions of tons of plastic particles ... (31) ... in our seas each year. Reversing this trend and finding ways to maintain both the health of our oceans and the human benefits associated with it are complicated tasks. Most people appreciate and value the importance of the ocean and see marine litter as a global problem. ... (32) ..., the challenge is connecting the dots. So many of human behaviours and decisions contribute to this problem, but rarely are there attempts to link their impact to the environment. Behavioural science has been recognized as ... (33) ... to understand drivers of human behavior which support ongoing initiatives to clean up our environments. For instance, behavioural scientists have suggested that the public could become more ... (34) ... if powerful images were carried on everyday products, similar to that already being used on cigarette packaging.</p>\r\n<p>...</p>', 'white.png', 'aware', 'elated', 'excited', 'optimistic', 'interested', 0, 'A'),
(35, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 35, '<p>&nbsp; &nbsp; &nbsp; Strategic flooding is a highly risky tactic. It can only be successful if there&rsquo;s well-thought-out backup plan and a plan for fast repairs. Floods can result in loss of life and damage homes and businesses, and when the water remains inland for a long time, it can change the landscape through erosion and deposition, forming new tidal channels and creeks.</p>\r\n<p>&nbsp; &nbsp; &nbsp; During the Eighty Years War, as the Spanish army fought to recapture territory in what is now northern Belgium and southwestern Netherlands in the late sixteenth century, the Dutch rebels led by William of Orange decided to use the low-lying, flood-prone landscape to their advantage. In an attempt to liberate Bruges, Ghent and Antwerp from Spanish dominance and defend their territory, the rebels destroyed seawalls at strategic places from 1584 to 1586 to cause deliberate, large-scale floods.</p>\r\n<p>&nbsp; &nbsp; &nbsp; The area flooded during the Eighty Years War became part of a strategic line of defense and remained inundated for more than 100 years in some places, with profound consequences for the landscapes. The plan go completely out of hand, and it came at the expense of the countryside of northern Flanders, now Zealand Flanders.</p>\r\n<p>&nbsp; &nbsp; &nbsp; After the waters receded, a thick layer of clay covered all remnants of buildings and roads in the area. As sea water was used, soil salinity increased, affecting agricultural yields, being as damaging as floods caused by heavy rainfall or storm surges.</p>\r\n<p>According to the text, which of the following statements is FALSE ... ?</p>', 'white.png', 'Agriculture crops are disturbed because of the rise of soil salinity brought by sea water.', 'The Dutch utilized the landscape which was easily flooded to beat the Spanish.', 'Fast restoration was one of the ways to ensure the success of strategic flooding.', 'Three cities were affected by the flood strategy used by the Dutch.', 'Erosion caused by floods will alter the landscape.', 0, 'C'),
(36, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 36, '<p>&nbsp; &nbsp; &nbsp; Strategic flooding is a highly risky tactic. It can only be successful if there&rsquo;s well-thought-out backup plan and a plan for fast repairs. Floods can result in loss of life and damage homes and businesses, and when the water remains inland for a long time, it can change the landscape through erosion and deposition, forming new tidal channels and creeks.</p>\r\n<p>&nbsp; &nbsp; &nbsp; During the Eighty Years War, as the Spanish army fought to recapture territory in what is now northern Belgium and southwestern Netherlands in the late sixteenth century, the Dutch rebels led by William of Orange decided to use the low-lying, flood-prone landscape to their advantage. In an attempt to liberate Bruges, Ghent and Antwerp from Spanish dominance and defend their territory, the rebels destroyed seawalls at strategic places from 1584 to 1586 to cause deliberate, large-scale floods.</p>\r\n<p>&nbsp; &nbsp; &nbsp; The area flooded during the Eighty Years War became part of a strategic line of defense and remained inundated for more than 100 years in some places, with profound consequences for the landscapes. The plan go completely out of hand, and it came at the expense of the countryside of northern Flanders, now Zealand Flanders.</p>\r\n<p>&nbsp; &nbsp; &nbsp; After the waters receded, a thick layer of clay covered all remnants of buildings and roads in the area. As sea water was used, soil salinity increased, affecting agricultural yields, being as damaging as floods caused by heavy rainfall or storm surges.</p>\r\n<p>What is the author&rsquo;s purpose in writing this text ... ?</p>', 'white.png', 'To raise questions about the advantages of using strategic flooding.', 'To provide practical information on disaster management.', 'To present new research findings on security and defense.', 'To share a word of advice for successful strategic flooding.', 'To argue for certain lines of action on flood control.', 0, 'B'),
(37, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 37, '<p>&nbsp; &nbsp; &nbsp; Strategic flooding is a highly risky tactic. It can only be successful if there&rsquo;s well-thought-out backup plan and a plan for fast repairs. Floods can result in loss of life and damage homes and businesses, and when the water remains inland for a long time, it can change the landscape through erosion and deposition, forming new tidal channels and creeks.</p>\r\n<p>&nbsp; &nbsp; &nbsp; During the Eighty Years War, as the Spanish army fought to recapture territory in what is now northern Belgium and southwestern Netherlands in the late sixteenth century, the Dutch rebels led by William of Orange decided to use the low-lying, flood-prone landscape to their advantage. In an attempt to liberate Bruges, Ghent and Antwerp from Spanish dominance and defend their territory, the rebels destroyed seawalls at strategic places from 1584 to 1586 to cause deliberate, large-scale floods.</p>\r\n<p>&nbsp; &nbsp; &nbsp; The area flooded during the Eighty Years War became part of a strategic line of defense and remained inundated for more than 100 years in some places, with profound consequences for the landscapes. The plan go completely out of hand, and it came at the expense of the countryside of northern Flanders, now Zealand Flanders.</p>\r\n<p>&nbsp; &nbsp; &nbsp; After the waters receded, a thick layer of clay covered all remnants of buildings and roads in the area. As sea water was used, soil salinity increased, affecting agricultural yields, being as damaging as floods caused by heavy rainfall or storm surges.</p>\r\n<p>This passage would probably be assigned reading in which of the following course... ?</p>', 'white.png', 'Disaster management', 'Defense and security', 'Risk management', 'Geography', 'Geology', 0, 'C'),
(38, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 38, '<p>&nbsp; &nbsp; &nbsp; Strategic flooding is a highly risky tactic. It can only be successful if there&rsquo;s well-thought-out backup plan and a plan for fast repairs. Floods can result in loss of life and damage homes and businesses, and when the water remains inland for a long time, it can change the landscape through erosion and deposition, forming new tidal channels and creeks.</p>\r\n<p>&nbsp; &nbsp; &nbsp; During the Eighty Years War, as the Spanish army fought to recapture territory in what is now northern Belgium and southwestern Netherlands in the late sixteenth century, the Dutch rebels led by William of Orange decided to use the low-lying, flood-prone landscape to their advantage. In an attempt to liberate Bruges, Ghent and Antwerp from Spanish dominance and defend their territory, the rebels destroyed seawalls at strategic places from 1584 to 1586 to cause deliberate, large-scale floods.</p>\r\n<p>&nbsp; &nbsp; &nbsp; The area flooded during the Eighty Years War became part of a strategic line of defense and remained inundated for more than 100 years in some places, with profound consequences for the landscapes. The plan go completely out of hand, and it came at the expense of the countryside of northern Flanders, now Zealand Flanders.</p>\r\n<p>&nbsp; &nbsp; &nbsp; After the waters receded, a thick layer of clay covered all remnants of buildings and roads in the area. As sea water was used, soil salinity increased, affecting agricultural yields, being as damaging as floods caused by heavy rainfall or storm surges.</p>\r\n<p>What inference can you make about strategic flooding ... ?</p>', 'white.png', 'The impact caused by strategic flooding is more manageable than floods by natural causes.', 'When carried out without careful planning, it puts a strain on an area&rsquo;s food supply', 'It is a strategy fraught with danger but worth the risks.', 'It is one of the most important Dutch inventions.', 'It causes high levels of soil salinity.', 0, 'E'),
(39, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 39, '<p>&nbsp; &nbsp; &nbsp; Strategic flooding is a highly risky tactic. It can only be successful if there&rsquo;s well-thought-out backup plan and a plan for fast repairs. Floods can result in loss of life and damage homes and businesses, and when the water remains inland for a long time, it can change the landscape through erosion and deposition, forming new tidal channels and creeks.</p>\r\n<p>&nbsp; &nbsp; &nbsp; During the Eighty Years War, as the Spanish army fought to recapture territory in what is now northern Belgium and southwestern Netherlands in the late sixteenth century, the Dutch rebels led by William of Orange decided to use the low-lying, flood-prone landscape to their advantage. In an attempt to liberate Bruges, Ghent and Antwerp from Spanish dominance and defend their territory, the rebels destroyed seawalls at strategic places from 1584 to 1586 to cause deliberate, large-scale floods.</p>\r\n<p>&nbsp; &nbsp; &nbsp; The area flooded during the Eighty Years War became part of a strategic line of defense and remained inundated for more than 100 years in some places, with profound consequences for the landscapes. The plan go completely out of hand, and it came at the expense of the countryside of northern Flanders, now Zealand Flanders.</p>\r\n<p>&nbsp; &nbsp; &nbsp; After the waters receded, a thick layer of clay covered all remnants of buildings and roads in the area. As sea water was used, soil salinity increased, affecting agricultural yields, being as damaging as floods caused by heavy rainfall or storm surges.</p>\r\n<p>The tone of the author is best described as ... ?</p>', 'white.png', 'Sympathetic', 'Disastrous', 'Objective', 'Nostalgic', 'Upset', 0, 'B'),
(40, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 40, '<p>&nbsp; &nbsp; &nbsp; Forget what world leaders say. If you want to understand what they are really up to, look at the paintings that hang behind them at press conferences and summit meetings, or when they pause with <strong><em>apparent spontaneity</em></strong> along a corridor to answer a reporter&rsquo;s question. The silent stare of a poised portrait gazing at you over the shoulder of David Cameron or Vladimir Putin is often more loaded and more deliberately orchestrated than you might think.</p>\r\n<p>&nbsp; &nbsp; &nbsp; For example, President Obama&rsquo;s recent trip to Cuba in March 2016 was considered his boldest step. His controversial agenda was to reset diplomatic relations between the two nations. However, it was a painting by a Cuban artist that <strong>(42) ____</strong> the show. Among the more awkward events on Obama&rsquo;s Cuban itinerary was a meeting with a group of political dissidents, many of <strong>(43) ____</strong> fear the thawing of relations between Washington and Havana will only embolden the repressive tendencies of Cuban president Raul Castro by the legitimizing his regime. Enter Mitchel Mirabal, a contemporary Cuban artist whose sprawling painting My New Friend provided the striking backdrop to the meeting.</p>\r\n<p>&nbsp; &nbsp; &nbsp; The work stretched evocatively behind Obama as he sat at a long table to discuss the concerns of the Cuban government&rsquo;s detractors. It features side-by-side representations of the Cuban and US flags constructed loosely of red, white, and blue handprints<strong> (44) ____</strong>. As a subliminal symbol capable of capturing, on the one hand the plight of those oppressed by the Cuban government, and on the other hand, Obama&rsquo;s commitment to ending sanctions against Cuba, the painting <strong>(45) ____</strong>. The hasty blizzard of anonymous handprints has the feel of street art or something illicitly constructed: a compression of innocence that recalls the clay moulds made by children in kindergarten. At the same time, the two flags appear to be visual anagrams of each other. Each consists of the same handprints merely arranged in different combinations, as if subtly to imply that the two countries are essentially inseparable.</p>\r\n<p>The italic phrase in the first paragraph means ...</p>', 'white.png', 'possible gesture', 'genuine reaction', 'innocent impromptu', 'seeming naturalness', 'questionable motivation', 0, 'B'),
(41, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 41, '<p>&nbsp; &nbsp; &nbsp; Forget what world leaders say. If you want to understand what they are really up to, look at the paintings that hang behind them at press conferences and summit meetings, or when they pause with <strong><em>apparent spontaneity</em></strong> along a corridor to answer a reporter&rsquo;s question. The silent stare of a poised portrait gazing at you over the shoulder of David Cameron or Vladimir Putin is often more loaded and more deliberately orchestrated than you might think.</p>\r\n<p>&nbsp; &nbsp; &nbsp; For example, President Obama&rsquo;s recent trip to Cuba in March 2016 was considered his boldest step. His controversial agenda was to reset diplomatic relations between the two nations. However, it was a painting by a Cuban artist that <strong>(42) ____</strong> the show. Among the more awkward events on Obama&rsquo;s Cuban itinerary was a meeting with a group of political dissidents, many of <strong>(43) ____</strong> fear the thawing of relations between Washington and Havana will only embolden the repressive tendencies of Cuban president Raul Castro by the legitimizing his regime. Enter Mitchel Mirabal, a contemporary Cuban artist whose sprawling painting My New Friend provided the striking backdrop to the meeting.</p>\r\n<p>&nbsp; &nbsp; &nbsp; The work stretched evocatively behind Obama as he sat at a long table to discuss the concerns of the Cuban government&rsquo;s detractors. It features side-by-side representations of the Cuban and US flags constructed loosely of red, white, and blue handprints<strong> (44) ____</strong>. As a subliminal symbol capable of capturing, on the one hand the plight of those oppressed by the Cuban government, and on the other hand, Obama&rsquo;s commitment to ending sanctions against Cuba, the painting <strong>(45) ____</strong>. The hasty blizzard of anonymous handprints has the feel of street art or something illicitly constructed: a compression of innocence that recalls the clay moulds made by children in kindergarten. At the same time, the two flags appear to be visual anagrams of each other. Each consists of the same handprints merely arranged in different combinations, as if subtly to imply that the two countries are essentially inseparable.</p>\r\n<p>The sentence &ldquo;Often these subtle message are easy enough to decode,&rdquo; should be ...</p>', 'white.png', 'the last sentence of paragraph 1', 'the last sentence of paragraph 2', 'the last sentence of paragraph 3', 'the third sentence of paragraph 3', 'the second sentence of paragraph 3', 0, 'A'),
(42, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 42, '<p>&nbsp; &nbsp; &nbsp; Forget what world leaders say. If you want to understand what they are really up to, look at the paintings that hang behind them at press conferences and summit meetings, or when they pause with <strong><em>apparent spontaneity</em></strong> along a corridor to answer a reporter&rsquo;s question. The silent stare of a poised portrait gazing at you over the shoulder of David Cameron or Vladimir Putin is often more loaded and more deliberately orchestrated than you might think.</p>\r\n<p>&nbsp; &nbsp; &nbsp; For example, President Obama&rsquo;s recent trip to Cuba in March 2016 was considered his boldest step. His controversial agenda was to reset diplomatic relations between the two nations. However, it was a painting by a Cuban artist that <strong>(42) ____</strong> the show. Among the more awkward events on Obama&rsquo;s Cuban itinerary was a meeting with a group of political dissidents, many of <strong>(43) ____</strong> fear the thawing of relations between Washington and Havana will only embolden the repressive tendencies of Cuban president Raul Castro by the legitimizing his regime. Enter Mitchel Mirabal, a contemporary Cuban artist whose sprawling painting My New Friend provided the striking backdrop to the meeting.</p>\r\n<p>&nbsp; &nbsp; &nbsp; The work stretched evocatively behind Obama as he sat at a long table to discuss the concerns of the Cuban government&rsquo;s detractors. It features side-by-side representations of the Cuban and US flags constructed loosely of red, white, and blue handprints<strong> (44) ____</strong>. As a subliminal symbol capable of capturing, on the one hand the plight of those oppressed by the Cuban government, and on the other hand, Obama&rsquo;s commitment to ending sanctions against Cuba, the painting <strong>(45) ____</strong>. The hasty blizzard of anonymous handprints has the feel of street art or something illicitly constructed: a compression of innocence that recalls the clay moulds made by children in kindergarten. At the same time, the two flags appear to be visual anagrams of each other. Each consists of the same handprints merely arranged in different combinations, as if subtly to imply that the two countries are essentially inseparable.</p>\r\n<p>(42) ...</p>', 'white.png', 'was stealing', 'had stolen', 'has stolen', 'steals', 'stole', 0, 'E'),
(43, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 43, '<p>&nbsp; &nbsp; &nbsp; Forget what world leaders say. If you want to understand what they are really up to, look at the paintings that hang behind them at press conferences and summit meetings, or when they pause with <strong><em>apparent spontaneity</em></strong> along a corridor to answer a reporter&rsquo;s question. The silent stare of a poised portrait gazing at you over the shoulder of David Cameron or Vladimir Putin is often more loaded and more deliberately orchestrated than you might think.</p>\r\n<p>&nbsp; &nbsp; &nbsp; For example, President Obama&rsquo;s recent trip to Cuba in March 2016 was considered his boldest step. His controversial agenda was to reset diplomatic relations between the two nations. However, it was a painting by a Cuban artist that <strong>(42) ____</strong> the show. Among the more awkward events on Obama&rsquo;s Cuban itinerary was a meeting with a group of political dissidents, many of <strong>(43) ____</strong> fear the thawing of relations between Washington and Havana will only embolden the repressive tendencies of Cuban president Raul Castro by the legitimizing his regime. Enter Mitchel Mirabal, a contemporary Cuban artist whose sprawling painting My New Friend provided the striking backdrop to the meeting.</p>\r\n<p>&nbsp; &nbsp; &nbsp; The work stretched evocatively behind Obama as he sat at a long table to discuss the concerns of the Cuban government&rsquo;s detractors. It features side-by-side representations of the Cuban and US flags constructed loosely of red, white, and blue handprints<strong> (44) ____</strong>. As a subliminal symbol capable of capturing, on the one hand the plight of those oppressed by the Cuban government, and on the other hand, Obama&rsquo;s commitment to ending sanctions against Cuba, the painting <strong>(45) ____</strong>. The hasty blizzard of anonymous handprints has the feel of street art or something illicitly constructed: a compression of innocence that recalls the clay moulds made by children in kindergarten. At the same time, the two flags appear to be visual anagrams of each other. Each consists of the same handprints merely arranged in different combinations, as if subtly to imply that the two countries are essentially inseparable.</p>\r\n<p>(43) ...</p>', 'white.png', 'whose', 'which', 'whom', 'who', 'those', 0, 'C'),
(44, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 44, '<p>&nbsp; &nbsp; &nbsp; Forget what world leaders say. If you want to understand what they are really up to, look at the paintings that hang behind them at press conferences and summit meetings, or when they pause with <strong><em>apparent spontaneity</em></strong> along a corridor to answer a reporter&rsquo;s question. The silent stare of a poised portrait gazing at you over the shoulder of David Cameron or Vladimir Putin is often more loaded and more deliberately orchestrated than you might think.</p>\r\n<p>&nbsp; &nbsp; &nbsp; For example, President Obama&rsquo;s recent trip to Cuba in March 2016 was considered his boldest step. His controversial agenda was to reset diplomatic relations between the two nations. However, it was a painting by a Cuban artist that <strong>(42) ____</strong> the show. Among the more awkward events on Obama&rsquo;s Cuban itinerary was a meeting with a group of political dissidents, many of <strong>(43) ____</strong> fear the thawing of relations between Washington and Havana will only embolden the repressive tendencies of Cuban president Raul Castro by the legitimizing his regime. Enter Mitchel Mirabal, a contemporary Cuban artist whose sprawling painting My New Friend provided the striking backdrop to the meeting.</p>\r\n<p>&nbsp; &nbsp; &nbsp; The work stretched evocatively behind Obama as he sat at a long table to discuss the concerns of the Cuban government&rsquo;s detractors. It features side-by-side representations of the Cuban and US flags constructed loosely of red, white, and blue handprints<strong> (44) ____</strong>. As a subliminal symbol capable of capturing, on the one hand the plight of those oppressed by the Cuban government, and on the other hand, Obama&rsquo;s commitment to ending sanctions against Cuba, the painting <strong>(45) ____</strong>. The hasty blizzard of anonymous handprints has the feel of street art or something illicitly constructed: a compression of innocence that recalls the clay moulds made by children in kindergarten. At the same time, the two flags appear to be visual anagrams of each other. Each consists of the same handprints merely arranged in different combinations, as if subtly to imply that the two countries are essentially inseparable.</p>\r\n<p>(44) ...</p>', 'white.png', 'field pressed against a neutral grey', 'field against a pressed neutral grey', 'against a pressed neutral grey field', 'pressed against a neutral grey field', 'a neutral grey against pressed field', 0, 'D'),
(45, 'TKD', 'Kemampuan Dasar', 'SIMAK UI', 'ING', 45, '<p>&nbsp; &nbsp; &nbsp; Forget what world leaders say. If you want to understand what they are really up to, look at the paintings that hang behind them at press conferences and summit meetings, or when they pause with <strong><em>apparent spontaneity</em></strong> along a corridor to answer a reporter&rsquo;s question. The silent stare of a poised portrait gazing at you over the shoulder of David Cameron or Vladimir Putin is often more loaded and more deliberately orchestrated than you might think.</p>\r\n<p>&nbsp; &nbsp; &nbsp; For example, President Obama&rsquo;s recent trip to Cuba in March 2016 was considered his boldest step. His controversial agenda was to reset diplomatic relations between the two nations. However, it was a painting by a Cuban artist that <strong>(42) ____</strong> the show. Among the more awkward events on Obama&rsquo;s Cuban itinerary was a meeting with a group of political dissidents, many of <strong>(43) ____</strong> fear the thawing of relations between Washington and Havana will only embolden the repressive tendencies of Cuban president Raul Castro by the legitimizing his regime. Enter Mitchel Mirabal, a contemporary Cuban artist whose sprawling painting My New Friend provided the striking backdrop to the meeting.</p>\r\n<p>&nbsp; &nbsp; &nbsp; The work stretched evocatively behind Obama as he sat at a long table to discuss the concerns of the Cuban government&rsquo;s detractors. It features side-by-side representations of the Cuban and US flags constructed loosely of red, white, and blue handprints<strong> (44) ____</strong>. As a subliminal symbol capable of capturing, on the one hand the plight of those oppressed by the Cuban government, and on the other hand, Obama&rsquo;s commitment to ending sanctions against Cuba, the painting <strong>(45) ____</strong>. The hasty blizzard of anonymous handprints has the feel of street art or something illicitly constructed: a compression of innocence that recalls the clay moulds made by children in kindergarten. At the same time, the two flags appear to be visual anagrams of each other. Each consists of the same handprints merely arranged in different combinations, as if subtly to imply that the two countries are essentially inseparable.</p>\r\n<p>(45) ...</p>', 'white.png', 'hardly have evoked different interpretations', 'hardly have been more cleverly chosen', 'have been something of a signal', 'not have been less appropriate', 'have sent the wrong message', 0, 'B');
INSERT INTO `soal` (`id`, `code`, `subject`, `degree`, `specialization`, `number`, `description`, `fileimage`, `optionA`, `optionB`, `optionC`, `optionD`, `optionE`, `flagOption`, `answer`) VALUES
(46, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 1, '', 'TKA_MTK_1.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'E'),
(47, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 2, '', 'TKA_MTK_2.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'C'),
(48, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 3, '', 'TKA_MTK_3.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'E'),
(49, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 4, '', 'TKA_MTK_4.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'A'),
(50, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 5, '', 'TKA_MTK_5.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'D'),
(51, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 6, '', 'TKA_MTK_6.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'D'),
(52, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 7, '', 'TKA_MTK_7.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'E'),
(53, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 8, '', 'TKA_MTK_8.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'D'),
(54, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 9, '', 'TKA_MTK_9.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'A'),
(55, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 10, '', 'TKA_MTK_10.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'C'),
(56, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 11, '', 'TKA_MTK_11.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'B'),
(57, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 12, '', 'TKA_MTK_12.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'A'),
(58, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 13, '', 'TKA_MTK_13.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'D'),
(59, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 14, '', 'TKA_MTK_14.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'B'),
(60, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'MTK', 15, '', 'TKA_MTK_15.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'A'),
(61, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 16, '<p><em>Paramaecium</em> yang hidup di perairan air tawar mengalami mekanisme osmosis antara sel dan lingkungannya yang bersifat hipotonik. Suatu sel yang berada pada lingkungan hipotonik akan mengalami lisis atau pecah.</p>\r\n<p>Untuk menghadapi kondisi di atas, sel <em>Paramaecium</em> dilengkapi dengan organel yang berperan dalam osmoregulasi adalah ...</p>', 'white.png', 'vakuola kontraktil.', 'membran inti.', 'plasmodesmata.', 'vakuola makanan.', 'plasmagel.', 0, '-'),
(62, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 17, '<p>Ciri-ciri yang menyebabkan Fungi dikelompokkan sebagai satu kingdom khusus adalah ...<br />I. Jamur tidak memiliki klorofil.<br />II. Jamur dapat berkembang biak secara generatif maupun vegetatif.<br />III. Jamur berkembang biak dengan spora.<br />IV. Jamur termasuk organisme heterotrof.<br />V. Bagian tubuh jamur tidak dapat dibedakan antara akar, batang, dan daun.</p>', 'white.png', 'I dan III.', 'I dan IV.', 'I, II, dan III.', 'II, III, dan IV.', 'II, IV, dan V.', 0, '-'),
(63, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 18, '', 'TKA_BIO_18.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, '-'),
(64, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 19, '', 'TKA_BIO_19.jpg', 'ditemukan di organ daun tumbuhan dikotil.', 'termasuk tumbuhan xerofit.', 'bagian yang ditunjuk anak panah adalah aerenkim.', 'aerenkim merupakan modifikasi parenkima untuk menyimpan\r\nudara.', 'jaringan mesofil dapat dibedakan menjadi palisade dan spons.', 0, '-'),
(65, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 20, '', 'TKA_BIO_20.jpg', 'penghantar impuls ke efektor.', 'reseptor terhadap rangsangan.', 'penghubung antarsel saraf.', 'tempat terjadinya loncatan impuls menuju sel saraf berikutnya.', 'penghantar impuls di seluruh tubuh.', 0, '-'),
(66, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 21, '<p>Suara <em>&ldquo;lup-dup&rdquo;</em> dari jantung yang terdengar selama pengukuran tekanan darah disebabkan oleh ...</p>', 'white.png', 'relaksasi otot-otot jantung.', 'kontraksi otot-otot jantung.', 'aliran turbulen darah melalui vena cava dan aorta.', 'katup-katup jantung yang membuka.', 'katup-katup jantung yang menutup.', 0, '-'),
(67, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 22, '<p>Sebuah semaian tanaman berkecambah dalam tanah yang tertutup oleh batu. Saat mendorong rintangan tersebut, stres pada ujung tanaman memicu sintesis suatu hormon. Hormon tersebut akan memicu pertumbuhan yang disebut &ldquo;respon rangkap-tiga&rdquo;, di mana kecambah akan mengalami perlambatan pemanjangan batang, penebalan batang sehingga lebih kuat, dan penekukan sehingga<br />batang tumbuh mendatar.</p>\r\n<p>Hormon yang dimaksud adalah ...</p>', 'white.png', 'auksin.', 'sitokinin.', 'giberelin.', 'etilen.', 'asam abisat.', 0, '-'),
(68, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 23, '<p>Hasil pembelahan meiosis II pada spermatogenesis adalah ...</p>', 'white.png', 'spermatozoa.', 'spermatid.', 'spermatosit sekunder.', 'spermatosit primer.', 'spermatogonium.', 0, '-'),
(69, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 24, '<p>Di antara alat dan bahan teknologi DNA rekombinan berikut ini yang <strong><em>tidak</em></strong> tepat dengan kegunaannya adalah ...</p>', 'white.png', 'enzim restriksi &ndash; memotong DNA.', 'reverse transkriptase &ndash; memproduksi mRNA atau dRNA dari DNA.', 'elektroforesis &ndash; memisahkan fragmen DNA.', 'DNA ligase &ndash; menyambung fragmen DNA.', 'DNA polimerase &ndash; memperbanyak DNA.', 0, '-'),
(70, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 25, '<p>Sebelum kedatangan bangsa Eropa ke Amerika Utara, daerah tersebut merupakan habitat bagi jutaan ayam padang rumput <em>(Tympanuchus cupido)</em>. Akibat perusakan habitat dan perburuan liar, populasi<em> T. cupido</em> menurun drastis hingga rentan punah. Keanekaragaman genetik <em>T. cupido</em> ikut berkurang sehingga kesuksesan reproduktifnya pun menurun. Mekanisme evolusi yang memengaruhi kondisi populasi <em>T. cupido</em> adalah ...</p>', 'white.png', 'genetic flow.', 'genetic drift.', 'seleksi alam buatan.', 'munculnya mutasi.', 'perkawinan tidak acak.', 0, '-'),
(71, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 26, '<p>Proses fotorespirasi jarang terjadi pada tumbuhan jagung dan nanas</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>fiksasi CO2 oleh kedua tumbuhan tersebut berlangsung optimum pada malam hari.</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, '-'),
(72, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 27, '<p>Pada teknik<em> Southern blotting</em>, fragmen DNA yang digunakan bergantung pada ukuran DNA menggunakan prinsip kapilaritas</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>fragmen DNA bermuatan negatif sehingga dapat tertarik ke membran nitroselulosa yang bermuatan positif.</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, '-'),
(73, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 28, '<p>Dalam salah satu tahap katabolisme, pemecahan satu molekul glukosa menjadi dua molekul asam piruvat melepaskan energi dalam bentuk ATP dan NADH. Pernyataan di bawah ini yang menunjukkan ciri-ciri tahap yang dimaksud adalah ...</p>\r\n<p>(1) berlangsung di bagian sitoplasma sel.<br />(2) pembentukan ATP terjadi melalui mekanisme fosforilasi tingkat substrat.<br />(3) melibatkan berbagai jenis enzim spesifik untuk substrat tertentu.<br />(4) hanya dapat berlangsung jika tersedia oksigen.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, '-'),
(74, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 29, '<p>Meningkatnya volume rongga dada pada saat inspirasi dipengaruhi oleh faktor berikut ini, KECUALI &hellip;</p>\r\n<p>(1) diafragma menjadi cekung dan relaksasi.<br />(2) kontraksi otot tulang rusuk eksternal.<br />(3) tulang rusuk turun ke posisi semula.<br />(4) tulang rusuk terangkat ke atas.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, '-'),
(75, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'BIO', 30, '<p>Kelompok Bryophyta memiliki ciri dan sifat berikut &hellip;</p>\r\n<p>(1) terdapat fase pergantian keturunan yang disebut metagenesis.<br />(2) fase sporofit lebih dominan daripada gametofit.<br />(3) sporofit berasal dari fase dari pada bagian ujungnya memiliki sporangium.<br />(4) gametofit berumur lebih pendek daripada sporofit.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, '-'),
(76, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 31, '', 'TKA_FIS_31.jpg', '160 N', '180 N', '380 N', '450 N', '580 N', 0, 'B'),
(77, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 32, '<p>Sebuah benda bergerak di suatu permukaan yang kasar dengan koefisien gesekan antara permukaan dengan benda konstan sebesar 0,5. Bila awalnya energi kinetik benda adalah 30 J dan jarak yang dapat ditempuh benda sebelum berhenti adalah 10 m, maka besar massa benda adalah ... ( g = 10 m/s<sup>2</sup> )</p>', 'white.png', '50 kg', '30 kg', '1,6 kg', '0,6 kg', '0,5 kg', 0, 'D'),
(78, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 33, '', 'TKA_FIS_33.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'E'),
(79, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 34, '', 'TKA_FIS_34.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'E'),
(80, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 35, '', 'TKA_FIS_35.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'D'),
(81, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 36, '<p>Mesin kalor ideal memiliki efisiensi 50% pada reservoir suhu tinggi 800 K. Diinginkan efisiensi mesin menjadi 60% dengan menurunkan suhu rendahnya sebesar 10%, maka yang dilakukan adalah ...</p>', 'white.png', 'Menurunkan suhu tinggi 5%', 'Suhu tinggi tetap', 'Menaikkan suhu tinggi 10%', 'Menaikkan suhu tinggi sebesar 12,5%', 'Menaikkan suhu tinggi 15%', 0, 'D'),
(82, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 37, '', 'TKA_FIS_37.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'B'),
(83, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 38, '', 'TKA_FIS_38.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'C'),
(84, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 39, '', 'TKA_FIS_39.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'A'),
(85, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 40, '<p>Di dalam tubuh manusia, darah mengalir dari pembuluh aorta dengan kecepatan 40 cm/s masuk ke dalam beberapa pembuluh kapiler dengan kecepatan rata-rata 0,05 cm/s. Apabila diameter pembuluh aorta 2,4 cm dan rata-rata diameter pembuluh kapiler 8 x 10<sup>-4</sup> cm, jumlah pembuluh kapiler pada aliran darah tersebut adalah ...</p>', 'white.png', '2,4 x 10<sup>6</sup>', '7,2 x 10<sup>9</sup>', '2,4 x 10<sup>9</sup>', '7,2 x 10<sup>9</sup>', '2,4 x 10<sup>12</sup>', 0, '-'),
(86, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 41, '', 'TKA_FIS_41.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, 'D'),
(87, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 42, '<p>Semakin cepat sebuah elektron bergerak maka panjang gelombang de Broglie nya semakin mengecil.</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Panjang gelombang de Broglie selalu berbanding terbalik dengan kecepatan.</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'A'),
(88, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 43, '<p>Pemanfaatan sinar X dalam foto roentgen dapat pula digunakan untuk melihat cacat di dalam suatu material.</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Sinar X dapat merusak organ manusia bila dosisnya melebihi batas tertentu.</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'B'),
(89, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 44, '<p>Induksi magnetik di sebuah titik yang berada di tengah-tengah sumbu solenoida yang berarus listrik adalah ....</p>\r\n<p>(1) Berbanding lurus dengan jumlah lilitan.<br />(2) Berbanding lurus dengan kuat arus.<br />(3) Berbanding lurus dengan permeabilitas zat dalam solenoida.<br />(4) Berbanding terbalik dengan panjang solenoida.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'E'),
(90, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'FIS', 45, '<p>Simpangan gelombang stasioner yang merambat pada suatu tali memenuhi persamaan <strong>y(t) =10 cos (0,5&pi;x) sin (40&pi;t)</strong> di mana y dalam cm dan x dalam m dan t dalam detik. Jika panjang talinya 20 m, maka :</p>\r\n<p>(1) Amplitudo gelombang stasioner pada suatu titik yang berjarak 0,67 m dari ujung pantulnya adalah 5 cm.<br />(2) Letak simpul ke tiga berjarak 5 m dari ujung pantulnya.<br />(3) Letak simpul ke lima berjarak 8 m dari ujung pantulnya.<br />(4) Cepat rambat gelombang stasioner tersebut 8 m/s.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'A'),
(91, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 46, '', 'TKA_KIM_46.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, '-'),
(92, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 47, '<p>Sebanyak 30% massa H<sub>2</sub>SO<sub>4</sub> habis bereaksi dengan logam Na. Pada akhir reaksi tersisa 4,6 gram Na. Massa Na awal dan volume gas H<sub>2</sub> yang dihasilkan pada kondisi 0 <sup>o</sup>C, 1 atm adalah ...<br />(Ar H = 1, S = 32, O = 16, Na = 23)</p>', 'white.png', '4,6 gram dan 6,72 L.', '6,9 gram dan 4,48 L.', '13,8 gram dan 22,4 L.', '18,4 gram dan 13,44 L.', '18,4 gram dan 6,72 L.', 0, '-'),
(93, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 48, '<p>Sebuah botol penyimpanan bahan berlabel mengandung Xenon dan Flourin, XeF<sub>n</sub> (n adalah bilangan bulat). Jika jumlah molekul XeF<sub>n</sub> sebanyak 15,05 x 10<sup>21</sup> memiliki massa 6,13 gram, nilai n yang tepat adalah ...<br />(Ar Xe = 131, F = 19)</p>', 'white.png', '7', '6', '4', '3', '2', 0, '-'),
(94, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 49, '', 'TKA_KIM_49.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, '-'),
(95, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 50, '', 'TKA_KIM_50.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, '-'),
(96, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 51, '', 'TKA_KIM_51.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, '-'),
(97, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 52, '', 'TKA_KIM_52.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, '-'),
(98, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 53, '<p>Sebanyak 25 mL larutan asam asetat pekat diencerkan dengan air sampai volumenya 110 mL. Larutan ini digunakan untuk mentitrasi 30 mL larutan NaOH 0,25 M dengan indikator fenolftalein. Jika titik akhir diperoleh saat volume asam asetat mencapai 50 mL, maka konsentrasi awal larutan asam asetat adalah ...</p>', 'white.png', '0,15 M.', '0,33 M.', '0,54 M.', '0,66 M.', '0,81 M.', 0, '-'),
(99, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 54, '<p>Suatu golongan dalam sistem periodik unsur memiliki karakteristik sebagai berikut: memiliki bau menusuk, wujud dari setiap unsur akan memengaruhi titik leleh dan titik didihnya, setiap unsurnya sangat reaktif sehingga hanya ditemukan dalam suatu persenyawaan, unsur dengan nomor atom rendah mudah mengoksidasi unsur dengan nomor atom tinggi.</p>\r\n<p>Konfigurasi elektron elektron valensi golongan tersebut adalah ...</p>', 'white.png', 'ns<sup>2</sup>', 'ns<sup>2</sup> np<sup>2</sup>', 'ns<sup>2</sup> np<sup>4</sup>', 'ns<sup>2</sup> np<sup>5</sup>', 'ns<sup>2</sup> np<sup>6</sup>', 0, '-'),
(100, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 55, '', 'TKA_KIM_55.jpg', 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 0, '-'),
(101, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 56, '<p>Besi akan mudah mengalami pengkaratan jika dicelupkan ke dalam larutan ...</p>', 'white.png', 'NaCl 1M.', 'H<sub>2</sub>CO<sub>3</sub> 1 M.', 'HCl 1 M.', 'KClO<sub>3</sub> 1 M.', 'CaCl<sub>2</sub> 1 M.', 0, '-'),
(102, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 57, '', 'TKA_KIM_57.jpg', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, '-'),
(103, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 58, '<p>Karakteristik mana yang menggambarkan molekul PCl<sub>5</sub> :</p>\r\n<p>(1) bentuk ikatan (teori VSPER) AX<sub>5</sub>.<br />(2) hibridisasi sp<sup>3</sup>d.<br />(3) bentuk molekulnya trigonal bipiramida.<br />(4) merupakan molekul polar.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, '-'),
(104, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 59, '', 'TKA_KIM_59.jpg', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, '-'),
(105, 'TKA', 'Kemampuan Saintek', 'SIMAK UI', 'KIM', 60, '<p>Larutan yang mengandung KCl dielektrolisis menggunakan elektroda Pt dengan arus sebesar 20 mA selama 48250 detik. Pernyataan yang BENAR di bawah ini adalah ...</p>\r\n<p>(1) ion Cl<sup>-</sup> mengalami reduksi.<br />(2) massa produk gas yang dihasilkan di anoda sebesar 355 mg.<br />(3) air mengalami oksidasi.<br />(4) massa produk gas yang dihasilkan di katoda sebesar 10 mg.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, '-'),
(106, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 1, '<p>Yang bukan termasuk pajak yang dikumpulkan oleh pemerintah pusat adalah ...</p>', 'white.png', 'pajak penghasilan', 'pajak pertambahan nilai', 'pajak pungutan ekspor', 'pajak penerimaan sumber daya alam', 'pajak reklame', 0, 'E'),
(107, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 2, '<p>Kenaikan harga telur sebesar 15% menyebabkan penjualan telur turun 5% dan penjualan bawang merah turun sebesar 20%. Hal ini menunjukkan bahwa permintaan bawang merah ...</p>', 'white.png', 'dan telur bersifat elastis', 'elastis terhadap harga telur', 'inelastis terhadap harga telur', 'dan telur bersifat inelastis', 'lebih inelastis daripada permintaan telur', 0, 'B'),
(108, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 3, '<p>Andaikan sebuah perusahaan persaingan tak sempurna memproduksi output sebanyak 500 unit dan diketahui bahwa P = 50, MR = 10, dan MC = 8. Jika perusahaan berusaha memaksimalkan laba, yang harus dilakukan perusahaan adalah ...</p>', 'white.png', 'tidak ada yang perlu diubah, kondisi tersebut merupakan laba maksimal', 'meningkatkan Q dan menurunkan P', 'meningkatkan Q dan meningkatkan P', 'menurunkan Q dan meningkatkan P', 'menurunkan Q dan menurunkan P', 0, 'B'),
(109, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 4, '<p>Ketika marginal product dari tambahan satu pekerja berkurang dari sebelumnya, hal ini menandakan telah terjadi ...</p>', 'white.png', 'diminishing marginal utility', 'maximum average product', 'diminishing marginal return', 'decreasing return to scale', 'diminishing marginal profit', 0, 'C'),
(110, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 5, '<p>Jika terjadi peningkatan yang signifikan pada harga bahan bakar minyak (BBM), mana yang paling mungkin akan terjadi dalam jangka pendek ... ?</p>', 'white.png', 'kurva permintaan agregat bergeser ke kiri, harga naik, dan output\r\nmeningkat', 'kurva penawaran agregat bergeser ke kanan, harga turun, dan\r\noutput meningkat', 'kurva penawaran agregat bergeser ke kanan, harga turun, dan\r\noutput menurun', 'kurva permintaan agregat bergeser ke kiri, output tidak berubah,\r\ndan harga naik', 'kurva penawaran agregat bergeser ke kiri, harga naik, dan output\r\nmenurun', 0, 'E'),
(111, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 6, '<p>Diketahui fungsi tabungan adalah S = -50 + 0,25 Y. Angka 0,25 memberikan arti ...</p>', 'white.png', 'bila pendapatan Rp2 juta, sebanyak Rp500 ribu akan ditabung', 'bila pendapatan bertambah Rp1juta, sebanyak, sebanyak Rp250\r\nribu digunakan untuk menambah konsumsi', 'tabungan minimal sebanyak 25 persen dari pendapatannya', 'tabungan otonom sebesar 50', 'kemiringan kurva tabungan adalah 0,25', 0, 'E'),
(112, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 7, '<p>Komponen biaya di bawah ini yang tidak memengaruhi nilai perolehan persediaan dalam suatu periode adalah ...</p>', 'white.png', 'komisi penjualan', 'retur pembelian', 'biaya pengiriman', 'diskon pembelian', 'diskon atau kuantitas', 0, 'A'),
(113, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 8, '<p>Setelah menyusun neraca saldo, diketahui perusahaan Aldo masih belum mengakui adanya beban bunga atas pinjaman sebesar Rp2.000.000. Perusahaan Aldo harus mengakui beban bunga tersebut.</p>\r\n<p>Pada awal periode akuntansi berikutnya, jurnal balik yang perlu dibuat perusahaan Aldo adalah ...</p>', 'white.png', 'tidak diperlukan jurnal balik', 'beban bunga (D) dan utang bunga (K) Rp 2.000.000', 'utang bunga (D) dan beban bunga (K) Rp 2.000.000', 'utang bunga (D) dan kas (K) Rp 2.000.000', 'beban bunga (D) dan kas (K) Rp 2.000.000', 0, 'C'),
(114, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 9, '<p>Jika diketahui:</p>\r\n<p>aset lancar Rp 10.500.000;<br />aset tetap Rp 22.500.000; <br />akumulasi depresiasi Rp 1.500.000;<br />modal awal Rp 25.000.000; <br />prive Rp 2.000.000; <br />pendapatan Rp 5.000.000,00;<br />beban Rp 2.000.000.</p>\r\n<p>Kewajiban dalam neraca adalah ...</p>', 'white.png', 'Rp1.000.000', 'Rp2.000.000', 'Rp3.500.000', 'Rp5.500.000', 'Rp7.000.000', 0, 'D'),
(115, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 10, '<p>Ketika harga daging ayam turun, maka keseimbangan daging sapi akan turun</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Penurunan harga daging ayam menyebabkan kenaikan permintaan daging sapi</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'C'),
(116, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 11, '<p>Jika sebuah perusahaan yang berada dalam pasar persaingan sempurna berada dalam situasi P &gt; MC, maka untuk memaksimalkan keuntungan perusahaan harus menambah produksinya.</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Setiap perusahaan dalam pasar persaingan sempurna dijamin akan mendapatkan super <em>normal profit.</em></p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'C'),
(117, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 12, '<p>Rio sangat lapar. Ia membeli semangkuk mie ayam. Setelah memakan mangkuk kedua, rasa lapar mulai berkurang, dan mie ayam yang dimakannya tidak lagi memberikan kepuasan sebanyak mangkuk pertama. Dapat dikatakan, Rio mengalami <em>diminishing technical rate of substitution</em>.</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Menurut Hukum Gosen II, jika kebutuhan dipenuhi terus menerus, tambahan kenikmatannya makin lama makin berkurang sehingga akhirnya tidak dicapai rasa kepuasan.</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'E'),
(118, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 13, '<p>Berikut adalah pernyataan yang tepat mengenai kurva indiferensi:</p>\r\n<p>(1) kemiringan kurva indiferensi menunjukkan tingkat substitusi marginal (MRS)<br />(2) kurva indiferensi untuk orang yang sama dapat saling berpotongan<br />(3) kurva indiferensi yang semakin jauh dari titik origin menunjukkan tingkat utilitas yang semakin tinggi<br />(4) kepuasan maksimum konsumen terjadi pada saat perpotongan kurva indiferensi dan garis perpotongan</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'B'),
(119, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 14, '<p>Indonesia dan Amerika Serikat (AS) melakukan perdagangan tekstil dan mobil. Biaya ekonomi untuk memproduksi tekstil di AS lebih tinggi daripada di Indonesia. Hal tersebut menunjukkan bahwa ...</p>\r\n<p>(1) AS tidak memiliki keunggulan komparatif dalam produksi mobil<br />(2) AS tidak memiliki keunggulan komparatif dalam produksi tekstil<br />(3) AS sebaiknya menspesialisasikan diri dalam memproduksi tekstil<br />(4) AS sebaiknya menspesialisasikan diri dalam memproduksi mobil</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'C'),
(120, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'EKO', 15, '<p>Yang merupakan ragam kebijakan proteksi perdagangan internasional adalah ...</p>\r\n<p>(1) larangan impor<br />(2) kuota impor<br />(3) bea masuk impor <br />(4) subsidi produksi dalam negeri</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'E'),
(121, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 16, '<p>Dalam mengungkapkan peristiwa masa lalu di daerah yang sumber data tekstualnya sangat terbatas, dapat digunakan sumber nontekstual berupa ...</p>', 'white.png', 'sumber arkeologi', 'sumber sosiologi', 'sumber tradisi tulis', 'sumber filologi', 'sumber tradisi lisan', 0, 'E'),
(122, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 17, '<p>Menurut pendapat sebagian para ahli, kedatangan Islam ke Indonesia pertama kali sudah ada sejak abad ke &ndash; 7 Masehi.</p>\r\n<p>Ahli &ndash; ahli yang berpendapat demikian mendasarkan teorinya kepada ...</p>', 'white.png', 'berita Cina dari zaman Dinasti Tang', 'nisan kubur Sultan Malik as Saleh', 'masa arus penyebaran dan kedatangan ajaran tasawuf', 'bukti berita Marco Polo', 'berita Ibnu Battutah', 0, 'A'),
(123, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 18, '<p>Pada pelaksanaan sistem <em>Cultuurstesel</em>, pos pengeluaran terbesar pada anggaran belanja pemerintah Hindia Belanda adalah anggaran untuk ...</p>', 'white.png', 'membayar para pekerja', 'membayar ganti rugi lahan', 'mengembangkan perdagangan dan penanaman', 'membangun infrastruktur demi lancarnya arus distribusi hasil\r\npanen', 'menyediakan peralatan pertanian', 0, 'D'),
(124, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 19, '<p>Sarekat Dagang Islam (SDI) merupakan organisasi yang dibentuk di Solo oleh H. Samanhudi pada tahun 1912. Atas prakarsa HOS Tjokroaminoto, nama organisasi tersebut berubah namanya menjadi ...</p>', 'white.png', 'Sarekat Islam', 'Sarekat Rakyat (SR)', 'Partai Sarekat Islam Indonesia (PSII)', 'Sarekat Islam Putih', 'Central Sarejat Islam (CSI)', 0, 'A'),
(125, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 20, '<p>Kekalahan Jepang atas Sekutu sudah didengar para pemuda melalui radio ilegal sebelum Seokarno &ndash; Hatta kembali dari Dallat. Setibanya Soekarno &ndash; Hatta di Jakarta, tindakan pertama yang dilakukan para pemuda Indonesia adalah ...</p>', 'white.png', 'menemui golongan tua untuk menanyakan kebenaran berita\r\ntersebut', 'melakukan koordinasi di kalangan pemuda untuk melaksanakan\r\nproklamasi kemerdekaan', 'mengadakan rapat dengan pemimpin nasional untuk menentukan\r\ntindakan selanjutnya', 'membentuk Panitia Persiapan Kemerdekaan Indonesia', 'menemui dan meminta Soekarno dan Hatta untuk segera\r\nmenyelenggarakan proklamasi kemerdekaan', 0, 'E'),
(126, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 21, '<p>Pasukan Sekutu yang bertugas melucuti tentara Jepang di Indonesia Timur berasal dari negara ...</p>', 'white.png', 'Inggris', 'Australia', 'Kanada', 'Amerika Serikat', 'Belanda', 0, 'B'),
(127, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 22, '<p>Salah satu kesepakatan Konferensi Inter &ndash; Indonesia antara pihak Republik Indonesia dan BFO (Bijenkomst Voor Federal Overslag) pada tanggal 19 &ndash; 22 Juli 1949 dalam bidang militer adalah ...</p>', 'white.png', 'angkatan perang RIS adalah angkatan perang nasional; Presiden\r\nRIS adalah Panglima Tertinggi Angkatan Perang RIS', 'negara – negara bagian akan memiliki angkatan perang sendiri', 'pertahanan negara adalah semata &ndash; mata hak pemerintah negara &ndash; negara bagian', 'angkatan perang RIS akan dibentuk oleh pemerintah RIS dengan inti angkatan perang RI (KNIL), bersama dengan orang &ndash; orang Indonesia yang ada dalam PNI', 'pada masa permulaan RIS Menteri Pertahanan dapat merangkap\r\nsebagai Wakil Presiden Republik Indonesia', 0, 'A'),
(128, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 23, '<p>Revolusi Prancis yang dimulai pada tanggal 14 Juli 1789 dipengaruhi oleh berkembangnya pendapat Jean Jacques Rousseau yang menentang kekuasaan raja yang absolut dan mendukung kepentingan rakyat.</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Raja Louis XVI yang berkuasa pada dekade terakhir abad ke-18 itu menjalankan kekuasaan secara tidak terbatas dan tidak berdasarkan konstitusi bahkan bersemboyan negara adalah saya.</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'C'),
(129, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 24, '<p>Rendahnya status perwira PETA, pemerasan ekonomi, dan pengerahan tenaga kerja secara paksa merupakan benih-benih timbulnya perlawanan bersenjata terhadap Jepang.</p>\r\n<p style=""text-align: center;""><em><strong>SEBAB</strong></em></p>\r\n<p>Pemerintah Jepang melalui kumiai-kumiai yang dikelola oleh penguasa pribumi melakukan pembelian hasil pertanian rakyat dengan paksa.</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'B'),
(130, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 25, '<p>Dalam mengatasi tingginya inflasi, Presiden Soekarno menerbitkan kebijakan mengganti mata uang Rp 1.000,00 dengan Rp 1,00 pada 13 Desember 1965.</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Kebijakan tersebut bertujuan untuk menertibkan berbagai aktivitas ekonomi, baik yang dilakukan pemerintah maupun swasta, agar lebih terkendali.</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'C'),
(131, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 26, '<p>Di bawah ini merupakan gerakan yang bertujuan memperjuangkan<br />Hak Asasi Manusia ...</p>\r\n<p>(1) Reformasi Gereja.<br />(2) Renaissance.<br />(3) Revolusi Industri di Inggris.<br />(4) Revolusi Amerika Serikat.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'C'),
(132, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 27, '<p>Tujuan perjuangan perempuan Indonesia pada masa pergerakan nasional antara lain ...</p>\r\n<p>(1) hak-hak poliik perempuan.<br />(2) pendidikan untuk semua perempuan<br />(3) penolakan terhadap poligami.<br />(4) terbukanya kesempatan dalam berbagai bidang.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'E'),
(133, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 28, '<p>Jatuhnya Kabinet Sukiman yang berakhir pada 3 April 1952 disebabkan ...</p>\r\n<p>(1) peristiwa Tanjung Morawa.<br />(2) mosi tidak percaya dari PNI mengenai keanggotaan DPRD dan DPRDS.<br />(3) penarikan dukungan dari NU.<br />(4) penandatangan bantuan dari Amerika Serikat.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'D'),
(134, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 29, '<p>Partai Komunis Indonesia sebetulnya mendapat keuntungan dengan terjadinya peristiwa PRRI/Permesta, oleh karena ...</p>\r\n<p>(1) PKI dapat mengembangkan sentimen anti Amerika.<br />(2) dibubarkannya partai Masyumi oleh Presiden.<br />(3) dibubarkannya Partai Sosialis Indonesia oleh Presiden.<br />(4) PKI dapat mengembangkan sentimen anti Malaysia.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'A'),
(135, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SEJ', 30, '<p>Lembaga kerja sama yang merupakan bentuk kerjasama ekonomi regional ...</p>\r\n<p>(1) WTO.<br />(2) APEC.<br />(3) MEE.<br />(4) NAFTA.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'C'),
(136, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 31, '<p>Cara masyarakat pedalaman di Indonesia menggunakan tanaman untuk tujuan pengobatan dapat dipahami sebagai penerapan konsep ...</p>', 'white.png', 'interaksi spasial', 'interdependensi', 'interaksi manusia dan lingkungan', 'nilai kegunaan', 'pola ruang', 0, 'D'),
(137, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 32, '<p>Faktor yang kurang berpengaruh terhadap perbedaan kadar garam air laut di Indonesia adalah ...</p>', 'white.png', 'besar kecilnya aliran masuk', 'banyak sedikitnya biota laut', 'tinggi rendahnya curah hujan', 'terhubung tidaknya dengan laut terbuka', 'tinggi rendahnya laju penguapan', 0, 'B'),
(138, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 33, '<p>Faktor yang menyebabkan beragamnya terumbu karang di Perairan Raja Ampat dan Teluk Cendrawasih Papua adalah ...</p>', 'white.png', 'keberagaman ikan dan suhu hangat', 'perairan dangkal dan keberagaman ikan', 'perairan jernih dan jalur pelayaran', 'suhu hangat dan perairan jernih', 'jalur pelayaran dan suhu hangat', 0, 'D'),
(139, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 34, '<p>Bioma yang berkembang pada wilayah dengan porositas tanah rendah adalah ...</p>', 'white.png', 'gurun', 'taiga', 'hutan homogen', 'savana', 'tundra', 0, 'D'),
(140, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 35, '<p><em>&ldquo;Over urbanization&rdquo;</em> memperlemah perkembangan kota &ndash; kota besar di Indonesia. Salah satu bentuk ketidakefisienan dan permasalahan yang muncul adalah ...</p>', 'white.png', 'angka pengangguran tinggi', 'kemacetan semakin meningkat', 'pengemis dan gelandangan bertambah', 'ruang publik semakin rusak', 'angka kecelakaan tinggi', 0, 'B'),
(141, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 36, '<p>Peta skala 1 : 10.000 lebih besar daripada peta skala 1 : 25.000 sehingga peta 1 : 10.000 akan lebih ...</p>', 'white.png', 'panjang', 'lebar', 'banyak', 'kecil', 'detail', 0, 'E'),
(142, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 37, '<p>Setiap daerah atau wilayah memiliki potensi sebagai pusat pertumbuhan. Faktor utama yang memengaruhi keberhasilan suatu wilayah sebagai pusat pertumbuhan adalah adanya ...</p>', 'white.png', 'sumberdaya alam yang memadai', 'kondisi fisik (alam) yang mendukung', 'memiliki interaksi dengan wilayah sekitarnya', 'telah maju secara ekonomi dan sosial', 'sumberdaya manusia dan jaringan infrastruktur yang memadai', 0, 'D'),
(143, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 38, '<p>Keberadaan bahan tambang berkaitan erat dengan morfogenesa bentuk medan suatu daerah.</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Cebakan minyak dan gas bumi di Indonesia pada umumnya dijumpai di wilayah endapan vulkanik tua zaman tersier.</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'C'),
(144, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 39, '<p>Kemiringan tanah dan ketersediaan air merupakan faktor pembatas dalam budi daya pertanian di daerah tropis.</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Budi daya pertanian padi melalui teknik terasering bertujuan untuk mengurangi erosi tanah.</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'B'),
(145, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 40, '<p>Efisiensi ekonomi merupakan faktor utama relokasi industri dari negara maju ke negara sedang berkembang.</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Relokasi industri merupakan pemindahan lokasi pabrik ke negara lain yang mempunyai penduduk banyak.</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'C'),
(146, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 41, '<p>Upaya kegiatan mitigasi bencana tanah longsor dapat berupa ...</p>\r\n<p>(1) pengaturan vegetasi.<br />(2) pembuatan teras lereng.<br />(3) gerakan penghijauan.<br />(4) pemetaan kestabilan tanah.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'E'),
(147, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 42, '<p>Kenaikan suhu air laut di Indonesia yang merupakan indikasi perubahan iklim dapat mengakibatkan ...</p>\r\n<p>(1) abrasi pantai terjal.<br />(2) timbulnya angin laut.<br />(3) intrusi air laut ke daratan.<br />(4) kerusakan terumbu karang</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'D'),
(148, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 43, '<p>Pemrosesan data spasial (keruangan) dalam sistem informasi geografis yaitu ...</p>\r\n<p>(1) pengubahan skala.<br />(2) pengubahan sistem proyeksi.<br />(3) penambahan atribut data.<br />(4) klasifikasi.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'E'),
(149, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 44, '<p>Distribusi permukiman yang memperlihatkan pola terpencarnya biasanya terdapat di ...</p>\r\n<p>(1) dataran rendah di Pulau Kalimantan.<br />(2) daratan di Nusa Tenggara Timur.<br />(3) endapan aluvial di Pulau Sulawesi.<br />(4) pegunungan tinggi di Pulau Jawa.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'C'),
(150, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'GEO', 45, '<p>Zona permukiman pada teori konsentris ditetapkan berdasarkan ...</p>\r\n<p>(1) kualitas akses di lingkungan perumahan.<br />(2) tingkat kepadatan permukiman.<br />(3) kualitas perumahan.<br />(4) jenis pekerjaan penghuni.</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'E'),
(151, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 46, '<p>Seorang peneliti menyusun abstrak dari hasil pengamatan dan wawancara yang telah ia lakukan di wilayah industri. Ia berusaha menjelaskan dampak pencemaran lingkungan bagi kehidupan warga sekitar. Hal ini berarti sosiologi memiliki ciri ...</p>', 'white.png', 'kumulatif', 'non etis', 'teoritis', 'abstrak', 'empiris', 0, 'C'),
(152, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 47, '<p>Yang merupakan contoh dari interaksi sosial yang bersifat asosiatif adalah ...</p>', 'white.png', 'monopoli oleh perusahaan besar', 'eksploitasi buruh oleh majikan', 'dominasi kelompok mayoritas terhadap kelompok minoritas', 'berkompetisi dalam kejuaraan', 'menanggung pembayaran secara bersama sama', 0, 'E'),
(153, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 48, '<p>Ayah ucok berasal dari madura dan ibu ucok berasal dari betawi. Perbedaan asal daerah kedua orangtua ucok menimbulkan perbedaan budaya (bahasa, kebiasaan, adat istiadat) diantara keduanya. Namun dengan berjalannya waktu, orangtua Ucok dapat menyesuaikan diri dan saling bertoleransi sehingga tidak menimbulkan konflik. Hal ini merupakan contoh dari ...</p>', 'white.png', 'kooperasi', 'interseksi', 'akomodasi', 'amalgamasi', 'konsiliasi', 0, 'D'),
(154, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 49, '<p>Para pekerja industri konveksi/garmen sibuk bekerja sesuai dengan tugasnya. Misal, bagian pemotongan sibuk memotong kain, tanpa tahu proses produksi berikutnya. Proses ini menyebabkan pekerja industri mengalami ...</p>', 'white.png', 'marginalisasi', 'perjuangan kelas', 'kesadaran palsu', 'alienasi', 'stereotipe pekerjaan', 0, 'D'),
(155, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 50, '<p>Mudahnya mengakses informasi dari luar negeri secara bebas oleh remaja mengakibatkan perubahan gaya hidup remaja masa kini. Hal ini disebabkan oleh faktor ...</p>', 'white.png', 'ilmu pengetahuan teknologi', 'kebijakan pemerintah', 'letak geografis', 'pertambahan penduduk', 'kelompok pertemanan', 0, 'A'),
(156, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 51, '<p>Pak Ahmad mengalami PHK (pemutusan hubungan kerja) karena perusahaan bangkrut, padahal ia sudah menduduki jabatan manajer. Akhirnya Pak Ahmad memutuskan menjadi penjual gado-gado. Kasus Pak Ahmad ini menunjukkan ia mengalami ...</p>', 'white.png', 'pergerakan dari satu tempat ke tempat lainnya', 'pergerakan dari status sosial satu ke status sosial lainnya', 'pergerakan dari perusahaan yang satu ke perusahaan yang lainnya', 'pergerakan dari hubungan kerja menjadi hubungan keluarga', 'pergerakan dari relasi sosial menjadi hubungan usaha', 0, 'B'),
(157, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 52, '<p>Beberapa tahun sebelumnya, Anto berprofesi sebagai supir angkutan umum dan merupakan pengurus Organisasi Angkutan Darat (Organda). Namun, setelah aktif dalam kegiatan partai politik, ia terpilih dari menjadi salah satu anggota wakil rakyat di daerahnya. Sebagai anggota wakil rakyat, mobilitas sosial yang berlangsung<br />terjadi melalui saluran organisasi ...</p>', 'white.png', 'birokrasi', 'kemasyarakatan', 'politik', 'profesi', 'ekonomi', 0, 'C'),
(158, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 53, '<p>Berikut konflik sosial yang terjadi : (1) tawuran pelajar antara SMA dengan STM; (2) kerusuhan yang terjadi antara pekerja dengan manajemen pabrik; (3) demonstrasi besar-besaran karyawan PT Dirgantara Indonesia menuntut kepastian hari tua kepada kementerian BUMN; (4) konflik antara Indonesia dan Malaysia mengenai batas wilayah di Kalimantan. Pernyataan di atas yang merupakan konflik non-horizontal ditunjukkan oleh nomor ...</p>', 'white.png', '(1) dan (2)', '(3) dan (4)', '(1) dan (3)', '(2) dan (3)', '(1) dan (4)', 0, '-'),
(159, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 54, '<p>Sri adalah seorang perempuan dari suku Jawa, lulusan SMP dan bekerja di perusahaan yang menekankan pentingnya status akademis. Ia telah bekerja di perusahaan itu cukup lama, yaitu sekitar 8 tahun, namun ia tidak juga mengalami kenaikan pangkat sejak pertama masuk ke perusahaan itu. Kondisi Sri yang terhambat untuk melakukan mobilitas vertikal disebabkan oleh ...</p>', 'white.png', 'status keluarga', 'latar belakang etnik', 'jenis kelamin', 'status Pendidikan', 'perusahaan tidak bonafide', 0, 'D'),
(160, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 55, '<p>Upaya mengatasi atau menanggulangi anak jalanan tidak mudah dilakukan. Mereka senang di jalan karena mereka mendapatkan uang. Tim Sosiologi bermaksud melakukan penelitian dengan teknik pengamatan terlibat (participation observation)</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Participation observation merupakan teknik pengumpulan data dengan pendekatan kuantitatif</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'C'),
(161, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 56, '<p>Diferensiasi sosial dalam masyarakat Indonesia dapat terlihat dari keragaman suku bangsa atau etnis yang ada</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Kedudukan suku-suku bangsa atau etnis dalam masyarakat Indonesia<br />dilihat setara dan tidak berkaitan dengan status sosial di dalam<br />masyarakat</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'A');
INSERT INTO `soal` (`id`, `code`, `subject`, `degree`, `specialization`, `number`, `description`, `fileimage`, `optionA`, `optionB`, `optionC`, `optionD`, `optionE`, `flagOption`, `answer`) VALUES
(162, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 57, '<p>Kelompok bermain mempunyai peranan paling penting dalam proses pembentukan kepribadian seseorang</p>\r\n<p style=""text-align: center;""><strong>SEBAB</strong></p>\r\n<p>Melalui kelompok bermain, seseorang memperoleh dasar nilai dan norma yang diharapkan dalam kehidupan bermasyarakat</p>', 'white.png', 'Jika pernyataan benar, alasan benar, keduanya menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan benar, tetapi keduanya tidak menunjukkan hubungan sebab akibat', 'Jika pernyataan benar, alasan salah', 'Jika pernyataan salah, alasan benar', 'Jika pernyataan dan alasan, keduanya salah', 0, 'E'),
(163, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 58, '<p>Perilaku seks bebas di kalangan siswa dianggap sebagai penyimpangan sosial karena tidak sesuai dengan norma yang berlaku di masyarakat. Agen yang berperan melakukan pengendalian sosial terhadap perilaku<br />tersebut adalah ...</p>\r\n<p>(1) keluarga<br />(2) sekolah<br />(3) lingkungan tetangga<br />(4) tempat kerja</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'A'),
(164, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 59, '<p>Budi adalah seorang anak berusia 8 tahun dan sangat menggemari sepak bola. Dia menggemari kompetisi La Liga dari Spanyol dengan klub kesayangannya Real Madrid. Berbagai merchandise klub Spanyol tersebut seperti bendera, baju kaos, dan topi dibeli dan dipakai oleh Budi. Dalam pergaulan sehari-hari dengan teman-teman seusianya, Budi seringkali membicarakan Real Madrid dan tidak jarang menirukan aksi selebrasi para pemain Real Madrid setelah mencetak gol. Bagi Budi, klub Real Madrid dijadikan sebagai ...</p>\r\n<p>(1) kelompok dalam (in group)<br />(2) kelompok primer<br />(3) kelompok sekunder<br />(4) kelompok reference</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'D'),
(165, 'TKS', 'Kemampuan Soshum', 'SIMAK UI', 'SOS', 60, '<p>Bentuk kejahatan terorganisir yang melampaui batas negara bahkan melibatkan jaringan global adalah ...</p>\r\n<p>(1) narkoba<br />(2) terorisme<br />(3) human trafficking<br />(4) bullying</p>', 'white.png', 'jika jawaban (1), (2), dan (3) benar', 'jika jawaban (1) dan (3) benar', ' jika jawaban (2) dan (4) benar', 'jika jawaban (4) saja yang benar', ' jika semua jawaban (1), (2), (3), dan (4) benar', 0, 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `hasil_tryout_ka`
--
ALTER TABLE `hasil_tryout_ka`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `hasil_tryout_kd`
--
ALTER TABLE `hasil_tryout_kd`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `hasil_tryout_ks`
--
ALTER TABLE `hasil_tryout_ks`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `jawaban_tryout_ka`
--
ALTER TABLE `jawaban_tryout_ka`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `jawaban_tryout_kd`
--
ALTER TABLE `jawaban_tryout_kd`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `jawaban_tryout_ks`
--
ALTER TABLE `jawaban_tryout_ks`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `pilihanprodi`
--
ALTER TABLE `pilihanprodi`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3246;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
