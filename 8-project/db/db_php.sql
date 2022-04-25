-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Апр 25 2022 г., 01:39
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
  `session_id` varchar(30) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `good_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `user_id`, `good_id`, `qty`, `price`) VALUES
(1, 'j70j4u1770o3kkvdoj3b3oftjd', '', 5, 1, 78),
(2, 'j70j4u1770o3kkvdoj3b3oftjd', '', 6, 2, 87),
(3, '7768h87qjo4rgb7bgenvrdi346', '1', 1, 2, 52),
(4, '7768h87qjo4rgb7bgenvrdi346', '1', 2, 1, 45),
(5, 'j91mhj003iq2v4ne3e7mos7q6n', '2', 3, 1, 30),
(6, 'j91mhj003iq2v4ne3e7mos7q6n', '2', 4, 2, 50),
(7, '9akegtv1u6gda328rj8um8ggv5', '', 11, 1, 49),
(8, '9akegtv1u6gda328rj8um8ggv5', '', 12, 1, 64),
(9, '9akegtv1u6gda328rj8um8ggv5', '', 7, 1, 40),
(10, 'aa65vdb3ht16eo67n6ucd62q0v', '1', 3, 1, 30),
(11, 'aa65vdb3ht16eo67n6ucd62q0v', '1', 4, 2, 50),
(12, 'rsgijm5o3gurppcm87vls4euc5', '2', 9, 1, 43),
(13, 'rsgijm5o3gurppcm87vls4euc5', '2', 10, 2, 59);

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
(250, '01.jpg', 1),
(251, '02.jpg', 2),
(252, '03.jpg', 0),
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

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` varchar(30) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `total` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `user_id`, `name`, `phone`, `total`, `status`) VALUES
(1, 'j70j4u1770o3kkvdoj3b3oftjd', '', 'guest', '123456', '252', 'pending'),
(2, '7768h87qjo4rgb7bgenvrdi346', '1', 'admin', '123456', '149', 'pending'),
(3, 'j91mhj003iq2v4ne3e7mos7q6n', '2', 'user', '123456', '130', 'cancelled'),
(4, '9akegtv1u6gda328rj8um8ggv5', '', 'guest2', '123456', '153', 'completed'),
(5, 'aa65vdb3ht16eo67n6ucd62q0v', '1', 'admin', '123456', '130', 'processing'),
(6, 'rsgijm5o3gurppcm87vls4euc5', '2', 'user', '123456', '161', 'pending');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass_hash` varchar(255) NOT NULL,
  `session_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass_hash`, `session_hash`) VALUES
(1, 'admin', '$2y$10$vMgZ5y7YVyG.paqOz6ni2u3BvR.zNtOcCeIz2vtr6TS3S0yPlk2bu', '15354560896260ae2e3408e1.77594193'),
(2, 'user', '$2y$10$vf91rqwFogqJv7TW7VWbiu0CHsRT9zaxCN946MEHyTkXQhBU.QClW', '926383841625c6d9a3e3fc4.38703054');

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
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `gallery_img`
--
ALTER TABLE `gallery_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
