-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2023 at 02:46 PM
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
-- Database: `temp_laywer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Meas', 'Meas', 'da@gmail.com', '$2y$10$91yjnC0MDkeOTHLjy2GIP.JcMH57RTwfAI/3OcDVtS1E.brwXRMMG', '2023-06-18 09:40:08', '2023-06-27 05:36:30'),
(4, 'Sok', 'Meas', 'meas@gmail.com', '$2y$10$.cu9j2aNqhkLZVelP8DZju0pdcND6mnbeypP8np3YY6/SuwfdCD1O', '2023-06-18 09:49:47', '2023-06-27 05:30:09'),
(6, 'Meas', 'Sok', 'sok@gmail.com', '$2y$10$/Fk66OFOCSRamCXdYJMHbuiLrWOEyv/p4M1RoOwAoPzY6Le568bI.', '2023-06-23 23:38:17', '2023-06-27 05:33:56'),
(7, 'Kham', 'Kham', 'kham@gmail.com', '$2y$10$1bzVN4cz2z2CunislxoEw.gCMQiOIYKrpV34iQBGhBD.XobBkChSK', '2023-07-04 06:12:30', '2023-07-04 07:42:28'),
(8, 'Sok', 'sok', 'sm@gmail.com', '$2y$10$H1KXK9aMIu0JE6nc8EyBo.sfllyp4KWDuTJB/8kM4qkaSYTuzvaG6', '2023-07-06 01:43:43', '2023-07-06 01:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `coadmin`
--

DROP TABLE IF EXISTS `coadmin`;
CREATE TABLE IF NOT EXISTS `coadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coadmin`
--

INSERT INTO `coadmin` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'sok', 'ppong', 'ms@gmail.com', '$2y$10$Kli.mCKzFLwO/t.W2qjOouBj1k0Cv5TSfK9A2/WGKTpD5h0tUF73y', '2023-07-04 07:47:02', '2023-07-06 01:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

DROP TABLE IF EXISTS `lawyers`;
CREATE TABLE IF NOT EXISTS `lawyers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Field` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accomplishment` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_banned` tinyint(1) DEFAULT '0',
  `language` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Field2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `Field` (`Field`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `Field`, `phone_number`, `email`, `password`, `education`, `accomplishment`, `created_at`, `updated_at`, `is_banned`, `language`, `Field2`) VALUES
(7, 'Soth', 'kimleng', '2023-07-06', 'Male', 'DISPUTE RESOLUTION AND LITIGATION', '+855 89 872 129', 'kim@gmail.com', '$2y$10$bTdBYhoQV6lJYfNYRCDzHuYKAV6rQBGvg6lEj4hTIo0YjWYSGMYie', 'Bachelor of Arts in Architecture', 'Successfully resolved complex aircraft lease disputes, securing favorable outcomes for clients. Expert in aviation regulations and contracts, with 10+ years of experience in the industry.', '2023-07-03 11:25:44', '2023-07-06 01:46:06', 0, 'Khmer,English', NULL),
(8, 'Pichey ', 'Uong', '2023-06-28', 'Male', 'AIRCRAFT LEASING & PURCHASE', '+855 77 986 268', 'puong@gmail.com', '$2y$10$gA2nUDlyvmdaZfxl/1raVemMs2Mdl1uPuVMrk8TBX56BPZYC7zJQm', 'Bachelor of in Computer Science', 'Negotiated multimillion-dollar aircraft leasing agreements, ensuring compliance with international laws and maximizing client\'s profitability. Recognized for delivering efficient legal solutions. ', '2023-07-03 11:43:51', '2023-07-03 11:43:51', 0, ' Khmer, English, Spanish and Irish', NULL),
(9, 'Darapong', 'Rith', '2023-07-29', 'Male', 'AIRCRAFT LEASING & PURCHASE', '+855 77 696 550', 'drith@gmail.com', '$2y$10$qU8le2Ckk7jb03qRD8eGnOy.rjsqaOE8iOGQFTRvgRAoUGbg0Cjf2', 'Bachelor of Management Information Systems at Paragon International University', 'Successfully resolved complex aircraft lease disputes, securing favorable outcomes for clients. Expert in aviation regulations and contracts, with 10+ years of experience in the industry.', '2023-07-03 11:56:03', '2023-07-05 09:49:09', 0, 'Khmer, English and Russian', NULL),
(10, 'Sok ', 'Meas', '2023-07-14', 'Male', 'BANKING & FINANCE', '+855 99 462 842', 'smeas@gmail.com', '$2y$10$J.RtitIBXy6lTge59tsimOQ/SWFW15VJ/c4rRV03PKApuMGiETDOq', 'Bachelor of Arts in English Institute of Foreign Languages', 'Experienced banking lawyer. Negotiated multi-million-dollar loan agreement, ensuring compliance and mitigating risks for financial institutions.', '2023-07-03 13:10:05', '2023-07-03 13:10:05', 0, 'Khmer, English and Japanese', NULL),
(11, 'Vorak', 'Suon', '2014-11-05', 'Male', 'CONSTRUCTION & REAL ESTATE DEVELOPEMENT', '+855 93 728 438', 'tsoun@gmail.com', '$2y$10$I1.jA8W4jeh9wVaCXzpn5uAzCB5do7SgtUH8hCNDLaIXaHCNL/2SG', 'Bachelor of Computer Science at Paragon International University (PIU)\r\nBachelor of English at Institute of Foreign Languages (IFL)', 'Seasoned lawyer in construction and real estate development. Successfully resolved complex property disputes, drafted solid contracts, and provided legal counsel on major construction projects.', '2023-07-05 09:48:43', '2023-07-05 09:48:43', 0, 'Khmer, English and Italian', NULL),
(12, 'Peter', 'Parker', '2007-03-28', 'Male', 'CUSTOMS AND TAX', '+855 10 872029', 'pparker@gmail.com', '$2y$10$vd.1wVWve3F2VGFxo7Bfnu7ZRrT6L/lAtOyQTtuvT.tmg1x7PYfPK', 'Bachelor of Aunt/Uncleless at Marvel Cinematic University', 'Respected litigation lawyer with 10+ years\' experience. Successfully resolved complex disputes through strategic negotiations, achieving favorable outcomes for clients.', '2023-07-05 10:19:38', '2023-07-05 10:28:22', 0, 'English, Spanish and Italian', NULL),
(13, 'Usphea', 'Kim', '2012-06-21', 'Male', 'DISPUTE RESOLUTION AND LITIGATION', '+855 92 521 603', 'ukim@gmail.com', '$2y$10$9w6s7giZXAJ7FHFBX83iA./d8h/afj3UGHSCup3U13WDiJRgyf5mW', 'Bachelor of Computer Science at Paragon International University', 'Accomplished litigation lawyer with 10+ years of experience. Successfully represented clients in resolving complex regulations.', '2023-07-05 10:31:40', '2023-07-05 10:31:40', 0, 'Khmer, English, Greek and Rizz', NULL),
(14, 'RatanakVisal', 'Doung', '2000-01-02', 'Female', 'CUSTOMS AND TAX', '012919630', 'RatanakVisalDoung@gmail.com', '$2y$10$MaGBnx1OCMGvCYCkj.s0SeOebeSMPYcgozr4VnNT/TkWXGfJ4r22S', 'AIS,PIU', 'CC1', '2023-07-06 00:09:15', '2023-07-06 00:09:15', 0, 'Khmer, Chinese', NULL),
(15, 'Ratana', 'Soth', '2023-01-31', 'Male', 'BANKING & FINANCE', '+855 16 126 629', 'rsoth@gmail.com', '$2y$10$nd44XVuwCelSKc3Ut.nTvOG5fiY7WNdZylGZP7kYC.AQTaqYS3IqW', 'Bachelor of Computer Science\r\nBachelor of Arts in English', 'With 15+ years of experience as a banking and finance lawyer. In 2019, He negotiated a multi-million-dollar loan agreement with frameworks.', '2023-07-06 01:35:18', '2023-07-06 01:36:34', 0, 'Chinese, English, Khmer', NULL);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_banned` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `created_at`, `updated_at`, `is_banned`) VALUES
(2, 'mo', 'vinda', 'Male', 'mo@gmail.com', '$2y$10$OZpUmMhowXPINcazBy4nnOjaLfN.Uq3zXJ1cGXdmm3VrbVcnOnBw2', '2023-06-21 09:21:35', '2023-07-06 01:45:38', 0),
(3, 'Sok', 'San', 'Male', 'san@gmail.com', '$2y$10$VesnLvttXVjPVf0CKihsvOpHaz2TQPf8DKLxhTQ0cdRLlL7g6QA7.', '2023-06-24 01:23:40', '2023-06-26 23:53:21', 0),
(5, 'Soth', 'Kimleng', 'Male', '123@gmail.com', '$2y$10$fUAcr.NjHcrxGwYRaUZl3ullt5GgH3egtAduLWNrH3Q8rEvV..qHy', '2023-07-03 11:05:11', '2023-07-03 11:05:11', 0),
(6, '123', '123', 'Male', 'kim@gmail.com', '$2y$10$egy/.PYNRLo3PZUF6RxTdu6h1bzU16flbC5Rhgn8NDewM.pASZnOe', '2023-07-03 11:36:56', '2023-07-03 11:36:56', 0),
(7, 'Soth', 'kim', 'Male', 'kim1@gmail.com1', '$2y$10$QAs9HJuD8VzwWk5H/Ga3Q.E1gkmbHwb0IYW9PL27OMRaPcm1r7YTi', '2023-07-03 11:37:12', '2023-07-03 11:37:12', 0),
(8, 'Sok', 'Meas', 'Male', 'meas@gmail.com', '$2y$10$NRqHFz.aJDbtpEly8qHnnufkoUAYnOp/XRPagwFhs/.HQhDqy/5OO', '2023-07-04 00:04:53', '2023-07-04 00:04:53', 0),
(9, 'Heng', 'Pichkanitha', 'Female', 'HengHeng@gmail.com', '$2y$10$b9HCDC/nYqYxnluzX9Dic.TqRGKAkuSP3xvoKPM.IuKz0TOezV30q', '2023-07-06 00:06:08', '2023-07-06 00:06:08', 0),
(10, 'Pong', 'Rith', 'Female', 'pong@gmail.com', '$2y$10$8qTFrA4G4GxdbI28RLcVpuL4x3Tlxx9XWpNB1qj7BWvcIdpsI.gMq', '2023-07-06 01:39:31', '2023-07-06 01:40:03', 0),
(11, 'Juden', 'Ung', 'Male', 'JudenUng@gmail.com', '$2y$10$zKdKGnW2olZeaB/GTgJSwe.bMgFXgkRtucppdLrmF4P/kp3w0FYRC', '2023-07-06 01:53:36', '2023-07-06 01:53:36', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
