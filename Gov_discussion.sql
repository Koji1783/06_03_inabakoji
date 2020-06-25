-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 6 月 25 日 13:50
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `Gov_discussion`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `sns_table`
--

CREATE TABLE `sns_table` (
  `id` int(12) NOT NULL,
  `g_id` int(12) NOT NULL,
  `u_id` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `hashtag` text COLLATE utf8_unicode_ci NOT NULL,
  `commentdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `sns_table`
--

INSERT INTO `sns_table` (`id`, `g_id`, `u_id`, `comment`, `hashtag`, `commentdate`) VALUES
(2, 1, 'cocokoji', 'test', '#テスト', '2020-06-24 15:05:31'),
(3, 1, 'cocokoji', 'test2', '#テスト', '2020-06-24 15:05:56'),
(4, 3, 'cocokoji', '３へのつぶやき', '#テスト', '2020-06-24 15:08:59'),
(5, 2, 'cocokoji', '2へのつぶやき', '#テスト', '2020-06-24 15:09:16'),
(6, 3, 'cocokoji', '順位', '#テスト', '2020-06-25 11:47:30');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `u_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `u_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `u_name`, `u_id`, `u_pw`, `indate`) VALUES
(1, 'いなば', 'cocokoji', 'test', '2020-06-23 21:50:22'),
(2, 'いなばこうじ', 'aaa', 'aaa', '2020-06-24 02:21:21');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `sns_table`
--
ALTER TABLE `sns_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `sns_table`
--
ALTER TABLE `sns_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルのAUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
