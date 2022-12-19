-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Дек 13 2022 г., 12:09
-- Версия сервера: 10.6.11-MariaDB-log
-- Версия PHP: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `microsoft_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'oleg', 'oleg'),
(2, 'admin', 'SuperSuperPolicy');

-- --------------------------------------------------------

--
-- Структура таблицы `xboxes`
--

CREATE TABLE `xboxes` (
  `id` int(11) NOT NULL,
  `type_FK` int(11) NOT NULL DEFAULT 1,
  `title` varchar(256) NOT NULL DEFAULT 'NO_TITLE',
  `description` varchar(1024) NOT NULL DEFAULT 'NO_DESCRIPTION',
  `image` varchar(512) NOT NULL DEFAULT '/images/no_image.jpg',
  `price_ru` mediumint(9) NOT NULL DEFAULT 1,
  `price_us` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `xboxes`
--

INSERT INTO `xboxes` (`id`, `type_FK`, `title`, `description`, `image`, `price_ru`, `price_us`) VALUES
(1, 2, 'Xbox Series S', 'Бюджетный вариант консоли 9 поколения.\r\nПозиционируется как платформа для игры в новинки в FullHD/60FPS или QuadHD/30FPS.\r\nНа текущий момент является отличным вариантом для тех, кто редко играет и не гонится за графикой, любителей спортсимов и инди игр.', '/images/SeS.webp', 27000, 299),
(2, 2, 'Xbox Series X', 'Полноценная игровая консоль 9 поколения, самая мощная на рынке на данный момент.\r\nПозиционируется как платформа для игры в новинки в QuadHD/60FPS или 4K/30FPS.\r\nЛучший вариант для тех, кому нужен консольный опыт игры, но не важны эксклюзивные игры Sony.', '/images/SeX.webp', 52000, 499),
(3, 1, 'Xbox One', 'Первая консоль 8 поколения. \r\nОказалось слабее конкурента в лице PlayStation 4. \r\nИмела ряд провалов в плане маркетинга и чуть не убила веру Microsoft в Xbox.', '/images/One.webp', 17000, 189),
(4, 1, 'Xbox One S', 'Бюджетная консоль 8 поколения.\r\nПеревыпуск оригинального Xbox One в более компактном корпусе и без кинекта.', '/images/OneS.webp', 16000, 200),
(5, 1, 'Xbox One X', 'Самая мощная консоль 8 поколения.\r\nБыла создана из-за растущей популярности 4К контента.\r\nИмеет поддержку HDR и VR шлемов.', '/images/OneX.webp', 26000, 299);

-- --------------------------------------------------------

--
-- Структура таблицы `xbox_types`
--

CREATE TABLE `xbox_types` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `image` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `xbox_types`
--

INSERT INTO `xbox_types` (`id`, `title`, `image`) VALUES
(1, 'One', '/images/Type_One.png'),
(2, 'Series', '/images/Type_Series.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xboxes`
--
ALTER TABLE `xboxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`type_FK`);

--
-- Индексы таблицы `xbox_types`
--
ALTER TABLE `xbox_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `xboxes`
--
ALTER TABLE `xboxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `xbox_types`
--
ALTER TABLE `xbox_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `xboxes`
--
ALTER TABLE `xboxes`
  ADD CONSTRAINT `test` FOREIGN KEY (`type_FK`) REFERENCES `xbox_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
