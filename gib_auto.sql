-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 05 nov 2023 om 21:47
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
-- Tabelstructuur voor tabel `tblfuel`
--

DROP TABLE IF EXISTS `tblfuel`;
CREATE TABLE IF NOT EXISTS `tblfuel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fuel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblfuel`
--

INSERT INTO `tblfuel` (`id`, `fuel`) VALUES
(1, 'Benzine'),
(2, 'Electric');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblmodels`
--

DROP TABLE IF EXISTS `tblmodels`;
CREATE TABLE IF NOT EXISTS `tblmodels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblmodels`
--

INSERT INTO `tblmodels` (`id`, `model`) VALUES
(1, 'Sedan'),
(2, 'SUV'),
(3, 'Coupé'),
(4, 'Wagon'),
(5, 'Cabrio');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblproducts`
--

DROP TABLE IF EXISTS `tblproducts`;
CREATE TABLE IF NOT EXISTS `tblproducts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `year` int NOT NULL,
  `modeltype` varchar(255) NOT NULL,
  `fueltype` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `name`, `model`, `price`, `photo`, `year`, `modeltype`, `fueltype`) VALUES
(1, 'Mercedes', 'AMG GT', 190000, 'gt.png', 2021, 'Coupé', 'Benzine'),
(2, 'Porsche ', '911 Turbo S', 320000, 'turbo.png', 2023, 'Coupé', 'Electric'),
(3, 'Audi ', 'RS6', 130000, 'rs.png', 2021, 'Wagon', 'Benzine'),
(4, 'Mercedes', 'G63 AMG', 2000000, 'g.png', 2022, 'SUV', 'Electric'),
(5, 'Mercedes', 'AMG SL Roadster', 130800, 'sl.png', 2021, 'cabrio', 'Benzine'),
(6, 'Mercedes', 'EQS', 80245, 'eqs.png', 2023, 'Sedan', 'Electric'),
(7, 'Mercedes', 'AMG S 63', 201025, 's.png', 2022, 'Sedan', 'Elecrtic'),
(8, 'Audi', 'R8', 423253, 'r8.png', 2021, 'Cabrio', 'Benzine');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblspecs`
--

DROP TABLE IF EXISTS `tblspecs`;
CREATE TABLE IF NOT EXISTS `tblspecs` (
  `specID` int NOT NULL AUTO_INCREMENT,
  `topspeed` int NOT NULL,
  `horsepower` int NOT NULL,
  `accelaration` double NOT NULL,
  `fuel` varchar(255) NOT NULL,
  PRIMARY KEY (`specID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblspecs`
--

INSERT INTO `tblspecs` (`specID`, `topspeed`, `horsepower`, `accelaration`, `fuel`) VALUES
(1, 315, 585, 3.2, 'Benzine'),
(2, 330, 650, 3.6, 'Electric'),
(3, 305, 630, 4.1, 'Benzine'),
(4, 220, 585, 4.5, 'Electric'),
(5, 320, 621, 2.3, 'Benzine'),
(6, 210, 360, 4, 'Electric'),
(7, 300, 523, 3.9, 'Electric'),
(8, 330, 623, 2.4, 'Benzine');

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
