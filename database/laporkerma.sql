-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laporkerma
CREATE DATABASE IF NOT EXISTS `laporkerma` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laporkerma`;

-- Dumping structure for table laporkerma.bentuk_kegiatans
CREATE TABLE IF NOT EXISTS `bentuk_kegiatans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sasaran_id` bigint unsigned NOT NULL,
  `indikator_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.bentuk_kegiatans: ~0 rows (approximately)
INSERT INTO `bentuk_kegiatans` (`id`, `name`, `created_at`, `updated_at`, `sasaran_id`, `indikator_id`) VALUES
	(1, 'Asistensi Mengajar di Satuan Pendidikan-Kampus Merdeka', NULL, NULL, 0, 0),
	(2, 'Gelar Bersama (Joint Degree)', NULL, NULL, 0, 0),
	(3, 'Gelar Ganda (Dual Degree)', NULL, NULL, 0, 0),
	(4, 'Kegiatan Wirausaha-Kampus Merdeka', NULL, NULL, 0, 0),
	(5, 'Magang / Praktik Kerja-Kampus Merdeka', NULL, NULL, 0, 0),
	(6, 'Membangun Desa / KKN Tematik-Kampus Merdeka', NULL, NULL, 0, 0),
	(7, 'Pelatihan', NULL, NULL, 0, 0),
	(8, 'Pelatihan Dosen dan Instruktur', NULL, NULL, 0, 0),
	(9, 'Pemagangan', NULL, NULL, 0, 0),
	(10, 'Penelitian Bersama', NULL, NULL, 0, 0),
	(11, 'Penelitian Bersama - Artikel/Jurnal Ilmiah', NULL, NULL, 0, 0),
	(12, 'Penelitian Bersama - Paten', NULL, NULL, 0, 0),
	(13, 'Penelitian Bersama - Prototipe', NULL, NULL, 0, 0),
	(14, 'Penelitian/Riset-Kampus Merdeka', NULL, NULL, 0, 0),
	(15, 'Penerbitan Berkala Ilmiah', NULL, NULL, 0, 0),
	(16, 'Pengabdian Kepada Masyarakat', NULL, NULL, 0, 0),
	(17, 'Pengembangan Kurikulum/Program Bersama', NULL, NULL, 0, 0),
	(18, 'Pengembangan Pusat Penelitian dan Pengembangan Keilmuan', NULL, NULL, 0, 0),
	(19, 'Pengembangan Sistem / Produk', NULL, NULL, 0, 0),
	(20, 'Pengiriman Praktisi sebagai Dosen', NULL, NULL, 0, 0),
	(21, 'Penyaluran Lulusan', NULL, NULL, 0, 0),
	(22, 'Penyelenggaraan Seminar/Konferensi Ilmiah', NULL, NULL, 0, 0),
	(23, 'Pertukaran Dosen', NULL, NULL, 0, 0),
	(24, 'Pertukaran Mahasiswa', NULL, NULL, 0, 0),
	(25, 'Pertukaran Pelajar-Kampus Merdeka', NULL, NULL, 0, 0),
	(26, 'Proyek Kemanusiaan-Kampus Merdeka', NULL, NULL, 0, 0),
	(27, 'Studi/Proyek Independen-Kampus Merdeka', NULL, NULL, 0, 0),
	(28, 'Transfer Kredit', NULL, NULL, 0, 0),
	(29, 'Visiting Professor', NULL, NULL, 0, 0);

-- Dumping structure for table laporkerma.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.cache: ~0 rows (approximately)

-- Dumping structure for table laporkerma.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.cache_locks: ~0 rows (approximately)

-- Dumping structure for table laporkerma.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.countries: ~0 rows (approximately)
INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Andorra', NULL, NULL),
	(2, 'United Arab Emirates', NULL, NULL),
	(3, 'Afghanistan', NULL, NULL),
	(4, 'Antigua And Barbuda', NULL, NULL),
	(5, 'Anguilla', NULL, NULL),
	(6, 'Albania', NULL, NULL),
	(7, 'Armenia', NULL, NULL),
	(8, 'Netherlands Antilles', NULL, NULL),
	(9, 'Angola', NULL, NULL),
	(10, 'Antarctica', NULL, NULL),
	(11, 'Argentina', NULL, NULL),
	(12, 'American Samoa', NULL, NULL),
	(13, 'Austria', NULL, NULL),
	(14, 'Australia', NULL, NULL),
	(15, 'Aruba', NULL, NULL),
	(16, 'Aland Islands', NULL, NULL),
	(17, 'Azerbaijan', NULL, NULL),
	(18, 'Bosnia And Herzegovina', NULL, NULL),
	(19, 'Barbados', NULL, NULL),
	(20, 'Bangladesh', NULL, NULL),
	(21, 'Belgium', NULL, NULL),
	(22, 'Burkina Faso', NULL, NULL),
	(23, 'Bulgaria', NULL, NULL),
	(24, 'Bahrain', NULL, NULL),
	(25, 'Burundi', NULL, NULL),
	(26, 'Benin', NULL, NULL),
	(27, 'Saint Bartelemey', NULL, NULL),
	(28, 'Bermuda', NULL, NULL),
	(29, 'Brunei Darussalam', NULL, NULL),
	(30, 'Bolivia', NULL, NULL),
	(31, 'Bonaire, Saint Eustatius and Saba', NULL, NULL),
	(32, 'Brazil', NULL, NULL),
	(33, 'Bahamas', NULL, NULL),
	(34, 'Bhutan', NULL, NULL),
	(35, 'Bouvet Island', NULL, NULL),
	(36, 'Bostwana', NULL, NULL),
	(37, 'Belarus', NULL, NULL),
	(38, 'Belize', NULL, NULL),
	(39, 'Canada', NULL, NULL),
	(40, 'Cocos (Keeling) Islands', NULL, NULL),
	(41, 'Congo, The Democratic Republic Of The', NULL, NULL),
	(42, 'Central African Republic', NULL, NULL),
	(43, 'Congo', NULL, NULL),
	(44, 'Switzerland', NULL, NULL),
	(45, 'Cote D\'lvoire', NULL, NULL),
	(46, 'Cook Islands', NULL, NULL),
	(47, 'Chile', NULL, NULL),
	(48, 'Cameroon', NULL, NULL),
	(49, 'China', NULL, NULL),
	(50, 'Colombia', NULL, NULL),
	(51, 'Costa Rica', NULL, NULL),
	(52, 'Serbia And Montenegro', NULL, NULL),
	(53, 'Cuba', NULL, NULL),
	(54, 'Cape Verde', NULL, NULL),
	(55, 'Curacao', NULL, NULL),
	(56, 'Christmas Island', NULL, NULL),
	(57, 'Cyprus', NULL, NULL),
	(58, 'Czech Republic', NULL, NULL),
	(59, 'Germany', NULL, NULL),
	(60, 'Djibouti', NULL, NULL),
	(61, 'Denmark', NULL, NULL),
	(62, 'Dominica', NULL, NULL),
	(63, 'Dominican Republic', NULL, NULL),
	(64, 'Algeria', NULL, NULL),
	(65, 'Ecuador', NULL, NULL),
	(66, 'Estonia', NULL, NULL),
	(67, 'Egypt', NULL, NULL),
	(68, 'Western Sahara', NULL, NULL),
	(69, 'Eritrea', NULL, NULL),
	(70, 'Spain', NULL, NULL),
	(71, 'Ethiopia', NULL, NULL),
	(72, 'Finland', NULL, NULL),
	(73, 'Fizi', NULL, NULL),
	(74, 'Falkland Islands (Malvinas)', NULL, NULL),
	(75, 'Micronesia, Federated States Of', NULL, NULL),
	(76, 'Faroe Islands', NULL, NULL),
	(77, 'France', NULL, NULL),
	(78, 'Gabon', NULL, NULL),
	(79, 'United Kingdom', NULL, NULL),
	(80, 'Grenada', NULL, NULL),
	(81, 'Georgia', NULL, NULL),
	(82, 'French Guiana', NULL, NULL),
	(83, 'Guernsey', NULL, NULL),
	(84, 'Ghana', NULL, NULL),
	(85, 'Gibraltar', NULL, NULL),
	(86, 'Greenland', NULL, NULL),
	(87, 'Gambia', NULL, NULL),
	(88, 'Guinea', NULL, NULL),
	(89, 'Guadeloupe', NULL, NULL),
	(90, 'Equatorial Guinea', NULL, NULL),
	(91, 'Greece', NULL, NULL),
	(92, 'South Georgia And The South Sandwich Islands', NULL, NULL),
	(93, 'Guatemala', NULL, NULL),
	(94, 'Guam', NULL, NULL),
	(95, 'Guinea-Bissau', NULL, NULL),
	(96, 'Guyana', NULL, NULL),
	(97, 'Hong Kong', NULL, NULL),
	(98, 'Heard Island And Mcdonald Islands', NULL, NULL),
	(99, 'Honduras', NULL, NULL),
	(100, 'Croatia', NULL, NULL),
	(101, 'Haiti', NULL, NULL),
	(102, 'Hungary', NULL, NULL),
	(103, 'Indonesia', NULL, NULL),
	(104, 'Ireland', NULL, NULL),
	(105, 'Israel', NULL, NULL),
	(106, 'Isle Of Man', NULL, NULL),
	(107, 'India', NULL, NULL),
	(108, 'British Indian Ocean Territory', NULL, NULL),
	(109, 'Iraq', NULL, NULL),
	(110, 'Iran, Islamic Republic Of', NULL, NULL),
	(111, 'Iceland', NULL, NULL),
	(112, 'Italy', NULL, NULL),
	(113, 'Jersey', NULL, NULL),
	(114, 'Jamaica', NULL, NULL),
	(115, 'Jordan', NULL, NULL),
	(116, 'Japan', NULL, NULL),
	(117, 'Kenya', NULL, NULL),
	(118, 'Kyrgyzstan', NULL, NULL),
	(119, 'Cambodia', NULL, NULL),
	(120, 'Kiribati', NULL, NULL),
	(121, 'Comoros', NULL, NULL),
	(122, 'Saint Kitts And Nevis', NULL, NULL),
	(123, 'Korea, Democratic People\'S Republic Of', NULL, NULL),
	(124, 'Korea, Republic Of', NULL, NULL),
	(125, 'Kuwait', NULL, NULL),
	(126, 'Cayman Islands', NULL, NULL),
	(127, 'Kazakhstan', NULL, NULL),
	(128, 'Lao People\'S Democratic Republic', NULL, NULL),
	(129, 'Lebanon', NULL, NULL),
	(130, 'Saint Lucia', NULL, NULL),
	(131, 'Liechtenstein', NULL, NULL),
	(132, 'Sri Lanka', NULL, NULL),
	(133, 'Liberia', NULL, NULL),
	(134, 'Lesotho', NULL, NULL),
	(135, 'Lithuania', NULL, NULL),
	(136, 'Luxembourg', NULL, NULL),
	(137, 'Latvia', NULL, NULL),
	(138, 'Libyan Arab Jamahiriya', NULL, NULL),
	(139, 'Morocco', NULL, NULL),
	(140, 'Monaco', NULL, NULL),
	(141, 'Moldova, Republic Of', NULL, NULL),
	(142, 'Montenegro', NULL, NULL),
	(143, 'Saint Martin', NULL, NULL),
	(144, 'Madagascar', NULL, NULL),
	(145, 'Marshall Islands', NULL, NULL),
	(146, 'Macedonia, The Former Yugoslav Republic Of', NULL, NULL),
	(147, 'Mali', NULL, NULL),
	(148, 'Myanmar', NULL, NULL),
	(149, 'Mongolia', NULL, NULL),
	(150, 'Macao', NULL, NULL),
	(151, 'Northern Mariana Islands', NULL, NULL),
	(152, 'Martinique', NULL, NULL),
	(153, 'Mauritania', NULL, NULL),
	(154, 'Monstserrat', NULL, NULL),
	(155, 'Malta', NULL, NULL),
	(156, 'Mauritius', NULL, NULL),
	(157, 'Maldives', NULL, NULL),
	(158, 'Malawi', NULL, NULL),
	(159, 'Mexico', NULL, NULL),
	(160, 'Malaysia', NULL, NULL),
	(161, 'Mozambique', NULL, NULL),
	(162, 'Namibia', NULL, NULL),
	(163, 'New Caledonia', NULL, NULL),
	(164, 'Niger', NULL, NULL),
	(165, 'Norfolk Island', NULL, NULL),
	(166, 'Nigeria', NULL, NULL),
	(167, 'Nicaragua', NULL, NULL),
	(168, 'Netherlands', NULL, NULL),
	(169, 'Norway', NULL, NULL),
	(170, 'Nepal', NULL, NULL),
	(171, 'Nauru', NULL, NULL),
	(172, 'Niue', NULL, NULL),
	(173, 'New Zealand', NULL, NULL),
	(174, 'Oman', NULL, NULL),
	(175, 'Panama', NULL, NULL),
	(176, 'Peru', NULL, NULL),
	(177, 'French Polynesia', NULL, NULL),
	(178, 'Papua New Guinea', NULL, NULL),
	(179, 'Philippines', NULL, NULL),
	(180, 'Pakistan', NULL, NULL),
	(181, 'Poland', NULL, NULL),
	(182, 'Saint Pierre And Miquelon', NULL, NULL),
	(183, 'Pitcairn', NULL, NULL),
	(184, 'Puerto Rico', NULL, NULL),
	(185, 'Palestinian Territory, Occupied', NULL, NULL),
	(186, 'Portugal', NULL, NULL),
	(187, 'Palau', NULL, NULL),
	(188, 'Paraguay', NULL, NULL),
	(189, 'Qatar', NULL, NULL),
	(190, 'Reunion', NULL, NULL),
	(191, 'Romania', NULL, NULL),
	(192, 'Serbia', NULL, NULL),
	(193, 'Russian Federation', NULL, NULL),
	(194, 'Rwanda', NULL, NULL),
	(195, 'Saudi Arabia', NULL, NULL),
	(196, 'Solomon Islands', NULL, NULL),
	(197, 'Seychelles', NULL, NULL),
	(198, 'Sudan', NULL, NULL),
	(199, 'Sweden', NULL, NULL),
	(200, 'Singapore', NULL, NULL),
	(201, 'Saint Helena', NULL, NULL),
	(202, 'Slovania', NULL, NULL),
	(203, 'Svalbard And Jan Mayen', NULL, NULL),
	(204, 'Slovakia', NULL, NULL),
	(205, 'Sierra Leone', NULL, NULL),
	(206, 'San Marino', NULL, NULL),
	(207, 'Senegal', NULL, NULL),
	(208, 'Somalia', NULL, NULL),
	(209, 'Suriname', NULL, NULL),
	(210, 'South Sudan', NULL, NULL),
	(211, 'Sao Tome And Principe', NULL, NULL),
	(212, 'El Salvador', NULL, NULL),
	(213, 'Sint Maarten', NULL, NULL),
	(214, 'Syrian Arab Republic', NULL, NULL),
	(215, 'Swaziland', NULL, NULL),
	(216, 'Turks And Caicos Islands', NULL, NULL),
	(217, 'Chad', NULL, NULL),
	(218, 'French Southern Territories', NULL, NULL),
	(219, 'Togo', NULL, NULL),
	(220, 'Thailand', NULL, NULL),
	(221, 'Tajikistan', NULL, NULL),
	(222, 'Tokelau', NULL, NULL),
	(223, 'Timor-Leste', NULL, NULL),
	(224, 'Turkmenistan', NULL, NULL),
	(225, 'Tunisia', NULL, NULL),
	(226, 'Tonga', NULL, NULL),
	(227, 'Turkey', NULL, NULL),
	(228, 'Trinidad And Tobago', NULL, NULL),
	(229, 'Tuvalu', NULL, NULL),
	(230, 'Taiwan, Province Of China', NULL, NULL),
	(231, 'Tanzania, United Republic Of', NULL, NULL),
	(232, 'Ukraine', NULL, NULL),
	(233, 'Uganda', NULL, NULL),
	(234, 'United States Minor Outlying Islands', NULL, NULL),
	(235, 'United States', NULL, NULL),
	(236, 'Uruguay', NULL, NULL),
	(237, 'Uzbekistan', NULL, NULL),
	(238, 'Holy See (Vatican City State)', NULL, NULL),
	(239, 'Saint Vincent And The Grenadines', NULL, NULL),
	(240, 'Venezuela', NULL, NULL),
	(241, 'Virgin Islands, British', NULL, NULL),
	(242, 'Virgin Islands, U.S.', NULL, NULL),
	(243, 'Viet Nam', NULL, NULL),
	(244, 'Vanuatu', NULL, NULL),
	(245, 'Wallis And Futuna', NULL, NULL),
	(246, 'Samoa', NULL, NULL),
	(247, 'Kosova', NULL, NULL),
	(248, 'Yemen', NULL, NULL),
	(249, 'Mayotte', NULL, NULL),
	(250, 'South Africa', NULL, NULL),
	(251, 'Zambia', NULL, NULL),
	(252, 'Zimbabwe', NULL, NULL);

-- Dumping structure for table laporkerma.detail_kegiatans
CREATE TABLE IF NOT EXISTS `detail_kegiatans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bentuk_kegiatan_id` bigint unsigned NOT NULL,
  `sasaran_id` bigint unsigned NOT NULL,
  `indikator_id` bigint unsigned NOT NULL,
  `nilai_kontrak` varchar(255) NOT NULL,
  `luaran` varchar(255) NOT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.detail_kegiatans: ~0 rows (approximately)

-- Dumping structure for table laporkerma.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table laporkerma.indikators
CREATE TABLE IF NOT EXISTS `indikators` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sasaran_id` bigint unsigned NOT NULL,
  `indikator` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL DEFAULT '0',
  `satuan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.indikators: ~0 rows (approximately)
INSERT INTO `indikators` (`id`, `sasaran_id`, `indikator`, `volume`, `satuan`, `created_at`, `updated_at`) VALUES
	(1, 1, 'IKK 2.5.2.1 Persentase Prodi bekerjasama dengan mitra', '0', '%', NULL, NULL),
	(2, 2, 'Kesiapan kerja lulusan', '0', NULL, NULL, NULL),
	(3, 2, 'Mahasiswa di luar kampus', '0', NULL, NULL, NULL),
	(4, 3, 'Link and match PTS', '0', NULL, NULL, NULL),
	(5, 4, 'Dosen di luar kampus', '0', NULL, NULL, NULL),
	(6, 4, 'Kualifikasi dosen', '0', NULL, NULL, NULL),
	(7, 4, 'Penerapan riset dosen', '0', 'Hasil Penelitian', NULL, NULL),
	(8, 5, 'Kemitraan prorgam studi', '0', 'Kerjasama', NULL, NULL),
	(9, 5, 'Pembelajaran dalam kelas', '0', NULL, NULL, NULL),
	(10, 5, 'Akreditasi Internasional', '0', NULL, NULL, NULL);

-- Dumping structure for table laporkerma.jenis_kermas
CREATE TABLE IF NOT EXISTS `jenis_kermas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.jenis_kermas: ~0 rows (approximately)
INSERT INTO `jenis_kermas` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Memorandum of Understanding (MoU)', NULL, NULL),
	(2, 'Memorandum of Agreement (MoA)', NULL, NULL),
	(3, 'Implementation Arrangement (IA)', NULL, NULL);

-- Dumping structure for table laporkerma.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.jobs: ~0 rows (approximately)

-- Dumping structure for table laporkerma.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.job_batches: ~0 rows (approximately)

-- Dumping structure for table laporkerma.kermas
CREATE TABLE IF NOT EXISTS `kermas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis_kerma_id` bigint unsigned NOT NULL,
  `sumber_pendanaan_id` bigint unsigned NOT NULL,
  `status_kerma_id` bigint unsigned NOT NULL,
  `kondisi_tertentu_id` bigint unsigned NOT NULL,
  `penggiat_kerma_id` bigint unsigned NOT NULL,
  `bentuk_kegiatan_id` bigint unsigned NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `nomor_dokumen` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `anggaran` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint unsigned NOT NULL,
  `klasifikasi_mitra_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.kermas: ~0 rows (approximately)

-- Dumping structure for table laporkerma.klasifikasi_mitras
CREATE TABLE IF NOT EXISTS `klasifikasi_mitras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.klasifikasi_mitras: ~0 rows (approximately)
INSERT INTO `klasifikasi_mitras` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Perusahaan multinasional', NULL, NULL),
	(2, 'Perusahaan Nasional ', NULL, NULL),
	(3, 'Perusahaan teknologi global', NULL, NULL),
	(4, 'Perusahaan rintisan (startup company) teknologi', NULL, NULL),
	(5, 'Organisasi nirlaba kelas dunia', NULL, NULL),
	(6, 'Institusi / Organisasi multilateral', NULL, NULL),
	(7, 'Perguruan tinggi yang masuk dalam daftar QS200 berdasarkan bidang ilmu (subject)', NULL, NULL),
	(8, 'Instansi pemerintah Pusat dan/atau Daerah BUMN dan/atau BUMD', NULL, NULL),
	(9, 'Rumah Sakit', NULL, NULL),
	(10, 'Dunia Usaha', NULL, NULL),
	(11, 'Institusi Pendidikan', NULL, NULL),
	(12, 'Organisasi', NULL, NULL),
	(13, 'Perguruan Tinggi, fakultas, atau program studi dalam bidang yang relevan', NULL, NULL),
	(14, 'Lembaga riset pemerintah, swasta, nasional, maupun internasional', NULL, NULL),
	(15, 'Lembaga kebudayaan berskalanasional / bereputasi', NULL, NULL);

-- Dumping structure for table laporkerma.kondisi_tertentus
CREATE TABLE IF NOT EXISTS `kondisi_tertentus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kondisi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.kondisi_tertentus: ~0 rows (approximately)
INSERT INTO `kondisi_tertentus` (`id`, `kondisi`, `created_at`, `updated_at`) VALUES
	(1, 'Memiliki dasar kerjasama', NULL, NULL),
	(2, 'Dokumen digital tersedia', NULL, NULL),
	(3, 'Tanggal dokumen tidak wajar', NULL, NULL);

-- Dumping structure for table laporkerma.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_09_04_170203_create_mitras_table', 1),
	(5, '2024_09_07_014151_create_countries_table', 1),
	(6, '2024_09_07_053159_create_klasifikasi_mitras_table', 1),
	(7, '2024_09_07_054021_create_kermas_table', 1),
	(8, '2024_09_07_060224_create_penggiat_kermas_table', 1),
	(9, '2024_09_07_063319_create_detail_kegiatans_table', 1),
	(10, '2024_09_07_064600_create_jenis_kermas_table', 1),
	(11, '2024_09_07_064808_create_sumber_pendanaans_table', 1),
	(12, '2024_09_07_064848_create_status_kermas_table', 1),
	(13, '2024_09_07_065135_create_bentuk_kegiatans_table', 1),
	(14, '2024_09_07_065344_create_kondisi_tertentus_table', 1),
	(15, '2024_09_07_065829_create_sasarans_table', 1),
	(16, '2024_09_07_070352_create_indikators_table', 1),
	(17, '2024_09_08_133820_create_indikators_table', 2);

-- Dumping structure for table laporkerma.mitras
CREATE TABLE IF NOT EXISTS `mitras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint unsigned NOT NULL,
  `klasifikasi_mitra_id` bigint unsigned NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Digunakan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.mitras: ~0 rows (approximately)
INSERT INTO `mitras` (`id`, `country_id`, `klasifikasi_mitra_id`, `nama_institusi`, `alamat`, `telp`, `website`, `status`, `created_at`, `updated_at`) VALUES
	(1, 103, 11, 'Institut Teknologi Garut', 'Jl. Mayor Syamsu No. 1', NULL, NULL, 'Digunakan', '2024-09-08 08:12:58', '2024-09-08 08:12:58');

-- Dumping structure for table laporkerma.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table laporkerma.penggiat_kermas
CREATE TABLE IF NOT EXISTS `penggiat_kermas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instansi_id` bigint unsigned NOT NULL,
  `unit_pelaksana_id` bigint unsigned NOT NULL,
  `alamat` text NOT NULL,
  `nama_penandatangan` varchar(255) NOT NULL,
  `jabatan_penandatangan` varchar(255) NOT NULL,
  `nama_penanggungjawab` varchar(255) DEFAULT NULL,
  `jabatan_penanggungjawab` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.penggiat_kermas: ~0 rows (approximately)

-- Dumping structure for table laporkerma.sasarans
CREATE TABLE IF NOT EXISTS `sasarans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.sasarans: ~0 rows (approximately)
INSERT INTO `sasarans` (`id`, `name`, `level`, `created_at`, `updated_at`) VALUES
	(1, 'Meningkatnya program studi yang berkualitas', 'Prioritas Kementerian', NULL, NULL),
	(2, 'Meningkatnya kualitas lulusan pendidikan tinggi', 'Prioritas', NULL, NULL),
	(3, 'Meningkatnya inovasi perguruan tinggi dalam rangka meningkatkan mutu pendidikan', 'Prioritas', NULL, NULL),
	(4, 'Meningkatnya kualitas dosen pendidikan tinggi', 'Prioritas', NULL, NULL),
	(5, 'Meningkatnya kualitas kurikulum dan pembelajaran', 'Prioritas', NULL, NULL);

-- Dumping structure for table laporkerma.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.sessions: ~0 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('3ahmmhkFsn0b3GxshbN8VL4JDntgGIsBkb9fd5z8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.9.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVWVUVU92M0E1TVZNWVBHVzdJVm9taWl4VlVFUEtITWdQOG9QejYwRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sYXBvcmtlcm1hLnRlc3QvP2hlcmQ9cHJldmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1725845279),
	('U1JyqxtYZDCFuq4yGTqSWmiZs4zdOfzktAxEfVyr', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZXVmRHowMW9FdzRUbVpFaEpKMGJudExSR2xCaHR3a2xRS1lYeUw0aSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vbGFwb3JrZXJtYS50ZXN0L2tlcm1hL2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1725850490);

-- Dumping structure for table laporkerma.status_kermas
CREATE TABLE IF NOT EXISTS `status_kermas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.status_kermas: ~0 rows (approximately)
INSERT INTO `status_kermas` (`id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Aktif', NULL, NULL),
	(2, 'Dalam Perpanjangan', NULL, NULL),
	(3, 'Kadaluarsa', NULL, NULL),
	(4, 'Tidak Aktif', NULL, NULL);

-- Dumping structure for table laporkerma.sumber_pendanaans
CREATE TABLE IF NOT EXISTS `sumber_pendanaans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.sumber_pendanaans: ~0 rows (approximately)
INSERT INTO `sumber_pendanaans` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Badan PSDMPK dan PMP', NULL, NULL),
	(2, 'Balitbang', NULL, NULL),
	(3, 'Bantuan Asing', NULL, NULL),
	(4, 'Bantuan Swasta', NULL, NULL),
	(5, 'Biro PKLN', NULL, NULL),
	(6, 'Dana mandiri', NULL, NULL),
	(7, 'Dikti', NULL, NULL),
	(8, 'Dinas Kabupaten', NULL, NULL),
	(9, 'Dinas Provinsi', NULL, NULL),
	(10, 'DIPA PTN', NULL, NULL),
	(11, 'Direktorat P2TK Dikdas', NULL, NULL),
	(12, 'Direktorat P2TK Dikmen', NULL, NULL),
	(13, 'Direktorat PKLK Dikdas', NULL, NULL),
	(14, 'Direktorat PKLK Dikmen', NULL, NULL),
	(15, 'Direktorat PSD', NULL, NULL),
	(16, 'Direktorat PSMA', NULL, NULL),
	(17, 'Direktorat PSMK', NULL, NULL),
	(18, 'Direktorat PSMP', NULL, NULL),
	(19, 'DP2M Ristekdikti', NULL, NULL),
	(20, 'Insinas Ristekdikti', NULL, NULL),
	(21, 'Lainnya', NULL, NULL),
	(22, 'Lembaga donor dalam negeri', NULL, NULL),
	(23, 'Lembaga donor luar negeri', NULL, NULL),
	(24, 'Puskurbuk', NULL, NULL),
	(25, 'Puspendik', NULL, NULL),
	(26, 'Pustekkom', NULL, NULL),
	(27, 'Sekretariat Dikdas', NULL, NULL),
	(28, 'Sekretariat Dikmen', NULL, NULL);

-- Dumping structure for table laporkerma.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laporkerma.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Leni Fitriani', 'kemahasiswaan@itg.ac.id', NULL, '$2y$12$q7qVQ.r4MUKhEwWW7/p.MOZ9z1aiAuR1EYOMuiravEg5rFzB349xG', NULL, '2024-09-08 07:58:52', '2024-09-08 07:58:52');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
