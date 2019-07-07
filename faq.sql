
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных diplomadb
CREATE DATABASE IF NOT EXISTS `diplomadb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `diplomadb`;

-- Дамп структуры для таблица diplomadb.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название Категории',
  `published` tinyint(1) DEFAULT NULL COMMENT 'Опубликована',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Категория создана',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Категория обновлена',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Категории вопросов';

-- Дамп данных таблицы diplomadb.categories: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`, `published`, `created_at`, `updated_at`) VALUES
	(8, 'Авиабилеты', 1, '2019-02-15 17:30:44', '2019-02-15 17:30:44'),
	(9, 'Железнодорожные билеты', 1, '2019-02-15 17:31:56', '2019-02-15 17:31:56'),
	(10, 'Автобусные билеты', 1, '2019-02-15 17:32:43', '2019-02-15 17:32:43'),
	(11, 'Билеты на паромы', 1, '2019-02-15 17:33:13', '2019-02-15 17:48:20'),
	(12, 'Экскурсии', 0, '2019-02-15 17:33:32', '2019-02-15 17:49:18'),
	(13, 'Гостиницы', 1, '2019-02-15 17:33:51', '2019-02-15 17:01:57'),
	(14, 'Визы', 1, '2019-02-15 17:34:07', '2019-02-15 17:49:38');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица diplomadb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы diplomadb.migrations: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(20, '2014_10_12_000000_create_users_table', 1),
	(21, '2014_10_12_100000_create_password_resets_table', 1),
	(22, '2018_11_24_173713_create_categories_table', 1),
	(23, '2018_12_26_144428_create_questions_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп структуры для таблица diplomadb.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы diplomadb.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп структуры для таблица diplomadb.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя отправителя',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'E-mail отправителя',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Вопрос',
  `answer` text COLLATE utf8mb4_unicode_ci COMMENT 'Ответ',
  `published` tinyint(1) NOT NULL COMMENT 'Опубликован (1 - да, 2 - нет (скрыт))',
  `category_id` int(10) unsigned NOT NULL COMMENT 'Ссылка на Категорию вопроса',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Вопрос задан',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Вопрос обновлен',
  `blocked` tinyint(1) DEFAULT '0' COMMENT 'Вопрос заблокирован',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Вопросы';

-- Дамп данных таблицы diplomadb.questions: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `name`, `email`, `description`, `answer`, `published`, `category_id`, `created_at`, `updated_at`, `blocked`) VALUES
	(21, 'Николай', '003@bk.ru', 'Когда нужно приезжать в аэропорт ?', 'За 2 часа до вылета', 1, 8, '2019-02-15 17:36:21', '2019-02-15 17:36:21', 0),
	(22, 'Иван', 'b5b@mail.ru', 'Какие авиакомпании выполняют рейсы Казань-Москва ?', '3 авиакомпаии, 5 авиарейсов в день.', 2, 8, '2019-02-15 17:38:57', '2019-02-15 17:39:19', 0),
	(23, 'Петр', 'kkd@rambler.ru', 'Какова норма провоза багажа в экономическом классе ?', NULL, 0, 8, '2019-02-15 17:41:18', '2019-02-15 17:41:18', 0),
	(24, 'Сергей', '123654@yandex.ru', 'Какие поезда в южном направлении оборудованы кондиционерами ?', 'Все поезда курсирующие в направлении Москва-Адлер.', 1, 9, '2019-02-15 17:45:37', '2019-02-15 17:45:37', 0),
	(25, 'Алексей', 'y-6@mail.ru', 'Какова продолжительность летних экскурсий по золотому Кольцу ?', 'В зависимости от дня недели от одного до трех дней ', 1, 12, '2019-02-15 18:48:35', '2019-02-15 17:48:35', 0),
	(26, 'Жанна', 'pkp@gmail.com', 'Какова продолжительность автобусного маршрута №31 Москва-Ростов?', '18 часов', 1, 10, '2019-02-15 17:51:47', '2019-02-15 17:51:47', 0),
	(27, 'Татьяна', '356@mail.ru', 'Какова стоимость французской визы ?', 'консульский сбор за оформление шенгенской визы составляет 35 евро', 1, 14, '2019-02-15 17:53:46', '2019-02-15 17:53:46', 0),
	(28, 'Ирина', '456@yandex.ru', 'Где сделать визу в Израиль?', NULL, 0, 14, '2019-02-15 17:54:54', '2019-02-15 17:54:54', 0),
	(29, 'Кристина', 'tpl@mail.ru', 'Сколько паромов в день ходит по маршруту Таллин-Хельсинки ?', 'с 6 до 12 часов утра 3 парома каждые 2 часа\rс 12 до 13 1 паром\r\nс 14 до 17 3 парома\r\nследующий паром в 18-45\r\nсамый последний в 21-10', 1, 11, '2019-02-15 17:57:59', '2019-02-15 17:57:59', 0),
	(30, 'Кристина', 'tpl@mail.ru', 'Сколько стоит билет на паром Усть-Луга-Балтийск ?', NULL, 2, 11, '2019-02-15 17:59:38', '2019-02-15 17:59:38', 0);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Дамп структуры для таблица diplomadb.question_stop_words
CREATE TABLE IF NOT EXISTS `question_stop_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `stop_word_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `question_stop_words_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Связи заблокированных вопросов и стоп-слов';

-- Дамп данных таблицы diplomadb.question_stop_words: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `question_stop_words` DISABLE KEYS */;
/*!40000 ALTER TABLE `question_stop_words` ENABLE KEYS */;

-- Дамп структуры для таблица diplomadb.stop_words
CREATE TABLE IF NOT EXISTS `stop_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'Стоп-слово',
  PRIMARY KEY (`id`),
  UNIQUE KEY `stop_words_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COMMENT='Стоп-слова';

-- Дамп данных таблицы diplomadb.stop_words: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `stop_words` DISABLE KEYS */;
/*!40000 ALTER TABLE `stop_words` ENABLE KEYS */;

-- Дамп структуры для таблица diplomadb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы diplomadb.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin', 'admin@mail.ru', '$2y$10$9kggWEkGVO8dSjkp7xFHROOpgCURn3N4k9ulIdy9mYZerT20QMfuK', 'WsUWcR5GobmyfoyZ6Q5S54Wqgm3cVwnmvxH3xe0JDpJHCS1B6Jf7tWvErA53', '2019-02-07 17:27:31', '2019-02-07 17:27:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
