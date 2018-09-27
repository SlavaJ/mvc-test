-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 27 2018 г., 18:03
-- Версия сервера: 5.7.23-0ubuntu0.16.04.1
-- Версия PHP: 7.1.20-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `userbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `email`, `phone`, `password`) VALUES
(7, 'Petya', 'Petro', 'petya@mail.ru', '78904532167', '$2y$10$wog0iMYful3gq6uvT3/5o..GzSR7laTHM6MvK1Fb3DNjrjKgSzuGe'),
(8, 'Ivanko', 'Zavred', 'ivan@mail.ru', '38093478423', '$2y$10$ofCURAWF76S1o39lli62GuaAeADV9V3D3jqajlpgYcZSC64faskHu'),
(9, 'Kolya', 'Kolkol', 'kolya@mail.ru', '78945654567', '$2y$10$UWEfJQHr6b.OftQfhl0bsegaJ8U3klNTP7YCUEGOi8j5E/yUHaU.i'),
(10, 'Vasya', 'vasdas', 'vasya@gmail.ru', '78945654591', '$2y$10$F4HiwMmNqjzjPqYPAw8MJON5VDapSoj6kw2GgZ4lYB6zu4bLPgvRK'),
(11, 'Pasha', 'pshok', 'pash@gmail.com', '38093478411', '$2y$10$XLXzi1Vr.RMox7gIUljCIuZ7bPg1njeIZoR6y11i1PgRq5rGTq/bm'),
(12, 'Dima', 'doomdoom', 'dima@mail.ru', '78945654561', '$2y$10$POly3MvtJQ2Bhw1pWOQsseKq4qdbksamkiWHU.jupayRFGDfTZbxC');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
