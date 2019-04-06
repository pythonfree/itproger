-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 06 2019 г., 19:53
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `atext` text NOT NULL,
  `adate` bigint(20) UNSIGNED NOT NULL,
  `avtor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `intro`, `atext`, `adate`, `avtor`) VALUES
(2, 'Заголовок первой статьи111111111111111111', 'Интро первой статьи1111111111111111111111', 'Текст первой статьи111111111111111111', 1554490125, 'pythonfree'),
(3, '2222222222222222222222222222222222', '2222222222222222222222222222222222', '2222222222222222222222222222222', 1554491360, 'pythonfree'),
(4, 'Convert timestamp to readable date/time PHP', 'I have a timestamp stored in a session (1299446702).\n\nHow can I convert that to a readable date/time in PHP? I have tried srttotime, etc. to no avail.', 'Use PHP&#39;s date() function.\n\nExample:\n\necho date(&#39;m/d/Y&#39;, 1299446702);', 1554538397, 'pythonfree'),
(5, 'Футболисты отпраздновали гол групповым селфи и сразу пропустили в свои ворота', 'Футболисты отпраздновали гол групповым селфи и сразу пропустили в свои ворота', 'Футболисты марокканского клуба «Юсуфия Беррешид» отпраздновали гол, забитый в ворота команды «Мулудия Уджа», групповым селфи, после чего сразу же пропустили мяч в свои ворота. Видео опубликовано на портале Sportbible.com.\n\nВ составе «Юсуфия Беррешид» отличился Мохаммед аль Факих, забросив мяч за спину вратарю соперника. После этого он предложил партнерам и тренерам сделать фотографию, однако это заняло слишком много времени, о чем их предупредил судья.\n\nИгроки «Юсуфия Беррешид» начали возвращаться на поле, однако арбитр внезапно позволил футболистам «Мулудия Уджа» возобновить матч.\n\nВ итоге соперники убежали в атаку с центра поля, заработали пенальти и забили.\n\nЕще больше интересного в нашем Instagram. Подпишись!', 1554539336, 'ilko'),
(6, 'Интересные факты', 'sicing elit. Delectus dolorem fugit illo itaque magni minima modi quaerat quam quidem voluptatum. Consectetur consequatur cons', 'sicing elit. Delectus dolorem fugit illo itaque magni minima modi quaerat quam quidem voluptatum. Consectetur consequatur cons', 1554539432, 'ilko'),
(7, 'Интересные факты', 'Интересные факты', 'dipisicing elit. Delectus dolorem fugit illo itaque magni minima modi quaerat quam quidem voluptatum. Consectetur consequatur conseq', 1554539501, 'ilko'),
(8, 'ересные факты', 'elit. Delectus dolorem fugit illo itaque magni minima modi quaerat quam quidem voluptatum. Consectetur consequatur consequuntur delectus error minima quam sapien', 'elit. Delectus dolorem fugit illo itaque magni minima modi quaerat quam quidem voluptatum. Consectetur consequatur consequuntur delectus error minima quam sapien', 1554539683, 'pythonfree'),
(9, 'Интересные факты', 'Интересные факты', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dolorem fugit illo itaque magni minima modi quaerat quam quidem voluptatum. Consectetur consequatur consequuntur delectus error minima quam sapiente soluta sunt!', 1554546181, 'pythonfree');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kname` varchar(100) NOT NULL,
  `mess` text NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `kname`, `mess`, `article_id`) VALUES
(1, '2222222222222222222222222', 'yjtyjtyjtyjtyjtyjtyj', 7),
(2, '2222222222222222222222222', 'yjtyjtyjtyjtyjtyjtyj', 7),
(3, '2222222222222222222222222', 'yjtyjtyjtyjtyjtyjtyj', 7),
(4, '2222222222222222222222222', 'yjtyjtyjtyjtyjtyjtyj', 7),
(5, '2222222222222222222222222', 'yjtyjtyjtyjtyjtyjtyj', 7),
(6, '2222222222222222222222222', 'yjtyjtyjtyjtyjtyjtyj', 7),
(7, '2222222222222222222222222', 'yjtyjtyjtyjtyjtyjtyj', 7),
(8, 'pythonfree', 'Оччень интересные факты)))', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `pass`) VALUES
(6, 'pythonfree', '79115839983@ya.ru', 'pythonfree', '$2y$10$ub1nnKt2E2MVW1w.u8bbzO0RES0hJsiirbCd.FJ/i/nUG04Lp4RDW'),
(7, 'ilko', '79115839983@ya.ru', 'ilko', '$2y$10$MDugmCpYUI5LLsAcN/4pd.PTXsaQbWMu.CXzyQbU.unfecLWjAMBu');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
