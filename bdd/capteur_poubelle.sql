-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-06-12 22:36:12
-- 服务器版本： 5.5.44
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chimie`
--

-- --------------------------------------------------------

--
-- 表的结构 `capteur_poubelle`
--

CREATE TABLE `capteur_poubelle` (
  `id` int(11) NOT NULL,
  `id_poubelle` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `capteur_poubelle`
--

INSERT INTO `capteur_poubelle` (`id`, `id_poubelle`, `date`, `statut`) VALUES
(1, 9, '2019-06-12 08:00:00', 0),
(2, 8, '2019-06-12 08:00:00', 0),
(3, 7, '2019-06-12 08:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capteur_poubelle`
--
ALTER TABLE `capteur_poubelle`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `capteur_poubelle`
--
ALTER TABLE `capteur_poubelle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
