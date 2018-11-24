-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 13 2018 г., 21:29
-- Версия сервера: 5.7.11
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gbphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Цветы'),
(2, 'Все для дома'),
(3, 'Для авто'),
(4, 'Компьютеры'),
(5, 'Телефоны'),
(6, '');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) NOT NULL,
  `god_id` int(10) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `god_id`, `text`) VALUES
(1, 1, 'Хороший товар'),
(2, 1, 'Замечательный товар'),
(3, 1, 'йцу'),
(4, 1, 'йцу'),
(5, 3, 'фыв'),
(6, 3, '123'),
(7, 1, '123'),
(8, 1, '123'),
(9, 3, '123'),
(10, 3, '123'),
(11, 3, 'gh'),
(12, 1, '1324');

-- --------------------------------------------------------

--
-- Структура таблицы `gods`
--

CREATE TABLE IF NOT EXISTS `gods` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(3) NOT NULL,
  `info` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gods`
--

INSERT INTO `gods` (`id`, `name`, `category_id`, `info`) VALUES
(1, 'Роза', 1, 'info1'),
(2, 'Тюльпан', 1, 'info2'),
(3, 'Стол', 2, 'info3'),
(4, 'Name1', 1, 'info'),
(5, 'Name2', 1, 'info'),
(6, 'Name1', 1, 'info'),
(7, 'Name2', 1, 'info'),
(8, 'Name1', 1, 'info'),
(9, 'Name2', 1, 'info'),
(10, 'Name1', 1, 'info'),
(11, 'Name2', 1, 'info'),
(12, 'Name1', 1, 'info'),
(13, 'Name2', 1, 'info');

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `id` int(11) NOT NULL,
  `img_min` varchar(200) NOT NULL,
  `img_max` varchar(200) NOT NULL,
  `name` varchar(30) NOT NULL,
  `size_img_min` int(9) NOT NULL,
  `size_img_max` int(9) NOT NULL,
  `count` int(9) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id`, `img_min`, `img_max`, `name`, `size_img_min`, `size_img_max`, `count`) VALUES
(1, '1.jpg', '1.jpg', 'php1', 300, 1000, 2),
(2, '2.jpg', '2.jpg', 'php2', 300, 1000, 4),
(3, '3.jpg', '3.jpg', 'php3', 300, 1000, 2),
(4, '4.jpg', '4.jpg', 'php4', 300, 1000, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Имя и фамилия пользователя',
  `login` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `count` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `count`) VALUES
(1, 'Саня', 'admin', '202cb962ac59075b964b07152d234b70', 7),
(3, 'Света', 'user', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz`
--

CREATE TABLE IF NOT EXISTS `zakaz` (
  `id` int(5) NOT NULL,
  `name` varchar(150) NOT NULL,
  `zakaz` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 - заказ, 2 - оплачен, 3 -выслан, 4 - доставлен'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zakaz`
--

INSERT INTO `zakaz` (`id`, `name`, `zakaz`, `status`) VALUES
(1, '123', '{"1":3,"3":1}', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gods`
--
ALTER TABLE `gods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `gods`
--
ALTER TABLE `gods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
