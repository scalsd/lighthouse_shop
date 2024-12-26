-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2024 г., 19:31
-- Версия сервера: 9.1.0
-- Версия PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lighthouse_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `banners_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `description`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Скидки по промокоду', 'skidki-po-promokodu', NULL, '/storage/photos/1/Баннеры/banner1.JPG', 'active', '2024-12-18 07:30:39', '2024-12-18 15:11:55'),
(2, 'Скидки на книги о любви', 'skidki-na-knigi-o-liubvi', NULL, '/storage/photos/1/Баннеры/banner2.JPG', 'active', '2024-12-18 07:31:06', '2024-12-18 15:11:44');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Классическая поэзия', 'klassicheskaia-poesia', 'Поэзия, прошедшая проверку временем.', 'active', NULL, NULL),
(2, 'Классическая зарубежная литература', 'klassicheskaia-zarubezhnaia-literatura', 'Лучшие, образцовые произведения, получившие мировое признание читателя.', 'active', NULL, NULL),
(3, 'Историческая проза', 'istoricheskaia-proza', 'Произведения об исторических событиях и личностях.', 'active', NULL, NULL),
(4, 'Социальная фантастика', 'socialnaya-fantastika', 'Научно-фантастическая литература, в которой главную роль играет описание отношений между людьми в обществе.', 'active', NULL, NULL),
(5, 'Классическая русская литература', 'klassicheskaia-russkaya-literatura', 'Произведения, созданные на русском языке и считающиеся эталонными для национальной литературы.', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
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
-- Структура таблицы `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_09_182348_create_banners_table', 1),
(6, '2024_12_17_172412_create_categories_table', 1),
(7, '2024_12_18_142127_create_publishing_houses_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
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
-- Структура таблицы `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `publishing_houses`
--

DROP TABLE IF EXISTS `publishing_houses`;
CREATE TABLE IF NOT EXISTS `publishing_houses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `publishing_houses_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `publishing_houses`
--

INSERT INTO `publishing_houses` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'АСТ', 'ast', 'active', NULL, NULL),
(2, 'ЭКСМО', 'eksmo', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aleksandra', 'admin', 'admin@gmail.com', NULL, '$2y$10$uOfFYRhybAJsVIP2lI1JTe/k3E114GRsfyXjBgWOiyxFSP9PZODY6', 'admin', 'active', NULL, NULL, NULL),
(2, 'Aleksandra', 'user', 'user@gmail.com', NULL, '$2y$10$p49NHhSxCw/vtu4bbJp/TO.9prSir8XrbVd72imsUo40U5zZM3tSu', 'user', 'active', NULL, NULL, NULL),
(3, 'Brendon Wiegand', NULL, 'cortez67@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'U4mvuWmrAI', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(4, 'Mr. Rahul Kuhlman', NULL, 'hollis37@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'GM5OJNb85d', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(5, 'Irma McDermott', NULL, 'johnson.marjorie@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'T6uqlXISl0', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(6, 'Dr. Alfonzo Halvorson III', NULL, 'hortense75@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'ogBrBeF0y3', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(7, 'Aniyah Hoppe V', NULL, 'vmante@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'Ih57QKxFjF', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(8, 'Elvis Wuckert', NULL, 'predovic.anne@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'CxBlQp2J9i', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(9, 'Tillman Baumbach II', NULL, 'flavio78@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'LzzhUxyOc9', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(10, 'Gonzalo Stroman IV', NULL, 'matilda.feest@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', '5zFX5hVQ9F', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(11, 'Dovie Satterfield', NULL, 'alysha18@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'z42IaOZNlA', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(12, 'Lina Rice', NULL, 'dorian30@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'RXFfpQ5yrp', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(13, 'Jessika Feil', NULL, 'cwhite@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'DL4O2OtFHN', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(14, 'Isadore Hand', NULL, 'wisozk.selmer@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', '3xZgBycQbq', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(15, 'Tyrel Crooks', NULL, 'xkilback@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'UhvGe06kiL', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(16, 'Prof. Nolan Connelly Sr.', NULL, 'llubowitz@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'AWZGUuzw0h', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(17, 'Prof. Aileen Langworth IV', NULL, 'nola48@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'm5iJPLGCTs', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(18, 'Kara Stamm', NULL, 'zdaniel@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'fce04iKD3k', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(19, 'Dr. Candida Sanford III', NULL, 'dylan.stokes@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'kJ65pTvIdW', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(20, 'Rosemarie Schmeler', NULL, 'leuschke.trudie@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'bdnqK1S0eN', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(21, 'Dr. Lavern McGlynn Jr.', NULL, 'boyer.consuelo@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', '12I3ue0R2k', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(22, 'Rylee Glover', NULL, 'shania65@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', '3VHR2sxFNn', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(23, 'Brionna Wilderman', NULL, 'conn.jacynthe@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', '5C0jSPQgG3', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(24, 'Eduardo Jakubowski', NULL, 'kieran94@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'pV3oTIVoml', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(25, 'Lorena Kovacek Jr.', NULL, 'adaniel@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'XXGRupM446', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(26, 'Lempi Kirlin', NULL, 'larissa01@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'ndzGrPZGDp', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(27, 'Eduardo Orn', NULL, 'afarrell@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'AK6cckaLHM', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(28, 'Ms. Aaliyah Abbott', NULL, 'friesen.jarrell@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'gzBNl2vUlE', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(29, 'Dejon Klocko', NULL, 'qdeckow@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'xERng4NzVI', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(30, 'Abelardo Smitham', NULL, 'fabian66@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'dhPZFcK48n', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(31, 'Garrett Buckridge', NULL, 'sammie.windler@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'mzE9r78XzK', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(32, 'Nathanael Schulist PhD', NULL, 'sbraun@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'xuBhmjo9Gl', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(33, 'Vilma Dietrich', NULL, 'ecummings@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'lx4LIrMz8f', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(34, 'Peyton Lynch', NULL, 'raynor.rowan@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'rCRoi71MwQ', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(35, 'Dr. Marge Glover', NULL, 'breanna.runte@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'RRhZCjZ2pG', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(36, 'Dr. Waino Labadie', NULL, 'kkulas@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'UbNbJx23Ph', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(37, 'Walker Bradtke', NULL, 'waelchi.jadyn@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'eC822TyQAn', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(38, 'Lawson Bayer', NULL, 'camden63@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'YUUpQcBNFY', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(39, 'Alexandria McLaughlin', NULL, 'kuvalis.gayle@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', '8J1VuW1mo5', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(40, 'Raphael Johns V', NULL, 'jason07@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', '3cqTnKe5N6', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(41, 'Georgianna Schulist', NULL, 'pagac.loma@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'qasMYkHa5T', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(42, 'Dr. Domenico Blanda II', NULL, 'jacobs.arnaldo@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'ETmiyStuE5', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(43, 'Beverly Stroman', NULL, 'kattie.balistreri@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'mGe7K5eKAh', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(44, 'Ida Metz Jr.', NULL, 'oernser@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'B3TlAm71fs', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(45, 'Margarita Sanford MD', NULL, 'hmorar@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', '1bieVaREm9', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(46, 'Lionel Kihn', NULL, 'shyann00@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'Ukl4dFK0tN', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(47, 'Prof. Yvette Robel III', NULL, 'rickey04@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'UUGtxoUYD4', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(48, 'Drew Volkman', NULL, 'walsh.thad@example.org', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'UhA0VQZ9ob', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(49, 'Ara Pfeffer', NULL, 'kris.kailey@example.com', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'jrpqmv5Y0U', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(50, 'Monica Corwin', NULL, 'modesto.homenick@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'Qil9judy8M', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(51, 'Elmer Reilly', NULL, 'ejohnson@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'inactive', 'jSyRpzx8Sw', '2024-12-17 14:26:47', '2024-12-17 14:26:47'),
(52, 'Prof. Jeff Collier', NULL, 'audreanne.gorczany@example.net', '2024-12-17 14:26:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'rPxtbq5IjC', '2024-12-17 14:26:47', '2024-12-17 14:26:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
