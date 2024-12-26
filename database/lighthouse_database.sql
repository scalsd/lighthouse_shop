-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 26 2024 г., 17:08
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
-- Структура таблицы `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `authors_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Алигьери Данте', 'aligeri-dante', 'active', '2024-12-20 11:38:47', '2024-12-20 11:38:47'),
(2, 'Остен Джейн', 'osten-dzein', 'active', '2024-12-20 11:38:57', '2024-12-20 11:38:57'),
(3, 'Байрон Джордж', 'bairon-dzordz', 'active', '2024-12-20 19:51:11', '2024-12-20 19:51:11'),
(4, 'Есенин Сергей', 'esenin-sergei', 'active', '2024-12-20 20:02:03', '2024-12-20 20:02:03'),
(5, 'Китс Джон', 'kits-dzon', 'active', '2024-12-20 21:08:24', '2024-12-20 21:08:24'),
(6, 'Пушкин Александр', 'puskin-aleksandr', 'active', '2024-12-20 21:11:44', '2024-12-20 21:11:44'),
(7, 'Энтони Бёрджесс', 'entoni-berdzess', 'active', '2024-12-20 21:15:29', '2024-12-20 21:15:29'),
(8, 'Луиза Мэй Олкотт', 'luiza-mei-olkott', 'active', '2024-12-20 21:18:38', '2024-12-20 21:18:38'),
(9, 'Булгаков Михаил', 'bulgakov-mixail', 'active', '2024-12-20 21:22:00', '2024-12-20 21:22:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `description`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Скидки по промокоду', 'skidki-po-promokodu', NULL, '/storage/photos/1/Баннеры/banner1.png', 'active', '2024-12-20 04:10:39', '2024-12-20 21:29:33'),
(2, 'Скидки на книги о любви', 'skidki-na-knigi-o-liubvi', NULL, '/storage/photos/1/Баннеры/banner1.png', 'active', '2024-12-20 07:56:23', '2024-12-20 21:29:20');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int NOT NULL,
  `series_id` int NOT NULL,
  `category_id` int NOT NULL,
  `publishing_house_id` int NOT NULL,
  `age_limit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` year DEFAULT NULL,
  `amount_pages` int DEFAULT NULL,
  `binding_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `stock` int NOT NULL DEFAULT '0',
  `isbn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `book_cover` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `books_slug_unique` (`slug`),
  KEY `books_author_id_foreign` (`author_id`),
  KEY `books_series_id_foreign` (`series_id`),
  KEY `books_category_id_foreign` (`category_id`),
  KEY `books_publishing_house_id_foreign` (`publishing_house_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `slug`, `author_id`, `series_id`, `category_id`, `publishing_house_id`, `age_limit`, `year`, `amount_pages`, `binding_type`, `format`, `weight`, `price`, `stock`, `isbn`, `description`, `book_cover`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Стихотворения', 'stixotvoreniia', 4, 4, 9, 2, NULL, '2024', 352, 'Твердый переплет', '107x147', 180, 424.00, 30, '978-5-04-101177-2', '<p><span style=\"color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">Сергей Есенин - русский поэт, тонкий лирик, мастер психологического пейзажа, представитель новокрестьянской поэзии, а позднее имажинизма, стал по-настоящему народным поэтом. \"...земля русская не производила ничего более коренного, естественно уместного и родового, чем Сергей Есенин...\" - писал Борис Пастернак. В книге представлены лучшие, ставшие почти народными стихи поэта.</span></p>', '/storage/photos/1/Обложки/серг есенин.jpg', 'active', '2024-12-20 20:04:59', '2024-12-20 23:19:08'),
(4, 'Паломничество Чайльд-Гарольда', 'palomnicestvo-caild-garolda', 3, 3, 9, 1, NULL, '2022', 512, NULL, '117x180', 330, 280.00, 30, '978-5-17-139380-9', '<p style=\"outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">В этот сборник вошли поэмы и стихотворения, изменившие жизнь целого поколения интеллектуалов Европы и США. Поэмы и стихи, без которых были бы невозможны ни Онегин Пушкина, ни Печорин Лермонтова, ни граф Монте-Кристо Дюма, ни многие из персонажей Гюго.</p><p style=\"outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">Произведения, ставшие основой поэтического романтизма, выводящего на свет совершенно нового героя — страстно и яростно чувствующего человека, демонстративно не признающего законов общества и религии и дерзко их нарушающего. Героя загадочного и харизматичного, рефлексирующего и в то же время циничного, упивающегося своей отверженностью и одиночеством, одновременно свободно принимающего свою темную сторону и отчаянно сражающегося со своими внутренними демонами.</p>', '/storage/photos/1/Обложки/байрон.jpg', 'active', '2024-12-20 20:00:47', '2024-12-20 21:41:29'),
(6, 'Божественная комедия', 'bozestvennaia-komediia', 1, 3, 9, 1, NULL, '2024', 800, NULL, '116х180', 370, 271.00, 30, '978-5-17-100180-3', '<p style=\"outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">«Когда-то я в годину зрелых лет</p><p style=\"outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">В дремучий лес зашел и заблудился…»</p><p style=\"outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">– так начинается «Божественная комедия», бессмертная поэтическая трилогия, в которой Данте дерзко переосмыслил средневековую традицию «хождений» по загробному миру и религиозных «видений», и создал поистине уникальное произведение, в котором мистика сочетается с философией, а притча – с весьма ядовитым политическим памфлетом.</p><p style=\"outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">Прошли века. Политическая злободневность «Божественной комедии» давно пропала, но остались и бессмертная красота языка Данте, и мощь его литературного таланта, и сила философской мысли, предвосхитившей духовные и нравственные искания гуманистических гениев Возрождения.</p>', '/storage/photos/1/Обложки/бож ком.jpg', 'active', '2024-12-20 20:08:49', '2024-12-20 21:41:41'),
(7, 'Гиперион. Сонеты', 'giperion-sonety', 5, 6, 9, 3, NULL, '2018', 240, NULL, '115x180', 120, 320.00, 30, '978-5-389-14974-8', '<p><span style=\"color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">Джон Китс - особая фигура в истории английского романтизма. Творческая деятельность поэта продолжалась немногим более пяти лет. Туберкулез оборвал жизнь Китса на двадцать шестом году, когда он только вступал на свой собственный путь в поэзии. Однако ныне имя его по праву ставится вровень с именами самых великих поэтов Англии - именами Шекспира, Мильтона, Вордсворта. В настоящее издание вошли все значительные произведения Джона Китса (оды, сонеты, песни, поэма «Гиперион») в лучших переводах Г. Кружкова и С. Сухарева.</span></p>', '/storage/photos/1/Обложки/китс.jpg', 'active', '2024-12-20 21:10:45', '2024-12-20 21:42:22'),
(8, 'Евгений Онегин', 'evgenii-onegin', 6, 6, 9, 3, NULL, '2024', 352, NULL, '116х178', 170, 231.00, 20, '978-5-352-00443-2', '<p><span style=\"color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">Роман в стихах «Евгений Онегин» — самое известное и самое значительное произведение А. С. Пушкина, вершина русской поэзии и предмет многочисленных исследований. Пушкин начал писать роман в мае 1823 года, а закончил только осенью 1831 года, когда было написано «Письмо Онегина к Татьяне». Осенью 1823 года он сообщал друзьям: «...Я теперь пишу не роман, а роман в стихах — дьявольская разница...» Занимательный, легкий, основанный на любовной истории, переданной в манере доверительной беседы автора с читателем, и вместе с тем полный неразрешимых парадоксов и загадок. Противоречивость, многомерность, составляющие самую суть пушкинского романа, привлекают новые поколения читателей, позволяют открывать в нем новые смыслы.</span></p>', '/storage/photos/1/Обложки/евген онегин.jpg', 'active', '2024-12-20 21:13:24', '2024-12-20 21:42:38'),
(9, 'Заводной апельсин', 'zavodnoi-apelsin', 7, 7, 8, 1, NULL, '2023', 224, 'Твердый переплет', '130х205', 240, 467.00, 10, '978-5-17-079974-9', '<p><span style=\"color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">«Заводной апельсин» – литературный парадокс ХХ столетия. Продолжая футуристические традиции в литературе, экспериментируя с языком, на котором говорит рубежное поколение malltshipalltshikov и kisok «надсатых», Энтони Бёрджесс создает роман, признанный классикой современной литературы. Умный, жестокий, харизматичный антигерой Алекс, лидер уличной банды, проповедуя насилие как высокое искусство жизни, как род наслаждения, попадает в железные тиски новейшей государственной программы по перевоспитанию преступников и сам становится жертвой насилия. Можно ли спасти мир от зла, лишая человека воли совершать поступки и превращая его в «заводной апельсин»? Этот вопрос сегодня актуален так же, как и вчера, и вопрос этот автор задает читателю.</span></p>', '/storage/photos/1/Обложки/берджесс.jpg', 'active', '2024-12-20 21:17:22', '2024-12-20 21:17:22'),
(10, 'Маленькие женщины', 'malenkie-zenshhiny', 8, 8, 8, 2, NULL, '2024', 352, 'Твердый переплет', '135х205', 350, 467.00, 13, '978-5-04-163620-3', '<p style=\"outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">Искренний и трогательный роман о детстве и юности четырех сестер.</p><p style=\"outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">В Америке началась Гражданская война, глава семейства Марч ушел на фронт, а все заботы по дому легли на плечи его жены и дочерей. Старшая из сестер, шестнадцатилетняя Маргарет — женственная и романтичная красавица с прекрасными манерами. Джо — настоящий сорванец в юбке, ей пятнадцать, и она лазает по деревьям, бегает наперегонки с друзьями, катается на коньках, а может даже и подраться. Тринадцатилетняя Бесс — застенчивая и робкая девочка с добрейшим сердцем, сущий ангелочек и любимица всей семьи. Самой младшей двенадцать — положительные и отрицательные качества тесно переплетены в Эми и находятся в очень хрупком равновесии. Сестры такие разные, такие неповторимые. Но они сообща справляются с трудностями, испытывают горести и радости, мечтают о будущем и проходят непростой путь взросления.</p><p style=\"outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 31, 31); font-family: AlergiaNormal, &quot;Trebuchet MS Fallback&quot;, sans-serif;\">«Маленькие женщины» — одно из самых известных произведений классической американской литературы для юношества. Его публикация принесла Луизе Мэй Олкотт небывалую славу, чрезвычайный коммерческий успех и любовь каждого нового поколения читателей.</p>', '/storage/photos/1/Обложки/олкотт.jpg', 'active', '2024-12-20 21:20:45', '2024-12-20 21:20:45'),
(11, 'Мастер и Маргарита', 'master-i-margarita', 9, 8, 10, 2, NULL, '2023', NULL, NULL, NULL, NULL, 743.00, 14, '978-5-699-45537-9', NULL, '/storage/photos/1/Обложки/булгаков.jpg', 'active', '2024-12-20 21:23:01', '2024-12-20 21:41:55');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT '1',
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `photo`, `is_parent`, `description`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Классическая поэзия', 'klassiceskaia-poeziia', '/storage/photos/1/Категории/cl-poetry.png', 1, '<p>Поэзия, прошедшая проверку временем</p>', 'active', '2024-12-20 14:37:42', '2024-12-20 14:37:42'),
(5, 'Социальная фантастика', 'socialnaia-fantastika', '/storage/photos/1/Категории/soc-fant.png', 1, '<p>Научно-фантастическая литература об отношениях между людьми</p>', 'active', '2024-12-20 15:48:19', '2024-12-20 15:48:19'),
(6, 'Историческая проза', 'istoriceskaia-proza', '/storage/photos/1/Категории/istor-pr.png', 1, '<p>Проза об исторических событиях и лицах</p>', 'active', '2024-12-20 15:49:38', '2024-12-20 15:49:38'),
(10, 'Классическая русская литература', 'klassiceskaia-russkaia-literatura', '/storage/photos/1/Категории/cl-rus-li.png', 1, '<p>Эталонные произведения на русском языке</p>', 'active', '2024-12-20 19:45:19', '2024-12-20 19:45:19'),
(8, 'Классическая зарубежная литература', 'klassiceskaia-zarubeznaia-literatura', '/storage/photos/1/Категории/cl-zar-lit.png', 1, '<p>Произведения, получившие признание у читателей по всему миру</p>', 'active', '2024-12-20 19:47:08', '2024-12-20 19:47:08');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, '2024_12_18_142127_create_publishing_houses_table', 1),
(8, '2024_12_19_081911_create_authors_table', 1),
(9, '2024_12_19_085820_create_series_table', 1),
(10, '2024_12_19_093754_create_books_table', 1),
(11, '2024_12_20_055341_create_posts_table', 1);

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
-- Структура таблицы `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `publishing_houses`
--

INSERT INTO `publishing_houses` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'АСТ', 'ast', 'active', '2024-12-20 11:39:11', '2024-12-20 11:39:11'),
(2, 'ЭКСМО', 'eksmo', 'active', '2024-12-20 11:39:20', '2024-12-20 11:39:20'),
(3, 'Азбука', 'azbuka', 'active', '2024-12-20 20:09:39', '2024-12-20 20:09:39');

-- --------------------------------------------------------

--
-- Структура таблицы `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `series_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `series`
--

INSERT INTO `series` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Собрание больших поэтов', 'sobranie-bolsix-poetov', 'active', '2024-12-20 20:02:42', '2024-12-20 20:02:42'),
(3, 'Эксклюзивная классика', 'ekskliuzivnaia-klassika', 'active', '2024-12-20 19:51:35', '2024-12-20 19:51:35'),
(6, 'Азбука-Классика', 'azbuka-klassika', 'active', '2024-12-20 20:09:59', '2024-12-20 20:09:59'),
(7, 'АСТ.Зарубежная классика', 'astzarubeznaia-klassika', 'active', '2024-12-20 21:15:13', '2024-12-20 21:15:13'),
(8, 'Яркие страницы', 'iarkie-stranicy', 'active', '2024-12-20 21:18:57', '2024-12-20 21:18:57');

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Александра', 'admin', 'admin@gmail.com', NULL, '$2y$10$C2d8lFThQK3MENjWrPAofuejqPwao53ybm0xNK.oIgt6PJLOkQAcW', 'admin', 'active', NULL, NULL, NULL),
(2, 'Aleksandra', 'user', 'user@gmail.com', NULL, '$2y$10$FRr6g6xMhAioqEMxNp91De49E.xjC5UOmx1rWCrLT4hmBqHXqcdvS', 'user', 'active', NULL, NULL, NULL),
(3, 'Jeffrey Gislason I', NULL, 'assunta28@example.org', '2024-12-20 04:08:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'lRioXPqk2F', '2024-12-20 04:08:05', '2024-12-20 04:08:05'),
(4, 'Elinore Emmerich', NULL, 'koepp.don@example.org', '2024-12-20 04:08:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'EQvanIzFic', '2024-12-20 04:08:05', '2024-12-20 04:08:05'),
(5, 'Petra Skiles III', NULL, 'schuster.eulah@example.com', '2024-12-20 04:08:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', 'fPukRXsIwA', '2024-12-20 04:08:05', '2024-12-20 04:08:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
