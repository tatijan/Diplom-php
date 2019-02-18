-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 18 2019 г., 12:56
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `published`, `created_at`, `updated_at`) VALUES
(8, 'Авиабилеты', 1, '2019-02-15 14:30:44', '2019-02-15 14:30:44'),
(9, 'Железнодорожные билеты', 1, '2019-02-15 14:31:56', '2019-02-15 14:31:56'),
(10, 'Автобусные билеты', 1, '2019-02-15 14:32:43', '2019-02-15 14:32:43'),
(11, 'Билеты на паромы', 1, '2019-02-15 14:33:13', '2019-02-15 14:48:20'),
(12, 'Экскурсии', 0, '2019-02-15 14:33:32', '2019-02-15 14:49:18'),
(13, 'Гостиницы', 1, '2019-02-15 14:33:51', '2019-02-15 14:01:57'),
(14, 'Визы', 1, '2019-02-15 14:34:07', '2019-02-15 14:49:38');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2018_11_24_173713_create_categories_table', 1),
(23, '2018_12_26_144428_create_questions_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `published` tinyint(1) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `name`, `email`, `description`, `answer`, `published`, `category_id`, `created_at`, `updated_at`) VALUES
(21, 'Николай', '003@bk.ru', 'Когда нужно приезжать в аэропорт ?', 'За 2 часа до вылета', 1, 8, '2019-02-15 14:36:21', '2019-02-15 14:36:21'),
(22, 'Иван', 'b5b@mail.ru', 'Какие авиакомпании выполняют рейсы Казань-Москва ?', '3 авиакомпаии, 5 авиарейсов в день.', 2, 8, '2019-02-15 14:38:57', '2019-02-15 14:39:19'),
(23, 'Петр', 'kkd@rambler.ru', 'Какова норма провоза багажа в экономическом классе ?', NULL, 0, 8, '2019-02-15 14:41:18', '2019-02-15 14:41:18'),
(24, 'Сергей', '123654@yandex.ru', 'Какие поезда в южном направлении оборудованы кондиционерами ?', 'Все поезда курсирующие в направлении Москва-Адлер.', 1, 9, '2019-02-15 14:45:37', '2019-02-15 14:45:37'),
(25, 'Алексей', 'y-6@mail.ru', 'Какова продолжительность летних экскурсий по золотому Кольцу ?', 'В зависимости от дня недели от одного до трех дней ', 1, 12, '2019-02-15 15:48:35', '2019-02-15 14:48:35'),
(26, 'Жанна', 'pkp@gmail.com', 'Какова продолжительность автобусного маршрута №31 Москва-Ростов?', '18 часов', 1, 10, '2019-02-15 14:51:47', '2019-02-15 14:51:47'),
(27, 'Татьяна', '356@mail.ru', 'Какова стоимость французской визы ?', 'консульский сбор за оформление шенгенской визы составляет 35 евро', 1, 14, '2019-02-15 14:53:46', '2019-02-15 14:53:46'),
(28, 'Ирина', '456@yandex.ru', 'Где сделать визу в Израиль?', NULL, 0, 14, '2019-02-15 14:54:54', '2019-02-15 14:54:54'),
(29, 'Кристина', 'tpl@mail.ru', 'Сколько паромов в день ходит по маршруту Таллин-Хельсинки ?', 'с 6 до 12 часов утра 3 парома каждые 2 часа\r\с 12 до 13 1 паром\r\nс 14 до 17 3 парома\r\nследующий паром в 18-45\r\nсамый последний в 21-10', 1, 11, '2019-02-15 14:57:59', '2019-02-15 14:57:59'),
(30, 'Кристина', 'tpl@mail.ru', 'Сколько стоит билет на паром Усть-Луга-Балтийск ?', NULL, 2, 11, '2019-02-15 14:59:38', '2019-02-15 14:59:38');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@mail.ru', '$2y$10$9kggWEkGVO8dSjkp7xFHROOpgCURn3N4k9ulIdy9mYZerT20QMfuK', 'WsUWcR5GobmyfoyZ6Q5S54Wqgm3cVwnmvxH3xe0JDpJHCS1B6Jf7tWvErA53', '2019-02-07 14:27:31', '2019-02-07 14:27:31');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;