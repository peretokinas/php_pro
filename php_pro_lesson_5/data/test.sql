-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Дек 12 2020 г., 11:01
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Еда', 'То, что можно есть'),
(2, 'Вода', 'То, то можно пить'),
(3, 'Шмотки', 'То, что можно надевать');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `header` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `header`, `article`, `create_at`) VALUES
(1, 'Минобороны заявило об информационной кампании против российской вакцины от COVID-19', 'Минобороны известно о финансируемой из-за рубежа информационной кампании против российской вакцины от коронавируса, заявил журналистам официальный представитель ведомства генерал-майор Игорь Конашенков. Российская разработка отличается высокой эффективностью, а «информационный саботаж» против нее не повысит «целительность» зарубежных аналогов, добавил господин Конашенков.\r\n\r\n«Нам детально известно, какие сегодня средства и ресурсы брошены из-за рубежа на дискредитацию в мире и в России отечественной вакцины… В социальных сетях и финансируемых на зарубежные гранты русскоязычных интернет-ресурсах готовится серия псевдоаналитических \"расследований\" и лжесвидетельств \"очевидцев\" о якобы опасности российской вакцины или поголовных \"отказах\" от вакцинирования, в том числе и в Вооруженных силах РФ»,— сообщил официальный представитель Минобороны России (цитата по ТАСС).', '2020-12-11 10:22:26'),
(2, 'Врачи предостерегли россиян от ношения маски на улице в мороз\r\n\r\n', 'Врачи предостерегли россиян от ношения маски на улице в мороз. Они рассказали РИА Новости, что защитная маска на улице нужна только там, где есть большое скопление людей.\r\n\r\nВ остальных случаях надевать маску не стоит, так как она быстро намокает и охлаждается.\r\n\r\nВрач-инфекционист научно-клинического отдела Московского городского Центра профилактики и борьбы со СПИДом департамента здравоохранения столицы Елена Белова напомнила, что человек надевает маску, чтобы защититься, находясь среди людей.', '2020-12-11 10:22:26');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `number` int(11) NOT NULL,
  `status` enum('new','checked','not paid','paid','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `ttlPrice` int(11) NOT NULL,
  `ttlQty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `createAt`, `number`, `status`, `ttlPrice`, `ttlQty`) VALUES
(1, '2020-12-07 22:07:01', 123, 'not paid', 900, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Чай', 'Цейлонский', 22),
(2, 'Пицца', 'Пепперони', 43),
(3, 'Одежда', 'Брендовая', 1122),
(4, 'Бухгалер', 'Из Сызрани', 125),
(5, 'Апельсин', 'Гондурасский', 89),
(6, 'Апельсин', 'Марокканский', 123),
(7, 'Макак', 'Африканский', 125),
(8, 'Абрикос', 'На юге рос', 125),
(9, 'Котлета', 'По-киевски', 70),
(10, 'Пиво', 'Пшеничное', 90);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'admin', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
