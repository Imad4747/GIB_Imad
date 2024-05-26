-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 26 mei 2024 om 17:48
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `brands`) VALUES
(1, 'Mercedes'),
(3, 'Porsche'),
(5, 'BMW');

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
  `price` int NOT NULL,
  `sample` text NOT NULL,
  `hexColor` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblcolor`
--

INSERT INTO `tblcolor` (`id`, `color`, `price`, `sample`, `hexColor`) VALUES
(1, 'Metallic Black', 0, 'bl.webp', '000000'),
(2, 'Metallic White', 550, 'wit.webp', 'FFFFFF'),
(3, 'Metallic Red', 600, 'red.webp', 'FF0000'),
(4, 'Metallic Dark Red', 520, 'tr.webp', '69092E'),
(5, 'Metallic Yellow', 652, 'yel.webp', 'FFFF00'),
(6, 'Metallic Blue', 530, 'blue.webp', '0000FF'),
(7, 'Metallic Grey', 570, 'grey.webp', '3E3D3D');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Tabelstructuur voor tabel `tblparts`
--

DROP TABLE IF EXISTS `tblparts`;
CREATE TABLE IF NOT EXISTS `tblparts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parts` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblparts`
--

INSERT INTO `tblparts` (`id`, `parts`) VALUES
(1, '[\"Object_9\",\"Object_6\",\"Object_11\",\"Object_4\",\"Object_29\",\"Object_38\",\"Object_23\",\"Object_17\",\"Object_13\",\"Object_19\", \"Object_42\"]'),
(2, '[\"Object_8\"]'),
(3, '[\"AMG_hood_bodypaint_0\", \"G-class_body_AMG_bodypaint_0\", \"G-class_fender_L_AMG_bodypaint_0\", \"G-class_fender_R_bodypaint_0\", \"AMG_front_bamper_bodypaint_0\", \"G-class_headlightframe_R_AMG_bodypaint_0\", \"G-class_headlightframe_L_AMG_bodypaint_0\", \"AMG_tailgate_bodypaint_0\", \"G-class_FR_door_AMG_bodypaint_0\", \"G-class_RR_door_bodypaint_0\", \"G-class_FL_door_AMG_bodypaint_0\", \"G-class_RL_door_bodypaint_0\", \"AMG_frontwide_fender_L_bodypaint_0\", \"AMG_rearwide_fender_L_bodypaint_0\", \"AMG_rearwide_fender_R_bodypaint_0\", \"AMG_frontwide_fender_R_bodypaint_0\", \"G-class_mirror_R_bodypaint_0\", \"G-class_mirror_L_bodypaint_0\", \"AMG_grill_bodypaint_0\", \"AMG_rear_bamper_bodypaint_0\", \"AMG_sparetire_bodypaint_0\", \"AMG_running_board_L_bodypaint_0\", \"AMG_running_board_R_bodypaint_0\"]'),
(4, '[\r\n  \"SL63_fender_R_SL63_paint_0\",\r\n  \"SL63_hood_SL63_paint_0\",\r\n  \"SL63_door_R_SL63_paint_0\",\r\n  \"SL63_body_SL63_paint_0\",\r\n  \"SL63_bumper_F_SL63_paint_0\",\r\n  \"SL63_fender_L_SL63_paint_0\",\r\n  \"SL63_door_L_SL63_paint_0\",\r\n  \"SL63_body_SL63_paint_0\",\r\n  \"SL63_bumper_R_SL63_paint_0\",\r\n  \"SL63_trunk_SL63_paint_0\",\r\n  \"SL63_diffuser_R-crb_SL63_carbon_0\",\r\n  \"SL63_sideskirt-L-crb_SL63_paint_0\",\r\n  \"SL63_sideskirt-L-crb_SL63_carbon_0\",\r\n  \"SL63_fender_L_SL63_carbon_0\",\r\n  \"SL63_mirror_L_SL63_black_0\",\r\n  \"SL63_body_SL63_black_0\",\r\n  \"SL63_bumper_F_SL63_black_0\",\r\n  \"SL63_sideskirt-R.-crb_SL63_carbon_0\",\r\n  \"SL63_sideskirt-R.-crb_SL63_paint_0\",\r\n  \"SL63_fender_R_SL63_carbon_0\",\r\n  \"SL63_mirror_R_SL63_black_0\"\r\n]'),
(5, '[\r\n  \"M4xNME_door_FL_M4xNME_Paint_0\",\r\n  \"M4xNME_body_M4xNME_Paint_0\",\r\n  \"M4xNME_fender_L_M4xNME_Paint_0\",\r\n  \"M4xNME_hood_csl_M4xNME_Paint_0\",\r\n  \"M4xNME_fender_R_M4xNME_Paint_0\",\r\n  \"M4xNME_bumper_F_M4xNME_Paint_0\",\r\n  \"M4xNME_door_FR_M4xNME_Paint_0\",\r\n  \"M4xNME_bumper_R_M4xNME_Paint_0\",\r\n  \"M4xNME_trunk_csl_M4xNME_Paint_0\"\r\n]'),
(6, '[\r\n  \"ARm4_door_L_ARm4_main_0\",\r\n  \"ARm4_body_ARm4_main_0\",\r\n  \"ARm4_bumper_R_ARm4_main_0\",\r\n  \"ARm4_door_R_ARm4_main_0\",\r\n  \"ARm4_hood_ARm4_main_0\",\r\n  \"ARm4_bumper_F_ARm4_main_0\",\r\n  \"ARm4_fender_R_ARm4_main_0\",\r\n  \"ARm4_fender_L_ARm4_main_0\",\r\n  \"ARm4_trunk_ARm4_main_0\"\r\n]');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblpaths`
--

DROP TABLE IF EXISTS `tblpaths`;
CREATE TABLE IF NOT EXISTS `tblpaths` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameModel` text NOT NULL,
  `Modelpath` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblpaths`
--

INSERT INTO `tblpaths` (`id`, `nameModel`, `Modelpath`) VALUES
(1, 'AMG GT', 'public/mercedes-benz_amg-gt_2015/scene.gltf'),
(2, '911 Turbo S', 'public/911/scene.gltf'),
(3, 'G63 AMG', 'public/g63/scene.gltf'),
(4, 'AMG SL Roadster', 'public/sl/scene.gltf'),
(5, 'CSL', 'public/bmw csl/scene.gltf'),
(6, 'F82', 'public/bmw f82/scene.gltf');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblproducts`
--

DROP TABLE IF EXISTS `tblproducts`;
CREATE TABLE IF NOT EXISTS `tblproducts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `year_car` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `name`, `model`, `price`, `photo`, `year_car`) VALUES
(1, 'Mercedes', 'AMG GT', 196505, 'gt.png', 2022),
(2, 'Porsche', '911 Turbo S', 244500, 'turbo.png', 2021),
(3, 'Mercedes', 'G63 AMG', 190420.3, 'g.png', 2022),
(4, 'Mercedes ', 'AMG SL Roadster', 243500.63, 'sl.png', 2023),
(5, 'BMW', 'CSL', 130250.3, 'csl.jpg', 2021),
(6, 'BMW', 'F82', 100900.2, 'f823.png', 2020);

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
  `pic` text NOT NULL,
  `pic2` text NOT NULL,
  `pic3` text NOT NULL,
  PRIMARY KEY (`specID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblspecs`
--

INSERT INTO `tblspecs` (`specID`, `topspeed`, `horsepower`, `accelaration`, `fuel`, `transmission`, `cartype`, `description`, `pic`, `pic2`, `pic3`) VALUES
(1, 231, 421, 3.1, 'Benzine', 'Automatic', 'Coupé', 'The AMG GT is an iconic high-performance sports car known for its powerful turbocharged engine, precise handling, and timeless design. With exhilarating acceleration and advanced technology, it delivers an unmatched driving experience that embodies the essence of automotive excellence.', 'gt1.jpg', 'gt2.jpg', 'gt3.jpg'),
(2, 260, 530, 2.6, 'Diesel', 'Manual', 'Coupé', 'The Porsche 911 Turbo S is an iconic high-performance sports car known for its powerful turbocharged engine, precise handling, and timeless design. With exhilarating acceleration and advanced technology, it delivers an unmatched driving experience that embodies the essence of automotive excellence.', 'turbo1.webp', 'turbo2.webp', 'turbo3.webp'),
(3, 200, 432, 4.6, 'Diesel', 'Manual', 'SUV', 'The Mercedes-AMG G63 is an iconic luxury SUV known for its rugged off-road capabilities and powerful performance. With its distinctive boxy design, advanced technology, and luxurious interior, it delivers an unmatched combination of style and capability.', 'g63.jpg', 'g632.avif', 'g633.png'),
(4, 320, 630, 2.1, 'Benzine', 'Automatic', 'Cabrio', 'The Mercedes-AMG SL Roadster is a legendary convertible sports car known for its thrilling performance and open-air driving experience. With its powerful engine, sleek design, and luxurious amenities, it offers an exhilarating and stylish way to enjoy the open road.', 'sl2.avif', 'sl3.avif', 'sl.avif'),
(5, 230, 241, 3.2, 'Benzine', 'Manual', 'Sedan', 'xx', 'csl1.png', 'csl2.jpg', 'csl3.avif'),
(6, 300, 214, 3.6, 'Diesel', 'Manual', 'Sedan', 'ss', 'f822.jpg', 'f823.jpg', 'f82.webp');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblusers`
--

INSERT INTO `tblusers` (`id`, `firstname`, `lastname`, `email`, `password`, `createdAt`, `role`) VALUES
(1, 'ss', 'ss', 'ss@ss.com', '$2y$10$lclLbO8Lktzx.yYe2UxNl.a9zslT7seNMNme6JHEzG0dhyNm2pf52', '2023-10-13 21:52:40', 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
