-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 24 2023 г., 09:35
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hoteldb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `admin_name` varchar(150) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `admin_pass` varchar(150) COLLATE utf8mb3_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
--

CREATE TABLE `booking` (
  `id_b` int NOT NULL,
  `user` varchar(50) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `room_id` int NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `days` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Дамп данных таблицы `booking`
--

INSERT INTO `booking` (`id_b`, `user`, `room_id`, `checkin`, `checkout`, `days`, `price`) VALUES
(101, 'ivan@gmail.com', 103, '2023-03-29', '2023-03-31', 3, 5700),
(141, 'elena@yandex.ru', 107, '2023-04-01', '2023-04-02', 2, 2400),
(143, 'semyon@gmail.com', 205, '2023-03-30', '2023-03-31', 2, 7000),
(149, 'petr@yandex.ru', 202, '2023-03-30', '2023-03-31', 2, 4000);

-- --------------------------------------------------------

--
-- Структура таблицы `editing`
--

CREATE TABLE `editing` (
  `id_ed` int NOT NULL,
  `site_title` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `site_phone` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `site_adres` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `site_sale` varchar(300) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `site_about` varchar(250) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `title_standart_room` varchar(20) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `text_standart_room` varchar(500) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `title_comfort_room` varchar(20) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `text_comfort_room` varchar(500) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `title_luxe_room` varchar(20) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `text_luxe_room` varchar(500) COLLATE utf8mb3_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Дамп данных таблицы `editing`
--

INSERT INTO `editing` (`id_ed`, `site_title`, `site_phone`, `site_adres`, `site_sale`, `site_about`, `title_standart_room`, `text_standart_room`, `title_comfort_room`, `text_comfort_room`, `title_luxe_room`, `text_luxe_room`) VALUES
(1, 'Premium Class Hotel', '7(901)456-34-39', 'г. Ростов-на-Дону, ул. Б.Садовая 16', 'Откройте весенний сезон с нами: СКИДКА 10% на все предложения!', 'Premium Class Hotel - отель премиального качества', 'Standart', 'Однокомнатный номер, размер комнаты составляет 16 м². В санузле: ванна или душ, умывальник, унитаз. Стандарт – наиболее распространенный и недорогой по стоимости тип номера. Есть возможность дополнительного размещения. ', 'Comfort', 'Номера повышенной комфортности с изысканным дизайном, большой кроватью и балконом с видом на парковую зону отеля. Для гостей предлагаются халаты, тапочки и расширенный набор косметики «комфорт». В номере располагается двуспальная кровать, мягкая мебель для отдыха, телевизор с пакетом спутниковых каналов, собственный уединенный балкон с мебелью для отдыха. Есть возможность дополнительного размещения. ', 'Luxe', 'Номер Люкc представляет собой комфортабельный двухкомнатный номер с гостиной и спальней. В номере располагается двуспальная кровать, мягкая мебель для отдыха, телевизор с пакетом спутниковых каналов, собственный уединенный балкон с мебелью для отдыха. Есть возможность дополнительного размещения. Ванная комната оснащена душевой кабиной, феном, набором косметических принадлежностей, халатами и тапочками.');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `number` int NOT NULL,
  `type` varchar(15) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `people` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`number`, `type`, `people`, `price`) VALUES
(101, 'Comfort', 1, 1500),
(102, 'Comfort', 1, 1500),
(103, 'Comfort', 2, 1900),
(104, 'Comfort', 2, 1900),
(105, 'Comfort', 3, 2500),
(106, 'Standart', 1, 1200),
(107, 'Standart', 1, 1200),
(108, 'Standart', 2, 1700),
(109, 'Standart', 2, 1700),
(110, 'Standart', 3, 2100),
(201, 'Luxe', 1, 2000),
(202, 'Luxe', 1, 2000),
(203, 'Luxe', 2, 2500),
(204, 'Luxe', 2, 2500),
(205, 'Luxe', 3, 3500);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `phonenum` bigint NOT NULL,
  `pasport` bigint NOT NULL,
  `dob` date NOT NULL,
  `pass` varchar(100) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `datentime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`email`, `name`, `surname`, `phonenum`, `pasport`, `dob`, `pass`, `datentime`) VALUES
('alex@yandex.ru', 'Александр', 'Иванов', 89005565656, 9945612300, '1980-11-11', '222', '2023-03-22 10:14:53'),
('elena@yandex.ru', 'Елена', 'Сергеенко', 87971878254, 9853334341, '1989-05-04', '111', '2023-03-19 13:26:25'),
('ivan@gmail.com', 'Иван', 'Иванов', 88005554545, 3230000011, '2002-12-12', '123', '2023-03-15 14:58:50'),
('petr@yandex.ru', 'Петр', 'Петров', 81111199999, 1000000000, '1999-11-11', '111', '2023-03-23 20:11:52'),
('semyon@gmail.com', 'Семён', 'Григорьев', 89081978243, 1111110000, '2009-09-20', '123', '2023-03-15 14:46:29');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_b`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `editing`
--
ALTER TABLE `editing`
  ADD PRIMARY KEY (`id_ed`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD UNIQUE KEY `number` (`number`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`,`phonenum`,`pasport`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `id_b` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT для таблицы `editing`
--
ALTER TABLE `editing`
  MODIFY `id_ed` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`number`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`user`) REFERENCES `users` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
