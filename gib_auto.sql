-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 07 mrt 2024 om 08:48
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
-- Tabelstructuur voor tabel `tblbrands`
--

DROP TABLE IF EXISTS `tblbrands`;
CREATE TABLE IF NOT EXISTS `tblbrands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brands` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `brands`) VALUES
(1, 'Mercedes'),
(2, 'Audi'),
(3, 'Porsche');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblcartype`
--

DROP TABLE IF EXISTS `tblcartype`;
CREATE TABLE IF NOT EXISTS `tblcartype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblcartype`
--

INSERT INTO `tblcartype` (`id`, `model`) VALUES
(1, 'Sedan'),
(2, 'SUV'),
(3, 'Coupé'),
(4, 'Wagon'),
(5, 'Cabrio');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblchatbot`
--

DROP TABLE IF EXISTS `tblchatbot`;
CREATE TABLE IF NOT EXISTS `tblchatbot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `response` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblchatbot`
--

INSERT INTO `tblchatbot` (`id`, `message`, `response`) VALUES
(1, 'My account is down', 'wait we work'),
(2, 'hello ', 'how cn i help');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblcolor`
--

DROP TABLE IF EXISTS `tblcolor`;
CREATE TABLE IF NOT EXISTS `tblcolor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblcolor`
--

INSERT INTO `tblcolor` (`id`, `color`) VALUES
(1, 'Red'),
(2, 'Green'),
(3, 'Blue');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblcontact`
--

DROP TABLE IF EXISTS `tblcontact`;
CREATE TABLE IF NOT EXISTS `tblcontact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `file` blob NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `firstname`, `lastname`, `email`, `message`, `file`, `date`) VALUES
(1, 'jj', 'hh', 'hhhghhh@fgkjfdg.com', 'hhhh', 0x736c2e706e67, '2023-12-01 13:10:28');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblfuel`
--

DROP TABLE IF EXISTS `tblfuel`;
CREATE TABLE IF NOT EXISTS `tblfuel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fuel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblfuel`
--

INSERT INTO `tblfuel` (`id`, `fuel`) VALUES
(1, 'Benzine'),
(2, 'Electric'),
(3, 'Diesel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblorder`
--

DROP TABLE IF EXISTS `tblorder`;
CREATE TABLE IF NOT EXISTS `tblorder` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `product` text NOT NULL,
  `model` text NOT NULL,
  `totalPrice` int NOT NULL,
  `date_order` date NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `name`, `model`, `price`, `photo`, `year`) VALUES
(1, 'Mercedes', 'AMG GT', 19000000, 'gt.png', 2021),
(2, 'Porsche', '911 Turbo S', 32000000, 'turbo.png', 2023),
(3, 'Audi', 'RS6', 13000000, 'rs.png', 2021),
(4, 'Mercedes', 'G63 AMG', 200000000, 'g.png', 2022),
(5, 'Mercedes', 'AMG SL Roadster', 13080000, 'sl.png', 2021),
(6, 'Mercedes', 'EQS', 8024500, 'eqs.png', 2023),
(7, 'Mercedes', 'AMG S 63', 20102500, 's.png', 2022),
(8, 'Audi', 'R8', 42325300, 'r8.png', 2021);

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
  `transmission` text NOT NULL,
  `cartype` text NOT NULL,
  PRIMARY KEY (`specID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblspecs`
--

INSERT INTO `tblspecs` (`specID`, `topspeed`, `horsepower`, `accelaration`, `fuel`, `transmission`, `cartype`) VALUES
(1, 315, 585, 3.2, 'Benzine', 'manual', 'sedan'),
(2, 330, 650, 3.6, 'Electric', 'manual', 'SUV'),
(3, 305, 630, 4.1, 'Benzine', 'manual', 'coupé'),
(4, 220, 585, 4.5, 'Electric', 'automatic', 'cabrio'),
(5, 320, 621, 2.3, 'Benzine', 'automatic', 'wagon'),
(6, 210, 360, 4, 'Electric', 'automatic', 'sedan'),
(7, 300, 523, 3.9, 'Electric', 'manual', 'SUV'),
(8, 330, 623, 2.4, 'Benzine', 'automatic', 'cabrio');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbltransmission`
--

DROP TABLE IF EXISTS `tbltransmission`;
CREATE TABLE IF NOT EXISTS `tbltransmission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `transmission` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tbltransmission`
--

INSERT INTO `tbltransmission` (`id`, `transmission`) VALUES
(1, 'Manual'),
(2, 'Automatic');

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
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblusers`
--

INSERT INTO `tblusers` (`id`, `firstname`, `lastname`, `email`, `password`, `createdAt`, `role`) VALUES
(1, 'ss', 'ss', 'ss@ss.com', '$2y$10$lclLbO8Lktzx.yYe2UxNl.a9zslT7seNMNme6JHEzG0dhyNm2pf52', '2023-10-13 21:52:40', 'admin'),
(12, 'fsdf', 'sdfsdf', 'email@email.emailvvff', '$2y$10$lohpGiv9vsMowR5FTQeh8edFO6TUxQlm56AM550PF4yn6S.ySYgVO', '2023-11-23 08:42:54', 'guest'),
(13, 'dd', 'dd', 'email@email.emailvvdd', '$2y$10$x0BYwl2WcNWbv7LuARY3O.Gv6rFvfwYtw2KxN9Ol0SZMnEAablHEO', '2023-11-23 09:04:29', 'guest'),
(14, 'ww', 'ww', 'email@email.emailww', '$2y$10$0r1VeDRRu3L1nfElRQ1nVu/furstiQss5ucZ48pABgNppXyh8TmgG', '2023-11-24 09:29:00', 'guest');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
