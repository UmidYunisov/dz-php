-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 01 2017 г., 20:31
-- Версия сервера: 5.5.53
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `loftlaravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categorys`
--

CREATE TABLE `categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Транспорт', NULL, NULL),
(2, 'Недвижимость', NULL, NULL),
(3, 'Животные', NULL, NULL),
(4, 'Бытовая электроника', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` int(11) NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `created_at`, `updated_at`, `category`, `photo`, `description`) VALUES
(1, 'Gerald Lind', 4231, '2017-09-23 11:15:50', '2017-10-01 11:42:23', 1, '68a13ee88cdd88f9235802b37a1d671f.jpeg', 'Est laudantium quo quibusdam possimus porro et necessitatibus vero. Non mollitia earum molestias illum sint nulla. Debitis laudantium sint ad ad quisquam sequi dolorem at.'),
(2, 'Ona Franecki', 2564, '2017-09-23 11:15:50', '2017-09-23 11:15:50', 1, 'Penguins.jpg', 'Autem inventore repellendus totam aut et. Omnis impedit optio nemo amet cumque repellat ad. Molestiae consequatur eius ut eaque. Quidem est et non dolorem eaque deserunt non.'),
(3, 'Trudie Brekke', 5194, '2017-09-23 11:15:50', '2017-09-23 11:15:50', 1, 'Penguins.jpg', 'Dolore illum voluptas neque labore. Quo voluptatem consectetur aperiam sit consequatur provident. Aut soluta eaque sed esse.'),
(4, 'Abby Wisozk', 1675, '2017-09-23 11:15:51', '2017-09-23 11:15:51', 1, 'Penguins.jpg', 'Cupiditate quas ut deserunt et sed ex. Expedita error sunt molestias ad voluptas. Dignissimos aut quo omnis deleniti dolore. Voluptatum explicabo et deleniti a. Et quidem dolore impedit suscipit.'),
(5, 'Dr. Winona Dickens V', 1075, '2017-09-23 11:15:51', '2017-09-23 11:15:51', 2, 'Penguins.jpg', 'Vero dicta veritatis nisi architecto magni. A iusto autem quidem quibusdam facilis ut. Id est amet repellendus ducimus quod incidunt quos aut.'),
(6, 'Nyasia Heathcote', 9239, '2017-09-23 11:15:52', '2017-09-23 11:15:52', 2, 'Penguins.jpg', 'Laboriosam est culpa aliquid ut. Laudantium in magni ad omnis nisi aliquam. Optio voluptas qui ut minima quia quo. In minima sunt sint id.'),
(7, 'Elwyn Feil Sr.', 740, '2017-09-23 11:15:52', '2017-09-23 11:15:52', 2, 'Penguins.jpg', 'Odio ut cupiditate iusto recusandae cupiditate non possimus. Eos rem nobis odio ratione laboriosam laudantium consequatur. Dolor voluptatem cum enim corporis sed labore.'),
(8, 'Mr. Scottie Bechtelar', 1776, '2017-09-23 11:15:53', '2017-09-23 11:15:53', 2, 'Penguins.jpg', 'Sit nobis voluptatum doloribus tempora accusantium. Voluptatibus delectus dignissimos ut non dolore.'),
(9, 'Mrs. Anne Reichert', 5244, '2017-09-23 11:15:53', '2017-09-23 11:15:53', 2, 'Penguins.jpg', 'Ut dolorum sapiente quo cupiditate sint et qui. Voluptatem est quia inventore molestiae a soluta quia. Voluptas harum non praesentium et hic laborum.'),
(10, 'Maria Blanda', 4252, '2017-09-23 11:15:53', '2017-09-23 11:15:53', 3, 'Penguins.jpg', 'Optio distinctio placeat sunt tempore magnam deleniti. Est iste maxime officia voluptatem. Voluptas aut sint vero incidunt et facere libero. Ea eaque fugiat veniam laudantium.'),
(11, 'Prof. Arne Wehner', 5329, '2017-09-23 11:15:54', '2017-09-23 11:15:54', 3, 'Penguins.jpg', 'Odit magnam magnam saepe et amet. Dolore ea voluptas enim voluptatem ut et nobis. Dolorum sunt quas sed ut. Animi sit rem porro consequuntur. Soluta dolores officia dolores quis porro voluptatem.'),
(12, 'Prof. Gideon Osinski', 7562, '2017-09-23 11:15:54', '2017-09-23 11:15:54', 3, 'Penguins.jpg', 'Quae labore sunt sunt quia qui. Sit molestiae ad molestiae consequatur sapiente. Molestias eius ea dolor facere eligendi quibusdam molestiae quam.'),
(13, 'Angel Schaefer', 8925, '2017-09-23 11:15:55', '2017-09-23 11:15:55', 3, 'Penguins.jpg', 'Aliquid accusamus adipisci maxime velit natus rem harum magnam. Et consequatur adipisci numquam minima quis. Rerum ab qui dolorem laborum ut et id. Iure ut tempora ab est nobis.'),
(14, 'Heath Kuhic', 6043, '2017-09-23 11:15:55', '2017-09-23 11:15:55', 3, 'Penguins.jpg', 'Praesentium aut delectus tempore culpa. Totam ipsa nam soluta eius et enim. Quasi est ipsum quo qui deleniti sit. Earum fugit amet quia et commodi repellat itaque culpa.'),
(15, 'Dr. Terence Jones', 8648, '2017-09-23 11:15:55', '2017-09-23 11:15:55', 3, 'Penguins.jpg', 'In in laborum sed quia asperiores. Harum animi reiciendis voluptas consequatur nostrum voluptatem perspiciatis.'),
(16, 'Richmond Bayer', 4968, '2017-09-23 11:15:56', '2017-09-23 11:15:56', 4, 'Penguins.jpg', 'Accusantium est qui voluptatem nihil animi unde qui. Laudantium sed et omnis rerum atque. Aut saepe quidem molestiae recusandae sit recusandae. Voluptatem ut et explicabo sit.'),
(17, 'Prof. Earnest Krajcik', 9304, '2017-09-23 11:15:56', '2017-09-23 11:15:56', 4, 'Penguins.jpg', 'Et repudiandae voluptas minima nihil laborum libero. Dolores quos ut autem consequatur sit magnam. Eum hic animi eos itaque nam.'),
(18, 'Ms. Alycia Hodkiewicz MD', 8048, '2017-09-23 11:15:57', '2017-09-23 11:15:57', 4, 'Penguins.jpg', 'Eos eius eligendi sapiente in aspernatur id omnis. Quia amet quis quae harum totam. Unde mollitia provident illum. Soluta veniam omnis cumque laboriosam voluptas similique error.'),
(19, 'Lindsay Rosenbaum II', 5385, '2017-09-23 11:15:57', '2017-09-23 11:15:57', 4, 'Penguins.jpg', 'Aliquid et dolorum similique quae id eum labore. Doloremque corporis consequatur nulla optio. Natus perspiciatis vitae officiis soluta ut. Commodi illum numquam autem.'),
(20, 'Jamaal Parker III', 4932, '2017-09-23 11:15:57', '2017-09-23 11:15:57', 4, 'Penguins.jpg', 'Cum sequi ipsa dolorem voluptas possimus unde. Corporis numquam earum qui quia velit quis. Esse voluptatem aut molestiae doloremque vitae iste beatae qui.'),
(21, 'Joanny Murazik', 8571, '2017-09-23 11:15:58', '2017-09-23 11:15:58', 4, 'Penguins.jpg', 'Iure laudantium molestias sunt expedita. Libero blanditiis quisquam inventore unde. Maxime iusto autem adipisci voluptas suscipit rerum. Aut qui enim aliquid fuga porro.'),
(22, 'Martine Kirlin IV', 8706, '2017-09-23 11:15:58', '2017-09-23 11:15:58', 4, 'Penguins.jpg', 'Sequi sed deleniti labore fugiat incidunt autem et tempore. Omnis optio qui quaerat sint quas id. Enim quo architecto magnam labore sed blanditiis doloribus.'),
(23, 'Lawrence Greenfelder', 5227, '2017-09-23 11:15:59', '2017-09-23 11:15:59', 4, 'Penguins.jpg', 'Exercitationem optio corporis rerum. Ut dolorum voluptatem culpa eaque at distinctio. Et accusantium distinctio nihil delectus.'),
(24, 'Dr. Agustin Marquardt', 3393, '2017-09-23 11:15:59', '2017-09-23 11:15:59', 4, 'Penguins.jpg', 'Assumenda incidunt maxime non ea ut. Libero sunt ipsa exercitationem voluptatem facilis quis provident qui. Assumenda est recusandae sed accusantium et temporibus nostrum.'),
(25, 'Isaias Kris', 3911, '2017-09-23 11:15:59', '2017-09-23 11:15:59', 4, 'Penguins.jpg', 'Amet unde reprehenderit rerum non quis dicta et voluptas. Accusamus aut quam eaque dolore voluptas quia. Consequatur quia alias aliquam necessitatibus. Eligendi enim enim quis corporis iste officia.'),
(26, 'Joelle Littel', 1454, '2017-09-23 11:16:00', '2017-09-23 11:16:00', 5, 'Penguins.jpg', 'Fugit nulla iure accusantium voluptate. Velit eos laborum consequatur eligendi nostrum.'),
(27, 'Celestine Erdman', 2863, '2017-09-23 11:16:00', '2017-09-23 11:16:00', 5, 'Penguins.jpg', 'Qui ut eligendi et maiores. Similique nulla est ducimus perspiciatis. Nihil sapiente eum nobis eius. Dolorum aut voluptas consequatur iure.'),
(28, 'Lennie Cummings', 1287, '2017-09-23 11:16:01', '2017-09-23 11:16:01', 5, 'Penguins.jpg', 'Sed eveniet nulla possimus et minima a vel. Quae assumenda harum suscipit non.'),
(29, 'Melvin Thompson', 7513, '2017-09-23 11:16:01', '2017-09-23 11:16:01', 5, 'Penguins.jpg', 'Quia nulla aliquam laborum optio labore rerum consectetur. Et non possimus aliquid voluptas necessitatibus et esse. Eveniet est officia ducimus ipsa qui.'),
(30, 'Cornelius Bergnaum', 4729, '2017-09-23 11:16:02', '2017-09-23 11:16:02', 5, 'Penguins.jpg', 'Et vel similique veniam. Qui ut quidem pariatur consectetur iste sequi. Aperiam rerum non autem. Quia sint repellat id totam. Amet ea neque culpa. Voluptas labore dolore ratione quis dolor quia.'),
(33, 'Tovar', 333, '2017-09-24 16:25:47', '2017-09-24 16:25:47', 0, 'Penguins.jpg', NULL),
(34, 'ццц', 111, '2017-09-24 16:35:43', '2017-09-24 16:35:43', 0, 'Penguins.jpg', 'цццц');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_20_185500_create_goods_table', 2),
(4, '2017_09_20_190416_FakeGoods', 3),
(5, '2017_09_22_184046_goods_fix', 4),
(6, '2017_09_23_134429_newgood', 5),
(9, '2017_09_23_140935_fakernewGoods', 8),
(10, '2014_10_12_000000_create_users_table', 9),
(11, '2017_09_23_135455_categorys', 10),
(12, '2017_09_28_161916_orders', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'umid', 'umid@mail.ru', '2017-09-28 13:27:20', '2017-09-28 13:27:20'),
(6, 'fff', 'fff@mail.ru', '2017-09-28 13:58:16', '2017-09-28 13:58:16'),
(7, 'zakaz', 'zakaz@mail.ru', '2017-09-28 13:59:06', '2017-09-28 13:59:06'),
(8, 'sddfsf', 'sdfsa@dd.jj', '2017-09-28 14:02:11', '2017-09-28 14:02:11'),
(9, 'Abby Wisozk', 'user@loft.loc', '2017-09-28 14:30:03', '2017-09-28 14:30:03'),
(10, 'Gerald Lind', 'user@loft.loc', '2017-09-28 15:29:47', '2017-09-28 15:29:47'),
(11, 'Gerald Lind', 'user@loft.loc', '2017-09-28 15:30:35', '2017-09-28 15:30:35'),
(12, 'Dr. Winona Dickens V', 'user@loft.loc', '2017-10-01 14:13:56', '2017-10-01 14:13:56'),
(13, 'Dr. Winona Dickens V', 'user@loft.loc', '2017-10-01 14:14:02', '2017-10-01 14:14:02'),
(14, 'Gerald Lind', 'user@loft.loc', '2017-10-01 14:14:16', '2017-10-01 14:14:16'),
(15, 'Gerald Lind', 'user@loft.loc', '2017-10-01 14:15:31', '2017-10-01 14:15:31');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin@loft.loc', '$2y$10$rMDbdRMep3kgBmdfunn13.VCqOrg1UvEgJP2lfChx4Us58osAojAa', 1, 'EGjoGDerZfnmlNzfzzOJQexTjmd8Beu4t1U642TRbNLnwKddddZVjKKBBmRz', '2017-10-01 14:30:01', '2017-10-01 14:30:07'),
(5, 'user', 'user@loft.loc', '$2y$10$urTEdD8r0hXrJmFtfLlo4OYfZhzTualJcEYHl8BzE9N9wC9SByjyS', 0, 'wqmEJYIoML7ebqioqiF9mfeJ0pC2b5RExh8JlHf86F6vo6LvFehPIsKHZCTj', '2017-10-01 14:30:29', '2017-10-01 14:30:51');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorys_id_index` (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT для таблицы `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
