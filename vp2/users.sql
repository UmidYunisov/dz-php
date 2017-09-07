-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 07 2017 г., 11:56
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
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `age`, `description`, `photo`) VALUES
(1, 'admin', '$2y$10$J7QMr2zxj4vWR/Q.fLbpmuYtJV4.QhUVx8De3LmYa9RJefb7qeq2G', 'Administrator', '1988-01-31', 'I am an administrator', 'templates/img/1.jpg'),
(2, 'user', '$2y$10$ePGQM64rsp7rVztK47fhg.uYZd1r0QPBdMXbxmrhmh23PEJItRxTm', 'UserName', '2000-08-02', 'I am a good user', 'templates/img/2.jpg'),
(3, 'guest', '$2y$10$sJBpg9sP0Zs6gX7OvTfgdepSky7To51oqJPD/UJd9hG9BCq3wcYCS', 'GuestName', '1995-08-03', 'I am a guest', 'templates/img/3.jpg'),
(4, 'Login', '$2y$10$0dp81vAd62aefwfRP7ZqtewF/LMdN5JU1XpcuXRIN1gwqlE8YLA5.', 'Name', '2017-09-07', 'dddd', 'templates/img/Koala.jpg'),
(5, 'Name', '$2y$10$NJhrhCjeAD9caeZrXRgKLeKR7BNBPE8NpS6t8B6qUwo0Mmu8QH9Li', 'Name', '2017-09-05', 'ddd', 'templates/img/Penguins.jpg'),
(6, 'Havi', '$2y$10$O3v9Fn2/RvzD5DtHEXjDouiKlwwdFS5qtX9aLdO7AiW6nNP2xuQRG', 'Havi', '2017-09-13', 'sss', 'templates/img/Hydrangeas.jpg'),
(8, 'Vin', '$2y$10$VnkFQJTZiXK6ZHpMObnxjuKSduD6jLJdu21x1Is03JKKXycejW0IW', 'Vin', '2017-09-05', 'ddd', 'templates/img/Penguins.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
