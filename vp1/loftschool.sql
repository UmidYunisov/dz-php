-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 05 2017 г., 10:47
-- Версия сервера: 5.5.53
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `loftschool`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`) VALUES
(1, 1, ''),
(2, 0, '$address'),
(3, 1, 'srgfegfe erg erg ergeg'),
(4, 2, 'dfgdgdg drgrg erg egregeg '),
(5, 1, 'sdfsfs dsfsdf sdfsf'),
(6, 1, 'sdfsfs dsfsdf sdfsf'),
(7, 1, 'sdfsf sdfsfs sdsfs'),
(8, 1, 'sdfsf sdfsfs sdsfs'),
(9, 1, 'sdfsf sdfsfs sdsfs'),
(10, 1, 'sdfsf sdfsfs sdsfs'),
(11, 1, 'sdfsf sdfsfs sdsfs'),
(12, 1, 'sdfdf sdfgsd sdgfdsg'),
(13, 1, 'sdfdf sdfgsd sdgfdsg'),
(14, 1, 'sdfdf sdfgsd sdgfdsg'),
(15, 1, 'sdfdf sdfgsd sdgfdsg'),
(16, 1, 'sdfdf sdfgsd sdgfdsg'),
(17, 1, 'sdfdf sdfgsd sdgfdsg'),
(18, 1, 'sdfdf sdfgsd sdgfdsg'),
(19, 1, 'sdfdf sdfgsd sdgfdsg'),
(20, 1, 'sdfdf sdfgsd sdgfdsg'),
(21, 1, 'sdfdf sdfgsd sdgfdsg'),
(22, 1, 'sdfdf sdfgsd sdgfdsg'),
(23, 4, 'dfgdgdg drgrg erg egregeg '),
(24, 4, 'sdfdf sdfgsd sdgfdsg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Umid', 'umid@mail.ru', '+12342345432'),
(2, 'Niko', 'niko@mail.ru', '+12342345432'),
(3, 'Name', 'name@mail.ru', '+79998886655'),
(4, 'Vasya', 'vasya@mail.ru', '+98076545454'),
(5, 'Vitya', 'vitya@mail.ru', '+123456789'),
(6, 'zakaz', 'zakaz@mail.ru', '+21323432');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
