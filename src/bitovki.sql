-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: mysql:3306
-- Время создания: Мар 24 2025 г., 07:20
-- Версия сервера: 5.7.44
-- Версия PHP: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bitovki`
--

-- --------------------------------------------------------

--
-- Структура таблицы `additional_options`
--

CREATE TABLE `additional_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` text,
  `image_name` text,
  `text` text,
  `rating` int(11) DEFAULT '0',
  `hide` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `additional_options`
--

INSERT INTO `additional_options` (`id`, `image_path`, `image_name`, `text`, `rating`, `hide`, `created_at`, `updated_at`) VALUES
(1, 'images/TIidsYTu4ulFufcaMoCvhMGmXPCtm12R9uDvOSJN.png', '9a56f565b22ce7228d7cae1e43f2acf6.png', '<p><b>Кронштейн для хранения колес</b>&nbsp;можно складывать, когда он пустует. Кронштейн раздвижной на случай, если у вас поменялись размеры колес.&nbsp;&nbsp;</p><p><br></p><p>Установка одного кроштейна на ОСП-плите в хозблок стоит&nbsp;<b>5800руб.&nbsp;</b>&nbsp;<br><br><br></p><p><br></p>', 0, 0, '2025-03-10 11:48:12', '2025-03-12 17:20:07'),
(2, 'images/0lhloyUtjdklchXIjzUoDZ5AvIjbP0HRC3K0It2G.png', 'adc6f1eff39fba85965518a730728d8e.png', '<p><b>Настенный держатель для инвентаря</b>&nbsp;прикручиваем на стойки каркаса. Длина держателей 118см, между ними около 120см, вмещает до 12 единиц инвентаря/инструмента.&nbsp;&nbsp;</p><p><br></p><p>Стоимость держателя с установкой&nbsp;<b>2500руб.</b></p><p>Не забудьте сказать менеджеру на какой стенке его надо повесить&nbsp;&nbsp;</p>', 0, 0, '2025-03-10 11:49:55', '2025-03-10 11:49:55'),
(3, 'images/kH4dNtrutrZsXLofdelaSCmTAwySi4kQ1ITSEPEQ.png', '3031a9441e006e77e754246e1f58acdf.png', '<p><b>Приставное крыльцо или пандус</b>&nbsp;Пандус нужен, если в хозблок или террасу планируют закатывать что-то тяжелое, например, газонокосилку, генератор на колесах или квадроцикл.&nbsp;&nbsp;</p><p><br></p><p>Если же закатывать тяжелое в хозблок не планируется, то для человека больше удобней приставное крыльцо, чем пандус. Стоимость крыльца и пандуса с установкой в зависимости от ширины/длины и количества ступенек варьируется&nbsp;<b>от 4000 до 8000руб.&nbsp;</b>&nbsp;</p>', 0, 0, '2025-03-10 11:50:46', '2025-03-10 11:50:49'),
(4, 'images/bfxHcfG0fwBJiGx6z3pRcyb5rdLE5V345pxTErfB.png', '2441076de04ba5e6e802b9fededcedee.png', '<p><b>Металопластиковая входная дверь со стеклопакетом</b>&nbsp;вместо деревянной двери Пластиковая дверь 2100х800мм (ВхШ) изготовлена из пвх профиля REHAU BLITZ, с использованием оригинального уплотнения с маркировкой REHAU, стеклопакет двухкамерный (3 стекла) глубиной 32 мм, фурнитура европейского производителя. Ручка REHAU IDEA входит в комплект. Цвет снаружи графитовый, а внутри - белый.&nbsp;&nbsp;</p><p><br></p><p>Стоимость доп.опции&nbsp;<b>58 800руб.&nbsp;&nbsp;</b></p>', 0, 0, '2025-03-10 11:51:31', '2025-03-10 11:51:32');

-- --------------------------------------------------------

--
-- Структура таблицы `admin_access_rights`
--

CREATE TABLE `admin_access_rights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `user_class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `admin_access_rights`
--

INSERT INTO `admin_access_rights` (`id`, `path`, `type`, `user_class_id`, `created_at`, `updated_at`) VALUES
(1, 'services.settings', 'edit', 1, NULL, NULL),
(2, 'services.settings', 'read', 1, NULL, NULL),
(3, 'services.settings', 'delete', 1, NULL, NULL),
(4, 'services.users', 'read', 1, NULL, NULL),
(5, 'services.users', 'edit', 1, NULL, NULL),
(6, 'services.users', 'delete', 1, NULL, NULL),
(7, 'main.additional-options', 'read', 1, NULL, NULL),
(8, 'main.additional-options', 'edit', 1, NULL, NULL),
(9, 'main.additional-options', 'delete', 1, NULL, NULL),
(10, 'main.reviews', 'read', 1, NULL, NULL),
(11, 'main.reviews', 'edit', 1, NULL, NULL),
(12, 'main.reviews', 'delete', 1, NULL, NULL),
(13, 'main.reviews', 'read', 1, NULL, NULL),
(14, 'main.reviews', 'edit', 1, NULL, NULL),
(15, 'main.reviews', 'delete', 1, NULL, NULL),
(16, 'main.variants', 'read', 1, NULL, NULL),
(17, 'main.variants', 'edit', 1, NULL, NULL),
(18, 'main.variants', 'delete', 1, NULL, NULL),
(19, 'main.qa', 'read', 1, NULL, NULL),
(20, 'main.qa', 'edit', 1, NULL, NULL),
(21, 'main.qa', 'delete', 1, NULL, NULL),
(22, 'main.informations', 'read', 1, NULL, NULL),
(23, 'main.informations', 'edit', 1, NULL, NULL),
(24, 'main.informations', 'delete', 1, NULL, NULL),
(25, 'main.pages', 'read', 1, NULL, NULL),
(26, 'main.pages', 'edit', 1, NULL, NULL),
(27, 'main.pages', 'delete', 1, NULL, NULL),
(28, 'main.infographics', 'edit', 1, NULL, NULL),
(29, 'main.infographics', 'read', 1, NULL, NULL),
(30, 'main.infographics', 'delete', 1, NULL, NULL),
(31, 'main.our-works', 'edit', 1, NULL, NULL),
(32, 'main.our-works', 'read', 1, NULL, NULL),
(33, 'main.our-works', 'delete', 1, NULL, NULL),
(34, 'main.catalog', 'edit', 1, NULL, NULL),
(35, 'main.catalog', 'read', 1, NULL, NULL),
(36, 'main.catalog', 'delete', 1, NULL, NULL),
(37, 'services.feedback', 'edit', 1, NULL, NULL),
(38, 'services.feedback', 'read', 1, NULL, NULL),
(39, 'services.feedback', 'delete', 1, NULL, NULL),
(40, 'services.users', 'edit', 1, NULL, NULL),
(41, 'services.users', 'read', 1, NULL, NULL),
(42, 'services.users', 'delete', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `description`
--

CREATE TABLE `description` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `block_1_0_text` text,
  `block_1_1_image_path` varchar(500) DEFAULT NULL,
  `block_1_1_image_name` varchar(500) DEFAULT NULL,
  `block_1_2_image_path` varchar(500) DEFAULT NULL,
  `block_1_2_image_name` varchar(500) DEFAULT NULL,
  `block_2_0_text` text,
  `block_2_1_image_path` varchar(500) DEFAULT NULL,
  `block_2_1_image_name` varchar(500) DEFAULT NULL,
  `block_2_2_image_path` varchar(500) DEFAULT NULL,
  `block_2_2_image_name` varchar(500) DEFAULT NULL,
  `block_2_3_image_path` varchar(500) DEFAULT NULL,
  `block_2_3_image_name` varchar(500) DEFAULT NULL,
  `block_3_0_text` text,
  `block_3_1_image_path` varchar(500) DEFAULT NULL,
  `block_3_1_image_name` varchar(500) DEFAULT NULL,
  `block_4_0_text` text,
  `block_4_1_image_path` varchar(500) DEFAULT NULL,
  `block_4_1_image_name` varchar(500) DEFAULT NULL,
  `block_5_0_text` text,
  `block_5_1_image_path` varchar(500) DEFAULT NULL,
  `block_5_1_image_name` varchar(500) DEFAULT NULL,
  `block_6_0_text` text,
  `block_6_1_image_path` varchar(500) DEFAULT NULL,
  `block_6_1_image_name` varchar(500) DEFAULT NULL,
  `block_6_2_image_path` varchar(500) DEFAULT NULL,
  `block_6_2_image_name` varchar(500) DEFAULT NULL,
  `block_7_0_text` text,
  `block_7_1_image_path` varchar(500) DEFAULT NULL,
  `block_7_1_image_name` varchar(500) DEFAULT NULL,
  `block_8_0_text` text,
  `block_8_1_image_path` varchar(500) DEFAULT NULL,
  `block_8_1_image_name` varchar(500) DEFAULT NULL,
  `block_9_0_text` text,
  `block_9_1_image_path` varchar(500) DEFAULT NULL,
  `block_9_1_image_name` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `description`
--

INSERT INTO `description` (`id`, `block_1_0_text`, `block_1_1_image_path`, `block_1_1_image_name`, `block_1_2_image_path`, `block_1_2_image_name`, `block_2_0_text`, `block_2_1_image_path`, `block_2_1_image_name`, `block_2_2_image_path`, `block_2_2_image_name`, `block_2_3_image_path`, `block_2_3_image_name`, `block_3_0_text`, `block_3_1_image_path`, `block_3_1_image_name`, `block_4_0_text`, `block_4_1_image_path`, `block_4_1_image_name`, `block_5_0_text`, `block_5_1_image_path`, `block_5_1_image_name`, `block_6_0_text`, `block_6_1_image_path`, `block_6_1_image_name`, `block_6_2_image_path`, `block_6_2_image_name`, `block_7_0_text`, `block_7_1_image_path`, `block_7_1_image_name`, `block_8_0_text`, `block_8_1_image_path`, `block_8_1_image_name`, `block_9_0_text`, `block_9_1_image_path`, `block_9_1_image_name`, `created_at`, `updated_at`) VALUES
(1, '<h3 class=\"\"><b>Надежный конструктив: \r\nИспользуемый пиломатериал 1 сорта, КАМЕРНОЙ СУШКИ. ОГНЕБИОЗАЩИТА.</b></h3><ul><li>Основание - Брус 150х150мм / 100х200мм / 100х150мм. \r\nОгнебиозащита. Сетка от грызунов.</li><li>Лаги пола  - доска 50х150мм / 50х200мм.</li><li>Стойки стен - доска 50х100мм.</li><li>Обвязка - доска 50х100мм.</li><li>Стропильная система - доска 50х150мм.</li></ul>', 'images/ngudiBiPvzSRaCfQLjv1234AP4gyhMHjcDGJUvMS.avif', 'сухие деревяшки.avif', 'images/8JBSiRad1o3OZGAFsdjPIwVPCOteQhFPNzijxFuh.jpg', 'огнебиозащита.jpg', '<h3 class=\"\">Материалы внешней и внутренней отделки:</h3><h4 class=\"\">Фасад комбинированный в зависимости от модели и комплектации с покраской:</h4><ul><li>Имитация бруса, сорт AB 16*140(135) с покраской + Деревянная рейка 20х40мм.</li><li>Вагонка \"Штиль\" сорт AB 13,5*115 + Деревянная рейка 20х40мм.&nbsp;</li><li>Проф. Лист МП-20 (RAL 7016 тёмно-серого цвета) + Имитация бруса, сорт AB 16*140(135)</li><li>Планкен + Проф. Лист МП-20 (RAL 7016 тёмно-серого цвета)</li><li>Планкен + Деревянная рейка 20х40мм. + Проф. Лист МП-20 (RAL 7016 тёмно-серого цвета)</li></ul>', 'images/NuDLJlbj8EIvoLPTzngfpK6Xa2xf19ScKTLIdcEQ.png', 'Рисунок3.png', 'images/HWEQm3gT66TbYudIGXvrqM6kcX5gWiWTxz0RvkQT.png', 'Рисунок2.png', 'images/ZBJscv7thVu9L9InzsZfzGYfMu59FdgVOKAJQLNd.png', 'Рисунок1.png', '<h3 class=\"\">Утеплитель минеральная вата \r\nRockWool Лайт Баттс Скандик \r\n800х600х100 мм</h3>', 'images/8YKYUQZuwt0uRgKebGTUv3qAoO9cLuoPTYO1xOZF.avif', 'утеплитель.avif', '<h3 class=\"\">Водосточная система</h3>', 'images/nFpgUBWKFLdt9fezVyEAuThPJ60DLTkqzwbbc970.avif', 'водосток 2.avif', '<h3 class=\"\">Электрика в гофре и коробах: на розетки 3х2,5 / на освещение 2х1,5.</h3><ul><li>Внутри и снаружи светильники, выключатели и розетки.&nbsp;</li></ul>', 'images/AVybuDadVTso2IqiKP6stV5UTriYiMa6pL6Qt2fP.jpg', 'электрика 1.jpg', '<h3 class=\"\">Фундамент (на выбор Заказчика):</h3><ul><li>Винтовые сваи 8шт, h = 2,5м.</li><li>Бетонные блоки 8шт 400х200х200;</li></ul>', NULL, NULL, 'images/jYeHKWOrITFk6dkls8ffVBrx50zcxakX8tCDPk2t.jpg', 'сваи винтовые.jpg', '<h3 class=\"\">Входная дверь – металлическая \r\nс замком.</h3>', 'images/I8p1xTZaBaCJTg4MVdkHnYw2qkyN50AZisxd6en8.jpg', 'металлическая дверь.jpg', '<h3 class=\"\">Окна – ПВХ (пластиковые).</h3>', 'images/2P7FlM7Jzkf2bWPR0XWzEF1N8TSnh0YxsFFw2tga.jpg', 'окно ПВХ.jpg', '<h3 class=\"\">Межкомнатные двери – филенчатые. \r\nВ комплекте ручки и замки.</h3>', 'images/kCzo6jRuewMkhVx0bXVTS2yQlIT6VJ0UqTOWk95I.png', 'Рисунок5.png', '2025-03-20 12:41:55', '2025-03-21 11:28:40');

-- --------------------------------------------------------

--
-- Структура таблицы `infographics`
--

CREATE TABLE `infographics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `image_path` text,
  `image_name` text,
  `rating` int(11) DEFAULT '0',
  `hide` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `infographics`
--

INSERT INTO `infographics` (`id`, `title`, `image_path`, `image_name`, `rating`, `hide`, `created_at`, `updated_at`) VALUES
(11, 'Цена с учетом ВСЕХ <br> налогов и комиссий', 'images/x5cBEpQ1KJlhE8t2uFSsiXEYF5FcvyN28HVpBA9n.png', '1.png', 0, 0, '2025-03-10 10:46:32', '2025-03-17 18:12:55'),
(12, 'Подберём <br> с Вами цвета', 'images/LmyJNv6Gu7OfChSMEZ0HtPstpaEcpiqYsgDyS57N.png', '2.png', 0, 0, '2025-03-10 10:47:08', '2025-03-17 18:12:13'),
(13, 'Работаем <br> по договору', 'images/5ulK4G79dQPhEkXIC9DsxS5RTuUfSX3lyhqyAH2s.png', 'fi_3188047.png', 0, 0, '2025-03-10 10:47:19', '2025-03-17 18:16:15'),
(14, 'Возможна сборка <br> у Вас на участке', 'images/PWM7RmbeqQGpR665qc0DEss8jGKVwOLFj5DQmxql.png', 'icon 2.png', 0, 0, '2025-03-10 10:47:35', '2025-03-21 15:49:21');

-- --------------------------------------------------------

--
-- Структура таблицы `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(100) DEFAULT NULL,
  `text` text,
  `rating` int(11) DEFAULT '0',
  `hide` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `informations`
--

INSERT INTO `informations` (`id`, `number`, `text`, `rating`, `hide`, `created_at`, `updated_at`) VALUES
(1, '01', '<p>Выберите модель хозблока и свяжитесь с нами удобным для вас способом!&nbsp;Менеджер сделает Вам расчёт стоимости с доставкой и установкой. Выезд замерщика платный, но в большинстве случаев его выезд не требуется, так как менеджер по видео от вас посмотрит подъезд для манипулятора и место установки, ответит на все ваши вопросы.&nbsp;&nbsp;</p>', 0, 0, '2025-03-10 12:43:25', '2025-03-11 13:08:57'),
(2, '02', '<p>Cоставим и пришлем вам договор на согласование, затем подпишем с вами договор дистанционно с помощью СМС.&nbsp;&nbsp;</p><p><br></p><p>Не надо тратить время на поездку для подписания договора&nbsp;&nbsp;</p>', 0, 0, '2025-03-10 12:45:48', '2025-03-10 12:45:52'),
(3, '03', '<p>В договоре поэтапная оплата 50% аванс на материалы и 50% после установки хозблока на вашем участке.</p><p><br></p><p>Оплатить аванс можно картой, в том числе и кредитной картой по QR-коду.&nbsp;&nbsp;</p>', 0, 0, '2025-03-10 12:46:40', '2025-03-10 12:46:40'),
(4, '04', '<p>Cоставим и пришлем вам договор на согласование, затем подпишем с вами договор дистанционно с помощью СМС.Не надо тратить время на поездку для подписания договора&nbsp;&nbsp;</p>', 0, 0, '2025-03-10 12:46:51', '2025-03-10 12:46:51'),
(5, '05', '<p>лоллаллламламлалдалдвлдлдл</p>', 0, 0, '2025-03-12 12:00:03', '2025-03-12 12:00:03');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `subtitle` varchar(1000) DEFAULT NULL,
  `old_price` double(8,2) DEFAULT NULL,
  `new_price` double(8,2) DEFAULT NULL,
  `monthly_payment` double(8,2) DEFAULT NULL,
  `month_count` varchar(191) DEFAULT NULL,
  `image_path` text,
  `image_name` text,
  `rating` int(11) DEFAULT '0',
  `hide` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `title`, `subtitle`, `old_price`, `new_price`, `monthly_payment`, `month_count`, `image_path`, `image_name`, `rating`, `hide`, `created_at`, `updated_at`) VALUES
(4, 'БЫТОВКА / ГОСТЕВОЙ ДОМ', '(с 2-мя комнатами)', NULL, 480257.00, NULL, '6', 'images/Kvr7fwbfodc5MwgscxT5z9TaeF62utUm7K53p30K.png', 'ХОЗБЛОК Б-625ЖУ.png', 5, 0, '2025-03-10 15:59:19', '2025-03-18 15:33:15'),
(5, 'ХОЗБЛОК / МАСТЕРСКАЯ', '(с дровником)', NULL, 408071.00, NULL, '6', 'images/xM5gXdJwdy97mOdAZpjobVak4fGhHpwTXCQHdgmV.png', 'ХОЗБЛОК ХД-625.png', 6, 0, '2025-03-10 17:08:47', '2025-03-18 15:35:19'),
(6, 'БЫТОВКА / ГОСТЕВОЙ ДОМ', '(с 2-мя комнатами и террасой)', NULL, 635820.00, NULL, '6', NULL, NULL, 4, 0, '2025-03-10 17:22:05', '2025-03-18 15:34:40'),
(7, 'ХОЗБЛОК 2,2х3,0м с обшивкой из профлиста', '(стеллажи в комплекте)', 399990.00, 264990.00, 46975.00, '6', NULL, NULL, 3, 0, '2025-03-10 17:24:03', '2025-03-17 11:12:08');

-- --------------------------------------------------------

--
-- Структура таблицы `item_attached_images`
--

CREATE TABLE `item_attached_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image_path` text,
  `image_name` text,
  `rating` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `item_attached_images`
--

INSERT INTO `item_attached_images` (`id`, `item_id`, `image_path`, `image_name`, `rating`, `created_at`, `updated_at`) VALUES
(66, 7, 'images/dZ2HT9zTAr56DJvcWnQAeI62unqbnwGCAZMdNBRr.png', '4d88ab82a1e988a322e427a84d47e78d.png', 0, '2025-03-11 15:52:55', '2025-03-11 15:52:55'),
(67, 7, 'images/0ftogZt9WqIosay6N7yiVZWHAhGyXDuyVq4O82AP.png', '4d88ab82a1e988a322e427a84d47e78d.png', 0, '2025-03-11 15:52:57', '2025-03-11 15:52:57'),
(68, 7, 'images/5AomrioArrSbohPFJWRJE3mGjD9OTVYDdfTWVPAr.png', '4d88ab82a1e988a322e427a84d47e78d.png', 0, '2025-03-11 15:52:59', '2025-03-11 15:52:59'),
(94, 6, 'images/XXmMKaVNoD1MCtEzHGQNZIABozd4W5c1ryzkllr9.jpg', 'БТ-8525-4-Photoroom.jpg', 0, '2025-03-20 10:22:35', '2025-03-20 10:22:35'),
(95, 6, 'images/hAbTJ11y8L1aQOTpAJkUinUB6zzIcTK1wUev07g5.jpg', 'БТ-8525-3-Photoroom.jpg', 0, '2025-03-20 10:22:35', '2025-03-20 10:22:35'),
(96, 6, 'images/0YRadxXLY5vUghhIc3VvdiHkCtVLzDSz7263wu7P.jpg', 'БТ-8525-2-Photoroom.jpg', 0, '2025-03-20 10:22:35', '2025-03-20 10:22:35'),
(97, 6, 'images/vd63Juy1CVQQIpJqLfPPLo6MHcTNb0Xtz1TsNEfN.jpg', 'БТ-8525-1-Photoroom (1).jpg', 0, '2025-03-20 10:22:35', '2025-03-20 10:22:35'),
(98, 5, 'images/SAnlY54SvczaNNGG4eQj4kqdIAxcsosIfbXLmoX0.jpg', 'Хозблок ХД-625 (фасад1)-Photoroom.jpg', 7, '2025-03-20 10:24:49', '2025-03-20 10:24:59'),
(99, 5, 'images/w7xj7lzW7ShkAyHKXyn3WLsfIVX3HqIIMPCwZjMm.jpg', 'Хозблок ХД-625 (фасад2)-Photoroom.jpg', 6, '2025-03-20 10:24:49', '2025-03-20 10:24:59'),
(100, 5, 'images/gSjnfrWhCk1nJq4p2GnYcoBnukfuTz7A4zuugLmP.jpg', 'Хозблок ХД-625 (фасад3)-Photoroom.jpg', 5, '2025-03-20 10:24:49', '2025-03-20 10:24:59'),
(101, 5, 'images/qTqm5hSGRqvP3Lt9SI4WVi1OMYBDlusb7bTo8IsE.jpg', 'Хозблок ХД-625 (фасад4)-Photoroom.jpg', 4, '2025-03-20 10:24:49', '2025-03-20 10:24:59'),
(102, 4, 'images/gIniuJxwfTGxHlLJ1CGmLiRzRj8FtGNiYlsq2Vif.jpg', 'Бытовка Б-625ЖУ (фасад1)-Photoroom.jpg', 8, '2025-03-20 10:26:25', '2025-03-20 10:26:43'),
(103, 4, 'images/w5MRuzC5EA6tdrJpzXIUbvQ6dXxy5unMOHO3rrHr.jpg', 'Бытовка Б-625ЖУ (фасад2)-Photoroom.jpg', 7, '2025-03-20 10:26:25', '2025-03-20 10:26:43'),
(104, 4, 'images/em0A9QOgcSdF5hTgR7OJTHZkQws6cdoOCo5c1RQO.jpg', 'Бытовка Б-625ЖУ (фасад3)-Photoroom.jpg', 6, '2025-03-20 10:26:25', '2025-03-20 10:26:43'),
(105, 4, 'images/BIdnr8dT06D7wMTSNaw0z0nu3XmJMO9rtr92DcCI.jpg', 'Бытовка Б-625ЖУ (фасад4)-Photoroom.jpg', 5, '2025-03-20 10:26:25', '2025-03-20 10:26:43'),
(106, 4, 'images/zbDF4PyF0SgOyYebhQYZzrl3i9ly9tK6WQ00MpIZ.jpg', 'Бытовка_Б_625ЖУ_пирог_наружняя_стена_Photoroom.jpg', 0, '2025-03-20 10:31:31', '2025-03-20 10:31:31'),
(107, 4, 'images/oCUjpRAx24FCIbd3e7GmoZ7qHIgkZ2vXNXSzGCPe.jpg', 'Бытовка Б-625ЖУ (план)-Photoroom.jpg', 0, '2025-03-20 10:31:31', '2025-03-20 10:31:31'),
(108, 4, 'images/NEezIOdhgjUSW7GA77IOcu1abMBGXH6EvRSEjldT.jpg', 'Бытовка_Б_625ЖУ_пирог_кровля_Photoroom.jpg', 0, '2025-03-20 10:31:31', '2025-03-20 10:31:31'),
(109, 4, 'images/xQRXEJtGN8w6lN3ENxiQWz7zzAJt6Sjru3eBtOBi.jpg', 'Бытовка_Б_625ЖУ_пирог_нижнее_перекрытие_Photoroom.jpg', 0, '2025-03-20 10:31:31', '2025-03-20 10:31:31'),
(110, 5, 'images/w0rLUN0q3odYsHa8sL0VZnK3b9IisVRSPYfxBbOs.jpg', 'Хозблок_ХД_625_пирог_наружняя_стена_Photoroom.jpg', 0, '2025-03-20 10:33:27', '2025-03-20 10:33:27'),
(111, 5, 'images/cdwDD1HJtj44VrlrFZefzGD6sFCLjDXSsJD4Qw2i.jpg', 'Хозблок ХД-625 (пирог кровля)-Photoroom.jpg', 0, '2025-03-20 10:33:27', '2025-03-20 10:33:27'),
(112, 5, 'images/48n3biVzRfgmRywm8PJc0uxOaJ8zQviVGAxvxz3Y.jpg', 'Хозблок ХД-625 (пирог пол)-Photoroom.jpg', 0, '2025-03-20 10:33:27', '2025-03-20 10:33:27'),
(113, 5, 'images/sI6aS7JgxeeiRwAkIqf6CO2bmYoBK6AAkMCU5H51.jpg', 'Хозблок ХД-625 (план)-Photoroom.jpg', 0, '2025-03-20 10:33:27', '2025-03-20 10:33:27'),
(114, 6, 'images/D4ZDzimvdqsGdZ2b7VTu92tOLhKBT1iWVRr61QlS.jpg', 'БТ-8525-5-Photoroom.jpg', 0, '2025-03-20 10:35:20', '2025-03-20 10:35:20'),
(115, 6, 'images/P2hIXlFObJ86mbusAG6QyO4VkgQErvK0BVRh6l6f.jpg', 'БТ-8525-6-Photoroom.jpg', 0, '2025-03-20 10:35:21', '2025-03-20 10:35:21'),
(116, 6, 'images/P1Nz2A2BfCUsvu2VlkTUl7R06FMAs4ssyI0jOTIR.jpg', 'БТ-8525-7-Photoroom.jpg', 0, '2025-03-20 10:35:21', '2025-03-20 10:35:21'),
(117, 6, 'images/tvpZhU3L29vZ7CHxGl05vnlE9E4qwwcaxLN2AYYq.jpg', 'БТ-8525-8-Photoroom.jpg', 0, '2025-03-20 10:35:21', '2025-03-20 10:35:21');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(42, '2024_11_13_114811_create_settings_table', 1),
(43, '2024_11_13_115129_create_user_classes_table', 1),
(44, '2024_11_13_115130_create_users_table', 1),
(45, '2024_11_13_121247_create_seo_table', 1),
(46, '2025_03_05_105608_create_admin_access_rights_table', 1),
(47, '2025_03_06_110234_create_pages_table', 1),
(48, '2025_03_06_112004_create_additional_options_table', 1),
(49, '2025_03_06_112614_create_reviews_table', 1),
(50, '2025_03_06_112734_create_informations_table', 1),
(51, '2025_03_06_112923_create_variants_table', 1),
(52, '2025_03_06_113253_create_our_works_table', 1),
(53, '2025_03_06_113422_create_qa_table', 1),
(54, '2025_03_06_115803_create_infographics_table', 1),
(55, '2025_03_10_144301_create_requests_table', 2),
(59, '2025_03_10_145000_create_items_table', 3),
(60, '2025_03_10_145012_create_item_attached_images_table', 3),
(61, '2025_03_10_145406_create_specs_table', 3),
(65, '2025_03_20_110746_create_description_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `our_works`
--

CREATE TABLE `our_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` text,
  `image_name` text,
  `rating` int(11) DEFAULT '0',
  `hide` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `our_works`
--

INSERT INTO `our_works` (`id`, `image_path`, `image_name`, `rating`, `hide`, `created_at`, `updated_at`) VALUES
(1, 'images/yKxuP5TnKdUrMlerumKljxNCvhBzUuGENkRhlFb4.png', NULL, 1, 0, '2025-03-10 14:14:05', '2025-03-10 14:14:24'),
(2, 'images/YFS03bxLiqA2Vgb1UFBEBT84k38zhaZ4Uwfj7Z3t.png', NULL, 2, 0, '2025-03-10 14:14:10', '2025-03-11 13:09:25'),
(3, 'images/Y5923HYZmkMdwqog08hI3S2FCyLoQbw1oUIc2QyV.png', NULL, 0, 0, '2025-03-10 14:14:17', '2025-03-10 14:14:24');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `block_1_title` varchar(1000) DEFAULT NULL,
  `block_1_subtitle` varchar(1000) DEFAULT NULL,
  `block_1_price_title` varchar(1000) DEFAULT NULL,
  `block_1_price_value` float DEFAULT NULL,
  `block_1_price_subtitle` varchar(1000) DEFAULT NULL,
  `block_1_image_path` text,
  `block_1_image_name` text,
  `block_2_title` text,
  `block_2_subtitle` varchar(1000) DEFAULT NULL,
  `block_2_text1` text,
  `block_2_text2` text,
  `block_2_image_path` text,
  `block_2_image_name` text,
  `block_2_image_description` varchar(1000) DEFAULT NULL,
  `block_3_title` text,
  `block_3_economy_title` varchar(1000) DEFAULT NULL,
  `block_3_economy_value` int(11) DEFAULT NULL,
  `block_3_subtitle` varchar(1000) DEFAULT NULL,
  `block_3_text` text,
  `block_3_image_path` text,
  `block_3_image_name` text,
  `block_3_1_title` text,
  `block_3_1_economy_title` varchar(1000) DEFAULT NULL,
  `block_3_1_economy_value` int(11) DEFAULT NULL,
  `block_3_1_subtitle` varchar(1000) DEFAULT NULL,
  `block_3_1_text` text,
  `block_3_1_image_path` text,
  `block_3_1_image_name` text,
  `block_4_title` text,
  `block_4_text` text,
  `block_4_image1_path` text,
  `block_4_image1_name` text,
  `block_4_image1_description` varchar(1000) DEFAULT NULL,
  `block_4_image2_path` text,
  `block_4_image2_name` text,
  `block_4_image2_description` varchar(1000) DEFAULT NULL,
  `block_5_title` text,
  `block_5_text` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `block_1_title`, `block_1_subtitle`, `block_1_price_title`, `block_1_price_value`, `block_1_price_subtitle`, `block_1_image_path`, `block_1_image_name`, `block_2_title`, `block_2_subtitle`, `block_2_text1`, `block_2_text2`, `block_2_image_path`, `block_2_image_name`, `block_2_image_description`, `block_3_title`, `block_3_economy_title`, `block_3_economy_value`, `block_3_subtitle`, `block_3_text`, `block_3_image_path`, `block_3_image_name`, `block_3_1_title`, `block_3_1_economy_title`, `block_3_1_economy_value`, `block_3_1_subtitle`, `block_3_1_text`, `block_3_1_image_path`, `block_3_1_image_name`, `block_4_title`, `block_4_text`, `block_4_image1_path`, `block_4_image1_name`, `block_4_image1_description`, `block_4_image2_path`, `block_4_image2_name`, `block_4_image2_description`, `block_5_title`, `block_5_text`, `created_at`, `updated_at`) VALUES
(1, 'Главная', 'бытовки для дачи гостевые домики хозблоки', '<p>«ПОД КЛЮЧ» от 5-ти дней с доставкой установкой по Москве и области </p><p>Надёжность строений как у капитального дома.</p><p>Собственное производство!</p>', NULL, 0, NULL, 'images/5U2brAsSD1tfqCmQkwGICiWYI1qYxzCCXPNMsQef.png', NULL, '<p><b>Серия<font color=\"#fe8934\" style=\"\">«Авангард. Гибкая черепица»&nbsp;&nbsp;</font></b></p><p>(очень красивая серия)&nbsp;</p>', 'Примеры выполненных работ с описанием задач, предложенных решений и сроков реализации проекта', '<p><br></p>', '<p>Современные, качественные, надежные ГОСТЕВЫЕ ДОМИКИ, ДАЧНЫЕ БЫТОВКИ, ХОЗБЛОКИ, изготавливаемые на специально оборудованной производственной площадке по тщательно проработанным проектам.</p><p>Применяем только современные материалы и передовые технологии&nbsp; обработки древесины, что обеспечивает надёжную эксплуатацию наших строений на протяжении 50 лет.</p>', 'images/DBlkXAuYgjkOAECAhOtUFync06tu37DR3B05gMal.png', NULL, 'Удобное крыльцо', 'Стеллажи в комплекте<br>', 'Экономия:', 1000000, 'Глубина полок - 55см и надежный каркас из бруска 50х50мм!', '<p>&nbsp;У хозблоков других производителей нет в комплекте стеллажей,а если\r\n                            покупать в хозблок отдельно стеллажи такой площади,то они обойдутся в 10 тыс.руб и более. Мы\r\n                            экономим Вам эти деньги.</p><p><br></p><p>\r\nВ хозблоке сделаны длинные стеллажи глубиной 55см, в которых\r\n                            вместятся все ваши вещи.\r\n</p><p><br></p><p>\r\n\r\nПо вашему желанию мы можем увеличить или уменьшить площадь\r\n                            стеллажей, т.е. адаптировать под ваши потребности.\r\n\r\n&nbsp;&nbsp;<br><br></p><p><br></p>', 'images/tQ4daEzaUdN69SJkCr69o2Q4yAVBSDxEKHUlnXLV.png', NULL, '<p>Входная дверь каркаса —</p><p><font color=\"#fe8934\">не массив</font><br></p>', NULL, NULL, 'Не разбухает осенью и не рассыхается летом!', '<p>Наша дверь не разбухает осенью и не рассыхается летом, имеет стабильную форму, служит долго и надежно.</p><p><br></p><p>\r\nОбычные деревянные двери из массива, которые ставят другие производители хозблоков, осенью разбухают от влажности и перестают влазить в дверную коробку и закрываться, а летом такие двери рассыхаются, и появляются трещины.&nbsp;\r\n</p><p><br></p><p>\r\n\r\nНаши хозблоки закрываются на ключ — это важно, когда у вас в хозблоке хранятся вещи, и вы уезжаете всей семьей в отпуск. Пластиковые и многие другие хозблоки не закрываются на ключ либо требуют неудобного навесного замка, а наши — закрываются врезным замком.&nbsp; &nbsp; &nbsp;</p>', 'images/bQniUTLmPo4n6SZOiCqsLL5YjpG9t56OzhVXNWZ7.png', NULL, '<p>Дешевые&nbsp;\r\n<font color=\"#fe8934\">хозблоки\r\n\r\n &nbsp;</font>&nbsp;</p>', '<p>Дешёвые хозблоки, как правило, не имеют пола (ставятся прямо на землю) и не\r\n                    имеют стеллажей в комплекте, их внешний вид тоже оставляет желать лучшего, а если сделать красивый\r\n                    хозблок с полом и стеллажами, то итоговая цена уже будет недешёвой. Мы можем производить дешёвые\r\n                    хозблоки, но радость от экономии за счет качества у вас будет недолгой, а разочарование таким дешёвым\r\n                    хозблоком останется навсегда.</p><p><br></p><p>У вас не только дом должен быть красивым и удобным, но и хозблок и\r\n                    внутренний двор с садом: всё на вашем участке должно быть гармоничным, красивым и удобным. Покупаете\r\n                    хозблок Вы для себя и надолго, а значит он должен быть надежным, удобным, красивым и приносить радость!&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br><br></p><p><br></p>', 'images/EwNVyQT7zJjBey9YjvQjVgr5XW4NfkcPJ5eh3ix3.png', NULL, 'Дешевый хозблок', 'images/XstHl7gGC1XNsYOuDJBt32JpFIDPkmK5l7kKuI3k.png', NULL, 'Наш блок', '<h3 class=\"\"><p><b>Общее описание для всех моделей:</b></p></h3><p>\r\n\r\n</p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p>', '<h3 class=\"\"><b>Надежный конструктив:&nbsp;</b></h3><ul><li>Основание - Брус 150х150мм / 100х200мм / 100х150мм. Огнебиозащита. Сетка от грызунов.</li><li>Лаги пола&nbsp; - доска 50х150мм / 50х200мм.</li><li>Стойки стен - доска 50х100мм.</li><li>Обвязка - доска 50х100мм.</li><li>Стропильная система - доска 50х150мм.</li></ul><h3 class=\"\"><b>Фасад комбинированный в зависимости от модели и комплектации с покраской:</b></h3><ul><li>Имитация бруса, сорт AB 16*140(135) с покраской + Деревянная рейка 20х40мм.</li><li>Вагонка \"Штиль\" сорт AB 13,5*115 + Деревянная рейка 20х40мм.</li><li>Проф. Лист МП-20 (RAL 7016 тёмно-серого цвета) + Имитация бруса, сорт AB 16*140(135)</li><li>Планкен + Проф. Лист МП-20 (RAL 7016 тёмно-серого цвета)</li><li>Планкен + Деревянная рейка 20х40мм. + Проф. Лист МП-20 (RAL 7016 тёмно-серого цвета)</li></ul><h3 class=\"\"><b>Высота бытовок и хозблоков в зависимости от модели и комплектации:</b></h3><ul><li>снаружи –&nbsp; 2,85 метра (по лицевому фасаду) и 2,25 метра (по задней стене);</li><li>внутри – 2,387 метра и 2,06 метра.</li></ul><h3 class=\"\"><b>Кровля - Проф. Лист МП-20 (RAL 7016 тёмно-серого цвета)</b><b><br></b></h3><h3 class=\"\"><b>Используемый пиломатериал 1 сорта, КАМЕРНОЙ СУШКИ. ОГНЕБИОЗАЩИТА.</b><b><br></b></h3><h3 class=\"\"><b>Входная дверь – металлическая с замком.</b><b><br></b></h3><h3 class=\"\"><b>Межкомнатные двери – филенчатые. В комплекте ручки и замки.</b><b><br></b></h3><h3 class=\"\"><b>Окна – ПВХ (пластиковые).</b><b><br></b></h3><h3 class=\"\"><b>Внутренняя отделка:</b></h3><ul><li>Вагонка \"Штиль\" сорт AB 13,5*115(110)</li><li>Плита ОСП 9мм</li><li>Доска строганая 25х125х6000 + терр масло в 2 слоя</li></ul><h3 class=\"\"><b>Утеплитель минеральная вата RockWool Лайт Баттс Скандик 800х600х100 мм</b><b><br></b></h3><h3 class=\"\"><b>Водосточная система</b><b><br></b></h3><h3 class=\"\"><b>Фундамент (на выбор Заказчика):</b></h3><ul><li>Бетонные блоки 8шт 400х200х200;</li><li>Винтовые сваи 8шт, h = 2,5м.</li></ul><h3 class=\"\"><b>Электрика в гофре и коробах: на розетки 3х2,5 / на освещение 2х1,5.</b></h3><ul><li>Внутри и снаружи светильники, выключатели и розетки.&nbsp;</li></ul><h3 class=\"\"><b>Дополнительные опции:</b></h3><ul><li>Стеллажи;</li><li>Кронштейны и держатели для подвесного хранения;</li><li>Пандус, лестница (max 2 ступени) или приставное крыльцо;</li></ul><h3 class=\"\"><b>СРОК СЛУЖБЫ – до 50 ЛЕТ!</b></h3>', NULL, '2025-03-21 16:19:25');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `qa`
--

CREATE TABLE `qa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `answer` text,
  `rating` int(11) DEFAULT '0',
  `hide` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `qa`
--

INSERT INTO `qa` (`id`, `question`, `answer`, `rating`, `hide`, `created_at`, `updated_at`) VALUES
(1, 'Манипулятор ко мне не заедет. Можете ли собрать хозблок на участке?', 'Обычно клиент присылает видео, сняв подъезд с улицы, провода и газовые трубы, и проход к месту установки - мы пересылаем видео водителю манипулятора и он определяет заедет он или нет. Если есть сложности, то наш бригадир может приехать на замер к вам на участок и уточнить всё на месте: есть вариант привезти готовый хозблок и закатить его на рохлях, есть вариант собрать на месте из щитов или собрать полностью, но это зависит от модели хозблока.', 0, 0, '2025-03-10 14:16:51', '2025-03-11 13:08:02'),
(2, 'Мне нужен хозблок нестандартных размеров. Изготовите?', 'Обычно клиент присылает видео, сняв подъезд с улицы, провода и газовые трубы, и проход к месту установки - мы пересылаем видео водителю манипулятора и он определяет заедет он или нет. Если есть сложности, то наш бригадир может приехать на замер к вам на участок и уточнить всё на месте: есть вариант привезти готовый хозблок и закатить его на рохлях, есть вариант собрать на месте из щитов или собрать полностью, но это зависит от модели хозблока.', 0, 0, '2025-03-10 14:17:50', '2025-03-10 14:17:50'),
(3, 'Почему ваши хозблоки дороже бытовок?', 'Обычно клиент присылает видео, сняв подъезд с улицы, провода и газовые трубы, и проход к месту установки - мы пересылаем видео водителю манипулятора и он определяет заедет он или нет. Если есть сложности, то наш бригадир может приехать на замер к вам на участок и уточнить всё на месте: есть вариант привезти готовый хозблок и закатить его на рохлях, есть вариант собрать на месте из щитов или собрать полностью, но это зависит от модели хозблока.', 0, 0, '2025-03-10 14:18:59', '2025-03-10 14:18:59'),
(4, 'Сколько будет стоить доставка?', 'Обычно клиент присылает видео, сняв подъезд с улицы, провода и газовые трубы, и проход к месту установки - мы пересылаем видео водителю манипулятора и он определяет заедет он или нет. Если есть сложности, то наш бригадир может приехать на замер к вам на участок и уточнить всё на месте: есть вариант привезти готовый хозблок и закатить его на рохлях, есть вариант собрать на месте из щитов или собрать полностью, но это зависит от модели хозблока.', 0, 0, '2025-03-10 14:19:36', '2025-03-10 14:19:36');

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(20) NOT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `phone`, `comment`, `created_at`, `updated_at`) VALUES
(2, '+7(999) 999-99-99', '111111', '2025-03-11 11:49:05', '2025-03-11 11:49:05'),
(3, '+7(991) 111-11-11', '+7(991) 111-11-11', '2025-03-11 12:23:00', '2025-03-11 12:23:00'),
(4, '+7(999) 999-99-99', '123123123', '2025-03-11 12:25:44', '2025-03-11 12:25:44'),
(5, '+7(555) 555-55-55', 'zxczczxcxz', '2025-03-11 12:26:11', '2025-03-11 12:26:11');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` text,
  `image_name` text,
  `rating` int(11) DEFAULT '0',
  `hide` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `image_path`, `image_name`, `rating`, `hide`, `created_at`, `updated_at`) VALUES
(1, 'images/CcplnWY5yGXPfXEki4QundOBWuu2BV6dvpWqC8DH.png', NULL, 0, 0, '2025-03-10 12:39:50', '2025-03-11 13:09:36'),
(2, 'images/cesLp39ZgLIWwHY4JiqFZD2YDiHVKugxyxg6vlnp.png', NULL, 0, 0, '2025-03-10 12:39:59', '2025-03-10 12:39:59'),
(3, 'images/bxH82touwPrPsRzfu5fYEexanmilJuIdDmUHmwlO.png', NULL, 0, 0, '2025-03-10 12:40:08', '2025-03-10 12:40:08'),
(4, 'images/tdAFisNpUsIHN1OZu19H1IKl3zr54s08xxgdIKZn.png', NULL, 0, 0, '2025-03-10 12:40:14', '2025-03-10 12:40:14'),
(5, 'images/2RQxmtdlCc2V3JzJMkRqEAImK4Ro4aAv2dFmxJXX.png', NULL, 0, 0, '2025-03-10 12:40:19', '2025-03-10 12:40:19');

-- --------------------------------------------------------

--
-- Структура таблицы `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `canonical` text NOT NULL,
  `keywords` text NOT NULL,
  `og_title` text NOT NULL,
  `og_description` text NOT NULL,
  `og_url` text NOT NULL,
  `twitter_title` text NOT NULL,
  `twitter_site` text NOT NULL,
  `jsonld_title` text NOT NULL,
  `jsonld_description` text NOT NULL,
  `jsonld_type` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` text,
  `email` varchar(191) DEFAULT NULL,
  `ogrn` varchar(191) DEFAULT NULL,
  `inn` varchar(191) DEFAULT NULL,
  `vk` varchar(191) DEFAULT NULL,
  `youtube` varchar(191) DEFAULT NULL,
  `telegram` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `address`, `phone`, `description`, `email`, `ogrn`, `inn`, `vk`, `youtube`, `telegram`, `created_at`, `updated_at`) VALUES
(1, 'г. Москва, Хлебозаводский проезд д. 7, стр. 9', '+7 (495) 120-08-35', NULL, 'zakaz@bytovkadlydachi.ru', '475879098080', '464575677565', NULL, NULL, NULL, '2025-03-07 19:40:21', '2025-03-18 15:18:42');

-- --------------------------------------------------------

--
-- Структура таблицы `specs`
--

CREATE TABLE `specs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `living_area` double(8,2) DEFAULT NULL,
  `area` double(8,2) DEFAULT NULL,
  `building_area` double(8,2) DEFAULT NULL,
  `length` double(8,2) DEFAULT NULL,
  `sizes` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `specs`
--

INSERT INTO `specs` (`id`, `item_id`, `living_area`, `area`, `building_area`, `length`, `sizes`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL, NULL, NULL, '2.5Ш x 2.7В х 6.0Д', '2025-03-10 15:59:21', '2025-03-18 15:33:15'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-10 17:08:47', '2025-03-10 17:08:47'),
(3, 5, NULL, NULL, NULL, NULL, '2.5Ш x 2.7В х 6.0Д', '2025-03-10 17:10:00', '2025-03-18 15:25:46'),
(6, 6, NULL, NULL, NULL, NULL, '2.5Ш x 2.7В х 8.5Д', '2025-03-10 17:38:15', '2025-03-18 15:34:40'),
(7, 7, 11.18, 36.00, 48.00, 6.00, NULL, '2025-03-10 17:48:51', '2025-03-10 17:48:51');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `image` text,
  `user_class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `image`, `user_class_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', NULL, '$2y$10$p6gOy04wUrCbrQk2XBDwdOAsTLnKJP/KdMRLgyR17OlshsF4iNxGK', NULL, 1, NULL, 1, '2025-03-07 18:09:01', '2025-03-07 18:09:01'),
(2, 'test1', 'test1', NULL, '$2y$10$WahdEpxijjw8mPB60TImguqAz1ah1RmQPOV4Y3ln.ePp9Dn8VVePu', NULL, 1, NULL, 1, '2025-03-11 12:09:06', '2025-03-11 12:09:06');

-- --------------------------------------------------------

--
-- Структура таблицы `user_classes`
--

CREATE TABLE `user_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user_classes`
--

INSERT INTO `user_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Администратор', '2025-03-07 18:09:01', '2025-03-07 18:09:01');

-- --------------------------------------------------------

--
-- Структура таблицы `variants`
--

CREATE TABLE `variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) DEFAULT NULL,
  `text` text,
  `image_path` text,
  `image_name` text,
  `rating` int(11) DEFAULT '0',
  `hide` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `variants`
--

INSERT INTO `variants` (`id`, `number`, `text`, `image_path`, `image_name`, `rating`, `hide`, `created_at`, `updated_at`) VALUES
(1, 111, '<h3 class=\"seven_block_option_title\">Бетонные блоки&nbsp;</h3><h4 class=\"seven_block_option_description\">&nbsp;Конечно же хозблоки не ставятся на землю, но и дорогой фундамент для них т​​​​оже не нужен. На что устанавливают хозблоки?&nbsp;&nbsp;</h4><p class=\"seven_block_option_text\">Самый простой вариант установки - на вкопанные бетонные блоки из отсева.</p><p class=\"seven_block_option_text\">По углам и в середине мы вкапываем и выставляем в горизонте 6 бетонных блоков, на которые потом устанавливается ваш хозблок. Такое основание при необходимости без проблем демонтируется и переносится вместе с хозблоком в другое место.</p><p class=\"seven_block_option_text\">Такое основание незаглубленное, не доходит до плотных грунтов, не проходит глубину промерзания грунта, поэтому гарантии на такое основание нет.</p><p class=\"seven_block_option_text\"><b>Стоимость установки комплекта бетонных блоков = 6000руб.</b></p>', 'images/re7PuyIwqh1mEeOQV0DUy7sHPYHIoarJY7su5hbJ.png', '5b39badd4ac6ff558626949640a66ea5.png', 0, 0, '2025-03-10 13:55:16', '2025-03-12 18:01:56'),
(2, 2, '<h3 class=\"seven_block_option_title\">Винтовые сваи</h3><p class=\"seven_block_option_text\">Винтовые сваи - более надежный фундамент, потому что винтовая свая доходит до плотных грунтов и никогда не просядет</p><p class=\"seven_block_option_text\">Также на винтовые сваи не действует морозное пучение, потому что они проходят промерзающий слой и анкерятся ниже глубины промерзания.&nbsp;&nbsp;</p><p class=\"seven_block_option_text_bold\">Стоимость одной сваи с оголовком и монтажом = 5750руб./шт.Если свай будет 6шт., то стоимость свайного фундамента будет 34 500руб&nbsp;&nbsp;</p>', 'images/QeJFoJOvTRIp0kvklXwhCgf2Pc3ERxPuWIuIsGaS.png', '4fc27cf683ab9b91fb81a9f9293f4de5.png', 0, 0, '2025-03-10 14:08:16', '2025-03-10 14:10:30'),
(3, 3, '<h3 class=\"seven_block_option_title\">Подкладки из профтрубы&nbsp;&nbsp;</h3><p class=\"seven_block_option_text\">Если хозблок устанавливается на ровную брусчатку, то тогда нет смысла вкапывать бетонные блоки или закручивать винтовые сваи.Тогда мы просто прикрутим к хозблоку окрашенные отрезки профтрубы 60х60мм, на которых он будет стоять.&nbsp;&nbsp;</p><p class=\"seven_block_option_text_bold\">Стоимость комплекта опор из профтрубы - 4000руб.&nbsp;&nbsp;</p>', 'images/jFECk7HFGl2UgiPwtSPloqOPOED1vwXg3Au8ezbn.png', 'df2ee96965eae7b07688d94fabe7c004.png', 0, 0, '2025-03-10 14:09:02', '2025-03-10 14:09:09');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `additional_options`
--
ALTER TABLE `additional_options`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `admin_access_rights`
--
ALTER TABLE `admin_access_rights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_access_rights_user_class_id_foreign` (`user_class_id`);

--
-- Индексы таблицы `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `infographics`
--
ALTER TABLE `infographics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `item_attached_images`
--
ALTER TABLE `item_attached_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_attached_images_item_id_foreign` (`item_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `our_works`
--
ALTER TABLE `our_works`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specs_item_id_foreign` (`item_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_user_class_id_foreign` (`user_class_id`);

--
-- Индексы таблицы `user_classes`
--
ALTER TABLE `user_classes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `additional_options`
--
ALTER TABLE `additional_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `admin_access_rights`
--
ALTER TABLE `admin_access_rights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `description`
--
ALTER TABLE `description`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `infographics`
--
ALTER TABLE `infographics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `item_attached_images`
--
ALTER TABLE `item_attached_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `our_works`
--
ALTER TABLE `our_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `qa`
--
ALTER TABLE `qa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `specs`
--
ALTER TABLE `specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user_classes`
--
ALTER TABLE `user_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `admin_access_rights`
--
ALTER TABLE `admin_access_rights`
  ADD CONSTRAINT `admin_access_rights_user_class_id_foreign` FOREIGN KEY (`user_class_id`) REFERENCES `user_classes` (`id`);

--
-- Ограничения внешнего ключа таблицы `item_attached_images`
--
ALTER TABLE `item_attached_images`
  ADD CONSTRAINT `item_attached_images_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `specs`
--
ALTER TABLE `specs`
  ADD CONSTRAINT `specs_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_class_id_foreign` FOREIGN KEY (`user_class_id`) REFERENCES `user_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
