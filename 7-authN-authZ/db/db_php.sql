-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Апр 15 2022 г., 13:11
-- Версия сервера: 5.7.34
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_php`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `good_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `title`, `name`, `info`, `price`) VALUES
(1, 'product-1', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52),
(2, 'product-2', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 45),
(3, 'product-3', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 30),
(4, 'product-4', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 50),
(5, 'product-5', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 78),
(6, 'product-6', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 87),
(7, 'product-7', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 40),
(8, 'product-8', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 55),
(9, 'product-9', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 43),
(10, 'product-10', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 59),
(11, 'product-11', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 49),
(12, 'product-12', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 64);

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `author`, `feedback`) VALUES
(1, 'Admin', 'No flooding!');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_img`
--

CREATE TABLE `gallery_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery_img`
--

INSERT INTO `gallery_img` (`id`, `title`, `views`) VALUES
(250, '01.jpg', 8),
(251, '02.jpg', 7),
(252, '03.jpg', 2),
(253, '04.jpg', 0),
(254, '05.jpg', 0),
(255, '06.jpg', 0),
(256, '07.jpg', 1),
(257, '08.jpg', 0),
(258, '09.jpg', 0),
(259, '10.jpg', 0),
(260, '11.jpg', 0),
(261, '12.jpg', 0),
(262, '13.jpg', 0),
(263, '14.jpg', 0),
(264, '15.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '123', ''),
(2, 'user', '321', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery_img`
--
ALTER TABLE `gallery_img`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `gallery_img`
--
ALTER TABLE `gallery_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
