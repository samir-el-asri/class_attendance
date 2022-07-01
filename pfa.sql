-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 01, 2022 at 11:30 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfa`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

DROP TABLE IF EXISTS `absences`;
CREATE TABLE IF NOT EXISTS `absences` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `confirmee` tinyint(1) NOT NULL DEFAULT '0',
  `justifiee` tinyint(1) NOT NULL DEFAULT '0',
  `seance_id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `absences_date_seance_id_etudiant_id_unique` (`date`,`seance_id`,`etudiant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id`, `date`, `confirmee`, `justifiee`, `seance_id`, `etudiant_id`, `created_at`, `updated_at`) VALUES
(26, '2022-05-11', 0, 0, 141, 20, '2022-06-29 04:30:53', '2022-06-29 04:30:53'),
(25, '2022-05-04', 0, 0, 139, 20, '2022-06-29 04:30:45', '2022-06-29 04:30:45'),
(24, '2022-06-22', 0, 0, 168, 19, '2022-06-29 04:29:35', '2022-06-29 04:29:35'),
(23, '2022-06-22', 0, 0, 168, 18, '2022-06-29 04:29:35', '2022-06-29 04:29:35'),
(22, '2022-06-29', 0, 0, 169, 19, '2022-06-29 04:29:28', '2022-06-29 04:29:28'),
(21, '2022-06-29', 0, 0, 169, 18, '2022-06-29 04:29:28', '2022-06-29 04:29:28'),
(20, '2022-06-22', 0, 0, 163, 19, '2022-06-29 04:29:06', '2022-06-29 04:29:06'),
(19, '2022-06-22', 0, 0, 163, 14, '2022-06-29 04:29:06', '2022-06-29 04:29:06'),
(27, '2022-05-11', 0, 0, 141, 21, '2022-06-29 04:30:53', '2022-06-29 04:30:53'),
(28, '2022-05-25', 0, 0, 145, 20, '2022-06-29 04:31:12', '2022-06-29 04:31:12'),
(29, '2022-05-25', 0, 0, 145, 21, '2022-06-29 04:31:12', '2022-06-29 04:31:12'),
(30, '2022-05-25', 0, 0, 146, 15, '2022-06-29 04:31:17', '2022-06-29 04:31:17'),
(31, '2022-06-01', 0, 0, 147, 20, '2022-06-29 04:31:22', '2022-06-29 04:31:22'),
(32, '2022-06-08', 0, 0, 128, 15, '2022-06-29 04:31:49', '2022-06-29 04:31:49'),
(33, '2022-06-08', 0, 0, 127, 20, '2022-06-29 04:31:53', '2022-06-29 04:31:53'),
(34, '2022-06-08', 0, 0, 127, 21, '2022-06-29 04:31:53', '2022-06-29 04:31:53'),
(35, '2022-06-15', 0, 0, 130, 15, '2022-06-29 04:31:57', '2022-06-29 04:31:57'),
(36, '2022-06-22', 0, 0, 131, 20, '2022-06-29 04:32:02', '2022-06-29 04:32:02'),
(37, '2022-06-22', 0, 0, 131, 21, '2022-06-29 04:32:02', '2022-06-29 04:32:02'),
(38, '2022-06-15', 0, 0, 173, 21, '2022-06-29 04:33:02', '2022-06-29 04:33:02'),
(39, '2022-06-22', 0, 0, 175, 20, '2022-06-29 04:46:29', '2022-06-29 04:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `filiere_id` int(11) NOT NULL,
  `groupe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` int(11) NOT NULL,
  `anneeScolaire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `filiere_id`, `groupe`, `annee`, `anneeScolaire`, `created_at`, `updated_at`) VALUES
(1, 1, 'G2', 3, '2021/2022', '2022-05-23 22:53:07', '2022-07-01 22:28:22'),
(2, 1, 'G1', 3, '2021-2022', '2022-05-24 08:37:01', '2022-05-24 09:00:02'),
(5, 4, 'G0', 4, '2022/2023', '2022-06-03 19:47:21', '2022-06-03 19:47:21'),
(6, 3, 'G1', 5, '2022/2023', '2022-06-04 15:37:23', '2022-06-04 15:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `enseignants`
--

DROP TABLE IF EXISTS `enseignants`;
CREATE TABLE IF NOT EXISTS `enseignants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveauAcademique` int(11) NOT NULL,
  `statut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sexe` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enseignants`
--

INSERT INTO `enseignants` (`id`, `nom`, `prenom`, `niveauAcademique`, `statut`, `created_at`, `updated_at`, `email`, `password`, `user_id`, `sexe`) VALUES
(51, 'Drake', 'Dinah', 5, 'Permanent', '2022-06-29 04:11:30', '2022-06-29 04:11:30', 'dinahdrake@gmail.com', '$2y$10$hB5tmGsZFcM/Qi1IH1CSdO/LttEndYN5opcNaPCmG0g9x5F.Xhz7y', 43, 'F'),
(48, 'Wayne', 'Bruce', 5, 'Vacataire', '2022-06-29 04:09:13', '2022-06-29 04:09:13', 'brucewayne@gmail.com', '$2y$10$DA/ftsoVQUsVa1d0U1TsV.LjhbBfOcSl8I/2vX2adxZ4SFGL5NsTq', 40, 'M'),
(53, 'test', 'test', 5, 'Permanent', '2022-06-29 04:43:41', '2022-06-29 04:43:41', 'test@gmail.com', '$2y$10$gtezkDMkZIJN5SKZHLVrpu8l3ndPynfz8uDU8QvozXgsH.8jQxeRW', NULL, 'M'),
(50, 'Prince', 'Diana', 7, 'Permanent', '2022-06-29 04:10:11', '2022-06-29 04:10:11', 'dianaprince@gmail.com', '$2y$10$yaUTEAa.6WKjJK90sF/jKuIbC8dkvPkpy3FnbBtDJNkuxftcOSPcO', 42, 'F'),
(52, 'Parker', 'Peter', 3, 'Vacataire', '2022-06-29 04:12:23', '2022-06-29 04:12:23', 'peterparker@gmail.com', '$2y$10$c98JcXqHFhtG5p5f9k90ue6tkjfljFomRTPIfgj7Z4DMen0Rg2.7i', 44, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sexe` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `etudiants_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `age`, `classe_id`, `created_at`, `updated_at`, `email`, `password`, `user_id`, `sexe`) VALUES
(20, 'abcd', 'abcd', 20, 1, '2022-06-29 04:26:45', '2022-06-29 04:26:45', 'aaaa@gmail.com', '$2y$10$OVL9S/lXh.5BqI.vVMu.9ueSAKJGUS/5XXJU4X3U2LbGCavlOUYLq', 51, 'M'),
(21, 'bbbb', 'bbbb', 21, 1, '2022-06-29 04:27:10', '2022-06-29 04:27:10', 'bbbb@gmail.com', '$2y$10$8CAVUT2YaRJanE1SQ9pu6.LV5uPvgl0U.bsSCdSH/OoiBNLMnITC6', 52, 'F'),
(22, 'El Asri', 'Samir', 26, 1, '2022-06-29 04:44:40', '2022-06-29 04:44:40', 'samirel731@gmail.com', '$2y$10$7lwr/r.OW0t8X8mtt8UM7e6HkfLNLJC3TXjldtGRsuXifFW5/GPLm', 53, 'M'),
(15, 'Gordon', 'Barbara', 19, 2, '2022-06-29 04:14:26', '2022-06-29 04:14:26', 'barbaragordon@gmail.com', '$2y$10$hbTMQ7Xb3DjLbRn6WYuJ8.N8R3cb6EQ8qAVuZpGZ/Ei4E4.hR/Qg.', 46, 'F'),
(14, 'Kent', 'Connor', 21, 5, '2022-06-29 04:13:46', '2022-06-29 04:13:46', 'connorkent@gmail.com', '$2y$10$7nrQjFnJ5R..h43kkAuF8OeCeLABaaMSR.jSCP1gxZZ8TWM6mWdRS', 45, 'M'),
(18, 'Wayne', 'Damyane', 18, 5, '2022-06-29 04:17:56', '2022-06-29 04:17:56', 'damyanewayne@gmail.com', '$2y$10$Qw.qu36oilmI5vgpmgIXjuTFsEVyEFUF6RrjkvhAJPg2wDngo4lEq', 49, 'M'),
(19, 'test', 'test', 23, 5, '2022-06-29 04:18:37', '2022-06-29 04:18:37', 'test@gmail.com', '$2y$10$26QKy/z9LvGkfxQ.OeGtmOD4fFIRBqIh/loYn8EG3ibZo1ueUAwxe', 50, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filieres`
--

DROP TABLE IF EXISTS `filieres`;
CREATE TABLE IF NOT EXISTS `filieres` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filieres`
--

INSERT INTO `filieres` (`id`, `titre`, `abbreviation`, `created_at`, `updated_at`) VALUES
(1, 'Ingénierie Informatique et Réseaux', 'IIR', '2022-05-23 22:31:19', '2022-07-01 22:28:22'),
(2, 'Ingénierie Financière et Audit', 'IFA', '2022-05-23 22:31:50', '2022-05-23 22:31:50'),
(3, 'Ingénierie Automatismes et Informatique Industrielle', 'IAII', '2022-05-23 22:32:26', '2022-05-23 22:32:26'),
(4, 'Génie Industriel', 'GI', '2022-05-23 22:32:44', '2022-05-23 22:32:44'),
(5, 'Génie Civil, Bâtiments Et Travaux Publics (Btp)', 'GC', '2022-05-23 22:33:15', '2022-05-23 22:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `justifications`
--

DROP TABLE IF EXISTS `justifications`;
CREATE TABLE IF NOT EXISTS `justifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `validee` tinyint(1) NOT NULL DEFAULT '0',
  `document` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `justifications`
--

INSERT INTO `justifications` (`id`, `dateDebut`, `dateFin`, `validee`, `document`, `etudiant_id`, `created_at`, `updated_at`) VALUES
(3, '2022-06-01', '2022-06-30', 0, 'justificatif absences_etudiantId_18_1656481018.pdf', 18, '2022-06-29 04:36:58', '2022-06-29 04:36:58'),
(4, '2022-06-15', '2022-05-25', 0, 'justificatif absences_etudiantId_19_1656481071.pdf', 19, '2022-06-29 04:37:51', '2022-06-29 04:37:51'),
(5, '2022-06-02', '2022-06-10', 0, 'justificatif absences_etudiantId_19_1656481686.pdf', 19, '2022-06-29 04:48:06', '2022-06-29 04:48:06'),
(6, '2022-06-02', '2022-06-09', 0, 'justificatif absences_etudiantId_19_1656481961.pdf', 19, '2022-06-29 04:52:41', '2022-06-29 04:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
CREATE TABLE IF NOT EXISTS `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coefficient` double(10,2) NOT NULL,
  `filiere_id` int(11) NOT NULL,
  `enseignant_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nbreSeances` int(11) NOT NULL,
  `dureeSeance` double(10,2) NOT NULL,
  `dateDebut` date NOT NULL DEFAULT '2022-06-03',
  `annee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matieres`
--

INSERT INTO `matieres` (`id`, `titre`, `coefficient`, `filiere_id`, `enseignant_id`, `created_at`, `updated_at`, `nbreSeances`, `dureeSeance`, `dateDebut`, `annee`) VALUES
(40, 'Assembly', 3.50, 1, 48, '2022-06-29 04:54:54', '2022-06-29 04:55:10', 5, 1.50, '2022-10-26', 4),
(39, 'C', 3.00, 1, 51, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 8, 2.00, '2022-06-08', 3),
(38, 'C++', 1.50, 4, 50, '2022-06-29 04:22:30', '2022-06-29 04:22:30', 5, 2.50, '2022-06-15', 4),
(36, 'C#', 3.50, 1, 48, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 12, 3.50, '2022-04-27', 3),
(37, 'Java', 4.50, 4, 52, '2022-06-29 04:21:51', '2022-06-29 04:21:51', 5, 2.00, '2022-06-15', 4),
(35, 'Python', 2.00, 1, 51, '2022-06-29 04:19:40', '2022-06-29 04:19:40', 6, 2.00, '2022-06-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(6, '2022_05_16_223350_create_sessions_table', 2),
(7, '2022_05_17_110759_create_etudiants_table', 3),
(8, '2022_05_17_111736_create_classes_table', 3),
(9, '2022_05_23_220135_create_filieres_table', 4),
(10, '2022_05_23_223305_create_matieres_table', 4),
(11, '2022_05_23_225101_create_classes_table', 5),
(12, '2022_05_23_230528_create_filieres_table', 6),
(13, '2022_05_23_235218_create_classes_table', 7),
(14, '2022_05_24_105841_create_matieres_table', 8),
(16, '2022_05_30_140800_create_enseignants_table', 9),
(17, '2022_05_30_232356_create_etudiants_table', 10),
(18, '2022_05_30_234844_create_matieres_table', 11),
(19, '2022_06_03_001813_add_nbre_seances_to_matiere', 12),
(20, '2022_06_03_003123_create_seances_table', 13),
(21, '2022_06_03_004450_add_duree_seance_to_matieres', 14),
(22, '2022_06_03_005854_add_date_debut_to_matieres', 15),
(23, '2022_06_03_193333_add_annee_to_matieres', 16),
(24, '2022_06_03_230806_add_fonction_to_users', 17),
(25, '2022_06_03_232405_add_stuff_to_etudiants', 18),
(26, '2022_06_04_010606_as_stuff_to_enseignants', 19),
(27, '2022_06_04_010627_as_stuff_to_etudiants', 19),
(28, '2022_06_04_191715_add_sexe_to_etudiants', 20),
(29, '2022_06_04_191730_add_sexe_to_enseignants', 20),
(30, '2022_06_04_211009_create_absences_table', 21),
(31, '2022_06_05_214308_add_stuff_to_seances', 22),
(32, '2022_06_05_235351_create_absences_table', 23),
(33, '2022_06_29_022730_create_justifications_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seances`
--

DROP TABLE IF EXISTS `seances`;
CREATE TABLE IF NOT EXISTS `seances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `matiere_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `absenceMarquee` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=189 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seances`
--

INSERT INTO `seances` (`id`, `date`, `matiere_id`, `classe_id`, `created_at`, `updated_at`, `absenceMarquee`) VALUES
(160, '2022-07-13', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(159, '2022-07-13', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(158, '2022-07-06', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(157, '2022-07-06', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(156, '2022-06-29', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(155, '2022-06-29', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(154, '2022-06-22', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(153, '2022-06-22', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(152, '2022-06-15', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(151, '2022-06-15', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(150, '2022-06-08', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(149, '2022-06-08', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(148, '2022-06-01', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(147, '2022-06-01', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:31:22', 1),
(146, '2022-05-25', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:31:17', 1),
(145, '2022-05-25', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:31:12', 1),
(144, '2022-05-18', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(143, '2022-05-18', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:31:03', 1),
(142, '2022-05-11', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:30:57', 1),
(141, '2022-05-11', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:30:53', 1),
(140, '2022-05-04', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:30:50', 1),
(139, '2022-05-04', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:30:45', 1),
(138, '2022-07-13', 35, 2, '2022-06-29 04:19:40', '2022-06-29 04:19:40', 0),
(137, '2022-07-13', 35, 1, '2022-06-29 04:19:40', '2022-06-29 04:19:40', 0),
(136, '2022-07-06', 35, 2, '2022-06-29 04:19:40', '2022-06-29 04:19:40', 0),
(135, '2022-07-06', 35, 1, '2022-06-29 04:19:40', '2022-06-29 04:19:40', 0),
(134, '2022-06-29', 35, 2, '2022-06-29 04:19:40', '2022-06-29 04:46:40', 1),
(133, '2022-06-29', 35, 1, '2022-06-29 04:19:40', '2022-06-29 04:19:40', 0),
(132, '2022-06-22', 35, 2, '2022-06-29 04:19:40', '2022-06-29 04:19:40', 0),
(131, '2022-06-22', 35, 1, '2022-06-29 04:19:40', '2022-06-29 04:32:02', 1),
(130, '2022-06-15', 35, 2, '2022-06-29 04:19:40', '2022-06-29 04:31:57', 1),
(129, '2022-06-15', 35, 1, '2022-06-29 04:19:40', '2022-06-29 04:24:34', 0),
(128, '2022-06-08', 35, 2, '2022-06-29 04:19:40', '2022-06-29 04:31:49', 1),
(127, '2022-06-08', 35, 1, '2022-06-29 04:19:40', '2022-06-29 04:31:53', 1),
(161, '2022-07-20', 36, 1, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(162, '2022-07-20', 36, 2, '2022-06-29 04:20:39', '2022-06-29 04:20:39', 0),
(163, '2022-06-22', 37, 5, '2022-06-29 04:21:51', '2022-06-29 04:29:06', 1),
(164, '2022-06-29', 37, 5, '2022-06-29 04:21:51', '2022-06-29 04:21:51', 0),
(165, '2022-07-06', 37, 5, '2022-06-29 04:21:51', '2022-06-29 04:21:51', 0),
(166, '2022-07-13', 37, 5, '2022-06-29 04:21:51', '2022-06-29 04:21:51', 0),
(167, '2022-07-20', 37, 5, '2022-06-29 04:21:51', '2022-06-29 04:21:51', 0),
(168, '2022-06-22', 38, 5, '2022-06-29 04:22:30', '2022-06-29 04:29:35', 1),
(169, '2022-06-29', 38, 5, '2022-06-29 04:22:30', '2022-06-29 04:29:28', 1),
(170, '2022-07-06', 38, 5, '2022-06-29 04:22:30', '2022-06-29 04:22:30', 0),
(171, '2022-07-13', 38, 5, '2022-06-29 04:22:30', '2022-06-29 04:22:30', 0),
(172, '2022-07-20', 38, 5, '2022-06-29 04:22:30', '2022-06-29 04:22:30', 0),
(173, '2022-06-15', 39, 1, '2022-06-29 04:32:48', '2022-06-29 04:33:02', 1),
(174, '2022-06-15', 39, 2, '2022-06-29 04:32:48', '2022-06-29 04:33:06', 1),
(175, '2022-06-22', 39, 1, '2022-06-29 04:32:48', '2022-06-29 04:46:29', 1),
(176, '2022-06-22', 39, 2, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(177, '2022-06-29', 39, 1, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(178, '2022-06-29', 39, 2, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(179, '2022-07-06', 39, 1, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(180, '2022-07-06', 39, 2, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(181, '2022-07-13', 39, 1, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(182, '2022-07-13', 39, 2, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(183, '2022-07-20', 39, 1, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(184, '2022-07-20', 39, 2, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(185, '2022-07-27', 39, 1, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(186, '2022-07-27', 39, 2, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(187, '2022-08-03', 39, 1, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0),
(188, '2022-08-03', 39, 2, '2022-06-29 04:32:48', '2022-06-29 04:32:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('fscc8gTcVEBl2cmlOhZjQHNrxZMaiyR65PLCssDP', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.47', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNkRDSlEzZTdzYnJtQ0lqcThmY0xKUTlUOWd5eVoyaGd4QUMyeXVaYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3QvcGZhL3B1YmxpYy9wYXNzd29yZC9yZXNldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3QvcGZhL3B1YmxpYy9kYXNoYm9hcmQiO319', 1652740878),
('GFAQyLldYke0k4pRvNF8k2zV9cs0uRDGGgq8F0cz', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.47', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaHV6U1pxMkVQQUtMU0JORjRyS05pSDNOZlRhRUl1TDk3MlFZaDBEZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHA6Ly9wZmEvdGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjA6Imh0dHA6Ly9wZmEvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRQU2JkSUtFTTZUMWNjUGhGY3VSWExPV3FMM2xzUkI0aDN5TTZ1ZXdVNU9MZUxXRzZMZGgwVyI7fQ==', 1652743538);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fonction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `fonction`) VALUES
(44, 'Peter Parker', 'peterparker@gmail.com', NULL, '$2y$10$c98JcXqHFhtG5p5f9k90ue6tkjfljFomRTPIfgj7Z4DMen0Rg2.7i', NULL, NULL, NULL, NULL, '2022-06-29 04:12:23', '2022-06-29 04:12:23', 'enseignant'),
(43, 'Dinah Drake', 'dinahdrake@gmail.com', NULL, '$2y$10$hB5tmGsZFcM/Qi1IH1CSdO/LttEndYN5opcNaPCmG0g9x5F.Xhz7y', NULL, NULL, NULL, NULL, '2022-06-29 04:11:30', '2022-06-29 04:11:30', 'enseignant'),
(53, 'Samir El Asri', 'samirel731@gmail.com', NULL, '$2y$10$7lwr/r.OW0t8X8mtt8UM7e6HkfLNLJC3TXjldtGRsuXifFW5/GPLm', NULL, NULL, NULL, NULL, '2022-06-29 04:44:40', '2022-06-29 04:44:40', 'etudiant'),
(42, 'Diana Prince', 'dianaprince@gmail.com', NULL, '$2y$10$yaUTEAa.6WKjJK90sF/jKuIbC8dkvPkpy3FnbBtDJNkuxftcOSPcO', NULL, NULL, NULL, NULL, '2022-06-29 04:10:11', '2022-06-29 04:10:11', 'enseignant'),
(40, 'Bruce Wayne', 'brucewayne@gmail.com', NULL, '$2y$10$DA/ftsoVQUsVa1d0U1TsV.LjhbBfOcSl8I/2vX2adxZ4SFGL5NsTq', NULL, NULL, NULL, NULL, '2022-06-29 04:09:13', '2022-06-29 04:09:13', 'enseignant'),
(45, 'Connor Kent', 'connorkent@gmail.com', NULL, '$2y$10$7nrQjFnJ5R..h43kkAuF8OeCeLABaaMSR.jSCP1gxZZ8TWM6mWdRS', NULL, NULL, NULL, NULL, '2022-06-29 04:13:46', '2022-06-29 04:13:46', 'etudiant'),
(46, 'Barbara Gordon', 'barbaragordon@gmail.com', NULL, '$2y$10$hbTMQ7Xb3DjLbRn6WYuJ8.N8R3cb6EQ8qAVuZpGZ/Ei4E4.hR/Qg.', NULL, NULL, NULL, NULL, '2022-06-29 04:14:26', '2022-06-29 04:14:26', 'etudiant'),
(52, 'bbbb bbbb', 'bbbb@gmail.com', NULL, '$2y$10$8CAVUT2YaRJanE1SQ9pu6.LV5uPvgl0U.bsSCdSH/OoiBNLMnITC6', NULL, NULL, NULL, NULL, '2022-06-29 04:27:10', '2022-06-29 04:27:10', 'etudiant'),
(51, 'aaaa aaaa', 'aaaa@gmail.com', NULL, '$2y$10$OVL9S/lXh.5BqI.vVMu.9ueSAKJGUS/5XXJU4X3U2LbGCavlOUYLq', NULL, NULL, NULL, NULL, '2022-06-29 04:26:45', '2022-06-29 04:26:45', 'etudiant'),
(49, 'Damyane Wayne', 'damyanewayne@gmail.com', NULL, '$2y$10$Qw.qu36oilmI5vgpmgIXjuTFsEVyEFUF6RrjkvhAJPg2wDngo4lEq', NULL, NULL, NULL, NULL, '2022-06-29 04:17:56', '2022-06-29 04:17:56', 'etudiant'),
(50, 'test test', 'test@gmail.com', NULL, '$2y$10$26QKy/z9LvGkfxQ.OeGtmOD4fFIRBqIh/loYn8EG3ibZo1ueUAwxe', NULL, NULL, NULL, NULL, '2022-06-29 04:18:37', '2022-06-29 04:18:37', 'etudiant'),
(54, 'admin admin', 'admin@gmail.com', NULL, '$2y$10$5BhLC4cEQp/ADCG9HA70u.RyYH47SNPuGXY1uE36Yl6eU9GJhaijG', NULL, NULL, NULL, NULL, '2022-07-01 22:28:20', '2022-07-01 22:28:20', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
