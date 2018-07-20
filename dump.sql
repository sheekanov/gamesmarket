-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 08 2018 г., 17:05
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gamemagaz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `description`, `deleted_at`) VALUES
(1, '2018-07-06 12:24:06', '2018-07-06 19:11:40', 'Action', 'Экшн игры', NULL),
(2, '2018-07-06 12:24:24', '2018-07-06 19:11:33', 'RPG', 'Ролевые игры', NULL),
(3, '2018-07-06 12:24:34', '2018-07-06 12:24:34', 'Квесты', 'Квесты', NULL),
(4, '2018-07-06 19:11:56', '2018-07-06 19:11:56', 'Онлайн-игры', 'Многопользовательские игры', NULL),
(5, '2018-07-06 19:12:05', '2018-07-07 16:44:11', 'Стратегии', 'Стратегии', NULL),
(8, '2018-07-07 19:33:36', '2018-07-07 19:33:36', 'Гонки', 'Гоночные соревнования', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2018-07-07 17:05:58', '2018-07-07 17:05:58', 'Main'),
(2, '2018-07-07 17:05:58', '2018-07-07 17:05:58', 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_items`
--

INSERT INTO `menu_items` (`id`, `created_at`, `updated_at`, `menu_id`, `title`, `route_name`) VALUES
(1, '2018-07-07 17:22:42', '2018-07-07 17:22:42', 2, 'Настройки', 'admin.settings'),
(2, '2018-07-07 17:22:42', '2018-07-07 17:22:42', 2, 'Категории', 'admin.categories'),
(3, '2018-07-07 17:22:42', '2018-07-07 17:22:42', 2, 'Продукты', 'admin.products'),
(4, '2018-07-07 17:22:42', '2018-07-07 17:22:42', 2, 'Заказы', 'admin.orders'),
(5, '2018-07-07 17:22:42', '2018-07-07 17:22:42', 2, 'Новости', 'admin.news'),
(6, '2018-07-07 17:22:42', '2018-07-07 17:22:42', 1, 'Главная', 'home'),
(7, '2018-07-07 17:22:42', '2018-07-07 17:22:42', 1, 'Мои заказы', 'myOrders'),
(8, '2018-07-07 17:22:42', '2018-07-07 17:22:42', 1, 'Новости', 'news'),
(9, '2018-07-07 17:22:42', '2018-07-07 17:22:42', 1, 'О компании', 'about');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(90, '2014_10_12_000000_create_users_table', 1),
(91, '2014_10_12_100000_create_password_resets_table', 1),
(92, '2018_07_02_182748_create_categories_table', 1),
(93, '2018_07_02_182930_create_products_table', 1),
(94, '2018_07_04_133441_create_orders_table', 1),
(95, '2018_07_04_184646_create_jobs_table', 1),
(96, '2018_07_04_202533_create_settings_table', 1),
(97, '2018_07_06_133325_add_userdata_to_orders', 1),
(98, '2018_07_06_144235_create_order_positions_table', 1),
(101, '2018_07_06_184027_create_news_table', 2),
(102, '2018_07_07_194707_create_menus_table', 3),
(103, '2018_07_07_194854_create_menu_items_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `created_at`, `updated_at`, `title`, `thumbnail`, `excerpt`, `text`) VALUES
(9, '2018-07-06 17:09:27', '2018-07-06 19:01:36', 'О новых играх в режиме VR', '/storage/uploads/news/news-id-9/thumbnail.jpg', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>'),
(10, '2018-07-06 17:09:54', '2018-07-06 19:01:43', 'О новой PS4 Pro', '/storage/uploads/news/news-id-10/thumbnail.jpg', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>'),
(11, '2018-07-06 17:10:38', '2018-07-06 17:54:35', 'Как живут обычные люди в Deus Ex: Mankind Divided.', '/storage/uploads/news/news-id-11/thumbnail.jpg', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eaque est harum illum ipsum nemo nihil numquam, perferendis placeat quasi qui repudiandae temporibus ullam? Amet asperiores doloribus ea eligendi quae.</p>'),
(12, '2018-07-07 20:58:14', '2018-07-07 21:02:31', 'Red Dead Redemptions 2 может скоро выйти на ПК', '/storage/uploads/news/news-id-12/thumbnail.jpg', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores commodi cupiditate debitis deleniti ea eveniet molestiae nostrum obcaecati odio praesentium reiciendis rem repellendus reprehenderit sed unde vitae. Aperiam, est.</p>', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores commodi cupiditate debitis deleniti ea eveniet molestiae nostrum obcaecati odio praesentium reiciendis rem repellendus reprehenderit sed unde vitae. Aperiam, est.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores commodi cupiditate debitis deleniti ea eveniet molestiae nostrum obcaecati odio praesentium reiciendis rem repellendus reprehenderit sed unde vitae. Aperiam, est.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores commodi cupiditate debitis deleniti ea eveniet molestiae nostrum obcaecati odio praesentium reiciendis rem repellendus reprehenderit sed unde vitae. Aperiam, est.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores commodi cupiditate debitis deleniti ea eveniet molestiae nostrum obcaecati odio praesentium reiciendis rem repellendus reprehenderit sed unde vitae. Aperiam, est.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores commodi cupiditate debitis deleniti ea eveniet molestiae nostrum obcaecati odio praesentium reiciendis rem repellendus reprehenderit sed unde vitae. Aperiam, est.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores commodi cupiditate debitis deleniti ea eveniet molestiae nostrum obcaecati odio praesentium reiciendis rem repellendus reprehenderit sed unde vitae. Aperiam, est.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores commodi cupiditate debitis deleniti ea eveniet molestiae nostrum obcaecati odio praesentium reiciendis rem repellendus reprehenderit sed unde vitae. Aperiam, est.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores commodi cupiditate debitis deleniti ea eveniet molestiae nostrum obcaecati odio praesentium reiciendis rem repellendus reprehenderit sed unde vitae. Aperiam, est.</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores commodi cupiditate debitis deleniti ea eveniet molestiae nostrum obcaecati odio praesentium reiciendis rem repellendus reprehenderit sed unde vitae. Aperiam, est.</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_positions`
--

CREATE TABLE `order_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `name`, `categorie_id`, `price`, `pic`, `description`, `deleted_at`) VALUES
(1, '2018-07-06 12:25:19', '2018-07-06 12:25:19', 'Batman - Telltale Game Series', 3, '300.00', '/storage/uploads/products/prod-id-1/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores commodi consequatur debitis deleniti deserunt distinctio eum fugit labore maxime numquam officiis qui saepe vel, veritatis voluptate? Fugiat, reiciendis!</p>', NULL),
(2, '2018-07-06 12:25:38', '2018-07-06 12:25:38', 'Deus Ex: Mankind Divided', 2, '600.00', '/storage/uploads/products/prod-id-2/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores commodi consequatur debitis deleniti deserunt distinctio eum fugit labore maxime numquam officiis qui saepe vel, veritatis voluptate? Fugiat, reiciendis!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores commodi consequatur debitis deleniti deserunt distinctio eum fugit labore maxime numquam officiis qui saepe vel, veritatis voluptate? Fugiat, reiciendis!</p>', NULL),
(3, '2018-07-06 12:25:51', '2018-07-06 12:25:51', 'Call Of Duty: Black Ops 2', 1, '100.00', '/storage/uploads/products/prod-id-3/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores commodi consequatur debitis deleniti deserunt distinctio eum fugit labore maxime numquam officiis qui saepe vel, veritatis voluptate? Fugiat, reiciendis!</p>', NULL),
(4, '2018-07-06 19:12:53', '2018-07-06 19:12:53', 'Dishonored 2', 1, '500.00', '/storage/uploads/products/prod-id-4/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>', NULL),
(5, '2018-07-06 19:13:10', '2018-07-06 19:13:10', 'Overwatch', 4, '200.00', '/storage/uploads/products/prod-id-5/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>', NULL),
(6, '2018-07-06 19:13:27', '2018-07-06 19:13:27', 'Rocket League', 1, '400.00', '/storage/uploads/products/prod-id-6/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>', NULL),
(7, '2018-07-06 19:13:43', '2018-07-06 19:52:10', 'This War of Mine', 3, '1000.00', '/storage/uploads/products/prod-id-7/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>', NULL),
(8, '2018-07-06 19:14:07', '2018-07-06 19:14:07', 'The Witcher 3: Wild Hunt', 2, '700.00', '/storage/uploads/products/prod-id-8/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>', NULL),
(9, '2018-07-06 19:14:22', '2018-07-06 19:14:22', 'World of Warcraft: Legion', 4, '500.00', '/storage/uploads/products/prod-id-9/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>', NULL),
(11, '2018-07-07 12:25:07', '2018-07-07 12:25:07', 'Gothic 2', 2, '9999.00', '/storage/uploads/products/prod-id-11/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>', NULL),
(12, '2018-07-07 12:26:49', '2018-07-07 12:26:49', 'The Elder Scrolls 3: Morrowind', 2, '800.00', '/storage/uploads/products/prod-id-12/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>', NULL),
(13, '2018-07-07 12:28:08', '2018-07-07 12:28:08', 'Risen 3: Titan Lords', 2, '400.00', '/storage/uploads/products/prod-id-13/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>', NULL),
(14, '2018-07-07 12:29:00', '2018-07-07 12:29:00', 'The Elder Scrolls 5: Skyrim', 2, '600.00', '/storage/uploads/products/prod-id-14/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>', NULL),
(15, '2018-07-07 12:30:09', '2018-07-07 12:30:09', 'Vampires The Masquerade: Bloodlines', 2, '900.00', '/storage/uploads/products/prod-id-15/productPic.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, deserunt distinctio dolor excepturi incidunt laborum nulla quia quo sit sunt unde voluptatibus. Accusantium beatae dolores error numquam tempora.</p>', NULL),
(16, '2018-07-07 20:23:44', '2018-07-07 20:23:45', 'GTA V', 8, '600.00', '/storage/uploads/products/prod-id-16/productPic.jpg', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, adipisci asperiores debitis dignissimos enim error esse eveniet fugiat iusto maxime, nemo nesciunt placeat qui, quis sunt tempore temporibus veritatis voluptate</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, adipisci asperiores debitis dignissimos enim error esse eveniet fugiat iusto maxime, nemo nesciunt placeat qui, quis sunt tempore temporibus veritatis voluptate</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, adipisci asperiores debitis dignissimos enim error esse eveniet fugiat iusto maxime, nemo nesciunt placeat qui, quis sunt tempore temporibus veritatis voluptate</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, adipisci asperiores debitis dignissimos enim error esse eveniet fugiat iusto maxime, nemo nesciunt placeat qui, quis sunt tempore temporibus veritatis voluptate</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, adipisci asperiores debitis dignissimos enim error esse eveniet fugiat iusto maxime, nemo nesciunt placeat qui, quis sunt tempore temporibus veritatis voluptate</p>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, adipisci asperiores debitis dignissimos enim error esse eveniet fugiat iusto maxime, nemo nesciunt placeat qui, quis sunt tempore temporibus veritatis voluptate</p>', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `name`, `value`) VALUES
(1, '2018-07-06 12:23:51', '2018-07-08 12:54:30', 'order_email', 'sheekanov@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sheekanov', 'sheekanov@gmail.com', '$2y$10$XwVPOrpot/Ynyquci5S.BORZ9tRFTrmg8qt.nt2ftsbh5XPnsGFGS', 1, 'sJGiblGHwH21QOI9KWr093pdc1poQ0D1KotH2K2mzRcbNBOma9gC2sPB5PzY', '2018-07-06 12:23:20', '2018-07-06 12:23:20');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Индексы таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `order_positions`
--
ALTER TABLE `order_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_positions_order_id_foreign` (`order_id`),
  ADD KEY `order_positions_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categorie_id_foreign` (`categorie_id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_unique` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `order_positions`
--
ALTER TABLE `order_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_positions`
--
ALTER TABLE `order_positions`
  ADD CONSTRAINT `order_positions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_positions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
