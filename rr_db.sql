-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 06, 2018 lúc 05:23 AM
-- Phiên bản máy phục vụ: 5.7.19
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `rr_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_27_215924_create_reviews_table', 1),
(4, '2018_04_03_044632_alter_reviews_table_to_update_some_fields', 1),
(5, '2018_04_16_041057_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bbb@mailinator.com', '$2y$10$wbJ0kzYw7ohn2l4yYNl/OOx4/KFzhpPdpH4Vb17TPFPaUbkiQ2ZK2', '2018-07-18 06:47:31'),
('aaa@mailinator.com', '$2y$10$KCWVx5Kb1ot431xJBk6tBeHQHooY0cFwdTX9Zlmp5XvtR7c2rUffO', '2018-07-19 06:22:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uniform` int(11) DEFAULT NULL,
  `uniform_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hygience` int(11) DEFAULT NULL,
  `hygience_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respectful` int(11) DEFAULT NULL,
  `respectful_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teamwork` int(11) DEFAULT NULL,
  `teamwork_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adaptability` int(11) DEFAULT NULL,
  `adaptability_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependability` int(11) DEFAULT NULL,
  `dependability_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attention_to_safety` int(11) DEFAULT NULL,
  `attention_to_safety_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `integrity` int(11) DEFAULT NULL,
  `integrity_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ability_to_tolerate_stress` int(11) DEFAULT NULL,
  `ability_to_tolerate_stress_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decision_making` int(11) DEFAULT NULL,
  `decision_making_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assertiveness` int(11) DEFAULT NULL,
  `assertiveness_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewer` int(10) UNSIGNED NOT NULL,
  `reviewee` int(10) UNSIGNED NOT NULL,
  `attendance` int(10) UNSIGNED NOT NULL,
  `tardies` int(11) DEFAULT NULL,
  `absences` int(11) DEFAULT NULL,
  `absence_hours` int(11) DEFAULT NULL,
  `maximum_allowable_absence_hours` int(11) DEFAULT NULL,
  `academic_achievement` int(11) DEFAULT NULL,
  `class_standing` int(11) DEFAULT NULL,
  `academic_achievement_percent` double(8,4) DEFAULT NULL,
  `excellence_reports` int(11) DEFAULT NULL,
  `discrepancy_reports` int(11) DEFAULT NULL,
  `disciplinary_actions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `general_comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_reviewer_foreign` (`reviewer`),
  KEY `reviews_reviewee_foreign` (`reviewee`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `created_at`, `updated_at`, `uniform`, `uniform_comment`, `hygience`, `hygience_comment`, `respectful`, `respectful_comment`, `teamwork`, `teamwork_comment`, `adaptability`, `adaptability_comment`, `dependability`, `dependability_comment`, `attention_to_safety`, `attention_to_safety_comment`, `integrity`, `integrity_comment`, `ability_to_tolerate_stress`, `ability_to_tolerate_stress_comment`, `decision_making`, `decision_making_comment`, `assertiveness`, `assertiveness_comment`, `reviewer`, `reviewee`, `attendance`, `tardies`, `absences`, `absence_hours`, `maximum_allowable_absence_hours`, `academic_achievement`, `class_standing`, `academic_achievement_percent`, `excellence_reports`, `discrepancy_reports`, `disciplinary_actions`, `staff_comments`, `general_comments`) VALUES
(2, '2018-07-14 07:49:10', '2018-07-14 07:49:10', 3, NULL, 2, NULL, 4, NULL, 5, 'aaa', 2, NULL, 3, NULL, 1, 'z', 3, NULL, 3, NULL, 3, NULL, 3, NULL, 3, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc'),
(3, '2018-07-18 07:07:32', '2018-07-18 07:07:32', 3, NULL, 3, NULL, 3, NULL, 3, NULL, 3, NULL, 3, NULL, 3, NULL, 3, NULL, 3, NULL, 3, NULL, 3, NULL, 4, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'date', '07/14/2018', '2018-07-18 07:14:17', '2018-07-18 07:14:17'),
(2, 'max_allow_absence_hours', '4', '2018-07-18 07:14:17', '2018-07-18 07:14:17'),
(3, 'class_standing', '1', '2018-07-18 07:14:17', '2018-07-18 07:14:17'),
(4, 'academy_staff_officer', '1', '2018-07-18 07:14:17', '2018-07-18 07:14:17'),
(5, 'evaluation_start_date', '07/14/2018', '2018-07-18 07:14:17', '2018-07-18 07:14:17'),
(6, 'evaluation_end_date', '07/21/2018', '2018-07-18 07:14:17', '2018-07-18 07:14:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `year` year(4) DEFAULT NULL,
  `module` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `role`, `year`, `module`, `created_at`, `updated_at`, `deleted_at`, `password`, `remember_token`) VALUES
(1, 'admin', NULL, 'admin@admin.com', 1, NULL, NULL, NULL, '2018-07-14 07:08:01', NULL, '$2y$10$gv3i4o0dwrtJf./Umh2tt.Yw4eNuUedXD3VBLvos9HmHLeEQTmKTC', 'GVBpEAa1ja5IjNf3GyYqKdXKRIc5aYij5l3foZztaeTCLEGW9jLgFXIkNZlC'),
(4, 'aaa', 'aaa', 'aaa@mailinator.com', 2, 2018, 1, '2018-07-18 06:52:07', '2018-07-18 06:52:07', NULL, '$2y$10$r58JAcgxEscs2F3.gq3w4uJGO3YWkE4sBhsrTvQyIc6r5cST/Pg2G', 'e9taF35acU0Kg3NqobbBxuyLvEAV5Mr3Gl02sm9b8RzUzWpU9VqsYtCF99r7'),
(3, 'bbb', 'bbb', 'bbb@mailinator.com', 2, 2018, 1, '2018-07-14 07:02:54', '2018-07-14 07:41:30', NULL, '$2y$10$9aR0xvmFjzP7Hp3yb5RlzexR4/FZ7zzmUQ2fwcYKnriQYYO.AFjSG', 'MiSTNppSQVMF6U4bIi27cTmAuM5II8XehDWJqGxQaYr1Xb3Wm63YST5mSmC3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
