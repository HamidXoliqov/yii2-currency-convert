-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 09 2021 г., 16:03
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `convert_crypto`
--

-- --------------------------------------------------------

--
-- Структура таблицы `crypto_currency`
--

CREATE TABLE `crypto_currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `crypto_currency`
--

INSERT INTO `crypto_currency` (`id`, `name`, `short_name`, `title`, `date`) VALUES
(1, 'USD', 'BTC', 'Bitcoin', 1610197368),
(2, 'USD', 'ETH', 'Ethereum', 1610197368),
(3, 'USD', 'ZEC', 'ZCash', 1610197368),
(4, 'USD', 'LTC', 'Litecoin', 1610197368);

-- --------------------------------------------------------

--
-- Структура таблицы `crypto_currency_rate`
--

CREATE TABLE `crypto_currency_rate` (
  `id` int(11) NOT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `old_rate` float DEFAULT NULL,
  `date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `crypto_currency_rate`
--

INSERT INTO `crypto_currency_rate` (`id`, `currency_id`, `rate`, `old_rate`, `date`) VALUES
(1, 1, 40992.8, 40992.8, 1610197368),
(2, 2, 1225.75, 1225.75, 1610197368),
(3, 3, 71.76, 71.76, 1610197368),
(4, 4, 170.44, 170.44, 1610197368),
(5, 1, 40990.6, 40992.8, 1610197376),
(6, 2, 1225.8, 1225.75, 1610197376),
(7, 3, 71.81, 71.76, 1610197376),
(8, 4, 170.45, 170.44, 1610197376);

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `name`, `short_name`, `title`, `date`) VALUES
(1, 'EUR', 'CAD', 'CAD', 1610197372),
(2, 'EUR', 'CHF', 'CHF', 1610197372),
(3, 'EUR', 'RUB', 'RUB', 1610197372),
(4, 'EUR', 'USD', 'USD', 1610197372),
(5, 'EUR', 'GBP', 'GBP', 1610197372);

-- --------------------------------------------------------

--
-- Структура таблицы `currency_rate`
--

CREATE TABLE `currency_rate` (
  `id` int(11) NOT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `old_rate` float DEFAULT NULL,
  `date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `currency_rate`
--

INSERT INTO `currency_rate` (`id`, `currency_id`, `rate`, `old_rate`, `date`) VALUES
(1, 1, 1.5543, 1.5543, 1610197372),
(2, 2, 1.0827, 1.0827, 1610197372),
(3, 3, 90.8, 90.8, 1610197372),
(4, 4, 1.225, 1.225, 1610197372),
(5, 5, 0.90128, 0.90128, 1610197372),
(6, 1, 1.5543, 1.5543, 1610197379),
(7, 2, 1.0827, 1.0827, 1610197379),
(8, 3, 90.8, 90.8, 1610197379),
(9, 4, 1.225, 1.225, 1610197379),
(10, 5, 0.90128, 0.90128, 1610197379);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1610029117),
('m210107_142119_create_crypto_currency_table', 1610029642),
('m210107_142130_create_crypto_currency_rate_table', 1610029643),
('m210109_064846_create_currency_table', 1610175013),
('m210109_064855_create_currency_rate_table', 1610175013);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `crypto_currency`
--
ALTER TABLE `crypto_currency`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `crypto_currency_rate`
--
ALTER TABLE `crypto_currency_rate`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `currency_rate`
--
ALTER TABLE `currency_rate`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `crypto_currency`
--
ALTER TABLE `crypto_currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `crypto_currency_rate`
--
ALTER TABLE `crypto_currency_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `currency_rate`
--
ALTER TABLE `currency_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
