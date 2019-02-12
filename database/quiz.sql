-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2017 at 05:31 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'View', 'View', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Create', 'Create', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Update', 'Update', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Delete', 'Delete', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Lock', 'Lock', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Download', 'Download', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Change password', 'Change password', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Password reset', 'Password reset', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Print', 'Print', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Commit', 'Commit', 0, 0, '0000-00-00 00:00:00', '2017-11-13 08:34:12'),
(11, 'Activate', 'Activate', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Approve', 'Approve', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Decline', 'Decline', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Amend', 'Amend', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Details', 'Details', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Qualify Question', 'Qualify Question', 55, 55, '2017-11-23 05:59:18', '2017-11-23 06:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `advertizes`
--

CREATE TABLE `advertizes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  `position_id` varchar(10) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `default` tinyint(4) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertizes`
--

INSERT INTO `advertizes` (`id`, `name`, `info`, `position_id`, `start_date`, `end_date`, `default`, `photo`, `status_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(6, 'right ad', 'asdf', 'right', NULL, NULL, 0, '55794389efcd5HD-Wallpapers.jpeg', 0, 44, '2015-06-09 13:38:26', 93, '2016-11-21 14:20:00'),
(7, 'Ad here', '', 'right', '2016-11-21', '2016-11-22', NULL, '5767aa0878fcd55c0577855ff5w.png', 1, 44, '2015-06-09 16:38:53', 116, '2017-11-06 13:00:23'),
(9, 'ISSL Call', '', 'top', '2015-08-04', '2015-08-26', NULL, '55c0533334e0f1.png', 0, 44, '2015-08-04 11:46:34', 93, '2016-11-21 14:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `answer_level`
--

CREATE TABLE `answer_level` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answer_level`
--

INSERT INTO `answer_level` (`id`, `name`, `description`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Easy', 'Easy', 1, '2017-11-19 03:30:31', '2017-11-19 03:30:31'),
(2, 'Medium', 'Medium', 1, '2017-11-19 03:30:47', '2017-11-19 03:30:47'),
(3, 'Hard', 'Hard', 1, '2017-11-19 03:30:57', '2017-11-19 03:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `answer_type`
--

CREATE TABLE `answer_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answer_type`
--

INSERT INTO `answer_type` (`id`, `name`, `description`, `extension`, `status_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Text', 'Text', '.txt', 1, 55, 55, '2017-11-22 05:55:30', '2017-11-22 05:55:30'),
(2, 'Image', 'Image', '.jpg, .png, .jpge ,.gif', 1, 55, 55, '2017-11-22 05:56:08', '2017-11-22 05:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `banner_image`, `order_id`, `status_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Habib Song asdf', '587c8807ab193Call-Centre.jpg', 1, 0, 44, '2017-01-16 14:12:53', 44, '2017-01-16 16:10:43'),
(2, 'issl', '587c882d5a23bSoftware-Solution.jpg', 2, 1, 44, '2017-01-16 14:45:33', 44, '2017-01-16 14:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `free_quantity` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_page` tinyint(4) DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  `order_no_rec` int(11) DEFAULT NULL,
  `order_no_part` int(11) DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `free_quantity`, `slug`, `info`, `home_page`, `order_no`, `order_no_rec`, `order_no_part`, `photo`, `status_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'রাজা রাম মোহন রায় ', 0, 2, 'রাজা-রাম-মোহন-রায়-', '', NULL, NULL, NULL, NULL, '597585789b493images (1).jpg', 1, 44, '2017-07-09 10:39:13', 55, '2017-11-29 08:24:51'),
(7, 'বাংলা একাডেমী', 0, 3, 'বাংলা-একাডেমী', 'academy', 1, 45, NULL, NULL, '5975851adef2cmaxresdefault.jpg', 1, 44, '2017-07-09 14:53:58', 55, '2017-11-29 08:31:34'),
(8, 'ইতিহাস', 0, 55, 'ইতিহাস', 'bangladesh history', NULL, 56, NULL, NULL, '5975849cf1e83images.jpg', 1, 44, '2017-07-09 14:59:06', 55, '2017-11-29 08:33:06'),
(9, 'সতিধা প্রথা', 8, 2, '', 'mother language day', NULL, 33, NULL, NULL, '5975854fa5bf7images (1).jpg', 0, 44, '2017-07-09 15:00:22', 44, '2017-07-30 19:07:54'),
(11, 'Sakib Al-Hassan', 0, 2, 'Sakib-Al-Hassan', '', NULL, 2, NULL, NULL, NULL, 1, 44, '2017-07-11 15:01:43', 55, '2017-11-29 08:21:38'),
(12, 'Mashrafi Life History', 10, 1, '', '', NULL, NULL, NULL, NULL, '5964b12faae79ms.jpg', 1, 99, '2017-07-11 17:06:23', 99, '2017-08-10 18:22:27'),
(13, 'Mosfiqur Rohim', 10, 1, '', '', NULL, NULL, NULL, NULL, '5964b18fb5e33mo.jpg', 1, 99, '2017-07-11 17:07:59', 99, '2017-07-11 17:07:59'),
(14, 'ফুটবল', 0, 0, 'ফুটবল', '', NULL, NULL, NULL, NULL, '5964b1ccb6465foot_5.jpg', 1, 99, '2017-07-11 17:09:00', 55, '2017-11-29 08:32:19'),
(15, 'মেসি ', 14, 1, '', '', NULL, NULL, NULL, NULL, '5964b1f8c6901images (7).jpg', 0, 99, '2017-07-11 17:09:44', 44, '2017-07-31 20:17:21'),
(16, 'নেইমার', 14, 3, '', '', NULL, NULL, NULL, NULL, '5964b2100e63cneymar2.jpeg', 0, 99, '2017-07-11 17:10:08', 44, '2017-07-31 20:17:16'),
(17, 'রোনালদিনহো', 14, 1, '', '', NULL, 3, NULL, NULL, '597829c512594download (1).jpg', 0, 44, '2017-07-26 11:33:57', 44, '2017-07-30 19:07:40'),
(18, 'রোনালদিনহো জীবনী', 14, 1, '', '', NULL, 4, NULL, NULL, '597829fc973f9download.jpg', 0, 44, '2017-07-26 11:34:52', 44, '2017-07-30 19:07:48'),
(19, 'ব্রাজিল ', 14, 2, '', '', NULL, 5, NULL, NULL, '59782ab8ddbb41280px-Flag_of_Brazil.svg.png', 1, 44, '2017-07-26 11:38:01', 44, '2017-07-26 11:38:01'),
(20, 'বিজ্ঞান', 0, 0, 'বিজ্ঞান', '', NULL, 7, NULL, NULL, '597b389b45150download.jpg', 1, 44, '2017-07-28 19:14:03', 55, '2017-11-29 08:31:07'),
(21, 'কম্পিউটার', 20, 1, 'কম্পিউটার', '', NULL, 1, NULL, NULL, '597b3903d2ba7download (1).jpg', 1, 44, '2017-07-28 19:15:47', 55, '2017-11-29 08:21:16'),
(22, 'বিজ্ঞান ও প্রযুক্তি ', 0, 0, 'বিজ্ঞান-ও-প্রযুক্তি-', '', 1, 1, NULL, NULL, '5993cfdba2f13Biggan o Projukti.png', 1, 44, '2017-07-30 12:26:25', 55, '2017-11-29 08:20:20'),
(23, 'কম্পিউটার হাতেখড়ি', 22, 3, '', '', NULL, NULL, NULL, 1, '5993d028c2d8fComputer.png', 1, 44, '2017-07-30 12:54:19', 44, '2017-08-19 13:15:06'),
(24, 'চিকুনগুনিয়া', 22, 4, '', '', 1, NULL, 1, NULL, '5993d00a39f50Chikungunia.png', 1, 44, '2017-07-30 12:56:48', 44, '2017-08-16 10:54:34'),
(25, 'সোশ্যাল মিডিয়া', 22, 4, '', '', 1, NULL, 3, NULL, '5993d0447c1d1Social Media.png', 1, 44, '2017-07-30 12:58:13', 44, '2017-08-16 10:55:32'),
(26, 'মানব দেহ', 22, 4, '', '', 1, 4, NULL, 4, '5993d0637c84eManob Deho.png', 1, 44, '2017-07-30 17:05:45', 44, '2017-08-16 12:44:40'),
(27, 'খেলাধুলা ', 0, 0, 'খেলাধুলা-', '', 1, 2, NULL, NULL, '5993d08b7219fSports.png', 1, 44, '2017-07-30 18:50:13', 55, '2017-11-29 08:21:45'),
(28, 'বাংলাদেশ ক্রিকেট', 27, 1, 'বাংলাদেশ-ক্রিকেট', '', 1, 1, 2, NULL, '5993d09901e42Bangladesh Cricket.png', 1, 44, '2017-07-30 18:53:37', 55, '2017-11-29 08:20:30'),
(29, 'ক্রিকেট বিশ্বকাপ ২০১৫', 27, 4, 'ক্রিকেট-বিশ্বকাপ-২০১৫', '', NULL, 2, NULL, NULL, '5997d5e13a8beCricket World Cup-1.png', 1, 44, '2017-07-30 18:54:30', 55, '2017-11-29 08:21:53'),
(30, 'ফুটবল লীগ', 27, 4, '', '', NULL, 3, 4, NULL, '5993d0ffb6b72Football Legue.png', 1, 44, '2017-07-30 18:55:31', 44, '2017-08-19 13:15:39'),
(31, 'উইম্বলডন টেনিস', 27, 4, '', '', NULL, 4, NULL, NULL, '5993d11127715Tenis.png', 1, 44, '2017-07-30 18:56:12', 55, '2017-12-03 12:14:36'),
(32, 'অজানা বিশ্ব ', 0, 0, 'অজানা-বিশ্ব-', '', 1, 3, NULL, NULL, '5993d13888354Ajana Bishwa.png', 1, 44, '2017-07-30 19:05:48', 55, '2017-11-29 08:21:07'),
(33, 'মিশরের পিরামিড', 32, 2, 'মিশরের-পিরামিড', '', NULL, 1, NULL, 2, '5993d1588909fMishore Piramid.png', 1, 44, '2017-07-30 19:06:37', 55, '2017-11-29 08:20:37'),
(34, 'সাগর তলদেশ', 32, 4, 'সাগর-তলদেশ', '', NULL, 2, NULL, 3, '5993d16ab4485Shagor Talodesh.png', 1, 44, '2017-07-30 19:07:09', 55, '2017-11-29 08:22:04'),
(35, 'বিনোদন ', 0, 0, 'বিনোদন-', '', 1, 4, NULL, NULL, '5993d25eaa20cEntertainment.png', 1, 44, '2017-07-30 19:23:35', 55, '2017-11-29 08:30:29'),
(36, 'গ্রহ ও নক্ষত্র', 32, 4, 'গ্রহ-ও-নক্ষত্র', '', NULL, 3, NULL, NULL, '5993d14ae7d33Groho Nakhtro.png', 1, 44, '2017-07-30 19:27:24', 55, '2017-11-29 08:22:32'),
(37, 'গ্র্যান্ড ক্যানিয়ন', 32, 4, '', '', NULL, 4, NULL, NULL, '5993d1857288fGrang Canion.png', 1, 44, '2017-07-30 19:28:08', 44, '2017-08-19 16:34:25'),
(38, 'তারকা জগৎ', 35, 4, 'তারকা-জগৎ', '', NULL, 1, NULL, NULL, '5993d27dacac8Taroka Jagat.png', 1, 44, '2017-07-30 19:36:01', 55, '2017-11-29 08:21:25'),
(39, 'গান বাজনা', 35, 4, 'গান-বাজনা', '', NULL, 2, NULL, NULL, '5993d28daf62bGan Bazna.png', 1, 44, '2017-07-30 19:39:08', 55, '2017-11-29 08:22:14'),
(40, 'নাটক', 35, 4, '', '', NULL, 3, NULL, NULL, '5993d2e35c11fNatok.png', 1, 44, '2017-07-30 19:55:47', 44, '2017-08-16 11:06:43'),
(41, 'সিনেমা', 35, 4, '', '', NULL, 3, NULL, NULL, '5993d2a8bb890Cinema.png', 1, 44, '2017-07-30 19:56:49', 44, '2017-08-16 11:05:44'),
(42, 'ইতিহাস ও ভূগোল', 0, 0, 'ইতিহাস-ও-ভূগোল', '', 1, 5, NULL, NULL, '5995746e9c0ecHistory & Geography.png', 1, 44, '2017-07-30 20:15:37', 55, '2017-11-29 08:32:43'),
(43, 'মনীষী', 0, 0, 'মনীষী', '', 1, 6, NULL, NULL, '59952cb09491dMonishee.png', 1, 44, '2017-07-30 20:16:15', 55, '2017-11-29 08:30:05'),
(44, 'আহসান মঞ্জিল', 42, 4, 'আহসান-মঞ্জিল', '', NULL, 1, 5, NULL, '59957441b3bc0Ahsan Monjil.png', 1, 44, '2017-07-31 10:57:51', 55, '2017-11-29 08:20:44'),
(45, 'মুক্তিযুদ্ধ ১৯৭১', 42, 4, '', '', NULL, 2, NULL, NULL, '5995745623e881971.png', 1, 44, '2017-07-31 10:58:52', 44, '2017-08-17 16:47:50'),
(46, 'গ্রীন হাউস এফেক্ট ', 42, 4, '', '', NULL, 3, NULL, NULL, '599574ab3c35dGreen House-1.png', 1, 44, '2017-07-31 10:59:36', 44, '2017-08-17 16:49:15'),
(47, 'রাজধানী ও মুদ্রা', 42, 4, '', '', NULL, 4, NULL, NULL, '599574dc74878Money.png', 1, 44, '2017-07-31 11:00:21', 44, '2017-08-17 16:50:04'),
(48, 'বঙ্গবন্ধু শেখ মুজিবুর রহমান', 43, 4, 'বঙ্গবন্ধু-শেখ-মুজিবুর-রহমান', '', NULL, 1, NULL, NULL, '59952ccff3da3Mujib.png', 1, 44, '2017-07-31 11:13:41', 55, '2017-11-29 08:21:31'),
(49, 'বিজ্ঞানী আইনস্টাইন', 43, 4, '', '', NULL, 2, NULL, NULL, '59952cc4db5daEinstine.png', 1, 44, '2017-07-31 11:15:01', 44, '2017-08-17 11:42:28'),
(50, 'বিশ্বকবি রবীন্দ্রনাথ ঠাকুর', 43, 4, '', '', NULL, 3, NULL, NULL, '59952ce61ceceRabindronath.png', 1, 44, '2017-07-31 11:16:52', 44, '2017-08-17 11:43:02'),
(51, 'সমাজ সেবক মাদার তেরেসা', 43, 4, '', '', NULL, 4, NULL, NULL, '59952cf7d9012Mother teresa.png', 1, 44, '2017-07-31 11:17:42', 44, '2017-08-17 11:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `charged_logs`
--

CREATE TABLE `charged_logs` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `charging_status` tinyint(4) NOT NULL COMMENT '1 = yes, 0 = no',
  `charging_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(10) UNSIGNED NOT NULL,
  `most_recent` int(11) NOT NULL,
  `most_part` int(11) NOT NULL,
  `fastest_top_scorer_msg` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `top_scorer_msg` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `near_top_scorer_msg` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zero_scorer_msg` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `less_fifty_scorer_msg` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `terms_condition` text COLLATE utf8_unicode_ci,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `most_recent`, `most_part`, `fastest_top_scorer_msg`, `top_scorer_msg`, `near_top_scorer_msg`, `zero_scorer_msg`, `less_fifty_scorer_msg`, `terms_condition`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, 5, 4, 'You are the fastest top scorer', 'You are the top scorer', 'You are near to the top score', 'Better luck next time', 'You are less than 50% score', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>TERMS &amp; CONDITIONS</strong></p>\r\n<p>Use of the website- quizbusket.com is subjected to the following Terms and Conditions:</p>\r\n<p> Contents of the pages of this website are prepared for general mass in order to gather knowledge about different sectors, by means of questions and answers. Authority holds the right to change the material or contents without giving prior notice.</p>\r\n<p> Website contains materials are owned by NextNet Limited which is considered to be intellectual property of this company as well. It includes but not limited to graphics, layout, view, appearance and design, images. Any kind of reproduction is strictly prohibited.</p>\r\n<p> Unauthorized use of the website may give rise to a claim for damages and/or be a criminal offense. While using the website you must not: a) reproduce or republish any material of the website anywhere including in any website, b) show any material from the website in public, c) duplicate, copy or exploit any material on this website</p>\r\n<p> From time to time the authority may add contents to the website depending on the need of updating quiz materials. NextNet Limited holds right to add, remove, modify, change, rectify full or any part of the quiz contents.</p>\r\n<p> Your use of any information of this website is completely at your own risk. Meeting your specific requirements by any information available through this website is completely your responsibility. NextNet Limited will not be liable for this.</p>\r\n<p> As a condition of registration you have to upload your image.</p>\r\n<p> As a condition of registration with the website for playing quizzes, you are required to select a User ID and Password. While NextNet Limited will keep your User ID and password confidential, you are also responsible to keep them confidential, too. You are responsible for all activities which will occur through your User ID.</p>\r\n<p> While registering, you agree to the terms that your information available in the website may be used by NextNet Limited for any commercial purpose.</p>\r\n<p> The website authority, NextNet Limited have the complete rights to revise, review and bring in any changes to these terms and conditions time-to-time. Please do check this site regularly to make sure that you are aware of the current Terms and conditions.</p>\r\n<p> The quizbasket logo and names are trademarks of quizbasket. You fully agree to the condition while using this website that you will not display or use these in any format without NextNet Limited&rsquo; prior and written consent.</p>\r\n<p> The sharing of your any quiz result/content or any information to any social networking website (e.g. facebook.com) is completely your responsibility. Website authority will not be liable for any mismanagement of information done from your User ID.</p>\r\n<p> Mobile Internet connection is needed to download or browse any content from<br />the site.</p>\r\n<p> The site owner will not be responsible for any kind of internet interruption during<br />usage of the services.</p>\r\n<p> The site owner holds authority to change any price or contents and is only a<br />subject to discussion with the Telecom operators15% VAT, SD &amp; SC applicable<br />on all content price.</p>', 44, '2016-06-13 02:06:08', 44, '2017-08-21 13:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `content_writer_role`
--

CREATE TABLE `content_writer_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_type_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `content_writer_role`
--

INSERT INTO `content_writer_role` (`id`, `user_id`, `category_id`, `question_type_id`, `status_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 55, '13,19,21', '1,2', 1, 55, 55, '2017-11-20 00:50:47', '2017-11-20 00:50:47'),
(3, 55, '27,32,35,42', '1', 1, 55, 55, '2017-11-20 01:03:47', '2017-11-20 01:03:47'),
(4, 93, '22,27,32,35,42,43', '1,2', 1, 55, 55, '2017-11-20 01:11:15', '2017-11-20 01:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_no` varchar(14) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status_id` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `recover_attempt` datetime DEFAULT NULL,
  `recover_link` varchar(32) DEFAULT NULL,
  `country_id` int(11) NOT NULL DEFAULT '1' COMMENT '1 = general ,2 = second round',
  `division_id` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `contact_no`, `username`, `password`, `designation`, `age`, `photo`, `status_id`, `remember_token`, `recover_attempt`, `recover_link`, `country_id`, `division_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'bakibillah', 'bakibillah920@gmail.com', '01715414469', 'bakibillah', '$2y$10$ucxOFYYNm1zeR2QOYOIgBu0yJlwqqzLRyb3T9408zLMajSZ1GhlMa', NULL, NULL, '5883041cbed39thumb.gif', 1, NULL, NULL, NULL, 1, 3, 44, 44, '2017-01-21 12:47:56', '2017-01-31 14:40:14'),
(3, 'asdf', '', '', 'asdfasdf', '$2y$10$kdDgjEm4/8SzmFDlm0I1SeZI2vKfvXFSUU6zaI9b11UPT06.qlMr2', NULL, NULL, NULL, 1, 'ms0zrcsTwZeq70EsJdH9neVOVH1WqEJ1yng8X9cp', NULL, NULL, 0, 0, 44, 44, '2017-01-26 12:03:50', '2017-01-26 12:03:50'),
(4, 'alamin', '', '', 'alamin', '$2y$10$6gHan977z.W8kp97zlM1PuR7jBHrcXY4Xr5x7dg4xP5ehWYOM5MHy', NULL, NULL, NULL, 1, 'ebIkFQKdMv9IZmlKTg3iEde8VVYyxS59Ys6JSPz4of6i4xF478vcE3hIYMtR', NULL, NULL, 0, 0, 44, 4, '2017-01-26 12:08:23', '2017-02-14 12:19:15'),
(5, 'dfdffff', '', '', 'ffff', '$2y$10$oocTJCOWlL3i1qtUENTLV.gAU/h0MoS07gN/MvyHzC2BWHmnujuxi', NULL, NULL, NULL, 1, 'ms0zrcsTwZeq70EsJdH9neVOVH1WqEJ1yng8X9cp', NULL, NULL, 0, 0, 44, 44, '2017-01-26 13:14:36', '2017-01-26 13:14:36'),
(6, 'korim', '', '', 'korim', '$2y$10$yV1r9JL0Rocxs5zId4Dl0.Hiw7iSh4prQeIbhOwgWcncjNAb0AtEK', NULL, NULL, NULL, 1, 'dwzrc4d9xpNFSpe64qt2v0RccV9ZXUIR9eNb1hSoOfyy7bDuo6UptWlut5J2', NULL, NULL, 0, 0, 44, 6, '2017-01-26 15:25:58', '2017-01-26 15:26:17'),
(9, 'Test', 'test@test.test', '01762042026', 'test', '$2y$10$CiSCk1rlr.3eRRgDAp619.J6kQyOocAVGd8fePa1rZpzmhD4K.7Ky', NULL, NULL, NULL, 1, 'ZAbqK3aguBOVSYmSUfVfv84HuIge7HjANRwpOJqd', NULL, NULL, 0, 0, 44, 44, '2017-01-30 17:09:54', '2017-01-30 17:09:54'),
(8, 'Khalid', 'DSAFASDF@gmail.com', '01762042026', 'khalid2', '$2y$10$ldY46N.vzH3JVfMzOwaO8udui806Jxzx62bFi7wU14DkKJQTRC7Sm', NULL, NULL, '588ec77fc2a14280px-Drums.jpg', 1, 'RzcOJZdQuNKvLD0zPDP3okgGYekeSaB2FLxMWRDFZnoT7RtErDz4DsOMUtMu', NULL, NULL, 1, 4, 44, 44, '2017-01-30 10:55:14', '2017-01-31 10:43:11'),
(10, 'issl banner', 'alamindawancmt@gmail.com', '01762042026', 'khalid', '$2y$10$6wvk/8vOyobu9OWY.eJZSuOxAsOXyKs4NPty8zT7ikQxESqgKkqcG', NULL, NULL, NULL, 1, 'IAOgYuitjOvIa4Bhjhpp02rasnicMqBANwCpUGuD', NULL, NULL, 0, 0, 44, 44, '2017-01-31 10:47:38', '2017-01-31 12:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `division_id` int(11) NOT NULL,
  `website` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bn_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `website`, `bn_name`, `lat`, `lon`, `country_id`) VALUES
(1, 'Dhaka', 3, 'www.dhaka.gov.bd', 'ঢাকা', 23.7115253, 90.4111451, 0),
(2, 'Faridpur', 3, 'www.faridpur.gov.bd', 'ফরিদপুর', 23.6070822, 89.8429406, 0),
(3, 'Gazipur', 3, 'www.gazipur.gov.bd', 'গাজীপুর', 24.0022858, 90.4264283, 0),
(4, 'Gopalganj', 3, 'www.gopalganj.gov.bd', 'গোপালগঞ্জ', 23.0050857, 89.8266059, 0),
(5, 'Jamalpur', 3, 'www.jamalpur.gov.bd', 'জামালপুর', 24.937533, 89.937775, 0),
(6, 'Kishoreganj', 3, 'www.kishoreganj.gov.bd', 'কিশোরগঞ্জ', 24.444937, 90.776575, 0),
(7, 'Madaripur', 3, 'www.madaripur.gov.bd', 'মাদারীপুর', 23.164102, 90.1896805, 0),
(8, 'Manikganj', 3, 'www.manikganj.gov.bd', 'মানিকগঞ্জ', 0, 0, 0),
(9, 'Munshiganj', 3, 'www.munshiganj.gov.bd', 'মুন্সিগঞ্জ', 0, 0, 0),
(10, 'Mymensingh', 3, 'www.mymensingh.gov.bd', 'ময়মনসিং', 0, 0, 0),
(11, 'Narayanganj', 3, 'www.narayanganj.gov.bd', 'নারায়াণগঞ্জ', 23.63366, 90.496482, 0),
(12, 'Narsingdi', 3, 'www.narsingdi.gov.bd', 'নরসিংদী', 23.932233, 90.71541, 0),
(13, 'Netrokona', 3, 'www.netrokona.gov.bd', 'নেত্রকোনা', 24.870955, 90.727887, 0),
(14, 'Rajbari', 3, 'www.rajbari.gov.bd', 'রাজবাড়ি', 23.7574305, 89.6444665, 0),
(15, 'Shariatpur', 3, 'www.shariatpur.gov.bd', 'শরীয়তপুর', 0, 0, 0),
(16, 'Sherpur', 3, 'www.sherpur.gov.bd', 'শেরপুর', 25.0204933, 90.0152966, 0),
(17, 'Tangail', 3, 'www.tangail.gov.bd', 'টাঙ্গাইল', 0, 0, 0),
(18, 'Bogra', 5, 'www.bogra.gov.bd', 'বগুড়া', 24.8465228, 89.377755, 0),
(19, 'Joypurhat', 5, 'www.joypurhat.gov.bd', 'জয়পুরহাট', 0, 0, 0),
(20, 'Naogaon', 5, 'www.naogaon.gov.bd', 'নওগাঁ', 0, 0, 0),
(21, 'Natore', 5, 'www.natore.gov.bd', 'নাটোর', 24.420556, 89.000282, 0),
(22, 'Nawabganj', 5, 'www.chapainawabganj.gov.bd', 'নবাবগঞ্জ', 24.5965034, 88.2775122, 0),
(23, 'Pabna', 5, 'www.pabna.gov.bd', 'পাবনা', 23.998524, 89.233645, 0),
(24, 'Rajshahi', 5, 'www.rajshahi.gov.bd', 'রাজশাহী', 0, 0, 0),
(25, 'Sirajgonj', 5, 'www.sirajganj.gov.bd', 'সিরাজগঞ্জ', 24.4533978, 89.7006815, 0),
(26, 'Dinajpur', 6, 'www.dinajpur.gov.bd', 'দিনাজপুর', 25.6217061, 88.6354504, 0),
(27, 'Gaibandha', 6, 'www.gaibandha.gov.bd', 'গাইবান্ধা', 25.328751, 89.528088, 0),
(28, 'Kurigram', 6, 'www.kurigram.gov.bd', 'কুড়িগ্রাম', 25.805445, 89.636174, 0),
(29, 'Lalmonirhat', 6, 'www.lalmonirhat.gov.bd', 'লালমনিরহাট', 0, 0, 0),
(30, 'Nilphamari', 6, 'www.nilphamari.gov.bd', 'নীলফামারী', 25.931794, 88.856006, 0),
(31, 'Panchagarh', 6, 'www.panchagarh.gov.bd', 'পঞ্চগড়', 26.3411, 88.5541606, 0),
(32, 'Rangpur', 6, 'www.rangpur.gov.bd', 'রংপুর', 25.7558096, 89.244462, 0),
(33, 'Thakurgaon', 6, 'www.thakurgaon.gov.bd', 'ঠাকুরগাঁও', 26.0336945, 88.4616834, 0),
(34, 'Barguna', 1, 'www.barguna.gov.bd', 'বরগুনা', 0, 0, 0),
(35, 'Barisal', 1, 'www.barisal.gov.bd', 'বরিশাল', 0, 0, 0),
(36, 'Bhola', 1, 'www.bhola.gov.bd', 'ভোলা', 22.685923, 90.648179, 0),
(37, 'Jhalokati', 1, 'www.jhalakathi.gov.bd', 'ঝালকাঠি', 0, 0, 0),
(38, 'Patuakhali', 1, 'www.patuakhali.gov.bd', 'পটুয়াখালী', 22.3596316, 90.3298712, 0),
(39, 'Pirojpur', 1, 'www.pirojpur.gov.bd', 'পিরোজপুর', 0, 0, 0),
(40, 'Bandarban', 2, 'www.bandarban.gov.bd', 'বান্দরবান', 22.1953275, 92.2183773, 0),
(41, 'Brahmanbaria', 2, 'www.brahmanbaria.gov.bd', 'ব্রাহ্মণবাড়িয়া', 23.9570904, 91.1119286, 0),
(42, 'Chandpur', 2, 'www.chandpur.gov.bd', 'চাঁদপুর', 23.2332585, 90.6712912, 0),
(43, 'Chittagong', 2, 'www.chittagong.gov.bd', 'চট্টগ্রাম', 22.335109, 91.834073, 0),
(44, 'Comilla', 2, 'www.comilla.gov.bd', 'কুমিল্লা', 23.4682747, 91.1788135, 0),
(45, 'Cox\'s Bazar', 2, 'www.coxsbazar.gov.bd', 'কক্স বাজার', 0, 0, 0),
(46, 'Feni', 2, 'www.feni.gov.bd', 'ফেনী', 23.023231, 91.3840844, 0),
(47, 'Khagrachari', 2, 'www.khagrachhari.gov.bd', 'খাগড়াছড়ি', 23.119285, 91.984663, 0),
(48, 'Lakshmipur', 2, 'www.lakshmipur.gov.bd', 'লক্ষ্মীপুর', 22.942477, 90.841184, 0),
(49, 'Noakhali', 2, 'www.noakhali.gov.bd', 'নোয়াখালী', 22.869563, 91.099398, 0),
(50, 'Rangamati', 2, 'www.rangamati.gov.bd', 'রাঙ্গামাটি', 0, 0, 0),
(51, 'Habiganj', 7, 'www.habiganj.gov.bd', 'হবিগঞ্জ', 24.374945, 91.41553, 0),
(52, 'Maulvibazar', 7, 'www.moulvibazar.gov.bd', 'মৌলভীবাজার', 24.482934, 91.777417, 0),
(53, 'Sunamganj', 7, 'www.sunamganj.gov.bd', 'সুনামগঞ্জ', 25.0658042, 91.3950115, 0),
(54, 'Sylhet', 7, 'www.sylhet.gov.bd', 'সিলেট', 24.8897956, 91.8697894, 0),
(55, 'Bagerhat', 4, 'www.bagerhat.gov.bd', 'বাগেরহাট', 22.651568, 89.785938, 0),
(56, 'Chuadanga', 4, 'www.chuadanga.gov.bd', 'চুয়াডাঙ্গা', 23.6401961, 88.841841, 0),
(57, 'Jessore', 4, 'www.jessore.gov.bd', 'যশোর', 23.16643, 89.2081126, 0),
(58, 'Jhenaidah', 4, 'www.jhenaidah.gov.bd', 'ঝিনাইদহ', 23.5448176, 89.1539213, 0),
(59, 'Khulna', 4, 'www.khulna.gov.bd', 'খুলনা', 22.815774, 89.568679, 0),
(60, 'Kushtia', 4, 'www.kushtia.gov.bd', 'কুষ্টিয়া', 23.901258, 89.120482, 0),
(61, 'Magura', 4, 'www.magura.gov.bd', 'মাগুরা', 23.487337, 89.419956, 0),
(62, 'Meherpur', 4, 'www.meherpur.gov.bd', 'মেহেরপুর', 23.762213, 88.631821, 0),
(63, 'Narail', 4, 'www.narail.gov.bd', 'নড়াইল', 23.172534, 89.512672, 0),
(64, 'Satkhira', 4, 'www.satkhira.gov.bd', 'সাতক্ষীরা', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `country_id`) VALUES
(1, 'Barisal', 1),
(2, 'Chittagong', 1),
(3, 'Dhaka', 1),
(4, 'Khulna', 1),
(5, 'Rajshahi', 1),
(6, 'Rangpur', 1),
(7, 'Sylhet', 1),
(8, 'Mymensing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `performance` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  `start_range` int(11) NOT NULL,
  `end_range` int(11) NOT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `performance`, `info`, `start_range`, `end_range`, `status_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(15, 'Excellent Performance', '', 70, 79, 1, 44, '2015-06-10 18:58:04', 99, '2017-07-20 10:02:38'),
(16, 'Extra Ordinary Performance', '', 80, 100, 1, 44, '2015-06-10 18:58:22', 55, '2017-11-29 05:58:56'),
(19, 'Better Performance', '', 60, 69, 1, 44, '2015-06-10 19:00:07', 55, '2017-11-29 06:13:04'),
(20, 'Good Performance', '', 50, 59, 1, 44, '2015-06-10 19:00:29', 55, '2017-11-29 06:25:11'),
(21, 'Average Performance', '', 0, 49, 1, 44, '2015-06-10 19:00:53', 44, '2017-08-09 13:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `internal_url`
--

CREATE TABLE `internal_url` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `corellator` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `internal_url`
--

INSERT INTO `internal_url` (`id`, `name`, `corellator`) VALUES
(1, 'Home', 'home'),
(4, 'Advertize', 'advertisement'),
(5, 'Disclaimer', 'disclaimer');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `name`, `category_id`, `status_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Science', 32, 1, 55, 55, '2017-11-26 23:14:48', '2017-12-03 06:15:25'),
(2, 'Sports', 27, 1, 55, 55, '2017-11-26 23:54:50', '2017-11-26 23:54:50'),
(3, 'General Knowladge', 32, 1, 55, 55, '2017-11-26 23:55:20', '2017-11-26 23:55:20'),
(4, 'Adminfgthyj', 35, 1, 55, 55, '2017-11-27 02:10:32', '2017-11-27 02:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `media_type` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `media_type`, `name`, `extension`, `status_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/mediafiles/image/image_fgr0PYY2SScVAI2C9ZU5.jpg', 'jpg', 1, 55, 55, '2017-12-03 22:26:50', '2017-12-03 22:26:50'),
(2, 1, 'public/mediafiles/image/image_iHlymkbr4du7ZwQqyUKk.jpg', 'jpg', 1, 55, 55, '2017-12-03 22:26:50', '2017-12-03 22:26:50'),
(3, 1, 'public/mediafiles/image/image_bz3UE9rGbLHLC2E2SBQn.jpg', 'jpg', 1, 55, 55, '2017-12-03 22:26:50', '2017-12-03 22:26:50'),
(4, 1, 'public/mediafiles/image/image_4drLij6H0hG6OiCEbjy2.jpg', 'jpg', 1, 55, 55, '2017-12-03 22:26:50', '2017-12-03 22:26:50'),
(5, 1, 'public/mediafiles/image/image_3TowL77Q9gJ3khOpZ0yF.jpg', 'jpg', 1, 55, 55, '2017-12-03 22:26:50', '2017-12-03 22:26:50'),
(6, 1, 'public/mediafiles/image/image_ddsYSVR9rUTrLQTNcDHS.jpg', 'jpg', 1, 55, 55, '2017-12-03 22:26:50', '2017-12-03 22:26:50'),
(7, 2, 'public/mediafiles/audio/audio_AAaFBPN6P6ZsV6zCKQ61.mp3', 'mp3', 1, 55, 55, '2017-12-03 22:27:10', '2017-12-03 22:27:10'),
(8, 3, 'public/mediafiles/video/video_v0uVS19wIgFilJbiJXYt.mp4', 'mp4', 1, 55, 55, '2017-12-03 22:27:21', '2017-12-03 22:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `menu_position` int(10) NOT NULL,
  `type_id` tinyint(4) NOT NULL COMMENT '1=Category;2=Url',
  `category_slug` varchar(255) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `_blank` varchar(255) DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `menu_position`, `type_id`, `category_slug`, `url`, `order_id`, `_blank`, `status_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'হোম', 1, 2, NULL, 'home', 2, NULL, 1, 44, '2015-06-17 10:44:56', 55, '2017-11-29 10:51:11'),
(3, 'বিজ্ঞান', 0, 1, '20', NULL, 2, NULL, 0, 44, '2015-08-04 12:16:28', 44, '2017-07-30 12:07:30'),
(4, 'ইতিহাস', 0, 1, '6', NULL, 3, NULL, 0, 44, '2015-08-04 12:17:11', 44, '2017-07-30 12:07:36'),
(5, 'অজানা বিশ্ব', 0, 1, '32', NULL, 3, NULL, 1, 44, '2015-08-04 12:17:38', 44, '2017-07-30 19:22:32'),
(6, 'তারকা জগত', 0, 1, '8', NULL, 5, NULL, 0, 44, '2015-08-04 12:17:56', 44, '2017-07-30 12:07:41'),
(7, 'খেলাধুলা', 1, 1, 'খেলাধুলা-', NULL, 2, NULL, 1, 44, '2015-08-04 12:18:11', 55, '2017-11-29 10:21:44'),
(8, 'গান বাজনা', 0, 1, '2', NULL, 6, NULL, 0, 44, '2015-08-04 12:18:37', 44, '2017-07-30 12:08:27'),
(9, 'সিনেমা', 0, 1, '9', NULL, 8, NULL, 0, 44, '2015-08-04 12:59:18', 44, '2017-07-30 12:08:30'),
(10, 'ভূগোল', 0, 1, '10', NULL, 9, NULL, 0, 44, '2015-08-04 12:59:42', 44, '2017-07-30 12:08:32'),
(11, 'মনীষী', 0, 1, '43', NULL, 6, NULL, 1, 44, '2015-08-04 12:59:58', 44, '2017-07-30 20:17:54'),
(12, 'Admission', 1, 1, 'অজানা-বিশ্ব', NULL, 2, NULL, 1, 99, '2016-11-21 12:52:12', 55, '2017-11-29 09:32:17'),
(13, 'Job Seeker', 0, 1, '13', NULL, 2, NULL, 0, 99, '2016-11-21 12:57:38', 99, '2017-06-20 12:53:25'),
(14, 'General Knowledge', 0, 1, '14', NULL, 3, NULL, 0, 99, '2016-11-21 13:04:17', 99, '2017-06-20 12:53:38'),
(15, 'Technologies', 0, 1, '15', NULL, 4, NULL, 0, 99, '2016-11-21 13:06:17', 55, '2017-11-29 10:22:14'),
(16, 'My Profile', 0, 1, '16', NULL, 5, NULL, 0, 99, '2016-11-21 13:07:32', 99, '2017-06-20 12:53:48'),
(17, 'বিজ্ঞান ও প্রযুক্তি ', 1, 2, NULL, 'http://kakolihsc.edu.bd/', 1, '_blank', 1, 44, '2017-07-30 19:19:01', 55, '2017-11-29 11:12:07'),
(18, 'বিনোদন ', 0, 1, '35', NULL, 4, NULL, 1, 44, '2017-07-30 19:37:22', 44, '2017-07-30 19:37:22'),
(19, 'ইতিহাস ও ভূগোল', 0, 1, '42', NULL, 5, NULL, 1, 44, '2017-07-30 20:17:19', 44, '2017-07-30 20:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2017_11_19_091714_create_answer_level_table', 2),
(6, '2017_11_19_075754_create_question_type_table', 3),
(7, '2017_11_19_075841_create_answer_type_table', 3),
(10, '2017_11_19_104750_create_content_writer_role_table', 4),
(12, '2017_11_20_094624_create_media_table', 5),
(15, '2017_11_27_045303_create_keywords_table', 6),
(16, '2017_11_29_044310_create_quizSettings_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Role Management', 'Role Management', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Role Access Control', 'Role Access Control', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'User Management', 'User Management', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'User Access Control', 'User Access Control', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Module Management', 'Module Management', 0, 0, '2017-11-13 07:30:40', '2017-11-13 07:30:40'),
(8, 'Activity Management', 'Activity Management', 0, 0, '2017-11-13 07:32:33', '2017-11-13 07:32:33'),
(9, 'Settings', 'Settings', 0, 0, '2017-11-13 09:37:10', '2017-11-13 09:37:10'),
(10, 'Category Management', 'Category', 0, 0, '2017-11-15 07:12:23', '2017-11-15 07:31:50'),
(11, 'Level Management', 'Level Management', 0, 0, '2017-11-15 07:32:53', '2017-11-15 07:32:53'),
(12, 'Content Manager', 'Content Manager', 0, 0, '2017-11-15 11:40:57', '2017-11-15 11:40:57'),
(13, 'Question Level Management', 'Question Level Management', 0, 0, '2017-11-16 05:25:43', '2017-11-16 05:25:43'),
(14, 'Answer Type', 'Answer Type', 0, 0, '2017-11-19 08:43:28', '2017-11-19 08:43:28'),
(15, 'Question Type', 'Question Type', 0, 0, '2017-11-19 08:43:51', '2017-11-19 08:43:51'),
(16, 'Answer Level', 'Answer Level', 0, 0, '2017-11-19 09:27:10', '2017-11-19 09:27:10'),
(17, 'Content Writer Role', 'Content Writer Role', 0, 0, '2017-11-20 06:58:28', '2017-11-20 06:58:28'),
(18, 'Media', 'Media', 0, 0, '2017-11-21 07:04:55', '2017-11-21 07:04:55'),
(19, 'Question Bank', 'Question Bank', 0, 0, '2017-11-22 05:10:58', '2017-11-22 05:10:58'),
(20, 'Keywords', 'Keywords', 0, 0, '2017-11-27 04:36:18', '2017-11-27 04:36:18'),
(21, 'Quiz Settings', 'Quiz Settings', 0, 0, '2017-11-29 05:04:02', '2017-11-29 05:04:02'),
(22, 'Grades', 'Grades', 0, 0, '2017-11-29 05:48:48', '2017-11-29 05:48:48'),
(23, 'Menus', 'Menus', 0, 0, '2017-11-29 10:26:51', '2017-11-29 10:26:51'),
(24, 'Content Role Management', 'Content Role Management', 0, 0, '2017-12-03 09:17:16', '2017-12-03 09:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `module_to_activity`
--

CREATE TABLE `module_to_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(11) UNSIGNED NOT NULL,
  `activity_id` int(11) UNSIGNED NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_to_activity`
--

INSERT INTO `module_to_activity` (`id`, `module_id`, `activity_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 2, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 3, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 4, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 2, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 3, 3, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 3, 4, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 4, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 5, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 7, 1, 0, 0, '2017-11-13 07:30:40', '2017-11-13 07:30:40'),
(18, 7, 2, 0, 0, '2017-11-13 07:30:40', '2017-11-13 07:30:40'),
(19, 7, 3, 0, 0, '2017-11-13 07:30:40', '2017-11-13 07:30:40'),
(20, 7, 4, 0, 0, '2017-11-13 07:30:40', '2017-11-13 07:30:40'),
(21, 7, 5, 0, 0, '2017-11-13 07:30:40', '2017-11-13 07:30:40'),
(57, 6, 1, 0, 0, '2017-11-13 08:06:50', '2017-11-13 08:06:50'),
(58, 6, 2, 0, 0, '2017-11-13 08:06:50', '2017-11-13 08:06:50'),
(59, 6, 3, 0, 0, '2017-11-13 08:06:51', '2017-11-13 08:06:51'),
(60, 6, 4, 0, 0, '2017-11-13 08:06:51', '2017-11-13 08:06:51'),
(89, 2, 1, 0, 0, '2017-11-13 08:38:47', '2017-11-13 08:38:47'),
(90, 2, 2, 0, 0, '2017-11-13 08:38:47', '2017-11-13 08:38:47'),
(91, 2, 3, 0, 0, '2017-11-13 08:38:47', '2017-11-13 08:38:47'),
(92, 2, 4, 0, 0, '2017-11-13 08:38:47', '2017-11-13 08:38:47'),
(107, 8, 1, 0, 0, '2017-11-13 09:15:30', '2017-11-13 09:15:30'),
(108, 8, 2, 0, 0, '2017-11-13 09:15:30', '2017-11-13 09:15:30'),
(109, 8, 3, 0, 0, '2017-11-13 09:15:30', '2017-11-13 09:15:30'),
(110, 8, 4, 0, 0, '2017-11-13 09:15:30', '2017-11-13 09:15:30'),
(115, 9, 3, 0, 0, '2017-11-13 10:12:51', '2017-11-13 10:12:51'),
(120, 10, 1, 0, 0, '2017-11-15 07:31:50', '2017-11-15 07:31:50'),
(121, 10, 2, 0, 0, '2017-11-15 07:31:51', '2017-11-15 07:31:51'),
(122, 10, 3, 0, 0, '2017-11-15 07:31:51', '2017-11-15 07:31:51'),
(123, 10, 4, 0, 0, '2017-11-15 07:31:51', '2017-11-15 07:31:51'),
(124, 11, 1, 0, 0, '2017-11-15 07:32:53', '2017-11-15 07:32:53'),
(125, 11, 2, 0, 0, '2017-11-15 07:32:53', '2017-11-15 07:32:53'),
(126, 11, 3, 0, 0, '2017-11-15 07:32:53', '2017-11-15 07:32:53'),
(127, 11, 4, 0, 0, '2017-11-15 07:32:54', '2017-11-15 07:32:54'),
(128, 12, 1, 0, 0, '2017-11-15 11:40:57', '2017-11-15 11:40:57'),
(129, 12, 2, 0, 0, '2017-11-15 11:40:57', '2017-11-15 11:40:57'),
(130, 12, 3, 0, 0, '2017-11-15 11:40:57', '2017-11-15 11:40:57'),
(131, 12, 4, 0, 0, '2017-11-15 11:40:57', '2017-11-15 11:40:57'),
(132, 13, 1, 0, 0, '2017-11-16 05:25:43', '2017-11-16 05:25:43'),
(133, 13, 3, 0, 0, '2017-11-16 05:25:43', '2017-11-16 05:25:43'),
(134, 14, 1, 0, 0, '2017-11-19 08:43:28', '2017-11-19 08:43:28'),
(135, 14, 2, 0, 0, '2017-11-19 08:43:28', '2017-11-19 08:43:28'),
(136, 14, 3, 0, 0, '2017-11-19 08:43:28', '2017-11-19 08:43:28'),
(137, 14, 4, 0, 0, '2017-11-19 08:43:28', '2017-11-19 08:43:28'),
(138, 15, 1, 0, 0, '2017-11-19 08:43:51', '2017-11-19 08:43:51'),
(139, 15, 2, 0, 0, '2017-11-19 08:43:51', '2017-11-19 08:43:51'),
(140, 15, 3, 0, 0, '2017-11-19 08:43:51', '2017-11-19 08:43:51'),
(141, 15, 4, 0, 0, '2017-11-19 08:43:51', '2017-11-19 08:43:51'),
(145, 16, 1, 0, 0, '2017-11-19 09:29:14', '2017-11-19 09:29:14'),
(146, 16, 2, 0, 0, '2017-11-19 09:29:15', '2017-11-19 09:29:15'),
(147, 16, 3, 0, 0, '2017-11-19 09:29:15', '2017-11-19 09:29:15'),
(148, 16, 4, 0, 0, '2017-11-19 09:29:15', '2017-11-19 09:29:15'),
(149, 17, 1, 0, 0, '2017-11-20 06:58:28', '2017-11-20 06:58:28'),
(150, 17, 2, 0, 0, '2017-11-20 06:58:28', '2017-11-20 06:58:28'),
(151, 17, 3, 0, 0, '2017-11-20 06:58:28', '2017-11-20 06:58:28'),
(152, 17, 4, 0, 0, '2017-11-20 06:58:28', '2017-11-20 06:58:28'),
(153, 18, 1, 0, 0, '2017-11-21 07:04:55', '2017-11-21 07:04:55'),
(154, 18, 2, 0, 0, '2017-11-21 07:04:55', '2017-11-21 07:04:55'),
(155, 18, 3, 0, 0, '2017-11-21 07:04:55', '2017-11-21 07:04:55'),
(156, 18, 4, 0, 0, '2017-11-21 07:04:56', '2017-11-21 07:04:56'),
(174, 19, 1, 0, 0, '2017-11-23 06:00:11', '2017-11-23 06:00:11'),
(175, 19, 2, 0, 0, '2017-11-23 06:00:11', '2017-11-23 06:00:11'),
(176, 19, 3, 0, 0, '2017-11-23 06:00:11', '2017-11-23 06:00:11'),
(177, 19, 4, 0, 0, '2017-11-23 06:00:11', '2017-11-23 06:00:11'),
(178, 19, 16, 0, 0, '2017-11-23 06:00:11', '2017-11-23 06:00:11'),
(179, 20, 1, 0, 0, '2017-11-27 04:36:18', '2017-11-27 04:36:18'),
(180, 20, 2, 0, 0, '2017-11-27 04:36:18', '2017-11-27 04:36:18'),
(181, 20, 3, 0, 0, '2017-11-27 04:36:18', '2017-11-27 04:36:18'),
(182, 20, 4, 0, 0, '2017-11-27 04:36:18', '2017-11-27 04:36:18'),
(183, 21, 3, 0, 0, '2017-11-29 05:04:02', '2017-11-29 05:04:02'),
(184, 22, 1, 0, 0, '2017-11-29 05:48:48', '2017-11-29 05:48:48'),
(185, 22, 2, 0, 0, '2017-11-29 05:48:48', '2017-11-29 05:48:48'),
(186, 22, 3, 0, 0, '2017-11-29 05:48:48', '2017-11-29 05:48:48'),
(187, 22, 4, 0, 0, '2017-11-29 05:48:48', '2017-11-29 05:48:48'),
(188, 23, 1, 0, 0, '2017-11-29 10:26:51', '2017-11-29 10:26:51'),
(189, 23, 2, 0, 0, '2017-11-29 10:26:51', '2017-11-29 10:26:51'),
(190, 23, 3, 0, 0, '2017-11-29 10:26:51', '2017-11-29 10:26:51'),
(191, 23, 4, 0, 0, '2017-11-29 10:26:51', '2017-11-29 10:26:51'),
(192, 24, 3, 0, 0, '2017-12-03 09:17:16', '2017-12-03 09:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `module_to_role`
--

CREATE TABLE `module_to_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `module_id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `activity_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_to_role`
--

INSERT INTO `module_to_role` (`id`, `module_id`, `role_id`, `activity_id`) VALUES
(1024, 1, 6, 1),
(1025, 1, 6, 2),
(1026, 1, 6, 3),
(1027, 2, 6, 1),
(1028, 2, 6, 2),
(1029, 2, 6, 3),
(1030, 3, 6, 1),
(1031, 3, 6, 2),
(1032, 3, 6, 3),
(1033, 6, 6, 1),
(1034, 6, 6, 2),
(1035, 6, 6, 3),
(1036, 7, 6, 1),
(1037, 7, 6, 2),
(1038, 7, 6, 3),
(1039, 8, 6, 1),
(1040, 8, 6, 2),
(1041, 8, 6, 3),
(1042, 9, 6, 3),
(1043, 10, 6, 1),
(1044, 10, 6, 2),
(1045, 10, 6, 3),
(1046, 11, 6, 1),
(1047, 11, 6, 2),
(1048, 11, 6, 3),
(1049, 12, 6, 1),
(1050, 12, 6, 2),
(1051, 12, 6, 3),
(1052, 13, 6, 1),
(1053, 13, 6, 3),
(1054, 14, 6, 1),
(1055, 14, 6, 2),
(1056, 14, 6, 3),
(1057, 15, 6, 1),
(1058, 15, 6, 2),
(1059, 15, 6, 3),
(1060, 16, 6, 1),
(1061, 16, 6, 2),
(1062, 16, 6, 3),
(1063, 17, 6, 1),
(1064, 17, 6, 2),
(1065, 17, 6, 3),
(1066, 18, 6, 1),
(1067, 18, 6, 2),
(1068, 18, 6, 3),
(1069, 19, 6, 1),
(1070, 19, 6, 2),
(1071, 19, 6, 3),
(1072, 19, 6, 16),
(1073, 20, 6, 1),
(1074, 20, 6, 2),
(1075, 20, 6, 3),
(1076, 21, 6, 3),
(1077, 22, 6, 1),
(1078, 22, 6, 2),
(1079, 22, 6, 3),
(1080, 23, 6, 1),
(1081, 23, 6, 2),
(1082, 23, 6, 3),
(1127, 19, 8, 1),
(1128, 19, 8, 16),
(1305, 1, 1, 1),
(1306, 1, 1, 2),
(1307, 1, 1, 3),
(1308, 1, 1, 4),
(1309, 2, 1, 1),
(1310, 3, 1, 1),
(1311, 3, 1, 2),
(1312, 3, 1, 3),
(1313, 3, 1, 4),
(1314, 6, 1, 1),
(1315, 7, 1, 1),
(1316, 7, 1, 2),
(1317, 7, 1, 3),
(1318, 7, 1, 4),
(1319, 8, 1, 1),
(1320, 8, 1, 2),
(1321, 8, 1, 3),
(1322, 8, 1, 4),
(1323, 9, 1, 3),
(1324, 10, 1, 1),
(1325, 10, 1, 2),
(1326, 10, 1, 3),
(1327, 10, 1, 4),
(1328, 11, 1, 1),
(1329, 11, 1, 2),
(1330, 11, 1, 3),
(1331, 11, 1, 4),
(1332, 13, 1, 1),
(1333, 13, 1, 3),
(1334, 14, 1, 1),
(1335, 14, 1, 2),
(1336, 14, 1, 3),
(1337, 14, 1, 4),
(1338, 15, 1, 1),
(1339, 15, 1, 2),
(1340, 15, 1, 3),
(1341, 15, 1, 4),
(1342, 16, 1, 1),
(1343, 16, 1, 2),
(1344, 16, 1, 3),
(1345, 16, 1, 4),
(1346, 17, 1, 1),
(1347, 17, 1, 2),
(1348, 17, 1, 3),
(1349, 17, 1, 4),
(1350, 18, 1, 1),
(1351, 18, 1, 2),
(1352, 18, 1, 3),
(1353, 18, 1, 4),
(1354, 19, 1, 1),
(1355, 19, 1, 2),
(1356, 19, 1, 3),
(1357, 19, 1, 4),
(1358, 19, 1, 16),
(1359, 20, 1, 1),
(1360, 20, 1, 2),
(1361, 20, 1, 3),
(1362, 20, 1, 4),
(1363, 21, 1, 3),
(1364, 22, 1, 1),
(1365, 22, 1, 2),
(1366, 22, 1, 3),
(1367, 22, 1, 4),
(1368, 23, 1, 1),
(1369, 23, 1, 2),
(1370, 23, 1, 3),
(1371, 23, 1, 4),
(1372, 24, 1, 3),
(1418, 10, 7, 1),
(1419, 10, 7, 2),
(1420, 10, 7, 3),
(1421, 10, 7, 4),
(1422, 11, 7, 1),
(1423, 11, 7, 2),
(1424, 11, 7, 3),
(1425, 11, 7, 4),
(1426, 12, 7, 1),
(1427, 12, 7, 2),
(1428, 12, 7, 3),
(1429, 12, 7, 4),
(1430, 13, 7, 1),
(1431, 13, 7, 3),
(1432, 18, 7, 1),
(1433, 18, 7, 2),
(1434, 18, 7, 3),
(1435, 18, 7, 4),
(1436, 19, 7, 1),
(1437, 19, 7, 3),
(1438, 19, 7, 4),
(1439, 19, 7, 16),
(1440, 20, 7, 1),
(1441, 20, 7, 2),
(1442, 20, 7, 3),
(1443, 20, 7, 4),
(1444, 21, 7, 3),
(1445, 23, 7, 1),
(1446, 23, 7, 2),
(1447, 23, 7, 3),
(1448, 23, 7, 4),
(1449, 24, 7, 3),
(1471, 14, 9, 1),
(1472, 15, 9, 1),
(1473, 16, 9, 1),
(1474, 18, 9, 1),
(1475, 18, 9, 2),
(1476, 18, 9, 3),
(1477, 18, 9, 4),
(1478, 19, 9, 1),
(1479, 19, 9, 2),
(1480, 19, 9, 3),
(1481, 20, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_to_user`
--

CREATE TABLE `module_to_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `module_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `activity_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_to_user`
--

INSERT INTO `module_to_user` (`id`, `module_id`, `user_id`, `activity_id`) VALUES
(35, 1, 65, 1),
(37, 2, 65, 1),
(39, 3, 65, 1),
(41, 4, 65, 1),
(43, 5, 65, 1),
(991, 19, 95, 1),
(992, 19, 95, 16),
(1052, 1, 89, 1),
(1053, 1, 89, 2),
(1054, 1, 89, 3),
(1055, 2, 89, 1),
(1056, 2, 89, 2),
(1057, 2, 89, 3),
(1058, 3, 89, 1),
(1059, 3, 89, 2),
(1060, 3, 89, 3),
(1061, 6, 89, 1),
(1062, 6, 89, 2),
(1063, 6, 89, 3),
(1064, 7, 89, 1),
(1065, 7, 89, 2),
(1066, 7, 89, 3),
(1067, 8, 89, 1),
(1068, 8, 89, 2),
(1069, 8, 89, 3),
(1070, 9, 89, 3),
(1071, 10, 89, 1),
(1072, 10, 89, 2),
(1073, 10, 89, 3),
(1074, 11, 89, 1),
(1075, 11, 89, 2),
(1076, 11, 89, 3),
(1077, 12, 89, 1),
(1078, 12, 89, 2),
(1079, 12, 89, 3),
(1080, 13, 89, 1),
(1081, 13, 89, 3),
(1082, 14, 89, 1),
(1083, 14, 89, 2),
(1084, 14, 89, 3),
(1085, 15, 89, 1),
(1086, 15, 89, 2),
(1087, 15, 89, 3),
(1088, 16, 89, 1),
(1089, 16, 89, 2),
(1090, 16, 89, 3),
(1091, 17, 89, 1),
(1092, 17, 89, 2),
(1093, 17, 89, 3),
(1094, 18, 89, 1),
(1095, 18, 89, 2),
(1096, 18, 89, 3),
(1097, 19, 89, 1),
(1098, 19, 89, 2),
(1099, 19, 89, 3),
(1100, 19, 89, 16),
(1101, 20, 89, 1),
(1102, 20, 89, 2),
(1103, 20, 89, 3),
(1104, 21, 89, 3),
(1105, 22, 89, 1),
(1106, 22, 89, 2),
(1107, 22, 89, 3),
(1108, 23, 89, 1),
(1109, 23, 89, 2),
(1110, 23, 89, 3),
(1198, 19, 91, 1),
(1199, 19, 91, 16),
(1354, 1, 55, 1),
(1355, 1, 55, 2),
(1356, 1, 55, 3),
(1357, 1, 55, 4),
(1358, 2, 55, 1),
(1359, 3, 55, 1),
(1360, 3, 55, 2),
(1361, 3, 55, 3),
(1362, 3, 55, 4),
(1363, 6, 55, 1),
(1364, 7, 55, 1),
(1365, 7, 55, 2),
(1366, 7, 55, 3),
(1367, 7, 55, 4),
(1368, 8, 55, 1),
(1369, 8, 55, 2),
(1370, 8, 55, 3),
(1371, 8, 55, 4),
(1372, 9, 55, 3),
(1373, 10, 55, 1),
(1374, 10, 55, 2),
(1375, 10, 55, 3),
(1376, 10, 55, 4),
(1377, 11, 55, 1),
(1378, 11, 55, 2),
(1379, 11, 55, 3),
(1380, 11, 55, 4),
(1381, 13, 55, 1),
(1382, 13, 55, 3),
(1383, 14, 55, 1),
(1384, 14, 55, 2),
(1385, 14, 55, 3),
(1386, 14, 55, 4),
(1387, 15, 55, 1),
(1388, 15, 55, 2),
(1389, 15, 55, 3),
(1390, 15, 55, 4),
(1391, 16, 55, 1),
(1392, 16, 55, 2),
(1393, 16, 55, 3),
(1394, 16, 55, 4),
(1395, 17, 55, 1),
(1396, 17, 55, 2),
(1397, 17, 55, 3),
(1398, 17, 55, 4),
(1399, 18, 55, 1),
(1400, 18, 55, 2),
(1401, 18, 55, 3),
(1402, 18, 55, 4),
(1403, 19, 55, 1),
(1404, 19, 55, 2),
(1405, 19, 55, 3),
(1406, 19, 55, 4),
(1407, 19, 55, 16),
(1408, 20, 55, 1),
(1409, 20, 55, 2),
(1410, 20, 55, 3),
(1411, 20, 55, 4),
(1412, 21, 55, 3),
(1413, 22, 55, 1),
(1414, 22, 55, 2),
(1415, 22, 55, 3),
(1416, 22, 55, 4),
(1417, 23, 55, 1),
(1418, 23, 55, 2),
(1419, 23, 55, 3),
(1420, 23, 55, 4),
(1421, 24, 55, 3),
(1467, 10, 90, 1),
(1468, 10, 90, 2),
(1469, 10, 90, 3),
(1470, 10, 90, 4),
(1471, 11, 90, 1),
(1472, 11, 90, 2),
(1473, 11, 90, 3),
(1474, 11, 90, 4),
(1475, 12, 90, 1),
(1476, 12, 90, 2),
(1477, 12, 90, 3),
(1478, 12, 90, 4),
(1479, 13, 90, 1),
(1480, 13, 90, 3),
(1481, 18, 90, 1),
(1482, 18, 90, 2),
(1483, 18, 90, 3),
(1484, 18, 90, 4),
(1485, 19, 90, 1),
(1486, 19, 90, 3),
(1487, 19, 90, 4),
(1488, 19, 90, 16),
(1489, 20, 90, 1),
(1490, 20, 90, 2),
(1491, 20, 90, 3),
(1492, 20, 90, 4),
(1493, 21, 90, 3),
(1494, 23, 90, 1),
(1495, 23, 90, 2),
(1496, 23, 90, 3),
(1497, 23, 90, 4),
(1498, 24, 90, 3),
(1519, 14, 96, 1),
(1520, 14, 97, 1),
(1521, 15, 96, 1),
(1522, 15, 97, 1),
(1523, 16, 96, 1),
(1524, 16, 97, 1),
(1525, 18, 96, 1),
(1526, 18, 97, 1),
(1527, 18, 96, 2),
(1528, 18, 97, 2),
(1529, 18, 96, 3),
(1530, 18, 97, 3),
(1531, 18, 96, 4),
(1532, 18, 97, 4),
(1533, 19, 96, 1),
(1534, 19, 97, 1),
(1535, 19, 96, 2),
(1536, 19, 97, 2),
(1537, 19, 96, 3),
(1538, 19, 97, 3),
(1539, 20, 96, 1),
(1540, 20, 97, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `parent_category_id` int(10) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `question_type` int(10) NOT NULL,
  `mediaFile` varchar(255) DEFAULT NULL,
  `answerType` int(10) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option_1` varchar(255) NOT NULL,
  `option_2` varchar(255) NOT NULL,
  `option_3` varchar(255) NOT NULL,
  `option_4` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `answer_level` int(10) NOT NULL,
  `question_status` enum('pending','approved','rejected','') NOT NULL,
  `status_id` tinyint(4) NOT NULL,
  `rejected_suggestion` varchar(255) DEFAULT NULL,
  `review_times` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_by_quality_controller` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `parent_category_id`, `quiz_id`, `keywords`, `question_type`, `mediaFile`, `answerType`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_answer`, `answer_level`, `question_status`, `status_id`, `rejected_suggestion`, `review_times`, `created_by`, `created_at`, `updated_by`, `updated_by_quality_controller`, `updated_at`) VALUES
(5, 22, 0, '1', 0, '5', 1, 'কে সর্বপ্রথম কম্পিউটারের ‘মাউস’ তৈরী করেন? ', 'ফ্লয়েড ডান', 'ফেডরিকো কাপাসো', 'উইলিয়াম ইংলিশ', 'নিকোলা টেসলা', '3', 1, 'pending', 1, NULL, 0, 55, '2017-12-04 04:31:00', 55, 0, '2017-12-04 04:31:00'),
(6, 22, 0, '1,2,3', 1, '4', 1, 'কম্পিউটারের কী-বোর্ডে F7 ফাংশন দিয়ে কি কাজ করা হয়? ক) ', 'Spelling Check', 'Search', 'Client', 'Camera', '1', 2, 'pending', 1, NULL, 0, 55, '2017-12-04 04:31:01', 55, 0, '2017-12-04 04:31:01'),
(7, 22, 0, NULL, 2, '7', 1, 'সফটওয়্যার মূলত কি ধরনের শক্তি?', 'সহায়ক শক্তি', 'রাসায়নিক শক্তি', 'দৃশ্য শক্তি ', 'অদৃশ্য শক্তি', '4', 3, 'pending', 1, NULL, 0, 55, '2017-12-04 04:31:01', 55, 0, '2017-12-04 04:31:01'),
(8, 22, 0, NULL, 3, '8', 2, 'সফটওয়্যার প্রধাণত কয় ধরনের?', '2', '1', '3', '4', '2', 1, 'pending', 1, NULL, 0, 55, '2017-12-04 04:31:01', 55, 0, '2017-12-04 04:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`id`, `name`, `description`, `extension`, `status_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Image', 'Images', 'Jpg,Jpeg,png,gif', 1, 0, NULL, '2017-11-19 03:50:19', '2017-11-19 03:51:25'),
(2, 'Audio', 'Audio', 'mp3', 1, 55, 55, '2017-11-19 04:01:00', '2017-11-19 04:01:00'),
(3, 'Video', 'Videos', '3gp,mp4', 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  `order_no` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `total_play` int(11) DEFAULT NULL,
  `avg_score` decimal(10,0) DEFAULT NULL,
  `type_id` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = general 2 = second round',
  `status_id` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`id`, `category_id`, `name`, `info`, `order_no`, `start_date`, `end_date`, `photo`, `total_play`, `avg_score`, `type_id`, `status_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 23, 'লেভেল - ১ ', '', 1, NULL, NULL, '5993da52cec8dComputer.png', 34, '4', 1, 1, 44, '2017-07-30 13:11:08', 55, '2017-11-16 04:23:35'),
(2, 23, 'লেভেল - ২', '', 2, NULL, NULL, '5993db55e51fcComputer.png', 4, '6', 1, 1, 44, '2017-07-30 17:10:55', 44, '2017-08-19 12:01:30'),
(3, 23, 'লেভেল - ৩', '', 3, NULL, NULL, '5993dc6de2d39Computer.png', 2, '5', 1, 1, 44, '2017-07-30 17:46:14', 44, '2017-08-19 12:00:06'),
(4, 23, 'লেভেল - ৪', '', 4, NULL, NULL, '5993dc7e51bfeComputer.png', NULL, NULL, 1, 1, 44, '2017-07-30 17:56:45', 44, '2017-08-16 11:47:42'),
(5, 24, 'লেভেল - ১ ', '', 1, NULL, NULL, '5993da6abd98eChikungunia.png', 39, '5', 1, 1, 44, '2017-07-31 12:01:36', 116, '2017-11-02 12:09:01'),
(6, 24, 'লেভেল - ২', '', 2, NULL, NULL, '5993db7c068c1Chikungunia.png', 13, '5', 1, 1, 44, '2017-07-31 12:02:27', 115, '2017-11-02 11:01:48'),
(7, 24, 'লেভেল - ৩', '', 3, NULL, NULL, '5993db943253eChikungunia.png', 7, '5', 1, 1, 44, '2017-07-31 12:03:16', 106, '2017-08-21 14:54:14'),
(8, 24, 'লেভেল - ৪', '', 4, NULL, NULL, '5993dba45e814Chikungunia.png', 4, '5', 1, 1, 44, '2017-07-31 12:03:56', 106, '2017-08-21 14:59:26'),
(9, 25, 'লেভেল - ১ ', '', 1, NULL, NULL, '5993dab7e328aSocial Media.png', 12, '7', 1, 1, 44, '2017-07-31 14:31:23', 116, '2017-11-06 17:53:53'),
(10, 25, 'লেভেল - ২', '', 2, NULL, NULL, '5993dbbf68b33Social Media.png', 4, '6', 1, 1, 44, '2017-07-31 14:31:54', 99, '2017-08-20 17:29:35'),
(11, 25, 'লেভেল - ৩', '', 3, NULL, NULL, '5993dbd812873Social Media.png', 2, '8', 1, 1, 44, '2017-07-31 14:32:23', 99, '2017-08-20 17:30:37'),
(12, 25, 'লেভেল - ৪', '', 4, NULL, NULL, '5993dbfdc5733Social Media.png', 1, '5', 1, 1, 44, '2017-07-31 14:32:49', 99, '2017-08-20 17:31:38'),
(13, 26, 'লেভেল - ১ ', '', 1, NULL, NULL, '5993dac277072Manob Deho.png', 8, '5', 1, 1, 44, '2017-07-31 17:30:18', 116, '2017-11-06 17:10:53'),
(14, 26, 'লেভেল - ২', '', 2, NULL, NULL, '5993dc1c3c622Manob Deho.png', 1, '8', 1, 1, 44, '2017-07-31 17:30:47', 99, '2017-08-20 17:34:36'),
(15, 26, 'লেভেল - ৩', '', 3, NULL, NULL, '5993dc3508fb5Manob Deho.png', NULL, NULL, 1, 1, 44, '2017-07-31 17:31:13', 44, '2017-08-16 11:46:29'),
(16, 26, 'লেভেল - ৪', '', 4, NULL, NULL, '5993dc492bacaManob Deho.png', NULL, NULL, 1, 1, 44, '2017-07-31 17:31:46', 44, '2017-08-16 11:46:49'),
(17, 28, 'লেভেল - ১ ', '', 1, NULL, NULL, '5993dad96f861Bangladesh Cricket.png', 11, '5', 1, 1, 44, '2017-08-01 12:43:56', 116, '2017-11-06 13:01:28'),
(18, 28, 'লেভেল - ২', '', 2, NULL, NULL, '5993dd706d578Bangladesh Cricket.png', 2, '4', 1, 1, 44, '2017-08-01 12:44:39', 44, '2017-08-16 11:51:44'),
(19, 28, 'লেভেল - ৩', '', 3, NULL, NULL, '5993dd82ddd05Bangladesh Cricket.png', 1, '6', 1, 1, 44, '2017-08-01 12:45:24', 44, '2017-08-16 11:52:02'),
(20, 28, 'লেভেল - ৪', '', 4, NULL, NULL, '5993dd923001eBangladesh Cricket.png', 1, '9', 1, 1, 44, '2017-08-01 12:46:06', 44, '2017-08-16 11:52:18'),
(21, 33, 'লেভেল - ১ ', '', 1, NULL, NULL, '5993db04b449dMishore Piramid.png', 6, '3', 1, 1, 44, '2017-08-01 15:14:31', 116, '2017-11-06 17:45:46'),
(22, 33, 'লেভেল - ২', '', 2, NULL, NULL, '5993e60f5dc9dMishore Piramid.png', NULL, NULL, 1, 1, 44, '2017-08-01 15:14:53', 44, '2017-08-16 12:28:31'),
(23, 29, 'লেভেল - ১ ', '', 1, NULL, NULL, '5997d65eb0207Cricket World Cup-1.png', 4, '5', 1, 1, 44, '2017-08-07 11:14:15', 116, '2017-11-06 17:40:55'),
(24, 29, 'লেভেল - ২', '', 2, NULL, NULL, '5997d66d154c5Cricket World Cup-1.png', 1, '7', 1, 1, 44, '2017-08-07 11:14:38', 44, '2017-08-19 12:10:53'),
(25, 29, 'লেভেল - ৩', '', 3, NULL, NULL, '5997d67d34e1cCricket World Cup-1.png', 1, '4', 1, 1, 44, '2017-08-07 11:15:02', 44, '2017-08-19 12:11:09'),
(26, 29, 'লেভেল - ৪', '', 4, NULL, NULL, '5997d68bb6b45Cricket World Cup-1.png', 2, '4', 1, 1, 44, '2017-08-07 11:15:23', 44, '2017-08-19 12:11:23'),
(27, 30, 'লেভেল - ১ ', '', 1, NULL, NULL, '5993db23dde4cFootball Legue.png', 3, '3', 1, 1, 44, '2017-08-07 13:51:33', 106, '2017-08-21 14:34:34'),
(28, 30, 'লেভেল - ২', '', 2, NULL, NULL, '5993e21a96d9bFootball Legue.png', 2, '4', 1, 1, 44, '2017-08-07 13:52:06', 106, '2017-08-21 14:35:51'),
(29, 30, 'লেভেল - ৩', '', 3, NULL, NULL, '5993e22bca1f3Football Legue.png', 5, '6', 1, 1, 44, '2017-08-07 13:52:27', 44, '2017-08-16 12:11:55'),
(30, 30, 'লেভেল - ৪', '', 4, NULL, NULL, '5993e24396a97Football Legue.png', 1, '5', 1, 1, 44, '2017-08-07 13:54:08', 44, '2017-08-16 12:12:19'),
(31, 31, 'লেভেল - ১ ', '', 1, NULL, NULL, '5993db3237f21Tenis.png', 3, '4', 1, 1, 44, '2017-08-08 11:32:57', 44, '2017-08-16 11:42:10'),
(32, 31, 'লেভেল - ২', '', 2, NULL, NULL, '5993e28ccf2bcTenis.png', 1, '5', 1, 1, 44, '2017-08-08 11:33:21', 44, '2017-08-16 12:13:32'),
(33, 31, 'লেভেল - ৩', '', 3, NULL, NULL, '5993e29b0bd07Tenis.png', 1, '2', 1, 1, 44, '2017-08-08 11:33:45', 44, '2017-08-16 12:13:47'),
(34, 31, 'লেভেল - ৪', '', 4, NULL, NULL, '5993e2afc80eeTenis.png', 1, '7', 1, 1, 44, '2017-08-08 11:34:00', 44, '2017-08-16 12:14:07'),
(35, 33, 'লেভেল - ৩', '', 3, NULL, NULL, '5993e626266fcMishore Piramid.png', NULL, NULL, 1, 1, 44, '2017-08-10 17:42:25', 44, '2017-08-16 12:28:54'),
(36, 33, 'লেভেল - ৪', '', 4, NULL, NULL, '5993e64180fc5Mishore Piramid.png', NULL, NULL, 1, 1, 44, '2017-08-10 17:43:53', 44, '2017-08-16 12:29:21'),
(37, 34, 'লেভেল - ১ ', '', 1, NULL, NULL, '5993eee0e53c6Shagor Talodesh.png', 4, '4', 1, 1, 44, '2017-08-16 13:06:08', 115, '2017-11-02 11:05:22'),
(38, 34, 'লেভেল - ২', '', 2, NULL, NULL, '5993eefb79f5cShagor Talodesh.png', 1, '6', 1, 1, 44, '2017-08-16 13:06:35', 44, '2017-08-17 13:27:34'),
(39, 34, 'লেভেল - ৩', '', 3, NULL, NULL, '5993ef106b2baShagor Talodesh.png', NULL, NULL, 1, 1, 44, '2017-08-16 13:06:56', 44, '2017-08-16 13:06:56'),
(40, 34, 'লেভেল - ৪', '', 4, NULL, NULL, '5993ef2d4d679Shagor Talodesh.png', NULL, NULL, 1, 1, 44, '2017-08-16 13:07:25', 44, '2017-08-16 13:07:25'),
(41, 36, 'লেভেল - ১ ', '', 1, NULL, NULL, '59955d42e2ea9Groho Nakhtro.png', 3, '3', 1, 1, 44, '2017-08-17 15:09:22', 111, '2017-08-23 00:51:33'),
(42, 36, 'লেভেল - ২', '', 2, NULL, NULL, '59955d602bb08Groho Nakhtro.png', 4, '4', 1, 1, 44, '2017-08-17 15:09:52', 111, '2017-08-23 00:53:23'),
(43, 36, 'লেভেল - ৩', '', 3, NULL, NULL, '59955d7d3ca5dGroho Nakhtro.png', 1, '1', 1, 1, 44, '2017-08-17 15:10:21', 44, '2017-08-19 15:39:54'),
(44, 36, 'লেভেল - ৪', '', 4, NULL, NULL, '59955d91c9e0aGroho Nakhtro.png', 1, '4', 1, 1, 44, '2017-08-17 15:10:41', 44, '2017-08-19 16:29:41'),
(45, 37, 'লেভেল - ১ ', '', 1, NULL, NULL, '5998133a54f4cGrang Canion.png', NULL, NULL, 1, 1, 44, '2017-08-19 16:30:18', 44, '2017-08-19 16:30:18'),
(46, 37, 'লেভেল - ২', '', 2, NULL, NULL, '5998134bd65ebGrang Canion.png', NULL, NULL, 1, 1, 44, '2017-08-19 16:30:35', 44, '2017-08-19 16:30:35'),
(47, 37, 'লেভেল - ৩', '', 3, NULL, NULL, '5998135da3087Grang Canion.png', NULL, NULL, 1, 1, 44, '2017-08-19 16:30:53', 44, '2017-08-19 16:30:53'),
(48, 37, 'লেভেল - ৪', '', 4, NULL, NULL, '5998137028ce1Grang Canion.png', NULL, NULL, 1, 1, 44, '2017-08-19 16:31:12', 44, '2017-08-19 16:31:12'),
(49, 38, 'লেভেল - ১ ', '', 1, NULL, NULL, '59992687d1380Taroka Jagat.png', 2, '6', 1, 1, 44, '2017-08-20 12:04:55', 115, '2017-11-02 10:58:52'),
(50, 38, 'লেভেল - ২', '', 2, NULL, NULL, '5999269ac5572Taroka Jagat.png', NULL, NULL, 1, 1, 44, '2017-08-20 12:05:14', 44, '2017-08-20 12:05:14'),
(51, 38, 'লেভেল - ৩', '', 3, NULL, NULL, '599926ae4d1f6Taroka Jagat.png', NULL, NULL, 1, 1, 44, '2017-08-20 12:05:34', 44, '2017-08-20 12:05:34'),
(52, 38, 'লেভেল - ৪', '', 4, NULL, NULL, '599926e946bcbTaroka Jagat.png', NULL, NULL, 1, 1, 44, '2017-08-20 12:06:33', 44, '2017-08-20 12:06:33'),
(53, 39, 'লেভেল - ১ ', '', 1, NULL, NULL, '599927130475eGan Bazna.png', NULL, NULL, 1, 1, 44, '2017-08-20 12:07:15', 44, '2017-08-20 12:07:15'),
(54, 39, 'লেভেল - ২', '', 2, NULL, NULL, '5999272476eafGan Bazna.png', NULL, NULL, 1, 1, 44, '2017-08-20 12:07:32', 44, '2017-08-20 12:07:32'),
(55, 39, 'লেভেল - ৩', '', 3, NULL, NULL, '5999273535776Gan Bazna.png', NULL, NULL, 1, 1, 44, '2017-08-20 12:07:49', 44, '2017-08-20 12:07:49'),
(56, 39, 'লেভেল - ৪', '', 4, NULL, NULL, '599927461d251Gan Bazna.png', NULL, NULL, 1, 1, 44, '2017-08-20 12:08:06', 44, '2017-08-20 12:08:06'),
(57, 40, 'লেভেল - ১ ', '', 1, NULL, NULL, '599976320bd33Natok.png', 2, '4', 1, 1, 44, '2017-08-20 17:44:50', 116, '2017-11-05 15:44:05'),
(58, 40, 'লেভেল - ২', '', 2, NULL, NULL, '59997641d405eNatok.png', NULL, NULL, 1, 1, 44, '2017-08-20 17:45:05', 44, '2017-08-20 17:45:05'),
(59, 40, 'লেভেল - ৩', '', 3, NULL, NULL, '5999765787fb2Natok.png', NULL, NULL, 1, 1, 44, '2017-08-20 17:45:27', 44, '2017-08-20 17:45:46'),
(60, 40, 'লেভেল - ৪', '', 4, NULL, NULL, '5999767b5a26bNatok.png', NULL, NULL, 1, 1, 44, '2017-08-20 17:46:03', 44, '2017-08-20 17:46:03'),
(61, 41, 'লেভেল - ১ ', '', 1, NULL, NULL, '599976aeb1e85Cinema.png', 2, '1', 1, 1, 44, '2017-08-20 17:46:54', 44, '2017-08-21 11:17:28'),
(62, 41, 'লেভেল - ২', '', 2, NULL, NULL, '599976c08b15dCinema.png', 1, '6', 1, 1, 44, '2017-08-20 17:47:12', 44, '2017-08-24 16:17:27'),
(63, 41, 'লেভেল - ৩', '', 3, NULL, NULL, '599976d0cee8cCinema.png', 11, '2', 1, 1, 44, '2017-08-20 17:47:28', 44, '2017-08-24 17:01:07'),
(64, 41, 'লেভেল - ৪', '', 4, NULL, NULL, '599976e21ced5Cinema.png', 2, '4', 1, 1, 44, '2017-08-20 17:47:46', 44, '2017-08-27 12:06:56'),
(65, 48, 'লেভেল - ১ ', '', 1, NULL, NULL, '599a8b29eecddMujib.png', 4, '2', 1, 1, 44, '2017-08-21 13:26:33', 44, '2017-08-24 14:57:08'),
(66, 48, 'লেভেল - ২', '', 2, NULL, NULL, '599a8b41e2ae1Mujib.png', NULL, NULL, 1, 1, 44, '2017-08-21 13:26:57', 44, '2017-08-21 13:26:57'),
(67, 48, 'লেভেল - ৩', '', 3, NULL, NULL, '599a8b58836cbMujib.png', NULL, NULL, 1, 1, 44, '2017-08-21 13:27:20', 44, '2017-08-21 13:27:20'),
(68, 48, 'লেভেল - ৪', '', 4, NULL, NULL, '599a8b6b66da4Mujib.png', NULL, NULL, 1, 1, 44, '2017-08-21 13:27:39', 44, '2017-08-21 13:27:39'),
(69, 44, 'লেভেল - ১ ', '', 1, NULL, NULL, '59a2647bcb4e8Ahsan Monjil.png', 2, '3', 1, 1, 44, '2017-08-27 12:19:39', 115, '2017-11-02 11:15:26'),
(70, 44, 'লেভেল - ২', '', 2, NULL, NULL, '59a2649b6f41cAhsan Monjil.png', NULL, NULL, 1, 1, 44, '2017-08-27 12:20:11', 44, '2017-08-27 12:20:11'),
(71, 44, 'লেভেল - ৩', '', 3, NULL, NULL, '59a264b0e5d0aAhsan Monjil.png', NULL, NULL, 1, 1, 44, '2017-08-27 12:20:32', 44, '2017-08-27 12:20:32'),
(72, 44, 'লেভেল - ৪', '', 4, NULL, NULL, '59a264c902aecAhsan Monjil.png', NULL, NULL, 1, 1, 44, '2017-08-27 12:20:57', 44, '2017-08-27 12:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `quizsettings`
--

CREATE TABLE `quizsettings` (
  `id` int(10) UNSIGNED NOT NULL,
  `questions` int(11) NOT NULL,
  `quizs` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quizsettings`
--

INSERT INTO `quizsettings` (`id`, `questions`, `quizs`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2017-10-31 18:00:00', '2017-11-28 23:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_logs`
--

CREATE TABLE `quiz_logs` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `counter_time` int(11) NOT NULL COMMENT 'time in second',
  `grade_id` int(11) DEFAULT NULL,
  `total_question` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_logs`
--

INSERT INTO `quiz_logs` (`id`, `quiz_id`, `user_id`, `start_time`, `end_time`, `counter_time`, `grade_id`, `total_question`, `score`) VALUES
(1, 1, 44, '2017-07-30 17:39:58', '2017-07-30 17:41:02', 62, 21, 10, 2),
(2, 2, 44, '2017-07-30 17:49:35', '2017-07-30 17:50:18', 42, 20, 10, 5),
(3, 1, 102, '2017-07-30 20:05:28', '2017-07-30 20:09:13', 223, 20, 10, 5),
(4, 1, 102, '2017-07-30 20:26:13', '2017-07-30 20:26:58', 43, 21, 10, 2),
(5, 2, 102, '2017-07-30 20:27:39', '2017-07-30 20:28:37', 57, 15, 10, 7),
(6, 1, 102, '2017-07-31 10:59:24', '2017-07-31 11:00:27', 217, 19, 10, 6),
(7, 5, 44, '2017-07-31 12:16:27', '2017-07-31 12:16:37', 10, 20, 2, 1),
(8, 5, 102, '2017-07-31 12:23:00', '2017-07-31 12:23:13', 12, 16, 3, 3),
(9, 1, 44, '2017-07-31 12:22:06', '2017-07-31 12:23:14', 66, 21, 10, 2),
(10, 5, 44, '2017-07-31 12:35:21', '2017-07-31 12:35:35', 13, 19, 5, 3),
(11, 1, 99, '2017-07-31 12:36:09', '2017-07-31 12:37:22', 70, 21, 10, 4),
(12, 1, 102, '2017-07-31 12:57:43', '2017-07-31 12:58:32', 46, 15, 10, 7),
(13, 1, 99, '2017-07-31 13:04:29', '2017-07-31 13:05:32', 61, 21, 10, 2),
(14, 1, 102, '2017-07-31 13:07:17', '2017-07-31 13:08:10', 51, 19, 10, 6),
(15, 1, 99, '2017-07-31 13:08:33', '2017-07-31 13:09:30', 54, 21, 10, 4),
(16, 9, 44, '2017-07-31 17:22:43', '2017-07-31 17:23:33', 49, 16, 10, 8),
(17, 9, 44, '2017-07-31 17:24:10', '2017-07-31 17:25:24', 72, 15, 10, 7),
(18, 10, 44, '2017-07-31 17:25:49', '2017-07-31 17:26:43', 52, 19, 9, 6),
(19, 11, 44, '2017-07-31 17:26:52', '2017-07-31 17:28:00', 66, 16, 10, 9),
(20, 2, 102, '2017-07-31 18:38:52', '2017-07-31 18:41:39', 166, 16, 10, 8),
(21, 1, 102, '2017-07-31 19:27:51', '2017-07-31 19:28:57', 65, 21, 10, 3),
(22, 5, 102, '2017-07-31 19:30:16', '2017-07-31 19:32:50', 153, 16, 10, 10),
(23, 1, 102, '2017-07-31 19:30:41', '2017-07-31 19:36:38', 356, 21, 10, 4),
(24, 5, 99, '2017-07-31 19:39:53', '2017-07-31 19:40:44', 49, 19, 10, 6),
(25, 5, 102, '2017-07-31 19:41:11', '2017-07-31 19:41:54', 39, 21, 10, 3),
(26, 9, 102, '2017-07-31 19:42:37', '2017-07-31 19:43:25', 47, 15, 10, 7),
(27, 10, 102, '2017-07-31 19:44:24', '2017-07-31 19:45:57', 91, 21, 9, 4),
(28, 6, 102, '2017-07-31 20:27:56', '2017-07-31 20:28:33', 35, 21, 11, 4),
(29, 6, 102, '2017-07-31 20:34:44', '2017-07-31 20:35:29', 44, 15, 10, 7),
(30, 1, 102, '2017-07-31 20:50:03', '2017-07-31 20:50:45', 42, 21, 10, 4),
(31, 3, 102, '2017-07-31 20:51:08', '2017-07-31 20:52:04', 54, 20, 10, 5),
(32, 10, 102, '2017-07-31 20:52:50', '2017-07-31 20:53:43', 50, 16, 10, 8),
(33, 7, 102, '2017-07-31 21:29:41', '2017-07-31 21:31:49', 124, 21, 10, 4),
(34, 1, 102, '2017-08-01 06:09:25', '2017-08-01 06:10:16', 49, 19, 10, 6),
(35, 5, 102, '2017-08-01 08:07:50', '2017-08-01 08:08:29', 38, 16, 10, 8),
(36, 1, 102, '2017-08-01 10:19:00', '2017-08-01 10:19:43', 42, 16, 10, 9),
(37, 9, 102, '2017-08-01 10:42:08', '2017-08-01 10:43:40', 91, 15, 10, 7),
(38, 13, 102, '2017-08-01 10:47:47', '2017-08-01 10:48:27', 38, 20, 10, 5),
(39, 9, 102, '2017-08-01 10:49:50', '2017-08-01 10:50:37', 43, 16, 10, 9),
(40, 1, 102, '2017-08-01 12:05:05', '2017-08-01 12:08:31', 204, 20, 10, 5),
(41, 13, 102, '2017-08-01 12:17:18', '2017-08-01 12:18:09', 50, 16, 10, 9),
(42, 5, 104, '2017-08-01 12:34:12', '2017-08-01 12:38:34', 254, 19, 10, 6),
(43, 17, 44, '2017-08-01 13:24:56', '2017-08-01 13:26:01', 61, 16, 10, 9),
(44, 5, 105, '2017-08-01 14:04:45', '2017-08-01 14:08:50', 243, 21, 10, 4),
(45, 18, 44, '2017-08-01 14:18:09', '2017-08-01 14:20:50', 145, 20, 4, 2),
(46, 1, 102, '2017-08-01 14:29:39', '2017-08-01 14:30:10', 30, 21, 10, 3),
(47, 9, 102, '2017-08-01 14:33:36', '2017-08-01 14:34:06', 30, 21, 10, 3),
(48, 5, 99, '2017-08-01 15:57:51', '2017-08-01 15:59:00', 67, 15, 10, 7),
(49, 1, 106, '2017-08-01 15:50:51', '2017-08-01 16:00:52', 601, 20, 10, 5),
(50, 5, 102, '2017-08-01 18:23:10', '2017-08-01 18:23:54', 42, 21, 10, 2),
(51, 1, 99, '2017-08-02 13:19:57', '2017-08-02 13:25:25', 328, 16, 10, 8),
(52, 17, 44, '2017-08-05 12:33:49', '2017-08-05 12:34:24', 34, 21, 10, 3),
(53, 18, 44, '2017-08-05 12:34:37', '2017-08-05 12:35:25', 47, 20, 10, 5),
(54, 5, 44, '2017-08-05 16:05:33', '2017-08-05 16:12:15', 401, 21, 10, 4),
(55, 17, 107, '2017-08-06 14:42:15', '2017-08-06 14:43:38', 81, 21, 10, 4),
(56, 17, 107, '2017-08-06 14:45:00', '2017-08-06 14:46:05', 63, 16, 10, 8),
(57, 19, 44, '2017-08-07 11:10:51', '2017-08-07 11:11:39', 46, 19, 10, 6),
(58, 20, 44, '2017-08-07 11:11:49', '2017-08-07 11:12:38', 47, 16, 10, 9),
(59, 23, 44, '2017-08-07 12:12:00', '2017-08-07 12:12:47', 41, 19, 10, 6),
(60, 24, 44, '2017-08-07 12:13:47', '2017-08-07 12:14:16', 28, 16, 7, 7),
(61, 25, 44, '2017-08-07 13:28:38', '2017-08-07 13:29:09', 30, 21, 10, 4),
(62, 26, 44, '2017-08-07 13:29:20', '2017-08-07 13:29:42', 21, 21, 10, 3),
(63, 26, 44, '2017-08-07 13:32:09', '2017-08-07 13:32:59', 49, 20, 10, 5),
(64, 27, 44, '2017-08-07 14:46:48', '2017-08-07 14:47:27', 38, 21, 10, 4),
(65, 27, 44, '2017-08-07 18:03:10', '2017-08-07 18:03:39', 28, 21, 10, 1),
(66, 28, 44, '2017-08-08 10:51:15', '2017-08-08 10:52:20', 64, 19, 10, 6),
(67, 29, 44, '2017-08-08 10:53:15', '2017-08-08 10:55:17', 121, 21, 10, 3),
(68, 29, 44, '2017-08-08 10:55:37', '2017-08-08 10:59:33', 235, 19, 10, 6),
(69, 29, 44, '2017-08-08 10:59:40', '2017-08-08 11:02:19', 158, 21, 10, 3),
(70, 29, 44, '2017-08-08 11:02:24', '2017-08-08 11:04:43', 138, 16, 10, 8),
(71, 29, 44, '2017-08-08 11:09:14', '2017-08-08 11:09:52', 37, 16, 10, 8),
(72, 30, 44, '2017-08-08 11:10:37', '2017-08-08 11:13:15', 155, 20, 10, 5),
(73, 31, 44, '2017-08-08 11:41:00', '2017-08-08 11:41:10', 10, 19, 3, 2),
(74, 31, 44, '2017-08-08 12:34:57', '2017-08-08 12:35:58', 60, 19, 10, 6),
(75, 5, 99, '2017-08-08 13:11:56', '2017-08-08 13:13:08', 71, 21, 10, 4),
(76, 5, 106, '2017-08-08 14:36:29', '2017-08-08 14:37:51', 82, 19, 10, 6),
(77, 5, 106, '2017-08-08 14:47:18', '2017-08-08 14:47:53', 34, 21, 10, 4),
(78, 17, 106, '2017-08-08 14:48:48', '2017-08-08 14:56:55', 486, 21, 10, 3),
(79, 1, 102, '2017-08-09 10:09:18', '2017-08-09 10:09:51', 32, 21, 10, 2),
(80, 5, 102, '2017-08-09 10:11:26', '2017-08-09 10:11:57', 30, 16, 10, 9),
(81, 5, 102, '2017-08-09 15:25:21', '2017-08-09 15:26:04', 41, 16, 10, 8),
(82, 13, 44, '2017-08-09 15:30:17', '2017-08-09 15:30:55', 37, 21, 10, 1),
(83, 31, 44, '2017-08-09 17:39:32', '2017-08-09 17:40:42', 70, 21, 10, 3),
(84, 32, 44, '2017-08-09 17:40:56', '2017-08-09 17:41:33', 36, 20, 10, 5),
(85, 1, 106, '2017-08-10 10:15:29', '2017-08-10 10:18:05', 155, 21, 10, 3),
(86, 5, 102, '2017-08-10 10:21:37', '2017-08-10 10:23:11', 90, 19, 10, 6),
(87, 5, 99, '2017-08-10 10:47:37', '2017-08-10 10:48:15', 33, 20, 10, 5),
(88, 5, 99, '2017-08-10 11:39:32', '2017-08-10 11:40:12', 38, 19, 10, 6),
(89, 5, 99, '2017-08-10 12:04:03', '2017-08-10 12:04:31', 27, 16, 10, 9),
(90, 17, 102, '2017-08-10 12:41:40', '2017-08-10 12:42:22', 41, 20, 10, 5),
(91, 5, 109, '2017-08-10 13:04:17', '2017-08-10 13:05:13', 55, 15, 10, 7),
(92, 6, 109, '2017-08-10 13:05:46', '2017-08-10 13:06:58', 71, 19, 10, 6),
(93, 7, 109, '2017-08-10 13:07:33', '2017-08-10 13:08:44', 69, 21, 10, 4),
(94, 8, 109, '2017-08-10 13:09:09', '2017-08-10 13:11:04', 111, 20, 10, 5),
(95, 13, 109, '2017-08-10 13:13:38', '2017-08-10 13:15:11', 93, 19, 10, 6),
(96, 5, 109, '2017-08-10 13:50:13', '2017-08-10 13:51:05', 51, 15, 10, 7),
(97, 5, 102, '2017-08-10 14:27:35', '2017-08-10 14:28:15', 39, 20, 10, 5),
(98, 1, 102, '2017-08-10 14:38:31', '2017-08-10 14:39:47', 75, 21, 10, 1),
(99, 1, 102, '2017-08-10 14:38:18', '2017-08-10 14:40:00', 100, 15, 10, 7),
(100, 33, 44, '2017-08-10 17:36:54', '2017-08-10 17:37:21', 26, 21, 10, 2),
(101, 34, 44, '2017-08-10 17:37:36', '2017-08-10 17:38:00', 23, 15, 10, 7),
(102, 13, 44, '2017-08-10 17:44:44', '2017-08-10 17:45:02', 18, 21, 10, 4),
(103, 21, 44, '2017-08-10 18:04:00', '2017-08-10 18:04:18', 17, 16, 2, 2),
(104, 21, 44, '2017-08-13 13:49:47', '2017-08-13 13:50:11', 23, 21, 10, 2),
(105, 37, 44, '2017-08-16 15:15:33', '2017-08-16 15:15:53', 19, 21, 4, 0),
(106, 21, 102, '2017-08-16 17:55:40', '2017-08-16 17:56:29', 46, 21, 10, 3),
(107, 37, 102, '2017-08-16 17:58:00', '2017-08-16 17:58:45', 41, 19, 10, 6),
(108, 37, 44, '2017-08-16 18:13:32', '2017-08-16 18:13:56', 22, 15, 10, 7),
(109, 5, 99, '2017-08-17 12:09:00', '2017-08-17 12:09:48', 47, 16, 10, 9),
(110, 1, 99, '2017-08-17 13:19:56', '2017-08-17 13:20:32', 35, 16, 10, 9),
(111, 38, 44, '2017-08-17 13:27:05', '2017-08-17 13:27:34', 28, 19, 10, 6),
(112, 41, 44, '2017-08-17 15:14:36', '2017-08-17 15:14:40', 3, 16, 1, 1),
(113, 41, 44, '2017-08-17 16:57:05', '2017-08-17 16:57:14', 8, 21, 3, 1),
(114, 6, 102, '2017-08-17 17:50:29', '2017-08-17 17:50:59', 29, 21, 10, 4),
(115, 6, 102, '2017-08-17 18:15:46', '2017-08-17 18:16:11', 23, 21, 10, 3),
(116, 21, 102, '2017-08-17 18:28:27', '2017-08-17 18:28:54', 22, 21, 10, 4),
(117, 5, 106, '2017-08-17 18:35:52', '2017-08-17 18:36:11', 19, 21, 10, 3),
(118, 5, 106, '2017-08-17 21:15:38', '2017-08-17 21:15:58', 19, 21, 10, 3),
(119, 6, 106, '2017-08-17 21:16:31', '2017-08-17 21:16:53', 21, 21, 10, 3),
(120, 9, 106, '2017-08-17 21:20:29', '2017-08-17 21:21:25', 55, 15, 10, 7),
(121, 1, 99, '2017-08-18 09:58:35', '2017-08-18 09:59:44', 68, 16, 10, 10),
(122, 5, 106, '2017-08-19 10:34:12', '2017-08-19 10:36:11', 117, 16, 10, 8),
(123, 6, 106, '2017-08-19 10:37:20', '2017-08-19 10:39:19', 118, 20, 10, 5),
(124, 6, 106, '2017-08-19 10:41:04', '2017-08-19 10:41:55', 50, 21, 10, 3),
(125, 6, 106, '2017-08-19 10:42:42', '2017-08-19 10:43:38', 55, 15, 10, 7),
(126, 6, 106, '2017-08-19 10:47:34', '2017-08-19 10:49:11', 96, 16, 10, 9),
(127, 7, 106, '2017-08-19 10:49:53', '2017-08-19 10:52:58', 182, 19, 10, 6),
(128, 5, 44, '2017-08-19 11:11:30', '2017-08-19 11:12:42', 71, 16, 10, 10),
(129, 5, 44, '2017-08-19 11:15:10', '2017-08-19 11:19:59', 288, 16, 10, 8),
(130, 6, 44, '2017-08-19 11:31:17', '2017-08-19 11:51:18', 1197, 16, 10, 9),
(131, 7, 44, '2017-08-19 11:51:43', '2017-08-19 11:52:54', 65, 20, 10, 5),
(132, 1, 44, '2017-08-19 11:53:49', '2017-08-19 11:55:37', 105, 19, 10, 6),
(133, 1, 44, '2017-08-19 11:56:02', '2017-08-19 11:57:05', 62, 19, 10, 6),
(134, 3, 44, '2017-08-19 11:59:23', '2017-08-19 12:00:06', 42, 21, 10, 4),
(135, 2, 44, '2017-08-19 12:00:47', '2017-08-19 12:01:30', 42, 21, 10, 4),
(136, 23, 44, '2017-08-19 12:11:51', '2017-08-19 12:12:54', 62, 21, 10, 2),
(137, 42, 44, '2017-08-19 15:19:40', '2017-08-19 15:19:48', 7, 21, 3, 0),
(138, 42, 44, '2017-08-19 15:26:59', '2017-08-19 15:27:13', 14, 19, 5, 3),
(139, 42, 44, '2017-08-19 15:39:12', '2017-08-19 15:39:43', 30, 19, 10, 6),
(140, 43, 44, '2017-08-19 15:39:50', '2017-08-19 15:39:54', 4, 16, 1, 1),
(141, 44, 44, '2017-08-19 16:29:22', '2017-08-19 16:29:41', 18, 21, 10, 4),
(142, 21, 99, '2017-08-20 11:16:32', '2017-08-20 11:17:43', 69, 21, 10, 4),
(143, 5, 110, '2017-08-20 11:42:07', '2017-08-20 11:43:35', 86, 15, 10, 7),
(144, 6, 110, '2017-08-20 11:44:08', '2017-08-20 11:45:16', 61, 19, 10, 6),
(145, 1, 110, '2017-08-20 11:48:14', '2017-08-20 11:49:28', 73, 21, 10, 4),
(146, 5, 110, '2017-08-20 11:50:28', '2017-08-20 11:51:15', 45, 16, 10, 10),
(147, 17, 44, '2017-08-20 12:00:39', '2017-08-20 12:01:53', 72, 21, 10, 3),
(148, 49, 44, '2017-08-20 13:04:37', '2017-08-20 13:05:14', 36, 19, 10, 6),
(149, 9, 99, '2017-08-20 17:27:34', '2017-08-20 17:28:12', 37, 16, 10, 10),
(150, 10, 99, '2017-08-20 17:28:35', '2017-08-20 17:29:35', 59, 15, 10, 7),
(151, 11, 99, '2017-08-20 17:29:47', '2017-08-20 17:30:37', 49, 19, 10, 6),
(152, 12, 99, '2017-08-20 17:30:45', '2017-08-20 17:31:39', 52, 20, 10, 5),
(153, 13, 99, '2017-08-20 17:32:35', '2017-08-20 17:33:28', 52, 19, 10, 6),
(154, 14, 99, '2017-08-20 17:33:37', '2017-08-20 17:34:36', 59, 16, 10, 8),
(155, 5, 99, '2017-08-20 18:16:08', '2017-08-20 18:16:46', 33, 21, 10, 3),
(156, 57, 44, '2017-08-21 10:56:55', '2017-08-21 10:57:26', 30, 19, 10, 6),
(157, 61, 44, '2017-08-21 11:15:56', '2017-08-21 11:16:03', 5, 20, 2, 1),
(158, 61, 44, '2017-08-21 11:16:56', '2017-08-21 11:17:28', 32, 20, 2, 1),
(159, 5, 44, '2017-08-21 14:01:54', '2017-08-21 14:06:24', 269, 21, 10, 3),
(160, 65, 44, '2017-08-21 13:30:54', '2017-08-21 14:13:04', 2529, 20, 2, 1),
(161, 65, 44, '2017-08-21 14:13:17', '2017-08-21 14:13:38', 20, 21, 5, 2),
(162, 65, 44, '2017-08-21 14:14:20', '2017-08-21 14:14:30', 9, 19, 5, 3),
(163, 17, 44, '2017-08-21 14:14:56', '2017-08-21 14:15:56', 60, 21, 10, 4),
(164, 9, 44, '2017-08-21 14:20:05', '2017-08-21 14:20:56', 50, 15, 10, 7),
(165, 27, 106, '2017-08-21 14:31:07', '2017-08-21 14:34:34', 205, 21, 10, 3),
(166, 28, 106, '2017-08-21 14:34:54', '2017-08-21 14:35:51', 55, 21, 10, 1),
(167, 7, 106, '2017-08-21 14:50:01', '2017-08-21 14:52:28', 133, 20, 10, 5),
(168, 7, 106, '2017-08-21 14:50:01', '2017-08-21 14:52:28', 130, 20, 10, 5),
(169, 7, 106, '2017-08-21 14:50:01', '2017-08-21 14:52:28', 127, 20, 10, 5),
(170, 7, 106, '2017-08-21 14:52:56', '2017-08-21 14:54:14', 77, 19, 10, 6),
(171, 8, 106, '2017-08-21 14:54:24', '2017-08-21 14:57:14', 153, 19, 10, 6),
(172, 8, 44, '2017-08-21 14:58:09', '2017-08-21 14:58:29', 19, 21, 10, 3),
(173, 8, 106, '2017-08-21 14:58:43', '2017-08-21 14:59:26', 42, 20, 10, 5),
(174, 9, 99, '2017-08-22 08:56:27', '2017-08-22 08:57:58', 88, 16, 10, 9),
(175, 1, 104, '2017-08-22 15:43:23', '2017-08-22 15:45:13', 110, 16, 10, 8),
(176, 5, 111, '2017-08-22 21:37:52', '2017-08-22 21:38:52', 58, 16, 10, 8),
(177, 1, 111, '2017-08-22 21:39:18', '2017-08-22 21:40:11', 51, 16, 10, 10),
(178, 41, 111, '2017-08-23 00:50:11', '2017-08-23 00:51:33', 81, 15, 10, 7),
(179, 42, 111, '2017-08-23 00:51:57', '2017-08-23 00:53:23', 85, 15, 10, 7),
(180, 65, 44, '2017-08-24 14:56:55', '2017-08-24 14:57:08', 12, 21, 5, 2),
(181, 62, 44, '2017-08-24 16:16:56', '2017-08-24 16:17:27', 31, 19, 10, 6),
(182, 63, 44, '2017-08-24 16:17:33', '2017-08-24 16:17:54', 20, 15, 4, 3),
(183, 63, 44, '2017-08-24 16:24:24', '2017-08-24 16:24:54', 29, 21, 5, 1),
(184, 63, 44, '2017-08-24 16:31:07', '2017-08-24 16:31:23', 15, 21, 5, 1),
(185, 63, 44, '2017-08-24 16:34:22', '2017-08-24 16:34:34', 11, 21, 5, 2),
(186, 63, 44, '2017-08-24 16:37:18', '2017-08-24 16:37:29', 10, 21, 5, 2),
(187, 63, 44, '2017-08-24 16:40:15', '2017-08-24 16:40:30', 14, 21, 7, 2),
(188, 63, 44, '2017-08-24 16:45:17', '2017-08-24 16:46:45', 87, 21, 9, 3),
(189, 63, 44, '2017-08-24 16:46:50', '2017-08-24 16:47:08', 18, 21, 9, 3),
(190, 63, 44, '2017-08-24 16:56:23', '2017-08-24 16:56:38', 14, 21, 9, 2),
(191, 63, 44, '2017-08-24 16:59:01', '2017-08-24 16:59:25', 22, 21, 10, 2),
(192, 63, 44, '2017-08-24 17:00:48', '2017-08-24 17:01:07', 18, 21, 10, 2),
(193, 64, 44, '2017-08-27 12:04:57', '2017-08-27 12:05:48', 49, 21, 10, 3),
(194, 64, 44, '2017-08-27 12:06:25', '2017-08-27 12:06:56', 29, 21, 10, 4),
(195, 69, 44, '2017-08-27 12:24:46', '2017-08-27 12:24:53', 6, 16, 2, 2),
(196, 5, 77, '2017-08-30 11:22:39', '2017-08-30 11:23:10', 30, 16, 10, 8),
(197, 5, 77, '2017-08-30 15:40:41', '2017-08-30 15:41:04', 22, 16, 10, 10),
(198, 1, 112, '2017-09-09 10:48:33', '2017-09-09 10:49:48', 74, 21, 10, 4),
(199, 17, 112, '2017-09-09 13:52:54', '2017-09-09 13:54:41', 105, 15, 10, 7),
(200, 1, 113, '2017-09-10 17:23:03', '2017-09-10 17:23:24', 20, 21, 10, 2),
(201, 1, 112, '2017-09-28 16:33:28', '2017-09-28 16:35:56', 148, 20, 10, 5),
(202, 5, 115, '2017-11-02 10:51:47', '2017-11-02 10:53:13', 85, 19, 10, 6),
(203, 17, 115, '2017-11-02 10:53:33', '2017-11-02 10:54:54', 80, 20, 10, 5),
(204, 49, 115, '2017-11-02 10:56:05', '2017-11-02 10:58:53', 167, 19, 10, 6),
(205, 1, 115, '2017-11-02 10:59:03', '2017-11-02 10:59:52', 49, 19, 10, 6),
(206, 6, 115, '2017-11-02 11:00:40', '2017-11-02 11:01:48', 67, 20, 10, 5),
(207, 37, 115, '2017-11-02 11:02:49', '2017-11-02 11:05:22', 152, 21, 10, 3),
(208, 23, 115, '2017-11-02 11:08:14', '2017-11-02 11:09:43', 88, 21, 10, 4),
(209, 69, 115, '2017-11-02 11:15:08', '2017-11-02 11:15:26', 17, 16, 3, 3),
(210, 9, 115, '2017-11-02 11:19:42', '2017-11-02 11:33:56', 854, 16, 10, 8),
(211, 5, 116, '2017-11-02 12:07:55', '2017-11-02 12:09:01', 65, 16, 10, 9),
(212, 13, 116, '2017-11-02 14:55:08', '2017-11-02 14:56:34', 81, 16, 10, 8),
(213, 57, 116, '2017-11-05 15:43:28', '2017-11-05 15:44:05', 36, 21, 10, 1),
(214, 17, 116, '2017-11-06 13:00:46', '2017-11-06 13:01:28', 40, 20, 10, 5),
(215, 13, 116, '2017-11-06 17:10:05', '2017-11-06 17:10:53', 47, 16, 10, 8),
(216, 23, 116, '2017-11-06 17:40:03', '2017-11-06 17:40:55', 51, 16, 10, 8),
(217, 21, 116, '2017-11-06 17:41:36', '2017-11-06 17:45:46', 250, 21, 10, 4),
(218, 9, 116, '2017-11-06 17:53:21', '2017-11-06 17:53:53', 31, 21, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_id` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `info`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 'Super User', 'Super User of this application who can manage all kind of operation', 55, 55, '2017-04-12 17:30:56', '2017-04-17 11:11:45', 1),
(6, 'Admin Manager	', 'Limited access with almost all the features', 55, 55, '2017-11-15 06:58:49', '2017-11-15 06:58:49', 1),
(7, 'Content Manager', 'Content Manager', 55, 55, '2017-11-15 07:03:24', '2017-11-15 07:03:24', 1),
(8, 'Quality Controller', 'Quality Controller', 55, 55, '2017-11-15 07:03:44', '2017-11-15 07:03:44', 1),
(9, 'Content Writer', 'Content Writer', 55, 55, '2017-11-15 07:04:05', '2017-11-15 07:04:05', 1),
(10, 'Promoter', 'Promoter', 55, 55, '2017-11-15 07:04:23', '2017-11-15 07:04:23', 1),
(11, 'Operator', 'Operator', 55, 55, '2017-11-15 07:04:35', '2017-11-15 07:04:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `tag_line` varchar(255) DEFAULT NULL,
  `site_description` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `copyRight` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `tag_line`, `site_description`, `email`, `phone`, `logo`, `favicon`, `copyRight`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Quiz Busket', 'sss', 'meta Descriptio', 'farhani@gmail.com', '01689934254', 'upload/systemSettings/1OHpGwOzyzlJqtriEa6A.jpg', 'upload/systemSettings/tF8t3iCjcRxOLTsERv1L.jpg', 'Quiz Busket', 55, 55, '0000-00-00 00:00:00', '2017-11-20 06:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_no` varchar(14) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `question_type_id` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `status_id` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `contact_no`, `username`, `password`, `designation`, `photo`, `category_id`, `question_type_id`, `keywords`, `status_id`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(55, 1, 'system', 'Administrator', '', '', 'admin', '$2y$10$ppajPjtC7Q9iDxLDt9l0Au8abnkvomOBgOYy1rEg1/rE9ThJLlz1W', '', '59e5becf3c2e4default_female600x600-3702af30bd630e7b0fa62af75cd2e67c.png', '', '', NULL, 1, '4SUe3R83BcmKIQJse42qlfGSWFrDFW3Mc2KvFd6jfLeNGQk5iQg13LIy7cjk', 44, 55, '2015-10-15 04:21:06', '2017-11-09 11:57:29'),
(92, 10, 'Promoter', 'Promoter', '', '', 'promoter', '$2y$10$6A7vUlRNgQzFZ0H/GpZW0uqXx5617SntrXOSOBl3nm67rAWEHXntO', '', NULL, '', '', NULL, 1, NULL, 55, 55, '2017-11-15 07:06:25', '2017-11-15 07:06:25'),
(93, 11, 'operator', 'operator', '', '', 'operator', '$2y$10$dhXozBSDuZrTQbPYtTYPX.3/oxISVNj32ZhtqE/1FJ8rANPghwByO', '', NULL, '', '', NULL, 1, NULL, 55, 55, '2017-11-15 07:06:52', '2017-11-15 07:06:52'),
(89, 6, 'Admin', 'Manager', 'info@issl.com.bd', '', 'adminManager', '$2y$10$yNhr6Nu87qIdoZugZYF9V.aqx9.3MVvFvwg2D7gcplxnSeLzNHL1m', '', NULL, '', '', NULL, 1, 'NLGG8suOkXXd2beL5lQzxDgZM3btYGVZwuIRVmV60L5uRwP3uU1cpYx3BhpU', 55, 89, '2017-11-15 07:02:12', '2017-11-15 07:02:26'),
(90, 7, 'Content', 'Manager', '', '', 'contentManager', '$2y$10$06p26IjmMZUN0r.OUdJCxOeS3F2kULFj4LxPCYuTwoFguFXHBwTPi', '', NULL, '', '', NULL, 1, 'mn28EWoABU3XPvEKn1jqbUgEJxTcFLik5vERusoNGhR4ChJvXggu8lzDulQT', 55, 90, '2017-10-15 07:05:21', '2017-11-15 07:05:21'),
(91, 8, 'Quality', 'Controller', '', '', 'qualityController', '$2y$10$tMI818lAUK8GjOda8ROC2e0rFaLfYGwapmsOLPrO5v4ghLR6Y20aG', '', NULL, '22,27,32', '1,2,3', '3', 1, 'frxKqX7lAIKlhBoPUUW8uyuFMIFVPyCkKoDNBhFHx0umiYDiYl0hOFF7eNnv', 55, 55, '2017-10-15 07:05:52', '2017-12-03 12:05:14'),
(96, 9, 'Farhan', 'Monsi', '', '', 'admin1', '$2y$10$o3wdh1X/hVugJkXEtHbquu08NFuIjm01mPDSz5awD1BkID.71I2cO', '', NULL, '22,27', '1,2', '2,3', 1, 'VqJcfPDGX6lEil4pMa4Qh0Aa5CxQDZVQNnhYHgwOIlLEVGhVeZodzC3hLKU9', 55, 90, '2017-11-29 06:16:40', '2017-12-03 09:32:11'),
(95, 8, 'Farhan', 'Monsi', '', '', 'admin123', '$2y$10$RdrCwBKuj1uyLjo56fQ90.CyC7RmDgCFJudeVtGLzmMV58Ms3hjKS', '', NULL, '22,27,32,43', '1,2', '1,2', 1, 'NXpvg2Md3uqwFaLUyinGemgEFrSGKmRBU5F8MhjMJJ04iKyOFvcA1NzQJY4Y', 55, 95, '2017-11-20 09:27:18', '2017-11-30 04:34:16'),
(97, 9, 'Content', 'Writer', '', '', 'contentWriter', '$2y$10$ulLf42l/nDS927srTS9oSu/oSanhX3ImOLXvZpWji.g1irA0FLzfe', '', NULL, '22', '2,3', '2,3', 1, '2VYmSjxNbfgLt8Cq28lWD6DCff0V2KAiKBRsRvhbHKgS1v4XSsAaVaaRfNbW', 55, 97, '2017-11-30 04:40:33', '2017-12-03 10:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(200) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `info`, `updated_at`, `updated_by`) VALUES
(1, 'Administrator ', 'System Administrator ', '2017-04-11 16:19:05', 55),
(2, 'Account Manager', 'Account Manager', '2014-12-29 03:59:58', 44);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertizes`
--
ALTER TABLE `advertizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_level`
--
ALTER TABLE `answer_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_type`
--
ALTER TABLE `answer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charged_logs`
--
ALTER TABLE `charged_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_writer_role`
--
ALTER TABLE `content_writer_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internal_url`
--
ALTER TABLE `internal_url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_to_activity`
--
ALTER TABLE `module_to_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_to_role`
--
ALTER TABLE `module_to_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_to_user`
--
ALTER TABLE `module_to_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizsettings`
--
ALTER TABLE `quizsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_logs`
--
ALTER TABLE `quiz_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `advertizes`
--
ALTER TABLE `advertizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `answer_level`
--
ALTER TABLE `answer_level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `answer_type`
--
ALTER TABLE `answer_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `charged_logs`
--
ALTER TABLE `charged_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content_writer_role`
--
ALTER TABLE `content_writer_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `internal_url`
--
ALTER TABLE `internal_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `module_to_activity`
--
ALTER TABLE `module_to_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `module_to_role`
--
ALTER TABLE `module_to_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1482;

--
-- AUTO_INCREMENT for table `module_to_user`
--
ALTER TABLE `module_to_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1541;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `quizsettings`
--
ALTER TABLE `quizsettings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_logs`
--
ALTER TABLE `quiz_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
