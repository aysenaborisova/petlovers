-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 22 2026 г., 10:18
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `petlovers_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `category`, `image`, `created_at`) VALUES
(1, 'Как выбрать собаку', '<p>Собака — верный друг человека и отличный компаньон.</p><img src=\"images/dog.jpg\" alt=\"Собака\" class=\"article-img\"><h3>Особенности содержания:</h3><ul><li>Нужны ежедневные прогулки (2-3 часа)</li><li>Требуют дрессировки и воспитания</li><li>Нуждаются в социализации</li><li>Продолжительность жизни: 10-15 лет</li></ul>', 'types', 'images/dog.jpg', '2026-04-25 11:57:58'),
(2, 'Как выбрать кошку', '<p>Кошка — независимое животное, идеально подходит для квартиры.</p><img src=\"images/cat.jpg\" alt=\"Кошка\" class=\"article-img\"><h3>Особенности содержания:</h3><ul><li>Не требуют прогулок</li><li>Нужен лоток и когтеточка</li><li>Могут быть своенравными</li><li>Продолжительность жизни: 12-18 лет</li></ul>', 'types', 'images/cat.jpg', '2026-04-25 11:57:58'),
(3, 'Как выбрать рыбок', '<p>Рыбки — спокойные питомцы, за которыми приятно наблюдать.</p><img src=\"images/fish.jpg\" alt=\"Рыбки\" class=\"article-img\"><h3>Особенности содержания:</h3><ul><li>Нужен аквариум с фильтрацией и обогревом</li><li>Кормление 1-2 раза в день</li><li>Требуют регулярной чистки аквариума</li><li>Продолжительность жизни: 3-5 лет</li></ul>', 'types', 'images/fish.jpg', '2026-04-25 11:57:58'),
(4, 'Как выбрать попугая', '<p>Попугаи — общительные и умные птицы.</p><img src=\"images/bird.jpg\" alt=\"Попугай\" class=\"article-img\"><h3>Особенности содержания:</h3><ul><li>Нужна просторная клетка</li><li>Требуют внимания и общения</li><li>Любят купаться</li><li>Продолжительность жизни: 5-10 лет</li></ul>', 'types', 'images/bird.jpg', '2026-04-25 11:57:58'),
(5, 'Как выбрать хомяка', '<p>Хомяк — маленький и активный питомец.</p><img src=\"images/hamster.jpg\" alt=\"Хомяк\" class=\"article-img\"><h3>Особенности содержания:</h3><ul><li>Нужна клетка с колесом</li><li>Активен ночью</li><li>Живут 2-3 года</li></ul>', 'types', 'images/hamster.jpg', '2026-04-25 11:57:58'),
(6, 'Правильное питание питомцев', '<p>Сбалансированный рацион — залог здоровья вашего питомца.</p><img src=\"images/feeding.jpg\" alt=\"Питание\" class=\"article-img\"><h3>Основные правила кормления:</h3><ul><li>Кормите в одно и то же время</li><li>Не давайте еду со стола</li><li>Обеспечьте доступ к свежей воде</li><li>Выбирайте качественный корм</li><li>Учитывайте возраст и состояние здоровья</li></ul>', 'tips', 'images/feeding.jpg', '2026-04-25 11:57:58'),
(7, 'Здоровье и прививки', '<p>Регулярные визиты к ветеринару помогут сохранить здоровье питомца.</p><img src=\"images/health.jpg\" alt=\"Здоровье\" class=\"article-img\"><h3>Важные правила:</h3><ul><li>Делайте прививки по графику</li><li>Обрабатывайте от паразитов раз в 3 месяца</li><li>Раз в год проходите осмотр у ветеринара</li><li>Следите за поведением питомца</li></ul>', 'tips', 'images/health.jpg', '2026-04-25 11:57:58'),
(8, 'Воспитание и дрессировка', '<p>Воспитание питомца начинается с первых дней.</p><img src=\"images/training.jpg\" alt=\"Воспитание\" class=\"article-img\"><h3>Советы по воспитанию:</h3><ul><li>Будьте последовательны</li><li>Используйте поощрение (лакомства, поглаживания)</li><li>Не применяйте силу — это вызывает страх</li><li>Будьте терпеливы — навык формируется за 2-4 недели</li><li>Регулярно повторяйте команды</li></ul>', 'tips', 'images/training.jpg', '2026-04-25 11:57:58');

-- --------------------------------------------------------

--
-- Структура таблицы `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `species` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breed` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pets`
--

INSERT INTO `pets` (`id`, `user_id`, `name`, `species`, `breed`, `birth_date`, `photo`, `created_at`) VALUES
(1, 1, 'Бобик', 'Собака', 'Лабрадор', '2020-05-10', '/assets/uploads/1777694157_b4eb63c956ef2af67623e6a8f98d33d4.jpg', '2026-04-25 11:18:55'),
(2, 1, 'Мурка', 'Кошка', 'Британская', '2021-08-15', 'images/cat.jpg', '2026-04-25 11:57:58'),
(3, 1, 'Рыжик', 'Хомяк', 'Джунгарский', '2023-01-20', 'images/hamster.jpg', '2026-04-25 11:57:58'),
(4, 2, 'Кеша', 'Попугай', 'Волнистый', '2022-03-10', 'images/bird.jpg', '2026-04-25 11:57:58'),
(5, 2, 'Барсик', 'Кошка', 'Дворовая', '2019-07-22', 'images/cat.jpg', '2026-04-25 11:57:58'),
(6, 3, 'Рекс', 'Собака', 'Немецкая овчарка', '2018-11-05', 'images/dog.jpg', '2026-04-25 11:57:58'),
(7, 3, 'Немо', 'Рыбки', 'Петушок', '2024-01-01', NULL, '2026-04-25 11:57:58'),
(8, 4, 'Соня', 'Кошка', 'Сфинкс', '2022-10-30', NULL, '2026-04-25 11:57:58'),
(9, 4, 'Пушок', 'Хомяк', 'Сирийский', '2024-02-14', NULL, '2026-04-25 11:57:58'),
(10, 5, 'Джек', 'Собака', 'Бигль', '2021-06-18', NULL, '2026-04-25 11:57:58'),
(12, 11, 'дружок', 'собака', 'спаниель', '2026-05-23', NULL, '2026-05-03 14:26:58'),
(13, 12, 'дружок', 'собака', 'спаниель', '2026-05-22', NULL, '2026-05-03 14:29:01'),
(14, 13, 'дружок', 'собака', 'спаниель', '2026-05-14', NULL, '2026-05-03 14:30:26');

-- --------------------------------------------------------

--
-- Структура таблицы `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `records`
--

INSERT INTO `records` (`id`, `pet_id`, `date`, `type`, `note`, `created_at`) VALUES
(1, 1, '2025-11-15', 'Прививка', 'Бешенство', '2026-04-25 11:18:55'),
(2, 1, '2025-12-01', 'Вес', '25 кг', '2026-04-25 11:18:55'),
(3, 1, '2025-12-20', 'Прогулка', '2 часа в парке', '2026-04-25 11:18:55'),
(4, 1, '2026-01-05', 'Обработка', 'От паразитов', '2026-04-25 11:18:55'),
(5, 1, '2025-01-15', 'Визит к врачу', 'Плановый осмотр - здоров', '2026-04-25 11:57:58'),
(6, 1, '2025-02-10', 'Вес', '26 кг - немного набрал', '2026-04-25 11:57:58'),
(7, 1, '2025-02-20', 'Прогулка', 'Поход в лес, 5 км', '2026-04-25 11:57:58'),
(8, 1, '2025-03-01', 'Прививка', 'Комплексная Нобивак', '2026-04-25 11:57:58'),
(9, 1, '2025-03-15', 'Заметка', 'Начал выполнять команду \"лежать\"', '2026-04-25 11:57:58'),
(10, 2, '2024-10-10', 'Прививка', 'От бешенства', '2026-04-25 11:57:58'),
(11, 2, '2024-11-05', 'Вес', '4.5 кг', '2026-04-25 11:57:58'),
(12, 2, '2024-12-25', 'Обработка', 'От блох и глистов', '2026-04-25 11:57:58'),
(13, 2, '2025-01-20', 'Прогулка', 'Гуляла во дворе 30 минут', '2026-04-25 11:57:58'),
(14, 2, '2025-02-15', 'Визит к врачу', 'Стоматология - чистка зубов', '2026-04-25 11:57:58'),
(15, 2, '2025-03-01', 'Заметка', 'Стала более ласковой', '2026-04-25 11:57:58'),
(16, 3, '2024-11-01', 'Вес', '50 г', '2026-04-25 11:57:58'),
(17, 3, '2024-12-15', 'Уборка', 'Полная чистка клетки', '2026-04-25 11:57:58'),
(18, 3, '2025-01-10', 'Вес', '55 г', '2026-04-25 11:57:58'),
(19, 3, '2025-02-20', 'Уборка', 'Замена подстилки', '2026-04-25 11:57:58'),
(20, 3, '2025-03-05', 'Заметка', 'Купил новое колесо - бегает активно', '2026-04-25 11:57:58'),
(21, 4, '2024-11-05', 'Вес', '35 г', '2026-04-25 11:57:58'),
(22, 4, '2025-01-15', 'Уход', 'Подрезка когтей', '2026-04-25 11:57:58'),
(23, 4, '2025-02-28', 'Уборка', 'Чистка клетки', '2026-04-25 11:57:58'),
(24, 4, '2025-03-10', 'Заметка', 'Выучил новое слово \"привет\"', '2026-04-25 11:57:58'),
(25, 5, '2024-10-20', 'Прививка', 'Комплексная', '2026-04-25 11:57:58'),
(26, 5, '2024-12-01', 'Вес', '6 кг', '2026-04-25 11:57:58'),
(27, 5, '2025-01-10', 'Обработка', 'От блох', '2026-04-25 11:57:58'),
(28, 6, '2024-09-15', 'Прививка', 'Бешенство', '2026-04-25 11:57:58'),
(29, 6, '2024-10-20', 'Дрессировка', 'Начали курс ОКД', '2026-04-25 11:57:58'),
(30, 6, '2024-12-10', 'Вес', '35 кг', '2026-04-25 11:57:58'),
(31, 6, '2025-02-01', 'Соревнования', 'Занял 2 место в аджилити', '2026-04-25 11:57:58'),
(32, 7, '2024-12-01', 'Замена воды', '30% воды', '2026-04-25 11:57:58'),
(33, 7, '2025-01-15', 'Уборка', 'Чистка аквариума', '2026-04-25 11:57:58'),
(34, 7, '2025-03-01', 'Новая рыбка', 'Добавили ещё одну петушка', '2026-04-25 11:57:58'),
(35, 8, '2024-11-10', 'Прививка', 'Бешенство', '2026-04-25 11:57:58'),
(36, 8, '2024-12-20', 'Вес', '3.8 кг', '2026-04-25 11:57:58'),
(37, 8, '2025-02-10', 'Заметка', 'Любит спать на подушке', '2026-04-25 11:57:58'),
(38, 9, '2024-12-10', 'Уборка', 'Чистка клетки', '2026-04-25 11:57:58'),
(39, 9, '2025-01-20', 'Вес', '60 г', '2026-04-25 11:57:58'),
(40, 10, '2024-10-05', 'Прививка', 'Бешенство', '2026-04-25 11:57:58'),
(41, 10, '2024-11-20', 'Вес', '14 кг', '2026-04-25 11:57:58'),
(42, 10, '2025-01-15', 'Дрессировка', 'Учим команду \"апорт\"', '2026-04-25 11:57:58'),
(43, 12, '2026-05-16', 'Вес', '32', '2026-05-03 14:27:10');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `avatar`, `created_at`) VALUES
(1, 'Анна', 'anna@mail.ru', '+7 (900) 123-45-67', '202cb962ac59075b964b07152d234b70', NULL, '2026-04-25 11:18:55'),
(2, 'Мария Петрова', 'maria@mail.ru', '+7 (900) 222-33-44', '202cb962ac59075b964b07152d234b70', NULL, '2026-04-25 11:57:58'),
(3, 'Дмитрий Сидоров', 'dmitry@mail.ru', '+7 (900) 333-44-55', '202cb962ac59075b964b07152d234b70', NULL, '2026-04-25 11:57:58'),
(4, 'Елена Кузнецова', 'elena@mail.ru', '+7 (900) 444-55-66', '202cb962ac59075b964b07152d234b70', NULL, '2026-04-25 11:57:58'),
(5, 'Сергей Васильев', 'sergey@mail.ru', '+7 (900) 555-66-77', '202cb962ac59075b964b07152d234b70', NULL, '2026-04-25 11:57:58'),
(6, 'Aysena Borisova', 'aysenaborisova159@gmail.com', '89142792393', '827ccb0eea8a706c4c34a16891f84e7b', 'uploads/1777119203_default-avatar.jpg', '2026-04-25 12:06:21'),
(7, 'айсена', 'aysenaborisova144@gmail.com', '2345364758', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-01 15:33:40'),
(8, 'айсена', 'aysena@email.com', '123245434', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-03 14:11:41'),
(9, 'aysena', 'aysena@email.ru', '8912254832', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-03 14:22:29'),
(10, 'aysena', 'aysena12@email.ru', '899123423', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-03 14:25:01'),
(11, 'aysena', 'aysena123@email.ru', '8992124543', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-03 14:26:10'),
(12, 'aysena', 'aysena@mail.ru', '899123533', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-03 14:28:24'),
(13, 'aysena1', 'aysena1@mail.ru', '890921325', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-03 14:29:53'),
(14, 'aysena', 'aysena1231@email.ru', '8901324355', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-03 14:31:42'),
(15, 'aysena', 'aysena781@email.ru', '899013243', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-03 14:32:48'),
(16, 'aysena', 'aysena000@email.ru', '899123424', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-03 14:42:52'),
(17, 'aysena', 'aysena011@email.ru', '89912341', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-03 14:44:22'),
(18, 'aysena', 'aysena012@email.ru', '891346783921', '202cb962ac59075b964b07152d234b70', NULL, '2026-05-03 14:45:49');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pets_users` (`user_id`);

--
-- Индексы таблицы `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_records_pets` (`pet_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `fk_pets_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `fk_records_pets` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
