-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 15 okt 2023 om 19:39
-- Serverversie: 8.0.31
-- PHP-versie: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gib_auto`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblproducts`
--

DROP TABLE IF EXISTS `tblproducts`;
CREATE TABLE IF NOT EXISTS `tblproducts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `prijs` int NOT NULL,
  `foto` varchar(255) NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblusers`
--

INSERT INTO `tblusers` (`id`, `firstname`, `lastname`, `email`, `password`, `createdAt`) VALUES
(1, 'ss', 'ss', 'ss@ss.com', '$2y$10$lclLbO8Lktzx.yYe2UxNl.a9zslT7seNMNme6JHEzG0dhyNm2pf52', '2023-10-13 21:52:40'),
(2, 'qq', 'qq', 'qq@qq.com', '$2y$10$v/hQbDgvY6PjT/THanK5IO9XxctdlBWjKNiKDPFAIPEc7vWmq7wwS', '2023-10-15 14:59:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
