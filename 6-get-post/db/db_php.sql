-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Мар 27 2022 г., 12:36
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
(2, 'product-2', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52),
(3, 'product-3', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52),
(4, 'product-4', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52),
(5, 'product-5', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52),
(6, 'product-6', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52),
(7, 'product-7', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52),
(8, 'product-8', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52),
(9, 'product-9', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52),
(10, 'product-10', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52),
(11, 'product-11', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52),
(12, 'product-12', 'Dolores quos', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 52);

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
(1, 'Admin', 'No flooding!'),
(2, 'User', 'What\'s up?'),
(4, 'James', 'Soluta inventore ea nemo, repellendus quidem nostrum deleniti ad in exercitationem dignissimos culpa minus?'),
(5, 'Mary', 'Hello!'),
(9, 'Admin', 'hello'),
(10, 'Alex', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'),
(11, 'John', 'I\'ll ban you!'),
(12, 'Daniel', 'Sit magnam eos deserunt ullam voluptatibus, perferendis aut!'),
(13, 'Hedgehog', 'Hoooorse!'),
(14, 'Admin', 'Hi'),
(15, 'Test', 'test'),
(16, 'Jack', 'excellent'),
(17, 'Jessica', 'review'),
(18, 'Mark', 'good');

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
(250, '01.jpg', 3),
(251, '02.jpg', 5),
(252, '03.jpg', 2),
(253, '04.jpg', 0),
(254, '05.jpg', 0),
(255, '06.jpg', 0),
(256, '07.jpg', 0),
(257, '08.jpg', 0),
(258, '09.jpg', 0),
(259, '10.jpg', 0),
(260, '11.jpg', 0),
(261, '12.jpg', 0),
(262, '13.jpg', 0),
(263, '14.jpg', 0),
(264, '15.jpg', 0);

--
-- Индексы сохранённых таблиц
--

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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `gallery_img`
--
ALTER TABLE `gallery_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
