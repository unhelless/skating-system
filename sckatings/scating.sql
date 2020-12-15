-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 15 2020 г., 09:47
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `scating`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name_group` varchar(60) DEFAULT NULL,
  `id_participant` varchar(255) NOT NULL,
  `class` varchar(2) NOT NULL,
  `otherclass` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name_group`, `id_participant`, `class`, `otherclass`) VALUES
(1, 'Class_A_Cat_Grownup-2_Othcls_Close', 'OOI', 'A', 'ЗК'),
(2, 'Class_A_Cat_Grownup-2_Othcls_Close', 'OS', 'A', 'ЗК'),
(3, 'Class_A_Cat_Grownup-2_Othcls_Close', 'OZ', 'A', 'ЗК'),
(4, 'Class_D_Cat_Youth_Othcls_Close', 'WQA', 'D', 'ЗК'),
(5, 'Class_D_Cat_Youth_Othcls_Close', 'QQA', 'D', 'ЗК'),
(6, 'Class_D_Cat_Youth_Othcls_Close', 'AS', 'D', 'ЗК'),
(7, 'Class_D_Cat_Youth_Othcls_Close', 'ASS', 'D', 'ЗК'),
(8, 'Class_D_Cat_Youth_Othcls_Close', 'AS1', 'D', 'ЗК'),
(9, 'Class_D_Cat_Youth_Othcls_Close', 'US1', 'D', 'ЗК'),
(11, 'Class_C_Cat_Kids-1_Othcls_Close', 'UU', 'C', 'ЗК'),
(12, 'Class_C_Cat_Kids-1_Othcls_Close', 'OYT', 'C', 'ЗК'),
(13, 'Class_C_Cat_Kids-1_Othcls_Close', 'POI', 'C', 'ЗК'),
(20, 'Class_A_Cat_Kids-1_Othcls_Close', 'STT', 'A', 'ЗК'),
(21, 'Class_A_Cat_Kids-1_Othcls_Close', 'TRE', 'A', 'ЗК'),
(22, 'Class_A_Cat_Kids-1_Othcls_Close', 'T1E', 'A', 'ЗК'),
(23, 'Class_E_Cat_Kids-2_Othcls_Close', 'MWQ', 'E', 'ЗК'),
(24, 'Class_E_Cat_Kids-2_Othcls_Close', 'M1Q', 'E', 'ЗК');

-- --------------------------------------------------------

--
-- Структура таблицы `judiciary`
--

CREATE TABLE `judiciary` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `number` varchar(1) NOT NULL,
  `cookie` varchar(32) DEFAULT NULL,
  `priority` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `judiciary`
--

INSERT INTO `judiciary` (`id`, `name`, `pass`, `number`, `cookie`, `priority`) VALUES
(1, 'Владислав', 'wanted123', 'A', NULL, 1),
(2, '1', '2', 'B', NULL, 0),
(3, 'Иван', 'iv1245', 'C', NULL, 0),
(4, 'Юлия', 'yusc', 'D', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `id_participant` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(11) NOT NULL,
  `categoriy` varchar(255) NOT NULL,
  `main_class` varchar(3) NOT NULL,
  `other_class` varchar(3) DEFAULT 'ЗК'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `participants`
--

INSERT INTO `participants` (`id`, `id_participant`, `name`, `age`, `categoriy`, `main_class`, `other_class`) VALUES
(1, 'RER', 'Османова Нина Николаева', '24', 'Взрослая-1', 'A', 'ЗК'),
(2, 'RE1', 'Кукорина Анна Ивановна', '24', 'Взрослая-1', 'A', 'ЗК'),
(3, 'RQ', 'Резинова Зина Павловна', '24', 'Взрослая-1', 'A', 'ЗК'),
(5, 'WW', 'Уругвай Милена Валерьевич', '14', 'Юниоры-2', 'E', 'ЗК'),
(6, 'W1', 'Рябова Виталина Борисовна', '14', 'Юниоры-2', 'E', 'ЗК'),
(7, 'WQQ', 'Ильина Селина Митрофановна', '14', 'Юниоры-2', 'E', 'ЗК'),
(8, 'WQA', 'Киселева Ирина Анатольевна', '18', 'Молодежь', 'D', 'ЗК'),
(9, 'QQA', 'Морозова Нора Макаровна', '18', 'Молодежь', 'D', 'ЗК'),
(10, 'AS', 'Васильева Беатриса Фелисовна', '18', 'Молодежь', 'D', 'ЗК'),
(12, 'ASS', 'Данилова Лада Иривнеева', '16', 'Молодежь', 'D', 'ЗК'),
(13, 'AS1', 'Ильина Ангелина Наумовна', '17', 'Молодежь', 'D', 'ЗК'),
(14, 'US1', 'Матвеева Семона Лаврентьевна', '17', 'Молодежь', 'D', 'ЗК'),
(15, 'US', 'Ковалева Марта Германовна', '24', 'Взрослая-1', 'B', 'ЗК'),
(16, 'UW', 'Комисарова Оксинья Иванова', '24', 'Взрослая-1', 'B', 'ЗК'),
(17, 'ZZ', 'Веселова Мила Даниловна', '24', 'Взрослая-1', 'B', 'ЗК'),
(18, 'OOI', 'Тулова Эвелина Дмитриевна', '29', 'Взрослая-2', 'A', 'ЗК'),
(19, 'OS', 'Шарахова Изабелла Эльдаровна', '29', 'Взрослая-2', 'A', 'ЗК'),
(20, 'OZ', 'Хамичева Милита Артемовна', '29', 'Взрослая-2', 'A', 'ЗК'),
(21, 'II', 'Петухова Ландыш Парфенова', '5', 'Бэби-2', 'ШбТ', 'ЗК'),
(22, 'IA', 'Никонова Ляля Геннадьевна', '5', 'Бэби-2', 'ШбТ', 'ЗК'),
(23, 'SRT', 'Цветкова Леонина Витальевна', '5', 'Бэби-2', 'ШбТ', 'ЗК'),
(25, 'STT', 'Моисеева Гергинья Михайловна', '9', 'Дети-1', 'A', 'ЗК'),
(26, 'TRE', 'Тетерина Эвелина Филаповна', '9', 'Дети-1', 'A', 'ЗК'),
(27, 'T1E', 'Исеева Залина Олеговна', '9', 'Дети-1', 'A', 'ЗК'),
(28, 'UU', 'Шараповна Виктория Эльдаровна', '9', 'Дети-1', 'C', 'ЗК'),
(29, 'OYT', 'Кулагина Милена Филиповна', '9', 'Дети-1', 'C', 'ЗК'),
(30, 'POI', 'Брагина Романа Антониновна', '9', 'Дети-1', 'C', 'ЗК'),
(32, 'MWQ', 'Лебедева Вера Николаевна', '11', 'Дети-2', 'E', 'ЗК'),
(33, 'M1Q', 'Соболева Магда Антоновна', '11', 'Дети-2', 'E', 'ЗК'),
(34, 'M11', 'Куликова Ильмира Валерьяновна', '11', 'Дети-2', 'D', 'ЗК');

-- --------------------------------------------------------

--
-- Структура таблицы `result_1_2`
--

CREATE TABLE `result_1_2` (
  `id` int(11) NOT NULL,
  `id_part` varchar(60) NOT NULL,
  `class` varchar(4) DEFAULT NULL,
  `otherclass` varchar(4) DEFAULT NULL,
  `dance_1` varchar(10) DEFAULT NULL,
  `count_1` int(11) DEFAULT 0,
  `dance_2` varchar(10) DEFAULT NULL,
  `count_2` int(11) DEFAULT 0,
  `dance_3` varchar(10) DEFAULT NULL,
  `count_3` int(11) DEFAULT 0,
  `dance_4` varchar(10) DEFAULT NULL,
  `count_4` int(11) DEFAULT 0,
  `dance_5` varchar(10) DEFAULT NULL,
  `count_5` int(11) DEFAULT 0,
  `fullcount` int(11) DEFAULT 0,
  `conclusion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `result_1_2`
--

INSERT INTO `result_1_2` (`id`, `id_part`, `class`, `otherclass`, `dance_1`, `count_1`, `dance_2`, `count_2`, `dance_3`, `count_3`, `dance_4`, `count_4`, `dance_5`, `count_5`, `fullcount`, `conclusion`) VALUES
(1, 'OOI', 'A', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 0, 'джайв', 1, 'пасадобль', 1, 4, 'прошел'),
(2, 'OS', 'A', 'ЗК', 'ча-ча-ча', 1, 'самба', 0, 'румба', 1, 'джайв', 1, 'пасадобль', 0, 3, 'прошел'),
(3, 'OZ', 'A', 'ЗК', 'ча-ча-ча', 1, 'самба', 0, 'румба', 0, 'джайв', 1, 'пасадобль', 0, 2, 'прошел'),
(4, 'WQA', 'D', 'ЗК', 'ча-ча-ча', 1, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 1, 'прошел'),
(5, 'QQA', 'D', 'ЗК', 'ча-ча-ча', 0, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 0, '0'),
(6, 'AS', 'D', 'ЗК', 'ча-ча-ча', 1, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 1, 'прошел'),
(7, 'ASS', 'D', 'ЗК', 'ча-ча-ча', 0, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 0, '0'),
(8, 'AS1', 'D', 'ЗК', 'ча-ча-ча', 1, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 1, 'прошел'),
(9, 'US1', 'D', 'ЗК', 'ча-ча-ча', 0, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 0, '0'),
(13, 'POI', 'C', 'ЗК', 'ча-ча-ча', 0, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 0, '0'),
(17, 'STT', 'A', 'ЗК', 'ча-ча-ча', 0, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 0, '0'),
(18, 'TRE', 'A', 'ЗК', 'ча-ча-ча', 0, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 0, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `result_1_4`
--

CREATE TABLE `result_1_4` (
  `id` int(11) NOT NULL,
  `id_part` varchar(60) NOT NULL,
  `class` varchar(4) DEFAULT NULL,
  `otherclass` varchar(4) DEFAULT NULL,
  `dance_1` varchar(10) DEFAULT NULL,
  `count_1` int(11) DEFAULT 0,
  `dance_2` varchar(10) DEFAULT NULL,
  `count_2` int(11) DEFAULT 0,
  `dance_3` varchar(10) DEFAULT NULL,
  `count_3` int(11) DEFAULT 0,
  `dance_4` varchar(10) DEFAULT NULL,
  `count_4` int(11) DEFAULT 0,
  `dance_5` varchar(10) DEFAULT NULL,
  `count_5` int(11) DEFAULT 0,
  `fullcount` int(11) DEFAULT 0,
  `conclusion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Структура таблицы `result_1_8`
--

CREATE TABLE `result_1_8` (
  `id` int(11) NOT NULL,
  `id_part` varchar(60) NOT NULL,
  `class` varchar(4) DEFAULT NULL,
  `otherclass` varchar(4) DEFAULT NULL,
  `dance_1` varchar(10) DEFAULT NULL,
  `count_1` int(11) DEFAULT 0,
  `dance_2` varchar(10) DEFAULT NULL,
  `count_2` int(11) DEFAULT 0,
  `dance_3` varchar(10) DEFAULT NULL,
  `count_3` int(11) DEFAULT 0,
  `dance_4` varchar(10) DEFAULT NULL,
  `count_4` int(11) DEFAULT 0,
  `dance_5` varchar(10) DEFAULT NULL,
  `count_5` int(11) DEFAULT 0,
  `fullcount` int(11) DEFAULT 0,
  `conclusion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `result_1_8`
--

INSERT INTO `result_1_8` (`id`, `id_part`, `class`, `otherclass`, `dance_1`, `count_1`, `dance_2`, `count_2`, `dance_3`, `count_3`, `dance_4`, `count_4`, `dance_5`, `count_5`, `fullcount`, `conclusion`) VALUES
(1, 'OOI', 'A', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 0, 'джайв', 1, 'пасадобль', 0, 3, 'прошел'),
(2, 'OS', 'A', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 1, 'джайв', 1, 'пасадобль', 1, 5, 'прошел'),
(3, 'OZ', 'A', 'ЗК', 'ча-ча-ча', 1, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 1, 'прошел'),
(4, 'WQA', 'D', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 2, 'прошел'),
(5, 'QQA', 'D', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 1, 'джайв', 1, 'пасадобль', 0, 4, 'прошел'),
(6, 'AS', 'D', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 0, 'джайв', 1, 'пасадобль', 0, 3, 'прошел'),
(7, 'ASS', 'D', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 1, 'джайв', 1, 'пасадобль', 0, 4, 'прошел'),
(8, 'AS1', 'D', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 0, 'джайв', 1, 'пасадобль', 0, 3, 'прошел'),
(9, 'US1', 'D', 'ЗК', 'ча-ча-ча', 1, 'самба', 0, 'румба', 1, 'джайв', 1, 'пасадобль', 0, 3, 'прошел'),
(11, 'UU', 'C', 'ЗК', 'ча-ча-ча', 1, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 1, 2, 'прошел'),
(12, 'OYT', 'C', 'ЗК', 'ча-ча-ча', 0, 'самба', 0, 'румба', 1, 'джайв', 0, 'пасадобль', 1, 2, 'прошел'),
(13, 'POI', 'C', 'ЗК', 'ча-ча-ча', 1, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 1, 2, 'прошел'),
(17, 'STT', 'A', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 0, 'джайв', 1, 'пасадобль', 0, 3, 'прошел'),
(18, 'TRE', 'A', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 0, 'джайв', 1, 'пасадобль', 1, 4, 'прошел'),
(19, 'T1E', 'A', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 0, 'джайв', 0, 'пасадобль', 1, 3, 'прошел'),
(43, 'MWQ', 'E', 'ЗК', 'ча-ча-ча', 1, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 1, 'прошел'),
(44, 'M1Q', 'E', 'ЗК', 'ча-ча-ча', 1, 'самба', 0, 'румба', 0, 'джайв', 0, 'пасадобль', 0, 1, 'прошел');

-- --------------------------------------------------------

--
-- Структура таблицы `result_final`
--

CREATE TABLE `result_final` (
  `id` int(11) NOT NULL,
  `id_part` varchar(60) NOT NULL,
  `class` varchar(4) DEFAULT NULL,
  `otherclass` varchar(4) DEFAULT NULL,
  `dance_1` varchar(10) DEFAULT NULL,
  `count_1` int(11) DEFAULT 0,
  `dance_2` varchar(10) DEFAULT NULL,
  `count_2` int(11) DEFAULT 0,
  `dance_3` varchar(10) DEFAULT NULL,
  `count_3` int(11) DEFAULT 0,
  `dance_4` varchar(10) DEFAULT NULL,
  `count_4` int(11) DEFAULT 0,
  `dance_5` varchar(10) DEFAULT NULL,
  `count_5` int(11) DEFAULT 0,
  `fullcount` int(11) DEFAULT 0,
  `conclusion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `result_final`
--

INSERT INTO `result_final` (`id`, `id_part`, `class`, `otherclass`, `dance_1`, `count_1`, `dance_2`, `count_2`, `dance_3`, `count_3`, `dance_4`, `count_4`, `dance_5`, `count_5`, `fullcount`, `conclusion`) VALUES
(1, 'OOI', 'A', 'ЗК', 'ча-ча-ча', 1, 'самба', 1, 'румба', 1, 'джайв', 1, 'пасадобль', 1, 5, '1'),
(2, 'OS', 'A', 'ЗК', 'ча-ча-ча', 6, 'самба', 6, 'румба', 6, 'джайв', 6, 'пасадобль', 6, 30, '6'),
(3, 'OZ', 'A', 'ЗК', 'ча-ча-ча', 2, 'самба', 2, 'румба', 2, 'джайв', 2, 'пасадобль', 2, 10, '2'),
(4, 'WQA', 'D', 'ЗК', 'ча-ча-ча', 3, 'самба', 3, 'румба', 3, 'джайв', 3, 'пасадобль', 3, 15, '3'),
(6, 'AS', 'D', 'ЗК', 'ча-ча-ча', 4, 'самба', 5, 'румба', 4, 'джайв', 4, 'пасадобль', 4, 21, '4'),
(8, 'AS1', 'D', 'ЗК', 'ча-ча-ча', 5, 'самба', 4, 'румба', 5, 'джайв', 5, 'пасадобль', 5, 24, '5');

-- --------------------------------------------------------

--
-- Структура таблицы `stage_1_2`
--

CREATE TABLE `stage_1_2` (
  `id` int(11) NOT NULL,
  `id_part` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dance` varchar(10) NOT NULL,
  `id_group` varchar(60) NOT NULL,
  `A` varchar(2) DEFAULT '-',
  `B` varchar(2) DEFAULT '-',
  `C` varchar(2) DEFAULT '-',
  `D` varchar(2) DEFAULT '-',
  `E` varchar(2) DEFAULT '-',
  `count` int(11) DEFAULT 0,
  `result` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `stage_1_2`
--

INSERT INTO `stage_1_2` (`id`, `id_part`, `name`, `dance`, `id_group`, `A`, `B`, `C`, `D`, `E`, `count`, `result`) VALUES
(1, 'OOI', 'Тулова Эвелина Дмитриевна', 'ча-ча-ча', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(2, 'OOI', 'Тулова Эвелина Дмитриевна', 'самба', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(3, 'OOI', 'Тулова Эвелина Дмитриевна', 'румба', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(4, 'OOI', 'Тулова Эвелина Дмитриевна', 'джайв', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(5, 'OOI', 'Тулова Эвелина Дмитриевна', 'пасадобль', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(6, 'OS', 'Шарахова Изабелла Эльдаровна', 'ча-ча-ча', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(7, 'OS', 'Шарахова Изабелла Эльдаровна', 'самба', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(8, 'OS', 'Шарахова Изабелла Эльдаровна', 'румба', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(9, 'OS', 'Шарахова Изабелла Эльдаровна', 'джайв', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(10, 'OS', 'Шарахова Изабелла Эльдаровна', 'пасадобль', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(11, 'OZ', 'Хамичева Милита Артемовна', 'ча-ча-ча', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(12, 'OZ', 'Хамичева Милита Артемовна', 'самба', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(13, 'OZ', 'Хамичева Милита Артемовна', 'румба', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(14, 'OZ', 'Хамичева Милита Артемовна', 'джайв', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(15, 'OZ', 'Хамичева Милита Артемовна', 'пасадобль', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(16, 'WQA', 'Киселева Ирина Анатольевна', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(17, 'WQA', 'Киселева Ирина Анатольевна', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(18, 'WQA', 'Киселева Ирина Анатольевна', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(19, 'WQA', 'Киселева Ирина Анатольевна', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(20, 'QQA', 'Морозова Нора Макаровна', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(21, 'QQA', 'Морозова Нора Макаровна', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(22, 'QQA', 'Морозова Нора Макаровна', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(23, 'QQA', 'Морозова Нора Макаровна', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(24, 'AS', 'Васильева Беатриса Фелисовна', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(25, 'AS', 'Васильева Беатриса Фелисовна', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(26, 'AS', 'Васильева Беатриса Фелисовна', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(27, 'AS', 'Васильева Беатриса Фелисовна', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(28, 'ASS', 'Данилова Лада Иривнеева', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(29, 'ASS', 'Данилова Лада Иривнеева', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(30, 'ASS', 'Данилова Лада Иривнеева', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(31, 'ASS', 'Данилова Лада Иривнеева', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(32, 'AS1', 'Ильина Ангелина Наумовна', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(33, 'AS1', 'Ильина Ангелина Наумовна', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(34, 'AS1', 'Ильина Ангелина Наумовна', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(35, 'AS1', 'Ильина Ангелина Наумовна', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(36, 'US1', 'Матвеева Семона Лаврентьевна', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(37, 'US1', 'Матвеева Семона Лаврентьевна', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(38, 'US1', 'Матвеева Семона Лаврентьевна', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(39, 'US1', 'Матвеева Семона Лаврентьевна', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(50, 'POI', 'Брагина Романа Антониновна', 'ча-ча-ча', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(51, 'POI', 'Брагина Романа Антониновна', 'самба', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(52, 'POI', 'Брагина Романа Антониновна', 'румба', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(53, 'POI', 'Брагина Романа Антониновна', 'джайв', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(54, 'POI', 'Брагина Романа Антониновна', 'пасадобль', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(55, 'STT', 'Моисеева Гергинья Михайловна', 'ча-ча-ча', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(56, 'STT', 'Моисеева Гергинья Михайловна', 'самба', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(57, 'STT', 'Моисеева Гергинья Михайловна', 'румба', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(58, 'STT', 'Моисеева Гергинья Михайловна', 'джайв', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(59, 'STT', 'Моисеева Гергинья Михайловна', 'пасадобль', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(60, 'TRE', 'Тетерина Эвелина Филаповна', 'ча-ча-ча', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(61, 'TRE', 'Тетерина Эвелина Филаповна', 'самба', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(62, 'TRE', 'Тетерина Эвелина Филаповна', 'румба', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(63, 'TRE', 'Тетерина Эвелина Филаповна', 'джайв', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0'),
(64, 'TRE', 'Тетерина Эвелина Филаповна', 'пасадобль', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `stage_1_4`
--

CREATE TABLE `stage_1_4` (
  `id` int(11) NOT NULL,
  `id_part` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dance` varchar(10) NOT NULL,
  `id_group` varchar(60) NOT NULL,
  `A` varchar(2) DEFAULT '-',
  `B` varchar(2) DEFAULT '-',
  `C` varchar(2) DEFAULT '-',
  `D` varchar(2) DEFAULT '-',
  `E` varchar(2) DEFAULT '-',
  `count` int(11) DEFAULT 0,
  `result` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Структура таблицы `stage_1_8`
--

CREATE TABLE `stage_1_8` (
  `id` int(11) NOT NULL,
  `id_part` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dance` varchar(10) NOT NULL,
  `id_group` varchar(60) NOT NULL,
  `A` varchar(2) DEFAULT '-',
  `B` varchar(2) DEFAULT '-',
  `C` varchar(2) DEFAULT '-',
  `D` varchar(2) DEFAULT '-',
  `E` varchar(2) DEFAULT '-',
  `count` int(11) DEFAULT 0,
  `result` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `stage_1_8`
--

INSERT INTO `stage_1_8` (`id`, `id_part`, `name`, `dance`, `id_group`, `A`, `B`, `C`, `D`, `E`, `count`, `result`) VALUES
(1, 'OOI', 'Тулова Эвелина Дмитриевна', 'ча-ча-ча', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(2, 'OOI', 'Тулова Эвелина Дмитриевна', 'самба', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(3, 'OOI', 'Тулова Эвелина Дмитриевна', 'румба', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(4, 'OOI', 'Тулова Эвелина Дмитриевна', 'джайв', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(5, 'OOI', 'Тулова Эвелина Дмитриевна', 'пасадобль', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(6, 'OS', 'Шарахова Изабелла Эльдаровна', 'ча-ча-ча', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(7, 'OS', 'Шарахова Изабелла Эльдаровна', 'самба', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(8, 'OS', 'Шарахова Изабелла Эльдаровна', 'румба', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(9, 'OS', 'Шарахова Изабелла Эльдаровна', 'джайв', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(10, 'OS', 'Шарахова Изабелла Эльдаровна', 'пасадобль', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(11, 'OZ', 'Хамичева Милита Артемовна', 'ча-ча-ча', 'Class_A_Cat_Grownup-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(12, 'OZ', 'Хамичева Милита Артемовна', 'самба', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(13, 'OZ', 'Хамичева Милита Артемовна', 'румба', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(14, 'OZ', 'Хамичева Милита Артемовна', 'джайв', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(15, 'OZ', 'Хамичева Милита Артемовна', 'пасадобль', 'Class_A_Cat_Grownup-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(16, 'WQA', 'Киселева Ирина Анатольевна', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(17, 'WQA', 'Киселева Ирина Анатольевна', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(18, 'WQA', 'Киселева Ирина Анатольевна', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(19, 'WQA', 'Киселева Ирина Анатольевна', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(20, 'QQA', 'Морозова Нора Макаровна', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(21, 'QQA', 'Морозова Нора Макаровна', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(22, 'QQA', 'Морозова Нора Макаровна', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(23, 'QQA', 'Морозова Нора Макаровна', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(24, 'AS', 'Васильева Беатриса Фелисовна', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(25, 'AS', 'Васильева Беатриса Фелисовна', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(26, 'AS', 'Васильева Беатриса Фелисовна', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(27, 'AS', 'Васильева Беатриса Фелисовна', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(28, 'ASS', 'Данилова Лада Иривнеева', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(29, 'ASS', 'Данилова Лада Иривнеева', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(30, 'ASS', 'Данилова Лада Иривнеева', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(31, 'ASS', 'Данилова Лада Иривнеева', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(32, 'AS1', 'Ильина Ангелина Наумовна', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(33, 'AS1', 'Ильина Ангелина Наумовна', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(34, 'AS1', 'Ильина Ангелина Наумовна', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(35, 'AS1', 'Ильина Ангелина Наумовна', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(36, 'US1', 'Матвеева Семона Лаврентьевна', 'ча-ча-ча', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(37, 'US1', 'Матвеева Семона Лаврентьевна', 'самба', 'Class_D_Cat_Youth_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(38, 'US1', 'Матвеева Семона Лаврентьевна', 'румба', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(39, 'US1', 'Матвеева Семона Лаврентьевна', 'джайв', 'Class_D_Cat_Youth_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(40, 'UU', 'Шараповна Виктория Эльдаровна', 'ча-ча-ча', 'Class_C_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(41, 'UU', 'Шараповна Виктория Эльдаровна', 'самба', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(42, 'UU', 'Шараповна Виктория Эльдаровна', 'румба', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(43, 'UU', 'Шараповна Виктория Эльдаровна', 'джайв', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(44, 'UU', 'Шараповна Виктория Эльдаровна', 'пасадобль', 'Class_C_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(45, 'OYT', 'Кулагина Милена Филиповна', 'ча-ча-ча', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(46, 'OYT', 'Кулагина Милена Филиповна', 'самба', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(47, 'OYT', 'Кулагина Милена Филиповна', 'румба', 'Class_C_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(48, 'OYT', 'Кулагина Милена Филиповна', 'джайв', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(49, 'OYT', 'Кулагина Милена Филиповна', 'пасадобль', 'Class_C_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(50, 'POI', 'Брагина Романа Антониновна', 'ча-ча-ча', 'Class_C_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(51, 'POI', 'Брагина Романа Антониновна', 'самба', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(52, 'POI', 'Брагина Романа Антониновна', 'румба', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(53, 'POI', 'Брагина Романа Антониновна', 'джайв', 'Class_C_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(54, 'POI', 'Брагина Романа Антониновна', 'пасадобль', 'Class_C_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(55, 'STT', 'Моисеева Гергинья Михайловна', 'ча-ча-ча', 'Class_A_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(56, 'STT', 'Моисеева Гергинья Михайловна', 'самба', 'Class_A_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(57, 'STT', 'Моисеева Гергинья Михайловна', 'румба', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(58, 'STT', 'Моисеева Гергинья Михайловна', 'джайв', 'Class_A_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(59, 'STT', 'Моисеева Гергинья Михайловна', 'пасадобль', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(60, 'TRE', 'Тетерина Эвелина Филаповна', 'ча-ча-ча', 'Class_A_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(61, 'TRE', 'Тетерина Эвелина Филаповна', 'самба', 'Class_A_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(62, 'TRE', 'Тетерина Эвелина Филаповна', 'румба', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(63, 'TRE', 'Тетерина Эвелина Филаповна', 'джайв', 'Class_A_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(64, 'TRE', 'Тетерина Эвелина Филаповна', 'пасадобль', 'Class_A_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(65, 'T1E', 'Исеева Залина Олеговна', 'ча-ча-ча', 'Class_A_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(66, 'T1E', 'Исеева Залина Олеговна', 'самба', 'Class_A_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(67, 'T1E', 'Исеева Залина Олеговна', 'румба', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(68, 'T1E', 'Исеева Залина Олеговна', 'джайв', 'Class_A_Cat_Kids-1_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(69, 'T1E', 'Исеева Залина Олеговна', 'пасадобль', 'Class_A_Cat_Kids-1_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(100, 'MWQ', 'Лебедева Вера Николаевна', 'ча-ча-ча', 'Class_E_Cat_Kids-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(101, 'MWQ', 'Лебедева Вера Николаевна', 'самба', 'Class_E_Cat_Kids-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел'),
(102, 'M1Q', 'Соболева Магда Антоновна', 'ча-ча-ча', 'Class_E_Cat_Kids-2_Othcls_Close', '+', '-', '-', '-', '-', 1, 'прошел'),
(103, 'M1Q', 'Соболева Магда Антоновна', 'самба', 'Class_E_Cat_Kids-2_Othcls_Close', '-', '-', '-', '-', '-', 0, 'прошел');

-- --------------------------------------------------------

--
-- Структура таблицы `stage_final`
--

CREATE TABLE `stage_final` (
  `id` int(11) NOT NULL,
  `id_participant` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dance` varchar(10) NOT NULL,
  `A` int(11) DEFAULT NULL,
  `B` int(11) DEFAULT NULL,
  `C` int(11) DEFAULT NULL,
  `D` int(11) DEFAULT NULL,
  `E` int(11) DEFAULT NULL,
  `one` varchar(2) DEFAULT '0',
  `one_2` varchar(2) DEFAULT '0',
  `one_2_count` varchar(11) DEFAULT '0',
  `one_3` varchar(2) DEFAULT '0',
  `one_3_count` varchar(11) DEFAULT '0',
  `one_4` varchar(2) DEFAULT '0',
  `one_4_count` varchar(11) DEFAULT '0',
  `one_5` varchar(2) DEFAULT '0',
  `one_5_count` varchar(11) DEFAULT '0',
  `one_6` varchar(2) DEFAULT '0',
  `one_6_count` varchar(11) DEFAULT '0',
  `result` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `stage_final`
--

INSERT INTO `stage_final` (`id`, `id_participant`, `name`, `dance`, `A`, `B`, `C`, `D`, `E`, `one`, `one_2`, `one_2_count`, `one_3`, `one_3_count`, `one_4`, `one_4_count`, `one_5`, `one_5_count`, `one_6`, `one_6_count`, `result`) VALUES
(1, 'OOI', 'Тулова Эвелина Дмитриевна', 'ча-ча-ча', 1, 1, 1, 2, 3, '3', '1', '0', '1', '0', '', '0', '', '0', '', '0', '1'),
(2, 'OOI', 'Тулова Эвелина Дмитриевна', 'самба', 1, 1, 1, 1, 2, '4', '1', '0', '', '0', '', '0', '', '0', '', '0', '1'),
(3, 'OOI', 'Тулова Эвелина Дмитриевна', 'румба', 1, 1, 1, 1, 1, '5', '', '0', '', '0', '', '0', '', '0', '', '0', '1'),
(4, 'OOI', 'Тулова Эвелина Дмитриевна', 'джайв', 1, 1, 1, 1, 2, '4', '1', '0', '', '0', '', '0', '', '0', '', '0', '1'),
(5, 'OOI', 'Тулова Эвелина Дмитриевна', 'пасадобль', 1, 1, 1, 1, 1, '5', '', '0', '', '0', '', '0', '', '0', '', '0', '1'),
(6, 'OS', 'Шарахова Изабелла Эльдаровна', 'ча-ча-ча', 6, 6, 6, 6, 6, '', '', '0', '', '0', '', '0', '', '0', '5', '0', '6'),
(7, 'OS', 'Шарахова Изабелла Эльдаровна', 'самба', 6, 6, 6, 6, 6, '', '', '0', '', '0', '', '0', '', '0', '5', '0', '6'),
(8, 'OS', 'Шарахова Изабелла Эльдаровна', 'румба', 6, 6, 6, 6, 6, '', '', '0', '', '0', '', '0', '', '0', '5', '0', '6'),
(9, 'OS', 'Шарахова Изабелла Эльдаровна', 'джайв', 6, 6, 6, 6, 6, '', '', '0', '', '0', '', '0', '', '0', '5', '0', '6'),
(10, 'OS', 'Шарахова Изабелла Эльдаровна', 'пасадобль', 6, 6, 6, 6, 6, '', '', '0', '', '0', '', '0', '', '0', '5', '0', '6'),
(11, 'OZ', 'Хамичева Милита Артемовна', 'ча-ча-ча', 3, 2, 2, 1, 1, '2', '4', '6', '1', '', '', '', '', '', '', '', '2'),
(12, 'OZ', 'Хамичева Милита Артемовна', 'самба', 2, 2, 2, 2, 1, '1', '4', '0', '', '0', '', '0', '', '0', '', '0', '2'),
(13, 'OZ', 'Хамичева Милита Артемовна', 'румба', 2, 2, 3, 2, 2, '', '4', '0', '1', '0', '', '0', '', '0', '', '0', '2'),
(14, 'OZ', 'Хамичева Милита Артемовна', 'джайв', 2, 2, 2, 2, 2, '', '5', '0', '', '0', '', '0', '', '0', '', '0', '2'),
(15, 'OZ', 'Хамичева Милита Артемовна', 'пасадобль', 2, 2, 2, 2, 2, '', '5', '0', '', '0', '', '0', '', '0', '', '0', '2'),
(16, 'WQA', 'Киселева Ирина Анатольевна', 'ча-ча-ча', 2, 5, 5, 2, 2, '', '3', '0', '', '0', '', '0', '2', '0', '', '0', '3'),
(17, 'WQA', 'Киселева Ирина Анатольевна', 'самба', 3, 3, 3, 3, 3, '', '', '0', '5', '0', '', '0', '', '0', '', '0', '3'),
(18, 'WQA', 'Киселева Ирина Анатольевна', 'румба', 3, 5, 3, 5, 3, '', '', '0', '3', '0', '', '0', '2', '0', '', '0', '3'),
(19, 'WQA', 'Киселева Ирина Анатольевна', 'джайв', 3, 5, 3, 5, 3, '', '', '0', '3', '0', '', '0', '2', '0', '', '0', '3'),
(20, 'AS', 'Васильева Беатриса Фелисовна', 'ча-ча-ча', NULL, 3, 4, 5, 3, '', '', '', '2', '6', '3', '10', '1', '', '', '', '0'),
(21, 'AS', 'Васильева Беатриса Фелисовна', 'самба', 5, 4, 5, 1, 4, '1', '', '', '', '', '3', '9', '6', '23', '', '', '5'),
(22, 'AS', 'Васильева Беатриса Фелисовна', 'румба', 4, 4, 4, 5, 4, '', '', '0', '', '0', '4', '0', '1', '0', '', '0', '4'),
(23, 'AS', 'Васильева Беатриса Фелисовна', 'джайв', 4, 4, 4, 5, 4, '', '', '0', '', '0', '4', '0', '1', '0', '', '0', '4'),
(24, 'AS1', 'Ильина Ангелина Наумовна', 'ча-ча-ча', NULL, 4, 3, 3, 5, '', '', '', '2', '6', '1', '', '1', NULL, '', '', '0'),
(25, 'AS1', 'Ильина Ангелина Наумовна', 'самба', 4, 4, 3, 3, 5, '', '', '', '2', '6', '4', '14', '1', '', '', '', '4'),
(26, 'AS1', 'Ильина Ангелина Наумовна', 'румба', 5, 3, 5, 4, 5, '', '', '0', '1', '0', '1', '0', '3', '0', '', '0', '5'),
(27, 'AS1', 'Ильина Ангелина Наумовна', 'джайв', 5, 3, 5, 4, 5, '', '', '0', '1', '0', '1', '0', '3', '0', '', '0', '5');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `judiciary`
--
ALTER TABLE `judiciary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni` (`number`);

--
-- Индексы таблицы `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_participant` (`id_participant`);

--
-- Индексы таблицы `result_1_2`
--
ALTER TABLE `result_1_2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `result_1_4`
--
ALTER TABLE `result_1_4`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `result_1_8`
--
ALTER TABLE `result_1_8`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `result_final`
--
ALTER TABLE `result_final`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stage_1_2`
--
ALTER TABLE `stage_1_2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stage_1_4`
--
ALTER TABLE `stage_1_4`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stage_1_8`
--
ALTER TABLE `stage_1_8`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stage_final`
--
ALTER TABLE `stage_final`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `judiciary`
--
ALTER TABLE `judiciary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `result_1_2`
--
ALTER TABLE `result_1_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `result_1_4`
--
ALTER TABLE `result_1_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `result_1_8`
--
ALTER TABLE `result_1_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `result_final`
--
ALTER TABLE `result_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `stage_1_2`
--
ALTER TABLE `stage_1_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблицы `stage_1_4`
--
ALTER TABLE `stage_1_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `stage_1_8`
--
ALTER TABLE `stage_1_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT для таблицы `stage_final`
--
ALTER TABLE `stage_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
