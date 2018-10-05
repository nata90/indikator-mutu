-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 19. Juni 2015 jam 03:28
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `komitebaru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator`
--

CREATE TABLE IF NOT EXISTS `indikator` (
  `id_indikator` int(4) NOT NULL AUTO_INCREMENT,
  `area_ind` varchar(300) NOT NULL,
  `uraian_ind` varchar(300) NOT NULL,
  `id_klp` int(4) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_indikator`),
  KEY `FK_id_klp` (`id_klp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `indikator`
--

INSERT INTO `indikator` (`id_indikator`, `area_ind`, `uraian_ind`, `id_klp`, `status`) VALUES
(1, 'Asesmen pasien', 'Kelengkapan asesmen awal medis pasien rawat inap', 1, 1),
(2, 'Pelayanan Laboratorium', 'Kerusakan sampel akibat kesalahan pre-analitik', 1, 1),
(3, 'Pelayanan Radiologi', 'Kerusakan film pada pemeriksaan radiologi', 1, 1),
(4, 'Prosedur bedah', 'Kelengkapan informed consent sebelum tindakan operasi', 1, 1),
(5, 'Penggunaan Antibiotika', 'Pasien Bedah Hip arthoplasthy yang menerima antibiotik profilaksis sesuai dengan pedoman (Cefuroksim/Cefazolin/Vankomisin)', 1, 1),
(6, 'Kesalahan Medikasi dan KNC', 'Tidak ada kesalahan pemberian obat di instalasi farmasi', 1, 1),
(7, 'Penggunaan anestesi dan sedasi', 'Komplikasi anestesi karena overdosis, reaksi anestesi dan salah penempatan ET.', 1, 1),
(8, 'Penggunaan darah dan produk darah', 'Kejadian reaksi tranfusi pada pasien rawat inap', 1, 1),
(9, 'Kelengkapan RM', 'Kelengkapan pengisian rekam medik24 jam setelah selesai pelayanan', 1, 1),
(10, 'Pencegahan dan pengendalian infeksi, surveilans, dan pelaporan.', 'Jumlah pasien yang mengalami ulkus dekubitus di rumah sakit stadium 2', 1, 1),
(11, 'Riset klinis', 'Pertumbuhan penelitian yang dipublikasikan.', 1, 1),
(12, 'Pengadaan rutin peralatan kesehatan dan obat pentinguntuk memenuhi kebutuhan pasien', 'Ketersediaan alat implant ortopedi pada operasi hip arthoplasty di IBS', 2, 1),
(13, 'Pelaporan aktivitas yang diwajibkan oleh peraturan perundang-undangan', 'Cost recovery', 2, 1),
(14, 'Manajemen risiko', 'Jumlah kejadian tertusuk jarum pada petugas', 2, 1),
(15, 'Manajemen penggunaan sumber daya', 'Perencanaan pengembangan SDM', 2, 1),
(16, 'Harapan dan kepuasan pasien', 'Tingkat kepuasan pelanggan rawat inap', 2, 1),
(17, 'Harapan dan kepuasan staf', 'Tingkat kepuasan SDM', 2, 1),
(18, 'Demografi Pasien dan diagnosis klinis', 'Demografi pasien dengan demam berdarah dengue', 2, 1),
(19, 'Manajemen keuangan', 'Periode penagihan piutang', 2, 1),
(20, 'Pencegahan dan pengendalian dari kejadian yang dapat menimbulkan masalah bagi keselamatan pasien', 'Kepatuhan terhadap hand hyniene', 2, 1),
(21, 'Ketetapan identifikasi pasien', 'Ketepatan identifikasi pada pelabelan obat pasien baru rawat inap', 3, 1),
(22, 'Peningkatan komunikasi yang efektif', 'Verbal order ditandatangani petugas dalam 24 jam pada pasien rawat inap', 3, 1),
(23, 'Peningkatan keamanan obat yang perlu diwaspadai', 'Ketepatan pelabelan obat high alert', 3, 1),
(24, 'Kepastian tepat lokasi, tepat prosedur, tepat pasien operasi', 'Kelengkapan check list operasi sebelum operasi dimulai', 3, 1),
(25, 'Pengurangan risiko infeksi terkait pelayanan kesehatan', 'Kepatuhan petugas terhadap hand hygiene', 3, 1),
(26, 'Pengurangan risiko jatuh', 'Kelengkapan penilaian risiko jatuh pada pasien baru rawat inap', 3, 1),
(27, 'International Library', 'Konseling berhenti merokok kepada pasien gagal jantung', 4, 1),
(28, 'International Library', 'Jumlah bayi baru lahir yang dirawat di rumah sakit yang mendapatkan ASI eksklusif selama perawatan', 4, 1),
(29, 'International Library', 'Asesmen rehabilitasi medik pada pasien stroke', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ind_satker`
--

CREATE TABLE IF NOT EXISTS `ind_satker` (
  `id_ind_satker` int(4) NOT NULL AUTO_INCREMENT,
  `id_indikator` int(4) NOT NULL,
  `id_satker` int(4) NOT NULL,
  `id_pjdata` int(2) NOT NULL,
  PRIMARY KEY (`id_ind_satker`),
  KEY `FK_id_satker_ind` (`id_satker`),
  KEY `FK_id_indikator` (`id_indikator`),
  KEY `FK_id_pjdata` (`id_pjdata`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=293 ;

--
-- Dumping data untuk tabel `ind_satker`
--

INSERT INTO `ind_satker` (`id_ind_satker`, `id_indikator`, `id_satker`, `id_pjdata`) VALUES
(1, 1, 20, 1),
(2, 8, 20, 1),
(3, 10, 20, 14),
(4, 14, 20, 14),
(5, 16, 20, 1),
(6, 20, 20, 14),
(7, 21, 20, 1),
(8, 22, 20, 1),
(9, 23, 20, 1),
(10, 25, 20, 14),
(11, 26, 20, 1),
(12, 27, 20, 1),
(13, 28, 20, 19),
(14, 29, 20, 1),
(15, 1, 21, 2),
(16, 8, 21, 2),
(17, 10, 21, 14),
(18, 14, 21, 14),
(19, 16, 21, 2),
(20, 20, 21, 14),
(21, 21, 21, 2),
(22, 22, 21, 2),
(23, 23, 21, 2),
(24, 25, 21, 14),
(25, 26, 21, 2),
(26, 27, 21, 2),
(27, 28, 21, 19),
(28, 29, 21, 2),
(29, 1, 22, 2),
(30, 8, 22, 2),
(31, 10, 22, 14),
(32, 14, 22, 14),
(33, 16, 22, 2),
(34, 20, 22, 14),
(35, 21, 22, 2),
(36, 22, 22, 2),
(37, 23, 22, 2),
(38, 25, 22, 14),
(39, 26, 22, 2),
(40, 27, 22, 2),
(41, 28, 22, 19),
(42, 29, 22, 2),
(43, 1, 23, 1),
(44, 8, 23, 1),
(45, 10, 23, 14),
(46, 14, 23, 14),
(47, 16, 23, 1),
(48, 20, 23, 14),
(49, 21, 23, 1),
(50, 22, 23, 1),
(51, 23, 23, 1),
(52, 25, 23, 14),
(53, 26, 23, 1),
(54, 27, 23, 1),
(55, 28, 23, 19),
(56, 29, 23, 1),
(57, 1, 24, 5),
(58, 8, 24, 5),
(59, 10, 24, 14),
(60, 14, 24, 14),
(61, 20, 24, 14),
(62, 21, 24, 5),
(63, 22, 24, 5),
(64, 23, 24, 5),
(65, 25, 24, 14),
(66, 26, 24, 5),
(67, 28, 24, 19),
(68, 1, 25, 2),
(69, 8, 25, 2),
(70, 10, 25, 14),
(71, 14, 25, 14),
(72, 16, 25, 2),
(73, 20, 25, 14),
(74, 21, 25, 2),
(75, 22, 25, 2),
(76, 23, 25, 2),
(77, 25, 25, 14),
(78, 26, 25, 2),
(79, 27, 25, 2),
(80, 28, 25, 19),
(81, 29, 25, 2),
(82, 1, 26, 2),
(83, 8, 26, 2),
(84, 10, 26, 14),
(85, 14, 26, 14),
(86, 16, 26, 2),
(87, 20, 26, 14),
(88, 21, 26, 2),
(89, 22, 26, 2),
(90, 23, 26, 2),
(91, 25, 26, 14),
(92, 26, 26, 2),
(93, 27, 26, 2),
(94, 28, 26, 19),
(95, 29, 26, 2),
(96, 1, 27, 1),
(97, 8, 27, 1),
(98, 10, 27, 14),
(99, 14, 27, 14),
(100, 16, 27, 1),
(101, 20, 27, 14),
(102, 21, 27, 1),
(103, 22, 27, 1),
(104, 23, 27, 1),
(105, 25, 27, 14),
(106, 26, 27, 1),
(107, 27, 27, 1),
(108, 28, 27, 19),
(109, 29, 27, 1),
(110, 1, 28, 1),
(111, 8, 28, 1),
(112, 10, 28, 14),
(113, 14, 28, 14),
(114, 16, 28, 1),
(115, 20, 28, 14),
(116, 21, 28, 1),
(117, 22, 28, 1),
(118, 23, 28, 1),
(119, 25, 28, 14),
(120, 26, 28, 1),
(121, 27, 28, 1),
(122, 28, 28, 19),
(123, 29, 28, 1),
(124, 1, 29, 1),
(125, 8, 29, 1),
(126, 10, 29, 14),
(127, 14, 29, 14),
(128, 16, 29, 1),
(129, 20, 29, 14),
(130, 21, 29, 1),
(131, 22, 29, 1),
(132, 23, 29, 1),
(133, 25, 29, 14),
(134, 26, 29, 1),
(135, 27, 29, 1),
(136, 28, 29, 19),
(137, 29, 29, 1),
(138, 1, 30, 1),
(139, 8, 30, 1),
(140, 10, 30, 14),
(141, 14, 30, 14),
(142, 16, 30, 1),
(143, 20, 30, 14),
(144, 21, 30, 1),
(145, 22, 30, 1),
(146, 23, 30, 1),
(147, 25, 30, 14),
(148, 26, 30, 1),
(149, 27, 30, 1),
(150, 28, 30, 19),
(151, 29, 30, 1),
(152, 1, 31, 2),
(153, 8, 31, 2),
(154, 10, 31, 14),
(155, 14, 31, 14),
(156, 16, 31, 2),
(157, 20, 31, 14),
(158, 21, 31, 2),
(159, 22, 31, 2),
(160, 23, 31, 2),
(161, 25, 31, 14),
(162, 26, 31, 2),
(163, 27, 31, 2),
(164, 28, 31, 19),
(165, 29, 31, 2),
(166, 1, 32, 2),
(167, 8, 32, 2),
(168, 10, 32, 14),
(169, 14, 32, 14),
(170, 16, 32, 2),
(171, 20, 32, 14),
(172, 21, 32, 2),
(173, 22, 32, 2),
(174, 23, 32, 2),
(175, 25, 32, 14),
(176, 26, 32, 2),
(177, 27, 32, 2),
(178, 28, 32, 19),
(179, 29, 32, 2),
(180, 1, 33, 2),
(181, 8, 33, 2),
(182, 10, 33, 14),
(183, 14, 33, 14),
(184, 16, 33, 2),
(185, 20, 33, 14),
(186, 21, 33, 2),
(187, 22, 33, 2),
(188, 23, 33, 2),
(189, 25, 33, 14),
(190, 26, 33, 2),
(191, 27, 33, 2),
(192, 28, 33, 19),
(193, 29, 33, 2),
(194, 1, 34, 2),
(195, 8, 34, 2),
(196, 10, 34, 14),
(197, 14, 34, 14),
(198, 16, 34, 2),
(199, 20, 34, 14),
(200, 21, 34, 2),
(201, 22, 34, 2),
(202, 23, 34, 2),
(203, 25, 34, 14),
(204, 26, 34, 2),
(205, 27, 34, 2),
(206, 28, 34, 19),
(207, 29, 34, 2),
(208, 1, 35, 3),
(209, 8, 35, 3),
(210, 10, 35, 14),
(211, 14, 35, 14),
(212, 16, 35, 3),
(213, 20, 35, 14),
(214, 21, 35, 3),
(215, 22, 35, 3),
(216, 23, 35, 3),
(217, 25, 35, 14),
(218, 26, 35, 3),
(219, 27, 35, 3),
(220, 28, 35, 19),
(221, 29, 35, 3),
(222, 1, 36, 4),
(223, 8, 36, 4),
(224, 10, 36, 14),
(225, 14, 36, 14),
(226, 20, 36, 14),
(227, 21, 36, 4),
(228, 22, 36, 4),
(229, 23, 36, 4),
(230, 25, 36, 14),
(231, 26, 36, 4),
(232, 28, 36, 19),
(233, 1, 37, 6),
(234, 8, 37, 6),
(235, 10, 37, 14),
(236, 14, 37, 14),
(237, 20, 37, 14),
(238, 21, 37, 6),
(239, 22, 37, 6),
(240, 23, 37, 6),
(241, 25, 37, 14),
(242, 26, 37, 6),
(243, 2, 15, 7),
(244, 3, 14, 8),
(245, 4, 19, 9),
(246, 5, 19, 9),
(247, 7, 19, 9),
(248, 8, 19, 9),
(249, 12, 19, 9),
(250, 14, 19, 14),
(251, 20, 19, 14),
(252, 23, 19, 9),
(253, 24, 19, 9),
(254, 25, 19, 14),
(255, 6, 12, 10),
(256, 23, 12, 10),
(257, 7, 17, 11),
(258, 8, 17, 11),
(259, 14, 17, 14),
(260, 20, 17, 14),
(261, 22, 17, 11),
(262, 23, 17, 11),
(263, 25, 17, 14),
(264, 7, 18, 11),
(265, 8, 18, 11),
(266, 14, 18, 14),
(267, 20, 18, 14),
(268, 22, 18, 11),
(269, 23, 18, 11),
(270, 25, 18, 14),
(271, 9, 16, 13),
(272, 18, 16, 13),
(273, 8, 40, 12),
(274, 14, 40, 14),
(275, 20, 40, 14),
(276, 21, 40, 12),
(277, 22, 40, 12),
(278, 23, 40, 12),
(279, 25, 40, 14),
(280, 26, 40, 12),
(281, 28, 40, 19),
(282, 11, 4, 15),
(283, 15, 4, 17),
(284, 13, 10, 16),
(285, 19, 10, 16),
(286, 17, 3, 18),
(287, 14, 39, 14),
(288, 20, 39, 14),
(289, 23, 39, 10),
(290, 25, 39, 14),
(291, 1, 1, 1),
(292, 1, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `klp_area`
--

CREATE TABLE IF NOT EXISTS `klp_area` (
  `id_klp` int(4) NOT NULL AUTO_INCREMENT,
  `nama_klp` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_klp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `klp_area`
--

INSERT INTO `klp_area` (`id_klp`, `nama_klp`) VALUES
(1, 'AREA KLINIK'),
(2, 'AREA MANAJEMEN'),
(3, 'SASARAN KESELAMATAN PASIEN'),
(4, 'INTERNATIONAL LIBRARY');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pj_data`
--

CREATE TABLE IF NOT EXISTS `pj_data` (
  `id_pjdata` int(2) NOT NULL AUTO_INCREMENT,
  `nama_pjdata` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pjdata`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `pj_data`
--

INSERT INTO `pj_data` (`id_pjdata`, `nama_pjdata`) VALUES
(1, 'IRNA A'),
(2, 'IRNA B'),
(3, 'IRNA C'),
(4, 'IRI'),
(5, 'IRI Anak'),
(6, 'HCU'),
(7, 'IPK'),
(8, 'IRAD'),
(9, 'IBS'),
(10, 'Farmasi'),
(11, 'IRD'),
(12, 'Persalinan'),
(13, 'IRM'),
(14, 'PPI'),
(15, 'Diklit'),
(16, 'Akuntansi'),
(17, 'Diklat'),
(18, 'SDM'),
(19, 'Ponek'),
(20, 'IRJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_indikator`
--

CREATE TABLE IF NOT EXISTS `rekap_indikator` (
  `id_rekap` int(3) NOT NULL AUTO_INCREMENT,
  `id_ind_satker` int(4) NOT NULL,
  `tgl` date NOT NULL,
  `numerator` int(6) DEFAULT NULL,
  `denumerator` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_rekap`),
  KEY `FK_id_ind_satker` (`id_ind_satker`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data untuk tabel `rekap_indikator`
--

INSERT INTO `rekap_indikator` (`id_rekap`, `id_ind_satker`, `tgl`, `numerator`, `denumerator`) VALUES
(1, 12, '2015-05-15', 100, 100),
(2, 13, '2015-05-15', 1, 120),
(3, 14, '2015-05-15', 2, 110),
(4, 15, '2015-05-15', 1, 100),
(5, 16, '2015-05-15', 125, 130),
(6, 17, '2015-05-15', 95, 100),
(7, 18, '2015-05-15', 100, 110),
(8, 19, '2015-05-15', 125, 130),
(9, 20, '2015-05-15', 110, 115),
(10, 21, '2015-05-15', 100, 110),
(11, 22, '2015-05-15', 130, 130),
(12, 23, '2015-05-15', 110, 110),
(13, 24, '2015-05-15', 140, 145),
(14, 25, '2015-05-15', 120, 125),
(15, 12, '2015-05-20', 100, 100),
(16, 13, '2015-05-20', 4, 120),
(17, 14, '2015-05-20', 1, 110),
(18, 15, '2015-05-20', 2, 150),
(19, 16, '2015-05-20', 112, 115),
(20, 17, '2015-05-20', 145, 150),
(21, 18, '2015-05-20', 175, 180),
(22, 19, '2015-05-20', 170, 170),
(23, 20, '2015-05-20', 295, 200),
(24, 21, '2015-05-20', 300, 200),
(25, 22, '2015-05-20', 200, 200),
(26, 23, '2015-05-20', 130, 130),
(27, 24, '2015-05-20', 145, 145),
(28, 25, '2015-05-20', 180, 180),
(29, 12, '2015-05-25', 100, 100),
(30, 13, '2015-05-25', 3, 120),
(31, 14, '2015-05-25', 5, 110),
(32, 15, '2015-05-25', 3, 150),
(33, 16, '2015-05-25', 113, 115),
(34, 17, '2015-05-25', 150, 150),
(35, 18, '2015-05-25', 180, 180),
(36, 19, '2015-05-25', 170, 170),
(37, 20, '2015-05-25', 200, 200),
(38, 21, '2015-05-25', 295, 200),
(39, 22, '2015-05-25', 195, 200),
(40, 23, '2015-05-25', 130, 130),
(41, 24, '2015-05-25', 140, 145),
(42, 25, '2015-05-25', 175, 180),
(43, 278, '2015-05-15', 1, 100),
(44, 279, '2015-05-15', 1, 120),
(45, 280, '2015-05-15', 2, 110),
(46, 281, '2015-05-15', 100, 100),
(47, 282, '2015-05-15', 130, 130),
(48, 283, '2015-05-15', 100, 100),
(49, 284, '2015-05-15', 110, 110),
(50, 278, '2015-05-20', 2, 120),
(51, 279, '2015-05-20', 3, 130),
(52, 280, '2015-05-20', 1, 145),
(53, 281, '2015-05-20', 100, 100),
(54, 282, '2015-05-20', 130, 130),
(55, 283, '2015-05-20', 100, 100),
(56, 284, '2015-05-20', 110, 110),
(57, 278, '2015-05-25', 3, 100),
(58, 279, '2015-05-25', 1, 120),
(59, 280, '2015-05-25', 1, 110),
(60, 281, '2015-05-25', 120, 125),
(61, 282, '2015-05-25', 130, 130),
(62, 283, '2015-05-25', 110, 110),
(63, 284, '2015-05-25', 110, 110),
(64, 236, '2015-05-15', 110, 110),
(65, 237, '2015-05-15', 2, 120),
(66, 238, '2015-05-15', 1, 130),
(67, 239, '2015-05-15', 3, 120),
(68, 240, '2015-05-15', 110, 110),
(69, 241, '2015-05-15', 112, 115),
(70, 242, '2015-05-15', 120, 120),
(71, 243, '2015-05-15', 130, 130),
(72, 244, '2015-05-15', 135, 140),
(73, 245, '2015-05-15', 120, 125),
(74, 246, '2015-05-15', 130, 130),
(75, 236, '2015-05-20', 120, 120),
(76, 237, '2015-05-20', 1, 130),
(77, 238, '2015-05-20', 1, 125),
(78, 239, '2015-05-20', 2, 150),
(79, 240, '2015-05-20', 120, 120),
(80, 241, '2015-05-20', 130, 130),
(81, 242, '2015-05-20', 140, 140),
(82, 243, '2015-05-20', 135, 145),
(83, 244, '2015-05-20', 135, 140),
(84, 245, '2015-05-20', 125, 125),
(85, 246, '2015-05-20', 130, 135),
(86, 236, '2015-05-25', 145, 145),
(87, 237, '2015-05-25', 1, 150),
(88, 238, '2015-05-25', 1, 150),
(89, 239, '2015-05-25', 1, 150),
(90, 240, '2015-05-25', 130, 130),
(91, 241, '2015-05-25', 140, 140),
(92, 242, '2015-05-25', 140, 140),
(93, 243, '2015-05-25', 150, 150),
(94, 244, '2015-05-25', 140, 140),
(95, 245, '2015-05-25', 130, 135),
(96, 246, '2015-05-25', 135, 135),
(97, 282, '2015-06-01', 1, 1),
(98, 283, '2015-06-01', 1, 1),
(99, 194, '2015-06-01', 0, 2),
(100, 194, '2015-05-31', 2, 2),
(101, 194, '2015-05-30', 5, 5),
(102, 194, '2015-05-29', 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satker`
--

CREATE TABLE IF NOT EXISTS `satker` (
  `id_satker` int(4) NOT NULL AUTO_INCREMENT,
  `id_unit` int(4) NOT NULL,
  `nama_satker` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_satker`),
  KEY `FK_id_unit` (`id_unit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data untuk tabel `satker`
--

INSERT INTO `satker` (`id_satker`, `id_unit`, `nama_satker`) VALUES
(1, 11, 'Instalasi SIRS'),
(2, 11, 'Komite Mutu'),
(3, 1, 'Subbag SDM'),
(4, 1, 'Subbag DikLit'),
(5, 1, 'MonEv Pelayanan Medik'),
(6, 1, 'PP Fas Medik dan Keperawatan'),
(7, 1, 'Instalasi Humas'),
(8, 1, 'PP Pelayanan Keperawatan'),
(9, 1, 'Mobilisasi Dana'),
(10, 1, 'Akuntansi Keuangan'),
(11, 1, 'Evaluasi dan Pelaporan'),
(12, 2, 'Instalasi Farmasi'),
(13, 2, 'IPSRS'),
(14, 2, 'Instalasi Radiologi'),
(15, 2, 'Instalasi Patologi Klinik'),
(16, 2, 'Instalasi Rekam Medik'),
(17, 3, 'IGD Lt. 1'),
(18, 3, 'IGD Lt. 2'),
(19, 4, 'IBS'),
(20, 5, 'IRNA A'),
(21, 5, 'IRNA B'),
(22, 5, 'Ruang Anggrek'),
(23, 5, 'Ruang Bakung'),
(24, 5, 'Ruang P/N'),
(25, 5, 'Ruang Dahlia'),
(26, 5, 'Ruang Edelweis'),
(27, 5, 'Ruang Melati I'),
(28, 5, 'Ruang Melati II'),
(29, 5, 'Ruang Melati III'),
(30, 5, 'Ruang Melati IV'),
(31, 5, 'Ruang Mawar'),
(32, 5, 'Ruang Aster'),
(33, 5, 'Ruang Lily'),
(34, 5, 'Ruang Teratai'),
(35, 5, 'Ruang C/C'),
(36, 6, 'Ruang IRI'),
(37, 7, 'Ruang HCU'),
(38, 8, 'Ruang Hemodialisa'),
(39, 9, 'Ruang Rawat Jalan'),
(40, 10, 'Ruang Persalinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'test1', 'pass1', 'test1@example.com'),
(2, 'test2', 'pass2', 'test2@example.com'),
(3, 'test3', 'pass3', 'test3@example.com'),
(4, 'test4', 'pass4', 'test4@example.com'),
(5, 'test5', 'pass5', 'test5@example.com'),
(6, 'test6', 'pass6', 'test6@example.com'),
(7, 'test7', 'pass7', 'test7@example.com'),
(8, 'test8', 'pass8', 'test8@example.com'),
(9, 'test9', 'pass9', 'test9@example.com'),
(10, 'test10', 'pass10', 'test10@example.com'),
(11, 'test11', 'pass11', 'test11@example.com'),
(12, 'test12', 'pass12', 'test12@example.com'),
(13, 'test13', 'pass13', 'test13@example.com'),
(14, 'test14', 'pass14', 'test14@example.com'),
(15, 'test15', 'pass15', 'test15@example.com'),
(16, 'test16', 'pass16', 'test16@example.com'),
(17, 'test17', 'pass17', 'test17@example.com'),
(18, 'test18', 'pass18', 'test18@example.com'),
(19, 'test19', 'pass19', 'test19@example.com'),
(20, 'test20', 'pass20', 'test20@example.com'),
(21, 'test21', 'pass21', 'test21@example.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `id_unit` int(4) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Manajemen'),
(2, 'Penunjang Medis'),
(3, 'Instalasi Rawat Darurat'),
(4, 'Instalasi Bedah Sentral'),
(5, 'Instalasi Rawat Inap'),
(6, 'Instalasi Rawat Intensif'),
(7, 'High Care Unit'),
(8, 'Hemodialisa'),
(9, 'Instalasi Rawat Jalan'),
(10, 'Persalinan'),
(11, 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) DEFAULT NULL,
  `nama_user` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `level` int(4) NOT NULL,
  `id_satker` int(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `FK_id_satker` (`id_satker`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama_user`, `jabatan`, `level`, `id_satker`, `username`, `password`) VALUES
(4, '1111111111', 'Admin SIRS', 'Admin SIRS', 1, 1, 'sirs', '3dc0e504ce2cba3102cdfa616ecd77c5'),
(5, '2222222222', 'Komite Mutu', 'Komite Mutu', 1, 2, 'komitemutu', '75eed178918d86ac17c8217df61d1111'),
(6, '3333333333', 'Bambang Triyono, SH.', 'Pengadministrasi Kepegawaian', 2, 3, 'bambang', 'a9711cbb2e3c2d5fc97a63e45bbe5076'),
(7, '4444444444', 'Mariska Sendisetya, S. KM.', 'Analis Data', 2, 4, 'mariska', '71353eb9108adcdc1fb9506ace0e77c5'),
(8, '', 'dr. Budi Santoso, Sp. THT-KL, M.Sc.', 'Kasi Monev Pelayanan Medik', 2, 5, 'budisantoso', 'd54626f93a54aa886d09408cc37121b1'),
(9, '', 'Widada, S.SiT', 'Kasi PP Fasilitas Medik dan Keperawatan', 2, 6, 'widada', 'a77c0c0aa4c34e21e8c0a8c4c02c0bb8'),
(10, '', 'Yuia Ariningtyas L., SMIP', 'Ka. Instalasi Humas', 2, 7, 'yulia', '03be66295cd7eb6cf6001c9181bb904d'),
(11, '', 'Juniarsih, S. Kep. Ns', 'Kasi PP Pelayanan Keperawatan', 2, 8, 'juniarsih', '3f085275bc692f919466a3d7e8bba2da'),
(12, '', 'Sri Hastuti, SE', 'Kasubbag Mobilisasi Dana', 2, 9, 'srihastuti', '1f942a88de3c95d37473fcfe2a08840d'),
(13, '', 'Pratami Kuswidyastuti, SE', 'Subbag Akuntansi Keuangan', 2, 10, 'pratami', '3f9477068905f8aa7f0a69c0187a3da5'),
(14, '', 'Ike Yuliastuti Purwaningsih', 'Subbag Evaluasi dan Pelaporan', 2, 11, 'ikeyuliastuti', '5f732912bb957650355121e8e7c700bb'),
(15, '', 'Atik Nuryah Danaswari, S. Farm, Apt.', 'Apoteker', 2, 12, 'atiknuryah', 'efdc5da45e1c8478887d177399139e3d'),
(16, '', 'Surtiningsih, S. Kep, Ns', 'Ka. IPSRS', 2, 13, 'surtiningsih', '7474612b3b2a1055678b58de7a2f9304'),
(17, '', 'Joko Sunoto, A.Md. Rad.', 'Radiolog', 2, 14, 'jokosunoto', '2fd0a0038908ccc4d3a0bcb07df3f3ff'),
(18, '', 'Pius Rumpoko', 'Sub Instalasi Patologi Klinik', 2, 15, 'piusrumpoko', '7fd6f8197de8754a8b46936f6a9959f3'),
(19, '', 'Yuliana Dwi Utami', 'Staf Rekam Medik', 2, 16, 'yuliana', '1de5c967b45b9ad642de61ba3eb68d80'),
(20, '', 'Ana Dwi Irianti, S.SiT', 'PN/CI IGD', 2, 17, 'anadwi', 'b39bca850c43b11a2d91bd11a9c6fb9e'),
(21, '', 'Basuku, AMK', 'Koord. IGD Lt. II', 2, 18, 'basuki', 'b4e364bb5eab14eedd9ae3d54437d52f'),
(22, '', 'Suprapto, S.SiT', 'AN IBS', 2, 19, 'suprapto', 'beb204ded84ba984ee5b74f4f4bcf9f2'),
(23, '', 'Dewi Susilowati, S.Kep., Ns', 'Ka. IRNA A', 2, 20, 'dewisusilowati', '08f2fecd7ff2372c2d12570ae1bd9565'),
(24, '', 'Supri Lestari, S.SiT', 'ka. IRNA B', 2, 21, 'supri', 'd79444495ba8886c397b418227564d3f'),
(25, '', 'Yustina Anindyawati, S.Kep., Ns', 'PN Anggrek', 2, 22, 'yustina', '284b5ba32062ef73ba349fee01c3ebb3'),
(26, '', 'Dewi Wirawati, S.SiT', 'PN Bakung', 2, 23, 'dewiwirawati', '52bb14cc9d69522b6a89b7aa2a41617f'),
(27, '', 'Sri Suprihatin, S.Kep., Ns', 'PN P/N', 2, 24, 'srisuprihatin', '2d7bca10de4ba43d2f8fc5d0f97effda'),
(28, '', 'Sri Setiti, AMK', 'PN Dahlia', 2, 25, 'srisetiti', 'a92f54bfd893b2f21e33015b48915156'),
(29, '', 'Fitri Nuraeni, AMK', 'PN Edelweis', 2, 26, 'fitri', '534a0b7aa872ad1340d0071cbfa38697'),
(30, '', 'Siwahyudati, AMK', 'PN Melati I', 2, 27, 'siwahyudati', '07261c7570a5a147ea457c188d48c8ec'),
(31, '', 'Eka Hidayati, AMK', 'PN Melati II', 2, 28, 'ekahidayati', 'e5667e191440a633e3985b041defb9da'),
(32, '', 'Rita Suryandari, S.Kep., Ns', 'PN Melati III', 2, 29, 'rita', '2794d223f90059c9f705c73a99384085'),
(33, '', 'Sulistiani, S.Kep., Ns', 'PN Melati IV', 2, 30, 'sulistiani', '41689687caa8b1733abcdefc4a0a3601'),
(34, '', 'Nurhayati, AMK', 'PN Mawar', 2, 31, 'nurhayati', '601a351d479b5cf47d2b544b27484c71'),
(35, '', 'Kristuti Handayani, AMK', 'PS Aster', 2, 32, 'kristuti', 'ff6774f791a4eda7ffc6beb78e66eb87'),
(36, '', 'Elly Rusmawarti Sunardji, S.SiT', 'PN Lily', 2, 33, 'elly', '53c141d072bef4de5df8cd5c42674883'),
(37, '', 'Sukadi, S.SiT', 'PN Teratai', 2, 34, 'sukadi', '4fdce2d5eb75e82f5f4a07be8c81eb27'),
(38, '', 'Purwanto, S.Kep., Ns', 'PN C/C', 2, 35, 'purwanto', 'ba1466ee453e1198e27dabdbbb0501ad'),
(39, '', 'Nur Widayati, AMK', 'PN IRI', 2, 36, 'nurwidayati', 'aa6eb78ff1792c496d9cb06da4257fd6'),
(40, '', 'Muhammad Yasir Sudarmo, AMK', 'PN HCU', 2, 37, 'yasir', '8d03ecfad755ab078ae3fd29c63c2d7d'),
(41, '', 'Tatik Handayani, S.Kep., Ns', 'Ka. Ruang HD', 2, 38, 'tatik', '6c1c87dbed51d7f8516f1d874adb1090'),
(42, '', 'Dwi Hasti Handayani, S.SiT', 'PN IRJ', 2, 39, 'dwihasti', '62fca6db23f1732fc402cffc86b3cd1f'),
(43, '', 'Naning Wulandari, AM. Keb', 'PN Persalinan', 2, 40, 'naning', '7db2c07fafab964f41bd3e2085df1b6e');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD CONSTRAINT `FK_id_klp` FOREIGN KEY (`id_klp`) REFERENCES `klp_area` (`id_klp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ind_satker`
--
ALTER TABLE `ind_satker`
  ADD CONSTRAINT `FK_id_indikator` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_pjdata` FOREIGN KEY (`id_pjdata`) REFERENCES `pj_data` (`id_pjdata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_satker_ind` FOREIGN KEY (`id_satker`) REFERENCES `satker` (`id_satker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rekap_indikator`
--
ALTER TABLE `rekap_indikator`
  ADD CONSTRAINT `FK_id_ind_satker` FOREIGN KEY (`id_ind_satker`) REFERENCES `ind_satker` (`id_ind_satker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `satker`
--
ALTER TABLE `satker`
  ADD CONSTRAINT `FK_id_unit` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_id_satker` FOREIGN KEY (`id_satker`) REFERENCES `satker` (`id_satker`) ON DELETE CASCADE ON UPDATE CASCADE;
