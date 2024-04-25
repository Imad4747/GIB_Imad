-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 25 apr 2024 om 06:04
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `firstname`, `lastname`, `email`, `message`, `file`, `date`) VALUES
(1, 'nvn', 'bvnvbn', 'email@email.emailvv', 'vbnvn', '', '2023-11-23 07:43:50'),
(2, 'juj', 'juj', 'email@email.emailvvuj', 'jujujujujuj', 0x6176617461722e6a7067, '2023-11-23 08:08:29'),
(3, 'bfgbgfb', 'fgbfgbfg', 'email@email.email', 'zferfref', 0x747572626f2e706e67, '2023-11-27 14:36:31'),
(4, 'qq', 'qq', 'email@email.emailvvqq', 'qq', 0x72382e706e67, '2023-11-27 14:39:35');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblfav`
--

DROP TABLE IF EXISTS `tblfav`;
CREATE TABLE IF NOT EXISTS `tblfav` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblfav`
--

INSERT INTO `tblfav` (`id`, `userid`, `product_id`) VALUES
(5, 17, 1),
(8, 14, 1),
(4, 12, 4),
(7, 17, 4);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblorder`
--

INSERT INTO `tblorder` (`order_id`, `userid`, `product`, `model`, `totalPrice`, `date_order`) VALUES
(1, 12, 'Mercedes', 'AMG GT', 190000, '2024-03-10'),
(2, 12, 'Mercedes', 'AMG GT', 190000, '2024-03-10'),
(3, 17, 'Mercedes', 'AMG GT', 190000, '2024-03-10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblproducts`
--

DROP TABLE IF EXISTS `tblproducts`;
CREATE TABLE IF NOT EXISTS `tblproducts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `year_car` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `name`, `model`, `price`, `photo`, `year_car`) VALUES
(1, 'Mercedes', 'AMG GT', 190000, 'gt.png', 2021),
(2, 'Porsche', '911 Turbo S', 320000, 'turbo.png', 2023),
(3, 'audi', 'RS6', 130000, 'rs.png', 2021),
(4, 'Mercedes', 'G63 AMG', 2000000, 'g.png', 2022),
(5, 'Mercedes', 'AMG SL Roadster', 130800, 'sl.png', 2021),
(6, 'Mercedes', 'EQS', 80245, 'eqs.png', 2023),
(7, 'Mercedes', 'AMG S 63', 201025, 's.png', 2022),
(8, 'audi', 'R8', 423253, 'r8.png', 2021);

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
  `description` text NOT NULL,
  PRIMARY KEY (`specID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblspecs`
--

INSERT INTO `tblspecs` (`specID`, `topspeed`, `horsepower`, `accelaration`, `fuel`, `transmission`, `cartype`, `description`) VALUES
(1, 315, 585, 3.2, 'Benzine', 'manual', 'SUV', 'The Mercedes-AMG GT is a sleek and powerful sports car renowned for its dynamic performance and striking design. With a handcrafted engine, precise handling, and luxurious interior, it offers an exhilarating driving experience.'),
(2, 330, 650, 3.6, 'Electric', 'manual', 'Sedan', 'The Porsche 911 Turbo S is an iconic high-performance sports car known for its powerful turbocharged engine, precise handling, and timeless design. With exhilarating acceleration and advanced technology, it delivers an unmatched driving experience that embodies the essence of automotive excellence.\r\n\r\n\r\n\r\n\r\n\r\n'),
(3, 305, 630, 4.1, 'Benzine', 'Automatic', 'Coupé', 'The Audi RS6 Avant is a high-performance luxury wagon known for its blend of power, practicality, and sophistication. It features a potent engine, all-wheel drive, and a spacious interior, making it a versatile and thrilling choice for enthusiasts.'),
(4, 220, 585, 4.5, 'Electric', 'manual', 'Coupé', 'The Mercedes-AMG G63 is an iconic luxury SUV known for its rugged off-road capabilities and powerful performance. With its distinctive boxy design, advanced technology, and luxurious interior, it delivers an unmatched combination of style and capability.'),
(5, 320, 621, 2.3, 'Benzine', 'automatic', 'Wagon', 'The Mercedes-AMG SL Roadster is a legendary convertible sports car known for its thrilling performance and open-air driving experience. With its powerful engine, sleek design, and luxurious amenities, it offers an exhilarating and stylish way to enjoy the open road.'),
(6, 210, 360, 4, 'Electric', 'automatic', 'Cabrio', 'The Mercedes-Benz EQS is a luxury electric sedan that represents the future of automotive innovation. With its cutting-edge electric drivetrain, advanced technology, and luxurious interior, it offers a refined and sustainable driving experience.'),
(7, 300, 523, 3.9, 'Electric', 'automatic', 'Sedan', ' The Mercedes-AMG S63 is a high-performance luxury sedan known for its powerful engine, opulent interior, and advanced technology. With its blend of performance and comfort, it provides a luxurious and exhilarating driving experience for those who demand the best.'),
(8, 330, 623, 2.4, 'Benzine', 'manual', 'Cabrio', 'The Audi RS8 is a flagship performance sedan that combines breathtaking power with refined luxury. With a potent engine, advanced technology, and elegant design, it offers an unmatched blend of performance and comfort for discerning drivers.');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblusers`
--

INSERT INTO `tblusers` (`id`, `firstname`, `lastname`, `email`, `password`, `createdAt`, `role`) VALUES
(1, 'ss', 'ss', 'ss@ss.com', '$2y$10$lclLbO8Lktzx.yYe2UxNl.a9zslT7seNMNme6JHEzG0dhyNm2pf52', '2023-10-13 21:52:40', 'admin'),
(13, 'dd', 'dd', 'email@email.emailvvdd', '$2y$10$x0BYwl2WcNWbv7LuARY3O.Gv6rFvfwYtw2KxN9Ol0SZMnEAablHEO', '2023-11-23 09:04:29', 'guest'),
(14, 'ww', 'ww', 'email@email.emailww', '$2y$10$0r1VeDRRu3L1nfElRQ1nVu/furstiQss5ucZ48pABgNppXyh8TmgG', '2023-11-24 09:29:00', 'guest'),
(15, 'gg', 'gg', 'gg@gg.com', '$2y$10$rSk542zuQfhyf8IylOEbzeUVto1NcyhCT9wcNDmwuuIAUA/8UOOO6', '2024-02-18 17:15:12', 'guest'),
(16, 'jan', 'Janssen', 'jan@jan.com', '$2y$10$FxnsBNSeDOHvKfu9C.xpfuhwDQL2mCfuGCGMRdi7JI4lS0nvqfLOm', '2024-03-10 22:18:14', 'guest');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
